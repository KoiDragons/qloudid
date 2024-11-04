<?php
	require_once 'SecurityLevelModel.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class SecurityLevelController
	{
	
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
				$model1       = new SecurityLevelModel();
				$companyDetail    = $model1->companyDetail($data);
				$data['country_id']=$companyDetail['country_id'];
				$countryInfo    = $model1->countryInfo($data);
				
				if($countryInfo>0)
				{
				
				$getMandatoryApps    = $model1->getMandatoryApps($data);
				
				}
				$row_summary    = $model1->userSummary($data);
				$headQuarterID    = $model1->headQuarterID($data);
				require_once('SecurityLevelView.php');
			}
		}
	}
?>