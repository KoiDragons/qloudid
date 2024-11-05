<?php
require_once('../AppModel.php');
class LoginAccountModel extends AppModel
{
	 
	function listEmployers($data) {
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("SELECT id,company_email,company_name FROM companies where id in (select company_id from employees where user_login_id=? and company_id in (select company_id from cleaning_company_premium_account_request where is_approved=1))");
			
			/* bind parameters for markers*/
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($myrow  = $result->fetch_assoc())
			{
				$myrow['enc']=$this->encrypt_decrypt('encrypt',$myrow['id']);
				/*$stmt = $dbCon->prepare("SELECT count(id) as num from professional_company_selected_service_todos where company_id=? and professional_category_id=16 and is_selected=1");
			
				 
				$stmt->bind_param("i", $myrow['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row  = $result1->fetch_assoc();
				if($row['num']==0)
					continue;
				else
				{
				$stmt = $dbCon->prepare("SELECT count(id) as num from employees where company_id=?");
			
				 
				$stmt->bind_param("i", $myrow['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row  = $result1->fetch_assoc();
				$myrow['count']=$row['num'];
				array_push($org,$myrow);
				}*/
				
				$stmt = $dbCon->prepare("SELECT count(id) as num from employees where company_id=?");
			
				/* bind parameters for markers*/
				$stmt->bind_param("i", $myrow['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row  = $result1->fetch_assoc();
				$myrow['count']=$row['num'];
				array_push($org,$myrow);
					
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
				
			 
		}
	
	
	function userAccountInfo() {
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("SELECT user_logins.id,email FROM user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id WHERE country_of_residence=? and phone_number=?");
			
			/* bind parameters for markers*/
			$stmt->bind_param("is", $_POST['pcountry'],$_POST['pnumber']);
			$stmt->execute();
			$result = $stmt->get_result();
			$myrow  = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $myrow;
				
			 
		}
		
		
		function userDetail($data) {
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("SELECT user_logins.id,email,first_name FROM user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id WHERE user_logins.id=?");
			
			/* bind parameters for markers*/
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$myrow  = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $myrow;
				
			 
		}


	
	function decodeRedirect($data)
		{
			 
			   
			$redirect= $this -> encrypt_decrypt('decrypt',$data['redirect']);  
			 
				return $redirect;
		}
	function LoginEmailAccount($data)
    {
		$SECRET_KEY = 'qloud_login:system';
        $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where email = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $data['email']);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowUser    = $result->fetch_assoc();
		
		$userid = $rowUser['id'];
		$token = md5(uniqid(rand(), true));  
			  $cookie = $this -> encrypt_decrypt('encrypt',$userid) . ':' . $token;
			  $mac = hash_hmac('sha256', $cookie, $SECRET_KEY);
			  $cookie .= ':' . $mac;  
			  session_start();
			  $_SESSION['rememberme_qid'] = $cookie;
         
            $expire = time() + 60 * 60;
			$_SESSION['user_id'] = $rowUser['id'];
               
            $date = date('Y-m-d H:i:s');
            $stmt = $dbCon->prepare("UPDATE user_logins SET `last_login`=? , login_hash=?,otp_verification=''  WHERE `id`=?");
                    /* bind parameters for markers */
            $stmt->bind_param("ssi", $date,  $mac,$_SESSION['user_id']);
            $stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
		return 1;
    }

	
 function verifyEmailOtp() {
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("SELECT id,otp_verification FROM user_logins WHERE email=?");
			
			/* bind parameters for markers*/
			$stmt->bind_param("s", $_POST['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$myrow  = $result->fetch_assoc();
			if($myrow['otp_verification']==$_POST['otp'])
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
	
	function verifyEmailAccount() {
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("SELECT user_logins.id FROM user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id WHERE country_of_residence=? and phone_number=?");
			
			/* bind parameters for markers*/
			$stmt->bind_param("is", $_POST['pcountry'],$_POST['pnumber']);
			$stmt->execute();
			$result = $stmt->get_result();
			$myrow  = $result->fetch_assoc();
			 
			if(!empty($myrow))
			{
			 
				$num=(mt_rand(111111,999999));
				$stmt = $dbCon->prepare("update user_logins set otp_verification=? where id=?");
				
				$stmt->bind_param("si", $num,$myrow['id']);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("select country_code  from phone_country_code where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("i", $_POST['pcountry']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$phone='+'.trim($row['country_code']).''.trim($_POST['pnumber']);
				$subject='Your verification code';
				$to=$phone;
				 
				$html='Your verification code : '.$num;	
				 
				$res=sendSms($subject, $to, $html);
				$res=json_decode($res,true);
			  
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

	
	function guestDetailInfo($data)
		{
			$dbCon = AppModel::createConnection();
			   
			$checkout_id= $this -> encrypt_decrypt('decrypt',$data['id']);  
			$stmt = $dbCon->prepare("select checkin_date,checkout_date,guest_adult,guest_children from hotel_checkout_detail where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $checkout_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowDate = $result->fetch_assoc();
			
			$today=strtotime(date('Y-m-d'));
			$booking_overdate=strtotime($rowDate['checkout_date']);
			
			if($today>$booking_overdate)
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			
			$stmt = $dbCon->prepare("select count(id) as num from hotel_checkout_dependent_detail where hotel_checkout_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $checkout_id);
			$stmt->execute();
			$resultCount = $stmt->get_result();
			$rowDependentCount = $resultCount->fetch_assoc();
			$rowDate['guest_children']=$rowDate['guest_children']-$rowDependentCount['num'];
			 if($rowDate['guest_children']<0)
			 {
				 $rowDate['guest_children']=0;
			 }
				$stmt->close();
				$dbCon->close();
				return $rowDate['guest_children'];
		}
	function verifyIP()
		{
			$dbCon = AppModel::createConnection();
			
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			 $stmt = $dbCon->prepare("select login_status from user_certificates where login_started_for=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$row= $result->fetch_assoc();
			
			if($row['login_status']!=2)
			{
				$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0 where login_started_for=?");
				/* bind parameters for markers */
				$stmt->bind_param("s", $ip);
				$stmt->execute();	
			}
			 
				 $t=microtime();
				 
				$dbCon->close();
				return $this->encrypt_decrypt('encrypt',$ip);
			 
		}
		
		function verifySession()
		{
			$dbCon = AppModel::createConnection();
			
			$ip=microtime();
			 $stmt = $dbCon->prepare("select login_status from user_certificates where login_started_for=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$row= $result->fetch_assoc();
			
			if($row['login_status']!=2)
			{
				$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0 where login_started_for=?");
				/* bind parameters for markers */
				$stmt->bind_param("s", $ip);
				$stmt->execute();	
			}
			 $stmt->close();
				$dbCon->close();
				return $this->encrypt_decrypt('encrypt',$t);
			 
		}
		
		function updateLogin($data)
		{
			$dbCon = AppModel::createConnection();
			$ip= $this->encrypt_decrypt('decrypt',$data['ip']);
			 
			$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0 where login_started_for=?");
			/* bind parameters for markers */
				$stmt->bind_param("s", $ip);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;
			 
		}
		
		
	function hotelPrice($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			 
			$stmt = $dbCon->prepare("select visiting_address,port_number,visiting_city,visiting_state,property_location.id as p_id,room_type_id,total_days,price,hotel_name,fdesk_email,fdesk_country_code,fdesk_phone_number from hotel_checkout_detail left join company_hotel_room_type_detail on company_hotel_room_type_detail.id= hotel_checkout_detail.room_type_id left join hotel_basic_information on hotel_basic_information.property_id=company_hotel_room_type_detail.location_id left join property_location on property_location.id=hotel_basic_information.property_id where hotel_checkout_detail.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowPrice = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $rowPrice['price']*$rowPrice['total_days'];
			
			
		}	 
		
		
		
		
	function countryOption()
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,country_name,country_code from phone_country_code order by country_name");
			/* bind parameters for markers */
			$cont=1;
			
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
		
		function verifyUserSSN()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select user_logins_id,grading_status,phone_verified,country_of_residence,phone_number  from user_profiles left join user_logins on user_logins.id=user_profiles.user_logins_id where ssn=? and country_of_residence=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['user_ssn'], $_POST['countryname']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row_grading = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select count(id) as num from bankid_verified where bank_id =?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $_POST['user_ssn']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row_grading))
			{
			 $row_grading['phone_verified']=1; 
			if($row_grading['grading_status']==2 && $row_grading['phone_verified']==1 && $row['num']>0)
			{
			$stmt = $dbCon->prepare("select country_code  from phone_country_code where country_name=(select country_name from country where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row_grading['country_of_residence']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_country = $result->fetch_assoc();
			$phone="+".trim($row_country['country_code'])."".trim($row_grading['phone_number']);
			$num=(mt_rand(1111111,9999999)); 
			$subject='Your one time password(OTP) is:'.$num;
			$to=$phone;
			$html='Ditt engångslösenord:'.$num;
			$res=sendSms($subject, $to, $html);
			$rs=json_decode($res,true);
			//print_r($rs); die;
			if($rs['status']=='OK')
			{
			$stmt = $dbCon->prepare("insert into verify_user_phone (otp,created_on) values(?, now())");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $num);
				$stmt->execute();
				$id=$stmt->insert_id;
				$stmt->close();
				$dbCon->close();
				return $id;
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			}
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		}
		
		function verifyOtp()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select otp  from verify_user_phone where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['infor_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if($row['otp']==$_POST['otp'])
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
		
	 function checkCredentialsLogin($data)
    {
		$SECRET_KEY = 'qloud_login:system';
        $dbCon = AppModel::createConnection();
        $detail= $this -> encrypt_decrypt('decrypt',$data['logindetail']);
		//echo $detail; die;
		$resultDetail=explode('+',$detail);
		//print_r($resultDetail); die;
        $stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where email = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $resultDetail['0']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
      // print_r($row); die;
        $value  = array();
        if (empty($row)) {
            $value['result'] = 'no';
            $value['id']     = 0;
			$stmt->close();
			$dbCon->close();
            return $value;
        }
        else {
			  $userid = $row['id'];
			  $SECRET_KEY='qloud_login:system';
			  $cookie = isset($_COOKIE['rememberme_qid']) ? $_COOKIE['rememberme_qid'] : '';
			   if ($cookie) {
			  list ($user, $token, $mac) = explode(':', $cookie);
			  $id=encrypt_decrypt('decrypt',$user);
			  if($userid==$id)
			  {
				$value['result'] = 'yes';
				$value['id']     = 1;
				$stmt->close();
				$dbCon->close();
				
				return $value;
				 
			  }
			  else
			  {
				 
				$value['result'] = 'no';
				$value['id']     = 0;
				
				$stmt->close();
				$dbCon->close();
				
				return $value; 
			  }
			   }
			  else
			  {
				 
				$value['result'] = 'no';
				$value['id']     = 0;
				
				$stmt->close();
				$dbCon->close();
				
				return $value; 
			  }
			
			
            //echo $result; die;
            
        } 
        
        
        $stmt->close();
        $dbCon->close();
    }

    function phoneVerified($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select is_volunteer from corona_helping_hand where user_id=?");
			/* bind parameters for markers */
			 
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc(); 
			if(empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return 1;	
			}
			$stmt = $dbCon->prepare("select phone_verified from user_profiles where user_logins_id =?");
			/* bind parameters for markers */
			 
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc(); 
			if($row['phone_verified']==1)
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
    
	function loginAppThanks()
    {
		$SECRET_KEY = 'qloud_login:system';
        $dbCon = AppModel::createConnection();
		 $ip=$this->encrypt_decrypt('decrypt',$_POST['ip']);
		
        $stmt = $dbCon->prepare("select login_status,user_id from user_certificates where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
		
		
		$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0 where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
		
		$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where id = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $row['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowUser    = $result->fetch_assoc();
		 
		$stmt->close();
		$dbCon->close();
		return 1;
		}
		 
 
	
	function loginAppAccount()
    {
		$SECRET_KEY = 'qloud_login:system';
        $dbCon = AppModel::createConnection();
		 $ip=$this->encrypt_decrypt('decrypt',$_POST['ip']);
		
        $stmt = $dbCon->prepare("select login_status,user_id from user_certificates where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
		
		if($row['login_status']!=2)
		{
		$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0,time_out=1 where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
				
		$stmt->close();
        $dbCon->close();
		return 0;		
		}
		else
		{
			
		 
		$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0 where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
		
		 $stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where id = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $row['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowUser    = $result->fetch_assoc();
		$userid = $rowUser['id'];
		$token = md5(uniqid(rand(), true));  
			  $cookie = $this -> encrypt_decrypt('encrypt',$userid) . ':' . $token;
			  $mac = hash_hmac('sha256', $cookie, $SECRET_KEY);
			  $cookie .= ':' . $mac;  
			  session_start();
			  $_SESSION['rememberme_qid'] = $cookie;
         
            $expire = time() + 60 * 60;
			$_SESSION['user_id'] = $rowUser['id'];
                    
            $date = date('Y-m-d H:i:s');
            $stmt = $dbCon->prepare("UPDATE user_logins SET `last_login`=? , login_hash=?  WHERE `id`=?");
                    /* bind parameters for markers */
            $stmt->bind_param("ssi", $date,  $mac,$_SESSION['user_id']);
            $stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
		return 1;
		}
		 }

	function loginPurchaseSignin()
    {
		$SECRET_KEY = 'qloud_login:system';
        $dbCon = AppModel::createConnection();
		 $ip=$this->encrypt_decrypt('decrypt',$_POST['ip']);
		
        $stmt = $dbCon->prepare("select login_status,user_id from user_certificates where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
		 
		
		 $stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where id = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $row['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowUser    = $result->fetch_assoc();
		 $userid = $rowUser['id'];
		$token = md5(uniqid(rand(), true));  
			  $cookie = $this -> encrypt_decrypt('encrypt',$userid) . ':' . $token;
			  $mac = hash_hmac('sha256', $cookie, $SECRET_KEY);
			  $cookie .= ':' . $mac;  
			  session_start();
			  $_SESSION['rememberme_qid'] = $cookie;
         
            $expire = time() + 60 * 60;
			$_SESSION['user_id'] = $rowUser['id'];
                    
            $date = date('Y-m-d H:i:s');
            $stmt = $dbCon->prepare("UPDATE user_logins SET `last_login`=? , login_hash=?  WHERE `id`=?");
                    /* bind parameters for markers */
            $stmt->bind_param("ssi", $date,  $mac,$_SESSION['user_id']);
            $stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
		return 1;
		
		 }
	 
		 
		 
	function loginPurchaseAccount()
    {
		$SECRET_KEY = 'qloud_login:system';
        $dbCon = AppModel::createConnection();
		 $ip=$this->encrypt_decrypt('decrypt',$_POST['ip']);
		$resultOut=array();
        $stmt = $dbCon->prepare("select login_status,user_id,purchased_for from user_certificates where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
		
		$stmt = $dbCon->prepare("select company_id,redirect_uri from oauth_clients where client_id = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $_GET['next']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row_seller_company    = $result->fetch_assoc();
		
		if($row['login_status']!=2)
		{
		$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0,time_out=1,purchased_for=0 where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
				
		$stmt->close();
        $dbCon->close();
		return $resultOut['result']=0;;		
		}
		else
		{
			
		 
		$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0,purchased_for=0 where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
		if($row['purchased_for']==0)
		{
		 $stmt = $dbCon->prepare("select zipcode,first_name,last_name,email,country_of_residence,user_profiles.city,user_profiles.state,phone_number,address,port_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id= ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $row['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
		$output=json_encode(array('type'=>'purchase','first_name' => $row['first_name'], 'last_name' => $row['last_name'], 'email' => $row['email'], 'country_of_residence'=>$row['country_of_residence'], 'seller_company_id'=>$row_seller_company['company_id'], 'city'=>$row['city'], 'state'=>$row['state'], 'phone_number'=>$row['phone_number'], 'address'=>$row['address'], 'port_number'=>$row['port_number'], 'zipcode'=>$row['zipcode'], 'user'=>'1'));
		$resultOut['result']=1;
		$resultOut['out']=$output;
		}
		else
		{
		$stmt = $dbCon->prepare("select employees.id,company_name,first_name,last_name,email,company_email,address,cid,zip,company_profiles.city,companies.country_id,company_profiles.phone from employees left join companies on companies.id=employees.company_id left join company_profiles on company_profiles.company_id=employees.company_id where employees.user_login_id=? and employees.company_id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("ii", $row['user_id'],$row['purchased_for']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row_employee   = $result->fetch_assoc();
		$emp_id=encrypt_decrypt('encrypt',$row_employee['id']);	 	
		$output=json_encode(array('type'=>'purchase','first_name' => $row_employee['first_name'], 'last_name' => $row_employee['last_name'], 'email' => $row_employee['email'], 'company_name' => $row_employee['company_name'], 'emp_uniq_code'=>$emp_id, 'address'=>$row_employee['address'], 'cid'=>$row_employee['cid'], 'zip'=>$row_employee['zip'], 'city'=>$row_employee['city'], 'seller_company_id'=>$row_seller_company['company_id'],  'state'=>$row['state'], 'phone_number'=>$row['phone_number'], 'port_number'=>$row['port_number'], 'country_id'=>$row_employee['country_id'], 'phone'=>$row_employee['phone'], 'user'=>'0'));
		$resultOut['out']=$output;
		}
		$resultOut['result']=1;
		$stmt->close();
		$dbCon->close();
		return $resultOut;
		}
		 }

	function loginSignDocument()
    {
		$SECRET_KEY = 'qloud_login:system';
        $dbCon = AppModel::createConnection();
		 $ip=$this->encrypt_decrypt('decrypt',$_POST['ip']);
		$resultOut=array();
        $stmt = $dbCon->prepare("select login_status,user_id,purchased_for from user_certificates where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
		
		$stmt = $dbCon->prepare("select company_id,redirect_uri from oauth_clients where client_id = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $_GET['next']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row_seller_company    = $result->fetch_assoc();
		
		if($row['login_status']!=2)
		{
		$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0,time_out=1,purchased_for=0 where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
				
		$stmt->close();
        $dbCon->close();
		return $resultOut['result']=0;;		
		}
		else
		{
			
		 
		$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0,purchased_for=0 where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
		if($row['purchased_for']==0)
		{
		 $stmt = $dbCon->prepare("select zipcode,first_name,last_name,email,country_of_residence,user_profiles.city,user_profiles.state,phone_number,address,port_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id= ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $row['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
		$output=json_encode(array('type'=>'purchase','first_name' => $row['first_name'], 'last_name' => $row['last_name'], 'email' => $row['email'], 'country_of_residence'=>$row['country_of_residence'], 'seller_company_id'=>$row_seller_company['company_id'], 'city'=>$row['city'], 'state'=>$row['state'], 'phone_number'=>$row['phone_number'], 'address'=>$row['address'], 'port_number'=>$row['port_number'], 'zipcode'=>$row['zipcode'], 'user'=>'1'));
		$resultOut['result']=1;
		$resultOut['out']=$output;
		
		}
		else
		{
		$stmt = $dbCon->prepare("select employees.id,company_name,first_name,last_name,email,company_email,address,cid,zip,company_profiles.city,companies.country_id,company_profiles.phone from employees left join companies on companies.id=employees.company_id left join company_profiles on company_profiles.company_id=employees.company_id where employees.user_login_id=? and employees.company_id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("ii", $row['user_id'],$row['purchased_for']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row_employee   = $result->fetch_assoc();
		$emp_id=encrypt_decrypt('encrypt',$row_employee['id']);	 	
		$output=json_encode(array('type'=>'purchase','first_name' => $row_employee['first_name'], 'last_name' => $row_employee['last_name'], 'email' => $row_employee['email'], 'company_name' => $row_employee['company_name'], 'emp_uniq_code'=>$emp_id, 'address'=>$row_employee['address'], 'cid'=>$row_employee['cid'], 'zip'=>$row_employee['zip'], 'city'=>$row_employee['city'], 'seller_company_id'=>$row_seller_company['company_id'],  'state'=>$row['state'], 'phone_number'=>$row['phone_number'], 'port_number'=>$row['port_number'], 'country_id'=>$row_employee['country_id'], 'phone'=>$row_employee['phone'], 'user'=>'0'));
		$resultOut['out']=$output;
		}
		$resultOut['result']=1;
		$stmt->close();
		$dbCon->close();
	 
		return $resultOut;
		
		}
		 }

		function sellerCompany()
    {
		 
        $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select company_id,redirect_uri from oauth_clients where client_id = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $_GET['next']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row_seller_company    = $result->fetch_assoc();
		$row_seller_company['company_enc']=$this->encrypt_decrypt('encrypt',$row_seller_company['company_id']);
		return $row_seller_company;
		  }

	
    function LoginAccount($data)
    {
		$SECRET_KEY = 'qloud_login:system';
        $dbCon = AppModel::createConnection();
         
        $stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where email = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $data['email']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
       //print_r($row); die;
        $value  = array();
        if (empty($row)) {
            $value['result'] = 1;
            $value['id']     = 0;
            return $value;
        }
        if (trim($row['password']) == $data['password']) {
			  $userid = $row['id'];
			  $token = md5(uniqid(rand(), true)); // generate a token, should be 128 - 256 bit
			  //storeTokenForUser($user, $token);
			  $cookie = $this -> encrypt_decrypt('encrypt',$userid) . ':' . $token;
			  $mac = hash_hmac('sha256', $cookie, $SECRET_KEY);
			  $cookie .= ':' . $mac; //echo $cookie; die;
			  //$value['cookie']=$cookie;
	//setcookie('rememberme', $cookie, '/');
	session_start();
			$_SESSION['rememberme_qid'] = $cookie;
           // print_r($_COOKIE); die;
            $expire = time() + 60 * 60;
            if (isset($_POST['staylogin'])) {
                setcookie("email", $userid, $expire);
            }
            if ($row['verification_status'] == 1) {
                if ($row['get_started_wizard_status'] == 0) {
                    $_SESSION['user_id'] = $row['id'];
                    
                    $date = date('Y-m-d H:i:s');
                    $stmt = $dbCon->prepare("UPDATE user_logins SET `last_login`=? , login_hash=?  WHERE `id`=?");
                    /* bind parameters for markers */
                    $stmt->bind_param("ssi", $date,  $mac,$_SESSION['user_id']);
                    $stmt->execute();
                    if (!$stmt->execute()) {
                        $value['result'] = 0;
                        $value['id']     = 0;
                        return $value;
                    } else {
                        $value['result'] = 2;
                        $value['id']     = $row['id'];
                        return $value;
                    }
                } else {
                    $_SESSION['user_id'] = $row['id'];
                    
                    $date = date('Y-m-d H:i:s');
                   // echo  $mac; die;
                   $stmt = $dbCon->prepare("UPDATE user_logins SET `last_login`=? , login_hash=?  WHERE `id`=?");
                    /* bind parameters for markers */
                    $stmt->bind_param("ssi", $date,  $mac,$_SESSION['user_id']);
                    $stmt->execute();
                    if (!$stmt->execute()) {
                        $value['result'] = 0;
                        $value['id']     = 0;
                        return $value;
                    } else {
                        $value['result'] = 3;
                        $value['id']     = $row['id'];
                        return $value;
                    }
                }
            } else {
                $value['result'] = 4;
                $value['id']     = 0;
                return $value;
            }
        } else {
            $value['result'] = 5;
            $value['id']     = 0;
            return $value;
        }
        
        $stmt->close();
        $dbCon->close();
    }

	
	 function LoginMobileAccount($data)
    {
		$SECRET_KEY = 'qloud_login:system';
        $dbCon = AppModel::createConnection();
        //print_r($data); die;
        $stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where email = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $data['email']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
       //print_r($row); die;
        $value  = array();
        if (empty($row)) {
             
            $value['id']     = 0;
            return $value;
        }
        if (trim($row['password']) == $data['password']) {
			  $userid = $row['id'];
			  $token = md5(uniqid(rand(), true)); // generate a token, should be 128 - 256 bit
			  //storeTokenForUser($user, $token);
			  $cookie = $this -> encrypt_decrypt('encrypt',$userid) . ':' . $token;
			  $mac = hash_hmac('sha256', $cookie, $SECRET_KEY);
			  $cookie .= ':' . $mac; //echo $cookie; die;
			  //$value['cookie']=$cookie;
	//setcookie('rememberme', $cookie, '/');
	session_start();
			$_SESSION['rememberme_qid'] = $cookie;
           // print_r($_COOKIE); die;
            $expire = time() + 60 * 60;
            if (isset($_POST['staylogin'])) {
                setcookie("email", $userid, $expire);
            }
            if ($row['verification_status'] == 1) {
                if ($row['get_started_wizard_status'] == 0) {
                    $_SESSION['user_id'] = $row['id'];
                    
                   
                        $value['id']  = 0;
                        return $value;
                   
                } else {
                    $_SESSION['user_id'] = $row['id'];
                     $value['id']     = $row['id'];
                        return $value;
                  
                }
            } else {
                 
                $value['id']     = 0;
                return $value;
            }
        } else {
             
            $value['id']     = 0;
            return $value;
        }
        
        $stmt->close();
        $dbCon->close();
    }

	
	
	
	
	function LoginSSNAccount($data)
    {
		$SECRET_KEY = 'qloud_login:system';
        $dbCon = AppModel::createConnection();
        //print_r($data); die;
        $stmt = $dbCon->prepare("select user_logins.id,get_started_wizard_status,verification_status,user_logins_id,grading_status,phone_verified,country_of_residence,phone_number  from user_profiles left join user_logins on user_logins.id=user_profiles.user_logins_id where ssn=? and country_of_residence=?");
			
		/* bind parameters for markers */
		$stmt->bind_param("ii", $_POST['user_ssn'], $_POST['ccountry']);
		$stmt->execute();
		$result = $stmt->get_result();
			
		$row = $result->fetch_assoc();
       
        $value  = array();
         
		$userid = $row['user_logins_id'];
		$token = md5(uniqid(rand(), true)); // generate a token, should be 128 - 256 bit
			  //storeTokenForUser($user, $token);
			  $cookie = $this -> encrypt_decrypt('encrypt',$userid) . ':' . $token;
			  $mac = hash_hmac('sha256', $cookie, $SECRET_KEY);
			  $cookie .= ':' . $mac; //echo $cookie; die;
			  
			session_start();
			$_SESSION['rememberme_qid'] = $cookie;
           // print_r($_COOKIE); die;
            $expire = time() + 60 * 60;
            if (isset($_POST['staylogin'])) {
                setcookie("email", $userid, $expire);
            }
            if ($row['verification_status'] == 1) {
                if ($row['get_started_wizard_status'] == 0) {
                    $_SESSION['user_id'] = $row['id'];
                    
                    $date = date('Y-m-d H:i:s');
                    $stmt = $dbCon->prepare("UPDATE user_logins SET `last_login`=? , login_hash=?  WHERE `id`=?");
                    /* bind parameters for markers */
                    $stmt->bind_param("ssi", $date,  $mac,$_SESSION['user_id']);
                    $stmt->execute();
                    if (!$stmt->execute()) {
                        $value['result'] = 0;
                        $value['id']     = 0;
                        return $value;
                    } else {
                        $value['result'] = 2;
                        $value['id']     = $row['id'];
                        return $value;
                    }
                } else {
                    $_SESSION['user_id'] = $row['id'];
                    
                    $date = date('Y-m-d H:i:s');
                   // echo  $mac; die;
                   $stmt = $dbCon->prepare("UPDATE user_logins SET `last_login`=? , login_hash=?  WHERE `id`=?");
                    /* bind parameters for markers */
                    $stmt->bind_param("ssi", $date,  $mac,$_SESSION['user_id']);
                    $stmt->execute();
                    if (!$stmt->execute()) {
                        $value['result'] = 0;
                        $value['id']     = 0;
                        return $value;
                    } else {
                        $value['result'] = 3;
                        $value['id']     = $row['id'];
                        return $value;
                    }
                }
            } else {
                $value['result'] = 4;
                $value['id']     = 0;
                return $value;
            }
         
        
        $stmt->close();
        $dbCon->close();
    }
  
    function checkCredentials($data)
    {
		//$SECRET_KEY = 'qloud_login:system';
        $dbCon = AppModel::createConnection();
        //print_r($data); die;
        $stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where email = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $data['email']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
       
        $value  = array();
        if (empty($row)) {
            $value['result'] = 0;
            $value['id']     = 0;
            return $value;
        }
        if (trim($row['password']) == $data['password']) {
			 // $userid = $row['id'];
			  $value['result'] = 1;
			  return $value;
        }
        else
		{
			$value['result'] = 0;
            $value['id']     = 0;
            return $value;
		}
        $stmt->close();
        $dbCon->close();
    }

	
	
	}