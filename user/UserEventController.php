<?php
require_once 'UserEventModel.php';
require_once '../configs/utility.php';
class UserEventController
{
    
    
    public static function index()
    {
        $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
        } else {
            $path         = "../../";
            $model1       = new UserEventModel();
        
            
            require_once('UserEventView.php');
        }
    }
	 public static function changePassword($a = null, $b = null, $c = null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
			
			header("location: LoginAccount");
        } else {
        $data = array();
		$data['user_id']=$_SESSION['user_id'];
        $model = new UserEventModel();
		$ChangePassword    = $model->changePassword($data);
		header("location:userAccount");
        }
    }
	
	public static function checkPassword($a = null, $b = null, $c = null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
			
			echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
        $data = array();
		$data['user_id']=$_SESSION['user_id'];
		$data['cpass']=md5(cleanMe($a));
        $model = new UserEventModel();
		$checkPassword    = $model->checkPassword($data);
		echo $checkPassword; die;
        }
    }

	
	 public static function connectCompany($a = null, $b = null, $c = null)
    {
        $valueNew = checkLogin();
        if ($valueNew == 0) {
           
            echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
        $model = new UserEventModel();
        
            $data = array();
			
        $data['name']     = cleanMe($a);
		
        
            $resultPass = $model->connectCompany($data);
			 $resultPassCount = $model->connectCompanyCount($data);
            echo $resultPass."/".$resultPassCount; 
		}
        }
    
    public static function connectAccount($a = null, $b = null, $c = null)
    {
          $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
        } else {
        $model = new UserEventModel();
        
            $data = array();
			$data['user_id']=$_SESSION['user_id'];
        $data['cname']     = cleanMe($_POST['cname']);
		 
        require_once('../testMandril.php');
            $resultPass = $model->connectAccount($data);
            header("location:../UserEvent/userAccount");
        }
        
	}
	
      public static function userAccount($co = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
        } else {
			
			if(isset($_SESSION['rememberme_qid'])){
				
		setcookie('rememberme_qid', $_SESSION['rememberme_qid'], time()+ (30*60*60*24), '/');
				}
				//print_r($_SESSION); die;
            $path         = "../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			//print_r($data); die;
            $model1       = new UserEventModel();
			$event    = $model1->userEvents($data);
            $resultOrg    = $model1->userAccount($data);
			
			$resultOrg1    = $model1->employeeAccount($data);
			$row_summary    = $model1->userSummary($data);
			
			$detail    = $model1->connectAccountDetail($data);
			
			
            require_once('UserEventView.php');
        }
       
    }
	
	 public static function moreEvents($co = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
			$data=array();
			
			$data['user_id']=$_SESSION['user_id'];
			$data['id']=$_POST['id'];
			
            $model1       = new UserEventModel();
           
			$result    = $model1->moreEvents($data);
           echo $result; die;
        }
	}
	
	public static function updateImage($co = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
        } else {
			$data=array();
			
			$data['user_id']=$_SESSION['user_id'];
			
            $model1       = new UserEventModel();
           
			$result    = $model1->updateImage($data);
           header("location:../UserEvent/userAccount");
        }
	}
	
	
	
	
	
	
	
	
	
	
	
	
	    public static function updateAddress($co = null)
    {
           $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
			$data=array();
			
			$data['user_id']=$_POST['user_id'];
			$data['cid']=$_POST['cid'];
			
            $model1       = new UserEventModel();
           
			$result    = $model1->updateAddress($data);
           echo $result; die;
        }
    }
	  public static function updateDate($co = null)
    {
           $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
			$data=array();
			
			$data['user_id']=$_POST['user_id'];
			$data['cid']=$_POST['cid'];
			
            $model1       = new UserEventModel();
           
			$result    = $model1->updateDate($data);
           echo $result; die;
        }
    }
	public static function updateSex($co = null)
    {
           $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
			$data=array();
			
			$data['user_id']=$_POST['user_id'];
			if($_POST['cid']=="M")
			{
				$data['cid']=1;
			}
			else if($_POST['cid']=="F")
			{
				$data['cid']=2;
			}
			else if($_POST['cid']=="T")
			{
				$data['cid']=3;
			}
			
			
            $model1       = new UserEventModel();
           
			$result    = $model1->updateSex($data);
           echo $result; die;
        }
    }
}


?>