<?php
require_once 'PublicResidentialRequestModel.php';
 
require_once '../configs/utility.php';
require_once('../AppModel.php');
class PublicResidentialRequestController
{
	 
		public static function residenceDetail($a=null)
		{
			
				$path         = "../../../../";
				$data=array();
				$data['request_id']=cleanMe($a);
				$model1       = new PublicResidentialRequestModel();
				$requestDetail    = $model1->requestDetail($data);
				$addressDetail    = $model1->addressDetail($data);
				require_once('PublicUserResidentialRequestView.php');
				
		}
		
	 	public static function rejectResidence($a=null)
		{
			
				$path         = "../../../../";
				$data=array();
				$data['request_id']=cleanMe($a);
				$model1       = new PublicResidentialRequestModel();
				$rejectResidence    = $model1->rejectResidence($data);
				 header('location:../residenceDetail/'.$data['request_id']); 
				
		}
	
		public static function approveResidence($a=null)
		{
			
				$path         = "../../../../";
				$data=array();
				$data['request_id']=cleanMe($a);
				$model1       = new PublicResidentialRequestModel();
				$requestDetail    = $model1->requestDetail($data);
				if($requestDetail['user_id']>0)
				{
				$approveResidence    = $model1->approveResidence($data);
				header('location:../residenceDetail/'.$data['request_id']); die;	
				}
				 else
				 {
				$addSignupRequest    = $model1->addSignupRequest($data);
				header('location:../../PublicSignup/createAccount/'.$addSignupRequest); die;	 
				 }
				
		}
}
?>