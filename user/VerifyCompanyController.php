<?php
	require_once 'VerifyCompanyModel.php';
	require_once '../company/EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class VerifyCompanyController
	{
		
		
		public static function index()
		{
			$path="../../";
			
			
			require_once('VerifyCompanyView.php');
			
		}
		
		public static function domainAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				/*if(!isset($_POST['total_value']))
				{
					
						header("location:../../NewPersonal/userAccount");
					
				}
				else
				{
					$posted_value=json_decode($_POST['total_value'],true);
					
				}*/
					$posted_value="";
				$path="../../../../";
				$model = new VerifyCompanyModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				if(isset($_POST['search']))
				{ 
					
					$data['search']="%".$_POST['search'];
					$partData=$model->partData($data);
				}
				else 
				{
					$data['search']="";
				}
				$row_summary    = $model->userSummary($data);
				$verificationId    = $model->verificationId($data);
				$resultOrg    = $model->userAccount($data);
				$resultOrg1    = $model->employeeAccount($data);
				require_once('VerifyCompanyView.php');
			}
		}
		
		
		
		public static function updateAccount($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path="../../../";
				$model = new VerifyCompanyModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$_POST['total_value']=str_ireplace("'",'"',$_POST['total_value']);
				//print_r($_POST); die;
				$updateAccount=$model->updateAccount($data);
				header("location:../../CompanySuppliers/companyAccount/".$data['cid']);
				
			}
		}
	}
?>