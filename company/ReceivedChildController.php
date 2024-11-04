<?php

	require_once 'ReceivedChildModel.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class ReceivedChildController
	{
		public static function signInReceivedChild($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model = new ReceivedChildModel();
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				$signInReceivedChild = $model->signInReceivedChild($data);
				header("location:../attendenceDetail/".$data['cid']);
			}
		}
		
		public static function confirmDropoffInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['child_id']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model = new ReceivedChildModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['cid']=$childrenDetail['enc'];
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				$confirmDropoffInfo = $model->confirmDropoffInfo($data);
				header("location:../childrenList/".$data['cid']);
			}
		}
		
		public static function confirmPickupInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['child_id']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model = new ReceivedChildModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['cid']=$childrenDetail['enc'];
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				$confirmPickupInfo = $model->confirmPickupInfo($data);
				header("location:../childrenPickupList/".$data['cid']);
			}
		}
		
		public static function childSignin($a=null)
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
				$model = new ReceivedChildModel();
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$daycareTimelapsed    = $model3->daycareTimelapsed($data);
				
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				$planDetails    = $model3->planDetails($data);
				
				if($appdownloadStatus==0)
				{
					header('location:../../Brand/productPage/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
					die;
				}
				if($daycareTimelapsed>14 && $planDetails==0)
				{
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
				die;	
				}
				
				
				$model = new ReceivedChildModel();
				$selectChild = $model->selectChild($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				
				require_once('ReceivedChildSigninView.php');
			}
		}
	
	public static function receivedConfirmation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";	
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['child_id']=cleanMe($a);
				$model = new ReceivedChildModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['cid']=$childrenDetail['enc'];
				$model = new ReceivedChildModel();
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$daycareTimelapsed    = $model3->daycareTimelapsed($data);
				
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				$planDetails    = $model3->planDetails($data);
				
				if($appdownloadStatus==0)
				{
					header('location:../../Brand/productPage/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
					die;
				}
				if($daycareTimelapsed>14 && $planDetails==0)
				{
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
				die;	
				}
				$childSignInDetail = $model->childSignInDetail($data);
				$relativesDetail = $model->relativesDetail($data);
				$parentsDetail    = $model->parentsDetail($data);
				//print_r($relativesDetail); die;
				$row_summary    = $model->userSummary($data);
				
				require_once('ReceivedChildParentListView.php');
			}
		}
		
		
		public static function pickupConfirmation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";	
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['child_id']=cleanMe($a);
				$model = new ReceivedChildModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['cid']=$childrenDetail['enc'];
				$model = new ReceivedChildModel();
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$daycareTimelapsed    = $model3->daycareTimelapsed($data);
				
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				$planDetails    = $model3->planDetails($data);
				
				if($appdownloadStatus==0)
				{
					header('location:../../Brand/productPage/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
					die;
				}
				if($daycareTimelapsed>14 && $planDetails==0)
				{
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
				die;	
				}
				$childSignInDetail = $model->childPickupDetail($data);
				$relativesDetail = $model->relativesDetail($data);
				$parentsDetail    = $model->parentsDetail($data);
				$row_summary    = $model->userSummary($data);
				
				require_once('ReceivedChildParentPickupView.php');
			}
		}
	
		public static function childrenList($a=null)
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
				$model = new ReceivedChildModel();
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$daycareTimelapsed    = $model3->daycareTimelapsed($data);
				
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				$planDetails    = $model3->planDetails($data);
				
				if($appdownloadStatus==0)
				{
					header('location:../../Brand/productPage/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
					die;
				}
				if($daycareTimelapsed>14 && $planDetails==0)
				{
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
				die;	
				}
				$model = new ReceivedChildModel();
				$childrenDetail = $model->childrenDetailAll($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				
				require_once('ChilldrenListView.php');
			}
		}
		
		public static function childrenListNotReceived($a=null)
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
				$model = new ReceivedChildModel();
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$daycareTimelapsed    = $model3->daycareTimelapsed($data);
				
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				$planDetails    = $model3->planDetails($data);
				
				if($appdownloadStatus==0)
				{
					header('location:../../Brand/productPage/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
					die;
				}
				if($daycareTimelapsed>14 && $planDetails==0)
				{
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
				die;	
				}
				$model = new ReceivedChildModel();
				$childrenDetail = $model->childrenDetailNotReceived($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				
				require_once('ChilldrenListNotReceivedView.php');
			}
		}
		
		
		public static function verifyRequests($a=null)
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
				
				$model = new ReceivedChildModel();
				$data['page_id']=1;
				$updateAdmin    = $model->updateAdmin($data);
				$checkPermission    = $model->checkPermission($data);
				$employeeLocationDetail    = $model->employeeLocationDetail($data);
				$daycareRequestCount = $model->daycareRequestCount($data);
				$employeeId = $model->employeeId($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				$dunsInfoCount    = $model->dunsInfoCount($data);
				require_once('RequestVerificationView.php');
				
				
			}
		}
		
		public static function requestedApps($a=null)
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
				$data['page_id']=1;
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model = new ReceivedChildModel();
				$daycareRequestCount = $model->daycareRequestCount($data);
				$employeeId = $model->employeeId($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				$checkPermission    = $model->checkPermission($data); 
				require_once('RequestVerificationAppsView.php');
				
				
			}
		}
		
		
		public static function childrenPickupList($a=null)
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
				$model = new ReceivedChildModel();
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$daycareTimelapsed    = $model3->daycareTimelapsed($data);
				
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				$planDetails    = $model3->planDetails($data);
				
				if($appdownloadStatus==0)
				{
					header('location:../../Brand/productPage/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
					die;
				}
				if($daycareTimelapsed>14 && $planDetails==0)
				{
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
				die;	
				}
				$model = new ReceivedChildModel();
				$childrenDetail = $model->childrenPickupDetailAll($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				
				require_once('ChilldrenPickupListView.php');
			}
		}
		
		
		public static function moreChildrenDetail($a=null)
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
				$model       = new ReceivedChildModel();
				
				$moreChildrenDetail    = $model->moreChildrenDetailAll($data);
				
				echo $moreChildrenDetail; die;
			}
		}
		
		public static function moreChildrenDetailNotReceived($a=null)
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
				$model       = new ReceivedChildModel();
				
				$moreChildrenDetail    = $model->moreChildrenDetailNotReceived($data);
				
				echo $moreChildrenDetail; die;
			}
		}
		
		
		public static function moreChildrenPickupDetailAll($a=null)
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
				$model       = new ReceivedChildModel();
				
				$moreChildrenPickupDetailAll    = $model->moreChildrenPickupDetailAll($data);
				
				echo $moreChildrenPickupDetailAll; die;
			}
		}
		
		
		
		public static function attendenceDetail($a=null)
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
				$model = new ReceivedChildModel();
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$daycareTimelapsed    = $model3->daycareTimelapsed($data);
				
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				$planDetails    = $model3->planDetails($data);
				
				if($appdownloadStatus==0)
				{
					header('location:../../Brand/productPage/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
					die;
				}
				if($daycareTimelapsed>14 && $planDetails==0)
				{
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
				die;	
				}
				$model       = new ReceivedChildModel();
				$selectIcon    = $model->selectIcon($data);
				$childDroppedCount    = $model->childDroppedCount($data);
				$childrenDroppedDetail    = $model->childrenDroppedDetail($data);
				$childPresentCount    = $model->childPresentCount($data);
				$childrenPresentDetail    = $model->childrenPresentDetail($data);
				$childAbsentCount    = $model->childAbsentCount($data);
				$childrenAbsentDetail    = $model->childrenAbsentDetail($data);
				$childLeftCount    = $model->childLeftCount($data);
				$childrenLeftDetail    = $model->childrenLeftDetail($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				
				$model1       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model1->adminRequestReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('ReceivedChildView.php');
			}
		}
		
		public static function moreChildrenLeftDetail($a=null)
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
				$model       = new ReceivedChildModel();
				
				$moreChildrenLeftDetail    = $model->moreChildrenLeftDetail($data);
				
				echo $moreChildrenLeftDetail; die;
			}
		}
		
		public static function moreChildrenDroppedDetail($a=null)
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
				$model       = new ReceivedChildModel();
				
				$moreChildrenDroppedDetail    = $model->moreChildrenDroppedDetail($data);
				
				echo $moreChildrenDroppedDetail; die;
			}
		}
		
		public static function moreChildrenPresentDetail($a=null)
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
				$model       = new ReceivedChildModel();
				
				$moreChildrenPresentDetail    = $model->moreChildrenPresentDetail($data);
				
				echo $moreChildrenPresentDetail; die;
			}
		}
		
		public static function moreChildrenAbsentDetail($a=null)
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
				$model       = new ReceivedChildModel();
				
				$moreChildrenAbsentDetail    = $model->moreChildrenAbsentDetail($data);
				
				echo $moreChildrenAbsentDetail; die;
			}
		}
		
		public static function approveRequest($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($b);
				$data['rid']=cleanMe($a);
				$model = new ReceivedChildModel();
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				$approveRequest = $model->approveRequest($data);
				header("location:../../attendenceDetail/".$data['cid']);
			}
		}
		
		public static function confirmDropoff($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";	
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($b);
				$data['rid']=cleanMe($a);
				$model = new ReceivedChildModel();
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$daycareTimelapsed    = $model3->daycareTimelapsed($data);
				
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				$planDetails    = $model3->planDetails($data);
				
				if($appdownloadStatus==0)
				{
					header('location:../../Brand/productPage/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
					die;
				}
				if($daycareTimelapsed>14 && $planDetails==0)
				{
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
				die;	
				}
				$model = new ReceivedChildModel();
				$data['app_id']    = $model->appId();
				$selectPerson = $model->selectPerson($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				
				require_once('ReceivedChildConfirmView.php');
			}
		}
		public static function rejectRequest($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($b);
				$data['rid']=cleanMe($a);
				$model = new ReceivedChildModel();
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				$rejectRequest = $model->rejectRequest($data);
				header("location:../../attendenceDetail/".$data['cid']);
			}
		}
		
		
	}
?>