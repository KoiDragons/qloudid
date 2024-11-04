<?php
	require_once('../AppModel.php');
	class CarRentalModel extends AppModel
	{
		function updateBookingRulesDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['location_id']); 
			 
			if($_POST['day1']==0)
			 {
				 $_POST['cancellation_fee_24_hrs']=0;
				 $_POST['cancellation_fee_12_hrs']=0;
				 
			 }
			 
			 if($_POST['day2']==0)
			 {
				 $_POST['service_tax']=0;
				 
			 }
			 
			if($_POST['day3']==0)
			 {
				 $_POST['total_vat']=0;
				 
			 }
			  
			if($_POST['day4']==0)
			 {
				 $_POST['deposit_fee']=0;
				 
			 }
			  
			 if($_POST['day5']==0)
			 {
				 $_POST['night_charges']=0;
				 
			 }
			 
			 if($_POST['day6']==0)
			 {
				 $_POST['total_free_km']=0;
				 $_POST['per_km_fee']=0;
			 }
			  
			  
			 
			$stmt = $dbCon->prepare("update car_rental_booking_rules set  cancellation_fee_applicable=?, cancellation_fee_24_hrs=?, cancellation_fee_12_hrs=?, service_tax_applicable=?, service_tax=?, vat_applicable=?, total_vat=?, deposit_fee_applicable=?, deposit_fee=?, night_charges_applicable=?, night_charges=?, unlimited_free_km=?, total_free_km=?, per_km_fee=?, insurance_per_day_fee=?, insurance_period_fee=?   where location_id=? ");
			$stmt->bind_param("iiiiiiiiiiiiiiiii",$_POST['day1'],$_POST['cancellation_fee_24_hrs'],$_POST['cancellation_fee_12_hrs'],$_POST['day2'],$_POST['service_tax'],$_POST['day3'],$_POST['total_vat'],$_POST['day4'],$_POST['deposit_fee'],$_POST['day5'],$_POST['night_charges'],$_POST['day6'],$_POST['total_free_km'],$_POST['per_km_fee'],$_POST['insurance_per_day_fee'],$_POST['insurance_period_fee'],$location_id);
			 
			  
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
		
		function updateBookingHoursDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['location_id']); 
			 
			if($_POST['day1']==1)
			 {
				 $booking_mon_open=1;
				 $booking_mon_open_time=$_POST['booking_mon_open'];
				 $booking_mon_close_time=$_POST['booking_mon_close'];
				 
			 }
			 else
			 {
				 $booking_mon_open=0;
				 $booking_mon_open_time='';
				 $booking_mon_close_time='';
				 
			 }	
			 if($_POST['day2']==1)
			 {
				 $booking_tue_open=1;
				 $booking_tue_open_time=$_POST['booking_tue_open'];
				 $booking_tue_close_time=$_POST['booking_tue_close'];
				 
			 }
			 else
			 {
				 $booking_tue_open=0;
				 $booking_tue_open_time='';
				 $booking_tue_close_time='';
				 
			 }
			if($_POST['day3']==1)
			 {
				 $booking_wed_open=1;
				 $booking_wed_open_time=$_POST['booking_wed_open'];
				 $booking_wed_close_time=$_POST['booking_wed_close'];
				 
			 }
			 else
			 {
				 $booking_wed_open=0;
				 $booking_wed_open_time='';
				 $booking_wed_close_time='';
				 
			 }
			if($_POST['day4']==1)
			 {
				 $booking_thu_open=1;
				 $booking_thu_open_time=$_POST['booking_thu_open'];
				 $booking_thu_close_time=$_POST['booking_thu_close'];
				 
			 }
			 else
			 {
				 $booking_thu_open=0;
				 $booking_thu_open_time='';
				 $booking_thu_close_time='';
				 
			 }
			 if($_POST['day5']==1)
			 {
				 $booking_fri_open=1;
				 $booking_fri_open_time=$_POST['booking_fri_open'];
				 $booking_fri_close_time=$_POST['booking_fri_close'];
				 
			 }
			 else
			 {
				 $booking_fri_open=0;
				 $booking_fri_open_time='';
				 $booking_fri_close_time='';
				 
			 }
			 if($_POST['day6']==1)
			 {
				 $booking_sat_open=1;
				 $booking_sat_open_time=$_POST['booking_sat_open'];
				 $booking_sat_close_time=$_POST['booking_sat_close'];
				 
			 }
			 else
			 {
				 $booking_sat_open=0;
				 $booking_sat_open_time='';
				 $booking_sat_close_time='';
				 
			 }
			 if($_POST['day7']==1)
			 {
				 $booking_sun_open=1;
				 $booking_sun_open_time=$_POST['booking_sun_open'];
				 $booking_sun_close_time=$_POST['booking_sun_close'];
				  
			 }
			 else
			 {
				 $booking_sun_open=0;
				 $booking_sun_open_time='';
				 $booking_sun_close_time='';
				 
			 }
			 
			$stmt = $dbCon->prepare("update car_rental_opening_hours set  booking_mon_open=?, booking_mon_open_time=?, booking_mon_close_time=?, booking_tue_open=?, booking_tue_open_time=?, booking_tue_close_time=?, booking_wed_open=?, booking_wed_open_time=?, booking_wed_close_time=?, booking_thu_open=?, booking_thu_open_time=?, booking_thu_close_time=?, booking_fri_open=?, booking_fri_open_time=?, booking_fri_close_time=?, booking_sat_open=?, booking_sat_open_time=?, booking_sat_close_time=?, booking_sun_open=?, booking_sun_open_time=?, booking_sun_close_time=?  where location_id=? ");
			$stmt->bind_param("issississississississi",  $booking_mon_open, $booking_mon_open_time, $booking_mon_close_time, $booking_tue_open, $booking_tue_open_time, $booking_tue_close_time, $booking_wed_open, $booking_wed_open_time, $booking_wed_close_time, $booking_thu_open, $booking_thu_open_time, $booking_thu_close_time, $booking_fri_open, $booking_fri_open_time, $booking_fri_close_time, $booking_sat_open, $booking_sat_open_time, $booking_sat_close_time, $booking_sun_open, $booking_sun_open_time, $booking_sun_close_time,$location_id);
			 
			  
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
		
		
		function locationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select hotel_name,property_location.id,property_name,visiting_address,property_location.created_on,is_hotel from property_location left join property on property.id=property_location.property_id left join hotel_basic_information on hotel_basic_information.property_id=property_location.id  where property_location.company_id=? order by created_on desc");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
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
		
		
		function carAvailableModelList()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from car_rental_model order by car_model");
			
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
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
		
		
		function vehicleTypeList($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['location_id']);
			$stmt = $dbCon->prepare("select car_rental_available_car_type.id,car_model,model_series from car_rental_available_car_type left join car_rental_model on car_rental_model.id=car_rental_available_car_type.brand_type left join car_rental_model_series on car_rental_model_series.id=car_rental_available_car_type.model_id  where location_id=? order by car_model");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
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
		
		function carImages($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$car_id= $this -> encrypt_decrypt('decrypt',$data['car_id']); 
			$stmt = $dbCon->prepare("select * from car_images where car_id=?");
			$stmt->bind_param("i",$car_id);
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
		
		
		function checkRegistrationNumber($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$car_id= $this -> encrypt_decrypt('decrypt',$data['car_id']); 
			$stmt = $dbCon->prepare("select count(id) as num from car_rental_available_car where id!=? and car_registration_number=?");
			$stmt->bind_param("is",$car_id,$_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
			
			
		}
		
		
		function vehicleTypeSelectedCarDetail($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$car_id= $this -> encrypt_decrypt('decrypt',$data['car_id']); 
			$stmt = $dbCon->prepare("select * from car_rental_available_car where id=?");
			$stmt->bind_param("i",$car_id);
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
		
		function openingHoursDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);  
			$location_id= $this -> encrypt_decrypt('decrypt',$data['location_id']); 
			$stmt = $dbCon->prepare("select * from car_rental_opening_hours where location_id=?");
			$stmt->bind_param("i",$location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$stmt = $dbCon->prepare("insert into car_rental_opening_hours (company_id, location_id) values (?,?)");
				$stmt->bind_param("ii",$company_id,$location_id);
				$stmt->execute(); 
				$stmt = $dbCon->prepare("select * from car_rental_opening_hours where location_id=?");
				$stmt->bind_param("i",$location_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
			}
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		
		function bookingRulesDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);  
			$location_id= $this -> encrypt_decrypt('decrypt',$data['location_id']); 
			$stmt = $dbCon->prepare("select * from car_rental_booking_rules where location_id=?");
			$stmt->bind_param("i",$location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$stmt = $dbCon->prepare("insert into car_rental_booking_rules (company_id, location_id) values (?,?)");
				$stmt->bind_param("ii",$company_id,$location_id);
				$stmt->execute(); 
				$stmt = $dbCon->prepare("select * from car_rental_booking_rules where location_id=?");
				$stmt->bind_param("i",$location_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
			}
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function updateCarDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['location_id']);
			$car_id= $this -> encrypt_decrypt('decrypt',$data['car_id']);
			 
			$stmt = $dbCon->prepare("update  car_rental_available_car set is_available=?,is_updated=1,car_color=?,fuel_type=?,transmission_type=?,car_price=?,car_manufecturing_year=?,car_registration_number=?,`home_delivery`=?,`home_delivery_fee`=?,`pick_up_delivery`=?,`pick_up_delivery_fee`=?,`airport_pickup`=?,`airport_pickup_fee`=?,`airport_dropoff`=?,`airport_dropoff_fee`=?, `deposit_applicable`=?,`deposit_fee`=?, `gps_available`=?,`gps_fee`=?,`child_seat`=?,`child_seat_fee`=?,`additional_driver`=?,`additional_driver_fee`=?  where id=?");
			$stmt->bind_param("iiiiiisiiiiiiiiiiiiiiiii",$_POST['is_available'],$_POST['car_color'],$_POST['fuel_type'],$_POST['transmission_type'],$_POST['car_rental_price'],$_POST['car_manufecturing_year'],$_POST['car_registration_number'],$_POST['food1'],$_POST['feeDetail1'],$_POST['food2'],$_POST['feeDetail2'],$_POST['food3'],$_POST['feeDetail3'],$_POST['food4'],$_POST['feeDetail4'],$_POST['food5'],$_POST['feeDetail5'],$_POST['food6'],$_POST['feeDetail6'],$_POST['food7'],$_POST['feeDetail7'],$_POST['food8'],$_POST['feeDetail8'],$car_id);
			
			 
			 
			if($stmt->execute())
			{
				for($i=1; $i<=$_POST['indexing_save']; $i++)
				{
					$j='image_data'.$i;
					$data1 = strip_tags($_POST[$j]);
					 
					define('UPLOAD_DIR','../estorecss/'); 
					$img_name1="new".microtime();
					file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
					$stmt = $dbCon->prepare("insert into car_images (car_id, image_path) values (?,?)");
					$stmt->bind_param("is",$car_id,$img_name1);
					 $stmt->execute(); 
				} 
				  
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
		
		
		function carColors()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from car_rental_colors");
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
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
		function vehicleTypeCarList($data)
		{
			$dbCon = AppModel::createConnection();
			$vtype_id= $this -> encrypt_decrypt('decrypt',$data['vtype_id']);
			$stmt = $dbCon->prepare("select car_rental_available_car.id,car_model,model_series,car_price,is_available from car_rental_available_car left join  car_rental_available_car_type on car_rental_available_car_type.id=car_rental_available_car.car_type_id left join car_rental_model on car_rental_model.id=car_rental_available_car_type.brand_type left join car_rental_model_series on car_rental_model_series.id=car_rental_available_car_type.model_id  where car_type_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $vtype_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
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
		
		
		
		function bookingList($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['location_id']); 
			 
			$date=strtotime(date('Y-m-d'));
			$stmt = $dbCon->prepare("select car_registration_number,first_name,last_name,car_rental_booking_information.id,car_model,model_series,car_price,is_available from car_rental_booking_information left join car_rental_available_car on car_rental_available_car.id=car_rental_booking_information.car_id left join  car_rental_available_car_type on car_rental_available_car_type.id=car_rental_available_car.car_type_id left join car_rental_model on car_rental_model.id=car_rental_available_car_type.brand_type left join car_rental_model_series on car_rental_model_series.id=car_rental_available_car_type.model_id left join user_logins on user_logins.id=car_rental_booking_information.user_id  where car_rental_booking_information.location_id=? and checkin_date>=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $location_id,$date);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
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
		
		
		function addCarInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['location_id']); 
			
			$stmt = $dbCon->prepare("select id,total_cars from car_rental_available_car_type where model_id=? and location_id=? and car_body_type=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $_POST['car_model_trim'],$location_id,$_POST['car_body_type']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$total_cars=$_POST['total_cars'];
				$stmt = $dbCon->prepare("insert into car_rental_available_car_type(car_body_type,price_detail,brand_type,model_id,total_cars,location_id,created_on) values (?,?,?,?,?,?,now())");
			
				/* bind parameters for markers */
				$stmt->bind_param("iiiiii",$_POST['car_body_type'],$_POST['car_rental_price'], $_POST['car_brand'],$_POST['car_model_trim'],$total_cars,$location_id);
				$stmt->execute();
				$id=$stmt->insert_id;
			}
			else
			{
				$id=$row['id'];
				$total_cars=$_POST['total_cars']+$row['total_cars'];
				$stmt = $dbCon->prepare("update car_rental_available_car_type set total_cars=? where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("ii", $total_cars,$id);
				$stmt->execute();
			
			}
			
			for($i=1;$i<=$_POST['total_cars'];$i++)
			{
			$stmt = $dbCon->prepare("insert into car_rental_available_car(car_type_id,car_price) values (?,?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $id,$_POST['car_rental_price']);
			$stmt->execute();
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function carModelList()
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select distinct model_id,model from car_rental_model_series where brand_id=? order by model");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['car_type']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0">Select</option>';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<option value="'.$row['model_id'].'">'.$row['model'].'</option>';
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function carModelYearList()
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select distinct model_series_launch_date from car_rental_model_series where model_id=? order by model_series_launch_date");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['model_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0">Select</option>';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<option value="'.$row['model_series_launch_date'].'">'.$row['model_series_launch_date'].'</option>';
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function carModelBodyList()
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select distinct body_type from car_rental_model_series where model_id=? and model_series_launch_date=? order by body_type");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['model_id'],$_POST['year']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0">Select</option>';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<option value="'.$row['body_type'].'">'.$row['body_type'].'</option>';
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function carModelGenerationList()
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select distinct generation from car_rental_model_series where model_id=? and model_series_launch_date=? and body_type=? order by generation");
			
			/* bind parameters for markers */
			$stmt->bind_param("iis", $_POST['model_id'],$_POST['year'],$_POST['body_type']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0">Select</option>';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<option value="'.$row['generation'].'">'.$row['generation'].'</option>';
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function carModelTrimList()
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select id,available_range from car_rental_model_series where model_id=? and model_series_launch_date=? and body_type=? and generation=? order by generation");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiss", $_POST['model_id'],$_POST['year'],$_POST['body_type'],$_POST['generation']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0">Select</option>';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<option value="'.$row['id'].'">'.$row['available_range'].'</option>';
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
		 
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=56");
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
			
			return $this -> encrypt_decrypt('encrypt',56);
		}
	 
	}	