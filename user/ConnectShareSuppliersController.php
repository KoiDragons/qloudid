<?php
	require_once 'ConnectShareSuppliersModel.php';
	require_once '../company/EmployeeCheckController.php';
	require_once '../configs/utility.php';
	class ConnectShareSuppliersController
	{
		
		
		public static function index()
		{
			$path         = "../../../../";
			require_once('ConnectShareSuppliersView.php');
		}
		
		public static function suppliersShow($a=null)
		{
			$valueNew = checkLogin();
			// echo $valueNew; die;
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$model = new ConnectShareSuppliersModel();
				if(isset($a))
				{
					$path         = "../../../../";
					$data['user_id']=cleanMe($a);
					$data['us']=0;
				}
				else{
					//echo "hello"; die;
					$path         = "../../../";
					$data['user_id']=$_SESSION['user_id'];
					$data['us']=1;
				}
				
				
				$row_summary = $model->userSummary($data);	
				
				
				$rowUser = $model->approveUser($data);
				
				$rowP = $model->allCount($data);
				
				require_once('ConnectShareSuppliersView.php');
			}
		}
        
		public static function moreConnectShareSuppliersShow($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$path         = "../../../../";
				$model = new ConnectShareSuppliersModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['us']=1;
				$data['limit1']=cleanMe($a);
				
				$data['limit']=$data['limit1']*12;
				
				$row_summary = $model->userSummary($data);	
				
				
				$rowUser = $model->approveUser($data);
				
				$rowP = $model->allCount($data);
				
				require_once('MoreConnectShareSuppliersView.php');
			}
			
		}
		
		
		
		public static function employeeRequestShow($a = null , $b=null )
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				$data=array();
				$path         = "../../../../../";
				
				$model = new ConnectShareSuppliersModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				$data['limit1']=cleanMe($b);
				
				$data['limit']=$data['limit1']*12;
				
				$rowsummary = $model->userSummary($data);	
				$company = $model->userSummary($data);	
				$rowUser = $model->approveUser($data);
				$rowA = $model->approveCount($data);
				$rowP = $model->pendingCount($data);
				$rowR = $model->rejectCount($data);
				$rowa = $model->allCount($data);
				
				require_once('MoreEmployeeRequestView.php');
			}
			
		}
		
		
		public static function approveUserRequest($a = null , $b=null ,$c=null, $d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				
				$model = new ConnectShareSuppliersModel();
                
				//$data['cid']=cleanMe($a);
				$data['a_id']=$_POST['a_id'];
				$data['stat']=$_POST['status'];
				$data['user_id']=$_POST['user_id'];
				require_once('../configs/testMandril.php');
				
				$rowsummary = $model->approveUserRequest($data);	
				
				
				echo $rowsummary; die;
			}
		}
        
		
	}
    
	
	
?>