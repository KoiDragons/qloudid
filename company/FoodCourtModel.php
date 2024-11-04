<?php
	require_once('../AppModel.php');
	class FoodCourtModel extends AppModel
	{
		function displayPhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['rid']);
			
			$stmt = $dbCon->prepare("select count(dish_id) as num from dish_detail_photos where dish_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select dish_photo_path,sorting_number,id from dish_detail_photos where dish_id=? order by sorting_number ");
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
			function base64_to_jpeg1($base64_string, $output_file) {
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
				
				 $filename="../estorecss/".$row1 ['dish_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['dish_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg1( $value_a, '../estorecss/tmp'.$row1['dish_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
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
		
		function updatePhotoDragging($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['rid']);
			
			$stmt = $dbCon->prepare("select dish_photo_path,dish_id,sorting_number from dish_detail_photos where id=?");
			$stmt->bind_param("i", $_POST['draggedItem']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select dish_id,sorting_number from dish_detail_photos where id=?");
			$stmt->bind_param("i", $_POST['draggedTarget']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();
			
			if($row1['sorting_number']==1)
			{
			$stmt = $dbCon->prepare("update dishes_detail_information set dish_image=? where id=?");
			$stmt->bind_param("si",$row['dish_photo_path'], $row['dish_id']);
			$stmt->execute();			
			}
			
			
			if($row1['sorting_number']>$row['sorting_number'])
			{
			$stmt = $dbCon->prepare("select id,sorting_number from dish_detail_photos where sorting_number>? and id<=? and dish_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
			$newSort=$rowUpdate['sorting_number']-1;
			$stmt = $dbCon->prepare("update dish_detail_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			else
			{
			$stmt = $dbCon->prepare("select id,sorting_number from dish_detail_photos where sorting_number<? and id>=? and dish_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
				$newSort=$rowUpdate['sorting_number']+1;
			$stmt = $dbCon->prepare("update dish_detail_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			
			$stmt = $dbCon->prepare("update dish_detail_photos set sorting_number=? where id=?");
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
			
			$stmt = $dbCon->prepare("select sorting_number from dish_detail_photos where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("delete from  dish_detail_photos where id=?");
			$stmt->bind_param("i",$_POST['photoId']);
			$stmt->execute();
			
			if($row1['sorting_number']==1)
			{
			$stmt = $dbCon->prepare("select dish_photo_path,sorting_number from dish_detail_photos where id=? and sorting_number=2");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();
			if(empty($row1))
			{
				$photo='';
			}
			else
			{
				$photo=$row1['dish_photo_path'];
			}
			$stmt = $dbCon->prepare("update dishes_detail_information set dish_image=? where id=?");
			$stmt->bind_param("si",$photo, $aid);
			$stmt->execute();			
			}
			
			$stmt = $dbCon->prepare("select id,sorting_number from dish_detail_photos where sorting_number>? and dish_id=?");
			$stmt->bind_param("ii", $row['sorting_number'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row1 = $result->fetch_assoc())	
			{
				$newSort=$row1['sorting_number']-1;
			$stmt = $dbCon->prepare("update dish_detail_photos set sorting_number=? where id=?");
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
			
			$stmt = $dbCon->prepare("select dish_id,dish_photo_path,sorting_number from dish_detail_photos where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$newSort=$row['sorting_number']+$_POST['addDelete'];
			
			if($newSort==1)
			{
				$stmt = $dbCon->prepare("update dishes_detail_information set dish_image=? where id=?");
				$stmt->bind_param("si",$row['dish_photo_path'], $aid);
				$stmt->execute();	
			}
			
			$stmt = $dbCon->prepare("select id from dish_detail_photos where sorting_number=? and dish_id=?");
			$stmt->bind_param("ii", $newSort,$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();	
			
			$stmt = $dbCon->prepare("update dish_detail_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row['sorting_number'], $row1['id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("update dish_detail_photos set sorting_number=? where id=?");
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
			 $stmt = $dbCon->prepare("select dish_photo_path,sorting_number,id from dish_detail_photos where id=? ");
			$stmt->bind_param("i", $_POST['update_info']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			function base64_to_jpeg2($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$row1 = $result1->fetch_assoc();
				 
			
				
				 $filename="../estorecss/".$row1 ['dish_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['dish_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg2( $value_a, '../estorecss/tmp'.$row1['dish_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org='<a class="lightbox__img-nav false"></a><img class="lightbox__img" src="../../../../'.$image.'">'; 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function updatePhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['rid']);
			$data1 = strip_tags($_POST['update_info']);
			define('UPLOAD_DIR','../estorecss/'); 
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			
			$stmt = $dbCon->prepare("select count(dish_id) as num from dish_detail_photos where dish_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$snumber=$row['num']+1;
			
			if($row['num']==0)
			{
				$stmt = $dbCon->prepare("update dishes_detail_information set dish_image=? where id=?");
				$stmt->bind_param("si",$img_name1, $aid);
				$stmt->execute();	
			}
			
			
			$stmt = $dbCon->prepare("insert into dish_detail_photos (dish_photo_path,dish_id,sorting_number) values(?, ?, ?)");
			$stmt->bind_param("sii",$img_name1, $aid,$snumber);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		
		function countSelectedProfessionalCategoryAvailableLocation($data)
		{ 
		 
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num from professional_service_category_location where id in (select service_available from professional_service_category_available where category_id=?)");
			$stmt->bind_param("i", $_POST['catg_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		function selectedProfessionalCategoryAvailableLocationOld($data)
		{ 
		 
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from professional_service_category_location where id in (select service_available from professional_service_category_available where category_id=?)");
			$stmt->bind_param("i", $_POST['catg_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=' <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt&nbsp;padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Service available</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">How the contractor can provide the service?</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
									  
									 <div class="clear"></div>';
			$j='';
			while($row = $result->fetch_assoc())
			{
				$j=$j.$row['id'].',';	
				$org=$org.'<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20" >
														<a href="javascript:void(0);" onclick="updateInclutionType('.$row['id'].')">
														<input data-testid="test-checkbox-Walls" id="'.$row['id'].'" name="Walls" type="checkbox" class="css-1lgzhz8" checked></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">'.$row['location_name'].'</label></div>
															
															</div>';
			}
			
			$org=$org.'<input type="hidden" id="inclusion_type_detail" name="inclusion_type_detail" value="'.$j.'">';
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
			
		function selectedProfessionalCategoryAvailableLocation($data)
		{ 
		 
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from professional_service_category_location where id in (select service_available from professional_service_category_available where category_id=?)");
			$stmt->bind_param("i", $_POST['catg_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0" class="lgtgrey2_bg">Select</option>';
			 
			while($row = $result->fetch_assoc())
			{
				 	
				$org=$org.'<option value="'.$row['id'].'" class="lgtgrey2_bg">'.$row['location_name'].'</option>';
			}
			
			 
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
			
			
			function selectedProfessionalCategoryLocation($data)
			{ 
		 
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from professional_service_category_location where id in (select service_available from professional_service_category_available where category_id=?)");
			$stmt->bind_param("i", $data['catg_id']);
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
			
		function updateMarketplace()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select is_published from dish_marketplace_information where id=?");
			$stmt->bind_param("i", $_POST['propertyType']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCategory = $result->fetch_assoc();
			if($rowCategory['is_published']==0)
			{
				$update=1;
			}
			else
			{
				$update=0;
			}
			$stmt = $dbCon->prepare("update dish_marketplace_information set is_published=? where id=?");
			$stmt->bind_param("ii", $update,$_POST['propertyType']);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function updateAllMarketplace()
		{
			$dbCon = AppModel::createConnection();
			 
			$_POST['propertyType']=$this->encrypt_decrypt('decrypt', $_POST['propertyType']);
			$update=1;
			$stmt = $dbCon->prepare("update dish_marketplace_information set is_published=? where service_id=? and marketplace_id in (select marketplace_id from dish_marketplace_information where service_id=?)");
			$stmt->bind_param("iii", $update,$_POST['propertyType'],$_POST['propertyType']);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		
		function dayDetail()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select *  from day_detail");
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
		
		function marketPlaceDetailInfo($data)
		{ 
		 
			$dbCon = AppModel::createConnection();
			$service_id=$this->encrypt_decrypt('decrypt',$data['fid']);
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from professional_marketplace where id not in (select marketplace_id from dish_marketplace_information where service_id=?)");
			$stmt->bind_param("i", $service_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into dish_marketplace_information(service_id,marketplace_id) values(?, ?)");
			$stmt->bind_param("ii",$service_id,$rowCategory['id']);
			$stmt->execute();
			}
			$stmt = $dbCon->prepare("select inclusion_detail,professional_subcategory_id,company_id from dishes_detail_information where id=?");
			$stmt->bind_param("i",$service_id);
			$stmt->execute();
			$resultC = $stmt->get_result();
			$rowDish = $resultC->fetch_assoc();
			 
			$stmt = $dbCon->prepare("select dish_marketplace_information.id,marketplace_id,marketplace_name,is_published from dish_marketplace_information left join professional_marketplace on professional_marketplace.id=dish_marketplace_information.marketplace_id where service_id=?");
			$stmt->bind_param("i", $service_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select selected_subscription from cleaning_company_premium_account_request where company_id=? and domain_id=?");
				$stmt->bind_param("ii",$company_id,$rowCategory['marketplace_id']);
				$stmt->execute();
				$resultC = $stmt->get_result();
				$rowC = $resultC->fetch_assoc();
				 
				if($rowC['selected_subscription']==0)
				{
					
					continue;
				}
				
				$stmt = $dbCon->prepare("select count(id) as num from professional_marketplace_service_todos where marketplace_id=? and professional_subcategory_id=? and is_selected=1");
				$stmt->bind_param("ii",$rowCategory['marketplace_id'],$rowDish['professional_subcategory_id']);
				$stmt->execute();
				$resultC = $stmt->get_result();
				$rowC = $resultC->fetch_assoc();
				 
				if($rowC['num']==0)
				{
					$stmt = $dbCon->prepare("update dish_marketplace_information set is_published=0 where id=?");
					$stmt->bind_param("i", $rowCategory['id']);
					$stmt->execute();	
					
					continue;
				}
				
				$stmt = $dbCon->prepare("select count(id) as num from professional_company_selected_service_todos where domain_id=? and professional_subcategory_id=? and is_selected=1 and company_id=?");
				$stmt->bind_param("iii",$rowCategory['marketplace_id'],$rowDish['professional_subcategory_id'],$company_id);
				$stmt->execute();
				$resultC = $stmt->get_result();
				$rowC = $resultC->fetch_assoc();
				 
				if($rowC['num']==0)
				{
					$stmt = $dbCon->prepare("update dish_marketplace_information set is_published=0 where id=?");
					$stmt->bind_param("i", $rowCategory['id']);
					$stmt->execute();	
					continue;
				}
				
				 
				$stmt = $dbCon->prepare("select is_selected from professional_company_selected_service_todos where company_id=? and professional_subcategory_id=? and domain_id=?");
				$stmt->bind_param("iii", $company_id,$data['subcategory_id'],$rowCategory['marketplace_id']);
				$stmt->execute();
				$resultS = $stmt->get_result();
				$rowS = $resultS->fetch_assoc();
				 
				 
				if($rowS['is_selected']==0)
				{
				$stmt = $dbCon->prepare("update dish_marketplace_information set is_published=0 where id=?");
				$stmt->bind_param("i", $rowCategory['id']);
				$stmt->execute();	
				continue;	
				}
					
				array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
			
		
		function selectedCategoryServicesDetail($data)
		{ 
		 	$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id,subcategory_name from professional_service_subcategory where professional_category_id=?");
			$stmt->bind_param("i",$data['catg_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			array_push($org,$rowCategory);
			}
			
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
		
		function selectedProfessionalCategoryServicesDetail($data)
		{ 
		 	$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			/*$stmt = $dbCon->prepare("select professional_company_selected_service_todos.id,professional_subcategory_id,subcategory_name from professional_company_selected_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_company_selected_service_todos.professional_subcategory_id where professional_company_selected_service_todos.professional_category_id=? and company_id=? and domain_id in (select domain_id from cleaning_company_premium_account_request where company_id=? and is_approved=1)  and is_selected=1 and professional_company_selected_service_todos.professional_subcategory_id in ((select professional_subcategory_id from professional_marketplace_service_todos where is_selected=1 and marketplace_id in (select domain_id from cleaning_company_premium_account_request where company_id=? and is_approved=1)))");
			$stmt->bind_param("iiii",$_POST['catg_id'], $company_id, $company_id, $company_id);*/
			
			$stmt = $dbCon->prepare("select id,subcategory_name from professional_service_subcategory where professional_category_id=?");
			$stmt->bind_param("i",$_POST['catg_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0" class="lgtgrey2_bg">Select</option>';
			while($rowCategory = $result->fetch_assoc())
			{
			$org=$org.'<option value="'.$rowCategory['id'].'" class="lgtgrey2_bg">'.$rowCategory['subcategory_name'].'</option>';
			}
			
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
		
		function selectedProfessionalCategoryDetail($data)
		{ 
		 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			/*$stmt = $dbCon->prepare("select * from professional_service_category where id in (select professional_category_id from professional_company_selected_service_todos where company_id=? and is_selected=1 and domain_id in (select domain_id from cleaning_company_premium_account_request where company_id=? and is_approved=1) and professional_category_id in (select professional_category_id from professional_marketplace_service_todos where is_selected=1 and marketplace_id in (select domain_id from cleaning_company_premium_account_request where company_id=? and is_approved=1)))");
			$stmt->bind_param("iii", $company_id,$company_id,$company_id);*/
			$stmt = $dbCon->prepare("select * from professional_service_category");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
			
		
		
		function employeeList($data)
		{
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$dish_id= $this -> encrypt_decrypt('decrypt',$data['fid']);
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select id,email,concat_ws(' ',first_name,last_name) as name,services_available  from employees where company_id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$a=explode(',',$row['services_available']);
					if(in_array($dish_id, $a))
						{
						$row['is_available']=1;
						}
						else
						{
						$row['is_available']=0;
						}
				$row['services_available']=$row['services_available'].',';
				array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
		}
		
		
		function addEmployeeService($data)
		{
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$dish_id= $this -> encrypt_decrypt('decrypt',$data['fid']);
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select services_available  from employees where id=?");
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$services=$row['services_available'].','.$dish_id;
			
			$stmt = $dbCon->prepare("update employees set services_available=?  where id=?");
			$stmt->bind_param("si",$services, $_POST['id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		
		
		function removeEmployeeService($data)
		{
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$dish_id= $this -> encrypt_decrypt('decrypt',$data['fid']);
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select services_available  from employees where id=?");
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$services=$row['services_available'].',';
			$dish_id=$dish_id.',';
			$services= substr(str_replace($dish_id,"",$services),0,-1);
			$stmt = $dbCon->prepare("update employees set services_available=?  where id=?");
			$stmt->bind_param("si",$services, $_POST['id']);
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
		
		function bookableServiceCategories()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from bookable_service_categories");
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
		function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$country_id= $data['country_id'];
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=40");
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
		
		 
		  function addVariantToList($data)
		{
		$dbCon = AppModel::createConnection();
		$food_id= $this -> encrypt_decrypt('decrypt',$data['fid']);
		 $combination=substr($_POST['combination'],0,-1);
			$stmt = $dbCon->prepare("select count(id) as num from dish_variation_stock where dish_variant_combination=? and dish_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("si", $combination,$food_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']>0)
			{
			$stmt->close();
			$dbCon->close();
			return 0;	
			}
			else
			{
			$a=explode(',',$combination);
			$stmt = $dbCon->prepare("select min(id) as min_id,max(id) as max_id from dish_variants where dish_id=?");
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("i", $food_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			for($i=$row['min_id'];$i<=$row['max_id'];$i++)
			{
			$stmt = $dbCon->prepare("select sub_variants,is_active from dish_variants where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $i);
			$stmt->execute();
			$result2 = $stmt->get_result();
			$row2 = $result2->fetch_assoc();
			if($row2['is_active']==0)
			{
				continue;
			}
			$b=explode(',',$row2['sub_variants']);
			if (!(in_array($a[$cont], $b)))
			{
				$new_variant=$row2['sub_variants'].''.$a[$cont].',';
				$stmt = $dbCon->prepare("update dish_variants set sub_variants=? where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("si", $new_variant,$i);
				$stmt->execute();
			}
			$cont++;
			}
			$stmt = $dbCon->prepare("insert into dish_variation_stock(dish_id,dish_variant_combination,combination_price,combination_stock, created_on) values(?, ?, ?, ?, now())");
			$stmt->bind_param("isii",$food_id,$combination,$_POST['price'],$_POST['stock']);	
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
			}
		}
		
		function updateDishFoodDetail($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$food_id= $this -> encrypt_decrypt('decrypt',$data['fid']);
			 
			 $data1 = strip_tags($_POST['image-data1']);
			if($data1!='none')
			{
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			}
			else 
			{
				$img_name1="";
			}
			$variation_type=0;
			$variation_count=0;
			$dish_name=htmlentities($_POST['dish_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$dish_detail=htmlentities($_POST['dish_detail'],ENT_NOQUOTES, 'ISO-8859-1');
			$product_information=htmlentities($_POST['product_information'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("update dishes_detail_information set food_drink=?,hot_cold=?,dish_name=?, dish_detail=?, dish_image=?, dish_price=?,  dish_type=?, dish_warnings=?, modified_on=now(),variation_type=?,variation_count=?,product_information=? where id=?");
			$stmt->bind_param("iisssiisiisi",$_POST['food_drink'],$_POST['hot_cold'],$dish_name,$dish_detail ,$img_name1 ,$_POST['dish_price'], $_POST['dish_type'],$_POST['food_type'],$variation_type,$variation_count,$product_information,$food_id);
			
			
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
		
	 
		
		function editDishDetail($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$food_id= $this -> encrypt_decrypt('decrypt',$data['fid']);
			 
			 $data1 = strip_tags($_POST['image-data1']);
			if($data1!='none')
			{
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			}
			else 
			{
				$img_name1="";
			}
			if($_POST['subscription_info']==1)	
			{
			$recurring_type=0;
			$total_time=0;
			$recurring_typec=0;
			}
			else
			{
			$recurring_type=$_POST['recurring_type'];
			$total_time=$_POST['total_time'];
			$recurring_typec=$_POST['recurring_typec'];	
			}
			
			$stmt = $dbCon->prepare("update dish_marketplace_information set is_published=0 where service_id=?");
			$stmt->bind_param("i", $food_id);
			$stmt->execute();
			
			if($_POST['one_shared']==2)
			{
			if($_POST['one_shared_type']==2)
			{
			$_POST['dish_price']=$_POST['private_price'];
			}	
			else
			{
			$_POST['dish_price']=$_POST['open_price_per_person'];

			 
					if($_POST['recurring_event']==0)
					{
						 
						$event_date=strtotime($_POST['open_event_date']);
						$stmt = $dbCon->prepare("update dishes_detail_information set recurring_event=?,open_event_date=?,open_event_time=? where id=?");
						$stmt->bind_param("isii",$_POST['recurring_event'],$event_date,$_POST['event_start_time'],$food_id );	
						$stmt->execute();	
						
						
					}
					else
					{
						for($i=1;$i<=7;$i++)
						{
						$working_day='working_day_'.$i;
						$work_start_time='work_start_time_'.$i;
						$stmt = $dbCon->prepare("update dishes_detail_information set recurring_event=? where id=?");
						$stmt->bind_param("ii",$_POST['recurring_event'],$food_id );	
						$stmt->execute();	
						$stmt = $dbCon->prepare("update dish_service_recurring_information set event_day=?,event_start_time=? where day_id=? and dish_id=?");
						/* bind parameters for markers */
						$cont=1;
						$stmt->bind_param("iiii",$_POST[$working_day],$_POST[$work_start_time],$i,$food_id);
						$stmt->execute();	
						
							
						}
					}
			}
			}
			
			if(!isset($_POST['category_id']))
			{
				$_POST['category_id']=0;
				$_POST['subcategory_id']=0;
				$_POST['location_info']=0;
			}
			
			$dish_name=htmlentities($_POST['dish_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$dish_detail=htmlentities(strip_tags($_POST['product_information']),ENT_NOQUOTES, 'ISO-8859-1');
			$product_information=htmlentities($_POST['product_information'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("update dishes_detail_information set inclusion_detail=?,professional_category_id=?,professional_subcategory_id=?,tax_included=?,tax_amount=?,bookable_service_category_id=?, is_bookable=?,preparation_time=?,post_production_time=?,dish_name=?, dish_detail=?, dish_image=?, dish_price=?,  dish_type=?, dish_warnings=?, modified_on=now(),product_information=?,subscription_info=?,recurring_type=?,recurring_cycle=?,custom_cycle=?,custom_time=?,time_required=?,one_shared =?,   one_shared_type =?,  open_price_per_person =?,  open_total_person  =?,  total_open_events  =?,  private_price =?,  private_max_person =?,  event_at_customer_place  =?,  tour_fee_applicable  =?,  tour_fee =?,  total_private_events  =?,  more_event_on_request =?,  minimum_people_required  =?,  minimum_time_required  =?,  minimum_time_period  =?,  more_event_extra_fee  =?,  extra_fee =?  where id=?");
			$stmt->bind_param("iiiiiiiiisssiissiiiiiiiiiiiiiiiiiiiiiiii",$_POST['location_info'],$_POST['category_id'],$_POST['subcategory_id'],$_POST['tax_included'],$_POST['tax_amount'],$_POST['bookable_service_category_id'],$_POST['is_bookable'],$_POST['preparation_time'],$_POST['post_production_time'],$dish_name,$dish_detail ,$img_name1 ,$_POST['dish_price'], $_POST['dish_type'],$_POST['food_type'],$product_information,$_POST['subscription_info'],$recurring_type,$recurring_type,$recurring_typec,$total_time,$_POST['time_required'],$_POST['one_shared'] ,   $_POST['one_shared_type'] ,  $_POST['open_price_per_person'] ,  $_POST['open_total_person']  ,  $_POST['total_open_events']  ,  $_POST['private_price'] ,  $_POST['private_max_person'] ,  $_POST['event_at_customer_place']  ,  $_POST['tour_fee_applicable']  ,  $_POST['tour_fee'] ,  $_POST['total_private_events']  ,  $_POST['more_event_on_request'] ,  $_POST['minimum_people_required']  ,  $_POST['minimum_time_required']  ,  $_POST['minimum_time_period']  ,  $_POST['more_event_extra_fee']  ,  $_POST['extra_fee'],$food_id);
			
			
			if($stmt->execute())
			{
				$stmt = $dbCon->prepare("select count(id) as num  from dish_detail_photos where dish_id=?");
				$stmt->bind_param("i",$food_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowCount = $result->fetch_assoc();
				if($rowCount['num']==0)
				{
					$snumber=1;
					$stmt = $dbCon->prepare("insert into dish_detail_photos (dish_photo_path,dish_id,sorting_number) values(?, ?, ?)");
					$stmt->bind_param("sii",$img_name1, $food_id,$snumber);
					$stmt->execute();	
				}
				else
				{
				$stmt = $dbCon->prepare("update dish_detail_photos set dish_photo_path=? where dish_id=? and sorting_number=1");
				$stmt->bind_param("si",$img_name1, $food_id);
				$stmt->execute();		
				}
				
				
				$stmt = $dbCon->prepare("select pickapro_listing  from dishes_detail_information where id=?");
				$stmt->bind_param("i",$food_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				if($row['pickapro_listing']==1)
				{
				$stmt = $dbCon->prepare("update professional_company_selected_service_todos_price_info set inclusion_detail=?,professional_category_id=?,professional_subcategory_id=?,tax_included=?,tax_amount=?,bookable_service_category_id=?, is_bookable=?,preparation_time=?,post_production_time=?,dish_name=?, dish_detail=?, dish_image=?, dish_price=?,  dish_type=?, dish_warnings=?, modified_on=now(),product_information=?,subscription_info=?,recurring_type=?,recurring_cycle=?,custom_cycle=?,custom_time=?,time_required=?,one_shared =?,   one_shared_type =?,  open_price_per_person =?,  open_total_person  =?,  total_open_events  =?,  private_price =?,  private_max_person =?,  event_at_customer_place  =?,  tour_fee_applicable  =?,  tour_fee =?,  total_private_events  =?,  more_event_on_request =?,  minimum_people_required  =?,  minimum_time_required  =?,  minimum_time_period  =?,  more_event_extra_fee  =?,  extra_fee =?  where qloud_service_id=?");
				$stmt->bind_param("iiiiiiiiisssiissiiiiiiiiiiiiiiiiiiiiiiii",$_POST['location_info'],$_POST['category_id'],$_POST['subcategory_id'],$_POST['tax_included'],$_POST['tax_amount'],$_POST['bookable_service_category_id'],$_POST['is_bookable'],$_POST['preparation_time'],$_POST['post_production_time'],$dish_name,$dish_detail ,$img_name1 ,$_POST['dish_price'], $_POST['dish_type'],$_POST['food_type'],$product_information,$_POST['subscription_info'],$recurring_type,$recurring_type,$recurring_typec,$total_time,$_POST['time_required'],$_POST['one_shared'] ,   $_POST['one_shared_type'] ,  $_POST['open_price_per_person'] ,  $_POST['open_total_person']  ,  $_POST['total_open_events']  ,  $_POST['private_price'] ,  $_POST['private_max_person'] ,  $_POST['event_at_customer_place']  ,  $_POST['tour_fee_applicable']  ,  $_POST['tour_fee'] ,  $_POST['total_private_events']  ,  $_POST['more_event_on_request'] ,  $_POST['minimum_people_required']  ,  $_POST['minimum_time_required']  ,  $_POST['minimum_time_period']  ,  $_POST['more_event_extra_fee']  ,  $_POST['extra_fee'],$food_id);	
				$stmt->execute();
				$stmt = $dbCon->prepare("select id,professional_category_id as catg_id from professional_company_selected_service_todos_price_info where qloud_service_id=?");
				$stmt->bind_param("i", $food_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowCatg = $result->fetch_assoc();
				
				$_POST['inclusion_type_detail']=substr($_POST['inclusion_type_detail'],0,1);
				$a=explode(',',$_POST['inclusion_type_detail']);
				$stmt = $dbCon->prepare("update `qloudid`.`professional_company_selected_service_todos_price_available` set is_active=0 where price_id=?");
				$stmt->bind_param("i",$rowCatg['id']);
				$stmt->execute();
				 
				foreach($a as $key)
				{
				$stmt = $dbCon->prepare("update`qloudid`.`professional_company_selected_service_todos_price_available` set is_active=1 where price_id=? and `service_available`=?");
				$stmt->bind_param("ii",$rowCatg['id'], $key);
				$stmt->execute();	
				}
				
				
					if($_POST['one_shared']==2)
					{
					if($_POST['recurring_event']==0)
					{
						 
						$event_date=strtotime($_POST['open_event_date']);
						$stmt = $dbCon->prepare("update professional_company_selected_service_todos_price_info set recurring_event=?,open_event_date=?,open_event_time=? where id=?");
						$stmt->bind_param("isii",$_POST['recurring_event'],$event_date,$_POST['event_start_time'],$food_id );	
						$stmt->execute();	
						
						
					}
					else
					{
						for($i=1;$i<=7;$i++)
						{
						$working_day='working_day_'.$i;
						$work_start_time='work_start_time_'.$i;
						$stmt = $dbCon->prepare("update professional_company_selected_service_todos_price_info set recurring_event=? where id=?");
						$stmt->bind_param("ii",$_POST['recurring_event'],$food_id );	
						$stmt->execute();	
						$stmt = $dbCon->prepare("update professional_company_selected_service_todos_recurring_info set event_day=?,event_start_time=? where day_id=? and service_price_id=(select id from professional_company_selected_service_todos_price_info where qloud_service_id=?)");
						/* bind parameters for markers */
						$cont=1;
						$stmt->bind_param("iiii",$_POST[$working_day],$_POST[$work_start_time],$i,$food_id);
						$stmt->execute();	
						
							
						}
					}
			}
				}
				
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
		
		
		function addDishDetail($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			 $data1 = strip_tags($_POST['image-data1']);
			if($data1!='none')
			{
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			}
			else 
			{
				$img_name1="";
			}
			if($_POST['subscription_info']==1)	
			{
			$recurring_type=0;
			$total_time=0;
			$recurring_typec=0;
			}
			else
			{
			$recurring_type=$_POST['recurring_type'];
			$total_time=$_POST['total_time'];
			$recurring_typec=$_POST['recurring_typec'];	
			}
			
			 
			if($_POST['one_shared']==2)
			{
			if($_POST['one_shared_type']==2)
			{
			$_POST['dish_price']=$_POST['private_price'];
			}	
			else
			{
			$_POST['dish_price']=$_POST['open_price_per_person'];	
			}
			}  
			 $_POST['inclusion_type_detail']=$_POST['location_info'];
			$dish_name=htmlentities($_POST['dish_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$dish_detail=htmlentities(strip_tags($_POST['product_information']),ENT_NOQUOTES, 'ISO-8859-1');
			$product_information=htmlentities($_POST['product_information'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into dishes_detail_information(professional_category_id,professional_subcategory_id,inclusion_detail,tax_included,tax_amount,bookable_service_category_id, is_bookable,preparation_time,post_production_time,dish_name, dish_detail, dish_image, dish_price,  dish_type, dish_warnings, created_on, modified_on,company_id,variation_type,variation_count,product_information,is_physical,subscription_info,recurring_type,recurring_cycle,custom_cycle,custom_time,time_required, one_shared ,   one_shared_type ,  open_price_per_person ,  open_total_person  ,  total_open_events  ,  private_price ,  private_max_person ,  event_at_customer_place  ,  tour_fee_applicable  ,  tour_fee ,  total_private_events  ,  more_event_on_request ,  minimum_people_required  ,  minimum_time_required  ,  minimum_time_period  ,  more_event_extra_fee  ,  extra_fee,pickapro_listing)
			values(?,?,?,?,?,?, ?, ?,?,?, ?, ?, ?, ?, ?, now(),now(),?,?, ?, ?, ?,?,?, ?, ?, ?, ? ,?, ?, ?, ?, ? ,?, ?, ?, ?, ? ,?, ?, ?, ?, ?, ?, ?,?)");
			$stmt->bind_param("iisiiiiiisssiisiiisiiiiiiiiiiiiiiiiiiiiiiiii",$_POST['category_id'],$_POST['subcategory_id'],$_POST['inclusion_type_detail'],$_POST['tax_included'],$_POST['tax_amount'],$_POST['bookable_service_category_id'],$_POST['is_bookable'],$_POST['preparation_time'],$_POST['post_production_time'],$dish_name,$dish_detail ,$img_name1 ,$_POST['dish_price'], $_POST['dish_type'],$_POST['food_type'],$company_id,$_POST['variation_type'],$_POST['variation_count'],$product_information,$_POST['product_type'],$_POST['subscription_info'],$recurring_type,$recurring_type,$recurring_typec,$total_time,$_POST['time_required'],$_POST['one_shared'] ,   $_POST['one_shared_type'] ,  $_POST['open_price_per_person'] ,  $_POST['open_total_person']  ,  $_POST['total_open_events']  ,  $_POST['private_price'] ,  $_POST['private_max_person'] ,  $_POST['event_at_customer_place']  ,  $_POST['tour_fee_applicable']  ,  $_POST['tour_fee'] ,  $_POST['total_private_events']  ,  $_POST['more_event_on_request'] ,  $_POST['minimum_people_required']  ,  $_POST['minimum_time_required']  ,  $_POST['minimum_time_period']  ,  $_POST['more_event_extra_fee']  ,  $_POST['extra_fee'],$_POST['pickapro_listing'] );
			
			
			if($stmt->execute())
			{
				
				$id=$stmt->insert_id;
				$idEnc=$this -> encrypt_decrypt('decrypt',$id);
				$snumber=1;
				$stmt = $dbCon->prepare("insert into dish_detail_photos (dish_photo_path,dish_id,sorting_number) values(?, ?, ?)");
				$stmt->bind_param("sii",$img_name1, $id,$snumber);
				$stmt->execute();
				
				if($_POST['one_shared']==2)
				{
					if($_POST['one_shared_type']!=2)
					{
					if($_POST['recurring_event']==0)
					{
						$event_date=strtotime($_POST['open_event_date']);
						$stmt = $dbCon->prepare("update dishes_detail_information set recurring_event=?,open_event_date=?,open_event_time=? where id=?");
						$stmt->bind_param("isii",$_POST['recurring_event'],$event_date,$_POST['event_start_time'],$id );	
						$stmt->execute();	
					}
					else
					{
						for($i=1;$i<=7;$i++)
						{
						$working_day='working_day_'.$i;
						$work_start_time='work_start_time_'.$i;
						$stmt = $dbCon->prepare("update dishes_detail_information set recurring_event=? where id=?");
						$stmt->bind_param("ii",$_POST['recurring_event'],$id );	
						$stmt->execute();	
						$stmt = $dbCon->prepare("insert into dish_service_recurring_information (day_id,dish_id,event_day,event_start_time) values(?, ?, ?,?)");
						/* bind parameters for markers */
						$cont=1;
						$stmt->bind_param("iiii",$i,$id,$_POST[$working_day],$_POST[$work_start_time]);
						$stmt->execute();	
						
							
						}
					}
					}
				}
				
				
			if($_POST['product_type']==2 && $_POST['pickapro_listing']==1)
			{
			$stmt = $dbCon->prepare("insert into professional_company_selected_service_todos_price_info(tax_included,tax_amount,bookable_service_category_id, is_bookable,preparation_time,post_production_time,dish_name, dish_detail, dish_image, dish_price,  dish_type, dish_warnings, created_on, modified_on,company_id,variation_type,variation_count,product_information,is_physical,subscription_info,recurring_type,recurring_cycle,custom_cycle,custom_time,time_required, one_shared ,   one_shared_type ,  open_price_per_person ,  open_total_person  ,  total_open_events  ,  private_price ,  private_max_person ,  event_at_customer_place  ,  tour_fee_applicable  ,  tour_fee ,  total_private_events  ,  more_event_on_request ,  minimum_people_required  ,  minimum_time_required  ,  minimum_time_period  ,  more_event_extra_fee  ,  extra_fee,professional_category_id,professional_subcategory_id,qloud_service_id)
			values(?,?,?, ?, ?,?,?, ?, ?, ?, ?, ?, now(),now(),?,?, ?, ?, ?,?,?, ?, ?, ?, ? ,?, ?, ?, ?, ? ,?, ?, ?, ?, ? ,?, ?, ?, ?, ?, ?, ?,?,?,?)");
			$stmt->bind_param("iiiiiisssiisiiisiiiiiiiiiiiiiiiiiiiiiiiiiii",$_POST['tax_included'],$_POST['tax_amount'],$_POST['bookable_service_category_id'],$_POST['is_bookable'],$_POST['preparation_time'],$_POST['post_production_time'],$dish_name,$dish_detail ,$img_name1 ,$_POST['dish_price'], $_POST['dish_type'],$_POST['food_type'],$company_id,$_POST['variation_type'],$_POST['variation_count'],$product_information,$_POST['product_type'],$_POST['subscription_info'],$recurring_type,$recurring_type,$recurring_typec,$total_time,$_POST['time_required'],$_POST['one_shared'] ,   $_POST['one_shared_type'] ,  $_POST['open_price_per_person'] ,  $_POST['open_total_person']  ,  $_POST['total_open_events']  ,  $_POST['private_price'] ,  $_POST['private_max_person'] ,  $_POST['event_at_customer_place']  ,  $_POST['tour_fee_applicable']  ,  $_POST['tour_fee'] ,  $_POST['total_private_events']  ,  $_POST['more_event_on_request'] ,  $_POST['minimum_people_required']  ,  $_POST['minimum_time_required']  ,  $_POST['minimum_time_period']  ,  $_POST['more_event_extra_fee']  ,  $_POST['extra_fee'],$_POST['category_id'],$_POST['subcategory_id'],$id );
			
			
			if($stmt->execute())
			{
				
				$id1=$stmt->insert_id;
				$_POST['inclusion_type_detail']=substr($_POST['inclusion_type_detail'],0,1);
				$a=explode(',',$_POST['inclusion_type_detail']);
				for($up=1;$up<=3;$up++)
				{
					$stmt = $dbCon->prepare("insert into `qloudid`.`professional_company_selected_service_todos_price_available`(price_id,`service_available`) values (?,?)");
					$stmt->bind_param("ii",$id1, $up);
					$stmt->execute();
				}
				foreach($a as $key)
				{
				$stmt = $dbCon->prepare("update`qloudid`.`professional_company_selected_service_todos_price_available` set is_active=1 where price_id=? and `service_available`=?");
				$stmt->bind_param("ii",$id1, $key);
				$stmt->execute();	
				}
				if($_POST['one_shared']==2)
				{
					if($_POST['one_shared_type']!=2)
					{
					if($_POST['recurring_event']==0)
					{
						$event_date=strtotime($_POST['open_event_date']);
						$stmt = $dbCon->prepare("update professional_company_selected_service_todos_price_info set recurring_event=?,open_event_date=?,open_event_time=? where id=?");
						$stmt->bind_param("isii",$_POST['recurring_event'],$event_date,$_POST['event_start_time'],$id1 );	
						$stmt->execute();	
					}
					else
					{
						for($i=1;$i<=7;$i++)
						{
						$working_day='working_day_'.$i;
						$work_start_time='work_start_time_'.$i;
						$stmt = $dbCon->prepare("update professional_company_selected_service_todos_price_info set recurring_event=? where id=?");
						$stmt->bind_param("ii",$_POST['recurring_event'],$id1 );	
						$stmt->execute();	
						$stmt = $dbCon->prepare("insert into professional_company_selected_service_todos_recurring_info(day_id,service_price_id,event_day,event_start_time) values(?, ?, ?,?)");
						/* bind parameters for markers */
						$cont=1;
						$stmt->bind_param("iiii",$i,$id1,$_POST[$working_day],$_POST[$work_start_time]);
						$stmt->execute();	
						
							
						}
					}
					}
				}
				}
			}
				if($_POST['variation_type']==0)
				{
				$stmt->close();
				$dbCon->close();
				return $idEnc;
				}
				else 
				{
					 
					if($_POST['variation_count']==1)
					{
						$sub=$_POST['selected_variation1'].',';
					$stmt = $dbCon->prepare("insert into dish_variants(dish_id,variant_id,sub_variants,created_on)
					values(?, ?, ?,now())");
					$stmt->bind_param("iis",$id,$_POST['variation_id1'],$sub);	
					$stmt->execute();
					$a=explode(',',$_POST['selected_variation1']);
					foreach($a as $key)
					{
						$stock='stock'.$key;
						$price='sprice'.$key;
						$stmt = $dbCon->prepare("insert into dish_variation_stock(dish_id,dish_variant_combination,combination_price,combination_stock, created_on) values(?, ?, ?, ?, now())");
						$stmt->bind_param("isii",$id,$key,$_POST[$price],$_POST[$stock]);	
						$stmt->execute();
					}
					}
					else if($_POST['variation_count']==2)
					{
					$sub=$_POST['selected_variation1'].',';
					$stmt = $dbCon->prepare("insert into dish_variants(dish_id,variant_id,sub_variants,created_on)
					values(?, ?, ?,now())");
					$stmt->bind_param("iis",$id,$_POST['variation_id1'],$sub);	
					$stmt->execute();
					$sub=$_POST['selected_variation2'].',';
					$stmt = $dbCon->prepare("insert into dish_variants(dish_id,variant_id,sub_variants,created_on)
					values(?, ?, ?,now())");
					$stmt->bind_param("iis",$id,$_POST['variation_id2'],$sub);	
					$stmt->execute();
					$a=explode(',',$_POST['selected_variation1']);
					$b=explode(',',$_POST['selected_variation2']);
					foreach($a as $key)
					{
						foreach($b as $key1)
						{
						$stock='stock'.$key.'_'.$key1;
						$price='sprice'.$key.'_'.$key1;
						$combi=$key.','.$key1;
						$stmt = $dbCon->prepare("insert into dish_variation_stock(dish_id,dish_variant_combination,combination_price,combination_stock, created_on) values(?, ?, ?, ?, now())");
						$stmt->bind_param("isii",$id,$combi,$_POST[$price],$_POST[$stock]);	
						$stmt->execute();
						}
					}
					}
					else if($_POST['variation_count']==3)
					{
					$sub=$_POST['selected_variation1'].',';
					$stmt = $dbCon->prepare("insert into dish_variants(dish_id,variant_id,sub_variants,created_on)
					values(?, ?, ?,now())");
					$stmt->bind_param("iis",$id,$_POST['variation_id1'],$sub);	
					$stmt->execute();
					$sub=$_POST['selected_variation2'].',';
					$stmt = $dbCon->prepare("insert into dish_variants(dish_id,variant_id,sub_variants,created_on)
					values(?, ?, ?,now())");
					$stmt->bind_param("iis",$id,$_POST['variation_id2'],$sub);	
					$stmt->execute();
					$sub=$_POST['selected_variation3'].',';
					$stmt = $dbCon->prepare("insert into dish_variants(dish_id,variant_id,sub_variants,created_on)
					values(?, ?, ?,now())");
					$stmt->bind_param("iis",$id,$_POST['variation_id3'],$sub);	
					$stmt->execute();
					$a=explode(',',$_POST['selected_variation1']);
					$b=explode(',',$_POST['selected_variation2']);
					$c=explode(',',$_POST['selected_variation3']);
					foreach($a as $key)
					{
						foreach($b as $key1)
						{
							foreach($c as $key2)
							{
						$stock='stock'.$key.'_'.$key1.'_'.$key2;
						$price='sprice'.$key.'_'.$key1.'_'.$key2;
						$combi=$key.','.$key1.','.$key2;
						$stmt = $dbCon->prepare("insert into dish_variation_stock(dish_id,dish_variant_combination,combination_price,combination_stock, created_on) values(?, ?, ?, ?, now())");
						$stmt->bind_param("isii",$id,$combi,$_POST[$price],$_POST[$stock]);	
						$stmt->execute();
							}
						}
					}
					}
				}
				
				$stmt->close();
				$dbCon->close();
				return $idEnc;
			}
			else
			{
				 
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		
			
		}
		
	 function addDishFoodDetail($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			 $data1 = strip_tags($_POST['image-data1']);
			if($data1!='none')
			{
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			}
			else 
			{
				$img_name1="";
			}
			$variation_type=0;
			$variation_count=0;
			$dish_name=htmlentities($_POST['dish_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$dish_detail=htmlentities($_POST['dish_detail'],ENT_NOQUOTES, 'ISO-8859-1');
			$product_information=htmlentities($_POST['product_information'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into dishes_detail_information(food_drink,hot_cold,dish_name, dish_detail, dish_image, dish_price,  dish_type, dish_warnings, created_on, modified_on,company_id,variation_type,variation_count,product_information)
			values(?, ?, ?, ?, ?, ?, ?, ?, now(),now(),?,?, ?,?)");
			$stmt->bind_param("iisssiisiiis",$_POST['food_drink'],$_POST['hot_cold'],$dish_name,$dish_detail ,$img_name1 ,$_POST['dish_price'], $_POST['dish_type'],$_POST['food_type'],$company_id,$variation_type,$variation_count,$product_information);
			
			
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
		
		
		
		function appId()
		{
			
			return $this -> encrypt_decrypt('encrypt',40);
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
		function foodTypeInformation()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,food_type from food_type");
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
	 
	 function foodTypeInformationSelected($data)
		{
			$dbCon = AppModel::createConnection();
			$food_id= $this -> encrypt_decrypt('decrypt',$data['fid']);
			$food_warning=explode(',',$data['warning']);
			 
			$stmt = $dbCon->prepare("select id,food_type from food_type");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $food_warning))
				{
				$org[$j]['is_selected']= 1;
				}
				else
				{
				$org[$j]['is_selected']= 0;	
				}
				$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function variationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,variation_name from product_variation where company_id=?");
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
		
		function selectedVariationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$food_id= $this -> encrypt_decrypt('decrypt',$data['fid']);
			$stmt = $dbCon->prepare("select variation_count from dishes_detail_information where id=?");
			$stmt->bind_param("i", $food_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_count = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select variant_id,sub_variants,variation_name from dish_variants left join product_variation on dish_variants.variant_id=product_variation.id where dish_id=? and is_active=1");
			$stmt->bind_param("i", $food_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$i=1;
			$org='';
			while($row = $result->fetch_assoc())
			{ 
				$stmt = $dbCon->prepare("select id,subvariation_name from product_sub_variation where variation_id=?");
				$stmt->bind_param("i", $row['variant_id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$option='<option value="0">Select</option>';
				while($row1 = $result1->fetch_assoc())
				{ 
				$option=$option.'<option value="'.$row1['id'].'">'.$row1['subvariation_name'].'</option>';
				}
				
				$org=$org.'<div class="on_clmn  mart20">	
					<div class="pos_rel talc">
						<select name="sub_variation_'.$i.'" id="sub_variation_'.$i.'"  class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"   onchange="checkCombination(this.value);" > 
						'.$option.'
						</select>
						<label for="sub_variation_'.$i.'" class="floating__label tall nobold" data-content="'.$row['variation_name'].'" >
						<span class="hidden--visually">
						'.$row['variation_name'].'</span></label>
						</div>
						</div>';
						$i++;
			}
			
			$org=$org.'<div class="on_clmn mart20">
											 
											<div class="pos_rel">
												
												
												<input type="number" name="variant_price" id="variant_price" placeholder="Price" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" value="0" min=0 /> 
												<label for="variant_price" class="floating__label tall nobold" data-content="Price" >
											<span class="hidden--visually">
											Price</span></label>
											</div>
											 
										 
										</div>
										<div class="on_clmn mart20">
											 
											<div class="pos_rel">
												
												
												<input type="number" name="variant_stock" id="variant_stock" placeholder="Stock" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" value="0" min=0 /> 
												<label for="variant_stock" class="floating__label tall nobold" data-content="Stock" >
											<span class="hidden--visually">
											Stock</span></label>
											</div>
											 
										 
										</div>
										<input type="hidden" id="variation_count" name="variation_count" value="'.$row_count['variation_count'].'" />
										
										';
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function editableVariationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$food_id= $this -> encrypt_decrypt('decrypt',$data['fid']);
			$stmt = $dbCon->prepare("select variation_count from dishes_detail_information where id=?");
			$stmt->bind_param("i", $food_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_count = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select count(id) as num from dish_variants where dish_id=? and is_active=0");
			/* bind parameters for markers */
			$stmt->bind_param("i",$food_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowInactive = $result->fetch_assoc();
			$totalActive=$row_count['variation_count']-$rowInactive['num'];
			if($rowInactive['num']==0) $inActive='hidden'; else $inActive='';
			$stmt = $dbCon->prepare("select variant_id,sub_variants,variation_name from dish_variants left join product_variation on dish_variants.variant_id=product_variation.id where dish_id=? and is_active=0");
			$stmt->bind_param("i", $food_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$i=1;
			$newVariation='';
			while($row = $result->fetch_assoc())
			{ 
				$stmt = $dbCon->prepare("select id,subvariation_name from product_sub_variation where variation_id=?");
				$stmt->bind_param("i", $row['variant_id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$option='<option value="0">Select</option>';
				while($row1 = $result1->fetch_assoc())
				{ 
				$option=$option.'<option value="'.$row1['id'].'">'.$row1['subvariation_name'].'</option>';
				}
				
				$newVariation=$newVariation.'<div class="on_clmn  mart20 hidden" id="variation'.$i.'">
				<div class="thr_clmn wi_50 padr10">
					<div class="pos_rel talc">
						<select name="variation_'.$i.'" id="variation_'.$i.'"  class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"> 
							<option value="'.$row['variant_id'].'">'.$row['variation_name'].'</option>
						</select>
						<label for="sub_variation_'.$i.'" class="floating__label tall nobold" data-content="Variation" >
						<span class="hidden--visually">
						Variation</span></label>
						</div>
						</div>
					<div class="thr_clmn wi_50 padl10">
					<div class="pos_rel talc">
						<select name="sub_variation_'.$i.'" id="sub_variationn_'.$i.'"  class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"> 
						'.$option.'
						</select>
						<label for="sub_variation_'.$i.'" class="floating__label tall nobold" data-content="Sub-Variation" >
						<span class="hidden--visually">
						Sub-Variation</span></label>
						</div>
						</div>
						</div>';
						$i++;
			}
			
			
			
			$stmt = $dbCon->prepare("select variant_id,sub_variants,variation_name from dish_variants left join product_variation on dish_variants.variant_id=product_variation.id where dish_id=? and is_active=1");
			$stmt->bind_param("i", $food_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$i=1;
			$option='';
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{ 
				$stmt = $dbCon->prepare("select id,subvariation_name from product_sub_variation where find_in_set(id,?)");
				$stmt->bind_param("s", $row['sub_variants']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$option.$i='<div class="on_clmn brdb">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="'.$row['variation_name'].'" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div><div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10">';
				while($row1 = $result1->fetch_assoc())
				{ 
				$option.$i=$option.$i.'<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
											<div class="on_clmn">	
											<div class="thr_clmn wi_80">	
												<div class="pos_rel talc">
															<input type="button" value="'.$row1['subvariation_name'].'" class="wi_100 mart5 maxwi_100   hei_40p diblock nobrd  red_ff2828_bg  fsz18 white_txt curp ffamily_avenir" >
															</div>
															</div>
															<div class="thr_clmn wi_20">	
												<div class="pos_rel talc">
															<input type="button" value="X" class="wi_100 mart5 maxwi_100   hei_40p diblock nobrd  red_ff2828_bg  fsz18 white_txt curp ffamily_avenir" onclick="deleteOption('.$row['variant_id'].','.$row1['id'].')">
															</div>
															</div>
															</div>
															
														</div>';
														$j++;
				}
				
				 $org=$org.''.$option.$i.'</div>';
				 $i++;
			}
			 
			 $org=$org.'<input type="hidden" name="sub_variant_count" id="sub_variant_count" value="'.$j.'"/>
			 '.$newVariation.'
			 
			 <div class="on_clmn tall padt20 '.$inActive.'" id="addNewVariationInfo">
				<input type="button" value="Add new variation" class="wi_300p maxwi_100   hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp bold" onclick="addAvailableVariant();">
				
			</div>
			<input type="hidden" name="addedVariation" id="addedVariation" value=0 />
			<input type="hidden" name="activeVariation" id="activeVariation" value="'.$totalActive.'" />
			<input type="hidden" name="totalVariation" id="totalVariation" value="'.$row_count['variation_count'].'" />
			';
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		function updateRow()
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("update dish_variation_stock set combination_price=?,combination_stock=? where id=?");
			$stmt->bind_param("iii", $_POST['price'],$_POST['stock'],$_POST['id']);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function updateVariation($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);	
		$food_id= $this -> encrypt_decrypt('decrypt',$data['fid']);
		$totalActive=$_POST['activeVariation'];
		 if($_POST['addedVariation']==1)
		{
			$varCombi=$_POST['sub_variation_1'];
			$variationSub=$varCombi.',';
			$stmt = $dbCon->prepare("update dish_variants set sub_variants=?,is_active=1 where variant_id=? and dish_id=?");
			$stmt->bind_param("sii",$variationSub,$_POST['variation_1'],$food_id);	
			$stmt->execute();	
		}
		else if($_POST['addedVariation']==2)
		{
			$varCombi=$_POST['sub_variation_1'].','.$_POST['sub_variation_2'];
			$variationSub1=$_POST['sub_variation_1'].',';
			$variationSub2=$_POST['sub_variation_2'].',';
			$stmt = $dbCon->prepare("update dish_variants set sub_variants=?,is_active=1 where variant_id=? and dish_id=?");
			$stmt->bind_param("sii",$variationSub1,$_POST['variation_1'],$food_id);	
			$stmt->execute();	
			$stmt = $dbCon->prepare("update dish_variants set sub_variants=?,is_active=1 where variant_id=? and dish_id=?");
			$stmt->bind_param("sii",$variationSub2,$_POST['variation_2'],$food_id);	
			$stmt->execute();	
		}
		
		$stmt = $dbCon->prepare("select id,dish_variant_combination from dish_variation_stock where dish_id=?");
			/* bind parameters for markers */
		$stmt->bind_param("i",$food_id);
		$stmt->execute();
		$result = $stmt->get_result();
		while($rowActive = $result->fetch_assoc())
		{
		$dish_variant=$rowActive['dish_variant_combination'].','.$varCombi;	
		$stmt = $dbCon->prepare("update dish_variation_stock set dish_variant_combination=? where id=?");
			/* bind parameters for markers */
		$stmt->bind_param("si",$dish_variant,$rowActive['id']);
		$stmt->execute();
	 
		}
		 
		$stmt->close();
		$dbCon->close();
		return 1; 
		}
		
		function deleteRow()
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select dish_variant_combination,dish_id from dish_variation_stock where id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("select count(id) as num from dish_variation_stock where dish_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $row['dish_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCount = $result->fetch_assoc();
			 
			if($rowCount['num']==0)
			{
			$stmt->close();
			$dbCon->close();
			return 0;
			}
			
			$a=explode(',',$row['dish_variant_combination']);
			$stmt = $dbCon->prepare("delete from dish_variation_stock where id=?");
			$stmt->bind_param("i",$_POST['id']);
			$stmt->execute();
			foreach($a as $key)
			{
				 
			$stmt = $dbCon->prepare("select count(id) as num from dish_variation_stock where find_in_set(?,dish_variant_combination) and dish_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $key,$row['dish_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowC = $result->fetch_assoc();
			 
			if($rowC['num']==0)
			{
				
			$stmt = $dbCon->prepare("select id,sub_variants from dish_variants where find_in_set(?,sub_variants) and dish_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $key,$row['dish_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();	
			  
			$newValue=str_replace($key.',',"",$row['sub_variants']);
			 
			$stmt = $dbCon->prepare("update dish_variants set sub_variants=? where id=?");
			$stmt->bind_param("si",$newValue,$row['id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select id,sub_variants from dish_variants where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",$row['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowS = $result->fetch_assoc();	
			if($rowS['sub_variants']=='' || $rowS['sub_variants']==null)
			{
			$stmt = $dbCon->prepare("update dish_variants set is_active=0 where id=?");
			$stmt->bind_param("i",$row['id']);
			$stmt->execute();	
			}
			}
			}			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		 
		function deleteOption($data)
		{
			$dbCon = AppModel::createConnection();
			$food_id= $this -> encrypt_decrypt('decrypt',$data['fid']);
			$stmt = $dbCon->prepare("select id,sub_variants from dish_variants where find_in_set(?,sub_variants) and dish_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['sub_variant_id'],$food_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();	
			   
			$newValue=str_replace($_POST['sub_variant_id'].',',"",$row['sub_variants']);
			 
			$stmt = $dbCon->prepare("update dish_variants set sub_variants=? where id=?");
			$stmt->bind_param("si",$newValue,$row['id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from dish_variation_stock where find_in_set(?,dish_variant_combination) and dish_id=?");
			$stmt->bind_param("ii",$_POST['sub_variant_id'],$food_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select id,sub_variants from dish_variants where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",$row['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowS = $result->fetch_assoc();	
			if($rowS['sub_variants']=='' || $rowS['sub_variants']==null)
			{
			$stmt = $dbCon->prepare("update dish_variants set is_active=0 where id=?");
			$stmt->bind_param("i",$row['id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("select id,sub_variants from dish_variants where dish_id=? and is_active=1");
			/* bind parameters for markers */
			$stmt->bind_param("i",$food_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			 
			while($rowV = $result->fetch_assoc())
			{
				$a=explode(',',substr($rowV['sub_variants'],0,-1));
				array_push($org,$a);
			}	
			$stmt = $dbCon->prepare("select dish_price,variation_count from dishes_detail_information where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",$food_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowActive = $result->fetch_assoc();	
			
			$stmt = $dbCon->prepare("select count(id) as num from dish_variants where dish_id=? and is_active=0");
			/* bind parameters for markers */
			$stmt->bind_param("i",$food_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowInactive = $result->fetch_assoc();
			$totalActive=$rowActive['variation_count']-$rowInactive['num'];
			 
			if($totalActive==1)
			{
				foreach($org[0] as $key)
				{
						$stock=0;
						$combi=$key;
						$stmt = $dbCon->prepare("insert into dish_variation_stock(dish_id,dish_variant_combination,combination_price,combination_stock, created_on) values(?, ?, ?, ?, now())");
						$stmt->bind_param("isii",$food_id,$combi,$rowActive['dish_price'],$stock);	
						$stmt->execute();	
				}
			}
			else if($totalActive==2)
			{
				foreach($org[0] as $key)
				{
					 
					foreach($org[1] as $key1)
						{
						$stock=0;	
						$combi=$key.','.$key1;
						$stmt = $dbCon->prepare("insert into dish_variation_stock(dish_id,dish_variant_combination,combination_price,combination_stock, created_on) values(?, ?, ?, ?, now())");
						$stmt->bind_param("isii",$food_id,$combi,$rowActive['dish_price'],$stock);	
						$stmt->execute();
						}						
				}
			}
			else if($totalActive==3)
			{
				foreach($org[0] as $key)
				{
					foreach($org[1] as $key1)
						{
							foreach($org[2] as $key2)
								{
								$stock=0;	
								$combi=$key.','.$key1.','.$key2;
								$stmt = $dbCon->prepare("insert into dish_variation_stock(dish_id,dish_variant_combination,combination_price,combination_stock, created_on) values(?, ?, ?, ?, now())");
								$stmt->bind_param("isii",$food_id,$combi,$rowActive['dish_price'],$stock);	
								$stmt->execute();
								}
						}						
				}
			}
			}			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		function createVariationInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			if($_POST['variation_count']==1)
			{
				$a=implode(',', $_POST['value1']);
				//print_r($a); die;
				$stmt = $dbCon->prepare("select id,subvariation_name from product_sub_variation where find_in_set(id,?)");
			$stmt->bind_param("s", $a);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_50 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Variant" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Price" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
									
									<div class="thr_clmn  wi_25 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Stock" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										</div>';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				$org=$org.'<div class="on_clmn  mart20  ">	
									<div class="thr_clmn  wi_50 padr10">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="'.$row['subvariation_name'].'" class="wi_100 rbrdr pad10 padb0    tall  minhei_55p fsz18 black_txt ffamily_avenir" >
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25 padrl10">
											 
										<div class="pos_rel talc">
									
										<input type="number" value="'.$_POST['variation_price'].'" min="0" id="sprice'.$row['id'].'" name="sprice'.$row['id'].'" class="wi_100 rbrdr pad10 padb0  brdb_new tall  minhei_55p fsz18 black_txt ffamily_avenir" >
										 
									</div>
									</div>
									
									<div class="thr_clmn  wi_25 padl10">
											 
										<div class="pos_rel talc">
									
										<input type="number" value="0"  min="0" id="stock'.$row['id'].'" name="stock'.$row['id'].'" class="wi_100 rbrdr pad10 padb0  brdb_new tall  minhei_55p fsz18 black_txt ffamily_avenir" >
										 
									</div>
									</div>
										</div>';
			}
			}
			 
			 else if($_POST['variation_count']==2)
			{
				$a=implode(',', $_POST['value1']);
				$b=implode(',', $_POST['value2']);
				//print_r($a); die;
				$stmt = $dbCon->prepare("select id,subvariation_name from product_sub_variation where find_in_set(id,?)");
			$stmt->bind_param("s", $a);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_50 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Variant" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Price" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
									
									<div class="thr_clmn  wi_25 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Stock" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										</div>';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select id,subvariation_name from product_sub_variation where find_in_set(id,?)");
			$stmt->bind_param("s", $b);
			$stmt->execute();
			$result1 = $stmt->get_result();
			while($row1 = $result1->fetch_assoc())
			{
				$org=$org.'<div class="on_clmn  mart20  ">	
									<div class="thr_clmn  wi_50 padr10">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="'.$row['subvariation_name'].','.$row1['subvariation_name'].'" class="wi_100 rbrdr pad10 padb0    tall  minhei_55p fsz18 black_txt ffamily_avenir" >
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25 padrl10">
											 
										<div class="pos_rel talc">
									
										<input type="number" value="'.$_POST['variation_price'].'" min="0" id="sprice'.$row['id'].'_'.$row1['id'].'" name="sprice'.$row['id'].'_'.$row1['id'].'" class="wi_100 rbrdr pad10 padb0  brdb_new tall  minhei_55p fsz18 black_txt ffamily_avenir" >
										 
									</div>
									</div>
									
									<div class="thr_clmn  wi_25 padl10">
											 
										<div class="pos_rel talc">
									
										<input type="number" value="0"  min="0" id="stock'.$row['id'].'_'.$row1['id'].'" name="stock'.$row['id'].'_'.$row1['id'].'" class="wi_100 rbrdr pad10 padb0  brdb_new tall  minhei_55p fsz18 black_txt ffamily_avenir" >
										 
									</div>
									</div>
										</div>';
			}
			}
			}
			 
			  else if($_POST['variation_count']==3)
			{
				$a=implode(',', $_POST['value1']);
				$b=implode(',', $_POST['value2']);
				$c=implode(',', $_POST['value3']);
				//print_r($a); die;
				$stmt = $dbCon->prepare("select id,subvariation_name from product_sub_variation where find_in_set(id,?)");
			$stmt->bind_param("s", $a);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_50 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Variant" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Price" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
									
									<div class="thr_clmn  wi_25 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Stock" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										</div>';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select id,subvariation_name from product_sub_variation where find_in_set(id,?)");
			$stmt->bind_param("s", $b);
			$stmt->execute();
			$result1 = $stmt->get_result();
			while($row1 = $result1->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select id,subvariation_name from product_sub_variation where find_in_set(id,?)");
			$stmt->bind_param("s", $c);
			$stmt->execute();
			$result2= $stmt->get_result();
			while($row2 = $result2->fetch_assoc())
			{
				$org=$org.'<div class="on_clmn  mart20  ">	
									<div class="thr_clmn  wi_50 padr10">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="'.$row['subvariation_name'].','.$row1['subvariation_name'].','.$row2['subvariation_name'].'" class="wi_100 rbrdr pad10 padb0    tall  minhei_55p fsz18 black_txt ffamily_avenir" >
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25 padrl10">
											 
										<div class="pos_rel talc">
									
										<input type="number" value="'.$_POST['variation_price'].'" min="0" id="sprice'.$row['id'].'_'.$row1['id'].'_'.$row2['id'].'" name="sprice'.$row['id'].'_'.$row1['id'].'_'.$row2['id'].'" class="wi_100 rbrdr pad10 padb0  brdb_new tall  minhei_55p fsz18 black_txt ffamily_avenir" >
										 
									</div>
									</div>
									
									<div class="thr_clmn  wi_25 padl10">
											 
										<div class="pos_rel talc">
									
										<input type="number" value="0"  min="0" id="stock'.$row['id'].'_'.$row1['id'].'_'.$row2['id'].'" name="stock'.$row['id'].'_'.$row1['id'].'_'.$row2['id'].'" class="wi_100 rbrdr pad10 padb0  brdb_new tall  minhei_55p fsz18 black_txt ffamily_avenir" >
										 
									</div>
									</div>
										</div>';
			}
			}
			}
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function availableVariationInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$food_id= $this -> encrypt_decrypt('decrypt',$data['fid']);
			$org='<div class="on_clmn  mart20">	
									 
									<div class="thr_clmn  wi_25 fright">
											 
										<div class="pos_rel talc">
									
										<a href="#" class="show_popup_modal" data-target="#gratis_popup_edit_variation">	<input type="text" value="Edit options" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly=""></a>
										 
									</div>
									</div>
									<div class="thr_clmn  wi_25 fright">
											 
										<div class="pos_rel talc">
									
									<a href="#" class="show_popup_modal" data-target="#gratis_popup_variation">	<input type="text" value="Add variant" class="wi_100 rbrdr pad10 padb0 show_popup_modal  tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="" data-target="#gratis_popup_variation"></a>
										 
									</div>
									</div>
										</div>
										
										<div class="on_clmn  mart10  brdb">	
									<div class="thr_clmn  wi_40 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Variant" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_15 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Price" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
									
									<div class="thr_clmn  wi_15 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Stock" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
									<div class="thr_clmn  wi_15 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Edit" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
									<div class="thr_clmn  wi_15 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Delete" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										</div>';
			 $stmt = $dbCon->prepare("select id,dish_variant_combination,combination_price,combination_stock from dish_variation_stock where dish_id=?");
			$stmt->bind_param("i", $food_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select id,subvariation_name  from product_sub_variation where find_in_set(id,?)");
				$stmt->bind_param("s", $row['dish_variant_combination']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$variant='';
				while($row1 = $result1->fetch_assoc())
				{
				$variant=$variant.''.$row1['subvariation_name'].',';	
				}
				
					$org=$org.'<div class="on_clmn  mart20  " id="'.$row['id'].'">	
									<div class="thr_clmn  wi_40 padr10">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="'.substr($variant,0,-1).'" class="wi_100 rbrdr pad10 padb0    tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly /> 
										 
									</div>
									</div>
										<div class="thr_clmn  wi_15 padl10">
											 
										<div class="pos_rel talc">
									
										<input type="number" value="'.$row['combination_price'].'" min="0" id="sprice'.$row['id'].'" name="sprice'.$row['id'].'" class="wi_100 rbrdr pad10 padb0  brdb_new tall  minhei_55p fsz18 black_txt ffamily_avenir" >
										 
									</div>
									</div>
									
									<div class="thr_clmn  wi_15 padl10">
											 
										<div class="pos_rel talc">
									
										<input type="number" value="'.$row['combination_stock'].'"  min="0" id="stock'.$row['id'].'" name="stock'.$row['id'].'" class="wi_100 rbrdr pad10 padb0  brdb_new tall  minhei_55p fsz18 black_txt ffamily_avenir" >
										 
									</div>
									</div>
									<div class="thr_clmn  wi_15 ">
											 
										<div class="pos_rel talc">
									
										<a href="javascript:void(0);" onclick="updateRow('.$row['id'].');"><li class="fas fa-edit padt20"></li></a>
										 
									</div>
									</div>
									<div class="thr_clmn  wi_15 ">
											 
										<div class="pos_rel talc">
									
										<a href="javascript:void(0);" onclick="deleteRow('.$row['id'].');"><li class="fas fa-trash padt20"></li></a>
										 
									</div>
									</div>
										</div>';
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		function selectSubvariation()
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select id,subvariation_name from product_sub_variation where variation_id=?");
			$stmt->bind_param("i", $_POST['variation_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<option value="'.$row['id'].'">'.$row['subvariation_name'].'</option>';
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		 
		function selectedDish($data)
		{
			$dbCon = AppModel::createConnection();
			$food_id= $this -> encrypt_decrypt('decrypt',$data['fid']);
			 
			$stmt = $dbCon->prepare("select * from dishes_detail_information where id=?");
			$stmt->bind_param("i", $food_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
			}
			$row['num']=0;
			if($row['pickapro_listing']==1)
			{
			$stmt = $dbCon->prepare("select id,professional_category_id as catg_id from professional_company_selected_service_todos_price_info where qloud_service_id=?");
			$stmt->bind_param("i", $food_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCatg = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select is_active,professional_service_category_location.id,location_name,service_available from professional_company_selected_service_todos_price_available left join professional_service_category_location on professional_service_category_location.id=professional_company_selected_service_todos_price_available.service_available where service_available in (select service_available from professional_service_category_available where category_id=?) and price_id=?");
			$stmt->bind_param("ii", $rowCatg['catg_id'],$rowCatg['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=' <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt&nbsp;padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Service available</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">How the contractor can provide the service?</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
									  
									 <div class="clear"></div>';
			$j='';
			$count=0;
			
			while($rowLocation = $result->fetch_assoc())
			{
				$count++;
				$j=$j.$rowLocation['id'].',';	
				if($rowLocation['is_active']==1)
				{
					$checked='checked';
				}
				else
					{
					$checked='';
				}
				$org=$org.'<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20" id="'.$rowLocation['id'].'">
														<a href="javascript:void(0);" onclick="updateInclutionType('.$rowLocation['id'].')">
														<input data-testid="test-checkbox-Walls" name="Walls" type="checkbox" class="css-1lgzhz8" '.$checked.'></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">'.$rowLocation['location_name'].'</label></div>
															
															</div>';
			}
			
			$org=$org.'<input type="hidden" id="inclusion_type_detail" name="inclusion_type_detail" value="'.$j.'">';	
			$row['num']=$count;
			$row['available_for']=$org;
			}
			 $filename="../estorecss/".$row ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['dish_image'].'.jpg' );  $imgs='../../'.$imgs; } else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; }
			 $row['selected_image']=str_replace('../../../','../../../../../',$imgs);
			  
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		
		function selectedDishRecurringInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$food_id= $this -> encrypt_decrypt('decrypt',$data['fid']); 
			$stmt = $dbCon->prepare("select day_name,day_id,event_day,event_start_time from dish_service_recurring_information left join day_detail on day_detail.id=dish_service_recurring_information.day_id where dish_id=?");
			$stmt->bind_param("i", $food_id);
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
	 
		function dishesList($data)
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
			$stmt = $dbCon->prepare("select id,dish_name,dish_detail,dish_price,dish_image from dishes_detail_information where company_id=? and dish_type!=1 and is_physical=1 order by created_on desc limit 0,5");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				 $filename="../estorecss/".$row ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['dish_image'].'.jpg' );  $imgs='../../'.$imgs; } else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; } 
				array_push($org,$row);
				$org[$j]['dish_image']=$imgs;
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		 	function dishesCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from dishes_detail_information where company_id=? and dish_type!=1 and is_physical=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
			function moreDishesDetail($data)
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
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select id,dish_name,dish_detail,dish_price,dish_image from dishes_detail_information where company_id=? and dish_type!=1 and is_physical=1 order by created_on desc limit ?,? ");
			
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
				  
				if($j%2==0)
				{
					$bg='lgtgrey_bg';
				}
				else
				{
					$bg='white_bg';
				}
				$enc= $this -> encrypt_decrypt('encrypt',$row['id']);
				$enc1="'".$enc."'";
				 
					 $filename="../estorecss/".$row ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['dish_image'].'.jpg' );  $imgs='../../'.$imgs; } else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; } 								 
													   
				
				
				$org=$org.'<a href="../dishProfileInformation/'.$data['cid'].'/'.$enc.'" ><div class="column_m container  marb5   fsz14 dark_grey_txt" >
												<div class=" '.$bg.' bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 "> 
																	
																	<div class="wi_50p  hei_50p  "><img src="../'.$imgs.'" width="50px;" height="50px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></div>
													
													<div class="fleft wi_75 xxs-wi_80  xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">'.$row['dish_name'].' </span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">'.substr($row['dish_detail'],0,23).'-'.$row['dish_price'].'</span>  </div>
													
													  <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea " aria-hidden="true"></span> 
													</div>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div></a>';
												$j++;
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function servicesList($data)
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
			$stmt = $dbCon->prepare("select id,dish_name,dish_detail,dish_price,dish_image from dishes_detail_information where company_id=? and dish_type!=1 and is_physical=2 order by created_on desc limit 0,5");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				 $filename="../estorecss/".$row ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['dish_image'].'.jpg' );  $imgs='../../'.$imgs; } else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; } 
				array_push($org,$row);
				$org[$j]['dish_image']=$imgs;
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function pickaproServicesList($data)
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
			$stmt = $dbCon->prepare("select id,dish_name,dish_detail,dish_price,dish_image from dishes_detail_information where company_id=? and is_physical=2 and pickapro_listing=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				$stmt = $dbCon->prepare("select id,list_on_pickapro from professional_company_selected_service_todos_price_info where qloud_service_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				
				 $filename="../estorecss/".$row ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['dish_image'].'.jpg' );  $imgs='../../'.$imgs; } else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; } 
				array_push($org,$row);
				$org[$j]['list_on_pickapro']=$row1['list_on_pickapro'];
				$org[$j]['dish_image']=$imgs;
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row1['id']);
				$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function removePickaproListing($data)
		{
			$dbCon = AppModel::createConnection();
			$pick_id= $this -> encrypt_decrypt('decrypt',$data['pick_id']);
			$stmt = $dbCon->prepare("update professional_company_selected_service_todos_price_info set list_on_pickapro=0 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $pick_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function relistPickaproListing($data)
		{
			$dbCon = AppModel::createConnection();
			$pick_id= $this -> encrypt_decrypt('decrypt',$data['pick_id']);
			$stmt = $dbCon->prepare("update professional_company_selected_service_todos_price_info set list_on_pickapro=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $pick_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function servicesCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from dishes_detail_information where company_id=? and dish_type!=1 and is_physical=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
			function moreServicesDetail($data)
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
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select id,dish_name,dish_detail,dish_price,dish_image from dishes_detail_information where company_id=? and dish_type!=1 and is_physical=2 order by created_on desc limit ?,? ");
			
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
				  
				if($j%2==0)
				{
					$bg='lgtgrey_bg';
				}
				else
				{
					$bg='white_bg';
				}
				$enc= $this -> encrypt_decrypt('encrypt',$row['id']);
				$enc1="'".$enc."'";
				 
					 $filename="../estorecss/".$row ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['dish_image'].'.jpg' );  $imgs='../../'.$imgs; } else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; } 								 
													   
				
				
				$org=$org.'<a href="../dishProfileInformation/'.$data['cid'].'/'.$enc.'" ><div class="column_m container  marb5   fsz14 dark_grey_txt" >
												<div class=" '.$bg.' bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 "> 
																	
																	<div class="wi_50p  hei_50p  "><img src="../'.$imgs.'" width="50px;" height="50px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></div>
													
													<div class="fleft wi_75 xxs-wi_80  xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">'.$row['dish_name'].' </span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">'.substr($row['dish_detail'],0,23).'-'.$row['dish_price'].'</span>  </div>
													
													  <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea " aria-hidden="true"></span> 
													</div>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div></a>';
												$j++;
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		
		
		function dishesFoodList($data)
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
			$stmt = $dbCon->prepare("select id,dish_name,dish_detail,dish_price,dish_image from dishes_detail_information where company_id=? and dish_type=1 order by created_on desc limit 0,5");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				 $filename="../estorecss/".$row ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['dish_image'].'.jpg' );  $imgs='../../'.$imgs; } else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; } 
				array_push($org,$row);
				$org[$j]['dish_image']=$imgs;
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		 	function dishesFoodCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from dishes_detail_information where company_id=? and dish_type=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
			function moreDishesFoodDetail($data)
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
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select id,dish_name,dish_detail,dish_price,dish_image from dishes_detail_information where company_id=? and dish_type=1 order by created_on desc limit ?,? ");
			
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
				  
				if($j%2==0)
				{
					$bg='lgtgrey_bg';
				}
				else
				{
					$bg='white_bg';
				}
				$enc= $this -> encrypt_decrypt('encrypt',$row['id']);
				$enc1="'".$enc."'";
				 
					 $filename="../estorecss/".$row ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['dish_image'].'.jpg' );  $imgs='../../'.$imgs; } else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; } 								 
													   
				
				
				$org=$org.'<a href="../editFoodDishInformation/'.$data['cid'].'/'.$enc.'" ><div class="column_m container  marb5   fsz14 dark_grey_txt" >
												<div class=" '.$bg.' bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 "> 
																	
																	<div class="wi_50p  hei_50p  "><img src="../'.$imgs.'" width="50px;" height="50px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></div>
													
													<div class="fleft wi_75 xxs-wi_80  xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">'.$row['dish_name'].' </span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">'.substr($row['dish_detail'],0,23).'-'.$row['dish_price'].'</span>  </div>
													
													  <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea " aria-hidden="true"></span> 
													</div>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div></a>';
											
											$j++;
				
			}
			//print_r($org); die;
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
		
		
		
		
		
		function countryOption($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,country_name,country_code  from phone_country_code  order by country_code");
			/* bind parameters for markers */
			$cont=1;
			
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
		
		 
		
	}						