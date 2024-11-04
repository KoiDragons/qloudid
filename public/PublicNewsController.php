<?php
	require_once 'PublicNewsModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');

	class PublicNewsController
	{
		
		
		public static function index()
		{
			$path = "../../";
			require_once('PublicNewsView.php');
			
		}
		
	
		
	}
?>