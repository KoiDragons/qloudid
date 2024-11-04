<?php
require_once 'PickapropertyServiceModel.php';
require_once '../configs/utility.php';
 
require_once('../AppModel.php');
class PickapropertyServiceController
{		
		public static function selectRequirement()
		{
				$path = "../../../";
				$model       = new PickapropertyServiceModel();
				require_once('PickapropertyServiceListView.php');
			
		}
		public static function propertyRequirementInfo($a=null,$b=null,$c=null,$d=null,$e=null)
		{
				$path = "../../../../../../../../";
				$data=array();
				$data['catg_id']=cleanMe($a);
				$data['whom_id']=cleanMe($b);
				$data['subcatg_id']=cleanMe($c);
				$data['domain_id']=cleanMe($d);
				$data['area_id']=cleanMe($e);
		  
				$model       = new PickapropertyServiceModel();
				$suportedLanguagesList    = $model->suportedLanguagesList();
				$propertyType    = $model->propertyType();
				$vitechCityList    = $model->vitechCityList();
				require_once('PickapropertyServiceUserRequirementView.php');	
				
		}
		
		public static function getAreaInfo()
		{
			$model1       = new PickapropertyServiceModel();
			$result    = $model1->vitechAreaList();
			echo $result; die;
		}
				
		public static function verifyDates()
		{
		$start=strtotime($_POST['start_date']);
		$end=strtotime($_POST['end_date']);
		
		if($start>$end)
		{
			echo 0; die;
		}
		else
		{
			echo 1; die;
		}
		}
		
		public static function addShortTermRentPropertyRequirement($a=null,$b=null,$c=null,$d=null,$e=null)
		{
				$path = "../../../../../../../../";
				$data=array();
				$data['catg_id']=cleanMe($a);
				$data['whom_id']=cleanMe($b);
				$data['subcatg_id']=cleanMe($c);
				$data['domain_id']=cleanMe($d);
				$data['area_id']=cleanMe($e);
				$model1       = new PickapropertyServiceModel();
				$addShortTermRentPropertyRequirement    = $model1->addShortTermRentPropertyRequirement($data);
				header('location:../../../../../thanksInformation/'.$data['domain_id']); die;
		} 
		
		public static function thanksInformation($a=null)
		{
				$path = "../../../../";
				$data=array();
				$data['domain_id']=cleanMe($a);
				$model       = new PickapropertyServiceModel();
				require_once('PickapropertyServiceReviewThanksView.php');
			
		}
		 
		
		   

}
?>