<?php
	require_once('../AppModel.php');
	class CompanyModel extends AppModel
	{
		function addBankAccount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$_POST['holder_name']=htmlentities($_POST['holder_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$_POST['bname']=htmlentities($_POST['bname'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into company_bank_account_detail( `company_id`  , `account_holder_name`  , `bank_name`  , `account_number`  , `bic`  , `iban`  , `created_on`) values(?,?,?,?,?,?,now())");
			$stmt->bind_param("isssss", $company_id,$_POST['holder_name'],$_POST['bname'],$_POST['account_number'],$_POST['bic'],$_POST['iban']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function bankAccountList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from company_bank_account_detail where company_id=?");
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
		
		function updateLeavingStatusBooking($data)
		{
			$dbCon = AppModel::createConnection();
			$invoice_id= $this -> encrypt_decrypt('decrypt',$data['invoice_id']);
			//echo $visitor_id;
			$stmt = $dbCon->prepare("update hotel_roomservice_item_ordered set booking_checkin_status=2 where invoice_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $invoice_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		
		function updateLocationContactDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['id']);
			//echo $visitor_id;
			$stmt = $dbCon->prepare("update company_location_contact_info set   `sale_email`  =?, `sale_phone_number`  =?, `finance_email`  =?, `finance_phone_number`  =?, `cs_email`  =?, `cs_phone_number`  =?, `facebook_url`  =?, `instagram_url` =? where   `location_id`=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ssssssssi", $_POST['sale_email'], $_POST['sale_phone_number'], $_POST['finance_email'], $_POST['finance_phone_number'], $_POST['cs_email'], $_POST['cs_phone_number'], $_POST['facebook_url'], $_POST['instagram_url'], $location_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		function updateServiceInvoicePaymentDetail($data)
		{ 
			$dbCon = AppModel::createConnection();
			$invoice_id= $this -> encrypt_decrypt('decrypt',$data['invoice_id']);
			
			$stmt = $dbCon->prepare("select user_id from hotel_roomservice_item_ordered where invoice_id=?");
			$stmt->bind_param("i", $invoice_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update professional_services_payment_invoice set card_number=?,cvv=?,expiry_date=?,paid_by_user=1,paying_person_id=?,card_id=0,payment_status=1,payment_made_at=now() where id=?");
			$stmt->bind_param("sssii",$_POST['card_number'],$_POST['cvv'],$_POST['exp_date'],$row['user_id'],$invoice_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select total_price,first_name,last_name,email from professional_services_payment_invoice left join user_logins on user_logins.id=professional_services_payment_invoice.user_id where professional_services_payment_invoice.id=?");
			$stmt->bind_param("i", $invoice_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=4242424242424242&card[exp_month]=2&card[exp_year]=2040&card[cvc]=314");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);
			$a=json_decode($result,true);
			 
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "name=".$row['first_name']."&email=".$row['email']."&source=".$a['id']."&description=My");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);
			$b=json_decode($result,true);
			$cuId=$b['id'];
			
			$total_price=$row['total_price']*100;
			if($total_price<500)
			{
				$total_price=500;
			}
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "customer=".$b['id']."&amount=".$total_price."&currency=sek&description=My");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);			
			$c=json_decode($result,true);
			$Chargeid=$c['id'];	
			
			
			$stmt = $dbCon->prepare("update hotel_roomservice_item_ordered set charge_id=?,customer_id=?,booking_checkin_status=2 where invoice_id=?");
			$stmt->bind_param("ssi",$Chargeid,$cuId, $invoice_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function verifyIPDetail()
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
			 $stmt = $dbCon->prepare("select login_status from user_certificates where login_started_for=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$row= $result->fetch_assoc();
			
			if($row['login_status']!=2)
			{
				$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0 where login_started_for=?");
				/* bind parameters for markers */
				$stmt->bind_param("s", $ip);
				$stmt->execute();	
			}
			 
				 $t=microtime();
				 
				$dbCon->close();
				return $this->encrypt_decrypt('encrypt',$ip);
			 
		}
		
		function updatePaymentInfo($data)
		{
			$dbCon = AppModel::createConnection();
			 $ip=$this->encrypt_decrypt('decrypt',$_POST['ip']);
			$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0 where login_started_for=?");
			/* bind parameters for markers */
			$stmt->bind_param("s", $ip);
			$stmt->execute();	
			 
			$dbCon->close();
			return 1;
			 
		}
		
		
		function visitorsDetailRegularAppointmentDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$meeting_id= $this -> encrypt_decrypt('decrypt',$data['meeting_id']);
			$vdate=date('Y-m-d');
			$stmt = $dbCon->prepare("select full_name,visitor_email,company_regular_visitor.id,concat_ws(' ',employees.first_name,employees.last_name) as emp_name,created_on,visiting_date,visiting_time from company_regular_visitor left join employees on employees.id=company_regular_visitor.visiting_employee_id where company_regular_visitor.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $meeting_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select country_name,country_code,country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id left join phone_country_code on phone_country_code.id=user_logins.country_of_residence where email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $row['visitor_email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row2 = $result->fetch_assoc();
			$row['country_of_residence']=$row2['country_of_residence'];
			$row['country_code']=$row2['country_code'];
			$row['country_name']=$row2['country_name'];
			$row['phone_number']=$row2['phone_number'];
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function checkinRegularVisitor($data)
		{
			$dbCon = AppModel::createConnection();
			$meeting_id= $this -> encrypt_decrypt('decrypt',$data['meeting_id']);
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update company_regular_visitor set status=2 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $meeting_id);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select * from company_regular_visitor where id=?");
			$stmt->bind_param("i", $meeting_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select country_code,country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id left join phone_country_code on phone_country_code.id=user_logins.country_of_residence where user_logins.id=(select user_login_id from employees where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['visiting_employee_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row2 = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select company_name from companies where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_company = $result->fetch_assoc();
			
			$phone='+'.trim($row2['country_code']).''.trim($row2['phone_number']);
			$subject='Your visitor is here';
			$to=$phone;
			$html=$row['full_name'].' is here to meet you at '.html_entity_decode($row_company['company_name']);
				//echo $html.' '.$to;
			$res=sendSms($subject, $to, $html);
			$res=json_decode($res,true);
			
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		function checkinServiceVisitor($data)
		{
			$dbCon = AppModel::createConnection();
			$meeting_id= $this -> encrypt_decrypt('decrypt',$data['meeting_id']);
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update hotel_roomservice_item_ordered set booking_checkin_status=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $meeting_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select booked_employee_id,hotel_roomservice_item_ordered.id,concat_ws(' ',user_logins.first_name,user_logins.last_name) as full_name,booking_date  ,booking_time,booking_person_id,booking_checkin_status from hotel_roomservice_item_ordered left join employees on employees.id=hotel_roomservice_item_ordered.booked_employee_id left join user_logins on user_logins.id=hotel_roomservice_item_ordered.booking_person_id where hotel_roomservice_item_ordered.id=?");
			$stmt->bind_param("i", $meeting_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select country_code,country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id left join phone_country_code on phone_country_code.id=user_logins.country_of_residence where user_logins.id=(select user_login_id from employees where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['booked_employee_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row2 = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select company_name from companies where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_company = $result->fetch_assoc();
			
			$phone='+'.trim($row2['country_code']).''.trim($row2['phone_number']);
			$subject='Your visitor is here';
			$to=$phone;
			$html=$row['full_name'].' is here to meet you at '.html_entity_decode($row_company['company_name']);
				//echo $html.' '.$to;
			$res=sendSms($subject, $to, $html);
			$res=json_decode($res,true);			
			
			$stmt = $dbCon->prepare("update hotel_roomservice_item_ordered set booking_checkin_status=1 where booking_date=?  and booking_time=? and booking_person_id=? and dish_id in (select id from dishes_detail_information where company_id=?)");
			$stmt->bind_param("iiii", $row['booking_date'],$row['booking_time'],$row['booking_person_id'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		function visitorsDetailServiceAppointmentDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$meeting_id= $this -> encrypt_decrypt('decrypt',$data['meeting_id']);
			 
			$stmt = $dbCon->prepare("select charge_id,hotel_roomservice_item_ordered.id,concat_ws(' ',user_logins.first_name,user_logins.last_name) as full_name,booking_date  ,booking_time,booking_person_id,booking_checkin_status from hotel_roomservice_item_ordered left join employees on employees.id=hotel_roomservice_item_ordered.booked_employee_id left join user_logins on user_logins.id=hotel_roomservice_item_ordered.booking_person_id where hotel_roomservice_item_ordered.id=?");
			$stmt->bind_param("i", $meeting_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$row['price']=0;
			$stmt = $dbCon->prepare("select country_name,country_code,country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id left join phone_country_code on phone_country_code.id=user_logins.country_of_residence where user_logins.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['booking_person_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row2 = $result->fetch_assoc();
			$row['country_of_residence']=$row2['country_of_residence'];
			$row['country_name']=$row2['country_name'];
			$row['country_code']=$row2['country_code'];
			$row['phone_number']=$row2['phone_number'];
			$row['services']=array();
			$stmt = $dbCon->prepare("select dish_name,time_required,post_production_time,preparation_time,dish_price from dishes_detail_information where id in(select dish_id from hotel_roomservice_item_ordered where booking_date=?  and booking_time=? and booking_person_id=?)");
			$stmt->bind_param("iii", $row['booking_date'],$row['booking_time'],$row['booking_person_id']);
			$stmt->execute();
			$result2 = $stmt->get_result();
			while($row2 = $result2->fetch_assoc())
			{
				$row['price']=$row['price']+$row2['dish_price']; 
				$row2['total_time_required']=($row2['time_required']+$row2['post_production_time']+$row2['preparation_time'])*15;
				array_push($row['services'],$row2);
			}
			 
				
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		
		function visitorsServiceInvoiceDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$meeting_id= $this -> encrypt_decrypt('decrypt',$data['meeting_id']);
			 
			$stmt = $dbCon->prepare("select invoice_id,hotel_roomservice_item_ordered.id,concat_ws(' ',user_logins.first_name,user_logins.last_name) as full_name,booking_date  ,booking_time,booking_person_id,booking_checkin_status from hotel_roomservice_item_ordered left join employees on employees.id=hotel_roomservice_item_ordered.booked_employee_id left join user_logins on user_logins.id=hotel_roomservice_item_ordered.booking_person_id where hotel_roomservice_item_ordered.id=?");
			$stmt->bind_param("i", $meeting_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select dish_name,time_required,post_production_time,preparation_time,dish_price from dishes_detail_information where id in(select dish_id from hotel_roomservice_item_ordered where booking_date=?  and booking_time=? and booking_person_id=?)");
			$stmt->bind_param("iii", $row['booking_date'],$row['booking_time'],$row['booking_person_id']);
			$stmt->execute();
			$result2 = $stmt->get_result();
			$total_price=0;
			while($row2 = $result2->fetch_assoc())
			{
				$total_price=$total_price+$row2['dish_price'];
				 
			}
			//print_r($row['invoice_id']); die;
			if($row['invoice_id']==0)
			{
				$stmt = $dbCon->prepare("insert into professional_services_payment_invoice(total_price,user_id)values(?,?)");
				$stmt->bind_param("ii", $total_price,$row['booking_person_id']);
				$stmt->execute();
				$id=$stmt->insert_id;
				
				$stmt = $dbCon->prepare("update hotel_roomservice_item_ordered set invoice_id=? where booking_date=?  and booking_time=? and booking_person_id=?");
				$stmt->bind_param("iiii",$id, $row['booking_date'],$row['booking_time'],$row['booking_person_id']);
				$stmt->execute();
				$invoice_id= $this -> encrypt_decrypt('encrypt',$id);
			}
			else
			{
				$invoice_id= $this -> encrypt_decrypt('encrypt',$row['invoice_id']);
			}
			$stmt->close();
			$dbCon->close();
			return $invoice_id;
			
			
		}
		
		
		function selectedCountry($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id from phone_country_code where country_name=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s",$_POST['country_name']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function visitorsDetailRegularAppointmentToday($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		   
			 $org=array();
			 $j=0;
			if($data['meeting_type']==1)
			{
			$vdate=date('Y-m-d');
			$stmt = $dbCon->prepare("select company_regular_visitor.id,concat_ws(' ',first_name,last_name) as full_name,created_on,visiting_date,visiting_time from company_regular_visitor left join employees on employees.id=company_regular_visitor.visiting_employee_id where company_regular_visitor.company_id=? and company_regular_visitor.status=1 and visitor_country=? and visitor_phone=? and visiting_date=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiss", $company_id,$_POST['country_id'],$_POST['phone_number'],$vdate);
			$stmt->execute();
			$result = $stmt->get_result();
			
			
			while($row = $result->fetch_assoc())
			{
				$row['meeting_type']=1;
				$row['enc1']=$this->encrypt_decrypt('encrypt',$row['meeting_type']);
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$j=$j+1;
			}
			}
			
			else if($data['meeting_type']==2)
			{
						
			$vdate=strtotime(date('Y-m-d'));
			
			$stmt = $dbCon->prepare("select hotel_roomservice_item_ordered.id,concat_ws(' ',user_logins.first_name,user_logins.last_name) as full_name,booking_date  ,booking_time,booking_person_id,booking_checkin_status from hotel_roomservice_item_ordered left join employees on employees.id=hotel_roomservice_item_ordered.booked_employee_id left join user_logins on user_logins.id=employees.user_login_id where booking_person_id=(select user_logins.id from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where country_of_residence=? and phone_number=?) and booking_checkin_status=0 and dish_id in (select id from dishes_detail_information where company_id=?) and booking_date=? and booked_employee_id>0 group by booking_date, booking_time");
			$stmt->bind_param("iiii", $_POST['country_id'],$_POST['phone_number'],$company_id,$vdate);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
				 
				$stmt = $dbCon->prepare("select work_time from working_hrs  where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['booking_time']);
				$stmt->execute();
				$resultHrs = $stmt->get_result();
				$rowHrs = $resultHrs->fetch_assoc();
				
				$row['visiting_time']=$rowHrs['work_time'];
				$row['visiting_date']=date('Y-m-d',$row['booking_date']);
				$row['meeting_type']=2;
				$row['enc1']=$this->encrypt_decrypt('encrypt',$row['meeting_type']);
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$key_values = array_column($org, 'visiting_time'); 
				array_multisort($key_values, SORT_DESC, $org);
				$j=$j+1;
			}
			}
			//echo '<pre>'; print_r($org); echo '</pre>'; die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function userCountryList()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name,country_code from phone_country_code order by country_code");
			
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
		
		
		function userCountryNameList()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name,country_code from phone_country_code order by country_name");
			
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
		
		function checkOpenStatus($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select max(id),max(open_date) edate from company_open_close where company_id=? and status=1");
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
		 function editWorkingTimeInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			 if($_POST['day1']==1)
			 {
				 $mon_open=1;
				 $mon_open_time=$_POST['mon_open'];
				 $mon_close_time=$_POST['mon_close'];
				 
			 }
			 else
			 {
				 $mon_open=0;
				 $mon_open_time='';
				 $mon_close_time='';
				 
			 }	
			 if($_POST['day2']==1)
			 {
				 $tue_open=1;
				 $tue_open_time=$_POST['tue_open'];
				 $tue_close_time=$_POST['tue_close'];
				 
			 }
			 else
			 {
				 $tue_open=0;
				 $tue_open_time='';
				 $tue_close_time='';
				 
			 }
			if($_POST['day3']==1)
			 {
				 $wed_open=1;
				 $wed_open_time=$_POST['wed_open'];
				 $wed_close_time=$_POST['wed_close'];
				 
			 }
			 else
			 {
				 $wed_open=0;
				 $wed_open_time='';
				 $wed_close_time='';
				 
			 }
			if($_POST['day4']==1)
			 {
				 $thu_open=1;
				 $thu_open_time=$_POST['thu_open'];
				 $thu_close_time=$_POST['thu_close'];
				 
			 }
			 else
			 {
				 $thu_open=0;
				 $thu_open_time='';
				 $thu_close_time='';
				 
			 }
			 if($_POST['day5']==1)
			 {
				 $fri_open=1;
				 $fri_open_time=$_POST['fri_open'];
				 $fri_close_time=$_POST['fri_close'];
				 
			 }
			 else
			 {
				 $fri_open=0;
				 $fri_open_time='';
				 $fri_close_time='';
				 
			 }
			 if($_POST['day6']==1)
			 {
				 $sat_open=1;
				 $sat_open_time=$_POST['sat_open'];
				 $sat_close_time=$_POST['sat_close'];
				 
			 }
			 else
			 {
				 $sat_open=0;
				 $sat_open_time='';
				 $sat_close_time='';
				 
			 }
			 if($_POST['day7']==1)
			 {
				 $sun_open=1;
				 $sun_open_time=$_POST['sun_open'];
				 $sun_close_time=$_POST['sun_close'];
				  
			 }
			 else
			 {
				 $sun_open=0;
				 $sun_open_time='';
				 $sun_close_time='';
				 
			 }
			
			 $stmt = $dbCon->prepare("update company_work_information set mon_open=?, mon_open_time=?, mon_close_time=?, tue_open=?, tue_open_time=?, tue_close_time=?, wed_open=?, wed_open_time=?, wed_close_time=?, thu_open=?, thu_open_time=?, thu_close_time=?, fri_open=?, fri_open_time=?, fri_close_time=?, sat_open=?, sat_open_time=?, sat_close_time=?, sun_open=?, sun_open_time=?, sun_close_time=?,modified_on=now() where company_id=? ");
			$stmt->bind_param("issississississississi",$mon_open, $mon_open_time, $mon_close_time, $tue_open, $tue_open_time, $tue_close_time, $wed_open, $wed_open_time, $wed_close_time, $thu_open, $thu_open_time, $thu_close_time, $fri_open, $fri_open_time, $fri_close_time, $sat_open, $sat_open_time, $sat_close_time, $sun_open, $sun_open_time, $sun_close_time,$company_id);
			 
			  
			if($stmt->execute())
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
		
		
		function companyWorkCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from company_work_information where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into company_work_information(company_id,created_on,modified_on)values(?, now(), now())");
			$stmt->bind_param("i",$company_id);	
			$stmt->execute();
			$stmt = $dbCon->prepare("select * from company_work_information where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();	
			}
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
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
	
		function checkOpenStatusParkering($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select max(id),max(open_date) edate from parkering_open_close where company_id=? and status=1");
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
		
		function checkOpenStatusDelivery($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select max(id),max(open_date) edate from delivery_open_close where company_id=? and status=1");
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
	function checkOpenStatusSafeqid($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select max(id),max(open_date) edate from safeqid_open_close where company_id=? and status=1");
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
		
	function visitorsList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id,concat_ws(' ',name,last_name) as full_name from company_visitors where company_id=? and status=0");
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
	
	function visitorsCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from company_visitors where company_id=? and status=0");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			 
			$stmt->close();
			$dbCon->close();
			return $row;
				
		}
		function reportStartDay($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 $_POST['indexing_save']=substr($_POST['indexing_save'],0,-1);
			 $id=explode(',',$_POST['indexing_save']);
			  
			 foreach($id as $key)
			 {
				 if($key==1)
				 {
			$stmt = $dbCon->prepare("insert into company_open_close(company_id,open_date,open_time,created_on) values(?,now(),now(),now())");
				 }
				 else if($key==2)
				 {
			$stmt = $dbCon->prepare("insert into parkering_open_close(company_id,open_date,open_time,created_on) values(?,now(),now(),now())");
				 }
				 else  if($key==3)
				 {
			$stmt = $dbCon->prepare("insert into delivery_open_close(company_id,open_date,open_time,created_on) values(?,now(),now(),now())");
					 
				 }
				  else  if($key==4)
				 {
			$stmt = $dbCon->prepare("insert into safeqid_open_close(company_id,open_date,open_time,created_on) values(?,now(),now(),now())");
					 
				 }
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			 }
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function reportClosingDay($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("update company_open_close set status=2,close_date=now(),close_time=now(),modified_on=now() where company_id=?");
				
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
			function reportDaycareClose($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("update safeqid_open_close set status=2,close_date=now(),close_time=now(),modified_on=now() where company_id=?");
				
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
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
		
		function verifyEmployee()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select employee_id from employee_qard_permission where personal_code=?");
			
			$stmt->bind_param("s", $_POST['p_id']);
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
			return $row['employee_id'];
			
			}
		}
		
		function employeeDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$eid= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select concat_ws(' ',first_name,last_name) as name from employees where id=?");
			
			$stmt->bind_param("i", $eid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		function userInformationQard($data)
		{
			$dbCon = AppModel::createConnection();
			$qr_id= $this -> encrypt_decrypt('decrypt',$data['qr_id']);
			$stmt = $dbCon->prepare("select first_name,last_name,visitor_email,country_id,phone_number,company_name from employee_invited_visitor where id=?");
			
			$stmt->bind_param("i", $qr_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		
		function employeeQuardInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$qr_id= $this -> encrypt_decrypt('decrypt',$data['qr_id']);
			$stmt = $dbCon->prepare("select id,company_id from employees where id=(select inviting_employee from employee_invited_visitor where id=?)");
			
			$stmt->bind_param("i", $qr_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['cid']=$this -> encrypt_decrypt('encrypt',$row['company_id']);
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function userInformation($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select user_logins.first_name,user_logins.last_name,country_phone,phone_number,user_logins.email,company_name from employees left join user_logins on user_logins.id=employees.user_login_id left join user_profiles on user_profiles.user_logins_id=user_logins.id left join companies on companies.id=employees.company_id where  employees.id=?");
			
			$stmt->bind_param("s", $_POST['qard_employee']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
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
		function employeeInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			
			
			$stmt = $dbCon->prepare("select email,concat_ws(',',first_name,last_name) as name from employees where id in (select employee_id from employee_location where location_id=?) limit 0,20");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $location_id);
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
		
		function moreEmployeeInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			
			$a=(20*$_POST['id'])+1;
			$b=$a+20;
			
			$stmt = $dbCon->prepare("select email,concat_ws(',',first_name,last_name) as name from employees where id in (select employee_id from employee_location where location_id=?) limit ?,?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iii", $location_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
			$org='<div class=" white_bg mart20  brdrad3 box_shadow bg_fffbcc_a" style="">
										<div class="container pad25  brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
													
													<div class="fleft wi_30 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn" data-trn-key="Name">Name</span> <a href="#" ><span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16">'.$row['name'].'</span></a> </div>
													<div class="fleft wi_45 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn" data-trn-key="Email">Email</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16">'.$row['email'].'</span> </div>
													<div class="fright wi_10 padl0 xs-wi_100 sm-wi_100 marl15 fsz40  xs-mar0 padb0">
														<a href="#" ><span class="fas fa-arrow-alt-circle-right"></span></a>
													</div>	
												</div>
												
												
												
												
												
												<!-- <div class="clear hidden-xs"></div>-->
											</div>
											<div class="clear"></div>
										</div>
									</div>';
			}
				$stmt->close();
				$dbCon->close();
				return $org;
					
		}
		
		function updateLocation($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$posted_value=json_decode(utf8_encode($_POST['total_value']),true);
			//echo json_last_error() ;
			//print_r($_POST);// die;
			$posted_value['qloudid_property_id']=$id;
			//print_r($posted_value); die;
			$stmt = $dbCon->prepare("select is_headquarter,company_id from property_location where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$url='https://www.qmatchup.com/beta/company/index.php/UpdateUserCompany/updateCompanyLocation';
			
			
			if($posted_value['general']>0)
			{
				if($row['is_headquarter']==1)
				{
				$stmt = $dbCon->prepare("update company_profiles set address=? where company_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("si",$posted_value['visiting_address'],$row['company_id']);
				$stmt->execute();
				}
				
				$stmt = $dbCon->prepare("update property_location set visiting_address=?,country_phone=?,phone_number=? where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("sisi",$posted_value['visiting_address'],$posted_value['c_phone'],$posted_value['phone_nr'],$id);
				$stmt->execute();
				
			}
			if($posted_value['fors']>0)
			{
				if($row['is_headquarter']==1)
				{
				$stmt = $dbCon->prepare("update company_profiles set si_address=?,si_city=?,si_country=?,si_zip=?,sd_address=?,sd_city=?,sd_country=?,sd_zip=?   where company_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssssssssi", $posted_value['addrssi'],$posted_value['citysi'],$posted_value['cntrysi'],$posted_value['zipsi'],$posted_value['addrssd'],$posted_value['citysd'],$posted_value['cntrysd'],$posted_value['zipsd'],$row['company_id']);
				$stmt->execute();
				}
				
				$stmt = $dbCon->prepare("update property_location set street_name_i=?,city_i=?,country_i=?,postal_code_i=?,street_name_v=?,city_v=?,country_v=?,postal_code_v=?   where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssssssssi", $posted_value['addrssi'],$posted_value['citysi'],$posted_value['cntrysi'],$posted_value['zipsi'],$posted_value['addrssd'],$posted_value['citysd'],$posted_value['cntrysd'],$posted_value['zipsd'],$id);
				$stmt->execute();
				
			}
		
				$ch = curl_init();
				
				//set the url, number of POST vars, POST data
				curl_setopt($ch,CURLOPT_URL, $url);
				curl_setopt($ch,CURLOPT_POST, count($posted_value));
				curl_setopt($ch,CURLOPT_POSTFIELDS, $posted_value);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
				curl_setopt($ch, CURLOPT_COOKIESESSION, true);
				curl_setopt($ch, CURLOPT_REFERER, true);
				curl_setopt($ch, CURLOPT_COOKIEJAR, true);
				curl_setopt($ch, CURLOPT_COOKIEFILE, true);
				$result = curl_exec($ch);
			// $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			//	echo $status_code ;
				curl_close($ch);
				
				$stmt->close();
				$dbCon->close();
				return 1;
			
			
			
		}
		
		
		function updateLocationAccount($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			 
			$_POST['qloudid_property_id']=$id;
			 
			$stmt = $dbCon->prepare("select is_headquarter,company_id from property_location where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$url='https://www.qmatchup.com/beta/company/index.php/UpdateUserCompany/updateCompanyLocationAccount';
			
			 
				
				$stmt = $dbCon->prepare("update property_location set property_id=?,country_phone=?,phone_number=? where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("iisi", $_POST['ltype'],$_POST['country_phone'],$_POST['phone'],$id);
				$stmt->execute();
				
			 
				$ch = curl_init();
				
				//set the url, number of POST vars, POST data
				curl_setopt($ch,CURLOPT_URL, $url);
				curl_setopt($ch,CURLOPT_POST, count($_POST));
				curl_setopt($ch,CURLOPT_POSTFIELDS, $_POST);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
				curl_setopt($ch, CURLOPT_COOKIESESSION, true);
				curl_setopt($ch, CURLOPT_REFERER, true);
				curl_setopt($ch, CURLOPT_COOKIEJAR, true);
				curl_setopt($ch, CURLOPT_COOKIEFILE, true);
				//$result = curl_exec($ch);
			// $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			//	echo $status_code ;
				curl_close($ch);
				
				$stmt->close();
				$dbCon->close();
				return 1;
			
			
			
		}
		
		
		
		function searchLocationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$posted_value=json_decode($_POST['total_value'],true);
			if($posted_value['general']>0) {
				
				$general='<div class="result-item padtb0  lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">General</span>
				
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>'.$posted_value['general'].'</span>
				<span class="fa fa-caret-up dnone diblock_pa"></span>
				<span class="fa fa-caret-down dnone_pa"></span>
				</a>
				</div>
				</div>
				</div>
				<div class="sources-content  dnone padb20 " style="display: none;">
				<ul class="mar0 pad0  fsz14">
				
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Visiting Address :</a>
				</div>
				<span class="fxshrink_0 marl100">'.substr($posted_value['visiting_address'],0,10).'...</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Country :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['c_phone'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Phone :</a>
				</div>
				<span class="fxshrink_0 marl120">'.$posted_value['phone_nr'].'</span>
				</li>
				
				</ul>
				</div>
				</div>';
			}
			else
			
			{
				$general='';
			}
			
			if($posted_value['fors']>0) { 
				
				$fors='<div class="result-item padtb0  lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">For Suppliers</span>
				
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>'.$posted_value['fors'].'</span>
				<span class="fa fa-caret-up dnone diblock_pa"></span>
				<span class="fa fa-caret-down dnone_pa"></span>
				</a>
				</div>
				</div>
				</div>
				<div class="sources-content  dnone padb20 " style="display: none;">
				<ul class="mar0 pad0  fsz14">
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Invoicing Address :</a>
				</div>
				<span class="fxshrink_0 marrl50">'.$posted_value['addrssi'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Zipcode :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['zipsi'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">City :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['citysi'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Country :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['cntrysi'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Delivery Address :</a>
				</div>
				<span class="fxshrink_0 marrl50">'.$posted_value['addrssd'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Zipcode :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['zipsd'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">City :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['citysd'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Country :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['cntrysd'].'</span>
				</li>
				
				</ul>
				</div>
				</div>';
			}
			else
			{
				$fors="";
			}
			
		
			$org='<div class="padb0 ">
			<h2 class="tall marb5 pad0 bold fsz24 black_txt">Verifiera</h2>
			<div class="wi_100 dflex fxwrap_w marrla marb10 tall">
			
			
			
			<div class="wi_100 marb10 tall">
			
			<span class="valm fsz16">Signera dina ändrade uppgifter</span>
			</div>
			
			
			</div>
			</div>
			
			<!-- Center content -->
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10 lgtgrey2_bg brdrad3">
			<div class="padtb0 brdrad3 lgtgrey2_bg">
			
			<div class="mart0" id="search_data">
			
			
			'.$general.
			' '.$fors.'
			
			
			
			</div>
			
			</div>
			
			</div>
			<form method="POST" action="../updateLocation/'.$data['lid'].'" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla mart10"> <a href="#" class="wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2" onclick="submit_value_company();">Signera med Mobilt BankId</a> 
			<input type="hidden" id="total_value" name="total_value" value="'.str_ireplace('"',"'",$_POST['total_value']).'" />
			</div>
			</form>';
			
			
			
			return $org;
		}
		
	
		function companyVisitor($data)
		{
			$dbCon = AppModel::createConnection();
			$visitor_id= $this -> encrypt_decrypt('decrypt',$data['vid']);
			
			
			$stmt = $dbCon->prepare("select status from company_visitors where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $visitor_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
				$stmt->close();
				$dbCon->close();
				return $row['status'];
					
		}
		
		
		function locationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			
			
			$stmt = $dbCon->prepare("select * from property_location where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['cid']=$this->encrypt_decrypt('encrypt',$row['company_id']);
				$stmt->close();
				$dbCon->close();
				return $row;
					
		}
		
		function headQuarterID($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("select id from property_location where company_id = ? and is_headquarter=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("update property_location set is_headquarter=1 where company_id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			 
			$stmt = $dbCon->prepare("select id from property_location where company_id = ? and is_headquarter=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			}
			
			$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				$stmt->close();
				$dbCon->close();
				return $enc;
					
		}
		
		
		function propertyDetailInfo()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select  * from property order by property_name");
			/* bind parameters for markers */
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
		function visitorsBg($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("select image_src from company_product_bg where company_id = ? and product_id=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
				$stmt->close();
				$dbCon->close();
				return $row;
					
		}
		function visitorOnPage($data)
		{
			$dbCon = AppModel::createConnection();
			$visitor_id= $this -> encrypt_decrypt('decrypt',$data['vid']);
			if($data['visitor']==1)
			{
			
			$stmt = $dbCon->prepare("select name,last_name from company_visitors where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $visitor_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			}
			else if($data['visitor']==0)
			{
			
			$stmt = $dbCon->prepare("select first_name as name,last_name from employees where id = (select employee_id from company_visitors where id = ?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $visitor_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			}
				$stmt->close();
				$dbCon->close();
				return $row;
					
		}
			
		function updateVisitors($data)
		{
			$dbCon = AppModel::createConnection();
			$visitor_id= $this -> encrypt_decrypt('decrypt',$data['vid']);
			//echo $visitor_id;
			$stmt = $dbCon->prepare("update company_visitors set left_office_at=now(),status=1,updated_by=? where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['visitor'],$visitor_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function searchCompanyCountry($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("select country_id from companies where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if($row['country_id']==201)
			{
				$stmt = $dbCon->prepare("select id from bankid_verified where bank_id=(select ssn from user_profiles where user_logins_id=?)");
				
				$stmt->bind_param("i", $data['user_id']);
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
					return 1;
				}
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			
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
		
		
		function selectWhitelistVisitorCompany($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['vid']);
			
			
			$stmt = $dbCon->prepare("select id from whitelist_company where company_id = (select company_id from company_visitors where id =?) and status=1");
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
		function updateImage($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$data1 = strip_tags($_POST['image-data1']);
			//echo $data; die;
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			//echo $img_name1; print_r($_POST); die;
			$stmt = $dbCon->prepare("update company_profiles set profile_pic=?  where company_id=?");
			
			$stmt->bind_param("si", $img_name1,$company_id);
			$stmt->execute();
			// echo "jain"; die;
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function checkAddress()
		{
			$dbCon = AppModel::createConnection();
			$address=str_replace(' ', '%20',urldecode($_POST['address'])); 
			$url = "http://api.locationiq.com/v1/autocomplete.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&q=".$address;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			if(isset($response['error']))
			{
			
			return 0;	
			}
			else
			{
				
			return $responseJson;
			}
				
		}
		
		function checkAddresslatLong()
		{
			$dbCon = AppModel::createConnection();
			$address=str_replace(' ', '%20',urldecode($_POST['address'])); 
			$url="https://us1.locationiq.com/v1/reverse.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&lat=".$_POST['lat']."&lon=".$_POST['lon']."&format=json";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			 
			if(isset($response['error']))
			{
			
			return 0;	
			}
			else
			{
				
			return $responseJson;
			}
				
		}
		
		
		
		
		function updateCompanyAccount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			$data1 = strip_tags($_POST['image-data1']);
			if($data1!='none')
			{
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			}
			else 
			{
				$img_name1="";
			}
			 
			$stmt = $dbCon->prepare("select companies.country_id,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$fields=array();
			$fields=$_POST;
			$fields['company_email']=$row['company_email'];
			
			$cname=htmlentities($_POST['cname'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("update companies set  company_name=?,industry=?,website=?  where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("sssi",$cname, $_POST['industry'],$_POST['web'],$company_id);
			$stmt->execute();
			$vat= htmlentities($_POST['vat'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("update company_profiles set vat=?, profile_pic=?,phone_country=?,phone=? where company_id=?");
				
				
				/* bind parameters for markers */
			$stmt->bind_param("ssssi",$vat,$img_name1,$_POST['country_phone'],$_POST['phone'],$company_id);
			$stmt->execute();
				
			$stmt = $dbCon->prepare("update property_location set country_phone=?,phone_number=?  where company_id=? and is_headquarter=1");
				/* bind parameters for markers */
			$stmt->bind_param("ssi", $_POST['country_phone'],$_POST['phone'],$company_id);
			$stmt->execute();
			 if($_POST['invoice_address']==1)
			 {
			if($_POST['same_invoice']==1)
				{
					 $_POST['iaddress']=htmlentities($_POST['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
					 $_POST['icity']=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
					 $_POST['izip']=$_POST['dzip'];
					 $_POST['i_port_number']=$_POST['d_port_number'];
				}
				else
				{
				$_POST['iaddress']=htmlentities($_POST['iaddress'],ENT_NOQUOTES, 'ISO-8859-1');
				$_POST['icity']=htmlentities($_POST['icity'],ENT_NOQUOTES, 'ISO-8859-1');	
				}
				$_POST['daddress']=htmlentities($_POST['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
				$_POST['dcity']=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
				$stmt = $dbCon->prepare("update property_location set   street_name_i=?, city_i=?, postal_code_i=?, street_name_v=?, city_v=?, postal_code_v=?, d_port_number=?,i_port_number=?,is_invoice_same=?,country_v=?,country_i=? where company_id=? and is_headquarter=1");
				
				
				$stmt->bind_param("ssssssssissi", $_POST['iaddress'],$_POST['icity'],$_POST['izip'],$_POST['daddress'],$_POST['dcity'],$_POST['dzip'],$_POST['d_port_number'],$_POST['i_port_number'],$_POST['same_invoice'],$_POST['country_v'],$_POST['country_i'],$company_id);
				$stmt->execute();
			
			  
			 
			$stmt = $dbCon->prepare("update company_profiles set  si_address=?, si_city=?, si_zip=?, sd_address=?, sd_city=?, sd_zip=?, d_port_number=?,i_port_number=?,is_invoice_same=?,sd_country=?,si_country=? where company_id=?");
				
				
			$stmt->bind_param("ssssssssissi",$_POST['iaddress'],$_POST['icity'],$_POST['izip'],$_POST['daddress'],$_POST['dcity'],$_POST['dzip'],$_POST['d_port_number'],$_POST['i_port_number'],$_POST['same_invoice'],$_POST['country_v'],$_POST['country_i'],$company_id);
			$stmt->execute();	
			 
			 }
			 if($_POST['visit_addrs']==1)
			 {
			$url="https://us1.locationiq.com/v1/reverse.php?key==pk.1daa15e048f0e38b45be79dc1ecad248&lat=".$_POST['latit']."&lon=".$_POST['longi']."&format=json";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			
			$fields['state_district']=$response['address']['state_district'];
			$fields['city']=$response['address']['city'];
			$fields['state']=$response['address']['state'];
			$fields['postcode']=$response['address']['postcode'];
			$fields['lat']=$_POST['latit'];
			$fields['lon']=$_POST['longi'];
			$addressVisit=htmlentities($_POST['addrs'].' '.$_POST['port_number'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("update company_profiles set address=?,city=?,country=?,zip=?,longitude=?,latitude=?  where company_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ssssssi", $addressVisit,$fields['state_district'],$fields['state'],$fields['postcode'],$fields['lon'],$fields['lat'],$company_id);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("update property_location set visiting_address=?,longitude=?,latitude=?,port_number=?,visiting_city=?,visiting_state=?  where company_id=? and is_headquarter=1");
				/* bind parameters for markers */
			$stmt->bind_param("ssssssi", htmlentities($_POST['addrs'],ENT_NOQUOTES, 'ISO-8859-1'),$fields['lon'],$fields['lat'],$_POST['port_number'],$fields['city'],$fields['state'],$company_id);
			$stmt->execute();
 
			
			 }
			
			$ch = curl_init();
				$url='https://www.qmatchup.com/beta/company/index.php/UpdateUserCompany/updateCompanyAccountDetail';
				//set the url, number of POST vars, POST data
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
			$result = curl_exec($ch);
				//echo curl_error($ch); 
				//close connection
			curl_close($ch); //die;	
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateAccount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$posted_value=json_decode(utf8_encode($_POST['total_value']),true);
			
			$stmt = $dbCon->prepare("select companies.country_id,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$posted_value['company_email']=$row['company_email'];
			$url='https://www.qmatchup.com/beta/company/index.php/UpdateUserCompany/updateCompanyDetail';
			
			
			$stmt = $dbCon->prepare("INSERT INTO company_passport_logs (company_id, created_on) VALUES (?, now())");
			$stmt->bind_param("i", $company_id);
			 $stmt->execute();
			$id=$stmt->insert_id;
			
			
			//$fields = Array('userandcompanydata' => urlencode($data));
			//$fields[]
			/*$ch = curl_init();
				
				//set the url, number of POST vars, POST data
				curl_setopt($ch,CURLOPT_URL, $url);
				curl_setopt($ch,CURLOPT_POST, count($posted_value));
				curl_setopt($ch,CURLOPT_POSTFIELDS, $posted_value);
				
				//execute post
				$result = curl_exec($ch);
				//echo curl_error($ch); 
				//close connection
			curl_close($ch); //die;*/
			
			//print_r($posted_value); die;
			if($posted_value['general']>0)
			{
				$stmt = $dbCon->prepare("update companies set company_name=?,industry=?,website=?  where id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("sssi", $posted_value['name'],$posted_value['l_name'],$posted_value['web'],$company_id);
				$stmt->execute();
				
				if(html_entity_decode($row['company_name'])!=$posted_value['name'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set company_name=?,company_name_old=?,company_name_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['name'],$row['company_name'],$id);
				$stmt->execute();
				}
				
				if($row['industry']!=$posted_value['l_name'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set industry=?,industry_old=?,industry_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("iii", $posted_value['l_name'],$row['industry'],$id);
				$stmt->execute();
				}
				
				$stmt = $dbCon->prepare("update company_profiles set cid=?,founded=?  where company_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['ssn'],$posted_value['dob'],$company_id);
				$stmt->execute();
				
				if($row['cid']!=$posted_value['ssn'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set cid=?,cid_old=?,cid_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['ssn'],$row['cid'],$id);
				$stmt->execute();
				}
				
				if($row['founded']!=$posted_value['dob'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set founded=?,founded_old=?,founded_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", date('Y-m-d',strtotime($posted_value['dob'])),date('Y-m-d',strtotime($row['founded'])),$id);
				$stmt->execute();
				}
				
			}
			if($posted_value['byphone']>0)
			{
				$stmt = $dbCon->prepare("update company_profiles set phone_country=?,phone=? where company_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['c_phone'],$posted_value['phone'],$company_id);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("update property_location set country_phone=?,phone_number=?  where company_id=? and is_headquarter=1");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['c_phone'],$posted_value['phone'],$company_id);
				$stmt->execute();
				
				
				
				if($row['phone_country']!=$posted_value['c_phone'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set phone_country=?,phone_country_old=?,phone_country_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['c_phone'],$row['phone_country'],$id);
				$stmt->execute();
				}
				if($row['phone']!=$posted_value['phone'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set phone=?,phone_old=?,phone_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['phone'],$row['phone'],$id);
				$stmt->execute();
				}
				
			}
			if($posted_value['bypost']>0)
			{
				$stmt = $dbCon->prepare("update company_profiles set delivery_address=?,d_city=?,d_country=?,d_zip=?  where company_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("ssssi", $posted_value['addrs1'],$posted_value['city1'],$posted_value['cntry1'],$posted_value['zip1'],$company_id);
				$stmt->execute();
				
				if($row['delivery_address']!=$posted_value['addrs1'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set delivery_address=?,delivery_address_old=?,delivery_address_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['addrs1'],$row['delivery_address'],$id);
				$stmt->execute();
				}
				
				if($row['d_city']!=$posted_value['city1'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set d_city=?,d_city_old=?,d_city_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['city1'],$row['d_city'],$id);
				$stmt->execute();
				}
				
				if($row['d_country']!=$posted_value['cntry1'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set d_country=?,d_country_old=?,d_country_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['cntry1'],$row['d_country'],$id);
				$stmt->execute();
				}
				
				if($row['d_zip']!=$posted_value['zip1'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set d_zip=?,d_zip_old=?,d_zip_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['zip1'],$row['d_zip'],$id);
				$stmt->execute();
				}
			}
			if($posted_value['va']>0)
			{
				$stmt = $dbCon->prepare("update company_profiles set address=?,city=?,country=?,zip=?  where company_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("ssssi", $posted_value['addrs'],$posted_value['city'],$posted_value['cntry'],$posted_value['zip'],$company_id);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("update property_location set visiting_address=?  where company_id=? and is_headquarter=1");
				/* bind parameters for markers */
				$stmt->bind_param("si", $posted_value['addrs'],$company_id);
				$stmt->execute();
				
				
				
				if($row['address']!=$posted_value['addrs'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set address=?,address_old=?,address_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['addrs'],$row['address'],$id);
				$stmt->execute();
				}
				
				if($row['city']!=$posted_value['city'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set city=?,city_old=?,city_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['city'],$row['city'],$id);
				$stmt->execute();
				}
				
				if($row['country']!=$posted_value['cntry'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set country=?,country_old=?,country_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['cntry'],$row['country'],$id);
				$stmt->execute();
				}
				
				if($row['zip']!=$posted_value['zip'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set zip=?,zip_old=?,zip_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['zip'],$row['zip'],$id);
				$stmt->execute();
				}
				
				//echo "jain"; die; 
			}
			if($posted_value['fors']>0)
			{
				$stmt = $dbCon->prepare("update company_profiles set si_address=?,si_city=?,si_country=?,si_zip=?,sd_address=?,sd_city=?,sd_country=?,sd_zip=?,vat=?   where company_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("sssssssssi", $posted_value['addrssi'],$posted_value['citysi'],$posted_value['cntrysi'],$posted_value['zipsi'],$posted_value['addrssd'],$posted_value['citysd'],$posted_value['cntrysd'],$posted_value['zipsd'],$posted_value['vat'],$company_id);
				$stmt->execute();
				
				
				$stmt = $dbCon->prepare("update property_location set street_name_i=?,city_i=?,country_i=?,postal_code_i=?,street_name_v=?,city_v=?,country_v=?,postal_code_v=?   where company_id=? and is_headquarter=1");
				/* bind parameters for markers */
				$stmt->bind_param("ssssssssi", $posted_value['addrssi'],$posted_value['citysi'],$posted_value['cntrysi'],$posted_value['zipsi'],$posted_value['addrssd'],$posted_value['citysd'],$posted_value['cntrysd'],$posted_value['zipsd'],$company_id);
				$stmt->execute();
				
				
				if($row['si_address']!=$posted_value['addrssi'])
				{
					$stmt = $dbCon->prepare("update company_passport_logs set si_address=?,si_address_old=?,si_address_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['addrssi'],$row['si_address'],$id);
				$stmt->execute();
				}
				
				if($row['si_city']!=$posted_value['citysi'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set si_city=?,si_city_old=?,si_city_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['citysi'],$row['si_city'],$id);
				$stmt->execute();
				}
				
				if($row['si_country']!=$posted_value['cntrysi'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set si_country=?,si_country_old=?,si_country_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['cntrysi'],$row['si_country'],$id);
				$stmt->execute();
				}
				
				if($row['si_zip']!=$posted_value['zipsi'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set si_zip=?,si_zip_old=?,si_zip_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['zipsi'],$row['si_zip'],$id);
				$stmt->execute();
				}
				
				if($row['sd_address']!=$posted_value['addrssd'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set sd_address=?,sd_address_old=?,sd_address_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['addrssd'],$row['sd_address'],$id);
				$stmt->execute();
				}
				
				if($row['sd_city']!=$posted_value['citysd'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set sd_city=?,sd_city_old=?,sd_city_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['citysd'],$row['sd_city'],$id);
				$stmt->execute();
				}
				
				if($row['sd_country']!=$posted_value['cntrysd'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set sd_country=?,sd_country_old=?,sd_country_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['cntrysd'],$row['sd_country'],$id);
				$stmt->execute();
				}
				
				if($row['sd_zip']!=$posted_value['zipsd'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set sd_zip=?,sd_zip_old=?,sd_zip_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['zipsd'],$row['sd_zip'],$id);
				$stmt->execute();
				}
				
				if($row['vat']!=$posted_value['vat'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set vat=?,vat_old=?,vat_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['vat'],$row['vat'],$id);
				$stmt->execute();
				}
				
			}
			if($posted_value['forc']>0)
			{
				$stmt = $dbCon->prepare("update company_profiles set bankgiro_med=?,bankgiro_utan=?,iban=?,bic=?,bank=?,f_tax=?  where company_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("ssssssi", $posted_value['bankgiro_med'],$posted_value['bankgiro_utan'],$posted_value['iban'],$posted_value['bic'],$posted_value['bank'],$posted_value['ftax'],$company_id);
				$stmt->execute();
				
				if($row['bankgiro_med']!=$posted_value['bankgiro_med'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set bankgiro_med=?,bankgiro_med_old=?,bankgiro_med_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['bankgiro_med'],$row['bankgiro_med'],$id);
				$stmt->execute();
				}
				
				if($row['bankgiro_utan']!=$posted_value['bankgiro_utan'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set bankgiro_utan=?,bankgiro_utan_old=?,bankgiro_utan_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['bankgiro_utan'],$row['bankgiro_utan'],$id);
				$stmt->execute();
				}
				if($row['iban']!=$posted_value['iban'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set iban=?,iban_old=?,iban_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['iban'],$row['iban'],$id);
				$stmt->execute();
				}
				
				if($row['bic']!=$posted_value['bic'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set bic=?,bic_old=?,bic_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['bic'],$row['bic'],$id);
				$stmt->execute();
				}
				
				if($row['bank']!=$posted_value['bank'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set bank=?,bank_old=?,bank_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['bank'],$row['bank'],$id);
				$stmt->execute();
				}
				
				if($row['f_tax']!=$posted_value['ftax'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set f_tax=?,f_tax_old=?,f_tax_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['ftax'],$row['f_tax'],$id);
				$stmt->execute();
				}
			}
			
		if($posted_value['socialm']>0)
			{
				$stmt = $dbCon->prepare("update company_profiles set fb=?,twitter=?,insta=?,blog=?  where company_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("ssssi", $posted_value['fb'],$posted_value['twitter'],$posted_value['insta'],$posted_value['blog'],$company_id);
				$stmt->execute();
				
				
			}
			if($posted_value['bysupport']>0)
			{
				$stmt = $dbCon->prepare("update company_profiles set support_email=?,support_country=?,support_phone=?,invoice_email=?,invoice_country=?,invoice_phone=?,sales_email=?,sales_country=?,sales_phone=?  where company_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("sssssssssi", $posted_value['support_email'],$posted_value['support_phonec'],$posted_value['support_phone'],$posted_value['sales_email'],$posted_value['sales_phonec'],$posted_value['sales_phone'],$posted_value['invoice_email'],$posted_value['invoice_phonec'],$posted_value['invoice_phone'],$company_id);
				$stmt->execute();
				
				
			}
				$ch = curl_init();
				
				//set the url, number of POST vars, POST data
				curl_setopt($ch,CURLOPT_URL, $url);
				curl_setopt($ch,CURLOPT_POST, count($posted_value));
				curl_setopt($ch,CURLOPT_POSTFIELDS, $posted_value);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
				curl_setopt($ch, CURLOPT_COOKIESESSION, true);
				curl_setopt($ch, CURLOPT_REFERER, true);
				curl_setopt($ch, CURLOPT_COOKIEJAR, true);
				curl_setopt($ch, CURLOPT_COOKIEFILE, true);
				$result = curl_exec($ch);
				//echo curl_error($ch); 
				//close connection
				curl_close($ch); //die;
				
				$stmt->close();
				$dbCon->close();
				return 1;
			
			
			
		}
		function searchCompanyDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$posted_value=json_decode($_POST['total_value'],true);
			if($posted_value['general']>0) {
				
				$general='<div class="result-item padtb0  lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">General</span>
				
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>'.$posted_value['general'].'</span>
				<span class="fa fa-caret-up dnone diblock_pa"></span>
				<span class="fa fa-caret-down dnone_pa"></span>
				</a>
				</div>
				</div>
				</div>
				<div class="sources-content  dnone padb20 " style="display: none;">
				<ul class="mar0 pad0  fsz14">
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Company Indentification Number :</a>
				</div>
				<span class="fxshrink_0 marl120">'.$posted_value['ssn'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Company Name :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['name'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Industry :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['l_name'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Website :</a>
				</div>
				<span class="fxshrink_0 marl120">'.$posted_value['web'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Founded :</a>
				</div>
				<span class="fxshrink_0 marl120">'.$posted_value['dob'].'</span>
				</li>
				
				</ul>
				</div>
				</div>';
			}
			else
			
			{
				$general='';
			}
			if($posted_value['bysupport']>0) {
				
				$support='<div class="result-item padtb0  lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">Support</span>
				
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>'.$posted_value['bysupport'].'</span>
				<span class="fa fa-caret-up dnone diblock_pa"></span>
				<span class="fa fa-caret-down dnone_pa"></span>
				</a>
				</div>
				</div>
				</div>
				<div class="sources-content  dnone padb20 " style="display: none;">
				<ul class="mar0 pad0  fsz14">
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Support Email :</a>
				</div>
				<span class="fxshrink_0 marl120">'.$posted_value['support_email'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Land :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['support_phonec'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Phone :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['support_phone'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Sales Email :</a>
				</div>
				<span class="fxshrink_0 marl120">'.$posted_value['sales_email'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Land :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['sales_phonec'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Phone :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['sales_phone'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Invoice Email :</a>
				</div>
				<span class="fxshrink_0 marl120">'.$posted_value['invoice_email'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Land :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['invoice_phonec'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Phone :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['invoice_phone'].'</span>
				</li>
				</ul>
				</div>
				</div>';
			}
			else
			
			{
				$support='';
			}
			if($posted_value['va']>0) { 
				
				$va='<div class="result-item padt10  lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">Visiting Address</span>
				
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>'.$posted_value['va'].'</span>
				<span class="fa fa-caret-up dnone diblock_pa"></span>
				<span class="fa fa-caret-down dnone_pa"></span>
				</a>
				</div>
				</div>
				</div>
				<div class="sources-content  dnone padb20 " style="display: none;">
				<ul class="mar0 pad0  fsz14">
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Address :</a>
				</div>
				<span class="fxshrink_0 marrl50">'.$posted_value['addrs'].'</span>
				</li>
				<li class="dflex mart10  padb5 hidden">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Zipcode :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['zip'].'</span>
				</li>
				<li class="dflex mart10  padb5 hidden">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">City :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['city'].'</span>
				</li>
				<li class="dflex mart10  padb5 hidden">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Country :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['cntry'].'</span>
				</li>
				
				</ul>
				</div>
				</div>';
			}
			else
			{
				$va='';
			}
			
			if($posted_value['bypost']>0) {
				$bypost='<div class="result-item padt10  lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">Contact by Post</span>
				
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>'.$posted_value['bypost'].'</span>
				<span class="fa fa-caret-up dnone diblock_pa"></span>
				<span class="fa fa-caret-down dnone_pa"></span>
				</a>
				</div>
				</div>
				</div>
				<div class="sources-content  dnone padb20 " style="display: none;">
				<ul class="mar0 pad0  fsz14">
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Address :</a>
				</div>
				<span class="fxshrink_0 marrl50">'.$posted_value['addrs1'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Zipcode :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['zip1'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">City :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['city1'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Country :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['cntry1'].'</span>
				</li>
				
				</ul>
				</div>
				</div>';
			}
			else
			{
				$bypost='';
			}
			
			
			if($posted_value['byphone']>0) { 
				$byphone='<div class="result-item padt10  lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">Telefon </span>
				
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>'.$posted_value['byphone'].'</span>
				<span class="fa fa-caret-up dnone diblock_pa"></span>
				<span class="fa fa-caret-down dnone_pa"></span>
				</a>
				</div>
				</div>
				</div>
				<div class="sources-content  dnone " style="display: none;">
				<ul class="mar0 pad0  fsz14">
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Land :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['c_phone'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Mobil nr. :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['phone'].'</span>
				</li>
				
				
				</ul>
				</div>
				</div>';
			}
			else
			{
				$byphone="";
			}
			if($posted_value['fors']>0) { 
				
				$fors='<div class="result-item padtb0  lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">For Suppliers</span>
				
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>'.$posted_value['fors'].'</span>
				<span class="fa fa-caret-up dnone diblock_pa"></span>
				<span class="fa fa-caret-down dnone_pa"></span>
				</a>
				</div>
				</div>
				</div>
				<div class="sources-content  dnone padb20 " style="display: none;">
				<ul class="mar0 pad0  fsz14">
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Invoicing Address :</a>
				</div>
				<span class="fxshrink_0 marrl50">'.$posted_value['addrssi'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Zipcode :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['zipsi'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">City :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['citysi'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Country :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['cntrysi'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Delivery Address :</a>
				</div>
				<span class="fxshrink_0 marrl50">'.$posted_value['addrssd'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Zipcode :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['zipsd'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">City :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['citysd'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Country :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['cntrysd'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">VAT :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['vat'].'</span>
				</li>
				</ul>
				</div>
				</div>';
			}
			else
			{
				$fors="";
			}
			
			if($posted_value['forc']>0) { 
				
				$forc='<div class="result-item padtb0  lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">For Customers</span>
				
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>'.$posted_value['forc'].'</span>
				<span class="fa fa-caret-up dnone diblock_pa"></span>
				<span class="fa fa-caret-down dnone_pa"></span>
				</a>
				</div>
				</div>
				</div>
				<div class="sources-content  dnone padb20 " style="display: none;">
				<ul class="mar0 pad0  fsz14">
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Bankgiro med OCR :</a>
				</div>
				<span class="fxshrink_0 marrl50">'.$posted_value['bankgiro_med'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Bankgiro utan OCR :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['bankgiro_utan'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">IBAN :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['iban'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">BIC :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['bic'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Bank :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['bank'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">F tax :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['ftax'].'</span>
				</li>
				
				</ul>
				</div>
				</div>';
			}
			else
			{
				$forc="";
			}
			
			if($posted_value['socialm']>0) { 
				
				$forcsocial='<div class="result-item padtb0  lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">Socail Info</span>
				
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>'.$posted_value['socialm'].'</span>
				<span class="fa fa-caret-up dnone diblock_pa"></span>
				<span class="fa fa-caret-down dnone_pa"></span>
				</a>
				</div>
				</div>
				</div>
				<div class="sources-content  dnone padb20 " style="display: none;">
				<ul class="mar0 pad0  fsz14">
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Facebook :</a>
				</div>
				<span class="fxshrink_0 marrl50">'.substr($posted_value['fb'],0,20).'...'.'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Twitter :</a>
				</div>
				<span class="fxshrink_0 marl100">'.substr($posted_value['twitter'],0,20).'...'.'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Instagram :</a>
				</div>
				<span class="fxshrink_0 marl100">'.substr($posted_value['insta'],0,20).'...'.'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Linkedin :</a>
				</div>
				<span class="fxshrink_0 marl100">'.substr($posted_value['blog'],0,20).'...'.'</span>
				</li>
				
				
				</ul>
				</div>
				</div>';
			}
			else
			{
				$forcsocial="";
			}
			
			$org='<div class="padb0 ">
			<h2 class="tall marb5 pad0 bold fsz24 black_txt">Verifiera</h2>
			<div class="wi_100 dflex fxwrap_w marrla marb10 tall">
			
			
			
			<div class="wi_100 marb10 tall">
			
			<span class="valm fsz16">Signera dina ändrade uppgifter</span>
			</div>
			
			
			</div>
			</div>
			
			<!-- Center content -->
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10 lgtgrey2_bg brdrad3">
			<div class="padtb0 brdrad3 lgtgrey2_bg">
			
			<div class="mart0" id="search_data">
			
			
			'.$general.
			' '.$va.' 
			'.$bypost.' '.$byphone.
			' '.$fors.
			' '.$forc.' '.$forcsocial.'
			
			'.$support.'
			
			</div>
			
			</div>
			
			</div>
			<form method="POST" action="../updateAccount/'.$data['cid'].'" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla mart10"> <a href="#" class="wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2" onclick="submit_value_company();">Signera med Mobilt BankId</a> 
			<input type="hidden" id="total_value" name="total_value" value="'.str_ireplace('"',"'",$_POST['total_value']).'" />
			</div>
			</form>';
			
			
			
			return $org;
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
			  
			$stmt = $dbCon->prepare("select id from whitelist_ip where company_id=? and ip_address=? and ip_type=1");
			
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
		
		function getBookId($data)
		{
			
			$book_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			return $book_id;
			
		}
		
		function verificationId($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select max(id) as v_id from company_passport_logs where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$row['v_id']="";
			}
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image from user_logins where id = ?");
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
		
		function completedEmployeeRequests($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select employees.company_id,company_name,profile_pic from employees left join companies on employees.company_id=companies.id left join company_profiles on companies.id=company_profiles.company_id where employees.user_login_id = ? and o_type=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
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
		
		function propertyInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$property_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select  * from property_location where company_id=? and is_headquarter=1");
			/* bind parameters for markers */
			$stmt->bind_param("i", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['enc']=$this -> encrypt_decrypt('encrypt',$row['id']); 
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		
		function locationOfficeInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$property_id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("select  * from property_location where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['cid']=$this -> encrypt_decrypt('encrypt',$row['company_id']);
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function companyLocationContactInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$property_id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select  * from company_location_contact_info where location_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into company_location_contact_info (location_id,company_id,created_on,modified_on) values(?,?,now(),now())");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $property_id,$company_id);
			$stmt->execute();	
			$stmt = $dbCon->prepare("select  * from company_location_contact_info where location_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			}
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
			  
			$stmt = $dbCon->prepare("select is_invoice_same,currency_id,d_port_number,i_port_number,latitude,longitude,support_email,support_country,support_phone,sales_email,sales_country,sales_phone,invoice_email,invoice_country,invoice_phone,website,companies.country_id,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax,fb,twitter,insta,blog from companies left join company_profiles on companies.id=company_profiles.company_id left join country on companies.country_id=country.id left join phone_country_code on phone_country_code.country_name=country.country_name  where companies.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			
			
			
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		function updateCurrency($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("update companies set  currency_id=? where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii",$_POST['currency_id'], $company_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		
		function addressDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select * from property_location  where company_id=? and is_headquarter=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			 
			 
			
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		function updateDataPost($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update company_profiles set address=?,city=?,country=?,zip=?  where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssssi", $_POST['addrs'],$_POST['city'],$_POST['cntry'],$_POST['zip'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateDataPostSupplier($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update company_profiles set si_address=?,si_city=?,si_country=?,si_zip=?,sd_address=?,sd_city=?,sd_country=?,sd_zip=?,vat=?   where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("sssssssssi", $_POST['addrssi'],$_POST['citysi'],$_POST['cntrysi'],$_POST['zipsi'],$_POST['addrssd'],$_POST['citysd'],$_POST['cntrysd'],$_POST['zipsd'],$_POST['vat'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateDataPostNew($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update company_profiles set delivery_address=?,d_city=?,d_country=?,d_zip=?  where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssssi", $_POST['addrs'],$_POST['city'],$_POST['cntry'],$_POST['zip'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function countryList($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,country_name  from country where id>-1 and id<240 order by country_name");
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org="";
			while($row = $result->fetch_assoc())
			{
				$org=$org.$row['country_name'].",";
			}
			
			$org=substr($org,0,-1);
			//echo $org; die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function countryOption($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,country_name,country_code from phone_country_code order by country_code");
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
		
		
		
		
		
		function currencyOption($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select * from country_currency_code order by currency_iso_code");
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
		
		function countryNames($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,country_name,country_code from phone_country_code order by country_name");
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
		function industryList($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select name from company_categories");
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org="";
			while($row = $result->fetch_assoc())
			{
				$org=$org.$row['name'].",";
			}
			
			$org=substr($org,0,-1);
			//echo $org; die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function industryListOpt($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,name from company_categories");
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
		
		function updateDataPhone($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update company_profiles set phone_country=?,phone=? where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssi", $_POST['c_phone'],$_POST['phone'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		
		
		function updateData($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			//  print_r($_POST); die;
			$stmt = $dbCon->prepare("update companies set company_name=?,industry=?  where id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssi", $_POST['name'],$_POST['l_name'],$company_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update company_profiles set cid=?,founded=?  where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssi", $_POST['ssn'],$_POST['dob'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateDataBank($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("update company_profiles set bankgiro_med=?,bankgiro_utan=?,iban=?,bic=?,bank=?,f_tax=?  where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssssssi", $_POST['bankgiro_med'],$_POST['bankgiro_utan'],$_POST['iban'],$_POST['bic'],$_POST['bank'],$_POST['ftax'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
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
		
		function checkVisitor($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$org=array();
			$stmt = $dbCon->prepare("select id from company_visitors where country=? and phone_number=? and status=0 and company_id=?");
			$stmt->bind_param("ssi", $_POST['cntry'],$_POST['uphno'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if(empty($row))
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
		
		
		function informEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select company_name,exposed_times from whitelist_company where company_id = ? and status=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_company = $result->fetch_assoc();
			$exposed=$row_company['exposed_times'];
			
			$stmt = $dbCon->prepare("select email from employees where id=?");
			/* bind parameters for markers */
			
			$stmt->bind_param("i",$_POST['ind']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$name=htmlentities($_POST['name'],ENT_NOQUOTES, 'ISO-8859-1');
			$lname=htmlentities($_POST['lname'],ENT_NOQUOTES, 'ISO-8859-1');
			$cname=htmlentities($_POST['cname'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into company_visitors (booked,company_id,employee_id,name,last_name,company_name,email,country,phone_number,created_on,car_res_num )values (?, ?, ?, ?, ?, ?, ?, ?, ?, now(),?)");
			/* bind parameters for markers */
			
			$stmt->bind_param("siisssssis",$_POST['booked'],$company_id,$_POST['ind'],$name,$lname,$cname,$_POST['email'],$_POST['cntry'],$_POST['uphno'],$_POST['car_res_num']);
			if($stmt->execute())
			{
		
				$id=$stmt->insert_id;
				 
				$to      = $row['email'];
				
				$subject = "Your visitor is here";
				
				$emailContent ="Pls attend to your visitor. They are downstairs at ".$row_company['company_name'];
				try {
				 sendEmail($subject, $to, $emailContent);
						}

						 
					catch(Exception $e) {
						$to      = 'kowaken.ghirmai@gmail.com';
						sendEmail($subject, $to, $emailContent);
					   
					}
				
				$exposed=$exposed+1;
				
				$stmt = $dbCon->prepare("select country_code,phone_number,passport_image  from user_profiles left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone left join user_logins on user_logins.id=user_profiles.user_logins_id where user_profiles.user_logins_id=(select user_login_id from employees where id=?)");
				
				$stmt->bind_param("i",$_POST['ind']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				$phone='+'.trim($row['country_code']).''.trim($row['phone_number']);
				$subject='Your visitor is here';
				$to=$phone;
				$html=$_POST['name'].' '.$_POST['lname'].' from '.$_POST['cname'].' is here to meet you at '.$row_company['company_name'];
				//echo $html.' '.$to;
				$res=sendSms($subject, $to, $html);
				$res=json_decode($res,true);
				
				if($res['status']=="OK")
				{
				$exposed=$exposed+1;
				}
				
				$stmt = $dbCon->prepare("update whitelist_company set exposed_times=? where company_id = ? and status=1");
				/* bind parameters for markers */
				$stmt->bind_param("ii", $exposed,$company_id);
				$stmt->execute();
				
				
				$enc_id=$this->encrypt_decrypt('encrypt',$id);
				$url='https://www.qloudid.com/company/index.php/Company/confirmVisit/'.$enc_id;
				$surl=getShortUrl($url);
				
				$stmt = $dbCon->prepare("select country_code,phone_number from company_visitors left join phone_country_code on phone_country_code.country_name=company_visitors.country where company_visitors.id=?");
				
				$stmt->bind_param("i",$id);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row_phone = $result1->fetch_assoc();
				
				$phone='+'.trim($row_phone['country_code']).''.trim($row_phone['phone_number']);
				$subject='Confirm Your visit';
				$to=$phone;
				$html='Hej '.$_POST['name'].', Jag är där alldeles strax.  '.$surl;
				//echo $html.' '.$to;
				$res=sendSms($subject, $to, $html);
				
				function base64_to_jpeg($base64_string, $output_file) {
					// open the output file for writing
					$ifp = fopen( $output_file, 'wb' ); 
					
					// split the string on commas
					// $data[ 0 ] == "data:image/png;base64"
					// $data[ 1 ] == <actual base64 string>
					$data = explode( ',', $base64_string );
					//print_r($data); die;
					// we could add validation here with ensuring count( $data ) > 1
					fwrite( $ifp, base64_decode( $data[1] ) );
					
					// clean up the file resource
					fclose( $ifp ); 
					
					return $output_file; 
				}
				
				if($row ['passport_image']!=null) { $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else {  $imgs="../../../../../html/usercontent/images/default-profile-pic.jpg"; $value_a="../../../../../html/usercontent/images/default-profile-pic.jpg"; }
				
				$org='<div class="marb20">
				<img src="'.$imgs.'" class="maxwi_100 hei_auto">
				</div>
				<h2 class="marb10 pad0 bold fsz24 black_txt">Din ankomst är meddelad</h2>
				
				<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				
				<div class="wi_100 marb10 talc">
				
				<span class="valm fsz16">Var god och vänta ett par minuter.</span>
				</div>
				
				
				</div>
				
				<div class="on_clmn mart10 marb20">
				<input type="button" value="Close" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp " onclick="closePop();">
				
				</div>';
				
				
				$stmt->close();
				$dbCon->close();
				return  $this -> encrypt_decrypt('encrypt',$_POST['ind']);
			}
			else
			{
				$org='
				<h2 class="marb10 pad0 bold fsz24 black_txt">Some Error Occured</h2>
				
				<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				
				<div class="wi_100 marb10 talc">
				
				<span class="valm fsz16">Please report to web admin</span>
				</div>
				
				
				</div>
				
				<div class="on_clmn mart10 marb20">
				<input type="button" value="Close" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp " onclick="closePop();">
				
				</div>';
				$stmt->close();
				$dbCon->close();
				return $this -> encrypt_decrypt('encrypt',$_POST['ind']);
			}
			
			
			
		}
		
	}						