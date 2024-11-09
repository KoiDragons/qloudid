<?php
	require_once 'CompanyOmOssModel.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class CompanyOmOssController
	{
		
	
		public static function companyAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model1       = new CompanyOmOssModel();
				$companyAboutus    = $model1->companyAboutus($data);
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('CompanyOmOssView.php');
			}
		}
		
	
		
	}
?>