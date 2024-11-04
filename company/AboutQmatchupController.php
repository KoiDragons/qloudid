<?php
require_once 'AboutQmatchupModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class AboutQmatchupController
{
   
	 public static function employeeVerify($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount");
        } else {
			$path = "../../../../";
		$data=array();
		$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			 $model1       = new AboutQmatchupModel();
            $resultOrg    = $model1->userAccount($data);
			$empSummary    = $model1->empSummary($data);
			$companyDetail    = $model1->companyDetail($data);
			$resultOrg1    = $model1->employeeAccount($data);
			$row_summary    = $model1->userSummary($data);
			if($empSummary==1)
			{
			
			$data['user_email']=$row_summary['email'];
			$empSummaryDetail= urlencode($model1->empSummaryDetail($data));
			}
			else
			{
		header("location:https://www.qloudid.com/error404.php");
			}
    require_once('AboutQmatchupView.php');
	}
	}
	
	
	

}
?>