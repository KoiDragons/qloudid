<?php
require_once 'KeyHolderCompanySearchModel.php';

require_once '../configs/utility.php';
require_once('../AppModel.php');
class KeyHolderCompanySearchController
{
	
	public static function searchCategories($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model = new KeyHolderCompanySearchModel();
				$categoryListing = $model->categoryListing($data);
				
				$row_summary    = $model->userSummary($data);
				require_once('KeyHolderCategoryListView.php');
			}
		}
	
	
	
	public static function searchSubCategories($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['catg_id']=cleanMe($b);
				$model = new KeyHolderCompanySearchModel();
				$subcategoryListing = $model->subcategoryListing($data);
				
				$row_summary    = $model->userSummary($data);
				require_once('KeyHolderSubCategoryListView.php');
			}
		}
	
	 public static function sendConnectRequest($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				
				$path="../../../../../";
				$model1 = new KeyHolderCompanySearchModel();
				$data=array();
				$data['aid']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$data['user_id']=$_SESSION['user_id'];
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$sendConnectRequest    = $model1->sendConnectRequest($data);
				header('location:../../searchCompanies/'.$data['aid']);
			 
			}
		}
    public static function searchCompanies($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$model = new KeyHolderCompanySearchModel();
				if(isset($_POST['message']))
				{
				$companyListSearch = $model->companyListSearch($data);
				$companyListSearchCount = $model->companyListSearchCount($data);
				
				}
				$keyServicesCompaniesList = $model->keyServicesCompaniesList($data);
				
				$row_summary    = $model->userSummary($data);
				require_once('KeyHolderCompanySearchView.php');
			}
		}
		 public static function userApartmentConnectInfo($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				
				$path="../../../../../";
				$model = new KeyHolderCompanySearchModel();
				$data=array();
				$data['aid']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$data['user_id']=$_SESSION['user_id'];
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$buildingList    = $model->buildingList($data);
			 $requestApartmentConnectRequestOtherCompanyCount    = $model->requestApartmentConnectRequestOtherCompanyCount($data); 
			 if($requestApartmentConnectRequestOtherCompanyCount['num']>0)
			 {
				require_once('KeyHolderUserApartmentCompanyConnectRequestRestrictView.php'); die;
			 }
			$requestApartmentConnectRequestCount    = $model->requestApartmentConnectRequestCount($data);
			if($requestApartmentConnectRequestCount['num']>0)
			 {
				 header('location:../../userApartmentConnectRequestStatus/'.$data['aid'].'/'.$data['cid']); die;
			 }			
			require_once('KeyHolderUserApartmentCompanyConnectInfoView.php');
			 
			}
		}
		public static function userApartmentConnectRequestStatus($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				
				$path="../../../../../";
				$model1 = new KeyHolderCompanySearchModel();
				$data=array();
				$data['aid']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$data['user_id']=$_SESSION['user_id'];
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$requestStatus    = $model1->requestApartmentConnectStatus($data);
			  $requestApartmentConnectRequestOtherCompanyCount    = $model1->requestApartmentConnectRequestOtherCompanyCount($data); 
			require_once('KeyHolderUserApartmentCompanyConnectRequestStatusView.php');
			 
			}
		}
		
		public static function getPorts($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
			  echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$model = new KeyHolderCompanySearchModel();
				$getPorts    = $model->getPorts($data); 
				echo $getPorts; die;
			}
		}
		
		public static function getFloors($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
			  echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$model = new KeyHolderCompanySearchModel();
				$getFloors    = $model->getFloors($data); 
				echo $getFloors; die;
			}
		}
		
    public static function sendCleaningRequest($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				
				$path="../../../../../";
				$model1 = new KeyHolderCompanySearchModel();
				$data=array();
				$data['aid']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$data['user_id']=$_SESSION['user_id'];
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$sendCleaningRequest    = $model1->sendCleaningRequest($data);
			 
				header('location:../../searchCompanies/'.$data['aid']);
			 
			}
		}
	
	public static function cleaningRequestInfo($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$model = new KeyHolderCompanySearchModel();
				$cleaningCompanyApprovedServiceTypes    = $model->cleaningCompanyApprovedServiceTypes($data); 
				$row_summary    = $model->userSummary($data);
				require_once('KeyHolderCleaningServiceSendRequestView.php');
			}
		}
		
		
		public static function selectCleaningCategory($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
			  echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$model = new KeyHolderCompanySearchModel();
				$selectCleaningCategory    = $model->selectCleaningCategory($data); 
				echo $selectCleaningCategory; die;
			}
		}
		
  public static function checkRequestAccount($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$model = new KeyHolderCompanySearchModel();
				$cleaningCompanyServiceCategory    = $model->cleaningCompanyServiceCategory($data); 
				$keyServices    = $model->keyServices($data); 
				$row_summary    = $model->userSummary($data);
				if(empty($keyServices))
				{
				$keyServicesRequestList    = $model->keyServicesRequestList($data);	
				require_once('KeyHolderRequestStatusView.php'); die;
				}
				$apartmentDetail    = $model->apartmentDetail($data); 
				$requestApartmentConnectRequestOtherCompanyCount    = $model->requestApartmentConnectRequestOtherCompanyCount($data); 
				$requestApartmentConnectRequestCount    = $model->requestApartmentConnectRequestCount($data); 
				require_once('KeyHolderVerifyRequestView.php');
			}
		}
		
		public static function selectCleaningServices($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$model = new KeyHolderCompanySearchModel();
				$cleaningCompanyServiceCategory    = $model->cleaningCompanyServiceCategory($data); 
				$row_summary    = $model->userSummary($data);
				require_once('KeyHolderCleaningServiceSelectRequestView.php');
			}
		}
		
	public static function updateRequest($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				
				$path="../../../../../";
				$model1 = new KeyHolderCompanySearchModel();
				$data=array();
				$data['aid']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$data['user_id']=$_SESSION['user_id'];
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$updateRequest    = $model1->updateRequest($data);
			 
				header('location:../../thanksForResponse/'.$data['aid']);
			 
			}
		}
		
		public static function updateCleaningRequest($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				
				$path="../../../../../";
				$model1 = new KeyHolderCompanySearchModel();
				$data=array();
				$data['aid']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$data['user_id']=$_SESSION['user_id'];
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$updateCleaningRequest    = $model1->updateCleaningRequest($data);
			 
				header('location:../../thanksForResponse/'.$data['aid']);
			 
			}
		}
		
		
		
		public static function thanksForResponse($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($a);
				 
				require_once('KeyHolderCompanyThanksView.php');
			}
		}
		
		
	
	public static function companyListNew()
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
		
			$model = new KeyHolderCompanySearchModel();
		$data=array();
				$data['user_id']=$_SESSION['user_id'];
				
		$companyListSearch = $model->companyListNew($data);
		echo $companyListSearch; die;
		}
	}
	
	
	
}
?>