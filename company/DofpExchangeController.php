<?php

	require_once 'DofpExchangeModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCrmController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class DofpExchangeController
	{
		
		  
		
		public static function listProperties($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new DofpExchangeModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new DofpExchangeModel();
				$data['app_id']    = $model->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
					
				if($appdownloadStatus==0)
				{
				$getPermissionDetail    = $model->getPermissionDetail($data);
				header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
				die;
				}
				 $buildingList    = $model->buildingList($data);
				$apartmentList    = $model->apartmentList($data);
				 
				require_once('DofpExchangeListView.php');
			}
		}
		 
		 
		public static function removeFromExchangeList($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new DofpExchangeModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['apartment_id']=cleanMe($b);
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new DofpExchangeModel();
				$data['app_id']    = $model->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
					
				if($appdownloadStatus==0)
				{
				$getPermissionDetail    = $model->getPermissionDetail($data);
				header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
				die;
				}
				$removeFromExchangeList    = $model->removeFromExchangeList($data);
				  
				header('location:../../listProperties/'.$data['cid']);
			}
		}
		
		
		public static function addToExchangeList($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new DofpExchangeModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['apartment_id']=cleanMe($b);
				$data['page_id']=1;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new DofpExchangeModel();
				$data['app_id']    = $model->appId();
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
					
				if($appdownloadStatus==0)
				{
				$getPermissionDetail    = $model->getPermissionDetail($data);
				header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
				die;
				}
				$addToExchangeList    = $model->addToExchangeList($data);
				  
				header('location:../../listProperties/'.$data['cid']);
			}
		}
		 
	}
    
	
	
?>