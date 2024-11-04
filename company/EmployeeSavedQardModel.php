<?php
	require_once('../AppModel.php');
	class EmployeeSavedQardModel extends AppModel
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
		
		
		
		
		
		function countryOption($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,country_name  from country where id>-1 and id<240 order by country_name");
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
		
		function sharedQard($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$dbCon = AppModel::createConnection();
			$emp_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select concat_ws(' ',employees.first_name,employees.last_name) as name,employees.email,company_name,passport_image from saved_employee_quard left join employee_qard_permission on employee_qard_permission.id= saved_employee_quard.quard_permission_id left join employees on employees.id=employee_qard_permission.employee_id left join companies on companies.id=employees.company_id left join user_logins on user_logins.id=employees.user_login_id  where saved_employee_quard.employee_id=? order by saved_employee_quard.created_on desc limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $emp_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				if($row ['passport_image']!=null) { $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $org[$j]['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $org[$j]['image_path']="../html/usercontent/images/person-male.png"; } }  else $org[$j]['image_path']="../html/usercontent/images/person-male.png";
				$j++;
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function sharedCount($data)
		{
			$dbCon = AppModel::createConnection();
			$emp_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select count(id) as num from saved_employee_quard where employee_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $emp_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
			function moreSharedQard($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$dbCon = AppModel::createConnection();
			$emp_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select concat_ws(' ',employees.first_name,employees.last_name) as name, employees.email,company_name,passport_image from saved_employee_quard left join employee_qard_permission on employee_qard_permission.id= saved_employee_quard.quard_permission_id left join employees on employees.id=employee_qard_permission.employee_id left join companies on companies.id=employees.company_id left join user_logins on user_logins.id=employees.user_login_id where saved_employee_quard.employee_id=? order by saved_employee_quard.created_on desc limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii",$emp_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				if($row ['passport_image']!=null) { $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $row['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $row['image_path']="../html/usercontent/images/person-male.png"; } }  else $row['image_path']="../html/usercontent/images/person-male.png";
				
				$org=$org.'<tr class="fsz16">
				
			
													
													<td class="pad5 brdb_new tall nm hidden-xs "><div class="wi_40p xs-wi_50p hei_40p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 yellow_bg_a" ><img src="../../../'.$row['image_path'].'" width="40px;" height="40px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div>	
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.$row['name'].'</div>
														<div class="mart2 hidden-xs fsz14">
																			'.$row['email'].'
																			
																		</div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.$row['company_name'].'</div>
													</td>
				
												
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}	
		
		
			
		function invitedVisitors($data)
		{
			$dbCon = AppModel::createConnection();
			$emp_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select first_name,last_name,company_name,visiting_date,visiting_time,visitor_email from employee_invited_visitor where inviting_employee=?  order by created_on ");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $emp_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function invitationCount($data)
		{
			$dbCon = AppModel::createConnection();
			$emp_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select count(id) as num from employee_invited_visitor where inviting_employee=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $emp_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		function getCompany($data)
		{
			$dbCon = AppModel::createConnection();
			$emp_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select company_id from employees where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $emp_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $this -> encrypt_decrypt('encrypt',$row['company_id']);
			
		}
		
		
	}						