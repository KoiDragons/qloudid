<?php
	
	require_once('../AppModel.php');
	class AddCompanyModel extends AppModel
	{
		
		
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image,country_of_residence from user_logins where id = ?");
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
		
		function selectCountry()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name  from country where id>-1 and id<240 order by country_name");
			
			/* bind parameters for markers */
			
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
		
		function propertyDetailInfo()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select  * from property order by property_name");
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
		}
		
		function checkCid()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select company_id from company_profiles where cid=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['cid']);
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
				$stmt = $dbCon->prepare("select country_id from companies where id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['company_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_country = $result->fetch_assoc();
				if($row_country['country_id']==$_POST['country'])
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
		}
		
		
		function checkWeb()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id from companies where website=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['web_site']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$stmt = $dbCon->prepare("select id from user_virtual_company where website=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("s", $_POST['web_site']);
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
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		}
		
		function checkEmail()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id from companies where company_email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['cemail']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$stmt = $dbCon->prepare("select id from user_virtual_company where work_email=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("s", $_POST['cemail']);
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
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		}
		
		function addCompanyDetail($data)
		{
			$dbCon = AppModel::createConnection();
			//print_r($_POST); die;
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
			$hash_code   = substr(md5(uniqid(rand(), true)), 16, 16);
			
			$name=htmlentities($_POST['company_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$street_address=htmlentities($_POST['adrs1'],ENT_NOQUOTES, 'ISO-8859-1');
			$city=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("select country_code,country_name from country where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_country = $result->fetch_assoc();
			$email=$_POST['cid'].'.'.$row_country['country_code'].'@qloudid.com';
			$web='';
			$st=1;
			$stmt = $dbCon->prepare("insert into companies(company_type,o_type,country_id,user_login_id,company_name,company_email,website,hash_code,created_date,email_verification_status,created_by,user_role) 
			values(?, ?, ?, ?, ?, ?, ?, ?, now(), ?, ?, ?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiiissssiii", $_POST['company_type'],$st, $_POST['country'], $data['admin_id'], $name, $email, $web, $hash_code,$st,$data['user_id'],$_POST['position_type']);
			
			
			if (!$stmt->execute()) {
				$stmt->close();
				$dbCon->close();
				return 0;
			} 
			else 
			{
				$id=$stmt->insert_id;
				
				if($_POST['company_type']==2)
				{
					$_POST['phone_number']='';
					$description='';
					$_POST['entry_type']=0;
					$entry_code='';
					$stmt = $dbCon->prepare("insert into landloard_society (company_id, society_name,created_on,street_address,port_number,zipcode,city,country_id,phone_country_id,phone_number,email,description,entry_type,entry_code,wifi_available,wifi_username,wifi_password) values (?, ?, now(),?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
					$stmt->bind_param("isssssiisssisiss", $id,$name,$street_address,$_POST['port_number'],$_POST['dzip'],$city,$_POST['country'],$_POST['country'],$_POST['phone_number'],$email,$description,$_POST['entry_type'],$entry_code,$_POST['entry_type'],$entry_code,$entry_code);
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
			
			$address=$_POST['adrs1'].' '.$_POST['port_number'];
  
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
			
				$stmt = $dbCon->prepare("insert into company_profiles(latitude,longitude,`company_id`,address,cid,created_on,modified_on,port_number) values(?,?,?, ?, ?,now(),now(),?)");
				
				$stmt->bind_param("ssisss", $response[0]['lat'],$response[0]['lon'],$id, htmlentities($_POST['adrs1'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['cid'],$_POST['port_number']);
				$stmt->execute();
				
				
				$stmt = $dbCon->prepare("insert into user_company_profile(`company_id`,`user_login_id`) values(?, ?)");
				
				$stmt->bind_param("ii", $id, $data['admin_id']);
				$stmt->execute();
				
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
					
					if($_POST['position_type']==1)
					{
						$stmt = $dbCon->prepare("insert into manage_employee_permissions (is_admin, employee_id, permission, user_id, company_id, page_id, created_date, modified_date ) values(?, ?, ?, ?, ?, ?, now(),now())");
						$is_admin=0;
						$stmt->bind_param("iiiiii",$is_admin,$admin,$cont,$data['user_id'],$id,$cont);
						$stmt->execute();
					}
					else
					{
						$stmt = $dbCon->prepare("insert into manage_employee_permissions (is_admin, employee_id, permission, user_id, company_id, page_id, created_date, modified_date ) values(?, ?, ?, ?, ?, ?, now(),now())");
						$is_admin=1;
						$stmt->bind_param("iiiiii",$is_admin,$admin,$cont,$data['user_id'],$id,$cont);
						$stmt->execute();
					}
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
				
				$stmt = $dbCon->prepare("INSERT INTO property_location (latitude,longitude,company_id,property_id,visiting_address,created_on, is_headquarter,port_number) VALUES (?,?, ?, ?, ?, now(), ?, ?)");
				$stmt->bind_param("ssiisis",$response[0]['lat'],$response[0]['lon'], $id,$_POST['property_id'],htmlentities($_POST['adrs1'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['is_headquarter'],$_POST['port_number']);
				$stmt->execute();
				$property_id=$stmt->insert_id;
				if($_POST['same_invoice']==1)
				{
					 $_POST['iaddress']=$_POST['daddress'];
					 $_POST['icity']=$_POST['dcity'];
					 $_POST['izip']=$_POST['dzip'];
					 $_POST['i_port_number']=$_POST['d_port_number'];
				}
				$stmt = $dbCon->prepare("update company_profiles set si_address=?,si_city=?,si_zip=?,sd_address=?,sd_city=?,sd_zip=?,d_port_number=?,i_port_number=?,is_invoice_same=?   where company_id=?");
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
				
				$fields_post=array();
				$fields_post['posted']= $this -> encrypt_decrypt('encrypt',serialize($fields));
				
				$ch = curl_init();
			//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch,CURLOPT_URL, $url);
			curl_setopt($ch,CURLOPT_POST, count($fields_post));
			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_post);
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
			
			$stmt->close();
			$dbCon->close();
			return $this->encrypt_decrypt('encrypt',$id);
			
		}
	}		