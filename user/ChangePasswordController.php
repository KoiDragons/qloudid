<?php
require_once 'ChangePasswordModel.php';
require_once '../configs/utility.php';
class ChangePasswordController
{
    
    
    public static function index()
    {
        $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
			
			header("location: LoginAccount");
        } else {
			$path         = "../../";
			 $data = array();
			$data['user_id']=$_SESSION['user_id'];
			$model = new ChangePasswordModel();
			$row_summary    = $model->userSummary($data);
			  require_once('ChangePasswordView.php');
            
        }
    }
    

    
    public static function changePassword($a = null, $b = null, $c = null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
			
			header("location: LoginAccount");
        } else {
        $data = array();
		$data['user_id']=$_SESSION['user_id'];
        $model = new ChangePasswordModel();
		$ChangePassword    = $model->changePassword($data);
		header("location:../NewPersonal/userAccount");
        }
    }
	
	public static function checkPassword($a = null, $b = null, $c = null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
			
			header("location: LoginAccount");
        } else {
        $data = array();
		$data['user_id']=$_SESSION['user_id'];
		$data['cpass']=md5(cleanMe($a));
        $model = new ChangePasswordModel();
		$checkPassword    = $model->checkPassword($data);
		echo $checkPassword; die;
        }
    }
    
}


?>