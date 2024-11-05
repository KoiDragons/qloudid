<?php
	require_once 'BoughtProductsModel.php';
	require_once 'PersonalRequestsController.php';
	require_once 'ShareMonitorController.php';
	require_once 'ConnectKinController.php';
	require_once '../configs/utility.php';
	class  BoughtProductsController
	{
		
		
		public static function index()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path         = "../../";
				$model = new  BoughtProductsModel();
                $data['user_id']=$_SESSION['user_id'];
				$userLogs = $model->userLogs($data);
				$userLogsCount = $model->userLogsCount($data);
				$row_summary = $model->userSummary($data);	
				$event    = $model->userEvents($data);
				$model2 = new PersonalRequestsController();
				$receivedRequestsUser = $model2->receivedRequestsUser();
				$model3 = new ConnectKinController();
				$connectAccountReceivedCount = $model3->connectAccountReceivedCount();
				$model4 = new ShareMonitorController();
				$receivedAllCount = $model4->receivedAllCount();
				require_once('BoughtProductsView.php');
			}
		}
		
		
		public static function moreEvents($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=$_POST['id'];
				
				$model1       = new BoughtProductsModel();
				
				$result    = $model1->moreEvents($data);
				echo $result; die;
			}
		}
        
		public static function moreUserLogs($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=$_POST['id'];
				
				$model1       = new BoughtProductsModel();
				
				$moreUserLogs    = $model1->moreUserLogs($data);
				echo $moreUserLogs; die;
			}
		}	
		
		public static function userLogsDetail($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=$_POST['id'];
				
				$model1       = new BoughtProductsModel();
				
				$result    = $model1->userLogsDetail($data);
				echo $result; die;
			}
		}	
	}
    
	
	
?>