<?php
require_once 'CreateAppsModel.php';
require_once 'EmployeeCheckController.php';
require_once '../configs/utility.php';
class CreateAppsController
{
   
    public static function addPickupAddress($a=null)
		{
			  $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../";
				header("location:../../../../user/index.php/LoginAccount");
			} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model1       = new CreateAppsModel();
				
				$result    = $model1->addPickupAddress($data);
				header('location:../pickupAddressList/'.$data['cid']);
			}
		}
		
    public static function updatePickupAddress($a=null,$b=null)
		{
			  $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../";
				header("location:../../../../../user/index.php/LoginAccount");
			} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$data['aid']=cleanMe($b);
				$model1       = new CreateAppsModel();
				
				$result    = $model1->updatePickupAddress($data);
				header('location:../../pickupAddressList/'.$data['cid']);
			}
		}
   
    public static function checkAddress()
		{
			  $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../";
				header("location:../../../../user/index.php/LoginAccount");
			} else {
				$model1       = new CreateAppsModel();
				
				$result    = $model1->checkAddress();
				echo $result; die;
			}
		}
		
		public static function checkAddresslatLong()
		{
			  $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../";
				header("location:../../../../user/index.php/LoginAccount");
			} else {
				$model1       = new CreateAppsModel();
				
				$result    = $model1->checkAddresslatLong();
				echo $result; die;
			}
		}
		
	  public static function appsAccount($a = null, $b = null, $c = null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../";
				header("location:../../../../user/index.php/LoginAccount");
			} else {
				$path         = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model       = new EmployeeCheckController();
					$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
					header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new CreateAppsModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$developerCount    = $model1->developerCount($data);
				 
				if($developerCount==-1)
				{
					header('location:../../AppsList/requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../../AppsList/requestStatus/'.$data['cid']); die;
				}
				$stripeInfo         = $model1->stripeInfo($data); 
				 
				$locationDetail         = $model1->locationDetail($data); 
				require_once('CreateAppsNewView.php');
			}
		}
		
		public static function moreAddressDetail($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				$data['cid']=cleanMe($a);
				$model = new CreateAppsModel();
				$moreAddressDetail = $model->moreAddressDetail($data);
				echo $moreAddressDetail; die;
			}
		}
		 public static function editAddress($a = null, $b = null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../";
				header("location:../../../../../user/index.php/LoginAccount");
			} else {
				$path         = "../../../../../";
				$data=array();
				$data['aid']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$data['user_id']=$_SESSION['user_id'];
				$model       = new EmployeeCheckController();
					$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
					header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new CreateAppsModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$developerCount    = $model1->developerCount($data);
				 
				if($developerCount==-1)
				{
					header('location:../../../AppsList/requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../../../AppsList/requestStatus/'.$data['cid']); die;
				}
				 
				$addressInfo         = $model1->addressInfo($data); 
				require_once('CreateAppsUpdatePickupAddressView.php');
			}
		}
		
		
		public static function pickupAddressDetail($a = null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../";
				header("location:../../../../user/index.php/LoginAccount");
			} else {
				$path         = "../../../../";
				$data=array();
				 
				$data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model       = new EmployeeCheckController();
					$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
					header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new CreateAppsModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$developerCount    = $model1->developerCount($data);
				 
				if($developerCount==-1)
				{
					header('location:../../AppsList/requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../../AppsList/requestStatus/'.$data['cid']); die;
				}
				 
				require_once('CreateAppsPickupAddressView.php');
			}
		}
		
		public static function pickupAddressList($a = null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../";
				header("location:../../../../user/index.php/LoginAccount");
			} else {
				$path         = "../../../../";
				$data=array();
				 
				$data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model       = new EmployeeCheckController();
					$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
					header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new CreateAppsModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$developerCount    = $model1->developerCount($data);
				 
				if($developerCount==-1)
				{
					header('location:../../AppsList/requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../../AppsList/requestStatus/'.$data['cid']); die;
				}
				$addressList         = $model1->addressList($data);  
				$addressCount         = $model1->addressCount($data); 
				require_once('CreateAppsPickupAddressListView.php');
			}
		}
		
		
		  public static function editApp($a = null, $b = null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../";
				header("location:../../../../../user/index.php/LoginAccount");
			} else {
				$path         = "../../../../../";
				$data=array();
				$data['id']=cleanMe($a);
				$data['cid']=cleanMe($b);
				$data['user_id']=$_SESSION['user_id'];
				$model       = new EmployeeCheckController();
					$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
					header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new CreateAppsModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$developerCount    = $model1->developerCount($data);
				 
				if($developerCount==-1)
				{
					header('location:../../../AppsList/requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../../../AppsList/requestStatus/'.$data['cid']); die;
				}
				$stripeInfo         = $model1->stripeInfo($data); 
				$locationDetail         = $model1->locationDetail($data); 
				require_once('CreateAppsEditView.php');
			}
		}
		
		 public static function fieldRequest($a = null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../";
				header("location:../../../../user/index.php/LoginAccount");
			} else {
				$path         = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model       = new EmployeeCheckController();
					$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
					header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new CreateAppsModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$developerCount    = $model1->developerCount($data);
				 
				if($developerCount==-1)
				{
					header('location:../../AppsList/requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../../AppsList/requestStatus/'.$data['cid']); die;
				}
				 
				$signUpFielsDetail         = $model1->signUpFielsDetail($data); 
				
				require_once('CreateAppsSignupFieldsView.php');
			}
		}
		
		 public static function corporateFieldRequest($a = null)
		{
			 $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../../";
				header("location:../../../../user/index.php/LoginAccount");
			} else {
				$path         = "../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$model       = new EmployeeCheckController();
					$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
					header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new CreateAppsModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$developerCount    = $model1->developerCount($data);
				 
				if($developerCount==-1)
				{
					header('location:../../AppsList/requestAccount/'.$data['cid']); die;
				}
				else if($developerCount==0 || $developerCount==2)
				{
					header('location:../../AppsList/requestStatus/'.$data['cid']); die;
				}
				$signUpFielsDetail         = $model1->corporateSignUpFielsDetail($data); 
				
				require_once('CreateAppsCorporateSignupFieldsView.php');
			}
		}
		
    public static function createAppsAccount($a = null, $b = null, $c = null)
    {
        
     $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
        $model = new CreateAppsModel();
      
            $data = array();
            $data['cid']=cleanMe($a);
           
            $data['company_name']  = cleanMe($_POST['company_name_add']);
           
            $data['website']       = cleanMe($_POST['company_website']);
          
            $data['created_on']    = date('Y-m-d H:i:s');
            $data['client_secret']   = uniqid($data['company_name']);
            if (!filter_var($data['website'], FILTER_VALIDATE_URL) === false) {
					$result         = $model->createAppsAccount($data);
					//echo $result; die;
					 if ($result == 0) {
                
							header("location:../../CreateApps/appsAccount/".$data['cid']);
						}
						
						else {
							
							
							header("location:../../AppsList/appsAccount/".$data['cid']);
						}
					}
					else
					{
						//echo "wrong url"; die;
						header("location:../appsAccount/".$data['cid']);
					}
              }
        
	} 
        
    public static function updateAccount($a = null, $b = null)
    {
        
     $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../../";
            header("location:../../../../../user/index.php/LoginAccount");
        } else {
        $model = new CreateAppsModel();
      
            $data = array();
            $data['id']=cleanMe($a);
           $data['cid']=cleanMe($b);
             
					$result         = $model->updateAccount($data);
					//echo $result; die;
					 if ($result == 0) {
                
							header("location:../../../CreateApps/appsAccount/".$data['cid']);
						}
						
						else {
							
							
							header("location:../../../AppsList/appsAccount/".$data['cid']);
					 
              }
        }
	} 
         


	   
    public static function updateFieldsinfo($a = null)
    {
        
     $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
        $model = new CreateAppsModel();
      
            $data = array();
            $data['cid']=cleanMe($a);
            $updateFieldsinfo         = $model->updateFieldsinfo($data); 
			if($_POST['pickup_info']==0)
			{
			header("location:../fieldRequest/".$data['cid']);
			}
			else
			{
				header("location:../pickupAddressList/".$data['cid']);
			}
			 }
        
	} 
    
	 public static function updateCorporateFieldsinfo($a = null)
    {
        
     $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
        $model = new CreateAppsModel();
      
            $data = array();
            $data['cid']=cleanMe($a);
            $updateCorporateFieldsinfo         = $model->updateCorporateFieldsinfo($data); 
			if($_POST['pickup_info']==0)
			{
				header("location:../corporateFieldRequest/".$data['cid']);
			}
			else
			{
				header("location:../pickupAddressList/".$data['cid']);
			}
			
			 }
        
	} 
    
	public static function selectState($co = null)
    {
	$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
        $stModel = new CreateAppsModel();
        if (isset($co)) {
            
            $val         = cleanMe($co);
            $resultState = $stModel->selectState($val);
        }
        $option = '<option value="0" >-- Select State --</option>';
        foreach ($resultState as $stateCategory => $StateValue) {
            $stateCategory = htmlspecialchars($stateCategory);
            $option        = $option . '<option value="' . $StateValue['id'] . '">' . $StateValue['state_name'] . '</option>';
        }
        echo $option;
        die;
    }
    }
    
    public static function selectCity($c = null)
    {
	$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
        $ctModel = new CreateAppsModel();
        if (isset($c)) {
            $val        = array();
            $val['sid'] = cleanMe($c);
            $resultCity = $ctModel->selectCity($val);
        }
        $option = '<option value="0" >-- Select City --</option>';
        foreach ($resultCity as $category => $value) {
            $category = htmlspecialchars($category);
            $option   = $option . '<option value="' . $value['id'] . '">' . $value['city_name'] . '</option>';
        }
        echo $option;
        die;
    }
    }
	 public static function selectDistrict($c = null)
    {
	$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
        $ctModel = new CreateAppsModel();
        if (isset($c)) {
            $val        = array();
            $val['sid'] = cleanMe($c);
            $resultCity = $ctModel->selectDistrict($val);
        }
        $option = '<option value="0" >-- Select District --</option>';
        foreach ($resultCity as $category => $value) {
            $category = htmlspecialchars($category);
            $option   = $option . '<option value="' . $value['id'] . '">' . $value['district_name'] . '</option>';
        }
        echo $option;
        die;
    }
    
    }
    public static function selectOrganizationWeb($c = null)
    {
	$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
        $webModel = new CreateAppsModel();
        if (isset($c)) {
            $val        = array();
            $val['web'] = cleanMe($c);
            
            $resultWeb = $webModel->selectOrganizationWeb($val);
        }
       
        echo $resultWeb;
        die;
    }
    }
    
    
}


?>