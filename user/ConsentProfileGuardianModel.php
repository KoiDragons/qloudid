<?php
require_once('../AppModel.php');
class ConsentProfileGuardianModel extends AppModel
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
	
	 function dependentDetail($data)
    {
        $dbCon = AppModel::createConnection();
        $dependent_id= $this -> encrypt_decrypt('decrypt',$data['did']);
		
		$stmt = $dbCon->prepare("select dependent_id,concat_ws(' ',first_name,last_name) as name,ssn,dependent_guardian.created_on,dependent_guardian.is_approved,image_path from dependent_guardian left join dependents on dependents.id=dependent_guardian.dependent_id  where dependent_guardian.id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $dependent_id);
        $stmt->execute();
        $result = $stmt->get_result();
       
        $row = $result->fetch_assoc();
		 
        
        $stmt->close();
        $dbCon->close();
        return $row;
    }
    
}