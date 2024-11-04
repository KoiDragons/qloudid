<?php
	
	require_once 'NoffaAlarmModel.php';
	require_once 'EmployeeCheckController.php';
	require_once 'DaycarePricePlanController.php';	
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class NoffaAlarmController
	{
		 
		public static function listChildren($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new NoffaAlarmModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				 
				$childrenDetail    = $model->childrenDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('NoffaAlarmView.php');
			}
		}
		
		public static function listMissingChildren($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new NoffaAlarmModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				 
				$childrenDetail    = $model->missingChildrenDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('NoffaAlarmMissingChildrenView.php');
			}
		}
		
		public static function listMissingMobileApiChildren($a=null)
		{
			 
				$path = "../../../../";
				$model       = new NoffaAlarmModel();
				$data=array();
				$data['cid']=cleanMe($a);
				 
				$childrenDetail    = $model->missingChildrenMobileApiDetail($data);
				$dataOut=json_encode($childrenDetail,true);
				echo  $dataOut;
				die; 
			
		}
		
		public static function listMobileApiChildren($a=null)
		{
			 
				$path = "../../../../";
				$model       = new NoffaAlarmModel();
				$data=array();
				$data['cid']=cleanMe($a);
				 
				$childrenDetail    = $model->childrenDetailMobileApi($data);
				$dataOut=json_encode($childrenDetail,true);
				echo  $dataOut;
				die; 
			
		}
		
			public static function missingChildInfo($a=null, $b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../../";
				$model       = new NoffaAlarmModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['wanted_id']=cleanMe($b);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				  
				$childDetail    = $model->missingChildDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('NoffaAlarmMissingChildInfoView.php');
			}
		}
		
		
		public static function actionRequired($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../../";
				$model       = new NoffaAlarmModel();
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['app_id']    = $model->appId();
				
				$model1       = new EmployeeCheckController();
				$employeeCheck    = $model1->checkUserAccount($data['user_id'],$data['cid']);
				if($employeeCheck==1)
				{
				header("location:https://www.qloudid.com/error404.php");
				}
				$model3       = new DaycarePricePlanModel();
				$appdownloadStatus    = $model3->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model->getPermissionDetail($data);
					header('location:../../Brand/productPage/'.$data['cid'].'/'.$getPermissionDetail);
					die;
				}
				
				$selectIcon    = $model->selectIcon($data);
				$companyDetail    = $model->companyDetail($data);
				$row_summary    = $model->userSummary($data);
				require_once('NoffaInformEmployeesView.php');
			}
		}
		


		public static function updateChildInfo($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new NoffaAlarmModel();
				$updateChildInfo = $model->updateChildInfo($data);	
				header("location:../actionRequired/".$data['cid']);
			}	
		}
		
		
		public static function updateChildInfoMobileApi()
		{
			 
				$model       = new NoffaAlarmModel();
				$updateChildInfo = $model->updateChildInfoMobileApi();
				$data=array();
				$data['result']=1;
				$dataOut=json_encode($data,true);
				print_r($dataOut);

			  die;
		}
		
		 public static function informEmployees($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:https://www.qloudid.com/user/index.php/LoginAccount");
				} else {
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$model       = new NoffaAlarmModel();
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$informEmployees = $model->informEmployees($data);	
				header("location:../listChildren/".$data['cid']);
			}	
		}
		
		
		 public static function informEmployeesApi($a=null)
		{
			 
				$data=array();
				 
				$data['cid']=cleanMe($a);
				$model       = new NoffaAlarmModel();
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$informEmployees = $model->informEmployeesApi($data);	
				 $data1=array();
				$data1['result']=1;
				print_r($data1);
				$dataOut=json_encode($data1,true);
				
				
				print_r($dataOut);

			  die;
				
		}
	}
?>