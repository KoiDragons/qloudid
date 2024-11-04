<?php
	require_once('../AppModel.php');
	class EmployeeCheckModel extends AppModel
	{
		
		function checkUser($data)
		{
			$dbCon = AppModel::createConnection();
			 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id from employees where company_id=? and user_login_id=?");
			/* bind parameters for markers */
			 $stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if(empty($row))
			{
			if($data['user_id']==43)
			{
			$stmt->close();
			$dbCon->close();
			return 0;
			}
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
			function checkLandloard($data)
		{
			$dbCon = AppModel::createConnection();
			 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id from user_tenants where company_id=? and user_login_id=? and is_approved=1");
			/* bind parameters for markers */
			 $stmt->bind_param("ii", $company_id,$data['user_id']);
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
			
			
	}							