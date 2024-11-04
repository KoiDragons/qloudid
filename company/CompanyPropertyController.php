<?php
	require_once 'CompanyPropertyModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCustomersController.php';
	require_once '../configs/utility.php';
	class CompanyPropertyController
	{
	 
	 public static function checkAddress()
		{
			 
				$model1       = new CompanyPropertyModel();
				
				$result    = $model1->checkAddress();
				echo $result; die;
			 
		}
		
		public static function checkAddresslatLong()
		{
			 
				$model1       = new CompanyPropertyModel();
				
				$result    = $model1->checkAddresslatLong();
				echo $result; die;
			 
		}
		
		public static function todoInfo($a=null)
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
				$model       = new CompanyPropertyModel();
				$locationDetail    = $model->locationDetail($data);
				$headquarterDetail    = $model->headquarterDetail($data);
				$row_summary    = $model->userSummary($data);
				$companyDetail    = $model->companyDetail($data);
				 
				require_once('CompanyPropertyHeadquarterTodoView.php');
			}
		}
		
		public static function officesTodo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=cleanMe($a);
				$model       = new CompanyPropertyModel(); 
				$propertyInfo    = $model->propertyInfo($data);
				$data['cid']=$propertyInfo['cid'];
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				
				$locationDetail    = $model->locationDetailnfo($data);
				$headquarterDetail    = $model->headquarterDetail($data);
				$row_summary    = $model->userSummary($data);
				$companyDetail    = $model->companyDetail($data);
				 
				require_once('CompanyPropertyOfficesTodoView.php');
			}
		}
		
		
		
		
		public static function locationAccount($a=null)
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
				$model       = new CompanyPropertyModel();
				$locationDetail    = $model->locationDetail($data);
				 
				$locationCount    = $model->locationCount($data);
				$headquarterDetail    = $model->headquarterDetail($data);
				$row_summary    = $model->userSummary($data);
				$companyDetail    = $model->companyDetail($data);
				$model4       = new ManagePermissionsController();
				$adminRequestReceivedCount    = $model4->adminRequestReceivedCount($data['cid']);
				
				$model3       = new CompanyConsentPlatformController();
				$verifyIDReceivedCount    = $model3->verifyIDReceivedCount($data['cid']);
				
				$model2       = new CompanyCustomersController();
				$customerRequestReceivedCount    = $model2->customerRequestReceivedCount($data['cid']);
				require_once('CompanyPropertyView.php');
			}
		}
		public static function editProperty($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['id']=cleanMe($b);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model       = new CompanyPropertyModel();
				$resultContry = $model->selectCountryCode();
				$companyDetail    = $model->companyDetail($data);
				$locationDetail    = $model->locationDetail($data);
				$headquarterCount    = $model->headquarterCount($data);
				$propertyInfo    = $model->propertyInfo($data);
				//print_r($propertyInfo); die;
				$propertyDetailInfo    = $model->propertyDetailInfo();
				require_once('PropertyLocationView.php');
			}
		}
		
		
		public static function locationInformation($a=null)
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
				$model       = new CompanyPropertyModel();
				$resultContry = $model->selectCountry();
				 
				$companyDetail    = $model->companyDetail($data);
				$headquarterCount    = $model->headquarterCount($data);
				$propertyDetailInfo    = $model->propertyDetailInfo();
				$row_summary    = $model->userSummary($data);
				require_once('CompanyPropertyLocationView.php');
			}
		}

		public static function moreLocationDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyPropertyModel();
				$headquarterDetail    = $model->headquarterDetail($data);
				$data['rent_p']=$headquarterDetail['rent_permises'];
				$moreLocationDetail = $model->moreLocationDetail($data);
				echo $moreLocationDetail; die;
			}
		}
		
	public static function addLocationDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyPropertyModel();
				$addLocationDetail = $model->addLocationDetail($data);
				header('location:../locationAccount/'.$data['cid']);
			}
		}
		
		
		public static function updateLocationDetail($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['id']=cleanMe($b);
				$model = new CompanyPropertyModel();
				$updateLocationDetail = $model->updateLocationDetail($data);
				header('location:../../locationAccount/'.$data['cid']);
			}
		}
		
		public static function refuseRent($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				
				$model = new CompanyPropertyModel();
				$refuseRent = $model->refuseRent($data);
				header('location:../officesTodo/'.$_POST['location_id']);
			}
		}
		public static function refuseOffer($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				
				$model = new CompanyPropertyModel();
				$refuseOffer = $model->refuseOffer($data);
				header('location:../todoInfo/'.$data['cid']);
			}
		}
		
		
		public static function refuseEmployee($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				
				$model = new CompanyPropertyModel();
				$refuseEmployee = $model->refuseEmployee($data);
				header('location:../todoInfo/'.$data['cid']);
			}
		}
		
		public static function acceptRent($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				
				$model = new CompanyPropertyModel();
				$acceptRent = $model->acceptRent($data);
				header('location:../officesTodo/'.$_POST['location_id_yes']);
			}
		}
	}
    
	
	
?>