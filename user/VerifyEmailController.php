<?php
require_once 'VerifyEmailModel.php';
require_once '../configs/utility.php';
class VerifyEmailController
{
    
    
    public static function index()
    {
        
       
            $path         = "../../../";
            
            require_once('VerifyEmailView.php');
        
    }
    
	public static function VerifyEmailAccount($a = null, $b = null)
    {
        
        $model = new VerifyEmailModel();
        $data=array();
		if(isset($a))
		{
			$data['email']=cleanMe($a);
			$result              = $model->VerifyEmailAccount($data);
			$data['random_hash'] = $result['email_verification_code'];
			$path         = "../../../../";
           
		   if(isset($_SESSION['rememberme']))
			{
				setcookie('rememberme', $_SESSION['rememberme'], time()+ (30*60*60*24), '/');
			}
			
            require_once('VerifyEmailView.php');
		}
        
    }
    public static function verifyEmailSendEmail($a = null, $b = null)
    {
        
        $model = new VerifyEmailModel();
        $data=array();
		if(isset($a))
		{
			$data['email']=cleanMe($a);
			 $result              = $model->VerifyEmailAccount($data);
			 $data['random_hash'] = $result['email_verification_code'];
			 require_once('../configs/testMandril.php');
			   $result              = $model->verifyEmailSendEmail($data);
			    header("location:https://www.qloudid.com/user/index.php/VerifyEmail/verifyEmailAccount/".$data['email']);
		}
        
    }
	
	public static function verifyEmailDelete($a = null, $b = null)
    {
        
        $model = new VerifyEmailModel();
        $data=array();
		if(isset($a))
		{
			$data['email']=cleanMe($a);
			  
			   $result              = $model->verifyEmailDelete($data);
			    header("location:https://www.qloudid.com/user/index.php/Signup");
		}
        
    }
    
}

?>
