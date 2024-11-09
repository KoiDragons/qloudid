<?php
	require_once 'CompanyWifiModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class CompanyWifiController
	{
		
		
		public static function index()
		{
			
		}
		
			
		public static function wifiSetting($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['lid']=cleanMe($a);
				$model       = new CompanyWifiModel();
				
				$locationDetail    = $model->locationDetail($data);
				$data['cid']=$locationDetail['enc'];
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data);
				$data['country_id']=$companyDetail['country_id'];
				$countryInfo    = $model->countryInfo($data);
				
				if($countryInfo>0)
				{
				
				$getMandatoryApps    = $model->getMandatoryApps($data);
				
				}
				$addedWifiConnections    = $model->addedWifiConnections($data);
				$addedWifiCount    = $model->addedWifiCount($data);
				
				$row_summary    = $model->userSummary($data);
				
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('CompanyWifiView.php');
			}
		}
		public static function moreCompanyWifis($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['lid']=cleanMe($a);
				$model = new CompanyWifiModel();
				$locationDetail    = $model->locationDetail($data);
				$data['cid']=$locationDetail['enc'];
				$moreCompanyWifis = $model->moreCompanyWifis($data);
				echo $moreCompanyWifis; die;
			}
		}
		
		
		
		
		
		public static function addCompanyWifi($a = null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['lid']=cleanMe($a);
				
				$model = new CompanyWifiModel();
				$locationDetail    = $model->locationDetail($data);
				$data['cid']=$locationDetail['enc'];
				
				$addWifi    = $model->addCompanyWifi($data);
				header('location:../wifiSetting/'.$data['lid']);
			}
		}
		
		
		
		public static function editWifi($a = null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				
				$model = new CompanyWifiModel();
				
				$editWifi    = $model->editWifi($data);
				echo $editWifi; die;
			}
		}
		
		
		}
?>