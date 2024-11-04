<?php

require_once '../configs/utility.php';
require_once 'CreateAccountController.php';
class ConfirmEmailController
{
    
    
    public static function index()
    {
        
       
            $path         = "../../";
            $model = new CreateAccountModel();
			$verifyLanguage=$model->verifyLanguage();
            require_once('ConfirmEmailView.php');
        
    }
    
    public static function changeLanguage()
		{
				$model = new CreateAccountModel();
				$changeLanguage = $model->changeLanguage();	
				echo $changeLanguage; die;	
		}
    
}


?>