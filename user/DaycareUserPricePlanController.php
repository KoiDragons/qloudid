<?php
	require_once 'DaycareUserPricePlanModel.php';
	 require_once '../configs/utility.php';
	class DaycareUserPricePlanController
	{
		
		
		
			public static function planAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['did']=cleanMe($a);
				
				 
				$model       = new DaycareUserPricePlanModel();
				$planDetails    = $model->planDetails($data);
				if($planDetails==1)
				{
				header("location:../../NewsfeedDetail");	
				die;	
				}
				$row_summary    = $model->userSummary($data);
				require_once('DaycareUserPricePlanView.php');
			}
		}
		
			public static function planDetails($a=null)
		{
			$valueNew = checkLogin();
			 
			if ($valueNew == 0) {
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$model = new DaycareUserPricePlanModel();
				$data['user_id']=$_SESSION['user_id'];
				$data['did']=cleanMe($a);
				$planDetails = $model->planDetails($data);
				return $planDetails;
			}
		}
		
			public static function daycareTimelapsed($a=null)
		{
			$valueNew = checkLogin();
			 
			if ($valueNew == 0) {
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$model = new DaycareUserPricePlanModel();
				$data['user_id']=$_SESSION['user_id'];
				$data['did']=cleanMe($a);
				 
				$daycareTimelapsed = $model->daycareTimelapsed($data);
				return $daycareTimelapsed;
			}
		}
		 
		
		public static function lockFreePlan($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['did']=cleanMe($a);
				$model       = new DaycareUserPricePlanModel();
				$planDetails    = $model->planDetails($data);
				if($planDetails==1)
				{
				header("location:../../NewsfeedDetail");	
				die;	
				}
				$lockFreePlan = $model->lockFreePlan($data);	
				header("location:../../NewsfeedDetail");
			}	
		}
		
	}
    
	
	
?>