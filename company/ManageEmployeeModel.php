<?php
	require_once('../AppModel.php');
	
	class ManageEmployeeModel extends AppModel
	{
		function dishesList($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
			}
			$dbCon = AppModel::createConnection();
			$selected_dish=explode(',',$data['warnings']);
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,dish_name,dish_detail,dish_price,dish_image from dishes_detail_information where company_id=? and dish_type!=1 and is_physical=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
					if (in_array($row['id'], $selected_dish))
						{
						$row['is_selected']= 1;
						}
						else
						{
						$row['is_selected']= 0;	
						}
				 $filename="../estorecss/".$row ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['dish_image'].'.jpg' );  $imgs='../../'.$imgs; } else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; } 
				array_push($org,$row);
				$org[$j]['dish_image']=$imgs;
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function checkPermission($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,is_admin from manage_employee_permissions where user_id=? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $data['user_id'],$company_id);
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
				if($row['is_admin']==0)
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
		
		function updateWorkingTimeInfo($data)
		{
			$dbCon = AppModel::createConnection();
			  
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			for($i=1;$i<=7;$i++)
				{
					$working_day='working_day_'.$i;
					$work_start_time='work_start_time_'.$i;
					$work_end_time='work_end_time_'.$i;
					$lunch_time='lunch_time_'.$i;
					$lunch_start_time='lunch_start_time_'.$i;
					$lunch_end_time='lunch_end_time_'.$i;
				$stmt = $dbCon->prepare("update employee_working_hrs set `working_day`=? , `work_start_time`=? , `work_end_time`=? , `lunch_time`=?  , `lunch_start_time`=? , `lunch_end_time`=?, modified_on=now() where day_id=? and employee_id=?");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("iiiiiiii",$_POST[$working_day],$_POST[$work_start_time],$_POST[$work_end_time],$_POST[$lunch_time],$_POST[$lunch_start_time],$_POST[$lunch_end_time],$i,$employee_id);
				$stmt->execute();	
				}
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		
		function countWorkingTimeInfo($data)
		{
			$dbCon = AppModel::createConnection();
			  
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select count(day_id) as num from employee_working_hrs where employee_id=? and working_day=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i",$employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
		 
			
			$stmt->close();
			$dbCon->close();
			return $row['num'];
			
		}
		
		function employeeWorkDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']); 
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select count(day_id) as num from employee_working_hrs where employee_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i",$employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if($row['num']==0)
			{
				for($i=1;$i<=7;$i++)
				{
				$stmt = $dbCon->prepare("insert into employee_working_hrs (company_id,day_id,employee_id,created_on,modified_on) values(?, ?, ?,now(),now())");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("iii",$company_id,$i,$employee_id);
				$stmt->execute();	
				}
			
			}
			
			$stmt = $dbCon->prepare("select day_name,`day_id` ,`working_day` , `work_start_time` , `work_end_time` , `lunch_time`  , `lunch_start_time` , `lunch_end_time`  from employee_working_hrs left join day_detail on day_detail.id=employee_working_hrs.day_id where employee_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i",$employee_id);
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
		
		
		function updateAdmin($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id from companies where user_login_id=? and id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $data['user_id'],$company_id);
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
			$stmt = $dbCon->prepare("select id,permission from manage_employee_permissions where user_id=? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $data['user_id'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
			$stmt = $dbCon->prepare("select id,user_login_id from employees where company_id=? and user_login_id not in (select user_id from manage_employee_permissions where company_id=?)");
			/* bind parameters for markers */
			
			$stmt->bind_param("ii",$company_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into manage_employee_permissions (user_id,company_id,created_date,modified_date,employee_id) values(?, ?, ?, now(),now(),?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iii",$row['user_login_id'],$company_id,$row['id']);
			$stmt->execute();
			}
			}
			else
			{
			$stmt = $dbCon->prepare("select id,user_login_id from employees where company_id=? and user_login_id=?");
			/* bind parameters for markers */
			
			$stmt->bind_param("ii",$company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
		
		
			$stmt = $dbCon->prepare("insert into manage_employee_permissions (is_admin, employee_id, permission, user_id, company_id,  created_date, modified_date ) values( ?, ?, ?, ?, ?, now(),now())");
			/* bind parameters for markers */
			$cont=1;
			
		
			$stmt->bind_param("iiiii",$cont,$row['id'],$cont,$data['user_id'],$company_id);
			$stmt->execute();
			$stmt = $dbCon->prepare("select id,user_login_id from employees where company_id=? and user_login_id not in (select user_id from manage_employee_permissions where company_id=?)");
			/* bind parameters for markers */
			
			$stmt->bind_param("ii",$company_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into manage_employee_permissions (user_id,company_id,created_date,modified_date,employee_id) values(?, ?, now(),now(),?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iii",$row['user_login_id'],$company_id,$row['id']);
			$stmt->execute();
			}
			}
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			
			}
			
		
		
		
		function addQloudEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			//print_r($_POST); die;
			$stmt = $dbCon->prepare("select id,user_login_id from companies where company_email=?");
			
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("s", $_POST['company_email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$user_login_id=$row['user_login_id'];
			$company_id=$row['id'];
			
			$stmt = $dbCon->prepare("select company_id from oauth_clients where client_secret=?");
			
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("s", $_POST['client_secret']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			//print_r($row); die;
			if(!empty($row))
			{
				$stmt = $dbCon->prepare("select company_name from companies where id=?");
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$result_name = $result->fetch_assoc();
				
				$company_p=strip_tags($_POST['company_p']);
				
				$contact_p= strip_tags($_POST['contact_p']); 
				$contact_email_p=strip_tags($_POST['contacte_p']);
				
				$day_p=strip_tags($_POST['day_p']); if($day_p=="" || $day_p==null ) { $day_p=0; }
				$month_p=strip_tags($_POST['month_p']); if($month_p=="" || $month_p==null) { $month_p=0; }
				$year_p=strip_tags($_POST['year_p']); if($year_p=="" || $year_p==null) { $year_p=0; }
				$sex_p=strip_tags($_POST['sex_p']);	
				if($sex_p==" " || $sex_p==null)
				{
					$sex_p=0;
				}
				$mobile_p=	strip_tags($_POST['mobile_p']);
				$telephone=strip_tags($_POST['tel']);
				$zip=strip_tags($_POST['zip']);
				$address=strip_tags($_POST['add']);
				$country=strip_tags($_POST['country']);
				$city=strip_tags($_POST['city']);
				$state=strip_tags($_POST['state']);
				$marital_status=strip_tags($_POST['marital_status']);
				$blog="";
				$skype="";
				$linkedln="";
				$facebook="";
				$twitter="";
				$instagram="";
				$date=date('Y-m-d');
				$ssn=strip_tags($_POST['ssn']);
				$e_number=strip_tags($_POST['e_number']);
				//$desc=addslashes(strip_tags($_POST['desc']));
				//$title=strip_tags($_POST['title']);
				//$department=strip_tags($_POST['department']);
				$phone=strip_tags($_POST['phone']);
				$mobile=strip_tags($_POST['mobile']);
				$email=strip_tags($_POST['email']);
				$i_street="";
				$i_town="";
				$i_city="";
				$i_zip="";
				$i_country="";
				$d_street="";
				$d_town="";
				$d_city="";
				$d_zip="";
				$d_country="";
				$b_member="";
				$mentor="";
				$c_id="";
				$prospect="";
				$partner="";
				$supplier="";
				//$location=strip_tags($_POST['locati']);
				//$e_type=strip_tags($_POST['e_type']);
				$s_date=strip_tags($_POST['s_date']);
				$r_date=strip_tags($_POST['r_date']);
				$nation=strip_tags($_POST['nation']);
				//$job_family=$_POST['job_family'];
				// $job_function=$_POST['job_function'];
				$per=$_POST['permision'];
				//$per=2;
				if($s_date=="" || $s_date==null)
				{
					$h_date=null;
				}
				else
				{
					$h_date=date('Y-m-d',strtotime($s_date));
					
				}
				if($r_date=="")
				{
					$res_date=null;		
				}
				else
				{
					$res_date=date('Y-m-d',strtotime($r_date));
					
				}
				$st=1;
				$d=date('Y-m-d');
				$stmt = $dbCon->prepare("insert into estore_employee_invite(created_by,mobile_p,company_id,name,last_name,email,work_email,phone,created_user,first_name_p,last_name_p,email_p,sex_p,dob_day_p,dob_month_p,dob_year_p,created_date) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");	
				$stmt->bind_param("isisssssisssiiiis", $user_login_id,$mobile_p,$company_id,$company_p,$contact_p,$contact_email_p,$email,$phone,$st,$company_p,$contact_p,$contact_email_p,$sex_p,$day_p,$month_p,$year_p,$d);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("select id,title,email,work_email from estore_employee_invite where company_id=? and created_date=? and created_user=? and email=? and work_email=?");
				
				$stmt->bind_param("isiss", $company_id,$d,$st,$contact_email_p,$email);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				//print_r($row); die;
				$user_id=$row['id'];
				$in_id=$this -> encrypt_decrypt('encrypt',$row['id']);
				$stmt = $dbCon->prepare("insert into invitation(invited_user_id,created_date,unique_id) values (?, ?, ?)");
				$stmt->bind_param("iss", $row['id'],$d,$_POST['unique_id']);
				$stmt->execute();
				$stmt = $dbCon->prepare("insert into virtual_user_company_profile (`company_id`,`invited_user_id`) values (?, ?)") ;
				$stmt->bind_param("ii", $company_id,$user_id);
				$stmt->execute();
				
				$stmt = $dbCon->prepare('update virtual_user_company_profile set company_permission=?,h_date=?,res_date=?,phone=?,mobile=?,email=?
				,ssn=?, e_number=?,description_job=?,i_street=?,i_town=?,i_city=?
				,i_zip=?, i_country=?,d_street=?, d_town=?, d_city=?,d_zip=?,d_country=?
				, b_member=?, mentor=?, c_id=?, prospect=?,partner=?,supplier=? where invited_user_id=? and company_id=?');
				$stmt->bind_param("issssssssssssssssssssssssii", $per,$h_date,$res_date,$phone,$mobile,$email,$ssn,$e_number,$desc,$i_street,$i_town,$i_city,$i_zip,$i_country,$d_street,$d_town,$d_city,$d_zip,$d_country,$b_member,$mentor,$c_id,$prospect,$partner,$supplier,$user_id,$company_id);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("insert into virtual_user_profiles (`invited_user_id`,`created_on`,`modified_on`) values (?, ?, ?)");
				$stmt->bind_param("iss", $user_id,$d,$d);
				$stmt->execute();
				
				$stmt = $dbCon->prepare('update virtual_user_profiles set instagram=?,twitter=?,facebook=?,linkedln=?,skype=?,blog=?,marital_status=?,phone_number=?,zipcode=?,address=?,country=?,
				state=?,city=?,modified_on=?,nation=? where invited_user_id=?');
				$stmt->bind_param("sssssssssssssssi", $instagram,$twitter,$facebook,$linkedln,$skype,$blog,$marital_status,$telephone,$zip,$address,$country,$state,$city,$d,$nation,$user_id);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where company_id=?");
				
				/* bind parameters for markers */
				
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_invited = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where company_id=? and real_employee_id is not null");
				
				/* bind parameters for markers */
				
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_invited_approved = $result->fetch_assoc();
				
				
				$stmt = $dbCon->prepare("select count(id) as num from employee_request_cloud where company_id=?");
				
				/* bind parameters for markers */
				
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_request = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("select count(id) as num from employee_request_cloud where company_id=? and is_approved=1");
				
				/* bind parameters for markers */
				
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_request_approved = $result->fetch_assoc();
				
				$total_request=$row_invited['num']+$row_request['num'];
				$total_request_approved=$row_invited_approved['num']+$row_request_approved['num'];
				$completed=($total_request_approved/$total_request)*100;
				$completed=round($completed,0);
				
				$stmt = $dbCon->prepare("update company_profiles set completed_requests=? where company_id=?");
				
				/* bind parameters for markers */
				
				$stmt->bind_param("ii", $completed,$company_id);
				$stmt->execute();
				
				$stmt->close();
				$dbCon->close();
				//echo $row['id'].'qloud'; die;
				return $row['id'];
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			
			
			
		}
		
		function updateQloudData()
		{
			$dbCon = AppModel::createConnection();
			$org=array();
			$stmt = $dbCon->prepare("select id,user_login_id,company_id from employees where company_id=(select id from companies where company_email=?) and user_login_id=(select id from user_logins where email=?)");
			
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("ss", $_POST['company_email'],$_POST['user_email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			//print_r($_POST); die;
			if(empty($row))
			{
				$stmt->close();
				$dbCon->close();
				$org['out']=0;
				return json_encode($org,true);
			}
			else
			{
				$stmt = $dbCon->prepare("select data_request from user_company_profile where user_login_id=? and company_id=?");
				$stmt->bind_param("ii", $row['user_login_id'],$row['company_id']);
				
				$stmt->execute();
				$result_request = $stmt->get_result();
				$row_request = $result_request->fetch_assoc();
				if($row_request['data_request']==0)
				{
					$stmt->close();
					$dbCon->close();
					$org['out']=0;
					return json_encode($org,true);
				}
				
				
				$org['user_detail']=array();
				$org['user_profile']=array();
				$org['user_company_profile']=array();
				$stmt = $dbCon->prepare("select first_name,last_name,sex,dob_day_p,dob_month_p,dob_year_p,dob_day,dob_month,dob_year from user_logins where id=?");
				
				/* bind parameters for markers */
				$cont=0;
				$stmt->bind_param("i", $row['user_login_id']);
				$stmt->execute();
				$result_user = $stmt->get_result();
				$row_user = $result_user->fetch_assoc();
				$org['user_detail']=$row_user;
				$stmt = $dbCon->prepare("select zipcode,city,address,state,country,nation,phone_number,marital_status,mobile_p,ssn from user_profiles where user_logins_id=?");
				
				/* bind parameters for markers */
				$cont=0;
				$stmt->bind_param("i", $row['user_login_id']);
				$stmt->execute();
				$result_user_profile = $stmt->get_result();
				$result_user_profile = $result_user_profile->fetch_assoc();
				$org['user_profile']=$result_user_profile;
				
				$stmt = $dbCon->prepare("select phone,mobile,email,h_date,res_date,ssn,e_number from user_company_profile where user_login_id=? and company_id=?");
				
				/* bind parameters for markers */
				$cont=0;
				$stmt->bind_param("ii", $row['user_login_id'],$row['company_id']);
				$stmt->execute();
				$result_user_profile = $stmt->get_result();
				$result_user_profile = $result_user_profile->fetch_assoc();
				$org['user_company_profile']=$result_user_profile;
				$org['out']=1;
				//print_r($org); die;
			}
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return json_encode($org,true);
			
			
			
			
		}
		
		function profileInfo($data)
		{
			$dbCon = AppModel::createConnection();
			//  print_r($data); die;
			$stmt = $dbCon->prepare("select r_email,user_employements.id as cv_com_id,company_name,location,title,duration_start_month,duration_start,duration_end_month,duration_end,current_job,description
			from user_employements where user_employements.user_logins_id =? AND user_employements.is_deleted=? order by duration_end desc,duration_end_month desc,duration_start desc");
			
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("ii", $data['id'],$cont);
			$stmt->execute();
			$result = $stmt->get_result();
			$expr=array();
			$i=0;
			function month_s($value)
			{
				if($value==1)
				{
					return "January";
				}
				else if($value==2)
				{
					return "February";
				}
				else if($value==3)
				{
					return "March";
				}
				else if($value==4)
				{
					return "April";
				}
				else if($value==5)
				{
					return "May";
				}
				else if($value==6)
				{
					return "June";
				}
				else if($value==7)
				{
					return "July";
				}
				else if($value==8)
				{
					return "August";
				}
				
				else if($value==9)
				{
					return "September";
				}
				else if($value==10)
				{
					return "October";
				}
				else if($value==11)
				{
					return "November";
				}
				else if($value==12)
				{
					return "December";
				}
			}
			
			while($row = $result->fetch_assoc())
			{
				
				
				if($row['duration_end'] == '2100')
				{ $end='still working';  $current="Current"; } else { $end= strip_tags(month_s($row['duration_end_month']))." ".strip_tags($row['duration_end']); $current=$row['duration_end']; }
				$row['description']=strip_tags($row['description'],'\r');
				$expr[$i]['id']=$row['cv_com_id'];
				$expr[$i]['title']=$row['title'].' @ '.$row['company_name'];
				$expr[$i]['short_description']=strip_tags(month_s($row['duration_start_month']))." ".strip_tags($row['duration_start'])." - ".$end." | ".strip_tags($row['location']);
				$expr[$i]['description']=strip_tags($row['description'],'\n');
				$expr[$i]['year']=$current;
				$i++;
			}
			$expr= json_encode($expr);
			$expr=str_replace('\r','',$expr);
			$expr=str_replace('\n','',$expr);
			$educa=array();
			
			$stmt = $dbCon->prepare("select user_educations.id,country.country_name,duration,country.id as c_id,school.name as school,school.id as s_id, class.name as degree,class.id as cl_id,field,grade,duration_start,duration_end,activities,description 
			from user_educations left join country on user_educations.country_id=country.id left join school on user_educations.school=school.id left join class on user_educations.degree=class.id where user_logins_id = ?  AND user_educations.is_deleted=0 order by duration_start desc");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				
				$educa[$i]['id']=$row['id'];
				$educa[$i]['title']=strip_tags($row['degree'],'\r').' @ '.iconv("UTF-8", "ISO-8859-1//IGNORE",$row['school']);
				$educa[$i]['short_description']=$row['duration_start']." - ".$row['duration_end'];
				$educa[$i]['year']=$row['duration_start'];
				$i++;
			}
			$educa= json_encode($educa);
			$educa=str_replace('\r','',$educa);
			$lang=array();
			
			$stmt = $dbCon->prepare("select user_language.id,c_id,level_id,country_name from user_language left join country on user_language.c_id=country.id where user_login_id=?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				
				$lang[$i]['id']=$row['id'];
				$lang[$i]['title']=html_entity_decode($row['country_name']);
				$lang[$i]['short_description']=$row['level_id'];
				$i++;
			}
			$lang= json_encode($lang);
			
			
			$lice=array();
			
			$stmt = $dbCon->prepare("select id,lice_id from user_licence where user_login_id=?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				
				$lice[$i]['id']=$row['id'];
				$lice[$i]['title']='Licence';
				$lice[$i]['short_description']='Yes';
				$i++;
			}
			$lice= json_encode($lice);
			
			
			$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image,summary,user_logins_id from user_profiles left join user_logins on user_logins.id=user_profiles.user_logins_id where user_logins_id =?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			function base64_to_jpeg($base64_string, $output_file) {
				
				$ifp = fopen( $output_file, 'wb' ); 
				
				
				$data = explode( ',', $base64_string );
				
				fwrite( $ifp, base64_decode( $data[1] ) );
				
				
				fclose( $ifp ); 
				
				return $output_file; 
			}
			$i=0;
			if($row ['passport_image']!=null) { $value_a=base64_to_jpeg(file_get_contents("../estorecss/".$row['passport_image'].".txt"),'../estorecss/tmp'.$i.'.jpg'); $value_a=str_replace('"','',$value_a); } else $value_a="../../../../../usercontent/images/default-profile-pic.jpg"; 
			$r['status'] = 'ok';
			$r['message'] = [
			'job' => [
			'description' => 'We are looking for a very good web developer to do random tasks',
			'match' => '1 of 8 Best Match',
			'best_match' => 'Best match',
			],
			
			'user' => [
			'id' => $row['user_logins_id'],
			'name' => $row['name'],
			'avatar' => '../../../'.$value_a,
			'description' => 'Front-End Developer',
			'location' => 'Saint Petersburg, Russia',
			'time' => [
			'full' => '10:58 fm local time - 3 hrs behind',
			'short' => '10:58 fm',
			],
			'rate' => [
			'amount' => '$17.00',
			'period' => 'hr',
			],
			'jobs' => '0',
			'hours' => '0',
			'rising_talent' => 'Rising talent',
			'skills' => [
			'inline' => ['jQuery','HTML5','CSS3','PHP'],
			'inlne_more' => ['PSD to HTML','PSD to WordPress','WordPress']
			]
			],
			'sections' => [[
			'label' => 'Cover letter',
			'content' => [
			'html' => 'Hi! Thank you for your invitation!<br> I am ready to discuss the scope of your project.<br> When can we do it?',
			'more' => 'Hi! Thank you for your invitation!<br> I am ready to discuss the scope of your project.<br> When can we do it?',
			],
			],[
			'label' => 'Skills',
			'content' => [
			'inline' => ['jQuery','HTML5','CSS3','PHP'],
			'inlne_more' => ['PSD to HTML','PSD to WordPress','WordPress']
			],
			'class' => 'dnone xxs-dblock'
			],[
			'tag' => 'overview',
			'label' => 'Professional summary ',
			'content' => [
			'html' => '<p> '.substr(strip_tags($row['summary']),0,250).'</p>',
			'more' => '<p>'.substr(strip_tags($row['summary']),250,1000).'</p>',
			],
			'class' => 'dnone xxs-dblock'
			],[
			'label' => 'Experience Summary',
			'timeline' => [$expr],
			],[
			'label' => 'Educational Summary',
			'timeline' => [$educa],
			],[
			'label' => 'Language',
			'timeline' => [$lang],
			],[
			'label' => 'Driving Licence',
			'timeline' => [$lice]
			]]
			];
			$r=json_encode($r);
			$r=str_replace('\"','"',$r);
			$r=str_replace('}"','}',$r);
			$r=str_replace('"{','{',$r);
			$r=str_replace(']"]',']',$r);
			$r=str_replace('["[','[',$r);
			//print_r($r); die;
			exit($r);
		}
		
		function updatePermission()
		{
			$dbCon = AppModel::createConnection();
			$cid=explode('_',$_POST['cid']);
			if($cid['0']=='v')
			{
				$stmt = $dbCon->prepare('update virtual_user_company_profile set company_permission=? where invited_user_id=?');
				$stmt->bind_param("ii", $_POST['per'],$cid['1']);
				$stmt->execute();
			}
			else if($cid['0']=='a')
			{
				$stmt = $dbCon->prepare('update user_company_profile set company_permission=? where user_login_id=(select user_login_id from employees where id=?)  and company_id=(select company_id from employees where id=?)');
				$stmt->bind_param("iii", $_POST['per'],$cid['1'],$cid['1']);
				$stmt->execute();
			}
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function jobFamily($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id, job_function from job_function_vacancy where job_family_id=?");
			$stmt->bind_param("i", $data['jid']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$output = '<option value="">Select</option>';
			while($row = $result->fetch_assoc())
			{
				$output = $output. "<option value=". $row['id'].">". $row['job_function'] ."</option>";
			}
			$stmt->close();
			$dbCon->close();
			return $output;
		}
		
		function jobFunction($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id, job_position from job_position where job_function_id=?");
			$stmt->bind_param("i", $data['jid']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$output = '<option value="">Select</option>';
			while($row = $result->fetch_assoc())
			{
				$output = $output. "<option value=". $row['id'].">". $row['job_position'] ."</option>";
			}
			$stmt->close();
			$dbCon->close();
			return $output;
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
			
			$stmt = $dbCon->prepare("select companies.country_id,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
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
		
		function employerSummary($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id from employees where user_login_id = ? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $data['user_id'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $this -> encrypt_decrypt('encrypt',$row['id']);
			
			
		}
		
		
		function employeeServices($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select services_available from employees where id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i",$employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['services_available'];
			
			
		}
		
		 function updateServicesInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$dishes=substr($_POST['available_dishes'],0,-1);
			$stmt = $dbCon->prepare("update employees set services_available=? where id=?");
			$stmt->bind_param("si",$dishes,$employee_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function countryList()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select id,country_name from country where id>0");
			
			
			$stmt->execute();
			$result = $stmt->get_result();
			$option="<option value='' >Choose your country</option>";
			while($row=mysqli_fetch_array($result))
			{
				if($row['id']==201)
				{
					$option=$option."<option value=".$row['id']." selected='selected'>".$row['country_name']."</option>";
				}
				else
				{
					$option=$option."<option value=".$row['id'].">".$row['country_name']."</option>";
				}
			}
			$stmt->close();
			$dbCon->close();
			return $option;
		}
		
		function locationList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,location from location where company_id=?");
			
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$option="<option value='' >Choose your location</option>";
			while($row=mysqli_fetch_array($result))
			{
				
				$option=$option."<option value=".$row['id'].">".$row['location']."</option>";
				
			}
			$stmt->close();
			$dbCon->close();
			return $option;
		}
		
		function jobFamilyList()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select id,job_family from job_family ");
			
			
			$stmt->execute();
			$result = $stmt->get_result();
			$option="<option value='' >Select Job Family</option>";
			while($row=mysqli_fetch_array($result))
			{
				//print_r($row); die;
				$option=$option."<option value=".$row['id'].">".trim($row['job_family'])."</option>";
				
			}
			$stmt->close();
			$dbCon->close();
			//echo $option; die;
			return $option;
		}
		
		
		function addEmployee()
		{
			$dbCon = AppModel::createConnection();
			
			$r['status'] = 'ok';
			$r['message'] = [
			'id' => 'facebook',
			'label' => 'Add Employee',
			'label_class' => 'frmlblue_bg',
			'tabs' => [
			[
			'id' => 'profile',
			'label' => 'Personal Information',
			'state'  => 'active',
			'fields' => [[
			'id' => 'ssn',
			'name' => 'ssn',
			'label' => 'SSN',
			'type' => 'number',
			
			'classes' => 'wi_25',
			],[
			'id' => 'company_p',
			'name' => 'company_p',
			'label' => 'Name',
			'type' => 'text',
			
			'classes' => 'wi_25',
			],[
			'id' => 'contact_p',
			'name' => 'contact_p',
			'label' => 'Last Name',
			'type' => 'text',
			
			'classes' => 'wi_25',
			],[
			'id' => 'contacte_p',
			'name' => 'contacte_p',
			'label' => 'Email',
			'type' => 'email',
			
			'classes' => 'wi_25',
			],[
			'id' => 'day_p',
			'name' => 'day_p',
			'label' => 'DOB',
			'type' => 'text',
			
			'classes' => 'wi_10',
			],[
			'id' => 'month_p',
			'name' => 'month_p',
			'label' => 'DOB (Month)',
			'type' => 'text',
			
			'classes' => 'wi_15',
			],
			[
			'id' => 'year_p',
			'name' => 'year_p',
			'label' => 'DOB (Year)',
			'type' => 'text',
			
			'classes' => 'wi_25',
			],
			[
			'id' => 'sex_p',
			'name' => 'sex_p',
			'label' => 'Gender',
			'type' => 'select',
			'options' => [[
			'value' => '1',
			'label' => 'Male'
			],[
			'value' => '2',
			'label' => 'Female'
			]],
			'value' => '1',
			'classes' => 'wi_25',
			],
			[
			'id' => 'tel',
			'name' => 'tel',
			'label' => 'Telephone',
			'type' => 'text',
			
			'classes' => 'wi_25',
			],
			[
			'id' => 'mobile_p',
			'name' => 'mobile_p',
			'label' => 'Mobile',
			'type' => 'text',
			
			'classes' => 'wi_25',
			],
			[
			'id' => 'marital_status',
			'name' => 'marital_status',
			'label' => 'Marital Status',
			'type' => 'select',
			'options' => [[
			'value' => 'In-relationship',
			'label' => 'In-relationship'
			],[
			'value' => 'Single',
			'label' => 'Single'
			],[
			'value' => 'Married',
			'label' => 'Married'
			]
			,[
			'value' => 'Divorced',
			'label' => 'Divorced'
			]],
			'value' => 'In-relationship',
			'classes' => 'wi_25',
			],
			[
			'id' => 'city',
			'name' => 'city',
			'label' => 'City',
			'type' => 'text',
			
			'classes' => 'wi_25',
			],
			[
			'id' => 'state',
			'name' => 'state',
			'label' => 'State',
			'type' => 'text',
			
			'classes' => 'wi_25',
			],
			[
			'id' => 'zip',
			'name' => 'zip',
			'label' => 'Zip',
			'type' => 'text',
			
			'classes' => 'wi_25',
			],
			[
			'id' => 'add',
			'name' => 'add',
			'label' => 'Address',
			'type' => 'text',
			
			'classes' => 'wi_25',
			],
			[
			'id' => 'country',
			'name' => 'country',
			'label' => 'Country',
			'type' => 'select',
			'options'  => 'countries_list',
			'value' => '',
			'classes' => 'wi_25 jk',
			
			],
			[
			'id' => 'nation',
			'name' => 'nation',
			'label' => 'Nationality',
			'type' => 'select',
			'options'  => 'countries_list',
			'value' => '',
			'classes' => 'wi_25 jk',
			
			]
			
			]
			
			
			],[
			'id' => 'invoicing-address',
			'label' => 'Work Information',
			'fields' => [[
			'id' => 'e_number',
			'name' => 'e_number',
			'label' => 'Employee Number',
			'type' => 'text',
			
			'classes' => 'wi_25',
			],/*[
				'id' => 'e_type',
				'name' => 'e_type',
				'label' => 'Employee Type',
				'type' => 'select',
				'options' => [[
				'value' => 'Fulltime',
				'label' => 'Fulltime'
				],[
				'value' => 'Part time',
				'label' => 'Part time'
				],[
				'value' => 'Contract',
				'label' => 'Contract'
				]
				,[
				'value' => 'Temporary',
				'label' => 'Temporary'
				],[
				'value' => 'Volunteer',
				'label' => 'Volunteer'
				],[
				'value' => 'Other',
				'label' => 'Other'
				]],
				'value' => 'Fulltime',
				'classes' => 'wi_25',
			],*/
			[
			'id' => 's_date',
			'name' => 's_date',
			'label' => 'Hiring Date',
			'type' => 'date',
			
			'classes' => 'wi_25',
			],[
			'id' => 'r_date',
			'name' => 'r_date',
			'label' => 'Resigned Date',
			'type' => 'date',
			
			'classes' => 'wi_25',
			
			],
			/*[
				'id' => 'title',
				'name' => 'title',
				'label' => 'Position Type',
				'type' => 'select',
				'options' => [[
				'value' => 'CEO',
				'label' => 'CEO'
				],[
				'value' => 'C-level Manager',
				'label' => 'C-level Manager'
				],[
				'value' => 'Division head',
				'label' => 'Division head'
				]
				,[
				'value' => 'Department head',
				'label' => 'Department head'
				],[
				'value' => 'Team Leader',
				'label' => 'Team Leader'
				],[
				'value' => 'Project Manager',
				'label' => 'Project Manager'
				],[
				'value' => 'Employee',
				'label' => 'Employee'
				],[
				'value' => 'Sales Agent',
				'label' => 'Sales Agent'
				],[
				'value' => 'Freelancer/Self-employed',
				'label' => 'Freelancer/Self-employed'
				],[
				'value' => 'Other',
				'label' => 'Other'
				]],
				'value' => 'CEO',
				'classes' => 'wi_25',
				],
				[
				'id' => 'job_family',
				'name' => 'job_family',
				'label' => 'Job Family',
				'type' => 'select',
				'options'  => 'job_list',
				'classes' => 'wi_25',
				
				],
				[
				'id' => 'job_function',
				'name' => 'job_function',
				'label' => 'Job Function',
				'type' => 'select',
				'options' => [[
				'value' => '',
				'label' => 'Select'
				]],
				'classes' => 'wi_25',
				
				],
				[
				'id' => 'pos_name',
				'name' => 'pos_name',
				'label' => 'Position',
				'type' => 'select',
				'options' => [[
				'value' => '',
				'label' => 'Select'
				]],
				'classes' => 'wi_25',
				
				],
				[
				'id' => 'desc',
				'name' => 'desc',
				'label' => 'Job Description',
				'type' => 'textarea',
				
				'classes' => 'wi_25',
				],
				[
				'id' => 'locati',
				'name' => 'locati',
				'label' => 'Location',
				'type' => 'select',
				'options'  => 'location_list',
				'classes' => 'wi_25',
				
				],
				[
				'id' => 'department',
				'name' => 'department',
				'label' => 'Department',
				'type' => 'select',
				'options' => [[
				'value' => 'Management',
				'label' => 'Management'
				],[
				'value' => 'Purchasing',
				'label' => 'Purchasing'
				],[
				'value' => 'Marketing/Advertising',
				'label' => 'Marketing/Advertising'
				]
				,[
				'value' => 'Sales',
				'label' => 'Sales'
				],[
				'value' => 'Research/Development',
				'label' => 'Research/Development'
				],[
				'value' => 'IT',
				'label' => 'IT'
				],[
				'value' => 'Human Resource',
				'label' => 'Human Resource'
				],[
				'value' => 'Production',
				'label' => 'Production'
				],[
				'value' => 'Administration/Organization',
				'label' => 'Administration/Organization'
				],[
				'value' => 'Accounting/Controlling',
				'label' => 'Accounting/Controlling'
				],[
				'value' => 'Market Research/Documentation',
				'label' => 'Market Research/Documentation'
				],[
				'value' => 'Project Management',
				'label' => 'Project Management'
				],[
				'value' => 'Logistics/Warehouse/Transport',
				'label' => 'Logistics/Warehouse/Transport'
				],[
				'value' => 'Maintenance/Repair',
				'label' => 'Maintenance/Repair'
				],[
				'value' => 'Other',
				'label' => 'Other'
				]],
				'value' => 'Management',
				'classes' => 'wi_25',
			],*/
			[
			'id' => 'phone',
			'name' => 'phone',
			'label' => 'Work Phone',
			'type' => 'text',
			'classes' => 'wi_25',
			],
			[
			'id' => 'mobile',
			'name' => 'mobile',
			'label' => 'Work Mobile',
			'type' => 'text',
			'classes' => 'wi_25',
			],
			[
			'id' => 'email',
			'name' => 'email',
			'label' => 'Work Email',
			'type' => 'text',
			'classes' => 'wi_25',
			],[
			'id' => 'permision',
			'name' => 'permision',
			'label' => 'Permission',
			'type' => 'select',
			'options' => [[
			'value' => '1',
			'label' => 'yes'
			],[
			'value' => '2',
			'label' => 'no'
			]],
			'classes' => 'wi_25',
			
			]
			],
			]
			],
			'buttons' => ['<a href="#" class="dblue_btn marrl5 fsz16"  onclick="submitform();">Finish</a>']
			
			];
			return (json_encode($r));
			
			
			
			
			
			
		}
		
		function editEmployee()
		{
			$dbCon = AppModel::createConnection();
			$cid=explode('_',$_POST['id']);
			if($cid['0']=='a')
			{
				
				$stmt = $dbCon->prepare("select price,employee_position.id,job_position.job_position,position_emp.position from employee_position left join job_position on employee_position.job_position=job_position.id left join position_emp on position_emp.id=employee_position.position_detail  where employee_id=?");
				$stmt->bind_param("i", $cid['1']);
				
				$stmt->execute();
				$result = $stmt->get_result();
				$opt=array();
				
				//$test=mysqli_fetch_array($result);
				$i=0;
				while($row=mysqli_fetch_array($result))
				{
					if($row['job_position']=="")
					{
						$opt[$i]=['<a href="#" class="get-position-info1 dark_grey_txt" data-keep="true" data-id="pa_'.$row['id'].'"><span class="fa fa-user marr5 valm fsz15"></span> <span class="valm"></span></a>', '<a href="mailto:test@email.com" class="dark_grey_txt">'.$row['position'].'</a>' , '<a href="#" class="dark_grey_txt">'.$row['price'].'</a>'];		
					}
					else
					{
						$opt[$i]=['<a href="#" class="get-position-info1 dark_grey_txt" data-keep="true" data-id="pa_'.$row['id'].'"><span class="fa fa-user marr5 valm fsz15"></span> <span class="valm">'.$row['job_position'].'</span></a>', '<a href="mailto:test@email.com" class="dark_grey_txt">'.$row['position'].'</a>' , '<a href="#" class="dark_grey_txt">'.$row['price'].'</a>'];	
					}
					$i++;
				}
				
				$stmt = $dbCon->prepare("select * from user_logins where id=(select user_login_id from employees where id=? )");
				
				$stmt->bind_param("i", $cid['1']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row=mysqli_fetch_array($result);
				
				$stmt = $dbCon->prepare("select * from user_profiles where user_logins_id=?");
				
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_virtual_user=mysqli_fetch_array($result);
				
				$stmt = $dbCon->prepare("select company_permission,location_id, job_family,job_position.job_position, job_function.job_function,e_type,h_date,res_date,title,department,phone,mobile,email
				,ssn, e_number,description_job,i_street,i_town,i_city
				,i_zip, i_country,d_street, d_town, d_city,d_zip,d_country
				, b_member, mentor, c_id, prospect,partner,supplier from user_company_profile left join job_function on job_function.id=user_company_profile.job_function left join job_position on job_position.id=user_company_profile.job_position where user_login_id=? and company_id=(select company_id from employees where id=?)");
				
				$stmt->bind_param("ii", $row['id'],$cid['1']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_virtual_user_company=mysqli_fetch_array($result);
				
				$r['status'] = 'ok';
				$r['message'] = [
				'id' => 'facebook',
				'label' => 'Add Employee',
				'label_class' => 'frmlblue_bg',
				'tabs' => [
				[
				'id' => 'profile',
				'label' => 'Personal Information',
				'state'  => 'active',
				'fields' => [[
				'id' => 'ssn',
				'name' => 'ssn',
				'label' => 'SSN',
				'type' => 'number',
				'value' => $row_virtual_user_company['ssn'],
				'classes' => 'wi_25',
				],[
				
				'id' => 'company_p',
				'name' => 'company_p',
				'label' => 'Name',
				'type' => 'text',
				'value' => $row['first_name'],
				'classes' => 'wi_25',
				],[
				'id' => 'contact_p',
				'name' => 'contact_p',
				'label' => 'Last Name',
				'type' => 'text',
				'value' => $row['last_name'],
				'classes' => 'wi_25',
				],[
				'id' => 'contacte_p',
				'name' => 'contacte_p',
				'label' => 'Email',
				'type' => 'email',
				'value' => $row['email'],
				'classes' => 'wi_25',
				],[
				'id' => 'day_p',
				'name' => 'day_p',
				'label' => 'DOB',
				'type' => 'text',
				'value' => $row['dob_day_p'],
				'classes' => 'wi_10',
				],[
				'id' => 'month_p',
				'name' => 'month_p',
				'label' => 'DOB (Month)',
				'type' => 'text',
				'value' => $row['dob_month_p'],
				'classes' => 'wi_15',
				],
				[
				'id' => 'year_p',
				'name' => 'year_p',
				'label' => 'DOB (Year)',
				'type' => 'text',
				'value' => $row['dob_year_p'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'sex_p',
				'name' => 'sex_p',
				'label' => 'Gender',
				'type' => 'select',
				'options' => [[
				'value' => '1',
				'label' => 'Male'
				],[
				'value' => '2',
				'label' => 'Female'
				]],
				'value' => $row['sex_p'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'tel',
				'name' => 'tel',
				'label' => 'Telephone',
				'type' => 'text',
				'value' => $row_virtual_user_company['phone'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'mobile_p',
				'name' => 'mobile_p',
				'label' => 'Mobile',
				'type' => 'text',
				'value' => $row_virtual_user['mobile_p'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'marital_status',
				'name' => 'marital_status',
				'label' => 'Marital Status',
				'type' => 'select',
				'options' => [[
				'value' => 'In-relationship',
				'label' => 'In-relationship'
				],[
				'value' => 'Single',
				'label' => 'Single'
				],[
				'value' => 'Married',
				'label' => 'Married'
				]
				,[
				'value' => 'Divorced',
				'label' => 'Divorced'
				]],
				'value' => $row_virtual_user['marital_status'],
				'classes' => 'wi_25',
				],
				
				[
				'id' => 'city',
				'name' => 'city',
				'label' => 'City',
				'type' => 'text',
				'value' => $row_virtual_user['city'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'state',
				'name' => 'state',
				'label' => 'State',
				'type' => 'text',
				'value' => $row_virtual_user['state'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'zip',
				'name' => 'zip',
				'label' => 'Zip',
				'type' => 'text',
				'value' => $row_virtual_user['zipcode'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'add',
				'name' => 'add',
				'label' => 'Address',
				'type' => 'text',
				'value' => $row_virtual_user['address'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'country',
				'name' => 'country',
				'label' => 'Country',
				'type' => 'select',
				'options'  => 'countries_list',
				'value' => $row_virtual_user['country'],
				'classes' => 'wi_25 jk',
				
				],
				[
				'id' => 'nation',
				'name' => 'nation',
				'label' => 'Nationality',
				'type' => 'select',
				'options'  => 'countries_list',
				'value' => $row_virtual_user['nation'],
				'classes' => 'wi_25 jk',
				
				]
				
				]
				
				
				],[
				'id' => 'invoicing-address',
				'label' => 'Work Information',
				'fields' => [[
				'id' => 'e_number',
				'name' => 'e_number',
				'label' => 'Employee Number',
				'type' => 'text',
				'value' => $row_virtual_user_company['e_number'],
				'classes' => 'wi_25',
				],/*[
					'id' => 'e_type',
					'name' => 'e_type',
					'label' => 'Employee Type',
					'type' => 'select',
					'options' => [[
					'value' => 'Fulltime',
					'label' => 'Fulltime'
					],[
					'value' => 'Part time',
					'label' => 'Part time'
					],[
					'value' => 'Contract',
					'label' => 'Contract'
					]
					,[
					'value' => 'Temporary',
					'label' => 'Temporary'
					],[
					'value' => 'Volunteer',
					'label' => 'Volunteer'
					],[
					'value' => 'Other',
					'label' => 'Other'
					]],
					'value' => $row_virtual_user_company['e_type'],
					'classes' => 'wi_25',
				],*/
				[
				'id' => 's_date',
				'name' => 's_date',
				'label' => 'Hiring Date',
				'type' => 'date',
				'value' => $row_virtual_user_company['h_date'],
				'classes' => 'wi_25',
				],[
				'id' => 'r_date',
				'name' => 'r_date',
				'label' => 'Resigned Date',
				'type' => 'date',
				'value' => $row_virtual_user_company['res_date'],
				'classes' => 'wi_25',
				
				],
				/*[
					'id' => 'title',
					'name' => 'title',
					'label' => 'Position Type',
					'type' => 'select',
					'options' => [[
					'value' => 'CEO',
					'label' => 'CEO'
					],[
					'value' => 'C-level Manager',
					'label' => 'C-level Manager'
					],[
					'value' => 'Division head',
					'label' => 'Division head'
					]
					,[
					'value' => 'Department head',
					'label' => 'Department head'
					],[
					'value' => 'Team Leader',
					'label' => 'Team Leader'
					],[
					'value' => 'Project Manager',
					'label' => 'Project Manager'
					],[
					'value' => 'Employee',
					'label' => 'Employee'
					],[
					'value' => 'Sales Agent',
					'label' => 'Sales Agent'
					],[
					'value' => 'Freelancer/Self-employed',
					'label' => 'Freelancer/Self-employed'
					],[
					'value' => 'Other',
					'label' => 'Other'
					]],
					'value' => $row_virtual_user_company['title'],
					'classes' => 'wi_25',
					],
					
					[
					'id' => 'job_family',
					'name' => 'job_family',
					'label' => 'Job Family',
					'type' => 'select',
					'options'  => 'job_list',
					'value' => $row_virtual_user_company['job_family'],
					'classes' => 'wi_25',
					
					],
					[
					'id' => 'job_function',
					'name' => 'job_function',
					'label' => 'Job Function',
					'type' => 'select',
					'options' => [[
					'value' => '',
					'label' => $row_virtual_user_company['job_function']
					]],
					'classes' => 'wi_25',
					
					],
					[
					'id' => 'pos_name',
					'name' => 'pos_name',
					'label' => 'Position',
					'type' => 'select',
					'options' => [[
					'value' => '',
					'label' => $row_virtual_user_company['job_position']
					]],
					'classes' => 'wi_25',
					
					],
					[
					'id' => 'desc',
					'name' => 'desc',
					'label' => 'Job Description',
					'type' => 'textarea',
					'value' => $row_virtual_user_company['description_job'],
					'classes' => 'wi_25',
					],
					[
					'id' => 'locati',
					'name' => 'locati',
					'label' => 'Location',
					'type' => 'select',
					'options'  => 'location_list',
					'value' => $row_virtual_user_company['location_id'],
					'classes' => 'wi_25',
					
					],
					[
					'id' => 'department',
					'name' => 'department',
					'label' => 'Department',
					'type' => 'select',
					'options' => [[
					'value' => 'Management',
					'label' => 'Management'
					],[
					'value' => 'Purchasing',
					'label' => 'Purchasing'
					],[
					'value' => 'Marketing/Advertising',
					'label' => 'Marketing/Advertising'
					]
					,[
					'value' => 'Sales',
					'label' => 'Sales'
					],[
					'value' => 'Research/Development',
					'label' => 'Research/Development'
					],[
					'value' => 'IT',
					'label' => 'IT'
					],[
					'value' => 'Human Resource',
					'label' => 'Human Resource'
					],[
					'value' => 'Production',
					'label' => 'Production'
					],[
					'value' => 'Administration/Organization',
					'label' => 'Administration/Organization'
					],[
					'value' => 'Accounting/Controlling',
					'label' => 'Accounting/Controlling'
					],[
					'value' => 'Market Research/Documentation',
					'label' => 'Market Research/Documentation'
					],[
					'value' => 'Project Management',
					'label' => 'Project Management'
					],[
					'value' => 'Logistics/Warehouse/Transport',
					'label' => 'Logistics/Warehouse/Transport'
					],[
					'value' => 'Maintenance/Repair',
					'label' => 'Maintenance/Repair'
					],[
					'value' => 'Other',
					'label' => 'Other'
					]],
					'value' => $row_virtual_user_company['department'],
					'classes' => 'wi_25',
				],*/
				
				[
				'id' => 'phone',
				'name' => 'phone',
				'label' => 'Work Phone',
				'type' => 'text',
				'value' => $row_virtual_user_company['phone'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'mobile',
				'name' => 'mobile',
				'label' => 'Work Mobile',
				'type' => 'text',
				'value' => $row_virtual_user_company['mobile'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'email',
				'name' => 'email',
				'label' => 'Work Email',
				'type' => 'text',
				'value' => $row_virtual_user_company['email'],
				'classes' => 'wi_25',
				],[
				'id' => 'permision',
				'name' => 'permision',
				'label' => 'Permission',
				'type' => 'select',
				'options' => [[
				'value' => '1',
				'label' => 'yes'
				],[
				'value' => '2',
				'label' => 'no'
				]],
				'value' => $row_virtual_user_company['company_permission'],
				'classes' => 'wi_25',
				
				],
				[
				'id' => 'ind',
				'name' => 'ind',
				'label' => '',
				'type' => 'hidden',
				'value' => $_POST['id'],
				'classes' => 'wi_25',
				]
				],
				]
				,[
				'id' => 'employees',
				'label' => 'Position',
				'postfix' => '<a href="#" class="get-active-position-info fright" value="'.$_POST['id'].'" data-keep="true" data-id="'.$_POST['id'].'" id="'.$_POST['id'].'">+ Add</a>',
				'thead'  => [[
				'class' => 'brdb nobold',
				'text'  => 'Title'
				],[
				'class' => 'brdb nobold',
				'text'  => 'Position Type'
				],[
				'class' => 'brdb nobold',
				'text'  => 'Price'
				]],
				'tbody' => 
				$opt
				
				
				]
				],
				'buttons' => ['<a href="#" class="get-active-position-info dblue_btn marrl5 fsz16"  data-id="'.$_POST['id'].'" id="'.$_POST['id'].'">Add Position</a>']
				
				];
				
			}
			else if($cid['0']=='v')
			{
				
				$stmt = $dbCon->prepare("select employee_position.id,job_position.job_position,position_emp.position from employee_position left join job_position on employee_position.job_position=job_position.id left join position_emp on position_emp.id=employee_position.position_detail  where virtual_employee_id=?");
				$stmt->bind_param("i", $cid['1']);
				
				$stmt->execute();
				$result = $stmt->get_result();
				$opt=array();
				
				//$test=mysqli_fetch_array($result);
				$i=0;
				while($row=mysqli_fetch_array($result))
				{
					if($row['job_position']=="")
					{
						$opt[$i]=['<a href="#" class="get-position-info1 dark_grey_txt" data-keep="true" data-id="pv_'.$row['id'].'"><span class="fa fa-user marr5 valm fsz15"></span> <span class="valm"></span></a>', '<a href="mailto:test@email.com" class="dark_grey_txt">'.$row['position'].'</a>'];		
					}
					else
					{
						$opt[$i]=['<a href="#" class="get-position-info1 dark_grey_txt" data-keep="true" data-id="pv_'.$row['id'].'"><span class="fa fa-user marr5 valm fsz15"></span> <span class="valm">'.$row['job_position'].'</span></a>', '<a href="mailto:test@email.com" class="dark_grey_txt">'.$row['position'].'</a>'];	
					}
					$i++;
				}
				
				$stmt = $dbCon->prepare("select * from estore_employee_invite where id=?");
				
				$stmt->bind_param("i", $cid['1']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row=mysqli_fetch_array($result);
				
				$stmt = $dbCon->prepare("select * from virtual_user_profiles where invited_user_id=?");
				
				$stmt->bind_param("i", $cid['1']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_virtual_user=mysqli_fetch_array($result);
				
				$stmt = $dbCon->prepare("select company_permission,location_id, job_family,job_position.job_position, job_function.job_function,e_type,h_date,res_date,title,department,phone,mobile,email
				,ssn, e_number,description_job,i_street,i_town,i_city
				,i_zip, i_country,d_street, d_town, d_city,d_zip,d_country
				, b_member, mentor, c_id, prospect,partner,supplier from virtual_user_company_profile left join job_function on job_function.id=virtual_user_company_profile.job_function left join job_position on job_position.id=virtual_user_company_profile.job_position where invited_user_id=?");
				
				$stmt->bind_param("i", $cid['1']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_virtual_user_company=mysqli_fetch_array($result);
				
				$r['status'] = 'ok';
				$r['message'] = [
				'id' => 'facebook',
				'label' => 'Add Employee',
				'label_class' => 'frmlblue_bg',
				'tabs' => [
				[
				'id' => 'profile',
				'label' => 'Personal Information',
				'state'  => 'active',
				'fields' => [[
				'id' => 'ssn',
				'name' => 'ssn',
				'label' => 'SSN',
				'type' => 'number',
				'value' => $row_virtual_user_company['ssn'],
				'classes' => 'wi_25',
				],[
				
				'id' => 'company_p',
				'name' => 'company_p',
				'label' => 'Name',
				'type' => 'text',
				'value' => $row['name'],
				'classes' => 'wi_25',
				],[
				'id' => 'contact_p',
				'name' => 'contact_p',
				'label' => 'Last Name',
				'type' => 'text',
				'value' => $row['last_name'],
				'classes' => 'wi_25',
				],[
				'id' => 'contacte_p',
				'name' => 'contacte_p',
				'label' => 'Email',
				'type' => 'email',
				'value' => $row['email'],
				'classes' => 'wi_25',
				],[
				'id' => 'day_p',
				'name' => 'day_p',
				'label' => 'DOB',
				'type' => 'text',
				'value' => $row['dob_day_p'],
				'classes' => 'wi_10',
				],[
				'id' => 'month_p',
				'name' => 'month_p',
				'label' => 'DOB (Month)',
				'type' => 'text',
				'value' => $row['dob_month_p'],
				'classes' => 'wi_15',
				],
				[
				'id' => 'year_p',
				'name' => 'year_p',
				'label' => 'DOB (Year)',
				'type' => 'text',
				'value' => $row['dob_year_p'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'sex_p',
				'name' => 'sex_p',
				'label' => 'Gender',
				'type' => 'select',
				'options' => [[
				'value' => '1',
				'label' => 'Male'
				],[
				'value' => '2',
				'label' => 'Female'
				]],
				'value' => $row['sex_p'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'tel',
				'name' => 'tel',
				'label' => 'Telephone',
				'type' => 'text',
				'value' => $row['phone'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'mobile_p',
				'name' => 'mobile_p',
				'label' => 'Mobile',
				'type' => 'text',
				'value' => $row['mobile_p'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'marital_status',
				'name' => 'marital_status',
				'label' => 'Marital Status',
				'type' => 'select',
				'options' => [[
				'value' => 'In-relationship',
				'label' => 'In-relationship'
				],[
				'value' => 'Single',
				'label' => 'Single'
				],[
				'value' => 'Married',
				'label' => 'Married'
				]
				,[
				'value' => 'Divorced',
				'label' => 'Divorced'
				]],
				'value' => $row_virtual_user['marital_status'],
				'classes' => 'wi_25',
				],
				
				[
				'id' => 'city',
				'name' => 'city',
				'label' => 'City',
				'type' => 'text',
				'value' => $row_virtual_user['city'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'state',
				'name' => 'state',
				'label' => 'State',
				'type' => 'text',
				'value' => $row_virtual_user['state'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'zip',
				'name' => 'zip',
				'label' => 'Zip',
				'type' => 'text',
				'value' => $row_virtual_user['zipcode'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'add',
				'name' => 'add',
				'label' => 'Address',
				'type' => 'text',
				'value' => $row_virtual_user['address'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'country',
				'name' => 'country',
				'label' => 'Country',
				'type' => 'select',
				'options'  => 'countries_list',
				'value' => $row_virtual_user['country'],
				'classes' => 'wi_25 jk',
				
				],
				[
				'id' => 'nation',
				'name' => 'nation',
				'label' => 'Nationality',
				'type' => 'select',
				'options'  => 'countries_list',
				'value' => $row_virtual_user['nation'],
				'classes' => 'wi_25 jk',
				
				]
				
				]
				
				
				],[
				'id' => 'invoicing-address',
				'label' => 'Work Information',
				'fields' => [[
				'id' => 'e_number',
				'name' => 'e_number',
				'label' => 'Employee Number',
				'type' => 'text',
				'value' => $row_virtual_user_company['e_number'],
				'classes' => 'wi_25',
				],/*[
					'id' => 'e_type',
					'name' => 'e_type',
					'label' => 'Employee Type',
					'type' => 'select',
					'options' => [[
					'value' => 'Fulltime',
					'label' => 'Fulltime'
					],[
					'value' => 'Part time',
					'label' => 'Part time'
					],[
					'value' => 'Contract',
					'label' => 'Contract'
					]
					,[
					'value' => 'Temporary',
					'label' => 'Temporary'
					],[
					'value' => 'Volunteer',
					'label' => 'Volunteer'
					],[
					'value' => 'Other',
					'label' => 'Other'
					]],
					'value' => $row_virtual_user_company['e_type'],
					'classes' => 'wi_25',
				],*/
				[
				'id' => 's_date',
				'name' => 's_date',
				'label' => 'Hiring Date',
				'type' => 'date',
				'value' => $row_virtual_user_company['h_date'],
				'classes' => 'wi_25',
				],[
				'id' => 'r_date',
				'name' => 'r_date',
				'label' => 'Resigned Date',
				'type' => 'date',
				'value' => $row_virtual_user_company['res_date'],
				'classes' => 'wi_25',
				
				],
				/*[
					'id' => 'title',
					'name' => 'title',
					'label' => 'Position Type',
					'type' => 'select',
					'options' => [[
					'value' => 'CEO',
					'label' => 'CEO'
					],[
					'value' => 'C-level Manager',
					'label' => 'C-level Manager'
					],[
					'value' => 'Division head',
					'label' => 'Division head'
					]
					,[
					'value' => 'Department head',
					'label' => 'Department head'
					],[
					'value' => 'Team Leader',
					'label' => 'Team Leader'
					],[
					'value' => 'Project Manager',
					'label' => 'Project Manager'
					],[
					'value' => 'Employee',
					'label' => 'Employee'
					],[
					'value' => 'Sales Agent',
					'label' => 'Sales Agent'
					],[
					'value' => 'Freelancer/Self-employed',
					'label' => 'Freelancer/Self-employed'
					],[
					'value' => 'Other',
					'label' => 'Other'
					]],
					'value' => $row_virtual_user_company['title'],
					'classes' => 'wi_25',
					],
					
					[
					'id' => 'job_family',
					'name' => 'job_family',
					'label' => 'Job Family',
					'type' => 'select',
					'options'  => 'job_list',
					'value' => $row_virtual_user_company['job_family'],
					'classes' => 'wi_25',
					
					],
					[
					'id' => 'job_function',
					'name' => 'job_function',
					'label' => 'Job Function',
					'type' => 'select',
					'options' => [[
					'value' => '',
					'label' => $row_virtual_user_company['job_function']
					]],
					'classes' => 'wi_25',
					
					],
					[
					'id' => 'pos_name',
					'name' => 'pos_name',
					'label' => 'Position',
					'type' => 'select',
					'options' => [[
					'value' => '',
					'label' => $row_virtual_user_company['job_position']
					]],
					'classes' => 'wi_25',
					
					],
					[
					'id' => 'desc',
					'name' => 'desc',
					'label' => 'Job Description',
					'type' => 'textarea',
					'value' => $row_virtual_user_company['description_job'],
					'classes' => 'wi_25',
					],
					[
					'id' => 'locati',
					'name' => 'locati',
					'label' => 'Location',
					'type' => 'select',
					'options'  => 'location_list',
					'value' => $row_virtual_user_company['location_id'],
					'classes' => 'wi_25',
					
					],
					[
					'id' => 'department',
					'name' => 'department',
					'label' => 'Department',
					'type' => 'select',
					'options' => [[
					'value' => 'Management',
					'label' => 'Management'
					],[
					'value' => 'Purchasing',
					'label' => 'Purchasing'
					],[
					'value' => 'Marketing/Advertising',
					'label' => 'Marketing/Advertising'
					]
					,[
					'value' => 'Sales',
					'label' => 'Sales'
					],[
					'value' => 'Research/Development',
					'label' => 'Research/Development'
					],[
					'value' => 'IT',
					'label' => 'IT'
					],[
					'value' => 'Human Resource',
					'label' => 'Human Resource'
					],[
					'value' => 'Production',
					'label' => 'Production'
					],[
					'value' => 'Administration/Organization',
					'label' => 'Administration/Organization'
					],[
					'value' => 'Accounting/Controlling',
					'label' => 'Accounting/Controlling'
					],[
					'value' => 'Market Research/Documentation',
					'label' => 'Market Research/Documentation'
					],[
					'value' => 'Project Management',
					'label' => 'Project Management'
					],[
					'value' => 'Logistics/Warehouse/Transport',
					'label' => 'Logistics/Warehouse/Transport'
					],[
					'value' => 'Maintenance/Repair',
					'label' => 'Maintenance/Repair'
					],[
					'value' => 'Other',
					'label' => 'Other'
					]],
					'value' => $row_virtual_user_company['department'],
					'classes' => 'wi_25',
				],*/
				
				[
				'id' => 'phone',
				'name' => 'phone',
				'label' => 'Work Phone',
				'type' => 'text',
				'value' => $row_virtual_user_company['phone'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'mobile',
				'name' => 'mobile',
				'label' => 'Work Mobile',
				'type' => 'text',
				'value' => $row_virtual_user_company['mobile'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'email',
				'name' => 'email',
				'label' => 'Work Email',
				'type' => 'text',
				'value' => $row_virtual_user_company['email'],
				'classes' => 'wi_25',
				],[
				'id' => 'permision',
				'name' => 'permision',
				'label' => 'Permission',
				'type' => 'select',
				'options' => [[
				'value' => '1',
				'label' => 'yes'
				],[
				'value' => '2',
				'label' => 'no'
				]],
				'value' => $row_virtual_user_company['company_permission'],
				'classes' => 'wi_25',
				
				],
				[
				'id' => 'ind',
				'name' => 'ind',
				'label' => '',
				'type' => 'hidden',
				'value' => $_POST['id'],
				'classes' => 'wi_25',
				]
				],
				]
				,[
				'id' => 'employees',
				'label' => 'Position',
				'postfix' => '<a href="#" class="get-position-info fright" value="'.$_POST['id'].'" data-keep="true" data-id="'.$_POST['id'].'" id="'.$_POST['id'].'">+ Add</a>',
				'thead'  => [[
				'class' => 'brdb nobold',
				'text'  => 'Title'
				],[
				'class' => 'brdb nobold',
				'text'  => 'Position Type'
				]],
				'tbody' => 
				$opt
				
				
				]
				],
				'buttons' => ['<a href="#" class="get-position-info dblue_btn marrl5 fsz16"  data-id="'.$_POST['id'].'" id="'.$_POST['id'].'">Add Position</a>']
				
				];
				
			}
			
			return (json_encode($r));
			
			
			
			
			
			
		}
		
		
		function activeEmployeeDetail($data)
		{
			$dbCon = AppModel::createConnection();
			function base64_to_jpeg($base64_string, $output_file) {
					
					$ifp = fopen( $output_file, 'wb' ); 
					
					
					$data = explode( ',', $base64_string );
					
					fwrite( $ifp, base64_decode( $data[1] ) );
					
					
					fclose( $ifp ); 
					
					return $output_file; 
				}
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select created_by,employees.id,employees.user_login_id,concat_ws(' ', employees.first_name, employees.last_name) as name,employees.last_name,employees.email,verification_status,image_path,user_profiles.phone_number,passport_image from employees left join user_logins on employees.user_login_id=user_logins.id left join user_profiles on employees.user_login_id=user_profiles.user_logins_id  where employees.company_id=? limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
							
				if($row ['passport_image']!=null) { $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['passport_image'].'.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else {  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; $value_a="../../../../html/usercontent/images/default-profile-pic.jpg"; }
				$org[$j]['image_path']= $imgs;
				$j++;
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		function moreApprovedEmployees($data)
		{
			$dbCon = AppModel::createConnection();
			function base64_to_jpeg($base64_string, $output_file) {
					
					$ifp = fopen( $output_file, 'wb' ); 
					
					
					$data = explode( ',', $base64_string );
					
					fwrite( $ifp, base64_decode( $data[1] ) );
					
					
					fclose( $ifp ); 
					
					return $output_file; 
				}
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=20;
			$stmt = $dbCon->prepare("select created_by,employees.id,employees.user_login_id,concat_ws(' ', employees.first_name, employees.last_name) as name,employees.last_name,employees.email,verification_status,image_path,user_profiles.phone_number,passport_image from employees left join user_logins on employees.user_login_id=user_logins.id left join user_profiles on employees.user_login_id=user_profiles.user_logins_id  where employees.company_id=? limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				if($row ['passport_image']!=null) { $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['passport_image'].'.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } 
					
					$val='
																	<div class="wi_40p xs-wi_50p hei_40p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 yellow_bg_a" id="aa_'.$row['id'].'"><img src="'.$imgs.'" width="40px;" height="40px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div>';
					}
				else
				{
			$val='<div class="wi_40p xs-wi_50p hei_40p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;" id="aa_'.$row['id'].'"> '.substr($row['last_name'],0,1).'</div> 
																';
				}
				
				$org=$org.'<div class="xs-wi_100 xsip-wi_33 sm-wi_33 wi_33 fleft bs_bb padrb20 talc  " >
													<div class="toggle-parent wi_100 dflex alit_s">
														<div class="wi_100 dnone_pa ">
															<a href="#" class="style_base hei_210p dblock bs_bb pad25  brdclr_seggreen_h brdrad5 lgtgrey2_bg_h  box_shadow trans_all2 ">
																<div class=" ">
																	<div class="wi_100 hei_90p dflex bs_bb">
																		<img src="'.$imgs.'" height="90" width="90" class="brdrad5 padb0">
																	</div>
																	
																	<div class="  padrb15 padt20">
																		<h3 class="ovfl_hid tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt0 ffamily_avenir">'.html_entity_decode($row['name']).'</h3>
																		
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
															';
				
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		function virtualEmployeeDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,concat_ws(' ', name, last_name) as name,last_name,created_by,email,phone,title,location from estore_employee_invite where real_employee_id is null and company_id=? and invited_emp=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				
				$point_u=0;
				$point_v=0;
				$org[$j]['point_u']=0;
				$org[$j]['point_v']=0;
				
				$j++;
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function articleOrganization()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select id,section_name from domstol_article_organization");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				
			}
			
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function subscribeUser()
		{
			$dbCon = AppModel::createConnection();
			$d=date('Y-m-d h:i:s');
			$data=explode(",",substr(cleanMe($_POST['indexing_save']),0,-1));
			foreach($data as $category => $value)
			{
				//echo $value; die;
				$stmt = $dbCon->prepare("select id from organization_subscription where email=? and domstol_article_organization_id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("si", $_POST['email'],$value);
				
				$stmt->execute();
				$result = $stmt->get_result();
				
				$row = $result->fetch_assoc();
				if(empty($row))
				{
					$stmt = $dbCon->prepare("insert into organization_subscription (email,domstol_article_organization_id,created_on) values (?, ?, ?)");
					
					/* bind parameters for markers */
					
					$stmt->bind_param("sis", $_POST['email'],$value,$d);
					$stmt->execute();
					$result = $stmt->get_result();
				}
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function sectionDomarSubDetail()
		{
			$dbCon = AppModel::createConnection();
			
			
			
			
			$stmt = $dbCon->prepare("select domar_id,headline,title,article_section.id as_id,domar_content.id,add_button,button_title,color_code,media_type,image_path1,image_path2,image_path3,heading,suheading,section,position,publish_date,domar_content.created_on,title_type,column_type from domar_content left join domar_company on domar_company.id=domar_content.domar_id left join article_section on article_section.id=domar_content.section where domar_content.complete=1 and position!=-1  and domar_id in (select id from domar_company where status=0) order by title_type ,domar_content.position_on");
			
			/* bind parameters for markers */
			
			$org=array();
			$stmt->execute();
			$result1 = $stmt->get_result();
			
			while($row1 = $result1->fetch_assoc())
			{
				
				array_push($org,$row1);
				
			}
			
			
			
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		function checkSubscription($data)
		{
			
			
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num from organization_subscription where email=? and FIND_IN_SET(domstol_article_organization_id,?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("ss", $data['email'],$data['id_val']);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row['num'];
			
			
		}
		
		function emailContent()
		{
			$to      = 'support@qmatchup.com';
			$subject = "Subsription request added";
			
			$emailContent ='The email submitted by the user is :-'.$_POST['email_text'];
			
			sendEmail($subject, $to, $emailContent);
		}
		
		function addPosition()
		{
			$dbCon = AppModel::createConnection();
			//print_r($_POST); die;
			$r['status'] = 'ok';
			$r['message'] = [
			'id' => 'facebook1',
			'label' => 'Add Position',
			'label_class' => 'frmlblue_bg',
			'tabs' => [
			[
			'id' => 'invoicing-address1',
			'label' => 'Position',
			'state'  => 'active',
			'fields' => [[
			'id' => 'titlep',
			'name' => 'titlep',
			'label' => 'Position Type',
			'type' => 'select',
			'options' => [[
			'value' => '1',
			'label' => 'Primary'
			],[
			'value' => '2',
			'label' => 'Secondary'
			],[
			'value' => '3',
			'label' => 'Thirdly'
			]
			,[
			'value' => '4',
			'label' => 'Fourthly'
			],[
			'value' => '5',
			'label' => 'Fifth'
			],[
			'value' => '6',
			'label' => 'Sixth'
			],[
			'value' => '7',
			'label' => 'Seventh'
			],[
			'value' => '8',
			'label' => 'Eighth'
			],[
			'value' => '9',
			'label' => 'Nineth'
			],[
			'value' => '10',
			'label' => 'Tenth'
			]],
			'value' => '1',
			'classes' => 'wi_25',
			],
			[
			'id' => 'a_datep',
			'name' => 'a_datep',
			'label' => 'Applied Date',
			'type' => 'date',
			
			'classes' => 'wi_25',
			],
			[
			'id' => 'joboffer_datep',
			'name' => 'joboffer_datep',
			'label' => 'Job Offer Date',
			'type' => 'date',
			
			'classes' => 'wi_25',
			],
			[
			'id' => 'ac_datep',
			'name' => 'ac_datep',
			'label' => 'Job Accepted Date',
			'type' => 'date',
			
			'classes' => 'wi_25',
			],
			
			[
			'id' => 'h_times',
			'name' => 'h_times',
			'label' => 'How Many %',
			'type' => 'number',
			
			'classes' => 'wi_25',
			],
			
			[
			'id' => 'e_typep',
			'name' => 'e_typep',
			'label' => 'Employee Type',
			'type' => 'select',
			'options' => [[
			'value' => 'Fulltime',
			'label' => 'Fulltime'
			],[
			'value' => 'Part time',
			'label' => 'Part time'
			],[
			'value' => 'Contract',
			'label' => 'Contract'
			]
			,[
			'value' => 'Temporary',
			'label' => 'Temporary'
			],[
			'value' => 'Volunteer',
			'label' => 'Volunteer'
			],[
			'value' => 'Other',
			'label' => 'Other'
			]],
			'value' => 'Fulltime',
			'classes' => 'wi_25',
			],
			[
			'id' => 's_datep',
			'name' => 's_datep',
			'label' => 'Start Date',
			'type' => 'date',
			
			'classes' => 'wi_25',
			],[
			'id' => 'r_datep',
			'name' => 'r_datep',
			'label' => 'Resigned Date',
			'type' => 'date',
			
			'classes' => 'wi_25',
			
			],
			
			[
			'id' => 'job_familyp',
			'name' => 'job_familyp',
			'label' => 'Job Family',
			'type' => 'select',
			'options'  => 'job_list',
			'classes' => 'wi_25',
			
			],
			[
			'id' => 'job_functionp',
			'name' => 'job_functionp',
			'label' => 'Job Function',
			'type' => 'select',
			'options' => [[
			'value' => '',
			'label' => 'Select'
			]],
			'classes' => 'wi_25',
			
			],
			[
			'id' => 'pos_namep',
			'name' => 'pos_namep',
			'label' => 'Position',
			'type' => 'select',
			'options' => [[
			'value' => '',
			'label' => 'Select'
			]],
			'classes' => 'wi_25',
			
			],
			[
			'id' => 'descp',
			'name' => 'descp',
			'label' => 'Job Description',
			'type' => 'textarea',
			
			'classes' => 'wi_25',
			],
			[
			'id' => 'locatip',
			'name' => 'locatip',
			'label' => 'Location',
			'type' => 'select',
			'options'  => 'location_list',
			'classes' => 'wi_25',
			
			],
			[
			'id' => 'departmentp',
			'name' => 'departmentp',
			'label' => 'Department',
			'type' => 'select',
			'options' => [[
			'value' => 'Management',
			'label' => 'Management'
			],[
			'value' => 'Purchasing',
			'label' => 'Purchasing'
			],[
			'value' => 'Marketing/Advertising',
			'label' => 'Marketing/Advertising'
			]
			,[
			'value' => 'Sales',
			'label' => 'Sales'
			],[
			'value' => 'Research/Development',
			'label' => 'Research/Development'
			],[
			'value' => 'IT',
			'label' => 'IT'
			],[
			'value' => 'Human Resource',
			'label' => 'Human Resource'
			],[
			'value' => 'Production',
			'label' => 'Production'
			],[
			'value' => 'Administration/Organization',
			'label' => 'Administration/Organization'
			],[
			'value' => 'Accounting/Controlling',
			'label' => 'Accounting/Controlling'
			],[
			'value' => 'Market Research/Documentation',
			'label' => 'Market Research/Documentation'
			],[
			'value' => 'Project Management',
			'label' => 'Project Management'
			],[
			'value' => 'Logistics/Warehouse/Transport',
			'label' => 'Logistics/Warehouse/Transport'
			],[
			'value' => 'Maintenance/Repair',
			'label' => 'Maintenance/Repair'
			],[
			'value' => 'Other',
			'label' => 'Other'
			]],
			'value' => 'Management',
			'classes' => 'wi_25',
			],
			[
			'id' => 'phonep',
			'name' => 'phonep',
			'label' => 'Work Phone',
			'type' => 'text',
			'classes' => 'wi_25',
			],
			[
			'id' => 'mobilep',
			'name' => 'mobilep',
			'label' => 'Work Mobile',
			'type' => 'text',
			'classes' => 'wi_25',
			]
			],
			],[
			'id' => 'invoicing-address-form1',
			'label' => 'Invoicing address form',
			'fields' => [[
			'id' => 'emaddressp',
			'name' => 'emaddressp',
			'label' => 'Address',
			'type' => 'text',
			'classes' => 'wi_25',
			]
			,[
			'id' => 'emzipcodep',
			'name' => 'emzipcodep',
			'label' => 'Zip code',
			'type' => 'text',
			'classes' => 'wi_12_5',
			],[
			'id' => 'emcityp',
			'name' => 'emcityp',
			'label' => 'City',
			'type' => 'text',
			'classes' => 'wi_12_5',
			],[
			'id' => 'emcountryp',
			'name' => 'emcountryp',
			'label' => 'Country',
			'type' => 'select',
			'options'  => 'countries_list',
			'classes' => 'wi_25',
			]
			,[
			'id' => 'i_paymentp',
			'name' => 'i_paymentp',
			'label' => 'Payment terms',
			'type' => 'text',
			
			'classes' => 'wi_25',
			],[
			'id' => 'i_costp',
			'name' => 'i_costp',
			'label' => 'Cost center',
			'type' => 'text',
			
			'classes' => 'wi_25',
			],[
			'id' => 'i_pricep',
			'name' => 'i_pricep',
			'label' => 'Price list',
			'type' => 'select',
			'options' => [[
			'value' => '1',
			'label' => 'Price list A'
			],[
			'value' => '2',
			'label' => 'Price list B'
			]],
			'value' => '2',
			'classes' => 'wi_25',
			],[
			'id' => 'i_orderp',
			'name' => 'i_orderp',
			'label' => 'Order number',
			'type' => 'text',
			
			'classes' => 'wi_25',
			],[
			'id' => 'i_currencyp',
			'name' => 'i_currencyp',
			'label' => 'Currency',
			'type' => 'select',
			'options' => [[
			'value' => '1',
			'label' => 'SEK'
			]],
			'value' => 'SEK',
			'classes' => 'wi_8_3',
			],[
			'id' => 'i_ratep',
			'name' => 'i_ratep',
			'label' => 'Rate',
			'type' => 'text',
			'value' => '',
			'classes' => 'wi_8_3',
			],[
			'id' => 'i_unitp',
			'name' => 'i_unitp',
			'label' => 'Unit',
			'type' => 'text',
			'value' => '',
			'classes' => 'wi_8_3',
			]
			]
			],[
			'id' => 'delivery-address-form1',
			'label' => 'Delivery address form',
			'fields' => [[
			'id' => 'daddressp',
			'name' => 'daddressp',
			'label' => 'Address',
			'type' => 'text',
			'classes' => 'wi_25',
			]
			,[
			'id' => 'dzipcodep',
			'name' => 'dzipcodep',
			'label' => 'Zip code',
			'type' => 'text',
			'classes' => 'wi_12_5',
			],[
			'id' => 'dcityp',
			'name' => 'dcityp',
			'label' => 'City',
			'type' => 'text',
			'classes' => 'wi_12_5',
			],[
			'id' => 'dcountryp',
			'name' => 'dcountryp',
			'label' => 'Country',
			'type' => 'select',
			'options'  => 'countries_list',
			'classes' => 'wi_25',
			]
			,[
			'id' => 'd_methodp',
			'name' => 'd_methodp',
			'label' => 'Delivery method',
			'type' => 'select',
			'options' => [[
			'value' => '1',
			'label' => 'Method 1'
			],[
			'value' => '2',
			'label' => 'Method 2'
			]],
			'value' => '2',
			'classes' => 'wi_25',
			],[
			'id' => 'd_termsp',
			'name' => 'd_termsp',
			'label' => 'Delivery terms',
			'type' => 'select',
			'options' => [[
			'value' => '1',
			'label' => 'Term 1'
			],[
			'value' => '2',
			'label' => 'Term 2'
			]],
			'value' => '2',
			'classes' => 'wi_25',
			]
			,[
			'id' => 'inde',
			'name' => 'inde',
			'label' => '',
			'type' => 'hidden',
			'value' => $_POST['id'],
			'classes' => 'wi_5',
			]
			]
			]
			],
			'buttons' => ['<a href="#" class="dblue_btn marrl5 fsz16"  onclick="submitPosition();">Finish</a>']
			
			];
			return (json_encode($r));
			
		}
		
		function addActivePosition()
		{
			$dbCon = AppModel::createConnection();
			//print_r($_POST); die;
			$r['status'] = 'ok';
			$r['message'] = [
			'id' => 'facebook1',
			'label' => 'Add Position',
			'label_class' => 'frmlblue_bg',
			'tabs' => [
			[
			'id' => 'invoicing-address1',
			'label' => 'Position',
			'state'  => 'active',
			'fields' => [[
			'id' => 'titlep',
			'name' => 'titlep',
			'label' => 'Position Type',
			'type' => 'select',
			'options' => [[
			'value' => '1',
			'label' => 'Primary'
			],[
			'value' => '2',
			'label' => 'Secondary'
			],[
			'value' => '3',
			'label' => 'Thirdly'
			]
			,[
			'value' => '4',
			'label' => 'Fourthly'
			],[
			'value' => '5',
			'label' => 'Fifth'
			],[
			'value' => '6',
			'label' => 'Sixth'
			],[
			'value' => '7',
			'label' => 'Seventh'
			],[
			'value' => '8',
			'label' => 'Eighth'
			],[
			'value' => '9',
			'label' => 'Nineth'
			],[
			'value' => '10',
			'label' => 'Tenth'
			]],
			'value' => '1',
			'classes' => 'wi_25',
			],
			[
			'id' => 'a_datep',
			'name' => 'a_datep',
			'label' => 'Applied Date',
			'type' => 'date',
			
			'classes' => 'wi_25',
			],
			[
			'id' => 'joboffer_datep',
			'name' => 'joboffer_datep',
			'label' => 'Job Offer Date',
			'type' => 'date',
			
			'classes' => 'wi_25',
			],
			[
			'id' => 'ac_datep',
			'name' => 'ac_datep',
			'label' => 'Job Accepted Date',
			'type' => 'date',
			
			'classes' => 'wi_25',
			],
			
			[
			'id' => 'h_times',
			'name' => 'h_times',
			'label' => 'How Many %',
			'type' => 'number',
			
			'classes' => 'wi_25',
			],
			
			[
			'id' => 'e_typep',
			'name' => 'e_typep',
			'label' => 'Employee Type',
			'type' => 'select',
			'options' => [[
			'value' => 'Fulltime',
			'label' => 'Fulltime'
			],[
			'value' => 'Part time',
			'label' => 'Part time'
			],[
			'value' => 'Contract',
			'label' => 'Contract'
			]
			,[
			'value' => 'Temporary',
			'label' => 'Temporary'
			],[
			'value' => 'Volunteer',
			'label' => 'Volunteer'
			],[
			'value' => 'Other',
			'label' => 'Other'
			]],
			'value' => 'Fulltime',
			'classes' => 'wi_25',
			],
			[
			'id' => 's_datep',
			'name' => 's_datep',
			'label' => 'Start Date',
			'type' => 'date',
			
			'classes' => 'wi_25',
			],[
			'id' => 'r_datep',
			'name' => 'r_datep',
			'label' => 'Resigned Date',
			'type' => 'date',
			
			'classes' => 'wi_25',
			
			],
			
			[
			'id' => 'job_familyp',
			'name' => 'job_familyp',
			'label' => 'Job Family',
			'type' => 'select',
			'options'  => 'job_list',
			'classes' => 'wi_25',
			
			],
			[
			'id' => 'job_functionp',
			'name' => 'job_functionp',
			'label' => 'Job Function',
			'type' => 'select',
			'options' => [[
			'value' => '',
			'label' => 'Select'
			]],
			'classes' => 'wi_25',
			
			],
			[
			'id' => 'pos_namep',
			'name' => 'pos_namep',
			'label' => 'Position',
			'type' => 'select',
			'options' => [[
			'value' => '',
			'label' => 'Select'
			]],
			'classes' => 'wi_25',
			
			],
			[
			'id' => 'descp',
			'name' => 'descp',
			'label' => 'Job Description',
			'type' => 'textarea',
			
			'classes' => 'wi_25',
			],
			[
			'id' => 'locatip',
			'name' => 'locatip',
			'label' => 'Location',
			'type' => 'select',
			'options'  => 'location_list',
			'classes' => 'wi_25',
			
			],
			[
			'id' => 'departmentp',
			'name' => 'departmentp',
			'label' => 'Department',
			'type' => 'select',
			'options' => [[
			'value' => 'Management',
			'label' => 'Management'
			],[
			'value' => 'Purchasing',
			'label' => 'Purchasing'
			],[
			'value' => 'Marketing/Advertising',
			'label' => 'Marketing/Advertising'
			]
			,[
			'value' => 'Sales',
			'label' => 'Sales'
			],[
			'value' => 'Research/Development',
			'label' => 'Research/Development'
			],[
			'value' => 'IT',
			'label' => 'IT'
			],[
			'value' => 'Human Resource',
			'label' => 'Human Resource'
			],[
			'value' => 'Production',
			'label' => 'Production'
			],[
			'value' => 'Administration/Organization',
			'label' => 'Administration/Organization'
			],[
			'value' => 'Accounting/Controlling',
			'label' => 'Accounting/Controlling'
			],[
			'value' => 'Market Research/Documentation',
			'label' => 'Market Research/Documentation'
			],[
			'value' => 'Project Management',
			'label' => 'Project Management'
			],[
			'value' => 'Logistics/Warehouse/Transport',
			'label' => 'Logistics/Warehouse/Transport'
			],[
			'value' => 'Maintenance/Repair',
			'label' => 'Maintenance/Repair'
			],[
			'value' => 'Other',
			'label' => 'Other'
			]],
			'value' => 'Management',
			'classes' => 'wi_25',
			],
			[
			'id' => 'phonep',
			'name' => 'phonep',
			'label' => 'Work Phone',
			'type' => 'text',
			'classes' => 'wi_25',
			],
			[
			'id' => 'mobilep',
			'name' => 'mobilep',
			'label' => 'Work Mobile',
			'type' => 'text',
			'classes' => 'wi_25',
			]
			],
			],[
			'id' => 'Resource_Price',
			'label' => 'Resource Price',
			'fields' => [[
			'id' => 'rprice',
			'name' => 'rprice',
			'label' => 'Price',
			'type' => 'number',
			'classes' => 'wi_25',
			'min' =>'0',
			]
			
			]
			],[
			'id' => 'invoicing-address-form1',
			'label' => 'Invoicing address form',
			'fields' => [[
			'id' => 'emaddressp',
			'name' => 'emaddressp',
			'label' => 'Address',
			'type' => 'text',
			'classes' => 'wi_25',
			]
			,[
			'id' => 'emzipcodep',
			'name' => 'emzipcodep',
			'label' => 'Zip code',
			'type' => 'text',
			'classes' => 'wi_12_5',
			],[
			'id' => 'emcityp',
			'name' => 'emcityp',
			'label' => 'City',
			'type' => 'text',
			'classes' => 'wi_12_5',
			],[
			'id' => 'emcountryp',
			'name' => 'emcountryp',
			'label' => 'Country',
			'type' => 'select',
			'options'  => 'countries_list',
			'classes' => 'wi_25',
			]
			,[
			'id' => 'i_paymentp',
			'name' => 'i_paymentp',
			'label' => 'Payment terms',
			'type' => 'text',
			
			'classes' => 'wi_25',
			],[
			'id' => 'i_costp',
			'name' => 'i_costp',
			'label' => 'Cost center',
			'type' => 'text',
			
			'classes' => 'wi_25',
			],[
			'id' => 'i_pricep',
			'name' => 'i_pricep',
			'label' => 'Price list',
			'type' => 'select',
			'options' => [[
			'value' => '1',
			'label' => 'Price list A'
			],[
			'value' => '2',
			'label' => 'Price list B'
			]],
			'value' => '2',
			'classes' => 'wi_25',
			],[
			'id' => 'i_orderp',
			'name' => 'i_orderp',
			'label' => 'Order number',
			'type' => 'text',
			
			'classes' => 'wi_25',
			],[
			'id' => 'i_currencyp',
			'name' => 'i_currencyp',
			'label' => 'Currency',
			'type' => 'select',
			'options' => [[
			'value' => '1',
			'label' => 'SEK'
			]],
			'value' => 'SEK',
			'classes' => 'wi_8_3',
			],[
			'id' => 'i_ratep',
			'name' => 'i_ratep',
			'label' => 'Rate',
			'type' => 'text',
			'value' => '',
			'classes' => 'wi_8_3',
			],[
			'id' => 'i_unitp',
			'name' => 'i_unitp',
			'label' => 'Unit',
			'type' => 'text',
			'value' => '',
			'classes' => 'wi_8_3',
			]
			]
			],[
			'id' => 'delivery-address-form1',
			'label' => 'Delivery address form',
			'fields' => [[
			'id' => 'daddressp',
			'name' => 'daddressp',
			'label' => 'Address',
			'type' => 'text',
			'classes' => 'wi_25',
			]
			,[
			'id' => 'dzipcodep',
			'name' => 'dzipcodep',
			'label' => 'Zip code',
			'type' => 'text',
			'classes' => 'wi_12_5',
			],[
			'id' => 'dcityp',
			'name' => 'dcityp',
			'label' => 'City',
			'type' => 'text',
			'classes' => 'wi_12_5',
			],[
			'id' => 'dcountryp',
			'name' => 'dcountryp',
			'label' => 'Country',
			'type' => 'select',
			'options'  => 'countries_list',
			'classes' => 'wi_25',
			]
			,[
			'id' => 'd_methodp',
			'name' => 'd_methodp',
			'label' => 'Delivery method',
			'type' => 'select',
			'options' => [[
			'value' => '1',
			'label' => 'Method 1'
			],[
			'value' => '2',
			'label' => 'Method 2'
			]],
			'value' => '2',
			'classes' => 'wi_25',
			],[
			'id' => 'd_termsp',
			'name' => 'd_termsp',
			'label' => 'Delivery terms',
			'type' => 'select',
			'options' => [[
			'value' => '1',
			'label' => 'Term 1'
			],[
			'value' => '2',
			'label' => 'Term 2'
			]],
			'value' => '2',
			'classes' => 'wi_25',
			]
			,[
			'id' => 'inde',
			'name' => 'inde',
			'label' => '',
			'type' => 'hidden',
			'value' => $_POST['id'],
			'classes' => 'wi_5',
			]
			]
			]
			],
			'buttons' => ['<a href="#" class="dblue_btn marrl5 fsz16"  onclick="submitActivePosition();">Finish</a>']
			
			];
			return (json_encode($r));
			
		}
		
		function editActivePosition()
		{
			$dbCon = AppModel::createConnection();
			$cid=explode('_',$_POST['id']);
			$stmt = $dbCon->prepare("select * from employee_position where id=?");
			$stmt->bind_param("i" ,$cid['1']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$job_func=array();
			$job_pos=array();
			$job_fam=array();
			$stmt = $dbCon->prepare("select id,job_family from job_family");
			
			$stmt->execute();
			$result = $stmt->get_result();
			$i=0;
			while($rowJob=mysqli_fetch_array($result))
			{
				$job_fam[$i]['value']=$rowJob['id'];
				$job_fam[$i]['label']=$rowJob['job_family'];
				$i++;
			}
			
			if($row['job_family']!=null || $row['job_family']!="")
			{
				$stmt = $dbCon->prepare("select id,job_function from job_function_vacancy where job_family_id=?");
				$stmt->bind_param("i" ,$row['job_family']);
				$stmt->execute();
				$result = $stmt->get_result();
				$i=0;
				while($rowJob=mysqli_fetch_array($result))
				{
					$job_func[$i]['value']=$rowJob['id'];
					$job_func[$i]['label']=$rowJob['job_function'];
					$i++;
				}
				
			}
			
			
			if($row['job_function']!=null || $row['job_function']!="")
			{
				$stmt = $dbCon->prepare("select * from job_position where job_function_id=?");
				$stmt->bind_param("i" ,$row['job_function']);
				$stmt->execute();
				$result = $stmt->get_result();
				$i=0;
				while($rowJob=mysqli_fetch_array($result))
				{
					$job_pos[$i]['value']=$rowJob['id'];
					$job_pos[$i]['label']=$rowJob['job_position'];
					$i++;
					
				}
				
			}
			
			
			
			if($cid['0']=='pa')
			{
				$r['status'] = 'ok';
				$r['message'] = [
				'id' => 'facebook1',
				'label' => 'Edit Position',
				'label_class' => 'frmlblue_bg',
				'tabs' => [
				[
				'id' => 'invoicing-address1',
				'label' => 'Position',
				'state'  => 'active',
				'fields' => [[
				'id' => 'titlep',
				'name' => 'titlep',
				'label' => 'Position Type',
				'type' => 'select',
				'options' => [[
				'value' => '1',
				'label' => 'Primary'
				],[
				'value' => '2',
				'label' => 'Secondary'
				],[
				'value' => '3',
				'label' => 'Thirdly'
				]
				,[
				'value' => '4',
				'label' => 'Fourthly'
				],[
				'value' => '5',
				'label' => 'Fifth'
				],[
				'value' => '6',
				'label' => 'Sixth'
				],[
				'value' => '7',
				'label' => 'Seventh'
				],[
				'value' => '8',
				'label' => 'Eighth'
				],[
				'value' => '9',
				'label' => 'Nineth'
				],[
				'value' => '10',
				'label' => 'Tenth'
				]],
				'value' => $row['position_detail'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'a_datep',
				'name' => 'a_datep',
				'label' => 'Applied Date',
				'type' => 'date',
				'value' => $row['applied_on'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'joboffer_datep',
				'name' => 'joboffer_datep',
				'label' => 'Job Offer Date',
				'type' => 'date',
				'value' => $row['job_offer_date'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'ac_datep',
				'name' => 'ac_datep',
				'label' => 'Job Accepted Date',
				'type' => 'date',
				'value' => $row['job_accepted'],
				'classes' => 'wi_25',
				],
				
				[
				'id' => 'h_times',
				'name' => 'h_times',
				'label' => 'How Many %',
				'type' => 'number',
				'value' => $row['how_many_time'],
				'classes' => 'wi_25',
				],
				
				[
				'id' => 'e_typep',
				'name' => 'e_typep',
				'label' => 'Employee Type',
				'type' => 'select',
				'options' => [[
				'value' => 'Fulltime',
				'label' => 'Fulltime'
				],[
				'value' => 'Part time',
				'label' => 'Part time'
				],[
				'value' => 'Contract',
				'label' => 'Contract'
				]
				,[
				'value' => 'Temporary',
				'label' => 'Temporary'
				],[
				'value' => 'Volunteer',
				'label' => 'Volunteer'
				],[
				'value' => 'Other',
				'label' => 'Other'
				]],
				'value' => $row['emp_type'],
				'classes' => 'wi_25',
				],
				[
				'id' => 's_datep',
				'name' => 's_datep',
				'label' => 'Start Date',
				'type' => 'date',
				'value' => $row['start_date'],
				'classes' => 'wi_25',
				],[
				'id' => 'r_datep',
				'name' => 'r_datep',
				'label' => 'Resigned Date',
				'type' => 'date',
				'value' => $row['resigned_on'],
				'classes' => 'wi_25',
				
				],
				
				[
				'id' => 'job_familyp',
				'name' => 'job_familyp',
				'label' => 'Job Family',
				'type' => 'select',
				'options'  => $job_fam,
				'value' => $row['job_family'],
				'classes' => 'wi_25',
				
				],
				[
				'id' => 'job_functionp',
				'name' => 'job_functionp',
				'label' => 'Job Function',
				'type' => 'select',
				'options' => $job_func,
				'value' => $row['job_function'],
				'classes' => 'wi_25',
				
				],
				[
				'id' => 'pos_namep',
				'name' => 'pos_namep',
				'label' => 'Position',
				'type' => 'select',
				'options' => $job_pos,
				'value' => $row['job_position'],
				'classes' => 'wi_25',
				
				],
				[
				'id' => 'descp',
				'name' => 'descp',
				'label' => 'Job Description',
				'type' => 'textarea',
				'value' => $row['job_description'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'locatip',
				'name' => 'locatip',
				'label' => 'Location',
				'type' => 'select',
				'options'  => 'location_list',
				'value' => $row['location_id'],
				'classes' => 'wi_25',
				
				],
				[
				'id' => 'departmentp',
				'name' => 'departmentp',
				'label' => 'Department',
				'type' => 'select',
				'options' => [[
				'value' => 'Management',
				'label' => 'Management'
				],[
				'value' => 'Purchasing',
				'label' => 'Purchasing'
				],[
				'value' => 'Marketing/Advertising',
				'label' => 'Marketing/Advertising'
				]
				,[
				'value' => 'Sales',
				'label' => 'Sales'
				],[
				'value' => 'Research/Development',
				'label' => 'Research/Development'
				],[
				'value' => 'IT',
				'label' => 'IT'
				],[
				'value' => 'Human Resource',
				'label' => 'Human Resource'
				],[
				'value' => 'Production',
				'label' => 'Production'
				],[
				'value' => 'Administration/Organization',
				'label' => 'Administration/Organization'
				],[
				'value' => 'Accounting/Controlling',
				'label' => 'Accounting/Controlling'
				],[
				'value' => 'Market Research/Documentation',
				'label' => 'Market Research/Documentation'
				],[
				'value' => 'Project Management',
				'label' => 'Project Management'
				],[
				'value' => 'Logistics/Warehouse/Transport',
				'label' => 'Logistics/Warehouse/Transport'
				],[
				'value' => 'Maintenance/Repair',
				'label' => 'Maintenance/Repair'
				],[
				'value' => 'Other',
				'label' => 'Other'
				]],
				'value' => $row['department_id'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'phonep',
				'name' => 'phonep',
				'label' => 'Work Phone',
				'type' => 'text',
				'value' => $row['work_phone'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'mobilep',
				'name' => 'mobilep',
				'label' => 'Work Mobile',
				'type' => 'text',
				'value' => $row['work_mobile'],
				'classes' => 'wi_25',
				]
				],
				],[
				'id' => 'Resource_Price',
				'label' => 'Resource Price',
				'fields' => [[
				'id' => 'rprice',
				'name' => 'rprice',
				'label' => 'Price',
				'type' => 'number',
				'value' => $row['price'],
				'classes' => 'wi_25',
				'min' =>'0',
				]
				
				]
				],[
				'id' => 'invoicing-address-form1',
				'label' => 'Invoicing address form',
				'fields' => [[
				'id' => 'emaddressp',
				'name' => 'emaddressp',
				'label' => 'Address',
				'type' => 'text',
				'value' => $row['i_address'],
				'classes' => 'wi_25',
				]
				,[
				'id' => 'emzipcodep',
				'name' => 'emzipcodep',
				'label' => 'Zip code',
				'type' => 'text',
				'value' => $row['i_zipcode'],
				'classes' => 'wi_12_5',
				],[
				'id' => 'emcityp',
				'name' => 'emcityp',
				'label' => 'City',
				'type' => 'text',
				'value' => $row['i_city'],
				'classes' => 'wi_12_5',
				],[
				'id' => 'emcountryp',
				'name' => 'emcountryp',
				'label' => 'Country',
				'type' => 'select',
				'options'  => 'countries_list',
				'value' => $row['i_country'],
				'classes' => 'wi_25',
				]
				,[
				'id' => 'i_paymentp',
				'name' => 'i_paymentp',
				'label' => 'Payment terms',
				'value' => $row['i_payment'],
				'type' => 'text',
				
				'classes' => 'wi_25',
				],[
				'id' => 'i_costp',
				'name' => 'i_costp',
				'label' => 'Cost center',
				
				'type' => 'text',
				'value' => $row['i_cost'],
				'classes' => 'wi_25',
				],[
				'id' => 'i_pricep',
				'name' => 'i_pricep',
				'label' => 'Price list',
				'type' => 'select',
				'options' => [[
				'value' => '1',
				'label' => 'Price list A'
				],[
				'value' => '2',
				'label' => 'Price list B'
				]],
				'value' => $row['i_price'],
				'classes' => 'wi_25',
				],[
				'id' => 'i_orderp',
				'name' => 'i_orderp',
				'label' => 'Order number',
				'type' => 'text',
				'value' => $row['i_order'],
				'classes' => 'wi_25',
				],[
				'id' => 'i_currencyp',
				'name' => 'i_currencyp',
				'label' => 'Currency',
				'type' => 'select',
				'options' => [[
				'value' => '1',
				'label' => 'SEK'
				]],
				'value' => 'SEK',
				'classes' => 'wi_8_3',
				],[
				'id' => 'i_ratep',
				'name' => 'i_ratep',
				'label' => 'Rate',
				'type' => 'text',
				'value' => $row['i_rate'],
				'classes' => 'wi_8_3',
				],[
				'id' => 'i_unitp',
				'name' => 'i_unitp',
				'label' => 'Unit',
				'type' => 'text',
				'value' => $row['i_unit'],
				'classes' => 'wi_8_3',
				]
				]
				],[
				'id' => 'delivery-address-form1',
				'label' => 'Delivery address form',
				'fields' => [[
				'id' => 'daddressp',
				'name' => 'daddressp',
				'label' => 'Address',
				'type' => 'text',
				'value' => $row['d_address'],
				'classes' => 'wi_25',
				]
				,[
				'id' => 'dzipcodep',
				'name' => 'dzipcodep',
				'label' => 'Zip code',
				'type' => 'text',
				'value' => $row['d_zipcode'],
				'classes' => 'wi_12_5',
				],[
				'id' => 'dcityp',
				'name' => 'dcityp',
				'label' => 'City',
				'type' => 'text',
				'value' => $row['d_city'],
				'classes' => 'wi_12_5',
				],[
				'id' => 'dcountryp',
				'name' => 'dcountryp',
				'label' => 'Country',
				'type' => 'select',
				'options'  => 'countries_list',
				'value' => $row['d_country'],
				'classes' => 'wi_25',
				]
				,[
				'id' => 'd_methodp',
				'name' => 'd_methodp',
				'label' => 'Delivery method',
				'type' => 'select',
				'options' => [[
				'value' => '1',
				'label' => 'Method 1'
				],[
				'value' => '2',
				'label' => 'Method 2'
				]],
				'value' => $row['d_method'],
				'classes' => 'wi_25',
				],[
				'id' => 'd_termsp',
				'name' => 'd_termsp',
				'label' => 'Delivery terms',
				'type' => 'select',
				'options' => [[
				'value' => '1',
				'label' => 'Term 1'
				],[
				'value' => '2',
				'label' => 'Term 2'
				]],
				'value' => $row['d_terms'],
				'classes' => 'wi_25',
				]
				,[
				'id' => 'inde',
				'name' => 'inde',
				'label' => '',
				'type' => 'hidden',
				'value' => $_POST['id'],
				'classes' => 'wi_5',
				]
				,[
				'id' => 'edi',
				'name' => 'edi',
				'label' => '',
				'type' => 'hidden',
				'value' => '1',
				'classes' => 'wi_5',
				]
				]
				]
				],
				'buttons' => ['<a href="#" class="dblue_btn marrl5 fsz16"  onclick="submitEditActivePosition();">Finish</a>']
				
				];
				
				return (json_encode($r));
				
			}
			else
			{
				$r['status'] = 'ok';
				$r['message'] = [
				'id' => 'facebook1',
				'label' => 'Edit Position',
				'label_class' => 'frmlblue_bg',
				'tabs' => [
				[
				'id' => 'invoicing-address1',
				'label' => 'Position',
				'state'  => 'active',
				'fields' => [[
				'id' => 'titlep',
				'name' => 'titlep',
				'label' => 'Position Type',
				'type' => 'select',
				'options' => [[
				'value' => '1',
				'label' => 'Primary'
				],[
				'value' => '2',
				'label' => 'Secondary'
				],[
				'value' => '3',
				'label' => 'Thirdly'
				]
				,[
				'value' => '4',
				'label' => 'Fourthly'
				],[
				'value' => '5',
				'label' => 'Fifth'
				],[
				'value' => '6',
				'label' => 'Sixth'
				],[
				'value' => '7',
				'label' => 'Seventh'
				],[
				'value' => '8',
				'label' => 'Eighth'
				],[
				'value' => '9',
				'label' => 'Nineth'
				],[
				'value' => '10',
				'label' => 'Tenth'
				]],
				'value' => $row['position_detail'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'a_datep',
				'name' => 'a_datep',
				'label' => 'Applied Date',
				'type' => 'date',
				'value' => $row['applied_on'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'joboffer_datep',
				'name' => 'joboffer_datep',
				'label' => 'Job Offer Date',
				'type' => 'date',
				'value' => $row['job_offer_date'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'ac_datep',
				'name' => 'ac_datep',
				'label' => 'Job Accepted Date',
				'type' => 'date',
				'value' => $row['job_accepted'],
				'classes' => 'wi_25',
				],
				
				[
				'id' => 'h_times',
				'name' => 'h_times',
				'label' => 'How Many %',
				'type' => 'number',
				'value' => $row['how_many_time'],
				'classes' => 'wi_25',
				],
				
				[
				'id' => 'e_typep',
				'name' => 'e_typep',
				'label' => 'Employee Type',
				'type' => 'select',
				'options' => [[
				'value' => 'Fulltime',
				'label' => 'Fulltime'
				],[
				'value' => 'Part time',
				'label' => 'Part time'
				],[
				'value' => 'Contract',
				'label' => 'Contract'
				]
				,[
				'value' => 'Temporary',
				'label' => 'Temporary'
				],[
				'value' => 'Volunteer',
				'label' => 'Volunteer'
				],[
				'value' => 'Other',
				'label' => 'Other'
				]],
				'value' => $row['emp_type'],
				'classes' => 'wi_25',
				],
				[
				'id' => 's_datep',
				'name' => 's_datep',
				'label' => 'Start Date',
				'type' => 'date',
				'value' => $row['start_date'],
				'classes' => 'wi_25',
				],[
				'id' => 'r_datep',
				'name' => 'r_datep',
				'label' => 'Resigned Date',
				'type' => 'date',
				'value' => $row['resigned_on'],
				'classes' => 'wi_25',
				
				],
				
				[
				'id' => 'job_familyp',
				'name' => 'job_familyp',
				'label' => 'Job Family',
				'type' => 'select',
				'options'  => $job_fam,
				'classes' => 'wi_25',
				'value' => $row['job_family'],
				],
				[
				'id' => 'job_functionp',
				'name' => 'job_functionp',
				'label' => 'Job Function',
				'type' => 'select',
				'options' => $job_func,
				'value' => $row['job_function'],
				'classes' => 'wi_25',
				
				],
				[
				'id' => 'pos_namep',
				'name' => 'pos_namep',
				'label' => 'Position',
				'type' => 'select',
				'options' => $job_pos,
				'value' => $row['job_position'],
				'classes' => 'wi_25',
				
				],
				[
				'id' => 'descp',
				'name' => 'descp',
				'label' => 'Job Description',
				'type' => 'textarea',
				'value' => $row['job_description'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'locatip',
				'name' => 'locatip',
				'label' => 'Location',
				'type' => 'select',
				'options'  => 'location_list',
				'value' => $row['location_id'],
				'classes' => 'wi_25',
				
				],
				[
				'id' => 'departmentp',
				'name' => 'departmentp',
				'label' => 'Department',
				'type' => 'select',
				'options' => [[
				'value' => 'Management',
				'label' => 'Management'
				],[
				'value' => 'Purchasing',
				'label' => 'Purchasing'
				],[
				'value' => 'Marketing/Advertising',
				'label' => 'Marketing/Advertising'
				]
				,[
				'value' => 'Sales',
				'label' => 'Sales'
				],[
				'value' => 'Research/Development',
				'label' => 'Research/Development'
				],[
				'value' => 'IT',
				'label' => 'IT'
				],[
				'value' => 'Human Resource',
				'label' => 'Human Resource'
				],[
				'value' => 'Production',
				'label' => 'Production'
				],[
				'value' => 'Administration/Organization',
				'label' => 'Administration/Organization'
				],[
				'value' => 'Accounting/Controlling',
				'label' => 'Accounting/Controlling'
				],[
				'value' => 'Market Research/Documentation',
				'label' => 'Market Research/Documentation'
				],[
				'value' => 'Project Management',
				'label' => 'Project Management'
				],[
				'value' => 'Logistics/Warehouse/Transport',
				'label' => 'Logistics/Warehouse/Transport'
				],[
				'value' => 'Maintenance/Repair',
				'label' => 'Maintenance/Repair'
				],[
				'value' => 'Other',
				'label' => 'Other'
				]],
				'value' => $row['department_id'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'phonep',
				'name' => 'phonep',
				'label' => 'Work Phone',
				'type' => 'text',
				'value' => $row['work_phone'],
				'classes' => 'wi_25',
				],
				[
				'id' => 'mobilep',
				'name' => 'mobilep',
				'label' => 'Work Mobile',
				'type' => 'text',
				'value' => $row['work_mobile'],
				'classes' => 'wi_25',
				]
				],
				],[
				'id' => 'invoicing-address-form1',
				'label' => 'Invoicing address form',
				'fields' => [[
				'id' => 'emaddressp',
				'name' => 'emaddressp',
				'label' => 'Address',
				'type' => 'text',
				'value' => $row['i_address'],
				'classes' => 'wi_25',
				]
				,[
				'id' => 'emzipcodep',
				'name' => 'emzipcodep',
				'label' => 'Zip code',
				'type' => 'text',
				'value' => $row['i_zipcode'],
				'classes' => 'wi_12_5',
				],[
				'id' => 'emcityp',
				'name' => 'emcityp',
				'label' => 'City',
				'type' => 'text',
				'value' => $row['i_city'],
				'classes' => 'wi_12_5',
				],[
				'id' => 'emcountryp',
				'name' => 'emcountryp',
				'label' => 'Country',
				'type' => 'select',
				'options'  => 'countries_list',
				'value' => $row['i_country'],
				'classes' => 'wi_25',
				]
				,[
				'id' => 'i_paymentp',
				'name' => 'i_paymentp',
				'label' => 'Payment terms',
				'value' => $row['i_payment'],
				'type' => 'text',
				
				'classes' => 'wi_25',
				],[
				'id' => 'i_costp',
				'name' => 'i_costp',
				'label' => 'Cost center',
				
				'type' => 'text',
				'value' => $row['i_cost'],
				'classes' => 'wi_25',
				],[
				'id' => 'i_pricep',
				'name' => 'i_pricep',
				'label' => 'Price list',
				'type' => 'select',
				'options' => [[
				'value' => '1',
				'label' => 'Price list A'
				],[
				'value' => '2',
				'label' => 'Price list B'
				]],
				'value' => $row['i_price'],
				'classes' => 'wi_25',
				],[
				'id' => 'i_orderp',
				'name' => 'i_orderp',
				'label' => 'Order number',
				'type' => 'text',
				'value' => $row['i_order'],
				'classes' => 'wi_25',
				],[
				'id' => 'i_currencyp',
				'name' => 'i_currencyp',
				'label' => 'Currency',
				'type' => 'select',
				'options' => [[
				'value' => '1',
				'label' => 'SEK'
				]],
				'value' => 'SEK',
				'classes' => 'wi_8_3',
				],[
				'id' => 'i_ratep',
				'name' => 'i_ratep',
				'label' => 'Rate',
				'type' => 'text',
				'value' => $row['i_rate'],
				'classes' => 'wi_8_3',
				],[
				'id' => 'i_unitp',
				'name' => 'i_unitp',
				'label' => 'Unit',
				'type' => 'text',
				'value' => $row['i_unit'],
				'classes' => 'wi_8_3',
				]
				]
				],[
				'id' => 'delivery-address-form1',
				'label' => 'Delivery address form',
				'fields' => [[
				'id' => 'daddressp',
				'name' => 'daddressp',
				'label' => 'Address',
				'type' => 'text',
				'value' => $row['d_address'],
				'classes' => 'wi_25',
				]
				,[
				'id' => 'dzipcodep',
				'name' => 'dzipcodep',
				'label' => 'Zip code',
				'type' => 'text',
				'value' => $row['d_zipcode'],
				'classes' => 'wi_12_5',
				],[
				'id' => 'dcityp',
				'name' => 'dcityp',
				'label' => 'City',
				'type' => 'text',
				'value' => $row['d_city'],
				'classes' => 'wi_12_5',
				],[
				'id' => 'dcountryp',
				'name' => 'dcountryp',
				'label' => 'Country',
				'type' => 'select',
				'options'  => 'countries_list',
				'value' => $row['d_country'],
				'classes' => 'wi_25',
				]
				,[
				'id' => 'd_methodp',
				'name' => 'd_methodp',
				'label' => 'Delivery method',
				'type' => 'select',
				'options' => [[
				'value' => '1',
				'label' => 'Method 1'
				],[
				'value' => '2',
				'label' => 'Method 2'
				]],
				'value' => $row['d_method'],
				'classes' => 'wi_25',
				],[
				'id' => 'd_termsp',
				'name' => 'd_termsp',
				'label' => 'Delivery terms',
				'type' => 'select',
				'options' => [[
				'value' => '1',
				'label' => 'Term 1'
				],[
				'value' => '2',
				'label' => 'Term 2'
				]],
				'value' => $row['d_terms'],
				'classes' => 'wi_25',
				]
				,[
				'id' => 'inde',
				'name' => 'inde',
				'label' => '',
				'type' => 'hidden',
				'value' => $_POST['id'],
				'classes' => 'wi_5',
				]
				,[
				'id' => 'edi',
				'name' => 'edi',
				'label' => '',
				'type' => 'hidden',
				'value' => '1',
				'classes' => 'wi_5',
				]
				]
				]
				],
				'buttons' => ['<a href="#" class="dblue_btn marrl5 fsz16"  onclick="submitEditPosition();">Finish</a>']
				
				];
				return (json_encode($r));
				
			}
		}
		
		function positionEditCheck($data)
		{
			$dbCon = AppModel::createConnection();
			$cid=explode('_',$data['eid']);
			if($cid['0']=='pa')
			{
				$stmt = $dbCon->prepare("select count(id) as num from employee_position where employee_id=(select employee_id from employee_position where id=?) and position_detail=? and id!=?");
			}
			else
			{
				$stmt = $dbCon->prepare("select count(id) as num from employee_position where virtual_employee_id=(select virtual_employee_id from employee_position where id=?)  and position_detail=? and id!=?");
			}				
			$stmt->bind_param("iii" ,$cid['1'],$data['pid'],$cid['1']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		
		
		
		function positionCheck($data)
		{
			$dbCon = AppModel::createConnection();
			$cid=explode('_',$data['eid']);
			if($cid['0']=='a')
			{
				$stmt = $dbCon->prepare("select count(id) as num from employee_position where employee_id=? and position_detail=?");
			}
			else
			{
				$stmt = $dbCon->prepare("select count(id) as num from employee_position where virtual_employee_id=? and position_detail=?");
			}				
			$stmt->bind_param("ii" ,$cid['1'],$data['pid']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		
		function addNewPosition($data)
		{
			$dbCon = AppModel::createConnection();
			$cid=explode('_',$_POST['inde']);
			$d=date('Y-m-d');
			if($cid['0']=='a')
			{
				$stmt = $dbCon->prepare("insert into employee_position (price,position_detail,applied_on,job_offer_date,job_accepted,how_many_time,emp_type,start_date,resigned_on,job_family,job_function,job_position,job_description,location_id,department_id,work_phone,work_mobile,i_address,i_zipcode,i_city,i_country,i_payment,i_cost,i_price,i_order,i_currency,i_rate,i_unit,d_address,d_zipcode,d_city,d_country,d_method,d_terms,created_on,employee_id) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$stmt->bind_param("iisssisssiiisiisssssiisisisssssiiisi" , $_POST['rprice'],$_POST['titlep'],date('Y-m-d',strtotime($_POST['a_datep'])),date('Y-m-d',strtotime($_POST['joboffer_datep'])),date('Y-m-d',strtotime($_POST['ac_datep'])),$_POST['h_times'],$_POST['e_typep'],date('Y-m-d',strtotime($_POST['s_datep'])),date('Y-m-d',strtotime($_POST['r_datep'])),$_POST['job_familyp'],$_POST['job_functionp'],$_POST['pos_namep'],$_POST['descp'],$_POST['locatip'],$_POST['departmentp'],$_POST['phonep'],$_POST['mobilep'],$_POST['emaddressp'],$_POST['emzipcodep'],$_POST['emcityp'],$_POST['emcountryp'],$_POST['i_paymentp'],$_POST['i_costp'],$_POST['i_pricep'],$_POST['i_orderp'],$_POST['i_currencyp'],$_POST['i_ratep'],$_POST['i_unitp'],$_POST['daddressp'],$_POST['dzipcodep'],$_POST['dcityp'],$_POST['dcountryp'],$_POST['d_methodp'],$_POST['d_termsp'],$d,$cid['1']);
			}
			else if($cid['0']=='v')
			{
				$stmt = $dbCon->prepare("insert into employee_position (position_detail,applied_on,job_offer_date,job_accepted,how_many_time,emp_type,start_date,resigned_on,job_family,job_function,job_position,job_description,location_id,department_id,work_phone,work_mobile,i_address,i_zipcode,i_city,i_country,i_payment,i_cost,i_price,i_order,i_currency,i_rate,i_unit,d_address,d_zipcode,d_city,d_country,d_method,d_terms,created_on,virtual_employee_id) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$stmt->bind_param("isssisssiiisiisssssiisisisssssiiisi" , $_POST['titlep'],date('Y-m-d',strtotime($_POST['a_datep'])),date('Y-m-d',strtotime($_POST['joboffer_datep'])),date('Y-m-d',strtotime($_POST['ac_datep'])),$_POST['h_times'],$_POST['e_typep'],date('Y-m-d',strtotime($_POST['s_datep'])),date('Y-m-d',strtotime($_POST['r_datep'])),$_POST['job_familyp'],$_POST['job_functionp'],$_POST['pos_namep'],$_POST['descp'],$_POST['locatip'],$_POST['departmentp'],$_POST['phonep'],$_POST['mobilep'],$_POST['emaddressp'],$_POST['emzipcodep'],$_POST['emcityp'],$_POST['emcountryp'],$_POST['i_paymentp'],$_POST['i_costp'],$_POST['i_pricep'],$_POST['i_orderp'],$_POST['i_currencyp'],$_POST['i_ratep'],$_POST['i_unitp'],$_POST['daddressp'],$_POST['dzipcodep'],$_POST['dcityp'],$_POST['dcountryp'],$_POST['d_methodp'],$_POST['d_termsp'],$d,$cid['1']);
			}	
			else if($cid['0']=='pv')
			{
				$stmt = $dbCon->prepare("update employee_position set position_detail=?,applied_on=?,job_offer_date=?,job_accepted=?,how_many_time=?,emp_type=?,start_date=?,resigned_on=?,job_family=?,job_function=?,job_position=?,job_description=?,location_id=?,department_id=?,work_phone=?,work_mobile=?,i_address=?,i_zipcode=?,i_city=?,i_country=?,i_payment=?,i_cost=?,i_price=?,i_order=?,i_currency=?,i_rate=?,i_unit=?,d_address=?,d_zipcode=?,d_city=?,d_country=?,d_method=?,d_terms=? where id=?");
				$stmt->bind_param("isssisssiiisiisssssiisisisssssiiii" , $_POST['titlep'],date('Y-m-d',strtotime($_POST['a_datep'])),date('Y-m-d',strtotime($_POST['joboffer_datep'])),date('Y-m-d',strtotime($_POST['ac_datep'])),$_POST['h_times'],$_POST['e_typep'],date('Y-m-d',strtotime($_POST['s_datep'])),date('Y-m-d',strtotime($_POST['r_datep'])),$_POST['job_familyp'],$_POST['job_functionp'],$_POST['pos_namep'],$_POST['descp'],$_POST['locatip'],$_POST['departmentp'],$_POST['phonep'],$_POST['mobilep'],$_POST['emaddressp'],$_POST['emzipcodep'],$_POST['emcityp'],$_POST['emcountryp'],$_POST['i_paymentp'],$_POST['i_costp'],$_POST['i_pricep'],$_POST['i_orderp'],$_POST['i_currencyp'],$_POST['i_ratep'],$_POST['i_unitp'],$_POST['daddressp'],$_POST['dzipcodep'],$_POST['dcityp'],$_POST['dcountryp'],$_POST['d_methodp'],$_POST['d_termsp'],$cid['1']);
			}	
			
			else if($cid['0']=='pa')
			{
				$stmt = $dbCon->prepare("update employee_position set price=?,position_detail=?,applied_on=?,job_offer_date=?,job_accepted=?,how_many_time=?,emp_type=?,start_date=?,resigned_on=?,job_family=?,job_function=?,job_position=?,job_description=?,location_id=?,department_id=?,work_phone=?,work_mobile=?,i_address=?,i_zipcode=?,i_city=?,i_country=?,i_payment=?,i_cost=?,i_price=?,i_order=?,i_currency=?,i_rate=?,i_unit=?,d_address=?,d_zipcode=?,d_city=?,d_country=?,d_method=?,d_terms=? where id=?");
				$stmt->bind_param("iisssisssiiisiisssssiisisisssssiiii" , $_POST['rprice'],$_POST['titlep'],date('Y-m-d',strtotime($_POST['a_datep'])),date('Y-m-d',strtotime($_POST['joboffer_datep'])),date('Y-m-d',strtotime($_POST['ac_datep'])),$_POST['h_times'],$_POST['e_typep'],date('Y-m-d',strtotime($_POST['s_datep'])),date('Y-m-d',strtotime($_POST['r_datep'])),$_POST['job_familyp'],$_POST['job_functionp'],$_POST['pos_namep'],$_POST['descp'],$_POST['locatip'],$_POST['departmentp'],$_POST['phonep'],$_POST['mobilep'],$_POST['emaddressp'],$_POST['emzipcodep'],$_POST['emcityp'],$_POST['emcountryp'],$_POST['i_paymentp'],$_POST['i_costp'],$_POST['i_pricep'],$_POST['i_orderp'],$_POST['i_currencyp'],$_POST['i_ratep'],$_POST['i_unitp'],$_POST['daddressp'],$_POST['dzipcodep'],$_POST['dcityp'],$_POST['dcountryp'],$_POST['d_methodp'],$_POST['d_termsp'],$cid['1']);
			}	
			
			$stmt->execute();
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
	
	
		function verifyLanguage()
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
			$stmt = $dbCon->prepare("select language_var from public_page_language where ip_address=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if(empty($row))
			{
				$stmt->close();
				$dbCon->close();
				return 'en';
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return $row['language_var'];
			}
		}
		
			function changeLanguage()
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
			
			$stmt = $dbCon->prepare("select id from public_page_language where ip_address=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s",$ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("INSERT INTO public_page_language (language_var, ip_address, created_on ) VALUES (?, ?, now())");
			
			/* bind parameters for markers */
			$stmt->bind_param("ss", $_POST['lang'],$ip);
			$stmt->execute();
			
			}
			else
			{
			$stmt = $dbCon->prepare("update public_page_language set language_var=? where ip_address=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ss", $_POST['lang'],$ip);
			$stmt->execute();
				
			}
			
				$stmt->close();
				$dbCon->close();
				return 1;
			
		}
	
	
	function base64_to_jpeg($base64_string, $output_file) {
   
    $ifp = fopen( $output_file, 'wb' ); 

    $data = explode( ',', $base64_string );

    fwrite( $ifp, base64_decode( $data[1] ) );

   
    fclose( $ifp ); 

    return $output_file; 
}

function companyInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			
			
			$stmt = $dbCon->prepare("select company_id from employees where id = ?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $this -> encrypt_decrypt('encrypt',$row['company_id']);
			
			
		}
	
	function representativeListSearch($data)
    {
        $dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		ini_set('memory_limit', '-1');
		
						
		$p="%".$_POST['message']."%";
					
		$a=$_POST['id']*20;
		$b=20;
				
					$stmt = $dbCon->prepare("select address,passport_image,employees.first_name,employees.id,concat_ws(' ',employees.first_name,employees.last_name)  as name,company_name,employees.email,employees.user_login_id from employees left join companies on companies.id=employees.company_id left join user_logins on user_logins.id=employees.user_login_id  join company_profiles on company_profiles.company_id=employees.company_id  where  lower(employees.first_name) like ? and employees.company_id=? order by employees.first_name limit ?,?");
				 $stmt->bind_param("siii", $p,$company_id,$a,$b);
				
				
				 $stmt->execute();
				$result = $stmt->get_result();
				 $org="";
				
				 while($row = $result->fetch_assoc())
					{
						$title='';
						$location='';
						$img='';
						$stmt = $dbCon->prepare("select title from user_company_profile where user_login_id=? and company_id=?");
						 $stmt->bind_param("ii", $row['user_login_id'],$company_id);
						 $stmt->execute();
						$resulte = $stmt->get_result();
						$rowe = $resulte->fetch_assoc();
						
						if(empty($rowe))
						{
							$title='Employee';
						}
						else
						{
							$title=$rowe['title'];
						}
						
						 $stmt = $dbCon->prepare("select visiting_address from employee_location left join property_location on property_location.id=employee_location.location_id where employee_id=?");
						 $stmt->bind_param("i", $row['id']);
						 $stmt->execute();
						$resulte = $stmt->get_result();
						$rowe = $resulte->fetch_assoc();
						
						 if($rowe['visiting_address']==null || $rowe['visiting_address']=='') 
						 {
							$location=$row['address'];
						 }
						 else
						 {
						$location=$rowe['visiting_address'];	 
						 }
						
						$enc=$this -> encrypt_decrypt('encrypt',$row['id']);
						 if($row['passport_image']!=null || $row['passport_image']!="") { 
						 
						 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; }
						 
						$img='
																	<div class="wi_50p xs-wi_100 hei_50p xs-hei_45p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 yellow_bg_a" ><img src="../../../'.$imgs.'" width="45px;" height="45px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div>';
																	
																	 } else { $img=' <div class="wi_50p xs-wi_80 hei_50p xs-hei_45p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg" width="45px;" height="45px;" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;" > '.substr($row['first_name'],0,1).' </div> 
																	 '; 
																	 
																	 $imgs="../html/usercontent/images/person-male.png";
																	 }
							$org=$org.'<div class=" white_bg marb10  brdb visible-xs" style="">
										<div class="container padrl10 padb20 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marl15 "> 
																	'.$img.'</div>
													
													<div class="fleft wi_50 xxs-wi_60 sm-wi_50 xsip-wi_50   "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir
">'.substr($title,0,23).'</span>
<span class="trn fsz18  black_txt ffamily_avenir  ">'.substr(html_entity_decode($row['name']),0,21).'</span>  </div>
													
													
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div>
									<div class="xs-wi_100 xsip-wi_33 sm-wi_33 wi_25 fleft bs_bb padrb20 talc  hidden-xs" >
													<div class="toggle-parent wi_100 dflex alit_s">
														<div class="wi_100 dnone_pa ">
															<a href="#" class="style_base hei_180p dblock bs_bb pad15  brdclr_seggreen_h brdrad5 lgtgrey2_bg_h  box_shadow trans_all2 ">
																<div class=" ">
																	<div class="wi_100 hei_90p dflex bs_bb">
																		<img src="../../../'.$imgs.'" height="90" width="90" class="brdrad5 padb0">
																	</div>
																	
																	<div class="padt10">
																	<span class="dblock tall marb5 padt10 midgrey_txt fsz14  ffamily_avenir">'.substr($title,0,8).'</span>
																		<h3 class="ovfl_hid tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt0 ffamily_avenir">'.substr(html_entity_decode($row['name']),0,8).'</h3>
																		
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
									
									
									';
	
							
					}		 
		
		
	
			
			$stmt = $dbCon->prepare("select count(employees.id) as num from employees  where lower(first_name) like ? and company_id=? "); 
						$stmt->bind_param("si", $p,$company_id);
					
		
		  $stmt->execute();
        $result1 = $stmt->get_result();
		$row1 = $result1->fetch_assoc();
		
		
			
			 $stmt->close();
        $dbCon->close();
		return $row1['num']."~".$org;
	}
   
	function employeeList($data)
    {
        $dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		ini_set('memory_limit', '-1');
		
		$stmt = $dbCon->prepare("select address,passport_image,employees.first_name,employees.id,concat_ws(' ',employees.first_name,employees.last_name)  as name,company_name,employees.email,employees.user_login_id from employees left join companies on companies.id=employees.company_id left join user_logins on user_logins.id=employees.user_login_id  left join company_profiles on company_profiles.company_id=employees.company_id where employees.company_id=? order by employees.first_name limit 0,20");
		$stmt->bind_param("i", $company_id);
		  $stmt->execute();
        $result = $stmt->get_result();
		 $org="";
		$img='';
		 while($row = $result->fetch_assoc())
			{
				
				$emp_id= $this -> encrypt_decrypt('encrypt',$row['id']);
				$stmt = $dbCon->prepare("select title from user_company_profile where user_login_id=? and company_id=?");
						 $stmt->bind_param("ii", $row['user_login_id'],$company_id);
						 $stmt->execute();
						$resulte = $stmt->get_result();
						$rowe = $resulte->fetch_assoc();
						
						if(empty($rowe))
						{
							$title='Employee';
						}
						else
						{
							$title=$rowe['title'];
						}
						
						 $stmt = $dbCon->prepare("select visiting_address from employee_location left join property_location on property_location.id=employee_location.location_id where employee_id=?");
						 $stmt->bind_param("i", $row['id']);
						 $stmt->execute();
						$resulte = $stmt->get_result();
						$rowe = $resulte->fetch_assoc();
						
						 if($rowe['visiting_address']==null || $rowe['visiting_address']=='') 
						 {
							$location=$row['address'];
						 }
						 else
						 {
						$location=$rowe['visiting_address'];	 
						 }
						 
				 if($row['passport_image']!=null || $row['passport_image']!="") { 
						 
						 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; }
						 
						$img='<td class="brdb">
																	<div class="wi_50p xs-wi_100 hei_50p xs-hei_45p " ><img src="../../../'.$imgs.'" width="45px;" height="45px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></td>';
																	
																	 } else { $img=' <td class="brdb"><div class="wi_50p xs-wi_80 hei_50p xs-hei_45p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg" width="45px;" height="45px;" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;" > '.substr($row['first_name'],0,1).' </div> 
																	 </td>';

																	$imgs="../html/usercontent/images/person-male.png";

																	 }
						
			$enc=$this -> encrypt_decrypt('encrypt',$row['id']);	
		$org=$org.'<a href="../updateWorkingHrs/'.$data['cid'].'/'.$emp_id.'"><div class=" white_bg marb10  brdb visible-xs" style="">
										<div class="container padrl10 padb20 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marl15 "> 
																	'.$img.'</div>
													
													<div class="fleft wi_50 xxs-wi_60 sm-wi_50 xsip-wi_50   "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir
">'.substr($title,0,23).'</span>
<span class="trn fsz18  black_txt ffamily_avenir  ">'.substr(html_entity_decode($row['name']),0,21).'</span>  </div>
													
													
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div></a>
									<a href="../updateWorkingHrs/'.$data['cid'].'/'.$emp_id.'"><div class=" wi_25 xxs-wi_50 fleft bs_bb padrb20 talc  hidden-xs">
													<div class="toggle-parent wi_100 dflex alit_s">
														<div class="wi_100 dnone_pa ">
															<a href="#" class="style_base hei_180p  xxs-hei_150p dblock bs_bb pad25 xs-pad10  brdclr_seggreen_h brdrad5 lgtgrey2_bg_h  box_shadow trans_all2 talc">
																<div class=" padrl5">
																	<div class="wi_100 hei_90p dflex bs_bb">
																		<img src="../../../'.$imgs.'" height="90" width="95" class="brdrad5 padb0">
																	</div>
																	
																	<div class="padb15 padt20 xs-padt15 xs-padr0 talc">
																		<h3 class="ovfl_hid talc pad0 txtovfl_el ws_now lgn_hight_24  fsz18 black_txt padt0 xs-fsz15 ffamily_avenir">'.substr(html_entity_decode($row['name']),0,8).'</h3>
																		<span class="dblock tall marb5 padt10 midgrey_txt fsz16 hidden ffamily_avenir">'.substr($title,0,8).'</span>
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div></a>
									
									
									
									 
									';
			}		 
		
			//print_r($org); die;
			 $stmt->close();
        $dbCon->close();
		return $org;
	}
	
	
	function employeeListNew($data)
    {
        $dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		ini_set('memory_limit', '-1');
		$p=strtoupper($_POST['message'].'%');
		$a=$_POST['id']*20;
		$b=20;
		
			//return $p; 
			if($_POST['message']=='A')
						{
							$stmt = $dbCon->prepare("select address,passport_image,employees.first_name,employees.id,concat_ws(' ',employees.first_name,employees.last_name)  as name,company_name,employees.email,employees.company_id,employees.user_login_id from employees left join companies on companies.id=employees.company_id left join user_logins on user_logins.id=employees.user_login_id  left join company_profiles on company_profiles.company_id=employees.company_id where employees.company_id=? order by employees.first_name limit ?,?");
						 $stmt->bind_param("iii", $company_id,$a,$b);
						}
		else
				{
					
					$stmt = $dbCon->prepare("select address,passport_image,employees.first_name,employees.id,concat_ws(' ',employees.first_name,employees.last_name)  as name,company_name,employees.email,employees.user_login_id from employees left join companies on companies.id=employees.company_id left join user_logins on user_logins.id=employees.user_login_id  left join company_profiles on company_profiles.company_id=employees.company_id where employees.company_id=? and lower(employees.first_name) like ? order by employees.first_name limit ?,?");
				 $stmt->bind_param("isii",$company_id, $p,$a,$b);
				}
				
				 $stmt->execute();
				$result = $stmt->get_result();
				 $org="";
				 $location='';
				
				 while($row = $result->fetch_assoc())
					{
						$emp_id= $this -> encrypt_decrypt('encrypt',$row['id']);
						$stmt = $dbCon->prepare("select title from user_company_profile where user_login_id=? and company_id=?");
						 $stmt->bind_param("ii", $row['user_login_id'],$company_id);
						 $stmt->execute();
						$resulte = $stmt->get_result();
						$rowe = $resulte->fetch_assoc();
						
						if(empty($rowe) || $rowe['title']==null || $rowe['title']=='')
						{
							$title='Employee';
						}
						else
						{
							$title=$rowe['title'];
						}
						
						
						$stmt = $dbCon->prepare("select visiting_address from employee_location left join property_location on property_location.id=employee_location.location_id where employee_id=?");
						 $stmt->bind_param("i", $row['id']);
						 $stmt->execute();
						$resulte = $stmt->get_result();
						$rowe = $resulte->fetch_assoc();
						
						 if($rowe['visiting_address']==null || $rowe['visiting_address']=='') 
						 {
							$location=$row['address'];
						 }
						 else
						 {
						$location=$rowe['visiting_address'];	 
						 }
						
					 if($row['passport_image']!=null || $row['passport_image']!="") { 
						 
						 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; }
						 
						
						 
						 
						$img='
																	<div class="wi_50p xs-wi_100 hei_50p xs-hei_45p " ><img src="../../../'.$imgs.'" width="45px;" height="45px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div>';
																	
																	 } else { $img='<div class="wi_50p xs-wi_80 hei_50p xs-hei_45p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg" width="45px;" height="45px;" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;" > '.substr($row['first_name'],0,1).' </div> 
																	'; 
																	
																	$imgs="../html/usercontent/images/person-male.png";
																	}	
						
					$enc=$this -> encrypt_decrypt('encrypt',$row['id']);	
			
			
			$org=$org.'<a href="../updateWorkingHrs/'.$data['cid'].'/'.$emp_id.'"><div class=" white_bg marb10  brdb visible-xs" style="">
										<div class="container padrl10 padb20 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marl15 "> 
																	'.$img.'</div>
													
													<div class="fleft wi_50 xxs-wi_60 sm-wi_50 xsip-wi_50   "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir
">'.substr($title,0,23).'</span>
<span class="trn fsz18  black_txt ffamily_avenir  ">'.substr(html_entity_decode($row['name']),0,21).'</span>  </div>
													
													
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div></a>
									
									
									<a href="../updateWorkingHrs/'.$data['cid'].'/'.$emp_id.'"><div class=" wi_25 xxs-wi_50 fleft bs_bb padrb20 talc  hidden-xs">
													<div class="toggle-parent wi_100 dflex alit_s">
														<div class="wi_100 dnone_pa ">
															<div class="style_base hei_180p  xxs-hei_150p dblock bs_bb pad25 xs-pad10  brdclr_seggreen_h brdrad5 lgtgrey2_bg_h  box_shadow trans_all2 talc">
																<div class=" padrl5">
																	<div class="wi_100 hei_90p dflex bs_bb">
																		<img src="../../../'.$imgs.'" height="90" width="95" class="brdrad5 padb0">
																	</div>
																	
																	<div class="padb15 padt20 xs-padt15 xs-padr0 talc">
																		<h3 class="ovfl_hid talc pad0 txtovfl_el ws_now lgn_hight_24  fsz18 black_txt padt0 xs-fsz15 ffamily_avenir">'.substr(html_entity_decode($row['name']),0,8).'</h3>
																		<span class="dblock tall marb5 padt10 midgrey_txt fsz16 hidden ffamily_avenir">'.substr($title,0,8).'</span>
																		
																	</div>
																</div>
															</div>
														</div>
														
														
													</div>
												</div></a>
									
									
									
									 
									';
			
					}		 
			
			
			
			
			
			 $stmt->close();
        $dbCon->close();
		return $org;
	}
	function corporateColor($data)
			{
				$dbCon = AppModel::createConnection();
				$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
				$stmt = $dbCon->prepare("select * from corporate_color where company_id=?");
				
				$stmt->bind_param("i",$company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
						
						$stmt->close();
						$dbCon->close();
						return $row;
				
			}
	
			}
	
?>