<?php
require_once 'InviteEmployeeModel.php';
require_once 'EmployeeCheckController.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class InviteEmployeeController
{
    
    
	public static function inviteEmployees($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
				$model       = new InviteEmployeeModel();
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data);
				 
			require_once('InviteEmployeeAppView.php');
	}
	}
	
	
	public static function sendEmailInvitationToEmployee($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
				$model       = new InviteEmployeeModel();
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$sendEmailInvitationToEmployee    = $model->sendEmailInvitationToEmployee($data);
				header('location:../../CompanyCrm/adminAccount/'.$data['cid']);
	}
	}
	
	
    public static function requestInfo($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
        } else {
			$path = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
				$model       = new InviteEmployeeModel();
				$data['lid']=cleanMe($a);
				$locationDetail    = $model->locationDetail($data);
				$data['cid']=$locationDetail['enc'];
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data);
				$data['page_id']=1;
				$updateAdmin    = $model->updateAdmin($data);
				$checkPermission    = $model->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
			
			require_once('InviteEmployeeView.php');
	}
	}
	
	
	  public static function selectMethod($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
				$model       = new InviteEmployeeModel();
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data);
				$data['lid']    = $model->locationInfo($data);
			require_once('InviteEmployeeSelectViewNew.php');
	}
	}
	
	public static function updateFile($a=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				 
				$data['user_id']=$_SESSION['user_id'];
				$model = new InviteEmployeeModel();
				$updateFile = $model->updateFile($data);
				if($updateFile==1)
				{
					header("location:../../ManageFileInvitation/invitationAccount/".$data['cid']);	
					
				}
				else
				{
					header("location:../addFile/".$data['cid']."?error=".$updateFile);
					
				}	
				
			}
			
			
			
		}
	
	 public static function addFile($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
        } else {
			$path = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
				$model       = new InviteEmployeeModel();
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data);
				
			require_once('InviteEmployeeFileUploadView.php');
	}
	}
	
	public static function storeInvitationInfo($a = null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['lid']=cleanMe($a);
				
				$model = new InviteEmployeeModel();
				$locationDetail    = $model->locationDetail($data);
				$data['cid']=$locationDetail['enc'];
				
				$storeInvitationInfo    = $model->storeInvitationInfo($data);
				header("location:../employeeInfo/".$data['lid']);
			}
		}
	
	 public static function employeeInfoMore($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
				$model       = new InviteEmployeeModel();
				$data['lid']=cleanMe($a);
				$locationDetail    = $model->locationDetail($data);
				$data['cid']=$locationDetail['enc'];
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data);
				$jobFamily    = $model->jobFamily($data);
				$userCountryList    = $model->userCountryList();
				
				$data['page_id']=1;
				$updateAdmin    = $model->updateAdmin($data);
				$checkPermission    = $model->checkPermission($data);
				  
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				 
			if(isset($_POST['ssn']))
			{
				
				$invitingUserEmail    = $model->invitingUserEmail();
			 
			}
			$listCategories    = $model->listCategories();
			$companyLocationDetail    = $model->companyLocationDetail($data);
			require_once('InviteEmployeeInfoView.php');
			
	}
	}
	
	 public static function employeeInfo($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
        } else {
			$path = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
				$model       = new InviteEmployeeModel();
				$data['lid']=cleanMe($a);
				$locationDetail    = $model->locationDetail($data);
				$data['cid']=$locationDetail['enc'];
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$data['page_id']=1;
				$updateAdmin    = $model->updateAdmin($data);
				$checkPermission    = $model->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$companyDetail    = $model->companyDetail($data);
				$userCountryList    = $model->userCountryList();
				$resultContry    = $model->countryOption($data);
			require_once('InviteEmployeeSSNView.php');
	}
	}
	
	public static function inviteEmployeeSSN($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new InviteEmployeeModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['lid']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$userSummary = $model->userSummary($data);
				$data['email']=$userSummary['email'];
				require_once('../configs/testMandril.php');
				$inviteEmployee = $model->inviteEmployee($data);
				
				echo $inviteEmployee; die;
				
			}
			
		}
		public static function jobFunction($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new InviteEmployeeModel();
               
				$jobFunction = $model->jobFunction($data);
				
				echo $jobFunction; die;
				
			}
			
		}
		
		
		public static function updateServices()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new InviteEmployeeModel();
               
				$updateServices = $model->updateServices();
				
				echo $updateServices; die;
				
			}
			
		}
		
		public static function jobPosition($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new InviteEmployeeModel();
               
				$jobPosition = $model->jobPosition($data);
				
				echo $jobPosition; die;
				
			}
			
		}
		public static function checkEmployeeSSN($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new InviteEmployeeModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['lid']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$userSummary = $model->userSummary($data);
				$data['email']=$userSummary['email'];
				require_once('../configs/testMandril.php');
				$checkEmployeeSSN = $model->checkEmployeeSSN($data);
				
				echo $checkEmployeeSSN; die;
				
			}
			
		}
		
		public static function resendInvitation($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new InviteEmployeeModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['lid']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$userSummary = $model->userSummary($data);
				$data['email']=$userSummary['email'];
				require_once('../configs/testMandril.php');
				$resendInvitation = $model->resendInvitation($data);
				
				echo $resendInvitation; die;
				
			}
			
		}
		
		
		public static function inviteEmployeeEmail($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new InviteEmployeeModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['lid']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$userSummary = $model->userSummary($data);
				$data['email']=$userSummary['email'];
				require_once('../configs/testMandril.php');
				$inviteEmployeeEmail = $model->inviteEmployeeEmail($data);
				
				echo $inviteEmployeeEmail; die;
			}
			
		}
		
		
		public static function verifyEmployeeExistance($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new InviteEmployeeModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['lid']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$userSummary = $model->userSummary($data);
				$data['email']=$userSummary['email'];
				require_once('../configs/testMandril.php');
				$verifyEmployeeExistance = $model->verifyEmployeeExistance($data);
				
				echo $verifyEmployeeExistance; die;
			}
			
		}
}
?>