<?php
	require_once 'CompanyNewsModel.php';
	require_once '../company/EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class CompanyNewsController
	{
		
		
		public static function index()
		{
			
		}
		
		public static function CompanyNewsAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new CompanyNewsModel();
				$country    = $model1->countryList($data);
				$industry    = $model1->industryList($data);
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('CompanyNewsView.php');
			}
		}
		public static function shared($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:/../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				require_once('NewsfeedView.php');
			}
		}
		
		public static function searchUserDetail($a = null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../../";
				$data=array();
				$model = new CompanyNewsModel();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$searchUserDetail = $model->searchUserDetail($data);	
				
				echo $searchUserDetail; die;
			}
			
		}
		
		
	}
?>