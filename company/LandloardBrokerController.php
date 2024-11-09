<?php

	require_once 'LandloardBrokerModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCrmController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once 'VitechPropertiesController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class LandloardBrokerController
	{
		
	public static function listSocietyProposal($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new LandloardInhouseModel();
				$data=array();
				$model1       = new LandloardInhouseModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new LandloardInhouseModel();
			$data['fapp_id']=57; $data['app_id']    = $model1->appId($data);
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
					
				if($appdownloadStatus==0)
				{
				$getPermissionDetail    = $model1->getPermissionDetail($data);
				header('location:https://www.safeqloud.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
				die;
				}
				 $model3       = new VitechPropertiesModel();	 
			$employeeSkillCount    = $model3->employeeSkillCount($data);
			$contentDetail    = $model3->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
			 header('location:https://www.safeqloud.com/company/index.php/VitechProperties/proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			 
			$listProposals    = $model1->listProposals($data); 
			 
			require_once('LandloardBrokerProposalListView.php');
	}
	}
	
	
	public static function listSocietyProposalPaidInvoices($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new LandloardInhouseModel();
				$data=array();
				$model1       = new LandloardInhouseModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new LandloardBrokerModel();
			$data['fapp_id']=57; $data['app_id']    = $model1->appId($data);
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
					
				if($appdownloadStatus==0)
				{
				$getPermissionDetail    = $model1->getPermissionDetail($data);
				header('location:https://www.safeqloud.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
				die;
				}
				 $model3       = new VitechPropertiesModel();	 
			$employeeSkillCount    = $model3->employeeSkillCount($data);
			$contentDetail    = $model3->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
			 header('location:https://www.safeqloud.com/company/index.php/VitechProperties/proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			 
			$brokerInvoicePaidList    = $model1->brokerInvoicePaidList($data); 
			 
			require_once('LandloardBrokerProposalInvoicePaidListView.php');
	}
	}
	
	public static function proposalInvoiceComissionInfo($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new LandloardInhouseModel();
				$data=array();
				$model1       = new LandloardInhouseModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['invoice_id']=cleanMe($b);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new LandloardBrokerModel();
			$data['fapp_id']=57; $data['app_id']    = $model1->appId($data);
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
					
				if($appdownloadStatus==0)
				{
				$getPermissionDetail    = $model1->getPermissionDetail($data);
				header('location:https://www.safeqloud.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
				die;
				}
				 $model3       = new VitechPropertiesModel();	 
			$employeeSkillCount    = $model3->employeeSkillCount($data);
			$contentDetail    = $model3->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
			 header('location:https://www.safeqloud.com/company/index.php/VitechProperties/proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			 
			$brokerInvoicePaidDetail    = $model1->brokerInvoicePaidDetail($data); 
			$data['rid']=$brokerInvoicePaidDetail['rid'];
			$guestReservationDetail    = $model1->guestReservationDetail($data);  
			$brokerComissionFeeDetail    = $model1->brokerComissionFeeDetail($data);  
			require_once('LandloardBrokerProposalComissionView.php');
	}
	}
	
	public static function generateInvoiceCommision($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new LandloardInhouseModel();
				$data=array();
				$model1       = new LandloardInhouseModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['invoice_id']=cleanMe($b);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new LandloardBrokerModel();
			$data['fapp_id']=57; $data['app_id']    = $model1->appId($data);
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
					
				if($appdownloadStatus==0)
				{
				$getPermissionDetail    = $model1->getPermissionDetail($data);
				header('location:https://www.safeqloud.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
				die;
				}
				 $model3       = new VitechPropertiesModel();	 
			$employeeSkillCount    = $model3->employeeSkillCount($data);
			$contentDetail    = $model3->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
			 header('location:https://www.safeqloud.com/company/index.php/VitechProperties/proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			require_once('../lib/url_shortener.php');
			$brokerInvoicePaidDetail    = $model1->brokerInvoicePaidDetail($data); 
			$data['rid']=$brokerInvoicePaidDetail['rid'];
			$generateInvoiceCommision    = $model1->generateInvoiceCommision($data); 
			 header('location:../../listSocietyProposalPaidInvoices/'.$data['cid']);
	}
	}
	
		
		public static function guestReservationRequestList($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new LandloardBrokerModel();
				
				 
				$brokerRequestList    = $model->guestReservationRequestList($data);
				
				require_once('LandloardGuestReservationRequestListView.php');
			}
		}
		
		public static function guestReservationTimelineInfo($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				if($data['rid']==null)
				{
					header('location:https://www.safeqloud.com/company/index.php/LandloardBroker/guestReservationRequestList/'.$data['cid']); die;
				}
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new LandloardBrokerModel();
				$userCountryList    = $model->userCountryList($data);
				$guestReservationDetail    = $model->guestReservationDetail($data);
				 
				require_once('guestReservationRequestTimelineView.php');
			}
		}
		
		
		public static function guestReservationDetailInfo($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				if($data['rid']==null)
				{
					header('location:https://www.safeqloud.com/company/index.php/LandloardBroker/guestReservationRequestList/'.$data['cid']); die;
				}
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new LandloardBrokerModel();
				$userCountryList    = $model->userCountryList($data);
				$guestReservationDetail    = $model->guestReservationDetail($data);
				 
				require_once('LandloardGuestReservationRequestInformationView.php');
			}
		}
		
		
		public static function guestReservationFeeInfo($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				if($data['rid']==null)
				{
					header('location:https://www.safeqloud.com/company/index.php/LandloardBroker/guestReservationRequestList/'.$data['cid']); die;
				}
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new LandloardBrokerModel();
				$userCountryList    = $model->userCountryList($data);
				$guestReservationDetail    = $model->guestReservationDetail($data);
				 
				require_once('LandloardGuestReservationFeeView.php');
			}
		}
		
		public static function guestReservationFeePaidInfo($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				if($data['rid']==null)
				{
					header('location:https://www.safeqloud.com/company/index.php/LandloardBroker/guestReservationRequestList/'.$data['cid']); die;
				}
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new LandloardBrokerModel();
				$userCountryList    = $model->userCountryList($data);
				$guestReservationDetail    = $model->guestReservationDetail($data);
				 
				require_once('LandloardGuestReservationFeePaidView.php');
			}
		}
		
		
			public static function guestReservationAgreementSent($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				if($data['rid']==null)
				{
					header('location:https://www.safeqloud.com/company/index.php/LandloardBroker/guestReservationRequestList/'.$data['cid']); die;
				}
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new LandloardBrokerModel();
				$userCountryList    = $model->userCountryList($data);
				$guestReservationDetail    = $model->guestReservationDetail($data);
				 
				require_once('guestReservationAgreementSentDetailInfo.php');
			}
		}
		
		
		
		public static function guestReservationAgreementInfo($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				if($data['rid']==null)
				{
					header('location:https://www.safeqloud.com/company/index.php/LandloardBroker/guestReservationRequestList/'.$data['cid']); die;
				}
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new LandloardBrokerModel();
				$userCountryList    = $model->userCountryList($data);
				$guestReservationDetail    = $model->guestReservationDetail($data);
				$bankAccountList    = $model->bankAccountList($data); 
				require_once('LandloardGuestReservationAgreementDetailView.php');
			}
		}
		
		public static function guestReservationInvoicesInfo($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				if($data['rid']==null)
				{
					header('location:https://www.safeqloud.com/company/index.php/LandloardBroker/guestReservationRequestList/'.$data['cid']); die;
				}
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new LandloardBrokerModel();
				$userCountryList    = $model->userCountryList($data);
				$guestReservationDetail    = $model->guestReservationDetail($data);
				$bankAccountList    = $model->bankAccountList($data); 
				require_once('LandloardGuestReservationInvoicesListView.php');
			}
		}
		
		
		
		
		public static function addAgreementInformation($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				if($data['rid']==null)
				{
					header('location:https://www.safeqloud.com/company/index.php/LandloardBroker/guestReservationRequestList/'.$data['cid']); die;
				}
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new LandloardBrokerModel();
				$userCountryList    = $model->userCountryList($data);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');	
				$guestReservationAgreementAdd    = $model->guestReservationAgreementAdd($data);
				 
				header('location:../../guestReservationDetailInfo/'.$data['cid'].'/'.$data['rid']);
			}
		}
		
		
		 public static function rejectGuestReservationRequest($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new LandloardBrokerModel();
				
				 
				$rejectGuestReservationRequest    = $model->rejectGuestReservationRequest($data);
				 
				header('location:../../guestReservationRequestList/'.$data['cid']);
			}
		}
		
		 public static function approveGuestReservationRequest($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new LandloardBrokerModel();
				
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');	 
				$approveGuestReservationRequest    = $model->approveGuestReservationRequest($data);
				 
				header('location:../../guestReservationRequestList/'.$data['cid']);
			}
		}
		
		
		 public static function updateReservationFeePayment($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new LandloardBrokerModel();
				
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');	 
				$updateReservationFeePayment    = $model->updateReservationFeePayment($data);
				 
				header('location:../../guestReservationRequestList/'.$data['cid']);
			}
		}
		
		
		
		
		
		public static function brokersList($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new LandloardBrokerModel();
				$data['fapp_id']=62;
				$data['app_id']    = $model->appId($data);
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
					
				if($appdownloadStatus==0)
				{
				$getPermissionDetail    = $model->getPermissionDetail($data);
				header('location:https://www.safeqloud.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
				die;
				}
				 $model3       = new VitechPropertiesModel();	 
			$employeeSkillCount    = $model3->employeeSkillCount($data);
			$contentDetail    = $model3->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
			 header('location:https://www.safeqloud.com/company/index.php/VitechProperties/proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
				$brokerRequestList    = $model->brokerRequestList($data);
				 
				require_once('LandloardBrokerListView.php');
			}
		}
		
		
		public static function sentBrokerRequest($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new LandloardBrokerModel();
				$data['fapp_id']=62;
				$data['app_id']    = $model->appId($data);
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
					
				if($appdownloadStatus==0)
				{
				$getPermissionDetail    = $model->getPermissionDetail($data);
				header('location:https://www.safeqloud.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
				die;
				}
				 $model3       = new VitechPropertiesModel();	 
			$employeeSkillCount    = $model3->employeeSkillCount($data);
			$contentDetail    = $model3->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
			 header('location:https://www.safeqloud.com/company/index.php/VitechProperties/proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
				$brokerRequestList    = $model->brokerRequestSentList($data);
				  
				require_once('LandloardBrokerRequestSentView.php');
			}
		}
		
		
		public static function availableLandloard($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new LandloardBrokerModel();
				$data['fapp_id']=58;
				$data['app_id']    = $model->appId($data);
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
					
				if($appdownloadStatus==0)
				{
				$getPermissionDetail    = $model->getPermissionDetail($data);
				header('location:https://www.safeqloud.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
				die;
				}
				$model3       = new VitechPropertiesModel();	 
			$employeeSkillCount    = $model3->employeeSkillCount($data);
			$contentDetail    = $model3->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
			 header('location:https://www.safeqloud.com/company/index.php/VitechProperties/proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			} 
				$brokerRequestInfo    = $model->brokerRequestInfo($data);
				 
				require_once('LandloardBrokerView.php');
			}
		}
		
		public static function listBrokerOffPlanProperties($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new LandloardBrokerModel();
				$data=array();
				$model1       = new LandloardBrokerModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new LandloardBrokerModel();
			$data['fapp_id']=57; $data['app_id']    = $model1->appId($data);
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
					
				if($appdownloadStatus==0)
				{
				$getPermissionDetail    = $model1->getPermissionDetail($data);
				header('location:https://www.safeqloud.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
				die;
				}
				 $model3       = new VitechPropertiesModel();	 
			$employeeSkillCount    = $model3->employeeSkillCount($data);
			$contentDetail    = $model3->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
			 header('location:https://www.safeqloud.com/company/index.php/VitechProperties/proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			$displayproperties    = $model1->getLandloardApprovedList($data);
			if(count($displayproperties)==0)
			{
				header('location:../availableLandloard/'.$data['cid']); die;
			}
			if(isset($_POST['pid']))
			{
				$data['bid']=$_POST['pid'];
			}
			else
			{
			$data['bid']=$displayproperties[0]['enc'];	
			}
			$getLandloardBuildingDetails    = $model1->getLandloardCommunityList($data); 
			$getLandloardCompanyDetail    = $model1->getLandloardCompanyDetail($data); 
			//$getLandloardBuildingDetails    = $model1->getLandloardBuildingDetails($data); 
			 
			//$getLandloardApartmentPropertyList    = $model1->getLandloardApartmentPropertyList($data); 
			require_once('LandloardBrokerOffPlanPropertyView.php');
	}
	}
	
	public static function sendPropertyProposal($a=null)
    {
		
		$valueNew = checkLogin();
        if ($valueNew == 0) {
           $model1       = new LandloardBrokerModel();
				$data=array();
				$model1       = new LandloardBrokerModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			 
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new LandloardBrokerModel();
			 
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');			
			$sendProposal    = $model1->sendPropertyProposal($data);			
           header("location:../listSocietyProposal/".$data['cid']);
	}
	}
	
		public static function listBrokerProposalSociety($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new LandloardBrokerModel();
				$data=array();
				$model1       = new LandloardBrokerModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new LandloardBrokerModel();
			$data['fapp_id']=57; $data['app_id']    = $model1->appId($data);
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
					
				if($appdownloadStatus==0)
				{
				$getPermissionDetail    = $model1->getPermissionDetail($data);
				header('location:https://www.safeqloud.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
				die;
				}
				 $model3       = new VitechPropertiesModel();	 
			$employeeSkillCount    = $model3->employeeSkillCount($data);
			$contentDetail    = $model3->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
			 header('location:https://www.safeqloud.com/company/index.php/VitechProperties/proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			$displayproperties    = $model1->getLandloardApprovedList($data);
			if(count($displayproperties)==0)
			{
				header('location:../availableLandloard/'.$data['cid']); die;
			}
			 
			$getLandloardProposalCommunityList    = $model1->getLandloardProposalCommunityList($data); 
			 
			require_once('LandloardBrokerProposalSocietyView.php');
	}
	}
	
	
	
	
	public static function brokerOffPlanSocietyDetail($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new LandloardBrokerModel();
				$data=array();
				$model1       = new LandloardBrokerModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['sid']=cleanMe($b);
			 
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new LandloardBrokerModel();
			$data['fapp_id']=57; $data['app_id']    = $model1->appId($data);
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
					
				if($appdownloadStatus==0)
				{
				$getPermissionDetail    = $model1->getPermissionDetail($data);
				header('location:https://www.safeqloud.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
				die;
				}
				 
			 $model3       = new VitechPropertiesModel();	 
			$employeeSkillCount    = $model3->employeeSkillCount($data);
			$contentDetail    = $model3->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
			 header('location:https://www.safeqloud.com/company/index.php/VitechProperties/proposalSetupinformation/'.$data['cid']); die;
			}
			
			$getLandloardSocietyDetails    = $model1->getLandloardSocietyDetails($data); 
			$getLandloardSocietyPhotos    = $model1->getLandloardSocietyPhotos($data); 
 			
			$getLandloardSocietyApartmentList    = $model1->getLandloardSocietyApartmentList($data); 
			//print_r($getLandloardApartmentDetailInfo); die;
			require_once('LandloardBrokerOffPlanSocietyDetailView.php');
	}
	}
	
	public static function brokerOffPlanApartmentDetail($a=null,$b=null,$c=null,$d=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new LandloardBrokerModel();
				$data=array();
				$model1       = new LandloardBrokerModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['sid']=cleanMe($b);
			$data['bid']=cleanMe($c);
			$data['aid']=cleanMe($d);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new LandloardBrokerModel();
			$data['fapp_id']=57; $data['app_id']    = $model1->appId($data);
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
					
				if($appdownloadStatus==0)
				{
				$getPermissionDetail    = $model1->getPermissionDetail($data);
				header('location:https://www.safeqloud.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
				die;
				}
				
			$model3       = new VitechPropertiesModel();	 
			$employeeSkillCount    = $model3->employeeSkillCount($data);
			$contentDetail    = $model3->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
			 header('location:https://www.safeqloud.com/company/index.php/VitechProperties/proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			
			$getLandloardBuildingDetails    = $model1->getLandloardBuildingDetails($data); 
			 $getLandloardObjectPhotos    = $model1->getLandloardObjectPhotos($data);
			$getLandloardApartmentDetailInfo    = $model1->getLandloardApartmentDetailInfo($data); 
			//print_r($getLandloardApartmentDetailInfo); die;
			require_once('LandloardBrokerOffPlanApartmentDetailView.php');
	}
	}
	
	
	
	//T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09 
	public static function listBrokerOffPlanBuildingApartment($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new LandloardBrokerModel();
				$data=array();
				$model1       = new LandloardBrokerModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['bid']=cleanMe($b);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new LandloardBrokerModel();
			$data['fapp_id']=57; $data['app_id']    = $model1->appId($data);
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
					
				if($appdownloadStatus==0)
				{
				$getPermissionDetail    = $model1->getPermissionDetail($data);
				header('location:https://www.safeqloud.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
				die;
				}
			$model3       = new VitechPropertiesModel();	 
			$employeeSkillCount    = $model3->employeeSkillCount($data);
			$contentDetail    = $model3->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
			 header('location:https://www.safeqloud.com/company/index.php/VitechProperties/proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			$getLandloardApartmentPropertyList    = $model1->getLandloardApartmentPropertyList($data); 
			$getLandloardBuildingDetails    = $model1->getLandloardBuildingDetails($data); 
			$getLandloardBuildingImages    = $model1->getLandloardBuildingImages($data); 
			 
			require_once('LandloardBrokerApartmentsListView.php');
	}
	}
	
	
		public static function applyLicence($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new LandloardBrokerModel();
				$data['fapp_id']=58;
				$data['app_id']    = $model->appId($data);
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
					
				if($appdownloadStatus==0)
				{
				$getPermissionDetail    = $model->getPermissionDetail($data);
				header('location:https://www.safeqloud.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
				die;
				}
				 $model3       = new VitechPropertiesModel();	 
				$employeeSkillCount    = $model3->employeeSkillCount($data);
				$contentDetail    = $model3->contentDetail($data);
				if($employeeSkillCount==0 || $contentDetail==0)
				{
				 header('location:https://www.safeqloud.com/company/index.php/VitechProperties/proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
				}
				$brokerRequestInfo    = $model->brokerRequestInfo($data);
				 
				require_once('LandloardBrokerApplicationView.php');
			}
		}
		 
		 public static function sendRequestEmail($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['page_id']=1;
				 
				$model       = new LandloardBrokerModel();
				 require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			require_once('../lib/url_shortener.php');
				$sendRequestEmail    = $model->sendRequestEmail($data);
				 
				die;
			}
		}
		 
		 
		public static function verifyLicence($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new LandloardBrokerModel();
				
				 
				$verifyLicence    = $model->verifyLicence($data);
				 
				echo $verifyLicence; die;
			}
		}
		
		
		public static function sendRequest($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new LandloardBrokerModel();
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');	
				 
				$sendRequest    = $model->sendRequest($data);
				 
				header('location:../../availableLandloard/'.$data['cid']);
			}
		}
		
		
		public static function approveRequest($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new LandloardBrokerModel();
				
				 
				$approveRequest    = $model->approveRequest($data);
				 
				header('location:../../brokersList/'.$data['cid']);
			}
		}
		
		
		public static function rejectRequest($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new LandloardBrokerModel();
				
				 
				$rejectRequest    = $model->rejectRequest($data);
				 
				header('location:../../brokersList/'.$data['cid']);
			}
		}
		 
		 
		 
		
		 
	}
    
	
	
?>