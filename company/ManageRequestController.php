<?php
require_once 'ManageRequestModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class ManageRequestController
{
    
    
    public static function index()
    {
		$path="../../";
		 
		
	}
	
	public static function requestAccount($a=null)
	{
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
            $path         = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$data['page_id']=1;
			 $model = new ManageRequestModel();
			$empl    = $model->empVerify($data);
			if($empl==0)
			{
				header("location:https://www.safeqloud.com/error404.php");
			}
			
			 $updateAdmin    = $model->updateAdmin($data);
			$checkPermission    = $model->checkPermission($data);
			if($checkPermission==0)
			{
				header("location:../../../../user/index.php/NewsfeedDetail");
				}
			
			 $empid    = $model->employeeId($data);
			 $company    = $model->userSummary($data);
			 $empl    = $model->empSummary($data);
			 $requestDetail    = $model->requestDetail($data);
			$requestCount    = $model->requestCount($data);
			$approveDetail    = $model->approveDetail($data);
			$approveCount    = $model->approveCount($data);
			$rejectDetail    = $model->rejectDetail($data);
			$rejectCount    = $model->rejectCount($data);
			 $row_summary    = $model->userSummary($data);
			  $companySummary    = $model->companySummary($data);
			  	$companyDetail    = $model->companyDetail($data);
		require_once('ManageRequestView.php');
		}
	}
public static function approveRequest($a=null, $b=null)
	{
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
            $path         = "../../../../";
			$data=array();
			$data['id']=cleanMe($a);
			$data['cid']=cleanMe($b);
			 $model = new ManageRequestModel();
			 $approveRequest    = $model->approveRequest($data);
			 header("location:../../requestAccount/".$data['cid']);
		}
	}
	public static function sendQloudEmployee($a=null, $b=null)
	{
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
            $path         = "../../../../";
			$data=array();
			$data['id']=cleanMe($b);
			$data['cid']=cleanMe($a);
			 $model = new ManageRequestModel();
			 $sendQloudEmployee    = $model->sendQloudEmployee($data);
			 header("location:../../requestAccount/".$data['cid']);
		}
	}
	public static function rejectRequest($a=null, $b=null)
	{
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
            $path         = "../../../../";
			$data=array();
			$data['id']=cleanMe($a);
			$data['cid']=cleanMe($b);
			 $model = new ManageRequestModel();
			 $rejectRequest    = $model->rejectRequest($data);
			 header("location:../../requestAccount/".$data['cid']);
		}
	}
	
		public static function moreRequestDetail($a=null)
	{
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
			 $data=array();
			 $data['cid']=cleanMe($a);
		$model = new ManageRequestModel();
		$moreRequestDetail = $model->moreRequestDetail($data);
		echo $moreRequestDetail; die;
		}
	}
	
		public static function moreApprovedDetail($a=null)
	{
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
			 $data=array();
			 $data['cid']=cleanMe($a);
		$model = new ManageRequestModel();
		$moreApprovedDetail = $model->moreApprovedDetail($data);
		echo $moreApprovedDetail; die;
		}
	}
	
		public static function moreRejectDetail($a=null)
	{
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
			 $data=array();
			 $data['cid']=cleanMe($a);
			 //print_r($_POST);
		$model = new ManageRequestModel();
		$moreRejectDetail = $model->moreRejectDetail($data);
		echo $moreRejectDetail; die;
		}
	}
}
?>