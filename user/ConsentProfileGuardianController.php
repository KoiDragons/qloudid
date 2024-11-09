<?php
	require_once 'ConsentProfileGuardianModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class ConsentProfileGuardianController
	{
		 
		 
		
		public static function dependentAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['did']=cleanMe($a);
				$model1       = new ConsentProfileGuardianModel();
				$dependentDetail    = $model1->dependentDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('ConsentProfileGuardianView.php');
			}
		}
		
		 
	}
?>