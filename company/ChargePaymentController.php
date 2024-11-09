<?php
	require_once 'ChargePaymentModel.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../stripe/vendor/autoload.php');
	require_once '../stripe/constant.php';
	require_once('../stripe/vendor/stripe/stripe-php/init.php');
	class ChargePaymentController
	{
		public static function paymentAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
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
				$data['private_key']=private_key;
				require_once('ChargePaymentView.php');
			}
		}
		
		public static function chargeCard($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$model1       = new ChargePaymentModel();
				$chargeCard    = $model1->chargeCard($data);
				
			}
		}
		
	}
?>