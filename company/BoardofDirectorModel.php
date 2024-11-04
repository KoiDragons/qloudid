<?php
	require_once('../AppModel.php');
	class BoardofDirectorModel extends AppModel
	{
		function getAppsInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$app_id= 25;
			$stmt = $dbCon->prepare("select id from manage_apps_permission where app_id=? and country_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $app_id,$data['country_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $this->encrypt_decrypt('encrypt',$row['id']);
			
			}
		function addMember($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		
			$stmt = $dbCon->prepare("insert into company_board_directors (company_id,first_name,last_name,member_email,country_id,phone_number,member_type,created_on) values(?, ?, ?, ?, ?, ?, ?, now())");
			/* bind parameters for markers */
			$stmt->bind_param("isssisi",$company_id,htmlentities($_POST['first_name'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['last_name'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['memail'],$_POST['country'],$_POST['pnumber'],$_POST['mtype']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select id from user_logins  where email=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("s", $_POST['memail']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$to      = $_POST['memail'];
			$subject = "Qloudid : Request to become a Board Member";
						
			$emailContent ='You are invited to become a board member. Please Sign up <a href="https://www.qloudid.com/user/index.php/CreateAccount">here</a> to check the request.';
			sendEmail($subject, $to, $emailContent);	
			
			$stmt = $dbCon->prepare("select country_code from phone_country_code  where country_name=(select country_name from country where id=?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("s", $_POST['country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_phone = $result->fetch_assoc();
			$to = '+'.trim($row_phone['country_code']).''.trim($_POST['pnumber']);
			$subject       = "Connect request received!";
			$url="https://www.qloudid.com/user/index.php/CreateAccount";
			$surl=getShortUrl($url);
			$emailContent ='You are invited to become a board member. Please Sign up '.$surl.' to check the request.';
			$res=sendSms($subject, $to, $emailContent);
			
			}
			else
			{
			$to      = $_POST['memail'];
			$subject = "Qloudid : Request to become a Board Member";
						
			$emailContent ='You are invited to become a board member. Please click <a href="https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorShow">here</a> to check the request.';
			sendEmail($subject, $to, $emailContent);	
			
			$stmt = $dbCon->prepare("select country_code from phone_country_code  where country_name=(select country_name from country where id=?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("s", $_POST['country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_phone = $result->fetch_assoc();
			$to = '+'.trim($row_phone['country_code']).''.trim($_POST['pnumber']);
			$subject       = "Connect request received!";
			$url="https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorShow";
			$surl=getShortUrl($url);
			$emailContent ='You are invited to become a board member. Please check on '.$surl.' to check the request.';
			$res=sendSms($subject, $to, $emailContent);
				
			}
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function memberCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_board_directors  where company_id=? and is_approved!=2");
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
		
		function memberCountAdded($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_board_directors  where company_id=? and is_approved=0");
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
		
		function memberCountApproved($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_board_directors  where company_id=? and is_approved=1");
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
		
		function memberCountRejected($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_board_directors  where company_id=? and is_approved=2");
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
		
		function directorCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_board_directors  where company_id=? and member_type=1 and is_approved!=2");
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
		
		function bmemberCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_board_directors  where company_id=? and member_type=2 and is_approved!=2");
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
		
		function checkEmail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from company_board_directors  where company_id=? and member_email=?");
			/* bind parameters for markers */
			
			$stmt->bind_param("is", $company_id,$_POST['memail']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
			
			
		}
		function checkPhone($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_board_directors  where company_id=? and country_id=? and phone_number=?");
			/* bind parameters for markers */
			
			$stmt->bind_param("iis", $company_id,$_POST['country'],$_POST['pnumber']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
			
			
		}
		
		function memberDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name,company_board_directors.id,first_name,last_name,phone_number,phone_country_code.country_code,member_email,member_type from company_board_directors left join country on country.id=company_board_directors.country_id left join phone_country_code on phone_country_code.country_name=country.country_name where company_id=? and is_approved=0");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function memberDetailApproved($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name,company_board_directors.id,first_name,last_name,phone_number,phone_country_code.country_code,member_email,member_type from company_board_directors left join country on country.id=company_board_directors.country_id left join phone_country_code on phone_country_code.country_name=country.country_name where company_id=? and is_approved=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function memberDetailRejected($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name,company_board_directors.id,first_name,last_name,phone_number,phone_country_code.country_code,member_email,member_type from company_board_directors left join country on country.id=company_board_directors.country_id left join phone_country_code on phone_country_code.country_name=country.country_name where company_id=? and is_approved=2");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
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
				
		function checkPermissionUser($data)
		{
			$dbCon = AppModel::createConnection();
			
			$permission_id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("select is_admin from manage_employee_permissions where user_id=? and company_id=(select company_id from manage_employee_permissions where id=?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $data['user_id'],$permission_id);
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
			
				
			
		
		function employeesDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select manage_landloard_permissions.id,concat_ws(' ', first_name, last_name) as name,is_admin from manage_landloard_permissions left join user_logins on user_logins.id=manage_landloard_permissions.user_id where company_id=? limit 0,50");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
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
			
			$stmt = $dbCon->prepare("select country_id,companies.country_id,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
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
		
		
		function countryList($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,country_name from country where id>-1 and id<240 order by country_name");
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
		
		
		function industryList($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select name from company_categories");
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org="";
			while($row = $result->fetch_assoc())
			{
				$org=$org.$row['name'].",";
			}
			
			$org=substr($org,0,-1);
			//echo $org; die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		}	