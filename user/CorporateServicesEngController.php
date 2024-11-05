<?php
	include 'CorporateServicesEngModel.php';
	include '../configs/utility.php';
	require_once('../AppModel.php');
	class CorporateServicesEngController
	{
		
		
		public static function index()
		{
			$path="../../";
			
			$model = new CorporateServicesEngModel();
			
			require_once('CorporateServicesEngView.php');
			
		}
		
		
		
		
		
	}
?>