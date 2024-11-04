<?php
	require_once 'CountryListModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class CountryListController
	{
		
		
		public function index()
		{
			$path  = "../../../../../";
			$valueNew = checkadmin();
			
			if ($valueNew == 0) {
				
				header("location:LoginAdmin");
			}
			else { 
				$path="../../";
				//print_r($_SESSION); die;
				$model = new CountryListModel();
				$countryDetail = $model->countryDetail();
				$countryCount = $model->countryCount();
				$adminSummary = $model->adminSummary();
				require_once('CountryListView.php');
			}
			
		}
		public function appMarket($a= null)
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../LoginAdmin");
				} else {
				$path="../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CountryListModel();
				
				$countryInfo = $model->countryInfo($data);
				//echo $countryInfo; die;
				if($countryInfo['is_visible']==0)
				{
					header('location:../../CountryList'); die;
				}
				$adminSummary = $model->adminSummary();
				$getPermissionDetail = $model->getPermissionDetail($data);
				require_once('CountryAppMarketView.php');
			}
		}
		
			public function emergencyListing($a= null)
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../LoginAdmin");
				} else {
				$path="../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CountryListModel();
				
				$countryInfo = $model->countryInfo($data);
				 
				if($countryInfo['is_visible']==0)
				{
					header('location:../../CountryList'); die;
				}
				$adminSummary = $model->adminSummary();
				$emergencyDetail = $model->emergencyDetail($data);
				require_once('CountryEmergencyListView.php');
			}
		}
		
			public function alarmInfo($a= null)
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../LoginAdmin");
				} else {
				$path="../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CountryListModel();
				
				$countryInfo = $model->countryInfo($data);
				 
				if($countryInfo['is_visible']==0)
				{
					header('location:../../CountryList'); die;
				}
				$adminSummary = $model->adminSummary();
				$addedAlamrs = $model->addedAlamrs($data);
				$addedAlamrsCount = $model->addedAlamrsCount($data);
				require_once('CountryEmergencyAlarmView.php');
			}
		}
		
		public function addAlarmNumber($a= null)
		{
			$valueNew = checkadmin();
			
			if ($valueNew == 0) {
				
				header("location:../../../LoginAdmin");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CountryListModel();
                $addAlarmNumber = $model->addAlarmNumber($data);
				header('location:../alarmInfo/'.$data['cid']);
			}
			
		}
		
		public function deleteAlarm($a= null, $b=null)
		{
			$valueNew = checkadmin();
			
			if ($valueNew == 0) {
				
				header("location:../../../LoginAdmin");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['id']=cleanMe($b);
				$model = new CountryListModel();
                $deleteAlarm = $model->deleteAlarm($data);
				header('location:../../alarmInfo/'.$data['cid']);
			}
			
		}
		
		public function productInfo($a= null, $b=null)
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../LoginAdmin");
				} else {
				$path="../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['appid']=cleanMe($b);
				$model = new CountryListModel();
				
				$countryInfo = $model->countryInfo($data);
				//echo $countryInfo; die;
				if($countryInfo['is_visible']==0)
				{
					header('location:../../../CountryList'); die;
				}
				
				$appInfo = $model->appInfo($data);
				
				if($appInfo['is_permission']==0)
				{
				header('location:../../appMarket/'.$data['cid']); die;
				}
				$priceDetail = $model->priceDetail($data);
				$appDetail = $model->appDetail($data);
				 //print_r($appDetail); die;
				require_once('ProductInformationView.php');
			}
		}
		
		
		public function productSubscriptionInfo($a= null, $b=null)
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../LoginAdmin");
				} else {
				$path="../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['appid']=cleanMe($b);
				$model = new CountryListModel();
				
				$countryInfo = $model->countryInfo($data);
				//echo $countryInfo; die;
				if($countryInfo['is_visible']==0)
				{
					header('location:../../../CountryList'); die;
				}
				
				$appInfo = $model->appInfo($data);
				
				if($appInfo['is_permission']==0)
				{
				header('location:../../appMarket/'.$data['cid']); die;
				}
				 $appDetail = $model->appDetail($data);
				 
				require_once('CountryAppPriceSubscriptionView.php');
			}
		}
		
			public function appStartPriceInfo($a= null, $b=null)
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../LoginAdmin");
				} else {
				$path="../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['appid']=cleanMe($b);
				$model = new CountryListModel();
				
				$countryInfo = $model->countryInfo($data);
				//echo $countryInfo; die;
				if($countryInfo['is_visible']==0)
				{
					header('location:../../../CountryList'); die;
				}
				
				$appInfo = $model->appInfo($data);
				
				if($appInfo['is_permission']==0)
				{
				header('location:../../appMarket/'.$data['cid']); die;
				}
				 $appDetail = $model->appDetail($data);
				 $data['selected_app']=$appDetail['app_id'];
				 $appStartFeeDetail = $model->appStartFeeDetail($data);
				// print_r($appStartFeeDetail); die;
				require_once('CountryAppStartPriceDetailView.php');
			}
		}
		
		
		
		public function updateAppStartPricing($a= null, $b=null)
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../LoginAdmin");
				} else {
				$path="../../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['appid']=cleanMe($b);
				$model = new CountryListModel();
				 
				$updateAppStartPricing = $model->updateAppStartPricing($data);
				header('location:../../appStartPriceInfo/'.$data['cid'].'/'.$data['appid']);
			}
		}
		
		
		
		public function updateSubscription($a= null, $b=null, $c=null)
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../LoginAdmin");
				} else {
				$path="../../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['appid']=cleanMe($b);
				$data['planid']=cleanMe($c);
				$model = new CountryListModel();
				
				$countryInfo = $model->countryInfo($data);
				//echo $countryInfo; die;
				if($countryInfo['is_visible']==0)
				{
					header('location:../../../../CountryList'); die;
				}
				
				$appInfo = $model->appInfo($data);
				
				if($appInfo['is_permission']==0)
				{
				header('location:../../../appMarket/'.$data['cid']); die;
				}
				 $planInfo = $model->planInfo($data);
				require_once('CountryAppPriceSubscriptionUpdateView.php');
			}
		}
		
		
		public function productSubscriptionDetailInfo($a= null, $b=null)
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../LoginAdmin");
				} else {
				$path="../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['appid']=cleanMe($b);
				$model = new CountryListModel();
				
				$countryInfo = $model->countryInfo($data);
				//echo $countryInfo; die;
				if($countryInfo['is_visible']==0)
				{
					header('location:../../../CountryList'); die;
				}
				
				$appInfo = $model->appInfo($data);
				
				if($appInfo['is_permission']==0)
				{
				header('location:../../appMarket/'.$data['cid']); die;
				}
				$priceDetail = $model->priceDetail($data);
				$appDetail = $model->appDetail($data);
				 
				require_once('CountryAppPriceSubscriptionListView.php');
			}
		}
		
		
		public function updateVisibleStatus()
		{
			$valueNew = checkadmin();
			
			if ($valueNew == 0) {
				
				 echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAdmin"; </script>'; die;
				} else {
				$data=array();
				$model = new CountryListModel();
                $updateVisibleStatus = $model->updateVisibleStatus($data);
				echo $updateVisibleStatus; die;
			}
			
		}
		
				public function updateProduct($a= null, $b=null)
		{
			$valueNew = checkadmin();
			
			if ($valueNew == 0) {
				
				header("location:../../../LoginAdmin");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['appid']=cleanMe($b);
				$model = new CountryListModel();
                $updateProduct = $model->updateProduct($data);
				header('location:../../appMarket/'.$data['cid']);
			}
			
		}
		
		public function addPrice($a= null, $b=null)
		{
			$valueNew = checkadmin();
			
			if ($valueNew == 0) {
				
				header("location:../../../LoginAdmin");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['appid']=cleanMe($b);
				$model = new CountryListModel();
                $addPrice = $model->addPrice($data);
				header('location:../../productSubscriptionDetailInfo/'.$data['cid'].'/'.$data['appid']);
			}
			
		
		}
		
		public function updatePrice($a= null, $b=null, $c=null)
		{
			$valueNew = checkadmin();
			
			if ($valueNew == 0) {
				
				header("location:../../../../LoginAdmin");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['appid']=cleanMe($b);
				$data['planid']=cleanMe($c);
				$model = new CountryListModel();
                $addPrice = $model->updatePrice($data);
				header('location:../../../productSubscriptionDetailInfo/'.$data['cid'].'/'.$data['appid']);
			}
			
		}
		
		public function updateAppsStatus()
		{
			$valueNew = checkadmin();
			
			if ($valueNew == 0) {
				
				 echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAdmin"; </script>'; die;
				} else {
				$data=array();
				$model = new CountryListModel();
                $updateVisibleStatus = $model->updateAppsStatus($data);
				echo $updateVisibleStatus; die;
			}
			
		}
		
		
		public function moreAddedAlamrs($a=null)
		{
			$valueNew = checkadmin();
			
			if ($valueNew == 0) {
				
				 echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAdmin"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CountryListModel();
                $moreAddedAlamrs = $model->moreAddedAlamrs($data);
				echo $moreAddedAlamrs; die;
			}
			
		}
	}
?>