<?php
	require_once 'AppsListModel.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	class AppsListController
	{
		
		
		public static function index()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../user/index.php/Login");
				} else {
				$path         = "../../";
				$model1       = new AppsListModel();
				
				
				require_once('AppsListView.php');
			}
		}
		public static function appsAccount($co = null)
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
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model1       = new AppsListModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$developerCount    = $model1->developerCount($data);
				if($developerCount==-1)
				{
					header('location:../requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../requestStatus/'.$data['cid']); die;
				}
				$empid    = $model1->employeeId($data);
				$company    = $model1->userSummary($data);
				$row_summary    = $model1->userSummary($data);
				$empl    = $model1->empSummary($data);
				require_once('../lib/url_shortener.php');
				$appsDetail    = $model1->appsDetail($data);
				
				require_once('AppsListNewView.php');
			}
			
		}
		
		
		public static function documentation($co = null)
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
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model1       = new AppsListModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$developerCount    = $model1->developerCount($data);
				if($developerCount==-1)
				{
					header('location:../requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../requestStatus/'.$data['cid']); die;
				}
				$empid    = $model1->employeeId($data);
				$company    = $model1->userSummary($data);
				$row_summary    = $model1->userSummary($data);
				$empl    = $model1->empSummary($data);
				 
				require_once('AppsListDocumentationSelectView.php');
			}
			
		}
		
		public static function loginApiDocumentation($co = null)
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
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model1       = new AppsListModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$developerCount    = $model1->developerCount($data);
				if($developerCount==-1)
				{
					header('location:../requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../requestStatus/'.$data['cid']); die;
				}
				$data['api']=1;
				$empid    = $model1->employeeId($data);
				$company    = $model1->userSummary($data);
				$row_summary    = $model1->userSummary($data);
				$empl    = $model1->empSummary($data);
				require_once('../lib/url_shortener.php');
				$appsDetailSelected    = $model1->appsDetailSelected($data); 
				$appsDetailSelectedCount    = $model1->appsDetailSelectedCount($data); 
				require_once('AppsListDocumentationView.php');
			}
			
		}
		
		public static function purchaseApiDocumentation($co = null)
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
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model1       = new AppsListModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$developerCount    = $model1->developerCount($data);
				if($developerCount==-1)
				{
					header('location:../requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../requestStatus/'.$data['cid']); die;
				}
				$data['api']=3;
				$empid    = $model1->employeeId($data);
				$company    = $model1->userSummary($data);
				$row_summary    = $model1->userSummary($data);
				$empl    = $model1->empSummary($data);
				require_once('../lib/url_shortener.php');
				$appsDetailSelected    = $model1->appsDetailSelected($data); 
				$appsDetailSelectedCount    = $model1->appsDetailSelectedCount($data); 
				require_once('AppsListDocumentationPurchaseView.php');
			}
			
		}
		
		public static function signInApiDocumentation($co = null)
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
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model1       = new AppsListModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$developerCount    = $model1->developerCount($data);
				if($developerCount==-1)
				{
					header('location:../requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../requestStatus/'.$data['cid']); die;
				}
				$data['api']=4;
				$empid    = $model1->employeeId($data);
				$company    = $model1->userSummary($data);
				$row_summary    = $model1->userSummary($data);
				$empl    = $model1->empSummary($data);
				require_once('../lib/url_shortener.php');
				$appsDetailSelected    = $model1->appsDetailSelected($data); 
				$appsDetailSelectedCount    = $model1->appsDetailSelectedCount($data); 
				require_once('AppsListDocumentationSignInView.php');
			}
			
		}
		
		public static function interAppLoginDocumentation($co = null)
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
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model1       = new AppsListModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$developerCount    = $model1->developerCount($data);
				if($developerCount==-1)
				{
					header('location:../requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../requestStatus/'.$data['cid']); die;
				}
				$data['api']=4;
				$empid    = $model1->employeeId($data);
				$company    = $model1->userSummary($data);
				$row_summary    = $model1->userSummary($data);
				$empl    = $model1->empSummary($data);
				 
				require_once('AppsListDocumentationInterAppLoginView.php');
			}
			
		}
		public static function bookHotelApiDocumentation($co = null)
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
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model1       = new AppsListModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$developerCount    = $model1->developerCount($data);
				if($developerCount==-1)
				{
					header('location:../requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../requestStatus/'.$data['cid']); die;
				}
				$data['api']=5;
				$empid    = $model1->employeeId($data);
				$company    = $model1->userSummary($data);
				$row_summary    = $model1->userSummary($data);
				$empl    = $model1->empSummary($data);
				require_once('../lib/url_shortener.php');
				$appsDetailSelected    = $model1->appsDetailSelected($data); 
				$appsDetailSelectedCount    = $model1->appsDetailSelectedCount($data); 
				require_once('AppsListDocumentationBookHotelView.php');
			}
			
		}
		
		
		public static function checkinHotelApiDocumentation($co = null)
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
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model1       = new AppsListModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$developerCount    = $model1->developerCount($data);
				if($developerCount==-1)
				{
					header('location:../requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../requestStatus/'.$data['cid']); die;
				}
				$data['api']=6;
				$empid    = $model1->employeeId($data);
				$company    = $model1->userSummary($data);
				$row_summary    = $model1->userSummary($data);
				$empl    = $model1->empSummary($data);
				require_once('../lib/url_shortener.php');
				$appsDetailSelected    = $model1->appsDetailSelected($data); 
				$appsDetailSelectedCount    = $model1->appsDetailSelectedCount($data); 
				require_once('AppsListDocumentationCheckinHotelView.php');
			}
			
		}
		
		public static function requestAccount($co = null)
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
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model1       = new AppsListModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$developerCount    = $model1->developerCount($data);
				if($developerCount==1)
				{
					header('location:../appsAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../requestStatus/'.$data['cid']); die;
				}
			require_once('AppsRequestView.php');
			}
			
		}
		
		
		public static function sendDeveloperRequest($co = null)
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
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model1       = new AppsListModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$developerCount    = $model1->developerCount($data);
				if($developerCount==-1)
				{
				require_once('../configs/testMandril.php');
				$sendDeveloperRequest    = $model1->sendDeveloperRequest($data);
				header('location:../requestStatus/'.$data['cid']); die;
				}
				else
				{
					header('location:../appsAccount/'.$data['cid']); die;
				}
				
				 
			}
			
		}
		
		
		public static function requestStatus($co = null)
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
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model1       = new AppsListModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$developerCount    = $model1->developerCount($data);
				if($developerCount==1)
				{
					header('location:../appsAccount/'.$data['cid']); die;
				}
				else if($developerCount==-1)
				{
					header('location:../requestAccount/'.$data['cid']); die;
				}
				require_once('AppsRequestStatusView.php');
			}
			
		}
		
		
		
		public static function selectState($a=null,$co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=cleanMe($a);
				$data['cid']=cleanMe($co);
				$model1       = new AppsListModel();
				
				$result    = $model1->selectState($data);
				echo $result; die;
			}
		}
		
		public static function locationAdd($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				
				$data['cid']=cleanMe($a);
				$model1       = new AppsListModel();
				
				$result    = $model1->locationAdd($data);
				header("location:../../../../location_list.php?id=".$data['cid']);
			}
		}
		
		
		public static function selectCity($a=null,$co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$data=array();
				
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=cleanMe($a);
				$data['cid']=cleanMe($co);
				$model1       = new AppsListModel();
				
				$result    = $model1->selectCity($data);
				echo $result; die;
			}
		}
		
		public static function selectJobFunction($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$stModel = new AppsListModel();
				if (isset($co)) {
					
					$val         = cleanMe($co);
					$resultState = $stModel->selectJobFunction($val);
					$resultJob = $stModel->selectJob();
				}
				$option1 = '<option value="" >-- Select --</option>';
				foreach ($resultJob as $stateCategory => $StateValue) {
					$stateCategory = htmlspecialchars($stateCategory);
					if($StateValue['id']==$val )
					{
						$option1        = $option1 . '<option value="' . $StateValue['id'] . '" selected>' . $StateValue['job_family'] . '</option>';
					}
					else 
					{
						$option1        = $option1 . '<option value="' . $StateValue['id'] . '">' . $StateValue['job_family'] . '</option>';
					}
				}
				
				$option = '<option value="" >-- Select --</option>';
				foreach ($resultState as $stateCategory => $StateValue) {
					$stateCategory = htmlspecialchars($stateCategory);
					$option        = $option . '<option value="' . $StateValue['id'] . '">' . $StateValue['job_function'] . '</option>';
				}
				
				$output="";
				$output=$output.'<li>
				<div class="txlabel">Job Family:</div>
				<div  class="txtfield">
				
				<select  class="job_name" name="job_family[]" id="job_family[]" onchange="job_family1(this.value,this);">
				'.$option1.'
				</select>
				
				</div>
				</li>
				
				<li class="midd">
				<div class="txlabel">Job Function:</div>
				<div  class="txtfield">
				
				<select class="job_jain"  name="job_function[]" id="job_function[]" onchange="job_function1(this.value,this);">
				<div id="app">
				'.$option.'
				</div>
				
				</select>
				</div>
				</li>
				
				<li>
				<div class="txlabel">Position</div>
				<div  class="txtfield">
				<select class="job_jain1" name="pos_name[]" id="pos_name[]" >
				
				</select>
				
				</div>
				</li>  ';
				echo $output; die;
			}
			
		}
		public static function selectJobPosition($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$stModel = new AppsListModel();
				if (isset($c)) {
					
					$val         = cleanMe($c);
					$resultState = $stModel->selectJobFunctionVal($val);
					$resultPosition = $stModel->selectJobPosition($val);
					$resultJob = $stModel->selectJob();
					$jobFamilyVal = $stModel->selectJobFamilyVal($val);
				}
				$option1 = '<option value="" >-- Select --</option>';
				foreach ($resultJob as $stateCategory => $StateValue) {
					$stateCategory = htmlspecialchars($stateCategory);
					if($StateValue['id']==$jobFamilyVal['job_family_id'] )
					{
						$option1        = $option1 . '<option value="' . $StateValue['id'] . '" selected>' . $StateValue['job_family'] . '</option>';
					}
					else 
					{
						$option1        = $option1 . '<option value="' . $StateValue['id'] . '">' . $StateValue['job_family'] . '</option>';
					}
				}
				
				$option = '<option value="" >-- Select --</option>';
				
				foreach ($resultState as $stateCategory => $StateValue) {
					$stateCategory = htmlspecialchars($stateCategory);
					if($StateValue['id']==$val )
					{
						$option        = $option . '<option value="' . $StateValue['id'] . '" selected>' . $StateValue['job_function'] . '</option>';
					}
					else
					{
						$option        = $option . '<option value="' . $StateValue['id'] . '" >' . $StateValue['job_function'] . '</option>';
					}
				}
				
				$option2 = '<option value="" >-- Select --</option>';
				foreach ($resultPosition as $stateCategory => $StateValue) {
					
					
					$option2        = $option2 . '<option value="' . $StateValue['id'] . '">' . $StateValue['job_position'] . '</option>';
					
				}
				
				
				$output="";
				$output=$output.'<li>
				<div class="txlabel">Job Family:</div>
				<div  class="txtfield">
				
				<select  class="job_name" name="job_family[]" id="job_family[]" onchange="job_family1(this.value,this);">
				'.$option1.'
				</select>
				
				</div>
				</li>
				
				<li class="midd">
				<div class="txlabel">Job Function:</div>
				<div  class="txtfield">
				
				<select class="job_jain"  name="job_function[]" id="job_function[]" onchange="job_function1(this.value,this);">
				<div id="app">
				'.$option.'
				</div>
				
				</select>
				</div>
				</li>
				
				<li>
				<div class="txlabel">Position</div>
				<div  class="txtfield">
				<select class="job_jain1" name="pos_name[]" id="pos_name[]" >
				'.$option2.'
				</select>
				
				</div>
				</li>  ';
				echo $output; 
			}
		}
		
		
	}
	
	
?>