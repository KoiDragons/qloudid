<?php
require_once 'encrypt_decrypt.php';
require_once 'database.php';
function cleanMe($input, $removeHTML = 1)
{
    $input = htmlspecialchars($input, ENT_IGNORE, 'utf-8');
    if ($removeHTML == 1) {
        $input = strip_tags($input);
    }
    
    $input = stripslashes($input);
    return $input;
}

function start_session($id)
{
	
    $_SESSION['user_id'] = $id;
    
}

function checkadmin()
    {	
        if(!session_name() == '')
		{
		session_name("admin");
		session_set_cookie_params(60*60*24*7);
        session_start();
		if(!isset($_SESSION['qadmin_id']))
            {
				return false;
            }
            else
            {		
				//print_r($_SESSION);die;
                return true;
            }
            return false;
        }
       /* else
        {
            if(!isset($_SESSION['user_id']))
            {
				return false;
            }
            else
            {
              return  true;
            }
        }
		$time = 3600 * 24 * 7;
	session_set_cookie_params($time);
    session_start();
     if(isset($_SESSION["qmatchup_admin_id"]) &&  $_SESSION["qmatchup_admin_id"] > 0) 
		 return true;
	 return false;*/
		
    }


function checkLogin()
{
	$SECRET_KEY='qmatchup__login:system';
	$cookie = isset($_COOKIE['rememberme']) ? $_COOKIE['rememberme'] : '';
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
			 setcookie('rememberme', $cookie, time()+ (30*60*60*24), '/', "qmatchup.com");
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
       
    } else {
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
			 setcookie('rememberme', $cookie, time()+ (30*60*60*24), '/', "qmatchup.com");
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


function checkPickaproLogin()
{
	$SECRET_KEY='qmatchup__login:system';
	$cookie = isset($_COOKIE['rememberpickapro']) ? $_COOKIE['rememberpickapro'] : '';
  // print_r($_COOKIE); die;
    if (session_id() == '') {
        session_start();
        if (!isset($_SESSION['pikapro_user_id'])) {
			
	
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
			 setcookie('rememberpickapro', $cookie, time()+ (30*60*60*24), '/', "qmatchup.com");
			 $_SESSION['pikapro_user_id']=$id;
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
       
    } else {
        if (!isset($_SESSION['pikapro_user_id'])) {
			
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
             
			 $_SESSION['pikapro_user_id']=$id;
			 setcookie('rememberpickapro', $cookie, time()+ (30*60*60*24), '/', "qmatchup.com");
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



function warning($due)
{
    if ($due == 0) {
        $warning = "you are not register with us";
        return $warning;
    } else if ($due == 1) {
        $warning = "Please check you Email";
        return $warning;
    }
    
    else if ($due == 2) {
        $warning = "Please verify your email address.";
        return $warning;
    } else if ($due == 3) {
        $warning = "Given Password is wrong.";
        return $warning;
    } else if ($due == 4) {
        $warning = "You are allready registered please login here.";
        return $warning;
    }
}

$viewData = array();

?>