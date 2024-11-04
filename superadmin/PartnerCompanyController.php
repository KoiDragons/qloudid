<?php
require_once 'PartnerCompanyModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class PartnerCompanyController
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
		$model = new PartnerCompanyModel();
		
		
		$adminSummary = $model->adminSummary();
		
		$partnerDetail = $model->partnerDetail();
		$partnerCount = $model->partnerCount();
		$partnerDetailApproved = $model->partnerDetailApproved();
		$partnerCountApproved = $model->partnerCountApproved();
		$partnerDetailRejected = $model->partnerDetailRejected();
		$partnerCountRejected = $model->partnerCountRejected();
		
		  require_once('PartnerCompanyView.php');
    }
	
	}
	
	public function morePartnerCompanyRejected()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new PartnerCompanyModel();
		$morePartnerCompanyRejected = $model->morePartnerCompanyRejected();
		echo $morePartnerCompanyRejected; die;
		}
	}
	
	public function morePartnerCompanyApproved()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new PartnerCompanyModel();
		$morePartnerCompanyApproved = $model->morePartnerCompanyApproved();
		echo $morePartnerCompanyApproved; die;
		}
	}
	
	public function morePartnerCompany()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new PartnerCompanyModel();
		$morePartnerCompany = $model->morePartnerCompany();
		echo $morePartnerCompany; die;
		}
	}
	
	public function approvePartner($a=null)
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:../../LoginAdmin");
        }
		else { 
		$data=array();
		$data['pid']=cleanMe($a);
		$model = new PartnerCompanyModel();
		$approvePartner = $model->approvePartner($data);
		header('location:../../PartnerCompany');
		}
	}
	
	public function rejectPartner($a=null)
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:../../LoginAdmin");
        }
		else { 
		$data=array();
		$data['pid']=cleanMe($a);
		$model = new PartnerCompanyModel();
		$rejectPartner = $model->rejectPartner($data);
		header('location:../../PartnerCompany');
		}
	}
}
?>