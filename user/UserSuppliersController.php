<?php
	require_once 'UserSuppliersModel.php';
	require_once '../configs/utility.php';
	class UserSuppliersController
	{
		
		
		public static function index()
		{
			$path         = "../../../../";
			require_once('UserSuppliersView.php');
		}
		
		public static function userSuppliersShow($a=null)
		{
			$valueNew = checkLogin();
			// echo $valueNew; die;
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$model = new UserSuppliersModel();
				
				$path         = "../../../";
				$data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				
				$row_summary = $model->userSummary($data);	
				$rowUserApproved = $model->approvedUser($data);
				$requestDetail = $model->requestDetail($data);
				$requestRejectedDetail = $model->requestRejectedDetail($data);
				$requestPendingDetail = $model->requestPendingDetail($data);
				$requestPendingCount = $model->requestPendingCount($data);
				$requestApprovedCount = $model->requestApprovedCount($data);
				$requestRejectedCount = $model->requestRejectedCount($data);
				$resultIndus  = $model->selectIndustry();
                $resultContry = $model->selectCountry();
				require_once('UserSuppliersView.php');
			}
		}
        
		public static function moreUserSuppliersShow($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:../../../../../user/index.php/Login");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new UserSuppliersModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				$data['limit1']=cleanMe($a);
				
				$data['limit']=$data['limit1']*12;
				
				$row_summary = $model->userSummary($data);	
				
				
				$rowUser = $model->approveUser($data);
				
				$rowP = $model->allCount($data);
				
				require_once('MoreUserSuppliersView.php');
			}
			
		}
		
		public static function moreRequestDetail($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new UserSuppliersModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				
				
				
				$moreRequestDetail = $model->moreRequestDetail($data);
				
				echo $moreRequestDetail; die;
			}
			
		}
		
		
		public static function moreRequestDetailCustomer($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new UserSuppliersModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				
				
				
				$moreRequestDetailCustomer = $model->moreRequestDetailCustomer($data);
				
				echo $moreRequestDetailCustomer; die;
			}
			
		}
		
		public static function updateRequest($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new UserSuppliersModel();
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
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new UserSuppliersModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				
				
				
				$moreApprovedUser = $model->moreRequestApprovedDetail($data);
				
				echo $moreApprovedUser; die;
			}
			
		}
		
		public static function moreRequestRejectedDetail($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new UserSuppliersModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				
				
				
				$moreRequestRejectedDetail = $model->moreRequestRejectedDetail($data);
				
				echo $moreRequestRejectedDetail; die;
			}
			
		}
		
		public static function moreEmployerRequestDetail($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new UserSuppliersModel();
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
				$model = new UserSuppliersModel();
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
		{$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				
				$data=array();
				
				$model = new UserSuppliersModel();
				
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
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$webModel = new UserSuppliersModel();
				
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
				$path = "../../../../../";
				header("location:../../../user/index.php/Login");
				} else {
				$model = new UserSuppliersModel();
				if (isset($_POST['company_email'])) {
					session_start();
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
						header("location:https://www.qloudid.com/user/index.php/UserSuppliers/UserSuppliersShow");
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
				$model = new UserSuppliersModel();
				$data['user_id']=$_SESSION['user_id'];
				$rowsummary = $model->updateEmployeeDetail($data);	
				
				header('location:../UserSuppliers/UserSuppliersShow');
			}
			
		}
		
		public static function searchCompanyDetail($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$webModel = new UserSuppliersModel();
				
				//print_r($_POST); die;
				if (isset($_POST)) {
					$resultWeb = $webModel->searchCompanyDetail();
				}
				
				echo $resultWeb;
				die;
			}
		}
		
		
		public static function searchUserDetail($a = null , $b=null ,$c=null, $d=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../";
				$data=array();
				$model = new UserSuppliersModel();
				$data['user_id']=$_SESSION['user_id'];
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$searchUserDetail = $model->searchUserDetail($data);	
				
				echo $searchUserDetail; die;
			}
			
		}
		
		public static function sendRequest($a = null, $b = null, $c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:../../LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model = new UserSuppliersModel();
				require_once('../configs/testMandril.php');
				$sendRequest    = $model->sendRequest($data);
				header('location:../../UserSuppliers/userSuppliersShow');
			}
		}
	}
    
	
	
?>