<?php
	require_once('../AppModel.php');
	class UserTimeSheetInfoModel extends AppModel
	{
		function addTaskInformation($data)
		{ 
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("insert into user_timesheet_info ( `project_type`  , `project_subcategory`  , `app_id` , `project_title`  , `project_description`  , `task_date` , `total_time` , `task_link`  , `user_id` , `created_on`) values (?,?,?,?,?,?,?,?,?,now())");
			$stmt->bind_param("iiisssisi", $_POST['project_type'],$_POST['project_subcategory_type'],$_POST['app_id'],$_POST['project_title'],$_POST['project_description'],$_POST['project_task_date'],$_POST['project_time_spent'],$_POST['project_link'],$data['user_id']);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function getAvailableApps($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 if($_POST['project_type']==1)
			  {
				  $app_type=2;
			  }
			  else
			  {
				$app_type=1;  
			  }  
			  
			$stmt = $dbCon->prepare("select * from apps_detail where id in (select app_id from manage_apps_permission where country_id=(select country_of_residence from user_logins where id=?) and is_permission=1) and is_business=?");
			$stmt->bind_param("ii", $data['user_id'],$app_type);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0" >Select</option>';
			while($row = $result->fetch_assoc())
			{
				 
			$org=$org.'<option value="'.$row['id'].'" >'.$row['app_name'].'</option>';
			}
			  
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		function listTimesheet($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from user_timesheet_info where user_id=? order by task_date desc");
			$stmt->bind_param("i", $data['user_id']);
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
	}		