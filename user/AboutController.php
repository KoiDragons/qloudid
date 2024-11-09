<?php
require_once 'AboutModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class AboutController
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
			 $model1       = new AboutModel();
            $resultOrg    = $model1->userAccount($data);
			$empSummary    = $model1->empSummary($data);
			$companySummary    = $model1->companySummary($data);
			$completedEmployeeRequests    = $model1->completedEmployeeRequests($data);
			$resultOrg1    = $model1->employeeAccount($data);
			$row_summary    = $model1->userSummary($data);
    require_once('AboutView.php');
	}
	}
	
	 public static function employeeVerify($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../LoginAccount");
        } else {
			$path = "../../../../";
		$data=array();
		$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			 $model1       = new AboutModel();
            $resultOrg    = $model1->userAccount($data);
			$empSummary    = $model1->empSummary($data);
			$companySummary    = $model1->companySummary($data);
			$verificationId    = $model1->verificationId($data);
			$companyDetail    = $model1->companyDetail($data);
			$resultOrg1    = $model1->employeeAccount($data);
			$row_summary    = $model1->userSummary($data);
			if($empSummary==1)
			{
			
			$data['user_email']=$row_summary['email'];
			$empSummaryDetail= urlencode($model1->empSummaryDetail($data));
			}
			/*else
			{
		header("location:https://www.safeqloud.com/error404.php");
			}*/
    require_once('AboutView.php');
	}
	}
	
	public static function shared($a=null)
	{
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../user/index.php/LoginAccount");
        } else {
            $path         = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			require_once('NewsfeedView.php');
		}
	}
	
	public static function sendRequest($a = null, $b = null, $c = null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
			
			 header("location:../../LoginAccount");
        } else {
        $data = array();
		$data['user_id']=$_SESSION['user_id'];
		$data['cid']=cleanMe($a);
        $model = new AboutModel();
		$sendRequest    = $model->sendRequest($data);
		header("location:../employeeVerify/".$data['cid']);
        }
    }

}
?>