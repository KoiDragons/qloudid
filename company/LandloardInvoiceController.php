<?php
	
	require_once 'LandloardInvoiceModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class LandloardInvoiceController
	{
		
	 
		public static function listInvoice($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
			  $model1       = new LandloardInvoiceModel();
					$data=array();
					$model1       = new LandloardInvoiceModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
					  
					 $urlDetail    = $model1->urlDetail($data);
					header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
			} else {
				$path = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new EmployeeCheckController();
					$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
						header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new LandloardInvoiceModel();
				$data['app_id']    = $model1->appId();
					$model3       = new DaycarePricePlanModel();
					$appdownloadStatus    = $model3->appdownloadStatus($data);
					if($appdownloadStatus==0)
					{
						$getPermissionDetail    = $model1->getPermissionDetail($data);
						header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
						die;
					}
				$landloardInvoices    = $model1->landloardInvoices($data); 
				 
				require_once('LandloardInvoiceListView.php');
		}
		}
		
		
		public static function listComissionInvoice($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
			  $model1       = new LandloardInvoiceModel();
					$data=array();
					$model1       = new LandloardInvoiceModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
					  
					 $urlDetail    = $model1->urlDetail($data);
					header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
			} else {
				$path = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new EmployeeCheckController();
					$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
						header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new LandloardInvoiceModel();
				$data['app_id']    = $model1->appId();
					$model3       = new DaycarePricePlanModel();
					$appdownloadStatus    = $model3->appdownloadStatus($data);
					if($appdownloadStatus==0)
					{
						$getPermissionDetail    = $model1->getPermissionDetail($data);
						header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
						die;
					}
				$landloardInvoices    = $model1->landloardBrokerComissionInvoices($data); 
				 
				require_once('LandloardInvoiceCommissionListView.php');
		}
		}
		
		
		public static function handleCommissionInvoice($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
			  $model1       = new LandloardInvoiceModel();
					$data=array();
					$model1       = new LandloardInvoiceModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
					  
					 $urlDetail    = $model1->urlDetail($data);
					header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
			} else {
				$path = "../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['invoice_id']=cleanMe($b);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new EmployeeCheckController();
					$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
						header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new LandloardInvoiceModel();
				$data['app_id']    = $model1->appId();
					$model3       = new DaycarePricePlanModel();
					$appdownloadStatus    = $model3->appdownloadStatus($data);
					if($appdownloadStatus==0)
					{
						$getPermissionDetail    = $model1->getPermissionDetail($data);
						header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
						die;
					}
				$landloardInvoice    = $model1->landloardBrokerComissionSelectedInvoice($data); 
				$bankDetails    = $model1->bankDetails($data); 
				require_once('LandloardInvoiceCommissionHandlePaymentView.php');
		}
		}
		
		public static function updateInvoiceHandlePayment($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
			  $model1       = new LandloardInvoiceModel();
					$data=array();
					$model1       = new LandloardInvoiceModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
					  
					 $urlDetail    = $model1->urlDetail($data);
					header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
			} else {
				$path = "../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['invoice_id']=cleanMe($b);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new EmployeeCheckController();
					$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
						header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new LandloardInvoiceModel();
				$data['app_id']    = $model1->appId();
					$model3       = new DaycarePricePlanModel();
					$appdownloadStatus    = $model3->appdownloadStatus($data);
					if($appdownloadStatus==0)
					{
						$getPermissionDetail    = $model1->getPermissionDetail($data);
						header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
						die;
					}
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				$updateInvoiceHandlePayment    = $model1->updateInvoiceHandlePayment($data); 
				header('location:../../listComissionInvoice/'.$data['cid']);
		}
		}
		
		
		
		public static function listComissionhandledInvoice($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
			  $model1       = new LandloardInvoiceModel();
					$data=array();
					$model1       = new LandloardInvoiceModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
					  
					 $urlDetail    = $model1->urlDetail($data);
					header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
			} else {
				$path = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new EmployeeCheckController();
					$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
						header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new LandloardInvoiceModel();
				$data['app_id']    = $model1->appId();
					$model3       = new DaycarePricePlanModel();
					$appdownloadStatus    = $model3->appdownloadStatus($data);
					if($appdownloadStatus==0)
					{
						$getPermissionDetail    = $model1->getPermissionDetail($data);
						header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
						die;
					}
				$landloardInvoices    = $model1->landloardBrokerComissionHandeledInvoices($data); 
				 
				require_once('LandloardInvoiceCommissionHandledListView.php');
		}
		}
		
		public static function paymentInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
			  $model1       = new LandloardInvoiceModel();
					$data=array();
					$model1       = new LandloardInvoiceModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
					  
					 $urlDetail    = $model1->urlDetail($data);
					header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
			} else {
				$path = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new EmployeeCheckController();
					$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
						header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new LandloardInvoiceModel();
				$data['app_id']    = $model1->appId();
					$model3       = new DaycarePricePlanModel();
					$appdownloadStatus    = $model3->appdownloadStatus($data);
					if($appdownloadStatus==0)
					{
						$getPermissionDetail    = $model1->getPermissionDetail($data);
						header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
						die;
					}
				  
				require_once('LandloardInvoicePaymentInformationView.php');
		}
		}
		
		
		public static function updatePayment($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
			  $model1       = new LandloardInvoiceModel();
					$data=array();
					$model1       = new LandloardInvoiceModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
					  
					 $urlDetail    = $model1->urlDetail($data);
					header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
			} else {
				$path = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new EmployeeCheckController();
					$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
						header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new LandloardInvoiceModel();
				$data['app_id']    = $model1->appId();
					$model3       = new DaycarePricePlanModel();
					$appdownloadStatus    = $model3->appdownloadStatus($data);
					if($appdownloadStatus==0)
					{
						$getPermissionDetail    = $model1->getPermissionDetail($data);
						header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
						die;
					}
					require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				  $updatePayment    = $model1->updatePayment($data);
				header('location:../paymentList/'.$data['cid']);
		}
		}
		
		public static function paymentList($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
			  $model1       = new LandloardInvoiceModel();
					$data=array();
					$model1       = new LandloardInvoiceModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
					  
					 $urlDetail    = $model1->urlDetail($data);
					header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
			} else {
				$path = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new EmployeeCheckController();
					$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
						header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new LandloardInvoiceModel();
				$data['app_id']    = $model1->appId();
					$model3       = new DaycarePricePlanModel();
					$appdownloadStatus    = $model3->appdownloadStatus($data);
					if($appdownloadStatus==0)
					{
						$getPermissionDetail    = $model1->getPermissionDetail($data);
						header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
						die;
					}
				$landloardPaymentReceived    = $model1->landloardPaymentReceived($data); 
				 
				require_once('LandloardInvoicePaymentListView.php');
		}
		}
		
		
		public static function matchInvoice($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
			  $model1       = new LandloardInvoiceModel();
					$data=array();
					$model1       = new LandloardInvoiceModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
					  
					 $urlDetail    = $model1->urlDetail($data);
					header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
			} else {
				$path = "../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['payment_id']=cleanMe($b);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new EmployeeCheckController();
					$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
						header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new LandloardInvoiceModel();
				$data['app_id']    = $model1->appId();
					$model3       = new DaycarePricePlanModel();
					$appdownloadStatus    = $model3->appdownloadStatus($data);
					if($appdownloadStatus==0)
					{
						$getPermissionDetail    = $model1->getPermissionDetail($data);
						header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
						die;
					}
				$landloardUnpaidInvoices    = $model1->landloardUnpaidInvoices($data); 
				 
				require_once('LandloardInvoiceMatchInvoiceView.php');
		}
		}
		
		public static function updateInvoicePayment($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
			  $model1       = new LandloardInvoiceModel();
					$data=array();
					$model1       = new LandloardInvoiceModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
					  
					 $urlDetail    = $model1->urlDetail($data);
					header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
			} else {
				$path = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['payment_id']=cleanMe($b);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new EmployeeCheckController();
					$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
						header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new LandloardInvoiceModel();
				$data['app_id']    = $model1->appId();
					$model3       = new DaycarePricePlanModel();
					$appdownloadStatus    = $model3->appdownloadStatus($data);
					if($appdownloadStatus==0)
					{
						$getPermissionDetail    = $model1->getPermissionDetail($data);
						header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
						die;
					}
					require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				  $updateInvoicePayment    = $model1->updateInvoicePayment($data);
				header('location:../../paymentList/'.$data['cid']);
		}
		}
		
		
		public static function checkDepositCode($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
			  $model1       = new LandloardInvoiceModel();
					$data=array();
					$model1       = new LandloardInvoiceModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
					  
					 $urlDetail    = $model1->urlDetail($data);
					header("location:https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
			} else {
				$path = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new LandloardInvoiceModel();
				$checkDepositCode    = $model1->checkDepositCode($data);
				 echo $checkDepositCode; die;
		}
		}
		
		 
	}
?>