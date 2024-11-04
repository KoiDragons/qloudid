<?php
	require_once 'LeveranserModel.php';
	require_once 'EmployeeCheckController.php';
	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class LeveranserController
	{
		
		
		public static function changeLanguage()
		{
				$model = new LeveranserModel();
				$changeLanguage = $model->changeLanguage();	
				echo $changeLanguage; die;	
		}
		
		public static function pickupInfo($a=null)
		{
			
				$path = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$model       = new LeveranserModel();
				$data['comp_id']    = $model->selectWhitelistCompany($data);
				$data['comp_name']    = $model->selectWhitelistCompanyName($data);
				$companyDetail    = $model->companyDetail($data);
				$corporateColor    = $model->corporateColor($data);
				$verifyLanguage=$model->verifyLanguage();
				$verifyIP    = $model->verifyIP($data);
				$checkOpenStatus    = $model->checkOpenStatus($data);
				if($checkOpenStatus==0)
				{
				header('location:../../Company/openDay/'.$data['cid']);	 die;
				}
				else 
				{
				if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else 
			{	
				require_once('LeveranserView.php');
			}
				}
		}
		
		public static function pickupRegister($a=null)
		{
			
				$path = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$model       = new LeveranserModel();
				$data['comp_id']    = $model->selectWhitelistCompany($data);
				$data['comp_name']    = $model->selectWhitelistCompanyName($data);
				$companyDetail    = $model->companyDetail($data);
				$corporateColor    = $model->corporateColor($data);
				$verifyLanguage=$model->verifyLanguage();
				$verifyIP    = $model->verifyIP($data);
				$checkOpenStatus    = $model->checkOpenStatus($data);
				if($checkOpenStatus==0)
				{
				header('location:../../Company/openDay/'.$data['cid']);	 die;
				}
				else 
				{
				if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else 
			{	
				require_once('LeveranserPickupView.php');
			}
				}
		}
		
		
			public static function pickupVerify($a=null)
		{
			
				$path = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$model       = new LeveranserModel();
				$data['comp_id']    = $model->selectWhitelistCompany($data);
				$data['comp_name']    = $model->selectWhitelistCompanyName($data);
				$companyDetail    = $model->companyDetail($data);
				$corporateColor    = $model->corporateColor($data);
				$verifyLanguage=$model->verifyLanguage();
				$verifyIP    = $model->verifyIP($data);
				$checkOpenStatus    = $model->checkOpenStatus($data);
				if($checkOpenStatus==0)
				{
				header('location:../../Company/openDay/'.$data['cid']);	 die;
				}
				else 
				{
				if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else 
			{	
				require_once('LeveranserVerifyView.php');
			}
			}
		}
		
			public static function itemDetail($a=null)
		{
			
				$path = "../../../../";
				$data=array();
				$data['eid']=cleanMe($a);
				$model       = new LeveranserModel();
				$data['cid']=$model->getCompany($data);
				$data['comp_id']    = $model->selectWhitelistCompany($data);
				$data['comp_name']    = $model->selectWhitelistCompanyName($data);
				$companyDetail    = $model->companyDetail($data);
				$corporateColor    = $model->corporateColor($data);
				$pickupList    = $model->pickupList($data);
				$verifyIP    = $model->verifyIP($data);
				$checkOpenStatus    = $model->checkOpenStatus($data);
				if($checkOpenStatus==0)
				{
				header('location:../../Company/openDay/'.$data['cid']);	 die;
				}
				else 
				{
				if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else 
			{	
				require_once('LeveranserListView.php');
			}
				}
		}
		
		
			public static function approvePickup($a=null)
		{
			
				$path = "../../../../";
				$data=array();
				$data['eid']=cleanMe($a);
				$model       = new LeveranserModel();
				$data['cid']=$model->getCompany($data);
				$data['comp_id']    = $model->selectWhitelistCompany($data);
				$data['comp_name']    = $model->selectWhitelistCompanyName($data);
				$companyDetail    = $model->companyDetail($data);
				$corporateColor    = $model->corporateColor($data);
				$verifyIP    = $model->verifyIP($data);
				if($verifyIP==0)
			{
				header('location:../pickupInfo/'.$data['cid']);
			}
			else 
			{	
				$confirmPickup    = $model->confirmPickup($data);
				header('location:../pickupInfo/'.$data['cid']);
			}
		}
		
		public static function employeeList($a=null, $b=null)
		{
			
			$data=array();
			
			$data['cid']=cleanMe($a);
			$data['filter']=cleanMe($_GET['filter']);
			$model = new LeveranserModel();
			
			$employeeList=$model->employeeList($data);
			
			echo $employeeList;
			
			
		}
		
		public static function getEmployeeInfo()
		{
			
			
			$model = new LeveranserModel();
			
			$getEmployeeInfo=$model->getEmployeeInfo();
			
			echo $getEmployeeInfo;
			
			
		}
		public static function thanksForInformation($a=null)
		{
			
				$data=array();
				$path = "../../../../";
				$data['cid']=cleanMe($a);
				$model = new LeveranserModel();
				$verifyLanguage=$model->verifyLanguage();
				$companyDetail=$model->companyDetail($data);
				$verifyIP    = $model->verifyIP($data);
				$corporateColor    = $model->corporateColor($data);
				$checkOpenStatus    = $model->checkOpenStatus($data);
				if($checkOpenStatus==0)
				{
				header('location:../../Company/openDay/'.$data['cid']);	 die;
				}
				else 
				{
			if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else
			{
				require_once('LeveranserThanksView.php');
				
			}
				}
		}
		public static function packetInfo($a=null)
		{
			
			$data=array();
			
			$data['cid']=cleanMe($a);
			
			$model = new LeveranserModel();
			require_once('../configs/smsMandril.php');
			require_once('../configs/testMandril.php');
			require_once('../lib/url_shortener.php');
			$packetInfo=$model->packetInfo($data);
			
			header('location:../thanksForInformation/'.$data['cid']);
			
			
		}
		
		public static function packetReceivedInfo($a=null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
			$model = new LeveranserModel();
			$selectIcon    = $model->selectIcon($data);
			$receivedPacket    = $model->receivedPacket($data);
			$deliveredPacket    = $model->deliveredPacket($data);
			$receivedPacketCount    = $model->receivedPacketCount($data);
			$deliveredPacketCount    = $model->deliveredPacketCount($data);
			require_once('LeveranserReceivedView.php');
				}
		}
		
		public static function employeeReceivedInfo($a=null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
				$data['eid']=cleanMe($a);
				$model = new LeveranserModel();
				$data['cid']=$model->getCompany($data);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
			
			$selectIcon    = $model->selectIcon($data);
			$receivedEmployeePacket    = $model->receivedEmployeePacket($data);
			$deliveredEmployeePacket    = $model->deliveredEmployeePacket($data);
			$receivedEmployeePacketCount    = $model->receivedEmployeePacketCount($data);
			$deliveredEmployeePacketCount    = $model->deliveredEmployeePacketCount($data);
			$row_summary    = $model->userSummary($data);
			$companyDetail    = $model->companyDetail($data);
			 
			require_once('LeveranserEmployeeReceivedView.php');
				}
		}
		
		public static function moreReceivedPacket($a=null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
			
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$model = new LeveranserModel();
			$moreReceivedPacket    = $model->moreReceivedPacket($data);
			echo $moreReceivedPacket; die;
				}
		}
		
		public static function moreDeliveredEmployeePacket($a=null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
			
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['eid']=cleanMe($a);
			$model = new LeveranserModel();
			$moreDeliveredPacket    = $model->moreDeliveredEmployeePacket($data);
			echo $moreDeliveredPacket; die;
				}
		}
		
		public static function moreDeliveredPacket($a=null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
			
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$model = new LeveranserModel();
			$moreDeliveredPacket    = $model->moreDeliveredPacket($data);
			echo $moreDeliveredPacket; die;
				}
		}
	}
?>