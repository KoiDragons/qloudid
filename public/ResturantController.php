<?php
	
	require_once 'ResturantModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class ResturantController
	{
		 
	 public static function menuInformation($a=null)
		{
			 
				$path = "../../../../";
				$model       = new ResturantModel();
				$data=array();
				$data['rid']=cleanMe($a);
				$businessImageDetail    = $model->businessImageDetail($data); 
				$resturantinfo    = $model->resturantinfo($data);
				$resturantWorkInfo    = $model->resturantWorkInfo($data);
				$completeMenu    = $model->completeMenu($data);
				require_once('ResturantMenuListView.php');
			
		}
	 	 
	 
	}
?>