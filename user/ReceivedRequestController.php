<?php
	require_once 'ReceivedRequestModel.php';
	require_once 'PersonalRequestsController.php';
	require_once 'ShareMonitorController.php';
	require_once 'ConnectKinController.php';
	require_once '../configs/utility.php';
	class ReceivedRequestController
	{
		
		
		public static function index()
		{
			ini_set('memory_limit', '-1');
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path         = "../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new ReceivedRequestModel();
				$row_summary    = $model1->userSummary($data);
				$rowProfile   = $model1->userProfileSummary($data);
				$data['email']=$row_summary['email'];
				$data['ssn']=$rowProfile['ssn'];
				if($row_summary['get_started_wizard_status']==0 && ($row_summary['first_name']==null || $row_summary['first_name']==""))
				{
					header("location:GetStartedNew");
				}
				else if($row_summary['get_started_wizard_status']==0 && ($row_summary['first_name']!=null || $row_summary['first_name']!=""))
				{
					header("location:UpdateSecurityStatus");
				}
				$countGuardianRequest    = $model1->countGuardianRequest($data);
				$helpAidInfo    = $model1->helpAidInfo($data);
				$peopleInNeed    = $model1->peopleInNeed($data);
				 $itemListDelivereyCount    = $model1->itemListDelivereyCount($data); 
				  
				$employerRequest    = $model1->employerRequest($data);
				$daycareRequest    = $model1->daycareRequest($data);
				$employeementDetail    = $model1->employeementDetail($data);
				$studentDetail    = $model1->studentDetail($data);
				$tenantDetail    = $model1->tenantDetail($data);
				$guardianDetail    = $model1->guardianDetail($data);
				$userProfileDetail    = $model1->userProfileDetail($data);
				$userIsEmployee    = $model1->userIsEmployee($data);
				$userIsStudent    = $model1->userIsStudent($data);
				$userIsLandlord    = $model1->userIsLandlord($data);
				$kinCount    = $model1->kinCount($data);
				$lostfoundCount    = $model1->lostfoundCount($data);
				$countHotelRequest    = $model1->countHotelRequest($data);
				$employeementCount    = $model1->employeementCount($data);
				if($employeementCount['num']==1)
				{
				$employeementCompany    = $model1->employeementCompany($data);	
				}
				if(empty($guardianDetail))
				{
					$ttl=0;
				}
				else
				{
					$ttl=$guardianDetail['num'];
				}
				if(empty($daycareRequest))
				{
					$total=$employerRequest['total']+$ttl;
					$dayTotal=0;
				}
				else 
				{
					$total=$employerRequest['total']+$daycareRequest[0]['total']+$ttl;
					$dayTotal=$daycareRequest[0]['total'];
				}
				 
				require_once('ReceivedRequestView.php');
				 
			}
		}
		
		
		
		public static function verifyEmployeeStatus()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new ReceivedRequestModel();
				$row_summary    = $model1->userSummary($data);
				$rowProfile   = $model1->userProfileSummary($data);
				$userProfileDetail    = $model1->userProfileDetail($data);
				if($userProfileDetail==1)
				{
					header('location:verifyLandlordStatus');
				}
				else if($userProfileDetail==2)
				{
					header('location:verifyStudentStatus');
				}
				else if($userProfileDetail==3)
				{
					header('location:../ReceivedRequest');
				}
				else
				{
				require_once('ReceivedEmployeeStatusView.php');	
				}
			}
		}
		
		public static function verifyLandlordStatus()
		{
			$valueNew = checkLogin();
			 
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new ReceivedRequestModel();
				$row_summary    = $model1->userSummary($data);
				
				$rowProfile   = $model1->userProfileSummary($data);
				$userProfileDetail    = $model1->userProfileDetail($data);
				
				if($userProfileDetail==1)
				{
				require_once('ReceivedLandlordStatusView.php');		
				}
				else if($userProfileDetail==2)
				{
					header('location:verifyStudentStatus');
				}
				else if($userProfileDetail==3)
				{
					header('location:../ReceivedRequest');
				}
				else
				{
					header('location:verifyEmployeeStatus');
				
				}
			}
		}
		
		public static function verifyStudentStatus()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new ReceivedRequestModel();
				$row_summary    = $model1->userSummary($data);
				$rowProfile   = $model1->userProfileSummary($data);
				$userProfileDetail    = $model1->userProfileDetail($data);
				if($userProfileDetail==1)
				{
					header('location:verifyLandlordStatus');
					
				}
				else if($userProfileDetail==2)
				{
					require_once('ReceivedStudentStatusView.php');	
				}
				else if($userProfileDetail==3)
				{
					header('location:../ReceivedRequest');
				}
				else
				{
					header('location:verifyEmployeeStatus');
				
				}
			}
		}
		
		
		
		public static function updateStatus($a = null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../LoginAccount");
				} else {
				
				$data=array();
				$data['id']=cleanMe($a);
				$model = new ReceivedRequestModel();
				$data['user_id']=$_SESSION['user_id'];
				$updateStatus = $model->updateStatus($data);	
				
				header('location:../../ReceivedRequest');
			}
			
		}
		
		
		public static function updateIsEmployeeStatus($a = null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				
				$data=array();
				$data['id']=$_POST['ind'];
				 
				$model = new ReceivedRequestModel();
				$data['user_id']=$_SESSION['user_id'];
				$updateIsEmployeeStatus = $model->updateIsEmployeeStatus($data);	
				
				header('location:verifyLandlordStatus');
			}
			
		}
		
		
		public static function updateIsLandlordStatus($a = null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				
				$data=array();
				$data['id']=$_POST['ind'];
				$model = new ReceivedRequestModel();
				$data['user_id']=$_SESSION['user_id'];
				$updateIsLandlordStatus = $model->updateIsLandlordStatus($data);	
				
				header('location:verifyStudentStatus');
			}
			
		}
		
		
		public static function updateIsStudentStatus($a = null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				
				$data=array();
				$data['id']=$_POST['ind'];
				$model = new ReceivedRequestModel();
				$data['user_id']=$_SESSION['user_id'];
				$updateIsStudentStatus = $model->updateIsStudentStatus($data);	
				
				header('location:../ReceivedRequest');
			}
			
		}
	}
	
	
?>