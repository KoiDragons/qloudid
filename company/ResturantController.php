<?php
	
	require_once 'ResturantModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class ResturantController
	{  
		
		public static function photoInformation($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new ResturantModel();
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
				$resturantinfo    = $model->resturantinfo($data);
				 
				$companyDetail    = $model->companyDetail($data);
				$displayPhotos    = $model->displayPhotos($data); 
				$row_summary    = $model->userSummary($data);
				require_once('ResturantPhotoInfoView.php');
			}
		}
		
		public static function updatePhotos($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new ResturantModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($co);
				$result    = $model1->updatePhotos($data);
				echo $result; die;
				}
		}
		
		public static function getImageInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new ResturantModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($co);
				 
				$result    = $model1->getImageInfo($data);
				echo $result; die;
				}
		}
		
		public static function getPhoto($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new ResturantModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($co);
				 
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		
		public static function updatePhotoOrder($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new ResturantModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($co);
				$result    = $model1->updatePhotoOrder($data);
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		
		public static function deletePhoto($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new ResturantModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($co);
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
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new ResturantModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($co);
				$result    = $model1->updatePhotoDragging($data);
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		
		public static function updateFoodCategoryPackageMenu($a=null, $b=null, $c=null, $d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['pid']=cleanMe($c);
				$data['pcid']=cleanMe($d);
				$model       = new ResturantModel();
				$packageCategoryInfo = $model->packageCategoryInfo($data);	
				$data['current_items']=$packageCategoryInfo['available_package_dishes'];
				$updateFoodCategoryPackageMenu = $model->updateFoodCategoryPackageMenu($data);	
				header("location:../../../../packagesItemList/".$data['cid']."/".$data['rid']."/".$data['pid']);
			}	
		} 
	
		public static function removeItemFromPackage($a=null, $b=null, $c=null, $d=null, $e=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['pid']=cleanMe($c);
				$data['pcid']=cleanMe($d);
				$data['dish_id']=cleanMe($e);
				$model       = new ResturantModel();
				$packageCategoryInfo = $model->packageCategoryInfo($data);	
				$data['current_items']=$packageCategoryInfo['available_package_dishes'];
				$removeItemFromPackage = $model->removeItemFromPackage($data);	
				header("location:../../../../../packagesItemList/".$data['cid']."/".$data['rid']."/".$data['pid']);
			}	
		} 
		
		
		public static function menuQrInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 $path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				require_once('ResturantMenuQrView.php'); 
			}	
		} 
		
		
	
	
		public static function packagesItemList($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new ResturantModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['pid']=cleanMe($c);
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
				$resturantPackageItemDetail    = $model->resturantPackageItemDetail($data);
				//echo '<pre>'; print_r($resturantPackageItemDetail); echo '</pre>';  die;
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('ResturantPackageDishesAvailableView.php');
			}
		}
		
		
		public static function SelectPackagesItems($a=null, $b=null, $c=null, $d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../../";
				$model       = new ResturantModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['pid']=cleanMe($c);
				$data['pcid']=cleanMe($d);
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
					header('location:../../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$packageCategoryItemList    = $model->packageCategoryItemList($data);
				$packageCategoryInfo    = $model->packageCategoryInfo($data); 
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('ResturantPackageServiceMenuListView.php');
			}
		}
		
		
		public static function packagesList($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new ResturantModel();
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
				$resturantPackageDetail    = $model->resturantPackageDetail($data);
				 
				$resturantPackageCount    = $model->resturantPackageCount($data);
				if($resturantPackageCount['num']==0)
				{
					header("location:../../packagesInfo/".$data['cid']."/".$data['rid']);
				}
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('ResturantPackageView.php');
			}
		}
		
		public static function packagesInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new ResturantModel();
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
				$resturantWorkCount    = $model->resturantWorkCount($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('ResturantPackageInfoView.php');
			}
		}
		
			public static function moreResturantPackageDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['rid']=cleanMe($a);
				$model = new ResturantModel();
				$moreResturantPackageDetail = $model->moreResturantPackageDetail($data);
				echo $moreResturantPackageDetail; die;
			}
		}
		
		public static function addResturantPackage($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$model       = new ResturantModel();
				$addResturantPackage = $model->addResturantPackage($data);	
				header("location:../../packagesList/".$data['cid']."/".$data['rid']);
			}	
		} 
		
	
		public static function updateDiningHallName($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new ResturantModel();
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
		public static function updateTableTypeInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new ResturantModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($co);
				$result    = $model1->updateTableTypeInfo($data);
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
				$model1       = new ResturantModel();
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
		public static function addTableToHall($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new ResturantModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($co);
				$result    = $model1->addTableToHall($data);
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
				$model1       = new ResturantModel();
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
				$model1       = new ResturantModel();
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
		public static function addDiningHall($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new ResturantModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($co);
				$result    = $model1->addDiningHall($data);
				$result    = $model1->resturantDiningDetail($data);
				echo $result; die;
				}
		}
		 
		public static function roomServiceRequests($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new ResturantModel();
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
				$roomServiceRequests    = $model->roomServiceRequests($data);
				$row_summary    = $model->userSummary($data);
				require_once('ResturantRoomServiceRequestView.php');
			}
		}
		
			public static function dishDetailInformation($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new ResturantModel();
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
				$foodTypeInformation    = $model->foodTypeInformation();
				$resturantWorkCount    = $model->resturantWorkCount($data);
				$row_summary    = $model->userSummary($data);
				require_once('ResturantFoodDescriptionView.php');
			}
		}
		
		
			public static function approveRoomServiceRequest($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b); 
				$data['id']=cleanMe($c); 
				$model       = new ResturantModel();
				$approveRoomServiceRequest = $model->approveRoomServiceRequest($data);	
				header("location:../../../roomServiceRequests/".$data['cid']."/".$data['rid']);
			}	
		} 
		public static function addDishDetail($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b); 
				$model       = new ResturantModel();
				$addDishDetail = $model->addDishDetail($data);	
				header("location:../../menuInformation/".$data['cid']."/".$data['rid']);
			}	
		} 
		
		 public static function cuisineTypeInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new ResturantModel();
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
				$resturantinfo   = $model->resturantinfo($data); 
				$resturantCuisineInfo   = $model->resturantCuisineInfo($data); 
				if(empty($resturantCuisineInfo))
				{
				$dietaryOptions    = $model->dietaryOptions($data);	
				$kitchenType    = $model->kitchenType($data);	
				}
				else
				{
					$data['dietary_options']=$resturantCuisineInfo['dietary_options'];
					$dietaryOptions    = $model->dietaryOptionsSelected($data);
					$data['kitchen_options']=$resturantCuisineInfo['cuisine_type'];
					$kitchenType    = $model->kitchenOptionsSelected($data);
				}
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				 
				$resturantWorkCount    = $model->resturantWorkCount($data);
				$resturantinfo   = $model->resturantInfo($data); 
				
				$row_summary    = $model->userSummary($data);
				require_once('ResturantCuisineTypeInfoView.php');
			}
		}
	 
		 public static function categoryInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new ResturantModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				header("location:../../menuInformation/".$data['cid']."/".$data['rid']); die;
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
				$foodCategories    = $model->foodCategories($data);
				$row_summary    = $model->userSummary($data);
				require_once('ResturantFoodCategoriesView.php');
			}
		}
	 
	  public static function categoryDetail($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new ResturantModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				header("location:../../menuInformation/".$data['cid']."/".$data['rid']); die;
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
				 
				$row_summary    = $model->userSummary($data);
				require_once('ResturantFoodCategoriesDetailView.php');
			}
		}
	 
	  public static function addCategory($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$model       = new ResturantModel();
				$addCategory = $model->addCategory($data);	
				header("location:../../categoryInfo/".$data['cid']."/".$data['rid']);
			}	
		} 
		
		
		 public static function deleteCategory($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$model       = new ResturantModel();
				$deleteCategory = $model->deleteCategory($data);	
				header("location:../../categoryInfo/".$data['cid']."/".$data['rid']);
			}	
		} 
		
		
		public static function dishesInformation($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new ResturantModel();
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
				$foodCategory    = $model->foodCategory($data);
				$resturantWorkCount    = $model->resturantWorkCount($data);
				$resturantinfo   = $model->resturantInfo($data); 
				$workingHrs    = $model->workingHrs($data);
				$row_summary    = $model->userSummary($data);
				require_once('ResturantDishInformationView.php');
			}
		}
	 	 
	 public static function menuInformation($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new ResturantModel();
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
				$completeMenu    = $model->completeMenu($data);
				// echo '<pre>'; print_r($completeMenu); echo '</pre>'; die;
				$row_summary    = $model->userSummary($data);
				require_once('ResturantMenuInformationView.php');
			}
		}
	 	 
		 
		 public static function menuItemDetail($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new ResturantModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['mid']=cleanMe($c);
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
				$companyDetail    = $model->companyDetail($data);
				$menuItemDetailInformation    = $model->menuItemDetailInformation($data);
				$row_summary    = $model->userSummary($data);
				require_once('ResturantMenuItemInformationView.php');
			}
		}
	 	  
		 
		 
	 public static function roomServiceMenuInformation($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new ResturantModel();
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
				$companyDetail    = $model->companyDetail($data);
				$completeMenu    = $model->completeRoomServiceMenu($data);
				$roomServiceRequestDetail    = $model->roomServiceRequestDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('ResturantRoomServiceMenuInformationView.php');
			}
		}
	 	 	 
		public static function updateRoomServiceMenu($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['hid']=cleanMe($c);
				$model       = new ResturantModel();
				$updateRoomServiceMenu = $model->updateRoomServiceMenu($data);	
				header("location:../../../roomServiceRequests/".$data['cid']."/".$data['rid']);
			}	
		}  
	 public static function workingInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new ResturantModel();
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
				require_once('ResturantOpenInfoView.php');
			}
		}
		
		
		public static function publishResturant($a=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$model       = new ResturantModel();
				$data=array();
				$data['rid']=cleanMe($a);
				$publishResturant    = $model->publishResturant($data);
				echo $publishResturant; die;
			
		}
	 	 
		}
		public static function publishDropin($a=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$model       = new ResturantModel();
				$data=array();
				$data['rid']=cleanMe($a);
				$publishDropin    = $model->publishDropin($data);
				echo $publishDropin; die;
			
		}
	 	 
		}
		
		public static function publishDiningQueue($a=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$model       = new ResturantModel();
				$data=array();
				$data['rid']=cleanMe($a);
				$publishDiningQueue    = $model->publishDiningQueue($data);
				echo $publishDiningQueue; die;
			
		}
	 	 
		}
		
		public static function publishBookTable($a=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$model       = new ResturantModel();
				$data=array();
				$data['rid']=cleanMe($a);
				$publishBookTable    = $model->publishBookTable($data);
				echo $publishBookTable; die;
			
		}
	 	 
		}
		
		public static function publishMenu($a=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$model       = new ResturantModel();
				$data=array();
				$data['rid']=cleanMe($a);
				$publishMenu    = $model->publishMenu($data);
				echo $publishMenu; die;
			
		}
	 	 
		}
		 public static function publishInformation($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new ResturantModel();
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
				$data['app_id']    = $model->appIdDropIn();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$resturantDiningHallList   = $model->resturantDiningHallList($data);  
				$resturantWorkCount    = $model->resturantWorkCount($data);
				$resturantinfo   = $model->resturantInfo($data); 
				$row_summary    = $model->userSummary($data);
				require_once('ResturantPublishInfoView.php');
			}
		}
		
		 
	 
	  
	 
	  public static function mobileMenu($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new ResturantModel();
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
				 
				$resturantWorkCount    = $model->resturantPaymentInformation($data);
				$resturantinfo   = $model->resturantInfo($data); 
				 
				$row_summary    = $model->userSummary($data);
				require_once('ResturantMobileMenuView.php');
			}
		}
	 
	 
	 
		public static function availableResturant($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new ResturantModel();
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
				 
				$resturantDetail    = $model->resturantDetail($data);
				
				$resturantCount    = $model->resturantCount($data);
				$row_summary    = $model->userSummary($data);
				require_once('ResturantView.php');
			}
		}
		
		public static function resturantInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new ResturantModel();
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
				$broadcastDetail    = $model->broadcastDetail($data);
				$paymentType    = $model->paymentType($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$locationDetail    = $model->locationDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('ResturantInfoView.php');
			}
		}
		
		public static function editResturantInformation($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new ResturantModel();
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
				$resturantinfo    = $model->resturantinfo($data);
				$data['payment_info']=$resturantinfo['form_of_payment'];
				$data['b_info']=$resturantinfo['broadcast_channel'];
				$broadcastDetail    = $model->broadcastDetailSelected($data);
				$paymentType    = $model->paymentTypeSelected($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$locationDetail    = $model->locationDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('ResturantEditInfoView.php');
			}
		}
		
		
		  public static function allDishes($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$model = new ResturantModel();
				$allDishes = $model->allDishes($data);
				echo $allDishes; die;
			}
		}
		
		
		  public static function allCategories($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$model = new ResturantModel();
				$allCategories = $model->allCategories($data);
				echo $allCategories; die;
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
				$model = new ResturantModel();
				$moreResturantDetail = $model->moreResturantDetail($data);
				echo $moreResturantDetail; die;
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
				$model = new ResturantModel();
				$moreReservationList = $model->moreReservationList($data);
				echo $moreReservationList; die;
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
				$model = new ResturantModel();
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
				$model = new ResturantModel();
				$checkTableCapacity = $model->checkTableCapacity($data);
				echo $checkTableCapacity; die;
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
				$model = new ResturantModel();
				$moreReservationConfirmedList = $model->moreReservationConfirmedList($data);
				echo $moreReservationConfirmedList; die;
			}
		}
		
		public static function addResturant($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new ResturantModel();
				$addResturant = $model->addResturant($data);	
				header("location:../availableResturant/".$data['cid']);
			}	
		} 
		
		
		public static function updateResturant($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$model       = new ResturantModel();
				$updateResturant = $model->updateResturant($data);	
				header("location:../../workingInfo/".$data['cid']."/".$data['rid']);
			}	
		} 
		
		public static function addResturantCuisine($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$model       = new ResturantModel();
				$addResturantCuisine = $model->addResturantCuisine($data);	
				header("location:../../cuisineTypeInfo/".$data['cid']."/".$data['rid']);
			}	
		} 
		
		
		public static function addDishCategory($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$model       = new ResturantModel();
				$addDishCategory = $model->addDishCategory($data);	
				header("location:../../menuInformation/".$data['cid']."/".$data['rid']);
			}	
		} 
		
		public static function deleteMenuItem($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['mid']=cleanMe($c);
				$model       = new ResturantModel();
				$deleteMenuItem = $model->deleteMenuItem($data);	
				header("location:../../../menuInformation/".$data['cid']."/".$data['rid']);
			}	
		} 
		
		
		public static function updateMenuItem($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['mid']=cleanMe($c);
				$model       = new ResturantModel();
				$updateMenuItem = $model->updateMenuItem($data);	
				header("location:../../../menuInformation/".$data['cid']."/".$data['rid']);
			}	
		} 
		public static function addWorkingTimeInfo($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$model       = new ResturantModel();
				$addWorkingTimeInfo = $model->addWorkingTimeInfo($data);	
				header("location:../../availableResturant/".$data['cid']);
			}	
		} 
		
	 public static function editWorkingTimeInfo($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$model       = new ResturantModel();
				$editWorkingTimeInfo = $model->editWorkingTimeInfo($data);	
				header("location:../../availableResturant/".$data['cid']);
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
				$model       = new ResturantModel();
				$editBookingTimeInfo = $model->editBookingTimeInfo($data);	
				header("location:../../availableResturant/".$data['cid']);
			}	
		}
		
		 public static function updateMobileMenu($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$model       = new ResturantModel();
				$updateMobileMenu = $model->updateMobileMenu($data);	
				header("location:../../mobileMenu/".$data['cid']."/".$data['rid']);
			}	
		}
	}
?>