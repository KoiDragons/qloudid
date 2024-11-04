<?php

	require_once 'VenueBookingModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class VenueBookingController
	{
		
		 
		
		public static function venueInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new VenueBookingModel();
				$locationDetail    = $model->locationDetail($data);
				$venueTypeDetail    = $model->venueTypeDetail();
				$foodTypeDetail    = $model->foodTypeDetail();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$data['app_id']    = $model->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				require_once('VenueBookingInformationView.php');
			}
		}
		
		public static function editVenueInformation($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['vid']=cleanMe($b);
				$model       = new VenueBookingModel();
				$locationDetail    = $model->locationDetail($data);
				$venueTypeDetail    = $model->venueTypeDetail();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$data['app_id']    = $model->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				
				$venueInformationDetail    = $model->venueInformationDetail($data);
				$data['venue_type']=$venueInformationDetail['venue_type'];
				$data['food_and_drink']=$venueInformationDetail['food_and_drink'];
				$selectedVenueType    = $model->selectedVenueType($data);
				$selectedFoodType    = $model->selectedFoodType($data);
				require_once('VenueBookingInformationEditView.php');
			}
		}
		
		
		public static function editVenueCapacityInformation($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['vid']=cleanMe($b);
				$model       = new VenueBookingModel();
				$locationDetail    = $model->locationDetail($data);
				$venueTypeDetail    = $model->venueTypeDetail();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$data['app_id']    = $model->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				
				$venueInformationDetail    = $model->venueInformationDetail($data);
				require_once('VenueBookingInformationCapacityInfoView.php');
			}
		}
		
		public static function editVenuePricingInformation($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['vid']=cleanMe($b);
				$model       = new VenueBookingModel();
				$locationDetail    = $model->locationDetail($data);
				$venueTypeDetail    = $model->venueTypeDetail();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$data['app_id']    = $model->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$venueWorkingInformationDetail    = $model->venueWorkingInformationDetail($data);
				$venueInformationDetail    = $model->venueInformationDetail($data);
				
				require_once('VenueBookingInformationPricingInfoView.php');
			}
		}
		
		public static function completeVenueInformation($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['vid']=cleanMe($b);
				$model       = new VenueBookingModel();
				$locationDetail    = $model->locationDetail($data);
				$venueTypeDetail    = $model->venueTypeDetail();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$data['app_id']    = $model->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				
				$venueInformationDetail    = $model->venueInformationDetail($data);
				require_once('VenueBookingCompleteInfoView.php');
			}
		}
	 
		public static function editVenuePhotoInformation($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['vid']=cleanMe($b);
				$model       = new VenueBookingModel();
				$locationDetail    = $model->locationDetail($data);
				$venueTypeDetail    = $model->venueTypeDetail();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$data['app_id']    = $model->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				
				$venueInformationDetail    = $model->venueInformationDetail($data);
				 
				$displayPhotos    = $model->displayPhotos($data);
				require_once('VenueBookingPhotoInfoView.php');
			}
		}
		public static function listVenues($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				  
				$model       = new VenueBookingModel();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$data['app_id']    = $model->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model->companyDetail($data);
				
				$VenueBookingDetail    = $model->VenueBookingDetail($data);
				$VenueBookingCount    = $model->VenueBookingCount($data);
				$row_summary    = $model->userSummary($data);
				require_once('VenueBookingView.php');
			}
		}
		
		
		public static function moreVenueBookingDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new VenueBookingModel();
				$moreVenueBookingDetail = $model->moreVenueBookingDetail($data);
				echo $moreVenueBookingDetail; die;
			}
		}
		
		public static function companyEntities($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new VenueBookingModel();
				if($_POST['owner_type']==1)
				{
					$companyEntities = '<option value="0">Select</option>';
				}
				else
				if($_POST['owner_type']==2)
				{
					$companyEntities = $model->hotelDetail($data);
				}
				else if($_POST['owner_type']==3)
				{
					$companyEntities = $model->wellnessDetail($data);
				}
				echo $companyEntities; die;
			}
		}
		
		
		public static function addVenueBooking($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} 
				else{
			$data=array();
			$data['cid']=cleanMe($a);
			$model = new VenueBookingModel();
			 
			$addVenueBooking = $model->addVenueBooking($data);
			header("location:../listVenues/".$data['cid']);
			}
		}
		
		
		public static function updateVenueBooking($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} 
				else{
			$data=array();
			$data['cid']=cleanMe($a);
			$data['vid']=cleanMe($b);
			$model = new VenueBookingModel();
			 
			$updateVenueBooking = $model->updateVenueBooking($data);
			header("location:../../completeVenueInformation/".$data['cid']."/".$data['vid']);
			}
		}
		
		public static function updateVenueBookingCapacity($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} 
				else{
			$data=array();
			$data['cid']=cleanMe($a);
			$data['vid']=cleanMe($b);
			$model = new VenueBookingModel();
			 
			$updateVenueBookingCapacity = $model->updateVenueBookingCapacity($data);
			header("location:../../completeVenueInformation/".$data['cid']."/".$data['vid']);
			}
		}
		 
		public static function updateVenueBookingPricing($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} 
				else{
			$data=array();
			$data['cid']=cleanMe($a);
			$data['vid']=cleanMe($b);
			$model = new VenueBookingModel();
			 
			$updateVenueBookingPricing = $model->updateVenueBookingPricing($data);
			header("location:../../completeVenueInformation/".$data['cid']."/".$data['vid']);
			}
		}
		
		
		public static function getVenueType($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new VenueBookingModel();
				$getVenueType = $model->getVenueType($data);
				echo $getVenueType; die;
			}
		}
		
		
		public static function getFoodType($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new VenueBookingModel();
				$getFoodType = $model->getFoodType($data);
				echo $getFoodType; die;
			}
		}
		
		
		
		public static function updatePhotoDragging($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new VenueBookingModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['vid']=cleanMe($b);
				$result    = $model1->updatePhotoDragging($data);
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		
		public static function deletePhoto($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new VenueBookingModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['vid']=cleanMe($b);
				$result    = $model1->deletePhoto($data);
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		
		public static function updatePhotoOrder($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new VenueBookingModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['vid']=cleanMe($b);
				$result    = $model1->updatePhotoOrder($data);
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		
		public static function getPhoto($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new VenueBookingModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['vid']=cleanMe($b);
				 
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		
		public static function getImageInfo($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new VenueBookingModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['vid']=cleanMe($b);
				 
				$result    = $model1->getImageInfo($data);
				echo $result; die;
				}
		}
		
		public static function updatePhotos($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new VenueBookingModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['vid']=cleanMe($b);
				$result    = $model1->updatePhotos($data);
				echo $result; die;
				}
		}
	}
?>