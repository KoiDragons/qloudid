<?php
	require_once 'ViewCompanyModel.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	class ViewCompanyController
	{
	
		public static function companyAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new ViewCompanyModel();
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model1->companyDetail($data);
				//print_r($companyDetail); die;
				$verificationId    = $model1->verificationId($data);
				$row_summary    = $model1->userSummary($data);
				require_once('ViewCompanySuppliersView.php');
			}
		}
		
		
		public static function landloardAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new ViewCompanyModel();
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkLandloardAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model1->companyDetail($data);
				//print_r($companyDetail); die;
				$verificationId    = $model1->verificationId($data);
				$row_summary    = $model1->userSummary($data);
				require_once('ViewCompanyLandloardsView.php');
			}
		}
		
		public static function neighboursAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new ViewCompanyModel();
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkLandloardAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model1->companyDetail($data);
				$listNeighbours    = $model1->listNeighbours($data);
				$countNeighbours    = $model1->countNeighbours($data);
				//print_r($companyDetail); die;
				$verificationId    = $model1->verificationId($data);
				$row_summary    = $model1->userSummary($data);
				require_once('ViewCompanyNeighboursView.php');
			}
		}
		
		public static function moreNeighbours($a = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=$_POST['id'];
				
				$model1       = new ViewCompanyModel();
				
				$moreNeighbours    = $model1->moreNeighbours($data);
				echo $moreNeighbours; die;
			}
		}	
		
	}
    
	
	
?>