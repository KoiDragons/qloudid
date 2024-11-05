<?php
	require_once('../AppModel.php');
	class CompanyVerifiedConnectionsModel extends AppModel
	{
		
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image from user_logins where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function userAccount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,first_name,last_name,sex,dob_day,dob_month,dob_year,created_on  from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function employeeAccount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select ssn,address from user_profiles  where user_logins_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$stmt = $dbCon->prepare("INSERT INTO user_profiles (user_logins_id, created_on , modified_on ) VALUES (?, now(), now())");
				
				
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
			}
			$stmt = $dbCon->prepare("select ssn,address from user_profiles  where user_logins_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function companyDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id from company_profiles  where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			//print_r($row); die;
			if(empty($row))
			{
				//echo "hi"; die;
				$stmt = $dbCon->prepare("INSERT INTO company_profiles (company_id, created_on , modified_on ) VALUES (?, now(), now())");
				
				
				$stmt->bind_param("i", $company_id);
				$stmt->execute();	
			}
			
			$stmt = $dbCon->prepare("select grading_status,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			//print_r($row); die;
			
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		function requestDetailConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select company_user_connection.id,company_name,last_name,first_name,email,company_user_connection.created_on,user_logins.id as uid,ssn from company_user_connection left join user_logins on user_logins.id=company_user_connection.user_id left join companies on companies.id=company_user_connection.company_id left join user_profiles on user_profiles.user_logins_id=user_logins.id where company_id=? and is_approved=0 limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreRequestDetailConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select ssn,company_user_connection.id,company_name,last_name,first_name,email,company_user_connection.created_on,user_logins.id as uid from company_user_connection left join user_logins on user_logins.id=company_user_connection.user_id left join companies on companies.id=company_user_connection.company_id left join user_profiles on user_profiles.user_logins_id=user_logins.id where company_id=? and is_approved=0 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org2="'".$org1."'";
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " ><a href="#" class="black_txt">'.$row['first_name'].' '.$row['last_name'].'</a></div>
				</td>
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " > '.$row['ssn'].'</div>
				</td>
				<td class="pad5 brdb_new tall cd">
				<div class="padtb5 ">'.date('Y-m-d',strtotime($row['created_on'])).'</div>
				</td>
				
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function requestDetailApprovedConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select ssn,company_user_connection.id,company_name,last_name,first_name,email,company_user_connection.created_on from company_user_connection left join user_logins on user_logins.id=company_user_connection.user_id left join companies on companies.id=company_user_connection.company_id left join user_profiles on user_profiles.user_logins_id=user_logins.id  where company_id=? and is_approved=1 limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function requestDetailRejectedConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select ssn,company_user_connection.id,company_name,last_name,first_name,email,company_user_connection.created_on from company_user_connection left join user_logins on user_logins.id=company_user_connection.user_id left join companies on companies.id=company_user_connection.company_id left join user_profiles on user_profiles.user_logins_id=user_logins.id where company_id=? and is_approved=2 limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreRequestDetailApprovedConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select ssn,company_user_connection.id,company_name,last_name,first_name,email,company_user_connection.created_on from company_user_connection left join user_logins on user_logins.id=company_user_connection.user_id left join companies on companies.id=company_user_connection.company_id left join user_profiles on user_profiles.user_logins_id=user_logins.id where company_id=? and is_approved=1 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['first_name'].' '.$row['last_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " > '.$row['ssn'].'</div>
				</td>
				<td class="pad5 brdb_new tall cd">
				<div class="padtb5 ">'.date('Y-m-d',strtotime($row['created_on'])).'</div>
				</td>
				
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreRequestDetailRejectedConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select ssn,company_user_connection.id,company_name,last_name,first_name,email,company_user_connection.created_on from company_user_connection left join user_logins on user_logins.id=company_user_connection.user_id left join companies on companies.id=company_user_connection.company_id left join user_profiles on user_profiles.user_logins_id=user_logins.id where company_id=? and is_approved=2 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['first_name'].' '.$row['last_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['ssn'].'</div>
				</td>
				<td class="pad5 brdb_new tall cd">
				<div class="padtb5 ">'.date('Y-m-d',strtotime($row['created_on'])).'</div>
				</td>
				
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		
		function approveCountConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_user_connection where company_id=? and is_approved=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		function pendingCountConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_user_connection where company_id=? and is_approved=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		function rejectedCountConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_user_connection where company_id=? and is_approved=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function verifiedCountConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_user_connection where company_id=? and is_approved=3");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function requestVerifiedDetailConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select verified_name,user_ssn as ssn,user_id,company_user_connection.id,company_name,verified_by,company_user_connection.created_on from company_user_connection left join companies on companies.id=company_user_connection.company_id left join bankid_verified on bankid_verified.bank_id=company_user_connection.verified_by  where company_id=? and is_approved=3 limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				if($row['user_id']==0)
				{
					$org[$j]['receiver']="Unregistered User";
					
				}
				else
				
				{
					$stmt = $dbCon->prepare("select last_name,first_name from user_logins where id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['user_id']);
					$stmt->execute();
					$resultu = $stmt->get_result();
					$rowu = $resultu->fetch_assoc();
					$org[$j]['receiver']=$rowu['first_name'].' '.$rowu['first_name'];
				}
				$j++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreRequestVerifiedDetailConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select verified_name,user_ssn as ssn,user_id,company_user_connection.id,company_name,verified_by,company_user_connection.created_on from company_user_connection left join companies on companies.id=company_user_connection.company_id left join bankid_verified on bankid_verified.bank_id=company_user_connection.verified_by  where company_id=? and is_approved=3 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				if($row['user_id']==0)
				{
					$receiver="Unregistered User";
					
				}
				else
				
				{
					$stmt = $dbCon->prepare("select last_name,first_name from user_logins where id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['user_id']);
					$stmt->execute();
					$resultu = $stmt->get_result();
					$rowu = $resultu->fetch_assoc();
					$receiver=$rowu['first_name'].' '.$rowu['first_name'];
				}
				
				
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org2="'".$org1."'";
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " ><a href="#" class="black_txt">'.$row['verified_name'].'</a></div>
				</td>
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " > '.$row['ssn'].'</div>
				</td>
				<td class="pad5 brdb_new tall cd">
				<div class="padtb5 ">'.$receiver.'</div>
				</td>
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " > Approve</div>
				</td>
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " > Reject</div>
				</td>
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function approveVerification($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			
			$stmt = $dbCon->prepare("select user_id,verified_by from company_user_connection where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update company_user_connection set is_approved=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			
			$stmt->execute();
			
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function rejectVerification($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			
			$stmt = $dbCon->prepare("select user_id,verified_by from company_user_connection where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update company_user_connection set is_approved=2 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
	}			