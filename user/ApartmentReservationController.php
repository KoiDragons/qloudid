<?php
	require_once 'ApartmentReservationModel.php';
	require_once '../configs/utility.php';
	class ApartmentReservationController
	{
		public static function addUserPersonalAddressForReservation($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				}
				else
				{
				$path         = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['booking_id']=cleanMe($b);
				$model1       = new ApartmentReservationModel();
				$countryCode    = $model1->selectCountryDetail($data); 
				$resultOrg1    = $model1->addressDetail($data);
				require_once('ApartmentReservationCreateGuestUserAddressInfoView.php');	
				}
			
		}
		
		
		public static function addUserCompanyAddressForReservation($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				}
				else
				{
				$path         = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['booking_id']=cleanMe($b);
				$model1       = new ApartmentReservationModel();
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../lib/url_shortener.php');
				$apartmentBookingDetailInfo    = $model1->apartmentBookingDetailInfo($data); 
				$resultOrg1    = $model1->addressDetail($data);
				require_once('ApartmentReservationCreateGuestCompanyAddressInfoView.php');	
				}
			
		}
		
		public static function updateCompanyAddress($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['booking_id']=cleanMe($b);
				$model1       = new ApartmentReservationModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../lib/url_shortener.php');
				$apartmentBookingDetailInfo    = $model1->apartmentBookingDetailInfo($data);
				$data['is_paid']=$apartmentBookingDetailInfo['is_paid'];
				$data['price']=$apartmentBookingDetailInfo['price']*$apartmentBookingDetailInfo['total_days'];
				if($data['is_paid']==1)
				{
					$_POST['card_number']='';
					$_POST['cvv']='';
					$_POST['expiry_month']='';
					$_POST['expiry_year']='';
					$_POST['name_on_card']='';
				}
				$resultOrg1    = $model1->saveCompanyDetails($data);
				header("location:../../reservationList/".$data['aid']);	
				 
				}
		}
		
		
			public static function sendBookingReservationConfirmationInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				 
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../lib/url_shortener.php');
				$model1       = new ApartmentReservationModel();
				$saveCompanyDetails    = $model1->sendBookingReservationConfirmationInfo($data);
				echo  $saveCompanyDetails;
					die; 
		}
		
		public static function updateUserPersonalAddress($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['booking_id']=cleanMe($b);
				$model1       = new ApartmentReservationModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../lib/url_shortener.php');
				$resultOrg1    = $model1->updateUserPersonalAddress($data);
				if($_POST['food1']==0)
				{
				header("location:../../reservationList/".$data['aid']);	
				}
				else
				{
				header("location:../../addUserCompanyAddressForReservation/".$data['aid']."/".$data['booking_id']);		
				}
				}
		}
		
		public static function updateUserCompanyDetail($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['booking_id']=cleanMe($b);
				$model1       = new ApartmentReservationModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../lib/url_shortener.php');
				$resultOrg1    = $model1->saveCompanyDetails($data);
				
				header("location:../../reservationList/".$data['aid']);	
				
				}
		}
		
		public static function addGuestAndSendBookingInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new ApartmentReservationModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../lib/url_shortener.php');
				$resultOrg1    = $model1->addGuestAndSendBookingInfo($data);
				header("location:../addUserPersonalAddressForReservation/".$data['aid']."/".$resultOrg1);
				}
		}
		
		
		public static function addNewGuestAndSendBookingInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new ApartmentReservationModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../lib/url_shortener.php');
				$resultOrg1    = $model1->addNewGuestAndSendBookingInfo($data);
				header("location:../reservationList/".$data['aid']);	
				}
		}
		
		public static function userDetailAvailability($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				 
				$model1       = new ApartmentReservationModel();
				$countryCode    = $model1->selectCountry($data); 
				$resultOrg1    = $model1->addressDetail($data);
				require_once('ApartmentReservationUserAvailabityView.php');	
				}
			
		}
		
		public static function addUserDetailForReservation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				 
				$model1       = new ApartmentReservationModel();
				$countryCode    = $model1->selectCountry($data); 
				$resultOrg1    = $model1->addressDetail($data);
				require_once('ApartmentReservationCreateGuestUserInfoView.php');	
				}
			
		}
		
		
		public static function addUserForReservation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				 
				$model1       = new ApartmentReservationModel();
				$countryCode    = $model1->selectCountry($data); 
				$resultOrg1    = $model1->addressDetail($data);
				require_once('ApartmentReservationCreateGuestLimitedInfoView.php');	
				}
			
		}
		
		public static function checkEmailInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new ApartmentReservationModel();
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				
				$result    = $model1->checkEmailInfo($data);
				 
				echo $result; die;
				}
		}
		
		public static function checkPhoneInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new ApartmentReservationModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				
				$result    = $model1->checkPhoneInfo($data);
				 
				echo $result; die;
				}
		}
		
		 
		public static function checkPassportInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new ApartmentReservationModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				
				$result    = $model1->checkPassportInfo($data);
				 
				echo $result; die;
				}
		}
		
		public static function guestInformationVerification($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new ApartmentReservationModel();
				$result    = $model1->verifyUserDetail($data);
				if($result['id']==0) 
				{
				require_once('ApartmentReservationNoMatchView.php'); 	
				}
				else
				{
				require_once('ApartmentReservationMatchFoundView.php');	
				}
				
				
				
				}
			
		}
		 
	 
		public static function reserveApartment($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new ApartmentReservationModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				require_once('ApartmentReservationInfoView.php');
				}
			
		}
		
		public static function reservationList($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new ApartmentReservationModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$resultOrg1    = $model1->addressDetail($data);
				$apartmentBookingList    = $model1->apartmentBookingList($data);
				require_once('ApartmentReservationListView.php');
				}
			
		}
		
		
		public static function checkAvailablityDates($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new ApartmentReservationModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co); 
				$result    = $model1->checkAvailablityDates($data);
				echo $result; die;
				}
		}
		
		
		public static function guestInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new ApartmentReservationModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				if(isset($_POST))
				{
				$resultOrg1    = $model1->addressDetail($data);
				$resultContry    = $model1->selectCountry($data);
				require_once('ApartmentReservationUserPhoneView.php');	
				}
				else
				header("location:../reserveApartment/".$data['aid']);
				}
		}
		
		
		
		public static function sendReservationDeail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new ApartmentReservationModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../lib/url_shortener.php');
				$resultOrg1    = $model1->sendBookingInfo($data);
				header("location:../reservationList/".$data['aid']);
				}
		}
		
		
		
		
		
		
		public static function addReservation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new ApartmentReservationModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../lib/url_shortener.php');
				$resultOrg1    = $model1->bookApartment($data);
				header("location:../reservationList/".$data['aid']);
				}
		}
		
	}
	
	
?>