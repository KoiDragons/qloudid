<?php

	require_once 'ChilldCareModel.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class ChilldCareController
	{
		
	
		
		public static function helpCenter($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new ChilldCareModel();
				$data['app_id']    = $model->appId();
				$selectIcon    = $model->selectIcon($data);
				$childCount    = $model->childCount($data);
				$childrenDetail    = $model->childrenDetail($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				$model3       = new DaycarePricePlanModel();
				$daycareTimelapsed    = $model3->daycareTimelapsed($data);
				 
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				$planDetails    = $model3->planDetails($data);
				
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				if($daycareTimelapsed>14 && $planDetails==0)
				{
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid'].'/'.$data['app_id']);
				die;	
				}
				
				$model1       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model1->adminRequestReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('ChilldCareView.php');
			}
		}
		
		
		public static function pendingChildren($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new ChilldCareModel();
				$data['app_id']    = $model->appId();
				$model3       = new DaycarePricePlanModel();
				$daycareTimelapsed    = $model3->daycareTimelapsed($data);
				
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				$planDetails    = $model3->planDetails($data);
				
				if($appdownloadStatus==0)
				{
					header('location:../../Brand/productPage/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
					die;
				}
				if($daycareTimelapsed>14 && $planDetails==0)
				{
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
				die;	
				}
				
				
				$selectIcon    = $model->selectIcon($data);
				$childCount    = $model->childCount($data);
				$childrenDetailPending    = $model->childrenDetailPending($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				
				$model1       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model1->adminRequestReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				
				
				
				require_once('ChilldCarePendingView.php');
			}
		}
		
		
		public static function childCareNews($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new ChilldCareModel();
				$data['app_id']    = $model->appId();
				$model3       = new DaycarePricePlanModel();
				$daycareTimelapsed    = $model3->daycareTimelapsed($data);
				 
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				$planDetails    = $model3->planDetails($data);
				
				if($appdownloadStatus==0)
				{
					header('location:../../Brand/productPage/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
					die;
				}
				if($daycareTimelapsed>14 && $planDetails==0)
				{
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
				die;	
				}
				
				 
				$selectIcon    = $model->selectIcon($data);
				$childrenNewsInformationDetail= $model->childrenNewsInformationDetail($data);
				$parentImages    = $model->parentImages($data);
				$parentCount    = $model->parentCount($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('ChildCareNewsView.php');
			}
		}
		
		public static function childCareNewsComments($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new ChilldCareModel();
				$data['app_id']    = $model->appId();
				$model3       = new DaycarePricePlanModel();
				$daycareTimelapsed    = $model3->daycareTimelapsed($data);
				
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				$planDetails    = $model3->planDetails($data);
				
				if($appdownloadStatus==0)
				{
					header('location:../../Brand/productPage/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
					die;
				}
				if($daycareTimelapsed>14 && $planDetails==0)
				{
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
				die;	
				}
				
				 
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('ChildCareNewsCommentView.php');
			}
		}
		
		public static function careInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new ChilldCareModel();
				$data['app_id']    = $model->appId();
				$model3       = new DaycarePricePlanModel();
				$daycareTimelapsed    = $model3->daycareTimelapsed($data);
				
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				$planDetails    = $model3->planDetails($data);
				
				if($appdownloadStatus==0)
				{
					header('location:../../Brand/productPage/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
					die;
				}
				if($daycareTimelapsed>14 && $planDetails==0)
				{
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
				die;	
				}
				
				 
				$companyDetail    = $model->companyDetail($data);
				$countryCodeList    = $model->countryCodeList();
				$row_summary    = $model->userSummary($data);
				require_once('ChilldCareInfoView.php');
			}
		}
		
		
		public static function childPhotoInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['child_id']=cleanMe($a);
				$model       = new ChilldCareModel();
				$data['app_id']    = $model->appId();
				
				$childrenDetail    = $model->childDetail($data);
				$data['cid']=$childrenDetail['enc'];
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$daycareTimelapsed    = $model3->daycareTimelapsed($data);
				
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				$data['app_id']    = $model->appId();
				$planDetails    = $model3->planDetails($data);
				
				if($appdownloadStatus==0)
				{
					header('location:../../Brand/productPage/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
					die;
				}
				if($daycareTimelapsed>14 && $planDetails==0)
				{
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
				die;	
				}
				$companyDetail    = $model->companyDetail($data);
				
				$row_summary    = $model->userSummary($data);
				require_once('ChilldCareInfoPhotoView.php');
			}
		}
		
		public static function checkSsn($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new ChilldCareModel();
				
				$checkSsn    = $model->checkSsn($data);
				
				echo $checkSsn; die;
			}
		}
		
		public static function moreChildrenDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new ChilldCareModel();
				
				$moreChildrenDetail    = $model->moreChildrenDetail($data);
				
				echo $moreChildrenDetail; die;
			}
		}
		
		
		public static function morePendingChildrenDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new ChilldCareModel();
				
				$moreChildrenDetail    = $model->morePendingChildrenDetail($data);
				
				echo $moreChildrenDetail; die;
			}
		}
		public static function moreInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new ChilldCareModel();
				
				$moreInformation    = $model->moreInformation($data);
				
				echo $moreInformation; die;
			}
		}
		public static function moreComments($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new ChilldCareModel();
				
				$moreComments    = $model->moreComments($data);
				
				echo $moreComments; die;
			}
		}
		
		
		public static function addChildInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				require_once('../configs/testMandril.php');
				$model       = new ChilldCareModel();
				$addChildInfo = $model->addChildInfo($data);	
				header("location:../childPhotoInfo/".$addChildInfo);
			}	
		}
		
		public static function updateChildInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['child_id']=cleanMe($a);
				$model       = new ChilldCareModel();
				$updateChildInfo = $model->updateChildInfo($data);	
				header("location:../helpCenter/".$updateChildInfo);
			}	
		}
		
		public static function postChildNewsComment($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new ChilldCareModel();
				//print_r($_POST); die;
				$postChildNewsComment = $model->postChildNewsComment($data);	
				header("location:../childCareNews/".$data['cid']);
			}	
		}
		
		
		public static function postChildNews($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new ChilldCareModel();
				//print_r($_POST); die;
				$postChildNews = $model->postChildNews($data);	
				header("location:../childCareNews/".$data['cid']);
			}	
		}
		public static function postReply($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new ChilldCareModel();
				//print_r($_POST); die;
				$postReply = $model->postReply($data);	
				header("location:../childCareNews/".$data['cid']);
			}	
		}
	}
?>