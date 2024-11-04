<?php
require_once 'FooterInformationModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class FooterInformationController
{
    
    
  
	
	 public static function completeInfo($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.qloudid.com/user/index.php/LoginAccount");
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			 $model1       = new FooterInformationModel();
            $footerStart    = $model1->footerStart($data);
			 $countryOption    = $model1->countryOption($data);
			require_once('FooterInformationView.php');
	}
	}
	
	
	public static function updateInfo($a = null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
			
			 header("location:https://www.qloudid.com/user/index.php/LoginAccount");
        } else {
        $data = array();
		$data['user_id']=$_SESSION['user_id'];
		$data['cid']=cleanMe($a);
		//echo '<pre>'; print_r($_POST);  echo '</pre>'; die;
        $model = new FooterInformationModel();
		$updateInfo    = $model->updateInfo($data);
		header("location:../completeInfo/".$data['cid']);
        }
    }

}
?>