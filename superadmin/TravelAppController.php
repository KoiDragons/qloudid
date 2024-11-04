<?php
	require_once 'TravelAppModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class TravelAppController
	{
		public function updateEmergencyService($a= null, $b=null, $c=null)
		{
		$valueNew = checkadmin();
        if ($valueNew == 0) {
            $path = "../../";
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAdmin"; </script>'; die;
        } else {
		
			$model = new TravelAppModel();
			$data=array();
			$data['cid']=cleanMe($a);
			$data['eid']=cleanMe($b);
			$data['company_id']=cleanMe($c);			
			$updateEmergencyService = $model->updateEmergencyService($data); 
			//$travelAppCompanyLocationCheck = $model->travelAppCompanyLocationCheck($data); 
			$travelAppCompanyLocation = $model->travelAppCompanyLocation($data); 
			echo $travelAppCompanyLocation; die;
		}
		}
		
		
		public function updateAllupdateEmergencyService($a= null, $b=null, $c=null)
		{
		$valueNew = checkadmin();
        if ($valueNew == 0) {
            $path = "../../";
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAdmin"; </script>'; die;
        } else {
		
			$model = new TravelAppModel();
			$data=array();
			$data['cid']=cleanMe($a);
			$data['eid']=cleanMe($b);
			$data['company_id']=cleanMe($c);			
			$updateAllupdateEmergencyService = $model->updateAllupdateEmergencyService($data); 
			//$travelAppCompanyLocationCheck = $model->travelAppCompanyLocationCheck($data); 
			$travelAppCompanyLocation = $model->travelAppCompanyLocation($data); 
			echo $travelAppCompanyLocation; die;
		}
		}
		public function listEmergencyLocations($a= null, $b=null, $c=null)
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../LoginAdmin");
				} else {
				$path="../../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['eid']=cleanMe($b);
				$data['company_id']=cleanMe($c);
				$model = new TravelAppModel();
				
				$countryInfo = $model->countryInfo($data);
				$emergencyDetail = $model->emergencyDetail($data);
				if($emergencyDetail['id']<2 || $emergencyDetail['id']>11)
				{
					header('location:../../../../CountryList/emergencyListing/'.$data['cid']); die;
				}
				
				if($emergencyDetail['is_active']==1)
				{
					header('location:../../../companyList/'.$data['cid'].'/'.$data['eid']); die;
				}
				if($countryInfo['is_visible']==0)
				{
					header('location:../../../../CountryList'); die;
				}
				$adminSummary = $model->adminSummary();
				$travelAppCompanyLocationCheck = $model->travelAppCompanyLocationCheck($data); 
				$travelAppCompanyLocation = $model->travelAppCompanyLocation($data); 
				require_once('TravelAppCompanyLocationListView.php');
			}
		}
		public function companyList($a= null, $b=null)
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../LoginAdmin");
				} else {
				$path="../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['eid']=cleanMe($b);
				$model = new TravelAppModel();
				
				$countryInfo = $model->countryInfo($data);
				$emergencyDetail = $model->emergencyDetail($data);
				if($emergencyDetail['id']<2 || $emergencyDetail['id']>11)
				{
					header('location:../../../CountryList/emergencyListing/'.$data['cid']); die;
				}
				if($countryInfo['is_visible']==0)
				{
					header('location:../../../CountryList'); die;
				}
				$adminSummary = $model->adminSummary();
				$travelAppCompany = $model->travelAppCompany($data); 
				$travelAppCompanyCount = $model->travelAppCompanyCount($data); 
				require_once('TravelAppCompanyListView.php');
			}
		}
		
		
		public function searchCompany($a= null, $b=null)
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../LoginAdmin");
				} else {
				$path="../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['eid']=cleanMe($b);
				$model = new TravelAppModel();
				
				$countryInfo = $model->countryInfo($data);
				$emergencyDetail = $model->emergencyDetail($data);
				if($emergencyDetail['id']<2 || $emergencyDetail['id']>11)
				{
					header('location:../../../CountryList/emergencyListing/'.$data['cid']); die;
				}
				if($countryInfo['is_visible']==0)
				{
					header('location:../../../CountryList'); die;
				}
				$adminSummary = $model->adminSummary();
				if(isset($_POST['message']))
				{
				$companyListSearch = $model->companyListSearch($data);
				$companyListSearchCount = $model->companyListSearchCount($data);
				 
				} 
				
				require_once('TravelAppCompanySearchView.php');
			}
		}
		 
		
		public function moreTravelAppCompany($a= null, $b=null)
		{
		$valueNew = checkadmin();
        if ($valueNew == 0) {
            $path = "../../";
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAdmin"; </script>'; die;
        } else {
		
			$model = new TravelAppModel();
			$data=array();
			$data['cid']=cleanMe($a);
			$data['eid']=cleanMe($b);	
		$moreTravelAppCompany = $model->moreTravelAppCompany($data);
		echo $moreTravelAppCompany; die;
		}
		}
	
		public function companyListNew()
    {
		$valueNew = checkadmin();
        if ($valueNew == 0) {
            $path = "../../";
          echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAdmin"; </script>'; die;
        } else {
		
		$model = new TravelAppModel();
		$data=array();
		$data['cid']=cleanMe($a);
		$data['eid']=cleanMe($b);
		$companyListSearch = $model->companyListNew($data);
		echo $companyListSearch; die;
		}
	}
	
	public function addTravelCompany($a= null, $b=null, $c=null)
		{
			$valueNew = checkadmin();
			
			if ($valueNew == 0) {
				
				header("location:../../../../LoginAdmin");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['eid']=cleanMe($b);
				$data['company_id']=cleanMe($c);
				//print_r($data); die;
				$model = new TravelAppModel();
                $addTravelCompany = $model->addTravelCompany($data);
				header('location:../../../companyList/'.$data['cid'].'/'.$data['eid']);
			}
			
		
		}	
		
		public function activateEmergency($a= null, $b=null)
		{
			$valueNew = checkadmin();
			
			if ($valueNew == 0) {
				
				header("location:../../../LoginAdmin");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['eid']=cleanMe($b);
				 
				$model = new TravelAppModel();
                $activateEmergency = $model->activateEmergency($data);
				header('location:../../companyList/'.$data['cid'].'/'.$data['eid']);
			}
			
		
		}	
		
		public function deactivateEmergency($a= null, $b=null)
		{
			$valueNew = checkadmin();
			
			if ($valueNew == 0) {
				
				header("location:../../../LoginAdmin");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['eid']=cleanMe($b);
				 
				$model = new TravelAppModel();
                $deactivateEmergency = $model->deactivateEmergency($data);
				header('location:../../companyList/'.$data['cid'].'/'.$data['eid']);
			}
			
		
		}	
	}
?>