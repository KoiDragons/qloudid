<?php
	require_once 'LostandFoundModel.php';
	require_once 'EmployeeCheckController.php';
	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class LostandFoundController
	{
		
		
		public static function index()
		{
			
		}
		
		public static function itemInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$model       = new LostandFoundModel();
				
				$companyDetail    = $model->companyDetail($data);
				$data['comp_id']    = $model->selectWhitelistCompany($data);
				$data['comp_name']    = $model->selectWhitelistCompanyName($data);
				
				require_once('LostandFoundView.php');
			}
		}
		
		public static function employeeList($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				$data['cid']=cleanMe($a);
				$data['filter']=cleanMe($_GET['filter']);
				$model = new LostandFoundModel();
				
				$employeeList=$model->employeeList($data);
				
				echo $employeeList;
				
			}
		}
		
		
		public static function sendInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			$data=array();
			$data['cid']=cleanMe($a);
			include('../configs/testMandril.php');
			$model = new LostandFoundModel();
			$sendInformation = $model->sendInformation($data);
			echo $sendInformation; die;
				}
		}
	}
?>