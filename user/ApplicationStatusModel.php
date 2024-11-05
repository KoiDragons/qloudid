<?php
require_once('../AppModel.php');
class ApplicationStatusModel extends AppModel
{
	
	
	function userSummary($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image,summary from user_profiles left join user_logins on user_logins.id=user_profiles.user_logins_id where user_logins_id =?");
        
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
         
		
		/* $stmt = $dbCon->prepare("select company_name,count(ctenant_request.id) as total from ctenant_request left join companies on ctenant_request.company_id=companies.id where ctenant_request.user_login_id =? and status=0 group by ctenant_request.user_login_id");
       
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
		  */
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
			$company =strip_tags($_POST['com_name']);
			$title = strip_tags($_POST['com_title']);
			$location = strip_tags($_POST['com_loc']);
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
			sendEmail($subject, $to, $emailContent);
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
	
	
	
	function availabilityDisconnect($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("update user_applied_jobs set disconnect=? where posted_job_id in (select id from job_posting where company_id=?) and user_login_id=?");
        
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("iii", $cont,$data['company_id'],$data['user_id']);
        $stmt->execute();
        
        $stmt->close();
        $dbCon->close();
        
    }
	
	function selectDisconnect($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select distinct company_id,company_name from job_posting left join companies on companies.id=job_posting.company_id where job_posting.id in (select posted_job_id from user_applied_jobs where user_login_id=?) limit 0,4");
        
       $stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $contry1 = array();
        while ($row = $result->fetch_assoc()) {
            $contry=array();
          $contry['company_id']=$row['company_id']; 
		  $contry['company_name']=$row['company_name']; 
		  
		  $stmt = $dbCon->prepare("select count(id) as num,disconnect from user_applied_jobs where user_login_id=? and posted_job_id in (select id from job_posting where company_id=?)");
        
       $stmt->bind_param("ii", $data['user_id'],$row['company_id']);
        $stmt->execute();
        $result1 = $stmt->get_result();
		 $row1 = $result1->fetch_assoc(); 
		  $contry['disconnect']=$row1['disconnect']; 
			$contry['num']=$row1['num']; 
array_push($contry1,$contry);			
        }
		//print_r($contry); die;
        return $contry1;
        $stmt->close();
        $dbCon->close();
        
    }
	
	function availabilityAccept($data)
    {
        $dbCon = AppModel::createConnection();
        $job_id =  $this -> encrypt_decrypt('decrypt',$data['jid']);
        $stmt = $dbCon->prepare("select vacancy_id,company_id,company_email,first_name from job_posting left join companies on companies.id=job_posting.company_id left join user_logins on user_logins.id=companies.user_login_id where job_posting.id=?");
        
        /* bind parameters for markers */
		$cont=4;
       $stmt->bind_param("i", $job_id);
        $stmt->execute();
        $result = $stmt->get_result();
       $re_v = $result->fetch_assoc();
	  
	  if($data['status']=='Accept')
		{
			
			$c="Accepted";
			$d=date('Y-m-d');
			 $stmt = $dbCon->prepare("update user_applied_jobs set accept_job=?,accepted_on=? where posted_job_id=? and user_login_id=?");
			 $stmt->bind_param("ssii", $c,$d,$job_id,$data['user_id']);
			 $stmt->execute();
			 
			 $stmt = $dbCon->prepare("update vacancy set v_status=? where id=?");
			 $stmt->bind_param("ii", $cont,$re_v['id']);
			 $stmt->execute();
			 
			 $c='Hired';
			  $stmt = $dbCon->prepare("update job_posting_status set job_status=? where applicant_id=(select id from user_applied_jobs where  posted_job_id=? and user_login_id=?)");
			 $stmt->bind_param("sii", $c,$job_id,$data['user_id']);
			 $stmt->execute();
			 
			$stmt = $dbCon->prepare("select user_applied_jobs.id,user_login_id,email,first_name,job_status from user_applied_jobs left join job_posting_status on job_posting_status.applicant_id-user_applied_jobs.id left join user_logins on user_applied_jobs.user_login_id=user_logins.id where posted_job_id=? and user_login_id!=?");
			 $stmt->bind_param("ii", $job_id,$data['user_id']);
			 $stmt->execute();
			
			$result = $stmt->get_result();
       
        while ($r = $result->fetch_assoc()) {
            
           if($r['job_status']=='Rejected')
			{
				continue;
			}
			$va="Rejected";
			
			  $stmt = $dbCon->prepare("update job_posting_status set job_status=? where applicant_id=? and job_status!=?");
			 $stmt->bind_param("sis", $va,$r['id'],$va);
			 $stmt->execute();
			 
			 $to=$r['email'];
		//echo $to; die;
		$subject = "Qmatchup –Job Offer";
			$emailContent ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body style="width:100%; background-color:#f5f5f5; margin:0; padding:0;" align="center">
<div style="width:100%; background-color:#f5f5f5;" align="center">
  <div align="center" style="padding-top:20px; padding-bottom:20px; font-family:Arial, Helvetica, sans-serif; color:#6b6f74">
    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="right" scope="col" style="font-size:10px; color:#a7a9ac;"><div style="padding-bottom:5px; padding-top:5px;"> <a href="#" style="color:#a7a9ac; text-decoration:none;">View in browser</a> | <a href="#" style="color:#a7a9ac; text-decoration:none;">Read in Swedish</a> </div></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#3691c0" style="background-color:#3691c0;">
            <tr>
              <td scope="col" width="50%" align="left" valign="top" style="padding:25px;"><div style="color:#FFFFFF">
                  <div style="font-size:36px;">Application Rejected</div>
                  <div style="font-size:11px;">'.date("d/m/Y").'</div>
                </div></td>
              <td scope="col" align="right" width="50%" valign="top" style="padding:25px;"><div style="text-align:right"><img src="https://www.qmatchup.com/Newsletter/images/qmacthup.png" alt="Qmatchup" title="Qmatchup" style="font-size:35px; color:#FFFFFF;" /></div></td>
            </tr>
          </table></td>
      </tr>
      <tr>
        <td style="background-color:#FFFFFF;"><table width="100%" border="0" cellspacing="0" cellpadding="20">
            <tr>
              <td align="left" valign="top" scope="col"><div style="font-size:18px">Hi <b>'.$r['first_name'].'</b>,</div>
                <div style="font-size:14px; padding-top:20px;">
                  <div style="padding-bottom:10px;">Thanks for your interest in this position. Unfortunately weve reviewed your application & have decided we wont be moving forward with you for this role. </div>
                  
                  
                </div></td>
            </tr>
            
			 <tr>
              <td align="left" valign="top" scope="col">
                <div style="font-size:14px; ">
                  <div style="padding-bottom:10px;">Thanks again for your in interest in working with us. Well be sure to keep you in mind If anything new comes up thats a good fit.</div>
                  
                  
                </div></td>
            </tr>
            <tr>
              <td align="left" valign="top" scope="col" style="font-size:16px;"><div style="padding-bottom:5px;">Take Care,</div>
                <div><b style="color:#6b6f74;">'.$re_v['first_name'].'</b></div></td>
            </tr>
          </table></td>
      </tr>
      <tr>
        <td align="center" valign="top"><div style="padding-top:10px; font-size:11px;">This message was sent to <a href="mailto:#" style="text-decoration:none; color:#3691c0;">'.$r['email'].'</a>. If you dont want to receive these emails from Qmatchup.com in the future, <br />
            please click <a href="#" style="text-decoration:none; color:#3691c0;">unsubscribe</a>. <a style="text-decoration:none; color:#6b6f74;" href="https://www.qmatchup.com"></a> Qmatchup Outsourcing AB, Stureplan 6, 114 35, Stockholm, Sweden</div></td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>';
												$from = "admin@telezales.com";
														$headers = "MIME-Version: 1.0 \r\n";
														$headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
														//echo $emailContent; die;
			
					
			
					}
			
			
			
		}
	  else if($data['status']=='Reject')
		{
		$c="Declined";
			$d=date('Y-m-d');
			 $stmt = $dbCon->prepare("update user_applied_jobs set accept_job=?,accepted_on=? where posted_job_id=? and user_login_id=?");
			 $stmt->bind_param("ssii", $c,$d,$job_id,$data['user_id']);
			 $stmt->execute();
			 
			 $stmt = $dbCon->prepare("update vacancy set v_status=? where id=?");
			 $stmt->bind_param("ii", $cont,$re_v['id']);
			 $stmt->execute();
			 
			 $c='Hired';
			  $stmt = $dbCon->prepare("update job_posting_status set job_status=? where applicant_id=(select id from user_applied_jobs where  posted_job_id=? and user_login_id=?)");
			 $stmt->bind_param("sii", $c,$job_id,$data['user_id']);
			 $stmt->execute();


		
		}
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
	
	function selectCompany($val)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select company_name from companies where company_name like ?");
        
        /* bind parameters for markers */
		$cont="%".$val['sid']."%";
      $stmt->bind_param("s", $cont);
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
	
	
    
	function selectLatestJob($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select v_status,city_name,job_status,company_name,job_position.job_position as title,job_posting.id,job_posting.company_id,job_title,user_applied_jobs.created_on,expiry_date from user_applied_jobs left join job_posting on user_applied_jobs.posted_job_id=job_posting.id left join vacancy on vacancy.id=job_posting.vacancy_id left join companies on companies.id=job_posting.company_id left join job_posting_status on job_posting_status.applicant_id=user_applied_jobs.id left join location on location.id=vacancy.location left join cities on location.city_id=cities.id left join job_position on job_position.id=vacancy.title where user_applied_jobs.user_login_id=? order by user_applied_jobs.created_on desc limit 0,2");
        
        /* bind parameters for markers */
		$cont=0;
       $stmt->bind_param("i", $data['user_id']);
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
	
	
	function selectScreening($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select v_status,city_name,job_status,company_name,job_position.job_position as title,job_posting.id,job_posting.company_id,job_title,user_applied_jobs.created_on,expiry_date from user_applied_jobs left join job_posting on user_applied_jobs.posted_job_id=job_posting.id left join vacancy on vacancy.id=job_posting.vacancy_id left join companies on companies.id=job_posting.company_id left join job_posting_status on job_posting_status.applicant_id=user_applied_jobs.id left join location on location.id=vacancy.location left join cities on location.city_id=cities.id left join job_position on job_position.id=vacancy.title where user_applied_jobs.user_login_id=? and job_posting_status.job_status=? order by user_applied_jobs.created_on desc limit 0,2");
        
        /* bind parameters for markers */
		$cont="Screening";
		
		
       $stmt->bind_param("is", $data['user_id'],$cont);
        $stmt->execute();
        $result = $stmt->get_result();
        $contry = array();
        while ($row = $result->fetch_assoc()) {
            
            array_push($contry, $row);
        }
		//print_r($contry); die;
        return $contry;
        $stmt->close();
        $dbCon->close();
        
    }
	
	function selectPhone($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select v_status,city_name,job_status,company_name,job_position.job_position as title,job_posting.id,job_posting.company_id,job_title,user_applied_jobs.created_on,expiry_date from user_applied_jobs left join job_posting on user_applied_jobs.posted_job_id=job_posting.id left join vacancy on vacancy.id=job_posting.vacancy_id left join companies on companies.id=job_posting.company_id left join job_posting_status on job_posting_status.applicant_id=user_applied_jobs.id left join location on location.id=vacancy.location left join cities on location.city_id=cities.id left join job_position on job_position.id=vacancy.title where user_applied_jobs.user_login_id=? and job_posting_status.job_status=? order by user_applied_jobs.created_on desc limit 0,2");
        
        /* bind parameters for markers */
		$cont="phone";
		
		
       $stmt->bind_param("is", $data['user_id'],$cont);
        $stmt->execute();
        $result = $stmt->get_result();
        $contry = array();
        while ($row = $result->fetch_assoc()) {
            
            array_push($contry, $row);
        }
		//print_r($contry); die;
        return $contry;
        $stmt->close();
        $dbCon->close();
        
    }
	
	function selectFace($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select v_status,city_name,job_status,company_name,job_position.job_position as title,job_posting.id,job_posting.company_id,job_title,user_applied_jobs.created_on,expiry_date from user_applied_jobs left join job_posting on user_applied_jobs.posted_job_id=job_posting.id left join vacancy on vacancy.id=job_posting.vacancy_id left join companies on companies.id=job_posting.company_id left join job_posting_status on job_posting_status.applicant_id=user_applied_jobs.id left join location on location.id=vacancy.location left join cities on location.city_id=cities.id left join job_position on job_position.id=vacancy.title where user_applied_jobs.user_login_id=? and job_posting_status.job_status=? order by user_applied_jobs.created_on desc limit 0,2");
        
        /* bind parameters for markers */
		$cont="face-face";
		
		
       $stmt->bind_param("is", $data['user_id'],$cont);
        $stmt->execute();
        $result = $stmt->get_result();
        $contry = array();
        while ($row = $result->fetch_assoc()) {
            
            array_push($contry, $row);
        }
		//print_r($contry); die;
        return $contry;
        $stmt->close();
        $dbCon->close();
        
    }
	
	
	function selectOffered($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select booked,v_status,city_name,job_status,company_name,job_position.job_position as title,job_posting.id,job_posting.company_id,job_title,user_applied_jobs.created_on,expiry_date from user_applied_jobs left join job_posting on user_applied_jobs.posted_job_id=job_posting.id left join vacancy on vacancy.id=job_posting.vacancy_id left join companies on companies.id=job_posting.company_id left join job_posting_status on job_posting_status.applicant_id=user_applied_jobs.id left join location on location.id=vacancy.location left join cities on location.city_id=cities.id left join job_position on job_position.id=vacancy.title where user_applied_jobs.user_login_id=? and job_posting_status.job_status=? order by user_applied_jobs.created_on desc limit 0,2");
        
        /* bind parameters for markers */
		$cont="offered";
		
		
       $stmt->bind_param("is", $data['user_id'],$cont);
        $stmt->execute();
        $result = $stmt->get_result();
        $contry = array();
        while ($row = $result->fetch_assoc()) {
            
            array_push($contry, $row);
        }
		//print_r($contry); die;
        return $contry;
        $stmt->close();
        $dbCon->close();
        
    }
	
	function selectHired($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select accept_job,booked,v_status,city_name,job_status,company_name,job_position.job_position as title,job_posting.id,job_posting.company_id,job_title,user_applied_jobs.created_on,expiry_date from user_applied_jobs left join job_posting on user_applied_jobs.posted_job_id=job_posting.id left join vacancy on vacancy.id=job_posting.vacancy_id left join companies on companies.id=job_posting.company_id left join job_posting_status on job_posting_status.applicant_id=user_applied_jobs.id left join location on location.id=vacancy.location left join cities on location.city_id=cities.id left join job_position on job_position.id=vacancy.title where user_applied_jobs.user_login_id=? and job_posting_status.job_status in (? , ?) order by user_applied_jobs.created_on desc limit 0,2");
        
        /* bind parameters for markers */
		$cont="hired";
		
		$cont1="Drawn";
       $stmt->bind_param("iss", $data['user_id'],$cont,$cont1);
        $stmt->execute();
        $result = $stmt->get_result();
        $contry = array();
        while ($row = $result->fetch_assoc()) {
            
            array_push($contry, $row);
        }
		//print_r($contry); die;
        return $contry;
        $stmt->close();
        $dbCon->close();
        
    }
	
	
	
	function selectLatestJobCount($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select count(id) num from user_applied_jobs where user_login_id=?");
        
        /* bind parameters for markers */
		$cont=0;
       $stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $contry = array();
        $row = $result->fetch_assoc();
        return $row;
        $stmt->close();
        $dbCon->close();
        
    }
	
	
	
	
	
	
	
	function selectScreeningCount($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select count(id) as num from job_posting_status where `job_status`=? and applicant_id in (select id from user_applied_jobs where user_login_id=?)");
        
        /* bind parameters for markers */
		$cont="Screening";
       $stmt->bind_param("si", $cont,$data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $contry = array();
        $row = $result->fetch_assoc();
        return $row;
        $stmt->close();
        $dbCon->close();
        
    }
	
	
	function selectPhoneCount($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select count(id) as num from job_posting_status where `job_status`=? and applicant_id in (select id from user_applied_jobs where user_login_id=?)");
        
        /* bind parameters for markers */
		$cont="phone";
       $stmt->bind_param("si", $cont,$data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $contry = array();
        $row = $result->fetch_assoc();
        return $row;
        $stmt->close();
        $dbCon->close();
        
    }
    
	function selectFaceCount($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select count(id) as num from job_posting_status where `job_status`=? and applicant_id in (select id from user_applied_jobs where user_login_id=?)");
        
        /* bind parameters for markers */
		$cont="face-face";
       $stmt->bind_param("si", $cont,$data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $contry = array();
        $row = $result->fetch_assoc();
        return $row;
        $stmt->close();
        $dbCon->close();
        
    }
	
	function selectOfferedCount($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select count(id) as num from job_posting_status where `job_status`=? and applicant_id in (select id from user_applied_jobs where user_login_id=?)");
        
        /* bind parameters for markers */
		$cont="offered";
       $stmt->bind_param("si", $cont,$data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $contry = array();
        $row = $result->fetch_assoc();
        return $row;
        $stmt->close();
        $dbCon->close();
        
    }
	
	function selectHiredCount($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select count(id) as num from job_posting_status where `job_status` in (? , ?)  and applicant_id in (select id from user_applied_jobs where user_login_id=?)");
        
        /* bind parameters for markers */
		$cont="hired";
		$cont1="Drawn";
       $stmt->bind_param("ssi", $cont,$cont1,$data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $contry = array();
        $row = $result->fetch_assoc();
        return $row;
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
    
   
    
	
	function availabilitySummary($data)
	    {
			
			
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name
	from user_logins where id =?");
		
		$stmt->bind_param("i", $data['user_id']);
       
        $stmt->execute();
        $result_cont = $stmt->get_result();
			$row = $result_cont->fetch_assoc();
			return $row;
        
		
		
       
        $stmt->close();
        $dbCon->close();
			
		}
		
		
		function availabilityDetail($data)
	    {
			
			
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select available,h_weeks,h_hours,when_w,w_state,w_city,w_district,state_name,country_name,city_name,district_name,country,state,city,district from user_availability left join country on country.id=user_availability.country left join state on state.id=user_availability.state left join cities on cities.id=user_availability.city left join district on district.id=user_availability.district where user_id=?");
		
		$stmt->bind_param("i", $data['user_id']);
       
        $stmt->execute();
        $result_cont = $stmt->get_result();
			$row = $result_cont->fetch_assoc();
			return $row;
        
		
		
       
        $stmt->close();
        $dbCon->close();
			
		}
	
		
		function availabilityInsert($data)
	    {
			
			
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("delete 
	from user_availability where user_id =?");
		
		$stmt->bind_param("i", $data['user_id']);
       
        $stmt->execute();
		
			 if(isset($_POST['comp_experiance1']))
			 {
				if($_POST['show_form']=="on")
				{
				$avail=1;	
				}
				else 
				{
					$avail=2;	
				}
				
				if($avail==2)
				{
					 $stmt = $dbCon->prepare("insert into user_availability(user_id,available) values (?, ?)");
					 $stmt->bind_param("ii", $data['user_id'],$avail);
				}
				else if ($avail==1)
				{
					 $weeks=cleanMe($_POST['weeks']); 
				$hours=cleanMe($_POST['hrs']);
				$wen=cleanMe($_POST['wen']);
				$cntry=cleanMe($_POST['cntry']);
				$w_state=cleanMe($_POST['state']);
				
				if ($w_state<0)
				{
					$w_state=1;
					 $stmt = $dbCon->prepare("insert into user_availability(user_id,available,h_weeks,h_hours,when_w,country,w_state) values (?, ?, ?, ?, ?, ?, ?)");
					 $stmt->bind_param("iiiiiii", $data['user_id'],$avail,$weeks,$hours,$wen,$cntry,$w_state);
				}
				else if ($w_state>0)
				{
					$w_state=2;
					$state=cleanMe($_POST['state']);
					$w_city=cleanMe($_POST['city']);
					//echo $state; echo $w_city; die;
					if ($w_city<0)
				{
					$w_city=1;
					 $stmt = $dbCon->prepare("insert into user_availability(user_id,available,h_weeks,h_hours,when_w,country,w_state,state,w_city) values (?, ?, ?, ?, ?, ?, ?, ?, ?)");
					 $stmt->bind_param("iiiiiiiii", $data['user_id'],$avail,$weeks,$hours,$wen,$cntry,$w_state,$state,$w_city);
				}
				else if ($w_city>0)
				{
					$w_city=2;
					$city=cleanMe($_POST['city']);
					$w_district=cleanMe($_POST['district']);
					
					if ($w_district<0)
				{
					$w_district=1;
					 $stmt = $dbCon->prepare("insert into user_availability(user_id,available,h_weeks,h_hours,when_w,country,w_state,state,w_city,city,w_district) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
					 $stmt->bind_param("iiiiiiiiiii", $data['user_id'],$avail,$weeks,$hours,$wen,$cntry,$w_state,$state,$w_city,$city,$w_district);
				}
				else if ($w_district>0)
				{
					$w_district=2;
					$district=cleanMe($_POST['district']);
					 $stmt = $dbCon->prepare("insert into user_availability(user_id,available,h_weeks,h_hours,when_w,country,w_state,state,w_city,city,w_district,district) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
					 $stmt->bind_param("iiiiiiiiiiii", $data['user_id'],$avail,$weeks,$hours,$wen,$cntry,$w_state,$state,$w_city,$city,$w_district,$district);
				}
				}
				}
				}
				 
					 
					 $stmt->execute();
				
				 return 0;
			 }
			 $stmt->close();
        $dbCon->close();
		}
	
	function availabilityUpdate($data)
	    {
			
			
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("delete 
	from user_availability where user_id =?");
		
		$stmt->bind_param("i", $data['user_id']);
       
        $stmt->execute();
		
			
				
				$avail=2;
					 $stmt = $dbCon->prepare("insert into user_availability(user_id,available) values (?, ?)");
					 $stmt->bind_param("ii", $data['user_id'],$avail);
				
				
					 
					 $stmt->execute();
				
				 return 1;
			 
			 $stmt->close();
        $dbCon->close();
		}
    
}
