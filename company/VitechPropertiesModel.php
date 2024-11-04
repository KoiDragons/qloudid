<?php
require_once('../AppModel.php');
class VitechPropertiesModel extends AppModel
{
	function urlDetail($data)
		{
			 
			return $this -> encrypt_decrypt('encrypt',$data['REQUEST_URI']); 
			 
			 
		}
		
		function decryptCompany($data)
		{
			 
			return $this -> encrypt_decrypt('decrypt',$data['REQUEST_URI']); 
			 
			 
		}
		
		
		function appId($data)
		{
			
			return $this -> encrypt_decrypt('encrypt',$data['fapp_id']);
		}
		
		function appId1()
		{
			
			return $this -> encrypt_decrypt('encrypt',59);
		}
		
		function brokerRequestApprovedCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
            $stmt = $dbCon->prepare("select count(id) as num from `qloudid`.`landloard_broker_request` where sender_company_id=? and is_approved=1");
			$stmt->bind_param("i",$company_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			$row1 = $result1->fetch_assoc();
			if($row1['num']>0)
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
		
		
		function employeeSkillCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
            $stmt = $dbCon->prepare("select count(id) as num from invite_app_employee   where  company_id=?");
			$stmt->bind_param("i",$company_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			$row1 = $result1->fetch_assoc();
			if($row1['num']>0)
			{
			$stmt->close();
			$dbCon->close();
			
			return 1;
			}
			else
			{
			$stmt = $dbCon->prepare("select more_employee_available from companies   where id=?");
			$stmt->bind_param("i",$company_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();	
			 
			if($row1['more_employee_available']==0)
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
			 
			
		}
		
			
		function getContentDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
            $stmt   = $dbCon->prepare("select company_aboutus_content.id,heading,content,is_active,company_aboutus_id from company_aboutus_content left join company_aboutus_heading on company_aboutus_heading.id=company_aboutus_content.company_aboutus_id where company_id=?");
            $status = 1;
            /* bind parameters for markers */
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
		function contentDetailInsert($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
            $stmt   = $dbCon->prepare("select id from company_aboutus_heading");
            $status = 1;
            /* bind parameters for markers */
           // $stmt->bind_param("i", $dropbox_id);
            
            $stmt->execute();
			$result = $stmt->get_result();	
			while($row = $result->fetch_assoc())
			{
			$stmt   = $dbCon->prepare("select id from company_aboutus_content where company_id=? and company_aboutus_id=?");
            $status = 1;
             $stmt->bind_param("ii", $company_id,$row['id']);
            
            $stmt->execute();
			$result_data = $stmt->get_result();	
			$row_data = $result_data->fetch_assoc();
			
			if(empty($row_data))
			{
			$stmt   = $dbCon->prepare("insert into company_aboutus_content(company_id,company_aboutus_id,created_on) values(?, ?, now())");
            $status = 1;
             $stmt->bind_param("ii", $company_id,$row['id']);
            
            $stmt->execute();
			}
			
				
			}
			
			$stmt->close();
			$dbCon->close();
			
			return 1;
			
			
		}
		function updateVisual()
    {
        $dbCon = AppModel::createConnection();
			$stmt   = $dbCon->prepare("select is_active from company_aboutus_content   where id=?");
            $status = 1;
            /* bind parameters for markers */
            $stmt->bind_param("i", $_POST['id']);
            
            $stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['is_active']==1)
			{
				$is_active=0;
			}
			else
			{
				$is_active=1;
			}
        $stmt = $dbCon->prepare("update company_aboutus_content set is_active=? where id=?");
         
        /* bind parameters for markers */
		$stmt->bind_param("ii",$is_active,$_POST['id']);
        $stmt->execute();
        
		 $stmt->close();
        $dbCon->close();
		 return 1;
        
        
    }
	function updateContent($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("update company_aboutus_content set content=? where id=?");
			
			$id='a'.$data['id'];
			$_POST[$id]=htmlentities($_POST[$id],ENT_NOQUOTES, 'ISO-8859-1');
			/* bind parameters for markers */
			$stmt->bind_param("si", $_POST[$id],$data['id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}	
			
		function contentDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
            $stmt   = $dbCon->prepare("select company_aboutus_content.id,heading,content,is_active,company_aboutus_id from company_aboutus_content left join company_aboutus_heading on company_aboutus_heading.id=company_aboutus_content.company_aboutus_id where company_id=?");
            $status = 1;
            /* bind parameters for markers */
            $stmt->bind_param("i", $company_id);
            
            $stmt->execute();
			$result = $stmt->get_result();	
			$org=1;
			while($row = $result->fetch_assoc())
			{
				
				if($row['content']=='' || $row['content']==null)
				{
					$org=0;
					break;
				}
			}
			 
			$stmt->close();
			$dbCon->close();
			
			return $org;
			
			
		}
		
		
		
		
	function refineVitechAdddress($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$imported_id= $this -> encrypt_decrypt('decrypt',$data['ip_id']);
			$property_status=$data['property_status'];
			$_POST['addrs']=htmlentities($_POST['addrs'],ENT_NOQUOTES, 'ISO-8859-1');	 
			$_POST['sell_phrase']=htmlentities($_POST['sell_phrase'],ENT_NOQUOTES, 'ISO-8859-1');
			$_POST['dcity']=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
			$_POST['detailed_description']=htmlentities($_POST['detailed_description'],ENT_NOQUOTES, 'ISO-8859-1');			
			
			$data['user_id1']=0;	
			
			$stmt = $dbCon->prepare("select id from vitech_properties where streetAddress=? and areaName=? and apartment_number=?");
			$stmt->bind_param("sss", $_POST['addrs'], $row['pnumber'], $_POST['apartment_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row2 = $result->fetch_assoc();
			
			if(empty($row2))
			{
			$stmt = $dbCon->prepare("select count(id) as num from vitech_properties where company_id=?");
			$stmt->bind_param("i",$company_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result(); 
			    
			$row = $result->fetch_assoc();
			$objectNumber='NS00'.($row['num']+1);
			$stmt = $dbCon->prepare("INSERT INTO `vitech_properties`(apartment_number,category_id,category_service_id,type_of_contract,responsible_for_sold,responsible_for_sell,responsible_for_rent,responsible_for_manage,added_user_id,objectNumber,`livingSpace`  , `rooms` , `areaName`  , `streetAddress`  , `shortSaleDescription` ,  `company_id`,owner_email,owner_country_phone,owner_phone,property_status) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)")  ;
			 
			$stmt->bind_param("siiiiiiiisdisssisisi",$_POST['apartment_number'],$_POST['category_id'],$_POST['subcategory_id'],$_POST['contract_type'],$data['user_id'],$data['user_id'],$data['user_id'],$data['user_id'],$data['user_id'],$objectNumber, $_POST['total_area'],$_POST['rooms_count'],$_POST['pnumber'],$_POST['addrs'],$_POST['sell_phrase'],$company_id,$_POST['owner_email'],$_POST['country_id'],$_POST['uphno'],$property_status);
            $stmt->execute();	
			$id=$stmt->insert_id;
			$data['id']= $this -> encrypt_decrypt('encrypt',$id);
			$stmt = $dbCon->prepare("update `vitech_properties` set id=? where company_property_id=?")  ;
			$stmt->bind_param("si", $id,$id);
            $stmt->execute();
			
			
			$stmt = $dbCon->prepare("update `vitech_properties` set  `property_view` =?,`property_condition`=?,`property_availability` =?,`building_class`=?,`property_furnishings` =?,`annual_community_fee` =?,`short_term_rental` =?,`short_term_commision_fee` =?,`long_term_rental` =?,`long_term_commision_fee` =?,`detailed_description`=? where id=?")  ;
			$stmt->bind_param("sssssiiiiisi",$_POST['property_view'],$_POST['property_condition'],$_POST['property_availability'],$_POST['building_class'],$_POST['property_furnishings'],$_POST['annual_community_fee'],$_POST['short_term_rental'],$_POST['short_term_commision_fee'],$_POST['long_term_rental'],$_POST['long_term_commision_fee'],$_POST['detailed_description'],$id);
            $stmt->execute();
			
			/*$stmt = $dbCon->prepare("update `vitech_properties` set owner_sell_price=?,currency_type=? where id=?")  ;
			$stmt->bind_param("iii", $_POST['sell_price'],$_POST['currency_type'],$id);
            $stmt->execute();
			if($property_status==1)
			{
			$stmt = $dbCon->prepare("update `vitech_properties` set owner_sell_price=?,owner_sell_date=? where id=?")  ;
			$stmt->bind_param("isi", $_POST['sell_price'],$_POST['sold_on'],$id);
            $stmt->execute();
			}*/
			$sdate=strtotime($_POST['start_date']);
			$edate=strtotime($_POST['end_date']);
			
		 
			
			
			$stmt = $dbCon->prepare("insert into vitech_property_broker_request (responsible_for_property,contract_start_date,contract_end_date, `owner_id`  , `property_id`  , `company_id`  , `broker_id`  , `category_id`  , `service_id`  , `request_type`  ,contract_type_info, `created_on` ) values(?,?,?,?, ?, ?,?, ?, ?, ?,?, now())");
			$stmt->bind_param("issisiiiiii",$data['user_id'],$sdate,$edate,$data['user_id1'],$id,$company_id,$data['user_id'],$_POST['category_id'],$_POST['subcategory_id'],$_POST['property_status'],$_POST['contract_type']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_description`( `property_id` , `sellPhrase` , `generally` , `sellingHeading` , `shortSellingDescription` , `longSellingDescription` ,company_id) values(?,?,?,?,?,?,?)")  ;
			 
			$stmt->bind_param("ssssssi", $id,$_POST['sell_phrase'],$_POST['sell_phrase'],$_POST['sell_phrase'],$_POST['sell_phrase'],$_POST['sell_phrase'],$company_id);
            $stmt->execute();
			
			 
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_address`(startingPrice,areaId, private_entrance,`property_id` , `area`  ,  `streetAddress` , `zipCode`  , `postTown`, `country`  , `province`  , `city`  ,  propertyType,company_id,vitech_region_id,vitech_city_id,vitech_area_id) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)")  ;
			 
			$stmt->bind_param("isssssssssssiiii",$_POST['sell_price'],$_POST['pnumber'],$_POST['private_entrance'], $id,$_POST['total_area'],$_POST['addrs'],$_POST['dzip'],$_POST['dcity'],$_POST['country'],$_POST['dcity'],$_POST['dcity'],$_POST['property_type'],$company_id,$_POST['vitech_region_id'],$_POST['vitech_city_id'],$_POST['vitech_area_id']);
            $stmt->execute();
			
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_interior`( numberOfBedrooms,numberOfRooms,maxNumberOfBedrooms,numberOfBathrooms,`property_id` , company_id) values(?,?,?,?,?,?)")  ;
			 
			$stmt->bind_param("iiiisi",$_POST['bedrooms_count'],$_POST['rooms_count'],$_POST['bedrooms_count'],$_POST['bathrooms_count'], $id,$company_id);
            $stmt->execute();
			
			$date=date('Y');
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_building`( buildingType,buildingYear,elevator,totalNumberFloors,floor,`property_id` , company_id) values(?,?,?,?,?,?,?)")  ;
			 
			$stmt->bind_param("sssissi",$_POST['property_type'],$date,$_POST['elevater'],$_POST['total_floor'],$_POST['total_floor'], $id,$company_id);
            $stmt->execute();
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_plot`(area,`property_id` , company_id) values(?,?,?)")  ;
			 
			$stmt->bind_param("ssi",$_POST['total_area'], $id,$company_id);
            $stmt->execute();
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_distance`(`property_id` , company_id) values(?,?)")  ;
			 
			$stmt->bind_param("si",$id,$company_id);
            $stmt->execute();
			
			$stmt = $dbCon->prepare("insert into vitech_property_pricing_detail (property_id) values (?)");
			$stmt->bind_param("s",$id);
			$stmt->execute();	
			
			
			$stmt = $dbCon->prepare("select company_name from companies where id=?");
			$stmt->bind_param("i",$company_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			 
			$row = $result->fetch_assoc();
			} 
			else
			{
			$data['id']=$this -> encrypt_decrypt('encrypt',$row2['id']);
			$stmt = $dbCon->prepare("insert into vitech_property_broker_request ( `owner_id`  , `property_id`  , `company_id`  , `broker_id`  , `category_id`  , `service_id`  , `request_type`  , `created_on` ) values(?, ?, ?,?, ?, ?, ?, now())");
			$stmt->bind_param("isiiiii",$data['user_id1'],$row2['id'],$company_id,$data['user_id'],$_POST['category_id'],$_POST['subcategory_id'],$_POST['property_status']);
			$stmt->execute();	
			$stmt = $dbCon->prepare("delete from vitech_imported_properties where id=?");
			$stmt->bind_param("i",$imported_id);
			$stmt->execute();				
			}
			$stmt->close();
			$dbCon->close();
			return $data['id'];
			
			
		}
		
		
	function proposalTrialInformation($data)
    {
		
		
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$app_id=$this -> encrypt_decrypt('decrypt',$data['app_id']);;
		$stmt = $dbCon->prepare("select * from `qloudid`.`manage_apps_permission` where app_id=? and country_id=?");
					/* bind parameters for markers */
		$stmt->bind_param("ii", $app_id,$row['country_id']);
		$stmt->execute();
		$result = $stmt->get_result();
		$rowAppFee = $result->fetch_assoc();	
				
		$stmt = $dbCon->prepare("select * from `qloudid`.`app_start_fee_info` where app_id=?");
					/* bind parameters for markers */
		$stmt->bind_param("i", $rowAppFee['id']);
		$stmt->execute();
		$result = $stmt->get_result();
		$rowAppFee = $result->fetch_assoc(); 

		if($rowAppFee['trial_period']==1 && $app_id==57)
		{
		$stmt = $dbCon->prepare("select count(id) as num from `qloudid`.`vitech_property_proposal` where company_id=?");
        
		/* bind parameters for markers */
		$stmt->bind_param("i", $company_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$rowProperty = $result->fetch_assoc();	
		if($rowProperty['num']<$rowAppFee['free_proposals'])
		{
		$stmt->close();
        $dbCon->close();
        return 1;		
		}
		else
		{
		$stmt = $dbCon->prepare("select id from safe_qid_plan_detail where app_id=? and company_id=?");
					/* bind parameters for markers */
		$plan=2;
		$stmt->bind_param("ii", $app_id,$company_id);
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
		$stmt->close();
        $dbCon->close();
        return 1;		
		}
			
		}	
		}
		else
		{
		$stmt = $dbCon->prepare("select id from safe_qid_plan_detail where app_id=? and company_id=?");
					/* bind parameters for markers */
		$plan=2;
		$stmt->bind_param("ii", $app_id,$company_id);
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
		$stmt->close();
        $dbCon->close();
        return 1;		
		}	
		}
			 
		
        
    }
	
	 function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$app_id= $this -> encrypt_decrypt('decrypt',$data['app_id']); 
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $company_id,$app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $this -> encrypt_decrypt('encrypt',$row['id']);;
		}
	
	function displaypImportedrPopertiesDetail($data)
    {
		
		
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$property_id= $this -> encrypt_decrypt('decrypt',$data['ip_id']);
			 
		$stmt = $dbCon->prepare("select * from vitech_imported_properties  where id=?");
        
		/* bind parameters for markers */
		$stmt->bind_param("i", $property_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$rowProperty = $result->fetch_assoc();
			 
		$stmt->close();
        $dbCon->close();
        return $rowProperty;
        
    }
	
		
	public function importPropertiesFromFile($data)
		{
			
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$d=date('Y-m-d');
			
			$stmt = $dbCon->prepare("select * from companies where id=?");
					  /* bind parameters for markers */
						
			$stmt->bind_param("i",$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCompany = $result->fetch_assoc();
			
			function csv_to_array($filename='', $delimiter=',')
			{
				function validateDate($date, $format = 'Y-m-d H:i:s')
						{
							$d = DateTime::createFromFormat($format, $date);
							return $d && $d->format($format) == $date;
						}
						
				if(!file_exists($filename) || !is_readable($filename))
				return FALSE;
				
				$data = array();
				if (($handle = fopen($filename, 'r')) !== FALSE)
				{
					$header = true;
					while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
					{	
						if($header){ $header = false; continue; }
						
						$data[] =  $row;
					}
					fclose($handle);
				}
				return $data;
			}
			
			$user_login_id=$data['user_id'];
			$file= $this -> encrypt_decrypt('decrypt',$_POST['indexing_save']);
			$data1 = csv_to_array($filename=$file);
			
			$i=0;
			$j=0;
			
			foreach($data1 as $rowFile)
			{
			$property_id= '';
			$property_name= '';
			$address= ''; 
			$city= '';
			$state= '';
			$zipcode= ''; 
			$country= '';
			$property_type= '';
			$bedrooms= ''; 
			$bathrooms= ''; 
			$square_footage= ''; 
			$owner_name= ''; 
			$owner_contact= ''; 
			$listing_type= ''; 
			$rental_price= ''; 
			$sale_price= ''; 
			$currency= ''; 
			$availability_start_date= ''; 
			$availability_end_date= ''; 
			$furnished= ''; 
			$amenities= ''; 
			$description= ''; 
			$lease_term= ''; 
			$deposit_amount= ''; 
			$listing_date= ''; 
			$last_updated= ''; 
			$images= ''; 
			$construction_status= ''; 
			$expected_completion_date= ''; 
			$year_built= ''; 
			$parking_spaces= ''; 
			$heating_type= ''; 
			$cooling_type= ''; 
			$energy_efficiency_rating = '';
			  $mp=0;
				foreach($_POST['maped'] as $value)
				{
					
					 
					if($_POST['mapping'][$mp]==0)
					{
						 
								 $property_id= $rowFile[$value];
						}
						 
					else if($_POST['mapping'][$mp]==1)
					{
						$property_name= $rowFile[$value];
						
					}
					
					else if($_POST['mapping'][$mp]==2)
					{
						$address= $rowFile[$value];
						
					}
					else if($_POST['mapping'][$mp]==3)
					{
						$city= $rowFile[$value];
						 
					}
					 
					else if($_POST['mapping'][$mp]==4)
					{
						$state= $rowFile[$value];
						
					}
					 
					else if($_POST['mapping'][$mp]==5)
					{
						$zipcode= $rowFile[$value];
						
					}
					  
					else if($_POST['mapping'][$mp]==6)
					{
						$country= $rowFile[$value];
						
					}
					 
					else if($_POST['mapping'][$mp]==7)
					{
						 $property_type= $rowFile[$value];
						
					}
					else if($_POST['mapping'][$mp]==8)
					{
						 $bedrooms= $rowFile[$value];
						
					}
					else if($_POST['mapping'][$mp]==9)
					{
						 $bathrooms= $rowFile[$value];
						
					}
					 
					else if($_POST['mapping'][$mp]==10)
					{
						 
						$square_footage= $rowFile[$value];
						}
						 
					else if($_POST['mapping'][$mp]==11)
					{
						$owner_name= $rowFile[$value];
						
					}
					
					else if($_POST['mapping'][$mp]==12)
					{
						$owner_contact= $rowFile[$value];
						
					}
					else if($_POST['mapping'][$mp]==13)
					{
						$listing_type= $rowFile[$value];
						 
					}
					 
					else if($_POST['mapping'][$mp]==14)
					{
						$rental_price= $rowFile[$value];
						
					}
					 
					else if($_POST['mapping'][$mp]==15)
					{
						$sale_price= $rowFile[$value];
						
					}
					  
					else if($_POST['mapping'][$mp]==16)
					{
						$currency= $rowFile[$value];
						
					}
					 
					else if($_POST['mapping'][$mp]==17)
					{
						 $availability_start_date= $rowFile[$value];
						
					}
					else if($_POST['mapping'][$mp]==18)
					{
						 $availability_end_date= $rowFile[$value];
						
					}
					else if($_POST['mapping'][$mp]==19)
					{
						 $furnished= $rowFile[$value];
						
					}
					else if($_POST['mapping'][$mp]==20)
					{
						 
						$amenities= $rowFile[$value];
						}
						 
					else if($_POST['mapping'][$mp]==21)
					{
						$description= $rowFile[$value];
						
					}
					
					else if($_POST['mapping'][$mp]==22)
					{
						$lease_term= $rowFile[$value];
						
					}
					else if($_POST['mapping'][$mp]==23)
					{
						$deposit_amount= $rowFile[$value];
						 
					}
					 
					else if($_POST['mapping'][$mp]==24)
					{
						$listing_date= $rowFile[$value];
						
					}
					 
					else if($_POST['mapping'][$mp]==25)
					{
						$last_updated= $rowFile[$value];
						
					}
					  
					else if($_POST['mapping'][$mp]==26)
					{
						$images= $rowFile[$value];
						
					}
					 
					else if($_POST['mapping'][$mp]==27)
					{
						 $construction_status= $rowFile[$value];
						
					}
					else if($_POST['mapping'][$mp]==28)
					{
						 $expected_completion_date= $rowFile[$value];
						
					}
					else if($_POST['mapping'][$mp]==29)
					{
						 $year_built= $rowFile[$value];
						
					}
					else if($_POST['mapping'][$mp]==30)
					{
						 
						$parking_spaces= $rowFile[$value];
						}
						 
					else if($_POST['mapping'][$mp]==31)
					{
						$heating_type= $rowFile[$value];
						
					}
					
					else if($_POST['mapping'][$mp]==32)
					{
						$cooling_type= $rowFile[$value];
						
					}
					else if($_POST['mapping'][$mp]==33)
					{
						$energy_efficiency_rating= $rowFile[$value];
						 
					}
			 
			  
					
					$mp++;
					 
				}
				if($property_id=='')
				{
				$stmt = $dbCon->prepare("insert into vitech_imported_properties (property_id,property_name,address,city,state,zipcode,country,property_type, bedrooms, bathrooms, square_footage, owner_name, owner_contact, listing_type, rental_price, sale_price, currency, availability_start_date, availability_end_date, furnished, amenities, description, lease_term, deposit_amount, listing_date, last_updated, images, construction_status, expected_completion_date, year_built, parking_spaces, heating_type, cooling_type, energy_efficiency_rating,company_id,user_id) values(?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?)");
			
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("ssssssssssssssssssssssssssssssssssii", $property_id,$property_name,$address,$city,$state,$zipcode,$country,$property_type, $bedrooms, $bathrooms, $square_footage, $owner_name, $owner_contact, $listing_type, $rental_price, $sale_price, $currency, $availability_start_date, $availability_end_date, $furnished, $amenities, $description, $lease_term, $deposit_amount, $listing_date, $last_updated, $images, $construction_status, $expected_completion_date, $year_built, $parking_spaces, $heating_type, $cooling_type, $energy_efficiency_rating ,$company_id,$data['user_id']);
				$stmt->execute(); 
				}
				else
				{
				 $stmt = $dbCon->prepare("select * from vitech_imported_properties where property_id=? and address=?");
        
				/* bind parameters for markers */
				$stmt->bind_param("ss",$property_id,$address);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				if(empty($row))
				{
				$stmt = $dbCon->prepare("insert into vitech_imported_properties (property_id,property_name,address,city,state,zipcode,country,property_type, bedrooms, bathrooms, square_footage, owner_name, owner_contact, listing_type, rental_price, sale_price, currency, availability_start_date, availability_end_date, furnished, amenities, description, lease_term, deposit_amount, listing_date, last_updated, images, construction_status, expected_completion_date, year_built, parking_spaces, heating_type, cooling_type, energy_efficiency_rating,company_id,user_id) values(?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?)");
			
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("ssssssssssssssssssssssssssssssssssii", $property_id,$property_name,$address,$city,$state,$zipcode,$country,$property_type, $bedrooms, $bathrooms, $square_footage, $owner_name, $owner_contact, $listing_type, $rental_price, $sale_price, $currency, $availability_start_date, $availability_end_date, $furnished, $amenities, $description, $lease_term, $deposit_amount, $listing_date, $last_updated, $images, $construction_status, $expected_completion_date, $year_built, $parking_spaces, $heating_type, $cooling_type, $energy_efficiency_rating ,$company_id,$data['user_id']);
				$stmt->execute(); 
				}	
				}
			}
			 
		$stmt->close();
        $dbCon->close();
        return 1;
			 
		}
			
		
		public function importLandloardPropertiesFromFile($data)
		{
			
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$building_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$d=date('Y-m-d');
			
			$stmt = $dbCon->prepare("select * from companies where id=?");
					  /* bind parameters for markers */
						
			$stmt->bind_param("i",$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCompany = $result->fetch_assoc();
			
			function csv_to_array($filename='', $delimiter=',')
			{
				function validateDate($date, $format = 'Y-m-d H:i:s')
						{
							$d = DateTime::createFromFormat($format, $date);
							return $d && $d->format($format) == $date;
						}
						
				if(!file_exists($filename) || !is_readable($filename))
				return FALSE;
				
				$data = array();
				if (($handle = fopen($filename, 'r')) !== FALSE)
				{
					$header = true;
					while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
					{	
						if($header){ $header = false; continue; }
						
						$data[] =  $row;
					}
					fclose($handle);
				}
				return $data;
			}
			
			$user_login_id=$data['user_id'];
			$file= $this -> encrypt_decrypt('decrypt',$_POST['indexing_save']);
			$data1 = csv_to_array($filename=$file);
			
			$i=0;
			$j=0;
			
			foreach($data1 as $rowFile)
			{
			$apartment_size= '';
			$private_door_info= '';
			$elevator_info= ''; 
			$sale_price= '';
			$price_m2= '';
			$orientation= '';
			$port_number= ''; 
			$floor_number= ''; 			
			$apartment_number= '';  
			
			  $mp=0;
				foreach($_POST['maped'] as $value)
				{
					
					 
					if($_POST['mapping'][$mp]==0)
					{
						 
								 $apartment_size= $rowFile[$value];
						}
						 
					else if($_POST['mapping'][$mp]==1)
					{
						$private_door_info= $rowFile[$value];
						
					}
					
					else if($_POST['mapping'][$mp]==2)
					{
						$elevator_info= $rowFile[$value];
						
					}
					else if($_POST['mapping'][$mp]==3)
					{
						$sale_price= $rowFile[$value];
						 
					}
					 
					else if($_POST['mapping'][$mp]==4)
					{
						$price_m2= $rowFile[$value];
						
					}
					 
					else if($_POST['mapping'][$mp]==5)
					{
						$orientation= $rowFile[$value];
						
					}
					else if($_POST['mapping'][$mp]==6)
					{
						$port_number= $rowFile[$value];
						
					}
					else if($_POST['mapping'][$mp]==7)
					{
						$floor_number= $rowFile[$value];
						
					}
					else if($_POST['mapping'][$mp]==8)
					{
						$apartment_number= $rowFile[$value];
						
					}
					  
				 	 
					
					$mp++;
					 
				}
				 
				 
				if($apartment_number=='' || $apartment_number==null)
					continue;
				
				$stmt = $dbCon->prepare("select office_apartment_number from landloard_building_port_floors_offices where floor_id in(select id from landloard_building_port_floors where port_id in(select id from landloard_building_ports where buildingid=?)) and office_apartment_number=?");
					/* bind parameters for markers */
				$stmt->bind_param("is",$building_id,$apartment_number);
				$stmt->execute();
				$resultApartmentType = $stmt->get_result();
				$rowLandloardApartment = $resultApartmentType->fetch_assoc();
				if(empty($rowLandloardApartment))
				 {
				$stmt = $dbCon->prepare("select * from landloard_building_unrefined_offices where building_id=? and apartment_number=?");
					  /* bind parameters for markers */
						
				$stmt->bind_param("is",$building_id,$apartment_number);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowCompany = $result->fetch_assoc();
				 if(empty($rowCompany))
				 {
				$stmt = $dbCon->prepare("insert into landloard_building_unrefined_offices (port_number,floor_number,apartment_number,apartment_size,private_door_info,elevator_info,sale_price,price_m2,orientation,company_id,building_id,created_on) values(?, ?, ?,?, ?, ?, ?, ?, ?,?, ?,now())");
			
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("sssiiiiiiii",$port_number,$floor_number,$apartment_number, $apartment_size,$private_door_info,$elevator_info,$sale_price,$price_m2,$orientation,$company_id,$building_id);
				$stmt->execute();	 
				 }
				 }
				 
			}
			 
		$stmt->close();
        $dbCon->close();
        return 1;
			 
		}
			
		
		public function importBrokersFromFile($data)
		{
			
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$d=date('Y-m-d');
			
			$stmt = $dbCon->prepare("select * from companies where id=?");
					  /* bind parameters for markers */
						
			$stmt->bind_param("i",$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCompany = $result->fetch_assoc();
			
			function csv_to_array($filename='', $delimiter=',')
			{
				function validateDate($date, $format = 'Y-m-d H:i:s')
						{
							$d = DateTime::createFromFormat($format, $date);
							return $d && $d->format($format) == $date;
						}
						
				if(!file_exists($filename) || !is_readable($filename))
				return FALSE;
				
				$data = array();
				if (($handle = fopen($filename, 'r')) !== FALSE)
				{
					$header = true;
					while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
					{	
						if($header){ $header = false; continue; }
						
						$data[] =  $row;
					}
					fclose($handle);
				}
				return $data;
			}
			
			$user_login_id=$data['user_id'];
			$file= $this -> encrypt_decrypt('decrypt',$_POST['indexing_save']);
			$data1 = csv_to_array($filename=$file);
			
			$i=0;
			$j=0;
			
			foreach($data1 as $rowFile)
			{
			$company_name= '';
			$first_name= '';
			$last_name= ''; 
			$country_id= '';
			$email= '';
			$phone_number= ''; 
			 
			  $mp=0;
				foreach($_POST['maped'] as $value)
				{
					
					 
					if($_POST['mapping'][$mp]==0)
					{
						 
								 $company_name= $rowFile[$value];
						}
						 
					else if($_POST['mapping'][$mp]==1)
					{
						$first_name= $rowFile[$value];
						
					}
					
					else if($_POST['mapping'][$mp]==2)
					{
						$last_name= $rowFile[$value];
						
					}
					else if($_POST['mapping'][$mp]==3)
					{
						$country_id= $rowFile[$value];
						 
					}
					 
					else if($_POST['mapping'][$mp]==4)
					{
						$email= $rowFile[$value];
						
					}
					 
					else if($_POST['mapping'][$mp]==5)
					{
						$phone_number= $rowFile[$value];
						
					}
					  
					 
					
					$mp++;
					 
				}
				 
				 
				 
				$stmt = $dbCon->prepare("insert into landloard_broker_sent_request (company_name,first_name,last_name,country_name,email,phone_number,company_id,created_on) values(?, ?, ?, ?, ?,?, ?,now())");
			
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("ssssssi", $company_name,$first_name,$last_name,$country_id,$email,$phone_number,$company_id);
				$stmt->execute(); 
				$enc=$this -> encrypt_decrypt('encrypt',$row['id']);
			$url="https://qloudid.com/public/index.php/EmployeeInvitation/verifyBrokerDetails/".$enc;
			$to            = $email;
			$subject='Broker invitaion from '.$rowCompany['company_name'];
			$emailContent='<html><head></head>

<body>


    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="600" align="center" bgcolor="#FEFEFE" style="margin:0px auto;padding:0px;border:0px;border-collapse:collapse;width:600px;background-color:black">
        <tbody>
            <tr>
                <td align="left" valign="top" style="padding-left:20px;padding-right:20px;text-align:left;vertical-align:top">
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td style="padding-left:20px;padding-right:20px">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td align="left">
                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse">
                                                        <tbody>
                                                            <tr>
                                                                <td valign="middle" style="font-size:20px;line-height:20px;font-weight:bold;vertical-align:middle"><a href="http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw3Fdh_8slomy-uTKO2Dq10h"><img src="https://www.qloudid.com/html/usercontent/images/gettxp/logo.jpeg" alt="Klarna." width="98" height="98" border="0" style="display:block;outline:0px;width:98px;height:98px" class="CToWUd" data-bit="iit"></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h1 style="font-family:&quot;Klarna Display&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:36px;line-height:40px">Broker Invitation</h1>
                                    
                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Hi there</div>
                                    
                                    
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">You are invited to become an broker. Click on below link to verify your details</div>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Do not share this link. Qloud ID representatives will never reach out to you to verify this invitaion.</div>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px"><b>'.$url.'</b></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td style="padding-left:20px;padding-right:20px">
                                    <h2 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:27px;line-height:30px">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Support</font>
                                        </font>
                                    </h2>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h3 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:19px;line-height:25px">If you have any questions please contact us on</h3>
                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                        <tbody>
                                                            <tr>
                                                                <td height="5" style="font-size:5px;line-height:5px;height:5px">&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px"><a href="#" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;text-decoration:underline!important" target="_blank" data-saferedirecturl="#">Customer Service</a></div>
                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                        <tbody>
                                                            <tr>
                                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <h3 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:19px;line-height:25px">Want to learn more about us?</h3>
                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                        <tbody>
                                                            <tr>
                                                                <td height="5" style="font-size:5px;line-height:5px;height:5px">&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Visit our website at<span>&nbsp;</span><a href="#" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;text-decoration:underline!important" target="_blank" data-saferedirecturl="#">https://www.qloudid.com</a></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td style="padding-left:20px;padding-right:20px">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="1" style="font-size:1px;line-height:1px;height:1px;background-color:rgb(238,238,238)">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>


</body></html>';
try {
				sendEmail($subject, $to, $emailContent);
			}
			catch(Exception $e) {
				 
				} 
			}
			  
		$stmt->close();
        $dbCon->close();
        return 1;
			 
		}
			
		
		
		function displaypImportedroperties($data)
	{
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		
	 
			 
			$stmt = $dbCon->prepare("select * from vitech_imported_properties where company_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i",$company_id);
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
	
		
		function updateFile($data)
		{
			$dbCon = AppModel::createConnection();
			$allowedExts = array("csv");
			//print_r($_POST);
			$temp = explode(".", $_FILES["email_file"]["name"]);
			$extension = end($temp);
			//echo $extension; die;
			if (in_array($extension, $allowedExts)) {
				if ($_FILES["email_file"]["error"] > 0) {
					$msg = "Return Code: " . $_FILES["file"]["error"] . "<br>";
					return 2;
					} else {
					
					if (file_exists("uploads/employee_csv/" . $_FILES["email_file"]["name"])) 
					unlink("uploads/employee_csv/" . $_FILES["email_file"]["name"]);
					
					move_uploaded_file($_FILES["email_file"]["tmp_name"], "uploads/employee_csv/" . $_FILES["email_file"]["name"]);
					
					$file = file_get_contents('uploads/employee_csv/'.$_FILES["email_file"]["name"], FILE_USE_INCLUDE_PATH);
					$emails = explode("\n" , $file);
					$file_a='/uploads/employee_csv/'.$_FILES["email_file"]["name"];
					
					$file_a= str_replace('\\', '/', getcwd().$file_a);
					
					$file_e=encrypt_decrypt('encrypt',$file_a);
					$_SESSION['file_e']=$file_e;
					$_SESSION['bid']=$_POST['bid'];
					return 1;
				}
				
			}	
			else
			{
				
				return 0;
				}
		}	
		
		function fileDetail($data)
		{
			
			$file= $this -> encrypt_decrypt('decrypt',$data['file_e']);
			$file1=file_get_contents($file, FILE_USE_INCLUDE_PATH);
			$fields = explode("\n" , $file1);
			$fields_sep=explode("," , $fields[0]);
			
			return $fields_sep;
			
			
		}
		
		function countPhoto($data)
		{
			$dbCon = AppModel::createConnection();
			$pid=$this->encrypt_decrypt('decrypt',$data['pid']);
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			
			$stmt = $dbCon->prepare("select * from vitech_property_broker_request where id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();
			
			if($row1['request_type']==3)
			{
			$stmt = $dbCon->prepare("select count(id) as num from vitech_property_photos where vitech_property_id=? and photo_type_info=3");
			$stmt->bind_param("s", $pid);
			}
			else
			{
				if($row1['request_type']==1)
					{
					$stmt = $dbCon->prepare("select count(id) as num from vitech_property_photos where vitech_property_id=?  and photo_type_info=1 and added_by_company=?");
					$stmt->bind_param("si", $pid,$row1['company_id']);
					}
					else
					{
					$stmt = $dbCon->prepare("select count(id) as num from vitech_property_photos where vitech_property_id=?  and (photo_type_info=1 or photo_type_info=2) and added_by_company=?");
					$stmt->bind_param("si", $pid,$row1['company_id']);	
					}
			}
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row1;
		}
		
		function listProposals($data)
		{
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		
	 
			 
			$stmt = $dbCon->prepare("select * from vitech_property_proposal where company_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i",$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				
			 $stmt = $dbCon->prepare("select country_code from phone_country_code where id=?");
			/* bind parameters for markers */
			 
			$stmt->bind_param("i",$_POST['country']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row_country = $result1->fetch_assoc();
			$row['country_code']=$row_country['country_code'];
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			array_push($org,$row);
			}
			
			 
		$stmt->close();
        $dbCon->close();
        return $org;
	}	
	
		
		function sendPropertyProposal($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']); 
			 $stmt = $dbCon->prepare("select id from vitech_property_proposal where `country_id`=? and `phone_number`=? and `company_id`=? and `created_by`=?");
			/* bind parameters for markers */
			 
			$stmt->bind_param("isii",$_POST['country'],$_POST['pnumber'],$company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into `vitech_property_proposal`(user_title,first_name,last_name,email, `country_id`,`phone_number`,`created_on`,`company_id`,`created_by`,team_available,team_members)  values(?,?,?,?,?, ?, now(),?,?,?,?)");
			$stmt->bind_param("ssssisiiis",$_POST['title'],$_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['country'],$_POST['pnumber'],$company_id,$data['user_id'],$_POST['team_available'],$_POST['team_member']);
			$stmt->execute();
			$id=$stmt->insert_id;			
			}
			else
			{
			$stmt = $dbCon->prepare("update `vitech_property_proposal` set team_available=?,team_members=? where id=?");
			$stmt->bind_param("isi",$_POST['team_available'],$_POST['team_member'],$row['id']);
			$stmt->execute();
			$id=$row['id'];				
			}
			
			$a=explode(',',$_POST['proposal_data']);
			foreach($a as $key)
			{ 
			$stmt = $dbCon->prepare("select id from vitech_property_proposal_suggestions where `proposal_id`=? and `property_id`=?");
			/* bind parameters for markers */
			 
			$stmt->bind_param("is",$id,$key);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into `vitech_property_proposal_suggestions`(proposal_id,property_id)  values(?,?)");
			$stmt->bind_param("is",$id,$key);
			$stmt->execute();
			}
			}
			 $stmt = $dbCon->prepare("select country_code from phone_country_code where id=?");
			/* bind parameters for markers */
			 
			$stmt->bind_param("i",$_POST['country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_country = $result->fetch_assoc();
			$url="https://qloudid.com/public/index.php/VitechProperties/propertyProposerDetail/".$this->encrypt_decrypt('encrypt',$id);
			$surl=getShortUrl($url);
			$subject="Proposal received";
			$emailContent='Hi '.$_POST['fname'].', I have found great properties for you! Check them out: '.$surl.'. Let me know if you are interested!';
			$to            = '+'.trim($row_country['country_code']).''.trim($_POST['pnumber']);
			try{
				$res=sendSms($subject, $to, $emailContent);
			}
			catch(Exception $e) {
				 
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			 
		}
		
		
		function checkExclusiveDates($data)
		{
		 
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['request_id']);
				 
			$stmt = $dbCon->prepare("select  * from vitech_property_broker_request where id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result5 = $stmt->get_result();
			$row5 = $result5->fetch_assoc();
			 
			$end_date=strtotime($_POST['end_date']);
			$start_date=strtotime($_POST['start_date']);
			 
			$stmt = $dbCon->prepare("SELECT count(id) as num from vitech_property_broker_request where is_approved=1 and service_id=? and property_id=?  and ((contract_start_date BETWEEN ? AND ?) or (contract_end_date BETWEEN ? AND ?)) and company_id!=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("isssssi",$row5['service_id'],$row5['property_id'],$start_date,$end_date, $start_date,$end_date,$row5['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			if($row['num']>0)
			{
			return 0;	
			}
			else
			{
				return 1;
			}
			
	}
		
		function servicesRequestManager($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$property_id=$this->encrypt_decrypt('decrypt',$data['pid']);
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			$stmt = $dbCon->prepare("select * from vitech_property_broker_request where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i",$request_id);
			$stmt->execute();
			$result5 = $stmt->get_result();
			$row = $result5->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function propertyServicesRequest($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$property_id=$this->encrypt_decrypt('decrypt',$data['pid']);
			$stmt = $dbCon->prepare("select * from vitech_property_broker_request where company_id=? and property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("is",$company_id,$property_id);
			$stmt->execute();
			$result5 = $stmt->get_result();
			$org=array();
			while($row = $result5->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select subcategory_name from professional_service_subcategory where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i",$row['service_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();	
				
			$row['subcategory_name']=$row1['subcategory_name'];
			 $row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			 array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function brokerPropertyVerification($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select category_id,id,owner_email,category_service_id,type_of_contract,added_user_id,company_id from vitech_properties where id not in (select property_id from vitech_property_broker_request where company_id=?) and company_id=? and vitech_old_data=0");
        
			/* bind parameters for markers */
			$stmt->bind_param("ii",$company_id,$company_id);
			$stmt->execute();
			$result5 = $stmt->get_result();
			while($row5 = $result5->fetch_assoc())
			{
			$property_id=$row5['id'];
			 
			$stmt = $dbCon->prepare("select id from user_logins where email=(select owner_email   from vitech_properties where vitech_properties.id=?)");
        
			/* bind parameters for markers */
			$stmt->bind_param("s", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if(empty($row))
			{
				$user_id=0;
			}
			else
			{
				$user_id=$row['id'];
			}
		
			$stmt = $dbCon->prepare("select id from vitech_property_broker_request where property_id=? and company_id=? and service_id=? and request_type=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("siii",$property_id,$company_id,$row5['category_service_id'],$row5['type_of_contract']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowStatus = $result->fetch_assoc();
			if(empty($rowStatus))
			{
			$stmt = $dbCon->prepare("insert into vitech_property_broker_request ( `owner_id`  , `property_id`  , `company_id`  , `broker_id`  , `category_id`  , `service_id`  , `request_type`  , `created_on` ) values(?, ?, ?,?, ?, ?, ?, now())");
			$stmt->bind_param("isiiiii",$user_id,$property_id,$company_id,$row5['added_user_id'],$row5['category_id'],$row5['category_service_id'],$row5['type_of_contract']);
			$stmt->execute();	
			}	
			}
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		
		function sendRequestToOwner($data)
		{ 
		
		$dbCon = AppModel::createConnection();
		$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		$property_id=$this->encrypt_decrypt('decrypt',$data['pid']);
		$stmt = $dbCon->prepare("select id from user_logins where email=(select owner_email   from vitech_properties where vitech_properties.id=?)");
        
			/* bind parameters for markers */
		$stmt->bind_param("s", $property_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		
		$stmt = $dbCon->prepare("select id from vitech_property_broker_request where property_id=? and company_id=? and service_id=? and request_type=?");
        
			/* bind parameters for markers */
		$stmt->bind_param("siii",$property_id,$company_id,$_POST['subcategory_id'],$_POST['property_status']);
		$stmt->execute();
		$result = $stmt->get_result();
		$rowStatus = $result->fetch_assoc();
		if(empty($rowStatus))
		{
		$stmt = $dbCon->prepare("insert into vitech_property_broker_request ( `owner_id`  , `property_id`  , `company_id`  , `broker_id`  , `category_id`  , `service_id`  , `request_type`  , `created_on` ) values(?, ?, ?,?, ?, ?, ?, now())");
		$stmt->bind_param("isiiiii",$row['id'],$property_id,$company_id,$data['user_id'],$_POST['category_id'],$_POST['subcategory_id'],$_POST['property_status']);
		$stmt->execute();	
		$id=$stmt->insert_id;
		}
		else
		{
		$id=$rowStatus['id'];	
		}
		
		$stmt = $dbCon->prepare("update vitech_property_broker_request set responsible_for_property=? where id=?");
		$stmt->bind_param("ii", $_POST['responsible_for_property'],$id);
		$stmt->execute();
		
		$stmt->close();
		$dbCon->close();
		return $this->encrypt_decrypt('encrypt',$id);
		}
		function searchAvailableproperties($data)
		{
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		
		$address='%'.htmlentities($_POST['address'],ENT_NOQUOTES, 'ISO-8859-1').'%';	
			$stmt = $dbCon->prepare("select vitech_property_building.floor,apartment_number,areaName,vitech_properties.streetAddress,vitech_properties.company_id,type_of_contract,owner_sell_price,sellPhrase,longSellingDescription,property_status,is_activated,vitech_city_id,id,objectNumber,vitech_property_plot.area,startingPrice,numberOfBedrooms,numberOfBathrooms from vitech_properties left join vitech_property_description on vitech_property_description.property_id=vitech_properties.id and vitech_property_description.company_id=vitech_properties.company_id  left join vitech_property_interior on vitech_property_interior.property_id=vitech_properties.id and vitech_property_interior.company_id=vitech_properties.company_id left join vitech_property_address on vitech_property_address.property_id=vitech_properties.id  and vitech_property_address.company_id=vitech_properties.company_id left join vitech_property_plot on vitech_property_plot.property_id=vitech_properties.id  and vitech_property_plot.company_id=vitech_properties.company_id   left join vitech_property_building on vitech_property_building.property_id=vitech_properties.id  and vitech_property_building.company_id=vitech_properties.company_id where vitech_properties.streetAddress like ? and vitech_old_data=0");
         
			/* bind parameters for markers */
			$stmt->bind_param("s", $address);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			if($row['company_id']==$company_id)
			{
				$row['self_property']=1;
			}
			else
			{
				$row['self_property']=0;
			}
			$stmt = $dbCon->prepare("select count(id) as num from vitech_property_broker_request where property_id=? and  company_id=?");
			$stmt->bind_param("si", $row['id'],$company_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();
			if($row1['num']==0)
			{
				$row['your_property']=0;
			}
			else
				{
				$row['your_property']=1;
			}
			$stmt = $dbCon->prepare("select vitech_photo_path,sorting_number,id from vitech_property_photos where vitech_property_id=? and  photo_type_info=3 order by sorting_number ");
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

		
		

		function checkApartmentNumberValididty($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select count(id) as num from vitech_properties where streetAddress=? and areaName=? and apartment_number=?");
			$stmt->bind_param("sss", $_POST['addrs'], $row['pnumber'], $_POST['apartment_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row2 = $result->fetch_assoc();
			
			 
			$stmt->close();
			$dbCon->close();
			return $row2['num'];	
			 
		}
		
		
		
		function checkApartmentContractAvailability($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']); 
			$stmt = $dbCon->prepare("select id from vitech_properties where streetAddress=? and areaName=? and apartment_number=?");
			$stmt->bind_param("sss", $_POST['addrs'], $row['pnumber'], $_POST['apartment_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row2 = $result->fetch_assoc();
			
			if(empty($row2))
			{
			$stmt->close();
			$dbCon->close();
			return 0;		
			}
			else
			{
			$stmt = $dbCon->prepare("select id from vitech_property_broker_request where company_id=? and property_id=? and category_id=? and service_id=? and request_type=?");
			$stmt->bind_param("isiii", $company_id,$property_id,$_POST['category_id'], $row['subcategory_id'], $_POST['property_status']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row2 = $result->fetch_assoc();
			if(empty($row2))
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
		
		function publishPropertyForRent($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			  
			$stmt = $dbCon->prepare("update vitech_properties set is_published=1 where id=?");
			$stmt->bind_param("s",$aid);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
			
		
		function updateSundayOpen($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['price_id']);
			  
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set sunday_open=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateSaturdayOpen($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['price_id']);
			  
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set saturday_open=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateFridayOpen($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['price_id']);
			  
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set friday_open=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateThursdayOpen($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['price_id']);
			  
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set thursday_open=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateWednesdayOpen($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['price_id']);
			  
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set wednesday_open=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateTuesdayOpen($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['price_id']);
			  
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set tuesday_open=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function updateMondayOpen($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['price_id']);
			  
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set monday_open=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateSunday($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['price_id']);
			  
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set sunday_price=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt = $dbCon->prepare("select monday_price,tuesday_price,wednesday_price,thursday_price,friday_price,saturday_price from vitech_property_night_pricing where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$max=max($row);
			$mini=min($row);
			if($mini>$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$max,$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			
			if($max<$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$_POST['update_info'],$mini, $aid);
			$stmt->execute();	
			}	
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateSaturday($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['price_id']);
			  
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set saturday_price=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select monday_price,tuesday_price,wednesday_price,thursday_price,friday_price,sunday_price from vitech_property_night_pricing where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$max=max($row);
			$mini=min($row);
			if($mini>$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$max,$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			
			if($max<$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$_POST['update_info'],$mini, $aid);
			$stmt->execute();	
			}	
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateFriday($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['price_id']);
			  
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set friday_price=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt = $dbCon->prepare("select monday_price,tuesday_price,wednesday_price,thursday_price,saturday_price,sunday_price from vitech_property_night_pricing where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$max=max($row);
			$mini=min($row);
			if($mini>$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$max,$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			
			if($max<$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$_POST['update_info'],$mini, $aid);
			$stmt->execute();	
			}
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateThursday($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['price_id']);
			  
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set thursday_price=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt = $dbCon->prepare("select monday_price,tuesday_price,wednesday_price,friday_price,saturday_price,sunday_price from vitech_property_night_pricing where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$max=max($row);
			$mini=min($row);
			if($mini>$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$max,$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			
			if($max<$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$_POST['update_info'],$mini, $aid);
			$stmt->execute();	
			}
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateWednesday($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['price_id']);
			  
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set wednesday_price=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt = $dbCon->prepare("select monday_price,tuesday_price,thursday_price,friday_price,saturday_price,sunday_price from vitech_property_night_pricing where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$max=max($row);
			$mini=min($row);
			if($mini>$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$max,$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			
			if($max<$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$_POST['update_info'],$mini, $aid);
			$stmt->execute();	
			}
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateTuesday($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['price_id']);
			  
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set tuesday_price=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt = $dbCon->prepare("select monday_price,wednesday_price,thursday_price,friday_price,saturday_price,sunday_price from vitech_property_night_pricing where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$max=max($row);
			$mini=min($row);
			if($mini>$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$max,$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			
			if($max<$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$_POST['update_info'],$mini, $aid);
			$stmt->execute();	
			}
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function updateMonday($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['price_id']);
			  
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set monday_price=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'], $aid);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select tuesday_price,wednesday_price,thursday_price,friday_price,saturday_price,sunday_price from vitech_property_night_pricing where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$max=max($row);
			$mini=min($row);
			if($mini>$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$max,$_POST['update_info'], $aid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			
			if($max<$_POST['update_info'])
			{
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set maximum_price=?,minimum_price=? where id=?");
			$stmt->bind_param("iii",$_POST['update_info'],$mini, $aid);
			$stmt->execute();	
			}
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateTitle($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['price_id']);
			 
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set pricing_title=? where id=?");
			$stmt->bind_param("si",$_POST['title'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateMinimumNight($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['price_id']);
			 
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set shortest_duration=? where id=?");
			$stmt->bind_param("si",$_POST['shortest_duration'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateDiscount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['price_id']);
			 
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set discount_for_seven=? where id=?");
			$stmt->bind_param("si",$_POST['discount_for_seven'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateEndDate($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			$price_id=$this->encrypt_decrypt('decrypt',$data['price_id']);
			$date=strtotime($_POST['update_info']); 
			 
			$stmt = $dbCon->prepare("select pricing_start_date,pricing_end_date from vitech_property_night_pricing where id=?");
			$stmt->bind_param("i", $price_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowDates = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set pricing_end_date=? where id=?");
			$stmt->bind_param("si",$date, $price_id);
			$stmt->execute();	
			if($rowDates['pricing_end_date']>$date)
			{
			 
			$startDate=strtotime("+1 days", strtotime($_POST['update_info']));	
			$enddate=$rowDates['pricing_end_date'];
			 
			$stmt = $dbCon->prepare("insert into vitech_property_night_pricing (pricing_start_date,pricing_end_date,property_id,created_on) values(?, ?, ?, now())");
			$stmt->bind_param("ssi",$startDate,$enddate, $aid);
			$stmt->execute();	
			}
			else
			{
				 
			$stmt = $dbCon->prepare("delete from vitech_property_night_pricing where pricing_start_date>? and pricing_end_date<?");
			$stmt->bind_param("ss", $rowDates['pricing_start_date'],$date);
			$stmt->execute();
			 
			$stmt = $dbCon->prepare("select min(id) as minId from vitech_property_night_pricing where pricing_end_date>?");
			$stmt->bind_param("s", $date);
			$stmt->execute();
			$result1 = $stmt->get_result();	
			$rowUpdating = $result1->fetch_assoc();
			 
			$startDate=strtotime("+1 days", strtotime($_POST['update_info']));
			 
			$stmt = $dbCon->prepare("update vitech_property_night_pricing set pricing_start_date=? where id=?");
			$stmt->bind_param("si", $startDate,$rowUpdating['id']);
			$stmt->execute();	
			}
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}


		 function dayAvailable($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$price_id=$this->encrypt_decrypt('decrypt',$data['price_id']); 
			$stmt = $dbCon->prepare("select * from vitech_property_night_pricing where id=?");
			$stmt->bind_param("i", $price_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$row = $result->fetch_assoc();
			if($row['monday_open']==1)
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateMondayOpen(0);"><div   class="css-cedhmb">
                        <div tabindex="0" role="button"   class="css-1w0xfwu">
                           <span class="chip chip_is-selected" style="border:1px solid #E8681F!important; background-color:#E8681F !important; color:#000000;">
                              <span class="chip_content">
								<div class="css-utgzrm" style="color:black;"></div>
								<span class="chip_text fsz14">Monday</span>
							</span>
                           </span>
                        </div>
                     </div></a>';	
			}
			else
			{  
			$org=$org.'<a href="javascript:void(0);" onclick="updateMondayOpen(1);"><div   class="css-cedhmb">
														 <div tabindex="0" role="button"   class="css-1w0xfwu">
															<span class="chip chip_not-selected" style="border:1px solid #23262f !important; background-color:#23262f;">
															   <span class="chip_content">
																  <div class="css-ylfimb" style="color:black;"></div>
																  <span class="chip_text fsz14" style="color:white;">Monday</span>
															   </span>
															</span>
														 </div>
													  </div></a>'	;
			}
			
			if($row['tuesday_open']==1)
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateTuesdayOpen(0);"><div   class="css-cedhmb">
                        <div tabindex="0" role="button"   class="css-1w0xfwu">
                           <span class="chip chip_is-selected" style="border:1px solid #E8681F!important; background-color:#E8681F !important; color:#000000;">
                              <span class="chip_content">
								<div class="css-utgzrm"></div>
								<span class="chip_text fsz14">Tuesday</span>
							</span>
                           </span>
                        </div>
                     </div></a>'	;
			}
			else
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateTuesdayOpen(1);"><div   class="css-cedhmb">
														 <div tabindex="0" role="button"   class="css-1w0xfwu">
															<span class="chip chip_not-selected" style="border:1px solid #23262f !important; background-color:#23262f;">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text fsz14" style="color:white;">Tuesday</span>
															   </span>
															</span>
														 </div>
													  </div></a>'	;
			}
			
			if($row['wednesday_open']==1)
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateWednesdayOpen(0);"><div   class="css-cedhmb">
                        <div tabindex="0" role="button"   class="css-1w0xfwu">
                           <span class="chip chip_is-selected" style="border:1px solid #E8681F!important; background-color:#E8681F !important; color:#000000;">
                              <span class="chip_content">
								<div class="css-utgzrm"></div>
								<span class="chip_text fsz14">Wednesday</span>
							</span>
                           </span>
                        </div>
                     </div></a>';	
			}
			else
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateWednesdayOpen(1);"><div   class="css-cedhmb">
														 <div tabindex="0" role="button"   class="css-1w0xfwu">
															<span class="chip chip_not-selected" style="border:1px solid #23262f !important; background-color:#23262f;">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text fsz14" style="color:white;">Wednesday</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
			}
			
			if($row['thursday_open']==1)
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateThursdayOpen(0);"><div   class="css-cedhmb">
                        <div tabindex="0" role="button"   class="css-1w0xfwu">
                           <span class="chip chip_is-selected" style="border:1px solid #E8681F!important; background-color:#E8681F !important; color:#000000;">
                              <span class="chip_content">
								<div class="css-utgzrm"></div>
								<span class="chip_text fsz14">Thursday</span>
							</span>
                           </span>
                        </div>
                     </div></a>';	
			}
			else
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateThursdayOpen(1);"><div   class="css-cedhmb">
														 <div tabindex="0" role="button"   class="css-1w0xfwu">
															<span class="chip chip_not-selected" style="border:1px solid #23262f !important; background-color:#23262f;">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text fsz14" style="color:white;">Thursday</span>
															   </span>
															</span>
														 </div>
													  </div></a>'	;
			}
			
			if($row['friday_open']==1)
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateFridayOpen(0);"><div   class="css-cedhmb">
                        <div tabindex="0" role="button"   class="css-1w0xfwu">
                           <span class="chip chip_is-selected" style="border:1px solid #E8681F!important; background-color:#E8681F !important; color:#000000;">
                              <span class="chip_content">
								<div class="css-utgzrm"></div>
								<span class="chip_text fsz14">Friday</span>
							</span>
                           </span>
                        </div>
                     </div></a>'	;
			}
			else
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateFridayOpen(1);"><div   class="css-cedhmb">
														 <div tabindex="0" role="button"   class="css-1w0xfwu">
															<span class="chip chip_not-selected" style="border:1px solid #23262f !important; background-color:#23262f;">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text fsz14" style="color:white;">Friday</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
			}
			
			if($row['saturday_open']==1)
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateSaturdayOpen(0);"><div   class="css-cedhmb">
                        <div tabindex="0" role="button"   class="css-1w0xfwu">
                           <span class="chip chip_is-selected" style="border:1px solid #E8681F!important; background-color:#E8681F !important; color:#000000;">
                              <span class="chip_content">
								<div class="css-utgzrm"></div>
								<span class="chip_text fsz14">Saturday</span>
							</span>
                           </span>
                        </div>
                     </div></a>';	
			}
			else
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateSaturdayOpen(1);"><div   class="css-cedhmb">
														 <div tabindex="0" role="button"   class="css-1w0xfwu">
															<span class="chip chip_not-selected" style="border:1px solid #23262f !important; background-color:#23262f;">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text fsz14" style="color:white;">Saturday</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
			}
			
			if($row['sunday_open']==1)
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateSundayOpen(0);"><div   class="css-cedhmb">
                        <div tabindex="0" role="button"   class="css-1w0xfwu">
                           <span class="chip chip_is-selected" style="border:1px solid #E8681F!important; background-color:#E8681F !important; color:#000000;">
                              <span class="chip_content">
								<div class="css-utgzrm"></div>
								<span class="chip_text fsz14">Sunday</span>
							</span>
                           </span>
                        </div>
                     </div></a>'	;
			}
			else
			{
			$org=$org.'<a href="javascript:void(0);" onclick="updateSundayOpen(1);"><div   class="css-cedhmb">
														 <div tabindex="0" role="button"   class="css-1w0xfwu">
															<span class="chip chip_not-selected" style="border:1px solid #23262f !important; background-color:#23262f;">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text fsz14" style="color:white;">Sunday</span>
															   </span>
															</span>
														 </div>
													  </div></a>'	;
			}
				
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function fetchPropertiesNightPricing($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$price_id=$this->encrypt_decrypt('decrypt',$data['price_id']); 
			$stmt = $dbCon->prepare("select * from vitech_property_night_pricing where id=?");
			$stmt->bind_param("i", $price_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		 function listPricing($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$property_id=$this->encrypt_decrypt('decrypt',$data['pid']);
			  
			$stmt = $dbCon->prepare("select * from vitech_property_night_pricing where property_id=?  order by pricing_start_date");
			$stmt->bind_param("s", $property_id);
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
		

		function addPricing($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$property_id=$this->encrypt_decrypt('decrypt',$data['pid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from vitech_property_night_pricing where property_id=?");
			$stmt->bind_param("s", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if($row['num']==0)
			{
				 
				$startdate=strtotime(date('Y-m-d'));
				$enddate=strtotime("+30 days", strtotime(date('Y-m-d')));
			}
			else
			{
			$stmt = $dbCon->prepare("select max(pricing_end_date) as edate from vitech_property_night_pricing where property_id=?");
			$stmt->bind_param("s", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$startdate=strtotime("+1 days", $row['edate']);	
			$enddate=strtotime("+30 days", $startdate);	
			}
			$stmt = $dbCon->prepare("insert into vitech_property_night_pricing (pricing_start_date,pricing_end_date,property_id,created_on) values(?, ?, ?, now())");
			$stmt->bind_param("iis",$startdate,$enddate, $property_id);
			$stmt->execute();	
			$id=$stmt->insert_id;	
			$stmt->close();
			$dbCon->close();
			return $this->encrypt_decrypt('encrypt',$id);
		}

		function updateChildren($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			 
			$stmt = $dbCon->prepare("update vitech_property_pricing_detail set children_allowed=? where property_id=?");
			$stmt->bind_param("is",$_POST['id'],$aid);
			$stmt->execute();	
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateInfant($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			 
			$stmt = $dbCon->prepare("update vitech_property_pricing_detail set infants_allowed=? where property_id=?");
			$stmt->bind_param("is",$_POST['id'],$aid);
			$stmt->execute();	
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateSmoking($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			 
			$stmt = $dbCon->prepare("update vitech_property_pricing_detail set smoking_allowed=? where property_id=?");
			$stmt->bind_param("is",$_POST['id'],$aid);
			$stmt->execute();	
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateParties($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			 
			$stmt = $dbCon->prepare("update vitech_property_pricing_detail set parties_allowed=? where property_id=?");
			$stmt->bind_param("is",$_POST['id'],$aid);
			$stmt->execute();	
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updatePets($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			 
			$stmt = $dbCon->prepare("update vitech_property_pricing_detail set pets_allowed=? where property_id=?");
			$stmt->bind_param("is",$_POST['id'],$aid);
			$stmt->execute();	
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateDisabled($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			 
			$stmt = $dbCon->prepare("update vitech_property_pricing_detail set disabled_allowed=? where property_id=?");
			$stmt->bind_param("is",$_POST['id'],$aid);
			$stmt->execute();	
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function childrenHouseRules($data)
		{ 
		
		$dbCon = AppModel::createConnection();
		$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
		$stmt = $dbCon->prepare("update vitech_property_pricing_detail set house_rule_updated=1 where property_id=?");
		$stmt->bind_param("s",$aid);
		$stmt->execute();		 
		$row    = $this->fetchPropertiesPricing($data); 
		$org='';
			 						
		if($row['children_allowed']==1)
		{
			$children_allowed='<a href="javascript:void(0);"  onclick="updateChildren(0);" >
										 <div class="css-cedhmb">
												  <div tabindex="0" role="button" class="css-1w0xfwu">
													 <span class="chip chip_is-selected" style="border:1px solid #E8681F!important; background-color:#E8681F !important; color:#000000;">
													 <span class="chip_content">
													 
														<span class="chip_text fsz14 changedText">Children</span>
													 </span>
												  </span>
												  </div>
											   </div>
											   </a>';
		}
		else
		{
		$children_allowed='<a href="javascript:void(0);" onclick="updateChildren(1);" >
												<div  class="css-cedhmb">
														 <div tabindex="0" role="button"  class="css-1w0xfwu">
															<span class="chip chip_not-selected" style="border:1px solid #777E90 !important;">
															   <span class="chip_content">
																  
																  <span class="chip_text fsz14 txt_777E90 changedText">Children</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		if($row['infants_allowed']==1)
		{
			$infants_allowed='<a href="javascript:void(0);" onclick="updateInfant(0);" >
			<div  class="css-cedhmb">
						   <div tabindex="0" role="button"   class="css-1w0xfwu">
							  <span class="chip chip_is-selected" style="border:1px solid #E8681F!important; background-color:#E8681F !important; color:#000000;">
													 <span class="chip_content">
														 
														<span class="chip_text fsz14 changedText">infants</span>
													 </span>
												  </span>
						   </div>
						</div></a>';
		}
		else
		{
		$infants_allowed='<a href="javascript:void(0);" onclick="updateInfant(1);" >
		<div   class="css-cedhmb">
														 <div tabindex="0" role="button"   class="css-1w0xfwu">
															<span class="chip chip_not-selected" style="border:1px solid #777E90 !important;">
															   <span class="chip_content">
																 
																  <span class="chip_text fsz14 txt_777E90 changedText">Infants</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		 $org=$org.''.$children_allowed.''.$infants_allowed;
			 
			 
			$dbCon->close();
			return $org;	
		}
		
		function eventsHouseRules($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$row    = $this->fetchPropertiesPricing($data); 
		    $org='';
			 						
		if($row['smoking_allowed']==1)
		{
			$smoking_allowed='<a href="javascript:void(0);"  onclick="updateSmoking(0);" >
										 <div class="css-cedhmb">
												  <div tabindex="0" role="button" class="css-1w0xfwu">
													 <span class="chip chip_is-selected" style="border:1px solid #E8681F!important; background-color:#E8681F !important; color:#000000;">
													 <span class="chip_content">
														 
														<span class="chip_text fsz14 changedText">Smoking</span>
													 </span>
												  </span>
												  </div>
											   </div>
											   </a>';
		}
		else
		{
		$smoking_allowed='<a href="javascript:void(0);"  onclick="updateSmoking(1);" >
												<div  class="css-cedhmb">
														 <div tabindex="0" role="button"  class="css-1w0xfwu">
															<span class="chip chip_not-selected" style="border:1px solid #777E90 !important;">
															   <span class="chip_content">
																   
																  <span class="chip_text fsz14 txt_777E90 changedText">Smoking</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		if($row['parties_allowed']==1)
		{
			$events_allowed='<a href="javascript:void(0);"  onclick="updateParties(0);" >
			<div  class="css-cedhmb">
						   <div tabindex="0" role="button"   class="css-1w0xfwu">
							  <span class="chip chip_is-selected" style="border:1px solid #E8681F!important; background-color:#E8681F !important; color:#000000;">
													 <span class="chip_content">
														 
														<span class="chip_text fsz14 changedText">Parties/Events</span>
													 </span>
												  </span>
						   </div>
						</div></a>';
		}
		else
		{
		$events_allowed='<a href="javascript:void(0);" onclick="updateParties(1);" >
		<div   class="css-cedhmb">
														 <div tabindex="0" role="button"   class="css-1w0xfwu">
															<span class="chip chip_not-selected" style="border:1px solid #777E90 !important;">
															   <span class="chip_content">
																  
																  <span class="chip_text fsz14 txt_777E90 changedText">Parties/Events</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		
		if($row['pets_allowed']==1)
		{
			$pets_allowed='<a href="javascript:void(0);" onclick="updatePets(0);">
			<div  class="css-cedhmb">
						   <div tabindex="0" role="button"   class="css-1w0xfwu">
							  <span class="chip chip_is-selected" style="border:1px solid #E8681F!important; background-color:#E8681F !important; color:#000000;">
													 <span class="chip_content">
														 
														<span class="chip_text fsz14 changedText">Pets</span>
													 </span>
												  </span>
						   </div>
						</div></a>';
		}
		else
		{
		$pets_allowed='<a href="javascript:void(0);"  onclick="updatePets(1);">
		<div   class="css-cedhmb">
														 <div tabindex="0" role="button"   class="css-1w0xfwu">
															<span class="chip chip_not-selected" style="border:1px solid #777E90 !important;">
															   <span class="chip_content">
																   
																  <span class="chip_text fsz14 txt_777E90 changedText">Pets</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		if($row['disabled_allowed']==1)
		{
			$disabled_allowed='<a href="javascript:void(0);"  onclick="updateDisabled(0);">
										 <div class="css-cedhmb">
												  <div tabindex="0" role="button" class="css-1w0xfwu">
													 <span class="chip chip_is-selected" style="border:1px solid #E8681F!important; background-color:#E8681F !important; color:#000000;">
													 <span class="chip_content">
														 
														<span class="chip_text fsz14 changedText">Disabled</span>
													 </span>
												  </span>
												  </div>
											   </div>
											   </a>';
		}
		else
		{
		$disabled_allowed='<a href="javascript:void(0);"  onclick="updateDisabled(1);">
												<div  class="css-cedhmb">
														 <div tabindex="0" role="button"  class="css-1w0xfwu">
															<span class="chip chip_not-selected" style="border:1px solid #777E90 !important;">
															   <span class="chip_content">
																   
																  <span class="chip_text fsz14 txt_777E90 changedText">Disabled</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		 
		 
		
		 $org=$org.''.$smoking_allowed.''.$events_allowed.''.$pets_allowed.''.$disabled_allowed;;
			 
			 
			$dbCon->close();
			return $org;	
		}
		
		
		function disabledHouseRules($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$row    = $this->fetchPropertiesPricing($data); 
		    $org='';
			 						
		if($row['disabled_allowed']==1)
		{
			$disabled_allowed='<a href="javascript:void(0);"  onclick="updateDisabled(0);">
										 <div class="css-cedhmb">
												  <div tabindex="0" role="button" class="css-1w0xfwu">
													 <span class="chip chip_is-selected" style="border:1px solid #E8681F!important; background-color:#E8681F !important; color:#000000;">
													 <span class="chip_content">
														 
														<span class="chip_text fsz14 changedText">Disabled</span>
													 </span>
												  </span>
												  </div>
											   </div>
											   </a>';
		}
		else
		{
		$disabled_allowed='<a href="javascript:void(0);"  onclick="updateDisabled(1);">
												<div  class="css-cedhmb">
														 <div tabindex="0" role="button"  class="css-1w0xfwu">
															<span class="chip chip_not-selected" style="border:1px solid #777E90 !important;">
															   <span class="chip_content">
																   
																  <span class="chip_text fsz14 txt_777E90 changedText">Disabled</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
		
		 
		 $org=$org.''.$disabled_allowed;
			 
			 
			$dbCon->close();
			return $org;	
		}
		
		
		
		
		
		function serviceCategoryList($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']); 
			 $stmt = $dbCon->prepare("select * from professional_service_category where is_property_category=1 and id in (select professional_category_id from company_selected_service_todos where is_selected=1 and company_id=?)");
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0">Select</option>';
			while($row_country = $result->fetch_assoc())
			{
			$org=$org.'<option value="'.$row_country['id'].'">'.$row_country['category_name'].'</option>';	
			}
			 
			
			$stmt->close();
			$dbCon->close();
			return $org;
			 
		}



function updatePropertyStatus($data)
		{ 
		
			if($_POST['id']==219)
			{
			$org='<option value="2" class="changedText">For sale</option>';	
			}
			else if($_POST['id']==223)
			{
			$org='<option value="3" class="changedText">Rent out</option>';	
			}
			else 
			{
			$org='<option value="4" class="changedText">Others</option>';	
			}
			 
			return $org;
			 
		}
		
		function serviceSubCategoryList($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']); 
			 $stmt = $dbCon->prepare("select * from professional_service_subcategory where professional_category_id=? and is_service_active=1 and id in (select professional_subcategory_id from company_selected_service_todos where is_selected=1 and company_id=?)");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['id'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0">Select</option>';
			while($row_country = $result->fetch_assoc())
			{
			/*$stmt = $dbCon->prepare("select id from vitech_property_broker_request where property_id=? and company_id=? and service_id=? and request_type=?");
			$stmt->bind_param("siii",$property_id,$company_id,$_POST['subcategory_id'],$_POST['property_status']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowStatus = $result->fetch_assoc();*/
				
			$org=$org.'<option value="'.$row_country['id'].'">'.$row_country['subcategory_name'].'</option>';	
			}
			 
			
			$stmt->close();
			$dbCon->close();
			return $org;
			 
		}
		
		
		function selectAddedService($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$property_id=$this->encrypt_decrypt('decrypt',$data['pid']);   
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']); 
			 $stmt = $dbCon->prepare("select * from professional_service_subcategory where professional_category_id=? and is_service_active=1 and id in (select professional_subcategory_id from company_selected_service_todos where is_selected=1 and company_id=?)");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['id'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			 
			while($row_country = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select id from vitech_property_broker_request where property_id=? and company_id=? and service_id=?");
			$stmt->bind_param("sii",$property_id,$company_id,$row_country['id']);
			$stmt->execute();
			$result5 = $stmt->get_result();
			$rowStatus = $result5->fetch_assoc();
			 
				if(empty($rowStatus))
				{
					$org=$org.'<div class="checkout__data  ">
						<div class="checkout__el">
						<div class="checkout__datepicker" style="padding: 16px 56px 16px 16px;  background:#10161d;">
						<div class="checkout__label changedText">Not added yet</div>
						<div class="changedText" style="font-size: 16px;
							line-height: 1.5;
							font-weight: 500;">'.$row_country['subcategory_name'].'</div>
						 
						<div class="checkout__controls">
						 
						<a href="javascript:void(0);" onclick="updatePropertyStatus('.$row_country['id'].');"><button class="checkout__edit">
						<svg class="icon icon-plus">
						<use xlink:href="#icon-plus" style="fill:#ff8d4c;"></use>
						</svg>
						</button></a>
						 
						 
						</div>
						 </div>
						</div>

						</div>';
				}
				else
				{
					$enc=$this->encrypt_decrypt('encrypt',$rowStatus['id']);
					$org=$org.'<div class="checkout__data  ">
						<div class="checkout__el">
						<div class="checkout__datepicker" style="padding: 16px 56px 16px 16px;  background:#10161d;">
						<div class="checkout__label changedText">Already added</div>
						<div class="changedText" style="font-size: 16px;
							line-height: 1.5;
							font-weight: 500;">'.$row_country['subcategory_name'].'</div>
						 
						<div class="checkout__controls">
						 
						<a href="../../photoInformation/'.$data['cid'].'/'.$data['pid'].'/'.$enc.'" ><button class="checkout__edit">
						<svg class="icon icon-arrow-next">
						<use xlink:href="#icon-arrow-next" style="fill:#ff8d4c;"></use>
						</svg>
						</button></a>
						 
						 
						</div>
						 </div>
						</div>

						</div>';
				}
				
			}
			 
			
			$stmt->close();
			$dbCon->close();
			return $org;
			 
		}
		
		
		function rentProposalList($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']); 
			 $stmt = $dbCon->prepare("select * from vitech_wishlist_proposal where  `company_id`=? and `created_by`=?");
			/* bind parameters for markers */
			 
			$stmt->bind_param("ii",$company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				
			 $stmt = $dbCon->prepare("select * from phone_country_code where  id=?");
			/* bind parameters for markers */
			 
			$stmt->bind_param("i",$row['country_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();
			$row['country_code']=$row1['country_code'];
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']); 	
			array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function sendProposal($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']); 
			 $stmt = $dbCon->prepare("select id from vitech_wishlist_proposal where `country_id`=? and `phone_number`=? and `company_id`=? and `created_by`=?");
			/* bind parameters for markers */
			 
			$stmt->bind_param("isii",$_POST['country'],$_POST['pnumber'],$company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into `vitech_wishlist_proposal`(`country_id`,`phone_number`,`created_on`,`company_id`,`created_by`,team_available,team_members)  values(?, ?, now(),?,?,?,?)");
			$stmt->bind_param("isiiis",$_POST['country'],$_POST['pnumber'],$company_id,$data['user_id'],$_POST['team_available'],$_POST['team_member']);
			$stmt->execute();
			$id=$stmt->insert_id;			
			}
			else
			{
			$stmt = $dbCon->prepare("update `vitech_wishlist_proposal` set team_available=?,team_members=? where id=?");
			$stmt->bind_param("isi",$_POST['team_available'],$_POST['team_member'],$row['id']);
			$stmt->execute();
			$id=$row['id'];				
			}
			$a=explode(',',$_POST['proposal_data']);
			foreach($a as $key)
			{
			$stmt = $dbCon->prepare("update vitech_property_wishlist set proposal_id=? where id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $id,$key);
			$stmt->execute();	
			}
			
			 $stmt = $dbCon->prepare("select country_code from phone_country_code where id=?");
			/* bind parameters for markers */
			 
			$stmt->bind_param("i",$_POST['country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_country = $result->fetch_assoc();
			$url="https://qloudid.com/public/index.php/VitechProperties/proposerDetail/".$this->encrypt_decrypt('encrypt',$id);
			$surl=getShortUrl($url);
		 
			 
			$subject="Proposal received";
			$emailContent='Hi, I have found great properties for you! Check them out: '.$surl.'. Let me know if you are interested!';
			$to            = '+'.trim($row_country['country_code']).''.trim($_POST['pnumber']);
			
			try{
				$res=sendSms($subject, $to, $emailContent);
			}
			catch(Exception $e) {
				 
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			 
		}
		
		function brokerSharedRentPropertyList($data)
		{
		 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']); 
			$search='%'.$_POST['city'].'%';
			 
			$total_days=round(($_POST['end_date']-$_POST['start_date']) / (60 * 60 * 24));
			 $strt=date('Y-m-d',$_POST['start_date']);
			 $end=date('Y-m-d',$_POST['end_date']);
			
			 
			$stmt = $dbCon->prepare("select * from user_address where   (state like ? or city like ?)  and id not in (SELECT room_type_id from hotel_checkout_detail where hotel_property_type=2  and ((checkin_date BETWEEN ? AND ?) or (checkout_date BETWEEN ? AND ?))) and id in (select  owner_property_id from vitech_properties  where vitech_old_data=0  and is_published=1 and id in (select property_id from vitech_property_broker_request where request_type=3))");
			
			/* bind parameters for markers */
			$stmt->bind_param("ssssss", $search,$search, $strt,$end, $strt,$end);
			$stmt->execute();
			$result = $stmt->get_result();
			$owner_aprtments='';
			
			$j=0;
			while($row = $result->fetch_assoc())
			{
			$owner_aprtments=$owner_aprtments.$row['id'].',';
			 
			$j++;
			}
			 
			 
			  $stmt = $dbCon->prepare("select  share_commission_info,vitech_properties.company_id,type_of_contract,company_property_id,owner_property_id,is_activated,is_reserved,owner_sell_price,sellPhrase,longSellingDescription,property_status,is_activated,vitech_city_id,vitech_properties.id,objectNumber,vitech_property_plot.area,startingPrice,numberOfBedrooms,numberOfBathrooms from vitech_properties left join vitech_property_description on vitech_property_description.property_id=vitech_properties.id and vitech_property_description.company_id=vitech_properties.company_id  left join vitech_property_interior on vitech_property_interior.property_id=vitech_properties.id and vitech_property_interior.company_id=vitech_properties.company_id left join vitech_property_address on vitech_property_address.property_id=vitech_properties.id  and vitech_property_address.company_id=vitech_properties.company_id left join vitech_property_plot on vitech_property_plot.property_id=vitech_properties.id  and vitech_property_plot.company_id=vitech_properties.company_id left join vitech_property_pricing_detail on vitech_property_pricing_detail.property_id=vitech_properties.id where  rent_info=1 and  vitech_old_data=0 and find_in_set(owner_property_id,?)");
			
				/* bind parameters for markers */
				$stmt->bind_param("s", $owner_aprtments);
				$stmt->execute();
				$result = $stmt->get_result();
				$org=array();
				while($row = $result->fetch_assoc())
				{
				$completed=30;
				$stmt = $dbCon->prepare("select count(id) as num from vitech_property_photos where vitech_property_id=?   and photo_type_info=3");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if($row1['num']>=10)
				{
					$completed=$completed+10;
					$row['image_count']=1;
				}
				else
				{
					$row['nextUrl']='photoInformation';
					$row['image_count']=0;
				}
				
				
				$stmt = $dbCon->prepare("select * from vitech_property_night_pricing where property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				 
				 
				if(!empty($row1))
				{
				$completed=$completed+10;
				$row['night_pricing_updated']=1;	
				$row['night_price']=$row1['minimum_price'];				
				}
				else
				{  
					if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='perNightPricingList';
					$row['night_pricing_updated']=0;	
					$row['night_price']='Not available';	
				}
				
				$stmt = $dbCon->prepare("select * from vitech_property_pricing_detail where property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if(empty($row1))
				{
				$stmt = $dbCon->prepare("insert into vitech_property_pricing_detail (property_id) values (?)");
				$stmt->bind_param("s",$row['id']);
				$stmt->execute();
				}
				
				$stmt = $dbCon->prepare("select * from vitech_property_pricing_detail where property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if($row1['house_rule_updated']==1)
				{
				$completed=$completed+10;	
				}
				else
				{
				if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='foreignPropertyHouseRule';	
				}
				
				if($row1['arrival_updated']==1)
				{
				$completed=$completed+10;	
				}
				else
				{
				if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='arrivalInformation';	
				}	
				
				if($row1['pricing_updated']==1)
				{
				$completed=$completed+10;	
				}
				else
				{
				if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='brokerFeeDetail';	
				}	
				if($row1['markup_info_updated']==1)
				{
				$completed=$completed+10;	
				}
				else
				{
				if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='foreignPropertyPricingDetail';	
				}	
				
				if($row['is_activated']==1)
				{
				$completed=$completed+10;	
				}
				else
				{
				if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='foreignPropertyDetail';	
				}
				
				
				if($completed<100)
					continue;
				 
				
				/*$stmt = $dbCon->prepare("select id from vitech_property_broker_request where property_id=? and company_id=? and request_type=3");
        
				$stmt->bind_param("si",$row['company_property_id'],$company_id);
				$stmt->execute();
				$resultt = $stmt->get_result();
				$rowt= $resultt->fetch_assoc();
				$row['row_request_id']=$this->encrypt_decrypt('encrypt',$rowt['id']);
				if(!empty($rowt))
				{
				$row['broker_company_id']=$company_id;	
				}
				*/
				 
				$stmt = $dbCon->prepare("select * from vitech_property_broker_request where property_id=? and request_type=3 and contract_type_info=1 and is_approved=1 and contract_start_date<=? and  contract_end_date>=?");
				$stmt->bind_param("sii", $row['id'],$_POST['start_date'],$_POST['end_date']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				$row['row_request_id']=$this->encrypt_decrypt('encrypt',$row1['id']);
				if(empty($row1))
				{
					continue;
				}
				else
				{
					$row['broker_company_id']=$row1['company_id'];	
				}
				
				if($row['broker_company_id']==$company_id)
				{
					$row['type_of_contract']=1;
				}
				else
					{
					$row['type_of_contract']=2;
				}
				 if($row['broker_company_id']!=$company_id || $row['share_commission_info']!=1)
					 continue;
				 
				$stmt = $dbCon->prepare("select vitech_photo_path,sorting_number,id from vitech_property_photos where vitech_property_id=? and sorting_number=1   and photo_type_info=3 order by sorting_number ");
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
				$row['enc_id']=$this->encrypt_decrypt('encrypt',$row['owner_property_id']);
				
				$stmt = $dbCon->prepare("select building_id from user_address where vitech_property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				
				$row['building_id']=$row1['building_id'];
				
				if($row1['building_id']>0)
				{
				$stmt = $dbCon->prepare("select society_id,building_id from landloard_society_buildings where building_id=?");
				$stmt->bind_param("i", $row1['building_id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				$row['society_id']=$row1['society_id'];				
				}
				else
				{
					$row['society_id']=0;		
				}
				
				array_push($org,$row);
				}
			$stmt->close();
			$dbCon->close();
			return $org;
	}
	
		
		function clientRentPropertyList($data)
		{
		 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']); 
			$search='%'.$_POST['city'].'%';
			 
			$total_days=round(($_POST['end_date']-$_POST['start_date']) / (60 * 60 * 24));
			 $strt=date('Y-m-d',$_POST['start_date']);
			 $end=date('Y-m-d',$_POST['end_date']);
			
			 
			$stmt = $dbCon->prepare("select * from user_address where  (state like ? or city like ?)   and id not in (SELECT room_type_id from hotel_checkout_detail where hotel_property_type=2  and ((checkin_date BETWEEN ? AND ?) or (checkout_date BETWEEN ? AND ?))) and id in (select  owner_property_id from vitech_properties  where vitech_old_data=0 and is_published=1 and id in (select property_id from vitech_property_broker_request where request_type=3))");
			
			/* bind parameters for markers */
			$stmt->bind_param("ssssss", $search,$search, $strt,$end, $strt,$end);
			$stmt->execute();
			$result = $stmt->get_result();
			$owner_aprtments='';
			
			$j=0;
			while($row = $result->fetch_assoc())
			{
			   
			$owner_aprtments=$owner_aprtments.$row['id'].',';
			 
			$j++;
			}
			  
			 
			  $stmt = $dbCon->prepare("select  commission_from_owner,vitech_properties.company_id,type_of_contract,company_property_id,owner_property_id,is_activated,is_reserved,owner_sell_price,sellPhrase,longSellingDescription,property_status,is_activated,vitech_city_id,vitech_properties.id,objectNumber,vitech_property_plot.area,startingPrice,numberOfBedrooms,numberOfBathrooms from vitech_properties left join vitech_property_description on vitech_property_description.property_id=vitech_properties.id and vitech_property_description.company_id=vitech_properties.company_id  left join vitech_property_interior on vitech_property_interior.property_id=vitech_properties.id and vitech_property_interior.company_id=vitech_properties.company_id left join vitech_property_address on vitech_property_address.property_id=vitech_properties.id  and vitech_property_address.company_id=vitech_properties.company_id left join vitech_property_plot on vitech_property_plot.property_id=vitech_properties.id  and vitech_property_plot.company_id=vitech_properties.company_id left join vitech_property_pricing_detail on vitech_property_pricing_detail.property_id=vitech_properties.id where  rent_info=1 and  vitech_old_data=0 and find_in_set(owner_property_id,?)");
			
				/* bind parameters for markers */
			  $stmt->bind_param("s", $owner_aprtments);
			  $stmt->execute();
			  $result = $stmt->get_result();
			  $org=array();
				while($row = $result->fetch_assoc())
				{
				$completed=30;
				$stmt = $dbCon->prepare("select count(id) as num from vitech_property_photos where vitech_property_id=? ");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if($row1['num']>=10)
				{
					$completed=$completed+10;
					$row['image_count']=1;
				}
				else
				{
					$row['nextUrl']='photoInformation';
					$row['image_count']=0;
				}
				
				
				$stmt = $dbCon->prepare("select * from vitech_property_night_pricing where property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				 
				 
				if(!empty($row1))
				{
				$completed=$completed+10;
				$row['night_pricing_updated']=1;	
				$row['night_price']=$row1['minimum_price'];				
				}
				else
				{  
					if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='perNightPricingList';
					$row['night_pricing_updated']=0;	
					$row['night_price']='Not available';	
				}
				
				$stmt = $dbCon->prepare("select * from vitech_property_pricing_detail where property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if(empty($row1))
				{
				$stmt = $dbCon->prepare("insert into vitech_property_pricing_detail (property_id) values (?)");
				$stmt->bind_param("s",$row['id']);
				$stmt->execute();
				}
				
				$stmt = $dbCon->prepare("select * from vitech_property_pricing_detail where property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if($row1['house_rule_updated']==1)
				{
				$completed=$completed+10;	
				}
				else
				{
				if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='foreignPropertyHouseRule';	
				}
				
				if($row1['arrival_updated']==1)
				{
				$completed=$completed+10;	
				}
				else
				{
				if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='arrivalInformation';	
				}	
				
				if($row1['pricing_updated']==1)
				{
				$completed=$completed+10;	
				}
				else
				{
				if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='brokerFeeDetail';	
				}	
				if($row1['markup_info_updated']==1)
				{
				$completed=$completed+10;	
				}
				else
				{
				if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='foreignPropertyPricingDetail';	
				}	
				
				if($row['is_activated']==1)
				{
				$completed=$completed+10;	
				}
				else
				{
				if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='foreignPropertyDetail';	
				}
				
				
				if($completed<100)
					continue;	
				
				/*$stmt = $dbCon->prepare("select id from vitech_property_broker_request where property_id=? and company_id=? and request_type=3");
        
				$stmt->bind_param("si",$row['company_property_id'],$company_id);
				$stmt->execute();
				$resultt = $stmt->get_result();
				$rowt= $resultt->fetch_assoc();
				$row['row_request_id']=$this->encrypt_decrypt('encrypt',$rowt['id']);
				if(!empty($rowt))
				{
				$row['broker_company_id']=$company_id;	
				}
				*/
				 
				$stmt = $dbCon->prepare("select * from vitech_property_broker_request where property_id=? and request_type=3 and contract_type_info=1 and is_approved=1 and contract_start_date<=? and  contract_end_date>=?");
				$stmt->bind_param("sii", $row['id'],$_POST['start_date'],$_POST['end_date']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				$row['row_request_id']=$this->encrypt_decrypt('encrypt',$row1['id']);
				if(empty($row1))
				{
					continue;
				}
				else
				{
					$row['broker_company_id']=$row1['company_id'];	
				}
				
				if($row['broker_company_id']==$company_id)
				{
					$row['type_of_contract']=1;
				}
				else
					{
					$row['type_of_contract']=2;
				}
				 if($row['broker_company_id']!=$company_id || $row['commission_from_owner']==0)
					 continue;
				 
				$stmt = $dbCon->prepare("select vitech_photo_path,sorting_number,id from vitech_property_photos where vitech_property_id=?   and photo_type_info=3 order by sorting_number ");
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
				$row['enc_id']=$this->encrypt_decrypt('encrypt',$row['owner_property_id']);
				
				$stmt = $dbCon->prepare("select building_id from user_address where vitech_property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				
				$row['building_id']=$row1['building_id'];
				
				if($row1['building_id']>0)
				{
				$stmt = $dbCon->prepare("select society_id,building_id from landloard_society_buildings where building_id=?");
				$stmt->bind_param("i", $row1['building_id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				$row['society_id']=$row1['society_id'];				
				}
				else
				{
					$row['society_id']=0;		
				}
				
				array_push($org,$row);
				}
			$stmt->close();
			$dbCon->close();
			return $org;
	}
	
		
		
		function propertyWishList($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);   
		 
		$stmt = $dbCon->prepare("select * from vitech_property_wishlist where company_id=? and added_by=? and proposal_id=0");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select * from vitech_property_description where property_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("s",$row['property_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();
			$row['sellPhrase']=$row1['sellPhrase'];
			
			$stmt = $dbCon->prepare("select vitech_photo_path,sorting_number,id from vitech_property_photos where vitech_property_id=? and photo_type_info=3 order by sorting_number ");
			$stmt->bind_param("s", $row['property_id']);
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
				array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		
		function addPropertyWishlist($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']); 
			$property_id=$this->encrypt_decrypt('decrypt',$data['pid']);  
			
			$stmt = $dbCon->prepare("select * from vitech_properties where id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("s",$property_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();
			
			$owner_property_id=$row1['owner_property_id'];  
			$_POST['checkin_date']=strtotime($_POST['checkin_date']);
			$_POST['checkout_date']=strtotime($_POST['checkout_date']);
			$stmt = $dbCon->prepare("insert into `vitech_property_wishlist`( owner_property_id, `checkin_date` , `checkout_date` , `adult_guest`  , `adult_child`  , `broker_price_per_night`  , `broker_deposit_fee`  , `broker_cleaning_fee`  , `broker_late_arrival_fee`  , `guest_email` , `seller_price_per_night`  , `seller_deposit_fee`  , `seller_cleaning_fee`  , `late_arrival_fee`  , `property_id`  , `company_id`  , `added_by`,created_on) values(?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?,?, ?, ?, ?,?,now())");
			$stmt->bind_param("issiiiiiisiiiiiii",$owner_property_id, $_POST['checkin_date'],$_POST['checkout_date'],$_POST['guest_adults'],$_POST['guest_children'],$_POST['broker_price_per_night'],$_POST['broker_deposit_fee'],$_POST['broker_cleaning_fee'],$_POST['broker_late_arrival_fee'],$_POST['guest_email'],$_POST['seller_price_per_night'],$_POST['seller_deposit_fee'],$_POST['seller_cleaning_fee'],$_POST['late_arrival_fee'],$property_id,$company_id,$data['user_id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			 
		}
		
		function wishlistBrokerShareProperty($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']); 
			$property_id=$this->encrypt_decrypt('decrypt',$data['pid']);  
			$owner_property_id=$this->encrypt_decrypt('decrypt',$data['owner_property_id']);  
			
			$stmt = $dbCon->prepare("select* from vitech_property_pricing_detail where property_id=?");
			$stmt->bind_param("i", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$wishlist_index=2;
			$_POST['checkin_date']=strtotime($_POST['checkin_date']);
			$_POST['checkout_date']=strtotime($_POST['checkout_date']);
			$stmt = $dbCon->prepare("insert into `vitech_property_wishlist`(wishlist_index, owner_property_id, `checkin_date` , `checkout_date` , `adult_guest`  , `adult_child`  , `broker_price_per_night`  , `broker_deposit_fee`  , `broker_cleaning_fee`  , `broker_late_arrival_fee`  , `seller_price_per_night`  , `seller_deposit_fee`  , `seller_cleaning_fee`  , `late_arrival_fee`  , `property_id`  , `company_id`  , `added_by`,created_on) values(?,?, ?, ?, ?, ?, ?,?,  ?, ?, ?, ?,?, ?, ?, ?,?,now())");
			$stmt->bind_param("iissiiiiiiiiiiiii",$wishlist_index,$owner_property_id, $_POST['checkin_date'],$_POST['checkout_date'],$_POST['guest_adults'],$_POST['guest_children'],$row['seller_price_per_night'],$row['seller_deposit_fee'],$row['seller_cleaning_fee'],$row['late_arrival_fee'],$row['seller_price_per_night'],$row['seller_deposit_fee'],$row['seller_cleaning_fee'],$row['late_arrival_fee'],$property_id,$company_id,$data['user_id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			 
		}
		
		
		function wishlistClientShareProperty($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']); 
			$property_id=$this->encrypt_decrypt('decrypt',$data['pid']);  
			$owner_property_id=$this->encrypt_decrypt('decrypt',$data['owner_property_id']);  
			 
			$stmt = $dbCon->prepare("select* from vitech_property_pricing_detail where property_id=?");
			$stmt->bind_param("i", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$wishlist_index=3;  
			$_POST['checkin_date']=strtotime($_POST['checkin_date']);
			$_POST['checkout_date']=strtotime($_POST['checkout_date']);
			$stmt = $dbCon->prepare("insert into `vitech_property_wishlist`(wishlist_index, owner_property_id, `checkin_date` , `checkout_date` , `adult_guest`  , `adult_child`  , `broker_price_per_night`  , `broker_deposit_fee`  , `broker_cleaning_fee`  , `broker_late_arrival_fee`  , `seller_price_per_night`  , `seller_deposit_fee`  , `seller_cleaning_fee`  , `late_arrival_fee`  , `property_id`  , `company_id`  , `added_by`,created_on) values(?,?, ?, ?, ?, ?, ?,?,  ?, ?, ?, ?,?, ?, ?, ?,?,now())");
			$stmt->bind_param("iissiiiiiiiiiiiii",$wishlist_index,$owner_property_id, $_POST['checkin_date'],$_POST['checkout_date'],$_POST['guest_adults'],$_POST['guest_children'],$row['seller_price_per_night'],$row['seller_deposit_fee'],$row['seller_cleaning_fee'],$row['late_arrival_fee'],$row['seller_price_per_night'],$row['seller_deposit_fee'],$row['seller_cleaning_fee'],$row['late_arrival_fee'],$property_id,$company_id,$data['user_id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			 
		}
		
		
		function saveCompanyDetails($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['booking_id']); 
			$bookingDetail=$this->apartmentBookingDetailInfo($data);
			$data['is_paid']=$bookingDetail['is_paid'];
			$data['price']=$bookingDetail['price']*$bookingDetail['total_days'];
			$_POST['d_address']=htmlentities($_POST['d_address'],ENT_NOQUOTES, 'ISO-8859-1');
			if($bookingDetail['is_paid']==0)
			$code=0;
			else
			{
				$code=$bookingDetail['checkin_code'];
			}
			if($_POST['indexing_save']==0)
			{
			$_POST['name_on_card']= htmlentities($_POST['name_on_card'],ENT_NOQUOTES, 'ISO-8859-1');	
			}
			else
			{
				$_POST['name_on_card']= '';
				$_POST['cvv_number']= ''; 
				$_POST['expiry_month']= '';
				$_POST['expiry_year']= '';
			}
			$stmt = $dbCon->prepare("update hotel_checkout_detail set  company_name=?,cid_number=?,d_address=?,dcity=?,dzip=?,dpo_number=?,`card_number`=?,cvv_number=?,expiry_month=?,expiry_year=?,name_on_card=? where id=?");
			$stmt->bind_param("sssssssssssi",$_POST['company_name'],$_POST['cid_number'],$_POST['d_address'],$_POST['dcity'], $_POST['dzip'],$_POST['dpo_number'],$_POST['card_number'],$_POST['cvv_number'],$_POST['expiry_month'],$_POST['expiry_year'],$_POST['name_on_card'],$id);
			$stmt->execute();
			
			if($data['is_paid']==0)
			{
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
			
			$total_price=$data['price']*100;
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
			$stmt = $dbCon->prepare("update hotel_checkout_detail set checkin_code=?,is_paid=1,cust_id=?,transection_id=? where id=?");
			$stmt->bind_param("sssi", $code,$cuId,$Chargeid,$id);
			$stmt->execute();
			}
			else
			{
			$cuId='';
			$Chargeid='';
			}
			$this->sendBookingReservationConfirmationInfo($data);
			$address_id='';
			$card_id='';
			
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
			  CURLOPT_POSTFIELDS => array('checkin_code'=>$code,'is_paid' =>1,'card_id' => $card_id,'address_id' => $address_id,'cuId' => $cuId,'Chargeid' => $Chargeid,'checkout_id' => $id),
			)); 
			$response = curl_exec($curl);
			curl_close($curl);
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
			 
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
		
		 
			
		function addressDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			 $stmt = $dbCon->prepare("select count(id) as num from user_apartment_pricing_info where user_address_id=?  order by pricing_start_date");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCount = $result->fetch_assoc();
			
			if($rowCount['num']>0)
			{
			$stmt = $dbCon->prepare("update user_address set pricing_updated=1 where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();	
			}
			 
			$stmt = $dbCon->prepare("select * from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			if($row['latitude']==null || $row['latitude']=='')
			{
			$address=$row['address']." ".$row['port_number'];
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
			$stmt = $dbCon->prepare("select country_name from country where id=(select country_of_residence from user_logins where id=?)");
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCountry = $result->fetch_assoc();	
			$address=$rowCountry['country_name'];
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
			 
			$stmt = $dbCon->prepare("update user_address set latitude=?,longitude=? where id=?");
			$stmt->bind_param("ssi",$response[0]['lat'],$response[0]['lon'], $aid);
			$stmt->execute();
			if($row['is_personal_address']==1)
			{
			$stmt = $dbCon->prepare("update user_profiles set latitude=?,langitude=? where user_logins_id=?");
			$stmt->bind_param("ssi",$response[0]['lat'],$response[0]['lon'], $data['user_id']);
			$stmt->execute();	
			}
			}
			else
			{
				
			$stmt = $dbCon->prepare("select country_name from country where id=(select country_of_residence from user_logins where id=?)");
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCountry = $result->fetch_assoc();	
			$address=$rowCountry['country_name'];
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
			
			$stmt = $dbCon->prepare("update user_address set latitude=?,longitude=? where id=?");
			$stmt->bind_param("ssi",$response[0]['lat'],$response[0]['lon'], $aid);
			$stmt->execute();
			if($row['is_personal_address']==1)
			{
			$stmt = $dbCon->prepare("update user_profiles set latitude=?,langitude=? where user_logins_id=?");
			$stmt->bind_param("ssi",$response[0]['lat'],$response[0]['lon'], $data['user_id']);
			$stmt->execute();	
			}
			}
			}
			
			if($row['property_heading']==null || $row['property_heading']=='')
			{
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_bedrooms where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowNum = $result->fetch_assoc();
			if($rowNum['num']==0)
			{
				$heading='Captivating 1-Bed House in '.$row['address'];
			}
			else
			{
				$heading='Captivating '.$rowNum['num'].'-Bed House in '.$row['address'];	
			}
			$stmt = $dbCon->prepare("update user_address set property_heading=? where id=?");
			$stmt->bind_param("si",$heading, $aid);
			$stmt->execute();
			}
			
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_pricing_info where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
				$pricing=0;
			}
			else
			{
			$stmt = $dbCon->prepare("select count(id) as num from user_apartment_pricing_info where user_address_id=? and is_deleted=1");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
				$pricing=1;
			}	
			else
			{
			$pricing=0;	
			}
			}
			
			
			$stmt = $dbCon->prepare("select count(user_address_id) as num from user_apartment_photos where user_address_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if($row['num']>=10)
			{
				$photo=1;
			}
			else
			{
				$photo=0;
			}
			
			$stmt = $dbCon->prepare("update user_address set arrival_departure_updated=1 where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("select * from user_address where id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		 
		
		
		function apartmentBookingDetailInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['booking_id']); 
			$stmt = $dbCon->prepare("select is_paid,passport_image,buyer_id,is_buyer_company,hotel_checkout_detail.user_id,user_address.address as visiting_address,user_address.port_number,user_address.city as visiting_city,user_address.state as visiting_state,user_address.id as p_id,room_type_id,total_days,price,property_nickname as hotel_name,country_code as fdesk_country_code,phone_number as fdesk_phone_number from hotel_checkout_detail left join user_address on user_address.id= hotel_checkout_detail.room_type_id left join user_profiles on user_profiles.user_logins_id=user_address.user_id left join user_logins on user_logins.id=user_address.user_id left join phone_country_code on user_logins.country_of_residence=phone_country_code.id where hotel_checkout_detail.id=?");
				
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowPrice = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $rowPrice;
		}
		
		function checkPhoneInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select count(user_logins.id) as num from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where country_of_residence=? and phone_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is",$_POST['pass_country'],$_POST['id_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select count(id) as num from user_visiting_countries where country_info=? and phone_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is",$_POST['pass_country'],$_POST['id_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();	
			
			$stmt->close();
			$dbCon->close();
			return $row['num'];	
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return $row['num'];	
			}
			
		}
		
		function addIndificator($data)
		{
			$dbCon = AppModel::createConnection();
			$data1 = strip_tags($_POST['image-data1']);
			//echo $data; die;
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			$data2 = strip_tags($_POST['image-data3']);
			//echo $data; die;
			define('UPLOAD_DIR1','../estorecss/'); // image dir path
			$img_name2="new".microtime();
			file_put_contents(UPLOAD_DIR1.$img_name2.".txt", $data2);
			$st=1;
			$_POST['issue_date']=1;
			$_POST['expiry_date']=1;
			$_POST['identificator']=1;
			$issue_date=$_POST['issue_date'].'/'.$_POST['issue_month'].'/'.$_POST['issue_year'];
			$expiry_date=$_POST['expiry_date'].'/'.$_POST['expiry_month'].'/'.$_POST['expiry_year'];
		   	$stmt = $dbCon->prepare("insert into user_identification(user_id,identification_type,identity_number,issue_month,issue_year,expiry_month, expiry_year,created_on,front_image_path, back_image_path,is_completed,issue_date,expiry_date)
			values(?, ?, ?, ?, ?, ?, ?, now(),?,?,?,?,?)");
			$stmt->bind_param("iissisississ", $_POST['guest_user_id'],$_POST['identificator'],$_POST['id_number'],$_POST['issue_month'],$_POST['issue_year'],$_POST['expiry_month'],$_POST['expiry_year'],$img_name1,$img_name2,$st,$issue_date,$expiry_date);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function addGuestAndSendBookingInfo($data)
		{
		$dbCon = AppModel::createConnection($data);
		$_POST['guest_user_id']=$this->createUser($data);
		$identificator=$this->addIndificator($data);
		$booking=$this->sendBookingInfo($data);
		 
		$dbCon->close();
		return $this -> encrypt_decrypt('encrypt',$booking);
		}
		 
		function checkPassportInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select count(id) as num from user_identification where identity_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['id_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		
		
		function sendBookingInfo($data)
		{
			$dbCon = AppModel::createConnection($data);
			$id= $this -> encrypt_decrypt('decrypt',$data['aid']);    
			$company_id= $this -> encrypt_decrypt('decrypt',$data['company_id']); 
			$date1=strtotime($data['checkin_date']);  
			$date2=strtotime($data['checkout_date']);
			$start_date=strtotime($data['checkin_date']);  
			$end_date=strtotime($data['checkout_date']);
			$total_days=($end_date-$start_date) / (60 * 60 * 24);
			$data['guest_infants']=0;
			$data['hotel_property_type']=2;
			$user_id=$data['guest_user_id'];
			$stmt = $dbCon->prepare("select email from user_logins where id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$data['guest_email']=$row['email'];
			$code=0; 
			$st=1;
			
			$stmt = $dbCon->prepare("insert into `hotel_checkout_detail`(created_by_company,price,is_paid,checkin_code,guest_email,user_id,buyer_id,`guest_adult`,`guest_children`,`guest_infant`,`checkin_date`,`checkout_date`,`room_type_id`,`total_days`,`created_on`,hotel_property_type,checkin_booking_date,checkout_booking_date,reservation_confirmed) values (?,?,?,?,?,?,?, ?, ?, ?, ?, ?,  ?, ?, now(), ?,?,?,?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiiisiiiiissiiissi",$company_id,$data['room_price'],$data['is_paid'],$code,$data['guest_email'],$user_id,$user_id, $data['guest_adults'], $data['guest_children'], $data['guest_infants'],$data['checkin_date'],$data['checkout_date'],$id,$total_days,$data['hotel_property_type'],$date1,$date2,$code);
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
			  CURLOPTdataFIELDS => array('checkin_code' => $code,'user_id' => $user_id,'guest_email' => $data['guest_email'],'guest_adults' => $data['guest_adults'],'guest_children' => $data['guest_children'],'guest_infants' => $data['guest_infants'],'date1' => $data['checkin_date'],'date2' => $data['checkout_date'],'id' => $id,'checkout_id' => $checkid,'total_days' => $total_days,'price' => $data['room_price'],'hotel_property_type' => 2,'is_paid' => $data['is_paid']),
			));

			$response = curl_exec($curl);
  
			curl_close($curl);
			
			$stmt = $dbCon->prepare("select passport_image,buyer_id,is_buyer_company,hotel_checkout_detail.user_id,user_address.address as visiting_address,user_address.port_number,user_address.city as visiting_city,user_address.state as visiting_state,user_address.id as p_id,room_type_id,total_days,price,property_nickname as hotel_name,country_code as fdesk_country_code,phone_number as fdesk_phone_number from hotel_checkout_detail left join user_address on user_address.id= hotel_checkout_detail.room_type_id left join user_profiles on user_profiles.user_logins_id=user_address.user_id left join user_logins on user_logins.id=user_address.user_id left join phone_country_code on user_logins.country_of_residence=phone_country_code.id where hotel_checkout_detail.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $checkid);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowInfo = $result->fetch_assoc();
			$rowInfo['enc_p_id']= $this -> encrypt_decrypt('encrypt',$rowInfo['p_id']);  
			$stmt = $dbCon->prepare("select concat_ws(' ', first_name,last_name) as name,email from user_logins where id = ?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $rowInfo['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUser    = $result->fetch_assoc();
		 
			$rowInfo['name']=$rowUser['name'];
			$rowInfo['email']=$rowUser['email'];	 
			$to      = $rowInfo['email'];
			$data['checkid']= $this -> encrypt_decrypt('encrypt',$checkid);  
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
                            <br> Party of '.$data['guest_adults'].' for Smiles Davis 
                            <br>
From '.$data['checkin_date'].' to '.$data['checkout_date'].'
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
			try {
						  sendEmail($subject, $to, $emailContent);
						}

					 catch(Exception $e) {
						 $to="deservingchandan@gmail.com";
						 sendEmail($subject, $to, $emailContent);
					  
					}
			$stmt->close();
			$dbCon->close();
			return $checkid;
			
		}
		
		
		
		function addNewGuestAndSendBookingInfo($data)
		{
		$dbCon = AppModel::createConnection($data);
		$_POST['guest_user_id']=$this->createUser($_POST);
		$_POST['aid']=$data['aid'];
		$booking=$this->sendBookingInfo($_POST);
		 
		$dbCon->close();
		return $this -> encrypt_decrypt('encrypt',$booking);
		}
		
		 
		
		function checkEmailInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select count(id) as num from user_logins where email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s",$_POST['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		function locationList($data)
		{
		 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']); 
			   
			$stmt = $dbCon->prepare("select  distinct city as city from user_address where  id in (select  owner_property_id from vitech_properties  where  vitech_old_data=0 and is_published=1 and id in (select property_id from vitech_property_broker_request where request_type=3))");
			
			/* bind parameters for markers */
			//$stmt->bind_param("i",$company_id);
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
		
		function apartmentList($data)
		{
		 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']); 
			$search='%'.$_POST['city'].'%';
			 
			$total_days=round(($_POST['end_date']-$_POST['start_date']) / (60 * 60 * 24));
			 $strt=date('Y-m-d',$_POST['start_date']);
			 $end=date('Y-m-d',$_POST['end_date']);
			  
			//echo $_POST['start_date'].' '.$_POST['end_date']; die; 
			$stmt = $dbCon->prepare("select * from user_address where  (state like ? or city like ?) and id not in (SELECT room_type_id from hotel_checkout_detail where hotel_property_type=2  and ((checkin_booking_date BETWEEN ? AND ?) or (checkout_booking_date BETWEEN ? AND ?))) and id in (select  owner_property_id from vitech_properties  where vitech_old_data=0 and id in (select property_id from vitech_property_broker_request where request_type=3) and is_published=1)");
			
			/* bind parameters for markers */
			$stmt->bind_param("ssssss", $search,$search, $_POST['start_date'],$_POST['end_date'], $_POST['start_date'],$_POST['end_date']);
			$stmt->execute();
			$result = $stmt->get_result();
			$owner_aprtments='';
			
			$j=0;
			while($row = $result->fetch_assoc())
			{
			 
			$owner_aprtments=$owner_aprtments.$row['id'].',';
			 
			$j++;
			}
			   
			 
			  $stmt = $dbCon->prepare("select  vitech_properties.company_id,type_of_contract,company_property_id,owner_property_id,is_activated,is_reserved,owner_sell_price,sellPhrase,longSellingDescription,property_status,is_activated,vitech_city_id,vitech_properties.id,objectNumber,vitech_property_plot.area,startingPrice,numberOfBedrooms,numberOfBathrooms from vitech_properties left join vitech_property_description on vitech_property_description.property_id=vitech_properties.id and vitech_property_description.company_id=vitech_properties.company_id  left join vitech_property_interior on vitech_property_interior.property_id=vitech_properties.id and vitech_property_interior.company_id=vitech_properties.company_id left join vitech_property_address on vitech_property_address.property_id=vitech_properties.id  and vitech_property_address.company_id=vitech_properties.company_id left join vitech_property_plot on vitech_property_plot.property_id=vitech_properties.id  and vitech_property_plot.company_id=vitech_properties.company_id  where  is_published=1 and  vitech_old_data=0 and find_in_set(owner_property_id,?)");
			
				/* bind parameters for markers */
				$stmt->bind_param("s", $owner_aprtments);
				$stmt->execute();
				$result = $stmt->get_result();
			   $org=array();
				while($row = $result->fetch_assoc())
				{
				 
				$completed=30;
				$stmt = $dbCon->prepare("select count(id) as num from vitech_property_photos where vitech_property_id=? ");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if($row1['num']>=10)
				{
					$completed=$completed+10;
					$row['image_count']=1;
				}
				else
				{
					$row['nextUrl']='photoInformation';
					$row['image_count']=0;
				}
				
				
				$stmt = $dbCon->prepare("select * from vitech_property_night_pricing where property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				 
				 
				if(!empty($row1))
				{
				$completed=$completed+10;
				$row['night_pricing_updated']=1;	
				$row['night_price']=$row1['minimum_price'];				
				}
				else
				{  
					if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='perNightPricingList';
					$row['night_pricing_updated']=0;	
					$row['night_price']='Not available';	
				}
				
				$stmt = $dbCon->prepare("select * from vitech_property_pricing_detail where property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if(empty($row1))
				{
				$stmt = $dbCon->prepare("insert into vitech_property_pricing_detail (property_id) values (?)");
				$stmt->bind_param("s",$row['id']);
				$stmt->execute();
				}
				
				$stmt = $dbCon->prepare("select * from vitech_property_pricing_detail where property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if($row1['house_rule_updated']==1)
				{
				$completed=$completed+10;	
				}
				else
				{
				if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='foreignPropertyHouseRule';	
				}
				
				if($row1['arrival_updated']==1)
				{
				$completed=$completed+10;	
				}
				else
				{
				if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='arrivalInformation';	
				}	
				
				if($row1['pricing_updated']==1)
				{
				$completed=$completed+10;	
				}
				else
				{
				if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='brokerFeeDetail';	
				}	
				if($row1['markup_info_updated']==1)
				{
				$completed=$completed+10;	
				}
				else
				{
				if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='foreignPropertyPricingDetail';	
				}	
				
				if($row['is_activated']==1)
				{
				$completed=$completed+10;	
				}
				else
				{
				if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='foreignPropertyDetail';	
				}
				
				   
				if($completed<100)
					continue;
				
				/*$stmt = $dbCon->prepare("select id from vitech_property_broker_request where property_id=? and company_id=? and request_type=3");
        
				$stmt->bind_param("si",$row['company_property_id'],$company_id);
				$stmt->execute();
				$resultt = $stmt->get_result();
				$rowt= $resultt->fetch_assoc();
				$row['row_request_id']=$this->encrypt_decrypt('encrypt',$rowt['id']);
				if(!empty($rowt))
				{
				$row['broker_company_id']=$company_id;	
				}
				*/
				 
				$stmt = $dbCon->prepare("select * from vitech_property_broker_request where property_id=? and request_type=3 and contract_type_info=1 and is_approved=1 and contract_start_date<=? and  contract_end_date>=?");
				$stmt->bind_param("sii", $row['id'],$_POST['start_date'],$_POST['end_date']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				 
				$row['row_request_id']=$this->encrypt_decrypt('encrypt',$row1['id']);
				if(empty($row1))
				{
					continue;
				}
				else
				{
					$row['broker_company_id']=$row1['company_id'];	
				}
				 
				if($row['broker_company_id']==$company_id)
				{
					$row['type_of_contract']=1;
				}
				else
					{
					$row['type_of_contract']=2;
				}
				//$row['type_of_contract']=1;
				$stmt = $dbCon->prepare("select * from vitech_property_pricing_detail where property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc(); 
				
				$row['markup_info']=$row1['markup_info']; 
				 if($row['company_id']!=$company_id && $row['markup_info']!=1)
					continue;
				
				 
				$stmt = $dbCon->prepare("select vitech_photo_path,sorting_number,id from vitech_property_photos where vitech_property_id=? and photo_type_info=3 order by sorting_number ");
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
				$row['enc_id']=$this->encrypt_decrypt('encrypt',$row['owner_property_id']);
				
				$stmt = $dbCon->prepare("select building_id from user_address where vitech_property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				
				$row['building_id']=$row1['building_id'];
				
				if($row1['building_id']>0)
				{
				$stmt = $dbCon->prepare("select society_id,building_id from landloard_society_buildings where building_id=?");
				$stmt->bind_param("i", $row1['building_id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				$row['society_id']=$row1['society_id'];				
				}
				else
				{
					$row['society_id']=0;		
				}
				
				array_push($org,$row);
				}
				
				//echo '<pre>'; print_r($org); echo '</pre>'; die;
			$stmt->close();
			$dbCon->close();
			return $org;
	}
	
	function checkOutGuest($data)
	{
		$dbCon = AppModel::createConnection();
		$data['checkout_id']= $this -> encrypt_decrypt('decrypt',$data['hotel_checkout_id']);
		$data['actual_checkout_date']=strtotime(date('Y-m-d'));
		$stmt = $dbCon->prepare("update hotel_checkout_detail set checked_in=2,actual_checkout_date=? where id=?"); 
		$stmt->bind_param("si",$data['actual_checkout_date'],$data['checkout_id']);
		$stmt->execute();	
			
		$stmt = $dbCon->prepare("update hotel_checkout_dependent_detail set checked_in_dependent=2 where hotel_checkout_id=?"); 
		$stmt->bind_param("i",$data['checkout_id']);
		$stmt->execute();
			
		$stmt = $dbCon->prepare("update user_address set whether_it_is_cleen=0 where id=(select room_type_id from hotel_checkout_detail where id=?)"); 
		$stmt->bind_param("i",$data['checkout_id']);
		$stmt->execute();	
			
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://dstricts.com/user/index.php/DstrictsApp/checkOutApartmentGuest',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => array('checkout_id' => $data['checkout_id']),
		)); 
		$response = curl_exec($curl);
		curl_close($curl);
			
		$stmt->close();
		$dbCon->close();
		return 1;
	}
	
	
	function apartmentCheckinBookingList($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);   
		$date=strtotime(date('Y-m-d'));
		//echo $date; die;
		$stmt = $dbCon->prepare("select * from hotel_checkout_detail where room_type_id in (select owner_property_id from vitech_properties where company_id=?) and hotel_property_type=2 and checked_in=1 order by id desc");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				if($row['user_id']!=0)
				{
				$stmt = $dbCon->prepare("select passport_image,email,concat_ws(' ', first_name, last_name) as name from user_logins where id=?");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("i", $row['user_id']);
				$stmt->execute();
				$resultUser = $stmt->get_result();	
				$rowUser = $resultUser->fetch_assoc();
				$filename="../estorecss/".$rowUser ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowUser ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $image = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowUser['passport_image'].'.jpg' ); } else { $image="../html/usercontent/images/notavailable.jpg"; } 	
				$row['guest_email']=$rowUser['email'];
				$row['name']=$rowUser['name'];
				}
				else { $image="../html/usercontent/images/notavailable.jpg"; $row['name']='No name';}

				$row['photo_info']=	'../../../../../'.$image;
				$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);  
				array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
	function apartmentCleaningBookingList($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);   
		$date=strtotime(date('Y-m-d'));
		//echo $date; die;
		$stmt = $dbCon->prepare("select room_type_id,id,checkin_date,checkout_date,guest_adult,guest_children,user_id from hotel_checkout_detail where room_type_id in (select owner_property_id from vitech_properties where company_id=?) and hotel_property_type=2 and checked_in=2 and is_cleaned=0 order by id desc");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{ 
				$stmt = $dbCon->prepare("select whether_it_is_cleen from user_address where id=?");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("i", $row['room_type_id']);
				$stmt->execute();
				$resultUser = $stmt->get_result();	
				$rowUser = $resultUser->fetch_assoc();
				if($rowUser['whether_it_is_cleen']!=0)
				{
					continue;
				}
				if($row['user_id']!=0)
				{
				$stmt = $dbCon->prepare("select passport_image,email,concat_ws(' ', first_name, last_name) as name from user_logins where id=?");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("i", $row['user_id']);
				$stmt->execute();
				$resultUser = $stmt->get_result();	
				$rowUser = $resultUser->fetch_assoc();
				$filename="../estorecss/".$rowUser ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowUser ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $image = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowUser['passport_image'].'.jpg' ); } else { $image="../html/usercontent/images/notavailable.jpg"; } 	
				$row['guest_email']=$rowUser['email'];
				$row['name']=$rowUser['name'];
				}
				else { $image="../html/usercontent/images/notavailable.jpg"; $row['name']='No name';}
				
				
				$stmt = $dbCon->prepare("select sellPhrase from vitech_property_description where property_id=(select company_property_id from vitech_properties where owner_property_id=?)");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("i", $row['room_type_id']);
				$stmt->execute();
				$resultUser = $stmt->get_result();	
				$rowUser = $resultUser->fetch_assoc();
				 

				$row['shortSaleDescription']=	$rowUser['sellPhrase'];
				$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);   
				array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function apartmentCleaningInspectionList($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);   
		$date=strtotime(date('Y-m-d'));
		//echo $date; die;
		$stmt = $dbCon->prepare("select id,checkin_date,checkout_date,guest_adult,guest_children,user_id,room_cleaning_date,room_type_id from hotel_checkout_detail where room_type_id in (select owner_property_id from vitech_properties where company_id=?) and hotel_property_type=2 and checked_in=2 and is_cleaned=1 and cleaning_inspection_status=0 order by id desc");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{ 
				$stmt = $dbCon->prepare("select whether_it_is_cleen from user_address where id=?");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("i", $row['room_type_id']);
				$stmt->execute();
				$resultUser = $stmt->get_result();	
				$rowUser = $resultUser->fetch_assoc();
				if($rowUser['whether_it_is_cleen']!=0)
				{
					continue;
				}
				if($row['user_id']!=0)
				{
				$stmt = $dbCon->prepare("select passport_image,email,concat_ws(' ', first_name, last_name) as name from user_logins where id=?");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("i", $row['user_id']);
				$stmt->execute();
				$resultUser = $stmt->get_result();	
				$rowUser = $resultUser->fetch_assoc();
				$filename="../estorecss/".$rowUser ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowUser ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $image = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowUser['passport_image'].'.jpg' ); } else { $image="../html/usercontent/images/notavailable.jpg"; } 	
				$row['guest_email']=$rowUser['email'];
				$row['name']=$rowUser['name'];
				}
				else { $image="../html/usercontent/images/notavailable.jpg"; $row['name']='No name';}

				
				$stmt = $dbCon->prepare("select sellPhrase from vitech_property_description where property_id=(select company_property_id from vitech_properties where owner_property_id=?)");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("i", $row['room_type_id']);
				$stmt->execute();
				$resultUser = $stmt->get_result();	
				$rowUser = $resultUser->fetch_assoc();
				 

				$row['shortSaleDescription']=	$rowUser['sellPhrase'];
				$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);   
				array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function cleanApartment($data)
		{
			$dbCon = AppModel::createConnection();
			$hotel_checkout_id= $this -> encrypt_decrypt('decrypt',$data['hotel_checkout_id']);
			$today=strtotime(date('Y-m-d')); 
			$stmt = $dbCon->prepare("update hotel_checkout_detail set is_cleaned=1,room_cleaning_date=?,cleaning_inspection_status=0 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("si",$today,$hotel_checkout_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			 
		}
	
	function apartmentCheckOutBookingList($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);   
		$date=strtotime(date('Y-m-d'));
		//echo $date; die;
		$stmt = $dbCon->prepare("select * from hotel_checkout_detail where room_type_id in (select owner_property_id from vitech_properties where company_id=?) and hotel_property_type=2 and checked_in=2 and is_cleaned=0 order by id desc");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				if($row['user_id']!=0)
				{
				$stmt = $dbCon->prepare("select passport_image,email,concat_ws(' ', first_name, last_name) as name from user_logins where id=?");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("i", $row['user_id']);
				$stmt->execute();
				$resultUser = $stmt->get_result();	
				$rowUser = $resultUser->fetch_assoc();
				$filename="../estorecss/".$rowUser ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowUser ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $image = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowUser['passport_image'].'.jpg' ); } else { $image="../html/usercontent/images/notavailable.jpg"; } 	
				$row['guest_email']=$rowUser['email'];
				$row['name']=$rowUser['name'];
				}
				else { $image="../html/usercontent/images/notavailable.jpg"; $row['name']='No name';}

				$row['photo_info']=	'../../../../../'.$image;
				$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);  
				array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
	
	
	
		function apartmentCompleteBookingList($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);   
		$date=strtotime(date('Y-m-d'));
		//echo $date; die;
		$stmt = $dbCon->prepare("select * from hotel_checkout_detail where room_type_id in (select owner_property_id from vitech_properties where company_id=?) and hotel_property_type=2 order by id desc");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				if($row['user_id']!=0)
				{
				$stmt = $dbCon->prepare("select passport_image,email,concat_ws(' ', first_name, last_name) as name from user_logins where id=?");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("i", $row['user_id']);
				$stmt->execute();
				$resultUser = $stmt->get_result();	
				$rowUser = $resultUser->fetch_assoc();
				$filename="../estorecss/".$rowUser ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowUser ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $image = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowUser['passport_image'].'.jpg' ); } else { $image="../html/usercontent/images/notavailable.jpg"; } 	
				$row['guest_email']=$rowUser['email'];
				$row['name']=$rowUser['name'];
				}
				else { $image="../html/usercontent/images/notavailable.jpg"; $row['name']='No name';}

				$row['photo_info']=	'../../../../../'.$image;
				array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		function apartmentBookingList($data)
		{
		$dbCon = AppModel::createConnection();
		$id= $this -> encrypt_decrypt('decrypt',$data['aid']);   
		$date=strtotime(date('Y-m-d'));
		//echo $date; die;
		$stmt = $dbCon->prepare("select * from hotel_checkout_detail where room_type_id=? and hotel_property_type=2 order by id desc");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				if($row['user_id']!=0)
				{
				$stmt = $dbCon->prepare("select passport_image,email,concat_ws(' ', first_name, last_name) as name from user_logins where id=?");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("i", $row['user_id']);
				$stmt->execute();
				$resultUser = $stmt->get_result();	
				$rowUser = $resultUser->fetch_assoc();
				$filename="../estorecss/".$rowUser ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowUser ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $image = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowUser['passport_image'].'.jpg' ); } else { $image="../html/usercontent/images/notavailable.jpg"; } 	
				$row['guest_email']=$rowUser['email'];
				$row['name']=$rowUser['name'];
				}
				else { $image="../html/usercontent/images/notavailable.jpg"; $row['name']='No name';}

				$row['photo_info']=	'../../../../../'.$image;
				array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function listEmployees($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$companY_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,first_name,last_name from user_logins where id in (select user_login_id from employees where company_id=?) ");
			$stmt->bind_param("i", $companY_id);
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
		
		function removeAccess($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$companY_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$app_id=$this->encrypt_decrypt('decrypt',$data['app_id']);
			$access_id=$this->encrypt_decrypt('decrypt',$data['access_id']);
			$stmt = $dbCon->prepare("update company_app_access_info set is_access=0 where id=?");
			$stmt->bind_param("i", $access_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function provideAccess($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$companY_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$app_id=$this->encrypt_decrypt('decrypt',$data['app_id']);
			$access_id=$this->encrypt_decrypt('decrypt',$data['access_id']);
			$stmt = $dbCon->prepare("update company_app_access_info set is_access=1 where id=?");
			$stmt->bind_param("i", $access_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function listAppAccessEmployees($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$app_id=$this->encrypt_decrypt('decrypt',$data['app_id']);
			$stmt = $dbCon->prepare("select id,first_name,last_name from user_logins where id in (select user_login_id from employees where company_id=?) ");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$org=array();
			while($row = $result1->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select id,is_admin from manage_employee_permissions where user_id=? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $row['id'],$company_id);
			$stmt->execute();
			$result3 = $stmt->get_result();
			$rowAdmin = $result3->fetch_assoc();
			if($rowAdmin['is_admin']==1 || $row['user_id']==43)
			{
				$is_access=1;
			}
			else
			{
				$is_access=0;
			}
			 
			$stmt = $dbCon->prepare("select id from company_app_access_info where user_id=? and company_id=? and app_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iii", $row['id'],$company_id,$app_id);
			$stmt->execute();
			$result2 = $stmt->get_result();
			$row2 = $result2->fetch_assoc();
			
			if(empty($row2))
			{
			$stmt = $dbCon->prepare("insert into company_app_access_info(`user_id`,company_id,is_access,app_id) values(?, ?, ?, ?)");
			$stmt->bind_param("iiii", $row['id'],$company_id,$is_access,$app_id);
			$stmt->execute();
			}
			else
			{
				if($is_access==1)
				{
				$stmt = $dbCon->prepare("update company_app_access_info set is_access=1 where id=?");
				$stmt->bind_param("i", $row2['id']);
				$stmt->execute();
				}
			}
				
			}
			
			
			$stmt = $dbCon->prepare("select company_app_access_info.id,first_name,last_name,user_id,is_access,passport_image from company_app_access_info left join user_logins on user_logins.id=company_app_access_info.user_id where company_id=? and app_id=?");
			$stmt->bind_param("ii", $company_id,$app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select id,is_admin from manage_employee_permissions where user_id=? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $row['user_id'],$company_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$rowAdmin = $result1->fetch_assoc();
			if($rowAdmin['is_admin']==1 || $row['user_id']==43)
			{
				$row['is_admin']=1;
			}
			else
			{
				$row['is_admin']=0;
			}
			 
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			if($row['passport_image']!=null || $row['passport_image']!="") { 
						 
						 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/notavailable.jpg"; }
						 
							 
											$img='../../../../'.$imgs;
							
							 } else {  $img="https://qloudid.com/html/usercontent/images/notavailable.jpg";
																	 }
				$row['photo_info']=$img; 
			array_push($org,$row);	
			}
			
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		
		function listTeam($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$companY_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select employees.id,user_logins.first_name,user_logins.last_name,user_login_id,passport_image from employees left join user_logins on user_logins.id=employees.user_login_id where company_id=?");
			$stmt->bind_param("i", $companY_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$org=array();
			while($row = $result1->fetch_assoc())
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
				if($row['passport_image']!=null || $row['passport_image']!="") { 
						 
						 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/notavailable.jpg"; }
						 
							 
											$img='../../../'.$imgs;
							
							 } else {  $img="https://qloudid.com/html/usercontent/images/notavailable.jpg";
																	 }
				$row['photo_info']=$img;
				array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}

		
		function propertyReservationDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$propery_id=$this->encrypt_decrypt('decrypt',$data['pid']);
			$stmt = $dbCon->prepare("select * from vitech_property_reservation_detail where id = (select reservation_id from vitech_properties where id=?) ");
			$stmt->bind_param("i", $propery_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row = $result1->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		function saveCardDetails($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['booking_id']); 
			$data['card_type']='Visa';	
			$_POST['name_on_card']=htmlentities($_POST['name_on_card'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("select user_logins.id,first_name,last_name,ssn,country_of_residence,email,sex,dob_day,dob_month,dob_year,country_phone,phone_number, address,user_profiles.city,user_profiles.country,user_profiles.zipcode,grading_status from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where user_logins.id=(select user_id from hotel_checkout_detail where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$stmt = $dbCon->prepare("insert into user_cards(`user_login_id`,`created_on`,`card_number`,card_cvv,exp_month,exp_year,name_on_card,card_type) values(?, now(), ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("isiiiss", $row['id'],$_POST['card_number'],$_POST['cvv_number'],$_POST['expiry_month'],$_POST['expiry_year'],$_POST['name_on_card'],$data['card_type']);
			$stmt->execute();
			return $stmt->insert_id;
			$stmt->close();
			$dbCon->close();
			
			 
		}
		
		
		
		
		
		
		function addDeliveryAdddress($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['booking_id']);    
			$_POST['same_invoice']=1;
			$_POST['same_name']=1;
			$stmt = $dbCon->prepare("select user_logins.id,first_name,last_name,ssn,country_of_residence,email,sex,dob_day,dob_month,dob_year,country_phone,phone_number, address,user_profiles.city,user_profiles.country,user_profiles.zipcode,grading_status from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where user_logins.id=(select user_id from hotel_checkout_detail where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			if($_POST['same_name']==1)
			{
			$full_name=$row['first_name'].' '.$row['last_name'];	
			}
			else
			{
			$full_name=	htmlentities($_POST['flname'],ENT_NOQUOTES, 'ISO-8859-1');
			}
			if($_POST['same_invoice']==1)
			{
			$_POST['iaddress']=$_POST['d_address'];	
			$_POST['i_port_number']=$_POST['dpo_number'];	
			$_POST['izip']=$_POST['dzip'];
			$_POST['icity']=$_POST['dcity'];
			}
			$data['entry_code']='';
			$st=0;
			$_POST['d_address']=htmlentities($_POST['d_address'],ENT_NOQUOTES, 'ISO-8859-1');
			$_POST['iaddress']=htmlentities($_POST['iaddress'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into  user_address (`address`  , `city`  , `zipcode` , `port_number` , `invoice_address`  , `invoice_city`  , `invoice_zipcode`  , `invoice_port_number`  , `is_name_same` , `is_invoice_same`  , `name_on_house`  ,entry_code , user_id, created_on, is_personal_address) values(?,?,?,?,?,?,?,?,?,?,?,?,?,now(),?)");
				/* bind parameters for markers */
			$stmt->bind_param("ssssssssiissii",$_POST['d_address'],$_POST['dcity'], $_POST['dzip'],$_POST['dpo_number'],$_POST['iaddress'],$_POST['icity'],$_POST['izip'],$_POST['i_port_number'],$_POST['same_invoice'],$_POST['same_name'],$full_name,$data['entry_code'],$row['id'],$st);
			$stmt->execute();
			$id=$stmt->insert_id;
			$stmt = $dbCon->prepare("update user_profiles set name_on_door=?, entry_code=?, full_address=?, port_number=?, address=?, city=?, zipcode=?,invoice_address=?,invoice_zipcode=?,invoice_city=?,invoice_port=?,is_invoice_same=?,is_name_on_house_same=?, is_id_active=1  where user_logins_id=?");
				/* bind parameters for markers */
			$stmt->bind_param("sssssssssssiii",$full_name,$data['entry_code'], $_POST['d_address'],$_POST['dpo_number'],$_POST['d_address'],$_POST['dcity'],$_POST['dzip'],$_POST['d_address'],$_POST['dzip'],$_POST['dcity'],$_POST['dpo_number'],$_POST['same_invoice'],$_POST['same_name'],$row['id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return $id;
		}
		
		
		function updateUserPersonalAddress($data)
		{
		$dbCon = AppModel::createConnection($data);
		$id= $this -> encrypt_decrypt('decrypt',$data['booking_id']); 
		$stmt = $dbCon->prepare("select is_paid,passport_image,buyer_id,is_buyer_company,hotel_checkout_detail.user_id,user_address.address as visiting_address,user_address.port_number,user_address.city as visiting_city,user_address.state as visiting_state,user_address.id as p_id,room_type_id,total_days,price,property_nickname as hotel_name,country_code as fdesk_country_code,phone_number as fdesk_phone_number from hotel_checkout_detail left join user_address on user_address.id= hotel_checkout_detail.room_type_id left join user_profiles on user_profiles.user_logins_id=user_address.user_id left join user_logins on user_logins.id=user_address.user_id left join phone_country_code on user_logins.country_of_residence=phone_country_code.id where hotel_checkout_detail.id=?");
			
		/* bind parameters for markers */
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$rowPrice = $result->fetch_assoc();
		$address_id=$this->addDeliveryAdddress($data);
		$card_id=$this->saveCardDetails($data);
		$code=0;
		if($_POST['food1']==0 && $rowPrice['is_paid']==0)
			{
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
			
			$Chargeid=$c['id'];	
			$rowPrice['is_paid']=1;
			$stmt = $dbCon->prepare("update hotel_checkout_detail set  checkin_code=?,is_paid=1,card_id=?,delivery_address_id=?,cust_id=?,transection_id=? where id=?");
			$stmt->bind_param("siissi",$code, $card_id,$address_id,$cuId,$Chargeid,$id);
			$stmt->execute();
			
			$this->sendBookingReservationConfirmationInfo($data);
			}
		else if($_POST['food1']==0 && $rowPrice['is_paid']==1)
		{
			$cuId=''; 
			$Chargeid='';
			$stmt = $dbCon->prepare("update hotel_checkout_detail set  checkin_code=?,is_paid=1,card_id=?,delivery_address_id=?,cust_id=?,transection_id=? where id=?");
			$stmt->bind_param("siissi",$code, $card_id,$address_id,$cuId,$Chargeid,$id);
			$stmt->execute();
			
			$this->sendBookingReservationConfirmationInfo($data);
		}
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
				 
					$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
					 
					$stmt = $dbCon->prepare("select areaName,area ,owner_sell_price,is_activated,responsible_for_sold,responsible_for_sell,responsible_for_manage,responsible_for_rent,private_entrance,elevator,pool,terrace,balcony,sellPhrase,startingPrice,sellingHeading,shortSellingDescription,longSellingDescription,numberOfBedrooms,numberOfBathrooms,vitech_property_address.streetAddress,vitech_property_address.country,vitech_property_address.city,imageId,images_info from vitech_property_description left join vitech_property_address on vitech_property_address.property_id=vitech_property_description.property_id and vitech_property_address.company_id=vitech_property_description.company_id left join vitech_property_interior on vitech_property_interior.property_id=vitech_property_description.property_id and vitech_property_interior.company_id=vitech_property_description.company_id left join vitech_property_exterior on vitech_property_exterior.property_id=vitech_property_description.property_id and vitech_property_exterior.company_id=vitech_property_description.company_id  left join vitech_properties on vitech_properties.id=vitech_property_description.property_id and vitech_properties.company_id=vitech_property_description.company_id left join vitech_property_building on vitech_property_building.property_id=vitech_property_description.property_id and vitech_property_building.company_id=vitech_property_description.company_id where vitech_property_description.property_id=?");
				 
					/* bind parameters for markers */
					$stmt->bind_param("s", $property_id);
					$stmt->execute();
					$result = $stmt->get_result();
					$row = $result->fetch_assoc();
					 
					$stmt = $dbCon->prepare("select * from vitech_property_photos where vitech_property_id=? order by sorting_number");
				
					/* bind parameters for markers */
					$stmt->bind_param("s", $property_id);
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
			
		
		
		
	function selectedMarketplaceSortedServiceAvilable($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$marketplace_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$service_id=$this->encrypt_decrypt('decrypt',$data['service_id']);
			 
			$stmt = $dbCon->prepare("select * from cleaning_company_premium_account_request where domain_id=? and company_id=?");
			$stmt->bind_param("ii",$marketplace_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowPlan = $result->fetch_assoc();
			
			if($rowPlan['selected_subscription']<=1)
			{
			$stmt = $dbCon->prepare("select count(professional_marketplace_service_todos.id) as num from professional_marketplace_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_marketplace_service_todos.professional_subcategory_id where  professional_marketplace_service_todos.marketplace_id=? and is_service_active=1 and free_services=1 and is_selected=1 and professional_subcategory_id=?");	
			}
			else if($rowPlan['selected_subscription']==2)
			{
			$stmt = $dbCon->prepare("select count(professional_marketplace_service_todos.id) as num from professional_marketplace_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_marketplace_service_todos.professional_subcategory_id where  professional_marketplace_service_todos.marketplace_id=? and is_service_active=1 and gold_services=1 and is_selected=1  and professional_subcategory_id=?");	
			}
			else 
			{
			$stmt = $dbCon->prepare("select count(professional_marketplace_service_todos.id) as num from professional_marketplace_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_marketplace_service_todos.professional_subcategory_id where  professional_marketplace_service_todos.marketplace_id=? and is_service_active=1 and premium_services=1 and is_selected=1  and professional_subcategory_id=?");	
			}
			$stmt->bind_param("ii", $marketplace_id,$service_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row = $result1->fetch_assoc();
			
			 
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		 
	
	
	function userSummary($data)
		{
        $dbCon = AppModel::createConnection();
       
		
		$stmt = $dbCon->prepare("select phone_number,country_code,first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image,country_of_residence from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id left join phone_country_code on phone_country_code.id=user_logins.country_of_residence where user_logins.id = ?");
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
		
		
		
		
		function sendConnectRequest($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$service_id=$this->encrypt_decrypt('decrypt',$data['service_id']); 
			$property_id=$this->encrypt_decrypt('decrypt',$data['property_id']);
			
			$_POST['first_name']=htmlentities($_POST['first_name'],ENT_NOQUOTES, 'ISO-8859-1');	 
			$_POST['last_name']=htmlentities($_POST['last_name'],ENT_NOQUOTES, 'ISO-8859-1');	 
			
			$stmt = $dbCon->prepare("insert into vitech_property_connect_request (vitech_property_id,marketplace_id,service_id,first_name,last_name,email_id,country_id,phone_number, company_id, created_on, added_by) values (?,?,?,?,?,?,?,?,?,now(),?)");
			$stmt->bind_param("iiisssisii",$property_id,$domain_id,$service_id,$_POST['first_name'],$_POST['last_name'],$_POST['email'],$_POST['country'],$_POST['pnumber'],$company_id,$data['user_id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("select * from vitech_property_address where property_id=? ");
			$stmt->bind_param("s", $property_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$rowAddress = $result1->fetch_assoc();
			$to=$_POST['email'];
			$subject="Property publish request";
			$emailContent='<html xmlns="http://www.w3.org/1999/xhtml" style="background-color: rgb(240, 240, 240);" class=""><head>
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
					<style id="__web-inspector-hide-shortcut-style__">
.__web-inspector-hide-shortcut__, .__web-inspector-hide-shortcut__ *, .__web-inspector-hidebefore-shortcut__::before, .__web-inspector-hideafter-shortcut__::after
{
    visibility: hidden !important;
}
</style></head>

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
								<td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <h1 style="font-size: 33px;font-weight: 800;line-height: 30px;">Qloud ID</h1>               </td>
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
									<tbody>
									<!-- INTRO -->
									<tr>
									  <td valign="top" align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">Connect request</span>                          </td>
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
										  <span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">Property connectrequest</span>
										  <br>Hi i am the manager of this property which belongs to your community. Kindly send connect request to owner of this property so it is connected to your community. If you dont have a Qloud ID account please sign up below</div>
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
												
											  </div>
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
														<span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">'.$rowAddress["propertyType"].'</span><br>'.$rowAddress["streetAddress"].'- '.$row["areaName"].'<br>'.$rowAddress["postTown"].','.$rowAddress["zipCode"].'</td>
													  </tr>
													</tbody></table>
													<!--[if mso]></td><td><![endif]-->
													
												  </td>
												</tr>
											  </tbody></table>
											</td>
										  </tr>
										</tbody></table>
									  </td>
									</tr>
									
									
									
									
									<tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      
</table>
                  </td>
                </tr>	
									<!-- RECEIPT -->
									
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
									
									
									<tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
                      
                      
                      



<tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>

<tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody>
<tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="https://www.qloudid.com/public/index.php/UserCompanySignUp/selectSignup/'.$data['domain_id'].'" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;">Sign up</a>                                </td>
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
									<!-- EDIT RECEIPT -->
									<!-- CANCELLATION POLICY -->
									<tr>
									  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="text text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; font-weight: 600; color: rgb(35, 35, 62);">
												Company policy
											  </div>
											</td>
										  </tr>
										  <tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
												
												<span>You can update property services provided by the company when required.</span>
											  </div>
											</td>
										  </tr>
										</tbody></table>
									  </td>
									</tr>
									<tr class="spacer">
									  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									
									<!-- QUESTIONS -->
									
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
					  </tbody></table><title>Reservation confirmed</title>
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
					  



					</body></html>';
			
			try{
				sendEmail($subject, $to, $emailContent);
			}
			catch(Exception $e) {
				$to='kowaken.ghirmai@gmail.com';
				sendEmail($subject, $to, $emailContent);
			}
			
			
			$stmt->close();
			$dbCon->close();
			 return 1;
		}
		
		
	function sendPublishRequest($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			$stmt = $dbCon->prepare("select * from vitech_properties where id=? ");
			$stmt->bind_param("s", $aid);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row = $result1->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from vitech_property_address where property_id=? ");
			$stmt->bind_param("s", $aid);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$rowAddress = $result1->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from user_logins where email=? ");
			$stmt->bind_param("s", $row['owner_email']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$rowUser = $result1->fetch_assoc();
			
			$stmt = $dbCon->prepare("insert into vitech_property_publish_request (property_id,user_id) values (?,?)");
			$stmt->bind_param("si",$aid,$rowUser['id']);
			$stmt->execute();	
			
			$to=$row['owner_email'];
			$subject="Property publish request";
			$emailContent='<html xmlns="http://www.w3.org/1999/xhtml" style="background-color: rgb(240, 240, 240);" class=""><head>
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
					<style id="__web-inspector-hide-shortcut-style__">
.__web-inspector-hide-shortcut__, .__web-inspector-hide-shortcut__ *, .__web-inspector-hidebefore-shortcut__::before, .__web-inspector-hideafter-shortcut__::after
{
    visibility: hidden !important;
}
</style></head>

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
								<td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <h1 style="font-size: 33px;font-weight: 800;line-height: 30px;">Qloud ID</h1>               </td>
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
									<tbody>
									<!-- INTRO -->
									<tr>
									  <td valign="top" align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">Publish request</span>                          </td>
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
										  <span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">Property publish request</span>
										  <br>Property manager have sent a request to publish the property for renting. Click the button below to provide your consent.</div>
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
												
											  </div>
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
														<span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">'.$rowAddress["propertyType"].'</span><br>'.$rowAddress["streetAddress"].'- '.$row["areaName"].'<br>'.$rowAddress["postTown"].','.$rowAddress["zipCode"].'</td>
													  </tr>
													</tbody></table>
													<!--[if mso]></td><td><![endif]-->
													
												  </td>
												</tr>
											  </tbody></table>
											</td>
										  </tr>
										</tbody></table>
									  </td>
									</tr>
									
									
									
									
									<tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      
</table>
                  </td>
                </tr>	
									<!-- RECEIPT -->
									
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
									
									
									<tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
                      
                      
                      



<tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>

<tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody>
<tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="https://qloudid.com/public/index.php/VitechProperties/publishProperty/'.$data['pid'].'" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;">Publish property</a>                                </td>
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
									<!-- EDIT RECEIPT -->
									<!-- CANCELLATION POLICY -->
									<tr>
									  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="text text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; font-weight: 600; color: rgb(35, 35, 62);">
												Company policy
											  </div>
											</td>
										  </tr>
										  <tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
												
												<span>You can update property services provided by the company when required.</span>
											  </div>
											</td>
										  </tr>
										</tbody></table>
									  </td>
									</tr>
									<tr class="spacer">
									  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									
									<!-- QUESTIONS -->
									
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
					  </tbody></table><title>Reservation confirmed</title>
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
					  



					</body></html>';
			try{
				sendEmail($subject, $to, $emailContent);
			}
			catch(Exception $e) {
				$to='kowaken.ghirmai@gmail.com';
				sendEmail($subject, $to, $emailContent);
			}
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		
		function updatePropertyBrokerFee($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			 
			$stmt = $dbCon->prepare("select max(maximum_price) as price from vitech_property_night_pricing where property_id=? ");
			$stmt->bind_param("s", $aid);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row = $result1->fetch_assoc(); 
			if(!empty($row))
			{
				$price=$row['price'];
			}
			else
				{
				$price=100;
			}
			$sellPrice=$price+(($price*25)/100);
			
			$stmt = $dbCon->prepare("update `qloudid`.`vitech_property_pricing_detail` set owner_price_per_night=?,seller_price_per_night=?, broker_commision  =?, `seller_deposit_fee`  =?, `seller_cleaning_fee`  =?, `late_arrival_fee`  =?, `seller_security_fee`  =?, `tourist_tax`  =?, pricing_updated=1 where  `property_id`=?");
			$stmt->bind_param("iiiiiiiis",$price,$sellPrice,$_POST['broker_commision'],$_POST['seller_deposit_fee'],$_POST['seller_cleaning_fee'],$_POST['late_arrival_fee'],$_POST['seller_security_fee'],$_POST['tourist_tax'],$aid);
			$stmt->execute();	
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
	
		
		
		function updateArrivalInformation($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			 
			 
			$stmt = $dbCon->prepare("update vitech_property_pricing_detail set arrival_time  =?, departure_time  =?, owner_deposit_fee  =?, owner_cleaning_fee  =?, parking_info_detail=?,parking_fee=?, pricing_updated=1,arrival_updated=1 where  property_id=?");
			$stmt->bind_param("ssiiiis",$_POST['arrival_time'],$_POST['departure_time'],$_POST['deposit_fee'],$_POST['cleaning_fee'],$_POST['parking_info_detail'],$_POST['parking_fee'],$aid);
			$stmt->execute();	
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
	
		
		
		
		
		
	function updatePropertyPricing($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			 
			if($_POST['rent_info']==0)
			{
			$_POST['markup_info']=0;
			$_POST['share_commission_info']=0;
			$_POST['shared_commision_fee']=0;
			$_POST['commission_from_owner']=0;
			}
			$stmt = $dbCon->prepare("update `qloudid`.`vitech_property_pricing_detail` set  markup_info=?,share_commission_info=?,shared_commision_fee=?,commission_from_owner=?,rent_info=?,markup_info_updated=1  where  `property_id`=?");
			$stmt->bind_param("iiiiis",$_POST['markup_info'],$_POST['share_commission_info'],$_POST['shared_commision_fee'],$_POST['commission_from_owner'],$_POST['rent_info'],$aid);
			$stmt->execute();	
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
	function fetchPropertiesPricing($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			$stmt = $dbCon->prepare("select * from vitech_property_pricing_detail where property_id=? ");
			$stmt->bind_param("s", $aid);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row = $result1->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into vitech_property_pricing_detail (property_id) values (?)");
			$stmt->bind_param("s",$aid);
			$stmt->execute();	
			}
			$stmt = $dbCon->prepare("select * from vitech_property_pricing_detail where property_id=? ");
			$stmt->bind_param("s", $aid);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row = $result1->fetch_assoc();	
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function vitechRequestCount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			$stmt = $dbCon->prepare("select count(id) as num from vitech_property_publish_request where property_id=? ");
			$stmt->bind_param("s", $aid);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row = $result1->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
	function updateCategoryServiceTodo($data)
		{ 
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select is_selected,professional_category_id,company_id from vitech_company_selected_service_todos where id=?");
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
			$stmt = $dbCon->prepare("update vitech_company_selected_service_todos set is_selected=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$is_selected,$_POST['service_todo_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select count(id) as num from vitech_company_selected_service_todos where professional_category_id=? and is_selected=1 and company_id=?");
			$stmt->bind_param("ii",$row['professional_category_id'],$row['company_id']);
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
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update vitech_company_selected_service_todos set is_selected=1,modified_on=now() where company_id=? and professional_category_id=?");
			$stmt->bind_param("ii", $company_id,$_POST['cleaning_subcategory_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
	function serviceTodoDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from professional_service_category where vitech_category=1");
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
				$stmt = $dbCon->prepare("select count(id)as num from vitech_company_selected_service_todos where professional_category_id=? and is_selected=1 and company_id=?");
				$stmt->bind_param("ii", $row['id'],$company_id);
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
		 	$stmt = $dbCon->prepare("select vitech_company_selected_service_todos.id,is_selected,subcategory_name from vitech_company_selected_service_todos left join professional_service_subcategory on professional_service_subcategory.id=vitech_company_selected_service_todos.professional_subcategory_id where vitech_company_selected_service_todos.professional_category_id=? and vitech_company_selected_service_todos.company_id=?");
			$stmt->bind_param("ii", $row['id'],$company_id);
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
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id not in(select professional_subcategory_id from  vitech_company_selected_service_todos where company_id=?)");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			
			$stmt = $dbCon->prepare("select *  from professional_service_subcategory where id=?");
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			$rowAmenities= $result3->fetch_assoc();
			$stmt = $dbCon->prepare("insert into vitech_company_selected_service_todos ( professional_category_id,professional_subcategory_id,company_id, created_on, modified_on) values (?, ?,?, now(), now())");
			$stmt->bind_param("iii",$row['professional_category_id'],$row['id'],$company_id);
			$stmt->execute();
							
			}	
			
			$stmt = $dbCon->prepare("select count(id) as num  from vitech_company_selected_service_todos where company_id=? and is_selected=1");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			$rowAmenities= $result3->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $rowAmenities['num'];	
		}
		
		
	function displayPhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['rid']);
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			
			$stmt = $dbCon->prepare("select * from vitech_property_broker_request  where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowProperty = $result->fetch_assoc();
			$rowProperty['property_status']=$rowProperty['request_type']; 
			
			
			
			$stmt = $dbCon->prepare("select count(vitech_property_id) as num from vitech_property_photos where vitech_property_id=? and photo_type_info=?");
			$stmt->bind_param("si", $aid,$rowProperty['request_type']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($rowProperty['request_type']==3)
			{
			$stmt = $dbCon->prepare("select vitech_photo_path,sorting_number,id from vitech_property_photos where vitech_property_id=? and photo_type_info=? order by sorting_number ");
			$stmt->bind_param("si", $aid,$rowProperty['request_type']);
			}
			else
			{
			$stmt = $dbCon->prepare("select vitech_photo_path,sorting_number,id from vitech_property_photos where vitech_property_id=? and photo_type_info=? and added_by_company=? order by sorting_number ");
			$stmt->bind_param("sii", $aid,$rowProperty['request_type'],$rowProperty['company_id']);
			}
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
			 
			while($row1 = $result1->fetch_assoc())
			{
				 
				if($i==$row['num'])
				{
				$last="hidden";	
				}
				
				 $filename="../estorecss/".$row1 ['vitech_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['vitech_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['vitech_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org=$org.'<div class="target-indicator padtb10" id="'.$row1['id'].'" ondrop="drop(event)" ondragover="allowDrop(event)"></div>

						<div class="drag-drop__wrapper " draggable="true" id="drag_'.$row1['id'].'" ondragstart="drag(event,'.$row1['id'].')">
																<div class="photo-tile" style="background:transparent; border: 1px solid #353945;">
																   <div class="handlebar " style="background:#131922;">
																	  <div class="handlebar__row handlebar__top">
																		<a href="javascript:void(0);" onclick="updatePhotoDecrement('.$row1['id'].');"> <div class="handlebar__cell handlebar__arrow '.$first.' grabbable"><i class="fas fa-chevron-up fsz16" style="padding-left:10px;"></i></div>
																	  </div></a>
																	  <div class="handlebar__row handlebar__middle">
																		 <div class="handlebar__cell handlebar__grip grabbable"> </div>
																	  </div>
																	  <div class="handlebar__row handlebar__bottom">
																		<a href="javascript:void(0);" onclick="updatePhotoOrderIncreament('.$row1['id'].');"><div class="handlebar__cell handlebar__arrow '.$last.'" tabindex="0" aria-label="Move down"><i class="fas fa-chevron-down fsz16" style="padding-left:10px;"></i></div></a>
																	  </div>
																   </div>
																   <div class="photo-tile__body">
																	  <img class="photo-tile__image" src="../../../../../'.$image.'" alt="Photo 1" style="margin:20px 0px; border-radius:8px;">
																	  <div class="photo-tile__content">
																		 <div class="photo-tile__tags xs-tall ">
																			<div class="photo-tile__tags__properties hidden"><span class="tag tag--standard tag--success white_txt padrl5">High resolution</span><span class="tag tag--standard tag--neutral padrl5 lgtgrey2_bg">Landscape</span></div>
																			<div class="photo-tile__tags__labels"></div>
																		 </div>
																		 <div class="photo-tile__actions" style="flex-direction: row;">
																		<a href="javascript:void(0);" class="xsi-mart0 show_popup_modal" data-target="#gratis_popup_error" onclick="getImageInfo('.$row1['id'].');" style=" background:#23262F; border-radius:10px 0px 0px 10px;  height:40px;">	<button color="#ffffff" label="View photo" aria-label="View photo" class="merlin-button css-12d2atf" style="  background:#23262F;">
																			   <div class="merlin-button__content" style="color:#ffffff">View</div>
																			</button></a>
																			<a href="javascript:void(0);" tabindex="0" onclick="deletePhoto('.$row1['id'].');" style=" background:#23262F; border-radius:0px 10px 10px 0px;   height:40px; text-decoration:none;"><button color="#f67f00" label="View photo" aria-label="View photo" class="merlin-button css-12d2atf" style="   background:#23262F;">
																			   <div class="merlin-button__content" style="color:#f67f00">Delete</div>
																			</button></a>
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
		
		
		function listPhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['pid']);
			
			$stmt = $dbCon->prepare("select count(vitech_property_id) as num from vitech_property_photos where vitech_property_id=?");
			$stmt->bind_param("s", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select vitech_photo_path,sorting_number,id from vitech_property_photos where vitech_property_id=? order by sorting_number ");
			$stmt->bind_param("s", $aid);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$i=1;
			$org=array();
			 
			while($row1 = $result1->fetch_assoc())
			{
				 
				
				 $filename="../estorecss/".$row1['vitech_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['vitech_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['vitech_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				$row1['image_info']=$image;
				array_push($org,$row1);
			}	
			
			 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function updatePhotoDragging($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['rid']);
			
			$stmt = $dbCon->prepare("select sorting_number from vitech_property_photos where id=?");
			$stmt->bind_param("i", $_POST['draggedItem']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select sorting_number from vitech_property_photos where id=?");
			$stmt->bind_param("i", $_POST['draggedTarget']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();
			 
			if($row1['sorting_number']>$row['sorting_number'])
			{
			$stmt = $dbCon->prepare("select id,sorting_number from vitech_property_photos where sorting_number>? and id<=? and vitech_property_id=?");
			$stmt->bind_param("iis", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
			$newSort=$rowUpdate['sorting_number']-1;
			$stmt = $dbCon->prepare("update vitech_property_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			else
			{
			$stmt = $dbCon->prepare("select id,sorting_number from vitech_property_photos where sorting_number<? and id>=? and vitech_property_id=?");
			$stmt->bind_param("iis", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
				$newSort=$rowUpdate['sorting_number']+1;
			$stmt = $dbCon->prepare("update vitech_property_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			
			$stmt = $dbCon->prepare("update vitech_property_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row1['sorting_number'], $_POST['draggedItem']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function deletePhoto($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['rid']);
			
			$stmt = $dbCon->prepare("select sorting_number from vitech_property_photos where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("delete from  vitech_property_photos where id=?");
			$stmt->bind_param("i",$_POST['photoId']);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select id,sorting_number from vitech_property_photos where sorting_number>? and vitech_property_id=?");
			$stmt->bind_param("is", $row['sorting_number'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row1 = $result->fetch_assoc())	
			{
				$newSort=$row1['sorting_number']-1;
			$stmt = $dbCon->prepare("update vitech_property_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $row1['id']);
			$stmt->execute();		
			}
			 
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updatePhotoOrder($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['rid']);
			
			$stmt = $dbCon->prepare("select sorting_number from vitech_property_photos where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$newSort=$row['sorting_number']+$_POST['addDelete'];
			
			
			$stmt = $dbCon->prepare("select id from vitech_property_photos where sorting_number=? and vitech_property_id=?");
			$stmt->bind_param("is", $newSort,$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();	
			
			$stmt = $dbCon->prepare("update vitech_property_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row['sorting_number'], $row1['id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("update vitech_property_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $_POST['photoId']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function getImageInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['rid']);
			 $stmt = $dbCon->prepare("select vitech_photo_path,sorting_number,id from vitech_property_photos where id=? ");
			$stmt->bind_param("i", $_POST['update_info']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			 
			$row1 = $result1->fetch_assoc();
				 
			
				
				 $filename="../estorecss/".$row1 ['vitech_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['vitech_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image =$this-> base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['vitech_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org='<a class="lightbox__img-nav false"></a><img class="lightbox__img" src="../../../../'.$image.'">'; 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		
		
		function updatePhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['rid']);
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			
			$stmt = $dbCon->prepare("select * from vitech_property_broker_request  where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowProperty = $result->fetch_assoc();
			$rowProperty['property_status']=$rowProperty['request_type']; 
			
			$data1 = strip_tags($_POST['update_info']);
			define('UPLOAD_DIR','../estorecss/'); 
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			
			$stmt = $dbCon->prepare("select count(vitech_property_id) as num from vitech_property_photos where vitech_property_id=?");
			$stmt->bind_param("s", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$snumber=$row['num']+1;
			 
			$stmt = $dbCon->prepare("insert into vitech_property_photos (vitech_photo_path,vitech_property_id,sorting_number,added_by_company,photo_type_info) values(?, ?, ?,?,?)");
			$stmt->bind_param("ssiii",$img_name1, $aid,$snumber,$rowProperty['company_id'],$rowProperty['request_type']);
			$stmt->execute();	
				
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
			
			
			function countryList()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from phone_country_code order by country_name");
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCountries = $result->fetch_assoc())
			{
				
				array_push($org,$rowCountries);
			}
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
	
	
		function updateTaskAssignment($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			$request_id= $this -> encrypt_decrypt('decrypt',$data['request_id']); 
			$stmt = $dbCon->prepare("update vitech_property_broker_request set responsible_for_property=? where id=?");
			$stmt->bind_param("ii", $_POST['responsible_for_property'],$request_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
    
		function createUser($data)
		{
			$dbCon = AppModel::createConnection();
			$data['pcountry']=$data['country_id'];
			$data['email']=$data['owner_email'];
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
			$data['user_id1']=$stmt->insert_id;
			$stmt = $dbCon->prepare("select id from user_profiles where user_logins_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id1']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			 
			$stmt = $dbCon->prepare("INSERT INTO user_profiles (user_logins_id,phone_number) VALUES (?, ?)");
			$stmt->bind_param("is", $data['user_id1'], $data['uphno']);
			$stmt->execute();
			 
			}
			}
			else
			{
				$data['user_id1']=$row['id'];
			}
			$stmt->close();
			$dbCon->close();
			return $data['user_id1'];
			
		}
			
		function addVitechAdddress($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$property_status=$data['property_status'];
			$_POST['addrs']=htmlentities($_POST['addrs'],ENT_NOQUOTES, 'ISO-8859-1');	 
			$_POST['sell_phrase']=htmlentities($_POST['sell_phrase'],ENT_NOQUOTES, 'ISO-8859-1');
			$_POST['dcity']=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
			$_POST['detailed_description']=htmlentities($_POST['detailed_description'],ENT_NOQUOTES, 'ISO-8859-1');			
			if($_POST['contract_type']==1)
			{
			$data['user_id1']=$this->createUser($_POST);
			}
			else
			{
			$data['user_id1']=0;	
			}
			$stmt = $dbCon->prepare("select count(id) as num from vitech_properties where company_id=?");
			$stmt->bind_param("i",$company_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result(); 
			    
			$row = $result->fetch_assoc();
			$objectNumber='NS00'.($row['num']+1);
			$stmt = $dbCon->prepare("INSERT INTO `vitech_properties`(apartment_number,category_id,category_service_id,type_of_contract,responsible_for_sold,responsible_for_sell,responsible_for_rent,responsible_for_manage,added_user_id,objectNumber,`livingSpace`  , `rooms` , `areaName`  , `streetAddress`  , `shortSaleDescription` ,  `company_id`,owner_email,owner_country_phone,owner_phone,property_status) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)")  ;
			 
			$stmt->bind_param("siiiiiiiisdisssisisi",$_POST['apartment_number'],$_POST['category_id'],$_POST['subcategory_id'],$_POST['contract_type'],$data['user_id'],$data['user_id'],$data['user_id'],$data['user_id'],$data['user_id'],$objectNumber, $_POST['total_area'],$_POST['rooms_count'],$_POST['pnumber'],$_POST['addrs'],$_POST['sell_phrase'],$company_id,$_POST['owner_email'],$_POST['country_id'],$_POST['uphno'],$property_status);
            $stmt->execute();	
			$id=$stmt->insert_id;
			$data['id']= $this -> encrypt_decrypt('encrypt',$id);
			$stmt = $dbCon->prepare("update `vitech_properties` set id=? where company_property_id=?")  ;
			$stmt->bind_param("si", $id,$id);
            $stmt->execute();
			
			
			$stmt = $dbCon->prepare("update `vitech_properties` set  `property_view` =?,`property_condition`=?,`property_availability` =?,`building_class`=?,`property_furnishings` =?,`annual_community_fee` =?,`short_term_rental` =?,`short_term_commision_fee` =?,`long_term_rental` =?,`long_term_commision_fee` =?,`detailed_description`=? where id=?")  ;
			$stmt->bind_param("sssssiiiiisi",$_POST['property_view'],$_POST['property_condition'],$_POST['property_availability'],$_POST['building_class'],$_POST['property_furnishings'],$_POST['annual_community_fee'],$_POST['short_term_rental'],$_POST['short_term_commision_fee'],$_POST['long_term_rental'],$_POST['long_term_commision_fee'],$_POST['detailed_description'],$id);
            $stmt->execute();
			
			/*$stmt = $dbCon->prepare("update `vitech_properties` set owner_sell_price=?,currency_type=? where id=?")  ;
			$stmt->bind_param("iii", $_POST['sell_price'],$_POST['currency_type'],$id);
            $stmt->execute();
			if($property_status==1)
			{
			$stmt = $dbCon->prepare("update `vitech_properties` set owner_sell_price=?,owner_sell_date=? where id=?")  ;
			$stmt->bind_param("isi", $_POST['sell_price'],$_POST['sold_on'],$id);
            $stmt->execute();
			}*/
			$sdate=strtotime($_POST['start_date']);
			$edate=strtotime($_POST['end_date']);
			
			$stmt = $dbCon->prepare("insert into vitech_property_broker_request (responsible_for_property,contract_start_date,contract_end_date, `owner_id`  , `property_id`  , `company_id`  , `broker_id`  , `category_id`  , `service_id`  , `request_type`  ,contract_type_info, `created_on` ) values(?, ?,?,?, ?, ?,?, ?, ?, ?,?, now())");
			$stmt->bind_param("issisiiiiii",$data['user_id'],$sdate,$edate,$data['user_id1'],$id,$company_id,$data['user_id'],$_POST['category_id'],$_POST['subcategory_id'],$_POST['property_status'],$_POST['contract_type']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_description`( `property_id` , `sellPhrase` , `generally` , `sellingHeading` , `shortSellingDescription` , `longSellingDescription` ,company_id) values(?,?,?,?,?,?,?)")  ;
			 
			$stmt->bind_param("ssssssi", $id,$_POST['sell_phrase'],$_POST['sell_phrase'],$_POST['sell_phrase'],$_POST['sell_phrase'],$_POST['sell_phrase'],$company_id);
            $stmt->execute();
			
			 
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_address`(startingPrice,areaId, private_entrance,`property_id` , `area`  ,  `streetAddress` , `zipCode`  , `postTown`, `country`  , `province`  , `city`  ,  propertyType,company_id,vitech_region_id,vitech_city_id,vitech_area_id) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)")  ;
			 
			$stmt->bind_param("isssssssssssiiii",$_POST['sell_price'],$_POST['pnumber'],$_POST['private_entrance'], $id,$_POST['total_area'],$_POST['addrs'],$_POST['dzip'],$_POST['dcity'],$_POST['country'],$_POST['dcity'],$_POST['dcity'],$_POST['property_type'],$company_id,$_POST['vitech_region_id'],$_POST['vitech_city_id'],$_POST['vitech_area_id']);
            $stmt->execute();
			
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_interior`( numberOfBedrooms,numberOfRooms,maxNumberOfBedrooms,numberOfBathrooms,`property_id` , company_id) values(?,?,?,?,?,?)")  ;
			 
			$stmt->bind_param("iiiisi",$_POST['bedrooms_count'],$_POST['rooms_count'],$_POST['bedrooms_count'],$_POST['bathrooms_count'], $id,$company_id);
            $stmt->execute();
			
			$date=date('Y');
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_building`( buildingType,buildingYear,elevator,totalNumberFloors,floor,`property_id` , company_id) values(?,?,?,?,?,?,?)")  ;
			 
			$stmt->bind_param("sssissi",$_POST['property_type'],$date,$_POST['elevater'],$_POST['total_floor'],$_POST['total_floor'], $id,$company_id);
            $stmt->execute();
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_plot`(area,`property_id` , company_id) values(?,?,?)")  ;
			 
			$stmt->bind_param("ssi",$_POST['total_area'], $id,$company_id);
            $stmt->execute();
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_distance`(`property_id` , company_id) values(?,?)")  ;
			 
			$stmt->bind_param("si",$id,$company_id);
            $stmt->execute();
			
			$stmt = $dbCon->prepare("insert into vitech_property_pricing_detail (property_id) values (?)");
			$stmt->bind_param("s",$id);
			$stmt->execute();	
			
			
			$stmt = $dbCon->prepare("select company_name from companies where id=?");
			$stmt->bind_param("i",$company_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			 
			$row = $result->fetch_assoc();
			if($_POST['contract_type']==1)
			{
				$to=$_POST['owner_email'];
			$subject="Property management request";
			$emailContent='<html xmlns="http://www.w3.org/1999/xhtml" style="background-color: rgb(240, 240, 240);" class=""><head>
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
					<style id="__web-inspector-hide-shortcut-style__">
.__web-inspector-hide-shortcut__, .__web-inspector-hide-shortcut__ *, .__web-inspector-hidebefore-shortcut__::before, .__web-inspector-hideafter-shortcut__::after
{
    visibility: hidden !important;
}
</style></head>

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
								<td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <h1 style="font-size: 33px;font-weight: 800;line-height: 30px;">Qloud ID</h1>               </td>
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
									<tbody>
									<!-- INTRO -->
									<tr>
									  <td valign="top" align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">Property request</span>                          </td>
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
										  <span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">Property management request</span>
										  <br>'.$row['company_name'].' have added a property for you. Please verify the detail below and confirmthe connection.</div>
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
												
											  </div>
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
														<span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">'.$_POST["property_type"].'</span><br>'.$_POST["addrs"].'- '.$_POST["pnumber"].'<br>'.$_POST["dcity"].','.$_POST["dzip"].'</td>
													  </tr>
													</tbody></table>
													<!--[if mso]></td><td><![endif]-->
													
												  </td>
												</tr>
											  </tbody></table>
											</td>
										  </tr>
										</tbody></table>
									  </td>
									</tr>
									
									
									
									
									<tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      
</table>
                  </td>
                </tr>	
									<!-- RECEIPT -->
									
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
									
									
									<tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
                      
                      
                      



<tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>

<tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody>
<tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="https://qloudid.com/user/index.php/VitechProperties/listPropertyRequest" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;">Connect with property</a>                                </td>
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
									<!-- EDIT RECEIPT -->
									<!-- CANCELLATION POLICY -->
									<tr>
									  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="text text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; font-weight: 600; color: rgb(35, 35, 62);">
												Company policy
											  </div>
											</td>
										  </tr>
										  <tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
												
												<span>You can update property services provided by hte company when required.</span>
											  </div>
											</td>
										  </tr>
										</tbody></table>
									  </td>
									</tr>
									<tr class="spacer">
									  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									
									<!-- QUESTIONS -->
									
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
					  </tbody></table><title>Reservation confirmed</title>
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
					  



					</body></html>';
			try{
				sendEmail($subject, $to, $emailContent);
			}
			catch(Exception $e) {
				$to='kowaken.ghirmai@gmail.com';
				sendEmail($subject, $to, $emailContent);
			}
			}
			
			
			$stmt->close();
			$dbCon->close();
			return $data['id'];
			
			
		}
		
		
		function updateVitechAdddressContractInforamtion($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			$request_id= $this -> encrypt_decrypt('decrypt',$data['request_id']);
			$fetchPropertyTaskInfo    = $this->fetchPropertyTaskInfo($data);	
			
			$_POST['first_name']=htmlentities($_POST['first_name'],ENT_NOQUOTES, 'ISO-8859-1');	 
			$_POST['last_name']=htmlentities($_POST['last_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$data['user_id1']=$this->createUser($_POST);
			if($_POST['contract_type']==1)
			{
			if($fetchPropertyTaskInfo['owner_email']==null || $fetchPropertyTaskInfo['owner_email']=='')
			{
			
			$stmt = $dbCon->prepare("update `vitech_properties` set  `owner_email`=?  , `owner_country_phone` =?, `owner_phone`=?  , `type_of_contract` =1 where id=?")  ;
			 
			$stmt->bind_param("sssi", $_POST['owner_email'],$_POST['country_id'],$_POST['uphno'],$property_id);
            $stmt->execute();		
			}
			else
			{
			$stmt = $dbCon->prepare("update `vitech_properties` set  `type_of_contract` =1 where id=?")  ;
			$stmt->bind_param("i",$property_id);
            $stmt->execute();
			}	
			}
			else
			{
			$stmt = $dbCon->prepare("update `vitech_properties` set  `type_of_contract` =2 where id=?")  ;
			$stmt->bind_param("i",$property_id);
            $stmt->execute();	
			}	
			
			if($fetchPropertyTaskInfo['owner_phone']==null || $fetchPropertyTaskInfo['owner_phone']=='')
			{
			$stmt = $dbCon->prepare("update `vitech_properties` set   `owner_country_phone` =?, `owner_phone`=? where id=?")  ;
			 
			$stmt->bind_param("ssi", $_POST['country_id'],$_POST['uphno'],$property_id);
            $stmt->execute();
			}
			
			$sdate=strtotime($_POST['start_date']);
			$edate=strtotime($_POST['end_date']);
			
			//echo $sdate.' '.$edate; die;
			$stmt = $dbCon->prepare("update `vitech_property_broker_request` set  `contract_type_info` =?,is_approved=0,contract_start_date=?,contract_end_date=?,owner_id=? where id=?")  ;
			$stmt->bind_param("iiiii",$_POST['contract_type'],$sdate,$edate,$data['user_id1'],$request_id);
            $stmt->execute();	
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		function updateVitechAdddressinforamtion($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			$property_status=$_POST['property_status'];
			$_POST['addrs']=htmlentities($_POST['addrs'],ENT_NOQUOTES, 'ISO-8859-1');	 
			$_POST['sell_phrase']=htmlentities($_POST['sell_phrase'],ENT_NOQUOTES, 'ISO-8859-1');
			$_POST['dcity']=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');	
			$_POST['detailed_description']=htmlentities($_POST['detailed_description'],ENT_NOQUOTES, 'ISO-8859-1'); 
			    
			 
			$stmt = $dbCon->prepare("update `vitech_properties` set  `livingSpace`=?  , `rooms` =?, `areaName`=?  , `streetAddress` =? , `shortSaleDescription`=?  where id=?")  ;
			 
			$stmt->bind_param("disssi", $_POST['total_area'],$_POST['rooms_count'],$_POST['pnumber'],$_POST['addrs'],$_POST['sell_phrase'],$property_id);
            $stmt->execute();	
			$id=$property_id;
			
			$stmt = $dbCon->prepare("update `vitech_properties` set  `property_view` =?,`property_condition`=?,`property_availability` =?,`building_class`=?,`property_furnishings` =?,`annual_community_fee` =?,`short_term_rental` =?,`short_term_commision_fee` =?,`long_term_rental` =?,`long_term_commision_fee` =?,`detailed_description`=?,owner_sell_price=?,currency_type=? where id=?")  ;
			$stmt->bind_param("sssssiiiiisiii",$_POST['property_view'],$_POST['property_condition'],$_POST['property_availability'],$_POST['building_class'],$_POST['property_furnishings'],$_POST['annual_community_fee'],$_POST['short_term_rental'],$_POST['short_term_commision_fee'],$_POST['long_term_rental'],$_POST['long_term_commision_fee'],$_POST['detailed_description'],   $_POST['sell_price'], $_POST['currency_type'],$id);
            $stmt->execute();
			
			 
			  
			if($property_status==1)
			{
			$stmt = $dbCon->prepare("update `vitech_properties` set owner_sell_price=?,owner_sell_date=? where id=?")  ;
			$stmt->bind_param("isi", $_POST['sell_price'],$_POST['sold_on'],$id);
            $stmt->execute();
			}
			
			$stmt = $dbCon->prepare("update `vitech_property_description` set  sellPhrase=? , generally =?, sellingHeading =?,shortSellingDescription=? where property_id=?")  ;
			 
			$stmt->bind_param("sssss",$_POST['sell_phrase'],$_POST['sell_phrase'],$_POST['sell_phrase'],$_POST['sell_phrase'],$id);
            $stmt->execute();
			
			 
			 
			$stmt = $dbCon->prepare("update vitech_property_address set startingPrice=?,areaId=?, private_entrance=?, area=?  ,  streetAddress=? , zipCode =? , postTown=?, country =? , province =? , city=?  ,  propertyType=? where  property_id=?")  ;
			 
			$stmt->bind_param("isssssssssss",$_POST['sell_price'],$_POST['pnumber'],$_POST['private_entrance'],$_POST['total_area'],$_POST['addrs'],$_POST['dzip'],$_POST['dcity'],$_POST['country'],$_POST['dcity'],$_POST['dcity'],$_POST['property_type'], $id);
            $stmt->execute();
			
			
			$stmt = $dbCon->prepare("update vitech_property_interior set numberOfBedrooms=?,numberOfRooms=?,maxNumberOfBedrooms=?,numberOfBathrooms=? where property_id=?")  ;
			 
			$stmt->bind_param("iiiis",$_POST['bedrooms_count'],$_POST['rooms_count'],$_POST['bedrooms_count'],$_POST['bathrooms_count'], $id);
            $stmt->execute();
			
			 
			$stmt = $dbCon->prepare("update vitech_property_building set buildingType=?,elevator=?,totalNumberFloors=?,floor=? where property_id=?")  ;
			 
			$stmt->bind_param("ssiss",$_POST['property_type'],$_POST['elevater'],$_POST['total_floor'],$_POST['total_floor'], $id);
            $stmt->execute();
			
			$stmt = $dbCon->prepare("update vitech_property_plot set area=? where property_id=?")  ;
			 
			$stmt->bind_param("ss",$_POST['total_area'], $id);
            $stmt->execute();
			
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		function reserveVitechAdddress($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			 
			$_POST['first_name']=htmlentities($_POST['first_name'],ENT_NOQUOTES, 'ISO-8859-1');	
			$_POST['last_name']=htmlentities($_POST['last_name'],ENT_NOQUOTES, 'ISO-8859-1');	
			$rowAddress=$this->fetchPropertiesAddress($data);
			$stmt = $dbCon->prepare("select * from companies where id=?");
			$stmt->bind_param("i",$company_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result(); 
			$rowCompany = $result->fetch_assoc();
			
			$rowUser = $this->userSummary($data);
			
			$stmt = $dbCon->prepare("select * from vitech_properties where id=?");
			$stmt->bind_param("s",$property_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result(); 
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_reservation_detail`(reservation_fixed_by,vitech_primary_id, selling_price, currency_id, reserved_till_date, buyer_first_name, buyer_last_name, buyer_email, reservation_fee, buyer_country_id, buyer_phone_number, created_on) values(?,?,?,?,?,?,?,?,?,?,?,now())")  ;
			 
			$stmt->bind_param("iiiissssiis",$data['user_id'],$row['company_property_id'], $_POST['sell_price'],$_POST['currency_type'],$_POST['sold_on'],$_POST['first_name'],$_POST['last_name'],$_POST['owner_email'],$_POST['reservation_fee'],$_POST['country_id'],$_POST['uphno']);
            $stmt->execute();
			
			$id=$stmt->insert_id;
			$data['domain_id']=$this->encrypt_decrypt('encrypt',0);
			$data['verification_id']=$this->encrypt_decrypt('encrypt',$id);
			 $stmt = $dbCon->prepare("update vitech_properties set is_reserved=1,reservation_id=? where id=?");
			$stmt->bind_param("is",$id,$property_id);
			/* bind parameters for markers */
			$stmt->execute();
			
			$to=$_POST['owner_email'];
			$subject='Confirmation of Property Reservation - '.$rowAddress['streetAddress'];
			$emailContent='<html><head></head><body><table width="100%" cellpadding="0" cellspacing="0" style="color:rgb(51,51,51);font-family:Helvetica;font-size:12px;font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:start;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;text-decoration:none;border-collapse:collapse;width:806px;margin:0px;padding:0px;background-color:rgb(245,243,235)"><tbody><tr><td align="center" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif"><table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;width:806px;margin:0px;padding:0px"><tbody><tr><td width="100%" cellpadding="5" cellspacing="0" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;padding:10px 0px"><table align="center" width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse"><tbody><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;text-align:center;font-size:12px;color:rgb(169,166,150)"></td></tr></tbody></table></td></tr><tr><td width="100%" cellpadding="0" cellspacing="0" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif"><table align="center" width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse;background-color:rgb(255,255,255)"><tbody><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;background-color:rgb(255,222,0);text-align:center;padding:30px 0px"><a href="https://click.pstmrk.it/3s/postmarkapp.com/I54/omO0AQ/AQ/fc4996d3-c38b-4eb4-87c4-96e57759d663/1/XpxyQPwh_w" style="color:rgb(0,123,200);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/postmarkapp.com/I54/omO0AQ/AQ/fc4996d3-c38b-4eb4-87c4-96e57759d663/1/XpxyQPwh_w&amp;source=gmail&amp;ust=1713493741023000&amp;usg=AOvVaw1MYeBmb0BG5q1w3tLZOrYV"><img label="Logo" src="https://ci3.googleusercontent.com/meips/ADKq_NYdFirJRDQzgqhjdT59ek4mTs8iK7-nx1SG2xQIVeqQG-2IK4X5jE7Ncx8U0_71FgTwvZejIXF-YhZC2LAUeclJcPoWIlDrmwMRxJH6T1iU9ZiUkic=s0-d-e1-ft#https://newsletter.postmarkapp.com/assets/images/pm_logo@2x.png" width="200" alt="ActiveCampaign Postmark" style="border:none;vertical-align:middle" class="CToWUd" data-bit="iit"></a></td></tr>

<tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;padding:50px;background-color:rgb(255,255,255)"><h1 style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;margin:0px 0px 15px;color:rgb(51,51,51);font-weight:bold;font-size:21px;text-align:left">Hi '.$_POST['first_name'].'<img data-emoji="??" class="an1" alt="??" aria-label="??" draggable="false" src="https://fonts.gstatic.com/s/e/notoemoji/15.0/1f44b/72.png" loading="lazy" style="width:24px;"></h1><div>

<p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:24px;text-align:left;margin-top:0px;margin-bottom:25px;color:rgb(51,51,51);font-size:15px">We are thrilled to inform you that your reservation for the property located at '.$rowAddress['streetAddress'].' has been successfully processed. Congratulations on taking this exciting step towards owning your dream property!

<span> </span>.</p>

<p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:24px;text-align:left;margin-top:0px;margin-bottom:25px;color:rgb(51,51,51);font-size:15px">Here are the details of your reservation:


<span> </span>.</p>

<p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:24px;text-align:left;margin-top:0px;margin-bottom:25px;color:rgb(51,51,51);font-size:15px">Property Address: '.$rowAddress['streetAddress'].'

<span> </span>.</p>

<p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:24px;text-align:left;margin-top:0px;margin-bottom:25px;color:rgb(51,51,51);font-size:15px">Reservation Date: '.date('Y-m-d').'

<span> </span>.</p>

<p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:24px;text-align:left;margin-top:0px;margin-bottom:25px;color:rgb(51,51,51);font-size:15px">Reservation Amount: '.$_POST['reservation_fee'].'

<span> </span>.</p>

<p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:24px;text-align:left;margin-top:0px;margin-bottom:25px;color:rgb(51,51,51);font-size:15px">Please review the details above to ensure accuracy. If you have any questions or require further assistance, feel free to reach out to our team at +'.$rowUser['country_code'].' '.$rowUser['phone_number'].'.

<span> </span>.</p>

<p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:24px;text-align:left;margin-top:0px;margin-bottom:25px;color:rgb(51,51,51);font-size:15px">To confirm your reservation and proceed with the next steps, please click the button below:


<span> </span>.</p><div style="margin-bottom:25px"><a href="https://www.qloudid.com/public/index.php/UserCompanySignUp/sendOtpToBuyer/'.$data['domain_id'].'/'.$data['domain_id'].'/'.$data['verification_id'].'" style="color:rgb(255,255,255);text-decoration:none;box-sizing:border-box;border-width:10px 18px;border-style:solid;border-color:rgb(0,123,200);background-color:rgb(0,123,200);font-size:14px;display:inline-block;height:auto;border-radius:3px;text-align:center;font-weight:bold;padding:5px 10px;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.qloudid.com/public/index.php/UserCompanySignUp/signUpEmailInfo/V2l1eVdrVFdnKzZTQTgzRy96RXEzQT09 ">Confirm and verify your detail</a></div><div style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:24px;text-align:left;margin-top:0px;color:rgb(51,51,51);font-size:15px;margin-bottom:0px!important"><p>Thank you for choosing to work with us. We are committed to providing you with exceptional service throughout the entire purchasing process.


</p>Best regards,

<span> </span><span> </span>

<p>'.$rowUser['name'].'

</p>
<p>'.$rowCompany['company_name'].'
</p>

</div></div></td></tr></tbody></table><table align="center" width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse;background-color:rgb(255,222,0);color:rgb(39,39,39)!important"><tbody><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;padding:50px 50px 0px;background-color:rgb(255,222,0)"><h1 style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;margin:0px 0px 15px;font-weight:bold;font-size:21px;text-align:left;color:rgb(39,39,39)!important">Other things to know</h1><div><h2 style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;margin-top:1.333em;font-weight:bold;font-size:18px;text-align:left;margin-bottom:0.666em;color:rgb(39,39,39)!important"><img src="https://ci3.googleusercontent.com/meips/ADKq_NYq2PgPv_6KU0rCQGUwQpIuPzMHasrPm3Bm5F5GfeYfn6tWKk9iQh_wlvBHS1xBHhpfssfJaccnV6dPSXLv9XR5RDfr1Vv6-dr_6fUAZiI0t6iGyIwTkZ-QP-8E=s0-d-e1-ft#https://newsletter.postmarkapp.com/assets/images/icon-test-mode@2x.png" alt="" width="18" height="18" style="margin-right:2px" class="CToWUd" data-bit="iit"><span>&nbsp;</span>Test mode and requesting account approval</h2><p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:24px;text-align:left;margin-top:0px;margin-bottom:25px;font-size:15px;color:rgb(39,39,39)!important">Your account is currently in test mode. That allows you to get familiar with Postmark, and<span>&nbsp;</span><strong style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif">send up to 100 emails to domains that you’ve verified.</strong>Once you’re ready to send emails to others, we’ll need to approve your account. Why? Reviewing each account helps us tell the<span>&nbsp;</span><a href="https://postmarkapp.com/support/article/1082-what-types-of-messages-are-a-good-fit-for-postmark?utm_source=pm_onboarding&amp;utm_medium=email&amp;utm_campaign=2110_onboarding" style="color:rgb(0,94,153);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://postmarkapp.com/support/article/1082-what-types-of-messages-are-a-good-fit-for-postmark?utm_source%3Dpm_onboarding%26utm_medium%3Demail%26utm_campaign%3D2110_onboarding&amp;source=gmail&amp;ust=1713578252654000&amp;usg=AOvVaw0CG_6cwWiQF_2r5PjsW26Y">responsible senders</a><span>&nbsp;</span>(that’s you!) apart from the spammers (boo!), so we can maintain our stellar deliverability rates for all customers. So whenever you’re ready,<span>&nbsp;</span><a href="https://account.postmarkapp.com/account_approval/apply" style="color:rgb(0,94,153);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://account.postmarkapp.com/account_approval/apply&amp;source=gmail&amp;ust=1713578252654000&amp;usg=AOvVaw06OBKYFhPTw5XMftmhKGaQ">submit an approval request</a>.</p><h2 style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;margin-top:1.333em;font-weight:bold;font-size:18px;text-align:left;margin-bottom:0.666em;color:rgb(39,39,39)!important"><img src="https://ci3.googleusercontent.com/meips/ADKq_Nbrd0cZRFFzQiVERmldeUsggD54HKSjr97Xj5vWhYkUyzFHBGxgeBNZPwCYIO0AjY5rQDCtZE2k-EJTz9BlknDytN6qN9Wglwb8ZwWGHRE6gZK9FKd69Zl7HqbvrAA=s0-d-e1-ft#https://newsletter.postmarkapp.com/assets/images/icon-get-started@2x.png" alt="" width="18" height="18" style="margin-right:2px" class="CToWUd" data-bit="iit"><span>&nbsp;</span>Handy resources to help you get started</h2><p style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:24px;text-align:left;margin-top:0px;margin-bottom:25px;font-size:15px;color:rgb(39,39,39)!important">Check out our easy-to-follow<span>&nbsp;</span><a href="https://postmarkapp.com/manual?utm_source=pm_onboarding&amp;utm_medium=email&amp;utm_campaign=2110_onboarding" style="color:rgb(0,94,153);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://postmarkapp.com/manual?utm_source%3Dpm_onboarding%26utm_medium%3Demail%26utm_campaign%3D2110_onboarding&amp;source=gmail&amp;ust=1713578252654000&amp;usg=AOvVaw1kqvQ5uN8D6z3MX4OYETPM">getting started guides</a><span>&nbsp;</span>and detailed<span>&nbsp;</span><a href="https://postmarkapp.com/developer?utm_source=pm_onboarding&amp;utm_medium=email&amp;utm_campaign=2110_onboarding" style="color:rgb(0,94,153);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://postmarkapp.com/developer?utm_source%3Dpm_onboarding%26utm_medium%3Demail%26utm_campaign%3D2110_onboarding&amp;source=gmail&amp;ust=1713578252654000&amp;usg=AOvVaw12NlHIMjaaaYAUStModOdx">developer docs</a><span>&nbsp;</span>to get set up in Postmark. Still need help? Our Customer Success team is<span>&nbsp;</span><a href="https://twitter.com/nckrtl/status/1377714048364597250" style="color:rgb(0,94,153);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://twitter.com/nckrtl/status/1377714048364597250&amp;source=gmail&amp;ust=1713578252654000&amp;usg=AOvVaw101emP5hRHmoClsAaDnbxj">pretty</a><span>&nbsp;</span><a href="https://twitter.com/garrettdimon/status/1390489002801782786" style="color:rgb(0,94,153);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://twitter.com/garrettdimon/status/1390489002801782786&amp;source=gmail&amp;ust=1713578252654000&amp;usg=AOvVaw1HhLK592C4wLEzDCw4ylPk">darn</a><span>&nbsp;</span><a href="https://twitter.com/dixpac/status/1390587202191699970" style="color:rgb(0,94,153);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://twitter.com/dixpac/status/1390587202191699970&amp;source=gmail&amp;ust=1713578252654000&amp;usg=AOvVaw0SJwwZy4VmW0zm5GXLiZoq">great</a>, so just reply to this message if you have any questions.</p><div style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:24px;text-align:left;margin-top:0px;font-size:15px;margin-bottom:0px!important;color:rgb(39,39,39)!important">Happy sending,<br>The Postmark Team</div></div><div style="margin-top:50px;text-align:center"><img src="https://ci3.googleusercontent.com/meips/ADKq_NafQzHg7FrvW-wMBmxDfvRvDPA_kAe3gisUl9M-CyZAlwd6WRweAY4C1AOUWB13sQAoviKHcPuMnEv7yuj66TVWmuf4afj2dHvhcvlIuyUfAB0kvZNQm8IKCain=s0-d-e1-ft#https://newsletter.postmarkapp.com/assets/images/signup-machine@2x.png" alt="" width="461.5" height="243" style="vertical-align:middle" class="CToWUd a6T" data-bit="iit" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 0.01; left: 633.234px; top: 1480.28px;"><span data-is-tooltip-wrapper="true" class="a5q" jsaction="JIbuQc:.CLIENT"><button class="VYBDae-JX-I VYBDae-JX-I-ql-ay5-ays CgzRE" jscontroller="PIVayb" jsaction="click:h5M12e; clickmod:h5M12e;pointerdown:FEiYhc;pointerup:mF5Elf;pointerenter:EX0mI;pointerleave:vpvbp;pointercancel:xyn4sd;contextmenu:xexox;focus:h06R8; blur:zjh6rb;mlnRJb:fLiPzd;" data-idom-class="CgzRE" jsname="hRZeKc" aria-label="Download attachment " data-tooltip-enabled="true" data-tooltip-id="tt-c85" data-tooltip-classes="AZPksf" id="" jslog="91252; u014N:cOuCgd,Kr2w4b,xr6bB; 4:WyIjbXNnLWY6MTc5NjcyNjQwMjk4MjM0NTczNiJd; 43:WyJpbWFnZS9qcGVnIl0."><span class="OiePBf-zPjgPe VYBDae-JX-UHGRz"></span><span class="bHC-Q" data-unbounded="false" jscontroller="LBaJxb" jsname="m9ZlFb" soy-skip="" ssk="6:RWVI5c"></span><span class="VYBDae-JX-ank-Rtc0Jf" jsname="S5tZuc" aria-hidden="true"><span class="bzc-ank" aria-hidden="true"><svg height="20" viewBox="0 -960 960 960" width="20" focusable="false" class=" aoH"><path d="M480-336 288-528l51-51 105 105v-342h72v342l105-105 51 51-192 192ZM263.717-192Q234-192 213-213.15T192-264v-72h72v72h432v-72h72v72q0 29.7-21.162 50.85Q725.676-192 695.96-192H263.717Z"></path></svg></span></span><div class="VYBDae-JX-ano"></div></button><div class="ne2Ple-oshW8e-J9" id="tt-c85" role="tooltip" aria-hidden="true">Download</div></span></div></div></td></tr><tr><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;padding:10px 50px;background-color:rgb(53,57,66);color:rgb(255,255,255);border-top-width:0px"><div style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:24px;text-align:center;margin:0px;color:rgb(53,57,66);font-size:14px"><img data-emoji="??" class="an1" alt="??" aria-label="??" draggable="false" src="https://fonts.gstatic.com/s/e/notoemoji/15.0/1f48c/72.png" loading="lazy"><span>&nbsp;</span><a href="https://postmarkapp.com/newsletter" style="color:rgba(255,255,255,0.5);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://postmarkapp.com/newsletter&amp;source=gmail&amp;ust=1713578252654000&amp;usg=AOvVaw0jUhYtnjc-UpK__nuM8iMz">Subscribe to the Postmark newsletter</a></div></td></tr><tr style="padding:0px 50px;background-color:rgb(245,243,235);color:rgb(255,255,255)"><td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;padding:25px 0px"><div style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;line-height:24px;text-align:center;margin:0px;color:rgb(169,166,150);font-size:14px"><a href="https://activecampaign.com/" style="color:rgb(169,166,150);text-decoration:underline;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://activecampaign.com/&amp;source=gmail&amp;ust=1713578252654000&amp;usg=AOvVaw2s1Vhu798w4qnmBaf8YYYA">ActiveCampaign LLC</a>, 1 North Dearborn St, 5th Floor, Chicago, IL 60602</div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></body></html>';
			try{
				sendEmail($subject, $to, $emailContent);
			}
			catch(Exception $e) {
				$to='kowaken.ghirmai@gmail.com';
				sendEmail($subject, $to, $emailContent);
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function updateSoldVitechAdddress($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			
			$stmt = $dbCon->prepare("select * from vitech_properties where id=?");
			$stmt->bind_param("s",$property_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result(); 
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select first_name,email,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id=?");
			$stmt->bind_param("i",$data['user_id']);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result(); 
			$rowBroker = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from companies where id=?");
			$stmt->bind_param("i",$company_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result(); 
			$rowCompany = $result->fetch_assoc();
			
			$data['verification_id']= $this -> encrypt_decrypt('encrypt',$row['reservation_id']);
			
			$stmt = $dbCon->prepare("update `vitech_property_reservation_detail` set paid_on=?,move_out_date=?,move_in_date=?,payment_option=? where id=?")  ;
			$stmt->bind_param("sssis",$_POST['sold_on'],$_POST['move_out_date'],$_POST['move_in_date'],$_POST['payment_option'],$row['reservation_id']);
            $stmt->execute();
			
			$stmt = $dbCon->prepare("update vitech_properties set property_status=1,is_reserved=2 where id=?");
			$stmt->bind_param("s",$property_id);
			/* bind parameters for markers */
			$stmt->execute();
			 
			$stmt = $dbCon->prepare("select * from user_logins where email=?");
			$stmt->bind_param("s",$row['owner_email']);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result(); 
			$rowOwner = $result->fetch_assoc();
			$to=$row['owner_email'];
			$subject='Share Your Experience with '.$rowBroker['first_name'];
			 
			$emailContent='<html><head></head><body>


<table border="0" cellpadding="0" cellspacing="0" role="presentation" width="600" align="center" bgcolor="#FEFEFE" style="margin:0px auto;padding:0px;border:0px;border-collapse:collapse;width:600px;background-color:#000000"><tbody><tr><td align="left" valign="top" style="padding-left:20px;padding-right:20px;text-align:left;vertical-align:top"><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td style="padding-left:20px;padding-right:20px"><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td align="left"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse"><tbody><tr><td valign="middle" style="font-size:20px;line-height:20px;font-weight:bold;vertical-align:middle"><a href="http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw3Fdh_8slomy-uTKO2Dq10h"><img src="https://www.qloudid.com/html/usercontent/images/clubtxp/logo.jpeg" alt="Klarna." width="98" height="98" border="0" style="display:block;outline:0px;width:98px;height:98px" class="CToWUd" data-bit="iit"></a></td></tr></tbody></table></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><h1 style="font-family:&quot;Klarna Display&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:36px;line-height:40px">Dear '.$rowOwner['first_name'].'</h1><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">I hope this message finds you well. It was a pleasure working with you on the sale of your property at '.$row['streetAddress'].'. Your satisfaction is very important to us, and we value your feedback.</div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">We would greatly appreciate it if you could take a few moments to share your experience by leaving a review. Your feedback not only helps us improve our services but also assists other homeowners in making informed decisions.</div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Please click the link below to leave your review:</div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px"><b>https://www.qloudid.com/public/index.php/UserCompanySignUp/sellerReviewInformation/'.$data['verification_id'].'</b></div>

<table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table>
<div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Thank you for choosing [Broker Name] for your real estate needs. If you have any further questions or need assistance, please don’t hesitate to reach out.</div></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td style="padding-left:20px;padding-right:20px"><h2 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:27px;line-height:30px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Best regards,</font></font></h2><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td><h3 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:19px;line-height:25px">'.$rowBroker['first_name'].'</h3><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="5" style="font-size:5px;line-height:5px;height:5px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px"><a href="http://click.klarna.es/f/a/Fr0UR8yR1Q7pXm9FR-8wng~~/AABVuwA~/RgRoNYYFP0QuaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9lcy9hdGVuY2lvbi1hbC1jbGllbnRlL1cFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;text-decoration:underline!important" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/Fr0UR8yR1Q7pXm9FR-8wng~~/AABVuwA~/RgRoNYYFP0QuaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9lcy9hdGVuY2lvbi1hbC1jbGllbnRlL1cFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw3S2E-PheN6wUGeLVEcBolo">Employee</a></div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><h3 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:19px;line-height:25px">'.$rowCompany['company_name'].'</h3><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="5" style="font-size:5px;line-height:5px;height:5px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">'.$rowBroker['phone_number'].'</div></td></tr></tbody></table></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td style="padding-left:20px;padding-right:20px"><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="1" style="font-size:1px;line-height:1px;height:1px;background-color:rgb(238,238,238)">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse"><tbody><tr><td align="center" width="40" height="40" style="padding-right:5px"><a href="http://click.klarna.es/f/a/kBBj1AYp9jgiYKUYjz0LTA~~/AABVuwA~/RgRoNYYFP0QhaHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS9rbGFybmEvVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/kBBj1AYp9jgiYKUYjz0LTA~~/AABVuwA~/RgRoNYYFP0QhaHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS9rbGFybmEvVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw0uXWSCGG_grCLULW_dUVpd"><img src="https://ci3.googleusercontent.com/meips/ADKq_NbVH5I-tVL_aM-mt5JYLNklwUOCIxdpnGRWqh5oAERsamtp3mBW0EIIPWrivA4cLCKGknedoP3XF-sX6eKn1PRq4G0m5Svq060Ak-6lDpxzEoETv7tPVOyjvP654ogFRsQPhsZDoi7DYTDjerIsZMlXhNTw=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/lollipop/icons/footer/instagram.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40" style="padding-right:5px"><a href="http://click.klarna.es/f/a/szXxBZl_bjIkVNnJ9T0KWA~~/AABVuwA~/RgRoNYYFP0QeaHR0cHM6Ly93d3cudGlrdG9rLmNvbS9Aa2xhcm5hVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/szXxBZl_bjIkVNnJ9T0KWA~~/AABVuwA~/RgRoNYYFP0QeaHR0cHM6Ly93d3cudGlrdG9rLmNvbS9Aa2xhcm5hVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw37Rvp9S1T076Vx8sub7B4g"><img src="https://ci3.googleusercontent.com/meips/ADKq_Nb-5o3UYndP1zOh4Ej9HOQLv9y8p_iqPAEpko-6Ou2V8py_CzvVkf_flYetPmki20CvUnvqz-O5yqRPdjkaYJghmu9R7MmnL6wLW_r2hopYylQjR89DwLCmlRfgWNkrZBMHcHoPjqsYI7QQnVnTR3Uk=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.12/comms-platform/lollipop/icons/footer/tiktok.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40" style="padding-right:5px"><a href="http://click.klarna.es/f/a/aXJjQkBm9hMbJGgg_Ulg5g~~/AABVuwA~/RgRoNYYFP0QnaHR0cHM6Ly93d3cubGlua2VkaW4uY29tL2NvbXBhbnkva2xhcm5hVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/aXJjQkBm9hMbJGgg_Ulg5g~~/AABVuwA~/RgRoNYYFP0QnaHR0cHM6Ly93d3cubGlua2VkaW4uY29tL2NvbXBhbnkva2xhcm5hVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw3HNtBaRVhrbuQ7LybNdxsc"><img src="https://ci3.googleusercontent.com/meips/ADKq_Narh5WtNTQVK0ecV0Bkk2cxukxXzkc15Xo_bWiZD1L8xWKIslwqr-opbo414kzX8GL0q90xvuLcT2ynanniooJyvnBwHIJI0Fgp82_6IgyDmim0pBamR8tMZE3e8eP5pmKMDtQARu_zQYy7Ds4jMWvLdTY=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/lollipop/icons/footer/linkedin.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40" style="padding-right:5px"><a href="http://click.klarna.es/f/a/OWr5Q8XkPBQYIwoYsCdeDA~~/AABVuwA~/RgRoNYYFP0QaaHR0cHM6Ly90d2l0dGVyLmNvbS9LbGFybmFXBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/OWr5Q8XkPBQYIwoYsCdeDA~~/AABVuwA~/RgRoNYYFP0QaaHR0cHM6Ly90d2l0dGVyLmNvbS9LbGFybmFXBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw1aQS7b5ENj7MttadKGvEIe"><img src="https://ci3.googleusercontent.com/meips/ADKq_Na0Bikraixp5WMdKm0lV_f2hcw_zD3RYBpjVKvnPt-TjOxopC06s2v0iBEPCKGBo8eGlM-6gn_gzKQS9IhNaN_LqgRYC9zofUoPzHifG-4EflMD0jWffSZ7o5VEx2rnk2Vjj84ZbtLtbrFojg=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/lollipop/icons/footer/x.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40" style="padding-right:5px"><a href="http://click.klarna.es/f/a/mTv8X7Ll9HJv_kuhWaOi5g~~/AABVuwA~/RgRoNYYFP0QfaHR0cHM6Ly93d3cuZmFjZWJvb2suY29tL0tsYXJuYVcFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/mTv8X7Ll9HJv_kuhWaOi5g~~/AABVuwA~/RgRoNYYFP0QfaHR0cHM6Ly93d3cuZmFjZWJvb2suY29tL0tsYXJuYVcFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw22VCmNVXx8oiKpHRcSXC2q"><img src="https://ci3.googleusercontent.com/meips/ADKq_NZeVlLBwVC5BhHnilPrDenr4aSamGC_P59GTJ-fhhZxSpfSXN171N_R5PVhqtFjEfkqzqZ7kFqEesGKu4--hKiY2HY01r2LZqWxIcXIuTMJYcD4_WBbKaNFd7TBvNhPiHWH8nBeRi8Gp1uGH5fnZ4nGxAk=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/lollipop/icons/footer/facebook.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40"><a href="http://click.klarna.es/f/a/m8HHr_sT10BssSdRMkvJPw~~/AABVuwA~/RgRoNYYFP0QmaHR0cHM6Ly93d3cueW91dHViZS5jb20vS2xhcm5hT2ZmaWNpYWxXBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/m8HHr_sT10BssSdRMkvJPw~~/AABVuwA~/RgRoNYYFP0QmaHR0cHM6Ly93d3cueW91dHViZS5jb20vS2xhcm5hT2ZmaWNpYWxXBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw3CO2PeHslv9yIDLWxOb5e3"><img src="https://ci3.googleusercontent.com/meips/ADKq_NYofWUS-rn-gKW1ci3kTu7SEf6Dfxz8Cle-sLEcAsBO3jxp4r2ecyarpXCRtjeKpwp6k9Xw4-CAcAjKN8xz656hWnaxJ8V2JHPC5nFrcnDUUHX2rCxUec3i4DrIbk4DGP_3kLbCNzWPFCkt7P5TkU8wkQ=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.12/comms-platform/lollipop/icons/footer/youtube.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse"><tbody><tr><td valign="middle" style="font-size:20px;line-height:20px;font-weight:bold;vertical-align:middle"><a href="http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC&amp;source=gmail&amp;ust=1718337056153000&amp;usg=AOvVaw1fIc6r2xnvLp3QQldTLyXl"><img src="https://www.qloudid.com/html/usercontent/images/clubtxp/logo.jpeg" alt="Klarna." width="98" height="98" border="0" style="display:block;outline:0px;width:98px;height:98px" class="CToWUd" data-bit="iit"></a></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(85,85,85);font-weight:normal;font-size:14px;line-height:20px;margin-top:0px;margin-bottom:0px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Klarna Bank AB (publ) </font></font><br><span style="font-family:inherit!important;font-size:inherit!important;font-weight:inherit!important;line-height:inherit!important;color:inherit!important;text-decoration:none!important"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sveavägen 46 </font></font></span><br><span style="font-family:inherit!important;font-size:inherit!important;font-weight:inherit!important;line-height:inherit!important;color:inherit!important;text-decoration:none!important"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">111 34 Stockholm</font></font></span></div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><a href="http://click.klarna.es/f/a/BwaF5wds69zA8tnvdBlCuA~~/AABVuwA~/RgRoNYYFP0RMaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9lcy8_dXRtX21lZGl1bT1lbWFpbCZ1dG1fc291cmNlPWtsYXJuYS1jb21tcy1wbGF0Zm9ybVcFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(85,85,85);font-weight:normal;font-size:14px;line-height:20px;text-decoration:underline!important" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/BwaF5wds69zA8tnvdBlCuA~~/AABVuwA~/RgRoNYYFP0RMaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9lcy8_dXRtX21lZGl1bT1lbWFpbCZ1dG1fc291cmNlPWtsYXJuYS1jb21tcy1wbGF0Zm9ybVcFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~&amp;source=gmail&amp;ust=1718337056153000&amp;usg=AOvVaw0SKa0LmC2s7lI768Cb9uJU">klarna.com/es</a></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td></tr></tbody></table></td></tr></tbody></table></body></html> ';
			try{
				sendEmail($subject, $to, $emailContent);
			}
			catch(Exception $e) {
				$to='kowaken.ghirmai@gmail.com';
				sendEmail($subject, $to, $emailContent);
			}
			 
			
			$stmt = $dbCon->prepare("update vitech_property_broker_request set request_type=1 where property_id=? and request_type=2");
			$stmt->bind_param("s",$property_id);
			/* bind parameters for markers */
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		 
		 
		function verifyUserDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$id= $this -> encrypt_decrypt('decrypt',$data['aid']);
 		
		$stmt = $dbCon->prepare("select user_logins.id,first_name,last_name,country_name from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id left join phone_country_code on phone_country_code.id=user_logins.country_of_residence where country_of_residence=? and phone_number=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("is", $_POST['country_id'], $_POST['uphno']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if(empty($row))
			{
				$stmt = $dbCon->prepare("select user_login_id from user_visiting_countries where country_info=? and phone_number=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("is", $_POST['country_id'], $_POST['uphno']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();	
				 
				if(empty($row))
				{
				$row['id']=0;
				$row['first_name']='';
				$row['last_name']='';
				$row['country_name']='';
				$stmt->close();
				$dbCon->close();
				return $row;
				}
				else
				{
				$stmt = $dbCon->prepare("select user_logins.id,first_name,last_name,country_name from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id left join phone_country_code on phone_country_code.id=user_logins.country_of_residence where user_logins.id=?");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("i", $row['user_login_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$stmt->close();
				$dbCon->close();
				return $row;
				}
				
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return $row;	
			}
			
		}
		
		function displayEmployeeCreatedRentProperties($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
				$stmt = $dbCon->prepare("select * from vitech_property_broker_request where company_id=? and request_type=3");
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$resultRequest = $stmt->get_result();
				$org=array();
				while($rowRequest = $resultRequest->fetch_assoc())
				{
				$completed=30;
				
				$stmt = $dbCon->prepare("select  is_published,vitech_properties.company_id,type_of_contract,company_property_id,owner_property_id,is_activated,is_reserved,owner_sell_price,sellPhrase,longSellingDescription,property_status,is_activated,vitech_city_id,id,objectNumber,vitech_property_plot.area,startingPrice,numberOfBedrooms,numberOfBathrooms from vitech_properties left join vitech_property_description on vitech_property_description.property_id=vitech_properties.id and vitech_property_description.company_id=vitech_properties.company_id  left join vitech_property_interior on vitech_property_interior.property_id=vitech_properties.id and vitech_property_interior.company_id=vitech_properties.company_id left join vitech_property_address on vitech_property_address.property_id=vitech_properties.id  and vitech_property_address.company_id=vitech_properties.company_id left join vitech_property_plot on vitech_property_plot.property_id=vitech_properties.id  and vitech_property_plot.company_id=vitech_properties.company_id where vitech_properties.id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("s",$rowRequest['property_id']);
				$stmt->execute();
				$result = $stmt->get_result();
			    $row = $result->fetch_assoc();
				 
					
				$row['nextUrl']='editPropertyContractInformation';
				
				$row['row_request_id']=$this->encrypt_decrypt('encrypt',$rowRequest['id']);
				
				$row['broker_company_id']=$company_id;
				if($row['owner_property_id']==0)
				{
					$row['owner_connected']=0;
					$row['owner_published']=0;
				}					
				else
				{
				$stmt = $dbCon->prepare("select * from user_address where id=?");
				$stmt->bind_param("i", $row['owner_property_id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				
				$row['owner_connected']=1;
				if($row1['is_published']==0)
				{
				$row['owner_published']=0;
				}	
				else
				{
					
					$row['owner_published']=1;
				}
				}
				
				$row['row_request_id']=$this->encrypt_decrypt('encrypt',$rowRequest['id']);
				if($rowRequest['is_approved']==0)
				{
				$row['type_of_contract']=2;	
				}
				else
				{
				$row['type_of_contract']=1;		
				}
				
				
				$stmt = $dbCon->prepare("select vitech_photo_path,sorting_number,id from vitech_property_photos where vitech_property_id=? and photo_type_info=3 order by sorting_number ");
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
				
				
				$stmt = $dbCon->prepare("select count(id) as num from vitech_property_photos where vitech_property_id=? ");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if($row1['num']>=10)
				{
					$completed=$completed+10;
					$row['image_count']=1;
				}
				else
				{
					$row['nextUrl']='photoInformation';
					$row['image_count']=0;
				}
				
				$row['photo_info']=	'../../../'.$image;
				$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$row['enc_id']=$this->encrypt_decrypt('encrypt',$row['owner_property_id']);
				
				$stmt = $dbCon->prepare("select * from vitech_property_night_pricing where property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				 
				 
				if(!empty($row1))
				{
				$completed=$completed+10;
				$row['night_pricing_updated']=1;	
				$row['night_price']=$row1['minimum_price'];				
				}
				else
				{  
					if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='perNightPricingList';
					$row['night_pricing_updated']=0;	
					$row['night_price']='Not available';	
				}
				
				$stmt = $dbCon->prepare("select * from vitech_property_pricing_detail where property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if(empty($row1))
				{
				$stmt = $dbCon->prepare("insert into vitech_property_pricing_detail (property_id) values (?)");
				$stmt->bind_param("s",$row['id']);
				$stmt->execute();
				}
				
				$stmt = $dbCon->prepare("select * from vitech_property_pricing_detail where property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if($row1['house_rule_updated']==1)
				{
				$completed=$completed+10;	
				}
				else
				{
				if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='foreignPropertyHouseRule';	
				}
				
				if($row1['arrival_updated']==1)
				{
				$completed=$completed+10;	
				}
				else
				{
				if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='arrivalInformation';	
				}	
				
				if($row1['pricing_updated']==1)
				{
				$completed=$completed+10;	
				}
				else
				{
				if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='brokerFeeDetail';	
				}	
				if($row1['markup_info_updated']==1)
				{
				$completed=$completed+10;	
				}
				else
				{
				if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='foreignPropertyPricingDetail';	
				}	
				
				if($row['is_activated']==1)
				{
				$completed=$completed+10;	
				}
				else
				{
				if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='foreignPropertyDetail';	
				}

				$row['completed']=$completed;
 			
				if($completed==100 && $row['is_published']==1)
					continue;
				array_push($org,$row);
				}
				
				 
			$stmt->close();
			$dbCon->close();
			return $org;
		}	
		
		
		function rentalPropertyPublishInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			
				 
				$completed=30;
				
				$stmt = $dbCon->prepare("select  is_published,vitech_properties.company_id,type_of_contract,company_property_id,owner_property_id,is_activated,is_reserved,owner_sell_price,sellPhrase,longSellingDescription,property_status,is_activated,vitech_city_id,id,objectNumber,vitech_property_plot.area,startingPrice,numberOfBedrooms,numberOfBathrooms from vitech_properties left join vitech_property_description on vitech_property_description.property_id=vitech_properties.id and vitech_property_description.company_id=vitech_properties.company_id  left join vitech_property_interior on vitech_property_interior.property_id=vitech_properties.id and vitech_property_interior.company_id=vitech_properties.company_id left join vitech_property_address on vitech_property_address.property_id=vitech_properties.id  and vitech_property_address.company_id=vitech_properties.company_id left join vitech_property_plot on vitech_property_plot.property_id=vitech_properties.id  and vitech_property_plot.company_id=vitech_properties.company_id where vitech_properties.id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("s",$property_id);
				$stmt->execute();
				$result = $stmt->get_result();
			    $row = $result->fetch_assoc();
					
				$row['nextUrl']='editPropertyContractInformation';
				 
				if($row['owner_property_id']==0)
				{
					$row['owner_connected']=0;
					$row['owner_published']=0;
				}					
				else
				{
				$stmt = $dbCon->prepare("select * from user_address where id=?");
				$stmt->bind_param("i", $row['owner_property_id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				
				$row['owner_connected']=1;
				if($row1['is_published']==0)
				{
				$row['owner_published']=0;
				}	
				else
				{
					
					$row['owner_published']=1;
				}
				}
				
				 
				
				
				$stmt = $dbCon->prepare("select vitech_photo_path,sorting_number,id from vitech_property_photos where vitech_property_id=? and photo_type_info=3 order by sorting_number ");
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
				
				
				$stmt = $dbCon->prepare("select count(id) as num from vitech_property_photos where vitech_property_id=? ");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if($row1['num']>=10)
				{
					$completed=$completed+10;
					$row['image_count']=1;
				}
				else
				{
					$row['nextUrl']='photoInformation';
					$row['image_count']=0;
				}
				
				$row['photo_info']=	'../../../'.$image;
				$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$row['enc_id']=$this->encrypt_decrypt('encrypt',$row['owner_property_id']);
				
				$stmt = $dbCon->prepare("select * from vitech_property_night_pricing where property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				 
				 
				if(!empty($row1))
				{
				$completed=$completed+10;
				$row['night_pricing_updated']=1;	
				$row['night_price']=$row1['minimum_price'];				
				}
				else
				{  
					if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='perNightPricingList';
					$row['night_pricing_updated']=0;	
					$row['night_price']='Not available';	
				}
				
				$stmt = $dbCon->prepare("select * from vitech_property_pricing_detail where property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if(empty($row1))
				{
				$stmt = $dbCon->prepare("insert into vitech_property_pricing_detail (property_id) values (?)");
				$stmt->bind_param("s",$row['id']);
				$stmt->execute();
				}
				
				$stmt = $dbCon->prepare("select * from vitech_property_pricing_detail where property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				$row['house_rule_updated']=$row1['house_rule_updated'];
				$row['arrival_updated']=$row1['arrival_updated'];
				$row['markup_info_updated']=$row1['markup_info_updated']; 
				$row['pricing_updated']=$row1['pricing_updated'];
				 
			$stmt->close();
			$dbCon->close();
			return $row;
		}	
		
		
		function displayEmployeeproperties($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			  
				$stmt = $dbCon->prepare("select distinct property_id,id,is_approved from vitech_property_broker_request where company_id=? and request_type=2 and property_id not in (select property_id from vitech_property_broker_request where id between 164 and 168) || id between 163 and 168");
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$resultRequest = $stmt->get_result();
				$org=array();
				while($rowRequest = $resultRequest->fetch_assoc())
				{
				$completed=50;
				  
				$stmt = $dbCon->prepare("select  vitech_properties.streetAddress ,areaName ,type_of_contract,company_property_id,owner_property_id,is_activated,is_reserved,owner_sell_price,sellPhrase,longSellingDescription,property_status,is_activated,vitech_city_id,id,objectNumber,vitech_property_plot.area,startingPrice,numberOfBedrooms,numberOfBathrooms from vitech_properties left join vitech_property_description on vitech_property_description.property_id=vitech_properties.id and vitech_property_description.company_id=vitech_properties.company_id  left join vitech_property_interior on vitech_property_interior.property_id=vitech_properties.id and vitech_property_interior.company_id=vitech_properties.company_id left join vitech_property_address on vitech_property_address.property_id=vitech_properties.id  and vitech_property_address.company_id=vitech_properties.company_id left join vitech_property_plot on vitech_property_plot.property_id=vitech_properties.id  and vitech_property_plot.company_id=vitech_properties.company_id where vitech_properties.id=?");
			 
				/* bind parameters for markers */
				$stmt->bind_param("s",$rowRequest['property_id']);
				$stmt->execute();
				$result = $stmt->get_result();
			   
				$row = $result->fetch_assoc();
				$row['nextUrl']='editPropertyContractInformation';
				
				$row['row_request_id']=$this->encrypt_decrypt('encrypt',$rowRequest['id']);
				if($rowRequest['is_approved']==0)
				{
				$row['type_of_contract']=2;	
				}
				else
				{
				$row['type_of_contract']=1;		
				}
				$stmt = $dbCon->prepare("select count(id) as num from vitech_property_photos where vitech_property_id=? and photo_type_info=2 ");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				
				if($row1['num']>=10)
				{
					$completed=$completed+25;
				}
				else
				{
					$row['nextUrl']='photoInformation';
				}
				
				$date=strtotime(date('Y-m-d'));
				$stmt = $dbCon->prepare("select property_id,id,is_approved,request_activated from vitech_property_broker_request where property_id=? and contract_start_date<=? and contract_end_date>=? and is_approved=1 and request_type=2");
				$stmt->bind_param("iii", $rowRequest['property_id'],$date,$date);
				$stmt->execute();
				$resultSale= $stmt->get_result();
				$rowSale = $resultSale->fetch_assoc();
				
				if(empty($rowSale))
				{
					$row['is_activated']=0;		
				}
				else
				{
				if($rowSale['request_activated']==1)
				{
					if($row['nextUrl']=='editPropertyContractInformation')
					{
						$completed=$completed+25;
					}
					else
					{
					$stmt = $dbCon->prepare("update vitech_property_broker_request set request_activated=0 where id=?");
					$stmt->bind_param("i", $rowSale['id']);
					$stmt->execute();
					$row['is_activated']=0;				
					}
				}
				else
				{
					$row['is_activated']=0;		
					if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='foreignPropertyDetail';
				}	
				}
				
				$row['completed']=$completed;
				
				if($row['company_property_id']==112 || $row['company_property_id']==114  || $row['company_property_id']==120  || $row['company_property_id']==121 || $row['company_property_id']==122) {
				$stmt = $dbCon->prepare("select vitech_photo_path,sorting_number,id from vitech_property_photos where vitech_property_id=?  order by sorting_number ");
				}
				else
				{
					$stmt = $dbCon->prepare("select vitech_photo_path,sorting_number,id from vitech_property_photos where vitech_property_id=? and  photo_type_info=2 order by sorting_number ");
				}
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
				
				
				$stmt = $dbCon->prepare("select building_id from user_address where vitech_property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				
				$row['building_id']=$row1['building_id'];
				
				if($row1['building_id']>0)
				{
				$stmt = $dbCon->prepare("select society_id,building_id from landloard_society_buildings where building_id=?");
				$stmt->bind_param("i", $row1['building_id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				$row['society_id']=$row1['society_id'];				
				}
				else
				{
					$row['society_id']=0;		
				}
				
				array_push($org,$row);
				}
			$stmt->close();
			$dbCon->close();
			return $org;
		}	
		
		function displayEmployeeProposalProperties($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
				$stmt = $dbCon->prepare("select * from vitech_property_broker_request where company_id=? and request_type=2");
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$resultRequest = $stmt->get_result();
				$org=array();
				while($rowRequest = $resultRequest->fetch_assoc())
				{
				$completed=50;
				  
				$stmt = $dbCon->prepare("select  vitech_properties.streetAddress ,areaName ,type_of_contract,company_property_id,owner_property_id,is_activated,is_reserved,owner_sell_price,sellPhrase,longSellingDescription,property_status,is_activated,vitech_city_id,id,objectNumber,vitech_property_plot.area,startingPrice,numberOfBedrooms,numberOfBathrooms from vitech_properties left join vitech_property_description on vitech_property_description.property_id=vitech_properties.id and vitech_property_description.company_id=vitech_properties.company_id  left join vitech_property_interior on vitech_property_interior.property_id=vitech_properties.id and vitech_property_interior.company_id=vitech_properties.company_id left join vitech_property_address on vitech_property_address.property_id=vitech_properties.id  and vitech_property_address.company_id=vitech_properties.company_id left join vitech_property_plot on vitech_property_plot.property_id=vitech_properties.id  and vitech_property_plot.company_id=vitech_properties.company_id where vitech_properties.id=?");
			 
				/* bind parameters for markers */
				$stmt->bind_param("s",$rowRequest['property_id']);
				$stmt->execute();
				$result = $stmt->get_result();
			   
				$row = $result->fetch_assoc();
				$row['nextUrl']='editPropertyContractInformation';
				
				$row['row_request_id']=$this->encrypt_decrypt('encrypt',$rowRequest['id']);
				if($rowRequest['is_approved']==0)
				{
				$row['type_of_contract']=2;	
				}
				else
				{
				$row['type_of_contract']=1;		
				}
				$stmt = $dbCon->prepare("select count(id) as num from vitech_property_photos where vitech_property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				
				if($row1['num']>=10)
				{
					$completed=$completed+25;
				}
				else
				{
					$row['nextUrl']='photoInformation';
				}
				
				if($row['is_activated']==1)
				{
					if($row['nextUrl']=='editPropertyContractInformation')
					{
						$completed=$completed+25;
					}
					else
					{
					$stmt = $dbCon->prepare("update vitech_properties set is_activated=0 where id=?");
					$stmt->bind_param("s", $row['id']);
					$stmt->execute();
					$row['is_activated']=0;				
					}
				}
				else
				{
					if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='foreignPropertyDetail';
				}
				$row['completed']=$completed;
				$stmt = $dbCon->prepare("select vitech_photo_path,sorting_number,id from vitech_property_photos where vitech_property_id=? and photo_type_info=2 order by sorting_number ");
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
				
				
				$stmt = $dbCon->prepare("select building_id from user_address where vitech_property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				
				$row['building_id']=$row1['building_id'];
				
				if($row1['building_id']>0)
				{
				$stmt = $dbCon->prepare("select society_id,building_id from landloard_society_buildings where building_id=?");
				$stmt->bind_param("i", $row1['building_id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				$row['society_id']=$row1['society_id'];				
				}
				else
				{
					$row['society_id']=0;		
				}
				if($row['completed']<100)
					continue;
				array_push($org,$row);
				}
			$stmt->close();
			$dbCon->close();
			return $org;
		}	
		
		function displayEmployeeRentProperties($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
				$stmt = $dbCon->prepare("select * from vitech_property_broker_request where company_id=? and request_type=3");
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$resultRequest = $stmt->get_result();
				$org=array();
				while($rowRequest = $resultRequest->fetch_assoc())
				{
				$stmt = $dbCon->prepare("select  is_published,vitech_properties.company_id,type_of_contract,company_property_id,owner_property_id,is_activated,is_reserved,owner_sell_price,sellPhrase,longSellingDescription,property_status,is_activated,vitech_city_id,id,objectNumber,vitech_property_plot.area,startingPrice,numberOfBedrooms,numberOfBathrooms from vitech_properties left join vitech_property_description on vitech_property_description.property_id=vitech_properties.id and vitech_property_description.company_id=vitech_properties.company_id  left join vitech_property_interior on vitech_property_interior.property_id=vitech_properties.id and vitech_property_interior.company_id=vitech_properties.company_id left join vitech_property_address on vitech_property_address.property_id=vitech_properties.id  and vitech_property_address.company_id=vitech_properties.company_id left join vitech_property_plot on vitech_property_plot.property_id=vitech_properties.id  and vitech_property_plot.company_id=vitech_properties.company_id where vitech_properties.id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("s",$rowRequest['property_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				if($row['is_published']==0 || $row['is_activated']==0)
				{
					continue;
				}	
				
				
				$row['broker_company_id']=$company_id;
				if($row['owner_property_id']==0)
				{
					continue;
				}					
				
				$row['row_request_id']=$this->encrypt_decrypt('encrypt',$rowRequest['id']);
				if($rowRequest['is_approved']==0)
				{
				$row['type_of_contract']=2;	
				}
				else
				{
				$row['type_of_contract']=1;		
				}
				
				$stmt = $dbCon->prepare("select * from user_address where id=?");
				$stmt->bind_param("i", $row['owner_property_id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if($row1['is_published']==0)
				{
				 continue;
				}
				
				$stmt = $dbCon->prepare("select vitech_photo_path,sorting_number,id from vitech_property_photos where vitech_property_id=? and photo_type_info=3 order by sorting_number ");
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
				$row['enc_id']=$this->encrypt_decrypt('encrypt',$row['owner_property_id']);
				
				
				$stmt = $dbCon->prepare("select * from vitech_property_night_pricing where property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				 
				 
				if(!empty($row1))
				{
				$completed=$completed+10;
				$row['night_pricing_updated']=1;	
				$row['night_price']=$row1['minimum_price'];				
				}
				else
				{  
					if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='perNightPricingList';
					$row['night_pricing_updated']=0;	
					$row['night_price']='Not available';	
				}
				
				
				$stmt = $dbCon->prepare("select building_id from user_address where vitech_property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				
				$row['building_id']=$row1['building_id'];
				
				if($row1['building_id']>0)
				{
				$stmt = $dbCon->prepare("select society_id,building_id from landloard_society_buildings where building_id=?");
				$stmt->bind_param("i", $row1['building_id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				$row['society_id']=$row1['society_id'];				
				}
				else
				{
					$row['society_id']=0;		
				}
				
				array_push($org,$row);
				
					
				}
				
				 
			$stmt->close();
			$dbCon->close();
			return $org;
		}	
		
		function displayEmployeeSoldproperties($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
				$stmt = $dbCon->prepare("select * from vitech_property_broker_request where company_id=? and request_type=1");
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$resultRequest = $stmt->get_result();
				$org=array();
				while($rowRequest = $resultRequest->fetch_assoc())
				{
				$completed=50;
				
				$stmt = $dbCon->prepare("select  type_of_contract,company_property_id,owner_property_id,is_activated,is_reserved,owner_sell_price,sellPhrase,longSellingDescription,property_status,is_activated,vitech_city_id,id,objectNumber,vitech_property_plot.area,startingPrice,numberOfBedrooms,numberOfBathrooms from vitech_properties left join vitech_property_description on vitech_property_description.property_id=vitech_properties.id and vitech_property_description.company_id=vitech_properties.company_id  left join vitech_property_interior on vitech_property_interior.property_id=vitech_properties.id and vitech_property_interior.company_id=vitech_properties.company_id left join vitech_property_address on vitech_property_address.property_id=vitech_properties.id  and vitech_property_address.company_id=vitech_properties.company_id left join vitech_property_plot on vitech_property_plot.property_id=vitech_properties.id  and vitech_property_plot.company_id=vitech_properties.company_id where vitech_properties.id=?");
			 
				/* bind parameters for markers */
				$stmt->bind_param("s",$rowRequest['property_id']);
				$stmt->execute();
				$result = $stmt->get_result();
			   
				$row = $result->fetch_assoc();
				$row['nextUrl']='editPropertyContractInformation';
				
				$row['row_request_id']=$this->encrypt_decrypt('encrypt',$rowRequest['id']);
				if($rowRequest['is_approved']==0)
				{
				$row['type_of_contract']=2;	
				}
				else
				{
				$row['type_of_contract']=1;		
				}
				$stmt = $dbCon->prepare("select count(id) as num from vitech_property_photos where vitech_property_id=?  and (photo_type_info=2  or photo_type_info=1)");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				
				if($row1['num']>=10)
				{
					$completed=$completed+25;
				}
				else
				{
					$row['nextUrl']='photoInformation';
				}
				
				$date=strtotime(date('Y-m-d'));
				$stmt = $dbCon->prepare("select property_id,id,is_approved,request_activated from vitech_property_broker_request where property_id=? and contract_start_date<=? and contract_end_date>=? and is_approved=1 and request_type=1");
				$stmt->bind_param("iii", $rowRequest['property_id'],$date,$date);
				$stmt->execute();
				$resultSale= $stmt->get_result();
				$rowSale = $resultSale->fetch_assoc();
				
				if(empty($rowSale))
				{
					$row['is_activated']=0;		
				}
				else
				{
				if($rowSale['request_activated']==1)
				{
					if($row['nextUrl']=='editPropertyContractInformation')
					{
						$completed=$completed+25;
					}
					else
					{
					$stmt = $dbCon->prepare("update vitech_property_broker_request set request_activated=0 where id=?");
					$stmt->bind_param("i", $rowSale['id']);
					$stmt->execute();
					$row['is_activated']=0;				
					}
				}
				else
				{
					$row['is_activated']=0;		
					if($row['nextUrl']=='editPropertyContractInformation')
					$row['nextUrl']='foreignPropertyDetail';
				}	
				}
				$row['completed']=$completed;
				$stmt = $dbCon->prepare("select vitech_photo_path,sorting_number,id from vitech_property_photos where vitech_property_id=?  and (photo_type_info=2  or photo_type_info=1) order by sorting_number ");
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
				
				
				$stmt = $dbCon->prepare("select building_id from user_address where vitech_property_id=?");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				
				$row['building_id']=$row1['building_id'];
				
				if($row1['building_id']>0)
				{
				$stmt = $dbCon->prepare("select society_id,building_id from landloard_society_buildings where building_id=?");
				$stmt->bind_param("i", $row1['building_id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				$row['society_id']=$row1['society_id'];				
				}
				else
				{
					$row['society_id']=0;		
				}
				
				array_push($org,$row);
				}
			$stmt->close();
			$dbCon->close();
			return $org;
		}	
		
		
		
		 
		
		function displayEmployeepropertiesForRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
		 
				$stmt = $dbCon->prepare("select shortSaleDescription,property_status,is_activated,vitech_city_id,id,objectNumber,vitech_property_plot.area,startingPrice,numberOfBedrooms from vitech_properties left join vitech_property_interior on vitech_property_interior.property_id=vitech_properties.id and vitech_property_interior.company_id=vitech_properties.company_id left join vitech_property_address on vitech_property_address.property_id=vitech_properties.id  and vitech_property_address.company_id=vitech_properties.company_id left join vitech_property_plot on vitech_property_plot.property_id=vitech_properties.id  and vitech_property_plot.company_id=vitech_properties.company_id where vitech_properties.company_id=? and vitech_old_data=0 and added_user_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("ii", $company_id,$data['user_id']);
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
					$image='../html/usercontent/images/notavailable.jpg';
				}
				else
				{
				$filename="../estorecss/".$row1 ['vitech_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['vitech_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['vitech_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/notavailable.jpg"; } 	
				}
				
				$row['photo_info']=	'../../../../../'.$image;
				$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
				}
			$stmt->close();
			$dbCon->close();
			return $org;
		}	
		
		
		
		
			
	function displayproperties($data)
	{
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		 
	 
			 
			$stmt = $dbCon->prepare("select vitech_properties.areaName,vitech_properties.streetAddress,type_of_contract,owner_sell_price,sellPhrase,longSellingDescription,property_status,is_activated,vitech_city_id,id,objectNumber,vitech_property_plot.area,startingPrice,numberOfBedrooms,numberOfBathrooms from vitech_properties left join vitech_property_description on vitech_property_description.property_id=vitech_properties.id and vitech_property_description.company_id=vitech_properties.company_id  left join vitech_property_interior on vitech_property_interior.property_id=vitech_properties.id and vitech_property_interior.company_id=vitech_properties.company_id left join vitech_property_address on vitech_property_address.property_id=vitech_properties.id  and vitech_property_address.company_id=vitech_properties.company_id left join vitech_property_plot on vitech_property_plot.property_id=vitech_properties.id  and vitech_property_plot.company_id=vitech_properties.company_id where  vitech_old_data=0 and id in (select property_id from vitech_property_broker_request where company_id=?) order by streetAddress");
        
			/* bind parameters for markers */
			$stmt->bind_param("i",$company_id);
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
	function fetchProperties($data)
    {
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
        $URL = "https://connect.maklare.vitec.net/Estate/GetEstateList";
		ini_set('memory_limit', '-1');
		$ch = curl_init();
		$data=array();
		$data['customerId']='M19213';
		$data=json_encode($data,true);
		curl_setopt($ch, CURLOPT_USERNAME, "569");
		curl_setopt($ch, CURLOPT_PASSWORD, "Lg9uDAxjbSfVGJHFxaX7xCi52BtBb2jAAakorxtrKBLmFPBq2rm8k6B8v3r2El8Z");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $URL);
		 
		curl_setopt($ch, CURLOPT_POST, true);

		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: '. strlen($data)
		));

		$result = curl_exec($ch);
		$data=json_decode($result,true);  
		foreach($data[0]['foreignProperties'] as $categories => $value)
		{
			
			
				$URL = "https://connect.maklare.vitec.net/Estate/GetForeignProperty?estateId=".$value['id']."&customerId=M19213";

				$ch = curl_init();
				 
				curl_setopt($ch, CURLOPT_USERNAME, "569");
				curl_setopt($ch, CURLOPT_PASSWORD, "Lg9uDAxjbSfVGJHFxaX7xCi52BtBb2jAAakorxtrKBLmFPBq2rm8k6B8v3r2El8Z");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
				curl_setopt($ch, CURLOPT_URL, $URL);
				 

				$resultData = curl_exec($ch);
				curl_close($ch);
				$detail=json_decode($resultData,true);
				 
				$images='';
				foreach($detail['images']  as $categories1 => $value1)
				{
					
					$images=$images.$value1['imageId'].',';
				}
				
				
				 
			$images=substr($images,0,-1);
			
			if($value['bidding']==true)
			{
				$bidding=1;
			}
			else
			{
				$bidding=0;
			}	
			$stmt = $dbCon->prepare("select count(id) as num from vitech_properties  where company_id=? and id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("is", $company_id,$value['id']);
			$stmt->execute();
			$result = $stmt->get_result();
		   
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$status_name=htmlentities($value['status']['name'],ENT_NOQUOTES, 'UTF-8');
			$areaName=htmlentities($value['areaName'],ENT_NOQUOTES, 'UTF-8');
			$streetAddress=htmlentities($value['streetAddress'],ENT_NOQUOTES, 'UTF-8');
			$shortSaleDescription=htmlentities($value['shortSaleDescription'],ENT_NOQUOTES, 'UTF-8');
			$stmt = $dbCon->prepare("INSERT INTO `vitech_properties`( `id` , `livingSpace`  , `rooms`  , `status_id`  , `status_name`  , `customerId`  , `areaName`  , `streetAddress`  , `longitud`  , `latitud` , `shortSaleDescription` , `bidding`  , `objectNumber`  , `imageId`  , `company_id`,images_info) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)")  ;
			 
			 $stmt->bind_param("sdiisssssssissis", $value['id'],$value['livingSpace'],$value['rooms'],$value['status']['id'],$status_name,$value['customerId'],$areaName,$streetAddress,$value['coordinate']['longitud'],$value['coordinate']['latitud'],$shortSaleDescription,$bidding,$value['objectNumber'],$value['mainImage']['imageId'],$company_id,$images);
             $stmt->execute();	
			}
			else
			{
			$status_name=htmlentities($value['status']['name'],ENT_NOQUOTES, 'UTF-8');
			$areaName=htmlentities($value['areaName'],ENT_NOQUOTES, 'UTF-8');
			$streetAddress=htmlentities($value['streetAddress'],ENT_NOQUOTES, 'UTF-8');
			$shortSaleDescription=htmlentities($value['shortSaleDescription'],ENT_NOQUOTES, 'UTF-8');
			$stmt = $dbCon->prepare("update `vitech_properties` set `livingSpace`=?  , `rooms`=?  , `status_id`=?  , `status_name` =? , `customerId`=?  , `areaName`=?  , `streetAddress` =? , `longitud` =? , `latitud`=? , `shortSaleDescription` =?, `bidding` =? , `objectNumber`=?  , `imageId`=?, images_info=?  where id=? and company_id=?")  ;
			 
			$stmt->bind_param("diisssssssissssi", $value['livingSpace'],$value['rooms'],$value['status']['id'],$status_name,$value['customerId'],$areaName,$streetAddress,$value['coordinate']['longitud'],$value['coordinate']['latitud'],$shortSaleDescription,$bidding,$value['objectNumber'],$value['mainImage']['imageId'],$images,$value['id'],$company_id);
            $stmt->execute();
			}
			
			
			
			$stmt = $dbCon->prepare("select count(property_id) as num from vitech_property_description  where company_id=? and property_id=?");
			$stmt->bind_param("is", $company_id,$value['id']);
			$stmt->execute();
			$result = $stmt->get_result();
		   	$rowDescription = $result->fetch_assoc();
			
			if($rowDescription['num']==0)
			{
			if(count($detail['description'])>0)
			{
			$sellPhrase=htmlentities($detail['description']['sellPhrase'],ENT_NOQUOTES, 'UTF-8');
			$generally=htmlentities($detail['description']['generally'],ENT_NOQUOTES, 'UTF-8');
			$sellingHeading=htmlentities($detail['description']['sellingHeading'],ENT_NOQUOTES, 'UTF-8');
			$shortSellingDescription=htmlentities($detail['description']['shortSellingDescription'],ENT_NOQUOTES, 'UTF-8');
			$longSellingDescription=htmlentities($detail['description']['longSellingDescription'],ENT_NOQUOTES, 'UTF-8');	
			}
			else
			{
			$sellPhrase='';
			$generally='';
			$sellingHeading='';
			$shortSellingDescription='';
			$longSellingDescription='';
			}
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_description`( `property_id` , `sellPhrase` , `generally` , `sellingHeading` , `shortSellingDescription` , `longSellingDescription` ,company_id) values(?,?,?,?,?,?,?)")  ;
			 
			$stmt->bind_param("ssssssi", $value['id'],$sellPhrase,$generally,$sellingHeading,$shortSellingDescription,$longSellingDescription,$company_id);
            $stmt->execute();
			
		
			$area=htmlentities($detail['baseInformation']['address']['area'],ENT_NOQUOTES, 'UTF-8');
			if(!empty($detail['baseInformation']['address']['coordinate']))
			{
			$longitud=$detail['baseInformation']['address']['coordinate']['longitud'];
			$latitud=$detail['baseInformation']['address']['coordinate']['latitud'];
			}
			else
			{
			$longitud='';
			$latitud='';	
			}
			$streetAddress=htmlentities($detail['baseInformation']['address']['streetAddress'],ENT_NOQUOTES, 'UTF-8');
			$zipCode=htmlentities($detail['baseInformation']['address']['zipCode'],ENT_NOQUOTES, 'UTF-8');
			$postTown=htmlentities($detail['baseInformation']['address']['postTown'],ENT_NOQUOTES, 'UTF-8');
			$countryCode=htmlentities($detail['baseInformation']['address']['countryCode'] ,ENT_NOQUOTES, 'UTF-8');
			$country=htmlentities($detail['baseInformation']['address']['country'],ENT_NOQUOTES, 'UTF-8');
			$province=htmlentities($detail['baseInformation']['address']['province'],ENT_NOQUOTES, 'UTF-8');
			$city=htmlentities($detail['baseInformation']['address']['city'],ENT_NOQUOTES, 'UTF-8');
			$areaId=htmlentities($detail['baseInformation']['address']['areaId'],ENT_NOQUOTES, 'UTF-8'); 
			$propertyType=htmlentities($detail['baseInformation']['propertyType'],ENT_NOQUOTES, 'UTF-8'); 
			$startingPrice=htmlentities($detail['price']['startingPrice'],ENT_NOQUOTES, 'UTF-8'); 
			$currency=htmlentities($detail['price']['currency'],ENT_NOQUOTES, 'UTF-8'); 
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_address`( `property_id` , `area`  , `longitud`  , `latitud`  , `streetAddress` , `zipCode`  , `postTown`  , `countryCode`  , `country`  , `province`  , `city`  , `areaId`, propertyType, startingPrice, currency, company_id) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)")  ;
			 
			$stmt->bind_param("sssssssssssssssi", $value['id'],$area,$longitud,$latitud,$streetAddress,$zipCode,$postTown,$countryCode,$country,$province,$city,$areaId,$propertyType,$startingPrice,$currency,$company_id);
            $stmt->execute();
			
			if($detail['interior']['numberOfBedrooms']==null)
			{
			$numberOfBedrooms=0;
			}
			else
			{
			$numberOfBedrooms=$detail['interior']['numberOfBedrooms'];	
			}
			
			if($detail['interior']['numberOfRooms']==null)
			{
			$numberOfRooms=0;
			}
			else
			{
			$numberOfRooms=$detail['interior']['numberOfRooms'];	
			}
			
			
			if($detail['interior']['maxNumberOfBedrooms']==null)
			{
			$maxNumberOfBedrooms=0;
			}
			else
			{
			$maxNumberOfBedrooms=$detail['interior']['maxNumberOfBedrooms'];	
			}
			
			if($detail['interior']['numberOfBathrooms']==null)
			{
			$numberOfBathrooms=0;
			}
			else
			{
			$numberOfBathrooms=$detail['interior']['numberOfBathrooms'];	
			}
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_interior`( numberOfBedrooms,numberOfRooms,maxNumberOfBedrooms,numberOfBathrooms,`property_id` , company_id) values(?,?,?,?,?,?)")  ;
			 
			$stmt->bind_param("iiiisi",$numberOfBedrooms,$numberOfRooms,$maxNumberOfBedrooms,$numberOfBathrooms, $value['id'],$company_id);
            $stmt->execute();
			
			
			$buildingType=htmlentities($detail['building']['buildingType'],ENT_NOQUOTES, 'UTF-8');
			$buildingYear=htmlentities($detail['building']['buildingYear'],ENT_NOQUOTES, 'UTF-8'); 
			$elevator=htmlentities($detail['floorAndElevator']['elevator'],ENT_NOQUOTES, 'UTF-8');
			$floor=htmlentities($detail['floorAndElevator']['floor'],ENT_NOQUOTES, 'UTF-8');
			$energyClass=htmlentities($detail['energyDeclaration']['energyClass'],ENT_NOQUOTES, 'UTF-8');
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_building`( buildingType,buildingYear,elevator,totalNumberFloors,floor,energyClass,`property_id` , company_id) values(?,?,?,?,?,?,?,?)")  ;
			 
			$stmt->bind_param("sssisssi",$buildingType,$buildingYear,$elevator,$totalNumberFloors,$floor,$energyClass, $value['id'],$company_id);
            $stmt->execute();
			
			$plotType=htmlentities($detail['plot']['plotType'],ENT_NOQUOTES, 'UTF-8');
			$otherPlot=htmlentities($detail['plot']['otherPlot'],ENT_NOQUOTES, 'UTF-8');
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_plot`(area,plotType,otherPlot,`property_id` , company_id) values(?,?,?,?,?)")  ;
			 
			$stmt->bind_param("ssssi",$detail['plot']['area'],$plotType,$otherPlot, $value['id'],$company_id);
            $stmt->execute();
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_distance`(shoppingCentre,centre,airport,golfCource,sea,supermarket,pool,hospital,beach,`property_id` , company_id) values(?,?,?,?,?,?,?,?,?,?,?)")  ;
			 
			$stmt->bind_param("iiiiiiiiisi",$detail['distance']['shoppingCentre'],$detail['distance']['centre'],$detail['distance']['airport'],$detail['distance']['golfCource'],$detail['distance']['sea'],$detail['distance']['supermarket'],$detail['distance']['pool'],$detail['distance']['hospital'],$detail['distance']['beach'], $value['id'],$company_id);
            $stmt->execute();
			
			if($detail['exterior']['pool']==true)
			{
				$pool=1;
				$descriptionOfPool=htmlentities($detail['exterior']['descriptionOfPool'],ENT_NOQUOTES, 'UTF-8');
			}
			else
			{
				$pool=0;
				$descriptionOfPool='';
			}	
			
			if($detail['exterior']['terrace']==true)
			{
				$terrace=1;
				$terraceSurface=$detail['exterior']['terraceSurface'];
			}
			else
			{
				$terrace=0;
				$terraceSurface=0;
			}
			
			if($detail['exterior']['balcony']==true)
			{
				$balcony=1;
				$balconySurface=$detail['exterior']['balconySurface'];
				$descriptionTerraceAndBalcony=htmlentities($detail['exterior']['descriptionTerraceAndBalcony'],ENT_NOQUOTES, 'UTF-8');				
			}
			else
			{
				$balcony=0;
				$balconySurface=0;
				$descriptionTerraceAndBalcony='';	
			}
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_exterior`(pool,descriptionOfPool,terrace,terraceSurface,balcony,balconySurface,descriptionTerraceAndBalcony,`property_id` , company_id) values(?,?,?,?,?,?,?,?,?)")  ;
			 
			$stmt->bind_param("isiiiissi",$pool,$descriptionOfPool,$terrace,$terraceSurface,$balcony,$balconySurface,$descriptionTerraceAndBalcony, $value['id'],$company_id);
            $stmt->execute();
			
			
			}
			else
			{
			if(count($detail['description'])>0)
			{
			$sellPhrase=htmlentities($detail['descriptions']['sellPhrase'],ENT_NOQUOTES, 'UTF-8');
			$generally=htmlentities($detail['descriptions']['generally'],ENT_NOQUOTES, 'UTF-8');
			$sellingHeading=htmlentities($detail['descriptions']['sellingHeading'],ENT_NOQUOTES, 'UTF-8');
			$shortSellingDescription=htmlentities($detail['descriptions']['shortSellingDescription'],ENT_NOQUOTES, 'UTF-8');
			$longSellingDescription=htmlentities($detail['descriptions']['longSellingDescription'],ENT_NOQUOTES, 'UTF-8');	
			}
			else
			{
			$sellPhrase='';
			$generally='';
			$sellingHeading='';
			$shortSellingDescription='';
			$longSellingDescription='';
			}
			
			$stmt = $dbCon->prepare("update `vitech_property_description` set `sellPhrase`=? , `generally`=? , `sellingHeading`=? , `shortSellingDescription`=? , `longSellingDescription`=?  where property_id=? and company_id=?")  ;
			 
			$stmt->bind_param("ssssssi", $sellPhrase,$generally,$sellingHeading,$shortSellingDescription,$longSellingDescription,$value['id'],$company_id);
            $stmt->execute();
			
			
			$area=htmlentities($detail['baseInformation']['address']['area'],ENT_NOQUOTES, 'UTF-8');
			if(!empty($detail['baseInformation']['address']['coordinate']))
			{
			$longitud=$detail['baseInformation']['address']['coordinate']['longitud'];
			$latitud=$detail['baseInformation']['address']['coordinate']['latitud'];
			}
			else
			{
			$longitud='';
			$latitud='';	
			}
			$streetAddress=htmlentities($detail['baseInformation']['address']['streetAddress'],ENT_NOQUOTES, 'UTF-8');
			$zipCode=htmlentities($detail['baseInformation']['address']['zipCode'],ENT_NOQUOTES, 'UTF-8');
			$postTown=htmlentities($detail['baseInformation']['address']['postTown'],ENT_NOQUOTES, 'UTF-8');
			$countryCode=htmlentities($detail['baseInformation']['address']['countryCode'] ,ENT_NOQUOTES, 'UTF-8');
			$country=htmlentities($detail['baseInformation']['address']['country'],ENT_NOQUOTES, 'UTF-8');
			$province=htmlentities($detail['baseInformation']['address']['province'],ENT_NOQUOTES, 'UTF-8');
			$city=htmlentities($detail['baseInformation']['address']['city'],ENT_NOQUOTES, 'UTF-8');
			$areaId=htmlentities($detail['baseInformation']['address']['areaId'],ENT_NOQUOTES, 'UTF-8'); 
			$propertyType=htmlentities($detail['baseInformation']['propertyType'],ENT_NOQUOTES, 'UTF-8'); 
			$startingPrice=htmlentities($detail['price']['startingPrice'],ENT_NOQUOTES, 'UTF-8'); 
			$currency=htmlentities($detail['price']['currency'],ENT_NOQUOTES, 'UTF-8'); 
			
			$stmt = $dbCon->prepare("update `vitech_property_address` set `area`=?  , `longitud` =? , `latitud`  =?, `streetAddress`=? , `zipCode` =? , `postTown` =? , `countryCode` =? , `country` =? , `province` =? , `city` =? , `areaId`=?, propertyType=?, startingPrice=?, currency=? where company_id=? and property_id=?")  ;
			 
			$stmt->bind_param("ssssssssssssssis", $area,$longitud,$latitud,$streetAddress,$zipCode,$postTown,$countryCode,$country,$province,$city,$areaId,$propertyType,$startingPrice,$currency,$company_id,$value['id']);
            $stmt->execute();
			
			if($detail['interior']['numberOfBedrooms']==null)
			{
			$numberOfBedrooms=0;
			}
			else
			{
			$numberOfBedrooms=$detail['interior']['numberOfBedrooms'];	
			}
			
			if($detail['interior']['numberOfRooms']==null)
			{
			$numberOfRooms=0;
			}
			else
			{
			$numberOfRooms=$detail['interior']['numberOfRooms'];	
			}
			
			
			if($detail['interior']['maxNumberOfBedrooms']==null)
			{
			$maxNumberOfBedrooms=0;
			}
			else
			{
			$maxNumberOfBedrooms=$detail['interior']['maxNumberOfBedrooms'];	
			}
			
			if($detail['interior']['numberOfBathrooms']==null)
			{
			$numberOfBathrooms=0;
			}
			else
			{
			$numberOfBathrooms=$detail['interior']['numberOfBathrooms'];	
			}
			
			$stmt = $dbCon->prepare("update `vitech_property_interior` set numberOfBedrooms=?,numberOfRooms=?,maxNumberOfBedrooms=?,numberOfBathrooms=?  where `property_id`=? and company_id=?")  ;
			 
			$stmt->bind_param("iiiisi",$numberOfBedrooms,$numberOfRooms,$maxNumberOfBedrooms,$numberOfBathrooms, $value['id'],$company_id);
            $stmt->execute();
			
			$buildingType=htmlentities($detail['building']['buildingType'],ENT_NOQUOTES, 'UTF-8');
			$buildingYear=htmlentities($detail['building']['buildingYear'],ENT_NOQUOTES, 'UTF-8'); 
			$elevator=htmlentities($detail['floorAndElevator']['elevator'],ENT_NOQUOTES, 'UTF-8');
			$floor=htmlentities($detail['floorAndElevator']['floor'],ENT_NOQUOTES, 'UTF-8');
			$energyClass=htmlentities($detail['energyDeclaration']['energyClass'],ENT_NOQUOTES, 'UTF-8');
			
			$stmt = $dbCon->prepare("update `vitech_property_building` set buildingType=?,buildingYear=? ,elevator=? ,totalNumberFloors=? ,floor=? ,energyClass=? where `property_id`=? and company_id=?")  ;
			 
			$stmt->bind_param("sssisssi",$buildingType,$buildingYear,$elevator,$totalNumberFloors,$floor,$energyClass, $value['id'],$company_id);
            $stmt->execute();
			
			$plotType=htmlentities($detail['plot']['plotType'],ENT_NOQUOTES, 'UTF-8');
			$otherPlot=htmlentities($detail['plot']['otherPlot'],ENT_NOQUOTES, 'UTF-8');
			
			$stmt = $dbCon->prepare("update `vitech_property_plot` set area=?,plotType=?,otherPlot=? where `property_id`=? and company_id=?")  ;
			 
			$stmt->bind_param("ssssi",$detail['plot']['area'],$plotType,$otherPlot, $value['id'],$company_id);
            $stmt->execute();
			
			$stmt = $dbCon->prepare("update `vitech_property_distance` set shoppingCentre=?,centre=?,airport=?,golfCource=?,sea=?,supermarket=?,pool=?,hospital=?,beach=? where `property_id` =?  and  company_id=?")  ;
			$stmt->bind_param("iiiiiiiiisi",$detail['distance']['shoppingCentre'],$detail['distance']['centre'],$detail['distance']['airport'],$detail['distance']['golfCource'],$detail['distance']['sea'],$detail['distance']['supermarket'],$detail['distance']['pool'],$detail['distance']['hospital'],$detail['distance']['beach'], $value['id'],$company_id);
			$stmt->execute();
			
			if($detail['exterior']['pool']==true)
			{
				$pool=1;
				$descriptionOfPool=htmlentities($detail['exterior']['descriptionOfPool'],ENT_NOQUOTES, 'UTF-8');
			}
			else
			{
				$pool=0;
				$descriptionOfPool='';
			}	
			
			if($detail['exterior']['terrace']==true)
			{
				$terrace=1;
				$terraceSurface=$detail['exterior']['terraceSurface'];
			}
			else
			{
				$terrace=0;
				$terraceSurface=0;
			}
			
			if($detail['exterior']['balcony']==true)
			{
				$balcony=1;
				$balconySurface=$detail['exterior']['balconySurface'];
				$descriptionTerraceAndBalcony=htmlentities($detail['exterior']['descriptionTerraceAndBalcony'],ENT_NOQUOTES, 'UTF-8');				
			}
			else
			{
				$balcony=0;
				$balconySurface=0;
				$descriptionTerraceAndBalcony='';	
			}
			
			$stmt = $dbCon->prepare("update `vitech_property_exterior` set pool=?,descriptionOfPool=?,terrace=?,terraceSurface=?,balcony=?,balconySurface=?,descriptionTerraceAndBalcony=? where `property_id` =? and  company_id=?")  ;
			 
			$stmt->bind_param("isiiiissi",$pool,$descriptionOfPool,$terrace,$terraceSurface,$balcony,$balconySurface,$descriptionTerraceAndBalcony, $value['id'],$company_id);
            $stmt->execute();
			
			}
			
		}
		
			
			 
		$stmt->close();
        $dbCon->close();
        return 1;
        
    }
	 
    function updateForeignPropertieDetails($data)
    {
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
		$URL = "https://connect.maklare.vitec.net/Estate/GetForeignProperty?estateId=".$property_id."&customerId=M19213";

		$ch = curl_init();
				 
		curl_setopt($ch, CURLOPT_USERNAME, "569");
		curl_setopt($ch, CURLOPT_PASSWORD, "Lg9uDAxjbSfVGJHFxaX7xCi52BtBb2jAAakorxtrKBLmFPBq2rm8k6B8v3r2El8Z");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $URL);
				 

		$resultData = curl_exec($ch);
		curl_close($ch);
		$detail=json_decode($resultData,true);
			// echo'<pre>'; print_r($detail); echo'</pre>'; die;
		$images='';
		foreach($detail['images']  as $categories1 => $value1)
		{
		$images=$images.$value1['imageId'].',';
		}
			$images=substr($images,0,-1);
			
			$stmt = $dbCon->prepare("select count(id) as num from vitech_properties  where company_id=? and id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("is", $company_id,$property_id);
			$stmt->execute();
			$result = $stmt->get_result();
		    $row = $result->fetch_assoc();
			if($row['num']==0)
			{
			header('location:../../listProperties/'.$data['cid']); die;
			}
			else
			{ 
			$stmt = $dbCon->prepare("update `vitech_properties` set images_info=?  where id=? and company_id=?")  ;
			 
			$stmt->bind_param("ssi", $images,$property_id,$company_id);
            $stmt->execute();
			}
			
			$stmt = $dbCon->prepare("select count(property_id) as num from vitech_property_description  where company_id=? and property_id=?");
			$stmt->bind_param("is", $company_id,$property_id);
			$stmt->execute();
			$result = $stmt->get_result();
		   	$rowDescription = $result->fetch_assoc();
			
			if($rowDescription['num']==0)
			{
			if(count($detail['description'])>0)
			{
				
			$sellPhrase=htmlentities($detail['description']['sellPhrase'],ENT_NOQUOTES, 'UTF-8');
			$generally=htmlentities($detail['description']['generally'],ENT_NOQUOTES, 'UTF-8');
			$sellingHeading=htmlentities($detail['description']['sellingHeading'],ENT_NOQUOTES, 'UTF-8');
			$shortSellingDescription=htmlentities($detail['description']['shortSellingDescription'],ENT_NOQUOTES, 'UTF-8');
			$longSellingDescription=htmlentities($detail['description']['longSellingDescription'],ENT_NOQUOTES, 'UTF-8');	
			}
			else
			{
				 
			$sellPhrase='';
			$generally='';
			$sellingHeading='';
			$shortSellingDescription='';
			$longSellingDescription='';
			}
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_description`( `property_id` , `sellPhrase` , `generally` , `sellingHeading` , `shortSellingDescription` , `longSellingDescription` ,company_id) values(?,?,?,?,?,?,?)")  ;
			 
			$stmt->bind_param("ssssssi", $property_id,$sellPhrase,$generally,$sellingHeading,$shortSellingDescription,$longSellingDescription,$company_id);
            $stmt->execute();
			
		
			$area=htmlentities($detail['baseInformation']['address']['area'],ENT_NOQUOTES, 'UTF-8');
			if(!empty($detail['baseInformation']['address']['coordinate']))
			{
			$longitud=$detail['baseInformation']['address']['coordinate']['longitud'];
			$latitud=$detail['baseInformation']['address']['coordinate']['latitud'];
			}
			else
			{
			$longitud='';
			$latitud='';	
			}
			$streetAddress=htmlentities($detail['baseInformation']['address']['streetAddress'],ENT_NOQUOTES, 'UTF-8');
			$zipCode=htmlentities($detail['baseInformation']['address']['zipCode'],ENT_NOQUOTES, 'UTF-8');
			$postTown=htmlentities($detail['baseInformation']['address']['postTown'],ENT_NOQUOTES, 'UTF-8');
			$countryCode=htmlentities($detail['baseInformation']['address']['countryCode'] ,ENT_NOQUOTES, 'UTF-8');
			$country=htmlentities($detail['baseInformation']['address']['country'],ENT_NOQUOTES, 'UTF-8');
			$province=htmlentities($detail['baseInformation']['address']['province'],ENT_NOQUOTES, 'UTF-8');
			$city=htmlentities($detail['baseInformation']['address']['city'],ENT_NOQUOTES, 'UTF-8');
			$areaId=htmlentities($detail['baseInformation']['address']['areaId'],ENT_NOQUOTES, 'UTF-8'); 
			$propertyType=htmlentities($detail['baseInformation']['propertyType'],ENT_NOQUOTES, 'UTF-8'); 
			$startingPrice=htmlentities($detail['price']['startingPrice'],ENT_NOQUOTES, 'UTF-8'); 
			$currency=htmlentities($detail['price']['currency'],ENT_NOQUOTES, 'UTF-8'); 
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_address`( `property_id` , `area`  , `longitud`  , `latitud`  , `streetAddress` , `zipCode`  , `postTown`  , `countryCode`  , `country`  , `province`  , `city`  , `areaId`, propertyType, startingPrice, currency, company_id) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)")  ;
			 
			$stmt->bind_param("sssssssssssssssi", $property_id,$area,$longitud,$latitud,$streetAddress,$zipCode,$postTown,$countryCode,$country,$province,$city,$areaId,$propertyType,$startingPrice,$currency,$company_id);
            $stmt->execute();
			
			if($detail['interior']['numberOfBedrooms']==null)
			{
			$numberOfBedrooms=0;
			}
			else
			{
			$numberOfBedrooms=$detail['interior']['numberOfBedrooms'];	
			}
			
			if($detail['interior']['numberOfRooms']==null)
			{
			$numberOfRooms=0;
			}
			else
			{
			$numberOfRooms=$detail['interior']['numberOfRooms'];	
			}
			
			
			if($detail['interior']['maxNumberOfBedrooms']==null)
			{
			$maxNumberOfBedrooms=0;
			}
			else
			{
			$maxNumberOfBedrooms=$detail['interior']['maxNumberOfBedrooms'];	
			}
			
			if($detail['interior']['numberOfBathrooms']==null)
			{
			$numberOfBathrooms=0;
			}
			else
			{
			$numberOfBathrooms=$detail['interior']['numberOfBathrooms'];	
			}
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_interior`( numberOfBedrooms,numberOfRooms,maxNumberOfBedrooms,numberOfBathrooms,`property_id` , company_id) values(?,?,?,?,?,?)")  ;
			 
			$stmt->bind_param("iiiisi",$numberOfBedrooms,$numberOfRooms,$maxNumberOfBedrooms,$numberOfBathrooms, $property_id,$company_id);
            $stmt->execute();
			
			
			$buildingType=htmlentities($detail['building']['buildingType'],ENT_NOQUOTES, 'UTF-8');
			$buildingYear=htmlentities($detail['building']['buildingYear'],ENT_NOQUOTES, 'UTF-8'); 
			$elevator=htmlentities($detail['floorAndElevator']['elevator'],ENT_NOQUOTES, 'UTF-8');
			$floor=htmlentities($detail['floorAndElevator']['floor'],ENT_NOQUOTES, 'UTF-8');
			$energyClass=htmlentities($detail['energyDeclaration']['energyClass'],ENT_NOQUOTES, 'UTF-8');
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_building`( buildingType,buildingYear,elevator,totalNumberFloors,floor,energyClass,`property_id` , company_id) values(?,?,?,?,?,?,?,?)")  ;
			 
			$stmt->bind_param("sssisssi",$buildingType,$buildingYear,$elevator,$totalNumberFloors,$floor,$energyClass, $property_id,$company_id);
            $stmt->execute();
			
			$plotType=htmlentities($detail['plot']['plotType'],ENT_NOQUOTES, 'UTF-8');
			$otherPlot=htmlentities($detail['plot']['otherPlot'],ENT_NOQUOTES, 'UTF-8');
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_plot`(area,plotType,otherPlot,`property_id` , company_id) values(?,?,?,?,?)")  ;
			 
			$stmt->bind_param("ssssi",$detail['plot']['area'],$plotType,$otherPlot, $property_id,$company_id);
            $stmt->execute();
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_distance`(shoppingCentre,centre,airport,golfCource,sea,supermarket,pool,hospital,beach,`property_id` , company_id) values(?,?,?,?,?,?,?,?,?,?,?)")  ;
			 
			$stmt->bind_param("iiiiiiiiisi",$detail['distance']['shoppingCentre'],$detail['distance']['centre'],$detail['distance']['airport'],$detail['distance']['golfCource'],$detail['distance']['sea'],$detail['distance']['supermarket'],$detail['distance']['pool'],$detail['distance']['hospital'],$detail['distance']['beach'], $property_id,$company_id);
            $stmt->execute();
			
			if($detail['exterior']['pool']==true)
			{
				$pool=1;
				$descriptionOfPool=htmlentities($detail['exterior']['descriptionOfPool'],ENT_NOQUOTES, 'UTF-8');
			}
			else
			{
				$pool=0;
				$descriptionOfPool='';
			}	
			
			if($detail['exterior']['terrace']==true)
			{
				$terrace=1;
				$terraceSurface=$detail['exterior']['terraceSurface'];
			}
			else
			{
				$terrace=0;
				$terraceSurface=0;
			}
			
			if($detail['exterior']['balcony']==true)
			{
				$balcony=1;
				$balconySurface=$detail['exterior']['balconySurface'];
				$descriptionTerraceAndBalcony=htmlentities($detail['exterior']['descriptionTerraceAndBalcony'],ENT_NOQUOTES, 'UTF-8');				
			}
			else
			{
				$balcony=0;
				$balconySurface=0;
				$descriptionTerraceAndBalcony='';	
			}
			
			$stmt = $dbCon->prepare("INSERT INTO `vitech_property_exterior`(pool,descriptionOfPool,terrace,terraceSurface,balcony,balconySurface,descriptionTerraceAndBalcony,`property_id` , company_id) values(?,?,?,?,?,?,?,?,?)")  ;
			 
			$stmt->bind_param("isiiiissi",$pool,$descriptionOfPool,$terrace,$terraceSurface,$balcony,$balconySurface,$descriptionTerraceAndBalcony, $property_id,$company_id);
            $stmt->execute();
			
			
			}
			else
			{
				 
			if(count($detail['description'])>0)
			{
				 
			$sellPhrase=htmlentities($detail['description']['sellPhrase'],ENT_NOQUOTES, 'UTF-8');
			$generally=htmlentities($detail['description']['generally'],ENT_NOQUOTES, 'UTF-8');
			$sellingHeading=htmlentities($detail['description']['sellingHeading'],ENT_NOQUOTES, 'UTF-8');
			$shortSellingDescription=htmlentities($detail['description']['shortSellingDescription'],ENT_NOQUOTES, 'UTF-8');
			$longSellingDescription=htmlentities($detail['description']['longSellingDescription'],ENT_NOQUOTES, 'UTF-8');	
			}
			else
			{
				 
			$sellPhrase='';
			$generally='';
			$sellingHeading='';
			$shortSellingDescription='';
			$longSellingDescription='';
			}
			
			 
			 
			$stmt = $dbCon->prepare("update `vitech_property_description` set `sellPhrase`=? , `generally`=? , `sellingHeading`=? , `shortSellingDescription`=? , `longSellingDescription`=?  where property_id=? and company_id=?")  ;
			 
			$stmt->bind_param("ssssssi", $sellPhrase,$generally,$sellingHeading,$shortSellingDescription,$longSellingDescription,$property_id,$company_id);
            $stmt->execute();
			
			
			$area=htmlentities($detail['baseInformation']['address']['area'],ENT_NOQUOTES, 'UTF-8');
			if(!empty($detail['baseInformation']['address']['coordinate']))
			{
			$longitud=$detail['baseInformation']['address']['coordinate']['longitud'];
			$latitud=$detail['baseInformation']['address']['coordinate']['latitud'];
			}
			else
			{
			$longitud='';
			$latitud='';	
			}
			$streetAddress=htmlentities($detail['baseInformation']['address']['streetAddress'],ENT_NOQUOTES, 'UTF-8');
			$zipCode=htmlentities($detail['baseInformation']['address']['zipCode'],ENT_NOQUOTES, 'UTF-8');
			$postTown=htmlentities($detail['baseInformation']['address']['postTown'],ENT_NOQUOTES, 'UTF-8');
			$countryCode=htmlentities($detail['baseInformation']['address']['countryCode'] ,ENT_NOQUOTES, 'UTF-8');
			$country=htmlentities($detail['baseInformation']['address']['country'],ENT_NOQUOTES, 'UTF-8');
			$province=htmlentities($detail['baseInformation']['address']['province'],ENT_NOQUOTES, 'UTF-8');
			$city=htmlentities($detail['baseInformation']['address']['city'],ENT_NOQUOTES, 'UTF-8');
			$areaId=htmlentities($detail['baseInformation']['address']['areaId'],ENT_NOQUOTES, 'UTF-8'); 
			$propertyType=htmlentities($detail['baseInformation']['propertyType'],ENT_NOQUOTES, 'UTF-8'); 
			$startingPrice=htmlentities($detail['price']['startingPrice'],ENT_NOQUOTES, 'UTF-8'); 
			$currency=htmlentities($detail['price']['currency'],ENT_NOQUOTES, 'UTF-8'); 
			
			$stmt = $dbCon->prepare("update `vitech_property_address` set `area`=?  , `longitud` =? , `latitud`  =?, `streetAddress`=? , `zipCode` =? , `postTown` =? , `countryCode` =? , `country` =? , `province` =? , `city` =? , `areaId`=?, propertyType=?, startingPrice=?, currency=? where company_id=? and property_id=?")  ;
			 
			$stmt->bind_param("ssssssssssssssis", $area,$longitud,$latitud,$streetAddress,$zipCode,$postTown,$countryCode,$country,$province,$city,$areaId,$propertyType,$startingPrice,$currency,$company_id,$property_id);
            $stmt->execute();
			
			if($detail['interior']['numberOfBedrooms']==null)
			{
			$numberOfBedrooms=0;
			}
			else
			{
			$numberOfBedrooms=$detail['interior']['numberOfBedrooms'];	
			}
			
			if($detail['interior']['numberOfRooms']==null)
			{
			$numberOfRooms=0;
			}
			else
			{
			$numberOfRooms=$detail['interior']['numberOfRooms'];	
			}
			
			
			if($detail['interior']['maxNumberOfBedrooms']==null)
			{
			$maxNumberOfBedrooms=0;
			}
			else
			{
			$maxNumberOfBedrooms=$detail['interior']['maxNumberOfBedrooms'];	
			}
			
			if($detail['interior']['numberOfBathrooms']==null)
			{
			$numberOfBathrooms=0;
			}
			else
			{
			$numberOfBathrooms=$detail['interior']['numberOfBathrooms'];	
			}
			
			$stmt = $dbCon->prepare("update `vitech_property_interior` set numberOfBedrooms=?,numberOfRooms=?,maxNumberOfBedrooms=?,numberOfBathrooms=?  where `property_id`=? and company_id=?")  ;
			 
			$stmt->bind_param("iiiisi",$numberOfBedrooms,$numberOfRooms,$maxNumberOfBedrooms,$numberOfBathrooms, $property_id,$company_id);
            $stmt->execute();
			
			$buildingType=htmlentities($detail['building']['buildingType'],ENT_NOQUOTES, 'UTF-8');
			$buildingYear=htmlentities($detail['building']['buildingYear'],ENT_NOQUOTES, 'UTF-8'); 
			$elevator=htmlentities($detail['floorAndElevator']['elevator'],ENT_NOQUOTES, 'UTF-8');
			$floor=htmlentities($detail['floorAndElevator']['floor'],ENT_NOQUOTES, 'UTF-8');
			$energyClass=htmlentities($detail['energyDeclaration']['energyClass'],ENT_NOQUOTES, 'UTF-8');
			
			$stmt = $dbCon->prepare("update `vitech_property_building` set buildingType=?,buildingYear=? ,elevator=? ,totalNumberFloors=? ,floor=? ,energyClass=? where `property_id`=? and company_id=?")  ;
			 
			$stmt->bind_param("sssisssi",$buildingType,$buildingYear,$elevator,$totalNumberFloors,$floor,$energyClass, $property_id,$company_id);
            $stmt->execute();
			
			$plotType=htmlentities($detail['plot']['plotType'],ENT_NOQUOTES, 'UTF-8');
			$otherPlot=htmlentities($detail['plot']['otherPlot'],ENT_NOQUOTES, 'UTF-8');
			
			$stmt = $dbCon->prepare("update `vitech_property_plot` set area=?,plotType=?,otherPlot=? where `property_id`=? and company_id=?")  ;
			 
			$stmt->bind_param("ssssi",$detail['plot']['area'],$plotType,$otherPlot, $property_id,$company_id);
            $stmt->execute();
			
			$stmt = $dbCon->prepare("update `vitech_property_distance` set shoppingCentre=?,centre=?,airport=?,golfCource=?,sea=?,supermarket=?,pool=?,hospital=?,beach=? where `property_id` =?  and  company_id=?")  ;
			$stmt->bind_param("iiiiiiiiisi",$detail['distance']['shoppingCentre'],$detail['distance']['centre'],$detail['distance']['airport'],$detail['distance']['golfCource'],$detail['distance']['sea'],$detail['distance']['supermarket'],$detail['distance']['pool'],$detail['distance']['hospital'],$detail['distance']['beach'], $property_id,$company_id);
			$stmt->execute();
			
			if($detail['exterior']['pool']==true)
			{
				$pool=1;
				$descriptionOfPool=htmlentities($detail['exterior']['descriptionOfPool'],ENT_NOQUOTES, 'UTF-8');
			}
			else
			{
				$pool=0;
				$descriptionOfPool='';
			}	
			
			if($detail['exterior']['terrace']==true)
			{
				$terrace=1;
				$terraceSurface=$detail['exterior']['terraceSurface'];
			}
			else
			{
				$terrace=0;
				$terraceSurface=0;
			}
			
			if($detail['exterior']['balcony']==true)
			{
				$balcony=1;
				$balconySurface=$detail['exterior']['balconySurface'];
				$descriptionTerraceAndBalcony=htmlentities($detail['exterior']['descriptionTerraceAndBalcony'],ENT_NOQUOTES, 'UTF-8');				
			}
			else
			{
				$balcony=0;
				$balconySurface=0;
				$descriptionTerraceAndBalcony='';	
			}
			
			$stmt = $dbCon->prepare("update `vitech_property_exterior` set pool=?,descriptionOfPool=?,terrace=?,terraceSurface=?,balcony=?,balconySurface=?,descriptionTerraceAndBalcony=? where `property_id` =? and  company_id=?")  ;
			 
			$stmt->bind_param("isiiiissi",$pool,$descriptionOfPool,$terrace,$terraceSurface,$balcony,$balconySurface,$descriptionTerraceAndBalcony, $property_id,$company_id);
            $stmt->execute();
			
			}
		
		$stmt->close(); 
        $dbCon->close();
        return 1;
        
    }
	 
	function fetchPropertiesImages($data)
    {
		
		ini_set('memory_limit', '-1');
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			
		$request_id= $this -> encrypt_decrypt('decrypt',$data['request_id']);
		
		$stmt = $dbCon->prepare("select * from vitech_property_broker_request where id=?");
		$stmt->bind_param("i", $request_id);
		$stmt->execute();
		$result1 = $stmt->get_result();
		$row1 = $result1->fetch_assoc();	

 		
			if($row1['request_type']==3)
			{
				$stmt = $dbCon->prepare("select * from vitech_property_photos where vitech_property_id=? and photo_type_info=3");
				
					/* bind parameters for markers */
					$stmt->bind_param("s", $property_id);
					$stmt->execute();
					$resultImages = $stmt->get_result();
					$org=array();
					$i=0;
					while($rowImages = $resultImages->fetch_assoc())
					{
						$filename="../estorecss/".$rowImages ['vitech_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowImages ['vitech_photo_path'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowImages ['vitech_photo_path'].'.jpg' ); $imgs=str_replace('../','https://www.qloudid.com/',$imgs);  } else {
						$imgs=""; }
						
						$row['image_path1']=$imgs;
						array_push($org,$row);
						$i++;
					}
			}
			else if($row1['request_type']==1)
			{
				$stmt = $dbCon->prepare("select * from vitech_property_photos where vitech_property_id=? and photo_type_info=1 and added_by_company=?");
				
					/* bind parameters for markers */
					$stmt->bind_param("si", $property_id,$row1['company_id']);
					$stmt->execute();
					$resultImages = $stmt->get_result();
					$org=array();
					$i=0;
					while($rowImages = $resultImages->fetch_assoc())
					{
						$filename="../estorecss/".$rowImages ['vitech_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowImages ['vitech_photo_path'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowImages ['vitech_photo_path'].'.jpg' ); $imgs=str_replace('../','https://www.qloudid.com/',$imgs);  } else {
						$imgs=""; }
						
						$row['image_path1']=$imgs;
						array_push($org,$row);
						$i++;
					}
			}
			else if($row1['request_type']==2)
			{
				$stmt = $dbCon->prepare("select * from vitech_property_photos where vitech_property_id=? and (photo_type_info=1 or photo_type_info=2) and added_by_company=?");
				
					/* bind parameters for markers */
					$stmt->bind_param("si", $property_id,$row1['company_id']);
					$stmt->execute();
					$resultImages = $stmt->get_result();
					$org=array();
					$i=0;
					while($rowImages = $resultImages->fetch_assoc())
					{
						$filename="../estorecss/".$rowImages ['vitech_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowImages ['vitech_photo_path'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowImages ['vitech_photo_path'].'.jpg' ); $imgs=str_replace('../','https://www.qloudid.com/',$imgs);  } else {
						$imgs=""; }
						
						$row['image_path1']=$imgs;
						array_push($org,$row);
						$i++;
					}
			}
			else
			{
				$stmt = $dbCon->prepare("select * from vitech_property_photos where vitech_property_id=? and photo_type_info=? and added_by_company=?");
				
					/* bind parameters for markers */
					$stmt->bind_param("sii", $property_id,$row1['company_id'],$row1['request_type']);
					$stmt->execute();
					$resultImages = $stmt->get_result();
					$org=array();
					$i=0;
					while($rowImages = $resultImages->fetch_assoc())
					{
						$filename="../estorecss/".$rowImages ['vitech_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowImages ['vitech_photo_path'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowImages ['vitech_photo_path'].'.jpg' ); $imgs=str_replace('../','https://www.qloudid.com/',$imgs);  } else {
						$imgs=""; }
						
						$row['image_path1']=$imgs;
						array_push($org,$row);
						$i++;
					}
			}
			
			/*$stmt = $dbCon->prepare("select is_updated from vitech_properties  where id=?");
        
			 
			$stmt->bind_param("i", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowProperty = $result->fetch_assoc();
			 $j=0;
			if($rowProperty['is_updated']==0)
			{
			$stmt = $dbCon->prepare("select images_info from vitech_properties  where company_id=? and id=?");
        
			 
			$stmt->bind_param("is", $company_id,$property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$row = $result->fetch_assoc();
			$a=explode(',',$row['images_info']);
			$j=0;
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
				$org[$j]['image_path1']=$imgs; 
				 
				$j++;				
			}	
			 
			$stmt = $dbCon->prepare("update vitech_properties set is_updated=1 where company_id=? and id=?");
         
			$stmt->bind_param("is", $company_id,$property_id);
			$stmt->execute();
			}
			else
			{
			$stmt = $dbCon->prepare("select images_info from vitech_properties  where company_id=? and id=?");
          
			$stmt->bind_param("is", $company_id,$property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$row = $result->fetch_assoc();
			  if(empty($row))
			  {
				$a=explode(',',$row['images_info']);
			$j=0;
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
				if(@is_array(getimagesize($imgs))){
					$image = true;
				} else {
					$image = false;
				}
				echo $image;
				$org[$j]['image_path1']=$imgs; 
				$j++;				
			}
			  
			  }
			  else
			  {
				  
				  $org[$j]['image_path1']='';
			  }
			}*/
			  
		$stmt->close();
        $dbCon->close();
        return $org;
        
    }
	
	function fetchPropertyStatus($data)
    {
		
		
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
		$request_id= $this -> encrypt_decrypt('decrypt',$data['request_id']);
		
		$stmt = $dbCon->prepare("select * from vitech_property_broker_request where id=?");
		$stmt->bind_param("i", $request_id);
		$stmt->execute();
		$result1 = $stmt->get_result();
		$row1 = $result1->fetch_assoc();	
		if($row1['request_type']==3)
		{
		$stmt = $dbCon->prepare("select is_activated from vitech_properties  where id=?");
        
			/* bind parameters for markers */
		$stmt->bind_param("s", $property_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$rowProperty = $result->fetch_assoc();	
		$stmt->close();
        $dbCon->close();
        return $rowProperty['is_activated'];
		}
		else
		{
		$stmt->close();
        $dbCon->close();
        return $row1['request_activated'];
		}			
			 
		
        
    }
	
	
	function fetchPropertyActivation($data)
    {
		
		
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
		$request_id= $this -> encrypt_decrypt('decrypt',$data['request_id']);
			 
			$stmt = $dbCon->prepare("select request_activated as is_activated from vitech_property_broker_request  where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowProperty = $result->fetch_assoc();
			 
		$stmt->close();
        $dbCon->close();
        return $rowProperty['is_activated'];
        
    }
	
	
	function fetchPropertyTaskInfo($data)
    {
		
		
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			 
			$stmt = $dbCon->prepare("select * from vitech_properties  where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("s", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowProperty = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("select * from user_logins  where email=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("s", $rowProperty['owner_email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUser = $result->fetch_assoc();
			if(empty($rowUser))
			{
				$rowProperty['first_name']='';
				$rowProperty['last_name']='';
			}
			else
			{
				$rowProperty['first_name']=$rowUser['first_name'];
				$rowProperty['last_name']=$rowUser['last_name'];
			}
			
			$stmt = $dbCon->prepare("select * from vitech_property_broker_request  where company_id=? and property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("is", $company_id,$property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUser = $result->fetch_assoc();
			
			$rowProperty['request_id']=$this->encrypt_decrypt('encrypt',$rowUser['id']);
		$stmt->close();
        $dbCon->close();
        return $rowProperty;
        
    }
	
	
	
	function fetchPropertyContacTInfo($data)
    {
		
		
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
		$request_id= $this -> encrypt_decrypt('decrypt',$data['request_id']);	
		$date=strtotime(date('Y-m-d'));
		
		$stmt = $dbCon->prepare("select * from vitech_property_broker_request  where id=?");
        
			/* bind parameters for markers */
		$stmt->bind_param("i", $request_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$rowProperty = $result->fetch_assoc();
		$rowProperty['property_status']=$rowProperty['request_type']; 
		if($rowProperty['is_approved']!=1)
		{
			header('location:../../../editPropertyContractInformation/'.$data['cid'].'/'.$data['pid'].'/'.$data['request_id']); die;
		}
		else
		{
			if($rowProperty['contract_start_date']<=$date && $rowProperty['contract_end_date']>=$date)
			{
				$stmt->close();
				$dbCon->close();
				return $rowProperty;
			}
			else
			{
			header('location:../../../editPropertyContractInformation/'.$data['cid'].'/'.$data['pid'].'/'.$data['request_id']); die;
			}
		}
		
        
    }
	
	
	function fetchPropertyContracTInfo($data)
    {
		
		
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
		$request_id= $this -> encrypt_decrypt('decrypt',$data['request_id']);	
		$date=strtotime(date('Y-m-d'));
		
		$stmt = $dbCon->prepare("select * from vitech_property_broker_request  where id=?");
        
			/* bind parameters for markers */
		$stmt->bind_param("i", $request_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$rowProperty = $result->fetch_assoc();
		$rowProperty['property_status']=$rowProperty['request_type']; 
		$stmt->close();
		$dbCon->close();
		return $rowProperty;
		
        
    }
	 
	
	function fetchPropertiesAddress($data)
    {
		
		
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			
			$stmt = $dbCon->prepare("select * from vitech_property_address  where property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("s", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			 $stmt = $dbCon->prepare("select * from vitech_properties  where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("s", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowProperty = $result->fetch_assoc();
			$row['is_reserved']=$rowProperty['is_reserved'];
			$stmt = $dbCon->prepare("select * from vitech_property_broker_request  where company_id=? and property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("is", $company_id,$property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowProperty = $result->fetch_assoc();
			
			$row['request_id']=$this -> encrypt_decrypt('encrypt',$rowProperty['id']);	
			$row['property_status']=$rowProperty['request_type'];
			$stmt->close();
			$dbCon->close();
			return $row;
        
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
			if($data['vitech_city_id']==$row['id'])
			{
				$select='selected';
			}
			else
			{
			$select='';	
			}
			$org=$org.'<option value="'.$row['id'].'" '.$select.' class=" changedText">'.$row['city_name'].'</option>'; 	
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
			if($data['vitech_area_id']==$row['id'])
			{
				$select='selected';
			}
			else
			{
			$select='';	
			}
			$org=$org.'<option value="'.$row['id'].'" '.$select.' class=" changedText">'.$row['area_name'].'</option>'; 	
			}
			$stmt->close();
			$dbCon->close();
			return $org;
        
    }
	
	function fetchPropertiesBuilding($data)
    {
		
		
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			
			$stmt = $dbCon->prepare("select * from vitech_property_building  where company_id=? and property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("is", $company_id,$property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row;
        
    }
	
	function fetchPropertiesDescription($data)
    {
		
		
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			
			$stmt = $dbCon->prepare("select * from vitech_property_description  where company_id=? and property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("is", $company_id,$property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row;
        
    }
	
	
	function fetchPropertiesDistance($data)
    {
		
		
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			
			$stmt = $dbCon->prepare("select * from vitech_property_distance  where company_id=? and property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("is", $company_id,$property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row;
        
    }
	
	function fetchPropertiesExterior($data)
    {
		
		
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			
			$stmt = $dbCon->prepare("select * from vitech_property_exterior  where company_id=? and property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("is", $company_id,$property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row;
        
    }
	
	
	function fetchPropertiesInterior($data)
    {
		
		
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			
			$stmt = $dbCon->prepare("select * from vitech_property_interior  where company_id=? and property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("is", $company_id,$property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row;
        
    }
	
	
	function fetchPropertiesPlot($data)
    {
		
		
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			
			$stmt = $dbCon->prepare("select * from vitech_property_plot  where company_id=? and property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("is", $company_id,$property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row;
        
    }
	  
	function activateProperty($data)
    {
		
		
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
		$request_id= $this -> encrypt_decrypt('decrypt',$data['request_id']);
		 
		
			$stmt = $dbCon->prepare("update vitech_property_address set vitech_region_id=?,vitech_area_id=?,vitech_city_id=? where  property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("iiis",$_POST['vitech_region_id'],$_POST['vitech_area_id'],$_POST['vitech_city_id'], $property_id);
			$stmt->execute();
			
			
			$fetchPropertyContacTInfo=$this->fetchPropertyContacTInfo($data);
			$_POST['longSellingDescription']=htmlentities($_POST['longSellingDescription'],ENT_NOQUOTES, 'ISO-8859-1');	

			if($fetchPropertyContacTInfo['request_type']==3)
			{
			$stmt = $dbCon->prepare("update vitech_properties set is_activated=1  where  id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("s", $property_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update vitech_property_description set longSellingDescription=? where  property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("ss",$_POST['longSellingDescription'], $property_id);
			$stmt->execute();	
			}
			$stmt = $dbCon->prepare("update vitech_property_broker_request set property_description_sell=?,request_activated=1  where  id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("si",$_POST['longSellingDescription'], $request_id);
			$stmt->execute();
			
			
			 
			$stmt->close();
			$dbCon->close();
			return 1;
        
    } 
	
	function deactivateProperty($data)
    {
		
		
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$property_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			
			$stmt = $dbCon->prepare("update vitech_property_address set vitech_region_id=?,vitech_area_id=?,vitech_city_id=? where  property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("iiis",$_POST['vitech_region_id'],$_POST['vitech_area_id'],$_POST['vitech_city_id'],$property_id);
			$stmt->execute();
			
			
			$fetchPropertyContacTInfo=$this->fetchPropertyContacTInfo($data);
			$_POST['longSellingDescription']=htmlentities($_POST['longSellingDescription'],ENT_NOQUOTES, 'ISO-8859-1');	 
			
			if($fetchPropertyContacTInfo['request_type']==3)
			{
			$stmt = $dbCon->prepare("update vitech_properties set is_activated=0  where  id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("s", $property_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update vitech_property_description set longSellingDescription=? where  property_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("ss",$_POST['longSellingDescription'], $property_id);
			$stmt->execute();	
			}
			$stmt = $dbCon->prepare("update vitech_property_broker_request set property_description_sell=?,request_activated=0 where  id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("si",$_POST['longSellingDescription'], $request_id);
			$stmt->execute();
			  
			$stmt->close();
			$dbCon->close();
			return 1;
        
    }
}