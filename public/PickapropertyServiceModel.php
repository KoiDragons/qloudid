<?php
	require_once('../AppModel.php');
	class PickapropertyServiceModel extends AppModel
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
		
		function suportedLanguagesList()
		{ 
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select *  from language_list");
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
		
	  
		function createUser($data)
		{
			$dbCon = AppModel::createConnection();
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
			$data['random_hash'] = substr(md5(uniqid(rand(), true)), 16, 16);
			$stmt = $dbCon->prepare("INSERT INTO user_logins (first_name,last_name,registered_from,get_started_wizard_status,email,  email_verification_code , created_on , modified_on, country_of_residence,verification_status,added_on_place) VALUES (?, ?, ?, ?,   ?, ?, now(), now(), ?, ?,?)");
			$stmt->bind_param("ssiissiii", $data['first_name'], $data['last_name'],$st,$st,$data['email'], $data['random_hash'], $data['pcountry'],$rf,$added_on_place);
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
	
		function addShortTermRentPropertyRequirement($data)
		{
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$subcatg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$area_id=$this->encrypt_decrypt('decrypt',$data['area_id']);
			$data=array();
			$data['user_id']=$this->createUser($_POST);
			$data['email']=$_POST['email'];
			$start_date=strtotime($_POST['start_date']);
			$end_date=strtotime($_POST['end_date']);
			$request_type=0;
			$stmt = $dbCon->prepare("insert into `user_professional_service_request`(domain_id, `category_id` , `subcategory_id` ,`property_type_detail` ,`guest_adult`, `guest_children` , `guest_infant` ,pets_available,language_support,start_date,end_date,arrival_time,vtech_city,vitech_area,budget_level, `user_id` , `pcountry` , `p_number` , `conatct_preffered_on` , `created_on`,property_info_required) VALUES (?,?, ?,?,?, ?,?,?, ?,?,   ?, ?,?, ?, ?, ?,   ?, ?,?, now(),?)");
			$stmt->bind_param("iiiiiiiissssiiiiisii",$domain_id, $catg_id,$subcatg_id,$_POST['property_type_detail'],$_POST['adults_guest'],$_POST['children_guest'],$_POST['infant_guest'],$_POST['furniture_info_detail'],$_POST['inclusion_type_detail'],$start_date,$end_date,$_POST['arrival_time'],$_POST['vcity'],$_POST['varea'],$_POST['comfort_level'],$data['user_id'],$_POST['pcountry'],$_POST['p_number'],$_POST['conatct_preffered_on'],$request_type);
			$stmt->execute();
			$id=$stmt->insert_id;
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
	
	 
	}		