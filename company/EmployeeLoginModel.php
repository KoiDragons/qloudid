<?php
	require_once('../AppModel.php');
	class EmployeeLoginModel extends AppModel
	{
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
			
			$stmt = $dbCon->prepare("select support_email,support_country,support_phone,sales_email,sales_country,sales_phone,invoice_email,invoice_country,invoice_phone,website,companies.country_id,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax,fb,twitter,insta,blog from companies left join company_profiles on companies.id=company_profiles.company_id left join country on companies.country_id=country.id left join phone_country_code on phone_country_code.country_name=country.country_name  where companies.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			
			
			
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
		
		function verifyUserDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select user_logins_id   from user_profiles where country_phone=? and phone_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ss", $_POST['cntry'],$_POST['uphno']);
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
			$stmt = $dbCon->prepare("select id   from employees where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$row['user_logins_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_employee = $result->fetch_assoc();	
			if(empty($row_employee))
			{
			$stmt->close();
			$dbCon->close();
			return 0;	
			}
			
			else
			{
				$stmt = $dbCon->prepare("select country_code  from phone_country_code where country_name=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['countryname']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowc = $result->fetch_assoc();
			$phone="+".trim($rowc['country_code'])."".trim($_POST['uphno']);
			$num=(mt_rand(1111111,9999999)); 
			$subject='Your one time password(OTP) is:'.$num;
			$to=$phone;
			$html='Ditt engångslösenord:'.$num;
			$res=sendSms($subject, $to, $html);
			$rs=json_decode($res,true);
			
			if($rs['status']=='OK')
			{
				$stmt = $dbCon->prepare("insert into verify_user_phone (otp,created_on,user_login_id) values(?, now(),?)");
				
				/* bind parameters for markers */
				$stmt->bind_param("ii", $num,$row['user_logins_id']);
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
			
			
			}
			
			
		}
		
		
		function verifyPhone($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$emp_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select user_logins_id,country_phone,phone_number   from user_profiles where user_logins_id=(select user_login_id from employees where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $emp_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select country_code  from phone_country_code where country_name=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $row['country_phone']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowc = $result->fetch_assoc();
			$phone="+".trim($rowc['country_code'])."".trim($row['phone_number']);
			$num=(mt_rand(1111111,9999999)); 
			$subject='Your one time password(OTP) is:'.$num;
			$to=$phone;
			$html='Ditt engångslösenord:'.$num;
			$res=sendSms($subject, $to, $html);
			$rs=json_decode($res,true);
			//print_r($rs); 
			if($rs['status']=='OK')
			{
				$stmt = $dbCon->prepare("insert into verify_user_phone (otp,created_on,user_login_id) values(?, now(),?)");
				
				/* bind parameters for markers */
				$stmt->bind_param("ii", $num,$row['user_logins_id']);
				$stmt->execute();
				$id=$stmt->insert_id;
				//echo $id; die;
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
			
			
		function getPhone($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$emp_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select user_logins_id,country_phone,phone_number   from user_profiles where user_logins_id=(select user_login_id from employees where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $emp_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['phone_number'];
			}
		
		
		
		function verifyOtp($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select otp,user_login_id  from verify_user_phone where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['infor_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if($row['otp']==$_POST['otp'])
			{
			$SECRET_KEY = 'qloud_login:system';	
			$userid = $row['user_login_id'];
			$token = md5(uniqid(rand(), true)); 
			$cookie = $this -> encrypt_decrypt('encrypt',$userid) . ':' . $token;
			$mac = hash_hmac('sha256', $cookie, $SECRET_KEY);
			$cookie .= ':' . $mac; //echo $cookie; die;
			session_start();
			$_SESSION['rememberme_qid'] = $cookie;
			$expire = time() + 60 * 60;	
			$_SESSION['user_id'] = $row['user_login_id'];
            $stmt = $dbCon->prepare("UPDATE user_logins SET `last_login`=now() , login_hash=?  WHERE `id`=?");
            $stmt->bind_param("si", $mac,$_SESSION['user_id']);
            $stmt->execute();	
			
			$stmt = $dbCon->prepare("select id   from employees where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$row['user_login_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_employee = $result->fetch_assoc();	
			$stmt->close();
			$dbCon->close();
			return $this-> encrypt_decrypt('encrypt',$row_employee['id']);;
			}
			else
			{
				
				$stmt->close();
				$dbCon->close();
				return 0;
			}
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
		
	}						