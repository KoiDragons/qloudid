<?php
require_once 'AboutModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class AboutController
{
    
    public static function verifyApartmentCheckinQr($a=null)
		{
			$path = "https://dstricts.com/";
			 $data=array();
			 $data['id']=cleanMe($a);
			 require_once('ApartmentQrCodeForContractorView.php');	
				
		} 
  
	
	 public static function employeeVerify($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
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
			//print_r($companyDetail); die;
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
	
	
	public static function sendRequest($a = null, $b = null, $c = null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
			
			 header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
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