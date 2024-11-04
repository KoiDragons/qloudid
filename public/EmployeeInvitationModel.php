<?php
	require_once('../AppModel.php');
	class EmployeeInvitationModel extends AppModel
	{
		 
		function approveBrokerInvitation($data)
		{
			$dbCon = AppModel::createConnection();
			$a_id= $this -> encrypt_decrypt('decrypt',$data['a_id']);
			
			if($data['user_id']==43)
			{
				$data['admin_id']=$data['user_id'];
				$user_admin=1;
			}
			else
			{
				$data['admin_id']=43;
				$user_admin=0;
			}
			 
			$stmt = $dbCon->prepare("select email,country_of_residence from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$userEmail=$row['email'];
			$_POST['country']=$row['country_of_residence'];
			if($_POST['country']=='')
			{
				$_POST['country']=$_POST['pcountry'];
			}
			 
			$stmt = $dbCon->prepare("select company_id,company_email from companies left join company_profiles on company_profiles.company_id=companies.id where cid=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['cid']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCompany = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("select country_code,country_name from phone_country_code where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_country = $result->fetch_assoc();
			 
			
			 if(empty($rowCompany))
			 {
			$_POST['company_email']=$_POST['cid'].'.'.$row_country['country_code'].'@qloudid.com';
			$email=$_POST['company_email'];
			$_POST['adrs1']=$_POST['daddress'];
			$_POST['port_number']=$_POST['d_port_number'];
			$name=htmlentities($_POST['company_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$street_address=htmlentities($_POST['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
			$city=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
			
			
			$_POST['position_type']=1;
			$web='';
			$st=1;
			$stmt = $dbCon->prepare("insert into companies(company_type,o_type,country_id,user_login_id,company_name,company_email,website,hash_code,created_date,email_verification_status,created_by,user_role,is_landloard_signup,domain_id) 
			values(?, ?, ?, ?, ?, ?, ?, ?, now(), ?, ?, ?,?,?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiiissssiiiii", $_POST['company_type'],$st, $_POST['country'], $data['admin_id'], $name, $email, $web, $hash_code,$st,$data['user_id'],$_POST['position_type'],$st,$domain_id);
			
			
			if (!$stmt->execute()) {
				$stmt->close();
				$dbCon->close();
				return 0;
			} 
			else 
			{
				$id=$stmt->insert_id;
				if(isset($_POST['refrence_name']))
				{
					$_POST['refrence_name']=htmlentities($_POST['refrence_name'],ENT_NOQUOTES, 'ISO-8859-1');
					$stmt = $dbCon->prepare("update companies set refrence_name=? where id=?");
					$stmt->bind_param("si", $_POST['refrence_name'],$communityid,$id);
					$stmt->execute();
				}
				if($_POST['company_type']==2)
				{
					$_POST['phone_number']=$_POST['pnumber'];
					$description='';
					$_POST['entry_type']=0;
					$entry_code='';
					$stmt = $dbCon->prepare("insert into landloard_society (company_id, society_name,created_on,street_address,port_number,zipcode,city,country_id,phone_country_id,phone_number,email,description,entry_type,entry_code,wifi_available,wifi_username,wifi_password) values (?, ?, now(),?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
					$stmt->bind_param("isssssiisssisiss", $id,$name,$street_address,$_POST['d_port_number'],$_POST['dzip'],$city,$_POST['country'],$_POST['country'],$_POST['phone_number'],$email,$description,$_POST['entry_type'],$entry_code,$_POST['entry_type'],$entry_code,$entry_code);
					$stmt->execute();	
					$communityid=$stmt->insert_id;
					
					
					$stmt = $dbCon->prepare("select *  from community_aminity_info");
					$stmt->execute();
					$result = $stmt->get_result();
					while($rowAvailable = $result->fetch_assoc())
					{
					$stmt = $dbCon->prepare("INSERT INTO community_aminity_detail (society_id, amenity_id) VALUES (?, ?)");
					$stmt->bind_param("ii", $communityid,$rowAvailable['id']);
					$stmt->execute();	
					}
					
					
					$select1="select * from community_rules";
			  
					$result1=mysqli_query($dbCon, $select1); 
				 
					 while($row1=mysqli_fetch_array($result1))  
					 { 
						
						$stmt = $dbCon->prepare("insert into `landloard_society_rules`(society_id,rule_id) values (?,?)");
						/* bind parameters for markers */
						$stmt->bind_param("ii",$communityid,$row1['id']);
						$stmt->execute();
						$id1=$stmt->insert_id;
						
						$select2="select * from community_sub_rules where rule_id=".$row1['id'];
			  
						$result2=mysqli_query($dbCon, $select2); 
					 
						 while($row2=mysqli_fetch_array($result2))  
						 { 
							
						$stmt = $dbCon->prepare("insert into `landloard_society_subrules`(society_rule_id,subrule_id) values (?,?)");
						/* bind parameters for markers */
						$stmt->bind_param("ii",$id1,$row2['id']);
						$stmt->execute();	 
							
						 }
						
					 }
				}					
			
			$address=$_POST['daddress'].' '.$_POST['d_port_number'];
  
			$url = "http://api.locationiq.com/v1/autocomplete.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&q=".$address;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			if(isset($response['error']))
			{
			$address=$_POST['dcity'].' '.$_POST['d_port_number'];	
			$url = "http://api.locationiq.com/v1/autocomplete.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&q=".$address;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			}
			 
		$street_address=	htmlentities($_POST['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
				$stmt = $dbCon->prepare("insert into company_profiles(latitude,longitude,`company_id`,address,cid,created_on,modified_on,port_number,phone) values(?,?,?, ?, ?,now(),now(),?,?)");
				
				$stmt->bind_param("ssissss", $response[0]['lat'],$response[0]['lon'],$id, $street_address,$_POST['cid'],$_POST['d_port_number'],$_POST['phone_number']);
				$stmt->execute();
				
				
				$stmt = $dbCon->prepare("insert into user_company_profile(`company_id`,`user_login_id`) values(?, ?)");
				
				$stmt->bind_param("ii", $id, $data['admin_id']);
				$stmt->execute();
				$data['location']='Headquarter';
				$stmt = $dbCon->prepare("insert into location (company_id,country_id,location,created_on) values (?, ?, ?, now())");
				
				$stmt->bind_param("iis", $id, $_POST['country'],  $data['location']);
				$stmt->execute();
				$locationrow = $stmt->insert_id;
				
				$stmt        = $dbCon->prepare("insert into warehouse(`company_id`,`location_id`,`created_on`) values (?, ?, now())");
				
				$stmt->bind_param("ii", $id, $locationrow);
				$stmt->execute();
				$stmt->close();
				
				$stmt = $dbCon->prepare("select first_name,last_name,email,email_verification_code from user_logins where id=?");
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result  = $stmt->get_result();
				$userrow = $result->fetch_assoc();
				
				$stmt       = $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`,`created_by`) values(?, ?, ?, ?, ?, ?, ?, ?)");
				$status_emp = 0;
				$stmt->bind_param("ississii", $id, $userrow['first_name'], $userrow['last_name'], $status_emp, $userrow['email_verification_code'], $userrow['email'], $data['user_id'], $data['user_id']);
				$stmt->execute();
				$admin=$stmt->insert_id;
				if($user_admin==0)
				{
					$stmt = $dbCon->prepare("insert into user_company_profile(`company_id`,`user_login_id`) values(?, ?)");
					
					$stmt->bind_param("ii", $id, $data['user_id']);
					$stmt->execute();
					
					$stmt = $dbCon->prepare("select first_name,last_name,email,email_verification_code from user_logins where id=?");
					$stmt->bind_param("i", $data['admin_id']);
					$stmt->execute();
					$result  = $stmt->get_result();
					$adminrow = $result->fetch_assoc();
					
					$stmt       = $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`,`created_by`) values(?, ?, ?, ?, ?, ?, ?, ?)");
					$status_emp = 0;
					$stmt->bind_param("ississii", $id, $adminrow['first_name'], $adminrow['last_name'], $status_emp, $adminrow['email_verification_code'], $adminrow['email'], $data['admin_id'], $data['user_id']);
					$stmt->execute();
					$super_admin=$stmt->insert_id;
					
					$stmt = $dbCon->prepare("insert into manage_employee_permissions (is_admin, employee_id, permission, user_id, company_id, page_id, created_date, modified_date ) values(?, ?, ?, ?, ?, ?, now(),now())");
					/* bind parameters for markers */
					$cont=1;
					$stmt->bind_param("iiiiii",$cont,$super_admin,$cont,$data['admin_id'],$id,$cont);
					$stmt->execute();
					
				
						$stmt = $dbCon->prepare("insert into manage_employee_permissions (is_admin, employee_id, permission, user_id, company_id, page_id, created_date, modified_date ) values(?, ?, ?, ?, ?, ?, now(),now())");
						$is_admin=1;
						$stmt->bind_param("iiiiii",$is_admin,$admin,$cont,$data['user_id'],$id,$cont);
						$stmt->execute();
					
				}
				else
				{
					$stmt = $dbCon->prepare("insert into manage_employee_permissions (is_admin, employee_id, permission, user_id, company_id, page_id, created_date, modified_date ) values(?, ?, ?, ?, ?, ?, now(),now())");
					$cont=1;
					$is_admin=1;
					$stmt->bind_param("iiiiii",$is_admin,$admin,$cont,$data['user_id'],$id,$cont);
					$stmt->execute();
				}
				$stmt       = $dbCon->prepare("insert into company_permission (`company_id`,`user_login_id`,`purchase`,`alert`,`supplier`,`customer`,`employee`,`proposal`,`project_proposal`,`create_article`,`import_article`) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$status_per = 1;
				$stmt->bind_param("iiiiiiiiiii", $id, $data['user_id'], $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per);
				$stmt->execute();
				
				
				$stmt       = $dbCon->prepare("insert into company_verified (company_id,verified,unvarified,is_verified) values (?, ?, ?, ?)");
				$status_ver = 7;
				$stmt->bind_param("iiii", $id, $status_emp, $status_ver, $status_emp);
				$stmt->execute();
				$_POST['property_id']=1;
				$_POST['is_headquarter']=1;
				$stmt = $dbCon->prepare("INSERT INTO property_location (latitude,longitude,company_id,property_id,visiting_address,created_on, is_headquarter,port_number) VALUES (?,?, ?, ?, ?, now(), ?, ?)");
				$stmt->bind_param("ssiisis",$response[0]['lat'],$response[0]['lon'], $id,$_POST['property_id'],$street_address, $_POST['is_headquarter'],$_POST['d_port_number']);
				$stmt->execute();
				$property_id=$stmt->insert_id;
				$_POST['same_invoice']=1;
					$_POST['iaddress']=$_POST['daddress'];
					 $_POST['icity']=$_POST['dcity'];
					 $_POST['izip']=$_POST['dzip'];
					 $_POST['i_port_number']=$_POST['d_port_number'];
				$stmt=$dbCon->prepare("update company_profiles set si_address=?,si_city=?,si_zip=?,sd_address=?,sd_city=?,sd_zip=?,d_port_number=?,i_port_number=?,is_invoice_same=?   where company_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssssssssii", $_POST['iaddress'],$_POST['icity'],$_POST['izip'],$_POST['daddress'],$_POST['dcity'],$_POST['dzip'],$_POST['d_port_number'],$_POST['i_port_number'],$_POST['same_invoice'],$id);
				$stmt->execute();
				
				
				$stmt = $dbCon->prepare("update property_location set street_name_i=?, city_i=?, postal_code_i=?, street_name_v=?, city_v=?, postal_code_v=?, d_port_number=?,i_port_number=?,is_invoice_same=?,country_v=?,country_i=?    where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssssssssissi", $_POST['iaddress'],$_POST['icity'],$_POST['izip'],$_POST['daddress'],$_POST['dcity'],$_POST['dzip'],$_POST['d_port_number'],$_POST['i_port_number'],$_POST['same_invoice'],$row_country['country_name'],$row_country['country_name'],$property_id);
				$stmt->execute();
				
								
				$fields=array();
				
				$fields=$_POST;
				$fields['country_name']=$row_country['country_name'];
				$fields['property_id_qloud']=$property_id;
				$fields['company_email']=$email;
				$fields['web']='www.qloudid.com';
				$fields['user_email']=$userrow['email'];
				$fields['is_admin']=$user_admin;
				$fields['hash_code']=$hash_code;
				$url='https://www.qmatchup.com/beta/company/index.php/UpdateUserCompany/addCompany';
				
				$fields_POST=array();
				$fields_POST['posted']= $this -> encrypt_decrypt('encrypt',serialize($fields));
				
				$ch = curl_init();
			//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch,CURLOPT_URL, $url);
			curl_setopt($ch,CURLOPT_POST, count($fields_POST));
			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_POST);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_REFERER, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, true);
			curl_setopt($ch, CURLOPT_COOKIEFILE, true);
			
			$result=curl_exec ($ch);
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			
			curl_close ($ch);
				
			}	
			 }
			else
			{
				$email=$rowCompany['company_email'];
				$id=$rowCompany['company_id'];
			}
			$data['email']=$userEmail;
			$data['cid']=$this->encrypt_decrypt('encrypt',$id);
			$company_id=$id;
			$stmt = $dbCon->prepare("select count(id) as num from cleaning_company_selected_service_todos where company_id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select * from professional_service_category");
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowCategory = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select *  from professional_service_subcategory where professional_category_id=?");
			$stmt->bind_param("i", $rowCategory['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			while($rowAmenities= $result3->fetch_assoc())
			{
				if($_POST['objectType']==$rowAmenities['id'])
				{
					$is_selected=1;
				}
				else
				{
					$is_selected=0;
				}
			$stmt = $dbCon->prepare("insert into cleaning_company_selected_service_todos (cleaning_category_id,cleaning_subcategory_id,company_id, created_on, modified_on,is_selected) values (?, ?,?, now(), now(),?)");
			$stmt->bind_param("iiii",$rowCategory['id'],$rowAmenities['id'],$company_id,$is_selected);
			$stmt->execute();
			 				
			}
			
			}
			
			}
			else
			{
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id not in(select cleaning_subcategory_id from  cleaning_company_selected_service_todos where company_id=?)");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row= $result->fetch_assoc())
			{
				
			$stmt = $dbCon->prepare("insert into cleaning_company_selected_service_todos ( cleaning_category_id,cleaning_subcategory_id,company_id, created_on, modified_on) values (?, ?,?, now(), now())");
			$stmt->bind_param("iii",$row['professional_category_id'],$row['id'],$company_id);
			$stmt->execute();
			 				
			}
				$stmt = $dbCon->prepare("update cleaning_company_selected_service_todos set is_selected=1 where cleaning_subcategory_id=? and company_id=?");
				$stmt->bind_param("ii",$_POST['objectType'],$company_id);
				$stmt->execute();
			}
			
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id=?");
			$stmt->bind_param("i", $_POST['objectType']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowService = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select count(id) as num from company_aboutus_content where company_id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			for($cnt=1;$cnt<=4;$cnt++)
			{
			$stmt = $dbCon->prepare("insert into company_aboutus_content ( company_aboutus_id,company_id, created_on) values (?,?,now())");
			$stmt->bind_param("ii",$cnt,$company_id);
			$stmt->execute();	
			}
			
			}
			
			 
			
			
			
			$stmt = $dbCon->prepare("update company_aboutus_content set content=?,is_active=1 where company_aboutus_id=1 and company_id=?");
			$stmt->bind_param("si",$rowService['about_company'],$company_id);
			$stmt->execute();
			$stmt = $dbCon->prepare("update company_aboutus_content set content=?,is_active=1 where company_aboutus_id=2 and company_id=?");
			$stmt->bind_param("si",$rowService['what_they_do'],$company_id);
			$stmt->execute();
			$stmt = $dbCon->prepare("update company_aboutus_content set content=?,is_active=1 where company_aboutus_id=3 and company_id=?");
			$stmt->bind_param("si",$rowService['about_their_team'],$company_id);
			$stmt->execute();
			$stmt = $dbCon->prepare("update company_aboutus_content set content=?,is_active=1 where company_aboutus_id=4 and company_id=?");
			$stmt->bind_param("si",$rowService['about_their_team'],$company_id);
			$stmt->execute();
			
			 
			
			
			
			
			$stmt = $dbCon->prepare("select id from landloard_broker_request where sender_company_id=? and landloard_company_id=?");
			$stmt->bind_param("ii", $company_id,$_POST['company_id']);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into landloard_broker_request(sender_company_id,landloard_company_id,created_on) values(?, ?, now())");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii",$company_id,$_POST['company_id']);
			$stmt->execute();
			}
			
			$stmt = $dbCon->prepare("update landloard_broker_request set is_approved=1 where sender_company_id=? and landloard_company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii",$company_id,$_POST['company_id']);
			$stmt->execute();	
			
			
			$stmt = $dbCon->prepare("update landloard_broker_sent_request set is_approved=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$a_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return $data['cid'];
			
		}
		
		
		function verifyEmailOtpDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			
			$stmt = $dbCon->prepare("select * from invite_app_employee where id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if($row['email_otp']==$_POST['otp'])
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
		
		
		function verifyNewEmailDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			
			$stmt = $dbCon->prepare("select count(id) as num from employees where email=? and company_id=(select company_id from invite_app_employee where id=?)");
			$stmt->bind_param("si",$_POST['pemail'], $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			 
			$stmt->close();
			$dbCon->close();
			return $row['num'];		
			 
		}
		
		
		function verifyCompanyIdDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			
			$stmt = $dbCon->prepare("select company_id,company_email from companies left join company_profiles on company_profiles.company_id=companies.id where cid=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['cid']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCompany = $result->fetch_assoc();
			if(empty($rowCompany))
			{
			$stmt->close();
			$dbCon->close();
			return 0;		
			}
			else
			{
			$stmt = $dbCon->prepare("select id from employees where company_id=? and email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $rowCompany['company_id'],$_POST['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCompany = $result->fetch_assoc();
			if(empty($rowCompany))
			{
			$stmt->close();
			$dbCon->close();
			return 2;		
			}	
			else
			{
			$stmt->close();
			$dbCon->close();
			return 1;		
			}
			}				
			  
		}
		
		
		function saveDetails($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['a_id']);
			
			if($_POST['personal_account']==1)
			{
				$_POST['pemail']=$_POST['email'];
			}
			$code=mt_rand(1111,9999); 
			$code1=mt_rand(1111,9999); 
			$_POST['first_name']=htmlentities($_POST['first_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$_POST['last_name']=htmlentities($_POST['last_name'],ENT_NOQUOTES, 'ISO-8859-1');
			
			$stmt = $dbCon->prepare("update invite_app_employee set first_name=?,last_name=?,country_id=?,phone_number=?,new_email_id=?,phone_otp=?,email_otp=? where id=?");
			$stmt->bind_param("ssissiii",$_POST['first_name'],$_POST['last_name'],$_POST['pcountry'],$_POST['pnumber'],$_POST['pemail'],$code1,$code, $request_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select country_code,country_name from phone_country_code where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['pcountry']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_country = $result->fetch_assoc();
			
			 
			$subject='Verify phone';
			$emailContent='Please verify your phone using code - '.$code1;
			$to            = '+'.trim($row_country['country_code']).''.trim($_POST['pnumber']);
			 
			try{
			$res=json_decode(sendSms($subject, $to, $emailContent),true);
			}
			catch(Exception $e) {
						 
					   
					}
				catch (Error $e) {
					 
								}
			
			
			
			$to=$_POST['pemail'];
			$subject='Verification code';
			$emailContent='<html><head></head>

<body>


    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="600" align="center" bgcolor="#FEFEFE" style="margin:0px auto;padding:0px;border:0px;border-collapse:collapse;width:600px;background-color:black">
        <tbody>
            <tr>
                <td align="left" valign="top" style="padding-left:20px;padding-right:20px;text-align:left;vertical-align:top">
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td style="padding-left:20px;padding-right:20px">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td align="left">
                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse">
                                                        <tbody>
                                                            <tr>
                                                                <td valign="middle" style="font-size:20px;line-height:20px;font-weight:bold;vertical-align:middle"><a href="http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw3Fdh_8slomy-uTKO2Dq10h"><img src="https://www.qloudid.com/html/usercontent/images/gettxp/logo.jpeg" alt="Klarna." width="98" height="98" border="0" style="display:block;outline:0px;width:98px;height:98px" class="CToWUd" data-bit="iit"></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h1 style="font-family:&quot;Klarna Display&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:36px;line-height:40px">Your 4-digit code</h1>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Hi there! Your 4-digit code is:</div>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h2 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:27px;line-height:30px">'.$code.'</h2>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">This code is sent to you so that you can verify your self for signup</div>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Do not share this code. Qloud ID representatives will never reach out to you to verify this code over the phone or SMS.</div>
                                    
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td style="padding-left:20px;padding-right:20px">
                                    <h2 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:27px;line-height:30px">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Support</font>
                                        </font>
                                    </h2>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h3 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:19px;line-height:25px">If you have any questions please contact us on</h3>
                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                        <tbody>
                                                            <tr>
                                                                <td height="5" style="font-size:5px;line-height:5px;height:5px">&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px"><a href="#" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;text-decoration:underline!important" target="_blank" data-saferedirecturl="#">Customer Service</a></div>
                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                        <tbody>
                                                            <tr>
                                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <h3 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:19px;line-height:25px">Want to learn more about us?</h3>
                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                        <tbody>
                                                            <tr>
                                                                <td height="5" style="font-size:5px;line-height:5px;height:5px">&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Visit our website at<span>&nbsp;</span><a href="#" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;text-decoration:underline!important" target="_blank" data-saferedirecturl="#">https://www.qloudid.com</a></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td style="padding-left:20px;padding-right:20px">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="1" style="font-size:1px;line-height:1px;height:1px;background-color:rgb(238,238,238)">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>


</body></html>';
			try {
				sendEmail($subject, $to, $emailContent);
			}
			catch(Exception $e) {
				 
				}	
	
		 
			 
			$stmt->close();
			$dbCon->close();
			return 1;		
			 
		}
		
		
		function saveBrokerDetails($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['a_id']);
			 
			if($_POST['personal_account']==1)
			{
				$_POST['pemail']=$_POST['email'];
			}
			$code=mt_rand(1111,9999); 
			$code1=mt_rand(1111,9999); 
			$_POST['first_name']=htmlentities($_POST['first_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$_POST['last_name']=htmlentities($_POST['last_name'],ENT_NOQUOTES, 'ISO-8859-1');
			
			$stmt = $dbCon->prepare("update landloard_broker_sent_request set first_name=?,last_name=?,pcountry=?,phone_number=?,new_email_id=?,phone_otp=?,email_otp=?,company_type=?,cid=?,daddress=?,dzip=?,d_port_number=?,dcity=?,objectType=? where id=?");
			$stmt->bind_param("ssissiiisssssii",$_POST['first_name'],$_POST['last_name'],$_POST['pcountry'],$_POST['pnumber'],$_POST['pemail'],$code1,$code,$_POST['company_type'],$_POST['cid'],$_POST['daddress'],$_POST['dzip'],$_POST['d_port_number'],$_POST['dcity'],$_POST['objectType'], $request_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select country_code,country_name from phone_country_code where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['pcountry']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_country = $result->fetch_assoc();
			
			 
			$subject='Verify phone';
			$emailContent='Please verify your phone using code - '.$code1;
			$to            = '+'.trim($row_country['country_code']).''.trim($_POST['pnumber']);
			 
			try{
			$res=json_decode(sendSms($subject, $to, $emailContent),true);
			}
			catch(Exception $e) {
						 
					   
					}
				catch (Error $e) {
					 
								}
			
			
			
			$to=$_POST['pemail'];
			$subject='Verification code';
			$emailContent='<html><head></head>

<body>


    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="600" align="center" bgcolor="#FEFEFE" style="margin:0px auto;padding:0px;border:0px;border-collapse:collapse;width:600px;background-color:black">
        <tbody>
            <tr>
                <td align="left" valign="top" style="padding-left:20px;padding-right:20px;text-align:left;vertical-align:top">
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td style="padding-left:20px;padding-right:20px">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td align="left">
                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse">
                                                        <tbody>
                                                            <tr>
                                                                <td valign="middle" style="font-size:20px;line-height:20px;font-weight:bold;vertical-align:middle"><a href="http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw3Fdh_8slomy-uTKO2Dq10h"><img src="https://www.qloudid.com/html/usercontent/images/gettxp/logo.jpeg" alt="Klarna." width="98" height="98" border="0" style="display:block;outline:0px;width:98px;height:98px" class="CToWUd" data-bit="iit"></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h1 style="font-family:&quot;Klarna Display&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:36px;line-height:40px">Your 4-digit code</h1>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Hi there! Your 4-digit code is:</div>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h2 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:27px;line-height:30px">'.$code.'</h2>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">This code is sent to you so that you can verify your self for signup</div>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Do not share this code. Qloud ID representatives will never reach out to you to verify this code over the phone or SMS.</div>
                                    
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td style="padding-left:20px;padding-right:20px">
                                    <h2 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:27px;line-height:30px">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Support</font>
                                        </font>
                                    </h2>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h3 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:19px;line-height:25px">If you have any questions please contact us on</h3>
                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                        <tbody>
                                                            <tr>
                                                                <td height="5" style="font-size:5px;line-height:5px;height:5px">&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px"><a href="#" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;text-decoration:underline!important" target="_blank" data-saferedirecturl="#">Customer Service</a></div>
                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                        <tbody>
                                                            <tr>
                                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <h3 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:19px;line-height:25px">Want to learn more about us?</h3>
                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                        <tbody>
                                                            <tr>
                                                                <td height="5" style="font-size:5px;line-height:5px;height:5px">&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Visit our website at<span>&nbsp;</span><a href="#" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;text-decoration:underline!important" target="_blank" data-saferedirecturl="#">https://www.qloudid.com</a></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td style="padding-left:20px;padding-right:20px">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="1" style="font-size:1px;line-height:1px;height:1px;background-color:rgb(238,238,238)">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>


</body></html>';
			try {
				sendEmail($subject, $to, $emailContent);
			}
			catch(Exception $e) {
				 
				}	
	
		 
			 
			$stmt->close();
			$dbCon->close();
			return 1;		
			 
		}
		
		
		
		
		 function invationInformation($data)
		{
			$dbCon = AppModel::createConnection();
			
			$request_id= $this -> encrypt_decrypt('decrypt',$data['a_id']);
			$stmt= $dbCon->prepare("select * from invite_app_employee where id=?");
			//echo $query; die;
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			
			$stmt = $dbCon->prepare("select user_logins.id,first_name,last_name,country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where email=?");
			$stmt->bind_param("s",  $row['employee_email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUser = $result->fetch_assoc();
			 
			 
			if(empty($rowUser))
			{
				
			 
				$row['user_id']=0;
				$row['first_name']='';
				$row['last_name']='';
				$row['country']='';
				$row['phone_number']=$row['phone_number'];
			}
			else
			{
				$row['user_id']=$rowUser['id'];
				$row['first_name']=$rowUser['first_name'];
				$row['last_name']=$rowUser['last_name'];
				$row['country']=$rowUser['country_of_residence'];
				$row['phone_number']=$rowUser['phone_number'];
			}
			
			 
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		 function brokerInvationInformation($data)
		{
			$dbCon = AppModel::createConnection();
			
			$request_id= $this -> encrypt_decrypt('decrypt',$data['a_id']);
			$stmt= $dbCon->prepare("select * from landloard_broker_sent_request where id=?");
			//echo $query; die;
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			
			$stmt = $dbCon->prepare("select user_logins.id,first_name,last_name,country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where email=?");
			$stmt->bind_param("s",  $row['employee_email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUser = $result->fetch_assoc();
			 
			 
			if(empty($rowUser))
			{
				
				$stmt= $dbCon->prepare("select * from phone_country_code where country_name=?");
				$stmt->bind_param("s", $row['country_name']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowCountry = $result->fetch_assoc();
				
				$row['user_id']=0;
				$row['first_name']=$row['first_name'];
				$row['last_name']=$row['last_name'];
				$row['country']=$rowCountry['id'];
				$row['phone_number']=$row['phone_number'];
			}
			else
			{
				$row['user_id']=$rowUser['id'];
				$row['first_name']=$rowUser['first_name'];
				$row['last_name']=$rowUser['last_name'];
				$row['country']=$rowUser['country_of_residence'];
				$row['phone_number']=$rowUser['phone_number'];
			}
			
			 
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		
		 
		
		 function approveUserEmployeeRequest($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$request_id= $this -> encrypt_decrypt('decrypt',$data['request_id']);
			 
			$stmt= $dbCon->prepare("select * from invite_app_employee where id=?");
			//echo $query; die;
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_emp = $result->fetch_assoc();
			
			if($_POST['personal_account']==0)
			{
			$row_emp['employee_email']=$row_emp['new_email_id'];	
			}
			
			$row_emp['email']=$row_emp['employee_email'];	
			$row_emp['pcountry']=$row_emp['country_id'];
			$row_emp['pnumber']=$row_emp['phone_number'];
			
			$company=$row_emp['company_id'];
			$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where email= ?");
			 
			$stmt->bind_param("s", $row_emp['employee_email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_id = $result->fetch_assoc();
			
			if(empty($row_id))
			{
			$user=$this->createUser($row_emp);
			$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where email= ?");
			 
			$stmt->bind_param("s", $row_emp['employee_email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_id = $result->fetch_assoc();
			}
			
			$d=date('Y-m-d');
			  
			$emp=$row_id['id'];
			$s=0;
			$u=1;
					
			$stmt= $dbCon->prepare("select count(id) as num from employees where user_login_id= ? and company_id=?");
			 
			$stmt->bind_param("ii", $row_id['id'],$row_id['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowEmployeeAvailable = $result->fetch_assoc();
					
			if($rowEmployeeAvailable['num']==0)
			{
			
					$stmt= $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`) values (?,?,?,?,?,?,?)");
					$stmt->bind_param("ississi", $company,$row_id['first_name'],$row_id['last_name'],$s,$row_id['hash_code'],$row_id['email'],$row_id['id']);
					 
					
					if($stmt->execute())
					{
						
						 
						
						$stmt= $dbCon->prepare("insert into company_permission (`company_id`,`user_login_id`,`purchase`,`alert`,`supplier`,`customer`,`employee`,`proposal`,`project_proposal`,`create_article`,`import_article`) values (?,?,?,?,?,?,?,?,?,?,?)");
						$stmt->bind_param("iiiiiiiiiii", $company,$row_id['id'],$s,$s,$s,$s,$u,$s,$s,$s,$s);
						$stmt->execute();
					 
						
						
							$stmt= $dbCon->prepare("select id from property_location where company_id=? and is_headquarter=1");
							$stmt->bind_param("i", $company);
							$stmt->execute();
							$result = $stmt->get_result();
							$row_location = $result->fetch_assoc();
							
							$stmt= $dbCon->prepare("insert into user_company_profile (location_id,company_id,user_login_id,title,email) values (?, ?,?,?,?)");
							$stmt->bind_param("iiiss", $row_location['id'],$company,$row_id['id'],$row_emp['title'],$row_emp['work_email']);
							$stmt->execute();
						 	 
			
							$data['cid']=$this->encrypt_decrypt('encrypt',$company);
							
							$stmt = $dbCon->prepare("select id from employees where company_id=? and user_login_id=?");
							
							/* bind parameters for markers */
							
							$stmt->bind_param("ii", $company,$emp);
							$stmt->execute();
							$result = $stmt->get_result();
							$rowEmp = $result->fetch_assoc();
							
							$data['eid']=$this->encrypt_decrypt('encrypt',$rowEmp['id']);
							$valUpdate=$this->professionalTodoUpdate($data);
							
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
			else
			{
			$stmt->close();
			$dbCon->close();
			return 0;
			}		
					
			
		}
		
		
		 function professionalTodoUpdate($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$employee_id=$this->encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id not in(select professional_subcategory_id from  employee_selected_service_todos where company_id=? and employee_id=?)");
			$stmt->bind_param("ii", $company_id,$employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			
			$stmt = $dbCon->prepare("select *  from professional_service_subcategory where id=?");
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			$rowAmenities= $result3->fetch_assoc();
			$stmt = $dbCon->prepare("insert into employee_selected_service_todos ( professional_category_id,professional_subcategory_id,company_id,employee_id, created_on, modified_on) values (?, ?,?,?, now(), now())");
			$stmt->bind_param("iiii",$row['professional_category_id'],$row['id'],$company_id,$employee_id);
			$stmt->execute();
							
			}	
			
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		function createUser($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select id from user_logins where email=?");
			/* bind parameters for markers */
			$stmt->bind_param("s", $data['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if(empty($row))
			{
			$rf=0;	
			$st=1; 
			$added_on_place=2;
			$data['first_name']=htmlentities($data['first_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$data['last_name']=htmlentities($data['last_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$data['random_hash'] = substr(md5(uniqid(rand(), true)), 16, 16);
			$stmt = $dbCon->prepare("INSERT INTO user_logins (first_name,last_name,registered_from,get_started_wizard_status,email,  email_verification_code , created_on , modified_on, country_of_residence,verification_status,added_on_place) VALUES (?, ?, ?, ?,   ?, ?, now(), now(), ?, ?,?)");
			$stmt->bind_param("ssiissiii", $data['first_name'], $data['last_name'],$st,$st,$data['email'], $data['random_hash'], $data['pcountry'],$rf,$added_on_place);
			$stmt->execute();
			$data['user_id']=$stmt->insert_id;
			
			$stmt = $dbCon->prepare("select user_logins.id,country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where country_of_residence=? and phone_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $_POST['pcountry'],$_POST['pnumber']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCheck = $result->fetch_assoc();	
			if(!empty($rowCheck))
			{
			$stmt = $dbCon->prepare("update user_profiles   set phone_number='' where user_logins_id=?");
			$stmt->bind_param("i", $rowCheck['id']);
			$stmt->execute();	
			}
			
			$stmt = $dbCon->prepare("INSERT INTO user_profiles (user_logins_id,phone_number) VALUES (?, ?)");
			$stmt->bind_param("is", $data['user_id'], $data['pnumber']);
			$stmt->execute();
			}
			else
			{
				$data['user_id']=$row['id'];
			}
			$stmt->close();
			$dbCon->close();
			return $data['user_id'];
			
		}
	
		function countryOptions()
		{
			$dbCon = AppModel::createConnection();
			 
		    $stmt = $dbCon->prepare("select * from phone_country_code order by country_name");
			/* bind parameters for markers */
			$stmt->execute();
			$result1 = $stmt->get_result();
			 $org=array();
			while($row = $result1->fetch_assoc())
			{
				array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		 	
		
		
		}		