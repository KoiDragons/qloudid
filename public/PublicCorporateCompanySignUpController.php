<?php
require_once 'PublicCorporateCompanySignUpModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class PublicCorporateCompanySignUpController
{
  
	 public static function createAccount($a=null)
    {
		$path  = "../../../../";
		
		$model = new PublicCorporateCompanySignUpModel();
		$data=array();
		$data['cid']    = cleanMe($a);
		$signupFieldsInfo = $model->signupFieldsInfo($data);
		if(empty($signupFieldsInfo))
		{
			header('location:../invalidRequest');
		}
		$resultContry = $model->selectCountry($data);
		 
		require_once('PublicCorporateCompanySignUpView.php');
   
	}
	
	public static function invalidRequest($a=null)
		{
			$path  = "../../../";
			$data=array();
			$data['id']=cleanMe($a);
			$model = new PublicCorporateCompanySignUpModel();
			require_once('PublicCorporateCompanySignUpInvalidRequestView.php');
		 
		}
		
	
	public static function saveDetails($a=null)
		{
			$data=array();
			$data['cid']=cleanMe($a);
		 $model = new PublicCorporateCompanySignUpModel();
		 if(isset($_POST['card_number']))
		 {
			require "../cardvalidity/vendor/autoload.php";	
			$detector = new CardDetect\Detector();
			$card = $_POST['card_number'];
			$data['card_type']= $detector->detect($card);
		 }
		 
		$data['id'] = $model->saveDetails($data);
		
		
		 
		$addedInformation = $model->addedInformation($data);
		 
		 if($addedInformation['verify_email']==1)
		 {
			header('location:../verifyEmail/'.$data['id']);  die;
		 }
		 
		  if($addedInformation['verify_phone_detail']==1 || $addedInformation['verify_phone_detail_mandatory']==1)
		 {
			header('location:../verifyPhone/'.$data['id']); die;
		 }
		
		 $createUserAccount = $model->createUserAccount($data);
		 //$createCompanyAccount = $model->createCompanyAccount($data);
		header('location:../thanksSingUp/'.$data['id']); 
		}
		
		public static function verifyEmail($a=null)
		{
			$path  = "../../../../";
			$data=array();
			$data['id']=cleanMe($a);
		 $model = new PublicCorporateCompanySignUpModel();
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		 $addedInformation = $model->addedInformation($data);
		
		 $data['email']=$addedInformation['email'];
		 $sendEmailOtp = $model->sendEmailOtp($data);
		require_once('PublicCorporateCompanySignUpVerifyEmailView.php');
		 
		}
		
		
		public static function verifyPhone($a=null)
		{
			$path  = "../../../../";
			$data=array();
			$data['id']=cleanMe($a);
		 $model = new PublicCorporateCompanySignUpModel();
		require_once('../lib/url_shortener.php');
		require_once('../configs/smsMandril.php');
		 $addedInformation = $model->addedInformation($data);
		$data['phone_number']=$addedInformation['phone_number'];
		$data['country_code']=$addedInformation['country_code'];
		 $sendPhoneOtp = $model->sendPhoneOtp($data);
		 require_once('PublicCorporateCompanySignUpVerifyPhoneView.php');
		 
		}
		
		public static function verifyDetails($a=null)
		{
			$data=array();
			$data['id']=cleanMe($a);
		 $model = new PublicCorporateCompanySignUpModel();
		
		$addedInformation = $model->addedInformation($data);
		 if($addedInformation['verify_phone_detail']==1 || $addedInformation['verify_phone_detail_mandatory']==1)
		 {
			header('location:../verifyPhone/'.$data['id']); die;
		 }
		 $createUserAccount = $model->createUserAccount($data);
		  $createCompanyAccount = $model->createCompanyAccount($data);
		 header('location:../thanksSingUp/'.$data['id']);
		}
		
		public static function verifyPhoneDetails($a=null)
		{
			$path  = "../../../../";
			$data=array();
			$data['id']=cleanMe($a);
			$model = new PublicCorporateCompanySignUpModel();
			$createUserAccount = $model->createUserAccount($data);
			 $createCompanyAccount = $model->createCompanyAccount($data);
			header('location:../thanksSingUp/'.$data['id']);
		}
		
		
		
		
		public static function thanksSingUp($a=null)
		{
			$path  = "../../../../";
			$data=array();
			$data['id']=cleanMe($a);
			$model = new PublicCorporateCompanySignUpModel();
			require_once('PublicCorporateCompanySignUpThankslView.php');
		 
		}
		
	 public static function checkmail($a=null)
    {
		 
		$model = new PublicCorporateCompanySignUpModel();
		$checkmail = $model->checkmail();
		 
		echo $checkmail; die;
   
	}
	
	 public static function checkCompanyId($a=null)
    {
		 
		$model = new PublicCorporateCompanySignUpModel();
		$checkCompanyId = $model->checkCompanyId();
		 
		echo $checkCompanyId; die;
   
	}
	
	 public static function checkCompanyEmail($a=null)
    {
		 
		$model = new PublicCorporateCompanySignUpModel();
		$checkCompanyEmail = $model->checkCompanyEmail();
		 
		echo $checkCompanyEmail; die;
   
	}
	
	public static function verifyPhoneOtp($a=null)
    {
		 $data=array();
			$data['id']=cleanMe($a);
		$model = new PublicCorporateCompanySignUpModel();
		$verifyPhoneOtp = $model->verifyPhoneOtp($data);
		 
		echo $verifyPhoneOtp; die;
   
	}
	
	
	public static function verifyOtp($a=null)
    {
		 $data=array();
			$data['id']=cleanMe($a);
		$model = new PublicCorporateCompanySignUpModel($data);
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
	 public static function checkUsedIdentificator($a=null)
    {
		 
		$model = new PublicCorporateCompanySignUpModel();
		$checkUsedIdentificator = $model->checkUsedIdentificator();
		 
		echo $checkUsedIdentificator; die;
   
	}
	
	 public static function checkPhoneNumber($a=null)
    {
		 
		$model = new PublicCorporateCompanySignUpModel();
		$checkPhoneNumber = $model->checkPhoneNumber();
		 
		echo $checkPhoneNumber; die;
   
	}
}
?>