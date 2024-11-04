<?php
	require_once('../AppModel.php');
	class ConnectedEmployeeModel extends AppModel
	{
		function sendInvitation($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);			
			
			$stmt = $dbCon->prepare("insert into qard_invitation(sender_id,receiver_id,msg_to_receiver,created_on)
			values(?,?,?,now())");
			$stmt->bind_param("iis",$_POST['sender_id'],$_POST['receiver_id'],$_POST['msg']);
			$stmt->execute();
			$id=$stmt->insert_id;
			$encd=$this->encrypt_decrypt('encrypt',$id);		
			$url="https://www.qloudid.com/public/index.php/QardInvitation/invitationInfo/".$encd;
			$surl=getShortUrl($url);
			
			$stmt = $dbCon->prepare("select phone_number,d_country,phone,user_logins.email,mobile,title,country_code from user_company_profile   left join user_logins on user_logins.id=user_company_profile.user_login_id left join phone_country_code on user_logins.country_of_residence=phone_country_code.id left join user_profiles on user_profiles.user_logins_id=user_company_profile.user_login_id  where company_id=? and user_login_id=(select user_login_id from employees where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$_POST['receiver_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_profile = $result->fetch_assoc();
			 
			
			$to= '+'.trim($row_profile['country_code']).''.trim($row_profile['phone_number']);
			$subject       = "Invitation received";
						
			$emailContent =$_POST['msg'].'please click here to visit the instrunctions'.$surl;			
			
			
			$res=sendSms($subject, $to, $emailContent);
						
			$to            = $row_profile['email'];
						
			$subject       = "Invitation received!";
			$emailContent =$_POST['msg'].'you have received an invitation to check the quard.please visit <a href="'.$url.'">here</a> to check the instrunctions';
			sendEmail($subject, $to, $emailContent);
			
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
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
			$stmt = $dbCon->prepare("insert into manage_employee_permissions (user_id,company_id,page_id,created_date,modified_date,employee_id) values(?, ?, ?, now(),now(),?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iiii",$row['user_login_id'],$company_id,$data['page_id'],$row['id']);
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
		
		
			$stmt = $dbCon->prepare("insert into manage_employee_permissions (is_admin, employee_id, permission, user_id, company_id, page_id, created_date, modified_date ) values(?, ?, ?, ?, ?, ?, now(),now())");
			/* bind parameters for markers */
			$cont=1;
			
		
			$stmt->bind_param("iiiiii",$cont,$row['id'],$cont,$data['user_id'],$company_id,$data['page_id']);
			$stmt->execute();
			$stmt = $dbCon->prepare("select id,user_login_id from employees where company_id=? and user_login_id not in (select user_id from manage_employee_permissions where company_id=?)");
			/* bind parameters for markers */
			
			$stmt->bind_param("ii",$company_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into manage_employee_permissions (user_id,company_id,page_id,created_date,modified_date,employee_id) values(?, ?, ?, now(),now(),?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iiii",$row['user_login_id'],$company_id,$data['page_id'],$row['id']);
			$stmt->execute();
			}
			}
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			
			}
			
			
			
		function checkPermission($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,is_admin from manage_employee_permissions where user_id=? and company_id=? and page_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iii", $data['user_id'],$company_id,$data['page_id']);
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
		
			function generateEmployeeQuard($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$password=md5($_POST['password']);
			
			$stmt = $dbCon->prepare("insert into employee_qard_permission (employee_id,personal_code,password,created_on) values(?, ?, ?,now())");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iss",$_POST['emp_id'],$_POST['quard_id'],$password);
			$stmt->execute();
			$stmt = $dbCon->prepare("select email  from user_logins where id=(select user_login_id from employees where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['emp_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			 
			$emp= $this -> encrypt_decrypt('encrypt',$_POST['emp_id']);
			$to=$row['email'];
			$subject="Business qard generated";
			$emailContent="Your employee business quard has been generated with Personal code: ".$_POST['quard_id']." and Password : ".$_POST['password']." you can visit your business card <a href='https//www.qloudid.com/public/index.php/PublicEmployeeInfo/listQuardInformation/".$emp."'>here</a>";
			sendEmail($subject, $to, $emailContent);
			//echo $emailContent; die;
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
			
		}
			function removeEmployeeQuard($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$qard_id= $this -> encrypt_decrypt('decrypt',$_POST['id']);
			//print_r($data); die;
			$stmt = $dbCon->prepare("delete from employee_qard_permission where id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i",$qard_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from saved_employee_quard where quard_permission_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i",$qard_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
			
		}
		
	function generateCode($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$j=0;
			$stmt = $dbCon->prepare("select country_code from country where id= (select country_id from companies where id=?)");
			/* bind parameters for markers */
			
			$stmt->bind_param("i",$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			while($j==0)
			{
			$code=$row['country_code']."".(mt_rand(111111,999999)); 
			$stmt = $dbCon->prepare("select id from employee_qard_permission where personal_code=?");
			/* bind parameters for markers */
			
			$stmt->bind_param("s",$code);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$j++;
			}
			}
			$stmt->close();
			$dbCon->close();
			return $code;
			
		}
		
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=34");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
		
		
		
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image from user_logins where id = ?");
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
		function employeeID($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id from employees where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
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
			
			$stmt = $dbCon->prepare("select grading_status,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
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
		
		
	
		
		function employeeDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select employees.id,concat_ws(' ', first_name, last_name) as name,user_login_id,personal_code,employee_qard_permission.id as quard_id from employees left join employee_qard_permission on employee_qard_permission.employee_id=employees.id where company_id=? limit 0,20");
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org[$j]['quard_enc']= $this -> encrypt_decrypt('encrypt',$row['quard_id']);
				
				$j++;
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			}
			
			function moreEmployeeDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*20;
			$b=20;
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select employees.id,concat_ws(' ', first_name, last_name) as name,user_login_id,personal_code,employee_qard_permission.id as quard_id from employees left join employee_qard_permission on employee_qard_permission.employee_id=employees.id where company_id=? limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$encid=$this->encrypt_decrypt('encrypt',$row['id']);
				$enc=$this->encrypt_decrypt('encrypt',$row['quard_id']);
				$enc1="'".$enc."'";
				if($row['personal_code']!="" || $row['personal_code']!=null) { 
																			
				if($row['user_login_id']==43)
				{
					$a='<a href="https://www.qloudid.com/public/index.php/PublicEmployeeInfo/companyAccount/'.$encid.'"><div class="padtb5 ">'.$row['name'].'</div></a>';
					$td='<td class="pad5 brdb_new tall">
																				<div class="padtb5">
																				<div class="boolean-control boolean-control-small boolean-control-green fright checked" id="'.$row['id'].'" onclick="dontRemove(this);">
																				<input type="checkbox" name="data_request" id="data_request" class="default" data-true="Yes" data-false="No">
																				<div class="boolean-control-wrap"><div class="boolean-control-options"><a href="#" data-value="true" class="boolean-control-option true">Yes</a><a href="#" data-value="false" class="boolean-control-option false">No</a><div class="clear"></div></div></div></div>
																				</div>
																				</td>';
				}
				else
				{
					$a='<a href="https://www.qloudid.com/public/index.php/PublicEmployeeInfo/companyAccount/'.$encid.'"><div class="padtb5 ">'.$row['name'].'</div></a>';
					$td='<td class="pad5 brdb_new tall">
																				<div class="padtb5">
																				<div class="boolean-control boolean-control-small boolean-control-green fright checked" id="'.$row['id'].'" onclick="removeEmployeeQuard('.$enc1.');">
																				<input type="checkbox" name="data_request" id="data_request" class="default" data-true="Yes" data-false="No">
																				<div class="boolean-control-wrap"><div class="boolean-control-options"><a href="#" data-value="true" class="boolean-control-option true">Yes</a><a href="#" data-value="false" class="boolean-control-option false">No</a><div class="clear"></div></div></div></div>
																				</div>
																				</td>';
				}
				
				}
				else
				{
					$a='<a href="https://www.qloudid.com/public/index.php/PublicEmployeeInfo/companyQuard/'.$encid.'"><div class="padtb5 ">'.$row['name'].'</div></a>';
					$td='<td class="pad5 brdb_new tall">
					<div class="padtb5">
					<div class="boolean-control boolean-control-small boolean-control-green fright " id="'.$row['id'].'" onclick="generateCode('.$row['id'].',this);">
					<input type="checkbox" name="data_request" id="data_request" class="default" data-true="Yes" data-false="No">
					<div class="boolean-control-wrap"><div class="boolean-control-options"><a href="#" data-value="true" class="boolean-control-option true">Yes</a><a href="#" data-value="false" class="boolean-control-option false">No</a><div class="clear"></div></div></div></div>
					</div>
					</td>';
					
				}
				
				$org=$org.'	<tr id="0" class="fsz18 xs-fsz18 lgn_hight_35">

																			
																			<td class="pad5 brdb_new tall nm hidden-xs ">
																				<a href="https://www.qloudid.com/public/index.php/PublicEmployeeInfo/companyAccount/'.$encid.'"><div class="padtb5 ">'.$row['name'].'</div></a>
																			</td>
																		

																			'.$td.'
																				
																			<td class="pad5 brdb_new tall nm ">
																			
																				<a href="#" onclick="inviteEmployee('.$row['id'].');"><div class="padtb5 ">Invite</div></a>
																			
																			</td>

																		</tr>';
				
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
	}		