<?php

	require_once 'BofpExchangeModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCrmController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class BofpExchangeController
	{
		
		  
		
		public static function listProperties($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new BofpExchangeModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
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
					header("location:https://www.qloudid.com/error404.php");
				}
				$model       = new BofpExchangeModel();
				$apartmentList    = $model->apartmentList($data);
				 
				require_once('BofpExchangeListView.php');
			}
		}
		 
	 
		 
	}
    
	
	
?>