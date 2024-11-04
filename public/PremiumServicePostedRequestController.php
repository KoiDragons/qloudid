<?php
require_once 'PremiumServicePostedRequestModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class PremiumServicePostedRequestController
{
    
    
    public static function listRequests($a=null)
    {
			
				$path         = "../../../../";
				$data=array();
				$data['uid']=cleanMe($a);
				$model       = new PremiumServicePostedRequestModel();
				$postedJobsList    = $model->postedJobsList($data);
				require_once('PremiumServicePostedRequestListView.php');
				 
	}
	
	

}
?>