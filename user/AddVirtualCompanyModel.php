<?php

	require_once('../AppModel.php');
	class AddVirtualCompanyModel extends AppModel
	{
		function addVirtualCompanyDetail($data)
		{
			ini_set('max_execution_time', 0);
			$dbCon = AppModel::createConnection();
			
				$data['admin_id']=43;
				$data['user_id']=43;
				$user_admin=0;
			
			$hash_code   = substr(md5(uniqid(rand(), true)), 16, 16);
			$stmt = $dbCon->prepare("select * from virtual_company where cid not in (select cid from company_profiles) order by id");
			$stmt->execute();
			$resultt= $stmt->get_result();
			while($row_company = $resultt->fetch_assoc())
			{
				//print_r($row_company); 
			$country=201;
			$web='www.qloudid.com';
			$st=1;
			$stmt = $dbCon->prepare("insert into companies(o_type,country_id,user_login_id,company_name,company_email,website,hash_code,created_date,email_verification_status,created_by,user_role) 
			values(?, ?, ?, ?, ?, ?, ?, now(), ?, ?, ?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiissssiii", $st, $country, $data['admin_id'], $row_company['company_name'], $row_company['company_email'], $web, $hash_code,$st,$data['user_id'],$position_type);
			$stmt->execute();
			
			
				$id=$stmt->insert_id;
			echo $id.'</br>';
				$stmt = $dbCon->prepare("insert into company_profiles(`company_id`,address,cid,created_on,modified_on) values(?, ?, ?,now(),now())");
				
				$stmt->bind_param("iss", $id, $row_company['address'],$row_company['cid']);
				$stmt->execute();
				
				
				$stmt = $dbCon->prepare("insert into user_company_profile(`company_id`,`user_login_id`) values(?, ?)");
				
				$stmt->bind_param("ii", $id, $data['admin_id']);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("insert into location (company_id,country_id,location,created_on) values (?, ?, ?, now())");
				
				$stmt->bind_param("iis", $id, $country,  $data['location']);
				$stmt->execute();
				$locationrow = $stmt->insert_id;
				
				$stmt        = $dbCon->prepare("insert into warehouse(`company_id`,`location_id`,`created_on`) values (?, ?, now())");
				
				$stmt->bind_param("ii", $id, $locationrow);
				$stmt->execute();
				$stmt->close();
				
				$stmt = $dbCon->prepare("select first_name,last_name,email,email_verification_code from user_logins where id=?");
					$stmt->bind_param("i", $data['admin_id']);
					$stmt->execute();
					$result  = $stmt->get_result();
					$adminrow = $result->fetch_assoc();
					
					$stmt       = $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`,`created_by`) values(?, ?, ?, ?, ?, ?, ?, ?)");
					$status_emp = 0;
					$stmt->bind_param("ississii", $id, $adminrow['first_name'], $adminrow['last_name'], $status_emp, $adminrow['email_verification_code'], $adminrow['email'], $data['admin_id'], $data['user_id']);
					$stmt->execute();
					$super_admin=$stmt->insert_id;
					
					$stmt = $dbCon->prepare("insert into manage_employee_permissions (is_admin, employee_id, permission, user_id, company_id, page_id, created_date, modified_date ) values(?, ?, ?, ?, ?, ?, now(),now())");
					/* bind parameters for markers */
					$cont=1;
					$stmt->bind_param("iiiiii",$cont,$super_admin,$cont,$data['admin_id'],$id,$cont);
					$stmt->execute();
					
					
						
					
				
				$stmt       = $dbCon->prepare("insert into company_permission (`company_id`,`user_login_id`,`purchase`,`alert`,`supplier`,`customer`,`employee`,`proposal`,`project_proposal`,`create_article`,`import_article`) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$status_per = 1;
				$stmt->bind_param("iiiiiiiiiii", $id, $data['user_id'], $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per);
				$stmt->execute();
				
				
				$stmt       = $dbCon->prepare("insert into company_verified (company_id,verified,unvarified,is_verified) values (?, ?, ?, ?)");
				$status_ver = 7;
				$stmt->bind_param("iiii", $id, $status_emp, $status_ver, $status_emp);
				$stmt->execute();
				$is_headquarter=1;
				$property_id=6;
				if($row_company['address']=="" || $row_company['address']==null)
				{
					$row_company['address']=$row_company['zipcode'].','.$row_company['city'].','.$row_company['country_name'];
				}
				$stmt = $dbCon->prepare("INSERT INTO property_location (company_id,property_id,visiting_address,created_on, is_headquarter,qloudid_property_id) VALUES ( ?, ?, ?, now(), ?, ?)");
				$stmt->bind_param("iisii", $id,$property_id,$row_company['address'],$is_headquarter,$id);
				$stmt->execute();
				$property_id=$stmt->insert_id;
				
			
				
			
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
	}		