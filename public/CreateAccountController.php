<?php
require_once 'CreateAccountModel.php';
require_once '../configs/utility.php';
class CreateAccountController
{
    
    
    public static function index()
    {
		
		$path="../../";
		 $model = new CreateAccountModel();
		 $verifyLanguage=$model->verifyLanguage();
		$resultContry = $model->selectCountry();
        require_once('CreateAccountView.php');
		
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
        if (isset($_POST['email']) && isset($_POST['terms']))
            $data = array();
		
		 $path='../../';
        $data['email']       = cleanMe($_POST['email']);
		$data['cntry']       = cleanMe($_POST['cntry']);
       
        $data['terms']       = cleanMe($_POST['terms']);
        $data['random_hash'] = substr(md5(uniqid(rand(), true)), 16, 16);
        $result              = $model->createAccount($data);
        
        if ($result == 1) {
			require_once('../lib/url_shortener.php');
            require_once('../configs/testMandril.php');
            $resultCreate = $model->sendActivationEmail($data);
            header("location:../ConfirmEmail");
        } else if ($result == 0) {
            require_once('SignupErrorView.php');
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
		
		 public static function getDetail($c = null)
		{
			
			
            $model1       = new CreateAccountModel();
			if (isset($_POST)) {
				$resultWeb = $model1->getDetail();
			}
			
			echo $resultWeb;
			die;
		}
		  public static function resumeSignup()
			{
        
        $model = new CreateAccountModel();
		
		 
        if (isset($_POST['oemail']))
            $data = array();
		
		
        $data['email']       = cleanMe($_POST['oemail']);
		 
        $data['random_hash'] = substr(md5(uniqid(rand(), true)), 16, 16);
        
			require_once('../lib/url_shortener.php');
            require_once('../configs/testMandril.php');
            $resultCreate = $model->sendRestorationEmail($data);
            header("location:../ConfirmEmail");
        
			}
		 
}


?>