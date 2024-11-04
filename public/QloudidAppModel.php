<?php
require_once('../AppModel.php');
class QloudidAppModel extends AppModel
{
	 function selectedRoomServiceMenu($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
			}
			$dbCon = AppModel::createConnection();
			$roomservice_id= $this -> encrypt_decrypt('decrypt',$data['hid']);
			$stmt = $dbCon->prepare("select available_dishes,resturant_id from hotel_roomservice_resturant where hotel_property_id=?");
			$stmt->bind_param("i", $roomservice_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$allDish='';
			$allRestu='';
			while($row= $result->fetch_assoc())
			{
				$allDish=$allDish.$row['available_dishes'].',';
				$allRestu=$allRestu.$row['resturant_id'].',';
			}
			 
			
			$stmt = $dbCon->prepare("select distinct serve_type from resturant_available_dishes where find_in_set (resturant_id,?)  and is_available_item=1 order by serve_type");
			$stmt->bind_param("s", $allRestu);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row= $result->fetch_assoc())
			{
				if($row['serve_type']==1)
				{
				$row['serve_info']='Breakfast';
				}
				else if($row['serve_type']==2)
				{
				$row['serve_info']='Brunch';
				}
				else if($row['serve_type']==3)
				{
				$row['serve_info']='Lunch';
				}
				else if($row['serve_type']==4)
				{
				$row['serve_info']='Dinner';
				}
				else if($row['serve_type']==5)
				{
				$row['serve_info']='Beverage';
				}
				array_push($org,$row);
				$org[$j]['category']=array();
				$i=0;
				$stmt = $dbCon->prepare("select distinct category_food,food_category,place_of_display from resturant_available_dishes left join food_category on food_category.id=resturant_available_dishes.category_food where find_in_set (resturant_available_dishes.resturant_id,?) and serve_type=? order by place_of_display");
				$stmt->bind_param("si", $allRestu,$row['serve_type']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				while($rowCategory = $result1->fetch_assoc())
				{
					array_push($org[$j]['category'],$rowCategory);
					$k=0;
					$org[$j]['category'][$i]['dishes']=array();
					$stmt = $dbCon->prepare("select resturant_available_dishes.id,dish_name,dish_detail,dish_image,dish_price from resturant_available_dishes left join dishes_detail_information on dishes_detail_information.id=resturant_available_dishes.dish_id where find_in_set(resturant_available_dishes.id,?) and serve_type=? and category_food=? and is_available_item=1");
					$stmt->bind_param("sii", $allDish,$row['serve_type'],$rowCategory['category_food']);
					$stmt->execute();
					$result2 = $stmt->get_result();
					while($rowDishes = $result2->fetch_assoc())
					{
						 $filename="../estorecss/".$rowDishes ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowDishes ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowDishes ['dish_image'].'.jpg' );  $imgs='../../../../'.$imgs; } else { $value_a="../../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../../html/usercontent/images/default-profile-pic.jpg"; }
						 $imgs=str_replace('../../../../../','https://www.qloudid.com/',$imgs);
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
	 
	 
	 
	  function selectedWellnessServiceMenu($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
			}
			$dbCon = AppModel::createConnection();
			$roomservice_id= $this -> encrypt_decrypt('decrypt',$data['hid']);
			 
			$stmt = $dbCon->prepare("select available_services,wellness_id from hotel_wellness_services where hotel_property_id=?");
			$stmt->bind_param("i", $roomservice_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$allDish='';
			$allRestu='';
			while($row= $result->fetch_assoc())
			{
				
				$allDish=$allDish.$row['available_services'].',';
				$allRestu=$allRestu.$row['wellness_id'].',';
			}
			
			
				$org=array();
				$i=0;
				 	$stmt = $dbCon->prepare("select wellness_available_services.id,dish_name,dish_detail,dish_image,dish_price from wellness_available_services left join dishes_detail_information on dishes_detail_information.id=wellness_available_services.service_id where find_in_set (wellness_available_services.id,?) and find_in_set (wellness_available_services.wellness_id,?)");
					$stmt->bind_param("ss", $allDish,$allRestu);
					$stmt->execute();
					$result2 = $stmt->get_result();
					while($rowDishes = $result2->fetch_assoc())
					{
						array_push($org,$rowDishes);
						 $filename="../estorecss/".$rowDishes ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowDishes ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowDishes ['dish_image'].'.jpg' );  $imgs='../../../../'.$imgs; } else { $value_a="../../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../../html/usercontent/images/default-profile-pic.jpg"; }
						
						 $imgs=str_replace('../../../../../','https://www.qloudid.com/',$imgs);
						$org[$i]['enc']= $this -> encrypt_decrypt('encrypt',$rowDishes['id']);
						$org[$i]['dish_image']=$imgs;
						$i++;
					}
					 
				
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
	 
	  function selectedRoomServiceMenuItemInfo($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
			}
			$dbCon = AppModel::createConnection();
			$roomservice_id= $this -> encrypt_decrypt('decrypt',$data['item_id']);
				$stmt = $dbCon->prepare("select resturant_available_dishes.id,dish_name,dish_detail,dish_image,dish_price from resturant_available_dishes left join dishes_detail_information on dishes_detail_information.id=resturant_available_dishes.dish_id where resturant_available_dishes.id=?");
					$stmt->bind_param("i", $roomservice_id);
					$stmt->execute();
					$result2 = $stmt->get_result();
					$rowDishes = $result2->fetch_assoc();
						 $filename="../estorecss/".$rowDishes ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowDishes ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowDishes ['dish_image'].'.jpg' );  $imgs='../../../../'.$imgs; } else { $value_a="../../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../../html/usercontent/images/default-profile-pic.jpg"; }
						 $imgs=str_replace('../../../../../','https://www.qloudid.com/',$imgs);
						$rowDishes['dish_image']=$imgs;
						$k++;
			$stmt->close();
			$dbCon->close();
			return $rowDishes;
			
			
		}
	 
	 
		
	function updateDependentCheckinIds($data)
    {
		
		$dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("update user_certificates set dependents_id=? where certificate_key=?");
		/* bind parameters for markers */
		$stmt->bind_param("ss",$data['selected_dependents'], $data['certi']);
		$stmt->execute();
			 
		$stmt->close();
		$dbCon->close();
		return 1;	
		
    }
	
	function dependentsListForCheckin($data)
		{
			 $dbCon = AppModel::createConnection();
			 $id=$this->encrypt_decrypt('decrypt',$data['id']);
			 
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,ssn,first_name,email,dependent_type,created_on,image_path  from dependents where id in (select dependent_id from dependent_guardian where guardian_user_id=? and is_approved=1) and created_by=? and id not in (select dependent_id from hotel_checkout_dependent_detail where hotel_checkout_id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'], $data['user_id'],$id);
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
	
		function verifyUserBookingExists($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt('decrypt',$data['id']);
			
			$stmt = $dbCon->prepare("select user_id from user_certificates where certificate_key=? and is_connected=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $data['certi']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUser = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("select user_id from hotel_checkout_detail where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowHotel = $result->fetch_assoc();
			if($rowUser['user_id']==$rowHotel['user_id'])
			{
			$stmt = $dbCon->prepare("select count(id) as num  from dependents   where id in (select dependent_id from dependent_guardian where guardian_user_id=? and is_approved=1) and  created_by=?  and id not in (select dependent_id from hotel_checkout_dependent_detail where hotel_checkout_id=?)");
			$stmt->bind_param("iii", $rowHotel['user_id'],$rowHotel['user_id'],$id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();	
			if($row['num']==0)
			{
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			else
			{
			$stmt = $dbCon->prepare("update user_certificates set hotel_checkin_id=? where certificate_key=?");
			/* bind parameters for markers */
			$stmt->bind_param("ss", $data['id'],$data['certi']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 2;		
			}
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return 0;		
			}
			
		 
		}
		
		
		
		function addDependentImages($data)
		{
			$dbCon = AppModel::createConnection();
			$data1 = strip_tags($data['ImageData']);
			$data1='url("data:image/png;base64,'.$data1.'")';
			//echo $data; die;
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
				 
			$arr=array();
			 
			if($data['imageId']==1)
			{
			$stmt = $dbCon->prepare("update dependents set front_image_path=? where id=?");
			}
			else
			{
			$stmt = $dbCon->prepare("update dependents set back_image_path=?,is_completed=1 where id=?");	
			}
			$stmt->bind_param("si",  $img_name1,$data['id']);	
			$stmt->execute();
			
			
			$stmt->close();
			$dbCon->close();
			return 1;	
			 
			 
		}
		
		
		function addDependent($data)
		{
			$dbCon = AppModel::createConnection();
			$is_complete=1;
			$email=$data['SocialSecurityNumber'].'@qloudid.com';
			$fname=htmlentities($data['FirstName'],ENT_NOQUOTES, 'UTF-8');
			$lname=htmlentities($data['LastName'],ENT_NOQUOTES, 'UTF-8');	
			$a=array();
			$b=array();
			$a=explode('-',$data['IssueDate']);
			$b=explode('-',$data['ExpiryDate']);
			 
			
			$stmt = $dbCon->prepare("select country_of_residence from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("insert into dependents(dependent_type,first_name,last_name,ssn,created_by,created_on,email,country_id,is_completed,passport_number,issue_month,issue_year,expiry_month, expiry_year,issue_date,expiry_date)
			values(?,?,?,?,?,now(),?,?, ?,?,?, ?,?,?, ?,?)");
			$stmt->bind_param("isssisiissisiss",$data['DependentType'],$fname,$lname,$data['SocialSecurityNumber'],$data['UserId'],$email,$row['country_of_residence'],$is_complete,$data['PassportNumber'],$a[1],$a[0],$b[1],$b[0],$data['IssueDate'],$data['ExpiryDate']);
			$stmt->execute();
			 
			$id=$stmt->insert_id;
				
			$stmt = $dbCon->prepare("select email,country_of_residence,phone_number,phone_country_code.country_code,ssn,country_phone  from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id left join country on user_logins.country_of_residence=country.id left join phone_country_code on phone_country_code.country_name=country.country_name where user_logins.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$st=1;
			$stmt = $dbCon->prepare("insert into dependent_guardian(dependent_id,guardian_ssn,guardian_email,guardian_user_id, inviting_person_user_id,created_on,is_approved,guardian_phone,guardian_country)
			values(?,?,?,?,?,now(),?,?,?)");
			$stmt->bind_param("issiiiss",$id,$row['ssn'],$row['email'],$data['UserId'],$data['UserId'],$st,$row['phone_number'],$row['country_phone']);
			$stmt->execute();
			
			
			$phone="+".trim($row['country_code'])."".trim($row['phone_number']);
			
			$subject='Dependent added';
			$to=$phone;
			$html=$fname.' '.$lname.' has been added as your dependent. please confirm or reject the same.';
			$res=sendSms($subject, $to, $html);
			$rs=json_decode($res,true);
			$to=$row['email'];
			//sendEmail($subject, $to, $html);
				
				$stmt->close();
				$dbCon->close();
				return $id;
			 
			
		}
		
	
	function checkSsn($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select country_of_residence from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select id from dependents where ssn=? and country_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("si", $data['SocialSecurityNumber'],$row['country_of_residence']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("select id  from dependents   where  passport_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $data['PassportNumber']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$rowPass = $result->fetch_assoc();
			 
			if(empty($rowPass))
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 2;
			}
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
		}
	
	
	
		function dependentsList($data)
		{
			 $dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,ssn,first_name,email,dependent_type,created_on,image_path  from dependents where id in (select dependent_id from dependent_guardian where guardian_user_id=? and is_approved=1) and created_by=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['user_id'], $data['user_id']);
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
		
	function completeMenu()
		{
			 
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$_POST['id']);
			 
			$org=array();
			 
				$i=0;
				$stmt = $dbCon->prepare("select distinct category_food,food_category,place_of_display from resturant_available_dishes left join food_category on food_category.id=resturant_available_dishes.category_food where resturant_available_dishes.resturant_id=?  order by place_of_display");
				$stmt->bind_param("i", $resturant_id);
				$stmt->execute();
				$result1 = $stmt->get_result();
				while($rowCategory = $result1->fetch_assoc())
				{
					array_push($org,$rowCategory);
					 
					$org[$i]['dishes']=array();
					$stmt = $dbCon->prepare("select resturant_available_dishes.id,dish_name,dish_detail,dish_image,dish_price from resturant_available_dishes left join dishes_detail_information on dishes_detail_information.id=resturant_available_dishes.dish_id where resturant_id=? and category_food=?");
					$stmt->bind_param("ii", $resturant_id,$rowCategory['category_food']);
					$stmt->execute();
					$result2 = $stmt->get_result();
					while($rowDishes = $result2->fetch_assoc())
					{
						  
						array_push($org[$i]['dishes'],$rowDishes);
						 
					}
					$i++;
				}
			 $stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
	 
		
		
	function resturantImages()
	{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$_POST['id']);
		$stmt = $dbCon->prepare("select big_image_path,small_image1_path,small_image2_path from business_dashboard_images where business_type=3 and business_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$resultImages = $stmt->get_result();
			$rowImages = $resultImages->fetch_assoc();
			 
			$bigImage=$rowImages['big_image_path'];	
			$filename="../estorecss/".$bigImage.".txt"; $value_a=file_get_contents("../estorecss/".$bigImage.".txt"); $value_a=str_replace('"','',$value_a); $rowImages['image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$bigImage.'.jpg' );
			 
			$rowImages['image_path']=str_replace('../','https://www.qloudid.com/',$rowImages['image_path']);
			$org[0]=$rowImages;

			$bigImage=$rowImages['small_image1_path'];	
			$filename="../estorecss/".$bigImage.".txt"; $value_a=file_get_contents("../estorecss/".$bigImage.".txt"); $value_a=str_replace('"','',$value_a); $rowImages['image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$bigImage.'.jpg' );
			 
			$rowImages['image_path']=str_replace('../','https://www.qloudid.com/',$rowImages['image_path']);
			$org[1]=$rowImages;
			
			$bigImage=$rowImages['small_image2_path'];	
			$filename="../estorecss/".$bigImage.".txt"; $value_a=file_get_contents("../estorecss/".$bigImage.".txt"); $value_a=str_replace('"','',$value_a); $rowImages['image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$bigImage.'.jpg' );
			 
			$rowImages['image_path']=str_replace('../','https://www.qloudid.com/',$rowImages['image_path']);
			$org[2]=$rowImages;
			
			$stmt->close();
			$dbCon->close();
			  
			return $org;
			
	}
	function resturantList()
		{
			$dbCon = AppModel::createConnection();
			
			$search='%'.$_POST['city'].'%';
			 	 
			$stmt = $dbCon->prepare("select property_location.latitude,property_location.longitude,profile_pic,country_code,phone,dress_code,table_reservation,pets_allowed, form_of_payment, broadcast_type, broadcast_channel, resturant_name as property_nickname,resturant_type, resturant_information.property_id,property_location.visiting_address as address,resturant_information.id  from resturant_information left join property_location on property_location.id=resturant_information.property_id left join company_profiles on property_location.company_id=company_profiles.company_id left join phone_country_code on phone_country_code.country_name=company_profiles.phone_country where property_location.visiting_address like ? or property_location.state_v like ? or property_location.city_v like ?");
			$stmt->bind_param("sss", $search,$search,$search);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			$row['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);	 
			array_push($org,$row);
			
			$org[$j]['images']=array();
			
			$stmt = $dbCon->prepare("select big_image_path,small_image1_path,small_image2_path from business_dashboard_images where business_type=3 and business_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$resultImages = $stmt->get_result();
			$rowImages = $resultImages->fetch_assoc();
			 
			$bigImage=$rowImages['big_image_path'];	
			$filename="../estorecss/".$bigImage.".txt"; $value_a=file_get_contents("../estorecss/".$bigImage.".txt"); $value_a=str_replace('"','',$value_a); $rowImages['image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$bigImage.'.jpg' );
			 
			$rowImages['image_path']=str_replace('../','https://www.qloudid.com/',$rowImages['image_path']);
			$org[$j]['images'][0]=$rowImages;

			$bigImage=$rowImages['small_image1_path'];	
			$filename="../estorecss/".$bigImage.".txt"; $value_a=file_get_contents("../estorecss/".$bigImage.".txt"); $value_a=str_replace('"','',$value_a); $rowImages['image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$bigImage.'.jpg' );
			 
			$rowImages['image_path']=str_replace('../','https://www.qloudid.com/',$rowImages['image_path']);
			$org[$j]['images'][1]=$rowImages;
			
			$bigImage=$rowImages['small_image2_path'];	
			$filename="../estorecss/".$bigImage.".txt"; $value_a=file_get_contents("../estorecss/".$bigImage.".txt"); $value_a=str_replace('"','',$value_a); $rowImages['image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$bigImage.'.jpg' );
			 
			$rowImages['image_path']=str_replace('../','https://www.qloudid.com/',$rowImages['image_path']);
			$org[$j]['images'][2]=$rowImages;
			
			$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			  
			return $org;
			
			
		}
	
	function resturantInfo()
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$_POST['id']);
			 
			$stmt = $dbCon->prepare("select resturant_information.description,property_location.latitude,property_location.longitude,profile_pic,country_code,phone,dress_code,table_reservation,pets_allowed, form_of_payment, broadcast_type, broadcast_channel, resturant_name as property_nickname,resturant_type, resturant_information.property_id,property_location.visiting_address as address,resturant_information.id  from resturant_information left join property_location on property_location.id=resturant_information.property_id left join company_profiles on property_location.company_id=company_profiles.company_id left join phone_country_code on phone_country_code.country_name=company_profiles.phone_country where resturant_information.id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			  
			return $row;
			
			
		}
	
	
	function daycareRequestCount($data)
		{
				$dbCon = AppModel::createConnection();
				$company_id= $data['company_id'];
				$org=array();
				$stmt = $dbCon->prepare("select count(id) as num from dropped_off_children where child_id in (select id from child_care_info where company_id=?) and is_approved=0 and is_left=0");
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result_received = $stmt->get_result();
				$row_received = $result_received->fetch_assoc();
				
				$stmt = $dbCon->prepare("select count(id) as num from dropped_off_children where child_id in (select id from child_care_info where company_id=?) and is_approved=1 and is_left=1");
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result_picked = $stmt->get_result();
				$row_picked = $result_picked->fetch_assoc();
				$org['received']=$row_received['num'];
				$org['picked']=$row_picked['num'];
				$org['ttl']=$row_received['num']+$row_picked['num'];
				
				$stmt = $dbCon->prepare("select count(id) as num from child_care_info where id not in (select child_id from parent_info where child_id in (select id from child_care_info where company_id=?) ) and company_id=?");
				$stmt->bind_param("ii", $company_id,$company_id);
				$stmt->execute();
				$result_received = $stmt->get_result();
				$row_received = $result_received->fetch_assoc();
				$org['inactive']=$row_received['num'];
				$org['ttl']=$org['ttl']+$row_received['num'];
				
				$stmt = $dbCon->prepare("select duns_is_approved from companies where id=?");
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result_received = $stmt->get_result();
				$row_received = $result_received->fetch_assoc();
				
				$org['duns_is_approved']=$row_received['duns_is_approved'];
				$stmt->close();
				$dbCon->close();
				return $org;
			
			
		}
		
		 function dunsInfoCount($data)
		{
				$dbCon = AppModel::createConnection();
				$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
				 
				$stmt = $dbCon->prepare("select duns_is_approved from companies where id=?");
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result_received = $stmt->get_result();
				$row_received = $result_received->fetch_assoc();
				 
				$stmt->close();
				$dbCon->close();
				return $row_received['duns_is_approved'];
			
			
		}
	
	function apartmentAmenitiesDetailInfo()
		{
			 
			$dbCon = AppModel::createConnection();
			$hotel_id= $this -> encrypt_decrypt('decrypt',$_POST['id']);  
			 
			$stmt = $dbCon->prepare("select * from apartment_amenities where id in (select amenity_id from user_apartment_amenities_detail where user_amenitiy_category_id in (select id from user_apartment_amenities_category_detail where user_address_id=?))");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $hotel_id);
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
		
	
	function apartmentDetailInfo()
		{
			 
			$dbCon = AppModel::createConnection();
			$hotel_id= $this -> encrypt_decrypt('decrypt',$_POST['id']);  
			 
			$stmt = $dbCon->prepare("select * from user_address where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $hotel_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			 $stmt = $dbCon->prepare("select count(id) as num from user_apartment_bedrooms where user_address_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$resultBedrooms = $stmt->get_result();
			$rowBedrooms = $resultBedrooms->fetch_assoc();
			
			$row['bedrooms']=$rowBedrooms['num'];
			
			 $stmt = $dbCon->prepare("select count(id) as num from user_apartment_bedrooms_beds where bedroom_id in (select id from user_apartment_bedrooms where user_address_id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$resultBedrooms = $stmt->get_result();
			$rowBedrooms = $resultBedrooms->fetch_assoc();
			
			$row['guests']=$rowBedrooms['num'];
			
			
			 $stmt = $dbCon->prepare("select sum(toilet_and_sink) as toilet,count(id) as bath from user_apartment_bathroom_detail where   user_address_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$resultBedrooms = $stmt->get_result();
			$rowBedrooms = $resultBedrooms->fetch_assoc();
			
			$row['toilet']=$rowBedrooms['toilet'];
			$row['bath']=$rowBedrooms['bath'];
			
			
			
			 $stmt = $dbCon->prepare("select apartment_photo_path as image_path from user_apartment_photos where user_address_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$resultImage = $stmt->get_result();
			$rowImage = $resultImage->fetch_assoc();
			 
			
			$bigImage=$rowImage['image_path'];	
			 
			 
			 $filename="../estorecss/".$bigImage.".txt"; $value_a=file_get_contents("../estorecss/".$bigImage.".txt"); $value_a=str_replace('"','',$value_a); $row['image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$bigImage.'.jpg' );
			 $row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);  
			$row['image_path']=str_replace('../','https://www.qloudid.com/',$row['image_path']);
			 
			 $stmt = $dbCon->prepare("select min(minimum_price) as price from user_apartment_pricing_info where user_address_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$resultPrice = $stmt->get_result();
				$rowPrice = $resultPrice->fetch_assoc();
				$row['price']=$rowPrice['price'];
			
			
				$stmt->close();
				$dbCon->close();
				 
				return $row;
			
		}
		
		function apartmentImages()
		{
			$dbCon = AppModel::createConnection();
			$hotel_id= $this -> encrypt_decrypt('decrypt',$_POST['id']);  
			$stmt = $dbCon->prepare("select apartment_photo_path as image_path from user_apartment_photos where user_address_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $hotel_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			 $filename="../estorecss/".$row['image_path'].".txt"; $value_a=file_get_contents("../estorecss/".$row['image_path'].".txt"); $value_a=str_replace('"','',$value_a); $row['image_path1'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['image_path'].'.jpg' );
			$row['image_path1']=str_replace('../','qloudid.com/',$row['image_path1']);
			array_push($org,$row);
			}
			return $org;
			
		}
		
	function apartmentList()
	{
		 
			$dbCon = AppModel::createConnection();
			 
			$search='%'.$_POST['city'].'%';
			 
			$total_days=round(($_POST['end_date']-$_POST['start_date']) / (60 * 60 * 24));
			 $strt=date('Y-m-d',$_POST['start_date']);
			 $end=date('Y-m-d',$_POST['end_date']);
			$stmt = $dbCon->prepare("select * from user_address where is_published=1 and state like ? and publish_dstrict_short_rent=1 and id not in (SELECT room_type_id from hotel_checkout_detail where
									hotel_property_type=2  and ((checkin_date BETWEEN ? AND ?) or (checkout_date BETWEEN ? AND ?)))");
			
			/* bind parameters for markers */
			$stmt->bind_param("sssss", $search, $strt,$end, $strt,$end);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			
			$j=0;
			while($row = $result->fetch_assoc())
			{
			$skip=0;
			$price=0;
			 for($i=0;$i<$total_days;$i++)
			 {
				 
			$stmt = $dbCon->prepare("select pricing_start_date,pricing_end_date,monday_price,tuesday_price,wednesday_price,thursday_price,friday_price,saturday_price,sunday_price,shortest_duration,monday_open,tuesday_open,wednesday_open,thursday_open,friday_open,saturday_open,sunday_open from user_apartment_pricing_info where user_address_id=? and (pricing_start_date<=? and pricing_end_date>=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $row['id'],$_POST['end_date'],$_POST['start_date']);
			$stmt->execute();
			$resultPrice = $stmt->get_result();
			while($rowPrice = $resultPrice->fetch_assoc())
			{
			
			   	
			if($rowPrice['shortest_duration']>$total_days)
			{
				 
				$skip=1;
				break;
			}
			$currentdate=strtotime("+".$i." days", $_POST['start_date']);
			$c=date('Y-m-d',$currentdate);	
			 
			$stmt = $dbCon->prepare("select count(blocked_date) as num from user_apartment_blocked_dates where blocked_date=? and user_address_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("si", $currentdate,$row['id']);
			$stmt->execute();
			$blockedDate = $stmt->get_result();
			$rowBlocked = $blockedDate->fetch_assoc();
			if($rowBlocked['num']==1)
			{
				$skip=1;
			 
				break;	
			}
			if($rowPrice['pricing_start_date']<=$c || $rowPrice['pricing_end_date']>=$c)
			{
			$d1 = new DateTime($c);
			$day=$d1->format('w');
			 
			if($day==0)
			{
				 
				if($rowPrice['sunday_open']==0)
				{
				$skip=1;
				//echo $day.'-'.$skip.'/'.$c;	
				break;
				}
				else
				{
				$price=$price+$rowPrice['sunday_price'];	
				}
				
			}
			
			else if($day==1)
			{
				if($rowPrice['monday_open']==0)
				{
				$skip=1;
				//echo $day.'-'.$skip.'/'.$c;	
				break;
				}
				else
				{
				$price=$price+$rowPrice['monday_price'];	
				}
				
			}
			else if($day==2)
			{
				if($rowPrice['tuesday_open']==0)
				{
				$skip=1;
				////echo $day.'-'.$skip.'/'.$c;		
				break;
				}
				else
				{
				$price=$price+$rowPrice['tuesday_price'];	
				}
				
			}
			
			else if($day==3)
			{
				if($rowPrice['wednesday_open']==0)
				{
				$skip=1;
				////echo $day.'-'.$skip.'/'.$c;		
				break;
				}
				else
				{
				$price=$price+$rowPrice['wednesday_price'];	
				}
				
			}
			else if($day==4)
			{
				if($rowPrice['thursday_open']==0)
				{
				$skip=1;
				////echo $day.'-'.$skip.'/'.$c;		
				break;
				}
				else
				{
				$price=$price+$rowPrice['thursday_price'];	
				}
				
			}
			else if($day==5)
			{
				if($rowPrice['friday_open']==0)
				{
				$skip=1;
				////echo $day.'-'.$skip.'/'.$c;		
				break;
				}
				else
				{
				$price=$price+$rowPrice['friday_price'];	
				}
				
			}
			else if($day==6)
			{
				if($rowPrice['saturday_open']==0)
				{
				$skip=1;
				////echo $day.'-'.$skip.'/'.$c;		
				break;
				}
				else
				{
				$price=$price+$rowPrice['saturday_price'];	
				}
				
			}
			}
			}
			if($skip==1)
			{
				 
				break;
			}
			}
			if($skip==1)
			{
				continue;
			}
			else
			{
			$row['price']=round($price/$total_days);
			}
			
			
			
		  
			$stmt = $dbCon->prepare("select apartment_photo_path as image_path from user_apartment_photos where user_address_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$resultImage = $stmt->get_result();
			$rowImage = $resultImage->fetch_assoc();
			 
			
			$bigImage=$rowImage['image_path'];	
			 
			 
			 $filename="../estorecss/".$bigImage.".txt"; $value_a=file_get_contents("../estorecss/".$bigImage.".txt"); $value_a=str_replace('"','',$value_a); $row['image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$bigImage.'.jpg' );
			 $row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);  
			$row['image_path']=str_replace('../','https://www.qloudid.com/',$row['image_path']);
			array_push($org,$row);
			$org[$j]['images']=array();
			
			$stmt = $dbCon->prepare("select apartment_photo_path as image_path from user_apartment_photos where user_address_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$resultImages = $stmt->get_result();
			while($rowImages = $resultImages->fetch_assoc())
			{
			$bigImage=$rowImages['image_path'];	
			$filename="../estorecss/".$bigImage.".txt"; $value_a=file_get_contents("../estorecss/".$bigImage.".txt"); $value_a=str_replace('"','',$value_a); $rowImages['image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$bigImage.'.jpg' );
			 
			$rowImages['image_path']=str_replace('../','https://www.qloudid.com/',$rowImages['image_path']);
			array_push($org[$j]['images'],$rowImages);	
			}
			
			if(empty($rowImages = $resultImages->fetch_assoc()))
			{
				$org[$j]['images'][0]['image_path']=$row['image_path'];
			}
			$j++;
			}
			 
				$stmt->close();
				$dbCon->close();
				 
				return $org;
	}
	
	function longTermApartmentList()
	{
		 
			$dbCon = AppModel::createConnection();
			$search='%'.$_POST['city'].'%';
			$stmt = $dbCon->prepare("select * from user_address where   state like ? and district_long_rent=1 and publish_dstrict_long_rent=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $search);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			
			$j=0;
			while($row = $result->fetch_assoc())
			{
			 
			 $stmt = $dbCon->prepare("select count(apartment_photo_path) as num from user_apartment_photos where user_address_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$resultImage = $stmt->get_result();
			$rowImage = $resultImage->fetch_assoc();
			
			if($rowImage['num']<10)
			{
				continue;
			}
		  
			$stmt = $dbCon->prepare("select apartment_photo_path as image_path from user_apartment_photos where user_address_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$resultImage = $stmt->get_result();
			$rowImage = $resultImage->fetch_assoc();
			 
			
			$bigImage=$rowImage['image_path'];	
			 
			 
			 $filename="../estorecss/".$bigImage.".txt"; $value_a=file_get_contents("../estorecss/".$bigImage.".txt"); $value_a=str_replace('"','',$value_a); $row['image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$bigImage.'.jpg' );
			 $row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);  
			$row['image_path']=str_replace('../','https://www.qloudid.com/',$row['image_path']);
			array_push($org,$row);
			$org[$j]['images']=array();
			
			$stmt = $dbCon->prepare("select apartment_photo_path as image_path from user_apartment_photos where user_address_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$resultImages = $stmt->get_result();
			while($rowImages = $resultImages->fetch_assoc())
			{
			$bigImage=$rowImages['image_path'];	
			$filename="../estorecss/".$bigImage.".txt"; $value_a=file_get_contents("../estorecss/".$bigImage.".txt"); $value_a=str_replace('"','',$value_a); $rowImages['image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$bigImage.'.jpg' );
			 
			$rowImages['image_path']=str_replace('../','https://www.qloudid.com/',$rowImages['image_path']);
			array_push($org[$j]['images'],$rowImages);	
			}
			
			if(empty($rowImages = $resultImages->fetch_assoc()))
			{
				$org[$j]['images'][0]['image_path']=$row['image_path'];
			}
			$j++;
			}
			 
				$stmt->close();
				$dbCon->close();
				 
				return $org;
	}
	
	function apartmentForSaleList()
	{
		 
			$dbCon = AppModel::createConnection();
			$search='%'.$_POST['city'].'%';
			$stmt = $dbCon->prepare("select * from user_address where   state like ? and district_sale=1 and publish_dstrict_sale=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $search);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			
			$j=0;
			while($row = $result->fetch_assoc())
			{
			 
			 $stmt = $dbCon->prepare("select count(apartment_photo_path) as num from user_apartment_photos where user_address_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$resultImage = $stmt->get_result();
			$rowImage = $resultImage->fetch_assoc();
			
			if($rowImage['num']<10)
			{
				continue;
			}
		  
			$stmt = $dbCon->prepare("select apartment_photo_path as image_path from user_apartment_photos where user_address_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$resultImage = $stmt->get_result();
			$rowImage = $resultImage->fetch_assoc();
			 
			
			$bigImage=$rowImage['image_path'];	
			 
			 
			 $filename="../estorecss/".$bigImage.".txt"; $value_a=file_get_contents("../estorecss/".$bigImage.".txt"); $value_a=str_replace('"','',$value_a); $row['image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$bigImage.'.jpg' );
			 $row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);  
			$row['image_path']=str_replace('../','https://www.qloudid.com/',$row['image_path']);
			array_push($org,$row);
			$org[$j]['images']=array();
			
			$stmt = $dbCon->prepare("select apartment_photo_path as image_path from user_apartment_photos where user_address_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$resultImages = $stmt->get_result();
			while($rowImages = $resultImages->fetch_assoc())
			{
			$bigImage=$rowImages['image_path'];	
			$filename="../estorecss/".$bigImage.".txt"; $value_a=file_get_contents("../estorecss/".$bigImage.".txt"); $value_a=str_replace('"','',$value_a); $rowImages['image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$bigImage.'.jpg' );
			 
			$rowImages['image_path']=str_replace('../','https://www.qloudid.com/',$rowImages['image_path']);
			array_push($org[$j]['images'],$rowImages);	
			}
			
			if(empty($rowImages = $resultImages->fetch_assoc()))
			{
				$org[$j]['images'][0]['image_path']=$row['image_path'];
			}
			$j++;
			}
			 
				$stmt->close();
				$dbCon->close();
				 
				return $org;
	}
	
	
	function apartmentIsAvailable()
	{
		 
			$dbCon = AppModel::createConnection();
			$room_type_id= $this -> encrypt_decrypt('decrypt',$_POST['rid']);
			 
			$total_days=round(($_POST['end_date']-$_POST['start_date']) / (60 * 60 * 24));
			 $strt=date('Y-m-d',$_POST['start_date']);
			 $end=date('Y-m-d',$_POST['end_date']);
			$stmt = $dbCon->prepare("SELECT count(id) as num from hotel_checkout_detail where
									room_type_id=? and hotel_property_type=2  and ((checkin_date BETWEEN ? AND ?) or (checkout_date BETWEEN ? AND ?))");
			
			/* bind parameters for markers */
			$stmt->bind_param("issss", $room_type_id, $strt,$end, $strt,$end);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			$row = $result->fetch_assoc();
			if($row['num']>0)
			{
				return 1;
			}
			$skip=0;
			$price=0;
			 for($i=0;$i<$total_days;$i++)
			 {
				 
			$stmt = $dbCon->prepare("select pricing_start_date,pricing_end_date,monday_price,tuesday_price,wednesday_price,thursday_price,friday_price,saturday_price,sunday_price,shortest_duration,monday_open,tuesday_open,wednesday_open,thursday_open,friday_open,saturday_open,sunday_open from user_apartment_pricing_info where user_address_id=? and (pricing_start_date<=? and pricing_end_date>=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $room_type_id,$_POST['end_date'],$_POST['start_date']);
			$stmt->execute();
			$resultPrice = $stmt->get_result();
			while($rowPrice = $resultPrice->fetch_assoc())
			{
			
			   	
			if($rowPrice['shortest_duration']>$total_days)
			{
				 
				$skip=1;
				break;
			}
			$currentdate=strtotime("+".$i." days", $_POST['start_date']);
			$c=date('Y-m-d',$currentdate);	
			 
			$stmt = $dbCon->prepare("select count(blocked_date) as num from user_apartment_blocked_dates where blocked_date=? and user_address_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("si", $currentdate,$room_type_id);
			$stmt->execute();
			$blockedDate = $stmt->get_result();
			$rowBlocked = $blockedDate->fetch_assoc();
			if($rowBlocked['num']==1)
			{
				$skip=1;
			 
				break;	
			}
			if($rowPrice['pricing_start_date']<=$c || $rowPrice['pricing_end_date']>=$c)
			{
			$d1 = new DateTime($c);
			$day=$d1->format('w');
			 
			if($day==0)
			{
				 
				if($rowPrice['sunday_open']==0)
				{
				$skip=1;
				//echo $day.'-'.$skip.'/'.$c;	
				break;
				}
				else
				{
				$price=$price+$rowPrice['sunday_price'];	
				}
				
			}
			
			else if($day==1)
			{
				if($rowPrice['monday_open']==0)
				{
				$skip=1;
				//echo $day.'-'.$skip.'/'.$c;	
				break;
				}
				else
				{
				$price=$price+$rowPrice['monday_price'];	
				}
				
			}
			else if($day==2)
			{
				if($rowPrice['tuesday_open']==0)
				{
				$skip=1;
				////echo $day.'-'.$skip.'/'.$c;		
				break;
				}
				else
				{
				$price=$price+$rowPrice['tuesday_price'];	
				}
				
			}
			
			else if($day==3)
			{
				if($rowPrice['wednesday_open']==0)
				{
				$skip=1;
				////echo $day.'-'.$skip.'/'.$c;		
				break;
				}
				else
				{
				$price=$price+$rowPrice['wednesday_price'];	
				}
				
			}
			else if($day==4)
			{
				if($rowPrice['thursday_open']==0)
				{
				$skip=1;
				////echo $day.'-'.$skip.'/'.$c;		
				break;
				}
				else
				{
				$price=$price+$rowPrice['thursday_price'];	
				}
				
			}
			else if($day==5)
			{
				if($rowPrice['friday_open']==0)
				{
				$skip=1;
				////echo $day.'-'.$skip.'/'.$c;		
				break;
				}
				else
				{
				$price=$price+$rowPrice['friday_price'];	
				}
				
			}
			else if($day==6)
			{
				if($rowPrice['saturday_open']==0)
				{
				$skip=1;
				////echo $day.'-'.$skip.'/'.$c;		
				break;
				}
				else
				{
				$price=$price+$rowPrice['saturday_price'];	
				}
				
			}
			}
			}
			if($skip==1)
			{
				 
				break;
			}
			}
			 
			
				$stmt->close();
				$dbCon->close();
				 
				return $skip;
	}
	
	
	
	function orderHotelAmenity()
		{
			$dbCon = AppModel::createConnection();
			$hotel_id= $this -> encrypt_decrypt('decrypt',$_POST['id']); 
			$room_type_id= $this -> encrypt_decrypt('decrypt',$_POST['rid']);
			$room_id= $this -> encrypt_decrypt('decrypt',$_POST['rmid']);
			$a_id= $this -> encrypt_decrypt('decrypt',$_POST['aid']);
			
			 $stmt = $dbCon->prepare("insert into `company_hotel_amenities_user_request`(hotel_id,room_type_id,room_id,amenity_id,user_id,created_on) values ( ?, ?, ?, ?, ?, now())");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiisi",$hotel_id,$room_type_id,$room_id,$a_id,$_POST['user_id']);
			$stmt->execute();
			$id=$stmt->insert_id;
			$stmt->close();
			$dbCon->close();
			return $this -> encrypt_decrypt('encrypt',$id);
			
		}
	function hotelBathroomAmenities($data)
		{
			$dbCon = AppModel::createConnection();
			$hotel_id= $this -> encrypt_decrypt('decrypt',$data['id']); 
			$room_type_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$room_id= $this -> encrypt_decrypt('decrypt',$data['rmid']);
			 
			$stmt = $dbCon->prepare("select hotel_bathroom_amenities from hotel_basic_information where property_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $hotel_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select bathroom_amenities_available from company_hotel_room_type_detail where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $room_type_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowRtype = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select room_bathroom_amenities from hotel_room_detail where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $room_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowRoom = $result->fetch_assoc();
			$amenities=$row['hotel_bathroom_amenities'].''.$rowRtype['bathroom_amenities_available'].''.$rowRoom['room_bathroom_amenities'];
			 
			$stmt = $dbCon->prepare("select * from company_hotel_bathroom_amenities where find_in_set(id,?) and is_order>0");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $amenities);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row  = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt','b_'.$row['id']);
				$j++;
			}
			
			return $org;
		}
	
	function hotelMediaAmenities($data)
		{
			$dbCon = AppModel::createConnection();
			$hotel_id= $this -> encrypt_decrypt('decrypt',$data['id']); 
			$room_type_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$room_id= $this -> encrypt_decrypt('decrypt',$data['rmid']);
			 
			$stmt = $dbCon->prepare("select hotel_connectivity_amenities from hotel_basic_information where property_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $hotel_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select connectivity_amenities_available from company_hotel_room_type_detail where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $room_type_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowRtype = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select room_connectivity_amenities from hotel_room_detail where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $room_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowRoom = $result->fetch_assoc();
			$amenities=$row['hotel_connectivity_amenities'].''.$rowRtype['connectivity_amenities_available'].''.$rowRoom['room_connectivity_amenities'];
			 
			$stmt = $dbCon->prepare("select * from company_hotel_connectivity_amenities where find_in_set(id,?) and is_order>0");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $amenities);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row  = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt','c_'.$row['id']);
				$j++;
			}
			
			return $org;
		}
	
	function hotelRoomAmenities($data)
		{
			$dbCon = AppModel::createConnection();
			$hotel_id= $this -> encrypt_decrypt('decrypt',$data['id']); 
			$room_type_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$room_id= $this -> encrypt_decrypt('decrypt',$data['rmid']);
			 
			$stmt = $dbCon->prepare("select hotel_general_amenities from hotel_basic_information where property_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $hotel_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select general_amenities_available from company_hotel_room_type_detail where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $room_type_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowRtype = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select room_general_amenities from hotel_room_detail where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $room_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowRoom = $result->fetch_assoc();
			$amenities=$row['hotel_general_amenities'].''.$rowRtype['general_amenities_available'].''.$rowRoom['room_general_amenities'];
			
			$stmt = $dbCon->prepare("select * from company_hotel_general_amenities where find_in_set(id,?) and is_order>0 and is_room=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $amenities);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row  = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt','g_'.$row['id']);
				$j++;
			}
			
			return $org;
		}
	
		function hotelBedAmenities($data)
		{
			$dbCon = AppModel::createConnection();
			$hotel_id= $this -> encrypt_decrypt('decrypt',$data['id']); 
			$room_type_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$room_id= $this -> encrypt_decrypt('decrypt',$data['rmid']);
			 
			$stmt = $dbCon->prepare("select hotel_general_amenities from hotel_basic_information where property_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $hotel_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select general_amenities_available from company_hotel_room_type_detail where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $room_type_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowRtype = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select room_general_amenities from hotel_room_detail where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $room_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowRoom = $result->fetch_assoc();
			$amenities=$row['hotel_general_amenities'].''.$rowRtype['general_amenities_available'].''.$rowRoom['room_general_amenities'];
			
			$stmt = $dbCon->prepare("select * from company_hotel_general_amenities where find_in_set(id,?) and is_order>0 and is_room=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $amenities);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row  = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt','g_'.$row['id']);
				$j++;
			}
			
			return $org;
		}
	
	function updateLeave($data)
		{
			$dbCon = AppModel::createConnection();
			$st=1;
			$next_days=$data['day_leave']-1;
			$date = date("Y-m-d");
			$mod_date = date('Y-m-d',strtotime($date."+ ".$next_days." days"));
			//echo $mod_date; echo $date; die;
			$stmt = $dbCon->prepare("insert into employee_leave_vacation(company_id,user_id,leave_start,leave_end,created_on,total_leave,is_approved,leave_description) values(?,?,now(),?,now(),?,?, ?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iisiis", $data['company_id'],$data['user_id'],$mod_date,$data['day_leave'],$st,$data['leave_description']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateVacationInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$st=2;
			 $diff = strtotime($data['end_date']) - strtotime($data['start_date']); 
			 $diff = abs(round($diff / 86400))+1; 
			 
			$stmt = $dbCon->prepare("insert into employee_leave_vacation(company_id,user_id,leave_start,leave_end,created_on,total_leave,leave_type,leave_description) values(?,?,?,?,now(),?,?, ?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iissiis", $data['company_id'],$data['user_id'],$data['start_date'],$data['end_date'],$diff,$st,$data['leave_description']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
	
	function checkEmployeeTime($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select max(id) as eid,max(created_on) edate from employee_attendence where company_id=? and user_id=? and is_exit=0");
			$stmt->bind_param("ii", $data['company_id'],$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			date_default_timezone_set("Europe/Stockholm");
			$starttimestamp = strtotime($row['edate']);
			$endtimestamp = strtotime(date('Y-m-d H:i:s'));
			//echo $starttimestamp.'-'; echo $endtimestamp;
			$difference = floor(abs($endtimestamp - $starttimestamp)/3600);
			$difference2 = floor(abs($endtimestamp - $starttimestamp )/60);
			$difference2=$difference2 -($difference*60);
			$difference3 = floor(abs($endtimestamp - $starttimestamp));
			$difference3 = abs($difference3 - ($difference*3600) - ($difference2*60));
			$row['diffh']=$difference;
			$row['diffm']=$difference2;
			$row['diffs']=$difference3;
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		 		
		}
	function updateAttendence($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("insert into employee_attendence(company_id,user_id,entry_date,entry_time,created_on) values(?,?,now(),now(),now())");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['company_id'],$data['user_id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateExit($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("update employee_attendence set  exit_time=now(),modified_on=now(),is_exit=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['eid']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
	
	function checkEmployeeAttendence($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $data['company_id'];
			
			$stmt = $dbCon->prepare("select max(id),max(entry_date) edate from employee_attendence where company_id=? and user_id=? and is_exit=0");
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if(date('Y-m-d',strtotime($row['edate']))==date('Y-m-d'))
			{
		 
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			else
			{
			 
			$stmt = $dbCon->prepare("select id from employee_leave_vacation where company_id=? and user_id=? and leave_type=1");
			$stmt->bind_param("ii", $company_id,$data['user_id']);
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
					 
			$stmt = $dbCon->prepare("select leave_start,leave_end from employee_leave_vacation where id=?");
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();	
			if((date('Y-m-d',strtotime($row['leave_start']))==date('Y-m-d') || date('Y-m-d',strtotime($row['leave_end']))==date('Y-m-d')) || (date('Y-m-d',strtotime($row['leave_start']))<date('Y-m-d') && date('Y-m-d',strtotime($row['leave_end']))>date('Y-m-d')))
			{
					 
			$stmt->close();
			$dbCon->close();
			return 2;
			}
			else
			{
				 
			$stmt->close();
			$dbCon->close();
			return 0;
			}
			}
			}
			
		}
    
	
	function hotelPayInfo()
		{
			 
			$dbCon = AppModel::createConnection();
			 
			$id= $this -> encrypt_decrypt('decrypt',$_POST['id']);  
			 
			$stmt = $dbCon->prepare("select buyer_id,is_buyer_company,hotel_checkout_detail.user_id,visiting_address,port_number,visiting_city,visiting_state,property_location.id as p_id,room_type_id,total_days,price,hotel_name,fdesk_country_code,fdesk_phone_number from hotel_checkout_detail left join company_hotel_room_type_detail on company_hotel_room_type_detail.id= hotel_checkout_detail.room_type_id left join hotel_basic_information on hotel_basic_information.property_id=company_hotel_room_type_detail.location_id left join property_location on property_location.id=hotel_basic_information.property_id where hotel_checkout_detail.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowPrice = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from hotel_images where property_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $rowPrice['p_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowImage = $result->fetch_assoc();
			
			$filename="../estorecss/".$rowImage['image_path'].".txt"; $value_a=file_get_contents("../estorecss/".$rowImage['image_path'].".txt"); $value_a=str_replace('"','',$value_a); $rowImage['image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowImage['image_path'].'.jpg' );
			$rowPrice['image_path']=str_replace('../','https://www.qloudid.com/',$rowImage['image_path']);
			
			
			
		  if($row['is_buyer_company']==0)
		  {
			  $buyer=$rowPrice['user_id'];
			  $is_buyer_company=0;
			  $stmt = $dbCon->prepare("select concat_ws(' ', first_name,last_name) as name,email from user_logins where id = ?");
        
				/* bind parameters for markers */
				$stmt->bind_param("i", $buyer);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowUser    = $result->fetch_assoc();
				 
		  }
		  else
		   {
			  $buyer=$rowPrice['buyer_id'];
			  $is_buyer_company=1;
			   $stmt = $dbCon->prepare("select company_name as name,company_email as email from companies where id = ?");
        
				/* bind parameters for markers */
				$stmt->bind_param("i", $buyer);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowUser    = $result->fetch_assoc();
		  }
		  
			$price=$rowPrice['price']*$rowPrice['total_days']*100;
			 if($price<300)
			 {
				 $price=300;
			 }
			$rowPrice['name']=$rowUser['name'];
			$rowPrice['email']=$rowUser['email'];
			$rowPrice['price']=$price;
			 
			return $rowPrice;
		}
	
	function apartmentPayInfo()
		{
			 
			$dbCon = AppModel::createConnection();
			 
			$id= $this -> encrypt_decrypt('decrypt',$_POST['id']);  
			 
			$stmt = $dbCon->prepare("select passport_image,buyer_id,is_buyer_company,hotel_checkout_detail.user_id,user_address.address as visiting_address,user_address.port_number,user_address.city as visiting_city,user_address.state as visiting_state,user_address.id as p_id,room_type_id,total_days,price,property_nickname as hotel_name,country_code as fdesk_country_code,phone_number as fdesk_phone_number from hotel_checkout_detail left join user_address on user_address.id= hotel_checkout_detail.room_type_id left join user_profiles on user_profiles.user_logins_id=user_address.user_id left join user_logins on user_logins.id=user_address.user_id left join phone_country_code on user_logins.country_of_residence=phone_country_code.id where hotel_checkout_detail.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowPrice = $result->fetch_assoc();
			
			 
			
			$filename="../estorecss/".$rowPrice['passport_image'].".txt"; $value_a=file_get_contents("../estorecss/".$rowPrice['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $rowPrice['passport_image'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowPrice['passport_image'].'.jpg' );
			$rowPrice['image_path']=str_replace('../','https://www.qloudid.com/',$rowPrice['passport_image']);
			
			
			
		  if($row['is_buyer_company']==0)
		  {
			  $buyer=$rowPrice['user_id'];
			  $is_buyer_company=0;
			  $stmt = $dbCon->prepare("select concat_ws(' ', first_name,last_name) as name,email from user_logins where id = ?");
        
				/* bind parameters for markers */
				$stmt->bind_param("i", $buyer);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowUser    = $result->fetch_assoc();
				 
		  }
		  else
		   {
			  $buyer=$rowPrice['buyer_id'];
			  $is_buyer_company=1;
			   $stmt = $dbCon->prepare("select company_name as name,company_email as email from companies where id = ?");
        
				/* bind parameters for markers */
				$stmt->bind_param("i", $buyer);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowUser    = $result->fetch_assoc();
		  }
		  
			$price=$rowPrice['price']*$rowPrice['total_days']*100;
			 if($price<300)
			 {
				 $price=300;
			 }
			$rowPrice['name']=$rowUser['name'];
			$rowPrice['email']=$rowUser['email'];
			$rowPrice['price']=$price;
			 
			return $rowPrice;
		}
	
	
	
	function hotelDetailRoomTypeInfo()
		{
			 
			$dbCon = AppModel::createConnection();
			$hotel_id= $this -> encrypt_decrypt('decrypt',$_POST['id']);  
			 
			$stmt = $dbCon->prepare("select property_location.id as hotel_id,hotel_description,web_type,website,fdesk_country_code,fdesk_phone_number,property_location.latitude,property_location.longitude,profile_pic,property_location.visiting_address,country_code,phone,hotel_name from hotel_basic_information left join property_location on property_location.id=hotel_basic_information.property_id left join company_profiles on property_location.company_id=company_profiles.company_id left join phone_country_code on phone_country_code.id=hotel_basic_information.fdesk_country_code where property_location.id=(select location_id from company_hotel_room_type_detail where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $hotel_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 if($row ['profile_pic']!=null) { $filename="../estorecss/".$row ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a); $row['image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['profile_pic'].'.jpg' ); } else { $row['image_path']="../html/usercontent/images/default-profile-pic.jpg"; } }  else $row['image_path']="../html/usercontent/images/default-profile-pic.jpg";
			 $row['enc']=$this -> encrypt_decrypt('encrypt',$row['hotel_id']);
				$stmt->close();
				$dbCon->close();
				 
				return $row;
			
		}
	
	function hotelRoomTypeInfo()
		{
			$dbCon = AppModel::createConnection();
			$hotel_id= $this -> encrypt_decrypt('decrypt',$_POST['id']);  
			$room_id= $this -> encrypt_decrypt('decrypt',$_POST['rid']);  
			$stmt = $dbCon->prepare("select hotel_description,web_type,website,fdesk_country_code,fdesk_phone_number,property_location.longitude,property_location.latitude,hotel_name,property_location.visiting_address,company_hotel_room_type_detail.id,room_type_name,room_price,hotel_room_type.room_type from company_hotel_room_type_detail left join hotel_room_type on hotel_room_type.id=company_hotel_room_type_detail.room_type left join hotel_basic_information on company_hotel_room_type_detail.location_id=hotel_basic_information.property_id left join property_location on property_location.id=hotel_basic_information.property_id where company_hotel_room_type_detail.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $hotel_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$big="new0.09086000 1600564862";
			$small1="new0.13561200 1600564862";
			$small2="new0.15516700 1600564862";
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select room_price_info from hotel_room_detail where hotel_room_detail.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $room_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();
			$row['room_price']=$row1['room_price_info'];
			$stmt->close();
			$dbCon->close();
			 
			return $row;
			
		}
		
		
		function hotelRoomTypePriceInfo()
		{
			$dbCon = AppModel::createConnection();
			$hotel_id= $this -> encrypt_decrypt('decrypt',$_POST['id']);  
			$room_id= $this -> encrypt_decrypt('decrypt',$_POST['rid']);  
			 
			$stmt = $dbCon->prepare("select hotel_description,web_type,website,fdesk_country_code,fdesk_phone_number,property_location.longitude,property_location.latitude,hotel_name,property_location.visiting_address,company_hotel_room_type_detail.id,room_type_name,room_price,hotel_room_type.room_type from company_hotel_room_type_detail left join hotel_room_type on hotel_room_type.id=company_hotel_room_type_detail.room_type left join hotel_basic_information on company_hotel_room_type_detail.location_id=hotel_basic_information.property_id left join property_location on property_location.id=hotel_basic_information.property_id where company_hotel_room_type_detail.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $room_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$big="new0.09086000 1600564862";
			$small1="new0.13561200 1600564862";
			$small2="new0.15516700 1600564862";
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			 
			return $row;
			
		}
	
	
	
	
	function hotelRoomTypeImages()
		{
			$dbCon = AppModel::createConnection();
			$hotel_id= $this -> encrypt_decrypt('decrypt',$_POST['id']);  
			$stmt = $dbCon->prepare("select * from company_hotel_room_type_photos where room_type_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $hotel_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			 $filename="../estorecss/".$row['image_path'].".txt"; $value_a=file_get_contents("../estorecss/".$row['image_path'].".txt"); $value_a=str_replace('"','',$value_a); $row['image_path1'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['image_path'].'.jpg' );
			$row['image_path1']=str_replace('../','qloudid.com/',$row['image_path1']);
			array_push($org,$row);
			}
			return $org;
			
		}
	
	function hotelList()
	{
		 
		$dbCon = AppModel::createConnection();
			$search='%'.$_POST['city'].'%';
			$stmt = $dbCon->prepare("select property_location.id,profile_pic,property_location.visiting_address,country_code,phone,hotel_name,property_location.latitude,property_location.longitude from hotel_basic_information left join property_location on property_location.id=hotel_basic_information.property_id  left join company_profiles on property_location.company_id=company_profiles.company_id left join phone_country_code on phone_country_code.country_name=company_profiles.phone_country where is_hotel=1 and (property_location.visiting_address like ? or property_location.visiting_state like ? or property_location.visiting_city like ?) ");
			
			/* bind parameters for markers */
			$stmt->bind_param("sss", $search,$search,$search);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$big="new0.09086000 1600564862";
			$small1="new0.13561200 1600564862";
			$small2="new0.15516700 1600564862";
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
		
			$stmt = $dbCon->prepare("select min(room_price) as price from company_hotel_room_type_detail where location_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$resultPrice = $stmt->get_result();
			$rowPrice = $resultPrice->fetch_assoc();
			$row['price']=$rowPrice['price'];
			
			$stmt = $dbCon->prepare("select image_path from hotel_images where property_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$resultImage = $stmt->get_result();
			$rowImage = $resultImage->fetch_assoc();
			 
			if(empty($rowImage))
			{
				$bigImage=$big;
			}
			else
			{
			$bigImage=$rowImage['image_path'];	
			}
			 
			 $filename="../estorecss/".$bigImage.".txt"; $value_a=file_get_contents("../estorecss/".$bigImage.".txt"); $value_a=str_replace('"','',$value_a); $row['image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$bigImage.'.jpg' );
			 $row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);  
			$row['image_path']=str_replace('../','https://www.qloudid.com/',$row['image_path']);
			array_push($org,$row);
			$org[$j]['images']=array();
			
			$stmt = $dbCon->prepare("select image_path from hotel_images where property_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$resultImages = $stmt->get_result();
			while($rowImages = $resultImages->fetch_assoc())
			{
			$bigImage=$rowImages['image_path'];	
			$filename="../estorecss/".$bigImage.".txt"; $value_a=file_get_contents("../estorecss/".$bigImage.".txt"); $value_a=str_replace('"','',$value_a); $rowImages['image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$bigImage.'.jpg' );
			 
			$rowImages['image_path']=str_replace('../','https://www.qloudid.com/',$rowImages['image_path']);
			array_push($org[$j]['images'],$rowImages);	
			}
			
			if(empty($rowImages = $resultImages->fetch_assoc()))
			{
				$org[$j]['images'][0]['image_path']=$row['image_path'];
			}
			$j++;
			}
			 
				$stmt->close();
				$dbCon->close();
				 
				return $org;
	}
	
		function hotelRoomTypeList()
		{
			$dbCon = AppModel::createConnection();
			$hotel_id= $this -> encrypt_decrypt('decrypt',$_POST['id']);  
			$stmt = $dbCon->prepare("select hotel_description,web_type,website,fdesk_country_code,fdesk_phone_number,longitude,latitude,hotel_name,property_location.visiting_address,company_hotel_room_type_detail.id,room_type_name,room_price,hotel_room_type.room_type from company_hotel_room_type_detail left join hotel_room_type on hotel_room_type.id=company_hotel_room_type_detail.room_type left join hotel_basic_information on company_hotel_room_type_detail.location_id=hotel_basic_information.property_id left join property_location on property_location.id=hotel_basic_information.property_id where company_hotel_room_type_detail.location_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $hotel_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0; 
			while($row = $result->fetch_assoc())
			{
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);  
			array_push($org,$row); 
			$stmt = $dbCon->prepare("select image_path from company_hotel_room_type_photos where room_type_id=? limit 0,6");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$org[$j]['images']=array();
			while($row1 = $result1->fetch_assoc())
			{
			$image=$row1['image_path'];
			$value_a=file_get_contents("../estorecss/".$image.".txt"); $value_a=str_replace('"','',$value_a); $row1['image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$image.'.jpg' );
			$row1['image_path']=str_replace('../','https://www.qloudid.com/',$row1['image_path']);	
			array_push($org[$j]['images'],$row1);			
			}
			
			$stmt = $dbCon->prepare("select id,room_price_info,room_name from hotel_room_detail where room_type=? group by room_price_info");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$org[$j]['rooms']=array();
			while($row1 = $result1->fetch_assoc())
			{
			$row1['enc']= $this -> encrypt_decrypt('encrypt',$row1['id']); 	
			array_push($org[$j]['rooms'],$row1);			
			}
			
			$j++;
			}
			//echo '<pre>'; print_r($org); echo '</pre>'; die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
		}
	
		function hotelRoomTypeCheckinList()
		{
			$dbCon = AppModel::createConnection();
			 $a=explode(',',substr($_POST['id_checkout'],0,-1));
			 $org=array();
			 foreach($a as $key)
			 {
			$stmt = $dbCon->prepare("select hotel_basic_information.property_id,hotel_description,web_type,website,fdesk_country_code,fdesk_phone_number,longitude,latitude,hotel_name,property_location.visiting_address,company_hotel_room_type_detail.id,room_type_name,room_price,hotel_room_type.room_type from company_hotel_room_type_detail left join hotel_room_type on hotel_room_type.id=company_hotel_room_type_detail.room_type left join hotel_basic_information on company_hotel_room_type_detail.location_id=hotel_basic_information.property_id left join property_location on property_location.id=hotel_basic_information.property_id where company_hotel_room_type_detail.id=(select room_type_id from hotel_checkout_detail where id=?) ");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $key);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$j=0; 
			$row = $result->fetch_assoc();
			$row['property_id_enc']= $this -> encrypt_decrypt('encrypt',$row['property_id']); 
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);  
			$row['qloud_checkout_id']=$this->encrypt_decrypt('encrypt',$key);
			array_push($org,$row); 
			$stmt = $dbCon->prepare("select image_path from company_hotel_room_type_photos where room_type_id=? limit 0,6");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$org[$j]['images']=array();
			while($row1 = $result1->fetch_assoc())
			{
			$image=$row1['image_path'];
			$value_a=file_get_contents("../estorecss/".$image.".txt"); $value_a=str_replace('"','',$value_a); $row1['image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$image.'.jpg' );
			$row1['image_path']=str_replace('../','https://www.qloudid.com/',$row1['image_path']);	
			array_push($org[$j]['images'],$row1);			
			}
			
			$stmt = $dbCon->prepare("select id,room_price_info,room_name from hotel_room_detail where room_type=? group by room_price_info");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$org[$j]['rooms']=array();
			while($row1 = $result1->fetch_assoc())
			{
			$row1['enc']= $this -> encrypt_decrypt('encrypt',$row1['id']); 
			
			array_push($org[$j]['rooms'],$row1);	
			
			}
			 
			
			$j++;
			}
			//echo '<pre>'; print_r($org); echo '</pre>'; die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
		}
	
	
	function apartmentCheckedInList()
		{
			$dbCon = AppModel::createConnection();
			  
			$stmt = $dbCon->prepare("select id,property_nickname,address from user_address where find_in_set(id, ?) ");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['room_type']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0; 
			while($row = $result->fetch_assoc())
			{
			 
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);  
			array_push($org,$row); 
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
		}
	
	
	
	function hotelImages()
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$_POST['id']);
 			
			$stmt = $dbCon->prepare("select * from hotel_images where property_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			 $filename="../estorecss/".$row['image_path'].".txt"; $value_a=file_get_contents("../estorecss/".$row['image_path'].".txt"); $value_a=str_replace('"','',$value_a); $row['image_path1'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['image_path'].'.jpg' );
			$row['image_path1']=str_replace('../','qloudid.com/',$row['image_path1']);
			array_push($org,$row);
			}
			return $org;
			
		}
			
		function hotelImagesCount()
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$_POST['id']);
 			
			$stmt = $dbCon->prepare("select count(id) as num from hotel_images where property_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			return $row['num'];
			
		}
		
			function hotelDetailInfo()
		{
			$dbCon = AppModel::createConnection();
			$hotel_id= $this -> encrypt_decrypt('decrypt',$_POST['id']);  
			 
			$stmt = $dbCon->prepare("select hotel_description,web_type,website,fdesk_country_code,fdesk_phone_number,property_location.latitude,property_location.longitude,profile_pic,property_location.visiting_address,country_code,phone,hotel_name from hotel_basic_information left join property_location on property_location.id=hotel_basic_information.property_id left join company_profiles on property_location.company_id=company_profiles.company_id left join phone_country_code on phone_country_code.id=hotel_basic_information.fdesk_country_code where property_location.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $hotel_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			 if($row ['profile_pic']!=null) { $filename="../estorecss/".$row ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a); $row['image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['profile_pic'].'.jpg' ); } else { $row['image_path']="../html/usercontent/images/default-profile-pic.jpg"; } }  else $row['image_path']="../html/usercontent/images/default-profile-pic.jpg";
			 $row['image_path']=str_replace('../','qloudid.com/',$row['image_path']);
				$stmt->close();
				$dbCon->close();
				 
				return $row;
			
		}
	
		
	
	function contactList($data)
    {
        $dbCon = AppModel::createConnection();
		  
		$stmt = $dbCon->prepare("select is_admin,address,passport_image,employees.first_name,employees.id,concat_ws(' ',employees.first_name,employees.last_name)  as name,company_name,employees.email,employees.company_id,employees.user_login_id from employees left join companies on companies.id=employees.company_id left join user_logins on user_logins.id=employees.user_login_id  left join company_profiles on company_profiles.company_id=employees.company_id left join manage_employee_permissions on employees.id=manage_employee_permissions.employee_id where employees.company_id=? order by employees.first_name");
		$stmt->bind_param("i", $data['company_id']);
		$stmt->execute();
		$result = $stmt->get_result();
		$org=array();
		while($row = $result->fetch_assoc())
		{
		 
		$stmt = $dbCon->prepare("select title from user_company_profile where company_id=? and user_login_id=?");
		$stmt->bind_param("ii", $row['company_id'],$row['user_login_id']);
		$stmt->execute();
		$resultTitle = $stmt->get_result();
		$rowTitle = $resultTitle->fetch_assoc();	
		if($rowTitle['title']=='' || $rowTitle['title']==null)
		{
			$row['title']='Employee';
		}
		else
		{
			$row['title']=$rowTitle['title'];	
		}
		if($row['passport_image']!=null || $row['passport_image']!="") { 
						 
		$filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['passport_image'].'.jpg' ); $imgs=str_replace('../','',$imgs); $imgs='https://www.qloudid.com/'.$imgs; } else {   $imgs="https://www.qloudid.com/estorecss/logoXXX.png"; }
		$row['image']=$imgs;
		}
		else
		{
		$row['image']='https://www.qloudid.com/estorecss/logoXXX.png';
		}
						 
		$row['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);	
		 
		array_push($org,$row);
					
		}
		 
		$stmt->close();
        $dbCon->close();
		return $org;
	}
	
	
	 
	
	
	function employerRequestCount($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$user_id=$data['user_id'];
			$stmt = $dbCon->prepare("select email from user_logins where id=?");
			$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select count(estore_employee_invite.id) as num from estore_employee_invite left join invitation on estore_employee_invite.id=invitation.invited_user_id where (estore_employee_invite.email=? or estore_employee_invite.work_email=?) and invitation.status=0 and is_relieved=0");
			$stmt->bind_param("ss", $row['email'],$row['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
			
			
		}
		
	function employerRequestReceived($data)
		{
			$dbCon = AppModel::createConnection();
			$user_id=$data['user_id'];
			$stmt = $dbCon->prepare("select email from user_logins where id=?");
			$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select invited_emp,estore_employee_invite.id,invitation.status,invitation.created_date,company_name from estore_employee_invite left join invitation on estore_employee_invite.id=invitation.invited_user_id left join companies on estore_employee_invite.company_id=companies.id where (estore_employee_invite.email=? or estore_employee_invite.work_email=? ) and invitation.status=0 and is_relieved=0 limit 0,5");
			$stmt->bind_param("ss", $row['email'],$row['email']);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$row['company_name']=html_entity_decode($row['company_name'],ENT_NOQUOTES, 'UTF-8');
				array_push($org,$row); 
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function approveEmployerRequest($data)
		{
			$dbCon = AppModel::createConnection();
			
			$request_id= $data['id'];
			$stmt= $dbCon->prepare("select invited_emp,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p,employee_number from estore_employee_invite where id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_emp = $result->fetch_assoc();
			
			$company=$row_emp['company_id'];
			$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where email= ? or email=?");
			$stmt->bind_param("ss", $row_emp['email'], $row_emp['work_email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_id = $result->fetch_assoc();
			$fields=array();
			$fields=$row_id;
			$fields['qloudid']=$request_id;
			$fields['stat']=$data['stat'];
			 
			$url='https://www.qmatchup.com/beta/user/index.php/Invitation/updateQloud';
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL, $url);
			curl_setopt($ch,CURLOPT_POST, count($fields));
			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_REFERER, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, true);
			curl_setopt($ch, CURLOPT_COOKIEFILE, true);
			 
			$result=curl_exec ($ch);
			  
			curl_close ($ch);
			 
			
			$d=date('Y-m-d');
			if($data['stat']==2)
			{
				$stmt= $dbCon->prepare("update invitation set status=2,accepted_date=? where invited_user_id= ?");
				$stmt->bind_param("si",$d,$request_id);
				$stmt->execute();
				$stmt= $dbCon->prepare("select invited_emp,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p,employee_number from estore_employee_invite where id=?");
				
				$stmt->bind_param("i", $request_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_emp = $result->fetch_assoc();
				$company=$row_emp['company_id'];
				
				$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where email= ? or email=?");
				
				$stmt->bind_param("ss", $row_emp['email'], $row_emp['work_email']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_id = $result->fetch_assoc();
				
				$stmt= $dbCon->prepare("update estore_employee_invite set real_employee_id=? where id=? ");
				$stmt->bind_param("ii", $row_id['id'],$request_id);
				$stmt->execute();
			}
			else if($data['stat']==1)
			{
				$stmt= $dbCon->prepare("select invited_emp,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p,employee_number from estore_employee_invite where id=?");
				
				$stmt->bind_param("i", $request_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_emp = $result->fetch_assoc();
				$company=$row_emp['company_id'];
				$stmt= $dbCon->prepare("update invitation set status=1,accepted_date=? where invited_user_id= ?");
				$stmt->bind_param("si", $d,$request_id);
				if($stmt->execute())
				{
					$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where id= ?");
					
					$stmt->bind_param("i", $data['user_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$row_id = $result->fetch_assoc();
					
					$s=0;
					$u=1;
					$stmt= $dbCon->prepare("insert into company_permission (`company_id`,`user_login_id`,`purchase`,`alert`,`supplier`,`customer`,`employee`,`proposal`,`project_proposal`,`create_article`,`import_article`) values (?,?,?,?,?,?,?,?,?,?,?)");
					$stmt->bind_param("iiiiiiiiiii", $company,$row_id['id'],$s,$s,$s,$s,$u,$s,$s,$s,$s);
					$stmt->execute();
					if($row_emp['invited_emp']==1)
					{
						$stmt= $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`, employee_number) values (?,?,?,?,?,?,?, ?)");
						$stmt->bind_param("ississis", $company,$row_id['first_name'],$row_id['last_name'],$s,$row_id['hash_code'],$row_id['email'],$row_id['id'],$row_emp['employee_number']);
					}  
					else if($row_emp['invited_emp']==2)
					{
						$stmt= $dbCon->prepare("insert into students (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`) values (?,?,?,?,?,?,?,?)");
						$stmt->bind_param("ississi", $company,$row_id['first_name'],$row_id['last_name'],$s,$row_id['hash_code'],$row_id['email'],$row_id['id']);
					}  
					if($stmt->execute())
					{
						
						
						$stmt= $dbCon->prepare("update estore_employee_invite set real_employee_id=? where id=? ");
						$stmt->bind_param("ii", $row_id['id'],$request_id);
						$stmt->execute();
						
						
						$stmt= $dbCon->prepare("select mobile_p,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p from estore_employee_invite where id=?");
						$stmt->bind_param("i", $request_id);
						$stmt->execute();
						$result = $stmt->get_result();
						$row_emp = $result->fetch_assoc();
						$company=$row_emp['company_id'];
						
						$stmt= $dbCon->prepare("update user_logins set dob_day=?,dob_month=?,dob_year=?,dob_day_p=?,dob_month_p=?, dob_year_p=? where id=?");
						$stmt->bind_param("iiiiiii", $row_emp['dob_day_p'],$row_emp['dob_month_p'],$row_emp['dob_year_p'],$row_emp['dob_day_p'],$row_emp['dob_month_p'],$row_emp['dob_year_p'],$row['id']);
						//$stmt->execute();
						
						$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where email= ? or email=?");
						//echo $query; die;
						$stmt->bind_param("ss", $row_emp['email'], $row_emp['work_email']);
						$stmt->execute();
						$result = $stmt->get_result();
						$row_id = $result->fetch_assoc();
						
						
						$stmt= $dbCon->prepare("select * from virtual_user_company_profile where company_id=? and invited_user_id=?");
						$stmt->bind_param("ii", $company,$request_id);
						$stmt->execute();
						$result = $stmt->get_result();
						$row_virtual = $result->fetch_assoc();
						
						if(empty($row_virtual))
						{
							$stmt= $dbCon->prepare("insert into user_company_profile (company_id,user_login_id,title,email) values (?,?,?,?)");
							$stmt->bind_param("iiss", $company,$row_id['id'],$row_emp['title'],$row_emp['work_email']);
							$stmt->execute();
						}
						else
						{
							if($row_virtual['job_function']=="" || $row_virtual['job_function']==null)
							{
								$row_virtual['job_function']=1;
							}
							$stmt= $dbCon->prepare("insert into user_company_profile (location_id,job_function,ssn,e_number,description_job,e_type,h_date,res_date,company_id,user_login_id,title,department,phone,mobile,email,fax,skype,facebook,twitter,i_street,i_town,i_city,i_zip,i_country,d_street,d_town,d_city,d_zip,d_country,b_member,mentor,c_id,prospect,partner,supplier) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
							$stmt->bind_param("iissssssiisssssssssssssssssssssssss",$row_virtual['location_id'],$row_virtual['job_function'],$row_virtual['ssn'],$row_virtual['e_number'],$row_virtual['description_job'],$row_virtual['e_type'],$row_virtual['h_date'],$row_virtual['res_date'],$company,$row_id['id'],$row_virtual['title'],$row_virtual['department'],$row_virtual['phone'],$row_virtual['mobile'],$row_virtual['email'],$row_virtual['fax'],$row_virtual['skype'],$row_virtual['facebook'],$row_virtual['twitter'],$row_virtual['i_street'],$row_virtual['i_town'],$row_virtual['i_city'],$row_virtual['i_zip'],$row_virtual['i_country'],$row_virtual['d_street'],$row_virtual['d_town'],$row_virtual['d_city'],$row_virtual['d_zip'],$row_virtual['d_country'],$row_virtual['b_member'],$row_virtual['mentor'],$row_virtual['c_id'],$row_virtual['prospect'],$row_virtual['partner'],$row_virtual['supplier']);
							$stmt->execute();
						}
						
						
						$stmt= $dbCon->prepare("select * from virtual_user_profiles where invited_user_id=?");
						$stmt->bind_param("i", $request_id);
						$stmt->execute();
						$result = $stmt->get_result();
						$row_uvirtual = $result->fetch_assoc();
						
						if(!empty($row_uvirtual))
						{
							$stmt= $dbCon->prepare("select id from user_profiles where user_logins_id=?");
							
							$stmt->bind_param("i", $row_id['id']);
							$stmt->execute();
							$result = $stmt->get_result();
							$row_pro = $result->fetch_assoc();
							$d=date('Y-m-d');
							if(empty($row_pro))
							{
								$stmt= $dbCon->prepare("insert into user_profiles (mobile_p,nation,user_logins_id,created_on,modified_on,summary,zipcode,city,state,country,phone_number,address,marital_status,blog,skype,linkedln,facebook,twitter,instagram) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
								$stmt->bind_param("ssissssssssssssssss", $row_emp['mobile_p'],$row_uvirtual['nation'],$row_id['id'],$d,$d,$row_uvirtual['summary'],$row_uvirtual['zipcode'],$row_uvirtual['city'],$row_uvirtual['state'],$row_uvirtual['country'],$row_uvirtual['phone_number'],$row_uvirtual['address'],$row_uvirtual['marital_status'],$row_uvirtual['blog'],$row_uvirtual['skype'],$row_uvirtual['linkedln'],$row_uvirtual['facebook'],$row_uvirtual['twitter'],$row_uvirtual['instagram']);
								$stmt->execute();
							}
							else 
							{
								$stmt= $dbCon->prepare("update user_profiles set modified_on=?,summary=?,zipcode=?,city=?,state=?,country=?,phone_number=?,address=?,marital_status=?,blog=?,skype=?,linkedln=?,facebook=?,twitter=?,instagram=? where user_logins_id=?");
								$stmt->bind_param("sssssssssssssssi", $d,$row_uvirtual['summary'],$row_uvirtual['zipcode'],$row_uvirtual['city'],$row_uvirtual['state'],$row_uvirtual['country'],$row_uvirtual['phone_number'],$row_uvirtual['address'],$row_uvirtual['marital_status'],$row_uvirtual['blog'],$row_uvirtual['skype'],$row_uvirtual['linkedln'],$row_uvirtual['facebook'],$row_uvirtual['twitter'],$row_uvirtual['instagram'],$row_id['id']);
								$stmt->execute();
							}
						}
						
						
					}
					
				}
			}
			
			$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where company_id=?");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("i", $company);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_invited = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where company_id=? and real_employee_id is not null");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("i", $company);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_invited_approved = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select count(id) as num from employee_request_cloud where company_id=?");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("i", $company);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_request = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select count(id) as num from employee_request_cloud where company_id=? and is_approved=1");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("i", $company);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_request_approved = $result->fetch_assoc();
			
			$total_request=$row_invited['num']+$row_request['num'];
			$total_request_approved=$row_invited_approved['num']+$row_request_approved['num'];
			$completed=($total_request_approved/$total_request)*100;
			$completed=round($completed,0);
			
			$stmt = $dbCon->prepare("update company_profiles set completed_requests=? where company_id=?");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("ii", $completed,$company);
			$stmt->execute();
			
			
			 
			$stmt= $dbCon->prepare("delete from  invitation where invited_user_id= ?");
			$stmt->bind_param("i",$request_id);
			//$stmt->execute();
			$stmt= $dbCon->prepare("delete from  estore_employee_invite where id= ?");
			$stmt->bind_param("i",$request_id);
			//$stmt->execute();
			$stmt= $dbCon->prepare("delete from  virtual_user_company_profile where invited_user_id= ?");
			$stmt->bind_param("i",$request_id);
			//$stmt->execute();
			$stmt= $dbCon->prepare("delete from  virtual_user_profiles where invited_user_id= ?");
			$stmt->bind_param("i",$request_id);
			//$stmt->execute();
			
				$stmt->close();
				$dbCon->close();
				return 1;
			
			
		}
		
		
	
 function checkMobileAvailability($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 
		 $stmt = $dbCon->prepare("select user_profiles.id from user_profiles left join user_logins on user_logins.id=user_profiles.user_logins_id where phone_number=? and country_of_residence=?");
			/* bind parameters for markers */
		$stmt->bind_param("si", $data['MobileNo'],$data['CountryId']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		 $arr=array();
        if(!empty($row))
		{
			$arr['result']=0;
			$stmt->close();
			$dbCon->close();
			return $arr;	
		}
		else
		{ 
	$num=(mt_rand(111111,999999));
	 $stmt = $dbCon->prepare("select id from mobile_otp_verification where phone_number=? and country_code=?");
			/* bind parameters for markers */
		$stmt->bind_param("si", $data['MobileNo'],$data['CountryId']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into mobile_otp_verification (phone_number,country_code,otp) values(?, ?, ?)");
			/* bind parameters for markers */
			$stmt->bind_param("sii", $data['MobileNo'],$data['CountryId'],$num);
			$stmt->execute();	
			}
			else
			{
			$stmt = $dbCon->prepare("update mobile_otp_verification set otp=? where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("si", $num,$row['id']);
			$stmt->execute();
			}
			
			
			 $stmt = $dbCon->prepare("select country_code  from  phone_country_code where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['CountryId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc(); 
			$to            = '+'.trim($row['country_code']).''.trim($data['MobileNo']);
			$subject       = "One time password!";
			$emailContent ="Your one time password to verify your mobile is : ".$num;
			$res=json_decode(sendSms($subject, $to, $emailContent),true);
			 
			if($res['status']=='OK')
			{
			$arr['result']=1;
			}
			else
			{
			$arr['result']=2;	
			}
			$stmt->close();
			$dbCon->close();
			return $arr;	
		}	
		
    }
	
	function verifyAddMobileOtp($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 
		$stmt = $dbCon->prepare("select otp from mobile_otp_verification where phone_number=? and country_code=?");
			/* bind parameters for markers */
		$stmt->bind_param("si", $data['MobileNo'],$data['CountryId']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		  
		 $arr=array();
        if($row['otp']==$data['OtpPin'])
		{
			
			$arr['result']=1;
			$stmt->close();
			$dbCon->close();
			return $arr;	
		}
		else
		{ 
	
			$arr['result']=0;
			$stmt->close();
			$dbCon->close();
			return $arr;	
		}	
		
    }
	
	function createEmailAccount($data) {
			$dbCon = AppModel::createConnection();
			 
			$a=explode('@', $data['Email']);
			$domain = array_pop($a);
			$random_hash = substr(md5(uniqid(rand(), true)), 16, 16); 
			$stmt = $dbCon->prepare("SELECT id FROM user_logins WHERE email=?");
			
			/* bind parameters for markers*/
			$stmt->bind_param("s", $data['Email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$myrow  = $result->fetch_assoc();
			
			if(empty($myrow))
			{
			$key = '56f98a45d581cb76cab4693fa48ae7f9'; 
			$request = 'http://check.block-disposable-email.com/easyapi/json/' . $key . '/' . $domain;
			
			$response = file_get_contents($request);
			
			$dea = json_decode($response);
			$rf=1;
			$st=0;
			$org=array();
			if ($dea->request_status == 'success')
				{
				$num=(mt_rand(111111,999999));
				$stmt = $dbCon->prepare("INSERT INTO user_logins (registered_from,get_started_wizard_status,email,  email_verification_code , created_on , modified_on, country_of_residence,otp_verification ,grading_status) VALUES (?, ?,   ?, ?, now(), now(), ?, ?, ?)");
				
				/*
					The argument may be one of four types:
					
					i - integer
					d - double
					s - string
					b - BLOB
				*/
				$st=0;
				$stmt->bind_param("iissisi", $rf,$st,$data['Email'], $random_hash, $data['CountryId'],$num,$rf);
				$stmt->execute();
				$id=$stmt->insert_id;
				$to      = $data['Email'];
				$subject = "Qloud ID - Verify your email";
				$emailContent='<html>
   <head></head>
   <body>
      <div style="margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding:0">
         <center style="width:100%;table-layout:fixed">
            <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8" style="text-align:center">
               <tbody>
                  <tr>
                     <td>
                        <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td>
                                    <div style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:0px;padding-right:0px">
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#f5f7f8;Margin:0 auto;width:100%" bgcolor="#F5F7F8">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0" bgcolor="#F5F7F8">
                                                   <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#f5f7f8" bgcolor="#F5F7F8">
                                                      <tbody>
                                                         <tr>
                                                            <td style="padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px;background-color:#f5f7f8;color:#f5f7f8;width:100%;font-size:1px;line-height:1px;text-align:left;display:none!important">
                                                               <p style="text-align:left;line-height:6px;Margin-top:0px;Margin-bottom:0px">Dina domäner är inställda på att förnyas automatiskt. Öppna det här e-postmeddelandet för att säkerställa att allt fortfarande är uppdaterat. Och glöm inte att du får 20 % rabatt på nya produkter. &nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;</p>
                                                               <div style="display:none;max-height:0px;overflow:hidden">
                                                                  &nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;
                                                               </div>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:20px">
                                    <div style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:0px;padding-right:0px">
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td style="padding-bottom:20px">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px" bgcolor="#F5F7F8">
                                          <tbody>
                                             <tr>
                                                <td bgcolor="#F5F7F8" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   <table width="73%" style="border-spacing:0;font-family:Audiowide;color:#111111" bgcolor="#F5F7F8">
                                                      <tbody>
                                                         <tr>
                                                            <td style="padding-top:5px;padding-bottom:0;padding-right:0;padding-left:0px" align="left">
                                                               <p style="font-size:30px; font-weight:normal; Audiowide;">Qloudid</p>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                                <td width="100%" bgcolor="#F5F7F8" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111" bgcolor="#F5F7F8">
                                                      <tbody>
                                                         <tr>
                                                            <td style="padding-top:10px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">
                                                               <p style="Margin-top:0px;margin-bottom:0px;font-size:13px;line-height:16px"><strong><a href="tel:077%20588%2080%2023" style="text-decoration:none;color:#111111" target="_blank">Website: <u></u>www.qloudid.com<u></u></a></strong></p>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td style="padding-top:0px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">
                                                               <p style="Margin-top:5px;margin-bottom:0px;font-size:13px;line-height:16px">If you have any questions - <u></u>Contact us<u></u></p>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="background-color:#f5f7f8;padding-top:0;padding-right:0;padding-left:0;padding-bottom:0">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                                       <table bgcolor="#FFFFFF" width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="font-family:sans-serif;color:#111111">
                                          <tbody>
                                             <tr>
                                                <td bgcolor="#FFFFFF" align="left" style="padding-top:0px;padding-bottom:0;padding-right:0px;padding-left:0px;text-align:left;background-color:#ffffff;font-weight:bold;font-size:32px;line-height:42px">
                                                   <div style="text-align: center; line-height: 22px; max-width: 600px;
                                                      float: left;
                                                      position: relative; ">
                                                      <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 red_ff2828_bg  brdb_new tall xs-nobrdb" style="max-width: 100%; background-color: #ff2828 !important;
                                                         width: 960px;
                                                         position: relative;
                                                         margin: 0 auto;
                                                         ">
                                                         <div style="height: 250px; width: auto; max-width: 100%; padding-top: 100px; padding-right: 30px;
                                                            padding-left: 30px; margin-right: auto;
                                                            margin-left: auto;  z-index: 5; max-width: 100%; width: auto;">
                                                            <div class="padding-bottom: 40px; text-align: center; font-size: 45px;"><img src="http://www.qloudid.com/html/usercontent/images/doublecheck.png" width="45px;" height="45px;"></div>
                                                            <div class="padb0 xxs-padb0 ">
                                                               <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:white;">Success</h1>
                                                            </div>
                                                            <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:white; font-size: 20px;">Please verify your email using the one time password : '.$num.'</div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                                       <table bgcolor="#FFFFFF" align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;margin:0 auto;width:100%;max-width:600px">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">
                                                      <tbody>
                                                         <tr>
                                                            <td style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:left">
                                                               <p style="margin-top:0px;line-height:0px;margin-bottom:0px;font-size:4px">&nbsp;</p>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:40px;padding-right:20px">
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">
                                          <tbody>
                                             <tr>
                                                <td width="20" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   <img src="https://ci3.googleusercontent.com/proxy/gvkyMPCroXxkwzdJ2Pg_KqgcjVeVgpVE1dRo8rYCiczuJe5UfJllf1ZtOFiYZsB4FzBoGeU7Xdso4PWQyUOj4qIrHsViEiUFA_KBQA=s0-d-e1-ft#http://imagesak.secureserver.net/promos/std/spc_trans.gif" height="30" width="20" border="0" style="display:block;border-width:0" class="CToWUd">
                                                </td>
                                                <td style="padding-top:0px;padding-bottom:0px;padding-right:0;padding-left:0;text-align:center;font-size:0;background-color:#ffffff">
                                                   <div style="width:100%;max-width:560px;display:inline-block;vertical-align:top">
                                                      <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">
                                                         <tbody>
                                                            <tr>
                                                               <td style="padding-top:0px;padding-bottom:0px;padding-left:20px;padding-right:20px;background-color:#ffffff">
                                                                  <table style="border-spacing:0;font-family:sans-serif;color:#111111;width:100%;font-size:14px;text-align:left;background-color:#ffffff;border-top-color:#e8eaeb;border-top-style:solid;border-top-width:1px">
                                                                     <tbody>
                                                                        <tr>
                                                                           <td style="padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:10px;background-color:#ffffff;width:100%;text-align:left">
                                                                              <table style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;table-layout:fixed">
                                                                                 <tbody>
                                                                                    <tr>
                                                                                       <td style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;background-color:#ffffff;width:100%;text-align:center">
                                                                                          <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px; fsz14px;">This is sent because you have created a new account using Qloud ID App</p>
                                                                                       </td>
                                                                                    </tr>
                                                                                 </tbody>
                                                                              </table>
                                                                           </td>
                                                                        </tr>
                                                                     </tbody>
                                                                  </table>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </div>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                                 <td width="20" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                    <img src="https://ci3.googleusercontent.com/proxy/gvkyMPCroXxkwzdJ2Pg_KqgcjVeVgpVE1dRo8rYCiczuJe5UfJllf1ZtOFiYZsB4FzBoGeU7Xdso4PWQyUOj4qIrHsViEiUFA_KBQA=s0-d-e1-ft#http://imagesak.secureserver.net/promos/std/spc_trans.gif" height="30" width="20" border="0" style="display:block;border-width:0" class="CToWUd">
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
               <tbody>
                  <tr>
                     <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">
                        <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                           <table bgcolor="#F5F7F8" align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;margin:0 auto;width:100%;max-width:600px">
                              <tbody>
                                 <tr>
                                    <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                       <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#f5f7f8;width:100%;text-align:left">
                                                   <p style="margin-top:0px;line-height:0px;margin-bottom:0px;font-size:4px">&nbsp;</p>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </td>
                  </tr>
               </tbody>
            </table>
         </center>
      </div>
   </body>
</html>';


sendEmail($subject, $to, $emailContent);

$stmt = $dbCon->prepare("INSERT INTO user_profiles (user_logins_id , created_on , modified_on, phone_number ) VALUES (?, now(), now(), ?)");
$stmt->bind_param("is", $id, $data['MobileNumber']);  
				$stmt->execute();
				$org['user_id']=$id;
				$org['email']=$data['Email'];
				$org['result']=1;
				$stmt->close();
				$dbCon->close();
				return $org;
				
				} 
				else 
				{
				$org['user_id']=0;
				$org['email']=$data['Email'];
				$org['result']=0;	
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			}
			else 
			{
				$org['user_id']=$myrow['id'];
				$org['email']=$data['Email'];
				$org['result']=2;
				$stmt->close();
				$dbCon->close();
				return $org;
			}	
		}

	function saveCardDetails($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("insert into user_cards(`user_login_id`,`created_on`,`card_number`,card_cvv,exp_month,exp_year,name_on_card,card_type) values(?, now(), ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("isisiss", $data['UserId'],$data['CardNumber'],$data['Cvv'],$data['ExpirationMonth'],$data['ExpirationYear'],htmlentities($data['CardHolderName'],ENT_NOQUOTES, 'UTF-8'),$data['card_type']);
			if($stmt->execute())
			{
			$stmt = $dbCon->prepare("select is_id_active,invoice_address_required,delivery_address_required from user_profiles where user_logins_id = ?");
				
						/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			
			$stmt = $dbCon->prepare("update user_certificates set pay_required=1,qloudid_pay_status=1 where certificate_key=?");
			$stmt->bind_param("s", $data['certi']);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select count(id) as num from user_address where user_id = ?");
				
						/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAdd    = $result->fetch_assoc();	
			
			if($rowId['delivery_address_required']==0 && $rowAdd['num']==0)
			{
			$stmt->close();
			$dbCon->close();
			return 1;	
			}
			else 
			{
			$stmt = $dbCon->prepare("update user_certificates set qloudid_pay_status=2 where certificate_key=?");
			$stmt->bind_param("s", $data['certi']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("select count(id) as num from user_identification where user_id = ?");
				
						/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			$stmt->close();
			$dbCon->close();
			return 3;
			}
			else
			{
				
			$stmt = $dbCon->prepare("select count(id) as num from user_identification where user_id = ? and is_completed=1");
				
						/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			$stmt = $dbCon->prepare("update user_certificates set checkin_required=1,qloudid_pay_status=3 where certificate_key=?");
			$stmt->bind_param("s", $data['certi']);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 4;
			}
			else
			{
			$stmt = $dbCon->prepare("update user_certificates set checkin_required=1,qloudid_pay_status=4 where user_id=?");
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 5;	
			}
				
			}
			}
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return 0;	
			}
		}
	
	
	function listCardDetails($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select id,name_on_card,card_number from  user_cards where `user_login_id`=?");
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$row['name_on_card']=html_entity_decode($row['name_on_card'],ENT_NOQUOTES, 'UTF-8');
				$row['card_number']='**** **** **** '.substr($row['card_number'],-4);
				array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close(); 
			return $org;
		}
		
		function lawersInfo()
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select employee_id,languages_used_by_staff,company_name,concat_ws(' ',first_name,last_name) as name from law_firm_resources left join employees on law_firm_resources.employee_id=employees.id left join companies on companies.id=employees.company_id where employee_id in (select id from employees where is_lawer=1 and company_id =? ) and type_of_lawer=?");
			$stmt->bind_param("ii", $_POST['location_detail'],$_POST['type_of_lawer']);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			$org=array();
			while($row = $result->fetch_assoc())
			{
			$practice_area=explode(',',$row['languages_used_by_staff']);
				if (!(in_array($_POST['languages_known'], $practice_area)))
				{
				continue;
				}
			 array_push($org,$row);
		}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function languagesKnown()
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select id,lang_eng from world_languages");
			$stmt->execute();
			$result = $stmt->get_result();
			$org = array();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
			}
			
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function lawCompanyDetails()
		{ 
		
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select company_id,visiting_address from  property_location left join companies on companies.id=property_location.company_id where company_id in (select company_id from company_lawfirm_account_request where is_approved=1) and companies.country_id=67");
			 
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
	
	function companyAddressDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 
			
			$stmt = $dbCon->prepare("select company_name as name_on_house,property_location.id,street_name_v as address, city_v as city, postal_code_v as zipcode, d_port_number as port_number,street_name_i as invoice_address, city_i as invoice_city, postal_code_i as invoice_zipcode,i_port_number as invoice_port_number,is_invoice_same as is_invoice_same  from  property_location left join companies on companies.id=property_location.company_id where property_location.id =?");
			$stmt->bind_param("i", $data['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			foreach($row as $string)
			{
			$string=html_entity_decode($string,ENT_NOQUOTES, 'UTF-8');
			}
			$stmt->close();
				$dbCon->close();
			return $row;
		}
	
	
	
	function addressDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from  user_address where `id`=?");
			$stmt->bind_param("i", $data['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			$row['address']=html_entity_decode($row['address'],ENT_NOQUOTES, 'UTF-8');
			$row['city']=html_entity_decode($row['city'],ENT_NOQUOTES, 'UTF-8');
			$row['invoice_address']=html_entity_decode($row['invoice_address'],ENT_NOQUOTES, 'UTF-8');
			$row['invoice_city']=html_entity_decode($row['invoice_city'],ENT_NOQUOTES, 'UTF-8');
			$stmt->close();
				$dbCon->close(); 
			return $row;
		}
		
		function getBookingDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt('decrypt',$data['id']);
			$d=date('Y-m-d');
			
			$stmt = $dbCon->prepare("select room_type_id,total_days,price,hotel_property_type from hotel_checkout_detail where id=? and is_paid=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowPrice = $result->fetch_assoc();
		 
			if($rowPrice['hotel_property_type']==1)
			{
			$stmt = $dbCon->prepare("select longitude,latitude,hotel_name,property_location.visiting_address,company_hotel_room_type_detail.id,room_type_name,room_price,hotel_room_type.room_type from company_hotel_room_type_detail left join hotel_room_type on hotel_room_type.id=company_hotel_room_type_detail.room_type left join hotel_basic_information on company_hotel_room_type_detail.location_id=hotel_basic_information.property_id left join property_location on property_location.id=hotel_basic_information.property_id where company_hotel_room_type_detail.id=?");	
			}				
			else
			{
				$stmt = $dbCon->prepare("select longitude,latitude,property_nickname as hotel_name,address as visiting_address,id,property_nickname as room_type_name  from user_address where id=?");
			}
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $rowPrice['room_type_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$row['room_price']=$rowPrice['price'];
			$row['room_type']=1;
			
			$stmt->close();
			$dbCon->close();
			 
			$row['price']=$rowPrice['price']*$rowPrice['total_days'];
			
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		function verifyCheckinDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt('decrypt',$data['id']);
			if($id==0)
			{
			$stmt = $dbCon->prepare("select user_id from user_certificates where certificate_key=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $data['certi']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			}
			else
			{
			$stmt = $dbCon->prepare("select user_id from hotel_checkout_detail where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;	
			}
			
		}
		
		
		function getPurchaseDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$ip=$this->encrypt_decrypt('decrypt',$data['ip']);
			$d=date('Y-m-d');
			  
			$stmt = $dbCon->prepare("select * from eshop_checkout_detail where ip_address=? and created_on=?");
			$stmt->bind_param("ss", $ip,$d);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select sum(total_price) as sum  from eshop_checkout_products_detail where eshop_checkout_id=?  and is_paid=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowPrice = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select free_text,company_name from business_dashboard_images left join companies on companies.id=business_dashboard_images.business_id where business_id=? and business_type=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$org=array();
			$stmt->close();
			$dbCon->close();
			 
			$org['price']=$rowPrice['sum'];
			if($row['free_text']==null || $row['free_text']=='')
			{
			$org['company_name']=html_entity_decode($row['company_name'],ENT_NOQUOTES, 'UTF-8');	
			}
			else
			{
				$org['company_name']=html_entity_decode($row['free_text'],ENT_NOQUOTES, 'UTF-8');
			}
		 $stmt->close();
				$dbCon->close();
			return $org;
		}
		
		function profileDetail($data)
		{
			
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select id,company_name,company_email from companies where id in (select company_id from user_company_profile where user_login_id=? and company_permission=1) order by company_name desc limit 0,10");
				/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$row['company_name']=html_entity_decode($row['company_name'],ENT_NOQUOTES, 'UTF-8');
				array_push($org,$row);
			}
			 
				$stmt->close();
				$dbCon->close();
				return $org;	
		 
			
		}
	
		
		
		function invoiceAddresses($data)
		{
		$dbCon = AppModel::createConnection();	
		 
		$stmt = $dbCon->prepare("select company_profiles.company_id,country_name,company_name,company_profiles.id,si_address,si_city,si_zip,si_country,i_port_number from company_profiles left join companies on companies.id=company_profiles.company_id left join phone_country_code on phone_country_code.id=companies.country_id where company_id in (select company_id from user_company_profile where user_login_id=? and company_permission=1) order by company_name desc limit 0,10");
		/* bind parameters for markers */
		$stmt->bind_param("i", $data['user_id']);
		$stmt->execute();
		$result = $stmt->get_result();
		$org=array();
		$j=0;
		while($row = $result->fetch_assoc())
		{
			$org[$j]['is_user']=0;
			$org[$j]['company_id']=$row['company_id'];
			$org[$j]['index_id']='0_'.$row['id'];
			$org[$j]['id']=$row['id'];
			$org[$j]['name_on_house']=html_entity_decode($row['company_name'],ENT_NOQUOTES, 'UTF-8');
			$org[$j]['invoice_address']=html_entity_decode($row['si_address'],ENT_NOQUOTES, 'UTF-8');
			$org[$j]['invoice_city']=html_entity_decode($row['si_city'],ENT_NOQUOTES, 'UTF-8');
			$org[$j]['invoice_zip']=html_entity_decode($row['si_zip'],ENT_NOQUOTES, 'UTF-8');
			$org[$j]['invoice_country']=html_entity_decode($row['country_name'],ENT_NOQUOTES, 'UTF-8');
			$org[$j]['invoice_port_number']=html_entity_decode($row['i_port_number'],ENT_NOQUOTES, 'UTF-8');
		$j++;	 
		}
	 
		$stmt = $dbCon->prepare("select concat_ws(' ',user_logins.first_name,user_logins.last_name) as name,country_name,user_address.id,invoice_address,invoice_city,invoice_zipcode,invoice_port_number from  user_address left join user_logins on user_logins.id=user_address.user_id left join phone_country_code on phone_country_code.id=user_logins.country_of_residence where `user_id`=? and is_personal_address=1");
		$stmt->bind_param("i", $data['user_id']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
			$org[$j]['is_user']=1;
			$org[$j]['company_id']=0;
			$org[$j]['index_id']='1_'.$row['id'];
			$org[$j]['id']=$row['id'];
			$org[$j]['name_on_house']=html_entity_decode($row['name'],ENT_NOQUOTES, 'UTF-8');
			$org[$j]['invoice_address']=html_entity_decode($row['invoice_address'],ENT_NOQUOTES, 'UTF-8');
			$org[$j]['invoice_city']=html_entity_decode($row['invoice_city'],ENT_NOQUOTES, 'UTF-8');
			$org[$j]['invoice_zip']=html_entity_decode($row['invoice_zipcode'],ENT_NOQUOTES, 'UTF-8');
			$org[$j]['invoice_country']=html_entity_decode($row['country_name'],ENT_NOQUOTES, 'UTF-8');
			$org[$j]['invoice_port_number']=html_entity_decode($row['invoice_port_number'],ENT_NOQUOTES, 'UTF-8'); 
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		function deliveryAddressDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			if($data['user_address']==1)
			{
			$stmt = $dbCon->prepare("select entry_code,country_name,user_address.id,user_address.address,user_address.city,user_address.zipcode,user_address.port_number,user_address.name_on_house from  user_address left join user_logins on user_logins.id=user_address.user_id left join phone_country_code on phone_country_code.id=user_logins.country_of_residence where user_address.id=?");
			$stmt->bind_param("i", $data['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			$row['address']=html_entity_decode($row['address'],ENT_NOQUOTES, 'UTF-8');
			$row['city']=html_entity_decode($row['city'],ENT_NOQUOTES, 'UTF-8');
			$row['zipcode']=html_entity_decode($row['zipcode'],ENT_NOQUOTES, 'UTF-8');
			$row['port_number']=html_entity_decode($row['port_number'],ENT_NOQUOTES, 'UTF-8');
			$row['name_on_house']=html_entity_decode($row['name_on_house'],ENT_NOQUOTES, 'UTF-8');
			$row['country_name']=html_entity_decode($row['country_name'],ENT_NOQUOTES, 'UTF-8');
			}
			else
			{
			$stmt = $dbCon->prepare("select country_name,company_name,property_location.id,street_name_v, city_v, postal_code_v, d_port_number from  property_location left join companies on companies.id=property_location.company_id left join phone_country_code on phone_country_code.id=companies.country_id where property_location.id =?");
			$stmt->bind_param("i",$data['id']);
			$stmt->execute();
			$result = $stmt->get_result();	
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			$row['address']=html_entity_decode($row['street_name_v'],ENT_NOQUOTES, 'UTF-8');
			$row['city']=html_entity_decode($row['city_v'],ENT_NOQUOTES, 'UTF-8');
			$row['zipcode']=html_entity_decode($row['postal_code_v'],ENT_NOQUOTES, 'UTF-8');
			$row['port_number']=html_entity_decode($row['d_port_number'],ENT_NOQUOTES, 'UTF-8');
			$row['name_on_house']=html_entity_decode($row['company_name'],ENT_NOQUOTES, 'UTF-8');
			$row['country_name']=html_entity_decode($row['country_name'],ENT_NOQUOTES, 'UTF-8');
			$row['entry_code']='';
			}
			return $row;
		}
		
	
	function listAddresses($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$org=array();
			$j=0;
			if($data['user_address']==1)
			{
			$stmt = $dbCon->prepare("select id,address,city,zipcode,port_number,name_on_house from  user_address where `user_id`=?");
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
				$org[$j]['id']=$row['id'];
				$org[$j]['user_address']=1;
				$org[$j]['heading_address']=html_entity_decode($row['name_on_house'],ENT_NOQUOTES, 'UTF-8').','.html_entity_decode($row['address'],ENT_NOQUOTES, 'UTF-8').' '.$row['port_number']; 
				$org[$j]['subheading_address']=html_entity_decode($row['city'],ENT_NOQUOTES, 'UTF-8').'  '.$row['zipcode']; 
				$j++;
			}
				
			}
			else
			{
			$stmt = $dbCon->prepare("select company_name,property_location.id,street_name_v, city_v, postal_code_v, d_port_number from  property_location left join companies on companies.id=property_location.company_id where property_location.id in (select location_id from employee_location where employee_id in (select id from employees where user_login_id=? and company_id in (select company_id from user_company_profile where user_login_id=? and company_permission=1))) limit 0,10");
			$stmt->bind_param("ii", $data['UserId'],$data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			while($row = $result->fetch_assoc())
			{
				$org[$j]['id']=$row['id'];
				$org[$j]['user_address']=0;
				$org[$j]['heading_address']=html_entity_decode($row['company_name'],ENT_NOQUOTES, 'UTF-8').','.html_entity_decode($row['street_name_v'],ENT_NOQUOTES, 'UTF-8').'-'.$row['d_port_number']; 
				$org[$j]['subheading_address']=html_entity_decode($row['city_v'],ENT_NOQUOTES, 'UTF-8').' - '.$row['postal_code_v']; 
				$j++;
			}	
			}
			
			
			 
			 
			return $org;
		}
		
		function listDeliveryAddresses($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$org=array();
			$org['user_address']=array();
			$org['company_address']=array();
			$j=0;
			$stmt = $dbCon->prepare("select country_name from  phone_country_code where id=(select country_of_residence from user_logins where id=?)");
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCountry = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select id,address,city,zipcode,port_number,name_on_house from  user_address where `user_id`=?");
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
				$org['user_address'][$j]['id']=$row['id'];
				$org['user_address'][$j]['user_address']=1;
				$org['user_address'][$j]['name_on_house']=html_entity_decode($row['name_on_house'],ENT_NOQUOTES, 'UTF-8');
				$org['user_address'][$j]['heading_address']=html_entity_decode($row['address'],ENT_NOQUOTES, 'UTF-8').' '.$row['port_number']; 
				$org['user_address'][$j]['subheading_address']=html_entity_decode($row['city'],ENT_NOQUOTES, 'UTF-8').' '.$row['zipcode'].','.$rowCountry['country_name']; 
				$j++;
			}
				
			$j=0;
			$stmt = $dbCon->prepare("select country_name,company_name,property_location.id,street_name_v, city_v, postal_code_v, d_port_number from  property_location left join companies on companies.id=property_location.company_id left join phone_country_code on phone_country_code.id=companies.country_id where property_location.id in (select location_id from employee_location where employee_id in (select id from employees where user_login_id=? and company_id in (select company_id from user_company_profile where user_login_id=? and company_permission=1))) limit 0,10");
			$stmt->bind_param("ii", $data['UserId'],$data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			while($row = $result->fetch_assoc())
			{
				$org['company_address'][$j]['id']=$row['id'];
				$org['company_address'][$j]['user_address']=0;
				$org['company_address'][$j]['name_on_house']=html_entity_decode($row['company_name'],ENT_NOQUOTES, 'UTF-8');
				$org['company_address'][$j]['heading_address']=html_entity_decode($row['street_name_v'],ENT_NOQUOTES, 'UTF-8').' '.$row['d_port_number']; 
				$org['company_address'][$j]['subheading_address']=html_entity_decode($row['city_v'],ENT_NOQUOTES, 'UTF-8').' '.$row['postal_code_v'].','.$rowCountry['country_name']; 
				$j++;
			}	
			
			
			 
			 
			return $org;
		}
		
		
		
		
		function listUserDeliveryAddresses($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select id,address,city,zipcode,port_number,name_on_house from  user_address where `user_id`=?");
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org[$j]['id']=$row['id'];
				$org[$j]['user_address']=1;
				$org[$j]['heading_address']=html_entity_decode($row['name_on_house'],ENT_NOQUOTES, 'UTF-8').','.html_entity_decode($row['address'],ENT_NOQUOTES, 'UTF-8').'-'.$row['port_number']; 
				$org[$j]['subheading_address']=html_entity_decode($row['city'],ENT_NOQUOTES, 'UTF-8').' - '.$row['zipcode']; 
				$j++;
			}
			
			 
			 
			return $org;
		}
		
		
		function addAddress($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 
			if($data['IsInvoiceAddressSame']==true)
			{
			$data['IsInvoiceAddressSame']=1;
			}
			else
			{
			$data['IsInvoiceAddressSame']=0;	
			}
			
			if($data['IsNameSame']==true)
			{
			$data['IsNameSame']=1;
			}
			else
			{
			$data['IsNameSame']=0;	
			}
			$stmt = $dbCon->prepare("select count(id) as num from user_address where user_id = ?");
				
						/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			$stmt = $dbCon->prepare("update user_profiles set name_on_door=?, entry_code=?, full_address=?, port_number=?, address=?, city=?, zipcode=?,invoice_address=?,invoice_zipcode=?,invoice_city=?,invoice_port=?,is_invoice_same=?,is_name_on_house_same=?,is_id_active=1  where user_logins_id=?");
				/* bind parameters for markers */
			$stmt->bind_param("sssssssssssiii",$data['Name'],$data['EntryCode'], $data['DeliveryAddress'],$data['DeliveryPortNumber'], $data['DeliveryAddress'],$data['DeliveryCity'],$data['DeliveryZipCode'],$data['InvoiceAddress'],$data['InvoiceZipCode'],$data['InvoiceCity'],$data['InvoicePortNumber'],$data['IsInvoiceAddressSame'],$data['IsNameSame'],$data['UserId']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("insert into  user_address ( `user_id`, `address`  , `city`  , `zipcode` , `port_number` , `invoice_address`  , `invoice_city`  , `invoice_zipcode`  , `invoice_port_number`  , `is_name_same`  , `is_invoice_same`  , `name_on_house`   , `created_on`,entry_code ) values (? , ?, ?, ?, ? , ?, ?, ?, ? , ?, ?, ?, now(), ?)");
				/* bind parameters for markers */
			$stmt->bind_param("issssssssiiss",$data['UserId'],$data['DeliveryAddress'],$data['DeliveryCity'],$data['DeliveryZipCode'],$data['DeliveryPortNumber'],$data['InvoiceAddress'],$data['InvoiceCity'],$data['InvoiceZipCode'],$data['InvoicePortNumber'],$data['IsInvoiceAddressSame'],$data['IsNameSame'],$data['Name'],$data['EntryCode']);
			$stmt->execute();
			$id=$stmt->insert_id;
			}
			else
			{
				$st=0;
			$stmt = $dbCon->prepare("insert into  user_address ( `user_id`, `address`  , `city`  , `zipcode` , `port_number` , `invoice_address`  , `invoice_city`  , `invoice_zipcode`  , `invoice_port_number`  , `is_name_same`  , `is_invoice_same`  , `name_on_house`   , `created_on`,entry_code, is_personal_address ) values (? , ?, ?, ?, ? , ?, ?, ?, ? , ?, ?, ?, now(), ?, ?)");
				/* bind parameters for markers */
			$stmt->bind_param("issssssssiissi",$data['UserId'],$data['DeliveryAddress'],$data['DeliveryCity'], $data['DeliveryZipCode'],$data['DeliveryPortNumber'],$data['InvoiceAddress'],$data['InvoiceCity'],$data['InvoiceZipCode'],$data['InvoicePortNumber'],$data['IsInvoiceAddressSame'],$data['IsNameSame'],$data['Name'],$data['EntryCode'],$st);
			$stmt->execute();
			$id=$stmt->insert_id;	
			}
			
			$stmt = $dbCon->prepare("update user_certificates set qloudid_pay_status=2 where certificate_key=?");
			$stmt->bind_param("s", $data['CertificateKey']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select count(id) as num from user_identification where user_id = ?");
				
						/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			$stmt->close();
			$dbCon->close();
			return 2;
			}
			else
			{
				
			$stmt = $dbCon->prepare("select count(id) as num from user_identification where user_id = ? and is_completed=1");
				
						/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			$stmt = $dbCon->prepare("update user_certificates set checkin_required=1,qloudid_pay_status=3 where certificate_key=?");
			$stmt->bind_param("s", $data['certi']);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 3;
			}
			else
			{
			$stmt = $dbCon->prepare("update user_certificates set checkin_required=1,qloudid_pay_status=4 where user_id=?");
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;	
			}
				
			}
			
			 
		}
	
	function addNewAddress($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 
			if($data['IsInvoiceAddressSame']==true)
			{
			$data['IsInvoiceAddressSame']=1;
			}
			else
			{
			$data['IsInvoiceAddressSame']=0;	
			}
			
			if($data['IsNameSame']==true)
			{
			$data['IsNameSame']=1;
			}
			else
			{
			$data['IsNameSame']=0;	
			}
			$stmt = $dbCon->prepare("select count(id) as num from user_address where user_id = ?");
				
						/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			$stmt = $dbCon->prepare("update user_profiles set name_on_door=?, entry_code=?, full_address=?, port_number=?, address=?, city=?, zipcode=?,invoice_address=?,invoice_zipcode=?,invoice_city=?,invoice_port=?,is_invoice_same=?,is_name_on_house_same=?,is_id_active=1  where user_logins_id=?");
				/* bind parameters for markers */
			$stmt->bind_param("sssssssssssiii",$data['Name'],$data['EntryCode'], htmlentities($data['DeliveryAddress'],ENT_NOQUOTES, 'UTF-8'),$data['DeliveryPortNumber'], htmlentities($data['DeliveryAddress'],ENT_NOQUOTES, 'UTF-8'),htmlentities($data['DeliveryCity'],ENT_NOQUOTES, 'UTF-8'),htmlentities($data['DeliveryZipCode'],ENT_NOQUOTES, 'UTF-8'),htmlentities($data['InvoiceAddress'],ENT_NOQUOTES, 'UTF-8'),$data['InvoiceZipCode'],htmlentities($data['InvoiceCity'],ENT_NOQUOTES, 'UTF-8'),$data['InvoicePortNumber'],$data['IsInvoiceAddressSame'],$data['IsNameSame'],$data['UserId']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("insert into  user_address ( `user_id`, `address`  , `city`  , `zipcode` , `port_number` , `invoice_address`  , `invoice_city`  , `invoice_zipcode`  , `invoice_port_number`  , `is_name_same`  , `is_invoice_same`  , `name_on_house`   , `created_on`,entry_code ) values (? , ?, ?, ?, ? , ?, ?, ?, ? , ?, ?, ?, now(), ?)");
				/* bind parameters for markers */
			$stmt->bind_param("issssssssiiss",$data['UserId'],htmlentities($data['DeliveryAddress'],ENT_NOQUOTES, 'UTF-8'),$data['DeliveryCity'], htmlentities($data['DeliveryZipCode'],ENT_NOQUOTES, 'UTF-8'),htmlentities($data['DeliveryPortNumber'],ENT_NOQUOTES, 'UTF-8'),htmlentities($data['InvoiceAddress'],ENT_NOQUOTES, 'UTF-8'),$data['InvoiceCity'],htmlentities($data['InvoiceZipCode'],ENT_NOQUOTES, 'UTF-8'),$data['InvoicePortNumber'],$data['IsInvoiceAddressSame'],$data['IsNameSame'],$data['Name'],$data['EntryCode']);
			$stmt->execute();
			$id=$stmt->insert_id;
			}
			else
			{
				$st=0;
			$stmt = $dbCon->prepare("insert into  user_address ( `user_id`, `address`  , `city`  , `zipcode` , `port_number` , `invoice_address`  , `invoice_city`  , `invoice_zipcode`  , `invoice_port_number`  , `is_name_same`  , `is_invoice_same`  , `name_on_house`   , `created_on`,entry_code, is_personal_address ) values (? , ?, ?, ?, ? , ?, ?, ?, ? , ?, ?, ?, now(), ?, ?)");
				/* bind parameters for markers */
			$stmt->bind_param("issssssssiissi",$data['UserId'],htmlentities($data['DeliveryAddress'],ENT_NOQUOTES, 'UTF-8'),$data['DeliveryCity'], htmlentities($data['DeliveryZipCode'],ENT_NOQUOTES, 'UTF-8'),htmlentities($data['DeliveryPortNumber'],ENT_NOQUOTES, 'UTF-8'),htmlentities($data['InvoiceAddress'],ENT_NOQUOTES, 'UTF-8'),$data['InvoiceCity'],htmlentities($data['InvoiceZipCode'],ENT_NOQUOTES, 'UTF-8'),$data['InvoicePortNumber'],$data['IsInvoiceAddressSame'],$data['IsNameSame'],$data['Name'],$data['EntryCode'],$st);
			$stmt->execute();
			$id=$stmt->insert_id;	
			}
			if(isset($data['CertificateKey']))
			{
			$stmt = $dbCon->prepare("update  user_certificates set `delivery_address_id`=?  , `delivered_at`=1  where certificate_key=?");
				/* bind parameters for markers */
			$stmt->bind_param("is",$id,$data['CertificateKey']);
			$stmt->execute();
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			 
		}
	
	function updateUserAddress($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 
			 
			
			 
			$stmt = $dbCon->prepare("select is_personal_address from user_address where id = ?");
				
						/* bind parameters for markers */
			$stmt->bind_param("i", $data['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['is_personal_address']==1)
			{
			$stmt = $dbCon->prepare("update user_profiles set name_on_door=?, entry_code=?, full_address=?, port_number=?, address=?, city=?, zipcode=?,invoice_address=?,invoice_zipcode=?,invoice_city=?,invoice_port=?,is_invoice_same=?,is_name_on_house_same=?,is_id_active=1  where user_logins_id=?");
				/* bind parameters for markers */
			$stmt->bind_param("sssssssssssiii",$data['name_on_house'],$data['entry_code'], htmlentities($data['address'],ENT_NOQUOTES, 'UTF-8'),$data['port_number'], htmlentities($data['address'],ENT_NOQUOTES, 'UTF-8'),htmlentities($data['city'],ENT_NOQUOTES, 'UTF-8'),htmlentities($data['zipcode'],ENT_NOQUOTES, 'UTF-8'),htmlentities($data['invoice_address'],ENT_NOQUOTES, 'UTF-8'),$data['invoice_zipcode'],htmlentities($data['invoice_city'],ENT_NOQUOTES, 'UTF-8'),$data['invoice_port_number'],$data['is_invoice_same'],$data['is_name_same'],$data['user_id']);
			$stmt->execute();
			}
			
			$stmt = $dbCon->prepare("update  user_address set `address`=?  , `city`=? , `zipcode`=? , `port_number`=? , `invoice_address`=?  , `invoice_city` =? , `invoice_zipcode` =? , `invoice_port_number`=?  , `is_name_same`=?  , `is_invoice_same`=?  , `name_on_house` =?  , entry_code =? where id=?");
				/* bind parameters for markers */
			$stmt->bind_param("ssssssssiissi",htmlentities($data['address'],ENT_NOQUOTES, 'UTF-8'),$data['city'], htmlentities($data['zipcode'],ENT_NOQUOTES, 'UTF-8'),htmlentities($data['port_number'],ENT_NOQUOTES, 'UTF-8'),htmlentities($data['invoice_address'],ENT_NOQUOTES, 'UTF-8'),$data['invoice_city'],htmlentities($data['invoice_zipcode'],ENT_NOQUOTES, 'UTF-8'),$data['invoice_port_number'],$data['is_invoice_same'],$data['is_name_same'],$data['name_on_house'],$data['entry_code'],$data['id']);
			$stmt->execute();
			$stmt = $dbCon->prepare("update  user_certificates set `delivery_address_id`=?  , `delivered_at`=1  where certificate_key=?");
				/* bind parameters for markers */
			$stmt->bind_param("is",$data['id'],$data['CertificateKey']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			 
		}
	
	
	function updateCompanyAddress($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("update  user_certificates set `delivery_address_id`=?  , `delivered_at`=?  where certificate_key=?");
				/* bind parameters for markers */
			$stmt->bind_param("iis",$data['id'],$data['delivered_at'],$data['CertificateKey']);
			$stmt->execute();
			$dbCon->close();
			return 1;
			 
		}
	
	
	
	function restoreAccount($data) {
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("SELECT id FROM user_logins WHERE email=?");
			
			/* bind parameters for markers*/
			$stmt->bind_param("s", $data['Email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$myrow  = $result->fetch_assoc();
			 
			if(!empty($myrow))
			{
			 
				$num=(mt_rand(111111,999999));
				$stmt = $dbCon->prepare("update user_logins set otp_verification=? where id=?");
				
				$stmt->bind_param("si", $num,$myrow['id']);
				$stmt->execute();
				
				$to      = $data['Email'];
				$subject = "Qloud ID - Verify your email";
				$emailContent='<html>
   <head></head>
   <body>
      <div style="margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding:0">
         <center style="width:100%;table-layout:fixed">
            <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8" style="text-align:center">
               <tbody>
                  <tr>
                     <td>
                        <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td>
                                    <div style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:0px;padding-right:0px">
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#f5f7f8;Margin:0 auto;width:100%" bgcolor="#F5F7F8">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0" bgcolor="#F5F7F8">
                                                   <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#f5f7f8" bgcolor="#F5F7F8">
                                                      <tbody>
                                                         <tr>
                                                            <td style="padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px;background-color:#f5f7f8;color:#f5f7f8;width:100%;font-size:1px;line-height:1px;text-align:left;display:none!important">
                                                               <p style="text-align:left;line-height:6px;Margin-top:0px;Margin-bottom:0px">Dina domäner är inställda på att förnyas automatiskt. Öppna det här e-postmeddelandet för att säkerställa att allt fortfarande är uppdaterat. Och glöm inte att du får 20 % rabatt på nya produkter. &nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;</p>
                                                               <div style="display:none;max-height:0px;overflow:hidden">
                                                                  &nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;
                                                               </div>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:20px">
                                    <div style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:0px;padding-right:0px">
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td style="padding-bottom:20px">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px" bgcolor="#F5F7F8">
                                          <tbody>
                                             <tr>
                                                <td bgcolor="#F5F7F8" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   <table width="73%" style="border-spacing:0;font-family:Audiowide;color:#111111" bgcolor="#F5F7F8">
                                                      <tbody>
                                                         <tr>
                                                            <td style="padding-top:5px;padding-bottom:0;padding-right:0;padding-left:0px" align="left">
                                                               <p style="font-size:30px; font-weight:normal; Audiowide;">Qloudid</p>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                                <td width="100%" bgcolor="#F5F7F8" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111" bgcolor="#F5F7F8">
                                                      <tbody>
                                                         <tr>
                                                            <td style="padding-top:10px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">
                                                               <p style="Margin-top:0px;margin-bottom:0px;font-size:13px;line-height:16px"><strong><a href="tel:077%20588%2080%2023" style="text-decoration:none;color:#111111" target="_blank">Website: <u></u>www.qloudid.com<u></u></a></strong></p>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td style="padding-top:0px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">
                                                               <p style="Margin-top:5px;margin-bottom:0px;font-size:13px;line-height:16px">If you have any questions - <u></u>Contact us<u></u></p>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="background-color:#f5f7f8;padding-top:0;padding-right:0;padding-left:0;padding-bottom:0">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                                       <table bgcolor="#FFFFFF" width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="font-family:sans-serif;color:#111111">
                                          <tbody>
                                             <tr>
                                                <td bgcolor="#FFFFFF" align="left" style="padding-top:0px;padding-bottom:0;padding-right:0px;padding-left:0px;text-align:left;background-color:#ffffff;font-weight:bold;font-size:32px;line-height:42px">
                                                   <div style="text-align: center; line-height: 22px; max-width: 600px;
                                                      float: left;
                                                      position: relative; ">
                                                      <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 red_ff2828_bg  brdb_new tall xs-nobrdb" style="max-width: 100%; background-color: #ff2828 !important;
                                                         width: 960px;
                                                         position: relative;
                                                         margin: 0 auto;
                                                         ">
                                                         <div style="height: 250px; width: auto; max-width: 100%; padding-top: 100px; padding-right: 30px;
                                                            padding-left: 30px; margin-right: auto;
                                                            margin-left: auto;  z-index: 5; max-width: 100%; width: auto;">
                                                            <div class="padding-bottom: 40px; text-align: center; font-size: 45px;"><img src="http://www.qloudid.com/html/usercontent/images/doublecheck.png" width="45px;" height="45px;"></div>
                                                            <div class="padb0 xxs-padb0 ">
                                                               <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:white;">Success</h1>
                                                            </div>
                                                            <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:white; font-size: 20px;">Please verify your email using the one time password : '.$num.'</div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                                       <table bgcolor="#FFFFFF" align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;margin:0 auto;width:100%;max-width:600px">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">
                                                      <tbody>
                                                         <tr>
                                                            <td style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:left">
                                                               <p style="margin-top:0px;line-height:0px;margin-bottom:0px;font-size:4px">&nbsp;</p>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:40px;padding-right:20px">
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">
                                          <tbody>
                                             <tr>
                                                <td width="20" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   <img src="https://ci3.googleusercontent.com/proxy/gvkyMPCroXxkwzdJ2Pg_KqgcjVeVgpVE1dRo8rYCiczuJe5UfJllf1ZtOFiYZsB4FzBoGeU7Xdso4PWQyUOj4qIrHsViEiUFA_KBQA=s0-d-e1-ft#http://imagesak.secureserver.net/promos/std/spc_trans.gif" height="30" width="20" border="0" style="display:block;border-width:0" class="CToWUd">
                                                </td>
                                                <td style="padding-top:0px;padding-bottom:0px;padding-right:0;padding-left:0;text-align:center;font-size:0;background-color:#ffffff">
                                                   <div style="width:100%;max-width:560px;display:inline-block;vertical-align:top">
                                                      <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">
                                                         <tbody>
                                                            <tr>
                                                               <td style="padding-top:0px;padding-bottom:0px;padding-left:20px;padding-right:20px;background-color:#ffffff">
                                                                  <table style="border-spacing:0;font-family:sans-serif;color:#111111;width:100%;font-size:14px;text-align:left;background-color:#ffffff;border-top-color:#e8eaeb;border-top-style:solid;border-top-width:1px">
                                                                     <tbody>
                                                                        <tr>
                                                                           <td style="padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:10px;background-color:#ffffff;width:100%;text-align:left">
                                                                              <table style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;table-layout:fixed">
                                                                                 <tbody>
                                                                                    <tr>
                                                                                       <td style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;background-color:#ffffff;width:100%;text-align:center">
                                                                                          <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px; fsz14px;">This is sent because you have restored your account using Qloud ID App</p>
                                                                                       </td>
                                                                                    </tr>
                                                                                 </tbody>
                                                                              </table>
                                                                           </td>
                                                                        </tr>
                                                                     </tbody>
                                                                  </table>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </div>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                                 <td width="20" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                    <img src="https://ci3.googleusercontent.com/proxy/gvkyMPCroXxkwzdJ2Pg_KqgcjVeVgpVE1dRo8rYCiczuJe5UfJllf1ZtOFiYZsB4FzBoGeU7Xdso4PWQyUOj4qIrHsViEiUFA_KBQA=s0-d-e1-ft#http://imagesak.secureserver.net/promos/std/spc_trans.gif" height="30" width="20" border="0" style="display:block;border-width:0" class="CToWUd">
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
               <tbody>
                  <tr>
                     <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">
                        <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                           <table bgcolor="#F5F7F8" align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;margin:0 auto;width:100%;max-width:600px">
                              <tbody>
                                 <tr>
                                    <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                       <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#f5f7f8;width:100%;text-align:left">
                                                   <p style="margin-top:0px;line-height:0px;margin-bottom:0px;font-size:4px">&nbsp;</p>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </td>
                  </tr>
               </tbody>
            </table>
         </center>
      </div>
   </body>
</html>';


sendEmail($subject, $to, $emailContent);

 
				$org['user_id']=$myrow['id'];
				$org['result']=1;
				$stmt->close();
				$dbCon->close();
				return $org;
				
				 
			}
			else 
			{
				$org['user_id']=0;
				$org['result']=0;
				$stmt->close();
				$dbCon->close();
				return $org;
			}	
		}

	function verifyRestoreOtpPinWithMobileOld($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 
		 $stmt = $dbCon->prepare("select country_code,otp_verification,grading_status,phone_number,first_name,last_name  from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id left join phone_country_code on phone_country_code.id=user_logins.country_of_residence where user_logins.id=?");
			/* bind parameters for markers */
		$stmt->bind_param("i", $data['UserId']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		 $arr=array();
		 $arr['phone_number']=$row['phone_number'];
		 $arr['first_name']=$row['first_name'];
		 $arr['last_name']=$row['last_name'];
		  
        if($row['otp_verification']==$data['OtpPin'])
		{
			$stmt = $dbCon->prepare("update user_certificates set login_started_for='',login_status=0 where user_id=?");
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			
			$arr['country_code']=$row['country_code'];
			if($row['phone_number']==null)
			{
			$arr['result']=1;	
			}
			else
			{
			if($row['grading_status']==0)
			{
			 
			$num=(mt_rand(111111,999999));
			$stmt = $dbCon->prepare("update user_logins set otp_verification=? where id=?");
			$stmt->bind_param("si", $num,$data['UserId']);
			$stmt->execute();	
			$to            = '+'.trim($row['country_code']).''.trim($row['phone_number']);
			$subject       = "One time password!";
			$emailContent ="Your one time password to verify your mobile is : ".$num;
			 
			$res=json_decode(sendSms($subject, $to, $emailContent),true);	
			
			 	
			$arr['result']=6;		
			}
			 
			else
			{
			$stmt = $dbCon->prepare("select count(id) as num from user_cards where user_login_id = ?");
				
						/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			 $arr['result']=3;	
			}
			else
			{
			$stmt = $dbCon->prepare("select is_id_active,invoice_address_required,delivery_address_required from user_profiles where user_logins_id = ?");
				
						/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			
			$stmt = $dbCon->prepare("select count(id) as num from user_address where user_id = ?");
				
						/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAdd    = $result->fetch_assoc();	
			
			if($rowId['delivery_address_required']==0 && $rowAdd['num']==0)
			{
			 $arr['result']=4;	
			}
			else
			{
			$stmt = $dbCon->prepare("select count(id) as num from user_identification where user_id = ?");
				
						/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			 $arr['result']=2;
			}
			else
			{
				 $arr['result']=5;	
			}
			}
			}
			}
			}
			$stmt->close();
			$dbCon->close();
			return $arr;	
		}
		else
		{ 
			
			$arr['country_code']=$row['country_code'];
			$arr['result']=0;
			$stmt->close();
			$dbCon->close();
			return $arr;	
		}	
		
    }
	
	function verifyPhoneOtpPinWithIdOld($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 
		 $stmt = $dbCon->prepare("select country_code,otp_verification  from user_logins left join phone_country_code on phone_country_code.id=user_logins.country_of_residence where user_logins.id=?");
			/* bind parameters for markers */
		$stmt->bind_param("i", $data['UserId']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		 $arr=array();
        if($row['otp_verification']==$data['OtpPin'])
		{
			$stmt = $dbCon->prepare("update user_logins set grading_status=1 where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select count(id) as num from user_cards where user_login_id = ?");
				
						/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			  $arr['identificator']=1;
			}
			else
			{
			$stmt = $dbCon->prepare("select is_id_active num from user_profiles where user_logins_id = ?");
				
						/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			  $arr['identificator']=2;
			}
			else
			{
			$stmt = $dbCon->prepare("select count(id) as num from user_identification where user_id = ?");
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			 $arr['identificator']=0;
			}
			
			else
			{
				$arr['identificator']=3;
			}
			 	
			}
			
		
		}
			$arr['country_code']=$row['country_code'];
			$arr['result']=1;
			$stmt->close();
			$dbCon->close();
			return $arr;	
		}
		else
		{ 
			$arr['identificator']=0;
			$arr['country_code']=$row['country_code'];
			$arr['result']=0;
			$stmt->close();
			$dbCon->close();
			return $arr;	
		}	
		
    }
	
	function verifyRestoreOtpPinWithMobile($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 
		 $stmt = $dbCon->prepare("select country_code,otp_verification,grading_status,phone_number,first_name,last_name  from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id left join phone_country_code on phone_country_code.id=user_logins.country_of_residence where user_logins.id=?");
			/* bind parameters for markers */
		$stmt->bind_param("i", $data['UserId']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		 $arr=array();
		 $arr['phone_number']=$row['phone_number'];
		 $arr['first_name']=$row['first_name'];
		 $arr['last_name']=$row['last_name'];
		  
        if($row['otp_verification']==$data['OtpPin'])
		{
			$stmt = $dbCon->prepare("update user_certificates set login_started_for='',login_status=0 where user_id=?");
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			
			$arr['country_code']=$row['country_code'];
			if($row['phone_number']==null)
			{
			$arr['result']=1;	
			}
			else
			{
			if($row['grading_status']==0)
			{
			 
			$num=(mt_rand(111111,999999));
			$stmt = $dbCon->prepare("update user_logins set otp_verification=? where id=?");
			$stmt->bind_param("si", $num,$data['UserId']);
			$stmt->execute();	
			$to            = '+'.trim($row['country_code']).''.trim($row['phone_number']);
			$subject       = "One time password!";
			$emailContent ="Your one time password to verify your mobile is : ".$num;
			 
			$res=json_decode(sendSms($subject, $to, $emailContent),true);	
			
			 	
			$arr['result']=6;		
			}
			 
			else
			{
			 
				 $arr['result']=5;	
			 
			}
			}
			$stmt->close();
			$dbCon->close();
			return $arr;	
		}
		else
		{ 
			
			$arr['country_code']=$row['country_code'];
			$arr['result']=0;
			$stmt->close();
			$dbCon->close();
			return $arr;	
		}	
		
    }
	
	function verifyPhoneOtpPinWithId($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 
		 $stmt = $dbCon->prepare("select country_code,otp_verification  from user_logins left join phone_country_code on phone_country_code.id=user_logins.country_of_residence where user_logins.id=?");
			/* bind parameters for markers */
		$stmt->bind_param("i", $data['UserId']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		 $arr=array();
        if($row['otp_verification']==$data['OtpPin'])
		{
			$stmt = $dbCon->prepare("update user_logins set grading_status=1 where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$arr['identificator']=3;
		    $arr['country_code']=$row['country_code'];
			$arr['result']=1;
			$stmt->close();
			$dbCon->close();
			return $arr;	
		}
		else
		{ 
			$arr['identificator']=0;
			$arr['country_code']=$row['country_code'];
			$arr['result']=0;
			$stmt->close();
			$dbCon->close();
			return $arr;	
		}	
		
    }
	
	
function verifyRestoreOtpPinOld($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 
		 $stmt = $dbCon->prepare("select country_code,otp_verification,grading_status,phone_number  from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id left join phone_country_code on phone_country_code.id=user_logins.country_of_residence where user_logins.id=?");
			/* bind parameters for markers */
		$stmt->bind_param("i", $data['UserId']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		 $arr=array();
		 
		 
        if($row['otp_verification']==$data['OtpPin'])
		{
			
			$arr['country_code']=$row['country_code'];
			if($row['grading_status']==0)
			{
			$arr['result']=1;	
			}
			else
			{
			$stmt = $dbCon->prepare("select count(id) as num from user_identification where user_id = ?");
				
						/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			 $arr['result']=2;
			}
			else
			{
			 $arr['result']=3;	
			}
			}
			$stmt->close();
			$dbCon->close();
			return $arr;	
		}
		else
		{ 
			
			$arr['country_code']=$row['country_code'];
			$arr['result']=0;
			$stmt->close();
			$dbCon->close();
			return $arr;	
		}	
		
    }
	
	
	function verifyPhoneOtpPin($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 
		 $stmt = $dbCon->prepare("select country_code,otp_verification  from user_logins left join phone_country_code on phone_country_code.id=user_logins.country_of_residence where user_logins.id=?");
			/* bind parameters for markers */
		$stmt->bind_param("i", $data['UserId']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		 $arr=array();
        if($row['otp_verification']==$data['OtpPin'])
		{
			$stmt = $dbCon->prepare("update user_logins set grading_status=1 where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			
			/*$stmt = $dbCon->prepare("select count(id) as num from user_identification where user_id = ?");
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			 $arr['identificator']=0;
			}
			else
			{
			 $arr['identificator']=1;	
			}*/
			
			$arr['country_code']=$row['country_code'];
			$arr['result']=1;
			$stmt->close();
			$dbCon->close();
			return $arr;	
		}
		else
		{ 
			//$arr['identificator']=0;
			$arr['country_code']=$row['country_code'];
			$arr['result']=0;
			$stmt->close();
			$dbCon->close();
			return $arr;	
		}	
		
    }
	
	
	
	function createNewAccount($data) {
			$dbCon = AppModel::createConnection();
			 
			$a=explode('@', $data['Email']);
			$domain = array_pop($a);
			$random_hash = substr(md5(uniqid(rand(), true)), 16, 16); 
			$stmt = $dbCon->prepare("SELECT id FROM user_logins WHERE email=?");
			
			/* bind parameters for markers*/
			$stmt->bind_param("s", $data['Email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$myrow  = $result->fetch_assoc();
			
			if(empty($myrow))
			{
			$key = '56f98a45d581cb76cab4693fa48ae7f9'; 
			$request = 'http://check.block-disposable-email.com/easyapi/json/' . $key . '/' . $domain;
			
			$response = file_get_contents($request);
			
			$dea = json_decode($response);
			$rf=1;
			$st=0;
			$org=array();
			if ($dea->request_status == 'success')
				{
				$num=(mt_rand(111111,999999));
				$stmt = $dbCon->prepare("INSERT INTO user_logins (first_name,last_name,registered_from,get_started_wizard_status,email,  email_verification_code , created_on , modified_on, country_of_residence,otp_verification ) VALUES (?, ?, ?, ?,   ?, ?, now(), now(), ?, ?)");
				
				/*
					The argument may be one of four types:
					
					i - integer
					d - double
					s - string
					b - BLOB
				*/
				$st=0;
				$stmt->bind_param("ssiissis", $data['FirstName'], $data['LastName'],$rf,$st,$data['Email'], $random_hash, $data['CountryId'],$num);
				$stmt->execute();
				$id=$stmt->insert_id;
				$to      = $data['Email'];
				$subject = "Qloud ID - Verify your email";
				$emailContent='<html>
   <head></head>
   <body>
      <div style="margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding:0">
         <center style="width:100%;table-layout:fixed">
            <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8" style="text-align:center">
               <tbody>
                  <tr>
                     <td>
                        <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td>
                                    <div style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:0px;padding-right:0px">
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#f5f7f8;Margin:0 auto;width:100%" bgcolor="#F5F7F8">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0" bgcolor="#F5F7F8">
                                                   <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#f5f7f8" bgcolor="#F5F7F8">
                                                      <tbody>
                                                         <tr>
                                                            <td style="padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px;background-color:#f5f7f8;color:#f5f7f8;width:100%;font-size:1px;line-height:1px;text-align:left;display:none!important">
                                                               <p style="text-align:left;line-height:6px;Margin-top:0px;Margin-bottom:0px">Dina domäner är inställda på att förnyas automatiskt. Öppna det här e-postmeddelandet för att säkerställa att allt fortfarande är uppdaterat. Och glöm inte att du får 20 % rabatt på nya produkter. &nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;</p>
                                                               <div style="display:none;max-height:0px;overflow:hidden">
                                                                  &nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;
                                                               </div>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:20px">
                                    <div style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:0px;padding-right:0px">
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td style="padding-bottom:20px">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px" bgcolor="#F5F7F8">
                                          <tbody>
                                             <tr>
                                                <td bgcolor="#F5F7F8" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   <table width="73%" style="border-spacing:0;font-family:Audiowide;color:#111111" bgcolor="#F5F7F8">
                                                      <tbody>
                                                         <tr>
                                                            <td style="padding-top:5px;padding-bottom:0;padding-right:0;padding-left:0px" align="left">
                                                               <p style="font-size:30px; font-weight:normal; Audiowide;">Qloudid</p>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                                <td width="100%" bgcolor="#F5F7F8" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111" bgcolor="#F5F7F8">
                                                      <tbody>
                                                         <tr>
                                                            <td style="padding-top:10px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">
                                                               <p style="Margin-top:0px;margin-bottom:0px;font-size:13px;line-height:16px"><strong><a href="tel:077%20588%2080%2023" style="text-decoration:none;color:#111111" target="_blank">Website: <u></u>www.qloudid.com<u></u></a></strong></p>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td style="padding-top:0px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">
                                                               <p style="Margin-top:5px;margin-bottom:0px;font-size:13px;line-height:16px">If you have any questions - <u></u>Contact us<u></u></p>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="background-color:#f5f7f8;padding-top:0;padding-right:0;padding-left:0;padding-bottom:0">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                                       <table bgcolor="#FFFFFF" width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="font-family:sans-serif;color:#111111">
                                          <tbody>
                                             <tr>
                                                <td bgcolor="#FFFFFF" align="left" style="padding-top:0px;padding-bottom:0;padding-right:0px;padding-left:0px;text-align:left;background-color:#ffffff;font-weight:bold;font-size:32px;line-height:42px">
                                                   <div style="text-align: center; line-height: 22px; max-width: 600px;
                                                      float: left;
                                                      position: relative; ">
                                                      <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 red_ff2828_bg  brdb_new tall xs-nobrdb" style="max-width: 100%; background-color: #ff2828 !important;
                                                         width: 960px;
                                                         position: relative;
                                                         margin: 0 auto;
                                                         ">
                                                         <div style="height: 250px; width: auto; max-width: 100%; padding-top: 100px; padding-right: 30px;
                                                            padding-left: 30px; margin-right: auto;
                                                            margin-left: auto;  z-index: 5; max-width: 100%; width: auto;">
                                                            <div class="padding-bottom: 40px; text-align: center; font-size: 45px;"><img src="http://www.qloudid.com/html/usercontent/images/doublecheck.png" width="45px;" height="45px;"></div>
                                                            <div class="padb0 xxs-padb0 ">
                                                               <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:white;">Success</h1>
                                                            </div>
                                                            <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:white; font-size: 20px;">Please verify your email using the one time password : '.$num.'</div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                                       <table bgcolor="#FFFFFF" align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;margin:0 auto;width:100%;max-width:600px">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">
                                                      <tbody>
                                                         <tr>
                                                            <td style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:left">
                                                               <p style="margin-top:0px;line-height:0px;margin-bottom:0px;font-size:4px">&nbsp;</p>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:40px;padding-right:20px">
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">
                                          <tbody>
                                             <tr>
                                                <td width="20" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   <img src="https://ci3.googleusercontent.com/proxy/gvkyMPCroXxkwzdJ2Pg_KqgcjVeVgpVE1dRo8rYCiczuJe5UfJllf1ZtOFiYZsB4FzBoGeU7Xdso4PWQyUOj4qIrHsViEiUFA_KBQA=s0-d-e1-ft#http://imagesak.secureserver.net/promos/std/spc_trans.gif" height="30" width="20" border="0" style="display:block;border-width:0" class="CToWUd">
                                                </td>
                                                <td style="padding-top:0px;padding-bottom:0px;padding-right:0;padding-left:0;text-align:center;font-size:0;background-color:#ffffff">
                                                   <div style="width:100%;max-width:560px;display:inline-block;vertical-align:top">
                                                      <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">
                                                         <tbody>
                                                            <tr>
                                                               <td style="padding-top:0px;padding-bottom:0px;padding-left:20px;padding-right:20px;background-color:#ffffff">
                                                                  <table style="border-spacing:0;font-family:sans-serif;color:#111111;width:100%;font-size:14px;text-align:left;background-color:#ffffff;border-top-color:#e8eaeb;border-top-style:solid;border-top-width:1px">
                                                                     <tbody>
                                                                        <tr>
                                                                           <td style="padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:10px;background-color:#ffffff;width:100%;text-align:left">
                                                                              <table style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;table-layout:fixed">
                                                                                 <tbody>
                                                                                    <tr>
                                                                                       <td style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;background-color:#ffffff;width:100%;text-align:center">
                                                                                          <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px; fsz14px;">This is sent because you have created a new account using Qloud ID App</p>
                                                                                       </td>
                                                                                    </tr>
                                                                                 </tbody>
                                                                              </table>
                                                                           </td>
                                                                        </tr>
                                                                     </tbody>
                                                                  </table>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </div>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                                 <td width="20" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                    <img src="https://ci3.googleusercontent.com/proxy/gvkyMPCroXxkwzdJ2Pg_KqgcjVeVgpVE1dRo8rYCiczuJe5UfJllf1ZtOFiYZsB4FzBoGeU7Xdso4PWQyUOj4qIrHsViEiUFA_KBQA=s0-d-e1-ft#http://imagesak.secureserver.net/promos/std/spc_trans.gif" height="30" width="20" border="0" style="display:block;border-width:0" class="CToWUd">
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
               <tbody>
                  <tr>
                     <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">
                        <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                           <table bgcolor="#F5F7F8" align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;margin:0 auto;width:100%;max-width:600px">
                              <tbody>
                                 <tr>
                                    <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                       <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#f5f7f8;width:100%;text-align:left">
                                                   <p style="margin-top:0px;line-height:0px;margin-bottom:0px;font-size:4px">&nbsp;</p>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </td>
                  </tr>
               </tbody>
            </table>
         </center>
      </div>
   </body>
</html>';


sendEmail($subject, $to, $emailContent);

$stmt = $dbCon->prepare("INSERT INTO user_profiles (user_logins_id , created_on , modified_on ) VALUES (?, now(), now())");
$stmt->bind_param("i", $id);  
				$stmt->execute();
				$org['user_id']=$id;
				$org['email']=$data['Email'];
				$org['result']=1;
				$stmt->close();
				$dbCon->close();
				return $org;
				
				} 
				else 
				{
				$org['user_id']=0;
				$org['email']=$data['Email'];
				$org['result']=0;	
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			}
			else 
			{
				$org['user_id']=$myrow['id'];
				$org['email']=$data['Email'];
				$org['result']=2;
				$stmt->close();
				$dbCon->close();
				return $org;
			}	
		}

		
	function checkConnect($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 
		 $stmt = $dbCon->prepare("select id,created_on from user_certificates where certificate_key=? and is_connected=0 and is_valid=1");
			/* bind parameters for markers */
		$stmt->bind_param("s", $data['certi']);
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
	
	
	
	
	
	function verifyAdmin($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 
		 $stmt = $dbCon->prepare("select is_admin from manage_employee_permissions where employee_id=(select id from employees where company_id=? and user_login_id=?)");
			/* bind parameters for markers */
		$stmt->bind_param("ii", $data['companyId'],$data['userId']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$stmt = $dbCon->prepare("select visiting_address,company_name from property_location left join companies on companies.id=property_location.company_id where property_location.id=(select location_id from employee_location where employee_id=(select id from employees where company_id=? and user_login_id=?))");
			/* bind parameters for markers */
		$stmt->bind_param("ii", $data['companyId'],$data['userId']);
		$stmt->execute();
		$result = $stmt->get_result();
		$rowProperty = $result->fetch_assoc(); 
		
        $row['company_name']=html_entity_decode($rowProperty['company_name']);
		$row['visiting_address']=html_entity_decode($rowProperty['visiting_address']);
			$stmt->close();
			$dbCon->close();
			return $row;	
		
		
    }
	
	
	
	function companyDownloadedApps($data)
    {
		
		$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select manage_apps_permission.id,is_permission,app_name,is_downloaded from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where  app_type=0 and is_mandatory=0");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iii", $data['companyId'],$data['companyId'],$data['userId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select count(id) as num from compnay_app_download where permission_id=? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $row['id'],$data['companyId']);
			$stmt->execute();
			$result_down = $stmt->get_result();
			$row_down = $result_down->fetch_assoc();
			if($row_down['num']==0)
			{
				continue;
			}
			else
			{
				$row['is_downloaded']=1;
			array_push($org,$row);	
			}
			$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		
		
    }
	
	
	function verifyEmailOtpPin($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 
		 $stmt = $dbCon->prepare("select country_code,otp_verification  from user_logins left join phone_country_code on phone_country_code.id=user_logins.country_of_residence where user_logins.id=?");
			/* bind parameters for markers */
		$stmt->bind_param("i", $data['UserId']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		 $arr=array();
        if($row['otp_verification']==$data['OtpPin'])
		{
			$stmt = $dbCon->prepare("update user_logins set get_started_wizard_status=1,verification_status=1 where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$arr['country_code']=$row['country_code'];
			$arr['result']=1;
			$stmt->close();
			$dbCon->close();
			return $arr;	
		}
		else
		{ 
	
			$arr['country_code']=$row['country_code'];
			$arr['result']=0;
			$stmt->close();
			$dbCon->close();
			return $arr;	
		}	
		
    }
	
	function updatePayRequired($data)
    {
		
		$dbCon = AppModel::createConnection();
		 
		$stmt = $dbCon->prepare("update user_certificates set pay_required=? where certificate_key=?");
		/* bind parameters for markers */
		$stmt->bind_param("is", $data['pay'],$data['certi']);
		$stmt->execute();
		$stmt->close();
		$dbCon->close();
		return 1;
    }
	
	function updateCheckRequired($data)
    {
		
		$dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("update user_certificates set checkin_required=? where certificate_key=?");
		/* bind parameters for markers */
		$stmt->bind_param("is",$data['check'], $data['certi']);
		$stmt->execute();
		$stmt->close();
		$dbCon->close();
		return 1;
    }
	
	function generateCertificate($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			
			$pass=md5($data['password']);	
			$stmt = $dbCon->prepare("select count(id) num from user_certificates where  user_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			 
			if($row['num']==3)
			{
			$stmt = $dbCon->prepare("select min(id) min_id from user_certificates where  user_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();	
			
			$stmt = $dbCon->prepare("update user_certificates set is_valid=0 where  id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['min_id']);
			$stmt->execute();
			}
			
			$stmt = $dbCon->prepare("select id,first_name,last_name,sex,dob_day,dob_month,dob_year,created_on,email  from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$resultOrg = $result->fetch_assoc();
			
			$certi=$resultOrg['first_name'].'_'.microtime().'_'.$resultOrg['last_name'];
			$key=$this -> encrypt_decrypt('encrypt',$certi);
			 $st=1;
			$stmt = $dbCon->prepare("insert into user_certificates(`user_id`,`created_on`,password,certificate_key,is_connected) values(?, now(), ?, ?,?)");
			$stmt->bind_param("issi", $data['UserId'],$pass, $key,$st);
			if($stmt->execute())
			{
			  
			$id=$stmt->insert_id;
			$stmt = $dbCon->prepare("update user_certificates set is_connected=1 where id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt = $dbCon->prepare("select first_name,last_name,user_id,email,certificate_key from user_certificates left join user_logins on user_logins.id=user_certificates.user_id where  user_certificates.id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stQ=4;
			$stmt = $dbCon->prepare("select count(id) as num from user_certificates where user_id = ? and qloudid_pay_status = ?");
				
						/* bind parameters for markers */
			$stmt->bind_param("ii", $data['UserId'],$stQ);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();
			 
			if($rowId['num']==0)
			{
			$stmt = $dbCon->prepare("select count(id) as num from user_cards where user_login_id = ?");
				
						/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			  $row['identificator']=1;
			}
			else
			{
			$stmt = $dbCon->prepare("update user_certificates set pay_required=1,qloudid_pay_status=1 where id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select is_id_active num from user_profiles where user_logins_id = ?");
				
						/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			  $row['identificator']=2;
			}
			else
			{
			$stmt = $dbCon->prepare("update user_certificates set qloudid_pay_status=2 where id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("select count(id) as num from user_identification where user_id = ?");
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			 $row['identificator']=0;
			}
			
			else
			{
			$stmt = $dbCon->prepare("update user_certificates set checkin_required=1,qloudid_pay_status=3 where id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select count(id) as num from user_identification where user_id = ? and is_complete=1");
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			 $row['identificator']=-1;
			}
			else
			{
			$stmt = $dbCon->prepare("update user_certificates set pay_required=1,checkin_required=1,qloudid_pay_status=4 where id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();	
			$row['identificator']=3;
			}
				
			}
			}
			}
			}
			else
			{
			$stmt = $dbCon->prepare("update user_certificates set pay_required=1,checkin_required=1,qloudid_pay_status=4 where id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();	
			$row['identificator']=3;	
			}
			
			$row['result']=1;
			$stmt->close();
			$dbCon->close();
			return $row;
			}
			else
			{
			$org=array();
			$org['result']=0;
			$org['first_name']=0;
			$org['last_name']=0;
			$org['user_id']=0;
			$org['email']=0;
			$org['certificate_key']=0;
			$org['identificator']=7;
			$stmt->close();
			$dbCon->close();
			return $org;	
			}
		}
	
	
	function addIdentificatorName($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select user_identification.id,country_of_residence  from user_identification left join user_logins on user_logins.id= user_identification.user_id where  identity_number=? and country_of_residence=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("si", $data['IdentificatorText'],$data['CountryId']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update user_logins set first_name=?,last_name=? where id=?");
			$stmt->bind_param("ssi",  $data['FirstName'],$data['LastName'],$data['UserId']);	
			$stmt->execute();
			
			$img_name1='';
			$img_name2='';
			$a=array();
			$b=array();
			$a=explode('/',$data['IssueDate']);
			$b=explode('/',$data['ExpiryDate']);
			if($a[1]<10)
			{
				$a[1]='0'.$a[1];
			}
			if($b[1]<10)
			{
				$b[1]='0'.$b[1];
			}
			$arr=array();
			if(empty($row))
			{
			 
			$stmt = $dbCon->prepare("insert into user_identification(user_id,identification_type,identity_number,issue_month,issue_year,expiry_month, expiry_year,created_on,front_image_path, back_image_path,issue_date,expiry_date)
			values(?, ?, ?, ?, ?, ?, ?, now(),?,?, ?, ?)");
			$stmt->bind_param("iissisissss", $data['UserId'],$data['IdentificatorId'],$data['IdentificatorText'],$a[1],$a[2],$b[1],$b[2],$img_name1,$img_name2,$data['IssueDate'],$data['ExpiryDate']);	
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			$arr['result']=1;
			return $arr['result'];	
			}
			else
			{
			 
			
			$stmt->close();
			$dbCon->close();
			$arr['result']=0;
			return $arr['result'];	
			 
			}
			
			 
		}
		
	
	
	function addIdentificator($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select user_identification.id,country_of_residence  from user_identification left join user_logins on user_logins.id= user_identification.user_id where  identity_number=? and country_of_residence=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("si", $data['IdentificatorText'],$data['CountryId']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			 
			$img_name1='';
			$img_name2='';
			$a=array();
			$b=array();
			$a=explode('/',$data['IssueDate']);
			$b=explode('/',$data['ExpiryDate']);
			if($a[1]<10)
			{
				$a[1]='0'.$a[1];
			}
			if($b[1]<10)
			{
				$b[1]='0'.$b[1];
			}
			$arr=array();
			if(empty($row))
			{
			 
			$stmt = $dbCon->prepare("insert into user_identification(user_id,identification_type,identity_number,issue_month,issue_year,expiry_month, expiry_year,created_on,front_image_path, back_image_path,issue_date,expiry_date)
			values(?, ?, ?, ?, ?, ?, ?, now(),?,?, ?, ?)");
			$stmt->bind_param("iissisissss", $data['UserId'],$data['IdentificatorId'],$data['IdentificatorText'],$a[1],$a[2],$b[1],$b[2],$img_name1,$img_name2,$data['IssueDate'],$data['ExpiryDate']);	
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update user_certificates set checkin_required=1,qloudid_pay_status=3 where certificate_key=?");
			$stmt->bind_param("s", $data['certi']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			$arr['result']=1;
			return $arr['result'];	
			}
			else
			{
			 
			
			$stmt->close();
			$dbCon->close();
			$arr['result']=0;
			return $arr['result'];	
			 
			}
			
			 
		}
		
		function addIdentificatorImages($data)
		{
			$dbCon = AppModel::createConnection();
			 
			 
			$stmt = $dbCon->prepare("select user_identification.id  from user_identification where  user_id=? and identification_type=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['UserId'],$data['IdentificatorId']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$data1 = strip_tags($data['ImageData']);
			$data1='url("data:image/png;base64,'.$data1.'")';
			//echo $data; die;
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
				 
			$arr=array();
			 
			if($data['imageId']==1)
			{
			$stmt = $dbCon->prepare("update user_identification set front_image_path=? where id=?");
			}
			else
			{
			$stmt = $dbCon->prepare("update user_identification set back_image_path=?,is_completed=1 where id=?");	
			}
			$stmt->bind_param("si",  $img_name1,$row['id']);	
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select is_completed  from user_identification where  user_id=? and identification_type=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['UserId'],$data['IdentificatorId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if($row['is_completed']==1)
			{
			$stmt = $dbCon->prepare("update user_certificates set qloudid_pay_status=4 where user_id=?");
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();	
			}
			
			
			$stmt->close();
			$dbCon->close();
			$arr['result']=1;
			return $arr['result'];	
			 
			 
		}
		
		
		function  identificatorDetail($data)
		{
			$dbCon = AppModel::createConnection();
			 
			 
			$stmt = $dbCon->prepare("select identification_type  from user_identification where  user_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
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
		
		
	
	
	function verifyUserMobile($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 
		 $stmt = $dbCon->prepare("select user_profiles.id from user_profiles left join user_logins on user_logins.id=user_profiles.user_logins_id where phone_number=? and country_of_residence=(select country_of_residence from user_logins where id=?) and user_logins_id!=?");
			/* bind parameters for markers */
		$stmt->bind_param("sii", $data['MobileNo'],$data['UserId'],$data['UserId']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		 $arr=array();
        if(!empty($row))
		{
			$arr['result']=0;
			$stmt->close();
			$dbCon->close();
			return $arr;	
		}
		else
		{ 
			$num=(mt_rand(111111,999999));
			$stmt = $dbCon->prepare("update user_logins set otp_verification=? where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $num,$data['UserId']);
			$stmt->execute();
			$stmt = $dbCon->prepare("update user_profiles set phone_number=? where user_logins_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("si", $data['MobileNo'],$data['UserId']);
			$stmt->execute();
			 $stmt = $dbCon->prepare("select country_code,otp_verification  from user_logins left join phone_country_code on phone_country_code.id=user_logins.country_of_residence where user_logins.id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc(); 
			$to            = '+'.trim($row['country_code']).''.trim($data['MobileNo']);
			$subject       = "One time password!";
			$emailContent ="Your one time password to verify your mobile is : ".$num;
			$res=json_decode(sendSms($subject, $to, $emailContent),true);
			 
			if($res['status']=='OK')
			{
			$arr['result']=1;
			}
			else
			{
			$arr['result']=2;	
			}
			$stmt->close();
			$dbCon->close();
			return $arr;	
		}	
		
    }
	
	function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
		
	function checkValidity($data)
    {
		
		 $dbCon = AppModel::createConnection();
		  
		
		 $stmt = $dbCon->prepare("select id,created_on,user_id,pay_required,checkin_required from user_certificates where certificate_key=? and is_connected=1 and is_valid=1");
			/* bind parameters for markers */
		$stmt->bind_param("s", $data['certi']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$arry=array();
        if(empty($row))
		{
			$stmt->close();
			$dbCon->close();
			$arry['image']='';
			$arry['result']=0;
			$arry['first_name']='';
			$arry['last_name']='';
			$arry['email']='';
			$arry['id']=''; 
			$arry['identificator']=7;
			$arry['country_code']=''; 
			return $arry;	
		}
		else
		{
		if($row['pay_required']==2 || $row['checkin_required']==2)
		{
		$arry['identificator']=3;	
		}
		else
		{
		$arry['identificator']=7;		
		}
		$data['UserId']=$row['user_id'];
		$id=$row['id'];	
		$futureDate=date('Y-m-d', strtotime($row['created_on']. ' + 365 days'));
		$d=date('Y-m-d');
		  
		if($futureDate==$d || $futureDate<$d)
		{
			$arry['image']='';
			$arry['result']=0;
			$arry['first_name']='';
			$arry['last_name']='';
			$arry['email']='';
			$arry['id']=''; 
			$arry['identificator']=7;
			$arry['country_code']=''; 
			return $arry;
		}
		 $stmt = $dbCon->prepare("select user_logins.id,passport_image,first_name,last_name,email,country_code from user_logins left join phone_country_code on phone_country_code.id=user_logins.country_of_residence where user_logins.id=(select user_id from user_certificates where certificate_key=? and is_connected=1 and is_valid=1)");
			/* bind parameters for markers */
		$stmt->bind_param("s", $data['certi']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['passport_image'].'.jpg' ); $imgs=str_replace('../','',$imgs); $imgs='https://www.qloudid.com/'.$imgs; } else {   $imgs=""; }
		
		
			 
			if($arry['identificator']==7)
			{
			$stQ=4;
			$stmt = $dbCon->prepare("select count(id) as num from user_certificates where user_id = ? and qloudid_pay_status = ?");
				
						/* bind parameters for markers */
			$stmt->bind_param("ii", $data['UserId'],$stQ);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();
			 
			if($rowId['num']==0)
			{
			$stmt = $dbCon->prepare("select count(id) as num from user_cards where user_login_id = ?");
				
						/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			//print_r($rowId); die;
			if($rowId['num']==0)
			{
			  $arry['identificator']=1;
			}
			else
			{
			$stmt = $dbCon->prepare("update user_certificates set pay_required=1,qloudid_pay_status=1 where id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select is_id_active num from user_profiles where user_logins_id = ?");
				
						/* bind parameters for markers */
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			  $arry['identificator']=2;
			}
			else
			{
			$stmt = $dbCon->prepare("update user_certificates set qloudid_pay_status=2 where id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("select count(id) as num from user_identification where user_id = ?");
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			 $arry['identificator']=0;
			}
			
			else
			{
			$stmt = $dbCon->prepare("update user_certificates set checkin_required=1,qloudid_pay_status=3 where id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select count(id) as num from user_identification where user_id = ? and is_complete=1");
			$stmt->bind_param("i", $data['UserId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
			 $arry['identificator']=-1;
			}
			else
			{
			$stmt = $dbCon->prepare("update user_certificates set pay_required=1,checkin_required=1,qloudid_pay_status=4 where id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();	
			$arry['identificator']=3;
			}
				
			}
			}
			}
			}
			else
			{
			$stmt = $dbCon->prepare("update user_certificates set pay_required=1,checkin_required=1,qloudid_pay_status=4 where id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();	
			$arry['identificator']=3;	
			}	
			}
			$stmt->close();
			$dbCon->close();
			$arry['identificator']=$arry['identificator'];
			$arry['first_name']=$row['first_name'];
			$arry['last_name']=$row['last_name'];
			$arry['email']=$row['email'];
			$arry['id']=$row['id']; 
			$arry['country_code']=$row['country_code']; 
			$arry['image']=$imgs;
			$arry['result']=1;
			return $arry;	
		}	
		
    }
	
	
	function userDetails($data)
	{
		$dbCon = AppModel::createConnection();
		 
		 $stmt = $dbCon->prepare("select id,passport_image,first_name,last_name,email from user_logins where id=(select user_id from user_certificates where certificate_key=? and is_connected=1 and is_valid=1)");
			/* bind parameters for markers */
		$stmt->bind_param("s", $data['certi']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['passport_image'].'.jpg' ); $imgs=str_replace('../','',$imgs); $imgs='https://www.qloudid.com/'.$imgs; } else {   $imgs=""; }
			 $arry=array();
			$arry['first_name']=html_entity_decode($row['first_name'],ENT_NOQUOTES, 'UTF-8');
			$arry['last_name']=html_entity_decode($row['last_name'],ENT_NOQUOTES, 'UTF-8');
			$arry['email']=$row['email'];
			$arry['user_id']=$row['id'];
			$arry['certificate_key']=$data['certi'];
			$arry['UserImage']=$imgs;
			$arry['result']=1; 
			 $stmt->close();
		$dbCon->close();
			return $arry;	
	}
	function verifyUserConsent($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 
		 $stmt = $dbCon->prepare("select id from user_certificates where certificate_key=? and is_connected=1 and is_valid=1");
			/* bind parameters for markers */
		$stmt->bind_param("s", $data['certi']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		 $arry=array();
        if(empty($row))
		{
			$stmt->close();
			$dbCon->close();
			$arry['first_name']='';
			$arry['last_name']='';
			$arry['company_name']='';
			$arry['image']='';
			$arry['result']=0;
			return $arry;	
		}
		else
		{
		
		 $stmt = $dbCon->prepare("select passport_image,first_name,last_name from user_logins where id=(select user_id from user_certificates where certificate_key=? and is_connected=1 and is_valid=1)");
			/* bind parameters for markers */
		$stmt->bind_param("s", $data['certi']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$stmt = $dbCon->prepare("select company_name from companies where id=(select company_id from oauth_clients where client_id=?)");
			/* bind parameters for markers */
		$stmt->bind_param("s", $data['clientId']);
		$stmt->execute();
		$result = $stmt->get_result();
		$rowCompany = $result->fetch_assoc();
		
		$filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['passport_image'].'.jpg' ); $imgs=str_replace('../','',$imgs); $imgs='https://www.qloudid.com/'.$imgs; } else {   $imgs=""; }
			$stmt->close();
			$dbCon->close();
			
			$arry['first_name']=html_entity_decode($row['first_name'],ENT_NOQUOTES, 'UTF-8');
			$arry['last_name']=html_entity_decode($row['last_name'],ENT_NOQUOTES, 'UTF-8');
			$arry['company_name']=html_entity_decode($rowCompany['company_name'],ENT_NOQUOTES, 'UTF-8');
			$arry['image']=$imgs;
			$arry['result']=1;
			$stmt->close();
		$dbCon->close();
			return $arry;	
		}	
		
    }
	
	
	
	
	
	function userDeliveryInvoiceInfo($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 
		 $stmt = $dbCon->prepare("select invoice_address,invoice_zipcode,invoice_city,invoice_port,invoice_address_required from user_profiles where user_logins_id=?");
			/* bind parameters for markers */
		$stmt->bind_param("s", $data['userId']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$row['invoice_address']=html_entity_decode($row['invoice_address'],ENT_NOQUOTES, 'UTF-8');
		$row['invoice_city']=html_entity_decode($row['invoice_city'],ENT_NOQUOTES, 'UTF-8');
		
		$stmt->close();
		$dbCon->close();
		return $row;	
		
		
    }
	
	
	function purchaseDetail($data)
    {
		
		$dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("update user_certificates set login_status=2,purchased_for=? where login_status =4 and user_id=? ");
        
        /* bind parameters for markers */
        $stmt->bind_param("ii", $data['company_id'],$data['user_id']);
        $stmt->execute();
		 return 1;	
	 
		
    }
	
		function cardDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			if($data['company_id']==0)
			{
			$stmt = $dbCon->prepare("select * from  user_cards where `id`=?");
			$stmt->bind_param("i", $data['card_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['name_on_card']=html_entity_decode($row['name_on_card'],ENT_NOQUOTES, 'UTF-8');
			$stmt->close();
			$dbCon->close();
			return $row;
			}
			else
			{
			$stmt = $dbCon->prepare("select company_cards.id,card_number,card_cvv,exp_month,exp_year,card_type,company_name as name_on_card from  company_cards left join companies on companies.id=company_cards.company_id where company_cards.id=?");
			$stmt->bind_param("i", $data['card_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row;	
			}
		}
	
	function updateCardPurchaseDetail($data)
    {
		
		$dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("update user_certificates set card_id=? where certificate_key=? ");
        
        /* bind parameters for markers */
        $stmt->bind_param("is", $data['card_id'],$data['certificate_key']);
        $stmt->execute();
		$stmt->close();
		$dbCon->close();
		 return 1;	
	 
		
    }
	
	function savePurchaseCardDetails($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $data['card_type']='Visa';
			$stmt = $dbCon->prepare("insert into user_cards(`user_login_id`,`created_on`,`card_number`,card_cvv,exp_month,exp_year,name_on_card,card_type) values(?, now(), ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("isisiss", $data['UserId'],$data['CardNumber'],$data['Cvv'],$data['ExpirationMonth'],$data['ExpirationYear'],htmlentities($data['CardHolderName'],ENT_NOQUOTES, 'UTF-8'),$data['card_type']);
			$stmt->execute();
			$id=$stmt->insert_id;
			$stmt = $dbCon->prepare("update user_certificates set card_id=? where certificate_key=? ");
        
        /* bind parameters for markers */
			$stmt->bind_param("is", $id,$data['certificate_key']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			 
		}
		
		
		function saveUpdatedPurchaseCardDetails($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $data['card_type']='Visa';
			$stmt = $dbCon->prepare("update user_cards set `card_number`=?,card_cvv=?,exp_month=?,exp_year=?,name_on_card=?,card_type=? where id=?");
			$stmt->bind_param("sisiss", $data['CardNumber'],$data['Cvv'],$data['ExpirationMonth'],$data['ExpirationYear'],htmlentities($data['CardHolderName'],ENT_NOQUOTES, 'UTF-8'),$data['card_type'],$data['CardId']);
			$stmt->execute();
			 
			$stmt = $dbCon->prepare("update user_certificates set card_id=? where certificate_key=? ");
        
        /* bind parameters for markers */
			$stmt->bind_param("is", $data['CardId'],$data['Certificatekey']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			 
		}
	
	function confirmPurchase($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			  
			$stmt = $dbCon->prepare("update user_certificates set login_status=2 where certificate_key=? ");
        
        /* bind parameters for markers */
			$stmt->bind_param("s", $data['Certificatekey']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			 
		}
	function purchaseDetailUpdate($data)
    {
		
		$dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("update user_certificates set purchased_for=? where certificate_key=? ");
        
        /* bind parameters for markers */
        $stmt->bind_param("is", $data['company_id'],$data['certificate_key']);
        $stmt->execute();
		if($data['company_id']==0)
		{
		$stmt = $dbCon->prepare("select id,name_on_card,card_number,card_cvv,exp_month,exp_year,card_type from  user_cards where `user_login_id`=?");
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$row['name_on_card']=html_entity_decode($row['name_on_card'],ENT_NOQUOTES, 'UTF-8');
				$row['company_id']=0;
				$row['card_number2']='**** **** **** '.substr($row['card_number'],-4);
				array_push($org,$row);
			}
			 return $org;	
		}
	 else
	 {
		$stmt = $dbCon->prepare("select id,name_on_card,card_number,card_cvv,exp_month,exp_year,card_type from  company_cards where `id`=(select card_id from user_company_profile where user_login_id=? and company_id=?)");
			$stmt->bind_param("ii", $data['user_id'],$data['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$row['name_on_card']=html_entity_decode($row['name_on_card'],ENT_NOQUOTES, 'UTF-8');
				$row['company_id']=$data['company_id'];
				$row['card_number2']='**** **** **** '.substr($row['card_number'],-4);
				array_push($org,$row);
			}
			 return $org;	 
	 }
		
    }
	
	
	function checkPassword($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 $stmt = $dbCon->prepare("select first_name,last_name,user_id,email from user_certificates left join user_logins on user_logins.id=user_certificates.user_id where certificate_key=? and user_certificates.password=?");
			/* bind parameters for markers */
		$stmt->bind_param("ss", $data['certi'],$data['password']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		 
		$org=array();
        if(empty($row))
		{
			$org['result']=0;
			$org['first_name']=0;
			$org['last_name']=0;
			$org['user_id']=0;
			$org['email']=0;
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		else
		{
			$stmt = $dbCon->prepare("update user_certificates set is_connected=1 where certificate_key=? and password=?");
			/* bind parameters for markers */
			$stmt->bind_param("ss", $data['certi'],$data['password']);
			$stmt->execute();
			$row['result']=1;
			$stmt->close();
			$dbCon->close();
			return $row;	
		}	
		
    }
    
	function verifyPassword($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 $stmt = $dbCon->prepare("select id,time_out,password,login_type from user_certificates  where certificate_key=?");
			/* bind parameters for markers */
		$stmt->bind_param("s", $data['certi']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		   
		if($row['password']!=$data['password'])
		{
			 
			if($row['time_out']==1)
			{
				 
			$stmt = $dbCon->prepare("update user_certificates set time_out=0,login_status=0,login_started_for=null where certificate_key=?");
			/* bind parameters for markers */
			$stmt->bind_param("s", $data['certi']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 2;	
			}
			else
			{
			$stmt = $dbCon->prepare("update user_certificates set login_status=3 where certificate_key=?");
			/* bind parameters for markers */
			$stmt->bind_param("s", $data['certi']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 0;
			}			
		}
		else
		{
			 
			if($row['time_out']==1)
			{
				 
			$stmt = $dbCon->prepare("update user_certificates set time_out=0,login_status=0,login_started_for=null where certificate_key=?");
			/* bind parameters for markers */
			$stmt->bind_param("s", $data['certi']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 2;	
			}
			else
			{
			if($row['login_type']==1 || $row['login_type']==9)
			{	 
			$stmt = $dbCon->prepare("update user_certificates set login_status=2 where certificate_key=?");
			/* bind parameters for markers */
			$stmt->bind_param("s", $data['certi']);
			$stmt->execute();
							
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			else if($row['login_type']==4)
			{	 
			$stmt = $dbCon->prepare("update user_certificates set login_status=2 where certificate_key=?");
			/* bind parameters for markers */
			$stmt->bind_param("s", $data['certi']);
			$stmt->execute();
							
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			else
			{
			$stmt = $dbCon->prepare("update user_certificates set login_status=4 where certificate_key=?");
			/* bind parameters for markers */
			$stmt->bind_param("s", $data['certi']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 3;	
			}
			}			
		}	
		
    }
	
	function verifyInterAppPassword($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 $stmt = $dbCon->prepare("select id,time_out,password,login_type from user_certificates  where certificate_key=?");
			/* bind parameters for markers */
		$stmt->bind_param("s", $data['certi']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		 
		  $org=array(); 
		if($row['password']==$data['password'])
		{
			 
			$time=microtime();
			$session=$this->encrypt_decrypt('encrypt',$time);
				 
			$stmt = $dbCon->prepare("update user_certificates set session_info=? where certificate_key=?");
			/* bind parameters for markers */
			$stmt->bind_param("ss", $session,$data['certi']);
			$stmt->execute();
			$org['result']=1;
			$org['session']=$session;
			$stmt->close();
			$dbCon->close();
			return $org;		
		}
		else
		{
			$org['result']=0;
			$org['session']=0; 
			 
			$stmt->close();
			$dbCon->close();
			return $org;	
		 			
		}	
		
    }
	
	function verifyInterAppSession($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 $stmt = $dbCon->prepare("select user_certificates.id,user_id,user_logins.first_name,user_logins.last_name from user_certificates left join user_logins on user_certificates.user_id=user_logins.id  where session_info=?");
			/* bind parameters for markers */
		$stmt->bind_param("s", $data['certi']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		  $org=array(); 
		if(!empty($row))
		{
			 $stmt = $dbCon->prepare("update user_certificates set session_info=null where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",$row['id']);
			$stmt->execute();
			$org['result']=1;
			$org['user_id']=$row['user_id'];
			$org['name']=$row['first_name'].' '.$row['last_name'];
			$stmt->close();
			$dbCon->close();
			return $org;		
		}
		else
		{
			$org['result']=0;
			$org['user_id']=0; 
			$org['name']=''; 
			$stmt->close();
			$dbCon->close();
			return $org;	
		 			
		}	
		
    }
	
	function addFoodToCart()
		{
			$dbCon = AppModel::createConnection();
			
			 $id=$this->encrypt_decrypt('decrypt',$_POST['checkid']);
			 $item_id=$this->encrypt_decrypt('decrypt',$_POST['item_id']);
			$stmt = $dbCon->prepare("select * from hotel_roomservice_item_ordered where qloud_checkout_id=? and dish_id=? and is_verified=0");
			$stmt->bind_param("ii",$id,$item_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if(empty($row))
			{
			$t=$_POST['price']*$_POST['quantity'];
			$stmt = $dbCon->prepare("insert into hotel_roomservice_item_ordered(dish_price,dish_id,dish_quantity,qloud_checkout_id,dish_name,dish_image,dish_detail,total_price,created_on)
			values(?,?,?,?,?,?,?,?,now())");
			$stmt->bind_param("iiiisssi",$_POST['price'],$item_id,$_POST['quantity'],$id,$_POST['dish_name'],$_POST['dish_image'],$_POST['dish_detail'],$t);
			$stmt->execute();
			}
			else
			{
			$t=$_POST['price']*$_POST['quantity'];
			$quantity=$_POST['quantity']+$row['dish_quantity'];
			$stmt = $dbCon->prepare("update hotel_roomservice_item_ordered set dish_quantity=?,total_price=? where id=?");
			$stmt->bind_param("iii",$quantity,$t,$row['id']);
			$stmt->execute();	
			}
			
	 
			$stmt->close();
			$dbCon->close();
			return 1;
			
			 
			
		}
		
	function removeItemFromCart()
		{
			$dbCon = AppModel::createConnection();
			
			 $id=$this->encrypt_decrypt('decrypt',$_POST['checkid']);
			 $item_id=$this->encrypt_decrypt('decrypt',$_POST['item_id']);
			 $stmt = $dbCon->prepare("delete from hotel_roomservice_item_ordered where qloud_checkout_id=? and dish_id=? and is_verified=0");
			$stmt->bind_param("ii",$id,$item_id);
			$stmt->execute();
	 
			$stmt->close();
			$dbCon->close();
			return 1;
			
			 
			
		}
		
	
	
	function updateLoginStatus($data)
    {
		
		 $dbCon = AppModel::createConnection();
		
			$stmt = $dbCon->prepare("update user_certificates set login_status=1 where certificate_key=?");
			/* bind parameters for markers */
			$stmt->bind_param("s", $data['certi']);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;	
	 	
		
    }
	function certificateExxpiryInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select created_on from user_certificates where certificate_key=?");
			$stmt->bind_param("i", $data['certificate_key']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$row['created_on']=date('Y-m-d', strtotime($row['created_on']));
			$row['expiry_date']=date('Y-m-d', strtotime($row['created_on']. ' + 365 days'));
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
	
	function updateLoginIp($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 $a=explode('_',$data['ip']);
		 $data['ip']=$a[0];
		 
		 $stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0 where certificate_key=?");
		/* bind parameters for markers */
		$stmt->bind_param("s", $data['certi']);
		$stmt->execute();
		 
		if(sizeof($a)==2)
		{
			$user=$this->encrypt_decrypt('decrypt',$a[1]);
			$stmt = $dbCon->prepare("select user_id from user_certificates where certificate_key=?");
			/* bind parameters for markers */
			$stmt->bind_param("s", $data['certi']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($user!=$row['user_id'])
			{
			$stmt->close();
			$dbCon->close();
			return 3;	
			}
		}
		 $ip=$this->encrypt_decrypt('decrypt',$data['ip']);
		if (filter_var($ip, FILTER_VALIDATE_IP)) { 
		$stmt = $dbCon->prepare("select id,certificate_key from user_certificates where login_started_for=?");
			/* bind parameters for markers */
		$stmt->bind_param("s", $ip);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		 
		 if(empty($row))
		 {
			 
			 
			$stmt = $dbCon->prepare("update user_certificates set login_started_for=?,login_status=1,time_out=0 where certificate_key=?");
			/* bind parameters for markers */
			$stmt->bind_param("ss", $ip,$data['certi']);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;	
			 
		 }
		 else
		 {
			 $stmt = $dbCon->prepare("update user_certificates set login_started_for='',login_status=1,time_out=0 where login_started_for=?");
			/* bind parameters for markers */
			$stmt->bind_param("s", $ip);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("update user_certificates set login_started_for=?,login_status=1 where certificate_key=?");
			/* bind parameters for markers */
			$stmt->bind_param("ss", $ip,$data['certi']);
			$stmt->execute(); 
			$stmt->close();
			$dbCon->close();
			return 1;
			
		 }
		}
		else
		{
			 
			$dbCon->close();
			return 2; 	
		}
		
    }
	
	
	function clearIps($data)
    {
		
		$dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0 where certificate_key=?");
		/* bind parameters for markers */
		$stmt->bind_param("s", $data['certi']);
		//$stmt->execute();
			 
		$stmt->close();
		$dbCon->close();
		return 1;	
		
    }
	
	
	function clearLogin($data)
    {
		
		$dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0 where certificate_key=?");
		/* bind parameters for markers */
		$stmt->bind_param("s", $data['certi']);
		$stmt->execute();
		$stmt->close();
		$dbCon->close();
		return 1;	
		
    }
	
	
	function clearCertificate($data)
    {
		
		$dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0,is_valid=0 where certificate_key=?");
		/* bind parameters for markers */
		$stmt->bind_param("s", $data['certi']);
		$stmt->execute();
			 
		$stmt->close();
		$dbCon->close();
		return 1;	
		
    }
	
	function checkOrderReference($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 $ip=$this->encrypt_decrypt('decrypt',$_POST['orderRef']);
		 
		 $stmt = $dbCon->prepare("select id,login_status,user_id from user_certificates where login_started_for=?");
		/* bind parameters for markers */
		$stmt->bind_param("s", $ip);
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
			 if($_POST['loginType']==3 || $_POST['loginType']==9)
			 {
				 if(isset($_POST['payForFood']))
				 {
					 $payFood=$_POST['payForFood'];
				 }
				 else
				 {
					$payFood=0; 
				 }
				 $stmt = $dbCon->prepare("update user_certificates set client_id=null where user_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['user_id']);
				$stmt->execute(); 
				
				if(isset($_POST['total_price']))
				{
				$price=$_POST['total_price'];
				}
				else
				{
					$price=0;
				}
				
				if(isset($_POST['booking_id']))
				 {
					 $_POST['booking_id']=$_POST['booking_id'];
				 }
				 else
				 {
					 $_POST['booking_id']='-';
				 }
				$stmt = $dbCon->prepare("update user_certificates set client_id=?,login_type=?,total_price=?,pay_for_food=?,session_info=?  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("siiisi", $_POST['client_id'],$_POST['loginType'],$price,$payFood,$_POST['booking_id'],$row['id']);
				$stmt->execute(); 
			 }
			 else if($_POST['loginType']==5 || $_POST['loginType']==4)
			 {
				 $stmt = $dbCon->prepare("update user_certificates set client_id=null where user_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['user_id']);
				$stmt->execute(); 
				
				if(isset($_POST['total_price']))
				{
				$price=$_POST['total_price'];
				}
				else
				{
					$price=0;
				}
				 if(isset($_POST['booking_id']))
				 {
					 $_POST['booking_id']=$_POST['booking_id'];
				 }
				 else
				 {
					 $_POST['booking_id']='-';
				 }
				$stmt = $dbCon->prepare("update user_certificates set client_id=?,login_type=?,total_price=?,session_info=? where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("siisi", $_POST['client_id'],$_POST['loginType'],$price,$_POST['booking_id'],$row['id']);
				$stmt->execute(); 
				 
			 }
			 else
			 {
				$stmt = $dbCon->prepare("update user_certificates set login_type=? where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ii", $_POST['loginType'],$row['id']);
				$stmt->execute();
			 }
			$stmt->close();
			$dbCon->close();
			return $row['login_status']; 
		 }
    }
	function countPickupAddress($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 
		 $stmt = $dbCon->prepare("select id,client_id from user_certificates where certificate_key=? and is_connected=1 and is_valid=1");
			/* bind parameters for markers */
		$stmt->bind_param("s", $data['certi']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		 
		
		 
		if($row['client_id']==null || $row['client_id']=='')
		{
		$id=$this->encrypt_decrypt('decrypt',$data['company_id']);
		$stmt = $dbCon->prepare("select count(id) as num from company_pickup_address where company_id=?");
			/* bind parameters for markers */
		$stmt->bind_param("i", $id);	
		}
		else
		{
		$stmt = $dbCon->prepare("select count(id) as num from company_pickup_address where company_id=(select company_id from oauth_clients where client_id=?)");
			/* bind parameters for markers */
		$stmt->bind_param("s", $row['client_id']);	
		}
		
		$stmt->execute();
		$result = $stmt->get_result();
		$rowCompany = $result->fetch_assoc();
		
		 
			$stmt->close();
			$dbCon->close();
			return $rowCompany;	
		 
		
    }

	
	function updatePickupDelivery($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 
		 $stmt = $dbCon->prepare("update user_certificates set delivery_type=? where certificate_key=?");
			/* bind parameters for markers */
		$stmt->bind_param("is",$data['delivery_type'], $data['certi']);
		$stmt->execute();
		 
			$stmt->close();
			$dbCon->close();
			return 1;	
		 
		
    }
	
	
	function updatePickupAddress($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 
		 $stmt = $dbCon->prepare("update user_certificates set pickup_address_id=? where certificate_key=?");
			/* bind parameters for markers */
		$stmt->bind_param("is",$data['pickup_address_id'], $data['certi']);
		$stmt->execute();
		 
			$stmt->close();
			$dbCon->close();
			return 1;	
		 
		
    }

function pickupAddressDetail($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 
		 $stmt = $dbCon->prepare("select id,client_id from user_certificates where certificate_key=? and is_connected=1 and is_valid=1");
			/* bind parameters for markers */
		$stmt->bind_param("s", $data['certi']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		 
		if($row['client_id']==null || $row['client_id']=='')
		{
		$id=$this->encrypt_decrypt('decrypt',$data['company_id']);
		$stmt = $dbCon->prepare("select id,address,port_number,zipcode,pickup_address_name,state as country_name,city from company_pickup_address where company_id=?");
			/* bind parameters for markers */
		$stmt->bind_param("i", $id);	
		}
		else
		{
		 
		
		$stmt = $dbCon->prepare("select id,address,port_number,zipcode,pickup_address_name,state as country_name,city from company_pickup_address where company_id=(select company_id from oauth_clients where client_id=?)");
			/* bind parameters for markers */
		$stmt->bind_param("s", $row['client_id']);
		}
		$stmt->execute();
		$result = $stmt->get_result();
		$org=array();
		while($rowCompany = $result->fetch_assoc())
		{
			 
			array_push($org,$rowCompany);
		}
		
		 
			$stmt->close();
			$dbCon->close();
			return $org;	
		 
		
    }	
	
	function getUserId($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 $ip=$this->encrypt_decrypt('decrypt',$_POST['orderRef']);
		 
		 $stmt = $dbCon->prepare("select id,login_status,user_id from user_certificates where login_started_for=?");
		/* bind parameters for markers */
		$stmt->bind_param("s", $ip);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
		$dbCon->close();
		return $row['user_id']; 
	
    }
	
	function bookingDetails()
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$_POST['id']);   
			$rid= $this -> encrypt_decrypt('decrypt',$_POST['rid']); 
			
			 $stmt = $dbCon->prepare("insert into `hotel_checkout_detail`(`guest_adult`,`guest_children`,`guest_infant`,`checkin_date`,`checkout_date`,`room_type_id`,`total_days`,`price`,`created_on`,room_id,hotel_property_type) values ( ?, ?, ?, ?, ?, ?, ?, ?, now(),?, ?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiissiiiii", $_POST['guest_adults'], $_POST['guest_children'], $_POST['guest_infants'],$_POST['date1'],$_POST['date2'],$id,$_POST['total_days'],$_POST['price'],$rid,$_POST['hotel_property_type']);
			$stmt->execute();
			$id=$stmt->insert_id;
			$stmt->close();
			$dbCon->close();
			return $this -> encrypt_decrypt('encrypt',$id);
			
		}
		
    
}