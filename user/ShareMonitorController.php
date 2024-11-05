<?php
	require_once 'ShareMonitorModel.php';
	require_once 'PersonalRequestsController.php';
	require_once 'ConnectKinController.php';
	require_once '../configs/utility.php';
	require_once '../company/BusinessEventController.php';
	
	class ShareMonitorController
	{
		
		
		public static function index()
		{
			$path         = "../../../../";
			require_once('ShareMonitorView.php');
		}
		
		public static function shareMonitorShow($a=null)
		{
			$valueNew = checkLogin();
			$model1 = new ShareMonitorModel();
			if ($valueNew == 0) {
				$path = "../../../../";
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$data=array();
				$model = new ShareMonitorModel();
				if(isset($a))
				{
					$path         = "../../../../";
					$data['user_id']=cleanMe($a);
					$data['us']=0;
				}
				else{
					//echo "hello"; die;
					$path         = "../../../";
					$data['user_id']=$_SESSION['user_id'];
					$data['us']=1;
				}
				//print_r($data); die;
				ini_set('memory_limit', '-1');
				$row_summary = $model->userSummary($data);	
				if($row_summary['get_started_wizard_status']==0)
				{
					header("location:../GetStartedNew");
					}
				 
				$rowUser = $model->approveUser($data);
				$approvedContractorInvitation = $model->approvedContractorInvitation($data);
				$rowUserApproved = $model->approvedUser($data);
				$kinRequestApprovedDetail = $model->kinRequestApprovedDetail($data);
				 $kinRequestApprovedCount = $model->kinRequestApprovedCount($data);
				$requestApprovedCount = $model->requestApprovedCount($data);
				$daycareRequestApprovedDetail = $model->daycareRequestApprovedDetail($data);
				$requestDaycareApprovedCount = $model->requestDaycareApprovedCount($data); 
				$requestApprovedCountCustomer = $model->requestApprovedCountCustomer($data);
				
				$rowUserApprovedSuppliers = $model->approvedUserSuppliers($data);
				
				 
				$requestApprovedCountSuppliers = $model->requestApprovedCountSuppliers($data);
				 
				
				$rowUserApprovedTenants = $model->approvedUserTenants($data);
				 
				$requestApprovedCountTenants = $model->requestApprovedCountTenants($data);
				 
				
				$rowUserApprovedStudents = $model->approvedUserStudents($data);
				
				 
				$requestApprovedCountStudents = $model->requestApprovedCountStudents($data);
				 
				
			 
				$approvedMemberRequest = $model->approvedMemberRequest($data);
				
				 
				$approvedMemberRequestCount = $model->approvedMemberRequestCount($data);
				 
				
				$rowP = $model->allCount($data);
				$approveCount = $model->approveCount($data);
				$resultIndus  = $model->selectIndustry();
                $resultContry = $model->selectCountry();
				
				$model1 = new PersonalRequestsController();
				$receivedRequestsUser = $model1->receivedRequestsUser();
				$model2 = new ConnectKinController();
				$connectAccountReceivedCount = $model2->connectAccountReceivedCount();
				require_once('ShareMonitorView.php');
			}
		}
        
		public static function moreDaycareRequestReceivedDetail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new ShareMonitorModel();
				$userSummary = $model->userSummary($data);
				$data['ssn']=$userSummary['ssn'];
				$moreDaycareRequestReceivedDetail = $model->moreDaycareRequestReceivedDetail($data);
				echo $moreDaycareRequestReceivedDetail; die;
			}
		}
		
		public static function moreDaycareRejectedRequestDetail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new ShareMonitorModel();
				$moreDaycareRejectedRequestDetail = $model->moreDaycareRejectedRequestDetail($data);
				echo $moreDaycareRejectedRequestDetail; die;
			}
		}
		
			public static function moreDaycareApprovedRequestDetail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new ShareMonitorModel();
				$moreDaycareApprovedRequestDetail = $model->moreDaycareApprovedRequestDetail($data);
				echo $moreDaycareApprovedRequestDetail; die;
			}
		}
		
		public static function moreApprovedKinRequestDetail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new ShareMonitorModel();
				 
				$moreApprovedKinRequestDetail = $model->moreApprovedKinRequestDetail($data);
				echo $moreApprovedKinRequestDetail; die;
			}
		}
		
		public static function moreRejectedKinRequestDetail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new ShareMonitorModel();
				$moreRejectedKinRequestDetail = $model->moreRejectedKinRequestDetail($data);
				echo $moreRejectedKinRequestDetail; die;
			}
		}
		
			public static function moreSentKinRequestDetail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new ShareMonitorModel();
				$moreSentKinRequestDetail = $model->moreSentKinRequestDetail($data);
				echo $moreSentKinRequestDetail; die;
			}
		}
		public static function moreReceivedKinRequestDetail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new ShareMonitorModel();
				$moreReceivedKinRequestDetail = $model->moreReceivedKinRequestDetail($data);
				echo $moreReceivedKinRequestDetail; die;
			}
		}
		public static function shareMonitorRequestList($a=null)
		{
			$valueNew = checkLogin();
			 
			if ($valueNew == 0) {
				$model1 = new ShareMonitorModel();
				 $data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$data=array();
				$model = new ShareMonitorModel();
				if(isset($a))
				{
					$path         = "../../../../";
					$data['user_id']=cleanMe($a);
					$data['us']=0;
				}
				else{
				 
					$path         = "../../../";
					$data['user_id']=$_SESSION['user_id'];
					$data['us']=1;
				}
				 
				ini_set('memory_limit', '-1');
				$row_summary = $model->userSummary($data);	
				if($row_summary['get_started_wizard_status']==0)
				{
					if(isset($a))
					{
					header("location:../../GetStartedNew");
					}
				
					else
					{
						header("location:../GetStartedNew");
					}
				}
				$updateUserId = $model->updateUserId($data);
				$data['email']=$row_summary['email'];
				$receivedContractorInvitation = $model->receivedContractorInvitation($data);
				$guardianRequestReceived = $model->guardianRequestReceived($data);
				 $requestDaycareReceivedCount = $model->requestDaycareReceivedCount($data);
				 $daycareRequestReceivedDetail = $model->daycareRequestReceivedDetail($data);
				  $pendingMemberRequestCount = $model->pendingMemberRequestCount($data);
				  $pendingMemberRequestCount = $model->pendingMemberRequestCount($data);
				  $pendingMemberRequest = $model->pendingMemberRequest($data);
				  $rowUser = $model->approveUser($data);
				  $requestRejectedDetailStudents = $model->requestRejectedDetailStudents($data);
				   $kinRequestReceivedCount = $model->kinRequestReceivedCount($data);
				  $kinRequestReceivedDetail = $model->kinRequestReceivedDetail($data);
				  $requestReceivedCountTenants = $model->requestReceivedCountTenants($data);
				  $receivedRequestDetailTenants = $model->receivedRequestDetailTenants($data); 
				 $resultIndus  = $model->selectIndustry();
					$resultContry = $model->selectCountry();
				  $rowP = $model->allCount($data);
				require_once('ShareMonitorRequestNewView.php');
			}
		}
		
		
		
		public static function shareMonitorRejectedList($a=null)
		{
			$valueNew = checkLogin();
			 
			if ($valueNew == 0) {
				 if(isset($a))
				{
				header("location:../../LoginAccount");
				}
				else
				{
				header("location:../LoginAccount");	
				}
				} else {
				$data=array();
				$model = new ShareMonitorModel();
				if(isset($a))
				{
					$path         = "../../../../";
					$data['user_id']=cleanMe($a);
					$data['us']=0;
				}
				else{
				 
					$path         = "../../../";
					$data['user_id']=$_SESSION['user_id'];
					$data['us']=1;
				}
				 
				ini_set('memory_limit', '-1');
				$row_summary = $model->userSummary($data);	
				if($row_summary['get_started_wizard_status']==0)
				{
					if(isset($a))
					{
					header("location:../../GetStartedNew");
					}
				
					else
					{
						header("location:../GetStartedNew");
					}
				}
				$data['email']=$row_summary['email'];
				$rejectedContractorInvitation = $model->rejectedContractorInvitation($data);
				 $guardianRequestRejected = $model->guardianRequestRejected($data);
				 $daycareRequestRejectedDetail = $model->daycareRequestRejectedDetail($data);
				$requestDaycareRejectedCount = $model->requestDaycareRejectedCount($data);	
				  $requestRejectedDetailSuppliers = $model->requestRejectedDetailSuppliers($data);
				  $requestRejectedDetailTenants = $model->requestRejectedDetailTenants($data);
				  $requestRejectedDetailStudents = $model->requestRejectedDetailStudents($data);
				  $rejectedMemberRequest = $model->rejectedMemberRequest($data);
				  $kinRequestRejectedCount = $model->kinRequestRejectedCount($data);
				  $kinRequestRejectedDetail = $model->kinRequestRejectedDetail($data);
				  $requestRejectedCountSuppliers = $model->requestRejectedCountSuppliers($data);
				  $rejectedMemberRequestCount = $model->rejectedMemberRequestCount($data);
				  $requestRejectedCountTenants = $model->requestRejectedCountTenants($data);
				  $requestRejectedCountStudents = $model->requestRejectedCountStudents($data);
				   
				  $rowP = $model->allCount($data);
				require_once('ShareMonitorRejectedView.php');
			}
		}
        
		public static function shareMonitorSentList($a=null)
		{
			$valueNew = checkLogin();
			 
			if ($valueNew == 0) {
				 if(isset($a))
				{
				header("location:../../LoginAccount");
				}
				else
				{
				header("location:../LoginAccount");	
				}
				} else {
				$data=array();
				$model = new ShareMonitorModel();
				if(isset($a))
				{
					$path         = "../../../../";
					$data['user_id']=cleanMe($a);
					$data['us']=0;
					$newPath="../";
				}
				else{
				 
					$path         = "../../../";
					$data['user_id']=$_SESSION['user_id'];
					$data['us']=1;
					$newPath="";
				}
				 
				ini_set('memory_limit', '-1');
				$row_summary = $model->userSummary($data);	
				if($row_summary['get_started_wizard_status']==0)
				{
					if(isset($a))
					{
					header("location:../../GetStartedNew");
					}
				
					else
					{
						header("location:../GetStartedNew");
					}
				}
				
				 $requestPendingCountSuppliers = $model->requestPendingCountSuppliers($data);
				
				 $requestPendingCountTenants = $model->requestPendingCountTenants($data);
				 $requestPendingCountStudents = $model->requestPendingCountStudents($data);
				 $requestPendingCount = $model->requestPendingCount($data);
				
				$kinRequestSentDetail = $model->kinRequestSentDetail($data);
				  
				 $kinRequestSentCount = $model->kinRequestSentCount($data);
				  $requestPendingDetail = $model->requestPendingDetail($data);
				  $requestPendingDetailTenants = $model->requestPendingDetailTenants($data);
				  $requestPendingDetailStudents = $model->requestPendingDetailStudents($data);
				 $requestPendingDetailSupliers = $model->requestPendingDetailSupliers($data);
				  $rowP = $model->allCount($data);
				  $resultIndus  = $model->selectIndustry();
                $resultContry = $model->selectCountry();
				
				require_once('ShareMonitorSentView.php');
			}
		}
        
		public static function verifyRequest($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) 
			{
			header("location:../../LoginAccount");
			} else
				{
				$data=array();
				$model = new ShareMonitorModel();
				$path         = "../../../../";
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=cleanMe($a);
				$row_summary = $model->userSummary($data);	
				$verifyRequest  = $model->verifyRequest($data);
				header('location:../ShareMonitorShow');
			}
		}
		
		
		public static function rejectContrator($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) 
			{
			header("location:../../LoginAccount");
			} else
				{
				$data=array();
				$model = new ShareMonitorModel();
				$path         = "../../../../";
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=cleanMe($a);
				$row_summary = $model->userSummary($data);	
				$rejectContrator  = $model->rejectContrator($data);
				header('location:../ShareMonitorShow');
			}
		}
		
		public static function approveContrator($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) 
			{
			header("location:../../LoginAccount");
			} else
				{
				$data=array();
				$model = new ShareMonitorModel();
				$path         = "../../../../";
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=cleanMe($a);
				$row_summary = $model->userSummary($data);	
				$approveContrator  = $model->approveContrator($data);
				header('location:../ShareMonitorShow');
			}
		}
		
		public static function unverifyRequest($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) 
			{
			header("location:../../LoginAccount");
			} else
				{
				$data=array();
				$model = new ShareMonitorModel();
				$path         = "../../../../";
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=cleanMe($a);
				$row_summary = $model->userSummary($data);	
				$unverifyRequest  = $model->unverifyRequest($data);
				header('location:../ShareMonitorShow');
			}
		}
        
        
		public static function receivedAllCount()
		{
			$valueNew = checkLogin();
			// echo $valueNew; die;
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$model = new ShareMonitorModel();
				
				$path         = "../../../";
				$data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				$requestReceivedCount = $model->allCount($data);
				
				return $requestReceivedCount['num'];
			}
		}
		public static function sendEmployerInvitation()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:../LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				
				$model = new ShareMonitorModel();
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$sendEmployerInvitation    = $model->sendEmployerInvitation($data);
				header('location:ShareMonitorShow');
			}
		}
		
		
		public static function approveTenantRequest($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:../LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=cleanMe($a);
				$model = new ShareMonitorModel();
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$approveTenantRequest    = $model->approveTenantRequest($data);
				header('location:../ShareMonitorShow');
			}
		}
	
	
	public static function rejectTenantRequest($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:../LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=cleanMe($a);
				$model = new ShareMonitorModel();
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$rejectTenantRequest    = $model->rejectTenantRequest($data);
				header('location:../ShareMonitorShow');
			}
		}
		
		public static function sendRequestSuppliers($a = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:../../LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model = new ShareMonitorModel();
				require_once('../configs/testMandril.php');
				$sendRequestSuppliers    = $model->sendRequestSuppliers($data);
				header('location:../../ShareMonitor/ShareMonitorShow');
			}
		}
		public static function sendRequestTenates($a = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:../../LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model = new ShareMonitorModel();
				require_once('../configs/testMandril.php');
				$sendRequestTenates    = $model->sendRequestTenates($data);
				header('location:../../ShareMonitor/ShareMonitorShow');
			}
		}
		
		public static function sendRequestStudents($a = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:../../LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model = new ShareMonitorModel();
				require_once('../configs/testMandril.php');
				$sendRequestStudents    = $model->sendRequestStudents($data);
				header('location:../../ShareMonitor/ShareMonitorShow');
			}
		}
		
		public static function moreRequestDetailStudents()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ShareMonitorModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				$moreRequestDetail = $model->moreRequestDetailStudents($data);
				
				echo $moreRequestDetail; die;
			}
			
		}
		
		
		public static function moreReceivedRequestDetailTenants()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ShareMonitorModel();
                $data['user_id']=$_SESSION['user_id'];
				 
				$moreReceivedRequestDetailTenants = $model->moreReceivedRequestDetailTenants($data);
				
				echo $moreReceivedRequestDetailTenants; die;
			}
			
		}
		
		public static function morependingMemberRequest()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ShareMonitorModel();
                $data['user_id']=$_SESSION['user_id'];
				$moreRequestDetail = $model->morependingMemberRequest($data);
				
				echo $moreRequestDetail; die;
			}
			
		}
		
		public static function moreApprovedMemberRequest()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ShareMonitorModel();
                $data['user_id']=$_SESSION['user_id'];
				$moreRequestDetail = $model->moreApprovedMemberRequest($data);
				
				echo $moreRequestDetail; die;
			}
			
		}
		
		public static function moreRejectedMemberRequest()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ShareMonitorModel();
                $data['user_id']=$_SESSION['user_id'];
				$moreRequestDetail = $model->moreRejectedMemberRequest($data);
				
				echo $moreRequestDetail; die;
			}
			
		}
		public static function moreApprovedUserStudents()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ShareMonitorModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				$moreApprovedUserStudents = $model->moreRequestApprovedDetailStudents($data);
				echo $moreApprovedUserStudents; die;
			}
			
		}
		
		
		public static function moreRequestRejectedDetailStudents()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ShareMonitorModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				$moreRequestRejectedDetailStudents = $model->moreRequestRejectedDetailStudents($data);
				echo $moreRequestRejectedDetailStudents; die;
			}
			
		}
		
		
		public static function moreShareMonitorShow($a = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:../../../../../user/index.php/Login");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ShareMonitorModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				$data['limit1']=cleanMe($a);
				
				$data['limit']=$data['limit1']*12;
				
				$row_summary = $model->userSummary($data);	
				
				
				$rowUser = $model->approveUser($data);
				
				$rowP = $model->allCount($data);
				
				require_once('MoreShareMonitorView.php');
			}
			
		}
		
		public static function moreRequestDetail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ShareMonitorModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				$moreRequestDetail = $model->moreRequestDetail($data);
				echo $moreRequestDetail; die;
			}
			
		}
		
		public static function moreRequestDetailTenants()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ShareMonitorModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				$moreRequestDetail = $model->moreRequestDetailTenants($data);
				echo $moreRequestDetail; die;
			}
			
		}
		
		public static function moreApprovedUserTenants()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ShareMonitorModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				$moreApprovedUserTenants = $model->moreRequestApprovedDetailTenants($data);
				echo $moreApprovedUserTenants; die;
			}
			
		}
		
		public static function moreRequestRejectedDetailTenants()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ShareMonitorModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				$moreRequestRejectedDetailTenants = $model->moreRequestRejectedDetailTenants($data);
				echo $moreRequestRejectedDetailTenants; die;
			}
			
		}
		
		
		public static function moreRequestDetailSuppliers()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ShareMonitorModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				$moreRequestDetail = $model->moreRequestDetailSuppliers($data);
				echo $moreRequestDetail; die;
			}
			
		}
		
		public static function moreApprovedUserSuppliers()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ShareMonitorModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				$moreApprovedUserSuppliers = $model->moreRequestApprovedDetailSuppliers($data);
				echo $moreApprovedUserSuppliers; die;
			}
			
		}
		
		public static function moreRequestRejectedDetailSuppliers()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ShareMonitorModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				$moreRequestRejectedDetailSuppliers = $model->moreRequestRejectedDetailSuppliers($data);
				echo $moreRequestRejectedDetailSuppliers; die;
			}
			
		}
		
		public static function moreRequestDetailCustomer()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ShareMonitorModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				$moreRequestDetailCustomer = $model->moreRequestDetailCustomer($data);
				echo $moreRequestDetailCustomer; die;
			}
			
		}
		
		public static function updateRequest()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ShareMonitorModel();
                $data['user_id']=$_SESSION['user_id'];
				$updateRequest = $model->updateRequest($data);
				echo $updateRequest; die;
			}
			
		}
		
		
		public static function moreApprovedUser()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ShareMonitorModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				$moreApprovedUser = $model->moreApprovedUser($data);
				echo $moreApprovedUser; die;
			}
			
		}
		
		public static function moreApprovedCustomer()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ShareMonitorModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				$moreApprovedCustomer = $model->moreApprovedCustomer($data);
				echo $moreApprovedCustomer; die;
			}
			
		}
		
		public static function moreEmployerRequestDetail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ShareMonitorModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				$moreEmployerRequestDetail = $model->moreEmployerRequestDetail($data);
				echo $moreEmployerRequestDetail; die;
			}
			
		}
		
		public static function employeeRequestShow($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:../../../../../user/index.php/Login");
				} else {
				$data=array();
				$path         = "../../../../../";
				$model = new ShareMonitorModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['limit1']=cleanMe($b);
				
				$data['limit']=$data['limit1']*12;
				
				$rowsummary = $model->userSummary($data);	
				$company = $model->userSummary($data);	
				$rowUser = $model->approveUser($data);
				$rowA = $model->approveCount($data);
				$rowP = $model->pendingCount($data);
				$rowR = $model->rejectCount($data);
				$rowa = $model->allCount($data);
				
				require_once('MoreEmployeeRequestView.php');
			}
			
		}
		
		
		public static function approveMemberRequest()
		{$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$model = new ShareMonitorModel();
				$data['a_id']=$_POST['a_id'];
				$data['stat']=$_POST['status'];
				$data['user_id']=$_SESSION['user_id'];
				require_once('../configs/testMandril.php');
				$rowsummary = $model->approveMemberRequest($data);	
				echo $rowsummary; die;
			}
		}
		
		public static function approveUserRequest()
		{$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$model = new ShareMonitorModel();
				$data['a_id']=$_POST['a_id'];
				$data['stat']=$_POST['status'];
				$data['user_id']=$_SESSION['user_id'];
				require_once('../configs/testMandril.php');
				$rowsummary = $model->approveUserRequest($data);	
				echo $rowsummary; die;
			}
		}
		
		
		public static function approveEmployee($a=null)
		{$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header('location:../../LoginAccount');
				} else {
				$data=array();
				$model = new ShareMonitorModel();
				$data['a_id']=cleanMe($a);
				$data['stat']=1;
				$data['user_id']=$_SESSION['user_id'];
				require_once('../configs/testMandril.php');
				$rowsummary = $model->approveUserEmployeeRequest($data);	
				header('location:https://www.qloudid.com/company/index.php/CompanySuppliers/companyEmployeeProfileAction/'.$rowsummary);
			}
		}
		public static function rejectEmployee($a=null)
		{$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header('location:../../LoginAccount');
				} else {
				$data=array();
				$model = new ShareMonitorModel();
				$data['a_id']=cleanMe($a);
				$data['stat']=2;
				$data['user_id']=$_SESSION['user_id'];
				require_once('../configs/testMandril.php');
				$rowsummary = $model->approveUserEmployeeRequest($data);	
				header('location:https://www.qloudid.com/user/index.php/NewPersonal/addressList');
			}
		}
		public static function searchToApproveCompanyDetail()
		{$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$model = new ShareMonitorModel();
				$data['id']=$_POST['id'];
				
				
				$rowsummary = $model->searchToApproveCompanyDetail($data);	
				echo $rowsummary; die;
			}
		}
		
		public static function searchToApproveMemberDetail()
		{$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$model = new ShareMonitorModel();
				$data['id']=$_POST['id'];
				
				
				$rowsummary = $model->searchToApproveMemberDetail($data);	
				echo $rowsummary; die;
			}
		}
		
		
        public static function selectOrganizationWeb()
		{
		
		//print_r($_POST); die;
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$webModel = new ShareMonitorModel();
				if (isset($_POST)) {
					$val        = array();
					$val['web'] = cleanMe($_POST['web1']);
					$resultWeb = $webModel->selectOrganizationWeb($val);
				}
				
				echo $resultWeb;
				die;
			}
		}
		public static function createCompanyAccount()
		{ 
		
		
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:../../../user/index.php/Login");
				} else {
				$model = new ShareMonitorModel();
				if (isset($_POST['company_email'])) {
					session_start();
					$data = array();
					$data['company_name']  = cleanMe($_POST['company_name_add']);
					$data['company_email'] = cleanMe($_POST['company_email']);
					$data['website']       = cleanMe($_POST['company_website']);
					$data['curr']          = 1;
					$data['created_on']    = date('Y-m-d H:i:s');
					$data['random_hash']   = substr(md5(uniqid(rand(), true)), 16, 16);
					$data['country']       = cleanMe($_POST['cntry']);
					
					$data['location'] = "Headquarter";
					$data['user_id']  = $_SESSION['user_id'];
					
					$data['ld']     = "";
					$data['sd']     = "";
					
					$data['inds']   = cleanMe($_POST['inds']);
					
					$result         = $model->createCompanyAccount($data);
					
					if ($result == 0) {
						
						$path = "../../../";
						header("location:https://www.qloudid.com/user/index.php/ShareMonitor/ShareMonitorShow");
					}
					
					else {
						
						$path = "../../../";
						require_once('../configs/testMandril.php');
						$resultPass = $model->sendCreateCompanyEmail($data);
						header("location:https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorShow");
					}
					
				}
				
			}
		}
		
		public static function createCompanyBankAccount()
		{ 
		
		//print_r($_POST);
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
			echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model = new ShareMonitorModel();
				if (isset($_POST['company_email'])) {
					session_start();
					$data = array();
					$data['company_name']  = cleanMe($_POST['company_name_add']);
					$data['company_email'] = cleanMe($_POST['company_email']);
					$data['website']       = cleanMe($_POST['company_website']);
					$data['curr']          = 1;
					$data['created_on']    = date('Y-m-d H:i:s');
					$data['random_hash']   = substr(md5(uniqid(rand(), true)), 16, 16);
					$data['country']       = cleanMe($_POST['cntry']);
					
					$data['location'] = "Headquarter";
					$data['user_id']  = $_SESSION['user_id'];
					
					$data['ld']     = "";
					$data['sd']     = "";
					
					$data['inds']   = cleanMe($_POST['inds']);
					//print_r($data);
					$result         = $model->createCompanyBankAccount($data);
					
					if ($result == 0) {
						
						echo 0; die;
					}
					
					else {
						
						$data['id']=$result;
						$model1 = new BusinessEventController();
						
						$value=array();
						$value= $model1->onCompanyActivate($data);
						
						$output1=$model->executeTransaction($value);
						echo  $output1; die;
					}
					
				}
				
			}
		}
		
		
		
		public static function updateEmployeeDetail()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				
				$model = new ShareMonitorModel();
				$data['user_id']=$_SESSION['user_id'];
				$rowsummary = $model->updateEmployeeDetail($data);	
				
				header('location:../ShareMonitor/ShareMonitorShow');
			}
			
		}
		
			public static function disconnectEmployee()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['cid']=$_POST['cid'];
				$model = new ShareMonitorModel();
				$data['user_id']=$_SESSION['user_id'];
				$rowsummary = $model->disconnectEmployee($data);	
				
				header('location:../ShareMonitor/ShareMonitorShow');
			}
			
		}
		public static function disconnectUserConnection($a=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new ShareMonitorModel();
				$data['user_id']=$_SESSION['user_id'];
				$rowsummary = $model->disconnectEmployee($data);	
				
				header('location:../ShareMonitorShow');
			}
			
		}
		
			public static function disconnectTenant()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				
				$model = new ShareMonitorModel();
				$data['user_id']=$_SESSION['user_id'];
				$rowsummary = $model->disconnectTenant($data);	
				
				header('location:../ShareMonitor/ShareMonitorShow');
			}
			
		}
		
		public static function disconnectStudent()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				
				$model = new ShareMonitorModel();
				$data['user_id']=$_SESSION['user_id'];
				$rowsummary = $model->disconnectStudent($data);	
				
				header('location:../ShareMonitor/ShareMonitorShow');
			}
			
		}
		
		public static function searchCompanyDetail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$webModel = new ShareMonitorModel();
				if (isset($_POST)) {
					$resultWeb = $webModel->searchCompanyDetail();
				}
				
				echo $resultWeb;
				die;
			}
		}
		
		
		public static function searchEmployerDetail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$webModel = new ShareMonitorModel();
				if (isset($_POST)) {
					$resultWeb = $webModel->searchEmployerDetail($data);
				}
				
				echo $resultWeb;
				die;
			}
		}
		
		public static function searchCompanyDetailSuppliers()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$webModel = new ShareMonitorModel();
				if (isset($_POST)) {
					$resultWeb = $webModel->searchCompanyDetailSuppliers();
				}
				
				echo $resultWeb;
				die;
			}
		}
		public static function searchCompanyDetailStudents()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$webModel = new ShareMonitorModel();
				if (isset($_POST)) {
					$resultWeb = $webModel->searchCompanyDetailStudents();
				}
				
				echo $resultWeb;
				die;
			}
		}
		public static function searchCompanyDetailTenates()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$webModel = new ShareMonitorModel();
				if (isset($_POST)) {
					$resultWeb = $webModel->searchCompanyDetailTenates();
				}
				
				echo $resultWeb;
				die;
			}
		}
		public static function searchUserDetail()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../";
				$data=array();
				$model = new ShareMonitorModel();
				$data['user_id']=$_SESSION['user_id'];
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$searchUserDetail = $model->searchUserDetail($data);	
				echo $searchUserDetail; die;
			}
			
		}
		
		
		public static function checkConnection()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				
				$data=array();
				$model = new ShareMonitorModel();
				$data['user_id']=$_SESSION['user_id'];
				$checkConnection = $model->checkConnection($data);	
				echo $checkConnection; die;
			}
			
		}
		
		
				public static function disconnectSupplier()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				
				$model = new ShareMonitorModel();
				$data['user_id']=$_SESSION['user_id'];
				$rowsummary = $model->disconnectSupplier($data);	
				
				header('location:../ShareMonitor/ShareMonitorShow');
			}
			
		}
		
	}
    
	
	
?>