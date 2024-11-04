<?php
	
	require_once 'DropInQueueModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class DropInQueueController
	{
		public static function employeeList($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new DropInQueueModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['id']=cleanMe($b);
				 
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				} 
				$checkPermission    = $model->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:https://www.qloudid.com/user/index.php/NewsfeedDetail");
				}
				$queueDetail    = $model->queueDetail($data);
				$employeeDetail    = $model->employeeDetail($data);
				require_once('DropInQueueEmployeeInfoView.php');
			}
		}
		
		public static function addOperator($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$model       = new DropInQueueModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['id']=cleanMe($b);
				$data['eid']=cleanMe($c); 
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				} 
				$checkPermission    = $model->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:https://www.qloudid.com/user/index.php/NewsfeedDetail");
				}
				$queueDetail    = $model->queueDetail($data);
				$addOperator    = $model->addOperator($data);
				header('location:../../../employeeList/'.$data['cid'].'/'.$data['id']);
			}
		}
		
		public static function removeOperator($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$model       = new DropInQueueModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['id']=cleanMe($b);
				$data['eid']=cleanMe($c); 
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				} 
				$checkPermission    = $model->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:https://www.qloudid.com/user/index.php/NewsfeedDetail");
				}
				$queueDetail    = $model->queueDetail($data);
				$removeOperator    = $model->removeOperator($data);
				header('location:../../../employeeList/'.$data['cid'].'/'.$data['id']);
			}
		}
		
		
		
			public static function waitingGuests($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new DropInQueueModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b); 
				$data['qid']=cleanMe($c); 
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				} 
				 
				$queueDetailInfo    = $model->queueGuestInWaiting($data);
				require_once('DropInQueueWaitingGuestsView.php');
			}
		}
		
		  public static function updateNoShow($a=null,$b=null,$c=null,$d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b); 
				$data['qid']=cleanMe($c); 
				$data['gid']=cleanMe($d); 
				$model       = new DropInQueueModel();
				$updateNoShow = $model->updateNoShow($data);	
				header("location:../../../../waitingGuests/".$data['cid']."/".$data['lid']."/".$data['qid']);
			}	
		} 
		
		
		 public static function updateInServicing($a=null,$b=null,$c=null,$d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b); 
				$data['qid']=cleanMe($c); 
				$data['gid']=cleanMe($d); 
				$model       = new DropInQueueModel();
				$updateInServicing = $model->updateInServicing($data);	
				header("location:../../../../inServicingGuests/".$data['cid']."/".$data['lid']."/".$data['qid']);
			}	
		} 
		
		
		 public static function updateCloseService($a=null,$b=null,$c=null,$d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b); 
				$data['qid']=cleanMe($c); 
				$data['gid']=cleanMe($d); 
				$model       = new DropInQueueModel();
				$updateCloseService = $model->updateCloseService($data);	
				header("location:../../../../nextWaitingGuestInformation/".$data['cid']."/".$data['lid']."/".$data['qid']);
			}	
		} 
		
		public static function nextWaitingGuestInformation($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new DropInQueueModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b); 
				$data['qid']=cleanMe($c); 
				 
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				} 
				 
				$queueGuestWaitingCount    = $model->queueGuestWaitingCount($data);
				if($queueGuestWaitingCount['num']==0)
				{
				header('location:../../../closedServiceGuests/'.$data['cid'].'/'.$data['lid'].'/'.$data['qid']); die;	
				}
				$data['gid']= $model->queueGuestWaitingInQueueNext($data);
				//print_r($data); die;
				require_once('DropInQueueDoneServingView.php');
			}
		}
		
		 public static function alertGuest($a=null,$b=null,$c=null,$d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b); 
				$data['qid']=cleanMe($c); 
				$data['gid']=cleanMe($d); 
				$model       = new DropInQueueModel();
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				$alertGuest = $model->alertGuest($data);	
				header("location:../../../../waitingGuestInformation/".$data['cid']."/".$data['lid']."/".$data['qid']."/".$data['gid']);
			}	
		} 

		public static function waitingGuestInformation($a=null,$b=null,$c=null,$d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../../";
				$model       = new DropInQueueModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b); 
				$data['qid']=cleanMe($c); 
				$data['gid']=cleanMe($d); 
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				} 
				 
				$queueGuestDetail    = $model->queueGuestDetail($data);
				if($queueGuestDetail['is_serviced']>0)
				{
				header('location:../../../../waitingGuests/'.$data['cid'].'/'.$data['lid'].'/'.$data['qid']); die;	
				}
				require_once('DropInQueueWaitingGuestInformationView.php');
			}
		}
		
		
		public static function servicingGuestInformation($a=null,$b=null,$c=null,$d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../../";
				$model       = new DropInQueueModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b); 
				$data['qid']=cleanMe($c); 
				$data['gid']=cleanMe($d); 
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				} 
				 
				$queueGuestDetail    = $model->queueGuestDetail($data);
				$queueGuestOperatorDetail    = $model->queueGuestOperatorDetail($data);
				if($queueGuestDetail['is_serviced']>1)
				{
				header('location:../../../../waitingGuests/'.$data['cid'].'/'.$data['lid'].'/'.$data['qid']); die;	
				}
				require_once('DropInQueueInServiceGuestInformationView.php');
			}
		}
		
		
		
		public static function inServicingGuests($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new DropInQueueModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b); 
				$data['qid']=cleanMe($c); 
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				} 
				 
				$queueDetailInfo    = $model->queueGuestInServicing($data);
				require_once('DropInQueueServicingGuestsView.php');
			}
		}
		
		public static function closedServiceGuests($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new DropInQueueModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b); 
				$data['qid']=cleanMe($c); 
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				} 
				 
				$queueDetailInfo    = $model->queueGuestServiced($data);
				$queueGuestServicedCount    = $model->queueGuestServicedCount($data);
				require_once('DropInQueueServicedGuestsView.php');
			}
		}
		
		public static function moreQueueGuestServiced($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['qid']=cleanMe($a);
				$model = new DropInQueueModel();
				$moreQueueGuestServiced = $model->moreQueueGuestServiced($data);
				echo $moreQueueGuestServiced; die;
			}
		}
			public static function availableQueue($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new DropInQueueModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b); 
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				} 
				 
				$queueDetailInfo    = $model->queueDetailLocationInfo($data);
				   
				$queueDetailInfoCount    = $model->queueDetailLocationInfoCount($data);
				require_once('DropInQueueLocationView.php');
			}
		}
		
			public static function listQueue($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new DropInQueueModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				 
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				} 
				$checkPermission    = $model->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:https://www.qloudid.com/user/index.php/NewsfeedDetail");
				}
				$queueDetailInfo    = $model->queueDetailInfo($data);
				
				$queueDetailInfoCount    = $model->queueDetailInfoCount($data);
				require_once('DropInQueueView.php');
			}
		}
		
			public static function queueinformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new DropInQueueModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				 
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				} 
				$checkPermission    = $model->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:https://www.qloudid.com/user/index.php/NewsfeedDetail");
				}
				$locationDetail    = $model->locationDetail($data);
				$workingHrs    = $model->workingHrs($data);
				require_once('DropInQueueInfoView.php');
			}
		}
		
			public static function editQueueinformation($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new DropInQueueModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['id']=cleanMe($b);
				 
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				} 
				$checkPermission    = $model->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:https://www.qloudid.com/user/index.php/NewsfeedDetail");
				}
				$queueDetail    = $model->queueDetail($data);
				$locationDetail    = $model->locationDetail($data);
				$workingHrs    = $model->workingHrs($data);
				require_once('DropInQueueEditInfoView.php');
			}
		}
		
		
		
		public static function moreQueueDetailInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new DropInQueueModel();
				$moreQueueDetailInfo = $model->moreQueueDetailInfo($data);
				echo $moreQueueDetailInfo; die;
			}
		}
		 
		 
		 public static function addQueue($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new DropInQueueModel();
				$addQueue = $model->addQueue($data);	
				header("location:../listQueue/".$data['cid']);
			}	
		} 
		
		 public static function updateQueue($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['id']=cleanMe($b);
				$model       = new DropInQueueModel();
				$updateQueue = $model->updateQueue($data);	
				header("location:../../listQueue/".$data['cid']);
			}	
		}

	

		
	}
?>