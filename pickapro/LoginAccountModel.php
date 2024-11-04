<?php
require_once('../AppModel.php');
class LoginAccountModel extends AppModel
{
	function loginAppAccount()
    {
		$SECRET_KEY = 'qloud_login:system';
        $dbCon = AppModel::createConnection();
		 $ip=$this->encrypt_decrypt('decrypt',$_POST['ip']);
		
        $stmt = $dbCon->prepare("select login_status,user_id from user_certificates where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
		
		if($row['login_status']!=2)
		{
		$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0,time_out=1 where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
				
		$stmt->close();
        $dbCon->close();
		return 0;		
		}
		else
		{
			
		 
		$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0 where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
		
		 $stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where id = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $row['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowUser    = $result->fetch_assoc();
		$userid = $rowUser['id'];
		$token = md5(uniqid(rand(), true));  
			  $cookie = $this -> encrypt_decrypt('encrypt',$userid) . ':' . $token;
			  $mac = hash_hmac('sha256', $cookie, $SECRET_KEY);
			  $cookie .= ':' . $mac;  
			  session_start();
			  $_SESSION['rememberme_pickapro'] = $cookie;
         
            $expire = time() + 60 * 60;
			$_SESSION['pikapro_user_id'] = $rowUser['id'];
                    
            $date = date('Y-m-d H:i:s');
            $stmt = $dbCon->prepare("UPDATE user_logins SET `last_login`=? , login_hash=?  WHERE `id`=?");
                    /* bind parameters for markers */
            $stmt->bind_param("ssi", $date,  $mac,$_SESSION['pikapro_user_id']);
            $stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
		return 1;
		}
		 }

	 function verifyIP()
		{
			$dbCon = AppModel::createConnection();
			
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			 $stmt = $dbCon->prepare("select login_status from user_certificates where login_started_for=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$row= $result->fetch_assoc();
			
			if($row['login_status']!=2)
			{
				$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0 where login_started_for=?");
				/* bind parameters for markers */
				$stmt->bind_param("s", $ip);
				$stmt->execute();	
			}
			 
				 $t=microtime();
				 
				$dbCon->close();
				return $this->encrypt_decrypt('encrypt',$ip);
			 
		}
		
		 
	
	}