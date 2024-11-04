<?php
include 'QloudidAppModel.php';
require_once '../configs/utility.php';

class QloudidAppController
{
	public static function apartmentDetailInfo()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			$apartmentDetailInfo    = $model1->apartmentDetailInfo();
            $dataOut=json_encode($apartmentDetailInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function apartmentAmenitiesDetailInfo()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			$apartmentAmenitiesDetailInfo    = $model1->apartmentAmenitiesDetailInfo();
            $dataOut=json_encode($apartmentAmenitiesDetailInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function apartmentImages()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			$apartmentImages    = $model1->apartmentImages();
            $dataOut=json_encode($apartmentImages,true);
					echo  $dataOut;
					die; 
        
       
    }
	public static function apartmentList()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			$apartmentList    = $model1->apartmentList();
            $dataOut=json_encode($apartmentList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function resturantList()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			 
			$resturantList    = $model1->resturantList();
            $dataOut=json_encode($resturantList,true);
					echo  $dataOut;
					die; 
        
       
    }
	public static function resturantImages()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			 
			$resturantImages    = $model1->resturantImages();
            $dataOut=json_encode($resturantImages,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function resturantInfo()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			 
			$resturantInfo    = $model1->resturantInfo();
            $dataOut=json_encode($resturantInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function completeMenu()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			 
			$completeMenu    = $model1->completeMenu();
            $dataOut=json_encode($completeMenu,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function longTermApartmentList()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			$longTermApartmentList    = $model1->longTermApartmentList();
            $dataOut=json_encode($longTermApartmentList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function apartmentForSaleList()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			$apartmentForSaleList    = $model1->apartmentForSaleList();
            $dataOut=json_encode($apartmentForSaleList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function apartmentIsAvailable()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			$apartmentList    = $model1->apartmentIsAvailable();
           
					echo  $apartmentList;
					die; 
        
       
    }
	
	public static function hotelBathroomAmenities()
    {
			$data=array();
			$data=$_POST;
			 
			$model1       = new QloudidAppModel();
			$hotelBathroomAmenities    = $model1->hotelBathroomAmenities($data);
			 $dataOut=json_encode($hotelBathroomAmenities,true);
					echo  $dataOut;
					die;
	   
    }
		public static function selectedRoomServiceMenu()
    {
			$data=array();
			$data=$_POST;
			 
			$model1       = new QloudidAppModel();
			$selectedRoomServiceMenu    = $model1->selectedRoomServiceMenu($data);
			 $dataOut=json_encode($selectedRoomServiceMenu,true);
					echo  $dataOut;
					die;
	   
    }
	
	
	public static function selectedWellnessServiceMenu()
    {
			$data=array();
			$data=$_POST;
			 
			$model1       = new QloudidAppModel();
			$selectedWellnessServiceMenu    = $model1->selectedWellnessServiceMenu($data);
			 $dataOut=json_encode($selectedWellnessServiceMenu,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function selectedRoomServiceMenuItemInfo()
    {
			$data=array();
			$data=$_POST;
			 
			$model1       = new QloudidAppModel();
			$selectedRoomServiceMenuItemInfo    = $model1->selectedRoomServiceMenuItemInfo($data);
			 $dataOut=json_encode($selectedRoomServiceMenuItemInfo,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function updatePayRequired()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
			$updatePayRequired    = $model1->updatePayRequired($data);
			  
					echo  $updatePayRequired;
					die;
	   
    }
	
	public static function checkUsedDependentIdentificator()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
			$checkUsedDependentIdentificator    = $model1->checkUsedDependentIdentificator($data);
			  
					echo  $checkUsedDependentIdentificator;
					die;
	   
    }
	
	
	public static function verifyUserBookingExists()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
			$verifyUserBookingExists    = $model1->verifyUserBookingExists($data);
			  
					echo  $verifyUserBookingExists;
					die;
	   
    }
	
	public static function updateDependentCheckinIds()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
			$updateDependentCheckinIds    = $model1->updateDependentCheckinIds($data);
			  
					echo  $updateDependentCheckinIds;
					die;
	   
    }
	
	public static function checkSsn()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
			$checkSsn    = $model1->checkSsn($data);
			  
					echo  $checkSsn;
					die;
	   
    }
	public static function addDependentImages()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
			$addDependentImages    = $model1->addDependentImages($data);
			  
					echo  $addDependentImages;
					die;
	   
    }
	
	public static function addDependent()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
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
			$model1       = new QloudidAppModel();
			$dependentsList    = $model1->dependentsList($data);
			$dataOut=json_encode($dependentsList,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function userDetails()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new QloudidAppModel();
			$userDetails    = $model1->userDetails($data);
			$dataOut=json_encode($userDetails,true);
					echo  $dataOut;
					die;
	   
    }
	public static function dependentsListForCheckin()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
			$dependentsList    = $model1->dependentsListForCheckin($data);
			$dataOut=json_encode($dependentsList,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function updateCheckRequired()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
			$updateCheckRequired    = $model1->updateCheckRequired($data);
			  
					echo  $updateCheckRequired;
					die;
	   
    }
	
	
	public static function countPickupAddress()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
			$countPickupAddress    = $model1->countPickupAddress($data);
			$dataOut=json_encode($countPickupAddress,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function pickupAddressDetail()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
			$pickupAddressDetail    = $model1->pickupAddressDetail($data);
			$dataOut=json_encode($pickupAddressDetail,true);
					echo  $dataOut;
					die;
	   
    }
	
	
	public static function updatePickupDelivery()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
			$updatePickupDelivery    = $model1->updatePickupDelivery($data);
			 
					echo  $updatePickupDelivery;
					die;
	   
    }
	
	public static function updatePickupAddress()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
			$updatePickupAddress    = $model1->updatePickupAddress($data);
			 
					echo  $updatePickupAddress;
					die;
	   
    }
	
	public static function orderHotelAmenity()
    {
			$data=array();
			$model1       = new QloudidAppModel();
			$orderHotelAmenity    = $model1->orderHotelAmenity($data);
			  
					echo  $orderHotelAmenity;
					die;
	   
    }
	
	public static function hotelMediaAmenities()
    {
			$data=array();
			$data=$_POST;
			$model1       = new QloudidAppModel();
			$hotelMediaAmenities    = $model1->hotelMediaAmenities($data);
			 $dataOut=json_encode($hotelMediaAmenities,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function hotelRoomAmenities()
    {
			$data=array();
			$data=$_POST;
			$model1       = new QloudidAppModel();
			$hotelRoomAmenities    = $model1->hotelRoomAmenities($data);
			 $dataOut=json_encode($hotelRoomAmenities,true);
					echo  $dataOut;
					die;
	   
    }
	
	
	public static function hotelBedAmenities()
    {
			$data=array();
			$data=$_POST; 
			$model1       = new QloudidAppModel();
			$hotelBedAmenities    = $model1->hotelBedAmenities($data);
			 $dataOut=json_encode($hotelBedAmenities,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function employeeAtendence()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new QloudidAppModel();
			$checkEmployeeAttendence    = $model1->checkEmployeeAttendence($data);
			 echo $checkEmployeeAttendence; die;
			 
	   
    }
	
	public static function updateAttendence()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new QloudidAppModel();
			$updateAttendence    = $model1->updateAttendence($data);
			 
			echo $updateAttendence; die;
	   
    }
	
	public static function updateExit()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new QloudidAppModel();
			$updateExit    = $model1->updateExit($data);
			 
			echo $updateExit; die;
	   
    }
	
	public static function updateLeave()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new QloudidAppModel();
			$updateLeave    = $model1->updateLeave($data);
			 
			echo $updateLeave; die;
	   
    }
	
	public static function updateVacationInfo()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new QloudidAppModel();
			$updateVacationInfo    = $model1->updateVacationInfo($data);
			 
			echo $updateVacationInfo; die;
	   
    }
	
