<?php
	require_once 'LocationModel.php';
	require_once '../configs/utility.php';
	class LocationController
	{
		
		
		public static function index()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				
				header("location:LoginAccount");
				} else {
				
				$path         = "../../";
				$model1       = new LocationModel();
				
				$resultContry = $model1->selectCountry();
				
				require_once('LocationView.php');
			}
		}
		
		public static function updateLocation($a = null, $b = null, $c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				
				header("location:../LoginAccount");
				} else {
				$model = new LocationModel();
				
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cntry']     = cleanMe($_POST['cntry']);
				$data['state']     = cleanMe($_POST['state']);
				$data['city']     = cleanMe($_POST['city']);
				$data['district']     = cleanMe($_POST['district']);
				
				$resultPass = $model->updateLocation($data);
				header("location:../../../user/index.php/NewPersonal/userAccount");
			}
			
		}
		
		public static function selectState($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$stModel = new LocationModel();
				if (isset($_POST['country_id'])) {
					
					$val         = $_POST['country_id'];
					$resultState = $stModel->selectState($val);
				}
				$option = '<option value="" >-- Select State --</option>';
				foreach ($resultState as $stateCategory => $StateValue) {
					
					$option        = $option . "<option value='" . $StateValue['id'] . "'>" .$StateValue['state_name']. "</option>";
				}
				echo $option;
				die;
			}
		}
		
		public static function selectCity($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$ctModel = new LocationModel();
				if (isset($_POST['state_id'])) {
					$val        = array();
					$val['sid'] = $_POST['state_id'];
					$resultCity = $ctModel->selectCity($val);
				}
				$option = '<option value="" >-- Select City --</option>';
				foreach ($resultCity as $category => $value) {
					$category = htmlspecialchars($category);
					
					$option   = $option . '<option value="' . $value['id'] . '">' .$value['city_name']. '</option>';
				}
				echo $option;
				die;
			}
		}
		public static function selectDistrict($c = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$ctModel = new LocationModel();
				if (isset($_POST['city_id'])) {
					$val        = array();
					$val['sid'] = $_POST['city_id'];
					$resultLocation = $ctModel->selectDistrict($val);
				}
				$option = '<option value="" >-- Select District --</option>';
				foreach ($resultLocation as $category => $value) {
					$category = htmlspecialchars($category);
					
					$option   = $option . '<option value="' . $value['id'] . '">' .$value['district_name'] . '</option>';
				}
				echo $option;
				die;
			}
		}
		
		
		
		
		
	}
	
	
?>