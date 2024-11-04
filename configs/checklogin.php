<?php
require_once 'encrypt_decrypt.php';
require_once 'database.php';
//session_start();
   function checkLogin()
{
	
	$SECRET_KEY='qloud_login:system';
	 
	$cookie = isset($_COOKIE['rememberme_qid']) ? $_COOKIE['rememberme_qid'] : '';
  // print_r($_COOKIE); die;
    if (session_id() == '') {
        session_start();
        if (!isset($_SESSION['user_id'])) {
			
	
    if ($cookie) {
		//echo $cookie; die;
        list ($user, $token, $mac) = explode(':', $cookie);
		//echo $mac." ".hash_hmac('sha256', $user . ':' . $token, $SECRET_KEY); 
        if (hash_hmac('sha256', $user . ':' . $token, $SECRET_KEY) != $mac) {
            return 0;
        }
		$id=encrypt_decrypt('decrypt',$user);
		$dbCon= connect_database("");
		$query="select login_hash from user_logins where id=".$id;
		$row=mysqli_fetch_array(mysqli_query($dbCon,$query));
        $usertoken = $row['login_hash'];
//echo $usertoken." ".$token; die;
        if ($usertoken == $mac) {
             //session_start();
			 setcookie('rememberme_qid', $cookie, time()+ (30*60*60*24), '/', "qloudid.com");
			 $_SESSION['user_id']=$id;
			 return 1;
        }
		else
			return 0;
    }
	else{
			
            return 0;
	}
        } else {
            return 1;
        }
       
    }
	else {
        if (!isset($_SESSION['user_id'])) {
			
            if ($cookie) {
			//	echo $cookie; die;
        list ($user, $token, $mac) = explode(':', $cookie);  
         if (hash_hmac('sha256', $user . ':' . $token, $SECRET_KEY) != $mac) {
            return 0;
        }
		$id=encrypt_decrypt('decrypt',$user);
		$dbCon= connect_database("");
		$query="select login_hash from user_logins where id=".$id;
		$row=mysqli_fetch_array(mysqli_query($dbCon,$query));
        $usertoken = $row['login_hash'];
		
        if ($usertoken == $mac) {
             
			 $_SESSION['user_id']=$id;
			 setcookie('rememberme_qid', $cookie, time()+ (30*60*60*24), '/', "qloudid.com");
			 return 1;
        }
		return 0;
    }
	else{
			
            return 0;
	}
        } else {
            return 1;
        }
    }
}
	function checkadmin()
    {	
        if(!session_name() == '')
		{
		session_name("admin");
		session_set_cookie_params(60*60*24*7);
        session_start();
		if(!isset($_SESSION['admin_id']))
            {
				return false;
            }
            else
            {	//print_r($_SESSION);			die;
                return true;
            }
            return false;
        }
        /*else
        {
            if(!isset($_SESSION['user_id']))
            {
				return false;
            }
            else
            {
              return  true;
            }
        }*/
		
	/*	$time = 3600 * 24 * 7;
	session_set_cookie_params($time, '/');
    
	print_r($_SESSION); die;
     if(isset($_SESSION["qmatchup_admin_id"]) &&  $_SESSION["qmatchup_admin_id"] > 0) 
		 return true;
	 return false;*/
    }
?>