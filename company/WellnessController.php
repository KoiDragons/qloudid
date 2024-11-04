<?php
	
	require_once 'WellnessModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class WellnessController
	{
		public static function approveHealthServiceRequest($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['wid']=cleanMe($b); 
				$data['id']=cleanMe($c); 
				$model       = new WellnessModel();
				$approveHealthServiceRequest = $model->approveHealthServiceRequest($data);	
				header("location:../../../healthServiceRequests/".$data['cid']."/".$data['wid']);
			}	
		} 
		
		 public static function updateHealthServiceMenu($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['wid']=cleanMe($b);
				$data['hid']=cleanMe($c);
				$model       = new WellnessModel();
				$updateHealthServiceMenu = $model->updateHealthServiceMenu($data);	
				header("location:../../../healthServiceRequests/".$data['cid']."/".$data['wid']);
			}	
		}
		public static function healthServiceRequests($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new WellnessModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['wid']=cleanMe($b);
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
				$healthServiceRequests    = $model->healthServiceRequests($data);
				$row_summary    = $model->userSummary($data);
				require_once('WellnessHealthServiceRequestView.php');
			}
		}
		
	  public static function healthServiceMenuInformation($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new WellnessModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['wid']=cleanMe($b);
				$data['hid']=cleanMe($c);
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
				$companyDetail    = $model->companyDetail($data);
				$completeMenu    = $model->completeHealthServiceMenuInfo($data);
				$healthServiceRequestDetail    = $model->healthServiceRequestDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('WellnessHealthServiceMenuInformationView.php');
			}
		}
	 	  
		 
		
		public static function categories($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new WellnessModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['wid']=cleanMe($b);
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
				 
				$wellnessDetail    = $model->wellnessDetailInfo($data);
				$wellnessCategories    = $model->wellnessCategories($data);
				$row_summary    = $model->userSummary($data);
				require_once('WellnessCategoriesView.php');
			}
		}
	 public static function allServices($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['wid']=cleanMe($b);
				$model = new WellnessModel();
				$allServices = $model->allServices($data);
				echo $allServices; die;
			}
		}
		
		public static function serviceInformation($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new WellnessModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['wid']=cleanMe($b);
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
				$completeServiceInfo    = $model->completeServiceInfo($data);
				//print_r($completeServiceInfo); die;
				$row_summary    = $model->userSummary($data);
				require_once('WellnessServiceListView.php');
			}
		}
		
		public static function deleteMenuItem($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['wid']=cleanMe($b);
				$data['mid']=cleanMe($c);
				$model       = new WellnessModel();
				$deleteMenuItem = $model->deleteMenuItem($data);	
				header("location:../../../serviceInformation/".$data['cid']."/".$data['wid']);
			}	
		} 
		
	 public static function categoryDetail($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new WellnessModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['wid']=cleanMe($b);
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
				 
				$wellnessDetail    = $model->wellnessDetailInfo($data);
				$wellnessCategories    = $model->wellnessCategories($data);
				$row_summary    = $model->userSummary($data);
				require_once('WellnessAddCategoriesView.php');
			}
		}
	 
	  public static function servicesDescription($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new WellnessModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['wid']=cleanMe($b);
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
				 
				$wellnessDetail    = $model->wellnessDetailInfo($data);
				$wellnessCategories    = $model->wellnessCategories($data);
				$row_summary    = $model->userSummary($data);
				require_once('WellnessServiceInformationView.php');
			}
		}
	 
	 
		public static function availableLocations($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new WellnessModel();
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
				 
				$wellnessDetail    = $model->wellnessDetail($data);
				
				$wellnessCount    = $model->wellnessCount($data);
				$row_summary    = $model->userSummary($data);
				require_once('WellnessView.php');
			}
		}
		
		public static function wellnessInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new WellnessModel();
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
				$row_summary    = $model->userSummary($data);
				require_once('WellnessInfoView.php');
			}
		}
		public static function addService($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['wid']=cleanMe($b); 
				$model       = new WellnessModel();
				$addService = $model->addService($data);	
				header("location:../../serviceInformation/".$data['cid']."/".$data['wid']);
			}	
		} 
		
		
		  public static function editWellnessInformation($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new WellnessModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['wid']=cleanMe($b);
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
				$wellnessDetailInfo    = $model->wellnessDetailInfo($data);
				$workingHrs    = $model->workingHrs($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$locationDetail    = $model->locationDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('WellnessEditInfoView.php');
			}
		}
		  
	 	public static function moreWellnessDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new WellnessModel();
				$moreWellnessDetail = $model->moreWellnessDetail($data);
				echo $moreWellnessDetail; die;
			}
		}
		
		public static function addWellnessInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new WellnessModel();
				$addWellnessInfo = $model->addWellnessInfo($data);	
				header("location:../availableLocations/".$data['cid']);
			}	
		} 
		
		public static function editWellnessInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['wid']=cleanMe($b);
				$model       = new WellnessModel();
				$editWellnessInfo = $model->editWellnessInfo($data);	
				header("location:../../availableLocations/".$data['cid']);
			}	
		} 
		
		
	 public static function addCategory($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['wid']=cleanMe($b);
				$model       = new WellnessModel();
				$addCategory = $model->addCategory($data);	
				header("location:../../categories/".$data['cid']."/".$data['wid']);
			}	
		} 
		
		 public static function deleteCategory($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['wid']=cleanMe($b);
				$data['id']=cleanMe($c);
				$model       = new WellnessModel();
				$deleteCategory = $model->deleteCategory($data);	
				header("location:../../../categories/".$data['cid']."/".$data['wid']);
			}	
		} 
		
	}
?>