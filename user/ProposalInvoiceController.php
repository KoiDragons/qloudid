<?php
require_once 'ProposalInvoiceModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class ProposalInvoiceController
{
    
    
    
	 public static function invoiceInformation($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $model1       = new ProposalInvoiceModel();
				$data=array();
				 $data['REQUEST_URI']='https://www.safeqloud.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../";
		$data=array();
		$data['agreement_id']=cleanMe($a);
		$data['invoice_id']=cleanMe($b);
		$data['user_id']=$_SESSION['user_id'];
		$model       = new ProposalInvoiceModel();
		$agreementDetailInformation    = $model->agreementDetailInformation($data);
		//echo '<pre>'; print_r($agreementDetailInformation); echo '</pre>';
		require_once('ProposalInvoiceDetailView.php');
	}
	}
	
	
	public static function handleInvoice($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../LoginAccount");
        } else {
			$path = "../../../../../";
		$data=array();
		$data['agreement_id']=cleanMe($a);
		$data['invoice_id']=cleanMe($b);
		$data['user_id']=$_SESSION['user_id'];
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		require_once('../configs/smsMandril.php');	
		$model       = new ProposalInvoiceModel();
		$handleInvoice    = $model->handleInvoice($data);
		header('location:../../../../../pubulic/index.php/LandloardBroker/agreementDetail/'.$data['agreement_id']);
	}
	}
	 

}
?>