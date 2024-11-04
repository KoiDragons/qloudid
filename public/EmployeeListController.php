<?php
include 'EmployeeListModel.php';
require_once '../configs/utility.php';
class EmployeeListController
{
    
    
    public static function companyAccount($a=null)
    {
		$path  = "../../../../";
		
		$model = new EmployeeListModel();
		$data=array();
		$data['eid']=cleanMe($a);
		$data['cid']    = $model->companyInfo($data);
		$resultList = $model->EmployeeList($data);
		$employeeList = $model->employeeList($data);
		$corporateColor = $model->corporateColor($data);
		$verifyLanguage=$model->verifyLanguage();
		  require_once('EmployeeListView.php');
   
	}
	public static function changeLanguage()
		{
				$model = new EmployeeListModel();
				$changeLanguage = $model->changeLanguage();	
				echo $changeLanguage; die;	
		}
	public static function employeeListNew($a=null)
	{
		$data=array();
		$data['cid']=cleanMe($a);
		$model = new EmployeeListModel();
		$result = $model->employeeListNew($data);
		echo $result; die;
	
	}
	
	
	public static function representativeListSearch($a=null)
	{
		$data=array();
		$data['cid']=cleanMe($a);
		$model = new EmployeeListModel();
		$result = $model->representativeListSearch($data);
		echo $result; die;
	
	}
		
}


?>