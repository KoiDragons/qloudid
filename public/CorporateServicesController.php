<?php
	include 'CorporateServicesModel.php';
	include '../configs/utility.php';
	require_once('../AppModel.php');
	class CorporateServicesController
	{
		
		
		public static function index()
		{
			$path="../../";
			
			$model = new CorporateServicesModel();
			
			require_once('CorporateServicesView.php');
			
		}
		
		
		
		
		
	}
?>