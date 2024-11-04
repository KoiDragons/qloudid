<?php
require_once 'UnregisteredForloratOchUpphittatModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class UnregisteredForloratOchUpphittatController
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
		$model = new UnregisteredForloratOchUpphittatModel();
		

		$foundandLostDetail = $model->foundandLostDetail();
		$foundandLostCount = $model->foundandLostCount();
		
		
		
		  require_once('UnregisteredForloratOchUpphittatView.php');
    }
	
	}
	
	
	public function moreFoundandLostDetail()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
              echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new UnregisteredForloratOchUpphittatModel();
		$moreFoundandLostDetail = $model->moreFoundandLostDetail();
		echo $moreFoundandLostDetail; die;
		}
	}

}
?>