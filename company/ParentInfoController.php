<?php

	require_once 'ParentInfoModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class ParentInfoController
	{
		
	
		
		public static function parentDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['child_id']=cleanMe($a);
				
				$model       = new ParentInfoModel();
				$data['app_id']    = $model->appId();
				$childrenDetail    = $model->childrenDetail($data);
				if($childrenDetail['dependent_id']!=null)
				{
					header('location:../parentRelativeDetail/'.$data['child_id']); die;
				}
				$data['cid']=$childrenDetail['enc'];
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
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
				
				
				$resultContry = $model->selectCountry();
				$countryCodeList    = $model->countryCodeList();
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('ParentInfoSSNView.php');
			}
		}
		public static function parentEmailDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['child_id']=cleanMe($a);
				$model       = new ParentInfoModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['cid']=$childrenDetail['enc'];
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
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
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid']);
				die;	
				}
				
				$resultContry = $model->selectCountry();
				
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('ParentInfoView.php');
			}
		}
		
		
		public static function parentPassport($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['child_id']=cleanMe($a);
				$data['parent_user_id']=cleanMe($b);
				$model       = new ParentInfoModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['cid']=$childrenDetail['enc'];
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$daycareTimelapsed    = $model3->daycareTimelapsed($data);
				
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				
				$planDetails    = $model3->planDetails($data);
				
				if($appdownloadStatus==0)
				{
					header('location:../../../Brand/productPage/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
					die;
				}
				if($daycareTimelapsed>14 && $planDetails==0)
				{
				header('location:../../../DaycarePricePlan/planAccount/'.$data['cid']);
				die;	
				}
				$selectIcon    = $model->selectIcon($data);
				$resultContry = $model->selectCountry();
				$parentPassportDetail = $model->parentPassportDetail($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('ParentPassportDetailView.php');
			}
		}
		
		
		public static function parentRelativeDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['child_id']=cleanMe($a);
				$model       = new ParentInfoModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['cid']=$childrenDetail['enc'];
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
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
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid']);
				die;	
				}
				
				$parentsDetail=$model->parentsDetail($data);
				$parentsRequestDetail=$model->parentsRequestDetail($data);
				 
				$parentsRejectDetail=$model->parentsRejectDetail($data);
				$parentsRejectCount=$model->parentsRejectCount($data);
				$parentsApproveCount=$model->parentsApproveCount($data);
				$parentsRequestCount=$model->parentsRequestCount($data);
				
				$selectIcon    = $model->selectIcon($data);
				
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('ParentDetailView.php');
			}
		}
	
	
	public static function parentRequestDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['child_id']=cleanMe($a);
				$model       = new ParentInfoModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['cid']=$childrenDetail['enc'];
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				 
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
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid']);
				die;	
				}
				
				$parentsRequestDetail=$model->parentsRequestDetail($data);
				 
				
				$selectIcon    = $model->selectIcon($data);
				
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('ParentRequestDetailView.php');
			}
		}
	
	public static function parentRejectDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['child_id']=cleanMe($a);
				$model       = new ParentInfoModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['cid']=$childrenDetail['enc'];
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				
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
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid']);
				die;	
				}
				
				$parentsRejectDetail=$model->parentsRejectDetail($data);
				 
				
				$selectIcon    = $model->selectIcon($data);
				
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('ParentRejectDetailView.php');
			}
		}
	
	
	public static function relativeDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['child_id']=cleanMe($a);
				$model       = new ParentInfoModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['cid']=$childrenDetail['enc'];
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				
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
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid']);
				die;	
				}
				
				$relativesDetail=$model->relativesDetail($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('ParentRelativeDetailView.php');
			}
		}
		public static function childAttendenceHistory($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['child_id']=cleanMe($a);
				$model       = new ParentInfoModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['cid']=$childrenDetail['enc'];
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				
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
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid']);
				die;	
				}
				
				$attendenceDetail=$model->attendenceDetail($data);
				
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('ChildAttendenceHistoryView.php');
			}
		}
		
		
		public static function childInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['child_id']=cleanMe($a);
				$model       = new ParentInfoModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['cid']=$childrenDetail['enc'];
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				
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
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid']);
				die;	
				}
				
				$selectIcon    = $model->selectIcon($data);
				$bloodType    = $model->bloodType();
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('ChildInformationView.php');
			}
		}
		
		public static function childNewsDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['child_id']=cleanMe($a);
				$model       = new ParentInfoModel();
				$childrenDetail    = $model->childrenDetail($data);
				 
				$data['cid']=$childrenDetail['enc'];
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				
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
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid']);
				die;	
				}
				
				$childrenNewsInformationDetail= $model->childrenNewsInformationDetail($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('ChildNewsDetailView.php');
			}
		}
			public static function postChildNews($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['child_id']=cleanMe($a);
				$model       = new ParentInfoModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['cid']=$childrenDetail['enc'];
				$postChildNews = $model->postChildNews($data);	
				header("location:../childNewsDetail/".$data['child_id']);
			}	
		}
		
		public static function postReply($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['child_id']=cleanMe($a);
				$model       = new ParentInfoModel();
				//print_r($_POST); die;
				$postReply = $model->postReply($data);	
				header("location:../childNewsDetail/".$data['child_id']);
			}	
		}
		
		
		public static function moreInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['child_id']=cleanMe($a);
				$model       = new ParentInfoModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['cid']=$childrenDetail['enc'];
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				
				$moreInformation    = $model->moreInformation($data);
				
				echo $moreInformation; die;
			}
		}
		
		
		public static function moreComments($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['child_id']=cleanMe($a);
				$model       = new ParentInfoModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['cid']=$childrenDetail['enc'];
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				
				$moreComments    = $model->moreComments($data);
				
				echo $moreComments; die;
			}
		}
		
	
	
		public static function checkParentSsn($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['child_id']=cleanMe($a);
				
				$model       = new ParentInfoModel();
				
				$checkSsn    = $model->checkParentSsn($data);
				
				echo $checkSsn; die;
			}
		}
		
		public static function moreAttendenceInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['child_id']=cleanMe($a);
				
				$model       = new ParentInfoModel();
				
				$moreAttendenceInfo    = $model->moreAttendenceInfo($data);
				
				echo $moreAttendenceInfo; die;
			}
		}
		
		public static function addParentInfo($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['child_id']=cleanMe($a);
				$data['cid']=cleanMe($b);
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				$model       = new ParentInfoModel();
				$addParentInfo = $model->addParentInfo($data);
		
				header("location:../../../ChilldCare/helpCenter/".$data['cid']);
			}	
		}
		
		public static function addParentEmailInfo($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['child_id']=cleanMe($a);
				$data['cid']=cleanMe($b);
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				$model       = new ParentInfoModel();
				$addParentEmailInfo = $model->addParentEmailInfo($data);
		
				header("location:../../../ChilldCare/helpCenter/".$data['cid']);
			}	
		}
		public static function updateChildInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['child_id']=cleanMe($a);
				$model       = new ParentInfoModel();
				$updateChildInfo = $model->updateChildInfo($data);
				header("location:../childInformation/".$data['child_id']);
			}	
		}
		
	}
?>