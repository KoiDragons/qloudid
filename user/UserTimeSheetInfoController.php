<?php
require_once 'UserTimeSheetInfoModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class UserTimeSheetInfoController
{
    
    
    public static function taskInformation()
    {
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount/loginapp");
				} else {
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				require_once('UserTimeSheetInfoView.php');
				}
	}
	
	
	public static function taskListing()
    {
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount/loginapp");
				} else {
				$path         = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new UserTimeSheetInfoModel();
				$listTimesheet    = $model->listTimesheet($data);
				require_once('UserTimeSheetListView.php');
				}
	}
	
	public static function getAvailableApps()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/loginapp"; </script>'; die;
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new UserTimeSheetInfoModel();
				$getAvailableApps    = $model->getAvailableApps($data);
				echo $getAvailableApps; die;
			}
		}
		
	public static function addTaskInformation()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount/loginapp");
				} else {
				$model = new UserTimeSheetInfoModel();
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$addTaskInformation = $model->addTaskInformation($data);
				header("location:taskListing");
			}
			
		}
}
?>