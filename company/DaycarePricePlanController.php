<?php
	require_once 'DaycarePricePlanModel.php';
	require_once 'EmployeeCheckController.php';
	require_once('../stripe/vendor/autoload.php');
	require_once '../stripe/constant1.php';
	 
	require_once('../stripe/vendor/stripe/stripe-php/init.php');
	require_once '../configs/utility.php';
	class DaycarePricePlanController
	{
		public static function createCardTokan()
		{
			 
				$model1       = new DaycarePricePlanModel();
				$createCardTokan    = $model1->createCardTokan();
				 
		}
			public static function upgradePlanAccount($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['app_id']=cleanMe($b);
				$data['private_key']=private_key;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new DaycarePricePlanModel();
				$permission_id    = $model->permission_id($data);
				$appdownloadStatus    = $model->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$permission_id);
					die;
				}
				$planInfo    = $model->planInfo($data);
				if(empty($planInfo))
				{
				header("location:../../planAccount/".$data['cid'].'/'.$data['app_id']);	
				die;	
				}
				$subscriptionInfo    = $model->subscriptionInfo($data);
				if($subscriptionInfo['billing_type']==1)
				{
				$appDetail    = $model->appDetail($data);
				header("location:".$appDetail['app_link']."".$data['cid']);
				 
				die;
				}
				$coporateColorDetail    = $model->coporateColorDetail($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				$selectIcon    = $model->selectIcon($data);
				$appPriceDetails    = $model->appPriceDetails($data);
				 
				require_once('DaycarePriceUpgradePlanView.php');
			}
		}
		
		
			public static function planAccount($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['app_id']=cleanMe($b);
				$data['private_key']=private_key;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new DaycarePricePlanModel();
				$permission_id    = $model->permission_id($data);
				 
				$appdownloadStatus    = $model->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$permission_id);
					die;
				}
				/*$planDetails    = $model->planDetails($data);
				if($planDetails==1)
				{
				header("location:../../../ChilldCare/helpCenter/".$data['cid']);	
				die;	
				}*/
				$oldMonth='';
				$i=(int)date('m'); for($j=$i; $j<=12; $j++) {  
				$oldMonth=$oldMonth.'<option value="'.$j.'" class="lgtgrey2_bg changedText">'.$j.'</option>';
				}
				$nextMonth='';
				for($j=1; $j<=12; $j++) {  
				$nextMonth=$nextMonth.'<option value="'.$j.'" class="lgtgrey2_bg changedText">'.$j.'</option>';
				}
				$coporateColorDetail    = $model->coporateColorDetail($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				$selectIcon    = $model->selectIcon($data);
				$appPriceDetails    = $model->appPriceDetails($data);
				  
				require_once('DaycarePricePlanLatestView.php');
			}
		}
		
		public static function addPaymentInformation($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$data=array();
				$model       = new DaycarePricePlanModel();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['app_id']=cleanMe($b);
				$data['plan_id']=cleanMe($c);

				$data['sub_id']=cleanMe($c);
				$data['sub_id']=$model->subId($data);
				$data['private_key']=private_key;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				
				$permission_id    = $model->permission_id($data);
				 
				$appdownloadStatus    = $model->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$permission_id);
					die;
				}
				/*$planDetails    = $model->planDetails($data);
				if($planDetails==1)
				{
				header("location:../../../ChilldCare/helpCenter/".$data['cid']);	
				die;	
				}*/
				$oldMonth='';
				$i=(int)date('m'); for($j=$i; $j<=12; $j++) {  
				$oldMonth=$oldMonth.'<option value="'.$j.'" class="lgtgrey2_bg changedText">'.$j.'</option>';
				}
				$nextMonth='';
				for($j=1; $j<=12; $j++) {  
				$nextMonth=$nextMonth.'<option value="'.$j.'" class="lgtgrey2_bg changedText">'.$j.'</option>';
				}
				$coporateColorDetail    = $model->coporateColorDetail($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				$selectIcon    = $model->selectIcon($data);
				$appPriceDetails    = $model->appPriceDetails($data);
				$selectSubsriptionPriceDetails    = $model->selectSubsriptionPriceDetails($data); 
				 
				require_once('DaycareChargePaymentView.php');
			}
		}
		
		
		
		public static function selectedPlanInfo($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['app_id']=cleanMe($b);
				$data['plan_id']=cleanMe($c);
				$data['private_key']=private_key;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new DaycarePricePlanModel();
				
				$appdownloadStatus    = $model->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					header('location:../../../../Brand/productPage/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
					die;
				}
				$planDetails    = $model->planDetails($data);
				/*if($planDetails==1)
				{
				header("location:../../../../ChilldCare/helpCenter/".$data['cid']);	
				die;	
				}*/
			 
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				$selectIcon    = $model->selectIcon($data);
				$selectSubsriptionPriceDetails    = $model->selectSubsriptionPriceDetails($data);
				
				require_once('DaycareChargePaymentView.php');
			}
		}
		
		public static function createCustomer()
		{
			$date=date('Y-m-d h:i:s');
			$datetime = new DateTime($date);
$datetime->modify('+1 day');
$date= $datetime->format('Y-m-d H:i:s');
echo $date;
		}
		
		public static function chargeCard($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../LoginAccount");
				} else {
				 
				$data=array();
				$data['cid']=cleanMe($a);
				$data['app_id']=cleanMe($b);
				$data['selected_plan_id']=cleanMe($c);
				$model1       = new DaycarePricePlanModel();
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				  
				$chargeCard    = $model1->chargeCard($data);
				if($chargeCard==0)
				{
					header("location:../../../paymentFailed/".$data['cid']."/".$data['app_id']."/".$data['selected_plan_id']);	die;
				}
				$appDetail    = $model1->appDetail($data);
				header("location:".$appDetail['app_link']."".$data['cid']);	
			}
		}
		
		
		public static function paymentFailed($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['app_id']=cleanMe($b);
				$data['plan_id']=cleanMe($c);
				$data['private_key']=private_key;
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new DaycarePricePlanModel();
				
				$appdownloadStatus    = $model->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					header('location:../../../../Brand/productPage/'.$data['cid'].'/dFJHdit4c3R6VlhXelY0bXdXTUtxUT09');
					die;
				}
				$planDetails    = $model->planDetails($data);
				 
				 
				require_once('DaycareChargePaymentFailedView.php');
			}
		}
		
		
		
		public static function lockFreePlan($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['app_id']=cleanMe($b);
				$model       = new DaycarePricePlanModel();
				$planDetails    = $model->planDetails($data);
				$appDetail    = $model->appDetail($data);
				if($planDetails==1)
				{
				header("location:".$appDetail['app_link']."".$data['cid']);	
				die;	
				}
				$lockFreePlan = $model->lockFreePlan($data);	
				header("location:".$appDetail['app_link']."".$data['cid']);
			}	
		}
		
		
		
			public static function planDetails($a=null,$b=null)
		{
			$valueNew = checkLogin();
			 
			if ($valueNew == 0) {
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$model = new DaycarePricePlanModel();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['app_id']=cleanMe($b);
				$planDetails = $model->planDetails($data);
				return $planDetails;
			}
		}
		
			public static function daycareTimelapsed($a=null, $b=null)
		{
			$valueNew = checkLogin();
			 
			if ($valueNew == 0) {
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$model = new DaycarePricePlanModel();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				 $data['app_id']=cleanMe($b);
				$daycareTimelapsed = $model->daycareTimelapsed($data);
				return $daycareTimelapsed;
			}
		}
		
		public static function appdownloadStatus($a=null)
		{
			$valueNew = checkLogin();
			 
			if ($valueNew == 0) {
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$model = new DaycarePricePlanModel();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$appdownloadStatus = $model->appdownloadStatus($data);
				return $appdownloadStatus;
			}
		}
		
		
		
		
		public static function updateToFreePlan($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['app_id']=cleanMe($b);
				$model       = new DaycarePricePlanModel();
				$appDetail    = $model->appDetail($data); 
				$updateToFreePlan = $model->updateToFreePlan($data);	
				header("location:".$appDetail['app_link']."".$data['cid']);
			}	
		}
		
		
		public static function updatePlanInfo($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../LoginAccount");
				} else {
				 
				$data=array();
				$data['cid']=cleanMe($a);
				$data['app_id']=cleanMe($b);
				$data['plan_id']=cleanMe($c);
				$model1       = new DaycarePricePlanModel();
				$updatePlanInfo    = $model1->updatePlanInfo($data);
				$appDetail    = $model1->appDetail($data);
				header("location:".$appDetail['app_link']."".$data['cid']);
			}
		}
		
		
	}
    
	
	
?>