<?php
	
	require_once 'LedigaJobbModel.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class LedigaJobbController
	{
		
		
		public static function index()
		{
			
		}
		
		public static function companyAccount($a=null)
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
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$_SESSION['company_id']=cleanMe($a);
				$model1       = new LedigaJobbModel();
				$selectIcon    = $model1->selectIcon($data);
				$resultOrg    = $model1->userAccount($data);
				$contentDetailInsert = $model1->contentDetailInsert($data);	
				$resultOrg1    = $model1->employeeAccount($data);
				$contentDetail    = $model1->contentDetail($data);
				$row_summary    = $model1->userSummary($data);
				
				require_once('LedigaJobbView.php');
			}
		}
		
		 public static function updateVisual()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path         = "../../";
				$model = new LedigaJobbModel();
				$data['user_id']=$_SESSION['user_id'];
				$updateVisual = $model->updateVisual();	
				echo $updateVisual; die;
			}
		}
		
		public static function storedInfo($a=null)
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
				$model1       = new LedigaJobbModel();
				$resultOrg    = $model1->userAccount($data);
				$contentDetailInsert = $model1->contentDetailInsert($data);	
				$resultOrg1    = $model1->employeeAccount($data);
				$contentDetail    = $model1->contentDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('LedigaJobbInfoView.php');
			}
		}
			public static function updateContent($a=null , $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path         = "../../";
				$model = new LedigaJobbModel();
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=cleanMe($a);	
				
				$data['cid']=cleanMe($b);
						
				$updateContent = $model->updateContent($data);	
				header("location:../../companyAccount/".$data['cid']);
			}
		}
        
		
		
	}
?>