<?php
require_once 'AterforsaljareModel.php';
require_once 'EmployeeCheckController.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class AterforsaljareController
{
    
    
    public static function index()
    {
		
	}
	
	 public static function companyAccount($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
        } else {
			$path = "../../../../";
		$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
			$_SESSION['company_id']=cleanMe($a);
			 $model1       = new AterforsaljareModel();
            $resultOrg    = $model1->userAccount($data);
			//$completedEmployeeRequests    = $model1->completedEmployeeRequests($data);
			$resultOrg1    = $model1->employeeAccount($data);
			$appsDetail    = $model1->appsDetail($data);
			$row_summary    = $model1->userSummary($data);
    require_once('AterforsaljareView.php');
	}
	}
	
	public static function getFileName($a=null, $b=null)
	{
			$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
          echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
		
			
			//print_r($_POST); die;
			$data=array();
			
			
		$model = new AterforsaljareModel();
		$getFileName = $model->getFileName();
		echo $getFileName; die;
		}
	}
	
	public static function updateFileName($a=null, $b=null)
	{
		
			$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
          echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
			//print_r($_SESSION); die;
			$data=array();
			
			$data['cid']=cleanMe($a);
		$model = new AterforsaljareModel();
		$getFileName = $model->updateFileName($data);
		echo $getFileName; die;
		}
	}
	
	
	
	 public static function createAterforsaljareAccount($a = null, $b = null, $c = null)
    {
        
     	$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
        } else {
        $model = new AterforsaljareModel();
      
            $data = array();
            $data['cid']=cleanMe($a);
           
            $data['company_name']  = cleanMe($_POST['company_name_add']);
           
            $data['website']       = cleanMe($_POST['company_website']);
          
            $data['created_on']    = date('Y-m-d H:i:s');
            $data['client_secret']   = uniqid($data['company_name']);
            if (!filter_var($data['website'], FILTER_VALIDATE_URL) === false) {
					$result         = $model->createAterforsaljareAccount($data);
					//echo $result; die;
					
							
							header("location:../../Aterforsaljare/companyAccount/".$data['cid']);
						
            
			}
			else
			{
				header("location:../../Aterforsaljare/companyAccount/".$data['cid']);
			}
           
		}  
        }
        public static function deleteImage($a=null, $b=null)
	{
			$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
			
			//print_r($_POST); die;
			$data=array();
			
			
		$model = new AterforsaljareModel();
		$getFileName = $model->deleteImage();
		echo $getFileName; die;
		}
	}
        
    

}
?>