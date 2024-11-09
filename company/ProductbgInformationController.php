<?php
	require_once 'ProductbgInformationModel.php';
	require_once 'EmployeeCheckController.php';
	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class ProductbgInformationController
	{
		
		
		public static function index()
		{
			
		}
		
		public static function bgInfo($a=null)
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
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				
				
				$model       = new ProductbgInformationModel();
				
				$companyDetail    = $model->companyDetail($data);
				$addProduct    = $model->addProduct($data);
				$row_summary    = $model->userSummary($data);
				
				require_once('ProductbgInformationView.php');
			}
		}
		
		public static function updateImage($co = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
        } else {
			$data=array();
			
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($co);
            $model1       = new ProductbgInformationModel();
           
			$result    = $model1->updateImage($data);
           header("location:../bgInfo/".$data['cid']);
        }
	}
	
	
		public static function updateImageParkering($co = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
        } else {
			$data=array();
			
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($co);
            $model1       = new ProductbgInformationModel();
           
			$result    = $model1->updateImageParkering($data);
           header("location:../bgInfo/".$data['cid']);
        }
	}
	
		public static function updateImageBuds($co = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
        } else {
			$data=array();
			
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($co);
            $model1       = new ProductbgInformationModel();
           
			$result    = $model1->updateImageBuds($data);
           header("location:../bgInfo/".$data['cid']);
        }
	}
	}
?>