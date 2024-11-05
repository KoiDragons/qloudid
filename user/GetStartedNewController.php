<?php
	require_once 'GetStartedNewModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class GetStartedNewController
	{
		
		
		public static function index()
		{
			//$valueNew = checkLogin();
			if(isset($_SESSION['rememberme']))
			{
				setcookie('rememberme', $_SESSION['rememberme'], time()+ (30*60*60*24), '/', "qloudid.com");
			}
			else if (checkLogin() == 0) {
				
				header("location:LoginAccount");
				} else {
				$path="../../";
				$model = new GetStartedNewModel();
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$result = $model->GetStartedUser($data);
				$resultIndus  = $model->selectIndustry();
				$resultContry = $model->selectCountry();
				require_once('GetStartedNewView.php');
			}
			
		}
		public static function checkUserAvailability($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new GetStartedNewModel();
				
				$result    = $model1->checkUserAvailability($data);
				echo $result; die;
			}
		}
		
		
		public static function selectOrganizationWeb($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$webModel = new GetStartedNewModel();
				
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
				header("location:../LoginAccount");
				} else {
				$model = new GetStartedNewModel();
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
						header("location:https://www.qloudid.com/user/index.php/GetStartedNew");
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
				$model = new GetStartedNewModel();
				$data['user_id']=$_SESSION['user_id'];
				$rowsummary = $model->updateEmployeeDetail($data);	
				
				header('location:../PersonalRequests/sentRequests');
			}
			
		}
		
		public static function searchCompanyDetail($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$webModel = new GetStartedNewModel();
				
				//print_r($_POST); die;
				if (isset($_POST)) {
					$resultWeb = $webModel->searchCompanyDetail();
				}
				
				echo $resultWeb;
				die;
			}
		}
		
		
		public static function updateUserProfile($a = null , $b=null ,$c=null, $d=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:/../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				//print_r($_POST); die;
				$model = new GetStartedNewModel();
				$data['user_id']=$_SESSION['user_id'];
				$rowsummary = $model->updateUserProfile($data);	
				
					header('location:../ReceivedRequest');
				
			}
			
		}
		
		public static function verifyUserDetail()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new GetStartedNewModel();
				
				require_once('../configs/smsMandril.php');
				$verifyUserDetail = $model->verifyUserDetail($data);	
				
				echo $verifyUserDetail; die;
			}
			
		}
		
		public static function verifyUserDetailCheck()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new GetStartedNewModel();
				
				require_once('../configs/smsMandril.php');
				$verifyUserDetail = $model->verifyUserDetailCheck($data);	
				
				echo $verifyUserDetail; die;
			}
			
		}
		public static function verifyOtp()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../";
				
				$model = new GetStartedNewModel();
				
				require_once('../configs/smsMandril.php');
				$verifyOtp = $model->verifyOtp();	
				
				echo $verifyOtp; die;
			}
			
		}
		
	}
	
	
?>