<?php
	require_once('../AppModel.php');
	class UserCompanySignUpModel extends AppModel
	{
		function getDomainId($data)
		{
			return $this->encrypt_decrypt('decrypt',$data['domain_id']);
		}
		
		 
		
		function brokerInformation($data)
    {
		
		
		$dbCon = AppModel::createConnection();
		$company_id= $this->encrypt_decrypt('decrypt',$data['cid']);
			
			  
			
			$stmt = $dbCon->prepare("select * from user_profiles where user_logins_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['broker_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUserPhone = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from employees where company_id=? and user_login_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['broker_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$employee_id= $row['id'];
			 
			$stmt = $dbCon->prepare("select company_profiles.twitter as tw,company_profiles.fb,company_profiles.insta,company_email,user_logins.created_on,bg_color,f_color,companies.country_id,company_profiles.phone as cphone,passport_image,company_name,country.country_name,user_logins.email,user_logins.first_name,user_logins.last_name,phone_number,phone_country_code.country_code,employees.user_login_id,employees.company_id from employees left join companies on companies.id=employees.company_id left join company_profiles on company_profiles.company_id=companies.id left join user_logins on employees.user_login_id=user_logins.id left join user_profiles on user_profiles.user_logins_id=user_logins.id left join country on user_logins.country_of_residence=country.id left join phone_country_code on phone_country_code.country_name=country.country_name left join corporate_color on companies.id=corporate_color.company_id  where employees.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			  
			$stmt = $dbCon->prepare("select max(id) as v_id from user_passport_logs where user_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_login_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_veri = $result->fetch_assoc();
			if(empty($row_veri))
			{
				$row_veri['v_id']="";
			}
			
			
			
			$stmt = $dbCon->prepare("select facebook,twitter,d_country,phone,email,mobile,title,country_code from user_company_profile left join phone_country_code on user_company_profile.c_id=phone_country_code.country_name  where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['broker_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_profile = $result->fetch_assoc();
			//print_r($row_profile); die;
			if($row['user_login_id']==43)
			{
			$stmt = $dbCon->prepare("select visiting_address from property_location  where company_id=? and is_headquarter=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_location = $result->fetch_assoc();	
				
			}
			else
			{
			$stmt = $dbCon->prepare("select visiting_address from property_location  where id in(select location_id from employee_location where employee_id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_location = $result->fetch_assoc();	
			if(empty($row_location))
			{
			$stmt = $dbCon->prepare("select visiting_address from property_location  where company_id=? and is_headquarter=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_location = $result->fetch_assoc();		
			}
			}
			
			$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=(select country_name from country where id=?)");
			$stmt->bind_param("i",$row['country_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_phone = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=?");
			$stmt->bind_param("s",$row_profile['d_country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_mobile = $result->fetch_assoc();
			$row['cid']=$this->encrypt_decrypt('encrypt',$row['company_id']);
			$row['phone']=$row_profile['phone'];
			$row['work_email']=$row_profile['email'];
			$row['mobile']=$row_profile['mobile'];
			if($row_profile['title']==null || $row_profile['title']=='-' || $row_profile['title']=='') { $row_profile['title']='Employee'; }  
			$row['title']=$row_profile['title'];
			$row['location']=$row_location['visiting_address'];
			$row['employee_country_code']=$row_profile['country_code'];
			$row['company_country_code']=$row_phone['country_code'];
			$row['mobile_country_code']=$row_mobile['country_code'];
			$row['v_id']=$row_veri['v_id'];
			$row['user_phone']=$rowUserPhone['phone_number'];
			$row['facebook']=$row_profile['facebook'];
			$row['twitter']=$row_profile['twitter'];
			
			
			$stmt = $dbCon->prepare("select * from company_aboutus_content where company_id=? and company_aboutus_id=1");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAbout = $result->fetch_assoc();
			$row['about_us']=$rowAbout['content']; 
			
			$stmt = $dbCon->prepare("select * from company_aboutus_content where company_id=? and company_aboutus_id=4");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAbout = $result->fetch_assoc();
			$row['who_we_are']=$rowAbout['content']; 
			$stmt->close();
			$dbCon->close();
			return $row;
        
    }
	

		
		function addApartmentRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$catg_id=68;
			$whom_id=$this->encrypt_decrypt('decrypt',$data['whom_id']);
			$subcatg_id=483;
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$data['user_id']=0;
			$_POST['property_type_detail']=1;
			$_POST['product_information']='';
			$_POST['carried_for']=1;
			$_POST['begin_info']=1;
			$_POST['pcountry']='';
			$_POST['p_number']='';
			$_POST['conatct_preffered_on']=1;
			$request_type=2;
			$stmt = $dbCon->prepare("insert into `user_professional_service_request`(request_type,domain_id, whom_you_want_served,`category_id` , `subcategory_id` , `property_type_detail` ,`product_information`, `carried_for` , `begin_info` , `user_id` , `pcountry` , `p_number` , `conatct_preffered_on` , `created_on`) VALUES (?,?, ?,?,   ?, ?,?, ?, ?, ?,   ?, ?,?, now())");
			$stmt->bind_param("iiiiiisiiiisi",$request_type,$domain_id,$whom_id, $catg_id,$subcatg_id,$_POST['property_type_detail'],$_POST['product_information'],$_POST['carried_for'],$_POST['begin_info'],$data['user_id'],$_POST['pcountry'],$_POST['p_number'],$_POST['conatct_preffered_on']);
			$stmt->execute();
			$id=$stmt->insert_id;
			$_POST['check_in']=strtotime($_POST['check_in']);
			$_POST['check_out']=strtotime($_POST['check_out']);
			$stmt = $dbCon->prepare("update `user_professional_service_request` set  city_location=? , check_in_date =?, check_out_date=?,guest_adult=?,guest_children=?, guest_infant=? where id=? ");
			$stmt->bind_param("sssiiii",$_POST['location'],$_POST['check_in'],$_POST['check_out'],$_POST['guest_adult'],$_POST['guest_child'],$_POST['guest_infant'],$id);
			$stmt->execute();
			
			$data['cid']=$this->encrypt_decrypt('encrypt',$id);
			 
			$stmt->close();
			$dbCon->close();
			return $data['cid'];
			
		}
	
		function serviceRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select  * from user_professional_service_request where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$job_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
	
		
		
		
		function locationList($data)
		{
		 
			$dbCon = AppModel::createConnection();
			   
			$stmt = $dbCon->prepare("select  distinct city as city from user_address where is_published=1 and id in (select  owner_property_id from vitech_properties  where  vitech_old_data=0 and is_published=1 and property_status=3)");
			
			/* bind parameters for markers */
			//$stmt->bind_param("i",$company_id);
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
		
		function deleteNewEmployeeDetails($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$invitation_id=$this->encrypt_decrypt('decrypt',$data['invitation_id']);
			 
			$stmt = $dbCon->prepare("delete from estore_employee_invite_newinfo where invitation_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$invitation_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		
		
		function approveUserEmployeeRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$data['stat']=1;
			$request_id= $this -> encrypt_decrypt('decrypt',$data['invitation_id']);
			$stmt= $dbCon->prepare("select professional_category_id,professional_subcategory_id,invited_emp,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p,employee_number from estore_employee_invite where id=?");
			//echo $query; die;
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_emp = $result->fetch_assoc();
			
			//print_r($row_emp);// die;
			$company=$row_emp['company_id'];
			//echo $row_emp['email']." ".$row_emp['work_email']." jain";
			$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where email= ? or email=?");
			//echo $query; die;
			$stmt->bind_param("ss", trim($row_emp['email']), trim($row_emp['work_email']));
			$stmt->execute();
			$result = $stmt->get_result();
			$row_id = $result->fetch_assoc();
			
			
			$d=date('Y-m-d');
			if($data['stat']==2)
			{
				$stmt= $dbCon->prepare("update invitation set status=2,accepted_date=? where invited_user_id= ?");
				$stmt->bind_param("si",$d,$request_id);
				$stmt->execute();
				$stmt= $dbCon->prepare("select invited_emp,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p,employee_number from estore_employee_invite where id=?");
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
				
				$emp=$row_id['id'];
			}
			else if($data['stat']==1)
			{
				$stmt= $dbCon->prepare("select invited_emp,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p,employee_number from estore_employee_invite where id=?");
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
					$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where id= ?");
					//echo $query; die;
					$stmt->bind_param("i", $data['user_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$row_id = $result->fetch_assoc();
					$emp=$row_id['id'];
					$s=0;
					$u=1;
					$stmt= $dbCon->prepare("insert into company_permission (`company_id`,`user_login_id`,`purchase`,`alert`,`supplier`,`customer`,`employee`,`proposal`,`project_proposal`,`create_article`,`import_article`) values (?,?,?,?,?,?,?,?,?,?,?)");
					$stmt->bind_param("iiiiiiiiiii", $company,$row_id['id'],$s,$s,$s,$s,$u,$s,$s,$s,$s);
					$stmt->execute();
					if($row_emp['invited_emp']==1)
					{
						$stmt= $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`, employee_number) values (?,?,?,?,?,?,?, ?)");
						$stmt->bind_param("ississis", $company,$row_id['first_name'],$row_id['last_name'],$s,$row_id['hash_code'],$row_id['email'],$row_id['id'],$row_emp['employee_number']);
					}  
					else if($row_emp['invited_emp']==2)
					{
						$stmt= $dbCon->prepare("insert into students (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`) values (?,?,?,?,?,?,?,?)");
						$stmt->bind_param("ississi", $company,$row_id['first_name'],$row_id['last_name'],$s,$row_id['hash_code'],$row_id['email'],$row_id['id']);
					}  
					//echo $company_id."-".$row_id['first_name']."-".$row_id['last_name']."-".$s."-".$row_id['hash_code']."-".$row_id['email']."-".$row_id['id']; die;
					
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
						//$stmt->execute();
						
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
							$stmt= $dbCon->prepare("select id from property_location where company_id=? and is_headquarter=1");
							$stmt->bind_param("i", $company);
							$stmt->execute();
							$result = $stmt->get_result();
							$row_location = $result->fetch_assoc();
							
							$stmt= $dbCon->prepare("insert into user_company_profile (location_id,company_id,user_login_id,title,email) values (?, ?,?,?,?)");
							$stmt->bind_param("iiiss", $row_location['id'],$company,$row_id['id'],$row_emp['title'],$row_emp['work_email']);
							$stmt->execute();
						}
						else
						{
							if($row_virtual['job_function']=="" || $row_virtual['job_function']==null)
							{
								$row_virtual['job_function']=1;
							}
							if($row_virtual['location_id']==null || $row_virtual['location_id']=='')
							{
							$stmt= $dbCon->prepare("select id from property_location where company_id=? and is_headquarter=1");
							$stmt->bind_param("i", $company);
							$stmt->execute();
							$result = $stmt->get_result();
							$row_location = $result->fetch_assoc();
							$row_virtual['location_id']=$row_location['id'];
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
			}
			
			$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where company_id=?");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("i", $company);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_invited = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where company_id=? and real_employee_id is not null");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("i", $company);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_invited_approved = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select count(id) as num from employee_request_cloud where company_id=?");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("i", $company);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_request = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select count(id) as num from employee_request_cloud where company_id=? and is_approved=1");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("i", $company);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_request_approved = $result->fetch_assoc();
			
			$total_request=$row_invited['num']+$row_request['num'];
			$total_request_approved=$row_invited_approved['num']+$row_request_approved['num'];
			$completed=($total_request_approved/$total_request)*100;
			$completed=round($completed,0);
			
			$stmt = $dbCon->prepare("update company_profiles set completed_requests=? where company_id=?");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("ii", $completed,$company);
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
			
			$stmt = $dbCon->prepare("update employee_selected_service_todos set is_selected=1 where company_id=? and professional_subcategory_id=? and employee_id=?");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("iii", $company,$row_emp['professional_subcategory_id'],$rowEmp['id']);
			$stmt->execute();
			
			
			$fields=array();
			$fields=$row_id;
			$fields['qloudid']=$request_id;
			$fields['stat']=$data['stat'];
			//print_r($fields); //die;
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
			
			curl_close ($ch);
			
			if($result==0)
			{
				 
				$stmt->close();
				$dbCon->close();
				return $data['cid'];
			}
			else
			{
				 
				$stmt->close();
				$dbCon->close();
				return $data['cid'];
			}
			
			
			
		}
		
		
		function verifyEmployeeDetailCreateAccount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$invitation_id=$this->encrypt_decrypt('decrypt',$data['invitation_id']);
			
			$codeInfo=$this->invitationVerifyUserDetail($data);
			
			
			$stmt = $dbCon->prepare("select id from user_logins where email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $codeInfo['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCheck = $result->fetch_assoc();	
			
			if(empty($rowCheck))
			{
			$stmt = $dbCon->prepare("select user_logins.id,country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where country_of_residence=? and phone_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $codeInfo['country_id'],$codeInfo['phone_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCheck = $result->fetch_assoc();	
			if(!empty($rowCheck))
			{
			$stmt = $dbCon->prepare("update user_profiles   set phone_number='' where user_logins_id=?");
			$stmt->bind_param("i", $rowCheck['id']);
			$stmt->execute();	
			}
			
			$stmt = $dbCon->prepare("update user_visiting_countries   set phone_number='' where country_info=?  and phone_number=?");
			$stmt->bind_param("is", $codeInfo['country_id'],$codeInfo['phone_number']);
			$stmt->execute();	
			$rf=0;	
			$st=1;
			$came_from=8;
			$data['random_hash'] = substr(md5(uniqid(rand(), true)), 16, 16);
			$stmt = $dbCon->prepare("INSERT INTO user_logins (first_name,last_name,registered_from,get_started_wizard_status,email,  email_verification_code , created_on , modified_on, country_of_residence,verification_status,user_came_from) VALUES (?, ?, ?, ?,   ?, ?, now(), now(), ?, ?,?)");
			$stmt->bind_param("ssiissiii", $codeInfo['first_name'], $codeInfo['last_name'],$st,$st,$codeInfo['email'], $data['random_hash'], $codeInfo['buyer_country_id'],$rf,$came_from);
			$stmt->execute();
			$data['user_id']=$stmt->insert_id;	
			$stmt = $dbCon->prepare("INSERT INTO user_profiles (user_logins_id,phone_number ) VALUES (?, ?)");
			$stmt->bind_param("is", $data['user_id'], $codeInfo['phone_number']);
			$stmt->execute();
			}
			else
			{
			$data['user_id']=$rowCheck['id'];		
			}
			
			
			$stmt = $dbCon->prepare("update estore_employee_invite set name=?,last_name=?,email=?,phone_country_id_invite=?,phone=?,real_employee_id=? where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("sssisii", $codeInfo['first_name'],$codeInfo['last_name'],$codeInfo['email'],$codeInfo['country_id'],$codeInfo['phone_number'],$data['user_id'],$invitation_id);
			$stmt->execute();
			$this->approveUserEmployeeRequest($data);
			$this->deleteNewEmployeeDetails($data);
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		
		function invitationDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$invitation_id=$this->encrypt_decrypt('decrypt',$data['invitation_id']);
			
			$stmt = $dbCon->prepare("select * from estore_employee_invite where id=?");
			$stmt->bind_param("i",$invitation_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("select unique_id from invitation where invited_user_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $invitation_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUnique= $result->fetch_assoc();
			
			$row['unique_id']=$rowUnique['unique_id'];
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		
		
		function invitationVerifyUserDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$invitation_id=$this->encrypt_decrypt('decrypt',$data['invitation_id']);
			
			$stmt = $dbCon->prepare("select * from estore_employee_invite_newinfo where invitation_id=?");
			$stmt->bind_param("i",$invitation_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		
		function addEmployeeDetails($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$invitation_id=$this->encrypt_decrypt('decrypt',$data['invitation_id']);
			
			$code=mt_rand(1111,9999); 
			$code1=mt_rand(1111,9999); 
			$_POST['fname']=htmlentities($_POST['fname'],ENT_NOQUOTES, 'ISO-8859-1');
			$_POST['lname']=htmlentities($_POST['lname'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("INSERT INTO estore_employee_invite_newinfo (invitation_id,first_name,last_name,email,country_id,phone_number,email_otp,phone_otp) VALUES (?, ?, ?, ?,?, ?, ?, ?)");
			$stmt->bind_param("isssissi",$invitation_id,$_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['country'],$_POST['pnumber'],$code,$code1);
			$stmt->execute(); 
			
			
			//print_r($_POST); die;
			$stmt = $dbCon->prepare("select country_code,country_name from phone_country_code where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['country']);
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
			

			$subject='Verify email';
			$emailContent='<html><head></head><body><table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;width:830px;margin:0px;padding:0px"><tbody><tr><td width="100%" cellpadding="5" cellspacing="0" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;padding:20px 0px"><table align="center" width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse"><tbody><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size:12px;color:rgb(176,174,167);text-align:center"></td></tr></tbody></table></td></tr><tr><td width="100%" cellpadding="0" cellspacing="0" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif"><table align="center" width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse;width:600px;background-color:rgb(255,255,255)"><tbody><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;background-color:rgb(255,222,0);text-align:center;padding:30px 0px"><a href="https://postmarkapp.com/" style="color:rgb(0,123,200);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://postmarkapp.com/&amp;source=gmail&amp;ust=1714470951601000&amp;usg=AOvVaw1IlmOKm1Kz0CHX9UeDm7Nf"><img label="Logo" src="https://ci3.googleusercontent.com/meips/ADKq_NYdFirJRDQzgqhjdT59ek4mTs8iK7-nx1SG2xQIVeqQG-2IK4X5jE7Ncx8U0_71FgTwvZejIXF-YhZC2LAUeclJcPoWIlDrmwMRxJH6T1iU9ZiUkic=s0-d-e1-ft#https://newsletter.postmarkapp.com/assets/images/pm_logo@2x.png" width="200" alt="ActiveCampaign Postmark" style="border:none;vertical-align:middle" class="CToWUd" data-bit="iit"></a></td></tr><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;background-color:rgb(255,255,255);padding:50px 50px 20px"><p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:left;margin-top:0px;font-size:21px;margin-bottom:25px;color:rgb(64,64,64);font-weight:700">Hi '.$_POST['fname'].',</p><p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:left;margin-top:0px;font-size:14px;margin-bottom:25px;color:rgb(64,64,64)">Please enter this code to verify your email</p><p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:left;margin-top:0px;font-size:14px;margin-bottom:25px;color:rgb(64,64,64)"><code style="font-family:&quot;Andale Mono&quot;,&quot;Lucida Console&quot;,Courier,monospace,serif;font-size:32px;letter-spacing:0.1em">'.$code.'</code></p><p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:left;margin-top:0px;font-size:12px;margin-bottom:25px;color:rgb(64,64,64)">This code is valid for 10 minutes.</p><p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:left;margin-top:0px;font-size:14px;margin-bottom:25px;color:rgb(64,64,64)">Thanks,<span>&nbsp;</span><br>The Postmark Team<br></p></td></tr><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;background-color:rgb(255,222,0);padding:15px 50px"><table width="100%" cellpadding="0" cellspacing="0" align="right" valign="middle" style="border-collapse:collapse;font-size:14px;text-align:center"><tbody><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;text-align:center"><span>Follow us on</span><span>&nbsp;</span><img src="https://ci3.googleusercontent.com/meips/ADKq_NaEXJyuE5toxDeIGJor_2bbXVOZXM4jJlpFWxxkfgnaMGxbv7swGfYB0GMAQF-l9EJ44JB0WVTJkt_fN__hAJr3ZabbnMDBE_E4EEuPIecpvQb3cP43UH0uMA=s0-d-e1-ft#https://newsletter.postmarkapp.com/assets/images/twitter-dark@2x.png" alt="Twitter Logo" width="18" height="15" class="CToWUd" data-bit="iit"><span>&nbsp;</span><a href="https://twitter.com/postmarkapp" style="color:rgb(39,39,39);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://twitter.com/postmarkapp&amp;source=gmail&amp;ust=1714470951601000&amp;usg=AOvVaw3s-v5HJ0vEzngALjQwVnjR">Twitter</a><span>&nbsp;</span>and<span>&nbsp;</span><img src="https://ci3.googleusercontent.com/meips/ADKq_NbnpqLAYgtcsf0FeLE0KMWR5J8iDDJumLuiP0wBPx0nV3cE0hmwPb7g5NQYs2JXYfU2GakXkw-T0gaEdFvXPbsugXiOw0tjPy_UHtaZwYUEVrF0sScY0LbQFKY=s0-d-e1-ft#https://newsletter.postmarkapp.com/assets/images/linkedin-dark@2x.png" alt="LinekdIn Logo" width="15" height="15" class="CToWUd" data-bit="iit"><span>&nbsp;</span><a href="https://www.linkedin.com/company/postmarkapp" style="color:rgb(39,39,39);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.linkedin.com/company/postmarkapp&amp;source=gmail&amp;ust=1714470951601000&amp;usg=AOvVaw067zD56pI3jnDxpzKO1nQT">LinkedIn</a></td></tr></tbody></table></td></tr><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size:14px;background-color:rgb(59,64,73);color:rgb(255,255,255);padding:0px 50px"><p style="color:rgb(255,255,255);text-align:center;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;font-size:14px;margin:12px 0px"><img data-emoji="??" class="an1" alt="??" aria-label="??" draggable="false" src="https://fonts.gstatic.com/s/e/notoemoji/15.0/1f48c/72.png" loading="lazy"><span>&nbsp;</span><a href="https://postmarkapp.com/newsletter" style="color:rgba(255,255,255,0.5);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://postmarkapp.com/newsletter&amp;source=gmail&amp;ust=1714470951601000&amp;usg=AOvVaw2ce0SiO7NRI-6-x8zqedHW">Subscribe to the Postmark newsletter</a></p></td></tr></tbody></table></td></tr><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size:14px;background-color:rgb(238,236,228);color:rgb(255,255,255);border-top-width:0px;padding:16px 50px"><div style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:center;font-size:14px;color:rgb(176,174,167);margin:0px"><a href="https://www.activecampaign.com/?utm_source=postmark&amp;utm_medium=email" style="color:rgb(176,174,167);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.activecampaign.com/?utm_source%3Dpostmark%26utm_medium%3Demail&amp;source=gmail&amp;ust=1714470951601000&amp;usg=AOvVaw36881pBl0tHnLJt7BppN02">ActiveCampaign</a><span>&nbsp;</span>LLC, 1 North Dearborn St, 5th Floor, Chicago, IL 60602</div></td></tr></tbody></table></body></html>';
			$to            = $_POST['email'];
			$res= sendEmail($subject, $to, $emailContent);
			
			$invitationDetail=$this->invitationDetail($data);
			
			$stmt = $dbCon->prepare("select unique_id from invitation where invited_user_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $invitation_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUnique= $result->fetch_assoc();
			
			$subject='Verify email Unique ID';
			$emailContent='<html><head></head><body><table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;width:830px;margin:0px;padding:0px"><tbody><tr><td width="100%" cellpadding="5" cellspacing="0" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;padding:20px 0px"><table align="center" width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse"><tbody><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size:12px;color:rgb(176,174,167);text-align:center"></td></tr></tbody></table></td></tr><tr><td width="100%" cellpadding="0" cellspacing="0" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif"><table align="center" width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse;width:600px;background-color:rgb(255,255,255)"><tbody><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;background-color:rgb(255,222,0);text-align:center;padding:30px 0px"><a href="https://postmarkapp.com/" style="color:rgb(0,123,200);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://postmarkapp.com/&amp;source=gmail&amp;ust=1714470951601000&amp;usg=AOvVaw1IlmOKm1Kz0CHX9UeDm7Nf"><img label="Logo" src="https://ci3.googleusercontent.com/meips/ADKq_NYdFirJRDQzgqhjdT59ek4mTs8iK7-nx1SG2xQIVeqQG-2IK4X5jE7Ncx8U0_71FgTwvZejIXF-YhZC2LAUeclJcPoWIlDrmwMRxJH6T1iU9ZiUkic=s0-d-e1-ft#https://newsletter.postmarkapp.com/assets/images/pm_logo@2x.png" width="200" alt="ActiveCampaign Postmark" style="border:none;vertical-align:middle" class="CToWUd" data-bit="iit"></a></td></tr><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;background-color:rgb(255,255,255);padding:50px 50px 20px"><p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:left;margin-top:0px;font-size:21px;margin-bottom:25px;color:rgb(64,64,64);font-weight:700">Hi '.$invitationDetail['name'].',</p><p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:left;margin-top:0px;font-size:14px;margin-bottom:25px;color:rgb(64,64,64)">Please enter this unique id to verify your email</p><p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:left;margin-top:0px;font-size:14px;margin-bottom:25px;color:rgb(64,64,64)"><code style="font-family:&quot;Andale Mono&quot;,&quot;Lucida Console&quot;,Courier,monospace,serif;font-size:32px;letter-spacing:0.1em">'.$rowUnique['unique_id'].'</code></p><p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:left;margin-top:0px;font-size:12px;margin-bottom:25px;color:rgb(64,64,64)">This code is valid for 10 minutes.</p><p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:left;margin-top:0px;font-size:14px;margin-bottom:25px;color:rgb(64,64,64)">Thanks,<span>&nbsp;</span><br>The Postmark Team<br></p></td></tr><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;background-color:rgb(255,222,0);padding:15px 50px"><table width="100%" cellpadding="0" cellspacing="0" align="right" valign="middle" style="border-collapse:collapse;font-size:14px;text-align:center"><tbody><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;text-align:center"><span>Follow us on</span><span>&nbsp;</span><img src="https://ci3.googleusercontent.com/meips/ADKq_NaEXJyuE5toxDeIGJor_2bbXVOZXM4jJlpFWxxkfgnaMGxbv7swGfYB0GMAQF-l9EJ44JB0WVTJkt_fN__hAJr3ZabbnMDBE_E4EEuPIecpvQb3cP43UH0uMA=s0-d-e1-ft#https://newsletter.postmarkapp.com/assets/images/twitter-dark@2x.png" alt="Twitter Logo" width="18" height="15" class="CToWUd" data-bit="iit"><span>&nbsp;</span><a href="https://twitter.com/postmarkapp" style="color:rgb(39,39,39);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://twitter.com/postmarkapp&amp;source=gmail&amp;ust=1714470951601000&amp;usg=AOvVaw3s-v5HJ0vEzngALjQwVnjR">Twitter</a><span>&nbsp;</span>and<span>&nbsp;</span><img src="https://ci3.googleusercontent.com/meips/ADKq_NbnpqLAYgtcsf0FeLE0KMWR5J8iDDJumLuiP0wBPx0nV3cE0hmwPb7g5NQYs2JXYfU2GakXkw-T0gaEdFvXPbsugXiOw0tjPy_UHtaZwYUEVrF0sScY0LbQFKY=s0-d-e1-ft#https://newsletter.postmarkapp.com/assets/images/linkedin-dark@2x.png" alt="LinekdIn Logo" width="15" height="15" class="CToWUd" data-bit="iit"><span>&nbsp;</span><a href="https://www.linkedin.com/company/postmarkapp" style="color:rgb(39,39,39);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.linkedin.com/company/postmarkapp&amp;source=gmail&amp;ust=1714470951601000&amp;usg=AOvVaw067zD56pI3jnDxpzKO1nQT">LinkedIn</a></td></tr></tbody></table></td></tr><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size:14px;background-color:rgb(59,64,73);color:rgb(255,255,255);padding:0px 50px"><p style="color:rgb(255,255,255);text-align:center;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;font-size:14px;margin:12px 0px"><img data-emoji="??" class="an1" alt="??" aria-label="??" draggable="false" src="https://fonts.gstatic.com/s/e/notoemoji/15.0/1f48c/72.png" loading="lazy"><span>&nbsp;</span><a href="https://postmarkapp.com/newsletter" style="color:rgba(255,255,255,0.5);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://postmarkapp.com/newsletter&amp;source=gmail&amp;ust=1714470951601000&amp;usg=AOvVaw2ce0SiO7NRI-6-x8zqedHW">Subscribe to the Postmark newsletter</a></p></td></tr></tbody></table></td></tr><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size:14px;background-color:rgb(238,236,228);color:rgb(255,255,255);border-top-width:0px;padding:16px 50px"><div style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:center;font-size:14px;color:rgb(176,174,167);margin:0px"><a href="https://www.activecampaign.com/?utm_source=postmark&amp;utm_medium=email" style="color:rgb(176,174,167);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.activecampaign.com/?utm_source%3Dpostmark%26utm_medium%3Demail&amp;source=gmail&amp;ust=1714470951601000&amp;usg=AOvVaw36881pBl0tHnLJt7BppN02">ActiveCampaign</a><span>&nbsp;</span>LLC, 1 North Dearborn St, 5th Floor, Chicago, IL 60602</div></td></tr></tbody></table></body></html>';
			$to            = $invitationDetail['email'];
			$res= sendEmail($subject, $to, $emailContent);
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		
		
		function encodeSubscription($data)
		{
			
			return $this->encrypt_decrypt('encrypt',$data['subscription_type']);
		}
		
		function decodeDomainID($data)
		{
			
			return $this->encrypt_decrypt('decrypt',$data['domain_id']);
		}
		
		function updateLicenceNumber()
		{
			$dbCon = AppModel::createConnection();
			$verifyIP = $this->verifyIP();
		    $stmt = $dbCon->prepare("update user_signup_licence_selected set licence_number=? where professional_subcategory_id=? and ip_address=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iis", $_POST['id'],$_POST['sid'],$verifyIP);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
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
		
		
		function fetchLicenceNumber()
		{
			$dbCon = AppModel::createConnection();
			$verifyIP = $this->verifyIP();
		    $stmt = $dbCon->prepare("select * from user_signup_licence_selected  where ip_address=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s",$verifyIP);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 $org=0;
			while($row = $result1->fetch_assoc())
			{
				$org=$org+($row['service_price']*$row['licence_number']);
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function selectedMarketplaceFeeAccountDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$marketplace_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$verifyIP = $this->verifyIP();
			
			$stmt = $dbCon->prepare("delete from user_signup_licence_selected where ip_address=?");
			$stmt->bind_param("s", $verifyIP);
			$stmt->execute();
			
			if($data['subscription_selected']==1)
			{
			$stmt = $dbCon->prepare("select professional_subcategory_id,user_licence_required,professional_description,professional_marketplace_service_todos.id,is_selected,subcategory_name,subcategory_image from professional_marketplace_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_marketplace_service_todos.professional_subcategory_id where  professional_marketplace_service_todos.marketplace_id=? and is_service_active=1 and free_services=1 and is_selected=1");	
			}
			else if($data['subscription_selected']==2)
			{
			$stmt = $dbCon->prepare("select professional_subcategory_id,user_licence_required,professional_description,professional_marketplace_service_todos.id,is_selected,subcategory_name,subcategory_image from professional_marketplace_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_marketplace_service_todos.professional_subcategory_id where  professional_marketplace_service_todos.marketplace_id=? and is_service_active=1 and gold_services=1 and is_selected=1");	
			}
			else if($data['subscription_selected']==3)
			{
			$stmt = $dbCon->prepare("select professional_subcategory_id,user_licence_required,professional_description,professional_marketplace_service_todos.id,is_selected,subcategory_name,subcategory_image from professional_marketplace_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_marketplace_service_todos.professional_subcategory_id where  professional_marketplace_service_todos.marketplace_id=? and is_service_active=1 and premium_services=1 and is_selected=1");	
			}
			$stmt->bind_param("i", $marketplace_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 $org=array();
			while($row = $result1->fetch_assoc())
			{
				
				
				$stmt = $dbCon->prepare("select * from dishes_detail_information where professional_subcategory_id=? and company_id=601907");
				$stmt->bind_param("i", $row['professional_subcategory_id']);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$row2 = $result2->fetch_assoc();
				$row['service_price']=$row2['dish_price'];
				 
				$stmt = $dbCon->prepare("INSERT INTO user_signup_licence_selected (marketplace_id,ip_address, professional_subcategory_id, service_price) VALUES (?, ?, ?, ?)");
				$stmt->bind_param("isii",$marketplace_id,$verifyIP,$row['professional_subcategory_id'],$row['service_price']);
				$stmt->execute(); 
				 
				if($row['subcategory_image']!=null || $row['subcategory_image']!="") { 
						 
						 $filename="../estorecss/".$row ['subcategory_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['subcategory_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['subcategory_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/notavailable.jpg"; }
						 
							$img='<div class="card__preview" style="width: 161px;padding: 30px;"><img srcset="../../../'.$imgs.'" src="../../../'.$imgs.'" alt="London - Kings Cross" style="
												padding: 20px;
												border-radius: 30px;
											">
											 
											</div>';
																	
																	 } else { $img='<div class="card__preview" style="width: 161px;padding: 30px;"><img srcset="https://qloudid.com/html/usercontent/images/notavailable.jpg" src="https://qloudid.com/html/usercontent/images/notavailable.jpg" alt="London - Kings Cross" style="
																					padding: 20px;
																					border-radius: 30px;
																				">
																				 
																				</div>'; 
																	 }
																	 
				//$row['img']=$img;
				array_push($org,$row);
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function selectedMarketplaceGoldAccountDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$marketplace_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select professional_description,professional_marketplace_service_todos.id,is_selected,subcategory_name,subcategory_image from professional_marketplace_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_marketplace_service_todos.professional_subcategory_id where  professional_marketplace_service_todos.marketplace_id=? and is_service_active=1 and gold_services=1 and is_selected=1");
			$stmt->bind_param("i", $marketplace_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 $org=array();
			while($row = $result1->fetch_assoc())
			{
				 
				if($row['subcategory_image']!=null || $row['subcategory_image']!="") { 
						 
						 $filename="../estorecss/".$row ['subcategory_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['subcategory_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['subcategory_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/notavailable.jpg"; }
						 
							$img='<div class="card__preview" style="width: 161px;padding: 30px;"><img srcset="../../../'.$imgs.'" src="../../../'.$imgs.'" alt="London - Kings Cross" style="
												padding: 20px;
												border-radius: 30px;
											">
											 
											</div>';
																	
																	 } else { $img='<div class="card__preview" style="width: 161px;padding: 30px;"><img srcset="https://qloudid.com/html/usercontent/images/notavailable.jpg" src="https://qloudid.com/html/usercontent/images/notavailable.jpg" alt="London - Kings Cross" style="
																					padding: 20px;
																					border-radius: 30px;
																				">
																				 
																				</div>'; 
																	 }
																	 
				$row['img']=$img;
				array_push($org,$row);
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function selectedMarketplacePremiumAccountDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$marketplace_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select professional_description,professional_marketplace_service_todos.id,is_selected,subcategory_name,subcategory_image from professional_marketplace_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_marketplace_service_todos.professional_subcategory_id where  professional_marketplace_service_todos.marketplace_id=? and is_service_active=1 and premium_services=1 and is_selected=1");
			$stmt->bind_param("i", $marketplace_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 $org=array();
			while($row = $result1->fetch_assoc())
			{
				 
				if($row['subcategory_image']!=null || $row['subcategory_image']!="") { 
						 
						 $filename="../estorecss/".$row ['subcategory_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['subcategory_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['subcategory_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/notavailable.jpg"; }
						 
							$img='<div class="card__preview" style="width: 161px;padding: 30px;"><img srcset="../../../'.$imgs.'" src="../../../'.$imgs.'" alt="London - Kings Cross" style="
												padding: 20px;
												border-radius: 30px;
											">
											 
											</div>';
																	
																	 } else { $img='<div class="card__preview" style="width: 161px;padding: 30px;"><img srcset="https://qloudid.com/html/usercontent/images/notavailable.jpg" src="https://qloudid.com/html/usercontent/images/notavailable.jpg" alt="London - Kings Cross" style="
																					padding: 20px;
																					border-radius: 30px;
																				">
																				 
																				</div>'; 
																	 }
																	 
				$row['img']=$img;
				array_push($org,$row);
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		
		function selectedMarketplaceSubscriptionServicesDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$marketplace_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select free_services,gold_services,premium_services,professional_description,professional_marketplace_service_todos.id,is_selected,subcategory_name,subcategory_image from professional_marketplace_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_marketplace_service_todos.professional_subcategory_id where  professional_marketplace_service_todos.marketplace_id=? and is_service_active=1 and is_selected=1");
			$stmt->bind_param("i", $marketplace_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 $org=array();
			while($row = $result1->fetch_assoc())
			{
				$row['professional_description']=strip_tags(html_entity_decode($row['professional_description']));
				  if(($row['free_services']+$row['gold_services']+$row['premium_services'])==0)
					  continue;
																	 
				array_push($org,$row);
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		
		
	function updateCompanyCardPayment($data)
		{
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$subscription_type=$this->encrypt_decrypt('decrypt',$data['subscription_type']); 
			$stmt = $dbCon->prepare("select * from professional_marketplace where id=?");
			$stmt->bind_param("i", $domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select company_name,company_email from companies where id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCompanyName = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select email from employees where company_id=? and user_login_id!=43");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUserEmail = $result->fetch_assoc();
			
			$licencePrice=$this->fetchLicenceNumber();
			if($subscription_type==2)
			{
				$payment_term=$row['gold_account_payment_term'];
				$row['total_price']=$row['gold_account_subscription_fee']+$licencePrice;
			}
			else if($subscription_type==3)
			{
				$payment_term=$row['premium_account_payment_term'];
				$row['total_price']=$row['premium_account_subscription_fee']+$licencePrice;
			}
			else
			{
				$payment_term=1;
				$row['total_price']=$licencePrice;
			}
			//$a=explode('-',$_POST['exp_date']);
			 
			$stmt = $dbCon->prepare("INSERT INTO company_cards (card_number, company_id, card_cvv,exp_month,exp_year,created_on) VALUES (?, ?, ?,?,?,now())");
			$stmt->bind_param("siiii",$_POST['card_number'],$company_id,$_POST['cvv'],$_POST['expiry_month'],$_POST['expiry_year']);
			$stmt->execute();
			$id=$stmt->insert_id;
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=4242424242424242&card[exp_month]=2&card[exp_year]=2040&card[cvc]=314");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);
			$a=json_decode($result,true);
			 
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "name=Superagent&email=qloudsuperagent@qualeefy.com&source=".$a['id']."&description=My");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);
			$b=json_decode($result,true);
			$cuId=$b['id'];
			
			$total_price=$row['total_price']*100;
			if($total_price<500)
			{
				$total_price=500;
			}
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "customer=".$b['id']."&amount=".$total_price."&currency=sek&description=My");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);			
			$c=json_decode($result,true);
			$Chargeid=$c['id'];	
			
			$today=strtotime(date('Y-m-d'));
			$nextPay=strtotime("+1 month", $today);
			$stmt = $dbCon->prepare("update cleaning_company_premium_account_request set subscribed_on=?, last_payment_date=?, next_payment_date=?, is_paid=1, selected_subscription=?, is_approved=1, card_id=?, charge_id=?, customer_id=? where company_id=? and domain_id=?");
			$stmt->bind_param("sssiissii",$today,$today,$nextPay,$subscription_type,$id,$Chargeid,$cuId, $company_id,$domain_id);
			$stmt->execute();	
			$subscriptionFee=$row['total_price']-$licencePrice;
			if(empty($rowUserEmail))
			{
				$to='kowaken.ghirmai@gmail.com';
			}
			else
			{
				$to=$rowUserEmail['email'];
			}
			$subject="Subsription invoice";
			$emailContent='<table width="100%" cellpadding="0" cellspacing="0" style="color:rgb(39,39,39);font-family:Helvetica;font-size:12px;font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:start;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(238,236,228);text-decoration:none;border-collapse:collapse;width:830px;margin:0px;padding:0px"><tbody><tr><td align="center" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif"><table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;width:830px;margin:0px;padding:0px"><tbody><tr><td width="100%" cellpadding="5" cellspacing="0" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;padding:20px 0px"><table align="center" width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse"><tbody><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size:12px;color:rgb(176,174,167);text-align:center"></td></tr></tbody></table></td></tr><tr><td width="100%" cellpadding="0" cellspacing="0" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif"><table align="center" width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse;width:600px;background-color:rgb(255,255,255)"><tbody><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;background-color:rgb(255,222,0);text-align:center;padding:30px 0px"><a href="javascript:void(0);" style="color:rgb(0,123,200);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="javascript:void(0);"><img label="Logo" src="https://ci3.googleusercontent.com/meips/ADKq_NYdFirJRDQzgqhjdT59ek4mTs8iK7-nx1SG2xQIVeqQG-2IK4X5jE7Ncx8U0_71FgTwvZejIXF-YhZC2LAUeclJcPoWIlDrmwMRxJH6T1iU9ZiUkic=s0-d-e1-ft#https://newsletter.postmarkapp.com/assets/images/pm_logo@2x.png" width="200" alt="ActiveCampaign Postmark" style="border:none;vertical-align:middle" class="CToWUd" data-bit="iit"></a></td></tr><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;background-color:rgb(255,255,255);padding:50px 50px 20px"><p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:left;margin-top:0px;font-size:21px;margin-bottom:25px;color:rgb(64,64,64);font-weight:700"><img data-emoji="❤️" class="an1" alt="❤️" aria-label="❤️" draggable="false" src="https://fonts.gstatic.com/s/e/notoemoji/15.0/2764_fe0f/72.png" loading="lazy"> Thanks for using '.$row['marketplace_name'].'</p><p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:left;margin-top:0px;font-size:14px;margin-bottom:25px;color:rgb(64,64,64)">We’ve successfully charged your credit card for $'.$row['total_price'].'. The charge will appear on your statement as<span> </span><em style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif">ActiveCampaign, LLC</em>. This includes the cost of licences you have purchased for active services on the subscription.</p><table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse"><tbody><tr><td width="50%" valign="top" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif"><p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:left;margin-top:0px;font-size:14px;margin-bottom:25px;color:rgb(64,64,64)">Pickapro, LLC<br>Paseo de la Castellana 77 Madrid,<br>M 28046</p></td><td width="50%" valign="top" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif"><h3 style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;color:rgb(39,39,39);font-weight:700;margin-top:0px;font-size:14px;text-align:left;margin-bottom:0px">Receipt #'.$Chargeid.'</h3><p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:left;margin-top:0px;font-size:14px;margin-bottom:25px;color:rgb(64,64,64)">Invoice date: '.date('M d, Y').'<span> </span><br>Payment received: '.date('M d, Y').'</p></td></tr><tr><td width="50%" valign="top" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif"><h3 style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;color:rgb(39,39,39);font-weight:700;margin-top:0px;font-size:14px;text-align:left;margin-bottom:0px">Bill to</h3><p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:left;margin-top:0px;font-size:14px;margin-bottom:25px;color:rgb(64,64,64)">'.$rowCompanyName['company_name'].'<span> </span><br></p></td><td width="50%" valign="top" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif"></td></tr></tbody></table><table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;width:500px;border-top-width:3px;border-top-color:rgb(238,236,228);border-top-style:solid;margin:0px 0px 15px;padding:35px 0px"><tbody><tr><td colspan="2" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif"><table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;width:500px;margin:0px;padding:25px 0px 0px"><tbody><tr><td width="80%" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size:14px;border-bottom-width:1px;border-bottom-color:rgb(238,236,228);border-bottom-style:solid;color:rgb(146,146,146);line-height:23px;padding:10px 0px">Subscription fee</td><td width="20%" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;text-align:right;font-size:14px;border-bottom-width:1px;border-bottom-color:rgb(238,236,228);border-bottom-style:solid;color:rgb(146,146,146);line-height:23px;padding:10px 0px">$'.$subscriptionFee.'</td></tr><tr><td width="80%" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size:14px;border-bottom-width:1px;border-bottom-color:rgb(238,236,228);border-bottom-style:solid;color:rgb(146,146,146);line-height:23px;padding:10px 0px">Extra services fee</td><td width="20%" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;text-align:right;font-size:14px;border-bottom-width:1px;border-bottom-color:rgb(238,236,228);border-bottom-style:solid;color:rgb(146,146,146);line-height:23px;padding:10px 0px">$'.$licencePrice.'</td></tr><tr><td width="80%" valign="middle" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;border-bottom-width:1px;border-bottom-color:rgb(238,236,228);border-bottom-style:solid;padding:10px 0px"><div style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:left;font-size:14px;color:rgb(39,39,39);margin:0px;padding:0px 15px 0px 0px">Total</div></td><td width="20%" valign="middle" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;border-bottom-width:1px;border-bottom-color:rgb(238,236,228);border-bottom-style:solid;padding:10px 0px"><div style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:right;font-size:14px;color:rgb(39,39,39);margin:0px">$'.$row['total_price'].'</div></td></tr><tr><td width="80%" valign="middle" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;border-bottom-width:1px;border-bottom-color:rgb(238,236,228);border-bottom-style:solid;padding:10px 0px"><div style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:left;font-size:14px;color:rgb(39,39,39);margin:0px;padding:0px 15px 0px 0px">Amount paid with card(ending in '.substr($_POST['card_number'],0,-4).')</div></td><td width="20%" valign="middle" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;border-bottom-width:1px;border-bottom-color:rgb(238,236,228);border-bottom-style:solid;padding:10px 0px"><div style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:right;font-size:14px;color:rgb(39,39,39);margin:0px">$'.$row['total_price'].'</div></td></tr></tbody></table></td></tr></tbody></table><p style="margin-top:15px;margin-bottom:0px;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:left;font-size:14px;color:rgb(64,64,64)">You can also view a history of your receipts by<span>&nbsp;</span><a href="javascript:void(0);" style="color:rgb(0,123,200);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="javascript:void(0);">logging into your '.$row['marketplace_name'].' account</a>. If you have any questions, feel free to reply to this email.</p></td></tr><tr><td height="20" width="100%" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;color:rgb(255,255,255);line-height:1">-</td></tr><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;background-color:rgb(246,244,250);text-align:center;border-top-width:1px;border-top-color:rgb(226,219,240);border-top-style:solid;padding:30px 50px 40px"><div style="margin-bottom:14px"><img src="https://ci3.googleusercontent.com/meips/ADKq_NYnnTb4jZRifeM7xIuTfLtuKTar33fQ9RhxnWtrCWm5o90WgePiFCWXRnHa9moe9XX76oTBIXRsGNgTDIZds8e4laFyCJLUBgP4k3TWZbW8Ip9Be80M7sJuRB3RG_Z0YkmcbmH2fAiswO3d=s0-d-e1-ft#https://newsletter.postmarkapp.com/assets/images/dmarc-digests/dmarcdigests-ident.png" width="26" class="CToWUd" data-bit="iit"></div><h2 style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;margin-top:0px;color:rgb(66,46,107);font-weight:500;text-align:center;font-size:16px;margin-bottom:4px">Protect your brand from email scammers</h2><p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:center;font-size:14px;color:rgb(88,61,143);margin:0px 0px 15px">Monitor who’s sending email using your domains and protect your brand from spoofing and phishing attacks with DMARC Digests.</p></td></tr><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;background-color:rgb(255,222,0);padding:15px 50px"><table width="100%" cellpadding="0" cellspacing="0" align="right" valign="middle" style="border-collapse:collapse;font-size:14px;text-align:center"><tbody><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;text-align:center"><span>Follow us on</span><span>&nbsp;</span><img src="https://ci3.googleusercontent.com/meips/ADKq_NaEXJyuE5toxDeIGJor_2bbXVOZXM4jJlpFWxxkfgnaMGxbv7swGfYB0GMAQF-l9EJ44JB0WVTJkt_fN__hAJr3ZabbnMDBE_E4EEuPIecpvQb3cP43UH0uMA=s0-d-e1-ft#https://newsletter.postmarkapp.com/assets/images/twitter-dark@2x.png" alt="Twitter Logo" width="18" height="15" class="CToWUd" data-bit="iit"><span>&nbsp;</span><a href="https://click.pstmrk.it/3s/twitter.com%2Fpostmarkapp/I54/omO0AQ/AQ/fc4996d3-c38b-4eb4-87c4-96e57759d663/5/iK88tSr3VM" style="color:rgb(39,39,39);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/twitter.com%252Fpostmarkapp/I54/omO0AQ/AQ/fc4996d3-c38b-4eb4-87c4-96e57759d663/5/iK88tSr3VM&amp;source=gmail&amp;ust=1713493741023000&amp;usg=AOvVaw2HQEuWjS7zvV_tQACXeG2k">Twitter</a><span>&nbsp;</span>and<span>&nbsp;</span><img src="https://ci3.googleusercontent.com/meips/ADKq_NbnpqLAYgtcsf0FeLE0KMWR5J8iDDJumLuiP0wBPx0nV3cE0hmwPb7g5NQYs2JXYfU2GakXkw-T0gaEdFvXPbsugXiOw0tjPy_UHtaZwYUEVrF0sScY0LbQFKY=s0-d-e1-ft#https://newsletter.postmarkapp.com/assets/images/linkedin-dark@2x.png" alt="LinekdIn Logo" width="15" height="15" class="CToWUd" data-bit="iit"><span>&nbsp;</span><a href="https://click.pstmrk.it/3s/www.linkedin.com%2Fcompany%2Fpostmarkapp/I54/omO0AQ/AQ/fc4996d3-c38b-4eb4-87c4-96e57759d663/6/0VhC9bv5I0" style="color:rgb(39,39,39);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.linkedin.com%252Fcompany%252Fpostmarkapp/I54/omO0AQ/AQ/fc4996d3-c38b-4eb4-87c4-96e57759d663/6/0VhC9bv5I0&amp;source=gmail&amp;ust=1713493741023000&amp;usg=AOvVaw2vHrMXeX2O3IO-teDYpEhD">LinkedIn</a></td></tr></tbody></table></td></tr><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size:14px;background-color:rgb(59,64,73);color:rgb(255,255,255);padding:0px 50px"><p style="color:rgb(255,255,255);text-align:center;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;font-size:14px;margin:12px 0px"><img data-emoji="💌" class="an1" alt="💌" aria-label="💌" draggable="false" src="https://fonts.gstatic.com/s/e/notoemoji/15.0/1f48c/72.png" loading="lazy"><span>&nbsp;</span><a href="javascript:void(0);" style="color:rgba(255,255,255,0.5);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="javascript:void(0);">Subscribe to the '.$row['marketplace_name'].' newsletter</a></p></td></tr></tbody></table></td></tr><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size:14px;background-color:rgb(238,236,228);color:rgb(255,255,255);border-top-width:0px;padding:16px 50px"><div style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:22px;text-align:center;font-size:14px;color:rgb(176,174,167);margin:0px"><a href="https://click.pstmrk.it/3s/www.activecampaign.com%2F%3Futm_source%3Dpostmark%26utm_medium%3Demail/I54/omO0AQ/AQ/fc4996d3-c38b-4eb4-87c4-96e57759d663/8/YmrUoX_POZ" style="color:rgb(176,174,167);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.activecampaign.com%252F%253Futm_source%253Dpostmark%2526utm_medium%253Demail/I54/omO0AQ/AQ/fc4996d3-c38b-4eb4-87c4-96e57759d663/8/YmrUoX_POZ&amp;source=gmail&amp;ust=1713493741023000&amp;usg=AOvVaw0NnCmFoFIy-fdIKjmk92Dm">ActiveCampaign</a><span>&nbsp;</span>LLC, 1 North Dearborn St, 5th Floor, Chicago, IL 60602</div></td></tr></tbody></table></td></tr></tbody></table>';
			try {
			  sendEmail($subject, $to, $emailContent);
			}

			//catch exception
			catch(Exception $e) {
			 $to='kowaken.ghirmai@gmail.com';
			 sendEmail($subject, $to, $emailContent);
			}
			
			$this->updateLicenceCompany($data);
			$this->sendAddEmployeeEmailToCompany($data);
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}	
			
		function sendAddEmployeeEmailToCompany($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			$stmt = $dbCon->prepare("select email from user_logins where id in (select user_id from manage_employee_permissions where company_id=? and is_admin=1)");
				
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			$to=$row['email'];
			$subject="Account confirmation";
			$emailContent='<html xmlns="http://www.w3.org/1999/xhtml" style="background-color: rgb(240, 240, 240);" class=""><head>
					  <title>Reservation confirmed</title>
					  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
					  <meta charset="utf-8">
					  <meta name="viewport" content="width=device-width, initial-scale=1">
					  <meta http-equiv="X-UA-Compatible" content="IE=edge">
					  <style type="text/css">
						/* GT AMERICA */

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Regular";
						  font-weight: 400;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.ttf") format("truetype");
						}

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Medium";
						  font-weight: 600;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.ttf") format("truetype");
						}

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Condensed Bold";
						  font-weight: 700;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.ttf") format("truetype");
						}

						/* CLIENT-SPECIFIC RESET */

						body,
						table,
						td,
						a {
						  -webkit-text-size-adjust: 100%;
						  -ms-text-size-adjust: 100%;
						}

						/* Prevent WebKit and Windows mobile changing default text sizes */

						table,
						td {
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						}

						/* Remove spacing between tables in Outlook 2007 and up */

						img {
						  -ms-interpolation-mode: bicubic;
						}

						/* Allow smoother rendering of resized image in Internet Explorer */

						.im {
						  color: inherit !important;
						}

						/* DEVICE-SPECIFIC RESET */

						a[x-apple-data-detectors] {
						  color: inherit !important;
						  text-decoration: none !important;
						  font-size: inherit !important;
						  font-family: inherit !important;
						  font-weight: inherit !important;
						  line-height: inherit !important;
						}

						/* iOS BLUE LINKS */

						/* RESET */

						img {
						  border: 0;
						  height: auto;
						  line-height: 100%;
						  outline: none;
						  text-decoration: none;
						  display: block;
						}

						table {
						  border-collapse: collapse;
						}

						table td {
						  border-collapse: collapse;
						  display: table-cell;
						}

						body {
						  height: 100% !important;
						  margin: 0 !important;
						  padding: 0 !important;
						  width: 100% !important;
						}

						/* BG COLORS */

						.mainTable {
						  background-color: #F0F0F0;
						}

						.mainTable--hospitality {
						  background-color: #f7f2ed;
						}

						html {
						  background-color: #F0F0F0;
						}

						/* VARIABLES */

						.bg-white {
						  background-color: white;
						}

						.hr {
						  /* Cross-client horizontal rule. Adapted from https://litmus.com/community/discussions/4633-is-there-a-reliable-1px-horizontal-rule-method */
						  background-color: #d3d3d8;
						  border-collapse: collapse;
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						  mso-line-height-rule: exactly;
						  line-height: 1px;
						}

						.textAlignLeft {
						  text-align: left !important;
						}

						.textAlignRight {
						  text-align: right !important;
						}

						.textAlignCenter {
						  text-align: center !important;
						}

						.mt1 {
						  margin-top: 6px;
						}

						.list {
						  padding-left: 18px;
						  margin: 0;
						}

						/* TYPOGRAPHY */

						body {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  color: #4f4f65;
						  -webkit-font-smoothing: antialiased;
						  -ms-text-size-adjust: 100%;
						  -moz-osx-font-smoothing: grayscale;
						  font-smoothing: always;
						  text-rendering: optimizeLegibility;
						}

						.h1 {
						  font-family: "GT America Condensed Bold", "Roboto Condensed", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 700;
						  vertical-align: middle;
						  font-size: 36px;
						  line-height: 42px;
						}

						.h2 {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 600;
						  vertical-align: middle;
						  font-size: 16px;
						  line-height: 24px;
						}

						.text {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 16px;
						  line-height: 21px;
						}

						.text-list {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 16px;
						  line-height: 25px;
						}

						.textSmall {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 14px;
						}

						.text-xsmall {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-size: 11px;
						  text-transform: uppercase;
						  line-height: 22px;
						  letter-spacing: 1px;
						}

						.text-bold {
						  font-weight: 600;
						}

						.text-link {
						  text-decoration: underline;
						}

						.text-linkNoUnderline {
						  text-decoration: none;
						}

						.text-strike {
						  text-decoration: line-through;
						}

						/* FONT COLORS */

						.textColorDark {
						  color: #23233e;
						}

						.textColorNormal {
						  color: #4f4f65;
						}

						.textColorBlue {
						  color: #2020c0;
						}

						.textColorGrayDark {
						  color: #7B7B8B;
						}

						.textColorGray {
						  color: #A5A8AD;
						}

						.textColorWhite {
						  color: #FFFFFF;
						}

						.textColorRed {
						  color: #df3232;
						}

						/* BUTTON */

						.Button-primary-wrapper {
						  border-radius: 3px;
						  background-color: #2020C0;
						}

						.Button-primary {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  border-radius: 3px;
						  border: 1px solid #2020C0;
						  color: #ffffff;
						  display: block;
						  font-size: 16px;
						  font-weight: 600;
						  padding: 18px;
						  text-decoration: none;
						}

						.Button-secondary-wrapper {
						  border-radius: 3px;
						  background-color: #ffffff;
						}

						.Button-secondary {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  border-radius: 3px;
						  border: 1px solid #2020C0;
						  color: #2020C0;
						  display: block;
						  font-size: 16px;
						  font-weight: 600;
						  padding: 18px;
						  text-decoration: none;
						}

						/* LAYOUT */

						.Content-container {
						  padding-left: 60px;
						  padding-right: 60px;
						}

						.Content-container--main {
						  padding-top: 54px;
						  padding-bottom: 60px;
						}

						.Content {
						  width: 580px;
						  margin: 0 auto;
						}

						.wrapper {
						  max-width: 600px;
						}

						.section {
						  padding: 24px 0px;
						  border-bottom: 1px solid #d3d3d8;
						}

						.section--noBorder {
						  padding: 24px 0px 0;
						}

						.section--last {
						  padding: 24px 0px;
						}

						.message {
						  background-color: #F4F4F5;
						  padding: 18px;
						}

						.card {
						  border: 1px solid #d3d3d8;
						  padding: 18px;
						}

						/* HEADER */

						.header-tockLogoImage {
						  display: block;
						  color: #F0F0F0;
						}

						.header-heroImage {
						  padding-bottom: 24px;
						}

						/* PREHEADER */

						.preheader {
						  display: none;
						  font-size: 1px;
						  color: #FFFFFF;
						  line-height: 1px;
						  max-height: 0px;
						  max-width: 0px;
						  opacity: 0;
						  overflow: hidden;
						}

						/* BANNER */

						.notice {
						  padding: 12px;
						  background: #23233E;
						  color: #FFFFFF;
						  display: block;
						  font-size: 14px;
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 600;
						}

						/* INTRO */

						.section--intro {
						  padding-bottom: 48px;
						}

						/* BOOKING INFO */

						.business-logo__container {
						  width: 48px;
						  height: 48px;
						  border-radius: 3px;
						  border: 1px solid #d3d3d8;
						  overflow: hidden;
						}

						.business-logo__image {
						  border: 1px solid transparent;
						  border-radius: 3px;
						  width: 48px;
						  height: 48px;
						  display: block;
						}

						.business-address--address {
						  width: 50%;
						}

						.business-address--map {
						  width: 50%;
						}

						.business-address--map-image {
						  width: 100%;
						}

						/* MOBILE TICKETS */

						.mobile-ticket--description {
						  width: 65%;
						  margin-top: 12px;
						  margin-right: 5%;
						}

						.mobile-ticket--code {
						  width: 30%;
						}

						.mobile-ticket--code-image {
						  width: 100%;
						}

						/* RESERVATION ACTIONS */

						.linksTable {
						  border-bottom: 1px solid #d3d3d8;
						}

						.linksTableRow {
						  padding: 24px 12px;
						}

						.actions-icon {
						  vertical-align: middle;
						}

						.actions-text {
						  vertical-align: middle;
						}

						/* RECEIPT */

						.receipt__container {
						  border: 1px solid #d3d3d8;
						  padding: 24px;
						}

						.receipt__row {
						  border-top: 1px solid #d3d3d8;
						}

						/* FEEDBACK ICONS */

						.feedback-link {
						  border: 1px solid #d4d5da;
						  border-radius: 3px;
						  display: inline-block;
						  width: calc(32% - 2px);
						  padding: 10px 0;
						}

						.feedback-link-bumper {
						  display: inline-block;
						  width: 1%;
						}

						.feedback-link img {
						  height: 50px;
						  width: 50px;
						}

						/* SOCIAL ICONS */

						.social-link {
						  display: inline-block;
						  width: auto;
						}

						.social-link-text {
						  padding: 14px 24px 14px 14px;
						}

						/* TABLET STYLES */

						@media screen and (max-width: 648px) {
						  /* DEVICE-SPECIFIC RESET */
						  div[style*="margin: 16px 0;"] {
							margin: 0 !important;
						  }
						  /* ANDROID CENTER FIX */
						  /* LAYOUT */
						  .wrapper {
							width: 100% !important;
							max-width: 100% !important;
						  }
						  .Content {
							width: 90% !important;
						  }
						  .Content-container {
							padding-left: 36px !important;
							padding-right: 36px !important;
						  }
						  .Content-container--main {
							padding-top: 30px !important;
							padding-bottom: 42px !important;
						  }
						  .responsiveTable {
							width: 100% !important;
						  }
						  /* RESERVATION ACTIONS */
						  .linksTableRow {
							padding-left: 0 !important;
							padding-right: 0 !important;
							padding-top: 12px !important;
							padding-bottom: 12px !important;
						  }
						  .linksTableRow--borderRight {
							border-right: none !important;
							padding-left: 0 !important;
							padding-right: 0 !important;
						  }
						  /* FEEDBACK LINK */
						  .feedback-link img {
							height: 38px !important;
							width: 38px !important;
						  }
						}

						/* MOBILE STYLES */

						@media screen and (max-width: 480px) {
						  /* TYPOGRAPHY */
						  .h1 {
							font-size: 30px !important;
							line-height: 30px !important;
						  }
						  .text {
							font-size: 16px !important;
							line-height: 22px !important;
						  }
						  /* BUTTON */
						  .mobile-buttonContainer {
							width: 100% !important;
						  }
						  /* LAYOUT */
						  .Content {
							width: 100% !important;
						  }
						  .Content-container {
							padding-left: 18px !important;
							padding-right: 18px !important;
						  }
						  .Content-container--main {
							padding-top: 24px !important;
							padding-bottom: 30px !important;
						  }
						  .section {
							padding: 18px 0 !important;
						  }
						  .section--last {
							padding: 18px 0 !important;
						  }
						  .header {
							padding: 0 18px !important;
						  }
						  .business-address--address {
							width: 100% !important;
						  }
						  .business-address--map {
							margin-top: 30px !important;
							width: 100% !important;
						  }
						  .mobile-ticket--description {
							width: 100% !important;
							margin-top: 0px !important;
						  }
						  .mobile-ticket--code {
							margin-top: 30px !important;
							margin-left: 0;
							width: 100% !important;
						  }
						  /* RECEIPT */
						  .receipt__container {
							padding: 12px !important;
						  }
						  /* SOCIAL ICONS */
						  .social-link {
							display: block !important;
							width: 100% !important;
							border-bottom: 1px solid #d3d3d8 !important;
						  }
						  /* INTRO */
						  .section--intro {
							padding-top: 18px !important;
							padding-bottom: 18px !important;
						  }
						}
					  </style>
					<style id="__web-inspector-hide-shortcut-style__">
.__web-inspector-hide-shortcut__, .__web-inspector-hide-shortcut__ *, .__web-inspector-hidebefore-shortcut__::before, .__web-inspector-hideafter-shortcut__::after
{
    visibility: hidden !important;
}
</style>
</head>

					<body style="margin: 0 !important; padding: 0 !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; height: 100%; margin: 0; padding: 0; width: 100%; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; color: rgb(79, 79, 101); -webkit-font-smoothing: antialiased; -ms-text-size-adjust: 100%; -moz-osx-font-smoothing: grayscale; font-smoothing: always; text-rendering: optimizeLegibility;">
					   
					  <!--[if mso]>
						<style type="text/css">
					.h1 {font-family: "Helvetica", "Arial", sans-serif !important; font-weight: 700 !important; vertical-align: middle !important; font-size: 36px !important; mso-line-height-rule: exactly;line-height: 42px !important;}
					.h2 {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 600 !important;vertical-align: middle !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 24px !important;}
					.text {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 21px !important;}
					.text-list {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 25px !important;}
					.textSmall {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 14px !important;}
					.text-xsmall {font-family: "Helvetica", "Arial", sans-serif !important;font-size: 11px !important;text-transform: uppercase !important;mso-line-height-rule: exactly;line-height: 22px !important;letter-spacing: 1px !important;}
					.text-bold {font-weight: 600 !important;}
					.text-link {text-decoration: underline !important;}
					.text-linkNoUnderline {text-decoration: none !important;}
					.text-strike {text-decoration: line-through !important;}
					.textColorDark {color: #23233e !important;}
					.textColorNormal {color: #4f4f65 !important;}
					.textColorBlue {color: #2020c0 !important;}
					.textColorGray {color: #A5A8AD !important;}
					.textColorWhite {color: #FFFFFF !important;}
					.Button-primary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #ffffff !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
					.Button-secondary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #2020C0 !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
						</style>
						<![endif]-->
					  <!-- HIDDEN PREHEADER TEXT -->
					  <div class="preheader" style="display: none; font-size: 1px; color: rgb(255, 255, 255); line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
					  </div>
					  <table border="0" cellpadding="0" cellspacing="0" width="100%" class=" mainTable  " style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: rgb(240, 240, 240);">
						<tbody>
<tr>
<td style="display:none !important;
					 visibility:hidden;
					 mso-hide:all;
					 font-size:1px;
					 color:#ffffff;
					 line-height:1px;
					 max-height:0px;
					 max-width:0px;
					 opacity:0;
					 overflow:hidden; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> We are thrilled that you will be joining us. If yo... </td>
						<!-- HEADER -->
						</tr>
<tr>
						  <td align="center" class="header" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
							<!--[if (gte mso 9)|(IE)]>
						<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
						<tr>
						<td align="center" valign="top" width="600">
						<![endif]-->
							<table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 580px; margin: 0 auto;">
							  <tbody>
<tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr>
								<td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <h1 style="font-size: 33px;font-weight: 800;line-height: 30px;">Qloud ID</h1>               </td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							</tbody>
</table>
							<!--[if (gte mso 9)|(IE)]>
						</td>
						</tr>
						</table>
						<![endif]-->
						  </td>
						</tr>
						<!-- CONTENT -->
						<tr>
						  <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
							<!--[if (gte mso 9)|(IE)]>
						<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
						<tr>
						<td align="center" valign="top" width="600">
						<![endif]-->
							<table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content bg-white" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: white; width: 580px; margin: 0 auto;">
							  <tbody>
<tr>
								<td class="Content-container Content-container--main text textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101); padding-left: 60px; padding-right: 60px; padding-top: 54px; padding-bottom: 60px;">
								  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
									<!-- RESTAURANT INFO -->
									<tbody>
									<!-- INTRO -->
									<tr>
									  <td valign="top" align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody>
<tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">Sign Up confirmed</span>                          </td>
										  </tr>
										  <tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  <tr>
											<td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
											  <!--[if gte mso 15]>&nbsp;<![endif]-->
											</td>
										  </tr>
										  <tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										</tbody>
</table>
									  </td>
									</tr>
									<!-- MESSAGE -->
									<tr class="spacer">
									  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<tr>
									  <td align="left" class="message" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
										<div class="text textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
										  <span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">Account request</span>
										  <br>This email is sent to you because you have completed sign up process. Now you can continue using your Qloud ID profile. Please click on below button to add employee to you company.</div>
									  </td>
									</tr>
									<tr class="spacer">
									  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<tr>
									  <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
										<!--[if gte mso 15]>&nbsp;<![endif]-->
									  </td>
									</tr>
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<!-- BOOKING INFO -->
									<tr>
									  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody>
<tr>
											<td align="left" valign="middle" width="468" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="text-list textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">
												<span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">'.date('M d Y, h:i').'</span>
												
											  </div>
											</td>
										  </tr>
										  
										  
										  

					

					

					




										</tbody>
</table>
									  </td>
									</tr>
									<!-- ADDRESS -->
									<tr>
									  <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody>
<tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  <tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  <tr>
											<td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
											  <!--[if gte mso 15]>&nbsp;<![endif]-->
											</td>
										  </tr>
										  <tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  
										  
										</tbody>
</table>
									  </td>
									</tr>
									
									
									
									
										
									<!-- RECEIPT -->
									
									
									
									
									
									
									
									
									<tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
                      
                      
                      



<tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>

<tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody>
<tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="https://qloudid.com/company/index.php/CompanySuppliers/companyProfileAction/'.$data['cid'].'" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;">Add employee</a>                                </td>
                            </tr>
                          </tbody>
</table>
                        </td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
									
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									
									
									<tr>
									  <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
										<!--[if gte mso 15]>&nbsp;<![endif]-->
									  </td>
									</tr>
									
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<!-- EDIT RECEIPT -->
									<!-- CANCELLATION POLICY -->
									<tr>
									  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody>
<tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="text text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; font-weight: 600; color: rgb(35, 35, 62);">
												Company policy
											  </div>
											</td>
										  </tr>
										  <tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
												
												<span>This account cannot be transfered to any one else.</span>
											  </div>
											</td>
										  </tr>
										</tbody>
</table>
									  </td>
									</tr>
									<tr class="spacer">
									  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									
									<!-- QUESTIONS -->
									
								  </tbody>
</table>
								</td>
							  </tr>
							</tbody>
</table>
						  </td>
						</tr>
						<!-- FOOTER -->
						<tr>
						  <td align="center" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; width: 580px; margin: 0 auto;">
							<!-- Will most likely required a feature flag -->
							<!--[if (gte mso 9)|(IE)]>
					<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
					<tr>
					<td align="center" valign="top" width="600">
					<![endif]-->
							<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="Content-container" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
							  <tbody>
<tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr>
								<td align="center" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <a href="https://www.exploretock.com" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;"> <img src="https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png" width="30" height="30" alt="Tock" border="0" style="-ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; display: block;"> </a>              </td>
							  </tr>
							  <tr class="spacer">
								<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr>
								<td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
								  <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
									© 2019 Tock, Inc.
								  </div>
								  <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
									All Rights Reserved
								  </div>
								</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							</tbody>
</table>
							<!--[if (gte mso 9)|(IE)]>
					</td>
					</tr>
					</table>
					<![endif]-->
						  </td>
						</tr>
					  </tbody>
</table>
<title>Reservation confirmed</title>
					  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
					  <meta charset="utf-8">
					  <meta name="viewport" content="width=device-width, initial-scale=1">
					  <meta http-equiv="X-UA-Compatible" content="IE=edge">
					  <style type="text/css">
						/* GT AMERICA */

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Regular";
						  font-weight: 400;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.ttf") format("truetype");
						}

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Medium";
						  font-weight: 600;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.ttf") format("truetype");
						}

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Condensed Bold";
						  font-weight: 700;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.ttf") format("truetype");
						}

						/* CLIENT-SPECIFIC RESET */

						body,
						table,
						td,
						a {
						  -webkit-text-size-adjust: 100%;
						  -ms-text-size-adjust: 100%;
						}

						/* Prevent WebKit and Windows mobile changing default text sizes */

						table,
						td {
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						}

						/* Remove spacing between tables in Outlook 2007 and up */

						img {
						  -ms-interpolation-mode: bicubic;
						}

						/* Allow smoother rendering of resized image in Internet Explorer */

						.im {
						  color: inherit !important;
						}

						/* DEVICE-SPECIFIC RESET */

						a[x-apple-data-detectors] {
						  color: inherit !important;
						  text-decoration: none !important;
						  font-size: inherit !important;
						  font-family: inherit !important;
						  font-weight: inherit !important;
						  line-height: inherit !important;
						}

						/* iOS BLUE LINKS */

						/* RESET */

						img {
						  border: 0;
						  height: auto;
						  line-height: 100%;
						  outline: none;
						  text-decoration: none;
						  display: block;
						}

						table {
						  border-collapse: collapse;
						}

						table td {
						  border-collapse: collapse;
						  display: table-cell;
						}

						body {
						  height: 100% !important;
						  margin: 0 !important;
						  padding: 0 !important;
						  width: 100% !important;
						}

						/* BG COLORS */

						.mainTable {
						  background-color: #F0F0F0;
						}

						.mainTable--hospitality {
						  background-color: #f7f2ed;
						}

						html {
						  background-color: #F0F0F0;
						}

						/* VARIABLES */

						.bg-white {
						  background-color: white;
						}

						.hr {
						  /* Cross-client horizontal rule. Adapted from https://litmus.com/community/discussions/4633-is-there-a-reliable-1px-horizontal-rule-method */
						  background-color: #d3d3d8;
						  border-collapse: collapse;
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						  mso-line-height-rule: exactly;
						  line-height: 1px;
						}

						.textAlignLeft {
						  text-align: left !important;
						}

						.textAlignRight {
						  text-align: right !important;
						}

						.textAlignCenter {
						  text-align: center !important;
						}

						.mt1 {
						  margin-top: 6px;
						}

						.list {
						  padding-left: 18px;
						  margin: 0;
						}

						/* TYPOGRAPHY */

						body {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  color: #4f4f65;
						  -webkit-font-smoothing: antialiased;
						  -ms-text-size-adjust: 100%;
						  -moz-osx-font-smoothing: grayscale;
						  font-smoothing: always;
						  text-rendering: optimizeLegibility;
						}

						.h1 {
						  font-family: "GT America Condensed Bold", "Roboto Condensed", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 700;
						  vertical-align: middle;
						  font-size: 36px;
						  line-height: 42px;
						}

						.h2 {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 600;
						  vertical-align: middle;
						  font-size: 16px;
						  line-height: 24px;
						}

						.text {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 16px;
						  line-height: 21px;
						}

						.text-list {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 16px;
						  line-height: 25px;
						}

						.textSmall {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 14px;
						}

						.text-xsmall {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-size: 11px;
						  text-transform: uppercase;
						  line-height: 22px;
						  letter-spacing: 1px;
						}

						.text-bold {
						  font-weight: 600;
						}

						.text-link {
						  text-decoration: underline;
						}

						.text-linkNoUnderline {
						  text-decoration: none;
						}

						.text-strike {
						  text-decoration: line-through;
						}

						/* FONT COLORS */

						.textColorDark {
						  color: #23233e;
						}

						.textColorNormal {
						  color: #4f4f65;
						}

						.textColorBlue {
						  color: #2020c0;
						}

						.textColorGrayDark {
						  color: #7B7B8B;
						}

						.textColorGray {
						  color: #A5A8AD;
						}

						.textColorWhite {
						  color: #FFFFFF;
						}

						.textColorRed {
						  color: #df3232;
						}

						/* BUTTON */

						.Button-primary-wrapper {
						  border-radius: 3px;
						  background-color: #2020C0;
						}

						.Button-primary {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  border-radius: 3px;
						  border: 1px solid #2020C0;
						  color: #ffffff;
						  display: block;
						  font-size: 16px;
						  font-weight: 600;
						  padding: 18px;
						  text-decoration: none;
						}

						.Button-secondary-wrapper {
						  border-radius: 3px;
						  background-color: #ffffff;
						}

						.Button-secondary {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  border-radius: 3px;
						  border: 1px solid #2020C0;
						  color: #2020C0;
						  display: block;
						  font-size: 16px;
						  font-weight: 600;
						  padding: 18px;
						  text-decoration: none;
						}

						/* LAYOUT */

						.Content-container {
						  padding-left: 60px;
						  padding-right: 60px;
						}

						.Content-container--main {
						  padding-top: 54px;
						  padding-bottom: 60px;
						}

						.Content {
						  width: 580px;
						  margin: 0 auto;
						}

						.wrapper {
						  max-width: 600px;
						}

						.section {
						  padding: 24px 0px;
						  border-bottom: 1px solid #d3d3d8;
						}

						.section--noBorder {
						  padding: 24px 0px 0;
						}

						.section--last {
						  padding: 24px 0px;
						}

						.message {
						  background-color: #F4F4F5;
						  padding: 18px;
						}

						.card {
						  border: 1px solid #d3d3d8;
						  padding: 18px;
						}

						/* HEADER */

						.header-tockLogoImage {
						  display: block;
						  color: #F0F0F0;
						}

						.header-heroImage {
						  padding-bottom: 24px;
						}

						/* PREHEADER */

						.preheader {
						  display: none;
						  font-size: 1px;
						  color: #FFFFFF;
						  line-height: 1px;
						  max-height: 0px;
						  max-width: 0px;
						  opacity: 0;
						  overflow: hidden;
						}

						/* BANNER */

						.notice {
						  padding: 12px;
						  background: #23233E;
						  color: #FFFFFF;
						  display: block;
						  font-size: 14px;
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 600;
						}

						/* INTRO */

						.section--intro {
						  padding-bottom: 48px;
						}

						/* BOOKING INFO */

						.business-logo__container {
						  width: 48px;
						  height: 48px;
						  border-radius: 3px;
						  border: 1px solid #d3d3d8;
						  overflow: hidden;
						}

						.business-logo__image {
						  border: 1px solid transparent;
						  border-radius: 3px;
						  width: 48px;
						  height: 48px;
						  display: block;
						}

						.business-address--address {
						  width: 50%;
						}

						.business-address--map {
						  width: 50%;
						}

						.business-address--map-image {
						  width: 100%;
						}

						/* MOBILE TICKETS */

						.mobile-ticket--description {
						  width: 65%;
						  margin-top: 12px;
						  margin-right: 5%;
						}

						.mobile-ticket--code {
						  width: 30%;
						}

						.mobile-ticket--code-image {
						  width: 100%;
						}

						/* RESERVATION ACTIONS */

						.linksTable {
						  border-bottom: 1px solid #d3d3d8;
						}

						.linksTableRow {
						  padding: 24px 12px;
						}

						.actions-icon {
						  vertical-align: middle;
						}

						.actions-text {
						  vertical-align: middle;
						}

						/* RECEIPT */

						.receipt__container {
						  border: 1px solid #d3d3d8;
						  padding: 24px;
						}

						.receipt__row {
						  border-top: 1px solid #d3d3d8;
						}

						/* FEEDBACK ICONS */

						.feedback-link {
						  border: 1px solid #d4d5da;
						  border-radius: 3px;
						  display: inline-block;
						  width: calc(32% - 2px);
						  padding: 10px 0;
						}

						.feedback-link-bumper {
						  display: inline-block;
						  width: 1%;
						}

						.feedback-link img {
						  height: 50px;
						  width: 50px;
						}

						/* SOCIAL ICONS */

						.social-link {
						  display: inline-block;
						  width: auto;
						}

						.social-link-text {
						  padding: 14px 24px 14px 14px;
						}

						/* TABLET STYLES */

						@media screen and (max-width: 648px) {
						  /* DEVICE-SPECIFIC RESET */
						  div[style*="margin: 16px 0;"] {
							margin: 0 !important;
						  }
						  /* ANDROID CENTER FIX */
						  /* LAYOUT */
						  .wrapper {
							width: 100% !important;
							max-width: 100% !important;
						  }
						  .Content {
							width: 90% !important;
						  }
						  .Content-container {
							padding-left: 36px !important;
							padding-right: 36px !important;
						  }
						  .Content-container--main {
							padding-top: 30px !important;
							padding-bottom: 42px !important;
						  }
						  .responsiveTable {
							width: 100% !important;
						  }
						  /* RESERVATION ACTIONS */
						  .linksTableRow {
							padding-left: 0 !important;
							padding-right: 0 !important;
							padding-top: 12px !important;
							padding-bottom: 12px !important;
						  }
						  .linksTableRow--borderRight {
							border-right: none !important;
							padding-left: 0 !important;
							padding-right: 0 !important;
						  }
						  /* FEEDBACK LINK */
						  .feedback-link img {
							height: 38px !important;
							width: 38px !important;
						  }
						}

						/* MOBILE STYLES */

						@media screen and (max-width: 480px) {
						  /* TYPOGRAPHY */
						  .h1 {
							font-size: 30px !important;
							line-height: 30px !important;
						  }
						  .text {
							font-size: 16px !important;
							line-height: 22px !important;
						  }
						  /* BUTTON */
						  .mobile-buttonContainer {
							width: 100% !important;
						  }
						  /* LAYOUT */
						  .Content {
							width: 100% !important;
						  }
						  .Content-container {
							padding-left: 18px !important;
							padding-right: 18px !important;
						  }
						  .Content-container--main {
							padding-top: 24px !important;
							padding-bottom: 30px !important;
						  }
						  .section {
							padding: 18px 0 !important;
						  }
						  .section--last {
							padding: 18px 0 !important;
						  }
						  .header {
							padding: 0 18px !important;
						  }
						  .business-address--address {
							width: 100% !important;
						  }
						  .business-address--map {
							margin-top: 30px !important;
							width: 100% !important;
						  }
						  .mobile-ticket--description {
							width: 100% !important;
							margin-top: 0px !important;
						  }
						  .mobile-ticket--code {
							margin-top: 30px !important;
							margin-left: 0;
							width: 100% !important;
						  }
						  /* RECEIPT */
						  .receipt__container {
							padding: 12px !important;
						  }
						  /* SOCIAL ICONS */
						  .social-link {
							display: block !important;
							width: 100% !important;
							border-bottom: 1px solid #d3d3d8 !important;
						  }
						  /* INTRO */
						  .section--intro {
							padding-top: 18px !important;
							padding-bottom: 18px !important;
						  }
						}
					  </style>



					   
					  <!--[if mso]>
						<style type="text/css">
					.h1 {font-family: "Helvetica", "Arial", sans-serif !important; font-weight: 700 !important; vertical-align: middle !important; font-size: 36px !important; mso-line-height-rule: exactly;line-height: 42px !important;}
					.h2 {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 600 !important;vertical-align: middle !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 24px !important;}
					.text {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 21px !important;}
					.text-list {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 25px !important;}
					.textSmall {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 14px !important;}
					.text-xsmall {font-family: "Helvetica", "Arial", sans-serif !important;font-size: 11px !important;text-transform: uppercase !important;mso-line-height-rule: exactly;line-height: 22px !important;letter-spacing: 1px !important;}
					.text-bold {font-weight: 600 !important;}
					.text-link {text-decoration: underline !important;}
					.text-linkNoUnderline {text-decoration: none !important;}
					.text-strike {text-decoration: line-through !important;}
					.textColorDark {color: #23233e !important;}
					.textColorNormal {color: #4f4f65 !important;}
					.textColorBlue {color: #2020c0 !important;}
					.textColorGray {color: #A5A8AD !important;}
					.textColorWhite {color: #FFFFFF !important;}
					.Button-primary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #ffffff !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
					.Button-secondary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #2020C0 !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
						</style>
						<![endif]-->
					  <!-- HIDDEN PREHEADER TEXT -->
					  <div class="preheader" style="display: none; font-size: 1px; color: rgb(255, 255, 255); line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
					  </div>
					  



					

</body></html>';
				try {
			  sendEmail($subject, $to, $emailContent);
			}

			//catch exception
			catch(Exception $e) {
			 // echo 'Message: ' .$e->getMessage(); die;
			}
			}
			$stmt->close();
			$dbCon->close();
			return 1;
		}
	function sendConnectRequest($data)
    {
        $dbCon = AppModel::createConnection();
		 
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$checkout_id=$this->encrypt_decrypt('decrypt',$data['checkout_id']);  
				 
		$stmt = $dbCon->prepare("select id,user_id,zipcode from user_address where id=(select room_type_id from hotel_checkout_detail where id=?)");
			
		/* bind parameters for markers */
		$stmt->bind_param("i", $checkout_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$rowUser = $result->fetch_assoc();
		$a_id=$rowUser['id'];		 
		$data['user_id']=$rowUser['user_id'];
		$stmt = $dbCon->prepare("INSERT INTO user_aprtment_company_building_connect_request (user_address_id, company_id, created_on,modified_on,building_id,port_id,floor_id) VALUES (?, ?, now(), now(),?,?,?)");
        $stmt->bind_param("iiiii",$a_id,$company_id,$_POST['building_id'],$_POST['port_id'],$_POST['floor_id']);
		$stmt->execute();
			
		 

				$stmt = $dbCon->prepare("select company_email from companies  where id=?");
        
				/* bind parameters for markers */
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
			   
				$rowCompany = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("select address from user_address  where id=?");
        
				/* bind parameters for markers */
				$stmt->bind_param("i", $a_id);
				$stmt->execute();
				$result = $stmt->get_result();
			   
				$rowInfo = $result->fetch_assoc();
				
				$url="https://www.qloudid.com/company/index.php/Landloard/apartmentConnectRequest/".$data['cid'];
				$surl=getShortUrl($url);
				
				$stmt = $dbCon->prepare("select email from user_logins where id in (select user_id from manage_employee_permissions where is_admin=1 and company_id=?)");
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
			   
				while($rowCompany = $result->fetch_assoc())
				{
				
				$to=$rowCompany['email'];
				$subject="Property holding request received";
				$emailContent='<html xmlns="http://www.w3.org/1999/xhtml" style="background-color: rgb(240, 240, 240);"><head>
  <title>Reservation confirmed</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <style type="text/css">
    /* GT AMERICA */

    @font-face {
      font-display: fallback;
      font-family: "GT America Regular";
      font-weight: 400;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.ttf") format("truetype");
    }

    @font-face {
      font-display: fallback;
      font-family: "GT America Medium";
      font-weight: 600;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.ttf") format("truetype");
    }

    @font-face {
      font-display: fallback;
      font-family: "GT America Condensed Bold";
      font-weight: 700;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.ttf") format("truetype");
    }

    /* CLIENT-SPECIFIC RESET */

    body,
    table,
    td,
    a {
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }

    /* Prevent WebKit and Windows mobile changing default text sizes */

    table,
    td {
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }

    /* Remove spacing between tables in Outlook 2007 and up */

    img {
      -ms-interpolation-mode: bicubic;
    }

    /* Allow smoother rendering of resized image in Internet Explorer */

    .im {
      color: inherit !important;
    }

    /* DEVICE-SPECIFIC RESET */

    a[x-apple-data-detectors] {
      color: inherit !important;
      text-decoration: none !important;
      font-size: inherit !important;
      font-family: inherit !important;
      font-weight: inherit !important;
      line-height: inherit !important;
    }

    /* iOS BLUE LINKS */

    /* RESET */

    img {
      border: 0;
      height: auto;
      line-height: 100%;
      outline: none;
      text-decoration: none;
      display: block;
    }

    table {
      border-collapse: collapse;
    }

    table td {
      border-collapse: collapse;
      display: table-cell;
    }

    body {
      height: 100% !important;
      margin: 0 !important;
      padding: 0 !important;
      width: 100% !important;
    }

    /* BG COLORS */

    .mainTable {
      background-color: #F0F0F0;
    }

    .mainTable--hospitality {
      background-color: #f7f2ed;
    }

    html {
      background-color: #F0F0F0;
    }

    /* VARIABLES */

    .bg-white {
      background-color: white;
    }

    .hr {
      /* Cross-client horizontal rule. Adapted from https://litmus.com/community/discussions/4633-is-there-a-reliable-1px-horizontal-rule-method */
      background-color: #d3d3d8;
      border-collapse: collapse;
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
      mso-line-height-rule: exactly;
      line-height: 1px;
    }

    .textAlignLeft {
      text-align: left !important;
    }

    .textAlignRight {
      text-align: right !important;
    }

    .textAlignCenter {
      text-align: center !important;
    }

    .mt1 {
      margin-top: 6px;
    }

    .list {
      padding-left: 18px;
      margin: 0;
    }

    /* TYPOGRAPHY */

    body {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      color: #4f4f65;
      -webkit-font-smoothing: antialiased;
      -ms-text-size-adjust: 100%;
      -moz-osx-font-smoothing: grayscale;
      font-smoothing: always;
      text-rendering: optimizeLegibility;
    }

    .h1 {
      font-family: "GT America Condensed Bold", "Roboto Condensed", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 700;
      vertical-align: middle;
      font-size: 36px;
      line-height: 42px;
    }

    .h2 {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 600;
      vertical-align: middle;
      font-size: 16px;
      line-height: 24px;
    }

    .text {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 16px;
      line-height: 21px;
    }

    .text-list {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 16px;
      line-height: 25px;
    }

    .textSmall {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 14px;
    }

    .text-xsmall {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-size: 11px;
      text-transform: uppercase;
      line-height: 22px;
      letter-spacing: 1px;
    }

    .text-bold {
      font-weight: 600;
    }

    .text-link {
      text-decoration: underline;
    }

    .text-linkNoUnderline {
      text-decoration: none;
    }

    .text-strike {
      text-decoration: line-through;
    }

    /* FONT COLORS */

    .textColorDark {
      color: #23233e;
    }

    .textColorNormal {
      color: #4f4f65;
    }

    .textColorBlue {
      color: #2020c0;
    }

    .textColorGrayDark {
      color: #7B7B8B;
    }

    .textColorGray {
      color: #A5A8AD;
    }

    .textColorWhite {
      color: #FFFFFF;
    }

    .textColorRed {
      color: #df3232;
    }

    /* BUTTON */

    .Button-primary-wrapper {
      border-radius: 3px;
      background-color: #2020C0;
    }

    .Button-primary {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      border-radius: 3px;
      border: 1px solid #2020C0;
      color: #ffffff;
      display: block;
      font-size: 16px;
      font-weight: 600;
      padding: 18px;
      text-decoration: none;
    }

    .Button-secondary-wrapper {
      border-radius: 3px;
      background-color: #ffffff;
    }

    .Button-secondary {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      border-radius: 3px;
      border: 1px solid #2020C0;
      color: #2020C0;
      display: block;
      font-size: 16px;
      font-weight: 600;
      padding: 18px;
      text-decoration: none;
    }

    /* LAYOUT */

    .Content-container {
      padding-left: 60px;
      padding-right: 60px;
    }

    .Content-container--main {
      padding-top: 54px;
      padding-bottom: 60px;
    }

    .Content {
      width: 580px;
      margin: 0 auto;
    }

    .wrapper {
      max-width: 600px;
    }

    .section {
      padding: 24px 0px;
      border-bottom: 1px solid #d3d3d8;
    }

    .section--noBorder {
      padding: 24px 0px 0;
    }

    .section--last {
      padding: 24px 0px;
    }

    .message {
      background-color: #F4F4F5;
      padding: 18px;
    }

    .card {
      border: 1px solid #d3d3d8;
      padding: 18px;
    }

    /* HEADER */

    .header-tockLogoImage {
      display: block;
      color: #F0F0F0;
    }

    .header-heroImage {
      padding-bottom: 24px;
    }

    /* PREHEADER */

    .preheader {
      display: none;
      font-size: 1px;
      color: #FFFFFF;
      line-height: 1px;
      max-height: 0px;
      max-width: 0px;
      opacity: 0;
      overflow: hidden;
    }

    /* BANNER */

    .notice {
      padding: 12px;
      background: #23233E;
      color: #FFFFFF;
      display: block;
      font-size: 14px;
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 600;
    }

    /* INTRO */

    .section--intro {
      padding-bottom: 48px;
    }

    /* BOOKING INFO */

    .business-logo__container {
      width: 48px;
      height: 48px;
      border-radius: 3px;
      border: 1px solid #d3d3d8;
      overflow: hidden;
    }

    .business-logo__image {
      border: 1px solid transparent;
      border-radius: 3px;
      width: 48px;
      height: 48px;
      display: block;
    }

    .business-address--address {
      width: 50%;
    }

    .business-address--map {
      width: 50%;
    }

    .business-address--map-image {
      width: 100%;
    }

    /* MOBILE TICKETS */

    .mobile-ticket--description {
      width: 65%;
      margin-top: 12px;
      margin-right: 5%;
    }

    .mobile-ticket--code {
      width: 30%;
    }

    .mobile-ticket--code-image {
      width: 100%;
    }

    /* RESERVATION ACTIONS */

    .linksTable {
      border-bottom: 1px solid #d3d3d8;
    }

    .linksTableRow {
      padding: 24px 12px;
    }

    .actions-icon {
      vertical-align: middle;
    }

    .actions-text {
      vertical-align: middle;
    }

    /* RECEIPT */

    .receipt__container {
      border: 1px solid #d3d3d8;
      padding: 24px;
    }

    .receipt__row {
      border-top: 1px solid #d3d3d8;
    }

    /* FEEDBACK ICONS */

    .feedback-link {
      border: 1px solid #d4d5da;
      border-radius: 3px;
      display: inline-block;
      width: calc(32% - 2px);
      padding: 10px 0;
    }

    .feedback-link-bumper {
      display: inline-block;
      width: 1%;
    }

    .feedback-link img {
      height: 50px;
      width: 50px;
    }

    /* SOCIAL ICONS */

    .social-link {
      display: inline-block;
      width: auto;
    }

    .social-link-text {
      padding: 14px 24px 14px 14px;
    }

    /* TABLET STYLES */

    @media screen and (max-width: 648px) {
      /* DEVICE-SPECIFIC RESET */
      div[style*="margin: 16px 0;"] {
        margin: 0 !important;
      }
      /* ANDROID CENTER FIX */
      /* LAYOUT */
      .wrapper {
        width: 100% !important;
        max-width: 100% !important;
      }
      .Content {
        width: 90% !important;
      }
      .Content-container {
        padding-left: 36px !important;
        padding-right: 36px !important;
      }
      .Content-container--main {
        padding-top: 30px !important;
        padding-bottom: 42px !important;
      }
      .responsiveTable {
        width: 100% !important;
      }
      /* RESERVATION ACTIONS */
      .linksTableRow {
        padding-left: 0 !important;
        padding-right: 0 !important;
        padding-top: 12px !important;
        padding-bottom: 12px !important;
      }
      .linksTableRow--borderRight {
        border-right: none !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
      }
      /* FEEDBACK LINK */
      .feedback-link img {
        height: 38px !important;
        width: 38px !important;
      }
    }

    /* MOBILE STYLES */

    @media screen and (max-width: 480px) {
      /* TYPOGRAPHY */
      .h1 {
        font-size: 30px !important;
        line-height: 30px !important;
      }
      .text {
        font-size: 16px !important;
        line-height: 22px !important;
      }
      /* BUTTON */
      .mobile-buttonContainer {
        width: 100% !important;
      }
      /* LAYOUT */
      .Content {
        width: 100% !important;
      }
      .Content-container {
        padding-left: 18px !important;
        padding-right: 18px !important;
      }
      .Content-container--main {
        padding-top: 24px !important;
        padding-bottom: 30px !important;
      }
      .section {
        padding: 18px 0 !important;
      }
      .section--last {
        padding: 18px 0 !important;
      }
      .header {
        padding: 0 18px !important;
      }
      .business-address--address {
        width: 100% !important;
      }
      .business-address--map {
        margin-top: 30px !important;
        width: 100% !important;
      }
      .mobile-ticket--description {
        width: 100% !important;
        margin-top: 0px !important;
      }
      .mobile-ticket--code {
        margin-top: 30px !important;
        margin-left: 0;
        width: 100% !important;
      }
      /* RECEIPT */
      .receipt__container {
        padding: 12px !important;
      }
      /* SOCIAL ICONS */
      .social-link {
        display: block !important;
        width: 100% !important;
        border-bottom: 1px solid #d3d3d8 !important;
      }
      /* INTRO */
      .section--intro {
        padding-top: 18px !important;
        padding-bottom: 18px !important;
      }
    }
  </style>
</head>

<body style="margin: 0 !important; padding: 0 !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; height: 100%; margin: 0; padding: 0; width: 100%; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; color: rgb(79, 79, 101); -webkit-font-smoothing: antialiased; -ms-text-size-adjust: 100%; -moz-osx-font-smoothing: grayscale; font-smoothing: always; text-rendering: optimizeLegibility;">
   
  <!--[if mso]>
    <style type="text/css">
.h1 {font-family: "Helvetica", "Arial", sans-serif !important; font-weight: 700 !important; vertical-align: middle !important; font-size: 36px !important; mso-line-height-rule: exactly;line-height: 42px !important;}
.h2 {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 600 !important;vertical-align: middle !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 24px !important;}
.text {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 21px !important;}
.text-list {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 25px !important;}
.textSmall {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 14px !important;}
.text-xsmall {font-family: "Helvetica", "Arial", sans-serif !important;font-size: 11px !important;text-transform: uppercase !important;mso-line-height-rule: exactly;line-height: 22px !important;letter-spacing: 1px !important;}
.text-bold {font-weight: 600 !important;}
.text-link {text-decoration: underline !important;}
.text-linkNoUnderline {text-decoration: none !important;}
.text-strike {text-decoration: line-through !important;}
.textColorDark {color: #23233e !important;}
.textColorNormal {color: #4f4f65 !important;}
.textColorBlue {color: #2020c0 !important;}
.textColorGray {color: #A5A8AD !important;}
.textColorWhite {color: #FFFFFF !important;}
.Button-primary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #ffffff !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
.Button-secondary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #2020C0 !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
    </style>
    <![endif]-->
  <!-- HIDDEN PREHEADER TEXT -->
  <div class="preheader" style="display: none; font-size: 1px; color: rgb(255, 255, 255); line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
  </div>
  <table border="0" cellpadding="0" cellspacing="0" width="100%" class=" mainTable  " style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: rgb(240, 240, 240);">
    <tbody><tr><td style="display:none !important;
 visibility:hidden;
 mso-hide:all;
 font-size:1px;
 color:#ffffff;
 line-height:1px;
 max-height:0px;
 max-width:0px;
 opacity:0;
 overflow:hidden; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> We are thrilled that you will be joining us. If yo... </td>
    <!-- HEADER -->
    </tr><tr>
      <td align="center" class="header" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
        <!--[if (gte mso 9)|(IE)]>
    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
    <tr>
    <td align="center" valign="top" width="600">
    <![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 580px; margin: 0 auto;">
          <tbody><tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <h1 style="font-size: 33px;font-weight: 800;line-height: 30px;">Property management</h1>               </td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
        </tbody></table>
        <!--[if (gte mso 9)|(IE)]>
    </td>
    </tr>
    </table>
    <![endif]-->
      </td>
    </tr>
    <!-- CONTENT -->
    <tr>
      <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
        <!--[if (gte mso 9)|(IE)]>
    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
    <tr>
    <td align="center" valign="top" width="600">
    <![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content bg-white" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: white; width: 580px; margin: 0 auto;">
          <tbody><tr>
            <td class="Content-container Content-container--main text textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101); padding-left: 60px; padding-right: 60px; padding-top: 54px; padding-bottom: 60px;">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                <!-- RESTAURANT INFO -->
                <tbody><tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody><tr>
                        
                        <td width="12" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                        <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">'.$rowInfo["address"].'</span>                          </td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
                <!-- INTRO -->
                <tr>
                  <td valign="top" align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody><tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">You have received a request</span>                          </td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                          <!--[if gte mso 15]>&nbsp;<![endif]-->
                        </td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
                <!-- MESSAGE -->
                
                
                
                
                
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- BOOKING INFO -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody><tr>
                        <td align="left" valign="middle" width="468" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          
                        </td>
                      </tr>
                      
                      
                      <tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody><tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="'.$url.'"="" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;"> Manage requests </a>                                </td>
                            </tr>
                          </tbody></table>
                        </td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
                <!-- ADDRESS -->
                <tr>
                  <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody><tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                          <!--[if gte mso 15]>&nbsp;<![endif]-->
                        </td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody><tr>
                              <td style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="230" class="business-address--address" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 70%;">
                                  <tbody><tr>
                                    <td align="left" width="100%" class="text-list textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">
                                    <span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">If button dont work please copy and paste the link in browser: '.$surl.'</span>                                         </td>
                                  </tr>
                                </tbody></table>
                                <!--[if mso]></td><td><![endif]-->
                                <table align="right" border="0" cellpadding="0" cellspacing="0" width="230" class="business-address--map" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 50%;">
                                  <tbody><tr>
                                    
                                  </tr>
                                </tbody></table>
                              </td>
                            </tr>
                          </tbody></table>
                        </td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                    <!--[if gte mso 15]>&nbsp;<![endif]-->
                  </td>
                </tr>
                
                
                <!-- RECEIPT -->
                
                
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- EDIT RECEIPT -->
                <!-- CANCELLATION POLICY -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody><tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; font-weight: 600; color: rgb(35, 35, 62);">
                            Management policy
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                            <span>Please approve the service request that you can serve as a property adviser.</span>
                            <span>You can only work for the role you have approved.</span>
                          </div>
                        </td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- QUESTIONS -->
                
              </tbody></table>
            </td>
          </tr>
        </tbody></table>
      </td>
    </tr>
    <!-- FOOTER -->
    <tr>
      <td align="center" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; width: 580px; margin: 0 auto;">
        <!-- Will most likely required a feature flag -->
        <!--[if (gte mso 9)|(IE)]>
<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
<tr>
<td align="center" valign="top" width="600">
<![endif]-->
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="Content-container" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
          <tbody><tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <a href="https://www.exploretock.com" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;"> <img src="https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png" width="30" height="30" alt="Tock" border="0" style="-ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; display: block;"> </a>              </td>
          </tr>
          <tr class="spacer">
            <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
              <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                © 2019 Tock, Inc.
              </div>
              <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                All Rights Reserved
              </div>
            </td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
        </tbody></table>
        <!--[if (gte mso 9)|(IE)]>
</td>
</tr>
</table>
<![endif]-->
      </td>
    </tr>
  </tbody></table>



</body></html>';
				
				try {
  sendEmail($subject, $to, $emailContent);
}

//catch exception
catch(Exception $e) {
 // echo 'Message: ' .$e->getMessage(); die;
}
				
				}	 
			 
		
		 
          $stmt->close();
		  $dbCon->close();
		  return 1;
    }
	
	function buildingList($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
	  
       $stmt = $dbCon->prepare("select id,building_name from landloard_buildings where company_id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $company_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='<option value="0">Select</option>';
		while($row = $result->fetch_assoc())
		{
			$org=$org.'<option value="'.$row['id'].'">'.$row['building_name'].'</option>';
			 
		}
		 
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	function getPorts($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
	  
       $stmt = $dbCon->prepare("select id,port_number from landloard_building_ports where buildingid=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $_POST['building_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='<option value="0">Select</option>';
		while($row = $result->fetch_assoc())
		{
			$org=$org.'<option value="'.$row['id'].'">'.$row['port_number'].'</option>';
			 
		}
		 
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	
	function getFloors($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
	   
       $stmt = $dbCon->prepare("select id,floor_number from landloard_building_port_floors where port_id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $_POST['port_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='<option value="0">Select</option>';
		while($row = $result->fetch_assoc())
		{
			$org=$org.'<option value="'.$row['id'].'">'.$row['floor_number'].'</option>';
			 
		}
		 
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	
		function companyLandloardList($data)
		{
			$dbCon = AppModel::createConnection();
			  
				$checkout_id=$this->encrypt_decrypt('decrypt',$data['checkout_id']);  
				 
				$stmt = $dbCon->prepare("select user_id,zipcode from user_address where id=(select room_type_id from hotel_checkout_detail where id=?)");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $checkout_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowUser = $result->fetch_assoc();
				 
				$stmt = $dbCon->prepare("select id,company_name,company_email from companies where id in (select company_id from property_location where postal_code_v=? || postal_code_i=?)");
			
				/* bind parameters for markers */
				$stmt->bind_param("ss",$rowUser['zipcode'],$rowUser['zipcode']);
				$stmt->execute();
				$result = $stmt->get_result();
				$org=array();
				
				while($rowCompany = $result->fetch_assoc())
				{
					$rowCompany['enc']=$this->encrypt_decrypt('encrypt',$rowCompany['id']);  
					array_push($org,$rowCompany);
				}

				
				$stmt->close();
				$dbCon->close();
				return $org;	
				 
		}
		function verifyEmail($data)
		{
			$dbCon = AppModel::createConnection();
			  
				//$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);  
				  
				$stmt = $dbCon->prepare("select id from user_logins where email=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("s", $_POST['email']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_country = $result->fetch_assoc();
				   
				if(!empty($row_country))
				{
				$stmt->close();
				$dbCon->close();
				return $row_country['id'];		 
				
				}
				else
				{
				$stmt->close();
				$dbCon->close();
				return 0;	
				}
		}
		
		
		function senverificationCode($data)
		{
			$dbCon = AppModel::createConnection();
			  
				$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);  
				 $code=mt_rand(111111,999999);
				$stmt = $dbCon->prepare("update user_professional_service_request set email_verification_code=? where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("is",$code, $job_id);
				$stmt->execute();
				  
				$subject='Verify email';
				$emailContent='<html><head></head><body>


<table border="0" cellpadding="0" cellspacing="0" role="presentation" width="600" align="center" bgcolor="#FEFEFE" style="margin:0px auto;padding:0px;border:0px;border-collapse:collapse;width:600px;background-color:#000000"><tbody><tr><td align="left" valign="top" style="padding-left:20px;padding-right:20px;text-align:left;vertical-align:top"><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td style="padding-left:20px;padding-right:20px"><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td align="left"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse"><tbody><tr><td valign="middle" style="font-size:20px;line-height:20px;font-weight:bold;vertical-align:middle"><a href="http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw3Fdh_8slomy-uTKO2Dq10h"><img src="https://www.qloudid.com/html/usercontent/images/gettxp/logo.jpeg" alt="Klarna." width="98" height="98" border="0" style="display:block;outline:0px;width:98px;height:98px" class="CToWUd" data-bit="iit"></a></td></tr></tbody></table></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><h1 style="font-family:&quot;Klarna Display&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:36px;line-height:40px">Your 6-digit code</h1><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Hi there! Your 6-digit code is:</div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><h2 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:27px;line-height:30px">'.$code.'</h2><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Use this code to complete the verification process in the app or website.</div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Do not share this code. Klarna representatives will never reach out to you to verify this code over the phone or SMS.</div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px"><b>The code is valid for 10 minutes.</b></div></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td style="padding-left:20px;padding-right:20px"><h2 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:27px;line-height:30px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Support</font></font></h2><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td><h3 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:19px;line-height:25px">If you have any questions please contact us on</h3><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="5" style="font-size:5px;line-height:5px;height:5px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px"><a href="http://click.klarna.es/f/a/Fr0UR8yR1Q7pXm9FR-8wng~~/AABVuwA~/RgRoNYYFP0QuaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9lcy9hdGVuY2lvbi1hbC1jbGllbnRlL1cFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;text-decoration:underline!important" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/Fr0UR8yR1Q7pXm9FR-8wng~~/AABVuwA~/RgRoNYYFP0QuaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9lcy9hdGVuY2lvbi1hbC1jbGllbnRlL1cFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw3S2E-PheN6wUGeLVEcBolo">Customer Service</a></div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><h3 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:19px;line-height:25px">Want to learn more about us?</h3><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="5" style="font-size:5px;line-height:5px;height:5px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Visit our website at<span>&nbsp;</span><a href="http://click.klarna.es/f/a/ndorCSqqvjFf1u52A9OR4w~~/AABVuwA~/RgRoNYYFP0QZaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9lc1cFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;text-decoration:underline!important" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/ndorCSqqvjFf1u52A9OR4w~~/AABVuwA~/RgRoNYYFP0QZaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9lc1cFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw17Rs1qQzciF0u_R0-FCHy9">https://www.klarna.com/es</a></div></td></tr></tbody></table></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td style="padding-left:20px;padding-right:20px"><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="1" style="font-size:1px;line-height:1px;height:1px;background-color:rgb(238,238,238)">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse"><tbody><tr><td align="center" width="40" height="40" style="padding-right:5px"><a href="http://click.klarna.es/f/a/kBBj1AYp9jgiYKUYjz0LTA~~/AABVuwA~/RgRoNYYFP0QhaHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS9rbGFybmEvVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/kBBj1AYp9jgiYKUYjz0LTA~~/AABVuwA~/RgRoNYYFP0QhaHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS9rbGFybmEvVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw0uXWSCGG_grCLULW_dUVpd"><img src="https://ci3.googleusercontent.com/meips/ADKq_NbVH5I-tVL_aM-mt5JYLNklwUOCIxdpnGRWqh5oAERsamtp3mBW0EIIPWrivA4cLCKGknedoP3XF-sX6eKn1PRq4G0m5Svq060Ak-6lDpxzEoETv7tPVOyjvP654ogFRsQPhsZDoi7DYTDjerIsZMlXhNTw=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/lollipop/icons/footer/instagram.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40" style="padding-right:5px"><a href="http://click.klarna.es/f/a/szXxBZl_bjIkVNnJ9T0KWA~~/AABVuwA~/RgRoNYYFP0QeaHR0cHM6Ly93d3cudGlrdG9rLmNvbS9Aa2xhcm5hVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/szXxBZl_bjIkVNnJ9T0KWA~~/AABVuwA~/RgRoNYYFP0QeaHR0cHM6Ly93d3cudGlrdG9rLmNvbS9Aa2xhcm5hVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw37Rvp9S1T076Vx8sub7B4g"><img src="https://ci3.googleusercontent.com/meips/ADKq_Nb-5o3UYndP1zOh4Ej9HOQLv9y8p_iqPAEpko-6Ou2V8py_CzvVkf_flYetPmki20CvUnvqz-O5yqRPdjkaYJghmu9R7MmnL6wLW_r2hopYylQjR89DwLCmlRfgWNkrZBMHcHoPjqsYI7QQnVnTR3Uk=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.12/comms-platform/lollipop/icons/footer/tiktok.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40" style="padding-right:5px"><a href="http://click.klarna.es/f/a/aXJjQkBm9hMbJGgg_Ulg5g~~/AABVuwA~/RgRoNYYFP0QnaHR0cHM6Ly93d3cubGlua2VkaW4uY29tL2NvbXBhbnkva2xhcm5hVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/aXJjQkBm9hMbJGgg_Ulg5g~~/AABVuwA~/RgRoNYYFP0QnaHR0cHM6Ly93d3cubGlua2VkaW4uY29tL2NvbXBhbnkva2xhcm5hVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw3HNtBaRVhrbuQ7LybNdxsc"><img src="https://ci3.googleusercontent.com/meips/ADKq_Narh5WtNTQVK0ecV0Bkk2cxukxXzkc15Xo_bWiZD1L8xWKIslwqr-opbo414kzX8GL0q90xvuLcT2ynanniooJyvnBwHIJI0Fgp82_6IgyDmim0pBamR8tMZE3e8eP5pmKMDtQARu_zQYy7Ds4jMWvLdTY=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/lollipop/icons/footer/linkedin.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40" style="padding-right:5px"><a href="http://click.klarna.es/f/a/OWr5Q8XkPBQYIwoYsCdeDA~~/AABVuwA~/RgRoNYYFP0QaaHR0cHM6Ly90d2l0dGVyLmNvbS9LbGFybmFXBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/OWr5Q8XkPBQYIwoYsCdeDA~~/AABVuwA~/RgRoNYYFP0QaaHR0cHM6Ly90d2l0dGVyLmNvbS9LbGFybmFXBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw1aQS7b5ENj7MttadKGvEIe"><img src="https://ci3.googleusercontent.com/meips/ADKq_Na0Bikraixp5WMdKm0lV_f2hcw_zD3RYBpjVKvnPt-TjOxopC06s2v0iBEPCKGBo8eGlM-6gn_gzKQS9IhNaN_LqgRYC9zofUoPzHifG-4EflMD0jWffSZ7o5VEx2rnk2Vjj84ZbtLtbrFojg=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/lollipop/icons/footer/x.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40" style="padding-right:5px"><a href="http://click.klarna.es/f/a/mTv8X7Ll9HJv_kuhWaOi5g~~/AABVuwA~/RgRoNYYFP0QfaHR0cHM6Ly93d3cuZmFjZWJvb2suY29tL0tsYXJuYVcFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/mTv8X7Ll9HJv_kuhWaOi5g~~/AABVuwA~/RgRoNYYFP0QfaHR0cHM6Ly93d3cuZmFjZWJvb2suY29tL0tsYXJuYVcFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw22VCmNVXx8oiKpHRcSXC2q"><img src="https://ci3.googleusercontent.com/meips/ADKq_NZeVlLBwVC5BhHnilPrDenr4aSamGC_P59GTJ-fhhZxSpfSXN171N_R5PVhqtFjEfkqzqZ7kFqEesGKu4--hKiY2HY01r2LZqWxIcXIuTMJYcD4_WBbKaNFd7TBvNhPiHWH8nBeRi8Gp1uGH5fnZ4nGxAk=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/lollipop/icons/footer/facebook.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40"><a href="http://click.klarna.es/f/a/m8HHr_sT10BssSdRMkvJPw~~/AABVuwA~/RgRoNYYFP0QmaHR0cHM6Ly93d3cueW91dHViZS5jb20vS2xhcm5hT2ZmaWNpYWxXBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/m8HHr_sT10BssSdRMkvJPw~~/AABVuwA~/RgRoNYYFP0QmaHR0cHM6Ly93d3cueW91dHViZS5jb20vS2xhcm5hT2ZmaWNpYWxXBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw3CO2PeHslv9yIDLWxOb5e3"><img src="https://ci3.googleusercontent.com/meips/ADKq_NYofWUS-rn-gKW1ci3kTu7SEf6Dfxz8Cle-sLEcAsBO3jxp4r2ecyarpXCRtjeKpwp6k9Xw4-CAcAjKN8xz656hWnaxJ8V2JHPC5nFrcnDUUHX2rCxUec3i4DrIbk4DGP_3kLbCNzWPFCkt7P5TkU8wkQ=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.12/comms-platform/lollipop/icons/footer/youtube.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse"><tbody><tr><td valign="middle" style="font-size:20px;line-height:20px;font-weight:bold;vertical-align:middle"><a href="http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC&amp;source=gmail&amp;ust=1718337056153000&amp;usg=AOvVaw1fIc6r2xnvLp3QQldTLyXl"><img src="https://www.qloudid.com/html/usercontent/images/gettxp/logo.jpeg" alt="Klarna." width="98" height="98" border="0" style="display:block;outline:0px;width:98px;height:98px" class="CToWUd" data-bit="iit"></a></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(85,85,85);font-weight:normal;font-size:14px;line-height:20px;margin-top:0px;margin-bottom:0px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Klarna Bank AB (publ) </font></font><br><span style="font-family:inherit!important;font-size:inherit!important;font-weight:inherit!important;line-height:inherit!important;color:inherit!important;text-decoration:none!important"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sveavägen 46 </font></font></span><br><span style="font-family:inherit!important;font-size:inherit!important;font-weight:inherit!important;line-height:inherit!important;color:inherit!important;text-decoration:none!important"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">111 34 Stockholm</font></font></span></div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><a href="http://click.klarna.es/f/a/BwaF5wds69zA8tnvdBlCuA~~/AABVuwA~/RgRoNYYFP0RMaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9lcy8_dXRtX21lZGl1bT1lbWFpbCZ1dG1fc291cmNlPWtsYXJuYS1jb21tcy1wbGF0Zm9ybVcFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(85,85,85);font-weight:normal;font-size:14px;line-height:20px;text-decoration:underline!important" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/BwaF5wds69zA8tnvdBlCuA~~/AABVuwA~/RgRoNYYFP0RMaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9lcy8_dXRtX21lZGl1bT1lbWFpbCZ1dG1fc291cmNlPWtsYXJuYS1jb21tcy1wbGF0Zm9ybVcFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~&amp;source=gmail&amp;ust=1718337056153000&amp;usg=AOvVaw0SKa0LmC2s7lI768Cb9uJU">klarna.com/es</a></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td></tr></tbody></table></td></tr></tbody></table></body></html>';
				$to            = $_POST['email'];
				$res= sendEmail($subject, $to, $emailContent);
				
				$stmt->close();
				$dbCon->close();
				return 1;
		}
		
		
		
		
		function verifyCompanyIdentification($data)
		{
			$dbCon = AppModel::createConnection();
			  
				$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);  
				 
				$stmt = $dbCon->prepare("select id from company_profiles where cid=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("s", $_POST['cid']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_country = $result->fetch_assoc();
				 
				if(empty($row_country))
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
		
		function serviceSelected($data)
		{
			$dbCon = AppModel::createConnection();
			  
				$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);  
				$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);  
				$stmt = $dbCon->prepare("select professional_category_id,company_id from dishes_detail_information where id in (select dish_id from hotel_roomservice_item_ordered where professional_user_job_id=?)");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $job_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$rule=2;
				while($row_country = $result->fetch_assoc())
				{
					 
					$stmt = $dbCon->prepare("select payment_option from professional_company_selected_service_todos where professional_category_id = ? and domain_id=? and company_id=?");
					/* bind parameters for markers */
					$cont=1;
					$stmt->bind_param("iii",  $row_country['professional_category_id'],$domain_id,$row_country['company_id']);
					$stmt->execute();
					$result1 = $stmt->get_result();
					$row2 = $result1->fetch_assoc();
					
					
					if($row2['payment_option']==2)
					{
						$rule=2;
						break;
					}
					else
					{
					$rule=$row2['payment_option'];
					  	
					}						
				}
				 
				$stmt->close();
				$dbCon->close();
				return $rule;	
				 
		}
	
		
		function bookingServiceInvoiceDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$job_id= $this -> encrypt_decrypt('decrypt',$data['job_id']);
			 
			$stmt = $dbCon->prepare("select invoice_id,hotel_roomservice_item_ordered.id,concat_ws(' ',user_logins.first_name,user_logins.last_name) as full_name,booking_date  ,booking_time,booking_person_id,booking_checkin_status from hotel_roomservice_item_ordered left join employees on employees.id=hotel_roomservice_item_ordered.booked_employee_id left join user_logins on user_logins.id=hotel_roomservice_item_ordered.booking_person_id where hotel_roomservice_item_ordered.professional_user_job_id=?");
			$stmt->bind_param("i", $job_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select dish_name,time_required,post_production_time,preparation_time,dish_price from dishes_detail_information where id in(select dish_id from hotel_roomservice_item_ordered where professional_user_job_id=?)");
			$stmt->bind_param("i", $job_id);
			$stmt->execute();
			$result2 = $stmt->get_result();
			$total_price=0;
			while($row2 = $result2->fetch_assoc())
			{
				$total_price=$total_price+$row2['dish_price'];
				 
			}
			//print_r($row['invoice_id']); die;
			if($row['invoice_id']==0)
			{
				$stmt = $dbCon->prepare("insert into professional_services_payment_invoice(total_price,user_id)values(?,?)");
				$stmt->bind_param("ii", $total_price,$row['booking_person_id']);
				$stmt->execute();
				$id=$stmt->insert_id;
				
				$stmt = $dbCon->prepare("update hotel_roomservice_item_ordered set invoice_id=? where professional_user_job_id=?");
				$stmt->bind_param("ii",$id, $job_id);
				$stmt->execute();
				$invoice_id= $this -> encrypt_decrypt('encrypt',$id);
			}
			else
			{
				$invoice_id= $this -> encrypt_decrypt('encrypt',$row['invoice_id']);
			}
			$stmt->close();
			$dbCon->close();
			return $invoice_id;
			
			
		}
		
		function generateTicketandBook($data)
		{
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$data['user_id']=0;
			$_POST['property_type_detail']=1;
			$_POST['product_information']='';
			$_POST['carried_for']=1;
			$_POST['begin_info']=1;
			$_POST['pcountry']='';
			$_POST['p_number']='';
			$_POST['conatct_preffered_on']=1;
			
			$stmt = $dbCon->prepare("select professional_category_id,professional_subcategory_id from professional_company_selected_service_todos where domain_id=? and company_id=? and is_selected=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $domain_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$data['catg_id']=$this->encrypt_decrypt('encrypt',$row['professional_category_id']);
			$data['subcatg_id']=$this->encrypt_decrypt('encrypt',$row['professional_subcategory_id']);
			$data['whom_id']='T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09';
			$data['todo_id']='T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09';
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$whom_id=$this->encrypt_decrypt('decrypt',$data['whom_id']);
			$subcatg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			
			$stmt = $dbCon->prepare("select city_id from professional_company_selected_areas where domain_id=? and company_id=? and is_selected=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $domain_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$data['area_id']=$this->encrypt_decrypt('encrypt',$row['city_id']);
			
			$stmt = $dbCon->prepare("insert into `user_professional_service_request`(domain_id, whom_you_want_served,`category_id` , `subcategory_id` , `property_type_detail` ,`product_information`, `carried_for` , `begin_info` , `user_id` , `pcountry` , `p_number` , `conatct_preffered_on` , `created_on`) VALUES (?, ?,?,   ?, ?,?, ?, ?, ?,   ?, ?,?, now())");
			$stmt->bind_param("iiiiisiiiisi",$domain_id,$whom_id, $catg_id,$subcatg_id,$_POST['property_type_detail'],$_POST['product_information'],$_POST['carried_for'],$_POST['begin_info'],$data['user_id'],$_POST['pcountry'],$_POST['p_number'],$_POST['conatct_preffered_on']);
			$stmt->execute();
			$id=$stmt->insert_id;
			 
			$data['job_id']=$this->encrypt_decrypt('encrypt',$id);
			 
			$stmt->close();
			$dbCon->close();
			header('location:../../bookableServiceList/'.$data['catg_id'].'/'.$data['whom_id'].'/'.$data['subcatg_id'].'/'.$data['domain_id'].'/'.$data['area_id'].'/'.$data['todo_id'].'/'.$data['job_id'].'/'.$data['cid']);
			 
		}
		
		
		 
		function sendVerificationCode($data)
		{
			$dbCon = AppModel::createConnection();
			  
				$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);  
				$stmt = $dbCon->prepare("select country_code,country_name from phone_country_code where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $_POST['country_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_country = $result->fetch_assoc();
				 
				$code=mt_rand(111111,999999); 
				
				$stmt = $dbCon->prepare("update user_professional_service_request set verification_code=? where id=?");
			 
				/* bind parameters for markers */
				 
				$stmt->bind_param("ii", $code,$job_id);
				$stmt->execute();
				
				$to            = '+'.$row_country['country_code'].''.trim($_POST['phone_number']);
				$subject='Verify';
				$emailContent='Please verify your phone number using code - '.$code;
				$res=sendSms($subject, $to, $emailContent);
				$stmt->close();
				$dbCon->close();
				return 1;	
		}
	
	 function verifyEmailPhoneCodeInfo($data)
		{
			$dbCon = AppModel::createConnection();
			  
				$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);  
				$stmt = $dbCon->prepare("select email_verification_code,verification_code from user_professional_service_request where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $job_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				if($row['verification_code']==$_POST['v_code'] && $row['email_verification_code']==$_POST['ev_code'])
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
	
	
	 function verifyEmailCodeInfo($data)
		{
			$dbCon = AppModel::createConnection();
			  
				$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);  
				$stmt = $dbCon->prepare("select email_verification_code,verification_code from user_professional_service_request where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $job_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				if($row['email_verification_code']==$_POST['ev_code'])
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
	
	
	
		function verifyCodeInfo($data)
		{
			$dbCon = AppModel::createConnection();
			  
				$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);  
				$stmt = $dbCon->prepare("select verification_code from user_professional_service_request where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $job_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				if($row['verification_code']==$_POST['v_code'])
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
	
	
		function checkUserInfo()
		{
			$dbCon = AppModel::createConnection();
			  $stmt = $dbCon->prepare("select id from user_logins where email=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("s", $_POST['email']);
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
				return $row['id'];
				}
					
		}
	
		
		function selectedMarketplaceDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			
			$stmt = $dbCon->prepare("select * from professional_marketplace where id=?");
			$stmt->bind_param("i",$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$filename="../estorecss/".$row['background_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['background_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['background_image'].'.jpg' );  $row['background_image']='../../../'.$imgs; } else { $row['background_image']=""; }
			 
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		
		function marketplaceSelectedDomainVerification($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$marketplace_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$md_id=$this->encrypt_decrypt('decrypt',$data['md_id']); 
			
			$stmt = $dbCon->prepare("select marketplace_domain_id from professional_marketplace_selected_domain where marketplace_id=? and is_selected=1 and marketplace_domain_id=?");
			$stmt->bind_param("ii",$marketplace_id,$md_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCategory = $result->fetch_assoc();
			if(empty($rowCategory))
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
			
		function professionalSelectedDomainDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$md_id=$this->encrypt_decrypt('decrypt',$data['md_id']);
			$stmt = $dbCon->prepare("select * from professional_marketplace_domain_info where id=?");
			$stmt->bind_param("i",$md_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCategory = $result->fetch_assoc();
				$stmt->close();
				$dbCon->close();
				return $rowCategory;	
			}	
			
		
		
		function homeRepairSubcategory($data)
		{
			return $this->encrypt_decrypt('encrypt',$data['property_type_detail']);
		}
	function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from user_logins where id=?");
			 
			/* bind parameters for markers */
			 
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}	
		
		
		function userDetailInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$hotel_checkin_id= $this -> encrypt_decrypt('decrypt',$data['hotel_checkin_id']);
			 
			
			$stmt = $dbCon->prepare("select email,first_name,last_name,country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id=(select user_id from hotel_checkout_detail where id=?)");
			 
			/* bind parameters for markers */
			 
			$stmt->bind_param("i", $hotel_checkin_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}	
		
		
		function updateUserOnJob($data)
		{
			$dbCon = AppModel::createConnection();
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$stmt = $dbCon->prepare("update user_professional_service_request set user_id=?,carried_for=? where id=?");
			 
			/* bind parameters for markers */
			 
			$stmt->bind_param("iii", $data['user_id'],$data['carried_for'],$job_id);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("update  hotel_roomservice_item_ordered set booking_person_id=?,user_id=? where professional_user_job_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("iii",$data['user_id'],$data['user_id'],$job_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}	
		
		
		function updateUserPayInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$invoice_id=$this->encrypt_decrypt('decrypt',$data['invoice_id']);
			$stmt = $dbCon->prepare("update user_professional_service_request set user_id=?,carried_for=? where id=?");
			 
			/* bind parameters for markers */
			 
			$stmt->bind_param("iii", $data['user_id'],$data['carried_for'],$job_id);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("update  hotel_roomservice_item_ordered set booking_person_id=?,user_id=?,booking_checkin_status=0 where professional_user_job_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("iii",$data['user_id'],$data['user_id'],$job_id);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("update  professional_services_payment_invoice set user_id=?,payment_status=1 where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii",$data['user_id'],$invoice_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}	
		
		
		function codeInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$verification_id=$this->encrypt_decrypt('decrypt',$data['verification_id']);
			if($domain_id>0)
			{
			$stmt = $dbCon->prepare("select * from user_service_payment_info where id=?");	
			}
			else
			{
				$stmt = $dbCon->prepare("select * from vitech_property_reservation_detail where id=?");
			}
			 
			/* bind parameters for markers */
			 
			$stmt->bind_param("i", $verification_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}	
		
		
		
		function sendOtpToBuyer($data)
		{
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$verification_id=$this->encrypt_decrypt('decrypt',$data['verification_id']);
			$stmt = $dbCon->prepare("select * from vitech_property_reservation_detail where id=?");
			
			/* bind parameters for markers */
			 
			$stmt->bind_param("i", $verification_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select country_code,country_name from phone_country_code where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['buyer_country_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_country = $result->fetch_assoc();
			
			$code=mt_rand(1111,9999); 
			$code1=mt_rand(1111,9999); 
			
			$stmt = $dbCon->prepare("update vitech_property_reservation_detail set email_otp=?,phone_otp=? where id=?");
			
			/* bind parameters for markers */
			 
			$stmt->bind_param("iii",$code1,$code, $verification_id);
			$stmt->execute();
			
			
			$subject='Verify phone';
			$emailContent='Please verify your phone using code - '.$code1;
			$to            = '+'.trim($row_country['country_code']).''.trim($row['buyer_phone_number']);
			 
			try{
			$res=json_decode(sendSms($subject, $to, $emailContent),true);
			}
			catch(Exception $e) {
						 
					   
					}
				catch (Error $e) {
					 
											}

			$subject='Verify email';
			$emailContent='Please verify your email using code - '.$code;
			$to            = $row['buyer_email'];
			try{
			$res= sendEmail($subject, $to, $emailContent);
			}
			catch(Exception $e) {
				$to='kowaken.ghirmai@gmail.com';
				$res= sendEmail($subject, $to, $emailContent); 
					   
					}
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}	
		
			function reservationInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$verification_id=$this->encrypt_decrypt('decrypt',$data['verification_id']);
			$stmt = $dbCon->prepare("select * from vitech_property_reservation_detail where id=?");
			
			/* bind parameters for markers */
			 
			$stmt->bind_param("i", $verification_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			 $stmt = $dbCon->prepare("select * from vitech_properties  where company_property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("s", $row['vitech_primary_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowProperty = $result->fetch_assoc();
			$row['cid']=$this->encrypt_decrypt('encrypt',$rowProperty['company_id']);
			$row['pid']=$this->encrypt_decrypt('encrypt',$rowProperty['id']);
			 
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}	
		
		function fetchPropertiesImage($data)
		{
		
		ini_set('memory_limit', '-1');
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			
			
			
			$stmt = $dbCon->prepare("select * from vitech_property_photos where vitech_property_id=? and sorting_number=1");
				
					/* bind parameters for markers */
					$stmt->bind_param("s", $property_id);
					$stmt->execute();
					$resultImages = $stmt->get_result();
					$org=array();
					$rowImages = $resultImages->fetch_assoc();
					if(!empty($rowImages))
					{
					$filename="../estorecss/".$rowImages ['vitech_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowImages ['vitech_photo_path'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowImages ['vitech_photo_path'].'.jpg' ); $imgs=str_replace('../','https://www.qloudid.com/',$imgs);  } else {
						$imgs="https://www.qloudid.com/html/usercontent/images/notavailable.jpg"; }	
					}
					else {
						$imgs="https://www.qloudid.com/html/usercontent/images/notavailable.jpg"; }		
						
						$rowImages['image_path1']=$imgs;
						
			
		 
			  
		$stmt->close();
        $dbCon->close();
        return $rowImages;
        
		}
	
		function fetchPropertiesAddress($data)
		{
			
			
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
				
				$stmt = $dbCon->prepare("select * from vitech_property_address  where company_id=? and property_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("is", $company_id,$property_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				 
				$stmt->close();
				$dbCon->close();
				return $row;
			
		}
	
	function fetchPropertyTaskInfo($data)
    {
		
		
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			 
			$stmt = $dbCon->prepare("select * from vitech_properties  where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("s", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowProperty = $result->fetch_assoc();
			 
		$stmt->close();
        $dbCon->close();
        return $rowProperty;
        
    }
	
	function fetchPropertiesInterior($data)
    {
		
		
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			
			$stmt = $dbCon->prepare("select * from vitech_property_interior  where company_id=? and property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("is", $company_id,$property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row;
        
    }
		
		function updateSellerReview($data)
		{
			$dbCon = AppModel::createConnection();
			$verification_id=$this->encrypt_decrypt('decrypt',$data['verification_id']);
			$_POST['description']=htmlentities($_POST['description'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("update vitech_property_reservation_detail set seller_review=?,seller_review_updated=1 where id=?");
			
			/* bind parameters for markers */
			 
			$stmt->bind_param("si",$_POST['description'], $verification_id);
			$stmt->execute();
			 
		
			$stmt = $dbCon->prepare("insert into vitech_reservation_seller_review ( reservation_id , broker_recommendation , satisfection_level , review_description , broker_attention , broker_engaged , broker_energy , broker_fee_reasonable , broker_material , broker_presentation , broker_knowledge , broker_choice_help , created_on )   values (?,?,?,?,?,?,?,?,?,?,?,?,now())");
			$stmt->bind_param("iiisiiiiiiii",$verification_id,$_POST['broker_recommendation'],$_POST['satisfection_level'],$_POST['description'],$_POST['broker_attention'],$_POST['broker_engaged'],$_POST['broker_energy'],$_POST['broker_fee_reasonable'],$_POST['broker_material'],$_POST['broker_presentation'],$_POST['broker_knowledge'],$_POST['broker_choice_help'] );
			$stmt->execute();	
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}	
		 
		function updateReservationVerificationInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			
			$codeInfo=$this->codeInfo($data);
			
			
			$stmt = $dbCon->prepare("select id from user_logins where email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $codeInfo['buyer_email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCheck = $result->fetch_assoc();	
			
			if(empty($rowCheck))
			{
			$stmt = $dbCon->prepare("select user_logins.id,country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where country_of_residence=? and phone_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $codeInfo['buyer_country_id'],$codeInfo['buyer_phone_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCheck = $result->fetch_assoc();	
			if(!empty($rowCheck))
			{
			$stmt = $dbCon->prepare("update user_profiles   set phone_number='' where user_logins_id=?");
			$stmt->bind_param("i", $rowCheck['id']);
			$stmt->execute();	
			}
			
			$stmt = $dbCon->prepare("update user_visiting_countries   set phone_number='' where country_info=?  and phone_number=?");
			$stmt->bind_param("is", $codeInfo['buyer_country_id'],$codeInfo['buyer_phone_number']);
			$stmt->execute();	
			$rf=0;	
			$st=1;
			$data['random_hash'] = substr(md5(uniqid(rand(), true)), 16, 16);
			$stmt = $dbCon->prepare("INSERT INTO user_logins (first_name,last_name,registered_from,get_started_wizard_status,email,  email_verification_code , created_on , modified_on, country_of_residence,verification_status,user_came_from,domain_id ) VALUES (?, ?, ?, ?,   ?, ?, now(), now(), ?, ?,?,?)");
			$stmt->bind_param("ssiissiiii", $codeInfo['buyer_first_name'], $codeInfo['buyer_last_name'],$st,$st,$codeInfo['buyer_email'], $data['random_hash'], $codeInfo['buyer_country_id'],$rf,$came_from,$domain_id);
			$stmt->execute();
			$data['user_id']=$stmt->insert_id;	
			$stmt = $dbCon->prepare("INSERT INTO user_profiles (user_logins_id,phone_number ) VALUES (?, ?)");
			$stmt->bind_param("is", $data['user_id'], $codeInfo['buyer_phone_number']);
			$stmt->execute();
			}
			else
			{
			$data['user_id']=$rowCheck['id'];		
			}
			 
			$stmt->close();
			$dbCon->close();
			return $data['user_id'];
		}
		
		function updateVerificationInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			
			$codeInfo=$this->codeInfo($data);
			
			
			$stmt = $dbCon->prepare("select id from user_logins where email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $codeInfo['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCheck = $result->fetch_assoc();	
			
			if(empty($rowCheck))
			{
			$stmt = $dbCon->prepare("select user_logins.id,country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where country_of_residence=? and phone_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $codeInfo['country_id'],$codeInfo['phone_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCheck = $result->fetch_assoc();	
			if(!empty($rowCheck))
			{
			$stmt = $dbCon->prepare("update user_profiles   set phone_number='' where user_logins_id=?");
			$stmt->bind_param("i", $rowCheck['id']);
			$stmt->execute();	
			}
			
			$stmt = $dbCon->prepare("update user_visiting_countries   set phone_number='' where country_info=?  and phone_number=?");
			$stmt->bind_param("is", $codeInfo['country_id'],$codeInfo['phone_number']);
			$stmt->execute();	
			$rf=0;	
			$st=1;
			$data['random_hash'] = substr(md5(uniqid(rand(), true)), 16, 16);
			$stmt = $dbCon->prepare("INSERT INTO user_logins (first_name,last_name,registered_from,get_started_wizard_status,email,  email_verification_code , created_on , modified_on, country_of_residence,verification_status,user_came_from,domain_id ) VALUES (?, ?, ?, ?,   ?, ?, now(), now(), ?, ?,?,?)");
			$stmt->bind_param("ssiissiiii", $codeInfo['first_name'], $codeInfo['last_name'],$st,$st,$codeInfo['email'], $data['random_hash'], $codeInfo['country_id'],$rf,$came_from,$domain_id);
			$stmt->execute();
			$data['user_id']=$stmt->insert_id;	
			$stmt = $dbCon->prepare("INSERT INTO user_profiles (user_logins_id,phone_number ) VALUES (?, ?)");
			$stmt->bind_param("is", $data['user_id'], $codeInfo['phone_number']);
			$stmt->execute();
			}
			else
			{
			$data['user_id']=$rowCheck['id'];		
			}
			
			
			$updateServicePaymentDetail=$this->updateServicePaymentDetail($data);
			$stmt->close();
			$dbCon->close();
			return $data['user_id'];
		}
		
		function saveServicePaymentCardData($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$_POST['exp_date']=$_POST['expiry_year'].'-'.$_POST['expiry_month'].'-01';
			$stmt = $dbCon->prepare("insert into user_service_payment_info(card_number,cvv,expiry_date,job_id) values(?,?,?,?)");
				
			/* bind parameters for markers */
			$stmt->bind_param("sssi",$_POST['card_number'],$_POST['cvv'],$_POST['exp_date'],$job_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function addPaymentCompany($data)
		{
			$dbCon = AppModel::createConnection();
			$domain_id= $this -> encrypt_decrypt('decrypt',$data['domain_id']);
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$verification_id=$this->encrypt_decrypt('decrypt',$data['verification_id']);
			$codeInfo=$this->codeInfo($data); 
			
			
			 
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
			
			$stmt = $dbCon->prepare("select country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCountry= $result->fetch_assoc();
			$codeInfo['pnumber']=$rowCountry['phone_number'];
			$codeInfo['country']=$rowCountry['country_of_residence'];
			$stmt = $dbCon->prepare("select company_id,company_email from companies left join company_profiles on company_profiles.company_id=companies.id where cid=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $codeInfo['cid']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCompany = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("select country_code,country_name from phone_country_code where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $codeInfo['country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_country = $result->fetch_assoc();
			 
			
			 if(empty($rowCompany))
			 {
			$codeInfo['company_email']=$codeInfo['cid'].'.'.$row_country['country_code'].'@qloudid.com';
			$email=$codeInfo['company_email'];
			$codeInfo['adrs1']=$codeInfo['daddress'];
			$codeInfo['port_number']=$codeInfo['d_port_number'];
			$name=htmlentities($codeInfo['company_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$street_address=htmlentities($codeInfo['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
			$city=htmlentities($codeInfo['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
			$codeInfo['company_type']=1;
			$codeInfo['objectType']=1;
			$codeInfo['signup_type']=1;
			$codeInfo['position_type']=1;
			$web='';
			$st=1;
			$stmt = $dbCon->prepare("insert into companies(company_type,o_type,country_id,user_login_id,company_name,company_email,website,hash_code,created_date,email_verification_status,created_by,user_role,is_landloard_signup,domain_id) 
			values(?, ?, ?, ?, ?, ?, ?, ?, now(), ?, ?, ?,?,?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiiissssiiiii", $codeInfo['company_type'],$st, $codeInfo['country'], $data['admin_id'], $name, $email, $web, $hash_code,$st,$data['user_id'],$codeInfo['position_type'],$st,$domain_id);
			
			
			if (!$stmt->execute()) {
				$stmt->close();
				$dbCon->close();
				return 0;
			} 
			else 
			{
				$id=$stmt->insert_id;
				
				 
			$address=$codeInfo['daddress'].' '.$codeInfo['d_port_number'];
  
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
			$address=$codeInfo['dcity'].' '.$codeInfo['d_port_number'];	
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
			$codeInfo['phone_number']=$codeInfo['pnumber'];
				$street_address=	htmlentities($codeInfo['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
				$stmt = $dbCon->prepare("insert into company_profiles(latitude,longitude,`company_id`,address,cid,created_on,modified_on,port_number,phone) values(?,?,?, ?, ?,now(),now(),?,?)");
				
				$stmt->bind_param("ssissss", $response[0]['lat'],$response[0]['lon'],$id, $street_address,$codeInfo['cid'],$codeInfo['d_port_number'],$codeInfo['phone_number']);
				$stmt->execute();
				
				
				$stmt = $dbCon->prepare("insert into user_company_profile(`company_id`,`user_login_id`) values(?, ?)");
				
				$stmt->bind_param("ii", $id, $data['admin_id']);
				$stmt->execute();
				$data['location']='Headquarter';
				$stmt = $dbCon->prepare("insert into location (company_id,country_id,location,created_on) values (?, ?, ?, now())");
				
				$stmt->bind_param("iis", $id, $codeInfo['country'],  $data['location']);
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
				$codeInfo['property_id']=1;
				$codeInfo['is_headquarter']=1;
				$stmt = $dbCon->prepare("INSERT INTO property_location (latitude,longitude,company_id,property_id,visiting_address,created_on, is_headquarter,port_number) VALUES (?,?, ?, ?, ?, now(), ?, ?)");
				$stmt->bind_param("ssiisis",$response[0]['lat'],$response[0]['lon'], $id,$codeInfo['property_id'],$street_address, $codeInfo['is_headquarter'],$codeInfo['d_port_number']);
				$stmt->execute();
				$property_id=$stmt->insert_id;
				$codeInfo['same_invoice']=1;
					$codeInfo['iaddress']=$codeInfo['daddress'];
					 $codeInfo['icity']=$codeInfo['dcity'];
					 $codeInfo['izip']=$codeInfo['dzip'];
					 $codeInfo['i_port_number']=$codeInfo['d_port_number'];
				$stmt=$dbCon->prepare("update company_profiles set si_address=?,si_city=?,si_zip=?,sd_address=?,sd_city=?,sd_zip=?,d_port_number=?,i_port_number=?,is_invoice_same=?   where company_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssssssssii", $codeInfo['iaddress'],$codeInfo['icity'],$codeInfo['izip'],$codeInfo['daddress'],$codeInfo['dcity'],$codeInfo['dzip'],$codeInfo['d_port_number'],$codeInfo['i_port_number'],$codeInfo['same_invoice'],$id);
				$stmt->execute();
				
				
				$stmt = $dbCon->prepare("update property_location set street_name_i=?, city_i=?, postal_code_i=?, street_name_v=?, city_v=?, postal_code_v=?, d_port_number=?,i_port_number=?,is_invoice_same=?,country_v=?,country_i=?    where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssssssssissi", $codeInfo['iaddress'],$codeInfo['icity'],$codeInfo['izip'],$codeInfo['daddress'],$codeInfo['dcity'],$codeInfo['dzip'],$codeInfo['d_port_number'],$codeInfo['i_port_number'],$codeInfo['same_invoice'],$row_country['country_name'],$row_country['country_name'],$property_id);
				$stmt->execute();
				
								
				$fields=array();
				
				$fields=$codeInfo;
				$fields['country_name']=$row_country['country_name'];
				$fields['property_id_qloud']=$property_id;
				$fields['company_email']=$email;
				$fields['web']='www.qloudid.com';
				$fields['user_email']=$userrow['email'];
				$fields['is_admin']=$user_admin;
				$fields['hash_code']=$hash_code;
				$url='https://www.qmatchup.com/beta/company/index.php/UpdateUserCompany/addCompany';
			 $fieldscodeInfo=array();
				$fieldscodeInfo['posted']='';
				$fieldscodeInfo['posted']= $this -> encrypt_decrypt('encrypt',serialize($codeInfo));
				
				$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => 'https://www.qmatchup.com/beta/company/index.php/UpdateUserCompany/addCompany',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS => $fieldscodeInfo,
			));
				
				
				 
			
			$result=curl_exec ($curl);
			$status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			
			curl_close ($curl);
			
			 
			}	
			 }
			else
			{
				$email=$rowCompany['company_email'];
				$id=$rowCompany['company_id'];
			}
			$data['email']=$email;
			$data['cid']=$this->encrypt_decrypt('encrypt',$id);
			 
			$stmt->close();
			$dbCon->close();
			return $data['cid'];
			
		}
		
		
		function updateServicePaymentData($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$code=mt_rand(1111,9999); 
			$code1=mt_rand(1111,9999); 
			$_POST['fname']=htmlentities($_POST['fname'],ENT_NOQUOTES, 'ISO-8859-1');
			$_POST['fname']=htmlentities($_POST['lname'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into user_service_payment_info(expiry_year,email,first_name,last_name,country_id,phone_number,card_number,cvv,expiry_month,job_id,email_otp,phone_otp) values(?,?,?,?,?,?,?,?,?,?,?,?)");
				
			/* bind parameters for markers */
			$stmt->bind_param("isssisssssss",$_POST['expiry_year'],$_POST['email'],$_POST['fname'],$_POST['lname'],$_POST['country'],$_POST['pnumber'],$_POST['card_number'],$_POST['cvv'],$_POST['expiry_month'],$job_id,$code,$code1);
			$stmt->execute();
			$id=$stmt->insert_id;
			$stmt = $dbCon->prepare("select country_code,country_name from country where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_country = $result->fetch_assoc();
			/*$subject='Verify phone';
			$emailContent='Please verify your phone using code - '.$code1;
			$to            = '+'.trim($row_country['country_code']).''.trim($_POST['pnumber']);
			 
			try{
			$res=json_decode(sendSms($subject, $to, $emailContent),true);
			}
			catch(Exception $e) {
						 
					   
					}
				catch (Error $e) {
					 
											}

			$subject='Verify email';
			$emailContent='Please verify your email using code - '.$code;
			$to            = $_POST['email'];
			$res= sendEmail($subject, $to, $emailContent);*/
			$stmt->close();
			$dbCon->close();
			return $this->encrypt_decrypt('encrypt',$id);
		}
		
		
		function updateCompanPaymentData($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$updateServicePaymentData=$this->encrypt_decrypt('decrypt',$data['updateServicePaymentData']);
			$code=mt_rand(1111,9999); 
			$code1=mt_rand(1111,9999); 
			$_POST['company_name']=htmlentities($_POST['company_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$_POST['daddress']=htmlentities($_POST['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
			$_POST['dcity']=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("update user_service_payment_info set payment_mode=1,cid=?, company_name=?, daddress=?,d_port_number=?,dzip=?,dcity=? where id=?");
				
			/* bind parameters for markers */
			$stmt->bind_param("ssssssi",$_POST['cid'],$_POST['company_name'],$_POST['daddress'],$_POST['d_port_number'],$_POST['dzip'],$_POST['dcity'],$updateServicePaymentData);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updatePayingCompany($data)
		{
			$dbCon = AppModel::createConnection();
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update user_professional_service_request set company_id=?,carried_for=2 where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$job_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}	
		
		
		
		function updateServicePaymentDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$stmt = $dbCon->prepare("update user_professional_service_request set user_id=?,carried_for=1 where id=?");
			 
			/* bind parameters for markers */
			 
			$stmt->bind_param("ii", $data['user_id'],$job_id);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("update  hotel_roomservice_item_ordered set booking_person_id=?,user_id=? where professional_user_job_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("iii",$data['user_id'],$data['user_id'],$job_id);
			$stmt->execute();
			$data['serviceSelected']    = $this->serviceSelected($data);
			if($data['serviceSelected']==1)
			{
			$stmt = $dbCon->prepare("select sum(dish_price) as total_price,first_name,last_name,email from hotel_roomservice_item_ordered left join user_logins on user_logins.id=hotel_roomservice_item_ordered.user_id where hotel_roomservice_item_ordered.professional_user_job_id=?");
			$stmt->bind_param("i", $job_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=4242424242424242&card[exp_month]=2&card[exp_year]=2040&card[cvc]=314");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);
			$a=json_decode($result,true);
			 
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "name=".$row['first_name']."&email=".$row['email']."&source=".$a['id']."&description=My");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);
			$b=json_decode($result,true);
			$cuId=$b['id'];
			
			$total_price=$row['total_price']*100;
			if($total_price<500)
			{
				$total_price=500;
			}
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "customer=".$b['id']."&amount=".$total_price."&currency=sek&description=My");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);			
			$c=json_decode($result,true);
			$Chargeid=$c['id'];	
			
			
			$stmt = $dbCon->prepare("update hotel_roomservice_item_ordered set charge_id=?,customer_id=? where professional_user_job_id=?");
			$stmt->bind_param("ssi",$Chargeid,$cuId, $job_id);
			$stmt->execute();	
			}
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}	
		
	function employerSummary($data)
		{
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select company_name,companies.id,address from companies  left join company_profiles on company_profiles.company_id=companies.id where companies.id in(select company_id from employees where user_login_id=?)");
			 
			/* bind parameters for markers */
			 
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select company_id from cleaning_company_premium_account_request where company_id=? and domain_id=?");
			 
			/* bind parameters for markers */
			 
			$stmt->bind_param("ii", $row['id'],$domain_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();
			if(empty($row1))
			{
				$row['is_registered']=0;
			}
			else
			{
				$row['is_registered']=1;
			}
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
				
				 
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function userCompanySummary($data)
		{
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select company_name,companies.id,address from companies  left join company_profiles on company_profiles.company_id=companies.id where companies.id in(select company_id from employees where user_login_id=?)");
			 
			/* bind parameters for markers */
			 
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select company_id from user_company_signup_marketplaces where company_id=? and domain_id=?");
			 
			/* bind parameters for markers */
			 
			$stmt->bind_param("ii", $row['id'],$domain_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();
			if(empty($row1))
			{
				$row['is_registered']=0;
			}
			else
			{
				$row['is_registered']=1;
			}
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
				
				 
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
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
		$stmt->close();
		$dbCon->close();
		return $userid;
		}
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
		function verifyEmailOtpDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			
			$stmt = $dbCon->prepare("select * from user_signup_request where id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if($row['signup_otp']==$_POST['otp'])
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
		 
		function sendSignUpRequest($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			
			$stmt = $dbCon->prepare("select * from user_signup_request where email=?");
			$stmt->bind_param("s", $_POST['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into user_signup_request(email,user_signup_info,subscription_type) values(?,?,?)");
				
			/* bind parameters for markers */
			$stmt->bind_param("sii",$_POST['email'],$_POST['user_signup_type'],$_POST['subscription_type']);
			$stmt->execute();
			$id=$stmt->insert_id;
			}
			else
			{
				$stmt = $dbCon->prepare("update user_signup_request set  user_signup_info=?,subscription_type=? where email=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("iis",$_POST['user_signup_type'],$_POST['subscription_type'],$_POST['email']);
				$stmt->execute();
				$id=$row['id'];
			}
			
			$stmt = $dbCon->prepare("select * from user_logins where email=?");
			$stmt->bind_param("s", $_POST['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$data['id']=$this->encrypt_decrypt('encrypt',$id);
				$data['result']=0;
				$stmt->close();
				$dbCon->close();
				return $data;	
			}
			$data['result']=1;
			$code=mt_rand(111111,999999); 
			$stmt = $dbCon->prepare("update user_signup_request set  signup_otp=? where id=?");
				
			/* bind parameters for markers */
			$stmt->bind_param("ii",$code,$id);
			$stmt->execute();
			$data['id']=$this->encrypt_decrypt('encrypt',$id);
			$data['email']=$_POST['email'];
			$to=$data['email'];
			$subject="Verify email";
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
                                    <h1 style="font-family:&quot;Klarna Display&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:36px;line-height:40px">Your 6-digit code</h1>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Hi there! Your 6-digit code is:</div>
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
                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Use this code to complete the verification process in the app or website.</div>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Do not share this code. Qloud ID representatives will never reach out to you to verify this code over the phone or SMS.</div>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px"><b>The code is valid for 10 minutes.</b></div>
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
						$to      = 'kowaken.ghirmai@gmail.com';
						sendEmail($subject, $to, $emailContent);
					   
					}
			$stmt->close();
			$dbCon->close();
			return $data;	
		}
		
		function selectedSubcategoryDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			
			$stmt = $dbCon->prepare("select property_information_required from professional_service_subcategory where id=(select subcategory_id from user_professional_service_request where id=?)");
			$stmt->bind_param("i",$job_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			
			
			
			$stmt->close();
			$dbCon->close();
			return $row['property_information_required'];	
		}
		function userSignupMarketplaces($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			
			$stmt = $dbCon->prepare("select * from user_signup_marketplaces where user_id=? and domain_id=?");
			$stmt->bind_param("ii",$data['user_id'], $domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into user_signup_marketplaces(user_id,domain_id) values(?,?)");
				
			/* bind parameters for markers */
			$stmt->bind_param("ii",$data['user_id'], $domain_id);
			$stmt->execute();
			$id=$stmt->insert_id;
			}
			else
			{
				$id=$row['id'];
			}
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		function companySignupMarketplaces($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from user_company_signup_marketplaces where company_id=? and domain_id=?");
			$stmt->bind_param("ii",$company_id, $domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into user_company_signup_marketplaces(company_id,domain_id) values(?,?)");
				
			/* bind parameters for markers */
			$stmt->bind_param("ii",$company_id, $domain_id);
			$stmt->execute();
			$id=$stmt->insert_id;
			}
			else
			{
				$id=$row['id'];
			}
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		
		
		function sendUserSignupVerificationInfo($data)
		{
			
			$to            = $data['email'];
			$subject       = "Sign up verification!";
			$emailContent='<html xmlns="http://www.w3.org/1999/xhtml" style="background-color: rgb(240, 240, 240);" class=""><head>
					  <title>Reservation confirmed</title>
					  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
					  <meta charset="utf-8">
					  <meta name="viewport" content="width=device-width, initial-scale=1">
					  <meta http-equiv="X-UA-Compatible" content="IE=edge">
					  <style type="text/css">
						/* GT AMERICA */

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Regular";
						  font-weight: 400;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.ttf") format("truetype");
						}

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Medium";
						  font-weight: 600;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.ttf") format("truetype");
						}

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Condensed Bold";
						  font-weight: 700;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.ttf") format("truetype");
						}

						/* CLIENT-SPECIFIC RESET */

						body,
						table,
						td,
						a {
						  -webkit-text-size-adjust: 100%;
						  -ms-text-size-adjust: 100%;
						}

						/* Prevent WebKit and Windows mobile changing default text sizes */

						table,
						td {
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						}

						/* Remove spacing between tables in Outlook 2007 and up */

						img {
						  -ms-interpolation-mode: bicubic;
						}

						/* Allow smoother rendering of resized image in Internet Explorer */

						.im {
						  color: inherit !important;
						}

						/* DEVICE-SPECIFIC RESET */

						a[x-apple-data-detectors] {
						  color: inherit !important;
						  text-decoration: none !important;
						  font-size: inherit !important;
						  font-family: inherit !important;
						  font-weight: inherit !important;
						  line-height: inherit !important;
						}

						/* iOS BLUE LINKS */

						/* RESET */

						img {
						  border: 0;
						  height: auto;
						  line-height: 100%;
						  outline: none;
						  text-decoration: none;
						  display: block;
						}

						table {
						  border-collapse: collapse;
						}

						table td {
						  border-collapse: collapse;
						  display: table-cell;
						}

						body {
						  height: 100% !important;
						  margin: 0 !important;
						  padding: 0 !important;
						  width: 100% !important;
						}

						/* BG COLORS */

						.mainTable {
						  background-color: #F0F0F0;
						}

						.mainTable--hospitality {
						  background-color: #f7f2ed;
						}

						html {
						  background-color: #F0F0F0;
						}

						/* VARIABLES */

						.bg-white {
						  background-color: white;
						}

						.hr {
						  /* Cross-client horizontal rule. Adapted from https://litmus.com/community/discussions/4633-is-there-a-reliable-1px-horizontal-rule-method */
						  background-color: #d3d3d8;
						  border-collapse: collapse;
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						  mso-line-height-rule: exactly;
						  line-height: 1px;
						}

						.textAlignLeft {
						  text-align: left !important;
						}

						.textAlignRight {
						  text-align: right !important;
						}

						.textAlignCenter {
						  text-align: center !important;
						}

						.mt1 {
						  margin-top: 6px;
						}

						.list {
						  padding-left: 18px;
						  margin: 0;
						}

						/* TYPOGRAPHY */

						body {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  color: #4f4f65;
						  -webkit-font-smoothing: antialiased;
						  -ms-text-size-adjust: 100%;
						  -moz-osx-font-smoothing: grayscale;
						  font-smoothing: always;
						  text-rendering: optimizeLegibility;
						}

						.h1 {
						  font-family: "GT America Condensed Bold", "Roboto Condensed", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 700;
						  vertical-align: middle;
						  font-size: 36px;
						  line-height: 42px;
						}

						.h2 {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 600;
						  vertical-align: middle;
						  font-size: 16px;
						  line-height: 24px;
						}

						.text {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 16px;
						  line-height: 21px;
						}

						.text-list {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 16px;
						  line-height: 25px;
						}

						.textSmall {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 14px;
						}

						.text-xsmall {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-size: 11px;
						  text-transform: uppercase;
						  line-height: 22px;
						  letter-spacing: 1px;
						}

						.text-bold {
						  font-weight: 600;
						}

						.text-link {
						  text-decoration: underline;
						}

						.text-linkNoUnderline {
						  text-decoration: none;
						}

						.text-strike {
						  text-decoration: line-through;
						}

						/* FONT COLORS */

						.textColorDark {
						  color: #23233e;
						}

						.textColorNormal {
						  color: #4f4f65;
						}

						.textColorBlue {
						  color: #2020c0;
						}

						.textColorGrayDark {
						  color: #7B7B8B;
						}

						.textColorGray {
						  color: #A5A8AD;
						}

						.textColorWhite {
						  color: #FFFFFF;
						}

						.textColorRed {
						  color: #df3232;
						}

						/* BUTTON */

						.Button-primary-wrapper {
						  border-radius: 3px;
						  background-color: #2020C0;
						}

						.Button-primary {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  border-radius: 3px;
						  border: 1px solid #2020C0;
						  color: #ffffff;
						  display: block;
						  font-size: 16px;
						  font-weight: 600;
						  padding: 18px;
						  text-decoration: none;
						}

						.Button-secondary-wrapper {
						  border-radius: 3px;
						  background-color: #ffffff;
						}

						.Button-secondary {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  border-radius: 3px;
						  border: 1px solid #2020C0;
						  color: #2020C0;
						  display: block;
						  font-size: 16px;
						  font-weight: 600;
						  padding: 18px;
						  text-decoration: none;
						}

						/* LAYOUT */

						.Content-container {
						  padding-left: 60px;
						  padding-right: 60px;
						}

						.Content-container--main {
						  padding-top: 54px;
						  padding-bottom: 60px;
						}

						.Content {
						  width: 580px;
						  margin: 0 auto;
						}

						.wrapper {
						  max-width: 600px;
						}

						.section {
						  padding: 24px 0px;
						  border-bottom: 1px solid #d3d3d8;
						}

						.section--noBorder {
						  padding: 24px 0px 0;
						}

						.section--last {
						  padding: 24px 0px;
						}

						.message {
						  background-color: #F4F4F5;
						  padding: 18px;
						}

						.card {
						  border: 1px solid #d3d3d8;
						  padding: 18px;
						}

						/* HEADER */

						.header-tockLogoImage {
						  display: block;
						  color: #F0F0F0;
						}

						.header-heroImage {
						  padding-bottom: 24px;
						}

						/* PREHEADER */

						.preheader {
						  display: none;
						  font-size: 1px;
						  color: #FFFFFF;
						  line-height: 1px;
						  max-height: 0px;
						  max-width: 0px;
						  opacity: 0;
						  overflow: hidden;
						}

						/* BANNER */

						.notice {
						  padding: 12px;
						  background: #23233E;
						  color: #FFFFFF;
						  display: block;
						  font-size: 14px;
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 600;
						}

						/* INTRO */

						.section--intro {
						  padding-bottom: 48px;
						}

						/* BOOKING INFO */

						.business-logo__container {
						  width: 48px;
						  height: 48px;
						  border-radius: 3px;
						  border: 1px solid #d3d3d8;
						  overflow: hidden;
						}

						.business-logo__image {
						  border: 1px solid transparent;
						  border-radius: 3px;
						  width: 48px;
						  height: 48px;
						  display: block;
						}

						.business-address--address {
						  width: 50%;
						}

						.business-address--map {
						  width: 50%;
						}

						.business-address--map-image {
						  width: 100%;
						}

						/* MOBILE TICKETS */

						.mobile-ticket--description {
						  width: 65%;
						  margin-top: 12px;
						  margin-right: 5%;
						}

						.mobile-ticket--code {
						  width: 30%;
						}

						.mobile-ticket--code-image {
						  width: 100%;
						}

						/* RESERVATION ACTIONS */

						.linksTable {
						  border-bottom: 1px solid #d3d3d8;
						}

						.linksTableRow {
						  padding: 24px 12px;
						}

						.actions-icon {
						  vertical-align: middle;
						}

						.actions-text {
						  vertical-align: middle;
						}

						/* RECEIPT */

						.receipt__container {
						  border: 1px solid #d3d3d8;
						  padding: 24px;
						}

						.receipt__row {
						  border-top: 1px solid #d3d3d8;
						}

						/* FEEDBACK ICONS */

						.feedback-link {
						  border: 1px solid #d4d5da;
						  border-radius: 3px;
						  display: inline-block;
						  width: calc(32% - 2px);
						  padding: 10px 0;
						}

						.feedback-link-bumper {
						  display: inline-block;
						  width: 1%;
						}

						.feedback-link img {
						  height: 50px;
						  width: 50px;
						}

						/* SOCIAL ICONS */

						.social-link {
						  display: inline-block;
						  width: auto;
						}

						.social-link-text {
						  padding: 14px 24px 14px 14px;
						}

						/* TABLET STYLES */

						@media screen and (max-width: 648px) {
						  /* DEVICE-SPECIFIC RESET */
						  div[style*="margin: 16px 0;"] {
							margin: 0 !important;
						  }
						  /* ANDROID CENTER FIX */
						  /* LAYOUT */
						  .wrapper {
							width: 100% !important;
							max-width: 100% !important;
						  }
						  .Content {
							width: 90% !important;
						  }
						  .Content-container {
							padding-left: 36px !important;
							padding-right: 36px !important;
						  }
						  .Content-container--main {
							padding-top: 30px !important;
							padding-bottom: 42px !important;
						  }
						  .responsiveTable {
							width: 100% !important;
						  }
						  /* RESERVATION ACTIONS */
						  .linksTableRow {
							padding-left: 0 !important;
							padding-right: 0 !important;
							padding-top: 12px !important;
							padding-bottom: 12px !important;
						  }
						  .linksTableRow--borderRight {
							border-right: none !important;
							padding-left: 0 !important;
							padding-right: 0 !important;
						  }
						  /* FEEDBACK LINK */
						  .feedback-link img {
							height: 38px !important;
							width: 38px !important;
						  }
						}

						/* MOBILE STYLES */

						@media screen and (max-width: 480px) {
						  /* TYPOGRAPHY */
						  .h1 {
							font-size: 30px !important;
							line-height: 30px !important;
						  }
						  .text {
							font-size: 16px !important;
							line-height: 22px !important;
						  }
						  /* BUTTON */
						  .mobile-buttonContainer {
							width: 100% !important;
						  }
						  /* LAYOUT */
						  .Content {
							width: 100% !important;
						  }
						  .Content-container {
							padding-left: 18px !important;
							padding-right: 18px !important;
						  }
						  .Content-container--main {
							padding-top: 24px !important;
							padding-bottom: 30px !important;
						  }
						  .section {
							padding: 18px 0 !important;
						  }
						  .section--last {
							padding: 18px 0 !important;
						  }
						  .header {
							padding: 0 18px !important;
						  }
						  .business-address--address {
							width: 100% !important;
						  }
						  .business-address--map {
							margin-top: 30px !important;
							width: 100% !important;
						  }
						  .mobile-ticket--description {
							width: 100% !important;
							margin-top: 0px !important;
						  }
						  .mobile-ticket--code {
							margin-top: 30px !important;
							margin-left: 0;
							width: 100% !important;
						  }
						  /* RECEIPT */
						  .receipt__container {
							padding: 12px !important;
						  }
						  /* SOCIAL ICONS */
						  .social-link {
							display: block !important;
							width: 100% !important;
							border-bottom: 1px solid #d3d3d8 !important;
						  }
						  /* INTRO */
						  .section--intro {
							padding-top: 18px !important;
							padding-bottom: 18px !important;
						  }
						}
					  </style>
					<style id="__web-inspector-hide-shortcut-style__">
.__web-inspector-hide-shortcut__, .__web-inspector-hide-shortcut__ *, .__web-inspector-hidebefore-shortcut__::before, .__web-inspector-hideafter-shortcut__::after
{
    visibility: hidden !important;
}
</style></head>

					<body style="margin: 0 !important; padding: 0 !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; height: 100%; margin: 0; padding: 0; width: 100%; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; color: rgb(79, 79, 101); -webkit-font-smoothing: antialiased; -ms-text-size-adjust: 100%; -moz-osx-font-smoothing: grayscale; font-smoothing: always; text-rendering: optimizeLegibility;">
					   
					  <!--[if mso]>
						<style type="text/css">
					.h1 {font-family: "Helvetica", "Arial", sans-serif !important; font-weight: 700 !important; vertical-align: middle !important; font-size: 36px !important; mso-line-height-rule: exactly;line-height: 42px !important;}
					.h2 {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 600 !important;vertical-align: middle !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 24px !important;}
					.text {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 21px !important;}
					.text-list {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 25px !important;}
					.textSmall {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 14px !important;}
					.text-xsmall {font-family: "Helvetica", "Arial", sans-serif !important;font-size: 11px !important;text-transform: uppercase !important;mso-line-height-rule: exactly;line-height: 22px !important;letter-spacing: 1px !important;}
					.text-bold {font-weight: 600 !important;}
					.text-link {text-decoration: underline !important;}
					.text-linkNoUnderline {text-decoration: none !important;}
					.text-strike {text-decoration: line-through !important;}
					.textColorDark {color: #23233e !important;}
					.textColorNormal {color: #4f4f65 !important;}
					.textColorBlue {color: #2020c0 !important;}
					.textColorGray {color: #A5A8AD !important;}
					.textColorWhite {color: #FFFFFF !important;}
					.Button-primary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #ffffff !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
					.Button-secondary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #2020C0 !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
						</style>
						<![endif]-->
					  <!-- HIDDEN PREHEADER TEXT -->
					  <div class="preheader" style="display: none; font-size: 1px; color: rgb(255, 255, 255); line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
					  </div>
					  <table border="0" cellpadding="0" cellspacing="0" width="100%" class=" mainTable  " style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: rgb(240, 240, 240);">
						<tbody><tr><td style="display:none !important;
					 visibility:hidden;
					 mso-hide:all;
					 font-size:1px;
					 color:#ffffff;
					 line-height:1px;
					 max-height:0px;
					 max-width:0px;
					 opacity:0;
					 overflow:hidden; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> We are thrilled that you will be joining us. If yo... </td>
						<!-- HEADER -->
						</tr><tr>
						  <td align="center" class="header" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
							<!--[if (gte mso 9)|(IE)]>
						<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
						<tr>
						<td align="center" valign="top" width="600">
						<![endif]-->
							<table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 580px; margin: 0 auto;">
							  <tbody><tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr>
								<td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <h1 style="font-size: 33px;font-weight: 800;line-height: 30px;">Qloud ID</h1>               </td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							</tbody></table>
							<!--[if (gte mso 9)|(IE)]>
						</td>
						</tr>
						</table>
						<![endif]-->
						  </td>
						</tr>
						<!-- CONTENT -->
						<tr>
						  <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
							<!--[if (gte mso 9)|(IE)]>
						<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
						<tr>
						<td align="center" valign="top" width="600">
						<![endif]-->
							<table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content bg-white" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: white; width: 580px; margin: 0 auto;">
							  <tbody><tr>
								<td class="Content-container Content-container--main text textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101); padding-left: 60px; padding-right: 60px; padding-top: 54px; padding-bottom: 60px;">
								  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
									<!-- RESTAURANT INFO -->
									<tbody>
									<!-- INTRO -->
									<tr>
									  <td valign="top" align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">Sign Up request</span>                          </td>
										  </tr>
										  <tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  <tr>
											<td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
											  <!--[if gte mso 15]>&nbsp;<![endif]-->
											</td>
										  </tr>
										  <tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										</tbody></table>
									  </td>
									</tr>
									<!-- MESSAGE -->
									<tr class="spacer">
									  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<tr>
									  <td align="left" class="message" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
										<div class="text textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
										  <span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">Account request</span>
										  <br>This email is sent to you because you have requested to create an account for you. If this was you please click on below email and proceed for sign up process.</div>
									  </td>
									</tr>
									<tr class="spacer">
									  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<tr>
									  <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
										<!--[if gte mso 15]>&nbsp;<![endif]-->
									  </td>
									</tr>
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<!-- BOOKING INFO -->
									<tr>
									  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr>
											<td align="left" valign="middle" width="468" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="text-list textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">
												<span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">'.date("F j, Y, g:i a").'</span>
												
											  </div>
											</td>
										  </tr>
										  
										  
										  

					

					

					




										</tbody></table>
									  </td>
									</tr>
									<!-- ADDRESS -->
									<tr>
									  <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  <tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  <tr>
											<td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
											  <!--[if gte mso 15]>&nbsp;<![endif]-->
											</td>
										  </tr>
										  <tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  
										  
										</tbody></table>
									  </td>
									</tr>
									
									
									
									
										
									<!-- RECEIPT -->
									
									
									
									
									
									
									
									
									<tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
                      
                      
                      



<tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>

<tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody>
<tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="https://qloudid.com/public/index.php/UserCompanySignUp/signUpProfessionalInfo/'.$data['domain_id'].'/'.$data['id'].'" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;">Complete Sign Up</a>                                </td>
                            </tr>
                          </tbody>
</table>
                        </td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
									
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									
									
									<tr>
									  <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
										<!--[if gte mso 15]>&nbsp;<![endif]-->
									  </td>
									</tr>
									
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<!-- EDIT RECEIPT -->
									<!-- CANCELLATION POLICY -->
									<tr>
									  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="text text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; font-weight: 600; color: rgb(35, 35, 62);">
												Company policy
											  </div>
											</td>
										  </tr>
										  <tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
												
												<span>You can complete your sign up process only after verifying this email address.</span>
											  </div>
											</td>
										  </tr>
										</tbody></table>
									  </td>
									</tr>
									<tr class="spacer">
									  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									
									<!-- QUESTIONS -->
									
								  </tbody></table>
								</td>
							  </tr>
							</tbody></table>
						  </td>
						</tr>
						<!-- FOOTER -->
						<tr>
						  <td align="center" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; width: 580px; margin: 0 auto;">
							<!-- Will most likely required a feature flag -->
							<!--[if (gte mso 9)|(IE)]>
					<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
					<tr>
					<td align="center" valign="top" width="600">
					<![endif]-->
							<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="Content-container" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
							  <tbody><tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr>
								<td align="center" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <a href="https://www.exploretock.com" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;"> <img src="https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png" width="30" height="30" alt="Tock" border="0" style="-ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; display: block;"> </a>              </td>
							  </tr>
							  <tr class="spacer">
								<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr>
								<td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
								  <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
									© 2019 Tock, Inc.
								  </div>
								  <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
									All Rights Reserved
								  </div>
								</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							</tbody></table>
							<!--[if (gte mso 9)|(IE)]>
					</td>
					</tr>
					</table>
					<![endif]-->
						  </td>
						</tr>
					  </tbody></table><title>Reservation confirmed</title>
					  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
					  <meta charset="utf-8">
					  <meta name="viewport" content="width=device-width, initial-scale=1">
					  <meta http-equiv="X-UA-Compatible" content="IE=edge">
					  <style type="text/css">
						/* GT AMERICA */

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Regular";
						  font-weight: 400;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.ttf") format("truetype");
						}

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Medium";
						  font-weight: 600;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.ttf") format("truetype");
						}

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Condensed Bold";
						  font-weight: 700;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.ttf") format("truetype");
						}

						/* CLIENT-SPECIFIC RESET */

						body,
						table,
						td,
						a {
						  -webkit-text-size-adjust: 100%;
						  -ms-text-size-adjust: 100%;
						}

						/* Prevent WebKit and Windows mobile changing default text sizes */

						table,
						td {
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						}

						/* Remove spacing between tables in Outlook 2007 and up */

						img {
						  -ms-interpolation-mode: bicubic;
						}

						/* Allow smoother rendering of resized image in Internet Explorer */

						.im {
						  color: inherit !important;
						}

						/* DEVICE-SPECIFIC RESET */

						a[x-apple-data-detectors] {
						  color: inherit !important;
						  text-decoration: none !important;
						  font-size: inherit !important;
						  font-family: inherit !important;
						  font-weight: inherit !important;
						  line-height: inherit !important;
						}

						/* iOS BLUE LINKS */

						/* RESET */

						img {
						  border: 0;
						  height: auto;
						  line-height: 100%;
						  outline: none;
						  text-decoration: none;
						  display: block;
						}

						table {
						  border-collapse: collapse;
						}

						table td {
						  border-collapse: collapse;
						  display: table-cell;
						}

						body {
						  height: 100% !important;
						  margin: 0 !important;
						  padding: 0 !important;
						  width: 100% !important;
						}

						/* BG COLORS */

						.mainTable {
						  background-color: #F0F0F0;
						}

						.mainTable--hospitality {
						  background-color: #f7f2ed;
						}

						html {
						  background-color: #F0F0F0;
						}

						/* VARIABLES */

						.bg-white {
						  background-color: white;
						}

						.hr {
						  /* Cross-client horizontal rule. Adapted from https://litmus.com/community/discussions/4633-is-there-a-reliable-1px-horizontal-rule-method */
						  background-color: #d3d3d8;
						  border-collapse: collapse;
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						  mso-line-height-rule: exactly;
						  line-height: 1px;
						}

						.textAlignLeft {
						  text-align: left !important;
						}

						.textAlignRight {
						  text-align: right !important;
						}

						.textAlignCenter {
						  text-align: center !important;
						}

						.mt1 {
						  margin-top: 6px;
						}

						.list {
						  padding-left: 18px;
						  margin: 0;
						}

						/* TYPOGRAPHY */

						body {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  color: #4f4f65;
						  -webkit-font-smoothing: antialiased;
						  -ms-text-size-adjust: 100%;
						  -moz-osx-font-smoothing: grayscale;
						  font-smoothing: always;
						  text-rendering: optimizeLegibility;
						}

						.h1 {
						  font-family: "GT America Condensed Bold", "Roboto Condensed", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 700;
						  vertical-align: middle;
						  font-size: 36px;
						  line-height: 42px;
						}

						.h2 {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 600;
						  vertical-align: middle;
						  font-size: 16px;
						  line-height: 24px;
						}

						.text {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 16px;
						  line-height: 21px;
						}

						.text-list {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 16px;
						  line-height: 25px;
						}

						.textSmall {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 14px;
						}

						.text-xsmall {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-size: 11px;
						  text-transform: uppercase;
						  line-height: 22px;
						  letter-spacing: 1px;
						}

						.text-bold {
						  font-weight: 600;
						}

						.text-link {
						  text-decoration: underline;
						}

						.text-linkNoUnderline {
						  text-decoration: none;
						}

						.text-strike {
						  text-decoration: line-through;
						}

						/* FONT COLORS */

						.textColorDark {
						  color: #23233e;
						}

						.textColorNormal {
						  color: #4f4f65;
						}

						.textColorBlue {
						  color: #2020c0;
						}

						.textColorGrayDark {
						  color: #7B7B8B;
						}

						.textColorGray {
						  color: #A5A8AD;
						}

						.textColorWhite {
						  color: #FFFFFF;
						}

						.textColorRed {
						  color: #df3232;
						}

						/* BUTTON */

						.Button-primary-wrapper {
						  border-radius: 3px;
						  background-color: #2020C0;
						}

						.Button-primary {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  border-radius: 3px;
						  border: 1px solid #2020C0;
						  color: #ffffff;
						  display: block;
						  font-size: 16px;
						  font-weight: 600;
						  padding: 18px;
						  text-decoration: none;
						}

						.Button-secondary-wrapper {
						  border-radius: 3px;
						  background-color: #ffffff;
						}

						.Button-secondary {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  border-radius: 3px;
						  border: 1px solid #2020C0;
						  color: #2020C0;
						  display: block;
						  font-size: 16px;
						  font-weight: 600;
						  padding: 18px;
						  text-decoration: none;
						}

						/* LAYOUT */

						.Content-container {
						  padding-left: 60px;
						  padding-right: 60px;
						}

						.Content-container--main {
						  padding-top: 54px;
						  padding-bottom: 60px;
						}

						.Content {
						  width: 580px;
						  margin: 0 auto;
						}

						.wrapper {
						  max-width: 600px;
						}

						.section {
						  padding: 24px 0px;
						  border-bottom: 1px solid #d3d3d8;
						}

						.section--noBorder {
						  padding: 24px 0px 0;
						}

						.section--last {
						  padding: 24px 0px;
						}

						.message {
						  background-color: #F4F4F5;
						  padding: 18px;
						}

						.card {
						  border: 1px solid #d3d3d8;
						  padding: 18px;
						}

						/* HEADER */

						.header-tockLogoImage {
						  display: block;
						  color: #F0F0F0;
						}

						.header-heroImage {
						  padding-bottom: 24px;
						}

						/* PREHEADER */

						.preheader {
						  display: none;
						  font-size: 1px;
						  color: #FFFFFF;
						  line-height: 1px;
						  max-height: 0px;
						  max-width: 0px;
						  opacity: 0;
						  overflow: hidden;
						}

						/* BANNER */

						.notice {
						  padding: 12px;
						  background: #23233E;
						  color: #FFFFFF;
						  display: block;
						  font-size: 14px;
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 600;
						}

						/* INTRO */

						.section--intro {
						  padding-bottom: 48px;
						}

						/* BOOKING INFO */

						.business-logo__container {
						  width: 48px;
						  height: 48px;
						  border-radius: 3px;
						  border: 1px solid #d3d3d8;
						  overflow: hidden;
						}

						.business-logo__image {
						  border: 1px solid transparent;
						  border-radius: 3px;
						  width: 48px;
						  height: 48px;
						  display: block;
						}

						.business-address--address {
						  width: 50%;
						}

						.business-address--map {
						  width: 50%;
						}

						.business-address--map-image {
						  width: 100%;
						}

						/* MOBILE TICKETS */

						.mobile-ticket--description {
						  width: 65%;
						  margin-top: 12px;
						  margin-right: 5%;
						}

						.mobile-ticket--code {
						  width: 30%;
						}

						.mobile-ticket--code-image {
						  width: 100%;
						}

						/* RESERVATION ACTIONS */

						.linksTable {
						  border-bottom: 1px solid #d3d3d8;
						}

						.linksTableRow {
						  padding: 24px 12px;
						}

						.actions-icon {
						  vertical-align: middle;
						}

						.actions-text {
						  vertical-align: middle;
						}

						/* RECEIPT */

						.receipt__container {
						  border: 1px solid #d3d3d8;
						  padding: 24px;
						}

						.receipt__row {
						  border-top: 1px solid #d3d3d8;
						}

						/* FEEDBACK ICONS */

						.feedback-link {
						  border: 1px solid #d4d5da;
						  border-radius: 3px;
						  display: inline-block;
						  width: calc(32% - 2px);
						  padding: 10px 0;
						}

						.feedback-link-bumper {
						  display: inline-block;
						  width: 1%;
						}

						.feedback-link img {
						  height: 50px;
						  width: 50px;
						}

						/* SOCIAL ICONS */

						.social-link {
						  display: inline-block;
						  width: auto;
						}

						.social-link-text {
						  padding: 14px 24px 14px 14px;
						}

						/* TABLET STYLES */

						@media screen and (max-width: 648px) {
						  /* DEVICE-SPECIFIC RESET */
						  div[style*="margin: 16px 0;"] {
							margin: 0 !important;
						  }
						  /* ANDROID CENTER FIX */
						  /* LAYOUT */
						  .wrapper {
							width: 100% !important;
							max-width: 100% !important;
						  }
						  .Content {
							width: 90% !important;
						  }
						  .Content-container {
							padding-left: 36px !important;
							padding-right: 36px !important;
						  }
						  .Content-container--main {
							padding-top: 30px !important;
							padding-bottom: 42px !important;
						  }
						  .responsiveTable {
							width: 100% !important;
						  }
						  /* RESERVATION ACTIONS */
						  .linksTableRow {
							padding-left: 0 !important;
							padding-right: 0 !important;
							padding-top: 12px !important;
							padding-bottom: 12px !important;
						  }
						  .linksTableRow--borderRight {
							border-right: none !important;
							padding-left: 0 !important;
							padding-right: 0 !important;
						  }
						  /* FEEDBACK LINK */
						  .feedback-link img {
							height: 38px !important;
							width: 38px !important;
						  }
						}

						/* MOBILE STYLES */

						@media screen and (max-width: 480px) {
						  /* TYPOGRAPHY */
						  .h1 {
							font-size: 30px !important;
							line-height: 30px !important;
						  }
						  .text {
							font-size: 16px !important;
							line-height: 22px !important;
						  }
						  /* BUTTON */
						  .mobile-buttonContainer {
							width: 100% !important;
						  }
						  /* LAYOUT */
						  .Content {
							width: 100% !important;
						  }
						  .Content-container {
							padding-left: 18px !important;
							padding-right: 18px !important;
						  }
						  .Content-container--main {
							padding-top: 24px !important;
							padding-bottom: 30px !important;
						  }
						  .section {
							padding: 18px 0 !important;
						  }
						  .section--last {
							padding: 18px 0 !important;
						  }
						  .header {
							padding: 0 18px !important;
						  }
						  .business-address--address {
							width: 100% !important;
						  }
						  .business-address--map {
							margin-top: 30px !important;
							width: 100% !important;
						  }
						  .mobile-ticket--description {
							width: 100% !important;
							margin-top: 0px !important;
						  }
						  .mobile-ticket--code {
							margin-top: 30px !important;
							margin-left: 0;
							width: 100% !important;
						  }
						  /* RECEIPT */
						  .receipt__container {
							padding: 12px !important;
						  }
						  /* SOCIAL ICONS */
						  .social-link {
							display: block !important;
							width: 100% !important;
							border-bottom: 1px solid #d3d3d8 !important;
						  }
						  /* INTRO */
						  .section--intro {
							padding-top: 18px !important;
							padding-bottom: 18px !important;
						  }
						}
					  </style>



					   
					  <!--[if mso]>
						<style type="text/css">
					.h1 {font-family: "Helvetica", "Arial", sans-serif !important; font-weight: 700 !important; vertical-align: middle !important; font-size: 36px !important; mso-line-height-rule: exactly;line-height: 42px !important;}
					.h2 {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 600 !important;vertical-align: middle !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 24px !important;}
					.text {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 21px !important;}
					.text-list {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 25px !important;}
					.textSmall {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 14px !important;}
					.text-xsmall {font-family: "Helvetica", "Arial", sans-serif !important;font-size: 11px !important;text-transform: uppercase !important;mso-line-height-rule: exactly;line-height: 22px !important;letter-spacing: 1px !important;}
					.text-bold {font-weight: 600 !important;}
					.text-link {text-decoration: underline !important;}
					.text-linkNoUnderline {text-decoration: none !important;}
					.text-strike {text-decoration: line-through !important;}
					.textColorDark {color: #23233e !important;}
					.textColorNormal {color: #4f4f65 !important;}
					.textColorBlue {color: #2020c0 !important;}
					.textColorGray {color: #A5A8AD !important;}
					.textColorWhite {color: #FFFFFF !important;}
					.Button-primary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #ffffff !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
					.Button-secondary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #2020C0 !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
						</style>
						<![endif]-->
					  <!-- HIDDEN PREHEADER TEXT -->
					  <div class="preheader" style="display: none; font-size: 1px; color: rgb(255, 255, 255); line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
					  </div>
					  



					</body></html>';
				
 
			try {
			  sendEmail($subject, $to, $emailContent);
			  
			}

			//catch exception
			catch(Exception $e) {
			  $to            = 'kowaken.ghirmai@gmail.com';
			  sendEmail($subject, $to, $emailContent);
			} 
		}
		
		
		
		function emailRequestReceivedInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			$stmt = $dbCon->prepare("select * from user_signup_request where id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("select user_logins.id,first_name,last_name,country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where email=?");
			$stmt->bind_param("s", $row['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUser = $result->fetch_assoc();
			
			if(empty($rowUser))
			{
				$row['user_id']=0;
				$row['first_name']='';
				$row['last_name']='';
				$row['country']='';
				$row['phone_number']='';
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
		
		
		function selectedMarketplaces($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select * from professional_marketplace where id=?");
			$stmt->bind_param("i", $domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		function updateSelectedArea()
		{
		return	$this->encrypt_decrypt('encrypt',$_POST['varea']);
		}
		function postedJobInfo($data)
		{ 
			$dbCon = AppModel::createConnection();
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$stmt = $dbCon->prepare("select * from user_professional_service_request where id=?");
			$stmt->bind_param("i",$job_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		function getSubcategoryIssue($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from landloard_ticket_subtitle_repair_issue where landloard_ticket_subtitle_id=?");
			$stmt->bind_param("i", $_POST['subcategory_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
				/*$org=$org.'<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20" id="'.$row['id'].'">
														<a href="javascript:void(0);" onclick="updateInclutionType('.$row['id'].')"><input data-testid="test-checkbox-Walls" name="Walls" type="checkbox" class="css-1lgzhz8"></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">'.$row['home_repair_issue'].'</label></div>
															
															</div>';*/
															
				$org=$org.'<label class="checkbox">
<input class="checkbox__input" type="checkbox"  id="'.$row['id'].'"  onclick="updateInclutionType('.$row['id'].')"><span class="checkbox__inner"><span class="checkbox__tick"></span><span class="checkbox__text">'.$row['home_repair_issue'].'</span></span>
</label>';
															
															
															
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		 
	}
		function vitechCityList()
		{ 
		
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from vitech_city");
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0">Select</option>';
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<option value="'.$row['id'].'">'.$row['city_name'].'</option>';
			}
				
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		function vitechCityGet()
		{ 
		
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from vitech_city");
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
		
		
		function vitechCityNameList()
		{ 
		
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from vitech_city");
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0">Select</option>';
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<option value="'.$row['city_name'].'">'.$row['city_name'].'</option>';
			}
				
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		function vitechCitySelectList()
		{ 
		
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from vitech_city");
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<a class="location__item js-location-item " href="#">'.$row['city_name'].'</a>';
				
			}
				
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		function vitechAreaList()
		{ 
		
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select *  from vitech_area where region_city_id=?");
			$stmt->bind_param("i", $_POST['city_id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			$org='<option value="0">Select</option>';
			while($row= $result3->fetch_assoc())
			{
			$org=$org.'<option value="'.$row['id'].'">'.$row['area_name'].'</option>';
			}
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		function updateSelectedCity()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from vitech_city where city_name=?");
			$stmt->bind_param("s", $_POST['city']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			return	$this->encrypt_decrypt('encrypt',$row['id']);
		}
		
		function selectedCityDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$city_id=$this->encrypt_decrypt('decrypt',$data['city_id']);
			
			$stmt = $dbCon->prepare("select * from vitech_city where id=?");
			$stmt->bind_param("i", $city_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			return	$row;
		}
		
		function addUserReview($data)
		{ 
			$dbCon = AppModel::createConnection();
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$date=strtotime(date('Y-m-d')); 
			$_POST['review_information']=htmlentities($_POST['review_information'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("update user_professional_service_request set review_done=1,review_star=?,review_description=?,review_date=? where id=?");
			$stmt->bind_param("issi",$_POST['user_rating'],$_POST['review_information'],$date,$job_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updatePriceForService($data)
		{ 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			if($_POST['broadcast_type']==0)
			{
			$_POST['broadcast_type']=2;	
			}
			$stmt = $dbCon->prepare("update user_professional_service_request_company_info set is_service_bookable=?,bookable_calender=?,is_accepted=?,per_hour_fee=?,project_fee=? where job_id=? and company_id=?");
			$stmt->bind_param("iiiiiii",$_POST['is_bookable'],$_POST['bookable_calender'],$_POST['broadcast_type'],$_POST['price_per_hour'],$_POST['project_fee'],$request_id,$company_id);
			$stmt->execute();
			
			if($_POST['broadcast_type']==1)
			{
			$this->sendCompanyBidInfo($data);
			}
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updatePriceForProperty($data)
		{ 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			if($_POST['broadcast_type']==0)
			{
			$_POST['broadcast_type']=2;	
			}
			$stmt = $dbCon->prepare("update user_professional_service_request_company_info set  is_accepted=?  where job_id=? and company_id=?");
			$stmt->bind_param("iii", $_POST['broadcast_type'],$request_id,$company_id);
			$stmt->execute();
			
			if($_POST['broadcast_type']==1)
			{
			$stmt = $dbCon->prepare("select user_logins.email,user_professional_service_request_company_info.id,job_id,subcategory_name,floor_area,user_address.city,is_accepted,company_name from user_professional_service_request_company_info left join user_professional_service_request on user_professional_service_request.id=user_professional_service_request_company_info.job_id left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join user_address on user_address.id=user_professional_service_request.user_property_id left join companies on companies.id=user_professional_service_request_company_info.company_id left join user_logins on user_logins.id=user_professional_service_request.user_id where user_professional_service_request.id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt = $dbCon->prepare("insert into user_professional_service_request_property_bid(property_id, property_price, deposit_fee, cleaning_fee, late_arrival_fee, property_checks_completed,  user_professional_service_request_bid_id, request_id,company_id,created_on) values(?,?,?, ?,?,?,?,?,?,now())");
				
			/* bind parameters for markers */
			$stmt->bind_param("iiiiisiii",$_POST['property_type_detail'],$_POST['property_price'],$_POST['deposit_fee'],$_POST['cleaning_fee'],$_POST['late_arrival_fee'],$_POST['inclusion_type_detail'], $row['id'],$request_id,$company_id);
			$stmt->execute();	
			$this->sendCompanyPropertyBidInfo($data);
			}
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function sendCompanyPropertyBidInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']); 
			$stmt = $dbCon->prepare("select user_logins.email,user_professional_service_request_company_info.id,job_id,subcategory_name,floor_area,user_address.city,is_accepted,company_name from user_professional_service_request_company_info left join user_professional_service_request on user_professional_service_request.id=user_professional_service_request_company_info.job_id left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join user_address on user_address.id=user_professional_service_request.user_property_id left join companies on companies.id=user_professional_service_request_company_info.company_id left join user_logins on user_logins.id=user_professional_service_request.user_id where user_professional_service_request.id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$data['job_id']=$this->encrypt_decrypt('encrypt',$row['job_id']);
			$to            = $row['email'];
			$subject       = "Premium Qualified company bid received!";
			$emailContent='<html>
    <head></head>
    <body>
        <table
            border="0"
            cellpadding="0"
            cellspacing="0"
            width="100%"
            style="
                border-collapse: collapse;
                background-color: rgb(240, 240, 240);
                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                letter-spacing: normal;
                text-indent: 0px;
                text-transform: none;
                word-spacing: 0px;
                text-decoration: none;
            "
        >
            <tbody>
                <tr></tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;">
                                        <h1 style="font-size: 33px; font-weight: 800; line-height: 30px;">
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Qloud ID</font></font>
                                        </h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; background-color: white; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td
                                        style="
                                            border-collapse: collapse;
                                            display: table-cell;
                                            font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                            font-weight: 400;
                                            font-size: 16px;
                                            line-height: 21px;
                                            color: rgb(79, 79, 101);
                                            padding: 54px 60px 60px;
                                        "
                                    >
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" valign="center" width="48" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="width: 48px; height: 48px; border-radius: 3px; border: 1px solid rgb(211, 211, 216); overflow: hidden;"></div>
                                                                    </td>
                                                                    <td width="12" style="border-collapse: collapse; display: table-cell;">&nbsp;</td>
                                                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;">
                                                                        <span
                                                                            style="
                                                                                font-family: GT America Medium, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 600;
                                                                                vertical-align: middle;
                                                                                font-size: 16px;
                                                                                line-height: 24px;
                                                                                color: rgb(35, 35, 62);
                                                                            "
                                                                        >
                                                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$row['subcategory_name'].'</font></font>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" align="left" style="border-collapse: collapse; display: table-cell;">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <span
                                                                            style="
                                                                                font-family: GT America Condensed Bold, Roboto Condensed, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 700;
                                                                                vertical-align: middle;
                                                                                font-size: 36px;
                                                                                line-height: 42px;
                                                                                color: rgb(35, 35, 62);
                                                                            "
                                                                        >
                                                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">You got a proposal</font></font>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        align="left"
                                                                        colspan="2"
                                                                        valign="top"
                                                                        width="100%"
                                                                        height="1"
                                                                        style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"
                                                                    ></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top" style="border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                                                            <span style="font-weight: 600; color: rgb(35, 35, 62);">
                                                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">A perposal from '.$row['company_name'].'</font></font>
                                                            </span>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                    <p></p>
                                                                    We are thrilled to inform you that a contractor has shown an interest and that this contractor also made a proposal.
                                                                    <p></p>
                                                                </font>

                                                                <font style="vertical-align: inherit;">
                                                                    If you click the button below then you will be able to read&nbsp;the&nbsp;proposal.
                                                                </font>
                                                            </font>
                                                            <span>&nbsp;</span><br />
                                                            <font style="vertical-align: inherit;"></font>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" valign="center" width="100%" style="border-collapse: collapse; display: table-cell;">
                                                                        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td
                                                                                        align="center"
                                                                                        valign="center"
                                                                                        width="100%"
                                                                                        style="border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);"
                                                                                    >
                                                                                        <a
                                                                                            href="https://www.qloudid.com/public/index.php/UserProfessionalServiceRequest/receivedPropertybidList/'.$data['request_id'].'"
                                                                                            style="
                                                                                                font-family: GT America Medium, Roboto, Helvetica, Arial, sans-serif;
                                                                                                border-radius: 3px;
                                                                                                border: 1px solid rgb(32, 32, 192);
                                                                                                color: rgb(255, 255, 255);
                                                                                                display: block;
                                                                                                font-size: 16px;
                                                                                                font-weight: 600;
                                                                                                padding: 18px;
                                                                                                text-decoration: none;
                                                                                            "
                                                                                            target="_blank"
                                                                                            data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.dstricts.com%252Fpublic%252Findex.php%252FHotel%252FverifyCheckin%252FK1p5TzIweWpQa1RQSm5wV3QyOUc1Zz09/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/1/3Ug7SAcXST&amp;source=gmail&amp;ust=1684593415394000&amp;usg=AOvVaw16u70RZouwQwLMGFz6hYYB"
                                                                                        >
                                                                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Check proposal</font></font><span>&nbsp;</span>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" valign="center" width="100%" style="border-collapse: collapse; display: table-cell;">
                                                                        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="border-collapse: collapse;"></table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="border-collapse: collapse; display: table-cell;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell; width: 580px; margin: 0px auto;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top" style="border-collapse: collapse; display: table-cell;">
                                        <a
                                            href="https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2"
                                            target="_blank"
                                            data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2&amp;source=gmail&amp;ust=1684593415395000&amp;usg=AOvVaw0lQVcFgYUs07mcaxDkFSvl"
                                        >
                                            <img
                                                src="https://ci6.googleusercontent.com/proxy/d_UyQeDDh58PPnTVAfB57FFPf4BgmGx84bl0DRCqJ5V0oaD3dwZiSbLlYHRWWIVpKYsAR7dCz9LXae65k7i_SxitY6s6nk0uzQqOfC7535Yi4A5xhIVIveRcSvbE7LmQF6Utwl1wepfmTb5VKnXBHG4Tjw=s0-d-e1-ft#https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png"
                                                width="30"
                                                height="30"
                                                alt="Tock"
                                                border="0"
                                                style="border: 0px; height: auto; line-height: 12px; outline: none; text-decoration: none; display: block;"
                                                class="CToWUd"
                                                data-bit="iit"
                                            />
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">© 2019 TOCK, INC.</font></font>
                                        </div>
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ALL RIGHTS RESERVED</font></font>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>';
				
 
			try {
			  sendEmail($subject, $to, $emailContent);
			  
			}

			//catch exception
			catch(Exception $e) {
			  $to            = 'kowaken.ghirmai@gmail.com';
			  sendEmail($subject, $to, $emailContent);
			} 
		}
		
		
		
		function sendCompanyBidInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']); 
			$stmt = $dbCon->prepare("select user_logins.email,user_professional_service_request_company_info.id,job_id,subcategory_name,floor_area,user_address.city,is_accepted,company_name from user_professional_service_request_company_info left join user_professional_service_request on user_professional_service_request.id=user_professional_service_request_company_info.job_id left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join user_address on user_address.id=user_professional_service_request.user_property_id left join companies on companies.id=user_professional_service_request_company_info.company_id left join user_logins on user_logins.id=user_professional_service_request.user_id where user_professional_service_request.id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$data['job_id']=$this->encrypt_decrypt('encrypt',$row['job_id']);
			$to            = $row['email'];
			$subject       = "Premium Qualified company bid received!";
			$emailContent='<html>
    <head></head>
    <body>
        <table
            border="0"
            cellpadding="0"
            cellspacing="0"
            width="100%"
            style="
                border-collapse: collapse;
                background-color: rgb(240, 240, 240);
                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                letter-spacing: normal;
                text-indent: 0px;
                text-transform: none;
                word-spacing: 0px;
                text-decoration: none;
            "
        >
            <tbody>
                <tr></tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;">
                                        <h1 style="font-size: 33px; font-weight: 800; line-height: 30px;">
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Qloud ID</font></font>
                                        </h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; background-color: white; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td
                                        style="
                                            border-collapse: collapse;
                                            display: table-cell;
                                            font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                            font-weight: 400;
                                            font-size: 16px;
                                            line-height: 21px;
                                            color: rgb(79, 79, 101);
                                            padding: 54px 60px 60px;
                                        "
                                    >
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" valign="center" width="48" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="width: 48px; height: 48px; border-radius: 3px; border: 1px solid rgb(211, 211, 216); overflow: hidden;"></div>
                                                                    </td>
                                                                    <td width="12" style="border-collapse: collapse; display: table-cell;">&nbsp;</td>
                                                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;">
                                                                        <span
                                                                            style="
                                                                                font-family: GT America Medium, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 600;
                                                                                vertical-align: middle;
                                                                                font-size: 16px;
                                                                                line-height: 24px;
                                                                                color: rgb(35, 35, 62);
                                                                            "
                                                                        >
                                                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$row['subcategory_name'].'</font></font>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" align="left" style="border-collapse: collapse; display: table-cell;">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <span
                                                                            style="
                                                                                font-family: GT America Condensed Bold, Roboto Condensed, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 700;
                                                                                vertical-align: middle;
                                                                                font-size: 36px;
                                                                                line-height: 42px;
                                                                                color: rgb(35, 35, 62);
                                                                            "
                                                                        >
                                                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">You got a proposal</font></font>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        align="left"
                                                                        colspan="2"
                                                                        valign="top"
                                                                        width="100%"
                                                                        height="1"
                                                                        style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"
                                                                    ></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top" style="border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                                                            <span style="font-weight: 600; color: rgb(35, 35, 62);">
                                                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">A perposal from '.$row['company_name'].'</font></font>
                                                            </span>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                    <p></p>
                                                                    We are thrilled to inform you that a contractor has shown an interest and that this contractor also made a proposal.
                                                                    <p></p>
                                                                </font>

                                                                <font style="vertical-align: inherit;">
                                                                    If you click the button below then you will be able to read&nbsp;the&nbsp;proposal.
                                                                </font>
                                                            </font>
                                                            <span>&nbsp;</span><br />
                                                            <font style="vertical-align: inherit;"></font>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" valign="center" width="100%" style="border-collapse: collapse; display: table-cell;">
                                                                        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td
                                                                                        align="center"
                                                                                        valign="center"
                                                                                        width="100%"
                                                                                        style="border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);"
                                                                                    >
                                                                                        <a
                                                                                            href="https://www.qloudid.com/public/index.php/UserProfessionalServiceRequest/receivedbidList/'.$data['request_id'].'"
                                                                                            style="
                                                                                                font-family: GT America Medium, Roboto, Helvetica, Arial, sans-serif;
                                                                                                border-radius: 3px;
                                                                                                border: 1px solid rgb(32, 32, 192);
                                                                                                color: rgb(255, 255, 255);
                                                                                                display: block;
                                                                                                font-size: 16px;
                                                                                                font-weight: 600;
                                                                                                padding: 18px;
                                                                                                text-decoration: none;
                                                                                            "
                                                                                            target="_blank"
                                                                                            data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.dstricts.com%252Fpublic%252Findex.php%252FHotel%252FverifyCheckin%252FK1p5TzIweWpQa1RQSm5wV3QyOUc1Zz09/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/1/3Ug7SAcXST&amp;source=gmail&amp;ust=1684593415394000&amp;usg=AOvVaw16u70RZouwQwLMGFz6hYYB"
                                                                                        >
                                                                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Check proposal</font></font><span>&nbsp;</span>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" valign="center" width="100%" style="border-collapse: collapse; display: table-cell;">
                                                                        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="border-collapse: collapse;"></table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="border-collapse: collapse; display: table-cell;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell; width: 580px; margin: 0px auto;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top" style="border-collapse: collapse; display: table-cell;">
                                        <a
                                            href="https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2"
                                            target="_blank"
                                            data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2&amp;source=gmail&amp;ust=1684593415395000&amp;usg=AOvVaw0lQVcFgYUs07mcaxDkFSvl"
                                        >
                                            <img
                                                src="https://ci6.googleusercontent.com/proxy/d_UyQeDDh58PPnTVAfB57FFPf4BgmGx84bl0DRCqJ5V0oaD3dwZiSbLlYHRWWIVpKYsAR7dCz9LXae65k7i_SxitY6s6nk0uzQqOfC7535Yi4A5xhIVIveRcSvbE7LmQF6Utwl1wepfmTb5VKnXBHG4Tjw=s0-d-e1-ft#https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png"
                                                width="30"
                                                height="30"
                                                alt="Tock"
                                                border="0"
                                                style="border: 0px; height: auto; line-height: 12px; outline: none; text-decoration: none; display: block;"
                                                class="CToWUd"
                                                data-bit="iit"
                                            />
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">© 2019 TOCK, INC.</font></font>
                                        </div>
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ALL RIGHTS RESERVED</font></font>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>';
				
 
			try {
			  sendEmail($subject, $to, $emailContent);
			  
			}

			//catch exception
			catch(Exception $e) {
			  $to            = 'kowaken.ghirmai@gmail.com';
			  sendEmail($subject, $to, $emailContent);
			} 
		}
		
		function propertyManagerApartmentList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			$stmt = $dbCon->prepare("select * from property_manager_apartment_list where company_id=? and property_type_detail=(select property_type_detail from user_professional_service_request where id=?)");
			$stmt->bind_param("ii",$company_id, $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select count(id)as num from user_professional_service_request_property_bid where company_id=? and request_id=? and property_id=?");
			$stmt->bind_param("iii",$company_id, $request_id,$row['id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();
			if($row1['num']==0)
			{
			$row['proposal_sent']=0;
			$row['disabled']='';
			$row['already_sent']='';			
			}
			else
			{
			$row['proposal_sent']=1;
			$row['disabled']='disabled';
			$row['already_sent']='Proposal sent';			
			}
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
			array_push($org,$row);			
			}
				 
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
		}
		
		function serviceRequestReceivedInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			$stmt = $dbCon->prepare("select user_professional_service_request.subcategory_id,user_professional_service_request_company_info.id,job_id,subcategory_name,floor_area,city,is_accepted from user_professional_service_request_company_info left join user_professional_service_request on user_professional_service_request.id=user_professional_service_request_company_info.job_id left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join user_address on user_address.id=user_professional_service_request.user_property_id where user_professional_service_request_company_info.company_id=? and user_professional_service_request.id=? order by user_professional_service_request.created_on desc");
			$stmt->bind_param("ii",$company_id, $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
				if($row['is_accepted']==0)
				{
				$stmt = $dbCon->prepare("select count(id) as num from user_professional_service_request_company_info where job_id=? and company_id!=? and is_accepted=1");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("ii", $row['job_id'],$company_id);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if($row1['num']==5)
				{
				$stmt = $dbCon->prepare("update user_professional_service_request_company_info set is_accepted=3 where id=?");
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$row['is_accepted']=3;
				}					
				}
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		
		function employeeDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email from employees  where company_id=? limit 0,5");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select * from employee_service_booking_rules  where employee_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$resultEmp = $stmt->get_result();
				$rowEmp = $resultEmp->fetch_assoc();
				if(empty($rowEmp))
				{
				$stmt = $dbCon->prepare("insert into employee_service_booking_rules(employee_id,company_id,created_on) values(?,?,now())");
				
				/* bind parameters for markers */
				$stmt->bind_param("ii", $row['id'],$company_id);
				$stmt->execute();	
				}
				
			}
			 
			$stmt = $dbCon->prepare("select min(id) as emp_id,concat_ws(' ',first_name,last_name) as name,email from employees  where company_id=? and user_login_id!=43");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['emp_id']);
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
	    function updateBookingRulesInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			
			$stmt = $dbCon->prepare("update employee_service_booking_rules set `cancellation_policy`=? , `cancellation_policy_period` =? , `delete_of_ongoing_booking` =? , `number_of_future_booking`=? , `book_for_yourself`=?, `earliest_booking` =?, `earliest_booking_period` =? , `booking_occassion` =?, `booking_occassion_period` =?, `booking_over_a_period` =?, `minimum_booking_period_time` =?, `minimum_booking_period_time_period` =?, `future_book` =?, `future_book_period` =?, shared_events_per_day=?, shared_events_fee=?,more_booking_on_request=?, max_booking_on_request=?, extra_fee_booking_on_request=? where employee_id=? and service_type_detail=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiiiiiiiiiiiiiiiiiii",$_POST['cancellation_policy'], $_POST['cancellation_policy_period'],$_POST['delete_of_ongoing_booking'],$_POST['number_of_future_booking'],$_POST['book_for_yourself'],$_POST['earliest_booking'],$_POST['earliest_booking_period'],$_POST['booking_occassion'],$_POST['booking_occassion_period'],$_POST['booking_over_a_period'],$_POST['minimum_booking_period_time'],$_POST['minimum_booking_period_time_period'],$_POST['future_book'],$_POST['future_book_period'],$_POST['shared_events_per_day'],$_POST['shared_events_fee'],$_POST['more_booking_on_request'],$_POST['max_booking_on_request'],$_POST['extra_fee_booking_on_request'],$employee_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		 function bookingRulesInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from employee_service_booking_rules  where employee_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into employee_service_booking_rules(employee_id,company_id,created_on) values(?,?,now())");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $employee_id,$company_id);
			$stmt->execute();	
			}
			
			$stmt = $dbCon->prepare("select * from employee_service_booking_rules  where employee_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function pricingList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$catg_id= $this -> encrypt_decrypt('decrypt',$data['catg_id']);
			$subcatg_id= $this -> encrypt_decrypt('decrypt',$data['subcatg_id']);
			$domain_id= $this -> encrypt_decrypt('decrypt',$data['domain_id']); 
			$stmt = $dbCon->prepare("select id,dish_name,dish_detail,dish_price,is_bookable from professional_company_selected_service_todos_price_info where company_id=? and professional_subcategory_id=? and list_on_pickapro=1 and domain_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$subcatg_id,$domain_id);
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
		
		function homeRepairProblemCategoryDetail()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select id,ticket_title from `qloudid`.`landloard_ticket_title_new`");
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$i=1;
			while($row1 = $result->fetch_assoc())
			{
				
				$stmt = $dbCon->prepare("select display_name_allowed from `qloudid`.`professional_service_subcategory` where landloard_ticket_subtitle_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("i", $row1['id']);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$row2 = $result2->fetch_assoc();
				$row1['display_name_allowed']=$row2['display_name_allowed'];
				$row1['enc']=$this->encrypt_decrypt('encrypt',$row1['id']);
				array_push($org,$row1);			
				 
			}	
			
			 
			$stmt->close();
			$dbCon->close();
			return $org;			
		}
		
		function homeRepairProblemSubCategoryDetail($data)
		{ 
			$dbCon = AppModel::createConnection();
			$subcateg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$stmt = $dbCon->prepare("select * from landloard_property_problem_tickets_subpart where landloard_ticket_title_id=?");
			$stmt->bind_param("i", $subcateg_id);
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
		
		function selectedProblemSubpartId($data)
		{ 
			$dbCon = AppModel::createConnection();
			$subcateg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			if($subcateg_id==1 || $subcateg_id==6)
			{
				$stmt = $dbCon->prepare("select * from landloard_property_problem_tickets_subpart where id=? ");
				$stmt->bind_param("i", $data['problem_subpart_id']);
			}
			else
			{
				$stmt = $dbCon->prepare("select * from landloard_property_problem_tickets_subpart where landloard_ticket_title_id=?");
				$stmt->bind_param("i", $subcateg_id);
			}
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		function selectedCategoryProblemsInfo($data)
		{ 
			$dbCon = AppModel::createConnection();
			$subcateg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			if($subcateg_id<9)
			{
			$stmt = $dbCon->prepare("select * from landloard_ticket_subtitle_new where id<39");	
			}
			else
			{
			$stmt = $dbCon->prepare("select * from landloard_ticket_subtitle_new where id>38");	
			}
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
		
		function displayYesNo($data)
		{
			if($data==1)
				return 'Yes';
			else if($data==0)
			{
				return 'No';
			}
			else if($data==2)
			{
				return 'Dont know';
			}
			else
			{
			return 'I am not sure';	
			}
		}
		function suportedLanguagesList($data)
		{ 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_suported_languages where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select *  from language_list");
			$stmt->execute();
			$result3 = $stmt->get_result();	
			while($rowAmenities= $result3->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into professional_company_suported_languages (domain_id,language_id,company_id, created_on, modified_on) values (?,?,?, now(), now())");
			$stmt->bind_param("iii",$domain_id,$rowAmenities['id'],$company_id);
			$stmt->execute();
			 				
			}
			}
			
			
			$stmt = $dbCon->prepare("select professional_company_suported_languages.id,language_name,is_selected from professional_company_suported_languages left join language_list on language_list.id=professional_company_suported_languages.language_id where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
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
		
	function updateLanguageAvailable($data)
    {
        $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select * from professional_company_suported_languages  where id=?");
        /* bind parameters for markers */
		$stmt->bind_param("i", $_POST['language_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		if($row['is_selected']==0)
		{
			$is_selected=1;
		}
		else
		{
			$is_selected=0;
		}
		$stmt = $dbCon->prepare("update professional_company_suported_languages  set is_selected=? where id=?");
        /* bind parameters for markers */
		$stmt->bind_param("ii", $is_selected,$_POST['language_id']);
        $stmt->execute();
		$stmt->close();
        $dbCon->close();
		return 1;
    }
	
		function postJobRequirementInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			if($_POST['email']=='' || $_POST['email']==null)
			return 1;
			$data=array();
			$data1 = strip_tags($_POST['image-data1']);
			if($data1!='none')
			{
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			}
			else 
			{
				$img_name1="";
			}
			$_POST['domain_id']=$domain_id;
			$data['user_id']=$this->createUser($_POST);
			 $stmt = $dbCon->prepare("select * from user_professional_job_requirement where user_id =? and domain_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['user_id'],$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			 
			
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into `user_professional_job_requirement`(domain_id,image_path,   service_categories,  `language_speak`  ,  `have_driving_license`  , `user_id` , `created_on`, `pcountry` , `p_number`  ) VALUES (?,   ?, ?,?, ?, ?, now(),?,?)");
			$stmt->bind_param("isssiiis",$domain_id, $img_name1, $_POST['category_detail'], $_POST['inclusion_type_detail'], $_POST['price_info'],$data['user_id'],$_POST['pcountry'],$_POST['p_number']);
			$stmt->execute();	
			$id=$stmt->insert_id;
			}
			else 
			{
			$stmt = $dbCon->prepare("update `user_professional_job_requirement` set  image_path=?, service_categories=?,`language_speak`  =?,  `have_driving_license`  =?, `user_id` =?, `pcountry` =?, `p_number` =? where id=?");
			$stmt->bind_param("sssiiisi",$img_name1,$_POST['category_detail'], $_POST['inclusion_type_detail'],  $_POST['price_info'],$data['user_id'],$_POST['p_country'],$_POST['p_number'],$row['id']);
			$stmt->execute();
			$id=$row['id'];
			}
			
			$_POST['experience_info']=htmlentities($_POST['experience_info'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("update `user_professional_job_requirement` set  gender_info=?,linkdn_profile=?,english_profiency_level=?,start_time=?, experience_info=?, account_number=?, ifsc_code=?,`address`  =?,  `port_number`  =?, `city` =?, `zipcode` =?, `date_of_birth` =? where id=?");
			$stmt->bind_param("isssssssssssi",$_POST['gender_info'],$_POST['linkdn_profile'],$_POST['english_profiency_level'],$_POST['start_time'],$_POST['experience_info'],$_POST['account_number'],$_POST['ifsc_code'], $_POST['address'],  $_POST['port_number'],$data['city'],$_POST['zipcode'],$_POST['total_age'],$id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select * from language_list where find_in_set(id,?)");
			$stmt->bind_param("s", $_POST['inclusion_type_detail']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$inclusion='';
			while($rowInclusion = $result1->fetch_assoc())
			{
				$inclusion=$inclusion.$rowInclusion['language_name'].', ';
			}
			
			if($_POST['gender_info']==1)
			{
				$gender='Male';
			}
			else
			{
				$gender='Female';
			}
			
			$inclusion=substr($inclusion,0,-2);
			$stmt = $dbCon->prepare("select country_code from phone_country_code where id=?");
			$stmt->bind_param("i", $_POST['p_country']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$rowInclusion = $result1->fetch_assoc();
			$to            = 'kowaken.ghirmai@gmail.com';
			$subject       = "Premium Qualified Job requirement received!";
			$emailContent='<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
				<body>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="
                border-collapse: collapse;
                background-color: rgb(240, 240, 240);
                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                letter-spacing: normal;
                text-indent: 0px;
                text-transform: none;
                word-spacing: 0px;
                text-decoration: none;
            ">
            <tbody>
                <tr></tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;"><h1 style="font-size: 33px; font-weight: 800; line-height: 30px;">Pickapro</h1></td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; background-color: white; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td style="
                                            border-collapse: collapse;
                                            display: table-cell;
                                            font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                            font-weight: 400;
                                            font-size: 16px;
                                            line-height: 21px;
                                            color: rgb(79, 79, 101);
                                            padding: 54px 60px 60px;
                                        ">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                
                                                                
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" align="left" style="border-collapse: collapse; display: table-cell;">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <span style="
                                                                                font-family: GT America Condensed Bold, Roboto Condensed, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 700;
                                                                                vertical-align: middle;
                                                                                font-size: 36px;
                                                                                line-height: 42px;
                                                                                color: rgb(35, 35, 62);
                                                                            ">Job requirement</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="border-collapse: collapse; display: table-cell; border: 1px solid rgb(211, 211, 216); padding: 24px;">
                                                                         














<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">English profiency level </div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$_POST['english_profiency_level'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
																		
																		
																		<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">When can you start </div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$_POST['start_time'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
																		
																		
																		<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Gender</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$gender.'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
																		
																		
																		<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">linkdn profile</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$_POST['linkdn_profile'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
																		
																		
																		<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>

<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Experience</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$_POST['experience_info'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
																		
																		
																		<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Date of birth</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$_POST['total_age'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
																		
																		<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>

<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Name</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$_POST['first_name'].' '.$_POST['last_name'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
																		
																		<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>

<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Email address</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$_POST['email'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
																		
																		<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>

<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Contact number</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">+'.$rowInclusion['country_code'].' '.$_POST['p_number'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
																		
																		<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>

<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Address</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$_POST['address'].','.$_POST['port_number'].','.$_POST['zipcode'].','.$_POST['city'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
																		
																		<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>


<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Account number</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$_POST['account_number'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>

 
 
 

 
 
 


 
 
 


 
 
 


 
 
 
																		

 
 
 

 
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Do you have driving license?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$this->displayYesNo($_POST['price_info']).'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Language you speak</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$inclusion.'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table><table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>



<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Job seaker contact number</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">+'.$rowInclusion['country_code'].' '.$_POST['p_number'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                
                                                                                
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 600; font-size: 16px; line-height: 21px; color: rgb(35, 35, 62);">
                                                                            Cancellation policy
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="
                                                                                margin-top: 6px;
                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 400;
                                                                                font-size: 16px;
                                                                                line-height: 21px;
                                                                                color: rgb(79, 79, 101);
                                                                            ">
                                                                            <span>Your reservation can be canceled for a full refund 24 hours prior to the reservation time.<span>&nbsp;</span></span>
                                                                            <span>You can always transfer your reservation to another person.</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 600; font-size: 16px; line-height: 21px; color: rgb(35, 35, 62);">
                                                                            Questions?
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="
                                                                                margin-top: 6px;
                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 400;
                                                                                font-size: 16px;
                                                                                line-height: 21px;
                                                                                color: rgb(79, 79, 101);
                                                                            ">
                                                                            If you have questions about your reservation, contact us at&nbsp;<span>&nbsp;</span><a></a>or by calling<span>&nbsp;</span>
                                                                            <a href="tel:+=" target="_blank">+201 34534534</a>.
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell; width: 580px; margin: 0px auto;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top" style="border-collapse: collapse; display: table-cell;">
                                        <a href="https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2&amp;source=gmail&amp;ust=1684593415395000&amp;usg=AOvVaw0lQVcFgYUs07mcaxDkFSvl">
                                            <img src="https://ci6.googleusercontent.com/proxy/d_UyQeDDh58PPnTVAfB57FFPf4BgmGx84bl0DRCqJ5V0oaD3dwZiSbLlYHRWWIVpKYsAR7dCz9LXae65k7i_SxitY6s6nk0uzQqOfC7535Yi4A5xhIVIveRcSvbE7LmQF6Utwl1wepfmTb5VKnXBHG4Tjw=s0-d-e1-ft#https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png" width="30" height="30" alt="Tock" border="0" style="border: 0px; height: auto; line-height: 12px; outline: none; text-decoration: none; display: block;" class="CToWUd" data-bit="iit">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            © 2019 TOCK, INC.
                                        </div>
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            ALL RIGHTS RESERVED
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    

 
	 
	</body></html>';
			 
			sendEmail($subject, $to, $emailContent);
			 
			$to            = 'adam.bay@qualeefy.com';
			sendEmail($subject, $to, $emailContent);
			
			$to            = 'ana.tikh@qualeefy.com';
			sendEmail($subject, $to, $emailContent);
			
			$to            = 'daniela.allisson@qualeefy.com';
			sendEmail($subject, $to, $emailContent);
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
	function addProfessionalProperty($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			$stmt = $dbCon->prepare("select user_logins.id,first_name,last_name,ssn,country_of_residence,email,sex,dob_day,dob_month,dob_year,country_phone,phone_number, address,user_profiles.city,user_profiles.country,user_profiles.zipcode,grading_status from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where user_logins.id= (select user_id from user_professional_service_request where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$data['user_id']=$row['id'];
			if($_POST['same_name']==1)
			{
			$full_name=$row['first_name'].' '.$row['last_name'];	
			}
			else
			{
			$full_name=	htmlentities($_POST['flname'],ENT_NOQUOTES, 'ISO-8859-1');
			}
			$_POST['same_invoice']=1;
			if($_POST['same_invoice']==1)
			{
			$_POST['iaddress']=$_POST['addrs'];	
			$_POST['i_port_number']=$_POST['pnumber'];	
			$_POST['izip']=$_POST['dzip'];
			$_POST['icity']=$_POST['dcity'];
			}
			$st=0;
			$_POST['addrs']=htmlentities($_POST['addrs'],ENT_NOQUOTES, 'ISO-8859-1');
			$_POST['iaddress']=htmlentities($_POST['iaddress'],ENT_NOQUOTES, 'ISO-8859-1');
			
			$stmt = $dbCon->prepare("select count(id) as num from user_address where user_id = ?");
				
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
				$st=1;
				$added_on_place=2;
			$stmt = $dbCon->prepare("insert into  user_address (property_type, `user_id`, `address`  , `city`  , `zipcode` , `port_number` , `invoice_address`  , `invoice_city`  , `invoice_zipcode`  , `invoice_port_number`  , `is_name_same`  , `is_invoice_same`  , `name_on_house`   , `created_on`,entry_code,floors_available,added_on_place) values (?, ? , ?, ?, ?, ? , ?, ?, ?, ? , ?, ?, ?, now(), ?, ?,?)");
			/* bind parameters for markers */
			$stmt->bind_param("iissssssssiissii",$_POST['property_type_detail'],$data['user_id'],$_POST['addrs'],$_POST['dcity'], htmlentities($_POST['dzip'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['pnumber'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['iaddress'],$_POST['icity'],htmlentities($_POST['izip'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['i_port_number'],$_POST['same_invoice'],$_POST['same_name'],$full_name,$_POST['entry_code'],$_POST['total_floors'],$added_on_place);
			$stmt->execute();
			
			$id=$stmt->insert_id;
			
			$stmt = $dbCon->prepare("update user_profiles set name_on_door=?, entry_code=?, full_address=?, port_number=?, address=?, city=?, zipcode=?,invoice_address=?,invoice_zipcode=?,invoice_city=?,invoice_port=?,is_invoice_same=?,is_name_on_house_same=?, is_id_active=1  where user_logins_id=?");
				/* bind parameters for markers */
			$stmt->bind_param("sssssssssssiii",$full_name,$_POST['entry_code'], $_POST['addrs'],$_POST['pnumber'], $_POST['addrs'],htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['dzip'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['iaddress'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['izip'],htmlentities($_POST['icity'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['i_port_number'],$_POST['same_invoice'],$_POST['same_name'],$data['user_id']);
			}
			else
			{
			$added_on_place=2;
			$stmt = $dbCon->prepare("insert into  user_address (property_type, `user_id`, `address`  , `city`  , `zipcode` , `port_number` , `invoice_address`  , `invoice_city`  , `invoice_zipcode`  , `invoice_port_number`  , `is_name_same`  , `is_invoice_same`  , `name_on_house`   , `created_on`,entry_code,floors_available,added_on_place ) values (?, ? , ?, ?, ?, ? , ?, ?, ?, ? , ?, ?, ?, now(), ?,?,?)");
			/* bind parameters for markers */
			$stmt->bind_param("iissssssssiissii",$_POST['property_type_detail'],$data['user_id'],$_POST['addrs'],$_POST['dcity'], htmlentities($_POST['dzip'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['pnumber'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['iaddress'],$_POST['icity'],htmlentities($_POST['izip'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['i_port_number'],$_POST['same_invoice'],$_POST['same_name'],$full_name,$_POST['entry_code'],$_POST['total_floors'],$added_on_place);
			$stmt->execute();
			
			$id=$stmt->insert_id;
			}
			
			for($i=0;$i<$_POST['total_bathrooms'];$i++)
			{
			$stmt = $dbCon->prepare("insert into user_apartment_bathroom_detail (user_address_id, created_on, modified_on) values (?,now(), now())");
			$stmt->bind_param("i", $id);
			$stmt->execute();		
			}
			
			
			for($i=0;$i<$_POST['total_bedrooms'];$i++)
			{
			$stmt = $dbCon->prepare("insert into user_apartment_bedrooms (user_address_id, created_on) values (?,now())");
			$stmt->bind_param("i",$id);
			$stmt->execute();	
			$id1=$stmt->insert_id;
			$bed='Single';
			$stmt = $dbCon->prepare("insert into user_apartment_bedrooms_beds (bedroom_id,bed_info, created_on,modified_on) values (?,?,now(),now())");
			$stmt->bind_param("is", $id1,$bed);
			$stmt->execute();
			}
			  $stmt = $dbCon->prepare("update user_professional_service_request set property_type_detail=?,user_property_id=? where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("iii",$_POST['property_type_detail'],$id, $request_id);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select domain_id from user_professional_service_request where user_id = ?");
				
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			$stmt->close();
			$dbCon->close();
			return $this->encrypt_decrypt('encrypt',$rowId['domain_id']);
		}
		
		
		function updatePropertyDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			$stmt = $dbCon->prepare("update user_professional_service_request set user_property_id=? where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii",$_POST['b_id'], $request_id);
			$stmt = $dbCon->prepare("select domain_id from user_professional_service_request where id = ?");
				
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			$stmt->close();
			$dbCon->close();
			return $this->encrypt_decrypt('encrypt',$rowId['domain_id']);
		 }
	function getSelectedProperty($data)
    {
        $dbCon = AppModel::createConnection();
       
		$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
          $stmt = $dbCon->prepare("select * from user_address where user_id = (select user_id from user_professional_service_request where id=?)");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i",$request_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		while($row = $result->fetch_assoc())
		{
			if($row['id']==$_POST['id'])
			{
			$org=$org.'<a href="javascript:void(0);" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h green_bg brdr black_txt connect" onclick="updatebuilding(this,'.$row['id'].');"><div class="mart40 fsz18">'.$row['address'].'</div></a>';
			}
			else
			{
			$org=$org.'<a href="javascript:void(0);" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h lgtgrey_bg brdr black_txt connect" onclick="updatebuilding(this,'.$row['id'].');"><div class="mart40 fsz18">'.$row['address'].'</div></a>';
			}
		}
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	function userProffesionalRequest($data)
    {
        $dbCon = AppModel::createConnection();
       
		$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
	 
        $stmt = $dbCon->prepare("select * from user_professional_service_request where id=?");
        /* bind parameters for markers */
		$cont=1;
		$stmt->bind_param("i", $request_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$stmt = $dbCon->prepare("select * from professional_marketplace where id=?");
		$stmt->bind_param("i",$row['domain_id']);
		$stmt->execute();
		$result = $stmt->get_result();
		$rowDomain = $result->fetch_assoc();
		$row['enc']=$this->encrypt_decrypt('encrypt',$row['domain_id']);
		$row['marketplace_name']=$rowDomain['marketplace_name'];
		$stmt->close();
        $dbCon->close();
		return $row;
        
        
    }
	
	function userProperty($data)
    {
        $dbCon = AppModel::createConnection();
       
		$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
	 
        $stmt = $dbCon->prepare("select * from user_address where user_id = (select user_id from user_professional_service_request where id=?)");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i", $request_id);
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
	function userSignupRequestProperty($data)
    {
        $dbCon = AppModel::createConnection();
       
		$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
        $stmt = $dbCon->prepare("select user_property_id from user_professional_service_request where id=?");
        /* bind parameters for markers */
		$cont=1;
		$stmt->bind_param("i", $request_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		 return $row;
        
        
    }
	
	
	
	
	function isAlreadyUser($data)
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
		function createUser($data)
		{
			$dbCon = AppModel::createConnection();
			
			if(isset($data['came_from']))
			{
				$came_from=$data['came_from'];
			}
			else
			{
				$came_from=8;
			}
			
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
			$stmt = $dbCon->prepare("INSERT INTO user_logins (first_name,last_name,registered_from,get_started_wizard_status,email,  email_verification_code , created_on , modified_on, country_of_residence,verification_status,added_on_place,user_came_from,domain_id) VALUES (?, ?, ?, ?,   ?, ?, now(), now(), ?, ?,?,?,?)");
			$stmt->bind_param("ssiissiiiii", $data['first_name'], $data['last_name'],$st,$st,$data['email'], $data['random_hash'], $data['pcountry'],$rf,$added_on_place,$came_from,$_POST['domain_id']);
			$stmt->execute();
			$data['user_id']=$stmt->insert_id;
			 
			$this->sendVerificationEmail($data);
			}
			else
			{
				$data['user_id']=$row['id'];
			}
			$stmt->close();
			$dbCon->close();
			return $data['user_id'];
			
		}
	
		function sendVerificationEmail($data)
		{
			$to=$data['email'];
			$subject="Verify email";
			$emailContent='<html><head></head><body>


<table border="0" cellpadding="0" cellspacing="0" role="presentation" width="600" align="center" bgcolor="#FEFEFE" style="margin:0px auto;padding:0px;border:0px;border-collapse:collapse;width:600px;background-color:rgb(254,254,254)"><tbody><tr><td align="left" valign="top" style="padding-left:20px;padding-right:20px;text-align:left;vertical-align:top"><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td style="padding-left:20px;padding-right:20px"><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td align="left"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse"><tbody><tr><td valign="middle" style="font-size:20px;line-height:20px;font-weight:bold;vertical-align:middle"><a href="https://www.klarna.com/" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.klarna.com/&amp;source=gmail&amp;ust=1718331626060000&amp;usg=AOvVaw0xNpMpD2EkMp2OUow1XFrC"><img src="https://ci3.googleusercontent.com/meips/ADKq_NaBI_6gkv7v7goJGIhVrzYso7ZttkAsiO-ZvK3-nCFChG7NCY4Gi8guMx1qGgIbsKgUGPl4aEF9DKKVv3_5Z4nmdS9JJ39_gU2rBJMmXrPSLW09ZpIqb0o9wC60wphQhQ=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/klarna-logo.png" alt="Klarna." width="98" height="40" border="0" style="display:block;outline:0px;width:98px;height:40px" class="CToWUd" data-bit="iit"></a></td></tr></tbody></table></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><h1 style="font-family:&quot;Klarna Display&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:36px;line-height:40px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Verify your email address</font></font></h1><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Just one more click! You recently used this email address to create an account with Qloud ID. Verify your email address now to make your account more secure.</font></font></div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse"><tbody><tr><td align="center" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(254,254,254);font-weight:bold;font-size:16px;line-height:18px;text-align:center"><a href="https://www.qloudid.com/user/index.php/LoginAccount/emailLogin" rel="noreferrer" style="text-align:center;text-decoration:none;display:inline-block;font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(254,254,254);font-weight:bold;font-size:16px;line-height:18px;padding:12px 20px;border-radius:21px;background-color:rgb(12,12,12)" target="_blank" data-saferedirecturl="https://www.qloudid.com/user/index.php/LoginAccount/emailLogin"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Verify now</font></font></a></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="1" style="font-size:1px;line-height:1px;height:1px;background-color:rgb(238,238,238)">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">If it wasnt you, click the link below to report unauthorized use of your email address. If you click on the link below, we will take the necessary steps to resolve the issue.</font></font></div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(74,32,186);font-weight:bold;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px;text-decoration:none!important"><a href="#" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(74,32,186);font-weight:bold;font-size:16px;line-height:25px;text-decoration:none!important" target="_blank" data-saferedirecturl="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Click here to report unauthorized use of your email address</font></font></a></div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(85,85,85);font-weight:normal;font-size:14px;line-height:20px;margin-top:0px;margin-bottom:0px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">If you have any questions or want to contact Klarna, you can reach us on </font><a href="tel:+448081893333" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(85,85,85);font-weight:normal;font-size:14px;line-height:20px;text-decoration:underline!important" target="_blank"><font style="vertical-align: inherit;">08–120 120 10</font></a><font style="vertical-align: inherit;"> .</font></font><span>&nbsp;</span><a href="tel:+448081893333" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(85,85,85);font-weight:normal;font-size:14px;line-height:20px;text-decoration:underline!important" target="_blank"><font style="vertical-align: inherit;"></font></a><font style="vertical-align: inherit;"></font></div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(85,85,85);font-weight:normal;font-size:14px;line-height:20px;margin-top:0px;margin-bottom:0px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Read more about Qloud ID </font><a href="#" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(85,85,85);font-weight:normal;font-size:14px;line-height:20px;text-decoration:underline!important" target="_blank" data-saferedirecturl="#"><font style="vertical-align: inherit;">Privacy Policy</font></a><font style="vertical-align: inherit;"> .</font></font><span>&nbsp;</span><a href="#" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(85,85,85);font-weight:normal;font-size:14px;line-height:20px;text-decoration:underline!important" target="_blank" data-saferedirecturl="#"><font style="vertical-align: inherit;"></font></a><font style="vertical-align: inherit;"></font></div></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td style="padding-left:20px;padding-right:20px"><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="1" style="font-size:1px;line-height:1px;height:1px;background-color:rgb(238,238,238)">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse"><tbody><tr><td align="center" width="40" height="40" style="padding-right:5px"><a href="https://www.instagram.com/klarna/" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.instagram.com/klarna/&amp;source=gmail&amp;ust=1718331626060000&amp;usg=AOvVaw0PgduKodQO_905ZiWJM3r0"><img src="https://ci3.googleusercontent.com/meips/ADKq_NbVH5I-tVL_aM-mt5JYLNklwUOCIxdpnGRWqh5oAERsamtp3mBW0EIIPWrivA4cLCKGknedoP3XF-sX6eKn1PRq4G0m5Svq060Ak-6lDpxzEoETv7tPVOyjvP654ogFRsQPhsZDoi7DYTDjerIsZMlXhNTw=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/lollipop/icons/footer/instagram.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40" style="padding-right:5px"><a href="https://www.tiktok.com/@klarna" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.tiktok.com/@klarna&amp;source=gmail&amp;ust=1718331626060000&amp;usg=AOvVaw0faAvusFlJy-thKahVox6l"><img src="https://ci3.googleusercontent.com/meips/ADKq_Nb-5o3UYndP1zOh4Ej9HOQLv9y8p_iqPAEpko-6Ou2V8py_CzvVkf_flYetPmki20CvUnvqz-O5yqRPdjkaYJghmu9R7MmnL6wLW_r2hopYylQjR89DwLCmlRfgWNkrZBMHcHoPjqsYI7QQnVnTR3Uk=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.12/comms-platform/lollipop/icons/footer/tiktok.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40" style="padding-right:5px"><a href="https://www.linkedin.com/company/klarna" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.linkedin.com/company/klarna&amp;source=gmail&amp;ust=1718331626060000&amp;usg=AOvVaw3O5cs32KgT_dTO-XfcQg4C"><img src="https://ci3.googleusercontent.com/meips/ADKq_Narh5WtNTQVK0ecV0Bkk2cxukxXzkc15Xo_bWiZD1L8xWKIslwqr-opbo414kzX8GL0q90xvuLcT2ynanniooJyvnBwHIJI0Fgp82_6IgyDmim0pBamR8tMZE3e8eP5pmKMDtQARu_zQYy7Ds4jMWvLdTY=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/lollipop/icons/footer/linkedin.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40" style="padding-right:5px"><a href="https://twitter.com/Klarna" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://twitter.com/Klarna&amp;source=gmail&amp;ust=1718331626060000&amp;usg=AOvVaw1ceOeMtRUfiddzRMWLXl6s"><img src="https://ci3.googleusercontent.com/meips/ADKq_Na0Bikraixp5WMdKm0lV_f2hcw_zD3RYBpjVKvnPt-TjOxopC06s2v0iBEPCKGBo8eGlM-6gn_gzKQS9IhNaN_LqgRYC9zofUoPzHifG-4EflMD0jWffSZ7o5VEx2rnk2Vjj84ZbtLtbrFojg=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/lollipop/icons/footer/x.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40" style="padding-right:5px"><a href="https://www.facebook.com/Klarna" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.facebook.com/Klarna&amp;source=gmail&amp;ust=1718331626060000&amp;usg=AOvVaw1sTEsnXUTDkyr77nznMSuz"><img src="https://ci3.googleusercontent.com/meips/ADKq_NZeVlLBwVC5BhHnilPrDenr4aSamGC_P59GTJ-fhhZxSpfSXN171N_R5PVhqtFjEfkqzqZ7kFqEesGKu4--hKiY2HY01r2LZqWxIcXIuTMJYcD4_WBbKaNFd7TBvNhPiHWH8nBeRi8Gp1uGH5fnZ4nGxAk=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/lollipop/icons/footer/facebook.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40"><a href="https://www.youtube.com/KlarnaOfficial" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.youtube.com/KlarnaOfficial&amp;source=gmail&amp;ust=1718331626060000&amp;usg=AOvVaw24Ux7knG57KrC7-d2cEYcB"><img src="https://ci3.googleusercontent.com/meips/ADKq_NYofWUS-rn-gKW1ci3kTu7SEf6Dfxz8Cle-sLEcAsBO3jxp4r2ecyarpXCRtjeKpwp6k9Xw4-CAcAjKN8xz656hWnaxJ8V2JHPC5nFrcnDUUHX2rCxUec3i4DrIbk4DGP_3kLbCNzWPFCkt7P5TkU8wkQ=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.12/comms-platform/lollipop/icons/footer/youtube.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse"><tbody><tr><td valign="middle" style="font-size:20px;line-height:20px;font-weight:bold;vertical-align:middle"><a href="https://www.klarna.com/" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.klarna.com/&amp;source=gmail&amp;ust=1718331626060000&amp;usg=AOvVaw0xNpMpD2EkMp2OUow1XFrC"><img src="https://ci3.googleusercontent.com/meips/ADKq_NaBI_6gkv7v7goJGIhVrzYso7ZttkAsiO-ZvK3-nCFChG7NCY4Gi8guMx1qGgIbsKgUGPl4aEF9DKKVv3_5Z4nmdS9JJ39_gU2rBJMmXrPSLW09ZpIqb0o9wC60wphQhQ=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/klarna-logo.png" alt="Klarna." width="98" height="40" border="0" style="display:block;outline:0px;width:98px;height:40px" class="CToWUd" data-bit="iit"></a></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(85,85,85);font-weight:normal;font-size:14px;line-height:20px;margin-top:0px;margin-bottom:0px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Klarna Bank AB (publ) </font></font><br><span style="font-family:inherit!important;font-size:inherit!important;font-weight:inherit!important;line-height:inherit!important;color:inherit!important;text-decoration:none!important"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sveavägen 46 </font></font></span><font style="vertical-align: inherit;"><span style="font-family:inherit!important;font-size:inherit!important;font-weight:inherit!important;line-height:inherit!important;color:inherit!important;text-decoration:none!important"><font style="vertical-align: inherit;">111 </font></span></font><br><span style="font-family:inherit!important;font-size:inherit!important;font-weight:inherit!important;line-height:inherit!important;color:inherit!important;text-decoration:none!important"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">34 Stockholm</font></font></span><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Organization number: </font><span style="font-family:inherit!important;font-size:inherit!important;font-weight:inherit!important;line-height:inherit!important;color:inherit!important;text-decoration:none!important"><font style="vertical-align: inherit;">SE556737-0431</font></span></font><span>&nbsp;</span><span style="font-family:inherit!important;font-size:inherit!important;font-weight:inherit!important;line-height:inherit!important;color:inherit!important;text-decoration:none!important"><font style="vertical-align: inherit;"></font><wbr><font style="vertical-align: inherit;"></font></span></div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><a href="https://www.klarna.com/?utm_medium=email&amp;utm_source=klarna-comms-platform" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(85,85,85);font-weight:normal;font-size:14px;line-height:20px;text-decoration:underline!important" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.klarna.com/?utm_medium%3Demail%26utm_source%3Dklarna-comms-platform&amp;source=gmail&amp;ust=1718331626060000&amp;usg=AOvVaw3rXrqgYDfHnWKFbBML4XVD">klarna.com</a></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td></tr></tbody></table></td></tr></tbody></table></body></html>';

try {
				 sendEmail($subject, $to, $emailContent);
				  
						}

					catch(Exception $e) {
						$to      = 'kowaken.ghirmai@gmail.com';
						sendEmail($subject, $to, $emailContent);
					   
					}
		}
	
	
	
		function createUserProfile($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id from user_profiles where user_logins_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
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
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
	
			
	
		function addCommonProfessionalServiceRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$whom_id=$this->encrypt_decrypt('decrypt',$data['whom_id']);
			$subcatg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$data['user_id']=0;
			$_POST['property_type_detail']=1;
			$_POST['product_information']='';
			$_POST['carried_for']=1;
			$_POST['begin_info']=1;
			$_POST['pcountry']='';
			$_POST['p_number']='';
			$_POST['conatct_preffered_on']=1;
			$stmt = $dbCon->prepare("insert into `user_professional_service_request`(domain_id, whom_you_want_served,`category_id` , `subcategory_id` , `property_type_detail` ,`product_information`, `carried_for` , `begin_info` , `user_id` , `pcountry` , `p_number` , `conatct_preffered_on` , `created_on`) VALUES (?, ?,?,   ?, ?,?, ?, ?, ?,   ?, ?,?, now())");
			$stmt->bind_param("iiiiisiiiisi",$domain_id,$whom_id, $catg_id,$subcatg_id,$_POST['property_type_detail'],$_POST['product_information'],$_POST['carried_for'],$_POST['begin_info'],$data['user_id'],$_POST['pcountry'],$_POST['p_number'],$_POST['conatct_preffered_on']);
			$stmt->execute();
			$id=$stmt->insert_id;
			 
			$data['cid']=$this->encrypt_decrypt('encrypt',$id);
			 
			$stmt->close();
			$dbCon->close();
			return $data['cid'];
			
		}
	
	
		function addProfessionalServiceRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$subcatg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$area_id=$this->encrypt_decrypt('decrypt',$data['area_id']);
			
			$stmt = $dbCon->prepare("select * from vitech_area where id=?");
			$stmt->bind_param("i",$area_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCity = $result->fetch_assoc();
			$data['user_id']=0;
			//$data['user_id']=$this->createUser($_POST);
			 
			$start=strtotime($_POST['start_date']);
			$end=strtotime($_POST['end_date']);
			$stmt = $dbCon->prepare("insert into `user_professional_service_request`(vtech_city,vitech_area,domain_id, `category_id` , `subcategory_id` , `start_date` , `end_date` , `property_type_detail` , `floor_area` , `total_rooms` , `total_bathrooms` , `inclusion_type_detail` , `material_info_detail` , `furniture_info_detail` , `price_info` , `product_information`, `carried_for` , `begin_info` , `user_id` , `pcountry` , `p_number` , `conatct_preffered_on` , `created_on`) VALUES (?,?,?,?, ?, ?, ?,   ?, ?,?, ?, ?, ?,   ?, ?,?, ?, ?, ?,   ?, ?,?, now())");
			$stmt->bind_param("iiiiissidiisiiisiiiisi",$area_id,$area_id,$domain_id, $catg_id,$subcatg_id,$start,$end,$_POST['property_type_detail'], $_POST['floor_area'],$_POST['total_rooms'], $_POST['total_bathrooms'], $_POST['inclusion_type_detail'],$_POST['material_info_detail'],$_POST['furniture_info_detail'],$_POST['price_info'],$_POST['product_information'],$_POST['carried_for'],$_POST['begin_info'],$data['user_id'],$_POST['pcountry'],$_POST['p_number'],$_POST['conatct_preffered_on']);
			$stmt->execute();
			$id=$stmt->insert_id;
			$data['cid']=$this->encrypt_decrypt('encrypt',$id);
			//$this->sendPropertyLink($data);
			
			$stmt->close();
			$dbCon->close();
			return $data['cid'];
			
		}
	
		function addProfessionalServiceHomeCleaningRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$whom_id=$this->encrypt_decrypt('decrypt',$data['whom_id']);
			$subcatg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			
			$area_id=$this->encrypt_decrypt('decrypt',$data['area_id']);
			
			$stmt = $dbCon->prepare("select * from vitech_area where id=?");
			$stmt->bind_param("i",$area_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCity = $result->fetch_assoc();
			
			$data['user_id']=0;
			if($_POST['cleaning_type']==2)
			{
				$_POST['cleaning_type_intensity']=0;
			}
			$stmt = $dbCon->prepare("insert into `user_professional_service_request`(vtech_city,vitech_area,domain_id, `category_id` , `subcategory_id` , `cleaning_type` , `how_often` , `property_type_detail` , `floor_area` ,  `inclusion_type_detail` , `material_info_detail` , `pets_available` , `price_info` , `product_information`, `carried_for` , `begin_info` , `user_id` , `pcountry` , `p_number` , `conatct_preffered_on` , `created_on`,additional_services) VALUES (?,?,?, ?, ?,   ?, ?,?, ?, ?, ?,   ?, ?,?, ?, ?, ?,   ?, ?,?, now(),?)");
			$stmt->bind_param("iiiiiiiidsiiisiiiisis",$rowCity['region_city_id'],$area_id,$domain_id, $catg_id,$subcatg_id,$_POST['cleaning_type'],$_POST['cleaning_type_intensity'],$_POST['property_type_detail'], $_POST['floor_area'], $_POST['inclusion_type_detail'],$_POST['material_info_detail'],$_POST['furniture_info_detail'],$_POST['price_info'],$_POST['product_information'],$_POST['carried_for'],$_POST['begin_info'],$data['user_id'],$_POST['pcountry'],$_POST['p_number'],$_POST['conatct_preffered_on'],$_POST['additional_service_type_detail']);
			$stmt->execute();
			$id=$stmt->insert_id;
			$data['cid']=$this->encrypt_decrypt('encrypt',$id);
			//$this->sendPropertyLink($data);
			$stmt->close();
			$dbCon->close();
			return $data['cid'];
			
		}
		
		
		
		
		function addProfessionalHomeRepairRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$subcatg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$area_id=$this->encrypt_decrypt('decrypt',$data['area_id']);
			
			$stmt = $dbCon->prepare("select * from vitech_area where id=?");
			$stmt->bind_param("i",$area_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCity = $result->fetch_assoc();
			
			$data['user_id']=0;
			
			$stmt = $dbCon->prepare("select id from professional_service_subcategory where landloard_ticket_subtitle_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['property_type_detail']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("insert into `user_professional_service_request`(vtech_city,vitech_area,domain_id, inclusion_type_detail,`category_id` , `subcategory_id` ,  `price_info` , `product_information`, `carried_for` , `begin_info` , `user_id` , `pcountry` , `p_number` , `conatct_preffered_on` , `created_on`,landloard_ticket_id,problem_subpart_id) VALUES (?,?,?, ?, ?, ?,   ?, ?,?, ?, ?, ?,   ?, ?, now(),?,?)");
			$stmt->bind_param("iiisiiisiiiissii",$rowCity['region_city_id'],$area_id,$domain_id,$_POST['inclusion_type_detail'], $catg_id,$row['id'],$_POST['price_info'],$_POST['product_information'],$_POST['carried_for'],$_POST['begin_info'],$data['user_id'],$_POST['pcountry'],$_POST['p_number'],$_POST['conatct_preffered_on'],$_POST['property_type_detail'],$_POST['problem_subpart_id']);
			$stmt->execute();
			$id=$stmt->insert_id;
			$data['cid']=$this->encrypt_decrypt('encrypt',$id);
			//$this->sendPropertyLink($data);
			$stmt->close();
			$dbCon->close();
			return $data['cid'];
			
		}
	
	
		function addProfessionalServiceWindowCleaningRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$whom_id=$this->encrypt_decrypt('decrypt',$data['whom_id']);
			$subcatg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$area_id=$this->encrypt_decrypt('decrypt',$data['area_id']);
			
			$stmt = $dbCon->prepare("select * from vitech_area where id=?");
			$stmt->bind_param("i",$area_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCity = $result->fetch_assoc();
			
			$data['user_id']=0;
			$stmt = $dbCon->prepare("insert into `user_professional_service_request`(vtech_city,vitech_area,domain_id, `category_id` , `subcategory_id` , `type_of_window` , `total_window` , `property_type_detail` , `pages_info_detail` , `frame_info_detail` , `exposure_info_detail` , `reachable_info_detail`, `price_info` , `product_information`, `carried_for` , `begin_info` , `user_id` , `pcountry` , `p_number` , `conatct_preffered_on` , `created_on`) VALUES (?,?,?,?, ?, ?, ?,   ?, ?,?, ?, ?, ?,   ?, ?,?, ?, ?, ?,   ?, now())");
			$stmt->bind_param("iiiiiiiiiiiiisiiiisi",$rowCity['region_city_id'],$area_id,$domain_id, $catg_id,$subcatg_id,$_POST['furniture_info_detail'],$_POST['total_window'],$_POST['property_type_detail'], $_POST['pages_info_detail'],$_POST['material_info_detail'], $_POST['exposure_info_detail'], $_POST['reachable_info_detail'],$_POST['price_info'],$_POST['product_information'],$_POST['carried_for'],$_POST['begin_info'],$data['user_id'],$_POST['pcountry'],$_POST['p_number'],$_POST['conatct_preffered_on']);
			$stmt->execute();
			$id=$stmt->insert_id;
			$data['cid']=$this->encrypt_decrypt('encrypt',$id);
			
			 
			$stmt->close();
			$dbCon->close();
			return $data['cid'];
			
		}
	
	 
		function addProfessionalServiceConstrutionCleaningRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$whom_id=$this->encrypt_decrypt('decrypt',$data['whom_id']);
			$subcatg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$data['user_id']=0;
			if($_POST['cleaning_type']==2)
			{
				$_POST['cleaning_type_intensity']=0;
			}
			$stmt = $dbCon->prepare("insert into `user_professional_service_request`(whom_you_want_served, `category_id` , `subcategory_id` ,`property_type_detail` , `floor_area` ,  `inclusion_type_detail` , `material_info_detail` , `garbage_removal_required` , `price_info` , `product_information`, `carried_for` , `begin_info` , `user_id` , `pcountry` , `p_number` , `conatct_preffered_on` , `created_on`,total_properties) VALUES (?, ?, ?,   ?, ?,?, ?, ?, ?,   ?, ?,?, ?, ?, ?,   ?, ?,?, now(),?)");
			$stmt->bind_param("iiiidsiiisiiiisii",$whom_id, $catg_id,$subcatg_id,$_POST['property_type_detail'], $_POST['floor_area'], $_POST['inclusion_type_detail'],$_POST['material_info_detail'],$_POST['furniture_info_detail'],$_POST['price_info'],$_POST['product_information'],$_POST['carried_for'],$_POST['begin_info'],$data['user_id'],$_POST['pcountry'],$_POST['p_number'],$_POST['conatct_preffered_on'],$_POST['total_properties']);
			$stmt->execute();
			$id=$stmt->insert_id;
			$data['cid']=$this->encrypt_decrypt('encrypt',$id);
			//$this->sendPropertyLink($data);
			$stmt->close();
			$dbCon->close();
			return $data['cid'];
			
		}
	
	
	
		function sendPropertyLink($data)
		{
		$subject='Job posted successfully';
		$to      = $data['email'];
		$emailContent='<html xmlns="http://www.w3.org/1999/xhtml" style="background-color: rgb(240, 240, 240);"><head>
  <title>Reservation confirmed</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <style type="text/css">
    /* GT AMERICA */

    @font-face {
      font-display: fallback;
      font-family: "GT America Regular";
      font-weight: 400;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.ttf") format("truetype");
    }

    @font-face {
      font-display: fallback;
      font-family: "GT America Medium";
      font-weight: 600;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.ttf") format("truetype");
    }

    @font-face {
      font-display: fallback;
      font-family: "GT America Condensed Bold";
      font-weight: 700;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.ttf") format("truetype");
    }

    /* CLIENT-SPECIFIC RESET */

    body,
    table,
    td,
    a {
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }

    /* Prevent WebKit and Windows mobile changing default text sizes */

    table,
    td {
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }

    /* Remove spacing between tables in Outlook 2007 and up */

    img {
      -ms-interpolation-mode: bicubic;
    }

    /* Allow smoother rendering of resized image in Internet Explorer */

    .im {
      color: inherit !important;
    }

    /* DEVICE-SPECIFIC RESET */

    a[x-apple-data-detectors] {
      color: inherit !important;
      text-decoration: none !important;
      font-size: inherit !important;
      font-family: inherit !important;
      font-weight: inherit !important;
      line-height: inherit !important;
    }

    /* iOS BLUE LINKS */

    /* RESET */

    img {
      border: 0;
      height: auto;
      line-height: 100%;
      outline: none;
      text-decoration: none;
      display: block;
    }

    table {
      border-collapse: collapse;
    }

    table td {
      border-collapse: collapse;
      display: table-cell;
    }

    body {
      height: 100% !important;
      margin: 0 !important;
      padding: 0 !important;
      width: 100% !important;
    }

    /* BG COLORS */

    .mainTable {
      background-color: #F0F0F0;
    }

    .mainTable--hospitality {
      background-color: #f7f2ed;
    }

    html {
      background-color: #F0F0F0;
    }

    /* VARIABLES */

    .bg-white {
      background-color: white;
    }

    .hr {
      /* Cross-client horizontal rule. Adapted from https://litmus.com/community/discussions/4633-is-there-a-reliable-1px-horizontal-rule-method */
      background-color: #d3d3d8;
      border-collapse: collapse;
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
      mso-line-height-rule: exactly;
      line-height: 1px;
    }

    .textAlignLeft {
      text-align: left !important;
    }

    .textAlignRight {
      text-align: right !important;
    }

    .textAlignCenter {
      text-align: center !important;
    }

    .mt1 {
      margin-top: 6px;
    }

    .list {
      padding-left: 18px;
      margin: 0;
    }

    /* TYPOGRAPHY */

    body {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      color: #4f4f65;
      -webkit-font-smoothing: antialiased;
      -ms-text-size-adjust: 100%;
      -moz-osx-font-smoothing: grayscale;
      font-smoothing: always;
      text-rendering: optimizeLegibility;
    }

    .h1 {
      font-family: "GT America Condensed Bold", "Roboto Condensed", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 700;
      vertical-align: middle;
      font-size: 36px;
      line-height: 42px;
    }

    .h2 {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 600;
      vertical-align: middle;
      font-size: 16px;
      line-height: 24px;
    }

    .text {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 16px;
      line-height: 21px;
    }

    .text-list {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 16px;
      line-height: 25px;
    }

    .textSmall {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 14px;
    }

    .text-xsmall {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-size: 11px;
      text-transform: uppercase;
      line-height: 22px;
      letter-spacing: 1px;
    }

    .text-bold {
      font-weight: 600;
    }

    .text-link {
      text-decoration: underline;
    }

    .text-linkNoUnderline {
      text-decoration: none;
    }

    .text-strike {
      text-decoration: line-through;
    }

    /* FONT COLORS */

    .textColorDark {
      color: #23233e;
    }

    .textColorNormal {
      color: #4f4f65;
    }

    .textColorBlue {
      color: #2020c0;
    }

    .textColorGrayDark {
      color: #7B7B8B;
    }

    .textColorGray {
      color: #A5A8AD;
    }

    .textColorWhite {
      color: #FFFFFF;
    }

    .textColorRed {
      color: #df3232;
    }

    /* BUTTON */

    .Button-primary-wrapper {
      border-radius: 3px;
      background-color: #2020C0;
    }

    .Button-primary {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      border-radius: 3px;
      border: 1px solid #2020C0;
      color: #ffffff;
      display: block;
      font-size: 16px;
      font-weight: 600;
      padding: 18px;
      text-decoration: none;
    }

    .Button-secondary-wrapper {
      border-radius: 3px;
      background-color: #ffffff;
    }

    .Button-secondary {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      border-radius: 3px;
      border: 1px solid #2020C0;
      color: #2020C0;
      display: block;
      font-size: 16px;
      font-weight: 600;
      padding: 18px;
      text-decoration: none;
    }

    /* LAYOUT */

    .Content-container {
      padding-left: 60px;
      padding-right: 60px;
    }

    .Content-container--main {
      padding-top: 54px;
      padding-bottom: 60px;
    }

    .Content {
      width: 580px;
      margin: 0 auto;
    }

    .wrapper {
      max-width: 600px;
    }

    .section {
      padding: 24px 0px;
      border-bottom: 1px solid #d3d3d8;
    }

    .section--noBorder {
      padding: 24px 0px 0;
    }

    .section--last {
      padding: 24px 0px;
    }

    .message {
      background-color: #F4F4F5;
      padding: 18px;
    }

    .card {
      border: 1px solid #d3d3d8;
      padding: 18px;
    }

    /* HEADER */

    .header-tockLogoImage {
      display: block;
      color: #F0F0F0;
    }

    .header-heroImage {
      padding-bottom: 24px;
    }

    /* PREHEADER */

    .preheader {
      display: none;
      font-size: 1px;
      color: #FFFFFF;
      line-height: 1px;
      max-height: 0px;
      max-width: 0px;
      opacity: 0;
      overflow: hidden;
    }

    /* BANNER */

    .notice {
      padding: 12px;
      background: #23233E;
      color: #FFFFFF;
      display: block;
      font-size: 14px;
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 600;
    }

    /* INTRO */

    .section--intro {
      padding-bottom: 48px;
    }

    /* BOOKING INFO */

    .business-logo__container {
      width: 48px;
      height: 48px;
      border-radius: 3px;
      border: 1px solid #d3d3d8;
      overflow: hidden;
    }

    .business-logo__image {
      border: 1px solid transparent;
      border-radius: 3px;
      width: 48px;
      height: 48px;
      display: block;
    }

    .business-address--address {
      width: 50%;
    }

    .business-address--map {
      width: 50%;
    }

    .business-address--map-image {
      width: 100%;
    }

    /* MOBILE TICKETS */

    .mobile-ticket--description {
      width: 65%;
      margin-top: 12px;
      margin-right: 5%;
    }

    .mobile-ticket--code {
      width: 30%;
    }

    .mobile-ticket--code-image {
      width: 100%;
    }

    /* RESERVATION ACTIONS */

    .linksTable {
      border-bottom: 1px solid #d3d3d8;
    }

    .linksTableRow {
      padding: 24px 12px;
    }

    .actions-icon {
      vertical-align: middle;
    }

    .actions-text {
      vertical-align: middle;
    }

    /* RECEIPT */

    .receipt__container {
      border: 1px solid #d3d3d8;
      padding: 24px;
    }

    .receipt__row {
      border-top: 1px solid #d3d3d8;
    }

    /* FEEDBACK ICONS */

    .feedback-link {
      border: 1px solid #d4d5da;
      border-radius: 3px;
      display: inline-block;
      width: calc(32% - 2px);
      padding: 10px 0;
    }

    .feedback-link-bumper {
      display: inline-block;
      width: 1%;
    }

    .feedback-link img {
      height: 50px;
      width: 50px;
    }

    /* SOCIAL ICONS */

    .social-link {
      display: inline-block;
      width: auto;
    }

    .social-link-text {
      padding: 14px 24px 14px 14px;
    }

    /* TABLET STYLES */

    @media screen and (max-width: 648px) {
      /* DEVICE-SPECIFIC RESET */
      div[style*="margin: 16px 0;"] {
        margin: 0 !important;
      }
      /* ANDROID CENTER FIX */
      /* LAYOUT */
      .wrapper {
        width: 100% !important;
        max-width: 100% !important;
      }
      .Content {
        width: 90% !important;
      }
      .Content-container {
        padding-left: 36px !important;
        padding-right: 36px !important;
      }
      .Content-container--main {
        padding-top: 30px !important;
        padding-bottom: 42px !important;
      }
      .responsiveTable {
        width: 100% !important;
      }
      /* RESERVATION ACTIONS */
      .linksTableRow {
        padding-left: 0 !important;
        padding-right: 0 !important;
        padding-top: 12px !important;
        padding-bottom: 12px !important;
      }
      .linksTableRow--borderRight {
        border-right: none !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
      }
      /* FEEDBACK LINK */
      .feedback-link img {
        height: 38px !important;
        width: 38px !important;
      }
    }

    /* MOBILE STYLES */

    @media screen and (max-width: 480px) {
      /* TYPOGRAPHY */
      .h1 {
        font-size: 30px !important;
        line-height: 30px !important;
      }
      .text {
        font-size: 16px !important;
        line-height: 22px !important;
      }
      /* BUTTON */
      .mobile-buttonContainer {
        width: 100% !important;
      }
      /* LAYOUT */
      .Content {
        width: 100% !important;
      }
      .Content-container {
        padding-left: 18px !important;
        padding-right: 18px !important;
      }
      .Content-container--main {
        padding-top: 24px !important;
        padding-bottom: 30px !important;
      }
      .section {
        padding: 18px 0 !important;
      }
      .section--last {
        padding: 18px 0 !important;
      }
      .header {
        padding: 0 18px !important;
      }
      .business-address--address {
        width: 100% !important;
      }
      .business-address--map {
        margin-top: 30px !important;
        width: 100% !important;
      }
      .mobile-ticket--description {
        width: 100% !important;
        margin-top: 0px !important;
      }
      .mobile-ticket--code {
        margin-top: 30px !important;
        margin-left: 0;
        width: 100% !important;
      }
      /* RECEIPT */
      .receipt__container {
        padding: 12px !important;
      }
      /* SOCIAL ICONS */
      .social-link {
        display: block !important;
        width: 100% !important;
        border-bottom: 1px solid #d3d3d8 !important;
      }
      /* INTRO */
      .section--intro {
        padding-top: 18px !important;
        padding-bottom: 18px !important;
      }
    }
  </style>
</head>

<body style="margin: 0 !important; padding: 0 !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; height: 100%; margin: 0; padding: 0; width: 100%; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; color: rgb(79, 79, 101); -webkit-font-smoothing: antialiased; -ms-text-size-adjust: 100%; -moz-osx-font-smoothing: grayscale; font-smoothing: always; text-rendering: optimizeLegibility;">
   
  <!--[if mso]>
    <style type="text/css">
.h1 {font-family: "Helvetica", "Arial", sans-serif !important; font-weight: 700 !important; vertical-align: middle !important; font-size: 36px !important; mso-line-height-rule: exactly;line-height: 42px !important;}
.h2 {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 600 !important;vertical-align: middle !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 24px !important;}
.text {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 21px !important;}
.text-list {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 25px !important;}
.textSmall {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 14px !important;}
.text-xsmall {font-family: "Helvetica", "Arial", sans-serif !important;font-size: 11px !important;text-transform: uppercase !important;mso-line-height-rule: exactly;line-height: 22px !important;letter-spacing: 1px !important;}
.text-bold {font-weight: 600 !important;}
.text-link {text-decoration: underline !important;}
.text-linkNoUnderline {text-decoration: none !important;}
.text-strike {text-decoration: line-through !important;}
.textColorDark {color: #23233e !important;}
.textColorNormal {color: #4f4f65 !important;}
.textColorBlue {color: #2020c0 !important;}
.textColorGray {color: #A5A8AD !important;}
.textColorWhite {color: #FFFFFF !important;}
.Button-primary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #ffffff !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
.Button-secondary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #2020C0 !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
    </style>
    <![endif]-->
  <!-- HIDDEN PREHEADER TEXT -->
  <div class="preheader" style="display: none; font-size: 1px; color: rgb(255, 255, 255); line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
  </div>
  <table border="0" cellpadding="0" cellspacing="0" width="100%" class=" mainTable  " style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: rgb(240, 240, 240);">
    <tbody>
<tr>
<td style="display:none !important;
 visibility:hidden;
 mso-hide:all;
 font-size:1px;
 color:#ffffff;
 line-height:1px;
 max-height:0px;
 max-width:0px;
 opacity:0;
 overflow:hidden; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> We are thrilled that you will be joining us. If yo... </td>
    <!-- HEADER -->
    </tr>
<tr>
      <td align="center" class="header" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
        <!--[if (gte mso 9)|(IE)]>
    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
    <tr>
    <td align="center" valign="top" width="600">
    <![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 580px; margin: 0 auto;">
          <tbody>
<tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <h1 style="font-size: 33px;font-weight: 800;line-height: 30px;">Qloud ID</h1>               </td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
        </tbody>
</table>
        <!--[if (gte mso 9)|(IE)]>
    </td>
    </tr>
    </table>
    <![endif]-->
      </td>
    </tr>
    <!-- CONTENT -->
    <tr>
      <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
        <!--[if (gte mso 9)|(IE)]>
    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
    <tr>
    <td align="center" valign="top" width="600">
    <![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content bg-white" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: white; width: 580px; margin: 0 auto;">
          <tbody>
<tr>
            <td class="Content-container Content-container--main text textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101); padding-left: 60px; padding-right: 60px; padding-top: 54px; padding-bottom: 60px;">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                <!-- RESTAURANT INFO -->
                <tbody>
<tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>

                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
                <!-- INTRO -->
                <tr>
                  <td valign="top" align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
<tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">Signup Completed</span>                          </td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                          <!--[if gte mso 15]>&nbsp;<![endif]-->
                        </td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
                <!-- MESSAGE -->
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="message" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
                    <div class="text textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                      <span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">A message from Qloud ID</span>
                      <br> We are thrilled that you will be joining us. If you would like to hear from you, please do not hesitate to reach out. Restore your account and start using Qloud ID
                    </div>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                    <!--[if gte mso 15]>&nbsp;<![endif]-->
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- BOOKING INFO -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>

                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody>
<tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="https://www.qloudid.com/public/index.php/UserCompanySignUp/listUserProperties/'.$data['cid'].'" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;">Select property</a>                                </td>
                            </tr>
                          </tbody>
</table>
                        </td>
                      </tr>
					  
					  <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
					  
					  
					  
                    </tbody>
</table>
                  </td>
                </tr>
                <!-- ADDRESS -->
                <tr>
                  <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>

                      
                      
                      
                      
                      <tr>
                        <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          
                        </td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                    <!--[if gte mso 15]>&nbsp;<![endif]-->
                  </td>
                </tr>
                
                
                <!-- RECEIPT -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" width="100%" cellpadding="0" cellspacing="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      
</table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- EDIT RECEIPT -->
                <!-- CANCELLATION POLICY -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
<tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; font-weight: 600; color: rgb(35, 35, 62);">Add pricing</div>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                            <span>You are almost there. To get service completed please provide the property information by clicking the button above.</span>
                            <span></span>
                          </div>
                        </td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- QUESTIONS -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
<tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; font-weight: 600; color: rgb(35, 35, 62);">
                            Questions?
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                            If you have questions about your reservation, contact us at&nbsp;
                            <a></a>                            or by calling
                            <a>+46 762072193</a>.
                          </div>
                        </td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
              </tbody>
</table>
            </td>
          </tr>
        </tbody>
</table>
      </td>
    </tr>
    <!-- FOOTER -->
    <tr>
      <td align="center" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; width: 580px; margin: 0 auto;">
        <!-- Will most likely required a feature flag -->
        <!--[if (gte mso 9)|(IE)]>
<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
<tr>
<td align="center" valign="top" width="600">
<![endif]-->
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="Content-container" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
          <tbody>
<tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <a href="https://www.exploretock.com" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;"> <img src="https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png" width="30" height="30" alt="Tock" border="0" style="-ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; display: block;"> </a>              </td>
          </tr>
          <tr class="spacer">
            <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
              <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                © 2019 Tock, Inc.
              </div>
              <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                All Rights Reserved
              </div>
            </td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
        </tbody>
</table>
        <!--[if (gte mso 9)|(IE)]>
</td>
</tr>
</table>
<![endif]-->
      </td>
    </tr>
  </tbody>
</table>
</body></html>';
 

			try {
				 sendEmail($subject, $to, $emailContent);
				  
						}

					catch(Exception $e) {
						$to      = 'kowaken.ghirmai@gmail.com';
						sendEmail($subject, $to, $emailContent);
					   
					}
	}

	
	
		function propertyType()
		{ 
		
			$dbCon = AppModel::createConnection();
			  
			$stmt = $dbCon->prepare("select * from apartment_property_type");
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
		
		function languageList()
		{ 
		
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from language_list");
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
		function cleaningExtraInclusion($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$subcatg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);  
			$stmt = $dbCon->prepare("select * from cleaning_extra_inclusion where inclusion_type=?");
			$stmt->bind_param("i", $subcatg_id);
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
		function addPriceDetail($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$categ_id=  $this -> encrypt_decrypt('decrypt',$data['catg_id']); 
			$subcateg_id=  $this -> encrypt_decrypt('decrypt',$data['subcatg_id']);
			$domain_id=  $this -> encrypt_decrypt('decrypt',$data['domain_id']);
			$img_name1='new0.86596200 1682575324';
			if($_POST['subscription_info']==1)	
			{
			$recurring_type=0;
			$total_time=0;
			$recurring_typec=0;
			}
			else
			{
			$recurring_type=$_POST['recurring_type'];
			$total_time=$_POST['total_time'];
			$recurring_typec=$_POST['recurring_typec'];	
			}
			
			 
			if($_POST['one_shared']==2)
			{
			if($_POST['one_shared_type']==2)
			{
			$_POST['dish_price']=$_POST['private_price'];
			}	
			else
			{
			$_POST['dish_price']=$_POST['open_price_per_person'];	
			}
			}
			
			$stmt = $dbCon->prepare("select professional_company_selected_service_todos.id,is_selected,subcategory_name from professional_company_selected_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_company_selected_service_todos.professional_subcategory_id where professional_company_selected_service_todos.professional_subcategory_id=? and professional_company_selected_service_todos.company_id=? ");
			$stmt->bind_param("ii", $subcateg_id,$company_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			$row1 = $result1->fetch_assoc();
			
			 
			$dish_detail=htmlentities(strip_tags($_POST['product_information']),ENT_NOQUOTES, 'ISO-8859-1');
			$product_information=htmlentities($_POST['product_information'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into professional_company_selected_service_todos_price_info(domain_id,tax_included,tax_amount,bookable_service_category_id, is_bookable,preparation_time,post_production_time,dish_name, dish_detail, dish_image, dish_price,  dish_type, dish_warnings, created_on, modified_on,company_id,variation_type,variation_count,product_information,is_physical,subscription_info,recurring_type,recurring_cycle,custom_cycle,custom_time,time_required, one_shared ,   one_shared_type ,  open_price_per_person ,  open_total_person  ,  total_open_events  ,  private_price ,  private_max_person ,  event_at_customer_place  ,  tour_fee_applicable  ,  tour_fee ,  total_private_events  ,  more_event_on_request ,  minimum_people_required  ,  minimum_time_required  ,  minimum_time_period  ,  more_event_extra_fee  ,  extra_fee,professional_category_id,professional_subcategory_id)
			values(?,?,?,?, ?, ?,?,?, ?, ?, ?, ?, ?, now(),now(),?,?, ?, ?, ?,?,?, ?, ?, ?, ? ,?, ?, ?, ?, ? ,?, ?, ?, ?, ? ,?, ?, ?, ?, ?, ?, ?,?,?)");
			$stmt->bind_param("iiiiiiisssiisiiisiiiiiiiiiiiiiiiiiiiiiiiiii",$domain_id,$_POST['tax_included'],$_POST['tax_amount'],$_POST['bookable_service_category_id'],$_POST['is_bookable'],$_POST['preparation_time'],$_POST['post_production_time'],$row1['subcategory_name'],$dish_detail ,$img_name1 ,$_POST['dish_price'], $_POST['dish_type'],$_POST['food_type'],$company_id,$_POST['variation_type'],$_POST['variation_count'],$product_information,$_POST['product_type'],$_POST['subscription_info'],$recurring_type,$recurring_type,$recurring_typec,$total_time,$_POST['time_required'],$_POST['one_shared'] ,   $_POST['one_shared_type'] ,  $_POST['open_price_per_person'] ,  $_POST['open_total_person']  ,  $_POST['total_open_events']  ,  $_POST['private_price'] ,  $_POST['private_max_person'] ,  $_POST['event_at_customer_place']  ,  $_POST['tour_fee_applicable']  ,  $_POST['tour_fee'] ,  $_POST['total_private_events']  ,  $_POST['more_event_on_request'] ,  $_POST['minimum_people_required']  ,  $_POST['minimum_time_required']  ,  $_POST['minimum_time_period']  ,  $_POST['more_event_extra_fee']  ,  $_POST['extra_fee'],$categ_id,$subcateg_id );
			
			
			if($stmt->execute())
			{
				
				$id=$stmt->insert_id;
				$a=explode(',',$_POST['inclusion_type_detail']);
				for($up=1;$up<=3;$up++)
				{
					$stmt = $dbCon->prepare("insert into `qloudid`.`professional_company_selected_service_todos_price_available`(price_id,`service_available`) values (?,?)");
					$stmt->bind_param("ii",$id, $up);
					$stmt->execute();
				}
				foreach($a as $key)
				{
				$stmt = $dbCon->prepare("update`qloudid`.`professional_company_selected_service_todos_price_available` set is_active=1 where price_id=? and `service_available`=?");
				$stmt->bind_param("ii",$id, $key);
				$stmt->execute();	
				}
				if($_POST['one_shared']==2)
				{
					if($_POST['one_shared_type']!=2)
					{
					if($_POST['recurring_event']==0)
					{
						$event_date=strtotime($_POST['open_event_date']);
						$stmt = $dbCon->prepare("update professional_company_selected_service_todos_price_info set recurring_event=?,open_event_date=?,open_event_time=? where id=?");
						$stmt->bind_param("isii",$_POST['recurring_event'],$event_date,$_POST['event_start_time'],$id );	
						$stmt->execute();	
					}
					else
					{
						for($i=1;$i<=7;$i++)
						{
						$working_day='working_day_'.$i;
						$work_start_time='work_start_time_'.$i;
						$stmt = $dbCon->prepare("update professional_company_selected_service_todos_price_info set recurring_event=? where id=?");
						$stmt->bind_param("ii",$_POST['recurring_event'],$id );	
						$stmt->execute();	
						$stmt = $dbCon->prepare("insert into professional_company_selected_service_todos_recurring_info(day_id,service_price_id,event_day,event_start_time) values(?, ?, ?,?)");
						/* bind parameters for markers */
						$cont=1;
						$stmt->bind_param("iiii",$i,$id,$_POST[$working_day],$_POST[$work_start_time]);
						$stmt->execute();	
						
							
						}
					}
					}
				}
				
				$pickID=$id;
				$picka=1;
			$stmt = $dbCon->prepare("insert into dishes_detail_information(professional_category_id,professional_subcategory_id,inclusion_detail,tax_included,tax_amount,bookable_service_category_id, is_bookable,preparation_time,post_production_time,dish_name, dish_detail, dish_image, dish_price,  dish_type, dish_warnings, created_on, modified_on,company_id,variation_type,variation_count,product_information,is_physical,subscription_info,recurring_type,recurring_cycle,custom_cycle,custom_time,time_required, one_shared ,   one_shared_type ,  open_price_per_person ,  open_total_person  ,  total_open_events  ,  private_price ,  private_max_person ,  event_at_customer_place  ,  tour_fee_applicable  ,  tour_fee ,  total_private_events  ,  more_event_on_request ,  minimum_people_required  ,  minimum_time_required  ,  minimum_time_period  ,  more_event_extra_fee  ,  extra_fee,pickapro_listing )
			values(?,?,?,?,?,?, ?, ?,?,?, ?, ?, ?, ?, ?, now(),now(),?,?, ?, ?, ?,?,?, ?, ?, ?, ? ,?, ?, ?, ?, ? ,?, ?, ?, ?, ? ,?, ?, ?, ?, ?, ?, ?,?)");
			$stmt->bind_param("iisiiiiiisssiisiiisiiiiiiiiiiiiiiiiiiiiiiiii",$categ_id,$subcateg_id ,$_POST['inclusion_type_detail'],$_POST['tax_included'],$_POST['tax_amount'],$_POST['bookable_service_category_id'],$_POST['is_bookable'],$_POST['preparation_time'],$_POST['post_production_time'],$row1['subcategory_name'],$dish_detail ,$img_name1 ,$_POST['dish_price'], $_POST['dish_type'],$_POST['food_type'],$company_id,$_POST['variation_type'],$_POST['variation_count'],$product_information,$_POST['product_type'],$_POST['subscription_info'],$recurring_type,$recurring_type,$recurring_typec,$total_time,$_POST['time_required'],$_POST['one_shared'] ,   $_POST['one_shared_type'] ,  $_POST['open_price_per_person'] ,  $_POST['open_total_person']  ,  $_POST['total_open_events']  ,  $_POST['private_price'] ,  $_POST['private_max_person'] ,  $_POST['event_at_customer_place']  ,  $_POST['tour_fee_applicable']  ,  $_POST['tour_fee'] ,  $_POST['total_private_events']  ,  $_POST['more_event_on_request'] ,  $_POST['minimum_people_required']  ,  $_POST['minimum_time_required']  ,  $_POST['minimum_time_period']  ,  $_POST['more_event_extra_fee']  ,  $_POST['extra_fee'],$picka );
			
			
			if($stmt->execute())
			{
				
				$id=$stmt->insert_id;
				
				$stmt = $dbCon->prepare("update professional_company_selected_service_todos_price_info set qloud_service_id=? where id=?");
				$stmt->bind_param("ii",$id,$pickID);	
				$stmt->execute();	
				
				if($_POST['one_shared']==2)
				{
					if($_POST['one_shared_type']!=2)
					{
					if($_POST['recurring_event']==0)
					{
						$event_date=strtotime($_POST['open_event_date']);
						$stmt = $dbCon->prepare("update dishes_detail_information set recurring_event=?,open_event_date=?,open_event_time=? where id=?");
						$stmt->bind_param("isii",$_POST['recurring_event'],$event_date,$_POST['event_start_time'],$id );	
						$stmt->execute();	
					}
					else
					{
						for($i=1;$i<=7;$i++)
						{
						$working_day='working_day_'.$i;
						$work_start_time='work_start_time_'.$i;
						$stmt = $dbCon->prepare("update dishes_detail_information set recurring_event=? where id=?");
						$stmt->bind_param("ii",$_POST['recurring_event'],$id );	
						$stmt->execute();	
						$stmt = $dbCon->prepare("insert into dish_service_recurring_information (day_id,dish_id,event_day,event_start_time) values(?, ?, ?,?)");
						/* bind parameters for markers */
						$cont=1;
						$stmt->bind_param("iiii",$i,$id,$_POST[$working_day],$_POST[$work_start_time]);
						$stmt->execute();	
						
							
						}
					}
					}
				}
			}
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
		
		function professionalSubCategoryDetailForCompany($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			 
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id in(select professional_subcategory_id from professional_marketplace_service_todos where marketplace_id=? and is_selected=1) order by subcategory_name");
			$stmt->bind_param("i",$domain_id );	
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}	
		
		function professionalCategoryDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			 
			$stmt = $dbCon->prepare("select * from professional_service_category where id in(select professional_category_id from professional_marketplace_service_todos where marketplace_id=? and is_selected=1) order by category_completed desc");
			$stmt->bind_param("i",$domain_id );	
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}	
			
			
		
			
		function professionalSubCategoryDetailAreaBased($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$whom_id=$this->encrypt_decrypt('decrypt',$data['whom_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$area_id=$this->encrypt_decrypt('decrypt',$data['area_id']);
			//echo $catg_id.' '.$whom_id.' '.$domain_id.' '.$area_id; die;
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where professional_category_id=? and id in (select subcategory_id from professional_service_subcategory_available  where availablity_type=?) and id in (select professional_subcategory_id from professional_marketplace_service_todos where marketplace_id=? and is_selected=1 and professional_category_id=?) and id in (select professional_subcategory_id from professional_company_selected_service_todos where company_id in(select company_id from professional_company_selected_areas where area_id=? and is_selected=1) and is_selected=1 and professional_category_id=?)");
			$stmt->bind_param("iiiiii", $catg_id,$whom_id,$domain_id,$catg_id,$area_id,$catg_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
			
		function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
			}	
			
		function serviceBidsInfo($data)
		{  
			 
			$dbCon = AppModel::createConnection();
		    $bid_id=$this->encrypt_decrypt('decrypt',$data['bid_id']);
			$stmt = $dbCon->prepare("select user_professional_service_request.domain_id,country_name,bookable_calender, booking_date,work_time,country_code,company_email,user_professional_service_request_company_info.company_id,is_service_bookable,user_professional_service_request.category_id,user_professional_service_request.subcategory_id,company_profiles.address as c_address,company_profiles.city as c_city,category_name,subcategory_name,user_professional_service_request.user_id,user_professional_service_request_company_info.id,company_name,per_hour_fee,project_fee,bid_accepted,company_profiles.phone from user_professional_service_request_company_info left join companies on companies.id=user_professional_service_request_company_info.company_id left join user_professional_service_request on user_professional_service_request.id=user_professional_service_request_company_info.job_id left join professional_service_category on professional_service_category.id=user_professional_service_request.category_id left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join company_profiles on company_profiles.company_id=companies.id left join phone_country_code on phone_country_code.id=companies.country_id left join working_hrs on working_hrs.id=user_professional_service_request_company_info.booking_time where user_professional_service_request_company_info.id=?");
			/* bind parameters for markers */
			$cont=1;
		    $stmt->bind_param("i", $bid_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			 
			$row['uid']=$this->encrypt_decrypt('encrypt',$row['user_id']);
			$row['cid']=$this->encrypt_decrypt('encrypt',$row['company_id']);
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}	
		
		
		function encryptServiceList($data)
		{
			$dbCon = AppModel::createConnection();
			
			$job_id=$this->encrypt_decrypt('encrypt',substr($_POST['service_list'],0,-1));
			return $job_id;
		}
			
		function updateBookingTimeInfo($data)
		{
			$dbCon = AppModel::createConnection();
			
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$qloud_bookable_service_id=$this->encrypt_decrypt('decrypt',$data['service_id']);
			$is_verified=1;
			 
			$stmt = $dbCon->prepare("select * from dishes_detail_information where find_in_set(id,?)");
			$stmt->bind_param("s",$qloud_bookable_service_id);
			 
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("insert into `qloudid`.`user_professional_service_request_company_info`( per_hour_fee,project_fee,is_service_bookable, `job_id`  , `company_id`  , `assigned_on`) values (?,?,?,?,?,now())");
			$stmt->bind_param("iiiii",$row['dish_price'],$row['dish_price'], $is_verified,$job_id,$company_id);
			$stmt->execute();
			
			$bid_id=$stmt->insert_id;
			$data['bid_id']=$this->encrypt_decrypt('encrypt',$bid_id);
			$serviceBidsInfo=$this->serviceBidsInfo($data);
			$stmt = $dbCon->prepare("update `user_professional_service_request_company_info` set  bid_accepted=2 where job_id=?");
			$stmt->bind_param("i", $job_id);
			$stmt->execute();
			
			
			$service_type=6;
			
			$qloud_checkout_id=0;
			
			$stmt = $dbCon->prepare("select * from dishes_detail_information where find_in_set(id,?)");
			$stmt->bind_param("s",$qloud_bookable_service_id);
			 
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into  hotel_roomservice_item_ordered (professional_user_job_id,is_confirmed_employee,booked_employee_id, booking_time, booking_date,qloud_checkout_id,is_verified,service_type,booking_person_id,dish_id,dish_quantity,created_on,is_paid,user_id)values(?,?,?,?,?,?,?,?,?,?,?,now(),?,?)");
			/* bind parameters for markers */
			$stmt->bind_param("iiisiiiiiiiii",$job_id,$_POST['is_confirmed'],$_POST['booking_employee_id'],$_POST['booking_time'],$_POST['booking_date'],$qloud_checkout_id,$is_verified,$service_type,$serviceBidsInfo['user_id'],$row['id'],$is_verified,$is_verified,$serviceBidsInfo['user_id']);
			$stmt->execute();
			$id=$stmt->insert_id;
			
			$stmt = $dbCon->prepare("update `user_professional_service_request_company_info` set  bid_accepted=1,qloud_bookable_service_id=?,booking_employee_id=?, booking_time=?, booking_date=?,hotel_room_service_id=? where id=?");
			$stmt->bind_param("iisiii", $row['id'],$_POST['booking_employee_id'],$_POST['booking_time'],$_POST['booking_date'],$id,$bid_id);
			$stmt->execute();	
			}
			
			
			
			$stmt->close();
			$dbCon->close();
			return $data['bid_id'];
		}	
			
		function getProfessionalServiceCompanies($data)
		{
			$dbCon = AppModel::createConnection();
			$professional_subcategory_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select companies.id,company_name,latitude,longitude,address,profile_pic from companies left join company_profiles on company_profiles.company_id=companies.id where companies.id in(select company_id from dishes_detail_information where is_physical=2 and is_bookable=1 and is_active=1 and professional_subcategory_id=? and id in (select service_id from dish_marketplace_information where marketplace_id=? and is_published=1))");
			$stmt->bind_param("ii",$professional_subcategory_id,$domain_id);
			 
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			
			$stmt = $dbCon->prepare("select selected_subscription from cleaning_company_premium_account_request where company_id=? and domain_id=?");
			$stmt->bind_param("ii",$row['id'],$domain_id);
			$stmt->execute();
			$resultC = $stmt->get_result();
			$rowC = $resultC->fetch_assoc();
			if($rowC['selected_subscription']==0)
			{
				continue;
			}
			else
			{
			$row['selected_subscription']=$rowC['selected_subscription'];
			}
			$stmt = $dbCon->prepare("select count(dishes_detail_information.id) as num from dishes_detail_information left join companies on companies.id=dishes_detail_information.company_id where is_physical=2 and is_bookable=1 and is_active=1 and professional_subcategory_id=? and company_id=?   and dishes_detail_information.id in (select service_id from dish_marketplace_information where marketplace_id=? and is_published=1)");
			$stmt->bind_param("iii",$professional_subcategory_id,$row['id'],$domain_id);
			$stmt->execute();
			$resultC = $stmt->get_result();
			$rowC = $resultC->fetch_assoc();
			if($rowC['num']==0)
				continue;
			 
			$stmt = $dbCon->prepare("select min(dish_price) as price from dishes_detail_information where is_physical=2 and is_bookable=1 and is_active=1 and professional_subcategory_id=? and company_id=?");
			$stmt->bind_param("ii",$professional_subcategory_id,$row['id']);
			$stmt->execute();
			$resultPrice = $stmt->get_result();
			$rowPrice = $resultPrice->fetch_assoc();
			
			  
				
				array_push($org,$row);
				$org[$j]['price']=$rowPrice['price'];
				$org[$j]['image_path']=$image;
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				
				$org[$j]['images']=array();
				$i=0;
				$stmt = $dbCon->prepare("select * from dish_detail_photos where dish_id in (select id from dishes_detail_information where is_physical=2 and is_bookable=1 and is_active=1 and professional_subcategory_id=? and company_id=?) limit 0,4");
				$stmt->bind_param("ii",$professional_subcategory_id,$row['id']);
				$stmt->execute();
				$resultPrice1 = $stmt->get_result();
				while($rowProfile = $resultPrice1->fetch_assoc())
				{
					$row['profile_pic']=$rowProfile['dish_photo_path'];
					if($row['profile_pic']=="" || $row['profile_pic']==null)
					{
						continue;
					}
					else
					{
					$filename="../estorecss/".$row['profile_pic'].".txt"; $value_a=file_get_contents("../estorecss/".$row['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a); $image = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['profile_pic'].'.jpg' );
					$row['profile_pic']=str_replace('../','https://www.qloudid.com/',$image);	
					}
					$org[$j]['images'][$i]['profile_pic']=$row['profile_pic'];
					$i++;
				}
				$key_values = array_column($org, 'selected_subscription'); 
				array_multisort($key_values, SORT_DESC, $org);
				$j++;
			}
		 
			$stmt->close();
			$dbCon->close();  
			return $org;
			
		}
		
		
		function professionalCompanyEmployeeList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email from employees  where company_id=? and user_login_id!=43");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select * from employee_service_booking_rules  where employee_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$resultEmp = $stmt->get_result();
				$rowEmp = $resultEmp->fetch_assoc();
				if(empty($rowEmp))
				{
				$stmt = $dbCon->prepare("insert into employee_service_booking_rules(employee_id,company_id,created_on) values(?,?,now())");
				
				/* bind parameters for markers */
				$stmt->bind_param("ii", $row['id'],$company_id);
				$stmt->execute();	
				}
				$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			}
			 
			
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function selectedServiceInfo($data)
		{
			 
			$dbCon = AppModel::createConnection();
			$services=$this->encrypt_decrypt('decrypt',$data['service_id']);
			$a=explode(',',$services);
			  $item_id=$a[0];
			$stmt = $dbCon->prepare("select company_name,product_information ,time_required,dishes_detail_information.id,dish_name,dish_detail,dish_price,is_bookable,is_active,is_physical,dish_image,one_shared,one_shared_type,recurring_event,open_event_date,open_total_person,open_event_time,work_time,open_price_per_person,private_price from dishes_detail_information left join working_hrs on working_hrs.id=dishes_detail_information.open_event_time left join companies on companies.id=dishes_detail_information.company_id where dishes_detail_information.id=?");
			$stmt->bind_param("i",$item_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowDishes = $result->fetch_assoc();
			if($rowDishes['one_shared']==2 && $rowDishes['one_shared_type']==1 && $rowDishes['recurring_event']==0)
			{
			$stmt = $dbCon->prepare("select sum(dish_quantity) as total_booked from hotel_roomservice_item_ordered where dish_id=? and service_type=5");
			$stmt->bind_param("i",$rowDishes['id']);
			$stmt->execute();
			$result2 = $stmt->get_result();	
			$row2 = $result2->fetch_assoc();
			$rowDishes['open_total_person']=$rowDishes['open_total_person']-$row2['total_booked'];
			}
			
			
			$filename="../estorecss/".$rowDishes ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowDishes ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowDishes ['dish_image'].'.jpg' );  $imgs='../../../../'.$imgs; } else { $value_a="../../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../../html/usercontent/images/default-profile-pic.jpg"; }
			$imgs=str_replace('../../../../../','https://www.qloudid.com/',$imgs);
			$rowDishes['dish_image']=$imgs;
			 
			$stmt->close();
			$dbCon->close();  
			return $rowDishes;
			
		}
		
		function dstrictBookingOpenCalenderInfo($data)
	{
		$dbCon = AppModel::createConnection();
		$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		$items=$this->encrypt_decrypt('decrypt',$data['service_id']); 
		
		$_POST['quantity']=1;
		$query="select time_required,post_production_time,preparation_time,open_total_person from dishes_detail_information where id=".$items;
		$result=(mysqli_query($dbCon,$query));
		$timeRequired=0;
		$row=mysqli_fetch_array($result);
		$timeRequired=$timeRequired+$row['time_required']+$row['post_production_time']+$row['preparation_time'];
		$totalPerson=$row['open_total_person'];
		$org=array();
		$org['date_flag']=$_POST['date_flag'];
		$timeRequired=round($timeRequired/2);
		$flag=$_POST['date_flag']*7;
	$startDate=date('d-m-Y',strtotime(date('d-m-Y') . ' +'.$flag.' day'));

	for($i=0;$i<=6;$i++)
	{		
	$org[$i]['timerequired']=$timeRequired;
	$org[$i]['date']=strtotime($startDate . ' +'.$i.' day');
	$weekDay=date('w', strtotime($startDate . ' +'.$i.' day')); 
	$org[$i]['work_time_info']=array(); 
	 
	$query="select day_id,event_day,id from dish_service_recurring_information left join working_hrs on working_hrs.id=dish_service_recurring_information.event_start_time where day_id=".$weekDay." and dish_id=".$items;
	$result=(mysqli_query($dbCon,$query));
	$row=mysqli_fetch_array($result); 
	  
		if($row['event_day']==0)
		continue; 
	  
	
	
					$stmt = $dbCon->prepare("select sum(dish_quantity) as total_booked from hotel_roomservice_item_ordered where dish_id=? and service_type=5");
					$stmt->bind_param("i",$items);
					$stmt->execute();
					$result2 = $stmt->get_result();	
					$row2 = $result2->fetch_assoc();
					if($row2['total_booked']==$totalPerson)
						continue;
					if(($totalPerson-$row2['total_booked'])<$_POST['quantity'])
						continue;
	 array_push($org[$i]['work_time_info'],$row);
			 
	}
	 
	$dbCon->close();  
	  
	$data['calender']=json_encode($org,true);
	$calender=$this->getOpenCalender($data);
	return $calender;
	}
	function getOpenCalender($data)
		{
			$dbCon = AppModel::createConnection();
			 
			if($data['date_flag']==0)
				{
					$earlier='<div class="absolute left-0 -top-12 z-20"><button class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none !text-green-200 X1LqXa1wBWadrQb2cUbq focus:!ring-0" disabled=""><span class="flex items-center justify-center mr-2 h-5 w-5" style=""><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit; ">Earlier</font></font></button></div>
  
 <div class="absolute right-0 -top-12 z-20"><button onclick="getNewCalender(1);" class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none  X1LqXa1wBWadrQb2cUbq focus:!ring-0"><font style="vertical-align: inherit; "><font style="vertical-align: inherit;  ">Later</font></font><span class="flex items-center justify-center ml-2 h-5 w-5" style=""><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 -rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span></button></div>
  
  ';
				}
				else if($data['date_flag']==3)
				{
					$earlier='<div class="absolute left-0 -top-12 z-20"><button onclick="getNewCalender(2);" class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none  X1LqXa1wBWadrQb2cUbq focus:!ring-0"><span class="flex items-center justify-center mr-2 h-5 w-5" style=""><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit; ">Earlier</font></font></button></div>
  
  
                                            <div class="absolute right-0 -top-12 z-20"><button class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none !text-green-200 X1LqXa1wBWadrQb2cUbq focus:!ring-0" disabled=""><font style="vertical-align: inherit; "><font style="vertical-align: inherit; ">Later</font></font><span class="flex items-center justify-center ml-2 h-5 w-5" style=""><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 -rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span></button></div>';
				}
				else
				{
					$e=$data['date_flag']-1;
					$l=$data['date_flag']+1;
					$earlier='<div class="absolute left-0 -top-12 z-20"><button onclick="getNewCalender('.$e.');" class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none  X1LqXa1wBWadrQb2cUbq focus:!ring-0"><span class="flex items-center justify-center mr-2 h-5 w-5"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Earlier</font></font></button></div>
  
   <div class="absolute right-0 -top-12 z-20"><button onclick="getNewCalender('.$l.');" class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none  X1LqXa1wBWadrQb2cUbq focus:!ring-0"><font style="vertical-align: inherit; "><font style="vertical-align: inherit; ">Later</font></font><span class="flex items-center justify-center ml-2 h-5 w-5"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 -rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span></button></div>
  
                                          ';
				}
			 $flag=$data['date_flag']*7;
			$startDate=date('M d',strtotime(date('d-m-Y') . ' +'.$flag.' day'));
			$flag=($data['date_flag']*7)+6;
			$endDate=date('M d',strtotime(date('d-m-Y') . ' +'.$flag.' day'));
			$calender=json_decode($data['calender'],true); 
			//echo '<pre>'; print_r($calender); echo '</pre>'; die; 
			$header="";		
			$i=0;	
			 	
			$weekDays='';
			 foreach($calender as $key)
			 {
				 
				 if($key==0)
					 continue;
				  
				 if($i==0)
				 {
					 $select="selected";
				 }
				 
				 else
					 {
						$select=""; 
					 }
					 if(count($key['work_time_info'])==0)
					 {
						$header=$header.'<div class="flex-grow basis-0 border-b-[1px] border-l-[1px] border-gray-200  text-center last-of-type:border-r-[1px] colIndex-'.$i.' text-gray-300"><span class="block pt-2 text-center text-sm capitalize text-inherit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.date('D',$key['date']).'</font></font></span><span class="relative mx-auto mb-1 block h-11 text-lg font-semibold !leading-[44px] text-inherit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.date('d',$key['date']).'</font></font></span></div>'; $disable='disabled';
					 }
					 else
					 {
						 $header=$header.'<div class="flex-grow basis-0 border-b-[1px] border-l-[1px] border-gray-200  text-center last-of-type:border-r-[1px] colIndex-'.$i.' txt_777E90"><span class="block pt-2 text-center text-sm capitalize text-inherit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.date('D',$key['date']).'</font></font></span><span class="relative mx-auto mb-1 block h-11 text-lg font-semibold !leading-[44px] text-inherit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.date('d',$key['date']).'</font></font><span class="absolute bottom-[2px] left-1/2 h-[6px] w-[6px] -translate-x-1/2 rounded-full bg-gray-900"></span></span></div>'; 
					 }
					
				 
						$weekDays=$weekDays.'<div class="flex-shrink flex-grow basis-0 border-l-[1px] border-b-[1px] border-gray-100 text-center last-of-type:border-r-[1px]">';
						
						     
									foreach($key['work_time_info'] as $key1)
									 {
										 
											 
										 
									$stmt = $dbCon->prepare("select work_time from working_hrs where id=?");
									/* bind parameters for markers */
									 
									$stmt->bind_param("i",$key1['id']);
									$stmt->execute();
									$result = $stmt->get_result();
									$row = $result->fetch_assoc();	 
									
									 
									$weekDays=$weekDays.'<span class="mx-1 my-[6px] flex h-auto cursor-pointer flex-col rounded-md border-[1px] border-solid text-center text-xs font-semibold !leading-9 md:m-2   border-green text-green hover:bg-green bg-green-100 hover:text-white" onclick="updateEmployeeTime('.$key['date'].','.$key1['id'].',0,'.$key['timerequired'].');"><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$row['work_time'].'</font></font></span></span>
									
									';	 
									 }
								
								$weekDays=$weekDays.'</div>';
								
						 	 
			$i++;
			 }
		
			if(isset($data['w_width']))
			{
			if($data['w_width']>700)
					{
						$width=450;
					}
					else
					{
					$width=	$data['w_width']-50;
					}	
			}	
			else
			{
				$width=450;
			}
		
			 $dataAvailable='<div class="column_m bs_bb  ">
					
					<div style="position: relative;">
                                    <div class="calendar week-view">
									<p class="sticky !top-16 z-[100] m-0 flex flex-col items-center justify-center  p-3 uppercase"><span class="font-semibold txt_777E90"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$startDate.' - '.$endDate.'</font></font></span><span class="text-xs text-gray-700"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Week 45</font></font></span></p>
                                         
                                        <div class="sticky !top-32 z-[100]  shadow" style="height:76px;">
                                            <div class="slick-slider slick-calendar slick-initialized">
                                                <div class="slick-list">
                                                    <div class="slick-track" style="width: '.$width.'px; opacity: 1; transform: translate3d(0px, 0px, 0px);">
                                                        <div data-index="0" class="slick-slide slick-active slick-current" tabindex="-1" aria-hidden="false" style="outline: none; width: '.$width.'px;">
                                                            <div>
                                                                <div class="!flex w-full justify-between" tabindex="-1" style="width: 100%; display: inline-block;">
                                                                     '.$header.'
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            '.$earlier.'
                                        </div>
                                        <div class="hours sticky">
                                            <div class="flex w-full" style="min-height: 300px;">
                                               '.$weekDays.'
                                            </div>
                                        </div>
                                    </div>
                                </div>
					
					
					
				</div>';
				
				 
			$dbCon->close();
			return $dataAvailable;
			
			 
			
		}
	
	function bookingPrivateCalenderInfo($data)
	{
		$dbCon = AppModel::createConnection();
		$employee_id=$this->encrypt_decrypt('decrypt',$data['employee_id']);
		$bookable_service_id=$this->encrypt_decrypt('decrypt',$data['service_id']);
		
		$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		$query="select time_required,post_production_time,preparation_time from dishes_detail_information where id in (".$bookable_service_id.")";
		$result=(mysqli_query($dbCon,$query));
		$timeRequired=0;
		while($row=mysqli_fetch_array($result))
		{
		$timeRequired=$timeRequired+$row['time_required']+$row['post_production_time']+$row['preparation_time'];	
		}
		
		
		$query="select * from company_profiles where company_id=(select company_id from dishes_detail_information where id in ('".$bookable_service_id."'))";
		$result=(mysqli_query($dbCon,$query));
		$rowCompanyProfile=mysqli_fetch_array($result);
		$timeRequired=$timeRequired+$rowCompanyProfile['gap_between_bookings'];	
		 
		
		
		$org=array();
		$timeRequired=round($timeRequired/2);
		$flag=$data['date_flag']*7;
	$startDate=date('d-m-Y',strtotime(date('d-m-Y') . ' +'.$flag.' day'));
 
	for($i=0;$i<=6;$i++)
	{		
	$org[$i]['timerequired']=$timeRequired;
	$org[$i]['date']=strtotime($startDate . ' +'.$i.' day');
	$weekDay=date('w', strtotime($startDate . ' +'.$i.' day')); 
		if($employee_id==0)
		{
		$query="select id,services_available from employees where company_id=".$company_id;	
		}
		else
		{
			$query="select id,services_available from employees where id=".$employee_id;
		}
		$result=(mysqli_query($dbCon,$query));
		$ids='';
		while($row=mysqli_fetch_array($result))
		{
			 
			/*$query2="select working_day from employee_working_hrs where day_id=".$weekDay." and employee_id=".$row['id'];
			$result2=(mysqli_query($dbCon,$query2));
			$row2=mysqli_fetch_array($result2);
			 
			if($row2['working_day']==0)
			{
				continue;
			}
			*/
			$ids=$ids.$row['id'].',';	
			
		}
		$ids=substr($ids,0,-1);
		$emps=explode(',',$ids);
		$org[$i]['work_time_info']=array();
		if($ids=='')
		{
			continue;
		}	
		$workId="0";
		
		foreach($emps as $key1)
		{
			 
		$bookedDate='0';
		$query2="select booking_time,dish_id from hotel_roomservice_item_ordered where booked_employee_id=".$key1." and booking_date='".$org[$i]['date']."'";
		$result2=(mysqli_query($dbCon,$query2));
		while($row2=mysqli_fetch_array($result2))
		{
			
			$query="select time_required,post_production_time,preparation_time from dishes_detail_information where id =".$row2['dish_id'];
			$resultDish=(mysqli_query($dbCon,$query));
			$timeRequired=0;
			while($rowDish=mysqli_fetch_array($resultDish))
			{
			$timeBooked=$timeBooked+$rowDish['time_required']+$rowDish['post_production_time']+$rowDish['preparation_time'];	
			}
			
			$timeBooked=$timeBooked+$rowCompanyProfile['gap_between_bookings'];
			$bookedDate=$bookedDate.",".$row2['booking_time'];
			$tmp='';
			for($timeB=1;$timeB<=$timeBooked;$timeB++)
			{
				$tmp=$tmp.($row2['booking_time']+$timeB).",";
			}
			$bookedDate=$bookedDate.",".$tmp;
		}
 
		   
		$query2="select work_start_time,work_end_time,lunch_start_time,lunch_end_time from employee_working_hrs where day_id=".$weekDay." and employee_id=".$key1;
		$result2=(mysqli_query($dbCon,$query2));
		$row2=mysqli_fetch_array($result2);
		if(empty($row2))
		{
		$row2=array();
		$row2['work_start_time']=15;
		$row2['work_end_time']=38;
		$row2['lunch_start_time']=30;
		$row2['lunch_end_time']=32;
		}
		$row2['lunch_end_time']=$row2['lunch_end_time']-1; 
		 
		
		 
		$query="select id,work_time from working_hrs where (id between ".$rowCompanyProfile['booking_start_time']." and ".$rowCompanyProfile['booking_end_time'].") and (id not between ".$row2['lunch_start_time']." and ".$row2['lunch_end_time'].")  and id not in (select id from working_hrs where id in (".$bookedDate."))";
		$result=(mysqli_query($dbCon,$query));
		$ids='';
		while($row=mysqli_fetch_array($result))
		{
		$workId=$workId.",".$row['id'];
		//$row['emp_id']=$key1;
		//array_push($org[$i]['work_time_info'],$row);
		$ids=$ids.$row['id'].",";
		}
		 
		$dataWork=explode(',',substr($ids,0,-1));
		$avail=1;
		$j=0;
		 
		foreach($dataWork as $key3)
		{
			for($t=0;$t<$timeRequired;$t++)
			{
				$value=(int)$key3+$t;
				if (in_array($value, $dataWork))
				{
				$avail=1;
				}
				else
				{
				$avail=0;
				break;
				}
			}
			
			if($avail==1)
			{
				$query="select id from working_hrs where id=".$key3;
				$result=(mysqli_query($dbCon,$query));
				$row=mysqli_fetch_array($result);
				$row['emp_id']=$key1;
				$reg=1;
			foreach($org[$i]['work_time_info'] as $vals)
			{
				
				if($vals['id']==$row['id'])
				{
					$reg=0;
					break;
				}
			}
			if($row['id']==null || $row['id']=='')
				continue;
			if($reg==1)
			array_push($org[$i]['work_time_info'],$row);
			 //if(!in_array($row,$org[$i]['work_time_info']))
				//array_push($org[$i]['work_time_info'],$row);
			}
		}
		$key2 = array_column($org[$i]['work_time_info'], 'id');

		array_multisort($key2, SORT_ASC, $org[$i]['work_time_info']);
		}
		
	
		
	}
	$dbCon->close();  
	$data['calender']=json_encode($org,true);
	$calender=$this->getCalender($data);
	return $calender;
	}
	
	function getCalender($data)
		{
			$dbCon = AppModel::createConnection();
			if($data['date_flag']==0)
				{
					$earlier='<div class="absolute left-0 -top-12 z-20"><button class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none !text-green-200 X1LqXa1wBWadrQb2cUbq focus:!ring-0" disabled=""><span class="flex items-center justify-center mr-2 h-5 w-5"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Earlier</font></font></button></div>
  
 <div class="absolute right-0 -top-12 z-20"><button onclick="getNewCalender(1);" class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none  X1LqXa1wBWadrQb2cUbq focus:!ring-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Later</font></font><span class="flex items-center justify-center ml-2 h-5 w-5"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 -rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span></button></div>
  
  '; 
				}
				else if($data['date_flag']==3)
				{
					$earlier='<div class="absolute left-0 -top-12 z-20"><button onclick="getNewCalender(2);" class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none  X1LqXa1wBWadrQb2cUbq focus:!ring-0"><span class="flex items-center justify-center mr-2 h-5 w-5"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Earlier</font></font></button></div>
  
  
                                            <div class="absolute right-0 -top-12 z-20"><button class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none !text-green-200 X1LqXa1wBWadrQb2cUbq focus:!ring-0" disabled=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Later</font></font><span class="flex items-center justify-center ml-2 h-5 w-5"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 -rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span></button></div>';
				}
				else
				{
					$e=$data['date_flag']-1;
					$l=$data['date_flag']+1;
					$earlier='<div class="absolute left-0 -top-12 z-20"><button onclick="getNewCalender('.$e.');" class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none  X1LqXa1wBWadrQb2cUbq focus:!ring-0"><span class="flex items-center justify-center mr-2 h-5 w-5"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Earlier</font></font></button></div>
  
   <div class="absolute right-0 -top-12 z-20"><button onclick="getNewCalender('.$l.');" class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none  X1LqXa1wBWadrQb2cUbq focus:!ring-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Later</font></font><span class="flex items-center justify-center ml-2 h-5 w-5"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 -rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span></button></div>
  
                                          ';
				}
			 $flag=$data['date_flag']*7;
			$startDate=date('M d',strtotime(date('d-m-Y') . ' +'.$flag.' day'));
			$flag=($data['date_flag']*7)+6;
			$endDate=date('M d',strtotime(date('d-m-Y') . ' +'.$flag.' day'));
			$calender=json_decode($data['calender'],true); 
			
			$header="";		
			$i=0;			
			$weekDays='';
			 foreach($calender as $key)
			 {
				if($key==0)
					 continue;  
				 
				 if($i==0)
				 {
					 $select="selected";
				 }
				 
				 else
					 {
						$select=""; 
					 }
					 if(count($key['work_time_info'])==0)
					 {
						  
						$header=$header.'<div class="flex-grow basis-0 border-b-[1px] border-l-[1px] border-gray-200   text-center last-of-type:border-r-[1px] colIndex-'.$i.' text-gray-300"><span class="block pt-2 text-center text-sm capitalize text-inherit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.date('D',$key['date']).'</font></font></span><span class="relative mx-auto mb-1 block h-11 text-lg font-semibold !leading-[44px] text-inherit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.date('d',$key['date']).'</font></font></span></div>'; $disable='disabled';
					 }
					 else
					 {
						 $header=$header.'<div class="flex-grow basis-0 border-b-[1px] border-l-[1px] border-gray-200  text-center last-of-type:border-r-[1px] colIndex-'.$i.' text-gray-300"><span class="block pt-2 text-center text-sm capitalize text-inherit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.date('D',$key['date']).'</font></font></span><span class="relative mx-auto mb-1 block h-11 text-lg font-semibold !leading-[44px] text-inherit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.date('d',$key['date']).'</font></font><span class="absolute bottom-[2px] left-1/2 h-[6px] w-[6px] -translate-x-1/2 rounded-full bg-gray-300"></span></span></div>'; 
					 }
					
				 
						$weekDays=$weekDays.'<div class="flex-shrink flex-grow basis-0 border-l-[1px] border-b-[1px] border-gray-100 text-center last-of-type:border-r-[1px]">';
						
						     
									foreach($key['work_time_info'] as $key1)
									 {
										 
											 
										 
									$stmt = $dbCon->prepare("select work_time from working_hrs where id=?");
									/* bind parameters for markers */
									 
									$stmt->bind_param("i",$key1['id']);
									$stmt->execute();
									$result = $stmt->get_result();
									$row = $result->fetch_assoc();	 
									
									 
									$weekDays=$weekDays.'<span class="mx-1 my-[6px] flex h-auto cursor-pointer flex-col rounded-md border-[1px] border-solid text-center text-xs font-semibold !leading-9 md:m-2   border-green text-green hover:bg-green bg-green-100 hover:text-white" onclick="updateEmployeeTime('.$key['date'].','.$key1['id'].','.$key1['emp_id'].','.$key['timerequired'].');"><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$row['work_time'].'</font></font></span></span>
									
									';	 
									 }
								
								$weekDays=$weekDays.'</div>';
								
						 	 
			$i++;
			 }
		
			if(isset($_POST['w_width']))
			{
			if($_POST['w_width']>700)
					{
						$width=450;
					}
					else
					{
					$width=	$_POST['w_width']-50;
					}	
			}	
			else
			{
				$width=450;
			}
		
			 $dataAvailable='<div class="column_m bs_bb  ">
					
					<div style="position: relative;">
                                    <div class="calendar week-view">
									<p class="sticky !top-16 z-[100] m-0 flex flex-col items-center justify-center   p-3 uppercase"><span class="font-semibold text-gray-900"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$startDate.' - '.$endDate.'</font></font></span><span class="text-xs text-gray-700"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Week 45</font></font></span></p>
                                         
                                        <div class="sticky !top-32 z-[100]   shadow" style="height:76px;">
                                            <div class="slick-slider slick-calendar slick-initialized">
                                                <div class="slick-list">
                                                    <div class="slick-track" style="width: '.$width.'px; opacity: 1; transform: translate3d(0px, 0px, 0px);">
                                                        <div data-index="0" class="slick-slide slick-active slick-current" tabindex="-1" aria-hidden="false" style="outline: none; width: '.$width.'px;">
                                                            <div>
                                                                <div class="!flex w-full justify-between" tabindex="-1" style="width: 100%; display: inline-block; color:white;">
                                                                     '.$header.'
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            '.$earlier.'
                                        </div>
                                        <div class="hours sticky">
                                            <div class="flex w-full" style="min-height: 300px; color:white;">
                                               '.$weekDays.'
                                            </div>
                                        </div>
                                    </div>
                                </div>
					
					
					
				</div>';
				
				 
			$dbCon->close();
			return $dataAvailable;
			
			 
			
		}
	
		function selectedServiceImages($data)
		{
			$dbCon = AppModel::createConnection();
			$item_id= $this -> encrypt_decrypt('decrypt',$data['service_id']); 
			 
			$stmt = $dbCon->prepare("select * from dish_detail_photos where dish_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $item_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0; 
			while($row1 = $result->fetch_assoc())
			{
			 
			$image=$row1['dish_photo_path'];
			$value_a=file_get_contents("../estorecss/".$image.".txt"); $value_a=str_replace('"','',$value_a); $row1['dish_photo_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$image.'.jpg' );
			$row1['image_path1']=str_replace('../','https://www.qloudid.com/',$row1['dish_photo_path']);	
			array_push($org,$row1);	
			$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
		}
	
	
		 function updateInactiveServices($data)
		{
			
			$dbCon = AppModel::createConnection();
			$d=strtotime(date('Y-m-d'));
			$stmt = $dbCon->prepare("update dishes_detail_information set is_active=0 where open_event_date<? and recurring_event=0 and one_shared=2 and one_shared_type=1");
			$stmt->bind_param("s",$d);
			$stmt->execute();
			 
		 
			$stmt->close();
			$dbCon->close();  
			return 1;
			
		}
			
			
		
		
		 function getProfessionalBookingServices($data)
		{
			
			$dbCon = AppModel::createConnection();
			$professional_subcategory_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			//echo $professional_subcategory_id.' '.$company_id.' '.$domain_id; die;
			$stmt = $dbCon->prepare("select time_required,dish_image,company_name,dishes_detail_information.id,dish_name,dish_detail,dish_price,is_bookable,is_active,is_physical,one_shared,one_shared_type,recurring_event,open_event_date,open_total_person from dishes_detail_information left join companies on companies.id=dishes_detail_information.company_id where is_physical=2 and is_bookable=1 and is_active=1  and company_id=?    and dishes_detail_information.id in (select service_id from dish_marketplace_information where marketplace_id=? and is_published=1)");
			$stmt->bind_param("ii",$company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			 if($row['one_shared']==2 && $row['one_shared_type']==1 && $row['recurring_event']==0)
			 {
				 $d=strtotime(date('Y-m-d'));
				 if($row['open_event_date']<=$d)
					 continue;
				 else
				 {
					$stmt = $dbCon->prepare("select sum(dish_quantity) as total_booked from hotel_roomservice_item_ordered where dish_id=? and service_type=5");
					$stmt->bind_param("i",$row['id']);
					$stmt->execute();
					$result2 = $stmt->get_result();	
					$row2 = $result2->fetch_assoc();
					if($row2['total_booked']==$row['open_total_person'])
						continue;
				 }
			 }
			 
			 
			$filename="../estorecss/".$row['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['dish_image'].'.jpg' );  $imgs='../../../../'.$imgs; } else { $value_a="../../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../../html/usercontent/images/default-profile-pic.jpg"; }
			$imgs=str_replace('../../../../../','https://www.qloudid.com/',$imgs);
			$row['dish_image']=$imgs;
			
			array_push($org,$row);
			$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			$key_values = array_column($org, 'one_shared'); 
			array_multisort($key_values, SORT_ASC, $org);
			$j++;
			}
		 
			$stmt->close();
			$dbCon->close();  
			return $org;
			
		}
			
			
			
		function professionalSubCategoryDetailCityBased($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$whom_id=$this->encrypt_decrypt('decrypt',$data['whom_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$area_id=$this->encrypt_decrypt('decrypt',$data['city_id']);
			//echo $catg_id.' '.$whom_id.' '.$domain_id.' '.$area_id; die;
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where professional_category_id=? and id in (select subcategory_id from professional_service_subcategory_available  where availablity_type=?) and id in (select professional_subcategory_id from professional_marketplace_service_todos where marketplace_id=? and is_selected=1 and professional_category_id=?) and id in (select professional_subcategory_id from professional_company_selected_service_todos where company_id in(select company_id from professional_company_selected_areas where city_id=? and is_selected=1) and is_selected=1 and professional_category_id=?) order by professional_service_subcategory.id ");
			$stmt->bind_param("iiiiii", $catg_id,$whom_id,$domain_id,$catg_id,$area_id,$catg_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			if($data['todo_id']=='T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09')
			{
			$stmt = $dbCon->prepare("select count(dishes_detail_information.id) as num from dishes_detail_information where is_physical=2 and is_bookable=1 and is_active=1 and professional_subcategory_id =?   and dishes_detail_information.id in (select service_id from dish_marketplace_information where marketplace_id=? and is_published=1)");
			$stmt->bind_param("ii",$rowCategory['id'],$domain_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();	
			if($row1['num']==0)
			{
				continue;
			}
			}	
			
			$filename="../estorecss/".$rowCategory['subcategory_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowCategory ['subcategory_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowCategory ['subcategory_image'].'.jpg' );  $imgs='../../../../'.$imgs; } else { $value_a="../../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../../html/usercontent/images/default-profile-pic.jpg"; }
			$rowCategory['subcategory_image']=str_replace('../../../../../','https://www.qloudid.com/',$imgs);
			
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
			
			
				
		function professionalCategoryDetailAreaBased($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$area_id=$this->encrypt_decrypt('decrypt',$data['area_id']);
			$stmt = $dbCon->prepare("select * from professional_service_category where id in(select professional_category_id from professional_marketplace_service_todos where marketplace_id=? and is_selected=1) and id in (select professional_category_id from professional_company_selected_service_todos where company_id in(select company_id from professional_company_selected_areas where area_id=? and is_selected=1) and is_selected=1)	order by category_completed desc");
			$stmt->bind_param("ii",$domain_id,$area_id);	
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}	
			
			
			
			function marketplaceSelectedDomainList($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 
		
			$marketplace_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$whom_id=$this->encrypt_decrypt('decrypt',$data['whom_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			
			 
			$area_id=$this->encrypt_decrypt('decrypt',$data['city_id']);
			$stmt = $dbCon->prepare("select * from professional_marketplace_domain_info where id not in (select marketplace_domain_id from professional_marketplace_selected_domain where marketplace_id=?)");
			$stmt->bind_param("i",$marketplace_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowCategory = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into `qloudid`.`professional_marketplace_selected_domain`(`marketplace_domain_id`,marketplace_id,created_on,modified_on) values (?,?,now(),now())");
			$stmt->bind_param("ii",$rowCategory['id'],$marketplace_id);
			$stmt->execute();
			}
			if($data['todo_id']=='T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09')
			{
			$stmt = $dbCon->prepare("select * from professional_marketplace_domain_info where id in(select available_at_domain from professional_service_category where id in(select professional_category_id from professional_marketplace_service_todos where is_selected=1 and marketplace_id=?))");
			$stmt->bind_param("i",$marketplace_id);
			}
			else
			{
			$stmt = $dbCon->prepare("select * from professional_marketplace_domain_info where id in (select marketplace_domain_id from professional_marketplace_selected_domain where marketplace_id=? and is_selected=1)");
			$stmt->bind_param("i",$marketplace_id);	
			}
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
				 
			if($data['todo_id']=='T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09')
				{
				$stmt = $dbCon->prepare("select count(dishes_detail_information.id) as num from dishes_detail_information where is_physical=2 and is_bookable=1 and is_active=1 and professional_subcategory_id in (select id from professional_service_subcategory where professional_category_id in (select id from professional_service_category where available_at_domain=?) and id in (select subcategory_id from professional_service_subcategory_available  where availablity_type=1) and id in (select professional_subcategory_id from professional_marketplace_service_todos where marketplace_id=? and is_selected=1 and professional_category_id in (select id from professional_service_category where available_at_domain=?)) and id in (select professional_subcategory_id from professional_company_selected_service_todos where company_id in(select company_id from professional_company_selected_areas where city_id=? and is_selected=1) and is_selected=1 and professional_category_id in (select id from professional_service_category where available_at_domain=?))) and dishes_detail_information.id in (select service_id from dish_marketplace_information where marketplace_id=? and is_published=1)");
				
				$stmt->bind_param("iiiiii",$rowCategory['id'],$marketplace_id,$rowCategory['id'],$area_id,$rowCategory['id'],$marketplace_id);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();	
				if($row1['num']==0)
				{
					continue;
				}
				}	
			$row['profile_pic']=$rowCategory['marketplace_domain_image'];
					if($row['profile_pic']=="" || $row['profile_pic']==null)
					{
						$rowCategory['marketplace_domain_image']='https://www.qloudid.com/html/usercontent/images/default-profile-pic.jpg';
					}
					else
					{
					$filename="../estorecss/".$row['profile_pic'].".txt"; $value_a=file_get_contents("../estorecss/".$row['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a); $image = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['profile_pic'].'.jpg' );
					$rowCategory['marketplace_domain_image']=str_replace('../','https://www.qloudid.com/',$image);	
					}
					 
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			 
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}	
			
			
			
			
			function professionalCategoryDetailCityBased($data)
			{ 
		
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$whom_id=$this->encrypt_decrypt('decrypt',$data['whom_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$area_id=$this->encrypt_decrypt('decrypt',$data['city_id']);
			$md_id=$this->encrypt_decrypt('decrypt',$data['md_id']);
			 
			$stmt = $dbCon->prepare("select * from professional_service_category where id in(select professional_category_id from professional_marketplace_service_todos where marketplace_id=? and is_selected=1) and id in (select professional_category_id from professional_company_selected_service_todos where company_id in(select company_id from professional_company_selected_areas where city_id=? and is_selected=1 and company_id in (select company_id from cleaning_company_premium_account_request where selected_subscription>-1 and domain_id=?)) and is_selected=1) and available_at_domain=?	and ia_visible_to_list=1 order by category_completed desc");
			$stmt->bind_param("iiii",$domain_id,$area_id,$domain_id,$md_id);	
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
				
				if($rowCategory['id']==$data['catg_id'])
				{
					$rowCategory['is_selected']=1;
				}
				else
				{
					$rowCategory['is_selected']=0;
				}
				 
			if($data['todo_id']=='T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09')
			{
			$stmt = $dbCon->prepare("select count(dishes_detail_information.id) as num from dishes_detail_information where is_physical=2 and is_bookable=1 and is_active=1 and professional_subcategory_id in (select id from professional_service_subcategory where professional_category_id=? and id in (select subcategory_id from professional_service_subcategory_available  where availablity_type=?) and id in (select professional_subcategory_id from professional_marketplace_service_todos where marketplace_id=? and is_selected=1 and professional_category_id=?) and id in (select professional_subcategory_id from professional_company_selected_service_todos where company_id in(select company_id from professional_company_selected_areas where city_id=? and is_selected=1) and is_selected=1 and professional_category_id=?)) and dishes_detail_information.id in (select service_id from dish_marketplace_information where marketplace_id=? and is_published=1)");
			$stmt->bind_param("iiiiiii",$rowCategory['id'],$whom_id,$domain_id,$rowCategory['id'],$area_id,$rowCategory['id'],$domain_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();	
			if($row1['num']==0)
			{
				continue;
			}
			} 
				
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			$key_values = array_column($org, 'is_selected'); 
			array_multisort($key_values, SORT_DESC, $org);
			}
			
			 
			 
				$stmt->close();
				$dbCon->close();
				return $org;	
			}	
			
			
		function professionalServiceWhomAvailable()
		{ 
		
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from professional_service_subcategory_whom_available");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
			
		function professionalSubCategoryDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$whom_id=$this->encrypt_decrypt('decrypt',$data['whom_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where professional_category_id=? and id in (select subcategory_id from professional_service_subcategory_available  where availablity_type=?) and id in (select professional_subcategory_id from professional_marketplace_service_todos where marketplace_id=? and is_selected=1 and professional_category_id=?)");
			$stmt->bind_param("iiii", $catg_id,$whom_id,$domain_id,$catg_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
			
			
	function selectedProfessionalCategoryDetail($data)
		{ 
		 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id not in(select professional_subcategory_id from professional_company_selected_service_todos where company_id=? and domain_id=?)");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row= $result->fetch_assoc())
			{
				
			$stmt = $dbCon->prepare("insert into professional_company_selected_service_todos ( domain_id,professional_category_id,professional_subcategory_id,company_id, created_on, modified_on) values (?,?, ?,?, now(), now())");
			$stmt->bind_param("iiii",$domain_id,$row['professional_category_id'],$row['id'],$company_id);
			$stmt->execute();
			 				
			}
			
			$stmt = $dbCon->prepare("select * from professional_service_category where id in (select professional_category_id from professional_company_selected_service_todos where company_id=? and is_selected=1 and domain_id=? and professional_category_id in(select professional_category_id from professional_marketplace_service_todos where marketplace_id=? and is_selected=1))");
			$stmt->bind_param("iii", $company_id,$domain_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
			
			
	function selectedProfessionalCategoryDetailInfo($data)
		{ 
		 
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$stmt = $dbCon->prepare("select * from professional_service_category where id =?");
			$stmt->bind_param("i", $catg_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCategory = $result->fetch_assoc();
			$rowCategory['md_id']=$this->encrypt_decrypt('encrypt',$rowCategory['available_at_domain']);
				$stmt->close();
				$dbCon->close();
				return $rowCategory;	
			}
	
	function selectedProfessionalCategoryAvailableLocation($data)
		{ 
		 
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$stmt = $dbCon->prepare("select * from professional_service_category_location where id in (select service_available from professional_service_category_available where category_id=?)");
			$stmt->bind_param("i", $catg_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
				array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
	
	
	function selectedProfessionalSubCategoryDetailInfo($data)
		{ 
		 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$catg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id =?");
			$stmt->bind_param("i", $catg_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCategory = $result->fetch_assoc();
				$stmt->close();
				$dbCon->close();
				return $rowCategory;	
			}
	function sendPricingLink($data)
	{
		$subject='Signup completed';
		$to      = $data['email'];
		$emailContent='<html xmlns="http://www.w3.org/1999/xhtml" style="background-color: rgb(240, 240, 240);"><head>
  <title>Reservation confirmed</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <style type="text/css">
    /* GT AMERICA */

    @font-face {
      font-display: fallback;
      font-family: "GT America Regular";
      font-weight: 400;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.ttf") format("truetype");
    }

    @font-face {
      font-display: fallback;
      font-family: "GT America Medium";
      font-weight: 600;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.ttf") format("truetype");
    }

    @font-face {
      font-display: fallback;
      font-family: "GT America Condensed Bold";
      font-weight: 700;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.ttf") format("truetype");
    }

    /* CLIENT-SPECIFIC RESET */

    body,
    table,
    td,
    a {
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }

    /* Prevent WebKit and Windows mobile changing default text sizes */

    table,
    td {
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }

    /* Remove spacing between tables in Outlook 2007 and up */

    img {
      -ms-interpolation-mode: bicubic;
    }

    /* Allow smoother rendering of resized image in Internet Explorer */

    .im {
      color: inherit !important;
    }

    /* DEVICE-SPECIFIC RESET */

    a[x-apple-data-detectors] {
      color: inherit !important;
      text-decoration: none !important;
      font-size: inherit !important;
      font-family: inherit !important;
      font-weight: inherit !important;
      line-height: inherit !important;
    }

    /* iOS BLUE LINKS */

    /* RESET */

    img {
      border: 0;
      height: auto;
      line-height: 100%;
      outline: none;
      text-decoration: none;
      display: block;
    }

    table {
      border-collapse: collapse;
    }

    table td {
      border-collapse: collapse;
      display: table-cell;
    }

    body {
      height: 100% !important;
      margin: 0 !important;
      padding: 0 !important;
      width: 100% !important;
    }

    /* BG COLORS */

    .mainTable {
      background-color: #F0F0F0;
    }

    .mainTable--hospitality {
      background-color: #f7f2ed;
    }

    html {
      background-color: #F0F0F0;
    }

    /* VARIABLES */

    .bg-white {
      background-color: white;
    }

    .hr {
      /* Cross-client horizontal rule. Adapted from https://litmus.com/community/discussions/4633-is-there-a-reliable-1px-horizontal-rule-method */
      background-color: #d3d3d8;
      border-collapse: collapse;
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
      mso-line-height-rule: exactly;
      line-height: 1px;
    }

    .textAlignLeft {
      text-align: left !important;
    }

    .textAlignRight {
      text-align: right !important;
    }

    .textAlignCenter {
      text-align: center !important;
    }

    .mt1 {
      margin-top: 6px;
    }

    .list {
      padding-left: 18px;
      margin: 0;
    }

    /* TYPOGRAPHY */

    body {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      color: #4f4f65;
      -webkit-font-smoothing: antialiased;
      -ms-text-size-adjust: 100%;
      -moz-osx-font-smoothing: grayscale;
      font-smoothing: always;
      text-rendering: optimizeLegibility;
    }

    .h1 {
      font-family: "GT America Condensed Bold", "Roboto Condensed", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 700;
      vertical-align: middle;
      font-size: 36px;
      line-height: 42px;
    }

    .h2 {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 600;
      vertical-align: middle;
      font-size: 16px;
      line-height: 24px;
    }

    .text {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 16px;
      line-height: 21px;
    }

    .text-list {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 16px;
      line-height: 25px;
    }

    .textSmall {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 14px;
    }

    .text-xsmall {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-size: 11px;
      text-transform: uppercase;
      line-height: 22px;
      letter-spacing: 1px;
    }

    .text-bold {
      font-weight: 600;
    }

    .text-link {
      text-decoration: underline;
    }

    .text-linkNoUnderline {
      text-decoration: none;
    }

    .text-strike {
      text-decoration: line-through;
    }

    /* FONT COLORS */

    .textColorDark {
      color: #23233e;
    }

    .textColorNormal {
      color: #4f4f65;
    }

    .textColorBlue {
      color: #2020c0;
    }

    .textColorGrayDark {
      color: #7B7B8B;
    }

    .textColorGray {
      color: #A5A8AD;
    }

    .textColorWhite {
      color: #FFFFFF;
    }

    .textColorRed {
      color: #df3232;
    }

    /* BUTTON */

    .Button-primary-wrapper {
      border-radius: 3px;
      background-color: #2020C0;
    }

    .Button-primary {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      border-radius: 3px;
      border: 1px solid #2020C0;
      color: #ffffff;
      display: block;
      font-size: 16px;
      font-weight: 600;
      padding: 18px;
      text-decoration: none;
    }

    .Button-secondary-wrapper {
      border-radius: 3px;
      background-color: #ffffff;
    }

    .Button-secondary {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      border-radius: 3px;
      border: 1px solid #2020C0;
      color: #2020C0;
      display: block;
      font-size: 16px;
      font-weight: 600;
      padding: 18px;
      text-decoration: none;
    }

    /* LAYOUT */

    .Content-container {
      padding-left: 60px;
      padding-right: 60px;
    }

    .Content-container--main {
      padding-top: 54px;
      padding-bottom: 60px;
    }

    .Content {
      width: 580px;
      margin: 0 auto;
    }

    .wrapper {
      max-width: 600px;
    }

    .section {
      padding: 24px 0px;
      border-bottom: 1px solid #d3d3d8;
    }

    .section--noBorder {
      padding: 24px 0px 0;
    }

    .section--last {
      padding: 24px 0px;
    }

    .message {
      background-color: #F4F4F5;
      padding: 18px;
    }

    .card {
      border: 1px solid #d3d3d8;
      padding: 18px;
    }

    /* HEADER */

    .header-tockLogoImage {
      display: block;
      color: #F0F0F0;
    }

    .header-heroImage {
      padding-bottom: 24px;
    }

    /* PREHEADER */

    .preheader {
      display: none;
      font-size: 1px;
      color: #FFFFFF;
      line-height: 1px;
      max-height: 0px;
      max-width: 0px;
      opacity: 0;
      overflow: hidden;
    }

    /* BANNER */

    .notice {
      padding: 12px;
      background: #23233E;
      color: #FFFFFF;
      display: block;
      font-size: 14px;
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 600;
    }

    /* INTRO */

    .section--intro {
      padding-bottom: 48px;
    }

    /* BOOKING INFO */

    .business-logo__container {
      width: 48px;
      height: 48px;
      border-radius: 3px;
      border: 1px solid #d3d3d8;
      overflow: hidden;
    }

    .business-logo__image {
      border: 1px solid transparent;
      border-radius: 3px;
      width: 48px;
      height: 48px;
      display: block;
    }

    .business-address--address {
      width: 50%;
    }

    .business-address--map {
      width: 50%;
    }

    .business-address--map-image {
      width: 100%;
    }

    /* MOBILE TICKETS */

    .mobile-ticket--description {
      width: 65%;
      margin-top: 12px;
      margin-right: 5%;
    }

    .mobile-ticket--code {
      width: 30%;
    }

    .mobile-ticket--code-image {
      width: 100%;
    }

    /* RESERVATION ACTIONS */

    .linksTable {
      border-bottom: 1px solid #d3d3d8;
    }

    .linksTableRow {
      padding: 24px 12px;
    }

    .actions-icon {
      vertical-align: middle;
    }

    .actions-text {
      vertical-align: middle;
    }

    /* RECEIPT */

    .receipt__container {
      border: 1px solid #d3d3d8;
      padding: 24px;
    }

    .receipt__row {
      border-top: 1px solid #d3d3d8;
    }

    /* FEEDBACK ICONS */

    .feedback-link {
      border: 1px solid #d4d5da;
      border-radius: 3px;
      display: inline-block;
      width: calc(32% - 2px);
      padding: 10px 0;
    }

    .feedback-link-bumper {
      display: inline-block;
      width: 1%;
    }

    .feedback-link img {
      height: 50px;
      width: 50px;
    }

    /* SOCIAL ICONS */

    .social-link {
      display: inline-block;
      width: auto;
    }

    .social-link-text {
      padding: 14px 24px 14px 14px;
    }

    /* TABLET STYLES */

    @media screen and (max-width: 648px) {
      /* DEVICE-SPECIFIC RESET */
      div[style*="margin: 16px 0;"] {
        margin: 0 !important;
      }
      /* ANDROID CENTER FIX */
      /* LAYOUT */
      .wrapper {
        width: 100% !important;
        max-width: 100% !important;
      }
      .Content {
        width: 90% !important;
      }
      .Content-container {
        padding-left: 36px !important;
        padding-right: 36px !important;
      }
      .Content-container--main {
        padding-top: 30px !important;
        padding-bottom: 42px !important;
      }
      .responsiveTable {
        width: 100% !important;
      }
      /* RESERVATION ACTIONS */
      .linksTableRow {
        padding-left: 0 !important;
        padding-right: 0 !important;
        padding-top: 12px !important;
        padding-bottom: 12px !important;
      }
      .linksTableRow--borderRight {
        border-right: none !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
      }
      /* FEEDBACK LINK */
      .feedback-link img {
        height: 38px !important;
        width: 38px !important;
      }
    }

    /* MOBILE STYLES */

    @media screen and (max-width: 480px) {
      /* TYPOGRAPHY */
      .h1 {
        font-size: 30px !important;
        line-height: 30px !important;
      }
      .text {
        font-size: 16px !important;
        line-height: 22px !important;
      }
      /* BUTTON */
      .mobile-buttonContainer {
        width: 100% !important;
      }
      /* LAYOUT */
      .Content {
        width: 100% !important;
      }
      .Content-container {
        padding-left: 18px !important;
        padding-right: 18px !important;
      }
      .Content-container--main {
        padding-top: 24px !important;
        padding-bottom: 30px !important;
      }
      .section {
        padding: 18px 0 !important;
      }
      .section--last {
        padding: 18px 0 !important;
      }
      .header {
        padding: 0 18px !important;
      }
      .business-address--address {
        width: 100% !important;
      }
      .business-address--map {
        margin-top: 30px !important;
        width: 100% !important;
      }
      .mobile-ticket--description {
        width: 100% !important;
        margin-top: 0px !important;
      }
      .mobile-ticket--code {
        margin-top: 30px !important;
        margin-left: 0;
        width: 100% !important;
      }
      /* RECEIPT */
      .receipt__container {
        padding: 12px !important;
      }
      /* SOCIAL ICONS */
      .social-link {
        display: block !important;
        width: 100% !important;
        border-bottom: 1px solid #d3d3d8 !important;
      }
      /* INTRO */
      .section--intro {
        padding-top: 18px !important;
        padding-bottom: 18px !important;
      }
    }
  </style>
</head>

<body style="margin: 0 !important; padding: 0 !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; height: 100%; margin: 0; padding: 0; width: 100%; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; color: rgb(79, 79, 101); -webkit-font-smoothing: antialiased; -ms-text-size-adjust: 100%; -moz-osx-font-smoothing: grayscale; font-smoothing: always; text-rendering: optimizeLegibility;">
   
  <!--[if mso]>
    <style type="text/css">
.h1 {font-family: "Helvetica", "Arial", sans-serif !important; font-weight: 700 !important; vertical-align: middle !important; font-size: 36px !important; mso-line-height-rule: exactly;line-height: 42px !important;}
.h2 {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 600 !important;vertical-align: middle !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 24px !important;}
.text {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 21px !important;}
.text-list {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 25px !important;}
.textSmall {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 14px !important;}
.text-xsmall {font-family: "Helvetica", "Arial", sans-serif !important;font-size: 11px !important;text-transform: uppercase !important;mso-line-height-rule: exactly;line-height: 22px !important;letter-spacing: 1px !important;}
.text-bold {font-weight: 600 !important;}
.text-link {text-decoration: underline !important;}
.text-linkNoUnderline {text-decoration: none !important;}
.text-strike {text-decoration: line-through !important;}
.textColorDark {color: #23233e !important;}
.textColorNormal {color: #4f4f65 !important;}
.textColorBlue {color: #2020c0 !important;}
.textColorGray {color: #A5A8AD !important;}
.textColorWhite {color: #FFFFFF !important;}
.Button-primary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #ffffff !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
.Button-secondary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #2020C0 !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
    </style>
    <![endif]-->
  <!-- HIDDEN PREHEADER TEXT -->
  <div class="preheader" style="display: none; font-size: 1px; color: rgb(255, 255, 255); line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
  </div>
  <table border="0" cellpadding="0" cellspacing="0" width="100%" class=" mainTable  " style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: rgb(240, 240, 240);">
    <tbody>
<tr>
<td style="display:none !important;
 visibility:hidden;
 mso-hide:all;
 font-size:1px;
 color:#ffffff;
 line-height:1px;
 max-height:0px;
 max-width:0px;
 opacity:0;
 overflow:hidden; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> We are thrilled that you will be joining us. If yo... </td>
    <!-- HEADER -->
    </tr>
<tr>
      <td align="center" class="header" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
        <!--[if (gte mso 9)|(IE)]>
    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
    <tr>
    <td align="center" valign="top" width="600">
    <![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 580px; margin: 0 auto;">
          <tbody>
<tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <h1 style="font-size: 33px;font-weight: 800;line-height: 30px;">Qloud ID</h1>               </td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
        </tbody>
</table>
        <!--[if (gte mso 9)|(IE)]>
    </td>
    </tr>
    </table>
    <![endif]-->
      </td>
    </tr>
    <!-- CONTENT -->
    <tr>
      <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
        <!--[if (gte mso 9)|(IE)]>
    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
    <tr>
    <td align="center" valign="top" width="600">
    <![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content bg-white" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: white; width: 580px; margin: 0 auto;">
          <tbody>
<tr>
            <td class="Content-container Content-container--main text textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101); padding-left: 60px; padding-right: 60px; padding-top: 54px; padding-bottom: 60px;">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                <!-- RESTAURANT INFO -->
                <tbody>
<tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>

                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
                <!-- INTRO -->
                <tr>
                  <td valign="top" align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
<tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">Signup Completed</span>                          </td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                          <!--[if gte mso 15]>&nbsp;<![endif]-->
                        </td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
                <!-- MESSAGE -->
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="message" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
                    <div class="text textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                      <span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">A message from Qloud ID</span>
                      <br> We are thrilled that you will be joining us. If you would like to hear from you, please do not hesitate to reach out. Restore your account and start using Qloud ID
                    </div>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                    <!--[if gte mso 15]>&nbsp;<![endif]-->
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- BOOKING INFO -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>

                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody>
<tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="https://www.qloudid.com/public/index.php/UserCompanySignUp/completeProfile/'.$data['cid'].'/'.$data['domain_id'].'" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;">Complete profile</a>                                </td>
                            </tr>
                          </tbody>
</table>
                        </td>
                      </tr>
					  
					  <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
					  
					  
					  
                    </tbody>
</table>
                  </td>
                </tr>
                <!-- ADDRESS -->
                <tr>
                  <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>

                      
                      
                      
                      
                      <tr>
                        <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          
                        </td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                    <!--[if gte mso 15]>&nbsp;<![endif]-->
                  </td>
                </tr>
                
                
                <!-- RECEIPT -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" width="100%" cellpadding="0" cellspacing="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      
</table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- EDIT RECEIPT -->
                <!-- CANCELLATION POLICY -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
<tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; font-weight: 600; color: rgb(35, 35, 62);">Add pricing</div>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                            <span>You are almost there. To start charging the home repair task please add pricing on your available services. Please click on above link to start the process.</span>
                            <span></span>
                          </div>
                        </td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- QUESTIONS -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
<tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; font-weight: 600; color: rgb(35, 35, 62);">
                            Questions?
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                            If you have questions about your reservation, contact us at&nbsp;
                            <a></a>                            or by calling
                            <a>+46 762072193</a>.
                          </div>
                        </td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
              </tbody>
</table>
            </td>
          </tr>
        </tbody>
</table>
      </td>
    </tr>
    <!-- FOOTER -->
    <tr>
      <td align="center" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; width: 580px; margin: 0 auto;">
        <!-- Will most likely required a feature flag -->
        <!--[if (gte mso 9)|(IE)]>
<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
<tr>
<td align="center" valign="top" width="600">
<![endif]-->
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="Content-container" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
          <tbody>
<tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <a href="https://www.exploretock.com" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;"> <img src="https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png" width="30" height="30" alt="Tock" border="0" style="-ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; display: block;"> </a>              </td>
          </tr>
          <tr class="spacer">
            <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
              <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                © 2019 Tock, Inc.
              </div>
              <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                All Rights Reserved
              </div>
            </td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
        </tbody>
</table>
        <!--[if (gte mso 9)|(IE)]>
</td>
</tr>
</table>
<![endif]-->
      </td>
    </tr>
  </tbody>
</table>
</body></html>';
			try {
				 sendEmail($subject, $to, $emailContent);
						}

					catch(Exception $e) {
						$to      = 'kowaken.ghirmai@gmail.com';
						sendEmail($subject, $to, $emailContent);
					   
					}
	}

		function dayDetail()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select *  from day_detail");
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
		function workingHrs()
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select * from working_hrs");
			
			/* bind parameters for markers */
			 
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
		
		function bookableServiceCategories($data)
		{
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$stmt = $dbCon->prepare("select * from bookable_service_categories where professional_category=?");
			$stmt->bind_param("i", $catg_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		function selectedProfessionalCategoryServicesDetail($data)
		{ 
		 	$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select professional_company_selected_service_todos.id,professional_subcategory_id,subcategory_name from professional_company_selected_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_company_selected_service_todos.professional_subcategory_id where professional_company_selected_service_todos.professional_category_id=? and company_id=? and domain_id=? and is_selected=1 and professional_subcategory_id in (select professional_subcategory_id from professional_marketplace_service_todos where marketplace_id=? and is_selected=1)");
			$stmt->bind_param("iiii",$catg_id, $company_id,$domain_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select * from professional_company_selected_service_todos_price_info where professional_subcategory_id=?");
			$stmt->bind_param("i", $rowCategory['professional_subcategory_id']);
			$stmt->execute();
			$resultPrice = $stmt->get_result();
			$rowPrice = $resultPrice->fetch_assoc();
			if(empty($rowPrice))
			{
				$rowCategory['is_priced']=0;
			}
			else
			{
				$rowCategory['is_priced']=1;
				$rowCategory['dish_price']=$rowPrice['dish_price'];
			}
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['professional_subcategory_id']);
			array_push($org,$rowCategory);
			}
			
			//print_r($org); die;
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
		function checkCid()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select company_email from companies where company_email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['company_email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
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
		else
		{
		$stmt->close();
		$dbCon->close();
		return 2;	
		}
		}
		
		function addCompanyBuilding()
		{
			$dbCon = AppModel::createConnection();
			$data=array();
			
			$stmt = $dbCon->prepare("select id from user_logins where email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$rf=0;	
			$st=1;
			$data['random_hash'] = substr(md5(uniqid(rand(), true)), 16, 16);
			$stmt = $dbCon->prepare("INSERT INTO user_logins (first_name,last_name,registered_from,get_started_wizard_status,email,  email_verification_code , created_on , modified_on, country_of_residence,verification_status ) VALUES (?, ?, ?, ?,   ?, ?, now(), now(), ?, ?)");
			$stmt->bind_param("ssiissii", $_POST['fname'], $_POST['lname'],$st,$st,$_POST['email'], $data['random_hash'], $_POST['country'],$rf);
			$stmt->execute();
			$data['user_id']=$stmt->insert_id;
			}
			else
			{
				$data['user_id']=$row['id'];
			}
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
			
			 
			$_POST['adrs1']=$_POST['daddress'];
			$_POST['port_number']=$_POST['d_port_number'];
			$name=htmlentities($_POST['company_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$street_address=htmlentities($_POST['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
			$city=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("select country_code,country_name from country where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_country = $result->fetch_assoc();
			$email=$_POST['company_email'];
			$_POST['position_type']=1;
			$web='';
			$st=1;
			$added_on_place=2;
			$stmt = $dbCon->prepare("insert into companies(company_type,o_type,country_id,user_login_id,company_name,company_email,website,hash_code,created_date,email_verification_status,created_by,user_role,is_landloard_signup,added_on_place) 
			values(?, ?, ?, ?, ?, ?, ?, ?, now(), ?, ?, ?,?,?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiiissssiiiii", $_POST['company_type'],$st, $_POST['country'], $data['admin_id'], $name, $email, $web, $hash_code,$st,$data['user_id'],$_POST['position_type'],$st,$added_on_place);
			
			
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
			$_POST['phone_number']=$_POST['pnumber'];
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
				$stmt = $dbCon->prepare("INSERT INTO property_location (latitude,longitude,company_id,property_id,visiting_address,created_on, is_headquarter,port_number,added_on_place) VALUES (?,?, ?, ?, ?, now(), ?, ?,?)");
				$stmt->bind_param("ssiisisi",$response[0]['lat'],$response[0]['lon'], $id,$_POST['property_id'],$street_address, $_POST['is_headquarter'],$_POST['d_port_number'],$added_on_place);
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
				$_POST['building_type']=1;
				$_POST['amenities_available']=1;
				$_POST['tenant_available']=1;
				$_POST['pricing_available']=1;
				$_POST['invoice_available']=1;
				$_POST['basement_available']=1;
				$_POST['penthouse_available']=1;
				$_POST['garage_available']=1;
				$_POST['vitech_region_id']=1;
				$_POST['vitech_city_id']=1;
				$_POST['vitech_area_id']=1;
				$company_id=$id;
				$street=htmlentities($_POST['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
				$city=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
				$stmt = $dbCon->prepare("insert into landloard_buildings (building_type,amenities_available,tenant_available,pricing_available,invoice_available,country_id,block_number,basement_available,penthouse_available,garage_available,vitech_region,vitech_city,vitech_area,company_id, building_name,street_address,city, state,latitude,longitude,total_ports,zipcode) values (?,?,?,?,?,?, ?,?, ?, ?,?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$stmt->bind_param("iiiiiisiiiiiiissssssis",$_POST['building_type'],$_POST['amenities_available'],$_POST['tenant_available'],$_POST['pricing_available'],$_POST['invoice_available'],$_POST['country'],$_POST['d_port_number'],$_POST['basement_available'],$_POST['penthouse_available'],$_POST['garage_available'],$_POST['vitech_region_id'],$_POST['vitech_city_id'],$_POST['vitech_area_id'], $company_id,$name,$street,$city,$response['address']['state'],$response[0]['lat'],$response[0]['lon'],$_POST['tports'],$_POST['dzip']);
				$stmt->execute();	
				$id=$stmt->insert_id;
			for($i=1;$i<=$_POST['tports'];$i++)
			{
			$elevator=1;
			$stmt = $dbCon->prepare("insert into landloard_building_ports (buildingid, port_number,total_floors,elevator_available) values (?, ?, ?, ?)");
			$stmt->bind_param("isii", $id,$i,$_POST['tfloors'],$elevator);
			$stmt->execute();	
			$id1=$stmt->insert_id;	
			for($j=1; $j<=$_POST['tfloors'];$j++)
			{
			$stmt = $dbCon->prepare("insert into landloard_building_port_floors(port_id, floor_number) values (?, ?)");
			$stmt->bind_param("ii", $id1,$j);
			$stmt->execute();	
			}
			
			}
			
			$stmt = $dbCon->prepare("select min(id) as port_id  from landloard_building_ports where buildingid=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();	
			$rowPort = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select *  from lanloard_building_amenity_info");
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowAvailable = $result->fetch_assoc())
			{
			if($rowAvailable['multi_port_available']==1)
			{
			$port_id=$rowPort['port_id'].',';
			}
			else
			{
			$port_id=$rowPort['port_id'];
			}
			$stmt = $dbCon->prepare("INSERT INTO landloard_building_amenities (building_id, amenity_id,port_id) VALUES (?, ?, ?)");
			$stmt->bind_param("iis", $id,$rowAvailable['id'],$port_id);
			$stmt->execute();	
			}
				
				
				
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
			
			$stmt->close();
			$dbCon->close();
			return $this->encrypt_decrypt('encrypt',$id);
			
		}
		
		function addUserDetails($data)
		{
			$dbCon = AppModel::createConnection();
			$domain_id= $this -> encrypt_decrypt('decrypt',$data['domain_id']);
			$selectedMarketplaceDetail=$this->selectedMarketplaceDetail($data);
			$url="https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=Q0ttUXIzdUxoVWJrdkFLbkpGNUo5d1JxY0hBY2FnbWtId2t3eFN4c0diZURCaDNvNHBFTElPZkJBdXZWY09uK3hIeElTalBqZFNvTmNJakRudUlUUEZEMnk4RTM1RmFwOGgvTGFZTENKTGs9";
			$surl=getShortUrl($url);
			if(isset($_POST['came_from']))
			{
				$came_from=$_POST['came_from'];
			}
			else
			{
				$came_from=7;
			}
			$stmt = $dbCon->prepare("select id,country_of_residence from user_logins where email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				
			$stmt = $dbCon->prepare("select user_logins.id,country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where country_of_residence=? and phone_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $_POST['country'],$_POST['pnumber']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCheck = $result->fetch_assoc();	
			if(!empty($rowCheck))
			{
			$stmt = $dbCon->prepare("update user_profiles   set phone_number='' where user_logins_id=?");
			$stmt->bind_param("i", $rowCheck['id']);
			$stmt->execute();	
			}
			$stmt = $dbCon->prepare("update user_visiting_countries   set phone_number='' where country_info=?  and phone_number=?");
			$stmt->bind_param("is", $_POST['country'],$_POST['pnumber']);
			$stmt->execute();	
			$rf=0;	
			$st=1;
			$data['random_hash'] = substr(md5(uniqid(rand(), true)), 16, 16);
			$stmt = $dbCon->prepare("INSERT INTO user_logins (first_name,last_name,registered_from,get_started_wizard_status,email,  email_verification_code , created_on , modified_on, country_of_residence,verification_status,user_came_from,domain_id ) VALUES (?, ?, ?, ?,   ?, ?, now(), now(), ?, ?,?,?)");
			$stmt->bind_param("ssiissiiii", $_POST['fname'], $_POST['lname'],$st,$st,$_POST['email'], $data['random_hash'], $_POST['country'],$rf,$came_from,$domain_id);
			$stmt->execute();
			$data['user_id']=$stmt->insert_id;
			
			$stmt = $dbCon->prepare("INSERT INTO user_profiles (user_logins_id,phone_number ) VALUES (?, ?)");
			$stmt->bind_param("is", $data['user_id'], $_POST['pnumber']);
			$stmt->execute();
			 
			}
			else
			{
			$data['user_id']=$row['id'];	
			}
			
			$subject='Welcome on Board';
			$to=$_POST['email'];
			$emailContent='<html><head></head><body><table width="100%" cellpadding="0" cellspacing="0" style="color:rgb(51,51,51);font-family:Helvetica;font-size:12px;font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:start;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;text-decoration:none;border-collapse:collapse;width:806px;margin:0px;padding:0px;background-color:rgb(245,243,235)"><tbody><tr><td align="center" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif"><table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;width:806px;margin:0px;padding:0px"><tbody><tr><td width="100%" cellpadding="5" cellspacing="0" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;padding:10px 0px"><table align="center" width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse"><tbody><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;text-align:center;font-size:12px;color:rgb(169,166,150)"></td></tr></tbody></table></td></tr><tr><td width="100%" cellpadding="0" cellspacing="0" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif"><table align="center" width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse;background-color:rgb(255,255,255)"><tbody><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;background-color:rgb(255,222,0);text-align:center;padding:30px 0px">
			<h2>'.$selectedMarketplaceDetail['marketplace_name'].'</h2>
			</td></tr>

<tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;padding:50px;background-color:rgb(255,255,255)"><h1 style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;margin:0px 0px 15px;color:rgb(51,51,51);font-weight:bold;font-size:21px;text-align:left">Hi '.$_POST['fname'].'<img data-emoji="??" class="an1" alt="??" aria-label="??" draggable="false" src="https://fonts.gstatic.com/s/e/notoemoji/15.0/1f44b/72.png" loading="lazy" style="width:25px; height:25px;"></h1><div><p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:24px;text-align:left;margin-top:0px;margin-bottom:25px;color:rgb(51,51,51);font-size:15px">Welcome to '.$selectedMarketplaceDetail['marketplace_name'].'! Your account is ready for action.

<span> </span>.</p><div style="margin-bottom:25px"><a href="https://www.qloudid.com/user/index.php/LoginAccount/emailLogin?redirect=Q0ttUXIzdUxoVWJrdkFLbkpGNUo5d1JxY0hBY2FnbWtId2t3eFN4c0diZURCaDNvNHBFTElPZkJBdXZWY09uK3hIeElTalBqZFNvTmNJakRudUlUUEZEMnk4RTM1RmFwOGgvTGFZTENKTGs9" style="color:rgb(255,255,255);text-decoration:none;box-sizing:border-box;border-width:10px 18px;border-style:solid;border-color:rgb(0,123,200);background-color:rgb(0,123,200);font-size:14px;display:inline-block;height:auto;border-radius:3px;text-align:center;font-weight:bold;padding:5px 10px;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.qloudid.com/public/index.php/UserCompanySignUp/signUpEmailInfo/V2l1eVdrVFdnKzZTQTgzRy96RXEzQT09 ">Login</a></div><div style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:24px;text-align:left;margin-top:0px;color:rgb(51,51,51);font-size:15px;margin-bottom:0px!important"><strong style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif">Get started
</strong><p>If button dont work. Then log in at '.$selectedMarketplaceDetail['marketplace_name'].' using this link.
</p>'.$surl.'
<span> </span><span> </span>

<p>Need help? Reach out anytime at [Support@qualeefy.com].
</p>
<p>Excited to have you on board!
</p>

</div></div></td></tr></tbody></table><table align="center" width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse;background-color:rgb(255,222,0);color:rgb(39,39,39)!important"><tbody><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;padding:10px 50px;background-color:rgb(53,57,66);color:rgb(255,255,255);border-top-width:0px"><div style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:24px;text-align:center;margin:0px;color:rgb(53,57,66);font-size:14px"><img data-emoji="??" class="an1" alt="??" aria-label="??" draggable="false" src="https://fonts.gstatic.com/s/e/notoemoji/15.0/1f48c/72.png" loading="lazy"><span> </span><a href="#" style="color:rgba(255,255,255,0.5);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="#">'.$selectedMarketplaceDetail['marketplace_name'].', Paseo de la Castellana 77 Madrid, M 28046</a></div></td></tr><tr style="padding:0px 50px;background-color:rgb(245,243,235);color:rgb(255,255,255)"><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;padding:25px 0px"><div style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:24px;text-align:center;margin:0px;color:rgb(169,166,150);font-size:14px"><a href="https://activecampaign.com/" style="color:rgb(169,166,150);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://activecampaign.com/&amp;source=gmail&amp;ust=1713578252654000&amp;usg=AOvVaw2s1Vhu798w4qnmBaf8YYYA">ActiveCampaign LLC</a>, 1 North Dearborn St, 5th Floor, Chicago, IL 60602</div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></body></html>';
					try {
						  sendEmail($subject, $to, $emailContent);
						}

					 catch(Exception $e) {
						$subject='Due to fake eamil account from '.$_POST['email'];
						 $to='kowaken.ghirmai@gmail.com';
						sendEmail($subject, $to, $emailContent);
					}
			$stmt->close();
			$dbCon->close();
			return $data['user_id'];
			
		}
	
	
	function addUserSellingCompany($data)
		{
			$dbCon = AppModel::createConnection();
			$domain_id= $this -> encrypt_decrypt('decrypt',$data['domain_id']);
			 
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
			$_POST['phone_number']=$_POST['pnumber'];
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
			if($_POST['signup_type']==1)
			{
				
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
				$name=htmlentities($_POST['company_name'],ENT_NOQUOTES, 'ISO-8859-1');
				$_POST['building_type']=1;
				$_POST['amenities_available']=1;
				$_POST['tenant_available']=1;
				$_POST['pricing_available']=1;
				$_POST['invoice_available']=1;
				$_POST['basement_available']=1;
				$_POST['penthouse_available']=1;
				$_POST['garage_available']=1;
				$_POST['vitech_region_id']=1;
				$_POST['vitech_city_id']=1;
				$_POST['vitech_area_id']=1;
				$company_id=$id;
				$street=htmlentities($_POST['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
				$city=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
				$stmt = $dbCon->prepare("insert into landloard_buildings (building_type,amenities_available,tenant_available,pricing_available,invoice_available,country_id,block_number,basement_available,penthouse_available,garage_available,vitech_region,vitech_city,vitech_area,company_id, building_name,street_address,city, state,latitude,longitude,total_ports,zipcode) values (?,?,?,?,?,?, ?,?, ?, ?,?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$stmt->bind_param("iiiiiisiiiiiiissssssis",$_POST['building_type'],$_POST['amenities_available'],$_POST['tenant_available'],$_POST['pricing_available'],$_POST['invoice_available'],$_POST['country'],$_POST['d_port_number'],$_POST['basement_available'],$_POST['penthouse_available'],$_POST['garage_available'],$_POST['vitech_region_id'],$_POST['vitech_city_id'],$_POST['vitech_area_id'], $company_id,$name,$street,$city,$response['address']['state'],$response[0]['lat'],$response[0]['lon'],$_POST['tports'],$_POST['dzip']);
				$stmt->execute();	
				$id=$stmt->insert_id;
			for($i=1;$i<=$_POST['tports'];$i++)
			{
			$elevator=1;
			$stmt = $dbCon->prepare("insert into landloard_building_ports (buildingid, port_number,total_floors,elevator_available) values (?, ?, ?, ?)");
			$stmt->bind_param("isii", $id,$i,$_POST['tfloors'],$elevator);
			$stmt->execute();	
			$id1=$stmt->insert_id;	
			for($j=1; $j<=$_POST['tfloors'];$j++)
			{
			$stmt = $dbCon->prepare("insert into landloard_building_port_floors(port_id, floor_number) values (?, ?)");
			$stmt->bind_param("ii", $id1,$j);
			$stmt->execute();	
			}
			
			}
			
			$stmt = $dbCon->prepare("select min(id) as port_id  from landloard_building_ports where buildingid=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();	
			$rowPort = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select *  from lanloard_building_amenity_info");
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowAvailable = $result->fetch_assoc())
			{
			if($rowAvailable['multi_port_available']==1)
			{
			$port_id=$rowPort['port_id'].',';
			}
			else
			{
			$port_id=$rowPort['port_id'];
			}
			$stmt = $dbCon->prepare("INSERT INTO landloard_building_amenities (building_id, amenity_id,port_id) VALUES (?, ?, ?)");
			$stmt->bind_param("iis", $id,$rowAvailable['id'],$port_id);
			$stmt->execute();	
			}
					
			}
			else if($_POST['signup_type']==2 && $data['user_signup_type']==2)
			{
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
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
			$stmt->bind_param("ii", $company_id,$domain_id);
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
			
			
			
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_selected_service_todos where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
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
			$stmt = $dbCon->prepare("insert into professional_company_selected_service_todos ( domain_id,professional_category_id,professional_subcategory_id,company_id, created_on, modified_on,is_selected) values (?,?, ?,?, now(), now(),?)");
			$stmt->bind_param("iiiii",$domain_id,$rowCategory['id'],$rowAmenities['id'],$company_id,$is_selected);
			$stmt->execute();
			 				
			}
			
			}
			
			}
			else
			{
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id not in(select professional_subcategory_id from  professional_company_selected_service_todos where company_id=? and domain_id=?)");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row= $result->fetch_assoc())
			{
				
			$stmt = $dbCon->prepare("insert into professional_company_selected_service_todos ( domain_id,professional_category_id,professional_subcategory_id,company_id, created_on, modified_on) values (?,?, ?,?, now(), now())");
			$stmt->bind_param("iiii",$domain_id,$row['professional_category_id'],$row['id'],$company_id);
			$stmt->execute();
			 				
			}
				$stmt = $dbCon->prepare("update professional_company_selected_service_todos set is_selected=1 where professional_subcategory_id=? and company_id=? and domain_id=?");
				$stmt->bind_param("iii",$_POST['objectType'],$company_id,$domain_id);
				$stmt->execute();
			}
			
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id=?");
			$stmt->bind_param("i", $_POST['objectType']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowService = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select count(id) as num from company_aboutus_content where company_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
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
			
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_suported_languages where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select *  from language_list");
			$stmt->execute();
			$result3 = $stmt->get_result();	
			while($rowAmenities= $result3->fetch_assoc())
			{
			
			$stmt = $dbCon->prepare("insert into professional_company_suported_languages (domain_id,language_id,company_id, created_on, modified_on) values (?,?,?, now(), now())");
			$stmt->bind_param("iii",$domain_id,$rowAmenities['id'],$company_id);
			$stmt->execute();
			 				
			}
			}
			
			
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_selected_areas where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select * from vitech_city");
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowCategory = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select *  from vitech_area where region_city_id=?");
			$stmt->bind_param("i", $rowCategory['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			while($rowAmenities= $result3->fetch_assoc())
			{
				 
			$stmt = $dbCon->prepare("insert into professional_company_selected_areas (domain_id, city_id,area_id,company_id, created_on, modified_on,is_selected) values (?,?, ?,?, now(), now(),?)");
			$stmt->bind_param("iiiii",$domain_id,$rowCategory['id'],$rowAmenities['id'],$company_id,$is_selected);
			$stmt->execute();
			 				
			}
			
			}
				
			}
			
			
			
			
			$stmt = $dbCon->prepare("select count(id) as num from cleaning_company_premium_account_request where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$this->sendPremiumAccountRequest($data);
			}
			$this->sendPricingLink($data);	
			}
			else if($_POST['signup_type']==2 && $data['user_signup_type']==3)
			{
				$this->companySignupMarketplaces($data);
				$this->sendUploadFileVerificationEmail($data);
			}
			$stmt->close();
			$dbCon->close();
			return $data['cid'];
			
		}
		
	function updateLicenceCompany($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$verifyIP = $this->verifyIP();
		    $stmt = $dbCon->prepare("update user_signup_licence_selected set ip_address='',company_id=? where  ip_address=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $company_id,$verifyIP);
			$stmt->execute();
			
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
	function sendUploadFileVerificationEmail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			
			$j=0;
			while($j==0)
			{
				$code=mt_rand(111111,999999); 
				$stmt = $dbCon->prepare("select verification_code from user_company_signup_marketplaces where company_id=? and domain_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("ii", $company_id,$domain_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
			 if($row['verification_code']==$code)
			 {
				 continue;
			 }
			 else
			 {
				 $j++;
			 }
			}
			
				
				$stmt = $dbCon->prepare("update user_company_signup_marketplaces set verification_code=? where id=?");
				
				$stmt->bind_param("ii",$code,$id);
				$stmt->execute();
			
			$to=$data['email'];
			$subject="Verify email";
			$emailContent='<html><head></head><body>


<table border="0" cellpadding="0" cellspacing="0" role="presentation" width="600" align="center" bgcolor="#FEFEFE" style="margin:0px auto;padding:0px;border:0px;border-collapse:collapse;width:600px;background-color:rgb(254,254,254)"><tbody><tr><td align="left" valign="top" style="padding-left:20px;padding-right:20px;text-align:left;vertical-align:top"><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td style="padding-left:20px;padding-right:20px"><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td align="left"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse"><tbody><tr><td valign="middle" style="font-size:20px;line-height:20px;font-weight:bold;vertical-align:middle"><a href="http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw3Fdh_8slomy-uTKO2Dq10h"><img src="https://ci3.googleusercontent.com/meips/ADKq_NaBI_6gkv7v7goJGIhVrzYso7ZttkAsiO-ZvK3-nCFChG7NCY4Gi8guMx1qGgIbsKgUGPl4aEF9DKKVv3_5Z4nmdS9JJ39_gU2rBJMmXrPSLW09ZpIqb0o9wC60wphQhQ=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/klarna-logo.png" alt="Klarna." width="98" height="40" border="0" style="display:block;outline:0px;width:98px;height:40px" class="CToWUd" data-bit="iit"></a></td></tr></tbody></table></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><h1 style="font-family:&quot;Klarna Display&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:36px;line-height:40px">Your 6-digit code</h1><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Hi there! Your 6-digit code is:</div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><h2 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:27px;line-height:30px">'.$code.'</h2><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Use this code to complete the verification process in the app or website.</div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Do not share this code. Qloud ID representatives will never reach out to you to verify this code over the phone or SMS.</div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px"><b>The code is valid for 10 minutes.</b></div></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td style="padding-left:20px;padding-right:20px"><h2 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:27px;line-height:30px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Support</font></font></h2><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td><h3 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:19px;line-height:25px">If you have any questions please contact us on</h3><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="5" style="font-size:5px;line-height:5px;height:5px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px"><a href="#" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:normal;font-size:16px;line-height:25px;text-decoration:underline!important" target="_blank" data-saferedirecturl="#">Customer Service</a></div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><h3 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:19px;line-height:25px">Want to learn more about us?</h3><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="5" style="font-size:5px;line-height:5px;height:5px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Visit our website at<span>&nbsp;</span><a href="#" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:normal;font-size:16px;line-height:25px;text-decoration:underline!important" target="_blank" data-saferedirecturl="#">https://www.qloudid.com</a></div></td></tr></tbody></table></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td style="padding-left:20px;padding-right:20px"><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="1" style="font-size:1px;line-height:1px;height:1px;background-color:rgb(238,238,238)">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse"><tbody><tr><td align="center" width="40" height="40" style="padding-right:5px"><a href="http://click.klarna.es/f/a/kBBj1AYp9jgiYKUYjz0LTA~~/AABVuwA~/RgRoNYYFP0QhaHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS9rbGFybmEvVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/kBBj1AYp9jgiYKUYjz0LTA~~/AABVuwA~/RgRoNYYFP0QhaHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS9rbGFybmEvVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw0uXWSCGG_grCLULW_dUVpd"><img src="https://ci3.googleusercontent.com/meips/ADKq_NbVH5I-tVL_aM-mt5JYLNklwUOCIxdpnGRWqh5oAERsamtp3mBW0EIIPWrivA4cLCKGknedoP3XF-sX6eKn1PRq4G0m5Svq060Ak-6lDpxzEoETv7tPVOyjvP654ogFRsQPhsZDoi7DYTDjerIsZMlXhNTw=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/lollipop/icons/footer/instagram.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40" style="padding-right:5px"><a href="http://click.klarna.es/f/a/szXxBZl_bjIkVNnJ9T0KWA~~/AABVuwA~/RgRoNYYFP0QeaHR0cHM6Ly93d3cudGlrdG9rLmNvbS9Aa2xhcm5hVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/szXxBZl_bjIkVNnJ9T0KWA~~/AABVuwA~/RgRoNYYFP0QeaHR0cHM6Ly93d3cudGlrdG9rLmNvbS9Aa2xhcm5hVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw37Rvp9S1T076Vx8sub7B4g"><img src="https://ci3.googleusercontent.com/meips/ADKq_Nb-5o3UYndP1zOh4Ej9HOQLv9y8p_iqPAEpko-6Ou2V8py_CzvVkf_flYetPmki20CvUnvqz-O5yqRPdjkaYJghmu9R7MmnL6wLW_r2hopYylQjR89DwLCmlRfgWNkrZBMHcHoPjqsYI7QQnVnTR3Uk=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.12/comms-platform/lollipop/icons/footer/tiktok.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40" style="padding-right:5px"><a href="http://click.klarna.es/f/a/aXJjQkBm9hMbJGgg_Ulg5g~~/AABVuwA~/RgRoNYYFP0QnaHR0cHM6Ly93d3cubGlua2VkaW4uY29tL2NvbXBhbnkva2xhcm5hVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/aXJjQkBm9hMbJGgg_Ulg5g~~/AABVuwA~/RgRoNYYFP0QnaHR0cHM6Ly93d3cubGlua2VkaW4uY29tL2NvbXBhbnkva2xhcm5hVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw3HNtBaRVhrbuQ7LybNdxsc"><img src="https://ci3.googleusercontent.com/meips/ADKq_Narh5WtNTQVK0ecV0Bkk2cxukxXzkc15Xo_bWiZD1L8xWKIslwqr-opbo414kzX8GL0q90xvuLcT2ynanniooJyvnBwHIJI0Fgp82_6IgyDmim0pBamR8tMZE3e8eP5pmKMDtQARu_zQYy7Ds4jMWvLdTY=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/lollipop/icons/footer/linkedin.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40" style="padding-right:5px"><a href="http://click.klarna.es/f/a/OWr5Q8XkPBQYIwoYsCdeDA~~/AABVuwA~/RgRoNYYFP0QaaHR0cHM6Ly90d2l0dGVyLmNvbS9LbGFybmFXBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/OWr5Q8XkPBQYIwoYsCdeDA~~/AABVuwA~/RgRoNYYFP0QaaHR0cHM6Ly90d2l0dGVyLmNvbS9LbGFybmFXBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw1aQS7b5ENj7MttadKGvEIe"><img src="https://ci3.googleusercontent.com/meips/ADKq_Na0Bikraixp5WMdKm0lV_f2hcw_zD3RYBpjVKvnPt-TjOxopC06s2v0iBEPCKGBo8eGlM-6gn_gzKQS9IhNaN_LqgRYC9zofUoPzHifG-4EflMD0jWffSZ7o5VEx2rnk2Vjj84ZbtLtbrFojg=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/lollipop/icons/footer/x.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40" style="padding-right:5px"><a href="http://click.klarna.es/f/a/mTv8X7Ll9HJv_kuhWaOi5g~~/AABVuwA~/RgRoNYYFP0QfaHR0cHM6Ly93d3cuZmFjZWJvb2suY29tL0tsYXJuYVcFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/mTv8X7Ll9HJv_kuhWaOi5g~~/AABVuwA~/RgRoNYYFP0QfaHR0cHM6Ly93d3cuZmFjZWJvb2suY29tL0tsYXJuYVcFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw22VCmNVXx8oiKpHRcSXC2q"><img src="https://ci3.googleusercontent.com/meips/ADKq_NZeVlLBwVC5BhHnilPrDenr4aSamGC_P59GTJ-fhhZxSpfSXN171N_R5PVhqtFjEfkqzqZ7kFqEesGKu4--hKiY2HY01r2LZqWxIcXIuTMJYcD4_WBbKaNFd7TBvNhPiHWH8nBeRi8Gp1uGH5fnZ4nGxAk=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/lollipop/icons/footer/facebook.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40"><a href="http://click.klarna.es/f/a/m8HHr_sT10BssSdRMkvJPw~~/AABVuwA~/RgRoNYYFP0QmaHR0cHM6Ly93d3cueW91dHViZS5jb20vS2xhcm5hT2ZmaWNpYWxXBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/m8HHr_sT10BssSdRMkvJPw~~/AABVuwA~/RgRoNYYFP0QmaHR0cHM6Ly93d3cueW91dHViZS5jb20vS2xhcm5hT2ZmaWNpYWxXBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw3CO2PeHslv9yIDLWxOb5e3"><img src="https://ci3.googleusercontent.com/meips/ADKq_NYofWUS-rn-gKW1ci3kTu7SEf6Dfxz8Cle-sLEcAsBO3jxp4r2ecyarpXCRtjeKpwp6k9Xw4-CAcAjKN8xz656hWnaxJ8V2JHPC5nFrcnDUUHX2rCxUec3i4DrIbk4DGP_3kLbCNzWPFCkt7P5TkU8wkQ=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.12/comms-platform/lollipop/icons/footer/youtube.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse"><tbody><tr><td valign="middle" style="font-size:20px;line-height:20px;font-weight:bold;vertical-align:middle"><a href="http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC&amp;source=gmail&amp;ust=1718337056153000&amp;usg=AOvVaw1fIc6r2xnvLp3QQldTLyXl"><img src="https://ci3.googleusercontent.com/meips/ADKq_NaBI_6gkv7v7goJGIhVrzYso7ZttkAsiO-ZvK3-nCFChG7NCY4Gi8guMx1qGgIbsKgUGPl4aEF9DKKVv3_5Z4nmdS9JJ39_gU2rBJMmXrPSLW09ZpIqb0o9wC60wphQhQ=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/klarna-logo.png" alt="Klarna." width="98" height="40" border="0" style="display:block;outline:0px;width:98px;height:40px" class="CToWUd" data-bit="iit"></a></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(85,85,85);font-weight:normal;font-size:14px;line-height:20px;margin-top:0px;margin-bottom:0px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Klarna Bank AB (publ) </font></font><br><span style="font-family:inherit!important;font-size:inherit!important;font-weight:inherit!important;line-height:inherit!important;color:inherit!important;text-decoration:none!important"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sveavägen 46 </font></font></span><br><span style="font-family:inherit!important;font-size:inherit!important;font-weight:inherit!important;line-height:inherit!important;color:inherit!important;text-decoration:none!important"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">111 34 Stockholm</font></font></span></div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><a href="http://click.klarna.es/f/a/BwaF5wds69zA8tnvdBlCuA~~/AABVuwA~/RgRoNYYFP0RMaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9lcy8_dXRtX21lZGl1bT1lbWFpbCZ1dG1fc291cmNlPWtsYXJuYS1jb21tcy1wbGF0Zm9ybVcFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(85,85,85);font-weight:normal;font-size:14px;line-height:20px;text-decoration:underline!important" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/BwaF5wds69zA8tnvdBlCuA~~/AABVuwA~/RgRoNYYFP0RMaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9lcy8_dXRtX21lZGl1bT1lbWFpbCZ1dG1fc291cmNlPWtsYXJuYS1jb21tcy1wbGF0Zm9ybVcFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~&amp;source=gmail&amp;ust=1718337056153000&amp;usg=AOvVaw0SKa0LmC2s7lI768Cb9uJU">klarna.com/es</a></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td></tr></tbody></table></td></tr></tbody></table></body></html>';

try {
				 sendEmail($subject, $to, $emailContent);
				  
						}

					catch(Exception $e) {
						$to      = 'kowaken.ghirmai@gmail.com';
						sendEmail($subject, $to, $emailContent);
					   
					}
		}
	
	
	
	function addProfessionalCompany($data)
		{
			$dbCon = AppModel::createConnection();
			$domain_id= $this -> encrypt_decrypt('decrypt',$data['domain_id']);
			if(isset($_POST['came_from']))
			{
				$came_from=$_POST['came_from'];
			}
			else
			{
				$came_from=7;
			}
			$stmt = $dbCon->prepare("select id,country_of_residence from user_logins where email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$rf=0;	
			$st=1;
			$data['random_hash'] = substr(md5(uniqid(rand(), true)), 16, 16);
			$stmt = $dbCon->prepare("INSERT INTO user_logins (first_name,last_name,registered_from,get_started_wizard_status,email,  email_verification_code , created_on , modified_on, country_of_residence,verification_status,user_came_from,domain_id ) VALUES (?, ?, ?, ?,   ?, ?, now(), now(), ?, ?,?,?)");
			$stmt->bind_param("ssiissiiii", $_POST['fname'], $_POST['lname'],$st,$st,$_POST['email'], $data['random_hash'], $_POST['country'],$rf,$came_from,$domain_id);
			$stmt->execute();
			$data['user_id']=$stmt->insert_id;
			}
			else
			{
				$_POST['country']=$row['country_of_residence'];
				$data['user_id']=$row['id'];
			}
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
			$_POST['phone_number']=$_POST['pnumber'];
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
			$data['email']=$email;
			$data['cid']=$this->encrypt_decrypt('encrypt',$id);
			if($_POST['signup_type']==1)
			{
				
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
				$name=htmlentities($_POST['company_name'],ENT_NOQUOTES, 'ISO-8859-1');
				$_POST['building_type']=1;
				$_POST['amenities_available']=1;
				$_POST['tenant_available']=1;
				$_POST['pricing_available']=1;
				$_POST['invoice_available']=1;
				$_POST['basement_available']=1;
				$_POST['penthouse_available']=1;
				$_POST['garage_available']=1;
				$_POST['vitech_region_id']=1;
				$_POST['vitech_city_id']=1;
				$_POST['vitech_area_id']=1;
				$company_id=$id;
				$street=htmlentities($_POST['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
				$city=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
				$stmt = $dbCon->prepare("insert into landloard_buildings (building_type,amenities_available,tenant_available,pricing_available,invoice_available,country_id,block_number,basement_available,penthouse_available,garage_available,vitech_region,vitech_city,vitech_area,company_id, building_name,street_address,city, state,latitude,longitude,total_ports,zipcode) values (?,?,?,?,?,?, ?,?, ?, ?,?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$stmt->bind_param("iiiiiisiiiiiiissssssis",$_POST['building_type'],$_POST['amenities_available'],$_POST['tenant_available'],$_POST['pricing_available'],$_POST['invoice_available'],$_POST['country'],$_POST['d_port_number'],$_POST['basement_available'],$_POST['penthouse_available'],$_POST['garage_available'],$_POST['vitech_region_id'],$_POST['vitech_city_id'],$_POST['vitech_area_id'], $company_id,$name,$street,$city,$response['address']['state'],$response[0]['lat'],$response[0]['lon'],$_POST['tports'],$_POST['dzip']);
				$stmt->execute();	
				$id=$stmt->insert_id;
			for($i=1;$i<=$_POST['tports'];$i++)
			{
			$elevator=1;
			$stmt = $dbCon->prepare("insert into landloard_building_ports (buildingid, port_number,total_floors,elevator_available) values (?, ?, ?, ?)");
			$stmt->bind_param("isii", $id,$i,$_POST['tfloors'],$elevator);
			$stmt->execute();	
			$id1=$stmt->insert_id;	
			for($j=1; $j<=$_POST['tfloors'];$j++)
			{
			$stmt = $dbCon->prepare("insert into landloard_building_port_floors(port_id, floor_number) values (?, ?)");
			$stmt->bind_param("ii", $id1,$j);
			$stmt->execute();	
			}
			
			}
			
			$stmt = $dbCon->prepare("select min(id) as port_id  from landloard_building_ports where buildingid=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();	
			$rowPort = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select *  from lanloard_building_amenity_info");
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowAvailable = $result->fetch_assoc())
			{
			if($rowAvailable['multi_port_available']==1)
			{
			$port_id=$rowPort['port_id'].',';
			}
			else
			{
			$port_id=$rowPort['port_id'];
			}
			$stmt = $dbCon->prepare("INSERT INTO landloard_building_amenities (building_id, amenity_id,port_id) VALUES (?, ?, ?)");
			$stmt->bind_param("iis", $id,$rowAvailable['id'],$port_id);
			$stmt->execute();	
			}
					
			}
			else if($_POST['signup_type']==2)
			{
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$company_id=$id;
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_selected_service_todos where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
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
				if($_POST['objectType']==$rowCategory['id'])
				{
					$is_selected=1;
				}
				else
				{
					$is_selected=0;
				}
			$stmt = $dbCon->prepare("insert into professional_company_selected_service_todos ( domain_id,professional_category_id,professional_subcategory_id,company_id, created_on, modified_on,is_selected) values (?,?, ?,?, now(), now(),?)");
			$stmt->bind_param("iiiii",$domain_id,$rowCategory['id'],$rowAmenities['id'],$company_id,$is_selected);
			$stmt->execute();
			 				
			}
			
			}
			
			}
			else
			{
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id not in(select professional_subcategory_id from  professional_company_selected_service_todos where company_id=? and domain_id=?)");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row= $result->fetch_assoc())
			{
				
			$stmt = $dbCon->prepare("insert into professional_company_selected_service_todos ( domain_id,professional_category_id,professional_subcategory_id,company_id, created_on, modified_on) values (?,?, ?,?, now(), now())");
			$stmt->bind_param("iiii",$domain_id,$row['professional_category_id'],$row['id'],$company_id);
			$stmt->execute();
			 				
			}
				$stmt = $dbCon->prepare("update professional_company_selected_service_todos set is_selected=1 where professional_category_id=? and company_id=? and professional_subcategory_id in (select professional_subcategory_id from professional_marketplace_service_todos where is_selected=1 and professional_category_id=? and marketplace_id=?)");
				$stmt->bind_param("iiii",$_POST['objectType'],$company_id,$_POST['objectType'],$domain_id);
				$stmt->execute();
			}
			
			
			
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_suported_languages where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select *  from language_list");
			$stmt->execute();
			$result3 = $stmt->get_result();	
			while($rowAmenities= $result3->fetch_assoc())
			{
			
			$stmt = $dbCon->prepare("insert into professional_company_suported_languages (domain_id,language_id,company_id, created_on, modified_on) values (?,?,?, now(), now())");
			$stmt->bind_param("iii",$domain_id,$rowAmenities['id'],$company_id);
			$stmt->execute();
			 				
			}
			}
			
			
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_selected_areas where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select * from vitech_city");
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowCategory = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select *  from vitech_area where region_city_id=?");
			$stmt->bind_param("i", $rowCategory['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			while($rowAmenities= $result3->fetch_assoc())
			{
				 
			$stmt = $dbCon->prepare("insert into professional_company_selected_areas (domain_id, city_id,area_id,company_id, created_on, modified_on,is_selected) values (?,?, ?,?, now(), now(),?)");
			$stmt->bind_param("iiiii",$domain_id,$rowCategory['id'],$rowAmenities['id'],$company_id,$is_selected);
			$stmt->execute();
			 				
			}
			
			}
				
			}
			
			
			
			
			$stmt = $dbCon->prepare("select count(id) as num from cleaning_company_premium_account_request where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$this->sendPremiumAccountRequest($data);
			$this->sendPricingLink($data);
			}
				
			}
			
			$stmt->close();
			$dbCon->close();
			return $data['cid'];
			
		}
		
		function sendPremiumAccountRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$domain_id= $this -> encrypt_decrypt('decrypt',$data['domain_id']); 
			$stmt = $dbCon->prepare("select count(id) as num from cleaning_company_premium_account_request where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("insert into cleaning_company_premium_account_request (domain_id,company_id, user_id, created_on, modified_on) values(?, ?, ?, now(), now())");
			/* bind parameters for markers */
			 
			$stmt->bind_param("iii",$domain_id, $company_id,$data['user_id']);
			$stmt->execute();
			
			$today=strtotime(date('Y-m-d'));
			$nextPay=strtotime("+1 month", $today);
			$stmt = $dbCon->prepare("update cleaning_company_premium_account_request set subscribed_on=?, last_payment_date=?, next_payment_date=?, is_paid=1   ,is_approved=1 where company_id=? and domain_id=?");
			$stmt->bind_param("sssii",$today,$today,$nextPay, $company_id,$domain_id);
			$stmt->execute();	
			}
			$stmt = $dbCon->prepare("select company_name from companies where id=?");
			$stmt->bind_param("i", $company_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$to            = 'kowaken.ghirmai@gmail.com';
			$subject       = "Premium Qualified request received!";
			$emailContent ='<html><head></head><body><div style="margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding:0">

<center style="width:100%;table-layout:fixed">

<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8" style="text-align:center">

<tbody><tr>

<td>

    <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8">

    <tbody><tr>

    <td>    

         <div style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:0px;padding-right:0px">

<table align="center" style="border-spacing:0;font-family:sans-serif;color:#f5f7f8;Margin:0 auto;width:100%" bgcolor="#F5F7F8">

       <tbody><tr>

<td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0" bgcolor="#F5F7F8">

        <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#f5f7f8" bgcolor="#F5F7F8">

            <tbody><tr>

               <td style="padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px;background-color:#f5f7f8;color:#f5f7f8;width:100%;font-size:1px;line-height:1px;text-align:left;display:none!important">

                 <p style="text-align:left;line-height:6px;Margin-top:0px;Margin-bottom:0px">Dina domäner är inställda på att förnyas automatiskt. Öppna det här e-postmeddelandet för att säkerställa att allt fortfarande är uppdaterat. Och glöm inte att du får 20 % rabatt på nya produkter. &nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;</p>

                 <div style="display:none;max-height:0px;overflow:hidden">

								&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;

								

								</div>

            </td>

            </tr>           

        </tbody></table>

    </td>

</tr>

 </tbody></table>

        </div>

        </td>

        </tr>

        </tbody></table>

    



<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

<tbody><tr><td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:20px">

<div style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:0px;padding-right:0px">





        

        </div>

        </td>

        </tr>

</tbody></table>



<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8">

    <tbody><tr>

    <td style="padding-bottom:20px">

         <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">



<table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px" bgcolor="#F5F7F8">

       <tbody><tr>

<td bgcolor="#F5F7F8" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

        <table width="73%" style="border-spacing:0;font-family:Audiowide;color:#111111" bgcolor="#F5F7F8">

            <tbody><tr>

                 <td style="padding-top:5px;padding-bottom:0;padding-right:0;padding-left:0px" align="left">

            <p style="font-size:30px; font-weight:normal; Audiowide;">Qloudid</p>

        </td>

            </tr>

            

        </tbody></table>

    </td>

    <td width="100%" bgcolor="#F5F7F8" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

        <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111" bgcolor="#F5F7F8">

            <tbody><tr>

                <td style="padding-top:10px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">

                 <p style="Margin-top:0px;margin-bottom:0px;font-size:13px;line-height:16px"><strong><a href="tel:077%20588%2080%2023" style="text-decoration:none;color:#111111" target="_blank">Website: <u></u>www.qloudid.com<u></u></a></strong></p>

                </td>

            </tr>

            <tr>

                <td style="padding-top:0px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">

                    <p style="Margin-top:5px;margin-bottom:0px;font-size:13px;line-height:16px">If you have any questions - <u></u>Contact us<u></u></p>

                </td>

            </tr>

        </tbody></table>

    </td>

</tr>

 </tbody></table>



        </div>

        </td>

        </tr>

        </tbody></table>



<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

    <tbody><tr>

	<td bgcolor="#F5F7F8" style="background-color:#f5f7f8;padding-top:0;padding-right:0;padding-left:0;padding-bottom:0">

		<div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">

			

			<table bgcolor="#FFFFFF" width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="font-family:sans-serif;color:#111111">

				<tbody><tr>

				<td bgcolor="#FFFFFF" align="left" style="padding-top:0px;padding-bottom:0;padding-right:0px;padding-left:0px;text-align:left;background-color:#ffffff;font-weight:bold;font-size:32px;line-height:42px">

                

					<div style="text-align: center; line-height: 22px; max-width: 600px;
    float: left;
    position: relative; ">
                        <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 red_ff2828_bg  brdb_new tall xs-nobrdb" style="max-width: 100%; background-color: #ff2828 !important;
width: 960px;
    position: relative;
    margin: 0 auto;




">
                           <div style="height: 250px; width: auto; max-width: 100%; padding-top: 100px; padding-right: 30px;
    padding-left: 30px; margin-right: auto;
    margin-left: auto;  z-index: 5; max-width: 100%; width: auto;">
                              <div class="padding-bottom: 40px; text-align: center; font-size: 45px;"><img src="http://www.qloudid.com/html/usercontent/images/doublecheck.png" width="45px;" height="45px;"></div>
                              <div class="padb0 xxs-padb0 ">
                                 <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:white;">Request</h1>
                              </div>
                              <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:white; font-size: 20px;">Premium qualified account has beed received from '.$row['company_name'].'</div>
                           </div>
                        </div>
                     </div>
                 

				</td>

				</tr>

			</tbody></table>

			

		</div>

	</td>

	</tr>

</tbody></table>



 






  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

     <tbody><tr>

        <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">

           <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">

              

                       <table bgcolor="#FFFFFF" align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;margin:0 auto;width:100%;max-width:600px">

                          <tbody><tr>

                             <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

                                <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">

                                   <tbody><tr>

                                      <td style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:left">

                                         <p style="margin-top:0px;line-height:0px;margin-bottom:0px;font-size:4px">&nbsp;</p>

                                      </td>

                                   </tr>

                                </tbody></table>

                             </td>

                          </tr>

                       </tbody></table>

                       

           </div>

        </td>

     </tr>

  </tbody></table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">



    <tbody><tr>



      <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">



        <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:40px;padding-right:20px">



          



          <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">



            <tbody><tr>



              <td width="20" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">



                <img src="https://ci3.googleusercontent.com/proxy/gvkyMPCroXxkwzdJ2Pg_KqgcjVeVgpVE1dRo8rYCiczuJe5UfJllf1ZtOFiYZsB4FzBoGeU7Xdso4PWQyUOj4qIrHsViEiUFA_KBQA=s0-d-e1-ft#http://imagesak.secureserver.net/promos/std/spc_trans.gif" height="30" width="20" border="0" style="display:block;border-width:0" class="CToWUd">



              </td>



              <td style="padding-top:0px;padding-bottom:0px;padding-right:0;padding-left:0;text-align:center;font-size:0;background-color:#ffffff">



                



                <div style="width:100%;max-width:560px;display:inline-block;vertical-align:top">



                  <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">



                    <tbody><tr>



                      <td style="padding-top:0px;padding-bottom:0px;padding-left:20px;padding-right:20px;background-color:#ffffff">



                        <table style="border-spacing:0;font-family:sans-serif;color:#111111;width:100%;font-size:14px;text-align:left;background-color:#ffffff;border-top-color:#e8eaeb;border-top-style:solid;border-top-width:1px">



                          <tbody><tr>



                            <td style="padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:10px;background-color:#ffffff;width:100%;text-align:left">



                              <table style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;table-layout:fixed">



                                <tbody><tr>


                                  <td style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;background-color:#ffffff;width:100%;text-align:center">



                                    <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px; fsz14px;">This is sent because your '.$row['company_name'].' have requested for Premium qualified account</p>



                                  </td>



                                </tr>



                                

                                                                  

 


 



        



      </tbody></table>



    </td>



  </tr>
 </tbody></table>



                            </td>



                          </tr>



                        </tbody></table>



                      </div></td>



                    </tr>



                  </tbody></table>



                </div>



                



              </td>



              <td width="20" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">



                <img src="https://ci3.googleusercontent.com/proxy/gvkyMPCroXxkwzdJ2Pg_KqgcjVeVgpVE1dRo8rYCiczuJe5UfJllf1ZtOFiYZsB4FzBoGeU7Xdso4PWQyUOj4qIrHsViEiUFA_KBQA=s0-d-e1-ft#http://imagesak.secureserver.net/promos/std/spc_trans.gif" height="30" width="20" border="0" style="display:block;border-width:0" class="CToWUd">



              </td>



            </tr>



          </tbody></table>



          



        



      </td>



    </tr>



  </tbody></table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

     <tbody><tr>

        <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">

           <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">

              

                       <table bgcolor="#F5F7F8" align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;margin:0 auto;width:100%;max-width:600px">

                          <tbody><tr>

                             <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

                                <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">

                                   <tbody><tr>

                                      <td style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#f5f7f8;width:100%;text-align:left">

                                         <p style="margin-top:0px;line-height:0px;margin-bottom:0px;font-size:4px">&nbsp;</p>

                                      </td>

                                   </tr>

                                </tbody></table>

                             </td>

                          </tr>

                       </tbody></table>

                       

           </div>

        </td>

     </tr>

  </tbody></table>



		

		

   

    </center>

</div></body></html>';
			sendEmail($subject, $to, $emailContent);
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		 function professionalTodoUpdate($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id not in(select professional_subcategory_id from  professional_company_selected_service_todos where company_id=? and domain_id=?)");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			
			$stmt = $dbCon->prepare("select *  from professional_service_subcategory where id=?");
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			$rowAmenities= $result3->fetch_assoc();
			$stmt = $dbCon->prepare("insert into professional_company_selected_service_todos ( professional_category_id,professional_subcategory_id,company_id,domain_id, created_on, modified_on) values (?, ?,?,?, now(), now())");
			$stmt->bind_param("iiii",$row['professional_category_id'],$row['id'],$company_id,$domain_id);
			$stmt->execute();
							
			}	
			
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		
		
		function approvedMarketplaces($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from professional_marketplace where id  in(select domain_id from  cleaning_company_premium_account_request where company_id=?)");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			array_push($org,$row);
							
			}	
			
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		 function professionalTodoCount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_selected_service_todos where company_id=?");
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
			$stmt = $dbCon->prepare("insert into professional_company_selected_service_todos ( professional_category_id,professional_subcategory_id,company_id, created_on, modified_on) values (?, ?,?, now(), now())");
			$stmt->bind_param("iii",$rowCategory['id'],$rowAmenities['id'],$company_id);
			$stmt->execute();
			 				
			}
			
			}				
			}	
			
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		function updateCategoryServiceTodo($data)
		{ 
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select is_selected,professional_category_id,domain_id,company_id from professional_company_selected_service_todos where id=?");
			$stmt->bind_param("i",$_POST['service_todo_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['is_selected']==0)
			{
			$is_selected=1;	
			}
			else
			{
				$is_selected=0;
			}
			$stmt = $dbCon->prepare("update professional_company_selected_service_todos set is_selected=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$is_selected,$_POST['service_todo_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_selected_service_todos where domain_id=? and professional_category_id=? and is_selected=1 and company_id=? and professional_subcategory_id in (select professional_subcategory_id from professional_marketplace_service_todos where is_selected=1 and marketplace_id=?)");
			$stmt->bind_param("iiii",$row['domain_id'],$row['professional_category_id'],$row['company_id'],$row['domain_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		
		
		function updateCategoryServiceAllTodos($data)
		{ 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("update professional_company_selected_service_todos set is_selected=1,modified_on=now() where company_id=? and professional_category_id=? and domain_id=?");
			$stmt->bind_param("iii", $company_id,$_POST['cleaning_subcategory_id'],$domain_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
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
			
			$stmt = $dbCon->prepare("select country_id,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,i_port_number,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
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
		
		
		function serviceTodoDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from professional_service_category where id in (select professional_category_id from professional_marketplace_service_todos where is_selected=1 and marketplace_id=?)");
			$stmt->bind_param("i",$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$j++;
				if($data['objectType']==$row['id'])
				{
					$block='block';
				}
				else
				{
					$block='none';
				}
				$stmt = $dbCon->prepare("select count(id)as num from professional_company_selected_service_todos where professional_category_id=? and is_selected=1 and company_id=? and domain_id=? and professional_subcategory_id in (select professional_subcategory_id from professional_marketplace_service_todos where is_selected=1 and marketplace_id=?)");
				$stmt->bind_param("iiii", $row['id'],$company_id,$domain_id,$domain_id);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$rowTodoSelectedCount = $result2->fetch_assoc();
				
				$org=$org.' <div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile'.$j.'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold"><div class="dflex wi_100">
									<div class="wi_70 dflex">
								<span class="css-p2kctj"><img src="https://www.qloudid.com/html/usercontent/images/kitchen5.svg" class="css-z0f999"></span> 
								<div>
								<span class="apartheading changedText" >'.str_ireplace('&','and',html_entity_decode($row['category_name'])).'</span><span class="aprtSubheading changedText" id="service'.$row['id'].'">'.$rowTodoSelectedCount['num'].' services selected</span>
								</div>
								</div> 
									<div class="wi_30 padt10">
															<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span>
									</div> 
									</div></a></div>
								<div id="profile'.$j.'" class=" " style="display: '.$block.';">	
										 
									  <div class="css-2998cc fleft padb20">
									<a href="javascript:void(0);" onclick="updateCategoryAmenities('.$row['id'].')"> <button color="#444444" data-testid="Kitchen-amenity-section-select-all" class="merlin-button css-7wfern" aria-label=""><div class="merlin-button__content changedText">Select all</div></button></a>
									  </div>
									  
									   <div class="clear"></div>
											<div id="'.$row['id'].'">';
		 	$stmt = $dbCon->prepare("select professional_company_selected_service_todos.id,is_selected,subcategory_name from professional_company_selected_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_company_selected_service_todos.professional_subcategory_id where professional_company_selected_service_todos.professional_category_id=? and professional_company_selected_service_todos.company_id=? and domain_id=? and professional_subcategory_id in (select professional_subcategory_id from professional_marketplace_service_todos where is_selected=1 and marketplace_id=?)");
			$stmt->bind_param("iiii", $row['id'],$company_id,$domain_id,$domain_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			while($row1 = $result1->fetch_assoc())
			{
				 
				if($row1['is_selected']==1)
				{
					$checked='checked';
					$update=0;
				}
				else
				{
					$checked='';
					$update=1;
				}
				$org=$org.' <div data-testid="'.$row1['subcategory_name'].'-amenity-item" class="css-39yi7y"><div class="css-nj7s2c"><label for="oven" class="css-14q70q0 changedText">'.str_ireplace('&','and',html_entity_decode($row1['subcategory_name'])).'</label><div class="css-1sjqbna">
				<a href="javascript:void(0);" onclick="updateAminity('.$row1['id'].','.$row['id'].');"><input data-testid="test-checkbox-'.$row1['subcategory_name'].'" name="'.$row1['subcategory_name'].'" type="checkbox" class="css-1lgzhz8" '.$checked.'></a>
				</div></div>';
				 
				$org=$org.'</div>';	
			}			
											
			$org=$org.'</div> </div> </div> ';
			 
			}
			  
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		function selectedAreaDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_selected_areas where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select * from vitech_city");
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowCategory = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select *  from vitech_area where region_city_id=?");
			$stmt->bind_param("i", $rowCategory['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			while($rowAmenities= $result3->fetch_assoc())
			{
				 
			$stmt = $dbCon->prepare("insert into professional_company_selected_areas (domain_id, city_id,area_id,company_id, created_on, modified_on,is_selected) values (?,?, ?,?, now(), now(),?)");
			$stmt->bind_param("iiiii",$domain_id,$rowCategory['id'],$rowAmenities['id'],$company_id,$is_selected);
			$stmt->execute();
			 				
			}
			
			}
				
			}
			
			
			$stmt = $dbCon->prepare("select * from vitech_city");
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$j++;
				 
				$stmt = $dbCon->prepare("select count(id)as num from professional_company_selected_areas where city_id=? and is_selected=1 and company_id=?  and domain_id=?");
				$stmt->bind_param("iii", $row['id'],$company_id,$domain_id);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$rowTodoSelectedCount = $result2->fetch_assoc();
				
				$org=$org.' <div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile'.$j.'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold"><div class="dflex wi_100">
									<div class="wi_70 dflex">
								<span class="css-p2kctj"><img src="https://www.qloudid.com/html/usercontent/images/kitchen5.svg" class="css-z0f999"></span> 
								<div>
								<span class="apartheading changedText">'.str_ireplace('&','and',html_entity_decode($row['city_name'])).'</span><span class="aprtSubheading changedText" id="service'.$row['id'].'">'.$rowTodoSelectedCount['num'].' areas selected</span>
								</div>
								</div> 
									<div class="wi_30 padt10">
															<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span>
									</div> 
									</div></a></div>
								<div id="profile'.$j.'" class=" " style="display: none;">	
										 
									  <div class="css-2998cc fleft padb20">
									<a href="javascript:void(0);" onclick="updateCategoryAmenities('.$row['id'].')"> <button color="#444444" data-testid="Kitchen-amenity-section-select-all" class="merlin-button css-7wfern" aria-label=""><div class="merlin-button__content">Select all</div></button></a>
									  </div>
									  
									   <div class="clear"></div>
											<div id="'.$row['id'].'">';
		 	$stmt = $dbCon->prepare("select professional_company_selected_areas.id,is_selected,area_name from professional_company_selected_areas left join vitech_area on vitech_area.id=professional_company_selected_areas.area_id where professional_company_selected_areas.city_id=? and professional_company_selected_areas.company_id=?  and domain_id=?");
			$stmt->bind_param("iii", $row['id'],$company_id,$domain_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			while($row1 = $result1->fetch_assoc())
			{
				 
				if($row1['is_selected']==1)
				{
					$checked='checked';
					$update=0;
				}
				else
				{
					$checked='';
					$update=1;
				}
				$org=$org.' <div data-testid="'.$row1['area_name'].'-amenity-item" class="css-39yi7y"><div class="css-nj7s2c"><label for="oven" class="css-14q70q0 changedText">'.str_ireplace('&','and',html_entity_decode($row1['area_name'])).'</label><div class="css-1sjqbna">
				<a href="javascript:void(0);" onclick="updateAminity('.$row1['id'].','.$row['id'].');"><input data-testid="test-checkbox-'.$row1['area_name'].'" name="'.$row1['area_name'].'" type="checkbox" class="css-1lgzhz8" '.$checked.'></a>
				</div></div>';
				 
				$org=$org.'</div>';	
			}			
											
			$org=$org.'</div> </div> </div> ';
			 
			}
			  
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
	function updateArea($data)
		{ 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select is_selected from professional_company_selected_areas where id=?");
			$stmt->bind_param("i", $_POST['area_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();
			if($row1['is_selected']==1)
			{
			$is_selected=0;	
			}
			else
			{
			$is_selected=1;	
			}
			$stmt = $dbCon->prepare("update professional_company_selected_areas set is_selected=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$is_selected,$_POST['area_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select count(id) as num  from professional_company_selected_areas where is_selected=1 and city_id=? and company_id=? and domain_id=?");
			$stmt->bind_param("iii", $_POST['update_info'],$company_id,$domain_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row1['num'];
		}
		
		
		function updateAllArea($data)
		{ 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("update professional_company_selected_areas set is_selected=1,modified_on=now() where company_id=? and city_id=? and domain_id=?");
			$stmt->bind_param("iii", $company_id,$_POST['city_id'],$domain_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
	
	}		