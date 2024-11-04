<?php
require_once 'VirtualCompanyListModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class VirtualCompanyListController
{
    
    
    public function index()
    {
		$path  = "../../../../../";
		$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:LoginAdmin");
        }
		else { 
		$path="../../";
		$model = new VirtualCompanyListModel();
		
		
		$adminSummary = $model->adminSummary();
		
		$companyCount = $model->companyCount();
		$companyDetail = $model->companyDetail();
		
		  require_once('VirtualCompanyListView.php');
    }
	
	}
	
	
	
	public function moreCompanyDetail()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new VirtualCompanyListModel();
		$moreUserDetail = $model->moreCompanyDetail();
		echo $moreUserDetail; die;
		}
	}
	

	
	
}
?>