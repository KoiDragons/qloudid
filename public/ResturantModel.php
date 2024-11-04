<?php
	require_once('../AppModel.php');
	class ResturantModel extends AppModel
	{
		function resturantinfo($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select profile_pic,country_code,phone,dress_code,table_reservation,pets_allowed, form_of_payment, broadcast_type, broadcast_channel, resturant_name,resturant_type, resturant_information.property_id,property_location.visiting_address,resturant_information.id  from resturant_information left join property_location on property_location.id=resturant_information.property_id left join company_profiles on property_location.company_id=company_profiles.company_id left join phone_country_code on phone_country_code.country_name=company_profiles.phone_country where resturant_information.id=?");
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if($row ['profile_pic']!=null) { $filename="../estorecss/".$row ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a); $row['image_path'] =$this-> base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['profile_pic'].'.jpg' ); } else { $row['image_path']="../html/usercontent/images/default-profile-pic.jpg"; } }  else $row['image_path']="../html/usercontent/images/default-profile-pic.jpg";
			$stmt->close();
			$dbCon->close();
			  
			return $row;
			
			
		}
		
		function resturantWorkInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select *  from resturant_work_information where id=?");
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			 
			return $rowAvailable;
			
			
		}
		 function businessImageDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			 
			
			$stmt = $dbCon->prepare("select * from business_dashboard_images where business_id=? and business_type=3");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			if(empty($row))
			{
				$org=array();
				$org['heading_type']=0;
				$org['big_image_path']='../html/usercontent/images/bg/hotel1.jpg';
				$org['small_image1_path']='../html/usercontent/images/bg/hotel2.jpg';
				$org['small_image2_path']='../html/usercontent/images/bg/hotel3.jpg';
				 
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			else
			{
			if($row ['big_image_path']!=null) { $filename="../estorecss/".$row ['big_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['big_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $row['big_image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['big_image_path'].'.jpg' ); } else { $row['big_image_path']="../html/usercontent/images/bg/hotel1.jpg"; } }  else $row['big_image_path']="../html/usercontent/images/bg/hotel1.jpg";
			
			if($row ['small_image1_path']!=null) { $filename="../estorecss/".$row ['small_image1_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['small_image1_path'].".txt"); $value_a=str_replace('"','',$value_a); $row['small_image1_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['small_image1_path'].'.jpg' ); } else { $row['small_image1_path']="../html/usercontent/images/bg/hotel2.jpg"; } }  else $row['small_image1_path']="../html/usercontent/images/bg/hotel2.jpg";
			
			if($row ['small_image2_path']!=null) { $filename="../estorecss/".$row ['small_image2_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['small_image2_path'].".txt"); $value_a=str_replace('"','',$value_a); $row['small_image2_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['small_image2_path'].'.jpg' ); } else { $row['small_image2_path']="../html/usercontent/images/bg/hotel3.jpg"; } }  else $row['small_image2_path']="../html/usercontent/images/bg/hotel3.jpg";
			
			$stmt->close();
			$dbCon->close();
			return $row;
			}
		}
		
		function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
		
		
		
		function completeMenu($data)
		{
			 
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
						 $filename="../estorecss/".$rowDishes ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowDishes ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowDishes ['dish_image'].'.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; }
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