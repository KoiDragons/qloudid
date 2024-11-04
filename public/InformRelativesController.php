<?php
	require_once 'InformRelativesModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class InformRelativesController
	{
		
		
		public static function index()
		{
			$path = "../../";
			$model = new InformRelativesModel();
			
			$resultContry = $model->selectCountry();
			require_once('InformRelativesView.php');
			
		}
		
		
		public static function createPopup($c = null)
		{
			
			
            $model1       = new InformRelativesModel();
			if (isset($_POST)) {
				$resultWeb = $model1->createPopup();
			}
			
			echo $resultWeb;
			die;
		}
		
		public static function checkUserAvailability($c = null)
		{
			
			
            $model1       = new InformRelativesModel();
			if (isset($_POST)) {
				$resultWeb = $model1->checkUserAvailability();
			}
			
			echo $resultWeb;
			die;
		}
		
		public static function sendOtp($c = null)
		{
			
			
            $model1       = new InformRelativesModel();
			if (isset($_POST)) {
				require_once('../configs/smsMandril.php');
				$resultWeb = $model1->sendOtp();
			}
			
			echo $resultWeb;
			die;
		}
		
		public static function verifyOtp($c = null)
		{
			
			
            $model1       = new InformRelativesModel();
			if (isset($_POST)) {
				include('../configs/testMandril.php');
				include('../configs/smsMandril.php');
				$resultWeb = $model1->verifyOtp();
			}
			
			echo $resultWeb;
			die;
		}
		
		public static function informRelativesPerson($c = null)
		{
			
			
            $model1       = new InformRelativesModel();
			if (isset($_POST)) {
				include('../configs/testMandril.php');
				include('../configs/smsMandril.php');
				$resultWeb = $model1->informRelativesPerson();
			}
			
			echo $resultWeb;
			die;
		}
	}
?>