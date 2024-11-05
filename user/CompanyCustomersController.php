<?php
	require_once 'CompanyCustomersModel.php';
	require_once '../company/EmployeeCheckController.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once '../configs/utility.php';
	class CompanyCustomersController
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
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['page_id']=1;
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model       = new CompanyCustomersModel();
				$updateAdmin    = $model->updateAdmin($data);
				$requestDetail    = $model->requestDetail($data);
				$sentRequestDetail    = $model->sentRequestDetail($data);
				$sentRequestCount    = $model->sentRequestCount($data);
				$requestCount    = $model->requestCount($data);
				$approveDetail    = $model->approveDetail($data);
				
				$approveCount    = $model->approveCount($data);
				$rejectDetail    = $model->rejectDetail($data);
				$rejectCount    = $model->rejectCount($data);
				
				$companyDetail    = $model->companyDetail($data);
				
				
				$requestDetailCustomer    = $model->requestDetailCustomer($data);
				$requestDetailApprovedCustomer    = $model->requestDetailApprovedCustomer($data);
				$approveCountCustomer    = $model->approveCountCustomer($data);
				$requestDetailRejectedCustomer    = $model->requestDetailRejectedCustomer($data);
				$rejectedCountCustomer    = $model->rejectedCountCustomer($data);
				$pendingCountCustomer    = $model->pendingCountCustomer($data);
				
				
				$requestDetailStudent    = $model->requestDetailStudent($data);
				$requestDetailApprovedStudent    = $model->requestDetailApprovedStudent($data);
				$approveCountStudent    = $model->approveCountStudent($data);
				$requestDetailRejectedStudent    = $model->requestDetailRejectedStudent($data);
				$rejectedCountStudent    = $model->rejectedCountStudent($data);
				$pendingCountStudent    = $model->pendingCountStudent($data);
				
				$requestDetailTenant    = $model->requestDetailTenant($data);
				$requestDetailApprovedTenant    = $model->requestDetailApprovedTenant($data);
				$approveCountTenant    = $model->approveCountTenant($data);
				$requestDetailRejectedTenant    = $model->requestDetailRejectedTenant($data);
				$rejectedCountTenant    = $model->rejectedCountTenant($data);
				$pendingCountTenant    = $model->pendingCountTenant($data);	
				
				$row_summary    = $model->userSummary($data);
				
				$model1       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model1->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				require_once('CompanyCustomersView.php');
			}
		}
		
		public static function customerRequestReceivedCount($a=null)
		{
			$valueNew = checkLogin();
			// echo $valueNew; die;
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$model = new CompanyCustomersModel();
				
				$path         = "../../../";
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$pendingCountTenant = $model->pendingCountTenant($data);
				$pendingCountStudent = $model->pendingCountStudent($data);
				$pendingCountCustomer = $model->pendingCountCustomer($data);
				$requestCount = $model->requestCount($data);
				return $requestCount['num']+$pendingCountCustomer['num']+$pendingCountStudent['num']+$pendingCountTenant['num'];
			}
		}
		
		
		public static function profileInfo($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new CompanyCustomersModel();
				
				$profileInfo    = $model1->profileInfo($data);
				echo $profileInfo; die;
			}
		}
		public static function approveRequestTenant($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['id']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$model = new CompanyCustomersModel();
				$approveRequest    = $model->approveRequestTenant($data);
				header("location:../../companyAccount/".$data['cid']);
			}
		}
		
		
		public static function rejectEmployeeRequest($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['id']=cleanMe($b);
				$data['cid']=cleanMe($a);
				$model = new CompanyCustomersModel();
				$rejectEmployeeRequest    = $model->rejectEmployeeRequest($data);
				header("location:../../companyAccount/".$data['cid']);
			}
		}
		
		
		public static function approveEmployeeRequest($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['id']=cleanMe($b);
				$data['cid']=cleanMe($a);
				$model = new CompanyCustomersModel();
				$approveEmployeeRequest    = $model->approveEmployeeRequest($data);
				header("location:../../companyAccount/".$data['cid']);
			}
		}
		
		public static function rejectRequestTenant($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['id']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$model = new CompanyCustomersModel();
				$rejectRequest    = $model->rejectRequestTenant($data);
				header("location:../../companyAccount/".$data['cid']);
			}
		}
		
		public static function moreRequestDetailApprovedTenant($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCustomersModel();
				$moreRequestDetailApproved = $model->moreRequestDetailApprovedTenant($data);
				echo $moreRequestDetailApproved; die;
			}
		}
		
		public static function moreRequestDetailRejectedTenant($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCustomersModel();
				$moreRequestDetailRejected = $model->moreRequestDetailRejectedTenant($data);
				echo $moreRequestDetailRejected; die;
			}
		}
		public static function moreRequestDetailTenant($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCustomersModel();
				$moreRequestDetail = $model->moreRequestDetailTenant($data);
				echo $moreRequestDetail; die;
			}
		}
		
		public static function approveRequestStudent($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['id']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$model = new CompanyCustomersModel();
				$approveRequest    = $model->approveRequestStudent($data);
				header("location:../../companyAccount/".$data['cid']);
			}
		}
		
		public static function rejectRequestStudent($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['id']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$model = new CompanyCustomersModel();
				$rejectRequest    = $model->rejectRequestStudent($data);
				header("location:../../companyAccount/".$data['cid']);
			}
		}
		
		public static function moreRequestDetailApprovedStudent($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCustomersModel();
				$moreRequestDetailApproved = $model->moreRequestDetailApprovedStudent($data);
				echo $moreRequestDetailApproved; die;
			}
		}
		
		public static function moreRequestDetailRejectedStudent($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCustomersModel();
				$moreRequestDetailRejected = $model->moreRequestDetailRejectedStudent($data);
				echo $moreRequestDetailRejected; die;
			}
		}
		public static function moreRequestDetailStudent($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCustomersModel();
				$moreRequestDetail = $model->moreRequestDetailStudent($data);
				echo $moreRequestDetail; die;
			}
		}
		
		public static function approveRequestCustomer($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['id']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$model = new CompanyCustomersModel();
				$approveRequest    = $model->approveRequestCustomer($data);
				header("location:../../companyAccount/".$data['cid']);
			}
		}
		
		public static function rejectRequestCustomer($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['id']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$model = new CompanyCustomersModel();
				$rejectRequest    = $model->rejectRequestCustomer($data);
				header("location:../../companyAccount/".$data['cid']);
			}
		}
		
		public static function moreRequestDetailApprovedCustomer($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCustomersModel();
				$moreRequestDetailApproved = $model->moreRequestDetailApprovedCustomer($data);
				echo $moreRequestDetailApproved; die;
			}
		}
		
		public static function moreRequestDetailRejectedCustomer($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCustomersModel();
				$moreRequestDetailRejected = $model->moreRequestDetailRejectedCustomer($data);
				echo $moreRequestDetailRejected; die;
			}
		}
		public static function moreRequestDetailCustomer($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCustomersModel();
				$moreRequestDetail = $model->moreRequestDetailCustomer($data);
				echo $moreRequestDetail; die;
			}
		}
		
		
		
		
		
		
		
		
		
		
		public static function moreRequestDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCustomersModel();
				$moreRequestDetail = $model->moreRequestDetail($data);
				echo $moreRequestDetail; die;
			}
		}
		
		
		public static function moreSentRequestDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCustomersModel();
				$moreSentRequestDetail = $model->moreSentRequestDetail($data);
				echo $moreSentRequestDetail; die;
			}
		}
		
		public static function moreApprovedDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCustomersModel();
				$moreApprovedDetail = $model->moreApprovedDetail($data);
				echo $moreApprovedDetail; die;
			}
		}
		
		
		
		
		public static function moreRejectDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				//print_r($_POST);
				$model = new CompanyCustomersModel();
				$moreRejectDetail = $model->moreRejectDetail($data);
				echo $moreRejectDetail; die;
			}
		}
		
		public static function disconnectEmployee($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCustomersModel();
				$approveRequest    = $model->disconnectEmployee($data);
				header("location:../companyAccount/".$data['cid']);
			}
		}
		
		public static function checkConnection($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
			echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				//print_r($_POST);
				$model = new CompanyCustomersModel();
				$checkConnection = $model->checkConnection($data);
				echo $checkConnection; die;
			}
		}
		
		public static function disconnectSupplier($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCustomersModel();
				$approveRequest    = $model->disconnectSupplier($data);
				header("location:../companyAccount/".$data['cid']);
			}
		}
	}
    
	
	
?>