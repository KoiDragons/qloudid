<?php
	require_once 'PublicSignupModel.php';
	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class PublicSignupController
	{
		
	
	 public static function createAccount($a=null)
		{
				$data=array();
				$path = "../../../../";
				$data['a_id']=cleanMe($a);
				$model1       = new PublicSignupModel();
				$userSignupInformation    = $model1->userSignupInformation($data);
				$countryOptions    = $model1->countryOptions($data);
				require_once('PublicSignupUserDetailInformationView.php');
			}
			
			
			
		public static function verifyOtp($a=null)
		{
				$data=array();
				$path = "../../../../";
				$data['a_id']=cleanMe($a);
				$model1       = new PublicSignupModel();
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php'); 
				$saveDetails    = $model1->saveDetails($data);
				$invitationVerifyUserDetail    = $model1->userSignupInformation($data);
				 
				require_once('PublicSignupVerifyUserDetailView.php');
			}	
			
			
		public static function updateAccountDetails($a=null)
		{
		$path = "../../../../../";
		$model1       = new PublicSignupModel();
		$data=array();
		$data['a_id']=cleanMe($a);
		$_POST=$model1->userSignupInformation($data);
		$_POST['domain_id']=0;
		$data['user_id']    = $model1->createUser($_POST);
		if($_POST['signup_type']==1)
		{
		$addProposalReservation    = $model1->addProposalReservation($data);
		header('location:../../LandloardBroker/proposerDetail/'.$_POST['enc']);	die;
		}
		else if($_POST['signup_type']==2)
		{
		$approveResidence    = $model1->approveResidence($data);
		header('location:../../PublicResidentialRequest/residenceDetail/'.$approveResidence);	die;
		}
		 
		}
			
		public static function verifyEmail($a=null)
		{
			$path = "../../../";
			$model1       = new PublicSignupModel();
			$data=array();
			$data['a_id']=cleanMe($a);
			 
			require_once('../configs/smsMandril.php');
			require_once('../configs/testMandril.php');
			require_once('../lib/url_shortener.php');
			$verifyEmail    = $model1->verifyEmail($data);
			 
			 echo $verifyEmail; 
			 die;
		}	
			 
		
	}
?>