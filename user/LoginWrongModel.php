<?php
require_once('../AppModel.php');
class LoginWrongModel extends AppModel
{
    
    function loginWrong($data)
    {
       $SECRET_KEY = 'qmatchup__login:system';
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where email = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $data['email']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
       
        $value  = array();
        if (empty($row)) {
            $value['result'] = 1;
            $value['id']     = 0;
            return $value;
        }
        if (trim($row['password']) == $data['password']) {
			  $userid = $row['id'];
			  $token = md5(uniqid(rand(), true)); // generate a token, should be 128 - 256 bit
			  //storeTokenForUser($user, $token);
			  $cookie = $this -> encrypt_decrypt('encrypt',$userid) . ':' . $token;
			  $mac = hash_hmac('sha256', $cookie, $SECRET_KEY);
			  $cookie .= ':' . $mac; //echo $cookie; die;
			  //$value['cookie']=$cookie;
	//setcookie('rememberme', $cookie, '/');
	session_start();
			$_SESSION['rememberme_qid'] = $cookie;
           // print_r($_COOKIE); die;
            $expire = time() + 60 * 60;
            if (isset($_POST['staylogin'])) {
                setcookie("email", $userid, $expire);
            }
            if ($row['verification_status'] == 1) {
                if ($row['get_started_wizard_status'] == 0) {
                    $_SESSION['user_id'] = $row['id'];
                    
                    $date = date('Y-m-d H:i:s');
                    $stmt = $dbCon->prepare("UPDATE user_logins SET `last_login`=? , login_hash=?  WHERE `id`=?");
                    /* bind parameters for markers */
                    $stmt->bind_param("ssi", $date,  $mac,$_SESSION['user_id']);
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
                   // echo  $mac; die;
                   $stmt = $dbCon->prepare("UPDATE user_logins SET `last_login`=? , login_hash=?  WHERE `id`=?");
                    /* bind parameters for markers */
                    $stmt->bind_param("ssi", $date,  $mac,$_SESSION['user_id']);
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