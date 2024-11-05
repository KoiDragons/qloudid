<?php
require_once 'GetStartedModel.php';
require_once '../configs/utility.php';
class GetStartedController
{
    
    
    public static function index()
    {
        //$valueNew = checkLogin();
		if(isset($_SESSION['rememberme']))
		{
			setcookie('rememberme', $_SESSION['rememberme'], time()+ (30*60*60*24), '/');
		}
        else if (checkLogin() == 0) {
           
            header("location:LoginAccount");
        } else {
			$path="../../";
			 $model = new GetStartedModel();
			 $data = array();
			$data['user_id']=$_SESSION['user_id'];
			 $result = $model->GetStartedUser($data);
			require_once('GetStartedView.php');
		}
		
    }
    
    
    public static function GetStartedAccount($a = null, $b = null, $c = null)
    {
        $valueNew = checkLogin();
        if ($valueNew == 0) {
           
            header("location:../LoginAccount");
        } else {
        $model = new GetStartedModel();
        
            $data = array();
			$data['user_id']=$_SESSION['user_id'];
        $data['fname']     = cleanMe($_POST['fname']);
		 $data['lname']     = cleanMe($_POST['lname']);
		  $data['dt']     = cleanMe($_POST['dt']);
		   $data['sex']     = cleanMe($_POST['sx']);
        
            $resultPass = $model->GetStartedAccount($data);
            header("location:../Location");
        }
        
	}
    
}


?>