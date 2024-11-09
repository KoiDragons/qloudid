<?php
	require_once 'IssuesafeqloudModel.php';
	require_once '../company/EmployeeCheckController.php';
	require_once '../configs/utility.php';
	
	class IssuesafeqloudController
	{
		
		
		public static function index()
		{
			
		}
		
		public static function qloudAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model1       = new IssuesafeqloudModel();
				$resultOrg    = $model1->userAccount($data);
				//	$completedEmployeeRequests=$model1->completedEmployeeRequests($data);
				$resultOrg1    = $model1->employeeAccount($data);
				$row_summary    = $model1->userSummary($data);
				
				require_once('IssuesafeqloudView.php');
			}
		}
		
		
		
	}
?>