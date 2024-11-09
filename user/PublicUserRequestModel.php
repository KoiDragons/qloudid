<?php
	require_once('../AppModel.php');
	class PublicUserRequestModel extends AppModel
	{
		function checkUserAvailabilitySSN($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$_POST['id']);
			
			$stmt = $dbCon->prepare("select user_ssn from company_user_connection where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s",$request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			if($row['user_ssn']== $_POST['ssecurity1'])
			{
				$stmt->close();
				$dbCon->close();
				return $row['user_ssn'];
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		}
		
					
		function checkUserAvailability()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select user_logins_id  from user_profiles where ssn=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['ssecurity1']);
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
				return $row['user_logins_id'];
			}
		}
		
		
		function GetStartedUser($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id=$this -> encrypt_decrypt('decrypt',$data['r_id']);
            $stmt   = $dbCon->prepare("select user_profiles.city,zipcode,address,phone_number,ssn,passport_image,concat_ws(' ', first_name, last_name) as name,`first_name`,`last_name`,sex,dob_month,dob_day,dob_year from user_logins left join user_profiles on user_logins.id=user_profiles.user_logins_id WHERE user_logins.id=(select request_sender from user_detail_requests where user_detail_requests.id=?)");
            $status = 1;
            /* bind parameters for markers */
            $stmt->bind_param("i", $request_id);
            
            $stmt->execute();
			$result = $stmt->get_result();	
			$row = $result->fetch_assoc();
			
            
			$stmt->close();
			$dbCon->close();
			
			return $row;
		}
		
		function getInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['r_id']);
			$stmt = $dbCon->prepare("select first_name,last_name,email,company_name,profile_pic,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax  from company_user_connection left join user_logins on company_user_connection.sender_id=user_logins.id left join companies on company_user_connection.company_id=companies.id left join company_profiles on companies.id=company_profiles.company_id where company_user_connection.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_user = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row_user;
		}
		
		function GetStartedCompany($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id=$this -> encrypt_decrypt('decrypt',$data['r_id']);
            $stmt   = $dbCon->prepare("select company_name from companies WHERE id=(select company_id from company_user_connection where id=?)");
            $status = 1;
            /* bind parameters for markers */
            $stmt->bind_param("i", $request_id);
            
            $stmt->execute();
			$result = $stmt->get_result();	
			$row = $result->fetch_assoc();
			
            
			$stmt->close();
			$dbCon->close();
			
			return $row;
		}
        
		function checkVerified($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id=$this -> encrypt_decrypt('decrypt',$data['r_id']);
            $stmt   = $dbCon->prepare("select is_approved from company_user_connection where id=?");
            $status = 1;
            /* bind parameters for markers */
            $stmt->bind_param("i", $request_id);
            
            $stmt->execute();
			$result = $stmt->get_result();	
			$row = $result->fetch_assoc();
			
            
			$stmt->close();
			$dbCon->close();
			
			return $row;
		}
		
		function checkVerifiedRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id=$this -> encrypt_decrypt('decrypt',$data['r_id']);
            $stmt   = $dbCon->prepare("select status from user_detail_requests where id=?");
            $status = 1;
            /* bind parameters for markers */
            $stmt->bind_param("i", $request_id);
            
            $stmt->execute();
			$result = $stmt->get_result();	
			$row = $result->fetch_assoc();
			
            
			$stmt->close();
			$dbCon->close();
			
			return $row['status'];
		}
		
		
		function LoginAccount($data)
		{
			$SECRET_KEY = 'qloud_login:system';
			$dbCon = AppModel::createConnection();
			//print_r($data); die;
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where email = ?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $data['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row    = $result->fetch_assoc();
			//print_r($row); die;
			$value  = array();
			if (empty($row)) {
				$value['result'] = 1;
				$value['id']     = 0;
				return $value;
			}
			if (trim($row['password']) == $data['password']) {
				$userid = $row['id'];
				$token = md5(uniqid(rand(), true)); // generate a token, should be 128 - 256 bit
				//storeTokenForUser($user, $token);
				$cookie = $this -> encrypt_decrypt('encrypt',$userid) . ':' . $token;
				$mac = hash_hmac('sha256', $cookie, $SECRET_KEY);
				$cookie .= ':' . $mac; //echo $cookie; die;
				//$value['cookie']=$cookie;
				//setcookie('rememberme', $cookie, '/');
				session_start();
				$_SESSION['rememberme_qid'] = $cookie;
				// print_r($_COOKIE); die;
				$expire = time() + 60 * 60;
				if (isset($_POST['staylogin'])) {
					setcookie("email", $userid, $expire);
				}
				if ($row['verification_status'] == 1) {
					if ($row['get_started_wizard_status'] == 0) {
						$_SESSION['user_id'] = $row['id'];
						
						$date = date('Y-m-d H:i:s');
						$stmt = $dbCon->prepare("UPDATE user_logins SET `last_login`=? , login_hash=?  WHERE `id`=?");
						/* bind parameters for markers */
						$stmt->bind_param("ssi", $date,  $mac,$_SESSION['user_id']);
						$stmt->execute();
						if (!$stmt->execute()) {
							$value['result'] = 0;
							$value['id']     = 0;
							return $value;
							} else {
							$value['result'] = 2;
							$value['id']     = $row['id'];
							return $value;
						}
						} else {
						$_SESSION['user_id'] = $row['id'];
						
						$date = date('Y-m-d H:i:s');
						// echo  $mac; die;
						$stmt = $dbCon->prepare("UPDATE user_logins SET `last_login`=? , login_hash=?  WHERE `id`=?");
						/* bind parameters for markers */
						$stmt->bind_param("ssi", $date,  $mac,$_SESSION['user_id']);
						$stmt->execute();
						if (!$stmt->execute()) {
							$value['result'] = 0;
							$value['id']     = 0;
							return $value;
							} else {
							$value['result'] = 3;
							$value['id']     = $row['id'];
							return $value;
						}
					}
					} else {
					$value['result'] = 4;
					$value['id']     = 0;
					return $value;
				}
				} else {
				$value['result'] = 5;
				$value['id']     = 0;
				return $value;
			}
			
			$stmt->close();
			$dbCon->close();
		}
		
		
		function loginUpdate($data)
		{
			$SECRET_KEY = 'qloud_login:system';
			$dbCon = AppModel::createConnection();
			$userid = $_POST['user_id'];
			$token = md5(uniqid(rand(), true)); 
			$cookie = $this -> encrypt_decrypt('encrypt',$userid) . ':' . $token;
			$mac = hash_hmac('sha256', $cookie, $SECRET_KEY);
			$cookie .= ':' . $mac; 
			session_start();
			$_SESSION['rememberme_qid'] = $cookie;
			$expire = time() + 60 * 60;
			
			$_SESSION['user_id'] = $userid;
			
			$date = date('Y-m-d H:i:s');
			$stmt = $dbCon->prepare("UPDATE user_logins SET `last_login`=? , login_hash=?  WHERE `id`=?");
			/* bind parameters for markers */
			$stmt->bind_param("ssi", $date,  $mac,$_SESSION['user_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
            return 1;
		}
		
		function approveRequest()
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$_POST['id']);
		
			$stmt = $dbCon->prepare("update user_detail_requests set verified_by=?,status=1,request_receiver=? where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("sii",$_POST['prnumber'],$_POST['user_id'], $request_id);
			$stmt->execute();
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function sendIntimation()
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$_POST['id']);
		//	print_r($_POST); die;
			$stmt = $dbCon->prepare("update company_user_connection set verified_by=?,is_approved=3 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii",$_POST['user_id'], $request_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select first_name,last_name,email,company_name,company_id  from company_user_connection left join user_logins on company_user_connection.sender_id=user_logins.id left join companies on company_user_connection.company_id=companies.id where company_user_connection.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_user = $result->fetch_assoc();
			$enc=$this->encrypt_decrypt('encrypt',$row_user['company_id']);
			$to      = $row_user['email'];
			$subject = "Verification information";
			
			$emailContent ='User has confirmed company connection request. Please approve or reject his/her verification.</br> Click <a href="https://www.safeqloud.com/user/index.php/CompanyVerifiedConnections/companyAccount/'.$enc.'">here</a>';
			sendEmail($subject, $to, $emailContent);
			$stmt->close();
			$dbCon->close();
			return 1;
		}
	}			