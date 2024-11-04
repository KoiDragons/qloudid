<?php
require_once 'PublicChildCareRequestModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class PublicChildCareRequestController
{
    
   public static function parentAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 1) {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new PublicChildCareRequestModel();
				$userSummary = $model->userSummary($data);
				$data['email']=$userSummary['email'];
				$data['ssn']=$userSummary['ssn'];
				$updateParent = $model->updateParent($data);
				}
            $path         = "../../../../";
			$data=array();
			$data['rid']=cleanMe($a);
			$model = new PublicChildCareRequestModel();
			$resultContry    = $model->countryOption($data);
			$requestDetail = $model->requestDetail($data);
			require_once('PublicChildCareRequestView.php');
			
		}
	

}
?>