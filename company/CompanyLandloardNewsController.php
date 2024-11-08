<?php
	require_once 'CompanyLandloardNewsModel.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class CompanyLandloardNewsController
	{
		
	
		
		public static function tenantAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['tid']=cleanMe($a);
				$model1       = new CompanyLandloardNewsModel();
				$tenantDetail    = $model1->tenantDetail($data);
				$data['cid']=$tenantDetail['cid'];
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new CompanyLandloardNewsModel();
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('CompanyLandloardNewsView.php');
			}
		}
		
	
	}
?>