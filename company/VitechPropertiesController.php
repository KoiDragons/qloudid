<?php
require_once 'VitechPropertiesModel.php';
require_once 'EmployeeCheckController.php';
require_once 'CompanyCrmController.php';
require_once 'DaycarePricePlanController.php';	
require_once '../configs/utility.php';
require_once('../AppModel.php');
class VitechPropertiesController
{
	
	public static function selectMethod($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
             $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
				$model       = new VitechPropertiesModel();
				$data['cid']=cleanMe($a);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data);
				
			require_once('VitechPropertiesSelectMethodView.php');
	}
	}
	
	 public static function addFile($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
             $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
				$model       = new VitechPropertiesModel();
				$data['cid']=cleanMe($a);
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$companyDetail    = $model->companyDetail($data);
				
			require_once('VitechPropertiesFileUploadView1.php');
	}
	}
	
	
	public static function updateFile($a=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				 
				$data['user_id']=$_SESSION['user_id'];
				$model = new VitechPropertiesModel();
				$updateFile = $model->updateFile($data);
				if($updateFile==1)
				{
					header("location:../importPropertyAccount/".$data['cid']);	
					
				}
				else
				{
					header("location:../addFile/".$data['cid']."?error=".$updateFile);
					
				}	
				
			}
			
			
			
		}
		
		
		public static function importPropertyAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				//print_r($_SESSION); die;
				if(isset($_SESSION['file_e']))
				{
					$data['bid']=$_SESSION['bid'];
					$data['file_e']=$_SESSION['file_e'];	
					unset($_SESSION['file_e']);
					unset($_SESSION['bid']);
				}
				else
				{
					header("location:../addFile/".$data['cid']);
					
				}
				$model = new VitechPropertiesModel();
				
				$file    = $model->fileDetail($data);
				
				require_once('VitechFileImportView.php');
			}
		}
	
	 public static function listImportedProperties($a=null)
    {
		$valueNew = checkLogin();
		if ($valueNew == 0) {
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				
			$model1       = new VitechPropertiesModel();
			$displayproperties  = $model1->displaypImportedroperties($data);
			$serviceCategoryList    = $model1->serviceCategoryList($data);
			$companyDetail    = $model1->companyDetail($data);
			$brokerRequestApprovedCount    = $model1->brokerRequestApprovedCount($data);
			require_once('VitechPropertiesImportedView.php');
	}
	}
	
	
	
	 public static function refineImportedProperties($a=null,$b=null)
    {
		$valueNew = checkLogin();
		if ($valueNew == 0) {
        $data=array();
		$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
		$urlDetail    = $model1->urlDetail($data);
		header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['ip_id']=cleanMe($b);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				
			$model1       = new VitechPropertiesModel();
			$serviceCategoryList    = $model1->serviceCategoryList($data);
			$displaypropertiesDetail    = $model1->displaypImportedrPopertiesDetail($data);
			$countryList    = $model1->countryList($data); 
			$companyDetail    = $model1->companyDetail($data);
			require_once('VitechPropertiesRefinePropertyView.php');
	}
	}
	
	
	
	  public static function refineVitechAdddress($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['ip_id']=cleanMe($b);
			$data['property_status']=$_POST['property_status'];
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			require_once('../lib/url_shortener.php');
			$addVitechAdddress    = $model1->refineVitechAdddress($data);	
			
			header('location:../../photoInformation/'.$data['cid'].'/'.$addVitechAdddress); die;
	}
	}
  
	
	
	public static function importPropertiesFromFile($a=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				
				$data['user_id']=$_SESSION['user_id'];
				$model = new VitechPropertiesModel();
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$importPropertiesFromFile    = $model->importPropertiesFromFile($data);
				header('location:../listImportedProperties/'.$data['cid']);
			}
		}
		
		
		public static function importBrokersFromFile($a=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				
				$data['user_id']=$_SESSION['user_id'];
				$model = new VitechPropertiesModel();
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$importBrokersFromFile    = $model->importBrokersFromFile($data);
				header('location:../../LandloardBroker/sentBrokerRequest/'.$data['cid']);
			}
		}
		
		
		public static function importLandloardPropertiesFromFile($a=null,$b=null)
		{
			
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../user/index.php/LoginAccount");
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['bid']=cleanMe($b);
				$data['user_id']=$_SESSION['user_id'];
				$model = new VitechPropertiesModel();
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$importLandloardPropertiesFromFile    = $model->importLandloardPropertiesFromFile($data);
				header('location:../../../Landloard/listImportedProperties/'.$data['cid'].'/'.$data['bid']);
			}
		}
	
	 public static function proposalSetupinformation($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['app_id']=cleanMe($b);
			$data['user_id']=$_SESSION['user_id'];
			
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				
			$model      = new VitechPropertiesModel();
			 
			$model3       = new DaycarePricePlanModel();
			$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
			if($appdownloadStatus==0)
			{
			$getPermissionDetail    = $model->getPermissionDetail($data);
			header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
			die;
			}
			$employeeSkillCount    = $model->employeeSkillCount($data);
			$contentDetailInsert = $model->contentDetailInsert($data);	
			$contentDetail    = $model->contentDetail($data);
			$displayEmployeeproperties    = $model->displayEmployeeproperties($data);
			/*
			if($employeeSkillCount>0 && $contentDetail==1)
			{
			 header('location:../../listPropertyProposal/'.$data['cid']); die;
			}*/
			$proposalTrialInformation    = $model->proposalTrialInformation($data);
			if($proposalTrialInformation==0)
			{
				header('location:https://www.safeqloud.com/company/index.php/DaycarePricePlan/planAccount/'.$data['cid'].'/'.$data['app_id']); die;
			}
			$companyDetail    = $model->companyDetail($data);
			require_once('VitechPropertiesProposalSetupView.php');
	}
	}

	
	 public static function selectAppAccess($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['app_id']=cleanMe($b);
			$data['user_id']=$_SESSION['user_id'];
			
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				
			$model      = new VitechPropertiesModel();
			 
			$model3       = new DaycarePricePlanModel();
			$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
			if($appdownloadStatus==0)
			{
			$getPermissionDetail    = $model->getPermissionDetail($data);
			header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
			die;
			}
			$employeeSkillCount    = $model->employeeSkillCount($data);
			$contentDetailInsert = $model->contentDetailInsert($data);	
			$contentDetail    = $model->contentDetail($data);
			$displayEmployeeproperties    = $model->displayEmployeeproperties($data);
			 
			$listAppAccessEmployees    = $model->listAppAccessEmployees($data);
			//echo '<pre>'; print_r($listAppAccessEmployees); echo '</pre>';  die;
			require_once('VitechPropertiesProposalAppEmployeeAccessView.php');
	}
	}
	
	
	 public static function provideAccess($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['app_id']=cleanMe($b);
			$data['access_id']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				
			$model      = new VitechPropertiesModel();
			 
			$model3       = new DaycarePricePlanModel();
			$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
			if($appdownloadStatus==0)
			{
			$getPermissionDetail    = $model->getPermissionDetail($data);
			header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
			die;
			}
			$provideAccess    = $model->provideAccess($data);
			 header('location:../../../selectAppAccess/'.$data['cid'].'/'.$data['app_id']);
	}
	}
	
	 public static function removeAccess($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['app_id']=cleanMe($b);
			$data['access_id']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				
			$model      = new VitechPropertiesModel();
			 
			$model3       = new DaycarePricePlanModel();
			$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
			if($appdownloadStatus==0)
			{
			$getPermissionDetail    = $model->getPermissionDetail($data);
			header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
			die;
			}
			$removeAccess    = $model->removeAccess($data);
			 header('location:../../../selectAppAccess/'.$data['cid'].'/'.$data['app_id']);
	}
	}
	
	public static function companyInformation($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
				$path = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				$_SESSION['company_id']=cleanMe($a);
				$model1       = new VitechPropertiesModel();
				 
				$contentDetailInsert = $model1->contentDetailInsert($data);	
				$contentDetail    = $model1->getContentDetail($data);
				require_once('VitechPropertiesCompanyDetailView.php');
			}
		}
		  public static function updateVisual()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path         = "../../";
				$model = new VitechPropertiesModel();
				$data['user_id']=$_SESSION['user_id'];
				$updateVisual = $model->updateVisual();	
				echo $updateVisual; die;
			}
		}
		
		
		public static function updateContent($a=null , $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount");
				} else {
				$path         = "../../";
				$model = new VitechPropertiesModel();
				$data['user_id']=$_SESSION['user_id'];
				$data['id']=cleanMe($a);	
				
				$data['cid']=cleanMe($b);
						
				$updateContent = $model->updateContent($data);	
				header("location:../../companyInformation/".$data['cid']);
			}
		}
		
		
	 public static function listAddedProperties($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				
				
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				
			$model      = new VitechPropertiesModel();
			$data['fapp_id']=57; $data['app_id']    = $model->appId($data);
			$model3       = new DaycarePricePlanModel();
			$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
			if($appdownloadStatus==0)
			{
			$getPermissionDetail    = $model->getPermissionDetail($data);
			header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
			die;
			}
			$proposalTrialInformation    = $model->proposalTrialInformation($data);
			if($proposalTrialInformation==0)
			{
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid'].'/'.$data['app_id']); die;
			}
			
			$employeeSkillCount    = $model->employeeSkillCount($data);
			 
			$contentDetail    = $model->contentDetail($data);
			$displayEmployeeproperties    = $model->displayEmployeeproperties($data);
			
			if($employeeSkillCount==0 || $contentDetail==0)
			{
				 header('location:../proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			
			$displayproperties    = $model->displayEmployeeproperties($data);
			 
			if(empty($displayproperties))
			{
			header('location:../propertyStatus/'.$data['cid']); die;			
			}
			
			 
			$companyDetail    = $model->companyDetail($data);
			require_once('VitechPropertiesAvailableNewView.php');
	}
	}

	 public static function teamVailable($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				
				
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				
			$model      = new VitechPropertiesModel();
			$data['fapp_id']=57; $data['app_id']    = $model->appId($data);
			$model3       = new DaycarePricePlanModel();
			$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
			if($appdownloadStatus==0)
			{
			$getPermissionDetail    = $model->getPermissionDetail($data);
			header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
			die;
			}
			$proposalTrialInformation    = $model->proposalTrialInformation($data);
			if($proposalTrialInformation==0)
			{
				header('location:../../DaycarePricePlan/planAccount/'.$data['cid'].'/'.$data['app_id']); die;
			}
			
			$employeeSkillCount    = $model->employeeSkillCount($data);
			 
			$contentDetail    = $model->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
				 header('location:../proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			if(!isset($_POST['proposal_data']))
			{
				 header('location:../listAddedProperties/'.$data['cid']); die;
			}
			$listTeam    = $model->listTeam($data);
			 
			 
			$companyDetail    = $model->companyDetail($data);
			require_once('VitechPropertiesTeamAvailableView.php');
	}
	}

	
	
	
public static function createPropertyProposal($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			 
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				if(!isset($_POST['proposal_data']))
				{
					header("location:../listAddedProperties/".$data['cid']);
				}
			$model1       = new VitechPropertiesModel();
			 $userSummary    = $model1->userSummary($data);
			 
			 $countryList    = $model1->countryList($data); 
			require_once('VitechEmployeePropertiesProposalView.php');
	}
	}
	
	
	public static function sendPropertyProposal($a=null)
    {
		
		$valueNew = checkLogin();
        if ($valueNew == 0) {
           $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			 
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			 
			$countryList    = $model1->countryList();	
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');			
			$sendProposal    = $model1->sendPropertyProposal($data);			
           header("location:../listPropertyProposal/".$data['cid']);
	}
	}
	
	 public static function listPropertyProposal($a=null)
    {
		$valueNew = checkLogin();
       if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				
			$model1       = new VitechPropertiesModel();
			$data['fapp_id']=57;
			$data['app_id']    = $model1->appId($data);
			$model3       = new DaycarePricePlanModel();
			$appdownloadStatus    = $model3->appdownloadStatus($data);
				
			if($appdownloadStatus==0)
			{
			$getPermissionDetail    = $model1->getPermissionDetail($data);
			header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
			die;
			}
			$proposalTrialInformation    = $model1->proposalTrialInformation($data);
			if($proposalTrialInformation==0)
			{
				header('location:https://www.safeqloud.com/company/index.php/DaycarePricePlan/planAccount/'.$data['cid'].'/'.$data['app_id']); die;
			} 
			
			$employeeSkillCount    = $model1->employeeSkillCount($data);
			$contentDetail    = $model1->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
				 header('location:../proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			$displayEmployeeproperties    = $model1->displayEmployeeProposalProperties($data);
			
			
			
			$brokerPropertyVerification    = $model1->brokerPropertyVerification($data);  
            $displayproperties    = $model1->listProposals($data);
			if(count($displayproperties)==0)
			{
				header('location:../listAddedProperties/'.$data['cid']); die;
			}
			require_once('VitechPropertiesProposalsView.php');
	}
	}

	
	public static function perNightPricingList($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['request_id']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$fetchPropertiesAddress    = $model1->fetchPropertiesAddress($data);
				if($data['request_id']=='')
				{
					header('location:https://www.safeqloud.com/company/index.php/VitechProperties/perNightPricingList/'.$data['cid'].'/'.$data['pid'].'/'.$fetchPropertiesAddress['request_id']);
				}
			$userSummary    = $model1->userSummary($data);
			$listPricing    = $model1->listPricing($data);
			require_once('VitechPropertiesNightPricingListView.php');
	}
	}
	
	
	public static function publishPropertyForRent($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$publishPropertyForRent    = $model1->publishPropertyForRent($data);
			 header('location:../../listEmployeesRentProperties/'.$data['cid']);
	}
	}
	

	public static function addPricing($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['request_id']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$addPricing    = $model1->addPricing($data);
			header('location:../../../editPropertyPerNightPrice/'.$data['cid'].'/'.$data['pid'].'/'.$data['request_id'].'/'.$addPricing);
	}
	}

		public static function editPropertyPerNightPrice($a=null,$b=null,$c=null,$d=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['request_id']=cleanMe($c);
			$data['price_id']=cleanMe($d);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			 
			 	 
			$fetchPropertiesBuilding    = $model1->fetchPropertiesBuilding($data);
			$fetchPropertiesInterior    = $model1->fetchPropertiesInterior($data);
			$fetchPropertyTaskInfo    = $model1->fetchPropertyTaskInfo($data);	
			$fetchPropertiesImages    = $model1->listPhotos($data);
			$fetchPropertiesAddress    = $model1->fetchPropertiesAddress($data);
			$fetchPropertyStatus    = $model1->fetchPropertyStatus($data);
			$vitechRequestCount    = $model1->vitechRequestCount($data); 
			$fetchPropertiesPricing    = $model1->fetchPropertiesPricing($data); 
			$pricing    = $model1->fetchPropertiesNightPricing($data);
			$dayAvailable    = $model1->dayAvailable($data); 
			require_once('VitechPropertiesEditPerNightPriceView.php');
	}
	}
	public static function wishlistDetail($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			 
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$data['fapp_id']=59; $data['app_id']    = $model1->appId($data);
			$model3       = new DaycarePricePlanModel();
			$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
			if($appdownloadStatus==0)
			{
			$getPermissionDetail    = $model1->getPermissionDetail($data);
			header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
			die;
			}
			
			$proposalTrialInformation    = $model1->proposalTrialInformation($data);
			if($proposalTrialInformation==0)
			{
				header('location:https://www.safeqloud.com/company/index.php/DaycarePricePlan/planAccount/'.$data['cid'].'/'.$data['app_id']); die;
			} 
			
			$employeeSkillCount    = $model1->employeeSkillCount($data);
			$contentDetail    = $model1->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
				 header('location:../proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			 $userSummary    = $model1->userSummary($data);
			$propertyWishList    = $model1->propertyWishList($data);
			 
			require_once('VitechEmployeePropertiesWishlistView.php');
	}
	}
	
	
	public static function listRentProposals($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			 
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$data['fapp_id']=59; $data['app_id']    = $model1->appId($data);
			$model3       = new DaycarePricePlanModel();
			$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
			/*if($appdownloadStatus==0)
			{
			$getPermissionDetail    = $model1->getPermissionDetail($data);
			header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
			die;
			}
			
			$proposalTrialInformation    = $model1->proposalTrialInformation($data);
			if($proposalTrialInformation==0)
			{
				header('location:https://www.safeqloud.com/company/index.php/DaycarePricePlan/planAccount/'.$data['cid'].'/'.$data['app_id']); die;
			} 
			
			$employeeSkillCount    = $model1->employeeSkillCount($data);
			$contentDetail    = $model1->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
				 header('location:../proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}*/
			 $userSummary    = $model1->userSummary($data);
			$displayproperties    = $model1->rentProposalList($data);
			 
			require_once('VitechPropertiesRentProposalsView.php');
	}
	}
	
	
	
	public static function createProposal($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			 
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				if(!isset($_POST['proposal_data']))
				{
					header("location:../wishlistDetail/".$data['cid']);
				}
			$model1       = new VitechPropertiesModel();
			$data['fapp_id']=59; $data['app_id']    = $model1->appId($data);
			$model3       = new DaycarePricePlanModel();
			$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
			if($appdownloadStatus==0)
			{
			$getPermissionDetail    = $model1->getPermissionDetail($data);
			header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
			die;
			}
				$proposalTrialInformation    = $model1->proposalTrialInformation($data);
			if($proposalTrialInformation==0)
			{
				header('location:https://www.safeqloud.com/company/index.php/DaycarePricePlan/planAccount/'.$data['cid'].'/'.$data['app_id']); die;
			} 
			
			$employeeSkillCount    = $model1->employeeSkillCount($data);
			$contentDetail    = $model1->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
				 header('location:../proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			 $userSummary    = $model1->userSummary($data);
			$propertyWishList    = $model1->propertyWishList($data);
			 $countryList    = $model1->countryList($data); 
			require_once('VitechEmployeePropertiesCreateProposalView.php');
	}
	}
	
	public static function sendProposal($a=null)
    {
		
		$valueNew = checkLogin();
        if ($valueNew == 0) {
           $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			 
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			 
			$countryList    = $model1->countryList();	
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');			
			$sendProposal    = $model1->sendProposal($data);			
           header("location:../listRentProposals/".$data['cid']);
	}
	}
	
	 public static function updateTaskAssignment($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['request_id']=cleanMe($c);			
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			require_once('../lib/url_shortener.php');
			$updateTaskAssignment    = $model1->updateTaskAssignment($data);	
			header('location:../../../viewPropertyServices/'.$data['cid'].'/'.$data['pid']); die;
			 
			
	}
	}
   
	public static function propertyStatus($a=null)
    {
		
		$valueNew = checkLogin();
        if ($valueNew == 0) {
           $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			header('location:../propertyInformation/'.$data['cid']); die;	
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			 
			$countryList    = $model1->countryList();		
			$companyDetail    = $model1->companyDetail($data);			
            require_once('VitechPropertiesPropertyStatuView.php');
	}
	}
	
	
	
	
	public static function propertyTaskAssignment($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
           $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['request_id']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			 
			$servicesRequestManager    = $model1->servicesRequestManager($data);
			$fetchPropertiesAddress    = $model1->fetchPropertiesAddress($data);
			$fetchPropertyStatus    = $model1->fetchPropertyStatus($data);
			$vitechRequestCount    = $model1->vitechRequestCount($data); 
			$fetchPropertiesPricing    = $model1->fetchPropertiesPricing($data); 
			$fetchPropertiesPricing    = $model1->fetchPropertiesPricing($data);
			$listEmployees    = $model1->listEmployees($data);
			require_once('VitechPropertiesAssignTaskView.php');
	}
	}
	
	
	
	
	
	public static function photoInformation($a=null, $b=null, $c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				$model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				} else {
				$path = "../../../../../../";
				$model       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['pid']=cleanMe($b);
				$data['request_id']=cleanMe($c);
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				 
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.safeqloud.com/error404.php");
				}
				$displayPhotos    = $model->displayPhotos($data); 
				$fetchPropertiesAddress    = $model->fetchPropertiesAddress($data);
				 
				if($data['request_id']=='')
				{
					header('location:https://www.safeqloud.com/company/index.php/VitechProperties/photoInformation/'.$data['cid'].'/'.$data['pid'].'/'.$fetchPropertiesAddress['request_id']);
				}
				$fetchPropertyContacTInfo    = $model->fetchPropertyContacTInfo($data);
				 
				$fetchPropertyStatus    = $model->fetchPropertyStatus($data);
				$fetchPropertiesImages    = $model->listPhotos($data);
				$vitechRequestCount    = $model->vitechRequestCount($data); 
				$fetchPropertiesPricing    = $model->fetchPropertiesPricing($data);
				$fetchPropertyTaskInfo    = $model->fetchPropertyTaskInfo($data);
				require_once('VitechPropertyPhotoInfoViewNew.php');
			}
		}
		
		public static function updatePhotos($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($a);
				$data['request_id']=cleanMe($b);
				$result    = $model1->updatePhotos($data);
				echo $result; die;
				}
		}
		
		public static function getImageInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($co);
				 
				$result    = $model1->getImageInfo($data);
				echo $result; die;
				}
		}
		
		public static function getPhoto($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($a);
				$data['request_id']=cleanMe($b); 
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		
		public static function updatePhotoOrder($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($co);
				$result    = $model1->updatePhotoOrder($data);
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		
		public static function deletePhoto($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($co);
				$result    = $model1->deletePhoto($data);
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		
		
		public static function updatePhotoDragging($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['rid']=cleanMe($co);
				$result    = $model1->updatePhotoDragging($data);
				$result    = $model1->displayPhotos($data);
				echo $result; die;
				}
		}
		
		
	public static function searchPropertyInformation($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
             $path = "../../";
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				
			
			$model1       = new VitechPropertiesModel();
			 $serviceCategoryList    = $model1->serviceCategoryList($data);	
			$countryList    = $model1->countryList();			
            require_once('VitechPropertiesSearchPropertyView.php');
	}
	}	
	
	
	
	public static function selectRequestType($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
             $path = "../../";
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				
			
			$model1       = new VitechPropertiesModel();
			 $serviceCategoryList    = $model1->serviceCategoryList($data);	
			$countryList    = $model1->countryList();
			$listEmployees    = $model1->listEmployees($data);			
            require_once('VitechPropertiesAddRequestInformationView.php');
	}
	}	
	
	
	public static function sendRequestToOwner($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
             $path = "../../";
          $model1       = new VitechPropertiesModel();
				
				 header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				
			
			$model1       = new VitechPropertiesModel();
			$sendRequestToOwner    = $model1->sendRequestToOwner($data);	
			header('location:../../listProperties/'.$data['cid']); 
	}
	}	
		
	 public static function listAvailableProperties($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
           $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				
				if(!isset($_POST['address']))
				{
					header('location:../searchPropertyInformation/'.$data['cid']); die;
				}
				
			$model1       = new VitechPropertiesModel();
			 $displayproperties    = $model1->searchAvailableproperties($data);
			// print_r($displayproperties); die;
			$companyDetail    = $model1->companyDetail($data);
			$serviceCategoryList    = $model1->serviceCategoryList($data);	
			$countryList    = $model1->countryList();	
			if(count($displayproperties)>0)
			{
				require_once('VitechPropertiesAvailableOnAddressViewNew.php'); die;
			}
			else
			{
				require_once('VitechPropertiesAddPropertyViewNew.php');  die;
			}
	}
	}
		
		
	 public static function propertyInformation($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
             $path = "../../";
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				
			if(!isset($_POST['address']))
				{
					header('location:../searchPropertyInformation/'.$data['cid']); die;
				}
			$model1       = new VitechPropertiesModel();
			 $serviceCategoryList    = $model1->serviceCategoryList($data);	
			$countryList    = $model1->countryList();			
            require_once('VitechPropertiesAddPropertyViewNew.php');
	}
	}
	
    
