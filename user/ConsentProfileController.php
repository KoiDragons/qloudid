<?php
	require_once 'ConsentProfileModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class ConsentProfileController
	{
		 
		public static function sentAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($a);
				 
				$model1       = new ConsentProfileModel();
				$companyRequest=$model1->companySentRequest($data);
				$data['cid']=$companyRequest['cid'];
				 
				$data['request']=1;
				$companyDetail    = $model1->companyDetail($data);
				
				$row_summary    = $model1->userSummary($data);
				require_once('ConsentProfileEmployerRequestView.php');
			}
		}
		
		public static function receiveAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($a);
				 
				$model1       = new ConsentProfileModel();
				$companyRequest=$model1->companyReceivedRequest($data);
				$data['cid']=$companyRequest['cid'];
				 
				$data['request']=2;
				$companyDetail    = $model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('ConsentProfileEmployerRequestViewNew.php');
			}
		}
		
		public static function approveAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new ConsentProfileModel();
				$data['cid']=cleanMe($a);
				$data['request']=3;
				$companyDetail    = $model1->companyDetail($data);
				$companyRequest=$model1->companyDetail($data);
				$row_summary    = $model1->userSummary($data);
				require_once('ConsentProfileEmployerRequestView.php');
			}
		}
	}
?>