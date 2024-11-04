<?php
	require_once('../AppModel.php');
	class CompanyLocationCrisisTeamModel extends AppModel
	{
		function countryInfo($data)
	{
		 $dbCon = AppModel::createConnection();
		 $country_id=$data['country_id'];
		$stmt = $dbCon->prepare("select is_visible from country where id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $country_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$stmt->close();
        $dbCon->close();
		 return $row['is_visible'];
	}	
		function getMandatoryApps($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$country_id= $data['country_id'];
			$stmt = $dbCon->prepare("select manage_apps_permission.id,app_name from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where country_id=? and app_type=0 and is_mandatory=1 order by app_name");
			/* bind parameters for markers */
			$j=0;
			$stmt->bind_param("i", $country_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
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
		function updateTeamMember($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select * from employee_location where id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("INSERT INTO company_location_crisis_team (employee_id,location_id,company_id, created_on) VALUES (?, ?, ?, now())");
			$stmt->bind_param("iii", $row['employee_id'],$row['location_id'],$row['company_id']);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function teamInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			
			
			$stmt = $dbCon->prepare("select email,concat_ws(',',first_name,last_name) as name from company_location_crisis_team left join employees on employees.id=company_location_crisis_team.employee_id where location_id=? limit 0,20");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $location_id);
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
		
		function moreTeamInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			
			$a=(20*$_POST['id'])+1;
			$b=$a+20;
			
			$stmt = $dbCon->prepare("select email,concat_ws(',',first_name,last_name) as name from company_location_crisis_team left join employees on employees.id=company_location_crisis_team.employee_id where location_id=? limit ?,?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iii", $location_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
			
			$org='<div class="column_m container  marb5   fsz14 dark_grey_txt">
											<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padt15 padb20  brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3   fsz12">
													
													<div class="fleft wi_30 xs-wi_60   marl15 xs-mar0  "> <span class="trn fsz14" data-trn-key="Name">Name</span> <a href="#" ><span class=" edit-text jain1 dblock black_txt brdclr_lgtgrey2 fsz18">'.$row['name'].'</span></a> </div>
													<div class="fleft wi_45   marl15 xs-mar0   hidden-xs"> <span class="trn" data-trn-key="Email">Email</span> <span class=" edit-text jain2 dblock  brdclr_lgtgrey2 fsz16">'.$row['email'].'</span> </div>
													<div class="fright wi_10 padl0   marl15 fsz40  xs-marr10 xs-marl0 padb0">
														<a href="#" ><span class="fas fa-arrow-alt-circle-right"></span></a>
													</div>	
												</div>
												
												
												
												
												
												<!-- <div class="clear hidden-xs"></div>-->
											</div>
											<div class="clear"></div>
										</div>
									</div>
									</div>';
			}
				$stmt->close();
				$dbCon->close();
				return $org;
					
		}
		
		
		
		function employeeInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			
			
			$stmt = $dbCon->prepare("select employee_location.id,email,concat_ws(',',first_name,last_name) as name from employee_location left join employees on employees.id=employee_location.employee_id where employee_location.employee_id not in (select employee_id from company_location_crisis_team where location_id=?) and employee_location.location_id=? ");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $location_id,$location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			array_push($org,$row);	
			$org[$j]['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
			$j++;
			}
				$stmt->close();
				$dbCon->close();
				return $org;
					
		}
		
		function moreEmployeeInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			
			$a=(20*$_POST['id'])+1;
			$b=$a+20;
			
			$stmt = $dbCon->prepare("select employee_location.id,email,concat_ws(',',first_name,last_name) as name from employee_location left join employees on employees.id=employee_location.employee_id where employee_location.employee_id not in (select employee_id from company_location_crisis_team where location_id=?) and employee_location.location_id=? limit ?,?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iiii", $location_id,$location_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
			$enc=$this -> encrypt_decrypt('encrypt',$row['id']);
			$org='<div class="<div class="column_m container  marb5   fsz14 dark_grey_txt">
											<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padt15 padb20  brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3   fsz12">
													
													<div class="fleft wi_30 xs-wi_60 marl15 xs-mar0 "> <span class="trn fsz14" data-trn-key="Name">Name</span> <a href="#" ><span class=" edit-text jain1 dblock black_txt brdclr_lgtgrey2 fsz18">'.$row['name'].'</span></a> </div>
													<div class="fleft wi_35 xs-wi_100 sm-wi_100 marl15 xs-mar0  hidden-xs"> <span class="trn" data-trn-key="Email">Email</span> <span class=" edit-text jain2 dblock  brdclr_lgtgrey2 fsz16">'.$row['email'].'</span> </div>
													
													<div class="xxs-fleft fright wi_20 xs-padl20 xs-wi_20  fsz40  marrl30 padb0">
																				<a href="../updateTeamMember/'.$data['lid'].'/'.$enc.'"><button type="button" name="Activate" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bg"  >Add</button></a>
																			</div>
													 
												</div>
												
												
												
												
												
												<!-- <div class="clear hidden-xs"></div>-->
											</div>
											<div class="clear"></div>
										</div>
									</div>
									</div>';
			}
				$stmt->close();
				$dbCon->close();
				return $org;
					
		}
		
		
		
		function locationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			
			
			$stmt = $dbCon->prepare("select * from property_location where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['cid']=$this->encrypt_decrypt('encrypt',$row['company_id']);
			$stmt->close();
			$dbCon->close();
			return $row;
					
		}
		
		function headQuarterID($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("select id from property_location where company_id = ? and is_headquarter=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("update property_location set is_headquarter=1 where company_id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			 
			$stmt = $dbCon->prepare("select id from property_location where company_id = ? and is_headquarter=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			}
			
			$enc=$this->encrypt_decrypt('encrypt',$row['id']);
			$stmt->close();
			$dbCon->close();
			return $enc;
					
		}
		
	
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
		
		function completedEmployeeRequests($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select employees.company_id,company_name,profile_pic from employees left join companies on employees.company_id=companies.id left join company_profiles on companies.id=company_profiles.company_id where employees.user_login_id = ? and o_type=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
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
		
		
	}						