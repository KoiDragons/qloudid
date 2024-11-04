<?php
	require_once('../AppModel.php');
	class WellnessModel extends AppModel
	{
		function healthServiceRequests($data)
		{
			$dbCon = AppModel::createConnection();
			$wellness_id= $this -> encrypt_decrypt('decrypt',$data['wid']);
			$stmt = $dbCon->prepare("select hotel_wellness_services.id,hotel_name,company_name,is_approved from  hotel_wellness_services left join hotel_basic_information on hotel_wellness_services.hotel_property_id=hotel_basic_information.property_id left join companies on companies.id=hotel_wellness_services.hotel_company_id where wellness_id=? order by is_approved desc");
			$stmt->bind_param("i", $wellness_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowAvailable = $result->fetch_assoc())
			{
				$rowAvailable['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				array_push($org,$rowAvailable);
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			 
			return $org;
			
			
		}
		
		function updateHealthServiceMenu($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$roomservice_id= $this -> encrypt_decrypt('decrypt',$data['hid']);
			$dishes=substr($_POST['available_services'],0,-1);
			$stmt = $dbCon->prepare("update hotel_wellness_services set available_services=? where id=?");
			$stmt->bind_param("si",$dishes,$roomservice_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function approveHealthServiceRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("update hotel_wellness_services set is_approved=1 where id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		function healthServiceRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['hid']);
			$stmt = $dbCon->prepare("select available_services from  hotel_wellness_services  where id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			 
			return $rowAvailable;
			
			
		}
		
		
		 function completeHealthServiceMenuInfo($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
			}
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$wellness_id= $this -> encrypt_decrypt('decrypt',$data['wid']);
			$health_id= $this -> encrypt_decrypt('decrypt',$data['hid']);
			$stmt = $dbCon->prepare("select available_services from hotel_wellness_services where id=?");
			$stmt->bind_param("i", $health_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row= $result->fetch_assoc();
			$selected_dish=explode(',',$row['available_services']);
			
			
			$stmt = $dbCon->prepare("select distinct category_id,category_name,place_of_display from wellness_available_services left join wellness_categories on wellness_categories.id=wellness_available_services.category_id where wellness_available_services.wellness_id=? order by place_of_display");
			$stmt->bind_param("i", $wellness_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row= $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['dishes']=array();
				$i=0;
				 	$stmt = $dbCon->prepare("select wellness_available_services.id,dish_name,dish_detail,dish_image,dish_price,time_required from wellness_available_services left join dishes_detail_information on dishes_detail_information.id=wellness_available_services.service_id where wellness_id=? and category_id=?");
					$stmt->bind_param("ii", $wellness_id,$row['category_id']);
					$stmt->execute();
					$result2 = $stmt->get_result();
					while($rowDishes = $result2->fetch_assoc())
					{
						 $filename="../estorecss/".$rowDishes ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowDishes ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowDishes ['dish_image'].'.jpg' );  $imgs='../../../../'.$imgs; } else { $value_a="../../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../../html/usercontent/images/default-profile-pic.jpg"; }
						array_push($org[$j]['dishes'],$rowDishes);
						if (in_array($rowDishes['id'], $selected_dish))
						{
						$org[$j]['dishes'][$i]['is_selected']= 1;
						}
						else
						{
						$org[$j]['dishes'][$i]['is_selected']= 0;	
						}
						
						$org[$j]['dishes'][$i]['enc']= $this -> encrypt_decrypt('encrypt',$rowDishes['id']);
						$org[$j]['dishes'][$i]['dish_image']=$imgs;
						$i++;
					}
					 
				
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
	 
		
		function addCategory($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$wellness_id= $this -> encrypt_decrypt('decrypt',$data['wid']); 
			$c_name=htmlentities($_POST['c_name'],ENT_NOQUOTES, 'ISO-8859-1');
			 
			if($_POST['location_id']==0)
			{
			$stmt = $dbCon->prepare("select max(place_of_display) as num from wellness_categories where wellness_id=?");
			$stmt->bind_param("i", $wellness_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowLocation= $result->fetch_assoc();
			$place_of_display=$rowLocation['num']+1;
			}
			else
			{
				if($_POST['category_id']==0)
				{
				$stmt = $dbCon->prepare("select max(place_of_display) as num from wellness_categories where wellness_id=?");
				$stmt->bind_param("i", $wellness_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowLocation= $result->fetch_assoc();
				$place_of_display=$rowLocation['num']+1;	
				}
				else
				{
					if($_POST['location_id']==1)
					{
					$stmt = $dbCon->prepare("select place_of_display  from wellness_categories where id=?");
					$stmt->bind_param("i", $_POST['category_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$rowLocation= $result->fetch_assoc();
					$place_of_display=$rowLocation['place_of_display'];	
					$stmt = $dbCon->prepare("update wellness_categories set place_of_display=place_of_display+1 where place_of_display>=? and wellness_id=?");
					$stmt->bind_param("ii",$rowLocation['place_of_display'],$wellness_id);
					$stmt->execute();
					}
					else
					{
					$stmt = $dbCon->prepare("select place_of_display  from wellness_categories where id=?");
					$stmt->bind_param("i", $_POST['category_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$rowLocation= $result->fetch_assoc();
					$place_of_display=$rowLocation['place_of_display']+1;	
					$stmt = $dbCon->prepare("update wellness_categories set place_of_display=place_of_display+1 where place_of_display>? and wellness_id=?");
					$stmt->bind_param("ii",$rowLocation['place_of_display'],$wellness_id);
					$stmt->execute();	
					}
				}
			}
			
			 $stmt = $dbCon->prepare("insert into wellness_categories(wellness_id,category_name,created_on,modified_on,place_of_display)	values(?, ?, now(), now(), ?)");
			$stmt->bind_param("isi",$wellness_id,$c_name,$place_of_display);
			 
			 
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
		
		function deleteCategory($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$category_id= $this -> encrypt_decrypt('decrypt',$data['id']); 
			
			$stmt = $dbCon->prepare("delete from wellness_categories where id=?");
			$stmt->bind_param("i",$category_id);
			 
			 
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
		
		 function workingHrs($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
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
		function addService($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$wellness_id= $this -> encrypt_decrypt('decrypt',$data['wid']); 
			$a=explode(',',substr($_POST['service_type'],0,-1));
			foreach($a as $key)
			{
			 $stmt = $dbCon->prepare("insert into wellness_available_services(wellness_id, category_id,service_id,created_on)
			values(?, ?, ?, now())");
			$stmt->bind_param("iii",$wellness_id, $_POST['w_category'] ,$key);
			$stmt->execute();
			 
			}
		  
			$stmt->close();
			$dbCon->close();
			return 1; 
			 
		 
			
		}
		
		
		function deleteMenuItem($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$wellness_id= $this -> encrypt_decrypt('decrypt',$data['wid']); 
			$menu_id= $this -> encrypt_decrypt('decrypt',$data['mid']); 
		 
			$stmt = $dbCon->prepare("delete from wellness_available_services where id=?");
			$stmt->bind_param("i",$menu_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1; 
			 
		 
			
		}
		
		 function completeServiceInfo($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
			}
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$wellness_id= $this -> encrypt_decrypt('decrypt',$data['wid']);
			$stmt = $dbCon->prepare("select distinct category_id,category_name,place_of_display from wellness_available_services left join wellness_categories on wellness_categories.id=wellness_available_services.category_id where wellness_available_services.wellness_id=? order by place_of_display");
			$stmt->bind_param("i", $wellness_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row= $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['dishes']=array();
				$i=0;
				 	$stmt = $dbCon->prepare("select wellness_available_services.id,dish_name,dish_detail,dish_image,dish_price,time_required from wellness_available_services left join dishes_detail_information on dishes_detail_information.id=wellness_available_services.service_id where wellness_id=? and category_id=?");
					$stmt->bind_param("ii", $wellness_id,$row['category_id']);
					$stmt->execute();
					$result2 = $stmt->get_result();
					while($rowDishes = $result2->fetch_assoc())
					{
						 $filename="../estorecss/".$rowDishes ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowDishes ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowDishes ['dish_image'].'.jpg' );  $imgs='../../../../'.$imgs; } else { $value_a="../../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../../html/usercontent/images/default-profile-pic.jpg"; }
						array_push($org[$j]['dishes'],$rowDishes);
						$org[$j]['dishes'][$i]['enc']= $this -> encrypt_decrypt('encrypt',$rowDishes['id']);
						$org[$j]['dishes'][$i]['dish_image']=$imgs;
						$i++;
					}
					 
				
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
	 
		
		
		function allServices($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$wellness_id= $this -> encrypt_decrypt('decrypt',$data['wid']);
			
			$select="select services_available from employees where company_id=".$company_id." and (user_login_id in (select user_login_id from user_company_profile where location_id=(select property_id from wellness_center_information where id=".$wellness_id.")) or user_login_id=43)";
			$resultService=mysqli_query($dbCon, $select); 
			$service=''; 
			while($rowService=mysqli_fetch_array($resultService))
			  {
				   
				  $service=$service.$rowService['services_available'];
			  } 
			   
			$stmt = $dbCon->prepare("select id,dish_name from dishes_detail_information where company_id=? and id not in(select service_id from wellness_available_services where wellness_id=? and category_id=?) and dish_type >2 and is_physical=2 and find_in_set(id,?)");
			$stmt->bind_param("iiis", $company_id,$wellness_id,$_POST['catid'],$service);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				$org=$org.'<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h  lgtgrey_bg  brdr black_txt connect" onclick="addType('.$rowAvailable ['id'].');" id="'.$rowAvailable ['id'].'"> <span class="dblock pi1'.$j.'"></span>'.$rowAvailable['dish_name'].'</a>';
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		 function wellnessCategories($data)
		{
			$dbCon = AppModel::createConnection();
			$wellness_id= $this -> encrypt_decrypt('decrypt',$data['wid']);
			$stmt = $dbCon->prepare("select id,category_name  from wellness_categories  where wellness_id=(select center_type from wellness_center_information where id=?) order by place_of_display");
			$stmt->bind_param("i", $wellness_id);
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
		
		function wellnessDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select center_type,center_name,visiting_address,wellness_center_information.id  from wellness_center_information left join property_location on property_location.id=wellness_center_information.property_id where wellness_center_information.company_id=? limit 0,5");
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
		
		function wellnessDetailInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$wellness_id= $this -> encrypt_decrypt('decrypt',$data['wid']);
			$stmt = $dbCon->prepare("select center_name,center_type, wellness_center_information.property_id, wellness_center_information.company_id, mon_open,mon_open_time,mon_close_time,tue_open,tue_open_time,tue_close_time,wed_open,wed_open_time,wed_close_time,thu_open,thu_open_time,thu_close_time,fri_open,fri_open_time,fri_close_time,sat_open,sat_open_time,sat_close_time,sun_open,sun_open_time,sun_close_time,visiting_address,wellness_center_information.id  from wellness_center_information left join property_location on property_location.id=wellness_center_information.property_id where wellness_center_information.id=?");
			$stmt->bind_param("i", $wellness_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $rowAvailable;
			
			
		}
		
		function addWellnessInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			$center_name=htmlentities($_POST['center_name'],ENT_NOQUOTES, 'ISO-8859-1');
			 if($_POST['day1']==1)
			 {
				 $mon_open=1;
				 $mon_open_time=$_POST['m_open'];
				 $mon_close_time=$_POST['m_close'];
				 
			 }
			 else
			 {
				 $mon_open=0;
				 $mon_open_time='';
				 $mon_close_time='';
				 
			 }	
			 if($_POST['day2']==1)
			 {
				 $tue_open=1;
				 $tue_open_time=$_POST['tue_open'];
				 $tue_close_time=$_POST['tue_close'];
				 
			 }
			 else
			 {
				 $tue_open=0;
				 $tue_open_time='';
				 $tue_close_time='';
				 
			 }
			if($_POST['day3']==1)
			 {
				 $wed_open=1;
				 $wed_open_time=$_POST['wed_open'];
				 $wed_close_time=$_POST['wed_close'];
				 
			 }
			 else
			 {
				 $wed_open=0;
				 $wed_open_time='';
				 $wed_close_time='';
				 
			 }
			if($_POST['day4']==1)
			 {
				 $thu_open=1;
				 $thu_open_time=$_POST['thu_open'];
				 $thu_close_time=$_POST['thu_close'];
				 
			 }
			 else
			 {
				 $thu_open=0;
				 $thu_open_time='';
				 $thu_close_time='';
				 
			 }
			 if($_POST['day5']==1)
			 {
				 $fri_open=1;
				 $fri_open_time=$_POST['fri_open'];
				 $fri_close_time=$_POST['fri_close'];
				 
			 }
			 else
			 {
				 $fri_open=0;
				 $fri_open_time='';
				 $fri_close_time='';
				 
			 }
			 if($_POST['day6']==1)
			 {
				 $sat_open=1;
				 $sat_open_time=$_POST['sat_open'];
				 $sat_close_time=$_POST['sat_close'];
				 
			 }
			 else
			 {
				 $sat_open=0;
				 $sat_open_time='';
				 $sat_close_time='';
				 
			 }
			 if($_POST['day7']==1)
			 {
				 $sun_open=1;
				 $sun_open_time=$_POST['sun_open'];
				 $sun_close_time=$_POST['sun_close'];
				 
			 }
			 else
			 {
				 $sun_open=0;
				 $sun_open_time='';
				 $sun_close_time='';
				 
			 }
			
			 $stmt = $dbCon->prepare("insert into wellness_center_information(center_name,center_type, property_id,company_id,created_on, modified_on,mon_open,mon_open_time,mon_close_time,tue_open,tue_open_time,tue_close_time,wed_open,wed_open_time,wed_close_time,thu_open,thu_open_time,thu_close_time,fri_open,fri_open_time,fri_close_time,sat_open,sat_open_time,sat_close_time,sun_open,sun_open_time,sun_close_time)
			values(?, ?, ?, ?, now(), now(),?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?)");
			$stmt->bind_param("siiiissississississississ",$center_name, $_POST['center_type'], $_POST['p_id'] ,$company_id,$mon_open,$mon_open_time,$mon_close_time,$tue_open,$tue_open_time,$tue_close_time,$wed_open,$wed_open_time,$wed_close_time,$thu_open,$thu_open_time,$thu_close_time,$fri_open,$fri_open_time,$fri_close_time,$sat_open,$sat_open_time,$sat_close_time,$sun_open,$sun_open_time,$sun_close_time);
			 
			 
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
		
		
		function editWellnessInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$wellness_id= $this -> encrypt_decrypt('decrypt',$data['wid']); 
			$center_name=htmlentities($_POST['center_name'],ENT_NOQUOTES, 'ISO-8859-1');
			 if($_POST['day1']==1)
			 {
				 $mon_open=1;
				 $mon_open_time=$_POST['m_open'];
				 $mon_close_time=$_POST['m_close'];
				 
			 }
			 else
			 {
				 $mon_open=0;
				 $mon_open_time='';
				 $mon_close_time='';
				 
			 }	
			 if($_POST['day2']==1)
			 {
				 $tue_open=1;
				 $tue_open_time=$_POST['tue_open'];
				 $tue_close_time=$_POST['tue_close'];
				 
			 }
			 else
			 {
				 $tue_open=0;
				 $tue_open_time='';
				 $tue_close_time='';
				 
			 }
			if($_POST['day3']==1)
			 {
				 $wed_open=1;
				 $wed_open_time=$_POST['wed_open'];
				 $wed_close_time=$_POST['wed_close'];
				 
			 }
			 else
			 {
				 $wed_open=0;
				 $wed_open_time='';
				 $wed_close_time='';
				 
			 }
			if($_POST['day4']==1)
			 {
				 $thu_open=1;
				 $thu_open_time=$_POST['thu_open'];
				 $thu_close_time=$_POST['thu_close'];
				 
			 }
			 else
			 {
				 $thu_open=0;
				 $thu_open_time='';
				 $thu_close_time='';
				 
			 }
			 if($_POST['day5']==1)
			 {
				 $fri_open=1;
				 $fri_open_time=$_POST['fri_open'];
				 $fri_close_time=$_POST['fri_close'];
				 
			 }
			 else
			 {
				 $fri_open=0;
				 $fri_open_time='';
				 $fri_close_time='';
				 
			 }
			 if($_POST['day6']==1)
			 {
				 $sat_open=1;
				 $sat_open_time=$_POST['sat_open'];
				 $sat_close_time=$_POST['sat_close'];
				 
			 }
			 else
			 {
				 $sat_open=0;
				 $sat_open_time='';
				 $sat_close_time='';
				 
			 }
			 if($_POST['day7']==1)
			 {
				 $sun_open=1;
				 $sun_open_time=$_POST['sun_open'];
				 $sun_close_time=$_POST['sun_close'];
				 
			 }
			 else
			 {
				 $sun_open=0;
				 $sun_open_time='';
				 $sun_close_time='';
				 
			 }
			
			 $stmt = $dbCon->prepare("update wellness_center_information set center_name=?,center_type=?, property_id=?,company_id=?, modified_on=now(),mon_open=?,mon_open_time=?,mon_close_time=?,tue_open=?,tue_open_time=?,tue_close_time=?,wed_open=?,wed_open_time=?,wed_close_time=?,thu_open=?,thu_open_time=?,thu_close_time=?,fri_open=?,fri_open_time=?,fri_close_time=?,sat_open=?,sat_open_time=?,sat_close_time=?,sun_open=?,sun_open_time=?,sun_close_time=? where id=?");
			$stmt->bind_param("siiiissississississississi",$center_name, $_POST['center_type'], $_POST['p_id'] ,$company_id,$mon_open,$mon_open_time,$mon_close_time,$tue_open,$tue_open_time,$tue_close_time,$wed_open,$wed_open_time,$wed_close_time,$thu_open,$thu_open_time,$thu_close_time,$fri_open,$fri_open_time,$fri_close_time,$sat_open,$sat_open_time,$sat_close_time,$sun_open,$sun_open_time,$sun_close_time,$wellness_id);
			 
			 
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
		
		
	 function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$country_id= $data['country_id'];
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=42");
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
		
	 
		
	 
			function teamId($data)
		{
			
			return $this -> encrypt_decrypt('decrypt',$data['team_id']);
		}
		
		function appId()
		{
			
			return $this -> encrypt_decrypt('encrypt',42);
		}
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=40");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
		
		   
		function wellnessCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from wellness_center_information where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
			function moreWellnessDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select center_type,center_name,visiting_address,wellness_center_information.id  from wellness_center_information left join property_location on property_location.id=wellness_center_information.property_id where wellness_center_information.company_id=? limit ?,? ");
			
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
				$org=$org.'<a href="../editWellnessInformation/'.$data['cid'].'/'.$enc.'"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.'  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 hidden-xs "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['center_name'],0,1).'</div>
																	</div>
													
													<div class="fleft wi_60   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">'.$row['center_name'].'</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">'.$row['visiting_address'].'</span>  </div>
													
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div>
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
		
		function userAccount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,first_name,last_name,sex,dob_day,dob_month,dob_year,created_on  from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function employeeAccount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select ssn,address from user_profiles  where user_logins_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$stmt = $dbCon->prepare("INSERT INTO user_profiles (user_logins_id, created_on , modified_on ) VALUES (?, now(), now())");
				
				
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
			}
			$stmt = $dbCon->prepare("select ssn,address from user_profiles  where user_logins_id=?");
			
			/* bind parameters for markers */
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
		
		 
		
	}						