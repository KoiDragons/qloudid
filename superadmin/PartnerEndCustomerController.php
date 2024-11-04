<?php
require_once 'PartnerEndCustomerModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class PartnerEndCustomerController
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
		$model = new PartnerEndCustomerModel();
		
		
		$adminSummary = $model->adminSummary();
		
		$receptionistDetail = $model->receptionistDetail();
		$receptionistCount = $model->receptionistCount();
		
		  require_once('PartnerEndCustomerView.php');
    }
	
	}
	
	
	
	public function morePartnerEndCustomerDetail()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new PartnerEndCustomerModel();
		$moreReceptionistDetail = $model->moreReceptionistDetail();
		echo $moreReceptionistDetail; die;
		}
	}
	
	
	
	
}
?>