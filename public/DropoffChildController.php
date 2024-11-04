<?php
require_once 'DropoffChildModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
require_once 'PublicLanguageVerifyController.php';
class DropoffChildController
{
    
    
	public static function relativeList()
		{
			
				$data=array();
				
				$data['ssn']=cleanMe($_GET['ssn']);
				$data['filter']=cleanMe($_GET['filter']);
				
				$model = new DropoffChildModel();
				
				$relativeList=$model->relativeList($data);
				
				echo $relativeList;
				
			
		}
	 public static function selectChildren($a=null)
    {
		$path = "../../../../";
		$modelp = new PublicLanguageVerifyModel();
		$model = new DropoffChildModel();
		$data=array();
		$data['cid']=cleanMe($a);
		$getChildren=$model->getChildren($data);
		$companyDetail=$model->companyDetail($data);
		$corporateColor=$model->corporateColor($data);
		$verifyLanguage=$modelp->verifyLanguage();
		$verifyIP    = $model->verifyIP($data);
		$checkOpenStatus    = $model->checkOpenStatus($data);
		if($checkOpenStatus==0)
				{
				header('location:https://www.qloudid.com/company/index.php/Company/openDay/'.$data['cid']);	 die;
				}
				else 
				{
		if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else
			{
		require_once('DropoffChildSelectView.php');
			}
				}
	}
	 public static function verifyIdentity($a=null)
    {
		$path = "../../../../";
		$data=array();
		$data['cid']=cleanMe($a);
		$model = new DropoffChildModel();
		$modelp = new PublicLanguageVerifyModel();
		$companyDetail=$model->companyDetail($data);
		$corporateColor=$model->corporateColor($data);
		$verifyIP    = $model->verifyIP($data);
		$checkOpenStatus    = $model->checkOpenStatus($data);
		$verifyLanguage=$modelp->verifyLanguage();
		if($checkOpenStatus==0)
				{
				header('location:https://www.qloudid.com/company/index.php/Company/openDay/'.$data['cid']);	 die;
				}
				else 
				{
		if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else
			{
		require_once('DropoffChildView.php');
			}
				}
	}
	
	
	public static function checkUserInformation($a)
		{
			$data=array();
			$data['cid']=cleanMe($a);
				$model = new DropoffChildModel();
				
				$checkUserInformation=$model->checkUserInformation($data);
				
				echo $checkUserInformation;
				
			
		}
		
		public static function checkDropoff($a)
			{
			$data=array();
			$data['cid']=cleanMe($a);
				$model = new DropoffChildModel();
				
				$checkDropoff=$model->checkDropoff($data);
				
				echo $checkDropoff;
				
			
		}
		
		public static function sendDropoffInfo($a=null)
		{
			
				$model = new DropoffChildModel();
				$path = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				$updateChild=$model->updateChild();
				
				header('location:../daycareThanks/'.$data['cid']);
				
			
		}
		
		public static function daycareThanks($a=null)
		{
			
				$model = new DropoffChildModel();
				$path = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$modelp = new PublicLanguageVerifyModel();
				$companyDetail=$model->companyDetail($data);
				$verifyLanguage=$modelp->verifyLanguage();
				$verifyIP    = $model->verifyIP($data);
				$checkOpenStatus    = $model->checkOpenStatus($data);
				/*if($checkOpenStatus==0)
				{
				header('location:https://www.qloudid.com/company/index.php/Company/openDay/'.$data['cid']);	 die;
				}
				else 
				{*/
			if($verifyIP==0)
			{
				require_once('LicenseErrorView.php');
			}
			else
			{
				require_once('DayCareThanksView.php');
			}	
				//}
			
		}
		public static function changeLanguage()
		{
				$modelp = new PublicLanguageVerifyModel();
				$model = new DropoffChildModel();
				$changeLanguage = $modelp->changeLanguage();	
				echo $changeLanguage; die;	
		}
}
?>