public static function selectService($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$model1       = new VitechPropertiesModel();
			$selectService    = $model1->serviceSubCategoryList($data);
			echo $selectService; die;
	}
	}
	
	    
public static function selectAddedService($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$model1       = new VitechPropertiesModel();
			$selectService    = $model1->selectAddedService($data);
			echo $selectService; die;
	}
	}
	
	public static function checkApartmentNumberValididty($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$model1       = new VitechPropertiesModel();
			$checkApartmentNumberValididty    = $model1->checkApartmentNumberValididty($data);
			echo $checkApartmentNumberValididty; die;
	}
	}
	
	public static function checkApartmentContractAvailability($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$model1       = new VitechPropertiesModel();
			$checkApartmentContractAvailability    = $model1->checkApartmentContractAvailability($data);
			echo $checkApartmentContractAvailability; die;
	}
	}


public static function updatePropertyStatus($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$model1       = new VitechPropertiesModel();
			$selectService    = $model1->updatePropertyStatus($data);
			echo $selectService; die;
	}
	}
	
    public static function addVitechAdddress($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['property_status']=$_POST['property_status'];
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			require_once('../lib/url_shortener.php');
			$addVitechAdddress    = $model1->addVitechAdddress($data);	
			if($data['property_status']==1)
			{
				header('location:../photoInformation/'.$data['cid'].'/'.$addVitechAdddress); die;
			}
			else
			{
				header('location:../photoInformation/'.$data['cid'].'/'.$addVitechAdddress); die;
			}	
			
			
	}
	}
   public static function serviceTypeInformation($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$professionalTodoUpdate    = $model1->professionalTodoUpdate($data);
			$serviceTodoDetail    = $model1->serviceTodoDetail($data);
			require_once('VitechServiceCategoryTodoView.php');
	}
	}
	
	public static function updateCategoryServiceAllTodos($a=null)
		{
			$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			 	$model1       = new VitechPropertiesModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$result    = $model1->updateCategoryServiceAllTodos($data);
				$result    = $model1->serviceTodoDetail($data);
				echo $result; die;
		}
		}
		
		public static function updateCategoryServiceTodo($a=null)
		{
			$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$result    = $model1->updateCategoryServiceTodo($data);
				//$result    = $model1->serviceTodoDetail($data);
				echo $result; die;
		}
		}
	 public static function listProperties($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				
			$model       = new CompanyCrmModel();
				
			$updateAdmin    = $model->updateAdmin($data);
				
			$checkPermission    = $model->checkPermission($data);
				 
			if($checkPermission ==0)
			{
				header("location:../listEmployeesProperties/".$data['cid']);
			}	
		
			$model1       = new VitechPropertiesModel();
			/*$professionalTodoUpdate    = $model1->professionalTodoUpdate($data);
			 
			if($professionalTodoUpdate==0)
			{
				header('location:../serviceTypeInformation/'.$data['cid']);
			}*/
			$brokerPropertyVerification    = $model1->brokerPropertyVerification($data);  
            $displayproperties    = $model1->displayproperties($data);
			if(empty($displayproperties))
			{
			header('location:../propertyStatus/'.$data['cid']); die;			
			}
			
			 
			$companyDetail    = $model1->companyDetail($data);
			require_once('VitechPropertiesAdminView.php');
	}
	}
	public static function guestReservationList($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['aid']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			 $userSummary    = $model1->userSummary($data);
			$apartmentBookingList    = $model1->apartmentBookingList($data);
			require_once('VitechEmployeePropertiesGuestReservationListView.php');
	}
	}
	
		public static function reservationCheckedInList($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$data['fapp_id']=63; $data['app_id']    = $model1->appId($data);
			$model3       = new DaycarePricePlanModel();
			$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
			if($appdownloadStatus==0)
			{
			$getPermissionDetail    = $model1->getPermissionDetail($data);
			header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
			die;
			}
			$proposalTrialInformation    = $model1->proposalTrialInformation($data);
			if($proposalTrialInformation==0)
			{
				header('location:https://www.safeqloud.com/company/index.php/DaycarePricePlan/planAccount/'.$data['cid'].'/'.$data['app_id']); die;
			} 
			
			$employeeSkillCount    = $model1->employeeSkillCount($data);
			$contentDetail    = $model1->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
				 header('location:../proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			 $userSummary    = $model1->userSummary($data);
			$apartmentBookingList    = $model1->apartmentCheckinBookingList($data);
			 
			require_once('VitechEmployeePropertiesCheckInView.php');
	}
	}
	
	
	public static function reservationCheckedOutList($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$data['fapp_id']=63; $data['app_id']    = $model1->appId($data);
			$model3       = new DaycarePricePlanModel();
			$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
			if($appdownloadStatus==0)
			{
			$getPermissionDetail    = $model1->getPermissionDetail($data);
			header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
			die;
			}
			$proposalTrialInformation    = $model1->proposalTrialInformation($data);
			if($proposalTrialInformation==0)
			{
				header('location:https://www.safeqloud.com/company/index.php/DaycarePricePlan/planAccount/'.$data['cid'].'/'.$data['app_id']); die;
			} 
			
			$employeeSkillCount    = $model1->employeeSkillCount($data);
			$contentDetail    = $model1->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
				 header('location:../proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			 $userSummary    = $model1->userSummary($data);
			$apartmentBookingList    = $model1->apartmentCheckOutBookingList($data);
			require_once('VitechEmployeePropertiesCheckOutView.php');
	}
	}
	
	
	public static function cleaningPendingList($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$data['fapp_id']=64; $data['app_id']    = $model1->appId($data);
			$model3       = new DaycarePricePlanModel();
			$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
			if($appdownloadStatus==0)
			{
			$getPermissionDetail    = $model1->getPermissionDetail($data);
			header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
			die;
			}
			$proposalTrialInformation    = $model1->proposalTrialInformation($data);
			if($proposalTrialInformation==0)
			{
				header('location:https://www.safeqloud.com/company/index.php/DaycarePricePlan/planAccount/'.$data['cid'].'/'.$data['app_id']); die;
			} 
			
			$employeeSkillCount    = $model1->employeeSkillCount($data);
			$contentDetail    = $model1->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
				 header('location:../proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			 $userSummary    = $model1->userSummary($data);
			$apartmentBookingList    = $model1->apartmentCleaningBookingList($data);
			
			require_once('VitechEmployeePropertiesCleaningRequiredView.php');
	}
	}
	
	
	public static function cleanApartment($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['hotel_checkout_id']=cleanMe($b);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			 $cleanApartment    = $model1->cleanApartment($data);
			header('location:../../cleaningInspectionPendingList/'.$data['cid']);
	}
	}
	
	
	public static function cleaningInspectionPendingList($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$data['fapp_id']=63; $data['app_id']    = $model1->appId($data);
			$model3       = new DaycarePricePlanModel();
			$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
			if($appdownloadStatus==0)
			{
			$getPermissionDetail    = $model1->getPermissionDetail($data);
			header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
			die;
			}
			$proposalTrialInformation    = $model1->proposalTrialInformation($data);
			if($proposalTrialInformation==0)
			{
				header('location:https://www.safeqloud.com/company/index.php/DaycarePricePlan/planAccount/'.$data['cid'].'/'.$data['app_id']); die;
			} 
			
			$employeeSkillCount    = $model1->employeeSkillCount($data);
			$contentDetail    = $model1->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
				 header('location:../proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			 $userSummary    = $model1->userSummary($data);
			$apartmentBookingList    = $model1->apartmentCleaningInspectionList($data);
			 
			require_once('VitechEmployeePropertiesCleaningInspectionView.php');
	}
	}
	
	
	public static function checkOutGuest($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['hotel_checkout_id']=cleanMe($b);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			 $checkOutGuest    = $model1->checkOutGuest($data);
			header('location:../../reservationCheckedOutList/'.$data['cid']); die;
	}
	}
	
	
		public static function reservationList($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			 $userSummary    = $model1->userSummary($data);
			$apartmentBookingList    = $model1->apartmentCompleteBookingList($data);
			require_once('VitechEmployeePropertiesFullReservationListView.php');
	}
	}
	public static function viewPropertyDetail($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				
				
				$model       = new CompanyCrmModel();
				
			$updateAdmin    = $model->updateAdmin($data);
				
			$checkPermission    = $model->checkPermission($data);
				 
			
			$model1       = new VitechPropertiesModel();
			 
            
			$getPropertyDetailInfo    = $model1->getPropertyDetailVitechNewInfo($data); 
			 
			if($checkPermission ==0)
			{
				 
				header("location:../../listEmployeesProperties/".$data['cid']); die;
				 
			}	
			
			$companyDetail    = $model1->companyDetail($data); 
			require_once('VitechPropertiesDetailInfoForAdminView.php');
	}
	}
	
	
	public static function viewPropertyServices($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
				
				
				$model       = new CompanyCrmModel();
				
			$updateAdmin    = $model->updateAdmin($data);
				
			$checkPermission    = $model->checkPermission($data);
				 
			
			$model1       = new VitechPropertiesModel();
			 
            $displayproperties    = $model1->displayproperties($data);
			$getPropertyDetailInfo    = $model1->getPropertyDetailVitechNewInfo($data); 
			 
			if($checkPermission ==0)
			{
				 
				header("location:../../listEmployeesProperties/".$data['cid']); die;
				 
			}	
			$propertyServicesRequest    = $model1->propertyServicesRequest($data); 		
			 
			$companyDetail    = $model1->companyDetail($data); 
			require_once('VitechPropertiesServicesAdminView.php');
	}
	}
	public static function listEmployeesProperties($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$brokerPropertyVerification    = $model1->brokerPropertyVerification($data);   
            $displayproperties    = $model1->displayEmployeeproperties($data);
			 
			if(empty($displayproperties))
			{
			header('location:../propertyInformation/'.$data['cid']); die;	
			}
			
			$brokerRequestApprovedCount    = $model1->brokerRequestApprovedCount($data);
			$userSummary    = $model1->userSummary($data);
			require_once('VitechEmployeePropertiesNewView.php');
	}
	}
	
	
	public static function listEmployeesRentProperties($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$brokerPropertyVerification    = $model1->brokerPropertyVerification($data);   
			 if(!isset($_POST['city']) || $_POST['city']=='')
			 {
				 
				 $displayproperties    = $model1->displayEmployeeRentProperties($data); 
				 
				 
			 }
           else
		   {
				$_POST['start_date']=strtotime($_POST['rz_booking_dates'][0]);
				$_POST['end_date']=strtotime($_POST['rz_booking_dates'][1]);
			    $displayproperties    = $model1->apartmentList($data);
		   }
			$brokerRequestApprovedCount    = $model1->brokerRequestApprovedCount($data); 
			$locationList    = $model1->locationList($data);
			$userSummary    = $model1->userSummary($data);
			require_once('VitechEmployeePropertiesForRentView.php');
	}
	}
	
	
	
	
	public static function searchRentProperties($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$data['fapp_id']=59; $data['app_id']    = $model1->appId($data);
			//print_r($data); die;
			$model3       = new DaycarePricePlanModel();
			$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
			if($appdownloadStatus==0)
			{
			$getPermissionDetail    = $model1->getPermissionDetail($data);
			header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
			die;
			}
			
				$proposalTrialInformation    = $model1->proposalTrialInformation($data);
			if($proposalTrialInformation==0)
			{
				header('location:https://www.safeqloud.com/company/index.php/DaycarePricePlan/planAccount/'.$data['cid'].'/'.$data['app_id']); die;
			} 
			
			$employeeSkillCount    = $model1->employeeSkillCount($data);
			$contentDetail    = $model1->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
				 header('location:../proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			$brokerPropertyVerification    = $model1->brokerPropertyVerification($data);   
			 
			 if(!isset($_POST['city']) || $_POST['city']=='')
			 {
				 
				 $displayproperties    = array(); 
			 }
           else
		   {
				$_POST['start_date']=strtotime($_POST['rz_booking_dates'][0]);
				$_POST['end_date']=strtotime($_POST['rz_booking_dates'][1]);
			    $displayproperties    = $model1->apartmentList($data);
				  
		   }
			$data['REQUEST_URI']=$data['cid'];
			$company_id    = $model1->decryptCompany($data);
			 
			$locationList    = $model1->locationList($data);
			$userSummary    = $model1->userSummary($data);
			require_once('VitechEmployeeSearchPropertiesForRentView.php');
	}
	}
	
	
	public static function listEmployeesCreatedProperties($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$brokerPropertyVerification    = $model1->brokerPropertyVerification($data);   
			$displayproperties    = $model1->displayEmployeeCreatedRentProperties($data); 
			$brokerRequestApprovedCount    = $model1->brokerRequestApprovedCount($data); 
			$locationList    = $model1->locationList($data);
			$userSummary    = $model1->userSummary($data);
			require_once('VitechEmployeePropertiesCreatedForRentView.php');
	}
	}
	
	
	public static function listEmployeesRentBrokerShare($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			 
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$data['fapp_id']=59; $data['app_id']    = $model1->appId($data);
			$model3       = new DaycarePricePlanModel();
			$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
			if($appdownloadStatus==0)
			{
			$getPermissionDetail    = $model1->getPermissionDetail($data);
			header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
			die;
			}
			
				$proposalTrialInformation    = $model1->proposalTrialInformation($data);
			if($proposalTrialInformation==0)
			{
				header('location:https://www.safeqloud.com/company/index.php/DaycarePricePlan/planAccount/'.$data['cid'].'/'.$data['app_id']); die;
			} 
			
			$employeeSkillCount    = $model1->employeeSkillCount($data);
			$contentDetail    = $model1->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
				 header('location:../proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			$brokerPropertyVerification    = $model1->brokerPropertyVerification($data);   
			 if(!isset($_POST['city']) || $_POST['city']=='')
			 {
				 
				 $displayproperties    = array(); 
			 }
           else
		   {
				$_POST['start_date']=strtotime($_POST['rz_booking_dates'][0]);
				$_POST['end_date']=strtotime($_POST['rz_booking_dates'][1]);
			    $displayproperties    = $model1->brokerSharedRentPropertyList($data);
		   }
			$data['REQUEST_URI']=$data['cid'];
			$company_id    = $model1->decryptCompany($data);
			$locationList    = $model1->locationList($data);
			$userSummary    = $model1->userSummary($data);
			require_once('VitechEmployeePropertiesForBrokerShareView.php');
	}
	}
	
	public static function listEmployeesRentClientShare($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$data['fapp_id']=59; $data['app_id']    = $model1->appId($data);
			$model3       = new DaycarePricePlanModel();
			$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
			if($appdownloadStatus==0)
			{
			$getPermissionDetail    = $model1->getPermissionDetail($data);
			header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
			die;
			}
			
				$proposalTrialInformation    = $model1->proposalTrialInformation($data);
			if($proposalTrialInformation==0)
			{
				header('location:https://www.safeqloud.com/company/index.php/DaycarePricePlan/planAccount/'.$data['cid'].'/'.$data['app_id']); die;
			} 
			
			$employeeSkillCount    = $model1->employeeSkillCount($data);
			$contentDetail    = $model1->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
				 header('location:../proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			 if(!isset($_POST['city']) || $_POST['city']=='')
			 {
				 
				  $displayproperties    = array(); 
			 }
           else
		   {
				$_POST['start_date']=strtotime($_POST['rz_booking_dates'][0]);
				$_POST['end_date']=strtotime($_POST['rz_booking_dates'][1]);
			    $displayproperties    = $model1->clientRentPropertyList($data);
		   }
			$data['REQUEST_URI']=$data['cid'];
			$company_id    = $model1->decryptCompany($data);
			$locationList    = $model1->locationList($data);
			$userSummary    = $model1->userSummary($data);
			require_once('VitechEmployeePropertiesForClientShareView.php');
	}
	}
	
	public static function guestReservationInformation($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$data['fapp_id']=59; $data['app_id']    = $model1->appId($data);
			$model3       = new DaycarePricePlanModel();
			$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
			if($appdownloadStatus==0)
			{
			$getPermissionDetail    = $model1->getPermissionDetail($data);
			header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
			die;
			}
			
			$proposalTrialInformation    = $model1->proposalTrialInformation($data);
			if($proposalTrialInformation==0)
			{
				header('location:https://www.safeqloud.com/company/index.php/DaycarePricePlan/planAccount/'.$data['cid'].'/'.$data['app_id']); die;
			} 
			
			$employeeSkillCount    = $model1->employeeSkillCount($data);
			$contentDetail    = $model1->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
				 header('location:../proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			 
			 if(!isset($_POST['broker_property_id']))
			 {
				  header('location:../listEmployeesRentProperties/'.$data['cid']); die;
				  
			 }
           else
		   {
				$data['pid']=$_POST['broker_property_id'];
				  $data['owner_property_id']=$_POST['owner_property_id'];	
		   }
			
			 $countryList    = $model1->countryList();	
			$userSummary    = $model1->userSummary($data);
			require_once('VitechEmployeePropertiesGuestInformationView.php');
	}
	}
	
	
	public static function guestInformationVerification($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
				}
				else
				{
				$path         = "../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$data['aid']=cleanMe($c);
				$model1       = new VitechPropertiesModel();
				$data['fapp_id']=59; $data['app_id']    = $model1->appId($data);
			$model3       = new DaycarePricePlanModel();
			$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
			if($appdownloadStatus==0)
			{
			$getPermissionDetail    = $model1->getPermissionDetail($data);
			header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
			die;
			}
			
			$proposalTrialInformation    = $model1->proposalTrialInformation($data);
			if($proposalTrialInformation==0)
			{
				header('location:https://www.safeqloud.com/company/index.php/DaycarePricePlan/planAccount/'.$data['cid'].'/'.$data['app_id']); die;
			} 
			
			$employeeSkillCount    = $model1->employeeSkillCount($data);
			$contentDetail    = $model1->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
				 header('location:../../../proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			
				$result    = $model1->verifyUserDetail($data);
				if($result['id']==0) 
				{
				require_once('VitechReservationNoMatchFoundViewNew.php'); 	
				}
				else
				{
				require_once('VitechReservationMatchFoundView.php');	
				}
				
				
				
				}
				
			 
		}
		
		 public static function sendReservationDeail($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data=$_POST;
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$data['aid']=cleanMe($c);
				$model1       = new VitechPropertiesModel();
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../lib/url_shortener.php');
				$resultOrg1    = $model1->sendBookingInfo($data);
				header("location:../../../guestReservationList/".$data['cid']."/".$data['pid']."/".$data['aid']);	
				}
		}
		
	
	
	
	public static function addUserForReservation($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['aid']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$data['fapp_id']=59; $data['app_id']    = $model1->appId($data);
			$model3       = new DaycarePricePlanModel();
			$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
			if($appdownloadStatus==0)
			{
			$getPermissionDetail    = $model1->getPermissionDetail($data);
			header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
			die;
			}
			
			$proposalTrialInformation    = $model1->proposalTrialInformation($data);
			if($proposalTrialInformation==0)
			{
				header('location:https://www.safeqloud.com/company/index.php/DaycarePricePlan/planAccount/'.$data['cid'].'/'.$data['app_id']); die;
			} 
			
			$employeeSkillCount    = $model1->employeeSkillCount($data);
			$contentDetail    = $model1->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
				 header('location:../../../proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			
			$countryOptions    = $model1->countryList($data);
			$apartmentBookingList    = $model1->apartmentBookingList($data);
			require_once('VitechReservationCreateGuestLimitedInfoView.php');
	}
	}
	
	
	public static function addUserDetailForReservation($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['aid']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$data['fapp_id']=59; $data['app_id']    = $model1->appId($data);
			$model3       = new DaycarePricePlanModel();
			$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
			if($appdownloadStatus==0)
			{
			$getPermissionDetail    = $model1->getPermissionDetail($data);
			header('location:../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
			die;
			}
			$proposalTrialInformation    = $model1->proposalTrialInformation($data);
			if($proposalTrialInformation==0)
			{
				header('location:https://www.safeqloud.com/company/index.php/DaycarePricePlan/planAccount/'.$data['cid'].'/'.$data['app_id']); die;
			} 
			
			$employeeSkillCount    = $model1->employeeSkillCount($data);
			$contentDetail    = $model1->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
				 header('location:../../../proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			$countryOptions    = $model1->countryList($data);
			$apartmentBookingList    = $model1->apartmentBookingList($data);
			require_once('VitechReservationCreateGuestUserInfoView.php');
	}
	}
	
	
	
	
	
	public static function checkEmailInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				 
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				
				$result    = $model1->checkEmailInfo($data);
				 
				echo $result; die;
				}
		}
		
		
		public static function addNewGuestAndSendBookingInfo($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['aid']=cleanMe($c);
				$model1       = new VitechPropertiesModel();
				 
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../lib/url_shortener.php');
				
				$resultOrg1    = $model1->addNewGuestAndSendBookingInfo($data);
				header("location:../../../guestReservationList/".$data['cid']."/".$data['pid']."/".$data['aid']);	
				}
		}
		
		public static function checkPhoneInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				
				$result    = $model1->checkPhoneInfo($data);
				 
				echo $result; die;
				}
		}
		
		public static function addGuestAndSendBookingInfo($a=null,$b=null,$c=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$data['aid']=cleanMe($c);
				$model1       = new VitechPropertiesModel();
				 
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../lib/url_shortener.php');
				$resultOrg1    = $model1->addGuestAndSendBookingInfo($data);
				header("location:../../../addUserPersonalAddressForReservation/".$data['cid']."/".$data['pid']."/".$data['aid']."/".$resultOrg1);
				}
		}
		
		public static function addUserPersonalAddressForReservation($a=null,$b=null,$c=null,$d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				}
				else
				{
				$path         = "../../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$data['aid']=cleanMe($c);
				$data['booking_id']=cleanMe($d);
				$model1       = new VitechPropertiesModel();
				$data['fapp_id']=59; $data['app_id']    = $model1->appId($data);
			$model3       = new DaycarePricePlanModel();
			$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
			if($appdownloadStatus==0)
			{
			$getPermissionDetail    = $model1->getPermissionDetail($data);
			header('location:../../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
			die;
			}
			
			$proposalTrialInformation    = $model1->proposalTrialInformation($data);
			if($proposalTrialInformation==0)
			{
				header('location:https://www.safeqloud.com/company/index.php/DaycarePricePlan/planAccount/'.$data['cid'].'/'.$data['app_id']); die;
			} 
			
			$employeeSkillCount    = $model1->employeeSkillCount($data);
			$contentDetail    = $model1->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
				 header('location:../../../../proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
				$countryCode    = $model1->countryOptions($data); 
				require_once('VitechReservationCreateGuestUserAddressInfoView.php');	
				}
			
		} 
		
		public static function updateUserPersonalAddress($a=null,$b=null,$c=null,$d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				}
				else
				{
				$path         = "../../../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$data['aid']=cleanMe($c);
				$data['booking_id']=cleanMe($d);
				$model1       = new VitechPropertiesModel();
				$resultOrg1    = $model1->updateUserPersonalAddress($data);
				 
				 if($_POST['food1']==0)
				{
				header("location:../../../../guestReservationList/".$data['cid']."/".$data['pid']."/".$data['aid']);	
				}
				else
				{
				header("location:../../../../addUserCompanyAddressForReservation/".$data['cid']."/".$data['pid']."/".$data['aid']."/".$data['booking_id']);		
				} 
				}
			
		} 
		
		
		public static function addUserCompanyAddressForReservation($a=null,$b=null,$c=null,$d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				}
				else
				{
				$path         = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$data['aid']=cleanMe($c);
				$data['booking_id']=cleanMe($d);
				$model1       = new VitechPropertiesModel();
				$data['fapp_id']=59; $data['app_id']    = $model1->appId($data);
			$model3       = new DaycarePricePlanModel();
			$appdownloadStatus    = $model3->appdownloadStatus($data);
				 
			if($appdownloadStatus==0)
			{
			$getPermissionDetail    = $model1->getPermissionDetail($data);
			header('location:../../../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
			die;
			}
			
			$proposalTrialInformation    = $model1->proposalTrialInformation($data);
			if($proposalTrialInformation==0)
			{
				header('location:https://www.safeqloud.com/company/index.php/DaycarePricePlan/planAccount/'.$data['cid'].'/'.$data['app_id']); die;
			} 
			
			$employeeSkillCount    = $model1->employeeSkillCount($data);
			$contentDetail    = $model1->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
				 header('location:../../../../proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../lib/url_shortener.php');
				$apartmentBookingDetailInfo    = $model1->apartmentBookingDetailInfo($data); 
				$resultOrg1    = $model1->addressDetail($data);
				require_once('ApartmentReservationCreateGuestCompanyAddressInfoView.php');	
				}
			
		}
		
		public static function updateUserCompanyDetail($a=null,$b=null,$c=null,$d=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0)
				{
				$path = "../../";
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
				}
				else
				{
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$data['aid']=cleanMe($c);
				$data['booking_id']=cleanMe($d);
				$model1       = new VitechPropertiesModel();
				
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../lib/url_shortener.php');
				$resultOrg1    = $model1->saveCompanyDetails($data);
				
				header("location:../../../../guestReservationList/".$data['cid']."/".$data['pid']."/".$data['aid']);	
				
				}
		}
		
		
		
		public static function checkPassportInfo($co=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['aid']=cleanMe($co);
				
				$result    = $model1->checkPassportInfo($data);
				 
				echo $result; die;
				}
		}
		
		
	public static function listEmployeesRequestProperties($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['domain_id']=cleanMe($b);
			$data['service_id']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			 /*$professionalTodoUpdate    = $model1->professionalTodoUpdate($data);
			 
			if($professionalTodoUpdate==0)
			{
				header('location:../serviceTypeInformation/'.$data['cid']);
			}*/
			$selectedMarketplaceSortedServiceAvilable    = $model1->selectedMarketplaceSortedServiceAvilable($data);
			if($selectedMarketplaceSortedServiceAvilable['num']==0)
			{
				header('location:../../../../CompanySuppliers/companyEmployeeProfileAction/'.$data['cid']); die;	
			}
            $displayproperties    = $model1->displayEmployeepropertiesForRequest($data);
			if(empty($displayproperties))
			{
			header('location:../../../propertyInformation/'.$data['cid']); die;	
			}
			
			$userSummary    = $model1->userSummary($data);
			require_once('VitechEmployeeAllPropertiesForRequestView.php');
	}
	}
	
	
	
	public static function addConnectRequestInfo($a=null,$b=null,$c=null,$d=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['domain_id']=cleanMe($b);
			$data['service_id']=cleanMe($c);
			$data['property_id']=cleanMe($d);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			 /*$professionalTodoUpdate    = $model1->professionalTodoUpdate($data);
			 
			if($professionalTodoUpdate==0)
			{
				header('location:../serviceTypeInformation/'.$data['cid']);
			}*/
			$selectedMarketplaceSortedServiceAvilable    = $model1->selectedMarketplaceSortedServiceAvilable($data);
			if($selectedMarketplaceSortedServiceAvilable['num']==0)
			{
				header('location:../../../../../CompanySuppliers/companyEmployeeProfileAction/'.$data['cid']); die;	
			}
            $displayproperties    = $model1->displayEmployeepropertiesForRequest($data);
			if(empty($displayproperties))
			{
			header('location:../../../../propertyInformation/'.$data['cid']); die;	
			}
			$countryOptions    = $model1->countryOptions($data);
			$userSummary    = $model1->userSummary($data);
			require_once('VitechEmployeeAllPropertiesConnectRequestView.php');
	}
	} 
	
	
	public static function sendConnectRequest($a=null,$b=null,$c=null,$d=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['domain_id']=cleanMe($b);
			$data['service_id']=cleanMe($c);
			$data['property_id']=cleanMe($d);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			 /*$professionalTodoUpdate    = $model1->professionalTodoUpdate($data);
			 
			if($professionalTodoUpdate==0)
			{
				header('location:../serviceTypeInformation/'.$data['cid']);
			}*/
			$selectedMarketplaceSortedServiceAvilable    = $model1->selectedMarketplaceSortedServiceAvilable($data);
			if($selectedMarketplaceSortedServiceAvilable['num']==0)
			{
				header('location:../../../../../CompanySuppliers/companyEmployeeProfileAction/'.$data['cid']); die;	
			}
            $displayproperties    = $model1->displayEmployeepropertiesForRequest($data);
			if(empty($displayproperties))
			{
			header('location:../../../../propertyInformation/'.$data['cid']); die;	
			}
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			require_once('../lib/url_shortener.php');
			$sendConnectRequest    = $model1->sendConnectRequest($data);
			header('location:../../../../listEmployeesRequestProperties/'.$data['cid'].'/'.$data['domain_id'].'/'.$data['service_id']);
	}
	}
	
	
	
	public static function listEmployeesSoldProperties($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
         $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$brokerRequestApprovedCount    = $model1->brokerRequestApprovedCount($data);
			$brokerPropertyVerification    = $model1->brokerPropertyVerification($data);
            $displayproperties    = $model1->displayEmployeeSoldproperties($data);
			//echo '<pre>'; print_r($displayproperties); echo '</pre>'; die;
			if(empty($displayproperties))
			{
			header('location:../propertyInformation/'.$data['cid']); die;	
			}
			
			$userSummary    = $model1->userSummary($data);
			require_once('VitechEmployeePropertiesSoldViewNew.php');
	}
	}
	
	public static function foreignPropertyDetail($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['request_id']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			 
           // $updateForeignPropertieDetails    = $model1->updateForeignPropertieDetails($data);
			$fetchPropertiesImages    = $model1->fetchPropertiesImages($data);
			 
			if(count($fetchPropertiesImages)==0)
			{
				header("location:../../../viewPropertyDetail/".$data['cid'].'/'.$data['pid']); die;
			}
			$fetchPropertyTaskInfo    = $model1->fetchPropertyTaskInfo($data);
		/*	
			if($fetchPropertyTaskInfo['responsible_for_sell']!=$data['user_id'])
				{
				header("location:../../../listEmployeesProperties/".$data['cid']); die;
				}
			*/	 
				$countPhoto    = $model1->countPhoto($data); 
			$rentalPropertyPublishInfo    = $model1->rentalPropertyPublishInfo($data); 	
			$fetchPropertiesAddress    = $model1->fetchPropertiesAddress($data);
			$fetchPropertiesBuilding    = $model1->fetchPropertiesBuilding($data);
			$fetchPropertiesDescription    = $model1->fetchPropertiesDescription($data);
			$fetchPropertiesDistance    = $model1->fetchPropertiesDistance($data);
			$fetchPropertyContacTInfo    = $model1->fetchPropertyContacTInfo($data);
			$fetchPropertiesInterior    = $model1->fetchPropertiesInterior($data);
			$fetchPropertiesPlot    = $model1->fetchPropertiesPlot($data);	
			$fetchPropertyStatus    = $model1->fetchPropertyStatus($data);
			$data['vitech_region_id']=$fetchPropertiesAddress['vitech_region_id'];
			$data['vitech_city_id']=$fetchPropertiesAddress['vitech_city_id'];
			$data['vitech_area_id']=$fetchPropertiesAddress['vitech_area_id'];
			$fetchCitechCity    = $model1->fetchCitechCity($data);	
			$fetchCitechArea    = $model1->fetchCitechArea($data);	
			$fetchPropertyStatus    = $model1->fetchPropertyStatus($data);
			$vitechRequestCount    = $model1->vitechRequestCount($data); 
			$fetchPropertiesPricing    = $model1->fetchPropertiesPricing($data); 
			require_once('VitechPropertiesForiegnPropertyDetailInfoViewNew.php');
	}
	}
	
	
	public static function editPropertyInformation($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
           $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['request_id']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$fetchPropertiesImages    = $model1->listPhotos($data); 
			$fetchPropertiesAddress    = $model1->fetchPropertiesAddress($data);
			 
			 	if($data['request_id']=='')
				{
					header('location:https://www.safeqloud.com/company/index.php/VitechProperties/editPropertyInformation/'.$data['cid'].'/'.$data['pid'].'/'.$fetchPropertiesAddress['request_id']);
				}
			$fetchPropertyContacTInfo    = $model1->fetchPropertyContacTInfo($data);
			$fetchPropertiesBuilding    = $model1->fetchPropertiesBuilding($data);
			$fetchPropertiesInterior    = $model1->fetchPropertiesInterior($data);
			$fetchPropertyTaskInfo    = $model1->fetchPropertyTaskInfo($data);	
			  
			$countryList    = $model1->countryList();	
			require_once('VitechPropertiesEditPropertyView.php');
	}
	}
	
	
	public static function editPropertyContractInformation($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
           $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['request_id']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$fetchPropertiesImages    = $model1->listPhotos($data); 
			$fetchPropertiesAddress    = $model1->fetchPropertiesAddress($data);
			$fetchPropertiesBuilding    = $model1->fetchPropertiesBuilding($data);
			$fetchPropertiesInterior    = $model1->fetchPropertiesInterior($data);
			$fetchPropertyTaskInfo    = $model1->fetchPropertyTaskInfo($data);	
			$fetchPropertyContacTInfo    = $model1->fetchPropertyContracTInfo($data);	 
			$countryList    = $model1->countryList();	
			require_once('VitechPropertiesEditPropertyContractView.php');
	}
	}
	
	public static function updateVitechAdddressContractInforamtion($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['request_id']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$updateVitechAdddressinforamtion    = $model1->updateVitechAdddressContractInforamtion($data); 
			if($_POST['property_status']==2)
			{
				 header('location:../../../listEmployeesProperties/'.$data['cid']); die;
			}
			else
			{
				header('location:../../../listEmployeesSoldProperties/'.$data['cid']); die;
			}
			
	}
	}
	
	public static function updateVitechAdddressinforamtion($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['request_id']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			 
			$updateVitechAdddressinforamtion    = $model1->updateVitechAdddressinforamtion($data); 
			 
				 header('location:../../../editPropertyInformation/'.$data['cid'].'/'.$data['pid'].'/'.$data['request_id']); die;
			 
			
	}
	}
	
	public static function updateSellInformation($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['request_id']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
			$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
			if($employeeCheck==1)
			{
				header("location:https://www.safeqloud.com/error404.php");
			}
			$model1       = new VitechPropertiesModel();
			$fetchPropertiesImages    = $model1->listPhotos($data);
			/*if(count($fetchPropertiesImages)==0)
			{
				header("location:../../../viewPropertyDetail/".$data['cid'].'/'.$data['pid']); die;
			}*/
			 
			$fetchPropertiesAddress    = $model1->fetchPropertiesAddress($data);
			$fetchPropertyContacTInfo    = $model1->fetchPropertyContacTInfo($data); 
			$fetchPropertyTaskInfo    = $model1->fetchPropertyTaskInfo($data);
			$fetchPropertiesInterior    = $model1->fetchPropertiesInterior($data);
			 
			 $countryList    = $model1->countryList();	
			require_once('VitechPropertiesSellPropertyView.php');
	}
	}
	
	
	public static function updateSoldInformation($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
          $model1       = new VitechPropertiesModel();
				$data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['request_id']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
			$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
			if($employeeCheck==1)
			{
				header("location:https://www.safeqloud.com/error404.php");
			}
			$model1       = new VitechPropertiesModel();
			$fetchPropertiesImages    = $model1->listPhotos($data);
			/*if(count($fetchPropertiesImages)==0)
			{
				header("location:../../../viewPropertyDetail/".$data['cid'].'/'.$data['pid']); die;
			}*/
			$fetchPropertyContacTInfo    = $model1->fetchPropertyContacTInfo($data); 
			$fetchPropertiesAddress    = $model1->fetchPropertiesAddress($data);
			$fetchPropertyTaskInfo    = $model1->fetchPropertyTaskInfo($data);
			$fetchPropertiesInterior    = $model1->fetchPropertiesInterior($data);
			/*if($fetchPropertyTaskInfo['responsible_for_sell']!=$data['user_id'] || $fetchPropertyTaskInfo['is_reserved']!=1 || $fetchPropertyTaskInfo['is_activated']==0)
				{
				header("location:../../listEmployeesProperties/".$data['cid']); die;
				}*/
			$propertyReservationDetail    = $model1->propertyReservationDetail($data);
			
			 $countryList    = $model1->countryList();	
			require_once('VitechPropertiesSoldInformationPropertyView.php');
	}
	}
	
	public static function checkDates()
	{
		$moveout=strtotime($_POST['move_out_date']);
		$moveIn=strtotime($_POST['move_in_date']);
		 
		if($moveout>$moveIn)
		{
			echo 0; die;
		}
		else
			{
			echo 1; die;
		}
	}
	
	
	
	public static function checkExclusiveDates($a=null,$b=null,$c=null)
	{
		$moveout=strtotime($_POST['end_date']);
		$moveIn=strtotime($_POST['start_date']);
		 
		if($moveout<$moveIn)
		{
			echo -1; die;
		}
		else
			{
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['request_id']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			 
			$model1       = new VitechPropertiesModel();
			$result    = $model1->checkExclusiveDates($data);
			echo $result; die;
		}
	}

	
	public static function reserveVitechAdddress($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
          $model1       = new VitechPropertiesModel();
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
			$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
			if($employeeCheck==1)
			{
				header("location:https://www.safeqloud.com/error404.php");
			}
			$model1       = new VitechPropertiesModel();
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			require_once('../lib/url_shortener.php');
			$reserveVitechAdddress    = $model1->reserveVitechAdddress($data);
			
			header("location:../../../listEmployeesProperties/".$data['cid']); die;
			
	}
	}
	
	
	public static function updateVitechAdddressSold($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
          $model1       = new VitechPropertiesModel();
				 
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
			$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
			if($employeeCheck==1)
			{
				header("location:https://www.safeqloud.com/error404.php");
			}
			$model1       = new VitechPropertiesModel();
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			require_once('../lib/url_shortener.php');
			$updateSoldVitechAdddress    = $model1->updateSoldVitechAdddress($data);
			
			header("location:../../../listEmployeesProperties/".$data['cid']); die;
			
	}
	}
	
	public static function arrivalInformation($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
          $data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['request_id']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			 
			 	 
			$fetchPropertiesBuilding    = $model1->fetchPropertiesBuilding($data);
			$fetchPropertiesInterior    = $model1->fetchPropertiesInterior($data);
			$fetchPropertyTaskInfo    = $model1->fetchPropertyTaskInfo($data);	
			$fetchPropertiesImages    = $model1->listPhotos($data);
			$fetchPropertiesAddress    = $model1->fetchPropertiesAddress($data);
			$fetchPropertyStatus    = $model1->fetchPropertyStatus($data);
			$vitechRequestCount    = $model1->vitechRequestCount($data); 
			$fetchPropertiesPricing    = $model1->fetchPropertiesPricing($data); 
			  
			require_once('VitechPropertiesPropertyArrivalInfoView.php');
	}
	}
	
	public static function updateArrivalInformation($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['request_id']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$updateArrivalInformation    = $model1->updateArrivalInformation($data);
			header('location:../../../arrivalInformation/'.$data['cid'].'/'.$data['pid'].'/'.$data['request_id']);
	}
	}
	
	
	public static function brokerFeeDetail($a=null,$b=null,$c=null)
    {
		$model1       = new VitechPropertiesModel();
		$valueNew = checkLogin();
        if ($valueNew == 0) {
           $data=array();
				$model1       = new VitechPropertiesModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
				 $urlDetail    = $model1->urlDetail($data);
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin?redirect=".$urlDetail);
        } else {
			$path = "../../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['request_id']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			 
			 	 
			$fetchPropertiesBuilding    = $model1->fetchPropertiesBuilding($data);
			$fetchPropertiesInterior    = $model1->fetchPropertiesInterior($data);
			$fetchPropertyTaskInfo    = $model1->fetchPropertyTaskInfo($data);	
			$fetchPropertiesImages    = $model1->listPhotos($data);
			$fetchPropertiesAddress    = $model1->fetchPropertiesAddress($data);
			$fetchPropertyStatus    = $model1->fetchPropertyStatus($data);
			$vitechRequestCount    = $model1->vitechRequestCount($data); 
			$fetchPropertiesPricing    = $model1->fetchPropertiesPricing($data); 
			 
			require_once('VitechPropertiesBrokerPricingView.php');
	}
	}
	

	public static function updatePropertyBrokerFee($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['request_id']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$updatePropertyBrokerFee    = $model1->updatePropertyBrokerFee($data);
			header('location:../../../brokerFeeDetail/'.$data['cid'].'/'.$data['pid'].'/'.$data['request_id']);
	}
	}
		


	public static function foreignPropertyPricingDetail($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['request_id']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			 
			 	 
			$fetchPropertiesBuilding    = $model1->fetchPropertiesBuilding($data);
			$fetchPropertiesInterior    = $model1->fetchPropertiesInterior($data);
			$fetchPropertyTaskInfo    = $model1->fetchPropertyTaskInfo($data);	
			$fetchPropertiesImages    = $model1->listPhotos($data);
			$fetchPropertiesAddress    = $model1->fetchPropertiesAddress($data);
			$fetchPropertyStatus    = $model1->fetchPropertyStatus($data);
			$vitechRequestCount    = $model1->vitechRequestCount($data); 
			$fetchPropertiesPricing    = $model1->fetchPropertiesPricing($data); 
			 /*if($fetchPropertiesPricing['markup_info']==0)
			 {
				 header('location:../../../listEmployeesRentProperties/'.$data['cid']); die;
			 }*/
			require_once('VitechPropertiesPropertyPricingNewView.php');
	}
	}
	
	
	public static function foreignPropertyHouseRule($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['request_id']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			 
			 	 
			$childrenHouseRules    = $model1->childrenHouseRules($data);
			$eventsHouseRules    = $model1->eventsHouseRules($data);
			$disabledHouseRules    = $model1->disabledHouseRules($data);
			require_once('VitechPropertiesPropertyHouseRulesView.php');
	}
	} 
	
	
	public static function updateChildren($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$model1       = new VitechPropertiesModel();
			$updateChildren    = $model1->updateChildren($data);
			$childrenHouseRules    = $model1->childrenHouseRules($data);
			echo $childrenHouseRules; die;
	}
	}
	
	
	public static function updateInfant($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$model1       = new VitechPropertiesModel();
			$updateInfant    = $model1->updateInfant($data);
			$childrenHouseRules    = $model1->childrenHouseRules($data);
			echo $childrenHouseRules; die;
	}
	}
	
	public static function updateSmoking($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$model1       = new VitechPropertiesModel();
			$updateSmoking    = $model1->updateSmoking($data);
			$eventsHouseRules    = $model1->eventsHouseRules($data);
			echo $eventsHouseRules; die;
	}
	}
	
	public static function updateParties($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$model1       = new VitechPropertiesModel();
			$updateParties    = $model1->updateParties($data);
			$eventsHouseRules    = $model1->eventsHouseRules($data);
			echo $eventsHouseRules; die;
	}
	}
	
	
	public static function updatePets($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$model1       = new VitechPropertiesModel();
			$updatePets    = $model1->updatePets($data);
			$eventsHouseRules    = $model1->eventsHouseRules($data);
			echo $eventsHouseRules; die;
	}
	}
	
	public static function updateDisabled($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$model1       = new VitechPropertiesModel();
			$updateDisabled    = $model1->updateDisabled($data);
			$eventsHouseRules    = $model1->eventsHouseRules($data);
			echo $eventsHouseRules; die;
	}
	}
	
	
	public static function brokerPricingDetail($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			 
			$fetchPropertiesBuilding    = $model1->fetchPropertiesBuilding($data);
			$fetchPropertiesInterior    = $model1->fetchPropertiesInterior($data);
			$fetchPropertyTaskInfo    = $model1->fetchPropertyTaskInfo($data);	
			$fetchPropertiesImages    = $model1->listPhotos($data);
			$fetchPropertiesAddress    = $model1->fetchPropertiesAddress($data);
			$totalDays=((strtotime($_POST['checkout_date'])-strtotime($_POST['checkin_date']))/86400);//$fetchPropertyStatus    = $model1->fetchPropertyStatus($data);
			$vitechRequestCount    = $model1->vitechRequestCount($data); 
			$fetchPropertiesPricing    = $model1->fetchPropertiesPricing($data); 
			require_once('VitechPropertiesBrokerPricingViewNew.php');
	}
	}
	
	public static function addPropertyWishlist($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			  
			$addPropertyWishlist    = $model1->addPropertyWishlist($data);
			 header('location:../../wishlistDetail/'.$data['cid']);
	}
	}
	
	
	public static function wishlistBrokerShareProperty($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			  
			$wishlistBrokerShareProperty    = $model1->wishlistBrokerShareProperty($data);
			 header('location:../../wishlistDetail/'.$data['cid']);
	}
	}
	
	
	public static function wishlistClientShareProperty($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			  
			$wishlistClientShareProperty    = $model1->wishlistClientShareProperty($data);
			 header('location:../../wishlistDetail/'.$data['cid']);
	}
	}
	
	
	public static function foreignPropertyActionInfo($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			 
			$fetchPropertyStatus    = $model1->fetchPropertyStatus($data);
			$fetchPropertiesImages    = $model1->listPhotos($data);
			$vitechRequestCount    = $model1->vitechRequestCount($data); 
			$fetchPropertiesPricing    = $model1->fetchPropertiesPricing($data);
			require_once('VitechPropertiesPropertyActionViewNew.php');
	}
	}
	
	public static function updatePropertyPricing($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['request_id']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			$updatePropertyPricing    = $model1->updatePropertyPricing($data);
			header('location:../../../foreignPropertyPricingDetail/'.$data['cid'].'/'.$data['pid'].'/'.$data['request_id']);
	}
	}
	
	public static function sendPublishRequest($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.safeqloud.com/error404.php");
				}
			$model1       = new VitechPropertiesModel();
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			require_once('../lib/url_shortener.php');
			$sendPublishRequest    = $model1->sendPublishRequest($data);
			header('location:../../foreignPropertyActionInfo/'.$data['cid'].'/'.$data['pid']);
	}
	}
	
	public static function getCities()
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new VitechPropertiesModel();
			 
			$data['vitech_region_id']=$_POST['cid'];
			$data['vitech_city_id']=0;
			
            $selectCity    = $model1->fetchCitechCity($data);
			echo $selectCity; die;
	}
	}
	
	
	
	
	
	public static function getArea()
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new VitechPropertiesModel();
			$data['vitech_city_id']=$_POST['cid'];
			$data['vitech_area_id']=0;
			
			$selectArea    = $model1->fetchCitechArea($data);
			echo $selectArea; die;
	}
	}
	
	public static function activateProperty($a=null,$b=null,$c=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['request_id']=cleanMe($c);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new VitechPropertiesModel();
            $activateProperty    = $model1->activateProperty($data);
			  header("location:../../../viewPropertyDetail/".$data['cid']."/".$data['pid']);
	}
	}
	
	 public static function deactivateProperty($a=null,$b=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           header("location:https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin");
        } else {
			$path = "../../../../../";
			$data=array();
			$data['cid']=cleanMe($a);
			$data['pid']=cleanMe($b);
			$data['user_id']=$_SESSION['user_id'];
			$model1       = new VitechPropertiesModel();
            $deactivateProperty    = $model1->deactivateProperty($data);
			  header("location:../../../viewPropertyDetail/".$data['cid']."/".$data['pid']);
	}
	}

	
		
		public static function updateMondayOpen($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['pid']=cleanMe($a);
				$data['price_id']=cleanMe($b);
				$result    = $model1->updateMondayOpen($data);
				$result    = $model1->dayAvailable($data);
				echo $result; die;
				}
		}
		
		 public static function updateTuesdayOpen($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['pid']=cleanMe($a);
				$data['price_id']=cleanMe($b);
				$result    = $model1->updateTuesdayOpen($data);
				$result    = $model1->dayAvailable($data);
				echo $result; die;
				}
		}
		
		public static function updateWednesdayOpen($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['pid']=cleanMe($a);
				$data['price_id']=cleanMe($b);
				$result    = $model1->updateWednesdayOpen($data);
				$result    = $model1->dayAvailable($data);
				echo $result; die;
				}
		}
		
		public static function updateThursdayOpen($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['pid']=cleanMe($a);
				$data['price_id']=cleanMe($b);
				$result    = $model1->updateThursdayOpen($data);
				$result    = $model1->dayAvailable($data);
				echo $result; die;
				}
		}
		public static function updateTitle($co=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['pid']=cleanMe($co);
				$data['price_id']=cleanMe($b);
				$result    = $model1->updateTitle($data);
				echo $result; die;
				}
		}
		public static function updateFridayOpen($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['pid']=cleanMe($a);
				$data['price_id']=cleanMe($b);
				$result    = $model1->updateFridayOpen($data);
				$result    = $model1->dayAvailable($data);
				echo $result; die;
				}
		}
		
		public static function updateSaturdayOpen($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['pid']=cleanMe($a);
				$data['price_id']=cleanMe($b);
				$result    = $model1->updateSaturdayOpen($data);
				$result    = $model1->dayAvailable($data);
				echo $result; die;
				}
		}
		
		public static function updateSundayOpen($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['pid']=cleanMe($a);
				$data['price_id']=cleanMe($b);
				$result    = $model1->updateSundayOpen($data);
				$result    = $model1->dayAvailable($data);
				echo $result; die;
				}
		}
		
		
		public static function updateMonday($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['pid']=cleanMe($a);
				$data['price_id']=cleanMe($b);
				$result    = $model1->updateMonday($data);
				
				echo $result; die;
				}
		}
		
		 public static function updateTuesday($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['pid']=cleanMe($a);
				$data['price_id']=cleanMe($b);
				$result    = $model1->updateTuesday($data);
				
				echo $result; die;
				}
		}
		
		public static function updateWednesday($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['pid']=cleanMe($a);
				$data['price_id']=cleanMe($b);
				$result    = $model1->updateWednesday($data);
				
				echo $result; die;
				}
		}
		
		public static function updateThursday($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['pid']=cleanMe($a);
				$data['price_id']=cleanMe($b);
				$result    = $model1->updateThursday($data);
				
				echo $result; die;
				}
		}
		
		public static function updateFriday($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['pid']=cleanMe($a);
				$data['price_id']=cleanMe($b);
				$result    = $model1->updateFriday($data);
				
				echo $result; die;
				}
		}
		
		public static function updateSaturday($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['pid']=cleanMe($a);
				$data['price_id']=cleanMe($b);
				$result    = $model1->updateSaturday($data);
				
				echo $result; die;
				}
		}
		
		public static function updateSunday($a=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['pid']=cleanMe($a);
				$data['price_id']=cleanMe($b);
				$result    = $model1->updateSunday($data);
				
				echo $result; die;
				}
		}
		
		
		public static function updateMinimumNight($co=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['pid']=cleanMe($co);
				$data['price_id']=cleanMe($b);
				if($_POST['shortest_duration']>0)
				{
				$result    = $model1->updateMinimumNight($data);	
				}
					echo $result; die;
				}
		}
		
		public static function updateDiscount($co=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['pid']=cleanMe($co);
				$data['price_id']=cleanMe($b);
				if($_POST['discount_for_seven']>=0)
				{
				$result    = $model1->updateDiscount($data);	
				}
					echo $result; die;
				}
		}
		
		
		public static function updateEndDate($co=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['pid']=cleanMe($co);
				$data['price_id']=cleanMe($b);
				if(isset($_POST['update_info']))
				{
				$result    = $model1->updateEndDate($data);	
				}
					echo $result; die;
				}
		}
		
		public static function deletePricing($co=null,$b=null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount/emailLogin"; </script>'; die;
				} else {
				$model1       = new VitechPropertiesModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['pid']=cleanMe($co);
				$data['price_id']=cleanMe($b);
				$result    = $model1->deletePricing($data);	
				
				if($result==0)
				{
				header('location:../../apartmentSelectRevisionInfo/'.$data['pid']); die;	
				}
				header('location:../../apartmentPricingInfo/'.$data['pid']);
				}
		}
			



}
?>