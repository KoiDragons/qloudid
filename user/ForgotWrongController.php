<?php
require_once 'ForgotWrongModel.php';
require_once '../configs/utility.php';
class ForgotWrongController
{
    
    
    public static function index()
    {
        $path = "../../";
        require_once('ForgotWrongView.php');
    }
    
    
    public static function forgotPasswordAccount($a = null, $b = null, $c = null)
    {
        
        $model = new ForgotWrongModel();
        
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
            $resultPass = $model->sendForgotWrongEmail($data);
            header("location:../ForgotInst/forgotPasswordAccount/".$data['email']."/".$data['rand_hash']);
        }
        
    }
    
}


?>