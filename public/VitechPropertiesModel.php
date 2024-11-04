<?php
require_once('../AppModel.php');
class VitechPropertiesModel extends AppModel
{
	 function selectedPropertyDetailVitechNewInfo($data)
			{
				 
				
				$dbCon = AppModel::createConnection();
				 
					$selected_property_id= $this -> encrypt_decrypt('decrypt',$data['selected_property_id']);
					
					$stmt = $dbCon->prepare("select propertyType,short_term_rental,short_term_commision_fee,long_term_rental,long_term_commision_fee,annual_community_fee,property_condition,property_availability,building_class,property_furnishings,property_view,owner_sell_price,is_activated,responsible_for_sold,responsible_for_sell,responsible_for_manage,responsible_for_rent,private_entrance,elevator,pool,terrace,balcony,sellPhrase,startingPrice,sellingHeading,shortSellingDescription,longSellingDescription,numberOfBedrooms,numberOfBathrooms,vitech_property_address.streetAddress,vitech_property_address.country,vitech_property_address.city,imageId,images_info from vitech_property_description left join vitech_property_address on vitech_property_address.property_id=vitech_property_description.property_id and vitech_property_address.company_id=vitech_property_description.company_id left join vitech_property_interior on vitech_property_interior.property_id=vitech_property_description.property_id and vitech_property_interior.company_id=vitech_property_description.company_id left join vitech_property_exterior on vitech_property_exterior.property_id=vitech_property_description.property_id and vitech_property_exterior.company_id=vitech_property_description.company_id  left join vitech_properties on vitech_properties.id=vitech_property_description.property_id and vitech_properties.company_id=vitech_property_description.company_id left join vitech_property_building on vitech_property_building.property_id=vitech_property_description.property_id and vitech_property_building.company_id=vitech_property_description.company_id where vitech_property_description.property_id=?");
				
					/* bind parameters for markers */
					$stmt->bind_param("s", $selected_property_id);
					$stmt->execute();
					$result = $stmt->get_result();
					$row = $result->fetch_assoc();
					
				 
					
					$stmt = $dbCon->prepare("select * from vitech_property_photos where vitech_property_id=? order by sorting_number");
				
					/* bind parameters for markers */
					$stmt->bind_param("s", $selected_property_id);
					$stmt->execute();
					$resultImages = $stmt->get_result();
					$row['images_info']=array();
					$i=0;
					while($rowImages = $resultImages->fetch_assoc())
					{
						 
						$filename="../estorecss/".$rowImages ['vitech_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowImages ['vitech_photo_path'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowImages ['vitech_photo_path'].'.jpg' ); $imgs=str_replace('../','../../../../../',$imgs);  } else {
						$imgs=""; }
						
						$row['images_info'][$i]['image_path']=$imgs;
						$i++;
					}
					   
					$stmt->close();
					$dbCon->close();
					return $row;
				
			}
		
		
		function clientProposalDetail($data)
    {
		
		
		$dbCon = AppModel::createConnection();
       $proposal_id= $this -> encrypt_decrypt('decrypt',$data['proposal_id']);
			
			$stmt = $dbCon->prepare("select *  from vitech_property_proposal where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $proposal_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
        
    }
	
	
	function rentClientProposalDetail($data)
    {
		
		
		$dbCon = AppModel::createConnection();
       $proposal_id= $this -> encrypt_decrypt('decrypt',$data['proposal_id']);
			
			$stmt = $dbCon->prepare("select *  from vitech_wishlist_proposal where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $proposal_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select first_name,last_name  from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where country_of_residence=? and phone_number=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("is", $row['country_id'],$row['phone_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUser = $result->fetch_assoc();
			if(empty($rowUser))
			{
				$row['name']='No name';
			}
			else
			{
				$row['name']=$rowUser['last_name'];
			}
			
			$stmt->close();
			$dbCon->close();
			return $row;
        
    }
	
	function employeeListing($data)
		{
			$dbCon = AppModel::createConnection();
			$proposal_id= $this -> encrypt_decrypt('decrypt',$data['proposal_id']);
			
			$stmt = $dbCon->prepare("select * from vitech_property_proposal where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $proposal_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$company_id=$row['company_id'];
			
			$stmt = $dbCon->prepare("select distinct employee_id ,passport_image,manage_employee_permissions.id,company_name,concat_ws(' ', first_name, last_name) as name,last_name,first_name,email,manage_employee_permissions.user_id from manage_employee_permissions left join user_logins on user_logins.id=manage_employee_permissions.user_id left join companies on companies.id=manage_employee_permissions.company_id where company_id=? limit 0,4");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			
			
			 $stmt = $dbCon->prepare("select country_code,company_permission,h_date,res_date,title,phone,mobile,email,c_id,d_country,department,e_number,card_id  from user_company_profile left join phone_country_code on phone_country_code.country_name=user_company_profile.d_country where company_id=? and user_login_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$row['user_id']);
			$stmt->execute();
			$resultEmp = $stmt->get_result();
		   
			$rowEmp = $resultEmp->fetch_assoc();
			
			$row['work_email']=$rowEmp['email']; 
			$row['wmobile']=$rowEmp['mobile']; 
			$row['mobile']='+'.$rowEmp['country_code'].''.$rowEmp['mobile']; 
			
			
			
			$stmt = $dbCon->prepare("select location_id from employee_location where employee_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['employee_id']);
			$stmt->execute();
			$result2 = $stmt->get_result();
			$rowEmpLoca = $result2->fetch_assoc();
			if(empty($rowEmpLoca))
			{
				$row['location_verified']=0;
			}
			else
			{
				$row['location_verified']=1;
			}
				if($row['passport_image']!=null || $row['passport_image']!="") { 
						 
						 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/notavailable.jpg"; }
						 
						 
																	 } else { $imgs='../html/usercontent/images/notavailable.jpg'; 
																	 
																	 
																	 }
				array_push($org,$row);
				$stmt = $dbCon->prepare("select count(id) as num from employee_identificator_verification_detail where employee_user_id=(select user_login_id from employees where id=?)");
				$stmt->bind_param("i", $row['employee_id']);
				$stmt->execute();
				$resultEmp = $stmt->get_result();
				$rowEmp = $resultEmp->fetch_assoc();
				$org[$j]['verify_emp']=$rowEmp['num'];
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org[$j]['uid']= $this -> encrypt_decrypt('encrypt',$row['user_id']);
				$org[$j]['employee_id']= $this -> encrypt_decrypt('encrypt',$row['employee_id']);
				$org[$j]['img']=$imgs;
				$j++;
				
			}
			//print_r($org); 
			//die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
	
	
	
	function teamMemberListing($data)
		{
			$dbCon = AppModel::createConnection();
			$proposal_id= $this -> encrypt_decrypt('decrypt',$data['proposal_id']);
			
			$stmt = $dbCon->prepare("select * from vitech_property_proposal where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $proposal_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$company_id=$row['company_id'];
			
			$stmt = $dbCon->prepare("select employees.id,user_logins.first_name,user_logins.last_name,user_login_id,passport_image from employees left join user_logins on user_logins.id=employees.user_login_id where company_id=? and find_in_set(employees.id,?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $company_id,$row['team_members']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			
			
			 $stmt = $dbCon->prepare("select country_code,company_permission,h_date,res_date,title,phone,mobile,email,c_id,d_country,department,e_number,card_id  from user_company_profile left join phone_country_code on phone_country_code.country_name=user_company_profile.d_country where company_id=? and user_login_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$row['user_id']);
			$stmt->execute();
			$resultEmp = $stmt->get_result();
		   
			$rowEmp = $resultEmp->fetch_assoc();
			
			$row['work_email']=$rowEmp['email']; 
			$row['wmobile']=$rowEmp['mobile']; 
			$row['mobile']='+'.$rowEmp['country_code'].''.$rowEmp['mobile']; 
			
			
			
			$stmt = $dbCon->prepare("select location_id from employee_location where employee_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['employee_id']);
			$stmt->execute();
			$result2 = $stmt->get_result();
			$rowEmpLoca = $result2->fetch_assoc();
			if(empty($rowEmpLoca))
			{
				$row['location_verified']=0;
			}
			else
			{
				$row['location_verified']=1;
			}
				if($row['passport_image']!=null || $row['passport_image']!="") { 
						 
						 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/notavailable.jpg"; }
						 
						 
																	 } else { $imgs='../html/usercontent/images/notavailable.jpg'; 
																	 
																	 
																	 }
				array_push($org,$row);
				$stmt = $dbCon->prepare("select count(id) as num from employee_identificator_verification_detail where employee_user_id=(select user_login_id from employees where id=?)");
				$stmt->bind_param("i", $row['employee_id']);
				$stmt->execute();
				$resultEmp = $stmt->get_result();
				$rowEmp = $resultEmp->fetch_assoc();
				$org[$j]['verify_emp']=$rowEmp['num'];
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org[$j]['uid']= $this -> encrypt_decrypt('encrypt',$row['user_id']);
				$org[$j]['employee_id']= $this -> encrypt_decrypt('encrypt',$row['employee_id']);
				$org[$j]['img']=$imgs;
				$j++;
				
			}
			//print_r($org); 
			//die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
	function teamMemberRentListing($data)
		{
			$dbCon = AppModel::createConnection();
			$proposal_id= $this -> encrypt_decrypt('decrypt',$data['proposal_id']);
			
			$stmt = $dbCon->prepare("select * from vitech_wishlist_proposal where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $proposal_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$company_id=$row['company_id'];
			
			$stmt = $dbCon->prepare("select employees.id,user_logins.first_name,user_logins.last_name,user_login_id,passport_image from employees left join user_logins on user_logins.id=employees.user_login_id where company_id=? and find_in_set(employees.id,?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $company_id,$row['team_members']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			
			
			 $stmt = $dbCon->prepare("select country_code,company_permission,h_date,res_date,title,phone,mobile,email,c_id,d_country,department,e_number,card_id  from user_company_profile left join phone_country_code on phone_country_code.country_name=user_company_profile.d_country where company_id=? and user_login_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$row['user_id']);
			$stmt->execute();
			$resultEmp = $stmt->get_result();
		   
			$rowEmp = $resultEmp->fetch_assoc();
			
			$row['work_email']=$rowEmp['email']; 
			$row['wmobile']=$rowEmp['mobile']; 
			$row['mobile']='+'.$rowEmp['country_code'].''.$rowEmp['mobile']; 
			
			
			
			$stmt = $dbCon->prepare("select location_id from employee_location where employee_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['employee_id']);
			$stmt->execute();
			$result2 = $stmt->get_result();
			$rowEmpLoca = $result2->fetch_assoc();
			if(empty($rowEmpLoca))
			{
				$row['location_verified']=0;
			}
			else
			{
				$row['location_verified']=1;
			}
				if($row['passport_image']!=null || $row['passport_image']!="") { 
						 
						 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/notavailable.jpg"; }
						 
						 
																	 } else { $imgs='../html/usercontent/images/notavailable.jpg'; 
																	 
																	 
																	 }
				array_push($org,$row);
				$stmt = $dbCon->prepare("select count(id) as num from employee_identificator_verification_detail where employee_user_id=(select user_login_id from employees where id=?)");
				$stmt->bind_param("i", $row['employee_id']);
				$stmt->execute();
				$resultEmp = $stmt->get_result();
				$rowEmp = $resultEmp->fetch_assoc();
				$org[$j]['verify_emp']=$rowEmp['num'];
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org[$j]['uid']= $this -> encrypt_decrypt('encrypt',$row['user_id']);
				$org[$j]['employee_id']= $this -> encrypt_decrypt('encrypt',$row['employee_id']);
				$org[$j]['img']=$imgs;
				$j++;
				
			}
			//print_r($org); 
			//die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
	
	function employeeListingRentProposal($data)
		{
			$dbCon = AppModel::createConnection();
			$proposal_id= $this -> encrypt_decrypt('decrypt',$data['proposal_id']);
			
			$stmt = $dbCon->prepare("select * from vitech_wishlist_proposal where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $proposal_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$company_id=$row['company_id'];
			
			$stmt = $dbCon->prepare("select distinct employee_id ,passport_image,manage_employee_permissions.id,company_name,concat_ws(' ', first_name, last_name) as name,last_name,first_name,email,manage_employee_permissions.user_id from manage_employee_permissions left join user_logins on user_logins.id=manage_employee_permissions.user_id left join companies on companies.id=manage_employee_permissions.company_id where company_id=? limit 0,4");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			
			
			 $stmt = $dbCon->prepare("select country_code,company_permission,h_date,res_date,title,phone,mobile,email,c_id,d_country,department,e_number,card_id  from user_company_profile left join phone_country_code on phone_country_code.country_name=user_company_profile.d_country where company_id=? and user_login_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$row['user_id']);
			$stmt->execute();
			$resultEmp = $stmt->get_result();
		   
			$rowEmp = $resultEmp->fetch_assoc();
			
			$row['work_email']=$rowEmp['email']; 
			$row['wmobile']=$rowEmp['mobile']; 
			$row['mobile']='+'.$rowEmp['country_code'].''.$rowEmp['mobile']; 
			
			
			
			$stmt = $dbCon->prepare("select location_id from employee_location where employee_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['employee_id']);
			$stmt->execute();
			$result2 = $stmt->get_result();
			$rowEmpLoca = $result2->fetch_assoc();
			if(empty($rowEmpLoca))
			{
				$row['location_verified']=0;
			}
			else
			{
				$row['location_verified']=1;
			}
				if($row['passport_image']!=null || $row['passport_image']!="") { 
						 
						 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/notavailable.jpg"; }
						 
						 
																	 } else { $imgs='../html/usercontent/images/notavailable.jpg'; 
																	 
																	 
																	 }
				array_push($org,$row);
				$stmt = $dbCon->prepare("select count(id) as num from employee_identificator_verification_detail where employee_user_id=(select user_login_id from employees where id=?)");
				$stmt->bind_param("i", $row['employee_id']);
				$stmt->execute();
				$resultEmp = $stmt->get_result();
				$rowEmp = $resultEmp->fetch_assoc();
				$org[$j]['verify_emp']=$rowEmp['num'];
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org[$j]['uid']= $this -> encrypt_decrypt('encrypt',$row['user_id']);
				$org[$j]['employee_id']= $this -> encrypt_decrypt('encrypt',$row['employee_id']);
				$org[$j]['img']=$imgs;
				$j++;
				
			}
			//print_r($org); 
			//die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
	
function poposerEmployeeDetail($data)
    {
		
		
		$dbCon = AppModel::createConnection();
		$proposal_id= $this -> encrypt_decrypt('decrypt',$data['proposal_id']);
			
			$stmt = $dbCon->prepare("select * from vitech_property_proposal where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $proposal_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select * from user_profiles where user_logins_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['created_by']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUserPhone = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from employees where company_id=? and user_login_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("ii", $row['company_id'],$row['created_by']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$employee_id= $row['id'];
			 
			$stmt = $dbCon->prepare("select company_profiles.twitter as tw,company_profiles.fb,company_profiles.insta,company_email,user_logins.created_on,bg_color,f_color,companies.country_id,company_profiles.phone as cphone,passport_image,company_name,country.country_name,user_logins.email,user_logins.first_name,user_logins.last_name,phone_number,phone_country_code.country_code,employees.user_login_id,employees.company_id from employees left join companies on companies.id=employees.company_id left join company_profiles on company_profiles.company_id=companies.id left join user_logins on employees.user_login_id=user_logins.id left join user_profiles on user_profiles.user_logins_id=user_logins.id left join country on user_logins.country_of_residence=country.id left join phone_country_code on phone_country_code.country_name=country.country_name left join corporate_color on companies.id=corporate_color.company_id  where employees.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("select max(id) as v_id from user_passport_logs where user_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_login_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_veri = $result->fetch_assoc();
			if(empty($row_veri))
			{
				$row_veri['v_id']="";
			}
			
			
			
			$stmt = $dbCon->prepare("select facebook,twitter,d_country,phone,email,mobile,title,country_code from user_company_profile left join phone_country_code on user_company_profile.c_id=phone_country_code.country_name  where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $row['company_id'],$row['user_login_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_profile = $result->fetch_assoc();
			//print_r($row_profile); die;
			if($row['user_login_id']==43)
			{
			$stmt = $dbCon->prepare("select visiting_address from property_location  where company_id=? and is_headquarter=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_location = $result->fetch_assoc();	
				
			}
			else
			{
			$stmt = $dbCon->prepare("select visiting_address from property_location  where id in(select location_id from employee_location where employee_id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_location = $result->fetch_assoc();	
			if(empty($row_location))
			{
			$stmt = $dbCon->prepare("select visiting_address from property_location  where company_id=? and is_headquarter=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_location = $result->fetch_assoc();		
			}
			}
			
			$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=(select country_name from country where id=?)");
			$stmt->bind_param("i",$row['country_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_phone = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=?");
			$stmt->bind_param("s",$row_profile['d_country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_mobile = $result->fetch_assoc();
			$row['cid']=$this->encrypt_decrypt('encrypt',$row['company_id']);
			$row['phone']=$row_profile['phone'];
			$row['work_email']=$row_profile['email'];
			$row['mobile']=$row_profile['mobile'];
			if($row_profile['title']==null || $row_profile['title']=='-' || $row_profile['title']=='') { $row_profile['title']='Employee'; }  
			$row['title']=$row_profile['title'];
			$row['location']=$row_location['visiting_address'];
			$row['employee_country_code']=$row_profile['country_code'];
			$row['company_country_code']=$row_phone['country_code'];
			$row['mobile_country_code']=$row_mobile['country_code'];
			$row['v_id']=$row_veri['v_id'];
			$row['user_phone']=$rowUserPhone['phone_number'];
			$row['facebook']=$row_profile['facebook'];
			$row['twitter']=$row_profile['twitter'];
			
			
			$stmt = $dbCon->prepare("select * from company_aboutus_content where company_id=? and company_aboutus_id=1");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAbout = $result->fetch_assoc();
			$row['about_us']=$rowAbout['content']; 
			$row['about_is_active']=$rowAbout['is_active']; 
			$stmt = $dbCon->prepare("select * from company_aboutus_content where company_id=? and company_aboutus_id=4");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAbout = $result->fetch_assoc();
			$row['who_we_are']=$rowAbout['content']; 
			$stmt->close();
			$dbCon->close();
			return $row;
        
    }
	

function rentPoposerEmployeeDetail($data)
    {
		
		
		$dbCon = AppModel::createConnection();
		$proposal_id= $this -> encrypt_decrypt('decrypt',$data['proposal_id']);
			
			$stmt = $dbCon->prepare("select * from vitech_property_wishlist where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $proposal_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select * from user_profiles where user_logins_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['created_by']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUserPhone = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from employees where company_id=? and user_login_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("ii", $row['company_id'],$row['created_by']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$employee_id= $row['id'];
			 
			$stmt = $dbCon->prepare("select company_profiles.twitter as tw,company_profiles.fb,company_profiles.insta,company_email,user_logins.created_on,bg_color,f_color,companies.country_id,company_profiles.phone as cphone,passport_image,company_name,country.country_name,user_logins.email,user_logins.first_name,user_logins.last_name,phone_number,phone_country_code.country_code,employees.user_login_id,employees.company_id from employees left join companies on companies.id=employees.company_id left join company_profiles on company_profiles.company_id=companies.id left join user_logins on employees.user_login_id=user_logins.id left join user_profiles on user_profiles.user_logins_id=user_logins.id left join country on user_logins.country_of_residence=country.id left join phone_country_code on phone_country_code.country_name=country.country_name left join corporate_color on companies.id=corporate_color.company_id  where employees.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("select max(id) as v_id from user_passport_logs where user_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_login_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_veri = $result->fetch_assoc();
			if(empty($row_veri))
			{
				$row_veri['v_id']="";
			}
			
			
			
			$stmt = $dbCon->prepare("select facebook,twitter,d_country,phone,email,mobile,title,country_code from user_company_profile left join phone_country_code on user_company_profile.c_id=phone_country_code.country_name  where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $row['company_id'],$row['user_login_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_profile = $result->fetch_assoc();
			//print_r($row_profile); die;
			if($row['user_login_id']==43)
			{
			$stmt = $dbCon->prepare("select visiting_address from property_location  where company_id=? and is_headquarter=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_location = $result->fetch_assoc();	
				
			}
			else
			{
			$stmt = $dbCon->prepare("select visiting_address from property_location  where id in(select location_id from employee_location where employee_id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_location = $result->fetch_assoc();	
			if(empty($row_location))
			{
			$stmt = $dbCon->prepare("select visiting_address from property_location  where company_id=? and is_headquarter=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_location = $result->fetch_assoc();		
			}
			}
			
			$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=(select country_name from country where id=?)");
			$stmt->bind_param("i",$row['country_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_phone = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=?");
			$stmt->bind_param("s",$row_profile['d_country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_mobile = $result->fetch_assoc();
			$row['cid']=$this->encrypt_decrypt('encrypt',$row['company_id']);
			$row['phone']=$row_profile['phone'];
			$row['work_email']=$row_profile['email'];
			$row['mobile']=$row_profile['mobile'];
			if($row_profile['title']==null || $row_profile['title']=='-' || $row_profile['title']=='') { $row_profile['title']='Employee'; }  
			$row['title']=$row_profile['title'];
			$row['location']=$row_location['visiting_address'];
			$row['employee_country_code']=$row_profile['country_code'];
			$row['company_country_code']=$row_phone['country_code'];
			$row['mobile_country_code']=$row_mobile['country_code'];
			$row['v_id']=$row_veri['v_id'];
			$row['user_phone']=$rowUserPhone['phone_number'];
			$row['facebook']=$row_profile['facebook'];
			$row['twitter']=$row_profile['twitter'];
			
			
			$stmt = $dbCon->prepare("select * from company_aboutus_content where company_id=? and company_aboutus_id=1");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAbout = $result->fetch_assoc();
			$row['about_us']=$rowAbout['content']; 
			$row['about_is_active']=$rowAbout['is_active']; 
			$stmt = $dbCon->prepare("select * from company_aboutus_content where company_id=? and company_aboutus_id=4");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAbout = $result->fetch_assoc();
			$row['who_we_are']=$rowAbout['content']; 
			$stmt->close();
			$dbCon->close();
			return $row;
        
    }
		
		
	function updateUserPersonalAddress($data)
		{
		$dbCon = AppModel::createConnection($data);
		$id= $this -> encrypt_decrypt('decrypt',$data['booking_id']); 
		$stmt = $dbCon->prepare("select checkin_code,is_paid,passport_image,buyer_id,is_buyer_company,hotel_checkout_detail.user_id,user_address.address as visiting_address,user_address.port_number,user_address.city as visiting_city,user_address.state as visiting_state,user_address.id as p_id,room_type_id,total_days,price,property_nickname as hotel_name,country_code as fdesk_country_code,phone_number as fdesk_phone_number from hotel_checkout_detail left join user_address on user_address.id= hotel_checkout_detail.room_type_id left join user_profiles on user_profiles.user_logins_id=user_address.user_id left join user_logins on user_logins.id=user_address.user_id left join phone_country_code on user_logins.country_of_residence=phone_country_code.id where hotel_checkout_detail.id=?");
			
		/* bind parameters for markers */
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$rowPrice = $result->fetch_assoc();
		$address_id=0;
		$card_id=$_POST['card_id'];
		$code=$rowPrice['checkin_code'];
		 
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=4242424242424242&card[exp_month]=2&card[exp_year]=2040&card[cvc]=314");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);
			$a=json_decode($result,true);
			 
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "name=".$row['first_name']."&email=".$row['email']."&source=".$a['id']."&description=My");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);
			$b=json_decode($result,true);
			$cuId=$b['id'];
			
			$total_price=$rowPrice['price']*$rowPrice['total_days']*100;
			if($total_price<500)
			{
				$total_price=500;
			}
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "customer=".$b['id']."&amount=".$total_price."&currency=sek&description=My");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);			
			$c=json_decode($result,true);
			
			$Chargeid=$c['id'];	
			$rowPrice['is_paid']=1;
			$stmt = $dbCon->prepare("update hotel_checkout_detail set  checkin_code=?,is_paid=1,card_id=?,delivery_address_id=?,cust_id=?,transection_id=? where id=?");
			$stmt->bind_param("siissi",$code, $card_id,$address_id,$cuId,$Chargeid,$id);
			$stmt->execute();
			
			$this->sendBookingReservationConfirmationInfo($data);
			 
			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => 'https://dstricts.com/user/index.php/DstrictsApp/updateApartmentBooking',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS => array('checkin_code'=>$code,'is_paid' =>$rowPrice['is_paid'],'card_id' => $card_id,'address_id' => $address_id,'cuId' => $cuId,'Chargeid' => $Chargeid,'checkout_id' => $id),
			)); 
			$response = curl_exec($curl);
			curl_close($curl);
		$stmt->close();	 
		$dbCon->close();
		return 1;
		}
		
	
	function sendBookingInfo($data)
		{
			$dbCon = AppModel::createConnection($data);
			$proposal_id= $this -> encrypt_decrypt('decrypt',$data['proposal_id']);    
			$selected_wishlist_id= $this -> encrypt_decrypt('decrypt',$data['selected_wishlist_id']); 
			$getPropertyDetailVitechNewInfo=$this->getPropertyDetailVitechNewInfo($data);
			 
			$_POST['room_price']=$getPropertyDetailVitechNewInfo['broker_price_per_night'];
			$_POST['is_paid']=1;
			$_POST['guest_adults']=$getPropertyDetailVitechNewInfo['adult_guest'];
			$_POST['guest_children']=$getPropertyDetailVitechNewInfo['adult_child'];
			$_POST['checkin_date']=date('Y-m-d',$getPropertyDetailVitechNewInfo['checkin_date']);
			$_POST['checkout_date']=date('Y-m-d',$getPropertyDetailVitechNewInfo['checkout_date']);
			$id=$getPropertyDetailVitechNewInfo['owner_property_id'];
			$company_id=$getPropertyDetailVitechNewInfo['company_id'];
			
			$date1=strtotime($_POST['checkin_date']);  
			$date2=strtotime($_POST['checkout_date']);
			$start_date=strtotime($_POST['checkin_date']);  
			$end_date=strtotime($_POST['checkout_date']);
			$total_days=($end_date-$start_date) / (60 * 60 * 24);
			$_POST['guest_infants']=0;
			$_POST['hotel_property_type']=2;
			$user_id=$_POST['user_id'];
			$stmt = $dbCon->prepare("select email from user_logins where id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$_POST['guest_email']=$row['email'];
					$j=0;
					while($j==0)
					{
					$code=mt_rand(1111,9999); 
					$stmt = $dbCon->prepare("select id from hotel_checkout_detail where checkin_code=?");
					/* bind parameters for markers */
					$stmt->bind_param("s",$code);
					$stmt->execute();
					$result = $stmt->get_result();
					$rowCode = $result->fetch_assoc();
					if(empty($rowCode))
					{
						$j++;
					}
					}
			$st=1;
			
			$stmt = $dbCon->prepare("insert into `hotel_checkout_detail`(created_by_company,price,is_paid,checkin_code,guest_email,user_id,buyer_id,`guest_adult`,`guest_children`,`guest_infant`,`checkin_date`,`checkout_date`,`room_type_id`,`total_days`,`created_on`,hotel_property_type,checkin_booking_date,checkout_booking_date,reservation_confirmed) values (?,?,?,?,?,?,?, ?, ?, ?, ?, ?,  ?, ?, now(), ?,?,?,?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiiisiiiiissiiissi",$company_id,$_POST['room_price'],$_POST['is_paid'],$code,$_POST['guest_email'],$user_id,$user_id, $_POST['guest_adults'], $_POST['guest_children'], $_POST['guest_infants'],$_POST['checkin_date'],$_POST['checkout_date'],$id,$total_days,$_POST['hotel_property_type'],$date1,$date2,$st);
			$stmt->execute();
			$checkid=$stmt->insert_id;
			 $curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => 'https://dstricts.com/user/index.php/DstrictsApp/mannualApartmentBooking',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS => array('checkin_code' => $code,'user_id' => $user_id,'guest_email' => $_POST['guest_email'],'guest_adults' => $_POST['guest_adults'],'guest_children' => $_POST['guest_children'],'guest_infants' => $_POST['guest_infants'],'date1' => $_POST['checkin_date'],'date2' => $_POST['checkout_date'],'id' => $id,'checkout_id' => $checkid,'total_days' => $total_days,'price' => $_POST['room_price'],'hotel_property_type' => 2,'is_paid' => $_POST['is_paid']),
			));

			$response = curl_exec($curl);
  
			curl_close($curl);
			
			 
			$stmt->close();
			$dbCon->close();
			return $this->encrypt_decrypt('encrypt',$checkid);
			
		}
		
		
	function poposalDetail($data)
    {
		
		
		$dbCon = AppModel::createConnection();
       $proposal_id= $this -> encrypt_decrypt('decrypt',$data['proposal_id']);
			
			$stmt = $dbCon->prepare("select * from vitech_wishlist_proposal where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $proposal_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
        
    }
	
	

	
	function verifyEmail()
		{
			$dbCon = AppModel::createConnection();
			  
				 
				$stmt = $dbCon->prepare("select id from user_logins where email=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("s", $_POST['email']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_country = $result->fetch_assoc();
				 
				if(empty($row_country))
				{
				$stmt->close();
				$dbCon->close();
				return 0;	
				}
				else
				{
				$stmt->close();
				$dbCon->close();
				return $row_country['id'];	
				}
		}
		
		function createUser($data)
		{
			$dbCon = AppModel::createConnection();
			
			if(isset($data['came_from']))
			{
				$came_from=$data['came_from'];
			}
			else
			{
				$came_from=8;
			}
			
			$stmt = $dbCon->prepare("select id from user_logins where email=?");
			/* bind parameters for markers */
			$stmt->bind_param("s", $data['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$rf=0;	
			$st=1; 
			$added_on_place=2;
			$data['first_name']=htmlentities($data['first_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$data['last_name']=htmlentities($data['last_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$data['random_hash'] = substr(md5(uniqid(rand(), true)), 16, 16);
			$stmt = $dbCon->prepare("INSERT INTO user_logins (first_name,last_name,registered_from,get_started_wizard_status,email,  email_verification_code , created_on , modified_on, country_of_residence,verification_status,added_on_place,user_came_from,domain_id) VALUES (?, ?, ?, ?,   ?, ?, now(), now(), ?, ?,?,?,?)");
			$stmt->bind_param("ssiissiiiii", $data['first_name'], $data['last_name'],$st,$st,$data['email'], $data['random_hash'], $data['pcountry'],$rf,$added_on_place,$came_from,$_POST['domain_id']);
			$stmt->execute();
			$data['user_id']=$stmt->insert_id;
			}
			else
			{
				$data['user_id']=$row['id'];
			}
			$stmt->close();
			$dbCon->close();
			return $data['user_id'];
			
		}
	
		
		function createUserProfile($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id from user_profiles where user_logins_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			 
			$stmt = $dbCon->prepare("INSERT INTO user_profiles (user_logins_id,phone_number) VALUES (?, ?)");
			$stmt->bind_param("is", $data['user_id'], $data['pnumber']);
			$stmt->execute();
			 
			}
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		
		function saveCardDetails($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 
			$data['card_type']='Visa';		
			$_POST['name_on_card']=htmlentities($_POST['first_name'],ENT_NOQUOTES, 'ISO-8859-1');		
			$stmt = $dbCon->prepare("insert into user_cards(`user_login_id`,`created_on`,`card_number`,card_cvv,exp_month,exp_year,name_on_card,card_type) values(?, now(), ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("isiiiss", $_POST['user_id'],$_POST['card_number'],$_POST['cvv'],$_POST['expiry_month'],$_POST['expiry_year'],$_POST['name_on_card'],$data['card_type']);
			$stmt->execute();
			$id=$stmt->insert_id;
			$stmt->close();
			$dbCon->close();
			return $id;
			 
		}
		
	function poposalUserDetail($data)
    {
		
		
		$dbCon = AppModel::createConnection();
       $proposal_id= $this -> encrypt_decrypt('decrypt',$data['proposal_id']);
			
			$stmt = $dbCon->prepare("select * from vitech_wishlist_proposal where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $proposal_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select user_logins.id,email,first_name,last_name from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where country_of_residence=? and phone_number=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("is", $row['country_id'], $row['phone_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row1;
        
    }
	
	function countryOptions()
		{
			$dbCon = AppModel::createConnection();
			 
		    $stmt = $dbCon->prepare("select * from phone_country_code order by country_name");
			/* bind parameters for markers */
			$stmt->execute();
			$result1 = $stmt->get_result();
			 $org=array();
			while($row = $result1->fetch_assoc())
			{
				array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
	
	
	function getPropertyDetailVitechNewInfo($data)
			{
				 
				
				$dbCon = AppModel::createConnection();
				 
					$selected_wishlist_id= $this -> encrypt_decrypt('decrypt',$data['selected_wishlist_id']);
					
					$stmt = $dbCon->prepare("select  company_id,owner_property_id,property_id,id,checkin_date,checkout_date,adult_guest,adult_child,broker_price_per_night from vitech_property_wishlist where id=?");
					$stmt->bind_param("i", $selected_wishlist_id);
					$stmt->execute();
					$result5 = $stmt->get_result();
					$row5 = $result5->fetch_assoc();
					 
					
					$stmt = $dbCon->prepare("select is_activated,responsible_for_sold,responsible_for_sell,responsible_for_manage,responsible_for_rent,private_entrance,elevator,pool,terrace,balcony,sellPhrase,startingPrice,sellingHeading,shortSellingDescription,longSellingDescription,numberOfBedrooms,numberOfBathrooms,vitech_property_address.streetAddress,vitech_property_address.country,vitech_property_address.city,imageId,images_info from vitech_property_description left join vitech_property_address on vitech_property_address.property_id=vitech_property_description.property_id and vitech_property_address.company_id=vitech_property_description.company_id left join vitech_property_interior on vitech_property_interior.property_id=vitech_property_description.property_id and vitech_property_interior.company_id=vitech_property_description.company_id left join vitech_property_exterior on vitech_property_exterior.property_id=vitech_property_description.property_id and vitech_property_exterior.company_id=vitech_property_description.company_id  left join vitech_properties on vitech_properties.id=vitech_property_description.property_id and vitech_properties.company_id=vitech_property_description.company_id left join vitech_property_building on vitech_property_building.property_id=vitech_property_description.property_id and vitech_property_building.company_id=vitech_property_description.company_id where vitech_property_description.property_id=?");
				
					/* bind parameters for markers */
					$stmt->bind_param("s", $row5['property_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$row = $result->fetch_assoc();
					
					$row['checkin_date']=$row5['checkin_date'];
					$row['checkout_date']=$row5['checkout_date'];
					$row['adult_guest']=$row5['adult_guest'];
					$row['adult_child']=$row5['adult_child'];
					$row['broker_price_per_night']=$row5['broker_price_per_night'];
					$row['owner_property_id']=$row5['owner_property_id']; 
					$row['company_id']=$row5['company_id'];
					
					$stmt = $dbCon->prepare("select * from vitech_property_pricing_detail where property_id=?");
				
					/* bind parameters for markers */
					$stmt->bind_param("s", $row5['property_id']);
					$stmt->execute();
					$resultImages1 = $stmt->get_result();
					$resultImages = $resultImages1->fetch_assoc();
					
					if(empty($resultImages))
					{
					$row['owner_deposit_fee']=0;
					$row['owner_cleaning_fee']=0;
					$row['late_arrival_fee']=0;
					$row['tourist_tax']=0;
					
					}
					else
					{
					$row['owner_deposit_fee']=$resultImages['owner_deposit_fee'];
					$row['owner_cleaning_fee']=$resultImages['owner_cleaning_fee'];
					$row['late_arrival_fee']=$resultImages['late_arrival_fee'];
					$row['tourist_tax']=$resultImages['tourist_tax'];
					}
					
					
					$stmt = $dbCon->prepare("select * from vitech_property_photos where vitech_property_id=? order by sorting_number");
				
					/* bind parameters for markers */
					$stmt->bind_param("s", $row5['property_id']);
					$stmt->execute();
					$resultImages = $stmt->get_result();
					$row['images_info']=array();
					$i=0;
					while($rowImages = $resultImages->fetch_assoc())
					{
						$filename="../estorecss/".$rowImages ['vitech_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowImages ['vitech_photo_path'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowImages ['vitech_photo_path'].'.jpg' ); $imgs=str_replace('../','../../../../../',$imgs);  } else {
						$imgs=""; }
						
						$row['images_info'][$i]['image_path']=$imgs;
						$i++;
					}
					   
					$stmt->close();
					$dbCon->close();
					return $row;
				
			}
			
			
			 
	function apartmentBookingCount($data)
		{
		 
			$dbCon = AppModel::createConnection();
			$selected_wishlist_id= $this -> encrypt_decrypt('decrypt',$data['selected_wishlist_id']);
					
			$stmt = $dbCon->prepare("select  owner_property_id,property_id,id,checkin_date,checkout_date,adult_guest,adult_child,broker_price_per_night from vitech_property_wishlist where id=?");
			$stmt->bind_param("i", $selected_wishlist_id);
			$stmt->execute();
			$result5 = $stmt->get_result();
			$row5 = $result5->fetch_assoc();
			$date=strtotime(date('Y-m-d'));
			if($row5['checkin_date']<$date)
			{
			$stmt->close();
			$dbCon->close();
			return -1;	 
			}
			$total_days=round(($row5['checkout_date']-$row5['checkin_date']) / (60 * 60 * 24));
			$strt=date('Y-m-d',$row5['checkin_date']);
			$end=date('Y-m-d',$row5['checkout_date']);
			
			 
			$stmt = $dbCon->prepare("SELECT count(id) as num from hotel_checkout_detail where hotel_property_type=2  and ((checkin_date BETWEEN ? AND ?) or (checkout_date BETWEEN ? AND ?)) and room_type_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ssssi", $strt,$end, $strt,$end,$row5['owner_property_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
	}
	
			
		function displayProposalProperties($data)
		{
			$dbCon = AppModel::createConnection();
			$proposal_id= $this -> encrypt_decrypt('decrypt',$data['proposal_id']);
			
			
			$stmt = $dbCon->prepare("select  property_id,id,checkin_date,checkout_date,adult_guest,adult_child,broker_price_per_night from vitech_property_wishlist where proposal_id=?");
				$stmt->bind_param("i", $proposal_id);
				$stmt->execute();
				$result5 = $stmt->get_result();
				$org=array();
				while($row5 = $result5->fetch_assoc())
				{
					 
				$stmt = $dbCon->prepare("select  type_of_contract,company_property_id,vitech_properties.owner_property_id,is_activated,is_reserved,owner_sell_price,sellPhrase,longSellingDescription,property_status,is_activated,vitech_city_id,vitech_properties.id,objectNumber,vitech_property_plot.area,startingPrice,numberOfBedrooms,numberOfBathrooms from vitech_properties  left join vitech_property_description on vitech_property_description.property_id=vitech_properties.id and vitech_property_description.company_id=vitech_properties.company_id  left join vitech_property_interior on vitech_property_interior.property_id=vitech_properties.id and vitech_property_interior.company_id=vitech_properties.company_id left join vitech_property_address on vitech_property_address.property_id=vitech_properties.id  and vitech_property_address.company_id=vitech_properties.company_id left join vitech_property_plot on vitech_property_plot.property_id=vitech_properties.id  and vitech_property_plot.company_id=vitech_properties.company_id where vitech_properties.id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("s", $row5['property_id']);
				$stmt->execute();
				$result = $stmt->get_result();
			   
				while($row = $result->fetch_assoc())
				{
					
				$row['checkin_date']=$row5['checkin_date'];
				$row['checkout_date']=$row5['checkout_date'];
				$row['adult_guest']=$row5['adult_guest'];
				$row['adult_child']=$row5['adult_child'];
				$row['broker_price_per_night']=$row5['broker_price_per_night'];
				$stmt = $dbCon->prepare("select vitech_photo_path,sorting_number,id from vitech_property_photos where vitech_property_id=? and sorting_number=1 order by sorting_number ");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if(empty($row1))
				{
					$row['image_count']=0;
					$image='../html/usercontent/images/notavailable.jpg';
				}
				else
				{
				$row['image_count']=1;
				$filename="../estorecss/".$row1 ['vitech_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['vitech_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['vitech_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/notavailable.jpg"; } 	
				}
				
				$row['photo_info']=	'../../../'.$image;
				$row['enc']=$this->encrypt_decrypt('encrypt',$row5['id']);
				$data['selected_wishlist_id']=$row['enc'];
				$valueCount=$this->apartmentBookingCount($data);
				if($valueCount>0)
				continue;
			 
				array_push($org,$row);
				}	
				}
			
				 
		  
				 
			$stmt->close();
			$dbCon->close();
			return $org;
		}	
	
	
	
	function displayPropertiesProposal($data)
		{
			$dbCon = AppModel::createConnection();
			$proposal_id= $this -> encrypt_decrypt('decrypt',$data['proposal_id']);
			 
					 
				$stmt = $dbCon->prepare("select  type_of_contract,company_property_id,vitech_properties.owner_property_id,is_activated,is_reserved,owner_sell_price,sellPhrase,longSellingDescription,property_status,is_activated,vitech_city_id,vitech_properties.id,objectNumber,vitech_property_plot.area,startingPrice,numberOfBedrooms,numberOfBathrooms from vitech_properties  left join vitech_property_description on vitech_property_description.property_id=vitech_properties.id and vitech_property_description.company_id=vitech_properties.company_id  left join vitech_property_interior on vitech_property_interior.property_id=vitech_properties.id and vitech_property_interior.company_id=vitech_properties.company_id left join vitech_property_address on vitech_property_address.property_id=vitech_properties.id  and vitech_property_address.company_id=vitech_properties.company_id left join vitech_property_plot on vitech_property_plot.property_id=vitech_properties.id  and vitech_property_plot.company_id=vitech_properties.company_id where vitech_properties.id in (select property_id from vitech_property_proposal_suggestions where proposal_id=?)");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $proposal_id);
				$stmt->execute();
				$result = $stmt->get_result();
			   $org=array();
				while($row = $result->fetch_assoc())
				{
				 
				$stmt = $dbCon->prepare("select vitech_photo_path,sorting_number,id from vitech_property_photos where vitech_property_id=? and sorting_number=1 order by sorting_number ");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if(empty($row1))
				{
					$row['image_count']=0;
					$image='../html/usercontent/images/notavailable.jpg';
				}
				else
				{
				$row['image_count']=1;
				$filename="../estorecss/".$row1 ['vitech_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['vitech_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['vitech_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/notavailable.jpg"; } 	
				}
				
				$row['photo_info']=	'../../../'.$image;
				$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				 
			 
				array_push($org,$row);
				}	
				 
				 
		  
				 
			$stmt->close();
			$dbCon->close();
			return $org;
		}	
	
	
	 	function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
			}
			
	
	function poposerDetail($data)
    {
		
		
		$dbCon = AppModel::createConnection();
       $proposal_id= $this -> encrypt_decrypt('decrypt',$data['proposal_id']);
			
			$stmt = $dbCon->prepare("select * from user_logins  where id=(select created_by from vitech_wishlist_proposal where id=?)");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $proposal_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
        
    }
	
	
		function propertyProposalDetail($data)
    {
		
		
		$dbCon = AppModel::createConnection();
       $proposal_id= $this -> encrypt_decrypt('decrypt',$data['proposal_id']);
			
			$stmt = $dbCon->prepare("select * from vitech_property_proposal where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $proposal_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowProposal = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select * from user_logins  where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $rowProposal['created_by']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['team_available']=$rowProposal['team_available'];
			$stmt->close();
			$dbCon->close();
			return $row;
        
    }
	
	
	 
	
	
	
	
	
	
	
	function updateCategoryServiceTodo($data)
		{ 
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select is_selected,professional_category_id,vitech_property_id from user_address_vitech_service_available where id=?");
			$stmt->bind_param("i",$_POST['service_todo_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['is_selected']==0)
			{
			$is_selected=1;	
			}
			else
			{
				$is_selected=0;
			}
			$stmt = $dbCon->prepare("update user_address_vitech_service_available set is_selected=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$is_selected,$_POST['service_todo_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select count(id) as num from user_address_vitech_service_available where professional_category_id=? and is_selected=1 and vitech_property_id=?");
			$stmt->bind_param("ii",$row['professional_category_id'],$row['vitech_property_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		
		
		function updateCategoryServiceAllTodos($data)
		{ 
			$dbCon = AppModel::createConnection();
			$property_id=$this->encrypt_decrypt('decrypt',$data['pid']);
			$stmt = $dbCon->prepare("update user_address_vitech_service_available set is_selected=1,modified_on=now() where vitech_property_id=? and professional_category_id=?");
			$stmt->bind_param("ii", $property_id,$_POST['cleaning_subcategory_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function approveProperty($data)
		{
			$dbCon = AppModel::createConnection();
			$property_id=$this->encrypt_decrypt('decrypt',$data['pid']);
			$stmt = $dbCon->prepare("select user_logins.id,first_name,last_name,ssn,country_of_residence,email,sex,dob_day,dob_month,dob_year,country_phone,phone_number, address,user_profiles.city,user_profiles.country,user_profiles.zipcode,grading_status from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where user_logins.id=(select id from user_logins where email=(select owner_email from vitech_properties where id=?))");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$data['user_id']=$row['id'];
			$full_name=$row['first_name'].' '.$row['last_name'];	
			
			$stmt = $dbCon->prepare("select * from vitech_properties  where company_property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i",$property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['property_id']=$row['id'];
			
			$stmt = $dbCon->prepare("select * from vitech_property_address  where company_id=? and property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("is", $row['company_id'],$row['property_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAddress = $result->fetch_assoc();
			
			 
			 
			$st=0;
			$same_invoice=1;
			$entry_code='';
			$stmt = $dbCon->prepare("insert into  user_address (`address`  , `city`  , `zipcode` , `port_number` , `invoice_address`  , `invoice_city`  , `invoice_zipcode`  , `invoice_port_number`  , `is_name_same` , `is_invoice_same`  , `name_on_house`  ,entry_code , user_id, created_on, is_personal_address,vitech_city,vitech_area) values(?,?,?,?,?,?,?,?,?,?,?,?,?,now(),?,?,?)");
				/* bind parameters for markers */
			$stmt->bind_param("ssssssssiissiiii",$rowAddress['streetAddress'],$rowAddress['city'], $rowAddress['zipCode'],$rowAddress['areaId'],$rowAddress['streetAddress'],$rowAddress['city'],$rowAddress['zipCode'],$rowAddress['areaId'],$same_invoice,$same_invoice,$full_name,$entry_code,$data['user_id'],$st,$rowAddress['vitech_city_id'],$rowAddress['vitech_area_id']);
			$stmt->execute();
			
			$id=$stmt->insert_id;
		 
		 
			$stmt = $dbCon->prepare("select * from vitech_property_building  where company_id=? and property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("is", $row['company_id'],$row['property_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowBuilding = $result->fetch_assoc();
		 
			$stmt = $dbCon->prepare("select * from vitech_property_description  where company_id=? and property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("is", $row['company_id'],$row['property_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowDescription = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from vitech_property_interior  where company_id=? and property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("is", $row['company_id'],$row['property_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowInterior = $result->fetch_assoc();
			for($i=1;$i<=$rowInterior['numberOfBathrooms'];$i++)
			{
			$stmt = $dbCon->prepare("insert into  user_apartment_bathroom_detail (`user_address_id`  , created_on,modified_on) values(?,now(),now())");
				/* bind parameters for markers */
			$stmt->bind_param("i",$id);
			$stmt->execute();	
			}
			for($i=1;$i<=$rowInterior['numberOfBedrooms'];$i++)
			{
			$stmt = $dbCon->prepare("insert into  user_apartment_bedrooms (`user_address_id`  , created_on) values(?,now())");
				/* bind parameters for markers */
			$stmt->bind_param("i",$id);
			$stmt->execute();	
			$bedId=$stmt->insert_id;
			$bed='Single';
			$stmt = $dbCon->prepare("insert into  user_apartment_bedrooms_beds (`bedroom_id`, created_on,modified_on,bed_info) values(?,now(),now(),?)");
				/* bind parameters for markers */
			$stmt->bind_param("is",$bedId,$bed);
			$stmt->execute();
			}
			
			
			
			
			$stmt = $dbCon->prepare("select * from vitech_property_photos  where vitech_property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("s", $row['property_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$j=1;
			while($rowPhotos = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("insert into  user_apartment_photos (`user_address_id`  , apartment_photo_path,sorting_number) values(?,?,?)");
				/* bind parameters for markers */
				$stmt->bind_param("isi",$id,$rowPhotos['vitech_photo_path'],$j);
				$stmt->execute();	
				$j++;
			}
			 
			  
			 
			 if($rowAddress['private_entrance']=='Yes')
			 {
				$private_entrance=1; 
			 }
			 else
			 {
				 $private_entrance=0;
			 }
			 
			 
			  if($rowBuilding['elevator']=='Yes')
			 {
				$elevator=1; 
			 }
			 else
			 {
				 $elevator=0;
			 }
			 $stmt = $dbCon->prepare("select * from apartment_property_type  where property_type=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("s", $rowAddress['propertyType']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowType = $result->fetch_assoc();
			 
			
			$stmt = $dbCon->prepare("update  user_address set vitech_property_id=?,property_layout=?,property_type=?,apartment_floor=?,entrance_floor=?,private_entrance=?,elevator=?,property_nickname=? where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("idiiiiisi",$property_id,$row['livingSpace'],$rowType['id'],$rowBuilding['totalNumberFloors'],$rowBuilding['floor'],$private_entrance,$elevator,$rowDescription['sellPhrase'],$id);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("update  vitech_properties set owner_property_id=?,customerId=? where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("isi",$id,$data['user_id'],$property_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return $id;
		}
		
		
		function publishProperty($data)
		{
			$dbCon = AppModel::createConnection();
			$property_id=$this->encrypt_decrypt('decrypt',$data['pid']);
			$stmt = $dbCon->prepare("select * from vitech_properties  where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("s", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("delete from  user_apartment_photos where `user_address_id`=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",$row['owner_property_id']);
			$stmt->execute();
				
				
			$stmt = $dbCon->prepare("select * from vitech_property_photos  where vitech_property_id=? order by sorting_number");
        
			/* bind parameters for markers */
			$stmt->bind_param("s", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$j=1;
			while($rowPhotos = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("insert into  user_apartment_photos (`user_address_id`, apartment_photo_path,sorting_number) values(?,?,?)");
				/* bind parameters for markers */
				$stmt->bind_param("isi",$row['owner_property_id'],$rowPhotos['vitech_photo_path'],$j);
				$stmt->execute();	
				$j++;
			}
			$cr=1;
			$stmt = $dbCon->prepare("insert into  user_apartment_pricing_currency (`user_address_id`, currency_id) values(?,?)");
				/* bind parameters for markers */
			$stmt->bind_param("ii",$row['owner_property_id'],$cr);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select * from vitech_property_pricing_detail  where property_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("s", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowPricing = $result->fetch_assoc();
			if($rowPricing['seller_security_fee']==0)
			{
				$security_fee_applicable=0;
				$security_fee=0;
			}
			else
			{
				$security_fee_applicable=1;
				$security_fee=$rowPricing['seller_security_fee'];
			}
			
			if($rowPricing['seller_cleaning_fee']==0)
			{
				$cleening_fee_applicable=0;
				$cleening_fee=0;
			}
			else
			{
				$cleening_fee_applicable=1;
				$cleening_fee=$rowPricing['seller_cleaning_fee'];
			}
			
			if($rowPricing['tourist_tax']==0)
			{
				$tourist_tax_applicable=0;
				$tourist_tax=0;
			}
			else
			{
				$tourist_tax_applicable=1;
				$tourist_tax=$rowPricing['tourist_tax'];
			}
			
			$stmt = $dbCon->prepare("update user_address set arrival_time=?,departure_time=?,children_allowed=?,infants_allowed=?,smoking_allowed=?,events_allowed=?,pets_allowed=?,cleening_fee_applicable=?,cleening_fee=?,security_fee_applicable=?,security_fee=?,is_published=1,tourist_tax_applicable=?,tourist_tax=? where id=?");
				/* bind parameters for markers */
			$stmt->bind_param("ssiiiiiiiiiiii",$rowPricing['arrival_time'],$rowPricing['departure_time'],$rowPricing['children_allowed'],$rowPricing['infants_allowed'],$rowPricing['smoking_allowed'],$rowPricing['parties_allowed'],$rowPricing['pets_allowed'],$cleening_fee_applicable,$cleening_fee,$security_fee_applicable,$security_fee,$tourist_tax_applicable,$tourist_tax,$row['owner_property_id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("update  vitech_property_publish_request set is_published=1 where property_id=?");
				/* bind parameters for markers */
			$stmt->bind_param("s",$property_id);
			$stmt->execute();
			
			
			$today=strtotime(date('Y-m-d'));
			$endDate=strtotime(date('Y-m-d'));
			
			for($i=0; $i<24;$i++)
			{
				 $startDate=strtotime("+".$i." days", $endDate);
				 $month=date('m',$startDate);
				 $title=date('M Y',$startDate);
				 $d=date('Y-m-d',$startDate);
				 $date = new DateTime($d);
				 $date->modify('last day of this month');
				 $endDate=strtotime($date->format('Y-m-d'));  
				 $open=1;
				 $monday_price=$rowPricing['seller_price_per_night'];
				 $tuesday_price=$rowPricing['seller_price_per_night'];
				 $wednesday_price=$rowPricing['seller_price_per_night'];
				 $thursday_price=$rowPricing['seller_price_per_night'];
				 $friday_price=$rowPricing['seller_price_per_night'];
				 $saturday_price=$rowPricing['seller_price_per_night'];
				 $sunday_price=$rowPricing['seller_price_per_night'];
				 $minimum_price=$rowPricing['seller_price_per_night'];
				 $maximum_price=$rowPricing['seller_price_per_night']; 
				 $stmt = $dbCon->prepare("insert into user_apartment_pricing_info (pricing_start_date,pricing_end_date,user_address_id,created_on,monday_open,tuesday_open,wednesday_open,thursday_open,friday_open,saturday_open,sunday_open,pricing_title,shortest_duration,monday_price,tuesday_price,wednesday_price,thursday_price,friday_price,saturday_price,sunday_price,minimum_price,maximum_price) values(?, ?, ?, now(),?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
				 $stmt->bind_param("ssiiiiiiiisiiiiiiiiii",$startDate,$endDate, $row['owner_property_id'],$open,$open,$open,$open,$open,$open,$open,$title,$open,$monday_price,$tuesday_price,$wednesday_price,$thursday_price,$friday_price,$saturday_price,$sunday_price,$minimum_price,$maximum_price);
				$stmt->execute();
				
			}
			
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
	function serviceTodoDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$property_id=$this->encrypt_decrypt('decrypt',$data['pid']);
			$stmt = $dbCon->prepare("select * from professional_service_category where vitech_category=1 and id in (select professional_category_id from  vitech_company_selected_service_todos where company_id=? and is_selected=1)");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$j++;
				if($j==1)
				{
					$block='block';
				}
				else
				{
					$block='none';
				}
				$stmt = $dbCon->prepare("select count(id)as num from user_address_vitech_service_available where professional_category_id=? and is_selected=1 and vitech_property_id=?");
				$stmt->bind_param("ii", $row['id'],$vitech_property_id);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$rowTodoSelectedCount = $result2->fetch_assoc();
				
				$org=$org.' <div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile'.$j.'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold"><div class="dflex wi_100">
									<div class="wi_70 dflex">
								<span class="css-p2kctj"><img src="https://www.qloudid.com/html/usercontent/images/kitchen5.svg" class="css-z0f999"></span> 
								<div>
								<span class="apartheading changedText" >'.str_ireplace('&','and',html_entity_decode($row['category_name'])).'</span><span class="aprtSubheading changedText" id="service'.$row['id'].'">'.$rowTodoSelectedCount['num'].' services selected</span>
								</div>
								</div> 
									<div class="wi_30 padt10">
															<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span>
									</div> 
									</div></a></div>
								<div id="profile'.$j.'" class=" " style="display: '.$block.';">	
										 
									  <div class="css-2998cc fleft padb20">
									<a href="javascript:void(0);" onclick="updateCategoryAmenities('.$row['id'].')"> <button color="#444444" data-testid="Kitchen-amenity-section-select-all" class="merlin-button css-7wfern" aria-label=""><div class="merlin-button__content changedText">Select all</div></button></a>
									  </div>
									  
									   <div class="clear"></div>
											<div id="'.$row['id'].'">';
		 	$stmt = $dbCon->prepare("select user_address_vitech_service_available.id,is_selected,subcategory_name from user_address_vitech_service_available left join professional_service_subcategory on professional_service_subcategory.id=user_address_vitech_service_available.professional_subcategory_id where user_address_vitech_service_available.professional_category_id=? and user_address_vitech_service_available.vitech_property_id=? and professional_service_subcategory.id in(select professional_subcategory_id from  vitech_company_selected_service_todos where company_id=? and is_selected=1 and professional_category_id=?)");
			$stmt->bind_param("iiii", $row['id'],$property_id,$company_id,$row['id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			while($row1 = $result1->fetch_assoc())
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
				$org=$org.' <div data-testid="'.$row1['subcategory_name'].'-amenity-item" class="css-39yi7y"><div class="css-nj7s2c"><label for="oven" class="css-14q70q0 changedText">'.str_ireplace('&','and',html_entity_decode($row1['subcategory_name'])).'</label><div class="css-1sjqbna">
				<a href="javascript:void(0);" onclick="updateAminity('.$row1['id'].','.$row['id'].');"><input data-testid="test-checkbox-'.$row1['subcategory_name'].'" name="'.$row1['subcategory_name'].'" type="checkbox" class="css-1lgzhz8" '.$checked.'></a>
				</div></div>';
				 
				$org=$org.'</div>';	
			}			
											
			$org=$org.'</div> </div> </div> ';
			 
			}
			  
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		 function professionalTodoUpdate($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$property_id=$this->encrypt_decrypt('decrypt',$data['pid']);
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id in(select professional_subcategory_id from  vitech_company_selected_service_todos where company_id=?) and id not in (select professional_subcategory_id from  user_address_vitech_service_available where vitech_property_id=?) and professional_category_id in(select id from professional_service_category where vitech_category=1)");
			$stmt->bind_param("ii", $company_id,$property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			
			$stmt = $dbCon->prepare("select *  from professional_service_subcategory where id=?");
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			$rowAmenities= $result3->fetch_assoc();
			$stmt = $dbCon->prepare("insert into user_address_vitech_service_available ( professional_category_id,professional_subcategory_id,vitech_property_id, created_on, modified_on) values (?, ?,?, now(), now())");
			$stmt->bind_param("iii",$row['professional_category_id'],$row['id'],$property_id);
			$stmt->execute();
							
			}	
			
			$stmt = $dbCon->prepare("update user_address_vitech_service_available set is_selected=0 where vitech_property_id=?");
			$stmt->bind_param("i",$property_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 0;	
		}
		
		function checkServices($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$property_id=$this->encrypt_decrypt('decrypt',$data['pid']);
			$stmt = $dbCon->prepare("select count(id) as num from user_address_vitech_service_available where vitech_property_id=? and is_selected=1");
			$stmt->bind_param("i",$property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc(); 
			$stmt->close();
			$dbCon->close();
			return $row['num'];	
		}
		
		
	  
	
	function fetchPropertiesAddress($data)
    {
		
		
		$dbCon = AppModel::createConnection();
       $property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			
			$stmt = $dbCon->prepare("select * from vitech_properties  where company_property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['property_id']= $this -> encrypt_decrypt('encrypt',$row['id']); 
			$row['cid']= $this -> encrypt_decrypt('encrypt',$row['company_id']); 
			$stmt->close();
			$dbCon->close();
			return $row;
        
    }
	
	
	function sendBookingReservationConfirmationInfo($data)
		{
			$dbCon = AppModel::createConnection($data);
			$checkid=  $this -> encrypt_decrypt('decrypt',$data['booking_id']);
			 
			$stmt = $dbCon->prepare("select guest_adult,checkin_date,checkout_date,checkin_code,passport_image,buyer_id,is_buyer_company,hotel_checkout_detail.user_id,user_address.address as visiting_address,user_address.port_number,user_address.city as visiting_city,user_address.state as visiting_state,user_address.id as p_id,room_type_id,total_days,price,property_nickname as hotel_name,country_code as fdesk_country_code,phone_number as fdesk_phone_number from hotel_checkout_detail left join user_address on user_address.id= hotel_checkout_detail.room_type_id left join user_profiles on user_profiles.user_logins_id=user_address.user_id left join user_logins on user_logins.id=user_address.user_id left join phone_country_code on user_logins.country_of_residence=phone_country_code.id where hotel_checkout_detail.id=?");
			 
			/* bind parameters for markers */
			$stmt->bind_param("i", $checkid);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowInfo = $result->fetch_assoc();
			
			//print_r($rowInfo); die;
			$rowInfo['enc_p_id']= $this -> encrypt_decrypt('encrypt',$rowInfo['p_id']);  
			 $code=$rowInfo['checkin_code'];
			$stmt = $dbCon->prepare("select concat_ws(' ', first_name,last_name) as name,email from user_logins where id = ?");
            $data['room_type_id_enc']= $this -> encrypt_decrypt('encrypt',$rowInfo['room_type_id']);
			/* bind parameters for markers */
			$stmt->bind_param("i", $rowInfo['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUser    = $result->fetch_assoc();
		 
			$rowInfo['name']=$rowUser['name'];
			$rowInfo['email']=$rowUser['email'];	 
			 $url="https://dstricts.com/public/index.php/VisitorSelectSearch/selectYourRole/".$data['room_type_id_enc']; 
			$subject='Booking information';
			$surl=getShortUrl($url);
			$to      = $rowInfo['email'];
			$emailContent='<html xmlns="http://www.w3.org/1999/xhtml" style="background-color: rgb(240, 240, 240);"><head>
  <title>Reservation confirmed</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <style type="text/css">
    /* GT AMERICA */

    @font-face {
      font-display: fallback;
      font-family: "GT America Regular";
      font-weight: 400;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.ttf") format("truetype");
    }

    @font-face {
      font-display: fallback;
      font-family: "GT America Medium";
      font-weight: 600;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.ttf") format("truetype");
    }

    @font-face {
      font-display: fallback;
      font-family: "GT America Condensed Bold";
      font-weight: 700;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.ttf") format("truetype");
    }

    /* CLIENT-SPECIFIC RESET */

    body,
    table,
    td,
    a {
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }

    /* Prevent WebKit and Windows mobile changing default text sizes */

    table,
    td {
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }

    /* Remove spacing between tables in Outlook 2007 and up */

    img {
      -ms-interpolation-mode: bicubic;
    }

    /* Allow smoother rendering of resized image in Internet Explorer */

    .im {
      color: inherit !important;
    }

    /* DEVICE-SPECIFIC RESET */

    a[x-apple-data-detectors] {
      color: inherit !important;
      text-decoration: none !important;
      font-size: inherit !important;
      font-family: inherit !important;
      font-weight: inherit !important;
      line-height: inherit !important;
    }

    /* iOS BLUE LINKS */

    /* RESET */

    img {
      border: 0;
      height: auto;
      line-height: 100%;
      outline: none;
      text-decoration: none;
      display: block;
    }

    table {
      border-collapse: collapse;
    }

    table td {
      border-collapse: collapse;
      display: table-cell;
    }

    body {
      height: 100% !important;
      margin: 0 !important;
      padding: 0 !important;
      width: 100% !important;
    }

    /* BG COLORS */

    .mainTable {
      background-color: #F0F0F0;
    }

    .mainTable--hospitality {
      background-color: #f7f2ed;
    }

    html {
      background-color: #F0F0F0;
    }

    /* VARIABLES */

    .bg-white {
      background-color: white;
    }

    .hr {
      /* Cross-client horizontal rule. Adapted from https://litmus.com/community/discussions/4633-is-there-a-reliable-1px-horizontal-rule-method */
      background-color: #d3d3d8;
      border-collapse: collapse;
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
      mso-line-height-rule: exactly;
      line-height: 1px;
    }

    .textAlignLeft {
      text-align: left !important;
    }

    .textAlignRight {
      text-align: right !important;
    }

    .textAlignCenter {
      text-align: center !important;
    }

    .mt1 {
      margin-top: 6px;
    }

    .list {
      padding-left: 18px;
      margin: 0;
    }

    /* TYPOGRAPHY */

    body {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      color: #4f4f65;
      -webkit-font-smoothing: antialiased;
      -ms-text-size-adjust: 100%;
      -moz-osx-font-smoothing: grayscale;
      font-smoothing: always;
      text-rendering: optimizeLegibility;
    }

    .h1 {
      font-family: "GT America Condensed Bold", "Roboto Condensed", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 700;
      vertical-align: middle;
      font-size: 36px;
      line-height: 42px;
    }

    .h2 {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 600;
      vertical-align: middle;
      font-size: 16px;
      line-height: 24px;
    }

    .text {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 16px;
      line-height: 21px;
    }

    .text-list {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 16px;
      line-height: 25px;
    }

    .textSmall {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 14px;
    }

    .text-xsmall {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-size: 11px;
      text-transform: uppercase;
      line-height: 22px;
      letter-spacing: 1px;
    }

    .text-bold {
      font-weight: 600;
    }

    .text-link {
      text-decoration: underline;
    }

    .text-linkNoUnderline {
      text-decoration: none;
    }

    .text-strike {
      text-decoration: line-through;
    }

    /* FONT COLORS */

    .textColorDark {
      color: #23233e;
    }

    .textColorNormal {
      color: #4f4f65;
    }

    .textColorBlue {
      color: #2020c0;
    }

    .textColorGrayDark {
      color: #7B7B8B;
    }

    .textColorGray {
      color: #A5A8AD;
    }

    .textColorWhite {
      color: #FFFFFF;
    }

    .textColorRed {
      color: #df3232;
    }

    /* BUTTON */

    .Button-primary-wrapper {
      border-radius: 3px;
      background-color: #2020C0;
    }

    .Button-primary {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      border-radius: 3px;
      border: 1px solid #2020C0;
      color: #ffffff;
      display: block;
      font-size: 16px;
      font-weight: 600;
      padding: 18px;
      text-decoration: none;
    }

    .Button-secondary-wrapper {
      border-radius: 3px;
      background-color: #ffffff;
    }

    .Button-secondary {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      border-radius: 3px;
      border: 1px solid #2020C0;
      color: #2020C0;
      display: block;
      font-size: 16px;
      font-weight: 600;
      padding: 18px;
      text-decoration: none;
    }

    /* LAYOUT */

    .Content-container {
      padding-left: 60px;
      padding-right: 60px;
    }

    .Content-container--main {
      padding-top: 54px;
      padding-bottom: 60px;
    }

    .Content {
      width: 580px;
      margin: 0 auto;
    }

    .wrapper {
      max-width: 600px;
    }

    .section {
      padding: 24px 0px;
      border-bottom: 1px solid #d3d3d8;
    }

    .section--noBorder {
      padding: 24px 0px 0;
    }

    .section--last {
      padding: 24px 0px;
    }

    .message {
      background-color: #F4F4F5;
      padding: 18px;
    }

    .card {
      border: 1px solid #d3d3d8;
      padding: 18px;
    }

    /* HEADER */

    .header-tockLogoImage {
      display: block;
      color: #F0F0F0;
    }

    .header-heroImage {
      padding-bottom: 24px;
    }

    /* PREHEADER */

    .preheader {
      display: none;
      font-size: 1px;
      color: #FFFFFF;
      line-height: 1px;
      max-height: 0px;
      max-width: 0px;
      opacity: 0;
      overflow: hidden;
    }

    /* BANNER */

    .notice {
      padding: 12px;
      background: #23233E;
      color: #FFFFFF;
      display: block;
      font-size: 14px;
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 600;
    }

    /* INTRO */

    .section--intro {
      padding-bottom: 48px;
    }

    /* BOOKING INFO */

    .business-logo__container {
      width: 48px;
      height: 48px;
      border-radius: 3px;
      border: 1px solid #d3d3d8;
      overflow: hidden;
    }

    .business-logo__image {
      border: 1px solid transparent;
      border-radius: 3px;
      width: 48px;
      height: 48px;
      display: block;
    }

    .business-address--address {
      width: 50%;
    }

    .business-address--map {
      width: 50%;
    }

    .business-address--map-image {
      width: 100%;
    }

    /* MOBILE TICKETS */

    .mobile-ticket--description {
      width: 65%;
      margin-top: 12px;
      margin-right: 5%;
    }

    .mobile-ticket--code {
      width: 30%;
    }

    .mobile-ticket--code-image {
      width: 100%;
    }

    /* RESERVATION ACTIONS */

    .linksTable {
      border-bottom: 1px solid #d3d3d8;
    }

    .linksTableRow {
      padding: 24px 12px;
    }

    .actions-icon {
      vertical-align: middle;
    }

    .actions-text {
      vertical-align: middle;
    }

    /* RECEIPT */

    .receipt__container {
      border: 1px solid #d3d3d8;
      padding: 24px;
    }

    .receipt__row {
      border-top: 1px solid #d3d3d8;
    }

    /* FEEDBACK ICONS */

    .feedback-link {
      border: 1px solid #d4d5da;
      border-radius: 3px;
      display: inline-block;
      width: calc(32% - 2px);
      padding: 10px 0;
    }

    .feedback-link-bumper {
      display: inline-block;
      width: 1%;
    }

    .feedback-link img {
      height: 50px;
      width: 50px;
    }

    /* SOCIAL ICONS */

    .social-link {
      display: inline-block;
      width: auto;
    }

    .social-link-text {
      padding: 14px 24px 14px 14px;
    }

    /* TABLET STYLES */

    @media screen and (max-width: 648px) {
      /* DEVICE-SPECIFIC RESET */
      div[style*="margin: 16px 0;"] {
        margin: 0 !important;
      }
      /* ANDROID CENTER FIX */
      /* LAYOUT */
      .wrapper {
        width: 100% !important;
        max-width: 100% !important;
      }
      .Content {
        width: 90% !important;
      }
      .Content-container {
        padding-left: 36px !important;
        padding-right: 36px !important;
      }
      .Content-container--main {
        padding-top: 30px !important;
        padding-bottom: 42px !important;
      }
      .responsiveTable {
        width: 100% !important;
      }
      /* RESERVATION ACTIONS */
      .linksTableRow {
        padding-left: 0 !important;
        padding-right: 0 !important;
        padding-top: 12px !important;
        padding-bottom: 12px !important;
      }
      .linksTableRow--borderRight {
        border-right: none !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
      }
      /* FEEDBACK LINK */
      .feedback-link img {
        height: 38px !important;
        width: 38px !important;
      }
    }

    /* MOBILE STYLES */

    @media screen and (max-width: 480px) {
      /* TYPOGRAPHY */
      .h1 {
        font-size: 30px !important;
        line-height: 30px !important;
      }
      .text {
        font-size: 16px !important;
        line-height: 22px !important;
      }
      /* BUTTON */
      .mobile-buttonContainer {
        width: 100% !important;
      }
      /* LAYOUT */
      .Content {
        width: 100% !important;
      }
      .Content-container {
        padding-left: 18px !important;
        padding-right: 18px !important;
      }
      .Content-container--main {
        padding-top: 24px !important;
        padding-bottom: 30px !important;
      }
      .section {
        padding: 18px 0 !important;
      }
      .section--last {
        padding: 18px 0 !important;
      }
      .header {
        padding: 0 18px !important;
      }
      .business-address--address {
        width: 100% !important;
      }
      .business-address--map {
        margin-top: 30px !important;
        width: 100% !important;
      }
      .mobile-ticket--description {
        width: 100% !important;
        margin-top: 0px !important;
      }
      .mobile-ticket--code {
        margin-top: 30px !important;
        margin-left: 0;
        width: 100% !important;
      }
      /* RECEIPT */
      .receipt__container {
        padding: 12px !important;
      }
      /* SOCIAL ICONS */
      .social-link {
        display: block !important;
        width: 100% !important;
        border-bottom: 1px solid #d3d3d8 !important;
      }
      /* INTRO */
      .section--intro {
        padding-top: 18px !important;
        padding-bottom: 18px !important;
      }
    }
  </style>
</head>

<body style="margin: 0 !important; padding: 0 !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; height: 100%; margin: 0; padding: 0; width: 100%; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; color: rgb(79, 79, 101); -webkit-font-smoothing: antialiased; -ms-text-size-adjust: 100%; -moz-osx-font-smoothing: grayscale; font-smoothing: always; text-rendering: optimizeLegibility;">
   
  <!--[if mso]>
    <style type="text/css">
.h1 {font-family: "Helvetica", "Arial", sans-serif !important; font-weight: 700 !important; vertical-align: middle !important; font-size: 36px !important; mso-line-height-rule: exactly;line-height: 42px !important;}
.h2 {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 600 !important;vertical-align: middle !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 24px !important;}
.text {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 21px !important;}
.text-list {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 25px !important;}
.textSmall {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 14px !important;}
.text-xsmall {font-family: "Helvetica", "Arial", sans-serif !important;font-size: 11px !important;text-transform: uppercase !important;mso-line-height-rule: exactly;line-height: 22px !important;letter-spacing: 1px !important;}
.text-bold {font-weight: 600 !important;}
.text-link {text-decoration: underline !important;}
.text-linkNoUnderline {text-decoration: none !important;}
.text-strike {text-decoration: line-through !important;}
.textColorDark {color: #23233e !important;}
.textColorNormal {color: #4f4f65 !important;}
.textColorBlue {color: #2020c0 !important;}
.textColorGray {color: #A5A8AD !important;}
.textColorWhite {color: #FFFFFF !important;}
.Button-primary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #ffffff !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
.Button-secondary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #2020C0 !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
    </style>
    <![endif]-->
  <!-- HIDDEN PREHEADER TEXT -->
  <div class="preheader" style="display: none; font-size: 1px; color: rgb(255, 255, 255); line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
  </div>
  <table border="0" cellpadding="0" cellspacing="0" width="100%" class=" mainTable  " style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: rgb(240, 240, 240);">
    <tbody><tr><td style="display:none !important;
 visibility:hidden;
 mso-hide:all;
 font-size:1px;
 color:#ffffff;
 line-height:1px;
 max-height:0px;
 max-width:0px;
 opacity:0;
 overflow:hidden; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> We are thrilled that you will be joining us. If yo... </td>
    <!-- HEADER -->
    </tr><tr>
      <td align="center" class="header" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
        <!--[if (gte mso 9)|(IE)]>
    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
    <tr>
    <td align="center" valign="top" width="600">
    <![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 580px; margin: 0 auto;">
          <tbody><tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <h1 style="font-size: 33px;font-weight: 800;line-height: 30px;">Dstricts</h1>               </td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
        </tbody></table>
        <!--[if (gte mso 9)|(IE)]>
    </td>
    </tr>
    </table>
    <![endif]-->
      </td>
    </tr>
    <!-- CONTENT -->
    <tr>
      <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
        <!--[if (gte mso 9)|(IE)]>
    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
    <tr>
    <td align="center" valign="top" width="600">
    <![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content bg-white" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: white; width: 580px; margin: 0 auto;">
          <tbody><tr>
            <td class="Content-container Content-container--main text textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101); padding-left: 60px; padding-right: 60px; padding-top: 54px; padding-bottom: 60px;">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                <!-- RESTAURANT INFO -->
                <tbody><tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody><tr>
                        <td align="left" valign="center" width="48" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="business-logo__container" style="width: 48px; height: 48px; border-radius: 3px; border: 1px solid rgb(211, 211, 216); overflow: hidden;">
                            <img src="'.$rowImage['image_path'].'" class="business-logo__image" width="48" height="48" alt="Logo" style="-ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; display: block; border: 1px solid transparent; border-radius: 3px; width: 48px; height: 48px; display: block;">
                          </div>
                        </td>
                        <td width="12" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                        <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">'.$rowInfo["hotel_name"].'</span>                          </td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
                <!-- INTRO -->
                <tr>
                  <td valign="top" align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody><tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">Reservation confirmed</span>                          </td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                          <!--[if gte mso 15]>&nbsp;<![endif]-->
                        </td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
                <!-- MESSAGE -->
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="message" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
                    <div class="text textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                      <span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">A message from '.$rowInfo["hotel_name"].'</span>
                      <br>We have made a reservation for you kindly confirm the same on your Qloud ID app.</div>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                    <!--[if gte mso 15]>&nbsp;<![endif]-->
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- BOOKING INFO -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody><tr>
                        <td align="left" valign="middle" width="468" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text-list textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">
                            <span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">'.date("F j, Y, g:i a").'</span>
                            <br> Party of '.$rowInfo['guest_adult'].' for Smiles Davis 
                            <br>
From '.$rowInfo['checkin_date'].' to '.$rowInfo['checkout_date'].'
<br> Reservation × 2
                            <br>

                        &nbsp;
                      


                        &nbsp;
                      

                        
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody><tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="https://www.qloudid.com/public/index.php/BookingInformation/startVerification/'.$data['checkid'].'" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;">Confirm booking</a>                                </td>
                            </tr>
                          </tbody></table>
                        
                      
                          </div>
                        </td>
                      </tr>
                      
                      
                      <tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody>
                          </tbody></table>
                        </td>
                      </tr>
					  
					  
                      
					  
					  
					  
                    </tbody></table>
                  </td>
                </tr>
                <!-- ADDRESS -->
                <tr>
                  <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody><tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                          <!--[if gte mso 15]>&nbsp;<![endif]-->
                        </td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody><tr>
                              <td style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="230" class="business-address--address" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 50%;">
                                  <tbody><tr>
                                    <td align="left" width="100%" class="text-list textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">
                                    <span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">'.$rowInfo["hotel_name"].'</span><br>'.$rowInfo["visiting_address"].' '.$rowInfo["port_number"].'<br>'.$rowInfo["visiting_city"].' '.$rowInfo["visiting_state"].'<br> <a href="tel:+' .$rowInfo[" fdesk_country_code"].'="" '.$rowinfo["fdesk_phone_number"].'"="">+'.$rowInfo["fdesk_country_code"].' '.$rowInfo["fdesk_phone_number"].'</a><br> <br> <a href="https://www.google.com/maps/dir//'.$rowInfo['visiting_address'].' '.$rowInfo['port_number'].'/" class="text text-link textColorBlue" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; text-decoration: underline; color: rgb(32, 32, 192);" target="_blank">Get directions</a>                                      </td>
                                  </tr>
                                </tbody></table>
                                <!--[if mso]></td><td><![endif]-->
                                <table align="right" border="0" cellpadding="0" cellspacing="0" width="230" class="business-address--map" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 50%;">
                                  <tbody><tr>
                                    <td width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <a href="https://www.google.com/maps/dir//1350+W+Randolph%2C+Chicago%2C+IL%2C+US+60607/" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;"> <img width="230" class="business-address--map-image" height="auto" alt="Map of Elske" src="https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyCPd%2DxSabI7QOfKX5NxVVup6bPfcovwFiQ&amp;center=1350+W+Randolph%2C+Chicago%2C+IL%2C+US+60607&amp;size=300x200&amp;zoom=15&amp;scale=2&amp;format=png&amp;visual%5Frefresh=true&amp;markers=scale%3A2%7Cicon%3Ahttps%3A%2F%2Fstorage.googleapis.com%2Ftock%2Dpublic%2Dassets%2Fimages%2Demail%2Dtemplate%2Femail%2Dmap%2Dmarker.png%7Cshadow%3Afalse%7C1350+W+Randolph%2C+Chicago%2C+IL%2C+US+60607&amp;style=feature%3Aall%7Celement%3Alabels.text.fill%7Ccolor%3A0x4b505b&amp;style=feature%3Aall%7Celement%3Alabels.text.stroke%7Ccolor%3A0xffffff%7Cvisibility%3Aon&amp;style=feature%3Aadministrative.land%5Fparcel%7Celement%3Aall%7Cvisibility%3Aoff&amp;style=feature%3Alandscape.man%5Fmade%7Celement%3Aall%7Cvisibility%3Aon&amp;style=feature%3Alandscape.man%5Fmade%7Celement%3Ageometry.fill%7Ccolor%3A0xe9e9eb&amp;style=feature%3Apoi%7Celement%3Aall%7Cvisibility%3Aoff&amp;style=feature%3Aroad%7Celement%3Ageometry.fill%7Ccolor%3A0xffffff&amp;style=feature%3Aroad%7Celement%3Alabels.text.fill%7Ccolor%3A0x787c84&amp;style=feature%3Aroad%7Celement%3Alabels.icon%7Cvisibility%3Aoff&amp;style=feature%3Aroad.highway%7Celement%3Ageometry.fill%7Ccolor%3A0xffbe32&amp;style=feature%3Aroad.highway%7Celement%3Ageometry.stroke%7Ccolor%3A0xffbe32&amp;style=feature%3Atransit%7Celement%3Alabels.text.fill%7Cvisibility%3Aon%7Ccolor%3A0x787c84&amp;style=feature%3Atransit.line%7Celement%3Ageometry.fill%7Ccolor%3A0xd2d4d6&amp;signature=3yCSyIXfsSilvB5wcd4OElw40QU=" style="-ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; display: block; width: 100%;"> </a>                                      </td>
                                  </tr>
                                </tbody></table>
                              </td>
                            </tr>
                          </tbody></table>
                        </td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                    <!--[if gte mso 15]>&nbsp;<![endif]-->
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- RECEIPT -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" width="100%" cellpadding="0" cellspacing="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody><tr>
                        <td class="receipt__container" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border: 1px solid rgb(211, 211, 216); padding: 24px;">
                          <table border="0" width="100%" cellpadding="0" cellspacing="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody><tr>
                              <td width="80%" class="textAlignLeft" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; text-align: left;">
                                <div class="text-list textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">
                                  Reservation × 2 (Deposit)
                                </div>
                                <div class="textColorGrayDark textSmall" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">
                                  Your deposit secures your booking and will be applied to your final bill.
                                </div>
                              </td>
                              <td width="20%" align="right" class="textAlignRight" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; text-align: right;">
                                <div class="text-list textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">
                                  $'.($rowInfo['price']*$rowInfo['total_days']).'.00
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2" style="height: 12px; line-height: 12px; max-height: 12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"></td>
                            </tr>
                          </tbody></table>
                          <table border="0" width="100%" cellpadding="0" cellspacing="0" class="receipt__row" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-top: 1px solid rgb(211, 211, 216);">
                            <tbody><tr>
                              <td colspan="2" style="height: 12px; line-height: 12px; max-height: 12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"></td>
                            </tr>
                            <tr>
                              <td width="80%" class="textAlignLeft" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; text-align: left;">
                                <div class="text-list textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">
                                  Subtotal
                                </div>
                              </td>
                              <td width="20%" align="right" class="textAlignRight" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; text-align: right;">
                                <div class="text-list textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">
                                  $'.($rowInfo['price']*$rowInfo['total_days']).'.00
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2" style="height: 12px; line-height: 12px; max-height: 12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"></td>
                            </tr>
                          </tbody></table>
                          <table border="0" width="100%" cellpadding="0" cellspacing="0" class="receipt__row" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-top: 1px solid rgb(211, 211, 216);">
                            <tbody><tr>
                              <td colspan="2" style="height: 12px; line-height: 12px; max-height: 12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"></td>
                            </tr>
                            <tr>
                              <td width="80%" class="textAlignLeft" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; text-align: left;">
                                <div class="text-list text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; font-weight: 600; color: rgb(35, 35, 62);">
                                  Total
                                </div>
                              </td>
                              <td width="20%" align="right" class="textAlignRight" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; text-align: right;">
                                <div class="text-list text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; font-weight: 600; color: rgb(35, 35, 62);">
                                  $'.($rowInfo['price']*$rowInfo['total_days']).'.00
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2" style="height: 12px; line-height: 12px; max-height: 12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"></td>
                            </tr>
                            <tr style="padding: 10px">
                              <td colspan="2" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                                <table border="0" width="100%" cellpadding="0px" cellspacing="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                                  <tbody><tr>
                                    <td class="message" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
                                      <table border="0" width="100%" cellpadding="0px" cellspacing="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                                        <tbody><tr>
                                          <td colspan="2" padding="0px" class="textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; color: rgb(79, 79, 101);"> Paid with Visa **** 6555 (4/12/19) </td>
                                        </tr>
                                        <tr class="spacer">
                                          <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td class="textSmall textColorGrayDark" colspan="2" padding="0px" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">
                                          On your statement, this charge will appear as<br> "Tock at*Elske" </td>
                                        </tr>
                                      </tbody></table>
                                    </td>
                                  </tr>
                                </tbody></table>
                              </td>
                            </tr>
                          </tbody></table>
                        </td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- EDIT RECEIPT -->
                <!-- CANCELLATION POLICY -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody><tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; font-weight: 600; color: rgb(35, 35, 62);">
                            Cancellation policy
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                            <span>Your reservation can be canceled for a full refund 24 hours prior to the reservation time. </span>
                            <span>You can always transfer your reservation to another person.</span>
                          </div>
                        </td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- QUESTIONS -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody><tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; font-weight: 600; color: rgb(35, 35, 62);">
                            Questions?
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                            If you have questions about your reservation, contact us at&nbsp;
                            <a href="mailto:'.$rowInfo['fdesk_email'].'">'.$rowInfo["fdesk_email"].'</a>                            or by calling
                            <a href="tel:+'.$rowInfo[" fdesk_country_code"].'="" '.$rowinfo["fdesk_phone_number"].'"="">+'.$rowInfo["fdesk_country_code"].' '.$rowInfo["fdesk_phone_number"].'</a>.
                          </div>
                        </td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
              </tbody></table>
            </td>
          </tr>
        </tbody></table>
      </td>
    </tr>
    <!-- FOOTER -->
    <tr>
      <td align="center" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; width: 580px; margin: 0 auto;">
        <!-- Will most likely required a feature flag -->
        <!--[if (gte mso 9)|(IE)]>
<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
<tr>
<td align="center" valign="top" width="600">
<![endif]-->
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="Content-container" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
          <tbody><tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <a href="https://www.exploretock.com" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;"> <img src="https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png" width="30" height="30" alt="Tock" border="0" style="-ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; display: block;"> </a>              </td>
          </tr>
          <tr class="spacer">
            <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
              <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                © 2019 Tock, Inc.
              </div>
              <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                All Rights Reserved
              </div>
            </td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
        </tbody></table>
        <!--[if (gte mso 9)|(IE)]>
</td>
</tr>

  
			
</table>
<![endif]-->
      </td>
    </tr>
  </tbody></table>



</body></html>';
			sendEmail($subject, $to, $emailContent);
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		 
 
}