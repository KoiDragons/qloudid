<?php
	
	
	require_once 'CompanyUpdatesModel.php';
	require_once 'EmployeeCheckController.php';
	
require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class CompanyUpdatesController
	{
		
		 
		
		public static function updateInfo($a=null)
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
				
				$model       = new CompanyUpdatesModel();
				
				$companyDetail    = $model->companyDetail($data);
				
				$companyUpdateInfo    = $model->companyUpdateInfo($data);
				
				$updateCount    = $model->updateCount($data);
				$row_summary    = $model->userSummary($data);
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('CompanyUpdatesView.php');
			}
		}
		
		public static function updateInformation($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				
				
				$model       = new CompanyUpdatesModel();
				
				$companyDetail    = $model->companyDetail($data);
				
				$companyUpdateDetail    = $model->companyUpdateDetail($data);
				$row_summary    = $model->userSummary($data);
				
				require_once('CompanyUpdateDetailView.php');
			}
		}
		
		public static function moreUpdates($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyUpdatesModel();
				$moreUpdates = $model->moreUpdates($data);
				echo $moreUpdates; die;
			}
		}
		
		
	}
?>