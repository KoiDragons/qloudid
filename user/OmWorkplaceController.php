<?php
include 'OmWorkplaceModel.php';
include 'utility.php';
require_once('../AppModel.php');
class OmWorkplaceController
{
    
    
    public static function index()
    {
		$path="../../../../";
		 
		 $model = new OmWorkplaceModel();
		 
		require_once('OmWorkplaceView.php');
    
	}
	
	
	
    
   
}
?>