<?php
	require_once 'HomeRepairCompanyModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class HomeRepairCompanyController
	{
		public static function actionDescription($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				
				$model1       = new HomeRepairCompanyModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model1->companyDetail($data);
				require_once('HomeRepairCompanyServiceActionView.php');
			}
		}
		
		 public static function selectServices($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				
				$model1       = new HomeRepairCompanyModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model1->companyDetail($data);
				$homeRepairTodoCount    = $model1->homeRepairTodoCount($data);
				$homeRepairServicesDetail    = $model1->homeRepairServicesDetail($data);
				require_once('HomeRepairCompanyUpdateServicesView.php');
			}
		}
		
		
		 public static function listServices($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				
				$model1       = new HomeRepairCompanyModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model1->companyDetail($data);
				$homeRepairSelectedServicesDetail    = $model1->homeRepairSelectedServicesDetail($data);
				require_once('HomeRepairCompanySelectedServicesView.php');
			}
		}
		
		public static function updateServices($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new HomeRepairCompanyModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($co);
				$result    = $model1->updateServices($data);
				$homeRepairServicesDetail    = $model1->homeRepairServicesDetail($data);
				echo $homeRepairServicesDetail; die;
				}
		}
		
		
		public static function updateSelectedService($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new HomeRepairCompanyModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($co);
				$result    = $model1->updateSelectedService($data);
				$homeRepairServicesDetail    = $model1->homeRepairServicesDetail($data);
				echo $homeRepairServicesDetail; die;
				}
		}
		 
	}
?>