<?php
require_once 'PremiumQualifiedCleaningCompanyModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class PremiumQualifiedCleaningCompanyController
{
	public function domainImageInformation($a=null)
	{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../../";
		$data=array();
		$data['domain_id']=cleanMe($a);
		$model = new PremiumQualifiedCleaningCompanyModel();
		$adminSummary = $model->adminSummary();
		$professionalSubCategoryDetail = $model->selectedProfessionalDomainDetail($data);
		 
		require_once('PremiumQualifiedMarketplaceDomainimageView.php');	
	}
	}
	
	public function subscribersInformation($a=null)
	{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../../";
		$data=array();
		$data['domain_id']=cleanMe($a);
		$model = new PremiumQualifiedCleaningCompanyModel();
		$adminSummary = $model->adminSummary();
		$professionalCompaniesSubscriptionDetail = $model->PremiumQualifiedMarketplaceCompanyDetail($data);
		 
		require_once('PremiumQualifiedCompaniesSubscriptionDetailView.php');	
	}
	}
	
	
	public function addDomainImageInfo($a=null,$b=null)
	{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../../../";
		$data=array();
		$data['domain_id']=cleanMe($a);
		$model = new PremiumQualifiedCleaningCompanyModel();
		$adminSummary = $model->adminSummary();
		$addDomainImageInfo = $model->addDomainImageInfo($data);
		header('location:../marketplaceDomainList');	
	}
	}
	
	public function updateCategoryServiceAllTodos($a=null,$b=null)
		{
			 	$model1       = new PremiumQualifiedCleaningCompanyModel();
				$data=array();
				$data['mid']=cleanMe($a);
				$data['objectType']=cleanMe($b);
				$result    = $model1->updateCategoryServiceAllTodos($data);
				$result    = $model1->serviceTodoDetail($data);
				echo $result; die;
			
		}
		
	public function updateCategoryServiceTodo($a=null,$b=null)
		{
				$model1       = new PremiumQualifiedCleaningCompanyModel();
				$data=array();
				$data['mid']=cleanMe($a);
				$data['objectType']=cleanMe($b);
				$result    = $model1->updateCategoryServiceTodo($data);
				//$result    = $model1->serviceTodoDetail($data);
				echo $result; die;
			
		}
		
		
		public function updateCategoryPlanServiceAllTodos($a=null,$b=null,$c=null)
		{
			 	$model1       = new PremiumQualifiedCleaningCompanyModel();
				$data=array();
				$data['mid']=cleanMe($a);
				$data['sid']=cleanMe($b);
				$data['objectType']=cleanMe($c);
				$result    = $model1->updateCategoryPlanServiceAllTodos($data);
				$result    = $model1->serviceSubscriptionTodoDetail($data);
				echo $result; die;
			
		}
		
	public function updateCategoryPlanServiceTodo($a=null,$b=null,$c=null)
		{
				$model1       = new PremiumQualifiedCleaningCompanyModel();
				$data=array();
				$data['mid']=cleanMe($a);
				$data['sid']=cleanMe($b);
				$data['objectType']=cleanMe($c);
				$result    = $model1->updateCategoryPlanServiceTodo($data);
				//$result    = $model1->serviceTodoDetail($data);
				echo $result; die;
			
		}
		
		public function updateCategoryDstrictsAllTodos($a=null,$b=null)
		{
			 	$model1       = new PremiumQualifiedCleaningCompanyModel();
				$data=array();
				$data['mid']=cleanMe($a);
				$data['objectType']=cleanMe($b);
				$result    = $model1->updateCategoryDstrictsAllTodos($data);
				$result    = $model1->serviceTodoDetailDstricts($data);
				echo $result; die;
			
		}
		
	public function updateCategoryDstrictsServiceTodo($a=null,$b=null)
		{
				$model1       = new PremiumQualifiedCleaningCompanyModel();
				$data=array();
				$data['mid']=cleanMe($a);
				$data['objectType']=cleanMe($b);
				$result    = $model1->updateCategoryDstrictsServiceTodo($data);
				//$result    = $model1->serviceTodoDetail($data);
				echo $result; die;
			
		}
		
		
		
		public function updateCategoryNonPremiumAllTodos($a=null,$b=null)
		{
			 	$model1       = new PremiumQualifiedCleaningCompanyModel();
				$data=array();
				$data['mid']=cleanMe($a);
				$data['objectType']=cleanMe($b);
				$result    = $model1->updateCategoryNonPremiumAllTodos($data);
				$result    = $model1->serviceTodoDetailNonPremium($data);
				echo $result; die;
			
		}
		
	public function updateCategoryNonPremiumServiceTodo($a=null,$b=null)
		{
				$model1       = new PremiumQualifiedCleaningCompanyModel();
				$data=array();
				$data['mid']=cleanMe($a);
				$data['objectType']=cleanMe($b);
				$result    = $model1->updateCategoryNonPremiumServiceTodo($data);
				//$result    = $model1->serviceTodoDetail($data);
				echo $result; die;
			
		}
		
		
	public function updateMarketplaceCategoryList($a=null)
		{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else {
		$path = "../../../../";
		$model1       = new PremiumQualifiedCleaningCompanyModel();
		$data=array();
		$data['mid']=cleanMe($a);
		$data['objectType']=1;
		$data['set_object']=1;
		$professionalTodoUpdate    = $model1->professionalTodoUpdate($data);
		$serviceTodoDetail    = $model1->serviceTodoDetail($data);
		require_once('PremiumMarketplaceServiceCategoryTodoView.php');
		}
		}
		
		
		public function servicePlansAvailable($a=null,$b=null)
		{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else {
		$path = "../../../../../";
		$model1       = new PremiumQualifiedCleaningCompanyModel();
		$data=array();
		$data['mid']=cleanMe($a);
		$data['sid']=cleanMe($b);
		$data['objectType']=1;
		$data['set_object']=1;
		$professionalTodoUpdate    = $model1->professionalTodoUpdate($data);
		$serviceTodoDetail    = $model1->serviceSubscriptionTodoDetail($data);
		require_once('PremiumMarketplaceServiceSubscriptionCategoryTodoView.php');
		}
		}
		
		
		public function updateDstrictsCategoryList($a=null)
		{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else {
		$path = "../../../../";
		$model1       = new PremiumQualifiedCleaningCompanyModel();
		$data=array();
		$data['mid']=cleanMe($a);
		$data['objectType']=1;
		$data['set_object']=1;
		$professionalTodoUpdate    = $model1->professionalTodoUpdate($data);
		$serviceTodoDetail    = $model1->serviceTodoDetailDstricts($data);
		require_once('PremiumMarketplaceDstrictsCategoryTodoView.php');
		}
		}
		
		
		public function updateNonpremiumCategoryList($a=null)
		{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else {
		$path = "../../../../";
		$model1       = new PremiumQualifiedCleaningCompanyModel();
		$data=array();
		$data['mid']=cleanMe($a);
		$data['objectType']=1;
		$data['set_object']=1;
		$professionalTodoUpdate    = $model1->professionalTodoUpdate($data);
		$serviceTodoDetail    = $model1->serviceTodoDetailNonPremium($data);
		require_once('PremiumMarketplaceNonpremiumCategoryTodoView.php');
		}
		}
		
		
	public function marketplaceServicesList($a=null)
		{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else {
		$path = "../../../../";
		$model1       = new PremiumQualifiedCleaningCompanyModel();
		$data=array();
		$data['mid']=cleanMe($a);
		require_once('PremiumQualifiedCleaningCompanyMArketplaceServicesView.php');
		}
		}
		
		public function subscriptionAvailable($a=null)
		{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else {
		$path = "../../../../";
		$model1       = new PremiumQualifiedCleaningCompanyModel();
		$data=array();
		$data['mid']=cleanMe($a);
		$selectedMarketplaceDetail = $model1->selectedProfessionalMarketplaceDetail($data);
		require_once('PremiumQualifiedMarketplaceSubscriptionView.php');
		}
		}
		
		
		public function marketplaceSelectedDomainList($a=null)
		{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else {
		$path = "../../../../";
		$model1       = new PremiumQualifiedCleaningCompanyModel();
		$data=array();
		$data['mid']=cleanMe($a);
		$professionalMarketplaceSelectedDomain = $model1->professionalMarketplaceSelectedDomain($data);
		require_once('PremiumQualifiedCleaningCompanyMarketplaceSelectedDomainView.php');
		}
		}
		
		
		
		public function marketplaceSelectedMenuList($a=null)
		{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else {
		$path = "../../../../";
		$model1       = new PremiumQualifiedCleaningCompanyModel();
		$data=array();
		$data['mid']=cleanMe($a);
		$professionalMarketplaceSelectedMenu = $model1->professionalMarketplaceSelectedMenu($data);
		require_once('PremiumQualifiedCleaningCompanyMarketplaceSelectedMenuView.php');
		}
		}
		
		public function marketplaceNonpremiumService($a=null)
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				
				header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
			}
			else { 
			$path = "../../../../";
			 
			$data=array();
			$data['mid']=cleanMe($a);
			$model = new PremiumQualifiedCleaningCompanyModel();
			$adminSummary = $model->adminSummary();
			$professionalMarketplaceDetail = $model->professionalMarketplaceDstrictsSelected();
			require_once('PremiumMarketplaceNonPremiumActionView.php');	
		}
		} 
		public function marketplacePremiumDomainList($a=null)
		{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else {
		$path = "../../../../";
		$model1       = new PremiumQualifiedCleaningCompanyModel();
		$data=array();
		$data['mid']=cleanMe($a);
		$professionalMarketplaceSelectedDomain = $model1->professionalMarketplacePremiumDomain($data);
		require_once('PremiumQualifiedCleaningCompanyMarketplacePremiumDomainView.php');
		}
		}
		
		
		public function marketplaceNonPremiumDomainList($a=null)
		{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else {
		$path = "../../../../";
		$model1       = new PremiumQualifiedCleaningCompanyModel();
		$data=array();
		$data['mid']=cleanMe($a);
		$professionalMarketplaceSelectedDomain = $model1->professionalMarketplaceNonPremiumDomain($data);
		require_once('PremiumQualifiedCleaningCompanyMarketplaceNonPremiumDomainView.php');
		}
		}
		
		
		public function marketplaceCategoryDomainList($a=null)
		{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else {
		$path = "../../../../";
		$model1       = new PremiumQualifiedCleaningCompanyModel();
		$data=array();
		$data['mid']=cleanMe($a);
		$professionalMarketplaceDomain = $model1->professionalMarketplaceDomain($data);
		require_once('PremiumQualifiedCleaningCompanyMarketplaceCategoryDomainView.php');
		}
		}
		
		public function marketplaceDomainPaymentRule($a=null,$b=null)
		{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else {
		$path = "../../../../../";
		$model1       = new PremiumQualifiedCleaningCompanyModel();
		$data=array();
		$data['mid']=cleanMe($a);
		$data['md_id']=cleanMe($b);
		$professionalMarketplaceDomainRuleInfo = $model1->professionalMarketplaceDomainRuleInfo($data);
		 
		require_once('PremiumQualifiedCleaningCompanyMarketplaceDomainRuleView.php');
		}
		}
		
		
		public function updatePaymentRules($a=null,$b=null)
		{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else {
		$path = "../../../../../";
		$model1       = new PremiumQualifiedCleaningCompanyModel();
		$data=array();
		$data['mid']=cleanMe($a);
		$data['md_id']=cleanMe($b);
		$updatePaymentRules = $model1->updatePaymentRules($data);
		header('location:../../marketplaceCategoryDomainList/'.$data['mid']);
		}
		}
		
		public function updateAvailableDomain()
		{
		$valueNew = checkadmin();
			
			if ($valueNew == 0) {
				
				echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
			}
			else { 
			$model = new PremiumQualifiedCleaningCompanyModel();
			$updateAvailableDomain = $model->updateAvailableDomain();
			echo $updateAvailableDomain; die;
			}
		}
		
		
		public function updateAvailableMenu()
		{
		$valueNew = checkadmin();
			
			if ($valueNew == 0) {
				
				echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
			}
			else { 
			$model = new PremiumQualifiedCleaningCompanyModel();
			$updateAvailableMenu = $model->updateAvailableMenu();
			echo $updateAvailableMenu; die;
			}
		}
	
	
	public function updatePremiumDomain()
		{
		$valueNew = checkadmin();
			
			if ($valueNew == 0) {
				
				echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
			}
			else { 
			$model = new PremiumQualifiedCleaningCompanyModel();
			$updatePremiumDomain = $model->updatePremiumDomain();
			echo $updatePremiumDomain; die;
			}
		}
	
	
	public function updateNonPremiumDomain()
		{
		$valueNew = checkadmin();
			
			if ($valueNew == 0) {
				
				echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
			}
			else { 
			$model = new PremiumQualifiedCleaningCompanyModel();
			$updateNonPremiumDomain = $model->updateNonPremiumDomain();
			echo $updateNonPremiumDomain; die;
			}
		}
	public function marketplaceList()
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				
				header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
			}
			else { 
			$path="../../../";
			$model = new PremiumQualifiedCleaningCompanyModel();
			$adminSummary = $model->adminSummary();
			$professionalMarketplaceDetail = $model->professionalMarketplaceDetail();
			require_once('PremiumQualifiedCleaningCompanyMarketPlaceListView.php');	
		}
		} 
		
		public function marketplaceDstrictAction()
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				
				header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
			}
			else { 
			$path="../../../";
			$model = new PremiumQualifiedCleaningCompanyModel();
			$adminSummary = $model->adminSummary();
			$professionalMarketplaceDetail = $model->professionalMarketplaceDstrictsSelected();
			require_once('PremiumMarketplaceDistrictsActionView.php');	
		}
		} 
		
		
		public function marketplaceUnaqasaPremium()
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				
				header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
			}
			else { 
			$path="../../../";
			$model = new PremiumQualifiedCleaningCompanyModel();
			$adminSummary = $model->adminSummary();
			$professionalMarketplaceDetail = $model->professionalMarketplaceDstrictsSelected();
			require_once('PremiumMarketplaceUnaqasaActionView.php');	
		}
		}
		
		
		
		public function marketplaceNonpremiumAction()
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				
				header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
			}
			else { 
			$path="../../../";
			$model = new PremiumQualifiedCleaningCompanyModel();
			$adminSummary = $model->adminSummary();
			$professionalMarketplaceDetail = $model->professionalMarketplaceDstrictsSelected();
			require_once('PremiumMarketplaceUnaqasaNonPremiumActionView.php');	
		}
		} 
		
		
		
		
		public function marketplaceUnaqasaAction()
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				
				header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
			}
			else { 
			$path="../../../";
			$model = new PremiumQualifiedCleaningCompanyModel();
			$adminSummary = $model->adminSummary();
			$professionalMarketplaceDetail = $model->professionalMarketplaceDstrictsSelected();
			require_once('PremiumMarketplaceUnaqasaActionView.php');	
		}
		} 
		
		public function apartmentList()
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				
				header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
			}
			else { 
			$path="../../../";
			$model = new PremiumQualifiedCleaningCompanyModel();
			$adminSummary = $model->adminSummary();
			$apartmentList = $model->apartmentList();
			require_once('PremiumMarketplaceApartmentListView.php');	
		}
		} 
		
		public function marketplaceDsdtrictAvailableInfo()
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				
				header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
			}
			else { 
			$path="../../../";
			$model = new PremiumQualifiedCleaningCompanyModel();
			$adminSummary = $model->adminSummary();
			$professionalMarketplaceDetail = $model->professionalMarketplaceDstrictsDetail();
			require_once('PremiumMarketplaceDistrictsVisibleView.php');	
		}
		} 
		
		
		public function marketplaceNonPremiumAvailableInfo()
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				
				header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
			}
			else { 
			$path="../../../";
			$model = new PremiumQualifiedCleaningCompanyModel();
			$adminSummary = $model->adminSummary();
			$professionalMarketplaceDetail = $model->professionalMarketplaceDstrictsDetail();
			require_once('PremiumMarketplaceNonPremiumVisibleView.php');	
		}
		} 
		
		
		public function marketplaceDsdtrictList()
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				
				header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
			}
			else { 
			$path="../../../";
			$model = new PremiumQualifiedCleaningCompanyModel();
			$adminSummary = $model->adminSummary();
			$professionalMarketplaceDetail = $model->professionalMarketplaceDstrictsSelected();
			require_once('PremiumMarketplaceDistrictsListView.php');	
		}
		} 
		
		
		public function marketplacePremiumAction($a=null)
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				
				header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
			}
			else { 
			$path="../../../../";
			$data=array();
			$data['mid']=cleanMe($a);
			$model = new PremiumQualifiedCleaningCompanyModel();
			$adminSummary = $model->adminSummary();
			$professionalMarketplaceDetail = $model->professionalMarketplaceDstrictsSelected();
			require_once('PremiumMarketplacePremiumActionView.php');	
		}
		} 
		
		
		 
	
		public function marketplaceNonPremiumList()
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				
				header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
			}
			else { 
			$path="../../../";
			$model = new PremiumQualifiedCleaningCompanyModel();
			$adminSummary = $model->adminSummary();
			$professionalMarketplaceDetail = $model->professionalMarketplaceNonPremiumSelected();
			require_once('PremiumMarketplaceNonPremiumListView.php');	
		}
		}
	
	
	public function updateDstrictMarketAvailable()
		{
			 	$model1       = new PremiumQualifiedCleaningCompanyModel();
				$result    = $model1->updateDstrictMarketAvailable();
				echo $result; die;
			
		}
	
	
	public function updateNonPremiumMarketAvailable()
		{
			 	$model1       = new PremiumQualifiedCleaningCompanyModel();
				$result    = $model1->updateNonPremiumMarketAvailable();
				echo $result; die;
			
		}
	
	public function updatePremiumApartment()
		{
			 	$model1       = new PremiumQualifiedCleaningCompanyModel();
				$result    = $model1->updatePremiumApartment();
				echo $result; die;
			
		}
	
	public function serviceBookingDetails()
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				
				header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
			}
			else { 
			$path="../../../";
			$model = new PremiumQualifiedCleaningCompanyModel();
			$adminSummary = $model->adminSummary();
			$professionalServiceBookingDetail = $model->professionalServiceBookingDetail();
			//echo '<pre>'; print_r($professionalServiceBookingDetail); echo '</pre>'; die;
			require_once('PremiumQualifiedCleaningCompanyServiceBookingListView.php');	
		}
		} 
	
	
	public function addMarketplaceInfo()
	{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../";
		$model = new PremiumQualifiedCleaningCompanyModel();
		$adminSummary = $model->adminSummary();
		require_once('PremiumQualifiedCleaningCompanyMarketPlaceDomainView.php');	
	}
	} 
	
	
	public function addMarketplaceDomainInfo()
	{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../";
		$model = new PremiumQualifiedCleaningCompanyModel();
		$adminSummary = $model->adminSummary();
		require_once('PremiumQualifiedCleaningCompanyMarketPlaceDomainCategoryView.php');	
	}
	}
	
	
	public function addProfessionalMarketplaceDomain()
	{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../";
		$model = new PremiumQualifiedCleaningCompanyModel();
		$adminSummary = $model->adminSummary();
		$addProfessionalMarketplaceDomain = $model->addProfessionalMarketplaceDomain();
		header('location:marketplaceDomainList');
	}
	} 
	
	
	public function marketplaceDomainList()
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				
				header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
			}
			else { 
			$path="../../../";
			$model = new PremiumQualifiedCleaningCompanyModel();
			$adminSummary = $model->adminSummary();
			$professionalMarketplaceDetail = $model->professionalMarketplaceDomainDetail();
			require_once('PremiumQualifiedCleaningCompanyMarketPlaceDomainListView.php');	
		}
		}
	
	public function updateProfessionalMarketplace($a=null)
	{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../../";
		$data=array();
		$data['mid']=cleanMe($a);
		$model = new PremiumQualifiedCleaningCompanyModel();
		$updateMarketplaceInfo = $model->updateMarketplaceInfo($data);
		header('location:../marketplaceList');	
	}
	}
	
	public function editMarketplaceInfo($a=null)
	{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../../";
		$data=array();
		$data['mid']=cleanMe($a);
		$model = new PremiumQualifiedCleaningCompanyModel();
		$selectedProfessionalMarketplaceDetail = $model->selectedProfessionalMarketplaceDetail($data);
		$professionalServiceMarketplaceLocation = $model->professionalServiceMarketplaceLocation($data);
	 require_once('PremiumQualifiedCleaningCompanyMarketPlaceEditDomainView.php');	
	}
	}
	public function addProfessionalMarketplace()
	{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../";
		$model = new PremiumQualifiedCleaningCompanyModel();
		$adminSummary = $model->adminSummary();
		$addProfessionalMarketplace = $model->addProfessionalMarketplace();
		header('location:marketplaceList');
	}
	} 
	
	
	public function jobRequirement($a=null)
	{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../../";
		$data=array();
		$data['mid']=cleanMe($a);
		$model = new PremiumQualifiedCleaningCompanyModel();
		$adminSummary = $model->adminSummary();
		$professionalJobRequiremnt = $model->professionalJobRequiremnt($data);
		 
		require_once('PremiumJobRequirementView.php');	
	}
	} 
	
	public function categoryList()
	{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../";
		$model = new PremiumQualifiedCleaningCompanyModel();
		$adminSummary = $model->adminSummary();
		$professionalCategoryDetail = $model->professionalCategoryDetail();
		require_once('PremiumQualifiedCleaningCompanyCategoryListView.php');	
	}
	} 
	
	
	public function addCategoryInfo()
	{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../";
		$model = new PremiumQualifiedCleaningCompanyModel();
		$adminSummary = $model->adminSummary();
		$professionalMarketplaceDomainDetail = $model->professionalMarketplaceDomainDetail(); 
		require_once('PremiumQualifiedCleaningCompanyCategoryInfoView.php');	
	}
	} 
	
	
	public function editCategoryInfo($a=null)
	{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../../";
		$data=array();
		$data['catg_id']=cleanMe($a);
		$model = new PremiumQualifiedCleaningCompanyModel();
		$adminSummary = $model->adminSummary();
		$professionalServiceCategoryLocation = $model->professionalServiceCategoryLocation($data); 
		$professionalMarketplaceSelectedCategory = $model->professionalMarketplaceSelectedCategory($data); 
		$professionalMarketplaceDomainDetail = $model->professionalMarketplaceDomainDetail(); 
		require_once('PremiumQualifiedCleaningCompanyCategoryEditInfoView.php');	
	}
	} 
	public function updateProfessionalCategory($a=null)
	{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../../";
		$data=array();
		$data['catg_id']=cleanMe($a);
		$model = new PremiumQualifiedCleaningCompanyModel();
		$updateCategoryInfo = $model->updateCategoryInfo($data);
		 header('location:../categoryList');
	}
	} 
	
	public function addProfessionalCategory()
	{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../";
		$model = new PremiumQualifiedCleaningCompanyModel();
		$adminSummary = $model->adminSummary();
		$addProfessionalCategoryDetail = $model->addProfessionalCategoryDetail();
		header('location:categoryList');
	}
	} 
	
	public function subcategoryList($a=null)
	{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../../";
		$data=array();
		$data['catg_id']=cleanMe($a);
		$model = new PremiumQualifiedCleaningCompanyModel();
		$adminSummary = $model->adminSummary();
		$professionalSubCategoryDetail = $model->professionalSubCategoryDetail($data);
		require_once('PremiumQualifiedCleaningCompanySubCategoryListView.php');	
	}
	}
	
	public function imageInformation($a=null,$b=null)
	{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../../../";
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['subcatg_id']=cleanMe($b);
		$model = new PremiumQualifiedCleaningCompanyModel();
		$adminSummary = $model->adminSummary();
		$professionalSubCategoryDetail = $model->selectedProfessionalSubCategoryDetail($data);
		require_once('PremiumQualifiedSubcategoryimageView.php');	
	}
	}
	
	public function addImageInfo($a=null,$b=null)
	{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../../../";
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['subcatg_id']=cleanMe($b);
		$model = new PremiumQualifiedCleaningCompanyModel();
		$adminSummary = $model->adminSummary();
		$addImageInfo = $model->addImageInfo($data);
		header('location:../../subcategoryList/'.$data['catg_id']);	
	}
	}
	
	public function addSubCategoryInfo($a=null)
	{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../../";
		$data=array();
		$data['catg_id']=cleanMe($a);
		$model = new PremiumQualifiedCleaningCompanyModel();
		$adminSummary = $model->adminSummary();
		require_once('PremiumQualifiedCleaningCompanySubCategoryInfoView.php');	
	}
	}
	
	
	public function addProfessionalSubCategory($a=null)
	{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../../";
		$data=array();
		$data['catg_id']=cleanMe($a);
		$model = new PremiumQualifiedCleaningCompanyModel();
		$adminSummary = $model->adminSummary();
		$addProfessionalSubCategoryDetail = $model->addProfessionalSubCategoryDetail($data);
		header('location:../subcategoryList/'.$data['catg_id']);
	}
	}
	
	public function editSubCategoryInfo($a=null,$b=null)
	{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../../../";
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['subcatg_id']=cleanMe($b);
		$model = new PremiumQualifiedCleaningCompanyModel();
		$adminSummary = $model->adminSummary();
		$selectedProfessionalSubCategoryDetail = $model->selectedProfessionalSubCategoryDetail($data);
		$professionalSubCategoryInclusionDetail = $model->professionalSubCategoryInclusionDetail($data);
		 
		require_once('PremiumQualifiedCleaningCompanySubCategoryEditInfoView.php');	
	}
	}
	public function updateProfessionalSubCategory($a=null,$b=null)
	{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../../";
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['subcatg_id']=cleanMe($b);
		$model = new PremiumQualifiedCleaningCompanyModel();
		$adminSummary = $model->adminSummary();
		$updateProfessionalSubCategory = $model->updateProfessionalSubCategory($data);
		header('location:../../subcategoryList/'.$data['catg_id']);
	}
	}
	
	
	public function selectCompanies($a=null,$b=null)
	{
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../../../";
		$data=array();
		$data['job_id']=cleanMe($a);
		$data['mid']=cleanMe($b);
		$model = new PremiumQualifiedCleaningCompanyModel();
		$adminSummary = $model->adminSummary();
		$matchingProfessionalCompanies = $model->matchingProfessionalCompanies($data);
		require_once('PremiumQualifiedSelectCompanyForPostedJobsView.php');	
	}
	}
	
	
	
	public function sendJobRequestInfo($a=null,$b=null)
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$data=array();
		$data['job_id']=cleanMe($a);
		$data['mid']=cleanMe($b);
		$model = new PremiumQualifiedCleaningCompanyModel();
		require_once('../configs/testMandril.php');
		$sendJobRequestInfo = $model->sendJobRequestInfo($data);
		header('location:../../jobsPosted/'.$data['mid']);
		}
	}
	
	
    public function jobsPosted($a=null)
    {
		$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../../";
		$model = new PremiumQualifiedCleaningCompanyModel();
		$data=array();
		$data['mid']=cleanMe($a);
		$adminSummary = $model->adminSummary();
		$availableProfessionalJobs = $model->availableProfessionalJobs($data);
		 
		require_once('PremiumQualifiedPostedJobsView.php');
    }
	
	}
    
    public function requestReceived()
    {
		$path  = "../../../../../";
		$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../";
		$model = new PremiumQualifiedCleaningCompanyModel();
		$adminSummary = $model->adminSummary();
		$PremiumQualifiedDetail = $model->PremiumQualifiedDetail();
		$PremiumQualifiedCount = $model->PremiumQualifiedCount();
		require_once('PremiumQualifiedCleaningCompanyRequestReceivedView.php');
    }
	
	}
	
	
	public function requestapproved()
    {
		$path  = "../../../../../";
		$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../";
		$model = new PremiumQualifiedCleaningCompanyModel();
		
		
		$adminSummary = $model->adminSummary();
		$PremiumQualifiedDetailApproved = $model->PremiumQualifiedDetailApproved();
		$PremiumQualifiedCountApproved = $model->PremiumQualifiedCountApproved();
		  require_once('PremiumQualifiedCleaningCompanyRequestApprovedView.php');
    }
	
	}
	
	public function requestRejected()
    {
		$path  = "../../../../../";
		$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$path="../../../";
		$model = new PremiumQualifiedCleaningCompanyModel();
		$adminSummary = $model->adminSummary();
		$PremiumQualifiedDetailRejected = $model->PremiumQualifiedDetailRejected();
		$PremiumQualifiedCountRejected = $model->PremiumQualifiedCountRejected();
		require_once('PremiumQualifiedCleaningCompanyRequestRejectedView.php');
    }
	
	}
	
	public function morePremiumQualifiedCleaningCompanyRejected()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new PremiumQualifiedCleaningCompanyModel();
		$morePremiumQualifiedCleaningCompanyRejected = $model->morePremiumQualifiedCleaningCompanyRejected();
		echo $morePremiumQualifiedCleaningCompanyRejected; die;
		}
	}
	
	public function morePremiumQualifiedCleaningCompanyApproved()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new PremiumQualifiedCleaningCompanyModel();
		$morePremiumQualifiedCleaningCompanyApproved = $model->morePremiumQualifiedCleaningCompanyApproved();
		echo $morePremiumQualifiedCleaningCompanyApproved; die;
		}
	}
	
	public function morePremiumQualifiedCleaningCompany()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new PremiumQualifiedCleaningCompanyModel();
		$morePremiumQualifiedCleaningCompany = $model->morePremiumQualifiedCleaningCompany();
		echo $morePremiumQualifiedCleaningCompany; die;
		}
	}
	
	public function approvePremiumQualified($a=null)
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$data=array();
		$data['pid']=cleanMe($a);
		$model = new PremiumQualifiedCleaningCompanyModel();
		require_once('../configs/testMandril.php');
		$approvePremiumQualified = $model->approvePremiumQualified($data);
		header('location:../requestapproved');
		}
	}
	
	public function rejectPremiumQualified($a=null)
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
        }
		else { 
		$data=array();
		$data['pid']=cleanMe($a);
		$model = new PremiumQualifiedCleaningCompanyModel();
		require_once('../configs/testMandril.php');
		$rejectPremiumQualified = $model->rejectPremiumQualified($data);
		header('location:../requestRejected');
		}
	}
}
?>