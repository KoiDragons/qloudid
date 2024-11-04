<?php
require_once 'CoronaHelpModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class CoronaHelpController
{
    
    
    public static function index()
    {
		$path = "../../";
    require_once('CoronaHelpWelcomeView.php');
	
	}
	
	
	  public static function detailInfo($a=null)
    {
		$data=array();
		$data['rid']=cleanMe($a);
		$path = "../../../../";
		$model       = new CoronaHelpModel();
		$resultContry    = $model->countryOption($data);
		require_once('CoronaHelpNeedyView.php');
	
	}
	
	 public static function detailInfoVolunteer($a=null)
    {
		$data=array();
		$data['rid']=cleanMe($a);
		$path = "../../../../";
		$model       = new CoronaHelpModel();
		$resultContry    = $model->countryOption($data);
		require_once('CoronaHelpVolunteerView.php');
	
	}
	
	public static function detailInfoMember($a=null)
    {
		$data=array();
		$data['invitation_id']=cleanMe($a);
		$path = "../../../../";
		$model       = new CoronaHelpModel();
		$resultContry    = $model->countryOption($data);
		$viewGroupDetail    = $model->viewGroupDetail($data);
		require_once('CoronaHelpMemmberInvitationView.php');
	
	}
	 public static function updateAddress($a=null)
    {
		$data=array();
		$data['uid']=cleanMe($a);
		$path = "../../../../";
		$model       = new CoronaHelpModel();
		require_once('CoronaHelpAddressUpdateView.php');
	
	}
	
	public static function updateUserAddress($a=null)
    {
		$data=array();
		$data['uid']=cleanMe($a);
		$model       = new CoronaHelpModel();
		$updateUserAddress    = $model->updateUserAddress($data);
		$userType    = $model->userType($data); 
		 
		header('location:../thanksRegistration/'.$userType);
		 
	}
	
	  public static function registerYourself($a=null)
    {
		$data=array();
		$data['rid']=cleanMe($a);
		$model       = new CoronaHelpModel();
		 
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		$registerYourself    = $model->registerYourself($data);
		if($registerYourself==1)
		{
		header('location:../thanksRegistration/'.$data['rid']);
		}
		else if($registerYourself==2)
		{
			header('location:https://www.qloudid.com/user/index.php/LoginAccount');
		}
		else
		{
		header('location:../updateAddress/'.$registerYourself);	
		}
	}
	
	 public static function registerMember($a=null)
    {
		$data=array();
		$data['invitation_id']=cleanMe($a);
		$model       = new CoronaHelpModel();
		 
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		$registerMember    = $model->registerMember($data);
		if($registerMember==1)
		{
		header('location:../thanksRegistration/T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09');
		}
		else
		{
		header('location:https://www.qloudid.com/user/index.php/LoginAccount');	
		}
			
	}
	
	
	 public static function thanksRegistration($a)
    {
		$data=array();
		$data['rid']=cleanMe($a);
		$path = "../../../../";
		$model       = new CoronaHelpModel();
		$requestId    = $model->requestId($data);
		require_once('CoronaHelpThanksView.php');
	
	}
	
	
	public static function checkAddress()
		{
			 
				$model1       = new CoronaHelpModel();
				
				$result    = $model1->checkAddress();
				echo $result; die;
			 
		}
		
		public static function checkAddresslatLong()
		{
			 
				$model1       = new CoronaHelpModel();
				
				$result    = $model1->checkAddresslatLong();
				echo $result; die;
			 
		}
}
?>