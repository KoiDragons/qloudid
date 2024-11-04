<?php
require_once 'BusinessAppCenterModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class BusinessAppCenterController
{
    
    
    public function index()
    {
		$path  = "../../../../../";
		$valueNew = checkadmin();
		if ($valueNew == 0) {
            
            header("location:LoginAdmin");
        }
		else { 
		$path="../../";
		$model = new BusinessAppCenterModel();
		$adminSummary = $model->adminSummary();
		$BusinessAppCenterInformation = $model->BusinessAppCenterInformation();
		require_once('BusinessAppCenterListView.php');
    }
	} 
	
	public function updateServices($a=null)
	{
	$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:../../LoginAdmin");
        }
		else { 
		$path = "../../../../";
		$data=array();
		$data['app_id']=cleanMe($a);
		require_once('../configs/testMandril.php');
		
		$model = new BusinessAppCenterModel();
		$appServicesTodoUpdate    = $model->appServicesTodoUpdate($data);
		$selectedAppServices    = $model->selectedAppServices($data); 
		require_once('BusinessAppCenterServicesView.php');
		}
	}
	
	
	public function updateServiceCategory($a=null)
		{
			$valueNew = checkadmin();
		
        if ($valueNew == 0) {
            
            header("location:../../LoginAdmin");
        }
		else { 
		
		$data=array();
		$data['app_id']=cleanMe($a);
		$model = new BusinessAppCenterModel();
		$data['category_id']=$_POST['category_id'];
		$updateServiceCategory    = $model->updateServiceCategory($data);
		$selectedAppSubcategories    = $model->selectedAppSubcategories($data);
		echo $selectedAppSubcategories; die;
			}
		}  

}
?>