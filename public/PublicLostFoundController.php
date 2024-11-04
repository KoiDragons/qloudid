<?php
	require_once 'PublicLostFoundModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class PublicLostFoundController
	{
		
		
		public static function index()
		{
			
				$path = "../../";
				$model = new PublicLostFoundModel();
				$resultContry = $model->selectCountry();
				require_once('PublicLostFoundItemView.php');
		}
		
		public static function addMoreInfo($a=null)
		{
			$path = "../../../";
			$model = new PublicLostFoundModel();
			if(isset($_POST['indexing_save']))
			{
			$resultContry = $model->selectCountry();
			require_once('PublicLostFoundView.php');
			}
			else
			{
			header('location:../PublicLostFound');
			}				
			
		}	
		
		public static function thanksForInformation($a=null)
		{
			$path = "../../../";
			$model = new PublicLostFoundModel();
			 
			$resultContry = $model->selectCountry();
			require_once('PublicLostFoundThanksView.php');
			
			 
		}
		public static function reportFound($a=null)
		{
			
			$model = new PublicLostFoundModel();
			$reportFound = $model->reportFound();
			header('location:thanksForInformation');
		}	
	}
?>