<?php
	require_once 'VerifyRequestModel.php';
	require_once '../company/EmployeeCheckController.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class VerifyRequestController
	{
		
		
		public static function index()
		{
			$path="../../";
			
			
			require_once('VerifyRequestView.php');
			
		}
		
		public static function companyRequestAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				
				$path="../../../../";
				$model1 = new VerifyRequestModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model       = new EmployeeCheckController();
				$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
					header("location:https://www.qloudid.com/error404.php");
				}
				if(isset($_POST['request_id']))
				{
					$data['request_id']=$_POST['request_id'];
					}
					else
					{
						$data['request_id']=1;
						}
						//print_r($data); die;
				 $resultOrg    = $model1->userAccount($data);
			$empSummary    = $model1->empSummary($data);
			$companySummary    = $model1->companySummary($data);
			
			$resultOrg1    = $model1->employeeAccount($data);
			$row_summary    = $model1->userSummary($data);
			$requestDetailCompany    = $model1->requestDetailCompany($data);
				
				require_once('VerifyRequestView.php');
			}
		}
		
		
		public static function updateRequestAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				
				$path="../../../../";
				$model1 = new VerifyRequestModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				
			$resultOrg    = $model1->userAccount($data);
			$empSummary    = $model1->empSummary($data);
			$companySummary    = $model1->companySummary($data);
			$resultOrg1    = $model1->employeeAccount($data);
			$row_summary    = $model1->userSummary($data);
			$locationDetail    = $model1->locationDetail($data);
				if(isset($_POST['employer']))
				{
				require_once('UpdateRequestView.php');
				}
				else
				{
					header('location:../verifyRequestAccount/'.$data['cid']);
				}
			}
		}
		
		public static function verifyRequestAccount($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount/loginapp");
				} else {
				
				
				$path="../../../../";
				$model1 = new VerifyRequestModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				
			$resultOrg    = $model1->userAccount($data);
			$empSummary    = $model1->empSummary($data);
			$employeeAccount    = $model1->employeeAccount($data);
			$companySummary    = $model1->companySummary($data);
			$resultOrg1    = $model1->employeeAccount($data);
			$row_summary    = $model1->userSummary($data);
			$locationDetail    = $model1->locationDetail($data);
			$employeeRequestCount    = $model1->employeeRequestCount($data);
			$supplierRequestCount    = $model1->supplierRequestCount($data);
			$tenantRequestCount    = $model1->tenantRequestCount($data);
			$studentRequestCount    = $model1->studentRequestCount($data);
			
				require_once('VerifyRequestAllView.php');
			}
		}
		
		public static function domainSearch($a=null , $b=null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
			$path="../../../";
			$model = new VerifyRequestModel();
			
			$data=array();
			$data['search']="%".cleanMe($a);
			$data['lmt']=cleanMe($b);
			//print_r($data); die;
			$partDataSearch=$model->partDataSearch($data);
			
			echo $partDataSearch; die;
		}
		}
		public static function sendRequest($a = null, $b = null, $c = null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
			
			 header("location:../../LoginAccount");
        } else {
        $data = array();
		$data['user_id']=$_SESSION['user_id'];
		$data['cid']=cleanMe($a);
        $model = new VerifyRequestModel();
		$sendRequest    = $model->sendRequest($data);
		header('location:../../NewsfeedDetail');
        }
    }
	
		public static function sendRequestCustomer($a = null, $b = null, $c = null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
			
			 header("location:../../LoginAccount");
        } else {
        $data = array();
		$data['user_id']=$_SESSION['user_id'];
		$data['cid']=cleanMe($a);
        $model = new VerifyRequestModel();
		$sendRequestCustomer    = $model->sendRequestCustomer($data);
		header('location:../../NewsfeedDetail');
        }
    }
	
	public static function updateRequest($a = null, $b = null, $c = null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
			
			 header("location:../../LoginAccount");
        } else {
        $data = array();
		$data['user_id']=$_SESSION['user_id'];
		$data['cid']=cleanMe($a);
        $model = new VerifyRequestModel();
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		$updateRequest    = $model->updateRequest($data);
		header('location:../../ShareMonitor/shareMonitorShow');
        }
    }
	
	
	public static function updateRequestAll($a = null, $b = null, $c = null)
    {
		$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
			
			 header("location:../../LoginAccount");
        } else {
        $data = array();
		$data['user_id']=$_SESSION['user_id'];
		$data['cid']=cleanMe($a);
		
        $model = new VerifyRequestModel();
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		$updateRequest    = $model->updateRequestAll($data);
		header('location:../../ShareMonitor/shareMonitorShow');
        }
    }
	
	public static function CheckSsnDetail()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$model = new VerifyRequestModel();
                $data['user_id']=$_SESSION['user_id'];
				$CheckSsnDetail = $model->CheckSsnDetail($data);
				echo $CheckSsnDetail; die;
				
			}
			
		}
	
	
	}
?>