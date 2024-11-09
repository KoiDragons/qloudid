<?php
	require_once 'RelationshipManagerModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class RelationshipManagerController
	{
		
	
		
		
		public static function productPage($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['aid']=cleanMe($b);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model1       = new RelationshipManagerModel();
				$companyDetail    = $model1->companyDetail($data);
				$data['country_id']=$companyDetail['country_id'];
				$countryInfo    = $model1->countryInfo($data);
				
				if($countryInfo>0)
				{
				$getMandatoryApps    = $model1->getMandatoryApps($data);
				$getAppsPermissionDetail    = $model1->getAppsPermissionDetail($data);
				}
				else
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				
				$row_summary    = $model1->userSummary($data);
				$apartmentInfo    = $model1->apartmentInfo($data);
				$headQuarterID    = $model1->headQuarterID($data);
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('RelationshipManagerView.php');
			}
		}
		
		
	}
?>