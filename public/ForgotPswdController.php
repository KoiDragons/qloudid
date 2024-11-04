<?php
require_once 'ForgotPswdModel.php';
require_once '../configs/utility.php';
class ForgotPswdController
{
    
    
    public static function index()
    {
        $path = "../../";
        require_once('ForgotPswdView.php');
    }
    
	 public static function checkmail($c = null)
		{
			
			
            $model1       = new ForgotPswdModel();
			if (isset($_POST)) {
				$resultWeb = $model1->checkmail();
			}
			
			echo $resultWeb;
			die;
		}
    
    public static function forgotPasswordAccount($a = null, $b = null, $c = null)
    {
        
        $model = new ForgotPswdModel();
        
            $data = array();
        $data['email']     = cleanMe($_POST['fpass']);
        $data['rand_hash'] = substr(md5(uniqid(rand(), true)), 16, 16);
       
        $result = $model->forgotPasswordAccount($data);
      
        if ($result == 0) {
            $warning = warning(0);
            $path    = "../../../";
           header("location:../ForgotWrong");
        }
        
        else {
            $warning = warning(1);
            $path    = "../../../";
			require_once('../lib/url_shortener.php');
            require_once('../configs/testMandril.php');
            $resultPass = $model->sendForgotPswdEmail($data);
            header("location:confirmEmail/".$data['email']."/".$data['rand_hash']);
        }
        
    }
	
	
	 public static function confirmEmail($a = null, $b = null)
    {
        
        $model = new ForgotPswdModel();
        
            $data = array();
        $data['email']     = cleanMe($a);
        $data['rand_hash'] = cleanMe($b);
       
      
            $path    = "../../../../../";
            require_once('ForgotInstView.php');
       
        
    }
	
	
	 public static function forgotInstAccount($a = null, $b = null)
    {
        
        $model = new ForgotPswdModel();
        
            $data = array();
        $data['email']     = cleanMe($a);
        $data['rand_hash'] = cleanMe($b);
       
           require_once('../lib/url_shortener.php');
            require_once('../configs/testMandril.php');
			 $resultPass = $model->forgotPasswordAccount($data);
            $resultPass = $model->sendForgotPswdEmail($data);
            header("location:../../confirmEmail/".$data['email']."/".$data['rand_hash']);
        
        
    }
    
}


?>