<?php
	require_once 'CompanyTenantModel.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class CompanyTenantController
	{
		
		public static function landloardRequest($a=null)
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
				$model1       = new CompanyTenantModel();
				$country    = $model1->countryList($data);
				$industry    = $model1->industryList($data);
				//$resultOrg    = $model1->userAccount($data);
				$companyDetail    = $model1->companyDetail($data);
				$data['country_id']=$companyDetail['country_id'];
				
				$countryInfo    = $model1->countryInfo($data);
				
				if($countryInfo>0)
				{
				$getMandatoryApps    = $model1->getMandatoryApps($data);
				
				}
				$headQuarterID    = $model1->headQuarterID($data);
				$requestDetail    = $model1->requestDetail($data);
				$pendingCount    = $model1->pendingCount($data);
				$requestApprovedDetail    = $model1->requestApprovedDetail($data);
				$approvedCount    = $model1->approvedCount($data);
				$requestRejectedDetail    = $model1->requestRejectedDetail($data);
				$rejectedCount    = $model1->rejectedCount($data);
				$row_summary    = $model1->userSummary($data);
				require_once('CompanyTenantView.php');
			}
		}
		
		public static function officeAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['lid']=cleanMe($a);
				$model1       = new CompanyTenantModel();
				$requestDetailOffice    = $model1->requestDetailOffice($data);
				
				$data['cid']=$requestDetailOffice['cid'];
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				
				$country    = $model1->countryList($data);
				$industry    = $model1->industryList($data);
				
				$companyDetail    = $model1->companyDetail($data);
				
				$row_summary    = $model1->userSummary($data);
				require_once('CompanyTenantOfficeView.php');
			}
		}
		
		public static function moreRequestApprovedDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyTenantModel();
				$moreRequestApprovedDetail = $model->moreRequestApprovedDetail($data);
				echo $moreRequestApprovedDetail; die;
			}
		}
		
		public static function moreRequestRejectedDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyTenantModel();
				$moreRequestRejectedDetail = $model->moreRequestRejectedDetail($data);
				echo $moreRequestRejectedDetail; die;
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
				$model = new CompanyTenantModel();
				$moreRequestDetail = $model->moreRequestDetail($data);
				echo $moreRequestDetail; die;
			}
		}
	}
?>