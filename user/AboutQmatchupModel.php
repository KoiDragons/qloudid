<?php
require_once('../AppModel.php');
class AboutQmatchupModel extends AppModel
{
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
	
    function userSummary($data)
    {
        $dbCon = AppModel::createConnection();
       
		
          $stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image,password from user_logins where id = ?");
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
	
	 function empSummary($data)
    {
        $dbCon = AppModel::createConnection();
       
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		//echo $company_id; die;
          $stmt = $dbCon->prepare("select employees.id,company_email from employees left join companies on companies.id=employees.company_id where company_id=? and employees.user_login_id=?");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("ii", $company_id,$data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 if(empty($row))
		 {
		$stmt->close();
        $dbCon->close();
		return 0;
		 }
		 else
		 {
		$stmt->close();
        $dbCon->close();
		return 1;
		 }
		 
        
        
    }
	
	 function empSummaryDetail($data)
    {
        $dbCon = AppModel::createConnection();
       
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		//echo $company_id; die;
          $stmt = $dbCon->prepare("select employees.id,company_email from employees left join companies on companies.id=employees.company_id where company_id=? and employees.user_login_id=?");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("ii", $company_id,$data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 $data_encry=$data['user_email'].'+'.$row['company_email'];
		 $company_detail= $this -> encrypt_decrypt('encrypt',$data_encry);
		 //echo $company_detail; die;
		$stmt->close();
        $dbCon->close();
		return $company_detail;
		
		 
        
        
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
    
	
    
}