<?php
	require_once 'ConsentProfileParentModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class ConsentProfileParentController
	{
		 
		 
		
		public static function requestAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['pid']=cleanMe($a);
				$model1       = new ConsentProfileParentModel();
				$resultContry = $model1->countryOption();
				$childDetail    = $model1->childDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('ConsentProfileParentView.php');
			}
		}
		
		 public static function checkUserAvailability()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new ConsentProfileParentModel();
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$result    = $model1->checkUserAvailability($data);
				echo $result; die;
			}
		}
		
		public static function verifyOtp()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model = new ConsentProfileParentModel();
				$verifyOtp = $model->verifyOtp();	
				echo $verifyOtp; die;
			}
			
		}
		
		public static function updateSSN($a=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:/../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				 
				$model = new ConsentProfileParentModel();
				$data['user_id']=$_SESSION['user_id'];
				$data['pid']=cleanMe($a);
				$rowsummary = $model->updateSSN($data);	
				
				header('location:../requestAccount/'.$data['pid']);
			}
			
			
		}
		
	}
?>