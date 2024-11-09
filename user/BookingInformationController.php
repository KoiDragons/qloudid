<?php
require_once 'BookingInformationModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class BookingInformationController
{
    
    
    public static function listBookings()
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
        } else {
			$path = "../../../";
		$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new BookingInformationModel();
           
			$reservationConfermationRequiredList    = $model1->reservationConfermationRequiredList($data);
			 
			require_once('BookingInformationListView.php');
	}
	}
	
	public static function invoiceAddressesUser($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
        } else {
			$path = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['checkout_id']=cleanMe($a);
			$model1       = new BookingInformationModel();
			$getUserActiveStatus    = $model1->getUserActiveStatus($data);
			if($getUserActiveStatus['address']+$getUserActiveStatus['cards']+$getUserActiveStatus['passport']<3)
			{
				header('location:https://www.safeqloud.com/public/index.php/PrecheckinInformation/userActiveStatus/'.$data['checkout_id']); die;
			}
			$invoiceAddressesUser    = $model1->invoiceAddressesUser($data);
			 
			require_once('BookingInformationUserAddressListView.php');
	}
	} 
	
	public static function invoiceAddressesBusiness($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
        } else {
			$path = "../../../../";
		$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['checkout_id']=cleanMe($a);
			$model1       = new BookingInformationModel();
			$getUserActiveStatus    = $model1->getUserActiveStatus($data);
			if($getUserActiveStatus['address']+$getUserActiveStatus['cards']+$getUserActiveStatus['passport']<3)
			{
				header('location:https://www.safeqloud.com/public/index.php/PrecheckinInformation/userActiveStatus/'.$data['checkout_id']); die;
			}
			$invoiceAddressesCompany    = $model1->invoiceAddressesCompany($data);
			 
			require_once('BookingInformationCompanyAddressListView.php');
	}
	} 
	
	
	public static function updateUserAddress($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
        } else {
			$path = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['checkout_id']=cleanMe($a);
			$data['address_id']=cleanMe($b);
			 $model1       = new BookingInformationModel();
            $updateUserAddress    = $model1->updateUserAddress($data);
			header('location:../../listCards/'.$data['checkout_id']);
	}
	}
	
	public static function updateCompanyAddress($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['checkout_id']=cleanMe($a);
			$data['address_id']=cleanMe($b);
			 $model1       = new BookingInformationModel();
            $updateCompanyAddress    = $model1->updateCompanyAddress($data);
			header('location:../../listCards/'.$data['checkout_id']);
	}
	}
	
	public static function listCards($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
        } else {
			$path = "../../../../";
		$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['checkout_id']=cleanMe($a);
			$model1       = new BookingInformationModel();
			$getUserActiveStatus    = $model1->getUserActiveStatus($data);
			if($getUserActiveStatus['address']+$getUserActiveStatus['cards']+$getUserActiveStatus['passport']<3)
			{
				header('location:https://www.safeqloud.com/public/index.php/PrecheckinInformation/userActiveStatus/'.$data['checkout_id']); die;
			}
			$cardsList    = $model1->cardsList($data);
			require_once('BookingInformationCardsListView.php');
	}
	}
	
	public static function updateCardDetail($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
        } else {
			$path = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['checkout_id']=cleanMe($a);
			$data['card_id']=cleanMe($b);
			 $model1       = new BookingInformationModel();
            $updateCardDetail    = $model1->updateCardDetail($data);
			header('location:../../verifyDetails/'.$data['checkout_id']);
	}
	}
	
	
	public static function verifyDetails($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
        } else {
			$path = "../../../../";
		$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['checkout_id']=cleanMe($a);
			 $model1       = new BookingInformationModel();
           
			$verificationInfomation    = $model1->verificationInfomation($data);
			 
			require_once('BookingInformationSelectedDetailsView.php');
	}
	}
	
	
	public static function confirmReservation($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
        } else {
		$path = "../../../../";
		$data=array();
		$data['user_id']=$_SESSION['user_id'];
		$data['checkout_id']=cleanMe($a);
		$model1       = new BookingInformationModel();
        require_once('../configs/testMandril.php');
		require_once('../configs/smsMandril.php');
		require_once('../lib/url_shortener.php');
		$confirmApartmentReservation    = $model1->confirmApartmentReservation($data);
		header("location:../listBookings");
	}
	}
	

}
?>