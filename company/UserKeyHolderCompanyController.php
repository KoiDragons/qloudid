<?php
	require_once 'UserKeyHolderCompanyModel.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class UserKeyHolderCompanyController
	{
		
		public static function receivedAccount($a=null)
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
				$model1       = new UserKeyHolderCompanyModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					//header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$companyDetail    = $model1->companyDetail($data);
				$data['country_id']=$companyDetail['country_id'];
				 
				$requestDetail    = $model1->requestDetail($data);
				$pendingCount    = $model1->pendingCount($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserKeyHolderCompanyReceivedView.php');
			}
		}
		
		public static function approvedAccount($a=null)
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
				$model1       = new UserKeyHolderCompanyModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$companyDetail    = $model1->companyDetail($data);
				$data['country_id']=$companyDetail['country_id'];
				 
				$requestDetailApproved    = $model1->requestDetailApproved($data);
				$approveCount    = $model1->approveCount($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserKeyHolderCompanyApprovedView.php');
			}
		}
		
		public static function rejectedAccount($a=null)
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
				$model1       = new UserKeyHolderCompanyModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$companyDetail    = $model1->companyDetail($data);
				$data['country_id']=$companyDetail['country_id'];
				 
				$requestDetailRejected    = $model1->requestDetailRejected($data);
				$rejectedCount    = $model1->rejectedCount($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserKeyHolderCompanyRejectedView.php');
			}
		}
		
		
		public static function approveRequest($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['id']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$model = new UserKeyHolderCompanyModel();
				$approveRequest    = $model->approveRequest($data);
				header("location:../../receivedAccount/".$data['cid']);
			}
		}
		
		public static function rejectRequest($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['id']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$model = new UserKeyHolderCompanyModel();
				$rejectRequest    = $model->rejectRequest($data);
				header("location:../../receivedAccount/".$data['cid']);
			}
		}
		
		public static function moreRequestDetailApproved($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new UserKeyHolderCompanyModel();
				$moreRequestDetailApproved = $model->moreRequestDetailApproved($data);
				echo $moreRequestDetailApproved; die;
			}
		}
		
		public static function moreRequestDetailRejected($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new UserKeyHolderCompanyModel();
				$moreRequestDetailRejected = $model->moreRequestDetailRejected($data);
				echo $moreRequestDetailRejected; die;
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
				$model = new UserKeyHolderCompanyModel();
				$moreRequestDetail = $model->moreRequestDetail($data);
				echo $moreRequestDetail; die;
			}
		}
	}
?>