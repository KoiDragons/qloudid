<?php
require_once('../AppModel.php');
class GetVerifiedModel extends AppModel
{
	function profileStatus($data)
		{
			$dbCon = AppModel::createConnection();
			$value=1;
			$stmt = $dbCon->prepare("select count(id) as num from user_cards where user_login_id = ?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			 $value=1;	
			}
			else
			{
			$stmt = $dbCon->prepare("select is_id_active,invoice_address_required,delivery_address_required from user_profiles where user_logins_id = ?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			
			$stmt = $dbCon->prepare("select count(id) as num from user_address where user_id = ?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAdd    = $result->fetch_assoc();	
			
			if($rowId['delivery_address_required']==0 && $rowAdd['num']==0)
			{
			 $value=1;
			}
			else
			{
			$stmt = $dbCon->prepare("select count(id) as num from user_identification where user_id = ?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			 $value=2;
			}
			else
			{
				$value=3;
			}
			}
			}
		
			$stmt->close();
			$dbCon->close();
			return $value;
		}
		
		
	
		function hijackedUser($data)
    {
        $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select count(id) as num from user_hijacked where user_id=?  and is_hijacked=0 ");
		$stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		return $row;
        }
	
	function checkUserAvailability($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select user_logins_id  from user_profiles where ssn=? and user_logins_id!=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['ssn'],$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			if(empty($row))
			{
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		}
	
	function updateGrading($data)
    {
		
        $dbCon = AppModel::createConnection();
        //print_r($data); die;
        $stmt = $dbCon->prepare("update user_logins set grading_status=? where id = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("ii",$data['grading'], $data['user_id']);
        
        
       
        if($stmt->execute())
		{
		$stmt->close();
        $dbCon->close();
		return 1;
		}
        
        $stmt->close();
        $dbCon->close();
		return 0;
    }
	
	
	
	function verificationId($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select max(id) as v_id from user_passport_logs where user_id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
         $row = $result->fetch_assoc();
        if(empty($row))
		{
			$row['v_id']="";
		}
        $stmt->close();
        $dbCon->close();
        return $row;
        
    }
	
  function changePassword($data)
    {
		
        $dbCon = AppModel::createConnection();
        //print_r($data); die;
        $stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where id = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
		//print_r($row); die;
       $np=md5($_POST['newpassword']);
        if($row['password']==md5($_POST['cpassword']))
		{
			$stmt = $dbCon->prepare("update user_logins set password=? where id = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("si", $np,$data['user_id']);
        $stmt->execute();
		}
        
        $stmt->close();
        $dbCon->close();
		return 1;
    }
	
	
	
	function checkPassword($data)
    {
		
        $dbCon = AppModel::createConnection();
        //print_r($data); die;
        $stmt = $dbCon->prepare("select password from user_logins where id = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
		//print_r($row); die;
       
        if($row['password']==$data['cpass'])
		{
		$stmt->close();
        $dbCon->close();
		return 1;
		}
        
        $stmt->close();
        $dbCon->close();
		return 0;
    }

	
    function userSummary($data)
    {
        $dbCon = AppModel::createConnection();
       
		
          $stmt = $dbCon->prepare("select grading_status,first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image,country_of_residence from user_logins where id = ?");
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
   
  
    function userAccount($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select id,first_name,last_name,sex,dob_day,dob_month,dob_year,created_on,email,grading_status  from user_logins where id=?");
        
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
		
        $stmt = $dbCon->prepare("select ssn,address,country,city,zipcode,phone_number,clearing_number,bank_account_number,language,country_phone,phone_verified from user_profiles  where user_logins_id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
       
        $row = $result->fetch_assoc();
        
        $stmt->close();
        $dbCon->close();
        return $row;
    }
    
	 function updateUser($data)
    {
        $dbCon = AppModel::createConnection();
		
	//	print_r($data); die;
        if($data['uid']==1)
		{
        $stmt = $dbCon->prepare("update user_profiles set ssn=?  where user_logins_id=?");
        }
		else  if($data['uid']==2)
		{
        $stmt = $dbCon->prepare("update user_logins set last_name=?  where id=?");
        }
		else  if($data['uid']==3)
		{
        $stmt = $dbCon->prepare("update user_logins set first_name=?  where id=?");
        }
        /* bind parameters for markers */
        $stmt->bind_param("si", $data['cid'],$data['user_id']);
        $stmt->execute();
      
        $stmt->close();
        $dbCon->close();
        return 1;
    }
	
	 function updateImage($data)
    {
        $dbCon = AppModel::createConnection();
		//print_r($_POST); die;
	 $data1 = strip_tags($_POST['image-data1']);
//echo $data; die;
define('UPLOAD_DIR','../estorecss/'); // image dir path
$img_name1="new".microtime();
file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
        
		//echo $img_name1; print_r($_POST); die;
        $stmt = $dbCon->prepare("update user_logins set passport_image=?  where id=?");
        
        $stmt->bind_param("si", $img_name1,$data['user_id']);
        $stmt->execute();
     // echo "jain"; die;
        $stmt->close();
        $dbCon->close();
        return 1;
    }
    
    function updateDataPost($data)
    {
        $dbCon = AppModel::createConnection();
       
        $stmt = $dbCon->prepare("update user_profiles set address=?,city=?,country=?,zipcode=?  where user_logins_id=?");
       
		
        /* bind parameters for markers */
        $stmt->bind_param("ssssi", $_POST['addrs'],$_POST['city'],$_POST['cntry'],$_POST['zip'],$_POST['user_id']);
        $stmt->execute();
      
        $stmt->close();
        $dbCon->close();
        return 1;
    }
    
	function updateData($data)
    {
        $dbCon = AppModel::createConnection();
        $a=array();
	   $a=explode("/",$_POST['dob']);
	   if($_POST['sex']=='M')
	   {
		   $s=1;
	   }
	   else  if($_POST['sex']=='F')
	   {
		   $s=2;
	   }
	    else  if($_POST['sex']=='T')
	   {
		   $s=3;
	   }
        $stmt = $dbCon->prepare("update user_logins set sex=?,dob_day=?,dob_month=?,dob_year=?,first_name=?,last_name=?  where id=?");
       
		
        /* bind parameters for markers */
        $stmt->bind_param("iiiissi", $s,$a[1],$a[0],$a[2],$_POST['name'],$_POST['l_name'],$_POST['user_id']);
        $stmt->execute();
      
	   $stmt = $dbCon->prepare("update user_profiles set ssn=?  where user_logins_id=?");
       
		
        /* bind parameters for markers */
        $stmt->bind_param("si", $_POST['ssn'],$_POST['user_id']);
        $stmt->execute();
	  
        $stmt->close();
        $dbCon->close();
        return 1;
    }
	
	
	 function updateDate($data)
    {
        $dbCon = AppModel::createConnection();
       $a=array();
	   $a=explode("/",$data['cid']);
	  // print_r ($a); die;
        $stmt = $dbCon->prepare("update user_logins set dob_day=?,dob_month=?,dob_year=?  where id=?");
       
		
        /* bind parameters for markers */
        $stmt->bind_param("iiii", $a[1],$a[0],$a[2],$data['user_id']);
        $stmt->execute();
      
        $stmt->close();
        $dbCon->close();
        return 1;
    }
	
	function updateSex($data)
    {
        $dbCon = AppModel::createConnection();
       
        $stmt = $dbCon->prepare("update user_logins set sex=?  where id=?");
       
		
        /* bind parameters for markers */
        $stmt->bind_param("ii", $data['cid'],$data['user_id']);
        $stmt->execute();
      
        $stmt->close();
        $dbCon->close();
        return 1;
    }
	
     function updateDataBank($data)
    {
        $dbCon = AppModel::createConnection();
       
        $stmt = $dbCon->prepare("update user_profiles set clearing_number=?,bank_account_number=?,language=? where user_logins_id=?");
       
		
        /* bind parameters for markers */
        $stmt->bind_param("sssi", $_POST['clear_number'],$_POST['bank_acc'],$_POST['langu'],$_POST['user_id']);
        $stmt->execute();
      
        $stmt->close();
        $dbCon->close();
        return 1;
    }
	
	 function updateDataPhone($data)
    {
        $dbCon = AppModel::createConnection();
       
        $stmt = $dbCon->prepare("update user_profiles set country_phone=?,phone_number=? where user_logins_id=?");
       
		
        /* bind parameters for markers */
        $stmt->bind_param("ssi", $_POST['c_phone'],$_POST['phone'],$_POST['user_id']);
        $stmt->execute();
      
        $stmt->close();
        $dbCon->close();
        return 1;
    }
    function updateSSN($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select email,grading_status  from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row_user = $result->fetch_assoc();
			
			
			$security=2;
			
			$stmt= $dbCon->prepare("update user_profiles set ssn=? where user_logins_id= ?");
			$stmt->bind_param("si", $_POST['ssecurity'],$data['user_id']);
			if($stmt->execute())
			{
				
				$stmt = $dbCon->prepare("select verified_name,first_name,last_name from bankid_verified where bank_id = ?");
						/* bind parameters for markers */
						$cont=1;
						$stmt->bind_param("s", $_POST['ssecurity']);
						$stmt->execute();
						$result = $stmt->get_result();
						$row = $result->fetch_assoc();
				$stmt = $dbCon->prepare("update user_logins set first_name=?,last_name=?,grading_status=? where id = ?");
				
				/* bind parameters for markers */
				$stmt->bind_param("ssii",$row['first_name'],$row['last_name'],$security, $data['user_id']);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("update employees set first_name=?,last_name=? where user_login_id = ?");
				
				/* bind parameters for markers */
				$stmt->bind_param("ssi",$row['first_name'],$row['last_name'], $data['user_id']);
				$stmt->execute();
				
				
				$stmt = $dbCon->prepare("INSERT INTO user_passport_logs (user_id, created_on) VALUES (?, now())");
				$stmt->bind_param("i", $data['user_id']);
				$fields=array();
				$fields=$_POST;
				$fields['email']=$row_user['email'];
				$fields['first_name']=$row['first_name'];
				$fields['last_name']=$row['last_name'];
				$posted_value=array();
				$posted_value['posted']= $this -> encrypt_decrypt('encrypt',serialize($fields));
				$url='https://www.qmatchup.com/beta/user/index.php/NewPersonal/updateSSN';
				$ch = curl_init();
				
				curl_setopt($ch, CURLOPT_URL,$url);
				curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
				curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
				curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
				curl_setopt($ch, CURLOPT_COOKIESESSION, true);
				curl_setopt($ch, CURLOPT_REFERER, true);
				curl_setopt($ch, CURLOPT_COOKIEJAR, true);
				curl_setopt($ch, CURLOPT_COOKIEFILE, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($posted_value));
				curl_setopt($ch, CURLOPT_POST, true);
				$result=curl_exec ($ch);
				
				$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				curl_close ($ch);
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			else
			{
				
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			
		}
		
		 function approveOtp($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select email,grading_status  from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row_user = $result->fetch_assoc();
			$security=2;
			$phv=1;
			$stmt= $dbCon->prepare("update user_profiles set phone_number=?,phone_verified=? where user_logins_id= ?");
			$stmt->bind_param("sii", $_POST['phoneno'],$phv,$data['user_id']);
			if($stmt->execute())
			{
				$stmt = $dbCon->prepare("update user_logins set grading_status=? where id = ?");
				
				/* bind parameters for markers */
				$stmt->bind_param("ii",$security, $data['user_id']);
				$stmt->execute();
				$stmt = $dbCon->prepare("INSERT INTO user_passport_logs (user_id, created_on) VALUES (?, now())");
				$stmt->bind_param("i", $data['user_id']);
				$fields=array();
				$fields=$_POST;
				$fields['email']=$row_user['email'];
				
				$posted_value=array();
				$posted_value['posted']= $this -> encrypt_decrypt('encrypt',serialize($fields));
				$url='https://www.qmatchup.com/beta/user/index.php/NewPersonal/updatePhoneNumber';
				$ch = curl_init();
				
				curl_setopt($ch, CURLOPT_URL,$url);
				curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
				curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
				curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
				curl_setopt($ch, CURLOPT_COOKIESESSION, true);
				curl_setopt($ch, CURLOPT_REFERER, true);
				curl_setopt($ch, CURLOPT_COOKIEJAR, true);
				curl_setopt($ch, CURLOPT_COOKIEFILE, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($posted_value));
				curl_setopt($ch, CURLOPT_POST, true);
				$result=curl_exec ($ch);
				
				$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				curl_close ($ch);
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			else
			{
				
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			
		}
		
		
}