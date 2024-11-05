<?php
	require_once 'StoreDataModel.php';
	require_once 'PersonalRequestsController.php';
	require_once 'ShareMonitorController.php';
	require_once 'ConnectKinController.php';
	require_once '../configs/utility.php';
	class StoreDataController
	{
		
		
		public static function index()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path         = "../../";
				$model1       = new StoreDataModel();
				
				
				require_once('StoreDataView.php');
			}
		}
		
		public static function checkConnection($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['certi_id']=cleanMe($co);
				$model1       = new StoreDataModel();
				$result    = $model1->checkConnection($data);
				echo $result; die;
			}
		}
		
		
		public static function getDates()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$model1       = new StoreDataModel();
				$result    = $model1->getDates();
				echo $result; die;
			}
		}
		
		public static function userAccount($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				if(isset($_SESSION['rememberme_qid'])){
					
					setcookie('rememberme_qid', $_SESSION['rememberme_qid'], time()+ (30*60*60*24), '/', "qmatchup.com");
				}
				
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				
				$model1       = new StoreDataModel();
				$row_lice = $model1->licenceDetail($data);
				$result_lang = $model1->languageDetail($data);
				$resultOrg    = $model1->userAccount($data);
				
				$resultOrg1    = $model1->employeeAccount($data);
				//print_r($resultOrg1); die;
				$row_summary    = $model1->userSummary($data);
				//print_r($row_summary); //die;
				if($row_summary['get_started_wizard_status']==0 && ($row_summary['first_name']==null || $row_summary['first_name']==""))
				{
				//	echo "jain"; die;
					header("location:../GetStartedNew");
				}
				else if($row_summary['get_started_wizard_status']==0 && ($row_summary['first_name']!=null || $row_summary['first_name']!=""))
				{
					header("location:../UpdateSecurityStatus");
				}
				$verificationId    = $model1->verificationId($data);
				//print_r($data);
				//print_r($verificationId); die;
				$hijackedUser    = $model1->hijackedUser($data);
				$rowsummary = $model1->userProfileSummary($data);	
				$userBankid = $model1->userBankid($data);
				$userCardDetail = $model1->userCardDetail($data);
				$result_exp = $model1->userExp($data);
				$result_edu = $model1->userEducation($data);
				$result_country = $model1->userCountry($data);
				$result_school1 = $model1->userSchool($data);
				$result_school111 = $model1->userClass($data);
				$row_exp_count = $model1->userExpCount($data);
				$row_lang_count = $model1->userLanguageCount($data);
				
				// print_r($row_lang); die;
				$row_edu_count = $model1->userEduCount($data);
				$resultContry = $model1->selectCountry(); 
				
				$model2 = new PersonalRequestsController();
				$receivedRequestsUser = $model2->receivedRequestsUser();
				$model3 = new ConnectKinController();
				$connectAccountReceivedCount = $model3->connectAccountReceivedCount();
				$model4 = new ShareMonitorController();
				$receivedAllCount = $model4->receivedAllCount();
				require_once('StoreDataView.php');
			}
			
		}
		
		public static function addUserSSN($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				if(isset($_SESSION['rememberme_qid'])){
					
					setcookie('rememberme_qid', $_SESSION['rememberme_qid'], time()+ (30*60*60*24), '/', "qmatchup.com");
				}
				
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				
				$model1       = new StoreDataModel();
				;
				$row_summary    = $model1->userSummary($data);
				
				if($row_summary['get_started_wizard_status']==0 && ($row_summary['first_name']==null || $row_summary['first_name']==""))
				{
					header("location:../GetStartedNew");
				}
				else if($row_summary['get_started_wizard_status']==0 && ($row_summary['first_name']!=null || $row_summary['first_name']!=""))
				{
					header("location:../UpdateSecurityStatus");
				}
				$resultContry = $model1->countryOption();
				require_once('StoreSSNView.php');
			}
			
		}
		
		
		
		public static function identificatorInfo($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$model1       = new StoreDataModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				
				if(isset($_SESSION['rememberme_qid'])){
					
					setcookie('rememberme_qid', $_SESSION['rememberme_qid'], time()+ (30*60*60*24), '/', "qmatchup.com");
				}
				
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				
				$model1       = new StoreDataModel();
				
				$row_summary    = $model1->userSummary($data);
				 
				$resultContry = $model1->countryOption();
				require_once('StoreIdentificationInfoViewNew.php');
			}
			
		}
		
		public static function addPhoneNumber($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				if(isset($_SESSION['rememberme_qid'])){
					
					setcookie('rememberme_qid', $_SESSION['rememberme_qid'], time()+ (30*60*60*24), '/', "qmatchup.com");
				}
				
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				
				$model1       = new StoreDataModel();
				$resultOrg1    = $model1->employeeAccount($data);
				$row_summary    = $model1->userSummary($data);
				$resultContry = $model1->countryOption();
				if($row_summary['get_started_wizard_status']==0 && ($row_summary['first_name']==null || $row_summary['first_name']==""))
				{
					header("location:../GetStartedNew");
				}
				else if($row_summary['get_started_wizard_status']==0 && ($row_summary['first_name']!=null || $row_summary['first_name']!=""))
				{
					header("location:../UpdateSecurityStatus");
				}
				
				require_once('StorePhoneNumberView.php');
			}
			
		}
		
			public static function addUserName($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				if(isset($_SESSION['rememberme_qid'])){
					
					setcookie('rememberme_qid', $_SESSION['rememberme_qid'], time()+ (30*60*60*24), '/', "qmatchup.com");
				}
				
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				
				$model1       = new StoreDataModel();
				$resultOrg1    = $model1->employeeAccount($data);
				$row_summary    = $model1->userSummary($data);
				$resultContry = $model1->countryOption();
				$resultOrg    = $model1->userAccount($data); 
				require_once('StoreUserNameView.php');
			}
			
		}
		
		public static function updatePhoneDetail($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				if(isset($_SESSION['rememberme_qid'])){
					
					setcookie('rememberme_qid', $_SESSION['rememberme_qid'], time()+ (30*60*60*24), '/', "qmatchup.com");
				}
				
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				
				$model1       = new StoreDataModel();
				$resultOrg1    = $model1->employeeAccount($data);
				$row_summary    = $model1->userSummary($data);
				$resultContry = $model1->countryOption();
				if($row_summary['get_started_wizard_status']==0 && ($row_summary['first_name']==null || $row_summary['first_name']==""))
				{
					header("location:../GetStartedNew");
				}
				else if($row_summary['get_started_wizard_status']==0 && ($row_summary['first_name']!=null || $row_summary['first_name']!=""))
				{
					header("location:../UpdateSecurityStatus");
				}
				
				require_once('StoreUpdatePhoneNumberView.php');
			}
			
		}
		
		
		public static function updateUser($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				$data['user_id']=$_POST['user_id'];
				$data['cid']=$_POST['cid'];
				$data['uid']=$_POST['uid'];
				$model1       = new StoreDataModel();
				
				$result    = $model1->updateUser($data);
				echo $result; die;
			}
		}
		public static function checkUserAvailability($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new StoreDataModel();
				
				$result    = $model1->checkUserAvailability($data);
				echo $result; die;
			}
		}
		public static function checkSsnInfo()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new StoreDataModel();
				
				$result    = $model1->checkSsnInfo($data);
				echo $result; die;
			}
		}
		
			public static function checkIdentificator()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new StoreDataModel();
				
				$result    = $model1->checkIdentificator($data);
				echo $result; die;
			}
		}
		
		public static function updateSSN($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new StoreDataModel();
				
				$result    = $model1->updateSSN($data);
				header("location:../StoreData/userAccount");
			}
		}
		public static function addIndificator($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new StoreDataModel();
				
				$result    = $model1->addIndificator($data);
				header("location:../NewPersonal/userAccount");
			}
		}
		
		public static function updateLanguage($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new StoreDataModel();
				
				$result    = $model1->updateLanguage($data);
				header("location:../StoreData/userAccount");
			}
		}
		
		public static function updateLicence($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				
				$model1       = new StoreDataModel();
				
				$result    = $model1->updateLicence($data);
				header("location:../StoreData/userAccount");
			}
		}
		
		
		
		public static function updateImage($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				
				$model1       = new StoreDataModel();
				
				$result    = $model1->updateImage($data);
				header("location:../StoreData/userAccount");
			}
		}
		
		
		
		
		
		
		public static function verifyUserDetail()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new StoreDataModel();
				
				require_once('../configs/smsMandril.php');
				$verifyUserDetail = $model->verifyUserDetail($data);	
				
				echo $verifyUserDetail; die;
			}
			
		}
		
		
		public static function checkUsedIdentificator()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new StoreDataModel();
				
				require_once('../configs/smsMandril.php');
				$checkUsedIdentificator = $model->checkUsedIdentificator($data);	
				
				echo $checkUsedIdentificator; die;
			}
			
		}
		
			public static function verifyUserDetailOldPhone()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../";
				
				$model = new StoreDataModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				require_once('../configs/smsMandril.php');
				$verifyUserDetailOldPhone = $model->verifyUserDetailOldPhone($data);	
				
				echo $verifyUserDetailOldPhone; die;
			}
			
		}
			public static function updatePhoneNumber()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:/../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				
				$model = new StoreDataModel();
				$data['user_id']=$_SESSION['user_id'];
				$rowsummary = $model->updatePhoneNumber($data);	
				
				header('location:../ReceivedRequest');
			}
			
			
		}
		
		
		public static function updateSignUpPhoneDetail($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				if(isset($_SESSION['rememberme_qid'])){
					
					setcookie('rememberme_qid', $_SESSION['rememberme_qid'], time()+ (30*60*60*24), '/', "qmatchup.com");
				}
				
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				
				$model1       = new StoreDataModel();
				$resultOrg1    = $model1->employeeAccount($data);
				$row_summary    = $model1->userSummary($data);
				$resultContry = $model1->countryOption();
				require_once('SignUpPhoneNumberView.php');
			}
			
		}
		
		
			public static function updatePhoneInfo()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:/../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				
				$model = new StoreDataModel();
				$data['user_id']=$_SESSION['user_id'];
				$rowsummary = $model->updatePhoneNumber($data);	
				
				header('location:Identificator');
			}
			
			
		}
		
		
		
		public static function Identificator($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				if(isset($_SESSION['rememberme_qid'])){
					
					setcookie('rememberme_qid', $_SESSION['rememberme_qid'], time()+ (30*60*60*24), '/', "qmatchup.com");
				}
				
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				
				$model1       = new StoreDataModel();
				
				$row_summary    = $model1->userSummary($data);
				 
				$resultContry = $model1->countryOption();
				require_once('StoreSignUpIdentificationInfoView.php');
			}
			
		}
		
			public static function confirmIdentificator($a)
		{
			
			 
				$path         = "../../../../";
				$data=array();
				$data['user_id']=cleanMe($a);
				$model = new StoreDataModel();
				
				require_once('../configs/smsMandril.php');
				$checkUsedIdentificator = $model->confirmIdentificator($data);	
				
				echo $checkUsedIdentificator; die;
			 
			
		}
		
		public static function checkVerifyIdentificator($co = null)
		{
			
				
				$path         = "../../../";
				$data=array();
				$data['user_id']=cleanMe($co);
				
				$model1       = new StoreDataModel();
				$row_summary    = $model1->userResetSummary($data);
				 
				$resultContry = $model1->countryOption();
				require_once('StoreVerifyIdentificationInfoView.php');
		}
		
		
		public static function getPhoneVerified($co = null)
		{
			
				
				$path         = "../../../../";
				$data=array();
				$data['user_id']=cleanMe($co);
				require_once('../configs/smsMandril.php');
				$model1       = new StoreDataModel();
				$sendVerificationCode = $model1->sendVerificationCode($data);
				require_once('StoreVerifyPhoneNumberView.php');
		}
		
		public static function addSigninIndificator($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new StoreDataModel();
				
				$result    = $model1->addIndificator($data);
				header("location:getCertificate");
			}
		}
		
		public static function verifyUserSignIn($co = null)
		{
			 
				$data=array();
				$data['user_id']=cleanMe($co);
				$model1       = new StoreDataModel();
				
				$result    = $model1->verifyUserSignIn($data);
				header("location:../getNewCertificate");
			 
		}
		
		public static function getNewCertificate($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				if(isset($_SESSION['rememberme_qid'])){
					
					setcookie('rememberme_qid', $_SESSION['rememberme_qid'], time()+ (30*60*60*24), '/', "qmatchup.com");
				}
				
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				//print_r($data); die;
				$model1       = new StoreDataModel();
				
				$row_summary    = $model1->userSummary($data);
				 
				$resultContry = $model1->countryOption();
				require_once('StoreGenerateNewCertificateView.php');
			}
			
		}
		
		
		public static function getCertificate($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				if(isset($_SESSION['rememberme_qid'])){
					
					setcookie('rememberme_qid', $_SESSION['rememberme_qid'], time()+ (30*60*60*24), '/', "qmatchup.com");
				}
				
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				
				$model1       = new StoreDataModel();
				
				$row_summary    = $model1->userSummary($data);
				 
				$resultContry = $model1->countryOption();
				require_once('StoreGenerateCertificateView.php');
			}
			
		}
		
		
		public static function generateCertificate()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new StoreDataModel();
				$result    = $model1->generateCertificate($data);
				if($result=='0')
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				else
				{
					header("location:certificateQr/".$result); die;
				}
				
			}
		}
		
		
		public static function generateNewCertificate()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new StoreDataModel();
				$result    = $model1->generateNewCertificate($data);
				if($result=='0')
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				else
				{
					header("location:certificateQr/".$result); die;
				}
				
			}
		}
		
		
		public static function certificateQr($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['certi_id']=cleanMe($a);
				$model1       = new StoreDataModel();
				$certificateDetail    = $model1->certificateDetail($data);
				
				 
				require_once('StoredCertificateQRView.php');
			}
			
		}
		
		
		public static function timeOut($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['certi_id']=cleanMe($a);
				$model1       = new StoreDataModel();
				$certificateDetail    = $model1->certificateDetail($data);
				require_once('StoreCertificateTimeOutView.php');
			}
			
		}
		
		public static function verifyOtp()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../";
				
				$model = new StoreDataModel();
				$verifyOtp = $model->verifyOtp();	
				
				echo $verifyOtp; die;
			}
			
		}
		
		
		public static function verifyOtpUpdate()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../";
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				$model = new StoreDataModel();
				$verifyOtp = $model->verifyOtpUpdate($data);	
				
				echo $verifyOtp; die;
			}
			
		}
		
		
	    public static function updateAddress($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
			echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				$data['user_id']=$_POST['user_id'];
				$data['cid']=$_POST['cid'];
				
				$model1       = new StoreDataModel();
				
				$result    = $model1->updateAddress($data);
				echo $result; die;
			}
		}
		public static function updateDate($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
			echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				$data['user_id']=$_POST['user_id'];
				$data['cid']=$_POST['cid'];
				
				$model1       = new StoreDataModel();
				
				$result    = $model1->updateDate($data);
				echo $result; die;
			}
		}
		public static function updateSex($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				$data['user_id']=$_POST['user_id'];
				if($_POST['cid']=="M")
				{
					$data['cid']=1;
				}
				else if($_POST['cid']=="F")
				{
					$data['cid']=2;
				}
				else if($_POST['cid']=="T")
				{
					$data['cid']=3;
				}
				
				
				$model1       = new StoreDataModel();
				
				$result    = $model1->updateSex($data);
				echo $result; die;
			}
		}
		
		public static function selectCountry($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$stModel = new StoreDataModel();
				if (isset($co)) {
					
					$val         = cleanMe($co);
					$resultState = $stModel->countrySelect($val);
				}
				$option='<option value="0">Select</option>';
				foreach ($resultState as $stateCategory => $StateValue) {
					$stateCategory = htmlspecialchars($stateCategory);
					
					$option        = $option . '<option value="' . $StateValue['id'] . '">' . iconv("UTF-8", "ISO-8859-1//IGNORE",$StateValue['name']) . '</option>';
				}
				echo $option;
				die;
			}
			
		}
		
		public static function schoolSelect($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$stModel = new StoreDataModel();
				if (isset($co)) {
					
					$val         = cleanMe($co);
					$resultState = $stModel->selectSchool($val);
				}
				$output='<option value="0">Select</option>';
				foreach ($resultState as $stateCategory => $row) {
					$stateCategory = htmlspecialchars($stateCategory);
					
					$output = $output."<option value=".$row['id'].">".iconv("UTF-8", "ISO-8859-1//IGNORE",$row['name'])."</option>";
				}
				echo $output;
				die;
			}
		} 
		public static function selectState($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$stModel = new StoreDataModel();
				if (isset($co)) {
					
					$val         = cleanMe($co);
					$resultState = $stModel->selectState($val);
				}
				$option = '<option value="-1" >All State</option>';
				foreach ($resultState as $stateCategory => $StateValue) {
					$stateCategory = htmlspecialchars($stateCategory);
					
					$option        = $option . '<option value="' . $StateValue['id'] . '">' . $StateValue['state_name'] . '</option>';
				}
				echo $option;
				die;
			}
		}
		
		public static function selectCity($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$ctModel = new StoreDataModel();
				if (isset($c)) {
					$val        = array();
					$val['sid'] = cleanMe($c);
					$resultCity = $ctModel->selectCity($val);
				}
				$option = '<option value="-1" >All City</option>';
				foreach ($resultCity as $category => $value) {
					$category = htmlspecialchars($category);
					$option   = $option . '<option value="' . $value['id'] . '">' . $value['city_name'] . '</option>';
				}
				echo $option;
				die;
			}
		}
		public static function selectDistrict($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$ctModel = new StoreDataModel();
				if (isset($c)) {
					$val        = array();
					$val['sid'] = cleanMe($c);
					$resultDistrict = $ctModel->selectDistrict($val);
				}
				$option = '<option value="-1" >All District</option>';
				foreach ($resultDistrict as $category => $value) {
					$category = htmlspecialchars($category);
					$option   = $option . '<option value="' . $value['id'] . '">' . $value['district_name'] . '</option>';
				}
				echo $option;
				die;
			}
		}	
		
		public static function updateUserSummary($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$ctModel = new StoreDataModel();
				
				$data=array();
				//session_start();
				$data['user_id']=$_SESSION['user_id'];
				$resultDistrict = $ctModel->updateUserSummary($data);
				header("location:../StoreData/userAccount");
				
			}
		}	
		public static function updateUserExperience($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$ctModel = new StoreDataModel();
				
				$data=array();
				//session_start();
				$data['user_id']=$_SESSION['user_id'];
				//require_once('../configs/testMandril.php');
				$resultDistrict = $ctModel->updateUserExperience($data);
				
				header("location:../StoreData/userAccount");
				
			}
		}	
		
		public static function updateEducation($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$ctModel = new StoreDataModel();
				
				$data=array();
				//session_start();
				$data['user_id']=$_SESSION['user_id'];
				require_once('../configs/testMandril.php');
				$resultDistrict = $ctModel->updateEducation($data);
				
				header("location:../StoreData/userAccount");
				
			}
		}
		
		
		public static function removeExp($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$ctModel = new StoreDataModel();
				
				$data=array();
				//session_start();
				$data['user_id']=$_SESSION['user_id'];
				$data['exp']=cleanMe($c);
				require_once('../configs/testMandril.php');
				$resultDistrict = $ctModel->removeExp($data);
				
				header("location:../userAccount");
				
			}
		}
		
		public static function removeEdu($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$ctModel = new StoreDataModel();
				
				$data=array();
				//session_start();
				$data['user_id']=$_SESSION['user_id'];
				$data['edu']=cleanMe($c);
				require_once('../configs/testMandril.php');
				$resultDistrict = $ctModel->removeEdu($data);
				
				header("location:../userAccount");
				
			}
		}
		
		public static function removeLanguage($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$ctModel = new StoreDataModel();
				
				$data=array();
				//session_start();
				$data['user_id']=$_SESSION['user_id'];
				$data['lang']=cleanMe($c);
				require_once('../configs/testMandril.php');
				$resultDistrict = $ctModel->removeLanguage($data);
				
				header("location:../userAccount");
				
			}
		}
		public static function removeLicence($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$ctModel = new StoreDataModel();
				
				$data=array();
				//session_start();
				$data['user_id']=$_SESSION['user_id'];
				$data['lice']=cleanMe($c);
				require_once('../configs/testMandril.php');
				$resultDistrict = $ctModel->removeLicence($data);
				
				header("location:../userAccount");
				
			}
		}
		public static function companySelect($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$ctModel = new StoreDataModel();
				if (isset($c)) {
					$val        = array();
					$val['sid'] = cleanMe($c);
					//print_r($val); die;
					$resultCompany = $ctModel->selectCompany($val);
				}
				$option = '';
				//print_r($resultCompany); die;
				foreach ($resultCompany as $category => $value) {
					$category = htmlspecialchars($category);
					$option = $option. '<option value="'.$value['company_name'].'">';;
				}
				echo $option;
				die;
			}
		}	
		
		public static function searchUserDetail($a = null , $b=null ,$c=null, $d=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../";
				$data=array();
				$model = new StoreDataModel();
				$data['user_id']=$_SESSION['user_id'];
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$searchUserDetail = $model->searchUserDetail($data);	
				
				echo $searchUserDetail; die;
			}
			
		}
		
		public static function updateEmployeeDetail($a = null , $b=null ,$c=null, $d=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:/../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				//print_r($_POST); die;
				$model = new StoreDataModel();
				$data['user_id']=$_SESSION['user_id'];
				$rowsummary = $model->updateEmployeeDetail($data);	
				
				header('location:../ShareMonitor/ShareMonitorShow');
			}
			
		}
	}
	
	
?>