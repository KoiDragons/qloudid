<?php
	require_once 'AppsModel.php';
	require_once '../company/EmployeeCheckController.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class AppsController
	{
		
		
		public static function index()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../LoginAccount");
				} else {
				$path = "../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new AppsModel();
				$resultOrg    = $model1->userAccount($data);
				//	$completedEmployeeRequests    = $model1->completedEmployeeRequests($data);
				$resultOrg1    = $model1->employeeAccount($data);
				$row_summary    = $model1->userSummary($data);
				require_once('CompanyView.php');
			}
		}
		
		public static function companyAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../LoginAccount");
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
				$model1       = new AppsModel();
				$resultOrg    = $model1->userAccount($data);
				//$completedEmployeeRequests    = $model1->completedEmployeeRequests($data);
				$resultOrg1    = $model1->employeeAccount($data);
				$appsDetail    = $model1->appsDetail($data);
				$row_summary    = $model1->userSummary($data);
				$companyDetail    = $model1->companyDetail($data);
				
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data);
				require_once('AppsView.php');
			}
		}
		public static function shared($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:/../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				require_once('NewsfeedView.php');
			}
		}
		
		public static function createAppsAccount($a = null, $b = null, $c = null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../LoginAccount");
				} else {
				$model = new AppsModel();
				
				$data = array();
				$data['cid']=cleanMe($a);
				
				$data['company_name']  = cleanMe($_POST['company_name_add']);
				
				$data['website']       = cleanMe($_POST['company_website']);
				
				$data['created_on']    = date('Y-m-d H:i:s');
				$data['client_secret']   = uniqid($data['company_name']);
				if (!filter_var($data['website'], FILTER_VALIDATE_URL) === false) {
					$result         = $model->createAppsAccount($data);
					//echo $result; die;
					
					
					header("location:../../Apps/companyAccount/".$data['cid']);
					
					
				}
				else
				{
					header("location:../../Apps/companyAccount/".$data['cid']);
				}
				
			}
		}
        
        
		
		
	}
?>