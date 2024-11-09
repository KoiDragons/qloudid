<?php
require_once 'LandLoardSearchModel.php';
require_once 'EmployeeCheckController.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class LandLoardSearchController
{
    public static function landLoardSearch($a=null,$b=null)
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
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model = new LandLoardSearchModel();
				//print_r($_POST); die;
				if(isset($_POST['message']))
				{
				$companyListSearch = $model->companyListSearch($data);
				$companyListSearchCount = $model->companyListSearchCount($data);
				
				}
				$row_summary    = $model->userSummary($data);
				require_once('LandLoardSearchView.php');
			}
		}
    
  
	
	
	public static function companyListNew($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
		
			$model = new LandLoardSearchModel();
		$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
		$companyListSearch = $model->companyListNew($data);
		echo $companyListSearch; die;
		}
	}
	
	public static function sendRequest($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
        } else {
		
			$model = new LandLoardSearchModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['lid']=cleanMe($b);
				$data['rid']=cleanMe($c);
		$sendRequest = $model->sendRequest($data);
		header("location:../../../../CompanyProperty/locationAccount/".$data['cid']);
		}
	}
	
}
?>