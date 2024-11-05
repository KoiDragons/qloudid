<?php
	require_once('../AppModel.php');
	class ResturantModel extends AppModel
	{
		function requestTableBooking($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select id,work_time from working_hrs where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['time_detail']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowTime = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("insert into resturant_table_booking_info(resturant_id,dining_hall_id,serve_type,company_size,booking_date, booking_time, booking_time_id, user_id,created_on)values(?,?,?,?,?,?,?,?, now())");
			$stmt->bind_param("iiiissii",$resturant_id,$_POST['dining_hall'],$_POST['serve_type'],$_POST['company_size'],$_POST['booking_date'],$rowTime['work_time'],$_POST['time_detail'],$data['user_id']);	
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
			function resturantTableAvailable($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			
			$stmt = $dbCon->prepare("select * from resturant_work_information where resturant_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($_POST['serve_type']==1)
			{
				$serve='breakfast';
			}
			else if($_POST['serve_type']==2)
			{
				$serve='brunch';
			}
			else if($_POST['serve_type']==3)
			{
				$serve='lunch';
			}
			else if($_POST['serve_type']==4)
			{
				$serve='dinner';
			}
			else if($_POST['serve_type']==5)
			{
				$serve='alcohol';
			}
			
			
			
			if($_POST['dining_hall']==0)
			{
			$stmt = $dbCon->prepare("select sum(table_info) as num from resturant_dining_hall_tables where dining_hall_id in (select id from resturant_dining_hall where resturant_id=?) ");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowTableCount = $result->fetch_assoc();	
			}
			else
			{
			$stmt = $dbCon->prepare("select sum(table_info) as num from resturant_dining_hall_tables where dining_hall_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['dining_hall']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowTableCount = $result->fetch_assoc();	
			}
			
			if($_POST['company_size']>$rowTableCount['num'])
			{
			return 1;	
			}
			
			$dateVal=strtolower(date('D',strtotime($_POST['booking_date'])));
			$indexVal=$serve.'_'.$dateVal.'_open';
			$option='<div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10">';
			if($row[$indexVal]==0)
			{
				return 0;
			}
			else 
			{
				$mini=$serve.'_minimum_time';
				$close=$serve.'_time_before_closing';
				$openIndex=$serve.'_'.$dateVal.'_open_time';
				$closeIndex=$serve.'_'.$dateVal.'_close_time';
				if($row[$openIndex]==$row[$closeIndex])
				{
				$stmt = $dbCon->prepare("select id,work_time from working_hrs");	
				}
				else
				{
				$stmt = $dbCon->prepare("select id from working_hrs where work_time=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("s", $row[$closeIndex]);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowClose = $result->fetch_assoc();
				$closeId=$rowClose['id']-$row[$close];
				$stmt = $dbCon->prepare("select id,work_time from working_hrs where id>=(select id from working_hrs where work_time=?) and id<?");
			
				/* bind parameters for markers */
				$stmt->bind_param("si", $row[$openIndex],$closeId);	
				}
				 
				$stmt->execute();
				$result = $stmt->get_result();
				$i=0;
				while($rowTime = $result->fetch_assoc())
				{
					if($i==0)
					{
						if($_POST['dining_hall']==0)
						{
						$stmt = $dbCon->prepare("select sum(table_info) as num from resturant_dining_hall_tables where dining_hall_id in (select id from resturant_dining_hall where resturant_id=?) and id not in (select reserved_table_id from resturant_table_booking_confirmation_info where reservation_date=? and reservation_time_id=?)");
						
						/* bind parameters for markers */
						$stmt->bind_param("isi", $resturant_id,$_POST['booking_date'],$rowTime['id']);
						$stmt->execute();
						$result2 = $stmt->get_result();
						$rowTableCount = $result2->fetch_assoc();	
						}
						else
						{
						$stmt = $dbCon->prepare("select sum(table_info) as num from resturant_dining_hall_tables where dining_hall_id=?  and id not in (select reserved_table_id from resturant_table_booking_confirmation_info where reservation_date=? and reservation_time_id=?)");
						
						/* bind parameters for markers */
						$stmt->bind_param("isi", $_POST['dining_hall'],$_POST['booking_date'],$rowTime['id']);
						$stmt->execute();
						$result3 = $stmt->get_result();
						$rowTableCount = $result3->fetch_assoc();	
						}
					 
						if($_POST['company_size']>$rowTableCount['num'])
						{
						$option=$option.'';	
						}
						else
						{
						$option=$option.'<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
						<input type="button" value="'.$rowTime['work_time'].'" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd green_bg  fsz18 white_txt curp" onclick="addType('.$rowTime['id'].');" id="'.$rowTime['id'].'">
						</div>';	
						}
						
						$i++;
					}
					else
					{
						$i++;
						if($i==$row[$mini])
						{
							$i=0;
						}
						 
					}
				}
			}
			
			
			
			$option=$option.'</div>';
			$stmt->close();
			$dbCon->close();
			return $option;
			
		}
	
		function resturantDiningHall($data)
		{ 
		 
			$dbCon = AppModel::createConnection();
			 $resturant_id=$this->encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select * from resturant_dining_hall where resturant_id=?");
			$stmt->bind_param("i", $resturant_id);
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
		function resturantWorkInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select * from resturant_work_information where resturant_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into resturant_work_information(resturant_id,created_on)values(?, now())");
			$stmt->bind_param("i",$resturant_id);	
			$stmt->execute();
			$stmt = $dbCon->prepare("select * from resturant_work_information where resturant_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $resturant_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();	
			}
			
			$option='';
			if($row['breakfast_available']==1 && $row['breakfast_booking']==1)
			{
			$option=$option.'<option value="1">Breakfast</option>';	
			}
			if($row['brunch_available']==1  && $row['brunch_booking']==1)
			{
			$option=$option.'<option value="2">Brunch</option>';	
			}
			if($row['lunch_available']==1  && $row['lunch_booking']==1)
			{
			$option=$option.'<option value="3">Lunch</option>';	
			}
			if($row['dinner_available']==1  && $row['dinner_booking']==1)
			{
			$option=$option.'<option value="4">Dinner</option>';	
			}
			if($row['alcohol_available']==1  && $row['alcohol_booking']==1)
			{
			$option=$option.'<option value="5">Beverages</option>';	
			}
			
			$stmt->close();
			$dbCon->close();
			return $option;
			
		}
		function resturantinfo($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select dress_code,table_reservation,pets_allowed, form_of_payment, broadcast_type, broadcast_channel, resturant_name,resturant_type, resturant_information.property_id,visiting_address,resturant_information.id  from resturant_information left join property_location on property_location.id=resturant_information.property_id where resturant_information.id=?");
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			 
			return $rowAvailable;
			
			
		}
		function completeMenu($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
			}
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select distinct serve_type from resturant_available_dishes where resturant_id=? order by serve_type");
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row= $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['category']=array();
				$i=0;
				$stmt = $dbCon->prepare("select distinct category_food,food_category,place_of_display from resturant_available_dishes left join food_category on food_category.id=resturant_available_dishes.category_food where resturant_available_dishes.resturant_id=? and serve_type=? order by place_of_display");
				$stmt->bind_param("ii", $resturant_id,$row['serve_type']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				while($rowCategory = $result1->fetch_assoc())
				{
					array_push($org[$j]['category'],$rowCategory);
					$k=0;
					$org[$j]['category'][$i]['dishes']=array();
					$stmt = $dbCon->prepare("select resturant_available_dishes.id,dish_name,dish_detail,dish_image,dish_price from resturant_available_dishes left join dishes_detail_information on dishes_detail_information.id=resturant_available_dishes.dish_id where resturant_id=? and serve_type=? and category_food=?");
					$stmt->bind_param("iii", $resturant_id,$row['serve_type'],$rowCategory['category_food']);
					$stmt->execute();
					$result2 = $stmt->get_result();
					while($rowDishes = $result2->fetch_assoc())
					{
						 $filename="../estorecss/".$rowDishes ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowDishes ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowDishes ['dish_image'].'.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; }
						array_push($org[$j]['category'][$i]['dishes'],$rowDishes);
						$org[$j]['category'][$i]['dishes'][$k]['enc']= $this -> encrypt_decrypt('encrypt',$rowDishes['id']);
						$org[$j]['category'][$i]['dishes'][$k]['dish_image']=$imgs;
						$k++;
					}
					$i++;
				}
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
	 
		
	 
		 
		
	}						