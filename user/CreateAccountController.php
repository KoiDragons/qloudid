<?php
require_once 'CreateAccountModel.php';
require_once '../configs/utility.php';
class CreateAccountController
{
    
    
    public static function index()
    {
		 $valueNew = checkLogin();
        if ($valueNew == 0) {
		$path="../../";
		 $model = new CreateAccountModel();
		 $verifyLanguage=$model->verifyLanguage();
		$resultContry = $model->selectCountry();
        require_once('CreateAccountView.php');
		}
		else
			{
            header("location:NewPersonal/userAccount");
			//setcookie('rememberme', $result['cookie'],$expire,'/'); //exit(0);
			}
    }
    
    	public static function changeLanguage()
		{
				$model = new CreateAccountModel();
				$changeLanguage = $model->changeLanguage();	
				echo $changeLanguage; die;	
		}
    public static function createAccount($a = null, $b = null, $c = null)
    {
        
        $model = new CreateAccountModel();
        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['terms']))
            $data = array();
		
		
        $data['email']       = cleanMe($_POST['email']);
		$data['cntry']       = cleanMe($_POST['cntry']);
        $data['password']    = md5($_POST['password']);
        $data['terms']       = cleanMe($_POST['terms']);
        $data['random_hash'] = substr(md5(uniqid(rand(), true)), 16, 16);
        $result              = $model->createAccount($data);
        $path='../../';
        if ($result == 1) {
			require_once('../lib/url_shortener.php');
            require_once('../configs/testMandril.php');
            $resultCreate = $model->sendActivationEmail($data);
            header("location:../ConfirmEmail");
        } else if ($result == 0) {
            require_once('SignupErrorView.php');
        }
        else if ($result == 2) {
           header("location:../LoginAccount");
        }
    }
    public static function checkmail($c = null)
		{
			
			
            $model1       = new CreateAccountModel();
			if (isset($_POST)) {
				$resultWeb = $model1->checkmail();
			}
			
			echo $resultWeb;
			die;
		}
		
		 
}


?>