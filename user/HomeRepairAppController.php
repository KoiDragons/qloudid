<?php
	
	require_once 'HomeRepairAppModel.php';
	 
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class HomeRepairAppController
	{
		
	 
		public static function updatePhotos()
		{
			 
				$model1       = new HomeRepairAppModel();
				$data=array();
				 
				$data=$_POST;
				$result    = $model1->updatePhotos($data);
				echo $result; die;
				 
		}
		
		public static function getImageInfo()
		{
			 
				$model1       = new HomeRepairAppModel();
				$data=array();
			 
				$data=$_POST;
				 
				$result    = $model1->getImageInfo($data);
				echo $result; die;
			 
		}
		
		public static function getPhoto()
		{
			 
				$model1       = new HomeRepairAppModel();
				$data=array();
				 
				$data=$_POST;
				 
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				
		}
		
		public static function updatePhotoOrder()
		{
			 
				$model1       = new HomeRepairAppModel();
				$data=array();
			 
				$data=$_POST;
				$result    = $model1->updatePhotoOrder($data);
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				 
		}
		
		public static function deletePhoto()
		{
			 
				$model1       = new HomeRepairAppModel();
				$data=array();
				$data=$_POST;
				$result    = $model1->deletePhoto($data);
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				 
		}
		
		
		public static function updatePhotoDragging()
		{
			  
				$model1       = new HomeRepairAppModel();
				$data=array();
				$data=$_POST;
				$result    = $model1->updatePhotoDragging($data);
				$result    = $model1->displayPhotos($data);
				echo $result; die;
			 
		}
		
		public static function displayPhotos()
		{
			  
				$model1       = new HomeRepairAppModel();
				$data=array();
				$data=$_POST;
				$result    = $model1->displayPhotos($data);
				echo $result; die;
			 
		}
		
		
	 
		
	}
?>