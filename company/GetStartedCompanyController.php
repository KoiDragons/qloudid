<?php
	require_once 'GetStartedCompanyModel.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	
	class GetStartedCompanyController
	{
	
		public static function companyAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				require_once('GetStartedCompanyView.php');
			}
		}
		
		public static function dunsInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model1       = new GetStartedCompanyModel();
				
				$result    = $model1->dunsInfoCount($data);
				if($result>0)
				{
				header("location:../../ReceivedChild/verifyRequests/".$data['cid']);
				}
				require_once('GetStartedCompanyDunsNumberInfoView.php');
			}
		}
		public static function checkUsedDuns($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($co);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new GetStartedCompanyModel();
				
				$result    = $model1->checkUsedDuns($data);
				echo $result; die;
			}
		}
		
		public static function addDuns($co = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($co);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new GetStartedCompanyModel();
				
				$result    = $model1->addDuns($data);
				header("location:../../ReceivedChild/verifyRequests/".$data['cid']);
			}
		}
	}
?>