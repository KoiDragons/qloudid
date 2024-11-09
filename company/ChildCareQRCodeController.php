<?php
	require_once 'ChildCareQRCodeModel.php';
	require_once 'EmployeeCheckController.php';
	
	require_once '../configs/utility.php';
	class ChildCareQRCodeController
	{
		
		
		
			public static function childCareAccount($a=null)
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
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new ChildCareQRCodeModel();
				$coporateColorDetail    = $model->coporateColorDetail($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				$selectIcon    = $model->selectIcon($data);
				require_once('ChildCareQRCodeView.php');
			}
		}
		
		
		
		
	}
    
	
	
?>