<?php
require_once 'UsersListModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class UsersListController
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
		$model = new UsersListModel();
		
		$userDetailUnverified = $model->userDetailUnverified();
		$foundandLostDetail = $model->foundandLostDetail();
		$foundandLostCount = $model->foundandLostCount();
		
		$userDetail = $model->userDetail();
		$usersCount = $model->usersCount();
		$usersCountVerified = $model->usersCountVerified();
		$usersCountUnverified = $model->usersCountUnverified();
		$adminSummary = $model->adminSummary();
		$userDetailMobile = $model->userDetailMobile();
		$usersCountMobile = $model->usersCountVerifiedMobile();
		$userDetailBankID = $model->userDetailBankID();
		$usersCountBankID = $model->usersCountVerifiedBankID();
		
		  require_once('UsersListView.php');
    }
	
	}
	
	public function moreUserDetail()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
             echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new UsersListModel();
		$moreUserDetail = $model->moreUserDetail();
		echo $moreUserDetail; die;
		}
	}
	
	public function moreFoundandLostDetail()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
              echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new UsersListModel();
		$moreFoundandLostDetail = $model->moreFoundandLostDetail();
		echo $moreFoundandLostDetail; die;
		}
	}
	
	public function moreUserUnverifiedDetail()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new UsersListModel();
		$moreUserDetail = $model->moreUserUnverifiedDetail();
		echo $moreUserDetail; die;
		}
	}
	
	public function moreUserDetailMobile()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
             echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new UsersListModel();
		$moreUserDetailMobile = $model->moreUserDetailMobile();
		echo $moreUserDetailMobile; die;
		}
	}
	
	
	
	public function moreUserDetailBankID()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
             echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        }
		else { 
		$model = new UsersListModel();
		$moreUserDetailBankID = $model->moreUserDetailBankID();
		echo $moreUserDetailBankID; die;
		}
	}
	
}
?>