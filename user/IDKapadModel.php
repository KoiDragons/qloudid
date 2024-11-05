<?php
require_once('../AppModel.php');
class IDKapadModel extends AppModel
{
	function saveInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$hijack=substr($_POST['selected_child'],0,-1);
			
			$stmt = $dbCon->prepare("insert into user_hijacked(hijack_id,user_id,created_on)
			values(?,?,now())");
			$stmt->bind_param("si",$hijack,$data['user_id']);
			$stmt->execute();
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function secureAccount($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("update user_hijacked set  is_hijacked=1,modified_on=now() where user_id=? and is_hijacked=0");
			$stmt->bind_param("i",$data['user_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
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
	
	
	 function hijackedDetail()
    {
        $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select * from hijacked_by");
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
	
	
	 function hijackedUserDetail($data)
    {
        $dbCon = AppModel::createConnection();
		 
		$stmt = $dbCon->prepare("select * from user_hijacked where user_id=?");
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
	
	
	 function hijackedUser($data)
    {
        $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select count(id) as num from user_hijacked where user_id=? and is_hijacked=0");
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
        
        $stmt = $dbCon->prepare("select id,first_name,last_name,sex,dob_day,dob_month,dob_year,created_on  from user_logins where id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
         $row = $result->fetch_assoc();
        
        $stmt->close();
        $dbCon->close();
        return $row;
        
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
        $stmt = $dbCon->prepare("select ssn,address from user_profiles  where user_logins_id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
       
        $row = $result->fetch_assoc();
        
        $stmt->close();
        $dbCon->close();
        return $row;
    }
    
	
    
}