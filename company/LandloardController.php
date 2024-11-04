<?php
	
	require_once 'LandloardModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class LandloardController
	{
		
		public static function refineApartment($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
			  $model1       = new LandloardModel();
					$data=array();
					$model1       = new LandloardModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
					  
					 $urlDetail    = $model1->urlDetail($data);
					header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
			} else {
				$path = "../../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['aid']=cleanMe($c);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new EmployeeCheckController();
					$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
						header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new LandloardModel();
				$data['app_id']    = $model1->appId();
					$model3       = new DaycarePricePlanModel();
					$appdownloadStatus    = $model3->appdownloadStatus($data);
					if($appdownloadStatus==0)
					{
						$getPermissionDetail    = $model1->getPermissionDetail($data);
						header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
						die;
					}
				$unrefinedApartmentDetail    = $model1->unrefinedApartmentDetail($data); 
				$portList    = $model1->buildingPortList($data); 
				 
				require_once('LandloardBuildingApartmentsRefineView.php');
		}
		}
		
			public static function updateUnrefineApartment($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
			  $model1       = new LandloardModel();
					$data=array();
					$model1       = new LandloardModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
					  
					 $urlDetail    = $model1->urlDetail($data);
					header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
			} else {
				$path = "../../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['aid']=cleanMe($c);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new EmployeeCheckController();
					$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
						header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new LandloardModel();
				$data['app_id']    = $model1->appId();
					$model3       = new DaycarePricePlanModel();
					$appdownloadStatus    = $model3->appdownloadStatus($data);
					if($appdownloadStatus==0)
					{
						$getPermissionDetail    = $model1->getPermissionDetail($data);
						header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
						die;
					}
				$updateUnrefineApartment    = $model1->updateUnrefineApartment($data); 
				header('location:../../../listImportedProperties/'.$data['cid'].'/'.$data['bid']);
		}
		}
		
		
		public static function listLandloardBuildingApartment($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
			  $model1       = new LandloardModel();
					$data=array();
					$model1       = new LandloardModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
					  
					 $urlDetail    = $model1->urlDetail($data);
					header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
			} else {
				$path = "../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new EmployeeCheckController();
					$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
						header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new LandloardModel();
				$data['app_id']    = $model1->appId();
					$model3       = new DaycarePricePlanModel();
					$appdownloadStatus    = $model3->appdownloadStatus($data);
					if($appdownloadStatus==0)
					{
						$getPermissionDetail    = $model1->getPermissionDetail($data);
						header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
						die;
					}
				$getLandloardApartmentPropertyList    = $model1->getLandloardApartmentPropertyList($data); 
				$getLandloardBuildingDetails    = $model1->getLandloardBuildingDetails($data); 
				$getLandloardBuildingImages    = $model1->getLandloardBuildingImages($data); 
				 
				require_once('LandloardBuildingApartmentsListView.php');
		}
		}
		
		public static function listLandloardReservedApartment($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
			  $model1       = new LandloardModel();
					$data=array();
					$model1       = new LandloardModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
					  
					 $urlDetail    = $model1->urlDetail($data);
					header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
			} else {
				$path = "../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new EmployeeCheckController();
					$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
						header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new LandloardModel();
				$data['app_id']    = $model1->appId();
					$model3       = new DaycarePricePlanModel();
					$appdownloadStatus    = $model3->appdownloadStatus($data);
					if($appdownloadStatus==0)
					{
						$getPermissionDetail    = $model1->getPermissionDetail($data);
						header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
						die;
					}
				$getLandloardApartmentPropertyList    = $model1->getLandloardApartmentReservedPropertyList($data); 
				$getLandloardBuildingDetails    = $model1->getLandloardBuildingDetails($data); 
				$getLandloardBuildingImages    = $model1->getLandloardBuildingImages($data); 
				 
				require_once('LandloardBuildingApartmentsReservedListView.php');
		}
		}
		
		
		public static function reserveLandloardApartment($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
			  $model1       = new LandloardModel();
					$data=array();
					$model1       = new LandloardModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
					  
					 $urlDetail    = $model1->urlDetail($data);
					header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
			} else {
				$path = "../../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['aid']=cleanMe($c);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new EmployeeCheckController();
					$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
						header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new LandloardModel();
				$data['app_id']    = $model1->appId();
					$model3       = new DaycarePricePlanModel();
					$appdownloadStatus    = $model3->appdownloadStatus($data);
					if($appdownloadStatus==0)
					{
						$getPermissionDetail    = $model1->getPermissionDetail($data);
						header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
						die;
					}
				$getLandloardApartmentPropertyList    = $model1->getLandloardApartmentPropertyList($data); 
				$getLandloardBuildingDetails    = $model1->getLandloardBuildingDetails($data); 
				$getLandloardBuildingImages    = $model1->getLandloardBuildingImages($data); 
				 
				require_once('LandloardBuildingApartmentsReservationDetailView.php');
		}
		}
		
		public static function updateReservationApartment($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
			  $model1       = new LandloardModel();
					$data=array();
					$model1       = new LandloardModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
					  
					 $urlDetail    = $model1->urlDetail($data);
					header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
			} else {
				$path = "../../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['aid']=cleanMe($c);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new EmployeeCheckController();
					$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
						header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new LandloardModel();
				$data['app_id']    = $model1->appId();
					$model3       = new DaycarePricePlanModel();
					$appdownloadStatus    = $model3->appdownloadStatus($data);
					if($appdownloadStatus==0)
					{
						$getPermissionDetail    = $model1->getPermissionDetail($data);
						header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
						die;
					}
				$updateReservationApartment    = $model1->updateReservationApartment($data); 
				 header('location:../../../listLandloardBuildingApartment/'.$data['cid'].'/'.$data['bid']);
		}
		}
		
		
		
		public static function apartmentConnectApproveInfo($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
					$model       = new LandloardModel();
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				$model1       = new LandloardModel();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$connectRequestDetailInfo    = $model1->connectRequestDetailInfo($data);
				$data['bid']=$connectRequestDetailInfo['bid'];
				$servicePriceList    = $model1->servicePriceList($data);
				$getApartmentForSeelctedFloor    = $model1->getApartmentForSeelctedFloor($data);
				$companyDetail    = $model1->companyDetail($data);
				require_once('LandloardBuildingApartmentConnectApproveInfoView.php');
			}
		}
		
		public static function approveConnectApartmentRequest($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$model = new LandloardModel();
				$approveConnectApartmentRequest = $model->approveConnectApartmentRequest($data);
				header('location:../../apartmentConnectRejectedRequest/'.$data['cid']);
			}
		}
		public static function rejectConnectApartmentRequest($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$model = new LandloardModel();
				$rejectConnectApartmentRequest = $model->rejectConnectApartmentRequest($data);
				header('location:../../apartmentConnectRejectedRequest/'.$data['cid']);
			}
		}
		public static function apartmentConnectRejectedRequest($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
					$model       = new LandloardModel();
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['app_id']    = $model->appId();
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				$model1       = new LandloardModel();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model1->companyDetail($data);
				$apartmentConnectRequestReceived    = $model1->apartmentConnectRequestRejected($data);
				require_once('LandloardBuildingUserApartmentConnectRejectRequestListView.php');
			}
		}
		
		public static function apartmentConnectRequest($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
					$model       = new LandloardModel();
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['app_id']    = $model->appId();
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				$model1       = new LandloardModel();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model1->companyDetail($data);
				$apartmentConnectRequestReceived    = $model1->apartmentConnectRequestReceived($data);
				require_once('LandloardBuildingUserApartmentConnectRequestListView.php');
			}
		}
		
		
		public static function verifyRequstDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
					$model       = new LandloardModel();
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['app_id']    = $model->appId();
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				$model1       = new LandloardModel();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				
				if(isset($_POST))
				{
				$companyDetail    = $model1->companyDetail($data);
				$buildingList    = $model1->buildingList($data);
				$apartmentRequestDetail    = $model1->apartmentRequestDetail($data);
				$data['rid']=$apartmentRequestDetail['rid'];
				$countryCode    = $model1->countryCode($data); 
				$countryOptions    = $model1->countryOptions($data); 
				require_once('LandloardBuildingUserApartmentConnectRequestDetailView.php');	
				}
				else
				{
					header('location:../fetchRequestDetail/'.$data['cid']);
				}
				
			}
		}
		
		public static function fetchRequestDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
					$model       = new LandloardModel();
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['app_id']    = $model->appId();
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				$model1       = new LandloardModel();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				require_once('LandloardBuildingUserApartmentRequestCodeInfoView.php');	
				
			}
		}
		public static function checkRequestInfo()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$result    = $model1->checkRequestInfo();
				if(empty($result))
				echo 0; 
				else
				echo 1; 
				}
		}
		
		public static function getPorts($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
			  echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model = new LandloardModel();
				$getPorts    = $model->getPorts($data); 
				echo $getPorts; die;
			}
		}
		
		
		public static function getService($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
			  echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model = new LandloardModel();
				$getPorts    = $model->getService($data); 
				echo $getPorts; die;
			}
		}
		
		
		public static function getFloors($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
			  echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model = new LandloardModel();
				$getFloors    = $model->getFloors($data); 
				echo $getFloors; die;
			}
		}
		
		public static function getApartment($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
			  echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model = new LandloardModel();
				$getApartment    = $model->getApartment($data); 
				echo $getApartment; die;
			}
		}
		
		
		public static function approveApartmentRequest($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
			  echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model = new LandloardModel();
				$approveApartmentRequest    = $model->approveApartmentRequest($data); 
				header('location:../../CompanySuppliers/companyAccount/'.$data['cid']);
			}
		}
		public static function rejectApartmentRequest($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
			  echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$model = new LandloardModel();
				$rejectApartmentRequest    = $model->rejectApartmentRequest($data); 
				header('location:../../../CompanySuppliers/companyAccount/'.$data['cid']);
			}
		}
		
		public static function publishAmenities($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
					$model       = new LandloardModel();
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b); 
				$data['app_id']    = $model->appId();
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				$model1       = new LandloardModel();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model1->buildingDetailInfo($data);
				$companyDetail    = $model1->companyDetail($data);
				$buildingsAvailableAmenitiesInfo    = $model1->buildingsAvailableAmenitiesInfo($data);
				require_once('LandloardBuildingAmenityPublishInfoView.php');
			}
		}
		
		
		public static function updateBuildingAmenityDisplay()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$result    = $model1->updateBuildingAmenityDisplay();
				echo $result; die;
				}
		}
		
		public static function editParkingDetail($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
					$model       = new LandloardModel();
				$path = "../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b); 
				$data['pid']=cleanMe($c); 
				$data['app_id']    = $model->appId();
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				$model1       = new LandloardModel();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model1->buildingDetailInfo($data);
				if($buildingDetailInfo['garage_available']==0) {
					header('location:../../../buildingAddinsInfo/'.$data['cid'].'/'.$data['bid']); die;
				}
				if($buildingDetailInfo['parking_activated']==0) {
					header('location:../../../activateParking/'.$data['cid'].'/'.$data['bid']); die;
				}
				$data['port_id']='';
				$companyDetail    = $model1->companyDetail($data);
				$selectedParkingPlaceInfo    = $model1->selectedParkingPlaceInfo($data);
			 
				require_once('LandloardBuildingParkingEditInfoView.php');
			}
		}
		
		public static function activateParking($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
					$model       = new LandloardModel();
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b); 
				$data['app_id']    = $model->appId();
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				$model1       = new LandloardModel();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model1->buildingDetailInfo($data);
				if($buildingDetailInfo['garage_available']==0) {
					header('location:../../buildingAddinsInfo/'.$data['cid'].'/'.$data['bid']); die;
				}
				if($buildingDetailInfo['parking_activated']==1) {
					header('location:../../listParking/'.$data['cid'].'/'.$data['bid']); die;
				}					
				$data['port_id']='';
				$companyDetail    = $model1->companyDetail($data);
				$buildingSelectMultiPortInfo    = $model1->buildingSelectMultiPortInfo($data);
				$tenantInvoiceIds    = $model1->tenantInvoiceIds($data);
			 
				require_once('LandloardBuildingParkingInfoView.php');
			}
		}
		
		public static function listParking($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
					$model       = new LandloardModel();
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b); 
				$data['app_id']    = $model->appId();
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				$model1       = new LandloardModel();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model1->buildingDetailInfo($data);
				if($buildingDetailInfo['garage_available']==0) {
					header('location:../../buildingAddinsInfo/'.$data['cid'].'/'.$data['bid']); die;
				}
				if($buildingDetailInfo['parking_activated']==0) {
					header('location:../../activateParking/'.$data['cid'].'/'.$data['bid']); die;
				}
				$data['port_id']='';
				$companyDetail    = $model1->companyDetail($data);
				$parkingPlaces    = $model1->parkingPlaces($data);
			 
				require_once('LandloardBuildingParkingListView.php');
			}
		}
		
			public static function updatePortDetail($a=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($a);
				$data['port_id']=$_POST['port_id'];
				 
				$result    = $model1->buildingSelectMultiPortInfo($data);
				echo $result; die;
				}
		}
		
		
		 public static function listTenantForInvoice($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
					$model       = new LandloardModel();
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b); 
				$data['app_id']    = $model->appId();
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				$model1       = new LandloardModel();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model1->companyDetail($data);
				$tenantInvoiceList    = $model1->tenantInvoiceList($data);
				$tenantInvoiceIds    = $model1->tenantInvoiceIds($data);
			 
				require_once('LandloardBuildingTenantInvoiceListView.php');
			}
		}
		
		 public static function listFloorAvailableAmenities($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
					$model       = new LandloardModel();
				$path = "../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b); 
				$data['fid']=cleanMe($c); 
				$data['app_id']    = $model->appId();
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				$model1       = new LandloardModel();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model1->companyDetail($data);
				$floorAvailableAmenitiesInfo    = $model1->buildingsFloorAvailableAmenitiesInfo($data);
				require_once('LandloardBuildingFloorAvailableAmenitiesListView.php');
			}
		}
		
		public static function updateFloorAmenityDisplay()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$result    = $model1->updateFloorAmenityDisplay();
				echo $result; die;
				}
		}
		
		
		 public static function listAvailableAmenities($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
					$model       = new LandloardModel();
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b); 
				$data['app_id']    = $model->appId();
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				$model1       = new LandloardModel();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model1->companyDetail($data);
				$buildingsAvailableAmenitiesInfo    = $model1->buildingsAvailableAmenitiesInfo($data);
				require_once('LandloardBuildingAvailableAmenitiesListView.php');
			}
		}
		
		public static function buildingAmenityAddInfo($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['aid']=cleanMe($c);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectedAmenitiesInfo    = $model->selectedAmenitiesInfo($data);
				require_once('BuildingAmenityAddInfoView.php');
			}
		}
		
		 public static function parkingAddInInfo($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['pid']=cleanMe($c);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$workingHrs    = $model->workingHrs($data);
				$displayPhotos    = $model->displayParkingPhotos($data);
				$selectedParkingInfo    = $model->selectedParkingInfo($data);
				require_once('LandloardBuildingParkingAddInInfoView.php');
			}
		}
		
		 public static function parkingTenantDetail($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['pid']=cleanMe($c);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectedParkingInfo    = $model->selectedParkingInfo($data);
				$tenantList    = $model->completeTenantList($data);
				$countryOptions    = $model->countryOptions($data);
				$countryCode    = $model->countryCode($data);
				$servicePriceList    = $model->servicePriceList($data);
				require_once('LandloardBuildingParkingTenantInfoView.php');
			}
		}
		
	 
	 public static function parkingPhotoInfo($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['pid']=cleanMe($c);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$workingHrs    = $model->workingHrs($data);
				$displayPhotos    = $model->displayParkingPhotos($data);
				$selectedParkingInfo    = $model->selectedParkingInfo($data);
				require_once('LandloardBuildingParkingPhotoInfoView.php');
			}
		}
		
		
		
		public static function addParkingTenant($a=null, $b=null, $c=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['pid']=cleanMe($c);
				$result    = $model1->addParkingTenant($data);
				header("location:../../../parkingAddInInfo/".$data['cid']."/".$data['bid']."/".$data['pid']);
				}
		}
		
		public static function updateParkingHrs($a=null, $b=null, $c=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['pid']=cleanMe($c);
				$result    = $model1->updateBuildingParkingHrs($data);
				header("location:../../../parkingPhotoInfo/".$data['cid']."/".$data['bid']."/".$data['pid']);
				}
		}
		
		public static function updateParkingDescription($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($co);
				$result    = $model1->updateParkingDescription($data);
				echo $result; die;
				}
		}
		
		public static function updateParkingPhotoDragging($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($co);
				$result    = $model1->updateParkingPhotoDragging($data);
				$result    = $model1->displayParkingPhotos($data);
				echo $result; die;
				}
		}
		
		public static function deleteParkingPhoto($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($co);
				$result    = $model1->deleteParkingPhoto($data);
				$result    = $model1->displayParkingPhotos($data);
				echo $result; die;
				}
		}
		
		public static function updateParkingPhotoOrder($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($co);
				$result    = $model1->updateParkingPhotoOrder($data);
				$result    = $model1->displayParkingPhotos($data);
				echo $result; die;
				}
		}
		
		public static function getParkingPhoto($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($co);
				 
				$result    = $model1->displayParkingPhotos($data);
				echo $result; die;
				}
		}
		
		public static function getParkingImageInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($co);
				 
				$result    = $model1->getParkingImageInfo($data);
				echo $result; die;
				}
		}
		
		
		public static function updateParkingPhotos($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($co);
				$result    = $model1->updateParkingPhotos($data);
				echo $result; die;
				}
		}
		
		
		public static function amenityPhotoInfo($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['aid']=cleanMe($c);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$workingHrs    = $model->workingHrs($data);
				$displayPhotos    = $model->displayAmenityPhotos($data);
				$selectedAmenitiesInfo    = $model->selectedAmenitiesInfo($data);
				 
				$buildingsAvailableAmenitiesInfo    = $model->buildingsAvailableAmenitiesInfo($data);
				require_once('LandloardBuildingAmenityPhotoInfoView.php');
			}
		}
		
		
		public static function updateAmenityHrs($a=null, $b=null, $c=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['aid']=cleanMe($c);
				$result    = $model1->updateBuildingAmenityHrs($data);
				header("location:../../../amenityPhotoInfo/".$data['cid']."/".$data['bid']."/".$data['aid']);
				}
		}
		
		public static function updateAmenityDescription($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateAmenityDescription($data);
				echo $result; die;
				}
		}
		
		public static function updateAmenityPhotoDragging($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateAmenityPhotoDragging($data);
				$result    = $model1->displayAmenityPhotos($data);
				echo $result; die;
				}
		}
		
		public static function deleteAmenityPhoto($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->deleteAmenityPhoto($data);
				$result    = $model1->displayAmenityPhotos($data);
				echo $result; die;
				}
		}
		
		public static function updateAmenityPhotoOrder($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateAmenityPhotoOrder($data);
				$result    = $model1->displayAmenityPhotos($data);
				echo $result; die;
				}
		}
		
		public static function getAmenityPhoto($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				 
				$result    = $model1->displayAmenityPhotos($data);
				echo $result; die;
				}
		}
		
		public static function getAmenityImageInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				 
				$result    = $model1->getAmenityImageInfo($data);
				echo $result; die;
				}
		}
		
		
		public static function updateAmenityPhotos($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateAmenityPhotos($data);
				echo $result; die;
				}
		}
		
		
		
		public static function genarateInvoice($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new LandloardModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				include('../configs/testMandril.php');
				$genarateInvoice = $model->genarateInvoice($data);
				header('location:../../buildingAddinsInfo/'.$data['cid'].'/'.$data['bid']);
			}
		}
		
		public static function addParkings($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new LandloardModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$addParkings = $model->addParkings($data);
				header('location:../../buildingAddinsInfo/'.$data['cid'].'/'.$data['bid']);
			}
		}
		
		
		public static function updateParkings($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new LandloardModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['pid']=cleanMe($c);
				$updateParkings = $model->updateParkings($data);
				header('location:../../../listParking/'.$data['cid'].'/'.$data['bid']);
			}
		}
		
		public static function editPrice($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b); 
				$data['id']=cleanMe($c); 
				$model       = new LandloardModel();
				$data['app_id']    = $model->appId();
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				
				$model1       = new LandloardModel();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				
				$companyDetail    = $model1->companyDetail($data);
				$servicePriceDetail    = $model1->servicePriceDetail($data);
				require_once('LandloardBuildingRentArticlePriceEditView.php');
			}
		}
		
		 public static function addPrice($a=null,$b=null)
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
				$data['bid']=cleanMe($b);
				$model       = new LandloardModel();
				$data['app_id']    = $model->appId();				
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				$model1       = new LandloardModel();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('LandloardBuildingRentArticlePriceView.php');
			}
		}
		 public static function invoiceDatesTaxInfo($a=null,$b=null)
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
				$data['bid']=cleanMe($b);
				$model       = new LandloardModel();
				$data['app_id']    = $model->appId();				
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				$model1       = new LandloardModel();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model1->buildingDetailInfo($data);
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('LandloardBuildingPurchaseInvoiceDateVatInfoView.php');
			}
		}
		
		
		public static function updateInvoiceDates($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new LandloardModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				include('../configs/testMandril.php');
				$updateInvoiceDates = $model->updateInvoiceDates($data);
				header('location:../../buildingAddinsInfo/'.$data['cid'].'/'.$data['bid']);
			}
		}
		
		
		
		 public static function listPricing($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
					$model       = new LandloardModel();
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b); 
				$data['app_id']    = $model->appId();
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				$model1       = new LandloardModel();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model1->companyDetail($data);
				
				$servicePriceCount    = $model1->servicePriceCount($data);
				 
				$servicePriceList    = $model1->servicePriceList($data);
				if($servicePriceCount['num']==0)
				{
					header('location:../../addPrice/'.$data['cid'].'/'.$data['bid']); die;
				}
				 
				require_once('LandloardBuildingRentArticlePriceListView.php');
			}
		}
		
		
		
		
		public static function addPricePlan($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new LandloardModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				include('../configs/testMandril.php');
				$addPricePlan = $model->addPricePlan($data);
				header('location:../../listPricing/'.$data['cid'].'/'.$data['bid']);
			}
		}
		
		
		public static function updatePricePlan($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new LandloardModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['id']=cleanMe($c);
				include('../configs/testMandril.php');
				$updatePricePlan = $model->updatePricePlan($data);
				header('location:../../../listPricing/'.$data['cid'].'/'.$data['bid']);
			}
		}
		
		
		
		public static function propertyTypeEntranceInfo()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$result    = $model1->propertyTypeEntranceInfo();
				echo $result; die;
				}
		}
		
		public static function listBuildings($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new LandloardModel();
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
				$buildingsList    = $model->buildingsList($data);
				$buildingsCount    = $model->buildingsCount($data);
				$row_summary    = $model->userSummary($data);
				require_once('LandloardBuildingsViewNew.php');
			}
		}
		
		
		
		public static function listCompletedBuildings($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new LandloardModel();
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
				$buildingsList    = $model->buildingsCompletedList($data);
				$buildingsCount    = $model->buildingsCount($data);
				$row_summary    = $model->userSummary($data);
				require_once('LandloardBuildingsCompletedViewNew.php');
			}
		}
		
		
		
		public static function selectSociety($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b); 
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
				$companyDetail    = $model->companyDetail($data);
				$societyList    = $model->societyList($data);
				if(count($societyList)==0)
				{
					header('location:../../Community/societyInformation/'.$data['cid']); die;
				}
				$row_summary    = $model->userSummary($data);
				require_once('LandloardBuildingsConnectSocietyView.php');
			}
		}
		
		
		public static function updateBuildingSociety($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b); 
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
				$updateBuildingSociety    = $model->updateBuildingSociety($data);
				 header('location:../../listCompletedBuildings/'.$data['cid']);
			}
		}
		
		/*public static function listSociety($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new LandloardModel();
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
				$societyList    = $model->societyList($data);
				$row_summary    = $model->userSummary($data);
				require_once('LandloardSocietyView.php');
			}
		}
		
			public static function societyInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new LandloardModel();
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
				$buildingsSocietyList    = $model->buildingsSocietyList($data);
				$row_summary    = $model->userSummary($data);
				require_once('LandloardSocietyInfoView.php');
			}
		}*/
		public static function portInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$portList    = $model->portList($data);
				$buildingAllPortFloorDetail    = $model->buildingAllPortFloorDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('LandloardPortsView.php');
			}
		}
		
		
		public static function buildingImageInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$displayPhotos    = $model->displayBuildingPhotos($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				require_once('LandloardBuildingPhotoInfoView.php');
			}
		}
		
		
	
		public static function buildingAddinsInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				require_once('LandloardFloorBuildingAddinsView.php');
			}
		}
		
		public static function listReservationPrice($a=null, $b=null)
		{
			 
			$valueNew = checkLogin();
			if ($valueNew == 0) {
			  $model1       = new LandloardModel();
					$data=array();
					$model1       = new LandloardModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
					  
					 $urlDetail    = $model1->urlDetail($data);
					header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
			} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingReservationPriceInfo    = $model->buildingReservationPriceInfo($data);
				 if(count($buildingReservationPriceInfo)==0)
				 {
					 header('location:../../buildingReservationCondition/'.$data['cid'].'/'.$data['bid']); die;
				 }
				require_once('LandloardBuildingReservationPriceView.php');
			}
		}
		
		public static function buildingReservationCondition($a=null, $b=null)
		{
			 
			$valueNew = checkLogin();
			if ($valueNew == 0) {
			  $model1       = new LandloardModel();
					$data=array();
					$model1       = new LandloardModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
					  
					 $urlDetail    = $model1->urlDetail($data);
					header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
			} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$options='';
				for($i=1;$i<=100;$i++)
				{
					$options=$options.'<option value="'.$i.'" >'.$i.'%</option>';
				}
				require_once('LandloardFloorBuildingReservationConditionView.php');
			}
		}
		
		
		public static function addReservationPriceInformation($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$addReservationPriceInformation    = $model->addReservationPriceInformation($data);
				 header('location:../../listReservationPrice/'.$data['cid'].'/'.$data['bid']);
			}
		}
		
		public static function listImportedProperties($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$model1       = new LandloardModel();
					$data=array();
					$model1       = new LandloardModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
					  
					 $urlDetail    = $model1->urlDetail($data);
					header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$displayproperties    = $model->buildingUnrefinedApartmentList($data);
				$companyDetail    = $model->companyDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				require_once('LandloardBuildingUnrefinedApartmentsView.php');
			}
		}
		
		
		public static function listRefinedProperties($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$model1       = new LandloardModel();
					$data=array();
					$model1       = new LandloardModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
					  
					 $urlDetail    = $model1->urlDetail($data);
					header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$displayproperties    = $model->apartmentUpdateList($data);
				//echo '<pre>'; print_r($displayproperties); echo '<pre>'; die;
				$companyDetail    = $model->companyDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				require_once('LandloardBuildingRefinedApartmentsView.php');
			}
		}
		
		
		public static function ownerList($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$tenantCount    = $model->ownerCount($data);
				
				if($tenantCount['num']==0)
				{
					header('location:../../ownerInfo/'.$data['cid'].'/'.$data['bid']); die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$ownerList    = $model->ownerList($data);
				require_once('LandloardBuildingOwnerListView.php');
			}
		}
		
		public static function ownerAgreementList($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$agreementList    = $model->agreementList($data);
				require_once('LandloardBuildingOwnerAgreementListView.php');
			}
		}
		
		public static function ownerAgreementEmiInvoiceList($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['agreement_id']=cleanMe($c);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$agreementDetail    = $model->agreementDetail($data);
				$companyDetail    = $model->companyDetail($data);
				$emiList    = $model->purchaseInvoiceList($data);
				require_once('LandloardBuildingAgreementEmiInvoiceInfoView.php');
			}
		}
		
		
		
		public static function purchaseBuildingInvoiceList($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$companyDetail    = $model->companyDetail($data);
				$emiList    = $model->purchaseInvoiceList($data);
				require_once('LandloardBuildingPurchaseInvoiceInfoView.php');
			}
		}
		
		
		public static function purchaseBuildingPaidInvoiceList($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$companyDetail    = $model->companyDetail($data);
				$emiList    = $model->purchasePaidInvoiceList($data);
				require_once('LandloardBuildingPurchasePaidInvoiceInfoView.php');
			}
		}
		
		
		
		public static function purchaseBuildingPartialPaidInvoiceList($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$companyDetail    = $model->companyDetail($data);
				$emiList    = $model->purchasePartialPaidInvoiceList($data);
				require_once('LandloardBuildingPurchasePartialPaidInvoiceInfoView.php');
			}
		}
		
		
		public static function purchaseBuildingInvoicePaymentInfo($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['invoice_id']=cleanMe($c);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$companyDetail    = $model->companyDetail($data);
				$emiList    = $model->purchaseInvoiceList($data);
				require_once('LandloardBuildingPurchaseInvoicePaymentTransferInfoView.php');
			}
		}
		
		
		public static function updateTransectionDetail($a=null, $b=null, $c=null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['invoice_id']=cleanMe($c);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$updateTransectionDetail    = $model->updateTransectionDetail($data);	
				header('location:../../../purchaseBuildingInvoiceList/'.$data['cid'].'/'.$data['bid']);
		}
		}
		
		public static function agreementDetailInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$completeOwnerList    = $model->completeOwnerList($data);
				$bankAccountList    = $model->bankAccountList($data); 
				require_once('LandloardBuildingOwnerAgreementInfoView.php');
			}
		}
		
		public static function getOwnerInformation()
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model = new LandloardModel();
				$getOwnerInformation = $model->getOwnerInformation();
				echo $getOwnerInformation; die;
			}	
		}
		
		public static function getObjectInformation($a=null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model = new LandloardModel();
				$data=array();
				$data['bid']=cleanMe($a);
				$getObjectInformation = $model->getObjectInformation($data);
				echo $getObjectInformation; die;
			}	
		}
		
		
		
		public static function getEmiInfo()
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model = new LandloardModel();
				$getEmiInfo = $model->getEmiInfo();
				echo $getEmiInfo; die;
			}	
		}
		
		
		public static function getSelectedObjectInformation()
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model = new LandloardModel();
				$getSelectedObjectInformation = $model->getSelectedObjectInformation();
				echo $getSelectedObjectInformation; die;
			}	
		}
		
		
		public static function moreOwnerDetail($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$model = new LandloardModel();
				$moreOwnerDetail = $model->moreOwnerDetail($data);
				echo $moreOwnerDetail; die;
			}
		}
		
		
		public static function addPurchaseAgreement($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$model = new LandloardModel();
				$addPurchaseAgreement = $model->addPurchaseAgreement($data);
				header('location:../../ownerAgreementList/'.$data['cid'].'/'.$data['bid']);
			}
		}
		
		
		
		public static function tenantList($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$tenantCount    = $model->tenantCount($data);
				
				if($tenantCount['num']==0)
				{
					header('location:../../tenantInfo/'.$data['cid'].'/'.$data['bid']); die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$tenantList    = $model->tenantList($data);
				require_once('LandloardBuildingTanentListView.php');
			}
		}
		public static function moreTenantDetail($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$model = new LandloardModel();
				$moreTenantDetail = $model->moreTenantDetail($data);
				echo $moreTenantDetail; die;
			}
		}
		public static function tenantInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$countryOptions    = $model->countryOptions($data);
				$countryCode    = $model->countryCode($data);
				$servicePriceList    = $model->servicePriceList($data);
				require_once('LandloardBuildingTanentInfoView.php');
			}
		}
		
		public static function ownerInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$countryOptions    = $model->countryOptions($data);
				$countryCode    = $model->countryCode($data);
				require_once('LandloardBuildingOwnerInfoView.php');
			}
		}
		
		public static function editOwnerInformation($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['tid']=cleanMe($c);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$ownerDetailInfo    = $model->ownerDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$countryOptions    = $model->countryOptions($data);
				$countryCode    = $model->countryCode($data); 
				$ownerAgreementList    = $model->ownerAgreementList($data);
				require_once('LandloardBuildingEditOwnerInfoView.php');
			}
		}
		
		
		public static function editTenantInformation($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['tid']=cleanMe($c);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$tenantDetailInfo    = $model->tenantDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$countryOptions    = $model->countryOptions($data);
				$countryCode    = $model->countryCode($data);
				$servicePriceList    = $model->servicePriceList($data);
				require_once('LandloardBuildingEditTanentInfoView.php');
			}
		}
		
		
		public static function addTenant($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				 
				$addTenant    = $model->addTenant($data);
				header('location:../../tenantList/'.$data['cid'].'/'.$data['bid']);
			}
		}
		
		
		public static function addOwner($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				 
				$addOwner    = $model->addOwner($data);
				header('location:../../ownerList/'.$data['cid'].'/'.$data['bid']);
			}
		}
		
		public static function updateOwner($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['tid']=cleanMe($c);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				 
				$addTenant    = $model->updateOwner($data);
				header('location:../../../ownerList/'.$data['cid'].'/'.$data['bid']);
			}
		}
		
		
		public static function updateTenant($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['tid']=cleanMe($c);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				 
				$addTenant    = $model->updateTenant($data);
				header('location:../../../tenantList/'.$data['cid'].'/'.$data['bid']);
			}
		}
		
		
		
		public static function buildingAmenitiesInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$buildingAmenitiesInfo    = $model->buildingAmenitiesInfo($data);
				require_once('LandloardBuildingAmenitiesInfoView.php');
			}
		}
		
		
		public static function updateAminity($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($co);
				$result    = $model1->updateAminity();
				if($result==1)
				{
				$result    = $model1->updatedAmenityDetail($data);	
				}
				
				echo $result; die;
				}
		}
		
		
		public static function checkEmailInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($co);
				
				$result    = $model1->checkEmailInfo($data);
				 
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
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($co);
				$result    = $model1->checkPassportInfo($data);
				 
				echo $result; die;
				}
		}
		
		public static function checkOwnerEmailInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($co);
				
				$result    = $model1->checkOwnerEmailInfo($data);
				 
				echo $result; die;
				}
		}
		
		
		public static function checkOwnerPassportInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($co);
				$result    = $model1->checkOwnerPassportInfo($data);
				 
				echo $result; die;
				}
		}
		
		public static function checkEmailInfoTenant($a=null, $b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($a);
				$data['tid']=cleanMe($b);
				$result    = $model1->checkEmailInfoTenant($data);
				 
				echo $result; die;
				}
		}
		
		
		public static function checkPassportInfoTenant($a=null, $b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($a);
				$data['tid']=cleanMe($b);
				$result    = $model1->checkPassportInfoTenant($data);
				 
				echo $result; die;
				}
		}
		
		
		public static function checkEmailInfoOwner($a=null, $b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($a);
				$data['tid']=cleanMe($b);
				$result    = $model1->checkEmailInfoOwner($data);
				 
				echo $result; die;
				}
		}
		
		
		public static function checkPassportInfoOwner($a=null, $b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($a);
				$data['tid']=cleanMe($b);
				$result    = $model1->checkPassportInfoOwner($data);
				 
				echo $result; die;
				}
		}
		
		
		
		
		public static function updateAminityPortInfo()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$result    = $model1->updateAminityPortInfo();
				echo $result; die;
				}
		}
		
		
		public static function updateMultiSubcategory($a=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($a);
				$result    = $model1->updateMultiSubcategory();
				if($result==1)
				{
				$result    = $model1->updatedAmenityDetail($data);	
				}
				echo $result; die;
				}
		}
		
		public static function updateFloorParkingDetail($a=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['fid']=cleanMe($a);
				$data['port_id']=$_POST['port_id'];
				$result    = $model1->updateFloorParkingDetail();
				$result    = $model1->buildingAvailableParkingForFloor($data);	
				echo $result; die;
				}
		}
		
		
			public static function availableParkingonFloor($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$portDetail    = $model->portDetail($data);
				$data['port_id']=$portDetail['port_id'];
				$buildingAvailableParkingForFloor    = $model->buildingAvailableParkingForFloor($data);
				$portFloorOfficeList    = $model->portFloorOfficeList($data);
				$row_summary    = $model->userSummary($data);
				require_once('LandloardBuildingFloorParkingInfoView.php');
			}
		}
		
		public static function portDescriptionInfo($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$portDetail    = $model->portDetail($data);
				$portFloorApartmentList    = $model->portFloorApartmentList($data);
				$portFloorOfficeList    = $model->portFloorOfficeList($data);
				$row_summary    = $model->userSummary($data);
				require_once('LandloardPortsDescriptionView.php');
			}
		}
		
		
		public static function editFloorInfo($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$portDetail    = $model->portDetail($data);
				 
				$portFloorApartmentList    = $model->portFloorApartmentList($data);
				$portFloorOfficeList    = $model->portFloorOfficeList($data);
				$row_summary    = $model->userSummary($data);
				require_once('LandloardBuildingPortFloorEditInfoView.php');
			}
		}
		
		
		 public static function updateFloorInfo($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
				$updateFloorInfo    = $model->updateFloorInfo($data);
				header('location:../../../editFloorInfo/'.$data['cid'].'/'.$data['bid'].'/'.$data['fid']); 
			}
		}
		
		
		
		 public static function listFloorObjects($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$objectList    = $model->floorApartments($data);
				if(count($objectList)==0)
				{
					header('location:../../../portFloorApartmentInfo/'.$data['cid'].'/'.$data['bid'].'/'.$data['fid']); die;
				}
				$row_summary    = $model->userSummary($data);
				require_once('LandloardFloorObjectListView.php');
			}
		}
		
		public static function floorApartmentAddins($a=null, $b=null, $c=null, $d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
				$data['aid']=cleanMe($d);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$apartmentDescriptionDetail    = $model->apartmentDescriptionDetail($data);
				$apartmentExteriorDetail=$model->apartmentExteriorDetail($data);
				$OtherRoomInfo=$model->OtherRoomInfo($data);
				$bathroomCount=$model->bathroomCount($data);
				$bedroomCount=$model->bedroomCount($data);
				if($bedroomCount==0)
				{
				$addBedroom    = $model->addBedroom($data);	
				}
				$objectDetail    = $model->objectDetail($data);
				 
				$portDetail    = $model->portDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$objectList    = $model->floorApartments($data);
				$row_summary    = $model->userSummary($data);
				require_once('LandloardFloorApartmentAddinsView.php');
			}
		}
		
		public static function floorApartmentTenantsInfo($a=null, $b=null, $c=null, $d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
				$data['aid']=cleanMe($d);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$apartmentDescriptionDetail    = $model->apartmentDescriptionDetail($data);
				$apartmentExteriorDetail=$model->apartmentExteriorDetail($data);
				$bathroomCount=$model->bathroomCount($data);
				$bedroomCount=$model->bedroomCount($data);
				if($bedroomCount==0)
				{
				$addBedroom    = $model->addBedroom($data);	
				}
				$objectDetail    = $model->objectDetail($data);
				$data['tenant_id']=$objectDetail['teanat_details'];
				$portDetail    = $model->portDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$objectList    = $model->floorApartments($data);
				$buildingtenantSelectedInfo    = $model->buildingtenantSelectedInfo($data);
				require_once('LandloardFloorApartmentTenantsView.php');
			}
		}
		
		public static function floorApartmentAddedTenantsInfo($a=null, $b=null, $c=null, $d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
				$data['aid']=cleanMe($d);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$apartmentDescriptionDetail    = $model->apartmentDescriptionDetail($data);
				$apartmentExteriorDetail=$model->apartmentExteriorDetail($data);
				$bathroomCount=$model->bathroomCount($data);
				$bedroomCount=$model->bedroomCount($data);
				if($bedroomCount==0)
				{
				$addBedroom    = $model->addBedroom($data);	
				}
				$objectDetail    = $model->objectDetail($data);
				$a=explode(',',$objectDetail['teanat_details']);
				if(count($a)==1)
				{
					header('location:../../../../floorApartmentAddins/'.$data['cid'].'/'.$data['bid'].'/'.$data['fid'].'/'.$data['aid']); 
				}
				$invitedTenatCount    = $model->invitedTenatCount($data);
				if($invitedTenatCount['num']>0)
				{
					header('location:../../../../../UserTenantCompany/sentAccount/'.$data['cid'].'/'.$data['bid'].'/'.$data['fid'].'/'.$data['aid']); 
				}
				$data['tenant_id']=$objectDetail['teanat_details'];
				$portDetail    = $model->portDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$objectList    = $model->floorApartments($data);
				$buildingtenantSelectedInfo    = $model->buildingtenantSelectedOnlyInfo($data);
				require_once('LandloardFloorApartmentSelectedTenantsView.php');
			}
		}
		
		
		
		public static function updateTenantSelect($co=null,$c=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$data['bid']=cleanMe($c);
				$updateTenantSelect    = $model1->updateTenantSelect($data);
				$objectDetail    = $model1->objectDetail($data);
				$data['tenant_id']=$objectDetail['teanat_details'];
				$buildingtenantSelectedInfo    = $model1->buildingtenantSelectedInfo($data);
				 echo $buildingtenantSelectedInfo; die;
				}
		}
		
		
		
		
		public static function updateTenantInvite($co=null,$c=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$data['bid']=cleanMe($c);
				$objectDetail    = $model1->objectDetail($data);
				$data['tenant_id']=$objectDetail['teanat_details'];
				$updateTenantInvite    = $model1->updateTenantInvite($data);
				 echo $updateTenantInvite; die;
				}
		}
		
		public static function floorApartmentpublishInfo($a=null, $b=null, $c=null, $d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
				$data['aid']=cleanMe($d);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				
				$apartmentDescriptionDetail    = $model->apartmentDescriptionDetail($data);
				$apartmentExteriorDetail=$model->apartmentExteriorDetail($data);
				$bathroomCount=$model->bathroomCount($data);
				$bedroomCount=$model->bedroomCount($data);
				if($bedroomCount==0)
				{
				$addBedroom    = $model->addBedroom($data);	
				}
				$objectDetail    = $model->objectDetail($data);
				if($objectDetail['apartment_completed']==40)
				$url='floorApartmentBedroomInfo'; 
				else if($objectDetail['apartment_completed']==50) 
				$url='floorApartmentBathroomInfo'; 
				else if($objectDetail['apartment_completed']==60)
				$url='floorApartmentOtherRoomInfo'; 
				else if($objectDetail['apartment_completed']==70) 
				$url='floorObjectImageInfo';  
				else if($objectDetail['apartment_completed']==80) 
				$url='apartmentDescriptionInfo'; 
				else if($objectDetail['apartment_completed']==90) 
				$url='apartmentPoolInfo';  
				if($objectDetail['apartment_completed']<100) 
				{ 
				header('location:../../../../'.$url.'/'.$data['cid'].'/'.$data['bid'].'/'.$data['fid'].'/'.$data['aid']); die;	
				}
				
				if($objectDetail['num']==0) 
				{
				header('location:../../../../floorObjectImageInfo/'.$data['cid'].'/'.$data['bid'].'/'.$data['fid'].'/'.$data['aid']); die;	
				}
				
				$portDetail    = $model->portDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$objectList    = $model->floorApartments($data);
				$bedroomDetail    = $model->bedroomDetail($data);
				$objectPhotoCount=$model->objectPhotoCount($data);
				$portDetail    = $model->portDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				require_once('LandloardApartmentPublishInfoView.php');
			}
		}
		
		public static function updatePublishInfo($co=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$updatePublishInfo    = $model1->updatePublishInfo($data);
				 echo $updatePublishInfo; die;
				}
		}
		public static function floorApartmentStatusInfo($a=null, $b=null, $c=null, $d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
				$data['aid']=cleanMe($d);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				
				$bedroomCount=$model->bedroomCount($data);
				if($bedroomCount==0)
				{
				$addBedroom    = $model->addBedroom($data);	
				}
				$objectDetail    = $model->objectDetail($data);
				 
				$portDetail    = $model->portDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$portDetail    = $model->portDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				require_once('LandloardApartmentEditConstructionStatusView.php');
			}
		}
		
		
		public static function floorApartmentBedroomInfo($a=null, $b=null, $c=null, $d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
				$data['aid']=cleanMe($d);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				
				$bedroomCount=$model->bedroomCount($data);
				if($bedroomCount==0)
				{
				$addBedroom    = $model->addBedroom($data);	
				}
				$objectDetail    = $model->objectDetail($data);
				$portDetail    = $model->portDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$objectList    = $model->floorApartments($data);
				$bedroomDetail    = $model->bedroomDetail($data);
				$bedroomCount=$model->bedroomCount($data);
				$portDetail    = $model->portDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				require_once('LandloardApartmentBedroomInfoView.php');
			}
		}
		
		
		 
		
		
			public static function updateApartmentConstruction($a=null, $b=null, $c=null, $d=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
				$data['aid']=cleanMe($d);
				$result    = $model1->updateApartmentConstruction($data);
				header('location:../../../../floorApartmentAddins/'.$data['cid'].'/'.$data['bid'].'/'.$data['fid'].'/'.$data['aid']); 
				}
		}
		
		
		public static function deleteBedroom($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->deleteBedroom($data);
				if($result==1)
				{
				$result    = $model1->bedroomDetail($data);	
				}
				
				echo $result; die;
				}
		}
		public static function addBedroom($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->addBedroom($data);
				$result    = $model1->bedroomDetail($data);
				echo $result; die;
				}
		}
		public static function bedroomCountInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->bedroomCount($data);
				echo $result; die;
				}
		}
		
		public static function updateBedTypeInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateBedTypeInfo($data);
				echo $result; die;
				}
		}
		
		
		public static function updateBedSizeInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateBedSizeInfo($data);
				echo $result; die;
				}
		}
		public static function portFloorInfo($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$portDetail    = $model->portDetail($data);
				$portFloorApartmentList    = $model->portFloorApartmentList($data);
				$portFloorOfficeList    = $model->portFloorOfficeList($data);
				$row_summary    = $model->userSummary($data);
				require_once('LandloardBuildingPortFloorInfoView.php');
			}
		}
		
		
		public static function portFloorApartmentInfo($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$portDetail    = $model->portDetail($data);
				$portFloorApartmentList    = $model->portFloorApartmentList($data);
				$portFloorOfficeList    = $model->portFloorOfficeList($data);
				$row_summary    = $model->userSummary($data);
				require_once('LandloardApartmentCompositionView.php');
			}
		}
		
		public static function checkApartmentNumber($a=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['fid']=cleanMe($a);
				$model1       = new LandloardModel();
				$result    = $model1->checkApartmentNumber($data);
				echo $result; die;
				}
		}
		
		public static function checkFloorApartmentNumber($a=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($a);
				$model1       = new LandloardModel();
				$result    = $model1->checkFloorApartmentNumber($data);
				echo $result; die;
				}
		}
		
		
		public static function updateApartmentNumber()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$result    = $model1->updateApartmentNumber();
				echo $result; die;
				}
		}
		
		
		
		
		public static function updateApartmentType()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$result    = $model1->updateApartmentType();
				echo $result; die;
				}
		}
		
		public static function updateApartmentTenant()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$result    = $model1->updateApartmentTenant();
				echo $result; die;
				}
		}
		public static function addApartment($a=null, $b=null, $c=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
				$result    = $model1->addApartment($data);
				 header('location:../../../listFloorObjects/'.$data['cid'].'/'.$data['bid'].'/'.$data['fid']);
				}
		}
		
		
		
		public static function deleteApartment($co=null, $b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['fid']=cleanMe($co);
				$data['bid']=cleanMe($b);
				$result    = $model1->deleteApartment($data);
				$result    = $model1->portFloorApartmentList($data);
				echo $result; die;
				}
		}
		
		public static function deleteOffice($co=null, $b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['fid']=cleanMe($co); 
				$data['bid']=cleanMe($b); 
				$result    = $model1->deleteOffice($data);
				$result    = $model1->portFloorOfficeList($data);
				echo $result; die;
				}
		}
		public static function addOffice($co=null, $b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['fid']=cleanMe($co); 
				$data['bid']=cleanMe($b);
				$result    = $model1->addOffice($data);
				$result    = $model1->portFloorOfficeList($data);
				echo $result; die;
				}
		}
		public static function getPortsInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				 
				$result    = $model1->getPortsInfo();
				echo $result; die;
				}
		}
		
		
		
		public static function checkAddress()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				
				$result    = $model1->checkAddress();
				echo $result; die;
				}
		}
		
		public static function checkAddresslatLong()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				
				$result    = $model1->checkAddresslatLong();
				echo $result; die;
				}
		}
		public static function buildingInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new LandloardModel();
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
				$countryOptions    = $model->countryOptions($data); 
				$row_summary    = $model->userSummary($data);
				require_once('LandloardBuildingInfoViewNew.php');
			}
		}
	 
		public static function editBuildingInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$buildingPortList    = $model->buildingPortList($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$countryOptions    = $model->countryOptions($data); 
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$data['vitech_region_id']=$buildingDetailInfo['vitech_region'];
				$data['vitech_city_id']=$buildingDetailInfo['vitech_city'];
				$selectCity    = $model->fetchCitechCity($data);
				$data['vitech_area_id']=$buildingDetailInfo['vitech_area'];
				$selectArea    = $model->fetchCitechArea($data);
				require_once('LandloardEditBuildingInfoView.php');
			}
		}
		
	 
	 
	 public static function getCities()
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.qloudid.com/user/index.php/LoginAccount");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new LandloardModel();
			 
			$data['vitech_region_id']=$_POST['cid'];
			$data['vitech_city_id']=0;
			$selectCity    = $model1->fetchCitechCity($data);
			echo $selectCity; die;
	}
	}
	
	public static function getArea()
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.qloudid.com/user/index.php/LoginAccount");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new LandloardModel();
			$data['vitech_city_id']=$_POST['cid'];
			$data['vitech_area_id']=0;
			
			$selectArea    = $model1->fetchCitechArea($data);
			echo $selectArea; die;
	}
	}
	 
	 public static function addBuilding($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new LandloardModel();
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
				
				$addBuilding    = $model->addBuilding($data);
				header('location:../listBuildings/'.$data['cid']); 
			}
		}
		
		
		 public static function updateBuilding($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b); 
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				
				$updateBuilding    = $model->updateBuilding($data);
				header('location:../../listBuildings/'.$data['cid']); 
			}
		}
		
		
		public static function addSociety($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new LandloardModel();
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
				
				$addSociety    = $model->addSociety($data);
				header('location:../listSociety/'.$data['cid']); 
			}
		}
	 
	 
	 public static function moreBuildingDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new LandloardModel();
				$moreBuildingDetail = $model->moreBuildingDetail($data);
				echo $moreBuildingDetail; die;
			}
		}
		
		
		 public static function buildingPortFloorDetail($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$model = new LandloardModel();
				$buildingPortFloorDetail = $model->buildingPortFloorDetail($data);
				echo $buildingPortFloorDetail; die;
			}
		}
		
		
		public static function floorApartmentBathroomInfo($a=null, $b=null, $c=null, $d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
				$data['aid']=cleanMe($d);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				
				
				$objectDetail    = $model->objectDetail($data);
				if($objectDetail['apartment_completed']==40)
				$url='floorApartmentBedroomInfo'; 
			
				if($objectDetail['apartment_completed']<50) 
				{
				header('location:../../../../'.$url.'/'.$data['cid'].'/'.$data['bid'].'/'.$data['fid'].'/'.$data['aid']); die;	
				}
				
				$bathroomCount=$model->bathroomCount($data);
				$portDetail    = $model->portDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$objectList    = $model->floorApartments($data);
				$bathroomDetail    = $model->bathroomDetail($data);
				$portDetail    = $model->portDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				require_once('LandloardApartmentBathroomInfoView.php');
			}
		}
		
		
		public static function floorApartmentOtherRoomInfo($a=null, $b=null, $c=null, $d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
				$data['aid']=cleanMe($d);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				
				$objectDetail    = $model->objectDetail($data);
				if($objectDetail['apartment_completed']==40)
				$url='floorApartmentBedroomInfo'; 
				else if($objectDetail['apartment_completed']==50) 
				$url='floorApartmentBathroomInfo'; 
				 
				if($objectDetail['apartment_completed']<60) 
				{
				header('location:../../../../'.$url.'/'.$data['cid'].'/'.$data['bid'].'/'.$data['fid'].'/'.$data['aid']); die;	
				}
				$portDetail    = $model->portDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$objectList    = $model->floorApartments($data);
				$OtherRoomInfo    = $model->OtherRoomInfo($data);
				//print_r($OtherRoomInfo); die;
				$categoryInfo    = $model->categoryInfo($data);
				$portDetail    = $model->portDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				require_once('LandloardApartmentOtherRoomsInfoView.php');
			}
		}
		
		
		public static function apartmentAmenityCategoryInfo($a=null, $b=null, $c=null, $d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				}
				else
				{
				$path = "../../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
				$data['aid']=cleanMe($d);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$objectDetail    = $model->objectDetail($data);
				$portDetail    = $model->portDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$OtherRoomInfo    = $model->OtherRoomInfo($data);
				$categoryInfo    = $model->categoryInfo($data);
				$row_summary    = $model->userSummary($data);
				require_once('LandloardApartmentAmenityCategoryView.php');
				}
			
		}
		
		public static function apartmentAmenitySubcategoryInfo($a=null, $b=null, $c=null, $d=null, $e=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				}
				else
				{
				$path = "../../../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
				$data['aid']=cleanMe($d);
				$data['category_id']=cleanMe($e);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$objectDetail    = $model->objectDetail($data);
				$portDetail    = $model->portDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$OtherRoomInfo    = $model->OtherRoomInfo($data);
				$categoryInfo    = $model->categoryInfo($data);
				$amenitiesSubcategoryDetail    = $model->amenitiesSubcategoryDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('LandloardApartmentAmenitiesSubcategoryInfoView.php');
				}
			
		}
		
		public static function updateTicketCategoryAmenities($co=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$data['category_id']=cleanMe($b);
				$result    = $model1->updateTicketCategoryAmenities($data);
				$result    = $model1->amenitiesSubcategoryDetail($data);
				echo $result; die;
				}
		}
		
		
		public static function updateTicketSubcategory($co=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$data['category_id']=cleanMe($b);
				$result    = $model1->updateTicketSubcategory($data);
				$amenitiesSubcategoryDetail    = $model1->amenitiesSubcategoryDetail($data);
				echo $amenitiesSubcategoryDetail; die;
				}
		}
		
		public static function updateAminitySubcategory($co=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$data['category_id']=cleanMe($b);
				$result    = $model1->updateAminitySubcategory($data);
				$amenitiesSubcategoryDetail    = $model1->amenitiesSubcategoryDetail($data);
				echo $amenitiesSubcategoryDetail; die;
				}
		}
		
		
		
		
		
		
		
		public static function updateOverbath($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateOverbath($data);
				$result    = $model1->bathroomDetail($data);
				echo $result; die;
				}
		}
		
		
		public static function updateOtherRoomInfo()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$result    = $model1->updateOtherRoomInfo($data);
				echo $result; die;
				}
		}
		
		public static function updateShower($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateShower($data);
				if($result==1)
				{
				$result    = $model1->bathroomDetail($data);	
				}
				
				echo $result; die;
				}
		} 
		
		
		public static function updateBath($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateBath($data);
				if($result==1)
				{
				$result    = $model1->bathroomDetail($data);	
				}
				echo $result; die;
				}
		} 
		
		public static function updateToilet($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateToilet($data);
				if($result==1)
				{
				$result    = $model1->bathroomDetail($data);	
				}
				echo $result; die;
				}
		} 
		
		public static function countBathDetail($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->countBathDetail($data);
				 
				echo $result; die;
				}
		} 
		
		 
		
		public static function addBathroom($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->addBathroom($data);
				$result    = $model1->bathroomDetail($data);
				echo $result; die;
				}
		}
		
		public static function bathroomCountInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->bathroomCount($data);
				echo $result; die;
				}
		}
		
		public static function deleteBathroom($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->deleteBathroom($data);
				if($result==1)
				{
				$result    = $model1->bathroomDetail($data);	
				}
				
				echo $result; die;
				}
		}
		
		public static function updateWheelchair($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateWheelchair($data);
				$result    = $model1->bathroomDetail($data);
				echo $result; die;
				}
		}
		
		
		public static function updatePrivate($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updatePrivate($data);
				$result    = $model1->bathroomDetail($data);
				echo $result; die;
				}
		}
		
		public static function updateEnsuit($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateEnsuit($data);
				$result    = $model1->bathroomDetail($data);
				echo $result; die;
				}
		}
		public static function floorObjectImageInfo($a=null, $b=null, $c=null, $d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
				$data['aid']=cleanMe($d);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$objectDetail    = $model->objectDetail($data);
				if($objectDetail['apartment_completed']==40)
				$url='floorApartmentBedroomInfo'; 
				else if($objectDetail['apartment_completed']==50) 
				$url='floorApartmentBathroomInfo'; 
				else if($objectDetail['apartment_completed']==60)
				$url='floorApartmentOtherRoomInfo'; 
				
				if($objectDetail['apartment_completed']<70) 
				{
				header('location:../../../../'.$url.'/'.$data['cid'].'/'.$data['bid'].'/'.$data['fid'].'/'.$data['aid']); die;	
				}
				 
				$portDetail    = $model->portDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$objectList    = $model->floorApartments($data);
				$displayPhotos    = $model->displayPhotos($data);
				$portDetail    = $model->portDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				require_once('LandloardObjectPhotoInfoView.php');
			}
		}
		
		public static function apartmentDescriptionInfo($a=null, $b=null, $c=null, $d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
				$data['aid']=cleanMe($d);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$objectDetail    = $model->objectDetail($data);
				if($objectDetail['apartment_completed']==40)
				$url='floorApartmentBedroomInfo'; 
				else if($objectDetail['apartment_completed']==50) 
				$url='floorApartmentBathroomInfo'; 
				else if($objectDetail['apartment_completed']==60)
				$url='floorApartmentOtherRoomInfo'; 
				else if($objectDetail['apartment_completed']==70) 
				$url='floorObjectImageInfo';  
				 
				if($objectDetail['apartment_completed']<80) 
				{
				header('location:../../../../'.$url.'/'.$data['cid'].'/'.$data['bid'].'/'.$data['fid'].'/'.$data['aid']); die;	
				}
				
				if($objectDetail['num']==0) 
				{
				header('location:../../../../floorObjectImageInfo/'.$data['cid'].'/'.$data['bid'].'/'.$data['fid'].'/'.$data['aid']); die;	
				}
				$portDetail    = $model->portDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$objectList    = $model->floorApartments($data);
				$apartmentDescriptionDetail    = $model->apartmentDescriptionDetail($data);
				$portDetail    = $model->portDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				require_once('LandloardApartmentDescriptionInfoView.php');
			}
		}
		
		public static function apartmentPoolInfo($a=null, $b=null, $c=null, $d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../../";
				$model       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
				$data['aid']=cleanMe($d);
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
					header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$objectDetail    = $model->objectDetail($data);
				 
				if($objectDetail['apartment_completed']==40)
				$url='floorApartmentBedroomInfo'; 
				else if($objectDetail['apartment_completed']==50) 
				$url='floorApartmentBathroomInfo'; 
				else if($objectDetail['apartment_completed']==60)
				$url='floorApartmentOtherRoomInfo'; 
				else if($objectDetail['apartment_completed']==70) 
				$url='floorObjectImageInfo';  
				else if($objectDetail['apartment_completed']==80) 
				$url='apartmentDescriptionInfo'; 
				 
				if($objectDetail['apartment_completed']<90) 
				{
				header('location:../../../../'.$url.'/'.$data['cid'].'/'.$data['bid'].'/'.$data['fid'].'/'.$data['aid']); die;	
				}
				
				if($objectDetail['num']==0) 
				{
				header('location:../../../../floorObjectImageInfo/'.$data['cid'].'/'.$data['bid'].'/'.$data['fid'].'/'.$data['aid']); die;	
				}
				
				$portDetail    = $model->portDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$objectList    = $model->floorApartments($data);
				$apartmentExteriorDetail    = $model->apartmentExteriorDetail($data);
				$portDetail    = $model->portDetail($data);
				$buildingDetailInfo    = $model->buildingDetailInfo($data);
				require_once('LandloardApartmentPoolInfoView.php');
			}
		}
		
		
		
		public static function updateApartmentDescription($a=null, $b=null, $c=null, $d=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
				$data['aid']=cleanMe($d);
				$result    = $model1->updateApartmentDescription($data);
				header('location:../../../../floorApartmentAddins/'.$data['cid'].'/'.$data['bid'].'/'.$data['fid'].'/'.$data['aid']); 
				}
		}
		
		
		public static function invitetenatToConnect($a=null, $b=null, $c=null, $d=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
				$data['aid']=cleanMe($d);
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				$invitetenatToConnect    = $model1->invitetenatToConnect($data);
				header('location:../../../../floorApartmentAddins/'.$data['cid'].'/'.$data['bid'].'/'.$data['fid'].'/'.$data['aid']); 
				}
		}
		public static function updateApartmentPoolInfo($a=null, $b=null, $c=null, $d=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
				$data['aid']=cleanMe($d);
				$result    = $model1->updateApartmentPoolInfo($data);
				header('location:../../../../floorApartmentAddins/'.$data['cid'].'/'.$data['bid'].'/'.$data['fid'].'/'.$data['aid']); 
				}
		}
		
		
		public static function updateApartmentStatusInfo($a=null, $b=null, $c=null, $d=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['fid']=cleanMe($c);
				$data['aid']=cleanMe($d);
				$result    = $model1->updateApartmentStatusInfo($data);
				header('location:../../../../floorApartmentAddins/'.$data['cid'].'/'.$data['bid'].'/'.$data['fid'].'/'.$data['aid']); 
				}
		}
		
		public static function getPhoto($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				 
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		
		public static function getImageInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				 
				$result    = $model1->getImageInfo($data);
				echo $result; die;
				}
		}
		
		public static function deletePhoto($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->deletePhoto($data);
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		
		public static function updatePhotoDragging($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updatePhotoDragging($data);
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		
		public static function updatePhotoOrder($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updatePhotoOrder($data);
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		
		public static function updatePhotos($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updatePhotos($data);
				echo $result; die;
				}
		}
	  	
		
		public static function getBuildingPhoto($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($co);
				 
				$result    = $model1->displayBuildingPhotos($data);
				echo $result; die;
				}
		}
		
		public static function getBuildingImageInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($co);
				 
				$result    = $model1->getBuildingImageInfo($data);
				echo $result; die;
				}
		}
		
		public static function deleteBuildingPhoto($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($co);
				$result    = $model1->deleteBuildingPhoto($data);
				$result    = $model1->displayBuildingPhotos($data);
				echo $result; die;
				}
		}
		
		public static function updateBuildingPhotoDragging($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($co);
				$result    = $model1->updateBuildingPhotoDragging($data);
				$result    = $model1->displayBuildingPhotos($data);
				echo $result; die;
				}
		}
		
		public static function updateBuildingPhotoOrder($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($co);
				$result    = $model1->updateBuildingPhotoOrder($data);
				$result    = $model1->displayBuildingPhotos($data);
				echo $result; die;
				}
		}
		
		public static function updateBuildingPhotos($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($co);
				$result    = $model1->updateBuildingPhotos($data);
				echo $result; die;
				}
		}
	  	
	}
?>