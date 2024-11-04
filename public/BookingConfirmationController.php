<?php
require_once 'BookingConfirmationModel.php';
require_once '../configs/utility.php';
 
require_once('../AppModel.php');
class BookingConfirmationController
{		
		public static function addUserAndUpdatePostJob($a=null,$b=null,$c=null,$d=null)
		{
			$path = "../../../";
			$model1       = new BookingConfirmationModel();
			$data=array();
			$data['checkout_id']=cleanMe($a);
			$data['domain_id']=cleanMe($b);
			$data['job_id']=cleanMe($c);
			$data['booked_from']=cleanMe($d);
			$result    = $model1->addUserDetails($data);
			$data['user_id']=$result;
			$updateUserOnJob    = $model1->updateUserOnJob($data); 
			$userSignupMarketplaces    = $model1->userSignupMarketplaces($data);
			$userSummary    = $model1->userSummary($data); 
			$data['email']=$userSummary['email'];
			$data['cid']=$data['job_id'];
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			require_once('../lib/url_shortener.php');
			$result    = $model1->sendPropertyLink($data);
			header('location:https://dstricts.com/public/index.php/BookingInformation/checkedInDetail/'.$data['checkout_id']); die;	
		}
		
			public static function sendVerificationCode($a=null)
		{
			$path = "../../../";
			$model1       = new BookingConfirmationModel();
			$data=array();
			$data['job_id']=cleanMe($a);
			 
			require_once('../configs/smsMandril.php');
			$sendVerificationCode    = $model1->sendVerificationCode($data);
			 echo $sendVerificationCode; die;
		}
		
	
	 
		
		public static function verifyCodeInfo($a=null)
		{
			$path = "../../../";
			$model1       = new BookingConfirmationModel();
			$data=array();
			$data['job_id']=cleanMe($a);
			 
			require_once('../configs/smsMandril.php');
			$verifyCodeInfo    = $model1->verifyCodeInfo($data);
			 echo $verifyCodeInfo; die;
		}
	 public static function emailSignUpJobRequest($a=null,$b=null,$c=null,$d=null)
		{
		$path = "../../../../../../../";
		$model1       = new BookingConfirmationModel();
		$data=array();
		$data['checkout_id']=cleanMe($a);
		$data['domain_id']=cleanMe($b);
		$data['job_id']=cleanMe($c);
		$data['booked_from']=cleanMe($d);
		 
		$data['user_id']    =$_POST['user_id'];	
	 
		if($data['user_id']==0)
		{
			if(empty($_POST['email']))
			{
				header('location:../../../../updateBuyerInfo/'.$data['checkout_id'].'/'.$data['domain_id'].'/'.$data['job_id'].'/'.$data['booked_from']); die;
			}
			require_once('BookingConfirmationSignUpUserView.php'); die;
		 }
		else
		{
			$data['carried_for']=$_POST['carried_for1'];
			$updateUserOnJob    = $model1->updateUserOnJob($data); 
			$userSignupMarketplaces    = $model1->userSignupMarketplaces($data);
			$userSummary    = $model1->userSummary($data); 
			$data['email']=$userSummary['email'];
			$data['cid']=$data['job_id'];
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			require_once('../lib/url_shortener.php');
			$result    = $model1->sendPropertyLink($data);
			header('location:https://dstricts.com/public/index.php/BookingInformation/checkedInDetail/'.$data['checkout_id']); die;	
		}
		}
		
		public static function updateBuyerInfo($a=null,$b=null,$c=null,$d=null)
		{
		$path = "../../../../../../../";
		$model1       = new BookingConfirmationModel();
		$data=array();
		$data['checkout_id']=cleanMe($a);
		$data['domain_id']=cleanMe($b);
		$data['job_id']=cleanMe($c);
		$data['booked_from']=cleanMe($d);
		$data['signup_type']=2;
		$verifyIP = $model1->verifyIP();
		$selectedMarketplaces    = $model1->selectedMarketplaces($data);
		$serviceSelected    = $model1->serviceSelected($data);
		  
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		 if($serviceSelected==1)
		 {
			$bookingServiceInvoiceDetail    = $model1->bookingServiceInvoiceDetail($data);   
			header('location:../../../../bookingInvoicePayment/'.$data['checkout_id'].'/'.$data['domain_id'].'/'.$data['job_id'].'/'.$data['booked_from'].'/'.$bookingServiceInvoiceDetail); die;
		 }
		require_once('BookingConfirmationPostJobView.php');
		}
		
