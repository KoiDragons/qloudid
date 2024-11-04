<?php
	
	require_once 'HotelStayModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class HotelStayController
	{
		
		public static function amenitiesLogInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				
				$companyDetail    = $model->companyDetail($data);
				$hotelDetailInfo    = $model->hotelDetailInfo($data);
				$row_summary    = $model->userSummary($data);
				require_once('HotelAmenitiesView.php');
			}
		}
		
		
		public static function bookingListForRoomAllocation($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model->companyDetail($data);
				$bookingDetail    = $model->bookingDetailForRoomAllocation($data);
				$row_summary    = $model->userSummary($data);
				require_once('HotelBookingInfoForRoomAllocationView.php');
			}
		} 
		
		
	 
		public static function guestRoomCheckinInfo($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['booking_id']=cleanMe($c);
				
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model->companyDetail($data);
				
				$bookingDetail    = $model->bookingDetailInfo($data);
				$dependentsCheckedInList    = $model->dependentsCheckedInList($data);
				$guestChildrenRemainingCount    = $model->guestChildrenRemainingCount($data);
				$adultsCheckedInList    = $model->adultsCheckedInList($data);
				//print_r($adultsCheckedInList); die;
				$guestAdultRemainingCount=$bookingDetail['guest_adult']-count($adultsCheckedInList);
				$row_summary    = $model->userSummary($data);
				require_once('HotelStayGuestCheckinView.php');
			}
		}
		
		
		public static function guestRoomCheckinUserInfo($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['booking_id']=cleanMe($c);
				
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model->companyDetail($data);
				
				$bookingDetail    = $model->bookingDetailInfo($data);
				$purchaserInfo    = $model->guestDetails($data);
				 
				$countryOptions    = $model->countryOptions();
				$countryCode    = $model->countryCode(); 
				$identificatorDetail    = $model->guestPassportDetails($data); 
				$row_summary    = $model->userSummary($data);
				require_once('HotelStayGuestCheckinUserInfoView.php');
			}
		}
		
		public static function guestRoomCheckinUserInfoTest($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['booking_id']=cleanMe($c);
				
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model->companyDetail($data);
				
				$bookingDetail    = $model->bookingDetailInfo($data);
				$purchaserInfo    = $model->guestDetails($data);
				 
				$countryOptions    = $model->countryOptions();
				$countryCode    = $model->countryCode(); 
				$identificatorDetail    = $model->guestPassportDetails($data); 
				$row_summary    = $model->userSummary($data);
				require_once('HotelStayGuestCheckinUserInfoView1.php');
			}
		}
		
		
		public static function guestRoomCheckinAdultInfo($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['booking_id']=cleanMe($c);
				
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model->companyDetail($data);
				
				$bookingDetail    = $model->bookingDetailInfo($data);
				$adultsCheckedInList    = $model->adultsCheckedInList($data);
				$guestAdultRemainingCount=$bookingDetail['guest_adult']-count($adultsCheckedInList);
				if($guestAdultRemainingCount==0)
				{
					header('location:../../../guestRoomCheckinInfo/'.$data['cid'].'/'.$data['lid'].'/'.$data['booking_id']); die;
				}
				$purchaserInfo    = $model->guestDetails($data);
				$countryOptions    = $model->countryOptions();
				$countryCode    = $model->countryCode(); 
				$identificatorDetail    = $model->guestPassportDetails($data); 
				$row_summary    = $model->userSummary($data);
				require_once('HotelStayGuestCheckinAddAdultInfoView.php');
			}
		}
		
		
		public static function guestRoomCheckinDependentList($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['booking_id']=cleanMe($c);
				
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model->companyDetail($data);
				
				$bookingDetail    = $model->bookingDetailInfo($data);
				$childrenCheckedInList    = $model->dependentsCheckedInList($data);
				$guestChildrenRemainingCount=$bookingDetail['guest_children']-count($childrenCheckedInList);
				if($guestChildrenRemainingCount==0)
				{
					header('location:../../../guestRoomCheckinInfo/'.$data['cid'].'/'.$data['lid'].'/'.$data['booking_id']); die;
				}
				$dependentsList    = $model->dependentsList($data); 
				$row_summary    = $model->userSummary($data);
				require_once('HotelStayDependentCheckinView.php');
			}
		}
		
		
		
		public static function checkUserDetail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new HotelStayModel();
				 
				$checkUserDetail    = $model->checkUserDetail($data);
				 echo $checkUserDetail; die;
			}
		}
		
		public static function addCheckinAdultInfo($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['booking_id']=cleanMe($c);
				require_once('../configs/testMandril.php');
				$addCheckinAdultInfo    = $model->addCheckinAdultInfo($data);
				header('location:../../../guestRoomCheckinInfo/'.$data['cid'].'/'.$data['lid'].'/'.$data['booking_id']); 
			}
		}
		public static function addGuestChildCheckinInfo($a=null, $b=null, $c=null, $d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['booking_id']=cleanMe($c);
				$data['child_id']=cleanMe($d);
				require_once('../configs/testMandril.php');
				$addGuestChildCheckinInfo    = $model->addGuestChildCheckinInfo($data);
				header('location:../../../../guestRoomCheckinInfo/'.$data['cid'].'/'.$data['lid'].'/'.$data['booking_id']); 
			}
		}
		
		public static function addGuestPassport($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['booking_id']=cleanMe($c);
				
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$addGuestPassport    = $model->addGuestPassport($data);
				 
				header('location:../../../guestRoomCheckinInfo/'.$data['cid'].'/'.$data['lid'].'/'.$data['booking_id']);
			}
		}
		
		
		public static function prefferedActionForCheckin($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['booking_id']=cleanMe($c);
				
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model->companyDetail($data);
				
				$bookingDetail    = $model->bookingDetailInfo($data);
			 
				$row_summary    = $model->userSummary($data);
				require_once('HotelStayPrefferedActionRoomAllocationView.php');
			}
		}
	
	
 public static function selectRoom($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['booking_id']=cleanMe($c);
				$availableRoomsDetail    = $model->availableRoomsDetailToday($data);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model->companyDetail($data);
				$bookingDetailInfo    = $model->bookingDetailInfo($data);
				$availableRoomsDetail    = $model->availableRoomsDetailToday($data);
				$availableAllocationRoomsDetail    = $model->availableRoomsForAllocationDetailToday($data);
				$row_summary    = $model->userSummary($data);
				require_once('HotelStayBookingRoomAvailableView.php');
			}
		}
	
	
	public static function selectRoomForAllocation($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['booking_id']=cleanMe($c);
				$availableRoomsDetail    = $model->availableRoomsDetailToday($data);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model->companyDetail($data);
				
				$availableRoomsDetail    = $model->availableRoomsForAllocationDetailToday($data);
				$row_summary    = $model->userSummary($data);
				require_once('HotelStayBookingInfoForRoomAllocationNotCleanedView.php');
			}
		}
	
		public static function updateRoomInfo($a=null , $b=null, $c=null,$d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['booking_id']=cleanMe($c); 
				$data['room_id']=cleanMe($d); 
				$model       = new HotelStayModel();
				$updateRoomInfo = $model->updateRoomInfo($data);	
				header("location:../../../../bookingListForRoomAllocation/".$data['cid']."/".$data['lid']);
			}	
		} 
		
		public static function updateCheckinInfo($a=null , $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['booking_id']=cleanMe($c); 
				$model       = new HotelStayModel();
				if(isset($_POST['personal_details_checked']))
				{
				$updateCheckinInfo = $model->updateCheckinInfo($data);		
				}
				header("location:../../../bookingListForRoomAllocation/".$data['cid']."/".$data['lid']);
			}	
		} 
		
		
		public static function wellnessList($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$selectIcon    = $model->selectIcon($data);
				$data['app_id']    = $model->wellnessappId();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model->companyDetail($data);
				$wellnessDetail    = $model->wellnessDetail($data);
				$wellnessCount    = $model->wellnessCount($data);
				$row_summary    = $model->userSummary($data);
				require_once('HotelWellnessView.php');
			}
		}
		public static function confirmWellness($a=null , $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['id']=cleanMe($c); 
				$model       = new HotelStayModel();
				$confirmWellness = $model->confirmWellness($data);	
				header("location:../../../wellnessList/".$data['cid']."/".$data['lid']);
			}	
		} 
		public static function moreWellnessDetail($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$model = new HotelStayModel();
				$moreWellnessDetail = $model->moreWellnessDetail($data);
				echo $moreWellnessDetail; die;
			}
		}
	public static function resturantList($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$selectIcon    = $model->selectIcon($data);
				$data['app_id']    = $model->restappId();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model->companyDetail($data);
				$resturantDetail    = $model->resturantDetail($data);
				$resturantCount    = $model->resturantCount($data);
				$row_summary    = $model->userSummary($data);
				require_once('HotelResturantView.php');
			}
		}
		
		
		public static function roomService($a=null, $b=null , $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['rid']=cleanMe($c);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$selectIcon    = $model->selectIcon($data);
				$data['app_id']    = $model->restappId();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$roomServiceInfo    = $model->roomServiceInfo($data);
				$data['room_service']=$roomServiceInfo['room_service_menu'];
				$companyDetail    = $model->companyDetail($data);
				$completeMenu    = $model->completeMenu($data);
				$resturantinfo    = $model->resturantinfo($data);
				$row_summary    = $model->userSummary($data);
				require_once('HotelRoomServiceView.php');
			}
		}
		public static function confirmResturant($a=null , $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['id']=cleanMe($c); 
				$model       = new HotelStayModel();
				$confirmResturant = $model->confirmResturant($data);	
				header("location:../../../resturantList/".$data['cid']."/".$data['lid']);
			}	
		} 
		
		public static function updateRoomservice($a=null , $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['id']=cleanMe($c); 
				$model       = new HotelStayModel();
				$updateRoomservice = $model->updateRoomservice($data);	
				header("location:../../../roomService/".$data['cid']."/".$data['lid']."/".$data['id']);
			}	
		} 
		
		public static function moreResturantDetail($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$model = new HotelStayModel();
				$moreResturantDetail = $model->moreResturantDetail($data);
				echo $moreResturantDetail; die;
			}
		}
		public static function locationInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$locationDetail    = $model->locationDetail($data);
				$locationCount    = $model->locationCount($data);
				$row_summary    = $model->userSummary($data);
				require_once('HotelStayView.php');
			}
		}
		
		public static function hotelInformation($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				
				$hotelAvailable    = $model->hotelAvailable($data);
				if($hotelAvailable==0)
				{
					$data['payment_info']='';
					$data['hotel_type']='';
					$data['room_info']='';
					$data['booking_type']=1;
				}
				else
				{
				$hotelInfo    = $model->hotelInfo($data);
				 
				$data['booking_type']=$hotelInfo['booking_checkin_type'];				
				$data['payment_info']=$hotelInfo['accepted_payments'];
				$data['hotel_type']=$hotelInfo['hotel_type'];
				$data['room_info']=$hotelInfo['room_type_available'];
				$data['languages_known']=substr($hotelInfo['languages_known'],0,-1);
				$data['nearest_airport']=substr($hotelInfo['nearest_airports'],0,-1);
				$data['accepted_currency']=substr($hotelInfo['accepted_currency'],0,-1);
				$data['loyalty_cards']=substr($hotelInfo['loyalty_cards'],0,-1);
				$workingHrs    = $model->workingHrs($data);	 
				$nearest_airports    = $model->nearestAirports($data);	
				$languagesKnown    = $model->languagesKnown($data);	
				$acceptedCurrency    = $model->acceptedCurrency($data);
				 
				$loyaltyCards    = $model->loyaltyCards($data);
				}
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$hotelCategory    = $model->hotelCategory($data);
				$hotelType    = $model->hotelType($data);
				$countryOption    = $model->countryOption($data);
				$hotelStars    = $model->hotelStars($data);
				//$airportInfo    = $model->airportInfo($data);
				$availableCurrency    = $model->availableCurrency($data);
				$worldLanguages    = $model->worldLanguages($data);
				$hotelRoomType    = $model->hotelRoomTypeSelected($data);
				$hotelImagesCount    = $model->hotelImagesCount($data);
				$hotelImages    = $model->hotelImages($data);
				$paymentType    = $model->paymentTypeSelected($data);
				$row_summary    = $model->userSummary($data);
				require_once('HotelDescriptionView.php');
			}
		}
		
		public static function roomDetailInformation($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['id']=cleanMe($c);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$hotelDetailInfo    = $model->hotelDetailInfo($data);
				$data['warning']=$hotelDetailInfo['hotel_kitchen_amenities'];
				$data['warning1']=$hotelDetailInfo['hotel_general_amenities'];
				$data['warning2']=$hotelDetailInfo['hotel_connectivity_amenities'];
				$data['warning3']=$hotelDetailInfo['hotel_bathroom_amenities'];
				$roomTypeDetail    = $model->roomTypeDetail($data);
				$roomTypeDetailImages    = $model->roomTypeDetailImages($data);
				$data['warning']=$data['warning'].''.$roomTypeDetail['kitchen_amenities_available'];
				$hotelKitchenAmenities    = $model->hotelKitchenAmenitiesRemaining($data);
				 
				$data['warning']=$data['warning1'].''.$roomTypeDetail['general_amenities_available'];
				$hotelGeneralAmenities    = $model->hotelGeneralAmenitiesRemaining($data);
				$data['warning']=$data['warning2'].''.$roomTypeDetail['connectivity_amenities_available'];
				$hotelConnectivityAmenities    = $model->hotelConnectivityAmenitiesRemaining($data);
				$data['warning']=$data['warning3'].''.$roomTypeDetail['bathroom_amenities_available'];
				$hotelBathroomAmenities    = $model->hotelBathroomAmenitiesRemaining($data);
				
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$hotelRoomBeddingType    = $model->hotelRoomBeddingType($data);
				$hotelRoomClass    = $model->hotelRoomClass($data);
				$countryOption    = $model->countryOption($data);
				$hotelRoomType    = $model->hotelRoomType($data);
				$row_summary    = $model->userSummary($data);
				require_once('HotelRoomDescriptionView.php');
			}
		}
		
		public static function editRoomDetailInformation($a=null, $b=null, $c=null, $d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['id']=cleanMe($c);
				$data['rid']=cleanMe($d);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$hotelDetailInfo    = $model->hotelDetailInfo($data);
				$data['warning']=$hotelDetailInfo['hotel_kitchen_amenities'];
				$data['warning1']=$hotelDetailInfo['hotel_general_amenities'];
				$data['warning2']=$hotelDetailInfo['hotel_connectivity_amenities'];
				$data['warning3']=$hotelDetailInfo['hotel_bathroom_amenities'];
				$roomDetail    = $model->roomDetailInfo($data);
				 
				$roomImages    = $model->roomImages($data);
				 
				$roomTypeDetail    = $model->roomTypeDetail($data);
				$roomTypeDetailImages    = $model->roomTypeDetailImages($data);
				$data['warning']=$data['warning'].''.$roomTypeDetail['kitchen_amenities_available'];
				$data['amenities']=$roomDetail['room_kitchen_amenities'];
				$hotelKitchenAmenities    = $model->hotelKitchenAmenitiesRemainingSelected($data);
				$data['amenities']=$roomDetail['room_general_amenities'];
				$data['warning']=$data['warning1'].''.$roomTypeDetail['general_amenities_available'];
				$hotelGeneralAmenities    = $model->hotelGeneralAmenitiesRemainingSelected($data);
				$data['warning']=$data['warning2'].''.$roomTypeDetail['connectivity_amenities_available'];
				$data['amenities']=$roomDetail['room_connectivity_amenities'];
				$hotelConnectivityAmenities    = $model->hotelConnectivityAmenitiesRemainingSelected($data);
				$data['warning']=$data['warning3'].''.$roomTypeDetail['bathroom_amenities_available'];
				$data['amenities']=$roomDetail['room_bathroom_amenities'];
				$hotelBathroomAmenities    = $model->hotelBathroomAmenitiesRemainingSelected($data);
				
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$hotelRoomBeddingType    = $model->hotelRoomBeddingType($data);
				$hotelRoomClass    = $model->hotelRoomClass($data);
				$countryOption    = $model->countryOption($data);
				$hotelRoomType    = $model->hotelRoomType($data);
				$row_summary    = $model->userSummary($data);
				require_once('HotelRoomEditDescriptionView.php');
			}
		}
		
		
		
		public static function roomTypeInformation($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$hotelDetailInfo    = $model->hotelDetailInfo($data);
				
				$data['warning']=$hotelDetailInfo['hotel_kitchen_amenities'];
				
				
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				
				$hotelKitchenAmenities    = $model->hotelKitchenAmenities($data);
				$hotelGeneralAmenities    = $model->hotelGeneralAmenities($data);
				$hotelConnectivityAmenities    = $model->hotelConnectivityAmenities($data);
				$hotelBathroomAmenities    = $model->hotelBathroomAmenities($data);
				
				$hotelRoomClass    = $model->hotelRoomClass($data);
				$countryOption    = $model->countryOption($data);
				$hotelRoomType    = $model->availableHotelRoomType($data);
				 
				$row_summary    = $model->userSummary($data);
				require_once('HotelRoomTypeDescriptionView.php');
			}
		}
		
		public static function editRoomTypeInformation($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['id']=cleanMe($c);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$hotelDetailInfo    = $model->hotelDetailInfo($data);
				$data['warning4']='';
				$data['warning1']='';
				$data['warning2']='';
				$data['warning3']='';
				
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$roomTypeDetail    = $model->roomTypeDetail($data);
				$roomTypeDetailImages    = $model->roomTypeDetailImages($data);
				$roomTypeDetailImagesCount    = $model->roomTypeDetailImagesCount($data);
				$data['warning']=$roomTypeDetail['kitchen_amenities_available'];
				$hotelKitchenAmenities    = $model->hotelKitchenAmenitiesSelected($data);
				$data['warning']=$roomTypeDetail['general_amenities_available'];
				$hotelGeneralAmenities    = $model->hotelGeneralAmenitiesSelected($data);
				$data['warning']=$roomTypeDetail['connectivity_amenities_available'];
				$hotelConnectivityAmenities    = $model->hotelConnectivityAmenitiesSelected($data);
				$data['warning']=$roomTypeDetail['bathroom_amenities_available'];
				$hotelBathroomAmenities    = $model->hotelBathroomAmenitiesSelected($data);
				$hotelRoomClass    = $model->hotelRoomClass($data);
				$countryOption    = $model->countryOption($data);
				$hotelRoomType    = $model->hotelRoomType($data);
				$row_summary    = $model->userSummary($data);
				require_once('HotelRoomTypeEditDescriptionView.php');
			}
		}
		
		public static function roomsList($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				if(isset($c))
				{
				$data['id']=cleanMe($c);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$data['app_id']    = $model->restappId();
				$roomTypeDetail    = $model->roomTypeDetail($data);
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				$hotelDetailInfo    = $model->hotelDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$roomDetail    = $model->roomDetail($data);
				$roomCount    = $model->roomCount($data); 
				$teamCount    = $model->teamCount($data); 
				$teamList    = $model->teamList($data); 
				$row_summary    = $model->userSummary($data);
				require_once('HotelRoomView.php');	
				}
				else
				{
					header('location:https://www.qloudid.com/company/index.php/HotelStay/roomsTypeList/'.$data['cid'].'/'.$data['lid']);
				}
				
			}
		}
		 
		 public static function roomsTypeList($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$data['app_id']    = $model->restappId();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				$hotelDetailInfo    = $model->hotelDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$roomDetail    = $model->roomTypeList($data);
				$roomCount    = $model->roomTypeCount($data); 
				if($roomCount['num']==0)
				{
					header("location:../../roomTypeInformation/".$data['cid']."/".$data['lid']); die;
				}
				$teamCount    = $model->teamCount($data); 
				$teamList    = $model->teamList($data); 
				$row_summary    = $model->userSummary($data);
				require_once('HotelRoomTypeListView.php');
			}
		}
		 
		 
		public static function instaBoxes($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$data['app_id']    = $model->restappId();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				$hotelDetailInfo    = $model->hotelDetailInfo($data);
				 
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				require_once('../lib/url_shortener.php');
				$staffVerificationLink    = $model->staffVerificationLink($hotelDetailInfo);
				$row_summary    = $model->userSummary($data);
				require_once('HotelInsraBoxesView.php');
			}
		} 
		
		
		public static function updateInstaBoxes($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$updateInstaBoxes    = $model->updateInstaBoxes($data);
				header('location:../../roomsTypeList/'.$data['cid'].'/'.$data['lid']);
			}
		} 
		 
		 public static function checkInDetail($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$hotelDetailInfo    = $model->hotelDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$hotelCheckInDetailInfo    = $model->hotelCheckInDetailInfo($data); 
				$row_summary    = $model->userSummary($data);
				require_once('HotelRoomCheckInInfoView.php');
			}
		}
		 
		 public static function teamDetail($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$hotelDetailInfo    = $model->hotelDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$hotelEmployees    = $model->hotelEmployees($data); 
				 
				$row_summary    = $model->userSummary($data);
				require_once('HotelTeamInfoView.php');
			}
		}
		  
		 	 public static function amenitiesDetail($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$hotelDetailInfo    = $model->hotelDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$data['warning']=$hotelDetailInfo['hotel_kitchen_amenities'];
				$hotelKitchenAmenities    = $model->hotelKitchenAmenitiesSelectedBasic($data);
				$data['warning']=$hotelDetailInfo['hotel_general_amenities'];
				$hotelGeneralAmenities    = $model->hotelGeneralAmenitiesSelectedBasic($data);
				$data['warning']=$hotelDetailInfo['hotel_connectivity_amenities'];
				$hotelConnectivityAmenities    = $model->hotelConnectivityAmenitiesSelectedBasic($data);
				$data['warning']=$hotelDetailInfo['hotel_bathroom_amenities'];
				$hotelBathroomAmenities    = $model->hotelBathroomAmenitiesSelectedBasic($data);
				$row_summary    = $model->userSummary($data);
				require_once('HotelRoomAmenitiesInfoView.php');
			}
		}
		  
	public static function alotRoom($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['rid']=cleanMe($c);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$hotelDetailInfo    = $model->hotelDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$countryOption    = $model->countryOption($data);
				$row_summary    = $model->userSummary($data);
				require_once('HotelRoomCheckinView.php');
			}
		}
		
