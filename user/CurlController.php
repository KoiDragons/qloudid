<?php
	require_once 'CurlModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	include('../configs/smsMandril.php');
	require_once('../stripe/vendor/autoload.php');
	require_once '../stripe/constant.php';
	 
	require_once('../stripe/vendor/stripe/stripe-php/init.php');
	class CurlController
	{
		public static function chargeCustomer()
		{
			$model       = new CurlModel();
			/* Charge all customers whose payment is due today */
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			$chargeCustomer    = $model->chargeCustomer();
		}
		
		
		public static function addEmployee($a=null)
		{
			   $data=array();
			$model       = new CurlModel();
			$data['value']=cleanMe($a);
			/* Charge all customers whose payment is due today */
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			$addEmployee    = $model->addEmployee($data);
			return $addEmployee;  
		}
		
		public static function editEmployee($a=null)
		{
			  $data=array();
			$model       = new CurlModel();
			$data['value']=cleanMe($a);
			 
			/* Charge all customers whose payment is due today */
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			$editEmployee    = $model->editEmployee($data);
			return $editEmployee;  
		}
		
		
		public static function relieveEmployee($a=null)
		{
			  $data=array();
			$model       = new CurlModel();
			$data['value']=cleanMe($a);
			/* Charge all customers whose payment is due today */
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			$relieveEmployee    = $model->relieveEmployee($data);
			return $relieveEmployee;  
		}
		
		public static function employeeRelievingInformation()
		{
			$model       = new CurlModel();
			/* Charge all customers whose payment is due today */
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			$employeeRelievingInformation    = $model->employeeRelievingInformation();
		}
		public static function employeeRequestRelievingInformation()
		{
			$model       = new CurlModel();
			/* Charge all customers whose payment is due today */
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			$employeeRequestRelievingInformation    = $model->employeeRequestRelievingInformation();
		}
		public static function deletePersonalUserRequests()
		{
			$model       = new CurlModel();
			/* delete all approved requests which are old more then 24 hrs */
			$deletePersonalUserRequests    = $model->deletePersonalUserRequests();
		}
		
		public static function informEmployeeVisitorInformation()
		{
			$model       = new CurlModel();
			/* Send information about visitor to employee and ask wether the person is still in company. first time after one hr and later on after every 30 minutes */
			 
			 require_once('../configs/testMandril.php');
			  require_once('../configs/smsMandril.php');
			 require_once('../lib/url_shortener.php');
			$informEmployeeVisitorInformation    = $model->informEmployeeVisitorInformation();
		}
		
	}
?>