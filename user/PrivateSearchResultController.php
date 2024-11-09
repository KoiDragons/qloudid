<?php
require_once 'PrivateSearchResultModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class PrivateSearchResultController
{
    
    
    public static function index()
    {
		
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:LoginAccount");
        } else {
			$path = "../../";
		$model = new PrivateSearchResultModel();
		$data=array();
		$data['user_id']=$_SESSION['user_id'];
		if(isset($_POST['message']))
		{
		$companyListSearch = $model->companyListSearch();
		$companyListSearchCount = $model->companyListSearchCount();
		$countryDetail    = $model->countryDetail($data);
		}
		
		$row_summary    = $model->userSummary($data);
		
    require_once('PrivateSearchResultView.php');
		}
	}
	
	
	public static function companyListNew()
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
		
			$model = new PrivateSearchResultModel();
		
		$companyListSearch = $model->companyListNew();
		echo $companyListSearch; die;
		}
	}
	public static function companyListCountry()
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
		
			$model = new PrivateSearchResultModel();
		
		$companyListSearch = $model->companyListCountry();
		echo $companyListSearch; die;
		}
	}
}
?>