		public static function updateUserInfo($a=null,$b=null,$c=null,$d=null)
		{
		$path = "../../../../";
		$model1       = new BookingConfirmationModel();
		$data=array();
		$data['checkout_id']=cleanMe($a);
		$data['domain_id']=cleanMe($b);
		$data['job_id']=cleanMe($c);
		$data['booked_from']=cleanMe($d);
		$data['signup_type']=2;
		$verifyIP = $model1->verifyIP();
		 
		$selectedMarketplaces    = $model1->selectedMarketplaces($data); 
		
		if(isset($_POST['ip']))
		{
		$data['user_id']    = $model1->loginAppAccount($data);	
		 
		if($data['user_id']==0)
		{
		header('location:../../../../updateBuyerInfo/'.$data['checkout_id'].'/'.$data['domain_id'].'/'.$data['job_id'].'/'.$data['booked_from']); die;	
		}
		else
		{
			$data['carried_for']=$_POST['carried_for'];
			$updateUserOnJob    = $model1->updateUserOnJob($data); 
			$userSignupMarketplaces    = $model1->userSignupMarketplaces($data);
			$userSummary    = $model1->userSummary($data); 
			$data['email']=$userSummary['email'];
			$data['cid']=$data['job_id'];
			$selectedSubcategoryDetail    = $model1->selectedSubcategoryDetail($data); 
			if($selectedSubcategoryDetail==1)
			{
				 
			header('location:../../../../listUserProperties/'.$data['checkout_id'].'/'.$data['cid']); die;	
			}
			else
			{
				if($data['booked_from']=='T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09')
				header('location:https://dstricts.com/public/index.php/BookingInformation/checkedInDetail/'.$data['checkout_id']); die;	
			}				
		}
		}
		else
		{
			header('location:../../../../updateBuyerInfo/'.$data['checkout_id'].'/'.$data['domain_id'].'/'.$data['job_id'].'/'.$data['booked_from']); die;	
		}
		 
		 
		}
		
		public static function updatePropertyDetail($a=null,$b=null)
		{
		$path = "../../../../../";
		$model1       = new BookingConfirmationModel();
		$data=array();
		$data['checkout_id']=cleanMe($a);
		$data['request_id']=cleanMe($b);
		$updatePropertyDetail    = $model1->updatePropertyDetail($data);
		header('location:https://dstricts.com/public/index.php/BookingInformation/checkedInDetail/'.$data['checkout_id']); die;	
		}
		public static function addProfessionalProperty($a=null,$b=null)
		{
		$path = "../../../../../";
		$model1       = new BookingConfirmationModel();
		$data=array();
		$data['checkout_id']=cleanMe($a);
		$data['request_id']=cleanMe($b);
		$addProfessionalProperty    = $model1->addProfessionalProperty($data);
		header('location:https://dstricts.com/public/index.php/BookingInformation/checkedInDetail/'.$data['checkout_id']); die;	
		}
		public static function listUserProperties($a=null,$b=null)
		{
		$path = "../../../../../";
		$model1       = new BookingConfirmationModel();
		$data=array();
		$data['checkout_id']=cleanMe($a);
		$data['request_id']=cleanMe($b);
		$userSignupRequestProperty    = $model1->userSignupRequestProperty($data);
		  
		if($userSignupRequestProperty['user_property_id']=='' || $userSignupRequestProperty['user_property_id']==null || empty($userSignupRequestProperty))
		{
		$vitechCityList    = $model1->vitechCityList($data);
		$userProperty    = $model1->userProperty($data);
		 
		if(empty($userProperty))
		{
		require_once('BookingConfirmationAddPropertyView.php');	
		}
		else
		{
		require_once('BookingConfirmationPropertyListView.php');	
		}
		}
		else
		{
			 
			header('location:https://dstricts.com/public/index.php/BookingInformation/checkedInDetail/'.$data['checkout_id']); die;	
		}
		}
		
