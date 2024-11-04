<?php
require_once 'SafeqidModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class SafeqidController
{
   
	
	public static function welcomeGuest($a=null)
		{
			
            $path         = "../../../../";
			$data=array();
			
			$data['cid']=cleanMe($a);
			
			$model = new SafeqidModel();
			 
			$resultContry    = $model->countryOption($data);
			$companyDetail    = $model->companyDetail($data);
			require_once('SafeqidView.php');
			
		}
	

}
?>