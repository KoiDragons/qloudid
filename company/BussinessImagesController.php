<?php
	
	require_once 'BussinessImagesModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class BussinessImagesController
	{
		public static function displayInformation($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new BussinessImagesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['bid']=cleanMe($a);
				$data['btype']=cleanMe($b);
				$bussinessType    = $model->bussinessType($data);
				if($bussinessType==1)
				{
				$data['cid']=cleanMe($a);	
				}
				else 
				{
				$data['cid']=$model->bussinessCompany($data);	
				}
				$data['app_id']    = $model->appId($data);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$businessDisplayInformation    = $model->businessDisplayInformation($data);
				 
				$row_summary    = $model->userSummary($data);
				require_once('BussinessImagesView.php');
			}
		}
		
		 
		public static function addImages($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['btype']=cleanMe($c);
				  
				$model       = new BussinessImagesModel();
				$data['bussinessType']    = $model->bussinessType($data);
				 
				$addImages = $model->addImages($data);	
				 
				if($data['bussinessType']==1)
				{
					 
				header("location:../../../../Eshop/serviceInformation/".$data['cid']);	die;
				}
				else if($data['bussinessType']==2)
				{
					 
				header("location:../../../../HotelStay/roomsList/".$data['cid']."/".$data['bid']);	die;
				}
				else if($data['bussinessType']==3)
				{
					 
				header("location:../../../../Resturant/editResturantInformation/".$data['cid']."/".$data['bid']); die;	
				}
				else if($data['bussinessType']==4)
				{
				 
				header("location:../../../../Wellness/editWellnessInformation/".$data['cid']."/".$data['bid']);	die;
				}
			}	
		} 
		 
		 
		
	}
?>