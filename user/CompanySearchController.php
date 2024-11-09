<?php
require_once 'CompanySearchModel.php';

require_once '../configs/utility.php';
require_once('../AppModel.php');
class CompanySearchController
{
    public static function index()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				
				$model = new CompanySearchModel();
				if(isset($_POST['message']))
				{
				$companyListSearch = $model->companyListSearch($data);
				$companyListSearchCount = $model->companyListSearchCount($data);
				
				}
				$row_summary    = $model->userSummary($data);
				require_once('CompanySearchView.php');
			}
		}
    
  
	
	
	public static function companyListNew()
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
		
			$model = new CompanySearchModel();
		$data=array();
				$data['user_id']=$_SESSION['user_id'];
				
		$companyListSearch = $model->companyListNew($data);
		echo $companyListSearch; die;
		}
	}
	
	
	
}
?>