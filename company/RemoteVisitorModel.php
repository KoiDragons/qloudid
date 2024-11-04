<?php
	require_once('../AppModel.php');
	class RemoteVisitorModel extends AppModel
	{
		function meetingRoomDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
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
			 
			$stmt = $dbCon->prepare("select  company_meeting_room.id,room_name,visiting_address from company_meeting_room left join property_location on property_location.id=company_meeting_room.room_location_id where company_meeting_room.room_location_id=(select property_id from whitelist_ip where company_id=? and ip_address=? and ip_type=5)  order by company_meeting_room.created_on");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $company_id,$ip);
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
		
		
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=37");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
		
		function visitorsDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,first_name,last_name,created_on from remote_company_visitors  where company_id=? and status=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$j=$j+1;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function countryOption($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,country_name,country_code from phone_country_code order by country_code");
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
		
		function verifyIP($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
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
			$stmt = $dbCon->prepare("select id from whitelist_ip where company_id=? and ip_address=? and ip_type=5");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $company_id,$ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			//print_r($row); die;
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
			
			$stmt = $dbCon->prepare("select support_email,support_country,support_phone,sales_email,sales_country,sales_phone,invoice_email,invoice_country,invoice_phone,website,companies.country_id,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax,fb,twitter,insta,blog from companies left join company_profiles on companies.id=company_profiles.company_id left join country on companies.country_id=country.id left join phone_country_code on phone_country_code.country_name=country.country_name  where companies.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			
			
			
			$stmt->close();
			$dbCon->close();
			return $row;
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
		
			function checkVisitor($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$org=array();
			$date=date('Y-m-d');
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
			
			$stmt = $dbCon->prepare("select id from remote_company_visitors where ((country_id=? and phone_number=?) or (email=?)) and company_id=? and registration_date=? and ip_address=? and status=0");
			$stmt->bind_param("ississ", $_POST['cntry'],$_POST['uphno'],$_POST['email'],$company_id,$date,$ip);
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
			$stmt->close();
			$dbCon->close();
			return 0;	
			}
			
		}
		
		
		function checkExpressVisitor($data)
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
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$employee_id= $this -> encrypt_decrypt('decrypt',$_POST['eid']);
			$stmt = $dbCon->prepare("select country_of_residence,user_logins.created_on,companies.country_id,company_profiles.phone as cphone,passport_image,company_name,user_logins.email,user_logins.first_name,user_logins.last_name,phone_number,employees.user_login_id,employees.company_id from employees left join companies on companies.id=employees.company_id left join company_profiles on company_profiles.company_id=companies.id left join user_logins on employees.user_login_id=user_logins.id left join user_profiles on user_profiles.user_logins_id=user_logins.id where employees.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_emp = $result->fetch_assoc();
			$date=date('Y-m-d');
			$stmt = $dbCon->prepare("select id from remote_company_visitors where ((country_id=? and phone_number=?) or (email=?)) and company_id=? and registration_date=? and ip_address=? and status=0");
			$stmt->bind_param("ississ", $row_emp['country_of_residence'],$row_emp['phone_number'],$row_emp['email'],$company_id,$date,$ip);
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
			$stmt->close();
			$dbCon->close();
			return 0;	
			}
			
		}
		
		
				function checkEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$org=array();
			$date=date('Y-m-d');
			$stmt = $dbCon->prepare("select id from employees where email=? and company_id=?");
			$stmt->bind_param("si", $_POST['email'],$company_id);
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
			return 2;	
			}
			
		}
		
		function verifyActivation($data)
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
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$org=array();
			$date=date('Y-m-d h:i:s');
			$stmt = $dbCon->prepare("select created_on,valid_upto from activate_control_apps where id=(select max(id) from activate_control_apps where ip_address=? and company_id=?)");
			$stmt->bind_param("si", $ip,$company_id);
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
				if(date('Y-m-d h:i:s',strtotime($row['valid_upto']))>date('Y-m-d h:i:s'))
				{
				$stmt->close();
				$dbCon->close();
				 
				return 0;	
				}
				else
				{
				return 1;		
				}
			}
			
		}
		
		function informEmployee($data)
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
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
		 
			$stmt = $dbCon->prepare("insert into remote_company_visitors (company_id,first_name,last_name,company_name,email,country_id,phone_number,created_on,registration_date,registration_time,ip_address )values (?, ?, ?, ?, ?, ?, ?, now(), now(), now(),?)");
			/* bind parameters for markers */
			
			$stmt->bind_param("issssiss",$company_id,htmlentities($_POST['name'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['lname'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['cname'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['email'],$_POST['cntry'],$_POST['uphno'],$ip);
			if($stmt->execute())
			{
				$stmt->close();
				$dbCon->close();
				return  1;
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			
			
			
		}
		
		
		function visitorsExpressInfo($data)
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
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select country_of_residence,user_logins.created_on,companies.country_id,company_profiles.phone as cphone,passport_image,company_name,user_logins.email,user_logins.first_name,user_logins.last_name,phone_number,employees.user_login_id,employees.company_id from employees left join companies on companies.id=employees.company_id left join company_profiles on company_profiles.company_id=companies.id left join user_logins on employees.user_login_id=user_logins.id left join user_profiles on user_profiles.user_logins_id=user_logins.id where employees.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_emp = $result->fetch_assoc();
		 
			$stmt = $dbCon->prepare("insert into remote_company_visitors (company_id,first_name,last_name,company_name,email,country_id,phone_number,created_on,registration_date,registration_time,ip_address )values (?, ?, ?, ?, ?, ?, ?, now(), now(), now(),?)");
			/* bind parameters for markers */
			
			$stmt->bind_param("issssiss",$company_id,$row_emp['first_name'],$row_emp['last_name'],$row_emp['company_name'],$row_emp['email'],$row_emp['country_of_residence'],$row_emp['phone_number'],$ip);
			if($stmt->execute())
			{
				$stmt->close();
				$dbCon->close();
				return  1;
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			
			
			
		}
		
		function activateVisitors($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$date=date('Y-m-d h:i:s');
			if($_POST['ttl_time']<10)
			{
			$ttl_time=$_POST['ttl_time']*60;	
			}
			else 
			{
			 $ttl_time=$_POST['ttl_time'];
			}
			$validUpto=date('Y-m-d h:i:s', strtotime($ttl_time.' minutes'));
			
			$stmt = $dbCon->prepare("select id from employees where email=? and company_id=?");
			$stmt->bind_param("si", $_POST['email'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_emp = $result->fetch_assoc();
			
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
			
			$stmt = $dbCon->prepare("update remote_company_visitors set status=1 where ip_address=?");
			/* bind parameters for markers */
			
			$stmt->bind_param("s",$ip);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("insert into activate_control_apps (company_id,ip_address, created_on, valid_upto, employee_id, total_time, meeting_place, meeting_room)values (?, ?,?, ?, ?, ?, ?, ?)");
			/* bind parameters for markers */
			
			$stmt->bind_param("isssiiii",$company_id,$ip,$date,$validUpto,$row_emp['id'],$_POST['ttl_time'],$_POST['s_where'],$_POST['m_room']);
			if($stmt->execute())
			{
				$stmt->close();
				$dbCon->close();
				return  1;
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			
			
			
		}
	}						