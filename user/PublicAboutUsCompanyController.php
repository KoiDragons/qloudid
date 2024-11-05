<?php
	require_once 'PublicAboutUsCompanyModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class PublicAboutUsCompanyController
	{
		
		
		public static function index()
		{
			$path = "../../";
			require_once('PublicAboutUsCompanyView.php');
			
		}
		
		public static function companyDetail($a=null)
		{
			$valueNew = checkLogin();
			
			$path = "../../../../";
			$data=array();
			
			$data['cid']=cleanMe($a);
			$model       = new PublicAboutUsCompanyModel();
			$companyWebsite    = $model->companyWebsite($data);
			
				require_once('PublicAboutUsCompanyView.php');
				
			
		}
		
		
	}
?>