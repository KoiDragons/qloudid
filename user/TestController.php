<?php
include 'TestModel.php';
require_once '../configs/utility.php';

class TestController
{
	
		public static function tenantInvoiceInfo()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new TestModel();
				$tenantInvoiceInfo    = $model1->tenantInvoiceInfo($data);
				$dataOut=json_encode($tenantInvoiceInfo,true);
					echo  $dataOut;
					die; 
		}
		
		public static function checkinAparmentOwner()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new TestModel();
				$checkinAparmentOwner    = $model1->checkinAparmentOwner($data);
				echo  $checkinAparmentOwner;
				die; 
		}
		
		public static function listUserDeliveryAddresses()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new TestModel();
				$listAddresses    = $model1->listUserDeliveryAddresses($data);
				$dataOut=json_encode($listAddresses,true);
					echo  $dataOut;
					die; 
		}
		
		public static function updateAccessibility()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new TestModel();
				if($data['update_type']==1)
				{
				$result    = $model1->updatePrivate($data);	
				}
				else if($data['update_type']==2)
				{
				$result    = $model1->updateEnsuit($data);	
				}
				else if($data['update_type']==3)
				{
				$result    = $model1->updateWheelchair($data);	
				}
				echo  $result;
					die; 
				 
			
		   
		}
		
		
		public static function updateBathroom()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new TestModel();
				if($data['update_type']==1)
				{
				$result    = $model1->updateToilet($data);	
				}
				else if($data['update_type']==2)
				{
				$result    = $model1->updateBath($data);	
				}
				else if($data['update_type']==3)
				{
				$result    = $model1->updateShower($data);	
				}
				echo  $result;
					die; 
		}
		
		
		public static function updateOverbath()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new TestModel();
				$result    = $model1->updateOverbath($data);	
				echo  $result;
				die; 
		}
		
		
		public static function bedroomDetail()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new TestModel();
				$bedroomCount    = $model1->bedroomCount($data);
				$bedroomDetail    = $model1->bedroomDetail($data);
				$dataOut=json_encode($bedroomDetail,true);
				echo  $dataOut;
				die; 
		}
		
		
		public static function bathroomDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new TestModel();
				$bathroomCount    = $model1->bathroomCount($data);
				$bathroomDetail    = $model1->bathroomDetail($data);
				$dataOut=json_encode($bathroomDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function addBathroom()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new TestModel();
				$addBathroom    = $model1->addBathroom($data);
				echo  $addBathroom;
					die; 
				 
			
		   
		}
		
		
		public static function deleteBathroom()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new TestModel();
				$deleteBathroom    = $model1->deleteBathroom($data);
				echo  $deleteBathroom;
					die; 
				 
			
		   
		}
		
		public static function bedroomBedDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new TestModel();
				$bedroomBedDetail    = $model1->bedroomBedDetail($data);
				$dataOut=json_encode($bedroomBedDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function bedTypeDetail()
		{
				$model1       = new TestModel();
				$bedTypeDetail    = $model1->bedTypeDetail();
				$dataOut=json_encode($bedTypeDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	
		public static function addBedroom()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				 
				$model = new TestModel();
				$addBedroom=$model->addBedroom($data);
				echo  $addBedroom;
				die;
				
		}
	
		public static function deleteBedroom()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$deleteBedroom=$model->deleteBedroom($data);
				echo  $deleteBedroom;
				die;
				
		}
		
		public static function deleteBedroomBedInfo()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$deleteBedroomBedInfo=$model->deleteBedroomBedInfo($data);
				echo  $deleteBedroomBedInfo;
				die;
				
		}
		
		
		public static function updateBedTypeInfo()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$updateBedTypeInfo=$model->updateBedTypeInfo($data);
				echo  $updateBedTypeInfo;
				die;
				
		}
		
		
		public static function addBedToBedroom()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$addBedToBedroom=$model->addBedToBedroom($data);
				echo  $addBedToBedroom;
				die;
				
		}
	
		public static function communityAvailableTenantsInfo()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$communityAvailableTenantsInfo=$model->communityAvailableTenantsInfo($data);
				$dataOut=json_encode($communityAvailableTenantsInfo,true);
				echo  $dataOut;
				die;
				
		}
		
		
		public static function apartmentCommunityAmenities()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$apartmentCommunityAmenities=$model->apartmentCommunityAmenities($data);
				$dataOut=json_encode($apartmentCommunityAmenities,true);
				echo  $dataOut;
				die;
				
		}
		
		
		public static function getCommunityDetailInfo()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$getCommunityDetailInfo=$model->getCommunityDetailInfo($data);
				$dataOut=json_encode($getCommunityDetailInfo,true);
				echo  $dataOut;
				die;
				
		}
		
		public static function updateApartmentCommunityTicket()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$updateApartmentCommunityTicket=$model->updateApartmentCommunityTicket($data);
				echo  $updateApartmentCommunityTicket;
				die; 
				
		}
		public static function acceptApartmentCommunityTicket()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$acceptApartmentCommunityTicket=$model->acceptApartmentCommunityTicket($data);
				echo  $acceptApartmentCommunityTicket;
				die; 
				
		}
		
		public static function finishApartmentCommunityTicket()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$finishApartmentCommunityTicket=$model->finishApartmentCommunityTicket($data);
				echo  $finishApartmentCommunityTicket;
				die; 
				
		}
		
		public static function rejectApartmentCommunityTicket()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$rejectApartmentCommunityTicket=$model->rejectApartmentCommunityTicket($data);
				echo  $rejectApartmentCommunityTicket;
				die; 
				
		}
		
		
		public static function apartmentCommunityTicketCreatedCount()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$apartmentCommunityTicketCreatedCount=$model->apartmentCommunityTicketCreatedCount($data);
				$dataOut=json_encode($apartmentCommunityTicketCreatedCount,true);
				echo  $dataOut;
				die;
				
		}
		
		public static function apartmentCommunityTicketList()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$apartmentCommunityTicketList=$model->apartmentCommunityTicketList($data);
				$dataOut=json_encode($apartmentCommunityTicketList,true);
				echo  $dataOut;
				die;
				
		}
		
		public static function apartmentCommunityPendingTicket()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$apartmentCommunityPendingTicket=$model->apartmentCommunityPendingTicket($data);
				$dataOut=json_encode($apartmentCommunityPendingTicket,true);
				echo  $dataOut;
				die;
				
		}
		
		public static function apartmentCommunityStartedTicket()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$apartmentCommunityStartedTicket=$model->apartmentCommunityStartedTicket($data);
				$dataOut=json_encode($apartmentCommunityStartedTicket,true);
				echo  $dataOut;
				die;
				
		}
		
		public static function apartmentCommunityCompletedTicket()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$apartmentCommunityCompletedTicket=$model->apartmentCommunityCompletedTicket($data);
				$dataOut=json_encode($apartmentCommunityCompletedTicket,true);
				echo  $dataOut;
				die;
				
		}
		
		public static function apartmentCommunityCancelledTicket()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$apartmentCommunityCancelledTicket=$model->apartmentCommunityCancelledTicket($data);
				$dataOut=json_encode($apartmentCommunityCancelledTicket,true);
				echo  $dataOut;
				die;
				
		}
		
		public static function apartmentCommunityTicketDetail()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$apartmentCommunityTicketDetail=$model->apartmentCommunityTicketDetail($data);
				$dataOut=json_encode($apartmentCommunityTicketDetail,true);
				echo  $dataOut;
				die;
				
		}
		
		public static function getCommunityInfo()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$getCommunityInfo=$model->getCommunityInfo($data);
				echo  $getCommunityInfo;
				die; 
				
		}
		
		
		public static function addCommunityTicketImage()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$addCommunityTicketImage=$model->addCommunityTicketImage($data);
				echo  $addCommunityTicketImage;
				die; 
				
		}
		
		
		public static function createCommunityTicket()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$createCommunityTicket=$model->createCommunityTicket($data);
				echo  $createCommunityTicket;
				die; 
				
		}
		
		public static function getTicketTitleInfo()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$getTicketTitleInfo=$model->getTicketTitleInfo($data);
				$dataOut=json_encode($getTicketTitleInfo,true);
				echo  $dataOut;
				die;
				
		}
		
		
		public static function getTicketSubTitleInfo()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$getTicketSubTitleInfo=$model->getTicketSubTitleInfo($data);
				$dataOut=json_encode($getTicketSubTitleInfo,true);
				echo  $dataOut;
				die;
				
		}
	
		public static function getPreCheckinStatus()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$getPreCheckinStatus=$model->getPreCheckinStatus($data);
				$dataOut=json_encode($getPreCheckinStatus,true);
				echo  $dataOut;
				die; 
				
		}
		
		public static function updatePreCheckinStatus()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$updatePreCheckinStatus=$model->updatePreCheckinStatus($data);
				$dataOut=json_encode($updatePreCheckinStatus,true);
				echo  $dataOut;
				die; 
				
		}
		
		public static function apartmentDetailInfoDstrictApp()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$apartmentDetailInfoDstrictApp    = $model1->apartmentDetailInfoDstrictApp($data);
				$dataOut=json_encode($apartmentDetailInfoDstrictApp,true);
				echo  $dataOut;
				die; 
		}
		
		
		public static function apartmentDetailInfoCheckin()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$apartmentDetailInfoCheckin    = $model1->apartmentDetailInfoCheckin($data);
				$dataOut=json_encode($apartmentDetailInfoCheckin,true);
				echo  $dataOut;
				die; 
		}
		
		public static function getUserActiveStatus()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$getUserActiveStatus    = $model1->getUserActiveStatus($data);
				$dataOut=json_encode($getUserActiveStatus,true);
				echo  $dataOut;
				die; 
		}
		public static function getUserStatus()
		{
				$model = new TestModel();
				$getUserStatus=$model->getUserStatus();
				echo $getUserStatus;	die;
		}
		
		public static function getUserStatusCompanyRequirement()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new TestModel();
				$getUserStatus=$model->getUserStatusCompanyRequirement($data);
				echo $getUserStatus;	die;
		}
		
		
		public static function inviteVisitor()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				$model = new TestModel();
				$inviteVisitor=$model->inviteVisitor($data);
				echo $inviteVisitor;
				
		}
		public static function invitedVisitorsMeetingList()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$invitedVisitorsMeetingList    = $model1->invitedVisitorsMeetingList($data);
				$dataOut=json_encode($invitedVisitorsMeetingList,true);
				echo  $dataOut;
				die; 
		}
		
		public static function checkedInMeetingList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$checkedInMeetingList 	 = $model1->checkedInMeetingList($data);
				$dataOut=json_encode($checkedInMeetingList,true);
				echo  $dataOut;
				die; 
		}
		
		public static function informEmployee()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php'); 
				$model1       = new TestModel();
				$informEmployee    = $model1->informEmployee($data);
				echo  $informEmployee;
				die; 
		}
		
		public static function wellnessCartBookingTimeUpdate()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$wellnessCartBookingTimeUpdate    = $model1->wellnessCartBookingTimeUpdate($data);
				$dataOut=json_encode($wellnessCartBookingTimeUpdate,true);
				echo  $dataOut;
				die; 
		}
		
		public static function hotelBookingListForFrontDeskCheckin()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$hotelBookingListForFrontDeskCheckin    = $model1->hotelBookingListForFrontDeskCheckin($data);
				$dataOut=json_encode($hotelBookingListForFrontDeskCheckin,true);
				echo  $dataOut;
				die; 
		}
		
		
		public static function allocateCheckedOutRoomForCleaning()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$allocateCheckedOutRoomForCleaning    = $model1->allocateCheckedOutRoomForCleaning($data);
				echo  $allocateCheckedOutRoomForCleaning;
				die; 
		}
		
		
		public static function hotelCheckedOutListForHousekeepingIncepectionStaff()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$hotelCheckedOutListForHousekeepingIncepectionStaff    = $model1->hotelCheckedOutListForHousekeepingIncepectionStaff($data);
				$dataOut=json_encode($hotelCheckedOutListForHousekeepingIncepectionStaff,true);
					echo  $dataOut;
					die; 
		}
		
		
		public static function allocateCheckedOutRoomForInspection()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$allocateCheckedOutRoomForInspection    = $model1->allocateCheckedOutRoomForInspection($data);
				echo  $allocateCheckedOutRoomForInspection;
				die; 
		}
		
		public static function updateCheckedOutRoomInspection()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				require_once('../configs/testMandril.php');
				$updateCheckedOutRoomInspection    = $model1->updateCheckedOutRoomInspection($data);
				echo  $updateCheckedOutRoomInspection;
				die; 
		}
		
		public static function updateCheckedOutRoomCleaning()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$updateCheckedOutRoomCleaning    = $model1->updateCheckedOutRoomCleaning($data);
				echo  $updateCheckedOutRoomCleaning;
				die; 
			   
		}
		
		public static function hotelCheckedOutListForCleningStaff()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$hotelCheckedOutListForCleningStaff    = $model1->hotelCheckedOutListForCleningStaff($data);
				$dataOut=json_encode($hotelCheckedOutListForCleningStaff,true);
				echo  $dataOut;
				die; 
		}
		
		
		
		public static function handoverKey()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				require_once('../configs/testMandril.php'); 
				$model1       = new TestModel();
				$handoverKey    = $model1->handoverKey($data);
				echo  $handoverKey;
				die; 
				 
			
		   
		}
		
		
		public static function checkOutGuest()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				require_once('../configs/testMandril.php'); 
				$model1       = new TestModel();
				$checkOutGuest    = $model1->checkOutGuest($data);
				echo  $checkOutGuest;
				die; 
		}
		
		public static function allocateRoomForCleaning()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$allocateRoomForCleaning    = $model1->allocateRoomForCleaning($data);
				echo  $allocateRoomForCleaning;
				die; 
		
		}
		
		
		public static function updateRoomCleaning()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				require_once('../configs/testMandril.php');
				$updateRoomCleaning    = $model1->updateRoomCleaning($data);
				echo  $updateRoomCleaning;
				die; 
		}
		
		
		public static function hotelBookingListForFrontDeskCheckout()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$hotelBookingListForFrontDeskCheckout    = $model1->hotelBookingListForFrontDeskCheckout($data);
				$dataOut=json_encode($hotelBookingListForFrontDeskCheckout,true);
				echo  $dataOut;
				die; 
		}
		
		
		public static function hotelBookingListForCleningStaff()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$hotelBookingListForCleningStaff    = $model1->hotelBookingListForCleningStaff($data);
				$dataOut=json_encode($hotelBookingListForCleningStaff,true);
				echo  $dataOut;
				die; 
		}
		
		public static function hotelBookingListForFrontDeskKeyhandling()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$hotelBookingListForFrontDeskKeyhandling    = $model1->hotelBookingListForFrontDeskKeyhandling($data);
				$dataOut=json_encode($hotelBookingListForFrontDeskKeyhandling,true);
				echo  $dataOut;
				die; 
		}
		
		public static function hotelBookingListForFrontDeskReceivedKey()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$hotelBookingListForFrontDeskReceivedKey    = $model1->hotelBookingListForFrontDeskReceivedKey($data);
				$dataOut=json_encode($hotelBookingListForFrontDeskReceivedKey,true);
				echo  $dataOut;
				die; 
		}
		
		public static function hotelBookingListForKeyGeneration()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$hotelBookingListForKeyGeneration    = $model1->hotelBookingListForKeyGeneration($data);
				$dataOut=json_encode($hotelBookingListForKeyGeneration,true);
				echo  $dataOut;
				die; 
		}
		
		
		public static function hotelBookingInstaBoxListForKeyGeneration()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$hotelBookingInstaBoxListForKeyGeneration    = $model1->hotelBookingInstaBoxListForKeyGeneration($data);
				$dataOut=json_encode($hotelBookingInstaBoxListForKeyGeneration,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
	 
		
	public static function checkEmployeeReference($co = null)
    {
       
			$data=array();
			$model1       = new TestModel();
			$checkEmployeeReference    = $model1->checkEmployeeReference($data);
            echo  $checkEmployeeReference;
			die; 
			 
        
       
    }
	
	public static function verifEmployeeInfo($co = null)
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);  
			$model1       = new TestModel();
			$verifEmployeeInfo    = $model1->verifEmployeeInfo($data);
             
				echo  $verifEmployeeInfo;
				die; 
			 
        
       
    }
	
	public static function releaseHotelInstabox($co = null)
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);  
			$model1       = new TestModel();
			$releaseHotelInstabox    = $model1->releaseHotelInstabox($data);
             
				echo  $releaseHotelInstabox;
				die; 
			 
        
       
    }
	
	public static function generateKeyForInstaBox($co = null)
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);  
			$model1       = new TestModel();
			$generateKeyForInstaBox    = $model1->generateKeyForInstaBox($data);
             
				echo  $generateKeyForInstaBox;
				die; 
			 
        
       
    }
		
		public static function dependentsCheckedInList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$dependentsCheckedInList    = $model1->dependentsCheckedInList($data);
				$dataOut=json_encode($dependentsCheckedInList,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function addDependentChekin()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$addDependentChekin    = $model1->addDependentChekin($data);
				echo  $addDependentChekin;
					die; 
				 
			
		   
		}
		
		public static function verifyDependentChekin()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$verifyDependentChekin    = $model1->verifyDependentChekin($data);
				echo  $verifyDependentChekin;
					die; 
				 
			
		   
		}
		
		
		public static function guestChildrenRemainingCount()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$guestChildrenRemainingCount    = $model1->guestChildrenRemainingCount($data);
				echo  $guestChildrenRemainingCount;
					die; 
				 
			
		   
		}
		
		public static function emailIinviteAdultForCheckin()
		{
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$emailIinviteAdultForCheckin    = $model1->emailIinviteAdultForCheckin($data);
				echo  $emailIinviteAdultForCheckin;
				die; 
				 
			
		   
		}
		
		public static function phoneIinviteAdultForCheckin()
		{
				require_once('../lib/url_shortener.php');
				require_once('../configs/smsMandril.php');
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$phoneIinviteAdultForCheckin    = $model1->phoneIinviteAdultForCheckin($data);
				echo  $phoneIinviteAdultForCheckin;
				die; 
				 
			
		   
		}
		
		
		public static function resendPhoneIinviteAdultForCheckin()
		{
				require_once('../lib/url_shortener.php');
				require_once('../configs/smsMandril.php');
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$resendPhoneIinviteAdultForCheckin    = $model1->resendPhoneIinviteAdultForCheckin($data);
				echo  $resendPhoneIinviteAdultForCheckin;
				die; 
				 
			
		   
		}
		
		public static function verifyUserInvitationInfo()
		{
				 
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$verifyUserInvitationInfo    = $model1->verifyUserInvitationInfo($data);
				echo  $verifyUserInvitationInfo;
				die; 
				   
		}
		
		public static function confirmUserInvitationInfo()
		{
				 
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$confirmUserInvitationInfo    = $model1->confirmUserInvitationInfo($data);
				echo  $confirmUserInvitationInfo;
				die; 
				   
		}
		
		
		public static function resendInvitation()
		{
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$resendInvitation    = $model1->resendInvitation($data);
				echo  $resendInvitation;
				die; 
				   
		}
		
		public static function adultsCheckedInList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
 			
				$model1       = new TestModel();
				$adultsCheckedInList    = $model1->adultsCheckedInList($data);
				$dataOut=json_encode($adultsCheckedInList,true);
				echo  $dataOut;
				die; 
				   
		}
		
		public static function countryCode()
		{
		   
				$model1       = new TestModel();
				$countryCode    = $model1->countryCode();
				$dataOut=json_encode($countryCode,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function updateGuestRecord()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$updateGuestRecord    = $model1->updateGuestRecord($data);
				echo  $updateGuestRecord;
				die; 
				 
			
		   
		}
		
		
		public static function userDetailsDstricts()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$userDetailsDstricts    = $model1->userDetailsDstricts($data);
				$dataOut=json_encode($userDetailsDstricts,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		 public static function venueInfomationDetail()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$venueInfomationDetail    = $model1->venueInfomationDetail($data);
				$dataOut=json_encode($venueInfomationDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function wellnessSearchFollowingCount()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$wellnessSearchFollowingCount    = $model1->wellnessSearchFollowingCount($data);
				 
					echo  $wellnessSearchFollowingCount;
					die; 
				 
			
		   
		}
		
		
		public static function deleteWellnessAllCartItems()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$deleteWellnessAllCartItems    = $model1->deleteWellnessAllCartItems($data);
				 
					echo  $deleteWellnessAllCartItems;
					die; 
				 
			
		   
		}
		
		
		public static function countWellnessOneToOneAvailableServices()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$countWellnessOneToOneAvailableServices    = $model1->countWellnessOneToOneAvailableServices($data);
				 
					echo  $countWellnessOneToOneAvailableServices;
					die; 
				 
			
		   
		}
		
		
		public static function selectedWellnessCategoriesandMenu()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$selectedWellnessCategoriesandMenu    = $model1->selectedWellnessCategoriesandMenu($data);
				$dataOut=json_encode($selectedWellnessCategoriesandMenu,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function wellnessUpdateFollowing()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$wellnessUpdateFollowing    = $model1->wellnessUpdateFollowing($data);
				 
					echo  $wellnessUpdateFollowing;
					die; 
				 
			
		   
		}
		
		public static function wellnessSearchList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$wellnessSearchList    = $model1->wellnessSearchList($data);
				$dataOut=json_encode($wellnessSearchList,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		public static function resturantPackageComboList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$resturantPackageComboList    = $model1->resturantPackageComboList($data);
				$dataOut=json_encode($resturantPackageComboList,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function resturantPackageCategoryList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$resturantPackageCategoryList    = $model1->resturantPackageCategoryList($data);
				$dataOut=json_encode($resturantPackageCategoryList,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function resturantPackageCategoryDishesList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$resturantPackageCategoryDishesList    = $model1->resturantPackageCategoryDishesList($data);
				$dataOut=json_encode($resturantPackageCategoryDishesList,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	
	public static function addPublicServiceToCartApp()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$addPublicServiceToCartApp    = $model1->addPublicServiceToCartApp($data);
				$dataOut=json_encode($addPublicServiceToCartApp,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	public static function wellnessSelectedServiceInfo()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				
				$model1       = new TestModel();
				$wellnessSelectedServiceInfo    = $model1->wellnessSelectedServiceInfo($data);
				$dataOut=json_encode($wellnessSelectedServiceInfo,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
	
	public static function deleteWellnessSharedItems()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$deleteWellnessSharedItems    = $model1->deleteWellnessSharedItems($data);
				$dataOut=json_encode($deleteWellnessSharedItems,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
	public static function WellnessPrivateCalenderInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$WellnessPrivateCalenderInfo    = $model1->WellnessPrivateCalenderInfo($data);
				$dataOut=json_encode($WellnessPrivateCalenderInfo,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function wellnessOpenCalenderInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$wellnessOpenCalenderInfo    = $model1->wellnessOpenCalenderInfo($data);
				$dataOut=json_encode($wellnessOpenCalenderInfo,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	
	  public static function cartInfoWellnessListCount()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$cartInfoWellnessListCount    = $model1->cartInfoWellnessListCount($data);
				$dataOut=json_encode($cartInfoWellnessListCount,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	 public static function UpdateWellnessCartItem()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$UpdateWellnessCartItem    = $model1->UpdateWellnessCartItem($data);
				$dataOut=json_encode($UpdateWellnessCartItem,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
	 public static function cartInfoWellnessList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$cartInfoWellnessList    = $model1->cartInfoWellnessList($data);
				$dataOut=json_encode($cartInfoWellnessList,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	
	
	 public static function addServiceToCartApp()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new TestModel();
				$addServiceToCartApp    = $model1->addServiceToCartApp($data);
				$dataOut=json_encode($addServiceToCartApp,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	
	public static function selectEmployeeForSelectedServices()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				
				$model1       = new TestModel();
				$selectEmployeeForSelectedServices    = $model1->selectEmployeeForSelectedServices($data);
				$dataOut=json_encode($selectEmployeeForSelectedServices,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function availableDatesForbooking()
		{
			
				$data=array();
					$model1       = new TestModel();
				$availableDatesForbooking    = $model1->availableDatesForbooking();
				$dataOut=json_encode($availableDatesForbooking,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	
	public static function employeeBookingCalenderInfoApp()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				
				$model1       = new TestModel();
				$employeeBookingCalenderInfoApp    = $model1->employeeBookingCalenderInfoApp($data);
				$dataOut=json_encode($employeeBookingCalenderInfoApp,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	 public static function selectedWellnessCategories()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				
				$model1       = new TestModel();
				$selectedWellnessCategories    = $model1->selectedWellnessCategories($data);
				$dataOut=json_encode($selectedWellnessCategories,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		 public static function selectedWellnessBookingAppMenu()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$selectedWellnessBookingAppMenu    = $model1->selectedWellnessBookingAppMenu($data);
				$dataOut=json_encode($selectedWellnessBookingAppMenu,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		
		public static function selectedWellnessCategoriesSelection()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				
				$model1       = new TestModel();
				$selectedWellnessCategories    = $model1->selectedWellnessCategoriesSelection($data);
				$dataOut=json_encode($selectedWellnessCategories,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
	 
		
		 public static function wellnessServiceInfoCount()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$wellnessServiceInfoCount    = $model1->wellnessServiceInfoCount($data);
				$dataOut=json_encode($wellnessServiceInfoCount,true);
					echo  $dataOut;
					die; 
		}
		
		 public static function selectedWellnessBookingAppMenuSelection()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new TestModel();
				$selectedWellnessBookingAppMenu    = $model1->selectedWellnessBookingAppMenuSelection($data);
				$dataOut=json_encode($selectedWellnessBookingAppMenu,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	
	
	public static function selectEmployee()
    {
			$model1       = new TestModel();
			$selectEmployee    = $model1->selectEmployee();
		   echo  $selectEmployee;
					die;
	   
    }
	 
	 
	public static function updateBookingTimeInfo()
    {
			$model1       = new TestModel();
			$updateBookingTimeInfo    = $model1->updateBookingTimeInfo();
		   echo  $updateBookingTimeInfo;
					die;
	   
    }
	
	public static function bookingCalenderInfo()
    {
			$model1       = new TestModel();
			$bookingCalenderInfo    = $model1->bookingCalenderInfo();
		 echo  $bookingCalenderInfo;
					die;
			 
	   
    }
	public static function bookingOpenCalenderInfo()
    {
			$model1       = new TestModel();
			$bookingCalenderInfo    = $model1->bookingOpenCalenderInfo();
		 echo  $bookingCalenderInfo;
					die;
			 
	   
    }
	
	public static function bookingPrivateCalenderInfo()
    {
			$model1       = new TestModel();
			$bookingPrivateCalenderInfo    = $model1->bookingPrivateCalenderInfo();
		 echo  $bookingPrivateCalenderInfo;
					die;
			 
	   
    }
	 
	
	public static function availableServiceCategories()
    {
			$model1       = new TestModel();
			$availableServiceCategories    = $model1->availableServiceCategories();
			$dataOut=json_encode($availableServiceCategories,true);
					echo  $dataOut;
					die;
	   
    }
	
	 public static function addServiceToCart()
		{
		   
				$data=array();
				  
				$model1       = new TestModel();
				$addServiceToCart    = $model1->addServiceToCart();
				$dataOut=json_encode($addServiceToCart,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		
		
		public static function addOpenOnetimeServiceToCart()
		{
		   
				$data=array();
				  
				$model1       = new TestModel();
				$addOpenOnetimeServiceToCart    = $model1->addOpenOnetimeServiceToCart();
				$dataOut=json_encode($addOpenOnetimeServiceToCart,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	
	
	public static function selectedServiceInfo()
    {
			$data=array();
			$data=$_POST;
			 
			$model1       = new TestModel();
			$selectedServiceInfo    = $model1->selectedServiceInfo($data);
			 $dataOut=json_encode($selectedServiceInfo,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function getServiceCompanies()
    {
			$model1       = new TestModel();
			$getServiceCompanies    = $model1->getServiceCompanies();
			$dataOut=json_encode($getServiceCompanies,true);
					echo  $dataOut;
					die;
	   
    }
	public static function getServiceLocations()
    {
			$model1       = new TestModel();
			$getServiceLocations    = $model1->getServiceLocations();
			$dataOut=json_encode($getServiceLocations,true);
					echo  $dataOut;
					die;
	   
    }
	public static function getServices()
    {
			$model1       = new TestModel();
			$getServices    = $model1->getServices();
			$dataOut=json_encode($getServices,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function getOneOnOneServices()
    {
			$model1       = new TestModel();
			$getServices    = $model1->getOneOnOneServices();
			$dataOut=json_encode($getServices,true);
					echo  $dataOut;
					die;
	   
    }
	 public static function getLocationInfo()
    {
			$model1       = new TestModel();
			$getLocationInfo    = $model1->getLocationInfo();
			$dataOut=json_encode($getLocationInfo,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function updateDishStock()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$updateDishStock    = $model1->updateDishStock($data);
			echo  $updateDishStock;
			die;
	   
    }
	
	public static function deleteDishItem()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$deleteDishItem    = $model1->deleteDishItem($data);
			echo  $deleteDishItem;
			die;
	   
    }
	public static function availableResturantList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$availableResturantList    = $model1->availableResturantList($data);
			$dataOut=json_encode($availableResturantList,true);
					echo  $dataOut;
					die;
	   
    } 
	public static function addGuestinfo()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			require_once('../lib/url_shortener.php');
			$addGuestinfo    = $model1->addGuestinfo($data);
			echo  $addGuestinfo;
			die;
	   
    }
	
	public static function waitlistResturant()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$waitlistResturant    = $model1->waitlistResturant($data);
			$dataOut=json_encode($waitlistResturant,true);
					echo  $dataOut;
					die;
	   
    } 
	
	public static function publishedResturantInfo()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$publishedResturantInfo    = $model1->publishedResturantInfo($data);
			$dataOut=json_encode($publishedResturantInfo,true);
					echo  $dataOut;
					die;
	   
    } 
	
	
	public static function hotelBathroomAppAmenities()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$hotelBathroomAppAmenities    = $model1->hotelBathroomAppAmenities($data);
			$dataOut=json_encode($hotelBathroomAppAmenities,true);
					echo  $dataOut;
					die;
	   
    } 
	
	public static function hotelMediaAppAmenities()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$hotelMediaAppAmenities    = $model1->hotelMediaAppAmenities($data);
			$dataOut=json_encode($hotelMediaAppAmenities,true);
					echo  $dataOut;
					die;
	   
    } 
	
	public static function hotelRoomAppAmenities()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$hotelRoomAppAmenities    = $model1->hotelRoomAppAmenities($data);
			$dataOut=json_encode($hotelRoomAppAmenities,true);
					echo  $dataOut;
					die;
	   
    } 
	
	public static function hotelBedAppAmenities()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$hotelBedAppAmenities    = $model1->hotelBedAppAmenities($data);
			$dataOut=json_encode($hotelBedAppAmenities,true);
					echo  $dataOut;
					die;
	   
    } 
	
	public static function selectedDish()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$selectedDish    = $model1->selectedDish($data);
			$dataOut=json_encode($selectedDish,true);
					echo  $dataOut;
					die;
	   
    }
	public static function foodTypeInformationSelected()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$selectedDish    = $model1->selectedDish($data);
			$data['warning']=$selectedDish['dish_warnings'];
			$foodTypeInformationSelected    = $model1->foodTypeInformationSelected($data);
			$dataOut=json_encode($foodTypeInformationSelected,true);
					echo  $dataOut;
					die;
	   
    }
	public static function editDishDetail()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$editDishDetail    = $model1->editDishDetail($data);
			echo  $editDishDetail;
			die;
	   
    }
	public static function updateDishNotAvailable()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$updateDishNotAvailable    = $model1->updateDishNotAvailable($data);
			echo  $updateDishNotAvailable;
			die;
	   
    }
	public static function ResturantMenu()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$ResturantMenu    = $model1->ResturantMenu($data);
			$dataOut=json_encode($ResturantMenu,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function resturantSearchList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$resturantSearchList    = $model1->resturantSearchList($data);
			$dataOut=json_encode($resturantSearchList,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function resturantProfileInfo()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$resturantProfileInfo    = $model1->resturantProfileInfo($data);
			$dataOut=json_encode($resturantProfileInfo,true);
					echo  $dataOut;
					die;
	   
    }
	public static function companyList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$companyList    = $model1->companyList($data);
			$dataOut=json_encode($companyList,true);
					echo  $dataOut;
					die;
	   
    }
	public static function usersList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$usersList    = $model1->usersList($data);
			$dataOut=json_encode($usersList,true);
					echo  $dataOut;
					die;
	   
    }
	public static function resturantWorkInfo()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$resturantWorkInfo    = $model1->resturantWorkInfo($data);
			$dataOut=json_encode($resturantWorkInfo,true);
					echo  $dataOut;
					die;
	   
    }
	public static function resturantServeInfo()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$resturantServeInfo    = $model1->resturantServeInfo($data);
			$dataOut=json_encode($resturantServeInfo,true);
					echo  $dataOut;
					die;
	   
    }
	public static function ResturantServeBasedMenu()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$ResturantServeBasedMenu    = $model1->ResturantServeBasedMenu($data);
			$dataOut=json_encode($ResturantServeBasedMenu,true);
					echo  $dataOut;
					die;
	   
    }
	public static function resturantDetail()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$resturantDetail    = $model1->resturantDetail($data);
			$dataOut=json_encode($resturantDetail,true);
					echo  $dataOut;
					die;
	   
    }
	public static function reservationList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$reservationList    = $model1->reservationList($data);
			$dataOut=json_encode($reservationList,true);
					echo  $dataOut;
					die;
	   
    }
	public static function resturantTableAvailable()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$resturantTableAvailable    = $model1->resturantTableAvailable($data);
			$dataOut=json_encode($resturantTableAvailable,true);
					echo  $dataOut;
					die;
	   
    }
	public static function resturantDiningHall()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$resturantDiningHall    = $model1->resturantDiningHall($data);
			$dataOut=json_encode($resturantDiningHall,true);
					echo  $dataOut;
					die;
	   
    }
	public static function requestTableBooking()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$requestTableBooking    = $model1->requestTableBooking($data);
			 
					echo  $requestTableBooking;
					die;
	   
    }
	public static function updateNoShow()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$updateNoShow    = $model1->updateNoShow($data);
			 
					echo  $updateNoShow;
					die;
	   
    }
	public static function updateInServicing()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$updateInServicing    = $model1->updateInServicing($data);
			 
					echo  $updateInServicing;
					die;
	   
    }
	public static function updateCloseService()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$updateCloseService    = $model1->updateCloseService($data);
			 
					echo  $updateCloseService;
					die;
	   
    }
	public static function operatorQueueWaitingCount()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$operatorQueueWaitingCount    = $model1->operatorQueueWaitingCount($data);
			echo  $operatorQueueWaitingCount;
			die;
	   
    }
	public static function alertGuest()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			require_once('../lib/url_shortener.php'); 
			$model1       = new TestModel();
			$alertGuest    = $model1->alertGuest($data);
			 
					echo  $alertGuest;
					die;
	   
    }
	public static function queueGuestDetail()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$queueGuestDetail    = $model1->queueGuestDetail($data);
			$dataOut=json_encode($queueGuestDetail,true);
					echo  $dataOut;
					die;
	   
    }
	public static function queueServicingGuestDetail()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$queueServicingGuestDetail    = $model1->queueServicingGuestDetail($data);
			$dataOut=json_encode($queueServicingGuestDetail,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function operatorQueueWaitingList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$operatorQueueWaitingList    = $model1->operatorQueueWaitingList($data);
			$dataOut=json_encode($operatorQueueWaitingList,true);
					echo  $dataOut;
					die;
	   
    }
	public static function operatorQueueServingList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$operatorQueueServingList    = $model1->operatorQueueServingList($data);
			$dataOut=json_encode($operatorQueueServingList,true);
					echo  $dataOut;
					die;
	   
    }
	public static function operatorQueueServedList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$operatorQueueServedList    = $model1->operatorQueueServedList($data);
			$dataOut=json_encode($operatorQueueServedList,true);
					echo  $dataOut;
					die;
	   
    }
	public static function operatorQueueList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$operatorQueueList    = $model1->operatorQueueList($data);
			$dataOut=json_encode($operatorQueueList,true);
					echo  $dataOut;
					die;
	   
    }
	public static function addPersonToDesiredQueue()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			require_once('../lib/url_shortener.php');
			$addPersonToDesiredQueue    = $model1->addPersonToDesiredQueue($data);
			echo  $addPersonToDesiredQueue;
			die;
	   
    }
	
	public static function userQueueList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$userQueueList    = $model1->userQueueList($data);
			$dataOut=json_encode($userQueueList,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function removeFromList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$removeFromList    = $model1->removeFromList($data);
			 
					echo  $removeFromList;
					die;
	   
    }
	
	public static function userQueueWaitingDetail()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$userQueueWaitingDetail    = $model1->userQueueWaitingDetail($data);
			$dataOut=json_encode($userQueueWaitingDetail,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function avalibleQueueOnTheLocation()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$avalibleQueueOnTheLocation    = $model1->avalibleQueueOnTheLocation($data);
			$dataOut=json_encode($avalibleQueueOnTheLocation,true);
					echo  $dataOut;
					die;
	   
    }
	public static function hotelCompleteInfo()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$hotelCompleteInfo    = $model1->hotelCompleteInfo($data);
			$dataOut=json_encode($hotelCompleteInfo,true);
					echo  $dataOut;
					die;
	   
    }
	public static function cartInfo()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$cartInfo    = $model1->cartInfo($data);
			$dataOut=json_encode($cartInfo,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function cartInfoList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$cartInfo    = $model1->cartInfoList($data);
			$dataOut=json_encode($cartInfo,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function cartAmenityInfoList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$cartAmenityInfoList    = $model1->cartAmenityInfoList($data);
			$dataOut=json_encode($cartAmenityInfoList,true);
					echo  $dataOut;
					die;
	   
    }
	public static function cartItemCount()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$cartItemCount    = $model1->cartItemCount($data);
			 
					echo  $cartItemCount;
					die;
	   
    }
	
	public static function cartAmenityItemCount()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$cartAmenityItemCount    = $model1->cartAmenityItemCount($data);
			 
					echo  $cartAmenityItemCount;
					die;
	   
    }
	
	public static function cartItemCountInfo()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$cartItemCountInfo    = $model1->cartItemCountInfo($data);
			 
					echo  $cartItemCountInfo;
					die;
	   
    }
	
	public static function selectedRoomServiceAppMenu()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$selectedRoomServiceAppMenu    = $model1->selectedRoomServiceAppMenu($data);
			$dataOut=json_encode($selectedRoomServiceAppMenu,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function selectedDrycleaningServeBasedAppMenu()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$selectedDrycleaningServeBasedAppMenu    = $model1->selectedDrycleaningServeBasedAppMenu($data);
			$dataOut=json_encode($selectedDrycleaningServeBasedAppMenu,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function selectedRoomServiceAppServes()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$selectedRoomServiceAppServes    = $model1->selectedRoomServiceAppServes($data);
			$dataOut=json_encode($selectedRoomServiceAppServes,true);
					echo  $dataOut;
					die;
	   
    }
	
	
	public static function selectedLaundaryCategories()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$selectedLaundaryCategories    = $model1->selectedLaundaryCategories($data);
			$dataOut=json_encode($selectedLaundaryCategories,true);
					echo  $dataOut;
					die;
	   
    }
	
	
	public static function selectedRoomServiceServeBasedAppMenu()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$selectedRoomServiceServeBasedAppMenu    = $model1->selectedRoomServiceServeBasedAppMenu($data);
			$dataOut=json_encode($selectedRoomServiceServeBasedAppMenu,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function UpdatecartItemCount()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$UpdatecartItemCount    = $model1->UpdatecartItemCount($data);
			 
					echo  $UpdatecartItemCount;
					die;
	   
    }
	
	public static function UpdateAmenitycartItemCount()
    {
		 
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$UpdateAmenitycartItemCount    = $model1->UpdateAmenitycartItemCount($data);
			 
					echo  $UpdateAmenitycartItemCount;
					die;
	   
    }
	
	public static function UpdatecartItemCountInfo()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$UpdatecartItemCountInfo    = $model1->UpdatecartItemCountInfo($data);
			 
					echo  $UpdatecartItemCountInfo;
					die;
	   
    }
	
	public static function encryptData()
    {
			//$data=array();
			$data=file_get_contents('php://input');
			 
			$model1       = new TestModel();
			$encryptData    = $model1->encryptData($data);
			 
					echo  $encryptData;
					die;
	   
    }
	
	public static function decryptData()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$decryptData    = $model1->decryptData($data);
			 
					echo  $decryptData;
					die;
	   
    }
	
	public static function payCartItemUsingApp()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			require_once('../lib/url_shortener.php');
			require_once('../configs/smsMandril.php'); 
			require_once('../configs/testMandril.php');
			 
			$model1       = new TestModel();
			$payCartItemUsingApp    = $model1->payCartItemUsingApp($data);
			 
					echo  $payCartItemUsingApp;
					die;
	   
    }
	
	public static function apartmentDetailInfo()
    {
       
			$data=array();
			$model1       = new TestModel();
			$apartmentDetailInfo    = $model1->apartmentDetailInfo();
            $dataOut=json_encode($apartmentDetailInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function apartmentAmenitiesDetailInfo()
    {
       
			$data=array();
			$model1       = new TestModel();
			$apartmentAmenitiesDetailInfo    = $model1->apartmentAmenitiesDetailInfo();
            $dataOut=json_encode($apartmentAmenitiesDetailInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function apartmentImages()
    {
       
			$data=array();
			$model1       = new TestModel();
			$apartmentImages    = $model1->apartmentImages();
            $dataOut=json_encode($apartmentImages,true);
					echo  $dataOut;
					die; 
        
       
    }
	public static function apartmentList()
    {
       
			$data=array();
			$model1       = new TestModel();
			$apartmentList    = $model1->apartmentList();
            $dataOut=json_encode($apartmentList,true);
					echo  $dataOut;
					die; 
        
       
    }
	public static function userDetails()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$userDetails    = $model1->userDetails($data);
			$dataOut=json_encode($userDetails,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function resturantList()
    {
       
			$data=array();
			$model1       = new TestModel();
			 
			$resturantList    = $model1->resturantList();
            $dataOut=json_encode($resturantList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function resturantCityList()
    {
       
			$data=array();
			$model1       = new TestModel();
			 
			$resturantCityList    = $model1->resturantCityList();
            $dataOut=json_encode($resturantCityList,true);
					echo  $dataOut;
					die; 
        
       
    }
	public static function resturantImages()
    {
       
			$data=array();
			$model1       = new TestModel();
			 
			$resturantImages    = $model1->resturantImages();
            $dataOut=json_encode($resturantImages,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function resturantInfo()
    {
       
			$data=array();
			$model1       = new TestModel();
			 
			$resturantInfo    = $model1->resturantInfo();
            $dataOut=json_encode($resturantInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function completeMenu()
    {
       
			$data=array();
			$model1       = new TestModel();
			 
			$completeMenu    = $model1->completeMenu();
            $dataOut=json_encode($completeMenu,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function longTermApartmentList()
    {
       
			$data=array();
			$model1       = new TestModel();
			$longTermApartmentList    = $model1->longTermApartmentList();
            $dataOut=json_encode($longTermApartmentList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function apartmentForSaleList()
    {
       
			$data=array();
			$model1       = new TestModel();
			$apartmentForSaleList    = $model1->apartmentForSaleList();
            $dataOut=json_encode($apartmentForSaleList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function apartmentIsAvailable()
    {
       
			$data=array();
			$model1       = new TestModel();
			$apartmentList    = $model1->apartmentIsAvailable();
           
					echo  $apartmentList;
					die; 
        
       
    }
	
	public static function hotelBathroomAmenities()
    {
			$data=array();
			$data=$_POST;
			 
			$model1       = new TestModel();
			$hotelBathroomAmenities    = $model1->hotelBathroomAmenities($data);
			 $dataOut=json_encode($hotelBathroomAmenities,true);
					echo  $dataOut;
					die;
	   
    }
		public static function selectedRoomServiceMenu()
    {
			$data=array();
			$data=$_POST;
			 
			$model1       = new TestModel();
			$selectedRoomServiceMenu    = $model1->selectedRoomServiceMenu($data);
			 $dataOut=json_encode($selectedRoomServiceMenu,true);
					echo  $dataOut;
					die;
	   
    }
	
	
	public static function selectedWellnessServiceMenu()
    {
			$data=array();
			$data=$_POST;
			 
			$model1       = new TestModel();
			$selectedWellnessServiceMenu    = $model1->selectedWellnessServiceMenu($data);
			 $dataOut=json_encode($selectedWellnessServiceMenu,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function selectedRoomServiceMenuItemInfo()
    {
			$data=array();
			$data=$_POST;
			 
			$model1       = new TestModel();
			$selectedRoomServiceMenuItemInfo    = $model1->selectedRoomServiceMenuItemInfo($data);
			 $dataOut=json_encode($selectedRoomServiceMenuItemInfo,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function selectedWellnessServiceMenuItemInfo()
    {
			$data=array();
			$data=$_POST;
			 
			$model1       = new TestModel();
			$selectedWellnessServiceMenuItemInfo    = $model1->selectedWellnessServiceMenuItemInfo($data);
			 $dataOut=json_encode($selectedWellnessServiceMenuItemInfo,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function updatePayRequired()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$updatePayRequired    = $model1->updatePayRequired($data);
			  
					echo  $updatePayRequired;
					die;
	   
    }
	
	public static function checkUsedDependentIdentificator()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$checkUsedDependentIdentificator    = $model1->checkUsedDependentIdentificator($data);
			  
					echo  $checkUsedDependentIdentificator;
					die;
	   
    }
	
	public static function dependentDetail()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$dependentDetail    = $model1->dependentDetail($data);
			$dataOut=json_encode($dependentDetail,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function verifyUserBookingExists()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$verifyUserBookingExists    = $model1->verifyUserBookingExists($data);
			  
					echo  $verifyUserBookingExists;
					die;
	   
    }
	
	public static function updateDependentCheckinIds()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$updateDependentCheckinIds    = $model1->updateDependentCheckinIds($data);
			  
					echo  $updateDependentCheckinIds;
					die;
	   
    }
	
	public static function checkSsn()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$checkSsn    = $model1->checkSsn($data);
			  
					echo  $checkSsn;
					die;
	   
    }
	
	public static function checkDependentSsn()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$checkDependentSsn    = $model1->checkDependentSsn($data);
			  
					echo  $checkDependentSsn;
					die;
	   
    }
	public static function addDependentImages()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$addDependentImages    = $model1->addDependentImages($data);
			  
					echo  $addDependentImages;
					die;
	   
    }
	
	public static function checkPassport()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$checkPassport    = $model1->checkPassport($data);
			  
					echo  $checkPassport;
					die;
	   
    }
	
	
		public static function updateDependent()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$updateDependent    = $model1->updateDependent($data);
			  
					echo  $updateDependent;
					die;
	   
    }
	 
	
	public static function addDependentProfileImages()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$addDependentProfileImages    = $model1->addDependentProfileImages($data);
			  
					echo  $addDependentProfileImages;
					die;
	   
    }
	
	public static function addDependentPassport()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$addDependentPassport    = $model1->addDependentPassport($data);
			  
					echo  $addDependentPassport;
					die;
	   
    }
	
	public static function addDependent()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			require_once('../lib/url_shortener.php');
				require_once('../configs/smsMandril.php');
			$addDependent    = $model1->addDependent($data);
			  
					echo  $addDependent;
					die;
	   
    }
	
	
	public static function dependentsList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$dependentsList    = $model1->dependentsList($data);
			$dataOut=json_encode($dependentsList,true);
					echo  $dataOut;
					die;
	   
    }
	
	
	public static function dependentsListForCheckin()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$dependentsList    = $model1->dependentsListForCheckin($data);
			$dataOut=json_encode($dependentsList,true);
					echo  $dataOut;
					die;
	   
    }
	
	
	public static function dependentsListForCheckinDstrict()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$dependentsList    = $model1->dependentsListForCheckinDstrict($data);
			$dataOut=json_encode($dependentsList,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function updateCheckRequired()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$updateCheckRequired    = $model1->updateCheckRequired($data);
			  
					echo  $updateCheckRequired;
					die;
	   
    }
	
	
	public static function countPickupAddress()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$countPickupAddress    = $model1->countPickupAddress($data);
			$dataOut=json_encode($countPickupAddress,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function pickupAddressDetail()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$pickupAddressDetail    = $model1->pickupAddressDetail($data);
			$dataOut=json_encode($pickupAddressDetail,true);
					echo  $dataOut;
					die;
	   
    }
	
	
	public static function updatePickupDelivery()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$updatePickupDelivery    = $model1->updatePickupDelivery($data);
			 
					echo  $updatePickupDelivery;
					die;
	   
    }
	
	public static function updatePickupAddress()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$updatePickupAddress    = $model1->updatePickupAddress($data);
			 
					echo  $updatePickupAddress;
					die;
	   
    }
	public static function orderHotelAppAmenity()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$orderHotelAppAmenity    = $model1->orderHotelAppAmenity($data);
			 
					echo  $orderHotelAppAmenity;
					die;
	   
    }
	public static function orderHotelAmenity()
    {
			$data=array();
			$model1       = new TestModel();
			$orderHotelAmenity    = $model1->orderHotelAmenity($data);
			  
					echo  $orderHotelAmenity;
					die;
	   
    }
	
	public static function hotelMediaAmenities()
    {
			$data=array();
			$data=$_POST;
			$model1       = new TestModel();
			$hotelMediaAmenities    = $model1->hotelMediaAmenities($data);
			 $dataOut=json_encode($hotelMediaAmenities,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function hotelRoomAmenities()
    {
			$data=array();
			$data=$_POST;
			$model1       = new TestModel();
			$hotelRoomAmenities    = $model1->hotelRoomAmenities($data);
			 $dataOut=json_encode($hotelRoomAmenities,true);
					echo  $dataOut;
					die;
	   
    }
	
	
	public static function hotelBedAmenities()
    {
			$data=array();
			$data=$_POST; 
			$model1       = new TestModel();
			$hotelBedAmenities    = $model1->hotelBedAmenities($data);
			 $dataOut=json_encode($hotelBedAmenities,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function employeeAtendence()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$checkEmployeeAttendence    = $model1->checkEmployeeAttendence($data);
			 echo $checkEmployeeAttendence; die;
			 
	   
    }
	
	public static function updateAttendence()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$updateAttendence    = $model1->updateAttendence($data);
			 
			echo $updateAttendence; die;
	   
    }
	
	public static function updateExit()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$updateExit    = $model1->updateExit($data);
			 
			echo $updateExit; die;
	   
    }
	
	public static function updateLeave()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$updateLeave    = $model1->updateLeave($data);
			 
			echo $updateLeave; die;
	   
    }
	
	public static function updateVacationInfo()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new TestModel();
			$updateVacationInfo    = $model1->updateVacationInfo($data);
			 
			echo $updateVacationInfo; die;
	   
    }
	
	public static function checkEmployeeTime()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$checkEmployeeTime    = $model1->checkEmployeeTime($data);
            $dataOut=json_encode($checkEmployeeTime,true);
					echo  $dataOut;
					die; 
        
       
    }
	
    public static function employerRequestCount()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			
			$employerRequestCount    = $model1->employerRequestCount($data);
            echo $employerRequestCount; die;
            
        
       
    }
    
	
	
	
	public static function employerRequestReceived()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$employerRequestReceived    = $model1->employerRequestReceived($data);
            $dataOut=json_encode($employerRequestReceived,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelPayInfo()
    {
       
			 
			$model1       = new TestModel();
			$hotelPayInfo    = $model1->hotelPayInfo();
			 
            $dataOut=json_encode($hotelPayInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function contactList()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$contactList    = $model1->contactList($data);
            $dataOut=json_encode($contactList,true);
			echo  $dataOut;
			die; 
        
       
    }
	
	public static function approveEmployerRequest()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$data['stat']=1;
			$model1       = new TestModel();
			$approveEmployerRequest    = $model1->approveEmployerRequest($data);
            $dataOut=json_encode($approveEmployerRequest,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	
	public static function daycareRequestCount()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$daycareRequestCount    = $model1->daycareRequestCount($data);
            $dataOut=json_encode($daycareRequestCount,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function rejectEmployerRequest()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$data['stat']=2;  
			$model1       = new TestModel();
			$approveEmployerRequest    = $model1->approveEmployerRequest($data);
            $dataOut=json_encode($approveEmployerRequest,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function getCheckedInHotel()
    {
			$data=array();
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			$model1       = new TestModel();
			$getCheckedInHotel    = $model1->getCheckedInHotel();
            echo  $getCheckedInHotel;
			die; 
     }
	 
	public static function getFrontDeskCheckedInHotel()
    {
			$data=array();
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			$model1       = new TestModel();
			$getFrontDeskCheckedInHotel    = $model1->getFrontDeskCheckedInHotel();
            echo  $getFrontDeskCheckedInHotel;
			die; 
     }
	 
	public static function isHotel()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			$model1       = new TestModel();
			$isHotel    = $model1->isHotel($data);
            echo  $isHotel;
			die; 
     }
    
      public static function checkConnect($co = null)
    {
       
			$data=array();
			 $data['certi']=cleanMe($co);
			  
            $model1       = new TestModel();
			$checkConnect    = $model1->checkConnect($data);
            echo $checkConnect; die;
			 
        
       
    }
	
	public static function lawCompanyDetails()
    {
       
			$data=array();
			$model1       = new TestModel();
			$lawCompanyDetails    = $model1->lawCompanyDetails();
            $dataOut=json_encode($lawCompanyDetails,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function lawersInfo()
    {
       
			$data=array();
			$model1       = new TestModel();
			$lawersInfo    = $model1->lawersInfo();
            $dataOut=json_encode($lawersInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelList()
    {
       
			$data=array();
			$model1       = new TestModel();
			$hotelList    = $model1->hotelList();
            $dataOut=json_encode($hotelList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelRoomTypeList()
    {
       
			$data=array();
			$model1       = new TestModel();
			$hotelRoomTypeList    = $model1->hotelRoomTypeList();
            $dataOut=json_encode($hotelRoomTypeList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelRoomTypeCheckinList()
    {
       
			$data=array();
			$model1       = new TestModel();
			 
			$hotelRoomTypeCheckinList    = $model1->hotelRoomTypeCheckinList();
            $dataOut=json_encode($hotelRoomTypeCheckinList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function getAvailableRooms()
    {
       
			$data=array();
			$model1       = new TestModel();
			$data=json_decode(file_get_contents('php://input'), true); 
			$getAvailableRooms    = $model1->getAvailableRooms($data);
			 
            $dataOut=json_encode($getAvailableRooms,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	 
	
	public static function hotelCheckinList()
    {
       
			$data=array();
			$model1       = new TestModel();
			 
			$hotelCheckinList    = $model1->hotelCheckinList();
            $dataOut=json_encode($hotelCheckinList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function apartmentPayInfo()
    {
       
			$data=array();
			$model1       = new TestModel();
			 
			$apartmentPayInfo    = $model1->apartmentPayInfo();
            $dataOut=json_encode($apartmentPayInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function apartmentCheckedInList()
    {
       
			$data=array();
			$model1       = new TestModel();
			 
			$apartmentCheckedInList    = $model1->apartmentCheckedInList();
            $dataOut=json_encode($apartmentCheckedInList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	
	public static function apartmentOwnerCheckedInList()
    {
       
			$data=array();
			$model1       = new TestModel();
			 
			$apartmentOwnerCheckedInList    = $model1->apartmentOwnerCheckedInList();
            $dataOut=json_encode($apartmentOwnerCheckedInList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	
	
	
	 
	public static function hotelImages()
    {
       
			$data=array();
			$model1       = new TestModel();
			$hotelImages    = $model1->hotelImages();
            $dataOut=json_encode($hotelImages,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelImagesCount()
    {
       
			$data=array();
			$model1       = new TestModel();
			$hotelImagesCount    = $model1->hotelImagesCount();
            echo  $hotelImagesCount;
			die; 
        
       
    }
	
	public static function bookingDetails()
    {
       
			 
			$model1       = new TestModel();
			$bookingDetails    = $model1->bookingDetails();
           $dataOut=json_encode($bookingDetails,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelDetailInfo()
    {
       
			$data=array();
			$model1       = new TestModel();
			$hotelDetailInfo    = $model1->hotelDetailInfo();
            $dataOut=json_encode($hotelDetailInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function hotelDetailRoomTypeInfo()
    {
       
			$data=array();
			$model1       = new TestModel();
			$hotelDetailRoomTypeInfo    = $model1->hotelDetailRoomTypeInfo();
            $dataOut=json_encode($hotelDetailRoomTypeInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelRoomTypeInfo()
    {
       
			$data=array();
			$model1       = new TestModel();
			$hotelRoomTypeInfo    = $model1->hotelRoomTypeInfo();
            $dataOut=json_encode($hotelRoomTypeInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function hotelRoomTypePriceInfo()
    {
       
			$data=array();
			$model1       = new TestModel();
			$hotelRoomTypePriceInfo    = $model1->hotelRoomTypePriceInfo();
            $dataOut=json_encode($hotelRoomTypePriceInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelRoomTypeImages()
    {
       
			$data=array();
			$model1       = new TestModel();
			$hotelRoomTypeImages    = $model1->hotelRoomTypeImages();
            $dataOut=json_encode($hotelRoomTypeImages,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function languagesKnown()
    {
       
			$data=array();
			$model1       = new TestModel();
			$languagesKnown    = $model1->languagesKnown();
            $dataOut=json_encode($languagesKnown,true);
					echo  $dataOut;
					die; 
        
       
    }
	 public static function addAddress()
    {
       
			$data=array();
			$data=json_decode(htmlentities(file_get_contents('php://input'),ENT_NOQUOTES, 'UTF-8'), true);
			//echo html_entity_decode($data['DeliveryAddress'],ENT_NOQUOTES, 'UTF-8');
			//print_r($data); die;
			$model1       = new TestModel();
			$addAddress    = $model1->addAddress($data);
            echo $addAddress; die;
			 
        
       
    }
	
	public static function addNewAddress()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$addNewAddress    = $model1->addNewAddress($data);
            echo $addNewAddress; die;
			 
        
       
    }
	
	
	public static function getPurchaseDetail()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$getPurchaseDetail    = $model1->getPurchaseDetail($data);
             $dataOut=json_encode($getPurchaseDetail,true);
					echo  $dataOut;
					die; 
			 
        
       
    }
	
	
	public static function getBookingDetail()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$getBookingDetail    = $model1->getBookingDetail($data);
             $dataOut=json_encode($getBookingDetail,true);
					echo  $dataOut;
					die; 
			 
        
       
    }
	
	
	public static function verifyCheckinDetail()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$verifyCheckinDetail    = $model1->verifyCheckinDetail($data);
             $dataOut=json_encode($verifyCheckinDetail,true);
					echo  $dataOut;
					die; 
			 
        
       
    }
	
	public static function updateUserAddress()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$updateUserAddress    = $model1->updateUserAddress($data);
            echo $updateUserAddress; die;
			 
        
       
    }
	
	public static function updateCompanyAddress()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$updateCompanyAddress    = $model1->updateCompanyAddress($data);
            echo $updateCompanyAddress; die;
			 
        
       
    }
	
	public static function checkCard()
		{
		$data=array();
		$data=json_decode(file_get_contents('php://input'), true);
		 
		require "../cardvalidity/vendor/autoload.php";	
		$detector = new CardDetect\Detector();
		$card = $data['CardNumber'];

		$cardValue=$detector->detect($card); //Visa
		 
		if($cardValue=='Invalid Card')
		{
			echo 2; die;
		}
		else
		{
		$data['card_type']=$cardValue;
		$model1       = new TestModel();
		$saveCardDetails    = $model1->saveCardDetails($data);
		echo $saveCardDetails; die;			
		}	
		
			
		}
	
	 public static function checkValidity($co = null)
    {
       
			$data=array();
			 $data['certi']=cleanMe($co);
			 
            $model1       = new TestModel();
			$checkValidity    = $model1->checkValidity($data);
            $dataOut=json_encode($checkValidity,true);
					echo  $dataOut;
					die; 
			 
        
       
    }
	
	
	public static function updateLoginStatus($co = null)
    {
       
			$data=array();
			 $data['certi']=cleanMe($co);
			 
            $model1       = new TestModel();
			$updateLoginStatus    = $model1->updateLoginStatus($data);
            echo $updateLoginStatus; die;
			 
        
       
    }
	
	
	  public static function checkPassword($co = null)
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				 
				$data['certi']=cleanMe($co);
				
				$data['password']=md5($data['password']);
				 
				$model1       = new TestModel();
				$checkPassword    = $model1->checkPassword($data);
				$dataOut=json_encode($checkPassword,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		 public static function userDeliveryInvoiceInfo()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new TestModel();
				$userDeliveryInvoiceInfo    = $model1->userDeliveryInvoiceInfo($data);
				$dataOut=json_encode($userDeliveryInvoiceInfo,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		 public static function listCardDetails()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new TestModel();
				$listCardDetails    = $model1->listCardDetails($data);
				$dataOut=json_encode($listCardDetails,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function certificateExxpiryInfo()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new TestModel();
				$certificateExxpiryInfo    = $model1->certificateExxpiryInfo($data);
				$dataOut=json_encode($certificateExxpiryInfo,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function listAddresses()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new TestModel();
				$listAddresses    = $model1->listAddresses($data);
				$dataOut=json_encode($listAddresses,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		
		
		
		
		public static function listDeliveryAddresses()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new TestModel();
				$listAddresses    = $model1->listDeliveryAddresses($data);
				$dataOut=json_encode($listAddresses,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function invoiceAddresses()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new TestModel();
				$invoiceAddresses    = $model1->invoiceAddresses($data);
				$dataOut=json_encode($invoiceAddresses,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		 
		
		public static function addressDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new TestModel();
				$addressDetail    = $model1->addressDetail($data);
				$dataOut=json_encode($addressDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function deliveryAddressDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new TestModel();
				$addressDetail    = $model1->deliveryAddressDetail($data);
				$dataOut=json_encode($addressDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function cardDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new TestModel();
				$cardDetail    = $model1->cardDetail($data);
				$dataOut=json_encode($cardDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function companyAddressDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new TestModel();
				$companyAddressDetail    = $model1->companyAddressDetail($data);
				$dataOut=json_encode($companyAddressDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		 public static function profileDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new TestModel();
				$profileDetail    = $model1->profileDetail($data);
				$dataOut=json_encode($profileDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		 public static function addFoodToCart()
		{
		   
				$data=array();
				 
				$model1       = new TestModel();
				$addFoodToCart    = $model1->addFoodToCart();
				$dataOut=json_encode($addFoodToCart,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		 public static function addFoodDetailToCart()
		{
		   
				$data=array();
				 
				$model1       = new TestModel();
				$addFoodToCart    = $model1->addFoodDetailToCart();
				$dataOut=json_encode($addFoodToCart,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		 public static function addDrycleaningItemToCart()
		{
		   
				$data=array();
				 
				$model1       = new TestModel();
				$addDrycleaningItemToCart    = $model1->addDrycleaningItemToCart();
				$dataOut=json_encode($addDrycleaningItemToCart,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		 public static function removeItemFromCart()
		{
		   
				$data=array();
				$model1       = new TestModel();
				$removeItemFromCart    = $model1->removeItemFromCart();
				$dataOut=json_encode($removeItemFromCart,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		 public static function removeBookingFromCart()
		{
		   
				$data=array();
				$model1       = new TestModel();
				$removeBookingFromCart    = $model1->removeBookingFromCart();
				$dataOut=json_encode($removeBookingFromCart,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		 public static function removeAmenityFromCart()
		{
		   
				$data=array();
				$model1       = new TestModel();
				$removeAmenityFromCart    = $model1->removeAmenityFromCart();
				 
					echo  $removeAmenityFromCart;
					die; 
				 
			
		   
		}
		 public static function createNewAccount()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model1       = new TestModel();
				$createNewAccount    = $model1->createNewAccount($data);
				$dataOut=json_encode($createNewAccount,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function createEmailAccount()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model1       = new TestModel();
				$createEmailAccount    = $model1->createEmailAccount($data);
				$dataOut=json_encode($createEmailAccount,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		 public static function restoreAccount()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model1       = new TestModel();
				$restoreAccount    = $model1->restoreAccount($data);
				$dataOut=json_encode($restoreAccount,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function verifyEmailOtpPin()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model1       = new TestModel();
				$verifyEmailOtpPin    = $model1->verifyEmailOtpPin($data);
				$dataOut=json_encode($verifyEmailOtpPin,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function verifyRestoreOtpPin()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model1       = new TestModel();
				$verifyRestoreOtpPin    = $model1->verifyRestoreOtpPin($data);
				$dataOut=json_encode($verifyRestoreOtpPin,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		public static function verifyRestoreOtpPinWithMobile()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/smsMandril.php');
				
				$model1       = new TestModel();
				 
				$verifyRestoreOtpPin    = $model1->verifyRestoreOtpPinWithMobile($data);
				$dataOut=json_encode($verifyRestoreOtpPin,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function verifyPhoneOtpPin()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model1       = new TestModel();
				$verifyPhoneOtpPin    = $model1->verifyPhoneOtpPin($data);
				$dataOut=json_encode($verifyPhoneOtpPin,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function verifyPhoneOtpPinWithId()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model1       = new TestModel();
				$verifyPhoneOtpPin    = $model1->verifyPhoneOtpPinWithId($data);
				$dataOut=json_encode($verifyPhoneOtpPin,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function verifyAddMobileOtp()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				 
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				 
				$model1       = new TestModel();
				$verifyAddMobileOtp    = $model1->verifyAddMobileOtp($data);
				$dataOut=json_encode($verifyAddMobileOtp,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		
		public static function addIdentificator()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model1       = new TestModel();
				$addIdentificator    = $model1->addIdentificator($data);
				$dataOut=json_encode($addIdentificator,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function identificatorDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new TestModel();
				$identificatorDetail    = $model1->identificatorDetail($data);
				$dataOut=json_encode($identificatorDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function addIdentificatorName()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model1       = new TestModel();
				$addIdentificator    = $model1->addIdentificatorName($data);
				$dataOut=json_encode($addIdentificator,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function addIdentificatorImages()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				 
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model1       = new TestModel();
				$addIdentificatorImages    = $model1->addIdentificatorImages($data);
				$dataOut=json_encode($addIdentificatorImages,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		 
		
		public static function generateCertificate()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model1       = new TestModel();
				 
				$generateCertificate    = $model1->generateCertificate($data);
				$dataOut=json_encode($generateCertificate,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function verifyUserMobile()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				 
				require_once('../lib/url_shortener.php');
				require_once('../configs/smsMandril.php');
				$model1       = new TestModel();
				$verifyUserMobile    = $model1->verifyUserMobile($data);
				$dataOut=json_encode($verifyUserMobile,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function checkMobileAvailability()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				  
				require_once('../lib/url_shortener.php');
				require_once('../configs/smsMandril.php');
				$model1       = new TestModel();
				$checkMobileAvailability    = $model1->checkMobileAvailability($data);
				$dataOut=json_encode($checkMobileAvailability,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
			 public static function purchaseDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new TestModel();
				$purchaseDetail    = $model1->purchaseDetail($data);
				 
					echo  $purchaseDetail;
					die; 
				 
			
		   
		}
		
		
			 public static function updateCardPurchaseDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new TestModel();
				$updateCardPurchaseDetail    = $model1->updateCardPurchaseDetail($data);
				 
					echo  $updateCardPurchaseDetail;
					die; 
				 
			
		   
		}
		
		
		 public static function savePurchaseCardDetails()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new TestModel();
				$savePurchaseCardDetails    = $model1->savePurchaseCardDetails($data);
				 
					echo  $savePurchaseCardDetails;
					die; 
				 
			
		   
		}
		
		
		 public static function saveUpdatedPurchaseCardDetails()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				 
				$model1       = new TestModel();
				$savePurchaseCardDetails    = $model1->saveUpdatedPurchaseCardDetails($data);
				 
					echo  $savePurchaseCardDetails;
					die; 
				 
			
		   
		}
		
		
		 public static function confirmPurchase()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new TestModel();
				$confirmPurchase    = $model1->confirmPurchase($data);
				echo  $confirmPurchase;
				die; 
			}
	
	
	 public static function purchaseDetailUpdate()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new TestModel();
				$purchaseDetailUpdate    = $model1->purchaseDetailUpdate($data);
				 
					$dataOut=json_encode($purchaseDetailUpdate,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	
	
	
	 public static function verifyPassword($co = null)
    {
       
			$data=array();
			 
			
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$data['password']=md5($data['password']);
			
			$data['certi']=cleanMe($co);
			 
            $model1       = new TestModel();
			$verifyPassword    = $model1->verifyPassword($data);
            
				echo  $verifyPassword;
				die; 
			 
        
       
    }
	
	
	public static function verifyInterAppPassword()
    {
       
			$data=array();
			 
			
			$data=json_decode(file_get_contents('php://input'), true);
			
			$data['password']=md5($data['password']);
			$model1       = new TestModel();
			$verifyPassword    = $model1->verifyInterAppPassword($data);
            $dataOut=json_encode($verifyPassword,true);
					echo  $dataOut;
					die; ; 
			 
        
       
    }
	
	public static function verifyInterAppSession($co = null)
    {
       
			$data=array();
			 
			
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$verifyInterAppSession    = $model1->verifyInterAppSession($data);
            $dataOut=json_encode($verifyInterAppSession,true);
					echo  $dataOut;
					die; ; 
			 
        
       
    }
	
	public static function verifyAdmin()
    {
       
			$data=array();
			 
			
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$verifyAdmin    = $model1->verifyAdmin($data);
            $dataOut=json_encode($verifyAdmin,true);
					echo  $dataOut;
					die; ; 
			 
        
       
    }
	
	
	public static function companyDownloadedApps()
    {
       
			$data=array();
			 
			
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new TestModel();
			$companyDownloadedApps    = $model1->companyDownloadedApps($data);
            $dataOut=json_encode($companyDownloadedApps,true);
					echo  $dataOut;
					die; ; 
			 
        
       
    }
	
	 public static function verifyUserConsent()
    {
       
			$data=array();
			 
			
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$data['clientId']=$data['clientId'];
			
			$data['certi']=$data['certificate'];
			 
            $model1       = new TestModel();
			$verifyUserConsent    = $model1->verifyUserConsent($data);
            
				$dataOut=json_encode($verifyUserConsent,true);
					echo  $dataOut;
				die; 
			 
        
       
    }
	
	
	public static function clearIps($co = null)
    {
       
			$data=array();
			$data['certi']=cleanMe($co);
			$model1       = new TestModel();
			$clearIps    = $model1->clearIps($data);
            
				echo  $clearIps;
				die; 
			 
        
       
    }
	
	
	public static function clearLogin($co = null)
    {
       
			$data=array();
			$data['certi']=cleanMe($co);
			$model1       = new TestModel();
			$clearLogin    = $model1->clearLogin($data);
            
				echo  $clearLogin;
				die; 
			 
        
       
    }
	
	public static function clearCertificate($co = null)
    {
       
			$data=array();
			$data['certi']=cleanMe($co);
			$model1       = new TestModel();
			$clearCertificate    = $model1->clearCertificate($data);
            
				echo  $clearCertificate;
				die; 
			 
        
       
    }
	
	
	public static function checkOrderReference($co = null)
    {
       
			$data=array();
			 
            $model1       = new TestModel();
			$checkOrderReference    = $model1->checkOrderReference($data);
             
				echo  $checkOrderReference;
				die; 
			 
        
       
    }
	
	public static function getUserId($co = null)
    {
       
			$data=array();
			 
            $model1       = new TestModel();
			$getUserId    = $model1->getUserId($data);
             
				echo  $getUserId;
				die; 
			 
        
       
    }
	   
    public static function updateLoginIp($co = null)
    {
       
			$data=array();
			
			$data=json_decode(file_get_contents('php://input'), true);
			
			$data['certi']=cleanMe($co);
			
            $model1       = new TestModel();
			$updateLoginIp    = $model1->updateLoginIp($data);
             echo $updateLoginIp; die;
			 
        
       
    }
}


?>