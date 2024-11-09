<?php
	require_once('../AppModel.php');
	class ConnectShareSuppliersModel extends AppModel
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
		
		
		function approveUserRequest($data)
		{
			$dbCon = AppModel::createConnection();
			
			$request_id= $this -> encrypt_decrypt('decrypt',$data['a_id']);
			$stmt= $dbCon->prepare("select invited_emp,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p from estore_employee_invite where id=?");
			//echo $query; die;
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_emp = $result->fetch_assoc();
			$company=$row_emp['company_id'];
			
			$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where email= ? or email=?");
			//echo $query; die;
			$stmt->bind_param("ss", $row_emp['email'], $row_emp['work_email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_id = $result->fetch_assoc();
			
			
			$d=date('Y-m-d');
			if($data['stat']==2)
			{
				$stmt= $dbCon->prepare("update invitation set status=2,accepted_date=? where invited_user_id= ?");
				$stmt->bind_param("si",$d,$request_id);
				$stmt->execute();
				$stmt= $dbCon->prepare("select invited_emp,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p from estore_employee_invite where id=?");
				//echo $query; die;
				$stmt->bind_param("i", $request_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_emp = $result->fetch_assoc();
				$company=$row_emp['company_id'];
				
				$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where email= ? or email=?");
				//echo $query; die;
				$stmt->bind_param("ss", $row_emp['email'], $row_emp['work_email']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_id = $result->fetch_assoc();
				//echo $row_id['id']; echo $request_id; die;
				$stmt= $dbCon->prepare("update estore_employee_invite set real_employee_id=? where id=? ");
				$stmt->bind_param("ii", $row_id['id'],$request_id);
				$stmt->execute();
			}
			else if($data['stat']==1)
			{
				$stmt= $dbCon->prepare("select invited_emp,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p from estore_employee_invite where id=?");
				//echo $query; die;
				$stmt->bind_param("i", $request_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_emp = $result->fetch_assoc();
				$company=$row_emp['company_id'];
				$stmt= $dbCon->prepare("update invitation set status=1,accepted_date=? where invited_user_id= ?");
				$stmt->bind_param("si", $d,$request_id);
				if($stmt->execute())
				{
					$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where email= ? or email=?");
					//echo $query; die;
					$stmt->bind_param("ss", $row_emp['email'], $row_emp['work_email']);
					$stmt->execute();
					$result = $stmt->get_result();
					$row_id = $result->fetch_assoc();
					$s=0;
					$u=1;
					$stmt= $dbCon->prepare("insert into company_permission (`company_id`,`user_login_id`,`purchase`,`alert`,`supplier`,`customer`,`employee`,`proposal`,`project_proposal`,`create_article`,`import_article`) values (?,?,?,?,?,?,?,?,?,?,?)");
					$stmt->bind_param("iiiiiiiiiii", $company,$row_id['id'],$s,$s,$s,$s,$u,$s,$s,$s,$s);
					$stmt->execute();
					if($row_emp['invited_emp']==1)
					{
						$stmt= $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`) values (?,?,?,?,?,?,?)");
					}  
					else if($row_emp['invited_emp']==2)
					{
						$stmt= $dbCon->prepare("insert into students (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`) values (?,?,?,?,?,?,?,?)");
					}  
					//echo $company_id."-".$row_id['first_name']."-".$row_id['last_name']."-".$s."-".$row_id['hash_code']."-".$row_id['email']."-".$row_id['id']; die;
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
						
						$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where email= ? or email=?");
						//echo $query; die;
						$stmt->bind_param("ss", $row_emp['email'], $row_emp['work_email']);
						$stmt->execute();
						$result = $stmt->get_result();
						$row_id = $result->fetch_assoc();
						
						
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
								$stmt= $dbCon->prepare("insert into user_profiles (mobile_p,nation,user_logins_id,created_on,modified_on,summary,zipcode,city,state,country,phone_number,address,marital_status,blog,skype,linkedln,facebook,twitter,instagram) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
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
			}
			
			$fields=array();
			$fields=$row_id;
			$fields['safeqloud']=$request_id;
			$fields['stat']=$data['stat'];
			$stmt= $dbCon->prepare("delete from  invitation where invited_user_id= ?");
			$stmt->bind_param("i",$request_id);
			$stmt->execute();
			$stmt= $dbCon->prepare("delete from  estore_employee_invite where id= ?");
			$stmt->bind_param("i",$request_id);
			$stmt->execute();
			$stmt= $dbCon->prepare("delete from  virtual_user_company_profile where invited_user_id= ?");
			$stmt->bind_param("i",$request_id);
			$stmt->execute();
			$stmt= $dbCon->prepare("delete from  virtual_user_profiles where invited_user_id= ?");
			$stmt->bind_param("i",$request_id);
			$stmt->execute();
			$url='https://www.qmatchup.com/beta/user/index.php/Invitation/updateQloud';
			$ch = curl_init();
			//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
			//curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_REFERER, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, true);
			curl_setopt($ch, CURLOPT_COOKIEFILE, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
			curl_setopt($ch, CURLOPT_POST, true);
			//var_dump($ch);
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			//get status code
			//echo $status_code; die;
			$result=curl_exec ($ch);
			curl_close ($ch);
			//echo $result; die;
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
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select first_name, last_name,concat_ws(' ', first_name, last_name) as name from user_logins where id = ?");
			
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
		
		function approveUser($data)
		{
			$dbCon = AppModel::createConnection();
			if($data['us']==1)
			{
				$user_id=$data['user_id'];
				$stmt = $dbCon->prepare("select email from user_logins where id=?");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$stmt = $dbCon->prepare("select invited_emp,estore_employee_invite.id,invitation.status,invitation.created_date,company_name from estore_employee_invite left join invitation on estore_employee_invite.id=invitation.invited_user_id left join companies on estore_employee_invite.company_id=companies.id where created_user=1 and (estore_employee_invite.email=? or estore_employee_invite.work_email=?)");
				$stmt->bind_param("ss", $row['email'],$row['email']);
			}
			else
			{
				$user_id= $this -> encrypt_decrypt('decrypt',$data['user_id']);
				$stmt = $dbCon->prepare("select invited_emp,estore_employee_invite.id,invitation.status,invitation.created_date,company_name from estore_employee_invite left join invitation on estore_employee_invite.id=invitation.invited_user_id left join companies on estore_employee_invite.company_id=companies.id where created_user=1 and estore_employee_invite.id= ?");
				$stmt->bind_param("i", $user_id);
			}
			
			
			
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
		
		function allCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			if($data['us']==1)
			{
				$user_id=$data['user_id'];
				$stmt = $dbCon->prepare("select email from user_logins where id=?");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where estore_employee_invite.email=? or estore_employee_invite.work_email=?");
				$stmt->bind_param("ss", $row['email'],$row['email']);
			}
			else
			{
				$user_id= $this -> encrypt_decrypt('decrypt',$data['user_id']);
				$stmt = $dbCon->prepare("select count(id) as num from invitation where invited_user_id= ? and status=0");
				$stmt->bind_param("i",  $user_id );
			}
			
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function approveCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from employee_request where company_id= ? and `status`=1");
			
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
		
		function pendingCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from employee_request where company_id= ? and `status`=0");
			
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
		
		function rejectCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from employee_request where company_id= ? and `status`=3");
			
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
		
		function locationCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from location where company_id = ?");
			
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
		
		function connectCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select count(id) num from employees where company_id = ?");
			
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
		
		function virtualCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where real_employee_id is null and company_id= ?");
			
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
		
		function virtualEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id,concat_ws(' ', name, last_name) as name,created_by,email,phone,title,location from estore_employee_invite where real_employee_id is null and company_id=? and invited_emp=1 ");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			//$org['created_by']=array();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select id,concat_ws(' ', first_name, last_name) as name from user_logins where id= ?");
				
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("i", $row['created_by']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				array_push($org,$row);
				$org[$i]['created_user']=$row1['name'];
				$i++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function connectedEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select created_by,employees.id,employees.user_login_id,concat_ws(' ', employees.first_name, employees.last_name) as name,employees.email,price,verification_status,image_path,user_profiles.phone_number from employees left join user_logins on employees.user_login_id=user_logins.id left join user_profiles on employees.user_login_id=user_profiles.user_logins_id  where employees.company_id= ?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			//$org['created_user']=array();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select id,concat_ws(' ', first_name, last_name) as name from user_logins where id= ?");
				
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("i", $row['created_by']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				array_push($org,$row);
				$org[$i]['created_user']=$row1['name'];
				$i++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function locationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name,location.created_on,location.id,companies.company_name,location,country.country_name,state.state_name,cities.city_name from location left join user_logins on location.user_login_id=user_logins.id left join companies on location.company_id=companies.id left join country on country.id=location.country_id left join state on state.id=location.state_id left join cities on cities.id=location.city_id where company_id= ? limit 0,2");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
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
		
		function locationDetailMore($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name,location.created_on,location.id,companies.company_name,location,country.country_name,state.state_name,cities.city_name from location left join user_logins on location.user_login_id=user_logins.id left join companies on location.company_id=companies.id left join country on country.id=location.country_id left join state on state.id=location.state_id left join cities on cities.id=location.city_id where company_id= ? limit 0,?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $company_id,$data['limit']);
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
		
		
	}
