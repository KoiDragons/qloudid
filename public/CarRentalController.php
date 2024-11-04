<?php
require_once 'CarRentalModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class CarRentalController
{
    
    
	
	 public static function licenceInformation($a=null)
		{
			
				$path = "../../../../";
				$data=array();
				$data['id']=cleanMe($a);
				$model1       = new CarRentalModel();
				$bookingDetail    = $model1->bookingDetail($data);
				$data['booking_dates']=$bookingDetail['booking_dates'];
				$data['car_type_id']=$bookingDetail['car_type_id'];
				$bookingCarAvailable    = $model1->bookingCarAvailable($data); 	
				 
				if($bookingDetail['licencence_updated']==0)
				{
				require_once('CarRentalDrivingLicenceView.php');	
				}
				else
				{
				require_once('CarRentalAlreadyDoneView.php'); die;	
				}	
				
			
		}
		
		
		public static function updateUserDrivingDetails($a=null)
		{
			
				$path = "../../../../";
				$data=array();
				$data['id']=cleanMe($a);
				$model1       = new CarRentalModel();
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$updateUserDrivingDetails    = $model1->updateUserDrivingDetails($data);
				
				header('location:../responseUpdated/'.$data['id']);
				
			
		}
		
    public static function verifyBooking($a=null)
		{
			
				$path = "../../../../";
				$data=array();
				$data['id']=cleanMe($a);
				  
				$model1       = new CarRentalModel();
				$bookingDetail    = $model1->bookingDetail($data);
				 
				$data['booking_dates']=$bookingDetail['booking_dates'];
				$data['car_type_id']=$bookingDetail['car_type_id'];
				$bookingCarAvailable    = $model1->bookingCarAvailable($data); 	
				
				if($bookingDetail['is_confirmed']==0)
				{
				require_once('CarRentalBookingInformationView.php');	
				}
				else
				{
				require_once('CarRentalAlreadyDoneView.php'); die;	
				}	
				
			
		}
		
		
		 public static function responseUpdated($a=null)
		{
			
				$path = "../../../../";
				$data=array();
				$data['id']=cleanMe($a);
				$model1       = new CarRentalModel();
				$bookingDetail    = $model1->bookingDetail($data);
				$data['booking_dates']=$bookingDetail['booking_dates'];
				$data['car_type_id']=$bookingDetail['car_type_id'];
				$bookingCarAvailable    = $model1->bookingCarAvailable($data); 	
				require_once('CarRentalReviewThanksView.php'); die;	
				
		}
		
		
		
		 public static function confirmVehicleBooking($a=null)
		{
			
				$data=array();
				$data['id']=cleanMe($a);
				$model1       = new CarRentalModel();
				$bookingDetail    = $model1->bookingDetail($data);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$confirmVehicleBooking    = $model1->confirmVehicleBooking($data); 	
 			
				header('location:../responseUpdated/'.$data['id']);
			
		}
		
		 public static function rejectVehicleBooking($a=null)
		{
			
				$data=array();
				$data['id']=cleanMe($a);
				$model1       = new CarRentalModel();
				$bookingDetail    = $model1->bookingDetail($data);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$rejectVehicleBooking    = $model1->rejectVehicleBooking($data); 	
 			
				header('location:../responseUpdated/'.$data['id']);
			
		}
	

}
?>