<?php
	require_once 'PublicUserRequestModel.php';
	require_once '../configs/utility.php';
	class PublicUserRequestController
	{
		
		
		public static function index()
		{
			
			
		}
		public static function requestAccount($a=null, $b=null)
		{
			
            $path = "../../../../";
			$data=array();
			$data['r_id']=cleanMe($a);
			$model = new PublicUserRequestModel();
			$GetStartedUser = $model->GetStartedUser($data);
			$checkVerifiedRequest = $model->checkVerifiedRequest($data);
			require_once('PublicUserRequestView.php');
			
		}
		
		
		public static function companyConnection($a=null, $b=null)
		{
			$data=array();
			$data['r_id']=cleanMe($a);
			$model1 = new PublicUserRequestModel();
			$checkVerified = $model1->checkVerified($data);
			//print_r($checkVerified); die;
			if($checkVerified['is_approved'] !=0 )
			{
				header("location:../../ConnectionAlreadyVerified"); 
				die;
			}
			$path = "../../../../";
			
			$model = new PublicUserRequestModel();
			$GetStartedUser = $model->GetStartedCompany($data);
			$getInformation = $model->getInformation($data);
			require_once('PublicCompanyRequestView.php');
			
		}
		
		
		public static function loginAccount($a = null, $b = null, $c = null)
		{
			
			$model = new PublicUserRequestModel();
			if (isset($_POST['username']) && isset($_POST['password']))
            $data = array();
			$expire = time() + 60 * 60;
			
			$data['email']    = cleanMe($_POST['username']);
			$data['password'] = md5($_POST['password']);
			
			$result = $model->LoginAccount($data);
			
			$path   = "../../../";
			if ($result['result'] == 2 || $result['result'] == 3 || $result['result'] == 4) {
				start_Session($result['id']);
				echo $result['result']; die;
			} 
			else
			{
				echo $result['result']; die;
			}
		}
		public static function sendIntimation()
		{
				$data=array();
				$model = new PublicUserRequestModel();
				require_once('../configs/testMandril.php');
				$sendIntimation = $model->sendIntimation();	
				echo $sendIntimation; die;
			}
		
		public static function loginUpdate($a = null, $b = null, $c = null)
		{
			
			$model = new PublicUserRequestModel();
			
            $data = array();
			$expire = time() + 60 * 60;
			$result = $model->loginUpdate($data);
			
			echo 1; die;
		}
		
		public static function checkUserAvailability($c = null)
		{
			
			
            $model1       = new PublicUserRequestModel();
			if (isset($_POST)) {
				$resultWeb = $model1->checkUserAvailability();
			}
			
			echo $resultWeb;
			die;
		}
		public static function checkUserAvailabilitySSN($c = null)
		{
			
			
            $model1       = new PublicUserRequestModel();
			if (isset($_POST)) {
				$resultWeb = $model1->checkUserAvailabilitySSN();
			}
			
			echo $resultWeb;
			die;
		}
		public static function approveRequest()
		{
			
			
			$data=array();
			$model = new PublicUserRequestModel();
			require_once('../configs/testMandril.php');
			$approveRequest = $model->approveRequest();	
			echo $approveRequest; die;
			
			
		}
		}
		
		
	?>	