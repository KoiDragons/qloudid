<?php
	require_once('../AppModel.php');
	class StoreDataModel extends AppModel
	{
		function urlDetail($data)
		{
			 
			return $this -> encrypt_decrypt('encrypt',$data['REQUEST_URI']); 
			 
			 
		}
		function getDates()
		{
			$d=cal_days_in_month(CAL_GREGORIAN,$_POST['month'],$_POST['year']);
			$org='<option value="0" class="lgtgrey2_bg" >Select</option>';
			for($i=1;$i<=$d;$i++)
			{
			$org=$org.'<option value="'.$i.'" class="lgtgrey2_bg" >'.$i.'</option>';	
			}				
			return $org;
		}
		
		function countryOption()
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,country_name,country_code  from phone_country_code order by country_name");
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
		function checkUserAvailability($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select user_logins_id  from user_profiles left join user_logins on user_logins.id=user_profiles.user_logins_id where ssn=? and user_logins_id!=? and country_of_residence=(select country_of_residence from user_logins where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $_POST['ssn'],$data['user_id'],$data['user_id']);
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
		
		function checkSsnInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select id,ssn  from user_profiles   where  user_logins_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			if($row['ssn']==null || $row['ssn']=='')
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
		
		function checkIdentificator($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select count(id) as num  from user_identification   where  user_id=? and identification_type=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['user_id'],$_POST['variation_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row['num'];
			 
		}
		function certificateDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$id=$this -> encrypt_decrypt('decrypt',$data['certi_id']);
			$stmt = $dbCon->prepare("select is_valid,is_connected,user_id,certificate_key from user_certificates where id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		function generateCertificate($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$resultOrg    = $this->userAccount($data);
			$pass=md5($_POST['password']);	
			
			$certi=$resultOrg['first_name'].'_'.microtime().'_'.$resultOrg['last_name'];
			$key=$this -> encrypt_decrypt('encrypt',$certi);
			$stmt = $dbCon->prepare("insert into user_certificates(`user_id`,`created_on`,password,certificate_key) values(?, now(), ?, ?)");
			$stmt->bind_param("iss", $data['user_id'],$pass, $key);
			if($stmt->execute())
			{
				$id=$stmt->insert_id;
			$stmt->close();
			$dbCon->close();
			return $this->encrypt_decrypt('encrypt',$id);
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return 0;	
			}
		}
		function generateNewCertificate($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$resultOrg    = $this->userAccount($data);
			$pass=md5($_POST['password']);	
			
			$certi=$resultOrg['first_name'].'_'.microtime().'_'.$resultOrg['last_name'];
			$key=$this -> encrypt_decrypt('encrypt',$certi);
			$stmt = $dbCon->prepare("update user_certificates set is_valid=0 where user_id=?");
			$stmt->bind_param("i", $data['user_id']);
			if($stmt->execute())
			{
			$stmt = $dbCon->prepare("insert into user_certificates(`user_id`,`created_on`,password,certificate_key) values(?, now(), ?, ?)");
			$stmt->bind_param("iss", $data['user_id'],$pass, $key);
			if($stmt->execute())
			{
				$id=$stmt->insert_id;
			$stmt->close();
			$dbCon->close();
			return $this->encrypt_decrypt('encrypt',$id);
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return 0;	
			}
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return 0;	
			}
		}
		
		function checkUsedIdentificator($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select count(id) as num  from user_identification   where  user_id=? and identity_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['user_id'],$_POST['variation_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row['num'];
			 
		}
		function checkConnection($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$id=$this -> encrypt_decrypt('decrypt',$data['certi_id']); 
			//echo $id;
			$stmt = $dbCon->prepare("select is_connected from user_certificates where id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row['is_connected'];	
		}
		
		function confirmIdentificator($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select count(id) as num  from user_identification   where  user_id=? and identity_number=? and identification_type=? and expiry_month=? and expiry_year=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("isisi", $data['user_id'],$_POST['variation_id'],$_POST['id_type'],$_POST['exp_month'],$_POST['exp_year']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row['num'];
			 
		}
		
		function verifyUserSignIn($data)
		{
			$dbCon = AppModel::createConnection();
			$data['user']=$this->encrypt_decrypt('decrypt',$data['user_id']);
			$SECRET_KEY = 'qloud_login:system';
			
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where id = ?");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row    = $result->fetch_assoc();
			
			$stmt   = $dbCon->prepare("UPDATE user_logins SET `verification_status`=?  WHERE `id`=?");
			$status = 1;
			/* bind parameters for markers */
			$stmt->bind_param("ii", $status, $data['user']);
			
			$stmt->execute();
			if (!$stmt->execute()) {
				$stmt->close();
				$dbCon->close();
				return 0;
				} else {
				
				
				$userid = $row['id'];
				
				// print_r($_COOKIE); die;
				$expire = time() + 60 * 60;
			$token = md5(uniqid(rand(), true)); // generate a token, should be 128 - 256 bit
				//storeTokenForUser($user, $token);
				$cookie = $this -> encrypt_decrypt('encrypt',$userid) . ':' . $token;
				$mac = hash_hmac('sha256', $cookie, $SECRET_KEY);
				$cookie .= ':' . $mac; //echo $cookie; die;
				//$value['cookie']=$cookie;
				//setcookie('rememberme', $cookie, '/');
				session_start();
				$_SESSION['rememberme_qid'] = $cookie;
				 
				 
				 
                    $_SESSION['user_id'] = $row['id'];
                    
                    $date = date('Y-m-d H:i:s');
                    $stmt = $dbCon->prepare("UPDATE user_logins SET `last_login`=? , login_hash=?, email_verification_code=?  WHERE `id`=?");
                    /* bind parameters for markers */
                    $stmt->bind_param("sssi", $date,  $mac, $mac, $_SESSION['user_id']);
                    $stmt->execute();
                   
                        start_Session($row['id']);
						 
						$stmt->close();
				$dbCon->close();
                        return 2;
               
			}
			
		}
		
		function addIndificator($data)
		{
			$dbCon = AppModel::createConnection();
			$data1 = strip_tags($_POST['image-data1']);
			//echo $data; die;
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			$data2 = strip_tags($_POST['image-data3']);
			//echo $data; die;
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name2="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name2.".txt", $data2);
			$st=1;
			$issue_date=$_POST['issue_date'].'/'.$_POST['issue_month'].'/'.$_POST['issue_year'];
			$expiry_date=$_POST['expiry_date'].'/'.$_POST['expiry_month'].'/'.$_POST['expiry_year'];
		   	$stmt = $dbCon->prepare("insert into user_identification(user_id,identification_type,identity_number,issue_month,issue_year,expiry_month, expiry_year,created_on,front_image_path, back_image_path,is_completed,issue_date,expiry_date)
			values(?, ?, ?, ?, ?, ?, ?, now(),?,?,?,?,?)");
			$stmt->bind_param("iissisississ", $data['user_id'],$_POST['identificator'],$_POST['id_number'],$_POST['issue_month'],$_POST['issue_year'],$_POST['expiry_month'],$_POST['expiry_year'],$img_name1,$img_name2,$st,$issue_date,$expiry_date);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
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
		
		function updateEmployeeDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt= $dbCon->prepare("select invited_user_id from invitation where unique_id=? ");//and status=0
			
			$stmt->bind_param("s", $_POST['unique_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_unique = $result->fetch_assoc();
			$request_id= $row_unique['invited_user_id'];
			
			$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code,country_of_residence from user_logins where id=?");
			//echo $query; die;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_id = $result->fetch_assoc();
			//print_r($row_id); die;
			if(!empty($row_unique))
			{
				$request_id= $row_unique['invited_user_id'];
				
				$stmt= $dbCon->prepare("update estore_employee_invite set email=? where id=? ");
				$stmt->bind_param("si", $row_id['email'],$request_id);
				$stmt->execute();
				//echo "jain"; die;
				$stmt= $dbCon->prepare("select invited_emp,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p from estore_employee_invite where id=?");
				//echo $query; die;
				$stmt->bind_param("i", $request_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_emp = $result->fetch_assoc();
				$company=$row_emp['company_id'];
				//print_r($row_emp); die;
				$d=date('Y-m-d');
				
				$stmt= $dbCon->prepare("update invitation set status=1,accepted_date=? where invited_user_id= ?");
				$stmt->bind_param("si", $d,$request_id);
				if($stmt->execute())
				{
					
					$s=0;
					$u=1;
					$stmt= $dbCon->prepare("insert into company_permission (`company_id`,`user_login_id`,`purchase`,`alert`,`supplier`,`customer`,`employee`,`proposal`,`project_proposal`,`create_article`,`import_article`) values (?,?,?,?,?,?,?,?,?,?,?)");
					$stmt->bind_param("iiiiiiiiiii", $company,$row_id['id'],$s,$s,$s,$s,$u,$s,$s,$s,$s);
					//$stmt->execute();
					
					$stmt= $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`) values (?,?,?,?,?,?,?)");
					
					//$company_id."-".$row_id['first_name']."-".$row_id['last_name']."-".$s."-".$row_id['hash_code']."-".$row_id['email']."-".$row_id['id']; die;
					$stmt->bind_param("ississi", $company,$row_id['first_name'],$row_id['last_name'],$s,$row_id['hash_code'],$row_id['email'],$row_id['id']);
					if($stmt->execute())
					{
						
						
						$stmt= $dbCon->prepare("update estore_employee_invite set real_employee_id=? where id=? ");
						$stmt->bind_param("ii", $row_id['id'],$request_id);
						$stmt->execute();
						
						
						$stmt= $dbCon->prepare("select mobile_p,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p from estore_employee_invite where id=?");
						$stmt->bind_param("i", $request_id);
						$stmt->execute();
						$result = $stmt->get_result();
						$row_emp = $result->fetch_assoc();
						$company=$row_emp['company_id'];
						
						$stmt= $dbCon->prepare("update user_logins set dob_day=?,dob_month=?,dob_year=?,dob_day_p=?,dob_month_p=?, dob_year_p=? where id=?");
						$stmt->bind_param("iiiiiii", $row_emp['dob_day_p'],$row_emp['dob_month_p'],$row_emp['dob_year_p'],$row_emp['dob_day_p'],$row_emp['dob_month_p'],$row_emp['dob_year_p'],$row['id']);
						$stmt->execute();
						
						
						
						
						$stmt= $dbCon->prepare("select * from virtual_user_company_profile where company_id=? and invited_user_id=?");
						$stmt->bind_param("ii", $company,$request_id);
						$stmt->execute();
						$result = $stmt->get_result();
						$row_virtual = $result->fetch_assoc();
						
						if(empty($row_virtual))
						{
							$stmt= $dbCon->prepare("insert into user_company_profile (company_id,user_login_id,title,email) values (?,?,?,?)");
							$stmt->bind_param("iiss", $company,$row_id['id'],$row_emp['title'],$row_emp['work_email']);
							$stmt->execute();
						}
						else
						{
							if($row_virtual['job_function']=="" || $row_virtual['job_function']==null)
							{
								$row_virtual['job_function']=1;
							}
							$stmt= $dbCon->prepare("insert into user_company_profile (location_id,job_function,ssn,e_number,description_job,e_type,h_date,res_date,company_id,user_login_id,title,department,phone,mobile,email,fax,skype,facebook,twitter,i_street,i_town,i_city,i_zip,i_country,d_street,d_town,d_city,d_zip,d_country,b_member,mentor,c_id,prospect,partner,supplier) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
							$stmt->bind_param("iissssssiisssssssssssssssssssssssss",$row_virtual['location_id'],$row_virtual['job_function'],$row_virtual['ssn'],$row_virtual['e_number'],$row_virtual['description_job'],$row_virtual['e_type'],$row_virtual['h_date'],$row_virtual['res_date'],$company,$row_id['id'],$row_virtual['title'],$row_virtual['department'],$row_virtual['phone'],$row_virtual['mobile'],$row_virtual['email'],$row_virtual['fax'],$row_virtual['skype'],$row_virtual['facebook'],$row_virtual['twitter'],$row_virtual['i_street'],$row_virtual['i_town'],$row_virtual['i_city'],$row_virtual['i_zip'],$row_virtual['i_country'],$row_virtual['d_street'],$row_virtual['d_town'],$row_virtual['d_city'],$row_virtual['d_zip'],$row_virtual['d_country'],$row_virtual['b_member'],$row_virtual['mentor'],$row_virtual['c_id'],$row_virtual['prospect'],$row_virtual['partner'],$row_virtual['supplier']);
							$stmt->execute();
						}
						
						
						$stmt= $dbCon->prepare("select * from virtual_user_profiles where invited_user_id=?");
						$stmt->bind_param("i", $request_id);
						$stmt->execute();
						$result = $stmt->get_result();
						$row_uvirtual = $result->fetch_assoc();
						
						if(!empty($row_uvirtual))
						{
							$stmt= $dbCon->prepare("select id from user_profiles where user_logins_id=?");
							
							$stmt->bind_param("i", $row_id['id']);
							$stmt->execute();
							$result = $stmt->get_result();
							$row_pro = $result->fetch_assoc();
							$d=date('Y-m-d');
							if(empty($row_pro))
							{
								$stmt= $dbCon->prepare("insert into user_profiles (mobile_p,nation,user_logins_id,created_on,modified_on,summary,zipcode,city,state,country,phone_number,address,marital_status,blog,skype,linkedln,facebook,twitter,instagram) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
								$stmt->bind_param("ssissssssssssssssss", $row_emp['mobile_p'],$row_uvirtual['nation'],$row_id['id'],$d,$d,$row_uvirtual['summary'],$row_uvirtual['zipcode'],$row_uvirtual['city'],$row_uvirtual['state'],$row_uvirtual['country'],$row_uvirtual['phone_number'],$row_uvirtual['address'],$row_uvirtual['marital_status'],$row_uvirtual['blog'],$row_uvirtual['skype'],$row_uvirtual['linkedln'],$row_uvirtual['facebook'],$row_uvirtual['twitter'],$row_uvirtual['instagram']);
								$stmt->execute();
							}
							else 
							{
								$stmt= $dbCon->prepare("update user_profiles set modified_on=?,summary=?,zipcode=?,city=?,state=?,country=?,phone_number=?,address=?,marital_status=?,blog=?,skype=?,linkedln=?,facebook=?,twitter=?,instagram=? where user_logins_id=?");
								$stmt->bind_param("sssssssssssssssi", $d,$row_uvirtual['summary'],$row_uvirtual['zipcode'],$row_uvirtual['city'],$row_uvirtual['state'],$row_uvirtual['country'],$row_uvirtual['phone_number'],$row_uvirtual['address'],$row_uvirtual['marital_status'],$row_uvirtual['blog'],$row_uvirtual['skype'],$row_uvirtual['linkedln'],$row_uvirtual['facebook'],$row_uvirtual['twitter'],$row_uvirtual['instagram'],$row_id['id']);
								$stmt->execute();
							}
						}
						
						
					}
					
				}
				
				
				$fields=array();
				$fields=$row_id;
				$fields['safeqloud']=$request_id;
				$fields['stat']=1;
				//print_r($fields); die;
				$stmt= $dbCon->prepare("delete from  invitation where invited_user_id= ?");
				$stmt->bind_param("i",$request_id);
				//$stmt->execute();
				$stmt= $dbCon->prepare("delete from  estore_employee_invite where id= ?");
				$stmt->bind_param("i",$request_id);
				//$stmt->execute();
				$stmt= $dbCon->prepare("delete from  virtual_user_company_profile where invited_user_id= ?");
				$stmt->bind_param("i",$request_id);
				//$stmt->execute();
				$stmt= $dbCon->prepare("delete from  virtual_user_profiles where invited_user_id= ?");
				$stmt->bind_param("i",$request_id);
				//$stmt->execute();
				$url='https://www.qmatchup.com/beta/user/index.php/Invitation/updateQloud';
				$ch = curl_init();
				//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch,CURLOPT_URL, $url);
			curl_setopt($ch,CURLOPT_POST, count($fields));
			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_REFERER, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, true);
			curl_setopt($ch, CURLOPT_COOKIEFILE, true);
				
				$result=curl_exec ($ch);
				$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			//	echo curl_error($ch);
				//echo $status_code; die;
				curl_close ($ch);
				
				if($result==0)
				{
					//echo "none"; die;
					$stmt->close();
					$dbCon->close();
					return 0;
				}
				else
				{
					//echo "jain"; die;
					$stmt->close();
					$dbCon->close();
					return 1;
				}
			}
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function searchUserDetail($data)
		{
			$dbCon = AppModel::createConnection();
			//print_r($_POST); die;
			$stmt = $dbCon->prepare("select first_name,last_name  from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_user = $result->fetch_assoc();
			
			if(isset($_POST['id']))
			{
				$stmt = $dbCon->prepare("select user_id  from user_passport_logs where id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $_POST['id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				//print_r($row); die;
				if(empty($row))
				{
					return 0;
				}
				else
				{
					$stmt = $dbCon->prepare("select max(id) as v_id from user_passport_logs where user_id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['user_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$row_vid = $result->fetch_assoc();
					//print_r( $row_vid); die;
					if($row_vid['v_id']==$_POST['id'])
					{
						$stmt = $dbCon->prepare("select first_name,last_name,email  from user_logins where id=?");
						
						/* bind parameters for markers */
						$stmt->bind_param("i", $row['user_id']);
						$stmt->execute();
						$result = $stmt->get_result();
						$row_request = $result->fetch_assoc();
						
						$st=3;
						$d=date('Y-m-d h:i:s');
						$stmt = $dbCon->prepare("insert into user_detail_requests(code_type,request_sender,request_receiver,created_on,user_code) values(?,?, ?, ?, ?)");
						
						/* bind parameters for markers */
						//echo $data['user_id']." ".$row['user_id']." ".$d;
						$stmt->bind_param("iiisi", $st,$data['user_id'],$row['user_id'],$d,$_POST['id']);
						$stmt->execute();
						$rsultId=$stmt->insert_id;
						$enc=$this -> encrypt_decrypt('encrypt',$rsultId);
						$to      = $row_request['email'];
						$subject = "safeqloud : Request to access your details";
						
						$emailContent =$row_user['first_name'].' '.$row_user['last_name'].' has requested to access your personal data. Click <a href="https://www.safeqloud.com/user/index.php/PublicUserRequest/requestAccount/'.$enc.'">here</a> to take action </br> If above link does not work, please copy the following link in your browser. </br>https://www.safeqloud.com/user/index.php/PublicUserRequest/requestAccount/'.$enc.'';
						sendEmail($subject, $to, $emailContent);
						
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
			
			else if(isset($_POST['email_id']))
			{
				$stmt = $dbCon->prepare("select id  from user_logins where email=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("s", $_POST['email_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				//print_r($row); die;
				if(empty($row))
				{
					return 0;
				}
				else
				{
					
					$stmt = $dbCon->prepare("select first_name,last_name,email  from user_logins where id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$row_request = $result->fetch_assoc();
					
					
					$d=date('Y-m-d h:i:s');
					$stmt = $dbCon->prepare("insert into user_detail_requests(code_type,request_sender,request_receiver,created_on,user_email) values(?, ?, ?, ?, ?)");
					$st=2;
					/* bind parameters for markers */
					//echo $data['user_id']." ".$row['user_id']." ".$d;
					$stmt->bind_param("iiiss", $st,$data['user_id'],$row['id'],$d,$_POST['email_id']);
					$stmt->execute();
					$rsultId=$stmt->insert_id;
					//echo $rsultId; die;
					$enc=$this -> encrypt_decrypt('encrypt',$rsultId);
					$to      = $row_request['email'];
					$subject = "safeqloud : Request to access your details";
					
					$emailContent =$row_user['first_name'].' '.$row_user['last_name'].' has requested to access your personal data. Click <a href="https://www.safeqloud.com/user/index.php/PublicUserRequest/requestAccount/'.$enc.'">here</a> to take action </br> If above link does not work, please copy the following link in your browser. </br>https://www.safeqloud.com/user/index.php/PublicUserRequest/requestAccount/'.$enc.'';
					sendEmail($subject, $to, $emailContent);
					
					$stmt->close();
					$dbCon->close();
					return 1;
					
				}
			}
			
			else if(isset($_POST['phoneno']))
			{
				$stmt = $dbCon->prepare("select user_logins_id  from user_profiles where country_phone=? and phone_number=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("ss", $_POST['countryname'],$_POST['phoneno']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				//print_r($row); die;
				if(empty($row))
				{
					return 0;
				}
				else
				{
					
					$stmt = $dbCon->prepare("select id,first_name,last_name,email  from user_logins where id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['user_logins_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$row_request = $result->fetch_assoc();
					
					
					$d=date('Y-m-d h:i:s');
					$stmt = $dbCon->prepare("insert into user_detail_requests(code_type,request_sender,request_receiver,created_on,country_user,phone_user) values(?, ?, ?, ?, ?,?)");
					$st=1;
					/* bind parameters for markers */
					//echo $data['user_id']." ".$row['user_id']." ".$d;
					$stmt->bind_param("iiisss", $st,$data['user_id'],$row_request['id'],$d,$_POST['countryname'],$_POST['phoneno']);
					$stmt->execute();
					$rsultId=$stmt->insert_id;
					//echo $rsultId; die;
					$enc=$this -> encrypt_decrypt('encrypt',$rsultId);
					$to      = $row_request['email'];
					$subject = "safeqloud : Request to access your details";
					
					$emailContent =$row_user['first_name'].' '.$row_user['last_name'].' has requested to access your personal data. Click <a href="https://www.safeqloud.com/user/index.php/PublicUserRequest/requestAccount/'.$enc.'">here</a> to take action </br> If above link does not work, please copy the following link in your browser. </br>https://www.safeqloud.com/user/index.php/PublicUserRequest/requestAccount/'.$enc;
					sendEmail($subject, $to, $emailContent);
					
					$stmt = $dbCon->prepare("select country_code,phone_number  from user_profiles left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where user_profiles.user_logins_id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $row_request['id']);
					$stmt->execute();
					$result_phone = $stmt->get_result();
					$row_phone = $result_phone->fetch_assoc();
					
					$phone='+'.trim($row_phone['country_code']).''.trim($row_phone['phone_number']);
					$subject='Informationen om din vän/anhörig';
					$to=$phone;
					$html='Du har blivit ombedd att identifiera dig. Qloud ID https://www.safeqloud.com/user/index.php/PublicUserRequest/requestAccount/'.$enc;
					//echo $html.' '.$to;
					$res=sendSms($subject, $to, $html);
					$stmt->close();
					$dbCon->close();
					return 1;
					
				}
			}
			
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
		
			function userCardDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select card_number,exp_month,exp_year,card_type from user_cards where user_login_id=?");
			
			/* bind parameters for markers */
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
		
		
		function updateLanguage($data)
		{
			$dbCon = AppModel::createConnection();
			//print_r($_POST); die;
			
			$country = strip_tags($_POST['lang_id']);
			$duration = strip_tags($_POST['level_id']);
			$stmt = $dbCon->prepare("select id from user_language where c_id=? and level_id=? and user_login_id=?");
			
			$stmt->bind_param("iii", $country ,$duration ,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($_POST['cv_lang']!=0)
			{
				
				$stmt = $dbCon->prepare("update user_language set level_id=?,c_id=? where id=?");
				$stmt->bind_param("iii", $duration ,$country ,$_POST['cv_lang']);
			}
			else
			{
				$stmt = $dbCon->prepare("insert into user_language(level_id,c_id,user_login_id,created_on)
				values(?, ?, ?, now())");
				$stmt->bind_param("iii", $duration ,$country ,$data['user_id']);
				
			}
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateSSN($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("update user_profiles set ssn=? where user_logins_id=?");
			$stmt->bind_param("si", $_POST['ssn'] ,$data['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select email from user_logins   where user_logins.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$_POST['email']=$row['email'];
			$url='https://www.qmatchup.com/beta/user/index.php/NewPersonal/updateUserSSN';
			
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
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($_POST));
			curl_setopt($ch, CURLOPT_POST, true);
			
			$result=curl_exec ($ch);
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			
			curl_close ($ch);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		
		
		function updateLicence($data)
		{
			$dbCon = AppModel::createConnection();
		   	$duration = strip_tags($_POST['lice_id']);
			$stmt = $dbCon->prepare("select id from user_licence where user_login_id=?");
			
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
				$stmt = $dbCon->prepare("update user_licence set lice_id=? where id=?");
				$stmt->bind_param("ii", $duration ,$row['id']);
			}
			else
			{
				$stmt = $dbCon->prepare("insert into user_licence(lice_id,user_login_id,created_on)
				values(?, ?, now())");
				$stmt->bind_param("ii", $duration,$data['user_id']);
				
			}
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select country_of_residence,country_name,first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image,grading_status,get_started_wizard_status from user_logins left join country on country.id=user_logins.country_of_residence where user_logins.id = ?");
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
		function userResetSummary($data)
		{
			$dbCon = AppModel::createConnection();
			$user_id=$this->encrypt_decrypt('decrypt',$data['user_id']);
			
			$stmt = $dbCon->prepare("select user_logins.id,country_of_residence,country_name,first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image,grading_status,get_started_wizard_status from user_logins left join country on country.id=user_logins.country_of_residence where user_logins.id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		
		
		function updatePhoneNumber($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select first_name,last_name,email,grading_status  from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row_user = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select country_name  from country where id=(select country_of_residence from user_logins where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row_country = $result->fetch_assoc();
			 
			if($_POST['updateSecurity']==1)
			{
				$phv=1;
			}
			else
			{
				$phv=0;
			}
			
			$stmt= $dbCon->prepare("update user_profiles set phone_verified=1,country_phone=?,phone_number=? where user_logins_id= ?");
			$stmt->bind_param("ssi", $row_country['country_name'],$_POST['uphno'],$data['user_id']);
			if($stmt->execute())
			{
			 
				$stmt = $dbCon->prepare("update user_logins set grading_status=1,get_started_wizard_status=1 where id = ?");
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$stmt = $dbCon->prepare("INSERT INTO user_passport_logs (user_id, created_on) VALUES (?, now())");
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				
				$fields=array();
				$fields=$_POST;
				$fields['email']=$row_user['email'];
				$fields['ccountry']=$row_country['country_name'];
					$fields['first_name']=$row['first_name'];
					$fields['last_name']=$row['last_name'];
				
				$posted_value=array();
				$posted_value['posted']= $this -> encrypt_decrypt('encrypt',serialize($fields));
				$url='https://www.qmatchup.com/beta/user/index.php/NewPersonal/updatePhone';
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
		
		function verifyUserDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(user_profiles.id) as num  from user_profiles left join user_logins on user_logins.id=user_profiles.user_logins_id where country_of_residence=(select country_of_residence from user_logins where id=?) and phone_number=? and user_profiles.user_logins_id!=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("isi",$data['user_id'], $_POST['phoneno'],$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select country_code  from phone_country_code where country_name=(select country_name from country where id=(select country_of_residence from user_logins where id=?))");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$phone="+".trim($row['country_code'])."".trim($_POST['phoneno']);
			$num=(mt_rand(1111111,9999999)); 
			$subject='Your one time password(OTP) is:'.$num;
			$to=$phone;
			$html='Ditt engångslösenord:'.$num;
			$res=sendSms($subject, $to, $html);
			 
			$rs=json_decode($res,true);
			
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
			else 
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		}
		
		function sendVerificationCode($data)
		{
			$dbCon = AppModel::createConnection();
			$data['user']=$this->encrypt_decrypt('decrypt',$data['user_id']);
			$stmt = $dbCon->prepare("select phone_number  from user_profiles  where user_profiles.user_logins_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$data['user']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("select country_code  from phone_country_code where country_name=(select country_name from country where id=(select country_of_residence from user_logins where id=?))");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowC = $result->fetch_assoc();
			$phone="+".trim($rowC['country_code'])."".trim($row['phone_number']);
			$num=(mt_rand(1111111,9999999)); 
			$subject='Your one time password(OTP) is:'.$num;
			$to=$phone;
			$html='Ditt engångslösenord:'.$num;
			$res=sendSms($subject, $to, $html);
			$rs=json_decode($res,true);
			$stmt = $dbCon->prepare("insert into verify_user_phone (otp,created_on) values(?, now())");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $num);
				$stmt->execute();
				$id=$stmt->insert_id;
				$stmt->close();
				$dbCon->close();
				return $id;
			
		}
		
		
		function verifyUserDetailOldPhone($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(user_profiles.id) as num  from user_profiles left join user_logins on user_logins.id=user_profiles.user_logins_id where country_of_residence=(select country_of_residence from user_logins where id=?) and phone_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is",$data['user_id'], $_POST['phoneno']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select country_code  from phone_country_code where country_name=(select country_name from country where id=(select country_of_residence from user_logins where id=?))");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$phone="+".trim($row['country_code'])."".trim($_POST['phonenoold']);
			$num=(mt_rand(1111111,9999999)); 
			$subject='Your one time password(OTP) is:'.$num;
			$to=$phone;
			$html='Ditt engångslösenord:'.$num;
			$res=sendSms($subject, $to, $html);
			$rs=json_decode($res,true);
			 
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
		
		
			function verifyOtpUpdate($data)
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
			$stmt = $dbCon->prepare("update user_profiles set phone_verified=1 where user_logins_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
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
		
		
		function userProfileSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select ssn,summary,phone_verified	from user_profiles where user_logins_id =?");
			
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
		
		function userBankid($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num	from bankid_verified where bank_id =(select ssn from user_profiles where user_logins_id=?)");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row['num'];
			
		}
		
		function licenceDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,lice_id from user_licence where user_login_id=?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			// print_r($row); die;
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		function userLanguageCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num from user_language where user_login_id=?");
			
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			return $row;
			$stmt->close();
			$dbCon->close();
			
		}
		
		
		
		function languageDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select user_language.id,c_id,level_id,country_name from user_language left join country on user_language.c_id=country.id where user_login_id=?");
			
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
		
		
		
		function activeEmployeeRequests($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select company_name,count(employee_request.id) as total from employee_request left join companies on employee_request.company_id=companies.id where employee_request.user_login_id =? and status=0 group by employee_request.user_login_id");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
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
		
		function completedStudentRequests($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select company_id,company_name from employees left join companies on employees.company_id=companies.id where employees.user_login_id = ? and o_type=2");
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
		
		
		
		function activeStudentRequests($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			
			
			
			$stmt = $dbCon->prepare("select company_name,count(student_request.id) as total from student_request left join companies on student_request.company_id=companies.id where student_request.user_login_id =? and status=0 group by student_request.user_login_id");
			
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
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
		
		
		
		function completedTenantRequests($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select company_id,company_name from employees left join companies on employees.company_id=companies.id where employees.user_login_id = ? and o_type=3");
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
		
		
		
		function activeTenantRequests($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			
			
			$stmt = $dbCon->prepare("select company_name,count(ctenant_request.id) as total from ctenant_request left join companies on ctenant_request.company_id=companies.id where ctenant_request.user_login_id =? and status=0 group by ctenant_request.user_login_id");
			
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
			}
			
			
			$stmt = $dbCon->prepare("select company_name,count(ptenant_request.id) as total from ptenant_request left join companies on ptenant_request.company_id=companies.id where ptenant_request.user_login_id =? and status=0 group by ptenant_request.user_login_id");
			
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
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
		
		
		
		function connectAccountDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select id,company_name from user_employer_connect where user_login_id=? and aproval_status=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$org=array();
			while($row1 = $result1->fetch_assoc())
			{
				array_push($org,$row1);
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function connectAccount($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select id,company_email from companies where company_name = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("s", $data['cname']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
				
				// echo "hello";
				$stmt = $dbCon->prepare("select id from user_employer_connect where company_name = ? and user_login_id=?");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("si", $data['cname'],$data['user_id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if(empty($row1))
				{
					
					$stmt = $dbCon->prepare("select id from employees where company_id = ? and user_login_id=?");
					/* bind parameters for markers */
					$cont=1;
					
					$stmt->bind_param("ii", $row['id'],$data['user_id']);
					$stmt->execute();
					$result2 = $stmt->get_result();
					$row2 = $result2->fetch_assoc();
					
					if(empty($row2))
					{
						$ast=0;
					}
					else
					{
						$ast=1;
					}
					//echo $ast; die;
					$stmt = $dbCon->prepare("insert into user_employer_connect (company_name,company_id,user_login_id,created_on,`aproval_status` ) values(?,?,?,now(),?)");
					/* bind parameters for markers */
					$cont=1;
					$stmt->bind_param("siii", $data['cname'],$row['id'],$data['user_id'],$ast);
					$stmt->execute();
					$company_id=$row['id'];
					$stmt = $dbCon->prepare("select company_name,company_email from companies where id=?");
					$stmt->bind_param("i", $company_id);
					$stmt->execute();
					$result = $stmt->get_result();
					
					$row_c=$result->fetch_assoc();
					$c_id =$this -> encrypt_decrypt('encrypt',$row['id']);
					//echo $c_id; die;
					$u_id= $this -> encrypt_decrypt('encrypt',$data['user_id']);
					$stmt = $dbCon->prepare("select * from employees where user_login_id=? and company_id=?");
					$stmt->bind_param("ii", $data['user_id'],$company_id);
					$stmt->execute();
					$result = $stmt->get_result();
					$row_emp=$result->fetch_assoc();
					
					$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name from user_logins where id = ?");
					/* bind parameters for markers */
					$cont=1;
					$stmt->bind_param("i", $data['user_id']);
					$stmt->execute();
					$resultuser = $stmt->get_result();
					$username = $result->fetch_assoc();
					
					if(!$row_emp)
					{	
						$d=date('Y-m-d');
						$stmt = $dbCon->prepare("insert into employee_request(`company_id`,`user_login_id`,`created_date`,`modified_date`) values(?, ?, ?, ?)");
						$stmt->bind_param("iiss", $company_id,$data['user_id'],$d,$d);
						if($stmt->execute())
						{
							$to = $row_c['company_email'];
							$subject = "Telezales - Employee Request";
							$emailContent =$username['name'].'  is requesting for an employee profile page for '.$row_c['company_name'].'. To approve/reject click on following link :<a href="https://www.safeqloud.com/company/index.php/EmployeeRequest/locationShow/'.$c_id.'">Click here</a>';
							$from = "admin@telezales.com";
							$headers = "MIME-Version: 1.0 \r\n";
							$headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
							//echo $emailContent; die;
							sendEmail($subject, $to, $emailContent  );
							//echo $emailContent; die;
						}
						
					}
					else
					
					{
						$to = $username['email'];
						$subject = "Telezales - Employee Approval/Rejection";
						$emailContent ='Your are already a employee of the same company and click following link to view your employee profile page:<a href="https://www.safeqloud.com/user_company_detail.php?id='.$c_id.'">Click here</a>';
						$from = "admin@telezales.com";
						$headers = "MIME-Version: 1.0 \r\n";
						$headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
						sendEmail($subject, $to, $emailContent  );
						
						
					}
					
					$stmt->close();
					$dbCon->close();
					return 1;
				}
			}
			else 
			{
				$stmt = $dbCon->prepare("select id from virtual_company where company_name = ?");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("s", $data['cname']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				if(!empty($row))
				{
					$stmt = $dbCon->prepare("select id from user_employer_connect where company_name = ? and user_login_id=?");
					/* bind parameters for markers */
					$cont=1;
					$stmt->bind_param("si", $data['cname'],$data['user_id']);
					$stmt->execute();
					$result1 = $stmt->get_result();
					$row1 = $result1->fetch_assoc();
					if(empty($row1))
					{
						$stmt = $dbCon->prepare("insert into user_employer_connect (company_name,virtual_id,user_login_id,created_on) values(?,?,?,now())");
						/* bind parameters for markers */
						$cont=1;
						$stmt->bind_param("sii", $data['cname'],$row['id'],$data['user_id']);
						$stmt->execute();  
					}
					
				}
				else
				{
					$stmt = $dbCon->prepare("insert into virtual_company (company_name) values(?)");
					/* bind parameters for markers */
					$cont=1;
					$stmt->bind_param("s", $data['cname']);
					$stmt->execute(); 
					
					$stmt = $dbCon->prepare("select id from virtual_company where company_name = ?");
					/* bind parameters for markers */
					$cont=1;
					$stmt->bind_param("s", $data['cname']);
					$stmt->execute();
					$result = $stmt->get_result();
					$row = $result->fetch_assoc();
					
					$stmt = $dbCon->prepare("select id from user_employer_connect where company_name = ? and user_login_id=?");
					/* bind parameters for markers */
					$cont=1;
					$stmt->bind_param("si", $data['cname'],$data['user_id']);
					$stmt->execute();
					$result1 = $stmt->get_result();
					$row1 = $result->fetch_assoc();
					
					if(empty($row1))
					{
						$stmt = $dbCon->prepare("insert into user_employer_connect (company_name,virtual_id,user_login_id,created_on) values(?,?,?,now())");
						/* bind parameters for markers */
						$cont=1;
						$stmt->bind_param("sii", $data['cname'],$row['id'],$data['user_id']);
						$stmt->execute(); 
						
					}
					
					$stmt->close();
					$dbCon->close();
					return 1;
					
				}
				
				$stmt->close();
				$dbCon->close();
				return 1;
				
			}
			
			
			
		}
		
		function connectCompany($data)
		{
			$dbCon = AppModel::createConnection();
			$st=1;
			$p=$data['name']."%";
            $stmt   = $dbCon->prepare("select company_name from companies where o_type=? and email_verification_status=? and company_name like ?");
            $status = 1;
            /* bind parameters for markers */
            $stmt->bind_param("iis", $st,$st,$p);
            
            $stmt->execute();
			$result = $stmt->get_result();	
			$output="";
			while( $row = $result->fetch_assoc())
			{
				$output = $output. '<option value="'.$row['company_name'].'">';
			}
			$stmt   = $dbCon->prepare("select company_name from virtual_company where company_name like ?");
            $status = 1;
            /* bind parameters for markers */
            $stmt->bind_param("s", $p);
            
            $stmt->execute();
			$result = $stmt->get_result();	
			while( $row = $result->fetch_assoc())
			{
				$output = $output. '<option value="'.htmlspecialchars_decode($row['company_name']).'">';
			}
            
			$stmt->close();
			$dbCon->close();
			
			return $output;
		}
		
		function connectCompanyCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$p='%'.$data['name']."%";
            $stmt   = $dbCon->prepare("select count(id) as num from companies where company_name like ?");
            $status = 1;
            /* bind parameters for markers */
            $stmt->bind_param("s", $p);
            
            $stmt->execute();
			$result = $stmt->get_result();	
			
			$row = $result->fetch_assoc();
			$a=0;
			$a=$a+$row['num'];
			$stmt   = $dbCon->prepare("select count(id) as num from virtual_company where company_name like ?");
            $status = 1;
            /* bind parameters for markers */
            $stmt->bind_param("s", $p);
            
            $stmt->execute();
			$result1 = $stmt->get_result();	
			$row1 = $result1->fetch_assoc();
			$a=$a+$row1['num'];
			$stmt->close();
			$dbCon->close();
			
			return $a;
		}
		
		function userAccount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,first_name,last_name,sex,dob_day,dob_month,dob_year,created_on,email  from user_logins where id=?");
			
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
			$stmt = $dbCon->prepare("select country_code,ssn,address,country,city,zipcode,phone_number,clearing_number,bank_account_number,language,country_phone,phone_verified from user_profiles left join phone_country_code on user_profiles.country_phone=phone_country_code.country_name  where user_logins_id=?");
			
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
		
		function updateAddress($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("update user_profiles set address=?  where user_logins_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("si", $data['cid'],$data['user_id']);
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
		
		function userEducation($data)
		{
			
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select user_educations.id,country.country_name,duration,country.id as c_id,school.name as school,school.id as s_id, class.name as degree,class.id as cl_id,field,grade,duration_start,duration_end,activities,description 
			from user_educations left join country on user_educations.country_id=country.id left join school on user_educations.school=school.id left join class on user_educations.degree=class.id where user_logins_id = ?  AND user_educations.is_deleted=0 order by duration_start desc");
			
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
		
		function userCountry($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name from country where is_visible=?");
			
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("i", $cont);
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
		
		
		function userSchool($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,name from school");
			
			/* bind parameters for markers */
			$cont=0;
			// $stmt->bind_param("i", $cont);
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
		
		
		function userClass($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,name from class");
			
			/* bind parameters for markers */
			$cont=0;
			// $stmt->bind_param("i", $cont);
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
		
		function updateUserSummary($data)
		{
			$dbCon = AppModel::createConnection();
			$text_summery = addslashes($_POST['summery_text']);
			$stmt = $dbCon->prepare("select count(id) as num
			from user_profiles where user_logins_id =?");
			
			/* bind parameters for markers */
			$cont=date('Y-m-d');
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
				$stmt = $dbCon->prepare("insert into user_profiles (user_logins_id,summary,created_on,modified_on) values (?, ?, ?, ?)");
				
				/* bind parameters for markers */
				
				$stmt->bind_param("isss", $data['user_id'],$text_summery,$cont,$cont);
				$stmt->execute();
			}
			else
			{
				$stmt = $dbCon->prepare("update user_profiles set summary=? where user_logins_id=?");
				
				
				$stmt->bind_param("si", $text_summery,$data['user_id']);
				$stmt->execute();
			}
			$stmt->close();
			$dbCon->close();
			
		}
		
		
		function removeExp($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("delete from user_employements where id=?");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("i", $data['exp']);
			if($stmt->execute())
			{
				$stmt = $dbCon->prepare("delete from user_exp_verified where user_exp_id=?");
				
				/* bind parameters for markers */
				
				$stmt->bind_param("i", $data['exp']);
				if($stmt->execute())
				{
					return 0;
				}
			}
			
			$stmt->close();
			$dbCon->close();
			
		}
		
		function removeEdu($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("delete from user_educations where id=?");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("i", $data['edu']);
			if($stmt->execute())
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			
			
			$stmt->close();
			$dbCon->close();
			
		}
		
		function removeLicence($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("delete from user_licence where id=?");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("i", $data['lice']);
			if($stmt->execute())
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			$stmt->close();
			$dbCon->close();
			
		}
		
		function removeLanguage($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("delete from user_language where id=?");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("i", $data['lang']);
			if($stmt->execute())
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			$stmt->close();
			$dbCon->close();
			
		}
		
		
		
		
		function updateEducation($data)
		{
			$dbCon = AppModel::createConnection();
			if(isset($_POST['cv_edu']))
			{
				$school = strip_tags($_POST['cv_school']);
				//$field = strip_tags($_POST['cv_field']);
				//$grade = strip_tags($_POST['cv_grade']);
				//$activities = strip_tags($_POST['cv_activity']);
				$start_year = strip_tags($_POST['cv_school_start']);
				$degree = strip_tags($_POST['cv_degree']);
				$end_year = strip_tags($_POST['cv_school_end']);
				//$description = strip_tags($_POST['cv_descp']);
				$country = strip_tags($_POST['country_id']);
				$duration = strip_tags($_POST['duration']);
				$stmt = $dbCon->prepare("select id from user_educations where country_id=? and degree =? and school=? and user_logins_id=?");
				$stmt->bind_param("iiii", $country,$degree,$school,$data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$edu_row_cv = $result->fetch_assoc();
				
				
				
				if($_POST['cv_edu']!=0)
				{
					$stmt = $dbCon->prepare("update user_educations set duration=?,country_id=?,school=?, degree=?,duration_start=?,duration_end=? where id=?");
					$stmt->bind_param("iiiissi", $duration,$country,$school,$degree,$start_year,$end_year,$_POST['cv_edu']);
					if(!$stmt->execute())
					{
						echo '<script>alert("Some error occurred, Please report to web admin")</script>';
					}
					else
					{
						$is_sucessfull=9;
					}
				}
				else
				{
					$stmt = $dbCon->prepare("insert into user_educations(duration,country_id,user_logins_id,school,degree,duration_start,duration_end)
					values(?,?,?,?,?,?,?)");
					$stmt->bind_param("iiiiiss", $duration,$country,$data['user_id'],$school,$degree,$start_year,$end_year);
					if(!$stmt->execute())
					{
						echo '<script>alert("Some error occurred, Please report to web admin")</script>';
					}
					else
					{
						$is_sucessfull=10;
					}
				}
			}
			return 0;
			$stmt->close();
			$dbCon->close();
		}
		
		function updateUserExperience($data)
		{
			$dbCon = AppModel::createConnection();
			
			if(isset($_POST['comp_experiance']))
			{
				$company = htmlentities(strip_tags($_POST['com_name']),ENT_NOQUOTES, 'ISO-8859-1');
				$title = htmlentities(strip_tags($_POST['com_title']),ENT_NOQUOTES, 'ISO-8859-1');
				$location = htmlentities(strip_tags($_POST['com_loc']),ENT_NOQUOTES, 'ISO-8859-1');
				$start_month = strip_tags($_POST['com_start_month']);
				$start_year = strip_tags($_POST['com_start_year']);
				$end_month = strip_tags($_POST['com_end_month']);
				$end_year = strip_tags($_POST['com_end_year']);
				$description =strip_tags(addslashes($_POST['com_desc']));
				$r_email =strip_tags($_POST['r_email']);
				$current=0;
				
				//echo str_word_count($description); die;
				// $exp_row = $_POST['comp_experiance_loop'];
				$date=date('Y-m-d H:i:s');
				if($_POST['comp_experiance'] != null)
				{
					$comp_experiance=strip_tags($_POST['comp_experiance']);
					$stmt = $dbCon->prepare("select id from user_employements where id=? and user_logins_id=?");
					
					
					$stmt->bind_param("si", $comp_experiance,$data['user_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$exp_row = $result->fetch_assoc();
					if($exp_row)
					{
						if(isset($_POST['com_current']))
						{
							$current=1;
							$stmt = $dbCon->prepare("update user_employements set current_job = 0 where user_logins_id =?");
							$stmt->bind_param("i", $data['user_id']);
							$stmt->execute();
							
							$end_month='12';
							$end_year='2100';
						}
						$stmt = $dbCon->prepare("update user_employements set  company_name=?,location=?,title=?,duration_start_month=?,duration_start=?,duration_end_month=?,duration_end=?,current_job=?,description=?,r_email=? where id=?");
						$stmt->bind_param("sssssisissi", $company,$location,$title,$start_month,$start_year,$end_month,$end_year,$current,$description,$r_email,$exp_row['id']);
						$stmt->execute();
						
						if(!$stmt->execute())
						{
							echo '<script>alert("Some error occurred, Please report to web admin")</script>';
						}
						else
						{
							$is_sucessfull=6;
						}
						
					}
				}				
				else
				{
					$hash = md5(json_encode($_POST));
					if ( ( isset($_SESSION['hash']) ) && ( $_SESSION['hash'] == $hash) ) {
						$is_sucessfull=100;
					}
					else
					{     
						$_SESSION['hash'] = $hash; 
						
						if(isset($_POST['com_current']))
						{
							$current=1;
							$stmt = $dbCon->prepare("update user_employements set current_job = 0 where user_logins_id =?");
							$stmt->bind_param("i", $data['user_id']);
							$stmt->execute();
							
							$end_year='2100';
							$end_month='12';
						}
						
						$stmt = $dbCon->prepare("insert into user_employements(user_logins_id,company_name,location,title,duration_start_month,duration_start,duration_end_month,duration_end,current_job,description,r_email,created_on) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
						$stmt->bind_param("isssssisisss", $data['user_id'],$company,$location,$title,$start_month,$start_year,$end_month,$end_year,$current,$description,$r_email,$date);
						//$stmt->execute();
						
						
						if(!$stmt->execute())
						{
							echo '<script>alert("Some error occurred, Please report to web admin")</script>';
							
						}
						
						else
						{
							$stmt = $dbCon->prepare("select user_employements.id,r_email,concat_ws(' ', first_name, last_name) as name from user_employements left join user_logins on user_logins.id=user_employements.user_logins_id where user_employements.created_on=? and user_logins_id=?");
							$stmt->bind_param("si", $date,$data['user_id']);
							$stmt->execute();
							$result1 = $stmt->get_result();
							$row_id = $result1->fetch_assoc();
							
							if($r_email=="" || $r_email==null)
							{
								$total_points=0;
								
							}
							else
							{
								$total_points=0;
							}
							
							if(str_word_count($description)>0)
							{
								$desc_point=2;
							}
							else 
							{
								$desc_point=0;
							}
							$p=2;
							$stmt = $dbCon->prepare("insert into user_exp_verified (user_exp_id,unverified_title,unverified_company,unverified_location,unverified_period,unverified_description,unverified_remail) values(?, ?, ?, ?, ?, ?, ?)");
							$stmt->bind_param("iiiiiii", $row_id['id'],$p,$p,$p,$p,$desc_point,$total_points);
							//$stmt->execute();
							
							
							if(!$stmt->execute())
							{
								echo '<script>alert("Some error occurred, Please report to web admin")</script>';
								
							}
							
							else 
							{
								if($r_email!="" || $r_email!=null)
								{
									$encrypted= $this -> encrypt_decrypt('encrypt',$row_id['id']);
									$to=$r_email;
									$subject = "Verify The user Experience Details";
									$emailContent = $row_id['name'].' has updated his experience record with us. Please <a href="www.qmatchup.com/beta/verify_title.php?id='.$encrypted.'">verify</a>';
									$from = "admin@telezales.com";
									$headers = "MIME-Version: 1.0 \r\n";
									$headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
									//echo $emailContent; die;
									//sendEmail($subject, $to, $emailContent);
								}
								$is_sucessfull=5;
							}
						}
						
						
					}
					
					
				}
				
				$stmt->close();
				$dbCon->close();
				
			}
			
			
			
			
		}
		function selectCompany($val)
		{
			$dbCon = AppModel::createConnection();
			$val['sid']=str_ireplace("%20"," ",$val['sid']);
			$stmt = $dbCon->prepare("select company_name from companies where company_name like ?");
			
			/* bind parameters for markers */
			$cont="%".$val['sid']."%";
			//echo $cont; die;
			$stmt->bind_param("s", $cont);
			$stmt->execute();
			$result = $stmt->get_result();
			$contry = array();
			while ($row = $result->fetch_assoc()) {
				
				array_push($contry, $row);
			}
			
			$stmt->close();
			$dbCon->close();
			return $contry;
		}
		
		function userExp($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select r_email,user_employements.id as cv_com_id,company_name,location,title,duration_start_month,duration_start,duration_end_month,duration_end,current_job,description
			from user_employements where user_employements.user_logins_id =? AND user_employements.is_deleted=? order by duration_end desc,duration_end_month desc,duration_start desc");
			
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("ii", $data['user_id'],$cont);
			$stmt->execute();
			$result = $stmt->get_result();
			$expr=array();
			while($row = $result->fetch_assoc())
			{
				array_push($expr,$row);
			}
			return $expr;
			$stmt->close();
			$dbCon->close();
			
		}
		
		function userExpCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(user_employements.id ) as num from user_employements where user_employements.user_logins_id =? AND user_employements.is_deleted=?");
			
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("ii", $data['user_id'],$cont);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			return $row;
			$stmt->close();
			$dbCon->close();
			
		}
		
		
		function userEduCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id ) as num from user_educations where user_logins_id =? AND is_deleted=?");
			
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("ii", $data['user_id'],$cont);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			return $row;
			$stmt->close();
			$dbCon->close();
			
		}
		
		function selectSchool($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,name from class where school_id=?");
			
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("i", $data);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
			}
			// print_r($row); die;
			return $org;
			$stmt->close();
			$dbCon->close();
			
		}
		
		function countrySelect($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,name  from school where country_id=?");
			
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("i", $data);
			$stmt->execute();
			$result = $stmt->get_result();
			$contry = array();
			while ($row = $result->fetch_assoc()) {
				
				array_push($contry, $row);
			}
			return $contry;
			$stmt->close();
			$dbCon->close();
			
		}
		
		function selectCountry()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name,country_code from phone_country_code order by country_code");
			
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$contry = array();
			while ($row = $result->fetch_assoc()) {
				
				array_push($contry, $row);
			}
			
			$stmt->close();
			$dbCon->close();
			return $contry;
		}
		
		function selectState($cont)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt  = $dbCon->prepare("select id,state_name from state where country_id=? and is_visible= ? order by state_name");
			
			/* bind parameters for markers */
			$cont1=0;
			$stmt->bind_param("ii", $cont ,$cont1);
			$stmt->execute();
			$resultState = $stmt->get_result();
			$stat        = array();
			while ($row = $resultState->fetch_assoc()) {
				
				array_push($stat, $row);
			}
			
			// print_r($stat); die;
			
			return $stat;
			
			
			$stmt->close();
			$dbCon->close();
			
		}
		
		
		
		
		function selectCity($cont)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("SELECT id,city_name FROM cities WHERE state_id= ? and is_visible= ? order by city_name");
			$cont1=0;
			/* bind parameters for markers */
			
			$stmt->bind_param("ii", $cont['sid'], $cont1);
			$stmt->execute();
			$result = $stmt->get_result();
			$org    = array();
			while ($row = $result->fetch_assoc()) {
				
				array_push($org, $row);
			} 
			return $org;
			$stmt->close();
			$dbCon->close();
			
		}
		
		function selectDistrict($cont)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("SELECT id,district_name FROM district WHERE city_id= ?  and is_visible= ? order by district_name");
			$cont1=0;
			/* bind parameters for markers */
			
			$stmt->bind_param("ii", $cont['sid'], $cont1);
			$stmt->execute();
			$result = $stmt->get_result();
			$org    = array();
			while ($row = $result->fetch_assoc()) {
				
				array_push($org, $row);
			} 
			return $org;
			$stmt->close();
			$dbCon->close();
			
		}
		
		
	}	