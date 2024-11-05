<?php

	require_once 'ConnectKinModel.php';
	require_once 'PersonalRequestsController.php';
	require_once 'ShareMonitorController.php';
	require_once '../configs/utility.php';
	class ConnectKinController
	{
		
		
		public static function index()
		{
			$path         = "../../../../";
			require_once('ConnectKinView.php');
		}
		
		public static function connectAccount($a=null)
		{
			$valueNew = checkLogin();
			// echo $valueNew; die;
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$model = new ConnectKinModel();
				
				$path         = "../../../";
				$data['user_id']=$_SESSION['user_id'];
				
				
				$row_summary = $model->userSummary($data);	
				if($row_summary['get_started_wizard_status']==0)
				{
					header("location:../GetStartedNew");
					}
				$requestSentDetail = $model->requestSentDetail($data);
				$requestApprovedDetail = $model->requestApprovedDetail($data);
				$selectIcon = $model->selectIcon($data);
				$requestReceivedDetail = $model->requestReceivedDetail($data);
				$requestRejectedDetail = $model->requestRejectedDetail($data);
				$requestReceivedCount = $model->requestReceivedCount($data);
				
				$requestSentCount = $model->requestSentCount($data);
				$requestRejectedCount = $model->requestRejectedCount($data);
				$requestApprovedCount = $model->requestApprovedCount($data);
				
                $resultContry = $model->selectCountry();
				
				$model1 = new PersonalRequestsController();
				$receivedRequestsUser = $model1->receivedRequestsUser();
				$model2 = new ShareMonitorController();
				$receivedAllCount = $model2->receivedAllCount();
				
				require_once('ConnectKinView.php');
			}
		}
        
		
		public static function contactAccount($a=null)
		{
			$valueNew = checkLogin();
			// echo $valueNew; die;
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$model = new ConnectKinModel();
				
				$path         = "../../../";
				$data['user_id']=$_SESSION['user_id'];
				
				
				$row_summary = $model->userSummary($data);	
				if($row_summary['get_started_wizard_status']==0)
				{
					header("location:../GetStartedNew");
					}
				$requestedContactDetail = $model->requestedContactDetail($data);
				 
				$selectIcon = $model->selectIcon($data);
				
				
				 
				 $resultContry = $model->selectCountry();
				
				$model1 = new PersonalRequestsController();
				$receivedRequestsUser = $model1->receivedRequestsUser();
				$model2 = new ShareMonitorController();
				$receivedAllCount = $model2->receivedAllCount();
				
				require_once('ConnectKinAddedContactView.php');
			}
		}
        
		
		
		public static function sentAccount($a=null)
		{
			$valueNew = checkLogin();
			// echo $valueNew; die;
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$model = new ConnectKinModel();
				
				$path         = "../../../";
				$data['user_id']=$_SESSION['user_id'];
				
				
				$row_summary = $model->userSummary($data);	
				if($row_summary['get_started_wizard_status']==0)
				{
					header("location:../GetStartedNew");
					}
				$requestSentDetail = $model->requestSentDetail($data);
				 
				$selectIcon = $model->selectIcon($data);
				
				
				$requestSentCount = $model->requestSentCount($data);
				 $resultContry = $model->selectCountry();
				
				$model1 = new PersonalRequestsController();
				$receivedRequestsUser = $model1->receivedRequestsUser();
				$model2 = new ShareMonitorController();
				$receivedAllCount = $model2->receivedAllCount();
				
				require_once('ConnectKinSentView.php');
			}
		}
        
		
		
		
		public static function rejectedAccount($a=null)
		{
			$valueNew = checkLogin();
			// echo $valueNew; die;
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$model = new ConnectKinModel();
				
				$path         = "../../../";
				$data['user_id']=$_SESSION['user_id'];
				
				
				$row_summary = $model->userSummary($data);	
				if($row_summary['get_started_wizard_status']==0)
				{
					header("location:../GetStartedNew");
					}
				 
				$selectIcon = $model->selectIcon($data);
				 
				$requestRejectedDetail = $model->requestRejectedDetail($data);
				$requestRejectedCount = $model->requestRejectedCount($data);
				$resultContry = $model->selectCountry();
				$model1 = new PersonalRequestsController();
				$receivedRequestsUser = $model1->receivedRequestsUser();
				$model2 = new ShareMonitorController();
				$receivedAllCount = $model2->receivedAllCount();
				
				require_once('ConnectKinRejectedView.php');
			}
		}
        
		public static function receivedAccount($a=null)
		{
			$valueNew = checkLogin();
			// echo $valueNew; die;
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$model = new ConnectKinModel();
				
				$path         = "../../../";
				$data['user_id']=$_SESSION['user_id'];
				
				
				$row_summary = $model->userSummary($data);	
				if($row_summary['get_started_wizard_status']==0)
				{
					header("location:../GetStartedNew");
					}
				$requestSentDetail = $model->requestSentDetail($data);
				$requestApprovedDetail = $model->requestApprovedDetail($data);
				$selectIcon = $model->selectIcon($data);
				$requestReceivedDetail = $model->requestReceivedDetail($data);
				 
				$requestReceivedCount = $model->requestReceivedCount($data);
				
				 
                $resultContry = $model->selectCountry();
				
				$model1 = new PersonalRequestsController();
				$receivedRequestsUser = $model1->receivedRequestsUser();
				$model2 = new ShareMonitorController();
				$receivedAllCount = $model2->receivedAllCount();
				
				require_once('ConnectKinReceivedView.php');
			}
		}
        
		
		
		public static function welcomeKin($a=null)
		{
			$valueNew = checkLogin();
			// echo $valueNew; die;
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$model = new ConnectKinModel();
				
				$path         = "../../../";
				$data['user_id']=$_SESSION['user_id'];
				$row_summary = $model->userSummary($data);	
				if($row_summary['get_started_wizard_status']==0)
				{
					header("location:../GetStartedNew");
					}
				 require_once('ConnectKinWelcomeView.php');
			}
		}
		public static function noffRelatives()
		{
			$valueNew = checkLogin();
			
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$model = new ConnectKinModel();
				
				$path         = "../../../";
				$data['user_id']=$_SESSION['user_id'];
				
				
				$row_summary = $model->userSummary($data);	
				if($row_summary['get_started_wizard_status']==0)
				{
					header("location:../GetStartedNew");
					}
				$requestReceivedCount = $model->requestReceivedCount($data);	
				$allRelativeDetail = $model->allRelativeDetail($data);
				$allKinsDetail = $model->allKinsDetail($data);
				$selectIcon = $model->selectIcon($data);
				$model1 = new PersonalRequestsController();
				$receivedRequestsUser = $model1->receivedRequestsUser();
				$model2 = new ShareMonitorController();
				$receivedAllCount = $model2->receivedAllCount();
				
				require_once('KinRelativesView.php');
			}
		}
        
		public static function addNOFFRelative($a = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$data['id']=cleanMe($a);
				$model = new ConnectKinModel();
                $data['user_id']=$_SESSION['user_id'];
				$addNOFFRelative = $model->addNOFFRelative($data);
				
				header("location:../noffRelatives");
			}
			
		}
		
		public static function sendInvitation()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:../LoginAccount");
				} else {
				$data=array();
				$model = new ConnectKinModel();
                $data['user_id']=$_SESSION['user_id'];
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				$sendInvitation = $model->sendInvitation($data);
				
				header("location:sentAccount");
			}
			
		}
		
		public static function checkCard($a = null)
		{
		require "../cardvalidity/vendor/autoload.php";	
		$detector = new CardDetect\Detector();
		$card = '7296150007355345';

		echo $detector->detect($card); die;
			
		}
		
		public static function kinInfo($a=null)
		{
			$valueNew = checkLogin();
			
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$model = new ConnectKinModel();
				
				$path         = "../../../";
				$data['user_id']=$_SESSION['user_id'];
				
				
				$row_summary = $model->userSummary($data);	
				if($row_summary['get_started_wizard_status']==0)
				{
					header("location:../GetStartedNew");
					}
				
                $resultContry = $model->selectCountry();
				 $relationDetail = $model->relationDetail();
				require_once('ConnectKinInfoView.php');
			}
		}
		
		
		public static function updateSSN($a=null)
		{
			$valueNew = checkLogin();
			
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:../../LoginAccount");
				} else {
				$data=array();
				$model = new ConnectKinModel();
				
				$path         = "../../../../";
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($a);
				
				$row_summary = $model->userSummary($data);	
				$resultContry = $model->selectCountry($data);	
				require_once('ConnectKinUpdateSSNView.php');
			}
		}
        
        
		public static function connectAccountReceivedCount()
		{
			$valueNew = checkLogin();
			// echo $valueNew; die;
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$model = new ConnectKinModel();
				
				$path         = "../../../";
				$data['user_id']=$_SESSION['user_id'];
				$requestReceivedCount = $model->requestReceivedCount($data);
				
				return $requestReceivedCount['num'];
			}
		}
        
		
		public static function profileInfo1($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new ConnectKinModel();
				
				$profileInfo1    = $model1->profileInfo1($data);
				echo $profileInfo1; die;
			}
		}
		
		public static function profileInfo($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new ConnectKinModel();
				
				$profileInfo    = $model1->profileInfo($data);
				echo $profileInfo; die;
			}
		}
		
		
		public static function moreConnectKinShow($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:../../../../../user/index.php/Login");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ConnectKinModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				$data['limit1']=cleanMe($a);
				
				$data['limit']=$data['limit1']*12;
				
				$row_summary = $model->userSummary($data);	
				
				
				$rowUser = $model->approveUser($data);
				
				$rowP = $model->allCount($data);
				
				require_once('MoreConnectKinView.php');
			}
			
		}
		
		public static function moreRequestDetail($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ConnectKinModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				
				
				
				$moreRequestDetail = $model->moreRequestDetail($data);
				
				echo $moreRequestDetail; die;
			}
			
		}
		
		
		public static function moreRequestDetailCustomer($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ConnectKinModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				
				
				
				$moreRequestDetailCustomer = $model->moreRequestDetailCustomer($data);
				
				echo $moreRequestDetailCustomer; die;
			}
			
		}
		
		public static function approveRequest($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:../../../user/index.php/Login");
				} else {
				$data=array();
				$data['id']=cleanMe($a);
				$model = new ConnectKinModel();
                $data['user_id']=$_SESSION['user_id'];
				$updateRequest = $model->approveRequest($data);
				
				header("location:../connectAccount");
			}
			
		}
		
		public static function updateInformation($a = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:../../../user/index.php/Login");
				} else {
				$data=array();
				$data['id']=cleanMe($a);
				$model = new ConnectKinModel();
                $data['user_id']=$_SESSION['user_id'];
				$updateRequest = $model->updateInformation($data);
				
				header("location:../connectAccount");
			}
			
		}
		public static function updateKinInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['kin_id']=cleanMe($a);
				$model       = new ConnectKinModel();
				
				$updateKinInfo = $model->updateKinInfo($data);	
				header("location:../../ConnectKin/connectAccount");
			}	
		}
		
		public static function rejectRequest($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:../../../user/index.php/Login");
				} else {
				$data=array();
				$data['id']=cleanMe($a);
				$model = new ConnectKinModel();
                $data['user_id']=$_SESSION['user_id'];
				$updateRequest = $model->rejectRequest($data);
				
				header("location:../connectAccount");
			}
			
		}
		
		public static function moreRejectedRequestDetail($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ConnectKinModel();
                $data['user_id']=$_SESSION['user_id'];
				$moreRejectedRequestDetail = $model->moreRejectedRequestDetail($data);
				
				echo $moreRejectedRequestDetail; die;
			}
			
		}
		
		public static function moreSentRequestDetail($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ConnectKinModel();
                $data['user_id']=$_SESSION['user_id'];
				$moreSentRequestDetail = $model->moreSentRequestDetail($data);
				
				echo $moreSentRequestDetail; die;
			}
			
		}
		
		public static function moreReceivedRequestDetail($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
			echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ConnectKinModel();
                $data['user_id']=$_SESSION['user_id'];
				
				$moreReceivedRequestDetail = $model->moreReceivedRequestDetail($data);
				
				echo $moreReceivedRequestDetail; die;
			}
			
		}
		
		public static function moreApprovedRequestDetail($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ConnectKinModel();
                $data['user_id']=$_SESSION['user_id'];
				$moreApprovedRequestDetail = $model->moreApprovedRequestDetail($data);
				
				echo $moreApprovedRequestDetail; die;
			}
			
		}
		public static function searchUserDetailPhone($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$webModel = new ConnectKinModel();
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				$data['user_id']=$_SESSION['user_id'];
				if (isset($_POST)) {
					$resultWeb = $webModel->searchUserDetailPhone($data);
				}
				
				echo $resultWeb;
				die;
			}
		}
		
		public static function searchUserDetail($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$webModel = new ConnectKinModel();
				require_once('../configs/testMandril.php');
				$data['user_id']=$_SESSION['user_id'];
				if (isset($_POST)) {
					$resultWeb = $webModel->searchUserDetail($data);
				}
				
				echo $resultWeb;
				die;
			}
		}
		
		public static function searchUserDetailConnect($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$webModel = new ConnectKinModel();
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				$data['user_id']=$_SESSION['user_id'];
				
				if (isset($_POST)) {
					$resultWeb = $webModel->searchUserDetailConnect($data);
				}
				if(is_array($resultWeb))
				{
					
					echo '<script> window.location.href="https://www.qloudid.com/user/index.php/ConnectKin/sentAccount"; </script>'; die;	
				}
				else
				{
				echo $resultWeb;
				die;
				}
			}
		}
		
		public static function sendConnectEmail($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:../../../user/index.php/Login");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ConnectKinModel();
                $data['user_id']=$_SESSION['user_id'];
				require_once('../configs/testMandril.php');
				$updateRequest = $model->sendConnectEmail($data);
				
				header("location:connectAccount");
			}
			
		}
		
			public static function sendConnectInformation($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:../../../user/index.php/Login");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ConnectKinModel();
                $data['user_id']=$_SESSION['user_id'];
				require_once('../configs/testMandril.php');
				require_once('../lib/url_shortener.php');
				require_once('../configs/smsMandril.php');
				$updateRequest = $model->sendConnectInformation($data);
				
				header("location:../ConnectKin/contactAccount");
			}
			
		}
		public static function updateKinPhoto($a=null)
		{
			$valueNew = checkLogin();
			
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:../../LoginAccount");
				} else {
				$data=array();
				$model = new ConnectKinModel();
				$path         = "../../../../";
				$data['user_id']=$_SESSION['user_id'];
				$data['kin_id']=cleanMe($a);
				$row_summary = $model->userSummary($data);	
				if($row_summary['get_started_wizard_status']==0)
				{
					header("location:../GetStartedNew");
					}
				require_once('ConnectKinInfoPhotoView.php');
			}
		}
		public static function sendConnectPhone($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:../../../user/index.php/Login");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ConnectKinModel();
                $data['user_id']=$_SESSION['user_id'];
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$updateRequest = $model->sendConnectPhone($data);
				
				header("location:connectAccount");
			}
			
		}
		
		
		public static function searchUserDetailCode($a = null , $b=null ,$c=null, $d=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../";
				$data=array();
				$model = new ConnectKinModel();
				$data['user_id']=$_SESSION['user_id'];
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$searchUserDetail = $model->searchUserDetailCode($data);	
				
				echo $searchUserDetail; die;
			}
			
		}
		
		public static function updateEmployeeDetail($a = null , $b=null ,$c=null, $d=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:/../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				//print_r($_POST); die;
				$model = new ConnectKinModel();
				$data['user_id']=$_SESSION['user_id'];
				$rowsummary = $model->updateEmployeeDetail($data);	
				
				header('location:connectAccount');
			}
			
		}
	}
    
	
	
?>