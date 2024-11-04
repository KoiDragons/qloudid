<?php
require_once('../AppModel.php');
class LandLoardPropertiesModel extends AppModel
{
	  function getLandloardApartmentDetail($data)
			{
				$dbCon = AppModel::createConnection();
				
				$aid=$this->encrypt_decrypt('decrypt',$data['request_id']);
				$stmt = $dbCon->prepare("select selling_heading,long_selling_description,floor_number,pool_available,pool_area,terrace_available,terrace_area,balcony_available,balcony_area,office_apartment_number,landloard_building_port_floors_offices.id,short_selling_description,apartment_size,sale_price,bathroom_count,bedroom_count,orientation from landloard_building_port_floors_offices left join landloard_apartment_description on landloard_apartment_description.apartment_id=landloard_building_port_floors_offices.id left join landloard_apartment_exterior on landloard_apartment_exterior.apartment_id=landloard_building_port_floors_offices.id left join landloard_building_port_floors on landloard_building_port_floors.id=landloard_building_port_floors_offices.floor_id where landloard_building_port_floors_offices.id=(select  property_id from soligahem_property_reservation where id=?) and is_published=1");
						/* bind parameters for markers */
				$stmt->bind_param("i", $aid);
				$stmt->execute();
				$resultApartmentDetail = $stmt->get_result();
				$rowApartmentDetails = $resultApartmentDetail->fetch_assoc();
				
				 
				$stmt = $dbCon->prepare("select * from landloard_object_photos where object_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("i", $rowApartmentDetails['id']);
				$stmt->execute();
				$resultApartment = $stmt->get_result();
				$rowPic = $resultApartment->fetch_assoc();
				$rowApartmentDetails['imageId']=$rowPic['apartment_photo_path'];
							
				$rowApartmentDetails['enc']=$this->encrypt_decrypt('encrypt',$rowApartmentDetails['id']);
				 
				$stmt->close();
				$dbCon->close();
				return $rowApartmentDetails;
			}
		
		function getLandloardApartmentImageDetail($data)
			{
				$dbCon = AppModel::createConnection();
				$aid=$this->encrypt_decrypt('decrypt',$data['request_id']);
				
				$org=array();
				$stmt = $dbCon->prepare("select apartment_photo_path as imageId from landloard_object_photos where object_id=(select  property_id from soligahem_property_reservation where id=?) order by sorting_number");
				/* bind parameters for markers */
				$stmt->bind_param("i", $aid);
				$stmt->execute();
				$resultApartment = $stmt->get_result();
				while($rowPic = $resultApartment->fetch_assoc())
				{
					array_push($org,$rowPic);
				}
				$stmt->close();
				$dbCon->close();
				return $org;
			}
		
		
		function getLandloardBuildingDetails($data)
			{
				$dbCon = AppModel::createConnection();
				 
				$bid=$this->encrypt_decrypt('decrypt',$data['request_id']);
				
					$stmt = $dbCon->prepare("select * from landloard_buildings where id=(select buildingid from landloard_building_ports where id=(select port_id from landloard_building_port_floors where id=(select floor_id from landloard_building_port_floors_offices where id=(select  property_id from soligahem_property_reservation where id=?))))");
					/* bind parameters for markers */
					$stmt->bind_param("i", $bid);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$row = $resultApartment->fetch_assoc();
					
					 $stmt = $dbCon->prepare("select company_name from companies where id=?");
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['company_id']);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$rowCompany = $resultApartment->fetch_assoc();
					$row['company_name']=$rowCompany['company_name'];
				$stmt->close();
				$dbCon->close();
				return $row;
			}
			 
	 
		function displayProposalProperties($data)
		{
			$dbCon = AppModel::createConnection();
			$proposal_id= $this -> encrypt_decrypt('decrypt',$data['proposal_id']);
			
			
			$stmt = $dbCon->prepare("select  * from soligahem_property_reservation where proposal_id=?");
				$stmt->bind_param("i", $proposal_id);
				$stmt->execute();
				$result5 = $stmt->get_result();
				$org=array();
				while($row5 = $result5->fetch_assoc())
				{
					  
				$stmt = $dbCon->prepare("select selling_heading,long_selling_description,floor_number,pool_available,pool_area,terrace_available,terrace_area,balcony_available,balcony_area,office_apartment_number,landloard_building_port_floors_offices.id,short_selling_description,apartment_size,sale_price,bathroom_count,bedroom_count,orientation from landloard_building_port_floors_offices left join landloard_apartment_description on landloard_apartment_description.apartment_id=landloard_building_port_floors_offices.id left join landloard_apartment_exterior on landloard_apartment_exterior.apartment_id=landloard_building_port_floors_offices.id left join landloard_building_port_floors on landloard_building_port_floors.id=landloard_building_port_floors_offices.floor_id where landloard_building_port_floors_offices.id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row5['property_id']);
				$stmt->execute();
				$result = $stmt->get_result();
			   
				$row = $result->fetch_assoc();
				 
				$row['property_id']= $this -> encrypt_decrypt('encrypt',$row5['id']);
				$stmt = $dbCon->prepare("select * from landloard_buildings where id=(select buildingid from landloard_building_ports where id=(select port_id from landloard_building_port_floors where id=(select floor_id from landloard_building_port_floors_offices where id=?)))");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row5['property_id']);
				$stmt->execute();
				$resultBuilding = $stmt->get_result();
			   
				$rowBuilding = $resultBuilding->fetch_assoc();
				$row['building_name']=$rowBuilding['building_name'];
				
				$stmt = $dbCon->prepare("select * from landloard_object_photos where object_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("i", $row5['property_id']);
				$stmt->execute();
				$resultApartment = $stmt->get_result();
				$rowPic = $resultApartment->fetch_assoc();
				$row['imageId']=$rowPic['apartment_photo_path'];
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
			
	
	 
	
	 
		
		 
 
}