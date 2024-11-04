<?php
require_once('../AppModel.php');

class EmployeePassportModel extends AppModel
{
 function updateImage($data)
    {
        $dbCon = AppModel::createConnection();
		//print_r($data); die;
	 $data1 = strip_tags($_POST['image-data1']);
//echo $data; die;
define('UPLOAD_DIR','../estorecss/'); // image dir path
$img_name1="new".microtime();
file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
        
		
        $stmt = $dbCon->prepare("update user_logins set passport_image=?  where id=?");
        
        $stmt->bind_param("si", $img_name1,$data['user_id']);
        $stmt->execute();
     // echo "jain"; die;
        $stmt->close();
        $dbCon->close();
        return 1;
    }
	
  function empSummary($data)
    {
        $dbCon = AppModel::createConnection();
       
		
          $stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image from user_logins where id = ?");
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
	
	
	function articleSummary($data)
    {
        $dbCon = AppModel::createConnection();
       
		  $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
          $stmt = $dbCon->prepare("select headline,subheading from employee_article where user_login_id = ? and company_id=? ");
        /* bind parameters for markers */
		$cont=1;
		$org=array();
       $stmt->bind_param("ii", $data['user_id'],$company_id);
        $stmt->execute();
        $result = $stmt->get_result();
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
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		

		
        $stmt = $dbCon->prepare("select company_name from companies where companies.id = ?");
        
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i", $company_id);
        $stmt->execute();
        $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 $stmt->close();
        $dbCon->close();
		 return $row;
        
        
    }
   
    function employeeId($data)
    {
        $dbCon = AppModel::createConnection();
        $emp_id= $this -> encrypt_decrypt('encrypt',$data['user_id']);
		
        $dbCon->close();
		 return $emp_id;
        
        
    }
    
    
    function userAccount($data)
    {
        $dbCon = AppModel::createConnection();
         $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
        $stmt = $dbCon->prepare("select id,first_name,last_name,sex,dob_day,dob_month,dob_year  from user_logins where id=?");
        
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
         $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
        $stmt = $dbCon->prepare("select e_number,h_date,res_date,location,job_position.job_position  from user_company_profile left join job_position on job_position.id=user_company_profile.job_position where company_id=? and user_login_id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("ii", $company_id,$data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
       
        $row = $result->fetch_assoc();
        
        $stmt->close();
        $dbCon->close();
        return $row;
    }
    
    
    
    
    
}