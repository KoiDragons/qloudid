<?php
	
	require_once 'DryCleaningModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class DryCleaningController
	{
		 
		public static function availableLaundromat($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new DryCleaningModel();
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
				 
				$dryCleaningDetail    = $model->dryCleaningDetail($data);
				
				$dryCleaningCount    = $model->dryCleaningCount($data);
				
				if($dryCleaningCount['num']==0)
				{
				header("location:../dryCleaningInformation/".$data['cid']);	 die;
				}
				$row_summary    = $model->userSummary($data);
				require_once('DryCleaningView.php');
			}
		}
		
		public static function dryCleaningInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new DryCleaningModel();
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
				require_once('DryCleaningInfoView.php');
			}
		}
		  
		  public static function editDryCleaningInformation($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new DryCleaningModel();
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
				$DryCleaningDetailInfo    = $model->dryCleaningDetailInfo($data);
				$workingHrs    = $model->workingHrs($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$locationDetail    = $model->locationDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('DryCleaningEditInfoView.php');
			}
		}
		  
	 	public static function moreDryCleaningDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new DryCleaningModel();
				$moreDryCleaningDetail = $model->moreDryCleaningDetail($data);
				echo $moreDryCleaningDetail; die;
			}
		}
		
		public static function addDryCleaningInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new DryCleaningModel();
				$addDryCleaningInfo = $model->addDryCleaningInfo($data);	
				header("location:../availableLaundromat/".$data['cid']);
			}	
		} 
		
		public static function editDryCleaningInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['wid']=cleanMe($b);
				$model       = new DryCleaningModel();
				$editDryCleaningInfo = $model->editDryCleaningInfo($data);	
				header("location:../../availableLaundromat/".$data['cid']);
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
				$model       = new DryCleaningModel();
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
				$dryCleaningDetailInfo    = $model->dryCleaningDetailInfo($data);
				$drycleaningServicesCount    = $model->drycleaningServicesCount($data);
				if($drycleaningServicesCount==0)
				{
					header("location:../../servicePriceInformation/".$data['cid']."/".$data['wid']); die;
				}
				$drycleaningServices    = $model->drycleaningServices($data);
				$washingServices    = $model->washingServices($data);
				$ironingServices    = $model->ironingServices($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$locationDetail    = $model->locationDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('DryCleaningServicesInfoView.php');
			}
		}
		
		
		public static function roomServiceRequests($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new DryCleaningModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
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
				$roomServiceRequests    = $model->roomServiceRequests($data);
				$row_summary    = $model->userSummary($data);
				require_once('DryCleaningServiceRequestView.php');
			}
		}
	 
	 public static function approveRoomServiceRequest($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b); 
				$data['id']=cleanMe($c); 
				$model       = new DryCleaningModel();
				$approveRoomServiceRequest = $model->approveRoomServiceRequest($data);	
				header("location:../../../roomServiceRequests/".$data['cid']."/".$data['rid']);
			}	
		} 
	 
	  public static function editServicePrice($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new DryCleaningModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['wid']=cleanMe($b);
				$data['sid']=cleanMe($c);
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
				
				$dryCleaningServiceDetail    = $model->dryCleaningServiceDetail($data); 
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$locationDetail    = $model->locationDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('DryCleaningEditServicePriceInfoView.php');
			}
		}
	 
	 public static function servicePriceInformation($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new DryCleaningModel();
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
				
				$dryCleaningDetailInfo    = $model->dryCleaningDetailInfo($data); 
				if($dryCleaningDetailInfo['total']==0)
				{
				header("location:../../serviceInformation/".$data['cid']."/".$data['wid']);
					die;	
				}
				
				$data['category_id']=$dryCleaningDetailInfo['total'];
				$availableServicesType    = $model->availableServicesType($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$locationDetail    = $model->locationDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('DryCleaningServicePriceInfoView.php');
			}
		}
	 
	 public static function availableServicesType($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['wid']=cleanMe($a);
				$data['category_id']=$_POST['category_id'];
				$model = new DryCleaningModel();
				$availableServicesType = $model->availableServicesType($data);
				echo $availableServicesType; die;
			}
		}
		
		public static function selectedServicesType($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['wid']=cleanMe($a);
				$data['category_id']=$_POST['category_id'];
				$model = new DryCleaningModel();
				$selectedServicesType = $model->selectedServicesType($data);
				echo $selectedServicesType; die;
			}
		}
		
		public static function addDryCleaningPriceInfo($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['wid']=cleanMe($b);
				$model       = new DryCleaningModel();
				$addDryCleaningPriceInfo = $model->addDryCleaningPriceInfo($data);	
				header("location:../../serviceInformation/".$data['cid']."/".$data['wid']);
			}	
		} 
		
		public static function updateDryCleaningPriceInfo($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['wid']=cleanMe($b);
				$data['sid']=cleanMe($c);
				$model       = new DryCleaningModel();
				$updateDryCleaningPriceInfo = $model->updateDryCleaningPriceInfo($data);	
				header("location:../../../serviceInformation/".$data['cid']."/".$data['wid']);
			}	
		} 
		
		 public static function roomServiceMenuInformation($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new DryCleaningModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
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
				$completeMenu    = $model->completeRoomServiceMenu($data);
				$roomServiceRequestDetail    = $model->roomServiceRequestDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('DryCleaningGuestServiceMenuInformationView.php');
			}
		}
	 	 	 
		public static function updateRoomServiceMenu($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['hid']=cleanMe($c);
				$model       = new DryCleaningModel();
				$updateRoomServiceMenu = $model->updateRoomServiceMenu($data);	
				header("location:../../../roomServiceRequests/".$data['cid']."/".$data['rid']);
			}	
		}  
	
		
		
	}
?>