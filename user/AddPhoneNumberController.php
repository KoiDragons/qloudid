<?php
require_once 'AddPhoneNumberModel.php';
require_once '../configs/utility.php';
	require_once('../AppModel.php');
class AddPhoneNumberController
{
    
    
    public static function index()
    {
        //$valueNew = checkLogin();
		if(isset($_SESSION['rememberme']))
		{
		setcookie('rememberme', $_SESSION['rememberme'], time()+ (30*60*60*24), '/', "safeqloud.com");
		}
        else if (checkLogin() == 0) {
           
            header("location:LoginAccount");
        } else {
			$path="../../";
			 $model = new AddPhoneNumberModel();
			 $data = array();
			$data['user_id']=$_SESSION['user_id'];
			 $result = $model->GetStartedUser($data);
			 $resultContry = $model->selectCountry();
			 $phoneAccount = $model->phoneAccount($data);
			 
				if($phoneAccount['phone_number']==null || $phoneAccount['phone_number']=='')
				{
				require_once('AddPhoneNumberView.php');
				}
			else 
			{
		header("location:StoreData/userAccount");
			}
		}
		
    }
     public static function checkUserAvailability()
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
            $model1       = new AddPhoneNumberModel();
           
			$result    = $model1->checkUserAvailability($data);
           echo $result; die;
        }
	}
	
	
     
		
		public static function updateUserProfile()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:/../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				$model = new AddPhoneNumberModel();
				$data['user_id']=$_SESSION['user_id'];
				$rowsummary = $model->updateUserProfile($data);	
				
				header('location:../UpdateResidence');
				
			}
			
		}
		
		public static function verifyUserDetail()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../";
				
				$model = new AddPhoneNumberModel();
				
				require_once('../configs/smsMandril.php');
				$verifyUserDetail = $model->verifyUserDetail();	
				
				echo $verifyUserDetail; die;
			}
			
		}
		
		
		public static function verifyOtp()
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$path         = "../../../../";
				
				$model = new AddPhoneNumberModel();
				$verifyOtp = $model->verifyOtp();	
				
				echo $verifyOtp; die;
			}
			
		}
		
}


?>