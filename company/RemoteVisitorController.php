<?php
	require_once 'RemoteVisitorModel.php';
	require_once '../company/EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class RemoteVisitorController
	{
	 
		public static function visitorsInfo($a=null)
		{
			
			$path = "../../../../";
			$data=array();
			
			$data['cid']=cleanMe($a);
			 
			$model1       = new RemoteVisitorModel();
			$resultContry    = $model1->countryOption($data);
			$verifyIP    = $model1->verifyIP($data);
			 
			$companyDetail    = $model1->companyDetail($data);
			 
			$corporateColor    = $model1->corporateColor($data);
			 
			 
			if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else
			{
			 $verifyActivation    = $model1->verifyActivation($data);
			 if($verifyActivation==0)
			 {
			require_once('RemoteVisitorInfoView.php');
			 }
			 else
			 {
			header('location:../activateVisitorsMeeting/'.$data['cid']);
			 }
			 
			}
		
		}
		
		
		public static function employeeInfo($a=null)
		{
			
			$path = "../../../../";
			$data=array();
			
			$data['cid']=cleanMe($a);
			 
			$model1       = new RemoteVisitorModel();
			$resultContry    = $model1->countryOption($data);
			$verifyIP    = $model1->verifyIP($data);
			  
			$companyDetail    = $model1->companyDetail($data);
			$meetingRoomDetail    = $model1->meetingRoomDetail($data); 
			$corporateColor    = $model1->corporateColor($data);
			  
			if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else
			{
			 $verifyActivation    = $model1->verifyActivation($data);
			 if($verifyActivation==0)
			 {
				require_once('RemoteVisitorErrorView.php');
			 }
			 else
			 {
			require_once('RemoteVisitorEmployeeInfoView.php');
			 }
			 
			}
		
		}
		public static function thanksVisitor($a=null)
		{
			
			$path = "../../../../";
			$data=array();
			
			$data['cid']=cleanMe($a);
			 
			$model1       = new RemoteVisitorModel();
			$resultContry    = $model1->countryOption($data);
			$verifyIP    = $model1->verifyIP($data);
			 
			$companyDetail    = $model1->companyDetail($data);
			 
			$corporateColor    = $model1->corporateColor($data);
			 
			 
			if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else
			{
			 $verifyActivation    = $model1->verifyActivation($data);
			 
			 if($verifyActivation==0)
			 {
				require_once('RemoteVisitorsThanksView.php');
			 }
			 else
			 {
			header('location:../activateVisitorsMeeting/'.$data['cid']);
			 }
			 
			}
		
		}
		
		public static function welcomeVisitors($a=null)
		{
			
			$path = "../../../../";
			$data=array();
			
			$data['cid']=cleanMe($a);
			 
			$model1       = new RemoteVisitorModel();
			$resultContry    = $model1->countryOption($data);
			$verifyIP    = $model1->verifyIP($data);
			 
			$companyDetail    = $model1->companyDetail($data);
			 
			$corporateColor    = $model1->corporateColor($data);
			 
			 
			if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else
			{
			 $verifyActivation    = $model1->verifyActivation($data);
			 
			 if($verifyActivation==0)
			 {
				require_once('RemoteVisitorsWelcomeView.php');
			 }
			 else
			 {
			header('location:../activateVisitorsMeeting/'.$data['cid']);
			 }
			 
			}
		
		}
		
		public static function remoteVisitorsQrScan($a=null)
		{
			
			$path = "../../../../";
			$data=array();
			
			$data['cid']=cleanMe($a);
			 
			$model1       = new RemoteVisitorModel();
			$resultContry    = $model1->countryOption($data);
			$verifyIP    = $model1->verifyIP($data);
			 
			$companyDetail    = $model1->companyDetail($data);
			 
			$corporateColor    = $model1->corporateColor($data);
			 
			 
			if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else
			{
			 $verifyActivation    = $model1->verifyActivation($data);
			 
			 if($verifyActivation==0)
			 {
				require_once('RemoteVisitorsQrScanView.php');
			 }
			 else
			 {
			header('location:../activateVisitorsMeeting/'.$data['cid']);
			 }
			 
			}
		
		}
		
		
		
		public static function activateVisitorsMeeting($a=null)
		{
			
			$path = "../../../../";
			$data=array();
			
			$data['cid']=cleanMe($a);
			 
			$model1       = new RemoteVisitorModel();
			$resultContry    = $model1->countryOption($data);
			$verifyIP    = $model1->verifyIP($data);
			 
			$companyDetail    = $model1->companyDetail($data);
			 
			$corporateColor    = $model1->corporateColor($data);
			 
			 
			if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else
			{
			 $verifyActivation    = $model1->verifyActivation($data);
			 if($verifyActivation==0)
			 {
				require_once('RemoteVisitorErrorView.php');
			 }
			 else
			 {
			require_once('RemoteVisitorsActivationView.php');
			 }
			 
			}
		
		}
		
		 public static function visitorsList($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new RemoteVisitorModel();
			$resultContry    = $model1->countryOption($data);
			$companyDetail    = $model1->companyDetail($data);
			$selectIcon    = $model1->selectIcon($data);
			$corporateColor    = $model1->corporateColor($data);
			$visitorsDetail    = $model1->visitorsDetail($data); 
			 
			 
			require_once('RemoteVisitorListView.php');
			
				}
		
		}
		
		
		public static function informEmployee($a=null)
		{
			
			$data=array();
			
			$data['cid']=cleanMe($a);
			
			$model = new RemoteVisitorModel();
			 
			$informEmployee=$model->informEmployee($data);
			
			header('location:../thanksVisitor/'.$data['cid']);
			
			
		}
		
		public static function visitorsExpressInfo($a=null,$b=null)
		{
			
			$data=array();
			
			$data['cid']=cleanMe($a);
			$data['eid']=cleanMe($b);
			
			$model = new RemoteVisitorModel();
			 
			$visitorsExpressInfo=$model->visitorsExpressInfo($data);
			
			header('location:../../thanksVisitor/'.$data['cid']);
			
			
		}
		
		public static function activateVisitors($a=null)
		{
			
			$data=array();
			
			$data['cid']=cleanMe($a);
			
			$model = new RemoteVisitorModel();
			 
			$activateVisitors=$model->activateVisitors($data);
			
			header('location:../welcomeVisitors/'.$data['cid']);
			
			
		}
		
		public static function checkVisitor($a=null)
		{
			
			$data=array();
			
			$data['cid']=cleanMe($a);
			
			$model = new RemoteVisitorModel();
			$checkVisitor=$model->checkVisitor($data);
			
			echo $checkVisitor; die;
			
			
		}
		
		public static function checkExpressVisitor($a=null)
		{
			
			$data=array();
			
			$data['cid']=cleanMe($a);
			
			$model = new RemoteVisitorModel();
			$checkExpressVisitor=$model->checkExpressVisitor($data);
			
			echo $checkExpressVisitor; die;
			
			
		}
		
		public static function verifyActivation($a=null)
		{
			
			$data=array();
			
			$data['cid']=cleanMe($a);
			
			$model = new RemoteVisitorModel();
			$verifyActivation=$model->verifyActivation($data);
			
			echo $verifyActivation; die;
			
			
		}
		 public static function checkEmployee($a=null)
		{
			
			$data=array();
			
			$data['cid']=cleanMe($a);
			
			$model = new RemoteVisitorModel();
			$checkEmployee=$model->checkEmployee($data);
			
			echo $checkEmployee; die;
			
			
		}
	}
?>