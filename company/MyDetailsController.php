<?php
	require_once 'MyDetailsModel.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	class MyDetailsController
	{
		
		
		public static function index()
		{
			$path         = "../../../../";
			
		}
		
		public static function companyAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new MyDetailsModel();
				
				
				$companyDetail    = $model1->companyDetail($data);
				//print_r($companyDetail); die;
				$verificationId    = $model1->verificationId($data);
				$row_summary    = $model1->userSummary($data);
				require_once('MyDetailsView.php');
			}
		}
		
		
		
		
	}
    
	
	
?>