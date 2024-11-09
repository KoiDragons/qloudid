<?php
	
	require_once('../AppModel.php');
	class CommunityModel extends AppModel
	{
			
		function getImageInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['sid']);
			 $stmt = $dbCon->prepare("select community_photo_path,sorting_number,id from community_photos where id=? ");
			$stmt->bind_param("i", $_POST['update_info']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$row1 = $result1->fetch_assoc();
				 
			
				
				 $filename="../estorecss/".$row1 ['community_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['community_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['community_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org='<a class="lightbox__img-nav false"></a><img class="lightbox__img" src="../../../'.$image.'">'; 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		

	function updatePhotoOrder($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['sid']);
			
			$stmt = $dbCon->prepare("select sorting_number from community_photos where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$newSort=$row['sorting_number']+$_POST['addDelete'];
			
			
			$stmt = $dbCon->prepare("select id from community_photos where sorting_number=? and community_id=?");
			$stmt->bind_param("ii", $newSort,$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();	
			
			$stmt = $dbCon->prepare("update community_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row['sorting_number'], $row1['id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("update community_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $_POST['photoId']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updatePhotoDragging($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['sid']);
			
			$stmt = $dbCon->prepare("select sorting_number from community_photos where id=?");
			$stmt->bind_param("i", $_POST['draggedItem']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select sorting_number from community_photos where id=?");
			$stmt->bind_param("i", $_POST['draggedTarget']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();
			 
			if($row1['sorting_number']>$row['sorting_number'])
			{
			$stmt = $dbCon->prepare("select id,sorting_number from community_photos where sorting_number>? and id<=? and community_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
			$newSort=$rowUpdate['sorting_number']-1;
			$stmt = $dbCon->prepare("update community_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			else
			{
			$stmt = $dbCon->prepare("select id,sorting_number from community_photos where sorting_number<? and id>=? and community_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
				$newSort=$rowUpdate['sorting_number']+1;
			$stmt = $dbCon->prepare("update community_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			
			$stmt = $dbCon->prepare("update community_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row1['sorting_number'], $_POST['draggedItem']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function deletePhoto($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['sid']);
			
			$stmt = $dbCon->prepare("select sorting_number from community_photos where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("delete from  community_photos where id=?");
			$stmt->bind_param("i",$_POST['photoId']);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select id,sorting_number from community_photos where sorting_number>? and community_id=?");
			$stmt->bind_param("ii", $row['sorting_number'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row1 = $result->fetch_assoc())	
			{
				$newSort=$row1['sorting_number']-1;
			$stmt = $dbCon->prepare("update community_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $row1['id']);
			$stmt->execute();		
			}
			 
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updatePhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['sid']);
			$data1 = strip_tags($_POST['update_info']);
			define('UPLOAD_DIR','../estorecss/'); 
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			
			$stmt = $dbCon->prepare("select count(community_id) as num from community_photos where community_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$snumber=$row['num']+1;
			
			$stmt = $dbCon->prepare("insert into community_photos (community_photo_path,community_id,sorting_number) values(?, ?, ?)");
			$stmt->bind_param("sii",$img_name1, $aid,$snumber);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		




function displayPhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['sid']);
			
			$stmt = $dbCon->prepare("select count(community_id) as num from community_photos where community_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select community_photo_path,sorting_number,id from community_photos where community_id=? order by sorting_number ");
			$stmt->bind_param("i", $aid);
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
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			while($row1 = $result1->fetch_assoc())
			{
				 
				if($i==$row['num'])
				{
				$last="hidden";	
				}
				
				 $filename="../estorecss/".$row1 ['community_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['community_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['community_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org=$org.'<div class="target-indicator padtb10" id="'.$row1['id'].'" ondrop="drop(event)" ondragover="allowDrop(event)"></div>

						<div class="drag-drop__wrapper " draggable="true" id="drag_'.$row1['id'].'" ondragstart="drag(event,'.$row1['id'].')">
																<div class="photo-tile">
																   <div class="handlebar ">
																	  <div class="handlebar__row handlebar__top">
																		<a href="javascript:void(0);" onclick="updatePhotoDecrement('.$row1['id'].');"> <div class="handlebar__cell handlebar__arrow '.$first.' grabbable"><i class="fas fa-chevron-up fsz16"></i></div>
																	  </div></a>
																	  <div class="handlebar__row handlebar__middle">
																		 <div class="handlebar__cell handlebar__grip grabbable"> </div>
																	  </div>
																	  <div class="handlebar__row handlebar__bottom">
																		<a href="javascript:void(0);" onclick="updatePhotoOrderIncreament('.$row1['id'].');"><div class="handlebar__cell handlebar__arrow '.$last.'" tabindex="0" aria-label="Move down"><i class="fas fa-chevron-down fsz16"></i></div></a>
																	  </div>
																   </div>
																   <div class="photo-tile__body">
																	  <img class="photo-tile__image" src="../../../../'.$image.'" alt="Photo 1">
																	  <div class="photo-tile__content">
																		 <div class="photo-tile__tags xs-tall">
																			<div class="photo-tile__tags__properties"><span class="tag tag--standard tag--success white_txt padrl5">High resolution</span><span class="tag tag--standard tag--neutral padrl5 lgtgrey2_bg">Landscape</span></div>
																			<div class="photo-tile__tags__labels"></div>
																		 </div>
																		 <div class="photo-tile__actions">
																		<a href="javascript:void(0);" class="xsi-mart0 show_popup_modal" data-target="#gratis_popup_error" onclick="getImageInfo('.$row1['id'].');">	<button color="#444444" label="View photo" aria-label="View photo" class="merlin-button css-12d2atf">
																			   <div class="merlin-button__content">View</div>
																			</button></a>
																			<a href="javascript:void(0);" tabindex="0" onclick="deletePhoto('.$row1['id'].');">Delete</a>
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
		
		
		function updateAmenityRuleInfo()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("update community_amenity_rule_applicable set is_available=? where id=?");
			$stmt->bind_param("ii", $_POST['updateInfo'], $_POST['rule_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}	
		
		
		function updateAmenityDescription($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("update community_aminity_detail set amenity_description=? where id=?");
			$stmt->bind_param("si",$_POST['propertyNickname'], $aid);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function workingHrs()
		{
			$dbCon = AppModel::createConnection();
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
		 
		function updateSocietyAmenityHrs($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			if($_POST['day1']==0)
			{
			$_POST['day1']=0;	
			$_POST['amenity_hrs_mon_fri_open']=0;	
			$_POST['amenity_hrs_mon_fri_close']=0;
			}
			
			if($_POST['day2']==0)
			{
			$_POST['day2']=0;	
			$_POST['amenity_hrs_sat_sun_open']=0;	
			$_POST['amenity_hrs_sat_sun_close']=0;
			}
			 
			$stmt = $dbCon->prepare("update community_aminity_detail set amenity_open_month=?,amenity_close_month=?,amenity_hrs_mon_fri=?,amenity_hrs_mon_fri_open=?,amenity_hrs_mon_fri_close=?,amenity_hrs_sat_sun=?,amenity_hrs_sat_sun_open=?,amenity_hrs_sat_sun_close=? where id=?");
			$stmt->bind_param("iiississi",$_POST['amenity_open_month'],$_POST['amenity_close_month'],$_POST['day1'],$_POST['amenity_hrs_mon_fri_open'],$_POST['amenity_hrs_mon_fri_close'],$_POST['day2'],$_POST['amenity_hrs_sat_sun_open'],$_POST['amenity_hrs_sat_sun_close'],$aid);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function communitySelectedAmenitiesInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("select amenity_id,amenity_open_month,amenity_close_month,amenity_hrs_sat_sun,amenity_hrs_sat_sun_open,amenity_hrs_sat_sun_close,amenity_hrs_mon_fri,amenity_hrs_mon_fri_open,amenity_hrs_mon_fri_close,app_display,community_aminity_detail.id,close_time,open_time,is_available,community_aminity_name,open_close_timing,amenity_description  from community_aminity_detail left join community_aminity_info on community_aminity_info.id=community_aminity_detail.amenity_id where community_aminity_detail.id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from community_amenity_rules where id not in(select community_amenity_rules_id from community_amenity_rule_applicable where community_aminity_detail_id=? and community_amenity_id=?) and community_amenity_id=?");
			$stmt->bind_param("iii", $id, $row['amenity_id'], $row['amenity_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row2 = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into community_amenity_rule_applicable (community_amenity_id,community_aminity_detail_id,community_amenity_rules_id) values(?, ?, ?)");
			$stmt->bind_param("iii",$row['amenity_id'], $id,$row2['id']);
			$stmt->execute();	
			}
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		 
		 
		function communitySelectedAmenitiesRulesInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("select amenity_id,amenity_open_month,amenity_close_month,amenity_hrs_sat_sun,amenity_hrs_sat_sun_open,amenity_hrs_sat_sun_close,amenity_hrs_mon_fri,amenity_hrs_mon_fri_open,amenity_hrs_mon_fri_close,app_display,community_aminity_detail.id,close_time,open_time,is_available,community_aminity_name,open_close_timing,amenity_description  from community_aminity_detail left join community_aminity_info on community_aminity_info.id=community_aminity_detail.amenity_id where community_aminity_detail.id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$amenity_id=$row['amenity_id'];
			
			$stmt = $dbCon->prepare("select * from community_amenity_rule_heading where community_amenity_id=?");
			$stmt->bind_param("i", $amenity_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{ 
			array_push($org,$row);
			$stmt = $dbCon->prepare("select community_amenity_rule_applicable.id,community_rule,is_available from community_amenity_rule_applicable left join community_amenity_rules on community_amenity_rules.id=community_amenity_rule_applicable.community_amenity_rules_id where community_amenity_rule_applicable.community_amenity_id=? and community_aminity_detail_id=? and community_amenity_rule_heading_id=?");
			$stmt->bind_param("iii",$amenity_id, $id,$row['id']);
			$stmt->execute();
			$result2 = $stmt->get_result();
			$org[$j]['rules']=array();
			while($row2 = $result2->fetch_assoc())
			{
				 
			 	array_push($org[$j]['rules'],$row2);
			}
			$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		 
		
		
		function updateAmenityPhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			$data1 = strip_tags($_POST['update_info']);
			define('UPLOAD_DIR','../estorecss/'); 
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			
			$stmt = $dbCon->prepare("select count(community_aminity_detail_id) as num from community_aminity_detail_images where community_aminity_detail_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$snumber=$row['num']+1;
			
			$stmt = $dbCon->prepare("insert into community_aminity_detail_images (amenity_image_path,community_aminity_detail_id,sorting_number) values(?, ?, ?)");
			$stmt->bind_param("sii",$img_name1, $aid,$snumber);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function getAmenityImageInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			 $stmt = $dbCon->prepare("select amenity_image_path,sorting_number,id from community_aminity_detail_images where id=? ");
			$stmt->bind_param("i", $_POST['update_info']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$row1 = $result1->fetch_assoc();
				 
			
				
				 $filename="../estorecss/".$row1 ['amenity_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['amenity_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['amenity_image_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org='<a class="lightbox__img-nav false"></a><img class="lightbox__img" src="../../../'.$image.'">'; 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function updateAmenityPhotoOrder($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select sorting_number from community_aminity_detail_images where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$newSort=$row['sorting_number']+$_POST['addDelete'];
			
			
			$stmt = $dbCon->prepare("select id from community_aminity_detail_images where sorting_number=? and community_aminity_detail_id=?");
			$stmt->bind_param("ii", $newSort,$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();	
			
			$stmt = $dbCon->prepare("update community_aminity_detail_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row['sorting_number'], $row1['id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("update community_aminity_detail_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $_POST['photoId']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function deleteAmenityPhoto($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select sorting_number from community_aminity_detail_images where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("delete from  community_aminity_detail_images where id=?");
			$stmt->bind_param("i",$_POST['photoId']);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select id,sorting_number from community_aminity_detail_images where sorting_number>? and community_aminity_detail_id=?");
			$stmt->bind_param("ii", $row['sorting_number'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row1 = $result->fetch_assoc())	
			{
				$newSort=$row1['sorting_number']-1;
			$stmt = $dbCon->prepare("update community_aminity_detail_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $row1['id']);
			$stmt->execute();		
			}
			 
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateAmenityPhotoDragging($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select sorting_number from community_aminity_detail_images where id=?");
			$stmt->bind_param("i", $_POST['draggedItem']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select sorting_number from community_aminity_detail_images where id=?");
			$stmt->bind_param("i", $_POST['draggedTarget']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();
			 
			if($row1['sorting_number']>$row['sorting_number'])
			{
			$stmt = $dbCon->prepare("select id,sorting_number from community_aminity_detail_images where sorting_number>? and id<=? and community_aminity_detail_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
			$newSort=$rowUpdate['sorting_number']-1;
			$stmt = $dbCon->prepare("update community_aminity_detail_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			else
			{
			$stmt = $dbCon->prepare("select id,sorting_number from community_aminity_detail_images where sorting_number<? and id>=? and community_aminity_detail_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
				$newSort=$rowUpdate['sorting_number']+1;
			$stmt = $dbCon->prepare("update community_aminity_detail_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			
			$stmt = $dbCon->prepare("update community_aminity_detail_images set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row1['sorting_number'], $_POST['draggedItem']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function displayAmenityPhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select count(community_aminity_detail_id) as num from community_aminity_detail_images where community_aminity_detail_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select amenity_image_path,sorting_number,id from community_aminity_detail_images where community_aminity_detail_id=? order by sorting_number ");
			$stmt->bind_param("i", $aid);
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
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			while($row1 = $result1->fetch_assoc())
			{
				 
				if($i==$row['num'])
				{
				$last="hidden";	
				}
				
				 $filename="../estorecss/".$row1 ['amenity_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['amenity_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['amenity_image_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org=$org.'<div class="target-indicator padtb10" id="'.$row1['id'].'" ondrop="drop(event)" ondragover="allowDrop(event)"></div>

						<div class="drag-drop__wrapper " draggable="true" id="drag_'.$row1['id'].'" ondragstart="drag(event,'.$row1['id'].')">
																<div class="photo-tile">
																   <div class="handlebar ">
																	  <div class="handlebar__row handlebar__top">
																		<a href="javascript:void(0);" onclick="updatePhotoDecrement('.$row1['id'].');"> <div class="handlebar__cell handlebar__arrow '.$first.' grabbable"><i class="fas fa-chevron-up fsz16"></i></div>
																	  </div></a>
																	  <div class="handlebar__row handlebar__middle">
																		 <div class="handlebar__cell handlebar__grip grabbable"> </div>
																	  </div>
																	  <div class="handlebar__row handlebar__bottom">
																		<a href="javascript:void(0);" onclick="updatePhotoOrderIncreament('.$row1['id'].');"><div class="handlebar__cell handlebar__arrow '.$last.'" tabindex="0" aria-label="Move down"><i class="fas fa-chevron-down fsz16"></i></div></a>
																	  </div>
																   </div>
																   <div class="photo-tile__body">
																	  <img class="photo-tile__image" src="../../../../../'.$image.'" alt="Photo 1">
																	  <div class="photo-tile__content">
																		 <div class="photo-tile__tags xs-tall">
																			<div class="photo-tile__tags__properties"><span class="tag tag--standard tag--success white_txt padrl5">High resolution</span><span class="tag tag--standard tag--neutral padrl5 lgtgrey2_bg">Landscape</span></div>
																			<div class="photo-tile__tags__labels"></div>
																		 </div>
																		 <div class="photo-tile__actions">
																		<a href="javascript:void(0);" class="xsi-mart0 show_popup_modal" data-target="#gratis_popup_error" onclick="getImageInfo('.$row1['id'].');">	<button color="#444444" label="View photo" aria-label="View photo" class="merlin-button css-12d2atf">
																			   <div class="merlin-button__content">View</div>
																			</button></a>
																			<a href="javascript:void(0);" tabindex="0" onclick="deletePhoto('.$row1['id'].');">Delete</a>
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
		
		 function countryOptions()
				{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from phone_country_code order by country_name");
			
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
			
			
			function countryCode()
				{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from phone_country_code order by country_code");
			
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
		
		
		function updateCommunityPost()
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("update landloard_building_tenant set post_id=?  where id=?");
			$stmt->bind_param("ii", $_POST['post_id'],$_POST['tenant_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		function communityAvailableTenantsInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$society_id= $this -> encrypt_decrypt('decrypt',$data['sid']);
			 
			$org=array();
			$stmt = $dbCon->prepare("select * from landloard_building_tenant where building_id in (select building_id from landloard_society_buildings where society_id=?)");
			$stmt->bind_param("i", $society_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select count(id) as num from user_tenants where tenant_id=? and is_approved=1");
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$row2 = $result2->fetch_assoc();
				if($row2['num']>0)
				{
					$row['connected']='Connected';
				}
				else
				{
					$row['connected']='Not-connected';
				}
				array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function communityPostsInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$society_id= $this -> encrypt_decrypt('decrypt',$data['sid']);
			$org=array();
			$stmt = $dbCon->prepare("select * from community_post_detail");
			 
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function updateAminity()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("update community_aminity_detail set  is_available=?,open_time=1,close_time=1,app_display=0 where id=?");
			$stmt->bind_param("ii", $_POST['update_info'],$_POST['id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}	
		
		
		function updateOpentime()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("update community_aminity_detail set  open_time=? where id=?");
			$stmt->bind_param("ii", $_POST['subcategory_info'],$_POST['id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}	
		
		function updateCloseTime()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("update community_aminity_detail set  close_time=? where id=?");
			$stmt->bind_param("ii", $_POST['subcategory_info'],$_POST['id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}	
		
		
		
		function societySelectedAmenitiesCount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$society_id= $this -> encrypt_decrypt('decrypt',$data['sid']);
			$stmt = $dbCon->prepare("select count(community_aminity_detail.id) as num from community_aminity_detail left join community_aminity_info on community_aminity_info.id=community_aminity_detail.amenity_id where is_available=1 and society_id=? and common_values=1");
			$stmt->bind_param("i", $society_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $rowAvailable['num'];
		}
		
		
		function updatedAmenityDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$org='';
			$stmt = $dbCon->prepare("select community_aminity_detail.id,close_time,open_time,is_available,community_aminity_name,open_close_timing  from community_aminity_detail left join community_aminity_info on community_aminity_info.id=community_aminity_detail.amenity_id where community_aminity_detail.id=? and common_values=1");
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$data['open_time']=$rowAvailable['open_time'];
			$data['close_time']=$rowAvailable['close_time']; 
			if($rowAvailable['is_available']==1)
			{
				if($rowAvailable['open_close_timing']==1)
				{
				 
				$openTime=$this->communityAmenityOpenInfo($data);
					$closeTime=$this->communityAmenityCloseInfo($data);
					$available='<div class="css-11e5cyp padt10">
					<p class="paragraph--b1 paragraph--full css-1680uhd tall">Opening time</p>
				  <select id="'.$rowAvailable['community_aminity_name'].'-amenity-select-open" data-testid="'.$rowAvailable['community_aminity_name'].'-amenity-select-open" class="css-bnguuq dropdown-bg" onchange="updateOpentime('.$rowAvailable['id'].',this.value);">
					'.$openTime.'
					  </select>
					</div>
					<div class="css-11e5cyp padt10">
					<p class="paragraph--b1 paragraph--full css-1680uhd tall">Closing time</p>
				  <select id="'.$rowAvailable['community_aminity_name'].'-amenity-select-close" data-testid="'.$rowAvailable['community_aminity_name'].'-amenity-select-close" class="css-bnguuq dropdown-bg" onchange="updateCloseTime('.$rowAvailable['id'].',this.value);">
					'.$closeTime.'
					  </select>
					</div>
				  ';
			  
				}
				else
				{
				$available='';	
				}
				
				$checked='checked';
			  $update=0;
			}
			else
			{
			$available='';	
			$checked='';
			$update=1;
			}
			$org=$org.'<div id="'.$_POST['id'].'">
       
      <div data-testid="'.$rowAvailable['community_aminity_name'].'-amenity-item" class="css-39yi7y">
        <div class="css-nj7s2c">
          <label for="oven" class="css-14q70q0">'.$rowAvailable['community_aminity_name'].'</label>
          <div class="css-1sjqbna">
            <a href="javascript:void(0);" onclick="updateAminity('.$_POST['id'].','.$update.');">
              <input data-testid="test-checkbox-'.$rowAvailable['community_aminity_name'].'" name="'.$rowAvailable['community_aminity_name'].'" type="checkbox" class="css-1lgzhz8" '.$checked.'>
            </a>
          </div>
		  
		  
        </div>
		
		'.$available.'
		</div>
		</div>
        '; 
			$stmt->close();
			$dbCon->close();
			return $org;
		
		}
		
		function communityAvailableAmenitiesInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$society_id= $this -> encrypt_decrypt('decrypt',$data['sid']);
			
			$stmt = $dbCon->prepare("select app_display,community_aminity_detail.id,close_time,open_time,is_available,community_aminity_name,open_close_timing  from community_aminity_detail left join community_aminity_info on community_aminity_info.id=community_aminity_detail.amenity_id where society_id=?  and common_values=1  and is_available=1");
			$stmt->bind_param("i", $society_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			
			
			if(empty($rowAvailable))
			{
			$stmt = $dbCon->prepare("select *  from community_aminity_info");
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowAvailable = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("INSERT INTO community_aminity_detail (society_id, amenity_id) VALUES (?, ?)");
			$stmt->bind_param("ii", $society_id,$rowAvailable['id']);
			$stmt->execute();	
			}
			}
			$org=array();
			$stmt = $dbCon->prepare("select app_display,community_aminity_detail.id,close_time,open_time,is_available,community_aminity_name,open_close_timing  from community_aminity_detail left join community_aminity_info on community_aminity_info.id=community_aminity_detail.amenity_id where society_id=?  and common_values=1  and is_available=1");
			$stmt->bind_param("i", $society_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
				$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function communityBuildingsAvailableAmenitiesInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$society_id= $this -> encrypt_decrypt('decrypt',$data['sid']);
			
			$org=array();
			$stmt = $dbCon->prepare("select landloard_buildings.id,building_name  from landloard_society_buildings left join landloard_buildings on landloard_buildings.id=landloard_society_buildings.building_id where society_id=?");
			$stmt->bind_param("i", $society_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['building_amenities']=array();
				$stmt = $dbCon->prepare("select app_display,landloard_building_amenities.id,amenity_name  from landloard_building_amenities left join lanloard_building_amenity_info on lanloard_building_amenity_info.id=landloard_building_amenities.amenity_id where building_id=? and is_available=1");
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$result2 = $stmt->get_result();
				while($row2 = $result2->fetch_assoc())
					{
						array_push($org[$j]['building_amenities'],$row2);
					}
				
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function communityAmenitiesInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$society_id= $this -> encrypt_decrypt('decrypt',$data['sid']);
			
			$stmt = $dbCon->prepare("select *  from community_aminity_info where id not in (select amenity_id  from community_aminity_detail where society_id=?)");
			$stmt->bind_param("i", $society_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowAvailable = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("INSERT INTO community_aminity_detail (society_id, amenity_id) VALUES (?, ?)");
			$stmt->bind_param("ii", $society_id,$rowAvailable['id']);
			$stmt->execute();	
			}
			
			$societySelectedAmenitiesCount=$this->societySelectedAmenitiesCount($data);
			$stmt = $dbCon->prepare("select community_aminity_detail.id,close_time,open_time,is_available,community_aminity_name,open_close_timing  from community_aminity_detail left join community_aminity_info on community_aminity_info.id=community_aminity_detail.amenity_id where society_id=?   and common_values=1");
			$stmt->bind_param("i", $society_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<div class="padb10 xs-padrl0 xs-padb0  mart10  ">
									  <div class="clear"></div>
									  <div class="marrl0 padb10   fsz16 white_bg tall padt20">
										<a href="#profile2" class="expander-toggler dark_grey_txt xs-fsz16 tall bold">
										  <div class="dflex wi_100">
											<div class="wi_70 dflex">
											  <span class="css-p2kctj">
												<img src="https://www.safeqloud.com/html/usercontent/images/kitchen2.svg" class="css-z0f999">
											  </span>
											  <div>
												<span class="apartheading">Amenities</span>
												<span class="aprtSubheading">'.$societySelectedAmenitiesCount.' amenities selected</span>
											  </div>
											</div>
											<div class="wi_30 padt10">
											  <span class="dnone_pa fa fa-chevron-down fright"></span>
											  <span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span>
											</div>
										  </div>
										</a>
									  </div>
									  <div id="profile2" class=" " style="display: block;">';
			while($rowAvailable = $result->fetch_assoc())
			{
			 
			$data['open_time']=$rowAvailable['open_time'];
			$data['close_time']=$rowAvailable['close_time'];
			if($rowAvailable['is_available']==1)
			{
				if($rowAvailable['open_close_timing']==1)
				{
					
					$openTime=$this->communityAmenityOpenInfo($data);
					$closeTime=$this->communityAmenityCloseInfo($data);
					$available='<div class="css-11e5cyp padt10">
					<p class="paragraph--b1 paragraph--full css-1680uhd tall">Opening time</p>
				  <select id="'.$rowAvailable['community_aminity_name'].'-amenity-select-open" data-testid="'.$rowAvailable['community_aminity_name'].'-amenity-select-open" class="css-bnguuq dropdown-bg" onchange="updateOpentime('.$rowAvailable['id'].',this.value);">
					'.$openTime.'
					  </select>
					</div>
					<div class="css-11e5cyp padt10">
					<p class="paragraph--b1 paragraph--full css-1680uhd tall">Closing time</p>
				  <select id="'.$rowAvailable['community_aminity_name'].'-amenity-select-close" data-testid="'.$rowAvailable['community_aminity_name'].'-amenity-select-close" class="css-bnguuq dropdown-bg" onchange="updateCloseTime('.$rowAvailable['id'].',this.value);">
					'.$closeTime.'
					  </select>
					</div>
				  ';
				   
				}
				else
				{
				$available='';
				}
				
			  $checked='checked';
			  $update=0;
			}
			else
			{
			$available='';	
			$checked='';
			$update=1;
			}
			$org=$org.'<div id="'.$rowAvailable['id'].'">
       
      <div data-testid="'.$rowAvailable['community_aminity_name'].'-amenity-item" class="css-39yi7y">
        <div class="css-nj7s2c">
          <label for="oven" class="css-14q70q0">'.$rowAvailable['community_aminity_name'].'</label>
          <div class="css-1sjqbna">
            <a href="javascript:void(0);" onclick="updateAminity('.$rowAvailable['id'].','.$update.');">
              <input data-testid="test-checkbox-'.$rowAvailable['community_aminity_name'].'" name="'.$rowAvailable['community_aminity_name'].'" type="checkbox" class="css-1lgzhz8" '.$checked.'>
            </a>
          </div>
		   
		  
        </div>
		
		'.$available.'
		</div>
		</div>
        ';
			}
			
			$org=$org.'</div></div>';
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function communityAmenityOpenInfo($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select *  from working_hrs");
			$stmt->execute();
			$result = $stmt->get_result();	
			$org='';
			while($rowPort = $result->fetch_assoc())
			{
			if($rowPort['id']==$data['open_time'])
			{
				$selected='selected';
			}
			else
			{
				$selected='';
			}
			$org=$org.'<option value="'.$rowPort['id'].'" '.$selected.'>'.$rowPort['work_time'].'</option>';	
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function communityAmenityCloseInfo($data)
		{
			$dbCon = AppModel::createConnection();
			//print_r($data); die;
			$stmt = $dbCon->prepare("select *  from working_hrs");
			$stmt->execute();
			$result = $stmt->get_result();	
			$org='';
			while($rowPort = $result->fetch_assoc())
			{
			if($rowPort['id']==$data['close_time'])
			{
				$selected='selected';
			}
			else
			{
				$selected='';
			}
			$org=$org.'<option value="'.$rowPort['id'].'" '.$selected.'>'.$rowPort['work_time'].'</option>';	
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function updateCommunityAmenityDisplay()
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("update community_aminity_detail set app_display=?  where id=?");
			$stmt->bind_param("ii", $_POST['app_display'],$_POST['amenity_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		function updateBuildingAmenityDisplay()
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("update landloard_building_amenities set app_display=?  where id=?");
			$stmt->bind_param("ii", $_POST['app_display'],$_POST['amenity_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function societyDetailInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$building_id= $this -> encrypt_decrypt('decrypt',$data['sid']);
			$stmt = $dbCon->prepare("select *  from landloard_society  where id=?");
			$stmt->bind_param("i", $building_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $rowAvailable;
			
			
		}
		function addBuildingtoSociety($data)
		{
			$dbCon = AppModel::createConnection();
			$society_id= $this -> encrypt_decrypt('decrypt',$data['sid']); 
			$stmt = $dbCon->prepare("insert into landloard_society_buildings(society_id, building_id,created_on) values (?, ?, now())");
			$stmt->bind_param("ii", $society_id,$_POST['id']);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
				
		}
		
		function removeBuildingFromSociety($data)
		{
			$dbCon = AppModel::createConnection();
			$society_id= $this -> encrypt_decrypt('decrypt',$data['sid']); 
			$stmt = $dbCon->prepare("delete from landloard_society_buildings where society_id=? and building_id=?");
			$stmt->bind_param("ii", $society_id,$_POST['id']);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
				
		}
		function societyList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,society_name,created_on  from landloard_society  where company_id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select count(building_id) as num from landloard_society_buildings where society_id=?");
				$stmt->bind_param("i",$rowAvailable['id']);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$row2 = $result2->fetch_assoc();
				$rowAvailable['num']=$row2['num'];
				array_push($org,$rowAvailable);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}	
		
		
		
		function addSociety($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']); 
			$name=htmlentities($_POST['society_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$street_address=htmlentities($_POST['street_address'],ENT_NOQUOTES, 'ISO-8859-1');
			$city=htmlentities($_POST['city'],ENT_NOQUOTES, 'ISO-8859-1');
			$description=htmlentities($_POST['description'],ENT_NOQUOTES, 'ISO-8859-1');
			$entry_code=htmlentities($_POST['entry_code'],ENT_NOQUOTES, 'ISO-8859-1');
			$wifi_username=htmlentities($_POST['wifi_username'],ENT_NOQUOTES, 'ISO-8859-1');
					
			$stmt = $dbCon->prepare("insert into landloard_society (company_id, society_name,created_on,street_address,port_number,zipcode,city,country_id,phone_country_id,phone_number,email,description,entry_type,entry_code,wifi_available,wifi_username,wifi_password) values (?, ?, now(),?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("isssssiisssisiss", $company_id,$name,$street_address,$_POST['port_number'],$_POST['zipcode'],$city,$_POST['country_id'],$_POST['phone_country_id'],$_POST['phone_number'],$_POST['email'],$description,$_POST['entry_type'],$entry_code,$_POST['wifi_available'],$wifi_username,$_POST['wifi_password']);
			$stmt->execute();	
			$id=$stmt->insert_id;
			
			$stmt = $dbCon->prepare("select *  from community_aminity_info");
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowAvailable = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("INSERT INTO community_aminity_detail (society_id, amenity_id) VALUES (?, ?)");
			$stmt->bind_param("ii", $id,$rowAvailable['id']);
			$stmt->execute();	
			}
			
			
			$select1="select * from community_rules";
	  
			$result1=mysqli_query($dbCon, $select1); 
		 
			 while($row1=mysqli_fetch_array($result1))  
			 { 
				
				$stmt = $dbCon->prepare("insert into `landloard_society_rules`(society_id,rule_id) values (?,?)");
				/* bind parameters for markers */
				$stmt->bind_param("ii",$id,$row1['id']);
				$stmt->execute();
				$id1=$stmt->insert_id;
				
				$select2="select * from community_sub_rules where rule_id=".$row1['id'];
	  
				$result2=mysqli_query($dbCon, $select2); 
			 
				 while($row2=mysqli_fetch_array($result2))  
				 { 
					
				$stmt = $dbCon->prepare("insert into `landloard_society_subrules`(society_rule_id,subrule_id) values (?,?)");
				/* bind parameters for markers */
				$stmt->bind_param("ii",$id1,$row2['id']);
				$stmt->execute();	 
					
				 }
				
			 }
			
			$stmt->close();
			$dbCon->close();
			return 1;
				
		}
		
		
		function societyRulesList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$society_id= $this -> encrypt_decrypt('decrypt',$data['sid']);
			$stmt = $dbCon->prepare("select landloard_society_rules.id,rule_name  from landloard_society_rules  left join community_rules on community_rules.id=landloard_society_rules.rule_id where society_id=?");
			$stmt->bind_param("i", $society_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				array_push($org,$rowAvailable);
				$org[$j]['subrules']=array();
				$stmt = $dbCon->prepare("select landloard_society_subrules.id,subrule_name,is_applicable  from landloard_society_subrules  left join community_sub_rules on community_sub_rules.id=landloard_society_subrules.subrule_id where society_rule_id=?");
				$stmt->bind_param("i", $rowAvailable['id']);
				$stmt->execute();
				$result2 = $stmt->get_result();
				while($row = $result2->fetch_assoc())
				{
					array_push($org[$j]['subrules'],$row);
				}
				$j++;
			}
			
			//echo '<pre>'; print_r($org); echo '</pre>'; die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}	
		
		function updateRuleInfo()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("update landloard_society_subrules set is_applicable=? where id=?");
			$stmt->bind_param("ii", $_POST['updateInfo'], $_POST['subrule_id']);
			$stmt->execute();
			
			if($_POST['updateInfo']==1)
			{
				$stmt = $dbCon->prepare("update landloard_society_rules set is_active=1 where id=?");
				$stmt->bind_param("i", $_POST['rule_id']);
				$stmt->execute();
			}
			else
			{
				$stmt = $dbCon->prepare("select count(id) as num  from landloard_society_subrules where society_rule_id=? and is_applicable=1");
				$stmt->bind_param("i", $_POST['rule_id']);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$row = $result2->fetch_assoc();
				if($row['num']==0)
				{
					$stmt = $dbCon->prepare("update landloard_society_rules set is_active=0 where id=?");
					$stmt->bind_param("i", $_POST['rule_id']);
					$stmt->execute();
				}
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}	
		
		function updateSocietyInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']); 
			$society_id= $this -> encrypt_decrypt('decrypt',$data['sid']);
			$name=htmlentities($_POST['society_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$street_address=htmlentities($_POST['street_address'],ENT_NOQUOTES, 'ISO-8859-1');
			$city=htmlentities($_POST['city'],ENT_NOQUOTES, 'ISO-8859-1');
			$description=htmlentities($_POST['description'],ENT_NOQUOTES, 'ISO-8859-1');
			$entry_code=htmlentities($_POST['entry_code'],ENT_NOQUOTES, 'ISO-8859-1');
			$wifi_username=htmlentities($_POST['wifi_username'],ENT_NOQUOTES, 'ISO-8859-1');
					
			$stmt = $dbCon->prepare("update landloard_society set society_name=?,street_address=?,port_number=?,zipcode=?,city=?,country_id=?,phone_country_id=?,phone_number=?,email=?,description=?,entry_type=?,entry_code=?,wifi_available=?,wifi_username=?,wifi_password=? where id=?");
			$stmt->bind_param("sssssiisssisissi", $name,$street_address,$_POST['port_number'],$_POST['zipcode'],$city,$_POST['country_id'],$_POST['phone_country_id'],$_POST['phone_number'],$_POST['email'],$description,$_POST['entry_type'],$entry_code,$_POST['wifi_available'],$wifi_username,$_POST['wifi_password'],$society_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
				
		}
		
		
		
		function buildingsSocietyList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$society_id= $this -> encrypt_decrypt('decrypt',$data['sid']);
			$stmt = $dbCon->prepare("select *  from landloard_buildings  where company_id=? and id not in (select building_id from landloard_society_buildings where society_id !=?)");
			$stmt->bind_param("ii",$company_id, $society_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select building_id from landloard_society_buildings where society_id=? and building_id=?");
				$stmt->bind_param("ii", $society_id,$rowAvailable['id']);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$row2 = $result2->fetch_assoc();
				if(empty($row2))
				{
				$rowAvailable['selected']=0;	
				}
				else
				{
				$rowAvailable['selected']=1;		
				}	
				
				array_push($org,$rowAvailable);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				$j++;
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
			
			$stmt = $dbCon->prepare("select company_type,companies.country_id,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			//print_r($row); die;
			$row['company_type']=2;
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
	 
		function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$country_id= $data['country_id'];
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=52");
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
		
	function appId()
		{
			
			return $this -> encrypt_decrypt('encrypt',52);
		}
		
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=52");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
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
		
		
		
		 
	}
?>