<?php
require_once('../AppModel.php');
class GetStartedModel extends AppModel
{
    
    
    function GetStartedAccount($data)
    {
        $dbCon = AppModel::createConnection();
        $a=array();
       $a=explode('-',$data['dt']);
	  $st=1;
            $stmt   = $dbCon->prepare("UPDATE user_logins SET get_started_wizard_status=?,`first_name`=?,`last_name`=?,sex=?,dob_month=?,dob_day=?,dob_year=?  WHERE id=?");
            $status = 1;
            /* bind parameters for markers */
            $stmt->bind_param("issiiiii", $st,$data['fname'], $data['lname'],$data['sex'],$a[1],$a[2],$a[0],$data['user_id']);
            
            $stmt->execute();
            
          
            if (!$stmt->execute()) {
				  $stmt->close();
        $dbCon->close();
		
                return 0;
            } else {
				  $stmt->close();
        $dbCon->close();
		
                return 1;
            }
       
        
        
    }
    
    
     function GetStartedUser($data)
    {
        $dbCon = AppModel::createConnection();
        
            $stmt   = $dbCon->prepare("select `first_name`,`last_name`,sex,dob_month,dob_day,dob_year from user_logins  WHERE id=?");
            $status = 1;
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