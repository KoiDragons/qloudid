<?php
	require_once 'VerifyModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class VerifyController
	{
		
		
		public static function index()
		{
			$path="../../";
			
			
			require_once('VerifyView.php');
			
		}
		
		public static function domainAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				if(!isset($_POST['total_value']))
				{
					
						header("location:../NewPersonal/userAccount");
					
				}
				else
				{
					$posted_value=json_decode($_POST['total_value'],true);
					
				}
				$path="../../../";
				$model = new VerifyModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
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
				require_once('VerifyView.php');
			}
		}
		
		public static function domainSearch($a=null , $b=null)
		{
			$path="../../../";
			$model = new VerifyModel();
			
			$data=array();
			$data['search']="%".cleanMe($a);
			$data['lmt']=cleanMe($b);
			//print_r($data); die;
			$partDataSearch=$model->partDataSearch($data);
			
			echo $partDataSearch; die;
		}
		
		public static function updateAccount($a=null , $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path="../../../";
				$model = new VerifyModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$_POST['total_value']=str_ireplace("'",'"',$_POST['total_value']);
				//print_r($_POST); die;
				$updateAccount=$model->updateAccount($data);
				if($updateAccount==2)
				{
					header("location:../GetStartedNew");
					}
					else
					{
					header("location:../NewPersonal/userAccount");
						}
				
				
			}
		}
	}
?>