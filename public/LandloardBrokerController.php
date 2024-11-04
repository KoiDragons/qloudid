<?php
require_once 'LandloardBrokerModel.php';
 
require_once '../configs/utility.php';
require_once('../AppModel.php');
class LandloardBrokerController
{
	/*public static function guestReservationTimelineInfo($a=null)
		{
			 
				$path = "../../../../../";
				$data=array();
				$data['rid']=cleanMe($a);
				$model       = new LandloardBrokerModel();
				$guestReservationDetail    = $model->guestReservationDetail($data);
				require_once('guestReservationRequestTimelineView.php');
			 
		}*/
		
		
	public static function proposerDetail($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['proposal_id']=cleanMe($a);
			$model1       = new LandloardBrokerModel();
			
			$clientProposalDetail    = $model1->clientProposalDetail($data);
			$employeeDetail    = $model1->poposerEmployeeDetail($data);
			$poposerDetail    = $model1->poposerDetail($data);
			
			require_once('LandloardBrokerDetailView.php');
	 
	} 
	
	 public static function proposalInformation($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['proposal_id']=cleanMe($a);
			$model1       = new LandloardBrokerModel();
			$teamMemberListing    = $model1->teamMemberListing($data); 
			$clientProposalDetail    = $model1->clientProposalDetail($data);
			$employeeDetail    = $model1->employeeListingProposal($data);
			$displayProposalProperties    = $model1->displayProposalProperties($data);
			$poposerEmployeeDetail    = $model1->poposerEmployeeDetail($data);
			$employeeListing    = $model1->employeeListingProposal($data);
			$poposerDetail    = $model1->poposerDetail($data);
			 
			require_once('LandloardBrokerProposalDetailView.php');
	 
	}
	
	
	 public static function proposalSocietyDetail($a=null,$b=null)
    {
		 
			$path = "../../../../../";
			$data=array();
			$data['proposal_id']=cleanMe($a);
			$data['sid']=cleanMe($b);
			 
			$model1       = new LandloardBrokerModel();
			$employeeDetail    = $model1->employeeListingProposal($data);
			$getLandloardSocietyDetails    = $model1->getLandloardSocietyDetails($data); 
			$getLandloardSocietyPhotos    = $model1->getLandloardSocietyPhotos($data); 
 			$getLandloardSocietyApartmentList    = $model1->getLandloardSocietyApartmentList($data); 
			require_once('LandloardBrokerOffPlanSocietyDetailView.php');
	
	}
	
	
	public static function proposalSocietyApartmentDetail($a=null,$b=null,$c=null,$d=null)
    {
		 
			$path = "../../../../../../../";
			$data=array();
			$data['proposal_id']=cleanMe($a);
			$data['sid']=cleanMe($b);
			$data['bid']=cleanMe($c);
			$data['aid']=cleanMe($d);
			$model1       = new LandloardBrokerModel();
			$employeeDetail    = $model1->employeeListingProposal($data); 
			$getLandloardSocietyDetails    = $model1->getLandloardSocietyDetails($data); 
			$getLandloardBuildingDetails    = $model1->getLandloardBuildingDetails($data); 
			 $getLandloardObjectPhotos    = $model1->getLandloardObjectPhotos($data);
			$getLandloardApartmentDetailInfo    = $model1->getLandloardApartmentDetailInfo($data); 
			require_once('LandloardBrokerOffPlanApartmentDetailView.php');
	 
	}
	
	public static function reserveSocietyApartment($a=null,$b=null,$c=null,$d=null)
    {
		 
			$path = "../../../../../../../";
			$data=array();
			$data['proposal_id']=cleanMe($a);
			$data['sid']=cleanMe($b);
			$data['bid']=cleanMe($c);
			$data['aid']=cleanMe($d);
			$model1       = new LandloardBrokerModel();
			$reserveSocietyApartment    = $model1->reserveSocietyApartment($data); 
			 header('location:../../../../../PublicSignup/createAccount/'.$reserveSocietyApartment);
	 
	}
	
	public static function agreementDetail($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['agreement_id']=cleanMe($a);
			$model1       = new LandloardBrokerModel();
			$guestReservationDetail    = $model1->agreementDetailInformation($data); 
			//echo '<pre>'; print_r($guestReservationDetail); echo '</pre>';  die;
			$agreementInstallmentDates    = $model1->agreementInstallmentDates($data);  
			require_once('LandloardGuestReservationAgreementDetailView.php');
	 
	}  
	
	public static function approveAgreement($a=null)
    {
		 
			$path = "../../../../../../../";
			$data=array();
			$data['agreement_id']=cleanMe($a);
			 
			$model1       = new LandloardBrokerModel();
			$approveAgreement    = $model1->approveAgreement($data); 
			 header('location:../agreementDetail/'.$data['agreement_id']);
	 
	}
	
	public static function rejectAgreement($a=null)
    {
		 
			$path = "../../../../../../../";
			$data=array();
			$data['agreement_id']=cleanMe($a);
			 
			$model1       = new LandloardBrokerModel();
			$rejectAgreement    = $model1->rejectAgreement($data); 
			 header('location:../agreementDetail/'.$data['agreement_id']);
	 
	}
	
}
?>