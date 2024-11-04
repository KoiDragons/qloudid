<?php
	require_once('../AppModel.php');
	class DofpExchangeModel extends AppModel
	{
		function urlDetail($data)
		{
			 
			return $this -> encrypt_decrypt('encrypt',$data['REQUEST_URI']); 
			 
			 
		}
		
		function appId()
		{
			
			return $this -> encrypt_decrypt('encrypt',60);
		}
		
		 function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		 
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=60");
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
		function base64_to_jpeg($base64_string, $output_file) {
				
				$ifp = fopen( $output_file, 'wb' ); 
				
				
				$data = explode( ',', $base64_string );
				
				fwrite( $ifp, base64_decode( $data[1] ) );
				
				
				fclose( $ifp ); 
				
				return $output_file; 
		}
		
		
		function buildingList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from landloard_buildings where company_id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			}
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		 
		 
		function apartmentList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select listed_on_exchange,floor_number,terrace_available,terrace_area,balcony_available,balcony_area,office_apartment_number,landloard_building_port_floors_offices.id,short_selling_description,apartment_size,sale_price,bathroom_count,bedroom_count,orientation from landloard_building_port_floors_offices left join landloard_apartment_description on landloard_apartment_description.apartment_id=landloard_building_port_floors_offices.id left join landloard_apartment_exterior on landloard_apartment_exterior.apartment_id=landloard_building_port_floors_offices.id left join landloard_building_port_floors on landloard_building_port_floors.id=landloard_building_port_floors_offices.floor_id where floor_id in(select id from landloard_building_port_floors where port_id in(select id from landloard_building_ports where buildingid in (select id from landloard_buildings where company_id=?))) and is_published=1");
			 
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				
				$stmt = $dbCon->prepare("select count(id) as num from landloard_apartment_reservation_information where apartment_id=? and is_reserved=1");
							/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$resultApartment = $stmt->get_result();
				$rowtApartment = $resultApartment->fetch_assoc();
				 	
				if($rowtApartment['num']>0)
				{
				continue;
				}
				$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			}
			
			 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function removeFromExchangeList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$apartment_id= $this -> encrypt_decrypt('decrypt',$data['apartment_id']);
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set listed_on_exchange=0 where id=?");
			$stmt->bind_param("i", $apartment_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function addToExchangeList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$apartment_id= $this -> encrypt_decrypt('decrypt',$data['apartment_id']);
			$stmt = $dbCon->prepare("update landloard_building_port_floors_offices set listed_on_exchange=1 where id=?");
			$stmt->bind_param("i", $apartment_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
	}
