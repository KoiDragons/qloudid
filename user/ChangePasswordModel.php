<?php
require_once('../AppModel.php');
class ChangePasswordModel extends AppModel
{
	
     function userSummary($data)
    {
        $dbCon = AppModel::createConnection();
       
		
          $stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image from user_logins where id = ?");
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
	
    function changePassword($data)
    {
		
        $dbCon = AppModel::createConnection();
        //print_r($data); die;
        $stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where id = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
		//print_r($row); die;
       $np=md5($_POST['newpassword']);
        if($row['password']==md5($_POST['cpassword']))
		{
			$stmt = $dbCon->prepare("update user_logins set password=? where id = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("si", $np,$data['user_id']);
        $stmt->execute();
		}
        
        $stmt->close();
        $dbCon->close();
		return 1;
    }
	
	
	
	function checkPassword($data)
    {
		
        $dbCon = AppModel::createConnection();
        //print_r($data); die;
        $stmt = $dbCon->prepare("select password from user_logins where id = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
		//print_r($row); die;
       
        if($row['password']==$data['cpass'])
		{
		$stmt->close();
        $dbCon->close();
		return 1;
		}
        
        $stmt->close();
        $dbCon->close();
		return 0;
    }

	  
    function checkCredentials($data)
    {
		//$SECRET_KEY = 'qmatchup__login:system';
        $dbCon = AppModel::createConnection();
        //print_r($data); die;
        $stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where email = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $data['email']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
       
        $value  = array();
        if (empty($row)) {
            $value['result'] = 0;
            $value['id']     = 0;
            return $value;
        }
        if (trim($row['password']) == $data['password']) {
			 // $userid = $row['id'];
			  $value['result'] = 1;
			  return $value;
        }
        else
		{
			$value['result'] = 0;
            $value['id']     = 0;
            return $value;
		}
        $stmt->close();
        $dbCon->close();
    }

	
	
	}