<?php
	require_once 'EmployeeVisitorsModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class EmployeeVisitorsController
	{
		
		
		public static function index()
		{
			
		}
		
		
		public static function visitorInfo($a=null)
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
				
				
				$model       = new EmployeeVisitorsModel();
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$visitingEmployee    = $model->visitingEmployee($data);
				$visitingCountEmployee    = $model->visitingCountEmployee($data);
				
				$row_summary    = $model->userSummary($data);
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('EmployeeVisitorsView.php');
			}
		}
		
	public static function invitationInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['eid']=cleanMe($a);
				$model       = new EmployeeVisitorsModel();
				$data['cid']    = $model->getCompany($data);
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data);
				$selectIcon    = $model->selectIcon($data);
				$invitedVisitors    = $model->invitedVisitors($data);
				
				$invitationCount    = $model->invitationCount($data);
				$row_summary    = $model->userSummary($data);
				require_once('EmployeeInvitedVisitorsView.php');
			}
		}
		
		
		
			public static function moreVisitingDetailEmployee($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model = new EmployeeVisitorsModel();
				$moreVisitingDetailEmployee = $model->moreVisitingDetailEmployee($data);
				echo $moreVisitingDetailEmployee; die;
			}
		}
		
	}
?>