<?php
//require_once 'AdminServicesModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class AdminServicesController
{
    
    
    public function index()
    {
		$path  = "../../../../../";
		$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:LoginAdmin");
        }
		else { 
		$path="../../";
		require_once('AdminServicesView.php');
    }
	
	} 
}
?>