<?php
	require_once 'ForloratOchUpphittatModel.php';
	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class ForloratOchUpphittatController
	{
		
		
		
		
		public function index($a=null)
		{
			$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:LoginAdmin");
        }else {
				$path = "../../";
				$data=array();
				
				$model       = new ForloratOchUpphittatModel();
				
				$adminSummary = $model->adminSummary();
				$lostandFoundCount    = $model->lostandFoundCount();
				$lostandFoundDetail    = $model->lostandFoundDetail();
				$forloradCount    = $model->forloradCount();
				$forloradDetail    = $model->forloradDetail();
				require_once('ForloratOchUpphittatView.php');
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
				
				$model = new ForloratOchUpphittatModel();
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
				
				$model = new ForloratOchUpphittatModel();
				$moreForloradDetail = $model->moreForloradDetail();
				echo $moreForloradDetail; die;
			}
		}
		
	}
?>