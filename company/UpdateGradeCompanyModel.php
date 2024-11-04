<?php
	require_once('../AppModel.php');
	class UpdateGradeCompanyModel extends AppModel
	{
		function updateGrading($data)
    {
		$dbCon = AppModel::createConnection();
        $grading=$this->encrypt_decrypt('decrypt',$data['grading']);
		$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
        $stmt = $dbCon->prepare("update companies set grading_status=? where id = ?");
        /* bind parameters for markers */
        $stmt->bind_param("ii",$grading, $company_id);
        if($stmt->execute())
		{
		$stmt->close();
        $dbCon->close();
		return 1;
		}
		$stmt->close();
        $dbCon->close();
		return 0;
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
			
			$stmt = $dbCon->prepare("select ssn,address,country,city,zipcode,phone_number,clearing_number,bank_account_number,language,country_phone from user_profiles  where user_logins_id=?");
			/* bind parameters for markers */
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
			
			$stmt = $dbCon->prepare("select id,first_name,last_name,sex,dob_day,dob_month,dob_year,created_on,email  from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function verificationId($data)
		{
			$dbCon = AppModel::createConnection();
			
			$row=$this->encrypt_decrypt('decrypt',$data['uid']);
			
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
		
		
		
		
	}
