<?php
	require_once('../AppModel.php');
	class WellnessModel extends AppModel
	{
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
				 	$stmt = $dbCon->prepare("select wellness_available_services.id,dish_name,dish_detail,dish_image,dish_price from wellness_available_services left join dishes_detail_information on dishes_detail_information.id=wellness_available_services.service_id where wellness_id=? and category_id=?");
					$stmt->bind_param("ii", $wellness_id,$row['category_id']);
					$stmt->execute();
					$result2 = $stmt->get_result();
					while($rowDishes = $result2->fetch_assoc())
					{
						 $filename="../estorecss/".$rowDishes ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowDishes ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowDishes ['dish_image'].'.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; }
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
	 
		
	 
		 
		
	}						