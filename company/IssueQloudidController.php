<?php
	require_once 'IssueQloudidModel.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	
	class IssueQloudidController
	{
		
		
		public static function index()
		{
			
		}
		
		public static function qloudAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				require_once('IssueQloudidView.php');
			}
		}
		
		
		
	}
?>