<?php
require_once 'PublicSearchResultModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class PublicSearchResultController
{
    
    
    public static function index()
    {
		
			$path = "../../";
		if(isset($_POST['message']))
		{
			
		$model = new PublicSearchResultModel();
		
		$companyListSearch = $model->companyListSearch();
		
		$companyListSearch=str_ireplace($_POST['message'],"<span class='bold dblue_txt'>".$_POST['message']."</span>",$companyListSearch);
		$companyListSearchCount = $model->companyListSearchCount();
		//print_r($companyListSearch); die;
		}
    require_once('PublicSearchResultView.php');
	
	}
	
	
	public static function companyListNew()
    {
		
		
			$model = new PublicSearchResultModel();
		
		$companyListSearch = $model->companyListNew();
		$companyListSearch=str_ireplace($_POST['message'],"<span class='bold dblue_txt'>".$_POST['message']."</span>",$companyListSearch);
		echo $companyListSearch; die;
	
	}

}
?>