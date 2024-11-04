<?php
require_once 'CompanySearchResultModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class CompanySearchResultController
{
    
    
    public function index()
    {
		
		$valueNew = checkadmin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:LoginAadmin");
        } else {
			$path = "../../";
		$model = new CompanySearchResultModel();
		if(isset($_POST['message']))
		{
		$companyListSearch = $model->companyListSearch();
		
		$companyListSearch=str_ireplace($_POST['message'],"<span class='bold dblue_txt'>".$_POST['message']."</span>",$companyListSearch);
		$companyListSearchCount = $model->companyListSearchCount();
		//print_r($companyListSearch); die;
		}
		$data=array();
		$data['user_id']=$_SESSION['user_id'];
		$row_summary    = $model->userSummary($data);
    require_once('CompanySearchResultView.php');
		}
	}
	
	
	public function companyListNew()
    {
		$valueNew = checkadmin();
        if ($valueNew == 0) {
            $path = "../../";
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        } else {
		
			$model = new CompanySearchResultModel();
		
		$companyListSearch = $model->companyListNew();
		$companyListSearch=str_ireplace($_POST['message'],"<span class='bold dblue_txt'>".$_POST['message']."</span>",$companyListSearch);
		echo $companyListSearch; die;
		}
	}

}
?>