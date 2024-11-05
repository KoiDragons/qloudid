<?php
require_once 'VitechPropertiesModel.php';
 
require_once '../configs/utility.php';
require_once('../AppModel.php');
class VitechPropertiesController
{
	 public static function listPropertyRequest()
    {
		 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$model1       = new VitechPropertiesModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
			$path = "../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new VitechPropertiesModel();
			$updateOwnerDetail    = $model1->updateOwnerDetail($data);
			$displayproperties    = $model1->listPropertyRequest($data);
			//echo '<pre>'; print_r($displayproperties); echo '</pre>';
			require_once('VitechPropertyRequestView.php');
				}
	}
	 
	 
	public static function rejectExclusiveRequest($a=null)
    {
		 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$model1       = new VitechPropertiesModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
			$path = "../../../";
			$data=array();
			$data['request_id']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new VitechPropertiesModel();
			$rejectExclusiveRequest    = $model1->rejectExclusiveRequest($data);
			header('location:../listPropertyRequest');
				}
	} 
	  
	
	public static function approveExclusiveRequest($a=null)
    {
		 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$model1       = new VitechPropertiesModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
			$path = "../../../";
			$data=array();
			$data['request_id']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new VitechPropertiesModel();
			$approveExclusiveRequest    = $model1->approveExclusiveRequest($data);
			header('location:../listPropertyRequest');
				}
	} 
	
}
?>