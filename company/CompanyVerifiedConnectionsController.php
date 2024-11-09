<?php
	require_once 'CompanyVerifiedConnectionsModel.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class CompanyVerifiedConnectionsController
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
				$model       = new CompanyVerifiedConnectionsModel();
				
				$companyDetail    = $model->companyDetail($data);
				$requestDetailConnections    = $model->requestDetailConnections($data);
				$requestVerifiedDetailConnections    = $model->requestVerifiedDetailConnections($data);
				$requestDetailApprovedConnections    = $model->requestDetailApprovedConnections($data);
				$approveCountConnections    = $model->approveCountConnections($data);
				$requestDetailRejectedConnections    = $model->requestDetailRejectedConnections($data);
				$rejectedCountConnections    = $model->rejectedCountConnections($data);
				$verifiedCountConnections    = $model->verifiedCountConnections($data);
				$pendingCountConnections    = $model->pendingCountConnections($data);
				$row_summary    = $model->userSummary($data);
				require_once('CompanyVerifiedConnectionsView.php');
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
				$model = new CompanyVerifiedConnectionsModel();
				$moreRequestDetailApproved = $model->moreRequestDetailApprovedConnections($data);
				echo $moreRequestDetailApproved; die;
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
				$model = new CompanyVerifiedConnectionsModel();
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
				$model = new CompanyVerifiedConnectionsModel();
				$moreRequestDetail = $model->moreRequestVerifiedDetailConnections($data);
				echo $moreRequestDetail; die;
			}
		}
		
		public static function approveVerification($a = null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:../../../../LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['id']=cleanMe($b);
				$model = new CompanyVerifiedConnectionsModel();
				
				$approveVerification    = $model->approveVerification($data);
				header('location:../../../CompanyVerifiedConnections/companyAccount/'.$data['cid']);
			}
		}
		
		public static function rejectVerification($a = null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:../../../../LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['id']=cleanMe($b);
				$model = new CompanyVerifiedConnectionsModel();
				
				$rejectVerification    = $model->rejectVerification($data);
				header('location:../../../CompanyVerifiedConnections/companyAccount/'.$data['cid']);
			}
		}
		
	}
?>