<?php
	require_once 'PublicAppStoreModel.php';
	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class PublicAppStoreController
	{
		
	
		
		public static function index($a=null)
		{
				$path = "../../";
				$model1       = new PublicAppStoreModel();
				$country    = $model1->countryList();
				$getPermissionDetail    = $model1->getPermissionDetail();
				require_once('PublicAppStoreView.php');
			
		}
		
		
		public static function productPage($a=null)
		{
				$data=array();
				$path = "../../../../";
				$data['aid']=cleanMe($a);
				$model1       = new PublicAppStoreModel();
				$getAppsPermissionDetail    = $model1->getAppsPermissionDetail($data);
				if($getAppsPermissionDetail['image_path']=='')
				{
					$getAppsPermissionDetail['image_path']='https://safeqloud-228cbc38a2be.herokuapp.com/html/usercontent/images/dstricts/logo1.jpeg';
				}
				 
				$data['country_id']=$getAppsPermissionDetail['country_id'];
				$getAppsPermissionDetailRight    = $model1->getAppsPermissionDetailRight($data);
				$appFeeDetail    = $model1->appFeeDetail($data);
				$appPriceDetails    = $model1->appPriceDetails($data);
				require_once('PublicProductPageNewView.php');
			}
		
		public static function changeCountry()
		{
				$model1       = new PublicAppStoreModel();
				$changeCountry    = $model1->changeCountry();
				echo $changeCountry; die;
			}
		
	}
?>