<?php
require_once 'EmployeeQRModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class EmployeeQRController
{
  
	
	public static function employeeAccount($a=null)
		{
			
            $path         = "../../../../";
			$data=array();
			
			$data['eid']=cleanMe($a);
			
			$model = new EmployeeQRModel();
			$employeeDetail= $model->employeeDetail($data);
			
			require_once('EmployeeQRView.php');
			
		}
		
		public static function loginAccount($a=null)
		{
			
            $path         = "../../../../";
			$data=array();
			
			$data['eid']=cleanMe($a);
			
			$model = new EmployeeQRModel();
			$employeeDetail= $model->employeeDetail($data);
			
			require_once('EmployeeLoginQRView.php');
			
		}
		
}
?>