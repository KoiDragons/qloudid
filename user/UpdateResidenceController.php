<?php
	require_once 'UpdateResidenceModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class UpdateResidenceController
	{
		
		
		public static function index()
		{
			header("location:StoreData/userAccount");
			$valueNew = checkLogin();
			if ($valueNew == 0) {
			header("location:LoginAccount");
			
			}
			else {
				$path="../../";
				$model = new UpdateResidenceModel();
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$phoneAccount = $model->phoneAccount($data);
				if($phoneAccount['phone_number']==null || $phoneAccount['phone_number']=='')
				{
				header("location:AddPhoneNumber");
				}
				$result = $model->GetStartedUser($data);
				
				$resultContry = $model->selectCountry();
				require_once('UpdateResidenceView.php');
			}
			
		}
		public static function checkCountry()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new UpdateResidenceModel();
				
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
				
				$model = new UpdateResidenceModel();
				$data['user_id']=$_SESSION['user_id'];
				$rowsummary = $model->updateUserProfile($data);	
				
				header('location:../UpdateSecurityStatus');
			}
			
			
		}
		
		
		public static function verifyUserDetail()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../";
				
				$model = new UpdateResidenceModel();
				
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
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../";
				
				$model = new UpdateResidenceModel();
				$verifyOtp = $model->verifyOtp();	
				
				echo $verifyOtp; die;
			}
			
		}
		
		
	}
	
	
?>