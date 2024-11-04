<?php
	require_once 'ParkeringModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class ParkeringController
	{
		
		
			public static function changeLanguage()
		{
				$model = new ParkeringModel();
				$changeLanguage = $model->changeLanguage();	
				echo $changeLanguage; die;	
		}
		
		public static function parkingInfo($a=null)
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
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				
				
				$model       = new ParkeringModel();
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				
				$licensePlateInfo    = $model->licensePlateInfo($data);
				
				$plateCount    = $model->plateCount($data);
				$licensePlateLeftInfo    = $model->licensePlateLeftInfo($data);
				
				$plateLeftCount    = $model->plateLeftCount($data);
				$row_summary    = $model->userSummary($data);
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('ParkeringView.php');
			}
		}
		
			public static function plateInfo($a=null)
		{
			
			$path = "../../../../";
			$data=array();
			
			$data['cid']=cleanMe($a);
			
			$model1       = new ParkeringModel();
			$verifyIP    = $model1->verifyIP($data);
			$resultContry    = $model1->countryOption($data);
			$parkeringBg    = $model1->parkeringBg($data);
			$corporateColor    = $model1->corporateColor($data);
			$companyDetail    = $model1->companyDetail($data);
			$verifyLanguage=$model1->verifyLanguage();
			$data['comp_id']    = $model1->selectWhitelistCompany($data);
			$data['comp_name']    = $model1->selectWhitelistCompanyName($data);
			$checkOpenStatus    = $model1->checkOpenStatus($data);
				if($checkOpenStatus==0)
				{
				header('location:../../Company/openDay/'.$data['cid']);	 die;
				}
				else 
				{
			if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else
			{
			require_once('LicensePlateView.php');
			}
				}
		}
		public static function thanksVisiting($a=null)
		{
			
				$data=array();
				$path = "../../../../";
				$data['cid']=cleanMe($a);
				$model = new ParkeringModel();
				$verifyLanguage=$model->verifyLanguage();
				$corporateColor    = $model->corporateColor($data);
				$companyDetail=$model->companyDetail($data);
				$verifyIP    = $model->verifyIP($data);
				$checkOpenStatus    = $model->checkOpenStatus($data);
				if($checkOpenStatus==0)
				{
				header('location:../../Company/openDay/'.$data['cid']);	 die;
				}
				else 
				{
			if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else
			{
				require_once('ParkeringThanksView.php');
				
			}
				}
		}
		
		
		
		public static function moreLicensePlateInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new ParkeringModel();
				$moreLicensePlateInfo = $model->moreLicensePlateInfo($data);
				echo $moreLicensePlateInfo; die;
			}
		}
		
		public static function moreLicensePlateLeftInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new ParkeringModel();
				$moreLicensePlateLeftInfo = $model->moreLicensePlateLeftInfo($data);
				echo $moreLicensePlateLeftInfo; die;
			}
		}
		public static function enterInParking($a = null,$b=null)
		{
			
				$data['cid']=cleanMe($a);
				
				$model = new ParkeringModel();
				
				$enterInParking    = $model->enterInParking($data);
				echo $enterInParking; die;
			
		}
		
		public static function updateParkering($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new ParkeringModel();
				$updateParkering = $model->updateParkering($data);
				header("location:../parkingInfo/".$data['cid']);
			}
		}
		
	}
?>