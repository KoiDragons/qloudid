<?php
	require_once 'ManagePermissionsModel.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'CompanyCustomersController.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class ManagePermissionsController
	{
		
		
		public static function index()
		{
			
		}
		
		public static function viewEmployees($a=null)
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
				$data['page_id']=1;
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				$model1       = new ManagePermissionsModel();
				$updateAdmin    = $model1->updateAdmin($data);
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:https://www.qloudid.com/user/index.php/NewsfeedDetail");
				}
				$companyDetail    = $model1->companyDetail($data);
				$headQuarterID    = $model1->headQuarterID($data);
				$employeesDetail    = $model1->employeesDetail($data);
				$employeesCount= $model1->employeesCount($data);
				$row_summary    = $model1->userSummary($data);
				require_once('ManagePermissionsView.php');
			}
		}
		
		
		public static function manageAdmin($a=null)
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
				$data['page_id']=1;
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				$model1       = new ManagePermissionsModel();
				$updateAdmin    = $model1->updateAdmin($data);
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:https://www.qloudid.com/user/index.php/NewsfeedDetail");
				}
				$companyDetail    = $model1->companyDetail($data);
				$data['country_id']=$companyDetail['country_id'];
				$countryInfo    = $model1->countryInfo($data);
				
				if($countryInfo>0)
				{
				
				$getMandatoryApps    = $model1->getMandatoryApps($data);
				
				}
				$employeesDetail    = $model1->employeesDetail($data);
				$employeesCount= $model1->employeesCount($data);
				$headQuarterID    = $model1->headQuarterID($data);
				$adminRequestDetail    = $model1->adminRequestDetail($data);
				$adminRequestCount= $model1->adminRequestCount($data);
				
				$row_summary    = $model1->userSummary($data);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				
				
				require_once('ManageAdminView.php');
			}
		}
		
		
		public static function adminRequestReceivedCount($a=null)
		{
			$valueNew = checkLogin();
			// echo $valueNew; die;
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$model = new ManagePermissionsModel();
				
				$path         = "../../../";
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$adminRequestCount = $model->adminRequestCount($data);
				
				return $adminRequestCount['num'];
			}
		}
		
		public static function setPermissions($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=cleanMe($a);
				$data['page_id']=1;
				$model1       = new ManagePermissionsModel();
				$updateAdmin    = $model1->updateAdmin($data);
				$checkPermissionUser    = $model1->checkPermissionUser($data);
				$data['cid']=$model1->getCompany($data);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				if($checkPermissionUser==0)
				{
					header("location:https://www.qloudid.com/user/index.php/NewsfeedDetail");
				}
				$checked   = $model1->checkPermissionData($data);
				//$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('ManageSetPermissionView.php');
			}
		}
		
		public static function moreEmployeeDetail($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ManagePermissionsModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['page_id']=1;
				$moreEmployeesDetail = $model->moreEmployeesDetail($data);
				
				echo $moreEmployeesDetail; die;
			}
			
		}
		
		
		public static function moreAdminDetail($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ManagePermissionsModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['page_id']=1;
				$moreAdminDetail = $model->moreAdminDetail($data);
				
				echo $moreAdminDetail; die;
			}
			
		}
		
		
		public static function moreAdminRequestDetail($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ManagePermissionsModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['page_id']=1;
				$moreAdminRequestDetail = $model->moreAdminRequestDetail($data);
				
				echo $moreAdminRequestDetail; die;
			}
			
		}
		
		public static function approveRequest($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ManagePermissionsModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($a);
				$data['cid']=cleanMe($b);
				
				$approveRequest = $model->approveRequest($data);
				header('location:../../manageAdmin/'.$data['cid']);
			}
			
		}
		
		
		public static function rejectRequest($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ManagePermissionsModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($a);
				$data['cid']=cleanMe($b);
				
				$rejectRequest = $model->rejectRequest($data);
				header('location:../../manageAdmin/'.$data['cid']);
			}
			
		}
		
		public static function updateRequest($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ManagePermissionsModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['id']=cleanMe($a);
				$updateRequest = $model->updateRequest($data);
				
				echo $updateRequest; die;
			}
			
		}
		
		public static function updateAdminStatus()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ManagePermissionsModel();
                $data['user_id']=$_SESSION['user_id'];
				
				$updateAdminStatus = $model->updateAdminStatus($data);
				
				echo $updateAdminStatus; die;
			}
			
		}
	}
?>