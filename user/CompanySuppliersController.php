<?php
	require_once 'CompanySuppliersModel.php';
	
	require_once '../configs/utility.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	require_once '../company/EmployeeCheckController.php';
	class CompanySuppliersController
	{
		
		
		public static function index()
		{
			$path         = "../../../../";
			
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
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model1       = new CompanySuppliersModel();
				$updateAdmin    = $model1->updateAdmin($data);
				$checkPermission    = $model1->checkPermission($data);
				
				if($checkPermission ==0)
				{
				header("location:../../../../company/index.php/RestrictedAccess/companyAccount/".$data['cid']);
				}
				
				$companyDetail    = $model1->companyDetail($data);
				$verificationId    = $model1->verificationId($data);
				$row_summary    = $model1->userSummary($data);
				
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				
				require_once('CompanySuppliersView.php');
			}
		}
		
		
		
		
	}
    
	
	
?>