<?php
	require_once 'CompanyLandloardModel.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class CompanyLandloardController
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
				$model1       = new CompanyLandloardModel();
				$country    = $model1->countryList($data);
				$industry    = $model1->industryList($data);
				//$resultOrg    = $model1->userAccount($data);
				$companyDetail    = $model1->companyDetail($data);
				$data['country_id']=$companyDetail['country_id'];
				$data['aid']=$model1->getAppsInfo($data);
				$requestDetail    = $model1->requestDetail($data);
				$pendingCount    = $model1->pendingCount($data);
				$requestApprovedDetail    = $model1->requestApprovedDetail($data);
				$approvedCount    = $model1->approvedCount($data);
				$requestRejectedDetail    = $model1->requestRejectedDetail($data);
				$rejectedCount    = $model1->rejectedCount($data);
				$row_summary    = $model1->userSummary($data);
				require_once('CompanyLandloardView.php');
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
				$model = new CompanyLandloardModel();
				$approveRequest    = $model->approveRequest($data);
				header("location:../../landloardRequest/".$data['cid']);
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
				$model = new CompanyLandloardModel();
				$rejectRequest    = $model->rejectRequest($data);
				header("location:../../landloardRequest/".$data['cid']);
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
				$model = new CompanyLandloardModel();
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
				$model = new CompanyLandloardModel();
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
				$model = new CompanyLandloardModel();
				$moreRequestDetail = $model->moreRequestDetail($data);
				echo $moreRequestDetail; die;
			}
		}
	}
?>