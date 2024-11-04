<?php
	require_once 'ForloratOchUpphittatModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class ForloratOchUpphittatController
	{
		
		
		public static function index()
		{
			
		}
		
		public static function forloratInfo($a=null)
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
				
				
				$model       = new ForloratOchUpphittatModel();
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$lostandFoundCount    = $model->lostandFoundCount($data);
				$lostandFoundDetail    = $model->lostandFoundDetail($data);
				
				$forloradCount    = $model->forloradCount($data);
				$forloradDetail    = $model->forloradDetail($data);
				$row_summary    = $model->userSummary($data);
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('ForloratOchUpphittatView.php');
			}
		}
		
		public static function updateFound($a=null,$b=null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['id']=cleanMe($b);
				$data['user_id']=$_SESSION['user_id'];
				$model       = new ForloratOchUpphittatModel();
				$itemDetail    = $model->itemDetail($data);
				  
				require_once('ForloratOchUpphittatFoundView.php');
			}	
		}
		public static function checkStatus($a=null,$b=null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['id']=cleanMe($b);
				$data['user_id']=$_SESSION['user_id'];
				$model       = new ForloratOchUpphittatModel();
				 
				$row_summary    = $model->userSummary($data);
				 
				require_once('ForloratOchUpphittatUpdateView.php');
			}	
		}
		public static function moreLostandFoundDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new ForloratOchUpphittatModel();
				$moreLostandFoundDetail = $model->moreLostandFoundDetail($data);
				echo $moreLostandFoundDetail; die;
			}
		}
		public static function moreForloradDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new ForloratOchUpphittatModel();
				$moreForloradDetail = $model->moreForloradDetail($data);
				echo $moreForloradDetail; die;
			}
		}
		
		public static function updateLostValue($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['id']=cleanMe($b);
				$model = new ForloratOchUpphittatModel();
				$updateLostValue = $model->updateLostValue($data);
				header("location:../../forloratInfo/".$data['cid']);
			}
		}
		
			public static function reportLost($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['id']=cleanMe($b);
				$data['user_id']=$_SESSION['user_id'];
				$model = new ForloratOchUpphittatModel();
				$reportLost = $model->reportLost($data);
				header("location:../../forloratInfo/".$data['cid']);
			}
		}
	}
?>