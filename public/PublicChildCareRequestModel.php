<?php

	require_once('../AppModel.php');
	class PublicChildCareRequestModel extends AppModel
	{
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
		function requestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select parent_user_id,concat_ws(' ',first_name,last_name) as name,company_name from parent_info left join child_care_info on parent_info.child_id=child_care_info.id left join companies on companies.id=child_care_info.company_id where parent_info.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		function updateParent($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("update parent_info set parent_user_id= ?,parent_ssn=? where parent_email=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iss", $data['user_id'],$data['ssn'],$data['email']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image,ssn from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id = ?");
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