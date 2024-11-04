<?php

	require_once 'ConnectedEmployeeModel.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class ConnectedEmployeeController
	{
		
	
		
		public static function employeesList($a=null)
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
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model       = new ConnectedEmployeeModel();
				$updateAdmin    = $model->updateAdmin($data);
				$checkPermission    = $model->checkPermission($data);
				//echo $checkPermission; die;
				if($checkPermission ==0)
				{
					header("location:https://www.qloudid.com/user/index.php/ReceivedRequest");
				}
				$selectIcon    = $model->selectIcon($data);
				$employeeDetail    = $model->employeeDetail($data);
				$employeeID    = $model->employeeID($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				
				$model1       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model1->adminRequestReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('ConnectedEmployeeView.php');
			}
		}
		
		
		public static function moreEmployeeDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				echo '<script> window.location.href="https://www.qloudid.com/error404.php"; </script>'; die;
				}
				$model       = new ConnectedEmployeeModel();
				
				$moreEmployeeDetail    = $model->moreEmployeeDetail($data);
				
				echo $moreEmployeeDetail; die;
			}
		}
		
		public static function checkStatus()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
					echo 1; die;
			}
		}
		
		
		public static function generateEmployeeQuard($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
			
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model       = new ConnectedEmployeeModel();
				require_once('../configs/testMandril.php');
				$generateEmployeeQuard    = $model->generateEmployeeQuard($data);
				
				header("location:../employeesList/".$data['cid']);
			}
		}
		
		public static function sendInvitation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
			
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model       = new ConnectedEmployeeModel();
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$sendInvitation    = $model->sendInvitation($data);
				
				header("location:../employeesList/".$data['cid']);
			}
		}
		
			public static function removeEmployeeQuard($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model       = new ConnectedEmployeeModel();
				
				$removeEmployeeQuard    = $model->removeEmployeeQuard($data);
				
				echo $removeEmployeeQuard; die;
			}
		}
		
		public static function generateCode($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new ConnectedEmployeeModel();
				$generateCode    = $model->generateCode($data);
				
				echo $generateCode; die;
			}
		}
		
	}
?>