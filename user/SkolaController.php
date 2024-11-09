<?php
	require_once 'SkolaModel.php';
	require_once 'PersonalRequestsController.php';
	require_once 'ShareMonitorController.php';
	require_once 'ConnectKinController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class SkolaController
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
				$model1       = new SkolaModel();
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
				require_once('SkolaView.php');
			}
		}
		public static function minSkola()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new SkolaModel();
				$row_summary    = $model1->userSummary($data);
				$studentSummary    = $model1->studentSummary($data);
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
				require_once('MinSkolaView.php');
			}
		}
		
		public static function moreStudents($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=$_POST['id'];
				
				$model1       = new SkolaModel();
				
				$result    = $model1->moreStudents($data);
				echo $result; die;
			}
		}
		
	}
?>