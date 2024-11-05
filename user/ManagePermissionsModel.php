<?php
	require_once('../AppModel.php');
	class ManagePermissionsModel extends AppModel
	{
		
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
		
		function updateRequest($data)
		{
			$dbCon = AppModel::createConnection();
			
			$permission_id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("update manage_employee_permissions set permission=?,modified_date=now() where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['updateR'],$permission_id);
			if($stmt->execute())
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
		
		
		function approveRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$permission_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("update manage_employee_permissions set is_admin=?,modified_date=now() where company_id=? and user_id=(select user_id from company_admin_requests where id=?)");
			$pr=1;
			/* bind parameters for markers */
			$stmt->bind_param("iii", $pr,$company_id,$permission_id);
			if($stmt->execute())
			{
		
			$stmt = $dbCon->prepare("delete from company_admin_requests where id=?");
			$pr=1;
			/* bind parameters for markers */
			$stmt->bind_param("i", $permission_id);
			$stmt->execute();
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
		
		
			function rejectRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$permission_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("delete from company_admin_requests where id=?");
			$pr=1;
			/* bind parameters for markers */
			$stmt->bind_param("i", $permission_id);
			if($stmt->execute())
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
		
		
		function updateAdminStatus($data)
		{
			$dbCon = AppModel::createConnection();
			
			$permission_id= $_POST['p_id'];
			
			$stmt = $dbCon->prepare("select company_id,user_id,employee_id from manage_employee_permissions where id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $permission_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select id,user_login_id from companies where id=(select company_id from manage_employee_permissions where id=?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $permission_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_company = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select id from employees where company_id=? and user_login_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $row_company['id'],$row_company['user_login_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_employee = $result->fetch_assoc();
			
			if($row['user_id']==$data['user_id'])
			{
					$stmt->close();
					$dbCon->close();
					return 2;
			}
			
			
			if($row_employee['id']==$row['employee_id'])
			{
					$stmt->close();
					$dbCon->close();
					return 3;
			}
			$stmt = $dbCon->prepare("update manage_employee_permissions set is_admin=?,modified_date=now() where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['updateR'],$permission_id);
			if($stmt->execute())
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
		
		function getCompany($data)
		{
			$dbCon = AppModel::createConnection();
			
			$permission_id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("select company_id from manage_employee_permissions where id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $permission_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $this->encrypt_decrypt('encrypt',$row['company_id']);
			
			
		}
		
		function checkPermissionData($data)
		{
			$dbCon = AppModel::createConnection();
			
			$permission_id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("select permission from manage_employee_permissions where  id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $permission_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$checked="";
				if($row['permission']==0)
				{
					$checked="";
					$stmt->close();
					$dbCon->close();
					return $checked;
				}
				
				else
				{
					$checked="checked";
					$stmt->close();
					$dbCon->close();
					return $checked;
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
			$stmt = $dbCon->prepare("select id,permission from manage_employee_permissions where user_id=? and company_id=? and page_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iii", $data['user_id'],$company_id,$data['page_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
			$stmt = $dbCon->prepare("select id,user_login_id from employees where company_id=? and user_login_id not in (select user_id from manage_employee_permissions where company_id=? and page_id=?)");
			/* bind parameters for markers */
			
			$stmt->bind_param("iii",$company_id,$company_id,$data['page_id']);
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
			$stmt = $dbCon->prepare("select id,user_login_id from employees where company_id=? and user_login_id not in (select user_id from manage_employee_permissions where company_id=? and page_id=?)");
			/* bind parameters for markers */
			
			$stmt->bind_param("iii",$company_id,$company_id,$data['page_id']);
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
			$stmt = $dbCon->prepare("select manage_employee_permissions.id,concat_ws(' ', first_name, last_name) as name,is_admin from manage_employee_permissions left join user_logins on user_logins.id=manage_employee_permissions.user_id where company_id=? limit 0,50");
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
		
		
		function moreAdminDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*50;
			$b=$a+50;
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select manage_employee_permissions.id,concat_ws(' ', first_name, last_name) as name,is_admin from manage_employee_permissions left join user_logins on user_logins.id=manage_employee_permissions.user_id where company_id=? limit ?,?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				
				if($row['is_admin']==1) $checked= 'checked'; else $checked= ''; 
				$org=$org.'<tr class="fsz16 xs-fsz16">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">'.$row['name'].'</a></div>
													</td>
													
													<td class="pad5 brdb_new talr">
														<div class="padtb5">
															<div class="boolean-control boolean-control-small boolean-control-green fright '.$checked.'" onclick="updateAdmin('.$row['id'].',this);">
																<input type="checkbox" name="data_request" id="data_request" class="default" data-true="Yes" data-false="No" >
															</div>
														</div>
													</td>
													
												</tr>';
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function adminRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select company_admin_requests.id,concat_ws(' ', first_name, last_name) as name  from company_admin_requests left join user_logins on user_logins.id=company_admin_requests.user_id where company_id=? limit 0,50");
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
		
		
		function moreAdminRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*50;
			$b=$a+50;
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select company_admin_requests.id,concat_ws(' ', first_name, last_name) as name  from company_admin_requests left join user_logins on user_logins.id=company_admin_requests.user_id where company_id=? limit ?,?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				
				if($row['is_admin']==1) $checked= 'checked'; else $checked= ''; 
				$org=$org.'<tr class="fsz16 xs-fsz16">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " >'.$row['name'].'</div>
													</td>
													
													<td class="pad5 brdb_new talr">
														<a href="../approveRequest/'.$enc.'/'.$data['cid'].'"><div class="padtb5">
															Approve
														</div></a>
													</td>
													<td class="pad5 brdb_new talr">
														<a href="../rejectRequest/'.$enc.'/'.$data['cid'].'"><div class="padtb5">
															Reject
														</div></a>
													</td>
													
												</tr>';
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		function moreEmployeesDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST*50;
			$b=$a+50;
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select manage_employee_permissions.id,concat_ws(' ', first_name, last_name) as name from manage_employee_permissions left join user_logins on user_logins.id=manage_employee_permissions.user_id where company_id=? limit ?,?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<tr class="fsz16">
													
													<td class="pad5 brdb tall cn">
														<a href="../setPermissions/'.$enc.'"><div class="padtb5 " >'.$row['name'].'</div></a>
													</td>
													
												
													
												</tr>';
				
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function employeesCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from employees  where company_id=?");
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
		
		function adminRequestCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_admin_requests  where company_id=?");
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
			
			$stmt = $dbCon->prepare("select companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
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
		function updateDataPost($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update company_profiles set address=?,city=?,country=?,zip=?  where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssssi", $_POST['addrs'],$_POST['city'],$_POST['cntry'],$_POST['zip'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateDataPostSupplier($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update company_profiles set si_address=?,si_city=?,si_country=?,si_zip=?,sd_address=?,sd_city=?,sd_country=?,sd_zip=?,vat=?   where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("sssssssssi", $_POST['addrssi'],$_POST['citysi'],$_POST['cntrysi'],$_POST['zipsi'],$_POST['addrssd'],$_POST['citysd'],$_POST['cntrysd'],$_POST['zipsd'],$_POST['vat'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateDataPostNew($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update company_profiles set delivery_address=?,d_city=?,d_country=?,d_zip=?  where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssssi", $_POST['addrs'],$_POST['city'],$_POST['cntry'],$_POST['zip'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function countryList($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select country_name from country where id>-1");
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org="";
			while($row = $result->fetch_assoc())
			{
				$org=$org.$row['country_name'].",";
			}
			
			$org=substr($org,0,-1);
			//echo $org; die;
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
		
		function updateDataPhone($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update company_profiles set phone_country=?,phone=? where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssi", $_POST['c_phone'],$_POST['phone'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateImage($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$data1 = strip_tags($_POST['image-data1']);
			//echo $data; die;
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			//echo $img_name1; print_r($_POST); die;
			$stmt = $dbCon->prepare("update company_profiles set profile_pic=?  where company_id=?");
			
			$stmt->bind_param("si", $img_name1,$company_id);
			$stmt->execute();
			// echo "jain"; die;
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateData($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			//  print_r($_POST); die;
			$stmt = $dbCon->prepare("update companies set company_name=?,industry=?  where id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssi", $_POST['name'],$_POST['l_name'],$company_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update company_profiles set cid=?,founded=?  where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssi", $_POST['ssn'],$_POST['dob'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateDataBank($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("update company_profiles set bankgiro_med=?,bankgiro_utan=?,iban=?,bic=?,bank=?,f_tax=?  where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssssssi", $_POST['bankgiro_med'],$_POST['bankgiro_utan'],$_POST['iban'],$_POST['bic'],$_POST['bank'],$_POST['ftax'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
	}	