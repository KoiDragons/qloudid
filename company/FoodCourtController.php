<?php
	
	require_once 'FoodCourtModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class FoodCourtController
	{
		
		public static function photoInformation($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new FoodCourtModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['fid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				  
				$selectedDish    = $model->selectedDish($data);
				 
				$companyDetail    = $model->companyDetail($data);
				$displayPhotos    = $model->displayPhotos($data); 
				$row_summary    = $model->userSummary($data);
				require_once('FoodCourtPhotoInfoView.php');
			}
		}
		
		public static function updatePhotos($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new FoodCourtModel();
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
				$model1       = new FoodCourtModel();
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
				$model1       = new FoodCourtModel();
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
				$model1       = new FoodCourtModel();
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
				$model1       = new FoodCourtModel();
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
				$model1       = new FoodCourtModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($co);
				$result    = $model1->updatePhotoDragging($data);
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		
		
		
		
		
		public static function dishesInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new FoodCourtModel();
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
				
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$dishesList    = $model->dishesList($data);
				$dishesCount    = $model->dishesCount($data);
				$row_summary    = $model->userSummary($data);
				require_once('FoodCourtView.php');
			}
		}
		
		public static function selectedProfessionalCategoryServicesDetail($a=null)
		{
			 
				$model       = new FoodCourtModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$selectedProfessionalCategoryServicesDetail    = $model->selectedProfessionalCategoryServicesDetail($data);  
				echo $selectedProfessionalCategoryServicesDetail; die;
		}
		
		public static function selectedProfessionalCategoryAvailableLocation($a=null)
		{
			 
				$model       = new FoodCourtModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$selectedProfessionalCategoryAvailableLocation    = $model->selectedProfessionalCategoryAvailableLocation($data);  
				echo $selectedProfessionalCategoryAvailableLocation; die;
		}
		
		public static function countSelectedProfessionalCategoryAvailableLocation($a=null)
		{
			 
				$model       = new FoodCourtModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$countSelectedProfessionalCategoryAvailableLocation    = $model->countSelectedProfessionalCategoryAvailableLocation($data);  
				echo $countSelectedProfessionalCategoryAvailableLocation; die;
		}
		
		public static function pickaproServicesInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new FoodCourtModel();
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
				
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$dishesList    = $model->pickaproServicesList($data);
				$dishesCount    = $model->servicesCount($data);
				$row_summary    = $model->userSummary($data);
				require_once('FoodCourtPickaproServicesView.php');
			}
		}
		
		
		public static function removePickaproListing($a=null, $b=null)
		{
			 
				$model       = new FoodCourtModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$data['pick_id']=cleanMe($b);
				$removePickaproListing    = $model->removePickaproListing($data);  
				header('location:../../pickaproServicesInformation/'.$data['cid']);
		}
		public static function relistPickaproListing($a=null, $b=null)
		{
			 
				$model       = new FoodCourtModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$data['pick_id']=cleanMe($b);
				$relistPickaproListing    = $model->relistPickaproListing($data);  
				header('location:../../pickaproServicesInformation/'.$data['cid']);
		}
		
		public static function servicesInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new FoodCourtModel();
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
				
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$dishesList    = $model->servicesList($data);
				$dishesCount    = $model->servicesCount($data);
				$row_summary    = $model->userSummary($data);
				require_once('FoodCourtServicesView.php');
			}
		}
		
		
		public static function servicesMarketplaceInformation($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new FoodCourtModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['fid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$selectedDish    = $model->selectedDish($data);
				$data['subcategory_id']=$selectedDish['professional_subcategory_id'];
				$marketPlaceDetailInfo    = $model->marketPlaceDetailInfo($data);
				 
				$row_summary    = $model->userSummary($data);
				require_once('FoodCourtServicesMarketplaceView.php');
			}
		}
		
		
		public static function updateMarketplace($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model       = new FoodCourtModel();
				$updateMarketplace    = $model->updateMarketplace($data);
				echo $updateMarketplace; die;
				}
		}
		
		public static function updateAllMarketplace($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['fid']=cleanMe($b);
				$model       = new FoodCourtModel();
				$updateAllMarketplace    = $model->updateAllMarketplace();
				$marketPlaceDetailInfo    = $model->marketPlaceDetailInfo();
				echo $updateAllMarketplace; die;
				}
		}
		
		
		public static function addDishDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				 
				$model       = new FoodCourtModel();
				$addDishDetail = $model->addDishDetail($data);	
				header("location:../photoInformation/".$data['cid'].'/'.$addDishDetail); die;	
				/*if($_POST['product_type']==1)
				{
				header("location:../dishesInformation/".$data['cid']); die;	
				}
				else if($_POST['product_type']==2)
				{
					
				header("location:../servicesInformation/".$data['cid']); die;	
				}*/
			}	
		} 
		
		 public static function foodInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new FoodCourtModel();
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
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$dishesList    = $model->dishesFoodList($data);
				$dishesCount    = $model->dishesFoodCount($data);
				$row_summary    = $model->userSummary($data);
				require_once('FoodCourtItemView.php');
			}
		}
		
		public static function dishDetailInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new FoodCourtModel();
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
				$workingHrs    = $model->workingHrs();
				$dayDetail    = $model->dayDetail();
				$bookableServiceCategories    = $model->bookableServiceCategories($data); 
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$foodTypeInformation    = $model->foodTypeInformation();
				$variationDetail    = $model->variationDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('FoodDescriptionView.php');
			}
		}
		
		
		public static function serviceInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new FoodCourtModel();
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
				$selectedProfessionalCategoryDetail    = $model->selectedProfessionalCategoryDetail($data);
				 
				$workingHrs    = $model->workingHrs();
				$dayDetail    = $model->dayDetail();
				$bookableServiceCategories    = $model->bookableServiceCategories($data); 
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$foodTypeInformation    = $model->foodTypeInformation();
				$variationDetail    = $model->variationDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('FoodCourtServiceDescriptionView.php');
			}
		}
		
		public static function foodDetailInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new FoodCourtModel();
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
				 
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$foodTypeInformation    = $model->foodTypeInformation();
				 
				$row_summary    = $model->userSummary($data);
				require_once('FoodItemDescriptionView.php');
			}
		}
		
		
		
		public static function editDishInformation($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new FoodCourtModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['fid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$bookableServiceCategories    = $model->bookableServiceCategories($data);  
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$selectedDish    = $model->selectedDish($data);
				if($selectedDish['is_physical']==2)
				{
					header('location:../../editServiceInformation/'.$data['cid'].'/'.$data['fid']); die;
				}
				$availableVariationInfo    = $model->availableVariationInfo($data);
				$data['warning']=$selectedDish['dish_warnings'];
				$foodTypeInformation    = $model->foodTypeInformationSelected($data);
				$selectedVariationDetail    = $model->selectedVariationDetail($data); 
				$editableVariationDetail    = $model->editableVariationDetail($data);  
				$selectedDishRecurringInfo    = $model->selectedDishRecurringInfo($data);  
				$workingHrs    = $model->workingHrs($data);  
				$row_summary    = $model->userSummary($data);
				require_once('FoodEditDescriptionView.php');
			}
		}
		
		
		public static function editServiceInformation($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new FoodCourtModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['fid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$bookableServiceCategories    = $model->bookableServiceCategories($data);  
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$selectedDish    = $model->selectedDish($data);
				$data['catg_id']=$selectedDish['professional_category_id'];
				$data['is_physical']=$selectedDish['is_physical'];
				if($selectedDish['is_physical']==1)
				{
					header('location:../../editDishInformation/'.$data['cid'].'/'.$data['fid']); die;
				}
				$selectedCategoryServicesDetail    = $model->selectedCategoryServicesDetail($data);
				$selectedProfessionalCategoryDetail    = $model->selectedProfessionalCategoryDetail($data);
				$availableVariationInfo    = $model->availableVariationInfo($data);
				$data['warning']=$selectedDish['dish_warnings'];
				$foodTypeInformation    = $model->foodTypeInformationSelected($data);
				$selectedVariationDetail    = $model->selectedVariationDetail($data); 
				$editableVariationDetail    = $model->editableVariationDetail($data);  
				$selectedDishRecurringInfo    = $model->selectedDishRecurringInfo($data);  
				$workingHrs    = $model->workingHrs($data);  
				$row_summary    = $model->userSummary($data);
				$selectedProfessionalCategoryLocation    = $model->selectedProfessionalCategoryLocation($data);
				require_once('FoodCourtServiceEditDescriptionView.php');
			}
		}
		
		public static function dishProfileInformation($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new FoodCourtModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['fid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$bookableServiceCategories    = $model->bookableServiceCategories($data);  
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$selectedDish    = $model->selectedDish($data);
				$availableVariationInfo    = $model->availableVariationInfo($data);
				$data['warning']=$selectedDish['dish_warnings'];
				$foodTypeInformation    = $model->foodTypeInformationSelected($data);
				$selectedVariationDetail    = $model->selectedVariationDetail($data); 
				$editableVariationDetail    = $model->editableVariationDetail($data);  
				$selectedDishRecurringInfo    = $model->selectedDishRecurringInfo($data);  
				$workingHrs    = $model->workingHrs($data);  
				$row_summary    = $model->userSummary($data);
				require_once('FoodProfileDescriptionView.php');
			}
		}
		
		
		public static function addEmployeeService($a=null, $b=null)
		{
			 
				$model       = new FoodCourtModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$data['fid']=cleanMe($b);
				 
				$addEmployeeService    = $model->addEmployeeService($data);  
				 echo $addEmployeeService; die;
		}
		
		
		public static function removeEmployeeService($a=null, $b=null)
		{
			 
				$model       = new FoodCourtModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$data['fid']=cleanMe($b);
				$removeEmployeeService    = $model->removeEmployeeService($data);  
				echo $removeEmployeeService; die;
		}
		
		public static function dishEmployeeInformation($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new FoodCourtModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['fid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$bookableServiceCategories    = $model->bookableServiceCategories($data);  
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$employeeList    = $model->employeeList($data);
				 
				$row_summary    = $model->userSummary($data);
				require_once('FoodCourtEmployeeInfoView.php');
			}
		}
		
		 public static function editFoodDishInformation($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new FoodCourtModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['fid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				 
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$selectedDish    = $model->selectedDish($data);
				 
				$data['warning']=$selectedDish['dish_warnings'];
				$foodTypeInformation    = $model->foodTypeInformationSelected($data);
				  
				$row_summary    = $model->userSummary($data);
				require_once('FoodItemEditDescriptionView.php');
			}
		}
			public static function moreDishesDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new FoodCourtModel();
				$moreDishesDetail = $model->moreDishesDetail($data);
				echo $moreDishesDetail; die;
			}
		}
		
		
		public static function moreServicesDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new FoodCourtModel();
				$moreServicesDetail = $model->moreServicesDetail($data);
				echo $moreServicesDetail; die;
			}
		}
		
			public static function moreDishesFoodDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new FoodCourtModel();
				$moreDishesDetail = $model->moreDishesFoodDetail($data);
				echo $moreDishesDetail; die;
			}
		}
		
		public static function addVariantToList($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['fid']=cleanMe($a);
				$model = new FoodCourtModel();
				$addVariantToList = $model->addVariantToList($data);
				echo $addVariantToList; die;
			}
		}
		
		public static function availableVariationInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['fid']=cleanMe($b);
				$model = new FoodCourtModel();
				$availableVariationInfo = $model->availableVariationInfo($data);
				echo $availableVariationInfo; die;
			}
		}
		public static function updateRow()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				
				$model = new FoodCourtModel();
				$updateRow = $model->updateRow();
				echo $updateRow; die;
			}
		}
		
		public static function deleteRow()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				
				$model = new FoodCourtModel();
				$deleteRow = $model->deleteRow();
				echo $deleteRow; die;
			}
		}
		
		public static function deleteOption($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['fid']=cleanMe($b);
				$model = new FoodCourtModel();
				$deleteOption = $model->deleteOption($data);
				echo $deleteOption; die;
			}
		}
		
		public static function updateVariation($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['fid']=cleanMe($b);
				$model = new FoodCourtModel();
				$updateVariation = $model->updateVariation($data);
				header('location:../../editDishInformation/'.$data['cid'].'/'.$data['fid']);
			}
		}
		
		
		public static function createVariationInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new FoodCourtModel();
				$createVariationInfo = $model->createVariationInfo($data);
				echo $createVariationInfo; die;
			}
		}
		
		public static function selectSubvariation()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				 
				$model = new FoodCourtModel();
				$selectSubvariation = $model->selectSubvariation();
				echo $selectSubvariation; die;
			}
		}
		
		
		
		public static function addDishFoodDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				 
				$model       = new FoodCourtModel();
				$addDishFoodDetail = $model->addDishFoodDetail($data);	
				header("location:../foodInformation/".$data['cid']);
			}	
		} 
		
		
		public static function editDishDetail($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['fid']=cleanMe($b); 
				$model       = new FoodCourtModel();
				$editDishDetail = $model->editDishDetail($data);	
				header("location:../../dishesInformation/".$data['cid']);
			}	
		} 
		
		
		public static function editServiceDetail($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['fid']=cleanMe($b); 
				$model       = new FoodCourtModel();
				$editServiceDetail = $model->editDishDetail($data);	
				header("location:../../servicesInformation/".$data['cid']);
			}	
		} 
		 
		 public static function editDishItemDetail($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['fid']=cleanMe($b); 
				$model       = new FoodCourtModel();
				$editDishDetail = $model->updateDishFoodDetail($data);	
				header("location:../../foodInformation/".$data['cid']);
			}	
		} 
		
	}
?>