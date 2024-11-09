<?php
	require_once('../AppModel.php');
	 
	class ManageFileInvitationModel extends AppModel
	{
		
	 
		
		function fileDetail($data)
		{
			
			$file= $this -> encrypt_decrypt('decrypt',$data['file_e']);
			$file1=file_get_contents($file, FILE_USE_INCLUDE_PATH);
			$fields = explode("\n" , $file1);
			$fields_sep=explode("," , $fields[0]);
			
			return $fields_sep;
			
			
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
		public function inviteEmployees($data)
		{
			
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$d=date('Y-m-d');
			
			$stmt = $dbCon->prepare("select * from companies where id=?");
					  /* bind parameters for markers */
						
			$stmt->bind_param("i",$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCompany = $result->fetch_assoc();
			
			function csv_to_array($filename='', $delimiter=',')
			{
				function validateDate($date, $format = 'Y-m-d H:i:s')
						{
							$d = DateTime::createFromFormat($format, $date);
							return $d && $d->format($format) == $date;
						}
						
				if(!file_exists($filename) || !is_readable($filename))
				return FALSE;
				
				$data = array();
				if (($handle = fopen($filename, 'r')) !== FALSE)
				{
					$header = true;
					while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
					{	
						if($header){ $header = false; continue; }
						
						$data[] =  $row;
					}
					fclose($handle);
				}
				return $data;
			}
			
			$user_login_id=$data['user_id'];
			$file= $this -> encrypt_decrypt('decrypt',$_POST['indexing_save']);
			$data1 = csv_to_array($filename=$file);
			
			$i=0;
			$j=0;
			
			foreach($data1 as $rowFile)
			{
			//echo '<pre>';	print_r($rowFile); echo '</pre>';
				$ssn='';
				$company_p='';
				$contact_p='';
				$contact_email_p='';
				
				$day_p='';
				$month_p='';
				$year_p='';
				$sex_p=1;
				$mobile_p=	'';
				$telephone='';
				$zip='';
				$address='';
				$country='';
				$city='';
				$state='';
				$marital_status='';
				$nation="";
				
				$e_number='';
				$s_date="";
				$r_date="";
				$phone='';
				$mobile='';
				$email='';
				
				$per=1;
				$blog="";
				$skype="";
				$linkedln="";
				$facebook="";
				$twitter="";
				$instagram="";
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
				$st=1;
				$mp=0;
				$conti=0;
				$emailStatus=0; 
				foreach($_POST['maped'] as $value)
				{
					
					 
					if($_POST['mapping'][$mp]==0)
					{
						 
								$ssn= $rowFile[$value];
						}
						 
					else if($_POST['mapping'][$mp]==1)
					{
						$company_p= $rowFile[$value];
						
					}
					
					else if($_POST['mapping'][$mp]==2)
					{
						$contact_p= $rowFile[$value];
						
					}
					else if($_POST['mapping'][$mp]==3)
					{
						$contact_email_p= $rowFile[$value];
						 
					}
					 
					else if($_POST['mapping'][$mp]==4)
					{
						$mobile_p= $rowFile[$value];
						
					}
					 
					else if($_POST['mapping'][$mp]==7)
					{
						$e_number= $rowFile[$value];
						
					}
					  
					else if($_POST['mapping'][$mp]==5)
					{
						$phone= $rowFile[$value];
						
					}
					 
					else if($_POST['mapping'][$mp]==6)
					{
						$email= $rowFile[$value];
						
					}
					
					
					 
					
					
					
					$mp++;
					 
				}
				
				 if (filter_var($contact_email_p, FILTER_VALIDATE_EMAIL)) {
						 $emailStatus=1;
					  $stmt = $dbCon->prepare("select id from employees where company_id=? and email=?");
					  /* bind parameters for markers */
						
					  $stmt->bind_param("is",$company_id,$contact_email_p);
						$stmt->execute();
						$result = $stmt->get_result();
						$row = $result->fetch_assoc();
						if(!empty($row))
						{
							$mp++;
							continue;
						}
						
						$stmt = $dbCon->prepare("select id from estore_employee_invite where company_id=? and email=?");
					  /* bind parameters for markers */
						
						$stmt->bind_param("is",$company_id,$contact_email_p);
						$stmt->execute();
						$result = $stmt->get_result();
						$row = $result->fetch_assoc();
						if(!empty($row))
						{
							$mp++;
							continue;
						}
					}
					else
					{
						$contact_email_p='';
					}
					 if ($e_number!=null || $e_number!='') {
						  
					  $stmt = $dbCon->prepare("select id from employees where company_id=? and employee_number=?");
					  /* bind parameters for markers */
						
					  $stmt->bind_param("is",$company_id,$e_number);
						$stmt->execute();
						$result = $stmt->get_result();
						$row = $result->fetch_assoc();
						if(!empty($row))
						{
							$mp++;
							continue;
						}
						
						$stmt = $dbCon->prepare("select id from estore_employee_invite where company_id=? and employee_number=?");
					  /* bind parameters for markers */
						
						$stmt->bind_param("is",$company_id,$e_number);
						$stmt->execute();
						$result = $stmt->get_result();
						$row = $result->fetch_assoc();
						if(!empty($row))
						{
							$mp++;
							continue;
						}
						
						$stmt = $dbCon->prepare("select id from estore_employee_uninvited where company_id=? and employee_number=?");
					  /* bind parameters for markers */
						
						$stmt->bind_param("is",$company_id,$e_number);
						$stmt->execute();
						$result = $stmt->get_result();
						$row = $result->fetch_assoc();
						if(!empty($row))
						{
							$mp++;
							continue;
						}
					}
				
				 
					 
				if($emailStatus==1)
				{
				$stmt = $dbCon->prepare("insert into estore_employee_invite(created_by,mobile_p,company_id,name,last_name,email,work_email,phone,created_user,first_name_p,last_name_p,email_p,sex_p,dob_day_p,dob_month_p,dob_year_p,created_date,employee_number) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, ?)");	
				$stmt->bind_param("isisssssisssiiiiss", $user_login_id,$mobile_p,$company_id,$company_p,$contact_p,$contact_email_p,$email,$phone,$st,$company_p,$contact_p,$contact_email_p,$sex_p,$day_p,$month_p,$year_p,$d,$e_number);
				$stmt->execute();
				$user_id=$stmt->insert_id;
				$unique_id=$rowCompany['id']."_".date('Y-m-d h:i:s');
				$unique_id=$this->encrypt_decrypt('encrypt',$unique_id);
				 
				$stmt = $dbCon->prepare("insert into invitation(invited_user_id,created_date,unique_id) values (?, now(), ?)");
				$stmt->bind_param("is", $user_id,$unique_id);
				$stmt->execute();
				$stmt = $dbCon->prepare("insert into virtual_user_company_profile (`company_id`,`invited_user_id`) values (?, ?)") ;
				$stmt->bind_param("ii", $company_id,$user_id);
				$stmt->execute();
			//	echo $stmt->error;
				$stmt = $dbCon->prepare('update virtual_user_company_profile set company_permission=?,h_date=?,res_date=?,phone=?,mobile=?,email=?
				,ssn=?, e_number=?,description_job=?,i_street=?,i_town=?,i_city=?
				,i_zip=?, i_country=?,d_street=?, d_town=?, d_city=?,d_zip=?,d_country=?
				, b_member=?, mentor=?, c_id=?, prospect=?,partner=?,supplier=? where invited_user_id=? and company_id=?');
				$stmt->bind_param("issssssssssssssssssssssssii", $per,$s_date,$res_date,$phone,$mobile,$email,$ssn,$e_number,$desc,$i_street,$i_town,$i_city,$i_zip,$i_country,$d_street,$d_town,$d_city,$d_zip,$d_country,$b_member,$mentor,$c_id,$prospect,$partner,$supplier,$user_id,$company_id);
				$stmt->execute();
				//echo $stmt->error;
				$stmt = $dbCon->prepare("insert into virtual_user_profiles (`invited_user_id`,`created_on`,`modified_on`) values (?, ?, ?)");
				$stmt->bind_param("iss", $user_id,$d,$d);
				$stmt->execute();
				//echo $stmt->error;
				$stmt = $dbCon->prepare('update virtual_user_profiles set instagram=?,twitter=?,facebook=?,linkedln=?,skype=?,blog=?,marital_status=?,phone_number=?,zipcode=?,address=?,country=?,
				state=?,city=?,modified_on=?,nation=? where invited_user_id=?');
				$stmt->bind_param("sssssssssssssssi", $instagram,$twitter,$facebook,$linkedln,$skype,$blog,$marital_status,$telephone,$zip,$address,$country,$state,$city,$d,$nation,$user_id);
				$stmt->execute();
				//echo $stmt->error;
				$to=$contact_email_p;
					$subject="Employer Connection Request";
					$emailContent='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
					<div style="font-size:36px;">Welcome</div>
					<div style="font-size:11px;">' . date("d/m/Y") . '</div>
					</div></td>
					<td scope="col" align="right" width="50%" valign="top" style="padding:25px;"><div style="text-align:right"><img src="https://www.qmatchup.com/beta/tabcss/mages/images/qmacthup.png" alt="Qloudid" title="Qloudid" style="font-size:35px; color:#FFFFFF;" /></div></td>
					</tr>
					</table></td>
					</tr>
					<tr>
					<td style="background-color:#FFFFFF;"><table width="100%" border="0" cellspacing="0" cellpadding="20">
					<tr>
					<td align="left" valign="top" scope="col"><div style="font-size:18px">Hej  <b>' .$contact_email_p . '</b>,</div>
					<div style="font-size:14px; padding-top:20px;">
					
					<div style="padding-bottom:10px;"> <h3>På svenska  </h3> </br>
					
					Jag vill be dig ansluta dig till oss med ditt Qloud ID konto och därmed registrera dig som en anställd i våra system.
					
					
					</div>
					
					</div></td>
					</tr>
					<tr>
					<td align="left" valign="top" scope="col"><a href="https://www.safeqloud.com/user/index.php/ShareMonitor/shareMonitorShow" style="display:inline-block; padding:20px 35px; font-weight:bold; color:#FFF; background-color:#6ab743; text-decoration:none; border-radius:3px; -webkit-border-radius:3px; ">Var god och klicka på den gröna knappen </a></td>
					</tr>
					<tr>
					<td align="left" valign="top" scope="col"><div style="font-size:14px;">Din kod:  <br />
					<a href="#" style="text-decoration:none; color:#3691c0;">'.$unique_id.' </a></div></td>
					</tr>
					<tr>
					<td align="left" valign="top" scope="col" style="font-size:16px;"><div style="padding-bottom:5px;">Warm regards,</div>
					<div><b style="color:#6b6f74;">The Qloudid team</b></div></td>
					</tr>
					</table></td>
					</tr>
					<tr>
					<td align="center" valign="top"><div style="padding-top:10px; font-size:11px;">This message was sent to <a href="mailto:#" style="text-decoration:none; color:#3691c0;">' . $contact_email_p. '</a>. If you dont want to receive these emails from Qloudid.com in the future, <br />
					please click <a href="#" style="text-decoration:none; color:#3691c0;">unsubscribe</a>. <a style="text-decoration:none; color:#6b6f74;" href="https://www.Qloudid.com"></a> Qloudid Outsourcing AB, Stureplan 6, 114 35, Stockholm, Sweden</div></td>
					</tr>
					</table>
					</div>
					</div>
					</body>
					</html>';
					
					sendEmail($subject, $to, $emailContent  );
				}
				else
				{
				$stmt = $dbCon->prepare("insert into estore_employee_uninvited (first_name,last_name,country_id,phone_number,email,work_email,employee_number,company_id,created_on,personal_mobile,ssn) values(?, ?, ?, ?, ?, ?, ?, ?, now(),?,?)");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ssissssiss", $company_p,$contact_p, $rowCompany['country_id'], $phone, $contact_email_p, $email, $e_number,$company_id,$mobile_p,$ssn);
			$stmt->execute();
				}
			 
			}
			 
	 
			header("location:../../CompanyCrm/adminAccount/".$data['cid']);
		}
		
	}
?>