<?php
require_once('../AppModel.php');
class SendRequestModel extends AppModel
{
    
	 function sendRequestSelectCompany($data)
    {
        $dbCon = AppModel::createConnection();
      $organization_id = $this -> encrypt_decrypt('decrypt',$data['vid']);
	  //echo $data['user_id'] ; die;
	 if($organization_id==1)
	 {
		 
		 $is_d=0;
		 $email_v=1;
		 $stmt = $dbCon->prepare("select id,company_name from companies where is_deleted = ? and email_verification_status= ? and user_login_id !=?");
		 $stmt->bind_param("iii", $is_d,$email_v,$data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$array_job=array();
				while($job_i=$result->fetch_assoc())
				{
					array_push($array_job,$job_i); 
					}
		return $array_job;
		
		$stmt->close();
        $dbCon->close();
	 }
	 else  if($organization_id==2)
	 {
		 $st=2;
		 $is_d=0;
		 $email_v=1;
		 $stmt = $dbCon->prepare("select id,company_name from companies where o_type=? and is_deleted = ? and email_verification_status= ? and user_login_id !=?");
		 $stmt->bind_param("iiii", $st,$is_d,$email_v,$data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$array_job=array();
				while($job_i=$result->fetch_assoc())
				{
					array_push($array_job,$job_i); 
					}
		return $array_job;
		
		$stmt->close();
        $dbCon->close();
	 }
	 else if($organization_id==3 || $organization_id==4)
	 {
		 $st=3;
		 $is_d=0;
		 $email_v=1;
		 $stmt = $dbCon->prepare("select id,company_name from companies where o_type=? and is_deleted = ? and email_verification_status= ? and user_login_id !=?");
		 $stmt->bind_param("iiii", $st,$is_d,$email_v,$data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$array_job=array();
				while($job_i=$result->fetch_assoc())
				{
					array_push($array_job,$job_i); 
					}
		return $array_job;
		
		$stmt->close();
        $dbCon->close();
	 
	 }
	
	}
	
	 function sendRequestOrg($data)
    {
        $dbCon = AppModel::createConnection();
      $organization_id = $this -> encrypt_decrypt('decrypt',$data['vid']);
	
	return $organization_id;
		
		$stmt->close();
        $dbCon->close();
	 
	 }
	
    function sendRequestNew($data)
    {
        $dbCon = AppModel::createConnection();
		
		 $stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name,email from user_logins where id =?");
		$stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		
		$username = $result->fetch_assoc();
		
      $organization_id = 1;
	 $company_id = $this -> encrypt_decrypt('decrypt',$data['company_id']);
	 // $company_id = $data['company_id'];
	 if($organization_id==1)
	 {
		 $stmt = $dbCon->prepare("select company_name,company_email from companies where id=?");
		 $stmt->bind_param("i", $company_id);
        $stmt->execute();
        $result = $stmt->get_result();
		
				$row_c=$result->fetch_assoc();
				$c_id=$this -> encrypt_decrypt('encrypt',$data['company_id']);
			$u_id=$this -> encrypt_decrypt('encrypt',$data['user_id']);
			$stmt = $dbCon->prepare("select * from employees where user_login_id=? and company_id=?");
		 $stmt->bind_param("ii", $data['user_id'],$company_id);
        $stmt->execute();
        $result = $stmt->get_result();
			$row_emp=$result->fetch_assoc();
			
			if(!$row_emp)
			{	
		$d=date('Y-m-d');
			$stmt = $dbCon->prepare("insert into employee_request(`company_id`,`user_login_id`,`created_date`,`modified_date`) values(?, ?, ?, ?)");
			$stmt->bind_param("iiss", $company_id,$data['user_id'],$d,$d);
        if($stmt->execute())
                {
                  $to = $row_c['company_email'];
			$subject = "Telezales - Employee Request";
			$emailContent =$username['name'].'  is requesting for an employee profile page for '.$row_c['company_name'].'. To approve/reject click on following link :<a href="https://www.qmatchup.com/beta/approve_reject.php?id='.$c_id.'">Click here</a>';
			$from = "admin@telezales.com";
			$headers = "MIME-Version: 1.0 \r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
			sendEmail($subject, $to, $emailContent  );
			
                }
			
			}
			else
			
			{
			$to = $username['email'];
			$subject = "Telezales - Employee Approval/Rejection";
			$emailContent ='Your are already a employee of the same company';
			$from = "admin@telezales.com";
			$headers = "MIME-Version: 1.0 \r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
			sendEmail($subject, $to, $emailContent  );
			
			
			}
		
	 }
	
      else if($organization_id==2)
	 {
		 $stmt = $dbCon->prepare("select company_name,company_email from companies where id=?");
		 $stmt->bind_param("i", $company_id);
        $stmt->execute();
        $result = $stmt->get_result();
		
				$row_c=$result->fetch_assoc();
				$c_id=$this -> encrypt_decrypt('encrypt',$data['company_id']);
			$u_id=$this -> encrypt_decrypt('encrypt',$data['user_id']);
			$stmt = $dbCon->prepare("select * from students where user_login_id=? and company_id=?");
		 $stmt->bind_param("ii", $data['user_id'],$company_id);
        $stmt->execute();
        $result = $stmt->get_result();
			$row_emp=$result->fetch_assoc();
			
			if(!$row_emp)
			{	
		$d=date('Y-m-d');
			$stmt = $dbCon->prepare("insert into student_request(`company_id`,`user_login_id`,`created_date`,`modified_date`) values(?, ?, ?, ?)");
			$stmt->bind_param("iiss", $company_id,$data['user_id'],$d,$d);
        if($stmt->execute())
                {
                  $to = $row_c['company_email'];
			$subject = "Telezales - student Request";
			$emailContent =$username['name'].'  is requesting for an student profile page for '.$row_c['company_name'].'. To approve/reject click on following link :<a href="https://www.qmatchup.com/beta/approve_reject_student.php?id='.$c_id.'">Click here</a>';
			$from = "admin@telezales.com";
			$headers = "MIME-Version: 1.0 \r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
			sendEmail($subject, $to, $emailContent  );
			
                }
			
			}
			else
			
			{
			$to = $username['email'];
			$subject = "Telezales - student Approval/Rejection";
			$emailContent ='Your are already a student of the same company and click following link to view your student profile page:<a href="https://www.qmatchup.com/beta/user_company_detail.php?id='.$c_id.'">Click here</a>';
			$from = "admin@telezales.com";
			$headers = "MIME-Version: 1.0 \r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
			sendEmail($subject, $to, $emailContent  );
			
			
			}
		
	 }
	 else if($organization_id==3)
	 {
		 $stmt = $dbCon->prepare("select company_name,company_email from companies where id=?");
		 $stmt->bind_param("i", $company_id);
        $stmt->execute();
        $result = $stmt->get_result();
		
				$row_c=$result->fetch_assoc();
				$c_id=$this -> encrypt_decrypt('encrypt',$data['company_id']);
			$u_id=$this -> encrypt_decrypt('encrypt',$data['user_id']);
			$stmt = $dbCon->prepare("select * from ctenants where user_login_id=? and company_id=?");
		 $stmt->bind_param("ii", $data['user_id'],$company_id);
        $stmt->execute();
        $result = $stmt->get_result();
			$row_emp=$result->fetch_assoc();
			
			if(!$row_emp)
			{	
		$d=date('Y-m-d');
			$stmt = $dbCon->prepare("insert into ctenant_request(`company_id`,`user_login_id`,`created_date`,`modified_date`) values(?, ?, ?, ?)");
			$stmt->bind_param("iiss", $company_id,$data['user_id'],$d,$d);
        if($stmt->execute())
                {
                  $to = $row_c['company_email'];
			$subject = "Telezales - commercial tenant Request";
			$emailContent =$username['name'].'  is requesting for an commercial tenant profile page for '.$row_c['company_name'].'. To approve/reject click on following link :<a href="https://www.qmatchup.com/beta/approve_reject_ctenant.php?id='.$c_id.'">Click here</a>';
			$from = "admin@telezales.com";
			$headers = "MIME-Version: 1.0 \r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
			sendEmail($subject, $to, $emailContent  );
			
                }
			
			}
			else
			
			{
			$to = $username['email'];
			$subject = "Telezales - commercial tenant Approval/Rejection";
			$emailContent ='Your are already a commercial tenant of the same company and click following link to view your commercial tenant profile page:<a href="https://www.qmatchup.com/beta/user_company_detail.php?id='.$c_id.'">Click here</a>';
			$from = "admin@telezales.com";
			$headers = "MIME-Version: 1.0 \r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
			sendEmail($subject, $to, $emailContent  );
			
			
			}
		
	 }
	 
	 else if($organization_id==4)
	 {
		 $stmt = $dbCon->prepare("select company_name,company_email from companies where id=?");
		 $stmt->bind_param("i", $company_id);
        $stmt->execute();
        $result = $stmt->get_result();
		
				$row_c=$result->fetch_assoc();
				$c_id=$this -> encrypt_decrypt('encrypt',$data['company_id']);
			$u_id=$this -> encrypt_decrypt('encrypt',$data['user_id']);
			$stmt = $dbCon->prepare("select * from ptenants where user_login_id=? and company_id=?");
		 $stmt->bind_param("ii", $data['user_id'],$company_id);
        $stmt->execute();
        $result = $stmt->get_result();
			$row_emp=$result->fetch_assoc();
			
			if(!$row_emp)
			{	
		$d=date('Y-m-d');
			$stmt = $dbCon->prepare("insert into ptenant_request(`company_id`,`user_login_id`,`created_date`,`modified_date`) values(?, ?, ?, ?)");
			$stmt->bind_param("iiss", $company_id,$data['user_id'],$d,$d);
        if($stmt->execute())
                {
                   $to = $row_c['company_email'];
			$subject = "Telezales - private tenant Request";
			$emailContent =$username['name'].'  is requesting for an private tenant profile page for '.$row_c['company_name'].'. To approve/reject click on following link :<a href="https://www.qmatchup.com/beta/approve_reject_ptenant.php?id='.$c_id.'">Click here</a>';
			$from = "admin@telezales.com";
			$headers = "MIME-Version: 1.0 \r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
			sendEmail($subject, $to, $emailContent  );
			
                }
			
			}
			else
			
			{
			$to = $username['email'];
			$subject = "Telezales - private tenant Approval/Rejection";
			$emailContent ='Your are already a private tenant of the same company and click following link to view your private tenant profile page:<a href="https://www.qmatchup.com/beta/user_company_detail.php?id='.$c_id.'">Click here</a>';
			$from = "admin@telezales.com";
			$headers = "MIME-Version: 1.0 \r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
			sendEmail($subject, $to, $emailContent  );
			
			
			}
		
	 }
	 
        $stmt->close();
        $dbCon->close();
    }
	
	
	
	 
}
