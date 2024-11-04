<?php
	require_once 'ManageLandloardModel.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'CompanyCustomersController.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class ManageLandloardController
	{
		
		
		
		public static function managePermission($a=null)
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
				$model1       = new ManageLandloardModel();
				$updateLandloard   = $model1->updateLandloard($data);
				$checkPermission    = $model1->checkPermission($data);
				if($checkPermission ==0)
				{
					header("location:https://www.qloudid.com/user/index.php/NewsfeedDetail");
				}
				$companyDetail    = $model1->companyDetail($data);
				$employeesDetail    = $model1->employeesDetail($data);
				$employeesCount= $model1->employeesCount($data);
				
				
				$row_summary    = $model1->userSummary($data);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				
				
				require_once('ManageLandloardView.php');
			}
		}
		
		
		
		
		
		public static function moreEmployeeDetail($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ManageLandloardModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['page_id']=1;
				$moreEmployeesDetail = $model->moreEmployeesDetail($data);
				
				echo $moreEmployeesDetail; die;
			}
			
		}
		
		
		public static function moreLandloardDetail($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ManagePermissionsModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['page_id']=1;
				$moreLandloardDetail = $model->moreLandloardDetail($data);
				
				echo $moreLandloardDetail; die;
			}
			
		}
		
		
		
		
		public static function updateLandloardStatus()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ManageLandloardModel();
                $data['user_id']=$_SESSION['user_id'];
				
				$updateLandloardStatus = $model->updateLandloardStatus($data);
				
				echo $updateLandloardStatus; die;
			}
			
		}
	}
?>