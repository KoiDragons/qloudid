<?php
 
require_once '../configs/utility.php';
require_once 'CreateAccountController.php';
class ProfileLogoutController
{
	 public static function index()
    {
session_start();
require_once '../configs/testMandril.php';
if(isset($_GET['action']) or isset($_COOKIE['email']) or isset($_SESSION['user_id']))
{	
		setcookie("email", "", time()-3600);
		if (isset($_SERVER['HTTP_COOKIE'])) 
		{
		$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
			foreach($cookies as $cookie) 
			{
			$parts = explode('=', $cookie);
			$name = trim($parts[0]);
			setcookie($name, '', time()-1000);
			setcookie($name, '', time()-1000, '/');
			setcookie($name, '', time()-1000, '/','.qmatchup.com');						
			}
		}
		unset($_SESSION['rememberme_qid']);
		
		setcookie('rememberme_qid', '', time() - (3600*24), '/', "qmatchup.com");
		setcookie('rememberme_qid', '', time() - (3600*24), '', "qmatchup.com");
		session_unset();
		session_destroy();
		$viewPath="user/index.php/";
      
		
}
 header('location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin');
}

	public static function changeLanguage()
		{
				$model = new CreateAccountModel();
				$changeLanguage = $model->changeLanguage();	
				echo $changeLanguage; die;	
		}
}
?>