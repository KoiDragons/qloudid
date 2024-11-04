<?php
	require_once 'OmOssModel.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class OmOssController
	{
		
		
		public static function index()
		{
			
		}
		
		public static function companyAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
          $model1       = new OmOssModel();
				$data=array();
				$model1       = new OmOssModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
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
				$model1       = new OmOssModel();
				$propertyInfo    = $model1->propertyInfo($data);
				$resultOrg    = $model1->userAccount($data);
				$selectIcon    = $model1->selectIcon($data);
				$contentDetailInsert = $model1->contentDetailInsert($data);	
				$resultOrg1    = $model1->employeeAccount($data);
				$contentDetail    = $model1->contentDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('OmOssViewNew.php');
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
				$model1       = new OmOssModel();
				$resultOrg    = $model1->userAccount($data);
				$contentDetailInsert = $model1->contentDetailInsert($data);	
				$resultOrg1    = $model1->employeeAccount($data);
				$contentDetail    = $model1->contentDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('OmOssInfoView.php');
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
				$model = new OmOssModel();
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=cleanMe($a);	
				
				$data['cid']=cleanMe($b);
						
				$updateContent = $model->updateContent($data);	
				header("location:../../companyAccount/".$data['cid']);
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
				$model = new OmOssModel();
				$data['user_id']=$_SESSION['user_id'];
				$updateVisual = $model->updateVisual();	
				echo $updateVisual; die;
			}
		}
		
		
	}
?>