<?php
	require_once 'CompanyLocationCrisisTeamModel.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	require_once '../company/EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class CompanyLocationCrisisTeamController
	{
		
		public static function memberInformation($a=null)
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
				$model1       = new CompanyLocationCrisisTeamModel();
				$locationDetail    = $model1->locationDetail($data);
				$data['cid']=$locationDetail['cid'];
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				
				$employeeInformation    = $model1->employeeInformation($data);
				$teamInformation    = $model1->teamInformation($data);
				$row_summary    = $model1->userSummary($data);
				$headQuarterID    = $model1->headQuarterID($data);
				$companyDetail    = $model1->companyDetail($data);
				$data['country_id']=$companyDetail['country_id'];
				$countryInfo    = $model1->countryInfo($data);
				
				if($countryInfo>0)
				{
				
				$getMandatoryApps    = $model1->getMandatoryApps($data);
				
				}
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('CompanyLocationCrisisTeamView.php');
			}
		}
		
		public static function moreEmployeeInformation($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['lid']=cleanMe($co);
				$model1       = new CompanyLocationCrisisTeamModel();
				
				$result    = $model1->moreEmployeeInformation($data);
				echo $result; die;
			}
		}
		
			public static function moreTeamInformation($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['lid']=cleanMe($co);
				$model1       = new CompanyLocationCrisisTeamModel();
				
				$result    = $model1->moreTeamInformation($data);
				echo $result; die;
			}
		}
		
		public static function updateTeamMember($a = null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				$data['lid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$model1       = new CompanyLocationCrisisTeamModel();
				
				$result    = $model1->updateTeamMember($data);
				header("location:../../memberInformation/".$data['lid']);
			}
		}
		
	}
?>