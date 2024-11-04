<?php
require_once 'ActivationModel.php';
require_once 'BusinessEventController.php';
require_once '../configs/utility.php';
class ActivationController
{
    
    
    public static function index()
    {
        require_once('ActivationView.php');
    }
    
    
    public static function activateAccount($a = null, $b = null, $c = null)
    {
        $path="../../../../../";
        $model = new ActivationModel();
        if (isset($a) && isset($b))
            $data = array();
        $data['email'] = cleanMe($a);
       
        $data['hash']  = cleanMe($b);
          // print_r($data); die;  
        $result = $model->activateAccount($data);
     //echo $result; die;
        if ($result == 0) {
            require_once('ActivationErrorView.php');
        }
        else 
		 {
            
			$data['id']=$result;
			 $result = $model->checkVerify($data);
			// echo $result; die;
			 if($result==1)
			 {
				require_once('ActivationView.php'); 
			 }
			 else
			 {
			$model1 = new BusinessEventController();
			$value=array();
			$value= $model1->onCompanyActivate($data);
			
			$output1=$model->executeTransaction($value);
			if($output1==1)
			{
				//echo $output1; die;
				$value = $model->updateAccount($data);
				require_once('../configs/testMandril.php');
				$resultCreate = $model->sendActivationEmail($data);
			
				require_once('ActivationView.php');
			}
			else
			{
				require_once('ActivationErrorView.php');
			}
			 }
			
           
        } 
    }
    
}


?>