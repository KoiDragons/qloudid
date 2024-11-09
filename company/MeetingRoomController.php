<?php

	require_once 'MeetingRoomModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class MeetingRoomController
	{
		
		
		public static function index()
		{
			
		}
		
		public static function roomSpaceInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['lid']=cleanMe($a);
				$model       = new MeetingRoomModel();
				$locationDetail    = $model->locationDetail($data);
				$data['cid']=$locationDetail['enc'];
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				require_once('MeetingRoomView.php');
			}
		}
		
		
		public static function editRoomSpaceInfo($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['lid']=cleanMe($a);
				$model       = new MeetingRoomModel();
				$locationDetail    = $model->locationDetail($data);
				$data['cid']=$locationDetail['enc'];
				$data['id']=cleanMe($b);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$meetingRoomInfo    = $model->meetingRoomInfo($data);
				require_once('MeetingRoomView.php');
			}
		}
		
		public static function roomSpaceDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['lid']=cleanMe($a);
				$model       = new MeetingRoomModel();
				$locationDetail    = $model->locationDetail($data);
				$data['cid']=$locationDetail['enc'];
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				
				$companyDetail    = $model->companyDetail($data);
				$data['country_id']=$companyDetail['country_id'];
				$countryInfo    = $model->countryInfo($data);
				
				if($countryInfo>0)
				{
				
				$getMandatoryApps    = $model->getMandatoryApps($data);
				
				}
				$meetingRoomDetail    = $model->meetingRoomDetail($data);
				$meetingRoomCount    = $model->meetingRoomCount($data);
				
				$row_summary    = $model->userSummary($data);
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('MeetingRoomDetailView.php');
			}
		}
		
		
			public static function moreMeetingRoomDetail($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['lid']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$model = new MeetingRoomModel();
				$moreMeetingRoomDetail = $model->moreMeetingRoomDetail($data);
				echo $moreMeetingRoomDetail; die;
			}
		}
		public static function addMeetingRoom($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			$data=array();
			$data['lid']=cleanMe($a);
			
			$model = new MeetingRoomModel();
			$locationDetail    = $model->locationDetail($data);
			$data['cid']=$locationDetail['enc'];
			$addMeetingRoom = $model->addMeetingRoom($data);
			header("location:../roomSpaceDetail/".$data['lid']);
				}
		}
		
		
		public static function updateRoomSpaceInfo($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			$data=array();
			$data['lid']=cleanMe($a);
			$data['id']=cleanMe($b);
			$model = new MeetingRoomModel();
			$locationDetail    = $model->locationDetail($data);
			$data['cid']=$locationDetail['enc'];
			$updateRoomSpaceInfo = $model->updateRoomSpaceInfo($data);
			header("location:../../roomSpaceDetail/".$data['lid']);
				}
		}
		
	}
?>