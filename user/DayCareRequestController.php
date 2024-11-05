<?php

	require_once 'DayCareRequestModel.php';
	require_once 'PersonalRequestsController.php';
	require_once 'ShareMonitorController.php';
	require_once 'ConnectKinController.php';
	require_once 'DaycareUserPricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class DayCareRequestController
	{
		
		
		public static function index()
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model       = new DayCareRequestModel();
				$userSummary = $model->userSummary($data);
				$data['ssn']=$userSummary['ssn'];
				$data['email']=$userSummary['email'];
				$updateParent = $model->updateParent($data);
				$selectIcon = $model->selectIcon($data);
				$requestReceivedDetail = $model->requestReceivedDetail($data);
				$requestReceivedCount = $model->requestReceivedCount($data);
				$requestApprovedDetail = $model->requestApprovedDetail($data);
				$requestApprovedCount = $model->requestApprovedCount($data);
				$requestRejectedDetail = $model->requestRejectedDetail($data);
				$requestRejectedCount = $model->requestRejectedCount($data);
				require_once('DayCareRequestView.php');
			}	
		}
		public static function updateParentRequest()
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model       = new DayCareRequestModel();
				$userSummary = $model->userSummary($data);
				$data['ssn']=$userSummary['ssn'];
				$data['email']=$userSummary['email'];
				$updateParent = $model->updateParent($data);
				$selectIcon = $model->selectIcon($data);
				 
				require_once('DaycareParentRequestView.php');
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
				$data['parent_id']=cleanMe($a);
				$model       = new DayCareRequestModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['did']=$childrenDetail['did'];
				$model3       = new DaycareUserPricePlanModel();
				$daycareTimelapsed    = $model3->daycareTimelapsed($data);
				$planDetails    = $model3->planDetails($data);
				if($daycareTimelapsed>14 && $planDetails==0)
				{
				header('location:../../DaycareUserPricePlan/planAccount/'.$data['did']);
				die;	
				}
				else if($planDetails==1)
				{
				header('location:../../NewsfeedDetail');
				die;	
					
				}
				$data['child_id']=$childrenDetail['child_id'];
				$attendenceDetail=$model->attendenceDetail($data);
				$selectIcon    = $model->selectIcon($data);
				$row_summary    = $model->userSummary($data);
				require_once('ChildAttendenceHistoryView.php');
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
				
				$model       = new DayCareRequestModel();
				
				$moreAttendenceInfo    = $model->moreAttendenceInfo($data);
				
				echo $moreAttendenceInfo; die;
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
				$data['parent_id']=cleanMe($a);
				$model       = new DayCareRequestModel();
				
				$childrenDetail    = $model->childrenDetail($data);
				$data['did']=$childrenDetail['did'];
				$model3       = new DaycareUserPricePlanModel();
				$daycareTimelapsed    = $model3->daycareTimelapsed($data);
				$planDetails    = $model3->planDetails($data);
				if($daycareTimelapsed>14 && $planDetails==0)
				{
				header('location:../../DaycareUserPricePlan/planAccount/'.$data['did']);
				die;	
				}
				else if($planDetails==1)
				{
				header('location:../../NewsfeedDetail');
				die;	
					
				}
				$data['child_id']=$childrenDetail['child_id'];
				$data['cid']=$childrenDetail['enc'];
				$childrenNewsInformationDetail    = $model->childNewsInformationDetail($data);
				$selectIcon    = $model->selectIcon($data);
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
				$data['parent_id']=cleanMe($a);
				$model       = new DayCareRequestModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['child_id']=$childrenDetail['child_id'];
				$data['cid']=$childrenDetail['enc'];
				$postChildNews = $model->postChildNews($data);	
				header("location:../childNewsDetail/".$data['parent_id']);
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
				$data['did']=cleanMe($a);
				$model       = new DayCareRequestModel();
				$childrenDetail    = $model->dependentDetail($data);
				$selectIcon    = $model->selectIcon($data);
				$row_summary    = $model->userSummary($data);
				$bloodType    = $model->bloodType();
				require_once('ChildInformationView.php');
			}
		}
		
		public static function childPassportInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['did']=cleanMe($a);
				$model       = new DayCareRequestModel();
				$countryCodeList = $model->countryOption(); 
				$identificatorDetail    = $model->dependentDetail($data);
				$selectIcon    = $model->selectIcon($data);
				$row_summary    = $model->userSummary($data);
				$bloodType    = $model->bloodType();
				require_once('DependentsPassportInfoView.php');
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
				$data['did']=cleanMe($a);
				$model       = new DayCareRequestModel();
				$updateChildInfo = $model->updateChildInfo($data);
				header("location:../../Dependents/dependentInfo/".$data['did']);
			}	
		}
		
		public static function updateDependentPassport($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['did']=cleanMe($a);
				$model       = new DayCareRequestModel();
				$updateDependentPassport = $model->updateDependentPassport($data);
				header("location:../../Dependents/dependentInfo/".$data['did']);
			}	
		}
		
		public static function checkUsedIdentificator($a)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['did']=cleanMe($a);
				$model = new DependentsModel();
				
				require_once('../configs/smsMandril.php');
				$checkUsedIdentificator = $model->checkUsedIdentificator($data);	
				
				echo $checkUsedIdentificator; die;
			}
			
		}
		public static function childNewsDaycareDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['parent_id']=cleanMe($a);
				$model       = new DayCareRequestModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['did']=$childrenDetail['did'];
				$model3       = new DaycareUserPricePlanModel();
				$daycareTimelapsed    = $model3->daycareTimelapsed($data);
				$planDetails    = $model3->planDetails($data);
				if($daycareTimelapsed>14 && $planDetails==0)
				{
				header('location:../../DaycareUserPricePlan/planAccount/'.$data['did']);
				die;	
				}
				else if($planDetails==1)
				{
				header('location:../../NewsfeedDetail');
				die;	
					
				}
				$data['cid']=$childrenDetail['enc'];
				$selectIcon    = $model->selectIcon($data);
				$childrenDetailAll    = $model->childrenDetailAll($data);
				$childrenNewsInformationDetail    = $model->childrenNewsInformationDetail($data);
				$dayCareDetail    = $model->dayCareDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('ChildNewsDaycareDetailView.php');
			}
		}
		
		public static function daycareWelcome($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['parent_id']=cleanMe($a);
				$model       = new DayCareRequestModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['cid']=$childrenDetail['enc'];
				$selectIcon    = $model->selectIcon($data);
				$childrenDetailAll    = $model->childrenDetailAll($data);
				$childrenNewsInformationDetail    = $model->childrenNewsInformationDetail($data);
				$dayCareDetail    = $model->dayCareDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('DaycareDependentWelcomeView.php');
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
				$data['parent_id']=cleanMe($a);
				$model       = new DayCareRequestModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['cid']=$childrenDetail['enc'];
				$postReply = $model->postReply($data);	
				header("location:../childNewsDaycareDetail/".$data['parent_id']);
			}	
		}
	
