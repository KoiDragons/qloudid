<?php
require_once 'ActivationModel.php';
require_once '../configs/utility.php';
class ActivationController
{
    
    
    public static function index()
    {
		$path="../../";
		 $model = new ActivationModel();
		$verifyLanguage=$model->verifyLanguage();
        require_once('ActivationView.php');
    }
    
    
    public static function activateAccount($a = null, $b = null, $c = null)
    {
        
        $model = new ActivationModel();
        if (isset($a) && isset($b))
            $data = array();
        $data['email'] = cleanMe($a);
       
        $data['hash']  = cleanMe($b);
        
       $path='../../../../../';
        $result = $model->activateAccount($data);
     
        if ($result == 1) {
            $value = $model->updateAccount($data);
           
           
			if($value==1)
			{
            header("location:../../../Activation");
			}
			else if($value==2)
			{
			require_once('../configs/testMandril.php');
            $resultCreate = $model->sendActivationEmail($data);
            header("location:../../../GetStartedNew");
			}
        } else if ($result == 0) {
            require_once('ActivationErrorView.php');
        }
        
    }
	
	
	 public static function activateUser($a = null, $b = null, $c = null)
    {
        
        $model = new ActivationModel();
        if (isset($a) && isset($b))
            $data = array();
        $data['email'] = cleanMe($a);
       
        $data['hash']  = cleanMe($b);
        
        $path='../../../../../';
        $result = $model->activateAccount($data);
     
        if ($result == 1) {
            $value = $model->updateAccount($data);
            if($value==2)
			{
			require_once('../configs/testMandril.php');
            $resultCreate = $model->sendActivationEmail($data);
            header("location:../../../StoreData/updateSignUpPhoneDetail");
			}
        } else if ($result == 0) {
            require_once('ActivationErrorView.php');
        }
        
    }
	
	
	public static function restoreUserAccount($a = null, $b = null, $c = null)
    {
        
        $model = new ActivationModel();
        if (isset($a) && isset($b))
            $data = array();
        $data['email'] = cleanMe($a);
       
        $data['hash']  = cleanMe($b);
         $path='../../../../../';
       
        $result = $model->activateAccount($data);
     
        if ($result == 1) {
            $value = $model->restoreInfo($data);
            if($value==1)
			{
			header("location:../../../StoreData/updateSignUpPhoneDetail"); die;
			}
			 else if($value==2)
			{
			header("location:../../../StoreData/Identificator"); die;
			}
			else if($value==3)
			{
			header("location:../../../StoreData/getCertificate"); die;
			}
        } else if ($result == 0) {
            require_once('ActivationErrorView.php');
        }
        
    }
    
	 public static function activateVolunteer($a = null)
    {
        
        $model = new ActivationModel();
         
            $data = array();
			$data['rid']=cleanMe($a);
       require_once('../configs/testMandril.php');
        $result = $model->activateVolunteer($data);
		
		 if($result==1)
		 {
        header('location:../../ReceivedRequest');
		 }
		 else
		 {
			  header('location:../../StoreData/addPhoneNumber');
		 }
        
    }
    
	
}


?>