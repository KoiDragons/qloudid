<?php
require_once 'UserProfessionalServiceRequestModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class UserProfessionalServiceRequestController
{
	
	public static function contactServiceProvider($a=null,$b=null)
		{
			
				$path         = "../../../../../";
				$data=array();
				$data['job_id']=cleanMe($a);
				$data['bid_id']=cleanMe($b);
				$model       = new UserProfessionalServiceRequestModel();
				$serviceBidsInfo    = $model->serviceBidsInfo($data);
				$data['user_id']=$serviceBidsInfo['user_id'];
				$userSummary    = $model->userSummary($data);
				require_once('UserProfessionalServiceRequestBidProductsNonBookingDescriptionView.php');
				 
		}
		
		public static function confirmServiceProviderInfo($a=null,$b=null)
		{
			
				$path         = "../../../../../";
				$data=array();
				$data['job_id']=cleanMe($a);
				$data['bid_id']=cleanMe($b);
				$model       = new UserProfessionalServiceRequestModel();
				$serviceBidsInfo    = $model->serviceBidsInfo($data);
				 
				$data['user_id']=$serviceBidsInfo['user_id'];
				$userSummary    = $model->userSummary($data);
				 
				require_once('UserProfessionalServiceRequestBidProductsBookingDescriptionView.php');
				 
		} 
		public static function listRequests($a=null,$b=null)
		{
			
				$path         = "../../../../../";
				$data=array();
				$data['uid']=cleanMe($a);
				$data['domain_id']=cleanMe($b);
				$model       = new UserProfessionalServiceRequestModel();
				$postedJobsList    = $model->postedJobsList($data);
				require_once('UserProfessionalServiceRequestListView.php');
				 
		} 
		public static function receivedbidList($a=null)
		{
		$path = "../../../../";
		$model1       = new UserProfessionalServiceRequestModel();
		$data=array();
		$data['job_id']=cleanMe($a);
		$serviceRequestDetailInfo    = $model1->serviceRequestDetailInfo($data);
		$data['domain_id']=$serviceRequestDetailInfo['domain_id'];
		$serviceBidsList    = $model1->serviceBidsList($data);
		require_once('UserProfessionalServiceRequestBidReceivedView.php');
		}
		
		
		public static function receivedbidPropertyInfo($a=null,$b=null)
		{
		$path = "../../../../../";
		$model1       = new UserProfessionalServiceRequestModel();
		$data=array();
		$data['job_id']=cleanMe($a);
		$data['bid_id']=cleanMe($b);
		$servicePropertyBidsInfo    = $model1->servicePropertyBidsInfo($data);
		$serviceRequestDetailInfo    = $model1->serviceRequestDetailInfo($data);
		$data['domain_id']=$serviceRequestDetailInfo['domain_id'];
		$serviceBidsList    = $model1->serviceBidsList($data);
		require_once('UserProfessionalServiceRequestBidPropertyDetailView.php');
		}
		
		
		public static function likedTheProperty($a=null,$b=null)
		{
		 
		$model1       = new UserProfessionalServiceRequestModel();
		$data=array();
		$data['job_id']=cleanMe($a);
		$data['bid_id']=cleanMe($b);
		$likedTheProperty    = $model1->likedTheProperty($data);
		header('location:../../receivedPropertybidList/'.$data['job_id']); die;
		}
		
		public static function dislikedTheProperty($a=null,$b=null)
		{
		 
		$model1       = new UserProfessionalServiceRequestModel();
		$data=array();
		$data['job_id']=cleanMe($a);
		$data['bid_id']=cleanMe($b);
		$dislikedTheProperty    = $model1->dislikedTheProperty($data);
		header('location:../../receivedPropertybidList/'.$data['job_id']); die;
		}
		
		public static function receivedPropertybidList($a=null)
		{
		$path = "../../../../";
		$model1       = new UserProfessionalServiceRequestModel();
		$data=array();
		$data['job_id']=cleanMe($a);
		$serviceRequestDetailInfo    = $model1->serviceRequestDetailInfo($data);
		$data['domain_id']=$serviceRequestDetailInfo['domain_id'];
		$serviceBidsList    = $model1->propertyBidsList($data);
		require_once('UserProfessionalServicePropertyBidReceivedView.php');
		}
		
		public static function receivedbidProfileInfo($a=null,$b=null)
		{
		$path = "../../../../../";
		$model1       = new UserProfessionalServiceRequestModel();
		$data=array();
		$data['job_id']=cleanMe($a);
		$data['bid_id']=cleanMe($b);
		$serviceBidsInfo    = $model1->serviceBidsInfo($data);
		require_once('UserProfessionalServiceRequestBidCompanyProfileView.php');
		}
		
		public static function listAddedServiceProducts($a=null,$b=null)
		{
		$path = "../../../../../";
		$model1       = new UserProfessionalServiceRequestModel();
		$data=array();
		$data['job_id']=cleanMe($a);
		$data['bid_id']=cleanMe($b);
		$serviceBidsInfo    = $model1->serviceBidsInfo($data);
		$data['cid']=$serviceBidsInfo['cid'];
		$data['category_id']=$serviceBidsInfo['category_id'];
		$data['subcategory_id']=$serviceBidsInfo['subcategory_id'];
		$data['domain_id']=$serviceBidsInfo['domain_id'];
		$data['is_service_bookable']=$serviceBidsInfo['is_service_bookable'];
		$postedJobMatchingServiceList    = $model1->postedJobMatchingServiceList($data);
		if(count($postedJobMatchingServiceList)==0)
		{
			header('location:../../approveBid/'.$data['job_id'].'/'.$data['bid_id'].'/bFhCcE1Cc0tqRnhiL0VLdHNzU2VSQT09'); die;
		}
		if($data['is_service_bookable']==1)
		{
			
		if(count($postedJobMatchingServiceList)==1)
		{
			if($serviceBidsInfo['bookable_calender']==1)
			{
				header('location:../../getPrivateCalender/'.$data['job_id'].'/'.$data['bid_id'].'/'.$postedJobMatchingServiceList[0]['enc'].'/bFhCcE1Cc0tqRnhiL0VLdHNzU2VSQT09'); die;
			}
			else
			header('location:../../listServiceEmployees/'.$data['job_id'].'/'.$data['bid_id'].'/'.$postedJobMatchingServiceList[0]['enc']); die;
		}
		else		
		require_once('UserProfessionalServiceRequestBidProductsAvailableView.php');
		}
		else
		{
		if(count($postedJobMatchingServiceList)==1)
		{
			header('location:../../approveBid/'.$data['job_id'].'/'.$data['bid_id'].'/'.$postedJobMatchingServiceList[0]['enc']); die;
		}
		else		
		require_once('UserProfessionalServiceRequestBidProductsAvailableView.php');	
		}
		
		}
		
		
		public static function listServiceEmployees($a=null,$b=null,$c=null)
		{
		$path = "../../../../../../";
		$model1       = new UserProfessionalServiceRequestModel();
		$data=array();
		$data['job_id']=cleanMe($a);
		$data['bid_id']=cleanMe($b);
		$data['bookable_service_id']=cleanMe($c);
		$serviceBidsInfo    = $model1->serviceBidsInfo($data);
		$data['cid']=$serviceBidsInfo['cid'];
		$data['category_id']=$serviceBidsInfo['category_id'];
		$data['subcategory_id']=$serviceBidsInfo['subcategory_id'];
		$data['is_service_bookable']=$serviceBidsInfo['is_service_bookable'];
		$data['bookable_calender']=$serviceBidsInfo['bookable_calender'];
		 
		if($serviceBidsInfo['bookable_calender']==1)
			{
				header('location:../../../getPrivateCalender/'.$data['job_id'].'/'.$data['bid_id'].'/'.$data['bookable_service_id'].'/bFhCcE1Cc0tqRnhiL0VLdHNzU2VSQT09'); die;
			}
		$employeeDetail    = $model1->employeeDetail($data);
		if(count($employeeDetail)==1)
		{
			header('location:../../../getPrivateCalender/'.$data['job_id'].'/'.$data['bid_id'].'/'.$data['bookable_service_id'].'/'.$employeeDetail[0]['enc']); die;
		}
		require_once('UserProfessionalServiceRequestBidProductsEmployeeView.php');
		}
		
		
		public static function getPrivateCalender($a=null,$b=null,$c=null,$d=null)
		{
		$path = "../../../../../../../";
		$model1       = new UserProfessionalServiceRequestModel();
		$data=array();
		$data['job_id']=cleanMe($a);
		$data['bid_id']=cleanMe($b);
		$data['bookable_service_id']=cleanMe($c);
		$data['employee_id']=cleanMe($d);
		$serviceBidsInfo    = $model1->serviceBidsInfo($data);
		$data['cid']=$serviceBidsInfo['cid'];
		$data['date_flag']=0;
		$bookingPrivateCalenderInfo    = $model1->bookingPrivateCalenderInfo($data);
		//print_r($bookingPrivateCalenderInfo); die;
		$employeeDetail    = $model1->employeeDetail($data);
		require_once('UserProfessionalServiceRequestBidProductsEmployeeCalenderView.php');
		}
		
		public static function getNewCalender($a=null,$b=null,$c=null,$d=null)
		{
		$path = "../../../../../../../";
		$model1       = new UserProfessionalServiceRequestModel();
		$data=array();
		$data['job_id']=cleanMe($a);
		$data['bid_id']=cleanMe($b);
		$data['bookable_service_id']=cleanMe($c);
		$data['employee_id']=cleanMe($d);
		$serviceBidsInfo    = $model1->serviceBidsInfo($data);
		$data['cid']=$serviceBidsInfo['cid'];
		$data['date_flag']=$_POST['date_flag'];
		$bookingPrivateCalenderInfo    = $model1->bookingPrivateCalenderInfo($data);
		echo $bookingPrivateCalenderInfo; die;
		}
		
		public static function updateBookingTimeInfo($a=null,$b=null,$c=null)
		{
		$path = "../../../../../../../";
		$model1       = new UserProfessionalServiceRequestModel();
		$data=array();
		$data['job_id']=cleanMe($a);
		$data['bid_id']=cleanMe($b);
		$data['bookable_service_id']=cleanMe($c);
		$serviceBidsInfo    = $model1->serviceBidsInfo($data);
		$data['cid']=$serviceBidsInfo['cid'];
		$updateBookingTimeInfo    = $model1->updateBookingTimeInfo($data);
		header('location:../../../confirmServiceProviderInfo/'.$data['job_id'].'/'.$data['bid_id']);
		}
		
		public static function approveBid($a=null,$b=null,$c=null)
		{
		$path = "../../../../";
		$model1       = new UserProfessionalServiceRequestModel();
		$data=array();
		$data['job_id']=cleanMe($a);
		$data['bid_id']=cleanMe($b);
		$data['qloud_bookable_service_id']=cleanMe($c);
		$approveBid    = $model1->approveBid($data);
		header('location:../../../contactServiceProvider/'.$data['job_id'].'/'.$data['bid_id']);
		}
		 
}
?>