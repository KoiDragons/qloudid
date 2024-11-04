<?php
	require_once 'ManageFileInvitationModel.php';
	require_once '../configs/utility.php';
require_once('../AppModel.php');
	class ManageFileInvitationController
	{
		
		
		public static function index()
		{
			
		}
		
		public static function invitationAccount($a=null)
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
				//print_r($_SESSION); die;
				if(isset($_SESSION['file_e']))
				{
					
					$data['file_e']=$_SESSION['file_e'];	
					unset($_SESSION['file_e']);
				}
				else
				{
					header("location:../../ManageEmployee/magazineAccount/".$data['cid']);
					
				}
				$model = new ManageFileInvitationModel();
				
				$file    = $model->fileDetail($data);
				 
				$empl    = $model->empSummary($data);
				
				
				
				require_once('ManageFileInvitationView.php');
			}
		}
		
			public static function inviteEmployees($a=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				
				$data['user_id']=$_SESSION['user_id'];
				$model = new ManageFileInvitationModel();
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$inviteEmployees    = $model->inviteEmployees($data);
			}
			
			
			
		}
	}
?>