<?php
	require_once 'UserForloratOchUpphittatModel.php';
	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class UserForloratOchUpphittatController
	{
		
		
		
		
		public function index($a=null)
		{
			$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:LoginAdmin");
        }else {
				$path = "../../";
				$data=array();
				
				$model       = new UserForloratOchUpphittatModel();
				
				$adminSummary = $model->adminSummary();
				$lostandFoundCount    = $model->lostandFoundCount();
				$lostandFoundDetail    = $model->lostandFoundDetail();
				$forloradCount    = $model->forloradCount();
				$forloradDetail    = $model->forloradDetail();
				require_once('UserForloratOchUpphittatView.php');
			}
		}
		
		public function moreLostandFoundDetail()
		{
			$valueNew = checkadmin();
        if ($valueNew == 0) {
            $path = "../../";
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        } else {
				$data=array();
				
				$model = new UserForloratOchUpphittatModel();
				$moreLostandFoundDetail = $model->moreLostandFoundDetail();
				echo $moreLostandFoundDetail; die;
			}
		}
		
		
		public function moreForloradDetail()
		{
			$valueNew = checkadmin();
        if ($valueNew == 0) {
            $path = "../../";
            echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAadmin"; </script>'; die;
        } else {
				$data=array();
				
				$model = new UserForloratOchUpphittatModel();
				$moreForloradDetail = $model->moreForloradDetail();
				echo $moreForloradDetail; die;
			}
		}
		
	}
?>