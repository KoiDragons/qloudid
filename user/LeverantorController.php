<?php
	require_once 'LeverantorModel.php';
	require_once 'PersonalRequestsController.php';
	require_once 'ShareMonitorController.php';
	require_once 'ConnectKinController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class LeverantorController
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
				$model1       = new LeverantorModel();
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
				header("location:https://www.qloudid.com/error404.php");
				}
				$model2 = new PersonalRequestsController();
				$receivedRequestsUser = $model2->receivedRequestsUser();
				$model3 = new ConnectKinController();
				$connectAccountReceivedCount = $model3->connectAccountReceivedCount();
				$model4 = new ShareMonitorController();
				$receivedAllCount = $model4->receivedAllCount();
				require_once('LeverantorView.php');
			}
		}
		
			public static function minLeverantor()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new LeverantorModel();
				$row_summary    = $model1->userSummary($data);
				$supplierSummary    = $model1->supplierSummary($data);
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
				require_once('MinLeverantorView.php');
			}
		}
		
		public static function moreSuppliers($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=$_POST['id'];
				
				$model1       = new LeverantorModel();
				
				$result    = $model1->moreSuppliers($data);
				echo $result; die;
			}
		}
	}
?>