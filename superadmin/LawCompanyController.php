<?php
require_once 'LawCompanyModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class LawCompanyController
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
		$model = new LawCompanyModel();
		
		
		$adminSummary = $model->adminSummary();
		
		$developerDetail = $model->developerDetail();
		$developerCount = $model->developerCount();
		 
		require_once('LawCompanyView.php');
    }
	
	}
	 public function approvedDeveloper()
    {
		$path  = "../../../../../../";
		$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:../LoginAdmin");
        }
		else { 
		$path="../../../";
		$model = new LawCompanyModel();
		
		
		$adminSummary = $model->adminSummary();
		
		$developerDetail = $model->developerDetailApproved();
		$developerCount = $model->developerCountApproved();
		 
		require_once('LawCompanyApprovedView.php');
    }
	
	}
	
	 public function rejectedDeveloper()
    {
		$path  = "../../../../../../";
		$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:../LoginAdmin");
        }
		else { 
		$path="../../../";
		$model = new LawCompanyModel();
		
		
		$adminSummary = $model->adminSummary();
		
		$developerDetail = $model->developerDetailRejected();
		$developerCount = $model->developerCountRejected();
		 
		require_once('LawCompanyRejectedView.php');
    }
	
	}
	 
	
	public function moreLawCompany()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new LawCompanyModel();
		$moreLawCompany = $model->moreLawCompany();
		echo $moreLawCompany; die;
		}
	}
	public function moreLawCompanyApproved()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new LawCompanyModel();
		$moreLawCompanyApproved = $model->moreLawCompanyApproved();
		echo $moreLawCompanyApproved; die;
		}
	}
	public function moreLawCompanyRejected()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new LawCompanyModel();
		$moreLawCompanyRejected = $model->moreLawCompanyRejected();
		echo $moreLawCompanyRejected; die;
		}
	}
	public function approveDeveloper($a=null)
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:../../LoginAdmin");
        }
		else { 
		$data=array();
		$data['pid']=cleanMe($a);
		require_once('../configs/testMandril.php');
		$model = new LawCompanyModel();
		$approveDeveloper = $model->approveDeveloper($data);
		header('location:../../LawCompany');
		}
	}
	
	public function rejectDeveloper($a=null)
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:../../LoginAdmin");
        }
		else { 
		$data=array();
		$data['pid']=cleanMe($a);
		require_once('../configs/testMandril.php');
		
		$model = new LawCompanyModel();
		$rejectDeveloper = $model->rejectDeveloper($data);
		header('location:../../LawCompany');
		}
	}
}
?>