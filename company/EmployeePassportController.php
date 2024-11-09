<?php
require_once 'EmployeePassportModel.php';
require_once 'EmployeeCheckController.php';
require_once '../configs/utility.php';
class EmployeePassportController
{
    
    
    public static function index()
    {
        $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../user/index.php/LoginAccount");
        } else {
            $path         = "../../";
            $model1       = new EmployeePassportModel();
        
            
            require_once('EmployeePassportView.php');
        }
    }
      public static function employeeAccount($co = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
            $path         = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($co);
			$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
			
            $model1       = new EmployeePassportModel();
			$empid    = $model1->employeeId($data);
            $resultOrg1    = $model1->employeeAccount($data);
			$resultOrg    = $model1->userAccount($data);
			$articleSummary    = $model1->articleSummary($data);
			$company    = $model1->userSummary($data);
			$row_summary    = $model1->userSummary($data);
			$empl    = $model1->empSummary($data);
			//print_r($company); die;
            require_once('EmployeePassportView.php');
        }
       
    }
	
	
	
	public static function updateImage($co = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../user/index.php/LoginAccount");
        } else {
			$data=array();
			
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($co);
            $model1       = new EmployeePassportModel();
           
			$result    = $model1->updateImage($data);
           header("location:../../EmployeePassport/employeeAccount/".$data['cid']);
        }
	}
    
}


?>