		public static function addUserPropertyInfo($a=null,$b=null)
		{
		$path = "../../../../";
		$model1       = new BookingConfirmationModel();
		$data=array();
		$data['checkout_id']=cleanMe($a);
		$data['request_id']=cleanMe($b);
		$userSignupRequestProperty    = $model1->userSignupRequestProperty($data);
		if($userSignupRequestProperty['user_property_id']=='' || $userSignupRequestProperty['user_property_id']==null || empty($userSignupRequestProperty))
		{
		$vitechCityList    = $model1->vitechCityList($data);
		require_once('BookingConfirmationAddPropertyView.php');
		}
		else
		{
			 
			header('location:https://dstricts.com/public/index.php/BookingInformation/checkedInDetail/'.$data['checkout_id']); die;	
		}
		}
		
		
		public static function bookingInvoicePayment($a=null,$b=null,$c=null,$d=null,$e=null)
		{
		$path = "../../../../../../../../";
		$model1       = new BookingConfirmationModel();
		$data=array();
		$data['checkout_id']=cleanMe($a);
		$data['domain_id']=cleanMe($b);
		$data['job_id']=cleanMe($c);
		$data['booked_from']=cleanMe($d);
		$data['invoice_id']=cleanMe($e);
		$data['signup_type']=2;
		$verifyIP = $model1->verifyIP();
		$selectedMarketplaces    = $model1->selectedMarketplaces($data);
		$serviceSelected    = $model1->serviceSelected($data);
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		$bookingServiceInvoiceDetail    = $model1->bookingServiceInvoiceDetail($data); 
		 if($serviceSelected==2)
		 {
			
			header('location:../../../../../updateBuyerInfo/'.$data['checkout_id'].'/'.$data['domain_id'].'/'.$data['job_id'].'/'.$data['booked_from']); die;
		 }
		require_once('BookingConfirmationInvoicePayView.php');
		}
		
