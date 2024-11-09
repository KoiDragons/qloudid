<?php
require_once 'RecoverPasswordModel.php';
require_once '../configs/utility.php';
class RecoverPasswordController
{
    
    
    public static function index()
    {
        $path = "../../";
        require_once('RecoverPasswordView.php');
    }
    
    
    public static function recoverPasswordAccount($a = null, $b = null, $c = null)
    {
        
        $model = new RecoverPasswordModel();
        
        if (isset($_POST['pass']) && isset($_POST['repass'])) {
            $data           = array();
            $data['pass']   = cleanMe($_POST['pass']);
            $data['repass'] = cleanMe($_POST['repass']);
            $data['email']  = cleanMe($a);
            
            $data['rand_hash'] = cleanMe($b);
           
            $result = $model->recoverPasswordAccount($data);
          
            if ($result == 0) {
                require_once('RecoverPasswordView.php');
            }
            
            else {
              
                $path = "../../../../../../";
                require_once('../configs/testMandril.php');
                $resultPass = $model->sendRecoverPasswordEmail($data);
                header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
            }
            
        } else {
            $path = "../../../../../";
            require_once('RecoverPasswordView.php');
        }
    }
	
	
	public static function resetPassword($a = null, $b = null)
    {
        
			$model = new RecoverPasswordModel();
			$data           = array();
            $data['email']  = cleanMe($a);
            $data['rand_hash'] = cleanMe($b);
            $result = $model->checkUserInfo($data);
           $path='../../../../../';
            if ($result == 'bFhCcE1Cc0tqRnhiL0VLdHNzU2VSQT09') {
                require_once('ActivationErrorView.php');
            }
            else {
           header('location:../../../StoreData/checkVerifyIdentificator/'.$result);
        }
    }
}

?>