<?php
	require_once('../AppModel.php');
	class VerifiyIDModel extends AppModel
	{
		
		
		function searchUserDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select first_name,last_name  from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_user = $result->fetch_assoc();
			
			if(isset($_POST['pnumber']))
			{
				$stmt = $dbCon->prepare("select user_logins_id  from user_profiles where ssn=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("s", $_POST['pnumber']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				if(empty($row))
				{
					$user_id= 0;
				}
				else
				{
					$user_id= $row['user_logins_id'];
					$stmt = $dbCon->prepare("select id,first_name,last_name,email  from user_logins where id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $user_id);
					$stmt->execute();
					$result = $stmt->get_result();
					$row_request = $result->fetch_assoc();
				}
				
				$d=date('Y-m-d h:i:s');
				$stmt = $dbCon->prepare("insert into company_user_connection (company_id,user_id,created_on,sender_id,user_ssn) values(?, ?, now(),?,?)");
				$st=1;
				/* bind parameters for markers */
				
				$stmt->bind_param("iiii", $company_id,$user_id,$data['user_id'],$_POST['pnumber']);
				$stmt->execute();
				//echo $stmt->error;
				$rsultId=$stmt->insert_id;
				$enc=$this -> encrypt_decrypt('encrypt',$rsultId);
				
				$stmt = $dbCon->prepare("select id,credits_left  from verify_id_credits where company_id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				
				$row = $result->fetch_assoc();
				
				$update=$row['credits_left']-1;
				
				$stmt = $dbCon->prepare("update verify_id_credits set credits_left=?  where id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("ii", $update,$row['id']);
				$stmt->execute();
				
				if($user_id>0)
				{
					
					$to      = $row_request['email'];
					$subject = "Qloudid : Request to access your details";
					
					$emailContent =$row_user['first_name'].' '.$row_user['last_name'].' has requested to access your personal data. Click <a href="https://www.safeqloud.com/user/index.php/PublicUserRequest/companyConnection/'.$enc.'">here</a> to take action </br> If above link does not work, please copy the following link in your browser. </br>https://www.safeqloud.com/user/index.php/PublicUserRequest/companyConnection/'.$enc;
					sendEmail($subject, $to, $emailContent);
					
					$stmt = $dbCon->prepare("select country_code,phone_number  from user_profiles left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where user_profiles.user_logins_id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $row_request['id']);
					$stmt->execute();
					$result_phone = $stmt->get_result();
					$row_phone = $result_phone->fetch_assoc();
					
					$phone='+'.trim($row_phone['country_code']).''.trim($row_phone['phone_number']);
					$subject='Informationen om din vän/anhörig';
					$to=$phone;
					
					$html='Du har blivit ombedd att identifiera dig. Qloud ID https://www.safeqloud.com/user/index.php/PublicUserRequest/companyConnection/'.$enc;
					
					$res=sendSms($subject, $to, $html);
				}
				$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("s", $_POST['cnrty']);
				$stmt->execute();
				$result_phone = $stmt->get_result();
				$row_phone = $result_phone->fetch_assoc();
				
				$url="https://www.safeqloud.com/user/index.php/GetIdentified/verifyRequest/".$enc;
				$surl=getShortUrl($url);
				
				$subject='Vgr och starta din BankID för verifiering.';
				$html='Vgr och starta din BankID för verifiering. Frågor? '.$surl;
				$to='+'.trim($row_phone['country_code']).''.trim($_POST['phone']);
				
				$res1=sendSms($subject, $to, $html);
				
				$stmt->close();
				$dbCon->close();
				return 1;
				
				
			}
			
		}
		
		function selectCountry()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name  from country where id>0 and id<240 order by country_name");
			
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
		
		function selectCredits($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select credits_left  from verify_id_credits where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$stmt = $dbCon->prepare("insert into verify_id_credits (company_id,created_on) values (?, now())");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 5;
			}
			else
			{
				
				$stmt->close();
				$dbCon->close();
				return $row['credits_left'];
			}
			
			
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
	}			