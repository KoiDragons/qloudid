<?php
	require_once('../AppModel.php');
	class DropInQueueModel extends AppModel
	{
		function alertGuest($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$queue_id= $this -> encrypt_decrypt('decrypt',$data['qid']);	
			$id= $this -> encrypt_decrypt('decrypt',$data['gid']);			
			$fname=htmlentities($_POST['guest_name'],ENT_NOQUOTES, 'ISO-8859-1');
			  
			$stmt = $dbCon->prepare("select country_code,phone_number from company_dropin_queue_waitlist left join phone_country_code on company_dropin_queue_waitlist.country_id=phone_country_code.id where company_dropin_queue_waitlist.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select company_location_queue_info.id,queue_name,visiting_address from  company_location_queue_info  left join property_location on property_location.id=company_location_queue_info.location_id where company_location_queue_info.id=(select queue_id from company_dropin_queue_waitlist where id=?)");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAddress = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select count(id) as num from company_dropin_queue_waitlist where id<? and is_serviced=0");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc(); 
			$rank=$rowAvailable['num']+1;
			$enc_id= $this -> encrypt_decrypt('encrypt',$id);	
			$url="https://www.qloudid.com/public/index.php/DropinQueue/waitingInformation/".$data['lid'].'/'.$enc_id;
			$surl=getShortUrl($url);
			$phone="+".trim($row['country_code'])."".trim($row['phone_number']);
			
			$subject='You Are #'.$rank.' on the '.$rowAddress['queue_name'].' waitlist';
			$to=$phone;
			$html='Hi '.$_POST['guest_name'].'! you are waitlisted to '.$rowAddress['queue_name'].' as #'.$rank.' in line. See live update at '.$surl;
			 
			$res=sendSms($subject, $to, $html);
			$stmt->close();
			$dbCon->close();
			return 1;
			 
			
		}
		
		
		function queueGuestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$guest_id= $this -> encrypt_decrypt('decrypt',$data['gid']);
			$stmt = $dbCon->prepare("select  * from company_dropin_queue_waitlist where company_dropin_queue_waitlist.id=?");
			$stmt->bind_param("i", $guest_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			if(!empty($rowAvailable))
			{
			$stmt = $dbCon->prepare("select  count(id) as num from company_dropin_queue_waitlist where company_dropin_queue_waitlist.id<? and is_serviced=0");
			$stmt->bind_param("i", $guest_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCount = $result->fetch_assoc();
			$rowAvailable['position_inline']=$rowCount['num']+1;	
			}
			$stmt->close();
			$dbCon->close();
			 
			return $rowAvailable;
			
			
		}
		
		
		
		
		
		function queueGuestOperatorDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$guest_id= $this -> encrypt_decrypt('decrypt',$data['gid']);
			$stmt = $dbCon->prepare("select  concat_ws(' ',first_name,last_name) as name from user_logins where id=(select serving_user_id from company_dropin_queue_waitlist where company_dropin_queue_waitlist.id=?)");
			$stmt->bind_param("i", $guest_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			 
			return $rowAvailable;
			
			
		}
		
		function queueGuestInWaiting($data)
		{
			$dbCon = AppModel::createConnection();
			$queue_id= $this -> encrypt_decrypt('decrypt',$data['qid']);
			$stmt = $dbCon->prepare("select id,guest_name,total_person from company_dropin_queue_waitlist where company_dropin_queue_waitlist.queue_id=? and is_serviced=0");
			$stmt->bind_param("i", $queue_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowAvailable = $result->fetch_assoc())
			{
				$rowAvailable['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				array_push($org,$rowAvailable);
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			 
			return $org;
			
			
		}
		
		
		function updateNoShow($data)
		{
			$dbCon = AppModel::createConnection();
			$guest_id= $this -> encrypt_decrypt('decrypt',$data['gid']);
			$stmt = $dbCon->prepare("select  is_serviced from company_dropin_queue_waitlist where company_dropin_queue_waitlist.id=?");
			$stmt->bind_param("i", $guest_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCount = $result->fetch_assoc();
			if($rowCount['is_serviced']==0)
			{
			$stmt = $dbCon->prepare("delete from company_dropin_queue_waitlist where id=?");
			$stmt->bind_param("i", $guest_id);
			$stmt->execute();	
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function updateInServicing($data)
		{
			$dbCon = AppModel::createConnection();
			$guest_id= $this -> encrypt_decrypt('decrypt',$data['gid']);
			$stmt = $dbCon->prepare("select  is_serviced from company_dropin_queue_waitlist where company_dropin_queue_waitlist.id=?");
			$stmt->bind_param("i", $guest_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCount = $result->fetch_assoc();
			if($rowCount['is_serviced']==0)
			{
			$stmt = $dbCon->prepare("update company_dropin_queue_waitlist set is_serviced=1,serving_user_id=?,modified_on=now() where id=?");
			$stmt->bind_param("ii", $data['user_id'],$guest_id);
			$stmt->execute();	
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		function updateCloseService($data)
		{
			$dbCon = AppModel::createConnection();
			$guest_id= $this -> encrypt_decrypt('decrypt',$data['gid']);
			
			$stmt = $dbCon->prepare("update company_dropin_queue_waitlist set is_serviced=2 where id=?");
			$stmt->bind_param("i", $guest_id);
			$stmt->execute();	
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function queueGuestInServicing($data)
		{
			$dbCon = AppModel::createConnection();
			$queue_id= $this -> encrypt_decrypt('decrypt',$data['qid']);
			$stmt = $dbCon->prepare("select  id,guest_name,total_person from company_dropin_queue_waitlist where company_dropin_queue_waitlist.queue_id=? and is_serviced=1");
			$stmt->bind_param("i", $queue_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowAvailable = $result->fetch_assoc())
			{
				$rowAvailable['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				array_push($org,$rowAvailable);
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			 
			return $org;
			
			
		}
		
		
		function queueGuestServiced($data)
		{
			$dbCon = AppModel::createConnection();
			$queue_id= $this -> encrypt_decrypt('decrypt',$data['qid']);
			$stmt = $dbCon->prepare("select id,guest_name,total_person from company_dropin_queue_waitlist where company_dropin_queue_waitlist.queue_id=? and is_serviced=2 limit 0,10");
			$stmt->bind_param("i", $queue_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowAvailable = $result->fetch_assoc())
			{
				$rowAvailable['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				array_push($org,$rowAvailable);
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			 
			return $org;
			
			
		}
		
		function queueGuestServicedCount($data)
		{
			$dbCon = AppModel::createConnection();
			$queue_id= $this -> encrypt_decrypt('decrypt',$data['qid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_dropin_queue_waitlist where company_dropin_queue_waitlist.queue_id=? and is_serviced=2");
			$stmt->bind_param("i", $queue_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			 
			return $rowAvailable;
			
			
		}
		
		function queueGuestWaitingCount($data)
		{
			$dbCon = AppModel::createConnection();
			$queue_id= $this -> encrypt_decrypt('decrypt',$data['qid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_dropin_queue_waitlist where company_dropin_queue_waitlist.queue_id=? and is_serviced=0");
			$stmt->bind_param("i", $queue_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			 
			return $rowAvailable;
			
			
		}
		
		
		function queueGuestWaitingInQueueNext($data)
		{
			$dbCon = AppModel::createConnection();
			$queue_id= $this -> encrypt_decrypt('decrypt',$data['qid']);
			$stmt = $dbCon->prepare("select min(id) as num from company_dropin_queue_waitlist where company_dropin_queue_waitlist.queue_id=? and is_serviced=0");
			$stmt->bind_param("i", $queue_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			 $val=$this->encrypt_decrypt('encrypt',$rowAvailable['num']);
			 //echo $val; die;
			return $val;
			
			
		}
		
		function moreQueueGuestServiced($data)
		{
			$dbCon = AppModel::createConnection();
			$queue_id= $this -> encrypt_decrypt('decrypt',$data['qid']);
			$a=$_POST['id']*10;
			 
			$stmt = $dbCon->prepare("select id,guest_name,total_person from company_dropin_queue_waitlist where company_dropin_queue_waitlist.queue_id=? and is_serviced=2 limit ?,10");
			$stmt->bind_param("ii", $queue_id,$a);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			if($a%2==0)
			{
			$j=0;	
			}
			else
			{
			$j=1;	
			}
			while($rowAvailable = $result->fetch_assoc())
			{
				if($j%2==0)
				{
					$bg='lgtgrey_bg';
				}
				else
				{
					$bg='white_bg';
				}
				$org=$org.'<a href="#"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.'  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 hidden-xs "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['guest_name'],0,1).'</div>
																	</div>
													
													<div class="fleft wi_60   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">'.$row['guest_name'].'</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">Total person - '.$row['total_person'].'</span>  </div>
													
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div></a>';
											$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			 
			return $org;
			
			
		}
		
		
			function checkPermission($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,is_admin from manage_employee_permissions where user_id=? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $data['user_id'],$company_id);
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
				if($row['is_admin']==0)
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
			
			
		}
		function queueDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("select queue_name, company_id, `location_id`, `total_operators`, `opening_time`, `closing_time`, `tokan_closing` from  company_location_queue_info where company_location_queue_info.id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$rowAvailable = $result->fetch_assoc();
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			 
			return $rowAvailable;
			
			
		}
		
		function employeeDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email from employees where user_login_id in (select  user_login_id from user_company_profile where location_id=(select location_id from company_location_queue_info where id=?)) and company_id=?");
			$stmt->bind_param("ii", $id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowAvailable = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select count(id) as num from company_location_queue_employees where queue_id=? and employee_id=?");
			$stmt->bind_param("ii", $id,$rowAvailable['id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row = $result1->fetch_assoc();
			$rowAvailable['is_operator']=$row['num'];
			$rowAvailable['enc']=$this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
			array_push($org,$rowAvailable);	
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		function addOperator($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$eid= $this -> encrypt_decrypt('decrypt',$data['eid']);			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("insert into company_location_queue_employees(queue_id, created_on, employee_id)
			values(?,now(),?)");
			$stmt->bind_param("ii",$id,$eid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			 
		}
		function removeOperator($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$eid= $this -> encrypt_decrypt('decrypt',$data['eid']);			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("delete from company_location_queue_employees where queue_id=? and employee_id=?");
			$stmt->bind_param("ii",$id,$eid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			 
		}
		
		function addQueue($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$queue_name=htmlentities($_POST['queue_name'],ENT_NOQUOTES, 'ISO-8859-1');
			 
			$stmt = $dbCon->prepare("insert into company_location_queue_info(queue_name, created_on, company_id, `location_id`, `total_operators`, `opening_time`, `closing_time`, `tokan_closing` )
			values(?,now(),?,?,?,?,?,?)");
			$stmt->bind_param("siiisss",$queue_name,$company_id,$_POST['p_id'],$_POST['t_operators'],$_POST['open_hrs'],$_POST['closing_hrs'],$_POST['token_closing']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			 
		}
		
		
		function updateQueue($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$queue_name=htmlentities($_POST['queue_name'],ENT_NOQUOTES, 'ISO-8859-1');
			 
			$stmt = $dbCon->prepare("update company_location_queue_info set is_active=1,`total_operators`=?, `opening_time`=?, `closing_time`=?, `tokan_closing`=? where id=?");
			$stmt->bind_param("issii",$_POST['t_operators'],$_POST['open_hrs'],$_POST['closing_hrs'],$_POST['token_closing'],$id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update resturant_dining_hall set dining_hall_name=? where dining_queue_id=?");
			$stmt->bind_param("si",$queue_name, $id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			 
		}
		 function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		 
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=47");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $this -> encrypt_decrypt('encrypt',$row['id']);;
		}
		function appId()
		{
			
			return $this -> encrypt_decrypt('encrypt',47);
		}
		
		function locationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select hotel_name,property_location.id,property_name,visiting_address,property_location.created_on,is_hotel from property_location left join property on property.id=property_location.property_id left join hotel_basic_information on hotel_basic_information.property_id=property_location.id  where property_location.company_id=? order by created_on desc");
			
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
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		 function workingHrs($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from working_hrs");
			
			/* bind parameters for markers */
			 
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
		
		 
		function queueDetailInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select company_location_queue_info.id,queue_name,visiting_address,is_active from  company_location_queue_info  left join property_location on property_location.id=company_location_queue_info.location_id where company_location_queue_info.company_id=? and published_queue=1 limit 0,10");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowAvailable = $result->fetch_assoc())
			{
				$rowAvailable['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				array_push($org,$rowAvailable);
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			 
			return $org;
			
			
		}
		
		
		
		
		
		function queueDetailInfoCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from  company_location_queue_info where company_id=?  and published_queue=1");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			 
			return $rowAvailable;
			
			
		}
		
		
		function queueDetailLocationInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$stmt = $dbCon->prepare("select company_location_queue_info.id,queue_name,visiting_address,is_active from  company_location_queue_info  left join property_location on property_location.id=company_location_queue_info.location_id where company_location_queue_info.location_id=? and published_queue=1 and is_active=1 limit 0,10");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowAvailable = $result->fetch_assoc())
			{
				$rowAvailable['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				array_push($org,$rowAvailable);
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			 
			return $org;
			
			
		}
		
		
		
		
		
		function queueDetailLocationInfoCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$stmt = $dbCon->prepare("select count(id) as num from  company_location_queue_info where location_id=?  and published_queue=1  and is_active=1");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			 
			return $rowAvailable;
			
			
		}
		
		
		
		 function moreQueueDetailInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*10;
			$b=10;
			$stmt = $dbCon->prepare("select company_location_queue_info.id,queue_name,visiting_address,is_active from  company_location_queue_info  left join property_location on property_location.id=company_location_queue_info.location_id where company_location_queue_info.company_id=?  and published_queue=1  and is_active=1 limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			if($a%2==0)
			{
			$j=0;	
			}
			else
			{
			$j=1;	
			}
			
			while($row = $result->fetch_assoc())
			{
				$enc= $this -> encrypt_decrypt('encrypt',$row['id']);
				  
				  
				if($j%2==0)
				{
					$bg='lgtgrey_bg';
				}
				else
				{
					$bg='white_bg';
				}
				if($row['is_active']==1)
				{
					$active="Active";
				}
				else
				{
					$active="Inactive";
				}
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.'  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 hidden-xs "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['queue_name'],0,1).'</div>
																	</div>
													
													<div class="fleft wi_60   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">'.$row['queue_name'].'-'.$active.'</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">'.$row['visiting_address'].'</span>  </div>
													<a href="../editQueueinformation/'.$data['cid'].'/'.$enc.'">
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20">
														  <span class="fas fa-edit txt_cfdbea" aria-hidden="true"></span> 
													</div>
													</a>
													<a href="../employeeList/'.$data['cid'].'/'.$enc.'">
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div>
													</a>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>';
											$j++;
				
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		 
	}						