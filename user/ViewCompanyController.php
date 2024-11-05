<?php
	require_once 'ViewCompanyModel.php';
	require_once '../company/EmployeeCheckController.php';
	require_once '../configs/utility.php';
	class ViewCompanyController
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
				$model1       = new ViewCompanyModel();
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$companyDetail    = $model1->companyDetail($data);
				$verificationId    = $model1->verificationId($data);
				$row_summary    = $model1->userSummary($data);
				require_once('ViewCompanySuppliersView.php');
			}
		}
		
		
		
		
	}
    
	
	
?>