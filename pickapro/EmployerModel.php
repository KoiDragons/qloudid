<?php
	require_once('../AppModel.php');
	class EmployerModel extends AppModel
	{
		function vitechCityList()
		{ 
		
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from vitech_city");
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0">Select</option>';
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<option value="'.$row['id'].'">'.$row['city_name'].'</option>';
			}
				
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		function vitechAreaList()
		{ 
		
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select *  from vitech_area where region_city_id=?");
			$stmt->bind_param("i", $_POST['city_id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			$org='<option value="0">Select</option>';
			while($row= $result3->fetch_assoc())
			{
			$org=$org.'<option value="'.$row['id'].'">'.$row['area_name'].'</option>';
			}
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		function addPropertyApartment($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']); 
			 
			$stmt = $dbCon->prepare("INSERT INTO property_manager_apartment_list (vitech_city,vitech_area, `company_id`  , `property_title`  , `property_type_detail`  , `bedroom_count`  , `bathroom_count`  , `pets_allowed` , `pets_entry_fee`   , `disabled_allowed` , `price_per_night`   , `deposit_fee`   , `cleaning_fee`   , `seller_price_per_night`   , `seller_deposit_fee`   , `seller_cleaning_fee`   , `seller_late_arrival_fee`   , `parking_available` , `parking_fee`   , `created_on`) VALUES (?, ?,?, ?, ?, ?,?, ?, ?, ?,?, ?, ?, ?,?, ?, ?, ?, ?, now())");
			$stmt->bind_param("iiisiiiiiiiiiiiiiii",$_POST['vcity'],$_POST['varea'], $company_id , $_POST['property_title'], $_POST['property_type_detail'], $_POST['bedroom_count'], $_POST['bathroom_count'], $_POST['pets_info_detail'], $_POST['pet_fee'], $_POST['disable_info_detail'], $_POST['price_per_night'], $_POST['deposit_fee'], $_POST['cleaning_fee'], $_POST['seller_price_per_night'], $_POST['seller_deposit_fee'], $_POST['seller_cleaning_fee'], $_POST['late_arrival_fee'], $_POST['parking_info_detail'], $_POST['parking_fee']);
			$stmt->execute();
			$location_id=$stmt->insert_id;
			 for($i=1; $i<=$_POST['indexing_save']; $i++)
				{
					$j='image_data'.$i;
					$data1 = strip_tags($_POST[$j]);
					 
					define('UPLOAD_DIR','../estorecss/'); 
					$img_name1="new".microtime();
					file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
					$stmt = $dbCon->prepare("insert into property_manager_apartment_images (property_manager_apartment_id, image_path) values (?,?)");
					$stmt->bind_param("is",$location_id,$img_name1);
					 $stmt->execute(); 
				} 
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function propertyType()
		{ 
		
			$dbCon = AppModel::createConnection();
			  
			$stmt = $dbCon->prepare("select * from apartment_property_type");
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
		
		function propertyListOld($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']); 
			$stmt = $dbCon->prepare("select * from property_manager_apartment_list where company_id=?");
			$stmt->bind_param("i", $company_id);
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
		
		
		function propertyList($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']); 
			$stmt = $dbCon->prepare("select is_activated,vitech_city_id,id,objectNumber,vitech_property_plot.area,startingPrice,numberOfBedrooms from vitech_properties left join vitech_property_interior on vitech_property_interior.property_id=vitech_properties.id and vitech_property_interior.company_id=vitech_properties.company_id left join vitech_property_address on vitech_property_address.property_id=vitech_properties.id  and vitech_property_address.company_id=vitech_properties.company_id left join vitech_property_plot on vitech_property_plot.property_id=vitech_properties.id  and vitech_property_plot.company_id=vitech_properties.company_id where vitech_properties.company_id=? and vitech_old_data=0");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		function approvedMarketplaces($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from professional_marketplace where id  in(select domain_id from  cleaning_company_premium_account_request where company_id=?)");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			array_push($org,$row);
							
			}	
			
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		function peopleAvailableForHire($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select user_professional_job_requirement.id,service_categories,concat_ws(' ',first_name,last_name) as name from user_professional_job_requirement left join user_logins on user_logins.id=user_professional_job_requirement.user_id where vitech_area_location in (select area_id from professional_company_selected_areas where company_id=?) and user_professional_job_requirement.domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_selected_service_todos where find_in_set(professional_category_id,?) and is_selected=1 and professional_subcategory_id in (select professional_subcategory_id from professional_marketplace_service_todos where is_selected=1 and marketplace_id=?)");
			$stmt->bind_param("si", $row['service_categories'],$domain_id);
			$stmt->execute();
			$result2 = $stmt->get_result();
			$rowCategory = $result2->fetch_assoc();
			if($rowCategory['num']==0)
				continue;
			
			$row['services']='';
			$stmt = $dbCon->prepare("select * from professional_service_category where find_in_set(id,?)");
			$stmt->bind_param("s", $row['service_categories']);
			$stmt->execute();
			$result2 = $stmt->get_result();
			while($rowCategory = $result2->fetch_assoc())
			{
			$row['services']=$row['services'].$rowCategory['category_name'].' , ';	
			}
			$row['services']=substr($row['services'],0,-2);
			
			array_push($org,$row);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
		function workingHrs()
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select * from working_hrs");
			
			/* bind parameters for markers */
			 
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
		function employerSummary($data)
		{
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select company_name,companies.id,address from companies  left join company_profiles on company_profiles.company_id=companies.id where companies.id in(select company_id from cleaning_company_premium_account_request where is_approved=1 and company_id in (select company_id from employees where user_login_id=?) and domain_id=?)");
			 
			/* bind parameters for markers */
			$j=0;
			$stmt->bind_param("ii", $data['user_id'],$domain_id);
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
		
		
		
		 
		
		
		function moreEmployers($data)
		{
			$dbCon = AppModel::createConnection();
			$a=($_POST['id']*5);
			$b=5;
			ini_set('memory_limit', '-1');
			$user_id=$data['user_id'];
			 
			$stmt = $dbCon->prepare("select company_name,companies.id,address from companies  left join company_profiles on company_profiles.company_id=companies.id where companies.id in(select company_id from cleaning_company_premium_account_request where is_approved=1 and company_id in(select company_id from employees where user_login_id=?))  limit ?,?");
			$stmt->bind_param("iii", $user_id, $a,$b);
			
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
				$enc_id=$this->encrypt_decrypt("encrypt",$row['id']);
				 $org=$org.'<a href="../../../company/index.php/ReceivedChild/verifyRequests/'.$enc_id.'"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).' </div>
																	</div>
													
													<div class="fleft wi_75 xxs-wi_80  xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">'.html_entity_decode($row['company_name']).'</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">'.html_entity_decode($row['address']).'</span>  </div>
													 
												 <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
													</div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
											</a> ';
				
				 
				 
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
		 
	
	 function serviceRequestReceived($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select user_professional_service_request.subcategory_id,user_professional_service_request.id,job_id,subcategory_name,floor_area,city,is_accepted from user_professional_service_request_company_info left join user_professional_service_request on user_professional_service_request.id=user_professional_service_request_company_info.job_id left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join user_address on user_address.id=user_professional_service_request.user_property_id where user_professional_service_request_company_info.company_id=? and user_professional_service_request.domain_id=? order by user_professional_service_request.created_on desc");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				if($row['is_accepted']==0)
				{
				$stmt = $dbCon->prepare("select count(id) as num from user_professional_service_request_company_info where job_id=? and company_id!=? and is_accepted=1");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("ii", $row['job_id'],$company_id);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if($row1['num']==5)
				{
				$stmt = $dbCon->prepare("update user_professional_service_request_company_info set is_accepted=3 where id=?");
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$row['is_accepted']=3;
				}					
				}
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
			array_push($org,$row);
			 
			}
			  
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		 function serviceRequestUserApproved($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select property_info_required, booking_time,booking_employee_id,user_professional_service_request_company_info.id,job_id,subcategory_name,floor_area,city,is_accepted,project_fee from user_professional_service_request_company_info left join user_professional_service_request on user_professional_service_request.id=user_professional_service_request_company_info.job_id left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join user_address on user_address.id=user_professional_service_request.user_property_id where user_professional_service_request.company_id=? and user_professional_service_request.domain_id=? and bid_accepted=1 order by user_professional_service_request.created_on desc");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				if($row['is_accepted']==0)
				{
				$stmt = $dbCon->prepare("select count(id) as num from user_professional_service_request_company_info where job_id=? and company_id!=? and is_accepted=1");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("ii", $row['job_id'],$company_id);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if($row1['num']==5)
				{
				$stmt = $dbCon->prepare("update user_professional_service_request_company_info set is_accepted=3 where id=?");
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$row['is_accepted']=3;
				}					
				}
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
			array_push($org,$row);
			 
			}
			  
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		
		 function userLikedPropertyList($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select user_professional_service_request_property_bid.id,property_price,property_title,connected_apartment_id,connect_request_sent from user_professional_service_request_property_bid left join property_manager_apartment_list on property_manager_apartment_list.id=user_professional_service_request_property_bid.property_id where user_professional_service_request_bid_id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
			array_push($org,$row);
			 
			}
			  
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		
		function sendConnectRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			$bid_id=$this->encrypt_decrypt('decrypt',$data['bid_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			
			$stmt = $dbCon->prepare("select property_id from user_professional_service_request_property_bid where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $bid_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update property_manager_apartment_list set connect_request_sent=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['property_id']);
			$stmt->execute();
			
			
			
			$stmt = $dbCon->prepare("insert into property_manager_apartment_connect_request(email_id,property_id,created_on) values(?,?,now())");
				
			/* bind parameters for markers */
			$stmt->bind_param("si",$_POST['owner_email'], $row['id']);
			$stmt->execute();	
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
	
	function employeeDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email from employees  where company_id=? limit 0,5");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select * from employee_service_booking_rules  where employee_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$resultEmp = $stmt->get_result();
				$rowEmp = $resultEmp->fetch_assoc();
				if(empty($rowEmp))
				{
				$stmt = $dbCon->prepare("insert into employee_service_booking_rules(employee_id,company_id,created_on) values(?,?,now())");
				
				/* bind parameters for markers */
				$stmt->bind_param("ii", $row['id'],$company_id);
				$stmt->execute();	
				}
				
			}
			 
			$stmt = $dbCon->prepare("select min(id) as emp_id,concat_ws(' ',first_name,last_name) as name,email from employees  where company_id=? and user_login_id!=43");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['emp_id']);
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		function employeesList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,first_name,last_name,email from employees where company_id=?");
			 
			/* bind parameters for markers */
			$j=0;
			$stmt->bind_param("i", $company_id);
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
		
		
		function assignProject($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$rid=$this->encrypt_decrypt('decrypt',$data['rid']);
			$employee_id=$this->encrypt_decrypt('decrypt',$data['eid']);
			$date=strtotime($_POST['start_date']);
			$stmt = $dbCon->prepare("update user_professional_service_request_company_info set booking_employee_id=?,booking_date=?,booking_time=? where id=?");
			$stmt->bind_param("issi",$employee_id,$date,$_POST['time_info'], $rid);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
	}
	
?>