<?php
require_once 'LoginAccountModel.php';
require_once '../configs/utility.php';
class LoginAccountController
{
     
    public function loginPickapro($a=null)
    {
        $valueNew = checkPickaproLogin();
			$data1=array();
			$data['domain_id']=cleanMe($a);
        if ($valueNew == 0)
        {
            $path = "../../../../";
           
            $model = new LoginAccountModel();
            $verifyIP = $model->verifyIP();
			 
            require_once ('LoginAppQrView.php');
        }
        else
        {
			 
            header("location:../../Employer/listEmployers/".$data['domain_id']);
           
        }
    }
	
	
   public function loginAppAccount($a=null)
    {
        $valueNew = checkPickaproLogin();
			$data1=array();
			$data['domain_id']=cleanMe($a);
        if ($valueNew == 0)
        {
            $path = "../../../";

            $model = new LoginAccountModel();
            $loginAppAccount = $model->loginAppAccount();
			 
            if ($loginAppAccount == 1)
            {
                 
                header("location:../../Employer/listEmployers/".$data['domain_id']);
                
            }
             
        }
        else
        {
			 
			header("location:../../Employer/listEmployers/".$data['domain_id']);
        }
    }
 }

?>
