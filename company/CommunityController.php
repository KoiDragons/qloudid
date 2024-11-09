<?php
	
	require_once 'CommunityModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class CommunityController
	{
		 
		public static function listSociety($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				 
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data); 
				
				 
				if($companyDetail['company_type']!=2)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				$societyList    = $model->societyList($data);
				$row_summary    = $model->userSummary($data);
				require_once('CommunitySocietyView.php');
			}
		}
		
			public static function societyInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				 
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data); 
				if($companyDetail['company_type']!=2)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$societyList    = $model->societyList($data);
				
				$countryOptions    = $model->countryOptions();
				$countryCode    = $model->countryCode();
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				 
				$row_summary    = $model->userSummary($data);
				require_once('CommunitySocietyInfoView.php');
			}
		}
	 
		public static function societyAddinsInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['sid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data); 
				if($companyDetail['company_type']!=2)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				$countryOptions    = $model->countryOptions();
				$countryCode    = $model->countryCode();
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$societyDetailInfo    = $model->societyDetailInfo($data);
				require_once('CommunityAddinsView.php');
			}
		}
		
		
		public static function societyEditInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['sid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data); 
				if($companyDetail['company_type']!=2)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				$countryOptions    = $model->countryOptions();
				$countryCode    = $model->countryCode();
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$societyDetailInfo    = $model->societyDetailInfo($data);
				require_once('CommunitySocietyEditInfoView.php');
			}
		}
		
		public static function societyBoardMemberInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['sid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data); 
				if($companyDetail['company_type']!=2)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$societyDetailInfo    = $model->societyDetailInfo($data);
				$communityAvailableTenantsInfo    = $model->communityAvailableTenantsInfo($data);
				$communityPostsInfo    = $model->communityPostsInfo($data);
				require_once('CommunityBoardMemberInfoView.php');
			}
		}
		
	 public static function publishSocietyAmenitiesInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['sid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data); 
				if($companyDetail['company_type']!=2)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				$societyDetailInfo    = $model->societyDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$communityAvailableAmenitiesInfo    = $model->communityAvailableAmenitiesInfo($data);
				$communityBuildingsAvailableAmenitiesInfo    = $model->communityBuildingsAvailableAmenitiesInfo($data);
				//print_r($communityBuildingsAvailableAmenitiesInfo[0]['building_amenities']); die;
				require_once('CommunityAmenityPublishInfoView.php');
			}
		}
		
		 public static function societyPhotoInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['sid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data); 
				if($companyDetail['company_type']!=2)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				$societyDetailInfo    = $model->societyDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$displayPhotos    = $model->displayPhotos($data); 
				require_once('CommunityPhotoInfoView.php');
			}
		}
		
		
			public static function updatePhotos($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['sid']=cleanMe($co);
				$result    = $model1->updatePhotos($data);
				echo $result; die;
				}
		}
	
	public static function updatePhotoOrder($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['sid']=cleanMe($co);
				$result    = $model1->updatePhotoOrder($data);
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		public static function updatePhotoDragging($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['sid']=cleanMe($co);
				$result    = $model1->updatePhotoDragging($data);
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		public static function getPhoto($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['sid']=cleanMe($co);
				 
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		
		public static function getImageInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['sid']=cleanMe($co);
				 
				$result    = $model1->getImageInfo($data);
				echo $result; die;
				}
		}
		
		public static function deletePhoto($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['sid']=cleanMe($co);
				$result    = $model1->deletePhoto($data);
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		
		
		
		public static function checkAmenityInfo($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['sid']=cleanMe($b);
				$data['aid']=cleanMe($c);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data); 
				if($companyDetail['company_type']!=2)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				$societyDetailInfo    = $model->societyDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$communitySelectedAmenitiesInfo    = $model->communitySelectedAmenitiesInfo($data);
				$communitySelectedAmenitiesRulesInfo    = $model->communitySelectedAmenitiesRulesInfo($data);
				$communityBuildingsAvailableAmenitiesInfo    = $model->communityBuildingsAvailableAmenitiesInfo($data);
				require_once('CommunityAmenityAddInfoView.php');
			}
		}
		
		public static function amenityPhotoInfo($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['sid']=cleanMe($b);
				$data['aid']=cleanMe($c);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data); 
				if($companyDetail['company_type']!=2)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				$societyDetailInfo    = $model->societyDetailInfo($data);
				$workingHrs    = $model->workingHrs($data);
				$displayPhotos    = $model->displayAmenityPhotos($data);
				$communitySelectedAmenitiesInfo    = $model->communitySelectedAmenitiesInfo($data);
				$communityBuildingsAvailableAmenitiesInfo    = $model->communityBuildingsAvailableAmenitiesInfo($data);
				require_once('LandloardSocietyPhotoInfoView.php');
			}
		}
		
		
		public static function amenityRuleInfo($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$model       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['sid']=cleanMe($b);
				$data['aid']=cleanMe($c);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data); 
				if($companyDetail['company_type']!=2)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				$societyDetailInfo    = $model->societyDetailInfo($data);
				$workingHrs    = $model->workingHrs($data);
				$communitySelectedAmenitiesRulesInfo    = $model->communitySelectedAmenitiesRulesInfo($data);
				$communitySelectedAmenitiesInfo    = $model->communitySelectedAmenitiesInfo($data);
				$communityBuildingsAvailableAmenitiesInfo    = $model->communityBuildingsAvailableAmenitiesInfo($data);
				require_once('LandloardSocietyAmenityRuleInfoView.php');
			}
		}
		
		
		public static function updateSocietyAmenityHrs($a=null, $b=null, $c=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['sid']=cleanMe($b);
				$data['aid']=cleanMe($c);
				$result    = $model1->updateSocietyAmenityHrs($data);
				header("location:../../../amenityPhotoInfo/".$data['cid']."/".$data['sid']."/".$data['aid']);
				}
		}
		
		public static function updateAmenityDescription($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateAmenityDescription($data);
				echo $result; die;
				}
		}
		
		public static function updateAmenityPhotoDragging($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateAmenityPhotoDragging($data);
				$result    = $model1->displayAmenityPhotos($data);
				echo $result; die;
				}
		}
		
		public static function deleteAmenityPhoto($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->deleteAmenityPhoto($data);
				$result    = $model1->displayAmenityPhotos($data);
				echo $result; die;
				}
		}
		
		public static function updateAmenityPhotoOrder($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateAmenityPhotoOrder($data);
				$result    = $model1->displayAmenityPhotos($data);
				echo $result; die;
				}
		}
		
		public static function getAmenityPhoto($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				 
				$result    = $model1->displayAmenityPhotos($data);
				echo $result; die;
				}
		}
		
		public static function getAmenityImageInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				 
				$result    = $model1->getAmenityImageInfo($data);
				echo $result; die;
				}
		}
		
		
		public static function updateAmenityPhotos($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				$result    = $model1->updateAmenityPhotos($data);
				echo $result; die;
				}
		}
		
		
		
	 public static function societyAmenitiesInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['sid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data); 
				if($companyDetail['company_type']!=2)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				$societyDetailInfo    = $model->societyDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$communityAmenitiesInfo    = $model->communityAmenitiesInfo($data);
				require_once('CommunityAmenitiesInfoView.php');
			}
		}
		
		 public static function societyRulesInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['sid']=cleanMe($b);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data); 
				if($companyDetail['company_type']!=2)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				$societyDetailInfo    = $model->societyDetailInfo($data);
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$societyRulesList    = $model->societyRulesList($data);
				require_once('CommunityRulesInfoView.php');
			}
		}
		
		
		
		
		public static function updateAminity($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($co);
				$result    = $model1->updateAminity();
				if($result==1)
				{
				$result    = $model1->updatedAmenityDetail($data);	
				}
				
				echo $result; die;
				}
		}
		
		
		public static function updateRuleInfo()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$result    = $model1->updateRuleInfo();
				echo $result; die;
				}
		}
		
		
		public static function updateAmenityRuleInfo()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$result    = $model1->updateAmenityRuleInfo();
				echo $result; die;
				}
		}
		
		public static function updateCommunityAmenityDisplay()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 
				$result    = $model1->updateCommunityAmenityDisplay();
				 
				echo $result; die;
				}
		}
		
		public static function updateCommunityPost()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 
				$result    = $model1->updateCommunityPost();
				 
				echo $result; die;
				}
		}
		public static function updateBuildingAmenityDisplay()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 
				$result    = $model1->updateBuildingAmenityDisplay();
				 
				echo $result; die;
				}
		}
		
		
		
		public static function updateOpentime($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($co);
				$result    = $model1->updateOpentime();
				echo $result; die;
				}
		}
		
		
		public static function updateCloseTime($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($co);
				$result    = $model1->updateCloseTime();
				echo $result; die;
				}
		}
	 
	 	public static function societyBuildingInformation($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['sid']=cleanMe($b); 
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data); 
				if($companyDetail['company_type']!=2)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$buildingsSocietyList    = $model->buildingsSocietyList($data);
				$row_summary    = $model->userSummary($data);
				require_once('CommunitySocietyBuildingsInfoView.php');
			}
		}
	 
	 
	 
	 public static function addSociety($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				 
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data); 
				if($companyDetail['company_type']!=2)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				
				$addSociety    = $model->addSociety($data);
				header('location:../listSociety/'.$data['cid']); 
			}
		}
	 
	 
	  public static function updateSocietyInfo($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['sid']=cleanMe($b); 
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data); 
				if($companyDetail['company_type']!=2)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				$addSociety    = $model->updateSocietyInfo($data);
				
				header('location:../../listSociety/'.$data['cid']); 
			}
		}
	 
		  public static function addBuildingtoSociety($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$model       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['sid']=cleanMe($a);
				$addSociety    = $model->addBuildingtoSociety($data);
				echo $addSociety; die;
			}
		}
		
		public static function removeBuildingFromSociety($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$model       = new CommunityModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['sid']=cleanMe($a);
				$addSociety    = $model->removeBuildingFromSociety($data);
				echo $addSociety; die;
			}
		}
	 
	}
?>