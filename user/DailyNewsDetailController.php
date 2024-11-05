<?php
	require_once 'DailyNewsDetailModel.php';
	require_once 'PersonalRequestsController.php';
	require_once 'ShareMonitorController.php';
	require_once 'ConnectKinController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class DailyNewsDetailController
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
				$model1       = new DailyNewsDetailModel();
				$userProfile    = $model1->userProfile($data);
				$row_summary    = $model1->userSummary($data);
				$model2 = new PersonalRequestsController();
				$receivedRequestsUser = $model2->receivedRequestsUser();
				$model3 = new ConnectKinController();
				$connectAccountReceivedCount = $model3->connectAccountReceivedCount();
				$model4 = new ShareMonitorController();
				$receivedAllCount = $model4->receivedAllCount();
				require_once('DailyNewsDetailView.php');
			}
		}
		
		
		
	}
?>