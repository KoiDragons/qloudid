<?php
	require_once('../AppModel.php');
	class HomeRepairCompanyModel extends AppModel
	{
		function homeRepairSelectedServicesDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$org=array();
			
		 	$stmt = $dbCon->prepare("select home_repair_company_servie_info.id,subcategory_name,is_selected from home_repair_company_servie_info left join landloard_ticket_subtitle_new on landloard_ticket_subtitle_new.id=home_repair_company_servie_info.service_id where company_id=? and is_selected=1");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			while($row1 = $result->fetch_assoc())
			{
			array_push($org,$row1);
			}
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		function updateSelectedService($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update home_repair_company_servie_info set is_selected=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'],$_POST['service_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		function updateServices($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update home_repair_company_servie_info set is_selected=1 where company_id=?");
			$stmt->bind_param("i",$company_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		function homeRepairServicesDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			
			$org='';
			 
			 
			$stmt = $dbCon->prepare("select count(id) as num from home_repair_company_servie_info where company_id=? and is_selected=1");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();	
			$org=$org.' <div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile" class="expander-toggler dark_grey_txt xs-fsz16 tall bold"><div class="dflex wi_100">
									<div class="wi_70 dflex">
								<span class="css-p2kctj"><img src="https://www.safeqloud.com/html/usercontent/images/kitchen1.svg" class="css-z0f999"></span> 
								<div>
								<span class="apartheading">Home reapir</span><span class="aprtSubheading">'.$row1['num'].' service selected</span>
								</div>
								</div> 
									<div class="wi_30 padt10">
															<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span>
									</div> 
									</div></a></div>
								<div id="profile" class=" " style="display: block;">	
										 
									  <div class="css-2998cc fleft padb20">
									<a href="javascript:void(0);" onclick="updateServices()"> <button color="#444444" data-testid="Kitchen-amenity-section-select-all" class="merlin-button css-7wfern" aria-label=""><div class="merlin-button__content">Select all</div></button></a>
									  </div>
									  
									   <div class="clear"></div>
											<div id="1">';
		 	$stmt = $dbCon->prepare("select home_repair_company_servie_info.id,subcategory_name,is_selected from home_repair_company_servie_info left join landloard_ticket_subtitle_new on landloard_ticket_subtitle_new.id=home_repair_company_servie_info.service_id where company_id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			while($row1 = $result->fetch_assoc())
			{
				 
				if($row1['is_selected']==1)
				{
					$checked='checked';
					$update=0;
				}
				else
				{
					$checked='';
					$update=1;
				}
				$org=$org.' <div data-testid="'.$row1['subcategory_name'].'-amenity-item" class="css-39yi7y">
				<div class="css-nj7s2c"><label for="oven" class="css-14q70q0">'.$row1['subcategory_name'].'</label>
				<div class="css-1sjqbna">
				<a href="javascript:void(0);" onclick="updateSelectedService('.$row1['id'].','.$update.');"><input data-testid="test-checkbox-'.$row1['subcategory_name'].'" name="'.$row1['subcategory_name'].'" type="checkbox" class="css-1lgzhz8" '.$checked.'></a>
				</div>
				</div>';
				 $org=$org.'</div>';	
					
											
			
			}
			$org=$org.'</div>';
			  
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
	 
		 function homeRepairTodoCount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select * from landloard_ticket_subtitle_new where id not in(select service_id from home_repair_company_servie_info where company_id=?)");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowCategory = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into home_repair_company_servie_info (service_id,company_id, created_on, modified_on) values (?, ?, now(), now())");
			$stmt->bind_param("ii",$rowCategory['id'],$company_id);
			$stmt->execute();
			}	
			
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		 
		 function base64_to_jpeg($base64_string, $output_file) {
				
				$ifp = fopen( $output_file, 'wb' ); 
				
				
				$data = explode( ',', $base64_string );
				
				fwrite( $ifp, base64_decode( $data[1] ) );
				
				
				fclose( $ifp ); 
				
				return $output_file; 
			}
		function employeesDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select employees.id,concat_ws(' ', user_logins.first_name, user_logins.last_name) as name,is_inspector,passport_image from employees left join user_logins on user_logins.id=employees.user_login_id where company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; }
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$org[$j]['img']=$imgs;
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
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
		
	 
		
		function updateAdminStatus($data)
		{
			$dbCon = AppModel::createConnection();
			 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update employees set is_inspector=? where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['updateR'],$_POST['id']);
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
			
			$stmt = $dbCon->prepare("select country_id,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
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
		function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		 
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=53");
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

		function appId()
		{
			
			return $this -> encrypt_decrypt('encrypt',54);
		}
	 
	}	