<?php
	require_once('../AppModel.php');
	
	class ManageRequestModel extends AppModel
	{
		function checkPermission($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,permission from manage_employee_permissions where user_id=? and company_id=? and page_id=?");
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
				if($row['permission']==0)
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
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
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
			
				
			
		
		function empVerify($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			//echo $company_id; die;
			$stmt = $dbCon->prepare("select employees.id,company_email,company_name,industry from employees left join companies on companies.id=employees.company_id where company_id=? and employees.user_login_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $company_id,$data['user_id']);
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
				return 1;
			}
			
			
			
		}
		
		
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			
			$stmt = $dbCon->prepare("select company_name from companies where companies.id = ?");
			
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
		
		function employeeId($data)
		{
			$dbCon = AppModel::createConnection();
			$emp_id= $this -> encrypt_decrypt('encrypt',$data['user_id']);
			
			$dbCon->close();
			return $emp_id;
			
			
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
		
		
		function companySummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			//echo $company_id; die;
			$stmt = $dbCon->prepare("select company_email,company_name,company_categories.name as industry from companies left join company_categories on company_categories.id=companies.industry where companies.id=?");
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
		
		
		function requestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select employee_request_cloud.id,company_name,last_name,first_name,email from employee_request_cloud left join user_logins on user_logins.id=employee_request_cloud.user_login_id left join companies on companies.id=employee_request_cloud.company_id where company_id=? and is_approved=0 limit 0,20");
			
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
		
		function moreRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select employee_request_cloud.id,company_name,last_name,first_name,email from employee_request_cloud left join user_logins on user_logins.id=employee_request_cloud.user_login_id left join companies on companies.id=employee_request_cloud.company_id where company_id=? and is_approved=0 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb tall cn">
				<div class="padtb5 " >'.$row['first_name'].'</div>
				</td>
				<td class="pad5 brdb tall nm">
				<div class="padtb5 ">'.$row['last_name'].'</div>
				</td>
				<td class="pad5 brdb tall cd">
				<div class="padtb5 ">'.$row['email'].'</div>
				</td>
				
				
				<td class="pad5 brdb tall ap" >
				<div class="padtb5"><a href="../approveRequest/'.$org1.'/'.$data['cid'].'" >Approve</a></div>
				</td>
				<td class="pad5 brdb tall rj">
				<div class="padtb5"><a href="../rejectRequest/'.$org1.'/'.$data['cid'].'">Reject</a></div>
				</td>
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreApprovedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select manage_employee_permissions.id,company_name,last_name,first_name,email,manage_employee_permissions.user_id from manage_employee_permissions left join user_logins on user_logins.id=manage_employee_permissions.user_id left join companies on companies.id=manage_employee_permissions.company_id where company_id=? limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				//$stmt = $dbCon->prepare("select id from manage_employee_permissions where company_id=? and user_id=?");
				$stmt = $dbCon->prepare("select id from employee_request_cloud where company_id=? and user_login_id=? and is_approved=1");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("ii", $company_id,$row['user_id']);
				$stmt->execute();
				$resultId = $stmt->get_result();
				$rowId = $resultId->fetch_assoc();
				if(empty($rowId))
				{
					$td='<td class="pad5 brdb tall ap" >
					
					</td>';
				}
				else
				{
					$org1= $this -> encrypt_decrypt('encrypt',$rowId['id']);
					$td='<td class="pad5 brdb tall ap" >
					<div class="padtb5"><a href="../sendQloudEmployee/'.$data['cid'].'/'.$org1.'" >Transfer</a></div>
					</td>';
				}
				
				$orgId= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb tall cn">
				<a href="https://www.safeqloud.com/user/index.php/ManagePermissions/setPermissions/'.$orgId.'"><div class="padtb5 " >'.$row['first_name'].'</div></a>
				</td>
				<td class="pad5 brdb tall nm">
				<div class="padtb5 ">'.$row['last_name'].'</div>
				</td>
				<td class="pad5 brdb tall cd">
				<div class="padtb5 ">'.$row['email'].'</div>
				</td>
				
				'.$td.'
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreRejectDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			//print_r($_POST); die;
			$stmt = $dbCon->prepare("select employee_request_cloud.id,company_name,last_name,first_name,email from employee_request_cloud left join user_logins on user_logins.id=employee_request_cloud.user_login_id left join companies on companies.id=employee_request_cloud.company_id where company_id=? and is_approved=2 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb tall cn">
				<div class="padtb5 " >'.$row['first_name'].'</div>
				</td>
				<td class="pad5 brdb tall nm">
				<div class="padtb5 ">'.$row['last_name'].'</div>
				</td>
				<td class="pad5 brdb tall cd">
				<div class="padtb5 ">'.$row['email'].'</div>
				</td>
				
				<td class="pad5 brdb tall ap" >
				<div class="padtb5"><a href="#" >Rejected</a></div>
				</td>
				
				
				</tr>';
				
			}
			//echo $org; die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function approveDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select manage_employee_permissions.id,company_name,last_name,first_name,email,manage_employee_permissions.user_id from manage_employee_permissions left join user_logins on user_logins.id=manage_employee_permissions.user_id left join companies on companies.id=manage_employee_permissions.company_id where company_id=?  limit  0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$org[$j]['encId']= $this -> encrypt_decrypt('encrypt',$row['id']);
				
				$stmt = $dbCon->prepare("select id from employee_request_cloud where company_id=? and user_login_id=?  and is_approved=1");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("ii", $company_id,$row['user_id']);
				$stmt->execute();
				$resultId = $stmt->get_result();
				$rowId = $resultId->fetch_assoc();
				if(empty($rowId))
				{
					$org[$j]['enc']= "";
				}
				else
				{
					$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$rowId['id']);
				}
				
				$j++;
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function rejectDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select employee_request_cloud.id,company_name,last_name,first_name,email from employee_request_cloud left join user_logins on user_logins.id=employee_request_cloud.user_login_id left join companies on companies.id=employee_request_cloud.company_id where company_id=? and is_approved=2  limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
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
		
		
		function requestCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from employee_request_cloud where company_id=? and is_approved=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		function approveCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from employees where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function rejectCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from employee_request_cloud where company_id=? and is_approved=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		function sendQloudEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("select company_email from companies where id=?");
			
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select email,first_name,last_name,sex,dob_month,dob_year,dob_day,country_of_residence from user_logins where id=(select user_login_id from employee_request_cloud where id=?)");
			
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_user = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select zipcode,city,country,phone_number,address,ssn,clearing_number,bank_account_number,language,country_phone from user_profiles where user_logins_id=(select user_login_id from employee_request_cloud where id=?)");
			
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_user_profile = $result->fetch_assoc();
			
			$fields=array();
			$fields['country_of_residence']=$row_user['country_of_residence'];	
			$fields['email']=$row_user['email'];	
			$fields['first_name']=$row_user['first_name'];
			$fields['last_name']=$row_user['last_name'];
			$fields['sex']=$row_user['sex'];
			$fields['dob_month']=$row_user['dob_month'];
			$fields['dob_year']=$row_user['dob_year'];
			$fields['dob_day']=$row_user['dob_day'];
			$fields['zipcode']=$row_user_profile['zipcode'];
			$fields['city']=$row_user_profile['city'];
			$fields['country']=$row_user_profile['country'];
			$fields['phone_number']=$row_user_profile['phone_number'];
			$fields['address']=$row_user_profile['address'];
			$fields['ssn']=$row_user_profile['ssn'];
			$fields['clearing_number']=$row_user_profile['clearing_number'];
			$fields['bank_account_number']=$row_user_profile['bank_account_number'];
			$fields['language']=$row_user_profile['language'];
			$fields['country_phone']=$row_user_profile['country_phone'];
			$fields['company_email'] = $row['company_email'];
			//$fields['client_secret'] = 'chandan5af041e1165a9';
			//
			foreach ($fields as $key => $value) {
				if (is_null($value) || $value=="") {
					$fields[$key] = "-";
				}
			}
			//print_r($fields); die;
			//$headers = array('PHP_AUTH_USER' => 'testclient' , 'PHP_AUTH_PW' => 'testpass');
			$url='https://www.qmatchup.com/beta/company/index.php/ManageEmployee/addQloudRequest';
			$ch = curl_init();
			//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
			//curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_REFERER, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, true);
			curl_setopt($ch, CURLOPT_COOKIEFILE, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
			curl_setopt($ch, CURLOPT_POST, true);
			//var_dump($ch);
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			//get status code
			//echo $status_code; die;
			$result=curl_exec ($ch);
			curl_close ($ch);
			
			return $result; //die;
			
		}
		function approveRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("update employee_request_cloud set is_approved=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select company_id,user_login_id,last_name,first_name,email from employee_request_cloud left join user_logins on user_logins.id=employee_request_cloud.user_login_id where employee_request_cloud.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("insert into user_company_profile (company_id,user_login_id) values(?, ?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $row['company_id'],$row['user_login_id']);
			
			$stmt->execute();
			
			$stmt = $dbCon->prepare("insert into employees (company_id,user_login_id,first_name,last_name,email) values(?, ?, ?, ?, ?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iisss", $row['company_id'],$row['user_login_id'],$row['first_name'],$row['last_name'],$row['email']);
			
			$stmt->execute();
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		
		function rejectRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("update employee_request_cloud set is_approved=2 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function sectionDomarSubDetail()
		{
			$dbCon = AppModel::createConnection();
			
			
			
			
			$stmt = $dbCon->prepare("select domar_id,headline,title,article_section.id as_id,domar_content.id,add_button,button_title,color_code,media_type,image_path1,image_path2,image_path3,heading,suheading,section,position,publish_date,domar_content.created_on,title_type,column_type from domar_content left join domar_company on domar_company.id=domar_content.domar_id left join article_section on article_section.id=domar_content.section where domar_content.complete=1 and position!=-1  and domar_id in (select id from domar_company where status=0) order by title_type ,domar_content.position_on");
			
			/* bind parameters for markers */
			
			$org=array();
			$stmt->execute();
			$result1 = $stmt->get_result();
			
			while($row1 = $result1->fetch_assoc())
			{
				
				array_push($org,$row1);
				
			}
			
			
			
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
	}
