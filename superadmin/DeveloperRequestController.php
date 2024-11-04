<?php
require_once 'DeveloperRequestModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class DeveloperRequestController
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
		$model = new DeveloperRequestModel();
		
		
		$adminSummary = $model->adminSummary();
		
		$developerDetail = $model->developerDetail();
		$developerCount = $model->developerCount();
		 
		require_once('DeveloeprRequestView.php');
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
		$model = new DeveloperRequestModel();
		
		
		$adminSummary = $model->adminSummary();
		
		$developerDetail = $model->developerDetailApproved();
		$developerCount = $model->developerCountApproved();
		 
		require_once('DeveloeprRequestApprovedView.php');
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
		$model = new DeveloperRequestModel();
		
		
		$adminSummary = $model->adminSummary();
		
		$developerDetail = $model->developerDetailRejected();
		$developerCount = $model->developerCountRejected();
		 
		require_once('DeveloeprRequestRejectedView.php');
    }
	
	}
	 
	
	public function moreDeveloperRequest()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new DeveloperRequestModel();
		$moreDeveloperRequest = $model->moreDeveloperRequest();
		echo $moreDeveloperRequest; die;
		}
	}
	public function moreDeveloperRequestApproved()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new DeveloperRequestModel();
		$moreDeveloperRequestApproved = $model->moreDeveloperRequestApproved();
		echo $moreDeveloperRequestApproved; die;
		}
	}
	public function moreDeveloperRequestRejected()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new DeveloperRequestModel();
		$moreDeveloperRequestRejected = $model->moreDeveloperRequestRejected();
		echo $moreDeveloperRequestRejected; die;
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
		$model = new DeveloperRequestModel();
		$approveDeveloper = $model->approveDeveloper($data);
		header('location:../../DeveloperRequest');
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
		
		$model = new DeveloperRequestModel();
		$rejectDeveloper = $model->rejectDeveloper($data);
		header('location:../../DeveloperRequest');
		}
	}
}
?>