<?php
	require_once 'ForloratOchUpphittatModel.php';
	require_once 'PersonalRequestsController.php';
	require_once 'ShareMonitorController.php';
	require_once 'ConnectKinController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class ForloratOchUpphittatController
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
				$model       = new ForloratOchUpphittatModel();
				$lostandFoundCount    = $model->lostandFoundCount($data);
				$lostandFoundDetail    = $model->lostandFoundDetail($data);
				$forloradCount    = $model->forloradCount($data);
				$forloradDetail    = $model->forloradDetail($data);
				$selectIcon = $model->selectIcon($data);
				$row_summary    = $model->userSummary($data);
				$userAccount    = $model->userAccount($data);
				$model2 = new PersonalRequestsController();
				$receivedRequestsUser = $model2->receivedRequestsUser();
				$model3 = new ConnectKinController();
				$connectAccountReceivedCount = $model3->connectAccountReceivedCount();
				$model4 = new ShareMonitorController();
				$receivedAllCount = $model4->receivedAllCount();
				require_once('ForloratOchUpphittatView.php');
			}	
		}
		
		
		public static function welcomeVisitor()
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model       = new ForloratOchUpphittatModel();
				 
				require_once('LostandFoundWelcomeView.php');
			}	
		}
		
	public static function checkStatus($a=null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['id']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model       = new ForloratOchUpphittatModel();
				 
				$row_summary    = $model->userSummary($data);
				 
				require_once('ForloratOchUpphittatUpdateView.php');
			}	
		}
		
		public static function updateFound($a=null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['id']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model       = new ForloratOchUpphittatModel();
				$itemDetail    = $model->itemDetail($data);
				$row_summary    = $model->userSummary($data);
				 
				require_once('ForloratOchUpphittatFoundView.php');
			}	
		}
		public static function moreLostandFoundDetail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new ForloratOchUpphittatModel();
				$moreLostandFoundDetail = $model->moreLostandFoundDetail($data);
				echo $moreLostandFoundDetail; die;
			}
		}
		
		public static function moreForloradDetail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new ForloratOchUpphittatModel();
				$moreForloradDetail = $model->moreForloradDetail($data);
				echo $moreForloradDetail; die;
			}
		}
		
		public static function updateLostValue($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['id']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model = new ForloratOchUpphittatModel();
				$updateLostValue = $model->updateLostValue($data);
				header("location:../../ForloratOchUpphittat");
			}
		}
		
		public static function reportLost($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['id']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model = new ForloratOchUpphittatModel();
				$reportLost = $model->reportLost($data);
				header("location:../../ForloratOchUpphittat");
			}
		}
	}
?>