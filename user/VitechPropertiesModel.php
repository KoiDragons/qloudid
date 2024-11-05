<?php
require_once('../AppModel.php');
class VitechPropertiesModel extends AppModel
{
	
		function updateOwnerDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select user_logins.id,first_name,last_name,ssn,country_of_residence,email,sex,dob_day,dob_month,dob_year,country_phone,phone_number, address,user_profiles.city,user_profiles.country,user_profiles.zipcode,grading_status from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where user_logins.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$stmt = $dbCon->prepare("update vitech_property_broker_request set owner_id=? where property_id=(select id from vitech_properties where owner_email=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $data['user_id'],$row['email']);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function rejectExclusiveRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			$stmt = $dbCon->prepare("select * from vitech_property_broker_request  where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update vitech_property_broker_request set contract_type_info=1,contract_start_date='',contract_end_date='' where  id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		
		function approveExclusiveRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			
			$stmt = $dbCon->prepare("select * from vitech_property_broker_request  where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowRequest = $result->fetch_assoc();
			$property_id=$rowRequest['property_id'];
			
			$stmt = $dbCon->prepare("select user_logins.id,first_name,last_name,ssn,country_of_residence,email,sex,dob_day,dob_month,dob_year,country_phone,phone_number, address,user_profiles.city,user_profiles.country,user_profiles.zipcode,grading_status from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where user_logins.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$data['user_id']=$row['id'];
			$full_name=$row['first_name'].' '.$row['last_name'];	
			
			$stmt = $dbCon->prepare("select * from vitech_properties  where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("s",$rowRequest['property_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['property_id']=$row['id'];
			
			if($row['owner_property_id']!=null && $row['owner_property_id']>0)
			{
			$stmt = $dbCon->prepare("update vitech_property_broker_request set is_approved=1 where  id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();	
			
			
			$stmt = $dbCon->prepare("select * from vitech_property_broker_request  where service_id=? and property_id=? and ((contract_start_date BETWEEN ? AND ?) or (contract_end_date BETWEEN ? AND ?)) and id!=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("isiiiii",$rowRequest['service_id'],$rowRequest['property_id'],$rowRequest['contract_start_date'],$rowRequest['contract_end_date'],$rowRequest['contract_start_date'],$rowRequest['contract_end_date'],$request_id);
			$stmt->execute();
			$resultTest = $stmt->get_result();
			while($rowTest = $resultTest->fetch_assoc())
			{
				$stmt = $dbCon->prepare("update vitech_property_broker_request set contract_type_info=1,contract_start_date='',contract_end_date='' where  id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",$rowTest['id']);
			$stmt->execute();
			}
			 
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			else
			{
			$stmt = $dbCon->prepare("select * from user_address  where address=? and port_number=? and apartment_number=? and user_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("sssi",$row['streetAddress'],$row['areaName'],$row['apartment_number'],$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCount = $result->fetch_assoc();
			
			if(!empty($rowCount))
			{
			$stmt = $dbCon->prepare("update vitech_properties set owner_property_id=? where  id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ss",$rowCount['id'], $property_id);
			$stmt->execute();
				
			$stmt = $dbCon->prepare("update vitech_property_broker_request set is_approved=1 where  id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("select * from vitech_property_broker_request  where service_id=? and property_id=? and ((contract_start_date BETWEEN ? AND ?) or (contract_end_date BETWEEN ? AND ?)) and id!=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("isiiiii",$rowRequest['service_id'],$rowRequest['property_id'],$rowRequest['contract_start_date'],$rowRequest['contract_end_date'],$rowRequest['contract_start_date'],$rowRequest['contract_end_date'],$request_id);
			$stmt->execute();
			$resultTest = $stmt->get_result();
			while($rowTest = $resultTest->fetch_assoc())
			{
				$stmt = $dbCon->prepare("update vitech_property_broker_request set contract_type_info=1,contract_start_date='',contract_end_date='' where  id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",$rowTest['id']);
			$stmt->execute();
			}
			
			$stmt->close();
			$dbCon->close();
			return 1;
				
			}
			else
			{
				
			$stmt = $dbCon->prepare("select * from vitech_property_address  where company_id=? and property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("is", $row['company_id'],$row['property_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAddress = $result->fetch_assoc();
			
			$st=0;
			$same_invoice=1;
			$entry_code='';
			$stmt = $dbCon->prepare("insert into  user_address (apartment_number,`address`  , `city`  , `zipcode` , `port_number` , `invoice_address`  , `invoice_city`  , `invoice_zipcode`  , `invoice_port_number`  , `is_name_same` , `is_invoice_same`  , `name_on_house`  ,entry_code , user_id, created_on, is_personal_address,vitech_city,vitech_area) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,now(),?,?,?)");
				/* bind parameters for markers */
			$stmt->bind_param("sssssssssiissiiii",$row['apartment_number'],$rowAddress['streetAddress'],$rowAddress['city'], $rowAddress['zipCode'],$rowAddress['areaId'],$rowAddress['streetAddress'],$rowAddress['city'],$rowAddress['zipCode'],$rowAddress['areaId'],$same_invoice,$same_invoice,$full_name,$entry_code,$data['user_id'],$st,$rowAddress['vitech_city_id'],$rowAddress['vitech_area_id']);
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
				
			
			$stmt = $dbCon->prepare("update vitech_property_broker_request set is_approved=1 where  id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("select * from vitech_property_broker_request  where service_id=? and property_id=? and ((contract_start_date BETWEEN ? AND ?) or (contract_end_date BETWEEN ? AND ?)) and id!=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("isiiiii",$rowRequest['service_id'],$rowRequest['property_id'],$rowRequest['contract_start_date'],$rowRequest['contract_end_date'],$rowRequest['contract_start_date'],$rowRequest['contract_end_date'],$request_id);
			$stmt->execute();
			$resultTest = $stmt->get_result();
			while($rowTest = $resultTest->fetch_assoc())
			{
				$stmt = $dbCon->prepare("update vitech_property_broker_request set contract_type_info=1,contract_start_date='',contract_end_date='' where  id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",$rowTest['id']);
			$stmt->execute();
			}
			
			$stmt->close();
			$dbCon->close();
			return $id;
			}
			}
			
			
		
		}
		
	
	
	 function urlDetail($data)
		{
			 
			return $this -> encrypt_decrypt('encrypt',$data['REQUEST_URI']); 
			 
			 
		}
		
		function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
			}
		
		function listPropertyRequest($data)
		{
		$dbCon = AppModel::createConnection();
         
			$stmt = $dbCon->prepare("select * from vitech_property_broker_request where owner_id=? and is_approved=0 and contract_type_info=1");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			 
			$stmt->execute();
			$resultOwner = $stmt->get_result();
			 $org=array();
			while($rowOwner = $resultOwner->fetch_assoc())
			{
			 
			$stmt = $dbCon->prepare("select company_name from companies where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $rowOwner['company_id']);
			$stmt->execute();
			$resultCompany = $stmt->get_result();
			$rowCompany = $resultCompany->fetch_assoc();
			
			$stmt = $dbCon->prepare("select first_name from user_logins where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $rowOwner['broker_id']);
			$stmt->execute();
			$resultUser = $stmt->get_result();
			$rowUser = $resultUser->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select owner_email,vitech_properties.company_id,type_of_contract,owner_sell_price,sellPhrase,longSellingDescription,property_status,is_activated,vitech_city_id,id,objectNumber,vitech_property_plot.area,startingPrice,numberOfBedrooms,numberOfBathrooms from vitech_properties left join vitech_property_description on vitech_property_description.property_id=vitech_properties.id and vitech_property_description.company_id=vitech_properties.company_id  left join vitech_property_interior on vitech_property_interior.property_id=vitech_properties.id and vitech_property_interior.company_id=vitech_properties.company_id left join vitech_property_address on vitech_property_address.property_id=vitech_properties.id  and vitech_property_address.company_id=vitech_properties.company_id left join vitech_property_plot on vitech_property_plot.property_id=vitech_properties.id  and vitech_property_plot.company_id=vitech_properties.company_id where vitech_properties.id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("s", $rowOwner['property_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			$row = $result->fetch_assoc();
			
			$row['request_id']=$this->encrypt_decrypt('encrypt',$rowOwner['id']); 
			$row['company_name']=$rowCompany['company_name'];
			$row['first_name']=$rowUser['first_name'];
			
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
			
			$row['photo_info']=	'../../'.$image;
			$row['contract_start_date']=$rowOwner['contract_start_date'];
			$row['contract_end_date']=$rowOwner['contract_end_date'];	
			$row['request_type']=$rowOwner['request_type'];	
				$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			
		
		}
		$stmt->close();
        $dbCon->close();
        return $org;
	}	
 
 
}