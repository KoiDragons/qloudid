<?php
	require_once 'AddVirtualCompanyModel.php';
	require_once '../configs/utility.php';
	class AddVirtualCompanyController
	{
		
	
		public static function addVirtualCompanyDetail()
		{ 
		
				$model = new AddVirtualCompanyModel();
				$data=array();
				$data['location'] = "Headquarter";
				
				$result    = $model->addVirtualCompanyDetail($data);
				
				
			
		}
		
		
	}
	
	
?>