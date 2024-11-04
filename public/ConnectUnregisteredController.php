<?php
require_once 'ConnectUnregisteredModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class ConnectUnregisteredController
{
    
    
    public static function index()
    {
		$path = "../../";
    require_once('ConnectUnregisteredView.php');
	
	}
	
	public static function connectAccount($a=null)
    {
		$path = "../../../../";
		$data=array();
		$data['id']=cleanMe($a);
		$webModel = new ConnectUnregisteredModel();
		$requestDetail = $webModel->requestDetail($data);
		$requestKeenDetail = $webModel->requestKeenDetail($data);
    require_once('ConnectUnregisteredView.php');
	
	}
	

}
?>