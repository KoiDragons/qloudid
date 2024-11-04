<?php
require_once 'VitechPropertiesModel.php';
 
require_once '../configs/utility.php';
require_once('../AppModel.php');
class VitechPropertiesController
{
	 public static function propertyProposalInformation($a=null,$b=null)
    {
		 
			$path = "../../../../../";
			$data=array();
			$data['proposal_id']=cleanMe($a);
			$data['selected_property_id']=cleanMe($b);
			$model1       = new VitechPropertiesModel();
			$getPropertyDetailInfo    = $model1->selectedPropertyDetailVitechNewInfo($data); 
			$displayProposalProperties    = $model1->displayPropertiesProposal($data); 
			 
			$employeeDetail    = $model1->poposerEmployeeDetail($data);
			 
			require_once('VitechPropertiesProposalDetailInfoView.php');
	 
	}
	
	public static function propertyProposalDetail($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['proposal_id']=cleanMe($a);
			$model1       = new VitechPropertiesModel();
			$poposerEmployeeDetail    = $model1->poposerEmployeeDetail($data);
			$teamMemberListing    = $model1->teamMemberListing($data); 
			$employeeListing    = $model1->employeeListing($data);
			$displayProposalProperties    = $model1->displayPropertiesProposal($data);
			$poposerDetail    = $model1->propertyProposalDetail($data);
			 
			require_once('VitechPropertyProposalDetailView.php');
	 
	}
	
	
	public static function propertyProposerDetail($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['proposal_id']=cleanMe($a);
			$model1       = new VitechPropertiesModel();
			$clientProposalDetail    = $model1->clientProposalDetail($data);
			
			$employeeDetail    = $model1->poposerEmployeeDetail($data);
			require_once('VitechPropertyProposerDetailViewNew.php');
	 
	}
	
	
	
	public static function proposerDetail($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['proposal_id']=cleanMe($a);
			$model1       = new VitechPropertiesModel();
			
			$clientProposalDetail    = $model1->rentClientProposalDetail($data);
			$employeeDetail    = $model1->poposerEmployeeDetail($data);
			$displayProposalProperties    = $model1->displayProposalProperties($data);
			$poposerDetail    = $model1->poposerDetail($data);
			
			require_once('VitechProposerDetailViewNew.php');
	 
	} 
	
	
	 public static function proposalInformation($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['proposal_id']=cleanMe($a);
			$model1       = new VitechPropertiesModel();
			$teamMemberRentListing    = $model1->teamMemberRentListing($data); 
			$clientProposalDetail    = $model1->rentClientProposalDetail($data);
			$employeeDetail    = $model1->employeeListingRentProposal($data);
			$displayProposalProperties    = $model1->displayProposalProperties($data);
			$poposerEmployeeDetail    = $model1->poposerEmployeeDetail($data);
			$employeeListing    = $model1->employeeListingRentProposal($data);
			$poposerDetail    = $model1->poposerDetail($data);
			$poposalDetail    = $model1->poposalDetail($data);
			require_once('VitechProposalDetailView.php');
	 
	}
	
	
	public static function propertyInformation($a=null,$b=null)
    {
		 
			$path = "../../../../../";
			$data=array();
			$data['proposal_id']=cleanMe($a);
			$data['selected_wishlist_id']=cleanMe($b);
			$model1       = new VitechPropertiesModel();
			$displayProposalProperties    = $model1->displayProposalProperties($data);
			$getPropertyDetailInfo    = $model1->getPropertyDetailVitechNewInfo($data); 
			$poposerDetail    = $model1->poposerDetail($data);
			 
			require_once('VitechPropertiesDetailInfoView.php');
	 
	}
	
	
	
	
	public static function verifyEmail()
		{
			$path = "../../../";
			$model1       = new VitechPropertiesModel();
			
			require_once('../configs/smsMandril.php');
			$verifyEmail    = $model1->verifyEmail();
			 echo $verifyEmail; die;
		}
		
	public static function addReservationPaymentDetail($a=null,$b=null,$c=null)
    {
		 
			$path = "../../../../../../";
			$data=array();
			$data['proposal_id']=cleanMe($a);
			$data['selected_wishlist_id']=cleanMe($b);
			$data['booking_type']=cleanMe($c);
			$model1       = new VitechPropertiesModel();
			$poposalDetail    = $model1->poposalDetail($data); 
			$poposalUserDetail    = $model1->poposalUserDetail($data); 
			$getPropertyDetailInfo    = $model1->getPropertyDetailVitechNewInfo($data); 
			$poposerDetail    = $model1->poposerDetail($data); 
			$countryOptions    = $model1->countryOptions($data); 
			require_once('VitechPropertiesBookingReservationDetailView.php'); 
	 
	}
	
	public static function updateReservationDetail($a=null,$b=null,$c=null)
    {
		 
			$path = "../../../../../../";
			$data=array();
			$data['proposal_id']=cleanMe($a);
			$data['selected_wishlist_id']=cleanMe($b);
			$data['booking_type']=cleanMe($c);
			$model1       = new VitechPropertiesModel();
			$_POST['user_id']    = $model1->createUser($_POST); 
			$createUserProfile    = $model1->createUserProfile($_POST); 
			$_POST['card_id']    = $model1->saveCardDetails($_POST); 
			$data['booking_id']    = $model1->sendBookingInfo($data); 
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			require_once('../lib/url_shortener.php');
			$updateUserPersonalAddress    = $model1->updateUserPersonalAddress($data); 
			header('location:../../../reservationCompleted/'.$data['proposal_id'].'/'.$data['selected_wishlist_id'].'/'.$data['booking_type']); die;
	 
	}
	
	
	
	
	
	 
	
