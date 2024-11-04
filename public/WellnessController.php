<?php
	
	require_once 'WellnessModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class WellnessController
	{
		 
	 public static function menuInformation($a=null)
		{
			 
				$path = "../../../../";
				$model       = new WellnessModel();
				$data=array();
				$data['wid']=cleanMe($a);
				$Wellnessinfo    = $model->wellnessDetailInfo($data);
				$businessImageDetail    = $model->businessImageDetail($data); 
				$completeServiceInfo    = $model->completeServiceInfo($data);
				require_once('WellnessServiceListView.php');
			
		}
	 	 
	 
	}
?>