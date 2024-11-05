<?php
require_once 'LoginAccountModel.php';
require_once '../configs/utility.php';
class CheckLoginController
{
    
    
    public static function index()
    {

        $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
			
			
        } else {
			
            header("location:../../profile-user-cv.php");
        }
    }
    
    
    public static function loginAccount($a = null, $b = null, $c = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            echo 0;
			
			
        } else {
			
           echo 1;
        }
       
    }
	
	
	 public static function checkCredentials($a = null, $b = null, $c = null)
    {
		//print_r($_REQUEST); die;

         if(isset($_GET['email']) && isset($_GET['password']))
		{
			$model = new LoginAccountModel();
			$data = array();
			
		$data['email']    = cleanMe($_GET['email']);
        $data['password'] = md5($_GET['password']);
        
        $result = $model->checkCredentials($data);
			//echo $result; die;
			if($result['result'] == 0 )
			{
				echo 0; 
			}
			else if($result['result'] == 1)
			{
				
				echo 1;
//die;
			}
			exit();
			
		}
    }
	
	 public static function checkCredentialsLogin($a = null, $b = null, $c = null)
    {
    	
		 //$valueNew = checkLogin();
		// echo $valueNew; die;
		 if(isset($_GET['url']) && isset($_GET['logindetail']))
		{
			$model = new LoginAccountModel();
			$data = array();
			
		$data['logindetail']    = urlencode(cleanMe($_GET['logindetail']));
		$data['logindetail'] = str_replace("EQUAL", "=", $data['logindetail']);
		$data['ntimestamp']=cleanMe($_GET['stamp_time']);
       	
	//echo $_GET['url']; 
        $result = $model->checkCredentialsLogin($data);
			//print_r($result); die;
			if($result['id'] == 0 )
			{
				header("location:https://www.qmatchup.com/beta/user/index.php/CheckLogin/checkCredentialsLoginFinal/?url=".$_GET['url']."&logindetail=".$data['logindetail']."&ntimestamp=".$_GET['stamp_time']."&nlogin=no");
					
			}
			else if($result['id'] == 1)
			{
				header("location:https://www.qmatchup.com/beta/user/index.php/CheckLogin/checkCredentialsLoginFinal/?url=".$_GET['url']."&logindetail=".$data['logindetail']."&ntimestamp=".$_GET['stamp_time']."&nlogin=yes");
				
			}
		//	die;
			
		
    }
    }
    
}


?>