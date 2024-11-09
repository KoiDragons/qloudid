<?php
	
	require_once 'BookingServicesModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class BookingServicesController
	{
		public static function listVenues($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				  
				$model       = new BookingServicesModel();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
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
				$row_summary    = $model->userSummary($data);
				require_once('BookingServicesVenueBookingView.php');
			}
		}
		
		
		public static function getSidebar($a=null, $b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['venue_id']=cleanMe($b);
				$result    = $model1->getSidebar($data);
				 
				echo $result; die;
				}
		}
		
		public static function getNewCalander($a=null, $b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['venue_id']=cleanMe($b);
				$data['time']=$_POST['updateShow'];
				$result    = $model1->getCalender($data);
				 
				echo $result; die;
				}
		}
		
		
		public static function updateNextCalender($a=null, $b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['venue_id']=cleanMe($b);
				$t=	strtotime("+".$_POST['updateValue']." months", strtotime($_POST['updateShow']));
				$cur=strtotime(date('Y-m-d'));
				if($t<$cur)
				{
				$data['time']=date('Y-m-d');	
				}
				else
				{
				$data['time']=date('Y-m-d', $t);	
				}
				
				$result    = $model1->getCalender($data);
				 
				echo $result; die;
				}
		}
		
		
		public static function updateSelectedCancle($a=null, $b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['venue_id']=cleanMe($b);
				$data['time']=$_POST['updateShow'];	
				$result    = $model1->getCalender($data);
				echo $result; die;
				}
		}
		
		public static function updateSelectedBlock($a=null, $b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['venue_id']=cleanMe($b);
				if($_POST['show_property']==1)
				{
					$result    = $model1->updateAvailable($data);
				}
				else
				{
					$result    = $model1->updateBlocked($data);
				
				}
				$data['time']=date('Y-m-d');
				$result    = $model1->getCalender($data);
				echo $result; die;
				}
		}
		
		public static function getRangeCalander($a=null, $b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['venue_id']=cleanMe($b);
				$startDay=explode('-',$_POST['startDate']);
				$data['time']=date('Y-m-d', strtotime($startDay[0].'-'.$startDay[1].'-01'));
				$result    = $model1->getRangeCalander($data);
				 
				echo $result; die;
				}
		}
		
		public static function getRange($a=null, $b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$startDate=	strtotime($_POST['startDate']);
				$endDate=strtotime($_POST['endDate']);
				$range='';
				while($startDate<=$endDate)
				{
				$range=$range.$startDate.',';
				$startDate=	strtotime("+1 days", $startDate);
				}
				 
				echo $range; die;
				}
		}
		
		 public static function venueAvailableBookingDateInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['venue_id']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$data['time']=date('Y-m-d');
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
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
				$companyDetail    = $model->companyDetail($data);
				 
				$getCalender    = $model->getCalender($data);
				$row_summary    = $model->userSummary($data);
				require_once('BookingServicesVenueAvailableBookingDatesView.php');
			}
		}
	 
	 
		 public static function venueSelectUpdateServiceInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['venue_id']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$data['time']=date('Y-m-d');
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$venueInformationDetail    = $model->venueInformationDetail($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('BookingServicesVenueInfoUpdateView.php');
			}
		}
	 
	 	 public static function venueAvailableBookingHoursInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['venue_id']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$data['time']=date('Y-m-d');
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$venueInformationDetail    = $model->venueInformationDetail($data);
				$venueWorkingInformationDetail    = $model->venueWorkingInformationDetail($data);
				$workingHrs    = $model->workingHrs($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('BookingServicesVenueOpeningInfoUpdateView.php');
			}
		}
	 
		 public static function editWorkingTimeInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['venue_id']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$data['time']=date('Y-m-d');
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				 
				$editWorkingTimeInfo    = $model->editWorkingTimeInfo($data);
				header('location:../../venueAvailableBookingHoursInfo/'.$data['cid'].'/'.$data['venue_id']);
			}
		}
	 
		public static function resturantList($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
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
				$row_summary    = $model->userSummary($data);
				$resturantDetail    = $model->resturantDetail($data);
				$resturantCount    = $model->resturantCount($data);
				require_once('BookingServicesResturantListView.php');
			}
		}
		
		 public static function serveBookingInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
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
				$companyDetail    = $model->companyDetail($data);
				 
				$resturantWorkCount    = $model->resturantWorkCount($data);
				$resturantinfo   = $model->resturantInfo($data); 
				$workingHrs    = $model->workingHrs($data);
				$row_summary    = $model->userSummary($data);
				require_once('ResturantServeBookingInfoView.php');
			}
		}
	 
	 
	 public static function addDiningHall($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($co);
				$result    = $model1->addDiningHall($data);
				$result    = $model1->resturantDiningDetail($data);
				echo $result; die;
				}
		}
	 public static function deleteDiningHallTableInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($co);
				$result    = $model1->deleteDiningHallTableInfo($data);
				if($result==1)
				{
				$result    = $model1->resturantDiningDetail($data);	
				}
				
				echo $result; die;
				}
		}
		
		public static function resturantDiningCount($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($co);
				$result    = $model1->resturantDiningCount($data);
				echo $result; die;
				}
		}
		
		public static function deleteDiningHall($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($co);
				$result    = $model1->deleteDiningHall($data);
				if($result==1)
				{
				$result    = $model1->resturantDiningDetail($data);	
				}
				
				echo $result; die;
				}
		}
		
		
		public static function addTableToHall($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($co);
				$result    = $model1->addTableToHall($data);
				echo $result; die;
				}
		}
		
		public static function updateTableTypeInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($co);
				$result    = $model1->updateTableTypeInfo($data);
				echo $result; die;
				}
		}
		
		
		public static function updateDiningHallName($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($co);
				$result    = $model1->updateDiningHallName($data);
				if($result==1)
				{
				$result    = $model1->resturantDiningDetail($data);	
				}
				
				echo $result; die;
				}
		}
		
		 public static function tableReservationRequestList($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$checkPermission    = $model->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:https://www.safeqloud.com/user/index.php/NewsfeedDetail");
				}
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				 
				$resturantWorkCount    = $model->resturantWorkCount($data);
				$resturantinfo   = $model->resturantInfo($data); 
				$reservationList    = $model->reservationList($data);
				$reservationListCount    = $model->reservationListCount($data);
				$row_summary    = $model->userSummary($data);
				require_once('ResturantTableBookingListView.php');
			}
		}
	 
		 public static function tableReservationConfirmedList($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$checkPermission    = $model->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:https://www.safeqloud.com/user/index.php/NewsfeedDetail");
				}
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				 
				$resturantWorkCount    = $model->resturantWorkCount($data);
				$resturantinfo   = $model->resturantInfo($data); 
				$reservationList    = $model->reservationConfirmedList($data);
				$reservationListCount    = $model->reservationConfirmedListCount($data);
				$row_summary    = $model->userSummary($data);
				require_once('ResturantTableBookingConfirmedListView.php');
			}
		}
	 
	 public static function moreReservationList($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$model = new BookingServicesModel();
				$moreReservationList = $model->moreReservationList($data);
				echo $moreReservationList; die;
			}
		}
		
		public static function moreReservationConfirmedList($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$model = new BookingServicesModel();
				$moreReservationConfirmedList = $model->moreReservationConfirmedList($data);
				echo $moreReservationConfirmedList; die;
			}
		}
		
		 public static function selectTables($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['resid']=cleanMe($c);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$checkPermission    = $model->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:https://www.safeqloud.com/user/index.php/NewsfeedDetail");
				}
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				 
				$resturantWorkCount    = $model->resturantWorkCount($data);
				$resturantinfo   = $model->resturantInfo($data); 
				$reservationInfo   = $model->reservationInfo($data);
				$data['dining_hall']=$reservationInfo['dining_hall_id'];
				$diningHallTableDetail    = $model->diningHallTableDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('ResturantTableAvailabilityListView.php');
			}
		}
	 
		public static function updateTable($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['rid']=cleanMe($a);
				$data['resid']=cleanMe($b);
				$model = new BookingServicesModel();
				$updateTable = $model->updateTable($data);
				echo $updateTable; die;
			}
		}
		public static function checkTableCapacity($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['rid']=cleanMe($a);
				$model = new BookingServicesModel();
				$checkTableCapacity = $model->checkTableCapacity($data);
				echo $checkTableCapacity; die;
			}
		}
	 public static function editBookingTimeInfo($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$model       = new BookingServicesModel();
				$editBookingTimeInfo = $model->editBookingTimeInfo($data);	
				header("location:../../serveBookingInfo/".$data['cid']."/".$data['rid']);
			}	
		}
		
		public static function bookingConfirmation($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['resid']=cleanMe($c);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
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
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$bookingConfirmation    = $model->bookingConfirmation($data);
				 
				header('location:../../../tableReservationRequestList/'.$data['cid'].'/'.$data['rid']);
			}
		}
	 
	  public static function bookingReject($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['resid']=cleanMe($c);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
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
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$bookingReject    = $model->bookingReject($data);
				 
				header('location:../../../tableReservationRequestList/'.$data['cid'].'/'.$data['rid']);
			}
		}
	 
	 
		public static function moreResturantDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new BookingServicesModel();
				$moreResturantDetail = $model->moreResturantDetail($data);
				echo $moreResturantDetail; die;
			}
		}
		
		public static function diningHallInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
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
				$companyDetail    = $model->companyDetail($data);
				$resturantDiningDetail    = $model->resturantDiningDetail($data);
				$resturantDiningCount    = $model->resturantDiningCount($data);
				$row_summary    = $model->userSummary($data);
				require_once('ResturantDiningHallInfoView.php');
			}
		}
		
		
		
		
		public static function serviceList($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
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
				$row_summary    = $model->userSummary($data);
				require_once('BookingServicesView.php');
			}
		}
		
		
		public static function serviceBookingRules($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
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
				$workingHrs    = $model->workingHrs($data);
				require_once('BookingServicesCompanyRulesView.php');
			}
		}
		
		
		public static function updateServiceBookingRules($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$updateServiceBookingRules    = $model->updateServiceBookingRules($data);
				header('location:../serviceList/'.$data['cid']);
			}
		}
		
		
		public static function employeeList($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
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
				$employeeDetail    = $model->employeeDetail($data);
				$employeesCount    = $model->employeesCount($data);
				$row_summary    = $model->userSummary($data);
				require_once('BookingServicesEmployeesView.php');
			}
		}
		
		public static function bookableServiceList($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
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
				$dishesList    = $model->dishesList($data);
				$row_summary    = $model->userSummary($data);
				require_once('BookingServicesActivationView.php');
			}
		}
		
		
		
		public static function updateBookingRules($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new BookingServicesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['eid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
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
				$companyDetail    = $model->companyDetail($data);
				$bookingRulesInfo    = $model->bookingRulesInfo($data);
				$row_summary    = $model->userSummary($data);
				require_once('BookingServicesEmployeeRuleView.php');
			}
		}
		  
		public static function moreEmployeesDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new BookingServicesModel();
				$moreEmployeesDetail = $model->moreEmployeesDetail($data);
				echo $moreEmployeesDetail; die;
			}
		}
		 
		public static function updateBookingRulesInfo($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['eid']=cleanMe($b);
				$model       = new BookingServicesModel();
				$updateBookingRulesInfo = $model->updateBookingRulesInfo($data);	
				header("location:../../employeeList/".$data['cid']);
			}	
		}
		
		public static function updateStatus($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['did']=cleanMe($b);
				$model       = new BookingServicesModel();
				$updateStatus = $model->updateStatus($data);	
				header("location:../../bookableServiceList/".$data['cid']);
			}	
		}
	}
?>