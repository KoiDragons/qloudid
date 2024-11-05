<?php
	require_once 'PublicFastigheterModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');

	class PublicFastigheterController
	{
		
		
		public static function index()
		{
			$path = "../../";
			require_once('PublicFastigheterView.php');
			
		}
		
	
		
	}
?>