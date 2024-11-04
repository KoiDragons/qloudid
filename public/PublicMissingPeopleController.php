<?php
	require_once 'PublicMissingPeopleModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class PublicMissingPeopleController
	{
		
		
		public static function index()
		{
			
				$path = "../../";
				$model = new PublicMissingPeopleModel();
				$resultContry = $model->selectCountry();
				$resultContry1 = $model->selectCountry1();
				require_once('PublicMissingPeopleView.php');
		}
		
		
		public static function addperson()
		{
			
			$model = new PublicMissingPeopleModel();
			 
			require_once('../configs/smsMandril.php'); 
			$addperson = $model->addperson();
			
            header('location:../PublicMissingPeople');
			
		}	
		
		 	 
	}
?>