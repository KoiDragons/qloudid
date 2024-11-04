<?php
require_once 'TXPSignupModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class TXPSignupController
{
    
    
    public function requestRegistered()
    {
		$path  = "../../../../../";
		$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:../LoginAdmin");
        }
		else { 
		$path="../../../";
		$model = new TXPSignupModel();
		$adminSummary = $model->adminSummary();
		$TXPSignupDetail = $model->TXPSignupDetail();
		require_once('TXPSignupView.php');
    }
	
	}
	 
}
?>