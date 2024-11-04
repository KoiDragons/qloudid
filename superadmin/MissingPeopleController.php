<?php
require_once 'MissingPeopleModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class MissingPeopleController
{
    public function moreMissingChildren()
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
          echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAdmin"; </script>'; die;
        }
		else { 
		$model = new MissingPeopleModel();
		$moreMissingChildren = $model->moreMissingChildren();
		echo $moreMissingChildren; die;
		}
	}
	
	 
	public function index()
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				
				header("location:LoginAdmin");
				} else {
				$path="../../";
				$data=array();
				 
				$model = new MissingPeopleModel();
				$missingChildrenDetail = $model->missingChildrenDetail($data);
				$missingChildrenCount = $model->missingChildrenCount($data);
				require_once('MissingPeopleView.php');
			}
		}
		
	 
	
}
?>