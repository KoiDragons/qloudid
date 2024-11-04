<?php
require_once 'PublicCareerDetailModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class PublicCareerDetailController
{
    
    
    public static function index()
    {
		$path = "../../";
    require_once('PublicCareerDetailView.php');
	
	}
	
	public static function careerAccount($a=null)
		{
			
            $path         = "../../../../";
			$data=array();
			
			$data['cid']=cleanMe($a);
			
			$model = new PublicCareerDetailModel();
			$company=$model->userSummary($data);
			
			$companyAboutus=$model->companyAboutus($data);
			$companyContentDisplay= $model->companyContentDisplay($data);
			$aboutUsWeblink=$model->aboutUsWeblink($data);
			require_once('PublicCareerDetailView.php');
			
		}
	
	

}
?>