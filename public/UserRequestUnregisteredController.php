<?php
require_once 'UserRequestUnregisteredModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class UserRequestUnregisteredController
{
    
    
    public static function index()
    {
		$path = "../../";
    require_once('UserRequestUnregisteredView.php');
	
	}
	
	public static function connectAccount($a=null)
    {
		$path = "../../../../";
		$data=array();
		$data['id']=cleanMe($a);
		$webModel = new UserRequestUnregisteredModel();
		$requestDetail = $webModel->requestDetail($data);
    require_once('UserRequestUnregisteredView.php');
	
	}
	

}
?>