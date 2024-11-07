<?php
require_once 'EmployeeFileRequestModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class EmployeeFileRequestController
{
    
    
    public static function addFileInformation()
    {
		$path = "../../../";
    require_once('EmployeeFileRequestView.php');
	
	}
	
	public static function uploadFileDetails()
    {
		$model = new EmployeeFileRequestModel();
		require_once('../configs/testMandril.php');
		require_once('../configs/smsMandril.php');
		require_once('../lib/url_shortener.php');
		$updateFile = $model->updateFile();
		header('location:https://www.safeqloud.com/public/index.php/UserCompanySignUp/brokers/V2l1eVdrVFdnKzZTQTgzRy96RXEzQT09');
	
	}
	

}
?>