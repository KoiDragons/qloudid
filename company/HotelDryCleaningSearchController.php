<?php
require_once 'HotelDryCleaningSearchModel.php';
require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
class HotelDryCleaningSearchController
{
    public static function searchLaundary($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$model = new HotelDryCleaningSearchModel();
				$data['app_id']    = $model->appId();
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
				if(isset($_POST['message']))
				{
				$resturantListSearch = $model->resturantListSearch($data);
				$resturantListCount = $model->resturantListCount($data);
				}
				$roomServiecRequestSent = $model->roomServiecRequestSent($data);
				 
				$row_summary    = $model->userSummary($data);
				require_once('HotelDryCleaningSearchView.php');
			}
		}
    
  
	 
    
	public static function verifyRequestStatus($a = null, $b=null, $c=null)
	{
	$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['id']=cleanMe($c);
				$model = new HotelDryCleaningSearchModel();
				$data['app_id']    = $model->appId();
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
					header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$requestInfo    = $model->requestInfo($data);
				require_once('HotelDryCleaningSearchStatusView.php');
			}	
	}
	  
	
	 public static function sendRequest($a = null, $b=null, $c=null)
		{
		$valueNew = checkLogin();
        if ($valueNew == 0) 
		{
            header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
        } 
		else 
		{
        $data = array();
		$data['user_id']=$_SESSION['user_id'];
		$data['cid']=cleanMe($a);
		$data['lid']=cleanMe($b);
		$data['id']=cleanMe($c);
		$model = new HotelDryCleaningSearchModel();
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		$sendRequest    = $model->sendRequest($data);
		header('location:../../../searchLaundary/'.$data['cid'].'/'.$data['lid']);
        }
    }
	
	 public static function sendReminder($a = null, $b=null, $c=null)
		{
		$valueNew = checkLogin();
        if ($valueNew == 0) 
		{
            header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
        } 
		else 
		{
        $data = array();
		$data['user_id']=$_SESSION['user_id'];
		$data['cid']=cleanMe($a);
		$data['lid']=cleanMe($b);
		$data['id']=cleanMe($c);
		$model = new HotelDryCleaningSearchModel();
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		$sendRequest    = $model->sendReminder($data);
		header('location:../../../searchLaundary/'.$data['cid'].'/'.$data['lid']);
        }
    }
	 
	
	
}
?>