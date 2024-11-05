<?php
	require_once 'InvitationModel.php';
	require_once '../configs/utility.php';
	class InvitationController
	{
		
		
		public static function index()
		{
			$path         = "../../../../";
			require_once('InvitationView.php');
		}
		
		public static function invitationShow($a=null)
		{
			$valueNew = checkLogin();
			// echo $valueNew; die;
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$model = new InvitationModel();
				if(isset($a))
				{
					$path         = "../../../../";
					$data['user_id']=cleanMe($a);
					$data['us']=0;
				}
				else{
					//echo "hello"; die;
					$path         = "../../../";
					$data['user_id']=$_SESSION['user_id'];
					$data['us']=1;
				}
				//print_r($data); die;
				
				$row_summary = $model->userSummary($data);	
				
				//$completedEmployeeRequests    = $model->completedEmployeeRequests($data);
				$rowUser = $model->approveUser($data);
				$rowUserApproved = $model->approvedUser($data);
				$requestDetail = $model->requestDetail($data);
				$requestPendingDetail = $model->requestPendingDetail($data);
				$requestPendingCount = $model->requestPendingCount($data);
				$requestApprovedCount = $model->requestApprovedCount($data);
				$rowP = $model->allCount($data);
				$approveCount = $model->approveCount($data);
				$resultIndus  = $model->selectIndustry();
                $resultContry = $model->selectCountry();
				require_once('InvitationView.php');
			}
		}
        
		public static function moreInvitationShow($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:../../../../../user/index.php/Login");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new InvitationModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				$data['limit1']=cleanMe($a);
				
				$data['limit']=$data['limit1']*12;
				
				$row_summary = $model->userSummary($data);	
				
				
				$rowUser = $model->approveUser($data);
				
				$rowP = $model->allCount($data);
				
				require_once('MoreInvitationView.php');
			}
			
		}
		
		public static function moreRequestDetail($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:../../../user/index.php/Login");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new InvitationModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				
				
				
				$moreRequestDetail = $model->moreRequestDetail($data);
				
				echo $moreRequestDetail; die;
			}
			
		}
		
		public static function updateRequest($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:../../../user/index.php/Login");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new InvitationModel();
                $data['user_id']=$_SESSION['user_id'];
				$updateRequest = $model->updateRequest($data);
				
				echo $updateRequest; die;
			}
			
		}
		
		
		public static function moreApprovedUser($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:../../../user/index.php/Login");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new InvitationModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				
				
				
				$moreApprovedUser = $model->moreApprovedUser($data);
				
				echo $moreApprovedUser; die;
			}
			
		}
		
		public static function moreEmployerRequestDetail($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:../../../user/index.php/Login");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new InvitationModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				
				
				
				$moreEmployerRequestDetail = $model->moreEmployerRequestDetail($data);
				
				echo $moreEmployerRequestDetail; die;
			}
			
		}
		
		public static function employeeRequestShow($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:../../../../../user/index.php/Login");
				} else {
				$data=array();
				$path         = "../../../../../";
				$model = new InvitationModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['limit1']=cleanMe($b);
				
				$data['limit']=$data['limit1']*12;
				
				$rowsummary = $model->userSummary($data);	
				$company = $model->userSummary($data);	
				$rowUser = $model->approveUser($data);
				$rowA = $model->approveCount($data);
				$rowP = $model->pendingCount($data);
				$rowR = $model->rejectCount($data);
				$rowa = $model->allCount($data);
				
				require_once('MoreEmployeeRequestView.php');
			}
			
		}
		
		
		public static function approveUserRequest($a = null , $b=null ,$c=null, $d=null)
		{
			 $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
        } else {
            $data=array();
			
			$model = new InvitationModel();
			
			//$data['cid']=cleanMe($a);
			$data['a_id']=$_POST['a_id'];
			$data['stat']=$_POST['status'];
			$data['user_id']=$_POST['user_id'];
			require_once('../configs/testMandril.php');
			
			$rowsummary = $model->approveUserRequest($data);	
			
			
			echo $rowsummary; die;
		}
		}
        public static function selectOrganizationWeb($c = null)
		{
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
        } else {
			$webModel = new InvitationModel();
			
			//print_r($_POST); die;
			if (isset($_POST)) {
				$val        = array();
				$val['web'] = cleanMe($_POST['web1']);
				// print_r($val); die;
				$resultWeb = $webModel->selectOrganizationWeb($val);
			}
			
			echo $resultWeb;
			die;
		}
		}
		public static function createCompanyAccount($a = null, $b = null, $c = null)
		{ 
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
        } else {
			$model = new InvitationModel();
			if (isset($_POST['company_email'])) {
				//session_start();
				$data = array();
				// print_r($_POST); die;
				
				$data['company_name']  = cleanMe($_POST['company_name_add']);
				$data['company_email'] = cleanMe($_POST['company_email']);
				$data['website']       = cleanMe($_POST['company_website']);
				$data['curr']          = 1;
				$data['created_on']    = date('Y-m-d H:i:s');
				$data['random_hash']   = substr(md5(uniqid(rand(), true)), 16, 16);
				$data['country']       = cleanMe($_POST['cntry']);
				
				$data['location'] = "Headquarter";
				$data['user_id']  = $_SESSION['user_id'];
				
				$data['ld']     = "";
				$data['sd']     = "";
				
				$data['inds']   = cleanMe($_POST['inds']);
				//print_r($data); die;
				$result         = $model->createCompanyAccount($data);
				
				if ($result == 0) {
					
					$path = "../../../";
					header("location:https://www.qloudid.com/user/index.php/Invitation/invitationShow");
				}
				
				else {
					
					$path = "../../../";
					require_once('../configs/testMandril.php');
					$resultPass = $model->sendCreateCompanyEmail($data);
					header("location:https://www.qloudid.com/thankyouregistration.php");
				}
				
			}
		}
		}
		
		public static function updateEmployeeDetail($a = null , $b=null ,$c=null, $d=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:/../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				//print_r($_POST); die;
				$model = new InvitationModel();
				$data['user_id']=$_SESSION['user_id'];
				$rowsummary = $model->updateEmployeeDetail($data);	
				
				header('location:../Invitation/invitationShow');
			}
			
		}
		
		  public static function searchCompanyDetail($c = null)
		{
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
        } else {
			$webModel = new InvitationModel();
			
			//print_r($_POST); die;
			if (isset($_POST)) {
				$resultWeb = $webModel->searchCompanyDetail();
			}
			
			echo $resultWeb;
			die;
		}
		}
	}
    
	
	
?>