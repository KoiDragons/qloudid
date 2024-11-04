<?php
require_once 'ManageAppsLocationModel.php';
require_once 'EmployeeCheckController.php';
require_once '../configs/utility.php';
class ManageAppsLocationController
{
    public static function appsLocationInfo($a = null)
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
			$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
			
            $model1       = new ManageAppsLocationModel();
			$updateAdmin    = $model1->updateAdmin($data);
			$checkPermission    = $model1->checkPermission($data);
			 
			if($checkPermission ==0)
			{
			header("location:https://www.qloudid.com/user/index.php/NewsfeedDetail");
			}
			
			$appsAssignedLocation    = $model1->appsAssignedLocation($data);
			
            require_once('ManageAppsLocationView.php');
        }
       
    }
	
	 public static function assignApps($a = null)
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
			$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
			
            $model1       = new ManageAppsLocationModel();
			$updateAdmin    = $model1->updateAdmin($data);
			$checkPermission    = $model1->checkPermission($data);
				
			if($checkPermission ==0)
			{
			header("location:https://www.qloudid.com/user/index.php/NewsfeedDetail");
			}
			
			$downloadedApps    = $model1->downloadedApps($data);
			
            require_once('ManageAppsLocationDetailView.php');
        }
       
    }
	
	 public static function editAssignedApps($a = null, $b= null)
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
			$data['aid']=cleanMe($b);
			$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
			
            $model1       = new ManageAppsLocationModel();
			$updateAdmin    = $model1->updateAdmin($data);
			$checkPermission    = $model1->checkPermission($data);
				
			if($checkPermission ==0)
			{
			header("location:https://www.qloudid.com/user/index.php/NewsfeedDetail");
			}
			$locationAll    = $model1->locationAll($data);
			$assignedAppInfo    = $model1->assignedAppInfo($data);
			$downloadedApps    = $model1->downloadedApps($data);
            require_once('ManageAppsLocationDetailEditView.php');
        }
       
    }
	
	public static function locationInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new ManageAppsLocationModel();
				$locationInfo = $model->locationInfo($data);
				echo $locationInfo; die;
			}
		}
	
	public static function updateLocationInfo($a = null)
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
				 
				$model = new ManageAppsLocationModel();
				
				$updateLocationInfo = $model->updateLocationInfo($data);
				
				header("location: ../appsLocationInfo/".$data['cid']);
			}
			
		}
		
		public static function updateLocationInfoData($a = null, $b=null)
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
				$data['aid']=cleanMe($b); 
				$model = new ManageAppsLocationModel();
				
				$updateLocationInfo = $model->updateLocationInfoData($data);
				
				header("location: ../../appsLocationInfo/".$data['cid']);
			}
			
		}
}


?>