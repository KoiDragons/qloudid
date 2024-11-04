<?php
	require_once('../AppModel.php');
	class EmployeeBusinessCardDetailModel extends AppModel
	{
		function employeeDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select employees.id,concat_ws(' ', first_name, last_name) as name,user_login_id,personal_code,employee_qard_permission.id as quard_id from employees left join employee_qard_permission on employee_qard_permission.employee_id=employees.id where employee_id=? limit 0,20");
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
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
		
		
	
		
		function sharedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select employee_info_shared.id,phone_number,employee_info_shared.country_code,country_name,total_share,modified_on,email_id from employee_info_shared  left join country on country.id=employee_info_shared.country_id where employee_id=(select id from employees where company_id=? and user_login_id=?) order by modified_on limit 0,20");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
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
			
			function moreSharedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*20;
			$b=20;
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select employee_info_shared.id,phone_number,employee_info_shared.country_code,country_name,total_share,modified_on,email_id from employee_info_shared  left join country on country.id=employee_info_shared.country_id where employee_id=(select id from employees where company_id=? and user_login_id=?) order by modified_on limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiii", $company_id,$data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				if($row['email_id']=="" || $row['email_id']==null) $share= '+'.$row['country_code'].''.$row['phone_number']; else $share = $row['email_id'];
				
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'	<tr id="0" class="fsz16 xs-fsz16">

																			<td class="pad5 brdb_new tall cn">
																				<div class="padtb5 ">'.$share.'</div>
																			</td>
																			<td class="pad5 brdb_new tall nm hidden-xs ">
																				<div class="padtb5 ">'.$row['country_name'].'</div>
																			</td>
																			<td class="pad5 brdb_new tall cd">
																				<div class="padtb5 ">'.$row['total_share'].'</div>
																			</td>


																			<td class="pad5 brdb_new tall ap hidden-xs ">
																				<div class="padtb5 black_txt">'.date('Y-m-d',strtotime($row['modified_on'])).'</div>
																			</td>


																		</tr>';
				
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
	}		