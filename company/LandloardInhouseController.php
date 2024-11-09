<?php

	require_once 'LandloardInhouseModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'CompanyConsentPlatformController.php';
	require_once 'ManagePermissionsController.php';
	require_once 'CompanyCrmController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once 'VitechPropertiesController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class LandloardInhouseController
	{
		
		 
	public static function sendPropertyProposal($a=null)
    {
		
		$valueNew = checkLogin();
        if ($valueNew == 0) {
           $model1       = new LandloardInhouseModel();
				$data=array();
				$model1       = new LandloardInhouseModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
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
			$model1       = new LandloardInhouseModel();
			 
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');			
			$sendProposal    = $model1->sendPropertyProposal($data);			
           header("location:../listProposalSociety/".$data['cid']);
	}
	}
	
	public static function listProposalSociety($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new LandloardInhouseModel();
				$data=array();
				$model1       = new LandloardInhouseModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
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
			$model1       = new LandloardInhouseModel();
			$data['fapp_id']=67; $data['app_id']    = $model1->appId($data);
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
					
				if($appdownloadStatus==0)
				{
				$getPermissionDetail    = $model1->getPermissionDetail($data);
				header('location:https://www.safeqloud.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
				die;
				}
				 $model3       = new VitechPropertiesModel();	 
			$employeeSkillCount    = $model3->employeeSkillCount($data);
			$contentDetail    = $model3->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
			 header('location:https://www.safeqloud.com/company/index.php/VitechProperties/proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			 
			$getLandloardProposalCommunityList    = $model1->getLandloardProposalCommunityList($data); 
			 
			require_once('LandloardInhouseProposalSocietyView.php');
	}
	}
	
	
	 public static function listProposals($a=null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
          $model1       = new LandloardInhouseModel();
				$data=array();
				$model1       = new LandloardInhouseModel();  $data['REQUEST_URI']='https://www.qloudid.com'.$_SERVER['REQUEST_URI'];
				  
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
			$model1       = new LandloardInhouseModel();
			$data['fapp_id']=67; $data['app_id']    = $model1->appId($data);
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
					
				if($appdownloadStatus==0)
				{
				$getPermissionDetail    = $model1->getPermissionDetail($data);
				header('location:https://www.safeqloud.com/company/index.php/Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
				die;
				}
				 $model3       = new VitechPropertiesModel();	 
			$employeeSkillCount    = $model3->employeeSkillCount($data);
			$contentDetail    = $model3->contentDetail($data);
			if($employeeSkillCount==0 || $contentDetail==0)
			{
			 header('location:https://www.safeqloud.com/company/index.php/VitechProperties/proposalSetupinformation/'.$data['cid'].'/'.$data['app_id']); die;
			}
			 
			$listProposals    = $model1->listProposals($data); 
			 
			require_once('LandloardInhouseProposalListView.php');
	}
	}
	
	
		 
	}
    
	
	
?>