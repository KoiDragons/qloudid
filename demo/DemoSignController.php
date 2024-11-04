<?php
require_once 'DemoSignModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class DemoSignController
{
    
    
    public function index()
    {
		$path='../../';
		 $model       = new DemoSignModel();
		 $verifyIP = $model->verifyIP();
		 require_once('DemoSignViewNew.php');
	
	}
	 
	public function thanks()
    {
		$path='../../../';
		 $model       = new DemoSignModel();
		 $updateCertificate = $model->updateCertificate();
		 require_once('DemoSignThanksViewNew.php');
	
	}
}
?>