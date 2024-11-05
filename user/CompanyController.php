<?php
	require_once 'CompanyModel.php';
	require_once '../company/EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class CompanyController
	{
		
		
		public static function index()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:LoginAccount");
				} else {
				$path = "../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new CompanyModel();
				$resultOrg    = $model1->userAccount($data);
				$completedEmployeeRequests    = $model1->completedEmployeeRequests($data);
				$resultOrg1    = $model1->employeeAccount($data);
				$row_summary    = $model1->userSummary($data);
				require_once('CompanyView.php');
			}
		}
		
		public static function companyAccount($a=null)
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
				$model1       = new CompanyModel();
				$country    = $model1->countryList($data);
				$countryOpt    = $model1->countryOption($data);
				$industry    = $model1->industryList($data);
				$industryOpt    = $model1->industryListOpt($data);
				$companyDetail    = $model1->companyDetail($data);
				$verificationId    = $model1->verificationId($data);
				$row_summary    = $model1->userSummary($data);
				require_once('CompanyView.php');
			}
		}
		
		public static function visitors($a=null,$b=null)
		{
			
			$path = "../../../../../";
			$data=array();
			
			$data['cid']=cleanMe($a);
			$data['bid']=cleanMe($b);
			$model1       = new CompanyModel();
			
			$resultContry    = $model1->countryOption($data);
			$verifyIP    = $model1->verifyIP($data);
			$getBookId    = $model1->getBookId($data);
			$companyDetail    = $model1->companyDetail($data);
			$visitorsBg    = $model1->visitorsBg($data);
			
			$data['comp_id']    = $model1->selectWhitelistCompany($data);
			$data['comp_name']    = $model1->selectWhitelistCompanyName($data);
			require_once('VisitorsView.php');
			
		}
		
		
		public static function updateVisitors($a=null)
		{
			
			$path = "../../../../";
			$data=array();
			
			$data['vid']=cleanMe($a);
			$data['visitor']=cleanMe($_GET['visitor']);
			$model1       = new CompanyModel();
			
			$companyVisitor    = $model1->companyVisitor($data);
			$visitorOnPage    = $model1->visitorOnPage($data);
			$data['comp_id']    = $model1->selectWhitelistVisitorCompany($data);
			$data['comp_name']    = $model1->selectWhitelistCompanyName($data);
			require_once('UpdateVisitorsView.php');
			
		}
		
		public static function confirmVisit($a=null)
		{
			
			$path = "../../../../";
			$data['vid']=cleanMe($a);
			$data['visitor']=1;
			$model1       = new CompanyModel();
			
			$visitorOnPage    = $model1->visitorOnPage($data);
			require_once('ConfirmVisitView.php');
			
		}
		
		public static function visitorsIP($a=null)
		{
			
			$path = "../../../../";
			$data=array();
			
			$data['cid']=cleanMe($a);
			
			header('location:https://www.qloudid.com/company/index.php/Company/visitorsIP/'.$data['cid']); die;
			$model1       = new CompanyModel();
			$companyDetail    = $model1->companyDetail($data);
			$verifyIP    = $model1->verifyIP($data);
			$data['comp_id']    = $model1->selectWhitelistCompany($data);
			$data['comp_name']    = $model1->selectWhitelistCompanyName($data);
			require_once('IPVisitorsView.php');
			
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
		
		public static function updateDataPost($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($co);
				$model1       = new CompanyModel();
				
				$result    = $model1->updateDataPost($data);
				echo $result; die;
			}
		}
		
		public static function updateDataPostNew($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($co);
				$model1       = new CompanyModel();
				
				$result    = $model1->updateDataPostNew($data);
				echo $result; die;
			}
		}
		
		public static function updateDataPostSupplier($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($co);
				$model1       = new CompanyModel();
				
				$result    = $model1->updateDataPostSupplier($data);
				echo $result; die;
			}
		}
		
		public static function updateDataPhone($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($co);
				$model1       = new CompanyModel();
				
				$result    = $model1->updateDataPhone($data);
				echo $result; die;
			}
		}
		
		public static function updateImage($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($co);
				$model1       = new CompanyModel();
				
				$result    = $model1->updateImage($data);
				header("location:../companyAccount/".$data['cid']);
			}
		}
		
		public static function updateData($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($co);
				$model1       = new CompanyModel();
				
				$result    = $model1->updateData($data);
				echo $result; die;
			}
		}
		
		public static function updateDataBank($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($co);
				$model1       = new CompanyModel();
				
				$result    = $model1->updateDataBank($data);
				echo $result; die;
			}
		}
		
		public static function searchCompanyDetail($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($c);
				$model1       = new CompanyModel();
				if (isset($_POST)) {
					$resultWeb = $model1->searchCompanyDetail($data);
				}
			}
			echo $resultWeb;
			die;
		}
		public static function searchCompanyCountry($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($c);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new CompanyModel();
				if (isset($_POST)) {
					$resultWeb = $model1->searchCompanyCountry($data);
				}
			}
			$resultWeb;
			die;
		}
		public static function updateAccount($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path="../../../";
				$model = new CompanyModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$_POST['total_value']=str_ireplace("'",'"',$_POST['total_value']);
				//print_r($_POST); die;
				$updateAccount=$model->updateAccount($data);
				header("location:../../CompanySuppliers/companyAccount/".$data['cid']);
				
			}
		}
		
		public static function employeeList($a=null, $b=null)
		{
			
			$data=array();
			
			$data['cid']=cleanMe($a);
			$data['filter']=cleanMe($_GET['filter']);
			$model = new CompanyModel();
			
			$employeeList=$model->employeeList($data);
			
			echo $employeeList;
			
			
		}
		
		public static function informEmployee($a=null)
		{
			
			$data=array();
			
			$data['cid']=cleanMe($a);
			
			$model = new CompanyModel();
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			require_once('../lib/url_shortener.php');
			$informEmployee=$model->informEmployee($data);
			
			echo $informEmployee;
			
			
		}
		
		
		public static function updateEmployeeVisitors($a=null,$b=null)
		{
			
				$data=array();
				$data['vid']=cleanMe($a);
				$data['visitor']=cleanMe($b);
				$model = new CompanyModel();
				$updateVisitors = $model->updateVisitors($data);
				header("location:../../updateVisitors/".$data['vid']."?visitor=".$data['visitor']);
			
		}
	}
?>