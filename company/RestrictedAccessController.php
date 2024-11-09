<?php
require_once 'RestrictedAccessModel.php';
require_once 'EmployeeCheckController.php';
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
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				
				$model1       = new RestrictedAccessModel();
				
				$checkPermission    = $model1->checkPermission($data);
				
				if($checkPermission ==1)
				{
				header("location:../../ManagePermissions/manageAdmin/".$data['cid']);
				}
				require_once('RestrictedAccessView.php');
			}
		}
	
	
	public static function sendAdminRequest($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$model       = new RestrictedAccessModel();
				
				$checkPermission    = $model->checkPermission($data);
				
				if($checkPermission ==1)
				{
				header("location:../../ManagePermissions/manageAdmin/".$data['cid']); die;
				}
				
				$updateRequest    = $model->sendRequest($data);
				header("location:../companyAccount/".$data['cid']."?sent=true"); die;
			}
		}

}
?>