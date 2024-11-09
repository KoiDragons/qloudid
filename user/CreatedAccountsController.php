<?php
	require_once 'CreatedAccountsModel.php';
	require_once '../configs/utility.php';
	class  CreatedAccountsController
	{
		
		
		public static function index()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path         = "../../";
				$model = new  CreatedAccountsModel();
                $data['user_id']=$_SESSION['user_id'];
				$eventCount = $model->eventCount($data); 
				$userEvents = $model->userEvents($data); 
				$row_summary = $model->userSummary($data);	
				
				require_once('CreatedAccountsView.php');
			}
		}
		
		
		public static function moreEvents($a = null, $b=null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
			$model = new  CreatedAccountsModel();
			$data=array();
			//session_start();
			$data['user_id']=cleanMe($a);
			$resultl = $model->moreEvents($data);
			echo $resultl; die;
			
		}
        
		}
		
		
	}
    
	
	
?>