<?php
	require_once('../AppModel.php');
	class MinkarriarModel extends AppModel
	{
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
			
			
			$stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image from user_logins where id = ?");
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
		
		function userProfileSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select summary	from user_profiles where user_logins_id =?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			return $row;
			$stmt->close();
			$dbCon->close();
			
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
							$emailContent =$username['name'].'  is requesting for an employee profile page for '.$row_c['company_name'].'. To approve/reject click on following link :<a href="https://www.qloudid.com/company/index.php/EmployeeRequest/locationShow/'.$c_id.'">Click here</a>';
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
						$emailContent ='Your are already a employee of the same company and click following link to view your employee profile page:<a href="https://www.qloudid.com/user_company_detail.php?id='.$c_id.'">Click here</a>';
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
            $stmt   = $dbCon->prepare("select company_name from companies where o_type=? and email_verification_status=? and company_name like ? limit 0,20");
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
			$stmt   = $dbCon->prepare("select company_name from virtual_company where company_name like ? limit 0,20");
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
            $stmt   = $dbCon->prepare("select count(id) as num from companies where company_name like ? ");
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
			
			$stmt = $dbCon->prepare("select id,first_name,last_name,sex,dob_day,dob_month,dob_year,created_on  from user_logins where id=?");
			
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
			$stmt = $dbCon->prepare("select ssn,address from user_profiles  where user_logins_id=?");
			
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
			
			$stmt = $dbCon->prepare("select degree_type,user_educations.id,country.country_name,duration,country.id as c_id,school.name as school,school.id as s_id, class.name as degree,class.id as cl_id,field,grade,duration_start,duration_end,activities,description,degree_type 
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
			
			$stmt = $dbCon->prepare("select id,country_name from country where id>0 and id<240 order by country_name");
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
				$degree_type = strip_tags($_POST['degree_type']);
				$end_year = strip_tags($_POST['cv_school_end']);
				//$description = strip_tags($_POST['cv_descp']);
				$country = strip_tags($_POST['country_id']);
				$duration = strip_tags($_POST['duration']);
				$stmt = $dbCon->prepare("select id from user_educations where country_id=? and degree =? and school=? and user_logins_id=?");
				$stmt->bind_param("iiii", $country,$degree,$school,$data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$edu_row_cv = $result->fetch_assoc();
				
				
				$stmt = $dbCon->prepare("select id from school where name=?");
				$stmt->bind_param("s", htmlentities($school,ENT_NOQUOTES,'ISO-8859-1'));
				$stmt->execute();
				$result = $stmt->get_result();
				$row_school = $result->fetch_assoc();
				
				if(empty($row_school))
				{
					$c=201;
					$stmt = $dbCon->prepare("insert into school(name,country_id,created_on)
					values(?,?,now())");
					$stmt->bind_param("si", htmlentities($school,ENT_NOQUOTES,'ISO-8859-1'),$c);
					if($stmt->execute())
					{
						$school = $stmt->insert_id;
					}
				}
				else
				{
					$school=$row_school['id'];
				}
				
				$stmt = $dbCon->prepare("select id from class where name=?");
				$stmt->bind_param("s", htmlentities($degree,ENT_NOQUOTES,'ISO-8859-1'));
				$stmt->execute();
				$result = $stmt->get_result();
				$row_school = $result->fetch_assoc();
				
				if(empty($row_school))
				{
					
					$stmt = $dbCon->prepare("insert into class(name,school_id,created_on)
					values(?,?,now())");
					$stmt->bind_param("si", htmlentities($degree,ENT_NOQUOTES,'ISO-8859-1'),$school);
					if($stmt->execute())
					{
						$degree = $stmt->insert_id;
					}
				}
				else
				{
					$degree=$row_school['id'];
				}
				if($_POST['cv_edu']!=0)
				{
					$stmt = $dbCon->prepare("update user_educations set degree_type=?,duration=?,country_id=?,school=?, degree=?,duration_start=?,duration_end=? where id=?");
					$stmt->bind_param("siiiissi", $degree_type,$duration,$country,$school,$degree,$start_year,$end_year,$_POST['cv_edu']);
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
					$stmt = $dbCon->prepare("insert into user_educations(degree_type,duration,country_id,user_logins_id,school,degree,duration_start,duration_end)
					values(?,?,?,?,?,?,?,?)");
					$stmt->bind_param("siiiiiss", $degree_type,$duration,$country,$data['user_id'],$school,$degree,$start_year,$end_year);
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
				$description =addslashes($_POST['com_desc']);
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
		
		function selectSchool($val)
		{
			$dbCon = AppModel::createConnection();
			$val['sid']=str_ireplace("%20"," ",$val['sid']);
			$stmt = $dbCon->prepare("select id,name from class where name like ? limit 0,20");
			
			/* bind parameters for markers */
			$cont="%".htmlentities($val['sid'])."%";
			//echo $cont; die;
			$stmt->bind_param("s",$cont);
			$stmt->execute();
			$result = $stmt->get_result();
			$contry = '';
			$i=0;
			while ($row = $result->fetch_assoc()) {
				$contry= $contry.'<option value="'.$row['name'].'">';
			}
			//print_r($contry); die;
			$stmt->close();
			$dbCon->close();
			return $contry;
			
		}
		function selectCompany($val)
		{
			$dbCon = AppModel::createConnection();
			$val['sid']=str_ireplace("%20"," ",$val['sid']);
			$stmt = $dbCon->prepare("select company_name from companies where company_name like ? limit 0,20");
			
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
			return json_encode($contry);
		}
		
		function countrySelect($val)
		{
			$dbCon = AppModel::createConnection();
			$val['sid']=str_ireplace("%20"," ",$val['sid']);
			$stmt = $dbCon->prepare("select id,name  from school where name like ? limit 0,20");
			// echo $val['sid'];
			/* bind parameters for markers */
			$cont="%".htmlentities($val['sid'])."%";
			//echo $cont; die;
			$stmt->bind_param("s",$cont);
			$stmt->execute();
			$result = $stmt->get_result();
			$contry = '';
			$i=0;
			while ($row = $result->fetch_assoc()) {
				$contry= $contry.'<option value="'.$row['name'].'">';
			}
			//print_r($contry); die;
			$stmt->close();
			$dbCon->close();
			return $contry;
		}
		
		function selectCountry()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name  from country where is_visible= ? and id >0 order by country_name");
			
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("i", $cont);
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