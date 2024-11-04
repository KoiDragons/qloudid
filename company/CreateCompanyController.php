<?php
	require_once 'CreateCompanyModel.php';
	require_once '../configs/utility.php';
	class CreateCompanyController
	{
		
		
		public static function index()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../user/index.php/LoginAccount");
				} else {
				$path         = "../../";
				$model1       = new CreateCompanyModel();
				$resultOrg    = $model1->selectOrganization();
				$resultIndus  = $model1->selectIndustry();
				// $resultCurr   = $model1->selectCurrency();
				$resultContry = $model1->selectCountry();
				
				require_once('CreateCompanyView.php');
			}
		}
		
		
		public static function createCompanyAccount($a = null, $b = null, $c = null)
		{
			
			$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../../";
            header("location:../../../user/index.php/LoginAccount");
        } else {
			
			$model = new CreateCompanyModel();
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
				$data['state']         = cleanMe($_POST['state']);
				;
				$data['city'] = cleanMe($_POST['city']);
				
				$data['district'] = cleanMe($_POST['district']);
				
				$data['location'] = "Headquarter";
				$data['user_id']  = $_SESSION['user_id'];
				
				$data['ld']     = "";
				$data['sd']     = "";
				$data['o_type'] = cleanMe($_POST['o_type']);
				$data['inds']   = cleanMe($_POST['inds']);
				$result         = $model->createCompanyAccount($data);
				
				if ($result == 0) {
					
					$path = "../../../";
					require_once('CreateCompanyView.php');
				}
				
				else {
					
					$path = "../../../";
					require_once('../configs/testMandril.php');
					$resultPass = $model->sendCreateCompanyEmail($data);
					header("location:https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorShow");
				}
				
			}
			
			
		}
			
		}
		
		
		
		
		
		
		
		
		
		
		
		public static function selectState($co = null)
		{
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
			$stModel = new CreateCompanyModel();
			if (isset($co)) {
				
				$val         = cleanMe($co);
				$resultState = $stModel->selectState($val);
			}
			$option = '<option value="0" >-- Select State --</option>';
			foreach ($resultState as $stateCategory => $StateValue) {
				$stateCategory = htmlspecialchars($stateCategory);
				$option        = $option . '<option value="' . $StateValue['id'] . '">' . $StateValue['state_name'] . '</option>';
			}
			echo $option;
			die;
		}
		
		}
		public static function selectCity($c = null)
		{
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
			$ctModel = new CreateCompanyModel();
			if (isset($c)) {
				$val        = array();
				$val['sid'] = cleanMe($c);
				$resultCity = $ctModel->selectCity($val);
			}
			$option = '<option value="0" >-- Select City --</option>';
			foreach ($resultCity as $category => $value) {
				$category = htmlspecialchars($category);
				$option   = $option . '<option value="' . $value['id'] . '">' . $value['city_name'] . '</option>';
			}
			echo $option;
			die;
		}
		}
		public static function selectDistrict($c = null)
		{
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
			$ctModel = new CreateCompanyModel();
			if (isset($c)) {
				$val        = array();
				$val['sid'] = cleanMe($c);
				$resultCity = $ctModel->selectDistrict($val);
			}
			$option = '<option value="0" >-- Select District --</option>';
			foreach ($resultCity as $category => $value) {
				$category = htmlspecialchars($category);
				$option   = $option . '<option value="' . $value['id'] . '">' . $value['district_name'] . '</option>';
			}
			echo $option;
			die;
		}
		}
		
		public static function selectOrganizationWeb($c = null)
		{
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
			$webModel = new CreateCompanyModel();
			
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
		
		
		public static function checkVerified()
		{
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
			$webModel = new CreateCompanyModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$resultWeb = $webModel->checkVerified($data);
			
			echo $resultWeb;
			die;
		}
		
		}
		
	}
	
	
?>