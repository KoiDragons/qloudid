<?php
require_once 'PublicLanguageVerifyModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class PublicLanguageVerifyController
{
    
    
	 public static function changeLanguage()
		{
				$model = new PublicLanguageVerifyModel();
				$changeLanguage = $model->changeLanguage();	
				echo $changeLanguage; die;	
		}
		
		public static function verifyLanguage($a=null)
		{
				$model = new PublicLanguageVerifyModel();
				$verifyLanguage = $model->verifyLanguage();
				return $verifyLanguage;
			
		}
		
}
?>