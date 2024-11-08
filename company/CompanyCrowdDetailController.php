<?php
require_once 'CompanyCrowdDetailModel.php';
require_once 'EmployeeCheckController.php';
require_once '../configs/utility.php';
class CompanyCrowdDetailController
{
    public static function crowdInfo($a = null)
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
			$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
			
            $model1       = new CompanyCrowdDetailModel();
			$countPresentEmployee    = $model1->countPresentEmployee($data);
			$presentEmployees    = $model1->presentEmployees($data);
			$countPresentChildren    = $model1->countPresentChildren($data);
			$presentChildren    = $model1->presentChildren($data);
			
            require_once('CompanyCrowdDetailView.php');
        }
       
    }
	public static function morePresentEmployees($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCrowdDetailModel();
				$morePresentEmployees = $model->morePresentEmployees($data);
				echo $morePresentEmployees; die;
			}
		}
	
	public static function morePresentChildren($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CompanyCrowdDetailModel();
				$morePresentChildren = $model->morePresentChildren($data);
				echo $morePresentChildren; die;
			}
		}
}


?>