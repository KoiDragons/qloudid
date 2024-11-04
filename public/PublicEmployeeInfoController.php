<?php
require_once 'PublicEmployeeInfoModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class PublicEmployeeInfoController
{
    
    
    public static function index()
    {
		$path = "../../";
    require_once('PublicEmployeeInfoView.php');
	
	}
	
	public static function companyAccount($a=null)
		{
			
            $path         = "../../../../";
			$data=array();
			
			$data['eid']=cleanMe($a);
			
			$model = new PublicEmployeeInfoModel();
			$employeeDetail= $model->employeeDetail($data);
			 
			$quardPermission= $model->quardPermission($data);
			$result_country = $model->userCountry();
			$verifyLanguage=$model->verifyLanguage();
			if($quardPermission==1) {
			require_once('PublicEmployeeInfoViewNew.php');
		}
			else
			{
			header("location:../companyQuard/".$data['eid']);	
			}
			
		}
		
		public static function companyQuard($a=null)
		{
			
            $path         = "../../../../";
			$data=array();
			
			$data['eid']=cleanMe($a);
			
			$model = new PublicEmployeeInfoModel();
			$employeeDetail= $model->employeeDetail($data);
			
			$result_country = $model->userCountry();
			require_once('PublicEmployeeInfoLightView.php');
			
		}
		
		public static function listQuardInformation($a=null)
		{
			
            $path         = "../../../../";
			$data=array();
			
			$data['eid']=cleanMe($a);
			
			$model = new PublicEmployeeInfoModel();
			if(isset($_POST))
			{
			$savedCards= $model->savedCards($data);
			$selectIcon= $model->selectIcon($data);
			require_once('PublicEmployeeSavedQuardInfoView.php');
			}
			else
			{
				header("location:../companyAccount/".$data['eid']);
			}
			
		}
	
	public static function shareEmployeeInformation($a=null)
		{
			
            $path         = "../../../../";
			$data=array();
			
			$data['eid']=cleanMe($a);
			require_once('../configs/smsMandril.php');
			require_once('../lib/url_shortener.php');
			$model = new PublicEmployeeInfoModel();
			$shareEmployeeInformation= $model->shareEmployeeInformation($data);
			header('location:../companyAccount/'.$data['eid']);
		}
		
		public static function shareEmployeeInformationEmail($a=null)
		{
			
            $path         = "../../../../";
			$data=array();
			
			$data['eid']=cleanMe($a);
			require_once('../configs/testMandril.php');
			require_once('../lib/url_shortener.php');
			$model = new PublicEmployeeInfoModel();
			$shareEmployeeInformationEmail= $model->shareEmployeeInformationEmail($data);
			header('location:../companyAccount/'.$data['eid']);
		}
		public static function saveQardInformation($a=null)
		{
			
            $path         = "../../../../";
			$data=array();
			
			$data['eid']=cleanMe($a);
			$model = new PublicEmployeeInfoModel();
			$saveQardInformation= $model->saveQardInformation($data);
			header('location:../companyAccount/'.$data['eid']);
		}
		
		public static function checkEmployee($a=null)
		{
			
          
			$data=array();
			
			$data['eid']=cleanMe($a);
			$model = new PublicEmployeeInfoModel();
			$checkEmployee= $model->checkEmployee($data);
			echo $checkEmployee; die;
		}
		public static function verifyOtp()
		{
			
			
				$path         = "../../../../";
				
				$model = new PublicEmployeeInfoModel();
				
				require_once('../configs/smsMandril.php');
				require_once('../configs/testMandril.php');
				$verifyOtp = $model->verifyOtp();	
				
				echo $verifyOtp; die;
			
			
		}
		
		
		public static function changeLanguage()
		{
				$model = new PublicEmployeeInfoModel();
				$changeLanguage = $model->changeLanguage();	
				echo $changeLanguage; die;	
		}
		
		public static function verifyUserDetail($a=null)
		{
			
          
			$data=array();
			
			$data['eid']=cleanMe($a);
			
			$model = new PublicEmployeeInfoModel();
			require_once('../configs/smsMandril.php');
			require_once('../configs/testMandril.php');
			$verifyUserDetail= $model->verifyUserDetail($data);
			echo $verifyUserDetail; die;
		}
		
		public static function moreSavedDetail($a=null)
		{
			
          
			$data=array();
			
			$data['eid']=cleanMe($a);
			$model = new PublicEmployeeInfoModel();
			$moreSavedDetail= $model->moreSavedDetail($data);
			echo $moreSavedDetail; die;
		}
		
		public static function verifyEmployee($a=null)
		{
			
          
			$data=array();
			
			$data['eid']=cleanMe($a);
			$model = new PublicEmployeeInfoModel();
			$verifyEmployee= $model->verifyEmployee($data);
			echo $verifyEmployee; die;
		}

}
?>