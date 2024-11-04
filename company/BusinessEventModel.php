<?php
require_once('../AppModel.php');
class BusinessEventModel extends AppModel
{
    
    
    function userDetail($data)
    {
        $dbCon = AppModel::createConnection();
        //print$data; die;
        
        $stmt = $dbCon->prepare("select first_name,last_name,email,sex,dob_month,dob_day,dob_year,country,state,city,district from user_logins where id=(select user_login_id from companies where id=?)");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $data['id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $myrow  = $result->fetch_assoc();
		
        $stmt->close();
        $dbCon->close();
		return $myrow;
    }
	
	 function companyDetail($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select email_verification_status,company_email,company_name,website,country_id,state_id,city_id,district_id,created_date from companies where id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $data['id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $myrow  = $result->fetch_assoc();
      $c=$myrow['company_name']."_".$myrow['created_date'];
	  $myrow['statuscode']=$this->encrypt_decrypt('encrypt',$c);
	   $myrow['verification']=$this->encrypt_decrypt('encrypt',date('Y-m-d h:i:s'));
	  
        $stmt->close();
        $dbCon->close();
		return $myrow;
    }
    
	function serialData($data)
	{
		return $this->encrypt_decrypt('encrypt',serialize($data));
	}
	
	
	
   }
