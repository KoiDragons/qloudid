<?php
require_once 'PublicCorporateUserSignUpModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class PublicCorporateUserSignUpController
{
  
	 public static function createAccount($a=null,$b=null)
    {
		$path  = "../../../../../";
		
		$model = new PublicCorporateUserSignUpModel();
		$data=array();
		$data['cid']    = cleanMe($a);
		$data['domain_id']    = cleanMe($b);
		$data['domain_id_decrypt']= $model->domainIdDecrypt($data);
		$signupFieldsInfo = $model->signupFieldsInfo($data);
		
		/*if(empty($signupFieldsInfo))
		{
			header('location:../../invalidRequest/'.$data['cid'].'/'.$data['domain_id']);
		}
		$data['domain_id_decrypt']= $model->domainIdDecrypt($data);
		if($data['domain_id_decrypt']==1)
		{
		$getSoligahemCount = $model->getSoligahemCount($data);
		if($getSoligahemCount['num']==0)
		{
		header('location:https://dstricts.com/public/index.php/SearchProperty'); die;	
		}			
		}*/
		$resultContry = $model->selectCountry($data);
		 
		require_once('PublicCorporateUserSignUpView.php');
   
	}
	
	public static function invalidRequest($a=null,$b=null)
		{
			$path  = "../../../../../";
			$data=array();
			$data['id']=cleanMe($a);
			$data['domain_id']    = cleanMe($b);
			$model = new PublicCorporateUserSignUpModel();
			require_once('PublicCorporateUserSignUpInvalidRequestView.php');
		 
		}
		
	
	public static function saveDetails($a=null,$b=null)
		{
			$data=array();
			$data['cid']=cleanMe($a);
			$data['domain_id']    = cleanMe($b);
		 $model = new PublicCorporateUserSignUpModel();
		 if(isset($_POST['card_number']))
		 {
			require "../cardvalidity/vendor/autoload.php";	
			$detector = new CardDetect\Detector();
			$card = $_POST['card_number'];
			$data['card_type']= $detector->detect($card);
		 }
		 
		$data['id'] = $model->saveDetails($data);
		$addedInformation = $model->addedInformation($data);
		 if($addedInformation['account_status']==2)
		 {
			 $createUserAccount = $model->updateUserAccount($data); 
			 if($createUserAccount['domain_id']==1)
			 {
				 $updateSoligahem = $model->updateSoligahem($createUserAccount);  
				header('location:https://dstricts.com/public/index.php/SearchProperty'); die;	
			 }
		 }
		
		 if($addedInformation['verify_email']==1)
		 {
			header('location:../../verifyEmail/'.$data['id'].'/'.$data['domain_id']);  die;
		 }
		 
		  if($addedInformation['verify_phone_detail']==1 || $addedInformation['verify_phone_detail_mandatory']==1)
		 {
			header('location:../../verifyPhone/'.$data['id'].'/'.$data['domain_id']); die;
		 }
		 if($addedInformation['account_status']==1)
		 {
			 $createUserAccount = $model->createUserAccount($data); 
		 }
		 else
		 {
			 $createUserAccount = $model->updateUserAccount($data); 
		 }
		 
		 if($createUserAccount['domain_id']==1)
		 {
			$updateSoligahem = $model->updateSoligahem($createUserAccount);  
			header('location:https://dstricts.com/public/index.php/SearchProperty'); die;	
		 }
		header('location:../../thanksSingUp/'.$data['id'].'/'.$data['domain_id']); 
		}
		
		public static function verifyEmail($a=null,$b=null)
		{
			$path  = "../../../../../";
			$data=array();
			$data['id']=cleanMe($a);
			$data['domain_id']    = cleanMe($b);
		 $model = new PublicCorporateUserSignUpModel();
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		 $addedInformation = $model->addedInformation($data);
		
		 $data['email']=$addedInformation['email'];
		 $sendEmailOtp = $model->sendEmailOtp($data);
		require_once('PublicCorporateUserSignUpVerifyEmailView.php');
		 
		}
		
		
		public static function verifyPhone($a=null,$b=null)
		{
			$path  = "../../../../../";
			$data=array();
			$data['id']=cleanMe($a);
			$data['domain_id']    = cleanMe($b);
		 $model = new PublicCorporateUserSignUpModel();
		require_once('../lib/url_shortener.php');
		require_once('../configs/smsMandril.php');
		 $addedInformation = $model->addedInformation($data);
		$data['phone_number']=$addedInformation['phone_number'];
		$data['country_code']=$addedInformation['country_code'];
		 $sendPhoneOtp = $model->sendPhoneOtp($data);
		 require_once('PublicCorporateUserSignUpVerifyPhoneView.php');
		 
		}
		
		public static function verifyDetails($a=null,$b=null)
		{
			$data=array();
			$data['id']=cleanMe($a);
			$data['domain_id']    = cleanMe($b);
		 $model = new PublicCorporateUserSignUpModel();
		
		$addedInformation = $model->addedInformation($data);
		 if($addedInformation['verify_phone_detail']==1 || $addedInformation['verify_phone_detail_mandatory']==1)
		 {
			header('location:../../verifyPhone/'.$data['id'].'/'.$data['domain_id']); die;
		 }
		 if($addedInformation['account_status']==1)
		 {
			 $createUserAccount = $model->createUserAccount($data); 
		 }
		 else
		 {
			 $createUserAccount = $model->updateUserAccount($data); 
		 }
		 
		 if($createUserAccount['domain_id']==1)
		 {
			$updateSoligahem = $model->updateSoligahem($createUserAccount);  
			header('location:https://dstricts.com/public/index.php/SearchProperty'); die;	
		 }
		 header('location:../../thanksSingUp/'.$data['id'].'/'.$data['domain_id']);
		}
		
		public static function verifyPhoneDetails($a=null,$b=null)
		{
			$path  = "../../../../../";
			$data=array();
			$data['id']=cleanMe($a);
			$data['domain_id']    = cleanMe($b);
			$model = new PublicCorporateUserSignUpModel();
			if($addedInformation['account_status']==1)
			 {
				 $createUserAccount = $model->createUserAccount($data); 
			 }
			  else
			 {
				 $createUserAccount = $model->updateUserAccount($data); 
			 }
			  if($createUserAccount['domain_id']==1)
			  {
				$updateSoligahem = $model->updateSoligahem($createUserAccount);  
				header('location:https://dstricts.com/public/index.php/SearchProperty'); die;	
			  }
			header('location:../../thanksSingUp/'.$data['id'].'/'.$data['domain_id']);
		}
		
		
		
		
		public static function thanksSingUp($a=null,$b=null)
		{
			$path  = "../../../../../";
			$data=array();
			$data['id']=cleanMe($a);
			$data['domain_id']    = cleanMe($b);
			$model = new PublicCorporateUserSignUpModel();
			require_once('PublicCorporateUserSignUpThankslView.php');
		 
		}
		
	 public static function checkmail($a=null,$b=null)
    {
		 
		$model = new PublicCorporateUserSignUpModel();
		$checkmail = $model->checkmail();
		 
		echo $checkmail; die;
   
	}
	
	public static function verifyPhoneOtp($a=null,$b=null)
    {
		 $data=array();
			$data['id']=cleanMe($a);
			$data['domain_id']    = cleanMe($b);
		$model = new PublicCorporateUserSignUpModel();
		$verifyPhoneOtp = $model->verifyPhoneOtp($data);
		 
		echo $verifyPhoneOtp; die;
   
	}
	
	
	public static function verifyOtp($a=null,$b=null)
    {
		 $data=array();
			$data['id']=cleanMe($a);
			$data['domain_id']    = cleanMe($b);
		$model = new PublicCorporateUserSignUpModel($data);
		$verifyOtp = $model->verifyOtp($data);
		 
		echo $verifyOtp; die;
   
	}
	
	public static function checkCard()
		{
		require "../cardvalidity/vendor/autoload.php";	
		$detector = new CardDetect\Detector();
		$card = $_POST['card_number'];

		echo $detector->detect($card); //Visa
			
		}
	 public static function checkUsedIdentificator($a=null,$b=null)
    {
		 
		$model = new PublicCorporateUserSignUpModel();
		$checkUsedIdentificator = $model->checkUsedIdentificator();
		 
		echo $checkUsedIdentificator; die;
   
	}
	
	 public static function checkPhoneNumber($a=null,$b=null)
    {
		 
		$model = new PublicCorporateUserSignUpModel();
		$checkPhoneNumber = $model->checkPhoneNumber();
		 
		echo $checkPhoneNumber; die;
   
	}
}
?>