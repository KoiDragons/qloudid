<?php
	require_once 'AddCompanyModel.php';
	require_once '../configs/utility.php';
	class AddCompanyController
	{
		
		
		public static function index()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path         = "../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model       = new AddCompanyModel();
				$resultContry = $model->selectCountry();
				$userSummary = $model->userSummary($data);
				$propertyDetailInfo = $model->propertyDetailInfo();    
				require_once('AddCompanyView.php');
			}
		}
		public static function checkCid()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new AddCompanyModel();
				
				$result    = $model1->checkCid($data);
				echo $result; die;
			}
		}
		
		public static function checkWeb()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new AddCompanyModel();
				
				$result    = $model1->checkWeb($data);
				echo $result; die;
			}
		}
		
		public static function checkEmail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new AddCompanyModel();
				
				$result    = $model1->checkEmail($data);
				echo $result; die;
			}
		}
		
		public static function addCompanyDetail()
		{ 
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
			} 
			else
			{
				$model = new AddCompanyModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['location'] = "Headquarter";
				 
				$result    = $model->addCompanyDetail($data);
				
				header("location:../../../company/index.php/ProfessionalCompany/selectedCompanyServices/".$result);
			}
		}
		
		
	}
	
	
?>