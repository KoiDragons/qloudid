<?php
require_once 'RestrictedAccessModel.php';
require_once '../company/EmployeeCheckController.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class RestrictedAccessController
{
    
    
    public static function index()
    {
		$path = "../../";
    require_once('SuccessView.php');
	
	}
	
	public static function companyAccount($a=null)
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
				require_once('RestrictedAccessView.php');
			}
		}
	

}
?>