<?php
	require_once('../AppModel.php');
	class HotelStayModel extends AppModel
	{
		
		 function countryOptions()
				{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from phone_country_code order by country_name");
			
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
			
			
			function countryCode()
				{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from phone_country_code order by country_code");
			
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
		function guestDetails($data)
		{
			 $dbCon = AppModel::createConnection();
			$checkout_id= $this -> encrypt_decrypt('decrypt',$data['booking_id']);
			
			$stmt = $dbCon->prepare("select user_id,is_buyer_company,card_id,delivery_address_id from hotel_checkout_detail where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $checkout_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select first_name,last_name,concat_ws(' ',first_name,last_name) as name,country_of_residence,email,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUserDetail = $result->fetch_assoc();
			$org['name']=$rowUserDetail['name'];
			$org['first_name']=$rowUserDetail['first_name'];
			$org['last_name']=$rowUserDetail['last_name'];
			$org['country_of_residence']=$rowUserDetail['country_of_residence'];
			$org['email']=$rowUserDetail['email'];
			$org['phone_number']=$rowUserDetail['phone_number'];
			 
			if($row['is_buyer_company']==1)
			{
			$stmt = $dbCon->prepare("select address,city,zipcode,port_number from user_address where user_id=? and is_personal_address=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAddressDetail = $result->fetch_assoc();	
			}
			else
			{
			$stmt = $dbCon->prepare("select visiting_address as address,city_v as city,postal_code_v as zipcode,d_port_number as port_number from property_location where company_id=? and is_headquarter=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['buyer_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAddressDetail = $result->fetch_assoc();		
			}
			$org['address']=$rowAddressDetail['address'];
			$org['city']=$rowAddressDetail['city'];
			$org['zipcode']=$rowAddressDetail['zipcode'];
			$org['port_number']=$rowAddressDetail['port_number'];
			 
			
			if($row['is_buyer_company']==1)
			{
			$stmt = $dbCon->prepare("select card_number,card_cvv,exp_month,exp_year,name_on_card from user_cards where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['card_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAddressDetail = $result->fetch_assoc();	
			$rowAddressDetail['name_on_card']=$rowUserDetail['name'];
			}
			else
			{
			$stmt = $dbCon->prepare("select card_number,card_cvv,exp_month,exp_year,name_on_card from company_cards where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['card_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAddressDetail = $result->fetch_assoc();		
			}
			$org['card_number']=$rowAddressDetail['card_number'];
			$org['card_cvv']=$rowAddressDetail['card_cvv'];
			$org['exp_month']=$rowAddressDetail['exp_month'];
			$org['exp_year']=$rowAddressDetail['exp_year'];
			$org['name_on_card']=$rowAddressDetail['name_on_card'];
			 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function guestPassportDetails($data)
		{
			 $dbCon = AppModel::createConnection();
			$checkout_id= $this -> encrypt_decrypt('decrypt',$data['booking_id']);
			
			$stmt = $dbCon->prepare("select user_id,is_buyer_company,card_id,delivery_address_id from hotel_checkout_detail where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $checkout_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			 
			$stmt = $dbCon->prepare("select * from user_identification where user_id=? and identification_type=3");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAddressDetail = $result->fetch_assoc();	
			 
			$stmt->close();
			$dbCon->close();
			return $rowAddressDetail;
		}
		
		function addGuestPassport($data)
		{
		 
			$dbCon = AppModel::createConnection();
			
			$checkout_id=$this->encrypt_decrypt('decrypt',$data['booking_id']);
			$data1 = strip_tags($_POST['image-data1']);
			//echo $data; die;
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			$data2 = strip_tags($_POST['image-data3']);
			//echo $data; die;
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name2="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name2.".txt", $data2);
			
			$stmt = $dbCon->prepare("select user_id,is_buyer_company,card_id,delivery_address_id from hotel_checkout_detail where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $checkout_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("select id,company_id from employees where user_login_id=? and company_id=(select company_id from property_location where id=(select property_id from hotel_checkout_detail where id=?))");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii",$data['user_id'], $checkout_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowEmployee = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("select * from user_identification where user_id=? and identification_type=3");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAddressDetail = $result->fetch_assoc();	
			
			if(empty($rowAddressDetail))
			{
			$st=1;
			$_POST['identificator']=3;
		   	$stmt = $dbCon->prepare("insert into user_identification(user_id,identification_type,identity_number,issue_month,issue_year,expiry_month, expiry_year,created_on,front_image_path, back_image_path,is_completed)
			values(?, ?, ?, ?, ?, ?, ?, now(),?,?,?)");
			$stmt->bind_param("iissisissi", $row['user_id'],$_POST['identificator'],$_POST['id_number'],$_POST['issue_month'],$_POST['issue_year'],$_POST['expiry_month'],$_POST['expiry_year'],$img_name1,$img_name2,$st);
			$stmt->execute();	
			$id=$stmt->insert_id;
			}
			else
			{
				 
			$stmt = $dbCon->prepare("update user_identification set identity_number=?,issue_month=?,issue_year=?,expiry_month=?, expiry_year=?,front_image_path=?, back_image_path=?,is_completed=1 where id=?
			");
			$stmt->bind_param("ssisissi",$_POST['id_number'],$_POST['issue_month'],$_POST['issue_year'],$_POST['expiry_month'],$_POST['expiry_year'],$img_name1,$img_name2,$rowAddressDetail['id']);
			$stmt->execute();	
			
			$id=$rowAddressDetail['id'];
			}
			 
			$stmt = $dbCon->prepare("select * from employee_identificator_verification_detail where employee_identity_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowVerify = $result->fetch_assoc();	
			
			if(empty($rowVerify))
			{
				$st=1;
				$stmt = $dbCon->prepare("insert into employee_identificator_verification_detail(employee_user_id,employee_id,company_id,admin_user_id,is_visible,employee_identity_id,created_on,name_visible, idnumber_visible , issue_date_visible, expiry_date_visible ) values(?,?,?,?,?,?,now(),?,?,?,?)");
			
				/* bind parameters for markers */
				$stmt->bind_param("iiiiiiiiii", $row['user_id'],$rowEmployee['company_id'],$rowEmployee['id'],$data['user_id'],$st,$st,$st,$st,$st,$st);
				$stmt->execute();
			}
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function guestChildrenRemainingCount($data)
		{
			$dbCon = AppModel::createConnection();
			$checkout_id= $this -> encrypt_decrypt('decrypt',$data['booking_id']);  
			$stmt = $dbCon->prepare("select guest_children from hotel_checkout_detail where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $checkout_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowDate = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("select count(id) as num from hotel_checkout_dependent_detail where hotel_checkout_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $checkout_id);
			$stmt->execute();
			$resultCount = $stmt->get_result();
			$rowDependentCount = $resultCount->fetch_assoc();
			$rowDate['guest_children']=$rowDate['guest_children']-$rowDependentCount['num'];
			 if($rowDate['guest_children']<0)
			 {
				 $rowDate['guest_children']=0;
			 }
			$stmt->close();
			$dbCon->close();
			return $rowDate['guest_children'];
		}

		
		function checkUserDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id from user_logins where email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if(empty($row))
			{
			$stmt = $dbCon->prepare("select count(user_logins.id) as num   from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where country_of_residence=? and phone_number=?");
			/* bind parameters for markers */
			$stmt->bind_param("is", $_POST['pcountry'], $_POST['p_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt->close();
			$dbCon->close();
			return 1;	
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return 2;	
			}
			}
			else
			{
			$stmt = $dbCon->prepare("select count(user_logins.id) as num   from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where country_of_residence=? and phone_number=? and user_logins.id!=?");
			/* bind parameters for markers */
			$stmt->bind_param("isi", $_POST['pcountry'], $_POST['p_number'],$row['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if($row['num']==0)
			{
			$stmt->close();
			$dbCon->close();
			return 1;	
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return 2;	
			}	
			}
		}
		
		
		function addGuestChildCheckinInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$checkout_id= $this -> encrypt_decrypt('decrypt',$data['booking_id']);
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			$st=1;
			$stmt = $dbCon->prepare("insert into hotel_checkout_dependent_detail(dependent_id,hotel_checkout_id,created_on,is_verified) values (?, ?, now(),?)");
			/* bind parameters for markers */
			$stmt->bind_param("iii",$child_id,$checkout_id,$st);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function addCheckinAdultInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$checkout_id= $this -> encrypt_decrypt('decrypt',$data['booking_id']);
				$data1 = strip_tags($_POST['image-data1']);
				//echo $data; die;
				define('UPLOAD_DIR','../estorecss/'); // image dir path
				$img_name1="new".microtime();
				file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
				
				$data2 = strip_tags($_POST['image-data3']);
				//echo $data; die;
				define('UPLOAD_DIR','../estorecss/'); // image dir path
				$img_name2="new".microtime();
				file_put_contents(UPLOAD_DIR.$img_name2.".txt", $data2);
			$_POST['name_on_house']=$_POST['first_name'].' '.$_POST['last_name'];	
			$stmt = $dbCon->prepare("select id,company_id from employees where user_login_id=? and company_id=(select company_id from property_location where id=(select property_id from hotel_checkout_detail where id=?))");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii",$data['user_id'], $checkout_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowEmployee = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("select id from user_logins where email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$st=1;
				$stmt = $dbCon->prepare("INSERT INTO user_logins (registered_from,get_started_wizard_status,email , created_on , modified_on, country_of_residence ,grading_status,first_name,last_name) VALUES (?, ?, ?,now(), now(), ?, ?, ?, ?)");
				$stmt->bind_param("iisiiss", $st,$st,$_POST['email'], $_POST['pcountry'],$st, $_POST['first_name'], $_POST['last_name']);
				$stmt->execute();
				$id=$stmt->insert_id; 
				
				$stmt = $dbCon->prepare("INSERT INTO user_profiles (user_logins_id , created_on , modified_on, phone_number ) VALUES (?, now(), now(), ?)");
				$stmt->bind_param("is", $id, $_POST['p_number']);  
				$stmt->execute();
				
				
				$stmt = $dbCon->prepare("update user_profiles set name_on_door=?, entry_code=?, full_address=?, port_number=?, address=?, city=?, zipcode=?,invoice_address=?,invoice_zipcode=?,invoice_city=?,invoice_port=?,is_invoice_same=?,is_name_on_house_same=?,is_id_active=1  where user_logins_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("sssssssssssiii",$_POST['name_on_house'],$st, $_POST['d_address'],$_POST['dpo_number'], $_POST['d_address'],$_POST['dcity'],$_POST['dzip'],$_POST['d_address'],$_POST['dzip'],$_POST['dcity'],$_POST['dpo_number'],$st,$st,$id);
				$stmt->execute();
			
				$stmt = $dbCon->prepare("insert into  user_address ( `user_id`, `address`  , `city`  , `zipcode` , `port_number` , `invoice_address`  , `invoice_city`  , `invoice_zipcode`  , `invoice_port_number`  , `is_name_same`  , `is_invoice_same`  , `name_on_house`   , `created_on`,entry_code ) values (? , ?, ?, ?, ? , ?, ?, ?, ? , ?, ?, ?, now(), ?)");
				/* bind parameters for markers */
				$stmt->bind_param("issssssssiiss",$id,$_POST['d_address'],$_POST['dcity'],$_POST['dzip'],$_POST['dpo_number'],$_POST['d_address'],$_POST['dcity'],$_POST['dzip'],$_POST['dpo_number'],$st,$st,$_POST['name_on_house'],$st);
				$stmt->execute();
				$a_id=$stmt->insert_id;
				
				if($_POST['card_number']=='' || $_POST['card_number']==null)
				{
					$card_id=0;
				}
				else
				{
				$stmt = $dbCon->prepare("insert into user_cards(`user_login_id`,`created_on`,`card_number`,card_cvv,exp_month,exp_year,name_on_card) values(?, now(), ?, ?, ?, ?, ?,)");
				$stmt->bind_param("isiiis", $id,$_POST['card_number'],$_POST['cvv'],$_POST['exp_month'],$_POST['exp_year'],htmlentities($_POST['card_name'],ENT_NOQUOTES, 'ISO-8859-1'));
				$stmt->execute();
				$card_id=$stmt->insert_id;
				}
				
				$st=1;
				$_POST['identificator']=3;
				$stmt = $dbCon->prepare("insert into user_identification(user_id,identification_type,identity_number,issue_month,issue_year,expiry_month, expiry_year,created_on,front_image_path, back_image_path,is_completed)
				values(?, ?, ?, ?, ?, ?, ?, now(),?,?,?)");
				$stmt->bind_param("iissisissi", $row['user_id'],$_POST['identificator'],$_POST['id_number'],$_POST['issue_month'],$_POST['issue_year'],$_POST['expiry_month'],$_POST['expiry_year'],$img_name1,$img_name2,$st);
				$stmt->execute();	
				$passport_id=$stmt->insert_id;
			}
			else
			{
				$id=$row['id'];
				
				$stmt = $dbCon->prepare("select * from user_address where user_id=? and address=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("is", $id,$_POST['d_address']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowAddress = $result->fetch_assoc();
				if(empty($rowAddress))
				{
				$stmt = $dbCon->prepare("select count(id) as num from user_address where user_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $id);
				$stmt->execute();
				$result = $stmt->get_result();
				$addressCount = $result->fetch_assoc();
				if($addressCount['num']==0)
				{
					$is_personal_address=1;
				}
				else
				{
				$is_personal_address=0;	
				}
				$stmt = $dbCon->prepare("insert into  user_address ( is_personal_address,`user_id`, `address`  , `city`  , `zipcode` , `port_number` , `invoice_address`  , `invoice_city`  , `invoice_zipcode`  , `invoice_port_number`  , `is_name_same`  , `is_invoice_same`  , `name_on_house`   , `created_on`,entry_code ) values (?,? , ?, ?, ?, ? , ?, ?, ?, ? , ?, ?, ?, now(), ?)");
				/* bind parameters for markers */
				$stmt->bind_param("iissssssssiiss",$is_personal_address,$id,$_POST['d_address'],$_POST['dcity'],$_POST['dzip'],$_POST['dpo_number'],$_POST['d_address'],$_POST['dcity'],$_POST['dzip'],$_POST['dpo_number'],$st,$st,$_POST['name_on_house'],$st);
				$stmt->execute();
				$a_id=$stmt->insert_id;	
				}
				else
				{
				$a_id=$rowAddress['id'];		
				}
				
				if($_POST['card_number']=='' || $_POST['card_number']==null)
				{
					$card_id=0;
				}
				else
				{
				$stmt = $dbCon->prepare("select * from user_cards where user_id=? and card_number=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("is", $id,$_POST['card_number']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowCardDetail = $result->fetch_assoc();
				if(empty($rowCardDetail))
				{
				$stmt = $dbCon->prepare("insert into user_cards(`user_login_id`,`created_on`,`card_number`,card_cvv,exp_month,exp_year,name_on_card) values(?, now(), ?, ?, ?, ?, ?,)");
				$stmt->bind_param("isiiis", $id,$_POST['card_number'],$_POST['cvv'],$_POST['exp_month'],$_POST['exp_year'],htmlentities($_POST['card_name'],ENT_NOQUOTES, 'ISO-8859-1'));
				$stmt->execute();
				$card_id=$stmt->insert_id;	
				}
				else
				{
				$stmt = $dbCon->prepare("update user_cards set `card_number`=?,card_cvv=?,exp_month=?,exp_year=?,name_on_card=? where id=?");
				$stmt->bind_param("siiisi",$_POST['card_number'],$_POST['cvv'],$_POST['exp_month'],$_POST['exp_year'],htmlentities($_POST['card_name'],ENT_NOQUOTES, 'ISO-8859-1'),$rowCardDetail['id']);
				$stmt->execute();
				$card_id=$rowCardDetail['id'];		
				}
				}
			
			
				$stmt = $dbCon->prepare("select * from user_identification where user_id=? and identification_type=3");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $id);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowAddressDetail = $result->fetch_assoc();

				if(empty($rowAddressDetail))
				{
				$st=1;
				$_POST['identificator']=3;
				$stmt = $dbCon->prepare("insert into user_identification(user_id,identification_type,identity_number,issue_month,issue_year,expiry_month, expiry_year,created_on,front_image_path, back_image_path,is_completed)
				values(?, ?, ?, ?, ?, ?, ?, now(),?,?,?)");
				$stmt->bind_param("iissisissi", $id,$_POST['identificator'],$_POST['id_number'],$_POST['issue_month'],$_POST['issue_year'],$_POST['expiry_month'],$_POST['expiry_year'],$img_name1,$img_name2,$st);
				$stmt->execute();	
				$passport_id=$stmt->insert_id;
				}
				else
				{
				$stmt = $dbCon->prepare("update user_identification set identity_number=?,issue_month=?,issue_year=?,expiry_month=?, expiry_year=?,front_image_path=?, back_image_path=?,is_completed=1 where id=?
				");
				$stmt->bind_param("ssisissi",$_POST['id_number'],$_POST['issue_month'],$_POST['issue_year'],$_POST['expiry_month'],$_POST['expiry_year'],$img_name1,$img_name2,$rowAddressDetail['id']);
				$stmt->execute();	
				
				$passport_id=$rowAddressDetail['id'];
				}
			
			}
			
			$stmt = $dbCon->prepare("insert into hotel_checkout_invitation_info(email,country_code,phone_number,invited_user_id,is_confirmed,hotel_checkout_id, invitation_type, pre_checked,passport_id,address_id,card_id,country_id) values(?,?,?,?,?,?,?,?,?,?,?,?)");
			
			$stmt->bind_param("sisiiiiiiiii",$_POST['email'],$_POST['pcountry'],$_POST['p_number'],$id,$st,$checkout_id,$st,$st,$passport_id,$a_id,$card_id,$_POST['pcountry']);
			$stmt->execute();
				

			$stmt = $dbCon->prepare("select * from employee_identificator_verification_detail where employee_identity_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowVerify = $result->fetch_assoc();	
			
			if(empty($rowVerify))
			{
				$st=1;
				$stmt = $dbCon->prepare("insert into employee_identificator_verification_detail(employee_user_id,employee_id,company_id,admin_user_id,is_visible,employee_identity_id,created_on,name_visible, idnumber_visible , issue_date_visible, expiry_date_visible ) values(?,?,?,?,?,?,now(),?,?,?,?)");
			
				/* bind parameters for markers */
				$stmt->bind_param("iiiiiiiiii", $id,$rowEmployee['company_id'],$rowEmployee['id'],$data['user_id'],$st,$st,$st,$st,$st,$st);
				$stmt->execute();
			}
			
			
			$stmt = $dbCon->prepare("select buyer_id,is_buyer_company,hotel_checkout_detail.user_id,visiting_address,port_number,visiting_city,visiting_state,property_location.id as p_id,room_type_id,total_days,price,hotel_name,fdesk_country_code,fdesk_phone_number from hotel_checkout_detail left join company_hotel_room_type_detail on company_hotel_room_type_detail.id= hotel_checkout_detail.room_type_id left join hotel_basic_information on hotel_basic_information.property_id=company_hotel_room_type_detail.location_id left join property_location on property_location.id=hotel_basic_information.property_id where hotel_checkout_detail.id=(select hotel_checkout_id from hotel_checkout_invitation_info where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $checkout_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowInfo = $result->fetch_assoc();
			$subject = "Checkin process started!!!";
			$to      = $_POST['email'];
			$emailContent='<html xmlns="http://www.w3.org/1999/xhtml" style="background-color: rgb(240, 240, 240);"><head>
					  <title>Reservation confirmed</title>
					  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
					  <meta charset="utf-8">
					  <meta name="viewport" content="width=device-width, initial-scale=1">
					  <meta http-equiv="X-UA-Compatible" content="IE=edge">
					  <style type="text/css">
						/* GT AMERICA */

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Regular";
						  font-weight: 400;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.ttf") format("truetype");
						}

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Medium";
						  font-weight: 600;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.ttf") format("truetype");
						}

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Condensed Bold";
						  font-weight: 700;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.ttf") format("truetype");
						}

						/* CLIENT-SPECIFIC RESET */

						body,
						table,
						td,
						a {
						  -webkit-text-size-adjust: 100%;
						  -ms-text-size-adjust: 100%;
						}

						/* Prevent WebKit and Windows mobile changing default text sizes */

						table,
						td {
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						}

						/* Remove spacing between tables in Outlook 2007 and up */

						img {
						  -ms-interpolation-mode: bicubic;
						}

						/* Allow smoother rendering of resized image in Internet Explorer */

						.im {
						  color: inherit !important;
						}

						/* DEVICE-SPECIFIC RESET */

						a[x-apple-data-detectors] {
						  color: inherit !important;
						  text-decoration: none !important;
						  font-size: inherit !important;
						  font-family: inherit !important;
						  font-weight: inherit !important;
						  line-height: inherit !important;
						}

						/* iOS BLUE LINKS */

						/* RESET */

						img {
						  border: 0;
						  height: auto;
						  line-height: 100%;
						  outline: none;
						  text-decoration: none;
						  display: block;
						}

						table {
						  border-collapse: collapse;
						}

						table td {
						  border-collapse: collapse;
						  display: table-cell;
						}

						body {
						  height: 100% !important;
						  margin: 0 !important;
						  padding: 0 !important;
						  width: 100% !important;
						}

						/* BG COLORS */

						.mainTable {
						  background-color: #F0F0F0;
						}

						.mainTable--hospitality {
						  background-color: #f7f2ed;
						}

						html {
						  background-color: #F0F0F0;
						}

						/* VARIABLES */

						.bg-white {
						  background-color: white;
						}

						.hr {
						  /* Cross-client horizontal rule. Adapted from https://litmus.com/community/discussions/4633-is-there-a-reliable-1px-horizontal-rule-method */
						  background-color: #d3d3d8;
						  border-collapse: collapse;
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						  mso-line-height-rule: exactly;
						  line-height: 1px;
						}

						.textAlignLeft {
						  text-align: left !important;
						}

						.textAlignRight {
						  text-align: right !important;
						}

						.textAlignCenter {
						  text-align: center !important;
						}

						.mt1 {
						  margin-top: 6px;
						}

						.list {
						  padding-left: 18px;
						  margin: 0;
						}

						/* TYPOGRAPHY */

						body {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  color: #4f4f65;
						  -webkit-font-smoothing: antialiased;
						  -ms-text-size-adjust: 100%;
						  -moz-osx-font-smoothing: grayscale;
						  font-smoothing: always;
						  text-rendering: optimizeLegibility;
						}

						.h1 {
						  font-family: "GT America Condensed Bold", "Roboto Condensed", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 700;
						  vertical-align: middle;
						  font-size: 36px;
						  line-height: 42px;
						}

						.h2 {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 600;
						  vertical-align: middle;
						  font-size: 16px;
						  line-height: 24px;
						}

						.text {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 16px;
						  line-height: 21px;
						}

						.text-list {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 16px;
						  line-height: 25px;
						}

						.textSmall {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 14px;
						}

						.text-xsmall {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-size: 11px;
						  text-transform: uppercase;
						  line-height: 22px;
						  letter-spacing: 1px;
						}

						.text-bold {
						  font-weight: 600;
						}

						.text-link {
						  text-decoration: underline;
						}

						.text-linkNoUnderline {
						  text-decoration: none;
						}

						.text-strike {
						  text-decoration: line-through;
						}

						/* FONT COLORS */

						.textColorDark {
						  color: #23233e;
						}

						.textColorNormal {
						  color: #4f4f65;
						}

						.textColorBlue {
						  color: #2020c0;
						}

						.textColorGrayDark {
						  color: #7B7B8B;
						}

						.textColorGray {
						  color: #A5A8AD;
						}

						.textColorWhite {
						  color: #FFFFFF;
						}

						.textColorRed {
						  color: #df3232;
						}

						/* BUTTON */

						.Button-primary-wrapper {
						  border-radius: 3px;
						  background-color: #2020C0;
						}

						.Button-primary {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  border-radius: 3px;
						  border: 1px solid #2020C0;
						  color: #ffffff;
						  display: block;
						  font-size: 16px;
						  font-weight: 600;
						  padding: 18px;
						  text-decoration: none;
						}

						.Button-secondary-wrapper {
						  border-radius: 3px;
						  background-color: #ffffff;
						}

						.Button-secondary {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  border-radius: 3px;
						  border: 1px solid #2020C0;
						  color: #2020C0;
						  display: block;
						  font-size: 16px;
						  font-weight: 600;
						  padding: 18px;
						  text-decoration: none;
						}

						/* LAYOUT */

						.Content-container {
						  padding-left: 60px;
						  padding-right: 60px;
						}

						.Content-container--main {
						  padding-top: 54px;
						  padding-bottom: 60px;
						}

						.Content {
						  width: 580px;
						  margin: 0 auto;
						}

						.wrapper {
						  max-width: 600px;
						}

						.section {
						  padding: 24px 0px;
						  border-bottom: 1px solid #d3d3d8;
						}

						.section--noBorder {
						  padding: 24px 0px 0;
						}

						.section--last {
						  padding: 24px 0px;
						}

						.message {
						  background-color: #F4F4F5;
						  padding: 18px;
						}

						.card {
						  border: 1px solid #d3d3d8;
						  padding: 18px;
						}

						/* HEADER */

						.header-tockLogoImage {
						  display: block;
						  color: #F0F0F0;
						}

						.header-heroImage {
						  padding-bottom: 24px;
						}

						/* PREHEADER */

						.preheader {
						  display: none;
						  font-size: 1px;
						  color: #FFFFFF;
						  line-height: 1px;
						  max-height: 0px;
						  max-width: 0px;
						  opacity: 0;
						  overflow: hidden;
						}

						/* BANNER */

						.notice {
						  padding: 12px;
						  background: #23233E;
						  color: #FFFFFF;
						  display: block;
						  font-size: 14px;
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 600;
						}

						/* INTRO */

						.section--intro {
						  padding-bottom: 48px;
						}

						/* BOOKING INFO */

						.business-logo__container {
						  width: 48px;
						  height: 48px;
						  border-radius: 3px;
						  border: 1px solid #d3d3d8;
						  overflow: hidden;
						}

						.business-logo__image {
						  border: 1px solid transparent;
						  border-radius: 3px;
						  width: 48px;
						  height: 48px;
						  display: block;
						}

						.business-address--address {
						  width: 50%;
						}

						.business-address--map {
						  width: 50%;
						}

						.business-address--map-image {
						  width: 100%;
						}

						/* MOBILE TICKETS */

						.mobile-ticket--description {
						  width: 65%;
						  margin-top: 12px;
						  margin-right: 5%;
						}

						.mobile-ticket--code {
						  width: 30%;
						}

						.mobile-ticket--code-image {
						  width: 100%;
						}

						/* RESERVATION ACTIONS */

						.linksTable {
						  border-bottom: 1px solid #d3d3d8;
						}

						.linksTableRow {
						  padding: 24px 12px;
						}

						.actions-icon {
						  vertical-align: middle;
						}

						.actions-text {
						  vertical-align: middle;
						}

						/* RECEIPT */

						.receipt__container {
						  border: 1px solid #d3d3d8;
						  padding: 24px;
						}

						.receipt__row {
						  border-top: 1px solid #d3d3d8;
						}

						/* FEEDBACK ICONS */

						.feedback-link {
						  border: 1px solid #d4d5da;
						  border-radius: 3px;
						  display: inline-block;
						  width: calc(32% - 2px);
						  padding: 10px 0;
						}

						.feedback-link-bumper {
						  display: inline-block;
						  width: 1%;
						}

						.feedback-link img {
						  height: 50px;
						  width: 50px;
						}

						/* SOCIAL ICONS */

						.social-link {
						  display: inline-block;
						  width: auto;
						}

						.social-link-text {
						  padding: 14px 24px 14px 14px;
						}

						/* TABLET STYLES */

						@media screen and (max-width: 648px) {
						  /* DEVICE-SPECIFIC RESET */
						  div[style*="margin: 16px 0;"] {
							margin: 0 !important;
						  }
						  /* ANDROID CENTER FIX */
						  /* LAYOUT */
						  .wrapper {
							width: 100% !important;
							max-width: 100% !important;
						  }
						  .Content {
							width: 90% !important;
						  }
						  .Content-container {
							padding-left: 36px !important;
							padding-right: 36px !important;
						  }
						  .Content-container--main {
							padding-top: 30px !important;
							padding-bottom: 42px !important;
						  }
						  .responsiveTable {
							width: 100% !important;
						  }
						  /* RESERVATION ACTIONS */
						  .linksTableRow {
							padding-left: 0 !important;
							padding-right: 0 !important;
							padding-top: 12px !important;
							padding-bottom: 12px !important;
						  }
						  .linksTableRow--borderRight {
							border-right: none !important;
							padding-left: 0 !important;
							padding-right: 0 !important;
						  }
						  /* FEEDBACK LINK */
						  .feedback-link img {
							height: 38px !important;
							width: 38px !important;
						  }
						}

						/* MOBILE STYLES */

						@media screen and (max-width: 480px) {
						  /* TYPOGRAPHY */
						  .h1 {
							font-size: 30px !important;
							line-height: 30px !important;
						  }
						  .text {
							font-size: 16px !important;
							line-height: 22px !important;
						  }
						  /* BUTTON */
						  .mobile-buttonContainer {
							width: 100% !important;
						  }
						  /* LAYOUT */
						  .Content {
							width: 100% !important;
						  }
						  .Content-container {
							padding-left: 18px !important;
							padding-right: 18px !important;
						  }
						  .Content-container--main {
							padding-top: 24px !important;
							padding-bottom: 30px !important;
						  }
						  .section {
							padding: 18px 0 !important;
						  }
						  .section--last {
							padding: 18px 0 !important;
						  }
						  .header {
							padding: 0 18px !important;
						  }
						  .business-address--address {
							width: 100% !important;
						  }
						  .business-address--map {
							margin-top: 30px !important;
							width: 100% !important;
						  }
						  .mobile-ticket--description {
							width: 100% !important;
							margin-top: 0px !important;
						  }
						  .mobile-ticket--code {
							margin-top: 30px !important;
							margin-left: 0;
							width: 100% !important;
						  }
						  /* RECEIPT */
						  .receipt__container {
							padding: 12px !important;
						  }
						  /* SOCIAL ICONS */
						  .social-link {
							display: block !important;
							width: 100% !important;
							border-bottom: 1px solid #d3d3d8 !important;
						  }
						  /* INTRO */
						  .section--intro {
							padding-top: 18px !important;
							padding-bottom: 18px !important;
						  }
						}
					  </style>
					</head>

					<body style="margin: 0 !important; padding: 0 !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; height: 100%; margin: 0; padding: 0; width: 100%; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; color: rgb(79, 79, 101); -webkit-font-smoothing: antialiased; -ms-text-size-adjust: 100%; -moz-osx-font-smoothing: grayscale; font-smoothing: always; text-rendering: optimizeLegibility;">
					   
					  <!--[if mso]>
						<style type="text/css">
					.h1 {font-family: "Helvetica", "Arial", sans-serif !important; font-weight: 700 !important; vertical-align: middle !important; font-size: 36px !important; mso-line-height-rule: exactly;line-height: 42px !important;}
					.h2 {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 600 !important;vertical-align: middle !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 24px !important;}
					.text {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 21px !important;}
					.text-list {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 25px !important;}
					.textSmall {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 14px !important;}
					.text-xsmall {font-family: "Helvetica", "Arial", sans-serif !important;font-size: 11px !important;text-transform: uppercase !important;mso-line-height-rule: exactly;line-height: 22px !important;letter-spacing: 1px !important;}
					.text-bold {font-weight: 600 !important;}
					.text-link {text-decoration: underline !important;}
					.text-linkNoUnderline {text-decoration: none !important;}
					.text-strike {text-decoration: line-through !important;}
					.textColorDark {color: #23233e !important;}
					.textColorNormal {color: #4f4f65 !important;}
					.textColorBlue {color: #2020c0 !important;}
					.textColorGray {color: #A5A8AD !important;}
					.textColorWhite {color: #FFFFFF !important;}
					.Button-primary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #ffffff !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
					.Button-secondary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #2020C0 !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
						</style>
						<![endif]-->
					  <!-- HIDDEN PREHEADER TEXT -->
					  <div class="preheader" style="display: none; font-size: 1px; color: rgb(255, 255, 255); line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
					  </div>
					  <table border="0" cellpadding="0" cellspacing="0" width="100%" class=" mainTable  " style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: rgb(240, 240, 240);">
						<tbody><tr><td style="display:none !important;
					 visibility:hidden;
					 mso-hide:all;
					 font-size:1px;
					 color:#ffffff;
					 line-height:1px;
					 max-height:0px;
					 max-width:0px;
					 opacity:0;
					 overflow:hidden; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> We are thrilled that you will be joining us. If yo... </td>
						<!-- HEADER -->
						</tr><tr>
						  <td align="center" class="header" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
							<!--[if (gte mso 9)|(IE)]>
						<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
						<tr>
						<td align="center" valign="top" width="600">
						<![endif]-->
							<table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 580px; margin: 0 auto;">
							  <tbody><tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr>
								<td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <h1 style="font-size: 33px;font-weight: 800;line-height: 30px;">Dstricts</h1>               </td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							</tbody></table>
							<!--[if (gte mso 9)|(IE)]>
						</td>
						</tr>
						</table>
						<![endif]-->
						  </td>
						</tr>
						<!-- CONTENT -->
						<tr>
						  <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
							<!--[if (gte mso 9)|(IE)]>
						<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
						<tr>
						<td align="center" valign="top" width="600">
						<![endif]-->
							<table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content bg-white" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: white; width: 580px; margin: 0 auto;">
							  <tbody><tr>
								<td class="Content-container Content-container--main text textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101); padding-left: 60px; padding-right: 60px; padding-top: 54px; padding-bottom: 60px;">
								  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
									<!-- RESTAURANT INFO -->
									<tbody><tr>
									  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr>
											<td align="left" valign="center" width="48" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="business-logo__container" style="width: 48px; height: 48px; border-radius: 3px; border: 1px solid rgb(211, 211, 216); overflow: hidden;">
												<img src="'.$rowImage['image_path'].'" class="business-logo__image" width="48" height="48" alt="Logo" style="-ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; display: block; border: 1px solid transparent; border-radius: 3px; width: 48px; height: 48px; display: block;">
											  </div>
											</td>
											<td width="12" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
											<td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">'.$rowInfo["hotel_name"].'</span>                          </td>
										  </tr>
										  <tr class="spacer">
											<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  <tr class="spacer">
											<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										</tbody></table>
									  </td>
									</tr>
									<!-- INTRO -->
									<tr>
									  <td valign="top" align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">Invitation received</span>                          </td>
										  </tr>
										  <tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  <tr>
											<td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
											  <!--[if gte mso 15]>&nbsp;<![endif]-->
											</td>
										  </tr>
										  <tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										</tbody></table>
									  </td>
									</tr>
									<!-- MESSAGE -->
									<tr class="spacer">
									  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<tr>
									  <td align="left" class="message" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
										<div class="text textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
										  <span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">A message from '.$rowInfo["name"].'</span>
										  <br>Your detail has been added on front desk checkin and your Qloud ID account has been created/updated. You can continue using your Qloud ID.</div>
									  </td>
									</tr>
									<tr class="spacer">
									  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<tr>
									  <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
										<!--[if gte mso 15]>&nbsp;<![endif]-->
									  </td>
									</tr>
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<!-- BOOKING INFO -->
									<tr>
									  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr>
											<td align="left" valign="middle" width="468" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="text-list textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">
												<span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">'.date("F j, Y, g:i a").'</span>
												<br> Party of 2 for Smiles Davis 
												<br> Confirmation code #: '.$code.'
												<br> Reservation × 2
												<br>
											  </div>
											</td>
										  </tr>
										  
										  
										  

					

					

					
										</tbody></table>
									  </td>
									</tr>
									<!-- ADDRESS -->
									<tr>
									  <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  <tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  <tr>
											<td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
											  <!--[if gte mso 15]>&nbsp;<![endif]-->
											</td>
										  </tr>
										  <tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  <tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  <tr>
											<td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
												<tbody><tr>
												  <td style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
													<table align="left" border="0" cellpadding="0" cellspacing="0" width="230" class="business-address--address" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 50%;">
													  <tbody><tr>
														<td align="left" width="100%" class="text-list textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">
														<span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">'.$rowInfo["hotel_name"].'</span><br>'.$rowInfo["visiting_address"].' '.$rowInfo["port_number"].'<br>'.$rowInfo["visiting_city"].' '.$rowInfo["visiting_state"].'<br> <a href="tel:+' .$rowInfo[" fdesk_country_code"].'="" '.$rowinfo["fdesk_phone_number"].'"="">+'.$rowInfo["fdesk_country_code"].' '.$rowInfo["fdesk_phone_number"].'</a><br> <br> <a href="https://www.google.com/maps/dir//'.$rowInfo['visiting_address'].' '.$rowInfo['port_number'].'/" class="text text-link textColorBlue" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; text-decoration: underline; color: rgb(32, 32, 192);" target="_blank">Get directions</a>                                      </td>
													  </tr>
													</tbody></table>
													<!--[if mso]></td><td><![endif]-->
													<table align="right" border="0" cellpadding="0" cellspacing="0" width="230" class="business-address--map" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 50%;">
													  <tbody><tr>
														<td width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <a href="https://www.google.com/maps/dir//1350+W+Randolph%2C+Chicago%2C+IL%2C+US+60607/" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;"> <img width="230" class="business-address--map-image" height="auto" alt="Map of Elske" src="https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyCPd%2DxSabI7QOfKX5NxVVup6bPfcovwFiQ&amp;center=1350+W+Randolph%2C+Chicago%2C+IL%2C+US+60607&amp;size=300x200&amp;zoom=15&amp;scale=2&amp;format=png&amp;visual%5Frefresh=true&amp;markers=scale%3A2%7Cicon%3Ahttps%3A%2F%2Fstorage.googleapis.com%2Ftock%2Dpublic%2Dassets%2Fimages%2Demail%2Dtemplate%2Femail%2Dmap%2Dmarker.png%7Cshadow%3Afalse%7C1350+W+Randolph%2C+Chicago%2C+IL%2C+US+60607&amp;style=feature%3Aall%7Celement%3Alabels.text.fill%7Ccolor%3A0x4b505b&amp;style=feature%3Aall%7Celement%3Alabels.text.stroke%7Ccolor%3A0xffffff%7Cvisibility%3Aon&amp;style=feature%3Aadministrative.land%5Fparcel%7Celement%3Aall%7Cvisibility%3Aoff&amp;style=feature%3Alandscape.man%5Fmade%7Celement%3Aall%7Cvisibility%3Aon&amp;style=feature%3Alandscape.man%5Fmade%7Celement%3Ageometry.fill%7Ccolor%3A0xe9e9eb&amp;style=feature%3Apoi%7Celement%3Aall%7Cvisibility%3Aoff&amp;style=feature%3Aroad%7Celement%3Ageometry.fill%7Ccolor%3A0xffffff&amp;style=feature%3Aroad%7Celement%3Alabels.text.fill%7Ccolor%3A0x787c84&amp;style=feature%3Aroad%7Celement%3Alabels.icon%7Cvisibility%3Aoff&amp;style=feature%3Aroad.highway%7Celement%3Ageometry.fill%7Ccolor%3A0xffbe32&amp;style=feature%3Aroad.highway%7Celement%3Ageometry.stroke%7Ccolor%3A0xffbe32&amp;style=feature%3Atransit%7Celement%3Alabels.text.fill%7Cvisibility%3Aon%7Ccolor%3A0x787c84&amp;style=feature%3Atransit.line%7Celement%3Ageometry.fill%7Ccolor%3A0xd2d4d6&amp;signature=3yCSyIXfsSilvB5wcd4OElw40QU=" style="-ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; display: block; width: 100%;"> </a>                                      </td>
													  </tr>
													</tbody></table>
												  </td>
												</tr>
											  </tbody></table>
											</td>
										  </tr>
										</tbody></table>
									  </td>
									</tr>
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<tr>
									  <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
										<!--[if gte mso 15]>&nbsp;<![endif]-->
									  </td>
									</tr>
									
									
									<!-- RECEIPT -->
									
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<!-- EDIT RECEIPT -->
									<!-- CANCELLATION POLICY -->
									<tr>
									  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="text text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; font-weight: 600; color: rgb(35, 35, 62);">
												Cancellation policy
											  </div>
											</td>
										  </tr>
										  <tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
												<span>This invitation can be accepted only if you have installed dstrict and Qloud ID pay. </span>
												<span>You can not transfer your invitation to another person.</span>
											  </div>
											</td>
										  </tr>
										</tbody></table>
									  </td>
									</tr>
									<tr class="spacer">
									  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<tr class="spacer">
									  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<!-- QUESTIONS -->
									<tr>
									  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="text text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; font-weight: 600; color: rgb(35, 35, 62);">
												Questions?
											  </div>
											</td>
										  </tr>
										  <tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
												If you have questions about your reservation, contact us at&nbsp;
												<a href="mailto:'.$rowInfo['fdesk_email'].'">'.$rowInfo["fdesk_email"].'</a>                            or by calling
												<a href="tel:+'.$rowInfo[" fdesk_country_code"].'="" '.$rowinfo["fdesk_phone_number"].'"="">+'.$rowInfo["fdesk_country_code"].' '.$rowInfo["fdesk_phone_number"].'</a>.
											  </div>
											</td>
										  </tr>
										</tbody></table>
									  </td>
									</tr>
								  </tbody></table>
								</td>
							  </tr>
							</tbody></table>
						  </td>
						</tr>
						<!-- FOOTER -->
						<tr>
						  <td align="center" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; width: 580px; margin: 0 auto;">
							<!-- Will most likely required a feature flag -->
							<!--[if (gte mso 9)|(IE)]>
					<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
					<tr>
					<td align="center" valign="top" width="600">
					<![endif]-->
							<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="Content-container" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
							  <tbody><tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr>
								<td align="center" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <a href="https://www.exploretock.com" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;"> <img src="https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png" width="30" height="30" alt="Tock" border="0" style="-ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; display: block;"> </a>              </td>
							  </tr>
							  <tr class="spacer">
								<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr>
								<td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
								  <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
									© 2019 Tock, Inc.
								  </div>
								  <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
									All Rights Reserved
								  </div>
								</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							</tbody></table>
							<!--[if (gte mso 9)|(IE)]>
					</td>
					</tr>
					</table>
					<![endif]-->
						  </td>
						</tr>
					  </tbody></table><title>Reservation confirmed</title>
					  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
					  <meta charset="utf-8">
					  <meta name="viewport" content="width=device-width, initial-scale=1">
					  <meta http-equiv="X-UA-Compatible" content="IE=edge">
					  <style type="text/css">
						/* GT AMERICA */

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Regular";
						  font-weight: 400;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.ttf") format("truetype");
						}

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Medium";
						  font-weight: 600;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.ttf") format("truetype");
						}

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Condensed Bold";
						  font-weight: 700;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.ttf") format("truetype");
						}

						/* CLIENT-SPECIFIC RESET */

						body,
						table,
						td,
						a {
						  -webkit-text-size-adjust: 100%;
						  -ms-text-size-adjust: 100%;
						}

						/* Prevent WebKit and Windows mobile changing default text sizes */

						table,
						td {
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						}

						/* Remove spacing between tables in Outlook 2007 and up */

						img {
						  -ms-interpolation-mode: bicubic;
						}

						/* Allow smoother rendering of resized image in Internet Explorer */

						.im {
						  color: inherit !important;
						}

						/* DEVICE-SPECIFIC RESET */

						a[x-apple-data-detectors] {
						  color: inherit !important;
						  text-decoration: none !important;
						  font-size: inherit !important;
						  font-family: inherit !important;
						  font-weight: inherit !important;
						  line-height: inherit !important;
						}

						/* iOS BLUE LINKS */

						/* RESET */

						img {
						  border: 0;
						  height: auto;
						  line-height: 100%;
						  outline: none;
						  text-decoration: none;
						  display: block;
						}

						table {
						  border-collapse: collapse;
						}

						table td {
						  border-collapse: collapse;
						  display: table-cell;
						}

						body {
						  height: 100% !important;
						  margin: 0 !important;
						  padding: 0 !important;
						  width: 100% !important;
						}

						/* BG COLORS */

						.mainTable {
						  background-color: #F0F0F0;
						}

						.mainTable--hospitality {
						  background-color: #f7f2ed;
						}

						html {
						  background-color: #F0F0F0;
						}

						/* VARIABLES */

						.bg-white {
						  background-color: white;
						}

						.hr {
						  /* Cross-client horizontal rule. Adapted from https://litmus.com/community/discussions/4633-is-there-a-reliable-1px-horizontal-rule-method */
						  background-color: #d3d3d8;
						  border-collapse: collapse;
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						  mso-line-height-rule: exactly;
						  line-height: 1px;
						}

						.textAlignLeft {
						  text-align: left !important;
						}

						.textAlignRight {
						  text-align: right !important;
						}

						.textAlignCenter {
						  text-align: center !important;
						}

						.mt1 {
						  margin-top: 6px;
						}

						.list {
						  padding-left: 18px;
						  margin: 0;
						}

						/* TYPOGRAPHY */

						body {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  color: #4f4f65;
						  -webkit-font-smoothing: antialiased;
						  -ms-text-size-adjust: 100%;
						  -moz-osx-font-smoothing: grayscale;
						  font-smoothing: always;
						  text-rendering: optimizeLegibility;
						}

						.h1 {
						  font-family: "GT America Condensed Bold", "Roboto Condensed", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 700;
						  vertical-align: middle;
						  font-size: 36px;
						  line-height: 42px;
						}

						.h2 {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 600;
						  vertical-align: middle;
						  font-size: 16px;
						  line-height: 24px;
						}

						.text {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 16px;
						  line-height: 21px;
						}

						.text-list {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 16px;
						  line-height: 25px;
						}

						.textSmall {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 14px;
						}

						.text-xsmall {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-size: 11px;
						  text-transform: uppercase;
						  line-height: 22px;
						  letter-spacing: 1px;
						}

						.text-bold {
						  font-weight: 600;
						}

						.text-link {
						  text-decoration: underline;
						}

						.text-linkNoUnderline {
						  text-decoration: none;
						}

						.text-strike {
						  text-decoration: line-through;
						}

						/* FONT COLORS */

						.textColorDark {
						  color: #23233e;
						}

						.textColorNormal {
						  color: #4f4f65;
						}

						.textColorBlue {
						  color: #2020c0;
						}

						.textColorGrayDark {
						  color: #7B7B8B;
						}

						.textColorGray {
						  color: #A5A8AD;
						}

						.textColorWhite {
						  color: #FFFFFF;
						}

						.textColorRed {
						  color: #df3232;
						}

						/* BUTTON */

						.Button-primary-wrapper {
						  border-radius: 3px;
						  background-color: #2020C0;
						}

						.Button-primary {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  border-radius: 3px;
						  border: 1px solid #2020C0;
						  color: #ffffff;
						  display: block;
						  font-size: 16px;
						  font-weight: 600;
						  padding: 18px;
						  text-decoration: none;
						}

						.Button-secondary-wrapper {
						  border-radius: 3px;
						  background-color: #ffffff;
						}

						.Button-secondary {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  border-radius: 3px;
						  border: 1px solid #2020C0;
						  color: #2020C0;
						  display: block;
						  font-size: 16px;
						  font-weight: 600;
						  padding: 18px;
						  text-decoration: none;
						}

						/* LAYOUT */

						.Content-container {
						  padding-left: 60px;
						  padding-right: 60px;
						}

						.Content-container--main {
						  padding-top: 54px;
						  padding-bottom: 60px;
						}

						.Content {
						  width: 580px;
						  margin: 0 auto;
						}

						.wrapper {
						  max-width: 600px;
						}

						.section {
						  padding: 24px 0px;
						  border-bottom: 1px solid #d3d3d8;
						}

						.section--noBorder {
						  padding: 24px 0px 0;
						}

						.section--last {
						  padding: 24px 0px;
						}

						.message {
						  background-color: #F4F4F5;
						  padding: 18px;
						}

						.card {
						  border: 1px solid #d3d3d8;
						  padding: 18px;
						}

						/* HEADER */

						.header-tockLogoImage {
						  display: block;
						  color: #F0F0F0;
						}

						.header-heroImage {
						  padding-bottom: 24px;
						}

						/* PREHEADER */

						.preheader {
						  display: none;
						  font-size: 1px;
						  color: #FFFFFF;
						  line-height: 1px;
						  max-height: 0px;
						  max-width: 0px;
						  opacity: 0;
						  overflow: hidden;
						}

						/* BANNER */

						.notice {
						  padding: 12px;
						  background: #23233E;
						  color: #FFFFFF;
						  display: block;
						  font-size: 14px;
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 600;
						}

						/* INTRO */

						.section--intro {
						  padding-bottom: 48px;
						}

						/* BOOKING INFO */

						.business-logo__container {
						  width: 48px;
						  height: 48px;
						  border-radius: 3px;
						  border: 1px solid #d3d3d8;
						  overflow: hidden;
						}

						.business-logo__image {
						  border: 1px solid transparent;
						  border-radius: 3px;
						  width: 48px;
						  height: 48px;
						  display: block;
						}

						.business-address--address {
						  width: 50%;
						}

						.business-address--map {
						  width: 50%;
						}

						.business-address--map-image {
						  width: 100%;
						}

						/* MOBILE TICKETS */

						.mobile-ticket--description {
						  width: 65%;
						  margin-top: 12px;
						  margin-right: 5%;
						}

						.mobile-ticket--code {
						  width: 30%;
						}

						.mobile-ticket--code-image {
						  width: 100%;
						}

						/* RESERVATION ACTIONS */

						.linksTable {
						  border-bottom: 1px solid #d3d3d8;
						}

						.linksTableRow {
						  padding: 24px 12px;
						}

						.actions-icon {
						  vertical-align: middle;
						}

						.actions-text {
						  vertical-align: middle;
						}

						/* RECEIPT */

						.receipt__container {
						  border: 1px solid #d3d3d8;
						  padding: 24px;
						}

						.receipt__row {
						  border-top: 1px solid #d3d3d8;
						}

						/* FEEDBACK ICONS */

						.feedback-link {
						  border: 1px solid #d4d5da;
						  border-radius: 3px;
						  display: inline-block;
						  width: calc(32% - 2px);
						  padding: 10px 0;
						}

						.feedback-link-bumper {
						  display: inline-block;
						  width: 1%;
						}

						.feedback-link img {
						  height: 50px;
						  width: 50px;
						}

						/* SOCIAL ICONS */

						.social-link {
						  display: inline-block;
						  width: auto;
						}

						.social-link-text {
						  padding: 14px 24px 14px 14px;
						}

						/* TABLET STYLES */

						@media screen and (max-width: 648px) {
						  /* DEVICE-SPECIFIC RESET */
						  div[style*="margin: 16px 0;"] {
							margin: 0 !important;
						  }
						  /* ANDROID CENTER FIX */
						  /* LAYOUT */
						  .wrapper {
							width: 100% !important;
							max-width: 100% !important;
						  }
						  .Content {
							width: 90% !important;
						  }
						  .Content-container {
							padding-left: 36px !important;
							padding-right: 36px !important;
						  }
						  .Content-container--main {
							padding-top: 30px !important;
							padding-bottom: 42px !important;
						  }
						  .responsiveTable {
							width: 100% !important;
						  }
						  /* RESERVATION ACTIONS */
						  .linksTableRow {
							padding-left: 0 !important;
							padding-right: 0 !important;
							padding-top: 12px !important;
							padding-bottom: 12px !important;
						  }
						  .linksTableRow--borderRight {
							border-right: none !important;
							padding-left: 0 !important;
							padding-right: 0 !important;
						  }
						  /* FEEDBACK LINK */
						  .feedback-link img {
							height: 38px !important;
							width: 38px !important;
						  }
						}

						/* MOBILE STYLES */

						@media screen and (max-width: 480px) {
						  /* TYPOGRAPHY */
						  .h1 {
							font-size: 30px !important;
							line-height: 30px !important;
						  }
						  .text {
							font-size: 16px !important;
							line-height: 22px !important;
						  }
						  /* BUTTON */
						  .mobile-buttonContainer {
							width: 100% !important;
						  }
						  /* LAYOUT */
						  .Content {
							width: 100% !important;
						  }
						  .Content-container {
							padding-left: 18px !important;
							padding-right: 18px !important;
						  }
						  .Content-container--main {
							padding-top: 24px !important;
							padding-bottom: 30px !important;
						  }
						  .section {
							padding: 18px 0 !important;
						  }
						  .section--last {
							padding: 18px 0 !important;
						  }
						  .header {
							padding: 0 18px !important;
						  }
						  .business-address--address {
							width: 100% !important;
						  }
						  .business-address--map {
							margin-top: 30px !important;
							width: 100% !important;
						  }
						  .mobile-ticket--description {
							width: 100% !important;
							margin-top: 0px !important;
						  }
						  .mobile-ticket--code {
							margin-top: 30px !important;
							margin-left: 0;
							width: 100% !important;
						  }
						  /* RECEIPT */
						  .receipt__container {
							padding: 12px !important;
						  }
						  /* SOCIAL ICONS */
						  .social-link {
							display: block !important;
							width: 100% !important;
							border-bottom: 1px solid #d3d3d8 !important;
						  }
						  /* INTRO */
						  .section--intro {
							padding-top: 18px !important;
							padding-bottom: 18px !important;
						  }
						}
					  </style>



					   
					  <!--[if mso]>
						<style type="text/css">
					.h1 {font-family: "Helvetica", "Arial", sans-serif !important; font-weight: 700 !important; vertical-align: middle !important; font-size: 36px !important; mso-line-height-rule: exactly;line-height: 42px !important;}
					.h2 {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 600 !important;vertical-align: middle !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 24px !important;}
					.text {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 21px !important;}
					.text-list {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 25px !important;}
					.textSmall {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 14px !important;}
					.text-xsmall {font-family: "Helvetica", "Arial", sans-serif !important;font-size: 11px !important;text-transform: uppercase !important;mso-line-height-rule: exactly;line-height: 22px !important;letter-spacing: 1px !important;}
					.text-bold {font-weight: 600 !important;}
					.text-link {text-decoration: underline !important;}
					.text-linkNoUnderline {text-decoration: none !important;}
					.text-strike {text-decoration: line-through !important;}
					.textColorDark {color: #23233e !important;}
					.textColorNormal {color: #4f4f65 !important;}
					.textColorBlue {color: #2020c0 !important;}
					.textColorGray {color: #A5A8AD !important;}
					.textColorWhite {color: #FFFFFF !important;}
					.Button-primary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #ffffff !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
					.Button-secondary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #2020C0 !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
						</style>
						<![endif]-->
					  <!-- HIDDEN PREHEADER TEXT -->
					  <div class="preheader" style="display: none; font-size: 1px; color: rgb(255, 255, 255); line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
					  </div>
					  



					</body></html>';
				try {
					 sendEmail($subject, $to, $emailContent);
					}

					 
					catch(Exception $e) {
					   
					}
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function dependentsCheckedInList($data)
		{
			 $dbCon = AppModel::createConnection();
			$checkout_id= $this -> encrypt_decrypt('decrypt',$data['booking_id']);
			$stmt = $dbCon->prepare("delete from hotel_checkout_dependent_detail where hotel_checkout_id=? and is_verified=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $checkout_id);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name  from dependents where id in (select dependent_id from hotel_checkout_dependent_detail where hotel_checkout_id=?) and dependent_type=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $checkout_id);
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
		
		function dependentsList($data)
		{
			$dbCon = AppModel::createConnection();
			$checkout_id= $this -> encrypt_decrypt('decrypt',$data['booking_id']);
			$stmt = $dbCon->prepare("delete from hotel_checkout_dependent_detail where hotel_checkout_id=? and is_verified=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $checkout_id);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name  from dependents where id not in (select dependent_id from hotel_checkout_dependent_detail where hotel_checkout_id=?) and dependent_type=1 and created_by=(select user_id from hotel_checkout_detail where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $checkout_id,$checkout_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function adultsCheckedInList($data)
		{
			$dbCon = AppModel::createConnection();
			$checkout_id= $this -> encrypt_decrypt('decrypt',$data['booking_id']);
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name from user_logins where id=(select user_id from hotel_checkout_detail where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $checkout_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$row = $result->fetch_assoc();
			$row['is_confirmed']=1;
			$row['is_user']=1; 	 
			array_push($org,$row);
			
			$stmt = $dbCon->prepare("select hotel_checkout_invitation_info.id,concat_ws(' ',first_name,last_name) as name,is_confirmed,invitation_type,hotel_checkout_invitation_info.email,country_code,phone_number,pre_checked  from hotel_checkout_invitation_info left join user_logins on user_logins.id=hotel_checkout_invitation_info.invited_user_id where hotel_checkout_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $checkout_id);
			$stmt->execute();
			$result = $stmt->get_result();
			 $j=1;
			while($row = $result->fetch_assoc())
			{
				$row['is_user']=0; 
			 if($row['is_confirmed']==1)
			 {
				$row['name']=$row['name'];	 
			 }
			 else
			 {
				if($row['invitation_type']==1)
				 {
					$row['name']='+'.$row['country_code'].'-'.$row['phone_number'];	
				 }	
				 else
				 {
					 $row['name']=$row['email'];	  
				 }
			 }
			 
			 $org[$j]['is_confirmed']=$row['is_confirmed'];
			 $org[$j]['name']=$row['name'];
			 $org[$j]['id']=$row['id'];
			$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}

		
		function updateRoomInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$booking_id= $this -> encrypt_decrypt('decrypt',$data['booking_id']);
			$room_id= $this -> encrypt_decrypt('decrypt',$data['room_id']);
			$stmt = $dbCon->prepare("update hotel_checkout_detail set room_id=? where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $room_id,$booking_id);
			$stmt->execute();
			  
			$curl = curl_init();
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => 'https://dstricts.com/user/index.php/DstrictsApp/updateRoomInfo',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS => array('checkid' => $booking_id,'room_id' => $room_id),
			));
			$response = curl_exec($curl);
			curl_close($curl);
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function updateCheckinInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$booking_id= $this -> encrypt_decrypt('decrypt',$data['booking_id']);
			
			$stmt = $dbCon->prepare("update hotel_checkout_detail set checked_in=1 where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",$booking_id);
			$stmt->execute();
			  
			$curl = curl_init();
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => 'https://dstricts.com/user/index.php/DstrictsApp/updateCheckinInfo',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS => array('checkid' => $booking_id),
			));
			$response = curl_exec($curl);
			curl_close($curl);
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function bookingDetailForRoomAllocation($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$today=strtotime(date('Y-m-d'));
			$stmt = $dbCon->prepare("select hotel_checkout_detail.id,room_type_id,checkout_booking_date,checkin_booking_date,checkin_date,checkout_date,guest_adult,guest_children,room_name,hotel_room_type.room_type,hotel_checkout_detail.property_id,first_name,last_name from hotel_checkout_detail left join hotel_room_detail on hotel_room_detail.id=hotel_checkout_detail.room_id left join company_hotel_room_type_detail on company_hotel_room_type_detail.id=hotel_checkout_detail.room_type_id left join hotel_room_type on hotel_room_type.id=company_hotel_room_type_detail.room_type left join user_logins on user_logins.id=hotel_checkout_detail.user_id where hotel_checkout_detail.checked_in=0 and hotel_checkout_detail.property_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				if($today==$rowAvailable['checkin_booking_date'])
				{
					$rowAvailable['is_today']=1;
				}
				else
				{
					$rowAvailable['is_today']=0;
				}
				array_push($org,$rowAvailable);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function bookingDetailInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$booking_id= $this -> encrypt_decrypt('decrypt',$data['booking_id']);
			$today=strtotime(date('Y-m-d'));
			$stmt = $dbCon->prepare("select hotel_checkout_detail.room_id,hotel_checkout_detail.id,room_type_id,checkout_booking_date,checkin_booking_date,checkin_date,checkout_date,guest_adult,guest_children,room_name,hotel_room_type.room_type,hotel_checkout_detail.property_id,first_name,last_name,is_approved_cleaning,checked_in from hotel_checkout_detail left join hotel_room_detail on hotel_room_detail.id=hotel_checkout_detail.room_id left join company_hotel_room_type_detail on company_hotel_room_type_detail.id=hotel_checkout_detail.room_type_id left join hotel_room_type on hotel_room_type.id=company_hotel_room_type_detail.room_type left join user_logins on user_logins.id=hotel_checkout_detail.user_id where hotel_checkout_detail.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $booking_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
		//print_r($rowAvailable); die;
			$stmt->close();
			$dbCon->close();
			return $rowAvailable;
			
			
		}
		
		function availableRoomsDetailToday($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$today=strtotime(date('Y-m-d'));
			$id= $this -> encrypt_decrypt('decrypt',$data['booking_id']);
			$stmt = $dbCon->prepare("select hotel_checkout_detail.id,room_type_id,checkout_booking_date,checkin_booking_date,checkin_date,checkout_date,guest_adult,guest_children,room_name,hotel_room_type.room_type,hotel_checkout_detail.property_id,first_name,last_name from hotel_checkout_detail left join hotel_room_detail on hotel_room_detail.id=hotel_checkout_detail.room_id left join company_hotel_room_type_detail on company_hotel_room_type_detail.id=hotel_checkout_detail.room_type_id left join hotel_room_type on hotel_room_type.id=company_hotel_room_type_detail.room_type left join user_logins on user_logins.id=hotel_checkout_detail.user_id where hotel_checkout_detail.checked_in=0 and hotel_checkout_detail.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowBooking = $result->fetch_assoc();
			 //print_r($rowBooking); die;
			 
			$stmt = $dbCon->prepare("select hotel_room_detail.id,room_name,hotel_room_type.room_type,room_available,is_approved_cleaning from hotel_room_detail left join company_hotel_room_type_detail on company_hotel_room_type_detail.id=hotel_room_detail.room_type  left join hotel_room_type on hotel_room_type.id=company_hotel_room_type_detail.room_type  where property_id=? and hotel_room_detail.room_type=? and room_available=1 and hotel_room_detail.id not in (select room_id from hotel_checkout_detail where property_id=? and room_type_id=? and checked_in<=1  and room_id is not null)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiii", $location_id,$rowBooking['room_type_id'], $location_id,$rowBooking['room_type_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			$org=array();
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				array_push($org,$rowAvailable);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function availableRoomsForAllocationDetailToday($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$today=strtotime(date('Y-m-d'));
			$id= $this -> encrypt_decrypt('decrypt',$data['booking_id']);
			$stmt = $dbCon->prepare("select hotel_checkout_detail.id,room_type_id,checkout_booking_date,checkin_booking_date,checkin_date,checkout_date,guest_adult,guest_children,room_name,hotel_room_type.room_type,hotel_checkout_detail.property_id,first_name,last_name from hotel_checkout_detail left join hotel_room_detail on hotel_room_detail.id=hotel_checkout_detail.room_id left join company_hotel_room_type_detail on company_hotel_room_type_detail.id=hotel_checkout_detail.room_type_id left join hotel_room_type on hotel_room_type.id=company_hotel_room_type_detail.room_type left join user_logins on user_logins.id=hotel_checkout_detail.user_id where hotel_checkout_detail.checked_in=0 and hotel_checkout_detail.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowBooking = $result->fetch_assoc();
			 
			 
			$stmt = $dbCon->prepare("select hotel_room_detail.id,room_name,hotel_room_type.room_type,room_available from hotel_room_detail left join company_hotel_room_type_detail on company_hotel_room_type_detail.id=hotel_room_detail.room_type  left join hotel_room_type on hotel_room_type.id=company_hotel_room_type_detail.room_type  where property_id=? and hotel_room_detail.room_type=? and room_available=1 and hotel_room_detail.id in (select room_id from hotel_checkout_detail where property_id=? and room_type_id=? and checked_in=1 and checkout_booking_date<=?) and hotel_room_detail.id not in (select room_id from hotel_checkout_detail where property_id=? and room_type_id=? and checked_in<1)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiiisii", $location_id,$rowBooking['room_type_id'], $location_id,$rowBooking['room_type_id'],$today, $location_id,$rowBooking['room_type_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			$org=array();
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				array_push($org,$rowAvailable);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		 function completeMenu($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
			}
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select distinct serve_type from resturant_available_dishes where resturant_id=?");
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			
			$selected_dish=explode(',',$data['room_service']);
			while($row= $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['category']=array();
				$i=0;
				$stmt = $dbCon->prepare("select distinct category_food,food_category,place_of_display from resturant_available_dishes left join food_category on food_category.id=resturant_available_dishes.category_food where resturant_available_dishes.resturant_id=? and serve_type=? order by place_of_display");
				$stmt->bind_param("ii", $resturant_id,$row['serve_type']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				while($rowCategory = $result1->fetch_assoc())
				{
					array_push($org[$j]['category'],$rowCategory);
					$k=0;
					$org[$j]['category'][$i]['dishes']=array();
					$stmt = $dbCon->prepare("select resturant_available_dishes.id,dish_name,dish_detail,dish_image,dish_price from resturant_available_dishes left join dishes_detail_information on dishes_detail_information.id=resturant_available_dishes.dish_id where resturant_id=? and serve_type=? and category_food=?");
					$stmt->bind_param("iii", $resturant_id,$row['serve_type'],$rowCategory['category_food']);
					$stmt->execute();
					$result2 = $stmt->get_result();
					while($rowDishes = $result2->fetch_assoc())
					{
						 $filename="../estorecss/".$rowDishes ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowDishes ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowDishes ['dish_image'].'.jpg' );  $imgs='../../../../'.$imgs; } else { $value_a="../../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../../html/usercontent/images/default-profile-pic.jpg"; }
						array_push($org[$j]['category'][$i]['dishes'],$rowDishes);
						$org[$j]['category'][$i]['dishes'][$k]['enc']= $this -> encrypt_decrypt('encrypt',$rowDishes['id']);
						$org[$j]['category'][$i]['dishes'][$k]['dish_image']=$imgs;
						
						if (in_array($rowDishes['id'], $selected_dish))
						{
						$org[$j]['category'][$i]['dishes'][$k]['is_selected']= 1;
						}
						else
						{
						$org[$j]['category'][$i]['dishes'][$k]['is_selected']= 0;	
						}
						$k++;
					}
					$i++;
				}
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
	 
		
		function resturantinfo($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select dress_code,table_reservation,pets_allowed, form_of_payment, broadcast_type, broadcast_channel, resturant_name,resturant_type, resturant_information.property_id,visiting_address,resturant_information.id  from resturant_information left join property_location on property_location.id=resturant_information.property_id where resturant_information.id=?");
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			 
			return $rowAvailable;
			
			
		}
		function roomServiceInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select * from hotel_room_service where hotel_id=? and resturant_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $location_id,$resturant_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function wellnessappId()
		{
			
			return $this -> encrypt_decrypt('encrypt',42);
		}
		function wellnessDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$stmt = $dbCon->prepare("select is_inhouse,center_type,center_name,visiting_address,hotel_wellness_services.id  from hotel_wellness_services left join wellness_center_information on hotel_wellness_services.wellness_id=wellness_center_information.id left join property_location on property_location.id=wellness_center_information.property_id where hotel_wellness_services.hotel_property_id=? limit 0,5");
			$stmt->bind_param("i", $location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				array_push($org,$rowAvailable);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function confirmWellness($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("update hotel_wellness_services set is_inhouse=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			 }
			 
			 
		function updateInstaBoxes($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			
			$stmt = $dbCon->prepare("update hotel_basic_information set insta_boxes=?,insta_box_available=1 where property_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['insta_boxes'],$id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select id,insta_boxes from hotel_basic_information where property_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowHotel = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select count(id) as num from hotel_insta_boxes where hotel_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $rowHotel['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if($row['num']<$rowHotel['insta_boxes'])
			{
				$newBoxes=$rowHotel['insta_boxes']-$row['num'];
				for($i=1;$i<=$newBoxes;$i++)
				{
				$boxNumber=	$row['num']+$i;
				$stmt = $dbCon->prepare("insert into hotel_insta_boxes (hotel_id,box_number) values (?,?)");
				/* bind parameters for markers */
				$stmt->bind_param("ii", $rowHotel['id'],$boxNumber);
				$stmt->execute();	
				}
				
				$stmt = $dbCon->prepare("update hotel_insta_boxes set is_active=1  where hotel_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $rowHotel['id']);
				$stmt->execute();
			}
			else
			{
				$stmt = $dbCon->prepare("update hotel_insta_boxes set is_active=0  where hotel_id=? and box_number>?");
			
				/* bind parameters for markers */
				$stmt->bind_param("ii", $rowHotel['id'],$row['num']);
				$stmt->execute();
			}
			
			$stmt->close();
			$dbCon->close();
			return 1;
			 }	 
			 
		
		function updateRoomservice($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$hotel_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			if($_POST['broadcast_type']==0)
			{
				$room_service_menu='';
				$delivery_charge=0;
				$extra_charge=0;
			}
			else
			{
			$room_service_menu=$_POST['room_service_menu'];
			$delivery_charge=$_POST['delivery_charge'];
			$extra_charge=$_POST['extra_charge'];	
			}
			
			$stmt = $dbCon->prepare("update hotel_room_service set room_service_available=?, room_service_menu=?, delivery_charge=?, extra_charge=? where hotel_id=? and resturant_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("isiiii", $_POST['broadcast_type'],$room_service_menu,$delivery_charge,$extra_charge,$hotel_id,$id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			 }
		
		function wellnessCount($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$stmt = $dbCon->prepare("select count(id) as num from hotel_wellness_services where hotel_property_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $location_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
			function moreWellnessDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select is_inhouse,center_type,center_name,visiting_address,hotel_wellness_services.id  from hotel_wellness_services left join wellness_center_information on hotel_wellness_services.wellness_id=wellness_center_information.id left join property_location on property_location.id=wellness_center_information.property_id where hotel_wellness_services.hotel_property_id=? limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $location_id,$a,$b);
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
				 if($row['is_inhouse']==0) {  
											$ht='<a href="../../confirmWellness/'.$data['cid'].'/'.$data['lid'].'/'.$enc.'" class="xs-padr20" >  
													<div class="fright wi_25  padl30 xs-padl0 xs-wi_20  fsz40    padb0 xs-marrl0">
																				<button type="button" name="Confirm" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bgi" >In house</button>
																			</div> 
																			</a>';
																			$wi="wi_50";
																			 
													    } else { 
													$ht='<a href="#" >  <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 ">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div></a>';
													$wi="wi_75 xxs-wi_80"; 
													    }  
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.' bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 hidden-xs "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['center_name'],0,1).'</div>
																	</div>
													
													<div class="fleft '.$wi.'   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">'.$row['center_name'].' </span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">'.substr($row['visiting_address'],0,23).'</span>  </div>
													
													'.$ht.'
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>';
											$j++;
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		
		
		function restappId()
		{
			
			return $this -> encrypt_decrypt('encrypt',41);
		}
		function resturantDetail($data)
		{
			 
			
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$stmt = $dbCon->prepare("select is_inhouse,resturant_type,resturant_name,visiting_address,hotel_roomservice_resturant.id  from hotel_roomservice_resturant left join resturant_information on hotel_roomservice_resturant.resturant_id=resturant_information.id left join property_location on property_location.id=resturant_information.property_id where hotel_roomservice_resturant.hotel_property_id=? limit 0,5");
			$stmt->bind_param("i", $location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				array_push($org,$rowAvailable);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function resturantCount($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$stmt = $dbCon->prepare("select count(id) as num from hotel_roomservice_resturant where hotel_property_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $location_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
			function moreResturantDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select is_inhouse,resturant_type,resturant_name,visiting_address,hotel_roomservice_resturant.id  from hotel_roomservice_resturant left join resturant_information on hotel_roomservice_resturant.resturant_id=resturant_information.id left join property_location on property_location.id=resturant_information.property_id where hotel_roomservice_resturant.hotel_property_id=? limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $location_id,$a,$b);
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
				 if($row['is_inhouse']==0) {  
											$ht='<a href="../../confirmResturant/'.$data['cid'].'/'.$data['lid'].'/'.$enc.'" class="xs-padr20" >  
													<div class="fright wi_25  padl30 xs-padl0 xs-wi_20  fsz40    padb0 xs-marrl0">
																				<button type="button" name="Confirm" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bgi" >In house</button>
																			</div> 
																			</a>';
																			$wi="wi_50";
																			 
													    } else { 
													$ht='<a href="#" >  <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 ">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div></a>';
													$wi="wi_75 xxs-wi_80"; 
													    }  
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.' bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 hidden-xs "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['resturant_name'],0,1).'</div>
																	</div>
													
													<div class="fleft '.$wi.'   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">'.$row['resturant_name'].' </span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">'.substr($row['visiting_address'],0,23).'</span>  </div>
													
													'.$ht.'
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>';
											$j++;
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		 function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$country_id= $data['country_id'];
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=40");
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
		
		function hotelCheckInDetailInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$stmt = $dbCon->prepare("select *  from hotel_checkin_checkout_policy where property_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			 
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
		
		function hotelEmployees($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,concat_ws(' ', first_name,last_name) as name from employees where id in (select employee_id from employee_location where location_id=?) or  id=(select id from employees where company_id=? and user_login_id=43) ");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $location_id,$company_id);
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
		
		function hotelAmenities($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$stmt = $dbCon->prepare("select *  from hotel_available_amenities where property_id=?");
			$stmt->bind_param("i", $location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$arr=explode(',',$rowAvailable['available_amenities']);
			$stmt = $dbCon->prepare("select *  from hotel_amenities_category");
			$stmt->execute();
			$result1 = $stmt->get_result();
			$org=array();
			$j=0;
			while($row_category = $result1->fetch_assoc())
			{
			array_push($org,$row_category);
			$stmt = $dbCon->prepare("select *  from hotel_amenities where amenitites_category_id=?");
			$stmt->bind_param("i", $row_category['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org[$j]['category']=array();
			while($row = $result->fetch_assoc())
			{
				if(empty($rowAvailable))
				{
					$row['is_available']=0;
				}
				else
				{
					
					if(in_array($row['id'], $arr))
					{
					$row['is_available']=1;	
					}
					else
					{
						$row['is_available']=0;
					}
				}
				array_push($org[$j]['category'],$row);
				
			}
			$j++;
			}

			$stmt->close();
				$dbCon->close();
				return $org;
			
			
		}
		
		function hotelAmenitiesAvailable($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$stmt = $dbCon->prepare("select *  from hotel_available_amenities where property_id=?");
			$stmt->bind_param("i", $location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $rowAvailable;
			
			
		}
		
		function addTeam($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			 
			$_POST['emp_info']=substr($_POST['emp_info'],0,-1);
			$team_name=htmlentities($_POST['team_name'],ENT_NOQUOTES, 'ISO-8859-1');
			 
			 $stmt = $dbCon->prepare("insert into hotel_team_info(team_name,employee_info, property_id,created_on, modified_on)
			values(?, ?, ?,now(), now())");
			$stmt->bind_param("ssi",$team_name, $_POST['emp_info'] ,$location_id);
			 
			 
			if($stmt->execute())
			{
				$id=$stmt->insert_id;
				 
				 $stmt->close();
				$dbCon->close();
				return $this -> encrypt_decrypt('encrypt',$id);
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		
			
		}
		
		
		function checkUserQloudInfo()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select count(user_profiles.id) as num  from user_profiles left join user_logins on user_logins.id=user_profiles.user_logins_id where country_of_residence=? and phone_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is",$_POST['countryname'], $_POST['phoneno']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			if($row['num']==1)
			{
				 return 0;
			}
			else
			{
				 return 1;
			}
				 
			
			
		}
		
		function addCheckInInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			 
			if($_POST['late_checkout']==0)
			{
				$late_checkout_time="";
				$late_checkout_charge=0;
				$fixed_charge=0;
				$percent_charge=0;
			}
			else
			{
			$late_checkout_time=$_POST['late_checkout_time'];
			$late_checkout_charge=$_POST['late_checkout_charge'];
			if($late_checkout_charge==0)
			{
			$fixed_charge=0;
			$percent_charge=0;	
			}
			else if($late_checkout_charge==1)
			{
			$fixed_charge=$_POST['fixed_charge'];
			$percent_charge=0;	
			}
			else if($late_checkout_charge==2)
			{
			$fixed_charge=0;
			$percent_charge=$_POST['percent_charge'];
			}
			}
		 
			if($_POST['indexing_save']==0)
			{
			 $stmt = $dbCon->prepare("insert into hotel_checkin_checkout_policy(checkin_time,checkout_time,late_checkout_available ,   late_checkout_time, late_checkout_charge, fixed_charge, percent_charge, property_id,created_on, modified_on)
			values(?, ?, ?, ?, ?, ? ,?, ?,now(), now())");
			$stmt->bind_param("ssisiiii",$_POST['check_in'] , $_POST['check_out'],  $_POST['late_checkout'], $late_checkout_time, $late_checkout_charge, $fixed_charge, $percent_charge,   $location_id);
			}
			else
			{
			 $stmt = $dbCon->prepare("update hotel_checkin_checkout_policy set checkin_time=?,checkout_time=?,late_checkout_available=? ,   late_checkout_time=? , late_checkout_charge=? , fixed_charge=? , percent_charge=? , property_id=? , modified_on=now() where id=?
			 ");
			$stmt->bind_param("ssisiiiii",$_POST['check_in'] , $_POST['check_out'],  $_POST['late_checkout'], $late_checkout_time, $late_checkout_charge, $fixed_charge, $percent_charge,   $location_id,$_POST['indexing_save']);	
			}
			 
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
		
		function addAmenitiesDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$stmt = $dbCon->prepare("update hotel_basic_information set hotel_general_amenities=?  ,hotel_bathroom_amenities=? ,hotel_kitchen_amenities=? ,hotel_connectivity_amenities=?  where property_id=?
			 ");
			$stmt->bind_param("ssssi",$_POST['general_amenities'] ,$_POST['bathroom_amenities'] ,$_POST['kitchen_amenities'] ,$_POST['connectivity_amenities'] ,$location_id);	
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
		function paymentType()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from payment_type");
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
		function addHotelDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			
			$hname=htmlentities($_POST['h_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$brand=htmlentities($_POST['brand'],ENT_NOQUOTES, 'ISO-8859-1');
			$chain=htmlentities($_POST['chain'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into hotel_basic_information(booking_checkin_type,dry_cleaning,hotel_name, hotel_category, hotel_type, hotel_stars, superior_classification, hotel_brand, hotel_chain, fdesk_country_code, fdesk_phone_number, fdesk_fax, fdesk_fax_country_code, fdesk_email, web_type, website, rdept_country_code, rdept_phone_number, rdept_fax_country_code, rdept_fax_number, rdept_email, facebook_type, facebook_address, twitter_type, twitter_address, property_id,created_on, long_term_stay , motel_type_room, concierge_available, porter_bellhop, doorman, green_hotel, adult_only, pet_allowed, dayrooms_available, nonsmoking_hotel, hotel_description, total_rooms, total_nonsmoking_rooms,  total_room_whilechair, total_floors, total_elevators, year_built, renovation_year, partial_renovation_year, mice_facilities, large_room, meeting_room, small_room, facilities_for_wedding_receptions, banquet_hall, room_service, breakfast, airport_code, currency_used, accepted_payments, room_type_available, accepted_currency, nearest_airports, languages_known, loyalty_cards,room_service_opening,room_service_closing,delivery_fee,payment_option)
			values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,now(),?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("iisisiissississsisissssssiiiiiiiiiiisiiiiiiiiiiiiiiiisissssssssii",$_POST['booking_type'],$_POST['dry_cleaning'] ,$hname,$_POST['h_category'] , $_POST['hotel_type'],  $_POST['hotel_stars'],  $_POST['superior_classification'], $brand, $chain, $_POST['country_phone'],$_POST['front_desk_phone'], $_POST['country_fax'],$_POST['front_desk_fax'],$_POST['front_desk_email'],$_POST['webType'],$_POST['h_website'],$_POST['country_phoner'],$_POST['reservation_dept_phone'],$_POST['country_faxr'],$_POST['reservation_dept_fax'],$_POST['reservation_dept_email'],$_POST['facebookType'],$_POST['facebook'],$_POST['twitterType'],$_POST['twitter'],$location_id,$_POST['long_term_stay'], $_POST['motel_type_room'], $_POST['concierge_available'], $_POST['porter_bellhop'], $_POST['doorman'], $_POST['green_hotel'], $_POST['adult_only'], $_POST['pet_allowed'], $_POST['dayrooms_available'], $_POST['nonsmoking_hotel'], $_POST['hotel_description'], $_POST['total_rooms'], $_POST['total_nonsmoking_rooms'],  $_POST['total_room_whilechair'], $_POST['total_floors'], $_POST['total_elevators'], $_POST['year_built'], $_POST['renovation_year'], $_POST['partial_renovation_year'], $_POST['mice_facilities'], $_POST['large_room'], $_POST['meeting_room'], $_POST['small_room'], $_POST['facilities_for_wedding_receptions'], $_POST['banquet_hall'], $_POST['room_service'], $_POST['breakfast'], $_POST['airport_code'], $_POST['currency_used'], $_POST['accepted_payments'], $_POST['room_type_available'], $_POST['ind2'], $_POST['ind'], $_POST['ind1'], $_POST['ind3'],$_POST['room_service_opening'],$_POST['room_service_closing'],$_POST['delivery_fee'],$_POST['payment_option']);
			
			 
			 
			if($stmt->execute())
			{
				 for($i=1; $i<=$_POST['indexing_save']; $i++)
				{
					$j='image_data'.$i;
					$data1 = strip_tags($_POST[$j]);
					 
					define('UPLOAD_DIR','../estorecss/'); 
					$img_name1="new".microtime();
					file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
					$stmt = $dbCon->prepare("insert into hotel_images (property_id, image_path, created_on) values (?,?,now())");
					$stmt->bind_param("is",$location_id,$img_name1);
					 $stmt->execute(); 
				} 
				$stmt = $dbCon->prepare("update property_location set is_hotel=1 where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $location_id);
				$stmt->execute();
				
				
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
		
		function updateHotelDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			
			$hname=htmlentities($_POST['h_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$brand=htmlentities($_POST['brand'],ENT_NOQUOTES, 'ISO-8859-1');
			$chain=htmlentities($_POST['chain'],ENT_NOQUOTES, 'ISO-8859-1');
			$_POST['hotel_description']=htmlentities($_POST['hotel_description'],ENT_NOQUOTES, 'UTF-8'); 
			
			//print_r($_POST['hotel_description']); die;
			$stmt = $dbCon->prepare("update  hotel_basic_information set booking_checkin_type=?,dry_cleaning=?,hotel_name=?, hotel_category=?, hotel_type=?, hotel_stars=?, superior_classification=?, hotel_brand=?, hotel_chain=?, fdesk_country_code=?, fdesk_phone_number=?, fdesk_fax=?, fdesk_fax_country_code=?, fdesk_email=?, web_type=?, website=?, rdept_country_code=?, rdept_phone_number=?, rdept_fax_country_code=?, rdept_fax_number=?, rdept_email=?, facebook_type=?, facebook_address=?, twitter_type=?, twitter_address=?, property_id=?, long_term_stay =?, motel_type_room=?, concierge_available=?, porter_bellhop=?, doorman=?, green_hotel=?, adult_only=?, pet_allowed=?, dayrooms_available=?, nonsmoking_hotel=?, hotel_description=?, total_rooms=?, total_nonsmoking_rooms=?,  total_room_whilechair=?, total_floors=?, total_elevators=?, year_built=?, renovation_year=?, partial_renovation_year=?, mice_facilities=?, large_room=?, meeting_room=?, small_room=?, facilities_for_wedding_receptions=?, banquet_hall=?, room_service=?, breakfast=?, airport_code=?, currency_used=?, accepted_payments=?, room_type_available=?, accepted_currency=?, nearest_airports=?, languages_known=?, loyalty_cards=?,room_service_opening=?,room_service_closing=?,delivery_fee=?,payment_option=? where property_id=?");
			$stmt->bind_param("iisisiissississsisissssssiiiiiiiiiiisiiiiiiiiiiiiiiiisissssssssiii",$_POST['booking_type'],$_POST['dry_cleaning'] ,$hname,$_POST['h_category'] , $_POST['hotel_type'],  $_POST['hotel_stars'],  $_POST['superior_classification'], $brand, $chain, $_POST['country_phone'],$_POST['front_desk_phone'], $_POST['country_fax'],$_POST['front_desk_fax'],$_POST['front_desk_email'],$_POST['webType'],$_POST['h_website'],$_POST['country_phoner'],$_POST['reservation_dept_phone'],$_POST['country_faxr'],$_POST['reservation_dept_fax'],$_POST['reservation_dept_email'],$_POST['facebookType'],$_POST['facebook'],$_POST['twitterType'],$_POST['twitter'],$location_id,$_POST['long_term_stay'], $_POST['motel_type_room'], $_POST['concierge_available'], $_POST['porter_bellhop'], $_POST['doorman'], $_POST['green_hotel'], $_POST['adult_only'], $_POST['pet_allowed'], $_POST['dayrooms_available'], $_POST['nonsmoking_hotel'], $_POST['hotel_description'], $_POST['total_rooms'], $_POST['total_nonsmoking_rooms'],  $_POST['total_room_whilechair'], $_POST['total_floors'], $_POST['total_elevators'], $_POST['year_built'], $_POST['renovation_year'], $_POST['partial_renovation_year'], $_POST['mice_facilities'], $_POST['large_room'], $_POST['meeting_room'], $_POST['small_room'], $_POST['facilities_for_wedding_receptions'], $_POST['banquet_hall'], $_POST['room_service'], $_POST['breakfast'], $_POST['airport_code'], $_POST['currency_used'], $_POST['accepted_payments'], $_POST['room_type_available'], $_POST['ind2'], $_POST['ind'], $_POST['ind1'], $_POST['ind3'],$_POST['room_service_opening'],$_POST['room_service_closing'],$_POST['delivery_fee'],$_POST['payment_option'],$location_id);
			
			 
			 
			if($stmt->execute())
			{
				for($i=1; $i<=$_POST['indexing_save']; $i++)
				{
					$j='image_data'.$i;
					$data1 = strip_tags($_POST[$j]);
					 
					define('UPLOAD_DIR','../estorecss/'); 
					$img_name1="new".microtime();
					file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
					$stmt = $dbCon->prepare("insert into hotel_images (property_id, image_path) values (?,?)");
					$stmt->bind_param("is",$location_id,$img_name1);
					 $stmt->execute(); 
				} 
				$stmt = $dbCon->prepare("update property_location set is_hotel=1 where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $location_id);
				$stmt->execute();
				 
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
		
		function hotelInfo($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']); 
			$stmt = $dbCon->prepare("select * from hotel_basic_information where property_id=?");
			$stmt->bind_param("i",$location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		function paymentTypeSelected($data)
		{
			$dbCon = AppModel::createConnection();
			$p_warning=explode(',',$data['payment_info']);
			 
			$stmt = $dbCon->prepare("select * from payment_type");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $p_warning))
				{
				$org[$j]['is_selected']= 1;
				}
				else
				{
				$org[$j]['is_selected']= 0;	
				}
				$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function hotelType($data)
		{
			$dbCon = AppModel::createConnection();
			$p_warning=explode(',',$data['hotel_type']);
			$stmt = $dbCon->prepare("select * from hotel_type");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $p_warning))
				{
				$org[$j]['is_selected']= 1;
				}
				else
				{
				$org[$j]['is_selected']= 0;	
				}
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function hotelCategory()
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select * from hotel_category");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function hotelRoomType($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select * from hotel_room_type");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				 
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function availableHotelRoomType($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);  
			$stmt = $dbCon->prepare("select * from hotel_room_type where id not in(select room_type from company_hotel_room_type_detail where location_id=?)");
			$stmt->bind_param("i",$location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				 
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function hotelRoomTypeSelected($data)
		{
			$dbCon = AppModel::createConnection();
			$p_warning=explode(',',$data['room_info']);
			$stmt = $dbCon->prepare("select * from hotel_room_type");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $p_warning))
				{
				$org[$j]['is_selected']= 1;
				}
				else
				{
				$org[$j]['is_selected']= 0;	
				}
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function hotelAvailable($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']); 
			$stmt = $dbCon->prepare("select count(id) as num from hotel_basic_information where property_id=?");
			$stmt->bind_param("i",$location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row['num'];
			
			
		}
		
		
		function hotelImagesCount($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']); 
			$stmt = $dbCon->prepare("select count(id) as num from hotel_images where property_id=?");
			$stmt->bind_param("i",$location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row['num'];
			
			
		}
		
		function hotelImages($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']); 
			$stmt = $dbCon->prepare("select * from hotel_images where property_id=?");
			$stmt->bind_param("i",$location_id);
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
		
		function confirmResturant($data)
		{
			$dbCon = AppModel::createConnection();
			$hotel_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("update hotel_roomservice_resturant set is_inhouse=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("insert into hotel_room_service(hotel_id, resturant_id ,created_on, modified_on)
			values(?,?,now(),now())");
			$stmt->bind_param("ii",$hotel_id,$id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			 }
		
		function addRoomDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("select number_of_rooms from company_hotel_room_type_detail where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$rname=htmlentities($_POST['room_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$custom_name=htmlentities($_POST['custom_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$hierarchy=htmlentities($_POST['hierarchy'],ENT_NOQUOTES, 'ISO-8859-1');
			$room_view=htmlentities($_POST['room_view'],ENT_NOQUOTES, 'ISO-8859-1');
			$description=htmlentities($_POST['description'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into hotel_room_detail(room_name, room_type, room_class, custom_name,  hierarchy, room_size, room_size_unit, room_view, description, bedding_type, extra_bed, property_id,created_on,room_price_info,room_bathroom_amenities,room_general_amenities,room_kitchen_amenities,room_connectivity_amenities,room_available)
			values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,now(),?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("siississssiiissssi",$rname,$id ,$_POST['room_class'] ,$custom_name ,$hierarchy ,$_POST['room_size'] ,$_POST['size_unit'] ,$room_view ,$description ,$_POST['bedding_type'] ,$_POST['extra_bed'] ,$location_id,$_POST['room_price'],$_POST['bathroom_amenities'],$_POST['general_amenities'],$_POST['kitchen_amenities'],$_POST['connectivity_amenities'],$_POST['is_available']);
			
			 
			if($stmt->execute())
			{
				$id=$stmt->insert_id;
				for($i=1; $i<=$_POST['indexing_save']; $i++)
				{
					$j='image_data'.$i;
					$data1 = strip_tags($_POST[$j]);
					 
					define('UPLOAD_DIR','../estorecss/'); 
					$img_name1="new".microtime();
					file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
					$stmt = $dbCon->prepare("insert into hotel_room_images (room_id, room_image_path, created_on) values (?,?,now())");
					$stmt->bind_param("is",$id,$img_name1);
					 $stmt->execute(); 
				}
				$total=$row['number_of_rooms']+1;
				$stmt = $dbCon->prepare("update company_hotel_room_type_detail set number_of_rooms=? where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ii", $total,$id);
				$stmt->execute();
				$stmt = $dbCon->prepare("update property_location set is_hotel=1 where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("i", $location_id);
				$stmt->execute();
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
		
		function updateRoomDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$rid= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$rname=htmlentities($_POST['room_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$custom_name=htmlentities($_POST['custom_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$hierarchy=htmlentities($_POST['hierarchy'],ENT_NOQUOTES, 'ISO-8859-1');
			$room_view=htmlentities($_POST['room_view'],ENT_NOQUOTES, 'ISO-8859-1');
			$description=htmlentities($_POST['description'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("update hotel_room_detail set room_name=?, room_type=?, room_class=?, custom_name=?,  hierarchy=?, room_size=?, room_size_unit=?, room_view=?, description=?, bedding_type=?, extra_bed=?, property_id=?,room_price_info=?,room_bathroom_amenities=?,room_general_amenities=?,room_kitchen_amenities=?,room_connectivity_amenities=?,room_available=? where id=?");
			$stmt->bind_param("siississssiiissssii",$rname,$id ,$_POST['room_class'] ,$custom_name ,$hierarchy ,$_POST['room_size'] ,$_POST['size_unit'] ,$room_view ,$description ,$_POST['bedding_type'] ,$_POST['extra_bed'] ,$location_id,$_POST['room_price'],$_POST['bathroom_amenities'],$_POST['general_amenities'],$_POST['kitchen_amenities'],$_POST['connectivity_amenities'],$_POST['is_available'],$rid);
			
			 
			if($stmt->execute())
			{
				 
				for($i=1; $i<=$_POST['indexing_save']; $i++)
				{
					$j='image_data'.$i;
					$data1 = strip_tags($_POST[$j]);
					 
					define('UPLOAD_DIR','../estorecss/'); 
					$img_name1="new".microtime();
					file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
					$stmt = $dbCon->prepare("insert into hotel_room_images (room_id, room_image_path, created_on) values (?,?,now())");
					$stmt->bind_param("is",$rid,$img_name1);
					 $stmt->execute(); 
				}
				 
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
		
		
		function addRoomTypeDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			 
			$rname=htmlentities($_POST['room_name'],ENT_NOQUOTES, 'ISO-8859-1');
			 
			$hierarchy=htmlentities($_POST['hierarchy'],ENT_NOQUOTES, 'ISO-8859-1');
			 
			$stmt = $dbCon->prepare("insert into company_hotel_room_type_detail(room_type_name, room_type, room_class, hierarchy, room_size, size_unit,room_price,number_of_rooms,general_amenities_available,bathroom_amenities_available,kitchen_amenities_available,connectivity_amenities_available,location_id,company_id,created_on,is_available)
			values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, now(),?)");
			$stmt->bind_param("iiisisiissssiii",$rname,$_POST['room_type'] ,$_POST['room_class'] ,$hierarchy ,$_POST['room_size'] ,$_POST['size_unit'] ,$_POST['room_type_price'], $_POST['room_type_number'],$_POST['general_amenities'],$_POST['bathroom_amenities'],$_POST['kitchen_amenities'],$_POST['connectivity_amenities'], $location_id,$company_id,$_POST['is_available']);
			
			 
			if($stmt->execute())
			{
				$id=$stmt->insert_id;
				for($i=1; $i<=$_POST['indexing_save']; $i++)
				{
					$j='image_data'.$i;
					$data1 = strip_tags($_POST[$j]);
					 
					define('UPLOAD_DIR','../estorecss/'); 
					$img_name1="new".microtime();
					file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
					$stmt = $dbCon->prepare("insert into company_hotel_room_type_photos (room_type_id, image_path, created_on) values (?,?,now())");
					$stmt->bind_param("is",$id,$img_name1);
					 $stmt->execute(); 
				}
			for($i=0; $i<$_POST['room_type_number']; $i++)
			{
			$rname=$_POST['room_name']+$i;
			$custom_name=$_POST['room_name']+$i;
			$hierarchy=htmlentities($_POST['hierarchy'],ENT_NOQUOTES, 'ISO-8859-1');
			$room_view='';
			$description='';
			$stmt = $dbCon->prepare("insert into hotel_room_detail(room_name, room_type, room_class, custom_name,  hierarchy, room_size, room_size_unit, room_view, description, bedding_type, extra_bed, property_id,created_on,room_price_info,room_available)
			values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,now(), ?, ?)");
			$stmt->bind_param("iiississssiiii",$rname,$id,$_POST['room_class'] ,$custom_name ,$hierarchy ,$_POST['room_size'] ,$_POST['size_unit'] ,$room_view ,$description ,$_POST['bedding_type'] ,$_POST['extra_bed'] ,$location_id,$_POST['room_type_price'],$_POST['is_available']);
			$stmt->execute();	
			}				
			
			
				
				
				$stmt = $dbCon->prepare("update property_location set is_hotel=1 where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $location_id);
				$stmt->execute();
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
		
		function editRoomTypeDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$id= $this -> encrypt_decrypt('decrypt',$data['id']); 
			$rname=$_POST['room_name'];
			$stmt = $dbCon->prepare("select number_of_rooms,is_available from company_hotel_room_type_detail where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$newRooms=$_POST['room_type_number']-$row['number_of_rooms'];
			$hierarchy=htmlentities($_POST['hierarchy'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("update company_hotel_room_type_detail set room_type_name=?,  room_class=?, hierarchy=?, room_size=?, size_unit=?,room_price=?,number_of_rooms=?,general_amenities_available=?,bathroom_amenities_available=?,kitchen_amenities_available=?,connectivity_amenities_available=?,is_available=? where id=?");
			$stmt->bind_param("sisisiissssii",$rname,$_POST['room_class'] ,$hierarchy ,$_POST['room_size'] ,$_POST['size_unit'] ,$_POST['room_type_price'], $_POST['room_type_number'],$_POST['general_amenities'],$_POST['bathroom_amenities'],$_POST['kitchen_amenities'],$_POST['connectivity_amenities'],$_POST['is_available'] , $id);
			
			 
			if($stmt->execute())
			{
				
				for($i=1; $i<=$_POST['indexing_save']; $i++)
				{
					$j='image_data'.$i;
					$data1 = strip_tags($_POST[$j]);
					 
					define('UPLOAD_DIR','../estorecss/'); 
					$img_name1="new".microtime();
					file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
					$stmt = $dbCon->prepare("insert into company_hotel_room_type_photos (room_type_id, image_path, created_on) values (?,?,now())");
					$stmt->bind_param("is",$id,$img_name1);
					 $stmt->execute(); 
				}
				
			if($newRooms>0)
			{
			for($i=0; $i<$newRooms; $i++)
			{
				
			$n=$row['number_of_rooms']+$i;
			$rname=$_POST['room_name']+$n;
			$custom_name=$_POST['room_name']+$i;
			$hierarchy=htmlentities($_POST['hierarchy'],ENT_NOQUOTES, 'ISO-8859-1');
			$room_view='';
			$description='';
			 
			$stmt = $dbCon->prepare("insert into hotel_room_detail(room_name, room_type, room_class, custom_name,  hierarchy, room_size, room_size_unit, room_view, description, bedding_type, extra_bed, property_id,created_on,room_price_info,room_available)
			values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,now(),?, ?)");
			$stmt->bind_param("iiississssiiii",$rname,$id,$_POST['room_class'] ,$custom_name ,$hierarchy ,$_POST['room_size'] ,$_POST['size_unit'] ,$room_view ,$description ,$_POST['bedding_type'] ,$_POST['extra_bed'] ,$location_id,$_POST['room_type_price'],$_POST['is_available']);
			$stmt->execute();	
			 
			}	
			}

			if($_POST['is_available']!=$row['is_available'])
			{
			$stmt = $dbCon->prepare("update hotel_room_detail set room_available=? where room_type=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['is_available'],$id);
			$stmt->execute();	
			}
					
				$stmt = $dbCon->prepare("update property_location set is_hotel=1 where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $location_id);
				$stmt->execute();
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
		
		function roomTypeDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$id= $this -> encrypt_decrypt('decrypt',$data['id']); 
			$stmt = $dbCon->prepare("select * from company_hotel_room_type_detail where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
		function roomImages($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$id= $this -> encrypt_decrypt('decrypt',$data['rid']); 
			$stmt = $dbCon->prepare("select * from hotel_room_images where room_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
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
		function roomTypeDetailImages($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$id= $this -> encrypt_decrypt('decrypt',$data['id']); 
			$stmt = $dbCon->prepare("select * from company_hotel_room_type_photos where room_type_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
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
		
		function roomTypeDetailImagesCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$id= $this -> encrypt_decrypt('decrypt',$data['id']); 
			$stmt = $dbCon->prepare("select count(id) as num from company_hotel_room_type_photos where room_type_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function addGuestInfo($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$room_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			if($_POST['indexing_save']==0)
			{
			$stmt = $dbCon->prepare("select email,user_logins_id  from user_profiles left join user_logins on user_logins.id=user_profiles.user_logins_id where country_of_residence=? and phone_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is",$_POST['country_id'], $_POST['phone_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$email=$row['email'];
			$user_id=$row['user_logins_id'];
			}
			else
			{
			$email=$_POST['email'];
			$user_id=0;	
			}	
			$j=0;
			
			while($j==0)
			{
			$code=mt_rand(111111,999999); 
			$stmt = $dbCon->prepare("select id from hotel_room_booking where invitation_code=?");
			/* bind parameters for markers */
			
			$stmt->bind_param("s",$code);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$j++;
			}
			} 
			 
			$stmt = $dbCon->prepare("insert into hotel_room_booking(room_id, check_in, check_out, country_id,  phone_number_user, user_email, user_id, invitation_code, created_on)
			values(?, ?, ?, ?, ?, ?, ?, ?,now())");
			$stmt->bind_param("ississis",$room_id,$_POST['check_in'] ,$_POST['check_out'] ,$_POST['country_id'], $_POST['phone_number'],$email,$user_id,$code);
			
			
			if($stmt->execute())
			{
				
				$stmt = $dbCon->prepare("select country_code from phone_country_code where id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $_POST['country_id']);
				$stmt->execute();
				$result_phone = $stmt->get_result();
				$row_phone = $result_phone->fetch_assoc();
				$subject="Request received";
				$to            = '+'.trim($row_phone['country_code']).''.trim($_POST['phone_number']);
				$emailContent ="you have received a request to connect with your stay.Please connect using this code: ".$code;
				$res=sendSms($subject, $to, $emailContent);
				$to=$email;
				sendEmail($subject, $to, $emailContent);
				 
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
		
			function teamId($data)
		{
			
			return $this -> encrypt_decrypt('decrypt',$data['team_id']);
		}
		
		function appId()
		{
			
			return $this -> encrypt_decrypt('encrypt',40);
		}
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=40");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
		
		function staffVerificationLink($data)
		{
			$url="https://www.safeqloud.com/public/index.php/InstaBox/welcome/".$data['hotel_id'];
			return $surl=getShortUrl($url);
		}
		function hotelDetailInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$stmt = $dbCon->prepare("select hotel_basic_information.id,dry_cleaning,room_service,hotel_name,hotel_basic_information.property_id,visiting_address,hotel_general_amenities,hotel_kitchen_amenities,hotel_bathroom_amenities,hotel_connectivity_amenities,insta_boxes  from hotel_basic_information left join property_location on property_location.id=hotel_basic_information.property_id where hotel_basic_information.property_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			 $row['hotel_id']=$this->encrypt_decrypt('encrypt',$row['id']);
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
		
		function locationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select hotel_name,property_location.id,property_name,visiting_address,property_location.created_on,is_hotel from property_location left join property on property.id=property_location.property_id left join hotel_basic_information on hotel_basic_information.property_id=property_location.id  where property_location.company_id=? order by created_on desc limit 0,50");
			
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
		
			function teamList($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$stmt = $dbCon->prepare("select id,team_name from hotel_team_info where property_id=? order by id");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $location_id);
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
		
		function teamCount($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$stmt = $dbCon->prepare("select count(id) as num  from hotel_team_info where property_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
			function teamEmployeesList($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$team_id= $this -> encrypt_decrypt('decrypt',$data['team_id']);
			$stmt = $dbCon->prepare("select employee_info from hotel_team_info where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $team_id);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			$rowTeam = $result->fetch_assoc();
			//$rowTeam['employee_info']=$rowTeam['employee_info'].',';
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name from employees where  FIND_IN_SET (id,?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $rowTeam['employee_info']);
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
		function locationCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from property_location where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
			function moreLocationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*50+1;
			$b=50;
			$stmt = $dbCon->prepare("select hotel_name,property_location.id,property_name,visiting_address,property_location.created_on,is_hotel from property_location left join property on property.id=property_location.property_id  left join hotel_basic_information on hotel_basic_information.property_id=property_location.id  where property_location.company_id=? order by created_on desc limit ?,? ");
			
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
				  
				if($j%2==0)
				{
					$bg='lgtgrey_bg';
				}
				else
				{
					$bg='white_bg';
				}
				$enc= $this -> encrypt_decrypt('encrypt',$row['id']);
				$enc1="'".$enc."'";
				  if($row['is_hotel']==0) {  
											$ht='<a href="../hotelInformation/'.$data['cid'].'/'.$enc.'" class="xs-padr20" >  
													<div class="fright wi_25  padl30 xs-padl0 xs-wi_20  fsz40    padb0 xs-marrl0">
																				<button type="button" name="Hotel" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bgi" >Hotel?</button>
																			</div> 
																			</a>';
																			$htn='-';
																			$wi='wi_50';
													    } else { 
													$ht='<a href="../amenitiesLogInfo/'.$data['cid'].'/'.$enc.'" >  <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 ">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div></a>';
													$htn=$row['hotel_name'];
													$wi='wi_75 xxs-wi_80';
													    }  
				
				
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt" onclick="checkHotel('.$row['is_hotel'].','.$enc1.');">
												<div class=" '.$bg.' bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 hidden-xs "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['visiting_address'],0,1).'</div>
																	</div>
													
													<div class="fleft '.$wi.'   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">'.$htn.' </span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">'.substr($row['visiting_address'],0,23).'</span>  </div>
													
													'.$ht.'
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>';
				
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
			$stmt = $dbCon->prepare("select id,country_name,country_code  from phone_country_code  order by country_code");
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
		
		
		
		
		
		function worldLanguages()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from world_languages");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function availableCurrency()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from article_currency");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function getAirports($data)
		{
			$dbCon = AppModel::createConnection();
			 $filter = '%'.strtolower($data['filter']).'%';
			$stmt = $dbCon->prepare("select * from airport_detail where airport_name like ? or iata like ?");
			$stmt->bind_param("ss", $filter,$filter);
			$stmt->execute();
			$result = $stmt->get_result();
			$collaborators = array();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				$collaborators[$i]['id']=$row['id'];
				$collaborators[$i]['airport_name']=$row['airport_name'];
				 
				
				$collaborators[$i]['label']=$row['airport_name'];
				
				$i++;
			}
			
			$out=json_encode($collaborators);
			$stmt->close();
			$dbCon->close();
			return $out;
			
			
		}
		
		
		function getAirportValues()
		{
			$dbCon = AppModel::createConnection();
			 $filter = '%'.strtolower($_POST['id']).'%';
			$stmt = $dbCon->prepare("select * from airport_detail where airport_name like ? or iata like ?");
			$stmt->bind_param("ss", $filter,$filter);
			$stmt->execute();
			$result = $stmt->get_result();
			$collaborators = '';
			$i=0;
			while($row = $result->fetch_assoc())
			{
				$collaborators=$collaborators.'<option value="' . $row['airport_name'].'">';
			}
			
			 
			$stmt->close();
			$dbCon->close();
			return $collaborators;
			
			
		}
		
		function getCurrency($data)
		{
			$dbCon = AppModel::createConnection();
			 $filter = '%'.strtolower($data['filter']).'%';
			$stmt = $dbCon->prepare("select * from article_currency where short_name like ? or name like ?");
			$stmt->bind_param("ss", $filter,$filter);
			$stmt->execute();
			$result = $stmt->get_result();
			$collaborators = array();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				$collaborators[$i]['id']=$row['id'];
				$collaborators[$i]['short_name']=$row['short_name'];
				 
				
				$collaborators[$i]['label']=$row['short_name'];
				
				$i++;
			}
			
			$out=json_encode($collaborators);
			$stmt->close();
			$dbCon->close();
			return $out;
			
			
		}
		
		
		
		function getCards($data)
		{
			$dbCon = AppModel::createConnection();
			 $filter = '%'.strtolower($data['filter']).'%';
			$stmt = $dbCon->prepare("select * from loyalty_cards where card_name like ?");
			$stmt->bind_param("s", $filter);
			$stmt->execute();
			$result = $stmt->get_result();
			$collaborators = array();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				$collaborators[$i]['id']=$row['id'];
				$collaborators[$i]['card_name']=$row['card_name'];
				 
				
				$collaborators[$i]['label']=$row['card_name'];
				
				$i++;
			}
			
			$out=json_encode($collaborators);
			$stmt->close();
			$dbCon->close();
			return $out;
			
			
		}
		
		function getLanguages($data)
		{
			$dbCon = AppModel::createConnection();
			 $filter = '%'.strtolower($data['filter']).'%';
			$stmt = $dbCon->prepare("select * from world_languages where lang_eng like ?");
			$stmt->bind_param("s", $filter);
			$stmt->execute();
			$result = $stmt->get_result();
			$collaborators = array();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				$collaborators[$i]['id']=$row['id'];
				$collaborators[$i]['lang_eng']=$row['lang_eng'];
				 
				
				$collaborators[$i]['label']=$row['lang_eng'];
				
				$i++;
			}
			
			$out=json_encode($collaborators);
			$stmt->close();
			$dbCon->close();
			return $out;
			
			
		}
		
		function nearestAirports($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select * from airport_detail where find_in_set(id,?)");
			$stmt->bind_param("s", $data['nearest_airport']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org = array();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
			}
			
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function languagesKnown($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select * from world_languages where find_in_set(id,?)");
			$stmt->bind_param("s", $data['languages_known']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org = array();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
			}
			
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function acceptedCurrency($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select * from article_currency  where find_in_set(id,?)");
			$stmt->bind_param("s", $data['accepted_currency']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function loyaltyCards($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from loyalty_cards  where find_in_set(id,?)");
			$stmt->bind_param("s", $data['loyalty_cards']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function airportInfo()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from airport_detail");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function hotelRoomBeddingType()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from hotel_room_bedding_type");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function hotelBathroomAmenities()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from company_hotel_bathroom_amenities");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function hotelConnectivityAmenities()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from company_hotel_connectivity_amenities");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function hotelGeneralAmenities()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from company_hotel_general_amenities");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function hotelKitchenAmenities()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from company_hotel_kitchen_amenities");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function hotelBathroomAmenitiesRemaining($data)
		{
			$dbCon = AppModel::createConnection();
			$practice_area=explode(',',$data['warning']);
			$stmt = $dbCon->prepare("select * from company_hotel_bathroom_amenities where not find_in_set(id,?)");
			$stmt->bind_param("s", $data['warning']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				 
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function hotelConnectivityAmenitiesRemaining($data)
		{
			$dbCon = AppModel::createConnection();
			$practice_area=explode(',',$data['warning']);
			$stmt = $dbCon->prepare("select * from company_hotel_connectivity_amenities where not find_in_set(id,?)");
			$stmt->bind_param("s", $data['warning']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				 
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function hotelGeneralAmenitiesRemaining($data)
		{
			$dbCon = AppModel::createConnection();
			$practice_area=explode(',',$data['warning']);
			$stmt = $dbCon->prepare("select * from company_hotel_general_amenities where not find_in_set(id,?)");
			$stmt->bind_param("s", $data['warning']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				 
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function hotelKitchenAmenitiesRemaining($data)
		{
			$dbCon = AppModel::createConnection();
			$practice_area=explode(',',$data['warning']);
			$stmt = $dbCon->prepare("select * from company_hotel_kitchen_amenities where not find_in_set(id,?)");
			$stmt->bind_param("s", $data['warning']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
	
	
	function hotelBathroomAmenitiesRemainingSelected($data)
		{
			$dbCon = AppModel::createConnection();
			$practice_area=explode(',',$data['amenities']);
			$stmt = $dbCon->prepare("select * from company_hotel_bathroom_amenities where not find_in_set(id,?)");
			$stmt->bind_param("s", $data['warning']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $practice_area))
				{
				$org[$j]['is_selected']= 1;
				}
				else
				{
				$org[$j]['is_selected']= 0;	
				} 
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function hotelConnectivityAmenitiesRemainingSelected($data)
		{
			$dbCon = AppModel::createConnection();
			$practice_area=explode(',',$data['amenities']);
			$stmt = $dbCon->prepare("select * from company_hotel_connectivity_amenities where not find_in_set(id,?)");
			$stmt->bind_param("s", $data['warning']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $practice_area))
				{
				$org[$j]['is_selected']= 1;
				}
				else
				{
				$org[$j]['is_selected']= 0;	
				} 
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function hotelGeneralAmenitiesRemainingSelected($data)
		{
			$dbCon = AppModel::createConnection();
			$practice_area=explode(',',$data['amenities']);
			$stmt = $dbCon->prepare("select * from company_hotel_general_amenities where not find_in_set(id,?)");
			$stmt->bind_param("s", $data['warning']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $practice_area))
				{
				$org[$j]['is_selected']= 1;
				}
				else
				{
				$org[$j]['is_selected']= 0;	
				} 
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function hotelKitchenAmenitiesRemainingSelected($data)
		{
			$dbCon = AppModel::createConnection();
			$practice_area=explode(',',$data['amenities']);
			$stmt = $dbCon->prepare("select * from company_hotel_kitchen_amenities where not find_in_set(id,?)");
			$stmt->bind_param("s", $data['warning']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $practice_area))
				{
				$org[$j]['is_selected']= 1;
				}
				else
				{
				$org[$j]['is_selected']= 0;	
				}
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
	
		
		function hotelBathroomAmenitiesSelected($data)
		{
			$dbCon = AppModel::createConnection();
			$practice_area=explode(',',$data['warning']);
			$stmt = $dbCon->prepare("select * from company_hotel_bathroom_amenities where not find_in_set(id,?)");
			$stmt->bind_param("s", $data['warning3']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $practice_area))
				{
				$org[$j]['is_selected']= 1;
				}
				else
				{
				$org[$j]['is_selected']= 0;	
				}
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function hotelConnectivityAmenitiesSelected($data)
		{
			$dbCon = AppModel::createConnection();
			$practice_area=explode(',',$data['warning']);
			$stmt = $dbCon->prepare("select * from company_hotel_connectivity_amenities where not find_in_set(id,?)");
			$stmt->bind_param("s", $data['warning2']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $practice_area))
				{
				$org[$j]['is_selected']= 1;
				}
				else
				{
				$org[$j]['is_selected']= 0;	
				}
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function hotelGeneralAmenitiesSelected($data)
		{
			$dbCon = AppModel::createConnection();
			$practice_area=explode(',',$data['warning']);
			$stmt = $dbCon->prepare("select * from company_hotel_general_amenities where not find_in_set(id,?)");
			$stmt->bind_param("s", $data['warning1']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $practice_area))
				{
				$org[$j]['is_selected']= 1;
				}
				else
				{
				$org[$j]['is_selected']= 0;	
				}
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function hotelKitchenAmenitiesSelected($data)
		{
			$dbCon = AppModel::createConnection();
			$practice_area=explode(',',$data['warning']);
			$stmt = $dbCon->prepare("select * from company_hotel_kitchen_amenities where not find_in_set(id,?)");
			$stmt->bind_param("s", $data['warning4']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $practice_area))
				{
				$org[$j]['is_selected']= 1;
				}
				else
				{
				$org[$j]['is_selected']= 0;	
				}
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		function hotelBathroomAmenitiesSelectedBasic($data)
		{
			$dbCon = AppModel::createConnection();
			$practice_area=explode(',',$data['warning']);
			$stmt = $dbCon->prepare("select * from company_hotel_bathroom_amenities");
			 
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $practice_area))
				{
				$org[$j]['is_selected']= 1;
				}
				else
				{
				$org[$j]['is_selected']= 0;	
				}
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function hotelConnectivityAmenitiesSelectedBasic($data)
		{
			$dbCon = AppModel::createConnection();
			$practice_area=explode(',',$data['warning']);
			$stmt = $dbCon->prepare("select * from company_hotel_connectivity_amenities");
			 
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $practice_area))
				{
				$org[$j]['is_selected']= 1;
				}
				else
				{
				$org[$j]['is_selected']= 0;	
				}
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function hotelGeneralAmenitiesSelectedBasic($data)
		{
			$dbCon = AppModel::createConnection();
			$practice_area=explode(',',$data['warning']);
			$stmt = $dbCon->prepare("select * from company_hotel_general_amenities");
			 
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $practice_area))
				{
				$org[$j]['is_selected']= 1;
				}
				else
				{
				$org[$j]['is_selected']= 0;	
				}
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function hotelKitchenAmenitiesSelectedBasic($data)
		{
			$dbCon = AppModel::createConnection();
			$practice_area=explode(',',$data['warning']);
			$stmt = $dbCon->prepare("select * from company_hotel_kitchen_amenities");
			 
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $practice_area))
				{
				$org[$j]['is_selected']= 1;
				}
				else
				{
				$org[$j]['is_selected']= 0;	
				}
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function hotelRoomClass()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from hotel_room_class");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		 	
		
		function hotelStars()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from hotel_stars");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function roomDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("select hotel_room_detail.id,room_name,hotel_room_type.room_type,room_available from hotel_room_detail left join company_hotel_room_type_detail on company_hotel_room_type_detail.id=hotel_room_detail.room_type  left join hotel_room_type on hotel_room_type.id=company_hotel_room_type_detail.room_type  where property_id=? and hotel_room_detail.room_type=?   limit 0,10");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $location_id,$id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				 
				$stmt = $dbCon->prepare("select count(id) as num,TIMESTAMPDIFF(HOUR,check_out,now()) as timedifference from hotel_room_booking where is_free=0 and room_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				 
				if($row1['timedifference']>=0)
				{
				$stmt = $dbCon->prepare("update hotel_room_booking set is_free=1 where room_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$org[$j]['is_free']=1;
				}
				else
				{
				$org[$j]['is_free']=0;	
				}
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			  
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function roomDetailInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select * from hotel_room_detail   where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			  
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		
		
		function roomCount($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("select count(id) as num from hotel_room_detail where property_id=?  and room_type=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $location_id,$id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function roomTypeList($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$stmt = $dbCon->prepare("select company_hotel_room_type_detail.id,room_type_name,hotel_room_type.room_type,is_available from company_hotel_room_type_detail left join hotel_room_type on hotel_room_type.id=company_hotel_room_type_detail.room_type  where location_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $location_id);
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
		
		function roomTypeCount($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_hotel_room_type_detail where location_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $location_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
			function moreRoomDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$a=$_POST['id']*10;
			$b=10;
			$stmt = $dbCon->prepare("select hotel_room_detail.id,room_name,hotel_room_type.room_type from hotel_room_detail left join company_hotel_room_type_detail on company_hotel_room_type_detail.id=hotel_room_detail.room_type  left join hotel_room_type on hotel_room_type.id=company_hotel_room_type_detail.room_type  where property_id=? and hotel_room_detail.room_type=?  limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiii", $location_id,$id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$enc= $this -> encrypt_decrypt('encrypt',$row['id']);
				   
				$stmt = $dbCon->prepare("select count(id) as num,TIMESTAMPDIFF(HOUR,check_out,now()) as timedifference from hotel_room_booking where is_free=0 and room_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				 
				if($row1['timedifference']>=0)
				{
				$stmt = $dbCon->prepare("update hotel_room_booking set is_free=1 where room_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$org[$j]['is_free']=1;
				$a='<a href="../../alotRoom/'.$data['cid'].'/'.$data['lid'].'/'.$enc.'>"';
				$hidden="";
				}
				else
				{
				$a='<a href="#"';	
				$hidden=" hidden";
				}
				
				$org=$org.''.$a.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['room_name'],0,1).'</div>
																	</div>
													
													<div class="fleft wi_60   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">'.$row['room_name'].' </span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">'.$row['room_type'].'</span>  </div>
													
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs '.$hidden.'">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div></a>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
	}						