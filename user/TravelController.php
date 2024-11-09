<?php
require_once 'TravelModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class TravelController
{
    
    
    public static function index()
    {
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				} else {
		$path = "../../";
		$data=array();
		$data['user_id']=$_SESSION['user_id'];
		$model = new TravelModel();
		$travelCountry    = $model->travelCountry($data);
		 
		if(!empty($travelCountry))
		{
			
			header("location:Travel/emergencyListing"); die;
		}
		$countryOption    = $model->countryOption($data);
		require_once('TravelCountrySelectView.php');
				}
	}
	
	
	public static function emergencyListing()
    {
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
		$path = "../../../";
		$data=array();
		$data['user_id']=$_SESSION['user_id'];
		$model = new TravelModel();
		$travelCountry    = $model->travelCountry($data);
		if(empty($travelCountry))
		{
			
			header("location:../Travel"); die;
		}
		$countryOption    = $model->countryOption($data);
		$emergencyDetail    = $model->emergencyDetail($data);
		$hotelConnectionDetail    = $model->hotelConnectionDetail($data);
		require_once('TravelEmergencyListView.php');
	}
	}
	
	
		public static function hotelAmenities()
    {
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
		$path = "../../../";
		$data=array();
		$data['user_id']=$_SESSION['user_id'];
		$model = new TravelModel();
		$travelCountry    = $model->travelCountry($data);
		if(empty($travelCountry))
		{
			
			header("location:../Travel"); die;
		}
		$countryOption    = $model->countryOption($data);
		$emergencyDetail    = $model->emergencyDetail($data);
		$hotelConnectionDetail    = $model->hotelConnectionDetail($data);
		$hotelAmenitiesCategory    = $model->hotelAmenitiesCategory($data);
		if(empty($hotelConnectionDetail))
		{
		header("location:emergencyListing"); die;	
		}
		require_once('TravelAminitiesListView.php');
	}
	}
	
	public static function alarmList()
    {
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../LoginAccount");
				} else {
		$path = "../../../";
		$data=array();
		$data['user_id']=$_SESSION['user_id'];
		$model = new TravelModel();
		$travelCountry    = $model->travelCountry($data);
		if(empty($travelCountry))
		{
			
			header("location:../Travel"); die;
		}
		$data['country_id']=$travelCountry['country_id'];
		$countryOption    = $model->countryOption($data);
		$addedAlamrs    = $model->addedAlamrs($data);
		$addedAlamrsCount    = $model->addedAlamrsCount($data);
		require_once('TravelEmergencyAlarmView.php');
	}
	}
	
	public static function companyList($a=null)
    {
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
			header("location:../../LoginAccount");
				} else {
		$path = "../../../../";
		$data=array();
		$data['user_id']=$_SESSION['user_id'];
		$model = new TravelModel();
		$travelCountry    = $model->travelCountry($data);
		if(empty($travelCountry))
		{
			
			header("location:../../Travel"); die;
		}
		$data['eid']=cleanMe($a);
		$data['country_id']=$travelCountry['country_id'];
		$countryOption    = $model->countryOption($data);
		 
		$emergencyAppDetail    = $model->emergencyAppDetail($data);
		if($emergencyAppDetail['is_active']==1)
		{
		header("location:../emergencyListing"); die;	
		}
		$travelAppCompany    = $model->travelAppCompany($data);
		$travelAppCompanyCount    = $model->travelAppCompanyCount($data);
		require_once('TravelCompanyListView.php');
	}
	}
	
	
	public static function connectHotel($a=null)
    {
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
			header("location:../../LoginAccount");
				} else {
		$path = "../../../../";
		$data=array();
		$data['user_id']=$_SESSION['user_id'];
		$model = new TravelModel();
		$data['rid']=cleanMe($a);
		 
		$countryOption    = $model->countryOption($data);
		 
		$hotelRequestInvitation    = $model->hotelRequestInvitation($data);
		 
		require_once('TravelVerificationView.php');
	}
	}
	
		public static function moreTravelAppCompany($a=null)
		{
			$valueNew = checkLogin();
					if ($valueNew == 0) {
            $path = "../../";
            echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
			$data=array();
				$data['user_id']=$_SESSION['user_id'];
		$model = new TravelModel();
		$travelCountry    = $model->travelCountry($data);
		if(empty($travelCountry))
		{
			
			header("location:../../Travel"); die;
		}
		$data['eid']=cleanMe($a);
		$data['country_id']=$travelCountry['country_id'];
				$moreTravelAppCompany = $model->moreTravelAppCompany();
				echo $moreTravelAppCompany; die;
			}
		}
		
		
		public static function moreAddedAlamrs()
		{
			$valueNew = checkLogin();
					if ($valueNew == 0) {
            $path = "../../";
            echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
			$data=array();
				$data['user_id']=$_SESSION['user_id'];
		$model = new TravelModel();
		$travelCountry    = $model->travelCountry($data);
		if(empty($travelCountry))
		{
			
			header("location:../Travel"); die;
		}
	 
		$data['country_id']=$travelCountry['country_id'];
				$moreAddedAlamrs = $model->moreAddedAlamrs($data);
				echo $moreAddedAlamrs; die;
			}
		}
		
		public static function updateCountry()
		{
			$valueNew = checkLogin();
					if ($valueNew == 0) {
            $path = "../../";
			echo '<script type="text/JavaScript"> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
			$data=array();
				$data['user_id']=$_SESSION['user_id'];
		$model = new TravelModel();
		$updateCountry = $model->updateCountry($data);
		echo $updateCountry; die;
			}
		}
		
		
			public static function addTravelCountry()
			{
				$valueNew = checkLogin();
					if ($valueNew == 0) {
						$path = "../../";
						header("location:../LoginAccount");
						} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$model = new TravelModel();
				$addTravelCountry    = $model->addTravelCountry($data);
				header("location:emergencyListing");
			}
			}
		public static function verifyOtp($a=null)
		{
			$valueNew = checkLogin();
		if ($valueNew == 0) {
            $path = "../../";
            echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } 
		else 
		{
			$data=array();
		$data['user_id']=$_SESSION['user_id'];
		$model = new TravelModel();
		$data['rid']=cleanMe($a);
		$verifyOtp = $model->verifyOtp($data);
		echo $verifyOtp; die;
			}
		}
}
?>