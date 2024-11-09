<?php
	require_once 'ConnectedWorkplaceModel.php';
	require_once '../configs/utility.php';
	class ConnectedWorkplaceController
	{
		
		
		public static function index()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
				$path         = "../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model1       = new ConnectedWorkplaceModel();
				$row_summary    = $model1->userSummary($data);
				$rowProfile   = $model1->userProfileSummary($data);
				$data['email']=$row_summary['email'];
				$data['ssn']=$rowProfile['ssn'];
				if($row_summary['get_started_wizard_status']==0 && ($row_summary['first_name']==null || $row_summary['first_name']==""))
				{
					header("location:GetStartedNew");
				}
				else if($row_summary['get_started_wizard_status']==0 && ($row_summary['first_name']!=null || $row_summary['first_name']!=""))
				{
					header("location:UpdateSecurityStatus");
				}
				$connectedCompanies    = $model1->connectedCompanies($data);
				$connectedCompaniesCount    = $model1->connectedCompaniesCount($data);	
				require_once('ConnectedWorkplaceView.php');
				 
			}
		}
		
		public static function moreWorkplaces()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new ConnectedWorkplaceModel();
				 
				$moreWorkplaces = $model->moreWorkplaces($data);
				echo $moreWorkplaces; die;
			}
		}
	 }
	
	
?>