	public static function checkEmployeeTime()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
			$checkEmployeeTime    = $model1->checkEmployeeTime($data);
            $dataOut=json_encode($checkEmployeeTime,true);
					echo  $dataOut;
					die; 
        
       
    }
	
    public static function employerRequestCount()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
			
			$employerRequestCount    = $model1->employerRequestCount($data);
            echo $employerRequestCount; die;
            
        
       
    }
    
	
	
	
	public static function employerRequestReceived()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
			$employerRequestReceived    = $model1->employerRequestReceived($data);
            $dataOut=json_encode($employerRequestReceived,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelPayInfo()
    {
       
			 
			$model1       = new QloudidAppModel();
			$hotelPayInfo    = $model1->hotelPayInfo();
			 
            $dataOut=json_encode($hotelPayInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function contactList()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
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
			$model1       = new QloudidAppModel();
			$approveEmployerRequest    = $model1->approveEmployerRequest($data);
            $dataOut=json_encode($approveEmployerRequest,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	
	public static function daycareRequestCount()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
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
			$model1       = new QloudidAppModel();
			$approveEmployerRequest    = $model1->approveEmployerRequest($data);
            $dataOut=json_encode($approveEmployerRequest,true);
					echo  $dataOut;
					die; 
        
       
    }
    
      public static function checkConnect($co = null)
    {
       
			$data=array();
			 $data['certi']=cleanMe($co);
			  
            $model1       = new QloudidAppModel();
			$checkConnect    = $model1->checkConnect($data);
            echo $checkConnect; die;
			 
        
       
    }
	
	public static function lawCompanyDetails()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			$lawCompanyDetails    = $model1->lawCompanyDetails();
            $dataOut=json_encode($lawCompanyDetails,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function lawersInfo()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			$lawersInfo    = $model1->lawersInfo();
            $dataOut=json_encode($lawersInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelList()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			$hotelList    = $model1->hotelList();
            $dataOut=json_encode($hotelList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelRoomTypeList()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			$hotelRoomTypeList    = $model1->hotelRoomTypeList();
            $dataOut=json_encode($hotelRoomTypeList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelRoomTypeCheckinList()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			 
			$hotelRoomTypeCheckinList    = $model1->hotelRoomTypeCheckinList();
            $dataOut=json_encode($hotelRoomTypeCheckinList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function apartmentPayInfo()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			 
			$apartmentPayInfo    = $model1->apartmentPayInfo();
            $dataOut=json_encode($apartmentPayInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function apartmentCheckedInList()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			 
			$apartmentCheckedInList    = $model1->apartmentCheckedInList();
            $dataOut=json_encode($apartmentCheckedInList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelImages()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			$hotelImages    = $model1->hotelImages();
            $dataOut=json_encode($hotelImages,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelImagesCount()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			$hotelImagesCount    = $model1->hotelImagesCount();
            echo  $hotelImagesCount;
			die; 
        
       
    }
	
	public static function bookingDetails()
    {
       
			 
			$model1       = new QloudidAppModel();
			$bookingDetails    = $model1->bookingDetails();
           $dataOut=json_encode($bookingDetails,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelDetailInfo()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			$hotelDetailInfo    = $model1->hotelDetailInfo();
            $dataOut=json_encode($hotelDetailInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function hotelDetailRoomTypeInfo()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			$hotelDetailRoomTypeInfo    = $model1->hotelDetailRoomTypeInfo();
            $dataOut=json_encode($hotelDetailRoomTypeInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelRoomTypeInfo()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			$hotelRoomTypeInfo    = $model1->hotelRoomTypeInfo();
            $dataOut=json_encode($hotelRoomTypeInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function hotelRoomTypePriceInfo()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			$hotelRoomTypePriceInfo    = $model1->hotelRoomTypePriceInfo();
            $dataOut=json_encode($hotelRoomTypePriceInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelRoomTypeImages()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
			$hotelRoomTypeImages    = $model1->hotelRoomTypeImages();
            $dataOut=json_encode($hotelRoomTypeImages,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function languagesKnown()
    {
       
			$data=array();
			$model1       = new QloudidAppModel();
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
			$model1       = new QloudidAppModel();
			$addAddress    = $model1->addAddress($data);
            echo $addAddress; die;
			 
        
       
    }
	
	public static function addNewAddress()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
			$addNewAddress    = $model1->addNewAddress($data);
            echo $addNewAddress; die;
			 
        
       
    }
	
	
	public static function getPurchaseDetail()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
			$getPurchaseDetail    = $model1->getPurchaseDetail($data);
             $dataOut=json_encode($getPurchaseDetail,true);
					echo  $dataOut;
					die; 
			 
        
       
    }
	
	
	public static function getBookingDetail()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
			$getBookingDetail    = $model1->getBookingDetail($data);
             $dataOut=json_encode($getBookingDetail,true);
					echo  $dataOut;
					die; 
			 
        
       
    }
	
	
	public static function verifyCheckinDetail()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
			$verifyCheckinDetail    = $model1->verifyCheckinDetail($data);
             $dataOut=json_encode($verifyCheckinDetail,true);
					echo  $dataOut;
					die; 
			 
        
       
    }
	
	public static function updateUserAddress()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
			$updateUserAddress    = $model1->updateUserAddress($data);
            echo $updateUserAddress; die;
			 
        
       
    }
	
	public static function updateCompanyAddress()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
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
		$model1       = new QloudidAppModel();
		$saveCardDetails    = $model1->saveCardDetails($data);
		echo $saveCardDetails; die;			
		}	
		
			
		}
	
	 public static function checkValidity($co = null)
    {
       
			$data=array();
			 $data['certi']=cleanMe($co);
			 
            $model1       = new QloudidAppModel();
			$checkValidity    = $model1->checkValidity($data);
            $dataOut=json_encode($checkValidity,true);
					echo  $dataOut;
					die; 
			 
        
       
    }
	
	
	public static function updateLoginStatus($co = null)
    {
       
			$data=array();
			 $data['certi']=cleanMe($co);
			 
            $model1       = new QloudidAppModel();
			$updateLoginStatus    = $model1->updateLoginStatus($data);
            echo $updateLoginStatus; die;
			 
        
       
    }
	
	
	  public static function checkPassword($co = null)
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				 
				$data['certi']=cleanMe($co);
				
				$data['password']=md5($data['password']);
				 
				$model1       = new QloudidAppModel();
				$checkPassword    = $model1->checkPassword($data);
				$dataOut=json_encode($checkPassword,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		 public static function userDeliveryInvoiceInfo()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new QloudidAppModel();
				$userDeliveryInvoiceInfo    = $model1->userDeliveryInvoiceInfo($data);
				$dataOut=json_encode($userDeliveryInvoiceInfo,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		 public static function listCardDetails()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new QloudidAppModel();
				$listCardDetails    = $model1->listCardDetails($data);
				$dataOut=json_encode($listCardDetails,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function certificateExxpiryInfo()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new QloudidAppModel();
				$certificateExxpiryInfo    = $model1->certificateExxpiryInfo($data);
				$dataOut=json_encode($certificateExxpiryInfo,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function listAddresses()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new QloudidAppModel();
				$listAddresses    = $model1->listAddresses($data);
				$dataOut=json_encode($listAddresses,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function listDeliveryAddresses()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new QloudidAppModel();
				$listAddresses    = $model1->listDeliveryAddresses($data);
				$dataOut=json_encode($listAddresses,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function invoiceAddresses()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new QloudidAppModel();
				$invoiceAddresses    = $model1->invoiceAddresses($data);
				$dataOut=json_encode($invoiceAddresses,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		 
		
		public static function addressDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new QloudidAppModel();
				$addressDetail    = $model1->addressDetail($data);
				$dataOut=json_encode($addressDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function deliveryAddressDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new QloudidAppModel();
				$addressDetail    = $model1->deliveryAddressDetail($data);
				$dataOut=json_encode($addressDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function cardDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new QloudidAppModel();
				$cardDetail    = $model1->cardDetail($data);
				$dataOut=json_encode($cardDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function companyAddressDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new QloudidAppModel();
				$companyAddressDetail    = $model1->companyAddressDetail($data);
				$dataOut=json_encode($companyAddressDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		 public static function profileDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new QloudidAppModel();
				$profileDetail    = $model1->profileDetail($data);
				$dataOut=json_encode($profileDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		 public static function addFoodToCart()
		{
		   
				$data=array();
				$model1       = new QloudidAppModel();
				$addFoodToCart    = $model1->addFoodToCart();
				$dataOut=json_encode($addFoodToCart,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		 public static function removeItemFromCart()
		{
		   
				$data=array();
				$model1       = new QloudidAppModel();
				$removeItemFromCart    = $model1->removeItemFromCart();
				$dataOut=json_encode($removeItemFromCart,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		 public static function createNewAccount()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model1       = new QloudidAppModel();
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
				$model1       = new QloudidAppModel();
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
				$model1       = new QloudidAppModel();
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
				$model1       = new QloudidAppModel();
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
				$model1       = new QloudidAppModel();
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
				
				$model1       = new QloudidAppModel();
				 
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
				$model1       = new QloudidAppModel();
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
				$model1       = new QloudidAppModel();
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
				 
				$model1       = new QloudidAppModel();
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
				$model1       = new QloudidAppModel();
				$addIdentificator    = $model1->addIdentificator($data);
				$dataOut=json_encode($addIdentificator,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function identificatorDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new QloudidAppModel();
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
				$model1       = new QloudidAppModel();
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
				$model1       = new QloudidAppModel();
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
				$model1       = new QloudidAppModel();
				 
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
				$model1       = new QloudidAppModel();
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
				$model1       = new QloudidAppModel();
				$checkMobileAvailability    = $model1->checkMobileAvailability($data);
				$dataOut=json_encode($checkMobileAvailability,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
			 public static function purchaseDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new QloudidAppModel();
				$purchaseDetail    = $model1->purchaseDetail($data);
				 
					echo  $purchaseDetail;
					die; 
				 
			
		   
		}
		
		
			 public static function updateCardPurchaseDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new QloudidAppModel();
				$updateCardPurchaseDetail    = $model1->updateCardPurchaseDetail($data);
				 
					echo  $updateCardPurchaseDetail;
					die; 
				 
			
		   
		}
		
		
		 public static function savePurchaseCardDetails()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new QloudidAppModel();
				$savePurchaseCardDetails    = $model1->savePurchaseCardDetails($data);
				 
					echo  $savePurchaseCardDetails;
					die; 
				 
			
		   
		}
		
		
		 public static function saveUpdatedPurchaseCardDetails()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				 
				$model1       = new QloudidAppModel();
				$savePurchaseCardDetails    = $model1->saveUpdatedPurchaseCardDetails($data);
				 
					echo  $savePurchaseCardDetails;
					die; 
				 
			
		   
		}
		
		
		 public static function confirmPurchase()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new QloudidAppModel();
				$confirmPurchase    = $model1->confirmPurchase($data);
				echo  $confirmPurchase;
				die; 
			}
	
	
	 public static function purchaseDetailUpdate()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new QloudidAppModel();
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
			 
            $model1       = new QloudidAppModel();
			$verifyPassword    = $model1->verifyPassword($data);
            
				echo  $verifyPassword;
				die; 
			 
        
       
    }
	
	
	public static function verifyInterAppPassword()
    {
       
			$data=array();
			 
			
			$data=json_decode(file_get_contents('php://input'), true);
			
			$data['password']=md5($data['password']);
			$model1       = new QloudidAppModel();
			$verifyPassword    = $model1->verifyInterAppPassword($data);
            $dataOut=json_encode($verifyPassword,true);
					echo  $dataOut;
					die; ; 
			 
        
       
    }
	
	public static function verifyInterAppSession($co = null)
    {
       
			$data=array();
			 
			
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
			$verifyInterAppSession    = $model1->verifyInterAppSession($data);
            $dataOut=json_encode($verifyInterAppSession,true);
					echo  $dataOut;
					die; ; 
			 
        
       
    }
	
	public static function verifyAdmin()
    {
       
			$data=array();
			 
			
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
			$verifyAdmin    = $model1->verifyAdmin($data);
            $dataOut=json_encode($verifyAdmin,true);
					echo  $dataOut;
					die; ; 
			 
        
       
    }
	
	
	public static function companyDownloadedApps()
    {
       
			$data=array();
			 
			
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new QloudidAppModel();
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
			 
            $model1       = new QloudidAppModel();
			$verifyUserConsent    = $model1->verifyUserConsent($data);
            
				$dataOut=json_encode($verifyUserConsent,true);
					echo  $dataOut;
				die; 
			 
        
       
    }
	
	
	public static function clearIps($co = null)
    {
       
			$data=array();
			$data['certi']=cleanMe($co);
			$model1       = new QloudidAppModel();
			$clearIps    = $model1->clearIps($data);
            
				echo  $clearIps;
				die; 
			 
        
       
    }
	
	
	public static function clearLogin($co = null)
    {
       
			$data=array();
			$data['certi']=cleanMe($co);
			$model1       = new QloudidAppModel();
			$clearLogin    = $model1->clearLogin($data);
            
				echo  $clearLogin;
				die; 
			 
        
       
    }
	
	public static function clearCertificate($co = null)
    {
       
			$data=array();
			$data['certi']=cleanMe($co);
			$model1       = new QloudidAppModel();
			$clearCertificate    = $model1->clearCertificate($data);
            
				echo  $clearCertificate;
				die; 
			 
        
       
    }
	
	
	public static function checkOrderReference($co = null)
    {
       
			$data=array();
			 
            $model1       = new QloudidAppModel();
			$checkOrderReference    = $model1->checkOrderReference($data);
             
				echo  $checkOrderReference;
				die; 
			 
        
       
    }
	
	public static function getUserId($co = null)
    {
       
			$data=array();
			 
            $model1       = new QloudidAppModel();
			$getUserId    = $model1->getUserId($data);
             
				echo  $getUserId;
				die; 
			 
        
       
    }
	   
    public static function updateLoginIp($co = null)
    {
       
			$data=array();
			
			$data=json_decode(file_get_contents('php://input'), true);
			
			$data['certi']=cleanMe($co);
			
            $model1       = new QloudidAppModel();
			$updateLoginIp    = $model1->updateLoginIp($data);
             echo $updateLoginIp; die;
			 
        
       
    }
}


?>