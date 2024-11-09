<?php
	
	require_once('../AppModel.php');
	class LandloardModel extends AppModel
	{
		function bankAccountList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from company_bank_account_detail where company_id=?");
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
		
		
		function apartmentUpdateList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$stmt = $dbCon->prepare("select apartment_completed,buildingid,floor_id,listed_on_exchange,floor_number,terrace_available,terrace_area,balcony_available,balcony_area,office_apartment_number,landloard_building_port_floors_offices.id,short_selling_description,apartment_size,sale_price,bathroom_count,bedroom_count,orientation from landloard_building_port_floors_offices left join landloard_apartment_description on landloard_apartment_description.apartment_id=landloard_building_port_floors_offices.id left join landloard_apartment_exterior on landloard_apartment_exterior.apartment_id=landloard_building_port_floors_offices.id left join landloard_building_port_floors on landloard_building_port_floors.id=landloard_building_port_floors_offices.floor_id left join landloard_building_ports on landloard_building_ports.id=landloard_building_port_floors.port_id where floor_id in(select id from landloard_building_port_floors where port_id in(select id from landloard_building_ports where buildingid=?)) and is_published=0");
			$stmt->bind_param("i", $building_id); 
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$row['buildingid']= $this -> encrypt_decrypt('encrypt',$row['buildingid']);
				$row['floor_id']= $this -> encrypt_decrypt('encrypt',$row['floor_id']);
				$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				
				$stmt = $dbCon->prepare("select * from landloard_object_photos where object_id=? and sorting_number=1");
							/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$resultApartment = $stmt->get_result();
				$rowPic = $resultApartment->fetch_assoc();
				if(empty($rowPic))
				{
				$row['imageId']='../../../../../html/usercontent/images/notavailable.jpg';	
				}
				else
				$row['imageId']='../../../../../estorecss/tmp'.$rowPic['apartment_photo_path'].'.jpg';
				array_push($org,$row);
			}
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		 
		function objectDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$aid= $this -> encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select *  from landloard_building_port_floors_offices  where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select count(id) as num from landloard_object_photos where object_id=? and sorting_number=1");
							/* bind parameters for markers */
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$resultApartment = $stmt->get_result();
			$rowPic = $resultApartment->fetch_assoc(); 
			
			$rowAvailable['num']=$rowPic['num'];
			
			$stmt->close();
			$dbCon->close();
			return $rowAvailable;
			
			
		}
		
		function buildingReservationPriceInfo($data)
			{
				$dbCon = AppModel::createConnection();
				$bid=$this->encrypt_decrypt('decrypt',$data['bid']);
				
					$stmt = $dbCon->prepare("select * from landloard_building_reservation_fee where building_id=? order by id desc");
					/* bind parameters for markers */
					$stmt->bind_param("i", $bid);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$org=array();
					while($row = $resultApartment->fetch_assoc())
					{
						array_push($org,$row);
					}
					
					 
				$stmt->close();
				$dbCon->close();
				return $org;
			}
		
		 function addReservationPriceInformation($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']); 
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("update landloard_building_reservation_fee set is_active=0 where company_id=? and building_id=?");
			$stmt->bind_param("ii",$company_id,$building_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("insert into landloard_building_reservation_fee ( `company_id`  , `building_id`  , `random_reservation_fee`   , `total_weeks`   , `reservation_price_pay_back`   , `possetion_time_fee`   , `total_installment_allowed`   , `resale_allowed`   , `resale_after_installments`   , `broker_fee_payment`   , `discount_allowed`   , `total_discount`   , `created_on` ) values (?, ?,?,?, ?,?, ?,?, ?, ?,?, ?, now())");
			$stmt->bind_param("iiiiiiiiiiii",$company_id,$building_id,$_POST['random_reservation_fee'],$_POST['total_weeks'],$_POST['reservation_price_pay_back'], $_POST['possetion_time_fee'],$_POST['total_installment_allowed'],$_POST['resale_allowed'],$_POST['resale_after_installments'],$_POST['broker_fee_payment'],$_POST['discount_allowed'],$_POST['total_discount']);
			$stmt->execute();	
			$id=$stmt->insert_id;			
			for($i=1;$i<=$_POST['total_installment_allowed'];$i++)
			{
			$intallment='installment'.$i;
			$stmt = $dbCon->prepare("insert into landloard_building_reservation_installments ( `reservation_price_id`  , `installment_fee`  , `created_on` ) values (?, ?, now())");
			$stmt->bind_param("ii",$id,$_POST[$intallment]);
			$stmt->execute();
			}
			
			$stmt->close();
			$dbCon->close();
			return 1;
				
		}
		
		 
		
		function updateUnrefineApartment($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $_POST['floor_number'];  
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']); 
			$apartment_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
			 $is_office=0;
			$stmt = $dbCon->prepare("select * from landloard_building_unrefined_offices  where id=?");
			$stmt->bind_param("i", $apartment_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$apartmentInfo = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_port_floors_offices  where floor_id=? and is_office=0");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$num=$rowAvailable['num']+1; 
			$apartment_tenant=htmlentities($_POST['apartment_tenant'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into landloard_building_port_floors_offices (sale_price, price_m2, orientation, floor_id, office_apartment_number,tenant_name,apartment_size,private_door_info,elevator_info,created_on) values (?, ?,?,?, ?,?, ?,?, ?, now())");
			$stmt->bind_param("idiiisiii",$_POST['apartment_price'],$_POST['apartment_price_m2'],$_POST['apartment_orientation'], $company_id,$_POST['apartment_number'],$apartment_tenant,$_POST['apartment_size'],$_POST['private_door_info'],$_POST['elevator_info']);
			$stmt->execute();	
						
			$stmt = $dbCon->prepare("update landloard_building_port_floors set total_apartment=? where id=?");
			$stmt->bind_param("ii",$num, $company_id);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("delete from landloard_building_unrefined_offices where apartment_number=? and building_id=?");
			$stmt->bind_param("si",$apartmentInfo['apartment_number'],$building_id);
			$stmt->execute();	
			
			$stmt->close();
			$dbCon->close();
			return 1;
				
		}
		
		
		function urlDetail($data)
		{
			 
			return $this -> encrypt_decrypt('encrypt',$data['REQUEST_URI']); 
			 
			 
		}
		function getLandloardApartmentPropertyList($data)
			{
				$dbCon = AppModel::createConnection();
				$bid=$this->encrypt_decrypt('decrypt',$data['bid']);
				
					$stmt = $dbCon->prepare("select apartment_size,sale_price,bathroom_count,bedroom_count,orientation from landloard_building_port_floors_offices where floor_id in(select id from landloard_building_port_floors where port_id in(select id from landloard_building_ports where buildingid=?)) and is_published=1 group by bedroom_count");
					/* bind parameters for markers */
					$stmt->bind_param("i", $bid);
					$stmt->execute();
					$resultApartmentType = $stmt->get_result();
					$org=array();
					$j=0;
					while($rowApartmentType = $resultApartmentType->fetch_assoc())
					{
						array_push($org,$rowApartmentType);
						$org[$j]['apartment_details']=array();
						$stmt = $dbCon->prepare("select floor_number,terrace_available,terrace_area,balcony_available,balcony_area,office_apartment_number,landloard_building_port_floors_offices.id,short_selling_description,apartment_size,sale_price,bathroom_count,bedroom_count,orientation from landloard_building_port_floors_offices left join landloard_apartment_description on landloard_apartment_description.apartment_id=landloard_building_port_floors_offices.id left join landloard_apartment_exterior on landloard_apartment_exterior.apartment_id=landloard_building_port_floors_offices.id left join landloard_building_port_floors on landloard_building_port_floors.id=landloard_building_port_floors_offices.floor_id where floor_id in(select id from landloard_building_port_floors where port_id in(select id from landloard_building_ports where buildingid=?)) and is_published=1 and bedroom_count=?");
						/* bind parameters for markers */
						$stmt->bind_param("ii", $bid,$rowApartmentType['bedroom_count']);
						$stmt->execute();
						$resultApartmentDetail = $stmt->get_result();
						while($rowApartmentDetails = $resultApartmentDetail->fetch_assoc())
						{
							
							$stmt = $dbCon->prepare("select count(id) as num from landloard_apartment_reservation_information where apartment_id=? and is_reserved=1");
							/* bind parameters for markers */
							$stmt->bind_param("i", $rowApartmentDetails['id']);
							$stmt->execute();
							$resultApartment = $stmt->get_result();
							$row = $resultApartment->fetch_assoc();
							
							if($row['num']>0)
								continue;
							$rowApartmentDetails['is_reserved']=$row['num'];
							 
							$stmt = $dbCon->prepare("select * from landloard_object_photos where object_id=? and sorting_number=1");
							/* bind parameters for markers */
							$stmt->bind_param("i", $rowApartmentDetails['id']);
							$stmt->execute();
							$resultApartment = $stmt->get_result();
							$rowPic = $resultApartment->fetch_assoc();
							$rowApartmentDetails['imageId']=$rowPic['apartment_photo_path'];
							
							$rowApartmentDetails['enc']=$this->encrypt_decrypt('encrypt',$rowApartmentDetails['id']);
							array_push($org[$j]['apartment_details'],$rowApartmentDetails);
						}
						$j++;
					}
				
				$stmt->close();
				$dbCon->close();
				return $org;
			}
		
		function getLandloardApartmentReservedPropertyList($data)
			{
				$dbCon = AppModel::createConnection();
				$bid=$this->encrypt_decrypt('decrypt',$data['bid']);
				
					$stmt = $dbCon->prepare("select apartment_size,sale_price,bathroom_count,bedroom_count,orientation from landloard_building_port_floors_offices where floor_id in(select id from landloard_building_port_floors where port_id in(select id from landloard_building_ports where buildingid=?)) and is_published=1 group by bedroom_count");
					/* bind parameters for markers */
					$stmt->bind_param("i", $bid);
					$stmt->execute();
					$resultApartmentType = $stmt->get_result();
					$org=array();
					$j=0;
					while($rowApartmentType = $resultApartmentType->fetch_assoc())
					{
						array_push($org,$rowApartmentType);
						$org[$j]['apartment_details']=array();
						$stmt = $dbCon->prepare("select floor_number,terrace_available,terrace_area,balcony_available,balcony_area,office_apartment_number,landloard_building_port_floors_offices.id,short_selling_description,apartment_size,sale_price,bathroom_count,bedroom_count,orientation from landloard_building_port_floors_offices left join landloard_apartment_description on landloard_apartment_description.apartment_id=landloard_building_port_floors_offices.id left join landloard_apartment_exterior on landloard_apartment_exterior.apartment_id=landloard_building_port_floors_offices.id left join landloard_building_port_floors on landloard_building_port_floors.id=landloard_building_port_floors_offices.floor_id where floor_id in(select id from landloard_building_port_floors where port_id in(select id from landloard_building_ports where buildingid=?)) and is_published=1 and bedroom_count=?");
						/* bind parameters for markers */
						$stmt->bind_param("ii", $bid,$rowApartmentType['bedroom_count']);
						$stmt->execute();
						$resultApartmentDetail = $stmt->get_result();
						while($rowApartmentDetails = $resultApartmentDetail->fetch_assoc())
						{
							
							$stmt = $dbCon->prepare("select count(id) as num from landloard_apartment_reservation_information where apartment_id=? and is_reserved=1");
							/* bind parameters for markers */
							$stmt->bind_param("i", $rowApartmentDetails['id']);
							$stmt->execute();
							$resultApartment = $stmt->get_result();
							$row = $resultApartment->fetch_assoc();
							
							if($row['num']==0)
								continue;
							$rowApartmentDetails['is_reserved']=$row['num'];
							 
							$stmt = $dbCon->prepare("select * from landloard_object_photos where object_id=? and sorting_number=1");
							/* bind parameters for markers */
							$stmt->bind_param("i", $rowApartmentDetails['id']);
							$stmt->execute();
							$resultApartment = $stmt->get_result();
							$rowPic = $resultApartment->fetch_assoc();
							$rowApartmentDetails['imageId']=$rowPic['apartment_photo_path'];
							
							$rowApartmentDetails['enc']=$this->encrypt_decrypt('encrypt',$rowApartmentDetails['id']);
							array_push($org[$j]['apartment_details'],$rowApartmentDetails);
						}
						$j++;
					}
				
				$stmt->close();
				$dbCon->close();
				return $org;
			}
		
		function updateReservationApartment($data)
			{
				$dbCon = AppModel::createConnection();
				$bid=$this->encrypt_decrypt('decrypt',$data['bid']);
				$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
				$apartment_id=$this->encrypt_decrypt('decrypt',$data['aid']);
				$payment_date=strtotime($_POST['payment_date']);
				$stmt = $dbCon->prepare("insert into landloard_apartment_reservation_information (apartment_id,building_id,company_id,reservation_date,paid_method,total_amount,created_on) values(?,?,?,?,?,?,now())");
					/* bind parameters for markers */
				$stmt->bind_param("iiisii", $apartment_id,$bid,$company_id,$payment_date,$_POST['payment_mode'],$_POST['total_payment']);
				$stmt->execute();
					  
				$stmt->close();
				$dbCon->close();
				return 1;
			}
		
		
		
		function getLandloardBuildingDetails($data)
			{
				$dbCon = AppModel::createConnection();
				$bid=$this->encrypt_decrypt('decrypt',$data['bid']);
				
					$stmt = $dbCon->prepare("select * from landloard_buildings where id=?");
					/* bind parameters for markers */
					$stmt->bind_param("i", $bid);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$row = $resultApartment->fetch_assoc();
					
					 
				$stmt->close();
				$dbCon->close();
				return $row;
			}
		
		function getLandloardBuildingImages($data)
			{
				$dbCon = AppModel::createConnection();
				$bid=$this->encrypt_decrypt('decrypt',$data['bid']);
				
					$stmt = $dbCon->prepare("select * from landloard_building_photos where building_id=? order by sorting_number");
					/* bind parameters for markers */
					$stmt->bind_param("i", $bid);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$org=array();
					
					while($row = $resultApartment->fetch_assoc())
					{
					array_push($org,$row);	
					}
					
					 
				$stmt->close();
				$dbCon->close();
				return $org;
			}
		
		function approveApartmentRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from user_tenants where verification_code=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['code_detail']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from user_apartment_other_room_detail  where apartment_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_property_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowOther = $result->fetch_assoc();
			
			$data['user_aprtment_id']=$row['user_property_id'];
			
			$stmt = $dbCon->prepare("select first_name,last_name,ssn,country_of_residence,email,sex,dob_day,dob_month,dob_year,country_phone,phone_number, address,user_profiles.city,user_profiles.country,user_profiles.zipcode,grading_status,address,port_number,invoice_zipcode,invoice_city,identity_number,issue_month,issue_year,expiry_month,expiry_year,front_image_path,back_image_path from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id left join user_identification on user_identification.user_id=user_logins.id  where user_logins.id=(select user_id from user_address where id=?)");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_property_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUser = $result->fetch_assoc();
			$full_name=$rowUser['first_name'].' '.$rowUser['last_name'];
			
			$stmt = $dbCon->prepare("select id,first_name,last_name  from landloard_building_tenant where building_id=? and tenant_email=?");
			$stmt->bind_param("is", $_POST['building_id'],$rowUser['email']);
			$stmt->execute();
			$result = $stmt->get_result();	
			$rowTenant = $result->fetch_assoc();
			if(empty($rowTenant))
			{
				$im=date('m');
				$iy=date('Y');
				$iddate=date('d');
				$stmt = $dbCon->prepare("select invoice_date from landloard_building_rent_price_info where id=?");
				$stmt->bind_param("i", $_POST['tenant_rent_info']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowInvoice = $result->fetch_assoc();
				if($iddate>=$rowInvoice['invoice_date'])
				{
				$im=$im+1;	
				} 
				$_POST['tenant_type']=1;
				$idate=strtotime($iy.'-'.$im.'-'.$rowInvoice['invoice_date']);
				$stmt = $dbCon->prepare("insert into landloard_building_tenant (invoice_date,tenant_rent_info,tenant_type,building_id , company_id , first_name  , last_name  , tenant_email  , mobile_country , mobile_number  , fixed_phone_country , landline_number  , street_address  , port_number  , zipcode  , city  , country_of_residence , nationality , passport_number  , issue_month , issue_year , expiry_month , expiry_year , passport_front_image  , passport_back_image  , created_on) values (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, now())");
				$stmt->bind_param("siiiisssisisssssiisiiiiss",$idate,$_POST['tenant_rent_info'],$_POST['tenant_type'], $_POST['building_id'],$company_id,$rowUser['first_name'],$rowUser['last_name'],$rowUser['email'],$rowUser['country_of_residence'],$rowUser['phone_number'],$rowUser['country_of_residence'],$rowUser['phone_number'],$rowUser['address'],$rowUser['port_number'],$rowUser['invoice_zipcode'],$rowUser['city'],$rowUser['country'],$rowUser['country_of_residence'],$rowUser['identity_number'],$rowUser['issue_month'],$rowUser['issue_year'],$rowUser['expiry_month'],$rowUser['expiry_year'],$rowUser['front_image_path'],$rowUser['back_image_path']);
				$stmt->execute();	
				$t_id=$stmt->insert_id;
				$tenant_id=$t_id.',';
			}
			else
			{
				$t_id=$rowTenant['id'];
				$tenant_id=$rowTenant['id'].',';
			}
			$stmt = $dbCon->prepare("select * from user_address where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_property_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowApartment = $result->fetch_assoc();
			
			if($_POST['apartment_available']==0)
			{
			$apartment_orientation=$_POST['apartment_orientation'];
			$apartment_tenant=$rowUser['first_name'].' '.$rowUser['last_name'];;
			$stmt = $dbCon->prepare("insert into landloard_building_port_floors_offices (sale_price, price_m2, orientation, floor_id, office_apartment_number,tenant_name,apartment_size,private_door_info,elevator_info,created_on,teanat_details) values (?, ?,?,?, ?,?, ?,?, ?, now(),?)");
			$stmt->bind_param("idiiisiiii",$rowApartment['sale_price'],$rowApartment['sale_price_per_m'],$apartment_orientation, $row['floor_id'],$_POST['apartment_number'],$apartment_tenant,$rowApartment['property_layout'],$rowApartment['private_entrance'],$rowApartment['elevator'],$tenant_id);
			$stmt->execute();	
			$id=$stmt->insert_id;
			 
			$is_app=1;
			$stmt = $dbCon->prepare("update user_tenants set property_id=?,is_approved=1, company_id=?,tenant_id=? where id=?");
			$stmt->bind_param("iiii",$id,$company_id,$t_id,$row['id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update  user_address set floor_id=?,apartment_id=?,building_id=?, `port_number`=? where id=?");
				/* bind parameters for markers */
			$stmt->bind_param("iiiii",$_POST['floor_id'],$id,$_POST['building_id'],$_POST['port_id'],$row['user_property_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select * from user_apartment_bedrooms where user_address_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_property_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$bedroomCount=0;
			while($rowBed = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into  landloard_building_port_floors_offices_bedrooms (apartment_id ,created_on) values(?,now())");
				/* bind parameters for markers */
			$stmt->bind_param("i",$id);
			$stmt->execute();	
			$bedroomCount++;
			}
			
			
			$stmt = $dbCon->prepare("select * from user_apartment_bathroom_detail  where user_address_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_property_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$bathroomCount=0;
			while($rowBed = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into  landloard_apartment_bathroom_detail (apartment_id,toilet_and_sink  , bath , shower  , standalone_shower  , over_bath_shower , is_private  , is_wheelchair_accessible , is_ensuit , created_on  , modified_on  ) values(?,?,?,?,?,?,?,?,?,now(),now())");
				/* bind parameters for markers */
			$stmt->bind_param("iiiiiiiii",$id,$rowBed['toilet_and_sink'],$rowBed['bath'],$rowBed['shower'],$rowBed['standalone_shower'],$rowBed['over_bath_shower'],$rowBed['is_private'],$rowBed['is_wheelchair_accessible'],$rowBed['is_ensuit']);
			$stmt->execute();
			$bathroomCount++;			
			}
			
			$stmt = $dbCon->prepare("update  landloard_building_port_floors_offices set bathroom_count=?,bedroom_count=? where id=?");
				/* bind parameters for markers */
			$stmt->bind_param("iii",$bathroomCount,$bedroomCount,$id);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("insert into  landloard_apartment_description(selling_heading,short_selling_description,apartment_id)values(?,?,?)");
				/* bind parameters for markers */
			$stmt->bind_param("ssi",$rowApartment['property_heading'],$rowApartment['apartment_description'],$id);
			$stmt->execute();	
			
			
			
			
			$stmt = $dbCon->prepare("insert into landloard_apartment_other_room_detail (apartment_id) values (?)");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update user_apartment_other_room_detail set hall_room_available=?,living_room_available=?,work_room_available=? , hobby_room_available=?,sal_room_available=?,salon_room_available=?,vestibule_room_available=?,dining_room_available=?,chamber_room_available=?,balcony_available=?,terrace_available=?,storage_available=?,basement_available=?,garage_available=?,kitchen_available=?,entrance_available=? where apartment_id=?");
			$stmt->bind_param("iiiiiiiiiiiiiiiii",$rowOther['hall_room_available'],$rowOther['living_room_available'],$rowOther['work_room_available'],$rowOther['hobby_room_available'],$rowOther['sal_room_available'],$rowOther['salon_room_available'],$rowOther['vestibule_room_available'],$rowOther['dining_room_available'],$rowOther['chamber_room_available'],$rowOther['balcony_available'],$rowOther['terrace_available'],$rowOther['storage_available'],$rowOther['basement_available'],$rowOther['garage_available'],$rowOther['kitchen_available'],$rowOther['entrance_available'], $id);
			$stmt->execute();
			
			 $data['landloard_apartment_id']=$id;
			$data['user_apartment_id']= $row['user_property_id'];
			
			 
        $stmt = $dbCon->prepare("select count(id) as num from `qloudid`.`user_apartment_amenity_category_info` where apartment_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_apartment_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowHomeRepair = $result->fetch_assoc();
				if($rowHomeRepair['num']==0)
				{
					
					$stmt = $dbCon->prepare("select * from landloard_ticket_title_new where id not in (select category_id from user_apartment_amenity_category_info where apartment_id=?) and ticket_type=1");
					$stmt->bind_param("i", $data['user_apartment_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					while($rowCategory = $result->fetch_assoc())
					{
						if($rowCategory['id']<=2)
						{
							$selected=1;
						}
						else
						{	
							if($rowCategory['id']==3)
							{
							if($rowOther['kitchen_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==4)
							{
							if($rowOther['entrance_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==5)
							{
							if($rowOther['balcony_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==6)
							{
							if($rowOther['storage_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==7)
							{
							if($rowOther['basement_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==8)
							{
							if($rowOther['garage_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==9)
							{
								$selected=1;
							}
							
						}
					$stmt = $dbCon->prepare("insert into user_apartment_amenity_category_info (category_id,apartment_id,is_selected) values (?,?,?)");
					$stmt->bind_param("iii",$rowCategory['id'], $data['user_apartment_id'],$selected);
					$stmt->execute();		
					$catid=$stmt->insert_id;
						$indexValue='category_id_'.$rowCategory['id'];
						$stmt = $dbCon->prepare("select * from landloard_ticket_subtitle_new");
						$stmt->execute();
						$result1 = $stmt->get_result();
						while($row1 = $result1->fetch_assoc())
						{
							if($row1[$indexValue]==2)
								continue;
							$stmt = $dbCon->prepare("insert into user_apartment_amenities_subcategory_info (user_apartment_amenity_category_id,subcategory_id,is_available,advance_values,created_on,modified_on) values (?,?,?,?,now(),now())");
							$stmt->bind_param("iiii",$catid, $row1['id'],$row1[$indexValue],$row1[$indexValue]);
							$stmt->execute();
						}
					}
				}
				
			
			$stmt = $dbCon->prepare("select * from `qloudid`.`user_apartment_amenity_category_info` where apartment_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_apartment_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowCategory = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("insert into landloard_apartment_amenity_category_info (category_id,apartment_id,is_selected) values (?,?,?)");
				$stmt->bind_param("iii",$rowCategory['category_id'], $data['landloard_apartment_id'],$rowCategory['is_selected']);
				$stmt->execute();		
				$category_id=$stmt->insert_id;
				$stmt = $dbCon->prepare("select subcategory_name,user_apartment_amenities_subcategory_info.id,is_available,who_will_fix_the_problem,advance_values from user_apartment_amenities_subcategory_info left join landloard_ticket_subtitle_new on landloard_ticket_subtitle_new.id=user_apartment_amenities_subcategory_info.subcategory_id where user_apartment_amenity_category_id=?");
				$stmt->bind_param("i", $rowCategory['id']);
				$stmt->execute();
				$result = $stmt->get_result();
				while($rowSubcategory = $result->fetch_assoc())
				{
					 
				$stmt = $dbCon->prepare("insert into landloard_apartment_amenities_subcategory_info (user_apartment_amenity_category_id,subcategory_id,is_available,advance_values,created_on,modified_on) values (?,?,?,?,now(),now())");
					$stmt->bind_param("iiii",$category_id, $rowCategory['subcategory_id'],$rowCategory['is_available'],$rowCategory['advance_values']);
					$stmt->execute();	
				}
			}                   
                    
			}
			
			else 
			{
				 $data['landloard_apartment_id']=$_POST['aaprtment_id'];
				$apartment_orientation=$_POST['apartment_orientation'];
				$apartment_tenant=$rowUser['first_name'].' '.$rowUser['last_name'];;
				$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set teanat_details=? where id=?");
				$stmt->bind_param("ii",$tenant_id,$_POST['apartment_id']);
				$stmt->execute();	
				 
				$is_app=1;
				$stmt = $dbCon->prepare("update user_tenants set property_id=?,is_approved=1, company_id=?,tenant_id=? where id=?");
				$stmt->bind_param("iiii",$_POST['apartment_id'],$company_id,$t_id,$row['id']);
				$stmt->execute();
			
				$stmt = $dbCon->prepare("update  user_address set floor_id=?,apartment_id=?,building_id=?, `port_number`=? where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("iiiii",$_POST['floor_id'],$_POST['apartment_id'],$_POST['building_id'],$_POST['port_id'],$row['user_property_id']);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("select * from landloard_apartment_other_room_detail  where apartment_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $_POST['aaprtment_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowOther = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("update user_apartment_other_room_detail set hall_room_available=?,living_room_available=?,work_room_available=? , hobby_room_available=?,sal_room_available=?,salon_room_available=?,vestibule_room_available=?,dining_room_available=?,chamber_room_available=?,balcony_available=?,terrace_available=?,storage_available=?,basement_available=?,garage_available=?,kitchen_available=?,entrance_available=? where apartment_id=?");
				$stmt->bind_param("iiiiiiiiiiiiiiiii",$rowOther['hall_room_available'],$rowOther['living_room_available'],$rowOther['work_room_available'],$rowOther['hobby_room_available'],$rowOther['sal_room_available'],$rowOther['salon_room_available'],$rowOther['vestibule_room_available'],$rowOther['dining_room_available'],$rowOther['chamber_room_available'],$rowOther['balcony_available'],$rowOther['terrace_available'],$rowOther['storage_available'],$rowOther['basement_available'],$rowOther['garage_available'],$rowOther['kitchen_available'],$rowOther['entrance_available'], $data['user_apartment_id']);
				$stmt->execute();
				
			
				$stmt = $dbCon->prepare("select count(id) as num from `qloudid`.`landloard_apartment_amenity_category_info` where apartment_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['landloard_apartment_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowHomeRepair = $result->fetch_assoc();
				if($rowHomeRepair['num']==0)
				{
				$stmt = $dbCon->prepare("select count(id) as num from `qloudid`.`user_apartment_amenity_category_info` where apartment_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_apartment_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowHomeRepair = $result->fetch_assoc();
				if($rowHomeRepair['num']==0)
				{
					$stmt = $dbCon->prepare("select * from user_apartment_other_room_detail  where apartment_id=?");
			
					/* bind parameters for markers */
					$stmt->bind_param("i", $data['user_apartment_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$rowOther = $result->fetch_assoc();
					
					$stmt = $dbCon->prepare("select * from landloard_ticket_title_new where id not in (select category_id from user_apartment_amenity_category_info where apartment_id=?) and ticket_type=1");
					$stmt->bind_param("i", $data['user_apartment_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					while($rowCategory = $result->fetch_assoc())
					{
						if($rowCategory['id']<=2)
						{
							$selected=1;
						}
						else
						{	
							if($rowCategory['id']==3)
							{
							if($rowOther['kitchen_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==4)
							{
							if($rowOther['entrance_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==5)
							{
							if($rowOther['balcony_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==6)
							{
							if($rowOther['storage_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==7)
							{
							if($rowOther['basement_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==8)
							{
							if($rowOther['garage_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==9)
							{
								$selected=1;
							}
							
						}
					$stmt = $dbCon->prepare("insert into user_apartment_amenity_category_info (category_id,apartment_id,is_selected) values (?,?,?)");
					$stmt->bind_param("iii",$rowCategory['id'], $data['user_apartment_id'],$selected);
					$stmt->execute();		
					$catid=$stmt->insert_id;
						$indexValue='category_id_'.$rowCategory['id'];
						$stmt = $dbCon->prepare("select * from landloard_ticket_subtitle_new");
						$stmt->execute();
						$result1 = $stmt->get_result();
						while($row1 = $result1->fetch_assoc())
						{
							if($row1[$indexValue]==2)
								continue;
							$stmt = $dbCon->prepare("insert into user_apartment_amenities_subcategory_info (user_apartment_amenity_category_id,subcategory_id,is_available,advance_values,created_on,modified_on) values (?,?,?,?,now(),now())");
							$stmt->bind_param("iiii",$catid, $row1['id'],$row1[$indexValue],$row1[$indexValue]);
							$stmt->execute();
						}
					}
				}
				$stmt = $dbCon->prepare("select * from `qloudid`.`user_apartment_amenity_category_info` where apartment_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_apartment_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				while($rowCategory = $result->fetch_assoc())
				{
					$stmt = $dbCon->prepare("insert into landloard_apartment_amenity_category_info (category_id,apartment_id,is_selected) values (?,?,?)");
					$stmt->bind_param("iii",$rowCategory['category_id'], $data['landloard_apartment_id'],$rowCategory['is_selected']);
					$stmt->execute();		
					$category_id=$stmt->insert_id;
					$stmt = $dbCon->prepare("select subcategory_name,user_apartment_amenities_subcategory_info.id,is_available,who_will_fix_the_problem,advance_values from user_apartment_amenities_subcategory_info left join landloard_ticket_subtitle_new on landloard_ticket_subtitle_new.id=user_apartment_amenities_subcategory_info.subcategory_id where user_apartment_amenity_category_id=?");
					$stmt->bind_param("i", $rowCategory['id']);
					$stmt->execute();
					$resultSubCatg = $stmt->get_result();
					while($rowSubcategory = $resultSubCatg->fetch_assoc())
					{
						 
					$stmt = $dbCon->prepare("insert into landloard_apartment_amenities_subcategory_info (user_apartment_amenity_category_id,subcategory_id,is_available,advance_values,created_on,modified_on) values (?,?,?,?,now(),now())");
						$stmt->bind_param("iiii",$category_id, $rowCategory['subcategory_id'],$rowCategory['is_available'],$rowCategory['advance_values']);
						$stmt->execute();	
					}
				}	
				}					
				else
				{
				$stmt = $dbCon->prepare("select count(id) as num from `qloudid`.`user_apartment_amenity_category_info` where apartment_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_apartment_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowHomeRepair = $result->fetch_assoc();
				if($rowHomeRepair['num']==0)
				{
					
					$stmt = $dbCon->prepare("select * from landloard_ticket_title_new where id not in (select category_id from user_apartment_amenity_category_info where apartment_id=?) and ticket_type=1");
					$stmt->bind_param("i", $data['user_apartment_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					while($rowCategory = $result->fetch_assoc())
					{
						if($rowCategory['id']<=2)
						{
							$selected=1;
						}
						else
						{	
							if($rowCategory['id']==3)
							{
							if($rowOther['kitchen_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==4)
							{
							if($rowOther['entrance_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==5)
							{
							if($rowOther['balcony_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==6)
							{
							if($rowOther['storage_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==7)
							{
							if($rowOther['basement_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==8)
							{
							if($rowOther['garage_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==9)
							{
								$selected=1;
							}
							
						}
					$stmt = $dbCon->prepare("insert into user_apartment_amenity_category_info (category_id,apartment_id,is_selected) values (?,?,?)");
					$stmt->bind_param("iii",$rowCategory['id'], $data['user_apartment_id'],$selected);
					$stmt->execute();		
					$catid=$stmt->insert_id;
						$indexValue='category_id_'.$rowCategory['id'];
						$stmt = $dbCon->prepare("select * from landloard_ticket_subtitle_new");
						$stmt->execute();
						$result1 = $stmt->get_result();
						while($row1 = $result1->fetch_assoc())
						{
							if($row1[$indexValue]==2)
								continue;
							$stmt = $dbCon->prepare("insert into user_apartment_amenities_subcategory_info (user_apartment_amenity_category_id,subcategory_id,is_available,advance_values,created_on,modified_on) values (?,?,?,?,now(),now())");
							$stmt->bind_param("iiii",$catid, $row1['id'],$row1[$indexValue],$row1[$indexValue]);
							$stmt->execute();
						}
					}
				}
				
				$stmt = $dbCon->prepare("select * from `qloudid`.`landloard_apartment_amenity_category_info` where apartment_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['landloard_apartment_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				while($rowCategory = $result->fetch_assoc())
				{
					$stmt = $dbCon->prepare("update user_apartment_amenity_category_info set is_selected=? where category_id=? and apartment_id=?");
					$stmt->bind_param("iii",$rowCategory['is_selected'],$rowCategory['category_id'],$data['user_apartment_id']);
					$stmt->execute();		
					
					$stmt = $dbCon->prepare("select id from user_apartment_amenity_category_info where category_id=? and apartment_id=?");
					$stmt->bind_param("ii",$rowCategory['category_id'],$data['user_apartment_id']);
					$stmt->execute();	
					$resultCat = $stmt->get_result();
					$Usercategory = $resultCat->fetch_assoc();
					$category_id= $Usercategory['id'];
					
					$stmt = $dbCon->prepare("select * from landloard_apartment_amenities_subcategory_info where user_apartment_amenity_category_id=?");
					$stmt->bind_param("i", $rowCategory['id']);
					$stmt->execute();
					$resultSubCatg = $stmt->get_result();
					while($rowSubcategory = $resultSubCatg->fetch_assoc())
					{
						 
					$stmt = $dbCon->prepare("update user_apartment_amenities_subcategory_info set is_available=? where user_apartment_amenity_category_id=? and subcategory_id=?");
					$stmt->bind_param("iii",$category_id, $rowSubcategory['subcategory_id'],$rowSubcategory['is_available']);
					$stmt->execute();	
					}
				}
				}
				
				
			}
			
			
			
			
			
			$stmt->close();
			$dbCon->close();
			 
			return 1;
			
			
		}
		
		
	function approveConnectApartmentRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$data['id']=$this->encrypt_decrypt('decrypt',$data['rid']);
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);		
			$stmt = $dbCon->prepare("select * from user_aprtment_company_building_connect_request where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$data['user_apartment_id']= $row['user_address_id'];
			
			$stmt = $dbCon->prepare("select first_name,last_name,ssn,country_of_residence,email,sex,dob_day,dob_month,dob_year,country_phone,phone_number, address,user_profiles.city,user_profiles.country,user_profiles.zipcode,grading_status,address,port_number,invoice_zipcode,invoice_city,identity_number,issue_month,issue_year,expiry_month,expiry_year,front_image_path,back_image_path from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id left join user_identification on user_identification.user_id=user_logins.id  where user_logins.id=(select user_id from user_address where id=?)");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_address_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUser = $result->fetch_assoc();
			$full_name=$rowUser['first_name'].' '.$rowUser['last_name'];
			
			$stmt = $dbCon->prepare("select id,first_name,last_name  from landloard_building_tenant where building_id=? and tenant_email=?");
			$stmt->bind_param("is", $row['building_id'],$rowUser['email']);
			$stmt->execute();
			$result = $stmt->get_result();	
			$rowTenant = $result->fetch_assoc();
			if(empty($rowTenant))
			{
				$im=date('m');
				$iy=date('Y');
				$iddate=date('d');
				$stmt = $dbCon->prepare("select invoice_date from landloard_building_rent_price_info where id=?");
				$stmt->bind_param("i", $_POST['tenant_rent_info']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowInvoice = $result->fetch_assoc();
				if($iddate>=$rowInvoice['invoice_date'])
				{
				$im=$im+1;	
				} 
				$_POST['tenant_type']=1;
				$idate=strtotime($iy.'-'.$im.'-'.$rowInvoice['invoice_date']);
				$stmt = $dbCon->prepare("insert into landloard_building_tenant (invoice_date,tenant_rent_info,tenant_type,building_id , company_id , first_name  , last_name  , tenant_email  , mobile_country , mobile_number  , fixed_phone_country , landline_number  , street_address  , port_number  , zipcode  , city  , country_of_residence , nationality , passport_number  , issue_month , issue_year , expiry_month , expiry_year , passport_front_image  , passport_back_image  , created_on) values (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, now())");
				$stmt->bind_param("siiiisssisisssssiisiiiiss",$idate,$_POST['tenant_rent_info'],$_POST['tenant_type'], $row['building_id'],$row['company_id'],$rowUser['first_name'],$rowUser['last_name'],$rowUser['email'],$rowUser['country_of_residence'],$rowUser['phone_number'],$rowUser['country_of_residence'],$rowUser['phone_number'],$rowUser['address'],$rowUser['port_number'],$rowUser['invoice_zipcode'],$rowUser['city'],$rowUser['country'],$rowUser['country_of_residence'],$rowUser['identity_number'],$rowUser['issue_month'],$rowUser['issue_year'],$rowUser['expiry_month'],$rowUser['expiry_year'],$rowUser['front_image_path'],$rowUser['back_image_path']);
				$stmt->execute();	
				$t_id=$stmt->insert_id;
				$tenant_id=$t_id.',';
			}
			else
			{
				$t_id=$rowTenant['id'];
				$tenant_id=$rowTenant['id'].',';
			}
			
			$stmt = $dbCon->prepare("select * from user_address where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_address_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowApartment = $result->fetch_assoc();
			
			if($_POST['apartment_available']==0)
			{
			
			$apartment_orientation=$_POST['apartment_orientation'];
			$apartment_tenant=$rowUser['first_name'].' '.$rowUser['last_name'];;
			$stmt = $dbCon->prepare("insert into landloard_building_port_floors_offices (sale_price, price_m2, orientation, floor_id, office_apartment_number,tenant_name,apartment_size,private_door_info,elevator_info,created_on,teanat_details) values (?, ?,?,?, ?,?, ?,?, ?, now(),?)");
			$stmt->bind_param("idiiisiiii",$rowApartment['sale_price'],$rowApartment['sale_price_per_m'],$apartment_orientation, $row['floor_id'],$_POST['apartment_number'],$apartment_tenant,$rowApartment['property_layout'],$rowApartment['private_entrance'],$rowApartment['elevator'],$tenant_id);
			$stmt->execute();	
			$id=$stmt->insert_id;
			 
			$is_app=1;
			$stmt = $dbCon->prepare("INSERT INTO user_tenants (property_id,is_approved,user_login_id, company_id, created_on,user_email,user_first_name,user_last_name,user_country,user_phone_number,tenant_id) VALUES (?, ?, ?, ?, now(),?,?, ?, ?, ?,?)");
			$stmt->bind_param("iiiisssisi",$id,$is_app, $rowUser['id'],$company_id,$rowUser ['email'],$rowUser['first_name'],$rowUser['last_name'],$rowUser['country_of_residence'],$rowUser['phone_number'],$t_id);
			$stmt->execute();
					
			
			$stmt = $dbCon->prepare("update user_aprtment_company_building_connect_request set is_approved=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update  user_address set floor_id=?,apartment_id=?,building_id=?, `port_number`=? where id=?");
				/* bind parameters for markers */
			$stmt->bind_param("iiiii",$row['floor_id'],$id,$row['building_id'],$row['port_id'],$row['user_address_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select * from user_apartment_bedrooms where user_address_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_address_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$bedroomCount=0;
			while($rowBed = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into  landloard_building_port_floors_offices_bedrooms (apartment_id ,created_on) values(?,now())");
				/* bind parameters for markers */
			$stmt->bind_param("i",$id);
			$stmt->execute();	
			$bedroomCount++;
			}
			
			
			$stmt = $dbCon->prepare("select * from user_apartment_bathroom_detail  where user_address_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_address_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$bathroomCount=0;
			while($rowBed = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into  landloard_apartment_bathroom_detail (apartment_id,toilet_and_sink  , bath , shower  , standalone_shower  , over_bath_shower , is_private  , is_wheelchair_accessible , is_ensuit , created_on  , modified_on  ) values(?,?,?,?,?,?,?,?,?,now(),now())");
				/* bind parameters for markers */
			$stmt->bind_param("iiiiiiiii",$id,$rowBed['toilet_and_sink'],$rowBed['bath'],$rowBed['shower'],$rowBed['standalone_shower'],$rowBed['over_bath_shower'],$rowBed['is_private'],$rowBed['is_wheelchair_accessible'],$rowBed['is_ensuit']);
			$stmt->execute();
			$bathroomCount++;			
			}
			
			$stmt = $dbCon->prepare("update  landloard_building_port_floors_offices set bathroom_count=?,bedroom_count=? where id=?");
				/* bind parameters for markers */
			$stmt->bind_param("iii",$bathroomCount,$bedroomCount,$id);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("insert into  landloard_apartment_description(selling_heading,short_selling_description,apartment_id)values(?,?,?)");
				/* bind parameters for markers */
			$stmt->bind_param("ssi",$rowApartment['property_heading'],$rowApartment['apartment_description'],$id);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("select * from user_apartment_other_room_detail  where apartment_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_address_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowOther = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("insert into landloard_apartment_other_room_detail (apartment_id) values (?)");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("update landloard_apartment_other_room_detail set hall_room_available=?,living_room_available=?,work_room_available=? , hobby_room_available=?,sal_room_available=?,salon_room_available=?,vestibule_room_available=?,dining_room_available=?,chamber_room_available=?,balcony_available=?,terrace_available=? where apartment_id=?");
			$stmt->bind_param("iiiiiiiiiiii",$rowOther['hall_room_available'],$rowOther['living_room_available'],$rowOther['work_room_available'],$rowOther['hobby_room_available'],$rowOther['sal_room_available'],$rowOther['salon_room_available'],$rowOther['vestibule_room_available'],$rowOther['dining_room_available'],$rowOther['chamber_room_available'],$rowOther['balcony_available'],$rowOther['terrace_available'], $id);
			$stmt->execute();
			
			
			 $data['landloard_apartment_id']=$id;
			
				$stmt = $dbCon->prepare("select count(id) as num from `qloudid`.`user_apartment_amenity_category_info` where apartment_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_apartment_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowHomeRepair = $result->fetch_assoc();
				if($rowHomeRepair['num']==0)
				{
					
					$stmt = $dbCon->prepare("select * from landloard_ticket_title_new where id not in (select category_id from user_apartment_amenity_category_info where apartment_id=?) and ticket_type=1");
					$stmt->bind_param("i", $data['user_apartment_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					while($rowCategory = $result->fetch_assoc())
					{
						if($rowCategory['id']<=2)
						{
							$selected=1;
						}
						else
						{	
							if($rowCategory['id']==3)
							{
							if($rowOther['kitchen_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==4)
							{
							if($rowOther['entrance_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==5)
							{
							if($rowOther['balcony_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==6)
							{
							if($rowOther['storage_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==7)
							{
							if($rowOther['basement_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==8)
							{
							if($rowOther['garage_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==9)
							{
								$selected=1;
							}
							
						}
					$stmt = $dbCon->prepare("insert into user_apartment_amenity_category_info (category_id,apartment_id,is_selected) values (?,?,?)");
					$stmt->bind_param("iii",$rowCategory['id'], $data['user_apartment_id'],$selected);
					$stmt->execute();		
					$catid=$stmt->insert_id;
						$indexValue='category_id_'.$rowCategory['id'];
						$stmt = $dbCon->prepare("select * from landloard_ticket_subtitle_new");
						$stmt->execute();
						$result1 = $stmt->get_result();
						while($row1 = $result1->fetch_assoc())
						{
							if($row1[$indexValue]==2)
								continue;
							$stmt = $dbCon->prepare("insert into user_apartment_amenities_subcategory_info (user_apartment_amenity_category_id,subcategory_id,is_available,advance_values,created_on,modified_on) values (?,?,?,?,now(),now())");
							$stmt->bind_param("iiii",$catid, $row1['id'],$row1[$indexValue],$row1[$indexValue]);
							$stmt->execute();
						}
					}
				}
				
			
			$stmt = $dbCon->prepare("select * from `qloudid`.`user_apartment_amenity_category_info` where apartment_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_apartment_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowCategory = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("insert into landloard_apartment_amenity_category_info (category_id,apartment_id,is_selected) values (?,?,?)");
				$stmt->bind_param("iii",$rowCategory['category_id'], $data['landloard_apartment_id'],$rowCategory['is_selected']);
				$stmt->execute();		
				$category_id=$stmt->insert_id;
				$stmt = $dbCon->prepare("select subcategory_name,user_apartment_amenities_subcategory_info.id,is_available,who_will_fix_the_problem,advance_values from user_apartment_amenities_subcategory_info left join landloard_ticket_subtitle_new on landloard_ticket_subtitle_new.id=user_apartment_amenities_subcategory_info.subcategory_id where user_apartment_amenity_category_id=?");
				$stmt->bind_param("i", $rowCategory['id']);
				$stmt->execute();
				$result = $stmt->get_result();
				while($rowSubcategory = $result->fetch_assoc())
				{
					 
				$stmt = $dbCon->prepare("insert into landloard_apartment_amenities_subcategory_info (user_apartment_amenity_category_id,subcategory_id,is_available,advance_values,created_on,modified_on) values (?,?,?,?,now(),now())");
					$stmt->bind_param("iiii",$category_id, $rowCategory['subcategory_id'],$rowCategory['is_available'],$rowCategory['advance_values']);
					$stmt->execute();	
				}
			}
				
			}
			
			else 
			{
				 $data['landloard_apartment_id']=$_POST['aaprtment_id'];
				$apartment_orientation=$_POST['apartment_orientation'];
				$apartment_tenant=$rowUser['first_name'].' '.$rowUser['last_name'];;
				$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set teanat_details=? where id=?");
				$stmt->bind_param("ii",$tenant_id,$_POST['apartment_id']);
				$stmt->execute();	
				 
				$is_app=1;
				$stmt = $dbCon->prepare("INSERT INTO user_tenants (property_id,is_approved,user_login_id, company_id, created_on,user_email,user_first_name,user_last_name,user_country,user_phone_number,tenant_id) VALUES (?, ?, ?, ?, now(),?,?, ?, ?, ?,?)");
				$stmt->bind_param("iiiisssisi",$_POST['apartment_id'],$is_app, $rowUser['id'],$company_id,$rowUser['email'],$rowUser['first_name'],$rowUser['last_name'],$rowUser['country_of_residence'],$rowUser['phone_number'],$t_id);
				$stmt->execute();
						
				
				$stmt = $dbCon->prepare("update user_aprtment_company_building_connect_request set is_approved=1 where id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['id']);
				$stmt->execute();
			
				$stmt = $dbCon->prepare("update  user_address set floor_id=?,apartment_id=?,building_id=?, `port_number`=? where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("iiiii",$row['floor_id'],$_POST['apartment_id'],$row['building_id'],$row['port_id'],$row['user_address_id']);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("select * from landloard_apartment_other_room_detail  where apartment_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $_POST['aaprtment_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowOther = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("update user_apartment_other_room_detail set hall_room_available=?,living_room_available=?,work_room_available=? , hobby_room_available=?,sal_room_available=?,salon_room_available=?,vestibule_room_available=?,dining_room_available=?,chamber_room_available=?,balcony_available=?,terrace_available=?,storage_available=?,basement_available=?,garage_available=?,kitchen_available=?,entrance_available=? where apartment_id=?");
				$stmt->bind_param("iiiiiiiiiiiiiiiii",$rowOther['hall_room_available'],$rowOther['living_room_available'],$rowOther['work_room_available'],$rowOther['hobby_room_available'],$rowOther['sal_room_available'],$rowOther['salon_room_available'],$rowOther['vestibule_room_available'],$rowOther['dining_room_available'],$rowOther['chamber_room_available'],$rowOther['balcony_available'],$rowOther['terrace_available'],$rowOther['storage_available'],$rowOther['basement_available'],$rowOther['garage_available'],$rowOther['kitchen_available'],$rowOther['entrance_available'], $data['user_apartment_id']);
				$stmt->execute();
				
			
				$stmt = $dbCon->prepare("select count(id) as num from `qloudid`.`landloard_apartment_amenity_category_info` where apartment_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['landloard_apartment_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowHomeRepair = $result->fetch_assoc();
				if($rowHomeRepair['num']==0)
				{
				$stmt = $dbCon->prepare("select count(id) as num from `qloudid`.`user_apartment_amenity_category_info` where apartment_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_apartment_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowHomeRepair = $result->fetch_assoc();
				if($rowHomeRepair['num']==0)
				{
					$stmt = $dbCon->prepare("select * from user_apartment_other_room_detail  where apartment_id=?");
			
					/* bind parameters for markers */
					$stmt->bind_param("i", $data['user_apartment_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$rowOther = $result->fetch_assoc();
					
					$stmt = $dbCon->prepare("select * from landloard_ticket_title_new where id not in (select category_id from user_apartment_amenity_category_info where apartment_id=?) and ticket_type=1");
					$stmt->bind_param("i", $data['user_apartment_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					while($rowCategory = $result->fetch_assoc())
					{
						if($rowCategory['id']<=2)
						{
							$selected=1;
						}
						else
						{	
							if($rowCategory['id']==3)
							{
							if($rowOther['kitchen_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==4)
							{
							if($rowOther['entrance_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==5)
							{
							if($rowOther['balcony_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==6)
							{
							if($rowOther['storage_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==7)
							{
							if($rowOther['basement_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==8)
							{
							if($rowOther['garage_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==9)
							{
								$selected=1;
							}
							
						}
					$stmt = $dbCon->prepare("insert into user_apartment_amenity_category_info (category_id,apartment_id,is_selected) values (?,?,?)");
					$stmt->bind_param("iii",$rowCategory['id'], $data['user_apartment_id'],$selected);
					$stmt->execute();		
					$catid=$stmt->insert_id;
						$indexValue='category_id_'.$rowCategory['id'];
						$stmt = $dbCon->prepare("select * from landloard_ticket_subtitle_new");
						$stmt->execute();
						$result1 = $stmt->get_result();
						while($row1 = $result1->fetch_assoc())
						{
							if($row1[$indexValue]==2)
								continue;
							$stmt = $dbCon->prepare("insert into user_apartment_amenities_subcategory_info (user_apartment_amenity_category_id,subcategory_id,is_available,advance_values,created_on,modified_on) values (?,?,?,?,now(),now())");
							$stmt->bind_param("iiii",$catid, $row1['id'],$row1[$indexValue],$row1[$indexValue]);
							$stmt->execute();
						}
					}
				}
				$stmt = $dbCon->prepare("select * from `qloudid`.`user_apartment_amenity_category_info` where apartment_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_apartment_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				while($rowCategory = $result->fetch_assoc())
				{
					$stmt = $dbCon->prepare("insert into landloard_apartment_amenity_category_info (category_id,apartment_id,is_selected) values (?,?,?)");
					$stmt->bind_param("iii",$rowCategory['category_id'], $data['landloard_apartment_id'],$rowCategory['is_selected']);
					$stmt->execute();		
					$category_id=$stmt->insert_id;
					$stmt = $dbCon->prepare("select subcategory_name,user_apartment_amenities_subcategory_info.id,is_available,who_will_fix_the_problem,advance_values from user_apartment_amenities_subcategory_info left join landloard_ticket_subtitle_new on landloard_ticket_subtitle_new.id=user_apartment_amenities_subcategory_info.subcategory_id where user_apartment_amenity_category_id=?");
					$stmt->bind_param("i", $rowCategory['id']);
					$stmt->execute();
					$resultSubCatg = $stmt->get_result();
					while($rowSubcategory = $resultSubCatg->fetch_assoc())
					{
						 
					$stmt = $dbCon->prepare("insert into landloard_apartment_amenities_subcategory_info (user_apartment_amenity_category_id,subcategory_id,is_available,advance_values,created_on,modified_on) values (?,?,?,?,now(),now())");
						$stmt->bind_param("iiii",$category_id, $rowCategory['subcategory_id'],$rowCategory['is_available'],$rowCategory['advance_values']);
						$stmt->execute();	
					}
				}	
				}					
				else
				{
				$stmt = $dbCon->prepare("select count(id) as num from `qloudid`.`user_apartment_amenity_category_info` where apartment_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_apartment_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowHomeRepair = $result->fetch_assoc();
				if($rowHomeRepair['num']==0)
				{
					
					$stmt = $dbCon->prepare("select * from landloard_ticket_title_new where id not in (select category_id from user_apartment_amenity_category_info where apartment_id=?) and ticket_type=1");
					$stmt->bind_param("i", $data['user_apartment_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					while($rowCategory = $result->fetch_assoc())
					{
						if($rowCategory['id']<=2)
						{
							$selected=1;
						}
						else
						{	
							if($rowCategory['id']==3)
							{
							if($rowOther['kitchen_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==4)
							{
							if($rowOther['entrance_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==5)
							{
							if($rowOther['balcony_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==6)
							{
							if($rowOther['storage_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==7)
							{
							if($rowOther['basement_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==8)
							{
							if($rowOther['garage_available']==1)
							{
								$selected=1;
							}
							else 
							{
								$selected=0;	
							}	
							}
							else if($rowCategory['id']==9)
							{
								$selected=1;
							}
							
						}
					$stmt = $dbCon->prepare("insert into user_apartment_amenity_category_info (category_id,apartment_id,is_selected) values (?,?,?)");
					$stmt->bind_param("iii",$rowCategory['id'], $data['user_apartment_id'],$selected);
					$stmt->execute();		
					$catid=$stmt->insert_id;
						$indexValue='category_id_'.$rowCategory['id'];
						$stmt = $dbCon->prepare("select * from landloard_ticket_subtitle_new");
						$stmt->execute();
						$result1 = $stmt->get_result();
						while($row1 = $result1->fetch_assoc())
						{
							if($row1[$indexValue]==2)
								continue;
							$stmt = $dbCon->prepare("insert into user_apartment_amenities_subcategory_info (user_apartment_amenity_category_id,subcategory_id,is_available,advance_values,created_on,modified_on) values (?,?,?,?,now(),now())");
							$stmt->bind_param("iiii",$catid, $row1['id'],$row1[$indexValue],$row1[$indexValue]);
							$stmt->execute();
						}
					}
				}
				
				$stmt = $dbCon->prepare("select * from `qloudid`.`landloard_apartment_amenity_category_info` where apartment_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['landloard_apartment_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				while($rowCategory = $result->fetch_assoc())
				{
					$stmt = $dbCon->prepare("update user_apartment_amenity_category_info set is_selected=? where category_id=? and apartment_id=?");
					$stmt->bind_param("iii",$rowCategory['is_selected'],$rowCategory['category_id'],$data['user_apartment_id']);
					$stmt->execute();		
					
					$stmt = $dbCon->prepare("select id from user_apartment_amenity_category_info where category_id=? and apartment_id=?");
					$stmt->bind_param("ii",$rowCategory['category_id'],$data['user_apartment_id']);
					$stmt->execute();	
					$resultCat = $stmt->get_result();
					$Usercategory = $resultCat->fetch_assoc();
					$category_id= $Usercategory['id'];
					
					$stmt = $dbCon->prepare("select * from landloard_apartment_amenities_subcategory_info where user_apartment_amenity_category_id=?");
					$stmt->bind_param("i", $rowCategory['id']);
					$stmt->execute();
					$resultSubCatg = $stmt->get_result();
					while($rowSubcategory = $resultSubCatg->fetch_assoc())
					{
						 
					$stmt = $dbCon->prepare("update user_apartment_amenities_subcategory_info set is_available=? where user_apartment_amenity_category_id=? and subcategory_id=?");
					$stmt->bind_param("iii",$category_id, $rowSubcategory['subcategory_id'],$rowSubcategory['is_available']);
					$stmt->execute();	
					}
				}
				}
				
			}
			
			$stmt->close();
			$dbCon->close();
			 
			return 1;
			
			
		}
		
	 
	 function buildingUnrefinedApartmentList($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$building_id=$this->encrypt_decrypt('decrypt',$data['bid']);
			 
			$stmt = $dbCon->prepare("select * from landloard_building_unrefined_offices where building_id=?");
			$stmt->bind_param("i", $building_id);
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
		
	 
	 
	 function categoryInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select * from landloard_apartment_other_room_detail where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowOtherRoom = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from landloard_ticket_title_new where id not in (select category_id from landloard_apartment_amenity_category_info where apartment_id=?) and ticket_type=1");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
				if($row['id']<=2)
				{
					$selected=1;
				}
				else
				{	
					if($row['id']==3)
					{
					if($rowOtherRoom['kitchen_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==4)
					{
					if($rowOtherRoom['entrance_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==5)
					{
					if($rowOtherRoom['balcony_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==6)
					{
					if($rowOtherRoom['storage_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==7)
					{
					if($rowOtherRoom['basement_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==8)
					{
					if($rowOtherRoom['garage_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==9)
					{
						$selected=1;
					}
				}
			$stmt = $dbCon->prepare("insert into landloard_apartment_amenity_category_info (category_id,apartment_id,is_selected) values (?,?,?)");
			$stmt->bind_param("iii",$row['id'], $aid,$selected);
			$stmt->execute();		
			$id=$stmt->insert_id;
				$indexValue='category_id_'.$row['id'];
				$stmt = $dbCon->prepare("select * from landloard_ticket_subtitle_new");
				$stmt->execute();
				$result1 = $stmt->get_result();
				while($row1 = $result1->fetch_assoc())
				{
					if($row1[$indexValue]==2)
						continue;
					$stmt = $dbCon->prepare("insert into landloard_apartment_amenities_subcategory_info (user_apartment_amenity_category_id,subcategory_id,is_available,advance_values,created_on,modified_on) values (?,?,?,?,now(),now())");
					$stmt->bind_param("iiii",$id, $row1['id'],$row1[$indexValue],$row1[$indexValue]);
					$stmt->execute();
				}
			}
			 
			 
			$stmt = $dbCon->prepare("select * from landloard_ticket_title_new where ticket_type=1");
			 
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
				if($row['id']<=2)
				{
					$selected=1;
				}
				else
				{	
					if($row['id']==3)
					{
					if($rowOtherRoom['kitchen_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==4)
					{
					if($rowOtherRoom['entrance_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==5)
					{
					if($rowOtherRoom['balcony_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==6)
					{
					if($rowOtherRoom['storage_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==7)
					{
					if($rowOtherRoom['basement_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==8)
					{
					if($rowOtherRoom['garage_available']==1)
					{
						$selected=1;
					}
					else 
					{
						$selected=0;	
					}	
					}
					else if($row['id']==9)
					{
						$selected=1;
					}
					
				}
			$stmt = $dbCon->prepare("select id from landloard_apartment_amenity_category_info where category_id=? and apartment_id=?");
			$stmt->bind_param("ii",$row['id'], $aid);
			$stmt->execute();		
			$resultInfo = $stmt->get_result();
			$rowInfo = $resultInfo->fetch_assoc();
				$indexValue='category_id_'.$row['id'];
				$stmt = $dbCon->prepare("select * from landloard_ticket_subtitle_new where id not in (select subcategory_id from landloard_apartment_amenities_subcategory_info where user_apartment_amenity_category_id=?)");
				$stmt->bind_param("i",$rowInfo['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				while($row1 = $result1->fetch_assoc())
				{
					if($row1[$indexValue]==2)
						continue;
					$stmt = $dbCon->prepare("insert into landloard_apartment_amenities_subcategory_info (user_apartment_amenity_category_id,subcategory_id,is_available,advance_values,created_on,modified_on) values (?,?,?,?,now(),now())");
					$stmt->bind_param("iiii",$rowInfo['id'], $row1['id'],$row1[$indexValue],$row1[$indexValue]);
					$stmt->execute();
				}
			}
			  
			  
			 
			$stmt = $dbCon->prepare("select landloard_apartment_amenity_category_info.id,ticket_title from landloard_apartment_amenity_category_info left join landloard_ticket_title_new on landloard_ticket_title_new.id=landloard_apartment_amenity_category_info.category_id where apartment_id=? and is_selected=1");
			$stmt->bind_param("i", $aid);
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
		
		
		function updateTicketCategoryAmenities($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("update landloard_apartment_amenities_subcategory_info set is_available=1,modified_on=now(),who_will_fix_the_problem=1 where user_apartment_amenity_category_id=? and advance_values=? and is_available=0");
			$stmt->bind_param("ii", $_POST['user_amenity_category_id'],$_POST['user_amenity_category_type']);
			$stmt->execute();
			 				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateTicketSubcategory($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 $stmt = $dbCon->prepare("update landloard_apartment_amenities_subcategory_info set who_will_fix_the_problem=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$_POST['subcategory_info'], $_POST['user_amenity_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateAminitySubcategory($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 $stmt = $dbCon->prepare("update landloard_apartment_amenities_subcategory_info set is_available=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $_POST['user_amenity_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function amenitiesSubcategoryDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 $category_id=$this->encrypt_decrypt('decrypt',$data['category_id']);
			$stmt = $dbCon->prepare("select landloard_apartment_amenity_category_info.id,category_id,ticket_title from landloard_apartment_amenity_category_info left join landloard_ticket_title_new on landloard_ticket_title_new.id=landloard_apartment_amenity_category_info.category_id where landloard_apartment_amenity_category_info.id=?");
			$stmt->bind_param("i", $category_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			
			$row = $result->fetch_assoc();
			for($j=1;$j>=0;$j--)
			{
				if($row['category_id']==9 && $j==1)
					continue;
				
				if($j==0)
				{
					$title='Extra ordinary or advanced';
				}
				else
				{
					$title=$row['ticket_title'];
				}
				
				$i=$j+1;
			$stmt = $dbCon->prepare("select count(landloard_apartment_amenities_subcategory_info.id) as num from landloard_apartment_amenities_subcategory_info where user_apartment_amenity_category_id=? and advance_values=? and is_available=1");
			$stmt->bind_param("ii", $row['id'],$j);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();	
			$org=$org.' <div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile'.$j.'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold"><div class="dflex wi_100">
									<div class="wi_70 dflex">
								<span class="css-p2kctj"><img src="https://www.safeqloud.com/html/usercontent/images/kitchen'.$i.'.svg" class="css-z0f999"></span> 
								<div>
								<span class="apartheading">'.$title.'</span><span class="aprtSubheading">'.$row1['num'].' amenities selected</span>
								</div>
								</div> 
									<div class="wi_30 padt10">
															<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span>
									</div> 
									</div></a></div>
								<div id="profile'.$j.'" class=" " style="display: block;">	
										 
									  <div class="css-2998cc fleft padb20">
									<a href="javascript:void(0);" onclick="updateTicketCategoryAmenities('.$row['id'].','.$j.')"> <button color="#444444" data-testid="Kitchen-amenity-section-select-all" class="merlin-button css-7wfern" aria-label=""><div class="merlin-button__content">Select all</div></button></a>
									  </div>
									  
									   <div class="clear"></div>
											<div id="'.$j.'">';
		 	$stmt = $dbCon->prepare("select subcategory_name,landloard_apartment_amenities_subcategory_info.id,is_available,who_will_fix_the_problem,advance_values from landloard_apartment_amenities_subcategory_info left join landloard_ticket_subtitle_new on landloard_ticket_subtitle_new.id=landloard_apartment_amenities_subcategory_info.subcategory_id where user_apartment_amenity_category_id=? and advance_values=?");
			$stmt->bind_param("ii", $row['id'],$j);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			while($row1 = $result1->fetch_assoc())
			{
				 
				if($row1['is_available']==1)
				{
					$checked='checked';
					$update=0;
				}
				else
				{
					$checked='';
					$update=1;
				}
				$org=$org.' <div data-testid="'.$row1['subcategory_name'].'-amenity-item" class="css-39yi7y"><div class="css-nj7s2c"><label for="oven" class="css-14q70q0">'.$row1['subcategory_name'].'</label><div class="css-1sjqbna">
				<a href="javascript:void(0);" onclick="updateAminitySubcategory('.$row1['id'].','.$update.');"><input data-testid="test-checkbox-'.$row1['subcategory_name'].'" name="'.$row1['subcategory_name'].'" type="checkbox" class="css-1lgzhz8" '.$checked.'></a>
				</div></div>';
				$option='';
				if($row1['is_available']==1)
				{
							if($row1['who_will_fix_the_problem']==1)
							{
								$seleted1='selected';
								$seleted2='';
							}
							else
							{
								$seleted2='selected';
								$seleted1='';
							}
							$option=$option.'<option value="1" '.$seleted1.'>Guest</option>';
							$option=$option.'<option value="2" '.$seleted2.'>landloard</option>';
						
					$org=$org.'<div class="css-11e5cyp">
					<select id="'.$row1['subcategory_name'].'-amenity-select" data-testid="'.$row1['subcategory_name'].'-amenity-select" class="css-bnguuq dropdown-bg" onchange="updateTicketSubcategory('.$row1['id'].',this.value);">
					'.$option.'
					</select>
					</div> ';	
				}
				
				$org=$org.'</div>';	
			}			
											
			$org=$org.'</div> </div> </div> ';
			}
			
			  
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
	 
	 
	 
	function getService($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from landloard_building_rent_price_info  where company_id=? and building_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$_POST['building_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0">Select</option>';
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<option value="'.$row['id'].'">'.$row['price_title'].' - '.$row['price'].' SEK</option>';
				 
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
	function buildingList($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
	 
       $stmt = $dbCon->prepare("select id,building_name from landloard_buildings where company_id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $company_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='<option value="0">Select</option>';
		while($row = $result->fetch_assoc())
		{
			$org=$org.'<option value="'.$row['id'].'">'.$row['building_name'].'</option>';
			 
		}
		 
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	function getPorts($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
	   
       $stmt = $dbCon->prepare("select id,port_number from landloard_building_ports where buildingid=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $_POST['building_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='<option value="0">Select</option>';
		while($row = $result->fetch_assoc())
		{
			$org=$org.'<option value="'.$row['id'].'">'.$row['port_number'].'</option>';
			 
		}
		 
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	
	function getFloors($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
	 
       $stmt = $dbCon->prepare("select id,floor_number from landloard_building_port_floors where port_id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $_POST['port_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='<option value="0">Select</option>';
		while($row = $result->fetch_assoc())
		{
			$org=$org.'<option value="'.$row['id'].'">'.$row['floor_number'].'</option>';
			 
		}
		 
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	
	function getApartment($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
	 
       $stmt = $dbCon->prepare("select id,office_apartment_number from landloard_building_port_floors_offices where floor_id=? and is_office=0 and teanat_details=0");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $_POST['floor_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='<option value="0">Select</option>';
		while($row = $result->fetch_assoc())
		{
			$org=$org.'<option value="'.$row['id'].'">'.$row['office_apartment_number'].'</option>';
			 
		}
		 
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	
	
	function getApartmentForSeelctedFloor($data)
    {
        $dbCon = AppModel::createConnection();
      $request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
	 
       $stmt = $dbCon->prepare("select id,office_apartment_number from landloard_building_port_floors_offices where floor_id=(select floor_id from user_aprtment_company_building_connect_request where id=?) and is_office=0 and teanat_details=0");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $request_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='<option value="0">Select</option>';
		while($row = $result->fetch_assoc())
		{
			$org=$org.'<option value="'.$row['id'].'">'.$row['office_apartment_number'].'</option>';
			 
		}
		 
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	function rejectApartmentRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$request_id=$this->encrypt_decrypt('decrypt',$data['rid']);
			 
			$stmt = $dbCon->prepare("update user_tenants set is_approved=2 where id=?");
			$stmt->bind_param("i",$request_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			 
			return 1;
			
			
		}
			
		
	function apartmentRequestDetail($data)
		{
			 $dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select * from user_tenants where verification_code=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['code_detail']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select first_name,last_name,concat_ws(' ',first_name,last_name) as name,country_of_residence,email,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_login_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUserDetail = $result->fetch_assoc();
			
			$org['name']=$rowUserDetail['name'];
			$org['first_name']=$rowUserDetail['first_name'];
			$org['last_name']=$rowUserDetail['last_name'];
			$org['country_of_residence']=$rowUserDetail['country_of_residence'];
			$org['email']=$rowUserDetail['email'];
			$org['phone_number']=$rowUserDetail['phone_number'];
			$org['rid']= $this -> encrypt_decrypt('encrypt',$row['id']);
			
			$stmt = $dbCon->prepare("select address,city,zipcode,port_number from user_address where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_property_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAddressDetail = $result->fetch_assoc();	
			
			$org['address']=$rowAddressDetail['address'];
			$org['city']=$rowAddressDetail['city'];
			$org['zipcode']=$rowAddressDetail['zipcode'];
			$org['port_number']=$rowAddressDetail['port_number'];
			 
			 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
			
	function checkRequestInfo()
    {
        $dbCon = AppModel::createConnection();
        $stmt = $dbCon->prepare("select * from user_tenants where verification_code=? and is_approved=0");
        $stmt->bind_param("i", $_POST['code_detail']);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
        $stmt->close();
        $dbCon->close();
        return $row;
    }	
	
	
			
	function rejectConnectApartmentRequest($data)
    {
        $dbCon = AppModel::createConnection();
        $request_id=$this->encrypt_decrypt('decrypt',$data['rid']);
        $stmt = $dbCon->prepare("update user_aprtment_company_building_connect_request set is_approved=2 where id=?");
        $stmt->bind_param("i", $request_id);
        $stmt->execute();
        $stmt->close();
        $dbCon->close();
        return 1;
    }
	function connectRequestDetailInfo($data)
    {
        $dbCon = AppModel::createConnection();
        $request_id=$this->encrypt_decrypt('decrypt',$data['rid']);
        $stmt = $dbCon->prepare("select * from user_aprtment_company_building_connect_request where id=?");
			
			/* bind parameters for markers */
		$stmt->bind_param("i", $request_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$row['bid']= $this -> encrypt_decrypt('encrypt',$row['building_id']);
        $stmt->close();
        $dbCon->close();
        return $row;
    }
	
	
	function apartmentConnectRequestRejected($data)
    {
        $dbCon = AppModel::createConnection();
        $company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
        $stmt = $dbCon->prepare("select user_aprtment_company_building_connect_request.id,property_nickname,building_name,landloard_building_ports.port_number,floor_number from user_aprtment_company_building_connect_request left join user_address on user_address.id=user_aprtment_company_building_connect_request.user_address_id left join landloard_buildings on landloard_buildings.id=user_aprtment_company_building_connect_request.building_id left join landloard_building_ports on landloard_building_ports.id=user_aprtment_company_building_connect_request.port_id  left join landloard_building_port_floors on landloard_building_port_floors.id=user_aprtment_company_building_connect_request.floor_id where user_aprtment_company_building_connect_request.company_id=? and is_approved=2");
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
	function apartmentConnectRequestReceived($data)
    {
        $dbCon = AppModel::createConnection();
        $company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
        $stmt = $dbCon->prepare("select user_aprtment_company_building_connect_request.id,property_nickname,building_name,landloard_building_ports.port_number,floor_number from user_aprtment_company_building_connect_request left join user_address on user_address.id=user_aprtment_company_building_connect_request.user_address_id left join landloard_buildings on landloard_buildings.id=user_aprtment_company_building_connect_request.building_id left join landloard_building_ports on landloard_building_ports.id=user_aprtment_company_building_connect_request.port_id  left join landloard_building_port_floors on landloard_building_port_floors.id=user_aprtment_company_building_connect_request.floor_id where user_aprtment_company_building_connect_request.company_id=? and is_approved=0");
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
	
	
	function agreementDetail($data)
    {
        $dbCon = AppModel::createConnection();
        $agreement_id=$this->encrypt_decrypt('decrypt',$data['agreement_id']);
        $stmt = $dbCon->prepare("select * from landloard_object_purchase_agreement where id=?");
        $stmt->bind_param("i", $agreement_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
			if($row['object_type']==1)
				{
					$stmt = $dbCon->prepare("select *  from landloard_building_port_floors_offices where id=?");
					$stmt->bind_param("i", $row['object_id']);
					$stmt->execute();
					$result2 = $stmt->get_result();
					$row2 = $result2->fetch_assoc();
					$row['object']='Apartment';
					$row['object_number']=$row2['office_apartment_number'];
					$row['object_price']=$row2['sale_price'];
				}
				else
				{
					$stmt = $dbCon->prepare("select *  from landloard_building_parking where id=?");
					$stmt->bind_param("i", $row['object_id']);
					$stmt->execute();
					$result2 = $stmt->get_result();
					$row2 = $result2->fetch_assoc();
					$row['object']='Parking';
					$row['object_number']=$row2['parking_number'];
					$row['object_price']=$row2['parking_area']*$row2['parking_price'];
				}	
        $stmt->close();
        $dbCon->close();
        return $row;
    }
	
	
	function emiList($data)
    {
        $dbCon = AppModel::createConnection();
        $agreement_id=$this->encrypt_decrypt('decrypt',$data['agreement_id']);
        $stmt = $dbCon->prepare("select * from landloard_building_owner_invoice_detail where agreement_id=?");
        $stmt->bind_param("i", $agreement_id);
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
		
	function purchaseInvoiceList($data)
    {
        $dbCon = AppModel::createConnection();
        $building_id=$this->encrypt_decrypt('decrypt',$data['bid']);
		$stmt = $dbCon->prepare("select * from landloard_apartment_reservation_information where building_id=? and paid_method=0 and reservation_request_id>0");
        $stmt->bind_param("i", $building_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		while($row = $result->fetch_assoc())
		{
			$row['fee_type']=1;
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['reservation_request_id']);
			array_push($org,$row);
		}
        $stmt = $dbCon->prepare("select * from landloard_building_owner_invoice_detail where agreement_id in (select id from landloard_object_purchase_agreement where building_id=?) and is_paid=0");
        $stmt->bind_param("i", $building_id);
        $stmt->execute();
        $result = $stmt->get_result();
		 
		while($row = $result->fetch_assoc())
		{
			$row['fee_type']=2;
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			array_push($org,$row);
		}
        $stmt->close();
        $dbCon->close();
        return $org;
    }
	
	
	
	
	
	
	function purchasePaidInvoiceList($data)
    {
        $dbCon = AppModel::createConnection();
        $building_id=$this->encrypt_decrypt('decrypt',$data['bid']);
        $stmt = $dbCon->prepare("select * from landloard_building_owner_invoice_detail where agreement_id in (select id from landloard_object_purchase_agreement where building_id=?) and is_paid=1 and fully_paid=1");
        $stmt->bind_param("i", $building_id);
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
	
	
	function purchasePartialPaidInvoiceList($data)
    {
        $dbCon = AppModel::createConnection();
        $building_id=$this->encrypt_decrypt('decrypt',$data['bid']);
        $stmt = $dbCon->prepare("select * from landloard_building_owner_invoice_detail where agreement_id in (select id from landloard_object_purchase_agreement where building_id=?) and is_paid=1 and fully_paid=0");
        $stmt->bind_param("i", $building_id);
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
	
	
	function updateTransectionDetail($data)
    {
        $dbCon = AppModel::createConnection();
        $invoice_id=$this->encrypt_decrypt('decrypt',$data['invoice_id']);
		$stmt = $dbCon->prepare("select * from landloard_building_owner_invoice_detail where agreement_id=?");
        $stmt->bind_param("i", $invoice_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		if($row['is_paid']==1)
		{
		$row['payment_amount']=$row['payment_amount']-$row['payment_amount_received'];	
		}
		if($row['payment_amount']==$_POST['payment_amount'])
		{
			$fully_paid=1;
			$access_payment=0;
		}
		else if($row['payment_amount']<$_POST['payment_amount'])
		{
			$fully_paid=1;
			$access_payment=1;
		}
		else
		{
			$fully_paid=0;
			$access_payment=0;
		}
		$dateReceived=strtotime($_POST['payment_date']);
		$paidNow=$row['payment_amount_received']+$_POST['total_paid'];
        $stmt = $dbCon->prepare("update landloard_building_owner_invoice_detail set is_paid=1,payment_date=?,payment_mode=?,payment_amount_received=?,fully_paid=?,access_payment=? where id=?");
        $stmt->bind_param("siiiii",$dateReceived,$_POST['payment_mode'],$paidNow,$fully_paid,$access_payment, $invoice_id);
        $stmt->execute();
		
		$stmt = $dbCon->prepare("insert into landloard_owner_invoice_payment_received (invoice_id,payment_received,received_date,agreement_id ,created_on) values (?,?,?,?,now())");
		$stmt->bind_param("iisi",$invoice_id,$_POST['payment_amount'],$dateReceived,$row['agreement_id']);
		$stmt->execute();
		
		
		if($row['is_deposit']==1)
		{
			 $stmt = $dbCon->prepare("update landloard_object_purchase_agreement set deposit_paid=1,payment_method=? where id=?");
			$stmt->bind_param("ii",$_POST['payment_mode'], $row['agreement_id']);
			$stmt->execute();
		}
        $stmt->close();
        $dbCon->close();
        return 1;
    }
		function getEmiInfo()
		{
		$emis='';
		if($_POST['id']>1)
		{
		for($i=1;$i<=100;$i++)
		{
		$emis=$emis.'<option value='.$i.'>'.$i.'</option>';	
		}	
		}
		else
		{
		$emis=$emis.'<option value="100">100</option>';		
		}
		$org='';
		for($i=1;$i<=$_POST['id'];$i++)
		{
			$org=$org.' <div class="on_clmn padt10">
								 <div class="thr_clmn  wi_20 padr5">
										<div class="pos_rel talc">
									  <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">EMI'.$i.' (%)</span> 
													 </div>
												</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									 
									<div class="wi_100 pos_rel">
								 <Select  name="emi'.$i.'" id="emi'.$i.'" class="css-bnguuq dropdown-bg"  >
								 	'.$emis.'
									 </Select>
								 </div>
								   
									 </div>
									  
									 
									</div> 
									  </div>
									  
									  <div class="thr_clmn  wi_40 padrl5">
										<div class="pos_rel talc">
										<div class="column_m container  marb5   fsz14 dark_grey_txt ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">EMI'.$i.' invoice date</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="date" id="emi'.$i.'_payment_date" name="emi'.$i.'_payment_date" class="css-xt766" value="'.date('Y-m-d').'" min="'.date('Y-m-d').'">
								
								 </div>
								   
									</div>
									</div>
									</div>
									
									<div class="thr_clmn  wi_40 padl5">
										<div class="pos_rel talc">
										<div class="column_m container  marb5   fsz14 dark_grey_txt ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">EMI'.$i.' Payment term</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <select class="css-bnguuq dropdown-bg" name="emi'.$i.'_payment_term" id="emi'.$i.'_payment_term">
											        
											  				
															<option value="5" class="lgtgrey2_bg" selected="">5 days</option>
															<option value="10" class="lgtgrey2_bg">10 days</option>
															<option value="15" class="lgtgrey2_bg">15 days</option>
															<option value="30" class="lgtgrey2_bg">30 days</option>
															
												 											
														 
											</select>
								
								 </div>
								   
									</div>
									</div>
									</div>
									
									</div>';
		}
		return $org;
		}
		
		
		function ownerAgreementList($data)
				{
			$dbCon = AppModel::createConnection();
			$building_id=$this->encrypt_decrypt('decrypt',$data['bid']);
			$owner_id=$this->encrypt_decrypt('decrypt',$data['tid']);
			$stmt = $dbCon->prepare("select landloard_object_purchase_agreement.id,object_type,first_name,last_name,monthly_fee_applicable,monthly_fee,landloard_object_purchase_agreement.created_on,object_id from landloard_object_purchase_agreement left join landloard_building_owners on landloard_building_owners.id=landloard_object_purchase_agreement.owner_id where landloard_object_purchase_agreement.building_id=? and owner_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii",$building_id,$owner_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			if($row['object_type']==1)
			{
			$stmt = $dbCon->prepare("select office_apartment_number from landloard_building_port_floors_offices where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$row['object_id']);
			$stmt->execute();
			$resultDetail = $stmt->get_result();
			$rowDetail = $resultDetail->fetch_assoc();
			$row['object_number']=$rowDetail['office_apartment_number'];
			}
			else
			{
			$stmt = $dbCon->prepare("select parking_number from landloard_building_parking where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$row['object_id']);
			$stmt->execute();
			$resultDetail = $stmt->get_result();
			$rowDetail = $resultDetail->fetch_assoc();
			$row['object_number']=$rowDetail['parking_number'];
			}
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			array_push($org,$row);	
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			 
			 	}
				
		function addPurchaseAgreement($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']); 
		$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
		$buildingDetailInfo    = $this->buildingDetailInfo($data);
		
		 
		$entry_date	=strtotime($_POST['entry_date']);
		$stmt = $dbCon->prepare("insert into landloard_object_purchase_agreement (bank_account_id,building_id,owner_id,object_type,object_id ,entry_date,entry_date_value,monthly_fee_applicable,monthly_fee, created_on) values (?,?,?,?,?,?,?,?,?,now())");
		$stmt->bind_param("iiiiissii",$_POST['bank_account_id'],$building_id,$_POST['owner_id'],$_POST['owner_object_type'],$_POST['object_id'],$_POST['entry_date'],$entry_date,$_POST['vat_applicable'],$_POST['total_vat']);
		$stmt->execute();

		$id=$stmt->insert_id;
		
		$depositInvoiceDate=strtotime($_POST['deposit_fee_payment_date']);
		if($_POST['invoice_date_same']==0)
		{
		$buildingDetailInfo['invoice_date']=$_POST['invoice_date'];	
		}
		if($_POST['deposit_fee_applicable']==0)
		{
		$_POST['deposit_fee']=0;
		$deposit_paid=1;		
		}
		else 
		{
			
			$deposit_paid=0;
			$is_deposit=1;
			$dueDate=strtotime($_POST['deposit_fee_payment_date']. ' + '.$_POST['deposit_payment_term'].' days');
			$j=0;
				while($j==0)
					{
					$code=mt_rand(1111,9999); 
					$stmt = $dbCon->prepare("select id from landloard_building_owner_invoice_detail where deposit_code=?");
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
			
		 
			$stmt = $dbCon->prepare("insert into landloard_building_owner_invoice_detail (company_id, deposit_code, agreement_id,payment_amount,invoice_date,payment_due_by,is_deposit) values (?,?,?,?,?,?,?)");
			$stmt->bind_param("iiiissi",$company_id,$code,$id,$_POST['deposit_fee'],$depositInvoiceDate,$dueDate,$is_deposit);
			$stmt->execute();
			
			$_POST['sale_price']=$_POST['sale_price']-$_POST['deposit_fee'];
		}
		if($_POST['discount_applicable']==0)
		{
		$_POST['total_discount']=0;	
		}
		
		if($_POST['charge_applicable']==0)
		{
		$_POST['total_charge']=0;	
		}
		
		$stmt = $dbCon->prepare("update landloard_object_purchase_agreement set `paid_in_full` =?,  `deposit_fee_applicable`=?,  `deposit_fee` =?,  `remaining_fee_paid_in_full` =?,  `total_emis`=?,  `discount_applicable` =?,  `total_discount` =?,  `charge_applicable`=?,  `total_charge` =?,invoice_date_same=?,invoice_date=?,deposit_fee_payment_date=?,deposit_payment_term=?,deposit_paid=? where id=?");
		$stmt->bind_param("iiiiiiiiiiisiii",$_POST['paid_in_full'],$_POST['deposit_fee_applicable'],$_POST['deposit_fee'],$_POST['remaining_fee_paid_in_full'],$_POST['total_emis'],$_POST['discount_applicable'],$_POST['total_discount'],$_POST['charge_applicable'],$_POST['total_charge'],$_POST['invoice_date_same'],$buildingDetailInfo['invoice_date'],$depositInvoiceDate,$_POST['deposit_payment_term'],$deposit_paid,$id);
		$stmt->execute();
		if($_POST['total_emis']==1)
		{
		$emi=100;
		if(date('d')>$buildingDetailInfo['invoice_date'])
		{
			$m=date('m')+1;
		}
		else
		{
			$m=date('m');
		}
		$dateOfPayment=strtotime(date('Y').'-'.$m.'-'.$buildingDetailInfo['invoice_date']);
		$stmt = $dbCon->prepare("insert into landloard_object_agreement_emi_info (agreement_id,payment_amount,invoice_date) values (?,?,?)");
		$stmt->bind_param("iis",$id,$emi,$dateOfPayment);
		$stmt->execute();	
		}
		for($i=1;$i<=$_POST['total_emis'];$i++)
		{
		$emi_payment_term='emi'.$i.'_payment_term';
		$dateOfPayment=strtotime($_POST['emi'.$i.'_payment_date']);
		$emi='emi'.$i;
		 
		$stmt = $dbCon->prepare("insert into landloard_object_agreement_emi_info (agreement_id,payment_amount,invoice_date,emi_payment_term) values (?,?,?,?)");
		$stmt->bind_param("iisi",$id,$_POST[$emi],$dateOfPayment,$_POST[$emi_payment_term]);
		$stmt->execute();	
		
			$is_deposit=0;
			$dueDate=strtotime($_POST['emi'.$i.'_payment_date']. ' + '.$_POST[$emi_payment_term].' days');
			$EmiAmount=($_POST['sale_price']*$_POST[$emi])/100;
			
				$j=0;
				while($j==0)
					{
					$code=mt_rand(1111,9999); 
					$stmt = $dbCon->prepare("select id from landloard_building_owner_invoice_detail where deposit_code=?");
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
			
			$stmt = $dbCon->prepare("insert into landloard_building_owner_invoice_detail (company_id, deposit_code, agreement_id,payment_amount,invoice_date,payment_due_by,is_deposit) values (?, ?, ?,?,?,?,?)");
			$stmt->bind_param("iiiissi",$company_id,$code,$id,$EmiAmount,$dateOfPayment,$dueDate,$is_deposit);
			$stmt->execute();
		}
		$stmt->close();
		$dbCon->close();
		return 1;
		}
		function updateBuildingAmenityDisplay()
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("update landloard_building_amenities set apartment_app_display=?  where id=?");
			$stmt->bind_param("ii", $_POST['app_display'],$_POST['amenity_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		function buildingsAvailableAmenitiesInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$org=array();
			$stmt = $dbCon->prepare("select apartment_app_display,app_display,landloard_building_amenities.id,amenity_name  from landloard_building_amenities left join lanloard_building_amenity_info on lanloard_building_amenity_info.id=landloard_building_amenities.amenity_id where building_id=? and is_available=1");
			$stmt->bind_param("i", $building_id);
			$stmt->execute();
			$result2 = $stmt->get_result();
			while($row2 = $result2->fetch_assoc())
			{
			$row2['enc']= $this -> encrypt_decrypt('encrypt',$row2['id']);
			array_push($org,$row2);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function addParkingTenant($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$parking_id=$this->encrypt_decrypt('decrypt',$data['pid']);
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$building_id=$this->encrypt_decrypt('decrypt',$data['bid']);
			
			if($_POST['tenant_id']==-1)
			{
			$data1 = strip_tags($_POST['image-data1']);
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			$data2 = strip_tags($_POST['image-data3']);
			 
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name2="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name2.".txt", $data2);
			
			$first_name=htmlentities($_POST['first_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$last_name=htmlentities($_POST['last_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$address=htmlentities($_POST['d_address'],ENT_NOQUOTES, 'ISO-8859-1');
			$city=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
			
			$im=date('m');
			$iy=date('Y');
			$id=date('d');
			$stmt = $dbCon->prepare("select invoice_date from landloard_building_rent_price_info where id=?");
			$stmt->bind_param("i", $_POST['tenant_rent_info']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($id>=$row['invoice_date'])
			{
			$im=$im+1;	
			}
			$idate=strtotime($iy.'-'.$im.'-'.$row['invoice_date']);
			$stmt = $dbCon->prepare("insert into landloard_building_tenant (invoice_date,tenant_rent_info,tenant_type,building_id , company_id , first_name  , last_name  , tenant_email  , mobile_country , mobile_number  , fixed_phone_country , landline_number  , street_address  , port_number  , zipcode  , city  , country_of_residence , nationality , passport_number  , issue_month , issue_year , expiry_month , expiry_year , passport_front_image  , passport_back_image  , created_on) values (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, now())");
			$stmt->bind_param("siiiisssisisssssiisiiiiss",$idate,$_POST['tenant_rent_info'],$_POST['tenant_type'], $building_id,$company_id,$first_name,$last_name,$_POST['email'],$_POST['pcountry'],$_POST['p_number'],$_POST['fcountry'],$_POST['f_number'],$address,$_POST['dpo_number'],$_POST['dzip'],$city,$_POST['dcountry'],$_POST['pass_country'],$_POST['id_number'],$_POST['issue_month'],$_POST['issue_year'],$_POST['expiry_month'],$_POST['expiry_year'],$img_name1,$img_name2);
			$stmt->execute();	
			$_POST['tenant_id']=$stmt->insert_id; 
			}
			$move_in_date_val=strtotime($_POST['move_in_date']); 
			if($_POST['move_out_date']=='' || $_POST['move_out_date']==null)
			{
			$move_out_date_val=strtotime(date('Y-m-d'). ' +20 year');
			$_POST['move_out_date']=date('Y-m-d',$move_out_date_val);
			}
			else
			{
			$move_out_date_val=strtotime($_POST['move_out_date']); 	
			}
			
			
			if($_POST['price_frequency']==1)
			{
			$idate=strtotime(date('Y-m-d'). ' +1 day');	
			}
			else if($_POST['price_frequency']==2)
			{
			$idate=strtotime(date('Y-m-d'). ' +7 day');	
			}
			else if($_POST['price_frequency']==3)
			{
			$idate=strtotime(date('Y-m-d'). ' +1 month');	
			}
			else if($_POST['price_frequency']==4)
			{
			$idate=strtotime(date('Y-m-d'). ' +1 year');	
			}
			
			$stmt = $dbCon->prepare("insert into landloard_building_parking_tenant (`parking_id`  , `tenant_id`  , `tenant_parking_price`  , `price_frequency`   , `move_in_date`  , `move_out_date`  , `contract_termination`  , `termination_frequency`   , `deposit_required`   , `deposit_amount`   , `vat_applicable`   , `total_vat` , move_in_date_val, move_out_date_val, next_payment_date, deposit_payment_date,created_on) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,now())");
			$stmt->bind_param("iiiissiiiiiiiiis", $parking_id,$_POST['tenant_id'],$_POST['price'],$_POST['price_frequency'],$_POST['move_in_date'],$_POST['move_out_date'],$_POST['contract_termination'],$_POST['termination_frequency'],$_POST['deposit_required'],$_POST['deposit_amount'],$_POST['vat_applicable'],$_POST['total_vat'],$move_in_date_val,$move_out_date_val,$idate,$_POST['deposit_payment_date']);
			$stmt->execute();	
			 
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		function updateBuildingParkingHrs($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$building_id=$this->encrypt_decrypt('decrypt',$data['bid']);
			
			if($_POST['day1']==0)
			{
			$_POST['day1']=0;	
			$_POST['parking_hrs_mon_fri_open']=0;	
			$_POST['parking_hrs_mon_fri_close']=0;
			}
			
			if($_POST['day2']==0)
			{
			$_POST['day2']=0;	
			$_POST['parking_hrs_sat_sun_open']=0;	
			$_POST['parking_hrs_sat_sun_close']=0;
			}
			 
			$stmt = $dbCon->prepare("update landloard_building_parking set parking_open_month=?,parking_close_month=?,parking_hrs_mon_fri=?,parking_hrs_mon_fri_open=?,parking_hrs_mon_fri_close=?,parking_hrs_sat_sun=?,parking_hrs_sat_sun_open=?,parking_hrs_sat_sun_close=? where building_id=?");
			$stmt->bind_param("iiississi",$_POST['parking_open_month'],$_POST['parking_close_month'],$_POST['day1'],$_POST['parking_hrs_mon_fri_open'],$_POST['parking_hrs_mon_fri_close'],$_POST['day2'],$_POST['parking_hrs_sat_sun_open'],$_POST['parking_hrs_sat_sun_close'],$building_id);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function selectedParkingInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			 
			$stmt = $dbCon->prepare("select parking_price,parking_open_month,parking_close_month,parking_hrs_sat_sun,parking_hrs_sat_sun_open,parking_hrs_sat_sun_close,parking_hrs_mon_fri,parking_hrs_mon_fri_open,parking_hrs_mon_fri_close,id,parking_description  from landloard_building_parking  where building_id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function updateParkingDescription($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['bid']);
			 
			$stmt = $dbCon->prepare("update landloard_building_parking set parking_description=? where building_id=?");
			$stmt->bind_param("si",$_POST['propertyNickname'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateParkingPhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['bid']);
			$data1 = strip_tags($_POST['update_info']);
			define('UPLOAD_DIR','../estorecss/'); 
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			
			$stmt = $dbCon->prepare("select count(building_id) as num from landloard_building_parking_images where building_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$snumber=$row['num']+1;
			
			$stmt = $dbCon->prepare("insert into landloard_building_parking_images (parking_image_path,building_id,sorting_number) values(?, ?, ?)");
			$stmt->bind_param("sii",$img_name1, $aid,$snumber);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function getParkingImageInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['bid']);
			 $stmt = $dbCon->prepare("select parking_image_path,sorting_number,id from landloard_building_parking_images where id=? ");
			$stmt->bind_param("i", $_POST['update_info']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$row1 = $result1->fetch_assoc();
				 
			
				
				 $filename="../estorecss/".$row1 ['parking_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['parking_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['parking_image_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org='<a class="lightbox__img-nav false"></a><img class="lightbox__img" src="../../../'.$image.'">'; 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function updateParkingPhotoOrder($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['bid']);
			
			$stmt = $dbCon->prepare("select sorting_number from landloard_building_parking_images where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$newSort=$row['sorting_number']+$_POST['addDelete'];
			
			
			$stmt = $dbCon->prepare("select id from landloard_building_parking_images where sorting_number=? and building_id=?");
			$stmt->bind_param("ii", $newSort,$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();	
			
			$stmt = $dbCon->prepare("update landloard_building_parking_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row['sorting_number'], $row1['id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("update landloard_building_parking_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $_POST['photoId']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function deleteParkingPhoto($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['bid']);
			
			$stmt = $dbCon->prepare("select sorting_number from landloard_building_parking_images where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("delete from  landloard_building_parking_images where id=?");
			$stmt->bind_param("i",$_POST['photoId']);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select id,sorting_number from landloard_building_parking_images where sorting_number>? and building_id=?");
			$stmt->bind_param("ii", $row['sorting_number'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row1 = $result->fetch_assoc())	
			{
				$newSort=$row1['sorting_number']-1;
			$stmt = $dbCon->prepare("update landloard_building_parking_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $row1['id']);
			$stmt->execute();		
			}
			 
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateParkingPhotoDragging($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['bid']);
			
			$stmt = $dbCon->prepare("select sorting_number from landloard_building_parking_images where id=?");
			$stmt->bind_param("i", $_POST['draggedItem']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select sorting_number from landloard_building_parking_images where id=?");
			$stmt->bind_param("i", $_POST['draggedTarget']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();
			 
			if($row1['sorting_number']>$row['sorting_number'])
			{
			$stmt = $dbCon->prepare("select id,sorting_number from landloard_building_parking_images where sorting_number>? and id<=? and building_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
			$newSort=$rowUpdate['sorting_number']-1;
			$stmt = $dbCon->prepare("update landloard_building_parking_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			else
			{
			$stmt = $dbCon->prepare("select id,sorting_number from landloard_building_parking_images where sorting_number<? and id>=? and building_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
				$newSort=$rowUpdate['sorting_number']+1;
			$stmt = $dbCon->prepare("update landloard_building_parking_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			
			$stmt = $dbCon->prepare("update landloard_building_parking_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row1['sorting_number'], $_POST['draggedItem']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function displayParkingPhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['bid']);
			
			$stmt = $dbCon->prepare("select count(building_id) as num from landloard_building_parking_images where building_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select parking_image_path,sorting_number,id from landloard_building_parking_images where building_id=? order by sorting_number ");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$i=1;
			$org='';
			if($row['num']==1)
			{
				$first="hidden";
				$last="hidden";
			}
			else
			{
			$first="hidden";
			$last="";	
			}
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			while($row1 = $result1->fetch_assoc())
			{
				 
				if($i==$row['num'])
				{
				$last="hidden";	
				}
				
				 $filename="../estorecss/".$row1 ['parking_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['parking_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['parking_image_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org=$org.'<div class="target-indicator padtb10" id="'.$row1['id'].'" ondrop="drop(event)" ondragover="allowDrop(event)"></div>

						<div class="drag-drop__wrapper " draggable="true" id="drag_'.$row1['id'].'" ondragstart="drag(event,'.$row1['id'].')">
																<div class="photo-tile">
																   <div class="handlebar ">
																	  <div class="handlebar__row handlebar__top">
																		<a href="javascript:void(0);" onclick="updatePhotoDecrement('.$row1['id'].');"> <div class="handlebar__cell handlebar__arrow '.$first.' grabbable"><i class="fas fa-chevron-up fsz16"></i></div>
																	  </div></a>
																	  <div class="handlebar__row handlebar__middle">
																		 <div class="handlebar__cell handlebar__grip grabbable"> </div>
																	  </div>
																	  <div class="handlebar__row handlebar__bottom">
																		<a href="javascript:void(0);" onclick="updatePhotoOrderIncreament('.$row1['id'].');"><div class="handlebar__cell handlebar__arrow '.$last.'" tabindex="0" aria-label="Move down"><i class="fas fa-chevron-down fsz16"></i></div></a>
																	  </div>
																   </div>
																   <div class="photo-tile__body">
																	  <img class="photo-tile__image" src="../../../../../'.$image.'" alt="Photo 1">
																	  <div class="photo-tile__content">
																		 <div class="photo-tile__tags xs-tall">
																			<div class="photo-tile__tags__properties"><span class="tag tag--standard tag--success white_txt padrl5">High resolution</span><span class="tag tag--standard tag--neutral padrl5 lgtgrey2_bg">Landscape</span></div>
																			<div class="photo-tile__tags__labels"></div>
																		 </div>
																		 <div class="photo-tile__actions">
																		<a href="javascript:void(0);" class="xsi-mart0 show_popup_modal" data-target="#gratis_popup_error" onclick="getImageInfo('.$row1['id'].');">	<button color="#444444" label="View photo" aria-label="View photo" class="merlin-button css-12d2atf">
																			   <div class="merlin-button__content">View</div>
																			</button></a>
																			<a href="javascript:void(0);" tabindex="0" onclick="deletePhoto('.$row1['id'].');">Delete</a>
																		 </div>
																	  </div>
																   </div>
																</div>
															 </div>';
															 $first="";
															 $i++;
			}	
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function updateFloorParkingDetail()
		{ 
		
			$dbCon = AppModel::createConnection();
			if($_POST['id1']>0)
			{
			$stmt = $dbCon->prepare("select floor_id  from landloard_building_parking_entry_port where id=?");
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();	
			$rowPort = $result->fetch_assoc();	
			if($rowPort['floor_id']==0)
			{
			$stmt = $dbCon->prepare("update landloard_building_parking_entry_port set floor_id=? where id=?");
			$stmt->bind_param("ii",$_POST['id1'], $_POST['id']);
			$stmt->execute();
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return 1;	
			}
			}				
			$stmt = $dbCon->prepare("update landloard_building_parking_entry_port set floor_id=? where id=?");
			$stmt->bind_param("ii",$_POST['id1'], $_POST['id']);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function buildingAvailableParkingForFloor($data)
		{
			$dbCon = AppModel::createConnection();
			$floor_id= $this -> encrypt_decrypt('decrypt',$data['fid']);
			$stmt = $dbCon->prepare("select landloard_building_parking_entry_port.id,parking_number,floor_id  from landloard_building_parking_entry_port left join landloard_building_parking on landloard_building_parking.id=landloard_building_parking_entry_port.parking_id where entry_port_id=? and (floor_id=0 or floor_id=?)");
			$stmt->bind_param("ii", $data['port_id'],$floor_id);
			$stmt->execute();
			$result = $stmt->get_result();	
			$org='<div class="column_m container  marb5 fsz14 dark_grey_txt  ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												 <div class="css-1jzh2co marb15">
												   <p class="paragraph--b1 paragraph--full css-1680uhd">Select the parkings for availability</p>
												   <div class="chip-container">';
			while($rowPort = $result->fetch_assoc())
			{
				if ($rowPort['floor_id']==$floor_id)
						{
						$org=$org.'
			<a href="javascript:void(0);" onclick="updateFloorParkingDetail('.$rowPort['id'].',0);"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">Parking '.$rowPort['parking_number'].'</span>
															   </span>
															</span>
														 </div>
													  </div></a>
													 ';
						}
						else
						{
							$org=$org.'  <a href="javascript:void(0);" onclick="updateFloorParkingDetail('.$rowPort['id'].','.$floor_id.');"><div id="bath-chip" class="css-cedhmb">
																	 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
																		<span class="chip chip_not-selected">
																		   <span class="chip_content">
																			  <div class="css-ylfimb"></div>
																			  <span class="chip_text">Parking '.$rowPort['parking_number'].'</span>
																		   </span>
																		</span>
																	 </div>
																  </div></a>';
						}
			}
			$org=$org.'</div>
												</div>
												<div class="clear"></div>
											 
											
											
											
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div> <div class="clear"></div>';
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		
		function buildingSelectMultiPortInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$a=explode(',',$data['port_id']);
			$stmt = $dbCon->prepare("select id,port_number  from landloard_building_ports where buildingid=?");
			$stmt->bind_param("i", $building_id);
			$stmt->execute();
			$result = $stmt->get_result();	
			$org='<input type="hidden" name="port_detail" id="port_detail" value="'.$data['port_id'].'" />  <div class="column_m container  marb5  mart10 fsz14 dark_grey_txt  ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												 <div class="css-1jzh2co marb15">
												   <p class="paragraph--b1 paragraph--full css-1680uhd">Select the ports for availability</p>
												   <div class="chip-container">';
			while($rowPort = $result->fetch_assoc())
			{
				if (in_array($rowPort['id'], $a))
						{
						$org=$org.'
			<a href="javascript:void(0);" onclick="updatePortDetail('.$rowPort['id'].',0);"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">'.$rowPort['port_number'].'</span>
															   </span>
															</span>
														 </div>
													  </div></a>
													 ';
						}
						else
						{
							$org=$org.'  <a href="javascript:void(0);" onclick="updatePortDetail('.$rowPort['id'].',1);"><div id="bath-chip" class="css-cedhmb">
																	 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
																		<span class="chip chip_not-selected">
																		   <span class="chip_content">
																			  <div class="css-ylfimb"></div>
																			  <span class="chip_text">'.$rowPort['port_number'].'</span>
																		   </span>
																		</span>
																	 </div>
																  </div></a>';
						}
			}
			$org=$org.'</div>
												</div>
												<div class="clear"></div>
											 
											
											
											
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div> <div class="clear"></div>';
			$stmt->close();
			$dbCon->close();
			return $org;
		}
			
		function updateFloorAmenityDisplay()
		{ 
		
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("update landloard_building_floor_amenities set is_amenity_available_on_floor=? where id=?");
			$stmt->bind_param("ii",$_POST['amenity_available'], $_POST['amenity_id']);
			$stmt->execute();	
			 	
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function addParkings($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']); 
			$stmt = $dbCon->prepare("update landloard_buildings set parking_activated=1 where id=?");
			$stmt->bind_param("i",$building_id);
			$stmt->execute();	
			for($i=1; $i<=$_POST['total_parking'];$i++)
			{
			$stmt = $dbCon->prepare("insert into landloard_building_parking (parking_price,building_id,parking_number,parking_area,storage_available,electronic_shocket_available,grid_available) values(?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("diidiii",$_POST['parking_price'],$building_id, $i,$_POST['parking_area'],$_POST['basement_available'],$_POST['tenant_available'],$_POST['penthouse_available']);
			$stmt->execute();	
			$id=$stmt->insert_id;
			$a=explode(',',substr($_POST['port_detail'],0,-1));
			foreach($a as $key)
			{
			$stmt = $dbCon->prepare("insert into landloard_building_parking_entry_port (parking_id,entry_port_id) values(?, ?)");
			$stmt->bind_param("ii",$id, $key);
			$stmt->execute();		
			}			
			}				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateParkings($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']); 
			$parking_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			if($_POST['parking_construction_status']==1)
			{
				$expected_date=$_POST['parking_move_in_date'];
			}
			else
			{
				$expected_date=$_POST['key_parking_move_in_date'];
			}
			$stmt = $dbCon->prepare("update landloard_building_parking set parking_sell_status=?,parking_construction_status=?,expected_move_in_date=?,parking_price=?,parking_number=?,parking_area=?,storage_available=?,electronic_shocket_available=?,grid_available=? where id=?");
			$stmt->bind_param("iisdsdiiii",$_POST['parking_sell_status'],$_POST['parking_construction_status'],$expected_date,$_POST['parking_price'],$_POST['parking_number'],$_POST['parking_area'],$_POST['basement_available'],$_POST['tenant_available'],$_POST['penthouse_available'],$parking_id);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateInvoiceDates($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']); 
			if($_POST['parking_tax_applicable']==0)
			{
				$_POST['parking_payment_tax']=0;
			}
			if($_POST['apartment_tax_applicable']==0)
			{
				$_POST['apartment_payment_tax']=0;
			}
			$stmt = $dbCon->prepare("update landloard_buildings set invoice_date=?,parking_tax_applicable=?,parking_payment_tax=?,apartment_tax_applicable=?,apartment_payment_tax=?,invoice_payment_term=?  where id=?");
			$stmt->bind_param("iiiiiii",$_POST['invoice_date'],$_POST['parking_tax_applicable'],$_POST['parking_payment_tax'],$_POST['apartment_tax_applicable'],$_POST['apartment_payment_tax'],$_POST['invoice_payment_term'],$building_id);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateAmenityHrs($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			if($_POST['day1']==0)
			{
			$_POST['day1']=0;	
			$_POST['amenity_hrs_mon_fri_open']=0;	
			$_POST['amenity_hrs_mon_fri_close']=0;
			}
			
			if($_POST['day2']==0)
			{
			$_POST['day2']=0;	
			$_POST['amenity_hrs_sat_sun_open']=0;	
			$_POST['amenity_hrs_sat_sun_close']=0;
			}
			 
			$stmt = $dbCon->prepare("update landloard_building_amenities set amenity_open_month=?,amenity_close_month=?,amenity_hrs_mon_fri=?,amenity_hrs_mon_fri_open=?,amenity_hrs_mon_fri_close=?,amenity_hrs_sat_sun=?,amenity_hrs_sat_sun_open=?,amenity_hrs_sat_sun_close=? where id=?");
			$stmt->bind_param("iiississi",$_POST['amenity_open_month'],$_POST['amenity_close_month'],$_POST['day1'],$_POST['quite_hrs_mon_fri_open'],$_POST['quite_hrs_mon_fri_close'],$_POST['day2'],$_POST['quite_hrs_sat_sun_open'],$_POST['quite_hrs_sat_sun_close'],$aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateAmenityPhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$data1 = strip_tags($_POST['update_info']);
			define('UPLOAD_DIR','../estorecss/'); 
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			
			$stmt = $dbCon->prepare("select count(building_aminity_detail_id) as num from landloard_building_aminity_images where building_aminity_detail_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$snumber=$row['num']+1;
			
			$stmt = $dbCon->prepare("insert into landloard_building_aminity_images (amenity_image_path,building_aminity_detail_id,sorting_number) values(?, ?, ?)");
			$stmt->bind_param("sii",$img_name1, $aid,$snumber);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function getAmenityImageInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 $stmt = $dbCon->prepare("select amenity_image_path,sorting_number,id from landloard_building_aminity_images where id=? ");
			$stmt->bind_param("i", $_POST['update_info']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$row1 = $result1->fetch_assoc();
				 
			
				
				 $filename="../estorecss/".$row1 ['amenity_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['amenity_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['amenity_image_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org='<a class="lightbox__img-nav false"></a><img class="lightbox__img" src="../../../'.$image.'">'; 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function updateAmenityPhotoOrder($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select sorting_number from landloard_building_aminity_images where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$newSort=$row['sorting_number']+$_POST['addDelete'];
			
			
			$stmt = $dbCon->prepare("select id from landloard_building_aminity_images where sorting_number=? and building_aminity_detail_id=?");
			$stmt->bind_param("ii", $newSort,$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();	
			
			$stmt = $dbCon->prepare("update landloard_building_aminity_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row['sorting_number'], $row1['id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("update landloard_building_aminity_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $_POST['photoId']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function deleteAmenityPhoto($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select sorting_number from landloard_building_aminity_images where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("delete from  landloard_building_aminity_images where id=?");
			$stmt->bind_param("i",$_POST['photoId']);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select id,sorting_number from landloard_building_aminity_images where sorting_number>? and building_aminity_detail_id=?");
			$stmt->bind_param("ii", $row['sorting_number'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row1 = $result->fetch_assoc())	
			{
				$newSort=$row1['sorting_number']-1;
			$stmt = $dbCon->prepare("update landloard_building_aminity_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $row1['id']);
			$stmt->execute();		
			}
			 
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateAmenityPhotoDragging($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select sorting_number from landloard_building_aminity_images where id=?");
			$stmt->bind_param("i", $_POST['draggedItem']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select sorting_number from landloard_building_aminity_images where id=?");
			$stmt->bind_param("i", $_POST['draggedTarget']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();
			 
			if($row1['sorting_number']>$row['sorting_number'])
			{
			$stmt = $dbCon->prepare("select id,sorting_number from landloard_building_aminity_images where sorting_number>? and id<=? and building_aminity_detail_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
			$newSort=$rowUpdate['sorting_number']-1;
			$stmt = $dbCon->prepare("update landloard_building_aminity_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			else
			{
			$stmt = $dbCon->prepare("select id,sorting_number from landloard_building_aminity_images where sorting_number<? and id>=? and building_aminity_detail_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
				$newSort=$rowUpdate['sorting_number']+1;
			$stmt = $dbCon->prepare("update landloard_building_aminity_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			
			$stmt = $dbCon->prepare("update landloard_building_aminity_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row1['sorting_number'], $_POST['draggedItem']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function displayAmenityPhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select count(building_aminity_detail_id) as num from landloard_building_aminity_images where building_aminity_detail_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select amenity_image_path,sorting_number,id from landloard_building_aminity_images where building_aminity_detail_id=? order by sorting_number ");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$i=1;
			$org='';
			if($row['num']==1)
			{
				$first="hidden";
				$last="hidden";
			}
			else
			{
			$first="hidden";
			$last="";	
			}
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			while($row1 = $result1->fetch_assoc())
			{
				 
				if($i==$row['num'])
				{
				$last="hidden";	
				}
				
				 $filename="../estorecss/".$row1 ['amenity_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['amenity_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['amenity_image_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org=$org.'<div class="target-indicator padtb10" id="'.$row1['id'].'" ondrop="drop(event)" ondragover="allowDrop(event)"></div>

						<div class="drag-drop__wrapper " draggable="true" id="drag_'.$row1['id'].'" ondragstart="drag(event,'.$row1['id'].')">
																<div class="photo-tile">
																   <div class="handlebar ">
																	  <div class="handlebar__row handlebar__top">
																		<a href="javascript:void(0);" onclick="updatePhotoDecrement('.$row1['id'].');"> <div class="handlebar__cell handlebar__arrow '.$first.' grabbable"><i class="fas fa-chevron-up fsz16"></i></div>
																	  </div></a>
																	  <div class="handlebar__row handlebar__middle">
																		 <div class="handlebar__cell handlebar__grip grabbable"> </div>
																	  </div>
																	  <div class="handlebar__row handlebar__bottom">
																		<a href="javascript:void(0);" onclick="updatePhotoOrderIncreament('.$row1['id'].');"><div class="handlebar__cell handlebar__arrow '.$last.'" tabindex="0" aria-label="Move down"><i class="fas fa-chevron-down fsz16"></i></div></a>
																	  </div>
																   </div>
																   <div class="photo-tile__body">
																	  <img class="photo-tile__image" src="../../../../../'.$image.'" alt="Photo 1">
																	  <div class="photo-tile__content">
																		 <div class="photo-tile__tags xs-tall">
																			<div class="photo-tile__tags__properties"><span class="tag tag--standard tag--success white_txt padrl5">High resolution</span><span class="tag tag--standard tag--neutral padrl5 lgtgrey2_bg">Landscape</span></div>
																			<div class="photo-tile__tags__labels"></div>
																		 </div>
																		 <div class="photo-tile__actions">
																		<a href="javascript:void(0);" class="xsi-mart0 show_popup_modal" data-target="#gratis_popup_error" onclick="getImageInfo('.$row1['id'].');">	<button color="#444444" label="View photo" aria-label="View photo" class="merlin-button css-12d2atf">
																			   <div class="merlin-button__content">View</div>
																			</button></a>
																			<a href="javascript:void(0);" tabindex="0" onclick="deletePhoto('.$row1['id'].');">Delete</a>
																		 </div>
																	  </div>
																   </div>
																</div>
															 </div>';
															 $first="";
															 $i++;
			}	
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function updateAmenityDescription($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update landloard_building_amenities set amenity_description=? where id=?");
			$stmt->bind_param("si",$_POST['propertyNickname'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateBuildingAmenityHrs($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			if($_POST['day1']==0)
			{
			$_POST['day1']=0;	
			$_POST['amenity_hrs_mon_fri_open']=0;	
			$_POST['amenity_hrs_mon_fri_close']=0;
			}
			
			if($_POST['day2']==0)
			{
			$_POST['day2']=0;	
			$_POST['amenity_hrs_sat_sun_open']=0;	
			$_POST['amenity_hrs_sat_sun_close']=0;
			}
			 
			$stmt = $dbCon->prepare("update landloard_building_amenities set amenity_open_month=?,amenity_close_month=?,amenity_hrs_mon_fri=?,amenity_hrs_mon_fri_open=?,amenity_hrs_mon_fri_close=?,amenity_hrs_sat_sun=?,amenity_hrs_sat_sun_open=?,amenity_hrs_sat_sun_close=? where id=?");
			$stmt->bind_param("iiississi",$_POST['amenity_open_month'],$_POST['amenity_close_month'],$_POST['day1'],$_POST['amenity_hrs_mon_fri_open'],$_POST['amenity_hrs_mon_fri_close'],$_POST['day2'],$_POST['amenity_hrs_sat_sun_open'],$_POST['amenity_hrs_sat_sun_close'],$aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function selectedAmenitiesInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("select amenity_id,amenity_open_month,amenity_close_month,amenity_hrs_sat_sun,amenity_hrs_sat_sun_open,amenity_hrs_sat_sun_close,amenity_hrs_mon_fri,amenity_hrs_mon_fri_open,amenity_hrs_mon_fri_close,app_display,landloard_building_amenities.id,is_available,amenity_name,amenity_description  from landloard_building_amenities left join lanloard_building_amenity_info on lanloard_building_amenity_info.id=landloard_building_amenities.amenity_id where landloard_building_amenities.id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			 
			$stmt->close();
			$dbCon->close();
			return $row;
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
		 
		
		
		function buildingsFloorAvailableAmenitiesInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$floor_id= $this -> encrypt_decrypt('decrypt',$data['fid']);
			 
			$org=array();
			$stmt = $dbCon->prepare("select app_display,landloard_building_amenities.id,amenity_name  from landloard_building_amenities left join lanloard_building_amenity_info on lanloard_building_amenity_info.id=landloard_building_amenities.amenity_id where building_id=? and is_available=1 and landloard_building_amenities.id not in (select landloard_building_amenities_id from landloard_building_floor_amenities where floor_id=?)");
			$stmt->bind_param("ii",$building_id, $floor_id);
			$stmt->execute();
			$result2 = $stmt->get_result();
			while($row2 = $result2->fetch_assoc())
			{
			$stmt = $dbCon->prepare("INSERT INTO landloard_building_floor_amenities (floor_id, landloard_building_amenities_id) VALUES (?, ?)");
			$stmt->bind_param("ii", $floor_id,$row2['id']);
			$stmt->execute();	
			}
			
			$stmt = $dbCon->prepare("select landloard_building_floor_amenities.id,amenity_name,is_amenity_available_on_floor  from landloard_building_floor_amenities left join landloard_building_amenities on landloard_building_amenities.id=landloard_building_floor_amenities.landloard_building_amenities_id left join lanloard_building_amenity_info on lanloard_building_amenity_info.id=landloard_building_amenities.amenity_id where floor_id=? and landloard_building_amenities_id in (select id from landloard_building_amenities where building_id=? and is_available=1)");
			$stmt->bind_param("ii", $floor_id,$building_id);
			$stmt->execute();
			$result2 = $stmt->get_result();
			while($row2 = $result2->fetch_assoc())
			{
			$row2['enc']= $this -> encrypt_decrypt('encrypt',$row2['id']);
			array_push($org,$row2);
			}
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		 function genarateInvoice($data)
			{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$_POST['available_tenants']=substr($_POST['available_tenants'],0,-1);
			$a=explode(',',$_POST['available_tenants']);
			 
			$gdate=strtotime(date('Y-m-d'));
			$im=date('m');
			$iy=date('Y');
			$id=date('d');
			foreach($a as $key)
			{
			$stmt = $dbCon->prepare("select id,apartment_size,teanat_details from landloard_building_port_floors_offices where  floor_id in(select id from landloard_building_port_floors where port_id in (select id from landloard_building_ports where buildingid=?))");
			$stmt->bind_param("i",$building_id);
			$stmt->execute();
			$resultSizeFee = $stmt->get_result();	
			while($rowSizeFee = $resultSizeFee->fetch_assoc())	
			{
			$tenants=explode(',',$rowSizeFee['teanat_details']);
			if(!in_array($key, $tenants))
			{
			continue;
			}	
			
			
			$stmt = $dbCon->prepare("select landloard_building_tenant.created_on,first_name,last_name,tenant_email,first_invoice_generated,subscription_info,deposit_amount,landloard_building_rent_price_info.invoice_date,payment_term,payment_tax,price from landloard_building_tenant  left join landloard_building_rent_price_info on landloard_building_rent_price_info.id=landloard_building_tenant.tenant_rent_info where landloard_building_tenant.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$key);
			$stmt->execute();
			$result = $stmt->get_result();	
			$row = $result->fetch_assoc();
			 
			if($row['subscription_info']==1)
			{
			$idate=0;	
			}
			else
			{
				$ddate=$iy.'-'.$im.'-'.$row['invoice_date'];
				$idate=strtotime($ddate. ' +1 month');
			}
			if($row['first_invoice_generated']==0)
			{
			$rentDate=strtotime($row['created_on']);
			$row['per_day_price']=$row['price']/30;
			$totalDays=round(($gdate-$rentDate)/(60 * 60 * 24));
			$row['price']=$row['per_day_price']*$totalDays;
			}
			else
			{
			$stmt = $dbCon->prepare("select invoice_generated_date from landloard_building_tenant_invoice_detail  where tenant_id=? order by id desc");
			/* bind parameters for markers */
			$stmt->bind_param("i",$key);
			$stmt->execute();
			$result = $stmt->get_result();	
			$rowGenerated = $result->fetch_assoc();
			$totalDays=round(($gdate-$rowGenerated['invoice_generated_date'])/(60 * 60 * 24));
			if($totalDays<28)
			{
			$row['per_day_price']=$row['price']/30;
			$row['price']=$row['per_day_price']*$totalDays;	
			}
			}	
			
			$Dudate=strtotime(date('Y-m-d') . "+".$row['payment_term']." day");
			$Duedate=date('M d Y ',strtotime(date('Y-m-d')). "+".$row['payment_term']." day");
			$tax=($rowSizeFee['apartment_size']*$row['price']*$row['payment_tax'])/100;
			$total=$tax+($rowSizeFee['apartment_size']*$row['price']);	
			$row['price']=$rowSizeFee['apartment_size']*$row['price'];
			$stmt = $dbCon->prepare("update landloard_building_tenant  set invoice_date=?,first_invoice_generated=1 where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("si",$idate,$key);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("insert into `landloard_building_tenant_invoice_detail`(`tenant_id`  , `invoice_generated_date`  , `rent_price`  , `tax_amount`  , `total_amount`  , `payment_due`  , `created_on`)
			values(?,?,?,?,?,?, now())");
			$stmt->bind_param("isiiis",$key,$gdate,$row['price'],$tax,$total,$Dudate);
			$stmt->execute();
			$to=$row['tenant_email'];
			$subject='Tenant invoice';
			$emailContent='<html xmlns="http://www.w3.org/1999/xhtml" style="background-color: rgb(240, 240, 240);"><head>
					  </head><body><div id=":1sm" class="ii gt" jslog="20277; u014N:xr6bB; 4:W251bGwsbnVsbCxbXV0."><div id=":1sl" class="a3s aiL msg7285940315239978508"><u></u>

  
    
  
  <div style="border:0;margin:0;padding:0;min-width:100%;width:100%">


    
    <table bgcolor="#33c5f4" border="0" cellpadding="0" cellspacing="0" width="100%" style="border:0;margin:0;padding:0">
      <tbody>
        <tr>
          <td style="font-size:16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td>

            
            <table class="m_7285940315239978508st-Wrapper" align="center" border="0" cellpadding="0" cellspacing="0" style="width:480px;min-width:480px;max-width:480px">
              <tbody>
                <tr>
                  <td>
                    
  

  <table border="0" cellpadding="0" cellspacing="0" width="480" style="min-width:480px">
  <tbody>
    <tr>
      <td align="center" height="0" style="border:0;margin:0;padding:0;color:#ffffff;display:none!important;font-size:1px;line-height:1px;max-height:0;max-width:0;opacity:0;overflow:hidden">
        <span style="color:#ffffff;text-decoration:none">

          
    New invoice from We provide digital authentication and payment solutions #CF711E93-0001
  

          
          ‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;
          

        </span>
      </td>
    </tr>
  </tbody>
</table>


  <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody>
    <tr>
      <td height="58" style="border:0;margin:0;padding:0;font-size:1px;line-height:1px;max-height:1px">
        <div>&nbsp;</div>
      </td>
    </tr>
  </tbody>
</table>

  <table cellpadding="0" cellspacing="0">
    <tbody>
      
    <tr>
    
        <td style="border:0;border-collapse:collapse;margin:0;padding:0">
    
          <span style="font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;text-decoration:none;font-weight:500;color:rgb(255,255,255);font-size:20px;line-height:24px">
            We provide digital authentication and payment solutions
          </span>
        
  </td>

    
  </tr>
  
    </tbody>
  </table>

  <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody>
    <tr>
      <td height="32" style="border:0;margin:0;padding:0;font-size:1px;line-height:1px;max-height:1px">
        <div>&nbsp;</div>
      </td>
    </tr>
  </tbody>
</table>

  <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
    <tr>
    
      <td align="">
    
        
    <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
    <tr>
    
      <td align="" style="border:0;border-collapse:collapse;margin:0;padding:0;width:100%;width:482px;border-radius:12px;background-color:#e3e8ee;padding:1px">
    
        
      <table cellpadding="0" cellspacing="0" style="width:100%;background-color:#ffffff;border-radius:12px">
    <tbody>
      
        <tr>
    
          <td style="border:0;border-collapse:collapse;margin:0;padding:0">
    

            <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody>
    <tr>
      <td height="32" style="border:0;margin:0;padding:0;font-size:1px;line-height:1px;max-height:1px">
        <div>&nbsp;</div>
      </td>
    </tr>
  </tbody>
</table>

            <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
              <tr>
    

                  <td style="border:0;border-collapse:collapse;margin:0;padding:0;min-width:32px;width:32px;font-size:1px">
    
    &nbsp;
  
  </td>

                <td style="border:0;border-collapse:collapse;margin:0;padding:0">
    
                  

    <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
    <tr>
    
      <td style="border:0;border-collapse:collapse;margin:0;padding:0;width:100%">
    

        <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
    <tr>
    
      <td align="" style="border:0;border-collapse:collapse;margin:0;padding:0;width:100%;padding-bottom:2px">
    
        
          <span style="font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;text-decoration:none;color:#7a7a7a;font-size:14px;line-height:20px;font-weight:500">
            Invoice from We provide digital authentication and payment solutions
          
        </span>
      
  </td>
    
  </tr>
  
    </tbody>
  </table>

        <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
    <tr>
    
      <td align="" style="border:0;border-collapse:collapse;margin:0;padding:0;width:100%;padding-bottom:2px">
    
        
          <span style="font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;text-decoration:none;color:#1a1a1a;font-size:36px;line-height:40px;font-weight:600">
           '.$row['price'].'kr
          
        </span>
      
  </td>
    
  </tr>
  
    </tbody>
  </table>

        <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
    <tr>
    
      <td align="" style="border:0;border-collapse:collapse;margin:0;padding:0;width:100%">
    
        
          
      <span style="font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;text-decoration:none;color:#7a7a7a;font-size:14px;line-height:24px;font-weight:500">
      Due '.$Duedate.'
    </span>
    
        
      
  </td>
    
  </tr>
  
    </tbody>
  </table>

        <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
      <tr>
    
    <td colspan="1" height="16" style="border:0;border-collapse:collapse;margin:0;padding:0;height:16px;font-size:1px;line-height:1px">
    
      &nbsp;
    
  </td>
  
  </tr>

    <tr>
    

      <td height="1" style="border:0;border-collapse:collapse;margin:0;padding:0;height:1px;font-size:1px;background-color:#ebebeb;line-height:1px">
    
        &nbsp;
      
  </td>

    
  </tr>

      <tr>
    
    <td colspan="1" height="12" style="border:0;border-collapse:collapse;margin:0;padding:0;height:12px;font-size:1px;line-height:1px">
    
      &nbsp;
    
  </td>
  
  </tr>
  
    </tbody>
  </table>

      
  </td>

      <td style="border:0;border-collapse:collapse;margin:0;padding:0;width:76px;max-width:76px">
    
        <img src="https://ci3.googleusercontent.com/proxy/o5UCuPdzAzCtI7SLxMFPHcFqXCTenDbWr2X09VB_-KDuRsrCnbbWru_HMkBBD_iNNclwRzsOEAf_M4Sy3QuFN_qbwGlIyIw-fe6T9O6o7EusXcpaz5AxYEEj8tBLyt63-kY=s0-d-e1-ft#https://stripe-images.s3.amazonaws.com/emails/invoices_invoice_illustration.png" width="94" height="91" style="border:0;margin:0 auto;padding:0;display:block" alt="invoice illustration" class="CToWUd" data-bit="iit">
      
  </td>
    
  </tr>
  
    </tbody>
  </table>

      

    

    <table cellpadding="0" cellspacing="0">
    <tbody>
      
      <tr>
    
    <td style="border:0;border-collapse:collapse;margin:0;padding:0;vertical-align:top;white-space:nowrap">
    
      <span style="font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;text-decoration:none;color:#7a7a7a;font-size:14px;line-height:16px">
        To
      </span>
    
  </td>
    <td style="border:0;border-collapse:collapse;margin:0;padding:0;width:24px">
    &nbsp;
  </td>
    <td style="border:0;border-collapse:collapse;margin:0;padding:0">
    
      <span style="font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;text-decoration:none;color:#1a1a1a;font-size:14px;line-height:16px">'.$row['first_name'].' '.$row['last_name'].' </span>
    
  </td>
  
  </tr>

    <tr>
    
    <td colspan="2" height="8" style="border:0;border-collapse:collapse;margin:0;padding:0;height:8px;font-size:1px;line-height:1px">
    
      &nbsp;
    
  </td>
  
  </tr>


      <tr>
    
    <td style="border:0;border-collapse:collapse;margin:0;padding:0;vertical-align:top;white-space:nowrap">
    
      <span style="font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;text-decoration:none;color:#7a7a7a;font-size:14px;line-height:16px">
        From
      </span>
    
  </td>
    <td style="border:0;border-collapse:collapse;margin:0;padding:0;width:24px">
    &nbsp;
  </td>
    <td style="border:0;border-collapse:collapse;margin:0;padding:0">
    
      <span style="font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;text-decoration:none;color:#1a1a1a;font-size:14px;line-height:16px">
        We provide digital authentication and payment solutions
      </span>
    
  </td>
  
  </tr>

    <tr>
    
    <td colspan="2" height="8" style="border:0;border-collapse:collapse;margin:0;padding:0;height:8px;font-size:1px;line-height:1px">
    
      &nbsp;
    
  </td>
  
  </tr>

        <tr>
    
    <td style="border:0;border-collapse:collapse;margin:0;padding:0;vertical-align:top;white-space:nowrap">
    
      <span style="font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;text-decoration:none;color:#7a7a7a;font-size:14px;line-height:16px">
        Memo
      </span>
    
  </td>
    <td style="border:0;border-collapse:collapse;margin:0;padding:0;width:24px">
    &nbsp;
  </td>
    <td style="border:0;border-collapse:collapse;margin:0;padding:0">
    
      <span style="font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;text-decoration:none;color:#1a1a1a;font-size:14px;line-height:16px;white-space:pre-wrap">Vi är verkligen glada att ha dig som kund. Tack för din affär. :)</span>
    
  </td>
  
  </tr>
    
    </tbody>
  </table>


      <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody>
    <tr>
      <td height="24" style="border:0;margin:0;padding:0;font-size:1px;line-height:1px;max-height:1px">
        <div>&nbsp;</div>
      </td>
    </tr>
  </tbody>
</table>

      <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
    <tr>
    
      <td align="" style="border:0;border-collapse:collapse;margin:0;padding:0;width:100%;text-align:center;background-color:#0074d4;border-radius:6px;height:44px">
    
        
    <a style="border:0;margin:0;padding:0;text-decoration:none;outline:0;display:block;text-align:center;padding-right:60px;padding-left:60px" href="#" data-saferedirecturl="#">
      <span style="font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;text-decoration:none;font-weight:500;font-size:16px;line-height:44px;color:rgb(255,255,255)">
        
          Pay this invoice
      
      </span>
    </a>
  
      
  </td>
    
  </tr>
  
    </tbody>
  </table>


  
                
  </td>


                  <td style="border:0;border-collapse:collapse;margin:0;padding:0;min-width:32px;width:32px;font-size:1px">
    
    &nbsp;
  
  </td>
              
  </tr>
            
    </tbody>
  </table>


            <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody>
    <tr>
      <td height="24" style="border:0;margin:0;padding:0;font-size:1px;line-height:1px;max-height:1px">
        <div>&nbsp;</div>
      </td>
    </tr>
  </tbody>
</table>
          
  </td>
        
  </tr>
      
    </tbody>
  </table>
    
      
  </td>
    
  </tr>
  
    </tbody>
  </table>
  
      
  </td>
    
  </tr>
  
    </tbody>
  </table>

  <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody>
    <tr>
      <td height="20" style="border:0;margin:0;padding:0;font-size:1px;line-height:1px;max-height:1px">
        <div>&nbsp;</div>
      </td>
    </tr>
  </tbody>
</table>

  <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
    <tr>
    
      <td align="">
    
        
    <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
    <tr>
    
      <td align="" style="border:0;border-collapse:collapse;margin:0;padding:0;width:100%;width:482px;border-radius:12px;background-color:#e3e8ee;padding:1px">
    
        
      <table cellpadding="0" cellspacing="0" style="width:100%;background-color:#ffffff;border-radius:12px">
    <tbody>
      
        <tr>
    
          <td style="border:0;border-collapse:collapse;margin:0;padding:0">
    

            <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody>
    <tr>
      <td height="32" style="border:0;margin:0;padding:0;font-size:1px;line-height:1px;max-height:1px">
        <div>&nbsp;</div>
      </td>
    </tr>
  </tbody>
</table>

            <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
              <tr>
    


                <td style="border:0;border-collapse:collapse;margin:0;padding:0">
    
                  

    <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
      <tr>
    
        <td style="border:0;border-collapse:collapse;margin:0;padding:0;min-width:32px;width:32px;font-size:1px">
    
    &nbsp;
  
  </td>
        <td nowrap="" style="border:0;border-collapse:collapse;margin:0;padding:0;width:100%">
    
          <span style="font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;text-decoration:none;color:#7a7a7a;font-size:14px;line-height:20px;font-weight:500;white-space:nowrap">
            Invoice #CF711E93-000'.$row['id'].'
          </span>
        
  </td>
      
  </tr>
    
    </tbody>
  </table>

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody>
    <tr>
      <td height="26" style="border:0;margin:0;padding:0;font-size:1px;line-height:1px;max-height:1px">
        <div>&nbsp;</div>
      </td>
    </tr>
  </tbody>
</table>




          


  <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
  <tr>
    

    <td style="border:0;border-collapse:collapse;margin:0;padding:0;min-width:32px;width:32px;font-size:1px">
    
    &nbsp;
  
  </td>

    <td style="border:0;border-collapse:collapse;margin:0;padding:0;padding-left:0px">
    

      <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
    <tr>
    
      <td align="" style="border:0;border-collapse:collapse;margin:0;padding:0;width:100%">
    
        
        <span style="font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;text-decoration:none;color:#1a1a1a;font-size:14px;line-height:16px;font-weight:500;word-break:break-word">Rent</span>
      
      
  </td>
    
  </tr>
  
    </tbody>
  </table>

        <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody>
    <tr>
      <td height="3" style="border:0;margin:0;padding:0;font-size:1px;line-height:1px;max-height:1px">
        <div>&nbsp;</div>
      </td>
    </tr>
  </tbody>
</table>
        <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
    <tr>
    
      <td align="" style="border:0;border-collapse:collapse;margin:0;padding:0;width:100%">
    
        
          <span style="font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;text-decoration:none;color:#999999;font-size:12px;line-height:14px">
            Qty 1
          </span>
        
      
  </td>
    
  </tr>
  
    </tbody>
  </table>


    
  </td>

    <td style="border:0;border-collapse:collapse;margin:0;padding:0;min-width:16px;width:16px;font-size:1px">
    
    &nbsp;
  
  </td>

    <td align="right" style="border:0;border-collapse:collapse;margin:0;padding:0;text-align:right;vertical-align:top">
    

        <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
    <tr>
    
      <td align="right" nowrap="" style="border:0;border-collapse:collapse;margin:0;padding:0;width:100%">
    
        
          <span style="font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;text-decoration:none;color:#1a1a1a;font-size:14px;line-height:16px;font-weight:500;white-space:nowrap">
              '.$row['price'].'kr
          </span>
        
      
  </td>
    
  </tr>
  
    </tbody>
  </table>


    
  </td>

    <td style="border:0;border-collapse:collapse;margin:0;padding:0;min-width:32px;width:32px;font-size:1px">
    
    &nbsp;
  
  </td>

  
  </tr>

  <tr>
    
    <td colspan="5" height="0" style="border:0;border-collapse:collapse;margin:0;padding:0;height:0px;font-size:1px;line-height:1px">
    
      &nbsp;
    
  </td>
  
  </tr>

    </tbody>
  </table>

  <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody>
    <tr>
      <td height="26" style="border:0;margin:0;padding:0;font-size:1px;line-height:1px;max-height:1px">
        <div>&nbsp;</div>
      </td>
    </tr>
  </tbody>
</table><table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
  <tr>
    

    <td style="border:0;border-collapse:collapse;margin:0;padding:0;min-width:32px;width:32px;font-size:1px">
    
    &nbsp;
  
  </td>

    <td style="border:0;border-collapse:collapse;margin:0;padding:0;padding-left:0px">
    

      <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
    <tr>
    
      <td align="" style="border:0;border-collapse:collapse;margin:0;padding:0;width:100%">
    
        
        <span style="font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;text-decoration:none;color:#1a1a1a;font-size:14px;line-height:16px;font-weight:500;word-break:break-word">Tax</span>
      
      
  </td>
    
  </tr>
  
    </tbody>
  </table>

        <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody>
    <tr>
      <td height="3" style="border:0;margin:0;padding:0;font-size:1px;line-height:1px;max-height:1px">
        <div>&nbsp;</div>
      </td>
    </tr>
  </tbody>
</table>
        


    
  </td>

    <td style="border:0;border-collapse:collapse;margin:0;padding:0;min-width:16px;width:16px;font-size:1px">
    
    &nbsp;
  
  </td>

    <td align="right" style="border:0;border-collapse:collapse;margin:0;padding:0;text-align:right;vertical-align:top">
    

        <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
    <tr>
    
      <td align="right" nowrap="" style="border:0;border-collapse:collapse;margin:0;padding:0;width:100%">
    
        
          <span style="font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;text-decoration:none;color:#1a1a1a;font-size:14px;line-height:16px;font-weight:500;white-space:nowrap">
              '.$tax.'kr
          </span>
        
      
  </td>
    
  </tr>
  
    </tbody>
  </table>


    
  </td>

    <td style="border:0;border-collapse:collapse;margin:0;padding:0;min-width:32px;width:32px;font-size:1px">
    
    &nbsp;
  
  </td>

  
  </tr>

  <tr>
    
    <td colspan="5" height="0" style="border:0;border-collapse:collapse;margin:0;padding:0;height:0px;font-size:1px;line-height:1px">
    
      &nbsp;
    
  </td>
  
  </tr>

    </tbody>
  </table>













      

        <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
      <tr>
    
    <td colspan="3" height="16" style="border:0;border-collapse:collapse;margin:0;padding:0;height:16px;font-size:1px;line-height:1px">
    
      &nbsp;
    
  </td>
  
  </tr>

    <tr>
    
        <td style="border:0;border-collapse:collapse;margin:0;padding:0;min-width:32px;width:32px;font-size:1px">
    
    &nbsp;
  
  </td>

      <td height="1" style="border:0;border-collapse:collapse;margin:0;padding:0;height:1px;font-size:1px;background-color:#ebebeb;line-height:1px">
    
        &nbsp;
      
  </td>

        <td style="border:0;border-collapse:collapse;margin:0;padding:0;min-width:32px;width:32px;font-size:1px">
    
    &nbsp;
  
  </td>
    
  </tr>

      <tr>
    
    <td colspan="3" height="16" style="border:0;border-collapse:collapse;margin:0;padding:0;height:16px;font-size:1px;line-height:1px">
    
      &nbsp;
    
  </td>
  
  </tr>
  
    </tbody>
  </table>

      <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
  <tr>
    

    <td style="border:0;border-collapse:collapse;margin:0;padding:0;min-width:32px;width:32px;font-size:1px">
    
    &nbsp;
  
  </td>

    <td style="border:0;border-collapse:collapse;margin:0;padding:0;padding-left:0px">
    

      <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
    <tr>
    
      <td align="" style="border:0;border-collapse:collapse;margin:0;padding:0;width:100%">
    
        
        <span style="font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;text-decoration:none;color:#1a1a1a;font-size:14px;line-height:16px;font-weight:500;word-break:break-word">
          
        Amount due
      
        </span>
      
      
  </td>
    
  </tr>
  
    </tbody>
  </table>



    
  </td>

    <td style="border:0;border-collapse:collapse;margin:0;padding:0;min-width:16px;width:16px;font-size:1px">
    
    &nbsp;
  
  </td>

    <td align="right" style="border:0;border-collapse:collapse;margin:0;padding:0;text-align:right;vertical-align:top">
    

        <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
    <tr>
    
      <td align="right" nowrap="" style="border:0;border-collapse:collapse;margin:0;padding:0;width:100%">
    
        
          <span style="font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;text-decoration:none;color:#1a1a1a;font-size:14px;line-height:16px;font-weight:500;white-space:nowrap">
              '.$total.'kr
          </span>
        
      
  </td>
    
  </tr>
  
    </tbody>
  </table>


    
  </td>

    <td style="border:0;border-collapse:collapse;margin:0;padding:0;min-width:32px;width:32px;font-size:1px">
    
    &nbsp;
  
  </td>

  
  </tr>

  <tr>
    
    <td colspan="5" height="0" style="border:0;border-collapse:collapse;margin:0;padding:0;height:0px;font-size:1px;line-height:1px">
    
      &nbsp;
    
  </td>
  
  </tr>

    </tbody>
  </table>


      <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
      <tr>
    
    <td colspan="3" height="16" style="border:0;border-collapse:collapse;margin:0;padding:0;height:16px;font-size:1px;line-height:1px">
    
      &nbsp;
    
  </td>
  
  </tr>

    <tr>
    
        <td style="border:0;border-collapse:collapse;margin:0;padding:0;min-width:32px;width:32px;font-size:1px">
    
    &nbsp;
  
  </td>

      <td height="1" style="border:0;border-collapse:collapse;margin:0;padding:0;height:1px;font-size:1px;background-color:#ebebeb;line-height:1px">
    
        &nbsp;
      
  </td>

        <td style="border:0;border-collapse:collapse;margin:0;padding:0;min-width:32px;width:32px;font-size:1px">
    
    &nbsp;
  
  </td>
    
  </tr>

      <tr>
    
    <td colspan="3" height="20" style="border:0;border-collapse:collapse;margin:0;padding:0;height:20px;font-size:1px;line-height:1px">
    
      &nbsp;
    
  </td>
  
  </tr>
  
    </tbody>
  </table>
      <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
    <tr>
    
        <td style="border:0;border-collapse:collapse;margin:0;padding:0;min-width:32px;width:32px;font-size:1px">
    
    &nbsp;
  
  </td>

      <td style="border:0;border-collapse:collapse;margin:0;padding:0;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;font-size:14px;line-height:16px;color:#999999">
    
            Questions? Visit our support site at <a style="border:0;margin:0;padding:0;color:#556cd6!important;text-decoration:none;white-space:nowrap" href="http://59.email.stripe.com/CL0/http:%2F%2Fsupport.qloudid.com%2F/1/0101018288050542-e107d7cd-3615-4dd9-95c4-07c40bdaa884-000000/m23LoQ5DNaPIWLd21kwpXZZ6uOdslRA4ChhP5FJootc=261" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://59.email.stripe.com/CL0/http:%252F%252Fsupport.qloudid.com%252F/1/0101018288050542-e107d7cd-3615-4dd9-95c4-07c40bdaa884-000000/m23LoQ5DNaPIWLd21kwpXZZ6uOdslRA4ChhP5FJootc%3D261&amp;source=gmail&amp;ust=1660225813651000&amp;usg=AOvVaw175S6nQEbT9risn6PaD9aH">http://support.https://www.safeqloud.com/</a>, contact us at <a style="border:0;margin:0;padding:0;color:#556cd6!important;text-decoration:none;white-space:nowrap" href="mailto:support@qloudid.com" target="_blank">support@qloudid.com</a>, or call us at <a style="border:0;margin:0;padding:0;color:#556cd6!important;text-decoration:none;white-space:nowrap" href="http://59.email.stripe.com/CL0/tel:46101510125/1/0101018288050542-e107d7cd-3615-4dd9-95c4-07c40bdaa884-000000/o0VH_xQy3XmUzruQDT8XbL5uftyLgyo3g45RCS4Nb80=261" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://59.email.stripe.com/CL0/tel:46101510125/1/0101018288050542-e107d7cd-3615-4dd9-95c4-07c40bdaa884-000000/o0VH_xQy3XmUzruQDT8XbL5uftyLgyo3g45RCS4Nb80%3D261&amp;source=gmail&amp;ust=1660225813651000&amp;usg=AOvVaw0Nxzf4qyAJ7tKw_8J7wVNl">+46 10 151 01 25</a>.
      
  </td>

        <td style="border:0;border-collapse:collapse;margin:0;padding:0;min-width:32px;width:32px;font-size:1px">
    
    &nbsp;
  
  </td>
    
  </tr>
  
    </tbody>
  </table>

  
                
  </td>


              
  </tr>
            
    </tbody>
  </table>


            <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody>
    <tr>
      <td height="24" style="border:0;margin:0;padding:0;font-size:1px;line-height:1px;max-height:1px">
        <div>&nbsp;</div>
      </td>
    </tr>
  </tbody>
</table>
          
  </td>
        
  </tr>
      
    </tbody>
  </table>
    
      
  </td>
    
  </tr>
  
    </tbody>
  </table>
  
      
  </td>
    
  </tr>
  
    </tbody>
  </table>


  


  <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody>
    <tr>
      <td height="32" style="border:0;margin:0;padding:0;font-size:1px;line-height:1px;max-height:1px">
        <div>&nbsp;</div>
      </td>
    </tr>
  </tbody>
</table>

  <table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
      
    <tr>
    
      <td style="border:0;border-collapse:collapse;margin:0;padding:0;width:100%;text-align:center;color:rgb(255,255,255);opacity:0.5">
    
        <span style="font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;text-decoration:none;font-size:12px;line-height:14px">
            Powered by 
                <a style="border:0;margin:0;padding:0;text-decoration:none;outline:0" href="https://59.email.stripe.com/CL0/https:%2F%2Fstripe.com/1/0101018288050542-e107d7cd-3615-4dd9-95c4-07c40bdaa884-000000/y0QfgxqPg6wc37n6kTMmDWoh3Jq__2PNXLcFA_cQoXQ=261" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://59.email.stripe.com/CL0/https:%252F%252Fstripe.com/1/0101018288050542-e107d7cd-3615-4dd9-95c4-07c40bdaa884-000000/y0QfgxqPg6wc37n6kTMmDWoh3Jq__2PNXLcFA_cQoXQ%3D261&amp;source=gmail&amp;ust=1660225813651000&amp;usg=AOvVaw0L8FVF8oLNPEE4izhNa90u">
                <img src="https://ci5.googleusercontent.com/proxy/X51kjsLM_YQnI2UD65hXbdLCOgdOHzJCdEDY8hZqcMykIWIG5nCZtBxJ2xNXd5-ZEhpgBp74MsFe2xOchRD3FPaymipGt5ZdPEUgmi9nJtHR_h3L2hANNL7GBG9kXEY=s0-d-e1-ft#https://stripe-images.s3.amazonaws.com/emails/invoices_stripe_logo_light.png" height="24" width="51" align="middle" style="border:0;line-height:100%;vertical-align:middle" alt="stripe logo" class="CToWUd" data-bit="iit">
                </a>
                &nbsp;&nbsp;|&nbsp;&nbsp;
              
          <a style="border:0;margin:0;padding:0;text-decoration:none;outline:0" href="#" target="_blank" data-saferedirecturl="#">
            <span style="font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;text-decoration:none;color:rgb(255,255,255)">
              Learn more about Stripe Invoicing
            </span>
          </a>
        </span>

      
  </td>
    
  </tr>
  
    </tbody>
  </table>


                  </td>
                </tr>
              </tbody>
            </table>


          </td>
          <td style="font-size:16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
        <tr>
          <td height="64" colspan="3" style="border:0;margin:0;padding:0;font-size:1px;line-height:1px">
            <div>&nbsp;</div>
          </td>
        </tr>
      </tbody>
    </table>
    

<img alt="" src="https://ci4.googleusercontent.com/proxy/f0R6KGKcsOo5TrkiRt-6tsc44odbdE1-TtEMnK4bvv7Pv49IofqsuCz5Q0PyYB_GgS1Diy4r2AWeOFPoQUijNyu-GL_vRgxfZQ3hnM6I4lURi5uAtoKw5MpbfAguD0jw9w5N5GrrMVKA1tQac6BcClQiKvVTM3NaQST3mqUAMvI-We0_dgetekPtEcgyecswv-iM2_CUuSyS_RZGgicT=s0-d-e1-ft#http://59.email.stripe.com/CI0/0101018288050542-e107d7cd-3615-4dd9-95c4-07c40bdaa884-000000/7K1pXX1WulywoA0SyxfzAsC2qGMtSwNoEBsh2l6wrUU=261" style="display:none;width:1px;height:1px" class="CToWUd" data-bit="iit"><div class="yj6qo"></div><div class="adL">
</div></div></div></div>


					</body></html>';
			 
			try {
				 sendEmail($subject, $to, $emailContent);
						}

					catch(Exception $e) {
						$to      = 'kowaken.ghirmai@gmail.com';
						sendEmail($subject, $to, $emailContent);
					   
					}
			}
			
			}
			 
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			 
			 	}
		
		
		function addPricePlan($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$title=htmlentities($_POST['title'],ENT_NOQUOTES, 'ISO-8859-1');
			
			$i=0; 
			$depositAmount='deposit_amount'.$i;
			$rtype='recurring_type'.$i;   
			$ttime='total_time'.$i;
			$rtypec='recurring_typec'.$i;
			$pmodel='price_model'.$i;
			$price='price'.$i;	
			$subscription_info=	'subscription_info'.$i;
			if($_POST[$subscription_info]==1)	
			{
			$recurring_type=0;
			$total_time=0;
			$recurring_typec=0;
			}
			else
			{
			$recurring_type=$_POST[$rtype];
			$total_time=$_POST[$ttime];
			$recurring_typec=$_POST[$rtypec];	
			}
			$stmt = $dbCon->prepare("insert into `landloard_building_rent_price_info`(invoice_date,payment_term,payment_tax,deposit_amount,`price_title`, `price_model`, `price` , `recurring_type`, `recurring_cycle` , `subscription_info`  , `custom_cycle` , `custom_time`,`created_on`,company_id,building_id)
			values(?,?,?,?,?,?,?,?,?,?,?,?, now(),?, ?)");
			$stmt->bind_param("iiiisiiiiiiiii",$_POST['invoice_date'],$_POST['payment_term'],$_POST['payment_tax'],$_POST[$depositAmount],$title,$_POST[$pmodel],$_POST[$price],$recurring_type,$recurring_type,$_POST[$subscription_info],$recurring_typec,$total_time,$company_id,$building_id);
			
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
			 
		}
		
		
		function updatePricePlan($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			  
			$title=htmlentities($_POST['title'],ENT_NOQUOTES, 'ISO-8859-1');
			$subscription_info=	'subscription_info'.$i;
			if($_POST['subscription_info']==1)	
			{
			$recurring_type=0;
			$total_time=0;
			$recurring_typec=0;
			}
			else
			{
			$recurring_type=$_POST['recurring_type'];
			$total_time=$_POST['total_time'];
			$recurring_typec=$_POST['recurring_typec'];	
			}
			
			
			$stmt = $dbCon->prepare("update `landloard_building_rent_price_info` set invoice_date=?,payment_term=?,payment_tax=?, deposit_amount=?,`price_title`=?, `price_model`=?, `price`=? , `recurring_type`=?, `recurring_cycle`=? , `subscription_info`=?  , `custom_cycle`=? , `custom_time`=? where id=?");
			$stmt->bind_param("iiiisiiiiiiii",$_POST['invoice_date'],$_POST['payment_term'],$_POST['payment_tax'],$_POST['deposit_amount'],$title,$_POST['price_model'],$_POST['price'],$recurring_type,$recurring_type, $_POST['subscription_info'], $recurring_typec ,$total_time,$id);
			$stmt->execute();	
			
			
			$im=date('m');
			$iy=date('Y');
			$idat=date('d');
			if($idat>=$_POST['invoice_date'])
			{
			$im=$im+1;	
			}
			$idate=strtotime($iy.'-'.$im.'-'.$_POST['invoice_date']);
			
			$stmt = $dbCon->prepare("update `landloard_building_tenant` set invoice_date=? where tenant_rent_info=?");
			$stmt->bind_param("si",$idate,$id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			 
		}
		
		
		function servicePriceDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			
			$stmt = $dbCon->prepare("select * from landloard_building_rent_price_info  where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		function servicePriceList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$stmt = $dbCon->prepare("select * from landloard_building_rent_price_info  where company_id=? and building_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$building_id);
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
		
		function servicePriceCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_rent_price_info  where company_id=? and building_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$building_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
		}
	
		
		
		function checkEmailInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			 
			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_tenant where building_id=? and tenant_email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $building_id,$_POST['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		
		function checkPassportInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			 
			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_tenant where building_id=? and passport_number=? and nationality=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("isi", $building_id,$_POST['id_number'],$_POST['pass_country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		
			function checkOwnerEmailInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			 
			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_owners where building_id=? and owner_email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $building_id,$_POST['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		
		function checkOwnerPassportInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			 
			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_owners where building_id=? and passport_number=? and nationality=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("isi", $building_id,$_POST['id_number'],$_POST['pass_country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		
		
		function checkEmailInfoOwner($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$tenant_id= $this -> encrypt_decrypt('decrypt',$data['tid']); 
			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_owners where building_id=? and owner_email=? and id!=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("isi", $building_id,$_POST['email'],$tenant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		
		function checkPassportInfoOwner($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$tenant_id= $this -> encrypt_decrypt('decrypt',$data['tid']); 
			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_owners where building_id=? and passport_number=? and nationality=? and id!=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("isii", $building_id,$_POST['id_number'],$_POST['pass_country'],$tenant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		
		
		function checkEmailInfoTenant($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$tenant_id= $this -> encrypt_decrypt('decrypt',$data['tid']); 
			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_tenant where building_id=? and tenant_email=? and id!=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("isi", $building_id,$_POST['email'],$tenant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		
		function checkPassportInfoTenant($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$tenant_id= $this -> encrypt_decrypt('decrypt',$data['tid']); 
			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_tenant where building_id=? and passport_number=? and nationality=? and id!=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("isii", $building_id,$_POST['id_number'],$_POST['pass_country'],$tenant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		function moreTenantDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select * from landloard_building_tenant where building_id=? limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $building_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			if($a%2==0)
			{
			$j=0;	
			}
			else
			{
			$j=1;	
			}
			
			while($row = $result->fetch_assoc())
			{
				$enc= $this -> encrypt_decrypt('encrypt',$row['id']);
				  
				  
				if($j%2==0)
				{
					$bg='lgtgrey_bg';
				}
				else
				{
					$bg='white_bg';
				}
				$org=$org.'<a href="../../editTenantInformation/'.$data['cid'].'/'.$data['bid'].'/'.$enc.'"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.'  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 hidden-xs "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['first_name'],0,1).'</div>
																	</div>
													
													<div class="fleft wi_60   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">'.$row['first_name'].' '.$row['last_name'].'</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">'.$row['tenant_email'].'</span>  </div>
													
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div></a>';
											$j++;
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function moreOwnerDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select * from landloard_building_owners where building_id=? limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $building_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			if($a%2==0)
			{
			$j=0;	
			}
			else
			{
			$j=1;	
			}
			
			while($row = $result->fetch_assoc())
			{
				$enc= $this -> encrypt_decrypt('encrypt',$row['id']);
				  
				  
				if($j%2==0)
				{
					$bg='lgtgrey_bg';
				}
				else
				{
					$bg='white_bg';
				}
				$org=$org.'<a href="../../editOwnerInformation/'.$data['cid'].'/'.$data['bid'].'/'.$enc.'"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.'  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 hidden-xs "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['first_name'],0,1).'</div>
																	</div>
													
													<div class="fleft wi_60   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">'.$row['first_name'].' '.$row['last_name'].'</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">'.$row['owner_email'].'</span>  </div>
													
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div></a>';
											$j++;
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		 function tenantInvoiceList($data)
				{
			$dbCon = AppModel::createConnection();
			$building_id=$this->encrypt_decrypt('decrypt',$data['bid']);
			$idate=strtotime(date('Y-m-d'));
			//echo $idate; die;
			$stmt = $dbCon->prepare("select * from landloard_building_tenant where building_id=? and invoice_date<=? and tenant_type=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("is",$building_id,$idate);
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
			
		 function tenantInvoiceIds($data)
				{
			$dbCon = AppModel::createConnection();
			$building_id=$this->encrypt_decrypt('decrypt',$data['bid']);
			$idate=strtotime(date('Y-m-d'));
			$stmt = $dbCon->prepare("select * from landloard_building_tenant where building_id=? and invoice_date<=?  and tenant_type=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("is",$building_id,$idate);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			 
			while($row = $result->fetch_assoc())
			{
				$org=$org.$row['id'].',';
			 
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			 
			 	}
			
		
		 function tenantList($data)
				{
			$dbCon = AppModel::createConnection();
			$building_id=$this->encrypt_decrypt('decrypt',$data['bid']);
			$stmt = $dbCon->prepare("select * from landloard_building_tenant where building_id=? limit 0,5");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$building_id);
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
		

			 function ownerList($data)
				{
			$dbCon = AppModel::createConnection();
			$building_id=$this->encrypt_decrypt('decrypt',$data['bid']);
			$stmt = $dbCon->prepare("select * from landloard_building_owners where building_id=? limit 0,5");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$building_id);
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
				
				
				
		function completeOwnerList($data)
				{
			$dbCon = AppModel::createConnection();
			$building_id=$this->encrypt_decrypt('decrypt',$data['bid']);
			$stmt = $dbCon->prepare("select * from landloard_building_owners where building_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$building_id);
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
				
		function getObjectInformation($data)
			{
			$dbCon = AppModel::createConnection();
			$building_id=$this->encrypt_decrypt('decrypt',$data['bid']);
			if($_POST['oid']==1)
			{
			$stmt = $dbCon->prepare("select * from landloard_building_port_floors_offices where id not in (select object_id from landloard_object_purchase_agreement where building_id=? and object_type=1) and floor_id in (select id from landloard_building_port_floors where port_id in (select id from landloard_building_ports where buildingid=?))");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii",$building_id,$building_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0"  >Select</option>';
			while($row = $result->fetch_assoc())
			{
			$org=$org.'<option value="'.$row['id'].'"  >Apartment number - '.$row['office_apartment_number'].'</option>';
			}	
			}
			else
			{
			$stmt = $dbCon->prepare("select * from landloard_building_parking where id not in (select object_id from landloard_object_purchase_agreement where building_id=? and object_type=2) and building_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii",$building_id,$building_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0"  >Select</option>';
			while($row = $result->fetch_assoc())
			{
			$org=$org.'<option value="'.$row['id'].'"  >Parking number - '.$row['parking_number'].'</option>';
			}	
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			 
			 	}
				
				
		function getOwnerInformation()
				{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select owner_object_type from landloard_building_owners where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$_POST['oid']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['owner_object_type'];
			 
			 	}
			
			function getSelectedObjectInformation()
			{
			$dbCon = AppModel::createConnection();
			$org='';
			if($_POST['object_type']==1)
			{
			$stmt = $dbCon->prepare("select * from landloard_building_port_floors_offices where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$_POST['oid']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['apartment_construction_status']==2)
			{
				$org=$org.' <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Entry date</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="date" id="entry_date" name="entry_date" class="css-xt766" value="'.date('Y-m-d').'" min="'.date('Y-m-d').'" max="'.date('Y-m-d').'">
								
								 </div>
								   
									 </div>
									 
									 <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Sale price</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="number" id="sale_price" name="sale_price" class="css-xt766" value="'.$row['sale_price'].'" readonly>
								
								 </div>
								   
									 </div>
									';
			}
			else
			{
				$org=$org.' <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Entry date</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="date" id="entry_date" name="entry_date" class="css-xt766" value="'.$row['expected_move_in_date'].'" min="'.$row['expected_move_in_date'].'">
								
								 </div>
								   
									 </div>
									 
									 <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Sale price</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="number" id="sale_price" name="sale_price" class="css-xt766" value="'.$row['sale_price'].'" readonly>
								
								 </div>
								   
									 </div>
									';
			}
			}
			else
			{
			$stmt = $dbCon->prepare("select * from landloard_building_parking where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$_POST['oid']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$org=$org.' <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Entry date</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="date" id="entry_date" name="entry_date" class="css-xt766" value="'.date('Y-m-d').'" min="'.date('Y-m-d').'">
								
								 </div>
								   
									 </div>
									 
									 <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Sale price</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="number" id="sale_price" name="sale_price" class="css-xt766" value="'.$row['parking_area']*$row['parking_price'].'" readonly>
								
								 </div>
								   
									 </div>
									';
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			 
			 	}
				
				
			function agreementList($data)
				{
			$dbCon = AppModel::createConnection();
			$building_id=$this->encrypt_decrypt('decrypt',$data['bid']);
			$stmt = $dbCon->prepare("select landloard_object_purchase_agreement.id,object_type,first_name,last_name from landloard_object_purchase_agreement left join landloard_building_owners on landloard_building_owners.id=landloard_object_purchase_agreement.owner_id where landloard_object_purchase_agreement.building_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$building_id);
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
				
		 function completeTenantList($data)
				{
			$dbCon = AppModel::createConnection();
			$building_id=$this->encrypt_decrypt('decrypt',$data['bid']);
			$stmt = $dbCon->prepare("select * from landloard_building_tenant where building_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$building_id);
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
			
		 function tenantCount($data)
				{
			$dbCon = AppModel::createConnection();
			$building_id=$this->encrypt_decrypt('decrypt',$data['bid']);
			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_tenant where building_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$building_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			 
			 	}
		
		 function ownerCount($data)
				{
			$dbCon = AppModel::createConnection();
			$building_id=$this->encrypt_decrypt('decrypt',$data['bid']);
			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_owners where building_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$building_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			 
			 	}
		 function countryOptions()
				{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from phone_country_code order by country_name");
			
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
			
			
			function countryCode()
				{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from phone_country_code order by country_code");
			
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
		function updateBedTypeInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices_bedrooms set bed_condition=? where id=?");
			$stmt->bind_param("si",$_POST['bed_info'], $_POST['bed_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateBedSizeInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices_bedrooms set bedroom_size=? where id=?");
			$stmt->bind_param("si",$_POST['bed_info'], $_POST['bed_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function addBedroom($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("insert into landloard_building_port_floors_offices_bedrooms (apartment_id, created_on) values (?,now())");
			$stmt->bind_param("i", $aid);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_port_floors_offices_bedrooms where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set bedroom_count=? where id=?");
			$stmt->bind_param("ii", $row['num'],$aid);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		
	function addTenant($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$building_id=$this->encrypt_decrypt('decrypt',$data['bid']);
			
			$data1 = strip_tags($_POST['image-data1']);
			 
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			$data2 = strip_tags($_POST['image-data3']);
			 
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name2="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name2.".txt", $data2);
			
			$first_name=htmlentities($_POST['first_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$last_name=htmlentities($_POST['last_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$address=htmlentities($_POST['d_address'],ENT_NOQUOTES, 'ISO-8859-1');
			$city=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
			
			$im=date('m');
			$iy=date('Y');
			$id=date('d');
			if($_POST['tenant_object_type']!=2)
			{
			$stmt = $dbCon->prepare("select invoice_date from landloard_building_rent_price_info where id=?");
			$stmt->bind_param("i", $_POST['tenant_rent_info']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($id>=$row['invoice_date'])
			{
			$im=$im+1;	
			}
			$idate=strtotime($iy.'-'.$im.'-'.$row['invoice_date']);	
			}
			else
			{
			$idate='';	
			} 
			$stmt = $dbCon->prepare("insert into landloard_building_tenant (tenant_object_type,invoice_date,tenant_rent_info,tenant_type,building_id , company_id , first_name  , last_name  , tenant_email  , mobile_country , mobile_number  , fixed_phone_country , landline_number  , street_address  , port_number  , zipcode  , city  , country_of_residence , nationality , passport_number  , issue_month , issue_year , expiry_month , expiry_year , passport_front_image  , passport_back_image  , created_on) values (?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, now())");
			$stmt->bind_param("isiiiisssisisssssiisiiiiss",$_POST['tenant_object_type'],$idate,$_POST['tenant_rent_info'],$_POST['tenant_type'], $building_id,$company_id,$first_name,$last_name,$_POST['email'],$_POST['pcountry'],$_POST['p_number'],$_POST['fcountry'],$_POST['f_number'],$address,$_POST['dpo_number'],$_POST['dzip'],$city,$_POST['dcountry'],$_POST['pass_country'],$_POST['id_number'],$_POST['issue_month'],$_POST['issue_year'],$_POST['expiry_month'],$_POST['expiry_year'],$img_name1,$img_name2);
			$stmt->execute();	
			 
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		function updateTenant($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$building_id=$this->encrypt_decrypt('decrypt',$data['bid']);
			$tenant_id=$this->encrypt_decrypt('decrypt',$data['tid']);
			
			$data1 = strip_tags($_POST['image-data1']);
			 
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			$data2 = strip_tags($_POST['image-data3']);
			 
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name2="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name2.".txt", $data2);
			
			$first_name=htmlentities($_POST['first_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$last_name=htmlentities($_POST['last_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$address=htmlentities($_POST['d_address'],ENT_NOQUOTES, 'ISO-8859-1');
			$city=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
			$im=date('m');
			$iy=date('Y');
			$id=date('d');
			if($_POST['tenant_object_type']!=2)
			{
			$stmt = $dbCon->prepare("select invoice_date from landloard_building_rent_price_info where id=?");
			$stmt->bind_param("i", $_POST['tenant_rent_info']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($id>=$row['invoice_date'])
			{
			$im=$im+1;	
			}
			$idate=strtotime($iy.'-'.$im.'-'.$row['invoice_date']);	
			}
			else
			{
			$idate='';	
			}
			$stmt = $dbCon->prepare("update landloard_building_tenant set tenant_object_type=?,invoice_date=?,tenant_rent_info=?,tenant_type=?,first_name =?, last_name =?, tenant_email =?, mobile_country=?, mobile_number =?, fixed_phone_country=?, landline_number =?, street_address =?, port_number =?, zipcode =?, city =?, country_of_residence=?, nationality=?, passport_number =?, issue_month=?, issue_year=?, expiry_month=?, expiry_year=?, passport_front_image =?, passport_back_image=? where id=?");
			$stmt->bind_param("isiisssisisssssiisiiiissi",$_POST['tenant_object_type'],$idate,$_POST['tenant_rent_info'],$_POST['tenant_type'], $first_name,$last_name,$_POST['email'],$_POST['pcountry'],$_POST['p_number'],$_POST['fcountry'],$_POST['f_number'],$address,$_POST['dpo_number'],$_POST['dzip'],$city,$_POST['dcountry'],$_POST['pass_country'],$_POST['id_number'],$_POST['issue_month'],$_POST['issue_year'],$_POST['expiry_month'],$_POST['expiry_year'],$img_name1,$img_name2,$tenant_id);
			$stmt->execute();	
			 
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		function addOwner($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$building_id=$this->encrypt_decrypt('decrypt',$data['bid']);
			
			$data1 = strip_tags($_POST['image-data1']);
			 
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			$data2 = strip_tags($_POST['image-data3']);
			 
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name2="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name2.".txt", $data2);
			
			$first_name=htmlentities($_POST['first_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$last_name=htmlentities($_POST['last_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$address=htmlentities($_POST['d_address'],ENT_NOQUOTES, 'ISO-8859-1');
			$city=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
			 
			$stmt = $dbCon->prepare("insert into landloard_building_owners (owner_object_type,owner_type,building_id , company_id , first_name  , last_name  , owner_email  , mobile_country , mobile_number  , fixed_phone_country , landline_number  , street_address  , port_number  , zipcode  , city  , country_of_residence , nationality , passport_number  , issue_month , issue_year , expiry_month , expiry_year , passport_front_image  , passport_back_image  , created_on) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, now())");
			$stmt->bind_param("iiiisssisisssssiisiiiiss",$_POST['owner_object_info'],$_POST['owner_type'], $building_id,$company_id,$first_name,$last_name,$_POST['email'],$_POST['pcountry'],$_POST['p_number'],$_POST['fcountry'],$_POST['f_number'],$address,$_POST['dpo_number'],$_POST['dzip'],$city,$_POST['dcountry'],$_POST['pass_country'],$_POST['id_number'],$_POST['issue_month'],$_POST['issue_year'],$_POST['expiry_month'],$_POST['expiry_year'],$img_name1,$img_name2);
			$stmt->execute();	
			 
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		function updateOwner($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$building_id=$this->encrypt_decrypt('decrypt',$data['bid']);
			$owner_id=$this->encrypt_decrypt('decrypt',$data['tid']);
			
			$data1 = strip_tags($_POST['image-data1']);
			 
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			$data2 = strip_tags($_POST['image-data3']);
			 
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name2="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name2.".txt", $data2);
			
			$first_name=htmlentities($_POST['first_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$last_name=htmlentities($_POST['last_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$address=htmlentities($_POST['d_address'],ENT_NOQUOTES, 'ISO-8859-1');
			$city=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
			 
			$stmt = $dbCon->prepare("update landloard_building_owners set owner_object_type=?,owner_type=?,first_name =?, last_name =?, owner_email =?, mobile_country=?, mobile_number =?, fixed_phone_country=?, landline_number =?, street_address =?, port_number =?, zipcode =?, city =?, country_of_residence=?, nationality=?, passport_number =?, issue_month=?, issue_year=?, expiry_month=?, expiry_year=?, passport_front_image =?, passport_back_image=? where id=?");
			$stmt->bind_param("iisssisisssssiisiiiissi",$_POST['owner_object_info'],$_POST['owner_type'], $first_name,$last_name,$_POST['email'],$_POST['pcountry'],$_POST['p_number'],$_POST['fcountry'],$_POST['f_number'],$address,$_POST['dpo_number'],$_POST['dzip'],$city,$_POST['dcountry'],$_POST['pass_country'],$_POST['id_number'],$_POST['issue_month'],$_POST['issue_year'],$_POST['expiry_month'],$_POST['expiry_year'],$img_name1,$img_name2,$owner_id);
			$stmt->execute();	
			 
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
	
		
		
	
		function deleteBedroom($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_port_floors_offices_bedrooms where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']>1)
			{
			$stmt = $dbCon->prepare("select max(id) as m_id from landloard_building_port_floors_offices_bedrooms where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("delete from landloard_building_port_floors_offices_bedrooms where id=?");
			$stmt->bind_param("i", $row['m_id']);
			$stmt->execute();

			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_port_floors_offices_bedrooms where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set bedroom_count=? where id=?");
			$stmt->bind_param("ii", $row['num'],$aid);
			$stmt->execute();
			
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
		function bedroomDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select * from landloard_building_port_floors_offices_bedrooms where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$j++;
				$org=$org.' <div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile'.$j.'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold">Bedroom '.$j.'
								<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="profile'.$j.'" class=" " style="display: block;">	
										 
									  
											<div id="'.$row['id'].'">';
			 
			$stmt = $dbCon->prepare("select * from apartment_bed_condition");
			$stmt->execute();
			$result2 = $stmt->get_result();
			$options='';
			
			while($row2= $result2->fetch_assoc())
			{	
			if($row2['bed_condition']==$row['bed_condition'])
			{
				$options=$options.'<option value="'.$row2['bed_condition'].'" selected>'.$row2['bed_condition'].'</option>';
			}
			else
			{
			$options=$options.'<option value="'.$row2['bed_condition'].'">'.$row2['bed_condition'].'</option>';	
			}
			}
			
				$org=$org.'<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt brd">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_50 xxs-wi_55  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Bedroom size (m2)</span>
													 
													 </div>
													 
											<div class="wi_70  xs-mar0 xs-padt10">		
												<div class="on_clmn mart10 ">
								<div class="pos_rel">											
											<input type="text" name="bedroom_size" id="bedroom_size" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg    tall padl0 ffamily_avenir red_f5a0a5_txt" style="text-align-last:center;" value="'.$row['bedroom_size'].'" onfocusout="updateBedSizeInfo('.$row['id'].',this.value);"> 
											  
											</div>
											</div>
												
											</div>	
											<div class="clear"></div>
											 	
											</div>
											
											
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div>
									
									
									<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt brd">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_50 xxs-wi_55  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Bedroom condition</span>
													 
													 </div>
													 
											<div class="wi_70  xs-mar0 xs-padt10">		
												<div class="on_clmn mart10 " >
								<div class="pos_rel">											
											<select name="position_type" id="position_type" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg dropdown-bg  tall padl0 ffamily_avenir red_f5a0a5_txt" style="text-align-last:center;" onchange="updateBedTypeInfo('.$row['id'].',this.value);"> 
											 '.$options.'
														 
											</select>
											</div>
											</div>
												
											</div>	
											<div class="clear"></div>
											 
											</div>
											
											
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div>';	
								 								
											
			
			$org=$org.'</div><div class="clear"></div>
									</div>
					 		 <div class="clear"></div>
					</div>';
			}
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		function bedroomCount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_port_floors_offices_bedrooms where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("insert into landloard_building_port_floors_offices_bedrooms (apartment_id, created_on) values (?,now())");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select * from landloard_building_port_floors_offices where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$apartment_completed=$row['apartment_completed']+10;
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set apartment_completed=? where id=?");
			$stmt->bind_param("ii",$apartment_completed, $aid);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_port_floors_offices_bedrooms where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			}
			else if($row['num']>0)
			{
			 
			$stmt = $dbCon->prepare("select * from landloard_building_port_floors_offices where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['apartment_completed']==40)
			{
			$apartment_completed=$row['apartment_completed']+10;
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set apartment_completed=? where id=?");
			$stmt->bind_param("ii",$apartment_completed, $aid);
			$stmt->execute();	
			}
			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_port_floors_offices_bedrooms where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			}
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set bedroom_count=? where id=?");
			$stmt->bind_param("ii", $row['num'],$aid);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return $row['num'];	
		}
		
		
		
		 function propertyTypeEntranceInfo()
		{ 
		
		$dbCon = AppModel::createConnection();
			 
		$org='';
			 						
		if($_POST['private_entrance']==1)
		{
			$private_entrance='<a href="javascript:void(0);" onclick="updatePrivateDoor(0);">
										 <div class="css-cedhmb">
												  <div tabindex="0" role="button" id="private_door" class="css-1w0xfwu">
													 <span class="chip chip_is-selected">
													 <span class="chip_content">
														<div class="css-utgzrm"></div>
														<span class="chip_text">Private entrance door</span>
													 </span>
												  </span>
												  </div>
											   </div>
											   </a>';
		}
		else
		{
		$private_entrance='<a href="javascript:void(0);" onclick="updatePrivateDoor(1);">
												<div  class="css-cedhmb">
														 <div tabindex="0" role="button"  class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Private entrance door</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		if($_POST['elevator']==1)
		{
			$elevator='<a href="javascript:void(0);" onclick="updateElevator(0);">
			<div  class="css-cedhmb">
						   <div tabindex="0" role="button"   class="css-1w0xfwu">
							  <span class="chip chip_is-selected">
													 <span class="chip_content">
														<div class="css-utgzrm"></div>
														<span class="chip_text">Elevator</span>
													 </span>
												  </span>
						   </div>
						</div></a>';
		}
		else
		{
		$elevator='<a href="javascript:void(0);" onclick="updateElevator(1);">
		<div   class="css-cedhmb">
														 <div tabindex="0" role="button"   class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Elevator</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		 $org=$org.''.$private_entrance.''.$elevator;
			 
			 
			$dbCon->close();
			return $org;	
		}
		
		
		
		function portFloorApartmentList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['fid']);  
			$stmt = $dbCon->prepare("select * from landloard_building_port_floors_offices  where floor_id=? and is_office=0");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				
			$stmt = $dbCon->prepare("select * from landloard_apartment_type");
			 
			$stmt->execute();
			$result2 = $stmt->get_result();
			$org1='';
			$j++;
			while($rowType = $result2->fetch_assoc())
			{
				
			if($rowType['id']==$rowAvailable['office_apartment_type'])	
			{
			$org1=$org1.'<option value="'.$rowType['id'].'" selected>'.$rowType['apartment_type'].'</option>';	
			}
			else
			$org1=$org1.'<option value="'.$rowType['id'].'">'.$rowType['apartment_type'].'</option>';	
			}
				
			$org=$org.'<div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#apartment'.$j.'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold">Apartment '.$j.'
								<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="apartment'.$j.'" class=" " style="display: block;">	
								<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Apartment type</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <select class="css-bnguuq dropdown-bg" onchange="updateApartmentType(this.value,'.$rowAvailable['id'].');">
								 '.$org1.'
								 </select>
								
								 </div>
								   
									 </div>

			<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Apartment number</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="number"   class="css-xt766" value="'.$rowAvailable['office_apartment_number'].'" onchange="updateApartmentNumber(this.value,'.$rowAvailable['id'].');">
								
								 </div>
								   
									 </div>
									 
									 
									  <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Tenant name</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="text"   class="css-xt766" value="'.$rowAvailable['tenant_name'].'" onchange="updateApartmentNumber(this.value,'.$rowAvailable['id'].');">
								
								 </div>
								   
									 </div>
									 </div>
									 </div>
									  <div class="clear"></div>';	
			}
		$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
			function portFloorOfficeList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['fid']);  
			$stmt = $dbCon->prepare("select * from landloard_building_port_floors_offices  where floor_id=? and is_office=1");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				$j++;
			$stmt = $dbCon->prepare("select * from landloard_office_type");
			 
			$stmt->execute();
			$result2 = $stmt->get_result();
			$org1='';
			
			while($rowType = $result2->fetch_assoc())
			{
				
			if($rowType['id']==$rowAvailable['office_apartment_type'])	
			{
			$org1=$org1.'<option value="'.$rowType['id'].'" selected>'.$rowType['office_type'].'</option>';	
			}
			else
			$org1=$org1.'<option value="'.$rowType['id'].'">'.$rowType['office_type'].'</option>';	
			}
			$org=$org.'<div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#office'.$j.'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold">Office '.$j.'
								<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="office'.$j.'" class=" " style="display: block;">	
								<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Office type</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <select class="css-bnguuq dropdown-bg" onchange="updateApartmentType(this.value,'.$rowAvailable['id'].');">
								 '.$org1.'
								 </select>
								
								 </div>
								   
									 </div>
									 <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Office number</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="number"   class="css-xt766" value="'.$rowAvailable['office_apartment_number'].'" onchange="updateApartmentNumber(this.value,'.$rowAvailable['id'].');">
								
								 </div>
								   
									 </div>
									 
									 
									  <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Tenant name</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="text"   class="css-xt766" value="'.$rowAvailable['tenant_name'].'" onchange="updateApartmentTenant(this.value,'.$rowAvailable['id'].');">
								
								 </div>
								  </div>
								   
									 </div> 
									 </div>
									 
									  <div class="clear"></div>';	
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function checkAddress()
		{
			$dbCon = AppModel::createConnection();
			$address=str_replace(' ', '%20',urldecode($_POST['address'])); 
			$url = "http://api.locationiq.com/v1/autocomplete.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&q=".$address;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			if(isset($response['error']))
			{
			
			return 0;	
			}
			else
			{
				
			return $responseJson;
			}
				
		}
		
		function checkAddresslatLong()
		{
			$dbCon = AppModel::createConnection();
			$address=str_replace(' ', '%20',urldecode($_POST['address'])); 
			$url="https://us1.locationiq.com/v1/reverse.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&lat=".$_POST['lat']."&lon=".$_POST['lon']."&format=json";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			 
			if(isset($response['error']))
			{
			
			return 0;	
			}
			else
			{
				
			return $responseJson;
			}
				
		}
		
		
		function addBuilding($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);  
			$url="https://us1.locationiq.com/v1/reverse.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&lat=".$_POST['latit']."&lon=".$_POST['longi']."&format=json";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			$response = json_decode($responseJson,true);
			if($_POST['building_name']=='' || $_POST['building_name']==null)
			{
			$name=htmlentities($_POST['street_address'],ENT_NOQUOTES, 'ISO-8859-1');
			}
			else
			{
			$name=htmlentities($_POST['building_name'],ENT_NOQUOTES, 'ISO-8859-1');
			}
			
			$street=htmlentities($_POST['street_address'],ENT_NOQUOTES, 'ISO-8859-1');
			$city=htmlentities($_POST['address_city'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into landloard_buildings (building_type_info,building_type,amenities_available,tenant_available,pricing_available,invoice_available,country_id,block_number,basement_available,penthouse_available,garage_available,vitech_region,vitech_city,vitech_area,company_id, building_name,street_address,city, state,latitude,longitude,total_ports,zipcode) values (?,?,?,?,?,?,?, ?,?, ?, ?,?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("iiiiiiisiiiiiiissssssis",$_POST['building_type_info'],$_POST['building_type'],$_POST['amenities_available'],$_POST['tenant_available'],$_POST['pricing_available'],$_POST['invoice_available'],$_POST['country_id'],$_POST['block_name'],$_POST['basement_available'],$_POST['penthouse_available'],$_POST['garage_available'],$_POST['vitech_region_id'],$_POST['vitech_city_id'],$_POST['vitech_area_id'], $company_id,$name,$street,$city,$response['address']['state'],$_POST['latit'],$_POST['longi'],$_POST['total_stairs'],$_POST['zip_address']);
			$stmt->execute();	
			$id=$stmt->insert_id;
			 
			if($_POST['building_completed']==1)
			{
				$_POST['s_date']='';
				$_POST['e_date']='';
				$_POST['complete_date']=strtotime($_POST['complete_date']);
			}
			else
			{
				$_POST['s_date']=strtotime($_POST['s_date']);
				$_POST['e_date']=strtotime($_POST['e_date']);
				$_POST['complete_date']='';
			}
			$stmt = $dbCon->prepare("update landloard_buildings set building_completed=?,start_date=?,expected_end_date=?,completion_date=?,building_seller=?,broker_commission=? where id=?");
			$stmt->bind_param("isssiii",$_POST['building_completed'],$_POST['s_date'],$_POST['e_date'],$_POST['complete_date'],$_POST['building_seller'],$_POST['broker_commission'], $id);
			$stmt->execute();	
			
			
			for($i=1;$i<=$_POST['total_stairs'];$i++)
			{
				$j='port_number'.$i;
				$tf='total_floor'.$i;
				$elevator='elevator'.$i;
			$stmt = $dbCon->prepare("insert into landloard_building_ports (buildingid, port_number,total_floors,elevator_available) values (?, ?, ?, ?)");
			$stmt->bind_param("isii", $id,$_POST[$j],$_POST[$tf],$_POST[$elevator]);
			$stmt->execute();	
			$id1=$stmt->insert_id;	
			for($j=1; $j<=$_POST[$tf];$j++)
			{
			$stmt = $dbCon->prepare("insert into landloard_building_port_floors(port_id, floor_number) values (?, ?)");
			$stmt->bind_param("ii", $id1,$j);
			$stmt->execute();	
			}
			
			}
			
			$stmt = $dbCon->prepare("select min(id) as port_id  from landloard_building_ports where buildingid=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();	
			$rowPort = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select *  from lanloard_building_amenity_info");
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowAvailable = $result->fetch_assoc())
			{
			if($rowAvailable['multi_port_available']==1)
			{
			$port_id=$rowPort['port_id'].',';
			}
			else
			{
			$port_id=$rowPort['port_id'];
			}
			$stmt = $dbCon->prepare("INSERT INTO landloard_building_amenities (building_id, amenity_id,port_id) VALUES (?, ?, ?)");
			$stmt->bind_param("iis", $id,$rowAvailable['id'],$port_id);
			$stmt->execute();	
			}
			
			 
			$stmt->close();
			$dbCon->close();
			return 1;
				
		}
		
		function updateBuilding($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);  
			$bid= $this -> encrypt_decrypt('decrypt',$data['bid']);  
			$url="https://us1.locationiq.com/v1/reverse.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&lat=".$_POST['latit']."&lon=".$_POST['longi']."&format=json";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			$response = json_decode($responseJson,true);
			if($_POST['building_name']=='' || $_POST['building_name']==null)
			{
			$name=htmlentities($_POST['street_address'],ENT_NOQUOTES, 'ISO-8859-1');
			}
			else
			{
			$name=htmlentities($_POST['building_name'],ENT_NOQUOTES, 'ISO-8859-1');
			}
			//print_r($_POST); die;
			$street=htmlentities($_POST['street_address'],ENT_NOQUOTES, 'ISO-8859-1');
			$city=htmlentities($_POST['address_city'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("update landloard_buildings set amenities_available=?,tenant_available=?,pricing_available=?,invoice_available=?,country_id=?,block_number=?,basement_available=?,penthouse_available=?,garage_available=?,vitech_region=?,vitech_city=?,vitech_area=?,company_id=?, building_name=?,street_address=?,city=?, state=?,latitude=?,longitude=?,total_ports=?,zipcode=? where id=?");
			$stmt->bind_param("iiiiisiiiiiiissssssisi",$_POST['amenities_available'],$_POST['tenant_available'],$_POST['pricing_available'],$_POST['invoice_available'],$_POST['country_id'],$_POST['block_name'],$_POST['basement_available'],$_POST['penthouse_available'],$_POST['garage_available'],$_POST['vitech_region_id'],$_POST['vitech_city_id'],$_POST['vitech_area_id'], $company_id,$name,$street,$city,$response['address']['state'],$_POST['latit'],$_POST['longi'],$_POST['total_stairs'],$_POST['zip_address'],$bid);
			$stmt->execute();	
			
			$buildingDetailInfo    = $this->buildingDetailInfo($data);
			if($buildingDetailInfo['building_completed']==2)
			{
			if($_POST['building_completed']==1)
			{
				$_POST['s_date']='';
				$_POST['e_date']='';
				$_POST['complete_date']=strtotime($_POST['complete_date']);
			}
			else
			{
				$_POST['s_date']=strtotime($_POST['s_date']);
				$_POST['e_date']=strtotime($_POST['e_date']);
				$_POST['complete_date']='';
			}
			$stmt = $dbCon->prepare("update landloard_buildings set building_completed=?,start_date=?,expected_end_date=?,completion_date=?,building_seller=?,broker_commission=? where id=?");
			$stmt->bind_param("isssiii",$_POST['building_completed'],$_POST['s_date'],$_POST['e_date'],$_POST['complete_date'],$_POST['building_seller'],$_POST['broker_commission'], $bid);
			$stmt->execute();	
			}
				
			
			
			
			$a=explode(',',substr($_POST['port_floor_ids'],0,-1));
			foreach($a as $key)
			{
			$j='port_number_'.$key;
			$elevator='elevator_'.$key;
			$stmt = $dbCon->prepare("update landloard_building_ports set port_number=?,elevator_available=? where id=?");
			$stmt->bind_param("sii", $_POST[$j],$_POST[$elevator],$key);
			$stmt->execute();	
			}
			
			for($i=1;$i<=$_POST['total_stairs'];$i++)
			{
			$j='port_number'.$i;
			$tf='total_floor'.$i;
			$elevator='elevator'.$i;
			$stmt = $dbCon->prepare("insert into landloard_building_ports (buildingid, port_number,total_floors,elevator_available) values (?, ?, ?, ?)");
			$stmt->bind_param("isii", $bid,$_POST[$j],$_POST[$tf],$_POST[$elevator]);
			$stmt->execute();	
			$id1=$stmt->insert_id;	
			 
			for($j=1; $j<=$_POST[$tf];$j++)
			{
			$stmt = $dbCon->prepare("insert into landloard_building_port_floors(port_id, floor_number) values (?, ?)");
			$stmt->bind_param("ii", $id1,$j);
			$stmt->execute();	
			}
			
			}
			 
			
			 
			$stmt->close();
			$dbCon->close();
			return 1;
				
		}
		
		function addSociety($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']); 
			$a=explode(',',substr($_POST['b_id'],0,-1));
			$name=htmlentities($_POST['society_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into landloard_society (company_id, society_name,created_on) values (?, ?, now())");
			$stmt->bind_param("is", $company_id,$name);
			$stmt->execute();	
			$id=$stmt->insert_id;
			 
			foreach($a as $key)
			{
			$stmt = $dbCon->prepare("insert into landloard_society_buildings(society_id, building_id,created_on) values (?, ?, now())");
			$stmt->bind_param("ii", $id,$key);
			$stmt->execute();	
			}
			 
			$stmt->close();
			$dbCon->close();
			return 1;
				
		}
		
		function updateBuildingSociety($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']); 
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']); 
			 
			$stmt = $dbCon->prepare("insert into landloard_society_buildings(society_id, building_id,created_on) values (?, ?, now())");
			$stmt->bind_param("ii", $_POST['society_id'],$building_id);
			$stmt->execute();	
			 
			$stmt->close();
			$dbCon->close();
			return 1;
				
		}
		
		
		function addApartment($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['fid']);  
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']); 
			 $is_office=0;
			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_port_floors_offices  where floor_id=? and is_office=0");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$num=$rowAvailable['num']+1;
			if(isset($_POST['apartment_sell_status'])){
			if($_POST['apartment_construction_status']==1)
			{
				$expected_date=$_POST['apartment_move_in_date'];
			}
			else
			{
				$expected_date=$_POST['key_apartment_move_in_date'];
			}
			 
			$apartment_tenant=htmlentities($_POST['apartment_tenant'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into landloard_building_port_floors_offices (apartment_sell_status,apartment_construction_status,expected_move_in_date,sale_price, price_m2, orientation, floor_id, office_apartment_number,tenant_name,apartment_size,private_door_info,elevator_info,created_on) values (?, ?,?,?, ?,?,?, ?,?, ?,?, ?, now())");
			$stmt->bind_param("iisidiiisiii",$_POST['apartment_sell_status'],$_POST['apartment_construction_status'],$expected_date,$_POST['apartment_price'],$_POST['apartment_price_m2'],$_POST['apartment_orientation'], $company_id,$_POST['apartment_number'],$apartment_tenant,$_POST['apartment_size'],$_POST['private_door_info'],$_POST['elevator_info']);
			$stmt->execute();
			}
			else
			{
			$apartment_tenant=htmlentities($_POST['apartment_tenant'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into landloard_building_port_floors_offices (sale_price, price_m2, orientation, floor_id, office_apartment_number,tenant_name,apartment_size,private_door_info,elevator_info,created_on) values (?, ?,?,?, ?,?, ?,?, ?, now())");
			$stmt->bind_param("idiiisiii",$_POST['apartment_price'],$_POST['apartment_price_m2'],$_POST['apartment_orientation'], $company_id,$_POST['apartment_number'],$apartment_tenant,$_POST['apartment_size'],$_POST['private_door_info'],$_POST['elevator_info']);
			$stmt->execute();	
			}				
			$stmt = $dbCon->prepare("update landloard_building_port_floors set total_apartment=? where id=?");
			$stmt->bind_param("ii",$num, $company_id);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
				
		}
		
		
		function updateApartmentConstruction($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['fid']);  
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']); 
			$apartment_id= $this -> encrypt_decrypt('decrypt',$data['aid']); 
			if($_POST['apartment_construction_status']==1)
			{
				$expected_date=$_POST['apartment_move_in_date'];
			}
			else
			{
				$expected_date=$_POST['key_apartment_move_in_date'];
			}
			 $stmt = $dbCon->prepare("update landloard_building_port_floors_offices set apartment_sell_status=?,apartment_construction_status=?,expected_move_in_date=? where id=?");
			$stmt->bind_param("iisi",$_POST['apartment_sell_status'],$_POST['apartment_construction_status'],$expected_date,$apartment_id);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
				
		}
		
		
		
		
		function updateApartmentNumber()
		{
			$dbCon = AppModel::createConnection();
			  
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set office_apartment_number=? where id=?");
			$stmt->bind_param("ii",$_POST['apartmentNumber'], $_POST['apartmentId']);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
				
		}
		
		function updateApartmentType()
		{
			$dbCon = AppModel::createConnection();
			  
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set office_apartment_type=? where id=?");
			$stmt->bind_param("ii",$_POST['apartmentNumber'], $_POST['apartmentId']);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
				
		}
		
	 
		
		function updateApartmentTenant()
		{
			$dbCon = AppModel::createConnection();
			$tname=$name=htmlentities(urldecode($_POST['apartmentNumber']) ,ENT_NOQUOTES, 'UTF-8');
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set tenant_name=? where id=?");
			$stmt->bind_param("si",$tname, $_POST['apartmentId']);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
				
		}
		function addOffice($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['fid']);  
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']); 
			$is_office=1;
			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_port_floors_offices  where floor_id=? and is_office=1");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$num=$rowAvailable['num']+1;
			$stmt = $dbCon->prepare("insert into landloard_building_port_floors_offices (is_office,floor_id, office_apartment_number,created_on) values (?,?, ?, now())");
			$stmt->bind_param("iii", $is_office,$company_id,$num);
			$stmt->execute();
			$stmt = $dbCon->prepare("update landloard_building_port_floors set total_offices=? where id=?");
			$stmt->bind_param("ii",$num, $company_id);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
				
		}
		
		function deleteOffice($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['fid']);  
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']); 
			$is_office=1;
			$stmt = $dbCon->prepare("select max(id) as num,count(id) as num1 from landloard_building_port_floors_offices  where floor_id=? and is_office=1");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("delete from landloard_building_port_floors_offices where id=?");
			$stmt->bind_param("i", $rowAvailable['num']);
			$stmt->execute();	
			$num=$rowAvailable['num1']-1;
			$stmt = $dbCon->prepare("update landloard_building_port_floors set total_offices=? where id=?");
			$stmt->bind_param("ii",$num, $company_id);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
				
		}
		
		function deleteApartment($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['fid']);  
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']); 
			$is_office=1;
			$stmt = $dbCon->prepare("select max(id) as num,count(id) as num1 from landloard_building_port_floors_offices  where floor_id=? and is_office=0");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("delete from landloard_building_port_floors_offices where id=?");
			$stmt->bind_param("i", $rowAvailable['num']);
			$stmt->execute();
			$num=$rowAvailable['num1']-1;
			$stmt = $dbCon->prepare("update landloard_building_port_floors set total_apartment=? where id=?");
			$stmt->bind_param("ii",$num, $company_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
				
		}
		
		function getPortsInfo()
		{
			$org='';
			for($i=1;$i<=$_POST['total_ports'];$i++)
			{
				$org=$org.'<div class="padb10 xs-padrl0 xs-padb0   mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile'.$i.'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold">Port number '.$i.'
								<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="profile'.$i.'" class=" " style="display: block;">	
										 
									 
											<div id="6">
											<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt brd" id="extra_8">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_50 xxs-wi_55  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Add port number</span>
													 
													 </div>
													 
											<div class="wi_70  xs-mar0 xs-padt10">		
												<div class="on_clmn mart10 ">
								<div class="pos_rel">											
											 <input type="text" id="port_number'.$i.'" name="port_number'.$i.'" class="css-xt766" value="">
											</div>
											</div>
												
											</div>	
											<div class="clear"></div>
												
											</div>
											
											
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div>
									<input type="hidden" value="1" id="elevator'.$i.'" name="elevator'.$i.'" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir">
									 <div class="on_clmn  mart10  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If this port number have elevator?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25">
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  ">
														<div class="boolean-control boolean-control-small boolean-control-green fright checked" onclick="updateElevator('.$i.',this);">
																<input type="checkbox" class="default" data-true="" data-false="">
															<div class="boolean-control-wrap"><div class="boolean-control-options"><a href="#" data-value="true" class="boolean-control-option true"></a><a href="#" data-value="false" class="boolean-control-option false"></a><div class="clear"></div></div></div></div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										 <input type="hidden" id="total_floor'.$i.'" name="total_floor'.$i.'" value="1" />
										<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt  brdb_dfe3e6 padb10">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Number of floors</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">How many floors does this property have?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div id="floor_count" class="css-151xzu3">
										<a href="javascript:void(0);" onclick="deleteFloor('.$i.');">
										 
										<div color="#444444" data-testid="icon-button--minus" class="merlin-button merlin-button--disabled css-ig30wo" aria-label="" disabled="">
										<div class="merlin-button__content">
										<div class="css-ibdtyj">
										<div class="css-2llcy8">
										<div data-testid="icon-button--icon-div" class="css-lf4a1m">
										</div>
										</div>
										</div>
										</div>
										</div></a>
										<span class="value" id="floorCount'.$i.'">1 floor</span>
									<a href="javascript:void(0);" onclick="addFloor('.$i.');">	
									<div color="#444444" data-testid="icon-button--plus" class="merlin-button css-mgojn5" aria-label="">
										<div class="merlin-button__content">
										<div class="css-ibdtyj">
										<div class="css-2llcy8">
										<div data-testid="icon-button--icon-div" class="css-r0ilrj">
										</div>
										</div>
										</div>
										</div>
										</div></a>
										</div>
									 	 
											 
									</div>
										
									</div>
									<div class="clear"></div>
									</div>
					 		 <div class="clear"></div>
					</div> 					
					';
			}
			return $org;
		}
		function buildingsList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select *  from landloard_buildings  where company_id=? and building_completed=2");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				array_push($org,$rowAvailable);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}	
		
		
		function buildingsCompletedList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select *  from landloard_buildings  where company_id=? and building_completed=1");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				
			$stmt = $dbCon->prepare("select * from landloard_society where id=(select society_id  from landloard_society_buildings  where building_id=?)");
			$stmt->bind_param("i", $rowAvailable['id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row = $result1->fetch_assoc();
			if(empty($row))
			{
				$rowAvailable['society_name']='';
				$rowAvailable['society_connected']=0;
			}
			else
			{
				$rowAvailable['society_name']=$row['society_name'];
				$rowAvailable['society_connected']=1;
			}
				array_push($org,$rowAvailable);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}	
		
		
		function buildingsSocietyList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select *  from landloard_buildings  where company_id=? and id not in (select building_id from landloard_society_buildings where society_id in (select id from landloard_society where company_id=?))");
			$stmt->bind_param("ii", $company_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				array_push($org,$rowAvailable);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}	
		
		
		function floorObjectList($data)
		{
			$dbCon = AppModel::createConnection();
			$floor_id= $this -> encrypt_decrypt('decrypt',$data['fid']);
			$stmt = $dbCon->prepare("select *  from landloard_building_port_floors_offices  where floor_id=?  order by is_office");
			$stmt->bind_param("i", $floor_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				if($rowAvailable['is_office']==0)
				{
					$rowAvailable['object']='Apartment';
				}
				else
				{
					{
					$rowAvailable['object']='Office';
				}
				}
				array_push($org,$rowAvailable);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}	
		
		
		function floorApartments($data)
		{
			$dbCon = AppModel::createConnection();
			$floor_id= $this -> encrypt_decrypt('decrypt',$data['fid']);
			$stmt = $dbCon->prepare("select *  from landloard_building_port_floors_offices  where floor_id=? and is_office=0 order by is_office");
			$stmt->bind_param("i", $floor_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				if($rowAvailable['is_office']==0)
				{
					$rowAvailable['object']='Apartment';
				}
				else
				{
					{
					$rowAvailable['object']='Office';
				}
				}
				array_push($org,$rowAvailable);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}	
		
		
		
		function societyList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,society_name,created_on  from landloard_society  where company_id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				array_push($org,$rowAvailable);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}	
		
		 function buildingPortFloorDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			$stmt = $dbCon->prepare("select landloard_building_port_floors.id,floor_number,port_number,building_name,city  from landloard_building_port_floors left join landloard_building_ports on landloard_building_port_floors.port_id=landloard_building_ports.id left join landloard_buildings on landloard_building_ports.buildingid=landloard_buildings.id where port_id=? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			 
			
			while($row = $result->fetch_assoc())
			{
				$enc= $this -> encrypt_decrypt('encrypt',$row['id']);
				  
				  
				if($j%2==0)
				{
					$bg='lgtgrey_bg';
				}
				else
				{
					$bg='white_bg';
				}
				$org=$org.'<a href="../../portFloorInfo/'.$data['cid'].'/'.$data['bid'].'/'.$enc.'"><div class="column_m container  marb5   fsz14 dark_grey_txt  ">
												<div class=" '.$bg.'  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 hidden-xs "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['building_name'],0,1).'</div>
																	</div>
													
													<div class="fleft wi_60   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">'.$row['building_name'].'-'.$row['port_number'].','.$row['city'].'</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">Floor '.$row['floor_number'].'</span>  </div>
													
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div></a>';
											$j++;
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		 function buildingAllPortFloorDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$stmt = $dbCon->prepare("select *  from landloard_building_ports  where buildingid=?");
			$stmt->bind_param("i", $building_id);
			$stmt->execute();
			$resultBuildingPort = $stmt->get_result();
			$org='';
			$j=1;
			while($rowAvailable = $resultBuildingPort->fetch_assoc())
			{ 
			if($j==1)
			{
				$block='block';
				$show='';
			}
			else
			{
			$block='none';	
			$show='show_data';
			}
			$stmt = $dbCon->prepare("select landloard_building_port_floors.id,floor_number,port_number,building_name,city  from landloard_building_port_floors left join landloard_building_ports on landloard_building_port_floors.port_id=landloard_building_ports.id left join landloard_buildings on landloard_building_ports.buildingid=landloard_buildings.id where port_id=? ");
			
			/* bind parameters for markers */  
			$stmt->bind_param("i", $rowAvailable['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=$org.'<div class="marrl0 padb15 brdb fsz16 white_bg tall padt20 marb5">
								<a href="javascript:void(0);" class="expander-toggler white_txt xs-fsz16 tall tabblueBGcolor padrl30 padtb10 brdrad5" onclick="expandThis('.$j.');">'.$rowAvailable['port_number'].' 
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt "></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright dark_grey_txt "></span></a></div>
								<div id="profile'.$j.'" class="'.$show.'" style="display: '.$block.';">';
			
			 
			
			while($row = $result->fetch_assoc())
			{
				$enc= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.' 
							<div class="column_m container marb5    fsz14 dark_grey_txt">
									<div class="green_bg_00ff9996  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 hidden-xs "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a green_bg_81ceaa " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['floor_number'],0,1).'</div>
																	</div>
													
													<div class="fleft wi_60   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">Floor '.$row['floor_number'].'</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">Apartment & offices</span>  </div>
													<a href="../../editFloorInfo/'.$data['cid'].'/'.$data['bid'].'/'.$enc.'"><div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 ">
														  <span class="fas fa-edit txt_cfdbea" aria-hidden="true"></span> 
													</div></a>
													<a href="../../portDescriptionInfo/'.$data['cid'].'/'.$data['bid'].'/'.$enc.'"><div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 ">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div></a>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div> ';
											
				
			}
			$org=$org.'</div> <div class="clear"></div>';
			$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function portList($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$stmt = $dbCon->prepare("select *  from landloard_building_ports  where buildingid=?");
			$stmt->bind_param("i", $building_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				array_push($org,$rowAvailable);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}	
		
		function checkApartmentNumber($data)
		{
			$dbCon = AppModel::createConnection();
			$floor_id= $this -> encrypt_decrypt('decrypt',$data['fid']);
			$stmt = $dbCon->prepare("select count(id) as num  from landloard_building_port_floors_offices  where floor_id=? and office_apartment_number=?");
			$stmt->bind_param("ii", $floor_id,$_POST['apartment_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $rowAvailable['num'];
			
			
		}
		
		function checkFloorApartmentNumber($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$stmt = $dbCon->prepare("select count(id) as num  from landloard_building_port_floors_offices  where floor_id=? and office_apartment_number=?");
			$stmt->bind_param("ii", $_POST['floor_number'],$_POST['apartment_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $rowAvailable['num'];
			
			
		}
		
		function portDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$floor_id= $this -> encrypt_decrypt('decrypt',$data['fid']);
			$stmt = $dbCon->prepare("select *  from landloard_building_port_floors  where id=?");
			$stmt->bind_param("i", $floor_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $rowAvailable;
			
			
		}
		
		function updateFloorInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$floor_id= $this -> encrypt_decrypt('decrypt',$data['fid']);
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update landloard_building_port_floors set is_basement=?,apartment_available=?,parking_available=?,commercial_use_available=?,storage_available=?,amenities_available=? where id=?");
			$stmt->bind_param("iiiiiii", $_POST['basement_available'],$_POST['penthouse_available'],$_POST['garage_available'],$_POST['tenant_available'],$_POST['invoice_available'],$_POST['amenities_available'],$floor_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function invitetenatToConnect($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$apartment_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from landloard_building_tenant where id=?");
			$stmt->bind_param("i", $_POST['tenant_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select country_code,building_name,landloard_buildings.street_address,landloard_buildings.city,landloard_buildings.state ,company_profiles.phone from landloard_buildings left join company_profiles on company_profiles.company_id=landloard_buildings.company_id left join companies on companies.id=landloard_buildings.company_id left join phone_country_code on phone_country_code.id=companies.country_id where landloard_buildings.id=?");
			$stmt->bind_param("i", $rowAvailable['building_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowBuilding = $result->fetch_assoc(); 
			
			$stmt = $dbCon->prepare("select * from user_logins where email=?");
			$stmt->bind_param("s", $rowAvailable['tenant_email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUser = $result->fetch_assoc();	
			if(empty($rowUser))
			{
				$user=0;
			}
			else
			{
				$user=$rowUser['id'];
			}
			 $is_app=3;
			$stmt = $dbCon->prepare("INSERT INTO user_tenants (property_id,is_approved,user_login_id, company_id, created_on,user_email,user_first_name,user_last_name,user_country,user_phone_number,tenant_id) VALUES (?, ?, ?, ?, now(),?,?, ?, ?, ?,?)");
			$stmt->bind_param("iiiisssisi",$apartment_id,$is_app, $user,$company_id,$rowAvailable ['tenant_email'],$rowAvailable['first_name'],$rowAvailable['last_name'],$rowAvailable['mobile_country'],$rowAvailable['mobile_number'],$rowAvailable['id']);
			$stmt->execute();
			$subject='Invitation received to Join '.$rowBuilding['building_name'].' building';
			$to=$rowAvailable['tenant_email'];
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
    <tbody>
<tr>
<td style="display:none !important;
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
    </tr>
<tr>
      <td align="center" class="header" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
        <!--[if (gte mso 9)|(IE)]>
    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
    <tr>
    <td align="center" valign="top" width="600">
    <![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 580px; margin: 0 auto;">
          <tbody>
<tr class="spacer">
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
        </tbody>
</table>
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
          <tbody>
<tr>
            <td class="Content-container Content-container--main text textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101); padding-left: 60px; padding-right: 60px; padding-top: 54px; padding-bottom: 60px;">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                <!-- RESTAURANT INFO -->
                <tbody>

                <!-- INTRO -->
                <tr>
                  <td valign="top" align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
<tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">Invitation received</span>                          </td>
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
                    </tbody>
</table>
                  </td>
                </tr>
                <!-- MESSAGE -->
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="message" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
                    <div class="text textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                      <span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">Tenant invitation</span>
                      <br>
You have received a tenant invitation. To check the detail please restore your Qloud ID app with your email and click on below link to verify the request.</div>
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
                      <tbody>
<tr>
                        <td align="left" valign="middle" width="468" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text-list textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">
                            <span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">September 29, 2022, 9:39 pm</span>
                            <br>
                          </div>
                        </td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      

<tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody>
<tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="https://www.safeqloud.com/public/index.php/LandloardInvitation" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;"> Manage your reservation </a>                                </td>
                            </tr>
                          </tbody>
</table>
                        </td>
                      </tr>


<tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>


                    </tbody>
</table>
                  </td>
                </tr>
                <!-- ADDRESS -->
                <tr>
                  <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
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
                      <tr>
                        <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody>
<tr>
                              <td style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="230" class="business-address--address" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 50%;">
                                  <tbody>
<tr>
                                    <td align="left" width="100%" class="text-list textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">
                                    <span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">'.$rowBuilding['building_name'].'</span><br>'.$rowBuilding['street_address'].'<br>'.$rowBuilding['city'].' '.$rowBuilding['state'].'<br> <a>+'.$rowBuilding['country_code'].' '.$rowBuilding['phone'].'</a><br> <br> <a href="https://www.google.com/maps/dir//Ringv%C3%A4gen%2098/" class="text text-link textColorBlue" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; text-decoration: underline; color: rgb(32, 32, 192);" target="_blank">Get directions</a>                                      </td>
                                  </tr>
                                </tbody>
</table>
                                <!--[if mso]></td><td><![endif]-->
                                <table align="right" border="0" cellpadding="0" cellspacing="0" width="230" class="business-address--map" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 50%;">
                                  <tbody>
<tr>
                                    <td width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <a href="https://www.google.com/maps/dir//1350+W+Randolph%2C+Chicago%2C+IL%2C+US+60607/" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;"> <img width="230" class="business-address--map-image" height="auto" alt="Map of Elske" src="https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyCPd%2DxSabI7QOfKX5NxVVup6bPfcovwFiQ&amp;center=1350+W+Randolph%2C+Chicago%2C+IL%2C+US+60607&amp;size=300x200&amp;zoom=15&amp;scale=2&amp;format=png&amp;visual%5Frefresh=true&amp;markers=scale%3A2%7Cicon%3Ahttps%3A%2F%2Fstorage.googleapis.com%2Ftock%2Dpublic%2Dassets%2Fimages%2Demail%2Dtemplate%2Femail%2Dmap%2Dmarker.png%7Cshadow%3Afalse%7C1350+W+Randolph%2C+Chicago%2C+IL%2C+US+60607&amp;style=feature%3Aall%7Celement%3Alabels.text.fill%7Ccolor%3A0x4b505b&amp;style=feature%3Aall%7Celement%3Alabels.text.stroke%7Ccolor%3A0xffffff%7Cvisibility%3Aon&amp;style=feature%3Aadministrative.land%5Fparcel%7Celement%3Aall%7Cvisibility%3Aoff&amp;style=feature%3Alandscape.man%5Fmade%7Celement%3Aall%7Cvisibility%3Aon&amp;style=feature%3Alandscape.man%5Fmade%7Celement%3Ageometry.fill%7Ccolor%3A0xe9e9eb&amp;style=feature%3Apoi%7Celement%3Aall%7Cvisibility%3Aoff&amp;style=feature%3Aroad%7Celement%3Ageometry.fill%7Ccolor%3A0xffffff&amp;style=feature%3Aroad%7Celement%3Alabels.text.fill%7Ccolor%3A0x787c84&amp;style=feature%3Aroad%7Celement%3Alabels.icon%7Cvisibility%3Aoff&amp;style=feature%3Aroad.highway%7Celement%3Ageometry.fill%7Ccolor%3A0xffbe32&amp;style=feature%3Aroad.highway%7Celement%3Ageometry.stroke%7Ccolor%3A0xffbe32&amp;style=feature%3Atransit%7Celement%3Alabels.text.fill%7Cvisibility%3Aon%7Ccolor%3A0x787c84&amp;style=feature%3Atransit.line%7Celement%3Ageometry.fill%7Ccolor%3A0xd2d4d6&amp;signature=3yCSyIXfsSilvB5wcd4OElw40QU=" style="-ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; display: block; width: 100%;"> </a>                                      </td>
                                  </tr>
                                </tbody>
</table>
                              </td>
                            </tr>
                          </tbody>
</table>
                        </td>
                      </tr>
                    </tbody>
</table>
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
                      <tbody>
<tr>
                        <td class="receipt__container" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border: 1px solid rgb(211, 211, 216); padding: 24px;">
                          <table border="0" width="100%" cellpadding="0" cellspacing="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody>
<tr>
                              <td width="80%" class="textAlignLeft" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; text-align: left;">
                                <div class="text-list textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">
                                  Reservation for free
                                </div>
                                <div class="textColorGrayDark textSmall" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);"></div>
                              </td>
                              <td width="20%" align="right" class="textAlignRight" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; text-align: right;">
                                <div class="text-list textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">$0</div>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2" style="height: 12px; line-height: 12px; max-height: 12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"></td>
                            </tr>
                          </tbody>
</table>
                          <table border="0" width="100%" cellpadding="0" cellspacing="0" class="receipt__row" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-top: 1px solid rgb(211, 211, 216);">
                            <tbody>
<tr>
                              <td colspan="2" style="height: 12px; line-height: 12px; max-height: 12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"></td>
                            </tr>
                            <tr>
                              <td width="80%" class="textAlignLeft" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; text-align: left;">
                                <div class="text-list textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">
                                  Subtotal
                                </div>
                              </td>
                              <td width="20%" align="right" class="textAlignRight" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; text-align: right;">
                                <div class="text-list textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">$0</div>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2" style="height: 12px; line-height: 12px; max-height: 12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"></td>
                            </tr>
                          </tbody>
</table>
                          <table border="0" width="100%" cellpadding="0" cellspacing="0" class="receipt__row" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-top: 1px solid rgb(211, 211, 216);">
                            <tbody>
<tr>
                              <td colspan="2" style="height: 12px; line-height: 12px; max-height: 12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"></td>
                            </tr>
                            <tr>
                              <td width="80%" class="textAlignLeft" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; text-align: left;">
                                <div class="text-list text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; font-weight: 600; color: rgb(35, 35, 62);">
                                  Total
                                </div>
                              </td>
                              <td width="20%" align="right" class="textAlignRight" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; text-align: right;">
                                <div class="text-list text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; font-weight: 600; color: rgb(35, 35, 62);">$0</div>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2" style="height: 12px; line-height: 12px; max-height: 12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"></td>
                            </tr>
                            <tr style="padding: 10px">
                              <td colspan="2" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                                <table border="0" width="100%" cellpadding="0px" cellspacing="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                                  <tbody>
<tr>
                                    <td class="message" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
                                      <table border="0" width="100%" cellpadding="0px" cellspacing="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                                        <tbody>
<tr>
                                          <td colspan="2" padding="0px" class="textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; color: rgb(79, 79, 101);"> Paid by the landloard </td>
                                        </tr>
                                        <tr class="spacer">
                                          <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                                        </tr>
                                        
                                      </tbody>
</table>
                                    </td>
                                  </tr>
                                </tbody>
</table>
                              </td>
                            </tr>
                          </tbody>
</table>
                        </td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                
                <!-- EDIT RECEIPT -->
                <!-- CANCELLATION POLICY -->
                
                
                
                <!-- QUESTIONS -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
<tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; font-weight: 600; color: rgb(35, 35, 62);">
                            Questions?
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                            If you have questions about your reservation, contact to '.$rowBuilding['building_name'].'
                            <a></a>                            or by calling
                            <a>+'.$rowBuilding['country_code'].' '.$rowBuilding['phone'].'</a>.
                          </div>
                        </td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
              </tbody>
</table>
            </td>
          </tr>
        </tbody>
</table>
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
          <tbody>
<tr class="spacer">
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
        </tbody>
</table>
        <!--[if (gte mso 9)|(IE)]>
</td>
</tr>
</table>
<![endif]-->
      </td>
    </tr>
  </tbody>
</table>


</body></html>';
			$subject='Invitation received to Join '.$rowBuilding['building_name'].' building';

			try {
				 sendEmail($subject, $to, $emailContent);
						}

					catch(Exception $e) {
						$to      = 'kowaken.ghirmai@gmail.com';
						sendEmail($subject, $to, $emailContent);
					   
					}
					
			$stmt = $dbCon->prepare("select country_code from phone_country_code where id=?");
			$stmt->bind_param("i", $rowAvailable['mobile_country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCode = $result->fetch_assoc();
			$url='https://www.safeqloud.com/public/index.php/LandloardInvitation';
			$surl=getShortUrl($url);
			$phone='+'.trim($rowCode['country_code']).''.trim($rowAvailable['mobile_number']);
			$subject='Invitation';
			$to=$phone;
			$html='Hi! you have a invitaion to check open this url '.$surl;
			$res=sendSms($subject, $to, $html);
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function invitedTenatCount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$apartment_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from user_tenants where property_id=?");
			$stmt->bind_param("i", $apartment_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		function updateTenantSelect($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$apartment_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select * from landloard_building_port_floors_offices where id=?");
			$stmt->bind_param("i", $apartment_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			 
			if($_POST['update_info']==0)
			{
				$rowAvailable['teanat_details']=$rowAvailable['teanat_details'].',';
				$p=$_POST['tenant_id'].',';
				$tenant_id=str_replace($p,'',$rowAvailable['teanat_details']);
				$tenant_id=substr($tenant_id,0,-1);
			}
			else
			{
				$p=','.$_POST['tenant_id'];
				$tenant_id=$rowAvailable['teanat_details'].''.$p;
			}	
			
			 
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set teanat_details=?  where id=?");
			$stmt->bind_param("si",$tenant_id, $apartment_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateTenantInvite($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$a=explode(',',$data['tenant_id']);
			$stmt = $dbCon->prepare("select id,first_name,last_name  from landloard_building_tenant where building_id=?");
			$stmt->bind_param("i", $building_id);
			$stmt->execute();
			$result = $stmt->get_result();	
			$org='<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt  ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												 <div class="css-1jzh2co marb15">
												   <p class="paragraph--b1 paragraph--full css-1680uhd">Select the tenants</p>
												   <div class="chip-container">';
			while($rowPort = $result->fetch_assoc())
			{
				if (in_array($rowPort['id'], $a))
						{
						if ($rowPort['id']==$_POST['tenant_id'])	{
						$org=$org.'<a href="javascript:void(0);" onclick="updateTenantSelect('.$rowPort['id'].');"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">'.$rowPort['first_name'].' '.$rowPort['last_name'].'</span>
															   </span>
															</span>
														 </div>
													  </div></a>
													  
													 ';
						}
						else
						{
							$org=$org.'  <a href="javascript:void(0);" onclick="updateTenantSelect('.$rowPort['id'].');"><div id="bath-chip" class="css-cedhmb">
																	 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
																		<span class="chip chip_not-selected">
																		   <span class="chip_content">
																			  <div class="css-ylfimb"></div>
																			  <span class="chip_text">'.$rowPort['first_name'].' '.$rowPort['last_name'].'</span>
																		   </span>
																		</span>
																	 </div>
																  </div></a>';
						}
			}
			}
			$org=$org.'</div>
												</div>
												<div class="clear"></div>
											 
											
											
											
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div> <div class="clear"></div>';
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function buildingtenantSelectedInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$a=explode(',',$data['tenant_id']);
			$stmt = $dbCon->prepare("select id,first_name,last_name  from landloard_building_tenant where building_id=?");
			$stmt->bind_param("i", $building_id);
			$stmt->execute();
			$result = $stmt->get_result();	
			$org='<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt  ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												 <div class="css-1jzh2co marb15">
												   <p class="paragraph--b1 paragraph--full css-1680uhd">Select the tenants</p>
												   <div class="chip-container">';
			while($rowPort = $result->fetch_assoc())
			{
				if (in_array($rowPort['id'], $a))
						{
						$org=$org.'<a href="javascript:void(0);" onclick="updateTenantSelect('.$rowPort['id'].',0);"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">'.$rowPort['first_name'].' '.$rowPort['last_name'].'</span>
															   </span>
															</span>
														 </div>
													  </div></a>
													  
													 ';
						}
						else
						{
							$org=$org.'  <a href="javascript:void(0);" onclick="updateTenantSelect('.$rowPort['id'].',1);"><div id="bath-chip" class="css-cedhmb">
																	 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
																		<span class="chip chip_not-selected">
																		   <span class="chip_content">
																			  <div class="css-ylfimb"></div>
																			  <span class="chip_text">'.$rowPort['first_name'].' '.$rowPort['last_name'].'</span>
																		   </span>
																		</span>
																	 </div>
																  </div></a>';
						}
			}
			$org=$org.'</div>
												</div>
												<div class="clear"></div>
											 
											
											
											
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div> <div class="clear"></div>';
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function buildingtenantSelectedOnlyInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$a=explode(',',$data['tenant_id']);
			$stmt = $dbCon->prepare("select id,first_name,last_name  from landloard_building_tenant where building_id=?");
			$stmt->bind_param("i", $building_id);
			$stmt->execute();
			$result = $stmt->get_result();	
			$org='<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt  ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												 <div class="css-1jzh2co marb15">
												   <p class="paragraph--b1 paragraph--full css-1680uhd">Select the tenants</p>
												   <div class="chip-container">';
			while($rowPort = $result->fetch_assoc())
			{
				if (in_array($rowPort['id'], $a))
						{
						$org=$org.'<a href="javascript:void(0);" onclick="updateTenantSelect('.$rowPort['id'].');"><div id="bath-chip" class="css-cedhmb">
																	 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
																		<span class="chip chip_not-selected">
																		   <span class="chip_content">
																			  <div class="css-ylfimb"></div>
																			  <span class="chip_text">'.$rowPort['first_name'].' '.$rowPort['last_name'].'</span>
																		   </span>
																		</span>
																	 </div>
																  </div></a>';
						}
						 
			}
			$org=$org.'</div>
												</div>
												<div class="clear"></div>
											 
											
											
											
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div> <div class="clear"></div>';
			$stmt->close();
			$dbCon->close();
			return $org;
		}
			
		
		
		
		function buildingDetailInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$stmt = $dbCon->prepare("select *  from landloard_buildings  where id=?");
			$stmt->bind_param("i", $building_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $rowAvailable;
			
			
		}
		
		
		function unrefinedApartmentDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$apartment_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select *  from landloard_building_unrefined_offices  where id=?");
			$stmt->bind_param("i", $apartment_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $rowAvailable;
			
			
		}
		
		function selectedParkingPlaceInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$parking_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			$stmt = $dbCon->prepare("select *  from landloard_building_parking  where id=?");
			$stmt->bind_param("i", $parking_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $rowAvailable;
			
			
		}
		function buildingPortList($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);  
			 
			$stmt = $dbCon->prepare("select * from landloard_building_ports where buildingid=?");
			$stmt->bind_param("i", $building_id);
			$stmt->execute();	
			$org=array();
			$result = $stmt->get_result();
			while($rowAvailable = $result->fetch_assoc())
			{
			array_push($org,$rowAvailable); 	
			}
			$stmt->close();
			$dbCon->close();
			return $org;
				
		}
		
		function parkingPlaces($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);  
			 
			$stmt = $dbCon->prepare("select * from landloard_building_parking where building_id=?");
			$stmt->bind_param("i", $building_id);
			$stmt->execute();	
			$org=array();
			$result = $stmt->get_result();
			while($rowAvailable = $result->fetch_assoc())
			{
			$rowAvailable['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);  
			array_push($org,$rowAvailable); 	
			}
			$stmt->close();
			$dbCon->close();
			return $org;
				
		}
		
		function tenantDetailInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$tenant_id= $this -> encrypt_decrypt('decrypt',$data['tid']);
			$stmt = $dbCon->prepare("select *  from landloard_building_tenant  where id=?");
			$stmt->bind_param("i", $tenant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $rowAvailable;
			
			
		}
		
		
		function ownerDetailInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$tenant_id= $this -> encrypt_decrypt('decrypt',$data['tid']);
			$stmt = $dbCon->prepare("select *  from landloard_building_owners  where id=?");
			$stmt->bind_param("i", $tenant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $rowAvailable;
			
			
		}
		
		function buildingSelectedAmenitiesCount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_amenities where is_available=1 and building_id=?");
			$stmt->bind_param("i", $building_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $rowAvailable['num'];
		}
		
		
		function buildingSelectedPortInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			
			$stmt = $dbCon->prepare("select id,port_number  from landloard_building_ports where buildingid=?");
			$stmt->bind_param("i", $building_id);
			$stmt->execute();
			$result = $stmt->get_result();	
			$org='';
			while($rowPort = $result->fetch_assoc())
			{
			if($rowPort['id']==$data['port_id'])
			{
				$selected='selected';
			}
			else
			{
				$selected='';
			}
			$org=$org.'<option value="'.$rowPort['id'].'" '.$selected.'>'.$rowPort['port_number'].'</option>';	
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function buildingSelectedMultiPortInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$a=explode(',',$data['port_id']);
			$stmt = $dbCon->prepare("select id,port_number  from landloard_building_ports where buildingid=?");
			$stmt->bind_param("i", $building_id);
			$stmt->execute();
			$result = $stmt->get_result();	
			$org='<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt  ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												 <div class="css-1jzh2co marb15">
												   <p class="paragraph--b1 paragraph--full css-1680uhd">Select the ports for availability</p>
												   <div class="chip-container">';
			while($rowPort = $result->fetch_assoc())
			{
				if (in_array($rowPort['id'], $a))
						{
						$org=$org.'<a href="javascript:void(0);" onclick="updateMultiSubcategory('.$rowPort['id'].','.$data['id'].',0);"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">'.$rowPort['port_number'].'</span>
															   </span>
															</span>
														 </div>
													  </div></a>
													  
													 ';
						}
						else
						{
							$org=$org.'  <a href="javascript:void(0);" onclick="updateMultiSubcategory('.$rowPort['id'].','.$data['id'].',1);"><div id="bath-chip" class="css-cedhmb">
																	 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
																		<span class="chip chip_not-selected">
																		   <span class="chip_content">
																			  <div class="css-ylfimb"></div>
																			  <span class="chip_text">'.$rowPort['port_number'].'</span>
																		   </span>
																		</span>
																	 </div>
																  </div></a>';
						}
			}
			$org=$org.'</div>
												</div>
												<div class="clear"></div>
											 
											
											
											
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div> <div class="clear"></div>';
			$stmt->close();
			$dbCon->close();
			return $org;
		}
													  
												  
													 
		
		function updatedAmenityDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$org='';
			$stmt = $dbCon->prepare("select landloard_building_amenities.id,port_id,is_available,amenity_name,multi_port_available  from landloard_building_amenities left join lanloard_building_amenity_info on lanloard_building_amenity_info.id=landloard_building_amenities.amenity_id where landloard_building_amenities.id=?");
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$data['port_id']=$rowAvailable['port_id'];
			$data['id']=$_POST['id'];
			if($rowAvailable['is_available']==1)
			{
				if($rowAvailable['multi_port_available']==0)
				{
				$option=$this->buildingSelectedPortInfo($data);
				$available='<div class="css-11e5cyp">
			  <select id="'.$rowAvailable['amenity_name'].'-amenity-select" data-testid="'.$rowAvailable['amenity_name'].'-amenity-select" class="css-bnguuq dropdown-bg" onchange="updateSubcategory('.$rowAvailable['id'].',this.value);">
				'.$option.'
				  </select>
				</div>
			  </div>
			  </div>';
			  
				}
				else
				{
				$available=$this->buildingSelectedMultiPortInfo($data);	
				}
				
				$checked='checked';
			  $update=0;
			}
			else
			{
			$available='';	
			$checked='';
			$update=1;
			}
			$org=$org.'<div id="'.$rowAvailable['id'].'">
       
      <div data-testid="'.$rowAvailable['amenity_name'].'-amenity-item" class="css-39yi7y">
        <div class="css-nj7s2c">
          <label for="oven" class="css-14q70q0">'.$rowAvailable['amenity_name'].'</label>
          <div class="css-1sjqbna">
            <a href="javascript:void(0);" onclick="updateAminity('.$rowAvailable['id'].','.$update.');">
              <input data-testid="test-checkbox-'.$rowAvailable['amenity_name'].'" name="'.$rowAvailable['amenity_name'].'" type="checkbox" class="css-1lgzhz8" '.$checked.'>
            </a>
          </div>
		  
		  
        </div>
		
		'.$available.'
		</div>
		</div>
        '; 
			$stmt->close();
			$dbCon->close();
			return $org;
		
		}
		
		
		function updateAminityPortInfo()
		{ 
		
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("update landloard_building_amenities set port_id=?  where id=?");
			$stmt->bind_param("si",$_POST['subcategory_info'], $_POST['id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateMultiSubcategory()
		{ 
		
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select landloard_building_amenities.id,port_id,is_available,amenity_name,multi_port_available  from landloard_building_amenities left join lanloard_building_amenity_info on lanloard_building_amenity_info.id=landloard_building_amenities.amenity_id where landloard_building_amenities.id=?");
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			 
			if($_POST['update_info']==0)
			{
				$p=$_POST['port_id'].',';
				$port_id=str_replace($p,'',$rowAvailable['port_id']);
			}
			else
			{
				$p=$_POST['port_id'].',';
				$port_id=$rowAvailable['port_id'].''.$p;
			}	
			
			 
			$stmt = $dbCon->prepare("update landloard_building_amenities set port_id=?  where id=?");
			$stmt->bind_param("si",$port_id, $_POST['id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function buildingAmenitiesInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			
			$stmt = $dbCon->prepare("select min(id) as port_id  from landloard_building_ports where buildingid=?");
			$stmt->bind_param("i", $building_id);
			$stmt->execute();
			$result = $stmt->get_result();	
			$rowPort = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select landloard_building_amenities.id,port_id,is_available,amenity_name,multi_port_available  from landloard_building_amenities left join lanloard_building_amenity_info on lanloard_building_amenity_info.id=landloard_building_amenities.amenity_id where building_id=?");
			$stmt->bind_param("i", $building_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			
			
			if(empty($rowAvailable))
			{
			$stmt = $dbCon->prepare("select *  from lanloard_building_amenity_info");
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowAvailable = $result->fetch_assoc())
			{
			if($rowAvailable['multi_port_available']==1)
			{
			$port_id=$rowPort['port_id'].',';
			}
			else
			{
			$port_id=$rowPort['port_id'];
			}
			$stmt = $dbCon->prepare("INSERT INTO landloard_building_amenities (building_id, amenity_id,port_id) VALUES (?, ?, ?)");
			$stmt->bind_param("iis", $building_id,$rowAvailable['id'],$port_id);
			$stmt->execute();	
			}
			}
			$buildingSelectedAmenitiesCount=$this->buildingSelectedAmenitiesCount($data);
			$stmt = $dbCon->prepare("select landloard_building_amenities.id,port_id,is_available,amenity_name,multi_port_available  from landloard_building_amenities left join lanloard_building_amenity_info on lanloard_building_amenity_info.id=landloard_building_amenities.amenity_id where building_id=?");
			$stmt->bind_param("i", $building_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<div class="padb10 xs-padrl0 xs-padb0  mart10  ">
									  <div class="clear"></div>
									  <div class="marrl0 padb10   fsz16 white_bg tall padt20">
										<a href="#profile2" class="expander-toggler dark_grey_txt xs-fsz16 tall bold">
										  <div class="dflex wi_100">
											<div class="wi_70 dflex">
											  <span class="css-p2kctj">
												<img src="https://www.safeqloud.com/html/usercontent/images/kitchen2.svg" class="css-z0f999">
											  </span>
											  <div>
												<span class="apartheading">Amenities</span>
												<span class="aprtSubheading">'.$buildingSelectedAmenitiesCount.' amenities selected</span>
											  </div>
											</div>
											<div class="wi_30 padt10">
											  <span class="dnone_pa fa fa-chevron-down fright"></span>
											  <span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span>
											</div>
										  </div>
										</a>
									  </div>
									  <div id="profile2" class=" " style="display: block;">';
			while($rowAvailable = $result->fetch_assoc())
			{
			$data['port_id']=$rowAvailable['port_id'];
			$data['id']=$rowAvailable['id'];
			if($rowAvailable['is_available']==1)
			{
				if($rowAvailable['multi_port_available']==0)
				{
					$option=$this->buildingSelectedPortInfo($data);
					$available='<div class="css-11e5cyp">
				  <select id="'.$rowAvailable['amenity_name'].'-amenity-select" data-testid="'.$rowAvailable['amenity_name'].'-amenity-select" class="css-bnguuq dropdown-bg" onchange="updateSubcategory('.$rowAvailable['id'].',this.value);">
					'.$option.'
					  </select>
					</div>
				  ';
				   
				}
				else
				{
				$available=$this->buildingSelectedMultiPortInfo($data);	
				}
				
			  $checked='checked';
			  $update=0;
			}
			else
			{
			$available='';	
			$checked='';
			$update=1;
			}
			$org=$org.'<div id="'.$rowAvailable['id'].'">
       
      <div data-testid="'.$rowAvailable['amenity_name'].'-amenity-item" class="css-39yi7y">
        <div class="css-nj7s2c">
          <label for="oven" class="css-14q70q0">'.$rowAvailable['amenity_name'].'</label>
          <div class="css-1sjqbna">
            <a href="javascript:void(0);" onclick="updateAminity('.$rowAvailable['id'].','.$update.');">
              <input data-testid="test-checkbox-'.$rowAvailable['amenity_name'].'" name="'.$rowAvailable['amenity_name'].'" type="checkbox" class="css-1lgzhz8" '.$checked.'>
            </a>
          </div>
		   
		  
        </div>
		
		'.$available.'
		</div>
		</div>
        ';
			}
			
			$org=$org.'</div></div>';
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function updateAminity()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("update landloard_building_amenities set  is_available=?,app_display=0 where id=?");
			$stmt->bind_param("ii", $_POST['update_info'],$_POST['id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}	
		
		
		function buildingsCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from landloard_buildings  where company_id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $rowAvailable;
			
			
		}	
		
		 function moreBuildingDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*10+1;
			$b=10;
			$stmt = $dbCon->prepare("select *  from landloard_buildings  where company_id=? limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			if($a%2==0)
			{
			$j=0;	
			}
			else
			{
			$j=1;	
			}
			
			while($row = $result->fetch_assoc())
			{
				$enc= $this -> encrypt_decrypt('encrypt',$row['id']);
				  
				  
				if($j%2==0)
				{
					$bg='lgtgrey_bg';
				}
				else
				{
					$bg='white_bg';
				}
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.'  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 hidden-xs "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['building_name'],0,1).'</div>
																	</div>
													
													<div class="fleft wi_60   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">'.$row['building_name'].'</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">Block - '.$row['block_number'].'</span>  </div>
													
													<a href="../editBuildingInfo/'.$data['cid'].'/'.$enc.'"><div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 ">
														  <span class="fas fa-edit txt_cfdbea" aria-hidden="true"></span> 
													</div></a>
													
													<a href="../buildingAddinsInfo/'.$data['cid'].'/'.$enc.'"><div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div></a>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>';
											$j++;
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
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
		
	 function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$country_id= $data['country_id'];
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=46");
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
			
			return $this -> encrypt_decrypt('encrypt',46);
		}
		
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=46");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
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
		
		
		function updatePrivate($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 $stmt = $dbCon->prepare("update landloard_apartment_bathroom_detail set is_private=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$_POST['private_info'], $_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateEnsuit($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("update landloard_apartment_bathroom_detail set is_ensuit=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$_POST['ensuit_info'], $_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateOverbath($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("update landloard_apartment_bathroom_detail set standalone_shower=?,over_bath_shower=?,modified_on=now() where id=?");
			$stmt->bind_param("iii",$_POST['standalone'],$_POST['overbath'], $_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateShower($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			if($_POST['standalone']==1)
				{
				$stmt = $dbCon->prepare("update landloard_apartment_bathroom_detail set shower=?,standalone_shower=?,over_bath_shower=?,modified_on=now() where id=?");
				$stmt->bind_param("iiii",$_POST['standalone'],$_POST['standalone'],$_POST['overbath'], $_POST['bathroom_id']);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;	
				}
			$stmt = $dbCon->prepare("select count(id) as num from landloard_apartment_bathroom_detail where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==1)
			{
				if($_POST['standalone']==1)
				{
				$stmt = $dbCon->prepare("update landloard_apartment_bathroom_detail set shower=?,standalone_shower=?,over_bath_shower=?,modified_on=now() where id=?");
				$stmt->bind_param("iiii",$_POST['standalone'],$_POST['standalone'],$_POST['overbath'], $_POST['bathroom_id']);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;	
				}
			$stmt = $dbCon->prepare("select bath from landloard_apartment_bathroom_detail where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();	
			if($row['bath']==1)
			{
			$stmt = $dbCon->prepare("update landloard_apartment_bathroom_detail set shower=?,standalone_shower=?,over_bath_shower=?,modified_on=now() where id=?");
			$stmt->bind_param("iiii",$_POST['standalone'],$_POST['standalone'],$_POST['overbath'], $_POST['bathroom_id']);
			$stmt->execute();
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
			else
			{
			$stmt = $dbCon->prepare("select count(id) as num  from landloard_apartment_bathroom_detail where apartment_id=? and bath=1");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();	
			if($row['num']>0)
			{
			$stmt = $dbCon->prepare("select bath,toilet_and_sink from landloard_apartment_bathroom_detail where id=?");
			$stmt->bind_param("i", $_POST['bathroom_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();	
			if($row['bath']==0 && $row['toilet_and_sink']==0 && $_POST['standalone']==0)
			{
			$stmt = $dbCon->prepare("delete from landloard_apartment_bathroom_detail where id=?");
			$stmt->bind_param("i",$_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;		
			}
			else
			{
			$stmt = $dbCon->prepare("update landloard_apartment_bathroom_detail set shower=?,standalone_shower=?,over_bath_shower=?,modified_on=now() where id=?");
			$stmt->bind_param("iiii",$_POST['standalone'],$_POST['standalone'],$_POST['overbath'], $_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;	
			}	
			}
			else
			{
			$stmt = $dbCon->prepare("select count(id) as num  from landloard_apartment_bathroom_detail where apartment_id=? and shower=1");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();	
			if($row['num']>1)
			{
			$stmt = $dbCon->prepare("select bath,toilet_and_sink from landloard_apartment_bathroom_detail where id=?");
			$stmt->bind_param("i", $_POST['bathroom_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();	
			if($row['bath']==0 && $row['toilet_and_sink']==0 && $_POST['standalone']==0)
			{
			$stmt = $dbCon->prepare("delete from landloard_apartment_bathroom_detail where id=?");
			$stmt->bind_param("i",$_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;		
			}
			else
			{
			$stmt = $dbCon->prepare("update landloard_apartment_bathroom_detail set shower=?,standalone_shower=?,over_bath_shower=?,modified_on=now() where id=?");
			$stmt->bind_param("iiii",$_POST['standalone'],$_POST['standalone'],$_POST['overbath'], $_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;	
			}	
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return 0;
			}
			}
			
				
			}
			
		}
		
		function updateBath($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			if($_POST['bath']==1)
			 {
				$stmt = $dbCon->prepare("update landloard_apartment_bathroom_detail set bath=?,modified_on=now() where id=?"); 
				$stmt->bind_param("ii",$_POST['bath'], $_POST['bathroom_id']);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;
			 }
			$stmt = $dbCon->prepare("select count(id) as num from landloard_apartment_bathroom_detail where apartment_id=? && (bath=1 || shower=1)");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==1)
			{
			 
			$stmt->close();
			$dbCon->close();
			return 0;	
			 	
			}
			else
			{
			$stmt = $dbCon->prepare("select bath,toilet_and_sink from landloard_apartment_bathroom_detail where id=?");
			$stmt->bind_param("i", $_POST['bathroom_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();	
			if($row['shower']==0 && $row['toilet_and_sink']==0 && $_POST['bath']==0)
			{
			$stmt = $dbCon->prepare("delete from landloard_apartment_bathroom_detail where id=?");
			$stmt->bind_param("i",$_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			
			return 1;		
			}
			else
			{
			if($_POST['bath']==0)
			{
			$stmt = $dbCon->prepare("update landloard_apartment_bathroom_detail set bath=?,shower=0,standalone_shower=0,over_bath_shower=0,modified_on=now() where id=?");
			}
			else
			{
			$stmt = $dbCon->prepare("update landloard_apartment_bathroom_detail set bath=?,modified_on=now() where id=?");	
			}
			$stmt->bind_param("ii",$_POST['bath'], $_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;	
			}
				
			}
			
		}
		
		
		function countBathDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from landloard_apartment_bathroom_detail where apartment_id=? and bath=0 and shower=0");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row['num'];	
			 
			
		}
		
		
		function updateToilet($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select count(id) as num from landloard_apartment_bathroom_detail where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($_POST['bath']==1)	
			{
			$stmt = $dbCon->prepare("update landloard_apartment_bathroom_detail set toilet_and_sink=?,modified_on=now() where id=?");
			 
			$stmt->bind_param("ii",$_POST['bath'], $_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;		
			}
			$stmt = $dbCon->prepare("select count(id) as num from landloard_apartment_bathroom_detail where apartment_id=? and toilet_and_sink=1");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();
			if($row['num']==1)
			{
				
			$stmt->close();
			$dbCon->close();
			return 0;	
			}
			else
			{
			if(($row1['num']-1)==0)
			{
			$stmt->close();
			$dbCon->close();
			return 0;	
			}
			else
			{
			$stmt = $dbCon->prepare("select bath,shower from landloard_apartment_bathroom_detail where id=?");
			$stmt->bind_param("i", $_POST['bathroom_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();	
			if($row1['bath']==0 && $row1['shower']==0 && $_POST['bath']==0)	
			{
			$stmt = $dbCon->prepare("delete from  landloard_apartment_bathroom_detail where id=?");
			 
			$stmt->bind_param("i",$_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;		
			}
			else
			{
			$stmt = $dbCon->prepare("update landloard_apartment_bathroom_detail set toilet_and_sink=?,modified_on=now() where id=?");
			 
			$stmt->bind_param("ii",$_POST['bath'], $_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;	
			}
				
			}		
			}
			
		}
		function apartmentDescriptionDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select * from landloard_apartment_description where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into landloard_apartment_description (apartment_id) values (?)");
			$stmt->bind_param("i", $aid);
			$stmt->execute();			
			}
			$stmt = $dbCon->prepare("select * from landloard_apartment_description where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();	
			return $row;
		}
		
		
		function apartmentExteriorDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select * from landloard_apartment_exterior where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into landloard_apartment_exterior (apartment_id) values (?)");
			$stmt->bind_param("i", $aid);
			$stmt->execute();			
			}
			$stmt = $dbCon->prepare("select * from landloard_apartment_exterior where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();	
			return $row;
		}
		
		function updateApartmentDescription($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$sell_phrase=htmlentities($_POST['sell_phrase'],ENT_NOQUOTES, 'ISO-8859-1');
			$generally=htmlentities($_POST['generally'],ENT_NOQUOTES, 'ISO-8859-1');
			$selling_heading=htmlentities($_POST['selling_heading'],ENT_NOQUOTES, 'ISO-8859-1');
			$short_selling_description=htmlentities($_POST['short_selling_description'],ENT_NOQUOTES, 'ISO-8859-1');   
			$long_selling_description=htmlentities($_POST['long_selling_description'],ENT_NOQUOTES, 'ISO-8859-1'); 
			
			$stmt = $dbCon->prepare("update landloard_apartment_description set sell_phrase=?,generally=?,selling_heading=?,short_selling_description=?,long_selling_description=?,is_completed=1 where apartment_id=?");
			$stmt->bind_param("sssssi",$sell_phrase,$generally,$selling_heading,$short_selling_description,$long_selling_description, $aid);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select * from landloard_building_port_floors_offices where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['apartment_completed']==80)
			{
			$apartment_completed=$row['apartment_completed']+10;
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set apartment_completed=? where id=?");
			$stmt->bind_param("ii",$apartment_completed, $aid);
			$stmt->execute();	
			}
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updatePublishInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set is_published=? where id=?");
			$stmt->bind_param("ii",$_POST['id'], $aid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateApartmentPoolInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			if($_POST['food1']==0)
			{
			$_POST['apartment_size']=100;	
			}
			
			if($_POST['food2']==0)
			{
			$_POST['apartment_terrace_size']=20;	
			}
			
			if($_POST['food3']==0)
			{
			$_POST['apartment_balcony_size']=10;	
			}
			$stmt = $dbCon->prepare("update landloard_apartment_exterior set pool_available=?,pool_area=?,terrace_available=?,terrace_area=?,balcony_available=?,balcony_area=? where apartment_id=?");
			$stmt->bind_param("idididi",$_POST['food1'],$_POST['apartment_size'],$_POST['food2'],$_POST['apartment_terrace_size'],$_POST['food3'], $_POST['apartment_balcony_size'], $aid);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select * from landloard_building_port_floors_offices where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['apartment_completed']==90)
			{
			$apartment_completed=$row['apartment_completed']+10;
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set apartment_completed=? where id=?");
			$stmt->bind_param("ii",$apartment_completed, $aid);
			$stmt->execute();	
			}
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateApartmentStatusInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set  bidding_status=? where id=?");
			$stmt->bind_param("ii",$_POST['apartment_status'], $aid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		
			function bathroomDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select * from landloard_apartment_bathroom_detail where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$j++;
				$org=$org.' <div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile'.$j.'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold">Bathroom '.$j.'
								<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="profile'.$j.'" class=" " style="display: block;">	
										 
									  
											<div id="'.$row['id'].'">';
			 						
		if($row['toilet_and_sink']==1)
		{
			$toilet='<a href="javascript:void(0);" onclick="updateToilet('.$row['id'].',0);"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">Toilet and Sink</span>
															   </span>
															</span>
														 </div>
													  </div></a>';
		}
		else
		{
		$toilet='<a href="javascript:void(0);" onclick="updateToilet('.$row['id'].',1);"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Toilet and Sink</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		if($row['bath']==1)
		{
			$bath='<a href="javascript:void(0);" onclick="updateBath('.$row['id'].',0);"><div id="bath-chip" class="css-cedhmb">
						   <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
							  <span class="chip chip_is-selected">
								 <span class="chip_content">
									<div class="css-utgzrm"></div>
									<span class="chip_text">Bath</span>
								 </span>
							  </span>
						   </div>
						</div></a>';
		}
		else
		{
		$bath='<a href="javascript:void(0);" onclick="updateBath('.$row['id'].',1);"><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Bath</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		
		if($row['shower']==1)
		{
			$shower='<a href="javascript:void(0);" onclick="updateShower('.$row['id'].',0);"><div id="shower-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="shower-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">Shower</span>
															   </span>
															</span>
														 </div>
													  </div></a>';
		if($row['standalone_shower']==1)
		{
			 
			$stype=	'<div data-testid="shower-type-radio-questions" class="css-1abdbqe">
							   <label for="shower-type-radio-questions" class="css-1rlpief">What type of shower does this bathroom have?</label>
							   <div id="spacer" spacing="small" class="css-1coujgl"></div>
							   <form>
								  <div class="css-1kbx24p">
									 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
										<label class="tbp-radio tbp-radio--checked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" for="A standalone shower-walk in">
										   <a href="javascript:void(0);" onclick="updateStandAlone('.$row['id'].');"><div class="tbp-radio__container">
											  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--checked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" id="A standalone shower-walk in" name="A standalone shower" value="walk in" checked>
											  <div class="tbp-radio__button"></div>
											  <div class="tbp-radio__label">A standalone shower</div>
										   </div></a>
										   <div class="tbp-radio__children"></div>
										</label>
									 </div>
								  </div>
								  <div id="spacer" spacing="small" class="css-1coujgl"></div>
								  <div class="css-1kbx24p">
									 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
										<label class="tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath">
										  <a href="javascript:void(0);" onclick="updateOverbath('.$row['id'].');"> <div class="tbp-radio__container">
											  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="An over-bath shower-over bath" name="An over-bath shower" value="over bath">
											  <div class="tbp-radio__button"></div>
											  <div class="tbp-radio__label">An over-bath shower</div>
										   </div></a>
										   <div class="tbp-radio__children"></div>
										</label>
									 </div>
								  </div>
							   </form>
							</div>';
		}
		else
		{
			 
			$stype='<div data-testid="shower-type-radio-questions" class="css-1abdbqe">
						   <label for="shower-type-radio-questions" class="css-1rlpief">What type of shower does this bathroom have?</label>
						   <div id="spacer" spacing="small" class="css-1coujgl"></div>
						   <form>
							  <div class="css-1kbx24p">
								 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
									<label class="tbp-radio tbp-radio--unchecked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" for="A standalone shower-walk in">
									   <a href="javascript:void(0);" onclick="updateStandAlone('.$row['id'].');"> <div class="tbp-radio__container">
										  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" id="A standalone shower-walk in" name="A standalone shower" value="walk in" >
										  <div class="tbp-radio__button"></div>
										  <div class="tbp-radio__label">A standalone shower</div>
									   </div></a>
									   <div class="tbp-radio__children"></div>
									</label>
								 </div>
							  </div>
							  <div id="spacer" spacing="small" class="css-1coujgl"></div>
							  <div class="css-1kbx24p">
								 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
									<label class="tbp-radio tbp-radio--checked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath">
									   <a href="javascript:void(0);" onclick="updateOverbath('.$row['id'].');"><div class="tbp-radio__container">
										  <input type="radio" class="tbp-radio__input tbp-radio tbp-radio--checked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="An over-bath shower-over bath" name="An over-bath shower" value="over bath" checked>
										  <div class="tbp-radio__button"></div>
										  <div class="tbp-radio__label">An over-bath shower</div>
									   </div></a>
									   <div class="tbp-radio__children"></div>
									</label>
								 </div>
							  </div>
						   </form>
						</div>';
		}	
												  
													  
		}
		else
		{
		$shower='<a href="javascript:void(0);" onclick="updateShower('.$row['id'].',1);"><div id="shower-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="shower-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Shower</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
			$stype='';										  
													  
		}
		
		
		if($row['is_private']==1)
		{
			$Private='<a href="javascript:void(0);" onclick="updatePrivate('.$row['id'].',0);"><div id="private-chip" class="css-cedhmb">
						   <div tabindex="0" role="button" id="private-chip" class="css-1w0xfwu">
							  <span class="chip chip_is-selected">
								 <span class="chip_content">
									<div class="css-utgzrm"></div>
									<span class="chip_text">Private</span>
								 </span>
							  </span>
						   </div>
						</div></a>';
		}
		else
		{
		$Private='<a href="javascript:void(0);" onclick="updatePrivate('.$row['id'].',1);"><div id="private-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="private-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Private</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		if($row['is_wheelchair_accessible']==1)
		{
			$wheelchair='<a href="javascript:void(0);" onclick="updateWheelchair('.$row['id'].',0);"><div id="wheelchair-chip" class="css-cedhmb">
						   <div tabindex="0" role="button" id="wheelchair-chip" class="css-1w0xfwu">
							  <span class="chip chip_is-selected">
								 <span class="chip_content">
									<div class="css-utgzrm"></div>
									<span class="chip_text">Wheelchair accessible</span>
								 </span>
							  </span>
						   </div>
						</div></a>';
		}
		else
		{
		$wheelchair='<a href="javascript:void(0);" onclick="updateWheelchair('.$row['id'].',1);"><div id="wheelchair-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="wheelchair-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Wheelchair accessible</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		if($row['is_ensuit']==1)
		{
			$ensuit='<a href="javascript:void(0);" onclick="updateEnsuit('.$row['id'].',0);"><div id="ensuit-chip" class="css-cedhmb">
						   <div tabindex="0" role="button" id="ensuit-chip" class="css-1w0xfwu">
							  <span class="chip chip_is-selected">
								 <span class="chip_content">
									<div class="css-utgzrm"></div>
									<span class="chip_text">Ensuit</span>
								 </span>
							  </span>
						   </div>
						</div></a>';
		}
		else
		{
		$ensuit='<a href="javascript:void(0);" onclick="updateEnsuit('.$row['id'].',1);"><div id="ensuit-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="ensuit-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Ensuit</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
			
				$org=$org.'<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt  ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												 <div class="css-1jzh2co marb15">
												   <p class="paragraph--b1 paragraph--full css-1680uhd">Select the features which are available in this bathroom</p>
												   <div class="chip-container">
													  '.$toilet.'
													 '.$bath.'
													 '.$shower.'
													 
													 
												   </div>
												</div>
												<div class="clear"></div>
											<div id="spacer" spacing="large" class="css-swt4jz"></div>
											'.$stype.'
											<div id="spacer" spacing="large" class="css-swt4jz"></div>
											
											<div class="css-1jzh2co mart15">
											   <p class="paragraph--b1 paragraph--full css-1680uhd ">Select the bathroom type</p>
											   <div class="chip-container">
												  '.$Private.'
												  '.$wheelchair.'
												'. $ensuit.'
											   </div>
											</div>
											
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div>
									</div><div class="clear"></div>
									</div>
									</div>
									';	
 								
											
			
			 
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		function bathroomCount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select count(id) as num from landloard_apartment_bathroom_detail where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("insert into landloard_apartment_bathroom_detail (apartment_id, created_on, modified_on) values (?,now(), now())");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select * from landloard_building_port_floors_offices where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$apartment_completed=$row['apartment_completed']+10;
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set apartment_completed=? where id=?");
			$stmt->bind_param("ii",$apartment_completed, $aid);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select count(id) as num from landloard_apartment_bathroom_detail where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			}
			else if($row['num']>0)
			{
			 
			$stmt = $dbCon->prepare("select * from landloard_building_port_floors_offices where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['apartment_completed']==50)
			{
			$apartment_completed=$row['apartment_completed']+10;
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set apartment_completed=? where id=?");
			$stmt->bind_param("ii",$apartment_completed, $aid);
			$stmt->execute();	
			}
			$stmt = $dbCon->prepare("select count(id) as num from landloard_apartment_bathroom_detail where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			}
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set bathroom_count=? where id=?");
			$stmt->bind_param("ii", $row['num'],$aid);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return $row['num'];	
		}
		
		
		function updateOtherRoomInfo($data)
		{ 
			
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$_POST['aid']);
			$stmt = $dbCon->prepare("select * from landloard_apartment_other_room_detail where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc(); 
			if($_POST['id']==1)
			{
				if($row['hall_room_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update landloard_apartment_other_room_detail set hall_room_available=? where apartment_id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();			
			}
			else if($_POST['id']==2)
			{
				if($row['living_room_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update landloard_apartment_other_room_detail set living_room_available=? where apartment_id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();			
			}
			else if($_POST['id']==3)
			{
				if($row['work_room_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update landloard_apartment_other_room_detail set work_room_available=? where apartment_id=?");	
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			}
			else if($_POST['id']==4)
			{
				if($row['hobby_room_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update landloard_apartment_other_room_detail set hobby_room_available=? where apartment_id=?");	
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			}
			else if($_POST['id']==5)
			{
			if($row['sal_room_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update landloard_apartment_other_room_detail set sal_room_available=? where apartment_id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			}
			else if($_POST['id']==6)
			{
			if($row['salon_room_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update landloard_apartment_other_room_detail set salon_room_available=? where apartment_id=?");	
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			}
			else if($_POST['id']==7)
			{
			if($row['vestibule_room_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update landloard_apartment_other_room_detail set vestibule_room_available=? where apartment_id=?");	
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			}
			else if($_POST['id']==8)
			{
			if($row['dining_room_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update landloard_apartment_other_room_detail set dining_room_available=? where apartment_id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();			
			}
			else if($_POST['id']==9) 
			{
				if($row['chamber_room_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update landloard_apartment_other_room_detail set chamber_room_available=? where apartment_id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			}
			else if($_POST['id']==10)
			{
				if($row['balcony_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update landloard_apartment_other_room_detail set balcony_available=? where apartment_id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			}
			else if($_POST['id']==11)
			{
				if($row['terrace_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update landloard_apartment_other_room_detail set terrace_available=? where apartment_id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			}
			else if($_POST['id']==12)
			{
				if($row['storage_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update landloard_apartment_other_room_detail set storage_available=? where apartment_id=?");
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			 $stmt->execute();
			}
			else if($_POST['id']==13)
			{
				if($row['basement_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update landloard_apartment_other_room_detail set basement_available=? where apartment_id=?");	
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			 
			}
			else if($_POST['id']==14)
			{
				if($row['garage_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update landloard_apartment_other_room_detail set garage_available=? where apartment_id=?");	
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
			 	
			}
			
			else if($_POST['id']==15)
			{
				if($row['kitchen_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update landloard_apartment_other_room_detail set kitchen_available=? where apartment_id=?");	
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
				
			}
			else if($_POST['id']==16)
			{
				if($row['entrance_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update landloard_apartment_other_room_detail set entrance_available=? where apartment_id=?");	
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
				
			}
			else if($_POST['id']==17)
			{
				if($row['bicycle_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update landloard_apartment_other_room_detail set bicycle_available=? where apartment_id=?");	
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
				
			}
			
			else if($_POST['id']==18)
			{
				if($row['waste_room_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update landloard_apartment_other_room_detail set waste_room_available=? where apartment_id=?");	
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
				
			}
			
			else if($_POST['id']==19)
			{
				if($row['stroller_available']==0)
				{
				$_POST['updateInfo']=1;	
				}
				else
				{
					$_POST['updateInfo']=0;
				}
			$stmt = $dbCon->prepare("update landloard_apartment_other_room_detail set stroller_available=? where apartment_id=?");	
			$stmt->bind_param("ii",$_POST['updateInfo'], $aid);
			$stmt->execute();
				
			}
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function OtherRoomInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select count(id) as num from landloard_apartment_other_room_detail where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("insert into landloard_apartment_other_room_detail (apartment_id) values (?)");
			$stmt->bind_param("i", $aid);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("select * from landloard_building_port_floors_offices where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$apartment_completed=$row['apartment_completed']+10;
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set apartment_completed=? where id=?");
			$stmt->bind_param("ii",$apartment_completed, $aid);
			$stmt->execute();
			}
			else 
			{
			$stmt = $dbCon->prepare("select * from landloard_building_port_floors_offices where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['apartment_completed']==60)
			{
			$apartment_completed=$row['apartment_completed']+10;
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set apartment_completed=? where id=?");
			$stmt->bind_param("ii",$apartment_completed, $aid);
			$stmt->execute();	
			}
			 
			}
			
			$stmt = $dbCon->prepare("select * from landloard_building_port_floors_offices where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['apartment_completed']==70)
			{
			$stmt = $dbCon->prepare("select count(id) as num from landloard_object_photos where object_id=? and sorting_number=1");
			/* bind parameters for markers */
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$resultApartment = $stmt->get_result();
			$rowPic = $resultApartment->fetch_assoc(); 
			if($rowPic['num']>0)
			{
			$apartment_completed=$row['apartment_completed']+10;
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set apartment_completed=? where id=?");
			$stmt->bind_param("ii",$apartment_completed, $aid);
			$stmt->execute();	
			}
			}
			
			$stmt = $dbCon->prepare("select * from landloard_apartment_other_room_detail where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		
		function addBathroom($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("insert into landloard_apartment_bathroom_detail (apartment_id, created_on, modified_on) values (?,now(), now())");
			$stmt->bind_param("i", $aid);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("select count(id) as num from landloard_apartment_bathroom_detail where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set bathroom_count=? where id=?");
			$stmt->bind_param("ii", $row['num'],$aid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
			function deleteBathroom($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from landloard_apartment_bathroom_detail where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']>1)
			{
			$stmt = $dbCon->prepare("select max(id) as m_id from landloard_apartment_bathroom_detail where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("delete from landloard_apartment_bathroom_detail where id=?");
			$stmt->bind_param("i", $row['m_id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("select count(id) as num from landloard_apartment_bathroom_detail where apartment_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set bathroom_count=? where id=?");
			$stmt->bind_param("ii", $row['num'],$aid);
			$stmt->execute();
			
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
		
		function updateWheelchair($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 $stmt = $dbCon->prepare("update landloard_apartment_bathroom_detail set is_wheelchair_accessible=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$_POST['wheel_info'], $_POST['bathroom_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updatePhotoOrder($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select sorting_number from landloard_object_photos where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$newSort=$row['sorting_number']+$_POST['addDelete'];
			
			
			$stmt = $dbCon->prepare("select id from landloard_object_photos where sorting_number=? and object_id=?");
			$stmt->bind_param("ii", $newSort,$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();	
			
			$stmt = $dbCon->prepare("update landloard_object_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row['sorting_number'], $row1['id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("update landloard_object_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $_POST['photoId']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updatePhotoDragging($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select sorting_number from landloard_object_photos where id=?");
			$stmt->bind_param("i", $_POST['draggedItem']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select sorting_number from landloard_object_photos where id=?");
			$stmt->bind_param("i", $_POST['draggedTarget']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();
			 
			if($row1['sorting_number']>$row['sorting_number'])
			{
			$stmt = $dbCon->prepare("select id,sorting_number from landloard_object_photos where sorting_number>? and id<=? and object_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
			$newSort=$rowUpdate['sorting_number']-1;
			$stmt = $dbCon->prepare("update landloard_object_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			else
			{
			$stmt = $dbCon->prepare("select id,sorting_number from landloard_object_photos where sorting_number<? and id>=? and object_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
				$newSort=$rowUpdate['sorting_number']+1;
			$stmt = $dbCon->prepare("update landloard_object_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			
			$stmt = $dbCon->prepare("update landloard_object_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row1['sorting_number'], $_POST['draggedItem']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function deletePhoto($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select sorting_number from landloard_object_photos where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("delete from  landloard_object_photos where id=?");
			$stmt->bind_param("i",$_POST['photoId']);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select id,sorting_number from landloard_object_photos where sorting_number>? and object_id=?");
			$stmt->bind_param("ii", $row['sorting_number'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row1 = $result->fetch_assoc())	
			{
				$newSort=$row1['sorting_number']-1;
			$stmt = $dbCon->prepare("update landloard_object_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $row1['id']);
			$stmt->execute();		
			}
			
			$stmt = $dbCon->prepare("select count(id) as num from landloard_object_photos where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();	
			if($row['num']<5)
			{
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set is_published=0 where id=?");
			$stmt->bind_param("i",$aid);
			$stmt->execute();	
			}				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updatePhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$data1 = strip_tags($_POST['update_info']);
			define('UPLOAD_DIR','../estorecss/'); 
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			
			$stmt = $dbCon->prepare("select count(object_id) as num from landloard_object_photos where object_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$snumber=$row['num']+1;
			
			$stmt = $dbCon->prepare("insert into landloard_object_photos (apartment_photo_path,object_id,sorting_number) values(?, ?, ?)");
			$stmt->bind_param("sii",$img_name1, $aid,$snumber);
			$stmt->execute();

			$stmt = $dbCon->prepare("select * from landloard_building_port_floors_offices where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowApartment = $result->fetch_assoc();
			if($rowApartment['apartment_completed']==70)
			{
			$apartment_completed=$rowApartment['apartment_completed']+10;
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set apartment_completed=? where id=?");
			$stmt->bind_param("ii",$apartment_completed, $aid);
			$stmt->execute();	
			}	
					
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
			function getImageInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 $stmt = $dbCon->prepare("select apartment_photo_path,sorting_number,id from landloard_object_photos where id=? ");
			$stmt->bind_param("i", $_POST['update_info']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$row1 = $result1->fetch_assoc();
				 
			
				
				 $filename="../estorecss/".$row1 ['apartment_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['apartment_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['apartment_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org='<a class="lightbox__img-nav false"></a><img class="lightbox__img" src="../../../../../../'.$image.'">'; 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function objectPhotoCount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select count(object_id) as num from landloard_object_photos where object_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];	
		}
		
		function displayPhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select count(object_id) as num from landloard_object_photos where object_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select * from landloard_building_port_floors_offices where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowApartment = $result->fetch_assoc();
			if($rowApartment['apartment_completed']==70)
			{
			if($row['num']>0)
			{
			$apartment_completed=$rowApartment['apartment_completed']+10;
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set apartment_completed=? where id=?");
			$stmt->bind_param("ii",$apartment_completed, $aid);
			$stmt->execute();	
			}
			}
			
			
			$stmt = $dbCon->prepare("select apartment_photo_path,sorting_number,id from landloard_object_photos where object_id=? order by sorting_number ");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$i=1;
			$org='';
			if($row['num']==1)
			{
				$first="hidden";
				$last="hidden";
			}
			else
			{
			$first="hidden";
			$last="";	
			}
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			while($row1 = $result1->fetch_assoc())
			{
				 
				if($i==$row['num'])
				{
				$last="hidden";	
				}
				
				 $filename="../estorecss/".$row1 ['apartment_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['apartment_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['apartment_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org=$org.'<div class="target-indicator padtb10" id="'.$row1['id'].'" ondrop="drop(event)" ondragover="allowDrop(event)"></div>

						<div class="drag-drop__wrapper " draggable="true" id="drag_'.$row1['id'].'" ondragstart="drag(event,'.$row1['id'].')">
																<div class="photo-tile">
																   <div class="handlebar ">
																	  <div class="handlebar__row handlebar__top">
																		<a href="javascript:void(0);" onclick="updatePhotoDecrement('.$row1['id'].');"> <div class="handlebar__cell handlebar__arrow '.$first.' grabbable"><i class="fas fa-chevron-up fsz16"></i></div>
																	  </div></a>
																	  <div class="handlebar__row handlebar__middle">
																		 <div class="handlebar__cell handlebar__grip grabbable"> </div>
																	  </div>
																	  <div class="handlebar__row handlebar__bottom">
																		<a href="javascript:void(0);" onclick="updatePhotoOrderIncreament('.$row1['id'].');"><div class="handlebar__cell handlebar__arrow '.$last.'" tabindex="0" aria-label="Move down"><i class="fas fa-chevron-down fsz16"></i></div></a>
																	  </div>
																   </div>
																   <div class="photo-tile__body">
																	  <img class="photo-tile__image" src="../../../../../../'.$image.'" alt="Photo 1">
																	  <div class="photo-tile__content">
																		 <div class="photo-tile__tags xs-tall">
																			<div class="photo-tile__tags__properties"><span class="tag tag--standard tag--success white_txt padrl5">High resolution</span><span class="tag tag--standard tag--neutral padrl5 lgtgrey2_bg">Landscape</span></div>
																			<div class="photo-tile__tags__labels"></div>
																		 </div>
																		 <div class="photo-tile__actions">
																		<a href="javascript:void(0);" class="xsi-mart0 show_popup_modal" data-target="#gratis_popup_error" onclick="getImageInfo('.$row1['id'].');">	<button color="#444444" label="View photo" aria-label="View photo" class="merlin-button css-12d2atf">
																			   <div class="merlin-button__content">View</div>
																			</button></a>
																			<a href="javascript:void(0);" tabindex="0" onclick="deletePhoto('.$row1['id'].');">Delete</a>
																		 </div>
																	  </div>
																   </div>
																</div>
															 </div>';
															 $first="";
															 $i++;
			}	
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function fetchCitechCity($data)
    {
		
		
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from vitech_city  where region_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['vitech_region_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0">Select</option>'; 
			while($row = $result->fetch_assoc())
			{
				if($row['id']==$data['vitech_city_id'])
				{
					$select='selected';
				}
				else
				{
					$select='';
				}
			$org=$org.'<option value="'.$row['id'].'" '.$select.'>'.$row['city_name'].'</option>'; 	
			}
			$stmt->close();
			$dbCon->close();
			return $org;
        
    }
	
	function fetchCitechArea($data)
    {
		
		
			$dbCon = AppModel::createConnection();
        
			$stmt = $dbCon->prepare("select * from vitech_area  where region_city_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['vitech_city_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0">Select</option>'; 
			while($row = $result->fetch_assoc())
			{
			if($row['id']==$data['vitech_area_id'])
				{
					$select='selected';
				}
				else
				{
					$select='';
				}
			$org=$org.'<option value="'.$row['id'].'" '.$select.'>'.$row['area_name'].'</option>'; 	
			}
			$stmt->close();
			$dbCon->close();
			return $org;
        
    }
	
		function updateBuildingPhotoOrder($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['bid']);
			
			$stmt = $dbCon->prepare("select sorting_number from landloard_building_photos where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$newSort=$row['sorting_number']+$_POST['addDelete'];
			
			
			$stmt = $dbCon->prepare("select id from landloard_building_photos where sorting_number=? and building_id=?");
			$stmt->bind_param("ii", $newSort,$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();	
			
			$stmt = $dbCon->prepare("update landloard_building_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row['sorting_number'], $row1['id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("update landloard_building_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $_POST['photoId']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateBuildingPhotoDragging($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['bid']);
			
			$stmt = $dbCon->prepare("select sorting_number from landloard_building_photos where id=?");
			$stmt->bind_param("i", $_POST['draggedItem']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select sorting_number from landloard_building_photos where id=?");
			$stmt->bind_param("i", $_POST['draggedTarget']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();
			 
			if($row1['sorting_number']>$row['sorting_number'])
			{
			$stmt = $dbCon->prepare("select id,sorting_number from landloard_building_photos where sorting_number>? and id<=? and building_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
			$newSort=$rowUpdate['sorting_number']-1;
			$stmt = $dbCon->prepare("update landloard_building_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			else
			{
			$stmt = $dbCon->prepare("select id,sorting_number from landloard_building_photos where sorting_number<? and id>=? and building_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
				$newSort=$rowUpdate['sorting_number']+1;
			$stmt = $dbCon->prepare("update landloard_building_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			
			$stmt = $dbCon->prepare("update landloard_building_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row1['sorting_number'], $_POST['draggedItem']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function deleteBuildingPhoto($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['bid']);
			
			$stmt = $dbCon->prepare("select sorting_number from landloard_building_photos where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("delete from  landloard_building_photos where id=?");
			$stmt->bind_param("i",$_POST['photoId']);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select id,sorting_number from landloard_building_photos where sorting_number>? and building_id=?");
			$stmt->bind_param("ii", $row['sorting_number'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row1 = $result->fetch_assoc())	
			{
				$newSort=$row1['sorting_number']-1;
			$stmt = $dbCon->prepare("update landloard_building_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $row1['id']);
			$stmt->execute();		
			}
			
			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_photos where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();	
			if($row['num']<5)
			{
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set is_published=0 where id=?");
			$stmt->bind_param("i",$aid);
			$stmt->execute();	
			}				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateBuildingPhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['bid']);
			$data1 = strip_tags($_POST['update_info']);
			define('UPLOAD_DIR','../estorecss/'); 
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			
			$stmt = $dbCon->prepare("select count(building_id) as num from landloard_building_photos where building_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$snumber=$row['num']+1;
			
			$stmt = $dbCon->prepare("insert into landloard_building_photos (building_photo_path,building_id,sorting_number) values(?, ?, ?)");
			$stmt->bind_param("sii",$img_name1, $aid,$snumber);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
			function getBuildingImageInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['bid']);
			 $stmt = $dbCon->prepare("select building_photo_path,sorting_number,id from landloard_building_photos where id=? ");
			$stmt->bind_param("i", $_POST['update_info']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$row1 = $result1->fetch_assoc();
				 
			
				
				 $filename="../estorecss/".$row1 ['building_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['building_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['building_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org='<a class="lightbox__img-nav false"></a><img class="lightbox__img" src="../../../../'.$image.'">'; 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function buildingPhotoCount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['bid']);
			
			$stmt = $dbCon->prepare("select count(building_id) as num from landloard_building_photos where building_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];	
		}
		
		function displayBuildingPhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['bid']);
			
			$stmt = $dbCon->prepare("select count(building_id) as num from landloard_building_photos where building_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select building_photo_path,sorting_number,id from landloard_building_photos where building_id=? order by sorting_number ");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$i=1;
			$org='';
			if($row['num']==1)
			{
				$first="hidden";
				$last="hidden";
			}
			else
			{
			$first="hidden";
			$last="";	
			}
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			while($row1 = $result1->fetch_assoc())
			{
				 
				if($i==$row['num'])
				{
				$last="hidden";	
				}
				
				 $filename="../estorecss/".$row1 ['building_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['building_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['building_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org=$org.'<div class="target-indicator padtb10" id="'.$row1['id'].'" ondrop="drop(event)" ondragover="allowDrop(event)"></div>

						<div class="drag-drop__wrapper " draggable="true" id="drag_'.$row1['id'].'" ondragstart="drag(event,'.$row1['id'].')">
																<div class="photo-tile">
																   <div class="handlebar ">
																	  <div class="handlebar__row handlebar__top">
																		<a href="javascript:void(0);" onclick="updatePhotoDecrement('.$row1['id'].');"> <div class="handlebar__cell handlebar__arrow '.$first.' grabbable"><i class="fas fa-chevron-up fsz16"></i></div>
																	  </div></a>
																	  <div class="handlebar__row handlebar__middle">
																		 <div class="handlebar__cell handlebar__grip grabbable"> </div>
																	  </div>
																	  <div class="handlebar__row handlebar__bottom">
																		<a href="javascript:void(0);" onclick="updatePhotoOrderIncreament('.$row1['id'].');"><div class="handlebar__cell handlebar__arrow '.$last.'" tabindex="0" aria-label="Move down"><i class="fas fa-chevron-down fsz16"></i></div></a>
																	  </div>
																   </div>
																   <div class="photo-tile__body">
																	  <img class="photo-tile__image" src="../../../../'.$image.'" alt="Photo 1">
																	  <div class="photo-tile__content">
																		 <div class="photo-tile__tags xs-tall">
																			<div class="photo-tile__tags__properties"><span class="tag tag--standard tag--success white_txt padrl5">High resolution</span><span class="tag tag--standard tag--neutral padrl5 lgtgrey2_bg">Landscape</span></div>
																			<div class="photo-tile__tags__labels"></div>
																		 </div>
																		 <div class="photo-tile__actions">
																		<a href="javascript:void(0);" class="xsi-mart0 show_popup_modal" data-target="#gratis_popup_error" onclick="getImageInfo('.$row1['id'].');">	<button color="#444444" label="View photo" aria-label="View photo" class="merlin-button css-12d2atf">
																			   <div class="merlin-button__content">View</div>
																			</button></a>
																			<a href="javascript:void(0);" tabindex="0" onclick="deletePhoto('.$row1['id'].');">Delete</a>
																		 </div>
																	  </div>
																   </div>
																</div>
															 </div>';
															 $first="";
															 $i++;
			}	
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
	}
?>