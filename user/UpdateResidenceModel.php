<?php
	require_once('../AppModel.php');
	class UpdateResidenceModel extends AppModel
	{
		function checkCountry($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select country_of_residence  from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			if($row['country_of_residence']==$_POST['cntry'])
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
		
		
		function updateUserProfile($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select email,grading_status  from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row_user = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select country_name  from country where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['ccountry']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row_country = $result->fetch_assoc();
			
			$stmt= $dbCon->prepare("update user_logins set country_of_residence=? where id= ?");
			$stmt->bind_param("ii", $_POST['ccountry'],$data['user_id']);
			if($stmt->execute())
			{
				$phv=0;
				$stmt= $dbCon->prepare("update user_profiles set zipcode=?,city=?,ssn=?,address=?,country_phone=?,phone_number=?,phone_verified=? where user_logins_id= ?");
				$stmt->bind_param("ssisssii", $_POST['zip'],$_POST['city'],$_POST['ssecurity'],htmlentities($_POST['adrs'],ENT_NOQUOTES, 'ISO-8859-1'),$row_country['country_name'],$_POST['uphno'],$phv,$data['user_id']);
				if($stmt->execute())
				{
					
						$stmt = $dbCon->prepare("update user_logins set grading_status=? where id = ?");
						
						/* bind parameters for markers */
						$stmt->bind_param("ii",$_POST['updateSecurity'], $data['user_id']);
						$stmt->execute();
					
					$stmt = $dbCon->prepare("INSERT INTO user_passport_logs (user_id, created_on) VALUES (?, now())");
					$stmt->bind_param("i", $data['user_id']);
					$fields=array();
					$fields=$_POST;
					$fields['email']=$row_user['email'];
					
					$fields['first_name']=$row_user['first_name'];
					$fields['last_name']=$row_user['last_name'];
					
					$posted_value=array();
					$posted_value['posted']= $this -> encrypt_decrypt('encrypt',serialize($fields));
					$url='https://www.qmatchup.com/beta/user/index.php/NewPersonal/updateResidence';
					$ch = curl_init();
					
					curl_setopt($ch, CURLOPT_URL,$url);
					curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
					curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
					curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
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
		
		
		
		function GetStartedUser($data)
		{
			$dbCon = AppModel::createConnection();
			
            $stmt   = $dbCon->prepare("select id,`first_name`,`last_name`,sex,dob_month,dob_day,dob_year,get_started_wizard_status,country_of_residence,grading_status from user_logins  WHERE id=?");
            $status = 1;
            /* bind parameters for markers */
            $stmt->bind_param("i", $data['user_id']);
            
            $stmt->execute();
			$result = $stmt->get_result();	
			$row = $result->fetch_assoc();
			
            
			$stmt->close();
			$dbCon->close();
			
			return $row;
		}
		
        function phoneAccount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select phone_number,ssn from user_profiles  where user_logins_id=?");
			
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
				$stmt = $dbCon->prepare("select phone_number,ssn from user_profiles  where user_logins_id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				
				$row = $result->fetch_assoc();
			}
			
			
			$stmt->close();
			$dbCon->close();
			return $row;
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