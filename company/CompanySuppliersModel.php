<?php
	require_once('../AppModel.php');
	class CompanySuppliersModel extends AppModel
	{
		function urlDetail($data)
		{
			 
			return $this -> encrypt_decrypt('encrypt',$data['REQUEST_URI']); 
			 
			 
		}	
		function appId()
		{
			
			return $this -> encrypt_decrypt('encrypt',57);
		}
		
		function getAppsDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$country_id= $data['country_id'];
			
			 
			$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $country_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
			$stmt = $dbCon->prepare("select app_id,sub_heading,app_link,manage_apps_permission.id,is_permission,app_name,is_downloaded,app_icon,app_bg from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where country_id=? and app_type=0 and is_mandatory=0 and app_id in (select app_id from app_selected_service_todos where is_selected=1 and professional_subcategory_id in (select professional_subcategory_id from company_selected_service_todos where is_selected=1 and company_id=?))");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $country_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			if($row['app_id']==52)
			continue;
			array_push($org,$row);
			$stmt = $dbCon->prepare("select count(id) as num from compnay_app_download where permission_id=? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $row['id'],$company_id);
			$stmt->execute();
			$result_down = $stmt->get_result();
			$row_down = $result_down->fetch_assoc();
			if($row_down['num']==0)
			{
				$org[$j]['is_downloaded']=0;
			}
			else
			{
			$org[$j]['is_downloaded']=1;	
			}
			$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			$j++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			}
			else
			{
		
			$stmt = $dbCon->prepare("select id,app_name from apps_detail");
			$stmt->execute();
			$result = $stmt->get_result();
			
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into manage_apps_permission (country_id,app_id,created_on) values(?, ?, now())");
			/* bind parameters for markers */
			$stmt->bind_param("ii",$country_id,$row['id']);
			$stmt->execute();
			}
			
			$stmt = $dbCon->prepare("select app_id,sub_heading,app_link,manage_apps_permission.id,is_permission,app_name,app_icon,app_bg from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where country_id=?  and app_type=0 and is_mandatory=0 and app_id in (select app_id from app_selected_service_todos where is_selected=1 and professional_subcategory_id in (select professional_subcategory_id from company_selected_service_todos where is_selected=1 and company_id=?))");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $country_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				if($row['app_id']==52)
					continue;
			array_push($org,$row);
			$stmt = $dbCon->prepare("select count(id) as num from compnay_app_download where permission_id=? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $row['id'],$company_id);
			$stmt->execute();
			$result_down = $stmt->get_result();
			$row_down = $result_down->fetch_assoc();
			if($row_down['num']==0)
			{
				$org[$j]['is_downloaded']=0;
			}
			else
			{
			$org[$j]['is_downloaded']=1;	
			}
			$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			}
			}
		
		
		
		
		 function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		 
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=57");
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
		 function serviceRequestReceived($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select guest_adult,guest_children,guest_infant,city_location,check_in_date,check_out_date,request_type,carried_for,user_professional_service_request.user_id,user_professional_service_request.company_id,user_professional_service_request.subcategory_id,user_professional_service_request.id,job_id,subcategory_name,floor_area,city,is_accepted from user_professional_service_request_company_info left join user_professional_service_request on user_professional_service_request.id=user_professional_service_request_company_info.job_id left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join user_address on user_address.id=user_professional_service_request.user_property_id where user_professional_service_request_company_info.company_id=? and user_professional_service_request.domain_id=? order by user_professional_service_request.created_on desc");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				$stmt = $dbCon->prepare("select first_name,last_name,email from user_logins where id=?");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("i", $row['user_id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				
				$row['first_name']=$row1['first_name'];
				$row['last_name']=$row1['last_name'];
				$row['email']=$row1['email'];
				if($row['carried_for']==2)
				{
				$stmt = $dbCon->prepare("select company_name from companies where id=?");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("i", $row['company_id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				$row['company_name']=$row1['company_name'];				
				}
				else
				{
					$row['company_name']='For user';		
				}
			
				
				
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
		
		
		
		
		function requestedMarketplaceList($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			  
			$stmt = $dbCon->prepare("select * from professional_marketplace where id in (select domain_id from cleaning_company_premium_account_request where company_id=? and is_approved=0)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				 
				$filename="../estorecss/".$row['background_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['background_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['background_image'].'.jpg' );  $row['background_image']=$imgs; } else { $row['background_image']="https://www.qloudid.com/html/usercontent/images/notavailable.jpg"; }
				
				$row['background_image']=str_replace('../','https://www.qloudid.com/',$row['background_image']);
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				 
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function selectedMarketplaceServiceDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$marketplace_id=$this->encrypt_decrypt('decrypt',$data['mid']);
			
			$stmt = $dbCon->prepare("select * from cleaning_company_premium_account_request where domain_id=? and company_id=?");
			$stmt->bind_param("ii",$marketplace_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowPlan = $result->fetch_assoc();
			
			if($rowPlan['selected_subscription']<=1)
			{
			$stmt = $dbCon->prepare("select professional_description,professional_marketplace_service_todos.id,is_selected,subcategory_name,subcategory_image from professional_marketplace_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_marketplace_service_todos.professional_subcategory_id where  professional_marketplace_service_todos.marketplace_id=? and is_service_active=1 and free_services=1 and is_selected=1");	
			}
			else if($rowPlan['selected_subscription']==2)
			{
			$stmt = $dbCon->prepare("select professional_description,professional_marketplace_service_todos.id,is_selected,subcategory_name,subcategory_image from professional_marketplace_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_marketplace_service_todos.professional_subcategory_id where  professional_marketplace_service_todos.marketplace_id=? and is_service_active=1 and gold_services=1 and is_selected=1");	
			}
			else 
			{
			$stmt = $dbCon->prepare("select professional_description,professional_marketplace_service_todos.id,is_selected,subcategory_name,subcategory_image from professional_marketplace_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_marketplace_service_todos.professional_subcategory_id where  professional_marketplace_service_todos.marketplace_id=? and is_service_active=1 and premium_services=1 and is_selected=1 ");	
			}
			$stmt->bind_param("i", $marketplace_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$org=array();
			while($row = $result1->fetch_assoc())
			{
				 
				if($row['subcategory_image']!=null || $row['subcategory_image']!="") { 
						 
						 $filename="../estorecss/".$row ['subcategory_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['subcategory_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['subcategory_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/notavailable.jpg"; }
						 
							 	
																	 } 
																	 
																	 else 
																	 { $imgs='https://qloudid.com/html/usercontent/images/notavailable.jpg'; 
																	 }
																	 
				 $row['img']=str_replace('../','https://www.qloudid.com/',$imgs);
				array_push($org,$row);
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		 
		
		 function selectedMarketplaceSortedServiceDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$marketplace_id=$data['marketplace_id'];
			 
			$stmt = $dbCon->prepare("select * from cleaning_company_premium_account_request where domain_id=? and company_id=?");
			$stmt->bind_param("ii",$marketplace_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowPlan = $result->fetch_assoc();
			
			if($rowPlan['selected_subscription']<=1)
			{
			$stmt = $dbCon->prepare("select display_name_allowed,professional_subcategory_id,marketplace_id_required,service_id_required,flow_url,professional_description,professional_marketplace_service_todos.id,is_selected,subcategory_name,subcategory_image from professional_marketplace_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_marketplace_service_todos.professional_subcategory_id where  professional_marketplace_service_todos.marketplace_id=? and is_service_active=1 and free_services=1 and is_selected=1   and flow_url!='#'");	
			}
			else if($rowPlan['selected_subscription']==2)
			{
			$stmt = $dbCon->prepare("select display_name_allowed,professional_subcategory_id,marketplace_id_required,service_id_required,flow_url,professional_description,professional_marketplace_service_todos.id,is_selected,subcategory_name,subcategory_image from professional_marketplace_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_marketplace_service_todos.professional_subcategory_id where  professional_marketplace_service_todos.marketplace_id=? and is_service_active=1 and gold_services=1 and is_selected=1   and flow_url!='#'");	
			}
			else 
			{
			$stmt = $dbCon->prepare("select display_name_allowed,professional_subcategory_id,marketplace_id_required,service_id_required,flow_url,professional_description,professional_marketplace_service_todos.id,is_selected,subcategory_name,subcategory_image from professional_marketplace_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_marketplace_service_todos.professional_subcategory_id where  professional_marketplace_service_todos.marketplace_id=? and is_service_active=1 and premium_services=1 and is_selected=1   and flow_url!='#'");	
			}
			$stmt->bind_param("i", $marketplace_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$org=array();
			while($row = $result1->fetch_assoc())
			{
				 
				if($row['subcategory_image']!=null || $row['subcategory_image']!="") { 
						 
						 $filename="../estorecss/".$row ['subcategory_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['subcategory_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['subcategory_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/notavailable.jpg"; }
						 
							 	
																	 } 
																	 
																	 else 
																	 { $imgs='https://qloudid.com/html/usercontent/images/notavailable.jpg'; 
																	 }
																	 
				 $row['img']=str_replace('../','https://www.qloudid.com/',$imgs);
				 $row['enc']=$this->encrypt_decrypt('encrypt',$row['professional_subcategory_id']);
				array_push($org,$row);
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		 
		
		function selectedMarketplaceDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			
			$stmt = $dbCon->prepare("select * from professional_marketplace where id=?");
			$stmt->bind_param("i",$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$filename="../estorecss/".$row['background_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['background_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['background_image'].'.jpg' );  $row['background_image']=$imgs; } else { $row['background_image']=""; }
			 $row['background_image']=str_replace('../','https://www.qloudid.com/',$row['background_image']);
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		
		
		function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
			}
		
		function marketplaceList($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 if(!isset($data['marketplace_id']))
			 {
				 $data['marketplace_id']=0;
			 }
			$stmt = $dbCon->prepare("select * from professional_marketplace where id in (select domain_id from cleaning_company_premium_account_request where company_id=? and is_approved=1) and id in (select marketplace_id from professional_marketplace_service_todos where is_selected=1 and professional_subcategory_id in (select professional_subcategory_id from company_selected_service_todos where is_selected=1 and company_id=?))");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $company_id, $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$info=array();
				$info['marketplace_id']=$row['id'];
				$info['cid']=$data['cid'];
			$countResult=$this->selectedMarketplaceSortedServiceDetail($info);
				if(count($countResult)==0)
				 continue;
			  
				 if($data['marketplace_id']==$row['id'])
				 {
					 $row['is_selected']=1;
				 } 
				 else
				{
					 $row['is_selected']=0;
				 }
				$filename="../estorecss/".$row['background_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['background_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['background_image'].'.jpg' );  $row['background_image']=$imgs; } else { $row['background_image']="https://www.qloudid.com/html/usercontent/images/notavailable.jpg"; }
				
				$row['background_image']=str_replace('../','https://www.qloudid.com/',$row['background_image']);
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$key_values = array_column($org, 'is_selected'); 
				array_multisort($key_values, SORT_DESC, $org);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function employeesList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']); 
			$stmt = $dbCon->prepare("select created_by,employees.id,employees.user_login_id,concat_ws(' ', employees.first_name, employees.last_name) as name,employees.last_name,employees.email,verification_status,image_path,user_profiles.phone_number,passport_image from employees left join user_logins on employees.user_login_id=user_logins.id left join user_profiles on employees.user_login_id=user_profiles.user_logins_id  where employees.company_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			 
			while($row = $result->fetch_assoc())
			{
				$row['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			}	

			$stmt->close();
			$dbCon->close();
			return $org;			
		}	
		
		function propertyLocation($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']); 
			$stmt = $dbCon->prepare("select * from property_location  where company_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			 
			while($row = $result->fetch_assoc())
			{
				$row['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			}	

			$stmt->close();
			$dbCon->close();
			return $org;			
		}
		
		function productServices($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']); 
			$date=strtotime(date('Y-m-d'));
			$stmt = $dbCon->prepare("select * from vitech_property_broker_request  where company_id=? and contract_start_date<=? and contract_end_date>=?");
			/* bind parameters for markers */
			$stmt->bind_param("iss",$company_id,$date,$date);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			 
			while($row = $result->fetch_assoc())
			{
				$row['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			}	

			$stmt->close();
			$dbCon->close();
			return $org;			
		}
		function repairRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']); 
			$stmt = $dbCon->prepare("select accepting_company_id,request_status,ticket_status,landloard_problem_tickets_company_request.id,problem_description,landloard_property_problem_tickets.ticket_type,problem_subpart_name as ticket_title,subcategory_name as ticket_subtitle from landloard_problem_tickets_company_request left join landloard_property_problem_tickets on landloard_property_problem_tickets.id=landloard_problem_tickets_company_request.problem_ticket_id  left join landloard_ticket_title_new on landloard_ticket_title_new.id=landloard_property_problem_tickets.problem_id left join landloard_ticket_subtitle_new on landloard_ticket_subtitle_new.id=landloard_property_problem_tickets.subproblem_id left join landloard_property_problem_tickets_subpart on landloard_property_problem_tickets_subpart.id=landloard_property_problem_tickets.problem_part_id where landloard_problem_tickets_company_request.company_id=? and (request_status=0 or request_status=1) order by id desc");
			/* bind parameters for markers */
			$stmt->bind_param("i",$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			 
			while($row = $result->fetch_assoc())
			{
				$row['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			}	

			$stmt->close();
			$dbCon->close();
			return $org;			
		}	
		
		function repairRequestDetailInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']); 
			$stmt = $dbCon->prepare("select apartment_id,request_status,ticket_status,landloard_problem_tickets_company_request.id,problem_description,landloard_property_problem_tickets.ticket_type,problem_subpart_name as ticket_title,subcategory_name as ticket_subtitle from landloard_problem_tickets_company_request left join landloard_property_problem_tickets on landloard_property_problem_tickets.id=landloard_problem_tickets_company_request.problem_ticket_id  left join landloard_ticket_title_new on landloard_ticket_title_new.id=landloard_property_problem_tickets.problem_id left join landloard_ticket_subtitle_new on landloard_ticket_subtitle_new.id=landloard_property_problem_tickets.subproblem_id left join landloard_property_problem_tickets_subpart on landloard_property_problem_tickets_subpart.id=landloard_property_problem_tickets.problem_part_id where landloard_problem_tickets_company_request.id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",$request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from user_address where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",$row['apartment_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowApartment = $result->fetch_assoc();
			
			$row['address']=$rowApartment['address'];
			$row['city']=$rowApartment['city'];
			$row['zipcode']=$rowApartment['zipcode'];
			$row['port_number']=$rowApartment['port_number'];
			$row['property_nickname']=$rowApartment['property_nickname'];
			
			$stmt->close();
			$dbCon->close();
			return $row;			
		}	
		
		function repairRequestDetailImages($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']); 
			$stmt = $dbCon->prepare("select * from landloard_property_problem_tickets_images where landloard_property_problem_tickets_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",$request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			
			 
			$org=array();
			while($row1 = $result->fetch_assoc())
			{
			 $filename="../estorecss/".$row1 ['image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['image_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = $this->base64_to_jpeg( $value_a, '../estorecss/tmpgetstarted'.$row1['sorting_number'].''.$row1['id'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				 $row1['image_path']=str_replace('../','https://www.qloudid.com/',$image);
				 array_push($org,$row1);
			}
			$stmt->close();
			$dbCon->close();
			return $org;			
		}	
		
		
		
		function assignEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']); 
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']); 
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']); 
			$stmt = $dbCon->prepare("update landloard_property_problem_tickets set ticket_status=1,accepting_company_id=?,accepted_by_employee=?,ticket_assined_to=2,accepted_by=? where id=(select problem_ticket_id from landloard_problem_tickets_company_request where id=?)");
			/* bind parameters for markers */
			$stmt->bind_param("iiii",$company_id,$employee_id,$data['user_id'],$request_id);
			$stmt->execute();
			$stmt = $dbCon->prepare("select country_code,phone_number from user_logins left join phone_country_code on phone_country_code.id=user_logins.country_of_residence left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id =(select user_logins_id from employees where id=?)");
			/* bind parameters for markers */
			$stmt->bind_param("i",$employee_id);
			$stmt->execute();
			$result = $stmt->get_result(); 
			$row1 = $result->fetch_assoc();
			$to= '+'.trim($row1['country_code']).''.trim($row1['phone_number']);
			$subject='Request accepted';
			$emailContent='Home repair request has been assigned to you';
			$res=sendSms($subject, $to, $emailContent);
			$stmt->close();
			$dbCon->close();
			return 1;			
		}	
		
		
		
		
		function acceptRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']); 
			$stmt = $dbCon->prepare("update landloard_problem_tickets_company_request set request_status=1 where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",$request_id);
			$stmt->execute();
			$stmt = $dbCon->prepare("select country_code,phone_number from user_logins left join phone_country_code on phone_country_code.id=user_logins.country_of_residence left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id =(select user_id from user_address where id=(select apartment_id from landloard_property_problem_tickets where id=(select problem_ticket_id from landloard_problem_tickets_company_request where id=?)))");
			/* bind parameters for markers */
			$stmt->bind_param("i",$request_id);
			$stmt->execute();
			$result = $stmt->get_result(); 
			$row1 = $result->fetch_assoc();
			$to= '+'.trim($row1['country_code']).''.trim($row1['phone_number']);
			$subject='Request accepted';
			$emailContent='Home repair request has been accepted';
			$res=sendSms($subject, $to, $emailContent);
			$stmt->close();
			$dbCon->close();
			return 1;			
		}	
		
		
		function rejectRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']); 
			$stmt = $dbCon->prepare("update landloard_problem_tickets_company_request set request_status=2 where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",$request_id);
			$stmt->execute();
			$stmt = $dbCon->prepare("select country_code,phone_number from user_logins left join phone_country_code on phone_country_code.id=user_logins.country_of_residence left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id =(select user_id from user_address where id=(select apartment_id from landloard_property_problem_tickets where id=(select problem_ticket_id from landloard_problem_tickets_company_request where id=?)))");
			/* bind parameters for markers */
			$stmt->bind_param("i",$request_id);
			$stmt->execute();
			$result = $stmt->get_result(); 
			$row1 = $result->fetch_assoc();
			$to= '+'.trim($row1['country_code']).''.trim($row1['phone_number']);
			$subject='Request rejected';
			$emailContent='Home repair request has been rejected';
			$res=sendSms($subject, $to, $emailContent); 
			$stmt->close();
			$dbCon->close();
			return 1;			
		}	
		
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
		
		function propertyList($data)
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
			function developerCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			$stmt = $dbCon->prepare("select is_approved from company_developer_account_request where company_id=?");
			$stmt->bind_param("i", $company_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return -1;	
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return $row['is_approved'];	
			}
			
			
		}
		
			function lawCompanyInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from company_lawfirm_account_request  where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function verifierCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select is_approved from company_idverification_account_request where company_id=?");
			$stmt->bind_param("i", $company_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return -1;	
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return $row['is_approved'];	
			}
			
			
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
		function locationDetailnfo($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("select property_location.id,property_name,visiting_address,created_on,is_headquarter,rent_permises,offer_education,add_employee from property_location left join property on property.id=property_location.property_id where property_location.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select count(id) num from company_landloard  where property_id=?");
        
				/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$resultcount = $stmt->get_result();
			$rowcount = $resultcount->fetch_assoc();
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
			$row['count']=$rowcount['num'];
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		
		
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
			//print_r($data); die;
			if($data['user_id']==43)
			{
			$stmt = $dbCon->prepare("select manage_apps_permission.id,app_name,apps_detail.id as app_id,app_link from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where country_id=? and app_type=0 and is_mandatory=1 and apps_detail.id in (select app_id from app_selected_service_todos where is_selected=1 and professional_subcategory_id in (select professional_subcategory_id from company_selected_service_todos where is_selected=1 and company_id=?)) order by app_name");
			/* bind parameters for markers */
			$j=0;
			$stmt->bind_param("ii", $country_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			array_push($org,$row);
			$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			$j++;
			}
			}
			else
			{
			$stmt = $dbCon->prepare("select manage_apps_permission.id,app_name,apps_detail.id as app_id from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where country_id=? and app_type=0 and is_mandatory=1 and apps_detail.id in (select app_id from app_selected_service_todos where is_selected=1 and professional_subcategory_id in (select professional_subcategory_id from company_selected_service_todos where is_selected=1 and company_id=?)) order by app_name");
			/* bind parameters for markers */
			$j=0;
			$stmt->bind_param("ii", $country_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				if($row['app_id']>27)
					continue;
			array_push($org,$row);
			$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			$j++;
			}	
			}
			
			//echo '<pre>'; print_r($org); echo '</pre>'; die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			}
	
		function checkPermission($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,is_admin from manage_employee_permissions where user_id=? and company_id=?");
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
			
			
	
	
	
		function verificationId($data)
    {
        $dbCon = AppModel::createConnection();
          $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		 
        $stmt = $dbCon->prepare("select max(id) as v_id from company_passport_logs where company_id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $company_id);
        $stmt->execute();
        $result = $stmt->get_result();
         $row = $result->fetch_assoc();
        if(empty($row))
		{
			$row['v_id']="";
		}
        $stmt->close();
        $dbCon->close();
        return $row;
        
    }
	
	function employeeVerificationInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
				$stmt = $dbCon->prepare("select count(id) as num from user_identification where user_id=?");
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$resultEmp = $stmt->get_result();
				$rowEmp = $resultEmp->fetch_assoc();
				 
			$stmt->close();
			$dbCon->close();
			return $rowEmp;
			
			
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
	function appsAssignedLocation($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$org=array();
			$j=0;
			 
			$stmt = $dbCon->prepare("select company_apps_location.id,app_name,visiting_address,total_desk from company_apps_location left join property_location on property_location.id=company_apps_location.location_id left join apps_detail on apps_detail.id=company_apps_location.app_id where company_apps_location.company_id=? and location_id=?");
			$stmt->bind_param("ii", $company_id,$location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
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
		
	function locationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			
			$stmt = $dbCon->prepare("select property_location.id,property_name,visiting_address,company_id,is_headquarter from property_location left join property on property.id=property_location.property_id where property_location.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['company_id']);
				
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
		
		$stmt = $dbCon->prepare("select support_email,support_country,support_phone,sales_email,sales_country,sales_phone,invoice_email,invoice_country,invoice_phone,website,country_id,country_name,companies.id,company_name,cid,founded, industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax,fb,twitter,insta,blog from companies left join company_categories on company_categories.id=companies.industry left join company_profiles on companies.id=company_profiles.company_id left join country on country.id=companies.country_id where companies.id=?");
        
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
