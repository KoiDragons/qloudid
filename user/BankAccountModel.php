<?php
require_once('../AppModel.php');
class BankAccountModel extends AppModel
{
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
	
	 function companySummary($data)
    {
        $dbCon = AppModel::createConnection();
       
		
          $stmt = $dbCon->prepare("select company_id,company_name from employees left join companies on employees.company_id=companies.id where employees.user_login_id = ? and companies.email_verification_status=1");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		$i=0;
		 while($row = $result->fetch_assoc())
		 {
			 array_push($org,$row);
			 $org[$i]['enc']=$this->encrypt_decrypt('encrypt',$row['company_id']);
			 $i++;
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
		
        $stmt = $dbCon->prepare("select ssn,address,country,city,zipcode,phone_number,clearing_number,bank_account_number,language,country_phone from user_profiles  where user_logins_id=?");
        
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
    
}