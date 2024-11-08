<?php
	require_once 'UserSupplierCompanyModel.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class UserSupplierCompanyController
	{
	
		public static function monitorAccount($a=null)
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
				$model1       = new UserSupplierCompanyModel();
				$country    = $model1->countryList($data);
				$industry    = $model1->industryList($data);
				//$resultOrg    = $model1->userAccount($data);
				$companyDetail    = $model1->companyDetail($data);
				$data['country_id']=$companyDetail['country_id'];
				$data['aid']=$model1->getAppsInfo($data);
				$requestDetail    = $model1->requestDetail($data);
				$requestDetailApproved    = $model1->requestDetailApproved($data);
				$approveCount    = $model1->approveCount($data);
				$requestDetailRejected    = $model1->requestDetailRejected($data);
				$rejectedCount    = $model1->rejectedCount($data);
				$pendingCount    = $model1->pendingCount($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserSupplierCompanyView.php');
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
				$model = new UserSupplierCompanyModel();
				$approveRequest    = $model->approveRequest($data);
				header("location:../../monitorAccount/".$data['cid']);
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
				$model = new UserSupplierCompanyModel();
				$rejectRequest    = $model->rejectRequest($data);
				header("location:../../monitorAccount/".$data['cid']);
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
				$model = new UserSupplierCompanyModel();
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
				$model = new UserSupplierCompanyModel();
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
				$model = new UserSupplierCompanyModel();
				$moreRequestDetail = $model->moreRequestDetail($data);
				echo $moreRequestDetail; die;
			}
		}
		
		public static function disconnectSupplier($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new UserSupplierCompanyModel();
				$approveRequest    = $model->disconnectSupplier($data);
				header("location:../monitorAccount/".$data['cid']);
			}
		}
	}
?>