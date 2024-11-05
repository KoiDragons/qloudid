<?php
	require_once 'UserHealthInfoModel.php';
	require_once '../configs/utility.php';
	class UserHealthInfoController
	{
		
		
		public static function index()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path         = "../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new UserHealthInfoModel();
				$row_summary    = $model1->userSummary($data);
				$rowProfile   = $model1->userProfileSummary($data);
				$bloodType    = $model1->bloodType();
				$userHealthDetail    = $model1->userHealthDetail($data);
				$userAllergyDetail    = $model1->userAllergyDetail($data);
				$userAllergyCount    = $model1->userAllergyCount($data);
				$userSicknessDetail    = $model1->userSicknessDetail($data);
				$userSicknessCount    = $model1->userSicknessCount($data);	
				require_once('UserHealthInfoView.php');
				 
			}
		}
		
		
		public static function addSicknessDetail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new UserHealthInfoModel();
				$row_summary    = $model1->userSummary($data);
				$rowProfile   = $model1->userProfileSummary($data);
				 
				require_once('UserSicknessView.php');
				 
			}
		}
		
		public static function addAllergyDetail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new UserHealthInfoModel();
				$row_summary    = $model1->userSummary($data);
				$rowProfile   = $model1->userProfileSummary($data);
				 
				require_once('UserAllergyView.php');
				 
			}
		}
		public static function addSickness()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:../LoginAccount");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new UserHealthInfoModel();
				
				$result    = $model1->addSickness($data);
				header("location:../UserHealthInfo");
			}
		}
		
		public static function addUpdateBloodInfo()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:../LoginAccount");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new UserHealthInfoModel();
				
				$result    = $model1->addUpdateBloodInfo($data);
				header("location:../UserHealthInfo");
			}
		}
		
		public static function addAllergy()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:../LoginAccount");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new UserHealthInfoModel();
				
				$result    = $model1->addAllergy($data);
				header("location:../UserHealthInfo");
			}
		}
		
		
		public static function deleteSicknessDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:../LoginAccount");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=cleanMe($a);
				$model1       = new UserHealthInfoModel();
				$result    = $model1->deleteSicknessDetail($data);
				header("location:../../UserHealthInfo");
			}
		}
		
			public static function deleteAllergyDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:../LoginAccount");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=cleanMe($a);
				$model1       = new UserHealthInfoModel();
				$result    = $model1->deleteAllergyDetail($data);
				header("location:../../UserHealthInfo");
			}
		}
	 }
	
	
?>