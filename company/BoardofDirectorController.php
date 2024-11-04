<?php
	require_once 'BoardofDirectorModel.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'CompanyCustomersController.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class BoardofDirectorController
	{
		
		
		
		public static function memberInfo($a=null)
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
				$data['page_id']=1;
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				$model1       = new BoardofDirectorModel();
				$updateAdmin   = $model1->updateAdmin($data);
				$checkPermission    = $model1->checkPermission($data);
				if($checkPermission ==0)
				{
					header("location:https://www.qloudid.com/user/index.php/NewsfeedDetail");
				}
				$memberCount   = $model1->memberCount($data);
				
				$memberCountAdded   = $model1->memberCountAdded($data);
				$memberCountApproved   = $model1->memberCountApproved($data);
				$memberCountRejected   = $model1->memberCountRejected($data);
				$memberDetail    = $model1->memberDetail($data);
				$memberDetailApproved    = $model1->memberDetailApproved($data);
				$memberDetailRejected    = $model1->memberDetailRejected($data);
				$companyDetail    = $model1->companyDetail($data);
				$data['country_id']=$companyDetail['country_id'];
				$data['aid']=$model1->getAppsInfo($data);
				$row_summary    = $model1->userSummary($data);
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				
				
				require_once('BoardofDirectorView.php');
			}
		}
		
		
		public static function memberDetail($a=null)
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
				$data['page_id']=1;
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				$model1       = new BoardofDirectorModel();
				$updateAdmin   = $model1->updateAdmin($data);
				$checkPermission    = $model1->checkPermission($data);
				if($checkPermission ==0)
				{
					header("location:https://www.qloudid.com/user/index.php/NewsfeedDetail");
				}
				$memberCount   = $model1->memberCount($data);
				$directorCount   = $model1->directorCount($data);
				$bmemberCount   = $model1->bmemberCount($data);
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				$resultContry    = $model1->countryList($data);
				
				require_once('BoardofDirectorDetailView.php');
			}
		}
		
		public static function checkEmail($a=null)
		{
			$valueNew = checkLogin();
			
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$model = new BoardofDirectorModel();
				
				$path         = "../../../";
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$checkEmail = $model->checkEmail($data);
				
				echo $checkEmail; die;
			}
		}
		public static function checkPhone($a=null)
		{
			$valueNew = checkLogin();
			
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$model = new BoardofDirectorModel();
				
				$path         = "../../../";
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$checkPhone = $model->checkPhone($data);
				
				echo $checkPhone; die;
			}
		}
		public static function addMember($a=null)
		{
			$valueNew = checkLogin();
			
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$model = new BoardofDirectorModel();
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$path         = "../../../";
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$addMember = $model->addMember($data);
				
				header('location:../memberInfo/'.$data['cid']);
			}
		}
		}
?>