<?php
require_once 'LandloardBrokerModel.php';
 
require_once '../configs/utility.php';
require_once('../AppModel.php');
class LandloardBrokerController
{
	
	
	
	public static function requestList()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.safeqloud.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				}
				else
				{
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new LandloardBrokerModel();
				$reservationRequestList    = $model1->reservationRequestList($data);
				require_once('LandloardBrokerReservationRequestListView.php');
				}
			
		}
	
	public static function guestReservationTimelineInfo($a=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.safeqloud.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$path = "../../../../";
				 
				$data['rid']=cleanMe($a);
				$model       = new LandloardBrokerModel();
				$guestReservationDetail    = $model->guestReservationDetail($data);
			
				require_once('guestReservationRequestTimelineView.php');
				}
		}
		
	public static function reservationRequestDetail($a=null)
    {
		 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.safeqloud.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$path = "../../../../";
				 
			$data['rid']=cleanMe($a);
			$model1       = new LandloardBrokerModel();
			
			$guestReservationDetail    = $model1->guestReservationDetail($data); 
			$userCountryList    = $model1->userCountryList($data); 
			require_once('LandloardGuestReservationRequestInformationView.php');
				}
	}	
	 
	 
	 public static function reservationRequestFeeDetail($a=null)
    {
		 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.safeqloud.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$path = "../../../../";
				 
			$data['rid']=cleanMe($a);
			$model1       = new LandloardBrokerModel();
			
			$guestReservationDetail    = $model1->guestReservationDetail($data); 
			$userCountryList    = $model1->userCountryList($data); 
			require_once('LandloardBrokerReservationFeeView.php');
				}
	}	
	
	
	 public static function reservationFeePaymentDetail($a=null)
    {
		 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.safeqloud.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$path = "../../../../";
				 
			$data['rid']=cleanMe($a);
			$model1       = new LandloardBrokerModel();
			
			$guestReservationDetail    = $model1->guestReservationDetail($data); 
			$userCountryList    = $model1->userCountryList($data); 
			require_once('LandloardGuestReservationFeePaidView.php');
				}
	}	
	
	public static function agreementDetail($a=null)
    {
		 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.safeqloud.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$path = "../../../../";
				 
			$data['agreement_id']=cleanMe($a);
			$model1       = new LandloardBrokerModel();
			$guestReservationDetail    = $model1->agreementDetailInformation($data); 
			//echo '<pre>'; print_r($guestReservationDetail); echo '</pre>';  die;
			$agreementInstallmentDates    = $model1->agreementInstallmentDates($data);  
			require_once('LandloardGuestReservationAgreementDetailView.php');
				}
	}


public static function invoiceDetail($a=null)
    {
		 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.safeqloud.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$path = "../../../../";
				 
			$data['agreement_id']=cleanMe($a);
			$model1       = new LandloardBrokerModel();
			$guestReservationDetail    = $model1->agreementDetailInformation($data); 
			//echo '<pre>'; print_r($guestReservationDetail); echo '</pre>';  die;
			$agreementInstallmentDates    = $model1->agreementInstallmentDates($data);  
			require_once('LandloardGuestReservationInvoiceDetailView.php');
				}
	}  	
	
	public static function approveAgreement($a=null)
    {
		 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.safeqloud.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$path = "../../../../../";
				 
			$data=array();
			$data['agreement_id']=cleanMe($a);
			 
			$model1       = new LandloardBrokerModel();
			$approveAgreement    = $model1->approveAgreement($data); 
			 header('location:../agreementDetail/'.$data['agreement_id']);
				}
	}
	
	public static function rejectAgreement($a=null)
    {
		 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.safeqloud.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$path = "../../../../../";
				 
			$data=array();
			$data['agreement_id']=cleanMe($a);
			 
			$model1       = new LandloardBrokerModel();
			$rejectAgreement    = $model1->rejectAgreement($data); 
			 header('location:../agreementDetail/'.$data['agreement_id']);
				}
	}
	
	
	public static function sendInvoceInformation($a=null)
    {
		 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$model1       = new LandloardBrokerModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.safeqloud.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$path = "../../../../../";
				 
			$data=array();
			$data['rid']=cleanMe($a);
			 
			$model1       = new LandloardBrokerModel();
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');	
			$sendInvoceInformation    = $model1->sendInvoceInformation($data); 
			header('location:../guestReservationTimelineInfo/'.$data['rid']);
				}
	}
	
}
?>