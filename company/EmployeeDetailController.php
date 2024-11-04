<?php
require_once 'EmployeeDetailModel.php';
require_once 'EmployeeCheckController.php';
require_once '../configs/utility.php';
class EmployeeDetailController
{
     public static function updateTerminationInfo($a = null,$b=null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount");
        } else {
            $path         = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$data['eid']=cleanMe($b);
			$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
			$model1       = new EmployeeDetailModel();
			$empid    = $model1->employeeId($data);
			$data['emp_user_id']=$empid['user_login_id'];
			$updateTerminationInfo = $model1->updateTerminationInfo($data);
			header("location:../../../CompanyCrm/adminAccount/".$data['cid']);
        }
	}
  
    public static function updateTerminationSentInfo($a = null,$b=null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount");
        } else {
            $path         = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$data['eid']=cleanMe($b);
			$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
			$model1       = new EmployeeDetailModel();
			 
			$updateTerminationInfo = $model1->updateTerminationSentInfo($data);
			header("location:../../../CompanyCrm/adminAccount/".$data['cid']);
        }
	}
  
  
  
    public static function employeePersonalAccount($a = null,$b=null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin");
        } else {
            $path         = "../../../../../";
			$data=array();
			$data['user_login_id']=$_SESSION['user_id'];
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$data['eid']=cleanMe($b);
			$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_login_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
			
            $model1       = new EmployeeDetailModel();
			
			$data['page_id']=1;
			$updateAdmin    = $model1->updateAdmin($data);
			$checkPermission    = $model1->checkPermission($data);
				 
			if($checkPermission ==0)
			{
			header("location:../../../RestrictedAccess/companyAccount/".$data['cid']);
			}
			
			$empid    = $model1->employeeId($data);
			
			$data['user_id']=$empid['user_login_id'];
            $resultOrg1    = $model1->employeeUserAccount($data);
			$workInfo    = $model1->employeeAccount($data);
			$resultOrg    = $model1->userAccount($data);
			$company    = $model1->userSummary($data);
			$row_summary    = $model1->userAccount($data);
			$verificationId    = $model1->verificationId($data);
			$locationDetail    = $model1->locationDetail($data);
			$employeeLocationDetail    = $model1->employeeLocationDetail($data);
			$data['lid']    = $model1->employeeLocationDetail($data);
			$addedDepartments    = $model1->addedDepartments($data);
			$userBankid = $model1->userBankid($data);
			$userCountryList = $model1->userCountryList($data);
            require_once('EmployeePersonalDetailViewNew.php');
        }
       
    }
	
  
  
  
      public static function employeeAccount($a = null,$b=null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin");
        } else {
            $path         = "../../../../../";
			$data=array();
			$data['user_login_id']=$_SESSION['user_id'];
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$data['eid']=cleanMe($b);
			$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_login_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
			
            $model1       = new EmployeeDetailModel();
			
			$data['page_id']=1;
			$updateAdmin    = $model1->updateAdmin($data);
			$checkPermission    = $model1->checkPermission($data);
				 
			if($checkPermission ==0)
			{
			header("location:../../../RestrictedAccess/companyAccount/".$data['cid']);
			}
			$employeeVerificationInfo    = $model1->employeeVerificationInfo($data);
			$isVerificator    = $model1->isVerificator($data);
			$empid    = $model1->employeeId($data);
			
			$data['user_id']=$empid['user_login_id'];
			
			$relievingCount    = $model1->relievingCount($data);
			$listCardDetails    = $model1->listCardDetails($data);
            $resultOrg1    = $model1->employeeUserAccount($data);
			$workInfo    = $model1->employeeAccount($data);
			$resultOrg    = $model1->userAccount($data);
			$company    = $model1->userSummary($data);
			$row_summary    = $model1->userAccount($data);
			$verificationId    = $model1->verificationId($data);
			$locationDetail    = $model1->locationDetail($data);
			$employeeLocationDetail    = $model1->employeeLocationDetail($data);
			$data['lid']    = $model1->employeeLocationDetail($data);
			$addedDepartments    = $model1->addedDepartments($data);
			 
			$userBankid = $model1->userBankid($data);
			$userCountryList = $model1->userCountryList($data);
			$employeeIdVerificationCount = $model1->employeeIdVerificationCount($data);
			$employeeIdCount = $model1->employeeIdCount($data);
            require_once('EmployeeDetailViewNew.php');
        }
       
    }
	
	
	public static function updateCategoryServiceAllTodos($a=null,$b=null,$c=null)
		{
			 	$model1       = new EmployeeDetailModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$data['objectType']=cleanMe($b);
				$data['eid']=cleanMe($c);
				$result    = $model1->updateCategoryServiceAllTodos($data);
				$result    = $model1->serviceTodoDetail($data);
				echo $result; die;
			
		}
		
		public static function updateCategoryServiceTodo($a=null,$b=null,$c=null)
		{
				$model1       = new EmployeeDetailModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$data['objectType']=cleanMe($b);
				$data['eid']=cleanMe($c);
				$result    = $model1->updateCategoryServiceTodo($data);
				//$result    = $model1->serviceTodoDetail($data);
				echo $result; die;
			
		}
	
	
	 public static function employeeServiceAccount($a = null,$b=null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount");
        } else {
            $path         = "../../../../../";
			$data=array();
			$data['user_login_id']=$_SESSION['user_id'];
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$data['eid']=cleanMe($b);
			$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_login_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
			
            $model1       = new EmployeeDetailModel();
			
			$data['page_id']=1;
			$updateAdmin    = $model1->updateAdmin($data);
			$checkPermission    = $model1->checkPermission($data);
				 
			if($checkPermission ==0)
			{
			header("location:../../../RestrictedAccess/companyAccount/".$data['cid']);
			}
			
			$empid    = $model1->employeeId($data);
			
			$data['user_id']=$empid['user_login_id'];
			 $data['objectType']=1;
			$professionalTodoUpdate = $model1->professionalTodoUpdate($data);
			$serviceTodoDetail = $model1->serviceEmployeeSkillDetail($data);
            require_once('EmployeeDetailServiceCategoryTodoViewNew.php');
        }
       
    }
	
	
	
	
	
	public static function sendEmailInvitaion($co = null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($co);
				$data['eid']=cleanMe($b);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new EmployeeDetailModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				require_once('../configs/testMandril.php');
				$sendEmailInvitaion    = $model1->sendEmailInvitaion($data);
				header('location:../../errorFindingIdentificator/'.$data['cid'].'/'.$data['eid']); die;
				
				 
			}
			
		}
		
	
	
	 public static function errorFindingIdentificator($a = null,$b=null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount");
        } else {
            $path         = "../../../../../";
			$data=array();
			$data['user_login_id']=$_SESSION['user_id'];
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$data['eid']=cleanMe($b);
			$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_login_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
			
            $model1       = new EmployeeDetailModel();
			$isVerificator    = $model1->isVerificator($data);	
			if($isVerificator==0)
			{
			header('location:https://www.qloudid.com/company/index.php/EmployeeDetail/restrictedAccess/'.$data['cid'])	; die;	
			}
			
			$employeeIdVerificationCount    = $model1->employeeIdVerificationCount($data);
			 
			if($employeeIdVerificationCount['num']>0)
			{
			header('location:https://www.qloudid.com/company/index.php/EmployeeDetail/employeeAccount/'.$data['cid'].'/'.$data['eid'])	; die;	
			}
			$empid    = $model1->employeeId($data);
			$data['user_id']=$empid['user_login_id'];
			$userIdentificatorCount    = $model1->userIdentificatorCount($data);
			  
			if($userIdentificatorCount['num']==0)
			{
			$data['page_id']=1;
			$data['user_id']=$_SESSION['user_id'];
			$updateAdmin    = $model1->updateAdmin($data);
			$checkPermission    = $model1->checkPermission($data);
				 
			if($checkPermission ==0)
			{
			header("location:../../../RestrictedAccess/companyAccount/".$data['cid']);
			}
			$empid    = $model1->employeeId($data);
			require_once('EmployeeDetailErrorIdentificationInfoView.php');
					
			}
			else
			{
			header('location:../../getIdentificator/'.$data['cid'].'/'.$data['eid']); die;	
			}
			
        }
       
    }
	
	
	
	 public static function getIdentificator($a = null,$b=null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount");
        } else {
            $path         = "../../../../../";
			$data=array();
			$data['user_login_id']=$_SESSION['user_id'];
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$data['eid']=cleanMe($b);
			$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_login_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
			
            $model1       = new EmployeeDetailModel();
			
			$data['page_id']=1;
			$updateAdmin    = $model1->updateAdmin($data);
			$checkPermission    = $model1->checkPermission($data);
				 
			if($checkPermission ==0)
			{
			header("location:../../../RestrictedAccess/companyAccount/".$data['cid']);
			}
			$developerCount    = $model1->developerCount($data);
			 
				if($developerCount==-1)
				{
					header('location:../../requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../../requestStatus/'.$data['cid']); die;
				}
				
			$isVerificator    = $model1->isVerificator($data);	
			
			if($isVerificator==0)
			{
			header('location:../../restrictedAccess/'.$data['cid'])	; die;	
			}				
				
			$empid    = $model1->employeeId($data);
			
			$data['user_id']=$empid['user_login_id'];
			$employeeIdVerificationCount    = $model1->employeeIdVerificationCount($data);
			 
			if($employeeIdVerificationCount['num']>0)
			{
			header('location:../../employeeAccount/'.$data['cid'].'/'.$data['eid'])	; die;	
			}
			$userIdentificatorCount    = $model1->userIdentificatorCount($data);
			
			if($userIdentificatorCount['num']==0)
			{
			header('location:../../errorFindingIdentificator/'.$data['cid'].'/'.$data['eid'])	; die;
			}
			else if($userIdentificatorCount['num']==1)
			{
			$userIdentificatorDetail    = $model1->userIdentificatorDetail($data);
			//print_r($userIdentificatorDetail); die;
			header('location:../../identificatorInfoVerify/'.$data['cid'].'/'.$data['eid'].'/'.$userIdentificatorDetail)	; die;		
			}
			else
			{
			$resultOrg1    = $model1->employeeUserAccount($data);
			$workInfo    = $model1->employeeAccount($data);
			$resultOrg    = $model1->userAccount($data);
			$company    = $model1->userSummary($data);
			$row_summary    = $model1->userAccount($data);
			$verificationId    = $model1->verificationId($data);
			$userIdentificatorDetailAll    = $model1->userIdentificatorDetailAll($data);	
			}
			 
            require_once('EmployeeDetailIdentificationInfoView.php');
        }
       
    }
	
		public static function requestAccount($co = null)
		{
			$valueNew = checkLogin();
			 
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
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
				$model1       = new EmployeeDetailModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$developerCount    = $model1->developerCount($data);
				if($developerCount==1)
				{
					header('location:https://www.qloudid.com/company/index.php/CompanyCrm/adminAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../requestStatus/'.$data['cid']); die;
				}
			require_once('VerifyIdRequestViewNew.php');
			}
			
		}
		
		
		public static function sendVerifyIdRequest($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
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
				$model1       = new EmployeeDetailModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$developerCount    = $model1->developerCount($data);
				 
				if($developerCount==-1)
				{
				require_once('../configs/testMandril.php');
				$sendVerifyIdRequest    = $model1->sendVerifyIdRequest($data);
				header('location:../requestStatus/'.$data['cid']); die;
				}
				else
				{
					header('location:https://www.qloudid.com/company/index.php/CompanyCrm/adminAccount/'.$data['cid']); die;
				}
				
				 
			}
			
		}
		
		
		public static function requestStatus($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
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
				$model1       = new EmployeeDetailModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$developerCount    = $model1->developerCount($data);
			 	if($developerCount==1)
				{
					$isVerificator    = $model1->isVerificator($data);	
					if($isVerificator==0)
					{
					header('location:https://www.qloudid.com/company/index.php/EmployeeDetail/restrictedAccess/'.$data['cid'])	; die;	
					}
					header('location:https://www.qloudid.com/company/index.php/CompanyCrm/adminAccount/'.$data['cid']); die;
				}
				else if($developerCount==-1)
				{
					header('location:../requestAccount/'.$data['cid']); die;
				} 
				require_once('VerifyIdRequestStatusViewNew.php');
			}
			
		}
		
		
	
	
	
	
	
	 public static function identificatorInfoVerify($a = null,$b=null, $c=null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount");
        } else {
            $path         = "../../../../../../";
			$data=array();
			$data['user_login_id']=$_SESSION['user_id'];
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$data['eid']=cleanMe($b);
			$data['id_id']=cleanMe($c);
			$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_login_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
			
            $model1       = new EmployeeDetailModel();
			
			$data['page_id']=1;
			$updateAdmin    = $model1->updateAdmin($data);
			$checkPermission    = $model1->checkPermission($data);
				 
			if($checkPermission ==0)
			{
			header("location:../../../../RestrictedAccess/companyAccount/".$data['cid']);
			}
			$isVerificator    = $model1->isVerificator($data);	
			if($isVerificator==0)
			{
			header('location:https://www.qloudid.com/company/index.php/EmployeeDetail/restrictedAccess/'.$data['cid'])	; die;	
			}	
			$empid    = $model1->employeeId($data);
			$employeeIdVerificationCount    = $model1->employeeIdVerificationCount($data);
			if($employeeIdVerificationCount['num']==1)
			{
			header('location:https://www.qloudid.com/company/index.php/CompanyCrm/adminAccount/'.$data['cid'])	; die;	
			}
			$data['user_id']=$empid['user_login_id'];
			$resultOrg1    = $model1->employeeUserAccount($data);
			$workInfo    = $model1->employeeAccount($data);
			$resultOrg    = $model1->userAccount($data);
			$company    = $model1->userSummary($data);
			$row_summary    = $model1->userAccount($data);
			$verificationId    = $model1->verificationId($data);
			 
			$userSelectedIdentificatorDetail     = $model1->userSelectedIdentificatorDetail($data);	
			
            require_once('EmployeeDetailSelectedIdentificatorViewNew.php');
        }
       
    }
	
	 public static function restrictedAccess($a = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount");
        } else {
            $path         = "../../../../";
			$data=array();
			$data['user_login_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_login_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
			
            $model1       = new EmployeeDetailModel();
			 
			$row_summary    = $model1->userAccount($data);
			 
			require_once('EmployeeDetailVerificatorView.php');
        }
       
    }
	
	 public static function verifySignature($a = null,$b=null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount");
        } else {
            $path         = "../../../../../";
			$data=array();
			$data['user_login_id']=$_SESSION['user_id'];
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$data['eid']=cleanMe($b);
			
			$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_login_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
			
            $model1       = new EmployeeDetailModel();
			
			$data['page_id']=1;
			$updateAdmin    = $model1->updateAdmin($data);
			$checkPermission    = $model1->checkPermission($data);
				 
			if($checkPermission ==0)
			{
			header("location:../../../RestrictedAccess/companyAccount/".$data['cid']);
			}
			
			$empid    = $model1->employeeId($data);
			$employeeIdVerificationCount    = $model1->employeeIdVerificationCount($data);
			if($employeeIdVerificationCount['num']==1)
			{
			header('location:https://www.qloudid.com/company/index.php/CompanyCrm/adminAccount/'.$data['cid'])	; die;	
			}
			 
			$row_summary    = $model1->userAccount($data);
			 
			$verifyIP    = $model1->verifyIP($data);
			require_once('EmployeeDetailSignInView.php');
        }
       
    }
	
	
	 public static function timeOut($a = null,$b=null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount");
        } else {
            $path         = "../../../../../";
			$data=array();
			$data['user_login_id']=$_SESSION['user_id'];
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$data['eid']=cleanMe($b);
			
			$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_login_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
			
            $model1       = new EmployeeDetailModel();
			
			$data['page_id']=1;
			$updateAdmin    = $model1->updateAdmin($data);
			$checkPermission    = $model1->checkPermission($data);
				 
			if($checkPermission ==0)
			{
			header("location:../../../RestrictedAccess/companyAccount/".$data['cid']);
			}
			
			$empid    = $model1->employeeId($data);
			
			 
			$row_summary    = $model1->userAccount($data);
			 
			$verifyIP    = $model1->verifyIP($data);
			require_once('EmployeeDetailSignInTimeOutView.php');
        }
       
    }
	
	 public static function verifyIdentificatorDetail($a = null,$b=null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount");
        } else {
            $path         = "../../../../../";
			$data=array();
			$data['user_login_id']=$_SESSION['user_id'];
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$data['eid']=cleanMe($b);
			
			$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_login_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
			
            $model1       = new EmployeeDetailModel();
			
			$data['page_id']=1;
			$updateAdmin    = $model1->updateAdmin($data);
			$checkPermission    = $model1->checkPermission($data);
				 
			if($checkPermission ==0)
			{
			header("location:../../../RestrictedAccess/companyAccount/".$data['cid']);
			}
			$empid    = $model1->employeeId($data);
			//print_r($_POST); die;
			$data['user_id']=$empid['user_login_id'];
			require_once('../lib/url_shortener.php');
            require_once('../configs/testMandril.php');
			$verifyIdentificatorDetail    = $model1->verifyIdentificatorDetail($data);
			
			header('location:../../../CompanyCrm/adminAccount/'.$data['cid']);
			
        }
       
    }
	
	public static function sentAccount($a = null,$b=null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount");
        } else {
            $path         = "../../../../../";
			$data=array();
			$data['user_login_id']=$_SESSION['user_id'];
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$data['eid']=cleanMe($b);
			$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_login_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
			
            $model1       = new EmployeeDetailModel();
			
			$data['page_id']=1;
			$updateAdmin    = $model1->updateAdmin($data);
			$checkPermission    = $model1->checkPermission($data);
				 
			if($checkPermission ==0)
			{
			header("location:../../../RestrictedAccess/companyAccount/".$data['cid']);
			}
			 $relievingCount    = $model1->relievingSentCount($data);
            
			$workInfo    = $model1->employeeSentAccount($data);
			 
            require_once('EmployeeSentRequestDetailView.php');
        }
       
    }
	
	
	 public static function terminationInfo($a = null,$b=null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount");
        } else {
            $path         = "../../../../../";
			$data=array();
			$data['user_login_id']=$_SESSION['user_id'];
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$data['eid']=cleanMe($b);
			$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_login_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
			
            $model1       = new EmployeeDetailModel();
			
			$data['page_id']=1;
			$updateAdmin    = $model1->updateAdmin($data);
			$checkPermission    = $model1->checkPermission($data);
				 
			if($checkPermission ==0)
			{
			header("location:../../../RestrictedAccess/companyAccount/".$data['cid']);
			}
			
			$empid    = $model1->employeeId($data);
			$data['user_id']=$empid['user_login_id'];
			$row_summary    = $model1->userAccount($data);
			$resultOrg1    = $model1->employeeUserAccount($data);
			$workInfo    = $model1->employeeAccount($data);
			$resultOrg    = $model1->userAccount($data);
			
            
            require_once('EmploeeTerminationDetailView.php');
        }
       
    }
	
	 public static function terminationSentInfo($a = null,$b=null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount");
        } else {
            $path         = "../../../../../";
			$data=array();
			$data['user_login_id']=$_SESSION['user_id'];
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$data['eid']=cleanMe($b);
			$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_login_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
			
            $model1       = new EmployeeDetailModel();
			
			$data['page_id']=1;
			$updateAdmin    = $model1->updateAdmin($data);
			$checkPermission    = $model1->checkPermission($data);
				 
			if($checkPermission ==0)
			{
			header("location:../../../RestrictedAccess/companyAccount/".$data['cid']);
			}
			
			 
			$workInfo    = $model1->employeeSentAccount($data);
			   
            require_once('EmploeeTerminationSentDetailView.php');
        }
       
    }
	
	
	
	 public static function employeeAtendence($a = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount");
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
			$model1       = new EmployeeDetailModel();
			$checkEmployeeAttendence    = $model1->checkEmployeeAttendence($data);
			 
			if($checkEmployeeAttendence==1)
			{
			header("location:../employeeExitInfo/".$data['cid']); die;
			}
			else if($checkEmployeeAttendence==2)
			{
			header("location:../../ReceivedChild/verifyRequests/".$data['cid']); die;
			}
			require_once('EmployeeAtendenceDetailView.php');
        }
       
    }
	
	
	 public static function employeeExitInfo($a = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount");
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
			$model1       = new EmployeeDetailModel();
			$checkEmployeeTime    = $model1->checkEmployeeTime($data);
			$checkEmployeeAttendence    = $model1->checkEmployeeAttendence($data);
			 
			if($checkEmployeeAttendence==1)
			{
			require_once('EmployeeExitDetailView.php');

			}
			else
			{
			header("location:../employeeAtendence/".$data['cid']); die;	
			}
			
        }
       
    }
	
	public static function reportAbsent($a = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount");
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
			$model1       = new EmployeeDetailModel();
			$checkEmployeeAttendence    = $model1->checkEmployeeAttendence($data);
			if($checkEmployeeAttendence==1)
			{
			header("location:../../ReceivedChild/verifyRequests/".$data['cid']); die;
			}
			require_once('EmployeeAbsentInfoView.php');
        }
       
    }
	
	public static function reportEmployeeSickLeave($a = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount");
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
			$model1       = new EmployeeDetailModel();
			$checkEmployeeAttendence    = $model1->checkEmployeeAttendence($data);
			if($checkEmployeeAttendence==1)
			{
			header("location:../../ReceivedChild/verifyRequests/".$data['cid']); die;
			}
			require_once('EmployeeSickLeaveView.php');
        }
       
    }
	
	public static function reportEmployeeVacation($a = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount");
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
			$model1       = new EmployeeDetailModel();
			$checkEmployeeAttendence    = $model1->checkEmployeeAttendence($data);
			if($checkEmployeeAttendence==1)
			{
			header("location:../../ReceivedChild/verifyRequests/".$data['cid']); die;
			}
			require_once('EmployeeVacationView.php');
        }
       
    }
	
	 public static function reportEmployeePresence($a = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount");
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
			$model1       = new EmployeeDetailModel();
			$updateAttendence = $model1->updateAttendence($data);
			header("location:../employeeExitInfo/".$data['cid']);
        }
	}
		
		public static function reportEmployeeExit($a = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount");
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
			$model1       = new EmployeeDetailModel();
			$updateAttendence = $model1->updateExit($data);
			header("location:../employeeAtendence/".$data['cid']);
        }
       
    }
	 public static function updateLeave($a = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount");
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
			$model1       = new EmployeeDetailModel();
			$updateLeave = $model1->updateLeave($data);
			header("location:../../ReceivedChild/verifyRequests/".$data['cid']);
        }
       
    }
	
	 public static function updateVacationInfo($a = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount");
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
			$model1       = new EmployeeDetailModel();
			$updateVacationInfo = $model1->updateVacationInfo($data);
			header("location:../../ReceivedChild/verifyRequests/".$data['cid']);
        }
       
    }
	
	
	public static function checkEmployeeEmail($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new EmployeeDetailModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['pid']=cleanMe($a);
				$data['cid']=cleanMe($b);
				
				$checkEmployeeEmail = $model->checkEmployeeEmail($data);
				
				echo $checkEmployeeEmail; die;
				
			}
		}
		
		
		public static function updateEmployeeInformation($a = null , $b=null ,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new EmployeeDetailModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['eid']=cleanMe($b);
				$data['pid']=cleanMe($c);
				$updateEmployeeInformation = $model->updateEmployeeInformation($data);
				
				header("location:../../../employeeAccount/".$data['cid']."/".$data['eid']);
				
			}
		}
		
		public static function changeDepartment($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model = new EmployeeDetailModel();
				$changeDepartment = $model->changeDepartment();
				echo $changeDepartment; die;
			}
		}
		
}


?>