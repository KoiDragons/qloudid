<?php
	require_once 'GetIdentifiedModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class GetIdentifiedController
	{
		
		
		public static function index()
		{
			
			
		}
		
		public static function verifyRequest($a=null)
		{
			$path = "../../../../";
			$data=array();
			$data['id']=cleanMe($a);
			$model = new GetIdentifiedModel();
			$checkVerified = $model->checkVerified($data);
			if($checkVerified !=0 )
			{
			header("location:https://safeqloud-228cbc38a2be.herokuapp.com/public/index.php/ConnectionAlreadyVerified"); 
			die;
			}
			$getInformation = $model->getInformation($data);	
			
			require_once('GetIdentifiedView.php');
			
		}
		
		public static function sendIntimation()
		{
			
			
				$data=array();
				$model = new GetIdentifiedModel();
				require_once('../configs/testMandril.php');
				$sendIntimation = $model->sendIntimation();	
				echo $sendIntimation; die;
			
			
		}
		public static function checkUserAvailability($c = null)
		{
			
			
            $model1       = new GetIdentifiedModel();
			if (isset($_POST)) {
			
				$resultWeb = $model1->checkUserAvailability($data);
			}
			
			echo $resultWeb;
			die;
		}
	}
?>