<?php
require_once 'HotelResturantSearchModel.php';
require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
class HotelResturantSearchController
{
    public static function searchResturant($a=null, $b=null, $c=null)
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
				$data['sid']=cleanMe($c);
				$model = new HotelResturantSearchModel();
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
				if(isset($_POST['message']))
				{
				$resturantListSearch = $model->resturantListSearch($data);
				$resturantListCount = $model->resturantListCount($data);
				}
				$roomServiecRequestSent = $model->roomServiecRequestSent($data);
				 
				$row_summary    = $model->userSummary($data);
				require_once('HotelResturantSearchView.php');
			}
		}
    
  
	 
    
	public static function verifyRequestStatus($a = null, $b=null, $c=null, $d=null)
	{
	$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['id']=cleanMe($c);
				$data['sid']=cleanMe($d);
				$model = new HotelResturantSearchModel();
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
					header('location:../../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				$requestInfo    = $model->requestInfo($data);
				 
				if($requestInfo['is_roomservice']==1)
				{
				$data['request_id']=$requestInfo['id'];
				$completeMenu    = $model->completeRoomServiceMenu($data);
				$roomServiceRequestDetail    = $model->roomServiceRequestDetail($data);
				require_once('HotelResturantSerachRoomServiceMenuInformationView.php');	die;
				}
				require_once('HotelResturantSearchRequestStatusView.php');
			}	
	}
	  
	public static function updateRoomServiceMenu($a = null, $b=null, $c=null, $d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['id']=cleanMe($c);
				$data['sid']=cleanMe($d);
				$model       = new HotelResturantSearchModel();
				$requestInfo = $model->requestInfo($data);	
				$data['request_id']=$requestInfo['id'];
				$updateRoomServiceMenu = $model->updateRoomServiceMenu($data);	
				header("location:../../../../verifyRequestStatus/".$data['cid']."/".$data['lid']."/".$data['id']."/".$data['sid']);
			}	
		}  
	 public static function sendRequest($a = null, $b=null, $c=null, $d=null)
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
		$data['sid']=cleanMe($d);
		$model = new HotelResturantSearchModel();
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		$sendRequest    = $model->sendRequest($data);
		header('location:../../../../searchResturant/'.$data['cid'].'/'.$data['lid'].'/'.$data['sid']);
        }
    }
	
	 public static function sendReminder($a = null, $b=null, $c=null, $s=null)
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
		$data['sid']=cleanMe($d);
		$model = new HotelResturantSearchModel();
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		$sendRequest    = $model->sendReminder($data);
		header('location:../../../../searchResturant/'.$data['cid'].'/'.$data['lid'].'/'.$data['sid']);
        }
    }
	 
	
	
}
?>