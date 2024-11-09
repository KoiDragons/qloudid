<?php
	require_once 'EmployeeSavedQardModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class EmployeeSavedQardController
	{
		
		
		public static function index()
		{
			
		}
		
		
		
	public static function personalAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['eid']=cleanMe($a);
				$model       = new EmployeeSavedQardModel();
				$data['cid']    = $model->getCompany($data);
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data);
				$selectIcon    = $model->selectIcon($data);
				$sharedQard    = $model->sharedQard($data);
				
				$sharedCount    = $model->sharedCount($data);
				$row_summary    = $model->userSummary($data);
				require_once('EmployeeSavedQardView.php');
			}
		}
		
		
		
			public static function moreSharedQard($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['eid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model = new EmployeeSavedQardModel();
				$moreSharedQard = $model->moreSharedQard($data);
				echo $moreSharedQard; die;
			}
		}
		
	}
?>