<?php
	
	require_once 'HotelModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class HotelController
	{
		 
	public static function index()
		{
			 
				$path = "../../../";
				$model       = new HotelModel();
				$hotelLocationList    = $model->hotelLocationList();				
				require_once('HotelSearchView.php');
			
		}	 
	
	public static function verifyPreCheckinQr($a=null)
		{
			 
				$path = "../../../../";
				$model       = new HotelModel();
				$data=array();
				$data['id']=cleanMe($a);
				$hotelPreCheckinInfo    = $model->hotelPreCheckinInfo($data);
				
				if($hotelPreCheckinInfo==1)
				{
				require_once('HotelPreCheckinQrView.php'); die;
				}
				else
				{
					require_once('HotelPrecheckinStatusView.php');
				}
				
			
		}	 
		 
	public static function verifyCheckin($a=null)
		{
			 
				$path = "../../../../";
				$model       = new HotelModel();
				$data=array();
				$data['id']=cleanMe($a);
				require_once('HotelCheckingCodeView.php');
			
		}	 
		 
		public static function verifyCheckinCode($a=null)
		{
			 
				$path = "../../../../";
				$model       = new HotelModel();
				$data=array();
				$data['id']=cleanMe($a);
				$codeCheck    = $model->verifyCode($data);
				if($codeCheck==1)
				{
					header("location:https://www.safeqloud.com/user/index.php/LoginAccount/verifyCheckin/".$data['id']);
				}
				else
				{
				require_once('HotelWrongCodeView.php');	
				}
				
			
		} 
		
		
		public static function thanksCheckin($a=null)
		{
				$path = "../../../../";
				$model       = new HotelModel();
				$data=array();
				$data['id']=cleanMe($a);
				$result    = $model->checkinHotel($data);
				require_once('HotelThanksCheckinView.php');
			
		}
		 
	 public static function hotelInformation($a=null)
		{
			 
				$path = "../../../../";
				$model       = new HotelModel();
				$data=array();
				$data['hid']=cleanMe($a);
				$hotelDetail    = $model->hotelDetail($data);
				$businessImageDetail    = $model->businessImageDetail($data); 
				require_once('HotelAmenitiesView.php');
			
		}
	 	 
		 public static function hoteldetailInfo($a=null)
		{
				$path = "../../../../";
				$model       = new HotelModel();
				$data=array();
				$data['id']=cleanMe($a);
				$hotelDetail    = $model->hotelRoomTypeList($data);
				$hotelImages    = $model->hotelImages($data);
				$hotelImagesCount    = $model->hotelImagesCount($data);
				$hotelDetailInfo    = $model->hotelDetailInfo($data);
			//	echo '<pre>'; print_r($hotelDetail['rooms']); echo '</pre>';  die;
				require_once('HotelRoomTypeList.php');
			
		}
	  public static function searchDetail()
		{
				$path = "../../../";
				$model       = new HotelModel();
				$data=array();
				 
				$hotelDetail    = $model->hotelList();
				$hotelLocationList    = $model->hotelLocationList(); 
				 
				require_once('HotelListView.php');
			
		}
		
		public static function hotelCheckOut($a=null , $b=null)
		{
				$path = "../../../../../";
				$model       = new HotelModel();
				$data=array();
				$data['id']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$hotelDetailInfo    = $model->hotelDetailRoomTypeInfo($data);
				$hotelDetail    = $model->hotelRoomTypeInfo($data);
				$hotelImages    = $model->hotelRoomTypeImages($data);
				require_once('HotelCheckOutView.php');
			
		}

		public static function thankBooking($a=null)
		{
				$path = "../../../../";
				$model       = new HotelModel();
				$data=array();
				$data['id']=cleanMe($a);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$result    = $model->payForHotel($data);
				require_once('HotelThanksBookingView.php');
			
		}

		public static function getDetails($a=null, $b=null)
		{
				$path = "../../../../";
				$model       = new HotelModel();
				$data=array();
				$data['id']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['date1']=date("Y-m-d", $_POST['rz_booking'][0]);
				$data['date2']=date("Y-m-d", $_POST['rz_booking'][1]);
				$data['total_days']=round(($_POST['rz_booking'][1]-$_POST['rz_booking'][0]) / (60 * 60 * 24));
				
				$result    = $model->bookingDetails($data);
				header('location:https://www.safeqloud.com/user/index.php/LoginAccount/bookHotel/'.$result);
			
		}
	}
?>