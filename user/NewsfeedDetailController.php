<?php
	require_once 'NewsfeedDetailModel.php';
	require_once 'PersonalRequestsController.php';
	require_once 'ShareMonitorController.php';
	require_once 'ConnectKinController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class NewsfeedDetailController
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
				$model1       = new NewsfeedDetailModel();
				$resultOrg    = $model1->userAccount($data);
				//$completedEmployeeRequests=$model1->completedEmployeeRequests($data);
				$resultOrg1    = $model1->employeeAccount($data);
				$row_summary    = $model1->userSummary($data);
				if($row_summary['get_started_wizard_status']==0)
				{
					header("location:GetStartedNew");
				}
				$data['country_id']=$row_summary['country_of_residence'];
				$countryInfo    = $model1->countryInfo($data);
				if($countryInfo>0)
				{
				$getPermissionDetail    = $model1->getPermissionDetail($data);
				$getMandatoryApps    = $model1->getMandatoryApps($data); 
				 //print_r($getMandatoryApps); die;
				}
				 
				$model2 = new PersonalRequestsController();
				$receivedRequestsUser = $model2->receivedRequestsUser();
				$model3 = new ConnectKinController();
				$connectAccountReceivedCount = $model3->connectAccountReceivedCount();
				$model4 = new ShareMonitorController();
				$receivedAllCount = $model4->receivedAllCount();
				require_once('NewsfeedDetailView.php');
			}
		}
		public static function productPage($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewsfeedDetailModel();
				$row_summary    = $model1->userSummary($data);
				if($row_summary['get_started_wizard_status']==0)
				{
					header("location:GetStartedNew");
				}
				$data['country_id']=$row_summary['country_of_residence'];
				$countryInfo    = $model1->countryInfo($data);
				
				if($countryInfo>0)
				{
				$getAppsPermissionDetail    = $model1->getAppsPermissionDetail($data);
				}
				else
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				
				require_once('PersonalProductPageView.php');
			}
		}
		
		public static function searchCompanyDetail($c = null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$webModel = new NewsfeedDetailModel();
				
				//print_r($_POST); die;
				if (isset($_POST)) {
					$resultWeb = $webModel->searchCompanyDetail();
				}
				
				echo $resultWeb;
				die;
			}
		}
		public static function shared($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				require_once('NewsfeedView.php');
			}
		}
		
		public static function updateEmployeeDetail($a = null , $b=null ,$c=null, $d=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				//print_r($_POST); die;
				$model = new NewsfeedDetailModel();
				$data['user_id']=$_SESSION['user_id'];
				$rowsummary = $model->updateEmployeeDetail($data);	
				
				header('location:../NewsfeedDetail');
			}
			
		}
		
		public static function searchUserDetail($a = null , $b=null ,$c=null, $d=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
			echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../";
				$data=array();
				$model = new NewsfeedDetailModel();
				$data['user_id']=$_SESSION['user_id'];
				require_once('../configs/testMandril.php');
				$searchUserDetail = $model->searchUserDetail($data);	
				
				echo $searchUserDetail; die;
			}
			
		}
			public static function downloadApp($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model1       = new NewsfeedDetailModel();
				$downloadApp    = $model1->downloadApp($data);
				header('location:../../NewsfeedDetail');
			}
		}
		
		
	}
?>