<?php
	require_once('../AppModel.php');
	class LeveranserModel extends AppModel
	{
		function checkOpenStatus($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select max(id),max(open_date) edate from delivery_open_close where company_id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if(date('Y-m-d',strtotime($row['edate']))==date('Y-m-d'))
			{
		
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return 0;
			}
				
			
			
		}
		function verifyLanguage()
		{
			$dbCon = AppModel::createConnection();
			
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			$stmt = $dbCon->prepare("select language_var from public_page_language where ip_address=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if(empty($row))
			{
				$stmt->close();
				$dbCon->close();
				return 'en';
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return $row['language_var'];
			}
		}
		
			function changeLanguage()
		{
			$dbCon = AppModel::createConnection();
			
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			
			$stmt = $dbCon->prepare("select id from public_page_language where ip_address=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s",$ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("INSERT INTO public_page_language (language_var, ip_address, created_on ) VALUES (?, ?, now())");
			
			/* bind parameters for markers */
			$stmt->bind_param("ss", $_POST['lang'],$ip);
			$stmt->execute();
			
			}
			else
			{
			$stmt = $dbCon->prepare("update public_page_language set language_var=? where ip_address=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ss", $_POST['lang'],$ip);
			$stmt->execute();
				
			}
			
				$stmt->close();
				$dbCon->close();
				return 1;
			
		}
		
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=13");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
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
		function verifyIP($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			$stmt = $dbCon->prepare("select id from whitelist_ip where company_id=? and ip_address=? and ip_type=3");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $company_id,$ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			//print_r($row); die;
			if(empty($row))
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 1;
			}
		}
		
			function getEmployeeInfo()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select employee_id from employee_pickup_info where pickup_code=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['icode']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if(empty($row))
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return $this -> encrypt_decrypt('encrypt',$row['employee_id']);
			}
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
		
			function getCompany($data)
		{
			$dbCon = AppModel::createConnection();
			$emp_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select company_id from employees where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $emp_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $this -> encrypt_decrypt('encrypt',$row['company_id']);
			
		}
			function pickupList($data)
		{
			$dbCon = AppModel::createConnection();
			$emp_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select * from employee_pickup_info where employee_id=? and status=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $emp_id);
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
			function confirmPickup($data)
		{
			$dbCon = AppModel::createConnection();
			$emp_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("update employee_pickup_info set status=1 where employee_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $emp_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		function corporateColor($data)
			{
				$dbCon = AppModel::createConnection();
				$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
				$stmt = $dbCon->prepare("select * from corporate_color where company_id=?");
				
				$stmt->bind_param("i",$company_id);
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
			
			$stmt = $dbCon->prepare("select support_email,support_country,support_phone,sales_email,sales_country,sales_phone,invoice_email,invoice_country,invoice_phone,website,companies.country_id,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax,fb,twitter,insta,blog from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
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
		
		function selectWhitelistCompany($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("select id from whitelist_company where company_id = ? and status=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if(empty($row))
			{
				
				
				$stmt->close();
				$dbCon->close();
				return 0;
				
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return $row['id'];
			}
			
			
		}
		
		function selectWhitelistCompanyName($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select company_name,exposed_times from whitelist_company where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['comp_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$exposed=$row['exposed_times']+1;
			$stmt = $dbCon->prepare("update whitelist_company set exposed_times=? where id = ?");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $exposed,$data['comp_id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return $row['company_name'];
			
			
			
		}
		
		
		function packetInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$d=date('Y-m-d');
			$stmt = $dbCon->prepare("select count(id) as num from employee_pickup_info where company_id=? and date_today=?");
			$stmt->bind_param("is", $company_id,$d);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$count=$row['num']+1;
			$item_number='mail'.$d.'-'.$count;
			$code='sw'.$_POST['ind'].'-'.$count;
			$stmt = $dbCon->prepare("INSERT INTO employee_pickup_info (pickup_code,company_id, created_on , employee_id,date_today,total_item_received,item_number ) VALUES (?, ?, now(), ?, now() ,?, ?)");
			$stmt->bind_param("siiis", $code,$company_id,$_POST['ind'],$count,$item_number);
			$stmt->execute();	

			$stmt = $dbCon->prepare("select employees.email,phone_number,phone_country_code.country_code,employees.user_login_id,employees.company_id from employees  left join user_logins on employees.user_login_id=user_logins.id left join user_profiles on user_profiles.user_logins_id=user_logins.id left join country on user_logins.country_of_residence=country.id left join phone_country_code on phone_country_code.country_name=country.country_name  where employees.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['ind']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$emp_id= $this -> encrypt_decrypt('encrypt',$_POST['ind']);
			$url="https://www.safeqloud.com/public/index.php/EmployeeQR/employeeAccount/".$emp_id;
			$surl=getShortUrl($url);
			$to      = $row['email'];
			$subject = "Packet received";
						
			$emailContent ='We have received a packet for you. Please pick up the same from reception. please generate your qr code <a href="'.$url.'">here</a> to pickup your item on front desk. you can pickup your packet using following code on the front desk :-'.$code;
			
			//echo $emailContent; die;
			sendEmail($subject, $to, $emailContent);
			
			$phone='+'.trim($row['country_code']).''.trim($row['phone_number']);
			$subject = "Packet received";
			$to=$phone;
			$html='We have received a packet for you. Please pick up the same from reception. please show your qr code to pickup item'.$surl.'  you can pickup your packet using following code on the front desk :-'.$code;
			$res=sendSms($subject, $to, $html);
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}	
		
		
			function receivedPacket($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select item_number,date_today,concat_ws(' ',first_name,last_name) as name from employee_pickup_info left join employees on employees.id=employee_pickup_info.employee_id where employee_pickup_info.company_id=? and employee_pickup_info.status=0 limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
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
		
		
			function moreReceivedPacket($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=20;
			$stmt = $dbCon->prepare("select item_number,date_today,concat_ws(' ',first_name,last_name) as name from employee_pickup_info left join employees on employees.id=employee_pickup_info.employee_id where employee_pickup_info.company_id=? and employee_pickup_info.status=0 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
			$org=$org.'<div class=" white_bg marb20  brdrad3 box_shadow bg_fffbcc_a" style="">
										<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3  fsz12 ffamily_avenir">
													<div class="fleft wi_30 xxs-wi_33 sm-wi_40 xsip-wi_40  marl15 xs-mar0 padb10 xs-padb0 hidden-xs"> <span class="trn ffamily_avenir" data-trn-key="Name">Name</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16 ffamily_avenir">'.html_entity_decode($row['name']).'</span> </div>
													<div class="fleft wi_50    marl15 xs-mar0 padb10 xs-padb0 visible-xs"> <span class="trn ffamily_avenir" >'.html_entity_decode($row['item_number']).'</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16 ffamily_avenir">'.html_entity_decode($row['name']).'</span> </div>
													<div class="fleft talc wi_30 xxs-wi_33 sm-wi_40 xsip-wi_40 ffamily_avenir marl15 xs-mar0 padb10 xs-padb0 hidden-xs"> <span class="trn" data-trn-key="Item number">Item number</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16 ffamily_avenir">'.html_entity_decode($row['item_number']).'</span> </div>
													 
													<div class="fright talr wi_25 xxs-wi_33 sm-wi_50 xsip-wi_50 ffamily_avenir marl15 xs-mar0 padb10 xs-padb0"> <span class="trn" data-trn-key="Received">Received</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16 ffamily_avenir">'.$row['date_today'].'</span> </div>
													
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div>';
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
		}
		function moreDeliveredPacket($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=20;
			$stmt = $dbCon->prepare("select item_number,date_today,concat_ws(' ',first_name,last_name) as name from employee_pickup_info left join employees on employees.id=employee_pickup_info.employee_id where employee_pickup_info.company_id=? and employee_pickup_info.status=1 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
			$org=$org.'	<div class=" white_bg marb20  brdrad3 box_shadow bg_fffbcc_a" style="">
										<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3  fsz12 ffamily_avenir">
												<div class="fleft wi_30 xxs-wi_33 sm-wi_40 xsip-wi_40  marl15 xs-mar0 padb10 xs-padb0 hidden-xs"> <span class="trn ffamily_avenir" data-trn-key="Name">Name</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16 ffamily_avenir">'.html_entity_decode($row['name']).'</span> </div>
													<div class="fleft wi_50    marl15 xs-mar0 padb10 xs-padb0 visible-xs"> <span class="trn ffamily_avenir" >'.html_entity_decode($row['item_number']).'</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16 ffamily_avenir">'.html_entity_decode($row['name']).'</span> </div>
													<div class="fleft talc wi_30 xxs-wi_33 sm-wi_40 xsip-wi_40 ffamily_avenir marl15 xs-mar0 padb10 xs-padb0 hidden-xs"> <span class="trn" data-trn-key="Item number">Item number</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16 ffamily_avenir">'.html_entity_decode($row['item_number']).'</span> </div>
													 
													<div class="fright talr wi_25 xxs-wi_33 sm-wi_50 xsip-wi_50 ffamily_avenir marl15 xs-mar0 padb10 xs-padb0"> <span class="trn" data-trn-key="Received">Received</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16 ffamily_avenir">'.$row['date_today'].'</span> </div>
													
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div> ';
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
		}
			function deliveredPacket($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select item_number,date_today,concat_ws(' ',first_name,last_name) as name from employee_pickup_info left join employees on employees.id=employee_pickup_info.employee_id where employee_pickup_info.company_id=? and employee_pickup_info.status=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
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
		
			function receivedPacketCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from employee_pickup_info where company_id=? and status=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function deliveredPacketCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from employee_pickup_info where company_id=? and status=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
			function receivedEmployeePacket($data)
		{
			$dbCon = AppModel::createConnection();
			$emp_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select item_number,date_today,concat_ws(' ',first_name,last_name) as name from employee_pickup_info left join employees on employees.id=employee_pickup_info.employee_id where employee_pickup_info.employee_id=? and employee_pickup_info.status=0 limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $emp_id);
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
		
		
		function moreDeliveredEmployeePacket($data)
		{
			$dbCon = AppModel::createConnection();
			$emp_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$a=0;//$_POST['id']*20+1;
			$b=20;
			$stmt = $dbCon->prepare("select item_number,date_today,concat_ws(' ',first_name,last_name) as name from employee_pickup_info left join employees on employees.id=employee_pickup_info.employee_id where employee_pickup_info.employee_id=? and employee_pickup_info.status=1 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $emp_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
			$org=$org.' <div class=" white_bg marb10  brdb bg_fffbcc_a  " style="">
                                                        <div class="container padrl10 padtb15 brdrad1 fsz14 dark_grey_txt">
                                                            <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

                                                                <!--<div class="clear hidden-xs"></div>-->

                                                                <div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
                                                                    <div class="fleft wi_50p marl15">
                                                                       <div class="tdcalender" style="width:50px; height:50px;">
																		<div class="tdmonth">'.date('M',strtotime($row['date_today'])).'</div>
																		
																		<div class="padtb2 fsz25">'.date('M',strtotime($row['date_today'])).'</div>
																		<div class="fsz10 hidden">'.date('M',strtotime($row['date_today'])).'</div>
																	</div>
                                                                    </div>

                                                                    <div class="fleft wi_50 xxs-wi_70 sm-wi_50 xsip-wi_50  marl15  "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14  ">Item number</span>
                                                                        <a href="#" class="show_popup_modal black_txt"  ><span class="trn fsz18 black_txt">'.html_entity_decode($row['item_number']).'</span></a> </div>

                                                                    
                                                                     

                                                                </div>

                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>

                                                    </div>';
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
		}
			function deliveredEmployeePacket($data)
		{
			$dbCon = AppModel::createConnection();
			$emp_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select item_number,date_today,concat_ws(' ',first_name,last_name) as name from employee_pickup_info left join employees on employees.id=employee_pickup_info.employee_id where employee_pickup_info.employee_id=? and employee_pickup_info.status=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $emp_id);
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
		
			function receivedEmployeePacketCount($data)
		{
			$dbCon = AppModel::createConnection();
			$emp_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select count(id) as num from employee_pickup_info where employee_id=? and status=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $emp_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function deliveredEmployeePacketCount($data)
		{
			$dbCon = AppModel::createConnection();
			$emp_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select count(id) as num from employee_pickup_info where employee_id=? and status=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $emp_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		
		 }								
		
		
		
		