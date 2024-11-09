<?php
	require_once 'PersonalRequestsModel.php';
	require_once 'ConnectKinController.php';
	require_once 'ShareMonitorController.php';
	require_once '../configs/utility.php';
	class PersonalRequestsController
	{
		
	
		public static function sentRequests($a=null)
		{
			$valueNew = checkLogin();
			// echo $valueNew; die;
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$model = new PersonalRequestsModel();
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
				if(isset($_GET['rid']))
				{
					$data['rid']=1;
					}
					else
						{
					$data['rid']=0;
					}
				
				$row_summary = $model->userSummary($data);	
				$userRequests = $model->userRequests($data);	
				$selectIcon = $model->selectIcon($data);
				if($row_summary['get_started_wizard_status']==0)
				{
					header("location:../GetStartedNew");
					}
				/*	if($userRequests==0)
				{
					header("location:../GetStartedNew");
					}*/
				$requestDetail = $model->requestDetail($data);
				//print_r($requestDetail); die;
				$requestPendingDetail = $model->requestPendingDetail($data);
				$requestPendingCount = $model->requestPendingCount($data);
				$requestApprovedCount = $model->requestApprovedCount($data);
				$requestPendingDetailReceived = $model->requestPendingDetailReceived($data);
				$requestPendingCountReceived = $model->requestPendingCountReceived($data);
				$resultOrg1    = $model->employeeAccountReceived($data);
				$resultOrg    = $model->userAccountReceived($data);
				$userLanguageDetail    = $model->userLanguageDetail($data);
				 $resultContry = $model->selectCountry();
				$approveReceived    = $model->approveReceived($data);
				$requestTotalSentCount = $model->requestTotalSentCount($data);
				
				$selectCredits = $model->selectCredits($data);
				$rowUserApprovedConnections = $model->approvedDetailConnections($data);
				$approvedDetailConnectionsCount = $model->approvedDetailConnectionsCount($data);
				$requestRejectedDetailConnections = $model->requestRejectedDetailConnections($data);
				$requestPendingDetailConnections = $model->requestPendingDetailConnections($data);
				$requestPendingCountConnections = $model->requestPendingCountConnections($data);
				$requestApprovedCountConnections = $model->requestApprovedCountConnections($data);
				$requestRejectedCountConnections = $model->requestRejectedCountConnections($data);
				
				$model1 = new ConnectKinController();
				$connectAccountReceivedCount = $model1->connectAccountReceivedCount();
				$model2 = new ShareMonitorController();
				$receivedAllCount = $model2->receivedAllCount();
				
				
				
				require_once('PersonalRequestsSentView.php');
			}
		}
        
		public static function createRequests()
		{
			$valueNew = checkLogin();
			// echo $valueNew; die;
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$model = new PersonalRequestsModel();
				
					$path         = "../../../";
					$data['user_id']=$_SESSION['user_id'];
					
				
				$row_summary = $model->userSummary($data);	
				
				 $resultContry = $model->selectCountry();
				
				$selectCredits = $model->selectCredits($data);
				
				require_once('PersonalRequestsCreateView.php');
			}
		}
        
		
		public static function receivedRequestsUser()
		{
			$valueNew = checkLogin();
			// echo $valueNew; die;
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$model = new PersonalRequestsModel();
				
				$data['user_id']=$_SESSION['user_id'];
				$data['us']=0;
				$requestPendingCountReceived = $model->requestPendingCountReceived($data);
				
				$requestPendingCountConnections = $model->requestPendingCountConnections($data);
				return $requestPendingCountReceived['num']+$requestPendingCountConnections['num'];
			}
		}
        
		public static function moreRequestRejectedDetailConnections()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
			echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new PersonalRequestsModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				$moreRequestRejectedDetailConnections = $model->moreRequestRejectedDetailConnections($data);
				echo $moreRequestRejectedDetailConnections; die;
			}
			
		}
		
		public static function moreRequestDetailConnections()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new PersonalRequestsModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				$moreRequestDetailConnections = $model->moreRequestDetailConnections($data);
				
				echo $moreRequestDetailConnections; die;
			}
			
		}
		
		public static function moreRequestApprovedDetailConnections()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new PersonalRequestsModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				$moreRequestApprovedDetailConnections = $model->moreRequestApprovedDetailConnections($data);
				echo $moreRequestApprovedDetailConnections; die;
			}
			
		}
		
			public static function rejectRequestConnections($a = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:../../LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=cleanMe($a);
				$model = new PersonalRequestsModel();
				
				$rejectRequestConnections    = $model->rejectRequestConnections($data);
				header('location:../sentRequests');
			}
		}
		public static function approveRequestConnections($a = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:../../LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=cleanMe($a);
				$model = new PersonalRequestsModel();
				
				$approveRequestConnections    = $model->approveRequestConnections($data);
				header('location:../sentRequests');
			}
		}
		
		
		public static function updateUserLanguage($co = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
			$data=array();
			
			$data['user_id']=$_SESSION['user_id'];
            $model1       = new PersonalRequestsModel();
           
			$updateUserLanguage    = $model1->updateUserLanguage($data);
           echo $updateUserLanguage; die;
        }
	}
	
	
	public static function profileInfo($co = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
			$data=array();
			
			$data['user_id']=$_SESSION['user_id'];
            $model1       = new PersonalRequestsModel();
           
			$profileInfo    = $model1->profileInfo($data);
           echo $profileInfo; die;
        }
	}
	
	
	public static function profileInfoReceived($co = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
			$data=array();
			
			$data['user_id']=$_SESSION['user_id'];
            $model1       = new PersonalRequestsModel();
           
			$profileInfoReceived    = $model1->profileInfoReceived($data);
           echo $profileInfoReceived; die;
        }
	}
	
	
	public static function profileInfo1($co = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
			$data=array();
			
			$data['user_id']=$_SESSION['user_id'];
            $model1       = new PersonalRequestsModel();
           
			$profileInfo    = $model1->profileInfo1($data);
           echo $profileInfo; die;
        }
	}
		
		public static function receivedRequests($a=null)
		{
			$valueNew = checkLogin();
			// echo $valueNew; die;
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$model = new PersonalRequestsModel();
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
				
				$row_summary = $model->userSummary($data);	
				
				$requestDetail = $model->requestDetailReceived($data);
				$requestPendingDetail = $model->requestPendingDetailReceived($data);
				$requestPendingCount = $model->requestPendingCountReceived($data);
				$requestApprovedCount = $model->requestApprovedCountReceived($data);
				
				
				require_once('PersonalRequestsReceiveView.php');
			}
		}
        
		public static function moreRequestDetail($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new PersonalRequestsModel();
                $data['user_id']=$_SESSION['user_id'];
				
				$moreRequestDetail = $model->moreRequestDetail($data);
				
				echo $moreRequestDetail; die;
			}
			
		}
		
		public static function moreRequestPendingDetail($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new PersonalRequestsModel();
                $data['user_id']=$_SESSION['user_id'];
				
				$moreRequestPendingDetail = $model->moreRequestPendingDetail($data);
				
				echo $moreRequestPendingDetail; die;
			}
			
		}
		
			public static function moreRequestPendingDetailConnections($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new PersonalRequestsModel();
                $data['user_id']=$_SESSION['user_id'];
				
				$moreRequestPendingDetailConnections = $model->moreRequestPendingDetailConnections($data);
				
				echo $moreRequestPendingDetailConnections; die;
			}
			
		}
	
	public static function moreRequestDetailReceived($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new PersonalRequestsModel();
                $data['user_id']=$_SESSION['user_id'];
				
				$moreRequestDetail = $model->moreRequestDetailReceived($data);
				
				echo $moreRequestDetail; die;
			}
			
		}
		
		public static function moreRequestPendingDetailReceived($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new PersonalRequestsModel();
                $data['user_id']=$_SESSION['user_id'];
				
				$moreRequestPendingDetail = $model->moreRequestPendingDetailReceived($data);
				
				echo $moreRequestPendingDetail; die;
			}
			
		}
		
		public static function searchUserDetail($a = null , $b=null ,$c=null, $d=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../";
				$data=array();
				$model = new PersonalRequestsModel();
				$data['user_id']=$_SESSION['user_id'];
				   require_once('../configs/testMandril.php');
				    require_once('../configs/smsMandril.php');
					require_once('../lib/url_shortener.php');
				$searchUserDetail = $model->searchUserDetail($data);	
				
				echo $searchUserDetail; die;
			}
			
		}
		
		
		public static function senderUserDetail($a = null , $b=null ,$c=null, $d=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../";
				$data=array();
				$model = new PersonalRequestsModel();
				$data['user_id']=$_SESSION['user_id'];
				$data['request_id']=$_POST['id'];
				   require_once('../configs/testMandril.php');
				$senderUserDetail = $model->senderUserDetail($data);	
				
				echo $senderUserDetail; die;
			}
			
		}
		
		public static function updateAccount($a = null , $b=null ,$c=null, $d=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				$model = new PersonalRequestsModel();
				$data['user_id']=$_SESSION['user_id'];
				$data['request_id']=cleanMe($a);
				   require_once('../configs/testMandril.php');
				$updateAccount = $model->updateAccount($data);	
				
				header("location:../sentRequests");
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
				$model = new PersonalRequestsModel();
				$data['user_id']=$_SESSION['user_id'];
				$rowsummary = $model->updateEmployeeDetail($data);	
				
				header('location:sentRequests');
			}
			
		}
	
	}
    
	
	
?>