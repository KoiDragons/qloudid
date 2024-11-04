<?php
	require_once('../AppModel.php');
	class DryCleaningModel extends AppModel
	{
		function roomServiceRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['hid']);
			$stmt = $dbCon->prepare("select available_services from  hotel_drycleaning_services  where id=?");
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			 
			return $rowAvailable;
			
			
		}
		  function completeRoomServiceMenu($data)
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
			$drycleaner_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$roomservice_id= $this -> encrypt_decrypt('decrypt',$data['hid']);
			$stmt = $dbCon->prepare("select available_services from hotel_drycleaning_services where id=?");
			$stmt->bind_param("i", $roomservice_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row= $result->fetch_assoc();
			$selected_dish=explode(',',$row['available_services']);
			
			$stmt = $dbCon->prepare("select category_id,category_name from drycleaning_category_info  where drycleaner_id=? and is_active=1 order by category_id");
			$stmt->bind_param("i", $drycleaner_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row= $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['category']=array();
				$i=0;
				 
					$stmt = $dbCon->prepare("select drycleaning_services.id,article_name,price from drycleaning_services left join drycleaning_articles on drycleaning_articles.id=drycleaning_services.service_id where drycleaner_id=? and category_id=?");
					$stmt->bind_param("ii", $drycleaner_id,$row['category_id']);
					$stmt->execute();
					$result2 = $stmt->get_result();
					while($rowDishes = $result2->fetch_assoc())
					{
						 
						array_push($org[$j]['category'],$rowDishes);
						
						if (in_array($rowDishes['id'], $selected_dish))
						{
						$org[$j]['category'][$i]['is_selected']= 1;
						}
						else
						{
						$org[$j]['category'][$i]['is_selected']= 0;	
						}
						
						 
						$i++;
						
					}
				$j++;	 
			 
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
	 
	  function updateRoomServiceMenu($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$roomservice_id= $this -> encrypt_decrypt('decrypt',$data['hid']);
			$dishes=substr($_POST['available_dishes'],0,-1);
			$stmt = $dbCon->prepare("update hotel_drycleaning_services set available_services=? where id=?");
			$stmt->bind_param("si",$dishes,$roomservice_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		 
		function roomServiceRequests($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select hotel_drycleaning_services.id,hotel_name,company_name,is_roomservice from  hotel_drycleaning_services left join hotel_basic_information on hotel_drycleaning_services.hotel_property_id=hotel_basic_information.property_id left join companies on companies.id=hotel_drycleaning_services.hotel_company_id where drycleaning_id=? order by is_roomservice desc");
			$stmt->bind_param("i", $resturant_id);
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
		
		function approveRoomServiceRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("update hotel_drycleaning_services set is_roomservice=1 where id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
	 function addDryCleaningPriceInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$drycleaning_id= $this -> encrypt_decrypt('decrypt',$data['wid']); 
			
			$stmt = $dbCon->prepare("insert into drycleaning_services(drycleaner_id,category_id,service_id,created_on,price)
			values(?, ?, ?, now(), ?)");
			$stmt->bind_param("iiii", $drycleaning_id,$_POST['category_id'] ,$_POST['service_id'] ,$_POST['price_detail']);
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
		
		function updateDryCleaningPriceInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$service_id= $this -> encrypt_decrypt('decrypt',$data['sid']); 
			
			$stmt = $dbCon->prepare("update drycleaning_services set price=? where id=?");
			$stmt->bind_param("ii", $_POST['price_detail'] ,$service_id);
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
		
		function availableServicesType($data)
		{
			$dbCon = AppModel::createConnection();
			$DryCleaning_id= $this -> encrypt_decrypt('decrypt',$data['wid']);
			$stmt = $dbCon->prepare("select * from drycleaning_articles where id not in (select service_id from drycleaning_services where drycleaner_id=? and category_id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $DryCleaning_id,$data['category_id']); 
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<div class="css-1jzh2co marb15"><div class="chip-container">';
			 
			while($row = $result->fetch_assoc())
			{
				$org=$org.' <a href="javascript:void(0);" onclick="updateServiceId('.$row['id'].');"><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">'.$row['article_name'].'</span>
															   </span>
															</span>
														 </div>
													  </div></a>';
				 
			}
			 $org=$org.' </div> </div>';
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function selectedServicesType($data)
		{
			$dbCon = AppModel::createConnection();
			$DryCleaning_id= $this -> encrypt_decrypt('decrypt',$data['wid']);
			$stmt = $dbCon->prepare("select * from drycleaning_articles where id not in (select service_id from drycleaning_services where drycleaner_id=? and category_id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $DryCleaning_id,$data['category_id']); 
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<div class="css-1jzh2co marb15"><div class="chip-container">';
			 
			while($row = $result->fetch_assoc())
			{
				if($_POST['id']==$row['id'])
				{
				$org=$org.' <a href="javascript:void(0);" onclick="updateServiceId('.$row['id'].');"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">'.$row['article_name'].'</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
				}
				else
				{
				$org=$org.' <a href="javascript:void(0);" onclick="updateServiceId('.$row['id'].');"><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">'.$row['article_name'].'</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
				}
				
				 
			}
			 $org=$org.' </div> </div>';
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		 
		 function drycleaningServices($data)
		{
			$dbCon = AppModel::createConnection();
			$DryCleaning_id= $this -> encrypt_decrypt('decrypt',$data['wid']);
			$stmt = $dbCon->prepare("select drycleaning_services.id,price,article_name from drycleaning_services left join drycleaning_articles on drycleaning_articles.id= drycleaning_services.service_id where drycleaner_id=? and category_id=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $DryCleaning_id); 
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
		
		function drycleaningServicesCount($data)
		{
			$dbCon = AppModel::createConnection();
			$DryCleaning_id= $this -> encrypt_decrypt('decrypt',$data['wid']);
			$stmt = $dbCon->prepare("select count(id) as num from drycleaning_services where drycleaner_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $DryCleaning_id); 
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
			
			
		}
		
		function washingServices($data)
		{
			$dbCon = AppModel::createConnection();
			$DryCleaning_id= $this -> encrypt_decrypt('decrypt',$data['wid']);
			$stmt = $dbCon->prepare("select drycleaning_services.id,price,article_name from drycleaning_services left join drycleaning_articles on drycleaning_articles.id= drycleaning_services.service_id where drycleaner_id=? and category_id=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $DryCleaning_id); 
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
		
		function ironingServices($data)
		{
			$dbCon = AppModel::createConnection();
			$DryCleaning_id= $this -> encrypt_decrypt('decrypt',$data['wid']);
			$stmt = $dbCon->prepare("select drycleaning_services.id,price,article_name from drycleaning_services left join drycleaning_articles on drycleaning_articles.id= drycleaning_services.service_id where drycleaner_id=? and category_id=3");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $DryCleaning_id); 
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
	  
		function dryCleaningDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select center_name,visiting_address,drycleaning_center_information.id  from drycleaning_center_information left join property_location on property_location.id=drycleaning_center_information.property_id where drycleaning_center_information.company_id=? limit 0,5");
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
		
		
		function dryCleaningServiceDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$service_id= $this -> encrypt_decrypt('decrypt',$data['sid']);
			$stmt = $dbCon->prepare("select category_id,price,article_name,service_id  from drycleaning_services left join drycleaning_articles on drycleaning_articles.id=drycleaning_services.service_id where drycleaning_services.id=?");
			$stmt->bind_param("i", $service_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $rowAvailable;
			
			
		}
		
		function dryCleaningDetailInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$DryCleaning_id= $this -> encrypt_decrypt('decrypt',$data['wid']);
			$stmt = $dbCon->prepare("select drycleaning,washing,ironing,center_name, drycleaning_center_information.property_id, drycleaning_center_information.company_id, mon_open,mon_open_time,mon_close_time,tue_open,tue_open_time,tue_close_time,wed_open,wed_open_time,wed_close_time,thu_open,thu_open_time,thu_close_time,fri_open,fri_open_time,fri_close_time,sat_open,sat_open_time,sat_close_time,sun_open,sun_open_time,sun_close_time,visiting_address,drycleaning_center_information.id  from drycleaning_center_information left join property_location on property_location.id=drycleaning_center_information.property_id where drycleaning_center_information.id=?");
			$stmt->bind_param("i", $DryCleaning_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			if($rowAvailable['drycleaning']==1 && $rowAvailable['washing']==1 && $rowAvailable['ironing']==1)
			{
				$rowAvailable['total']=3;
				$rowAvailable['min']=0;
				$rowAvailable['diff']=1;
			}
			else if($rowAvailable['drycleaning']==0 && $rowAvailable['washing']==1 && $rowAvailable['ironing']==1)
			{
				$rowAvailable['total']=3;
				$rowAvailable['min']=1;
				$rowAvailable['diff']=1;
			}
			else if($rowAvailable['drycleaning']==0 && $rowAvailable['washing']==0 && $rowAvailable['ironing']==1)
			{
				$rowAvailable['total']=3;
				$rowAvailable['min']=3;
				$rowAvailable['diff']=1;
			}
			else if($rowAvailable['drycleaning']==1 && $rowAvailable['washing']==0 && $rowAvailable['ironing']==1)
			{
				$rowAvailable['total']=3;
				$rowAvailable['min']=0;
				$rowAvailable['diff']=2;
			}
			else if($rowAvailable['drycleaning']==1 && $rowAvailable['washing']==0 && $rowAvailable['ironing']==0)
			{
				$rowAvailable['total']=1;
				$rowAvailable['min']=0;
				$rowAvailable['diff']=1;
			}
			else if($rowAvailable['drycleaning']==0 && $rowAvailable['washing']==1 && $rowAvailable['ironing']==0)
			{
				$rowAvailable['total']=2;
				$rowAvailable['min']=2;
				$rowAvailable['diff']=1;
			}
			else if($rowAvailable['drycleaning']==1 && $rowAvailable['washing']==1 && $rowAvailable['ironing']==0)
			{
				$rowAvailable['total']=2;
				$rowAvailable['min']=0;
				$rowAvailable['diff']=1;
			}
			else if($rowAvailable['drycleaning']==0 && $rowAvailable['washing']==0 && $rowAvailable['ironing']==0)
			{
				$rowAvailable['total']=0;
				$rowAvailable['min']=0;
				$rowAvailable['diff']=0;
			}
			$stmt->close();
			$dbCon->close();
			return $rowAvailable;
			
			
		}
		
		function addDryCleaningInfo($data)
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
			
			 $stmt = $dbCon->prepare("insert into drycleaning_center_information(center_name, property_id,company_id,created_on, modified_on,mon_open,mon_open_time,mon_close_time,tue_open,tue_open_time,tue_close_time,wed_open,wed_open_time,wed_close_time,thu_open,thu_open_time,thu_close_time,fri_open,fri_open_time,fri_close_time,sat_open,sat_open_time,sat_close_time,sun_open,sun_open_time,sun_close_time,drycleaning,washing,ironing)
			values(?, ?, ?, now(), now(),?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?)");
			$stmt->bind_param("siiissississississississiii",$center_name, $_POST['p_id'] ,$company_id,$mon_open,$mon_open_time,$mon_close_time,$tue_open,$tue_open_time,$tue_close_time,$wed_open,$wed_open_time,$wed_close_time,$thu_open,$thu_open_time,$thu_close_time,$fri_open,$fri_open_time,$fri_close_time,$sat_open,$sat_open_time,$sat_close_time,$sun_open,$sun_open_time,$sun_close_time,$_POST['dry1'] ,$_POST['dry2'] ,$_POST['dry3']);
			 
			 
			if($stmt->execute())
			{
				$id=$stmt->insert_id;
				$c=1;
				$cn="Drycleaning";
				$stmt = $dbCon->prepare("insert into drycleaning_category_info(category_name,category_id, drycleaner_id,is_active)values(?, ?,?, ?)");
				$stmt->bind_param("siii",$cn,$c,$id,$_POST['dry1']);
				$stmt->execute();
				$c=2;
				$cn="Wash";
				$stmt = $dbCon->prepare("insert into drycleaning_category_info(category_name,category_id, drycleaner_id,is_active)values(?, ?,?, ?)");
				$stmt->bind_param("siii",$cn,$c,$id,$_POST['dry2']);
				$stmt->execute();
				$c=3;
				$cn="Ironing";
				$stmt = $dbCon->prepare("insert into drycleaning_category_info(category_name,category_id, drycleaner_id,is_active)values(?, ?,?, ?)");
				$stmt->bind_param("siii",$cn,$c,$id,$_POST['dry3']);
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
		
		
		function editDryCleaningInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$DryCleaning_id= $this -> encrypt_decrypt('decrypt',$data['wid']); 
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
			 
			 $stmt = $dbCon->prepare("update drycleaning_center_information set center_name=?, property_id=?,company_id=?, modified_on=now(),mon_open=?,mon_open_time=?,mon_close_time=?,tue_open=?,tue_open_time=?,tue_close_time=?,wed_open=?,wed_open_time=?,wed_close_time=?,thu_open=?,thu_open_time=?,thu_close_time=?,fri_open=?,fri_open_time=?,fri_close_time=?,sat_open=?,sat_open_time=?,sat_close_time=?,sun_open=?,sun_open_time=?,sun_close_time=?,drycleaning=?,washing=?,ironing=? where id=?");
			$stmt->bind_param("siiissississississississiiii",$center_name, $_POST['p_id'] ,$company_id,$mon_open,$mon_open_time,$mon_close_time,$tue_open,$tue_open_time,$tue_close_time,$wed_open,$wed_open_time,$wed_close_time,$thu_open,$thu_open_time,$thu_close_time,$fri_open,$fri_open_time,$fri_close_time,$sat_open,$sat_open_time,$sat_close_time,$sun_open,$sun_open_time,$sun_close_time,$_POST['dry1'] ,$_POST['dry2'] ,$_POST['dry3'],$DryCleaning_id);
			 
			 
			if($stmt->execute())
			{
				$c=1;
				$stmt = $dbCon->prepare("update drycleaning_category_info set is_active=? where category_id=? and  drycleaner_id=?");
				$stmt->bind_param("iii",$_POST['dry1'],$c,$DryCleaning_id);
				$stmt->execute();
				$c=2;
				$stmt = $dbCon->prepare("update drycleaning_category_info set is_active=? where category_id=? and  drycleaner_id=?");
				$stmt->bind_param("iii",$_POST['dry2'],$c,$DryCleaning_id);
				$stmt->execute();
				$c=3;
				$stmt = $dbCon->prepare("update drycleaning_category_info set is_active=? where category_id=? and  drycleaner_id=?");
				$stmt->bind_param("iii",$_POST['dry3'],$c,$DryCleaning_id);
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
		
		
	 function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$country_id= $data['country_id'];
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=48");
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
			
			return $this -> encrypt_decrypt('encrypt',48);
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
		
		   
		function dryCleaningCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from drycleaning_center_information where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
			function moreDryCleaningDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select center_name,visiting_address,drycleaning_center_information.id  from drycleaning_center_information left join property_location on property_location.id=drycleaning_center_information.property_id where drycleaning_center_information.company_id=? limit ?,? ");
			
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
				$org=$org.'<a href="../editDryCleaningInformation/'.$data['cid'].'/'.$enc.'"><div class="column_m container  marb5   fsz14 dark_grey_txt">
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