<?php
	
	require_once 'ProductVariationModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class ProductVariationController
	{
		 
		public static function listVariation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new ProductVariationModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				 
				$selectIcon    = $model->selectIcon($data);
				
				$companyDetail    = $model->companyDetail($data);
				$variationInfo    = $model->variationInfo($data); 
				$row_summary    = $model->userSummary($data);
				require_once('ProductVariationView.php');
			}
		}
		
	 
		  public static function detailInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new ProductVariationModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				 
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				 
				$row_summary    = $model->userSummary($data);
				require_once('ProductVariationDetailView.php');
			}
		}
	 
	 
		public static function moreVariationInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new ProductVariationModel();
				$moreVariationInfo = $model->moreVariationInfo($data);
				echo $moreVariationInfo; die;
			}
		} 
		
	public static function addSubVariation()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				
				$model = new ProductVariationModel();
				$addSubVariation = $model->addSubVariation();
				echo $addSubVariation; die;
			}
		} 	
		
		public static function updateSubVariation()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				
				$model = new ProductVariationModel();
				$updateSubVariation = $model->updateSubVariation();
				echo $updateSubVariation; die;
			}
		} 

public static function deleteSubVariation()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				
				$model = new ProductVariationModel();
				$deleteSubVariation = $model->deleteSubVariation();
				echo $deleteSubVariation; die;
			}
		} 		
		
	 public static function addVariation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new ProductVariationModel();
				$addVariation = $model->addVariation($data);	
				header("location:../listVariation/".$data['cid']);
			}	
		} 
		
		  
		
	}
?>