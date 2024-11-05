<?php
require_once 'SendRequestModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class SendRequestController
{
    
    
    public static function index()
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../user/index.php/Login");
        } else {
		$path  = "../../../../";
        require_once('SendRequestView.php');
		}
    }
     public static function sendRequestCompany($a = null, $b=null, $c=null)
    {
        $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/Login");
        } else {
        $model = new SendRequestModel();
		
        if (isset($a))
		{
			
            $data = array();
        $data['vid'] = cleanMe($a);
        $data['user_id']  = $_SESSION['user_id'];
        $model = new SendRequestModel();
               
        $row = $model->sendRequestSelectCompany($data);
		$row1 = $model->sendRequestOrg($data);
		    $path   = "../../../../";
            require_once('SendRequestView.php');
        }
	} 
    }
	
	
	public static function sendRequestNew($a = null, $b=null, $c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/Login");
        } else {
        $data = array();
        $data['user_id']  = $_SESSION['user_id'];
        $model = new SendRequestModel();
        
		
			$path   = "../../../../";
			$data['company_id']=cleanMe($a);
			require_once('../configs/testMandril.php');
			$result1=$model->sendRequestNew($data);
			
			require_once('EmailActivationView.php');
		}
		
    }
    
    
}


?>