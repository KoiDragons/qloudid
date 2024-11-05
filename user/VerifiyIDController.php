<?php
	require_once 'VerifiyIDModel.php';
	require_once '../company/EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class VerifiyIDController
	{
		
		public static function verifiyIDAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model = new VerifiyIDModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$selectCountry = $model->selectCountry($data);
				$userSummary = $model->userSummary($data);
				$selectCredits = $model->selectCredits($data);
				
				require_once('VerifiyIDView.php');
			}
		}
		
		public static function searchUserDetail($a = null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../../";
				$data=array();
				$model = new VerifiyIDModel();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				require_once('../configs/testMandril.php');
				include('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				$searchUserDetail = $model->searchUserDetail($data);	
				
				echo $searchUserDetail; die;
			}
			
		}
		
		
	}
?>