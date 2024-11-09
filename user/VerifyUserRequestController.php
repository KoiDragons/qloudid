<?php
	require_once 'VerifyUserRequestModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class VerifyUserRequestController
	{
		
		
		public static function index()
		{
			$path="../../";
			
			
			require_once('VerifyUserRequestView.php');
			
		}
		
		public static function requestAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				
				$path="../../../../";
				$model = new VerifyUserRequestModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['request_id']=cleanMe($a);
				$verificationId    = $model->verificationId($data);
				if($verificationId==0)
				{
					header("location:../../NewPersonal/userAccount");
				}
				$row_summary    = $model->userSummary($data);
				
				$resultOrg    = $model->userAccount($data);
				$resultOrg1    = $model->employeeAccount($data);
				require_once('VerifyUserRequestView.php');
			}
		}
		
		public static function domainSearch($a=null , $b=null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			$path="../../../";
			$model = new VerifyUserRequestModel();
			
			$data=array();
			$data['search']="%".cleanMe($a);
			$data['lmt']=cleanMe($b);
			//print_r($data); die;
			$partDataSearch=$model->partDataSearch($data);
			
			echo $partDataSearch; die;
		}
		}
		public static function updateAccount($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path="../../../";
				$model = new VerifyUserRequestModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['request_id']=cleanMe($a);
				require_once('../configs/testMandril.php');
				$updateAccount=$model->updateAccount($data);
				header("location:../../NewPersonal/userAccount");
				
			}
		}
	}
?>