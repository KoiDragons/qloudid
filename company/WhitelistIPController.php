<?php
	
	require_once 'WhitelistIPModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class WhitelistIPController
	{
		
		
		public static function index()
		{
			
		}
		
		public static function ipAccount($a=null)
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
				$model       = new WhitelistIPModel();
				$companyDetail    = $model->companyDetail($data);
				$selectIcon    = $model->selectIcon($data);
				
				//$approveCountConnections    = $model->approveCountConnections($data);
				$visitorsDetail    = $model->visitorsDetail($data);
				$visitorsCount    = $model->visitorsCount($data);
				
				$visitorsDetailRegular    = $model->visitorsDetailRegular($data);
				$visitorsCountRegular    = $model->visitorsCountRegular($data);
				
				$visitorsDetailRegularArrived    = $model->visitorsDetailRegularArrived($data);
				$visitorsCountRegularArrived    = $model->visitorsCountRegularArrived($data);
				
				$visitorsDetailRegularLamnat    = $model->visitorsDetailRegularLamnat($data);
				$visitorsCountRegularLamnat    = $model->visitorsCountRegularLamnat($data);
				
				$visitorsLeftDetail    = $model->visitorsLeftDetail($data);
				$visitorsLeftCount    = $model->visitorsLeftCount($data);
				$row_summary    = $model->userSummary($data);
				$addedCompany = $model->addedCompany($data);
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('WhitelistIPView.php');
			}
		}
		
		
		
		
		
		
		public static function visitorsInformation($a=null)
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
				$model       = new WhitelistIPModel();
				$resultContry    = $model->userCountryList($data);
				$companyDetail    = $model->companyDetail($data);
				$meetingRoomDetail    = $model->meetingRoomDetail($data);
				
				require_once('RegularVisitorsView.php');
			}
		}
		
		public static function employeeList($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				$data['cid']=cleanMe($a);
				$data['filter']=cleanMe($_GET['filter']);
				$model = new WhitelistIPModel();
				
				$employeeList=$model->employeeList($data);
				
				echo $employeeList;
				
			}
		}
		
		public static function addVisitor($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				$data['cid']=cleanMe($a);
				
				$model = new WhitelistIPModel();
				
				$addVisitor=$model->addVisitor($data);
				
				echo $addVisitor;
				
			}
		}
		
		public static function statistics($a=null)
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
				$model       = new WhitelistIPModel();
				
				$companyDetail    = $model->companyDetail($data);
				
				$row_summary    = $model->userSummary($data);
				$addedCompany = $model->addedCompany($data);
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('WhitelistStatisticView.php');
			}
		}
		
		public static function messageInfo($a=null)
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
				$model       = new WhitelistIPModel();
				
				$companyDetail    = $model->companyDetail($data);
				
				
				require_once('WhiteListCompanyView.php');
			}
		}
		
		public static function ipSetting($a=null)
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
				$model       = new WhitelistIPModel();
				
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
				$requestDetailApprovedConnections    = $model->requestDetailApprovedConnections($data);
				$approveCountConnections    = $model->approveCountConnections($data);
				
				$row_summary    = $model->userSummary($data);
				$appsLocationCount    = $model->appsLocationCount($data);
				$appsSafeqidCount    = $model->appsSafeqidCount($data);
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('WhitelistIPSettingView.php');
			}
		}
		public static function moreCompanyIps($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['lid']=cleanMe($a);
				$model = new WhitelistIPModel();
				$locationDetail    = $model->locationDetail($data);
				$data['cid']=$locationDetail['enc'];
				$moreCompanyIps = $model->moreCompanyIps($data);
				echo $moreCompanyIps; die;
			}
		}
		
		
		public static function moreRegularVisitors($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new WhitelistIPModel();
				$moreRegularVisitors = $model->moreRegularVisitors($data);
				echo $moreRegularVisitors; die;
			}
		}
		
		
		public static function moreRegularVisitorsArrived($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new WhitelistIPModel();
				$moreRegularVisitorsArrived = $model->moreRegularVisitorsArrived($data);
				echo $moreRegularVisitorsArrived; die;
			}
		}
		
		public static function moreRegularVisitorsLamnat($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new WhitelistIPModel();
				$moreRegularVisitorsLamnat = $model->moreRegularVisitorsLamnat($data);
				echo $moreRegularVisitorsLamnat; die;
			}
		}
		
		public static function addIp($a = null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				
				$model = new WhitelistIPModel();
				
				$addIp    = $model->addIp($data);
				echo $addIp; die;
			}
		}
		
		public static function addCompanyIp($a = null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['lid']=cleanMe($a);
				
				$model = new WhitelistIPModel();
				$locationDetail    = $model->locationDetail($data);
				$data['cid']=$locationDetail['enc'];
				
				$addIp    = $model->addCompanyIp($data);
				header('location:../ipSetting/'.$data['lid']);
			}
		}
		
		
		public static function addCompanyName($a = null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				
				$model = new WhitelistIPModel();
				
				$addCompanyName    = $model->addCompanyName($data);
				header("location:../statistics/".$data['cid']);
			}
		}
		
		
		public static function setArrived($a = null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['vid']=cleanMe($b);
				$model = new WhitelistIPModel();
				
				$setArrived    = $model->setArrived($data);
				header("location:../../ipAccount/".$data['cid']);
			}
		}
		
		public static function setArrivedServiceBooked($a = null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['vid']=cleanMe($b);
				$model = new WhitelistIPModel();
				
				$setArrivedServiceBooked    = $model->setArrivedServiceBooked($data);
				header("location:../../ipAccount/".$data['cid']);
			}
		}
		
		
		public static function setLamnatServiceBooking($a = null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['vid']=cleanMe($b);
				$model = new WhitelistIPModel();
				
				$setLamnatServiceBooking    = $model->setLamnatServiceBooking($data);
				header("location:../../ipAccount/".$data['cid']);
			}
		}
		
		public static function setLamnat($a = null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['vid']=cleanMe($b);
				$model = new WhitelistIPModel();
				
				$setLamnat    = $model->setLamnat($data);
				header("location:../../ipAccount/".$data['cid']);
			}
		}
		
		public static function activateInactive($a = null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['st']=cleanMe($c);
				$model = new WhitelistIPModel();
				
				$activateInactive    = $model->activateInactive($data);
				header("location:../../../statistics/".$data['cid']);
			}
		}
		
		public static function editIp($a = null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				
				$model = new WhitelistIPModel();
				
				$editIp    = $model->editIp($data);
				echo $editIp; die;
			}
		}
		
		
		public static function updateVisitors($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['vid']=cleanMe($b);
				$model = new WhitelistIPModel();
				$updateVisitors = $model->updateVisitors($data);
				header("location:../../ipAccount/".$data['cid']);
			}
		}
		
		
		public static function updateEmployeeVisitors($a=null,$b=null)
		{
			
			$data=array();
			$data['cid']=cleanMe($a);
			$data['vid']=cleanMe($b);
			$model = new WhitelistIPModel();
			$updateVisitors = $model->updateVisitors($data);
			header("location:../../ipAccount/".$data['cid']);
			
		}
	}
?>