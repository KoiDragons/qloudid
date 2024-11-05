<?php
require_once 'GotInvitationModel.php';
require_once '../configs/utility.php';
	require_once('../AppModel.php');
class GotInvitationController
{
    
    
    public static function index()
    {
        //$valueNew = checkLogin();
		if(isset($_SESSION['rememberme']))
		{
		setcookie('rememberme', $_SESSION['rememberme'], time()+ (30*60*60*24), '/', "qloudid.com");
		}
        else if (checkLogin() == 0) {
           
            header("location:LoginAccount");
        } else {
			$path="../../";
			 $model = new GotInvitationModel();
			 $data = array();
			$data['user_id']=$_SESSION['user_id'];
			 $result = $model->GetStartedUser($data);
			 if(isset($_GET['requestUpdate']))
			 {
				$data['req']=1; 
				 }
				 else
				 {
					 $data['req']=0; 
					 }
			require_once('GotInvitationView.php');
		}
		
    }
    
     public static function connectInfo()
    {
        //$valueNew = checkLogin();
		if(isset($_SESSION['rememberme']))
		{
		setcookie('rememberme', $_SESSION['rememberme'], time()+ (30*60*60*24), '/', "qloudid.com");
		}
        else if (checkLogin() == 0) {
           
            header("location:LoginAccount");
        } else {
			$path="../../../";
			 $model = new GotInvitationModel();
			 $data = array();
			$data['user_id']=$_SESSION['user_id'];
			 
			require_once('GotConnectInvitationView.php');
		}
		
    }
    
		public static function updateEmployeeDetail($a = null , $b=null ,$c=null, $d=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				//print_r($_POST); die;
				$model = new GotInvitationModel();
				$data['user_id']=$_SESSION['user_id'];
				$result = $model->updateEmployeeDetail($data);	
				if($result==1)
				{
					header('location:../PersonalRequests/sentRequests');
				
			}
			else
			{
				header('location:../GotInvitation?requestUpdate=failed');
				}
		}
		}
		public static function updateKinInfo()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				header("location:../LoginAccount");
				} else {
				 
				$data=array();
				 
				$model = new GotInvitationModel();
				$data['user_id']=$_SESSION['user_id'];
				$result = $model->updateKinInfo($data);	
				header('location:../ConnectKin/connectAccount');
			}
		
			}

}
?>