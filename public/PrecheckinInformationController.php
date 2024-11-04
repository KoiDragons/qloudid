<?php
require_once 'PrecheckinInformationModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class PrecheckinInformationController
{
    
    public static function dependentsList($a=null)
	{
		
            $path         = "../../../../";
			$model1       = new PrecheckinInformationModel();
			$data=array();
			$data['hotel_checkin_id']=cleanMe($a);
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$dependentsListForCheckin    = $model1->dependentsListForCheckin($data);
			$updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data);
			if($updatePreCheckinStatus['total_left']==0)
			{
				header('location:https://www.qloudid.com/public/index.php/PrecheckinInformation/listBookings/'.$data['uid']); die;
			}
			
			if(count($dependentsListForCheckin)==0)
			{
				header('location:../dependentsDetailinfo/'.$data['hotel_checkin_id']); die;
			}
			require_once('PrecheckinInformationDependentListViewNew.php');
		
	}
	
	
	public static function dependentsDetailinfo($a=null)
	{
		
            $path         = "../../../../";
			$model1       = new PrecheckinInformationModel();
			$data=array();
			$data['hotel_checkin_id']=cleanMe($a);
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$dependentsListForCheckin    = $model1->dependentsListForCheckin($data);
			$updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data);
			if($updatePreCheckinStatus['total_left']==0)
			{
				header('location:https://www.qloudid.com/public/index.php/PrecheckinInformation/listBookings/'.$data['uid']); die;
			}
			$dobYears    = $model1->dobYears($data);
			$dobMonthCurrentYear    = $model1->dobMonthCurrentYear($data);
			$dobMonthOldYear    = $model1->dobMonthOldYear($data);
			require_once('PrecheckinInformationAddChildViewNew.php');
		
	}
	
	public static function addDependentInformation($a=null)
	{
		
            $path         = "../../../../";
			$model1       = new PrecheckinInformationModel();
			$data=array();
			$data['hotel_checkin_id']=cleanMe($a);
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$addDependentInformation    = $model1->addDependentInformation($data);
			$today=strtotime(date('Y-m-d'));
				if($bookingInformationDetail['checkin_booking_date']<=$today)
				{
				header('location:https://www.qloudid.com/public/index.php/BookingInformation/precheckedPersons/'.$data['hotel_checkin_id']); die;	
				}
				 
			$updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data);
			if($updatePreCheckinStatus['total_left']==0)
			{
				header('location:https://www.qloudid.com/public/index.php/PrecheckinInformation/listBookings/'.$data['uid']); die;
			}
			 else
			 {
				header('location:../precheckedinInfo/'.$data['hotel_checkin_id']);
			 }
		
	}
    
	public static function addDependentChekin($a=null,$b=null)
	{
			$model1       = new PrecheckinInformationModel();
            $path         = "../../../../";
			$data=array();
			$data['hotel_checkin_id']=cleanMe($a);
			$data['child_id']=cleanMe($b);
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$addDependentChekin    = $model1->addDependentChekin($data);
			$today=strtotime(date('Y-m-d'));
				if($bookingInformationDetail['checkin_booking_date']<=$today)
				{
				header('location:https://www.qloudid.com/public/index.php/BookingInformation/precheckedPersons/'.$data['hotel_checkin_id']); die;	
				}
				 
			$updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data);
			if($updatePreCheckinStatus['total_left']==0)
			{
				header('location:https://www.qloudid.com/public/index.php/PrecheckinInformation/listBookings/'.$data['uid']); die;
			}
			else
			header('location:../../precheckedinInfo/'.$data['hotel_checkin_id']);
		
	}
	public static function listBookings($a=null)
    {
		 
		$path = "../../../../";
		$data=array();
		$data['uid']=cleanMe($a);
		$model1       = new PrecheckinInformationModel();
		$data['user_id']=$model1->userId($data);
        $apartmentPrecheckinRequiredList    = $model1->apartmentPrecheckinRequiredList($data);
		require_once('PrecheckinInformationRequiredListViewNew.php');
	 
	}
	
	
	public static function precheckedinInfo($a=null)
	{
		
            $path         = "../../../../";
			$model1       = new PrecheckinInformationModel();
			$data=array();
			$data['hotel_checkin_id']=cleanMe($a);
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			 
			if($bookingInformationDetail['reservation_confirmed']==0)
				{
				header('location:../../BookingInformation/verifyBookingDetail/'.$data['hotel_checkin_id']); die;	
				}
			$today=strtotime(date('Y-m-d'));	
			if($bookingInformationDetail['checkin_booking_date']<=$today)
				{
				header('location:https://www.qloudid.com/public/index.php/BookingInformation/precheckedPersons/'.$data['hotel_checkin_id']); die;	
				}
				
			if($bookingInformationDetail['checked_in']==1)
				{
					 
				header('location:https://www.qloudid.com/public/index.php/BookingInformation/checkedInDetail/'.$data['hotel_checkin_id']); die;	
				}	
				
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$userSummary    = $model1->userSummary($data);
			$adultsCheckedInList    = $model1->adultsCheckedInList($data);
			$dependentsCheckedInList    = $model1->dependentsCheckedInList($data);
			 
			$getUserActiveStatus    = $model1->getUserActiveStatus($data);
			if($getUserActiveStatus['address']+$getUserActiveStatus['cards']+$getUserActiveStatus['passport']<3)
			{
				header('location:../userActiveStatus/'.$data['hotel_checkin_id']); die;
			}
			$updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data);
			if($updatePreCheckinStatus['total_left']==0)
			{
				header('location:https://www.qloudid.com/public/index.php/PrecheckinInformation/listBookings/'.$data['uid']); die;
			}
			
			require_once('PrecheckinInformationInvitedPersonListViewNew.php');
		
	}
	
	public static function passportInfo($a=null)
	{
		
            $path         = "../../../../";
			$model1       = new PrecheckinInformationModel();
			$data=array();
			$data['hotel_checkin_id']=cleanMe($a);
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$getUserActiveStatus    = $model1->getUserActiveStatus($data);
			if($getUserActiveStatus['passport']>0)
			{
				header('location:../userActiveStatus/'.$data['hotel_checkin_id']); die;
			}
			$userSummary    = $model1->userSummary($data);
			$updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data);
			if($updatePreCheckinStatus['total_left']==0)
			{
				header('location:https://www.qloudid.com/public/index.php/PrecheckinInformation/listBookings/'.$data['uid']); die;
			}
			require_once('PrecheckinInformationPassportInformationViewNew.php');
		
	}
	
	public static function addressInfo($a=null)
	{
		
            $path         = "../../../../";
			$model1       = new PrecheckinInformationModel();
			$data=array();
			$data['hotel_checkin_id']=cleanMe($a);
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$userSummary    = $model1->userSummary($data);
			$getUserActiveStatus    = $model1->getUserActiveStatus($data);
			if($getUserActiveStatus['address']>0)
			{
				header('location:../userActiveStatus/'.$data['hotel_checkin_id']); die;
			}
			$updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data);
			if($updatePreCheckinStatus['total_left']==0)
			{
				header('location:https://www.qloudid.com/public/index.php/PrecheckinInformation/listBookings/'.$data['uid']); die;
			}
			require_once('PrecheckinInformationAddressInformationViewNew.php');
		
	}
	
	public static function cardInfo($a=null)
	{
		
            $path         = "../../../../";
			$model1       = new PrecheckinInformationModel();
			$data=array();
			$data['hotel_checkin_id']=cleanMe($a);
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$userSummary    = $model1->userSummary($data);
			$getUserActiveStatus    = $model1->getUserActiveStatus($data);
			if($getUserActiveStatus['cards']>0)
			{
				header('location:../userActiveStatus/'.$data['hotel_checkin_id']); die;
			}
			$updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data);
			if($updatePreCheckinStatus['total_left']==0)
			{
				header('location:https://www.qloudid.com/public/index.php/PrecheckinInformation/listBookings/'.$data['uid']); die;
			}
			require_once('PrecheckinInformationCardInformationViewNew.php');
		
	}
	
	public static function addPassportInformation($a=null)
	{
		
            $path         = "../../../../";
			$model1       = new PrecheckinInformationModel();
			$data=array();
			$data['hotel_checkin_id']=cleanMe($a);
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$addIndificator    = $model1->addIndificator($data);
			$getUserActiveStatus    = $model1->getUserActiveStatus($data);
			if($getUserActiveStatus['address']+$getUserActiveStatus['cards']+$getUserActiveStatus['passport']==3)
			{
				$today=strtotime(date('Y-m-d'));
				if($bookingInformationDetail['checkin_booking_date']<=$today)
				{
				header('location:https://www.qloudid.com/public/index.php/BookingInformation/precheckedPersons/'.$data['hotel_checkin_id']); die;	
				}
				else
				header('location:../precheckedinInfo/'.$data['hotel_checkin_id']); die;
			}
			$updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data);
			if($updatePreCheckinStatus['total_left']==0)
			{
				header('location:https://www.qloudid.com/public/index.php/PrecheckinInformation/listBookings/'.$data['uid']); die;
			}
			else
			{
				header('location:../userActiveStatus/'.$data['hotel_checkin_id']); die;
			}
		
	}
	
	
	public static function updateUserPersonalAddress($a=null)
	{
		
            $path         = "../../../../";
			$model1       = new PrecheckinInformationModel();
			$data=array();
			$data['hotel_checkin_id']=cleanMe($a);
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$addDeliveryAdddress    = $model1->addDeliveryAdddress($data);
			$getUserActiveStatus    = $model1->getUserActiveStatus($data);
			if($getUserActiveStatus['address']+$getUserActiveStatus['cards']+$getUserActiveStatus['passport']==3)
			{
				$today=strtotime(date('Y-m-d'));
				if($bookingInformationDetail['checkin_booking_date']<=$today)
				{
				header('location:https://www.qloudid.com/public/index.php/BookingInformation/precheckedPersons/'.$data['hotel_checkin_id']); die;	
				}
				else
				header('location:../precheckedinInfo/'.$data['hotel_checkin_id']); die;
			}
			$updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data);
			if($updatePreCheckinStatus['total_left']==0)
			{
				header('location:https://www.qloudid.com/public/index.php/PrecheckinInformation/listBookings/'.$data['uid']); die;
			}
			else
			{
				header('location:../userActiveStatus/'.$data['hotel_checkin_id']); die;
			}
		
	}
	
	public static function updateUserPaymentInfo($a=null)
	{
		
            $path         = "../../../../";
			$model1       = new PrecheckinInformationModel();
			$data=array();
			$data['hotel_checkin_id']=cleanMe($a);
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$saveCardDetails    = $model1->saveCardDetails($data);
			$getUserActiveStatus    = $model1->getUserActiveStatus($data);
			if($getUserActiveStatus['address']+$getUserActiveStatus['cards']+$getUserActiveStatus['passport']==3)
			{
				$today=strtotime(date('Y-m-d'));
				if($bookingInformationDetail['checkin_booking_date']<=$today)
				{
				header('location:https://www.qloudid.com/public/index.php/BookingInformation/precheckedPersons/'.$data['hotel_checkin_id']); die;	
				}
				else
				header('location:../precheckedinInfo/'.$data['hotel_checkin_id']); die;
			}
			$updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data);
			if($updatePreCheckinStatus['total_left']==0)
			{
				header('location:https://www.qloudid.com/public/index.php/PrecheckinInformation/listBookings/'.$data['uid']); die;
			}
			else
			{
				header('location:../userActiveStatus/'.$data['hotel_checkin_id']); die;
			}
		
	}
	
	public static function userActiveStatus($a=null)
	{
		
            $path         = "../../../../";
			$model1       = new PrecheckinInformationModel();
			$data=array();
			$data['hotel_checkin_id']=cleanMe($a);
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$userSummary    = $model1->userSummary($data);
			$getUserActiveStatus    = $model1->getUserActiveStatus($data);
			if($getUserActiveStatus['address']+$getUserActiveStatus['cards']+$getUserActiveStatus['passport']==3)
			{
				$updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data);
			
				$today=strtotime(date('Y-m-d'));	
				if($bookingInformationDetail['reservation_confirmation']==0)
				{
				header('location:../../BookingInformation/verifyBookingDetail/'.$data['hotel_checkin_id']); die;	
				}
				else if($bookingInformationDetail['checkin_booking_date']<=$today)
				{
				header('location:https://www.qloudid.com/public/index.php/BookingInformation/precheckedPersons/'.$data['hotel_checkin_id']); die;	
				}
				else if($updatePreCheckinStatus['total_left']==0)
				{
					header('location:https://www.qloudid.com/public/index.php/PrecheckinInformation/listBookings/'.$data['uid']); die;
				}
				else
				header('location:../precheckedinInfo/'.$data['hotel_checkin_id']); die;
			}
			
			require_once('PrecheckinInformationUserPaymentStatusViewNew.php');
		
	}
	
	public static function selectInvitationType($a=null)
	{
		
            $path         = "../../../../";
			$model1       = new PrecheckinInformationModel();
			$data=array();
			$data['hotel_checkin_id']=cleanMe($a);
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data);
			if($updatePreCheckinStatus['total_left']==0)
			{
				header('location:https://www.qloudid.com/public/index.php/PrecheckinInformation/listBookings/'.$data['uid']); die;
			}
			require_once('PrecheckinInformationInvitationTypeViewNew.php');
		
	}
	public static function emailInvitaionInfo($a=null)
	{
		
            $path         = "../../../../";
			$model1       = new PrecheckinInformationModel();
			$data=array();
			$data['hotel_checkin_id']=cleanMe($a);
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			$updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data);
			if($updatePreCheckinStatus['total_left']==0)
			{
				header('location:https://www.qloudid.com/public/index.php/PrecheckinInformation/listBookings/'.$data['uid']); die;
			}
			require_once('PrecheckinInformationEmailInvitationViewNew.php');
		
	}
	
	public static function emailIinviteAdultForCheckin($a=null)
	{
		$model1       = new PrecheckinInformationModel();
            $path         = "../../../../";
			$data=array();
			$data['hotel_checkin_id']=cleanMe($a);
			$data['precheck']=1;
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			$emailIinviteAdultForCheckin    = $model1->emailIinviteAdultForCheckin($data);
			$today=strtotime(date('Y-m-d'));
			if($bookingInformationDetail['checkin_booking_date']<=$today)
			{
			header('location:https://www.qloudid.com/public/index.php/BookingInformation/precheckedPersons/'.$data['hotel_checkin_id']); die;	
			}
			$updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data);
			if($updatePreCheckinStatus['total_left']==0)
			{
				header('location:https://www.qloudid.com/public/index.php/PrecheckinInformation/listBookings/'.$data['uid']); die;
			}
			else
			header('location:../precheckedinInfo/'.$data['hotel_checkin_id']);
		
	}
	
	
	public static function phoneInvitaionInfo($a=null)
	{
		$model1       = new PrecheckinInformationModel();
            $path         = "../../../../";
			$data=array();
			$data['hotel_checkin_id']=cleanMe($a);
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			
			$updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data);
			if($updatePreCheckinStatus['total_left']==0)
			{
				header('location:https://www.qloudid.com/public/index.php/PrecheckinInformation/listBookings/'.$data['uid']); die;
			}
			require_once('PrecheckinInformationPhoneInvitationViewNew.php');
		
	}
	
	public static function phoneIinviteAdultForCheckin($a=null)
	{
		$model1       = new PrecheckinInformationModel();
            $path         = "../../../../";
			$data=array();
			$data['hotel_checkin_id']=cleanMe($a);
			$data['precheck']=1;
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
			$data['user_id']=$bookingInformationDetail['user_id'];
			$data['uid']=$bookingInformationDetail['uid'];
			require_once('../lib/url_shortener.php');
			require_once('../configs/smsMandril.php');
			$phoneIinviteAdultForCheckin    = $model1->phoneIinviteAdultForCheckin($data);
			$today=strtotime(date('Y-m-d'));
			if($bookingInformationDetail['checkin_booking_date']<=$today)
			{
			header('location:https://www.qloudid.com/public/index.php/BookingInformation/precheckedPersons/'.$data['hotel_checkin_id']); die;	
			}
			$updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data);
			if($updatePreCheckinStatus['total_left']==0)
			{
				header('location:https://www.qloudid.com/public/index.php/PrecheckinInformation/listBookings/'.$data['uid']); die;
			}
			else
			header('location:../precheckedinInfo/'.$data['hotel_checkin_id']);
		
	}
	
	 

}
?>