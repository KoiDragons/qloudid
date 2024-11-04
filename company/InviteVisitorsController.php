<?php
	require_once 'InviteVisitorsModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class InviteVisitorsController
	{
		
		public static function visitorsInformation($a=null)
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
				$model       = new InviteVisitorsModel();
				$data['cid']=$model->companyID($data);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data);
				$meetingRoomDetail    = $model->meetingRoomDetail($data);
				$resultContry = $model->selectCountry();
				require_once('InviteVisitorsView.php');
			}
		}
		
		
		public static function addVisitor($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				$data['cid']=cleanMe($a);
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				$model = new InviteVisitorsModel();
				
				$addVisitor=$model->addVisitor($data);
				
				echo $addVisitor;
				
			}
		}
		
	
	}
?>