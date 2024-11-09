<?php
	require_once 'EmployeeLoginModel.php';
	require_once 'EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class EmployeeLoginController
	{
		public static function welcome($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['eid']=cleanMe($a);
				$model       = new EmployeeLoginModel();
				$data['cid']    = $model->getCompany($data);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data);
				$corporateColor    = $model->corporateColor($data);
				$verifyIP    = $model->verifyIP($data);
				if($verifyIP==0)
				{
					require_once('LicenseErrorView.php');
				}
				else
				{
				require_once('EmployeesStartView.php');
				}
			}
		}
		
		public static function expressLogin($a=null)
		{
			
				$path = "../../../../";
				$data=array();
				$data['eid']=cleanMe($a);
				$model       = new EmployeeLoginModel();
				$data['cid']    = $model->getCompany($data);
				$companyDetail    = $model->companyDetail($data);
				//print_r($companyDetail); die;
				$corporateColor    = $model->corporateColor($data);
				$verifyIP    = $model->verifyIP($data);
				require_once('../configs/smsMandril.php');
				
				if($verifyIP==0)
				{
					require_once('LicenseErrorView.php');
				}
				else
				{
				$getPhone    = $model->getPhone($data);
				$verifyPhone    = $model->verifyPhone($data);
				require_once('EmployeesExpressLoginView.php');
				}
			}
			public static function sacnqrLogin($a=null)
		{
			
				$path = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$model       = new EmployeeLoginModel();
				$companyDetail    = $model->companyDetail($data);
				$corporateColor    = $model->corporateColor($data);
				$verifyIP    = $model->verifyIP($data);
				
				if($verifyIP==0)
				{
					require_once('LicenseErrorView.php');
				}
				else
				{
				require_once('EmployeeExpressQrLoginView.php');
				}
			}
		
		
		public static function addInformation($a=null)
		{
			
			$path = "../../../../";
			$data=array();
			
			$data['cid']=cleanMe($a);
			
			$model1       = new EmployeeLoginModel();
			$resultContry    = $model1->countryOption($data);
			$verifyIP    = $model1->verifyIP($data);
			$companyDetail    = $model1->companyDetail($data);
			if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else
			{
			require_once('EmployeeLoginView.php');
			}
			
		}
		
		
			public static function verifyUserDetail($a=null)
		{
			$model = new EmployeeLoginModel();
			$data=array();
			
			$data['cid']=cleanMe($a);	
			require_once('../configs/smsMandril.php');
			$verifyUserDetail = $model->verifyUserDetail($data);	
				
			echo $verifyUserDetail; die;
			
			
		}
		
		public static function verifyOtp($a=null)
		{
			$model = new EmployeeLoginModel();
			$data=array();
			$data['cid']=cleanMe($a);	
			require_once('../configs/smsMandril.php');
			$verifyOtp = $model->verifyOtp($data);	
			echo $verifyOtp; die;
				
		}
		
	}
?>