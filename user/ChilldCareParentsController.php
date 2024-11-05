<?php

	require_once 'ChilldCareParentsModel.php';
	require_once 'PersonalRequestsController.php';
	require_once 'ShareMonitorController.php';
	require_once 'ConnectKinController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class ChilldCareParentsController
	{
		
		
		
		public static function moreParentDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				
				$model       = new ChilldCareParentsModel();
				
				$moreParentDetail    = $model->moreParentDetail($data);
				
				echo $moreParentDetail; die;
			}
		}
		
		
		public static function parentsDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['parent_id']=cleanMe($a);
				$model       = new ChilldCareParentsModel();
				$childrenDetail    = $model->childrenDetail($data);
				$data['cid']=$childrenDetail['enc'];
				$selectIcon    = $model->selectIcon($data);
				$childrenDetailAll    = $model->childrenDetailAll($data);
				$parentDetail    = $model->parentDetail($data);
				$dayCareDetail    = $model->dayCareDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('ChilldCareParentsView.php');
			}
		}
		
		
		
	}
?>