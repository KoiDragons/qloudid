<?php
	require_once 'SecurityLevelModel.php';
	require_once '../company/EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class SecurityLevelController
	{
		
		
		public static function index()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:LoginAccount");
				} else {
				$path = "../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new SecurityLevelModel();
				$resultOrg    = $model1->userAccount($data);
				$completedEmployeeRequests    = $model1->completedEmployeeRequests($data);
				$resultOrg1    = $model1->employeeAccount($data);
				$row_summary    = $model1->userSummary($data);
				require_once('SecurityLevelView.php');
			}
		}
		
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
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model1       = new SecurityLevelModel();
				$country    = $model1->countryList($data);
				$industry    = $model1->industryList($data);
				//$resultOrg    = $model1->userAccount($data);
				$companyDetail    = $model1->companyDetail($data);
				//print_r($companyDetail); die;
				//$completedEmployeeRequests    = $model1->completedEmployeeRequests($data);
				//$resultOrg1    = $model1->employeeAccount($data);
				$row_summary    = $model1->userSummary($data);
				require_once('SecurityLevelView.php');
			}
		}
		public static function shared($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:/../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				require_once('NewsfeedView.php');
			}
		}
		
		public static function updateDataPost($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($co);
				$model1       = new SecurityLevelModel();
				
				$result    = $model1->updateDataPost($data);
				echo $result; die;
			}
		}
		
		public static function updateDataPostNew($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($co);
				$model1       = new SecurityLevelModel();
				
				$result    = $model1->updateDataPostNew($data);
				echo $result; die;
			}
		}
		
		public static function updateDataPostSupplier($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($co);
				$model1       = new SecurityLevelModel();
				
				$result    = $model1->updateDataPostSupplier($data);
				echo $result; die;
			}
		}
		
		public static function updateDataPhone($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($co);
				$model1       = new SecurityLevelModel();
				
				$result    = $model1->updateDataPhone($data);
				echo $result; die;
			}
		}
		
		public static function updateImage($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($co);
				$model1       = new SecurityLevelModel();
				
				$result    = $model1->updateImage($data);
				header("location:../companyAccount/".$data['cid']);
			}
		}
		
		public static function updateData($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($co);
				$model1       = new SecurityLevelModel();
				
				$result    = $model1->updateData($data);
				echo $result; die;
			}
		}
		
		public static function updateDataBank($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($co);
				$model1       = new SecurityLevelModel();
				
				$result    = $model1->updateDataBank($data);
				echo $result; die;
			}
		}
	}
?>