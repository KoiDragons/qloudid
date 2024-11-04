<?php
	require_once('../AppModel.php');
	class ParkeringModel extends AppModel
	{
		function checkOpenStatus($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select max(id),max(open_date) edate from parkering_open_close where company_id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if(date('Y-m-d',strtotime($row['edate']))==date('Y-m-d'))
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
    
		function verifyLanguage()
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
			$stmt = $dbCon->prepare("select language_var from public_page_language where ip_address=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if(empty($row))
			{
				$stmt->close();
				$dbCon->close();
				return 'en';
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return $row['language_var'];
			}
		}
		
			function changeLanguage()
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
			
			$stmt = $dbCon->prepare("select id from public_page_language where ip_address=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s",$ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("INSERT INTO public_page_language (language_var, ip_address, created_on ) VALUES (?, ?, now())");
			
			/* bind parameters for markers */
			$stmt->bind_param("ss", $_POST['lang'],$ip);
			$stmt->execute();
			
			}
			else
			{
			$stmt = $dbCon->prepare("update public_page_language set language_var=? where ip_address=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ss", $_POST['lang'],$ip);
			$stmt->execute();
				
			}
			
				$stmt->close();
				$dbCon->close();
				return 1;
			
		}
		
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=12");
			
			/* bind parameters for markers */
			
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
			
		function updateParkering($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("update parkering_detail set status=1,modified_on=now() where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['parkering_id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		function parkeringBg($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("select image_src from company_product_bg where company_id = ? and product_id=2");
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
			$stmt = $dbCon->prepare("select id from whitelist_ip where company_id=? and ip_address=? and ip_type=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $company_id,$ip);
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
		
	
	
		function selectWhitelistCompany($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("select id from whitelist_company where company_id = ? and status=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
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
				return $row['id'];
			}
			
			
		}
		
		function selectWhitelistCompanyName($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select company_name,exposed_times from whitelist_company where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['comp_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$exposed=$row['exposed_times']+1;
			$stmt = $dbCon->prepare("update whitelist_company set exposed_times=? where id = ?");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $exposed,$data['comp_id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return $row['company_name'];
			
			
			
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
		
		
		
		function licensePlateInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,car_res_num,created_on from parkering_detail  where company_id=? and status=0");
			
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
		
		
		function licensePlateLeftInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,car_res_num,modified_on from parkering_detail  where company_id=? and status=1");
			
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
		
		function moreLicensePlateInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=20;
			$stmt = $dbCon->prepare("select id,car_res_num,created_on where company_id=? and status=0 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$ip="'".$row['ip_address']."'";
				$org=$org.'<tr class="fsz16 ffamily_avenir">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['car_res_num'].'</div>
				</td>
				<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('Y-m-d',strtotime($row['created_on'])).'</div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('h:i:s',strtotime($row['created_on'])).'</div>
													</td>
													<td class="pad5 brdb_new tall nm tall xs-talr xs-marr10">
													<a href="#" onclick="updateId('.$row['id'].');">	<div class="padtb5 ">Lämnat</div></a>
													</td>
				
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function moreLicensePlateLeftInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=20;
			$stmt = $dbCon->prepare("select id,car_res_num,modified_on where company_id=? and status=1 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$ip="'".$row['ip_address']."'";
				$org=$org.'<tr class="fsz16 ffamily_avenir">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['car_res_num'].'</div>
				</td>
				<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('Y-m-d',strtotime($row['modified_on'])).'</div>
													</td>
													<td class="pad5 brdb_new tall nm tall xs-talr xs-marr10 ">
														<div class="padtb5 ">'.date('h:i:s',strtotime($row['modified_on'])).'</div>
													</td>
													
				
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		
		function plateCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from parkering_detail where company_id=? and status=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		function plateLeftCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from parkering_detail where company_id=? and status=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function enterInParking($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from parkering_detail where car_res_num=? and status=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("s",$_POST['car_res_num']);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if($row['num']>0)
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			
			$stmt = $dbCon->prepare("insert into parkering_detail (company_id,created_on,car_res_num )values (?, now(),?)");
			/* bind parameters for markers */
			
			$stmt->bind_param("is",$company_id,$_POST['car_res_num']);
			if($stmt->execute())
			{
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
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
		
			
		
	}						