<?php
	require_once 'LostandFoundModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class LostandFoundController
	{
		
		
		public static function index()
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				
				$model       = new LostandFoundModel();
				
				require_once('LostandFoundView.php');
			}	
		}
		
		
		public static function addAddress($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			$path = "../../../../";
			$data=array();
			$data['id']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model = new LostandFoundModel();
			
			require_once('LostandFoundAddressView.php');
				}
		}
		
		public static function updateAddress($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['id']=cleanMe($a);
			$model1       = new LostandFoundModel();
			if (isset($_POST)) {
				
				$resultWeb = $model1->updateAddress($data);
			}
			
			header('location:../../ForloratOchUpphittat');
				}
		}
		public static function addItem()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			include('../configs/testMandril.php');
			$model = new LostandFoundModel();
			$sendInformation = $model->sendInformation($data);
			header('location:addAddress/'.$sendInformation);
				}
		}
	}
?>