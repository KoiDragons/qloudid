<?php
	require_once 'CompanyModel.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	require_once '../company/EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class CompanyController
	{
		 public static function updateCurrency($a = null)
		{
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
            $path         = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$model1       = new CompanyModel();
			$updateCurrency = $model1->updateCurrency($data);
			header("location:../../CompanySuppliers/companyAccount/".$data['cid']);
			}
		}
		
		public static function index()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:LoginAccount");
				} else {
				$path = "../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new CompanyModel();
				$resultOrg    = $model1->userAccount($data);
				$completedEmployeeRequests    = $model1->completedEmployeeRequests($data);
				$resultOrg1    = $model1->employeeAccount($data);
				$row_summary    = $model1->userSummary($data);
				require_once('CompanyView.php');
			}
		}
		
			public static function openingHrs($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				if(isset($b))
				{
					$path = "../../../../../";
				$data['redirect_id']=cleanMe($b);	
				}
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
			 
				$model1       = new CompanyModel();
				$workingHrs    = $model1->workingHrs($data);
				 $companyWorkCount    = $model1->companyWorkCount($data);
				require_once('CompanyOpenInfoView.php');
			}
		}
		
		 public static function editWorkingTimeInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				 if(isset($b))
				{
				
				$data['redirect_id']=cleanMe($b);	
				}
				$model       = new CompanyModel();
				$editWorkingTimeInfo = $model->editWorkingTimeInfo($data);
				 if(isset($b))
				{
				header("location:../../../Eshop/aboutInformation/".$data['cid']); die;
				}
				else
				{
				header("location:../../CompanySuppliers/companyAccount/".$data['cid']); die;	
				}
				
			}	
		}
		public static function companyAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
			//	print_r($_POST);die;
				$model1       = new CompanyModel();
				$propertyInfo    = $model1->propertyInfo($data);
				$country    = $model1->countryList($data);
				$countryOpt    = $model1->countryOption($data);
				$industry    = $model1->industryList($data);
				$industryOpt    = $model1->industryListOpt($data);
				$companyDetail    = $model1->companyDetail($data);
				$verificationId    = $model1->verificationId($data);
				$row_summary    = $model1->userSummary($data);
				$addressDetail    = $model1->addressDetail($data);
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('CompanyViewNew.php');
			}
		}
		
		public static function bankAccountDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
			//	print_r($_POST);die;
				$model1       = new CompanyModel();
				
				require_once('CompanyBankAccountView.php');
			}
		}
		
		public static function listBankAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
			
				$model1       = new CompanyModel();
				$bankAccountList    = $model1->bankAccountList($data);
				require_once('CompanyBankAccountListView.php');
			}
		}
		public static function addBankAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
			 
				$model1       = new CompanyModel();
				$addBankAccount    = $model1->addBankAccount($data);
				header('location:../listBankAccount/'.$data['cid']);
			}
		}
		
		public static function contactDetails($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=cleanMe($a);
				$model1       = new CompanyModel();
				$propertyInfo    = $model1->locationOfficeInfo($data);
				
				$data['cid']=$propertyInfo['cid'];
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
			 
				$model1       = new CompanyModel();
				 $country    = $model1->countryList($data);
				$countryOpt    = $model1->countryOption($data);
				 
				$companyDetail    = $model1->companyDetail($data);
				$companyLocationContactInfo    = $model1->companyLocationContactInfo($data);
				//print_r($companyLocationContactInfo); die;
				require_once('CompanyContactDetailView.php');
			}
		}
		
		
		public static function updateLocationContactDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=cleanMe($a);
				$model1       = new CompanyModel();
				$propertyInfo    = $model1->locationOfficeInfo($data);
				$data['cid']=$propertyInfo['cid'];
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
			//	print_r($_POST);die;
				$model1       = new CompanyModel();
				$propertyInfo    = $model1->locationOfficeInfo($data);
				$data['cid']=$propertyInfo['cid'];
				$updateLocationContactDetail    = $model1->updateLocationContactDetail($data);
				header('location:../contactDetails/'.$data['id']);
			}
		}
		
		public static function addCurrency($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model1       = new CompanyModel();
				$currencyOption    = $model1->currencyOption($data);
				$companyDetail    = $model1->companyDetail($data);
				require_once('CompanyCurrencyInfoView.php');
			}
		}
		
		
		public static function invoiceAddress($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model1       = new CompanyModel();
				$propertyInfo    = $model1->propertyInfo($data);
				$country    = $model1->countryList($data);
				$countryOpt    = $model1->countryOption($data);
				$industry    = $model1->industryList($data);
				$industryOpt    = $model1->industryListOpt($data);
				$propertyInfo    = $model1->propertyInfo($data);
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('CompanyInvoiceAddressViewNew.php');
			}
		}
		
		public static function visitingAddress($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model1       = new CompanyModel();
				$propertyInfo    = $model1->propertyInfo($data);
				$country    = $model1->countryList($data);
				$countryOpt    = $model1->countryOption($data);
				$industry    = $model1->industryList($data);
				$industryOpt    = $model1->industryListOpt($data);
				$addressDetail    = $model1->addressDetail($data);
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('CompanyHeadquarterAddressViewNew.php');
			}
		}
		
		
		public static function checkAddress()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CompanyModel();
				
				$result    = $model1->checkAddress();
				echo $result; die;
				}
		}
		
		public static function checkAddresslatLong()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CompanyModel();
				
				$result    = $model1->checkAddresslatLong();
				echo $result; die;
				}
		}
		
			public static function openDay($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model1       = new CompanyModel();
				$checkOpenStatus    = $model1->checkOpenStatus($data);
				 
			$checkOpenStatusParkering    = $model1->checkOpenStatusParkering($data);
			$checkOpenStatusDelivery    = $model1->checkOpenStatusDelivery($data);
			$checkOpenStatusSafeqid    = $model1->checkOpenStatusSafeqid($data);
			
				if($checkOpenStatus+$checkOpenStatusParkering+$checkOpenStatusDelivery+$checkOpenStatusSafeqid==4)
				{
				header('location:../visitorsIp/'.$data['cid']);	 die;
				}
				else 
				{
				require_once('CompanyDayOpenView.php');
				}
			}
		}
		
		 public static function reportStartDay($a = null)
		{
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
            $path         = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			
			$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new CompanyModel();
			$reportStartDay = $model1->reportStartDay($data);
			header("location:../visitorsIP/".$data['cid']);
        }
	}
		
		public static function locationAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['lid']=cleanMe($a);
				$model1       = new CompanyModel();
				$locationDetail    = $model1->locationDetail($data);
				$data['cid']=$locationDetail['cid'];
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$propertyDetailInfo    = $model1->propertyDetailInfo($data);
				$country    = $model1->countryNames($data);
				$countryOpt    = $model1->countryOption($data);
				$industry    = $model1->industryList($data);
				$industryOpt    = $model1->industryListOpt($data);
				$companyDetail    = $model1->companyDetail($data);
				$verificationId    = $model1->verificationId($data);
				$row_summary    = $model1->userSummary($data);
				$headQuarterID    = $model1->headQuarterID($data);
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('CompanyPropertyEditView.php');
			}
		}
		
		
		public static function employeeInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['lid']=cleanMe($a);
				$model1       = new CompanyModel();
				$locationDetail    = $model1->locationDetail($data);
				$data['cid']=$locationDetail['cid'];
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				
				$employeeInformation    = $model1->employeeInformation($data);
				$row_summary    = $model1->userSummary($data);
				$headQuarterID    = $model1->headQuarterID($data);
				$companyDetail    = $model1->companyDetail($data);
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('CompanyEmployeesonLocationView.php');
			}
		}
		
		public static function moreEmployeeInformation($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['lid']=cleanMe($co);
				$model1       = new CompanyModel();
				
				$result    = $model1->moreEmployeeInformation($data);
				echo $result; die;
			}
		}
		public static function changeLanguage()
		{
				$model = new CompanyModel();
				$changeLanguage = $model->changeLanguage();	
				echo $changeLanguage; die;	
		}
		public static function visitors($a=null,$b=null)
		{
			
			$path = "../../../../../";
			$data=array();
			
			$data['cid']=cleanMe($a);
			$data['bid']=cleanMe($b);
			$model1       = new CompanyModel();
			$verifyLanguage=$model1->verifyLanguage();
			$resultContry    = $model1->countryOption($data);
			$verifyIP    = $model1->verifyIP($data);
			$getBookId    = $model1->getBookId($data);
			$companyDetail    = $model1->companyDetail($data);
			$visitorsBg    = $model1->visitorsBg($data);
			$corporateColor    = $model1->corporateColor($data);
			$data['comp_id']    = $model1->selectWhitelistCompany($data);
			$data['comp_name']    = $model1->selectWhitelistCompanyName($data);
			$checkOpenStatus    = $model1->checkOpenStatus($data);
			if($checkOpenStatus==0)
			{
			header('location:../../openDay/'.$data['cid']);	 die;
			}
				else 
				{
					if($verifyIP==0)
					{
						require_once('LicenseErrorView.php');
					}
					else
					{
					require_once('VisitorsViewNew.php');
					}
				}
		}
		public static function visitorsQrScan($a=null)
		{
			
			$path = "../../../../";
			$data=array();
			
			$data['cid']=cleanMe($a);
			
			$model1       = new CompanyModel();
			
			$resultContry    = $model1->countryOption($data);
			$verifyIP    = $model1->verifyIP($data);
			$getBookId    = $model1->getBookId($data);
			$companyDetail    = $model1->companyDetail($data);
			$visitorsBg    = $model1->visitorsBg($data);
			$corporateColor    = $model1->corporateColor($data);
			$data['comp_id']    = $model1->selectWhitelistCompany($data);
			$data['comp_name']    = $model1->selectWhitelistCompanyName($data);
			$checkOpenStatus    = $model1->checkOpenStatus($data);
				if($checkOpenStatus==0)
				{
				header('location:../../openDay/'.$data['cid']);	 die;
				}
				else 
				{
			if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else
			{
			require_once('VisitorsQrScanView.php');
			}
				}
		}
		public static function welcome($a=null,$b=null)
		{
			
			$path = "../../../../";
			$data=array();
			
			$data['cid']=cleanMe($a);
			$data['bid']=cleanMe($b);
			$model1       = new CompanyModel();
			
			$resultContry    = $model1->countryOption($data);
			$verifyIP    = $model1->verifyIP($data);
			$getBookId    = $model1->getBookId($data);
			$companyDetail    = $model1->companyDetail($data);
			$visitorsBg    = $model1->visitorsBg($data);
			$corporateColor    = $model1->corporateColor($data);
			$data['comp_id']    = $model1->selectWhitelistCompany($data);
			$data['comp_name']    = $model1->selectWhitelistCompanyName($data);
			$checkOpenStatus    = $model1->checkOpenStatus($data);
				if($checkOpenStatus==0)
				{
				header('location:../../openDay/'.$data['cid']);	 die;
				}
				else 
				{
			if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else
			{
			require_once('VisitorsStartView.php');
			}
				}
		}
		
		public static function visitorsInfo($a=null,$b=null)
		{
			
			$path = "../../../../../";
			$data=array();
			
			$data['cid']=cleanMe($a);
			$data['bid']=cleanMe($b);
			$model1       = new CompanyModel();
			$verifyLanguage=$model1->verifyLanguage();
			$resultContry    = $model1->countryOption($data);
			$verifyIP    = $model1->verifyIP($data);
			$getBookId    = $model1->getBookId($data);
			$companyDetail    = $model1->companyDetail($data);
			$visitorsBg    = $model1->visitorsBg($data);
			$corporateColor    = $model1->corporateColor($data);
			$data['comp_id']    = $model1->selectWhitelistCompany($data);
			$data['comp_name']    = $model1->selectWhitelistCompanyName($data);
			$checkOpenStatus    = $model1->checkOpenStatus($data);
				if($checkOpenStatus==0)
				{
				header('location:../../openDay/'.$data['cid']);	 die;
				}
				else 
				{
			if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else
			{
				if(isset($_POST['ind']))
			{
				if(isset($_POST['qard_employee']))
				{
				$userInformation    = $model1->userInformation($data);	
				}
			require_once('VisitorInfoViewNew.php');
			}
			else
			{
				header('location:../../visitors/'.$data['cid'].'/'.$data['bid']);
			}
			}
		}
		}
		
		public static function expressVisitorsInfo($a=null)
		{
			
			$path = "../../../../";
			$data=array();
			
			$data['qr_id']=cleanMe($a);
			$model1       = new CompanyModel();
			$employeeQuardInformation    = $model1->employeeQuardInformation($data);
			$data['cid']=$employeeQuardInformation['cid'];
			$resultContry    = $model1->countryOption($data);
			$verifyIP    = $model1->verifyIP($data);
			$companyDetail    = $model1->companyDetail($data);
			$visitorsBg    = $model1->visitorsBg($data);
			$corporateColor    = $model1->corporateColor($data);
			$data['comp_id']    = $model1->selectWhitelistCompany($data);
			$data['comp_name']    = $model1->selectWhitelistCompanyName($data);
			$checkOpenStatus    = $model1->checkOpenStatus($data);
				if($checkOpenStatus==0)
				{
				header('location:../openDay/'.$data['cid']);	 die;
				}
				else 
				{
			if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else
			{
				
				$userInformation    = $model1->userInformationQard($data);	
				
			require_once('VisitorExpressInfoView.php');
			}
			
				}
		}
		
		public static function expressVisitor($a=null,$b=null)
		{
			
			$path = "../../../../../";
			$data=array();
			
			$data['cid']=cleanMe($a);
			$data['bid']=cleanMe($b);
			$model1       = new CompanyModel();
			
			$resultContry    = $model1->countryOption($data);
			$verifyIP    = $model1->verifyIP($data);
			$getBookId    = $model1->getBookId($data);
			$companyDetail    = $model1->companyDetail($data);
			$visitorsBg    = $model1->visitorsBg($data);
			$corporateColor    = $model1->corporateColor($data);
			$data['comp_id']    = $model1->selectWhitelistCompany($data);
			$data['comp_name']    = $model1->selectWhitelistCompanyName($data);
			$checkOpenStatus    = $model1->checkOpenStatus($data);
				if($checkOpenStatus==0)
				{
				header('location:../../openDay/'.$data['cid']);	 die;
				}
				else 
				{
			if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else 
			{	
			if(isset($_POST['inde']))
			{
			require_once('VisitorsQuardInfoViewNew.php');
			}
			else
			{
				header('location:../../visitors/'.$data['cid'].'/'.$data['bid']);
			}
			}
				}
		}
		public static function verifyEmployee($co = null)
		{
			
				$model1       = new CompanyModel();
				
				$result    = $model1->verifyEmployee();
				echo $result; die;
			
		}
		public static function updateVisitors($a=null)
		{
			
			$path = "../../../../";
			$data=array();
			
			$data['vid']=cleanMe($a);
			$data['visitor']=cleanMe($_GET['visitor']);
			$model1       = new CompanyModel();
			$corporateColor    = $model1->corporateColor($data);
			$companyVisitor    = $model1->companyVisitor($data);
			$visitorOnPage    = $model1->visitorOnPage($data);
			$data['comp_id']    = $model1->selectWhitelistVisitorCompany($data);
			$data['comp_name']    = $model1->selectWhitelistCompanyName($data);
			require_once('UpdateVisitorsView.php');
			
		}
		
		public static function confirmVisit($a=null)
		{
			
			$path = "../../../../";
			$data['vid']=cleanMe($a);
			$data['visitor']=1;
			$model1       = new CompanyModel();
			
			$visitorOnPage    = $model1->visitorOnPage($data);
			require_once('ConfirmVisitView.php');
			
		}
		
		public static function visitorsIP($a=null)
		{
			
			$path = "../../../../";
			$data=array();
			
			$data['cid']=cleanMe($a);
			
			header('location:../visitorsContactInformation/'.$data['cid']); die;
			$model1       = new CompanyModel();
			$companyDetail    = $model1->companyDetail($data);
			$corporateColor    = $model1->corporateColor($data);
			$verifyLanguage=$model1->verifyLanguage();
			$verifyIP    = $model1->verifyIP($data);
			$data['comp_id']    = $model1->selectWhitelistCompany($data);
			$data['comp_name']    = $model1->selectWhitelistCompanyName($data);
			$checkOpenStatus    = $model1->checkOpenStatus($data);
			$checkOpenStatusParkering    = $model1->checkOpenStatusParkering($data);
			$checkOpenStatusDelivery    = $model1->checkOpenStatusDelivery($data);
			if($checkOpenStatus+$checkOpenStatusParkering+$checkOpenStatusDelivery==0)
			{
			header('location:../openDay/'.$data['cid']);	 die;
			}
			else 
			{
			if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else 
			{	
			require_once('IPVisitorsView.php');
			}
			}
			
		}
		
		
		public static function visitorsContactInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model1       = new CompanyModel();
				$resultContry    = $model1->userCountryList($data);
				$companyDetail    = $model1->companyDetail($data);
				$userCountryList    = $model1->userCountryNameList($data);
				$verifyIP    = $model1->verifyIP($data);
				$data['comp_id']    = $model1->selectWhitelistCompany($data);
				$data['comp_name']    = $model1->selectWhitelistCompanyName($data);
				$checkOpenStatus    = $model1->checkOpenStatus($data);
				$checkOpenStatusParkering    = $model1->checkOpenStatusParkering($data);
				$checkOpenStatusDelivery    = $model1->checkOpenStatusDelivery($data);
				if($checkOpenStatus+$checkOpenStatusParkering+$checkOpenStatusDelivery==0)
				{
				header('location:../openDay/'.$data['cid']);	 die;
				}
				else 
				{
				if($verifyIP==0)
				{
					require_once('LicenseErrorView.php');
				}
				else 
				{	
				require_once('WhiteListCompanyVisitorContactInfoMeetingView.php');
				}
					
				}
				}
		}
		
		
		public static function visitorsContactRegularInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model1       = new CompanyModel();
				$resultContry    = $model1->userCountryList($data);
				$companyDetail    = $model1->companyDetail($data);
				$userCountryList    = $model1->userCountryNameList($data);
				$verifyIP    = $model1->verifyIP($data);
				$data['comp_id']    = $model1->selectWhitelistCompany($data);
				$data['comp_name']    = $model1->selectWhitelistCompanyName($data);
				$checkOpenStatus    = $model1->checkOpenStatus($data);
				$checkOpenStatusParkering    = $model1->checkOpenStatusParkering($data);
				$checkOpenStatusDelivery    = $model1->checkOpenStatusDelivery($data);
				if($checkOpenStatus+$checkOpenStatusParkering+$checkOpenStatusDelivery==0)
				{
				header('location:../openDay/'.$data['cid']);	 die;
				}
				else 
				{
				if($verifyIP==0)
				{
					require_once('LicenseErrorView.php');
				}
				else 
				{	
				require_once('WhiteListCompanyVisitorContactInfoRegularView.php');
				}
					
				}
				}
		}
		
		
		public static function listAppointments($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new CompanyModel();
				
				if(!isset($_POST['country_name']))
				{
				
				header('location:../visitorsContactInformation/'.$data['cid']);	 die;	
				}
				$selectedCountry    = $model->selectedCountry($data);
				 
				if(empty($selectedCountry))
				{
					header('location:../visitorsContactInformation/'.$data['cid']);	 die;
				}
				$_POST['country_id']=$selectedCountry['id'];
				$data['meeting_type']=$_POST['meeting_type']; 
				$visitorsDetailRegularAppointmentToday    = $model->visitorsDetailRegularAppointmentToday($data);
				 
				$companyDetail    = $model->companyDetail($data);
				$userCountryList    = $model->userCountryList($data);
				$verifyIP    = $model->verifyIP($data);
				$data['comp_id']    = $model->selectWhitelistCompany($data);
				$data['comp_name']    = $model->selectWhitelistCompanyName($data);
				$checkOpenStatus    = $model->checkOpenStatus($data);
				$checkOpenStatusParkering    = $model->checkOpenStatusParkering($data);
				$checkOpenStatusDelivery    = $model->checkOpenStatusDelivery($data);
				if($checkOpenStatus+$checkOpenStatusParkering+$checkOpenStatusDelivery==0)
				{
				header('location:../openDay/'.$data['cid']);	 die;
				}
				else 
				{
				if($verifyIP==0)
				{
					require_once('LicenseErrorView.php');
				}
				else 
				{	
			 
				if(count($visitorsDetailRegularAppointmentToday)==1)
				{
				header('location:../verifyAppointmentDetails/'.$data['cid'].'/'.$visitorsDetailRegularAppointmentToday[0]['enc'].'/'.$visitorsDetailRegularAppointmentToday[0]['enc1']);	 die;	
				}
				require_once('WhiteListCompanyVisitorAppointmentsListViewNew.php');
				}
					
				}
			}
		}
		
		
		public static function verifyAppointmentDetails($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['meeting_id']=cleanMe($b);
				$data['meeting_type']=cleanMe($c);
				 
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new CompanyModel();
				//$visitorsDetailRegularAppointmentToday    = $model->visitorsDetailRegularAppointmentToday($data);
				$companyDetail    = $model->companyDetail($data);
				$userCountryList    = $model->userCountryList($data);
				$verifyIP    = $model->verifyIP($data);
				$data['comp_id']    = $model->selectWhitelistCompany($data);
				$data['comp_name']    = $model->selectWhitelistCompanyName($data);
				$checkOpenStatus    = $model->checkOpenStatus($data);
				$checkOpenStatusParkering    = $model->checkOpenStatusParkering($data);
				$checkOpenStatusDelivery    = $model->checkOpenStatusDelivery($data);
				if($checkOpenStatus+$checkOpenStatusParkering+$checkOpenStatusDelivery==0)
				{
				header('location:../../../openDay/'.$data['cid']);	 die;
				}
				else 
				{
				if($verifyIP==0)
				{
					require_once('LicenseErrorView.php');
				}
				else 
				{	
				if($data['meeting_type']=='T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09')
				{
					$visitorsDetailRegularAppointmentDetail    = $model->visitorsDetailRegularAppointmentDetail($data);
					 
					require_once('WhiteListCompanyRegularAppointmentDetailView.php');
				}
				else
				{
					$visitorsDetailServiceAppointmentDetail    = $model->visitorsDetailServiceAppointmentDetail($data);
					require_once('WhiteListCompanyVisitorAppointmentDetailView.php');
				}
				
				}
					
				}
			}
		}
		
		
		public static function generateInvoice($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['meeting_id']=cleanMe($b);
				 
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new CompanyModel();
				$companyDetail    = $model->companyDetail($data);
				$userCountryList    = $model->userCountryList($data);
				$verifyIP    = $model->verifyIP($data);
				$data['comp_id']    = $model->selectWhitelistCompany($data);
				$data['comp_name']    = $model->selectWhitelistCompanyName($data);
				$checkOpenStatus    = $model->checkOpenStatus($data);
				$checkOpenStatusParkering    = $model->checkOpenStatusParkering($data);
				$checkOpenStatusDelivery    = $model->checkOpenStatusDelivery($data);
				require_once('../configs/smsMandril.php');
				if($checkOpenStatus+$checkOpenStatusParkering+$checkOpenStatusDelivery==0)
				{
				header('location:../../openDay/'.$data['cid']);	 die;
				}
				else 
				{
				if($verifyIP==0)
				{
					require_once('LicenseErrorView.php');
				}
				else 
				{	
				$visitorsServiceInvoiceDetail    = $model->visitorsServiceInvoiceDetail($data);
				header('location:../../paymentQrInfo/'.$data['cid'].'/'.$data['meeting_id'].'/'.$visitorsServiceInvoiceDetail);	 die;
				}
					
				}
			}
		}
		
		
		public static function paymentQrInfo($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['meeting_id']=cleanMe($b);
				$data['invoice_id']=cleanMe($c);
				 
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new CompanyModel();
				$companyDetail    = $model->companyDetail($data);
				$userCountryList    = $model->userCountryList($data);
				$verifyIP    = $model->verifyIP($data);
				$data['comp_id']    = $model->selectWhitelistCompany($data);
				$data['comp_name']    = $model->selectWhitelistCompanyName($data);
				$checkOpenStatus    = $model->checkOpenStatus($data);
				$checkOpenStatusParkering    = $model->checkOpenStatusParkering($data);
				$checkOpenStatusDelivery    = $model->checkOpenStatusDelivery($data);
				require_once('../configs/smsMandril.php');
				if($checkOpenStatus+$checkOpenStatusParkering+$checkOpenStatusDelivery==0)
				{
				header('location:../../../openDay/'.$data['cid']);	 die;
				}
				else 
				{
				if($verifyIP==0)
				{
					require_once('LicenseErrorView.php');
				}
				else 
				{	
				$verifyIP    = $model->verifyIPDetail();
				$visitorsDetailServiceAppointmentDetail    = $model->visitorsDetailServiceAppointmentDetail($data);
				if($visitorsDetailServiceAppointmentDetail['charge_id']=='' || $visitorsDetailServiceAppointmentDetail['charge_id']==null)
				{
					require_once('WhiteListCompanyVisitorInvoiceQrView.php');
				}
				else
				{
					$updateLeavingStatusBooking    = $model->updateLeavingStatusBooking($data);
					header('location:../../../../WhitelistIP/ipaccount/'.$data['cid']);
				}
				}
					
				}
			}
		}
		
		public static function paymentCardInfo($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['meeting_id']=cleanMe($b);
				$data['invoice_id']=cleanMe($c);
				 
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new CompanyModel();
				$companyDetail    = $model->companyDetail($data);
				$userCountryList    = $model->userCountryList($data);
				$verifyIP    = $model->verifyIP($data);
				$data['comp_id']    = $model->selectWhitelistCompany($data);
				$data['comp_name']    = $model->selectWhitelistCompanyName($data);
				$checkOpenStatus    = $model->checkOpenStatus($data);
				$checkOpenStatusParkering    = $model->checkOpenStatusParkering($data);
				$checkOpenStatusDelivery    = $model->checkOpenStatusDelivery($data);
				require_once('../configs/smsMandril.php');
				if($checkOpenStatus+$checkOpenStatusParkering+$checkOpenStatusDelivery==0)
				{
				header('location:../../../openDay/'.$data['cid']);	 die;
				}
				else 
				{
				if($verifyIP==0)
				{
					require_once('LicenseErrorView.php');
				}
				else 
				{	
				$verifyIP    = $model->verifyIPDetail();
				$visitorsDetailServiceAppointmentDetail    = $model->visitorsDetailServiceAppointmentDetail($data);
				if($visitorsDetailServiceAppointmentDetail['charge_id']=='' || $visitorsDetailServiceAppointmentDetail['charge_id']==null)
				{
					require_once('WhiteListCompanyVisitorCardPaymentView.php');
				}
				else
				{
					$updateLeavingStatusBooking    = $model->updateLeavingStatusBooking($data);
					header('location:../../../../WhitelistIP/ipaccount/'.$data['cid']);
				}
				
				}
					
				}
			}
		}
		
		
		public static function updateServiceInvoicePaymentDetail($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['meeting_id']=cleanMe($b);
				$data['invoice_id']=cleanMe($c);
				 
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new CompanyModel();
				$companyDetail    = $model->companyDetail($data);
				$userCountryList    = $model->userCountryList($data);
				$verifyIP    = $model->verifyIP($data);
				$data['comp_id']    = $model->selectWhitelistCompany($data);
				$data['comp_name']    = $model->selectWhitelistCompanyName($data);
				$checkOpenStatus    = $model->checkOpenStatus($data);
				$checkOpenStatusParkering    = $model->checkOpenStatusParkering($data);
				$checkOpenStatusDelivery    = $model->checkOpenStatusDelivery($data);
				require_once('../configs/smsMandril.php');
				if($checkOpenStatus+$checkOpenStatusParkering+$checkOpenStatusDelivery==0)
				{
				header('location:../../../openDay/'.$data['cid']);	 die;
				}
				else 
				{
				if($verifyIP==0)
				{
					require_once('LicenseErrorView.php');
				}
				else 
				{	
				$verifyIP    = $model->verifyIPDetail();
				$updateServiceInvoicePaymentDetail    = $model->updateServiceInvoicePaymentDetail($data);
				header('location:../../../../WhitelistIP/ipAccount/'.$data['cid']);
				}
					
				}
			}
		}
		
		
		
		public static function updatePaymentInfo($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['meeting_id']=cleanMe($b);
				$data['invoice_id']=cleanMe($c);
				 
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new CompanyModel();
				$companyDetail    = $model->companyDetail($data);
				$userCountryList    = $model->userCountryList($data);
				$verifyIP    = $model->verifyIP($data);
				$data['comp_id']    = $model->selectWhitelistCompany($data);
				$data['comp_name']    = $model->selectWhitelistCompanyName($data);
				$checkOpenStatus    = $model->checkOpenStatus($data);
				$checkOpenStatusParkering    = $model->checkOpenStatusParkering($data);
				$checkOpenStatusDelivery    = $model->checkOpenStatusDelivery($data);
				require_once('../configs/smsMandril.php');
				if($checkOpenStatus+$checkOpenStatusParkering+$checkOpenStatusDelivery==0)
				{
				header('location:../../../openDay/'.$data['cid']);	 die;
				}
				else 
				{
				if($verifyIP==0)
				{
					require_once('LicenseErrorView.php');
				}
				else 
				{	
				 
				$updatePaymentInfo    = $model->updatePaymentInfo($data);
				header('location:../../../../WhitelistIP/ipaccount/'.$data['cid']);
				}
					
				}
			}
		}
		
		public static function verifyInvoiceDetails($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['meeting_id']=cleanMe($b);
				 
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new CompanyModel();
				//$visitorsDetailRegularAppointmentToday    = $model->visitorsDetailRegularAppointmentToday($data);
				$companyDetail    = $model->companyDetail($data);
				$userCountryList    = $model->userCountryList($data);
				$verifyIP    = $model->verifyIP($data);
				$data['comp_id']    = $model->selectWhitelistCompany($data);
				$data['comp_name']    = $model->selectWhitelistCompanyName($data);
				$checkOpenStatus    = $model->checkOpenStatus($data);
				$checkOpenStatusParkering    = $model->checkOpenStatusParkering($data);
				$checkOpenStatusDelivery    = $model->checkOpenStatusDelivery($data);
				require_once('../configs/smsMandril.php');
				if($checkOpenStatus+$checkOpenStatusParkering+$checkOpenStatusDelivery==0)
				{
				header('location:../../openDay/'.$data['cid']);	 die;
				}
				else 
				{
				if($verifyIP==0)
				{
					require_once('LicenseErrorView.php');
				}
				else 
				{	
				$visitorsDetailServiceAppointmentDetail    = $model->visitorsDetailServiceAppointmentDetail($data);
				require_once('WhiteListCompanyVisitorAppointmentInvoiceDetailView.php');
				}
					
				}
			}
		}
		
		
		public static function checkinServiceVisitor($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['meeting_id']=cleanMe($b);
				$data['meeting_type']=cleanMe($c);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new CompanyModel();
				//$visitorsDetailRegularAppointmentToday    = $model->visitorsDetailRegularAppointmentToday($data);
				$companyDetail    = $model->companyDetail($data);
				$userCountryList    = $model->userCountryList($data);
				$verifyIP    = $model->verifyIP($data);
				$data['comp_id']    = $model->selectWhitelistCompany($data);
				$data['comp_name']    = $model->selectWhitelistCompanyName($data);
				$checkOpenStatus    = $model->checkOpenStatus($data);
				$checkOpenStatusParkering    = $model->checkOpenStatusParkering($data);
				$checkOpenStatusDelivery    = $model->checkOpenStatusDelivery($data);
				require_once('../configs/smsMandril.php');
				if($checkOpenStatus+$checkOpenStatusParkering+$checkOpenStatusDelivery==0)
				{
				header('location:../../../openDay/'.$data['cid']);	 die;
				}
				else 
				{
				if($verifyIP==0)
				{
					require_once('LicenseErrorView.php');
				}
				else 
				{	
				if($data['meeting_type']=='T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09')
				{
					$checkinRegularVisitor    = $model->checkinRegularVisitor($data);
				}
				else
				{
					$checkinServiceVisitor    = $model->checkinServiceVisitor($data);
					 
				}
				header('location:../../../visitorsIP/'.$data['cid']);	 die;
				}
					
				}
			}
		}
		
		
		
		
		
		public static function dayClose($a=null)
		{
			
			$path = "../../../../";
			$data=array();
			
			$data['cid']=cleanMe($a);
			$model1       = new CompanyModel();
			$companyDetail    = $model1->companyDetail($data);
			$corporateColor    = $model1->corporateColor($data);
			$verifyLanguage=$model1->verifyLanguage();
			$data['comp_id']    = $model1->selectWhitelistCompany($data);
			$data['comp_name']    = $model1->selectWhitelistCompanyName($data);
			$checkOpenStatus    = $model1->checkOpenStatus($data);
			$visitorsCount    = $model1->visitorsCount($data);
			$checkOpenStatusParkering    = $model1->checkOpenStatusParkering($data);
			$checkOpenStatusDelivery    = $model1->checkOpenStatusDelivery($data);
			$checkOpenStatusSafeqid    = $model1->checkOpenStatusSafeqid($data);
			if($checkOpenStatus+$checkOpenStatusParkering+$checkOpenStatusDelivery+$checkOpenStatusSafeqid==0)
			{
			header('location:../openDay/'.$data['cid']);	 die;
			}
				else 
				{
			
			require_once('CompanyDayCloseView.php');
			
				}
			
		}
		
		
		public static function listPresentVisitors($a=null)
		{
			
			$path = "../../../../";
			$data=array();
			
			$data['cid']=cleanMe($a);
			$model1       = new CompanyModel();
			$companyDetail    = $model1->companyDetail($data);
			$corporateColor    = $model1->corporateColor($data);
			$verifyLanguage=$model1->verifyLanguage();
			$data['comp_id']    = $model1->selectWhitelistCompany($data);
			$data['comp_name']    = $model1->selectWhitelistCompanyName($data);
			$checkOpenStatus    = $model1->checkOpenStatus($data);
			$visitorsCount    = $model1->visitorsCount($data);
			if($visitorsCount['num']>0)
			{
			$visitorsList    = $model1->visitorsList($data);
			$checkOpenStatusParkering    = $model1->checkOpenStatusParkering($data);
			$checkOpenStatusDelivery    = $model1->checkOpenStatusDelivery($data);
			$checkOpenStatusSafeqid    = $model1->checkOpenStatusSafeqid($data);
			if($checkOpenStatus+$checkOpenStatusParkering+$checkOpenStatusDelivery+$checkOpenStatusSafeqid==0)
			{
			header('location:../openDay/'.$data['cid']);	 die;
			}
				else 
				{
			
			require_once('CompanyVisitorsListView.php');
			
				}
			}
			else
			{
			header('location:../companyAccount/'.$data['cid']);	 die;
			}				
			
		}
		
		public static function reportClosingDay($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($co);
				$model1       = new CompanyModel();
				
				$result    = $model1->reportClosingDay($data);
				header("location:../companyAccount/".$data['cid']);
			}
		}
		
		public static function reportDaycareClose($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($co);
				$model1       = new CompanyModel();
				
				$result    = $model1->reportDaycareClose($data);
				header("location:../companyAccount/".$data['cid']);
			}
		}
		public static function visitorsThanks($a=null,$b=null)
		{
			
			$path = "../../../../../";
			$data=array();
			
			$data['cid']=cleanMe($a);
			$data['eid']=cleanMe($b);
			$model1       = new CompanyModel();
			$verifyLanguage=$model1->verifyLanguage();
			$companyDetail    = $model1->companyDetail($data);
			$employeeDetail    = $model1->employeeDetail($data);
			$corporateColor    = $model1->corporateColor($data);
			$verifyIP    = $model1->verifyIP($data);
			$data['comp_id']    = $model1->selectWhitelistCompany($data);
			$data['comp_name']    = $model1->selectWhitelistCompanyName($data);
			$checkOpenStatus    = $model1->checkOpenStatus($data);
				if($checkOpenStatus==0)
				{
				header('location:../../openDay/'.$data['cid']);	 die;
				}
				else 
				{
			if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else 
			{
			require_once('VisitorsThanksView.php');
			}
				}
			
		}
		
		public static function updateDataPost($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($co);
				$model1       = new CompanyModel();
				
				$result    = $model1->updateDataPost($data);
				echo $result; die;
			}
		}
		
		public static function updateDataPostNew($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($co);
				$model1       = new CompanyModel();
				
				$result    = $model1->updateDataPostNew($data);
				echo $result; die;
			}
		}
		
		public static function updateDataPostSupplier($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($co);
				$model1       = new CompanyModel();
				
				$result    = $model1->updateDataPostSupplier($data);
				echo $result; die;
			}
		}
		
		public static function updateDataPhone($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($co);
				$model1       = new CompanyModel();
				
				$result    = $model1->updateDataPhone($data);
				echo $result; die;
			}
		}
		
		public static function updateImage($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($co);
				$model1       = new CompanyModel();
				
				$result    = $model1->updateImage($data);
				header("location:../companyAccount/".$data['cid']);
			}
		}
		
		public static function updateData($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($co);
				$model1       = new CompanyModel();
				
				$result    = $model1->updateData($data);
				echo $result; die;
			}
		}
		
		public static function updateDataBank($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($co);
				$model1       = new CompanyModel();
				
				$result    = $model1->updateDataBank($data);
				echo $result; die;
			}
		}
		
		public static function searchCompanyDetail($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($c);
				$model1       = new CompanyModel();
				if (isset($_POST)) {
					$resultWeb = $model1->searchCompanyDetail($data);
				}
			}
			echo $resultWeb;
			die;
		}
		
		public static function searchLocationDetail($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['lid']=cleanMe($c);
				$model1       = new CompanyModel();
				if (isset($_POST)) {
					$resultWeb = $model1->searchLocationDetail($data);
				}
			}
			echo $resultWeb;
			die;
		}
		
		
		public static function searchCompanyCountry($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($c);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new CompanyModel();
				if (isset($_POST)) {
					$resultWeb = $model1->searchCompanyCountry($data);
				}
			}
			$resultWeb;
			die;
		}
		public static function updateAccount($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path="../../../";
				$model = new CompanyModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$_POST['total_value']=str_ireplace("'",'"',$_POST['total_value']);
				//print_r($_POST); die;
				$updateAccount=$model->updateAccount($data);
				header("location:../../CompanySuppliers/companyAccount/".$data['cid']);
				
			}
		}
		public static function updateCompanyAccount($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path="../../../";
				$model = new CompanyModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				  
				$updateAccount=$model->updateCompanyAccount($data);
				header("location:../companyAccount/".$data['cid']);
				
			}
		}
		public static function updateLocation($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path="../../../";
				$model = new CompanyModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['lid']=cleanMe($a);
				$_POST['total_value']=str_ireplace("'",'"',$_POST['total_value']);
				
				$updateLocation=$model->updateLocation($data);
				header("location:../locationAccount/".$data['lid']);
				
			}
		}
		public static function updateLocationAccount($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path="../../../";
				$model = new CompanyModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['lid']=cleanMe($a);
				$_POST['total_value']=str_ireplace("'",'"',$_POST['total_value']);
				
				$updateLocation=$model->updateLocationAccount($data);
				header("location:../locationAccount/".$data['lid']);
				
			}
		}
		public static function employeeList($a=null, $b=null)
		{
			
			$data=array();
			
			$data['cid']=cleanMe($a);
			$data['filter']=cleanMe($_GET['filter']);
			$model = new CompanyModel();
			
			$employeeList=$model->employeeList($data);
			
			echo $employeeList;
			
			
		}
		
		public static function informEmployee($a=null)
		{
			
			$data=array();
			
			$data['cid']=cleanMe($a);
			
			$model = new CompanyModel();
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			require_once('../lib/url_shortener.php');
			$informEmployee=$model->informEmployee($data);
			
			header('location:../visitorsThanks/'.$data['cid'].'/'.$informEmployee);
			
			
		}
		
		
		public static function checkVisitor($a=null)
		{
			
			$data=array();
			
			$data['cid']=cleanMe($a);
			
			$model = new CompanyModel();
			$checkVisitor=$model->checkVisitor($data);
			
			echo $checkVisitor; die;
			
			
		}
		
		
		public static function updateEmployeeVisitors($a=null,$b=null)
		{
			
				$data=array();
				$data['vid']=cleanMe($a);
				$data['visitor']=cleanMe($b);
				$model = new CompanyModel();
				$updateVisitors = $model->updateVisitors($data);
				header("location:../../updateVisitors/".$data['vid']."?visitor=".$data['visitor']);
			
		}
	}
?>