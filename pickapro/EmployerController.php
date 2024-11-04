<?php
	require_once 'EmployerModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class EmployerController
	{
		public function propertyList($a=null,$b=null)
		{
			$valueNew = checkPickaproLogin();
			$data=array();
				
				$data['cid']=cleanMe($a);
				$data['domain_id']=cleanMe($b);
				
		if ($valueNew == 0) {
				 
		header("location:https://www.qloudid.com/pickapro/index.php/LoginAccount/loginPickapro/".$data['domain_id']);
		}  else {
				$path = "../../../../../";
				$data['user_id']=$_SESSION['pikapro_user_id'];
				$model1       = new EmployerModel();
				$propertyList    = $model1->propertyList($data);
				
				require_once('PropertyManagerApartmentListView.php');
			}
		}
		
		
		public function listRecomedations($a=null,$b=null,$c=null)
		{
			$valueNew = checkPickaproLogin();
			$data=array();
				
				$data['cid']=cleanMe($a);
				$data['request_id']=cleanMe($b);
				$data['domain_id']=cleanMe($c);
		if ($valueNew == 0) {
				 
		header("location:https://www.qloudid.com/pickapro/index.php/LoginAccount/loginPickapro/".$data['domain_id']);
		}  else {
				$path = "../../../../../../";
				$data['user_id']=$_SESSION['pikapro_user_id'];
				$model1       = new EmployerModel();
				$userLikedPropertyList    = $model1->userLikedPropertyList($data);
			 
				require_once('EmployerServiceRequestUserLikedPropertiesView.php');
				 
			}
		}
		
		
		public function addConnectRequest($a=null,$b=null,$c=null,$d=null)
		{
			$valueNew = checkPickaproLogin();
			$data=array();
				
				$data['cid']=cleanMe($a);
				$data['request_id']=cleanMe($b);
				$data['bid_id']=cleanMe($c);
				$data['domain_id']=cleanMe($d);
		if ($valueNew == 0) {
				 
		header("location:https://www.qloudid.com/pickapro/index.php/LoginAccount/loginPickapro/".$data['domain_id']);
		}  else {
				$path = "../../../../../../../";
				$data['user_id']=$_SESSION['pikapro_user_id'];
				$model1       = new EmployerModel();
				require_once('EmployerServiceRequestApartmentConnectRequestView.php');
			}
		}
		
		
		public function sendConnectRequest($a=null,$b=null,$c=null,$d=null)
		{
			$valueNew = checkPickaproLogin();
			$data=array();
				
				$data['cid']=cleanMe($a);
				$data['request_id']=cleanMe($b);
				$data['bid_id']=cleanMe($c);
				$data['domain_id']=cleanMe($d);
		if ($valueNew == 0) {
				 
		header("location:https://www.qloudid.com/pickapro/index.php/LoginAccount/loginPickapro/".$data['domain_id']);
		}  else {
				$path = "../../../../../../";
				$data['user_id']=$_SESSION['pikapro_user_id'];
				$model1       = new EmployerModel();
				$sendConnectRequest    = $model1->sendConnectRequest();
				header("location:../../../../listRecomedations/".$data['cid'].'/'.$data['request_id'].'/'.$data['domain_id']);
			}
		}
		 
		public function addPropertyInfo($a=null,$b=null)
		{
			$valueNew = checkPickaproLogin();
			$data=array();
				
				$data['cid']=cleanMe($a);
				$data['domain_id']=cleanMe($b);
		if ($valueNew == 0) {
				 
		header("location:https://www.qloudid.com/pickapro/index.php/LoginAccount/loginPickapro/".$data['domain_id']);
		}  else {
				$path = "../../../../../";
				$data['user_id']=$_SESSION['pikapro_user_id'];
				$model1       = new EmployerModel();
				$vitechCityList    = $model1->vitechCityList();
				$propertyType    = $model1->propertyType();
				
				require_once('PropertyManagerApartmentDescriptionView.php');
			}
		}
		
		
		public function getAreaInfo()
		{
			$model1       = new EmployerModel();
			$result    = $model1->vitechAreaList();
			echo $result; die;
		}
		
		public function addPropertyApartment($a=null,$b=null)
		{
			$valueNew = checkPickaproLogin();
			$data=array();
				
				$data['cid']=cleanMe($a);
				$data['domain_id']=cleanMe($b);
		if ($valueNew == 0) {
				 
			header("location:https://www.qloudid.com/pickapro/index.php/LoginAccount/loginPickapro/".$data['domain_id']);
			}  else {
				$path = "../../../../../";
				$data['user_id']=$_SESSION['pikapro_user_id'];
				$model1       = new EmployerModel();
				$addPropertyApartment    = $model1->addPropertyApartment($data);
				 
				header("location:../../propertyList/".$data['cid'].'/'.$data['domain_id']);
				 
			}
		}
		
		public function listApprovedMarketplaces($a=null,$b=null)
		{
		$valueNew = checkPickaproLogin();
		if ($valueNew == 0) {
				 
		header("location:https://www.qloudid.com/pickapro/index.php/LoginAccount/loginPickapro/".$data['domain_id']);
		} else {
		$path = "../../../../";
		$model1       = new EmployerModel();
		$data=array();
		$data['cid']=cleanMe($a);
		$data['user_id']=$_SESSION['pikapro_user_id'];
		$approvedMarketplaces    = $model1->approvedMarketplaces($data);
		require_once('EmployerApprovedMarketplacesView.php');
		}
		}
		
		public function listEmployers($a=null)
		{
			$valueNew = checkPickaproLogin();
			$data=array();
			$data['domain_id']=cleanMe($a);
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/pickapro/index.php/LoginAccount/loginPickapro/".$data['domain_id']);
				} else {
				$path = "../../../../";
				
				$data['user_id']=$_SESSION['pikapro_user_id'];
				$model1       = new EmployerModel();
				$employerSummary    = $model1->employerSummary($data);
				require_once('EmployerView.php');
			}
		}
		
		public function peopleForhire($a=null,$b=null)
		{
			$valueNew = checkPickaproLogin();
			$data=array();
				
				$data['cid']=cleanMe($a);
				$data['domain_id']=cleanMe($b);
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/pickapro/index.php/LoginAccount/loginPickapro/".$data['domain_id']);
				} else {
				$path = "../../../../../";
				$data['user_id']=$_SESSION['pikapro_user_id'];
				$model1       = new EmployerModel();
				$peopleAvailableForHire    = $model1->peopleAvailableForHire($data);
				require_once('EmployerAvailableHireOptionsView.php');
			}
		}
		public function supplierInformation($a=null,$b=null)
		{
			$valueNew = checkPickaproLogin();
			$data=array();
				
				$data['cid']=cleanMe($a);
				$data['domain_id']=cleanMe($b);
			if ($valueNew == 0) {
				 
				header("location:https://www.qloudid.com/pickapro/index.php/LoginAccount/loginPickapro/".$data['domain_id']);
				} else {
				$path = "../../../../../";
				$data['user_id']=$_SESSION['pikapro_user_id'];
				$model1       = new EmployerModel();
				$employeeDetail    = $model1->employeeDetail($data);
				require_once('EmployerCompanyProfileView.php');
			}
		}
		
		
		public function serviceRequestReceived($a=null,$b=null)
		{
			$valueNew = checkPickaproLogin();
			$data=array();
				
				$data['cid']=cleanMe($a);
				$data['domain_id']=cleanMe($b);
				
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/pickapro/index.php/LoginAccount/loginPickapro/".$data['domain_id']);
				} else {
				$path = "../../../../../";
				$data['user_id']=$_SESSION['pikapro_user_id'];
				$model1       = new EmployerModel();
				$serviceRequestReceived    = $model1->serviceRequestReceived($data);
				require_once('EmployerServiceRequestReceivedView.php');
			}
		} 
		
		
		public function serviceRequestBidApproved($a=null,$b=null)
		{
			$valueNew = checkPickaproLogin();
			$data=array();
				
				$data['cid']=cleanMe($a);
				$data['domain_id']=cleanMe($b);
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/pickapro/index.php/LoginAccount/loginPickapro/".$data['domain_id']);
				} else {
				$path = "../../../../../../";
				$data['user_id']=$_SESSION['pikapro_user_id'];
				$model1       = new EmployerModel();
				$serviceRequestUserApproved    = $model1->serviceRequestUserApproved($data);
				require_once('EmployerServiceRequestUserAcceptedBidView.php');
			}
		} 
		
		
		public function listEmployees($a=null,$b=null,$c=null)
		{
			$valueNew = checkPickaproLogin();
			$data=array();
				
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['domain_id']=cleanMe($c);
			if ($valueNew == 0) {
				$path = "../../";
			header("location:https://www.qloudid.com/pickapro/index.php/LoginAccount/loginPickapro/".$data['domain_id']);
				} else {
				$path = "../../../../../../";
				$data['user_id']=$_SESSION['pikapro_user_id'];
				$model1       = new EmployerModel();
				$employeesList    = $model1->employeesList($data);
				require_once('EmployerServiceRequestAssignEmployeeView.php');
			}
		} 
		
		
		
		public function assignProject($a=null,$b=null,$c=null,$d=null)
		{
			$valueNew = checkPickaproLogin();
			$data=array();
				
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['eid']=cleanMe($c);
				$data['domain_id']=cleanMe($d);
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/pickapro/index.php/LoginAccount/loginPickapro/".$data['domain_id']);
				} else {
				$path = "../../../../../../../";
				$data['user_id']=$_SESSION['pikapro_user_id'];
				$model1       = new EmployerModel();
				$workingHrs    = $model1->workingHrs($data);
				require_once('EmployerServiceRequestAssignEmployeeCalenderView.php');
				}
		} 
		
		
		public function updateEmployeeCalenderForJob($a=null,$b=null,$c=null,$d=null)
		{
			$valueNew = checkPickaproLogin();
			$data=array();
				
				$data['cid']=cleanMe($a);
				$data['rid']=cleanMe($b);
				$data['eid']=cleanMe($c);
				$data['domain_id']=cleanMe($d);
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/pickapro/index.php/LoginAccount/loginPickapro/".$data['domain_id']);
				} else {
				$path = "../../../../../../../";
				$data['user_id']=$_SESSION['pikapro_user_id'];
				$model1       = new EmployerModel();
				$assignProject    = $model1->assignProject($data);
				header('location:../../../../serviceRequestBidApproved/'.$data['cid'].'/'.$data['domain_id']);
		 }
		} 
 
		 
	}
?>