<?php
	require_once 'PublicLostandFoundModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class PublicLostandFoundController
	{
		
		
		public static function index()
		{
			
				$path = "../../";
				
				require_once('PublicLostandFoundView.php');
		}
		
		
		
		
		public static function sendInformation($a=null)
		{
			
			$model = new PublicLostandFoundModel();
			$sendInformation = $model->sendInformation();
			echo $sendInformation; die;
		}	
		
	}
?>