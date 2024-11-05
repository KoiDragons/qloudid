<?php
	require_once 'PersonalRequestsController.php';
	require_once 'ShareMonitorController.php';
	require_once 'ConnectKinController.php';
	require_once 'GetVerifiedModel.php';
	require_once '../configs/utility.php';
	class GetVerifiedController
	{
		
		
		public static function index()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path         = "../../";
				$model1       = new GetVerifiedModel();
				
				
				require_once('GetVerifiedView.php');
			}
		}
		public static function changePassword($a = null, $b = null, $c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location: LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new GetVerifiedModel();
				$ChangePassword    = $model->changePassword($data);
				header("location:userAccount");
			}
		}
		
		public static function checkPassword($a = null, $b = null, $c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cpass']=md5(cleanMe($a));
				$model = new GetVerifiedModel();
				$checkPassword    = $model->checkPassword($data);
				echo $checkPassword; die;
			}
		}
		
		
		
		
		public static function userAccount($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				if(isset($_SESSION['rememberme_qid'])){
					
					setcookie('rememberme_qid', $_SESSION['rememberme_qid'], time()+ (30*60*60*24), '/');
				}
				
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				
				$model1       = new GetVerifiedModel();
				$country    = $model1->countryList($data);
				$resultOrg    = $model1->userAccount($data);
				if($resultOrg['grading_status']==0)
				{
				header('location:../UpdateSecurityStatus'); die;
				}
				$profileStatus    = $model1->profileStatus($data);
				$hijackedUser    = $model1->hijackedUser($data);
				$resultOrg1    = $model1->employeeAccount($data);
				$row_summary    = $model1->userSummary($data);
				$verificationId    = $model1->verificationId($data);
				$model2 = new PersonalRequestsController();
				$receivedRequestsUser = $model2->receivedRequestsUser();
				$model3 = new ConnectKinController();
				$connectAccountReceivedCount = $model3->connectAccountReceivedCount();
				$model4 = new ShareMonitorController();
				$receivedAllCount = $model4->receivedAllCount();
				require_once('GetVerifiedView.php');
			}
			
		}
		
		
		
		
		
		public static function updateGrading($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				$data['grading']=cleanMe($co);
				$model1       = new GetVerifiedModel();
				
				$result    = $model1->updateGrading($data);
				header("location:../userAccount");
			}
		}
		
		
		public static function checkUserAvailability()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new GetVerifiedModel();
				
				$result    = $model1->checkUserAvailability($data);
				echo $result; die;
			}
		}
		
		
		public static function updateSSN($a = null , $b=null ,$c=null, $d=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:/../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				//print_r($_POST); die;
				$model = new GetVerifiedModel();
				$data['user_id']=$_SESSION['user_id'];
				$rowsummary = $model->updateSSN($data);	
				
				header('location:../StoreData/userAccount');
				
				
			}
			
		} 
		
		public static function approveOtp($a = null , $b=null ,$c=null, $d=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:/../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				//print_r($_POST); die;
				$model = new GetVerifiedModel();
				$data['user_id']=$_SESSION['user_id'];
				$rowsummary = $model->approveOtp($data);	
				
				header('location:../StoreData/userAccount');
				
				
			}
			
		}
	 
	}
	
	
?>