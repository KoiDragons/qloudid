<?php
	require_once 'QloudParkingModel.php';
	require_once 'PersonalRequestsController.php';
	require_once 'ShareMonitorController.php';
	require_once 'ConnectKinController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class QloudParkingController
	{
		
		
		public static function index()
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				
				$model       = new QloudParkingModel();
				$selectIcon = $model->selectIcon($data);
				$row_summary = $model->userSummary($data);	
				$parkingCount = $model->parkingCount($data);
				$parkingDetail = $model->parkeringDetail($data);
				$model2 = new PersonalRequestsController();
				$receivedRequestsUser = $model2->receivedRequestsUser();
				$model3 = new ConnectKinController();
				$connectAccountReceivedCount = $model3->connectAccountReceivedCount();
				$model4 = new ShareMonitorController();
				$receivedAllCount = $model4->receivedAllCount();
				require_once('QloudParkingListView.php');
			}	
		}
		
		public static function addParking()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model       = new QloudParkingModel();
				$row_summary = $model->userSummary($data);	
				require_once('QloudParkingView.php');
			}	
		}
		
		public static function editParking($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['p_id']=cleanMe($a);
				$model       = new QloudParkingModel();
				$row_summary = $model->userSummary($data);	
				$parkingSummary = $model->parkingSummary($data);	
				require_once('QloudParkingView.php');
			}	
		}
		
		public static function saveInformation()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$model = new QloudParkingModel();
			$saveInformation = $model->saveInformation($data);
			header("location:../QloudParking");
				}
		}
		public static function updateInformation($a)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['p_id']=cleanMe($a);
			$model = new QloudParkingModel();
			$updateInformation = $model->updateInformation($data);
			header("location:../../QloudParking");
				}
		}
		public static function moreParkeringDetail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
			echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new QloudParkingModel();
                $data['user_id']=$_SESSION['user_id'];
				$moreParkeringDetail = $model->moreParkeringDetail($data);
				echo $moreParkeringDetail; die;
			}
			
		}
	}
?>