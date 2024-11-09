<?php
	require_once('../AppModel.php');
	class GetIdentifiedModel extends AppModel
	{
	
		
	
		function checkVerified($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id=$this -> encrypt_decrypt('decrypt',$data['id']);
            $stmt   = $dbCon->prepare("select is_approved from company_user_connection where id=?");
            $status = 1;
            /* bind parameters for markers */
            $stmt->bind_param("i", $request_id);
            
            $stmt->execute();
			$result = $stmt->get_result();	
			$row = $result->fetch_assoc();
			
            
			$stmt->close();
			$dbCon->close();
			
			return $row['is_approved'];
		}
		function getInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['id']);
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
		
		function checkUserAvailability($data)
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
		
		}			