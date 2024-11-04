<?php
	require_once 'UserTenantCompanyModel.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class UserTenantCompanyController
	{
		
		public static function monitorAccount($a=null, $b=null, $c=null, $d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
				$data['aid']=cleanMe($d);
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
				$data['country_id']=$companyDetail['country_id'];
				
				$requestDetailApproved    = $model1->requestDetailApproved($data);
				 
				$row_summary    = $model1->userSummary($data);
				require_once('UserTenantCompanyApprovedView.php');
			}
		}
		
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
				$model1       = new UserTenantCompanyModel();
				$country    = $model1->countryList($data);
				$industry    = $model1->industryList($data);
				//$resultOrg    = $model1->userAccount($data);
				$companyDetail    = $model1->companyDetail($data);
				$data['country_id']=$companyDetail['country_id'];
				
				$updateCompanyId    = $model1->updateCompanyId($data);
				$requestDetail    = $model1->requestDetail($data);
				$pendingCount    = $model1->pendingCount($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserTenantCompanyReceivedView.php');
			}
		}
		
		
		
		public static function addTenantInfo($a=null)
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
				$country    = $model1->selectCountry($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserTenantCompanyTenantInfoView.php');
			}
		}
		
		
		public static function rejectedAccount($a=null, $b=null, $c=null, $d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
				$data['aid']=cleanMe($d);
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
				$data['country_id']=$companyDetail['country_id'];
				
				$requestDetailRejected    = $model1->requestDetailRejected($data);
				$rejectedCount    = $model1->rejectedCount($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserTenantCompanyRejectedView.php');
			}
		}
		
		
		public static function sentAccount($a=null, $b=null, $c=null, $d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
				$data['aid']=cleanMe($d);
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
				$data['country_id']=$companyDetail['country_id'];
				
				$requestDetailSent    = $model1->requestDetailSent($data);
				$sentCount    = $model1->sentCount($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserTenantCompanySentView.php');
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
				header("location:../../../../user/index.php/LoginAccount");
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
		
		
		public static function addTenant($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model = new UserTenantCompanyModel();
				$addTenant    = $model->addTenant($data);
				header("location:../monitorAccount/".$data['cid']);
			}
		}
		
		public static function checkRequestDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				 
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new UserTenantCompanyModel();
				$result    = $model->checkRequestDetail($data);
				echo $result;
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
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new UserTenantCompanyModel();
				$moreRequestDetailRejected = $model->moreRequestDetailRejected($data);
				echo $moreRequestDetailRejected; die;
			}
		}
		
		public static function moreRequestDetailSent($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new UserTenantCompanyModel();
				$moreRequestDetailSent = $model->moreRequestDetailSent($data);
				echo $moreRequestDetailSent; die;
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
				$model = new UserTenantCompanyModel();
				$moreRequestDetail = $model->moreRequestDetail($data);
				echo $moreRequestDetail; die;
			}
		}
	}
?>