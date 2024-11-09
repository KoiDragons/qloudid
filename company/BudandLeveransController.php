<?php
	
	require_once 'BudandLeveransModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class BudandLeveransController
	{
		
		
		public static function index()
		{
			
		}
		
		public static function packageInfo($a=null)
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
				
				
				$model       = new BudandLeveransModel();
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$pickUpDetail    = $model->pickUpDetail($data);
				$pickUpCount    = $model->pickUpCount($data);
				
				$pickUpCompletedDetail    = $model->pickUpCompletedDetail($data);
				$pickUpCompletedCount    = $model->pickUpCompletedCount($data);
				
				$row_summary    = $model->userSummary($data);
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('BudandLeveransView.php');
			}
		}
		
		public static function employeePackageInfo($a=null)
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
				
				
				$model       = new BudandLeveransModel();
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$pickUpDetailEmployee    = $model->pickUpDetailEmployee($data);
				$pickUpCountEmployee    = $model->pickUpCountEmployee($data);
				
				$pickUpDetailCompletedEmployee    = $model->pickUpDetailCompletedEmployee($data);
				$pickUpCompletedCountEmployee    = $model->pickUpCompletedCountEmployee($data);
				
				$row_summary    = $model->userSummary($data);
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('BudandLeveransEmployeeView.php');
			}
		}
		
		
			public static function morePickUpDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new BudandLeveransModel();
				$morePickUpDetail = $model->morePickUpDetail($data);
				echo $morePickUpDetail; die;
			}
		}
		
		public static function morePickUpCompletedDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new BudandLeveransModel();
				$morePickUpCompletedDetail = $model->morePickUpCompletedDetail($data);
				echo $morePickUpCompletedDetail; die;
			}
		}
		
		
			public static function morePickUpDetailEmployee($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new BudandLeveransModel();
				$morePickUpDetail = $model->morePickUpDetailEmployee($data);
				echo $morePickUpDetail; die;
			}
		}
		
		
			public static function morePickUpCompletedDetailEmployee($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new BudandLeveransModel();
				$morePickUpCompletedDetailEmployee = $model->morePickUpCompletedDetailEmployee($data);
				echo $morePickUpCompletedDetailEmployee; die;
			}
		}
		
		public static function updatePickupValue($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new BudandLeveransModel();
				$updatePickupValue = $model->updatePickupValue($data);
				header("location:../employeePackageInfo/".$data['cid']);
			}
		}
		
	}
?>