<?php
	require_once 'DependentsModel.php';
	require_once '../configs/utility.php';
	require_once 'ShareMonitorController.php';
	class DependentsController
	{
		public static function dependentList()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				
				header("location:../LoginAccount");
				} else {
				$path         = "../../../";
				$model       = new DependentsModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$dependentCountApproved    = $model->dependentCountApproved($data);
				$dependentDetailApproved    = $model->dependentDetailApproved($data);
				$dependentCountAdded    = $model->dependentCountAdded($data);
				$dependentDetailAdded    = $model->dependentDetailAdded($data);
				$row_summary    = $model->userSummary($data);
				$model4 = new ShareMonitorController();
				$receivedAllCount = $model4->receivedAllCount();
				require_once('DependentView.php');
			}
		}
		
		
		public static function approvedDependents()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				
				header("location:../LoginAccount");
				} else {
				$path         = "../../../";
				$model       = new DependentsModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$dependentCountApproved    = $model->dependentCountApproved($data);
				$dependentDetailApproved    = $model->dependentDetailApproved($data);
				$dependentCountAdded    = $model->dependentCountAdded($data);
				$dependentDetailAdded    = $model->dependentDetailAdded($data);
				$row_summary    = $model->userSummary($data);
				$model4 = new ShareMonitorController();
				$receivedAllCount = $model4->receivedAllCount();
				require_once('DependentApprovedView.php');
			}
		}
		public static function registeredDaycare($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path  = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['did']=cleanMe($a);
				$model       = new DependentsModel();
				$selectIcon = $model->selectIcon(); 
				$dependentInfo = $model->dependentInfo($data); 
				$daycareRequestReceived = $model->daycareRequestReceived($data); 
				$daycareRequestApproved = $model->daycareRequestApproved($data); 
				require_once('DependentDayCareRequestView.php');
			}
		}
		 
		public static function approvedDaycare($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path  = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['did']=cleanMe($a);
				$model       = new DependentsModel();
				$row_summary = $model->dependentInfo($data);
				$daycareRequestApproved = $model->daycareRequestApproved($data); 
						
				require_once('DependentDayCareRequestApprovedView.php');
			}
		}
		
		
		
		public static function addGuardianInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path  = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['did']=cleanMe($a);
				$model       = new DependentsModel();
				$resultContry = $model->countryOption();
				$dependentInfo = $model->dependentInfo($data); 
				require_once('DependentGuardianInfoView.php');
			}
		}
			public static function approveRequest($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($a);
				$model       = new DependentsModel();
				$approveRequest = $model->approveRequest($data); 
				header('location:../../ShareMonitor/shareMonitorRequestList');
			}
		}
		
		
		public static function approveRequestDaycare($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($a);
				$data['did']=cleanMe($b);
				$model       = new DependentsModel();
				$approveRequestDaycare = $model->approveRequestDaycare($data); 
				header('location:../../registeredDaycare/'.$data['did']);
			}
		}
		public static function rejectRequestDaycare($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($a);
				$data['did']=cleanMe($b);
				$model       = new DependentsModel();
				$rejectRequestDaycare = $model->rejectRequestDaycare($data); 
				header('location:../../registeredDaycare/'.$data['did']);
			}
		}
		public static function rejectRequest($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($a);
				$model       = new DependentsModel();
				$rejectRequest = $model->rejectRequest($data); 
				header('location:../../ShareMonitor/shareMonitorRequestList');
			}
		}
		
		public static function approveReceivedRequest($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($a);
				$model       = new DependentsModel();
				$approveReceivedRequest = $model->approveReceivedRequest($data); 
				header('location:../dependentList');
			}
		}
		
		public static function rejectReceivedRequest($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($a);
				$model       = new DependentsModel();
				$rejectReceivedRequest = $model->rejectReceivedRequest($data); 
				header('location:../dependentList');
			}
		}
		
		
		public static function sendGuardianRequest($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['did']=cleanMe($a);
				$model       = new DependentsModel();
				require_once('../configs/smsMandril.php');
				require_once('../configs/testMandril.php');
				$sendGuardianRequest = $model->sendGuardianRequest($data); 
				header('location:../dependentList');
			}
		}
		
		public static function guardianInfoMore($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path  = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['did']=cleanMe($a);
				$model       = new DependentsModel();
				if(isset($_POST['ind']))
				{
					if($_POST['ind']==1)
					{
					$userInfo = $model->userInfo($data);	
					}
				}
				
				$userCountryList = $model->userCountryList($data);
				require_once('DependentGuardianDetailView.php');
			}
		}
		
		public static function checkGuardianSSN($a = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new DependentsModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['did']=cleanMe($a);
				
				$userSummary = $model->userSummary($data);
				$data['email']=$userSummary['email'];
				require_once('../configs/testMandril.php');
				$checkGuardianSSN = $model->checkGuardianSSN($data);
				
				echo $checkGuardianSSN; die;
				
			}
			
		}
		
		
		public static function inviteGuardian($a = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new DependentsModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['did']=cleanMe($a);
				
				$userSummary = $model->userSummary($data);
				$data['email']=$userSummary['email'];
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				$inviteGuardian = $model->inviteGuardian($data);
				
				echo $inviteGuardian; die;
				
			}
			
		}
		
		public static function guardianList($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path  = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['did']=cleanMe($a);
				$model       = new DependentsModel();
				$verifyGuardian    = $model->verifyGuardian($data);
				if($verifyGuardian==0)
				{
					header('location:../dependentList');  die;
				}
				$guardianCountApproved    = $model->guardianCountApproved($data);
				$guardianDetailApproved    = $model->guardianDetailApproved($data);
				$guardianCountAdded    = $model->guardianCountAdded($data);
				$guardianDetailAdded    = $model->guardianDetailAdded($data);
				$guardianRequestReceived    = $model->guardianRequestReceived($data);
				require_once('DependentGuardianListView.php');
			}
		}
		
			public static function requestGuardian($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path  = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['did']=cleanMe($a);
				$model       = new DependentsModel();
				$dependentInfo    = $model->dependentInfo($data);
				$dependentGuardianInfo    = $model->dependentGuardianInfo($data); 
				require_once('DependentGuardianRequestView.php');
			}
		}
		
		public static function dependentInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path  = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['did']=cleanMe($a);
				$model       = new DependentsModel();
				$row_summary = $model->dependentInfo($data);
				$guardianCountApproved    = $model->guardianCountApproved($data);
				$guardianDetailApproved    = $model->guardianDetailApproved($data);
						
				require_once('DependentInfoView.php');
			}
		}
		
		public static function dependentElderInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path  = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['did']=cleanMe($a);
				$model       = new DependentsModel();
				$row_summary = $model->dependentInfo($data); 
				require_once('DependentElderInfoView.php');
			}
		}
		
		public static function dependentDisableInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path  = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['did']=cleanMe($a);
				$model       = new DependentsModel();
				$row_summary = $model->dependentInfo($data); 
				require_once('DependentDisableInfoView.php');
			}
		}
		
		public static function dependentPassportInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path  = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['did']=cleanMe($a);
				$model       = new DependentsModel();
				$row_summary = $model->dependentInfo($data); 
				require_once('DependentsPassportAddInfoView.php');
			}
		}
		
		
		public static function dependentDetails()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				
				header("location:../LoginAccount");
				} else {
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model       = new DependentsModel();
				$dobYears = $model->dobYears(); 
				$dobMonthOldYear = $model->dobMonthOldYear(); 
				$dobMonthCurrentYear = $model->dobMonthCurrentYear(); 
				$countryCodeList = $model->countryOption(); 
				$userSummary = $model->userSummary($data); 
				require_once('DependentsInfoView.php');
			}
		}
		
		public static function checkUsedIdentificator($a=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new DependentsModel();
				$data['did']=cleanMe($a);
				require_once('../configs/smsMandril.php');
				$checkUsedIdentificator = $model->checkUsedIdentificator($data);	
				
				echo $checkUsedIdentificator; die;
			}
			
		}
		
		
		public static function checkSsn($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				
				$model       = new DependentsModel();
				
				$checkSsn    = $model->checkSsn($data);
				
				echo $checkSsn; die;
			}
		}
		
		
		
		public static function informUser($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				
				$model       = new DependentsModel();
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$informUser    = $model->informUser($data);
				
				echo $informUser; die;
			}
		}
		
			public static function verifyOtp($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				
				$model       = new DependentsModel();
				
				$verifyOtp    = $model->verifyOtp($data);
				
				echo $verifyOtp; die;
			}
		}
		
		
		
		public static function addDependentImage($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['dependent_id']=cleanMe($a);
				$model       = new DependentsModel();
				$dependentDetail    = $model->dependentDetail($data);
				if($dependentDetail==0)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$row_summary    = $model->userSummary($data);
				require_once('DependentsInfoPhotoView.php');
			}
		}
		public static function updateDependentInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['dependent_id']=cleanMe($a);
				$model       = new DependentsModel();
				$dependentDetail    = $model->dependentDetail($data);
				if($dependentDetail==0)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$updateDependentInfo = $model->updateDependentInfo($data);	
				header("location:../dependentList");
			}	
		}
		public static function addDependent()
		{ 
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
			} 
			else
			{
				$model = new DependentsModel();
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$result    = $model->addDependent($data);
				
				header("location:dependentPassportInfo/".$result);
			}
		}
		
		
		public static function updatePassport($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['dependent_id']=cleanMe($a);
				$model       = new DependentsModel();
				$updatePassport    = $model->updatePassport($data);
				 
				header("location:../dependentList");
			}
		}
		
		public static function approveDependent()
		{ 
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
			} 
			else
			{
				$model = new DependentsModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$approveDependent    = $model->approveDependent($data);
				
				header("location:dependentList");
			}
		}
		
	}
	
	
?>