<?php
require_once 'CompanyApartmentsModel.php';
require_once 'EmployeeCheckController.php';

require_once '../configs/utility.php';
require_once('../AppModel.php');
class CompanyApartmentsController
{
   	public static function apartmentInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['aid']=cleanMe($b);
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$model       = new CompanyApartmentsModel();
				
				$companyDetail    = $model->companyDetail($data);
				
				$row_summary    = $model->userSummary($data);
				require_once('CompanyApartmentsView.php');
			}
		}
		
	public static function updateApartment($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['aid']=cleanMe($b);
				
				
				$model       = new CompanyApartmentsModel();
				
				$updateApartment    = $model->updateApartment($data);
				
				header("location:../../../UserTenantCompany/monitorAccount/".$data['cid']);
			}
		}

}
?>