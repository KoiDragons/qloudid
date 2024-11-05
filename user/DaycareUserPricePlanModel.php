<?php
	require_once('../AppModel.php');
	class DaycareUserPricePlanModel extends AppModel
	{
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
		 
		 	function daycareTimelapsed($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$dependent_id= $this -> encrypt_decrypt('decrypt',$data['did']);
		
			$stmt = $dbCon->prepare("select min(modified_on) as mdate from parent_info where child_id in (select id from child_care_info where dependent_id=?) and is_approved=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $dependent_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return (int)(abs(strtotime(date('Y-m-d')) - strtotime($row['mdate'])) / 86400);
			
			}
			
			
		 
			
			function planDetails($data)
		{
			$dbCon = AppModel::createConnection();
			$dependent_id= $this -> encrypt_decrypt('decrypt',$data['did']);
		
			$stmt = $dbCon->prepare("select id,plan_type from safeqid_user_plan_detail where dependent_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $dependent_id);
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
			return $row['plan_type'];
			
			}
			
			
	 
		function lockFreePlan($data)
		{
			$dbCon = AppModel::createConnection();
			$dependent_id= $this -> encrypt_decrypt('decrypt',$data['did']);
			$plan=1;
			 
			$stmt = $dbCon->prepare("insert into safeqid_user_plan_detail(dependent_id,plan_type,created_on)
			values(?,?,now())");
			$stmt->bind_param("ii",$dependent_id,$plan);
			 
			if($stmt->execute())
			{
				$id=$stmt->insert_id;
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
