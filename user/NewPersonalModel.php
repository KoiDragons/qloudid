<?php
	require_once('../AppModel.php');
	class NewPersonalModel extends AppModel
	{
		
		function updateUserPhoneDetails($data)
		{
		$dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select * from user_profile_update_info where user_id=?");
				/* bind parameters for markers */
		$stmt->bind_param("i", $data['user_id']);
		$stmt->execute();
		$result = $stmt->get_result();
		$posted_value = $result->fetch_assoc();
	 
		$stmt = $dbCon->prepare("update user_profiles set phone_number=? where user_logins_id=?");
		/* bind parameters for markers */
        $stmt->bind_param("si", $posted_value['phone_number'],$data['user_id']);
        $stmt->execute();
		
		$stmt = $dbCon->prepare("select user_logins.id,first_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image,get_started_wizard_status,grading_status,country_of_residence,country_name,user_logins.created_on from user_logins left join country on country.id=user_logins.country_of_residence where user_logins.id = ?");
			/* bind parameters for markers */
		$cont=1;
		$stmt->bind_param("i", $data['user_id']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$stmt = $dbCon->prepare("select user_logins.id,first_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image,get_started_wizard_status,grading_status,country_of_residence,country_name,user_logins.created_on from user_logins left join country on country.id=user_logins.country_of_residence left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.country_of_residence = ? and phone_number=?");
			/* bind parameters for markers */
		$cont=1;
		$stmt->bind_param("is", $row['country_of_residence'],$posted_value['phone_number']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();		
		$phone_number='';
		$stmt = $dbCon->prepare("update user_profiles set phone_number=? where user_logins_id=?");
		/* bind parameters for markers */
        $stmt->bind_param("si", $phone_number,$row['id']);
        $stmt->execute();
		
		
		$this->deleteProfileEditDetails($data);
		$stmt->close();
		$dbCon->close();
		return 1;
			
		}
		
		
		
		function updateUserBankDetails($data)
		{
		$dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select * from user_profile_update_info where user_id=?");
				/* bind parameters for markers */
		$stmt->bind_param("i", $data['user_id']);
		$stmt->execute();
		$result = $stmt->get_result();
		$posted_value = $result->fetch_assoc();
	 
		$stmt = $dbCon->prepare("update user_profiles set clearing_number=?,bank_account_number=?,language=? where user_logins_id=?");
		/* bind parameters for markers */
        $stmt->bind_param("sssi", $posted_value['clearing_number'],$posted_value['account_number'],$posted_value['bank_name'],$data['user_id']);
        $stmt->execute();
		$this->deleteProfileEditDetails($data);
		$stmt->close();
		$dbCon->close();
		return 1;
			
		}
		
		
		function updateUserAddressDetails($data)
		{
				$dbCon = AppModel::createConnection();
				$stmt = $dbCon->prepare("select * from user_profile_update_info where user_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$posted_value = $result->fetch_assoc();
	 
				
				
				$stmt = $dbCon->prepare("update user_profiles set name_on_door=?, entry_code=?, full_address=?, port_number=?, address=?, city=?, zipcode=?,invoice_address=?,invoice_zipcode=?,invoice_city=?,invoice_port=?,is_invoice_same=?,is_name_on_house_same=?, is_id_active=1  where user_logins_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("sssssssssssiii",$posted_value['name_on_door'],$posted_value['entry_code'], $posted_value['address'],$posted_value['port_number'], $posted_value['address'],$posted_value['city'],$posted_value['zipcode'],$posted_value['invoice_address'],$posted_value['invoice_zipcode'],$posted_value['invoice_city'],$posted_value['invoice_port'],$posted_value['is_invoice_same'],$posted_value['is_name_on_house_same'],$data['user_id']);
			
				 
				$stmt->execute();
				
				
				$stmt = $dbCon->prepare("select count(id) as num from user_address where user_id = ?");
				
						/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowId    = $result->fetch_assoc();	
				if($rowId['num']==0)
				{
				$stmt = $dbCon->prepare("insert into  user_address ( `user_id`, `address`  , `city`  , `zipcode` , `port_number` , `invoice_address`  , `invoice_city`  , `invoice_zipcode`  , `invoice_port_number`  , `is_name_same`  , `is_invoice_same`  , `name_on_house`   , `created_on`,entry_code ) values (? , ?, ?, ?, ? , ?, ?, ?, ? , ?, ?, ?, now(), ?)");
				/* bind parameters for markers */
				$stmt->bind_param("issssssssiiss",$data['user_id'],$posted_value['address'],$posted_value['city'], $posted_value['zipcode'],$posted_value['port_number'],$posted_value['invoice_address'],$posted_value['invoice_city'],$posted_value['invoice_zipcode'],$posted_value['invoice_port'],$posted_value['is_name_on_house_same'],$posted_value['is_invoice_same'],$posted_value['name_on_door'],$data['entry_code']);
				$stmt->execute();
				}
				else
				{
				$stmt = $dbCon->prepare("update  user_address set  `address`=?  , `city`=?  , `zipcode`=? , `port_number` =?, `invoice_address` =? , `invoice_city` =? , `invoice_zipcode`=?  , `invoice_port_number`=?  , `is_name_same` =? , `is_invoice_same`=?  , `name_on_house`=?  ,entry_code=? where user_id=? and is_personal_address=1");
				/* bind parameters for markers */
				$stmt->bind_param("ssssssssiissi",$posted_value['address'],$posted_value['city'], $posted_value['zipcode'],$posted_value['port_number'],$posted_value['invoice_address'],$posted_value['invoice_city'],$posted_value['invoice_zipcode'],$posted_value['invoice_port'],$posted_value['is_name_on_house_same'],$posted_value['is_invoice_same'],$posted_value['name_on_door'],$data['entry_code'],$data['user_id']);
				$stmt->execute();
				}
			
			
		$this->deleteProfileEditDetails($data);
		$stmt->close();
		$dbCon->close();
		return 1;
			
		}
		
		
		function saveUserBankUpdate($data)
		{
		$dbCon = AppModel::createConnection();
		 
				$ad=1;
				$code=mt_rand(1111,9999); 
				$_POST['langu']=htmlentities($_POST['langu'],ENT_NOQUOTES, 'ISO-8859-1');
				$_POST['clear_number']=htmlentities($_POST['clear_number'],ENT_NOQUOTES, 'ISO-8859-1');
				$_POST['bank_acc']=htmlentities($_POST['bank_acc'],ENT_NOQUOTES, 'ISO-8859-1');
			 
				$stmt = $dbCon->prepare("insert into user_profile_update_info(phone_otp,bank_name,clearing_number,account_number,user_id,bank_details) values(?,?,?,?,?,?)");
				/* bind parameters for markers */
				$stmt->bind_param("isssii",$code,$_POST['langu'],$_POST['clear_number'],$_POST['bank_acc'],$data['user_id'],$ad);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("select country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$stmt = $dbCon->prepare("select country_code,country_name from phone_country_code where id=?");
					
					/* bind parameters for markers */
				$stmt->bind_param("i", $row['country_of_residence']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_country = $result->fetch_assoc();
					
					 
				$subject='Verify update';
				$emailContent='Please verify your details using code - '.$code;
				$to            = '+'.trim($row_country['country_code']).''.trim($row['phone_number']);
					 
				try{
				$res=json_decode(sendSms($subject, $to, $emailContent),true);
				}
				catch(Exception $e) {
						 
					   
				}
			$stmt->close();
			$dbCon->close();
			return 1;
	}
		
		function saveUserPhoneUpdate($data)
		{
		$dbCon = AppModel::createConnection();
		 
				$ad=1;
				$code=mt_rand(1111,9999); 
				
				$stmt = $dbCon->prepare("insert into user_profile_update_info(phone_otp,phone_number,user_id,phone_details) values(?,?,?,?)");
				/* bind parameters for markers */
				$stmt->bind_param("isii",$code,$_POST['uphno'],$data['user_id'],$ad);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("select country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$stmt = $dbCon->prepare("select country_code,country_name from phone_country_code where id=?");
					
					/* bind parameters for markers */
				$stmt->bind_param("i", $row['country_of_residence']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_country = $result->fetch_assoc();
					
					 
				$subject='Verify update';
				$emailContent='Please verify your details using code - '.$code;
				$to            = '+'.trim($row_country['country_code']).''.trim($_POST['uphno']);
					 
				try{
				$res=json_decode(sendSms($subject, $to, $emailContent),true);
				}
				catch(Exception $e) {
						 
					   
				}
			$stmt->close();
			$dbCon->close();
			return 1;
	}
		
		
		
		
		
		function saveUserAddressUpdate($data)
		{
		$dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select first_name,last_name,ssn,country_of_residence,email,sex,dob_day,dob_month,dob_year,country_phone,phone_number, address,user_profiles.city,user_profiles.country,user_profiles.zipcode,grading_status from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where user_logins.id=?");
			
		/* bind parameters for markers */
		$stmt->bind_param("i", $data['user_id']);
		$stmt->execute();
		$result = $stmt->get_result();
			
		$row = $result->fetch_assoc();
		
				if($_POST['same_name']==1)
				{
				$full_name=$row['first_name'].' '.$row['last_name'];	
				}
				else
				{
				$full_name=	htmlentities($_POST['flname'],ENT_NOQUOTES, 'ISO-8859-1');
				}
				
				if($_POST['same_invoice']==1)
				{
				$_POST['iaddress']=$_POST['addrs'];	
				$_POST['i_port_number']=$_POST['pnumber'];	
				$_POST['izip']=$_POST['dzip'];
				$_POST['icity']=$_POST['dcity'];
				}
				$ad=1;
				$code=mt_rand(1111,9999); 
				$_POST['addrs']=htmlentities($_POST['addrs'],ENT_NOQUOTES, 'ISO-8859-1');
				$_POST['dcity']=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
				$_POST['iaddress']=htmlentities($_POST['iaddress'],ENT_NOQUOTES, 'ISO-8859-1');
				$_POST['icity']=htmlentities($_POST['icity'],ENT_NOQUOTES, 'ISO-8859-1');
				$stmt = $dbCon->prepare("insert into user_profile_update_info(phone_otp,name_on_door, entry_code, full_address, port_number, address, city, zipcode,invoice_address,invoice_zipcode,invoice_city,invoice_port,is_invoice_same,is_name_on_house_same,user_id,address_details) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				/* bind parameters for markers */
				$stmt->bind_param("isssssssssssiiii",$code,$full_name,$_POST['entry_code'], $_POST['addrs'],$_POST['pnumber'], $_POST['addrs'],$_POST['dcity'],$_POST['dzip'],$_POST['iaddress'],$_POST['izip'],$_POST['icity'],$_POST['i_port_number'],$_POST['same_invoice'],$_POST['same_name'],$data['user_id'],$ad);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("select country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$stmt = $dbCon->prepare("select country_code,country_name from phone_country_code where id=?");
					
					/* bind parameters for markers */
				$stmt->bind_param("i", $row['country_of_residence']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_country = $result->fetch_assoc();
					
					 
				$subject='Verify update';
				$emailContent='Please verify your details using code - '.$code;
				$to            = '+'.trim($row_country['country_code']).''.trim($row['phone_number']);
					 
				try{
				$res=json_decode(sendSms($subject, $to, $emailContent),true);
				}
				catch(Exception $e) {
						 
					   
				}
			$stmt->close();
			$dbCon->close();
			return 1;
	}
		
		
		
		function deleteProfileEditDetails($data)
		{
		$dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("delete from user_profile_update_info where user_id=?");
		/* bind parameters for markers */
		$stmt->bind_param("i", $data['user_id']);
		$stmt->execute();
		 
		$stmt->close();
		$dbCon->close();
		return 1;
			
		}
		function profileEditDetails($data)
		{
		$dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select * from user_profile_update_info where user_id=?");
		/* bind parameters for markers */
		$stmt->bind_param("i", $data['user_id']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
		$dbCon->close();
		return $row;
			
		}
		
		
		function updateUserBasicDetails($data)
		{
		$dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select * from user_profile_update_info where user_id=?");
		/* bind parameters for markers */
		$stmt->bind_param("i", $data['user_id']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$a=explode('-',$row['date_of_birth']);
		 
		$stmt = $dbCon->prepare("update user_logins set first_name=?,last_name=?,sex=?,dob_day=?,dob_month=?,dob_year=? where id=?");
		/* bind parameters for markers */
		$stmt->bind_param("ssiiiii",$row['first_name'],$row['last_name'],$row['sex'],$a[2],$a[1],$a[0],$data['user_id']);
		$stmt->execute();
		$this->deleteProfileEditDetails($data);
		$stmt->close();
		$dbCon->close();
		return 1;
			
		}
		
		
		function saveProfileBasicDetails($data)
		{
		$dbCon = AppModel::createConnection();
		$basic_details=1;
		$code=mt_rand(1111,9999); 
		$_POST['first_name']=html_entity_decode(htmlentities($_POST['first_name'],ENT_NOQUOTES, 'ISO-8859-1'));
		$_POST['last_name']=html_entity_decode(htmlentities($_POST['last_name'],ENT_NOQUOTES, 'ISO-8859-1'));
		$stmt = $dbCon->prepare("insert into user_profile_update_info (user_id,first_name,last_name,sex,date_of_birth,basic_details,phone_otp) values (?,?,?,?,?,?,?)");
		$stmt->bind_param("issisii",$data['user_id'],$_POST['first_name'],$_POST['last_name'],$_POST['sex'],$_POST['dob'],$basic_details,$code);
		$stmt->execute();	
		$stmt = $dbCon->prepare("select country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id=?");
			
			/* bind parameters for markers */
		$stmt->bind_param("i", $data['user_id']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt = $dbCon->prepare("select country_code,country_name from phone_country_code where id=?");
			
			/* bind parameters for markers */
		$stmt->bind_param("i", $row['country_of_residence']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row_country = $result->fetch_assoc();
			
			 
		$subject='Verify update';
		$emailContent='Please verify your details using code - '.$code;
		$to            = '+'.trim($row_country['country_code']).''.trim($row['phone_number']);
			 
		try{
		$res=json_decode(sendSms($subject, $to, $emailContent),true);
		}
		catch(Exception $e) {
						 
					   
		}
		catch (Error $e) {
					 
		}
		$stmt->close();
		$dbCon->close();
		return 1;
			
		}
		
		function addDependentResidential($data)
		{
		$dbCon = AppModel::createConnection();
		$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
		$a=explode(',',$_POST['proposal_data']);
		foreach($a as $key)
		{
		$stmt = $dbCon->prepare("insert into user_apartment_dependent_residential (dependent_id,apartment_id,created_on) values (?,?,now())");
		$stmt->bind_param("ii",$key,$aid);
		$stmt->execute();	
		}
		$stmt->close();
		$dbCon->close();
		return 1;
			
		}
		
		function selectedResidentialDependentList($data)
		{
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$org=array();
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,image_path from dependents where id in (select dependent_id from user_apartment_dependent_residential where apartment_id=?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			 
			if($row['image_path']!=null || $row['image_path']!="") { 
						 
			$filename="../estorecss/".$row ['image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['image_path'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['image_path'].'.jpg' ); } else { $imgs="../html/usercontent/images/notavailable.jpg"; }
			$row['photo_info']=	'../../../'.$imgs;
				
				  
			}
			else
			{
			$row['photo_info']=	'../../../../html/usercontent/images/notavailable.jpg';
			
			}
				 
			 
				array_push($org,$row);
			}
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		function sendInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select user_logins.id,first_name,last_name,concat_ws(' ',first_name,last_name) as name,sex,dob_day,dob_month,dob_year,user_logins.created_on,email,country_of_residence,ssn,phone_number  from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.country_of_residence=? and phone_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $_POST['pcountry'],$_POST['pnumber']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			if(empty($row))
			$user=0;
			else
			$user=$row['id'];
			
			
			$stmt = $dbCon->prepare("select id,country_name,country_code from phone_country_code where id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $_POST['pcountry']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$to='+'.$row['country_code'].''.$_POST['pnumber'];			
						
			if($user==0)
			{
			$stmt = $dbCon->prepare("insert into user_apartment_residential (country_id,phone_number,apartment_id,created_on) values (?,?,?,now())");
			$stmt->bind_param("isi",$_POST['pcountry'],$_POST['pnumber'],$aid);
			$stmt->execute();
			$subject='You are added to an apartment';
			$html='You are added to an apartment as Residential. please confirm that you live there or not';
			$res=sendSms($subject, $to, $html);
			$rs=json_decode($res,true);
			}
			else
			{
			$stmt = $dbCon->prepare("select  id from user_apartment_residential user_id=? and apartment_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $user,$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();	
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into user_apartment_residential (country_id,phone_number,apartment_id,user_id,created_on) values (?,?,?,?,now())");
			$stmt->bind_param("isii",$_POST['pcountry'],$_POST['pnumber'],$aid,$user);
			$stmt->execute();	
			$subject='You are added to an apartment';
			$html='You are added to an apartment as Residential. please confirm that you live there or not';
			$res=sendSms($subject, $to, $html);
			$rs=json_decode($res,true);	
			}
			}
			
			
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		function residentialsList($data)
		{
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$org=array();
			$stmt = $dbCon->prepare("select * from user_apartment_residential where apartment_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select id,country_name,country_code from phone_country_code where id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $row['country_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();
			$row['country_code']=$row1['country_code'];
			
			$stmt = $dbCon->prepare("select first_name,last_name,passport_image from user_logins where id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $row['user_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();
			if(empty($row1))
			{
				$row['photo_info']=	'../../../../html/usercontent/images/notavailable.jpg';
				$row['name']='No name';
			}
			else
			{
			if($row1['passport_image']!=null || $row1['passport_image']!="") { 
						 
			$filename="../estorecss/".$row1 ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/notavailable.jpg"; }
			$row['photo_info']=	'../../../'.$imgs;
				
				  
			}
			else
			{
			$row['photo_info']=	'../../../../html/usercontent/images/notavailable.jpg';
			
			}
				$row['name']=$row1['first_name'].' '.$row1['last_name'];
			}
			
				array_push($org,$row);
			}
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function residentialDependentList($data)
		{
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$org=array();
			$stmt = $dbCon->prepare("select * from dependents where created_by in (select user_id from user_apartment_residential where apartment_id=?) or created_by=(select user_id from user_address where id=?) and id not in (select dependent_id from user_apartment_dependent_residential where apartment_id=?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iii", $aid,$aid,$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			 
			if($row['image_path']!=null || $row['image_path']!="") { 
						 
			$filename="../estorecss/".$row ['image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['image_path'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['image_path'].'.jpg' ); } else { $imgs="../html/usercontent/images/notavailable.jpg"; }
			$row['photo_info']=	'../../../'.$imgs;
				
				  
			}
			else
			{
			$row['photo_info']=	'../../../../html/usercontent/images/notavailable.jpg';
			
			}
				 
			 
				array_push($org,$row);
			}
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function countrynameList()
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
		function updateVitechDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("update user_address set vitech_area=?,vitech_city=? where id=?");
			$stmt->bind_param("iii", $_POST['area_id'], $_POST['city_id'],$aid);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		function vitechAreaList()
		{ 
		
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select *  from vitech_area where region_city_id=?");
			$stmt->bind_param("i", $_POST['city_id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			$org='<option value="0">Select</option>';
			while($row= $result3->fetch_assoc())
			{
			$org=$org.'<option value="'.$row['id'].'">'.$row['area_name'].'</option>';
			}
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		function selectedVitechAreaList($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select *  from vitech_area where region_city_id=?");
			$stmt->bind_param("i", $data['vitech_city']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			$org=array();
			while($row= $result3->fetch_assoc())
			{
			array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		function vitechCityList()
		{ 
		
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from vitech_city");
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
		function updateTicketCategoryAmenities($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("update user_apartment_amenities_subcategory_info set is_available=1,modified_on=now(),who_will_fix_the_problem=1 where user_apartment_amenity_category_id=? and advance_values=? and is_available=0");
			$stmt->bind_param("ii", $_POST['user_amenity_category_id'],$_POST['user_amenity_category_type']);
			$stmt->execute();
			 				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateTicketSubcategory($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 $stmt = $dbCon->prepare("update user_apartment_amenities_subcategory_info set who_will_fix_the_problem=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$_POST['subcategory_info'], $_POST['user_amenity_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateAminitySubcategory($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 $stmt = $dbCon->prepare("update user_apartment_amenities_subcategory_info set is_available=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $_POST['user_amenity_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function amenitiesSubcategoryDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 $category_id=$this->encrypt_decrypt('decrypt',$data['category_id']);
			$stmt = $dbCon->prepare("select user_apartment_amenity_category_info.id,category_id,ticket_title from user_apartment_amenity_category_info left join landloard_ticket_title_new on landloard_ticket_title_new.id=user_apartment_amenity_category_info.category_id where user_apartment_amenity_category_info.id=?");
			$stmt->bind_param("i", $category_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			
			$row = $result->fetch_assoc();
			for($j=1;$j>=0;$j--)
			{
				if($row['category_id']==9 && $j==0)
					continue;
				if(($row['category_id']==2 || $row['category_id']==3) && $j==0)
					continue;
				
				if($j==0)
				{
					$title='Extra ordinary or advanced';
				}
				else
				{
					$title=$row['ticket_title'];
				}
				
				$i=$j+1;
			$stmt = $dbCon->prepare("select count(user_apartment_amenities_subcategory_info.id) as num from user_apartment_amenities_subcategory_info where user_apartment_amenity_category_id=? and advance_values=? and is_available=1");
			$stmt->bind_param("ii", $row['id'],$j);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();	
			$org=$org.' <div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile'.$j.'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold"><div class="dflex wi_100">
									<div class="wi_70 dflex">
								<span class="css-p2kctj"><img src="https://www.qloudid.com/html/usercontent/images/kitchen'.$i.'.svg" class="css-z0f999"></span> 
								<div>
								<span class="apartheading">'.$title.'</span><span class="aprtSubheading">'.$row1['num'].' amenities selected</span>
								</div>
								</div> 
									<div class="wi_30 padt10">
															<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span>
									</div> 
									</div></a></div>
								<div id="profile'.$j.'" class=" " style="display: block;">	
										 
									  <div class="css-2998cc fleft padb20">
									<a href="javascript:void(0);" onclick="updateTicketCategoryAmenities('.$row['id'].','.$j.')"> <button color="#444444" data-testid="Kitchen-amenity-section-select-all" class="merlin-button css-7wfern" aria-label=""><div class="merlin-button__content">Select all</div></button></a>
									  </div>
									  
									   <div class="clear"></div>
											<div id="'.$j.'">';
		 	$stmt = $dbCon->prepare("select subcategory_name,user_apartment_amenities_subcategory_info.id,is_available,who_will_fix_the_problem,advance_values from user_apartment_amenities_subcategory_info left join landloard_ticket_subtitle_new on landloard_ticket_subtitle_new.id=user_apartment_amenities_subcategory_info.subcategory_id where user_apartment_amenity_category_id=? and advance_values=?");
			$stmt->bind_param("ii", $row['id'],$j);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			while($row1 = $result1->fetch_assoc())
			{
				 
				if($row1['is_available']==1)
				{
					$checked='checked';
					$update=0;
				}
				else
				{
					$checked='';
					$update=1;
				}
				$org=$org.' <div data-testid="'.$row1['subcategory_name'].'-amenity-item" class="css-39yi7y"><div class="css-nj7s2c"><label for="oven" class="css-14q70q0">'.$row1['subcategory_name'].'</label><div class="css-1sjqbna">
				<a href="javascript:void(0);" onclick="updateAminitySubcategory('.$row1['id'].','.$update.');"><input data-testid="test-checkbox-'.$row1['subcategory_name'].'" name="'.$row1['subcategory_name'].'" type="checkbox" class="css-1lgzhz8" '.$checked.'></a>
				</div></div>';
				$option='';
				if($row1['is_available']==1)
				{
							if($row1['who_will_fix_the_problem']==1)
							{
								$seleted1='selected';
								$seleted2='';
							}
							else
							{
								$seleted2='selected';
								$seleted1='';
							}
							$option=$option.'<option value="1" '.$seleted1.'>Myself</option>';
							$option=$option.'<option value="2" '.$seleted2.'>landloard</option>';
						
					$org=$org.'<div class="css-11e5cyp">
					<select id="'.$row1['subcategory_name'].'-amenity-select" data-testid="'.$row1['subcategory_name'].'-amenity-select" class="css-bnguuq dropdown-bg" onchange="updateTicketSubcategory('.$row1['id'].',this.value);">
					'.$option.'
					</select>
					</div> ';	
				}
				
				$org=$org.'</div>';	
			}			
											
			$org=$org.'</div> </div> </div> ';
			}
			
			  
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		function categoryInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select * from user_apartment_other_room_detail where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowOtherRoom = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from landloard_ticket_title_new where id not in (select category_id from user_apartment_amenity_category_info where apartment_id=?) and ticket_type=1");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
				if($row['id']<=2)
				{
					$selected=1;
				}
				else
				{	
					if($row['id']==3)
					{
					if($rowOtherRoom['kitchen_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==4)
					{
					if($rowOtherRoom['entrance_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==5)
					{
					if($rowOtherRoom['balcony_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==6)
					{
					if($rowOtherRoom['storage_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==7)
					{
					if($rowOtherRoom['basement_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==8)
					{
					if($rowOtherRoom['garage_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==9)
					{
						$selected=1;
					}
					
				}
			$stmt = $dbCon->prepare("insert into user_apartment_amenity_category_info (category_id,apartment_id,is_selected) values (?,?,?)");
			$stmt->bind_param("iii",$row['id'], $aid,$selected);
			$stmt->execute();		
			$id=$stmt->insert_id;
				$indexValue='category_id_'.$row['id'];
				$stmt = $dbCon->prepare("select * from landloard_ticket_subtitle_new");
				$stmt->execute();
				$result1 = $stmt->get_result();
				while($row1 = $result1->fetch_assoc())
				{
					if($row1[$indexValue]==2)
						continue;
					$stmt = $dbCon->prepare("insert into user_apartment_amenities_subcategory_info (user_apartment_amenity_category_id,subcategory_id,is_available,advance_values,created_on,modified_on) values (?,?,?,?,now(),now())");
					$stmt->bind_param("iiii",$id, $row1['id'],$row1[$indexValue],$row1[$indexValue]);
					$stmt->execute();
				}
			}
			 
			 
			$stmt = $dbCon->prepare("select * from landloard_ticket_title_new where ticket_type=1");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
				if($row['id']<=2)
				{
					$selected=1;
				}
				else
				{	
					if($row['id']==3)
					{
					if($rowOtherRoom['kitchen_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==4)
					{
					if($rowOtherRoom['entrance_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==5)
					{
					if($rowOtherRoom['balcony_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==6)
					{
					if($rowOtherRoom['storage_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==7)
					{
					if($rowOtherRoom['basement_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==8)
					{
					if($rowOtherRoom['garage_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==9)
					{
						$selected=1;
					}
					
				}
			$stmt = $dbCon->prepare("select id from user_apartment_amenity_category_info where category_id=? and apartment_id=?");
			$stmt->bind_param("ii",$row['id'], $aid);
			$stmt->execute();		
			$resultInfo = $stmt->get_result();
			$rowInfo = $resultInfo->fetch_assoc();
				$indexValue='category_id_'.$row['id'];
				$stmt = $dbCon->prepare("select * from landloard_ticket_subtitle_new where id not in (select subcategory_id from user_apartment_amenities_subcategory_info where user_apartment_amenity_category_id=?)");
				$stmt->bind_param("i",$rowInfo['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				while($row1 = $result1->fetch_assoc())
				{
					if($row1[$indexValue]==2)
						continue;
					$stmt = $dbCon->prepare("insert into user_apartment_amenities_subcategory_info (user_apartment_amenity_category_id,subcategory_id,is_available,advance_values,created_on,modified_on) values (?,?,?,?,now(),now())");
					$stmt->bind_param("iiii",$rowInfo['id'], $row1['id'],$row1[$indexValue],$row1[$indexValue]);
					$stmt->execute();
				}
			}
			  
			 
			 
			 
			$stmt = $dbCon->prepare("select user_apartment_amenity_category_info.id,ticket_title from user_apartment_amenity_category_info left join landloard_ticket_title_new on landloard_ticket_title_new.id=user_apartment_amenity_category_info.category_id where apartment_id=? and is_selected=1");
			$stmt->bind_param("i", $aid);
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
		
		
		function apartmentCheckedinInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			  
			$stmt = $dbCon->prepare("select hotel_checkout_detail.id,concat_ws(' ',first_name,last_name) as name,checkin_date,checkout_date from hotel_checkout_detail left join user_logins on user_logins.id=hotel_checkout_detail.user_id where room_type_id=? and hotel_property_type=2 and checked_in=1");
			$stmt->bind_param("i", $aid);
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
		
		function apartmentCheckedOutInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select hotel_checkout_detail.id,concat_ws(' ',first_name,last_name) as name,checkin_date,checkout_date,actual_checkout_date from hotel_checkout_detail left join user_logins on user_logins.id=hotel_checkout_detail.user_id where room_type_id=? and hotel_property_type=2 and checked_in=2 order by actual_checkout_date desc");
			$stmt->bind_param("i", $aid);
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
		function checkoutGuest($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$checkout_id=$this->encrypt_decrypt('decrypt',$data['checkout_id']);
			$stmt = $dbCon->prepare("update hotel_checkout_detail set checked_in=2,actual_checkout_date=now() where id=?"); 
			$stmt->bind_param("i",$checkout_id);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("update hotel_checkout_dependent_detail set checked_in_dependent=2 where hotel_checkout_id=?"); 
			$stmt->bind_param("i",$checkout_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update user_address set whether_it_is_cleen=0 where id=(select room_type_id from hotel_checkout_detail where id=?)"); 
			$stmt->bind_param("i",$checkout_id);
			$stmt->execute();	
			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => 'https://dstricts.com/user/index.php/DstrictsApp/checkOutApartmentGuest',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPTdataFIELDS => array('checkout_id' => $checkout_id),
			)); 
			$response = curl_exec($curl);
			curl_close($curl);
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateDamagedRentableInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$check_id=$this->encrypt_decrypt('decrypt',$data['check_id']);
			$stmt = $dbCon->prepare("update user_address set whether_it_is_cleen=?,if_damaged=?,if_rentable=? where id=?"); 
			$stmt->bind_param("iiii",$_POST['is_cleened'],$_POST['if_damaged'],$_POST['if_rentable'], $aid);
			$stmt->execute();

			$stmt = $dbCon->prepare("update hotel_checkout_detail set is_cleaned=?,if_damaged=?,is_rentable=? where id=?"); 
			$stmt->bind_param("iiii",$_POST['is_cleened'],$_POST['if_damaged'],$_POST['if_rentable'], $check_id);
			$stmt->execute();	
			if($_POST['is_cleened']==1)
			{
			$stmt = $dbCon->prepare("insert into user_apartment_cleening_history (apartment_id,cleening_date,checkout_id) values (?,?,?)");
			$stmt->bind_param("isi", $aid,$_POST['cleening_date'],$check_id);
			$stmt->execute();	
			}
			
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function updateOwnerInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 $st=1;
			 $bt=0;
			 $stmt = $dbCon->prepare("update user_address set ownership_detail=?,bought_by_you=?,bought_rent_allowed=?,rent_contract_on_you=?,allowed_to_rent_out=? where id=?"); 
			 if($_POST['propertyType']==1)
			 {
				$stmt->bind_param("iiiiii",$_POST['propertyType'],$st,$st,$bt,$bt, $aid);
			 }
			else
			{
				$stmt->bind_param("iiiiii",$_POST['propertyType'],$bt,$bt,$st,$st, $aid);
			}
			
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateOwnerBoughtInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("update user_address set bought_by_you=? where id=?"); 
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateOwnerAllowedtoRentInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("update user_address set bought_rent_allowed=? where id=?"); 
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateRentContractInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("update user_address set rent_contract_on_you=?,allowed_to_rent_out=? where id=?"); 
			$stmt->bind_param("iii",$_POST['updateInfo'],$_POST['updateInfo'], $aid);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateAddressOwnerInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("update user_address set ownership_updated=1 where id=?"); 
			$stmt->bind_param("i",$aid);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateRentContractRentInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("update user_address set allowed_to_rent_out=? where id=?"); 
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function publishApartmentonChannel($data)
		{
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$_POST['aid']);
			$stmt = $dbCon->prepare("update user_address set is_published=1 where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1; 
		}
		function updateOtherRoomInfo($data)
		{ 
			
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$_POST['aid']);
			$stmt = $dbCon->prepare("select * from user_apartment_other_room_detail where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc(); 
			if($_POST['id']==1)
			{
				if($row['hall_room_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update user_apartment_other_room_detail set hall_room_available=? where apartment_id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();			
			}
			else if($_POST['id']==2)
			{
				if($row['living_room_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update user_apartment_other_room_detail set living_room_available=? where apartment_id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();			
			}
			else if($_POST['id']==3)
			{
				if($row['work_room_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update user_apartment_other_room_detail set work_room_available=? where apartment_id=?");	
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			}
			else if($_POST['id']==4)
			{
				if($row['hobby_room_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update user_apartment_other_room_detail set hobby_room_available=? where apartment_id=?");	
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			}
			else if($_POST['id']==5)
			{
			if($row['sal_room_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update user_apartment_other_room_detail set sal_room_available=? where apartment_id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			}
			else if($_POST['id']==6)
			{
			if($row['salon_room_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update user_apartment_other_room_detail set salon_room_available=? where apartment_id=?");	
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			}
			else if($_POST['id']==7)
			{
			if($row['vestibule_room_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update user_apartment_other_room_detail set vestibule_room_available=? where apartment_id=?");	
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			}
			else if($_POST['id']==8)
			{
			if($row['dining_room_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update user_apartment_other_room_detail set dining_room_available=? where apartment_id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();			
			}
			else if($_POST['id']==9) 
			{
				if($row['chamber_room_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update user_apartment_other_room_detail set chamber_room_available=? where apartment_id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			}
			else if($_POST['id']==10)
			{
				if($row['balcony_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update user_apartment_other_room_detail set balcony_available=? where apartment_id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			$stmt = $dbCon->prepare("update user_apartment_amenity_category_info set is_selected=? where category_id=5 and apartment_id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'],$aid);
			$stmt->execute();	
			}
			else if($_POST['id']==11)
			{
				if($row['terrace_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update user_apartment_other_room_detail set terrace_available=? where apartment_id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			}
			else if($_POST['id']==12)
			{
				if($row['storage_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update user_apartment_other_room_detail set storage_available=? where apartment_id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			if(($row['waste_room_available']+$row['stroller_available']+$row['bicycle_available']+$_POST['updateInfo'])==0)
			{
			$stmt = $dbCon->prepare("update user_apartment_amenity_category_info set is_selected=0 where category_id=6 and apartment_id=?");
			$stmt->bind_param("i",$aid);
			$stmt->execute();
			}
			else
			{
			$stmt = $dbCon->prepare("update user_apartment_amenity_category_info set is_selected=1 where category_id=6 and apartment_id=?");
			$stmt->bind_param("i",$aid);
			$stmt->execute();
			}
			}
			else if($_POST['id']==13)
			{
				if($row['basement_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update user_apartment_other_room_detail set basement_available=? where apartment_id=?");	
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			$stmt = $dbCon->prepare("update user_apartment_amenity_category_info set is_selected=? where category_id=7 and apartment_id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'],$aid);
			$stmt->execute();	
			}
			else if($_POST['id']==14)
			{
				if($row['garage_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update user_apartment_other_room_detail set garage_available=? where apartment_id=?");	
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			$stmt = $dbCon->prepare("update user_apartment_amenity_category_info set is_selected=? where category_id=8 and apartment_id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'],$aid);
			$stmt->execute();	
			}
			
			else if($_POST['id']==15)
			{
				if($row['kitchen_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update user_apartment_other_room_detail set kitchen_available=? where apartment_id=?");	
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update user_apartment_amenity_category_info set is_selected=? where category_id=3 and apartment_id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'],$aid);
			$stmt->execute();
				
			}
			else if($_POST['id']==16)
			{
				if($row['entrance_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update user_apartment_other_room_detail set entrance_available=? where apartment_id=?");	
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update user_apartment_amenity_category_info set is_selected=? where category_id=4 and apartment_id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'],$aid);
			$stmt->execute();			
			}
			else if($_POST['id']==17)
			{
				if($row['bicycle_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update user_apartment_other_room_detail set bicycle_available=? where apartment_id=?");	
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			
			if(($row['waste_room_available']+$row['stroller_available']+$row['storage_available']+$_POST['updateInfo'])==0)
			{
			$stmt = $dbCon->prepare("update user_apartment_amenity_category_info set is_selected=0 where category_id=6 and apartment_id=?");
			$stmt->bind_param("i",$aid);
			$stmt->execute();
			}
			else
			{
			$stmt = $dbCon->prepare("update user_apartment_amenity_category_info set is_selected=1 where category_id=6 and apartment_id=?");
			$stmt->bind_param("i",$aid);
			$stmt->execute();
			}
			}
			
			else if($_POST['id']==18)
			{
				if($row['waste_room_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update user_apartment_other_room_detail set waste_room_available=? where apartment_id=?");	
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			if(($row['bicycle_available']+$row['stroller_available']+$row['storage_available']+$_POST['updateInfo'])==0)
			{
			$stmt = $dbCon->prepare("update user_apartment_amenity_category_info set is_selected=0 where category_id=6 and apartment_id=?");
			$stmt->bind_param("i",$aid);
			$stmt->execute();
			}
			else
			{
			$stmt = $dbCon->prepare("update user_apartment_amenity_category_info set is_selected=1 where category_id=6 and apartment_id=?");
			$stmt->bind_param("i",$aid);
			$stmt->execute();
			}	
			}
			
			else if($_POST['id']==19)
			{
				if($row['stroller_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update user_apartment_other_room_detail set stroller_available=? where apartment_id=?");	
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			if(($row['waste_room_available']+$row['bicycle_available']+$row['storage_available']+$_POST['updateInfo'])==0)
			{
			$stmt = $dbCon->prepare("update user_apartment_amenity_category_info set is_selected=0 where category_id=6 and apartment_id=?");
			$stmt->bind_param("i",$aid);
			$stmt->execute();
			}
			else
			{
			$stmt = $dbCon->prepare("update user_apartment_amenity_category_info set is_selected=1 where category_id=6 and apartment_id=?");
			$stmt->bind_param("i",$aid);
			$stmt->execute();
			}	
			}
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function OtherRoomInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("update user_address set other_room_updated=1 where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_other_room_detail where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("insert into user_apartment_other_room_detail (apartment_id) values (?)");
			$stmt->bind_param("i", $aid);
			$stmt->execute();	
			}
			$stmt = $dbCon->prepare("select * from user_apartment_other_room_detail where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		
		
		
		function updateAvailableGetstarted($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$_POST['gid']);
			 
			$stmt = $dbCon->prepare("update user_apartment_get_started_description set is_available=? where id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function updateGetStartedDescription($data)
		{ 
		 
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['gid']);
			 
			$stmt = $dbCon->prepare("update user_apartment_get_started_description set get_started_description=? where id=?");
			$stmt->bind_param("si",$_POST['propertyNickname'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateGetstartedCode($data)
		{ 
		 
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['gid']);
			 
			$stmt = $dbCon->prepare("update user_apartment_get_started_description set getstarted_code=? where id=?");
			$stmt->bind_param("si",$_POST['propertyNickname'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateGetstartedPassword($data)
		{ 
		 
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['gid']);
			 
			$stmt = $dbCon->prepare("update user_apartment_get_started_description set getstarted_password=? where id=?");
			$stmt->bind_param("si",$_POST['propertyNickname'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function getsratedDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select * from user_apartment_get_started where id not in (select user_apartment_get_started_id from user_apartment_get_started_description where user_address_id=?)");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into user_apartment_get_started_description (user_address_id, user_apartment_get_started_id) values (?,?)");
			$stmt->bind_param("ii", $aid,$row['id']);
			$stmt->execute();	
			}
			
			
			$stmt = $dbCon->prepare("select is_updated,user_apartment_get_started_description.id,get_started_title,user_apartment_get_started_id,is_available,getstarted_code,getstarted_password from user_apartment_get_started_description left join user_apartment_get_started on user_apartment_get_started.id=user_apartment_get_started_description.user_apartment_get_started_id where user_address_id=?");
			$stmt->bind_param("i", $aid);
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
		
		function getStartedUpdateCount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select * from user_apartment_get_started where id not in (select user_apartment_get_started_id from user_apartment_get_started_description where user_address_id=?)");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into user_apartment_get_started_description (user_address_id, user_apartment_get_started_id) values (?,?)");
			$stmt->bind_param("ii", $aid,$row['id']);
			$stmt->execute();	
			}
			
			
			$stmt = $dbCon->prepare("select sum(is_updated) as total_updated  from user_apartment_get_started_description  where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['total_updated'];	
		}
		
		
		
		function selectedGetSratedDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['gid']);
			$stmt = $dbCon->prepare("update user_apartment_get_started_description set is_updated=1 where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$stmt = $dbCon->prepare("select user_apartment_get_started_description.id,user_apartment_get_started_id,get_started_title,get_started_description,is_available,getstarted_code,getstarted_password,user_address_id from user_apartment_get_started_description left join user_apartment_get_started on user_apartment_get_started.id=user_apartment_get_started_description.user_apartment_get_started_id where user_apartment_get_started_description.id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['user_address_id']);
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		
		function updateGetStartedPhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['gid']);
			$data1 = strip_tags($_POST['update_info']);
			define('UPLOAD_DIR','../estorecss/'); 
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			
			$stmt = $dbCon->prepare("select count(user_apartment_get_started_description_id) as num from user_apartment_get_started_description_images where user_apartment_get_started_description_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$snumber=$row['num']+1;
			
			$stmt = $dbCon->prepare("insert into user_apartment_get_started_description_images (get_started_image_path,user_apartment_get_started_description_id,sorting_number) values(?, ?, ?)");
			$stmt->bind_param("sii",$img_name1, $aid,$snumber);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function getGetStartedImageInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['gid']);
			 $stmt = $dbCon->prepare("select get_started_image_path,sorting_number,id from user_apartment_get_started_description_images where id=? ");
			$stmt->bind_param("i", $_POST['update_info']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$row1 = $result1->fetch_assoc();
				 
			
				
				 $filename="../estorecss/".$row1 ['get_started_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['get_started_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['get_started_image_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org='<a class="lightbox__img-nav false"></a><img class="lightbox__img" src="../../../'.$image.'">'; 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function updateGetStartedPhotoOrder($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['gid']);
			
			$stmt = $dbCon->prepare("select sorting_number from user_apartment_get_started_description_images where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$newSort=$row['sorting_number']+$_POST['addDelete'];
			
			
			$stmt = $dbCon->prepare("select id from user_apartment_get_started_description_images where sorting_number=? and user_apartment_get_started_description_id=?");
			$stmt->bind_param("ii", $newSort,$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();	
			
			$stmt = $dbCon->prepare("update user_apartment_get_started_description_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row['sorting_number'], $row1['id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("update user_apartment_get_started_description_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $_POST['photoId']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function deleteGetStartedPhoto($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['gid']);
			
			$stmt = $dbCon->prepare("select sorting_number from user_apartment_get_started_description_images where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("delete from  user_apartment_get_started_description_images where id=?");
			$stmt->bind_param("i",$_POST['photoId']);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select id,sorting_number from user_apartment_get_started_description_images where sorting_number>? and user_apartment_get_started_description_id=?");
			$stmt->bind_param("ii", $row['sorting_number'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row1 = $result->fetch_assoc())	
			{
				$newSort=$row1['sorting_number']-1;
			$stmt = $dbCon->prepare("update user_apartment_get_started_description_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $row1['id']);
			$stmt->execute();		
			}
			 
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateGetStartedPhotoDragging($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['gid']);
			
			$stmt = $dbCon->prepare("select sorting_number from user_apartment_get_started_description_images where id=?");
			$stmt->bind_param("i", $_POST['draggedItem']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select sorting_number from user_apartment_get_started_description_images where id=?");
			$stmt->bind_param("i", $_POST['draggedTarget']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();
			 
			if($row1['sorting_number']>$row['sorting_number'])
			{
			$stmt = $dbCon->prepare("select id,sorting_number from user_apartment_get_started_description_images where sorting_number>? and id<=? and user_apartment_get_started_description_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
			$newSort=$rowUpdate['sorting_number']-1;
			$stmt = $dbCon->prepare("update user_apartment_get_started_description_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			else
			{
			$stmt = $dbCon->prepare("select id,sorting_number from user_apartment_get_started_description_images where sorting_number<? and id>=? and user_apartment_get_started_description_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
				$newSort=$rowUpdate['sorting_number']+1;
			$stmt = $dbCon->prepare("update user_apartment_get_started_description_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			
			$stmt = $dbCon->prepare("update user_apartment_get_started_description_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row1['sorting_number'], $_POST['draggedItem']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function displayGetStartedPhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['gid']);
			
			$stmt = $dbCon->prepare("select count(user_apartment_get_started_description_id) as num from user_apartment_get_started_description_images where user_apartment_get_started_description_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select get_started_image_path,sorting_number,id from user_apartment_get_started_description_images where user_apartment_get_started_description_id=? order by sorting_number ");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$i=1;
			$org='';
			if($row['num']==1)
			{
				$first="hidden";
				$last="hidden";
			}
			else
			{
			$first="hidden";
			$last="";	
			}
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			while($row1 = $result1->fetch_assoc())
			{
				 
				if($i==$row['num'])
				{
				$last="hidden";	
				}
				
				 $filename="../estorecss/".$row1 ['get_started_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['get_started_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['get_started_image_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org=$org.'<div class="target-indicator padtb10" id="'.$row1['id'].'" ondrop="drop(event)" ondragover="allowDrop(event)"></div>

						<div class="drag-drop__wrapper " draggable="true" id="drag_'.$row1['id'].'" ondragstart="drag(event,'.$row1['id'].')">
																<div class="photo-tile">
																   <div class="handlebar ">
																	  <div class="handlebar__row handlebar__top">
																		<a href="javascript:void(0);" onclick="updatePhotoDecrement('.$row1['id'].');"> <div class="handlebar__cell handlebar__arrow '.$first.' grabbable"><i class="fas fa-chevron-up fsz16"></i></div>
																	  </div></a>
																	  <div class="handlebar__row handlebar__middle">
																		 <div class="handlebar__cell handlebar__grip grabbable"> </div>
																	  </div>
																	  <div class="handlebar__row handlebar__bottom">
																		<a href="javascript:void(0);" onclick="updatePhotoOrderIncreament('.$row1['id'].');"><div class="handlebar__cell handlebar__arrow '.$last.'" tabindex="0" aria-label="Move down"><i class="fas fa-chevron-down fsz16"></i></div></a>
																	  </div>
																   </div>
																   <div class="photo-tile__body">
																	  <img class="photo-tile__image" src="../../../'.$image.'" alt="Photo 1">
																	  <div class="photo-tile__content">
																		 <div class="photo-tile__tags xs-tall">
																			<div class="photo-tile__tags__properties"><span class="tag tag--standard tag--success white_txt padrl5">High resolution</span><span class="tag tag--standard tag--neutral padrl5 lgtgrey2_bg">Landscape</span></div>
																			<div class="photo-tile__tags__labels"></div>
																		 </div>
																		 <div class="photo-tile__actions">
																		<a href="javascript:void(0);" class="xsi-mart0 show_popup_modal" data-target="#gratis_popup_error" onclick="getImageInfo('.$row1['id'].');">	<button color="#444444" label="View photo" aria-label="View photo" class="merlin-button css-12d2atf">
																			   <div class="merlin-button__content">View</div>
																			</button></a>
																			<a href="javascript:void(0);" tabindex="0" onclick="deletePhoto('.$row1['id'].');">Delete</a>
																		 </div>
																	  </div>
																   </div>
																</div>
															 </div>';
															 $first="";
															 $i++;
			}	
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		
		
		 function workingHrs()
		{
			$dbCon = AppModel::createConnection();
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
	
		function updateApartmentWifi($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			if($_POST['wifi_available']==1)
			{
			$_POST['wifi_username']=html_entity_decode(htmlentities($_POST['wifi_username'],ENT_NOQUOTES, 'ISO-8859-1'));	
			}
			else
			{
				$_POST['wifi_username']='';
				$_POST['wifi_password']='';
			}
			$stmt = $dbCon->prepare("update user_address set wi_fi_updated=1,wifi_available=?,wifi_username=?,wifi_password=? where id=?");
			$stmt->bind_param("issi",$_POST['wifi_available'],$_POST['wifi_username'],$_POST['wifi_password'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateApartmentHouseRules($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			if($_POST['food1']==0)
			{
			$_POST['day1']=0;	
			$_POST['day2']=0;	
			$_POST['quite_hrs_mon_fri_open']=0;	
			$_POST['quite_hrs_mon_fri_close']=0;
			$_POST['quite_hrs_sat_sun_open']=0;	
			$_POST['quite_hrs_sat_sun_close']=0;
			}
			
			if($_POST['day1']==0)
			{
			$_POST['day1']=0;	
			$_POST['quite_hrs_mon_fri_open']=0;	
			$_POST['quite_hrs_mon_fri_close']=0;
			}
			
			if($_POST['day2']==0)
			{
			$_POST['day2']=0;	
			$_POST['quite_hrs_sat_sun_open']=0;	
			$_POST['quite_hrs_sat_sun_close']=0;
			}
			 
			$stmt = $dbCon->prepare("update user_address set house_rules_updated=1,quite_hrs=?,quite_hrs_mon_fri=?,quite_hrs_mon_fri_open=?,quite_hrs_mon_fri_close=?,quite_hrs_sat_sun=?,quite_hrs_sat_sun_open=?,quite_hrs_sat_sun_close=? where id=?");
			$stmt->bind_param("iississi",$_POST['food1'],$_POST['day1'],$_POST['quite_hrs_mon_fri_open'],$_POST['quite_hrs_mon_fri_close'],$_POST['day2'],$_POST['quite_hrs_sat_sun_open'],$_POST['quite_hrs_sat_sun_close'],$aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function getDates()
		{
			$d=cal_days_in_month(CAL_GREGORIAN,$_POST['month'],$_POST['year']);
			$org='<option value="0" class="lgtgrey2_bg" >Select</option>';
			for($i=1;$i<=$d;$i++)
			{
			$org=$org.'<option value="'.$i.'" class="lgtgrey2_bg" >'.$i.'</option>';	
			}				
			return $org;
		}
		
		function verifyOtpDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select otp_verification  from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if($row['otp_verification']==$_POST['otp'])
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
		function checkMobileNumber($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(user_profiles.id) as num  from user_profiles left join user_logins on user_logins.id=user_profiles.user_logins_id where country_of_residence=? and phone_number=? and user_profiles.user_logins_id!=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("isi",$_POST['pass_country'], $_POST['p_number'],$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select count(id) as num  from user_visiting_countries where country_info=? and phone_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is",$_POST['pass_country'], $_POST['p_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select country_code  from phone_country_code where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['pass_country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$phone="+".trim($row['country_code'])."".trim($_POST['p_number']);
			$num=(mt_rand(1111,9999)); 
			$subject='Your one time password(OTP) is:'.$num;
			$to=$phone;
			$html='Ditt engångslösenord:'.$num;
			$res=sendSms($subject, $to, $html);
			$rs=json_decode($res,true);
			 
			if($rs['status']=='OK')
			{
				$stmt = $dbCon->prepare("update user_logins set otp_verification=? where id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("ii", $num,$data['user_id']);
				$stmt->execute();
				$id=$stmt->insert_id;
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
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			}
			else 
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		}
		
		
		function updateCountry($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select phone_number  from user_profiles  where user_profiles.user_logins_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select *  from user_identification  where user_id=? and identification_type=3");
			/* bind parameters for markers */
			$stmt->bind_param("i",$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowIdentificator = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update user_visiting_countries set `identificator_type`=?, `id_number`  =?, `issue_month`  =?, `issue_year`  =?, `expiry_month`  =?, `expiry_year`  =?, `front_image_path`  =?, `back_image_path`=?,phone_number=?,`issue_date`  =?,`expiry_date`  =? where current_country=1 and user_login_id=?");
			$stmt->bind_param("issssssssssi",$rowIdentificator['identification_type'],$rowIdentificator['identity_number'],$rowIdentificator['issue_month'],$rowIdentificator['issue_year'],$rowIdentificator['expiry_month'],$rowIdentificator['expiry_year'],$rowIdentificator['front_image_path'],$rowIdentificator['back_image_path'],$row['phone_number'],$rowIdentificator['issue_date'],$rowIdentificator['expiry_date'],$data['user_id']);
			$stmt->execute();
			 
			$stmt = $dbCon->prepare("select *  from user_visiting_countries  where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",$_POST['update_info']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowIdentificator = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update user_identification set `identification_type`=?, `identity_number`  =?, `issue_date`  =?, `issue_year`  =?, `expiry_date`  =?, `expiry_year`  =?, `front_image_path`  =?, `back_image_path`=?,issue_month=?,expiry_month=? where user_id=? and identification_type=3");
			$stmt->bind_param("isssssssssi",$rowIdentificator['identificator_type'],$rowIdentificator['id_number'],$rowIdentificator['issue_date'],$rowIdentificator['issue_year'],$rowIdentificator['expiry_date'],$rowIdentificator['expiry_year'],$rowIdentificator['front_image_path'],$rowIdentificator['back_image_path'],$rowIdentificator['issue_month'],$rowIdentificator['expiry_month'],$data['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update user_logins set country_of_residence=? where id=?");
			$stmt->bind_param("ii",$rowIdentificator['country_info'],$data['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update user_profiles  set phone_number=? where user_profiles.user_logins_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("si",$rowIdentificator['phone_number'],$data['user_id']);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("update user_visiting_countries set current_country=0 where user_login_id=?");
			$stmt->bind_param("i",$data['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update user_visiting_countries set current_country=1 where id=?");
			$stmt->bind_param("i",$_POST['update_info']);
			$stmt->execute();
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_of_residence from user_logins where id=?)  and app_id=51");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $this -> encrypt_decrypt('encrypt',$row['id']);;
		}
		
		function appdownloadStatus($data)
		{
			$dbCon = AppModel::createConnection();
			$app_id= 51;
			$stmt = $dbCon->prepare("select * from user_app_download where permission_id=(select id from manage_apps_permission where country_id=(select country_of_residence from user_logins where id=?) and app_id=?) and user_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iii", $data['user_id'],$app_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if(empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return 0;	
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			
			}
		
		function appId()
			{
				
				return $this -> encrypt_decrypt('encrypt',51);
			}
		function profileStatus($data)
		{
			$dbCon = AppModel::createConnection();
			$value=1;
			$stmt = $dbCon->prepare("select count(id) as num from user_cards where user_login_id = ?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			 $value=1;	
			}
			else
			{
			$stmt = $dbCon->prepare("select is_id_active,invoice_address_required,delivery_address_required from user_profiles where user_logins_id = ?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			
			$stmt = $dbCon->prepare("select count(id) as num from user_address where user_id = ?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAdd    = $result->fetch_assoc();	
			
			if($rowId['delivery_address_required']==0 && $rowAdd['num']==0)
			{
			 $value=1;
			}
			else
			{
			$stmt = $dbCon->prepare("select count(id) as num from user_identification where user_id = ?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			 $value=2;
			}
			else
			{
				$value=3;
			}
			}
			}
		
			$stmt->close();
			$dbCon->close();
			return $value;
		}
		
		
		function amenitiesDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select user_apartment_amenities_category_detail.id,amenity_category_id,amenitiy_category,amenity_count from user_apartment_amenities_category_detail left join apartment_amenitiy_category on apartment_amenitiy_category.id=user_apartment_amenities_category_detail.amenity_category_id where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$j++;
				$org=$org.' <div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile'.$j.'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold"><div class="dflex wi_100">
									<div class="wi_70 dflex">
								<span class="css-p2kctj"><img src="https://www.qloudid.com/html/usercontent/images/kitchen'.$j.'.svg" class="css-z0f999"></span> 
								<div>
								<span class="apartheading">'.$row['amenitiy_category'].'</span><span class="aprtSubheading">'.$row['amenity_count'].' amenities selected</span>
								</div>
								</div> 
									<div class="wi_30 padt10">
															<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span>
									</div> 
									</div></a></div>
								<div id="profile'.$j.'" class=" " style="display: block;">	
										 
									  <div class="css-2998cc fleft padb20">
									<a href="javascript:void(0);" onclick="updateCategoryAmenities('.$row['id'].')"> <button color="#444444" data-testid="Kitchen-amenity-section-select-all" class="merlin-button css-7wfern" aria-label=""><div class="merlin-button__content">Select all</div></button></a>
									  </div>
									  
									   <div class="clear"></div>
											<div id="'.$row['amenity_category_id'].'">';
		 	$stmt = $dbCon->prepare("select amenity_id,subcategory_id,is_selected,user_apartment_amenities_detail.id, user_apartment_amenities_detail.subcategory_available, amenity_name from user_apartment_amenities_detail left join apartment_amenities on apartment_amenities.id=user_apartment_amenities_detail.amenity_id left join user_apartment_amenities_subcategory on user_apartment_amenities_subcategory.user_apartment_amenity_id=user_apartment_amenities_detail.id where user_amenitiy_category_id=?");
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			while($row1 = $result1->fetch_assoc())
			{
				 
				if($row1['is_selected']==1)
				{
					$checked='checked';
					$update=0;
				}
				else
				{
					$checked='';
					$update=1;
				}
				$org=$org.' <div data-testid="'.$row1['amenity_name'].'-amenity-item" class="css-39yi7y"><div class="css-nj7s2c"><label for="oven" class="css-14q70q0">'.$row1['amenity_name'].'</label><div class="css-1sjqbna">
				<a href="javascript:void(0);" onclick="updateAminity('.$row1['id'].','.$update.');"><input data-testid="test-checkbox-'.$row1['amenity_name'].'" name="'.$row1['amenity_name'].'" type="checkbox" class="css-1lgzhz8" '.$checked.'></a>
				</div></div>';
				
				if($row1['subcategory_available']==1 && $row1['is_selected']==1)
				{
					$stmt = $dbCon->prepare("select * from amenities_subcategory where amenities_id=?");
					$stmt->bind_param("i", $row1['amenity_id']);
					$stmt->execute();
					$resultSubAvailable = $stmt->get_result();
					$option='';
					while($rowAvailable = $resultSubAvailable->fetch_assoc())
					{
						  
						if($row1['subcategory_id']==$rowAvailable['id'])
						{
							$option=$option.'<option value="'.$rowAvailable['id'].'" selected>'.$rowAvailable['amenities_subcategory_info'].'</option>';
						}
						else
						{
							$option=$option.'<option value="'.$rowAvailable['id'].'" >'.$rowAvailable['amenities_subcategory_info'].'</option>';
						}
						 
						
					}
					$org=$org.'<div class="css-11e5cyp">
					<select id="'.$row1['amenity_name'].'-amenity-select" data-testid="'.$row1['amenity_name'].'-amenity-select" class="css-bnguuq dropdown-bg" onchange="updateSubcategory('.$row1['id'].',this.value);">
					'.$option.'
					</select>
					</div> ';	
				}
				
				$org=$org.'</div>';	
			}			
											
			$org=$org.'</div> </div> </div> ';
			 
			}
			  
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		function updateSubcategory($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 $stmt = $dbCon->prepare("update user_apartment_amenities_subcategory set subcategory_id=?,modified_on=now() where user_apartment_amenity_id=?");
			$stmt->bind_param("ii",$_POST['subcategory_info'], $_POST['user_amenity_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateAminity($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			
			
			$stmt = $dbCon->prepare("select amenity_count  from user_apartment_amenities_category_detail where id=(select user_amenitiy_category_id from user_apartment_amenities_detail where id=?)");
			$stmt->bind_param("i",$_POST['user_amenity_id']);
			$stmt->execute();
			$resultSub = $stmt->get_result();	
			$rowCount= $resultSub->fetch_assoc();
			
			if($_POST['update_info']==1)
			{
			$stmt = $dbCon->prepare("update user_apartment_amenities_detail set is_selected=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $_POST['user_amenity_id']);
			$stmt->execute();	
				
			$stmt = $dbCon->prepare("select id  from amenities_subcategory where amenities_id=(select amenity_id from user_apartment_amenities_detail where id=?)");
			$stmt->bind_param("i",$_POST['user_amenity_id']);
			$stmt->execute();
			$resultSub = $stmt->get_result();	
			$rowSub= $resultSub->fetch_assoc();	
			
			$stmt = $dbCon->prepare("update user_apartment_amenities_subcategory set subcategory_id=?,is_available=?,modified_on=now() where user_apartment_amenity_id=?");
			$stmt->bind_param("iii",$rowSub['id'],$_POST['subcategory_info'], $_POST['user_amenity_id']);
			$stmt->execute();
			
			$newCount=$rowCount['amenity_count']+1;
			$stmt = $dbCon->prepare("update user_apartment_amenities_category_detail set amenity_count=? where id=(select user_amenitiy_category_id from user_apartment_amenities_detail where id=?)");
			$stmt->bind_param("ii",$newCount,$_POST['user_amenity_id']);
			$stmt->execute(); 
			}
			else
			{
			$stmt = $dbCon->prepare("select sum(amenity_count) total  from user_apartment_amenities_category_detail where user_address_id=?");
			$stmt->bind_param("i",$aid);
			$stmt->execute();
			$resultSub = $stmt->get_result();	
			$rowTotal= $resultSub->fetch_assoc();	
			if($rowTotal['total']==3)
			{
			$stmt->close();
			$dbCon->close();
			return 0;	
			}	
			$stmt = $dbCon->prepare("update user_apartment_amenities_detail set is_selected=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $_POST['user_amenity_id']);
			$stmt->execute();	
			$stmt = $dbCon->prepare("update user_apartment_amenities_subcategory set is_available=?,modified_on=now() where user_apartment_amenity_id=?");
			$stmt->bind_param("ii",$_POST['subcategory_info'], $_POST['user_amenity_id']);
			$stmt->execute();
			$newCount=$rowCount['amenity_count']-1;
			$stmt = $dbCon->prepare("update user_apartment_amenities_category_detail set amenity_count=? where id=(select user_amenitiy_category_id from user_apartment_amenities_detail where id=?)");
			$stmt->bind_param("ii",$newCount,$_POST['user_amenity_id']);
			$stmt->execute();
			}
			
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updatePropertyType($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update user_address set property_type=? where id=?");
			$stmt->bind_param("ii",$_POST['propertyType'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateApartmentNumber($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select * from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select count(id) as num from user_address where address=? and port_number=? and apartment_number=?");
			$stmt->bind_param("sss", $row['address'], $row['port_number'], $_POST['propertyType']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row2 = $result->fetch_assoc();
			
			if($row2['num']==0)
			{
			$stmt = $dbCon->prepare("update user_address set apartment_number=? where id=?");
			$stmt->bind_param("si",$_POST['propertyType'], $aid);
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
		
		function updateArea($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			/* if($_POST['updateInfo']==1)
			 {
				$data['property_layout']=$data['property_layout']+5; 
			 }
			 else
			 {
				 if($data['property_layout']>1)
				 {
					 $data['property_layout']=$data['property_layout']-5;
				 }
			 }*/
			$stmt = $dbCon->prepare("update user_address set property_layout=? where id=?");
			$stmt->bind_param("di",$_POST['updateInfo'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return $data['property_layout'];
		}
		
		function updateApartmentFloor($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			/* if($_POST['updateInfo']==1)
			 {
				$data['property_layout']=$data['property_layout']+5; 
			 }
			 else
			 {
				 if($data['property_layout']>1)
				 {
					 $data['property_layout']=$data['property_layout']-5;
				 }
			 }*/
			$stmt = $dbCon->prepare("update user_address set apartment_floor=? where id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return $data['property_layout'];
		}
		function updateFloors($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			/* if($_POST['updateInfo']==1)
			 {
				$data['floors_available']=$data['floors_available']+1; 
			 }
			 else
			 {
				 if($data['floors_available']>1)
				 {
					 $data['floors_available']=$data['floors_available']-1;
				 }
			 }*/
			$stmt = $dbCon->prepare("update user_address set floors_available=? where id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return $data['floors_available'];
		}
		

		function updateContractLenght($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 if($_POST['updateInfo']==1)
			 {
				 if($data['contract_length']<12)
				 {
				$data['contract_length']=$data['contract_length']+1;	 
				 }
				 else
				 {
					 $data['contract_length']=12;
				 }
			 }
			 else
			 {
				 if($data['contract_length']>1)
				 {
					 $data['contract_length']=$data['contract_length']-1;
				 }
			 }
			$stmt = $dbCon->prepare("update user_address set contract_length=? where id=?");
			$stmt->bind_param("ii",$data['contract_length'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return $data['contract_length'];
		}
		
		
		
		function updateSecurityLength($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 if($_POST['update_info']==1)
			 {
				 
				 if($data['security_fee_months']<$data['contract_length'])
				 {
				 
				$data['security_fee_months']=$data['security_fee_months']+1;	 
				 }
				  
			 }
			 else
			 {
				 if($data['contract_length']>1)
				 {
					 $data['security_fee_months']=$data['security_fee_months']-1;
				 }
			 }
			$stmt = $dbCon->prepare("update user_address set security_fee_months=? where id=?");
			$stmt->bind_param("ii",$data['security_fee_months'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return $data['security_fee_months'];
		}
		
		function updatePrivateDoor($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update user_address set private_entrance=? where id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateElevator($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update user_address set elevator=? where id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateEntrance($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			/* if($_POST['updateInfo']==1)
			 {
				$data['entrance_floor']=$data['entrance_floor']+1; 
			 }
			 else
			 {
				 if($data['entrance_floor']>0)
				 {
					 $data['entrance_floor']=$data['entrance_floor']-1;
				 }
			 }*/
			$stmt = $dbCon->prepare("update user_address set entrance_floor=? where id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();	
			if($data['entrance_floor']==0)
			{
				$result='Ground';
			}	
			else if($data['entrance_floor']==1)
			{
				$result='1st';
			}
			else if($data['entrance_floor']==2)
			{
				$result='2nd';
			}	
			else if($data['entrance_floor']==3)
			{
				$result='3rd';
			}	
			else 
			{
				$result=$data['entrance_floor'].'th';
			}	
			$stmt->close();
			$dbCon->close();
			return $result;
		}
		
		
		function updateCategoryAmenities($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("update user_apartment_amenities_detail set is_selected=1,modified_on=now() where user_amenitiy_category_id=?");
			$stmt->bind_param("i", $_POST['user_amenity_category_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select count(id) as num  from user_apartment_amenities_detail where user_amenitiy_category_id=?");
			$stmt->bind_param("i",$_POST['user_amenity_category_id']);
			$stmt->execute();
			$resultSub1 = $stmt->get_result();
			$rowCount= $resultSub1->fetch_assoc();
			
			$stmt = $dbCon->prepare("update user_apartment_amenities_category_detail set amenity_count=? where id=?");
			$stmt->bind_param("ii",$rowCount['num'],$_POST['user_amenity_category_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select id,amenity_id  from user_apartment_amenities_detail where user_amenitiy_category_id=? and subcategory_available=1");
			$stmt->bind_param("i",$_POST['user_amenity_category_id']);
			$stmt->execute();
			$resultSub1 = $stmt->get_result();	
			while($rowSub1= $resultSub1->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select id  from amenities_subcategory where amenities_id=?");
			$stmt->bind_param("i",$rowSub1['amenity_id']);
			$stmt->execute();
			$resultSub = $stmt->get_result();	
			$rowSub= $resultSub->fetch_assoc();	
			
			$stmt = $dbCon->prepare("update user_apartment_amenities_subcategory set subcategory_id=?,is_available=1,modified_on=now() where user_apartment_amenity_id=?");
			$stmt->bind_param("ii",$rowSub['id'], $rowSub1['id']);
			$stmt->execute();	
			}				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		
		function connectApp($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $id=$this -> encrypt_decrypt('encrypt',$data['certi_id']);
			$stmt = $dbCon->prepare("update user_certificates set is_connected=1 where id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		function checkConnection($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$id=$this -> encrypt_decrypt('decrypt',$data['certi_id']); 
			//echo $id;
			$stmt = $dbCon->prepare("select is_connected from user_certificates where id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row['is_connected'];	
		}
		
		function certificateCount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select count(id) as num from user_certificates where user_id=? and is_valid=1");
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		
		function certificateConnectCount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select count(id) as num from user_certificates where user_id=? and is_valid=1 and is_connected=0");
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		function certificateInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select * from user_certificates where user_id=?");
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$row['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		function addressInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select * from user_address where user_id=?");
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$row['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
				 
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		function reviewUserAddress($data)
		{
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$val=html_entity_decode(htmlentities($_POST['adrs'],ENT_NOQUOTES, 'ISO-8859-1'));
			$address=str_replace(' ', '%20',$val." ".$_POST['port_number']); 
			 
			$stmt = $dbCon->prepare("select * from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
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
			$stmt = $dbCon->prepare("update user_address set address=?,city=?,port_number=?,zipcode=?,state=? where id=?");
			$stmt->bind_param("sssssi",htmlentities($_POST['adrs'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['city'],$_POST['port_number'],$_POST['zipcode'],$_POST['city'], $aid);
			$stmt->execute();	
			if($row['is_personal_address']==1)	
			{
			$stmt = $dbCon->prepare("update user_profiles set  port_number=?, address=?, city=?,  zipcode=?  where user_logins_id=?");
				/* bind parameters for markers */
			$stmt->bind_param("ssssi", $_POST['port_number'], htmlentities($_POST['adrs'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['city'],$_POST['zipcode'],$data['user_id']);
			$stmt->execute();	
			}
			
			$stmt->close();
			$dbCon->close();
			}
			else
			{
			$stmt = $dbCon->prepare("update user_address set state=?,address=?,city=?,port_number=?,zipcode=?,latitude=?,longitude=? where id=?");
			$stmt->bind_param("sssssssi",htmlentities($response[0]['address']['state'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['adrs'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['city'],$_POST['port_number'],$_POST['zipcode'],$response[0]['lat'],$response[0]['lon'], $aid);
			$stmt->execute();	
			if($row['is_personal_address']==1)	
			{
			$stmt = $dbCon->prepare("update user_profiles set  full_address=?, port_number=?, address=?, city=?,  zipcode=?, latitude=?, langitude=?  where user_logins_id=?");
				/* bind parameters for markers */
			$stmt->bind_param("sssssssi", htmlentities($response['display_name'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['port_number'], htmlentities($_POST['adrs'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['city'],$_POST['zipcode'],$response['lat'],$response['lon'],$data['user_id']);
			$stmt->execute();
			}
			$stmt->close();
			$dbCon->close();	
			}
			
			return 1;
		}
		
	 function updateAddressCoordinates($data)
		{
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$response=json_decode($_POST['updateInfo'],true); 
			 
			$stmt = $dbCon->prepare("select * from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			  
			$stmt = $dbCon->prepare("update user_address set latitude=?,longitude=? where id=?");
			$stmt->bind_param("ssi",$response['lat'],$response['lng'], $aid);
			$stmt->execute();	
			if($row['is_personal_address']==1)	
			{
			$stmt = $dbCon->prepare("update user_profiles set   latitude=?, langitude=?  where user_logins_id=?");
				/* bind parameters for markers */
			$stmt->bind_param("ssi",$response['lat'],$response['lng'],$data['user_id']);
			$stmt->execute();
			}
			$stmt->close();
			$dbCon->close();	
			 
			
			return 1;
		}
		
	 	function updateArrival($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("select * from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($_POST['update_id']==0)
			{
				$val=strtotime($row['arrival_time'])- 60*60;
				
				$id=date('H:i',$val);
			}
			else
			{
				
				$val=strtotime($row['arrival_time'])+ 60*60;
				
				$id=date('H:i',$val);
				 
			}
			 
			$stmt = $dbCon->prepare("update user_address set arrival_time=? where id=?");
			$stmt->bind_param("si", $id,$aid);
			$stmt->execute();	
			
			 
			$stmt->close();
			$dbCon->close();
			return $id;	
		}
		
	 function updateDeparture($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("select * from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($_POST['update_id']==0)
			{
				$val=strtotime($row['departure_time'])- 60*60;
				
				$id=date('H:i',$val);
			}
			else
			{
				
				$val=strtotime($row['departure_time'])+ 60*60;
				
				$id=date('H:i',$val);
				 
			}
			 
			$stmt = $dbCon->prepare("update user_address set departure_time=? where id=?");
			$stmt->bind_param("si", $id,$aid);
			$stmt->execute();	
			
			 
			$stmt->close();
			$dbCon->close();
			return $id;	
		}
		
		function addressDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			 $stmt = $dbCon->prepare("select count(id) as num from user_apartment_pricing_info where user_address_id=?  order by pricing_start_date");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCount = $result->fetch_assoc();
			
			if($rowCount['num']>0)
			{
			$stmt = $dbCon->prepare("update user_address set pricing_updated=1 where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();	
			}
			 
			$stmt = $dbCon->prepare("select * from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			if($row['latitude']==null || $row['latitude']=='')
			{
			$address=$row['address']." ".$row['port_number'];
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
			$stmt = $dbCon->prepare("select country_name from country where id=(select country_of_residence from user_logins where id=?)");
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCountry = $result->fetch_assoc();	
			$address=$rowCountry['country_name'];
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
			 
			$stmt = $dbCon->prepare("update user_address set latitude=?,longitude=? where id=?");
			$stmt->bind_param("ssi",$response[0]['lat'],$response[0]['lon'], $aid);
			$stmt->execute();
			if($row['is_personal_address']==1)
			{
			$stmt = $dbCon->prepare("update user_profiles set latitude=?,langitude=? where user_logins_id=?");
			$stmt->bind_param("ssi",$response[0]['lat'],$response[0]['lon'], $data['user_id']);
			$stmt->execute();	
			}
			}
			else
			{
				
			$stmt = $dbCon->prepare("select country_name from country where id=(select country_of_residence from user_logins where id=?)");
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCountry = $result->fetch_assoc();	
			$address=$rowCountry['country_name'];
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
			
			$stmt = $dbCon->prepare("update user_address set latitude=?,longitude=? where id=?");
			$stmt->bind_param("ssi",$response[0]['lat'],$response[0]['lon'], $aid);
			$stmt->execute();
			if($row['is_personal_address']==1)
			{
			$stmt = $dbCon->prepare("update user_profiles set latitude=?,langitude=? where user_logins_id=?");
			$stmt->bind_param("ssi",$response[0]['lat'],$response[0]['lon'], $data['user_id']);
			$stmt->execute();	
			}
			}
			}
			
			if($row['property_heading']==null || $row['property_heading']=='')
			{
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_bedrooms where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowNum = $result->fetch_assoc();
			if($rowNum['num']==0)
			{
				$heading='Captivating 1-Bed House in '.$row['address'];
			}
			else
			{
				$heading='Captivating '.$rowNum['num'].'-Bed House in '.$row['address'];	
			}
			$stmt = $dbCon->prepare("update user_address set property_heading=? where id=?");
			$stmt->bind_param("si",$heading, $aid);
			$stmt->execute();
			}
			
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_pricing_info where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
				$pricing=0;
			}
			else
			{
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_pricing_info where user_address_id=? and is_deleted=1");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
				$pricing=1;
			}	
			else
			{
			$pricing=0;	
			}
			}
			
			
			$stmt = $dbCon->prepare("select count(user_address_id) as num from user_apartment_photos where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if($row['num']>=10)
			{
				$photo=1;
			}
			else
			{
				$photo=0;
			}
			
			$stmt = $dbCon->prepare("update user_address set arrival_departure_updated=1 where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("select * from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		
		 
		
		
		function propertyType()
		{ 
		
			$dbCon = AppModel::createConnection();
			  
			$stmt = $dbCon->prepare("select * from apartment_property_type");
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
		
		function bedroomCount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_bedrooms where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("insert into user_apartment_bedrooms (user_address_id, created_on) values (?,now())");
			$stmt->bind_param("i", $aid);
			$stmt->execute();	
			$id=$stmt->insert_id;
			$bed='Single';
			$stmt = $dbCon->prepare("insert into user_apartment_bedrooms_beds (bedroom_id,bed_info, created_on,modified_on) values (?,?,now(),now())");
			$stmt->bind_param("is", $id,$bed);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_bedrooms where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			}
			$stmt->close();
			$dbCon->close();
			return $row['num'];	
		}
		
		function updateWheelchair($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 $stmt = $dbCon->prepare("update user_apartment_bathroom_detail set is_wheelchair_accessible=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$_POST['wheel_info'], $_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateNone($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 $stmt = $dbCon->prepare("select publish_dstrict_rent,publish_dstrict_long_rent,publish_dstrict_sale, total_channels from user_address where id=?");
			 $stmt->bind_param("i", $aid);
			 $stmt->execute();
			 $result = $stmt->get_result();
			 $row = $result->fetch_assoc();
			if($row['publish_dstrict_rent']==1)
			{
			$row['total_channels']=$row['total_channels']-1;
			}
			
			if($row['publish_dstrict_long_rent']==1)
			{
			$row['total_channels']=$row['total_channels']-1;
			}
			
			if($row['publish_dstrict_sale']==1)
			{
			$row['total_channels']=$row['total_channels']-1;
			}
			 $stmt = $dbCon->prepare("update user_address set publish_dstrict_rent=0,publish_dstrict_long_rent=0,publish_dstrict_sale=0,district_rent=0,district_short_rent=0,district_long_rent=0,district_sale=0,total_channels=? where id=?");
			$stmt->bind_param("ii", $row['total_channels'],$aid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateRentInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			 $stmt = $dbCon->prepare("select publish_dstrict_rent,publish_dstrict_long_rent,publish_dstrict_sale, total_channels from user_address where id=?");
			 $stmt->bind_param("i", $aid);
			 $stmt->execute();
			 $result = $stmt->get_result();
			 $row = $result->fetch_assoc();
			
			 if($_POST['update_info']==0)
			 {
					if($row['publish_dstrict_rent']==1)
					{
					$row['total_channels']=$row['total_channels']-1;
					}
					
					if($row['publish_dstrict_long_rent']==1)
					{
					$row['total_channels']=$row['total_channels']-1;
					}
				 $stmt = $dbCon->prepare("update user_address set publish_dstrict_rent=0,publish_dstrict_long_rent=0,district_rent=0,district_short_rent=0,district_long_rent=0,total_channels=? where id=?"); 
			 }
			else
			{
				$row['total_channels']=$row['total_channels']+1;
			$stmt = $dbCon->prepare("update user_address set publish_dstrict_rent=1,publish_dstrict_long_rent=0,district_rent=1,district_short_rent=1,district_long_rent=0,total_channels=? where id=?"); 	
			}
			$stmt->bind_param("ii", $row['total_channels'],$aid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateLongRent($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 if($_POST['update_info']==0)
			 {
				
				 $stmt = $dbCon->prepare("update user_address set publish_dstrict_rent=1,publish_dstrict_long_rent=0,district_short_rent=1,district_long_rent=0 where id=?"); 
			 }
			else
			{
			$stmt = $dbCon->prepare("update user_address set publish_dstrict_rent=0,publish_dstrict_long_rent=1,district_short_rent=0,district_long_rent=1 where id=?"); 	
			}
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateSaleInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			  $stmt = $dbCon->prepare("select publish_dstrict_rent,publish_dstrict_long_rent,publish_dstrict_sale, total_channels from user_address where id=?");
			 $stmt->bind_param("i", $aid);
			 $stmt->execute();
			 $result = $stmt->get_result();
			 $row = $result->fetch_assoc();
			 
			 if($_POST['update_info']==0)
			 {
				  if($row['publish_dstrict_sale']==1)
					{
					$row['total_channels']=$row['total_channels']-1;
					}
				 $stmt = $dbCon->prepare("update user_address set publish_dstrict_sale=0,district_sale=0,total_channels=? where id=?"); 
			 }
			else
			{
				 
					$row['total_channels']=$row['total_channels']+1;
					
			$stmt = $dbCon->prepare("update user_address set publish_dstrict_sale=1,district_sale=1,total_channels=? where id=?"); 	
			}
			$stmt->bind_param("ii", $row['total_channels'],$aid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updatePrivate($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 $stmt = $dbCon->prepare("update user_apartment_bathroom_detail set is_private=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$_POST['private_info'], $_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateEnsuit($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("update user_apartment_bathroom_detail set is_ensuit=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$_POST['ensuit_info'], $_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateOverbath($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("update user_apartment_bathroom_detail set standalone_shower=?,over_bath_shower=?,modified_on=now() where id=?");
			$stmt->bind_param("iii",$_POST['standalone'],$_POST['overbath'], $_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateShower($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			if($_POST['standalone']==1)
				{
				$stmt = $dbCon->prepare("update user_apartment_bathroom_detail set shower=?,standalone_shower=?,over_bath_shower=?,modified_on=now() where id=?");
				$stmt->bind_param("iiii",$_POST['standalone'],$_POST['standalone'],$_POST['overbath'], $_POST['bathroom_id']);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;	
				}
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_bathroom_detail where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==1)
			{
				if($_POST['standalone']==1)
				{
				$stmt = $dbCon->prepare("update user_apartment_bathroom_detail set shower=?,standalone_shower=?,over_bath_shower=?,modified_on=now() where id=?");
				$stmt->bind_param("iiii",$_POST['standalone'],$_POST['standalone'],$_POST['overbath'], $_POST['bathroom_id']);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;	
				}
			$stmt = $dbCon->prepare("select bath from user_apartment_bathroom_detail where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();	
			if($row['bath']==1)
			{
			$stmt = $dbCon->prepare("update user_apartment_bathroom_detail set shower=?,standalone_shower=?,over_bath_shower=?,modified_on=now() where id=?");
			$stmt->bind_param("iiii",$_POST['standalone'],$_POST['standalone'],$_POST['overbath'], $_POST['bathroom_id']);
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
			else
			{
			$stmt = $dbCon->prepare("select count(id) as num  from user_apartment_bathroom_detail where user_address_id=? and bath=1");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();	
			if($row['num']>0)
			{
			$stmt = $dbCon->prepare("select bath,toilet_and_sink from user_apartment_bathroom_detail where id=?");
			$stmt->bind_param("i", $_POST['bathroom_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();	
			if($row['bath']==0 && $row['toilet_and_sink']==0 && $_POST['standalone']==0)
			{
			$stmt = $dbCon->prepare("delete from user_apartment_bathroom_detail where id=?");
			$stmt->bind_param("i",$_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;		
			}
			else
			{
			$stmt = $dbCon->prepare("update user_apartment_bathroom_detail set shower=?,standalone_shower=?,over_bath_shower=?,modified_on=now() where id=?");
			$stmt->bind_param("iiii",$_POST['standalone'],$_POST['standalone'],$_POST['overbath'], $_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;	
			}	
			}
			else
			{
			$stmt = $dbCon->prepare("select count(id) as num  from user_apartment_bathroom_detail where user_address_id=? and shower=1");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();	
			if($row['num']>1)
			{
			$stmt = $dbCon->prepare("select bath,toilet_and_sink from user_apartment_bathroom_detail where id=?");
			$stmt->bind_param("i", $_POST['bathroom_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();	
			if($row['bath']==0 && $row['toilet_and_sink']==0 && $_POST['standalone']==0)
			{
			$stmt = $dbCon->prepare("delete from user_apartment_bathroom_detail where id=?");
			$stmt->bind_param("i",$_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;		
			}
			else
			{
			$stmt = $dbCon->prepare("update user_apartment_bathroom_detail set shower=?,standalone_shower=?,over_bath_shower=?,modified_on=now() where id=?");
			$stmt->bind_param("iiii",$_POST['standalone'],$_POST['standalone'],$_POST['overbath'], $_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;	
			}	
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return 0;
			}
			}
			
				
			}
			
		}
		
		function updateBath($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			if($_POST['bath']==1)
			 {
				$stmt = $dbCon->prepare("update user_apartment_bathroom_detail set bath=?,modified_on=now() where id=?"); 
				$stmt->bind_param("ii",$_POST['bath'], $_POST['bathroom_id']);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;
			 }
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_bathroom_detail where user_address_id=? && (bath=1 || shower=1)");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==1)
			{
			 
			$stmt->close();
			$dbCon->close();
			return 0;	
			 	
			}
			else
			{
			$stmt = $dbCon->prepare("select bath,toilet_and_sink from user_apartment_bathroom_detail where id=?");
			$stmt->bind_param("i", $_POST['bathroom_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();	
			if($row['shower']==0 && $row['toilet_and_sink']==0 && $_POST['bath']==0)
			{
			$stmt = $dbCon->prepare("delete from user_apartment_bathroom_detail where id=?");
			$stmt->bind_param("i",$_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			
			return 1;		
			}
			else
			{
			if($_POST['bath']==0)
			{
			$stmt = $dbCon->prepare("update user_apartment_bathroom_detail set bath=?,shower=0,standalone_shower=0,over_bath_shower=0,modified_on=now() where id=?");
			}
			else
			{
			$stmt = $dbCon->prepare("update user_apartment_bathroom_detail set bath=?,modified_on=now() where id=?");	
			}
			$stmt->bind_param("ii",$_POST['bath'], $_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;	
			}
				
			}
			
		}
		
		
		function countBathDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_bathroom_detail where user_address_id=? and bath=0 and shower=0");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row['num'];	
			 
			
		}
		
		
		function updateToilet($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_bathroom_detail where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($_POST['bath']==1)	
			{
			$stmt = $dbCon->prepare("update user_apartment_bathroom_detail set toilet_and_sink=?,modified_on=now() where id=?");
			 
			$stmt->bind_param("ii",$_POST['bath'], $_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;		
			}
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_bathroom_detail where user_address_id=? and toilet_and_sink=1");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();
			if($row['num']==1)
			{
				
			$stmt->close();
			$dbCon->close();
			return 0;	
			}
			else
			{
			if(($row1['num']-1)==0)
			{
			$stmt->close();
			$dbCon->close();
			return 0;	
			}
			else
			{
			$stmt = $dbCon->prepare("select bath,shower from user_apartment_bathroom_detail where id=?");
			$stmt->bind_param("i", $_POST['bathroom_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();	
			if($row1['bath']==0 && $row1['shower']==0 && $_POST['bath']==0)	
			{
			$stmt = $dbCon->prepare("delete from  user_apartment_bathroom_detail where id=?");
			 
			$stmt->bind_param("i",$_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;		
			}
			else
			{
			$stmt = $dbCon->prepare("update user_apartment_bathroom_detail set toilet_and_sink=?,modified_on=now() where id=?");
			 
			$stmt->bind_param("ii",$_POST['bath'], $_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;	
			}
				
			}		
			}
			
		}
		
		
		function bathroomCount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_bathroom_detail where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("insert into user_apartment_bathroom_detail (user_address_id, created_on, modified_on) values (?,now(), now())");
			$stmt->bind_param("i", $aid);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_bathroom_detail where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			}
			$stmt->close();
			$dbCon->close();
			return $row['num'];	
		}
		
		
		
		function amenitiesCount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_amenities_category_detail where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select * from apartment_amenitiy_category");
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowCategory = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select count(id) as num  from apartment_amenities where amenity_category_id=?");
			$stmt->bind_param("i", $rowCategory['id']);
			$stmt->execute();
			$result2 = $stmt->get_result();	
			$rowCount= $result2->fetch_assoc();
			$stmt = $dbCon->prepare("insert into user_apartment_amenities_category_detail (amenity_category_id,amenity_count,user_address_id, created_on) values (?, ?, ?, now())");
			$stmt->bind_param("iii",$rowCategory['id'],$rowCount['num'], $aid);
			$stmt->execute();
			$id=$stmt->insert_id;
			$stmt = $dbCon->prepare("select *  from apartment_amenities where amenity_category_id=?");
			$stmt->bind_param("i", $rowCategory['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			while($rowAmenities= $result3->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into user_apartment_amenities_detail (user_amenitiy_category_id, amenity_id, created_on, modified_on, subcategory_available) values (?, ?, now(), now(), ?)");
			$stmt->bind_param("iii",$id, $rowAmenities['id'],$rowAmenities['subcategory_available']);
			$stmt->execute();
			$id1=$stmt->insert_id;
			if($rowAmenities['subcategory_available']==1)
			{
			$stmt = $dbCon->prepare("select id  from amenities_subcategory where amenities_id=?");
			$stmt->bind_param("i", $rowAmenities['id']);
			$stmt->execute();
			$resultSub = $stmt->get_result();	
			$rowSub= $resultSub->fetch_assoc();	
				
			$stmt = $dbCon->prepare("insert into user_apartment_amenities_subcategory (user_apartment_amenity_id, subcategory_id, created_on, modified_on) values (?, ?, now(), now())");
			$stmt->bind_param("ii",$id1, $rowSub['id']);
			$stmt->execute();	
			}				
			}
			
			}				
			}	
			
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		function addBathroom($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("insert into user_apartment_bathroom_detail (user_address_id, created_on, modified_on) values (?,now(), now())");
			$stmt->bind_param("i", $aid);
			$stmt->execute();	
			
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		
		function addBedroom($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("insert into user_apartment_bedrooms (user_address_id, created_on) values (?,now())");
			$stmt->bind_param("i", $aid);
			$stmt->execute();	
			$id=$stmt->insert_id;
			$bed='Single';
			$stmt = $dbCon->prepare("insert into user_apartment_bedrooms_beds (bedroom_id,bed_info, created_on,modified_on) values (?,?,now(),now())");
			$stmt->bind_param("is", $id,$bed);
			$stmt->execute();	
			
			 
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
	
		
		function deleteBedroom($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_bedrooms where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']>1)
			{
			$stmt = $dbCon->prepare("select max(id) as m_id from user_apartment_bedrooms where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("delete from user_apartment_bedrooms where id=?");
			$stmt->bind_param("i", $row['m_id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("delete from user_apartment_bedrooms_beds where bedroom_id=?");
			$stmt->bind_param("i", $row['m_id']);
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
		
		
		function deleteBathroom($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_bathroom_detail where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']>1)
			{
			$stmt = $dbCon->prepare("select max(id) as m_id from user_apartment_bathroom_detail where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("delete from user_apartment_bathroom_detail where id=?");
			$stmt->bind_param("i", $row['m_id']);
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
		
		
		function deleteBedroomBedInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_bedrooms_beds where bedroom_id=(select bedroom_id from user_apartment_bedrooms_beds where id=?)");
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']>1)
			{
			$stmt = $dbCon->prepare("delete from user_apartment_bedrooms_beds where id=?");
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;	
			}
			else
			{
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_bedrooms where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']>1)
			{
			$stmt = $dbCon->prepare("select bedroom_id from user_apartment_bedrooms_beds where id=?");
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("delete from user_apartment_bedrooms where id=?");
			$stmt->bind_param("i", $row['bedroom_id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("delete from user_apartment_bedrooms_beds where id=?");
			$stmt->bind_param("i", $_POST['id']);
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
			 
			
			 	
		}
		
		
		function bedroomDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("update user_address set bedroom_updated=1 where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select * from user_apartment_bedrooms where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$j++;
				$org=$org.' <div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile'.$j.'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold">Bedroom '.$j.'
								<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="profile'.$j.'" class=" " style="display: block;">	
										 
									 <a href="javascript:void(0);" onclick="addBedToBedroom('.$row['id'].');">	<button color="#444444" class="merlin-button css-7wfern fleft" aria-label="">
											   <div class="merlin-button__content">
												  <div class="css-ibdtyj">
													 <div class="css-1mvz2rc">
														<div class="css-r0ilrj"></div>
													 </div>
													 Add another bed
												  </div>
											   </div>
											</button></a>
											<div id="'.$row['id'].'">';
			$stmt = $dbCon->prepare("select * from user_apartment_bedrooms_beds where bedroom_id=?");
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$i=1;
			while($row1= $result1->fetch_assoc())
			{							
		
			$stmt = $dbCon->prepare("select * from apartment_bed_type");
			$stmt->execute();
			$result2 = $stmt->get_result();
			$options='';
			
			while($row2= $result2->fetch_assoc())
			{	
			if($row2['bed_type']==$row1['bed_info'])
			{
				$options=$options.'<option value="'.$row2['bed_type'].'" selected>'.$row2['bed_type'].'</option>';
			}
			else
			{
			$options=$options.'<option value="'.$row2['bed_type'].'">'.$row2['bed_type'].'</option>';	
			}
			}
			
				$org=$org.'<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt brd">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_50 xxs-wi_55  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Bed '.$i.'</span>
													 
													 </div>
													 
											<div class="wi_70  xs-mar0 xs-padt10">		
												<div class="on_clmn mart10 " >
								<div class="pos_rel">											
											<select name="position_type" id="position_type" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg dropdown-bg  tall padl0 ffamily_avenir red_f5a0a5_txt" style="text-align-last:center;" onchange="updateBedTypeInfo('.$row1['id'].',this.value);"> 
											 '.$options.'
														 
											</select>
											</div>
											</div>
												
											</div>	
											<div class="clear"></div>
											<div class="wi_70  xs-mar0 padt20 ">		
											<a href="javascript:void(0);" onclick="deleteBedroomBedInfo('.$row1['id'].')"><button color="#444444" class="merlin-button css-7wfern fleft  " aria-label="">
										   <div class="merlin-button__content">
											  <div class="css-ibdtyj">
												 
												 Remove bed
											  </div>
										   </div>
										</button>	</a>
											</div>	
											</div>
											
											
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div>';	
$i++;									
											
			}
			$org=$org.'</div><div class="clear"></div>
									</div>
					 		 <div class="clear"></div>
					</div>';
			}
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		function bathroomDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("update user_address set bathroom_updated=1 where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute(); 
			 
			$stmt = $dbCon->prepare("select * from user_apartment_bathroom_detail where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$j++;
				$org=$org.' <div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile'.$j.'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold">Bathroom '.$j.'
								<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="profile'.$j.'" class=" " style="display: block;">	
										 
									  
											<div id="'.$row['id'].'">';
			 						
		if($row['toilet_and_sink']==1)
		{
			$toilet='<a href="javascript:void(0);" onclick="updateToilet('.$row['id'].',0);"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">Toilet and Sink</span>
															   </span>
															</span>
														 </div>
													  </div></a>';
		}
		else
		{
		$toilet='<a href="javascript:void(0);" onclick="updateToilet('.$row['id'].',1);"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Toilet and Sink</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		if($row['bath']==1)
		{
			$bath='<a href="javascript:void(0);" onclick="updateBath('.$row['id'].',0);"><div id="bath-chip" class="css-cedhmb">
						   <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
							  <span class="chip chip_is-selected">
								 <span class="chip_content">
									<div class="css-utgzrm"></div>
									<span class="chip_text">Bath</span>
								 </span>
							  </span>
						   </div>
						</div></a>';
		}
		else
		{
		$bath='<a href="javascript:void(0);" onclick="updateBath('.$row['id'].',1);"><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Bath</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		
		if($row['shower']==1)
		{
			$shower='<a href="javascript:void(0);" onclick="updateShower('.$row['id'].',0);"><div id="shower-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="shower-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">Shower</span>
															   </span>
															</span>
														 </div>
													  </div></a>';
		if($row['standalone_shower']==1)
		{
			 
			$stype=	'<div data-testid="shower-type-radio-questions" class="css-1abdbqe">
							   <label for="shower-type-radio-questions" class="css-1rlpief">What type of shower does this bathroom have?</label>
							   <div id="spacer" spacing="small" class="css-1coujgl"></div>
							   <form>
								  <div class="css-1kbx24p">
									 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
										<label class="tbp-radio tbp-radio--checked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" for="A standalone shower-walk in">
										   <a href="javascript:void(0);" onclick="updateStandAlone('.$row['id'].');"><div class="tbp-radio__container">
											  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--checked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" id="A standalone shower-walk in" name="A standalone shower" value="walk in" checked>
											  <div class="tbp-radio__button"></div>
											  <div class="tbp-radio__label">A standalone shower</div>
										   </div></a>
										   <div class="tbp-radio__children"></div>
										</label>
									 </div>
								  </div>
								  <div id="spacer" spacing="small" class="css-1coujgl"></div>
								  <div class="css-1kbx24p">
									 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
										<label class="tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath">
										  <a href="javascript:void(0);" onclick="updateOverbath('.$row['id'].');"> <div class="tbp-radio__container">
											  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="An over-bath shower-over bath" name="An over-bath shower" value="over bath">
											  <div class="tbp-radio__button"></div>
											  <div class="tbp-radio__label">An over-bath shower</div>
										   </div></a>
										   <div class="tbp-radio__children"></div>
										</label>
									 </div>
								  </div>
							   </form>
							</div>';
		}
		else
		{
			 
			$stype='<div data-testid="shower-type-radio-questions" class="css-1abdbqe">
						   <label for="shower-type-radio-questions" class="css-1rlpief">What type of shower does this bathroom have?</label>
						   <div id="spacer" spacing="small" class="css-1coujgl"></div>
						   <form>
							  <div class="css-1kbx24p">
								 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
									<label class="tbp-radio tbp-radio--unchecked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" for="A standalone shower-walk in">
									   <a href="javascript:void(0);" onclick="updateStandAlone('.$row['id'].');"> <div class="tbp-radio__container">
										  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" id="A standalone shower-walk in" name="A standalone shower" value="walk in" >
										  <div class="tbp-radio__button"></div>
										  <div class="tbp-radio__label">A standalone shower</div>
									   </div></a>
									   <div class="tbp-radio__children"></div>
									</label>
								 </div>
							  </div>
							  <div id="spacer" spacing="small" class="css-1coujgl"></div>
							  <div class="css-1kbx24p">
								 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
									<label class="tbp-radio tbp-radio--checked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath">
									   <a href="javascript:void(0);" onclick="updateOverbath('.$row['id'].');"><div class="tbp-radio__container">
										  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--checked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="An over-bath shower-over bath" name="An over-bath shower" value="over bath" checked>
										  <div class="tbp-radio__button"></div>
										  <div class="tbp-radio__label">An over-bath shower</div>
									   </div></a>
									   <div class="tbp-radio__children"></div>
									</label>
								 </div>
							  </div>
						   </form>
						</div>';
		}	
												  
													  
		}
		else
		{
		$shower='<a href="javascript:void(0);" onclick="updateShower('.$row['id'].',1);"><div id="shower-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="shower-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Shower</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
			$stype='';										  
													  
		}
		
		
		if($row['is_private']==1)
		{
			$Private='<a href="javascript:void(0);" onclick="updatePrivate('.$row['id'].',0);"><div id="private-chip" class="css-cedhmb">
						   <div tabindex="0" role="button" id="private-chip" class="css-1w0xfwu">
							  <span class="chip chip_is-selected">
								 <span class="chip_content">
									<div class="css-utgzrm"></div>
									<span class="chip_text">Private</span>
								 </span>
							  </span>
						   </div>
						</div></a>';
		}
		else
		{
		$Private='<a href="javascript:void(0);" onclick="updatePrivate('.$row['id'].',1);"><div id="private-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="private-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Private</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		if($row['is_wheelchair_accessible']==1)
		{
			$wheelchair='<a href="javascript:void(0);" onclick="updateWheelchair('.$row['id'].',0);"><div id="wheelchair-chip" class="css-cedhmb">
						   <div tabindex="0" role="button" id="wheelchair-chip" class="css-1w0xfwu">
							  <span class="chip chip_is-selected">
								 <span class="chip_content">
									<div class="css-utgzrm"></div>
									<span class="chip_text">Wheelchair accessible</span>
								 </span>
							  </span>
						   </div>
						</div></a>';
		}
		else
		{
		$wheelchair='<a href="javascript:void(0);" onclick="updateWheelchair('.$row['id'].',1);"><div id="wheelchair-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="wheelchair-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Wheelchair accessible</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		if($row['is_ensuit']==1)
		{
			$ensuit='<a href="javascript:void(0);" onclick="updateEnsuit('.$row['id'].',0);"><div id="ensuit-chip" class="css-cedhmb">
						   <div tabindex="0" role="button" id="ensuit-chip" class="css-1w0xfwu">
							  <span class="chip chip_is-selected">
								 <span class="chip_content">
									<div class="css-utgzrm"></div>
									<span class="chip_text">Ensuit</span>
								 </span>
							  </span>
						   </div>
						</div></a>';
		}
		else
		{
		$ensuit='<a href="javascript:void(0);" onclick="updateEnsuit('.$row['id'].',1);"><div id="ensuit-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="ensuit-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Ensuit</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
			
				$org=$org.'<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt  ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												 <div class="css-1jzh2co marb15">
												   <p class="paragraph--b1 paragraph--full css-1680uhd">Select the features which are available in this bathroom</p>
												   <div class="chip-container">
													  '.$toilet.'
													 '.$bath.'
													 '.$shower.'
													 
													 
												   </div>
												</div>
												<div class="clear"></div>
											<div id="spacer" spacing="large" class="css-swt4jz"></div>
											'.$stype.'
											<div id="spacer" spacing="large" class="css-swt4jz"></div>
											
											<div class="css-1jzh2co mart15">
											   <p class="paragraph--b1 paragraph--full css-1680uhd ">Select the bathroom type</p>
											   <div class="chip-container">
												  '.$Private.'
												  '.$wheelchair.'
												'. $ensuit.'
											   </div>
											</div>
											
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div>
									</div><div class="clear"></div>
									</div>
									</div>
									';	
 								
											
			
			 
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		function districtPublishDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select * from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$row = $result->fetch_assoc();
				 
		if($row['district_rent']==1)
		{
			$toilet='<a href="javascript:void(0);" onclick="updateRent(0);"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">Rent</span>
															   </span>
															</span>
														 </div>
													  </div></a>';
	if($row['district_short_rent']==1)
		{
			 
			$stype=	'<div data-testid="shower-type-radio-questions" class="css-1abdbqe">
							   <label for="shower-type-radio-questions" class="css-1rlpief">Please select the term available for rent?</label>
							   <div id="spacer" spacing="small" class="css-1coujgl"></div>
							   <form>
								  <div class="css-1kbx24p">
									 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
										<label class="tbp-radio tbp-radio--checked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" for="A standalone shower-walk in">
										   <a href="javascript:void(0);" ><div class="tbp-radio__container">
											  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--checked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" id="A standalone shower-walk in" name="A standalone shower" value="walk in" checked>
											  <div class="tbp-radio__button"></div>
											  <div class="tbp-radio__label">Short term rent</div>
										   </div></a>
										   <div class="tbp-radio__children"></div>
										</label>
									 </div>
								  </div>
								  <div id="spacer" spacing="small" class="css-1coujgl"></div>
								  <div class="css-1kbx24p">
									 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
										<label class="tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath">
										  <a href="javascript:void(0);" onclick="updateLongRent(1);"> <div class="tbp-radio__container">
											  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="An over-bath shower-over bath" name="An over-bath shower" value="over bath">
											  <div class="tbp-radio__button"></div>
											  <div class="tbp-radio__label">Long term rent</div>
										   </div></a>
										   <div class="tbp-radio__children"></div>
										</label>
									 </div>
								  </div>
							   </form>
							</div>';
		}
		else
		{
			 
			$stype='<div data-testid="shower-type-radio-questions" class="css-1abdbqe">
						   <label for="shower-type-radio-questions" class="css-1rlpief">Please select the term available for rent?</label>
						   <div id="spacer" spacing="small" class="css-1coujgl"></div>
						   <form>
							  <div class="css-1kbx24p">
								 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
									<label class="tbp-radio tbp-radio--unchecked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" for="A standalone shower-walk in">
									   <a href="javascript:void(0);" onclick="updateLongRent(0);"> <div class="tbp-radio__container">
										  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" id="A standalone shower-walk in" name="A standalone shower" value="walk in" >
										  <div class="tbp-radio__button"></div>
										  <div class="tbp-radio__label">Short term rent</div>
									   </div></a>
									   <div class="tbp-radio__children"></div>
									</label>
								 </div>
							  </div>
							  <div id="spacer" spacing="small" class="css-1coujgl"></div>
							  <div class="css-1kbx24p">
								 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
									<label class="tbp-radio tbp-radio--checked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath">
									   <a href="javascript:void(0);" ><div class="tbp-radio__container">
										  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--checked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="An over-bath shower-over bath" name="An over-bath shower" value="over bath" checked>
										  <div class="tbp-radio__button"></div>
										  <div class="tbp-radio__label">Long term rent</div>
									   </div></a>
									   <div class="tbp-radio__children"></div>
									</label>
								 </div>
							  </div>
						   </form>
						</div>';
		}	
													  
													  
		}
		else
		{
		$toilet='<a href="javascript:void(0);" onclick="updateRent(1);"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Rent</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		if($row['district_sale']==1)
		{
			$bath='<a href="javascript:void(0);" onclick="updateSale(0);"><div id="bath-chip" class="css-cedhmb">
						   <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
							  <span class="chip chip_is-selected">
								 <span class="chip_content">
									<div class="css-utgzrm"></div>
									<span class="chip_text">Sale</span>
								 </span>
							  </span>
						   </div>
						</div></a>';
		}
		else
		{
		$bath='<a href="javascript:void(0);" onclick="updateSale(1);"><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Sale</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		
		if($row['district_rent']==0 && $row['district_sale']==0)
		{
			$shower='<a href="javascript:void(0);" ><div id="shower-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="shower-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">None of them</span>
															   </span>
															</span>
														 </div>
													  </div></a>';
										  
							$stype='';						  
		}
		else
		{
		$shower='<a href="javascript:void(0);" onclick="updateNone(1);"><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">None of them</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
	  
				$org=$org.'<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt  ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												 <div class="css-1jzh2co marb15">
												   <p class="paragraph--b1 paragraph--full css-1680uhd">Select the apartment availability</p>
												   <div class="chip-container">
													  '.$toilet.'
													 '.$bath.'
													 '.$shower.'
													 
													 
												   </div>
												</div>
												<div class="clear"></div>
											 
											'.$stype.'
											
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div>
									</div><div class="clear"></div>
									</div>
									</div>
									';	
 								
											
			
			 
			
			 
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
	
		
		
		
		 function propertyTypeEntranceInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("update user_address set property_composition_updated=1 where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select private_entrance,elevator from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result(); 
			$row = $result->fetch_assoc();
		$org='';
			 						
		if($row['private_entrance']==1)
		{
			$private_entrance='<a href="javascript:void(0);" onclick="updatePrivateDoor(0);">
										 <div class="css-cedhmb">
												  <div tabindex="0" role="button" id="private_door" class="css-1w0xfwu">
													 <span class="chip chip_is-selected">
													 <span class="chip_content">
														<div class="css-utgzrm"></div>
														<span class="chip_text">Private entrance door</span>
													 </span>
												  </span>
												  </div>
											   </div>
											   </a>';
		}
		else
		{
		$private_entrance='<a href="javascript:void(0);" onclick="updatePrivateDoor(1);">
												<div  class="css-cedhmb">
														 <div tabindex="0" role="button"  class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Private entrance door</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		if($row['elevator']==1)
		{
			$elevator='<a href="javascript:void(0);" onclick="updateElevator(0);">
			<div  class="css-cedhmb">
						   <div tabindex="0" role="button"   class="css-1w0xfwu">
							  <span class="chip chip_is-selected">
													 <span class="chip_content">
														<div class="css-utgzrm"></div>
														<span class="chip_text">Elevator</span>
													 </span>
												  </span>
						   </div>
						</div></a>';
		}
		else
		{
		$elevator='<a href="javascript:void(0);" onclick="updateElevator(1);">
		<div   class="css-cedhmb">
														 <div tabindex="0" role="button"   class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Elevator</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		 $org=$org.''.$private_entrance.''.$elevator;
			 
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		 function childrenInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select children_allowed,infants_allowed from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result(); 
			$row = $result->fetch_assoc();
		$org='';
			 						
		if($row['children_allowed']==1)
		{
			$children_allowed='<a href="javascript:void(0);" onclick="updateChildren(0);">
										 <div class="css-cedhmb">
												  <div tabindex="0" role="button" class="css-1w0xfwu">
													 <span class="chip chip_is-selected">
													 <span class="chip_content">
														<div class="css-utgzrm"></div>
														<span class="chip_text">Children</span>
													 </span>
												  </span>
												  </div>
											   </div>
											   </a>';
		}
		else
		{
		$children_allowed='<a href="javascript:void(0);" onclick="updateChildren(1);">
												<div  class="css-cedhmb">
														 <div tabindex="0" role="button"  class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Children</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		if($row['infants_allowed']==1)
		{
			$infants_allowed='<a href="javascript:void(0);" onclick="updateInfants(0);">
			<div  class="css-cedhmb">
						   <div tabindex="0" role="button"   class="css-1w0xfwu">
							  <span class="chip chip_is-selected">
													 <span class="chip_content">
														<div class="css-utgzrm"></div>
														<span class="chip_text">infants</span>
													 </span>
												  </span>
						   </div>
						</div></a>';
		}
		else
		{
		$infants_allowed='<a href="javascript:void(0);" onclick="updateInfants(1);">
		<div   class="css-cedhmb">
														 <div tabindex="0" role="button"   class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Infants</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		 $org=$org.''.$children_allowed.''.$infants_allowed;
			 
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		function eventsInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select smoking_allowed,events_allowed,pets_allowed from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result(); 
			$row = $result->fetch_assoc();
		$org='';
			 						
		if($row['smoking_allowed']==1)
		{
			$smoking_allowed='<a href="javascript:void(0);" onclick="updateSmoking(0);">
										 <div class="css-cedhmb">
												  <div tabindex="0" role="button" class="css-1w0xfwu">
													 <span class="chip chip_is-selected">
													 <span class="chip_content">
														<div class="css-utgzrm"></div>
														<span class="chip_text">Smoking</span>
													 </span>
												  </span>
												  </div>
											   </div>
											   </a>';
		}
		else
		{
		$smoking_allowed='<a href="javascript:void(0);" onclick="updateSmoking(1);">
												<div  class="css-cedhmb">
														 <div tabindex="0" role="button"  class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Smoking</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		if($row['events_allowed']==1)
		{
			$events_allowed='<a href="javascript:void(0);" onclick="updateEvents(0);">
			<div  class="css-cedhmb">
						   <div tabindex="0" role="button"   class="css-1w0xfwu">
							  <span class="chip chip_is-selected">
													 <span class="chip_content">
														<div class="css-utgzrm"></div>
														<span class="chip_text">Parties/Events</span>
													 </span>
												  </span>
						   </div>
						</div></a>';
		}
		else
		{
		$events_allowed='<a href="javascript:void(0);" onclick="updateEvents(1);">
		<div   class="css-cedhmb">
														 <div tabindex="0" role="button"   class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Parties/Events</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		
		if($row['pets_allowed']==1)
		{
			$pets_allowed='<a href="javascript:void(0);" onclick="updatePets(0);">
			<div  class="css-cedhmb">
						   <div tabindex="0" role="button"   class="css-1w0xfwu">
							  <span class="chip chip_is-selected">
													 <span class="chip_content">
														<div class="css-utgzrm"></div>
														<span class="chip_text">Pets</span>
													 </span>
												  </span>
						   </div>
						</div></a>';
		}
		else
		{
		$pets_allowed='<a href="javascript:void(0);" onclick="updatePets(1);">
		<div   class="css-cedhmb">
														 <div tabindex="0" role="button"   class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Pets</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		 $org=$org.''.$smoking_allowed.''.$events_allowed.''.$pets_allowed;
			 
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		
		function cleeningFeeInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("update user_address set fee_updated=1 where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select cleening_fee_applicable,cleening_fee from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result(); 
			$row = $result->fetch_assoc();
		$org='';
			 						
		if($row['cleening_fee_applicable']==1)
		{
			 
			$stype=	'<div data-testid="shower-type-radio-questions" class="css-1abdbqe">
							   
							   
							   <form>
								  <div class="css-1kbx24p">
									 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
										<label class="tbp-radio tbp-radio--checked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" for="A standalone shower-walk in">
										   <a href="javascript:void(0);" onclick="updateCleening(1);"><div class="tbp-radio__container">
											  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--checked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" id="A standalone shower-walk in" name="A standalone shower" value="walk in" checked>
											  <div class="tbp-radio__button"></div>
											  <div class="tbp-radio__label">Yes</div>
										   </div></a>
										   <div class="tbp-radio__children"></div>
										</label>
									 </div>
								  </div>
								  <div id="spacer" spacing="small" class="css-1coujgl"></div>
								  <div class="css-1kbx24p">
									 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
										<label class="tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath">
										  <a href="javascript:void(0);" onclick="updateCleening(0);"> <div class="tbp-radio__container">
											  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="An over-bath shower-over bath" name="An over-bath shower" value="over bath">
											  <div class="tbp-radio__button"></div>
											  <div class="tbp-radio__label">No</div>
										   </div></a>
										   <div class="tbp-radio__children"></div>
										</label>
									 </div>
								  </div>
							   </form>
							</div>
							
							<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 mart20">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt tall">How much is your cleaning fee?
</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt tall">This is charged per stay.</span> 
													 </div>
													 
													<div class="clear"></div>
												
												<div class="css-11e5cyp padt10">
												<input type="text" id="fee" data-testid="fee" class="css-bnguuq " onkeyup="updateFee(this.value);" value="'.$row['cleening_fee'].'"/>
																								 
												</div>
												
												
												
												
											</div>
							
							
							';
		}
		else
		{
			 
			$stype='<div data-testid="shower-type-radio-questions" class="css-1abdbqe">
						    
						   <form>
							  <div class="css-1kbx24p">
								 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
									<label class="tbp-radio tbp-radio--unchecked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" for="A standalone shower-walk in">
									   <a href="javascript:void(0);" onclick="updateCleening(1);"> <div class="tbp-radio__container">
										  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" id="A standalone shower-walk in" name="A standalone shower" value="walk in" >
										  <div class="tbp-radio__button"></div>
										  <div class="tbp-radio__label">Yes</div>
									   </div></a>
									   <div class="tbp-radio__children"></div>
									</label>
								 </div>
							  </div>
							  <div id="spacer" spacing="small" class="css-1coujgl"></div>
							  <div class="css-1kbx24p">
								 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
									<label class="tbp-radio tbp-radio--checked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath">
									   <a href="javascript:void(0);" onclick="updateCleening(0);"><div class="tbp-radio__container">
										  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--checked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="An over-bath shower-over bath" name="An over-bath shower" value="over bath" checked>
										  <div class="tbp-radio__button"></div>
										  <div class="tbp-radio__label">No</div>
									   </div></a>
									   <div class="tbp-radio__children"></div>
									</label>
								 </div>
							  </div>
						   </form>
						</div>';
		}	
			
		 $org=$org.''.$stype;
			 
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		function updateTouristFee($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update user_address set tourist_tax=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();	
			 			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateTouristTax($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update user_address set tourist_tax_applicable=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();	
			if($_POST['update_info']==0)
			{
			$stmt = $dbCon->prepare("update user_address set tourist_tax=0 where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();	
			}				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function touristTaxInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("update user_address set tourist_tax_updated=1 where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select tourist_tax_applicable,tourist_tax from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result(); 
			$row = $result->fetch_assoc();
		$org='';
		$options='<option value="0" >0%</option>';
		for($i=1; $i<=30; $i++)
		{
			$selected='';
			if($i==$row['tourist_tax'])
			{
			$selected='selected';	
			}
				
			$options=$options.'<option value="'.$i.'" '.$selected.'>'.$i.'%</option>';
		}
		
			 						
		if($row['tourist_tax_applicable']==1)
		{
			 
			$stype=	'<div data-testid="shower-type-radio-questions" class="css-1abdbqe">
							   
							   
							   <form>
								  <div class="css-1kbx24p">
									 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
										<label class="tbp-radio tbp-radio--checked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" for="A standalone shower-walk in">
										   <a href="javascript:void(0);" onclick="updateTouristTax(1);"><div class="tbp-radio__container">
											  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--checked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" id="A standalone shower-walk in" name="A standalone shower" value="walk in" checked>
											  <div class="tbp-radio__button"></div>
											  <div class="tbp-radio__label">Yes</div>
										   </div></a>
										   <div class="tbp-radio__children"></div>
										</label>
									 </div>
								  </div>
								  <div id="spacer" spacing="small" class="css-1coujgl"></div>
								  <div class="css-1kbx24p">
									 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
										<label class="tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath">
										  <a href="javascript:void(0);" onclick="updateTouristTax(0);"> <div class="tbp-radio__container">
											  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="An over-bath shower-over bath" name="An over-bath shower" value="over bath">
											  <div class="tbp-radio__button"></div>
											  <div class="tbp-radio__label">No</div>
										   </div></a>
										   <div class="tbp-radio__children"></div>
										</label>
									 </div>
								  </div>
							   </form>
							</div>
							
							<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 mart20">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt tall">How much is your tax?
</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt tall">This is charged per stay.</span> 
													 </div>
													 
													<div class="clear"></div>
												
												<div class="css-11e5cyp padt10">
												<select   class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg dropdown-bg  tall padl0 ffamily_avenir red_f5a0a5_txt" style="text-align-last:center;" onchange="updateFee(this.value);" fdprocessedid="r2pokg"> 
											 
														'.$options.' 
											</select>
												 		 
												</div>
												
												
												
												
											</div>
							
							
							';
		}
		else
		{
			 
			$stype='<div data-testid="shower-type-radio-questions" class="css-1abdbqe">
						    
						   <form>
							  <div class="css-1kbx24p">
								 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
									<label class="tbp-radio tbp-radio--unchecked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" for="A standalone shower-walk in">
									   <a href="javascript:void(0);" onclick="updateTouristTax(1);"> <div class="tbp-radio__container">
										  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" id="A standalone shower-walk in" name="A standalone shower" value="walk in" >
										  <div class="tbp-radio__button"></div>
										  <div class="tbp-radio__label">Yes</div>
									   </div></a>
									   <div class="tbp-radio__children"></div>
									</label>
								 </div>
							  </div>
							  <div id="spacer" spacing="small" class="css-1coujgl"></div>
							  <div class="css-1kbx24p">
								 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
									<label class="tbp-radio tbp-radio--checked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath">
									   <a href="javascript:void(0);" onclick="updateTouristTax(0);"><div class="tbp-radio__container">
										  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--checked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="An over-bath shower-over bath" name="An over-bath shower" value="over bath" checked>
										  <div class="tbp-radio__button"></div>
										  <div class="tbp-radio__label">No</div>
									   </div></a>
									   <div class="tbp-radio__children"></div>
									</label>
								 </div>
							  </div>
						   </form>
						</div>';
		}	
			
		 $org=$org.''.$stype;
			 
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		function bookingNoticeInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select booking_notice from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result(); 
			$row = $result->fetch_assoc();
		$org='<div data-testid="shower-type-radio-questions" class="css-1abdbqe">
							   
							   
							   <form>';
			 

		for($i=1;$i<=7;$i++)
		{
		if($row['booking_notice']==$i)
		{
			 
			$org=$org.' <div class="css-1kbx24p">
									 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
										<label class="tbp-radio tbp-radio--checked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" for="A standalone shower-walk in">
										   <a href="javascript:void(0);" onclick="updateBooking('.$i.');"><div class="tbp-radio__container">
											  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--checked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" id="A standalone shower-walk in" name="A standalone shower" value="walk in" checked>
											  <div class="tbp-radio__button"></div>
											  <div class="tbp-radio__label">'.$i.' days</div>
										   </div></a>
										   <div class="tbp-radio__children"></div>
										</label>
									 </div>
								  </div>
								  <div id="spacer" spacing="small" class="css-1coujgl"></div>';
		}
		else
		{
			$org=$org.' <div class="css-1kbx24p">
									 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
										<label class="tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath">
										  <a href="javascript:void(0);" onclick="updateBooking('.$i.');"> <div class="tbp-radio__container">
											  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="An over-bath shower-over bath" name="An over-bath shower" value="over bath">
											  <div class="tbp-radio__button"></div>
											  <div class="tbp-radio__label">'.$i.' days</div>
										   </div></a>
										   <div class="tbp-radio__children"></div>
										</label>
									 </div>
								  </div> 
								  <div id="spacer" spacing="small" class="css-1coujgl"></div>
								  ';
		}
		if($i==3)
		{
			$i=6;
		}
		}			
		 
		 $org=$org.' </form>
							</div>';
			 
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		
		
		function securityFeeInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select security_fee_applicable,security_fee from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result(); 
			$row = $result->fetch_assoc();
		$org='';
			 						
		if($row['security_fee_applicable']==1)
		{
			 
			$stype=	'<div data-testid="shower-type-radio-questions" class="css-1abdbqe">
							   
							   
							   <form>
								  <div class="css-1kbx24p">
									 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
										<label class="tbp-radio tbp-radio--checked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" for="A standalone shower-walk in">
										   <a href="javascript:void(0);" onclick="updateSecurity(1);"><div class="tbp-radio__container">
											  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--checked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" id="A standalone shower-walk in" name="A standalone shower" value="walk in" checked>
											  <div class="tbp-radio__button"></div>
											  <div class="tbp-radio__label">Yes</div>
										   </div></a>
										   <div class="tbp-radio__children"></div>
										</label>
									 </div>
								  </div>
								  <div id="spacer" spacing="small" class="css-1coujgl"></div>
								  <div class="css-1kbx24p">
									 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
										<label class="tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath">
										  <a href="javascript:void(0);" onclick="updateSecurity(0);"> <div class="tbp-radio__container">
											  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="An over-bath shower-over bath" name="An over-bath shower" value="over bath">
											  <div class="tbp-radio__button"></div>
											  <div class="tbp-radio__label">No</div>
										   </div></a>
										   <div class="tbp-radio__children"></div>
										</label>
									 </div>
								  </div>
							   </form>
							</div>
							
							<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 mart20">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt tall">How much is your security deposit?
													</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt tall">If taking a security deposit it must be minimum £100</span> 
													 </div>
													 
													<div class="clear"></div>
												
												<div class="css-11e5cyp padt10">
												<input type="text" id="fee" data-testid="fee" class="css-bnguuq " onblur="updateSecurityFee(this.value);" value="'.$row['security_fee'].'"/>
																								 
												</div>
												
												
												
												
											</div>
							
							
							';
		}
		else
		{
			 
			$stype='<div data-testid="shower-type-radio-questions" class="css-1abdbqe">
						    
						   <form>
							  <div class="css-1kbx24p">
								 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
									<label class="tbp-radio tbp-radio--unchecked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" for="A standalone shower-walk in">
									   <a href="javascript:void(0);" onclick="updateSecurity(1);"> <div class="tbp-radio__container">
										  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" id="A standalone shower-walk in" name="A standalone shower" value="walk in" >
										  <div class="tbp-radio__button"></div>
										  <div class="tbp-radio__label">Yes</div>
									   </div></a>
									   <div class="tbp-radio__children"></div>
									</label>
								 </div>
							  </div>
							  <div id="spacer" spacing="small" class="css-1coujgl"></div>
							  <div class="css-1kbx24p">
								 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
									<label class="tbp-radio tbp-radio--checked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath">
									   <a href="javascript:void(0);" onclick="updateSecurity(0);"><div class="tbp-radio__container">
										  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--checked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="An over-bath shower-over bath" name="An over-bath shower" value="over bath" checked>
										  <div class="tbp-radio__button"></div>
										  <div class="tbp-radio__label">No</div>
									   </div></a>
									   <div class="tbp-radio__children"></div>
									</label>
								 </div>
							  </div>
						   </form>
						</div>';
		}	
			
		 $org=$org.''.$stype;
			 
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		function securityLongTermFeeInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select security_fee_applicable_long,security_fee_months from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result(); 
			$row = $result->fetch_assoc();
		$org='';
			 						
		if($row['security_fee_applicable_long']==1)
		{
			 
			$stype=	'<div data-testid="shower-type-radio-questions" class="css-1abdbqe">
							   
							   
							   <form>
								  <div class="css-1kbx24p">
									 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
										<label class="tbp-radio tbp-radio--checked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" for="A standalone shower-walk in">
										   <a href="javascript:void(0);" onclick="updateSecurityLong(1);"><div class="tbp-radio__container">
											  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--checked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" id="A standalone shower-walk in" name="A standalone shower" value="walk in" checked>
											  <div class="tbp-radio__button"></div>
											  <div class="tbp-radio__label">Yes</div>
										   </div></a>
										   <div class="tbp-radio__children"></div>
										</label>
									 </div>
								  </div>
								  <div id="spacer" spacing="small" class="css-1coujgl"></div>
								  <div class="css-1kbx24p">
									 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
										<label class="tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath">
										  <a href="javascript:void(0);" onclick="updateSecurityLong(0);"> <div class="tbp-radio__container">
											  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="An over-bath shower-over bath" name="An over-bath shower" value="over bath">
											  <div class="tbp-radio__button"></div>
											  <div class="tbp-radio__label">No</div>
										   </div></a>
										   <div class="tbp-radio__children"></div>
										</label>
									 </div>
								  </div>
							   </form>
							</div>
							
							<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 mart20">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt tall">How much is your security deposit?
													</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt tall">If taking a security deposit it must be minimum of 1 month rent</span> 
													 </div>
													 
													<div class="clear"></div>
												
												 <div id="bedroom_count" class="css-151xzu3 padt10">
										<a href="javascript:void(0);" onclick="updateSecurityLength(0);"><button color="#444444" data-testid="icon-button--minus" class="merlin-button merlin-button--disabled css-ig30wo" aria-label="" disabled="">
										<div class="merlin-button__content">
										<div class="css-ibdtyj">
										<div class="css-2llcy8">
										<div data-testid="icon-button--icon-div" class="css-lf4a1m">
										</div>
										</div>
										</div>
										</div>
										</button></a>
										<span class="value" id="propertyFloors">'.$row['security_fee_months'].' Months</span>
									<a href="javascript:void(0);" onclick="updateSecurityLength(1);">	
									<button color="#444444" data-testid="icon-button--plus" class="merlin-button css-mgojn5" aria-label="">
										<div class="merlin-button__content">
										<div class="css-ibdtyj">
										<div class="css-2llcy8">
										<div data-testid="icon-button--icon-div" class="css-r0ilrj">
										</div>
										</div>
										</div>
										</div>
										</button></a>
										</div>
										</div>';
		}
		else
		{
			 
			$stype='<div data-testid="shower-type-radio-questions" class="css-1abdbqe">
						    
						   <form>
							  <div class="css-1kbx24p">
								 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
									<label class="tbp-radio tbp-radio--unchecked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" for="A standalone shower-walk in">
									   <a href="javascript:void(0);" onclick="updateSecurityLong(1);"> <div class="tbp-radio__container">
										  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" id="A standalone shower-walk in" name="A standalone shower" value="walk in" >
										  <div class="tbp-radio__button"></div>
										  <div class="tbp-radio__label">Yes</div>
									   </div></a>
									   <div class="tbp-radio__children"></div>
									</label>
								 </div>
							  </div>
							  <div id="spacer" spacing="small" class="css-1coujgl"></div>
							  <div class="css-1kbx24p">
								 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
									<label class="tbp-radio tbp-radio--checked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath">
									   <a href="javascript:void(0);" onclick="updateSecurityLong(0);"><div class="tbp-radio__container">
										  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--checked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="An over-bath shower-over bath" name="An over-bath shower" value="over bath" checked>
										  <div class="tbp-radio__button"></div>
										  <div class="tbp-radio__label">No</div>
									   </div></a>
									   <div class="tbp-radio__children"></div>
									</label>
								 </div>
							  </div>
						   </form>
						</div>';
		}	
			
		 $org=$org.''.$stype;
			 
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		
		
		function updatePets($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update user_address set pets_allowed=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateEvents($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update user_address set events_allowed=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateBooking($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update user_address set booking_notice=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();	
						
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateCleening($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update user_address set cleening_fee_applicable=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();	
			if($_POST['update_info']==0)
			{
			$stmt = $dbCon->prepare("update user_address set cleening_fee=25 where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();	
			}				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateCleanByWhom($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("update user_address set cleening_by_whom=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateFee($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update user_address set cleening_fee=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();	
			 			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateSecurity($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update user_address set security_fee_updated=1,security_fee_applicable=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();	
			if($_POST['update_info']==0)
			{
			$stmt = $dbCon->prepare("update user_address set security_fee=100 where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();	
			}				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateSecurityLong($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update user_address set security_fee_applicable_long=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();	
			if($_POST['update_info']==0)
			{
			$stmt = $dbCon->prepare("update user_address set security_fee_months=1 where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();	
			}				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		
		function updateSecurityFee($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update user_address set security_fee_updated=1,security_fee=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();	
			 			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		
		function updateAvailable($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$_POST['selected_dates']=substr($_POST['selected_dates'],0,-1);
			 $a=explode(',',$_POST['selected_dates']);
			 foreach($a as $key)
			 { 
			$stmt = $dbCon->prepare("delete from user_apartment_blocked_dates where blocked_date=? and user_address_id=?");
			$stmt->bind_param("si",$key, $aid);
			$stmt->execute();	
			 } 			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateBlocked($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$_POST['selected_dates']=substr($_POST['selected_dates'],0,-1);
			 $a=explode(',',$_POST['selected_dates']);
			 foreach($a as $key)
			 {
			$stmt = $dbCon->prepare("insert into user_apartment_blocked_dates (blocked_date,user_address_id) values(?, ?)");
			$stmt->bind_param("ii",$key, $aid);
			$stmt->execute();		 
			 }
			
			 			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function getRangeCalander($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select * from hotel_checkout_detail where hotel_property_type=2 and room_type_id=? and is_paid=1");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$orgDate=array();
			$j=0;
			while($row = $result->fetch_assoc())  
				 { 
					$dateUpdate=$row['checkin_booking_date'];
					while($dateUpdate<=$row['checkout_booking_date'])
					 {
					$orgDate[$j]=$dateUpdate; 
					$nDate=date('Y-m-d',$dateUpdate);
					$dateUpdate=strtotime($nDate.'+1 days');
					$j++; 
					 } 
				}
			
			$array=explode('-',$data['time']);
			$option='';
			for($i=0; $i<12; $i++)
			{
			$cur=strtotime($data['time']);
			$t=	strtotime("+".$i." months", strtotime(date('Y-m-d')));
			if($cur==$t)
			{
				$selectedM='selected';
			}
			else
			{
			$selectedM='';	
			}
			$option=$option.'<option value="'.date('Y-m-d', $t).'" '.$selectedM.'>'.date('M Y', $t).'</option>';	
			}
			 $a=$array[1];
			 $b=$array[0];
			 $c='01-'.$a.'-'.$b;
			 $d=cal_days_in_month(CAL_GREGORIAN,$a,$b);
			 $d1 = new DateTime($c);
			$day=$d1->format('w');
			$freeDay='';
			for($i=1; $i<$day; $i++)
			{
				$freeDay=$freeDay.'<div class="css-0 css-r942d4 nobrd"></div>';
			}
			
			$monthDay='';
			for($i=1; $i<=$d; $i++)
			{
				$dateRange=explode(',',$_POST['selectedDates']);
			$c=strtotime($i.'-'.$a.'-'.$b);	
			$stmt = $dbCon->prepare("select count(blocked_date) as num from user_apartment_blocked_dates where user_address_id=? and blocked_date=?");
			$stmt->bind_param("ii", $aid,$c);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
				if (in_array($c, $orgDate))
					  {
						$booked='yellow_bg_f6fe8b';
					  }
					  else
					  {
						  $booked='';
					  }
				 if($row['num']==0)
				 {
					 if (in_array($c, $dateRange))
					  {
					 $monthDay=$monthDay.'<div tabindex="0" class="brd css-4yvkue css-1yul89g brd '.$booked.'" id="'.$c.'" onclick="updateSelect('.$c.');">'.$i.'</div>'; 
					  }
					else
					  {
					 $monthDay=$monthDay.'<div tabindex="0" class="css-7pkrw2 css-1pyvcd8 brd '.$booked.'" id="'.$c.'" onclick="updateSelect('.$c.');">'.$i.'</div>'; 
					  }
					
				 }
				else
				{
					 if (in_array($c, $dateRange))
					  {
					$monthDay=$monthDay.'<div tabindex="0" class="brd css-oxafec css-1yul89g '.$booked.'" id="'.$c.'"  onclick="updateSelect('.$c.');">'.$i.'<svg><line y1="100%" x2="100%"></line></svg></div>'; 
					  }
					else
					  {
					 $monthDay=$monthDay.'<div tabindex="0" class="css-83y958 css-1pyvcd8 brd '.$booked.'" id="'.$c.'"  onclick="updateSelect('.$c.');">'.$i.'<svg><line y1="100%" x2="100%"></line></svg></div>';
					  }
					
				}
			}
			$org='<div class="marrl40 xs-marrl0">
			<div class="css-q1h1h1 visible_si">
			<div class="css-67ir15 xs-wi_100">
			<div class="css-fpoi9n padb20">
   <div>
      <div class="css-11e5cyp">
         <select id="month-select"  data-testid="month-select" class="css-7hhc40" onchange="getNewCalander(this.value);">
            '.$option.'
             
           
         </select>
      </div>
   </div>
   <div style="display: flex;">
       <button color="#444444" data-testid="icon-button--left" label="previous month" class="merlin-button css-6t4pca" aria-label="previous month"  onclick="updateNextCalender(-1);">
         <div class="merlin-button__content">
            <div class="css-ibdtyj">
               <div class="css-1ub2kfg">
                  <div data-testid="icon-button--icon-div" class="css-158wap"></div>
               </div>
            </div>
         </div>
      </button> 
     <button color="#444444" data-testid="icon-button--right" label="next month" class="merlin-button css-6t4pca" aria-label="next month" onclick="updateNextCalender(1);">
         <div class="merlin-button__content">
            <div class="css-ibdtyj">
               <div class="css-1ub2kfg">
                  <div data-testid="icon-button--icon-div" class="css-c5a3uv"></div>
               </div>
            </div>
         </div>
      </button> 
   </div>
</div>
			<div class="calendar-column">
			<div class="css-vnf14w ">
			 <div class="css-1g9m4ae">
																			 <div class="css-1y7ijum">
																				<p class="paragraph--full css-1k5dx4">M</p>
																			 </div>
																			 <div class="css-1y7ijum">
																				<p class="paragraph--full css-1k5dx4">T</p>
																			 </div>
																			 <div class="css-1y7ijum">
																				<p class="paragraph--full css-1k5dx4">W</p>
																			 </div>
																			 <div class="css-1y7ijum">
																				<p class="paragraph--full css-1k5dx4">T</p>
																			 </div>
																			 <div class="css-1y7ijum">
																				<p class="paragraph--full css-1k5dx4">F</p>
																			 </div>
																			 <div class="css-1y7ijum">
																				<p class="paragraph--full css-1k5dx4">S</p>
																			 </div>
																			 <div class="css-1y7ijum">
																				<p class="paragraph--full css-1k5dx4">S</p>
																			 </div>
																		  </div>
																		  <div class="css-1fcaqm7">
																			 '.$freeDay.'
																			 '.$monthDay.'
																			  
																		  </div>
																	   </div>
																	   <div id="spacer" spacing="large" class="css-swt4jz"></div>
																	</div>
																	
																	
																	<div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile1" class="expander-toggler dark_grey_txt xs-fsz16 tall bold"><div class="dflex wi_100">
									<div class="wi_70 dflex">
									 
								<span class="css-nacvcm hidden-xs"><img src="https://www.qloudid.com/html/usercontent/images/Cog.cda5.svg" class="css-z0f999"></span> 
								<div>
								<span class="apartheading">Additional calendar features</span><span class="aprtSubheading">Select a larger date range and view calendar sync</span>
								</div>
								</div> 
									<div class="wi_30 padt10">
															<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span>
									</div> 
									</div></a></div>
								<div id="profile1" class=" " style="display: none;">	
										 
									 <h2 class="css-17p273j tall">Block a large date range</h2>
									 <div id="spacer" spacing="large" class="css-swt4jz"></div>
									 <div class="css-q11xs2">
										   <div class="css-1cza8qp">
											  <label for="selected-date-range-start" class="css-779s0u tall">Start date</label>
											  <div id="spacer" spacing="smallest" class="css-184do0l"></div>
											  <div>
												 <div class="css-sc6wf2"><input type="date" placeholder="dd/mm/yyyy" id="selected-date-range-start" class="merlin-datepicker__input" min="'.date('d/m/Y').'" value="dd / mm / yyyy" onchange="updateButton(this.value);"></div>
											  </div>
										   </div>
										   <div id="spacer" spacing="small" class="css-1coujgl"></div>
										   <div class="css-1cza8qp">
											  <label for="selected-date-range-end" class="css-779s0u tall">End date</label>
											  <div id="spacer" spacing="smallest" class="css-184do0l"></div>
											  <div>
												 <div class="css-sc6wf2"><input type="date" placeholder="dd/mm/yyyy" id="selected-date-range-end" class="merlin-datepicker__input" value="dd / mm / yyyy" min="'.date('d/m/Y').'"></div>
											  </div>
										   </div>
										   <div id="spacer" spacing="small" class="css-1coujgl"></div>
										   <div id="rangeButton"><button color="#FFFFFF" disabled="" aria-label="" class="merlin-button merlin-button--disabled css-14nfyy1"  id="rangeButton">
											  <div class="merlin-button__content">Select</div>
										   </button></div>
										</div>
									  
									   <div class="clear"></div>
											
											</div>
											</div>
																	
																	
																	
																	
																	</div>
																	<div class="sidebar xs-wi_100 xxs-padl0 xs-padt20"><div class="css-3bonje"><div class="css-1y3g2x0"><div class="css-fl8v7o"><div class="css-4tan9g"><div class="css-1kq5lj2"><label for="" class="css-779s0u">0 nights selected</label></div></div></div></div></div></div>
																	</div>

																

																	</div>';
												
			 
			$dbCon->close();
			return $org;
		}
		
		
		
		function getCalender($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select * from hotel_checkout_detail where hotel_property_type=2 and room_type_id=? and is_paid=1");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$orgDate=array();
			$j=0;
			while($row = $result->fetch_assoc())  
				 { 
					$dateUpdate=$row['checkin_booking_date'];
					while($dateUpdate<=$row['checkout_booking_date'])
					 {
					$orgDate[$j]=$dateUpdate; 
					$nDate=date('Y-m-d',$dateUpdate);
					$dateUpdate=strtotime($nDate.'+1 days');
					$j++; 
					 } 
				}
			$array=explode('-',$data['time']);
			$option='';
			for($i=0; $i<12; $i++)
			{
			$cur=strtotime($data['time']);
			$t=	strtotime("+".$i." months", strtotime(date('Y-m-d')));
			if($cur==$t)
			{
				$selectedM='selected';
			}
			else
			{
			$selectedM='';	
			}
			$option=$option.'<option value="'.date('Y-m-d', $t).'" '.$selectedM.'>'.date('M Y', $t).'</option>';	
			}
			 $a=$array[1];
			 $b=$array[0];
			 $c='01-'.$a.'-'.$b;
			 $d=cal_days_in_month(CAL_GREGORIAN,$a,$b);
			 $d1 = new DateTime($c);
			$day=$d1->format('w');
			if($day==0)
			{
				$day=7;
			}
			$freeDay='';
			for($i=1; $i<$day; $i++)
			{
				$freeDay=$freeDay.'<div class="css-0 css-r942d4 nobrd"></div>';
			}
			
			$monthDay='';
			for($i=1; $i<=$d; $i++)
			{
			$c=strtotime($i.'-'.$a.'-'.$b);	
			$stmt = $dbCon->prepare("select count(blocked_date) as num from user_apartment_blocked_dates where user_address_id=? and blocked_date=?");
			$stmt->bind_param("ii", $aid,$c);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(in_array($c,$orgDate))
			{
				$booked='yellow_bg_f6fe8b';
			}
			else
			{
				$booked='';	
			}
				 if($row['num']==0)
				 {
					$monthDay=$monthDay.'<div tabindex="0" class="css-7pkrw2 css-1pyvcd8 brd '.$booked.'" id="'.$c.'" onclick="updateSelect('.$c.');">'.$i.'</div>'; 
				 }
				else
				{
					
					$monthDay=$monthDay.'<div tabindex="0" class="css-83y958 css-1pyvcd8 brd '.$booked.'" id="'.$c.'"  onclick="updateSelect('.$c.');">'.$i.'<svg><line y1="100%" x2="100%"></line></svg></div>';
				}
			}
			$org='<div class="marrl40 xs-marrl0">
			<div class="css-q1h1h1 visible_si">
			<div class="css-67ir15 xs-wi_100">
			<div class="css-fpoi9n padb20">
   <div>
      <div class="css-11e5cyp">
         <select id="month-select"  data-testid="month-select" class="css-7hhc40" onchange="getNewCalander(this.value);">
            '.$option.'
             
           
         </select>
      </div>
   </div>
   <div style="display: flex;">
       <button color="#444444" data-testid="icon-button--left" label="previous month" class="merlin-button css-6t4pca" aria-label="previous month"  onclick="updateNextCalender(-1);">
         <div class="merlin-button__content">
            <div class="css-ibdtyj">
               <div class="css-1ub2kfg">
                  <div data-testid="icon-button--icon-div" class="css-158wap"></div>
               </div>
            </div>
         </div>
      </button> 
     <button color="#444444" data-testid="icon-button--right" label="next month" class="merlin-button css-6t4pca" aria-label="next month" onclick="updateNextCalender(1);">
         <div class="merlin-button__content">
            <div class="css-ibdtyj">
               <div class="css-1ub2kfg">
                  <div data-testid="icon-button--icon-div" class="css-c5a3uv"></div>
               </div>
            </div>
         </div>
      </button> 
   </div>
</div>
			<div class="calendar-column">
			<div class="css-vnf14w">
			 <div class="css-1g9m4ae">
																			 <div class="css-1y7ijum">
																				<p class="paragraph--full css-1k5dx4">M</p>
																			 </div>
																			 <div class="css-1y7ijum">
																				<p class="paragraph--full css-1k5dx4">T</p>
																			 </div>
																			 <div class="css-1y7ijum">
																				<p class="paragraph--full css-1k5dx4">W</p>
																			 </div>
																			 <div class="css-1y7ijum">
																				<p class="paragraph--full css-1k5dx4">T</p>
																			 </div>
																			 <div class="css-1y7ijum">
																				<p class="paragraph--full css-1k5dx4">F</p>
																			 </div>
																			 <div class="css-1y7ijum">
																				<p class="paragraph--full css-1k5dx4">S</p>
																			 </div>
																			 <div class="css-1y7ijum">
																				<p class="paragraph--full css-1k5dx4">S</p>
																			 </div>
																		  </div>
																		  <div class="css-1fcaqm7">
																			 '.$freeDay.'
																			 '.$monthDay.'
																			  
																		  </div>
																	   </div>
																	   <div id="spacer" spacing="large" class="css-swt4jz"></div>
																	</div>
																	
																	
																	<div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20 padb20">
								<a href="#profile1" class="expander-toggler dark_grey_txt xs-fsz16 tall bold"><div class="dflex wi_100">
									<div class="wi_70 dflex">
									 
								<span class="css-nacvcm hidden-xs"><img src="https://www.qloudid.com/html/usercontent/images/Cog.cda5.svg" class="css-z0f999"></span> 
								<div>
								<span class="apartheading">Additional calendar features</span><span class="aprtSubheading">Select a larger date range and view calendar sync</span>
								</div>
								</div> 
									<div class="wi_30 padt10">
															<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span>
									</div> 
									</div></a></div>
								<div id="profile1" class=" " style="display: none;">	
										 
									 <h2 class="css-17p273j tall">Block a large date range</h2>
									 <div id="spacer" spacing="large" class="css-swt4jz"></div>
									 <div class="css-q11xs2">
										   <div class="css-1cza8qp">
											  <label for="selected-date-range-start" class="css-779s0u tall">Start date</label>
											  <div id="spacer" spacing="smallest" class="css-184do0l"></div>
											  <div>
												 <div class="css-sc6wf2"><input type="date" placeholder="dd/mm/yyyy" id="selected-date-range-start" class="merlin-datepicker__input" min="'.date('d/m/Y').'" value="dd / mm / yyyy" onchange="updateButton(this.value);"></div>
											  </div>
										   </div>
										   <div id="spacer" spacing="small" class="css-1coujgl"></div>
										   <div class="css-1cza8qp">
											  <label for="selected-date-range-end" class="css-779s0u tall">End date</label>
											  <div id="spacer" spacing="smallest" class="css-184do0l"></div>
											  <div>
												 <div class="css-sc6wf2"><input type="date" placeholder="dd/mm/yyyy" id="selected-date-range-end" class="merlin-datepicker__input" value="dd / mm / yyyy" min="'.date('d/m/Y').'"></div>
											  </div>
										   </div>
										   <div id="spacer" spacing="small" class="css-1coujgl"></div>
										   <div id="rangeButton"><button color="#FFFFFF" disabled="" aria-label="" class="merlin-button merlin-button--disabled css-14nfyy1"  id="rangeButton">
											  <div class="merlin-button__content">Select</div>
										   </button></div>
										</div>
									  
									   <div class="clear"></div>
											
											</div>
											</div>
																	
																	
																	
																	
																	</div>
																	<div class="sidebar xs-wi_100 xxs-padl0 xs-padt20"><div class="css-3bonje"><div class="css-1y3g2x0"><div class="css-fl8v7o"><div class="css-4tan9g"><div class="css-1kq5lj2"><label for="" class="css-779s0u">0 nights selected</label></div></div></div></div></div></div>
																	</div>

																

																	</div>';
												
			 
			$dbCon->close();
			return $org;
		}
		
		function getSidebar($data)
		{
			 
			$_POST['update_info']=substr($_POST['update_info'],0,-1);	
			 
			 if($_POST['updateShow']==1)
				{
					$showDetail='<fieldset class="css-zyp8se" id="showProperty">
                  <legend class="css-t2g512">Show property as</legend>
                  <div id="spacer" spacing="small" class="css-1coujgl"></div>
                  <div class="css-1kbx24p">
									 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
										<label class="tbp-radio tbp-radio--checked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" for="A standalone shower-walk in">
										   <a href="javascript:void(0);" onclick="updateShowProperty(1);"><div class="tbp-radio__container">
											  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--checked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" id="A standalone shower-walk in" name="A standalone shower" value="walk in" checked>
											  <div class="tbp-radio__button"></div>
											  <div class="tbp-radio__label">Available</div>
										   </div></a>
										   <div class="tbp-radio__children"></div>
										</label>
									 </div>
								  </div>
								  <div id="spacer" spacing="small" class="css-1coujgl"></div>
								  <div class="css-1kbx24p">
									 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
										<label class="tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath">
										  <a href="javascript:void(0);" onclick="updateShowProperty(2);"> <div class="tbp-radio__container">
											  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="An over-bath shower-over bath" name="An over-bath shower" value="over bath">
											  <div class="tbp-radio__button"></div>
											  <div class="tbp-radio__label">Blocked</div>
										   </div></a>
										   <div class="tbp-radio__children"></div>
										</label>
									 </div>
								  </div>
               </fieldset>';
				}
				else
				{
					$showDetail='<fieldset class="css-zyp8se" id="showProperty">
                  <legend class="css-t2g512">Show property as</legend>
                  <div id="spacer" spacing="small" class="css-1coujgl"></div>
                 <div class="css-1kbx24p">
								 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
									<label class="tbp-radio tbp-radio--unchecked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" for="A standalone shower-walk in">
									   <a href="javascript:void(0);" onclick="updateShowProperty(1);"> <div class="tbp-radio__container">
										  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" id="A standalone shower-walk in" name="A standalone shower" value="walk in" >
										  <div class="tbp-radio__button"></div>
										  <div class="tbp-radio__label">Available</div>
									   </div></a>
									   <div class="tbp-radio__children"></div>
									</label>
								 </div>
							  </div>
							  <div id="spacer" spacing="small" class="css-1coujgl"></div>
							  <div class="css-1kbx24p">
								 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
									<label class="tbp-radio tbp-radio--checked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath">
									   <a href="javascript:void(0);" onclick="updateShowProperty(2);"><div class="tbp-radio__container">
										  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--checked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="An over-bath shower-over bath" name="An over-bath shower" value="over bath" checked>
										  <div class="tbp-radio__button"></div>
										  <div class="tbp-radio__label">Blocked</div>
									   </div></a>
									   <div class="tbp-radio__children"></div>
									</label>
								 </div>
							  </div>
               </fieldset> ';
				}
			$a=array();
			$a=explode(',',$_POST['update_info']);
			 
			$count=count($a);
			if($a[0]=='' || $a[0]==null)
			{
			$count=0;	
			}
			if($count==0)
			{
			$org='<div class="css-3bonje"><div class="css-1y3g2x0"><div class="css-fl8v7o"><div class="css-4tan9g"><div class="css-1kq5lj2"><label for="" class="css-779s0u">0 nights selected</label></div></div></div></div></div></div>
			 														</div>';
																	return $org;
			}
			else
			{
			if($count==1)
			{
				
				
				$org='<div class="css-3bonje">
   <div class="css-1y3g2x0">
      <div class="css-112c7c5">
         <div class="css-ff4nxh">
            <div class="css-1kq5lj2">
               <label for="" class="css-779s0u">1 night selected</label>
               <div data-testid="date-selection" class="css-1yiu94c"><span>'.date('d F, Y', (int)$a['0']).'</span><span></span> <span> </span></div>
            </div>
         </div>
      </div>
      <div class="css-xfm92q">
         <span type="available" class="css-g8zwok">Available</span>
         <div id="spacer" spacing="small" class="css-1coujgl"></div>
         <h2 class="css-17p273j" >These night are available for guests to book.</h2>
      </div>
      <div class="css-1kvf57h">
         <hr class="css-c2sgj1">
         <div data-testid="context-blocker">
            <div data-testid="blocked-choice" class="css-1hjv3fl">
               '.$showDetail.'
            </div>
         </div>
         <div id="spacer" spacing="standard" class="css-vqlgan"></div>
         <div class="css-2hqxzg">
            <button color="#FFFFFF" data-testid="context-confirm" aria-label="" class="merlin-button css-t4itr7" onclick="updateSelectedBlock();">
               <div class="merlin-button__content" >Confirm</div>
            </button>
            <button color="#444444" data-testid="context-cancel" aria-label="" class="merlin-button css-16dd4ba" onclick="updateSelectedCancle();">
               <div class="merlin-button__content" >Cancel</div>
            </button>
         </div>
         <div id="spacer" spacing="standard" class="css-vqlgan"></div>
      </div>
   </div>
</div>';

return $org;
			}
			else
			{
				$select='';
				foreach($a as $key)
				{
				$select=$select.'<div data-testid="date-selection" class="css-1yiu94c"><span>'.date('d F, Y', (int)$key).'</span><span></span> <span> </span></div>';
				}
				$org='<div class="css-3bonje">
   <div class="css-1y3g2x0">
      <div class="css-112c7c5">
         <div class="css-ff4nxh">
            <div class="css-1kq5lj2">
               <label for="" class="css-779s0u">'.$count.' night selected</label>
               <div data-testid="date-selection" class="css-1yiu94c"><span>'.$select.'</span><span></span> <span> </span></div>
            </div>
         </div>
      </div>
      <div class="css-xfm92q">
         <span type="available" class="css-g8zwok">Available</span>
         <div id="spacer" spacing="small" class="css-1coujgl"></div>
         <h2 class="css-17p273j" >These night are available for guests to book.</h2>
      </div>
      <div class="css-1kvf57h">
         <hr class="css-c2sgj1">
         <div data-testid="context-blocker">
            <div data-testid="blocked-choice" class="css-1hjv3fl">
            '. $showDetail.'
            </div>
         </div>
         <div id="spacer" spacing="standard" class="css-vqlgan"></div>
         <div class="css-2hqxzg">
            <button color="#FFFFFF" data-testid="context-confirm" aria-label="" class="merlin-button css-t4itr7" onclick="updateSelectedBlock();">
               <div class="merlin-button__content" >Confirm</div>
            </button>
            <button color="#444444" data-testid="context-cancel" aria-label="" class="merlin-button css-16dd4ba" onclick="updateSelectedCancle();">
               <div class="merlin-button__content" >Cancel</div>
            </button>
         </div>
         <div id="spacer" spacing="standard" class="css-vqlgan"></div>
      </div>
   </div>
</div>';

return $org;
			}	
			}
			
	
 
		}
		function updateSmoking($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update user_address set smoking_allowed=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateNickname($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update user_address set nickname_updated=1,property_nickname=? where id=?");
			$stmt->bind_param("si",$_POST['propertyNickname'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateHeading($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update user_address set headline_updated=1,property_heading=? where id=?");
			$stmt->bind_param("si",$_POST['propertyNickname'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateSalePrice($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update user_address set sale_price=?,sale_price_per_m=? where id=?");
			$stmt->bind_param("ssi",$_POST['sale_price'],$_POST['sale_price_per_m'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateMonthlyPrice($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update user_address set monthly_price=? where id=?");
			$stmt->bind_param("si",$_POST['salePrice'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateCancellationPolicy($data)
		{
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("update user_address set cancellation_policy=? where id=?");
			$stmt->bind_param("si", $_POST['policyType'],$aid);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updatePolicy($data)
		{
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("update user_address set policy_updated=1 where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateChannelPolicy($data)
		{
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("update user_address set channels_updated=1 where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateRent($data)
		{
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select publish_dstrict_rent,publish_dstrict_long_rent, total_channels from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if($row['publish_dstrict_rent']==0)
			{
				$ttl=$row['total_channels']+1;
				$stmt = $dbCon->prepare("update user_address set publish_dstrict_rent=1, total_channels=? where id=?");
			}
			else
			{
				$ttl=$row['total_channels']-1;
				$stmt = $dbCon->prepare("update user_address set publish_dstrict_rent=0, total_channels=? where id=?");
			}
			 
			$stmt->bind_param("ii", $ttl,$aid);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return $ttl;
		}
		
		
		function updatePublishRentLong($data)
		{
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select publish_dstrict_long_rent, total_channels from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if($row['publish_dstrict_long_rent']==0)
			{
				$ttl=$row['total_channels']+1;
				$stmt = $dbCon->prepare("update user_address set publish_dstrict_long_rent=1, total_channels=? where id=?");
			}
			else
			{
				$ttl=$row['total_channels']-1;
				$stmt = $dbCon->prepare("update user_address set publish_dstrict_long_rent=0, total_channels=? where id=?");
			}
			 
			$stmt->bind_param("ii", $ttl,$aid);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return $ttl;
		}
		
		function updateSale($data)
		{
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select publish_dstrict_sale, total_channels from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if($row['publish_dstrict_sale']==0)
			{
				$ttl=$row['total_channels']+1;
				$stmt = $dbCon->prepare("update user_address set publish_dstrict_sale=1, total_channels=? where id=?");
			}
			else
			{
				$ttl=$row['total_channels']-1;
				$stmt = $dbCon->prepare("update user_address set publish_dstrict_sale=0, total_channels=? where id=?");
			}
			 
			$stmt->bind_param("ii", $ttl,$aid);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return $ttl;
		}
		
		
		
		function updateAir($data)
		{
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select publish_airnub, total_channels from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if($row['publish_airnub']==0)
			{
				$ttl=$row['total_channels']+1;
				$stmt = $dbCon->prepare("update user_address set publish_airnub=1, total_channels=? where id=?");
			}
			else
			{
				$ttl=$row['total_channels']-1;
				$stmt = $dbCon->prepare("update user_address set publish_airnub=0, total_channels=? where id=?");
			}
			 
			$stmt->bind_param("ii", $ttl,$aid);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return $ttl;
		}
		
		
		function updateBookingChannel($data)
		{
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select publish_booking, total_channels from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if($row['publish_booking']==0)
			{
				$ttl=$row['total_channels']+4;
				$stmt = $dbCon->prepare("update user_address set publish_booking=1, total_channels=? where id=?");
			}
			else
			{
				$ttl=$row['total_channels']-4;
				$stmt = $dbCon->prepare("update user_address set publish_booking=0, total_channels=? where id=?");
			}
			 
			$stmt->bind_param("ii", $ttl,$aid);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return $ttl;
		}
		
		
		function updateExpedia($data)
		{
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select publish_exptd, total_channels from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if($row['publish_exptd']==0)
			{
				$ttl=$row['total_channels']+20;
				$stmt = $dbCon->prepare("update user_address set publish_exptd=1, total_channels=? where id=?");
			}
			else
			{
				$ttl=$row['total_channels']-20;
				$stmt = $dbCon->prepare("update user_address set publish_exptd=0, total_channels=? where id=?");
			}
			 
			$stmt->bind_param("ii", $ttl,$aid);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return $ttl;
		}
		
		function updateVrbo($data)
		{
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select publish_vrbo, total_channels from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if($row['publish_vrbo']==0)
			{
				$ttl=$row['total_channels']+2;
				$stmt = $dbCon->prepare("update user_address set publish_vrbo=1, total_channels=? where id=?");
			}
			else
			{
				$ttl=$row['total_channels']-2;
				$stmt = $dbCon->prepare("update user_address set publish_vrbo=0, total_channels=? where id=?");
			}
			 
			$stmt->bind_param("ii", $ttl,$aid);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return $ttl;
		}
		
		
			function updateTrip($data)
		{
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select publish_trip,total_channels from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if($row['publish_trip']==0)
			{
				$ttl=$row['total_channels']+2;
				$stmt = $dbCon->prepare("update user_address set publish_trip=1, total_channels=? where id=?");
			}
			else
			{
				$ttl=$row['total_channels']-2;
				$stmt = $dbCon->prepare("update user_address set publish_trip=0, total_channels=? where id=?");
			}
			 
			$stmt->bind_param("ii", $ttl,$aid);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return $ttl;
		}
		
		
		function updateTui($data)
		{
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select publish_tui, total_channels from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if($row['publish_tui']==0)
			{
				$ttl=$row['total_channels']+2;
				$stmt = $dbCon->prepare("update user_address set publish_tui=1, total_channels=? where id=?");
			}
			else
			{
				$ttl=$row['total_channels']-2;
				$stmt = $dbCon->prepare("update user_address set publish_tui=0, total_channels=? where id=?");
			}
			 
			$stmt->bind_param("ii", $ttl,$aid);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return $ttl;
		}
		
		function channelsSelected($data)
		{
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update user_address set publish_exptd=1,publish_dstrict_rent=1,publish_dstrict_sale=1,publish_airnub=1,publish_dstrict_sale=1,publish_booking=1,publish_vrbo=1, publish_trip=1,publish_tui=1, total_channels=35 where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();	
			
			$org='  
   <div width="50" class="css-9laphc">
   
    <div data-testid="checked-accordion" class="css-1dgq259" id="rent">
         <div class="css-1ykgisf">
            <div data-testid="accordion-header" role="button" class="css-hdn4uk">
               <div class="css-h54deh">
			   
			   <img src="../../../../html/usercontent/images/icons/airbnb.svg" height="44" width="40"></div>
               <div class="css-dwbcy3">
                  <div>Dstricts</div>
                   <div>For rent only.</div>
               </div>
               
            </div>
            <div class="css-1c7lyzi">
			<input data-testid="test-checkbox-Airbnb-checkbox" name="rent-checkbox" type="checkbox" class="css-1lgzhz8" checked="" onclick="updateRent(0);"></div>
         </div>
          
          
      </div>
      
   
   
   
      <div data-testid="checked-accordion" class="css-1dgq259">
         <div class="css-1ykgisf">
            <div data-testid="accordion-header" role="button" class="css-hdn4uk" id="air">
               <div class="css-h54deh">
			   
			   <img src="../../../../html/usercontent/images/icons/airbnb.svg" height="44" width="40"></div>
               <div class="css-dwbcy3">
                  <div>Airbnb</div>
                  <div></div>
               </div>
               
            </div>
            <div class="css-1c7lyzi" id="sale"><input data-testid="test-checkbox-Airbnb-checkbox" name="sale-checkbox" type="checkbox" class="css-1lgzhz8" checked="" onclick="updateAir(0);"></div>
         </div>
          
          
      </div>
      <div data-testid="checked-accordion" class="css-1dgq259">
         <div class="css-1ykgisf">
            <div data-testid="accordion-header" role="button" class="css-hdn4uk" id="booking">
               <div class="css-h54deh"><img src="../../../../html/usercontent/images/icons/booking.svg" height="44" width="40"></div>
               <div class="css-dwbcy3">
                  <div>Booking.com</div>
                  <div>+3 affiliate channels.</div>
               </div>
               
            </div>
            <div class="css-1c7lyzi"><input data-testid="test-checkbox-Booking.com-checkbox" name="Booking.com-checkbox" type="checkbox" class="css-1lgzhz8" checked="" onclick="updateBooking(0);"></div>
         </div>
         
          
      </div>
      <div data-testid="checked-accordion" class="css-1dgq259">
         <div class="css-1ykgisf">
            <div data-testid="accordion-header" role="button" class="css-hdn4uk" id="expd">
               <div class="css-h54deh"><img src="../../../../html/usercontent/images/icons/expedia.svg" height="44" width="40"></div>
               <div class="css-dwbcy3">
                  <div>Expedia</div>
                  <div>+19 affiliate channels.</div>
               </div>
               
            </div>
            <div class="css-1c7lyzi"><input data-testid="test-checkbox-Expedia-checkbox" name="Expedia-checkbox" type="checkbox" class="css-1lgzhz8" checked="" onclick="updateExpedia(0);"></div>
         </div>
        
         
      </div>
   </div>
   <div width="50" class="css-9laphc">
     
<div data-testid="checked-accordion" class="css-1dgq259">
         <div class="css-1ykgisf">
            <div data-testid="accordion-header" role="button" class="css-hdn4uk" id="sale">
               <div class="css-h54deh"><img src="../../../../html/usercontent/images/icons/booking.svg" height="44" width="40"></div>
               <div class="css-dwbcy3">
                  <div>Dstricts</div>
                  <div>For sale only.</div>
               </div>
               
            </div>
            <div class="css-1c7lyzi"><input data-testid="test-checkbox-Booking.com-checkbox" name="Booking.com-checkbox" type="checkbox" class="css-1lgzhz8" checked="" onclick="updateSale(0);"></div>
         </div>
         
          
      </div>
     

	 <div data-testid="checked-accordion" class="css-1dgq259">
         <div class="css-1ykgisf">
            <div data-testid="accordion-header" role="button" class="css-hdn4uk" id="vrbo">
               <div class="css-h54deh"><img src="../../../../html/usercontent/images/icons/vrbo.svg" height="44" width="40"></div>
               <div class="css-dwbcy3">
                  <div>VRBO</div>
                  <div>+1 affiliate channels.</div>
               </div>
               
            </div>
            <div class="css-1c7lyzi"><input data-testid="test-checkbox-VRBO-checkbox" name="VRBO-checkbox" type="checkbox" class="css-1lgzhz8" checked="" onclick="updateVrbo(0);"></div>
         </div>
           
         
      </div>
      <div data-testid="checked-accordion" class="css-1dgq259">
         <div class="css-1ykgisf">
            <div data-testid="accordion-header" role="button" class="css-hdn4uk" id="trip">
               <div class="css-h54deh"><img src="../../../../html/usercontent/images/icons/tripadvisor.svg" height="44" width="40"></div>
               <div class="css-dwbcy3">
                  <div>TripAdvisor</div>
                  <div>+3 affiliate channels.</div>
               </div>
               
            </div>
            <div class="css-1c7lyzi"><input data-testid="test-checkbox-TripAdvisor-checkbox" name="TripAdvisor-checkbox" type="checkbox" class="css-1lgzhz8" checked="" onclick="updateTrip(0);"></div>
         </div>
          
          
      </div>
      <div data-testid="checked-accordion" class="css-1dgq259">
         <div class="css-1ykgisf">
            <div data-testid="accordion-header" role="button" class="css-hdn4uk" id="tui">
               <div class="css-h54deh"><img src="../../../../html/usercontent/images/icons/tui.fe30.svg" height="44" width="40"></div>
               <div class="css-dwbcy3">
                  <div>TUI</div>
                  <div>+1 affiliate channels.</div>
               </div>
               
            </div>
            <div class="css-1c7lyzi"><input data-testid="test-checkbox-TUI-checkbox" name="TUI-checkbox" type="checkbox" class="css-1lgzhz8" checked="" onclick="updateTui(0);"></div>
         </div>
        
        
      </div>
   </div> ';
   $stmt->close();
	$dbCon->close();  
   return $org;
		}
		function updateDescription($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update user_address set description_updated=1,apartment_description=? where id=?");
			$stmt->bind_param("si",$_POST['propertyNickname'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updatePhotoOrder($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select sorting_number from user_apartment_photos where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$newSort=$row['sorting_number']+$_POST['addDelete'];
			
			
			$stmt = $dbCon->prepare("select id from user_apartment_photos where sorting_number=? and user_address_id=?");
			$stmt->bind_param("ii", $newSort,$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();	
			
			$stmt = $dbCon->prepare("update user_apartment_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row['sorting_number'], $row1['id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("update user_apartment_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $_POST['photoId']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updatePhotoKeyDecrement($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select sorting_number from user_apartment_key_photos where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$newSort=$row['sorting_number']+$_POST['addDelete'];
			
			
			$stmt = $dbCon->prepare("select id from user_apartment_key_photos where sorting_number=? and user_address_id=?");
			$stmt->bind_param("ii", $newSort,$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();	
			
			$stmt = $dbCon->prepare("update user_apartment_key_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row['sorting_number'], $row1['id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("update user_apartment_key_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $_POST['photoId']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updatePhotoDragging($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select sorting_number from user_apartment_photos where id=?");
			$stmt->bind_param("i", $_POST['draggedItem']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select sorting_number from user_apartment_photos where id=?");
			$stmt->bind_param("i", $_POST['draggedTarget']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();
			 
			if($row1['sorting_number']>$row['sorting_number'])
			{
			$stmt = $dbCon->prepare("select id,sorting_number from user_apartment_photos where sorting_number>? and id<=? and user_address_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
			$newSort=$rowUpdate['sorting_number']-1;
			$stmt = $dbCon->prepare("update user_apartment_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			else
			{
			$stmt = $dbCon->prepare("select id,sorting_number from user_apartment_photos where sorting_number<? and id>=? and user_address_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
				$newSort=$rowUpdate['sorting_number']+1;
			$stmt = $dbCon->prepare("update user_apartment_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			
			$stmt = $dbCon->prepare("update user_apartment_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row1['sorting_number'], $_POST['draggedItem']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateKeyPhotoDragging($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select sorting_number from user_apartment_key_photos where id=?");
			$stmt->bind_param("i", $_POST['draggedItem']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select sorting_number from user_apartment_key_photos where id=?");
			$stmt->bind_param("i", $_POST['draggedTarget']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();
			 
			if($row1['sorting_number']>$row['sorting_number'])
			{
			$stmt = $dbCon->prepare("select id,sorting_number from user_apartment_key_photos where sorting_number>? and id<=? and user_address_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
			$newSort=$rowUpdate['sorting_number']-1;
			$stmt = $dbCon->prepare("update user_apartment_key_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			else
			{
			$stmt = $dbCon->prepare("select id,sorting_number from user_apartment_key_photos where sorting_number<? and id>=? and user_address_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
				$newSort=$rowUpdate['sorting_number']+1;
			$stmt = $dbCon->prepare("update user_apartment_key_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			
			$stmt = $dbCon->prepare("update user_apartment_key_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row1['sorting_number'], $_POST['draggedItem']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function deletePhoto($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select sorting_number from user_apartment_photos where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("delete from  user_apartment_photos where id=?");
			$stmt->bind_param("i",$_POST['photoId']);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select id,sorting_number from user_apartment_photos where sorting_number>? and user_address_id=?");
			$stmt->bind_param("ii", $row['sorting_number'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row1 = $result->fetch_assoc())	
			{
				$newSort=$row1['sorting_number']-1;
			$stmt = $dbCon->prepare("update user_apartment_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $row1['id']);
			$stmt->execute();		
			}
			 
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function deleteKeyPhoto($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select count(user_address_id) as num from user_apartment_key_photos where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==1)
			{
			$stmt->close();
			$dbCon->close();
			return 0;	
			}
			$stmt = $dbCon->prepare("select sorting_number from user_apartment_key_photos where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("delete from  user_apartment_key_photos where id=?");
			$stmt->bind_param("i",$_POST['photoId']);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select id,sorting_number from user_apartment_key_photos where sorting_number>? and user_address_id=?");
			$stmt->bind_param("ii", $row['sorting_number'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row1 = $result->fetch_assoc())	
			{
				$newSort=$row1['sorting_number']-1;
			$stmt = $dbCon->prepare("update user_apartment_key_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $row1['id']);
			$stmt->execute();		
			}
			 
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateApartmentKeyInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			if($_POST['key_available']==0)
			{
			$stmt = $dbCon->prepare("update user_address set key_available=0,key_description='',total_keys=0,key_updated=1 where id=?");
			$stmt->bind_param("i",$aid);
			$stmt->execute();
			$stmt = $dbCon->prepare("delete from  user_apartment_key_photos where user_address_id=?");
			$stmt->bind_param("i",$aid);
			$stmt->execute();
			}
			else
			{
			$_POST['key_description']=htmlentities($_POST['key_description'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("update user_address set key_available=1,key_description=?,total_keys=?,key_updated=1 where id=?");
			$stmt->bind_param("sii",$_POST['key_description'],$_POST['total_keys'],$aid);
			$stmt->execute();
			}
			 
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		
		function keyPhotoCount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select count(user_address_id) as num from user_apartment_key_photos where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		
		
		
		function updatePhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$data1 = strip_tags($_POST['update_info']);
			define('UPLOAD_DIR','../estorecss/'); 
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			
			$stmt = $dbCon->prepare("select count(user_address_id) as num from user_apartment_photos where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$snumber=$row['num']+1;
			 
			$stmt = $dbCon->prepare("insert into user_apartment_photos (apartment_photo_path,user_address_id,sorting_number) values(?, ?, ?)");
			$stmt->bind_param("sii",$img_name1, $aid,$snumber);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateKeyPhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$data1 = strip_tags($_POST['update_info']);
			define('UPLOAD_DIR','../estorecss/'); 
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			
			$stmt = $dbCon->prepare("select count(user_address_id) as num from user_apartment_key_photos where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$snumber=$row['num']+1;
			 
			$stmt = $dbCon->prepare("insert into user_apartment_key_photos (apartment_photo_path,user_address_id,sorting_number) values(?, ?, ?)");
			$stmt->bind_param("sii",$img_name1, $aid,$snumber);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function generatePricing($data)
		{
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$today=strtotime(date('Y-m-d'));
			$endDate=strtotime($_POST['date_picker']);
			
			$stmt = $dbCon->prepare("delete from user_apartment_pricing_info where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();	
			
			if($endDate>$today)
			{
			$gapEnd=strtotime("-1 days", $endDate);
			$st=1;
			$stmt = $dbCon->prepare("insert into user_apartment_pricing_info (pricing_start_date,pricing_end_date,user_address_id,created_on,is_deleted,monday_open,tuesday_open,wednesday_open,thursday_open,friday_open,saturday_open,sunday_open) values(?, ?, ?, now(),?,?, ?, ?,?, ?, ?,?)");
			$stmt->bind_param("iiiiiiiiiii",$today,$gapEnd, $aid,$st,$_POST['monday'],$_POST['tuesday'],$_POST['wednesday'],$_POST['thursday'],$_POST['friday'],$_POST['saturday'],$_POST['sunday']);
			$stmt->execute();	
			}
			 
			
			$endDate=strtotime($_POST['date_picker']);
			for($i=0; $i<24;$i++)
			{
				 $startDate=strtotime("+".$i." days", $endDate);
				 $month=date('m',$startDate);
				 $title=date('M Y',$startDate);
				 $d=date('Y-m-d',$startDate);
				 $date = new DateTime($d);
				 $date->modify('last day of this month');
				 $endDate=strtotime($date->format('Y-m-d'));  
				 $stmt = $dbCon->prepare("select * from season_apartment_price where season_id=? and month_id=?");
				 $stmt->bind_param("ii", $_POST['seasonality_template'],$month);
				 $stmt->execute();
				 $result = $stmt->get_result();
				 $row = $result->fetch_assoc();
				 $monday_price=round($row['mon']*($_POST['standard_price_per_night']/100),0);
				 $tuesday_price=round($row['tue']*($_POST['standard_price_per_night']/100),0);
				 $wednesday_price=round($row['wed']*($_POST['standard_price_per_night']/100),0);
				 $thursday_price=round($row['thu']*($_POST['standard_price_per_night']/100),0);
				 $friday_price=round($row['fri']*($_POST['standard_price_per_night']/100),0);
				 $saturday_price=round($row['sat']*($_POST['standard_price_per_night']/100),0);
				 $sunday_price=round($row['sun']*($_POST['standard_price_per_night']/100),0);
				 $minimum_price=round($row['min_price']*($_POST['standard_price_per_night']/100),0);
				 $maximum_price=round($row['max_price']*($_POST['standard_price_per_night']/100),0); 
				 $stmt = $dbCon->prepare("insert into user_apartment_pricing_info (pricing_start_date,pricing_end_date,user_address_id,created_on,monday_open,tuesday_open,wednesday_open,thursday_open,friday_open,saturday_open,sunday_open,pricing_title,shortest_duration,monday_price,tuesday_price,wednesday_price,thursday_price,friday_price,saturday_price,sunday_price,minimum_price,maximum_price) values(?, ?, ?, now(),?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
				 $stmt->bind_param("ssiiiiiiiisiiiiiiiiii",$startDate,$endDate, $aid,$_POST['monday'],$_POST['tuesday'],$_POST['wednesday'],$_POST['thursday'],$_POST['friday'],$_POST['saturday'],$_POST['sunday'],$title,$_POST['t_nights'],$monday_price,$tuesday_price,$wednesday_price,$thursday_price,$friday_price,$saturday_price,$sunday_price,$minimum_price,$maximum_price);
				$stmt->execute();
				
			}
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function addPricing($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_pricing_info where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if($row['num']==0)
			{
				 
				$startdate=strtotime(date('Y-m-d'));
				$enddate=strtotime("+30 days", strtotime(date('Y-m-d')));
			}
			else
			{
			$stmt = $dbCon->prepare("select max(pricing_end_date) as edate from user_apartment_pricing_info where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$startdate=strtotime("+1 days", $row['edate']);	
			$enddate=strtotime("+30 days", $startdate);	
			}
			$stmt = $dbCon->prepare("insert into user_apartment_pricing_info (pricing_start_date,pricing_end_date,user_address_id,created_on) values(?, ?, ?, now())");
			$stmt->bind_param("iii",$startdate,$enddate, $aid);
			$stmt->execute();	
			$id=$stmt->insert_id;	
			$stmt->close();
			$dbCon->close();
			return $this->encrypt_decrypt('encrypt',$id);
		}
		
		function getCurrency($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			 
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_pricing_currency where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		function addCurrency($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_pricing_info where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCount = $result->fetch_assoc();
			 
			if($rowCount['num']==0)
			{ 
			$stmt = $dbCon->prepare("insert into user_apartment_pricing_currency (user_address_id,currency_id) values(?, ?)");
			$stmt->bind_param("ii", $aid,$_POST['currency_id']);
			$stmt->execute();	
			$id=$stmt->insert_id;	
			}
			else
			{
			$stmt = $dbCon->prepare("update user_apartment_pricing_currency set currency_id=? where user_address_id=?");
			$stmt->bind_param("ii",$_POST['currency_id'], $aid);
			$stmt->execute();		
			}
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		 function listPricing($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select * from user_apartment_pricing_currency where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if($row['currency_id']==1)
			{
				$curr='£';
			}
			else if($row['currency_id']==2)
			{
				$curr='€';
			}
			else if($row['currency_id']==3)
			{
				$curr='$';
			}
			
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_pricing_info where user_address_id=?  order by pricing_start_date");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCount = $result->fetch_assoc();
			
			if($rowCount['num']>0)
			{
			$stmt = $dbCon->prepare("update user_address set pricing_updated=1 where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();	
			}
			
			$stmt = $dbCon->prepare("select * from user_apartment_pricing_info where user_address_id=?  order by pricing_start_date");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<div id="spacer" spacing="large" class="css-swt4jz"></div>
												<hr class="css-1fky4oj">
												<div id="spacer" spacing="large" class="css-swt4jz"></div>
												<label for="pricing-periods" class="css-14q70q0">Upcoming pricing periods</label>
												<div id="spacer" spacing="large" class="css-swt4jz"></div>
												<hr class="css-1fky4oj">';
			while($row = $result->fetch_assoc())
			{
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				if($row['is_deleted']==0)
				{
				$org=$org.'<div id="spacer" spacing="standard" class="css-vqlgan"></div>
												<div data-testid="pricing-period-summary-2021-06-09" class="css-3298i1">
												   <div class="css-ibdtyj tall">
													  <div class="css-8bbc8q">'.$curr.'</div>
													  <div>
														 <div class="css-1hr55up">'.$row['pricing_title'].'</div>
														 <div class="css-bbjo5x">Starts on '.date('F jS Y',$row['pricing_start_date']).'</div>
														 <div class="css-bbjo5x">('.$curr.$row['minimum_price'].' to '.$curr.$row['maximum_price'].')</div>
													  </div>
												   </div>
												   <div class="css-1e2stsu">
													  <a href="../apartmentEditPricingInfo/'.$data['aid'].'/'.$enc.'" style="text-decoration:none;"><button color="#444444" class="merlin-button css-1gwp7cd" aria-label="">
														 <div class="merlin-button__content">Edit</div>
													  </button></a>
												   </div>
												</div>
												<div id="spacer" spacing="standard" class="css-vqlgan"></div>
												<hr class="css-1fky4oj">';	
				}
				else
				{
					$org=$org.' <div class="clear"></div><div id="spacer" spacing="standard" class="css-vqlgan"></div><div data-testid="pricing-period-gap-Sat Jul 10 2021-Mon Aug 09 2021"><div class="css-zp5g9l "><h2 class="css-s01aoq bold fleft">Pricing gap</h2><div id="spacer" spacing="small" class="css-1coujgl"></div><div data-testid="inline-error" class="css-71kgzi"><div class="css-1b35ggz fleft"><span class="icon-text-span_icon icon-text-span_icon-error"><div class="css-6ss84"></div></span><span class="icon-text-span_text red_txt  ">'.date('D M d Y', $row['pricing_start_date']).' - '.date('D M d Y', $row['pricing_end_date']).'</span></div></div><div id="spacer" spacing="standard" class="css-vqlgan  "></div>
					<button color="#444444" class="merlin-button css-1gwp7cd mart10" aria-label="" onclick="removePricingGap('.$row['id'].');">
														 <div class="merlin-button__content">Add pricing period</div>
													  </button>
					 
					</div></div><div id="spacer" spacing="standard" class="css-vqlgan"></div>
												<hr class="css-1fky4oj">';
				}
				
			}
			 
				
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		 function dayAvailable($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$pid=$this->encrypt_decrypt('decrypt',$data['pid']); 
			$stmt = $dbCon->prepare("select * from user_apartment_pricing_info where id=?");
			$stmt->bind_param("i", $pid);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$row = $result->fetch_assoc();
			if($row['monday_open']==1)
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateMondayOpen(0);"><div   class="css-cedhmb">
                        <div tabindex="0" role="button"   class="css-1w0xfwu">
                           <span class="chip chip_is-selected">
                              <span class="chip_content">
								<div class="css-utgzrm"></div>
								<span class="chip_text">Monday</span>
							</span>
                           </span>
                        </div>
                     </div></a>';	
			}
			else
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateMondayOpen(1);"><div   class="css-cedhmb">
														 <div tabindex="0" role="button"   class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Monday</span>
															   </span>
															</span>
														 </div>
													  </div></a>'	;
			}
			
			if($row['tuesday_open']==1)
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateTuesdayOpen(0);"><div   class="css-cedhmb">
                        <div tabindex="0" role="button"   class="css-1w0xfwu">
                           <span class="chip chip_is-selected">
                              <span class="chip_content">
								<div class="css-utgzrm"></div>
								<span class="chip_text">Tuesday</span>
							</span>
                           </span>
                        </div>
                     </div></a>'	;
			}
			else
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateTuesdayOpen(1);"><div   class="css-cedhmb">
														 <div tabindex="0" role="button"   class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Tuesday</span>
															   </span>
															</span>
														 </div>
													  </div></a>'	;
			}
			
			if($row['wednesday_open']==1)
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateWednesdayOpen(0);"><div   class="css-cedhmb">
                        <div tabindex="0" role="button"   class="css-1w0xfwu">
                           <span class="chip chip_is-selected">
                              <span class="chip_content">
								<div class="css-utgzrm"></div>
								<span class="chip_text">Wednesday</span>
							</span>
                           </span>
                        </div>
                     </div></a>';	
			}
			else
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateWednesdayOpen(1);"><div   class="css-cedhmb">
														 <div tabindex="0" role="button"   class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Wednesday</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
			}
			
			if($row['thursday_open']==1)
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateThursdayOpen(0);"><div   class="css-cedhmb">
                        <div tabindex="0" role="button"   class="css-1w0xfwu">
                           <span class="chip chip_is-selected">
                              <span class="chip_content">
								<div class="css-utgzrm"></div>
								<span class="chip_text">Thursday</span>
							</span>
                           </span>
                        </div>
                     </div></a>';	
			}
			else
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateThursdayOpen(1);"><div   class="css-cedhmb">
														 <div tabindex="0" role="button"   class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Thursday</span>
															   </span>
															</span>
														 </div>
													  </div></a>'	;
			}
			
			if($row['friday_open']==1)
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateFridayOpen(0);"><div   class="css-cedhmb">
                        <div tabindex="0" role="button"   class="css-1w0xfwu">
                           <span class="chip chip_is-selected">
                              <span class="chip_content">
								<div class="css-utgzrm"></div>
								<span class="chip_text">Friday</span>
							</span>
                           </span>
                        </div>
                     </div></a>'	;
			}
			else
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateFridayOpen(1);"><div   class="css-cedhmb">
														 <div tabindex="0" role="button"   class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Friday</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
			}
			
			if($row['saturday_open']==1)
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateSaturdayOpen(0);"><div   class="css-cedhmb">
                        <div tabindex="0" role="button"   class="css-1w0xfwu">
                           <span class="chip chip_is-selected">
                              <span class="chip_content">
								<div class="css-utgzrm"></div>
								<span class="chip_text">Saturday</span>
							</span>
                           </span>
                        </div>
                     </div></a>';	
			}
			else
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateSaturdayOpen(1);"><div   class="css-cedhmb">
														 <div tabindex="0" role="button"   class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Saturday</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
			}
			
			if($row['sunday_open']==1)
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateSundayOpen(0);"><div   class="css-cedhmb">
                        <div tabindex="0" role="button"   class="css-1w0xfwu">
                           <span class="chip chip_is-selected">
                              <span class="chip_content">
								<div class="css-utgzrm"></div>
								<span class="chip_text">Sunday</span>
							</span>
                           </span>
                        </div>
                     </div></a>'	;
			}
			else
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateSundayOpen(1);"><div   class="css-cedhmb">
														 <div tabindex="0" role="button"   class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Sunday</span>
															   </span>
															</span>
														 </div>
													  </div></a>'	;
			}
				
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function pricingDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$pid=$this->encrypt_decrypt('decrypt',$data['pid']); 
			$stmt = $dbCon->prepare("select * from user_apartment_pricing_info where id=?");
			$stmt->bind_param("i", $pid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		
		
		function updateSundayOpen($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			  
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set sunday_open=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateSaturdayOpen($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			  
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set saturday_open=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateFridayOpen($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			  
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set friday_open=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateThursdayOpen($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			  
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set thursday_open=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateWednesdayOpen($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			  
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set wednesday_open=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateTuesdayOpen($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			  
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set tuesday_open=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function updateMondayOpen($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			  
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set monday_open=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateSunday($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			  
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set sunday_price=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt = $dbCon->prepare("select monday_price,tuesday_price,wednesday_price,thursday_price,friday_price,saturday_price from user_apartment_pricing_info where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$max=max($row);
			$mini=min($row);
			if($mini>$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$max,$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			
			if($max<$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$_POST['update_info'],$mini, $aid);
			$stmt->execute();	
			}	
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateSaturday($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			  
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set saturday_price=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select monday_price,tuesday_price,wednesday_price,thursday_price,friday_price,sunday_price from user_apartment_pricing_info where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$max=max($row);
			$mini=min($row);
			if($mini>$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$max,$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			
			if($max<$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$_POST['update_info'],$mini, $aid);
			$stmt->execute();	
			}	
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateFriday($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			  
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set friday_price=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt = $dbCon->prepare("select monday_price,tuesday_price,wednesday_price,thursday_price,saturday_price,sunday_price from user_apartment_pricing_info where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$max=max($row);
			$mini=min($row);
			if($mini>$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$max,$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			
			if($max<$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$_POST['update_info'],$mini, $aid);
			$stmt->execute();	
			}
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateThursday($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			  
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set thursday_price=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt = $dbCon->prepare("select monday_price,tuesday_price,wednesday_price,friday_price,saturday_price,sunday_price from user_apartment_pricing_info where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$max=max($row);
			$mini=min($row);
			if($mini>$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$max,$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			
			if($max<$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$_POST['update_info'],$mini, $aid);
			$stmt->execute();	
			}
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateWednesday($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			  
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set wednesday_price=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt = $dbCon->prepare("select monday_price,tuesday_price,thursday_price,friday_price,saturday_price,sunday_price from user_apartment_pricing_info where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$max=max($row);
			$mini=min($row);
			if($mini>$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$max,$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			
			if($max<$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$_POST['update_info'],$mini, $aid);
			$stmt->execute();	
			}
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateTuesday($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			  
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set tuesday_price=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt = $dbCon->prepare("select monday_price,wednesday_price,thursday_price,friday_price,saturday_price,sunday_price from user_apartment_pricing_info where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$max=max($row);
			$mini=min($row);
			if($mini>$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$max,$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			
			if($max<$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$_POST['update_info'],$mini, $aid);
			$stmt->execute();	
			}
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function updateMonday($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			  
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set monday_price=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select tuesday_price,wednesday_price,thursday_price,friday_price,saturday_price,sunday_price from user_apartment_pricing_info where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$max=max($row);
			$mini=min($row);
			if($mini>$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$max,$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			
			if($max<$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$_POST['update_info'],$mini, $aid);
			$stmt->execute();	
			}
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateTitle($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			 
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set pricing_title=? where id=?");
			$stmt->bind_param("si",$_POST['title'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateMinimumNight($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			 
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set shortest_duration=? where id=?");
			$stmt->bind_param("si",$_POST['shortest_duration'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateDiscount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			 
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set discount_for_seven=? where id=?");
			$stmt->bind_param("si",$_POST['discount_for_seven'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateEndDate($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$pid=$this->encrypt_decrypt('decrypt',$data['pid']);
			$date=strtotime($_POST['update_info']); 
			 
			$stmt = $dbCon->prepare("select pricing_start_date,pricing_end_date from user_apartment_pricing_info where id=?");
			$stmt->bind_param("i", $pid);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowDates = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set pricing_end_date=? where id=?");
			$stmt->bind_param("si",$date, $pid);
			$stmt->execute();	
			if($rowDates['pricing_end_date']>$date)
			{
			 
			$startDate=strtotime("+1 days", strtotime($_POST['update_info']));	
			$enddate=$rowDates['pricing_end_date'];
			 
			$stmt = $dbCon->prepare("insert into user_apartment_pricing_info (pricing_start_date,pricing_end_date,user_address_id,created_on) values(?, ?, ?, now())");
			$stmt->bind_param("ssi",$startDate,$enddate, $aid);
			$stmt->execute();	
			}
			else
			{
				 
			$stmt = $dbCon->prepare("delete from user_apartment_pricing_info where pricing_start_date>? and pricing_end_date<?");
			$stmt->bind_param("ss", $rowDates['pricing_start_date'],$date);
			$stmt->execute();
			 
			$stmt = $dbCon->prepare("select min(id) as minId from user_apartment_pricing_info where pricing_end_date>?");
			$stmt->bind_param("s", $date);
			$stmt->execute();
			$result1 = $stmt->get_result();	
			$rowUpdating = $result1->fetch_assoc();
			 
			$startDate=strtotime("+1 days", strtotime($_POST['update_info']));
			 
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set pricing_start_date=? where id=?");
			$stmt->bind_param("si", $startDate,$rowUpdating['id']);
			$stmt->execute();	
			}
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function deletePricing($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$pid=$this->encrypt_decrypt('decrypt',$data['pid']);
			 
			$stmt = $dbCon->prepare("select id,pricing_end_date,pricing_start_date from user_apartment_pricing_info where pricing_end_date=(select max(pricing_end_date) as max from user_apartment_pricing_info where user_address_id=? and is_deleted=0)");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowMax = $result->fetch_assoc();
			
			 
			
			if($rowMax['id']==$pid)
			{
			$stmt = $dbCon->prepare("select max(pricing_end_date) as maxD from user_apartment_pricing_info where user_address_id=? and is_deleted=0 and id<?");
			$stmt->bind_param("ii",$aid,$pid);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowStart = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("delete from user_apartment_pricing_info where pricing_start_date>?");
			$stmt->bind_param("s",$rowStart['maxD']);
			$stmt->execute();		
			}
			else
			{
			$stmt = $dbCon->prepare("select pricing_start_date,pricing_end_date  from user_apartment_pricing_info where id=?");
			$stmt->bind_param("i",$pid);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowStart = $result->fetch_assoc();	
				 
			$deletedStart=strtotime("-1 days", $rowStart['pricing_start_date']);
			 
			$stmt = $dbCon->prepare("select id  from user_apartment_pricing_info where pricing_end_date=? and is_deleted=1");
			$stmt->bind_param("s",$deletedStart);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowStartDelete = $result->fetch_assoc();	
			 
			if(empty($rowStartDelete))
			{
				
			$deletedStart=strtotime("+1 days", $rowStart['pricing_end_date']);
			 
			$stmt = $dbCon->prepare("select id,pricing_end_date  from user_apartment_pricing_info where pricing_start_date=? and is_deleted=1");
			$stmt->bind_param("s",$deletedStart);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowStartDelete = $result->fetch_assoc();		
				
			if(empty($rowStartDelete))
			{	
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set is_deleted=1 where id=?");
			$stmt->bind_param("i",$pid);
			$stmt->execute();
			}
			else
			{
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set pricing_end_date=? where id=?");
			$stmt->bind_param("si",$rowStartDelete['pricing_end_date'],$pid);
			$stmt->execute();
			$stmt = $dbCon->prepare("delete from user_apartment_pricing_info where id=?");
			$stmt->bind_param("i",$rowStartDelete['id']);
			$stmt->execute();
			}

			}
			else
			{
			$deletedStart=strtotime("+1 days", $rowStart['pricing_end_date']);
			 
			$stmt = $dbCon->prepare("select id,pricing_end_date  from user_apartment_pricing_info where pricing_start_date=? and is_deleted=1");
			$stmt->bind_param("s",$deletedStart);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowStartDeleteNext = $result->fetch_assoc();		
			if(empty($rowStartDeleteNext))
			{	
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set pricing_end_date=? where id=?");
			$stmt->bind_param("si",$rowStart['pricing_end_date'],$rowStartDelete['id']);
			$stmt->execute();
			$stmt = $dbCon->prepare("delete from user_apartment_pricing_info where id=?");
			$stmt->bind_param("i",$pid);
			$stmt->execute();
			}
			else
			{
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set pricing_end_date=? where id=?");
			$stmt->bind_param("si",$rowStartDeleteNext['pricing_end_date'],$rowStartDelete['id']);
			$stmt->execute();
			$stmt = $dbCon->prepare("delete from user_apartment_pricing_info where id=?");
			$stmt->bind_param("i",$pid);
			$stmt->execute();	
			$stmt = $dbCon->prepare("delete from user_apartment_pricing_info where id=?");
			$stmt->bind_param("i",$rowStartDeleteNext['id']);
			$stmt->execute();
			}
			}
					
			}				
			
			
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_pricing_info where user_address_id=? and is_deleted=0");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCount = $result->fetch_assoc();
			if($rowCount['num']==0)
			{
			$stmt = $dbCon->prepare("delete from user_apartment_pricing_info where user_address_id=?");
			$stmt->bind_param("i",$aid);
			$stmt->execute();		
			}
			$stmt->close();
			$dbCon->close();
			return $rowCount['num'];
		}
		
		function removePricingGap($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("update user_apartment_pricing_info set is_deleted=0 where id=?");
			$stmt->bind_param("i",$_POST['id']);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return $this->encrypt_decrypt('encrypt',$_POST['id']);
		}
		
		function displayPhotosCount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select count(user_address_id) as num from user_apartment_photos where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		
		function displayPhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select count(user_address_id) as num from user_apartment_photos where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select apartment_photo_path,sorting_number,id from user_apartment_photos where user_address_id=? order by sorting_number ");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$i=1;
			$org='';
			if($row['num']==1)
			{
				$first="hidden";
				$last="hidden";
			}
			else
			{
			$first="hidden";
			$last="";	
			}
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			while($row1 = $result1->fetch_assoc())
			{
				 
				if($i==$row['num'])
				{
				$last="hidden";	
				}
				
				 $filename="../estorecss/".$row1 ['apartment_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['apartment_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['apartment_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org=$org.'<div class="target-indicator padtb10" id="'.$row1['id'].'" ondrop="drop(event)" ondragover="allowDrop(event)"></div>

						<div class="drag-drop__wrapper " draggable="true" id="drag_'.$row1['id'].'" ondragstart="drag(event,'.$row1['id'].')">
																<div class="photo-tile">
																   <div class="handlebar ">
																	  <div class="handlebar__row handlebar__top">
																		<a href="javascript:void(0);" onclick="updatePhotoDecrement('.$row1['id'].');"> <div class="handlebar__cell handlebar__arrow '.$first.' grabbable"><i class="fas fa-chevron-up fsz16"></i></div>
																	  </div></a>
																	  <div class="handlebar__row handlebar__middle">
																		 <div class="handlebar__cell handlebar__grip grabbable"> </div>
																	  </div>
																	  <div class="handlebar__row handlebar__bottom">
																		<a href="javascript:void(0);" onclick="updatePhotoOrderIncreament('.$row1['id'].');"><div class="handlebar__cell handlebar__arrow '.$last.'" tabindex="0" aria-label="Move down"><i class="fas fa-chevron-down fsz16"></i></div></a>
																	  </div>
																   </div>
																   <div class="photo-tile__body">
																	  <img class="photo-tile__image" src="../../../'.$image.'" alt="Photo 1">
																	  <div class="photo-tile__content">
																		 <div class="photo-tile__tags xs-tall">
																			<div class="photo-tile__tags__properties"><span class="tag tag--standard tag--success white_txt padrl5">High resolution</span><span class="tag tag--standard tag--neutral padrl5 lgtgrey2_bg">Landscape</span></div>
																			<div class="photo-tile__tags__labels"></div>
																		 </div>
																		 <div class="photo-tile__actions">
																		<a href="javascript:void(0);" class="xsi-mart0 show_popup_modal" data-target="#gratis_popup_error" onclick="getImageInfo('.$row1['id'].');">	<button color="#444444" label="View photo" aria-label="View photo" class="merlin-button css-12d2atf">
																			   <div class="merlin-button__content">View</div>
																			</button></a>
																			<a href="javascript:void(0);" tabindex="0" onclick="deletePhoto('.$row1['id'].');">Delete</a>
																		 </div>
																	  </div>
																   </div>
																</div>
															 </div>';
															 $first="";
															 $i++;
			}	
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function displayKeyPhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select count(user_address_id) as num from user_apartment_key_photos where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select apartment_photo_path,sorting_number,id from user_apartment_key_photos where user_address_id=? order by sorting_number ");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$i=1;
			$org='';
			if($row['num']==1)
			{
				$first="hidden";
				$last="hidden";
			}
			else
			{
			$first="hidden";
			$last="";	
			}
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			while($row1 = $result1->fetch_assoc())
			{
				 
				if($i==$row['num'])
				{
				$last="hidden";	
				}
				
				 $filename="../estorecss/".$row1 ['apartment_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['apartment_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['apartment_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org=$org.'<div class="target-indicator padtb10" id="'.$row1['id'].'" ondrop="drop(event)" ondragover="allowDrop(event)"></div>

						<div class="drag-drop__wrapper " draggable="true" id="drag_'.$row1['id'].'" ondragstart="drag(event,'.$row1['id'].')">
																<div class="photo-tile">
																   <div class="handlebar ">
																	  <div class="handlebar__row handlebar__top">
																		<a href="javascript:void(0);" onclick="updatePhotoKeyDecrement('.$row1['id'].');"> <div class="handlebar__cell handlebar__arrow '.$first.' grabbable"><i class="fas fa-chevron-up fsz16"></i></div>
																	  </div></a>
																	  <div class="handlebar__row handlebar__middle">
																		 <div class="handlebar__cell handlebar__grip grabbable"> </div>
																	  </div>
																	  <div class="handlebar__row handlebar__bottom">
																		<a href="javascript:void(0);" onclick="updatePhotoKeyOrderIncreament('.$row1['id'].');"><div class="handlebar__cell handlebar__arrow '.$last.'" tabindex="0" aria-label="Move down"><i class="fas fa-chevron-down fsz16"></i></div></a>
																	  </div>
																   </div>
																   <div class="photo-tile__body">
																	  <img class="photo-tile__image" src="../../../'.$image.'" alt="Photo 1">
																	  <div class="photo-tile__content">
																		 <div class="photo-tile__tags xs-tall">
																			<div class="photo-tile__tags__properties"><span class="tag tag--standard tag--success white_txt padrl5">High resolution</span><span class="tag tag--standard tag--neutral padrl5 lgtgrey2_bg">Landscape</span></div>
																			<div class="photo-tile__tags__labels"></div>
																		 </div>
																		 <div class="photo-tile__actions">
																		<a href="javascript:void(0);" class="xsi-mart0 show_popup_modal" data-target="#gratis_popup_error" onclick="getKeyImageInfo('.$row1['id'].');">	<button color="#444444" label="View photo" aria-label="View photo" class="merlin-button css-12d2atf">
																			   <div class="merlin-button__content">View</div>
																			</button></a>
																			<a href="javascript:void(0);" tabindex="0" onclick="deleteKeyPhoto('.$row1['id'].');">Delete</a>
																		 </div>
																	  </div>
																   </div>
																</div>
															 </div>';
															 $first="";
															 $i++;
			}	
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function getImageInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 $stmt = $dbCon->prepare("select apartment_photo_path,sorting_number,id from user_apartment_photos where id=? ");
			$stmt->bind_param("i", $_POST['update_info']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$row1 = $result1->fetch_assoc();
				 
			
				
				 $filename="../estorecss/".$row1 ['apartment_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['apartment_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['apartment_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org='<a class="lightbox__img-nav false"></a><img class="lightbox__img" src="../../../'.$image.'">'; 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		function getKeyImageInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 $stmt = $dbCon->prepare("select apartment_photo_path,sorting_number,id from user_apartment_key_photos where id=? ");
			$stmt->bind_param("i", $_POST['update_info']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$row1 = $result1->fetch_assoc();
				 
			
				
				 $filename="../estorecss/".$row1 ['apartment_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['apartment_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['apartment_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org='<a class="lightbox__img-nav false"></a><img class="lightbox__img" src="../../../'.$image.'">'; 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function apartmentDescription($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select * from user_address where id=? ");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();
			$org='';
			if($row1['apartment_description']==null || $row1['apartment_description']=="")	 
			{
				$org=$org.'Welcome to our beautiful house in '.$row1['address'].'. We hope you enjoy your stay! We have personally thought through all of the amenities and hope to provide you with all the comforts of home. The surrounding area has a lot to offer and is sure to make your holiday one of a kind.

				
As a self-catering house, you will find everything you need for a perfect stay.

';
				if($row1['smoking_allowed']==1)
				{
					$smoking='allowed';
				}
				else
				{
				$smoking='not allowed';
				}
				
				if($row1['pets_allowed']==1)
				{
					$pets='allowed';
				}
				else
				{
				$pets='not allowed';
				}
				
				if($row1['cleening_fee_applicable']==1)
				{
					$cleaning='Cleaning fee is applicable '.$row1['cleening_fee'].' to its guests
';
				}
				else
				{
				$cleaning='Cleaning fee is not charged to its guests';
				}
				
				$stmt = $dbCon->prepare("select count(id) as num from user_apartment_bedrooms where user_address_id=? ");
				$stmt->bind_param("i", $aid);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$row2 = $result2->fetch_assoc();
				
				$bedrooms='This property have total '.$row2['num'].' bedrooms and beds available are
';
				$beds='';
				$stmt = $dbCon->prepare("select bed_info from user_apartment_bedrooms_beds where bedroom_id in(select id from user_apartment_bedrooms where user_address_id=?)");
				$stmt->bind_param("i", $aid);
				$stmt->execute();
				$result2 = $stmt->get_result();
				while($row2 = $result2->fetch_assoc())
				{
					$beds=$beds.'-'.$row2['bed_info'].'
';
				}
				  
				
				
				$stmt = $dbCon->prepare("select count(id) as num from user_apartment_bathroom_detail where user_address_id=? ");
				$stmt->bind_param("i", $aid);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$row2 = $result2->fetch_assoc();
				
				$bathrooms='
This property have total '.$row2['num'].'bathrooms 
';
				
$houseRules='
House rules
- Check-in time is '.$row1['arrival_time'].' and check-out is '.$row1['departure_time'].' 
-  Smoking is '.$smoking.'
-  Pets are '.$pets.' at the property. 
-  '.$cleaning;
				
				$org=$org.''.$bedrooms.$beds.$bathrooms.$houseRules;
				$org=htmlentities($org);
				$stmt = $dbCon->prepare("update user_address set apartment_description=? where id=? ");
				$stmt->bind_param("si", $org,$aid);
				$stmt->execute();
			}
			$stmt = $dbCon->prepare("select apartment_description from user_address where id=? ");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();	
				 
			$stmt->close();
			$dbCon->close();
			return $row1;
		}
		
		
		
		function changeDescription($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select * from user_address where id=? ");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();
			$org='';
			 
				$org=$org.'Welcome to our beautiful house in '.$row1['address'].'. We hope you enjoy your stay! We have personally thought through all of the amenities and hope to provide you with all the comforts of home. The surrounding area has a lot to offer and is sure to make your holiday one of a kind.

				
As a self-catering house, you will find everything you need for a perfect stay.

';
				if($row1['smoking_allowed']==1)
				{
					$smoking='allowed';
				}
				else
				{
				$smoking='not allowed';
				}
				
				if($row1['pets_allowed']==1)
				{
					$pets='allowed';
				}
				else
				{
				$pets='not allowed';
				}
				
				if($row1['cleening_fee_applicable']==1)
				{
					$clening='Cleaning fee is applicable '.$row1['cleening_fee'].' to its guests
';
				}
				else
				{
				$cleaning='Cleaning fee is not charged to its guests';
				}
				
				$stmt = $dbCon->prepare("select count(id) as num from user_apartment_bedrooms where user_address_id=? ");
				$stmt->bind_param("i", $aid);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$row2 = $result2->fetch_assoc();
				
				$bedrooms='This property have total '.$row2['num'].' bedrooms and beds available are
';
				$beds='';
				$stmt = $dbCon->prepare("select bed_info from user_apartment_bedrooms_beds where bedroom_id in(select id from user_apartment_bedrooms where user_address_id=?)");
				$stmt->bind_param("i", $aid);
				$stmt->execute();
				$result2 = $stmt->get_result();
				while($row2 = $result2->fetch_assoc())
				{
					$beds=$beds.'-'.$row2['bed_info'].'
';
				}
				  
				
				
				$stmt = $dbCon->prepare("select count(id) as num from user_apartment_bathroom_detail where user_address_id=? ");
				$stmt->bind_param("i", $aid);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$row2 = $result2->fetch_assoc();
				
				$bathrooms='
This property have total '.$row2['num'].'bathrooms 
';
				
$houseRules='
House rules
- Check-in time is '.$row1['arrival_time'].' and check-out is '.$row1['departure_time'].' 
-  Smoking is '.$smoking.'
-  Pets are '.$pets.' at the property. 
-  '.$clening;
				
				$org=$org.''.$bedrooms.$beds.$bathrooms.$houseRules;
				$org=htmlentities($org);
				$stmt = $dbCon->prepare("update user_address set apartment_description=? where id=? ");
				$stmt->bind_param("si", $org,$aid);
				$stmt->execute();
			 
			$stmt = $dbCon->prepare("select apartment_description from user_address where id=? ");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();	
				 
			$stmt->close();
			$dbCon->close();
			return $row1['apartment_description'];
		}
		
		
		
		function changeListing($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select heading_type,address from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$htype=$row['heading_type']+1;
			if($htype>8)
			{
			$htype=1;	       
			}
			if($htype==1)
			{
				$heading='Captivating';
			}
			else if($htype==2)
			{
				$heading='Stunning';
			}
			else if($htype==3)
			{
				$heading='Remarkable';
			}
			else if($htype==4)
			{
				$heading='Lovely';
			}
			else if($htype==5)
			{
				$heading='Inviting';
			}
			else if($htype==6)
			{
				$heading='Beautiful';
			}
			else if($htype==7)
			{
				$heading='Charming';
			}
			else if($htype==8)
			{
				$heading='Immaculate';
			}
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_bedrooms where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowNum = $result->fetch_assoc();
			if($rowNum['num']==0)
			{
				$heading=$heading.' 1-Bed House in '.$row['address'];
			}
			else
			{
				$heading=$heading.' '.$rowNum['num'].'-Bed House in '.$row['address'];	
			}
			
			$stmt = $dbCon->prepare("update user_address set property_heading=?,heading_type=? where id=?");
			$stmt->bind_param("sii",$heading,$htype, $aid);
			$stmt->execute();
			 	
				
			$stmt->close();
			$dbCon->close();
			return html_entity_decode($heading);
		}
		
		function updateChildren($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update user_address set children_allowed=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateInfants($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update user_address set infants_allowed=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function sleepingAreaDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select * from apartment_sleeping_area_bed where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
											$i=1;
			while($row = $result->fetch_assoc())
			{
				 
			 
			$stmt = $dbCon->prepare("select * from apartment_bed_type");
			$stmt->execute();
			$result2 = $stmt->get_result();
			$options='';
			
			while($row2= $result2->fetch_assoc())
			{	
			if($row2['bed_type']==$row['bed_info'])
			{
				$options=$options.'<option value="'.$row2['bed_type'].'" selected>'.$row2['bed_type'].'</option>';
			}
			else
			{
			$options=$options.'<option value="'.$row2['bed_type'].'">'.$row2['bed_type'].'</option>';	
			}
			}
			
				$org=$org.'<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt brd" id="extra_'.$row['id'].'">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_50 xxs-wi_55  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Bed '.$i.'</span>
													 
													 </div>
													 
											<div class="wi_70  xs-mar0 xs-padt10">		
												<div class="on_clmn mart10 " >
								<div class="pos_rel">											
											<select name="position_type" id="position_type" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg dropdown-bg  tall padl0 ffamily_avenir red_f5a0a5_txt" style="text-align-last:center;" onchange="updateExtraBed('.$row['id'].',this.value);"> 
											 '.$options.'
														 
											</select>
											</div>
											</div>
												
											</div>	
											<div class="clear"></div>
											<div class="wi_70  xs-mar0 padt20 ">		
											<a href="javascript:void(0);" onclick="deleteExtraBed('.$row['id'].');">
											<button color="#444444" class="merlin-button css-7wfern fleft  " aria-label="">
										   <div class="merlin-button__content">
											  <div class="css-ibdtyj">
												 
												 Remove bed
											  </div>
										   </div>
										</button>	</a>
											</div>	
											</div>
											
											
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div>';	
							$i++;									
											
			}
			$org='<div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#extraSleep" class="expander-toggler dark_grey_txt xs-fsz16 tall bold">Other sleeping areas
 

								<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="extraSleep" class=" " style="display: block;">	
										 
									 <a href="javascript:void(0);" onclick="addExtraSleepingBed();">	<button color="#444444" class="merlin-button css-7wfern fleft" aria-label="">
											   <div class="merlin-button__content">
												  <div class="css-ibdtyj">
													 <div class="css-1mvz2rc">
														<div class="css-r0ilrj"></div>
													 </div>
													 Add extra bed
												  </div>
											   </div>
											</button></a><div id="extra_beds">'.$org.'<div class="clear"></div>
											</div>
									</div>
					 		 <div class="clear"></div>
					</div>';
			
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		function deleteExtraBed($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 $stmt = $dbCon->prepare("delete from apartment_sleeping_area_bed where id=?");
			$stmt->bind_param("i", $_POST['bed_id']);
			$stmt->execute();
			 
			$stmt = $dbCon->prepare("select * from apartment_sleeping_area_bed where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
											$i=1;
			while($row = $result->fetch_assoc())
			{
				 
			 
			$stmt = $dbCon->prepare("select * from apartment_bed_type");
			$stmt->execute();
			$result2 = $stmt->get_result();
			$options='';
			
			while($row2= $result2->fetch_assoc())
			{	
			if($row2['bed_type']==$row['bed_info'])
			{
				$options=$options.'<option value="'.$row2['bed_type'].'" selected>'.$row2['bed_type'].'</option>';
			}
			else
			{
			$options=$options.'<option value="'.$row2['bed_type'].'">'.$row2['bed_type'].'</option>';	
			}
			}
			
				$org=$org.'<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt brd" id="extra_'.$row['id'].'">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_50 xxs-wi_55  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Bed '.$i.'</span>
													 
													 </div>
													 
											<div class="wi_70  xs-mar0 xs-padt10">		
												<div class="on_clmn mart10 " >
								<div class="pos_rel">											
											<select name="position_type" id="position_type" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg dropdown-bg  tall padl0 ffamily_avenir red_f5a0a5_txt" style="text-align-last:center;" onchange="updateExtraBed('.$row['id'].',this.value);"> 
											 '.$options.'
														 
											</select>
											</div>
											</div>
												
											</div>	
											<div class="clear"></div>
											<div class="wi_70  xs-mar0 padt20 ">		
											<a href="javascript:void(0);" onclick="deleteExtraBed('.$row['id'].');">
											<button color="#444444" class="merlin-button css-7wfern fleft  " aria-label="">
										   <div class="merlin-button__content">
											  <div class="css-ibdtyj">
												 
												 Remove bed
											  </div>
										   </div>
										</button>	</a>
											</div>	
											</div>
											
											
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div>';	
							$i++;									
											
			}
			 
			
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		function addExtraSleepingBed($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 $bed="Single";
			 $stmt = $dbCon->prepare("insert into apartment_sleeping_area_bed (user_address_id,bed_info,created_on,modified_on) values (?, ?, now(), now())");
			$stmt->bind_param("is", $aid,$bed);
			$stmt->execute();
			 
			$stmt = $dbCon->prepare("select * from apartment_sleeping_area_bed where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
											$i=1;
			while($row = $result->fetch_assoc())
			{
				 
			 
			$stmt = $dbCon->prepare("select * from apartment_bed_type");
			$stmt->execute();
			$result2 = $stmt->get_result();
			$options='';
			
			while($row2= $result2->fetch_assoc())
			{	
			if($row2['bed_type']==$row['bed_info'])
			{
				$options=$options.'<option value="'.$row2['bed_type'].'" selected>'.$row2['bed_type'].'</option>';
			}
			else
			{
			$options=$options.'<option value="'.$row2['bed_type'].'">'.$row2['bed_type'].'</option>';	
			}
			}
			
				$org=$org.'<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt brd" id="extra_'.$row['id'].'">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_50 xxs-wi_55  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Bed '.$i.'</span>
													 
													 </div>
													 
											<div class="wi_70  xs-mar0 xs-padt10">		
												<div class="on_clmn mart10 " >
								<div class="pos_rel">											
											<select name="position_type" id="position_type" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg dropdown-bg  tall padl0 ffamily_avenir red_f5a0a5_txt" style="text-align-last:center;" onchange="updateExtraBed('.$row['id'].',this.value);"> 
											 '.$options.'
														 
											</select>
											</div>
											</div>
												
											</div>	
											<div class="clear"></div>
											<div class="wi_70  xs-mar0 padt20 ">		
											<a href="javascript:void(0);" onclick="deleteExtraBed('.$row['id'].');">
											<button color="#444444" class="merlin-button css-7wfern fleft  " aria-label="">
										   <div class="merlin-button__content">
											  <div class="css-ibdtyj">
												 
												 Remove bed
											  </div>
										   </div>
										</button>	</a>
											</div>	
											</div>
											
											
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div>';	
							$i++;									
											
			}
			 
			
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		function addBedToBedroom($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 $bed="Single";
			 $stmt = $dbCon->prepare("insert into user_apartment_bedrooms_beds (bedroom_id,bed_info,created_on,modified_on) values (?, ?, now(), now())");
			$stmt->bind_param("is", $_POST['id'],$bed);
			$stmt->execute();
			 
			$stmt = $dbCon->prepare("select * from user_apartment_bedrooms_beds where bedroom_id=?");
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$i=1;
			while($row = $result->fetch_assoc())
			{
				 
			 
			$stmt = $dbCon->prepare("select * from apartment_bed_type");
			$stmt->execute();
			$result2 = $stmt->get_result();
			$options='';
			
			while($row2= $result2->fetch_assoc())
			{	
			if($row2['bed_type']==$row['bed_info'])
			{
				$options=$options.'<option value="'.$row2['bed_type'].'" selected>'.$row2['bed_type'].'</option>';
			}
			else
			{
			$options=$options.'<option value="'.$row2['bed_type'].'">'.$row2['bed_type'].'</option>';	
			}
			}
			
				$org=$org.'<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt brd" id="extra_'.$row['id'].'">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_50 xxs-wi_55  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Bed '.$i.'</span>
													 
													 </div>
													 
											<div class="wi_70  xs-mar0 xs-padt10">		
												<div class="on_clmn mart10 " >
								<div class="pos_rel">											
											<select name="position_type" id="position_type" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg dropdown-bg  tall padl0 ffamily_avenir red_f5a0a5_txt" style="text-align-last:center;" onchange="updateBedTypeInfo('.$row['id'].',this.value);"> 
											 '.$options.'
														 
											</select>
											</div>
											</div>
												
											</div>	
											<div class="clear"></div>
											<div class="wi_70  xs-mar0 padt20 ">		
											<a href="javascript:void(0);" onclick="deleteBedroomBedInfo('.$row['id'].');">
											<button color="#444444" class="merlin-button css-7wfern fleft  " aria-label="">
										   <div class="merlin-button__content">
											  <div class="css-ibdtyj">
												 
												 Remove bed
											  </div>
										   </div>
										</button>	</a>
											</div>	
											</div>
											
											
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div>';	
							$i++;									
											
			}
			 
			
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		
		function updateBedTypeInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 $stmt = $dbCon->prepare("update user_apartment_bedrooms_beds set bed_info=?,modified_on=now() where id=?");
			$stmt->bind_param("si",$_POST['bed_info'], $_POST['bed_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
	
		
		function updateExtraBedInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 $stmt = $dbCon->prepare("update apartment_sleeping_area_bed set bed_info=?,modified_on=now() where id=?");
			$stmt->bind_param("si",$_POST['bed_info'], $_POST['bed_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function identificatorInfoListCounts($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select count(id) as num  from user_identification   where  user_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row['num'];
			 
		}
		function identificatorInfoList($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select * from user_identification where user_id=?");
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$row['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		function identificatorDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $id=$this->encrypt_decrypt('decrypt',$data['certi_id']);
			$stmt = $dbCon->prepare("select * from user_identification where id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		function updateIndificator($data)
		{
		 
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt('decrypt',$data['certi_id']);
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
			$issue_date=$_POST['issue_date'].'/'.$_POST['issue_month'].'/'.$_POST['issue_year'];
			$expiry_date=$_POST['expiry_date'].'/'.$_POST['expiry_month'].'/'.$_POST['expiry_year'];
		   	$stmt = $dbCon->prepare("update user_identification set issue_month=?,issue_year=?,expiry_month=?, expiry_year=?,front_image_path=?, back_image_path=?,is_completed=1,issue_date=?,expiry_date=? where id=?
			");
			$stmt->bind_param("sisissssi",$_POST['issue_month'],$_POST['issue_year'],$_POST['expiry_month'],$_POST['expiry_year'],$img_name1,$img_name2,$issue_date,$expiry_date,$id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from employee_identificator_verification_detail where employee_identity_id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function certificateDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$id=$this -> encrypt_decrypt('decrypt',$data['certi_id']);
			$stmt = $dbCon->prepare("select is_valid,is_connected,user_id,certificate_key from user_certificates where id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		
		function generateCertificate($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$a=array();
			$a=explode("-",$_POST['dob']);
			$resultOrg    = $this->userAccount($data);
		//echo '<pre>';	print_r($resultOrg); echo '</pre>';
		//	 print_r($_POST); die;
			if(isset($_POST['country_id']))
			{
			 
			$dbCon->close();
			return 0;		
			}
			if($_POST['f_name']!=$resultOrg['name'])
			{
			 
			$dbCon->close();
			return 0;		
			}
			if($_POST['ssn']!=$resultOrg['ssn'])
			{
			   
			$dbCon->close();
			return 0;		
			} 
			if($a[2]!=$resultOrg['dob_day'] || $a[1]!=$resultOrg['dob_month'] || $a[0]!=$resultOrg['dob_year'])
			{
			 
			//$dbCon->close();
			//return 0;		
			}
			if($_POST['phone_number']!=$resultOrg['phone_number'])
			{
			  
			$dbCon->close();
			return 0;		
			}
			 
			
			$pass=md5($_POST['password']);	
			
			$certi=$resultOrg['ssn'].'_'.microtime().'_'.$resultOrg['name'];
			$key=$this -> encrypt_decrypt('encrypt',$certi);
			$stmt = $dbCon->prepare("insert into user_certificates(`user_id`,`created_on`,password,certificate_key) values(?, now(), ?, ?)");
			$stmt->bind_param("iss", $data['user_id'],$pass, $key);
			if($stmt->execute())
			{
			$id=$stmt->insert_id;
			$stmt->close();
			$dbCon->close();
			return $this->encrypt_decrypt('encrypt',$id);
			}
			else
			{
				//echo $stmt->error; die;
			$stmt->close();
			$dbCon->close();
			return 0;	
			}
		}
		
		function hijackedUser($data)
    {
        $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select count(id) as num from user_hijacked where user_id=?  and is_hijacked=0 ");
		$stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		return $row;
        }
		
		
		function identificatorInfo($data)
    {
        $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select identification_type,identity_number from user_identification where user_id=?");
		$stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		return $row;
        }
		
		
		function userIdentificatorVerification($data)
    {
        $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select * from  employee_identificator_verification_detail where employee_user_id =?");
		$stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		return $row;
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
		
		function saveCardDetails($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("insert into user_cards(`user_login_id`,`created_on`,`card_number`,card_cvv,exp_month,exp_year,name_on_card,card_type) values(?, now(), ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("isiiiss", $data['user_id'],$_POST['card_number'],$_POST['cvv'],$_POST['exp_month'],$_POST['exp_year'],htmlentities($_POST['card_name'],ENT_NOQUOTES, 'ISO-8859-1'),$data['card_type']);
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
		
		function checkUserAvailability($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select user_logins_id  from user_profiles where ssn=? and user_logins_id!=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['ssn'],$data['user_id']);
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
		
		function checkEmployerAvailable($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select count(id) as num  from employees where user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			if($row['num']==0)
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
		
		
		function addUserAddress($data)
		{
			$dbCon = AppModel::createConnection();
			$address=str_replace(' ', '%20',urldecode($_POST['addrs'])); 
			$stmt = $dbCon->prepare("select first_name,last_name,ssn,country_of_residence,email,sex,dob_day,dob_month,dob_year,country_phone,phone_number, address,user_profiles.city,user_profiles.country,user_profiles.zipcode,grading_status from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where user_logins.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$url="https://us1.locationiq.com/v1/reverse.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&lat=".$_POST['latit']."&lon=".$_POST['longi']."&format=json";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			
			
			$stmt = $dbCon->prepare("update user_profiles set name_on_door=?, flat_number=?, entry_code=?, full_address=?, port_number=?, address=?, city=?, state=?, zipcode=?, latitude=?, langitude=?,house_name=?  where user_logins_id=?");
				/* bind parameters for markers */
			$stmt->bind_param("ssssssssssssi",htmlentities($_POST['flname'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['fnumber'],$_POST['entry_code'], htmlentities($response['display_name'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['pnumber'], htmlentities($_POST['addrs'],ENT_NOQUOTES, 'ISO-8859-1'),$response['address']['state_district'],$response['address']['state'],$response['address']['postcode'],$response['lat'],$response['lon'], htmlentities($_POST['house_name'],ENT_NOQUOTES, 'ISO-8859-1'),$data['user_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateAccount($data)
		{
			$dbCon = AppModel::createConnection();
			$_POST['total_value']=str_replace("\xc2\xa0",'',$_POST['total_value']); 
			$posted_value=json_decode($_POST['total_value'],true);
			
			$data1 = strip_tags($posted_value['image-data1']);
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
			//echo $img_name1.'noimage'; print_r($_POST); die;
			$stmt = $dbCon->prepare("update user_logins set passport_image=?  where id=?");
			
			$stmt->bind_param("si", $img_name1,$data['user_id']);
			$stmt->execute();
				
			$stmt = $dbCon->prepare("select first_name,last_name,ssn,country_of_residence,email,sex,dob_day,dob_month,dob_year,country_phone,phone_number, address,user_profiles.city,user_profiles.country,user_profiles.zipcode,grading_status from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where user_logins.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update user_certificates set is_valid=0 where user_id=?");
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			
			
			if(($row['ssn']!=null || $row['ssn']!="") &&  $row['grading_status']==2)
			{
			$stmt = $dbCon->prepare("select verified_name,first_name,last_name from bankid_verified where bank_id = ?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['ssn']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_name = $result->fetch_assoc();
			$posted_value['name']=$row['first_name'];
			$posted_value['l_name']=$row['last_name'];
			}
			
			$posted_value['email']=$row['email'];
			$posted_value['country_of_residence']=$row['country_of_residence'];
			
			//echo $posted_value; die;
			$url='https://www.qmatchup.com/beta/user/index.php/NewPersonal/updateAccount';
			
			$ch = curl_init();
			//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
			//curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_REFERER, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, true);
			curl_setopt($ch, CURLOPT_COOKIEFILE, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($posted_value));
			curl_setopt($ch, CURLOPT_POST, true);
			
			$result=curl_exec ($ch);
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			
			curl_close ($ch);
			
			if($posted_value['general']>0)
			{
				$a=array();
				$a=explode("-",$posted_value['dob']);
				if($posted_value['sex']=='M')
				{
					$s=1;
				}
				else  if($posted_value['sex']=='F')
				{
					$s=2;
				}
				else  if($posted_value['sex']=='T')
				{
					$s=3;
				}
				 
				
				
				$stmt = $dbCon->prepare("update user_logins set sex=?,dob_day=?,dob_month=?,dob_year=?,first_name=?,last_name=?  where id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("iiiissi", $s,$a[2],$a[1],$a[0],$posted_value['name'],$posted_value['l_name'],$data['user_id']);
				$stmt->execute();
				
				
				$stmt = $dbCon->prepare("update employees set first_name=?,last_name=?  where user_login_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['name'],$posted_value['l_name'],$data['user_id']);
				$stmt->execute();
				
				 
				
				
				
			}
			if($posted_value['byssn']>0)
			{
				$stmt = $dbCon->prepare("update user_profiles set ssn=?  where user_logins_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("si", $posted_value['ssn'],$data['user_id']);
				$stmt->execute();
			}
			if($posted_value['byphone']>0)
			{
				$stmt = $dbCon->prepare("update user_profiles set country_phone=?,phone_number=?,phone_verified=1 where user_logins_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['c_phone'],$posted_value['phone'],$data['user_id']);
				$stmt->execute();
			}
			if($posted_value['post']>0)
			{
			$address=str_replace(' ', '%20',urldecode($posted_value['address'])); 
			$url="https://us1.locationiq.com/v1/reverse.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&lat=".$posted_value['latitude']."&lon=".$posted_value['longitude']."&format=json";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
				
				$stmt = $dbCon->prepare("update user_profiles set name_on_door=?, flat_number=?, entry_code=?, full_address=?, port_number=?, address=?, city=?, state=?, zipcode=?, latitude=?, langitude=?,house_name=?  where user_logins_id=?");
				/* bind parameters for markers */
			$stmt->bind_param("ssssssssssssi",htmlentities($posted_value['flname'],ENT_NOQUOTES, 'ISO-8859-1'),$posted_value['fnumber'],$posted_value['entry_code'], htmlentities($response['display_name'],ENT_NOQUOTES, 'ISO-8859-1'),$posted_value['zip'], htmlentities($posted_value['addrs'],ENT_NOQUOTES, 'ISO-8859-1'),$response['address']['state_district'],$response['address']['state'],$response['address']['postcode'],$response['lat'],$response['lon'], htmlentities($posted_value['house_name'],ENT_NOQUOTES, 'ISO-8859-1'),$data['user_id']);
			
				 
				$stmt->execute();
			}
			if($posted_value['bank']>0)
			{
			  $stmt = $dbCon->prepare("update user_profiles set clearing_number=?,bank_account_number=?,language=? where user_logins_id=?");
       
		
        /* bind parameters for markers */
        $stmt->bind_param("sssi", $posted_value['clear_number'],$posted_value['bank_acc'],$posted_value['langu'],$data['user_id']);
        $stmt->execute();
			}
			$stmt = $dbCon->prepare("INSERT INTO user_passport_logs (user_id, created_on) VALUES (?, now())");
			$stmt->bind_param("i", $data['user_id']);
			if( $stmt->execute())
			{
				$id_passport=$stmt->insert_id;
				if($posted_value['general']>0)
				{
					if($s!=$row['sex'])
					{
						$stmt = $dbCon->prepare("update user_passport_logs set sex=?,sex_old=?,sex_updated=1 where id=?");
						$stmt->bind_param("iii", $s,$row['sex'],$id_passport);
						$stmt->execute();
					}
					if($posted_value['name']!=$row['first_name'])
					{
						$stmt = $dbCon->prepare("update user_passport_logs set first_name=?,first_name_old=?,first_name_updated=1 where id=?");
						$stmt->bind_param("ssi", $posted_value['name'],$row['first_name'],$id_passport);
						$stmt->execute();
					}
					if($posted_value['l_name']!=$row['last_name'])
					{
						$stmt = $dbCon->prepare("update user_passport_logs set last_name=?,last_name_old=?,last_name_updated=1 where id=?");
						$stmt->bind_param("ssi", $posted_value['l_name'],$row['last_name'],$id_passport);
						$stmt->execute();
					}
					if($a[1]!=$row['dob_day'] || $a[0]!=$row['dob_month'] || $a[2]!=$row['dob_year'])
					{
						$stmt = $dbCon->prepare("update user_passport_logs set dob_day=?,dob_day_old=?,dob_month=?,dob_month_old=?,dob_year=?,dob_year_old=?, dob_updated=1 where id=?");
						$stmt->bind_param("iiiiiii", $a[1],$row['dob_day'],$a[0],$row['dob_month'],$a[2],$row['dob_year'],$id_passport);
						$stmt->execute();
					}
					 
					
				}
				if($posted_value['byssn']>0)
				{
					if($posted_value['ssn']!=$row['ssn'])
					{
						$stmt = $dbCon->prepare("update user_passport_logs set ssn=?,ssn_old=?,ssn_updated=1 where id=?");
						$stmt->bind_param("ssi", $posted_value['ssn'],$row['ssn'],$id_passport);
						$stmt->execute();
					}
				}
				if($posted_value['byphone']>0)
				{
					if($posted_value['c_phone']!=$row['country_phone'])
					{
						$stmt = $dbCon->prepare("update user_passport_logs set country_phone=?,country_phone_old=?,country_phone_updated=1 where id=?");
						$stmt->bind_param("ssi", $posted_value['c_phone'],$row['country_phone'],$id_passport);
						$stmt->execute();
					}
					if($posted_value['phone']!=$row['phone_number'])
					{
						$stmt = $dbCon->prepare("update user_passport_logs set phone_number=?,phone_number_old=?,phone_number_updated=1 where id=?");
						$stmt->bind_param("ssi", $posted_value['phone'],$row['phone_number'],$id_passport);
						$stmt->execute();
					}
				}
				
				if($posted_value['post']>0)
				{
					if($posted_value['addrs']!=$row['address'])
					{
						$stmt = $dbCon->prepare("update user_passport_logs set address=?,address_old=?,address_updated=1 where id=?");
						$stmt->bind_param("ssi", $posted_value['addrs'],$row['address'],$id_passport);
						$stmt->execute();
					}
					if($posted_value['city']!=$row['city'])
					{
						$stmt = $dbCon->prepare("update user_passport_logs set city=?,city_old=?,city_updated=1 where id=?");
						$stmt->bind_param("ssi", $posted_value['city'],$row['city'],$id_passport);
						$stmt->execute();
					}
					if($posted_value['cntry']!=$row['country'])
					{
						$stmt = $dbCon->prepare("update user_passport_logs set country=?,country_old=?,country_updated=1 where id=?");
						$stmt->bind_param("ssi", $posted_value['cntry'],$row['country'],$id_passport);
						$stmt->execute();
					}
					if($posted_value['zip']!=$row['zipcode'])
					{
						$stmt = $dbCon->prepare("update user_passport_logs set zipcode=?,zipcode_old=?,zipcode_updated=1 where id=?");
						$stmt->bind_param("ssi", $posted_value['zip'],$row['zipcode'],$id_passport);
						$stmt->execute();
					}
				}
				$stmt = $dbCon->prepare("select get_started_wizard_status from user_logins  where id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				
				$row = $result->fetch_assoc();
				if($row['get_started_wizard_status']==1)
				{
					$stmt->close();
					$dbCon->close();
					return 1;
					
				}
				
				else
				
				{
					$stmt = $dbCon->prepare("select first_name,last_name,ssn from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where user_logins.id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $data['user_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					
					$row = $result->fetch_assoc();
					
					if(($row['first_name']=="" || $row['first_name']=='-' || $row['first_name']==null) || ($row['last_name']=="" || $row['last_name']=='-' || $row['last_name']==null) || ($row['ssn']=="" || $row['ssn']=='-' || $row['ssn']==null))
					
					{
						$stmt->close();
						$dbCon->close();
						return 2;
					}
					
					else
					{
						$stmt = $dbCon->prepare("update user_logins set get_started_wizard_status=1 where id=?");
						
						/* bind parameters for markers */
						$stmt->bind_param("i", $data['user_id']);
						$stmt->execute();
						$stmt->close();
						$dbCon->close();
						return 2;
					}
					
				}
				
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			
			
		}
		
		function verifyIP()
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
			 
				 
				$dbCon->close();
				return $this->encrypt_decrypt('encrypt',$ip);
			 
		}
		
		function updateDeliveryAddress($data)
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("select first_name,last_name,ssn,country_of_residence,email,sex,dob_day,dob_month,dob_year,country_phone,phone_number, address,user_profiles.city,user_profiles.country,user_profiles.zipcode,grading_status from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where user_logins.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			if($_POST['same_name']==1)
			{
			$full_name=$row['first_name'].' '.$row['last_name'];	
			}
			else
			{
			$full_name=	htmlentities($_POST['flname'],ENT_NOQUOTES, 'ISO-8859-1');
			}
			if($_POST['same_invoice']==1)
			{
			$_POST['iaddress']=$_POST['addrs'];	
			$_POST['i_port_number']=$_POST['pnumber'];	
			$_POST['izip']=$_POST['dzip'];
			$_POST['icity']=$_POST['dcity'];
			}
			$_POST['addrs']=htmlentities($_POST['addrs'],ENT_NOQUOTES, 'ISO-8859-1');
			$_POST['iaddress']=htmlentities($_POST['iaddress'],ENT_NOQUOTES, 'ISO-8859-1');	 
			$stmt = $dbCon->prepare("update  user_address set  `address`=?  , `city`=?  , `zipcode`=? , `port_number` =?, `invoice_address` =? , `invoice_city` =? , `invoice_zipcode`=?  , `invoice_port_number`=?  , `is_name_same` =? , `is_invoice_same`=?  , `name_on_house`=?  ,entry_code=? where id=?");
				/* bind parameters for markers */
			$stmt->bind_param("ssssssssiissi",$_POST['addrs'],$_POST['dcity'],$_POST['dzip'],$_POST['pnumber'],$_POST['iaddress'],$_POST['icity'],$_POST['izip'],$_POST['i_port_number'],$_POST['same_invoice'],$_POST['same_name'],$full_name,$_POST['entry_code'],$id);
			$stmt->execute();
			  
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function addDeliveryAdddress($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select first_name,last_name,ssn,country_of_residence,email,sex,dob_day,dob_month,dob_year,country_phone,phone_number, address,user_profiles.city,user_profiles.country,user_profiles.zipcode,grading_status from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where user_logins.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			if($_POST['same_name']==1)
			{
			$full_name=$row['first_name'].' '.$row['last_name'];	
			}
			else
			{
			$full_name=	htmlentities($_POST['flname'],ENT_NOQUOTES, 'ISO-8859-1');
			}
			if($_POST['same_invoice']==1)
			{
			$_POST['iaddress']=$_POST['addrs'];	
			$_POST['i_port_number']=$_POST['pnumber'];	
			$_POST['izip']=$_POST['dzip'];
			$_POST['icity']=$_POST['dcity'];
			}
			$st=0;
			$_POST['addrs']=htmlentities($_POST['addrs'],ENT_NOQUOTES, 'ISO-8859-1');
			$_POST['iaddress']=htmlentities($_POST['iaddress'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into  user_address (`address`  , `city`  , `zipcode` , `port_number` , `invoice_address`  , `invoice_city`  , `invoice_zipcode`  , `invoice_port_number`  , `is_name_same` , `is_invoice_same`  , `name_on_house`  ,entry_code , user_id, created_on, is_personal_address) values(?,?,?,?,?,?,?,?,?,?,?,?,?,now(),?)");
				/* bind parameters for markers */
			$stmt->bind_param("ssssssssiissii",$_POST['addrs'],$_POST['dcity'], $_POST['dzip'],$_POST['pnumber'],$_POST['iaddress'],$_POST['icity'],$_POST['izip'],$_POST['i_port_number'],$_POST['same_invoice'],$_POST['same_name'],$full_name,$data['entry_code'],$data['user_id'],$st);
			$stmt->execute();
		 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateAppAccount($data)
		{
			$dbCon = AppModel::createConnection();
		$ip=$this->encrypt_decrypt('decrypt',$_POST['ip']);
		
        $stmt = $dbCon->prepare("select login_status,user_id from user_certificates where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
		if(empty($row))
		{
		$stmt->close();
        $dbCon->close();
		return 0;
		}
		if($row['login_status']!=2)
		{
		$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0,time_out=1 where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
				
		$stmt->close();
        $dbCon->close();
		return 0;		
		}
		else
		{
			
			
		$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0 where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
		 
			$_POST['total_value']=str_ireplace("'",'"',$_POST['total_value']);
			$_POST['total_value']=str_replace("\xc2\xa0",'',$_POST['total_value']); 
			$posted_value=json_decode(htmlentities($_POST['total_value'],ENT_NOQUOTES, 'ISO-8859-1'),true);
			$a=explode('-',$posted_value['addrs']);
			$posted_value['addrs1']=$a[0];
			//print_r($posted_value); die;
			$data1 = strip_tags($posted_value['image-data1']);
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
			//echo $img_name1.'noimage'; print_r($_POST); die;
			$stmt = $dbCon->prepare("update user_logins set passport_image=?  where id=?");
			
			$stmt->bind_param("si", $img_name1,$data['user_id']);
			$stmt->execute();
				
			$stmt = $dbCon->prepare("select first_name,last_name,ssn,country_of_residence,email,sex,dob_day,dob_month,dob_year,country_phone,phone_number, address,user_profiles.city,user_profiles.country,user_profiles.zipcode,grading_status from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where user_logins.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update user_certificates set is_valid=0 where user_id=?");
			$stmt->bind_param("i", $data['user_id']);
			//$stmt->execute();
			
			
			if(($row['ssn']!=null || $row['ssn']!="") &&  $row['grading_status']==2)
			{
			$stmt = $dbCon->prepare("select verified_name,first_name,last_name from bankid_verified where bank_id = ?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['ssn']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_name = $result->fetch_assoc();
			$posted_value['name']=$row['first_name'];
			$posted_value['l_name']=$row['last_name'];
			}
			
			$posted_value['email']=$row['email'];
			$posted_value['country_of_residence']=$row['country_of_residence'];
			
			//echo $posted_value; die;
			$url='https://www.qmatchup.com/beta/user/index.php/NewPersonal/updateAccount';
			
			$ch = curl_init();
			//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
			//curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_REFERER, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, true);
			curl_setopt($ch, CURLOPT_COOKIEFILE, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($posted_value));
			curl_setopt($ch, CURLOPT_POST, true);
			
			$result=curl_exec ($ch);
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			
			curl_close ($ch);
			
			if($posted_value['general']>0)
			{
				$a=array();
				$a=explode("-",$posted_value['dob']);
				if($posted_value['sex']=='M')
				{
					$s=1;
				}
				else  if($posted_value['sex']=='F')
				{
					$s=2;
				}
				else  if($posted_value['sex']=='T')
				{
					$s=3;
				}
				 
				
				
				$stmt = $dbCon->prepare("update user_logins set sex=?,dob_day=?,dob_month=?,dob_year=?,first_name=?,last_name=?  where id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("iiiissi", $s,$a[2],$a[1],$a[0],$posted_value['name'],$posted_value['l_name'],$data['user_id']);
				$stmt->execute();
				
				
				$stmt = $dbCon->prepare("update employees set first_name=?,last_name=?  where user_login_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['name'],$posted_value['l_name'],$data['user_id']);
				$stmt->execute();
				
				 
				
				
				
			}
			if($posted_value['byssn']>0)
			{
				$stmt = $dbCon->prepare("update user_profiles set ssn=?  where user_logins_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("si", $posted_value['ssn'],$data['user_id']);
				$stmt->execute();
			}
			if($posted_value['byphone']>0)
			{
				$stmt = $dbCon->prepare("update user_profiles set country_phone=?,phone_number=?,phone_verified=1 where user_logins_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['c_phone'],$posted_value['phone'],$data['user_id']);
				$stmt->execute();
			}
			if($posted_value['post']>0)
			{
			/*$address=str_replace(' ', '%20',urldecode($posted_value['address'])); 
			$url="https://us1.locationiq.com/v1/reverse.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&lat=".$posted_value['latitude']."&lon=".$posted_value['longitude']."&format=json";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);*/
				if($posted_value['same_name']==1)
				{
				$full_name=$row['first_name'].' '.$row['last_name'];	
				}
				else
				{
				$full_name=	htmlentities($posted_value['flname'],ENT_NOQUOTES, 'ISO-8859-1');
				}
				
				if($posted_value['same_invoice']==1)
				{
				$posted_value['iaddress']=$posted_value['addrs1'];	
				$posted_value['i_port_number']=$posted_value['pnumber'];	
				$posted_value['izip']=$posted_value['dzip'];
				$posted_value['icity']=$posted_value['dcity'];
				}
				
				
				$stmt = $dbCon->prepare("update user_profiles set name_on_door=?, entry_code=?, full_address=?, port_number=?, address=?, city=?, zipcode=?,invoice_address=?,invoice_zipcode=?,invoice_city=?,invoice_port=?,is_invoice_same=?,is_name_on_house_same=?, is_id_active=1  where user_logins_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("sssssssssssiii",$full_name,$posted_value['entry_code'], $posted_value['addrs'],$posted_value['pnumber'], $posted_value['addrs1'],htmlentities($posted_value['dcity'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($posted_value['dzip'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($posted_value['iaddress'],ENT_NOQUOTES, 'ISO-8859-1'),$posted_value['izip'],htmlentities($posted_value['icity'],ENT_NOQUOTES, 'ISO-8859-1'),$posted_value['i_port_number'],$posted_value['same_invoice'],$posted_value['same_name'],$data['user_id']);
			
				 
				$stmt->execute();
				//die;
				
				$stmt = $dbCon->prepare("select count(id) as num from user_address where user_id = ?");
				
						/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
				$stmt = $dbCon->prepare("insert into  user_address ( `user_id`, `address`  , `city`  , `zipcode` , `port_number` , `invoice_address`  , `invoice_city`  , `invoice_zipcode`  , `invoice_port_number`  , `is_name_same`  , `is_invoice_same`  , `name_on_house`   , `created_on`,entry_code ) values (? , ?, ?, ?, ? , ?, ?, ?, ? , ?, ?, ?, now(), ?)");
				/* bind parameters for markers */
			$stmt->bind_param("issssssssiiss",$data['user_id'],$posted_value['addrs1'],$posted_value['dcity'], htmlentities($posted_value['dzip'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($posted_value['pnumber'],ENT_NOQUOTES, 'ISO-8859-1'),$posted_value['iaddress'],$posted_value['icity'],htmlentities($posted_value['izip'],ENT_NOQUOTES, 'ISO-8859-1'),$posted_value['i_port_number'],$posted_value['same_invoice'],$posted_value['same_name'],$full_name,$data['entry_code']);
			$stmt->execute();
			}
			else
			{
			$stmt = $dbCon->prepare("update  user_address set  `address`=?  , `city`=?  , `zipcode`=? , `port_number` =?, `invoice_address` =? , `invoice_city` =? , `invoice_zipcode`=?  , `invoice_port_number`=?  , `is_name_same` =? , `is_invoice_same`=?  , `name_on_house`=?  ,entry_code=? where user_id=? and is_personal_address=1");
				/* bind parameters for markers */
			$stmt->bind_param("ssssssssiissi",$posted_value['addrs1'],$posted_value['dcity'], htmlentities($posted_value['dzip'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($posted_value['pnumber'],ENT_NOQUOTES, 'ISO-8859-1'),$posted_value['iaddress'],$posted_value['icity'],htmlentities($posted_value['izip'],ENT_NOQUOTES, 'ISO-8859-1'),$posted_value['i_port_number'],$posted_value['same_invoice'],$posted_value['same_name'],$full_name,$data['entry_code'],$data['user_id']);
			$stmt->execute();
			}
				
			}
			if($posted_value['bank']>0)
			{
			  $stmt = $dbCon->prepare("update user_profiles set clearing_number=?,bank_account_number=?,language=? where user_logins_id=?");
       
		
				/* bind parameters for markers */
				$stmt->bind_param("sssi", $posted_value['clear_number'],$posted_value['bank_acc'],$posted_value['langu'],$data['user_id']);
				$stmt->execute();
			}
			$stmt = $dbCon->prepare("INSERT INTO user_passport_logs (user_id, created_on) VALUES (?, now())");
			$stmt->bind_param("i", $data['user_id']);
			if( $stmt->execute())
			{
				$id_passport=$stmt->insert_id;
				if($posted_value['general']>0)
				{
					if($s!=$row['sex'])
					{
						$stmt = $dbCon->prepare("update user_passport_logs set sex=?,sex_old=?,sex_updated=1 where id=?");
						$stmt->bind_param("iii", $s,$row['sex'],$id_passport);
						$stmt->execute();
					}
					if($posted_value['name']!=$row['first_name'])
					{
						$stmt = $dbCon->prepare("update user_passport_logs set first_name=?,first_name_old=?,first_name_updated=1 where id=?");
						$stmt->bind_param("ssi", $posted_value['name'],$row['first_name'],$id_passport);
						$stmt->execute();
					}
					if($posted_value['l_name']!=$row['last_name'])
					{
						$stmt = $dbCon->prepare("update user_passport_logs set last_name=?,last_name_old=?,last_name_updated=1 where id=?");
						$stmt->bind_param("ssi", $posted_value['l_name'],$row['last_name'],$id_passport);
						$stmt->execute();
					}
					if($a[1]!=$row['dob_day'] || $a[0]!=$row['dob_month'] || $a[2]!=$row['dob_year'])
					{
						$stmt = $dbCon->prepare("update user_passport_logs set dob_day=?,dob_day_old=?,dob_month=?,dob_month_old=?,dob_year=?,dob_year_old=?, dob_updated=1 where id=?");
						$stmt->bind_param("iiiiiii", $a[1],$row['dob_day'],$a[0],$row['dob_month'],$a[2],$row['dob_year'],$id_passport);
						$stmt->execute();
					}
					 
					
				}
				if($posted_value['byssn']>0)
				{
					if($posted_value['ssn']!=$row['ssn'])
					{
						$stmt = $dbCon->prepare("update user_passport_logs set ssn=?,ssn_old=?,ssn_updated=1 where id=?");
						$stmt->bind_param("ssi", $posted_value['ssn'],$row['ssn'],$id_passport);
						$stmt->execute();
					}
				}
				if($posted_value['byphone']>0)
				{
					if($posted_value['c_phone']!=$row['country_phone'])
					{
						$stmt = $dbCon->prepare("update user_passport_logs set country_phone=?,country_phone_old=?,country_phone_updated=1 where id=?");
						$stmt->bind_param("ssi", $posted_value['c_phone'],$row['country_phone'],$id_passport);
						$stmt->execute();
					}
					if($posted_value['phone']!=$row['phone_number'])
					{
						$stmt = $dbCon->prepare("update user_passport_logs set phone_number=?,phone_number_old=?,phone_number_updated=1 where id=?");
						$stmt->bind_param("ssi", $posted_value['phone'],$row['phone_number'],$id_passport);
						$stmt->execute();
					}
				}
				
				if($posted_value['post']>0)
				{
					if($posted_value['addrs']!=$row['address'])
					{
						$stmt = $dbCon->prepare("update user_passport_logs set address=?,address_old=?,address_updated=1 where id=?");
						$stmt->bind_param("ssi", $posted_value['addrs'],$row['address'],$id_passport);
						$stmt->execute();
					}
					if($posted_value['city']!=$row['city'])
					{
						$stmt = $dbCon->prepare("update user_passport_logs set city=?,city_old=?,city_updated=1 where id=?");
						$stmt->bind_param("ssi", $posted_value['city'],$row['city'],$id_passport);
						$stmt->execute();
					}
					if($posted_value['cntry']!=$row['country'])
					{
						$stmt = $dbCon->prepare("update user_passport_logs set country=?,country_old=?,country_updated=1 where id=?");
						$stmt->bind_param("ssi", $posted_value['cntry'],$row['country'],$id_passport);
						$stmt->execute();
					}
					if($posted_value['zip']!=$row['zipcode'])
					{
						$stmt = $dbCon->prepare("update user_passport_logs set zipcode=?,zipcode_old=?,zipcode_updated=1 where id=?");
						$stmt->bind_param("ssi", $posted_value['zip'],$row['zipcode'],$id_passport);
						$stmt->execute();
					}
				}
				$stmt = $dbCon->prepare("select get_started_wizard_status from user_logins  where id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				
				$row = $result->fetch_assoc();
				if($row['get_started_wizard_status']==1)
				{
					$stmt->close();
					$dbCon->close();
					return 1;
					
				}
				
				else
				
				{
					$stmt = $dbCon->prepare("select first_name,last_name,ssn from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where user_logins.id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $data['user_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					
					$row = $result->fetch_assoc();
					
					if(($row['first_name']=="" || $row['first_name']=='-' || $row['first_name']==null) || ($row['last_name']=="" || $row['last_name']=='-' || $row['last_name']==null) || ($row['ssn']=="" || $row['ssn']=='-' || $row['ssn']==null))
					
					{
						$stmt->close();
						$dbCon->close();
						return 2;
					}
					
					else
					{
						$stmt = $dbCon->prepare("update user_logins set get_started_wizard_status=1 where id=?");
						
						/* bind parameters for markers */
						$stmt->bind_param("i", $data['user_id']);
						$stmt->execute();
						$stmt->close();
						$dbCon->close();
						return 2;
					}
					
				}
				
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			
			
		}
		}
		
		function searchUserDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$posted_value=json_decode($_POST['total_value'],true);
			
			$stmt = $dbCon->prepare("select first_name,last_name,ssn,country_of_residence,grading_status from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where user_logins.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			
			if($posted_value['general']>0) {
				
				$general='<div class="result-item padtb0  lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">Grunduppgifter</span>
				
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
				<a href="#" class="black_txt">Namn :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['name'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Efternamn :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['l_name'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Födelseår :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['dob'].'</span>
				</li>
				<li class="dflex mart10">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Kön :</a>
				</div>
				<span class="fxshrink_0 marl120">'.$posted_value['sex'].'</span>
				</li>
				</ul>
				</div>
				</div>';
			}
			else
			
			{
				$general='';
			}
			
			if($posted_value['byssn']>0) {
				
				$byssn='<div class="result-item padtb0  lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">Social Security Number</span>
				
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>'.$posted_value['byssn'].'</span>
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
				<a href="#" class="black_txt">Personnummer :</a>
				</div>
				<span class="fxshrink_0 marrl50">'.$posted_value['ssn'].'</span>
				</li>
				 
				</ul>
				</div>
				</div>';
			}
			else
			
			{
				$byssn='';
			}
			
			if($posted_value['post']>0) {
				$bypost='<div class="result-item padt10  lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">Bostad address</span>
				
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>'.$posted_value['post'].'</span>
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
				<a href="#" class="black_txt">Adress :</a>
				</div>
				<span class="fxshrink_0 marrl50">'.$posted_value['addrs'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Post nr. :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['zip'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Stad :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['city'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Land :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['cntry'].'</span>
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
			
			if($posted_value['bank']>0) { 
				$bank='<div class="result-item padt10  lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">Bank </span>
				
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>'.$posted_value['bank'].'</span>
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
				<a href="#" class="black_txt">Clear number :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['clear_number'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Bank account :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['bank_acc'].'</span>
				</li>
				
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Language :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['langu'].'</span>
				</li>
				</ul>
				</div>
				</div>';
			}
			else
			{
				$bank="";
			}
			$org='<div class="padb0 ">
			<h2 class="tall marb5 pad0 bold fsz24 black_txt">Godkänn ändringarna</h2>
			<div class="wi_100 dflex fxwrap_w marrla marb10 tall">
			
			
			
			<div class="wi_100 marb10 tall">
			
			<span class="valm fsz16">Nedan kan du läsa om de ändringar du har gjort. För att dessa ska träda i kraft behöver du signera.</span>
			</div>
			
			
			</div>
			</div>
			
			<!-- Center content -->
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10 lgtgrey2_bg brdrad3">
			<div class="padtb0 brdrad3 lgtgrey2_bg">
			
			<div class="mart0" id="search_data">
			'.$general.
			' '.$bypost.' '.$byphone.
			' '.$bank.''.$byssn.'
			
			
			
			</div>
			
			</div>
			<div id="error_msg_form" class="red_txt"></div>
			
			</div>
			<form method="POST" action="updateAccount" id="save_indexing_user" name="save_indexing_user" >
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla mart10"> <a href="#" class="wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2" onclick="submit_value_user();">Signera med Mobilt BankId</a> 
			<input type="hidden" id="total_value" name="total_value" value="'.str_ireplace('"',"'",$_POST['total_value']).'" />
			<input type="hidden" id="updateSecurity" name="updateSecurity" value="'.$row['grading_status'].'" />
			</div>
			</form>
			
			
			
			';
			
			
			
			return $org;
		}
		
		
		
		
		
		function verificationId($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select max(id) as v_id from user_passport_logs where user_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
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
		
		function changePassword($data)
		{
			
			$dbCon = AppModel::createConnection();
			//print_r($data); die;
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where id = ?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row    = $result->fetch_assoc();
			//print_r($row); die;
			$np=md5($_POST['newpassword']);
			if($row['password']==md5($_POST['cpassword']))
			{
				$stmt = $dbCon->prepare("update user_logins set password=? where id = ?");
				
				/* bind parameters for markers */
				$stmt->bind_param("si", $np,$data['user_id']);
				$stmt->execute();
			}
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		
		function checkPassword($data)
		{
			
			$dbCon = AppModel::createConnection();
			//print_r($data); die;
			$stmt = $dbCon->prepare("select password from user_logins where id = ?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row    = $result->fetch_assoc();
			//print_r($row); die;
			
			if($row['password']==$data['cpass'])
			{
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			$stmt->close();
			$dbCon->close();
			return 0;
		}
		
		function userBankid($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num	from bankid_verified where bank_id =(select ssn from user_profiles where user_logins_id=?)");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row['num'];
			
		}
		
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select user_logins.id,first_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image,get_started_wizard_status,grading_status,country_of_residence,country_name,user_logins.created_on from user_logins left join country on country.id=user_logins.country_of_residence where user_logins.id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			
			$stmt = $dbCon->prepare("select count(id) as num from user_visiting_countries where user_login_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCountries = $result->fetch_assoc();
			
			if($rowCountries['num']==0)
			{
				
			$stmt = $dbCon->prepare("insert into user_visiting_countries(user_login_id,country_info,default_country,current_country,created_on) values(?,?,?,?,now())");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iiii", $data['user_id'],$row['country_of_residence'],$cont,$cont);
			$stmt->execute();	
			}
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function userCountrySummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num from user_visiting_countries where user_login_id=? and country_info=67");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCountries = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $rowCountries;
			
			
		}
		
			function currentCountryDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select user_visiting_countries.id,country_name,identificator_type,identificator_name,default_country,current_country from user_visiting_countries left join phone_country_code on user_visiting_countries.country_info=phone_country_code.id left join identificator_info on identificator_info.id=user_visiting_countries.identificator_type where user_login_id=?");
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$toilet='';
			while($row = $result->fetch_assoc())
			{	 
		if($row['current_country']==1)
		{
			$toilet=$toilet.'<a href="javascript:void(0);" ><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">'.$row['country_name'].'</span>
															   </span>
															</span>
														 </div>
													  </div></a>';
	 										  
													  
		}
		else
		{
		$toilet=$toilet.'<a href="javascript:void(0);" onclick="updateCountry('.$row['id'].');"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">'.$row['country_name'].'</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
			}
				$org=$org.'<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt  ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												 <div class="css-1jzh2co marb15">
												   <p class="paragraph--b1 paragraph--full css-1680uhd">Select the country</p>
												   <div class="chip-container">
													  '.$toilet.'
													 
													 
												   </div>
												</div>
												<div class="clear"></div>
											 
											 
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div>
									</div><div class="clear"></div>
									</div>
									</div>
									';	
 								
											
			
			 
			
			 
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		function userCountryList($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select user_visiting_countries.id,country_name,identificator_type,identificator_name,default_country from user_visiting_countries left join phone_country_code on user_visiting_countries.country_info=phone_country_code.id left join identificator_info on identificator_info.id=user_visiting_countries.identificator_type where user_login_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCountries = $result->fetch_assoc())
			{
				if($rowCountries['default_country']==1)
				{
				$rowCountries['identificator_name']='Passport';
				}
				array_push($org,$rowCountries);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function identifiactorTypeInfo($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from identificator_info");
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCountries = $result->fetch_assoc())
			{
				array_push($org,$rowCountries);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function addVisitingCountry($data)
		{
			$dbCon = AppModel::createConnection();
			$data1 = strip_tags($_POST['image-data1']);
			 
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			$data2 = strip_tags($_POST['image-data3']);
			 
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name2="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name2.".txt", $data2); 
			$cont=0;			
			$issue_date=$_POST['issue_date'].'/'.$_POST['issue_month'].'/'.$_POST['issue_year'];
			$expiry_date=$_POST['expiry_date'].'/'.$_POST['expiry_month'].'/'.$_POST['expiry_year'];
			$stmt = $dbCon->prepare("insert into user_visiting_countries(user_login_id,country_info,default_country,current_country,created_on,`identificator_type`, `id_number`  , `issue_month`  , `issue_year`  , `expiry_month`  , `expiry_year`  , `front_image_path`  , `back_image_path`,phone_number,issue_date,expiry_date ) values(?,?,?,?,now(),?,?,?,?,?,?,?,?,?,?,?)");
			/* bind parameters for markers */
			$stmt->bind_param("iiiiissssssssss", $data['user_id'],$_POST['country_id'],$cont,$cont,$_POST['identificator_type'],$_POST['id_number'],$_POST['issue_month'],$_POST['issue_year'],$_POST['expiry_month'],$_POST['expiry_year'],$img_name1,$img_name2,$_POST['p_number'],$issue_date,$expiry_date);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function checkPassportInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select count(id) as num from user_visiting_countries where user_login_id!=? and id_number=? and country_info=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("isi", $data['user_id'],$_POST['id_number'],$_POST['pass_country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		
		
		function companySummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select company_id,company_name from employees left join companies on employees.company_id=companies.id where employees.user_login_id = ? and companies.email_verification_status=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$i]['enc']=$this->encrypt_decrypt('encrypt',$row['company_id']);
				$i++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
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
		
		
		
		function activeEmployeeRequests($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select company_name,count(employee_request.id) as total from employee_request left join companies on employee_request.company_id=companies.id where employee_request.user_login_id =? and status=0 group by employee_request.user_login_id");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
			}
			
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function countryList($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select country_name from country where id>-1 and id<240 order by country_name");
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
		
		function completedStudentRequests($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select company_id,company_name from employees left join companies on employees.company_id=companies.id where employees.user_login_id = ? and o_type=2");
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
		
		
		
		function activeStudentRequests($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			
			
			
			$stmt = $dbCon->prepare("select company_name,count(student_request.id) as total from student_request left join companies on student_request.company_id=companies.id where student_request.user_login_id =? and status=0 group by student_request.user_login_id");
			
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
			}
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		function completedTenantRequests($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select company_id,company_name from employees left join companies on employees.company_id=companies.id where employees.user_login_id = ? and o_type=3");
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
		
		
		
		function activeTenantRequests($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			
			
			$stmt = $dbCon->prepare("select company_name,count(ctenant_request.id) as total from ctenant_request left join companies on ctenant_request.company_id=companies.id where ctenant_request.user_login_id =? and status=0 group by ctenant_request.user_login_id");
			
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
			}
			
			
			$stmt = $dbCon->prepare("select company_name,count(ptenant_request.id) as total from ptenant_request left join companies on ptenant_request.company_id=companies.id where ptenant_request.user_login_id =? and status=0 group by ptenant_request.user_login_id");
			
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
			}
			
			
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		function connectAccountDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select id,company_name from user_employer_connect where user_login_id=? and aproval_status=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$org=array();
			while($row1 = $result1->fetch_assoc())
			{
				array_push($org,$row1);
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function connectAccount($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select id,company_email from companies where company_name = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("s", $data['cname']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
				
				// echo "hello";
				$stmt = $dbCon->prepare("select id from user_employer_connect where company_name = ? and user_login_id=?");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("si", $data['cname'],$data['user_id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if(empty($row1))
				{
					
					$stmt = $dbCon->prepare("select id from employees where company_id = ? and user_login_id=?");
					/* bind parameters for markers */
					$cont=1;
					
					$stmt->bind_param("ii", $row['id'],$data['user_id']);
					$stmt->execute();
					$result2 = $stmt->get_result();
					$row2 = $result2->fetch_assoc();
					
					if(empty($row2))
					{
						$ast=0;
					}
					else
					{
						$ast=1;
					}
					//echo $ast; die;
					$stmt = $dbCon->prepare("insert into user_employer_connect (company_name,company_id,user_login_id,created_on,`aproval_status` ) values(?,?,?,now(),?)");
					/* bind parameters for markers */
					$cont=1;
					$stmt->bind_param("siii", $data['cname'],$row['id'],$data['user_id'],$ast);
					$stmt->execute();
					$company_id=$row['id'];
					$stmt = $dbCon->prepare("select company_name,company_email from companies where id=?");
					$stmt->bind_param("i", $company_id);
					$stmt->execute();
					$result = $stmt->get_result();
					
					$row_c=$result->fetch_assoc();
					$c_id =$this -> encrypt_decrypt('encrypt',$row['id']);
					//echo $c_id; die;
					$u_id= $this -> encrypt_decrypt('encrypt',$data['user_id']);
					$stmt = $dbCon->prepare("select * from employees where user_login_id=? and company_id=?");
					$stmt->bind_param("ii", $data['user_id'],$company_id);
					$stmt->execute();
					$result = $stmt->get_result();
					$row_emp=$result->fetch_assoc();
					
					$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name from user_logins where id = ?");
					/* bind parameters for markers */
					$cont=1;
					$stmt->bind_param("i", $data['user_id']);
					$stmt->execute();
					$resultuser = $stmt->get_result();
					$username = $result->fetch_assoc();
					
					if(!$row_emp)
					{	
						$d=date('Y-m-d');
						$stmt = $dbCon->prepare("insert into employee_request(`company_id`,`user_login_id`,`created_date`,`modified_date`) values(?, ?, ?, ?)");
						$stmt->bind_param("iiss", $company_id,$data['user_id'],$d,$d);
						if($stmt->execute())
						{
							$to = $row_c['company_email'];
							$subject = "Telezales - Employee Request";
							$emailContent =$username['name'].'  is requesting for an employee profile page for '.$row_c['company_name'].'. To approve/reject click on following link :<a href="https://www.qloudid.com/company/index.php/EmployeeRequest/locationShow/'.$c_id.'">Click here</a>';
							$from = "admin@telezales.com";
							$headers = "MIME-Version: 1.0 \r\n";
							$headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
							//echo $emailContent; die;
							sendEmail($subject, $to, $emailContent  );
							//echo $emailContent; die;
						}
						
					}
					else
					
					{
						$to = $username['email'];
						$subject = "Telezales - Employee Approval/Rejection";
						$emailContent ='Your are already a employee of the same company and click following link to view your employee profile page:<a href="https://www.qloudid.com/user_company_detail.php?id='.$c_id.'">Click here</a>';
						$from = "admin@telezales.com";
						$headers = "MIME-Version: 1.0 \r\n";
						$headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
						sendEmail($subject, $to, $emailContent  );
						
						
					}
					
					$stmt->close();
					$dbCon->close();
					return 1;
				}
			}
			else 
			{
				$stmt = $dbCon->prepare("select id from virtual_company where company_name = ?");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("s", $data['cname']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				if(!empty($row))
				{
					$stmt = $dbCon->prepare("select id from user_employer_connect where company_name = ? and user_login_id=?");
					/* bind parameters for markers */
					$cont=1;
					$stmt->bind_param("si", $data['cname'],$data['user_id']);
					$stmt->execute();
					$result1 = $stmt->get_result();
					$row1 = $result1->fetch_assoc();
					if(empty($row1))
					{
						$stmt = $dbCon->prepare("insert into user_employer_connect (company_name,virtual_id,user_login_id,created_on) values(?,?,?,now())");
						/* bind parameters for markers */
						$cont=1;
						$stmt->bind_param("sii", $data['cname'],$row['id'],$data['user_id']);
						$stmt->execute();  
					}
					
				}
				else
				{
					$stmt = $dbCon->prepare("insert into virtual_company (company_name) values(?)");
					/* bind parameters for markers */
					$cont=1;
					$stmt->bind_param("s", $data['cname']);
					$stmt->execute(); 
					
					$stmt = $dbCon->prepare("select id from virtual_company where company_name = ?");
					/* bind parameters for markers */
					$cont=1;
					$stmt->bind_param("s", $data['cname']);
					$stmt->execute();
					$result = $stmt->get_result();
					$row = $result->fetch_assoc();
					
					$stmt = $dbCon->prepare("select id from user_employer_connect where company_name = ? and user_login_id=?");
					/* bind parameters for markers */
					$cont=1;
					$stmt->bind_param("si", $data['cname'],$data['user_id']);
					$stmt->execute();
					$result1 = $stmt->get_result();
					$row1 = $result->fetch_assoc();
					
					if(empty($row1))
					{
						$stmt = $dbCon->prepare("insert into user_employer_connect (company_name,virtual_id,user_login_id,created_on) values(?,?,?,now())");
						/* bind parameters for markers */
						$cont=1;
						$stmt->bind_param("sii", $data['cname'],$row['id'],$data['user_id']);
						$stmt->execute(); 
						
					}
					
					$stmt->close();
					$dbCon->close();
					return 1;
					
				}
				
				$stmt->close();
				$dbCon->close();
				return 1;
				
			}
			
			
			
		}
		
		function connectCompany($data)
		{
			$dbCon = AppModel::createConnection();
			$st=1;
			$p=$data['name']."%";
            $stmt   = $dbCon->prepare("select company_name from companies where o_type=? and email_verification_status=? and company_name like ?");
            $status = 1;
            /* bind parameters for markers */
            $stmt->bind_param("iis", $st,$st,$p);
            
            $stmt->execute();
			$result = $stmt->get_result();	
			$output="";
			while( $row = $result->fetch_assoc())
			{
				$output = $output. '<option value="'.$row['company_name'].'">';
			}
			$stmt   = $dbCon->prepare("select company_name from virtual_company where company_name like ?");
            $status = 1;
            /* bind parameters for markers */
            $stmt->bind_param("s", $p);
            
            $stmt->execute();
			$result = $stmt->get_result();	
			while( $row = $result->fetch_assoc())
			{
				$output = $output. '<option value="'.htmlspecialchars_decode($row['company_name']).'">';
			}
            
			$stmt->close();
			$dbCon->close();
			
			return $output;
		}
		
		function connectCompanyCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$p='%'.$data['name']."%";
            $stmt   = $dbCon->prepare("select count(id) as num from companies where company_name like ?");
            $status = 1;
            /* bind parameters for markers */
            $stmt->bind_param("s", $p);
            
            $stmt->execute();
			$result = $stmt->get_result();	
			
			$row = $result->fetch_assoc();
			$a=0;
			$a=$a+$row['num'];
			$stmt   = $dbCon->prepare("select count(id) as num from virtual_company where company_name like ?");
            $status = 1;
            /* bind parameters for markers */
            $stmt->bind_param("s", $p);
            
            $stmt->execute();
			$result1 = $stmt->get_result();	
			$row1 = $result1->fetch_assoc();
			$a=$a+$row1['num'];
			$stmt->close();
			$dbCon->close();
			
			return $a;
		}
		
		function userAccount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select user_logins.id,first_name,last_name,concat_ws(' ',first_name,last_name) as name,sex,dob_day,dob_month,dob_year,user_logins.created_on,email,country_of_residence,ssn,phone_number  from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id=?");
			
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
			
			$stmt = $dbCon->prepare("select * from user_profiles  where user_logins_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function updateUser($data)
		{
			$dbCon = AppModel::createConnection();
			
			//	print_r($data); die;
			if($data['uid']==1)
			{
				$stmt = $dbCon->prepare("update user_profiles set ssn=?  where user_logins_id=?");
			}
			else  if($data['uid']==2)
			{
				$stmt = $dbCon->prepare("update user_logins set last_name=?  where id=?");
			}
			else  if($data['uid']==3)
			{
				$stmt = $dbCon->prepare("update user_logins set first_name=?  where id=?");
			}
			/* bind parameters for markers */
			$stmt->bind_param("si", $data['cid'],$data['user_id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateImage($data)
		{
			$dbCon = AppModel::createConnection();
			//print_r($_POST); die;
			$data1 = strip_tags($_POST['image-data1']);
			//echo $data; die;
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			//echo $img_name1; print_r($_POST); die;
			$stmt = $dbCon->prepare("update user_logins set passport_image=?  where id=?");
			
			$stmt->bind_param("si", $img_name1,$data['user_id']);
			$stmt->execute();
			// echo "jain"; die;
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateDataPost($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("update user_profiles set address=?,city=?,country=?,zipcode=?  where user_logins_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssssi", $_POST['addrs'],$_POST['city'],$_POST['cntry'],$_POST['zip'],$_POST['user_id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateData($data)
		{
			$dbCon = AppModel::createConnection();
			$a=array();
			$a=explode("/",$_POST['dob']);
			if($_POST['sex']=='M')
			{
				$s=1;
			}
			else  if($_POST['sex']=='F')
			{
				$s=2;
			}
			else  if($_POST['sex']=='T')
			{
				$s=3;
			}
			$stmt = $dbCon->prepare("update user_logins set sex=?,dob_day=?,dob_month=?,dob_year=?,first_name=?,last_name=?  where id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("iiiissi", $s,$a[1],$a[0],$a[2],$_POST['name'],$_POST['l_name'],$_POST['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update user_profiles set ssn=?  where user_logins_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['ssn'],$_POST['user_id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateDate($data)
		{
			$dbCon = AppModel::createConnection();
			$a=array();
			$a=explode("/",$data['cid']);
			// print_r ($a); die;
			$stmt = $dbCon->prepare("update user_logins set dob_day=?,dob_month=?,dob_year=?  where id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("iiii", $a[1],$a[0],$a[2],$data['user_id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateSex($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("update user_logins set sex=?  where id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['cid'],$data['user_id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateDataBank($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("update user_profiles set clearing_number=?,bank_account_number=?,language=? where user_logins_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("sssi", $_POST['clear_number'],$_POST['bank_acc'],$_POST['langu'],$_POST['user_id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateDataPhone($data)
		{
			$dbCon = AppModel::createConnection();
			if($_POST['phone']!="")
			{
				
				$stmt = $dbCon->prepare("select user_logins_id from user_profiles where phone_number=? and country_phone=? and user_logins_id !=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("ssi",$_POST['phone'],$_POST['c_phone'], $data['user_id']);
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
			else
			{
				$stmt->close();
				$dbCon->close();
				return 1; 
			}
			
		}
		
		
		function verifyUserDetail()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select country_code  from phone_country_code where country_name=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['countryname']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$phone="+".trim($row['country_code'])."".trim($_POST['phoneno']);
			$num=(mt_rand(1111111,9999999)); 
			$subject='Your one time password(OTP) is:'.$num;
			$to=$phone;
			$html='Ditt engångslösenord:'.$num;
			$res=sendSms($subject, $to, $html);
			$rs=json_decode($res,true);
			//print_r($res); die;
			if($rs['status']=='OK')
			{
				$stmt = $dbCon->prepare("insert into verify_user_phone (otp,created_on) values(?, now())");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $num);
				$stmt->execute();
				$id=$stmt->insert_id;
				$stmt->close();
				$dbCon->close();
				return $id;
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		}
		
		
		
		function selectCountry()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name  from country where id>-1 and id<240 order by country_name");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			$contry = array();
			while ($row = $result->fetch_assoc()) {
				
				array_push($contry, $row);
			}
			return $contry;
			$stmt->close();
			$dbCon->close();
			
		}
		
		
		function verifyOtp()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select otp  from verify_user_phone where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['infor_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if($row['otp']==$_POST['otp'])
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
		
		
		
		
		
	}		