		public static function updatePaymentDetail($a=null,$b=null,$c=null,$d=null,$e=null)
		{
		$path = "../../../../../";
		$model1       = new BookingConfirmationModel();
		$data=array();
		$data['checkout_id']=cleanMe($a);
		$data['domain_id']=cleanMe($b);
		$data['job_id']=cleanMe($c);
		$data['booked_from']=cleanMe($d);
		$data['invoice_id']=cleanMe($e);
		if($_POST['user_id']>0)
		{
			
			$data['user_id']=$_POST['user_id'];
			
		}
		else
		{
			$data=$_POST;
			$data['user_id']=$model1->createUser($data);
			$createUserProfile=$model1->createUserProfile($data);
		}
			 
			$saveServicePaymentCardData    = $model1->saveServicePaymentCardData($data);
			$updateServicePaymentDetail    = $model1->updateServicePaymentDetail($data);
			header('location:https://dstricts.com/public/index.php/BookingInformation/checkedInDetail/'.$data['checkout_id']); die;	
		 
		 
		 
		}
		
		
		public static function verifyUserDetailForPayment($a=null,$b=null,$c=null,$d=null,$e=null,$f=null)
		{
		$path = "../../../../../../../../../";
		$model1       = new BookingConfirmationModel();
		$data=array();
		$data['checkout_id']=cleanMe($a);
		$data['domain_id']=cleanMe($b);
		$data['job_id']=cleanMe($c);
		$data['booked_from']=cleanMe($d);
		$data['invoice_id']=cleanMe($e);
		$data['verification_id']=cleanMe($f); 
		
		$codeInfo    = $model1->codeInfo($data);
		 
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data); 
		require_once('BookingConfirmationMannualPaymentVerificationView.php');  
		 
		}
		
		public static function verifyPaymentDetail($a=null,$b=null,$c=null,$d=null,$e=null,$f=null)
		{
		$path = "../../../../../../../../../";
		$model1       = new BookingConfirmationModel();
		$data=array();
		$data['checkout_id']=cleanMe($a);
		$data['domain_id']=cleanMe($b);
		$data['job_id']=cleanMe($c);
		$data['booked_from']=cleanMe($d);
		$data['invoice_id']=cleanMe($e);
		$data['verification_id']=cleanMe($f); 
		$updateVerificationInfo    = $model1->updateVerificationInfo($data);
		 
		header('location:https://dstricts.com/public/index.php/BookingInformation/checkedInDetail/'.$data['checkout_id']); die;	
		 
		}
		
		public static function verifyEmail($a=null)
		{
			$path = "../../../";
			$model1       = new BookingConfirmationModel();
			$data=array();
			$data['job_id']=cleanMe($a);
			 
			require_once('../configs/smsMandril.php');
			$verifyEmail    = $model1->verifyEmail($data);
			$senverificationCode    = $model1->senverificationCode($data);
			 echo $verifyEmail; die;
		}
		public static function verifyEmailCodeInfo($a=null)
		{
			$path = "../../../";
			$model1       = new BookingConfirmationModel();
			$data=array();
			$data['job_id']=cleanMe($a);
			 
			require_once('../configs/smsMandril.php');
			$verifyCodeInfo    = $model1->verifyEmailCodeInfo($data);
			 echo $verifyCodeInfo; die;
		}
		
		public static function verifyEmailPhoneCodeInfo($a=null)
		{
			$path = "../../../";
			$model1       = new BookingConfirmationModel();
			$data=array();
			$data['job_id']=cleanMe($a);
			 
			require_once('../configs/smsMandril.php');
			$verifyEmailCodeInfo    = $model1->verifyEmailPhoneCodeInfo($data);
			 echo $verifyEmailCodeInfo; die;
		}
		
		public static function mannualPaymentInfo($a=null,$b=null,$c=null,$d=null,$e=null)
		{
		$path = "../../../../../../../../";
		$model1       = new BookingConfirmationModel();
		$data=array();
		$data['checkout_id']=cleanMe($a);
		$data['domain_id']=cleanMe($b);
		$data['job_id']=cleanMe($c);
		$data['booked_from']=cleanMe($d);
		$data['invoice_id']=cleanMe($e);
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		$serviceSelected    = $model1->serviceSelected($data);
		$bookingServiceInvoiceDetail    = $model1->bookingServiceInvoiceDetail($data);
		if($serviceSelected==2)
		 {
			header('location:../../../../../updateBuyerInfo/'.$data['checkout_id'].'/'.$data['domain_id'].'/'.$data['job_id'].'/'.$data['booked_from']); die;
		 }
		require_once('BookingConfirmationMannualPaymentView.php');  
		 
		}
		
		public static function updateUserPayInfo($a=null,$b=null,$c=null,$d=null,$e=null)
		{
		$path = "../../../../";
		$model1       = new BookingConfirmationModel();
		$data=array();
		$data['checkout_id']=cleanMe($a);
		$data['domain_id']=cleanMe($b);
		$data['job_id']=cleanMe($c);
		$data['booked_from']=cleanMe($d);
		$data['invoice_id']=cleanMe($e);
		$data['signup_type']=2;
		$verifyIP = $model1->verifyIP();
		 
		$selectedMarketplaces    = $model1->selectedMarketplaces($data); 
		
		if(isset($_POST['ip']))
		{
		$data['user_id']    = $model1->loginAppAccount($data);	
		if($data['user_id']==0)
		{
		header('location:../../../../../updateBuyerInfo/'.$data['checkout_id'].'/'.$data['domain_id'].'/'.$data['job_id'].'/'.$data['booked_from']);  die;	
		}
		else
		{
			$data['carried_for']=$_POST['carried_for'];
			$updateUserOnJob    = $model1->updateUserPayInfo($data); 
			$userSignupMarketplaces    = $model1->userSignupMarketplaces($data);
			$userSummary    = $model1->userSummary($data); 
			$data['email']=$userSummary['email'];
			$data['cid']=$data['job_id'];
			$selectedSubcategoryDetail    = $model1->selectedSubcategoryDetail($data); 
			if($selectedSubcategoryDetail==1)
			{
			$_POST['checkout_id']=$data['checkout_id'];
			$_POST['booked_from']=$data['booked_from'];
			header('location:../../../../../listUserProperties/'.$data['checkout_id'].'/'.$data['cid']); die;	
			}
			else
			{
				header('location:https://dstricts.com/public/index.php/BookingInformation/checkedInDetail/'.$data['checkout_id']); die;	
			}				
		}
		}
		else
		{
			header('location:../../../../../updateBuyerInfo/'.$data['checkout_id'].'/'.$data['domain_id'].'/'.$data['job_id'].'/'.$data['booked_from']); die;
		}
		 
		 
		}
		
		
		
		
		public static function checkUserInfo()
		{
			$path = "../../../";
			$model1       = new BookingConfirmationModel();
			
			$checkUserInfo    = $model1->checkUserInfo();
			 echo $checkUserInfo; die;
		}
		
		
	 
}
?>