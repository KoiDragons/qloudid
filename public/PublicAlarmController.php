<?php
	
	require_once 'PublicAlarmModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class PublicAlarmController
	{
		 
	 public static function sendInformation($a=null)
		{
			 $valueNew = checkLogin();
			  
				$path = "../../../../";
				$model       = new PublicAlarmModel();
				$data=array();
				$data['cid']=cleanMe($a);
				require_once('PublicAlarmView.php');
			
		}
	 	 
	 
	}
?>