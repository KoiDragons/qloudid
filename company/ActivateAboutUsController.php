<?php
require_once 'ActivateAboutUsModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class ActivateAboutUsController
{
    
    
  
	
	 public static function websiteInfo($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			 $model1       = new ActivateAboutUsModel();
            $aboutUsInfo    = $model1->aboutUsInfo($data);
			require_once('ActivateAboutUsView.php');
	}
	}
	
	
	public static function createAboutUs($a = null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
			
			 header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
        } else {
        $data = array();
		$data['user_id']=$_SESSION['user_id'];
		$data['cid']=cleanMe($a);
        $model = new ActivateAboutUsModel();
		$createAboutUs    = $model->createAboutUs($data);
		header("location:../websiteInfo/".$data['cid']);
        }
    }

}
?>