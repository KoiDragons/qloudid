<?php
	require_once 'CarRentalModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class CarRentalController
	{
		 
		public static function officeLocations($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$model1       = new CarRentalModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model1->companyDetail($data);
				$locationDetail    = $model1->locationDetail($data);
				require_once('CarRentalOfficeLocationView.php');
			}
		}
		
		
		public static function requiredDetail($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['location_id']=cleanMe($b);
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$model1       = new CarRentalModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$workingHrs    = $model1->workingHrs($data);
				$bookingRulesDetail    = $model1->bookingRulesDetail($data);
				$carRentalWorkCount    = $model1->openingHoursDetail($data);
				require_once('CarRentalOfficeLocationVehicleRequiredInfoView.php');
			}
		}
		
		
		
		public static function bookingInformation($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['location_id']=cleanMe($b);
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$model1       = new CarRentalModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$bookingList    = $model1->bookingList($data);
				$bookingRulesDetail    = $model1->bookingRulesDetail($data);
				$carRentalWorkCount    = $model1->openingHoursDetail($data);
				require_once('CarRentalOfficeLocationBookingInfoView.php');
			}
		}
		
		public static function openingHours($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['location_id']=cleanMe($b);
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$model1       = new CarRentalModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$workingHrs    = $model1->workingHrs($data);
				$carRentalWorkCount    = $model1->openingHoursDetail($data);
				require_once('CarRentalEditOpenInfoView.php');
			}
		}
		
		public static function bookingRules($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['location_id']=cleanMe($b);
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$model1       = new CarRentalModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$workingHrs    = $model1->workingHrs($data);
				$carRentalWorkCount    = $model1->bookingRulesDetail($data);
				require_once('CarRentalEditBookingRulesInfoView.php');
			}
		}
		
		public static function updateBookingRulesDetail($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['location_id']=cleanMe($b);
				$model1       = new CarRentalModel();
				$updateBookingRulesDetail    = $model1->updateBookingRulesDetail($data);
				header('location:../../requiredDetail/'.$data['cid'].'/'.$data['location_id']);
			}
		}
		public static function updateBookingHoursDetail($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['location_id']=cleanMe($b);
				$model1       = new CarRentalModel();
				$updateBookingHoursDetail    = $model1->updateBookingHoursDetail($data);
				header('location:../../openingHours/'.$data['cid'].'/'.$data['location_id']);
			}
		}
		
		public static function vehicleList($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['location_id']=cleanMe($b);
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$model1       = new CarRentalModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model1->companyDetail($data);
				$vehicleTypeList    = $model1->vehicleTypeList($data);
				$carRentalWorkCount    = $model1->openingHoursDetail($data);
				if(count($vehicleTypeList)==0)
				{
				header('location:../../vehicleTypeInfo/'.$data['cid'].'/'.$data['location_id']);	
				}
				require_once('CarRentalOfficeLocationVehicleTypeListView.php');
			}
		}
		
		public static function vehicleTypeInfo($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['location_id']=cleanMe($b);
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$model1       = new CarRentalModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$carAvailableModelList    = $model1->carAvailableModelList($data);
				$companyDetail    = $model1->companyDetail($data);
				require_once('CarRentalOfficeLocationVehicleTypeDetailView.php');
			}
		}
		 
		public static function getCarModelInfo()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				$model1       = new CarRentalModel();
				$carModelList    = $model1->carModelList();
				echo $carModelList; die;
			}
		}
		
		public static function getCarModelYearInfo()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				$model1       = new CarRentalModel();
				$carModelList    = $model1->carModelYearList();
				echo $carModelList; die;
			}
		}
		
		public static function getCarModelBodyInfo()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				$model1       = new CarRentalModel();
				$carModelList    = $model1->carModelBodyList();
				echo $carModelList; die;
			}
		}
		
		public static function getCarModelGenerationInfo()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				 
				$model1       = new CarRentalModel();
				$carModelList    = $model1->carModelGenerationList();
				echo $carModelList; die;
			}
		}
		
		
		public static function getCarModelTrimInfo()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				 
				$model1       = new CarRentalModel();
				$carModelList    = $model1->carModelTrimList();
				echo $carModelList; die;
			}
		}
		
		public static function addCarInformation($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['location_id']=cleanMe($b);
				$model1       = new CarRentalModel();
				$addCarInformation    = $model1->addCarInformation($data);
				header('location:../../vehicleList/'.$data['cid'].'/'.$data['location_id']);
			}
		}
		
		
		 
		public static function vehicleTypeCarList($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['location_id']=cleanMe($b);
				$data['vtype_id']=cleanMe($c);
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$model1       = new CarRentalModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model1->companyDetail($data);
				$vehicleTypeList    = $model1->vehicleTypeList($data);
				if(count($vehicleTypeList)==0)
				{
				header('location:../../../vehicleTypeInfo/'.$data['cid'].'/'.$data['location_id']);	
				}
				
				$vehicleTypeCarList    = $model1->vehicleTypeCarList($data);
				require_once('CarRentalOfficeLocationVehicleTypeCarListView.php');
			}
		} 
		public static function selectedCarInfo($a=null,$b=null,$c=null,$d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['location_id']=cleanMe($b);
				$data['vtype_id']=cleanMe($c);
				$data['car_id']=cleanMe($d);
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$model1       = new CarRentalModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model1->companyDetail($data);
				$vehicleTypeList    = $model1->vehicleTypeList($data);
				if(count($vehicleTypeList)==0)
				{
				header('location:../../../../vehicleTypeInfo/'.$data['cid'].'/'.$data['location_id']);	
				}
				$carColors    = $model1->carColors();
				$carImages    = $model1->carImages($data);
				 
				$vehicleTypeSelectedCarDetail    = $model1->vehicleTypeSelectedCarDetail($data);
				require_once('CarRentalOfficeLocationVehicleSelectedCarDetailView.php');
			}
		} 
		
		
		public static function updateCarDetail($a=null,$b=null,$c=null,$d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['location_id']=cleanMe($b);
				$data['vtype_id']=cleanMe($c);
				$data['car_id']=cleanMe($d);
			 
				$model1       = new CarRentalModel();
				
				$updateCarDetail    = $model1->updateCarDetail($data);
				 
				header('location:../../../../vehicleTypeCarList/'.$data['cid'].'/'.$data['location_id'].'/'.$data['vtype_id']);	
			}
		} 
		
		public static function checkRegistrationNumber($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['car_id']=cleanMe($a);
				$model1       = new CarRentalModel();
				$checkRegistrationNumber    = $model1->checkRegistrationNumber($data);
				echo $checkRegistrationNumber; die;
				}				
		}
		
	}
?>