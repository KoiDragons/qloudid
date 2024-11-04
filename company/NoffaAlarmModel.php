<?php
	require_once('../AppModel.php');
	class NoffaAlarmModel extends AppModel
	{
		
		 function updateChildInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			  
			$a=explode(',',substr($_POST['children_list'],0,-1));
			foreach($a as $key)
			{
			 	$stmt = $dbCon->prepare("INSERT INTO company_panic_information (company_id,child_id, created_on , modified_on ) VALUES (?,?, now(), now())");
				$stmt->bind_param("ii", $company_id, $key);
				$stmt->execute();
			}
		  
			$stmt->close();
			$dbCon->close();
			return 1; 
		}
	  
	  function updateChildInfoMobileApi()
		{
			$dbCon = AppModel::createConnection();
			 
			$a=json_decode(file_get_contents('php://input'), true);
			
			foreach($a as $key)
			{
				 
			 	$stmt = $dbCon->prepare("INSERT INTO company_panic_information (company_id,child_id, created_on , modified_on ) VALUES (?,?, now(), now())");
				$stmt->bind_param("ii", $key['CompanyId'], $key['ChildId']);
				$stmt->execute();
			}
		  
			$stmt->close();
			$dbCon->close();
			return 1; 
		}
		
		 function informEmployees($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			  
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as child_name from child_care_info where id in (select child_id from company_panic_information where company_id=? and is_informed=0)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result1 = $stmt->get_result();	
			while($rowChild = $result1->fetch_assoc())
			{
			$stmt = $dbCon->prepare("update company_panic_information set is_informed=1 where child_id=? and is_informed=0");
			$stmt->bind_param("i", $rowChild['id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select employees.email,country_of_residence,phone_number,country_code from employees left join user_logins on user_logins.id=employees.user_login_id left join user_profiles on user_logins.id=user_profiles.user_logins_id left join phone_country_code on user_logins.country_of_residence=phone_country_code.id where company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			$to = '+'.trim($row['country_code']).''.trim($row['phone_number']);	
			$subject       = "Missing child info!";
			$emailContent =$rowChild['child_name']." has been missing please note and provide help if possible.";
			$res=sendSms($subject, $to, $emailContent);
			$to = $row['email'];
			sendEmail($subject, $to, $emailContent);
			
			 
			}
			}
		  
			$stmt->close();
			$dbCon->close();
			return 1; 
			}
	 
	  function informEmployeesApi($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $data['cid'];
			  
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as child_name from child_care_info where id in (select child_id from company_panic_information where company_id=? and is_informed=0)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result1 = $stmt->get_result();	
			while($rowChild = $result1->fetch_assoc())
			{
			$stmt = $dbCon->prepare("update company_panic_information set is_informed=1 where child_id=? and is_informed=0");
			$stmt->bind_param("i", $rowChild['id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select employees.email,country_of_residence,phone_number,country_code from employees left join user_logins on user_logins.id=employees.user_login_id left join user_profiles on user_logins.id=user_profiles.user_logins_id left join phone_country_code on user_logins.country_of_residence=phone_country_code.id where company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			$to = '+'.trim($row['country_code']).''.trim($row['phone_number']);	
			$subject       = "Missing child info!";
			$emailContent =$rowChild['child_name']." has been missing please note and provide help if possible.";
			$res=sendSms($subject, $to, $emailContent);
			$to = $row['email'];
			sendEmail($subject, $to, $emailContent);
			
			 
			}
			}
		  
			$stmt->close();
			$dbCon->close();
			return 1; 
			}
	 
	 
	 function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$country_id= $data['country_id'];
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=43");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $this -> encrypt_decrypt('encrypt',$row['id']);;
		}
		
	  
		
		function appId()
		{
			
			return $this -> encrypt_decrypt('encrypt',43);
		}
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=43");
			
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
		
		function childrenDetail($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,address,first_name,last_name,social_number,created_on ,child_image_path from child_care_info where company_id=? and is_approved_dependent=1");
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select count(id) as num from company_panic_information where child_id=? and (is_found=0 or is_informed=0)");
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if($row1['num']==1)
				{
				continue;	
				}
				 
				
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				if($row ['child_image_path']!=null) { $filename="../estorecss/".$row ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $org[$j]['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['child_image_path'].'.jpg' ); } else { $org[$j]['image_path']="../html/usercontent/images/person-male.png"; } }  else $org[$j]['image_path']="../html/usercontent/images/person-male.png";
				
				
				 
				
				$j++;
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			}
		
		
			function childrenDetailMobileApi($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,address,first_name,last_name,social_number,created_on ,child_image_path from child_care_info where company_id=? and is_approved_dependent=1");
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['cid']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select count(id) as num from company_panic_information where child_id=? and (is_found=0 or is_informed=0)");
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if($row1['num']==1)
				{
				continue;	
				}
				 
				$row['first_name']=html_entity_decode($row['first_name']);
				$row['last_name']=html_entity_decode($row['last_name']);
				$row['address']=html_entity_decode($row['address']);
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				if($row['child_image_path']!=null) { $filename="../estorecss/".$row['child_image_path'].".txt";  if (file_exists($filename)) {   $value_a=file_get_contents("../estorecss/".$row['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $org[$j]['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['child_image_path'].'.jpg' ); $org[$j]['image_path']= str_replace('..','https://www.qloudid.com',$org[$j]['image_path']); } else { $org[$j]['image_path']="https://www.qloudid.com/html/usercontent/images/person-male.png"; } }  else $org[$j]['image_path']="https://www.qloudid.com/html/usercontent/images/person-male.png";
					$j++;
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			}
		

	function missingChildrenMobileApiDetail($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
		 
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select id,address,first_name,last_name,social_number,created_on ,child_image_path from child_care_info where company_id=? and is_approved_dependent=1 and id in (select child_id from company_panic_information where company_id=? and (is_found=0 or is_informed=0))");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['cid'],$data['cid']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$row['first_name']=html_entity_decode($row['first_name']);
				$row['last_name']=html_entity_decode($row['last_name']);
				$row['address']=html_entity_decode($row['address']); 
			 	array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				if($row['child_image_path']!=null) { $filename="../estorecss/".$row['child_image_path'].".txt";  if (file_exists($filename)) {   $value_a=file_get_contents("../estorecss/".$row['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $org[$j]['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['child_image_path'].'.jpg' ); $org[$j]['image_path']= str_replace('..','https://www.qloudid.com',$org[$j]['image_path']); } else { $org[$j]['image_path']="https://www.qloudid.com/html/usercontent/images/person-male.png"; } }  else $org[$j]['image_path']="https://www.qloudid.com/html/usercontent/images/person-male.png";
				$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			}
		

function missingChildrenDetail($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,address,first_name,last_name,social_number,created_on ,child_image_path from child_care_info where company_id=? and is_approved_dependent=1 and id in (select child_id from company_panic_information where company_id=? and (is_found=0 or is_informed=0))");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			 	array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				if($row ['child_image_path']!=null) { $filename="../estorecss/".$row ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $org[$j]['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['child_image_path'].'.jpg' ); } else { $org[$j]['image_path']="../html/usercontent/images/person-male.png"; } }  else $org[$j]['image_path']="../html/usercontent/images/person-male.png";
				
				
				 
				
				$j++;
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			}
			


		
function missingChildDetail($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['wanted_id']);
			 
			$stmt = $dbCon->prepare("select id,address,concat_ws(' ',first_name,last_name) as child_name,social_number,created_on ,child_image_path from child_care_info where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $child_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			 	 
				$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				if($row ['child_image_path']!=null) { $filename="../estorecss/".$row ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $row['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['child_image_path'].'.jpg' ); } else { $row['image_path']="../html/usercontent/images/person-male.png"; } }  else $row['image_path']="../html/usercontent/images/person-male.png";
			 
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
		
		 
		
	}						