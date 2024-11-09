<?php
require_once 'IndividualEducationOfferModel.php';
require_once 'EmployeeCheckController.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class IndividualEducationOfferController
{
    
    
    public static function offerInfo($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
        } else {
			$path = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
				$model       = new IndividualEducationOfferModel();
				$data['lid']=cleanMe($a);
				$locationDetail    = $model->locationDetail($data);
				$data['cid']=$locationDetail['enc'];
				if($locationDetail['offer_education']>0)
				{
					header("location:../../CompanyProperty/locationAccount/".$data['cid']);
					die;
				}
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data);
				
			
			require_once('IndividualEducationOfferView.php');
	}
	}
	
	public static function addOfferInfo($a = null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data = array();
				$data['user_id']=$_SESSION['user_id'];
				$data['lid']=cleanMe($a);
				
				$model = new IndividualEducationOfferModel();
				$locationDetail    = $model->locationDetail($data);
				$data['cid']=$locationDetail['enc'];
				
				$addOfferInfo    = $model->addOfferInfo($data);
				header("location:../../CompanyProperty/locationAccount/".$data['cid']);
			}
		}
	

}
?>