public static function postParentReply($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['parent_id']=cleanMe($a);
				$model       = new DayCareRequestModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['cid']=$childrenDetail['enc'];
				$postParentReply = $model->postParentReply($data);	
				header("location:../childNewsDetail/".$data['parent_id']);
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
				$data['parent_id']=cleanMe($a);
				
				$model       = new DayCareRequestModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['cid']=$childrenDetail['enc'];
				$data['child_id']=$childrenDetail['child_id'];
				$moreInformation    = $model->moreInformation($data);
				
				echo $moreInformation; die;
			}
		}
		
		
		public static function moreInformationChild($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['parent_id']=cleanMe($a);
				
				$model       = new DayCareRequestModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['cid']=$childrenDetail['enc'];
				$data['child_id']=$childrenDetail['child_id'];
				$moreInformationChild    = $model->moreInformationChild($data);
				
				echo $moreInformationChild; die;
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
				$data['cid']=cleanMe($a);
				
				$model       = new DayCareRequestModel();
				
				$moreComments    = $model->moreComments($data);
				
				echo $moreComments; die;
			}
		}
		
		public static function moreCommentsChild($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				
				$model       = new DayCareRequestModel();
				
				$moreCommentsChild    = $model->moreCommentsChild($data);
				
				echo $moreCommentsChild; die;
			}
		}
		
		
		public static function relativeInformation($a=null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['parent_id']=cleanMe($a);
				$model       = new DayCareRequestModel();
				$userSummary = $model->userSummary($data);
				$selectIcon = $model->selectIcon($data);
				$parentsDetail = $model->parentsDetail($data);
				$childrenDetail    = $model->childrenDetail($data);
				$data['did']=$childrenDetail['did'];
				$model3       = new DaycareUserPricePlanModel();
				$daycareTimelapsed    = $model3->daycareTimelapsed($data);
				$planDetails    = $model3->planDetails($data);
				if($daycareTimelapsed>14 && $planDetails==0)
				{
				header('location:../../DaycareUserPricePlan/planAccount/'.$data['did']);
				die;	
				}
				else if($planDetails==1)
				{
				header('location:../../NewsfeedDetail');
				die;	
					
				}
				$relativesDetail = $model->relativesDetail($data);
				$kinsDetail = $model->kinsDetail($data);
				//print_r($kinsDetail); die;
				require_once('RelativesInfoView.php');
			}	
		}
	public static function relativeDetailInfo($a=null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['parent_id']=cleanMe($a);
				$model       = new DayCareRequestModel();
				$userSummary = $model->userSummary($data);
				$childrenDetail    = $model->childrenDetail($data);
				$data['did']=$childrenDetail['did'];
				$model3       = new DaycareUserPricePlanModel();
				$daycareTimelapsed    = $model3->daycareTimelapsed($data);
				$planDetails    = $model3->planDetails($data);
				if($daycareTimelapsed>14 && $planDetails==0)
				{
				header('location:../../DaycareUserPricePlan/planAccount/'.$data['did']);
				die;	
				}
				else if($planDetails==1)
				{
				header('location:../../NewsfeedDetail');
				die;	
					
				}
				$resultContry = $model->selectCountry($data);
				$relationDetail = $model->relationDetail($data);
				
				require_once('RelativeDetailInfoView.php');
			}	
		}
		public static function addRelativePermission($a=null,$b=null,$c=null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['parent_id']=cleanMe($a);
				$data['kin_id']=cleanMe($b);
				$data['kin_user_id']=cleanMe($c);
				$model       = new DayCareRequestModel();
				$userSummary = $model->userSummary($data);
				$getKinSSN = $model->getKinSSN($data);
				$childrenDetail    = $model->childrenDetail($data);
				$data['did']=$childrenDetail['did'];
				$model3       = new DaycareUserPricePlanModel();
				$daycareTimelapsed    = $model3->daycareTimelapsed($data);
				$planDetails    = $model3->planDetails($data);
				if($daycareTimelapsed>14 && $planDetails==0)
				{
				header('location:../../DaycareUserPricePlan/planAccount/'.$data['did']);
				die;	
				}
				else if($planDetails==1)
				{
				header('location:../../NewsfeedDetail');
				die;	
					
				}
				require_once('RelativeSSNCheckView.php');
			}	
		}
		
		public static function relativePhotoInformation($a=null,$b=null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['parent_id']=cleanMe($b);
				$data['relative_id']=cleanMe($a);
				$model       = new DayCareRequestModel();
				$userSummary = $model->userSummary($data);
				$childrenDetail    = $model->childrenDetail($data);
				$data['did']=$childrenDetail['did'];
				$model3       = new DaycareUserPricePlanModel();
				$daycareTimelapsed    = $model3->daycareTimelapsed($data);
				$planDetails    = $model3->planDetails($data);
				if($daycareTimelapsed>14 && $planDetails==0)
				{
				header('location:../../DaycareUserPricePlan/planAccount/'.$data['did']);
				die;	
				}
				else if($planDetails==1)
				{
				header('location:../../NewsfeedDetail');
				die;	
					
				}
				require_once('RelativePhotoInformationView.php');
			}	
		}
		
		public static function addRelative($a=null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['parent_id']=cleanMe($a);
				$model       = new DayCareRequestModel();
				
				
				$addRelative = $model->addRelative($data);
				header('location:../relativeInformation/'.$data['parent_id']);
			}	
		}
		
		
		public static function updateInformation($a=null,$b=null,$c=null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['parent_id']=cleanMe($a);
				$data['kin_id']=cleanMe($b);
				$data['kin_user_id']=cleanMe($c);
				$model       = new DayCareRequestModel();
				$updateInformation = $model->updateInformation($data);
				header('location:../../../relativeInformation/'.$data['parent_id']);
			}	
		}
		
		
		public static function addKinasRelative($a=null,$b=null,$c=null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['parent_id']=cleanMe($a);
				$data['kin_id']=cleanMe($b);
				$data['kin_user_id']=cleanMe($c);
				$model       = new DayCareRequestModel();
				$addKinasRelative = $model->addKinasRelative($data);
				header('location:../../../relativeInformation/'.$data['parent_id']);
			}	
		}
		
		public static function updateImage($a=null,$b=null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['parent_id']=cleanMe($b);
				$data['relative_id']=cleanMe($a);
				$model       = new DayCareRequestModel();
				$updateImage = $model->updateImage($data);
				header('location:../../relativeInformation/'.$data['parent_id']);
			}	
		}
		
		
		public static function checkRelative($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['parent_id']=cleanMe($a);
				$model = new DayCareRequestModel();
				$checkRelative = $model->checkRelative($data);
				echo $checkRelative; die;
			}
		}
		
		public static function checkRelativeSsn($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['parent_id']=cleanMe($a);
				$data['kin_id']=cleanMe($b);
				$data['kin_user_id']=cleanMe($c);
				$model = new DayCareRequestModel();
				$checkRelativeSsn = $model->checkRelativeSsn($data);
				echo $checkRelativeSsn; die;
			}
		}
		
		public static function moreRequestReceivedDetail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new DayCareRequestModel();
				$userSummary = $model->userSummary($data);
				$data['ssn']=$userSummary['ssn'];
				$moreRequestReceivedDetail = $model->moreRequestReceivedDetail($data);
				echo $moreRequestReceivedDetail; die;
			}
		}
		
		public static function moreRejectedRequestDetail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new DayCareRequestModel();
				$moreRejectedRequestDetail = $model->moreRejectedRequestDetail($data);
				echo $moreRejectedRequestDetail; die;
			}
		}
		
			public static function moreApprovedRequestDetail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new DayCareRequestModel();
				$moreApprovedRequestDetail = $model->moreApprovedRequestDetail($data);
				echo $moreApprovedRequestDetail; die;
			}
		}
		
		public static function approveRequest($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=cleanMe($a);
				$model = new DayCareRequestModel();
				$approveRequest = $model->approveRequest($data);
				header("location:../../ShareMonitor/shareMonitorRequestList");
			}
		}
		public static function approveRequestParent($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 
				$data['id']=$_POST['uCode'];
				$model = new DayCareRequestModel();
				$approveRequest = $model->approveRequest($data);
				header("location:../DayCareRequest");
			}
		}
		public static function rejectRequest($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=cleanMe($a);
				
				$model = new DayCareRequestModel();
				$rejectRequest = $model->rejectRequest($data);
				
				header("location:../../ShareMonitor/shareMonitorRequestList");
			}
		}
	}
?>