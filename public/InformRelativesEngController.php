<?php
require_once 'InformRelativesEngModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class InformRelativesEngController
{
    
    
    public static function index()
    {
		$path = "../../";
		$model = new InformRelativesEngModel();
		$resultContry = $model->selectCountry();
    require_once('InformRelativesEngView.php');
	
	}
	
	
	public static function createPopup($c = null)
		{
			
			
            $model1       = new InformRelativesEngModel();
			if (isset($_POST)) {
				$resultWeb = $model1->createPopup();
			}
		
			echo $resultWeb;
			die;
		}

		
		public static function sendOtp($c = null)
		{
			
			
            $model1       = new InformRelativesEngModel();
			if (isset($_POST)) {
			require_once('../configs/smsMandril.php');
				$resultWeb = $model1->sendOtp();
			}
		
			echo $resultWeb;
			die;
		}
		
		public static function verifyOtp($c = null)
		{
			
			
            $model1       = new InformRelativesEngModel();
			if (isset($_POST)) {
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
				$resultWeb = $model1->verifyOtp();
			}
		
			echo $resultWeb;
			die;
		}
}
?>