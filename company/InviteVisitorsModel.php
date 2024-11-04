<?php
	require_once('../AppModel.php');
	class InviteVisitorsModel extends AppModel
	{
	function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=2");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close(); 
				$dbCon->close();
				return $row;
			
			
		}
	
	function addVisitor($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$employee_id= $this -> encrypt_decrypt('decrypt',$_POST['ind']);
			
			$stmt = $dbCon->prepare("select concat_ws('',first_name,last_name) as name,company_name from employees left join companies on companies.id=employees.company_id where employees.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
				$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=(select country_name from country where id=? )");
				
				/* bind parameters for markers */
				$stmt->bind_param("s", $_POST['cid']);
				$stmt->execute();
				$result_phone = $stmt->get_result();
				$row_phone = $result_phone->fetch_assoc();
			$mdate=date('Y-m-d',strtotime($_POST['vdate']));
				$stmt = $dbCon->prepare("insert into employee_invited_visitor (company_name,visitor_type,company_id,inviting_employee,first_name,last_name,visitor_email,visiting_date,visiting_time,created_on,repeating_cycle,meeting_room,country_id,phone_number ) values (?,?,?, ?, ?, ?, ?, ?, ?, now(), ?, ?, ?, ?)");
			/* bind parameters for markers */
			
			$stmt->bind_param("siiisssssiiis",htmlentities($_POST['cname'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['vtype'],$company_id,$employee_id,htmlentities($_POST['name'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['lname'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['email'],$mdate,$_POST['vtime'],$_POST['vrepeat'],$_POST['meeting_room'],$_POST['cid'],$_POST['phone']);
				if($stmt->execute())
				{
				$id=$stmt->insert_id;
				$encd=$this->encrypt_decrypt('encrypt',$id);
				$url="https://www.qloudid.com/public/index.php/VisitorsQR/visitorAccount/".$encd;	
				$to      = $_POST['email'];
				$subject = "Meeting Invitation received";
				$emailContent ="You are invited to meet ".$row['name']." at ".$row['company_name']." please scan qr code on reception to confirm your visit. Generate QR Code <a href='".$url."'>here</a>";
				sendEmail($subject, $to, $emailContent);
				
				$to            = '+'.trim($row_phone['country_code']).''.trim($_POST['phone']);
				
				$surl=getShortUrl($url);
				$emailContent =$row['name']." has sent you request for a meeting at ".$row['company_name']." please scan qr code on reception to confirm your visit. you can check qr code here: ".$surl;
				$res=sendSms($subject, $to, $emailContent);
				
				$stmt->close();
				$dbCon->close();
				return 1;
				}
				 else {
				 echo $stmt->error();
				 $stmt->close();
				$dbCon->close();
				return 0;
			}
		}
		
		function meetingRoomDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,room_name,created_on from company_meeting_room where company_id=? order by created_on desc");
			
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
				$j++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
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
		
		function companyID($data)
		{
			$dbCon = AppModel::createConnection();
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select company_id  from employees where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $this -> encrypt_decrypt('encrypt',$row['company_id']);
			
		}
		
		
		function selectCountry()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_code  from phone_country_code order by country_code");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			$contry = array();
			while ($row = $result->fetch_assoc()) {
				
				array_push($contry, $row);
			}
			
			$stmt->close();
			$dbCon->close();
			return $contry;
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
			
			$stmt = $dbCon->prepare("select country_id,grading_status,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
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
		
		
	}							