	public static function availabilityCheck($a=null,$b=null)
    {
		 
			$path = "../../../../../";
			$data=array();
			$data['proposal_id']=cleanMe($a);
			$data['selected_wishlist_id']=cleanMe($b);
			$model1       = new VitechPropertiesModel();
			$apartmentBookingCount    = $model1->apartmentBookingCount($data); 
			if($apartmentBookingCount>0)
			{
			header('location:../../bookingNotAvailable/'.$data['proposal_id'].'/'.$data['selected_wishlist_id'].'/T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09'); die;	
			}
			else
			{
				header('location:../../addReservationPaymentDetail/'.$data['proposal_id'].'/'.$data['selected_wishlist_id'].'/T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09'); die;
				
			}
	 
	}
	
	
	public static function bookingNotAvailable($a=null,$b=null,$c=null)
    {
		 
			$path = "../../../../../../";
			$data=array();
			$data['proposal_id']=cleanMe($a);
			$data['selected_wishlist_id']=cleanMe($b);
			$data['booking_type']=cleanMe($c);
			require_once('VitechPropertiesBookingNotAvailableView.php'); 
	 
	}
	
	public static function reservationCompleted($a=null,$b=null,$c=null)
    {
		 
			$path = "../../../../../../";
			$data=array();
			$data['proposal_id']=cleanMe($a);
			$data['selected_wishlist_id']=cleanMe($b);
			$data['booking_type']=cleanMe($c);
			require_once('VitechPropertiesThanksReservationView.php'); 
	 
	}
	
	
	
	
	 
	  public static function publishProperty($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['pid']=cleanMe($a);
			$model1       = new VitechPropertiesModel();
			$fetchPropertiesAddress    = $model1->fetchPropertiesAddress($data);
			 
			if($fetchPropertiesAddress['owner_property_id']==null || $fetchPropertiesAddress['owner_property_id']=='')
			{
			$approveProperty    = $model1->approveProperty($data);
			}
			$data['cid']=$fetchPropertiesAddress['cid'];
			$publishProperty    = $model1->publishProperty($data);
			 
			header('location:https://dstricts.com/public/index.php/Apartment');
	 
	}
	
	 
	 
   public static function serviceTypeInformation($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['pid']=cleanMe($a);
			$model1       = new VitechPropertiesModel();
			$fetchPropertiesAddress    = $model1->fetchPropertiesAddress($data);
			 
			if($fetchPropertiesAddress['owner_property_id']!=null || $fetchPropertiesAddress['owner_property_id']!='')
			{
			require_once('CarRentalAlreadyDoneView.php');	 die;
			}
			$data['cid']=$fetchPropertiesAddress['cid'];
			$professionalTodoUpdate    = $model1->professionalTodoUpdate($data);
			$serviceTodoDetail    = $model1->serviceTodoDetail($data);
			require_once('VitechServiceCategoryTodoView.php');
	 
	}
	
	 public static function approveProperty($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['pid']=cleanMe($a);
			$model1       = new VitechPropertiesModel();
			$fetchPropertiesAddress    = $model1->fetchPropertiesAddress($data);
			$data['cid']=$fetchPropertiesAddress['cid'];
			$approveProperty    = $model1->approveProperty($data);
			header('location:../thanksResponse');
	 
	}
	
	
	public static function thanksResponse()
    {
		 
			$path = "../../../";
			$model1       = new VitechPropertiesModel();
			require_once('CarRentalReviewThanksView.php');
	 
	}
	
	public static function checkServices($a=null)
		{
			 
			 	$model1       = new VitechPropertiesModel();
				$data=array();
				$data['pid']=cleanMe($a);
				$fetchPropertiesAddress    = $model1->fetchPropertiesAddress($data);
				$data['cid']=$fetchPropertiesAddress['cid'];
				$result    = $model1->checkServices($data);
				echo $result; die;
		 
		}
	
	public static function updateCategoryServiceAllTodos($a=null)
		{
			 
			 	$model1       = new VitechPropertiesModel();
				$data=array();
				$data['pid']=cleanMe($a);
				$fetchPropertiesAddress    = $model1->fetchPropertiesAddress($data);
				$data['cid']=$fetchPropertiesAddress['cid'];
				$result    = $model1->updateCategoryServiceAllTodos($data);
				$result    = $model1->serviceTodoDetail($data);
				echo $result; die;
		 
		}
		
		public static function updateCategoryServiceTodo($a=null)
		{
		 
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['pid']=cleanMe($a);
				$fetchPropertiesAddress    = $model1->fetchPropertiesAddress($data);
				$data['cid']=$fetchPropertiesAddress['cid'];
				$result    = $model1->updateCategoryServiceTodo($data);
				//$result    = $model1->serviceTodoDetail($data);
				echo $result; die;
		 
		}
	
}
?>