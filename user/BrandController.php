<?php
	require_once 'BrandModel.php';
	require_once '../company/EmployeeCheckController.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class BrandController
	{
		
		
		public static function index()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:LoginAccount");
				} else {
				$path = "../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new CompanyModel();
				$resultOrg    = $model1->userAccount($data);
				$completedEmployeeRequests    = $model1->completedEmployeeRequests($data);
				$resultOrg1    = $model1->employeeAccount($data);
				$row_summary    = $model1->userSummary($data);
				require_once('CompanyView.php');
			}
		}
		
		public static function brandAccount($a=null)
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
				$model1       = new BrandModel();
				
				$checkPermission    = $model1->checkPermission($data);
				
				if($checkPermission ==0)
				{
					header("location:../../NewsfeedDetail");
				}
				$country    = $model1->countryList($data);
				$industry    = $model1->industryList($data);
				//$resultOrg    = $model1->userAccount($data);
				$companyDetail    = $model1->companyDetail($data);
				$data['country_id']=$companyDetail['country_id'];
				$countryInfo    = $model1->countryInfo($data);
				
				if($countryInfo>0)
				{
				$getPermissionDetail    = $model1->getPermissionDetail($data);
				}
				$aboutUsCount    = $model1->aboutUsCount($data);
				$getLinkid    = $model1->getLinkid($data);
				//print_r($companyDetail); die;
				//$completedEmployeeRequests    = $model1->completedEmployeeRequests($data);
				//$resultOrg1    = $model1->employeeAccount($data);
				$row_summary    = $model1->userSummary($data);
				
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('BrandView.php');
			}
		}
		
		public static function employeeAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
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
				$model1       = new BrandModel();
				
				
				$country    = $model1->countryList($data);
				$industry    = $model1->industryList($data);
				//$resultOrg    = $model1->userAccount($data);
				$companyDetail    = $model1->companyDetail($data);
				$data['country_id']=$companyDetail['country_id'];
				$countryInfo    = $model1->countryInfo($data);
				
				if($countryInfo>0)
				{
				$getPermissionDetailEmployees    = $model1->getPermissionDetailEmployees($data);
				}
				$aboutUsCount    = $model1->aboutUsCount($data);
				$getLinkid    = $model1->getLinkid($data);
				//print_r($companyDetail); die;
				//$completedEmployeeRequests    = $model1->completedEmployeeRequests($data);
				//$resultOrg1    = $model1->employeeAccount($data);
				$row_summary    = $model1->userSummary($data);
				
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('BrandEmployeeView.php');
			}
		}
		
		public static function productPage($a=null,$b=null)
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
				$data['aid']=cleanMe($b);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new BrandModel();
				$country    = $model1->countryList($data);
				$industry    = $model1->industryList($data);
				//$resultOrg    = $model1->userAccount($data);
				$companyDetail    = $model1->companyDetail($data);
				$data['country_id']=$companyDetail['country_id'];
				$countryInfo    = $model1->countryInfo($data);
				
				if($countryInfo>0)
				{
				$getAppsPermissionDetail    = $model1->getAppsPermissionDetail($data);
				}
				else
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				
				$row_summary    = $model1->userSummary($data);
				
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('BrandProductPageView.php');
			}
		}
		
		public static function productPageAccess($a=null,$b=null)
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
				$data['aid']=cleanMe($b);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new BrandModel();
				$country    = $model1->countryList($data);
				$industry    = $model1->industryList($data);
				//$resultOrg    = $model1->userAccount($data);
				$companyDetail    = $model1->companyDetail($data);
				$data['country_id']=$companyDetail['country_id'];
				$countryInfo    = $model1->countryInfo($data);
				
				if($countryInfo>0)
				{
				$getAppsPermissionDetail    = $model1->getAppsPermissionDetail($data);
				}
				else
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				
				$row_summary    = $model1->userSummary($data);
				$permittedEmployees    = $model1->permittedEmployees($data);
				
				require_once('BrandProductAccessView.php');
			}
		}
		
		public static function employeeList($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				$data['cid']=cleanMe($a);
				$data['aid']=cleanMe($b);
				$data['filter']=cleanMe($_GET['filter']);
				$model = new BrandModel();
				
				$employeeList=$model->employeeList($data);
				
				echo $employeeList;
				
			}
		}
		
		public static function downloadApp($a=null,$b=null)
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
				$data['aid']=cleanMe($b);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new BrandModel();
				$country    = $model1->countryList($data);
				$industry    = $model1->industryList($data);
				//$resultOrg    = $model1->userAccount($data);
				$companyDetail    = $model1->companyDetail($data);
				$data['country_id']=$companyDetail['country_id'];
				$countryInfo    = $model1->countryInfo($data);
				
				if($countryInfo>0)
				{
				$getAppsPermissionDetail    = $model1->getAppsPermissionDetail($data);
				}
				else
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				
				$downloadApp    = $model1->downloadApp($data);
				
				header('location:../../brandAccount/'.$data['cid']);
			}
		}
		
		
		public static function getLinkid($a=null)
		{
			 $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
          echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
		
			$model = new BrandModel();
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$addWeblink=$model->getLinkid($data);
			echo "https://www.qmatchup.com/beta/company/index.php/PublicAboutUs/companyAccount/".$addWeblink; die;
			
		}
	}
	
	public static function addWeblink($a=null)
		{
			 $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
		
			$model = new BrandModel();
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$addWeblink=$model->addWeblink($data);
			if($addWeblink=='0')
			{
				echo 0; die;
			}
			echo "https://www.qmatchup.com/beta/company/index.php/PublicAboutUs/companyAccount/".$addWeblink; die;
			
		}
	}
	
	public static function updateLinkid($a=null)
		{
				$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../LoginAccount");
        } else {
			$model = new BrandModel();
			
			$updateLinkid=$model->updateLinkid();
			return $updateLinkid;
		}
		}
		public static function setPermission($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			$data=array();
			$data['cid']=cleanMe($a);
			$data['aid']=cleanMe($b);
			include('../configs/testMandril.php');
			$model = new BrandModel();
			$setPermission = $model->setPermission($data);
			echo $setPermission; die;
				}
		}
	
	}
?>