<?php
require_once 'VerifyIdRequestModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class VerifyIdRequestController
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
		$model = new VerifyIdRequestModel();
		
		
		$adminSummary = $model->adminSummary();
		
		$developerDetail = $model->developerDetail();
		$developerCount = $model->developerCount();
		 
		require_once('VerifyIdRequestView.php');
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
		$model = new VerifyIdRequestModel();
		
		
		$adminSummary = $model->adminSummary();
		
		$developerDetail = $model->developerDetailRejected();
		$developerCount = $model->developerCountRejected();
		 
		require_once('VerifyIdRequestRejectedView.php');
    }
	
	}
	 
	 public function moreDeveloperRequestApproved()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new VerifyIdRequestModel();
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
		$model = new VerifyIdRequestModel();
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
		$model = new VerifyIdRequestModel();
		
		
		$adminSummary = $model->adminSummary();
		
		$developerDetail = $model->developerDetailApproved();
		$developerCount = $model->developerCountApproved();
		 
		require_once('VerifyIdRequestApprovedView.php');
    }
	
	}
	
	public function moreVerifyIdRequest()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new VerifyIdRequestModel();
		$moreVerifyIdRequest = $model->moreVerifyIdRequest();
		echo $moreVerifyIdRequest; die;
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
		$model = new VerifyIdRequestModel();
		$approveDeveloper = $model->approveDeveloper($data);
		header('location:../../VerifyIdRequest');
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
		
		$model = new VerifyIdRequestModel();
		$rejectDeveloper = $model->rejectDeveloper($data);
		header('location:../../VerifyIdRequest');
		}
	}
}
?>