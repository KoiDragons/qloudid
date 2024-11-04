<?php
	require_once 'EmployeeCheckModel.php';
	require_once '../configs/utility.php';
	class EmployeeCheckController
	{
		
		
	
		public static function checkUserAccount($a=null, $b=null)
		{
			
				$data=array();
				$model = new EmployeeCheckModel();
				
				$path         = "../../../";
				$data['user_id']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$checkUser = $model->checkUser($data);
				
				return $checkUser;
			
		}
        
		public static function checkLandloardAccount($a=null, $b=null)
		{
			
				$data=array();
				$model = new EmployeeCheckModel();
				
				$path         = "../../../";
				$data['user_id']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$checkLandloard = $model->checkLandloard($data);
				
				return $checkLandloard;
			
		}
		
	}
    
	
	
?>