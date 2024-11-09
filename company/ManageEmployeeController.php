<?php

require_once 'ManageEmployeeModel.php';
require_once 'EmployeeCheckController.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class ManageEmployeeController
{
    
     public static function updateWorkingTimeInfo($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['eid']=cleanMe($b);
				$model       = new ManageEmployeeModel();
				$updateWorkingTimeInfo = $model->updateWorkingTimeInfo($data);	
				header("location:../../magazineAccount/".$data['cid']);
			}	
		}
		
   
	public static function changeLanguage()
		{
			$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
				$model = new ManageEmployeeModel();
				$changeLanguage = $model->changeLanguage();	
				echo $changeLanguage; die;	
		}
		}
	public static function employeeListNew($a=null)
	{
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
		$data=array();
		$data['cid']=cleanMe($a);
		$model = new ManageEmployeeModel();
		$result = $model->employeeListNew($data);
		echo $result; die;
		}
	}
	
	
	public static function representativeListSearch($a=null)
	{
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
		$data=array();
		$data['cid']=cleanMe($a);
		$model = new ManageEmployeeModel();
		$result = $model->representativeListSearch($data);
		echo $result; die;
		}
	}
	
	public static function magazineAccount($a=null)
	{
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
            $path         = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
			 $model = new ManageEmployeeModel();
			 $empid    = $model->employeeId($data);
			 $companyDetail    = $model->companyDetail($data);
			 $empl    = $model->empSummary($data);
			 $updateAdmin    = $model->updateAdmin($data);
			$checkPermission    = $model->checkPermission($data);
			$resultList = $model->employeeList($data);
			$employeeList = $model->employeeList($data);
			 $data['eid']=$model->employerSummary($data);
			require_once('ManageEmployeeView.php');
		}
	}
	 
	
	public static function updateWorkingHrs($a=null,$b=null)
	{
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../../user/index.php/LoginAccount");
        } else {
            $path         = "../../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$data['eid']=cleanMe($b);
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
			 $model = new ManageEmployeeModel();
			 $empid    = $model->employeeId($data);
			 $companyDetail    = $model->companyDetail($data);
			 $empl    = $model->empSummary($data);
			 $workingHrs    = $model->workingHrs($data);
			$checkPermission    = $model->checkPermission($data);
			$resultList = $model->employeeList($data);
			$employeeWorkDetail = $model->employeeWorkDetail($data);
			$countWorkingTimeInfo = $model->countWorkingTimeInfo($data);
			require_once('ManageEmployeeWorkingHrsView.php');
		}
	}
	
	public static function serviceAccount($a=null,$b=null)
	{
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../../user/index.php/LoginAccount");
        } else {
            $path         = "../../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$data['eid']=cleanMe($b);
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
			 $model = new ManageEmployeeModel();
			 $empid    = $model->employeeId($data);
			 $companyDetail    = $model->companyDetail($data);
			 $data['warnings']    = $model->employeeServices($data);
			 $workingHrs    = $model->workingHrs($data);
			$checkPermission    = $model->checkPermission($data);
			$resultList = $model->employeeList($data);
			$employeeWorkDetail = $model->employeeWorkDetail($data);
			$countWorkingTimeInfo = $model->countWorkingTimeInfo($data);
			if($countWorkingTimeInfo==0)
			{
				header('location:../../updateWorkingHrs/'.$data['cid'].'/'.$data['eid']); die;
			}
			
			$dishesList    = $model->dishesList($data);
			require_once('ManageEmployeeServiceAccountView.php');
		}
	}
	
	
	public static function updateServicesInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['eid']=cleanMe($b);
				 
				$model       = new ManageEmployeeModel();
				$updateServicesInfo = $model->updateServicesInfo($data);	
				header("location:../../serviceAccount/".$data['cid']."/".$data['eid']);
			}	
		}  
	
	public static function addEmployee($a=null, $b=null)
    {
	$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
	$model = new ManageEmployeeModel();
		 
			$addEmployee=$model->addEmployee();
			 
			echo $addEmployee;
		 
	
	}
	}
	
	public static function updatePermission($a=null, $b=null)
    {
	$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
	$model = new ManageEmployeeModel();
		// print_r($_POST); die;
			$updatePermission=$model->updatePermission();
			
			echo $updatePermission;
		 
	
	}
	
	}
	public static function editEmployee($a=null, $b=null)
    {
	$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
	$model = new ManageEmployeeModel();
		// print_r($_POST); die;
			$editEmployee=$model->editEmployee();
			 
			echo $editEmployee;
		 
	
	}
	}
	public static function addPosition($a=null, $b=null)
    {
	$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
	$model = new ManageEmployeeModel();
		// print_r($_POST); die;
			$addPosition=$model->addPosition();
			 
			echo $addPosition;
		 
	
	}
	}
	public static function addActivePosition($a=null, $b=null)
    {
	$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
	$model = new ManageEmployeeModel();
		// print_r($_POST); die;
			$addPosition=$model->addActivePosition();
			 
			echo $addPosition;
		 
	
	}
	
	}
	public static function editActivePosition($a=null, $b=null)
    {
	$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
	$model = new ManageEmployeeModel();
		// print_r($_POST); die;
			$editActivePosition=$model->editActivePosition();
			 
			echo $editActivePosition;
		 
	
	}
	}
	public static function addNewPosition($a=null, $b=null)
    {
	$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
	$model = new ManageEmployeeModel();
		$data=array();
		$data['cid']=cleanMe($a);
		
			$addNewPosition=$model->addNewPosition($data);
			 
			header("location:../magazineAccount/".$data['cid']);
		 
	
	}
	}
	public static function positionCheck($a=null, $b=null)
    {
	$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
	$model = new ManageEmployeeModel();
		$data=array();
		$data['pid']=cleanMe($a);
		$data['eid']=cleanMe($b);
			$positionCheck=$model->positionCheck($data);
			 
			echo $positionCheck;
		 
	
	}
	}
	public static function positionEditCheck($a=null, $b=null)
    {
	$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
	$model = new ManageEmployeeModel();
		$data=array();
		$data['pid']=cleanMe($a);
		$data['eid']=cleanMe($b);
			$positionEditCheck=$model->positionEditCheck($data);
			 
			echo $positionEditCheck;
		 
	
	}
	}
	public static function addQloudEmployee($a=null, $b=null)
    {
		
            $path         = "../../../../";
			$model = new ManageEmployeeModel();
		 
			 $data=array();
		//	print_r($_POST); die;
			require_once('../configs/testMandril.php');
			 $checkSubscription=$model->addQloudEmployee($data);
			 
			echo $checkSubscription;
		
	
	
	}
	
	
	
	
	public static function updateQloudData()
    {
		
	$model = new ManageEmployeeModel();
		//print_r($_POST)."update"; die;
			$updateQloudData=$model->updateQloudData();
			 
			echo $updateQloudData; //die;
		 
	
	
	}
	
	
	public static function addNewEmployee($a=null, $b=null)
    {
			$valueNew = checkLogin();
			if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/Login");
        } else {
            $path         = "../../../../";
	$model = new ManageEmployeeModel();
		 
			 $data=array();
			 $data['cid']=cleanMe($a);
			 $data['user_id']=$_SESSION['user_id'];
			require_once('../testMandril.php');
			 $checkSubscription=$model->addNewEmployee($data);
			 
			header("location:../magazineAccount/".$data['cid']);
		}
	
	}
	
	public static function jobFamily($a=null, $b=null)
    {
	$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
	$model = new ManageEmployeeModel();
		 
			 $data=array();
			 	$data['jid']=cleanMe($a);
			require_once('../testMandril.php');
			 $result=$model->jobFamily($data);
			 
			echo $result; die;
		}
	
	}
	public static function jobFunction($a=null, $b=null)
    {
	$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
	$model = new ManageEmployeeModel();
		 
			 $data=array();
			 $data['jid']=cleanMe($a);
			require_once('../testMandril.php');
			 $result=$model->jobFunction($data);
			
			echo $result; die;
		 
		}
	}
	
	
	
	public static function moreApprovedEmployees($a=null)
    {
			$valueNew = checkLogin();
			if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/Login");
        } else {
            $path         = "../../../../";
			$model = new ManageEmployeeModel();
		 
			 $data=array();
			 $data['cid']=cleanMe($a);
			 $data['user_id']=$_SESSION['user_id'];
			
			 $moreApprovedEmployees=$model->moreApprovedEmployees($data);
			 
			echo $moreApprovedEmployees; die;
		}
	
	}
    
   
}
?>