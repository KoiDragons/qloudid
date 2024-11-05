<?php
	require_once('../AppModel.php');
	class WhitelistIPModel extends AppModel
	{
	
	function employeeList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,lower(first_name) first_name,lower(last_name) last_name,lower(email) email from employees where company_id=?");
			
			$stmt->bind_param("i",$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$collaborators = array();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				$collaborators[$i]['id']=$row['id'];
				$collaborators[$i]['first-name']=$row['first_name'];
				$collaborators[$i]['last-name']=$row['last_name'];
				$collaborators[$i]['email']=$row['email'];
				
				$collaborators[$i]['label']=$row['first_name'].' '.$row['last_name'].', <'.$row['email'].'>';
				
				$i++;
			}
			//print_r($collaborators); die;
			$filter = strtolower($data['filter']);
			$output = array();
			foreach ($collaborators as $collaborator) {
				if(substr_count($collaborator['label'], $filter) > 0){
					$output[] = $collaborator;
				}
			}
			$out=json_encode($output);
			$stmt->close();
			$dbCon->close();
			return $out;
			
			
		}
		
		function locationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select property_location.id,property_name,visiting_address from property_location left join property on property.id=property_location.property_id where company_id=? order by created_on desc");
			
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
		
		function meetingRoomDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,room_name,created_on from company_meeting_room where company_id=? order by created_on desc");
			
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
		
		
		
		function requestDetailApprovedConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,ip_address,ip_type from whitelist_ip  where company_id=?  order by created_on desc limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function visitorsDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,name,last_name,created_on,booked from company_visitors  where company_id=? and status=0");
			
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
				$j=$j+1;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function visitorsDetailRegular($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,full_name,created_on,visiting_date,visiting_time from company_regular_visitor  where company_id=? and status=1 order by created_on desc limit 0,50");
			
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
				$j=$j+1;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function visitorsDetailRegularArrived($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,full_name,created_on,visiting_date,visiting_time from company_regular_visitor  where company_id=? and status=2 order by created_on desc limit 0,50");
			
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
				$j=$j+1;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function visitorsDetailRegularLamnat($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,full_name,created_on,visiting_date,visiting_time from company_regular_visitor  where company_id=? and status=3 order by created_on desc limit 0,50");
			
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
				$j=$j+1;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function moreRegularVisitors($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*50;
			$b=$a+50;
			$stmt = $dbCon->prepare("select id,full_name,created_on,visiting_date,visiting_time from company_regular_visitor  where company_id=?  and status=1 order by created_on desc limit ?,? ");
			
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
														<div class="padtb5 " >'.$row['full_name'].'</div>
													</td>
													
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('Y-m-d',strtotime($row['visiting_date'])).'</div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('h:i',strtotime($row['visiting_time'])).'</div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<a href="../setArrived/'.$data['cid'].'/'.$enc.'"><div class="padtb5 ">Anlänt</div></a>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														
													</td>
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
			function moreRegularVisitorsArrived($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*50;
			$b=$a+50;
			$stmt = $dbCon->prepare("select id,full_name,created_on,visiting_date,visiting_time from company_regular_visitor  where company_id=? and status=2 order by created_on desc limit ?,? ");
			
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
														<div class="padtb5 " >'.$row['full_name'].'</div>
													</td>
													
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('Y-m-d',strtotime($row['visiting_date'])).'</div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('h:i',strtotime($row['visiting_time'])).'</div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														
													</td>
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
			function moreRegularVisitorsLamnat($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*50;
			$b=$a+50;
			$stmt = $dbCon->prepare("select id,full_name,created_on,visiting_date,visiting_time from company_regular_visitor  where company_id=? and status=3 order by created_on desc limit ?,? ");
			
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
														<div class="padtb5 " >'.$row['full_name'].'</div>
													</td>
													
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('Y-m-d',strtotime($row['visiting_date'])).'</div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('h:i',strtotime($row['visiting_time'])).'</div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														
													</td>
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		
		function visitorsLeftDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,name,last_name,created_on,left_office_at,booked from company_visitors  where company_id=? and status=1");
			
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
				$j=$j+1;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function updateVisitors($data)
		{
			$dbCon = AppModel::createConnection();
			$visitor_id= $this -> encrypt_decrypt('decrypt',$data['vid']);
			//echo $visitor_id;
			$stmt = $dbCon->prepare("update company_visitors set left_office_at=now(),status=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $visitor_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function setArrived($data)
		{
			$dbCon = AppModel::createConnection();
			$visitor_id= $this -> encrypt_decrypt('decrypt',$data['vid']);
			//echo $visitor_id;
			$stmt = $dbCon->prepare("update company_regular_visitor set status=2 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $visitor_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		function setLamnat($data)
		{
			$dbCon = AppModel::createConnection();
			$visitor_id= $this -> encrypt_decrypt('decrypt',$data['vid']);
			//echo $visitor_id;
			$stmt = $dbCon->prepare("update company_regular_visitor set status=3 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $visitor_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		function moreCompanyIps($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select id,ip_address,ip_type from whitelist_ip where company_id=? order by created_on desc limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				if($row['ip_type']==1)
				{
			$div='<div class="padtb5 " ><a href="../../Company/visitorsIP/'.$data['cid'].'">Visit Page</a></div>';
			$td='<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " > Besökare</div>
				</td>';
				}
				else 
				{
			$div='<div class="padtb5 " ><a href="../../../../company/index.php/Parkering/plateInfo/'.$data['cid'].'">Visit Page</a></div>';
			$td='<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " > Parkering</div>
				</td>';
				}
				$ip="'".$row['ip_address']."'";
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
				'.$div.'
				</td>
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " > '.$row['ip_address'].'</div>
				</td>
				'.$td.'
				<td class="pad5 brdb_new tall nm hidden-xs ">
				<div class="padtb5 "><a href="#" class="show_popup_modal" data-target="#edit_ip" onclick="updatePopup('.$row['id'].','.$ip.');">Edit</a></div>
				</td>
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function visitorsCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_visitors where company_id=? and status=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		function visitorsCountRegular($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_regular_visitor where company_id=? and status=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		function visitorsCountRegularArrived($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_regular_visitor where company_id=? and status=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function visitorsCountRegularLamnat($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_regular_visitor where company_id=? and status=3");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function whilistCompanyCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from whitelist_company where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		function addedCompany($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,company_name,is_company,status,exposed_times from whitelist_company  where company_id=?");
			
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
				$j=$j+1;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function visitorsLeftCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_visitors where company_id=? and status=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function approveCountConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from whitelist_ip where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function addIp($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			if (filter_var($_POST['id'], FILTER_VALIDATE_IP)) {
				$stmt = $dbCon->prepare("INSERT INTO whitelist_ip (company_id, created_on , ip_address ) VALUES (?, now(), ?)");
				
				
				$stmt->bind_param("is", $company_id,$_POST['id']);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;
				} else {
				$dbCon->close();
				return 0;
			}
		}
		function addVisitor($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		
				$stmt = $dbCon->prepare("insert into company_regular_visitor (visitor_type,company_id,visiting_employee_id,full_name,visitor_email,visiting_date,visiting_time,created_on,repeating_cycle,meeting_room ) values (?, ?, ?, ?, ?, ?, ?, now(), ?, ?)");
			/* bind parameters for markers */
			
			$stmt->bind_param("iiissssii",$_POST['vtype'],$company_id,$_POST['ind'],htmlentities($_POST['name'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['email'],date('Y-m-d',strtotime($_POST['vdate'])),$_POST['vtime'],$_POST['vrepeat'],$_POST['meeting_room']);
				if($stmt->execute())
				{
				$stmt->close();
				$dbCon->close();
				return 1;
				}
				 else {
				 echo $stmt->error();
				 $stmt->close();
				$dbCon->close();
				return 0;
			}
		}	
			
			function addCompanyIp($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			if (filter_var($_POST['ipadd'], FILTER_VALIDATE_IP)) {
				$stmt = $dbCon->prepare("INSERT INTO whitelist_ip (company_id, created_on , ip_address, property_id, ip_type ) VALUES (?, now(), ?, ?, ?)");
				
				
				$stmt->bind_param("isii", $company_id,$_POST['ipadd'],$_POST['property_id'],$_POST['type_c']);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;
				} else {
				$dbCon->close();
				return 0;
			}
			
			
			
			
		}
		
		function addCompanyName($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			if($_POST['type_c']==1)
			{
				$msg=htmlentities($_POST['addcomp'],ENT_NOQUOTES, 'ISO-8859-1');
			}
			else if($_POST['type_c']==2)
			{
				$msg=htmlentities($_POST['addMsg'],ENT_NOQUOTES, 'ISO-8859-1');
			}
			$stmt = $dbCon->prepare("INSERT INTO whitelist_company (company_id, created_on , company_name,is_company) VALUES (?, now(), ?, ?)");
			
			
			$stmt->bind_param("isi", $company_id,$msg,$_POST['type_c']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function editIp($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			if (filter_var($_POST['ip'], FILTER_VALIDATE_IP)) {
				$stmt = $dbCon->prepare("update whitelist_ip set ip_address =? where id=? ");
				
				
				$stmt->bind_param("si", $_POST['ip'],$_POST['id']);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;
				} else {
				$dbCon->close();
				return 0;
			}
			
			
			
			
		}
		
		
		
		function activateInactive($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$r_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			
			$stmt = $dbCon->prepare("update whitelist_company set status =0 where company_id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			
			if($data['st']==0)
			{
			$st=1;
			}
			else if($data['st']==1)
			{
			$st=0;
			}
			
				$stmt = $dbCon->prepare("update whitelist_company set status =? where id=? ");
				$stmt->bind_param("ii", $st,$r_id);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			
			
			
		
		
	}							