<?php
	require_once 'NewPersonalModel.php';
	require_once '../configs/utility.php';
	class NewPersonalController
	{
		
		
		public static function bankAccount($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				//print_r($data); die;
				$model1       = new NewPersonalModel();
				require_once('CardsInformationView.php');
			}
			
		}
		public static function checkCard()
		{
		require "../cardvalidity/vendor/autoload.php";	
		$detector = new CardDetect\Detector();
		$card = $_POST['card_number'];

		echo $detector->detect($card); //Visa
			
		}
		public static function changePassword($a = null, $b = null, $c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location: LoginAccount");
				} else {
				$data = array();
				
				$data['user_id']=$_SESSION['user_id'];
				$model = new NewPersonalModel();
				$ChangePassword    = $model->changePassword($data);
				header("location:userAccount");
			}
		}
		
		public static function checkPassword($a = null, $b = null, $c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cpass']=md5(cleanMe($a));
				$model = new NewPersonalModel();
				$checkPassword    = $model->checkPassword($data);
				echo $checkPassword; die;
			}
		}
		
		
		public static function connectCompany($a = null, $b = null, $c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model = new NewPersonalModel();
				
				$data = array();
				
				$data['name']     = cleanMe($a);
				
				
				$resultPass = $model->connectCompany($data);
				$resultPassCount = $model->connectCompanyCount($data);
				echo $resultPass."/".$resultPassCount; 
			}
		}
		
		public static function connectAccount($a = null, $b = null, $c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$model = new NewPersonalModel();
				
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cname']     = cleanMe($_POST['cname']);
				
				require_once('../testMandril.php');
				$resultPass = $model->connectAccount($data);
				header("location:../NewPersonal/userAccount");
			}
			
		}
		public static function countryInfo()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				
				if(isset($_SESSION['rememberme_qid'])){
					
					setcookie('rememberme_qid', $_SESSION['rememberme_qid'], time()+ (30*60*60*24), '/');
				}
				$path         = "../../../";
				$data=array();
				 
				$data['user_id']=$_SESSION['user_id'];
				//print_r($data); die;
				$model1       = new NewPersonalModel();
				$profileStatus    = $model1->profileStatus($data);
				$country    = $model1->countryList($data);
				$countryOpt    = $model1->countryOption($data);
				$resultContry = $model1->selectCountry();
				$identifiactorTypeInfo = $model1->identifiactorTypeInfo($data);
				$row_summary    = $model1->userSummary($data);
				$userCountrySummary    = $model1->userCountrySummary($data);
				if($userCountrySummary['num']==1)
				{
					header("location:visitingCountryList"); die;
				}
				require_once('NewPersonalResidenceCountryInfoView.php');
			}
			
		}
		
		
		public static function visitingCountryList()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new NewPersonalModel();
				$userCountryList    = $model1->userCountryList($data);
				$country    = $model1->countryList($data);
				$countryOpt    = $model1->countryOption($data);
				$resultContry = $model1->selectCountry();
				$row_summary    = $model1->userSummary($data);
				require_once('NewPersonalResidenceCountryListView.php');
			}
			
		}
		
		
		public static function currentCountryInfo()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new NewPersonalModel();
				$currentCountryDetail    = $model1->currentCountryDetail($data);
				$country    = $model1->countryList($data);
				$countryOpt    = $model1->countryOption($data);
				$resultContry = $model1->selectCountry();
				$row_summary    = $model1->userSummary($data);
				require_once('NewPersonalUpdateResidenceView.php');
			}
			
		}
		
		public static function verifyOtpDetail()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$path         = "../../../../";
				
				$model = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				require_once('../configs/smsMandril.php');
				$verifyOtpDetail = $model->verifyOtpDetail($data);	
				
				echo $verifyOtpDetail; die;
			}
			
		}
		
		public static function getDates()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$model1       = new NewPersonalModel();
				$result    = $model1->getDates();
				echo $result; die;
			}
		}
		
		public static function updateCountry()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$result    = $model1->updateCountry($data);
				$result    = $model1->currentCountryDetail($data);
				echo $result; die;
				}
		} 
		
		public static function addVisitingCountry()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../LoginAccount");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new NewPersonalModel();
				$addVisitingCountry    = $model1->addVisitingCountry($data);
				header("location:countryInfo");
			}
		}
		
		
		public static function checkPassportInfo()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../LoginAccount");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new NewPersonalModel();
				$checkPassportInfo    = $model1->checkPassportInfo($data);
				echo $checkPassportInfo; die;
			}
		}
		
		
			public static function checkMobileNumber()
				{
					$valueNew = checkLogin();
					if ($valueNew == 0) {
						$path = "../../";
						header("location:../../LoginAccount");
						} else {
						$data=array();
						$data['user_id']=$_SESSION['user_id'];
						$model1       = new NewPersonalModel();
						require_once('../configs/smsMandril.php');
						$checkMobileNumber    = $model1->checkMobileNumber($data);
						echo $checkMobileNumber; die;
					}
				}
		
		public static function userAccount($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				
				if(isset($_SESSION['rememberme_qid'])){
					
					setcookie('rememberme_qid', $_SESSION['rememberme_qid'], time()+ (30*60*60*24), '/');
				}
				$path         = "../../../";
				$data=array();
				if(isset($_POST['uphno']))
				{
				$data['uphno']=	$_POST['uphno'];
				$data['byPhone']=1;
				}
				else
				{
				$data['uphno']='';
				$data['byPhone']=0;
				}					
				
				if(isset($_POST['ssn']))
				{
				$data['ssn']=	$_POST['ssn'];
				$data['bySSN']=1;
				}
				else
				{
				$data['ssn']='';
				$data['bySSN']=0;
				}
				
				if(isset($_POST['bank_acc']))
				{
				$data['bank_acc']=	$_POST['bank_acc'];
				$data['byBank']=1;
				}
				else
				{
				$data['bank_acc']='';
				$data['byBank']=0;
				}
				
				$data['user_id']=$_SESSION['user_id'];
				//print_r($data); die;
				$model1       = new NewPersonalModel();
				$profileStatus    = $model1->profileStatus($data);
				$country    = $model1->countryList($data);
				$countryOpt    = $model1->countryOption($data);
				$resultOrg    = $model1->userAccount($data);
				 
				$userBankid    = $model1->userBankid($data);
				$resultOrg1    = $model1->employeeAccount($data);
				$hijackedUser    = $model1->hijackedUser($data);
				$identificatorInfo    = $model1->identificatorInfo($data);
				$userIdentificatorVerification    = $model1->userIdentificatorVerification($data);
				$row_summary    = $model1->userSummary($data);
				if($row_summary['get_started_wizard_status']==0)
				{
					header("location:../GetStartedNew");
				}
				
				/*else if($row_summary['get_started_wizard_status']==1 && $row_summary['grading_status']==0)
				{
					header("location:../UpdateSecurityStatus");
				}*/
				$detail    = $model1->connectAccountDetail($data);
				$resultContry = $model1->selectCountry();
				$verificationId    = $model1->verificationId($data);
				require_once('NewPersonalView.php');
			}
			
		}
		
		
		
		public static function addUsername()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				
				 
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 
				$model1       = new NewPersonalModel();
				$deleteProfileEditDetails    = $model1->deleteProfileEditDetails($data);
				$profileStatus    = $model1->profileStatus($data);
				$country    = $model1->countryList($data);
				$countryOpt    = $model1->countryOption($data);
				$resultOrg    = $model1->userAccount($data);
				$userBankid    = $model1->userBankid($data);
				$resultOrg1    = $model1->employeeAccount($data);
				require_once('NewPersonalBasicDetailView.php');
			}
			
		}
		
		public static function updateAddressDetail($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				
				if(isset($_SESSION['rememberme_qid'])){
					
					setcookie('rememberme_qid', $_SESSION['rememberme_qid'], time()+ (30*60*60*24), '/');
				}
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new NewPersonalModel();
				$deleteProfileEditDetails    = $model1->deleteProfileEditDetails($data);
				$resultOrg    = $model1->userAccount($data);
				$userBankid    = $model1->userBankid($data);
				$resultOrg1    = $model1->employeeAccount($data);
				
				$row_summary    = $model1->userSummary($data);
				require_once('NewPersonalAddressDetailView.php');
				 
			}
			
		}
		
		public static function saveProfileBasicDetails()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				
				 
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 
				$model1       = new NewPersonalModel();
				require_once('../configs/smsMandril.php');
				$saveProfileBasicDetails    = $model1->saveProfileBasicDetails($data);
				header('location:verifyProfileDetails');
			}
			
		}
		
		
		public static function saveUserAddressUpdate()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				
				 
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 
				$model1       = new NewPersonalModel();
				require_once('../configs/smsMandril.php');
				$saveUserAddressUpdate    = $model1->saveUserAddressUpdate($data);
				header('location:verifyProfileDetails');
			}
			
		}
		
		
		public static function saveUserPhoneUpdate()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				
				 
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 
				$model1       = new NewPersonalModel();
				require_once('../configs/smsMandril.php');
				$saveUserPhoneUpdate    = $model1->saveUserPhoneUpdate($data);
				header('location:verifyProfileDetails');
			}
			
		}
		
		
		public static function saveUserBankUpdate()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				
				 
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 
				$model1       = new NewPersonalModel();
				require_once('../configs/smsMandril.php');
				$saveUserBankUpdate    = $model1->saveUserBankUpdate($data);
				header('location:verifyProfileDetails');
			}
			
		}
		
		
		public static function verifyProfileDetails()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				
				 
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 
				$model1       = new NewPersonalModel();
				$profileEditDetails    = $model1->profileEditDetails($data);
				if(empty($profileEditDetails))
				{
					header('location:userAccount'); die;
				}
				require_once('NewPersonalProfileUpdateCodeView.php');
			}
			
		}
		
		public static function updateUserPhoneDetails()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				
				 
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 
				$model1       = new NewPersonalModel();
				$updateUserPhoneDetails    = $model1->updateUserPhoneDetails($data);
				header('location:userAccount'); 
			}
			
		}
		
		public static function updateUserBasicDetails()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				
				 
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 
				$model1       = new NewPersonalModel();
				$updateUserBasicDetails    = $model1->updateUserBasicDetails($data);
				header('location:userAccount'); 
			}
			
		}
		
		
		public static function updateUserAddressDetails()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				
				 
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 
				$model1       = new NewPersonalModel();
				$updateUserAddressDetails    = $model1->updateUserAddressDetails($data);
				header('location:userAccount'); 
			}
			
		}
		
		
			public static function updateUserBankDetails()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				
				 
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 
				$model1       = new NewPersonalModel();
				$updateUserBankDetails    = $model1->updateUserBankDetails($data);
				header('location:userAccount'); 
			}
			
		}
		
		public static function confirmDetails()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				
				 
				$path         = "../../../";
				$data=array();
			 
				$data['user_id']=$_SESSION['user_id'];
				//print_r($data); die;
				$model1       = new NewPersonalModel();
				$certificateCount    = $model1->certificateCount($data);
				if($certificateCount['num']==3)
				{
					header('location:certificateList'); die;
				}
				$certificateConnectCount    = $model1->certificateConnectCount($data);
				if($certificateConnectCount['num']==1)
				{
					header('location:certificateList'); die;
				}
				$country    = $model1->countryList($data);
				$countryOpt    = $model1->countryOption($data);
				$resultOrg    = $model1->userAccount($data);
				$userBankid    = $model1->userBankid($data);
				$resultOrg1    = $model1->employeeAccount($data);
				//print_r()
				$hijackedUser    = $model1->hijackedUser($data);
				$row_summary    = $model1->userSummary($data);
				require_once('NewPersonalDetailsVerifyView.php');
			}
			
		}
		
		public static function identificatorsList()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new NewPersonalModel();
				$profileStatus    = $model1->profileStatus($data);
				$resultOrg1    = $model1->employeeAccount($data);
				 $identificatorInfoListCounts    = $model1->identificatorInfoListCounts($data);
				$identificatorInfoList    = $model1->identificatorInfoList($data);
				$row_summary    = $model1->userSummary($data);
				require_once('NewPersonalIdentificatorListView.php');
				}
			
		}
		
		public static function editDetails($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['certi_id']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$resultOrg1    = $model1->employeeAccount($data);
				 $resultContry = $model1->selectCountry();
				$identificatorDetail    = $model1->identificatorDetail($data);
				//print_r($identificatorDetail); die;
				$row_summary    = $model1->userSummary($data);
				require_once('NewPersonalIdentificatorEditView.php');
				}
			
		}
		
		
		public static function updateIndificator($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../LoginAccount");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['certi_id']=cleanMe($co);
				$model1       = new NewPersonalModel();
				
				$updateIndificator    = $model1->updateIndificator($data);
				header("location:../identificatorsList");
			}
		}
		
		public static function addressList()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->employeeAccount($data);
				 
				$addressInfo    = $model1->addressInfo($data);
				$row_summary    = $model1->userSummary($data);
				require_once('NewPersonalAddressListView.php');
				}
			
		}
		
		public static function editDeliveryAddress($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$resultOrg1    = $model1->addressDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('NewPersonalEditAddressView.php');
				}
			
		}
		public static function deleteExtraBed($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->deleteExtraBed($data);
				echo $result; die;
				}
		}
		public static function addBedroom($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->addBedroom($data);
				$result    = $model1->bedroomDetail($data);
				echo $result; die;
				}
		}
		
		
		public static function updateArrival($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateArrival($data);
				 
				echo $result; die;
				}
		}
		
		
		public static function updateDeparture($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateDeparture($data);
				 
				echo $result; die;
				}
		}
		
		public static function addBathroom($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->addBathroom($data);
				$result    = $model1->bathroomDetail($data);
				echo $result; die;
				}
		}
		
		public static function updateWheelchair($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateWheelchair($data);
				$result    = $model1->bathroomDetail($data);
				echo $result; die;
				}
		}
		
		
		public static function updateNone($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateNone($data);
				$result    = $model1->districtPublishDetail($data);
				echo $result; die;
				}
		}
		
		
		public static function updateRentInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateRentInfo($data);
				$result    = $model1->districtPublishDetail($data);
				echo $result; die;
				}
		} 
		
		public static function updateSaleInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateSaleInfo($data);
				$result    = $model1->districtPublishDetail($data);
				echo $result; die;
				}
		} 
		
		public static function updateLongRent($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateLongRent($data);
				$result    = $model1->districtPublishDetail($data);
				echo $result; die;
				}
		} 
		 
		public static function updatePrivate($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updatePrivate($data);
				$result    = $model1->bathroomDetail($data);
				echo $result; die;
				}
		}
		
		public static function updateEnsuit($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateEnsuit($data);
				$result    = $model1->bathroomDetail($data);
				echo $result; die;
				}
		}
		
		public static function updateOverbath($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateOverbath($data);
				$result    = $model1->bathroomDetail($data);
				echo $result; die;
				}
		}
		
		public static function updateShower($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateShower($data);
				if($result==1)
				{
				$result    = $model1->bathroomDetail($data);	
				}
				
				echo $result; die;
				}
		} 
		
		
		public static function updateBath($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateBath($data);
				if($result==1)
				{
				$result    = $model1->bathroomDetail($data);	
				}
				echo $result; die;
				}
		} 
		
		public static function updateToilet($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateToilet($data);
				if($result==1)
				{
				$result    = $model1->bathroomDetail($data);	
				}
				echo $result; die;
				}
		} 
		
		public static function countBathDetail($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->countBathDetail($data);
				 
				echo $result; die;
				}
		} 
		
		public static function deleteBedroom($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->deleteBedroom($data);
				if($result==1)
				{
				$result    = $model1->bedroomDetail($data);	
				}
				
				echo $result; die;
				}
		}
		
		public static function deleteBedroomBedInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->deleteBedroomBedInfo($data);
				if($result==1)
				{
				$result    = $model1->bedroomDetail($data);	
				}
				
				echo $result; die;
				}
		}
		
		
		public static function deleteBathroom($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->deleteBathroom($data);
				if($result==1)
				{
				$result    = $model1->bathroomDetail($data);	
				}
				
				echo $result; die;
				}
		}
		 
		
		public static function addExtraSleepingBed($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->addExtraSleepingBed($data);
				echo $result; die;
				}
		}
		
		public static function addBedToBedroom($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->addBedToBedroom($data);
				echo $result; die;
				}
		}
		
		public static function bedroomCountInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->bedroomCount($data);
				echo $result; die;
				}
		}
		
		
		public static function bathroomCountInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->bathroomCount($data);
				echo $result; die;
				}
		}
		
		public static function updateExtraBedInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateExtraBedInfo($data);
				echo $result; die;
				}
		}
		
		public static function updateBedTypeInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateBedTypeInfo($data);
				echo $result; die;
				}
		}
		
		public static function updateSubcategory($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateSubcategory($data);
				echo $result; die;
				}
		}
		
		public static function updateAminity($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateAminity($data);
				if($result==1)
				{
				$result    = $model1->amenitiesDetail($data);	
				}
				
				echo $result; die;
				}
		}
		
		public static function updatePropertyType($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updatePropertyType($data);
				echo $result; die;
				}
		}
		
		
		public static function updateApartmentNumber($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateApartmentNumber($data);
				echo $result; die;
				}
		}
		
		
		public static function updateArea($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$resultOrg1    = $model1->addressDetail($data);
				$data['property_layout']=$resultOrg1['property_layout'];
				$result    = $model1->updateArea($data);
				echo $result; die;
				}
		}
		
		public static function updateApartmentFloor($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateApartmentFloor($data);
				echo $result; die;
				}
		}
		
		
		public static function updateFloors($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$resultOrg1    = $model1->addressDetail($data);
				$data['floors_available']=$resultOrg1['floors_available'];
				$result    = $model1->updateFloors($data);
				echo $result; die;
				}
		}
		
		public static function updateContractLenght($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$resultOrg1    = $model1->addressDetail($data);
				$data['contract_length']=$resultOrg1['contract_length'];
				$result    = $model1->updateContractLenght($data);
				echo $result; die;
				}
		}
		
		
		public static function updateSecurityLength($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$resultOrg1    = $model1->addressDetail($data);
				$data['contract_length']=$resultOrg1['contract_length'];
				$data['security_fee_months']=$resultOrg1['security_fee_months'];
				$result    = $model1->updateSecurityLength($data);
				echo $result; die;
				}
		}
		
		public static function updatePrivateDoor($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co); 
				$result    = $model1->updatePrivateDoor($data);
				$result    = $model1->propertyTypeEntranceInfo($data);
				echo $result; die;
				}
		}
		
		public static function updateChildren($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co); 
				$result    = $model1->updateChildren($data);
				$result    = $model1->childrenInfo($data);
				echo $result; die;
				}
		}
		public static function updateInfants($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co); 
				$result    = $model1->updateInfants($data);
				$result    = $model1->childrenInfo($data);
				echo $result; die;
				}
		}
		
		public static function updateSmoking($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co); 
				$result    = $model1->updateSmoking($data);
				$result    = $model1->eventsInfo($data);
				echo $result; die;
				}
		}
		
		public static function updateEvents($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co); 
				$result    = $model1->updateEvents($data);
				$result    = $model1->eventsInfo($data);
				echo $result; die;
				}
		}
		
		public static function updateCleening($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co); 
				$result    = $model1->updateCleening($data);
				$result    = $model1->cleeningFeeInfo($data);
				echo $result; die;
				}
		}
		
		public static function updateCleanByWhom($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co); 
				$result    = $model1->updateCleanByWhom($data);
				echo $result; die;
				}
		}
		
		
		
		public static function updateBooking($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co); 
				$result    = $model1->updateBooking($data);
				$result    = $model1->bookingNoticeInfo($data);
				echo $result; die;
				}
		}
		
		public static function updateFee($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co); 
				$result    = $model1->updateFee($data);
				 
				echo $result; die;
				}
		}
		
		
		public static function updateSecurity($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co); 
				$result    = $model1->updateSecurity($data);
				$result    = $model1->securityFeeInfo($data);
				echo $result; die;
				}
		}
		
		
		public static function updateSecurityLong($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co); 
				$result    = $model1->updateSecurityLong($data);
				$result    = $model1->securityLongTermFeeInfo($data);
				echo $result; die;
				}
		}
		
		public static function updateSecurityFee($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co); 
				$result    = $model1->updateSecurityFee($data);
				 
				echo $result; die;
				}
		}
		
		
		public static function updatePets($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co); 
				$result    = $model1->updatePets($data);
				$result    = $model1->eventsInfo($data);
				echo $result; die;
				}
		}
		
		
		public static function updateAddressCoordinates($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co); 
				$result    = $model1->updateAddressCoordinates($data);
				 
				echo $result; die;
				}
		}
		public static function updateElevator($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co); 
				$result    = $model1->updateElevator($data);
				$result    = $model1->propertyTypeEntranceInfo($data);
				echo $result; die;
				}
		}
		public static function updateEntrance($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$resultOrg1    = $model1->addressDetail($data);
				$data['entrance_floor']=$resultOrg1['entrance_floor'];
				$result    = $model1->updateEntrance($data);
				echo $result; die;
				}
		}
		
		public static function updateAminityInfoUpdate($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				 
				$result    = $model1->amenitiesDetail($data);	
				 
				echo $result; die;
				}
		}
		
		
		public static function updateCategoryAmenities($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateCategoryAmenities($data);
				$result    = $model1->amenitiesDetail($data);
				echo $result; die;
				}
		}
		
		
		
		
		public static function getSidebar($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->getSidebar($data);
				 
				echo $result; die;
				}
		}
		public static function getRangeCalander($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$startDay=explode('-',$_POST['startDate']);
				$data['time']=date('Y-m-d', strtotime($startDay[0].'-'.$startDay[1].'-01'));
				$result    = $model1->getRangeCalander($data);
				 
				echo $result; die;
				}
		}
		
		public static function getNewCalander($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$data['time']=$_POST['updateShow'];
				$result    = $model1->getCalender($data);
				 
				echo $result; die;
				}
		}
		
		public static function updateNextCalender($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$t=	strtotime("+".$_POST['updateValue']." months", strtotime($_POST['updateShow']));
				$cur=strtotime(date('Y-m-d'));
				if($t<$cur)
				{
				$data['time']=date('Y-m-d');	
				}
				else
				{
				$data['time']=date('Y-m-d', $t);	
				}
				
				$result    = $model1->getCalender($data);
				 
				echo $result; die;
				}
		}
		
		public static function getRange($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$startDate=	strtotime($_POST['startDate']);
				$endDate=strtotime($_POST['endDate']);
				$range='';
				while($startDate<=$endDate)
				{
				$range=$range.$startDate.',';
				$startDate=	strtotime("+1 days", $startDate);
				}
				 
				echo $range; die;
				}
		}
		
		
		public static function updateSelectedCancle($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$data['time']=$_POST['updateShow'];	
				$result    = $model1->getCalender($data);
				echo $result; die;
				}
		}
		public static function updateNickname($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateNickname($data);
				echo $result; die;
				}
		}
		
		public static function updateHeading($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateHeading($data);
				echo $result; die;
				}
		}
		
		
		public static function updateSalePrice($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateSalePrice($data);
				header('location:../apartmentSelectRevisionInfo/'.$data['aid']);
				}
		}
		
		
		public static function updateMonthlyPrice($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateMonthlyPrice($data);
				echo $result; die;
				}
		}
		
		public static function updateTitle($co=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$data['pid']=cleanMe($b);
				$result    = $model1->updateTitle($data);
				echo $result; die;
				}
		}
		
		
		public static function updateDescription($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateDescription($data);
				echo $result; die;
				}
		}
		
		public static function updatePhotos($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updatePhotos($data);
				echo $result; die;
				}
		}
		
		public static function changeListing($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->changeListing($data);
				echo $result; die;
				}
		}
		
		
		public static function addPricing($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->addPricing($data);
				echo $result; die;
				}
		}
		
		public static function addCurrency($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->addCurrency($data);
				echo $result; die;
				}
		}
		
		
		public static function changeDescription($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->changeDescription($data);
				echo $result; die;
				}
		}
		
		public static function updateSelectedBlock($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				if($_POST['show_property']==1)
				{
					$result    = $model1->updateAvailable($data);
				}
				else
				{
					$result    = $model1->updateBlocked($data);
				
				}
				$data['time']=date('Y-m-d');
				$result    = $model1->getCalender($data);
				echo $result; die;
				}
		}
		
		public static function updatePhotoOrder($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updatePhotoOrder($data);
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		
		
		
		public static function updateMondayOpen($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$result    = $model1->updateMondayOpen($data);
				$result    = $model1->dayAvailable($data);
				echo $result; die;
				}
		}
		
		 public static function updateTuesdayOpen($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$result    = $model1->updateTuesdayOpen($data);
				$result    = $model1->dayAvailable($data);
				echo $result; die;
				}
		}
		
		public static function updateWednesdayOpen($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$result    = $model1->updateWednesdayOpen($data);
				$result    = $model1->dayAvailable($data);
				echo $result; die;
				}
		}
		
		public static function updateThursdayOpen($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$result    = $model1->updateThursdayOpen($data);
				$result    = $model1->dayAvailable($data);
				echo $result; die;
				}
		}
		
		public static function updateFridayOpen($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$result    = $model1->updateFridayOpen($data);
				$result    = $model1->dayAvailable($data);
				echo $result; die;
				}
		}
		
		public static function updateSaturdayOpen($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$result    = $model1->updateSaturdayOpen($data);
				$result    = $model1->dayAvailable($data);
				echo $result; die;
				}
		}
		
		public static function updateSundayOpen($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$result    = $model1->updateSundayOpen($data);
				$result    = $model1->dayAvailable($data);
				echo $result; die;
				}
		}
		
		
		public static function updateMonday($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$result    = $model1->updateMonday($data);
				
				echo $result; die;
				}
		}
		
		 public static function updateTuesday($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$result    = $model1->updateTuesday($data);
				
				echo $result; die;
				}
		}
		
		public static function updateWednesday($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$result    = $model1->updateWednesday($data);
				
				echo $result; die;
				}
		}
		
		public static function updateThursday($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$result    = $model1->updateThursday($data);
				
				echo $result; die;
				}
		}
		
		public static function updateFriday($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$result    = $model1->updateFriday($data);
				
				echo $result; die;
				}
		}
		
		public static function updateSaturday($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$result    = $model1->updateSaturday($data);
				
				echo $result; die;
				}
		}
		
		public static function updateSunday($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$result    = $model1->updateSunday($data);
				
				echo $result; die;
				}
		}
		
		
		public static function updateMinimumNight($co=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$data['pid']=cleanMe($b);
				if($_POST['shortest_duration']>0)
				{
				$result    = $model1->updateMinimumNight($data);	
				}
					echo $result; die;
				}
		}
		
		public static function updateDiscount($co=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$data['pid']=cleanMe($b);
				if($_POST['discount_for_seven']>=0)
				{
				$result    = $model1->updateDiscount($data);	
				}
					echo $result; die;
				}
		}
		
		
		public static function updateEndDate($co=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$data['pid']=cleanMe($b);
				if(isset($_POST['update_info']))
				{
				$result    = $model1->updateEndDate($data);	
				}
					echo $result; die;
				}
		}
		
		public static function deletePricing($co=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$data['pid']=cleanMe($b);
				$result    = $model1->deletePricing($data);	
				
				if($result==0)
				{
				header('location:../../apartmentSelectRevisionInfo/'.$data['aid']); die;	
				}
				header('location:../../apartmentPricingInfo/'.$data['aid']);
				}
		}
		
		
		public static function removePricingGap($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->removePricingGap($data);	
				echo $result; die; 
				 
				}
		}
		
		public static function updatePhotoDragging($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updatePhotoDragging($data);
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		
		
		public static function updateChannelsAll($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->channelsSelected($data);
				 
				echo $result; die;
				}
		}
		
		public static function updateRent($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateRent($data);
				 
				echo $result; die;
				}
		}
		
		
		public static function updatePublishRentLong($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updatePublishRentLong($data);
				 
				echo $result; die;
				}
		}
		
		
		public static function updateCancellationPolicy($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateCancellationPolicy($data);
				 
				echo $result; die;
				}
		}
		
		public static function updateSale($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateSale($data);
				 
				echo $result; die;
				}
		}
		
		public static function updateAir($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateAir($data);
				 
				echo $result; die;
				}
		}
		
		public static function updateBookingChannel($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateBookingChannel($data);
				 
				echo $result; die;
				}
		}
		
		public static function updateExpedia($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateExpedia($data);
				 
				echo $result; die;
				}
		}
		
		public static function updateVrbo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateVrbo($data);
				 
				echo $result; die;
				}
		}
		
		
		public static function updateTrip($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateTrip($data);
				 
				echo $result; die;
				}
		}
		
		public static function updateTui($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateTui($data);
				 
				echo $result; die;
				}
		}
		
		public static function getPhoto($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				 
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		
		public static function getImageInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				 
				$result    = $model1->getImageInfo($data);
				echo $result; die;
				}
		}
		
		public static function deletePhoto($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->deletePhoto($data);
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		
		
		
		public static function readyToGo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$displayPhotosCount    = $model1->displayPhotosCount($data); 
				$resultOrg1    = $model1->addressDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentReadyToGoView.php');
				}
			
		}
		
		
		public static function checkApartmentInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$OtherRoomInfo    = $model1->OtherRoomInfo($data);
				$getsratedDetail  = $model1->getsratedDetail($data);
				$resultOrg1    = $model1->addressDetail($data);
				$bedroomCount  = $model1->bedroomCount($data);
				$bathroomCount    = $model1->bathroomCount($data);
				$amenitiesCount  = $model1->amenitiesCount($data);
				$descriptionInfo    = $model1->apartmentDescription($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentDetailInfoView.php');
				}
			
		}
		
		
		
		public static function apartmentGetStartedMannual($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$OtherRoomInfo    = $model1->OtherRoomInfo($data);
				$getsratedDetail  = $model1->getsratedDetail($data);
				$resultOrg1    = $model1->addressDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentGetStartedReviewInfoView.php');
				}
			
		}
		public static function apartmentWifiInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentWifiInfoView.php');
				}
			
		}
		
		public static function apartmentOtherRoomInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$categoryInfo    = $model1->categoryInfo($data);
				$OtherRoomInfo    = $model1->OtherRoomInfo($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentOtherRoomsInfoView.php');
				}
			
		}
		
		
		public static function apartmentAmenityCategoryInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$OtherRoomInfo    = $model1->OtherRoomInfo($data);
				$categoryInfo    = $model1->categoryInfo($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentAmenityCategoryView.php');
				}
			
		}
		
		public static function apartmentAmenitySubcategoryInfo($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['category_id']=cleanMe($b);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$OtherRoomInfo    = $model1->OtherRoomInfo($data);
				$categoryInfo    = $model1->categoryInfo($data);
				$amenitiesSubcategoryDetail    = $model1->amenitiesSubcategoryDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentAmenitiesSubcategoryInfoView.php');
				}
			
		}
		
		public static function updateTicketCategoryAmenities($co=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$data['category_id']=cleanMe($b);
				$result    = $model1->updateTicketCategoryAmenities($data);
				$result    = $model1->amenitiesSubcategoryDetail($data);
				echo $result; die;
				}
		}
		
		
		public static function updateTicketSubcategory($co=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$data['category_id']=cleanMe($b);
				$result    = $model1->updateTicketSubcategory($data);
				$amenitiesSubcategoryDetail    = $model1->amenitiesSubcategoryDetail($data);
				echo $amenitiesSubcategoryDetail; die;
				}
		}
		
		public static function updateAminitySubcategory($co=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$data['category_id']=cleanMe($b);
				$result    = $model1->updateAminitySubcategory($data);
				$amenitiesSubcategoryDetail    = $model1->amenitiesSubcategoryDetail($data);
				echo $amenitiesSubcategoryDetail; die;
				}
		}
		public static function updateOtherRoomInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$resultOrg1    = $model1->updateOtherRoomInfo($data);
				echo  $resultOrg1; die;
				}
			
		}
		
		public static function updateApartmentWifi($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$resultOrg1    = $model1->updateApartmentWifi($data);
				header('location:../apartmentWifiInfo/'.$data['aid']); 
				}
			
		}
		
		
		public static function publishApartmentonChannel($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$resultOrg1    = $model1->publishApartmentonChannel($data);
				header('location:../apartmentSelectRevisionInfo/'.$data['aid']); 
				}
			
		}
		
		public static function reviewLocation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$country    = $model1->selectCountry($data);
				$resultOrg1    = $model1->addressDetail($data);
				$data['vitech_city']=$resultOrg1['vitech_city'];
				
				$vitechCityList  = $model1->vitechCityList($data);
				$selectedVitechAreaList  = $model1->selectedVitechAreaList($data);
				 
				$bathroomCount  = $model1->bathroomCount($data);
				$bathroomDetail    = $model1->bathroomDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentPrpertyLocationView.php');
				}
			
		}
		
		public static function updateVitechDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$updateVitechDetail    = $model1->updateVitechDetail($data);
				echo $updateVitechDetail; die;
				}
			
		}
		
		public static function getAreaInfo()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$model1       = new NewPersonalModel();
				$result    = $model1->vitechAreaList();
				echo $result; die;
				}
		}
		
		public static function propertyChannels($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$country    = $model1->selectCountry($data);
				$updateChannelPolicy    = $model1->updateChannelPolicy($data);
				$resultOrg1    = $model1->addressDetail($data);
				 
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentPrpertyChannelView.php');
				}
			
		}
		
		public static function apartmentMonthlyPricingInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				 $appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				 
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentMonthlyPriceView.php');
				}
			
		}
		public static function apartmentBedroomInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$bedroomCount  = $model1->bedroomCount($data);
				$bedroomDetail    = $model1->bedroomDetail($data);
				$sleepingAreaDetail    = $model1->sleepingAreaDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentBedroomInfoView.php');
				}
			
		}
		
		
		public static function apartmentDescriptionInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$descriptionInfo    = $model1->apartmentDescription($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentDescriptionView.php');
				}
			
		}
		
		public static function apartmentNicknameInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				 
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentPrpertyNicknameView.php');
				}
			
		}
		
		public static function apartmentPhotoInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					//header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					//die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$displayPhotos    = $model1->displayPhotos($data); 
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentPhotoInfoView.php');
				}
			
		}
		
		
		public static function apartmentKeyInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					//header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					//die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$displayPhotos    = $model1->displayKeyPhotos($data); 
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentKeyPhotoInfoView.php');
				}
			
		}
		
		
		public static function updateApartmentKeyInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					//header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					//die;
				}
				//print_r($_POST); die;
				$updateApartmentKeyInfo    = $model1->updateApartmentKeyInfo($data);
				header('location:../apartmentKeyInfo/'.$data['aid']);
				}
			
		}
		
		public static function keyPhotoCount($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->keyPhotoCount($data);
				echo $result; die;
				}
		}
		public static function updateKeyPhotoDragging($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateKeyPhotoDragging($data);
				$result    = $model1->displayKeyPhotos($data);
				echo $result; die;
				}
		}
		public static function deleteKeyPhoto($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->deleteKeyPhoto($data);
				if($result==1)
				$result    = $model1->displayKeyPhotos($data);
				echo $result; die;
				}
		}
		public static function updatePhotoKeyDecrement($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updatePhotoKeyDecrement($data);
				$result    = $model1->displayKeyPhotos($data);
				echo $result; die;
				}
		}
		public static function getKeyPhoto($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				 
				$result    = $model1->displayKeyPhotos($data);
				echo $result; die;
				}
		}
		public static function getKeyImageInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				 
				$result    = $model1->getKeyImageInfo($data);
				echo $result; die;
				}
		}
		public static function updateKeyPhotos($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateKeyPhotos($data);
				echo $result; die;
				}
		}
		
		
		public static function apartmentGetStartedPhotoInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['gid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					//header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					//die;
				}
				$selectedGetSratedDetail    = $model1->selectedGetSratedDetail($data);
				$data['aid']=$selectedGetSratedDetail['enc'];
				$resultOrg1    = $model1->addressDetail($data);
				$displayPhotos    = $model1->displayGetStartedPhotos($data); 
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentGetStartedPhotoInfoView.php');
				}
			
		}
		public static function updateAvailableGetstarted()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$result    = $model1->updateAvailableGetstarted($data);
				echo $result; die;
				}
		}
		
		public static function updateGetStartedDescription($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['gid']=cleanMe($co);
				$result    = $model1->updateGetStartedDescription($data);
				echo $result; die;
				}
		}
		
		public static function updateGetstartedCode($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['gid']=cleanMe($co);
				$result    = $model1->updateGetstartedCode($data);
				echo $result; die;
				}
		}
		
		public static function updateGetstartedPassword($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['gid']=cleanMe($co);
				$result    = $model1->updateGetstartedPassword($data);
				echo $result; die;
				}
		}
		
		public static function updateGetStartedPhotoDragging($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['gid']=cleanMe($co);
				$result    = $model1->updateGetStartedPhotoDragging($data);
				$result    = $model1->displayGetStartedPhotos($data);
				echo $result; die;
				}
		}
		
		public static function deleteGetStartedPhoto($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['gid']=cleanMe($co);
				$result    = $model1->deleteGetStartedPhoto($data);
				$result    = $model1->displayGetStartedPhotos($data);
				echo $result; die;
				}
		}
		
		public static function updateGetStartedPhotoOrder($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['gid']=cleanMe($co);
				$result    = $model1->updateGetStartedPhotoOrder($data);
				$result    = $model1->displayGetStartedPhotos($data);
				echo $result; die;
				}
		}
		
		public static function getGetStartedPhoto($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['gid']=cleanMe($co);
				 
				$result    = $model1->displayGetStartedPhotos($data);
				echo $result; die;
				}
		}
		
		public static function getGetStartedImageInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['gid']=cleanMe($co);
				 
				$result    = $model1->getGetStartedImageInfo($data);
				echo $result; die;
				}
		}
		
		
		public static function updateGetStartedPhotos($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['gid']=cleanMe($co);
				$result    = $model1->updateGetStartedPhotos($data);
				echo $result; die;
				}
		}
		
		
		
		public static function apartmentPricingInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$listPricing    = $model1->listPricing($data); 
				$getCurrency    = $model1->getCurrency($data); 
				  
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentPricingInfoView.php');
				}
			
		}
		
		
		public static function apartmentEditPricingInfo($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$pricing    = $model1->pricingDetail($data);
				$dayAvailable    = $model1->dayAvailable($data); 
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentEditPricingInfoView.php');
				}
			
		}
		
		
		public static function apartmentGeneratePricingInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				 
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$getCurrency    = $model1->getCurrency($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentGeneratePricingInfoView.php');
				}
			
		}
		
		
		public static function generatePricing($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				 
				$model1       = new NewPersonalModel();
				$resultOrg1    = $model1->generatePricing($data);
				 
				$row_summary    = $model1->userSummary($data);
				header('location:../apartmentPricingInfo/'.$data['aid']); 
				}
			
		}

		public static function apartmentHeadlineInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				 
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentListingHeadingView.php');
				}
			
		}
		
		public static function apartmentTouristTaxInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$touristTaxInfo    = $model1->touristTaxInfo($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentTouristTaxView.php');
				}
			
		}
		
		
		public static function updateTouristTax($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co); 
				$result    = $model1->updateTouristTax($data);
				$result    = $model1->touristTaxInfo($data);
				echo $result; die;
				}
		}
		
		
		public static function updateTouristFee($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co); 
				$result    = $model1->updateTouristFee($data);
				 
				echo $result; die;
				}
		}
		
		public static function apartmentCleaningFeeInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$cleeningFeeInfo    = $model1->cleeningFeeInfo($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentCleeningFeeView.php');
				}
			
		}
		
		
		public static function apartmentBookingNoticeInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$bookingNoticeInfo    = $model1->bookingNoticeInfo($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentBookingNoticeView.php');
				}
			
		}
		
		
		public static function apartmentSecurityFeeInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$securityFeeInfo    = $model1->securityFeeInfo($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentSecurityFeeView.php');
				}
			
		}
		
		public static function apartmentLongTermSecurityFeeInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$securityFeeInfo    = $model1->securityLongTermFeeInfo($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentLongTermSecurityFeeView.php');
				}
			
		}
		
		
		
		public static function apartmentBookingDateInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['time']=date('Y-m-d');
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$getCalender    = $model1->getCalender($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentBookingDateView.php');
				}
			
		}
		
		public static function apartmentBathroomInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$bathroomCount  = $model1->bathroomCount($data);
				$bathroomDetail    = $model1->bathroomDetail($data);
				$result    = $model1->countBathDetail($data); 
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentBathroomInfoView.php');
				}
			
		}
		
		
		public static function apartmentPublishInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$districtPublishDetail    = $model1->districtPublishDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentPublishInfoView.php');
				}
			
		}
		
		
		public static function apartmentSelectRevisionInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$apartmentFilled=$resultOrg1['bedroom_updated']+ $resultOrg1['bathroom_updated']+ $resultOrg1['other_room_updated']+ $resultOrg1['wi_fi_updated']+ $resultOrg1['property_composition_updated']+$resultOrg1['ownership_updated'];
				if($apartmentFilled==0)
				{
					$apartmentFilled=0;
				}
				else if($apartmentFilled==6)
				{
					$apartmentFilled=1;
				}
				else
				{
				$apartmentFilled=2;	
				}
				
				 
				$displayPhotosCount=$model1->displayPhotosCount($data);
				if($displayPhotosCount>=10)
				{
					$photoCount=1;
				}
				else{
				$photoCount=0;	
				}
				$photoText=$resultOrg1['nickname_updated']+$resultOrg1['headline_updated']+$resultOrg1['description_updated']+$photoCount;
				$rentOutFilled=$resultOrg1['arrival_departure_updated']+$resultOrg1['pricing_updated']+$resultOrg1['fee_updated']+$photoText+$resultOrg1['house_rules_updated'];
				$districtPublishDetail    = $model1->districtPublishDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentSelectRevisionInfoView.php');
				}
			
		}
		
		
		
		public static function shortTermRentalStart($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$apartmentFilled=$resultOrg1['bedroom_updated']+ $resultOrg1['bathroom_updated']+ $resultOrg1['other_room_updated']+ $resultOrg1['wi_fi_updated']+ $resultOrg1['property_composition_updated']+$resultOrg1['ownership_updated'];
				if($apartmentFilled==0)
				{
					$apartmentFilled=0;
				}
				else if($apartmentFilled==6)
				{
					$apartmentFilled=1;
				}
				else
				{
				$apartmentFilled=2;	
				}
				
				 
				$displayPhotosCount=$model1->displayPhotosCount($data);
				if($displayPhotosCount>=10)
				{
					$photoCount=1;
				}
				else{
				$photoCount=0;	
				}
				$photoText=$resultOrg1['nickname_updated']+$resultOrg1['headline_updated']+$resultOrg1['description_updated']+$photoCount;
				$rentOutFilled=$resultOrg1['arrival_departure_updated']+$resultOrg1['pricing_updated']+$resultOrg1['fee_updated']+$photoText+$resultOrg1['house_rules_updated'];
				$districtPublishDetail    = $model1->districtPublishDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentShortTermRentalStartView.php');
				}
			
		}
		
		
		
		
		
		public static function listApartmentResidentials($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$residentialsList    = $model1->residentialsList($data); 
				$dependentList    = $model1->selectedResidentialDependentList($data); 
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentResidentialsView.php');
				}
			
		}
		public static function listDependentResidentials($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$residentialDependentList    = $model1->residentialDependentList($data); 
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentResidentialDependentInfoView.php');
				}
			
		}
		
		
		public static function addDependentResidential($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$addDependentResidential    = $model1->addDependentResidential($data); 
				header('location:../listApartmentResidentials/'.$data['aid']);
				}
			
		}
		
		
		public static function addPersonInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$countryOption    = $model1->countrynameList($data);  
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentResidentialInfoView.php');
				}
			
		}
		
		
		
		public static function sendInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				require_once('../configs/smsMandril.php');
				$sendInformation    = $model1->sendInformation($data);
				 
				header('location:../listApartmentResidentials/'.$data['aid']);
				}
			
		}
		
		public static function longTermRentalStart($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$apartmentFilled=$resultOrg1['bedroom_updated']+ $resultOrg1['bathroom_updated']+ $resultOrg1['other_room_updated']+ $resultOrg1['wi_fi_updated']+ $resultOrg1['property_composition_updated']+$resultOrg1['ownership_updated'];
				if($apartmentFilled==0)
				{
					$apartmentFilled=0;
				}
				else if($apartmentFilled==6)
				{
					$apartmentFilled=1;
				}
				else
				{
				$apartmentFilled=2;	
				}
				
				 
				$displayPhotosCount=$model1->displayPhotosCount($data);
				if($displayPhotosCount>=10)
				{
					$photoCount=1;
				}
				else{
				$photoCount=0;	
				}
				$photoText=$resultOrg1['nickname_updated']+$resultOrg1['headline_updated']+$resultOrg1['description_updated']+$photoCount;
				$rentOutFilled=$resultOrg1['arrival_departure_updated']+$resultOrg1['pricing_updated']+$resultOrg1['fee_updated']+$photoText+$resultOrg1['house_rules_updated'];
				$districtPublishDetail    = $model1->districtPublishDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentLongTermRentalStartView.php');
				}
			
		}
		
		public static function rentOutRevisionInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$updatePolicy=$model1->updatePolicy($data);
				$resultOrg1    = $model1->addressDetail($data);
				$apartmentFilled=$resultOrg1['bedroom_updated']+ $resultOrg1['bathroom_updated']+ $resultOrg1['other_room_updated']+ $resultOrg1['wi_fi_updated']+ $resultOrg1['property_composition_updated'];
				if($apartmentFilled!=5)
				{
					header('location:../rentErrorInfo/'.$data['aid']);
				}
				$displayPhotosCount=$model1->displayPhotosCount($data);
				if($displayPhotosCount>=10)
				{
					$photoCount=1;
				}
				else{
				$photoCount=0;	
				}
				//echo $resultOrg1['nickname_updated'].'-'.$resultOrg1['headline_updated'].'-'.$resultOrg1['description_updated'].'-'.$photoCount; die;
				$getStartedUpdateCount=$model1->getStartedUpdateCount($data);
				$arrivalDeparture=$resultOrg1['arrival_departure_updated']+$resultOrg1['house_rules_updated'];
				$photoText=$resultOrg1['nickname_updated']+$resultOrg1['headline_updated']+$resultOrg1['description_updated']+$photoCount;
				$pricing=$resultOrg1['pricing_updated']+$resultOrg1['fee_updated']; 
				
			//	echo $arrivalDeparture.'-'.$photoText.'-'.$pricing.'-'.$resultOrg1['policy_updated'];die;
				//echo $photoText.'-'.$resultOrg1['policy_updated'].'-'.$resultOrg1['tourist_tax_updated'].'-'.$resultOrg1['key_updated'];
				$districtPublishDetail    = $model1->districtPublishDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentRentOutDetailInfoView.php');
				}
			
		}
		
		public static function checkoutGuest($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['checkout_id']=cleanMe($b);
				$result    = $model1->checkoutGuest($data);
				header('location:../../checkOutInfo/'.$data['aid']);
				}
		}
		
		
		public static function checkOutInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$apartmentCheckedinInfo    = $model1->apartmentCheckedinInfo($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentCheckOutManagerView.php');
				}
			
		}
		
		public static function cleanAprtmentInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$apartmentCheckedinInfo    = $model1->apartmentCheckedOutInfo($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentCleaningManagerView.php');
				}
			
		}
		
		
		public static function checkedOutList($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$apartmentCheckedOutInfo    = $model1->apartmentCheckedOutInfo($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentCheckOutListView.php');
				}
			
		}
		
		
		public static function damagedOrRentableInfo($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['checkout_id']=cleanMe($b);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$apartmentCheckedOutInfo    = $model1->apartmentCheckedOutInfo($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentPrpertyChekedOutCleeningInfoView.php');
				}
			
		}
		
		
		public static function updateDamagedRentableInfo($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['check_id']=cleanMe($b);
				$result    = $model1->updateDamagedRentableInfo($data);
				header("location:../../checkedOutList/".$data['aid']);
				}
		}
		
		
		public static function rentOutPropertyManagerInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$apartmentFilled=$resultOrg1['bedroom_updated']+ $resultOrg1['bathroom_updated']+ $resultOrg1['other_room_updated']+ $resultOrg1['wi_fi_updated']+ $resultOrg1['property_composition_updated'];
				if($apartmentFilled!=5)
				{
					header('location:../rentErrorInfo/'.$data['aid']);
				}
				$districtPublishDetail    = $model1->districtPublishDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentRentOutPropertyManagerView.php');
				}
			
		}
		
		
		public static function apartmentArrivalDepartureSelectInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$apartmentFilled=$resultOrg1['bedroom_updated']+ $resultOrg1['bathroom_updated']+ $resultOrg1['other_room_updated']+ $resultOrg1['wi_fi_updated']+ $resultOrg1['property_composition_updated'];
				if($apartmentFilled!=5)
				{
					header('location:../rentErrorInfo/'.$data['aid']);
				}
				
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentArrivalDepartureRevisionSelectInfoView.php');
				}
			
		}
		
		
		
		public static function apartmentPricingReview($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$apartmentFilled=$resultOrg1['bedroom_updated']+ $resultOrg1['bathroom_updated']+ $resultOrg1['other_room_updated']+ $resultOrg1['wi_fi_updated']+ $resultOrg1['property_composition_updated'];
				if($apartmentFilled!=5)
				{
					header('location:../rentErrorInfo/'.$data['aid']);
				}
				$displayPhotosCount=$model1->displayPhotosCount($data);
				if($displayPhotosCount>=10)
				{
					$photoCount=1;
				}
				else{
				$photoCount=0;	
				}
				$photoText=$resultOrg1['nickname_updated']+$resultOrg1['headline_updated']+$resultOrg1['description_updated']+$photoCount;
				$pricing=$resultOrg1['pricing_updated']+$resultOrg1['fee_updated']; 
				$districtPublishDetail    = $model1->districtPublishDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentPricingRevisionInfoView.php');
				}
			
		}
		
		
		
		
		public static function apartmentPhotoAvailabilityReview($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$apartmentFilled=$resultOrg1['bedroom_updated']+ $resultOrg1['bathroom_updated']+ $resultOrg1['other_room_updated']+ $resultOrg1['wi_fi_updated']+ $resultOrg1['property_composition_updated'];
				if($apartmentFilled!=5)
				{
					header('location:../rentErrorInfo/'.$data['aid']);
				}
				$displayPhotosCount=$model1->displayPhotosCount($data);
				if($displayPhotosCount>=10)
				{
					$photoCount=1;
				}
				else{
				$photoCount=0;	
				}
				$photoText=$resultOrg1['nickname_updated']+$resultOrg1['headline_updated']+$resultOrg1['description_updated']+$photoCount;
				$pricing=$resultOrg1['pricing_updated']+$resultOrg1['fee_updated']; 
				$districtPublishDetail    = $model1->districtPublishDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentPhotoRevisionInfoView.php');
				}
			
		}
		
		
		public static function rentErrorInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$districtPublishDetail    = $model1->districtPublishDetail($data);
				
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentRentErrorInfoView.php');
				}
			
		}
		
		
		public static function apartmentArrivalInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				 
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentArrivalDepartureInfoView.php');
				}
			
		}
		
		
		
		public static function apartmentAmenitiesInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$amenitiesSubcategoryDetail    = $model1->amenitiesSubcategoryDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentAmenitiesSubcategoryInfoView.php');
				}
			
		}
		
		
		public static function apartmentPropertyComposition($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$propertyType  = $model1->propertyType($data);
				$propertyTypeEntranceInfo  = $model1->propertyTypeEntranceInfo($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentPrpertyCompositionView.php');
				}
			
		}
		
		
		public static function apartmentOwnershipInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$updateOwnerInfo    = $model1->updateAddressOwnerInfo($data);
				$propertyType  = $model1->propertyType($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentPrpertyOwnershipView.php');
				}
			
		}
		
		public static function updateOwnerInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateOwnerInfo($data);
				echo 1; die;
				}
		}
		
		
		public static function updateOwnerBoughtInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateOwnerBoughtInfo($data);
				echo 1; die;
				}
		}
		
		
		public static function updateOwnerAllowedtoRentInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateOwnerAllowedtoRentInfo($data);
				echo 1; die;
				}
		}
		
		public static function updateRentContractInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateRentContractInfo($data);
				echo 1; die;
				}
		}
		
		public static function updateRentContractRentInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateRentContractRentInfo($data);
				echo 1; die;
				}
		}
		
		
		public static function apartmentSalePrice($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				 
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentSalePriceView.php');
				}
			
		}
		
		
		public static function apartmentHouseRules($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$resultOrg1    = $model1->addressDetail($data);
				$workingHrs    = $model1->workingHrs();
				$eventsInfo  = $model1->eventsInfo($data); 
				$childrenInfo  = $model1->childrenInfo($data);
				$row_summary    = $model1->userSummary($data);
				require_once('UserApartmentHouseRulesView.php');
				}
			
		}
		
		public static function updateApartmentHouseRules($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$resultOrg1    = $model1->updateApartmentHouseRules($data);
				header('location:../apartmentHouseRules/'.$data['aid']); 
				}
			
		}
		public static function deliveryAddressInfo()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 
				$model1       = new NewPersonalModel();
				//$resultOrg1    = $model1->addressDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('NewPersonalDeliveryAddressView.php');
				}
			
		}
		
		public static function certificateList()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new NewPersonalModel();
				$profileStatus    = $model1->profileStatus($data);
				$resultOrg1    = $model1->employeeAccount($data);
				$certificateCount    = $model1->certificateCount($data);
				$certificateInfo    = $model1->certificateInfo($data);
				$row_summary    = $model1->userSummary($data);
				require_once('NewPersonalCertificateView.php');
				}
			
		}
		
		public static function thanksConnect()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				}
				else
				{
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new NewPersonalModel();
				 
				require_once('NewPersonalSuccessView.php');
				}
			
		}
		
		
		
		public static function checkConnection($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['certi_id']=cleanMe($co);
				$model1       = new NewPersonalModel();
				$result    = $model1->checkConnection($data);
				echo $result; die;
			}
		}
		
		
		public static function certificateQr($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['certi_id']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$certificateDetail    = $model1->certificateDetail($data);
				
				 if($certificateDetail['user_id']!=$data['user_id'])
				 {
					header('location:../userAccount'); die;
				 }
				 else if($certificateDetail['is_valid']==0)
				 {
					 header('location:../certificateList'); die;
				 }
				 else if($certificateDetail['is_connected']==1)
				 {
					header('location:../certificateList'); die;
				 }
				require_once('NewPersonalCertificateQRView.php');
			}
			
		}
		
		
		public static function timeOut($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['certi_id']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$certificateDetail    = $model1->certificateDetail($data);
				require_once('NewPersonalTimeOutView.php');
			}
			
		}
		
		
		
		public static function updateTimeOut()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 
				$model1       = new NewPersonalModel();
				$verifyIP = $model1->verifyIP(); 
				require_once('NewPersonalUpdateTimeOutView.php');
			}
			
		}
		
		public static function connectApp($a=null)
		{
			 
				$data=array();
				 
				$data['certi_id']=cleanMe($a);
				$model1       = new NewPersonalModel();
				$connectApp    = $model1->connectApp($data);
				header('location:../certificateList'); die;
		 
		}
		
		
		
		public static function generateCertificate()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new NewPersonalModel();
				
				$result    = $model1->generateCertificate($data);
				 
				if($result=='0')
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				else
				{
					header("location:certificateQr/".$result); die;
				}
				
			}
		}
		
		public static function userInfo($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				
				if(isset($_SESSION['rememberme_qid'])){
					
					setcookie('rememberme_qid', $_SESSION['rememberme_qid'], time()+ (30*60*60*24), '/');
				}
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new NewPersonalModel();
				$country    = $model1->countryList($data);
				$countryOpt    = $model1->countryOption($data);
				$resultOrg    = $model1->userAccount($data);
				$userBankid    = $model1->userBankid($data);
				$resultOrg1    = $model1->employeeAccount($data);
				$row_summary    = $model1->userSummary($data);
				if($row_summary['get_started_wizard_status']==0)
				{
					header("location:../GetStartedNew");
				}
				
				else if($row_summary['get_started_wizard_status']==1 && $row_summary['grading_status']==0)
				{
					header("location:../UpdateSecurityStatus");
				}
				$detail    = $model1->connectAccountDetail($data);
				$checkEmployerAvailable    = $model1->checkEmployerAvailable($data);
				$resultContry = $model1->selectCountry();
				$verificationId    = $model1->verificationId($data);
				require_once('NewPersonalInfoView.php');
			}
			
		}
		
		public static function verifyDetail($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				
				if(isset($_SESSION['rememberme_qid'])){
					
					setcookie('rememberme_qid', $_SESSION['rememberme_qid'], time()+ (30*60*60*24), '/');
				}
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new NewPersonalModel();
				$resultOrg    = $model1->userAccount($data);
				$userBankid    = $model1->userBankid($data);
				$resultOrg1    = $model1->employeeAccount($data);
				$row_summary    = $model1->userSummary($data);
				$_POST['addrs']=htmlentities($_POST['addrs'],ENT_NOQUOTES, 'ISO-8859-1');
				$_POST['addrs1']=htmlentities($_POST['addrs1'],ENT_NOQUOTES, 'ISO-8859-1');
				//print_r($_POST); die;
				 if(isset($_POST['clear_number']))
				 {
				$_POST['addrs']=htmlentities($_POST['addrs'],ENT_NOQUOTES, 'ISO-8859-1');	 
				$_POST['name']=htmlentities($_POST['name'],ENT_NOQUOTES, 'ISO-8859-1');	
				$_POST['l_name']=htmlentities($_POST['l_name'],ENT_NOQUOTES, 'ISO-8859-1');
				$_POST['langu']=htmlentities($_POST['langu'],ENT_NOQUOTES, 'ISO-8859-1');
				require_once('NewPersonalVerifyView.php');
				 }
				 else
				 {
					 header('location:userAccount');
				 }
			}
			
		}
		
		
		public static function verifyAppInfo()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				
				 
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new NewPersonalModel();
				$resultOrg    = $model1->userAccount($data);
				$userBankid    = $model1->userBankid($data);
				$resultOrg1    = $model1->employeeAccount($data);
				$row_summary    = $model1->userSummary($data);
				 $verifyIP    = $model1->verifyIP($data);
				require_once('NewPersonalAppVerifyView.php');
				  
			}
			
		}
		
		
		 
		
		
		
		
		public static function addUserAddress($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new NewPersonalModel();
				$result    = $model1->addUserAddress($data);
				header("location:../ReceivedRequest");
			}
		}
		
		
		public static function reviewUserAddress($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$model1       = new NewPersonalModel();
				$result    = $model1->reviewUserAddress($data);
				header("location:../reviewLocation/".$data['aid']);
			}
		}
		
		public static function addAddressDetail($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				
				if(isset($_SESSION['rememberme_qid'])){
					
					setcookie('rememberme_qid', $_SESSION['rememberme_qid'], time()+ (30*60*60*24), '/');
				}
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new NewPersonalModel();
				$resultOrg    = $model1->userAccount($data);
				$userBankid    = $model1->userBankid($data);
				$resultOrg1    = $model1->employeeAccount($data);
				$row_summary    = $model1->userSummary($data);
				require_once('NewPersonalAddAddressView.php');
				 
			}
			
		}
		
		public static function updatePhoneDetail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				
				if(isset($_SESSION['rememberme_qid'])){
					
					setcookie('rememberme_qid', $_SESSION['rememberme_qid'], time()+ (30*60*60*24), '/');
				}
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new NewPersonalModel();
				
				$resultOrg    = $model1->userAccount($data);
				$userBankid    = $model1->userBankid($data);
				$resultOrg1    = $model1->employeeAccount($data);
				$countryOption    = $model1->countryOption($data);
				$row_summary    = $model1->userSummary($data);
				require_once('NewPersonalPhonedetailView.php');
				 
			}
			
		}
		
		public static function updateBankDetail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				
				if(isset($_SESSION['rememberme_qid'])){
					
					setcookie('rememberme_qid', $_SESSION['rememberme_qid'], time()+ (30*60*60*24), '/');
				}
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new NewPersonalModel();
				
				$resultOrg    = $model1->userAccount($data);
				$userBankid    = $model1->userBankid($data);
				$resultOrg1    = $model1->employeeAccount($data);
				$row_summary    = $model1->userSummary($data);
				  
				require_once('NewPersonalBankAccountView.php');
				 
			}
			
		}
		public static function checkAddress()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new NewPersonalModel();
				
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
				$model1       = new NewPersonalModel();
				
				$result    = $model1->checkAddresslatLong();
				echo $result; die;
				}
		}
		
		public static function updateUser($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				$data['user_id']=$_POST['user_id'];
				$data['cid']=$_POST['cid'];
				$data['uid']=$_POST['uid'];
				$model1       = new NewPersonalModel();
				
				$result    = $model1->updateUser($data);
				echo $result; die;
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
				
				$model1       = new NewPersonalModel();
				
				$result    = $model1->updateData($data);
				echo $result; die;
			}
		}
		
		public static function checkUserAvailability($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new NewPersonalModel();
				
				$result    = $model1->checkUserAvailability($data);
				echo $result; die;
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
				
				$model1       = new NewPersonalModel();
				
				$result    = $model1->updateDataPost($data);
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
				
				$model1       = new NewPersonalModel();
				
				$result    = $model1->updateDataBank($data);
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
				
				$model1       = new NewPersonalModel();
				$data['user_id']=$_SESSION['user_id'];
				$result    = $model1->updateDataPhone($data);
				echo $result; die;
			}
		}
		
		public static function updateImage($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$data=array();
				print_r($_POST); die;
				$data['user_id']=$_SESSION['user_id'];
				
				$model1       = new NewPersonalModel();
				
				$result    = $model1->updateImage($data);
				header("location:../NewPersonal/userAccount");
			}
		}
		
		
		public static function saveCardDetails()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				require "../cardvalidity/vendor/autoload.php";	
				$detector = new CardDetect\Detector();
				$card = $_POST['card_number'];

				$data['card_type']= $detector->detect($card);
				$model1       = new NewPersonalModel();
				
				$result    = $model1->saveCardDetails($data);
				header("location:../StoreData/userAccount");
			}
		}
		
		
		
		
		
		
		
		
		
	    public static function updateAddress($co = null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$data=array();
				
				$data['user_id']=$_POST['user_id'];
				$data['cid']=$_POST['cid'];
				
				$model1       = new NewPersonalModel();
				
				$result    = $model1->updateAddress($data);
				echo $result; die;
			}
		}
		public static function updateDate($co = null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$data=array();
				
				$data['user_id']=$_POST['user_id'];
				$data['cid']=$_POST['cid'];
				
				$model1       = new NewPersonalModel();
				
				$result    = $model1->updateDate($data);
				echo $result; die;
			}
		}
		public static function updateSex($co = null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
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
				
				
				$model1       = new NewPersonalModel();
				
				$result    = $model1->updateSex($data);
				echo $result; die;
			}
			
		}
		public static function searchUserDetail($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new NewPersonalModel();
				if (isset($_POST)) {
					$resultWeb = $model1->searchUserDetail($data);
				}
			}
			echo $resultWeb;
			die;
		}
		
		
		public static function updateAppAccount($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$path="../../../";
				$model = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				
				//print_r($_POST); die;
				$updateAppAccount=$model->updateAppAccount($data);
				if($updateAppAccount==0)
				{
				header("location:updateTimeOut");	 die;
				}
				else{
				header("location:userInfo");	die;
				}
					
							
			}
		}
		
		
		public static function updateDeliveryAddress($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../LoginAccount");
				} else {
				 
				$model = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$updateAppAccount=$model->updateDeliveryAddress($data);
				header("location:../addressList"); 
							
			}
		}
		
		
		
		
		public static function addDeliveryAdddress()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				 
				$model = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 
				$addDeliveryAdddress=$model->addDeliveryAdddress($data);
				header("location:addressList"); 
							
			}
		}
		
		public static function updateAccount($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
				} else {
				$path="../../../";
				$model = new NewPersonalModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$_POST['total_value']=str_ireplace("'",'"',$_POST['total_value']);
				//print_r($_POST); die;
				$updateAccount=$model->updateAccount($data);
				
				header("location:userInfo");	die;
				
					
							
			}
		}
		
		public static function verifyUserDetail()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$path         = "../../../../";
				
				$model = new NewPersonalModel();
				
				require_once('../configs/smsMandril.php');
				$verifyUserDetail = $model->verifyUserDetail();	
				
				echo $verifyUserDetail; die;
			}
			
		}
		
		
		public static function verifyOtp()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$path         = "../../../../";
				
				$model = new NewPersonalModel();
				
				require_once('../configs/smsMandril.php');
				$verifyOtp = $model->verifyOtp();	
				
				echo $verifyOtp; die;
			}
			
		}
		
		
		
		
	}
	
	
?>