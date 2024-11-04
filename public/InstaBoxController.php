<?php
require_once 'InstaBoxModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class InstaBoxController
{
    
    
    public static function welcome($a=null)
    {
		$data=array();
		$data['hid']=cleanMe($a);
		$model       = new InstaBoxModel();
		$hotelImgeInfo    = $model->hotelImgeInfo($data);
		 
		require_once('InstaBoxStartView.php');
	
	}
	public static function checkinCodeVerification($a=null)
    {
		$path = "../../../../";
		$data=array();
		$data['hid']=cleanMe($a);
		$model       = new InstaBoxModel();
		$hotelImgeInfo    = $model->hotelImgeInfo($data);
		 
		require_once('InstaBoxCodeInfoView.php');
	
	}
	  public static function checkTimeReference($a=null)
    {
		$data=array();
		$data['hid']=cleanMe($a); 
		$model       = new InstaBoxModel();
		$checkTimeReference    = $model->checkTimeReference($data);
		echo $checkTimeReference; die;
	
	}
	
	public static function verifyKey($a=null)
    {
		$data=array();
		$data['hid']=cleanMe($a); 
		$model       = new InstaBoxModel();
		$verifyKey    = $model->verifyKey($data);
		echo $verifyKey; die;
	
	}
	
	  public static function verifyEmployee($a=null)
    {
		$data=array();
		$data['hid']=cleanMe($a);
		 $path = "../../../../";
		$model       = new InstaBoxModel();
		$verifyIP    = $model->verifyIP();
		require_once('InstaBoxQrVerificationView.php');
	
	}
	
	  public static function sessionExpired($a=null)
    {
		$data=array();
		$data['hid']=cleanMe($a);
		 $path = "../../../../";
		$model       = new InstaBoxModel();
		require_once('InstaBoxSessionExpiredView.php');
	
	}
	
	public static function addKeyToBox($a=null)
    {
		$data=array();
		$data['hid']=cleanMe($a);
		 $path = "../../../../";
		$model       = new InstaBoxModel();
		if(isset($_POST['ip']))
		{
			require_once('InstaBoxCloseBoxView.php');
		}
		else
		{
			header('location:../welcome/'.$data['hid']); die;
		}
	
	}
	
	
	  public static function updateInstabox($a=null)
    {
		$data=array();
		$data['hid']=cleanMe($a);
		 $path = "../../../../";
		$model       = new InstaBoxModel();
		if(isset($_POST['ip']))
		{
			$updateInstabox    = $model->updateInstabox($data);
			header('location:../thanksEmaployee/'.$data['hid']); die;
		}
		else
		{
			header('location:../welcome/'.$data['hid']); die;
		}
	
	}
	
	
	public static function thanksEmaployee($a=null)
    {
		$data=array();
		$data['hid']=cleanMe($a);
		 $path = "../../../../";
		$model       = new InstaBoxModel();
		require_once('InstaBoxThanksView.php');
		 
	
	}
	
	
	public static function thanksCheckin($a=null)
    {
		$data=array();
		$data['hid']=cleanMe($a);
		 $path = "../../../../";
		$model       = new InstaBoxModel();
		require_once('InstaBoxThanksCheckinView.php');
		 
	
	}

}
?>