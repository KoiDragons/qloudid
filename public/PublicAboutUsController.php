<?php
require_once 'PublicAboutUsModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');

class PublicAboutUsController
{
    
    
    public static function index()
    {
		$path = "../../";
    require_once('PublicAboutUsView.php');
	
	}
	
	public static function companyAccount($a=null)
		{
			
            $path         = "../../../../";
			$data=array();
			
			$data['cid']=cleanMe($a);
			
			$model = new PublicAboutUsModel();
			$company=$model->userSummary($data);
			
			$companyDetail    = $model->companyDetail($data);
			$companyAboutus=$model->companyAboutus($data);
			$aboutUsCount=$model->aboutUsCount($data);
			$aboutUsWeblink=$model->aboutUsWeblink($data);
			$verificationId    = $model->verificationId($data);
			$companyContentDisplay= $model->companyContentDisplay($data);
			require_once('PublicAboutUsView.php');
			
		}
	
public static function footerDetail($a=null, $b=null)
		{
			 
				$data=array();
				
				$data['cid']=cleanMe($a);
				 
				$model = new PublicAboutUsModel();
				
				$footerDetail=$model->footerDetail($data);
				
				echo $footerDetail;
				
			 
		}
}
?>