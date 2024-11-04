<?php
require_once 'CompanyListModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class CompanyListController
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
		$model = new CompanyListModel();
		
		
		$adminSummary = $model->adminSummary();
		
		$companyDetailUnverified = $model->companyDetailUnverified();
		$companyDetail = $model->companyDetail();
		$companyCountVerified = $model->companyCountVerified();
		$companyCountUnverified = $model->companyCountUnverified();
		  require_once('CompanyListView.php');
    }
	
	}
	
	
	
	public function moreCompanyDetail()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAdmin"; </script>'; die;
        }
		else { 
		$model = new CompanyListModel();
		$moreUserDetail = $model->moreCompanyDetail();
		echo $moreUserDetail; die;
		}
	}
	
	public function moreCompanyUnverifiedDetail()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
           echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAdmin"; </script>'; die;
        }
		else { 
		$model = new CompanyListModel();
		$moreUserDetail = $model->moreCompanyUnverifiedDetail();
		echo $moreUserDetail; die;
		}
	}
	public function moreCompanyAppsDetail($a= null, $b=null)
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
          echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAdmin"; </script>'; die;
        }
		else { 
		$data=array();
		$data['cid']=cleanMe($a);
		$data['appid']=cleanMe($b);
		$model = new CompanyListModel();
		$moreCompanyAppsDetail = $model->moreCompanyAppsDetail($data);
		echo $moreCompanyAppsDetail; die;
		}
	}
	
	public function moreCompanyAppsPaidDetail($a= null, $b=null)
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
          echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAdmin"; </script>'; die;
        }
		else { 
		$data=array();
		$data['cid']=cleanMe($a);
		$data['appid']=cleanMe($b);
		$model = new CompanyListModel();
		$moreCompanyAppsPaidDetail = $model->moreCompanyAppsPaidDetail($data);
		echo $moreCompanyAppsPaidDetail; die;
		}
	}
	public function appsAccount($a= null, $b=null)
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
				$model = new CompanyListModel();
				
				$countryInfo = $model->countryInfo($data);
				//echo $countryInfo; die;
				if($countryInfo['is_visible']==0)
				{
					header('location:../../../CountryList'); die;
				}
				
				$appInfo = $model->appInfo($data);
				
				if($appInfo['is_permission']==0)
				{
				header('location:../../../Country/appMarket/'.$data['cid']); die;
				}
				$companyAppsDetail = $model->companyAppsDetail($data);
				$companyAppsDetailCount = $model->companyAppsDetailCount($data);
				require_once('CompanyListAppDownloadView.php');
			}
		}
		
		public function paidAppsAccount($a= null, $b=null)
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
				$model = new CompanyListModel();
				
				$countryInfo = $model->countryInfo($data);
				//echo $countryInfo; die;
				if($countryInfo['is_visible']==0)
				{
					header('location:../../../CountryList'); die;
				}
				
				$appInfo = $model->appInfo($data);
				
				if($appInfo['is_permission']==0)
				{
				header('location:../../../Country/appMarket/'.$data['cid']); die;
				}
				$companyAppsPaidDetail = $model->companyAppsPaidDetail($data);
				$companyAppsDetailPaidCount = $model->companyAppsDetailPaidCount($data);
				require_once('CompanyListAppPaidView.php');
			}
		}
		
		public function paymentHistory($a= null, $b=null, $c=null)
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
				$data['company_id']=cleanMe($c);
				$model = new CompanyListModel();
				
				$countryInfo = $model->countryInfo($data);
				//echo $countryInfo; die;
				if($countryInfo['is_visible']==0)
				{
					header('location:../../../../CountryList'); die;
				}
				
				$appInfo = $model->appInfo($data);
				
				if($appInfo['is_permission']==0)
				{
				header('location:../../../../Country/appMarket/'.$data['cid']); die;
				}
				$paymentDetail = $model->paymentDetail($data);
				$paymentDetailCount = $model->paymentDetailCount($data);
				require_once('CompanyListPaymentHistoryView.php');
			}
		}
		
	
}
?>