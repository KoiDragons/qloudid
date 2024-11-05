<?php
require_once 'IDKapadModel.php';
require_once 'PersonalRequestsController.php';
require_once 'ShareMonitorController.php';
require_once 'ConnectKinController.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class IDKapadController
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
			 $model1       = new IDKapadModel();
            $hijackedDetail    = $model1->hijackedDetail($data);
			$hijackedUser    = $model1->hijackedUser($data);
			$resultOrg    = $model1->userAccount($data);
			$resultOrg1    = $model1->employeeAccount($data);
			$row_summary    = $model1->userSummary($data);
			
			$model4 = new ShareMonitorController();
			$receivedAllCount = $model4->receivedAllCount();
			if($resultOrg1['ssn']=="" || $resultOrg1['ssn']== null || $resultOrg1['ssn']== 0) 
			{
				header('location:StoreData/userAccount'); die;
			}
			if($hijackedUser['num']==0)
			{
			require_once('IDKapadView.php');
			}
			else
			{
			require_once('IDKapadSecureView.php');	
			}
	}
	}
	
	 public static function hijackResponse()
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:LoginAccount");
        } else {
			$path = "../../../";
		$data=array();
			$data['user_id']=$_SESSION['user_id'];
			 $model1       = new IDKapadModel();
            $hijackedUserDetail    = $model1->hijackedUserDetail($data);
			$hijackedUser    = $model1->hijackedUser($data);
			$resultOrg    = $model1->userAccount($data);
			$resultOrg1    = $model1->employeeAccount($data);
			$row_summary    = $model1->userSummary($data);
			
			$model4 = new ShareMonitorController();
			$receivedAllCount = $model4->receivedAllCount();
			 
			
			require_once('IDKapadListView.php');
			
	}
	}
	
	 public static function saveHijackInfo()
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:LoginAccount");
        } else {
			$path = "../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			 $model1       = new IDKapadModel();
            $saveInfo    = $model1->saveInfo($data);
			header("location:../StoreData/userAccount");
	}
	}
	
	 public static function secureAccount()
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:LoginAccount");
        } else {
			$path = "../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new IDKapadModel();
            $secureAccount    = $model1->secureAccount($data);
			header("location:../StoreData/userAccount");
	}
	}
	

}
?>