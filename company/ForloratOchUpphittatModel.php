<?php
	require_once('../AppModel.php');
	class ForloratOchUpphittatModel extends AppModel
	{
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=11");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
		function updateLostValue($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			
			$stmt = $dbCon->prepare("select * from lost_and_found  where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update lost_and_found set status=1,created_on=now(),share_type=? where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['share_type'],$id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("insert into company_item_lost_history(lost_id,lost_date,found_date,is_fee,finders_fee)
			values(?,?,now(),?,?)");
			$stmt->bind_param("isii",$id,$row['created_on'],$_POST['pay_fee'],$_POST['fee']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function reportLost($data)
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("update lost_and_found set status=0,created_on=now() where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
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
			
			$stmt = $dbCon->prepare("select companies.country_id,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
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
		
		
		
		
		
		function countryOption($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,country_name  from country where id>-1 and id<240 order by country_name");
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
			}
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function lostandFoundDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from lost_and_found  where company_id=? and status=0  order by created_on desc limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
			
		function itemDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("select * from lost_and_found  where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		function lostandFoundCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from lost_and_found where company_id=? and status=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
			function moreLostandFoundDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select * from lost_and_found  where company_id=? and status=0 order by created_on desc limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				if($row['item_number']==1)
				{
				$item='Cell phone';
				}
				else
					if($row['item_number']==2)
				{
				$item='Key';
				}
				else if($row['item_number']==2)
				{
				$item='Laptop';
				}
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">'.$item.'</a></div>
													</td>
													
													
													
													
													<td class="pad5 brdb_new tall nm hidden-xs ">'.$row['serial_number'].'
														
													</td>
				
												<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('Y-m-d',strtotime($row['created_on'])).'</div>
													</td>
													<td class="pad5 brdb_new tall nm xs-talr xs-marr10">
														<a href="../updateFound/'.$data['cid'].'/'.$org1.'" ><div class="padtb5 ">Förlorad</div></a>
													</td>
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
			function forloradDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from lost_and_found  where company_id=? and status=1  order by created_on desc limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function forloradCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from lost_and_found where company_id=? and status=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
			function moreForloradDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select * from lost_and_found  where company_id=? and status=1 order by created_on desc limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				if($row['item_number']==1)
				{
				$item='Cell phone';
				}
				else
					if($row['item_number']==2)
				{
				$item='Key';
				}
				else if($row['item_number']==2)
				{
				$item='Laptop';
				}
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">'.$item.'</a></div>
													</td>
													
													
													
													
													<td class="pad5 brdb_new tall nm hidden-xs ">'.$row['serial_number'].'
														
													</td>
				
												<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('Y-m-d',strtotime($row['created_on'])).'</div>
													</td>
													<td class="pad5 brdb_new tall nm xs-talr xs-marr10">
														<a href="../checkStatus/'.$data['cid'].'/'.$org1.'" ><div class="padtb5 ">Hittat</div></a>
													</td>
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
	}						