<?php
	require_once 'BostadModel.php';
	require_once 'PersonalRequestsController.php';
	require_once 'ShareMonitorController.php';
	require_once 'ConnectKinController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class BostadController
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
				$model1       = new BostadModel();
				$row_summary    = $model1->userSummary($data);
				if($row_summary['get_started_wizard_status']==0)
				{
					header("location:GetStartedNew");
				}
				$data['country_id']=$row_summary['country_of_residence'];
				$countryInfo    = $model1->countryInfo($data);
				$selectIcon    = $model1->selectIcon($data);
				if($countryInfo>0)
				{
				$getAppsPermissionDetail    = $model1->getAppsPermissionDetail($data);	
				$getAppsPermissionDetail    = $model1->getAppsPermissionDetail($data);
				}
				else
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model2 = new PersonalRequestsController();
				$receivedRequestsUser = $model2->receivedRequestsUser();
				$model3 = new ConnectKinController();
				$connectAccountReceivedCount = $model3->connectAccountReceivedCount();
				$model4 = new ShareMonitorController();
				$receivedAllCount = $model4->receivedAllCount();
				require_once('BostadView.php');
			}
		}
		
		public static function minBostad()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new BostadModel();
				$row_summary    = $model1->userSummary($data);
				$employerSummary    = $model1->employerSummary($data);
				if($row_summary['get_started_wizard_status']==0)
				{
					header("location:GetStartedNew");
				}
				
				$model2 = new PersonalRequestsController();
				$receivedRequestsUser = $model2->receivedRequestsUser();
				$model3 = new ConnectKinController();
				$connectAccountReceivedCount = $model3->connectAccountReceivedCount();
				$model4 = new ShareMonitorController();
				$receivedAllCount = $model4->receivedAllCount();
				require_once('MinBostadView.php');
			}
		}
		
		public static function moreEmployers($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=$_POST['id'];
				
				$model1       = new BostadModel();
				
				$result    = $model1->moreEmployers($data);
				echo $result; die;
			}
		}
	}
?>