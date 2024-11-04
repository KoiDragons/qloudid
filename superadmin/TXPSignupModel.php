<?php

require_once('../AppModel.php');
	
	class TXPSignupModel extends AppModel
	{
	
		 
		function adminSummary()
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,last_name from admin_logins where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $_SESSION['qadmin_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		
		 
		function TXPSignupDetail()
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			
				$stmt = $dbCon->prepare("select companies.id,company_name,company_email,companies.created_date,company_profiles.phone from companies left join company_profiles on companies.id=company_profiles.company_id where is_landloard_signup=1 order by created_date desc");
				
				$stmt->execute();
				$result1 = $stmt->get_result();
				$j=0;
				while($row = $result1->fetch_assoc())
				{
			
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
				}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		 
			
	}
