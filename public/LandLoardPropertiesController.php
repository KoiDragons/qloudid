<?php
require_once 'LandLoardPropertiesModel.php';
 
require_once '../configs/utility.php';
require_once('../AppModel.php');
class LandLoardPropertiesController
{
	public static function proposerDetail($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['proposal_id']=cleanMe($a);
			$model1       = new LandLoardPropertiesModel();
			require_once('LandloardProposerDetailView.php');
	 
	}
	
	
	 public static function proposalInformation($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['proposal_id']=cleanMe($a);
			$model1       = new LandLoardPropertiesModel();
			$displayProposalProperties    = $model1->displayProposalProperties($data);
			 
			require_once('LandloardProposalDetailView.php');
	 
	} 
	
	
	public static function proposalApartmentInformation($a=null,$b=null)
    {
		 
			$path = "../../../../../";
			$data=array();
			$data['proposal_id']=cleanMe($a);
			$data['request_id']=cleanMe($b);
			$model1       = new LandLoardPropertiesModel();
			$getLandloardBuildingDetails    = $model1->getLandloardBuildingDetails($data);
			
			$getLandloardApartmentImageDetail    = $model1->getLandloardApartmentImageDetail($data);
			$getPropertyDetailInfo    = $model1->getLandloardApartmentDetail($data);
		 
			require_once('LandloardProposalApartmentDetailView.php');
	 
	} 
	
}
?>