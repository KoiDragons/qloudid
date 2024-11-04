<?php
	require_once 'CompanyBusinessCardDetailModel.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class CompanyBusinessCardDetailController
	{
		
	
		
		public static function shareInfo($a=null)
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
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model       = new CompanyBusinessCardDetailModel();
				$selectIcon    = $model->selectIcon($data);
				$sharedDetail    = $model->sharedDetail($data);
				$savedCount    = $model->savedCount($data);
				$savedQard    = $model->savedQard($data);
				$sharedCount    = $model->sharedCount($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				
				$model1       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model1->adminRequestReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('CompanyBusinessCardDetailView.php');
			}
		}
		
		
		public static function moreSharedDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model       = new CompanyBusinessCardDetailModel();
				
				$moreSharedDetail    = $model->moreSharedDetail($data);
				
				echo $moreSharedDetail; die;
			}
		}
		
		public static function moreSavedQard($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model       = new CompanyBusinessCardDetailModel();
				
				$moreSavedQard    = $model->moreSavedQard($data);
				
				echo $moreSavedQard; die;
			}
		}
	}
?>