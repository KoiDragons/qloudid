<?php
require_once 'ApplicationStatusModel.php';
require_once '../configs/utility.php';
class ApplicationStatusController
{
    
    
    public static function index()
    {
        $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
        } else {
            $path         = "../../";
			 $model = new ApplicationStatusModel();
                $data['user_id']=$_SESSION['user_id'];
			$resultDisconnect = $model->selectDisconnect($data); 

			 $row_summary = $model->userSummary($data);	

			$resultLatestJob = $model->selectLatestJob($data); 
			$resultLatestJobCount = $model->selectLatestJobCount($data); 

			$resultScreening = $model->selectScreening($data); 
			//print_r($resultScreening); die;
			$resultScreeningCount = $model->selectScreeningCount($data); 

			$resultPhone = $model->selectPhone($data); 
			//print_r($resultScreening); die;
			$resultPhoneCount = $model->selectPhoneCount($data); 

			$resultFace = $model->selectFace($data); 
			//print_r($resultScreening); die;
			$resultFaceCount = $model->selectFaceCount($data); 

			$resultOffered = $model->selectOffered($data); 
			//print_r($resultScreening); die;
			$resultOfferedCount = $model->selectOfferedCount($data); 

			$resultHired = $model->selectHired($data); 
			//print_r($resultScreening); die;
			$resultHiredCount = $model->selectHiredCount($data); 

			
            require_once('ApplicationStatusView.php');
        }
    }
    
    
    public static function availabilityAccept($a = null, $b=null)
    {
	$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../../../";
            header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
        } else {
          $model = new ApplicationStatusModel();
				$data=array();
				//session_start();
			$data['user_id']=$_SESSION['user_id'];
				$data['jid']=cleanMe($a);
				$data['status']=cleanMe($b);
				require_once('../testMandril.php');
                $resultl = $model->availabilityAccept($data);
		
			 
                header("location:https://www.qmatchup.com/beta/user/index.php/Availability");
         
        }
        
	}
		
		
    }
    
  

?>