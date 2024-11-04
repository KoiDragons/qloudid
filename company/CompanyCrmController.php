<?php

	require_once 'CompanyCrmModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once '../configs/utility.php';
	class CompanyCrmController
	{
		
	public static function verificatorAccount($a=null)
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
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model       = new CompanyCrmModel();
				
				$updateAdmin    = $model->updateAdmin($data);
				
				$checkPermission    = $model->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$developerCount    = $model->developerCount($data);
				if($developerCount==-1)
				{
					$employeeID    = $model->employeeID($data);
					header('location:../../EmployeeDetail/requestAccount/'.$data['cid'].'/'.$employeeID); die;
				}
				$employeeVerifiedList    = $model->employeeVerifiedList($data);
				$employeeVerifiedListCount    = $model->employeeVerifiedListCount($data);
				 
				$row_summary    = $model->userSummary($data);
				require_once('CompanyCrmVerificatorView.php');
			}
		}
			 
		
		public static function adminAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$data=array();
				$model1       = new CompanyCrmModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model       = new CompanyCrmModel();
				
				$updateAdmin    = $model->updateAdmin($data);
				
				$checkPermission    = $model->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:https://www.qloudid.com/company/index.php/CompanySuppliers/companyEmployeeProfileAction/".$data['cid']);
				}
				
				$developerCount    = $model->developerCount($data);
				 
				$sentRequestDetail    = $model->sentRequestDetail($data);
				$sentRequestCount    = $model->sentRequestCount($data);
				$approveDetailLocation    = $model->approveDetailLocation($data);
				$approveDetailLocationCount    = $model->approveDetailLocationCount($data); 
				$row_summary    = $model->userSummary($data);
				require_once('CompanyCrmAdminView.php');
			}
		}
		
		
		public static function registeredAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$data=array();
				$model1       = new CompanyCrmModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model       = new CompanyCrmModel();
				
				$updateAdmin    = $model->updateAdmin($data);
				
				$checkPermission    = $model->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:https://www.qloudid.com/company/index.php/CompanySuppliers/companyEmployeeProfileAction/".$data['cid']);
				}
				
				$developerCount    = $model->developerCount($data);
				 
				$sentRequestDetail    = $model->sentRequestDetail($data);
				$sentRequestCount    = $model->sentRequestCount($data);
				 $row_summary    = $model->userSummary($data);
				require_once('CompanyCrmRegisteredView.php');
			}
		}
		
		
		public static function invitedEmployeeAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$data=array();
				$model1       = new CompanyCrmModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model       = new CompanyCrmModel();
				
				$updateAdmin    = $model->updateAdmin($data);
				
				$checkPermission    = $model->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:https://www.qloudid.com/company/index.php/CompanySuppliers/companyEmployeeProfileAction/".$data['cid']);
				}
				
				$developerCount    = $model->developerCount($data);
				 
				$invitedEmployeeRequestDetail    = $model->invitedEmployeeRequestDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('CompanyCrmInvitedEmployeeView.php');
			}
		}
		
		
		public static function oldEmployeesAccount($a=null)
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
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model       = new CompanyCrmModel();
				
				$updateAdmin    = $model->updateAdmin($data);
				
				$checkPermission    = $model->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$unsentRequestDetail    = $model->unsentRequestRelievedDetail($data);
				$unsentRequestCount    = $model->unsentRequestRelievedCount($data);
				$sentRequestDetail    = $model->sentRequestRelievedDetail($data);
				$sentRequestCount    = $model->sentRequestRelievedCount($data);
				$approveDetailLocation    = $model->activeEmployeesOld($data);
				$approveDetailLocationCount    = $model->activeEmployeesOldCount($data); 
				$row_summary    = $model->userSummary($data);
				require_once('CompanyCrmOldViewNew.php');
			}
		}
		
		
		public static function uninvitedEmployeesAccount($a=null)
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
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model       = new CompanyCrmModel();
				
				$updateAdmin    = $model->updateAdmin($data);
				
				$checkPermission    = $model->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$unsentRequestDetail    = $model->unsentRequestDetail($data);
				$unsentRequestCount    = $model->unsentRequestCount($data);
				 
				$row_summary    = $model->userSummary($data);
				require_once('CompanyCrmUninvitedViewNew.php');
			}
		}
		
		public static function moreApprovedDetailLocation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCrmModel();
				$moreApprovedDetailLocation = $model->moreApprovedDetailLocation($data);
				echo $moreApprovedDetailLocation; die;
			}
		}
		
		public static function moreUnsentRequestDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCrmModel();
				$moreUnsentRequestDetail = $model->moreUnsentRequestDetail($data);
				echo $moreUnsentRequestDetail; die;
			}
		}
		
		public static function moreUnsentRequestRelievedDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCrmModel();
				$moreUnsentRequestRelievedDetail = $model->moreUnsentRequestRelievedDetail($data);
				echo $moreUnsentRequestRelievedDetail; die;
			}
		}
		
		public static function moreEmployeeVerifiedList($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCrmModel();
				$moreEmployeeVerifiedList = $model->moreEmployeeVerifiedList($data);
				echo $moreEmployeeVerifiedList; die;
			}
		}
		
		public static function validateVerificator($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['eid']=cleanMe($b);
				$model = new CompanyCrmModel();
				$validateVerificator = $model->validateVerificator($data);
				header('location:../../verificatorAccount/'.$data['cid']);
			}
		}
		
		public static function removeVerificator($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['eid']=cleanMe($b);
				$model = new CompanyCrmModel();
				$removeVerificator = $model->removeVerificator($data);
				header('location:../../verificatorAccount/'.$data['cid']);
			}
		}
		
			public static function moreActiveEmployeesOld($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCrmModel();
				$moreApprovedDetailLocation = $model->moreActiveEmployeesOld($data);
				echo $moreApprovedDetailLocation; die;
			}
		}
		public static function moreSentRequestRelievedDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCrmModel();
				$moreSentRequestDetail = $model->moreSentRequestRelievedDetail($data);
				echo $moreSentRequestDetail; die;
			}
		}
		
		public static function moreSentRequestDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCrmModel();
				$moreSentRequestDetail = $model->moreSentRequestDetail($data);
				echo $moreSentRequestDetail; die;
			}
		}
	}
    
	
	
?>