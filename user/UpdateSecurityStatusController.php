<?php
	
	require_once 'UpdateSecurityStatusModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class UpdateSecurityStatusController
	{
		
		
		public static function index()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
			header("location:LoginAccount");
			
			}
			else {
				$path="../../";
				$model = new UpdateSecurityStatusModel();
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$phoneAccount = $model->phoneAccount($data);
				
				$result = $model->GetStartedUser($data);
				
				$resultContry = $model->selectCountry();
				require_once('UpdateSecurityStatusView.php');
			}
			
		}
		public static function checkCountry()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new UpdateSecurityStatusModel();
				
				$result    = $model1->checkCountry($data);
				echo $result; die;
			}
		}
		
		
		
		
		public static function updateUserProfile()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:/../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				
				$model = new UpdateSecurityStatusModel();
				$data['user_id']=$_SESSION['user_id'];
				$rowsummary = $model->updateUserProfile($data);	
				
				header('location:../StoreData/userAccount');
			}
			
			
		}
		public static function updateUserProfileBankid()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:/../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				
				$model = new UpdateSecurityStatusModel();
				$data['user_id']=$_SESSION['user_id'];
				$rowsummary = $model->updateUserProfileBankid($data);	
				
				header('location:../StoreData/userAccount');
			}
			
			
		}
		
		
		public static function updateUserProfileVerified()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:/../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				
				$model = new UpdateSecurityStatusModel();
				$data['user_id']=$_SESSION['user_id'];
				$rowsummary = $model->updateUserProfileVerified($data);	
				
				header('location:../StoreData/userAccount');
			}
			
			
		}
		
		public static function verifyUserDetail()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../";
				
				$model = new UpdateSecurityStatusModel();
				
				require_once('../configs/smsMandril.php');
				$verifyUserDetail = $model->verifyUserDetail();	
				
				echo $verifyUserDetail; die;
			}
			
		}
		
		
		public static function verifyOtp()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../";
				
				$model = new UpdateSecurityStatusModel();
				$verifyOtp = $model->verifyOtp();	
				
				echo $verifyOtp; die;
			}
			
		}
		
		
	}
	
	
?>