<?php
	require_once 'ProfessionalCompanyModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class ProfessionalCompanyController
	{
		public static function selectedCompanyServices($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  $model1       = new ProfessionalCompanyModel();
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
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
				
				$model1       = new ProfessionalCompanyModel();
				$propertyInfo    = $model1->propertyInfo($data);
				$companyServicesTodoUpdate    = $model1->companyServicesTodoUpdate($data);
				$selectedCompanyServices    = $model1->selectedCompanyServices($data); 
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('ProfessionalCompanyServiceSelectedDetailView.php');
			}
		}  

		
		public static function updateServiceCategory($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
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
				
				$model1       = new ProfessionalCompanyModel();
				$data['category_id']=$_POST['category_id'];
				$updateServiceCategory    = $model1->updateServiceCategory($data);
				$selectedCompanySubcategories    = $model1->selectedCompanySubcategories($data);
				echo $selectedCompanySubcategories; die;
			}
		}  

		
		public static function serviceRequestReceived($a=null)
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
				
				$model1       = new ProfessionalCompanyModel();
				$serviceRequestReceived    = $model1->serviceRequestReceived($data);
				 
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('ProfessionalCompanyServiceRequestReceivedView.php');
			}
		} 
		
		
		public static function projectPriceInfo($a=null,$b=null)
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
				$data['request_id']=cleanMe($b);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$model1       = new ProfessionalCompanyModel();
				$serviceRequestReceived    = $model1->serviceRequestReceived($data);
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('ProfessionalCompanyServiceRequestPriceInfoView.php');
			}
		} 
		
		
		public static function updatePriceForService($a=null,$b=null)
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
				$data['request_id']=cleanMe($b);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$model1       = new ProfessionalCompanyModel();
				require_once('../configs/testMandril.php');
				$updatePriceForService    = $model1->updatePriceForService($data);
				header('location:../../serviceRequestReceived/'.$data['cid']);
			}
		} 
		
		
		public static function connectedMarketplaces($a=null)
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
				
				//header('location:../../CompanySuppliers/companyProfileServices/'.$data['cid']); die;
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$model1       = new ProfessionalCompanyModel();
				 
				$marketplaceList    = $model1->marketplaceList($data);
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('CompanySuppliersProfileServicesView.php');
			}
		} 
		 
		public static function listUnconnectedMarketplaces($a=null)
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
				
				$model1       = new ProfessionalCompanyModel();
				 
				$marketplaceList    = $model1->unconnectedMarketplaceList($data);
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('ProfessionalCompanyUnconnectedMarketplaceListView.php');
			}
		}  
		
		public static function sendPremiumAccountRequest($a=null,$b=null)
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
				$data['domain_id']=cleanMe($b);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$model1       = new ProfessionalCompanyModel();
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../lib/url_shortener.php'); 
				$sendPremiumAccountRequest    = $model1->sendPremiumAccountRequest($data);
				 header('location:../../connectedMarketplaces/'.$data['cid']);
			}
		}  
		
		public static function serviceAction($a=null,$b=null)
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
				$data['domain_id']=cleanMe($b);
				$data['objectType']=1;
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$model1       = new ProfessionalCompanyModel();
				$professionalTodoUpdate    = $model1->professionalTodoUpdate($data);
				$professionalTodoCount    = $model1->professionalTodoCount($data);
				$serviceTodoDetail    = $model1->serviceTodoDetail($data);
				$marketplaceDetailInfo    = $model1->marketplaceDetailInfo($data);
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('ProfessionalCompanyServiceActionView.php');
			}
		}  
		
		
		public static function listAvailableSubscription($a=null,$b=null)
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
				$data['domain_id']=cleanMe($b);
				$data['objectType']=1;
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$model1       = new ProfessionalCompanyModel();
				$professionalTodoUpdate    = $model1->professionalTodoUpdate($data);
				$professionalTodoCount    = $model1->professionalTodoCount($data);
				$marketplaceSubscriptionInfo    = $model1->marketplaceSubscriptionInfo($data);
				$marketplaceDetailInfo    = $model1->marketplaceDetailInfo($data);
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('ProfessionalCompanySubscriptionInformationView.php');
			}
		}  
		 
		 
		 public static function selectSubscription($a=null,$b=null,$c=null)
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
				$data['domain_id']=cleanMe($b);
				$data['sub_id']=cleanMe($c); 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$model1       = new ProfessionalCompanyModel();
				$updateSubscription    = $model1->updateSubscription($data);
				header('location:../../../listAvailableSubscription/'.$data['cid'].'/'.$data['domain_id']);
			}
		}  
		 
		 
		public static function serviceCategoryTodo($a=null,$b=null)
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
				$data['domain_id']=cleanMe($b);
				$data['objectType']=1;
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$model1       = new ProfessionalCompanyModel();
				$professionalTodoUpdate    = $model1->professionalTodoUpdate($data);
				$professionalTodoCount    = $model1->professionalTodoCount($data);
				$serviceTodoDetail    = $model1->serviceTodoDetail($data);
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('ProfessionalCompanyServiceCategoryTodoView.php');
			}
		} 
		
		
		public static function listAvailableServices($a=null,$b=null)
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
				$data['domain_id']=cleanMe($b);
				$data['objectType']=1;
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$model1       = new ProfessionalCompanyModel();
				$professionalTodoUpdate    = $model1->professionalTodoUpdate($data);
				$professionalTodoCount    = $model1->professionalTodoCount($data);
				$availableServiceList    = $model1->availableServiceList($data);
				 
				$marketplaceDetailInfo    = $model1->marketplaceDetailInfo($data);
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('ProfessionalCompanyServiceCategoryListView.php');
			}
		} 
		
		
		public static function serviceCategoryRules($a=null,$b=null,$c=null)
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
				$data['domain_id']=cleanMe($b);
				$data['subcatg_id']=cleanMe($c);
				$data['objectType']=1;
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$model1       = new ProfessionalCompanyModel();
				$professionalTodoUpdate    = $model1->professionalTodoUpdate($data);
				$professionalTodoCount    = $model1->professionalTodoCount($data);
				$serviceCategoryDetailInfo    = $model1->serviceCategoryDetailInfo($data);
				$marketplaceDetailInfo    = $model1->marketplaceDetailInfo($data);
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('ProfessionalCompanyServiceCategoryRulesView.php');
			}
		} 
		
		public static function updateServiceRules($a=null,$b=null,$c=null)
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
				$data['domain_id']=cleanMe($b);
				$data['subcatg_id']=cleanMe($c);
				$data['objectType']=1;
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$model1       = new ProfessionalCompanyModel();
				$updateServiceRules    = $model1->updateServiceRules($data);
				header('location:../../../listAvailableServices/'.$data['cid'].'/'.$data['domain_id']);
			}
		} 
		
		public static function updateCategoryServiceAllTodos($a=null,$b=null,$c=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/loginapp"; </script>'; die;
				} else {
				$model1       = new ProfessionalCompanyModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['domain_id']=cleanMe($b);
				$data['objectType']=cleanMe($c);
				$result    = $model1->updateCategoryServiceAllTodos($data);
				$result    = $model1->serviceTodoDetail($data);
				echo $result; die;
				}
		}
		
		public static function updateAvailableServiceCategory()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/loginapp"; </script>'; die;
				} else {
				$model1       = new ProfessionalCompanyModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=$_POST['company_id'];
				$data['catg_id']=$_POST['categ_id']; 
				$result    = $model1->updateAvailableServiceCategory($data);
				$result    = $model1->serviceTodoDetail($data);
				echo $result; die;
				}
		}
		
		
		public static function updateCategoryServiceTodo($a=null,$b=null,$c=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/loginapp"; </script>'; die;
				} else {
				$model1       = new ProfessionalCompanyModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['domain_id']=cleanMe($b);
				$data['objectType']=cleanMe($c);
				$result    = $model1->updateCategoryServiceTodo($data);
				$result    = $model1->serviceTodoDetail($data);
				echo $result; die;
				}
		}
		 
		
		 
	}
?>