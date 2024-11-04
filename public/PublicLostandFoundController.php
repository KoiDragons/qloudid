<?php
	require_once 'PublicLostandFoundModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class PublicLostandFoundController
	{
		
		
		public static function index()
		{
			
				$path = "../../";
				$model = new PublicLostandFoundModel();
				$resultContry = $model->selectCountry();
				require_once('PublicLostandFoundView.php');
		}
		
		public static function registerUser()
		{
			
				$path = "../../../";
				 
				$model = new PublicLostandFoundModel();
				$resultContry = $model->selectCountry();
				require_once('PublicRegisterUserView.php');
		}
		
		public static function sendVerificationInfo()
		{
			
			$model = new PublicLostandFoundModel();
			$data = array();
			$data['email']       = cleanMe($_POST['email']);
			$data['ccountry']       = cleanMe($_POST['ccountry']);
			$data['password']    = md5($_POST['password']);
			 
			$data['random_hash'] = substr(md5(uniqid(rand(), true)), 16, 16);
			$sendVerificationInfo = $model->sendVerificationInfo($data );
			if($sendVerificationInfo==1)
			{
			require_once('../lib/url_shortener.php');
            require_once('../configs/testMandril.php');
            $resultCreate = $model->sendActivationEmail($data);
			header('location:../../../user/index.php/ConfirmEmail');
			}
			else
			{
				header('location:../PublicLostandFound');
			}
		}	
		
		public static function sendInformation($a=null)
		{
			
			$model = new PublicLostandFoundModel();
			$sendInformation = $model->sendInformation();
			echo $sendInformation; die;
		}	
				 
	}
?>