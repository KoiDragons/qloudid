<?php
	require_once 'CompanySuppliersModel.php';
	
	require_once '../configs/utility.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once 'CompanyCustomersController.php';
	require_once 'EmployeeCheckController.php';
	class CompanySuppliersController
	{
		
		public static function serviceRequestReceived($a=null,$b=null)
		{
			$valueNew = checkLogin();
			$data=array();
				
				$data['cid']=cleanMe($a);
				$data['domain_id']=cleanMe($b);
				$model1       = new CompanySuppliersModel();
			if ($valueNew == 0) {
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../../";
				$data['user_id']=$_SESSION['user_id'];
				 
				$serviceRequestReceived    = $model1->serviceRequestReceived($data);
				 
				require_once('CompanySupplierServiceRequestReceivedView.php');
			}
		} 
		
		
		
		public static function requestedMarketplaces($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				$model1       = new CompanySuppliersModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new CompanySuppliersModel();
				$userSummary    = $model1->userSummary($data);
				$updateAdmin    = $model1->updateAdmin($data);
				$checkPermission    = $model1->checkPermission($data);
				$companyDetail    = $model1->companyDetail($data);
				 
				$requestedMarketplaceList    = $model1->requestedMarketplaceList($data);
				 
				 require_once('CompanySuppliersPendingMarketplacesView.php');
			}
		}
		
		
		public static function requestMarketplaceAccess($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				$model1       = new CompanySuppliersModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new CompanySuppliersModel();
				$userSummary    = $model1->userSummary($data);
				$updateAdmin    = $model1->updateAdmin($data);
				$checkPermission    = $model1->checkPermission($data);
				$companyDetail    = $model1->companyDetail($data);
				$marketplaceList    = $model1->marketplaceList($data); 
				if(count($marketplaceList)>0)
				{
					
					header('location:../companyEmployeeProfileAction/'.$data['cid']); die;
					
				}
				else
				{
					$requestedMarketplaceList    = $model1->requestedMarketplaceList($data);
					if(count($requestedMarketplaceList)>0)
					{
						header('location:../requestedMarketplaces/'.$data['cid']); die;
					}
					 
				}
				 require_once('CompanySuppliersMarketplaceAccessRequestView.php');
			}
		}
		
		
	
	
		
		
		public static function companyProfileMarketplaceServices($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				$model1       = new CompanySuppliersModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['mid']=cleanMe($b);
				$data['domain_id']=$data['mid'];
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new CompanySuppliersModel();
				$updateAdmin    = $model1->updateAdmin($data);
				$checkPermission    = $model1->checkPermission($data);
				
				if($checkPermission ==0)
				{
				header("location:../../companyEmployeeProfileAction/".$data['cid']);
				}
				$companyDetail    = $model1->companyDetail($data);
				$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
				
				 
				$selectedMarketplaceServiceDetail    = $model1->selectedMarketplaceServiceDetail($data); 
				require_once('CompanySuppliersProfileMarketplaceServicesView.php');
			}
		}
		
		
		public static function companyProfileIntegration($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				$model1       = new CompanySuppliersModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new CompanySuppliersModel();
				$updateAdmin    = $model1->updateAdmin($data);
				$checkPermission    = $model1->checkPermission($data);
				
				if($checkPermission ==0)
				{
				header("location:../companyEmployeeProfileAction/".$data['cid']);
				}
				$companyDetail    = $model1->companyDetail($data);
				require_once('CompanySuppliersProfileIntegrationView.php');
			}
		}
		
		
			public static function companyProfileAction($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				$model1       = new CompanySuppliersModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new CompanySuppliersModel();
				$updateAdmin    = $model1->updateAdmin($data);
				$checkPermission    = $model1->checkPermission($data);
				
				if($checkPermission ==0)
				{
				header("location:../companyEmployeeProfileAction/".$data['cid']);
				}
				$companyDetail    = $model1->companyDetail($data);
				$employeesList    = $model1->employeesList($data);
				 
				$productServices    = $model1->productServices($data);
				$propertyLocation    = $model1->propertyLocation($data);
				require_once('CompanySuppliersProfileActionViewNew.php');
			}
		}
		
		
		public static function companyEmployeeProfileAction($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				$model1       = new CompanySuppliersModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new CompanySuppliersModel();
				$userSummary    = $model1->userSummary($data);
				$employeeVerificationInfo    = $model1->employeeVerificationInfo($data);
				$updateAdmin    = $model1->updateAdmin($data);
				$checkPermission    = $model1->checkPermission($data);
				$companyDetail    = $model1->companyDetail($data);
				if(isset($_POST['marketplace_id']))
				{
					$data['marketplace_id']=$_POST['marketplace_id'];
				}
				else
				{
					
						$data['marketplace_id']=0;
					
				}
				$marketplaceList    = $model1->marketplaceList($data);
				//print_r($marketplaceList ); die;
				if(count($marketplaceList)==0)
				{
					
					/*$requestedMarketplaceList    = $model1->requestedMarketplaceList($data);
					if(count($requestedMarketplaceList)>0)
					{
						header('location:../requestedMarketplaces/'.$data['cid']); die;
					}
					else
					{
						header('location:../requestMarketplaceAccess/'.$data['cid']); die;
					}*/
				}
				if($data['marketplace_id']==0)
				{
					if(count($marketplaceList)>0)
					{
						$data['marketplace_id']=$marketplaceList[0]['id'];
					}
					
				}
				
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
					 
				if($appdownloadStatus==0)
				{
				$getPermissionDetail    = $model1->getPermissionDetail($data);
				header('location:https://www.qloudid.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				
				$companyDetail    = $model1->companyDetail($data);
				//print_r($companyDetail ); die;
				$data['country_id']=$companyDetail['country_id'];
				$countryInfo    = $model1->countryInfo($data);
				$getAppsDetail=array();
				$getMandatoryApps=array();
				if($countryInfo>0)
				{
				$getAppsDetail    = $model1->getAppsDetail($data);
				$getMandatoryApps    = $model1->getMandatoryApps($data);
				//print_r($getMandatoryApps); die;
				}
				$selectedMarketplaceSortedServiceDetail    = $model1->selectedMarketplaceSortedServiceDetail($data);
				$employeesList    = $model1->employeesList($data);
				$productServices    = $model1->productServices($data);
				$propertyLocation    = $model1->propertyLocation($data);
				require_once('CompanySuppliersEmployeeProfileActionViewLatest.php');
			}
		}
		
		
			public static function companyProfileServices($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				$model1       = new CompanySuppliersModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new CompanySuppliersModel();
				$updateAdmin    = $model1->updateAdmin($data);
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
				header("location:../companyEmployeeProfileAction/".$data['cid']);
				}
				$companyDetail    = $model1->companyDetail($data);
				$marketplaceList    = $model1->marketplaceList($data);
				$data['country_id']=$companyDetail['country_id'];
				$countryInfo    = $model1->countryInfo($data);
				$getAppsDetail=array();
				$getMandatoryApps=array();
				if($countryInfo>0)
				{
				$getAppsDetail    = $model1->getAppsDetail($data);
				$getMandatoryApps    = $model1->getMandatoryApps($data);
				//print_r($getMandatoryApps); die;
				}
				 
				$employeesList    = $model1->employeesList($data);
				$productServices    = $model1->productServices($data);
				$propertyLocation    = $model1->propertyLocation($data);
				require_once('CompanySuppliersProfileServicesViewNew.php');
			}
		}
		
		
		
		
		
		public static function selectedMarketplaceSortedServiceDetail($a=null)
		{
			$model1       = new CompanySuppliersModel();
			$data=array();
				$selectedMarketplaceSortedServiceDetail    = $model1->selectedMarketplaceSortedServiceDetail($data);
				print_r($selectedMarketplaceSortedServiceDetail);
		}
		
		public static function repairRequest($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new CompanySuppliersModel();
				$repairRequest    = $model1->repairRequest($data);
				$companyDetail    = $model1->companyDetail($data);
				require_once('CompanySuppliersHomeRepairRequestView.php');
			}
		}
		
		public static function repairRequestInfo($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new CompanySuppliersModel();
				$repairRequest    = $model1->repairRequestDetailInfo($data);
				$repairRequestDetailImages    = $model1->repairRequestDetailImages($data);
				$companyDetail    = $model1->companyDetail($data);
				require_once('CompanySuppliersHomeRepairRequestDetailView.php');
			}
		}
		
			public static function acceptRequest($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new CompanySuppliersModel();
				require_once('../configs/smsMandril.php');
				$acceptRequest    = $model1->acceptRequest($data);
				header('location:../../getEmployeeListing/'.$data['cid'].'/'.$data['rid']);
			}
		}
		
		
		public static function getEmployeeListing($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new CompanySuppliersModel();
				$employeesList    = $model1->employeesList($data);
				$companyDetail    = $model1->companyDetail($data);
				require_once('CompanySuppliersEmployeeListView.php');
			}
		}
		
		public static function assignEmployee($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['eid']=cleanMe($c);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new CompanySuppliersModel();
				require_once('../configs/smsMandril.php');
				$assignEmployee    = $model1->assignEmployee($data);
				header('location:../../../repairRequest/'.$data['cid'].'/'.$data['rid']);
			}
		}
		
		
		public static function rejectRequest($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new CompanySuppliersModel();
				require_once('../configs/smsMandril.php');
				$rejectRequest    = $model1->rejectRequest($data);
				header('location:../../repairRequest/'.$data['cid']);
			}
		}
		
		public static function propertyList($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new CompanySuppliersModel();
				$propertyList    = $model1->propertyList($data);
				$companyDetail    = $model1->companyDetail($data);
				require_once('PropertyManagerApartmentListView.php');
			}
		}
		 
		public static function addPropertyInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new CompanySuppliersModel();
				$vitechCityList    = $model1->vitechCityList();
				$propertyType    = $model1->propertyType();
				$companyDetail    = $model1->companyDetail($data);
				require_once('PropertyManagerApartmentDescriptionView.php');
			}
		}
		
		
		public static function getAreaInfo()
		{
			$model1       = new CompanySuppliersModel();
			$result    = $model1->vitechAreaList();
			echo $result; die;
		}
		
		public static function addPropertyApartment($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new CompanySuppliersModel();
				$addPropertyApartment    = $model1->addPropertyApartment($data);
				 
				header("location:../propertyList/".$data['cid']);
				 
			}
		}
		 
		public static function companyAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new CompanySuppliersModel();
				$updateAdmin    = $model1->updateAdmin($data);
				$checkPermission    = $model1->checkPermission($data);
				
				if($checkPermission ==0)
				{
				header("location:../../../../company/index.php/RestrictedAccess/companyAccount/".$data['cid']);
				}
				
				$companyDetail    = $model1->companyDetail($data);
				
				$data['country_id']=$companyDetail['country_id'];
				$countryInfo    = $model1->countryInfo($data);
				
				if($countryInfo>0)
				{
				
				$getMandatoryApps    = $model1->getMandatoryApps($data);
				
				}
				$verificationId    = $model1->verificationId($data);
				
				$row_summary    = $model1->userSummary($data);
				 
				$headQuarterID    = $model1->headQuarterID($data);
				$data['id']=$headQuarterID;
				$headquarterDetail    = $model1->locationDetailnfo($data);
				 
				require_once('CompanySuppliersView.php');
			}
		}
		
		public static function resourceAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new CompanySuppliersModel();
				$updateAdmin    = $model1->updateAdmin($data);
				$checkPermission    = $model1->checkPermission($data);
				
				if($checkPermission ==0)
				{
				header("location:../../../../company/index.php/RestrictedAccess/companyAccount/".$data['cid']);
				}
				$developerCount    = $model1->developerCount($data);
				$lawCompanyInfo    = $model1->lawCompanyInfo($data);
				$companyDetail    = $model1->companyDetail($data);
				$data['country_id']=$companyDetail['country_id'];
				$countryInfo    = $model1->countryInfo($data);
				
				if($countryInfo>0)
				{
				
				$getMandatoryApps    = $model1->getMandatoryApps($data);
				
				}
				$verificationId    = $model1->verificationId($data);
				$verifierCount    = $model1->verifierCount($data);
				$row_summary    = $model1->userSummary($data);
				$headQuarterID    = $model1->headQuarterID($data);
				$data['id']=$headQuarterID;
				$headquarterDetail    = $model1->locationDetailnfo($data);
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				
				require_once('CompanySuppliersResourceView.php');
			}
		}
		
		public static function appsAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['lid']=cleanMe($a);
				$model1       = new CompanySuppliersModel();
				$locationDetail    = $model1->locationDetail($data);
				$data['cid']=$locationDetail['enc'];
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$headQuarterID    = $model1->headQuarterID($data);
				$data['id']=$headQuarterID;
				$headquarterDetail    = $model1->locationDetailnfo($data);
				
				
				$appsAssignedLocation    = $model1->appsAssignedLocation($data);
				$companyDetail    = $model1->companyDetail($data);
				require_once('CompanySuppliersAvailableAppsView.php');
			}
		}
		
		
		
	}
    
	
	
?>