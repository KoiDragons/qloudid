<?php
require_once('../AppModel.php');
class UserHealthInfoModel extends AppModel
{
  function userProfileSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select ssn,summary,phone_verified	from user_profiles where user_logins_id =?");
			
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

		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select country_name,first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image,grading_status,get_started_wizard_status from user_logins left join country on country.id=user_logins.country_of_residence where user_logins.id = ?");
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

		function userAllergyDetail($data)
		{
			$dbCon = AppModel::createConnection();
			ini_set('MAX_EXECUTION_TIME', -1);
			$user_id=$data['user_id'];
			
			$stmt = $dbCon->prepare("select * from user_allergy_detail where user_id=?");
			$stmt->bind_param("i",$user_id);
			
			/* bind parameters for markers */
			$cont=0;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$cont]['enc']=$this->encrypt_decrypt("encrypt",$row['id']);
				 $cont++;
			}
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function userAllergyCount($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$user_id=$data['user_id'];
			
			$stmt = $dbCon->prepare("select count(id) as num from user_allergy_detail where user_id=?");
			$stmt->bind_param("i",$user_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function userSicknessDetail($data)
		{
			$dbCon = AppModel::createConnection();
			ini_set('MAX_EXECUTION_TIME', -1);
			$user_id=$data['user_id'];
			
			$stmt = $dbCon->prepare("select * from user_sickness_info where user_id=?");
			$stmt->bind_param("i",$user_id);
			
			/* bind parameters for markers */
			$cont=0;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$cont]['enc']=$this->encrypt_decrypt("encrypt",$row['id']);
				 $cont++;
			}
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function userHealthDetail($data)
		{
			$dbCon = AppModel::createConnection();
			ini_set('MAX_EXECUTION_TIME', -1);
			$user_id=$data['user_id'];
			
			$stmt = $dbCon->prepare("select * from user_health_detail where user_id=?");
			$stmt->bind_param("i",$user_id);
			
			/* bind parameters for markers */
			$cont=0;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		function userSicknessCount($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$user_id=$data['user_id'];
			
			$stmt = $dbCon->prepare("select count(id) as num from user_sickness_info where user_id=?");
			$stmt->bind_param("i",$user_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function bloodType()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from blood_group");
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
	 function addSickness($data)
		{
		$dbCon = AppModel::createConnection();
		 
		$stmt = $dbCon->prepare("insert into user_sickness_info (user_id,sickness_detail,created_on) values(?, ?, now())");
		$stmt->bind_param("is", $data['user_id'],htmlentities($_POST['sickness'],ENT_NOQUOTES, 'ISO-8859-1'));
		$stmt->execute();
		$stmt = $dbCon->prepare("select count(id) as num from user_health_detail where user_id=?");
		$stmt->bind_param("i",$data['user_id']);
			
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		if($row['num']==0)
		{
			$s=1;
		$stmt = $dbCon->prepare("insert into user_health_detail (user_id,is_sick,created_on) values(?, ?, now())");
		$stmt->bind_param("ii", $data['user_id'],$s);
		$stmt->execute();	
		}
		else
		{
		$stmt = $dbCon->prepare("update user_health_detail set is_sick=1 where user_id=?");
		$stmt->bind_param("i", $data['user_id']);
		$stmt->execute();	
		}
		$stmt->close();
		$dbCon->close();
		return 1;
		}
		
		function addAllergy($data)
		{
		$dbCon = AppModel::createConnection();
		 
		$stmt = $dbCon->prepare("insert into user_allergy_detail (user_id,allergy_info,created_on) values(?, ?, now())");
		$stmt->bind_param("is",$data['user_id'], htmlentities($_POST['alergy'],ENT_NOQUOTES, 'ISO-8859-1'));
		$stmt->execute();
		$stmt = $dbCon->prepare("select count(id) as num from user_health_detail where user_id=?");
		$stmt->bind_param("i",$data['user_id']);
			
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		if($row['num']==0)
		{
			$s=1;
		$stmt = $dbCon->prepare("insert into user_health_detail (user_id,is_allergic,created_on) values(?, ?, now())");
		$stmt->bind_param("ii", $data['user_id'],$s);
		$stmt->execute();	
		}
		else
		{
		$stmt = $dbCon->prepare("update user_health_detail set is_allergic=1 where user_id=?");
		$stmt->bind_param("i", $data['user_id']);
		$stmt->execute();	
		}
		$stmt->close();
		$dbCon->close();
		return 1;
		}
		
		
		function addUpdateBloodInfo($data)
		{
		$dbCon = AppModel::createConnection();
		 
		 
		$stmt = $dbCon->prepare("select count(id) as num from user_health_detail where user_id=?");
		$stmt->bind_param("i",$data['user_id']);
			
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		if($row['num']==0)
		{
			 
		$stmt = $dbCon->prepare("insert into user_health_detail (user_id,blood_group,created_on) values(?, ?, now())");
		$stmt->bind_param("ii", $data['user_id'],$_POST['blood_type']);
		$stmt->execute();	
		}
		else
		{
		$stmt = $dbCon->prepare("update user_health_detail set blood_group=? where user_id=?");
		$stmt->bind_param("ii", $_POST['blood_type'],$data['user_id']);
		$stmt->execute();	
		}
		$stmt->close();
		$dbCon->close();
		return 1;
		}
     
	 
	  function deleteSicknessDetail($data)
		{
		$dbCon = AppModel::createConnection();
		 $id=$this->encrypt_decrypt('decrypt',$data['id']);
		$stmt = $dbCon->prepare("delete from user_sickness_info where id=?");
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$stmt = $dbCon->prepare("select count(id) as num from user_sickness_info where user_id=?");
		$stmt->bind_param("i",$data['user_id']);
			
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		if($row['num']==0)
		{
		$stmt = $dbCon->prepare("update user_health_detail set is_sick=0 where user_id=?");
		$stmt->bind_param("i", $data['user_id']);
		$stmt->execute();	
		}
		$stmt->close();
		$dbCon->close();
		return 1;
		}
		
		function deleteAllergyDetail($data)
		{
		$dbCon = AppModel::createConnection();
		 $id=$this->encrypt_decrypt('decrypt',$data['id']);
		$stmt = $dbCon->prepare("delete from user_allergy_detail where id=?");
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$stmt = $dbCon->prepare("select count(id) as num from user_allergy_detail where user_id=?");
		$stmt->bind_param("i",$data['user_id']);
			
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		if($row['num']==0)
		{
		$stmt = $dbCon->prepare("update user_health_detail set is_allergic=0 where user_id=?");
		$stmt->bind_param("i", $data['user_id']);
		$stmt->execute();	
		}
		$stmt->close();
		$dbCon->close();
		return 1;
		}
}