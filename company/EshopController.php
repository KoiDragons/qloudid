<?php
	
	require_once 'EshopModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class EshopController
	{
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
				$model = new EshopModel();
				$allServices = $model->allServices($data);
				echo $allServices; die;
			}
		}
		
		public static function serviceInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new EshopModel();
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
				$completeServiceInfo    = $model->completeServiceInfo($data);
				//print_r($completeServiceInfo); die;
				$row_summary    = $model->userSummary($data);
				require_once('EshopServiceListView.php');
			}
		}
		
		
		public static function photoInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new EshopModel();
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
				$displayPhotos     = $model->displayPhotos($data);
				//print_r($completeServiceInfo); die;
				$row_summary    = $model->userSummary($data);
				require_once('EshopPhotoListView.php');
			}
		}
		
		public static function getPhoto($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new EshopModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($co);
				 
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
				$model1       = new EshopModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($co);
				 
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
				$model1       = new EshopModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($co);
				$result    = $model1->deletePhoto($data);
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
				$model1       = new EshopModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($co);
				$result    = $model1->updatePhotos($data);
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
				$model1       = new EshopModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($co);
				$result    = $model1->updatePhotoOrder($data);
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
				$model1       = new EshopModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($co);
				$result    = $model1->updatePhotoDragging($data);
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		
		
		public static function deleteMenuItem($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				 
				$data['mid']=cleanMe($b);
				$model       = new EshopModel();
				$deleteMenuItem = $model->deleteMenuItem($data);	
				header("location:../../serviceInformation/".$data['cid']);
			}	
		} 
		
		  public static function servicesDescription($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new EshopModel();
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
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$EshopCategories    = $model->EshopCategories($data);
				$row_summary    = $model->userSummary($data);
				require_once('EshopServiceInformationView.php');
			}
		}
	 
	 
		 
		public static function addService($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EshopModel();
				$addService = $model->addService($data);	
				header("location:../serviceInformation/".$data['cid']);
			}	
		} 
		
		
		
		public static function categories($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new EshopModel();
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
				$EshopCategories    = $model->EshopCategories($data);
				$row_summary    = $model->userSummary($data);
				require_once('EshopCategoriesView.php');
			}
		}
	 
	 	public static function aboutInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new EshopModel();
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
				$companyWorkCount    = $model->companyWorkCount($data);
				$eshopAboutCount    = $model->eshopAboutCount($data);
				$data['locations']=$eshopAboutCount['physical_location'];
				$locationDetail    = $model->locationDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('EshopAboutInformationView.php');
			}
		}
	 
	 public static function categoriesInfoEdit($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new EshopModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['cateid']=cleanMe($b);
				 
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
				$EshopCategoriesDetail    = $model->EshopCategoriesDetail($data);
				$EshopCategories    = $model->eshopEditCategories($data);
				$row_summary    = $model->userSummary($data);
				require_once('EshopEditCategoriesView.php');
			}
		}
		
	 public static function categoryDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new EshopModel();
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
				$EshopCategories    = $model->eshopCategoriesLimit($data);
				$eshopCategoriesCount    = $model->eshopCategoriesCount($data);
				$row_summary    = $model->userSummary($data);
				require_once('EshopAddCategoriesView.php');
			}
		}
		
		
		public static function moreCategories($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCustomersModel();
				$moreCategories = $model->moreEshopCategories($data);
				echo $moreCategories; die;
			}
		}
	 
	
	
		
	 public static function addCategory($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EshopModel();
				$addCategory = $model->addCategory($data);	
				header("location:../categories/".$data['cid']);
			}	
		} 
		
		
		 public static function updateAboutInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EshopModel();
				$updateAboutInformation = $model->updateAboutInformation($data);	
				header("location:../aboutInformation/".$data['cid']);
			}	
		} 
		
		public static function editCategory($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['cateid']=cleanMe($b);
				$model       = new EshopModel();
				$editCategory = $model->editCategory($data);	
				header("location:../../categories/".$data['cid']);
			}	
		}   
		
	}
?>