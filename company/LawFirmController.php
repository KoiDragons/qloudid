<?php
	require_once 'LawFirmModel.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class LawFirmController
	{
		
		 public static function editPrice($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['sid']=cleanMe($b); 
				$data['id']=cleanMe($c); 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				$model1       = new LawFirmModel();
				$developerCount    = $model1->developerCount($data);
				 
				if($developerCount==-1)
				{
					header('location:../../../../AppsList/requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../../../../AppsList/requestStatus/'.$data['cid']); die;
				} 
				$companyDetail    = $model1->companyDetail($data);
				$servicePriceDetail    = $model1->servicePriceDetail($data);
				require_once('LawFirmServicePriceEditView.php');
			}
		}
		
		 public static function addPrice($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['sid']=cleanMe($b); 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				$model1       = new LawFirmModel();
				$developerCount    = $model1->developerCount($data);
				 
				if($developerCount==-1)
				{
					header('location:../../../AppsList/requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../../../AppsList/requestStatus/'.$data['cid']); die;
				} 
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('LawFirmServicePriceView.php');
			}
		}
		
		 public static function listPricing($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['sid']=cleanMe($b); 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				$model1       = new LawFirmModel();
				$developerCount    = $model1->developerCount($data);
				 
				if($developerCount==-1)
				{
					header('location:../../AppsList/requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../../AppsList/requestStatus/'.$data['cid']); die;
				} 
				$companyDetail    = $model1->companyDetail($data);
				
				$servicePriceCount    = $model1->servicePriceCount($data);
				 
				$servicePriceList    = $model1->servicePriceList($data);
				if($servicePriceCount['num']==0)
				{
					header('location:../../addPrice/'.$data['cid'].'/'.$data['sid']); die;
				}
				 
				require_once('LawFirmServicePriceListView.php');
			}
		}
		
		
		public static function addPricePlan($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new LawFirmModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['sid']=cleanMe($b);
				include('../configs/testMandril.php');
				$addPricePlan = $model->addPricePlan($data);
				header('location:../../listPricing/'.$data['cid'].'/'.$data['sid']);
			}
		}
		
		
		public static function updatePricePlan($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new LawFirmModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['sid']=cleanMe($b);
				$data['id']=cleanMe($c);
				include('../configs/testMandril.php');
				$updatePricePlan = $model->updatePricePlan($data);
				header('location:../../../listPricing/'.$data['cid'].'/'.$data['sid']);
			}
		}
		
	 public static function addInformation($a=null)
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
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				$model1       = new LawFirmModel();
				$developerCount    = $model1->developerCount($data);
				 
				if($developerCount==-1)
				{
					header('location:../../AppsList/requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../../AppsList/requestStatus/'.$data['cid']); die;
				} 
				$companyDetail    = $model1->companyDetail($data);
				$serviceArea    = $model1->serviceArea($data); 
				$typeOfLawer    = $model1->typeOfLawer($data);
				$barAssociations    = $model1->barAssociations($data);
				$mainPracticeAreas    = $model1->mainPracticeAreas($data);
				$practiceArea    = $model1->practiceArea($data);
				$row_summary    = $model1->userSummary($data);
				require_once('LawFirmView.php');
			}
		}
		
		 public static function resourceInformation($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['eid']=cleanMe($b); 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				$model1       = new LawFirmModel();
				$developerCount    = $model1->developerCount($data);
				 
				if($developerCount==-1)
				{
					header('location:../../../AppsList/requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../../../AppsList/requestStatus/'.$data['cid']); die;
				} 
				$companyDetail    = $model1->companyDetail($data);
				$serviceArea    = $model1->serviceArea($data); 
				$typeOfLawer    = $model1->typeOfLawer($data);
				$practiceArea    = $model1->practiceArea($data);
				$row_summary    = $model1->userSummary($data);
				$resourceInfoCount    = $model1->resourceInfoCount($data);
				if($resourceInfoCount['num']==1)
				{
					header('location:../../editResourceInformation/'.$data['cid'].'/'.$data['eid']); die;
				}
				require_once('LawFirmEmployeeResourceInformationView.php');
			}
		}
		
		public static function editResourceInformation($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['eid']=cleanMe($b);  
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				$model1       = new LawFirmModel();
				 $developerCount    = $model1->developerCount($data);
				 
				if($developerCount==-1)
				{
					header('location:../../../AppsList/requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../../../AppsList/requestStatus/'.$data['cid']); die;
				} 
				$companyDetail    = $model1->companyDetail($data);
				$typeOfLawer    = $model1->typeOfLawer($data);
				$resourceInfo    = $model1->resourceInfo($data); 
				$data['warning']=$resourceInfo['lawer_practice_area'];
				$practiceArea    = $model1->practiceAreaSelectedForLower($data);
				$data['languages_known']=$resourceInfo['languages_used_by_staff'];
				$languagesKnown    = $model1->languagesKnown($data);
				$row_summary    = $model1->userSummary($data);
				require_once('LawFirmEditEmployeeResourceInformationView.php');
			}
		}
		
			
		public static function addResource($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$model = new LawFirmModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['eid']=cleanMe($b);
				$addResource = $model->addResource($data);
				header('location:../../viewEmployees/'.$data['cid']);
			}
		}
		
		public static function updateResource($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$model = new LawFirmModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['eid']=cleanMe($b);
				$updateResource = $model->updateResource($data);
				header('location:../../viewEmployees/'.$data['cid']);
			}
		}
		public static function getLanguages()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				 
				$data['filter']=cleanMe($_GET['filter']);
				$model = new LawFirmModel();
				
				$getLanguages=$model->getLanguages($data);
				
				echo $getLanguages;
				
			}
		}
		public static function editInformation($a=null)
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
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				$model1       = new LawFirmModel();
				 $developerCount    = $model1->developerCount($data);
				 
				if($developerCount==-1)
				{
					header('location:../../AppsList/requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../../AppsList/requestStatus/'.$data['cid']); die;
				} 
				$companyDetail    = $model1->companyDetail($data);
				$lawCompanyInfo    = $model1->lawCompanyInfo($data); 
				$data['warning']=$lawCompanyInfo['type_of_lawer_info'];
				$typeOfLawer    = $model1->typeOfLawerSelected($data);
				$barAssociations    = $model1->barAssociations($data);
				$data['warning']=$lawCompanyInfo['main_practice_areas_detail'];
				$mainPracticeAreas    = $model1->mainPracticeAreasSelected($data);
				$data['warning']=$lawCompanyInfo['practice_area_detail'];
				$practiceArea    = $model1->practiceAreaSelected($data);
				$data['warning']=$lawCompanyInfo['service_area_detail'];
				$serviceArea    = $model1->serviceAreaSelected($data);
				$row_summary    = $model1->userSummary($data);
				require_once('LawFirmEditView.php');
			}
		}
		 public static function moreInformation($a=null)
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
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				$model1       = new LawFirmModel();
				$lawCompanyInfo    = $model1->lawCompanyInfo($data);  
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				$data['warning']=$lawCompanyInfo['service_area_detail'];
				$serviceArea    = $model1->serviceAreaSelected($data);
				require_once('LawFirmMoreInformationView.php');
			}
		}
		
		 public static function viewStatus($a=null)
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
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				$model1       = new LawFirmModel();
				$developerCount    = $model1->developerCount($data);
				 
				if($developerCount==-1)
				{
					header('location:../../AppsList/requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../../AppsList/requestStatus/'.$data['cid']); die;
				} 
				$lawCompanyInfo    = $model1->lawCompanyInfo($data);  
				if($lawCompanyInfo['is_approved']==1)
				{
				header('location:../moreInformation/'.$data['cid']); die;	
				}
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('LawFirmRequestStatusView.php');
			}
		}
		
		
		public static function viewEmployees($a=null)
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
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php"); die;
				}
				$model1       = new LawFirmModel();
				$developerCount    = $model1->developerCount($data);
				
				if($developerCount==-1)
				{
					header('location:../../AppsList/requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../../AppsList/requestStatus/'.$data['cid']); die;
				}  
				$companyDetail    = $model1->companyDetail($data);
				 
				$employeesDetail    = $model1->employeesDetail($data);
				 
				$row_summary    = $model1->userSummary($data);
				require_once('LawFirmEmployeesView.php');
			}
		}
		
		 
		public static function updateAdminStatus($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new LawFirmModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$updateAdminStatus = $model->updateAdminStatus($data);
				echo $updateAdminStatus; die;
			}
			
		}
		
		public static function sendRequest($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new LawFirmModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				include('../configs/testMandril.php');
				$sendRequest = $model->sendRequest($data);
				header('location:../moreInformation/'.$data['cid']);
			}
			
		}
		
		public static function updateRequest($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new LawFirmModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$updateRequest = $model->updateRequest($data);
				header('location:../moreInformation/'.$data['cid']);
			}
			
		}
	}
?>