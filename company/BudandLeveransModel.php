<?php
	require_once('../AppModel.php');
	class BudandLeveransModel extends AppModel
	{
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=13");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
		function pickUpDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select package_delivery.id,user_logins.first_name,user_logins.last_name,package_delivery.created_on from package_delivery left join employees on employees.id=package_delivery.employee_id left join user_logins on user_logins.id=employees.user_login_id where package_delivery.company_id=? and package_delivery.status=0 order by package_delivery.created_on desc limit 0,20");
			
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
		
		function pickUpCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from package_delivery where company_id=?  and status=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
			function morePickUpDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select package_delivery.id,user_logins.first_name,user_logins.last_name,package_delivery.created_on from package_delivery left join employees on employees.id=package_delivery.employee_id left join user_logins on user_logins.id=employees.user_login_id where package_delivery.company_id=?  and package_delivery.status=0 order by package_delivery.created_on desc limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<tr class="fsz16">
				
			
													
													<td class="pad5 brdb_new tall nm hidden-xs ">'.$row['first_name'].' '.$row['last_name'].'
														
													</td>
				
												<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('Y-m-d',strtotime($row['created_on'])).'</div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<a href="#" onclick="updateId('.$value['id'].');"><div class="padtb5 ">Hämtad</div></a>
													</td>
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function pickUpCompletedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select user_logins.first_name,user_logins.last_name,package_delivery.created_on from package_delivery left join employees on employees.id=package_delivery.employee_id left join user_logins on user_logins.id=employees.user_login_id where package_delivery.company_id=? and package_delivery.status=1 order by package_delivery.created_on desc limit 0,20");
			
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
		
		function pickUpCompletedCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from package_delivery where company_id=?  and status=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
			function morePickUpCompletedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select user_logins.first_name,user_logins.last_name,package_delivery.created_on from package_delivery left join employees on employees.id=package_delivery.employee_id left join user_logins on user_logins.id=employees.user_login_id where package_delivery.company_id=?  and package_delivery.status=1 order by package_delivery.created_on desc limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<tr class="fsz16">
				
			
													
													<td class="pad5 brdb_new tall nm hidden-xs ">'.$row['first_name'].' '.$row['last_name'].'
														
													</td>
				
												<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('Y-m-d',strtotime($row['created_on'])).'</div>
													</td>
				
				</tr>';
				
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
		
		function pickUpDetailEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select package_delivery.id,user_logins.first_name,user_logins.last_name,package_delivery.created_on from package_delivery left join employees on employees.id=package_delivery.employee_id left join user_logins on user_logins.id=employees.user_login_id where package_delivery.company_id=? and employee_id=(select id from employees where company_id=? and user_login_id=?) and package_delivery.status=0  order by package_delivery.created_on desc limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$company_id,$data['user_id']);
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
		
		function pickUpCountEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from package_delivery where company_id=? and employee_id=(select id from employees where company_id=? and user_login_id=?)  and status=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$company_id,$data['user_id']);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		function pickUpDetailCompletedEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select package_delivery.id,user_logins.first_name,user_logins.last_name,package_delivery.created_on from package_delivery left join employees on employees.id=package_delivery.employee_id left join user_logins on user_logins.id=employees.user_login_id where package_delivery.company_id=? and employee_id=(select id from employees where company_id=? and user_login_id=?) and package_delivery.status=1  order by package_delivery.created_on desc limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$company_id,$data['user_id']);
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
		
		function pickUpCompletedCountEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from package_delivery where company_id=? and employee_id=(select id from employees where company_id=? and user_login_id=?)  and status=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$company_id,$data['user_id']);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
			function morePickUpDetailEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select package_delivery.id,user_logins.first_name,user_logins.last_name,package_delivery.created_on from package_delivery left join employees on employees.id=package_delivery.employee_id left join user_logins on user_logins.id=employees.user_login_id where package_delivery.company_id=? and employee_id=(select id from employees where company_id=? and user_login_id=?) and package_delivery.status=0  order by package_delivery.created_on desc limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiiii", $company_id,$company_id,$data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<tr class="fsz16">
				
			
													
													<td class="pad5 brdb_new tall nm hidden-xs ">'.$row['first_name'].' '.$row['last_name'].'
														
													</td>
				
												<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('Y-m-d',strtotime($row['created_on'])).'</div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<a href="#" onclick="updateId('.$value['id'].');"><div class="padtb5 ">Hämtad</div></a>
													</td>
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}	
		
		
			function morePickUpCompletedDetailEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select package_delivery.id,user_logins.first_name,user_logins.last_name,package_delivery.created_on from package_delivery left join employees on employees.id=package_delivery.employee_id left join user_logins on user_logins.id=employees.user_login_id where package_delivery.company_id=? and employee_id=(select id from employees where company_id=? and user_login_id=?) and package_delivery.status=1  order by package_delivery.created_on desc limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiiii", $company_id,$company_id,$data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<tr class="fsz16">
				
			
													
													<td class="pad5 brdb_new tall nm hidden-xs ">'.$row['first_name'].' '.$row['last_name'].'
														
													</td>
				
												<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('Y-m-d',strtotime($row['created_on'])).'</div>
													</td>
													
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}	
		
		
		
			function updatePickupValue($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("update package_delivery set status=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['delivery_id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
	}						