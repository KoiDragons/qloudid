<?php
require_once('../AppModel.php');
class SoligahemAppModel extends AppModel
{  
			


		function updateReservePurchaseInfo($data)
			{
				 
				$dbCon = AppModel::createConnection();
				$stmt = $dbCon->prepare("select id  from user_identification where user_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("i", $_POST['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowID = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("select phone_number,country_of_residence from user_profiles left join user_logins on user_logins.id=user_profiles.user_logins_id where user_profiles.user_logins_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("i", $_POST['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowPhone = $result->fetch_assoc();
				
				$date=date('Y-m-d');
				$stmt = $dbCon->prepare("update soligahem_property_reservation set user_id=?,is_reserved=1,card_id=?,address_id=?,identificator_id=?,country_id=?,phone_number=?,company_id=? where ip_address=? and created_on=? and is_reserved=0");
				$stmt->bind_param("iiiiisiss", $_POST['user_id'],$_POST['card_id'],$_POST['delivery_address_id'],$rowID['id'],$rowPhone['country_of_residence'],$rowPhone['phone_number'],$_POST['company_id'],$_POST['ip'],$date);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;
				
				 
			}
			
			
			function updateWheel()
			{
				 
				$dbCon = AppModel::createConnection();
				$date=date('Y-m-d');
				$stmt = $dbCon->prepare("update soligahem_property_reservation set wheel_chair_accesible=? where ip_address=? and created_on=? and is_reserved=0");
				$stmt->bind_param("iss", $_POST['update_info'],$_POST['ip'],$date);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;
				
				 
			}
			
			
			
			
			
			function updateRent()
			{
				 
				$dbCon = AppModel::createConnection();
				$date=date('Y-m-d');
				$stmt = $dbCon->prepare("update soligahem_property_reservation set rent_out=? where ip_address=? and created_on=? and is_reserved=0");
				$stmt->bind_param("iss", $_POST['update_info'],$_POST['ip'],$date);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;
				
				 
			}
			
			function updateFinance()
			{
				 
				$dbCon = AppModel::createConnection();
				 
				$date=date('Y-m-d');
				$stmt = $dbCon->prepare("update soligahem_property_reservation set finance_secure=? where ip_address=? and created_on=? and is_reserved=0");
				$stmt->bind_param("iss", $_POST['update_info'],$_POST['ip'],$date);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;
				
				 
			}
			
			
			function getFinanceInfo()
			{
				 
				$dbCon = AppModel::createConnection();
				$date=date('Y-m-d');
				$stmt = $dbCon->prepare("select * from soligahem_property_reservation where ip_address=? and created_on=? and is_reserved=0");
				$stmt->bind_param("ss", $_POST['ip'],$date);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$stmt->close();
				$dbCon->close();
				return $row;
				
				 
			}
			
			
			 function getIp()
			{
		
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			
			return $ip;  
	}
	
		function sendLandloardProposal()
		{
			$dbCon = AppModel::createConnection();
			
			$date=date('Y-m-d');
			 
			$stmt = $dbCon->prepare("insert into soligahem_property_proposal (country_id, phone_number, created_on) values (?, ?, ?)"); 
			$stmt->bind_param("ssi",$_POST['pcountry'],$_POST['pnumber'],$date); 
			$stmt->execute(); 
			$id=$stmt->insert_id;
			
			$stmt = $dbCon->prepare("update soligahem_property_reservation set is_reserved=1, proposal_id=? where ip_address=? and created_on=?"); 
			$stmt->bind_param("iss",$id,$_POST['ip'],$date); 
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select * from soligahem_property_reservation where ip_address=?");
			/* bind parameters for markers */
			 
			$stmt->bind_param("s",$_POST['ip']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_country = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("select country_code from phone_country_code where id=?");
			/* bind parameters for markers */
			 
			$stmt->bind_param("i",$_POST['pcountry']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_country = $result->fetch_assoc();
			$url="https://qloudid.com/public/index.php/VitechProperties/proposerDetail/".$this->encrypt_decrypt('encrypt',$id);
			$surl=getShortUrl($url);
		 
			 
			$subject="Proposal received";
			$emailContent='Please check proposal go to web and open '.$surl;
			$to            = '+'.trim($row_country['country_code']).''.trim($_POST['pnumber']);
			$res=sendSms($subject, $to, $emailContent);
			$stmt->close();
			$dbCon->close();
			return $id;
			 
			}
		
			
		function reserveObject()
		{
			$dbCon = AppModel::createConnection();
			
			$id= $this -> encrypt_decrypt('decrypt',$_POST['property_id']);   
			$date=date('Y-m-d');
			
			$stmt = $dbCon->prepare("select count(id) as num from soligahem_property_reservation where property_id=? and ip_address=? and created_on=? and property_type=?");
			$stmt->bind_param("sssi", $id,$_POST['ip'],$date,$_POST['ptype']); 
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if($row['num']>0)
			{
			$stmt->close();
			$dbCon->close();
			return 2;
			}
			
			$stmt = $dbCon->prepare("select count(id) as num from soligahem_property_reservation where ip_address=? and created_on=? and property_type=?");
			$stmt->bind_param("ssi",$_POST['ip'],$date,$_POST['ptype']); 
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']>9)
			{
			$stmt->close();
			$dbCon->close();
			return 3;
			}
			 
			$stmt = $dbCon->prepare("insert into soligahem_property_reservation (property_id, ip_address, created_on,property_type) values (?, ?, ?,?)"); 
			$stmt->bind_param("sssi", $id,$_POST['ip'],$date,$_POST['ptype']); 
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			 
			}
		
		
		
			
		
		
		function reservedLandloardPropertyList()
			{
				$dbCon = AppModel::createConnection();
		 
				$stmt = $dbCon->prepare("select selling_heading,long_selling_description,floor_number,pool_available,pool_area,terrace_available,terrace_area,balcony_available,balcony_area,office_apartment_number,landloard_building_port_floors_offices.id,short_selling_description,apartment_size,sale_price,bathroom_count,bedroom_count,orientation from landloard_building_port_floors_offices left join landloard_apartment_description on landloard_apartment_description.apartment_id=landloard_building_port_floors_offices.id left join landloard_apartment_exterior on landloard_apartment_exterior.apartment_id=landloard_building_port_floors_offices.id left join landloard_building_port_floors on landloard_building_port_floors.id=landloard_building_port_floors_offices.floor_id where find_in_set(landloard_building_port_floors_offices.id,?) and is_published=1");
						/* bind parameters for markers */
				$stmt->bind_param("s", $_POST['ids']);
				$stmt->execute();
				$resultApartmentDetail = $stmt->get_result();
				$org=array();
				while($rowApartmentDetails = $resultApartmentDetail->fetch_assoc())
				{
					
				$stmt = $dbCon->prepare("select * from landloard_object_photos where object_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("i", $rowApartmentDetails['id']);
				$stmt->execute();
				$resultApartment = $stmt->get_result();
				$rowPic = $resultApartment->fetch_assoc();
				$rowApartmentDetails['imageId']=$rowPic['apartment_photo_path'];
							
				$rowApartmentDetails['enc']=$this->encrypt_decrypt('encrypt',$rowApartmentDetails['id']);
				array_push($org,$rowApartmentDetails);
				 
				}
					
				$stmt->close();
				$dbCon->close();
				return $org;
			}
		
		
		
		
		
		function reservedPropertyList()
		{
			$dbCon = AppModel::createConnection();
			  
			$date=date('Y-m-d');
			$stmt = $dbCon->prepare("select vitech_property_description.company_id,vitech_city_id as city,vitech_region_id as region,vitech_area_id as area,startingPrice,propertyType,pool,terrace,numberOfBathrooms,numberOfBedrooms,vitech_property_plot.area,imageId,shortSellingDescription,longSellingDescription,sellPhrase,generally,sellingHeading from vitech_property_description left join vitech_properties on vitech_properties.id=vitech_property_description.property_id and vitech_properties.company_id=vitech_property_description.company_id left join vitech_property_interior on vitech_property_interior.property_id=vitech_property_description.property_id and vitech_property_interior.company_id=vitech_property_description.company_id  left join vitech_property_plot on vitech_property_plot.property_id=vitech_property_description.property_id and vitech_property_plot.company_id=vitech_property_description.company_id left join vitech_property_exterior on vitech_property_exterior.property_id=vitech_property_description.property_id and vitech_property_exterior.company_id=vitech_property_description.company_id left join vitech_property_address on vitech_property_address.property_id=vitech_property_description.property_id and vitech_property_address.company_id=vitech_property_description.company_id   where find_in_set(vitech_property_description.property_id,?) and vitech_property_description.company_id=601848");
			$stmt->bind_param("s",$_POST['ids']); 
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array(); 
			while($row = $result->fetch_assoc())
			{
					
				 
						$imgs ='../estorecss/tmp'.$row['imageId'].'.jpg'; 
						if (file_exists($imgs)) {
						$imgs=str_replace('../','https://www.qloudid.com/',$imgs);
						}
						else
						{
						$URL = "https://connect.maklare.vitec.net/Image/GetImage?customerId=M19213&imageId=".$row['imageId'];

						$ch = curl_init();
						 
						curl_setopt($ch, CURLOPT_USERNAME, "569");
						curl_setopt($ch, CURLOPT_PASSWORD, "Lg9uDAxjbSfVGJHFxaX7xCi52BtBb2jAAakorxtrKBLmFPBq2rm8k6B8v3r2El8Z");
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
						curl_setopt($ch, CURLOPT_URL, $URL);
						$resultData = curl_exec($ch);
						curl_close($ch);
						 $dataImage='data:text/x-base64;base64,'.base64_encode($resultData);
						 $imgs = $this->base64_to_jpeg( $dataImage, '../estorecss/tmp'.$row['imageId'].'.jpg' );
						}
						 
						array_push($org,$row);
			
			}
			  
			 $stmt->close();
			$dbCon->close();
			return $org;
			}
			function getLandloardPropertyListFilter()
			{
				$dbCon = AppModel::createConnection();
				 
				$data=$_POST;
				$data['startingPrice']='';
				$data['bedLow']='';
				$data['bedHigh']='';
				$data['bathLow']='';
				$data['bathHigh']='';
				$data['orientation']='';
				$data=array_filter($data);
				$_POST['orientation']=substr($_POST['orientation'],0,-1);
				if($_POST['orientation']==0)
				{
					$_POST['orientation']='1,2,3,4';
				}
				
				 
				
				$stmt = $dbCon->prepare("select * from landloard_buildings where id in(select buildingid from landloard_building_ports where id in(select port_id from landloard_building_port_floors where id in((select floor_id from landloard_building_port_floors_offices where is_office=0 and is_published=1  and bedroom_count between ? and ? and bathroom_count between ? and ? and sale_price<=? and find_in_set(orientation,?))))");
				/* bind parameters for markers */
				$stmt->bind_param("iiiiis", $_POST['bedLow'],$_POST['bedHigh'],$_POST['bathLow'],$_POST['bathHigh'],$_POST['startingPrice'],$_POST['orientation']);
				$stmt->execute();
				$result = $stmt->get_result();
				$org=array();
				while($row = $result->fetch_assoc())
				{
					$stmt = $dbCon->prepare("select * from landloard_building_photos where building_id=? and sorting_number=1");
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['id']);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$rowPic = $resultApartment->fetch_assoc();
					$row['imageId']=$rowPic['building_photo_path'];
					 
					$stmt = $dbCon->prepare("select apartment_size,sale_price,bathroom_count,bedroom_count,orientation from landloard_building_port_floors_offices where floor_id in(select id from landloard_building_port_floors where port_id in(select id from landloard_building_ports where buildingid=?)) and is_published=1 and bedroom_count between ? and ? and bathroom_count between ? and ? and sale_price<=? and find_in_set(orientation,?) group by bedroom_count");
					/* bind parameters for markers */
					$stmt->bind_param("iiiiiis", $row['id'], $_POST['bedLow'],$_POST['bedHigh'],$_POST['bathLow'],$_POST['bathHigh'],$_POST['startingPrice'],$_POST['orientation']);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$row['shortSellingDescription']='';
					while($rowApartment = $resultApartment->fetch_assoc())
					{
						 
						$row['region']=$rowApartment['vitech_region'];
						$row['city']=$rowApartment['vitech_city'];
						$row['area']=$rowApartment['vitech_area'];
						$row['size']=$rowApartment['apartment_size'];
						$row['numberOfBathrooms']=$rowApartment['bathroom_count'];
						$row['numberOfBedrooms']=$rowApartment['bedroom_count'];
						$row['orientation']=$rowApartment['orientation'];
						$row['startingPrice']=$rowApartment['sale_price'];
						$row['shortSellingDescription']=$row['shortSellingDescription'].' '.$rowApartment['numberOfBedrooms'].'1 bedrom ('.$rowApartment['apartment_size'].' m2) starting '.$rowApartment['sale_price'];
						 
							$val=1;
							foreach(array_keys($data) as $keyDetail)
							{
							if(strcmp($data[$keyDetail],html_entity_decode($row[$keyDetail]))!=0)
							{
							$val=0;
							break;
							}
							 
							}
							if($val==1)
							{
								array_push($org,$row);
							}
							
					}
				}	
				$stmt->close();
				$dbCon->close();
				return $org;
			}
		
		
		
		function getLandloardPropertyList()
			{
				$dbCon = AppModel::createConnection();
				$stmt = $dbCon->prepare("select * from landloard_buildings where id in(select buildingid from landloard_building_ports where id in(select port_id from landloard_building_port_floors where id in(select floor_id from landloard_building_port_floors_offices where is_office=0 and is_published=1)))");
				/* bind parameters for markers */
				//$stmt->bind_param("i", $_POST['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$org=array();
				while($row = $result->fetch_assoc())
				{
					
					 
					$stmt = $dbCon->prepare("select * from landloard_building_photos where building_id=? and sorting_number=1");
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['id']);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$rowPic = $resultApartment->fetch_assoc();
					$row['imageId']=$rowPic['building_photo_path'];
					$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
					$stmt = $dbCon->prepare("select apartment_size,sale_price,bathroom_count,bedroom_count,orientation from landloard_building_port_floors_offices where floor_id in(select id from landloard_building_port_floors where port_id in(select id from landloard_building_ports where buildingid=?)) and is_published=1 group by bedroom_count");
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['id']);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$row['shortSellingDescription']='';
					while($rowApartment = $resultApartment->fetch_assoc())
					{
						$row['size']=$rowApartment['apartment_size'];
						$row['numberOfBathrooms']=$rowApartment['bathroom_count'];
						$row['numberOfBedrooms']=$rowApartment['bedroom_count'];
						$row['orientation']=$rowApartment['orientation'];
						$row['startingPrice']=$rowApartment['sale_price'];
						$row['shortSellingDescription']=$row['shortSellingDescription'].' '.$rowApartment['numberOfBedrooms'].'1 bedrom ('.$rowApartment['apartment_size'].' m2) starting '.$rowApartment['sale_price'];
							
								array_push($org,$row);
							
					}
				}	
				$stmt->close();
				$dbCon->close();
				return $org;
			}
		
		function getLandloardBuildingImages()
			{
				$dbCon = AppModel::createConnection();
				//$_POST['bid']='T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09';
				$bid=$this->encrypt_decrypt('decrypt',$_POST['bid']);
				
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
		
		
		function getLandloardBuildingDetails()
			{
				$dbCon = AppModel::createConnection();
				//$_POST['bid']='T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09';
				$bid=$this->encrypt_decrypt('decrypt',$_POST['bid']);
				
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
		
		
		function getLandloardApartmentPropertyList()
			{
				$dbCon = AppModel::createConnection();
				$bid=$this->encrypt_decrypt('decrypt',$_POST['bid']);
				
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
		
		
		
		
		
		
		function getLandloardApartmentDetail()
			{
				$dbCon = AppModel::createConnection();
				
				$aid=$this->encrypt_decrypt('decrypt',$_POST['aid']);
				$stmt = $dbCon->prepare("select selling_heading,long_selling_description,floor_number,pool_available,pool_area,terrace_available,terrace_area,balcony_available,balcony_area,office_apartment_number,landloard_building_port_floors_offices.id,short_selling_description,apartment_size,sale_price,bathroom_count,bedroom_count,orientation from landloard_building_port_floors_offices left join landloard_apartment_description on landloard_apartment_description.apartment_id=landloard_building_port_floors_offices.id left join landloard_apartment_exterior on landloard_apartment_exterior.apartment_id=landloard_building_port_floors_offices.id left join landloard_building_port_floors on landloard_building_port_floors.id=landloard_building_port_floors_offices.floor_id where landloard_building_port_floors_offices.id=? and is_published=1");
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
		
		function getLandloardApartmentImageDetail()
			{
				$dbCon = AppModel::createConnection();
				$aid=$this->encrypt_decrypt('decrypt',$_POST['aid']);
				
				$org=array();
				$stmt = $dbCon->prepare("select apartment_photo_path as imageId from landloard_object_photos where object_id=? order by sorting_number");
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
		
		function getPropertyList()
		{
			$dbCon = AppModel::createConnection();
			$data=$_POST;
			$data=array_filter($data);
			  
			$stmt = $dbCon->prepare("select vitech_property_plot.area as size,startingPrice,numberOfBathrooms,numberOfBedrooms,vitech_properties.company_id,vitech_city_id as city,vitech_region_id as region,vitech_area_id as area, id,imageId,shortSellingDescription,longSellingDescription,sellPhrase,generally,sellingHeading from vitech_property_description left join vitech_properties on vitech_properties.id=vitech_property_description.property_id and vitech_properties.company_id=vitech_property_description.company_id left join vitech_property_interior on vitech_property_interior.property_id=vitech_property_description.property_id and vitech_property_interior.company_id=vitech_property_description.company_id  left join vitech_property_address on vitech_property_address.property_id=vitech_property_description.property_id and vitech_property_address.company_id=vitech_property_description.company_id left join vitech_property_plot on vitech_property_plot.property_id=vitech_property_description.property_id and vitech_property_plot.company_id=vitech_property_description.company_id where is_activated=1 and vitech_property_description.company_id=601848 and startingPrice>0 and vitech_area_id=?");
			$stmt->bind_param("i", $data['area']);
			 
			 
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
						$val=1;
						/*$URL = "https://connect.maklare.vitec.net/Image/GetImage?customerId=M19213&imageId=".$row['imageId'];

						$ch = curl_init();
						 
						curl_setopt($ch, CURLOPT_USERNAME, "569");
						curl_setopt($ch, CURLOPT_PASSWORD, "Lg9uDAxjbSfVGJHFxaX7xCi52BtBb2jAAakorxtrKBLmFPBq2rm8k6B8v3r2El8Z");
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
						curl_setopt($ch, CURLOPT_URL, $URL);
						 

						$resultData = curl_exec($ch);
						curl_close($ch);
						 $dataImage='data:text/x-base64;base64,'.base64_encode($resultData);
						 $imgs = $this->base64_to_jpeg( $dataImage, '../estorecss/tmp'.$row['imageId'].'.jpg' ); 
						
						foreach(array_keys($data) as $keyDetail)
						{
						if(strcmp($data[$keyDetail],html_entity_decode($row[$keyDetail]))!=0)
						{
						$val=0;
						break;
						}
						 
						}
						if($val==1)*/
							$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
						array_push($org,$row);
			}
			
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			}
		
		
		
		
		
		
		function getPropertyListFilter()
		{
			$dbCon = AppModel::createConnection();
			$data=array();
			$data=$_POST;
			$data['startingPrice']='';
			$data['bedLow']='';
			$data['bedHigh']='';
			$data['bathLow']='';
			$data['bathHigh']='';
			$data=array_filter($data);
			  
			$stmt = $dbCon->prepare("select vitech_property_plot.area as size,vitech_city_id as city,vitech_region_id as region,vitech_area_id as area,startingPrice,propertyType,pool,terrace,numberOfBathrooms,numberOfBedrooms,id,imageId,shortSellingDescription,longSellingDescription,sellPhrase,generally,sellingHeading from vitech_property_description left join vitech_properties on vitech_properties.id=vitech_property_description.property_id and vitech_properties.company_id=vitech_property_description.company_id left join vitech_property_interior on vitech_property_interior.property_id=vitech_property_description.property_id and vitech_property_interior.company_id=vitech_property_description.company_id left join vitech_property_plot on vitech_property_plot.property_id=vitech_property_description.property_id and vitech_property_plot.company_id=vitech_property_description.company_id left join vitech_property_exterior on vitech_property_exterior.property_id=vitech_property_description.property_id and vitech_property_exterior.company_id=vitech_property_description.company_id left join vitech_property_address on vitech_property_address.property_id=vitech_property_description.property_id and vitech_property_address.company_id=vitech_property_description.company_id where numberOfBedrooms between ? and ? and numberOfBathrooms between ? and ? and startingPrice>=? and is_activated=1  and vitech_property_description.company_id=601848");
			$stmt->bind_param("iiiii", $_POST['bedLow'],$_POST['bedHigh'],$_POST['bathLow'],$_POST['bathHigh'],$_POST['startingPrice']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array(); 
			while($row = $result->fetch_assoc())
			{
					
				$val=1;
						$imgs ='../estorecss/tmp'.$row['imageId'].'.jpg'; 
						 
						$imgs=str_replace('../','https://www.qloudid.com/',$imgs);
					 
						 
						$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
						/*foreach(array_keys($data) as $keyDetail)
						{
						if(strcmp($data[$keyDetail],html_entity_decode($row[$keyDetail]))!=0)
						{
						$val=0;
						break;
						}
						 
						}
						if($val==1)*/
						array_push($org,$row);
			
			}
			  
			 $stmt->close();
			$dbCon->close();
			return $org;
			}
		
		
	function getPropertyDetailVitechNewInfo()
			{
				 
				
				$dbCon = AppModel::createConnection();
				 
					$property_id= $this -> encrypt_decrypt('decrypt',$_POST['property_id']);
					 
					$stmt = $dbCon->prepare("select sellPhrase,startingPrice,sellingHeading,shortSellingDescription,longSellingDescription,numberOfBedrooms,numberOfBathrooms,vitech_property_address.streetAddress,vitech_property_address.country,vitech_property_address.city,imageId,images_info from vitech_property_description left join vitech_property_address on vitech_property_address.property_id=vitech_property_description.property_id and vitech_property_address.company_id=vitech_property_description.company_id left join vitech_property_interior on vitech_property_interior.property_id=vitech_property_description.property_id and vitech_property_interior.company_id=vitech_property_description.company_id left join vitech_properties on vitech_properties.id=vitech_property_description.property_id and vitech_properties.company_id=vitech_property_description.company_id  where vitech_property_description.property_id=?");
				
					/* bind parameters for markers */
					$stmt->bind_param("s", $property_id);
					$stmt->execute();
					$result = $stmt->get_result();
					$row = $result->fetch_assoc();
					 
					$stmt = $dbCon->prepare("select * from vitech_property_photos where vitech_property_id=?");
				
					/* bind parameters for markers */
					$stmt->bind_param("s", $property_id);
					$stmt->execute();
					$resultImages = $stmt->get_result();
					$row['images_info']=array();
					$i=0;
					while($rowImages = $resultImages->fetch_assoc())
					{
						$filename="../estorecss/".$rowImages ['vitech_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowImages ['vitech_photo_path'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowImages ['vitech_photo_path'].'.jpg' ); $imgs=str_replace('../','',$imgs); $imgs='https://www.qloudid.com/'.$imgs; } else {
						$imgs=""; }
						
						$row['images_info'][$i]['image_path']=$imgs;
						$i++;
					}
					  
					$stmt->close();
					$dbCon->close();
					return $row;
				
			}
			
			
			function getPropertyListForSale()
		{
			$dbCon = AppModel::createConnection();
			$data=$_POST;
			$data=array_filter($data);
			   
			$stmt = $dbCon->prepare("select vitech_property_plot.area as size,startingPrice,numberOfBathrooms,numberOfBedrooms,vitech_properties.company_id,vitech_city_id as city,vitech_region_id as region,vitech_area_id as area, id,imageId,shortSellingDescription,longSellingDescription,sellPhrase,generally,sellingHeading from vitech_property_description left join vitech_properties on vitech_properties.id=vitech_property_description.property_id and vitech_properties.company_id=vitech_property_description.company_id left join vitech_property_interior on vitech_property_interior.property_id=vitech_property_description.property_id and vitech_property_interior.company_id=vitech_property_description.company_id  left join vitech_property_address on vitech_property_address.property_id=vitech_property_description.property_id and vitech_property_address.company_id=vitech_property_description.company_id left join vitech_property_plot on vitech_property_plot.property_id=vitech_property_description.property_id and vitech_property_plot.company_id=vitech_property_description.company_id where  property_status=2 and startingPrice>0 and vitech_area_id=? and vitech_old_data=0");
			
			$stmt->bind_param("i", $_POST['area']); 
			 
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
						$val=1;
					$stmt = $dbCon->prepare("select * from vitech_property_photos where vitech_property_id=? and sorting_number=1");
				
					/* bind parameters for markers */
					$stmt->bind_param("s", $row['id']);
					$stmt->execute();
					$resultImages = $stmt->get_result();
					 
					$rowImages = $resultImages->fetch_assoc();
						$filename="../estorecss/".$rowImages ['vitech_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowImages ['vitech_photo_path'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowImages ['vitech_photo_path'].'.jpg' ); $imgs=str_replace('../','',$imgs); $imgs='https://www.qloudid.com/'.$imgs; } else {
						$imgs=""; }
						
						$row['imageId']=$imgs;
						 
					 
						$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
						array_push($org,$row);
			}
			
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			}
		
		
		
		
		 function getPropertyDetailInfo()
			{
				
				
				$dbCon = AppModel::createConnection();
				 
				$property_id= $this -> encrypt_decrypt('decrypt',$_POST['property_id']);
					
					$stmt = $dbCon->prepare("select vitech_city_id,vitech_area_id,vitech_region_id,sellPhrase,startingPrice,sellingHeading,shortSellingDescription,longSellingDescription,numberOfBedrooms,numberOfBathrooms,vitech_property_address.streetAddress,vitech_property_address.country,vitech_property_address.city,imageId,images_info from vitech_property_description left join vitech_property_address on vitech_property_address.property_id=vitech_property_description.property_id and vitech_property_address.company_id=vitech_property_description.company_id left join vitech_property_interior on vitech_property_interior.property_id=vitech_property_description.property_id and vitech_property_interior.company_id=vitech_property_description.company_id left join vitech_properties on vitech_properties.id=vitech_property_description.property_id and vitech_properties.company_id=vitech_property_description.company_id  where vitech_property_description.property_id=? and vitech_property_description.company_id=601848");
				
					/* bind parameters for markers */
					$stmt->bind_param("s", $property_id);
					$stmt->execute();
					$result = $stmt->get_result();
					$row = $result->fetch_assoc();
					$a=explode(',',$row['images_info']);
					 
					foreach($a as $key)
					{
						$imgs ='../estorecss/tmp'.$key.'.jpg'; 
						if (file_exists($imgs)) {
						$imgs=str_replace('../','https://www.qloudid.com/',$imgs);
						}
						else
						{
							
						$URL = "https://connect.maklare.vitec.net/Image/GetImage?customerId=M19213&imageId=".$key;

						$ch = curl_init();
						 
						curl_setopt($ch, CURLOPT_USERNAME, "569");
						curl_setopt($ch, CURLOPT_PASSWORD, "Lg9uDAxjbSfVGJHFxaX7xCi52BtBb2jAAakorxtrKBLmFPBq2rm8k6B8v3r2El8Z");
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
						curl_setopt($ch, CURLOPT_URL, $URL);
						 

						$resultData = curl_exec($ch);
						curl_close($ch);
						 $dataImage='data:text/x-base64;base64,'.base64_encode($resultData);
						 $imgs = $this->base64_to_jpeg( $dataImage, '../estorecss/tmp'.$key.'.jpg' ); 
						 $imgs=str_replace('../','https://www.qloudid.com/',$imgs);	
						}
						 				
					} 	 
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
			
			
	function fetchVitechCity()
    {
		
		
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from vitech_city  where region_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['region']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0">City</option>'; 
			while($row = $result->fetch_assoc())
			{
			if($_POST['city']==$row['id'])
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
	
	function fetchVitechArea()
    {
		
		
			$dbCon = AppModel::createConnection();
        
			$stmt = $dbCon->prepare("select * from vitech_area  where region_city_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['city']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0">Area</option>'; 
			while($row = $result->fetch_assoc())
			{
			if($_POST['area']==$row['id'])
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
	
}