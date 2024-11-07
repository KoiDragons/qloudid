<?php
require_once 'PickupChildModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class PickupChildController
{
    
    
    public static function verifyIdentity($a=null)
    {
		$path = "../../../../";
		$data=array();
		$data['cid']=cleanMe($a);
		$model = new PickupChildModel();
		$companyDetail=$model->companyDetail($data);
		$corporateColor=$model->corporateColor($data);
		$verifyIP    = $model->verifyIP($data);
		$verifyLanguage=$model->verifyLanguage();
		$checkOpenStatus    = $model->checkOpenStatus($data);
		if($checkOpenStatus==0)
				{
				header('location:https://www.safeqloud.com/company/index.php/Company/openDay/'.$data['cid']);	 die;
				}
				else 
				{
		if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else
			{
			require_once('PickupChildView.php');
			}
				}
	
	}
	public static function changeLanguage()
		{
				$model = new PickupChildModel();
				$changeLanguage = $model->changeLanguage();	
				echo $changeLanguage; die;	
		}
	 public static function selectChildren($a=null)
    {
		$path = "../../../../";
		$data=array();
		$data['cid']=cleanMe($a);
		$model = new PickupChildModel();
		$getChildren=$model->getChildren($data);
		$companyDetail=$model->companyDetail($data);
		$corporateColor=$model->corporateColor($data);
		$verifyLanguage=$model->verifyLanguage();
		$verifyIP    = $model->verifyIP($data);
		$checkOpenStatus    = $model->checkOpenStatus($data);
		if($checkOpenStatus==0)
				{
				header('location:https://www.safeqloud.com/company/index.php/Company/openDay/'.$data['cid']);	 die;
				}
				else 
				{
		if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else
			{
			require_once('PickupChildSelectView.php');
			}
				}
	}
	
	public static function checkUserInformation($a)
		{
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new PickupChildModel();
				
				$checkUserInformation=$model->checkUserInformation($data);
				
				echo $checkUserInformation;
				
			
		}
	public static function sendPickupInfo($a=null)
		{
			
				$data=array();
				$path = "../../../../";
				$data['cid']=cleanMe($a);
				$model = new PickupChildModel();
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				$updateChild=$model->updateChild();
				header('location:../daycareThanks/'.$data['cid']);
				
			
		}
		
		public static function daycareThanks($a=null)
		{
			
				$data=array();
				$path = "../../../../";
				$data['cid']=cleanMe($a);
				$model = new PickupChildModel();
				$verifyLanguage=$model->verifyLanguage();
				$companyDetail=$model->companyDetail($data);
				$verifyIP    = $model->verifyIP($data);
				$checkOpenStatus    = $model->checkOpenStatus($data);
				if($checkOpenStatus==0)
				{
				header('location:https://www.safeqloud.com/company/index.php/Company/openDay/'.$data['cid']);	 die;
				}
				else 
				{
			if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else
			{
				require_once('DayCarePickupThanksView.php');
				
			}
				}
		}
}
?>