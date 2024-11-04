<?php
require_once 'DependentListModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class DependentListController
{
    public function moreFreeDependentDetail($a= null, $b=null)
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
          echo '<script> window.location.href="https://www.qloudid.com/superadmin/index.php/LoginAdmin"; </script>'; die;
        }
		else { 
		$data=array();
		$data['cid']=cleanMe($a);
		$data['appid']=cleanMe($b);
		$model = new DependentListModel();
		$moreFreeDependentDetail = $model->moreFreeDependentDetail($data);
		echo $moreFreeDependentDetail; die;
		}
	}
	
	 
	public function freeAccount($a= null, $b=null)
		{
			$valueNew = checkadmin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../LoginAdmin");
				} else {
				$path="../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['appid']=cleanMe($b);
				$model = new DependentListModel();
				
				$countryInfo = $model->countryInfo($data);
				 
				if($countryInfo['is_visible']==0)
				{
					header('location:../../../CountryList'); die;
				}
				
				$appInfo = $model->appInfo($data);
				
				if($appInfo['is_permission']==0)
				{
				header('location:../../../Country/appMarket/'.$data['cid']); die;
				}
				$freeDependentDetail = $model->freeDependentDetail($data);
				$freeDependentDetailCount = $model->freeDependentDetailCount($data);
				require_once('DependentListFreeView.php');
			}
		}
		
	 
	
}
?>