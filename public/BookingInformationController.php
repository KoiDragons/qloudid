<?php
require_once 'BookingInformationModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class BookingInformationController
{
	
	
	
	public static function checkEmailInfo($co=null)
		{
				$model1       = new BookingInformationModel();
				$data=array();
				$data['invitation_id']=cleanMe($co);
				$result    = $model1->checkEmailInfo($data);
				echo $result; die;
		}
		
		public static function checkPhoneInfo($co=null)
		{
				$model1       = new BookingInformationModel();
				$data=array();
				$data['invitation_id']=cleanMe($co);
				$result    = $model1->checkPhoneInfo($data);
				echo $result; die;
				 
		}
		
		 
		public static function checkPassportInfo($co=null)
		{
				$model1       = new BookingInformationModel();
				$data=array();
				$data['invitation_id']=cleanMe($co);
				$result    = $model1->checkPassportInfo($data);
				echo $result; die;
				
		}
		
		
		public static function checkUserEmailInfo($co=null)
		{
				$model1       = new BookingInformationModel();
				$data=array();
				$data['invitation_id']=cleanMe($co);
				$result    = $model1->checkUserEmailInfo($data);
				echo $result; die;
		}
		
		public static function checkUserPhoneInfo($co=null)
		{
				$model1       = new BookingInformationModel();
				$data=array();
				$data['invitation_id']=cleanMe($co);
				$result    = $model1->checkUserPhoneInfo($data);
				echo $result; die;
				 
		}
		
		 
		public static function checkUserPassportInfo($co=null)
		{
				$model1       = new BookingInformationModel();
				$data=array();
				$data['invitation_id']=cleanMe($co);
				$result    = $model1->checkUserPassportInfo($data);
				echo $result; die;
				
		}
		
		
	public static function invitationInformation($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['invitation_id']=cleanMe($a);
			$model1       = new BookingInformationModel();
			$adultInvitationDetail    = $model1->adultInvitationDetail($data);
			$data['user_id']=$adultInvitationDetail['invited_user_id'];
			$data['checkout_id']=$adultInvitationDetail['hotel_checkout_id'];
			$data['hotel_checkin_id']=$data['checkout_id'];
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			 
			if($bookingInformationDetail['checked_in']==0)
			{
			 header('location:../waitCheckin/'.$data['checkout_id']); die;		
			}
			$countryCode    = $model1->selectCountryDetail(); 
			if($adultInvitationDetail['is_confirmed']==1)
			{
			$updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data); 
			if($updatePreCheckinStatus['total_left']==0)
			{
				 header('location:../welcomeCheckin/'.$data['checkout_id']); die;	
			}
			else
			{
				 header('location:../precheckedPersons/'.$data['checkout_id']); die;	
			}
			
			}
			 
			if($data['user_id']==0)
			{
				if($adultInvitationDetail['invitation_type']==1)
				{
					require_once('BookingInformationInvitedGuestPhoneDetailViewNew.php');	
				}
				else
				{
					require_once('BookingInformationInvitedGuestDetailViewNew.php');	
				}
			
			}
            else
			{
				$userSummary    = $model1->userSummary($data);
				$userPassport    = $model1->userPassport($data);
				require_once('BookingInformationInvitedUserPassportViewNew.php');
			}
	 
	}
	
	
	public static function addPhoneAccountInformation($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['invitation_id']=cleanMe($a);
			$model1       = new BookingInformationModel();
			$adultInvitationDetail    = $model1->adultInvitationDetail($data);
			$data['checkout_id']=$adultInvitationDetail['hotel_checkout_id'];
			$data['hotel_checkin_id']=$data['checkout_id'];
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			$countryCode    = $model1->selectCountryDetail();
 		
			if($adultInvitationDetail['is_confirmed']==1)
			{
			 $updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data); 
			if($updatePreCheckinStatus['total_left']==0)
			{
				 header('location:../welcomeCheckin/'.$data['checkout_id']); die;	
			}
			else
			{
				 header('location:../precheckedPersons/'.$data['checkout_id']); die;	
			}
			}
            require_once('BookingInformationInvitedGuestPhonePassportViewNew.php');
	 
	}
	
	public static function addAccountInformation($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['invitation_id']=cleanMe($a);
			$model1       = new BookingInformationModel();
			$adultInvitationDetail    = $model1->adultInvitationDetail($data);
			$data['checkout_id']=$adultInvitationDetail['hotel_checkout_id'];
			$data['hotel_checkin_id']=$data['checkout_id'];
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			$countryCode    = $model1->selectCountryDetail(); 
		 
		if($adultInvitationDetail['is_confirmed']==1)
			{
			 $updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data); 
			if($updatePreCheckinStatus['total_left']==0)
			{
				 header('location:../welcomeCheckin/'.$data['checkout_id']); die;	
			}
			else
			{
				 header('location:../precheckedPersons/'.$data['checkout_id']); die;	
			}
			}
            require_once('BookingInformationInvitedGuestPassportViewNew.php');
	 
	}
	
	
	public static function updateGuestPassportDetails($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['invitation_id']=cleanMe($a);
			$model1       = new BookingInformationModel();
			$adultInvitationDetail    = $model1->adultInvitationDetail($data);
			$data['checkout_id']=$adultInvitationDetail['hotel_checkout_id'];
			$data['hotel_checkin_id']=$data['checkout_id'];
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			$updateGuestPassportDetails    = $model1->updateGuestPassportDetails($data); 
           header('location:../welcomeCheckin/'.$data['checkout_id']);
	 
	}
	
	
	public static function updateUserPassportDetails($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['invitation_id']=cleanMe($a);
			$model1       = new BookingInformationModel();
			$adultInvitationDetail    = $model1->adultInvitationDetail($data);
			$data['checkout_id']=$adultInvitationDetail['hotel_checkout_id'];
			$data['hotel_checkin_id']=$data['checkout_id'];
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			$data['user_id']=$adultInvitationDetail['invited_user_id'];
			$updateUserPassportDetails    = $model1->updateUserPassportDetails($data); 
            header('location:../welcomeCheckin/'.$data['checkout_id']);
	 
	}
	
	public static function verifyCheckinCode($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['apartment_id']=cleanMe($a);
			header('location:../checkinQR/'.$data['apartment_id']); die;
			$model1       = new BookingInformationModel();
            require_once('BookingInformationCodeVerificationView.php');
	 
	}
	public static function checkBookingCode($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['apartment_id']=cleanMe($a);
			$model1       = new BookingInformationModel();
			$checkBookingCode    = $model1->checkBookingCode($data);
            echo $checkBookingCode; die;
	 
	}
	
	public static function checkHotelBookingCode($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['hotel_id']=cleanMe($a);
			$model1       = new BookingInformationModel();
			$checkHotelBookingCode    = $model1->checkHotelBookingCode($data);
            echo $checkHotelBookingCode; die;
	 
	}
	public static function checkedInDetail($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['checkout_id']=cleanMe($a);
			$data['hotel_checkin_id']=$data['checkout_id'];
			$model1       = new BookingInformationModel();
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			 
			if($bookingInformationDetail['reservation_confirmed']==0)
				{
				header('location:../../BookingInformation/verifyBookingDetail/'.$data['hotel_checkin_id']); die;	
				}
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$userSummary    = $model1->userSummary($data);
			$adultsCheckedInList    = $model1->adultsCheckedInList($data);
			$dependentsCheckedInList    = $model1->dependentsCheckedInList($data);
			$updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data); 
			$getUserActiveStatus    = $model1->getUserActiveStatus($data);
			if($getUserActiveStatus['address']+$getUserActiveStatus['cards']+$getUserActiveStatus['passport']<3)
			{
				header('location:../../PrecheckinInformation/userActiveStatus/'.$data['hotel_checkin_id']); die;
			}
            require_once('BookingInformationChekedInView.php');
	 
	}
	
	
	
	public static function precheckedPersons($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['checkout_id']=cleanMe($a);
			$data['hotel_checkin_id']=$data['checkout_id'];
			$model1       = new BookingInformationModel();
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			 
			if($bookingInformationDetail['reservation_confirmed']==0)
				{
				header('location:../../BookingInformation/verifyBookingDetail/'.$data['hotel_checkin_id']); die;	
				}
				
				  
			if($bookingInformationDetail['checked_in']==1)
				{
				if(!isset($_POST['precheck_verify']))
				{
					header('location:https://www.dstricts.com/public/index.php/BookingInformation/checkedInDetail/'.$data['hotel_checkin_id']); die;
				}
				else
				{
				$data['user_id']=$bookingInformationDetail['user_id'];
				$data['uid']=$bookingInformationDetail['uid'];
				$userSummary    = $model1->userSummary($data);
				$adultsCheckedInList    = $model1->adultsCheckedInList($data);
				$dependentsCheckedInList    = $model1->dependentsCheckedInList($data);
				$updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data); 
				$getUserActiveStatus    = $model1->getUserActiveStatus($data);
				if($getUserActiveStatus['address']+$getUserActiveStatus['cards']+$getUserActiveStatus['passport']<3)
				{
					header('location:../../PrecheckinInformation/userActiveStatus/'.$data['hotel_checkin_id']); die;
				}
				require_once('BookingInformationInvitedPersonListViewNew.php');
				}
				}
				
				else
				{
				$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$userSummary    = $model1->userSummary($data);
			$adultsCheckedInList    = $model1->adultsCheckedInList($data);
			$dependentsCheckedInList    = $model1->dependentsCheckedInList($data);
			$updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data); 
			$getUserActiveStatus    = $model1->getUserActiveStatus($data);
			if($getUserActiveStatus['address']+$getUserActiveStatus['cards']+$getUserActiveStatus['passport']<3)
			{
				header('location:../../PrecheckinInformation/userActiveStatus/'.$data['hotel_checkin_id']); die;
			}
			require_once('BookingInformationInvitedPersonListViewNew.php');
				}	
			
	 
	}
	
	public static function childPassportInfo($a=null,$b=null)
    {
		 
			$path = "../../../../../";
			$data=array();
			$data['checkout_id']=cleanMe($a);
			$data['hotel_checkin_id']=$data['checkout_id'];
			$data['child_invitation_id']=cleanMe($b);
			$model1       = new BookingInformationModel();
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			 
			if($bookingInformationDetail['reservation_confirmed']==0)
				{
				header('location:../verifyBookingDetail/'.$data['hotel_checkin_id']); die;	
				}
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$userSummary    = $model1->userSummary($data);
			$adultsCheckedInList    = $model1->adultsCheckedInList($data);
			$dependentsCheckedInList    = $model1->dependentsCheckedInList($data);
			 
			$getUserActiveStatus    = $model1->getUserActiveStatus($data);
			if($getUserActiveStatus['address']+$getUserActiveStatus['cards']+$getUserActiveStatus['passport']<3)
			{
				header('location:../../PrecheckinInformation/userActiveStatus/'.$data['hotel_checkin_id']); die;
			}
            require_once('BookingInformationChildPassportInformationViewNew.php');
	 
	}
	
	public static function checkUsedIdentificator($a=null,$b=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['checkout_id']=cleanMe($a);
			$data['hotel_checkin_id']=$data['checkout_id'];
			$data['child_invitation_id']=cleanMe($b);
			$model1       = new BookingInformationModel();
			$checkUsedIdentificator    = $model1->checkUsedIdentificator($data);
            echo $checkUsedIdentificator; die;
	 
	}
	
	public static function updateChildPassport($a=null,$b=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['checkout_id']=cleanMe($a);
			$data['hotel_checkin_id']=$data['checkout_id'];
			$data['child_invitation_id']=cleanMe($b);
			$model1       = new BookingInformationModel();
			$updateChildPassport    = $model1->updateChildPassport($data);
           header('location:../../remainingPassportVerification/'.$data['hotel_checkin_id']); die;
	 
	}
	
	
	
	public static function checkinGuests($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['checkout_id']=cleanMe($a);
			$data['hotel_checkin_id']=$data['checkout_id'];
			$model1       = new BookingInformationModel();
			$checkinGuests    = $model1->checkinGuests($data);
			if($checkinGuests==-1)
			{
			header('location:../waitForRoom/'.$data['hotel_checkin_id']); die;	
			}
			else if($checkinGuests>0)
			{
			header('location:../remainingPassportVerification/'.$data['hotel_checkin_id']); die;	
			}
			else
			{
			header('location:../welcomeCheckin/'.$data['hotel_checkin_id']); die;	
			}
	}
	
	public static function waitForRoom($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['checkout_id']=cleanMe($a);
			$data['hotel_checkin_id']=$data['checkout_id'];
			$model1       = new BookingInformationModel();
			require_once('BookingInformationWaitForRoomView.php');
	 
	} 
	public static function welcomeCheckin($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['checkout_id']=cleanMe($a);
			$data['hotel_checkin_id']=$data['checkout_id'];
			$model1       = new BookingInformationModel();
			require_once('BookingInformationWelcomeView.php');
	 
	} 
	public static function waitCheckin($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['checkout_id']=cleanMe($a);
			$data['hotel_checkin_id']=$data['checkout_id'];
			$model1       = new BookingInformationModel();
			require_once('BookingInformationWaitView.php');
	 
	} 
	
	
	public static function remainingPassportVerification($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['checkout_id']=cleanMe($a);
			$data['hotel_checkin_id']=$data['checkout_id'];
			$model1       = new BookingInformationModel();
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			 
			if($bookingInformationDetail['reservation_confirmed']==0)
				{
				header('location:../verifyBookingDetail/'.$data['hotel_checkin_id']); die;	
				}
			if($bookingInformationDetail['checked_in']==0)
				{
				header('location:../precheckedPersons/'.$data['hotel_checkin_id']); die;	
				}
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$userSummary    = $model1->userSummary($data);
			$adultsCheckedInList    = $model1->adultsNotVerified($data);
			$dependentsCheckedInList    = $model1->dependentsNotverified($data);
			 
			$getUserActiveStatus    = $model1->getUserActiveStatus($data);
			if($getUserActiveStatus['address']+$getUserActiveStatus['cards']+$getUserActiveStatus['passport']<3)
			{
				header('location:../../PrecheckinInformation/userActiveStatus/'.$data['hotel_checkin_id']); die;
			}
            require_once('BookingInformationPassportVerificationViewNew.php');
	 
	}
	
	public static function selectCheckinType($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['apartment_id']=cleanMe($a);
			$model1       = new BookingInformationModel();
            require_once('BookingInformationCheckinTypeView.php');
	 
	}
    public static function checkinQR($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['apartment_id']=cleanMe($a);
			$model1       = new BookingInformationModel();
            require_once('BookingInformationApartmentQRCodeViewLatest.php');
	 
	}
	
	public static function hotelCheckinQR($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['hotel_id']=cleanMe($a);
			$model1       = new BookingInformationModel();
			$hotelInformation    = $model1->hotelInformation($data);
            require_once('BookingInformationHotelQRCodeView.php');
	 
	}
	
	
	public static function verifyHotelCheckinCode($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['hotel_id']=cleanMe($a);
			$model1       = new BookingInformationModel();
            require_once('BookingInformationHotelCodeVerificationView.php');
	 
	}
    
    public static function listBookings($a=null)
    {
		 
			$path = "../../../../";
			$data=array();
			$data['uid']=cleanMe($a);
			$model1       = new BookingInformationModel();
            $data['user_id']=$model1->userId($data);
			$reservationConfermationRequiredList    = $model1->reservationConfermationRequiredList($data);
			require_once('BookingInformationListViewNew.php');
	 
	}
	
	public static function verifyBookingDetail($a=null)
    {
			$path = "../../../../";
			$data=array();
			$data['checkout_id']=cleanMe($a);;
			$model1       = new BookingInformationModel();
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			 
			if($bookingInformationDetail['reservation_confirmed']==1)
				{
				header('location:../../PrecheckinInformation/precheckedinInfo/'.$data['checkout_id']); die;	
				}
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$getUserActiveStatus    = $model1->getUserActiveStatus($data);
			if($getUserActiveStatus['address']+$getUserActiveStatus['cards']+$getUserActiveStatus['passport']<3)
			{
				header('location:../../PrecheckinInformation/userActiveStatus/'.$data['checkout_id']); die;
			}
			$userSummary    = $model1->userSummary($data);
			require_once('BookingInformationReservationDetailViewNew.php');
	 
	} 
	
	
	public static function startVerification($a=null)
    {
			$path = "../../../../";
			$data=array();
			$data['checkout_id']=cleanMe($a);;
			$model1       = new BookingInformationModel();
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			 
			if($bookingInformationDetail['reservation_confirmed']==1)
				{
				header('location:../../PrecheckinInformation/precheckedinInfo/'.$data['checkout_id']); die;	
				}
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$getUserActiveStatus    = $model1->getUserActiveStatus($data);
			if($getUserActiveStatus['address']+$getUserActiveStatus['cards']+$getUserActiveStatus['passport']<3)
			{
				header('location:../../PrecheckinInformation/userActiveStatus/'.$data['checkout_id']); die;
			}
			$userSummary    = $model1->userSummary($data);
			require_once('BookingInformationStartConfirmationView.php');
	 
	} 
	
	public static function invoiceAddressesUser($a=null)
    {
			$path = "../../../../";
			$data=array();
			$data['checkout_id']=cleanMe($a);;
			$model1       = new BookingInformationModel();
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			 
			if($bookingInformationDetail['reservation_confirmed']==1)
				{
				header('location:../../PrecheckinInformation/precheckedinInfo/'.$data['checkout_id']); die;	
				}
			if($bookingInformationDetail['card_id']!=null || $bookingInformationDetail['card_id']!="")
				{
				header('location:../checkYourDetails/'.$data['checkout_id']); die;	
				}
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$getUserActiveStatus    = $model1->getUserActiveStatus($data);
			if($getUserActiveStatus['address']+$getUserActiveStatus['cards']+$getUserActiveStatus['passport']<3)
			{
				header('location:../../PrecheckinInformation/userActiveStatus/'.$data['checkout_id']); die;
			}
			$invoiceAddressesUser    = $model1->invoiceAddressesUser($data);
			require_once('BookingInformationUserAddressListViewNew.php');
	 
	} 
	
	
	public static function editInvoiceAddressesUser($a=null)
    {
			$path = "../../../../";
			$data=array();
			$data['checkout_id']=cleanMe($a);;
			$model1       = new BookingInformationModel();
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			 
			if($bookingInformationDetail['reservation_confirmed']==1)
				{
				header('location:../../PrecheckinInformation/precheckedinInfo/'.$data['checkout_id']); die;	
				}
			 
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$getUserActiveStatus    = $model1->getUserActiveStatus($data);
			if($getUserActiveStatus['address']+$getUserActiveStatus['cards']+$getUserActiveStatus['passport']<3)
			{
				header('location:../../PrecheckinInformation/userActiveStatus/'.$data['checkout_id']); die;
			}
			$invoiceAddressesUser    = $model1->invoiceAddressesUser($data);
			require_once('BookingInformationUserAddressListViewNew.php');
	 
	} 
	
	public static function invoiceAddressesBusiness($a=null)
    {
			$path = "../../../../";
			$data=array();
			$data['checkout_id']=cleanMe($a);;
			$model1       = new BookingInformationModel();
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			if($bookingInformationDetail['reservation_confirmed']==1)
				{
				header('location:../../PrecheckinInformation/precheckedinInfo/'.$data['checkout_id']); die;	
				}
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$invoiceAddressesCompany    = $model1->invoiceAddressesCompany($data);
			 
			require_once('BookingInformationCompanyAddressListViewNew.php');
	 
	} 
	
	
	public static function updateUserAddress($a=null,$b=null)
    {
			$path = "../../../../";
			$data=array();
			$data['checkout_id']=cleanMe($a);
			$data['address_id']=cleanMe($b);
			$model1       = new BookingInformationModel();
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
            $updateUserAddress    = $model1->updateUserAddress($data);
			header('location:../../listCards/'.$data['checkout_id']);
	
	}
	
	public static function updateCompanyAddress($a=null,$b=null)
    {
			$path = "../../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['checkout_id']=cleanMe($a);
			$data['address_id']=cleanMe($b);
			$model1       = new BookingInformationModel();
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
            $updateCompanyAddress    = $model1->updateCompanyAddress($data);
			header('location:../../listCards/'.$data['checkout_id']);
	 
	}
	
	public static function listCards($a=null)
    {
			$path = "../../../../";
			$data=array();
			$data['checkout_id']=cleanMe($a);;
			$model1       = new BookingInformationModel();
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			if($bookingInformationDetail['reservation_confirmed']==1)
				{
				header('location:../../PrecheckinInformation/precheckedinInfo/'.$data['checkout_id']); die;	
				}
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$cardsList    = $model1->cardsList($data);
			require_once('BookingInformationCardsListViewNew.php');
	
	}
	
	public static function updateCardDetail($a=null,$b=null)
    {
			$path = "../../../../";
			$data=array();
			$data['checkout_id']=cleanMe($a);
			$data['card_id']=cleanMe($b);
			$model1       = new BookingInformationModel();
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
            $updateCardDetail    = $model1->updateCardDetail($data);
			header('location:../../verifyDetails/'.$data['checkout_id']);
	}
	
	
	public static function verifyDetails($a=null)
    {
			$path = "../../../../";
			$data=array();
			$data['checkout_id']=cleanMe($a);;
			$model1       = new BookingInformationModel();
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			if($bookingInformationDetail['reservation_confirmed']==1)
				{
				header('location:../../PrecheckinInformation/precheckedinInfo/'.$data['checkout_id']); die;	
				}
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$verificationInfomation    = $model1->verificationInfomation($data);
			require_once('BookingInformationSelectedDetailsViewNew.php');
	
	}
	
	
	public static function checkYourDetails($a=null)
    {
			$path = "../../../../";
			$data=array();
			$data['checkout_id']=cleanMe($a);;
			$model1       = new BookingInformationModel();
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			if($bookingInformationDetail['reservation_confirmed']==1)
				{
				header('location:../../PrecheckinInformation/precheckedinInfo/'.$data['checkout_id']); die;	
				}
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$verificationInfomation    = $model1->reservationVerificationInfomation($data);
			require_once('BookingInformationUpdatedDetailsViewNew.php');
	
	}
	
	public static function confirmReservation($a=null)
    {
		$path = "../../../../";
		$data=array();
		$data['checkout_id']=cleanMe($a);;
		$model1       = new BookingInformationModel();
		$bookingInformationDetail    = $model1->bookingInformationDetail($data);
		$data['user_id']=$bookingInformationDetail['user_id'];
		$data['uid']=$bookingInformationDetail['uid'];
        require_once('../configs/testMandril.php');
		require_once('../configs/smsMandril.php');
		require_once('../lib/url_shortener.php');
		$confirmApartmentReservation    = $model1->confirmApartmentReservation($data);
		header('location:../../PrecheckinInformation/precheckedinInfo/'.$data['checkout_id']); die;	
	}
	
	public static function confirmBookingReservation($a=null)
    {
		$path = "../../../../";
		$data=array();
		$data['checkout_id']=cleanMe($a);;
		$model1       = new BookingInformationModel();
		$bookingInformationDetail    = $model1->bookingInformationDetail($data);
		$data['user_id']=$bookingInformationDetail['user_id'];
		$data['uid']=$bookingInformationDetail['uid'];
        require_once('../configs/testMandril.php');
		require_once('../configs/smsMandril.php');
		require_once('../lib/url_shortener.php');
		$confirmBookingReservation    = $model1->confirmBookingReservation($data);
		header('location:../../PrecheckinInformation/precheckedinInfo/'.$data['checkout_id']); die;	
	}
}
?>