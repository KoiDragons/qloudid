<?php
	require_once 'GetStartedRequestsModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class GetStartedRequestsController
	{
		
		
		public static function index()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:LoginAccount");
				} else {
				$path         = "../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				//print_r($_SESSION); die;
				$model = new GetStartedRequestsModel();
				$company    = $model->empSummary($data);
				require_once('GetStartedRequestsView.php');
			}
			
		}
		
		
		
		  public static function searchCompanyDetail($c = null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:LoginAccount");
				} else {
			$webModel = new GetStartedRequestsModel();
			
			//print_r($_POST); die;
			if (isset($_POST)) {
				$resultWeb = $webModel->searchCompanyDetail();
			}
			
			echo $resultWeb;
			die;
		}
		}
		
		
		 public static function requestDetailCompany($c = null)
		{
		$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../../../";
				header("location:LoginAccount");
				} else {
			$webModel = new GetStartedRequestsModel();
			
			//print_r($_POST); die;
			if (isset($_POST)) {
				$resultWeb = $webModel->requestDetailCompany();
			}
			
			echo $resultWeb;
			die;
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
        $model = new GetStartedRequestsModel();
		$sendRequest    = $model->sendRequest($data);
		if($sendRequest==1)
		{
			header('location:../../GetStartedRequests');
			}
			else
			{
				header('location:../../GetStartedRequests?requestSent=true');
				}
		
        }
    }
	}
?>