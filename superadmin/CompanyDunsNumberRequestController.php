<?php
require_once 'CompanyDunsNumberRequestModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class CompanyDunsNumberRequestController
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
		$model = new CompanyDunsNumberRequestModel();
		
		
		$adminSummary = $model->adminSummary();
		
		$developerDetail = $model->companyDunsNumberRequestDetail();
		$developerCount = $model->companyDunsNumberRequestCount();
		 
		require_once('CompanyDunsNumberRequestView.php');
    }
	
	}
	
	  public function rejectedRequest()
    {
		$path  = "../../../../../../";
		$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:../LoginAdmin");
        }
		else { 
		$path="../../../";
		$model = new CompanyDunsNumberRequestModel();
		
		
		$adminSummary = $model->adminSummary();
		
		$developerDetail = $model->companyDunsNumberRequestDetailRejected();
		$developerCount = $model->companyDunsNumberRequestCountRejected();
		 
		require_once('CompanyDunsNumberRequestRejectedView.php');
    }
	
	}
	 
	 public function moreCompanyDunsNumberRequestApproved()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new CompanyDunsNumberRequestModel();
		$moreDeveloperRequestApproved = $model->moreDeveloperRequestApproved();
		echo $moreDeveloperRequestApproved; die;
		}
	}
	public function moreCompanyDunsNumberRequestRejected()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new CompanyDunsNumberRequestModel();
		$moreDeveloperRequestRejected = $model->moreDeveloperRequestRejected();
		echo $moreDeveloperRequestRejected; die;
		}
	}
 public function approvedRequest()
    {
		$path  = "../../../../../../";
		$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:../LoginAdmin");
        }
		else { 
		$path="../../../";
		$model = new CompanyDunsNumberRequestModel();
		
		
		$adminSummary = $model->adminSummary();
		
		$developerDetail = $model->companyDunsNumberRequestDetailApproved();
		$developerCount = $model->companyDunsNumberRequestCountApproved();
		 
		require_once('CompanyDunsNumberRequestApprovedView.php');
    }
	
	}
	
	public function moreCompanyDunsNumberRequest()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new CompanyDunsNumberRequestModel();
		$moreCompanyDunsNumberRequest = $model->moreCompanyDunsNumberRequest();
		echo $moreCompanyDunsNumberRequest; die;
		}
	}
	
	public function approveCompanyDunsNumberRequest($a=null)
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:../../LoginAdmin");
        }
		else { 
		$data=array();
		$data['pid']=cleanMe($a);
		require_once('../configs/testMandril.php');
		$model = new CompanyDunsNumberRequestModel();
		$approveDeveloper = $model->approveCompanyDunsNumberRequest($data);
		header('location:../../CompanyDunsNumberRequest');
		}
	}
	
	public function rejectCompanyDunsNumberRequest($a=null)
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:../../LoginAdmin");
        }
		else { 
		$data=array();
		$data['pid']=cleanMe($a);
		require_once('../configs/testMandril.php');
		
		$model = new CompanyDunsNumberRequestModel();
		$rejectDeveloper = $model->rejectCompanyDunsNumberRequest($data);
		header('location:../../CompanyDunsNumberRequest');
		}
	}
}
?>