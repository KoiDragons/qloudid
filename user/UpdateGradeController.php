<?php
	require_once 'UpdateGradeModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class UpdateGradeController
	{
		
		
		public static function index()
		{
			$path="../../";
			
			
			require_once('VerifyView.php');
			
		}
		
		public static function UpdateGradeAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				
				$path="../../../../";
				$model = new UpdateGradeModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['uid']=cleanMe($a);
				$row_summary    = $model->userSummary($data);
				$verificationId    = $model->verificationId($data);
				$resultOrg    = $model->userAccount($data);
				$resultOrg1    = $model->employeeAccount($data);
				require_once('UpdateGradeView.php');
			}
		}
		
	public static function updateGrading($co = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
        } else {
			$data=array();
			
			$data['user_id']=$_SESSION['user_id'];
			$data['grading']=cleanMe($co);
            $model1       = new UpdateGradeModel();
           
			$result    = $model1->updateGrading($data);
           header("location:../../GetVerified/userAccount");
        }
	}
	}
?>