public static function teamListing($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new HotelStayModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['team_id']=cleanMe($c);
				$data['app_id']    = $model->appId();
				$data['t_id']    = $model->teamId($data);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					header('location:../../../../Brand/productPage/'.$data['cid'].'/SkU5SlhYcEFJNkx4UEJNb1k2Q3BQdz09');
					die;
				}
				$hotelDetailInfo    = $model->hotelDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$teamEmployeesList    = $model->teamEmployeesList($data);
				$teamList    = $model->teamList($data);
			//	echo '<pre>'; print_r($teamList); echo '</pre>'; die;
				$row_summary    = $model->userSummary($data);
				require_once('HotelTeamListView.php');
			}
		}
		
		 
		public static function moreRoomDetail($a=null , $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['id']=cleanMe($c);
				$model = new HotelStayModel();
				$moreRoomDetail = $model->moreRoomDetail($data);
				echo $moreRoomDetail; die;
			}
		}
		 
			public static function moreLocationDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new HotelStayModel();
				$moreLocationDetail = $model->moreLocationDetail($data);
				echo $moreLocationDetail; die;
			}
		}
		
		public static function addHotelDetail($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				require_once('../configs/testMandril.php');
				$model       = new HotelStayModel();
				$addHotelDetail = $model->addHotelDetail($data);	
				header("location:../../locationInformation/".$data['cid']);
			}	
		} 
		
		public static function updateHotelDetail($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				require_once('../configs/testMandril.php');
				$model       = new HotelStayModel();
				//$hotelInfo    = $model->hotelInfo($data);
				//print_r($hotelInfo); die;
				$updateHotelDetail = $model->updateHotelDetail($data);	
				header("location:../../locationInformation/".$data['cid']);
			}	
		}
		public static function getAirports()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				 
				$data['filter']=cleanMe($_GET['filter']);
				$model = new HotelStayModel();
				
				$getAirports=$model->getAirports($data);
				
				echo $getAirports;
				
			}
		}
		
		public static function getAirportValues()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				 
				$model = new HotelStayModel();
				
				$getAirportValues=$model->getAirportValues();
				
				echo $getAirportValues;
				
			}
		}
		
		
		public static function getCurrency()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				 
				$data['filter']=cleanMe($_GET['filter']);
				$model = new HotelStayModel();
				
				$getCurrency=$model->getCurrency($data);
				
				echo $getCurrency;
				
			}
		}
		
		public static function getCards()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				 
				$data['filter']=cleanMe($_GET['filter']);
				$model = new HotelStayModel();
				
				$getCards=$model->getCards($data);
				
				echo $getCards;
				
			}
		}
		
		public static function getLanguages()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				 
				$data['filter']=cleanMe($_GET['filter']);
				$model = new HotelStayModel();
				
				$getLanguages=$model->getLanguages($data);
				
				echo $getLanguages;
				
			}
		}
		
		
		public static function addTeam($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				 
				$model       = new HotelStayModel();
				$addTeam = $model->addTeam($data);	
				 
				header("location:../../teamListing/".$data['cid']."/".$data['lid']."/".$addTeam);
				} 
		} 
		
		public static function addCheckInInfo($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				require_once('../configs/testMandril.php');
				$model       = new HotelStayModel();
				$addCheckInInfo = $model->addCheckInInfo($data);	
				header("location:../../roomsList/".$data['cid']."/".$data['lid']);
			}	
		} 
		
			public static function addAmenitiesDetail($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				require_once('../configs/testMandril.php');
				$model       = new HotelStayModel();
				$addAmenitiesDetail = $model->addAmenitiesDetail($data);	
				header("location:../../roomsTypeList/".$data['cid']."/".$data['lid']);
			}	
		} 
		
		
		public static function addRoomDetail($a=null , $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['id']=cleanMe($c);
				$model       = new HotelStayModel();
				$addRoomDetail = $model->addRoomDetail($data);	
				header("location:../../../roomsList/".$data['cid']."/".$data['lid']."/".$data['id']);
			}	
		}	
			public static function updateRoomDetail($a=null , $b=null, $c=null, $d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['id']=cleanMe($c);
				$data['rid']=cleanMe($d);
				$model       = new HotelStayModel();
				$updateRoomDetail = $model->updateRoomDetail($data);	
				header("location:../../../../roomsList/".$data['cid']."/".$data['lid']."/".$data['id']);
			}
		}
		
		
		public static function addRoomTypeDetail($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$model       = new HotelStayModel();
				$addRoomTypeDetail = $model->addRoomTypeDetail($data);	
				header("location:../../roomsTypeList/".$data['cid']."/".$data['lid']);
			}	
		}
		
		public static function editRoomTypeDetail($a=null , $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['id']=cleanMe($c);
				$model       = new HotelStayModel();
				$editRoomTypeDetail = $model->editRoomTypeDetail($data);	
				header("location:../../../roomsTypeList/".$data['cid']."/".$data['lid']);
			}	
		}
		
		public static function addGuestInfo($a=null , $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['rid']=cleanMe($c);
				include('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$model       = new HotelStayModel();
				$addGuestInfo = $model->addGuestInfo($data);	
				header("location:../../../roomsList/".$data['cid']."/".$data['lid']);
			}	
		}
		
		public static function checkUserQloudInfo()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				 $model = new HotelStayModel();
				$checkUserQloudInfo = $model->checkUserQloudInfo();
				echo $checkUserQloudInfo; die;
			}
		}
		
	}
?>