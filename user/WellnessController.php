<?php
	
	require_once 'WellnessModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class WellnessController
	{
		 
	 public static function menuInformation($a=null)
		{
			  $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new WellnessModel();
				$data=array();
				$data['wid']=cleanMe($a);
				$Wellnessinfo    = $model->wellnessDetailInfo($data);
				$completeServiceInfo    = $model->completeServiceInfo($data);
				require_once('WellnessServiceListView.php');
				}
		}
	 	 
	 
	}
?>