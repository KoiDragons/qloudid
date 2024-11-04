<?php
	require_once 'ReceptionistModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class ReceptionistController
	{
		
		
		public static function index()
		{
			
		}
		
		public static function workInfo($a=null)
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
				
				
				$model       = new ReceptionistModel();
				
				$companyDetail    = $model->companyDetail($data);
				
				$receptionistDetail    = $model->receptionistDetail($data);
				$receptionistCount    = $model->receptionistCount($data);
				$receptionistDetailManaged    = $model->receptionistDetailManaged($data);
				$receptionistCountManaged    = $model->receptionistCountManaged($data);
				
				$row_summary    = $model->userSummary($data);
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('ReceptionistView.php');
			}
		}
		
		
		public static function companyDetail($a=null)
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
				require_once('ReceptionistCompanyView.php');
			}
		}
		
		
		public static function sendInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			$data=array();
			$data['cid']=cleanMe($a);
			include('../configs/testMandril.php');
			$model = new ReceptionistModel();
			$sendInformation = $model->sendInformation($data);
			echo $sendInformation; die;
				}
		}
		
		public static function moreReceptionistDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new ReceptionistModel();
				$moreReceptionistDetail = $model->moreReceptionistDetail($data);
				echo $moreReceptionistDetail; die;
			}
		}
		
		public static function moreReceptionistDetailManaged($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new ReceptionistModel();
				$moreReceptionistDetailManaged = $model->moreReceptionistDetailManaged($data);
				echo $moreReceptionistDetailManaged; die;
			}
		}
		
		public static function setManaged($a = null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['vid']=cleanMe($b);
				$model = new ReceptionistModel();
				
				$setManaged    = $model->setManaged($data);
				header("location:../../workInfo/".$data['cid']);
			}
		}
	}
?>