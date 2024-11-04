<?php
require_once('../AppModel.php');
class LoginAdminModel extends AppModel
{
    
    function LoginAdmin()
    {
		session_set_cookie_params(60*60*24*7);
		session_name("admin");
		session_start();
        $dbCon = AppModel::createConnection();
       // echo "hi"; die;
		 if(isset($_POST['login']))
    {
        
       $email = $_POST['username'];
       $password = md5($_POST['password']);
       $expire=time()+60*60; 
	   
	    $stmt = $dbCon->prepare("select id,email,password,permissions from admin_logins where email = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
        
       
        
        
        if(empty($row))
        {
			//echo "new"; die;
            return 0;
        }
        else
        {
         
            if(trim($row['password']) == $password)
            {
			
				$_SESSION['qadmin_id'] = $row['id'];
				$_SESSION['permissions'] = $row['permissions'];
                $date = date('Y-m-d H:i:s');
				
				$stmt = $dbCon->prepare("update admin_logins set last_login =? where id= ?");
        //echo "jain"; die;
        /* bind parameters for markers */
        $stmt->bind_param("si", $date,$row['id']);
        $stmt->execute();
				//print_r($_SESSION); die;
				return 1;
            }
            else
            {
				//echo "hello"; die;
               return 0;
            }
            
            
        }
		
        
    }  
	
        $value  = array();
        if (empty($row)) {
            $value['result'] = 1;
            $value['id']     = 0;
            return $value;
        }
        if (trim($row['password']) == $data['password']) {
          
            $userid = $row['id'];
            $expire = time() + 60 * 60;
            if (isset($_POST['staylogin'])) {
                setcookie("email", $userid, $expire);
            }
            if ($row['verification_status'] == 1) {
                if ($row['get_started_wizard_status'] == 0) {
                    $_SESSION['user_id'] = $row['id'];
                    
                    $date = date('Y-m-d H:i:s');
                    $stmt = $dbCon->prepare("UPDATE user_logins SET `last_login`=?  WHERE `id`=?");
                    /* bind parameters for markers */
                    $stmt->bind_param("si", $date, $_SESSION['user_id']);
                    $stmt->execute();
                    if (!$stmt->execute()) {
                        $value['result'] = 0;
                        $value['id']     = 0;
                        return $value;
                    } else {
                        $value['result'] = 2;
                        $value['id']     = $row['id'];
                        return $value;
                    }
                } else {
                    $_SESSION['user_id'] = $row['id'];
                    
                    $date = date('Y-m-d H:i:s');
                    
                    $stmt = $dbCon->prepare("UPDATE user_logins SET `last_login`=?  WHERE `id`=?");
                    /* bind parameters for markers */
                    $stmt->bind_param("si", $date, $_SESSION['user_id']);
                    $stmt->execute();
                    if (!$stmt->execute()) {
                        $value['result'] = 0;
                        $value['id']     = 0;
                        return $value;
                    } else {
                        $value['result'] = 3;
                        $value['id']     = $row['id'];
                        return $value;
                    }
                }
            } else {
                $value['result'] = 4;
                $value['id']     = 0;
                return $value;
            }
        } else {
            $value['result'] = 5;
            $value['id']     = 0;
            return $value;
        }
        
        $stmt->close();
        $dbCon->close();
    }
}