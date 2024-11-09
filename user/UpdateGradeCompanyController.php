<?php
	require_once 'UpdateGradeCompanyModel.php';
	require_once '../company/EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class UpdateGradeCompanyController
	{
		
		
		public static function index()
		{
			$path="../../";
			
			
			require_once('VerifyView.php');
			
		}
		
		public static function UpdateGradeAccount($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				
				$path="../../../../../";
				$model = new UpdateGradeCompanyModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['uid']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$row_summary    = $model->userSummary($data);
				$verificationId    = $model->verificationId($data);
				$resultOrg    = $model->userAccount($data);
				$resultOrg1    = $model->employeeAccount($data);
				require_once('UpdateGradeCompanyView.php');
			}
		}
		 
	public static function updateGrading($co = null, $b=null)
    {
         $valueNew = checkLogin();
		 if ($valueNew == 0) {
            $path = "../../../";
            header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
        } else {
			$data=array();
			
			$data['user_id']=$_SESSION['user_id'];
			$data['grading']=cleanMe($co);
			$data['cid']=cleanMe($b);
            $model1       = new UpdateGradeCompanyModel();
           
			$result    = $model1->updateGrading($data);
           header("location:../../../SecurityLevel/companyAccount/".$data['cid']);
        }
	}
	}
?>