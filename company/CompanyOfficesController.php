<?php
	require_once 'CompanyOfficesModel.php';
	
	require_once '../configs/utility.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	require_once 'EmployeeCheckController.php';
	class CompanyOfficesController
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
				$data['lid']=cleanMe($a);
				$model1       = new CompanyOfficesModel();
				$locationDetail    = $model1->locationDetail($data);
				$data['cid']=$locationDetail['enc'];
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$locationDetail    = $model1->locationDetailnfo($data); 
				$companyDetail    = $model1->companyDetail($data);
				$headQuarterID    = $model1->headQuarterID($data);
				require_once('CompanyOfficesView.php');
			}
		}
		
		
		
	}
    
	
	
?>