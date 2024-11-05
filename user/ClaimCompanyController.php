<?php
require_once 'ClaimCompanyModel.php';
require_once '../configs/utility.php';
class ClaimCompanyController
{
    
    
    public static function index()
    {
		$path="../../";
        require_once('ClaimCompanyView.php');
    }
    
     public static function approve($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
			
			header("location: ../../LoginAccount");
        } else {
		$path="../../../../";
		$model = new ClaimCompanyModel();
		$data=array();
		$data['id']=cleanMe($a);
		$data['user_id']=$_SESSION['user_id'];					
		$row = $model->approve($data);
		$row_summary = $model->userSummary($data);	
        require_once('ClaimCompanyView.php');
    }
	}
      public static function ownerUpdate($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
			
			header("location: ../../LoginAccount");
        } else {
		$path="../../../../";
		$model = new ClaimCompanyModel();
		$data=array();
		$data['user_id']=$_SESSION['user_id'];
		$data['id']=cleanMe($a);
		$data['company_email1']=$_POST['work_email'];
		 $data['random_hash']   = substr(md5(uniqid(rand(), true)), 16, 16);
				 require_once('../configs/testMandril.php');			
				$data['company_email'] = $model->ownerUpdate($data);
		$resultPass = $model->sendManageCompanyEmail($data);				
       require_once('ThanksView.php');
    }
	}
}


?>