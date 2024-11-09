<?php
	require_once 'CompanyConsentPlatformModel.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class CompanyConsentPlatformController
	{
		
		
		public static function index()
		{
			
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
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new CompanyConsentPlatformModel();
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$requestDetailConnections    = $model->requestDetailConnections($data);
				$requestVerifiedDetailConnections    = $model->requestVerifiedDetailConnections($data);
			
				$requestDetailApprovedConnections    = $model->requestDetailApprovedConnections($data);
				$approveCountConnections    = $model->approveCountConnections($data);
				$requestDetailRejectedConnections    = $model->requestDetailRejectedConnections($data);
				$rejectedCountConnections    = $model->rejectedCountConnections($data);
				$pendingCountConnections    = $model->pendingCountConnections($data);
				$verifiedCountConnections    = $model->verifiedCountConnections($data);
				$row_summary    = $model->userSummary($data);
				
				$model1       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model1->adminRequestReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('CompanyConsentPlatformView.php');
			}
		}
		
		public static function verifyIDReceivedCount($a=null)
		{
			$valueNew = checkLogin();
			// echo $valueNew; die;
			if ($valueNew == 0) {
				$path = "../../../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$model = new CompanyConsentPlatformModel();
				
				$path         = "../../../";
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$verifiedCountConnections = $model->verifiedCountConnections($data);
				
				return $verifiedCountConnections['num'];
			}
		}
		public static function moreRequestDetailApprovedConnections($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyConsentPlatformModel();
				$moreRequestDetailApproved = $model->moreRequestDetailApprovedConnections($data);
				echo $moreRequestDetailApproved; die;
			}
		}
		public static function profileInfo1($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
			echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new CompanyConsentPlatformModel();
				
				$profileInfo1    = $model1->profileInfo1($data);
				echo $profileInfo1; die;
			}
		}
		public static function moreRequestDetailRejectedConnections($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyConsentPlatformModel();
				$moreRequestDetailRejected = $model->moreRequestDetailRejectedConnections($data);
				echo $moreRequestDetailRejected; die;
			}
		}
		public static function moreRequestDetailConnections($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyConsentPlatformModel();
				$moreRequestDetail = $model->moreRequestDetailConnections($data);
				echo $moreRequestDetail; die;
			}
		}
		
		public static function moreRequestVerifiedDetailConnections($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyConsentPlatformModel();
				$moreRequestDetail = $model->moreRequestVerifiedDetailConnections($data);
				echo $moreRequestDetail; die;
			}
		}
		
		public static function approveVerification($a = null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['id']=cleanMe($b);
				$model = new CompanyConsentPlatformModel();
				
				$approveVerification    = $model->approveVerification($data);
				header('location:../../../CompanyVerifiedConnections/companyAccount/'.$data['cid']);
			}
		}
		
		public static function rejectVerification($a = null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['id']=cleanMe($b);
				$model = new CompanyConsentPlatformModel();
				
				$rejectVerification    = $model->rejectVerification($data);
				header('location:../../../CompanyVerifiedConnections/companyAccount/'.$data['cid']);
			}
		}
		
		
		
	}
?>