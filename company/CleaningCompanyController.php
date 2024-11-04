<?php
	require_once 'CleaningCompanyModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class CleaningCompanyController
	{
		public static function assignCleaningRequest($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['jid']=cleanMe($b); 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				
				$model1       = new CleaningCompanyModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model1->companyDetail($data);
				$cleanersList    = $model1->cleanersList($data);
				require_once('CleaningCompanyAssignRequestToEmployeeView.php');
			}
		}
			public static function teamLeaderInfo($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['jid']=cleanMe($b); 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				
				$model1       = new CleaningCompanyModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model1->companyDetail($data);
				$cleanersList    = $model1->cleanersAssignedList($data);
				require_once('CleaningCompanyJobAssignedEmployeeView.php');
			}
		}
		
		public static function updateLeader($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['jid']=cleanMe($b); 
				$data['lid']=cleanMe($c); 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				
				$model1       = new CleaningCompanyModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$updateLeader    = $model1->updateLeader($data);
				 header("location:../../../assignedCleaningRequest/".$data['cid']);
			}
		}
		public static function assignJobToEmployees($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['jid']=cleanMe($b); 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				
				$model1       = new CleaningCompanyModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$assignJobToEmployees    = $model1->assignJobToEmployees($data);
				 header("location:../../assignedCleaningRequest/".$data['cid']);
			}
		}
		
			public static function premiumQualifiedRequest($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				
				$model1       = new CleaningCompanyModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model1->companyDetail($data);
				$premiumQualifiedCount    = $model1->premiumQualifiedCount($data);
				if($premiumQualifiedCount>0)
				{
					header('location:../requestStatus/'.$data['cid']); die;
				}
				require_once('CleaningCompanyPremiumQualifiedRequestView.php');
			}
		}
		
		
		public static function sendPremiumAccountRequest($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($co);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new CleaningCompanyModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$premiumQualifiedCount    = $model1->premiumQualifiedCount($data);
				if($premiumQualifiedCount==0)
				{
				require_once('../configs/testMandril.php');
				$sendPremiumAccountRequest    = $model1->sendPremiumAccountRequest($data);
				}
				header('location:../requestStatus/'.$data['cid']); die;
				
				 
			}
			
		}
		
		public static function requestStatus($a = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new CleaningCompanyModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$premiumQualifiedCount    = $model1->premiumQualifiedCount($data);
				if($premiumQualifiedCount==0)
				{
					header('location:../premiumQualifiedRequest/'.$data['cid']); die;
				}
				$premiumQualifiedCount    = $model1->premiumQualifiedAccountInfo($data);
				require_once('CleaningCompanyPremiumQualifiedRequestStatusView.php');
			}
			
		}
			public static function availableCleaningJobs($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				
				$model1       = new CleaningCompanyModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model1->companyDetail($data);
				$employeeCleaningRequest    = $model1->employeeCleaningRequest($data);
				require_once('CleaningCompanyAssignedEmployeeJobView.php');
			}
		}
		
			public static function assignedCleaningRequest($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				
				$model1       = new CleaningCompanyModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model1->companyDetail($data);
				$assignedCleaningRequest    = $model1->assignedCleaningRequest($data);
				require_once('CleaningCompanyAssignedServiceRequestInformationView.php');
			}
		}
		
		public static function receivedCleaningRequest($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				
				$model1       = new CleaningCompanyModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model1->companyDetail($data);
				$receivedCleaningRequest    = $model1->receivedCleaningRequest($data);
				require_once('CleaningCompanyReceivedServiceRequestInformationView.php');
			}
		}
		  public static function serviceInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				
				$model1       = new CleaningCompanyModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('CleaningCompanyMoreInformationView.php');
			}
		}
		
		   public static function serviceType($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				
				$model1       = new CleaningCompanyModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$listServiceType    = $model1->listServiceType($data);
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('CleaningCompanyServiceTypeView.php');
			}
		}
		
		
		public static function serviceCategory($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
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
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				
				$model1       = new CleaningCompanyModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$serviceTypeInfo    = $model1->serviceTypeInfo($data);
				$listServiceCategory    = $model1->listServiceCategory($data);
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('CleaningCompanyServiceCategoryView.php');
			}
		}
		
		public static function serviceCategoryPricingInfo($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['sid']=cleanMe($b); 
				$data['catg_availability_id']=cleanMe($c); 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				
				$model1       = new CleaningCompanyModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$categoryTypePricingInfo    = $model1->categoryTypePricingInfo($data);
				if($categoryTypePricingInfo['is_available']==0)
				{
				header('location:../../../serviceCategoryTodo/'.$data['cid'].'/'.$data['sid'].'/'.$data['catg_availability_id']);	die;
				}
				$categoryTypeInfo    = $model1->categoryTypeInfo($data);
				$data['catg_id']=$categoryTypeInfo['enc']; 
				$serviceTypeInfo    = $model1->serviceTypeInfo($data);
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('CleaningCompanyServiceCategoryPricingInfoView.php');
			}
		} 
		
		
		public static function updateCategoryPricing($a=null,$b=null,$c=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header('location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp');die;
				} else {
				$model1       = new CleaningCompanyModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['sid']=cleanMe($b); 
				$data['catg_id']=cleanMe($c); 
				$result    = $model1->updateCategoryPricing($data);
				header('location:../../../serviceCategory/'.$data['cid'].'/'.$data['sid']);
				}
		}
		
		public static function serviceCategoryTodo($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['sid']=cleanMe($b); 
				$data['catg_availability_id']=cleanMe($c); 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				
				$model1       = new CleaningCompanyModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$categoryTypeInfo    = $model1->categoryTypeInfo($data);
				$data['catg_id']=$categoryTypeInfo['enc']; 
				$serviceTypeInfo    = $model1->serviceTypeInfo($data);
				$cleaningTodoCount    = $model1->cleaningTodoCount($data);
				$serviceTodoDetail    = $model1->serviceTodoDetail($data);
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('CleaningCompanyServiceCategoryTodoView.php');
			}
		} 
		
		public static function updateCategoryServiceAllTodos($a=null,$b=null,$c=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount/loginapp"; </script>'; die;
				} else {
				$model1       = new CleaningCompanyModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['sid']=cleanMe($b); 
				$data['catg_id']=cleanMe($c); 
				$result    = $model1->updateCategoryServiceAllTodos($data);
				$result    = $model1->serviceTodoDetail($data);
				echo $result; die;
				}
		}
		
		public static function updateAvailableServiceCategory()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount/loginapp"; </script>'; die;
				} else {
				$model1       = new CleaningCompanyModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=$_POST['company_id'];
				$data['sid']=$_POST['service_id']; 
				$data['catg_id']=$_POST['categ_id']; 
				$result    = $model1->updateAvailableServiceCategory($data);
				$result    = $model1->serviceTodoDetail($data);
				echo $result; die;
				}
		}
		
		
		public static function updateCategoryServiceTodo($a=null,$b=null,$c=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount/loginapp"; </script>'; die;
				} else {
				$model1       = new CleaningCompanyModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['sid']=cleanMe($b); 
				$data['catg_id']=cleanMe($c); 
				$result    = $model1->updateCategoryServiceTodo($data);
				$result    = $model1->serviceTodoDetail($data);
				echo $result; die;
				}
		}
		public static function viewEmployees($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				 
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php"); die;
				}
				$model1       = new CleaningCompanyModel();
				$data['app_id']    = $model1->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$companyDetail    = $model1->companyDetail($data);
				$employeesDetail    = $model1->employeesDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('CleaningCompanyEmployeesView.php');
			}
		}
		
		 
		public static function updateAdminStatus($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount/loginapp"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new CleaningCompanyModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$updateAdminStatus = $model->updateAdminStatus($data);
				echo $updateAdminStatus; die;
			}
			
		}
		
		 
	}
?>