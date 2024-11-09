<?php
require_once 'MinkarriarModel.php';
require_once '../configs/utility.php';
class MinkarriarController
{
    
    
    public static function index()
    {
        $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
        } else {
            $path         = "../../";
            $model1       = new MinkarriarModel();
        
            
            require_once('MinkarriarView.php');
        }
    }
	
	 public static function connectCompany($a = null, $b = null, $c = null)
    {
        $valueNew = checkLogin();
        if ($valueNew == 0) {
           
            echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
        $model = new MinkarriarModel();
        
            $data = array();
			
        $data['name']     = cleanMe($a);
		
        
            $resultPass = $model->connectCompany($data);
			 $resultPassCount = $model->connectCompanyCount($data);
            echo $resultPass."/".$resultPassCount; 
		}
        }
    
    public static function connectAccount($a = null, $b = null, $c = null)
    {
          $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
        } else {
        $model = new MinkarriarModel();
        
            $data = array();
			$data['user_id']=$_SESSION['user_id'];
        $data['cname']     = cleanMe($_POST['cname']);
		 
        require_once('../configs/testMandril.php');
            $resultPass = $model->connectAccount($data);
            header("location:../Minkarriar/userAccount");
        }
        
	}
	
      public static function userAccount($co = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
        } else {
			
			if(isset($_SESSION['rememberme_qid'])){
				
		setcookie('rememberme_qid', $_SESSION['rememberme_qid'], time()+ (30*60*60*24), '/', "qmatchup.com");
				}
				
            $path         = "../../../";
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
			
            $model1       = new MinkarriarModel();
			  $row_lice = $model1->licenceDetail($data);
			 $result_lang = $model1->languageDetail($data);
            $resultOrg    = $model1->userAccount($data);
			
			$resultOrg1    = $model1->employeeAccount($data);
			$row_summary    = $model1->userSummary($data);
			//$detail    = $model1->connectAccountDetail($data);
			
					
			$rowsummary = $model1->userProfileSummary($data);	
			
			$result_exp = $model1->userExp($data);
			  $result_edu = $model1->userEducation($data);
			  $result_country = $model1->userCountry($data);
			  $result_school1 = $model1->userSchool($data);
			  $result_school111 = $model1->userClass($data);
			  $row_exp_count = $model1->userExpCount($data);
			 $row_lang_count = $model1->userLanguageCount($data);
			 
			// print_r($row_lang); die;
			  $row_edu_count = $model1->userEduCount($data);
			  $resultContry = $model1->selectCountry(); 
            require_once('MinkarriarView.php');
        }
       
    }
	
	 public static function updateUser($co = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
			$data=array();
			
			$data['user_id']=$_POST['user_id'];
			$data['cid']=$_POST['cid'];
			$data['uid']=$_POST['uid'];
            $model1       = new MinkarriarModel();
           
			$result    = $model1->updateUser($data);
           echo $result; die;
        }
	}
	
	
	 public static function updateLanguage($co = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../LoginAccount");
        } else {
			$data=array();
			$data['user_id']=$_SESSION['user_id'];
            $model1       = new MinkarriarModel();
           
			$result    = $model1->updateLanguage($data);
           header("location:../Minkarriar/userAccount");
        }
	}
	
	public static function updateLicence($co = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../LoginAccount");
        } else {
			$data=array();
			
			$data['user_id']=$_SESSION['user_id'];
			
            $model1       = new MinkarriarModel();
           
			$result    = $model1->updateLicence($data);
           header("location:../Minkarriar/userAccount");
        }
	}
	
	
	
	public static function updateImage($co = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
        } else {
			$data=array();
			
			$data['user_id']=$_SESSION['user_id'];
			
            $model1       = new MinkarriarModel();
           
			$result    = $model1->updateImage($data);
           header("location:../Minkarriar/userAccount");
        }
	}
	
	
	
	
	
	
	
	
	
	
	
	
	    public static function updateAddress($co = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
			$data=array();
			
			$data['user_id']=$_POST['user_id'];
			$data['cid']=$_POST['cid'];
			
            $model1       = new MinkarriarModel();
           
			$result    = $model1->updateAddress($data);
           echo $result; die;
        }
    }
	  public static function updateDate($co = null)
    {
          $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
			$data=array();
			
			$data['user_id']=$_POST['user_id'];
			$data['cid']=$_POST['cid'];
			
            $model1       = new MinkarriarModel();
           
			$result    = $model1->updateDate($data);
           echo $result; die;
        }
    }
	public static function updateSex($co = null)
    {
          $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
			$data=array();
			
			$data['user_id']=$_POST['user_id'];
			if($_POST['cid']=="M")
			{
				$data['cid']=1;
			}
			else if($_POST['cid']=="F")
			{
				$data['cid']=2;
			}
			else if($_POST['cid']=="T")
			{
				$data['cid']=3;
			}
			
			
            $model1       = new MinkarriarModel();
           
			$result    = $model1->updateSex($data);
           echo $result; die;
        }
		
	}
			public static function selectCountry($co = null)
    {
        $stModel = new MinkarriarModel();
		$val=array();
        
            
            $val['sid']         = urldecode($_POST['id']);
            $resultState = $stModel->countrySelect($val);
        
       
        echo $resultState;
        die;
    }
	
	
	
	public static function schoolSelect($co = null)
    {
	 $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
        $stModel = new MinkarriarModel();
       $val=array();
        
            
            $val['sid']         = urldecode($_POST['id']);
            $resultState = $stModel->selectSchool($val);
       
        echo $resultState;
        die;
    }
	}   
		public static function selectState($co = null)
    {
	 $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
           echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
        $stModel = new MinkarriarModel();
        if (isset($co)) {
            
            $val         = cleanMe($co);
            $resultState = $stModel->selectState($val);
        }
        $option = '<option value="-1" >All State</option>';
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
            $path = "../../";
           echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
        $ctModel = new MinkarriarModel();
        if (isset($c)) {
            $val        = array();
            $val['sid'] = cleanMe($c);
            $resultCity = $ctModel->selectCity($val);
        }
         $option = '<option value="-1" >All City</option>';
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
            $path = "../../";
           echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
        $ctModel = new MinkarriarModel();
        if (isset($c)) {
            $val        = array();
            $val['sid'] = cleanMe($c);
            $resultDistrict = $ctModel->selectDistrict($val);
        }
        $option = '<option value="-1" >All District</option>';
        foreach ($resultDistrict as $category => $value) {
            $category = htmlspecialchars($category);
            $option   = $option . '<option value="' . $value['id'] . '">' . $value['district_name'] . '</option>';
        }
        echo $option;
        die;
    }
	}	
		
		 public static function updateUserSummary($c = null)
    {
	 $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../LoginAccount");
        } else {
        $ctModel = new MinkarriarModel();
        
            $data=array();
			//session_start();
			$data['user_id']=$_SESSION['user_id'];
            $resultDistrict = $ctModel->updateUserSummary($data);
       header("location:../Minkarriar/userAccount");
        
    }
	}
		 public static function updateUserExperience($c = null)
    {
	 $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../LoginAccount");
        } else {
        $ctModel = new MinkarriarModel();
        
            $data=array();
			//session_start();
			$data['user_id']=$_SESSION['user_id'];
			//require_once('../configs/testMandril.php');
            $resultDistrict = $ctModel->updateUserExperience($data);
			
        header("location:../Minkarriar/userAccount");
        
    }
	}
		
		 public static function updateEducation($c = null)
    { $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../LoginAccount");
        } else {
        $ctModel = new MinkarriarModel();
        
            $data=array();
			//session_start();
			$data['user_id']=$_SESSION['user_id'];
			require_once('../configs/testMandril.php');
            $resultDistrict = $ctModel->updateEducation($data);
			
       header("location:../Minkarriar/userAccount");
        
    }
		
	}	
		
		public static function removeExp($c = null)
    {
	 $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../LoginAccount");
        } else {
        $ctModel = new MinkarriarModel();
        
            $data=array();
			//session_start();
			$data['user_id']=$_SESSION['user_id'];
			$data['exp']=cleanMe($c);
			require_once('../configs/testMandril.php');
            $resultDistrict = $ctModel->removeExp($data);
			
       header("location:../userAccount");
        
    }
	}
	
	public static function removeEdu($c = null)
    {
	 $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../LoginAccount");
        } else {
        $ctModel = new MinkarriarModel();
        
            $data=array();
			//session_start();
			$data['user_id']=$_SESSION['user_id'];
			$data['edu']=cleanMe($c);
			require_once('../configs/testMandril.php');
            $resultDistrict = $ctModel->removeEdu($data);
			
        header("location:../userAccount");
        
    }
	
	}
	public static function removeLanguage($c = null)
    {
	 $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../LoginAccount");
        } else {
        $ctModel = new MinkarriarModel();
        
            $data=array();
			//session_start();
			$data['user_id']=$_SESSION['user_id'];
			$data['lang']=cleanMe($c);
			require_once('../configs/testMandril.php');
            $resultDistrict = $ctModel->removeLanguage($data);
			
        header("location:../userAccount");
        
    }
	}
	public static function removeLicence($c = null)
    {
	 $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../LoginAccount");
        } else {
        $ctModel = new MinkarriarModel();
        
            $data=array();
		//	session_start();
			$data['user_id']=$_SESSION['user_id'];
			$data['lice']=cleanMe($c);
			require_once('../configs/testMandril.php');
            $resultDistrict = $ctModel->removeLicence($data);
			
        header("location:../userAccount");
        }
    }
		
		 public static function companySelect($c = null)
    {
	 $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            echo '<script> window.location.href="https://www.safeqloud.com/user/index.php/LoginAccount"; </script>'; die;
        } else {
        $ctModel = new MinkarriarModel();
        if (isset($c)) {
            $val        = array();
            $val['sid'] = cleanMe($c);
			//print_r($val); die;
            $resultCompany = $ctModel->selectCompany($val);
        }
      /*  $option = '';
		//print_r($resultCompany); die;
        foreach ($resultCompany as $category => $value) {
            $category = htmlspecialchars($category);
            $option = $option. '<option value="'.$value['company_name'].'">';;
        }*/
        echo $resultCompany;
        die;
    }
		
	}
    
}


?>