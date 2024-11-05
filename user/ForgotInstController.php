<?php
require_once 'ForgotInstModel.php';
require_once '../configs/utility.php';
class ForgotInstController
{
    
    
    public static function index()
    {
        $path = "../../";
        require_once('ForgotInstView.php');
    }
    
    
    public static function forgotPasswordAccount($a = null, $b = null, $c = null)
    {
        
        $model = new ForgotInstModel();
        
            $data = array();
        $data['email']     = cleanMe($a);
        $data['rand_hash'] = cleanMe($b);
       
      
            $path    = "../../../../../";
            require_once('ForgotInstView.php');
       
        
    }
	
	
	  public static function forgotInstAccount($a = null, $b = null, $c = null)
    {
        
        $model = new ForgotInstModel();
        
            $data = array();
        $data['email']     = cleanMe($a);
        $data['rand_hash'] = cleanMe($b);
       
           
            require_once('../configs/testMandril.php');
			 $resultPass = $model->forgotPasswordAccount($data);
            $resultPass = $model->sendForgotInstEmail($data);
            header("location:../../../ForgotInst/forgotPasswordAccount/".$data['email']."/".$data['rand_hash']);
        
        
    }
    
}


?>