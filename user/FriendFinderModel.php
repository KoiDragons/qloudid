<?php
	require_once('../AppModel.php');
	class FriendFinderModel extends AppModel
	{
			function appdownloadStatus($data)
		{
			$dbCon = AppModel::createConnection();
			$app_id= 45;
			$stmt = $dbCon->prepare("select * from user_app_download where permission_id=(select id from manage_apps_permission where country_id=(select country_of_residence from user_logins where id=?) and app_id=?) and user_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iii", $data['user_id'],$app_id,$data['user_id']);
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
			return 1;
			
			}
			function appId()
			{
				
				return $this -> encrypt_decrypt('encrypt',45);
			}
			function userSummary($data)
			{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select country_of_residence,last_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image,get_started_wizard_status,sex,dob_day,dob_month,dob_year from user_logins where id = ?");
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
		
		function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_of_residence from user_logins where id=?)  and app_id=45");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $this -> encrypt_decrypt('encrypt',$row['id']);;
		}
		
		
		function friendFinderUserStart($data)
		{
		$dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select * from friend_finder_user where user_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into friend_finder_user(user_id,created_on) values( ?, now())");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();	
			$stmt = $dbCon->prepare("select * from friend_finder_user where user_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			}
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		function friendFinderUserPreference($data)
		{
		$dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select * from friend_finder_user_preference where user_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into friend_finder_user_preference(user_id,created_on,modified_on) values( ?, now(), now())");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();	
			$stmt = $dbCon->prepare("select * from friend_finder_user_preference where user_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			}
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		function userPassion($data)
		{
			$dbCon = AppModel::createConnection();
			$user_passion=explode(',',$data['user_passion']);
			$stmt = $dbCon->prepare("select * from user_passion");
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
			
				if (in_array($row['id'], $user_passion))
				{
				$org[$j]['is_selected']= 1;
				}
				else
				{
				$org[$j]['is_selected']= 0;	
				}
				$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
			function sexualOrientation($data)
		{
			$dbCon = AppModel::createConnection();
			$sexual_orientation=explode(',',$data['sexual_orientation']);
			$stmt = $dbCon->prepare("select * from sexual_orientation");
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
			
				if (in_array($row['id'], $sexual_orientation))
				{
				$org[$j]['is_selected']= 1;
				}
				else
				{
				$org[$j]['is_selected']= 0;	
				}
				$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function updateInfo($data)
		{
		$dbCon = AppModel::createConnection();
		 
			if($_POST['children']==1)
			{
				$children_gender=implode(",",$_POST['child_gender']);
				$children_age=implode(",",$_POST['child_age']);
			}
			else
			{
				$children_gender='';
				$children_age='';
			}
			$stmt = $dbCon->prepare("update friend_finder_user set gender=?, user_height=?, user_weight=?, user_body_tattoo=?, smoking=?, drinking=?, tobbacoo=?, civil_status=? , children=?, children_gender=?, children_age=?, user_description=?, user_passion=?, address=?, sexual_orientation=?, distance=?, date_of_birth=?,is_completed=1 where user_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iiiiiiiiissssssisi",$_POST['user_gender'], $_POST['height'], $_POST['weight'], $_POST['user_body_tattoo'], $_POST['smoking'], $_POST['drinking'], $_POST['tobbacoo'], $_POST['c_status'], $_POST['children'], $children_gender, $children_age, $_POST['user_description'], $_POST['user_passion'], $_POST['address'], $_POST['s_orientation'], $_POST['distance'], $_POST['dob'], $data['user_id']);
			$stmt->execute();
 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updatePreferenceInfo($data)
		{
		$dbCon = AppModel::createConnection();
		 
			if($_POST['height_important']==1)
			{
				$height_pre=$_POST['height'];
				 
			}
			else
			{
				$height_pre=0;
			}
			if($_POST['weight_important']==1)
			{
				$weight_pre=$_POST['weight'];
				 
			}
			else
			{
				$weight_pre=0;
			}
			$stmt = $dbCon->prepare("update friend_finder_user_preference set height_important=?,height_preferred=?,weight_important=?,weight_preferred=?, max_distance=?, user_passion_preferred=?, min_age=?, max_age=?, sex_orientation=?, modified_on=now() where user_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iiiiisiiii", $_POST['height_important'],$height_pre,$_POST['weight_important'],$weight_pre,$_POST['oil_numbers'],$_POST['user_passion'],$_POST['min_age'],$_POST['max_age'],$_POST['gender'], $data['user_id']);
			$stmt->execute();
 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
	}		