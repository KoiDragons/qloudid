<?php
	require_once('../AppModel.php');
	class PublicLostandFoundModel extends AppModel
	{
			function sendInformation()
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("insert into found_and_lost(item_number,country_phone,phone_number,description,created_on)
			values(?,?,?,?,now())");
			$stmt->bind_param("isii",$_POST['item_name'],$_POST['country_phone'],$_POST['phone'],$_POST['description']);
			if($stmt->execute())
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