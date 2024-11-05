<?php
require_once('../AppModel.php');
class SecurityLevelModel extends AppModel
{
 
    function userSummary($data)
    {
        $dbCon = AppModel::createConnection();
       
		
          $stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image from user_logins where id = ?");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 $stmt->close();
        $dbCon->close();
		 return $row;
        
        
    }
	
	 function completedEmployeeRequests($data)
    {
        $dbCon = AppModel::createConnection();
       
		
          $stmt = $dbCon->prepare("select employees.company_id,company_name,profile_pic from employees left join companies on employees.company_id=companies.id left join company_profiles on companies.id=company_profiles.company_id where employees.user_login_id = ? and o_type=1");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		 while($row = $result->fetch_assoc())
		 {
			 array_push($org,$row);
		 }
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	
	
    function userAccount($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select id,first_name,last_name,sex,dob_day,dob_month,dob_year,created_on  from user_logins where id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
         $row = $result->fetch_assoc();
        
        $stmt->close();
        $dbCon->close();
        return $row;
        
    }
	
	 function employeeAccount($data)
    {
        $dbCon = AppModel::createConnection();
        
		$stmt = $dbCon->prepare("select ssn,address from user_profiles  where user_logins_id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
       
        $row = $result->fetch_assoc();
		if(empty($row))
		{
			 $stmt = $dbCon->prepare("INSERT INTO user_profiles (user_logins_id, created_on , modified_on ) VALUES (?, now(), now())");
            
           
            $stmt->bind_param("i", $data['user_id']);
            $stmt->execute();
		}
        $stmt = $dbCon->prepare("select ssn,address from user_profiles  where user_logins_id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
       
        $row = $result->fetch_assoc();
        
        $stmt->close();
        $dbCon->close();
        return $row;
    }
    
	function companyDetail($data)
    {
        $dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		
		$stmt = $dbCon->prepare("select id from company_profiles  where company_id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $company_id);
        $stmt->execute();
        $result = $stmt->get_result();
       
        $row = $result->fetch_assoc();
		//print_r($row); die;
		if(empty($row))
		{
			//echo "hi"; die;
		 $stmt = $dbCon->prepare("INSERT INTO company_profiles (company_id, created_on , modified_on ) VALUES (?, now(), now())");
            
           
            $stmt->bind_param("i", $company_id);
            $stmt->execute();	
		}
		
		$stmt = $dbCon->prepare("select completed_requests,grading_status,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $company_id);
        $stmt->execute();
        $result = $stmt->get_result();
       
        $row = $result->fetch_assoc();
		//print_r($row); die;
        
        $stmt->close();
        $dbCon->close();
        return $row;
    }
    function updateDataPost($data)
    {
        $dbCon = AppModel::createConnection();
       $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
        $stmt = $dbCon->prepare("update company_profiles set address=?,city=?,country=?,zip=?  where company_id=?");
       
		
        /* bind parameters for markers */
        $stmt->bind_param("ssssi", $_POST['addrs'],$_POST['city'],$_POST['cntry'],$_POST['zip'],$company_id);
        $stmt->execute();
      
        $stmt->close();
        $dbCon->close();
        return 1;
    }
	
	
	 function updateDataPostSupplier($data)
    {
        $dbCon = AppModel::createConnection();
       $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
        $stmt = $dbCon->prepare("update company_profiles set si_address=?,si_city=?,si_country=?,si_zip=?,sd_address=?,sd_city=?,sd_country=?,sd_zip=?,vat=?   where company_id=?");
       
		
        /* bind parameters for markers */
        $stmt->bind_param("sssssssssi", $_POST['addrssi'],$_POST['citysi'],$_POST['cntrysi'],$_POST['zipsi'],$_POST['addrssd'],$_POST['citysd'],$_POST['cntrysd'],$_POST['zipsd'],$_POST['vat'],$company_id);
        $stmt->execute();
      
        $stmt->close();
        $dbCon->close();
        return 1;
    }
	
	
	function updateDataPostNew($data)
    {
        $dbCon = AppModel::createConnection();
       $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
        $stmt = $dbCon->prepare("update company_profiles set delivery_address=?,d_city=?,d_country=?,d_zip=?  where company_id=?");
       
		
        /* bind parameters for markers */
        $stmt->bind_param("ssssi", $_POST['addrs'],$_POST['city'],$_POST['cntry'],$_POST['zip'],$company_id);
        $stmt->execute();
      
        $stmt->close();
        $dbCon->close();
        return 1;
    }
	
	
	function countryList($data)
    {
        $dbCon = AppModel::createConnection();
       
		$org=array();
          $stmt = $dbCon->prepare("select country_name from country where id>-1");
        /* bind parameters for markers */
		$cont=1;
      
        $stmt->execute();
        $result = $stmt->get_result();
		$org="";
		 while($row = $result->fetch_assoc())
		 {
			$org=$org.$row['country_name'].",";
		 }
		
	$org=substr($org,0,-1);
		//echo $org; die;
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	
	function industryList($data)
    {
        $dbCon = AppModel::createConnection();
       
		$org=array();
          $stmt = $dbCon->prepare("select name from company_categories");
        /* bind parameters for markers */
		$cont=1;
      
        $stmt->execute();
        $result = $stmt->get_result();
		$org="";
		 while($row = $result->fetch_assoc())
		 {
			$org=$org.$row['name'].",";
		 }
		
	$org=substr($org,0,-1);
		//echo $org; die;
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	 function updateDataPhone($data)
    {
        $dbCon = AppModel::createConnection();
         $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
        $stmt = $dbCon->prepare("update company_profiles set phone_country=?,phone=? where company_id=?");
       
		
        /* bind parameters for markers */
        $stmt->bind_param("ssi", $_POST['c_phone'],$_POST['phone'],$company_id);
        $stmt->execute();
      
        $stmt->close();
        $dbCon->close();
        return 1;
    }
	
	
	function updateImage($data)
    {
        $dbCon = AppModel::createConnection();
		   $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
	 $data1 = strip_tags($_POST['image-data1']);
//echo $data; die;
define('UPLOAD_DIR','../estorecss/'); // image dir path
$img_name1="new".microtime();
file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
        
		//echo $img_name1; print_r($_POST); die;
        $stmt = $dbCon->prepare("update company_profiles set profile_pic=?  where company_id=?");
        
        $stmt->bind_param("si", $img_name1,$company_id);
        $stmt->execute();
     // echo "jain"; die;
        $stmt->close();
        $dbCon->close();
        return 1;
    }
	
	function updateData($data)
    {
        $dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
      //  print_r($_POST); die;
        $stmt = $dbCon->prepare("update companies set company_name=?,industry=?  where id=?");
       
		
        /* bind parameters for markers */
        $stmt->bind_param("ssi", $_POST['name'],$_POST['l_name'],$company_id);
        $stmt->execute();
      
	   $stmt = $dbCon->prepare("update company_profiles set cid=?,founded=?  where company_id=?");
       
		
        /* bind parameters for markers */
        $stmt->bind_param("ssi", $_POST['ssn'],$_POST['dob'],$company_id);
        $stmt->execute();
	  
        $stmt->close();
        $dbCon->close();
        return 1;
    }
	
	
	function updateDataBank($data)
    {
        $dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
     
	   $stmt = $dbCon->prepare("update company_profiles set bankgiro_med=?,bankgiro_utan=?,iban=?,bic=?,bank=?,f_tax=?  where company_id=?");
       
		
        /* bind parameters for markers */
        $stmt->bind_param("ssssssi", $_POST['bankgiro_med'],$_POST['bankgiro_utan'],$_POST['iban'],$_POST['bic'],$_POST['bank'],$_POST['ftax'],$company_id);
        $stmt->execute();
	  
        $stmt->close();
        $dbCon->close();
        return 1;
    }
}