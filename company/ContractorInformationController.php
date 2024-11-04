<?php
require_once 'ContractorInformationModel.php';
require_once 'EmployeeCheckController.php';
require_once '../configs/utility.php';
class ContractorInformationController
{
      public static function invitedContractorsList($a = null)
    {
        $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				 header("location:../../../../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 $data['cid']=cleanMe($a);
				 $model       = new EmployeeCheckController();
					$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
					header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new ContractorInformationModel();
				$companyDetail    = $model1->companyDetail($data);
				$invitedContractorList    = $model1->invitedContractorList($data);
				require_once('ContractorInformationInvitedListView.php');
			}
      } 
	  
	  
	  public static function activeContractorsList($a = null)
    {
        $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				 header("location:../../../../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 $data['cid']=cleanMe($a);
				 $model       = new EmployeeCheckController();
					$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
					header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new ContractorInformationModel();
				$companyDetail    = $model1->companyDetail($data);
				$activeContractorList    = $model1->activeContractorList($data);
				require_once('ContractorInformationActiveListView.php');
			}
      } 
        
    
    public static function contractorDetail($a = null)
    {
        $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				 header("location:../../../../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 $data['cid']=cleanMe($a);
				 $model       = new EmployeeCheckController();
					$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
					header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new ContractorInformationModel();
				$companyDetail    = $model1->companyDetail($data);
				$locationDetail    = $model1->locationDetail($data);
				require_once('ContractorInformationView.php');
			}
      } 
        
	 public static function checkEmailInfo($a=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new ContractorInformationModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$checkEmailInfo    = $model1->checkEmailInfo($data);
				echo $checkEmailInfo; die;
				}
		}
		
		 public static function inviteContractor($a=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new ContractorInformationModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				require_once('../configs/testMandril.php');
				$inviteContractor    = $model1->inviteContractor($data);
				header('location:../invitedContractorsList/'.$data['cid']);
				}
		}
}


?>