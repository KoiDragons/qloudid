<?php
	require_once 'ConnectionsExploreAppsModel.php';
	require_once '../company/EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class ConnectionsExploreAppsController
	{
		
		
		
		public static function exploreAccount($a=null)
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
				$model1       = new ConnectionsExploreAppsModel();
				$country    = $model1->countryList($data);
				$industry    = $model1->industryList($data);
			
				$companyDetail    = $model1->companyDetail($data);
				$aboutUsCount    = $model1->aboutUsCount($data);
				$getLinkid    = $model1->getLinkid($data);
				
				$row_summary    = $model1->userSummary($data);
				require_once('ConnectionsExploreAppsView.php');
			}
		}
		
	
	
	
	}
?>