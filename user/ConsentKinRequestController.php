<?php
	require_once 'ConsentKinRequestModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class ConsentKinRequestController
	{
		 
		public static function kinInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($a);
				 
				$model1       = new ConsentKinRequestModel();
				 
				$kinDetailInfo    = $model1->kinDetailInfo($data);
				
				$row_summary    = $model1->userSummary($data);
				require_once('ConsentKinRequestView.php');
			}
		}
		
		public static function approveRequest($a = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:../../LoginAccount");
				} else {
				$data=array();
				$data['id']=cleanMe($a);
				$model = new ConsentKinRequestModel();
                $data['user_id']=$_SESSION['user_id'];
				$updateRequest = $model->approveRequest($data);
				
				header("location:../../ConnectKin/connectAccount");
			}
			
		}
		
		public static function rejectRequest($a = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:../../LoginAccount");
				} else {
				$data=array();
				$data['id']=cleanMe($a);
				$model = new ConsentKinRequestModel();
                $data['user_id']=$_SESSION['user_id'];
				$rejectRequest = $model->rejectRequest($data);
				
				header("location:../../ConnectKin/rejectedAccount");
			}
			
		}
		
		 }
?>