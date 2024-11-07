<?php
	require_once 'PublicDaycareSelectModel.php';
	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class PublicDaycareSelectController
	{
		
	
		
		public static function daycareAction($a=null)
		{
				$path = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$model1       = new PublicDaycareSelectModel();
				$companyDetail    = $model1->companyDetail($data);
				$corporateColor    = $model1->corporateColor($data);
				$verifyLanguage=$model1->verifyLanguage();
				$verifyIP    = $model1->verifyIP($data);
				$checkOpenStatus    = $model1->checkOpenStatus($data);
				 
				if($checkOpenStatus==0)
				{
				header('location:https://safeqloud-228cbc38a2be.herokuapp.com/company/index.php/Company/openDay/'.$data['cid']);	 die;
				}
				else 
				{
			if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else
			{
				require_once('PublicDaycareSelectView.php');
			}
				}
		}
		
		public static function changeLanguage()
		{
				$model = new PublicDaycareSelectModel();
				$changeLanguage = $model->changeLanguage();	
				echo $changeLanguage; die;	
		}
		
	}
?>