<?php
require_once 'UserHijackStatusCheckModel.php';
require_once 'EmployeeCheckController.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class UserHijackStatusCheckController
{
    
    
    public static function index()
    {
		
	}
	
		 public static function employeeAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
			   header("location:https://www.qloudid.com/user/index.php/LoginAccount");
			} else {
				$path = "../../../../";
			$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
					$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
					header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new UserHijackStatusCheckModel();
				$row_summary    = $model1->userSummary($data);
				$countryInfo    = $model1->countryOption($data);
				require_once('UserHijackStatusCheckView.php');
		}
		}
	
	 public static function getUserInfo($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.qloudid.com/user/index.php/LoginAccount");
        } else {
			$path = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$model       = new EmployeeCheckController();
			$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
			if($employeeCheck==1)
			{
			header("location:https://www.qloudid.com/error404.php");
			}
			$model1       = new UserHijackStatusCheckModel();
			$userSummary    = $model1->userSummary($data);
			$getUserCount    = $model1->getUserCount($data);
			$getUserInfo    = $model1->getUserInfo($data);
			require_once('UserHijackInfoView.php');
	}
	}

}
?>