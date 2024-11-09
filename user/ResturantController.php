<?php
	
	require_once 'ResturantModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class ResturantController
	{
		 
	 public static function menuInformation($a=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new ResturantModel();
				$data=array();
				$data['rid']=cleanMe($a);
				$resturantinfo    = $model->resturantinfo($data);
				$completeMenu    = $model->completeMenu($data);
				require_once('ResturantMenuListView.php');
			
		}
	 	 
		}
		
		 public static function bookaTable($a=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new ResturantModel();
				$data=array();
				$data['rid']=cleanMe($a);
				$resturantDiningHall    = $model->resturantDiningHall($data);
				$resturantWorkInfo    = $model->resturantWorkInfo($data);
				require_once('ResturantBookTableInfoView.php');
			
		}
	 	 
		}
		
		
		public static function getTime($a=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$model       = new ResturantModel();
				$data=array();
				$data['rid']=cleanMe($a);
				$resturantTableAvailable    = $model->resturantTableAvailable($data);
				echo $resturantTableAvailable; die;
			
		}
	 	 
		}
		
		public static function requestTableBooking($a=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$model       = new ResturantModel();
				$data=array();
				$data['rid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$requestTableBooking    = $model->requestTableBooking($data);
				header("location:../bookaTable/".$data['rid']);
			
		}
	 	 
		}
	}
?>