<?php
require_once 'AboutQmatchupOmOssModel.php';
require_once 'PersonalRequestsController.php';
require_once 'ShareMonitorController.php';
require_once 'ConnectKinController.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class AboutQmatchupOmOssController
{
    
    
    public static function index()
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:LoginAccount");
        } else {
			$path = "../../";
		$data=array();
			$data['user_id']=$_SESSION['user_id'];
			 $model1       = new AboutQmatchupOmOssModel();
            $resultOrg    = $model1->userAccount($data);
			
			$resultOrg1    = $model1->employeeAccount($data);
			$row_summary    = $model1->userSummary($data);
			
			$model4 = new ShareMonitorController();
			$receivedAllCount = $model4->receivedAllCount();
    require_once('AboutQmatchupOmOssView.php');
	}
	}
	
	public static function shared($a=null)
	{
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:/../user/index.php/LoginAccount");
        } else {
            $path         = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			require_once('NewsfeedView.php');
		}
	}
	

}
?>