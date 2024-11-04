<?php
	require_once 'CompanyOmOssModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class CompanyOmOssController
	{
		
	
		public static function companyAccount($a=null)
		{
			
				$path = "../../../../";
				$data=array();
				$data['eid']=cleanMe($a);
				$model1       = new CompanyOmOssModel();
				$data['cid']    = $model1->companyInfo($data);
				$companyDetail    = $model1->companyDetail($data);
				$verifyLanguage=$model1->verifyLanguage();
				$companyAboutus    = $model1->companyAboutus($data);
				$aboutUsWeblink    = $model1->aboutUsWeblink($data);
				require_once('CompanyOmOssView.php');
			
		}
		
	public static function changeLanguage()
		{
				$model = new CompanyOmOssModel();
				$changeLanguage = $model->changeLanguage();	
				echo $changeLanguage; die;	
		}
		
	}
?>