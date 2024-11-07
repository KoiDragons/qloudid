<?php
	require_once 'EmployeeInvitationModel.php';
	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class EmployeeInvitationController
	{
		
	
	 
		
		
		public static function verifyDetails($a=null)
		{
				$data=array();
				$path = "../../../../";
				$data['a_id']=cleanMe($a);
				$model1       = new EmployeeInvitationModel();
				 
				$countryOptions    = $model1->countryOptions($data);
				$invationInformation    = $model1->invationInformation($data);
				 
				require_once('EmployeeInvitationUserDetailsVerifyView.php');
			}
			
		public static function verifyBrokerDetails($a=null)
		{
				$data=array();
				$path = "../../../../";
				$data['a_id']=cleanMe($a);
				$model1       = new EmployeeInvitationModel();
				 
				$countryOptions    = $model1->countryOptions($data);
				$invationInformation    = $model1->brokerInvationInformation($data);
				 if($invationInformation['is_approved']!=0)
				 {
					header('location:https://safeqloud-228cbc38a2be.herokuapp.com/user/index.php/LoginAccount/emailLogin'); die;	 
				 }
				require_once('EmployeeInvitationUserCompanyDetailsVerifyView.php');
			}	
			
			
			public static function verifyOtpDetails($a=null)
		{
				$data=array();
				$path = "../../../../";
				$data['a_id']=cleanMe($a);
				$model1       = new EmployeeInvitationModel();
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php'); 
				$saveDetails    = $model1->saveBrokerDetails($data);
				$invitationVerifyUserDetail    = $model1->brokerInvationInformation($data);
				 
				require_once('EmployeeInvitationVerifyInvitedBrokerView.php');
			}
			
			
		public static function verifyOtp($a=null)
		{
				$data=array();
				$path = "../../../../";
				$data['a_id']=cleanMe($a);
				$model1       = new EmployeeInvitationModel();
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php'); 
				$saveDetails    = $model1->saveDetails($data);
				$invitationVerifyUserDetail    = $model1->invationInformation($data);
				 
				require_once('UserCompanyUserSignUpVerifyInvitedEmployeeView.php');
			}
		
		 public static function verifyEmailOtpDetail($a=null)
		{
		$path = "../../../../../";
		$model1       = new EmployeeInvitationModel();
		$data=array();
		$data['request_id']=cleanMe($a);
		 
		$verifyEmailOtpDetail    = $model1->verifyEmailOtpDetail($data);
		echo $verifyEmailOtpDetail; die;	
		 
		}
		
		
		 public static function verifyNewEmailDetail($a=null)
		{
		$path = "../../../../../";
		$model1       = new EmployeeInvitationModel();
		$data=array();
		$data['request_id']=cleanMe($a);
		 
		$verifyNewEmailDetail    = $model1->verifyNewEmailDetail($data);
		echo $verifyNewEmailDetail; die;	
		 
		}
		
		
		 public static function verifyCompanyIdDetail($a=null)
		{
		$path = "../../../../../";
		$model1       = new EmployeeInvitationModel();
		$data=array();
		$data['request_id']=cleanMe($a);
		 
		$verifyCompanyIdDetail    = $model1->verifyCompanyIdDetail($data);
		echo $verifyCompanyIdDetail; die;	
		 
		}
		 
		
		public static function approveInvitation($a=null)
		{
		$path = "../../../../../";
		$model1       = new EmployeeInvitationModel();
		$data=array();
		$data['request_id']=cleanMe($a);
		 
		$approveUserEmployeeRequest    = $model1->approveUserEmployeeRequest($data);
		header('location:https://safeqloud-228cbc38a2be.herokuapp.com/user/index.php/LoginAccount/emailLogin');
		 
		}
		
		
		public static function approveBrokerInvitation($a=null)
		{
		$path = "../../../../../";
		$model1       = new EmployeeInvitationModel();
		$data=array();
		$data['a_id']=cleanMe($a);
		$_POST=$model1->brokerInvationInformation($data);
		$_POST['email']=$_POST['new_email_id'];
		$_POST['domain_id']=0;
		$data['user_id']    = $model1->createUser($_POST);
		$approveBrokerInvitation    = $model1->approveBrokerInvitation($data);
		header('location:https://safeqloud-228cbc38a2be.herokuapp.com/user/index.php/LoginAccount/emailLogin');
		 
		}
		
	}
?>