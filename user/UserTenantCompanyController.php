<?php
	require_once 'UserTenantCompanyModel.php';
	require_once '../company/EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class UserTenantCompanyController
	{
		
		
		public static function index()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:LoginAccount");
				} else {
				$path = "../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new CompanyModel();
				$resultOrg    = $model1->userAccount($data);
				$completedEmployeeRequests    = $model1->completedEmployeeRequests($data);
				$requestDetail    = $model1->requestDetail($data);
				$requestDetailApproved    = $model1->requestDetailApproved($data);
				$approveCount    = $model1->approveCount($data);
				$pendingCount    = $model1->pendingCount($data);
				$resultOrg1    = $model1->employeeAccount($data);
				$row_summary    = $model1->userSummary($data);
				require_once('CompanyView.php');
			}
		}
		
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
				$model1       = new UserTenantCompanyModel();
				$country    = $model1->countryList($data);
				$industry    = $model1->industryList($data);
				//$resultOrg    = $model1->userAccount($data);
				$companyDetail    = $model1->companyDetail($data);
				$requestDetail    = $model1->requestDetail($data);
				$requestDetailApproved    = $model1->requestDetailApproved($data);
				$approveCount    = $model1->approveCount($data);
				$requestDetailRejected    = $model1->requestDetailRejected($data);
				$rejectedCount    = $model1->rejectedCount($data);
				$pendingCount    = $model1->pendingCount($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserTenantCompanyView.php');
			}
		}
		
		public static function approveRequest($a=null, $b=null)
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
				$model = new UserTenantCompanyModel();
				$approveRequest    = $model->approveRequest($data);
				header("location:../../monitorAccount/".$data['cid']);
			}
		}
		
		public static function rejectRequest($a=null, $b=null)
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
				$model = new UserTenantCompanyModel();
				$rejectRequest    = $model->rejectRequest($data);
				header("location:../../monitorAccount/".$data['cid']);
			}
		}
		
		public static function moreRequestDetailApproved($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new UserTenantCompanyModel();
				$moreRequestDetailApproved = $model->moreRequestDetailApproved($data);
				echo $moreRequestDetailApproved; die;
			}
		}
		
		public static function moreRequestDetailRejected($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new UserTenantCompanyModel();
				$moreRequestDetailRejected = $model->moreRequestDetailRejected($data);
				echo $moreRequestDetailRejected; die;
			}
		}
		public static function moreRequestDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new UserTenantCompanyModel();
				$moreRequestDetail = $model->moreRequestDetail($data);
				echo $moreRequestDetail; die;
			}
		}
	}
?>