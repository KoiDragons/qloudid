<?php
	require_once('../AppModel.php');
	class CurlModel extends AppModel
	{
		function chargeCustomer()
		{
			$dbCon = AppModel::createConnection();
			$d=date('Y-m-d');
			$stmt = $dbCon->prepare("select new_subscription_id,new_plan_is_free,new_plan_is_one_time,payment_info,TIMESTAMPDIFF(DAY,company_app_payment.created_on,now()) as timedifference,company_app_payment.id,company_app_payment.app_id,plan_id,company_app_payment.company_id,customer_id,company_app_payment.created_on,subscription_id,app_price,billing_type,billing_period from company_app_payment left join app_price_info on app_price_info.id=company_app_payment.subscription_id left join apps_detail on apps_detail.id=company_app_payment.app_id where next_date_available=0 and next_payment_date=?");
			/* bind parameters for markers */
			$stmt->bind_param("s", $d);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
				if($row['new_plan_is_free']==1)
				{
				$stmt = $dbCon->prepare("update safe_qid_plan_detail set plan_type=1 where app_id=? and company_id=?");
				$stmt->bind_param("ii",$row['app_id'],$row['company_id']);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("update company_app_payment set next_payment_date=null where app_id=? and company_id=? and next_date_available=0");
				$stmt->bind_param("ii",$row['app_id'],$row['company_id']);
				$stmt->execute();
				
				continue;
					
				}
				
				if($row['new_subscription_id']>0 && $row['new_subscription_id']<$row['subscription_id'])
				{
				$stmt = $dbCon->prepare("update company_app_payment set subscription_id=?,new_subscription_id=0 where id=?");
				$stmt->bind_param("ii",$row['new_subscription_id'],$row['id']);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("select  app_price,billing_type,billing_period from app_price_info where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['new_subscription_id']);
				$stmt->execute();
				$result_app = $stmt->get_result();
				$row_app = $result_app->fetch_assoc();
				$row['subscription_id']=$row['new_subscription_id'];
				$row['app_price']=$row_app['app_price'];
				$row['billing_type']=$row_app['billing_type'];
				$row['billing_period']=$row_app['billing_period'];				
				}
			if(($row['billing_period']==1 && $row['timedifference']==1) || ($row['billing_period']==2 && $row['timedifference']==7) || ($row['billing_period']==3 && $row['timedifference']==30) || ($row['billing_period']==4 && $row['timedifference']==90) || ($row['billing_period']==5 && $row['timedifference']==180) || ($row['billing_period']==6 && $row['timedifference']==365))
			{
			if($row['payment_info']==1)
			{
			$row['payment_multi']=1;	
				
			}
			else if($row['payment_info']==2)
			{
			$stmt = $dbCon->prepare("select count(location_id) as num from company_apps_location where company_id=? and app_id=?");
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("ii", $row['company_id'],$row['app_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowLoc = $result->fetch_assoc();	
			if($rowLoc['num']==0)
			{
			$row['payment_multi']=1;	
			}
			else
			{
			$row['payment_multi']=	$rowLoc['num'];	
			}
			
			}
			else if($row['payment_info']==3)
			{
			$stmt = $dbCon->prepare("select sum(total_desk) as num from company_apps_location where company_id=? and app_id=?");
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("ii", $row['company_id'],$row['app_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowLoc = $result->fetch_assoc();	
			if($rowLoc['num']==0)
			{
			$row['payment_multi']=1;	
			}
			else
			{
			$row['payment_multi']=	$rowLoc['num'];	
			}
			}
			
			\Stripe\Stripe::setApiKey(secret_key);
			$charge = \Stripe\Charge::create( array( "customer" => $row['customer_id'],
							'amount' => (($row['payment_multi']*$row['app_price'])*100), 
							'currency' => 'sek',
							'description' => "none",
							 
						) ); 	
						
				if ($charge->paid == true) {
					
					$Chargeid=$charge->id;
					if($row['billing_period']==1)	
					{
						$date=date('Y-m-d h:i:s');
						$datetime = new DateTime($date);
						$datetime->modify('+1 day');
					}
					else if($row['billing_period']==2)	
					{
						$date=date('Y-m-d h:i:s');
						$datetime = new DateTime($date);
						$datetime->modify('+7 day');
					}
					else if($row['billing_period']==3)	
					{
						$date=date('Y-m-d h:i:s');
						$datetime = new DateTime($date);
						$datetime->modify('+30 day');
					}
					else if($row['billing_period']==4)	
					{
						$date=date('Y-m-d h:i:s');
						$datetime = new DateTime($date);
						$datetime->modify('+90 day');
					}	
					else if($row['billing_period']==5)	
					{
						$date=date('Y-m-d h:i:s');
						$datetime = new DateTime($date);
						$datetime->modify('+180 day');
					}
					else if($row['billing_period']==6)	
					{
						$date=date('Y-m-d h:i:s');
						$datetime = new DateTime($date);
						$datetime->modify('+365 day');
					}
					$date= $datetime->format('Y-m-d H:i:s');
					$currency='sek';
					$price=$row['payment_multi']*$row['app_price'];
					$stmt = $dbCon->prepare("update company_app_payment  set next_date_available=1 where id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['id']);
					$stmt->execute();
					
					$stmt = $dbCon->prepare("insert into company_app_payment (plan_id,app_id,company_id,amount,currency,created_on,transection_id,subscription_id,customer_id,next_payment_date) values (?, ?, ?, ?, ?, now(),?, ?, ?, ?)");
					
					/* bind parameters for markers */
					$stmt->bind_param("iiiisssss", $row['plan_id'],$row['app_id'],$row['company_id'],$price,$currency,$Chargeid,$row['subscription_id'],$row['customer_id'],$date);
					$stmt->execute();
					
						$to      = $row['company_email'];
						$subject = "Invoice info";
			
						$emailContent ='Your card has beed charged today for SEK: '.$price.' by Qloudid as per your subscription plan and next date for payment for app is :'.$date;
			
						sendEmail($subject, $to, $emailContent);
				}					
			}		 
			}
			 
						
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function deletePersonalUserRequests()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select id,TIMESTAMPDIFF(HOUR,created_on,now()) as timedifference from user_detail_requests where status=1");
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
				
				if($row['timedifference']>=24)
				{
					$stmt = $dbCon->prepare("delete from user_detail_requests where id=?");
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['id']);
					$stmt->execute();
				}
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			
			
			function informEmployeeVisitorInformation()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select employee_id,company_visitors.company_id,company_visitors.id,TIMESTAMPDIFF(MINUTE,created_on,now()) as timedifference,employees.email as employee_email  from company_visitors left join employees on employees.id=company_visitors.employee_id where company_visitors.status=0");
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
				//echo ($row['timedifference'])/30;
				if(round(($row['timedifference'])/30)>=2)
				{
			
			$cid=$this->encrypt_decrypt('encrypt',$row['company_id']);
			$rid=$this->encrypt_decrypt('encrypt',$row['id']);
			$url='https://www.qloudid.com/company/index.php/Company/updateVisitors/'.$rid.'?visitor=0';
			$surl=getShortUrl($url);
			$url='https://www.qloudid.com/company/index.php/Company/updateVisitors/'.$rid.'?visitor=1';
			$surl1=getShortUrl($url);
			$to      = $row['employee_email'];
			$subject = "Confirm visitor";
			
			$emailContent ='Is your visitor still in company? Please confirm <a href="'.$surl.'"> Here </a>';
			
			sendEmail($subject, $to, $emailContent);
			
			$stmt = $dbCon->prepare("select country_code,phone_number,passport_image  from user_profiles left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone left join user_logins on user_logins.id=user_profiles.user_logins_id where user_profiles.user_logins_id=(select user_login_id from employees where id=?)");
				
				$stmt->bind_param("i",$row['employee_id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row_phone = $result1->fetch_assoc();
				
				$phone='+'.trim($row_phone['country_code']).''.trim($row_phone['phone_number']);
				$subject='Confirm Your visitor';
				$to=$phone;
				$html='Is your visitor still in company? Please confirm '.$surl;
				//echo $html.' '.$to;
				$res=sendSms($subject, $to, $html);
				
				
				$stmt = $dbCon->prepare("select country_code,phone_number from company_visitors left join phone_country_code on phone_country_code.country_name=company_visitors.country where company_visitors.id=?");
				
				$stmt->bind_param("i",$row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row_phone = $result1->fetch_assoc();
				
				$phone='+'.trim($row_phone['country_code']).''.trim($row_phone['phone_number']);
				$subject='Confirm Your visit';
				$to=$phone;
				$html='If you are still in company? Please confirm '.$surl1;
				//echo $html.' '.$to;
				$res=sendSms($subject, $to, $html);
				
				}
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			}
		
		
		function employeeRelievingInformation()
		{
			$dbCon = AppModel::createConnection();
			$d=date('Y-m-d',strtotime("-1 days"));
			$stmt = $dbCon->prepare("select * from employee_relieving_information where when_to_relieve<=? and is_relieved=0");
			/* bind parameters for markers */
			$stmt->bind_param("s", $d);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("update employee_relieving_information set is_relieved=1 where id=?");
					/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
				
			$stmt = $dbCon->prepare("delete from estore_employee_invite where company_id=? and real_employee_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $row['company_id'],$row['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from user_company_profile where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $row['company_id'],$row['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from company_permission where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $row['company_id'],$row['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from employees where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $row['company_id'],$row['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from employee_request_cloud where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $row['company_id'],$row['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from manage_employee_permissions where company_id=? and user_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $row['company_id'],$row['user_id']);
			$stmt->execute();
			
			}
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			}
	
	function employeeRequestRelievingInformation()
		{
			$dbCon = AppModel::createConnection();
			$d=date('Y-m-d',strtotime("-1 days"));
			$stmt = $dbCon->prepare("select * from employee_request_relieving_information where when_to_relieve<=? and is_relieved=0");
			/* bind parameters for markers */
			$stmt->bind_param("s", $d);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("update employee_request_relieving_information set is_relieved=1 where id=?");
					/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("update estore_employee_invite set is_relieved=1 where id=?");
					/* bind parameters for markers */
				$stmt->bind_param("i", $row['employee_id']);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("select * from employees where id=?");
			/* bind parameters for markers */
				$stmt->bind_param("i", $row['employee_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowEmployee = $result->fetch_assoc();
				$data['user_id']=$rowEmployee['user_login_id'];
				$data['company_id']=$rowEmployee['company_id'];
				$update=$this->disconnectEmployee($data);
			}
			
			$stmt = $dbCon->prepare("select * from employee_request_unsent_relieving_information where when_to_relieve<=? and is_relieved=0");
			/* bind parameters for markers */
			$stmt->bind_param("s", $d);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("update employee_request_unsent_relieving_information set is_relieved=1 where id=?");
					/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("update estore_employee_uninvited set is_relieved=1 where id=?");
					/* bind parameters for markers */
				$stmt->bind_param("i", $row['employee_id']);
				$stmt->execute();
			}
			
			
			
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			
			
			function disconnectEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id=$data['company_id'];
			
			
			$stmt = $dbCon->prepare("delete from estore_employee_invite where company_id=? and real_employee_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from user_company_profile where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from company_permission where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from employees where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from employee_request_cloud where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from manage_employee_permissions where company_id=? and user_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select company_email from companies where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select email from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row_user = $result1->fetch_assoc();
			
			$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where company_id=?");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_invited = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where company_id=? and real_employee_id is not null");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_invited_approved = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select count(id) as num from employee_request_cloud where company_id=?");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_request = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select count(id) as num from employee_request_cloud where company_id=? and is_approved=1");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_request_approved = $result->fetch_assoc();
			
			$total_request=$row_invited['num']+$row_request['num'];
			$total_request_approved=$row_invited_approved['num']+$row_request_approved['num'];
			$completed=($total_request_approved/$total_request)*100;
			$completed=round($completed,0);
			
			$stmt = $dbCon->prepare("update company_profiles set completed_requests=? where company_id=?");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("ii", $completed,$company_id);
			$stmt->execute();
			
			
			$fields=array();
			$fields['user_email']=$row_user['email'];
			$fields['company_email']=$row['company_email'];
			$url='https://www.qmatchup.com/beta/user/index.php/Invitation/disconnectEmployee';
			$ch = curl_init();
			//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch,CURLOPT_URL, $url);
			curl_setopt($ch,CURLOPT_POST, count($fields));
			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_REFERER, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, true);
			curl_setopt($ch, CURLOPT_COOKIEFILE, true);
			
			$result=curl_exec ($ch);
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			//	echo curl_error($ch);
			//echo $status_code; die;
			curl_close ($ch);
			//echo $result; die;
			if($result==0)
			{
				//echo "none"; die;
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			else
			{
				//echo "jain"; die;
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			
		}
		
	
	function addEmployee($data)
	{
	$dbCon = AppModel::createConnection();
	$id= $this -> encrypt_decrypt('decrypt',$data['value']);
	 $_POST=json_decode($id,true);
	 
			$stmt = $dbCon->prepare("select id from companies where company_email=?");
			$stmt->bind_param("s",$_POST['company_email']);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			$row = $result->fetch_assoc();
			 
			if($_POST['email']==null || $_POST['email']=="")
			{
			$stmt = $dbCon->prepare("insert into estore_employee_uninvited (first_name,last_name,country_id,phone_number,email,work_email,employee_number,company_id,created_on) values(?, ?, ?, ?, ?, ?, ?, ?, now())");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ssissssi", $_POST['fname'], $_POST['lname'], $_POST['d_country'], $_POST['wmobile'], $_POST['email'], $_POST['wemail'], $_POST['enumber'],$row['id']);
			$stmt->execute();
			}
			else
			{
			$stmt = $dbCon->prepare("insert into estore_employee_invite (name,last_name,d_country,phone,email,work_email,employee_number,company_id,created_on) values(?, ?, ?, ?, ?, ?, ?, ?, now())");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ssissssi", $_POST['fname'], $_POST['lname'], $_POST['d_country'], $_POST['wmobile'], $_POST['email'], $_POST['wemail'], $_POST['enumber'],$row['id']);
			$stmt->execute();
			$in_id=$stmt->insert_id;
			$unique_id=$row['id']."_".date('Y-m-d h:i:s');
			$unique_id=$this->encrypt_decrypt('encrypt',$unique_id);
			
			$stmt = $dbCon->prepare("insert into virtual_user_profiles (`invited_user_id`,`created_on`,`modified_on`) values (?, ?, ?)");
			$stmt->bind_param("iss", $in_id,$d,$d);
			$stmt->execute(); 
			
			$stmt = $dbCon->prepare("insert into invitation(invited_user_id,created_date,unique_id) values (?, now(), ?)");
			$stmt->bind_param("is", $in_id,$unique_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("insert into virtual_user_company_profile (`company_id`,`invited_user_id`) values (?, ?)") ;
			$stmt->bind_param("ii", $company_id,$in_id);
			$stmt->execute();
			
			$to=$_POST['email'];
					$subject="Employer Connection Request";
					$emailContent='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml">
					<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					<title></title>
					</head>
					<body style="width:100%; background-color:#f5f5f5; margin:0; padding:0;" align="center">
					<div style="width:100%; background-color:#f5f5f5;" align="center">
					<div align="center" style="padding-top:20px; padding-bottom:20px; font-family:Arial, Helvetica, sans-serif; color:#6b6f74">
					<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
					<td align="right" scope="col" style="font-size:10px; color:#a7a9ac;"><div style="padding-bottom:5px; padding-top:5px;"> <a href="#" style="color:#a7a9ac; text-decoration:none;">View in browser</a> | <a href="#" style="color:#a7a9ac; text-decoration:none;">Read in Swedish</a> </div></td>
					</tr>
					<tr>
					<td><table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#3691c0" style="background-color:#3691c0;">
					<tr>
					<td scope="col" width="50%" align="left" valign="top" style="padding:25px;"><div style="color:#FFFFFF">
					<div style="font-size:36px;">Welcome</div>
					<div style="font-size:11px;">' . date("d/m/Y") . '</div>
					</div></td>
					<td scope="col" align="right" width="50%" valign="top" style="padding:25px;"><div style="text-align:right"><img src="https://www.qmatchup.com/beta/tabcss/mages/images/qmacthup.png" alt="Qloudid" title="Qloudid" style="font-size:35px; color:#FFFFFF;" /></div></td>
					</tr>
					</table></td>
					</tr>
					<tr>
					<td style="background-color:#FFFFFF;"><table width="100%" border="0" cellspacing="0" cellpadding="20">
					<tr>
					<td align="left" valign="top" scope="col"><div style="font-size:18px">Hej  <b>' .$_POST['email'] . '</b>,</div>
					<div style="font-size:14px; padding-top:20px;">
					
					<div style="padding-bottom:10px;"> <h3>På svenska  </h3> </br>
					
					Jag vill be dig ansluta dig till oss med ditt Qloud ID konto och därmed registrera dig som en anställd i våra system.
					
					
					</div>
					
					</div></td>
					</tr>
					<tr>
					<td align="left" valign="top" scope="col"><a href="https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorShow" style="display:inline-block; padding:20px 35px; font-weight:bold; color:#FFF; background-color:#6ab743; text-decoration:none; border-radius:3px; -webkit-border-radius:3px; ">Var god och klicka på den gröna knappen </a></td>
					</tr>
					<tr>
					<td align="left" valign="top" scope="col"><div style="font-size:14px;">Din kod:  <br />
					<a href="#" style="text-decoration:none; color:#3691c0;">'.$unique_id.' </a></div></td>
					</tr>
					<tr>
					<td align="left" valign="top" scope="col" style="font-size:16px;"><div style="padding-bottom:5px;">Warm regards,</div>
					<div><b style="color:#6b6f74;">The Qloudid team</b></div></td>
					</tr>
					</table></td>
					</tr>
					<tr>
					<td align="center" valign="top"><div style="padding-top:10px; font-size:11px;">This message was sent to <a href="mailto:#" style="text-decoration:none; color:#3691c0;">' . $_POST['email']. '</a>. If you dont want to receive these emails from Qloudid.com in the future, <br />
					please click <a href="#" style="text-decoration:none; color:#3691c0;">unsubscribe</a>. <a style="text-decoration:none; color:#6b6f74;" href="https://www.Qloudid.com"></a> Qloudid Outsourcing AB, Stureplan 6, 114 35, Stockholm, Sweden</div></td>
					</tr>
					</table>
					</div>
					</div>
					</body>
					</html>';
					
					sendEmail($subject, $to, $emailContent  );
			}	

		$stmt->close();
        $dbCon->close();
		 return 1;			
	}
	
	function editEmployee($data)
	{
	$dbCon = AppModel::createConnection();
	$id= $this -> encrypt_decrypt('decrypt',$data['value']);
	 $_POST=json_decode($id,true);
	 
			$stmt = $dbCon->prepare("select id from companies where company_email=?");
			$stmt->bind_param("i",$_POST['company_email']);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			$row = $result->fetch_assoc();
			if($_POST['email']==null || $_POST['email']=="")
			{
			$stmt = $dbCon->prepare("update estore_employee_uninvited set first_name=?,last_name=?,country_id=?,phone_number=?,email=?,work_email=?,employee_number=?,company_id=? where employee_number=?");
			
			/* bind parameters for markers */
			 
			$stmt->bind_param("ssissssis", $_POST['fname'], $_POST['lname'], $_POST['d_country'], $_POST['wmobile'], $_POST['email'], $_POST['wemail'], $_POST['enumber'],$row['id'],$_POST['employee_number']);
			$stmt->execute();
			}
			else
			{
			$stmt = $dbCon->prepare("delete from estore_employee_uninvited where employee_number=?");
			
			/* bind parameters for markers */
			 
			$stmt->bind_param("s", $_POST['employee_number']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("insert into estore_employee_invite (name,last_name,d_country,phone,email,work_email,employee_number,company_id,created_on) values(?, ?, ?, ?, ?, ?, ?, ?, now())");
			
			/* bind parameters for markers */
			 
			$stmt->bind_param("ssissssi", $_POST['fname'], $_POST['lname'], $_POST['d_country'], $_POST['wmobile'], $_POST['email'], $_POST['wemail'], $_POST['enumber'],$row['id']);
			$stmt->execute();
			$in_id=$stmt->insert_id;
			$unique_id=$row['id']."_".date('Y-m-d h:i:s');
			$unique_id=$this->encrypt_decrypt('encrypt',$unique_id);
			
			$stmt = $dbCon->prepare("insert into virtual_user_profiles (`invited_user_id`,`created_on`,`modified_on`) values (?, ?, ?)");
			$stmt->bind_param("iss", $in_id,$d,$d);
			$stmt->execute(); 
			
			$stmt = $dbCon->prepare("insert into invitation(invited_user_id,created_date,unique_id) values (?, now(), ?)");
			$stmt->bind_param("is", $in_id,$unique_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("insert into virtual_user_company_profile (`company_id`,`invited_user_id`) values (?, ?)") ;
			$stmt->bind_param("ii", $company_id,$in_id);
			$stmt->execute();
			
			$to=$_POST['email'];
					$subject="Employer Connection Request";
					$emailContent='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml">
					<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					<title></title>
					</head>
					<body style="width:100%; background-color:#f5f5f5; margin:0; padding:0;" align="center">
					<div style="width:100%; background-color:#f5f5f5;" align="center">
					<div align="center" style="padding-top:20px; padding-bottom:20px; font-family:Arial, Helvetica, sans-serif; color:#6b6f74">
					<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
					<td align="right" scope="col" style="font-size:10px; color:#a7a9ac;"><div style="padding-bottom:5px; padding-top:5px;"> <a href="#" style="color:#a7a9ac; text-decoration:none;">View in browser</a> | <a href="#" style="color:#a7a9ac; text-decoration:none;">Read in Swedish</a> </div></td>
					</tr>
					<tr>
					<td><table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#3691c0" style="background-color:#3691c0;">
					<tr>
					<td scope="col" width="50%" align="left" valign="top" style="padding:25px;"><div style="color:#FFFFFF">
					<div style="font-size:36px;">Welcome</div>
					<div style="font-size:11px;">' . date("d/m/Y") . '</div>
					</div></td>
					<td scope="col" align="right" width="50%" valign="top" style="padding:25px;"><div style="text-align:right"><img src="https://www.qmatchup.com/beta/tabcss/mages/images/qmacthup.png" alt="Qloudid" title="Qloudid" style="font-size:35px; color:#FFFFFF;" /></div></td>
					</tr>
					</table></td>
					</tr>
					<tr>
					<td style="background-color:#FFFFFF;"><table width="100%" border="0" cellspacing="0" cellpadding="20">
					<tr>
					<td align="left" valign="top" scope="col"><div style="font-size:18px">Hej  <b>' .$_POST['email'] . '</b>,</div>
					<div style="font-size:14px; padding-top:20px;">
					
					<div style="padding-bottom:10px;"> <h3>På svenska  </h3> </br>
					
					Jag vill be dig ansluta dig till oss med ditt Qloud ID konto och därmed registrera dig som en anställd i våra system.
					
					
					</div>
					
					</div></td>
					</tr>
					<tr>
					<td align="left" valign="top" scope="col"><a href="https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorShow" style="display:inline-block; padding:20px 35px; font-weight:bold; color:#FFF; background-color:#6ab743; text-decoration:none; border-radius:3px; -webkit-border-radius:3px; ">Var god och klicka på den gröna knappen </a></td>
					</tr>
					<tr>
					<td align="left" valign="top" scope="col"><div style="font-size:14px;">Din kod:  <br />
					<a href="#" style="text-decoration:none; color:#3691c0;">'.$unique_id.' </a></div></td>
					</tr>
					<tr>
					<td align="left" valign="top" scope="col" style="font-size:16px;"><div style="padding-bottom:5px;">Warm regards,</div>
					<div><b style="color:#6b6f74;">The Qloudid team</b></div></td>
					</tr>
					</table></td>
					</tr>
					<tr>
					<td align="center" valign="top"><div style="padding-top:10px; font-size:11px;">This message was sent to <a href="mailto:#" style="text-decoration:none; color:#3691c0;">' . $_POST['email']. '</a>. If you dont want to receive these emails from Qloudid.com in the future, <br />
					please click <a href="#" style="text-decoration:none; color:#3691c0;">unsubscribe</a>. <a style="text-decoration:none; color:#6b6f74;" href="https://www.Qloudid.com"></a> Qloudid Outsourcing AB, Stureplan 6, 114 35, Stockholm, Sweden</div></td>
					</tr>
					</table>
					</div>
					</div>
					</body>
					</html>';
					
					sendEmail($subject, $to, $emailContent  );
			}	

		$stmt->close();
        $dbCon->close();
		 return 1;			
	}
	
	function relieveEmployee($data)
	{
		$id= $this -> encrypt_decrypt('decrypt',$data['value']);
	 $_POST=json_decode($id,true);
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select id from companies where company_email=?");
			$stmt->bind_param("i",$_POST['company_email']);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			$row = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select * from employees where company_id=? and employee_number=?");
			$stmt->bind_param("is",$row['id'],$_POST['employee_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			$row_emp = $result->fetch_assoc();
			$reason=htmlentities($_POST['reason'],ENT_NOQUOTES, 'ISO-8859-1');
			if(!empty($row_emp))
			{
			$stmt = $dbCon->prepare("insert into employee_relieving_information (user_id,company_id,created_on,employee_id,reason_for_relieving,when_to_relieve ) values(?, ?, now(),?, ?, ?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("isiss",$row_emp['user_login_id'],$row['id'],$row_emp['id'],$reason,$_POST['relieving_date']);
			$stmt->execute();	
			}
			else
			{
			$stmt = $dbCon->prepare("select * from estore_employee_invite where company_id=? and employee_number=?");
			$stmt->bind_param("is",$row['id'],$_POST['employee_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			$row_emp = $result->fetch_assoc();
				if(!empty($row_emp))
				{
				$stmt = $dbCon->prepare("insert into employee_request_relieving_information (company_id,created_on,employee_id,reason_for_relieving,when_to_relieve ) values(?, now(),?, ?, ?)");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("siss",$row['id'],$row_emp['id'],$reason,$_POST['relieving_date']);
				$stmt->execute();		
				}
				else
				{
				$stmt = $dbCon->prepare("select * from estore_employee_uninvited where company_id=? and employee_number=?");
				$stmt->bind_param("is",$row['id'],$_POST['employee_number']);
				$stmt->execute();
				$result = $stmt->get_result();
				 
				$row_emp = $result->fetch_assoc();	
				$stmt = $dbCon->prepare("insert into employee_request_unsent_relieving_information (company_id,created_on,employee_id,reason_for_relieving,when_to_relieve ) values(?, now(),?, ?, ?)");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("siss",$row['id'],$row_emp['id'],$reason,$_POST['relieving_date']);
				$stmt->execute();	
				}
			}
		$stmt->close();
        $dbCon->close();
		 return 1;	
	}
	
	}							