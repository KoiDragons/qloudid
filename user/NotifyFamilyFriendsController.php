<?php
	require_once 'NotifyFamilyFriendsModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	require_once('../configs/testMandril.php');
	require_once('../configs/smsMandril.php');
	class NotifyFamilyFriendsController
	{
		
		
		public static function index()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:LoginAccount");
				} else {
			$path = "../../";
			$model = new NotifyFamilyFriendsModel();
			$resultContry = $model->selectCountry();
			require_once('NotifyFamilyFriendsView.php');
				}
		}
		
		
		public static function displayCountry()
		{
			$path = "../../";
			$model = new NotifyFamilyFriendsModel();
			$resultContry = $model->selectCountry();
			 
			
		}
		
		public static function addImage($a=null)
		{
			$path = "../../../../";
			$data=array();
			$data['id']=cleanMe($a);
			$model = new NotifyFamilyFriendsModel();
			$resultContry = $model->selectCountry();
			require_once('NotifyFamilyFriendsImageView.php');
			
		}
		
		
		public static function addAddress($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../LoginAccount");
				} else {
			$path = "../../../../";
			$data=array();
			$data['id']=cleanMe($a);
			$model = new NotifyFamilyFriendsModel();
			
			require_once('NotifyFamilyFriendsAddressView.php');
				}
		}
		public static function thanksForTheInformation($a=null)
		{
			$path = "../../../";
			$model = new NotifyFamilyFriendsModel();
			 
			require_once('NotifyFamilyFriendsThanksView.php');
			
		} 
		 
		
			 
		public static function moreNotifications($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new NotifyFamilyFriendsModel();
				
				$moreNotifications    = $model1->moreNotificationReceived($data);
				echo $moreNotifications; die;
			}
		}
		
		public static function notifyRelatives($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../LoginAccount");
				} else {
			$data=array();
			$data['id']=cleanMe($a);
			$model1       = new NotifyFamilyFriendsModel();
						 
			$resultWeb = $model1->notifyRelatives($data);
			header('location:../notificationReceived');
		}
		}
		
		
		public static function checkUserAvailability($c = null)
		{
			
			
            $model1       = new NotifyFamilyFriendsModel();
			if (isset($_POST)) {
				$resultWeb = $model1->checkUserAvailability();
			}
			
			echo $resultWeb;
			die;
		}
		
		public static function informRelativesPerson($c = null)
		{
			
			
            $model1       = new NotifyFamilyFriendsModel();
			if (isset($_POST)) {
				
				$resultWeb = $model1->informRelativesPerson();
			}
			
			echo $resultWeb;
			die;
		}
		
		public static function addInfo()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
		 $model1       = new NotifyFamilyFriendsModel();
			if (isset($_POST)) {
				
				$resultWeb = $model1->addInfo($data);
			}
			
			header('location:addAddress/'.$resultWeb);
				}
		}
		
		public static function updateAddress($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
			$data=array();
			$data['id']=cleanMe($a);
			$model1       = new NotifyFamilyFriendsModel();
			if (isset($_POST)) {
				
				$resultWeb = $model1->updateAddress($data);
			}
			
			header('location:../addImage/'.$data['id']);
				}
		}
		
		
		public static function uploadPhoto($a=null)
		{
			$data=array();
			$data['id']=cleanMe($a);
		 $model1       = new NotifyFamilyFriendsModel();
			if (isset($_POST)) {
				 
				$resultWeb = $model1->uploadPhoto($data);
			}
			
			header('location:../thanksForTheInformation');
		}
		
		public static function sendOtp($c = null)
		{
			
			
            $model1       = new NotifyFamilyFriendsModel();
			
			if (isset($_POST)) {
				
				$resultWeb = $model1->sendOtp();
			}
			
			echo $resultWeb;
			die;
		}
		
		public static function verifyOtp($c = null)
		{
			
			$data=array();
			$data['id']=cleanMe($c);
            $model1       = new NotifyFamilyFriendsModel();
			if (isset($_POST)) {
				
				$resultWeb = $model1->verifyOtp($data);
			}
			
			echo $resultWeb;
			die;
		}
		
		public static function createPopup($c = null)
		{
			
			
            $model1       = new NotifyFamilyFriendsModel();
			if (isset($_POST)) {
				$resultWeb = $model1->createPopup();
			}
			
			echo $resultWeb;
			die;
		}
		
	}
?>