<?php
	require_once 'LandloardAgreementModel.php';
	require_once '../configs/utility.php';
	class LandloardAgreementController
	{
		
	 
		
		public static function availableAgreement()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				
				header("location:../LoginAccount");
				} else {
				$path='../../../';
				$model = new LandloardAgreementModel();
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$agreementList = $model->agreementList($data);
				require_once('LandloardAgreementListView.php');
			}
			
		}
		
	
		public static function selectedAgreementDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				
				header("location:../../LoginAccount");
				} else {
				$path='../../../../';
				$model = new LandloardAgreementModel();
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['agreement_id']=cleanMe($a);
				$agreementDetail = $model->agreementDetail($data);
				$emiList = $model->emiList($data);
				$emiUnpaidInfo = $model->emiUnpaidInfo($data);
				require_once('LandloardAgreementInfoView.php');
			}
			
		}
		
		public static function bankTransferDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				
				header("location:../../LoginAccount");
				} else {
				$path='../../../../';
				$model = new LandloardAgreementModel();
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['agreement_id']=cleanMe($a);
				$agreementDetail = $model->agreementDetail($data);
				$emiList = $model->emiList($data);
				require_once('LandloardAgreementBankTransferInfoView.php');
			}
			
		}
		
		
		public static function updateTransferDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				
				header("location:../../LoginAccount");
				} else {
				$path='../../../../';
				$model = new LandloardAgreementModel();
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['agreement_id']=cleanMe($a);
				$updateTransferDetail = $model->updateTransferDetail($data);
				 header('location:../availableAgreement');
			}
			
		}
		
	}
	
	
?>