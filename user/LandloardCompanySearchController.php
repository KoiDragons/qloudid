<?php
require_once 'LandloardCompanySearchModel.php';

require_once '../configs/utility.php';
require_once('../AppModel.php');
class LandloardCompanySearchController
{
    public static function index()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				
				$model = new LandloardCompanySearchModel();
				if(isset($_POST['message']))
				{
				$companyListSearch = $model->companyListSearch($data);
				$companyListCount = $model->companyListCount($data);
				}
				$updateUserId    = $model->updateUserId($data);
				$row_summary    = $model->userSummary($data);
				require_once('LandloardCompanySearchView.php');
			}
		}
    
  
	public static function selectProperty($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model = new LandloardCompanySearchModel();
				$userProperty    = $model->userProperty($data); 
				$row_summary    = $model->userSummary($data);
				require_once('LandloardCompanyPropertySearchView.php');
			}
		}
    
	
	public static function addLandloardInfo()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new LandloardCompanySearchModel();
				$selectCountry    = $model->selectCountry($data);
				$row_summary    = $model->userSummary($data);
				$userProperty    = $model->userProperty($data);
				require_once('LandloardCompanyInfoView.php');
			}
		}
	
	public static function checkRequest()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardCompanySearchModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 
				$result    = $model1->checkRequest($data);
				echo $result; die;
				}
		}
	
	
	public static function getSelectedProperty()
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new LandloardCompanySearchModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 
				$result    = $model1->getSelectedProperty($data);
				echo $result; die;
				}
		}
	
	 public static function sendRequest($a = null)
		{
		$valueNew = checkLogin();
        if ($valueNew == 0) 
		{
            $path = "../../";
			header("location:../../LoginAccount");
        } 
		else 
		{
        $data = array();
		$data['user_id']=$_SESSION['user_id'];
		$data['cid']=cleanMe($a);
		$model = new LandloardCompanySearchModel();
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		$sendRequest    = $model->sendRequest($data);
		header('location:../../ShareMonitor/shareMonitorShow');
        }
    }
	
	
	public static function addLandloard()
		{
		$valueNew = checkLogin();
        if ($valueNew == 0) 
		{
            $path = "../../";
			header("location:../../LoginAccount");
        } 
		else 
		{
        $data = array();
		$data['user_id']=$_SESSION['user_id'];
		
		$model = new LandloardCompanySearchModel();
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		require_once('../configs/smsMandril.php');
		$addLandloard    = $model->addLandloard($data);
		header('location:../ShareMonitor/shareMonitorShow');
        }
    }
	
	
}
?>