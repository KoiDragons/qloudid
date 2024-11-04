<?php
	require_once('../AppModel.php');
	class ResturantModel extends AppModel
	{
		function displayPhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['rid']);
			
			$stmt = $dbCon->prepare("select count(resturant_id) as num from resturant_apartment_photos where resturant_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select resturant_photo_path,sorting_number,id from resturant_apartment_photos where resturant_id=? order by sorting_number ");
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
				
				 $filename="../estorecss/".$row1 ['resturant_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['resturant_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['resturant_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
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
			
			$stmt = $dbCon->prepare("select sorting_number from resturant_apartment_photos where id=?");
			$stmt->bind_param("i", $_POST['draggedItem']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select sorting_number from resturant_apartment_photos where id=?");
			$stmt->bind_param("i", $_POST['draggedTarget']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();
			 
			if($row1['sorting_number']>$row['sorting_number'])
			{
			$stmt = $dbCon->prepare("select id,sorting_number from resturant_apartment_photos where sorting_number>? and id<=? and resturant_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
			$newSort=$rowUpdate['sorting_number']-1;
			$stmt = $dbCon->prepare("update resturant_apartment_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			else
			{
			$stmt = $dbCon->prepare("select id,sorting_number from resturant_apartment_photos where sorting_number<? and id>=? and resturant_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
				$newSort=$rowUpdate['sorting_number']+1;
			$stmt = $dbCon->prepare("update resturant_apartment_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			
			$stmt = $dbCon->prepare("update resturant_apartment_photos set sorting_number=? where id=?");
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
			
			$stmt = $dbCon->prepare("select sorting_number from resturant_apartment_photos where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("delete from  resturant_apartment_photos where id=?");
			$stmt->bind_param("i",$_POST['photoId']);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select id,sorting_number from resturant_apartment_photos where sorting_number>? and resturant_id=?");
			$stmt->bind_param("ii", $row['sorting_number'],$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row1 = $result->fetch_assoc())	
			{
				$newSort=$row1['sorting_number']-1;
			$stmt = $dbCon->prepare("update resturant_apartment_photos set sorting_number=? where id=?");
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
			
			$stmt = $dbCon->prepare("select sorting_number from resturant_apartment_photos where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$newSort=$row['sorting_number']+$_POST['addDelete'];
			
			
			$stmt = $dbCon->prepare("select id from resturant_apartment_photos where sorting_number=? and resturant_id=?");
			$stmt->bind_param("ii", $newSort,$aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();	
			
			$stmt = $dbCon->prepare("update resturant_apartment_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row['sorting_number'], $row1['id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("update resturant_apartment_photos set sorting_number=? where id=?");
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
			 $stmt = $dbCon->prepare("select resturant_photo_path,sorting_number,id from resturant_apartment_photos where id=? ");
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
				 
			
				
				 $filename="../estorecss/".$row1 ['resturant_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['resturant_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['resturant_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
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
			
			
			$stmt = $dbCon->prepare("select count(resturant_id) as num from resturant_apartment_photos where resturant_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$snumber=$row['num']+1;
			 
			$stmt = $dbCon->prepare("insert into resturant_apartment_photos (resturant_photo_path,resturant_id,sorting_number) values(?, ?, ?)");
			$stmt->bind_param("sii",$img_name1, $aid,$snumber);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		 function updateFoodCategoryPackageMenu($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$package_category_id= $this -> encrypt_decrypt('decrypt',$data['pcid']);
			if($data['current_items']=='' || $data['current_items']==null)
			$dishes=substr($_POST['available_dishes'],0,-1);
			else		
			$dishes=$data['current_items'].','.substr($_POST['available_dishes'],0,-1);
			$stmt = $dbCon->prepare("update package_category_dishes set available_package_dishes=?,active_category=1 where id=?");
			$stmt->bind_param("si",$dishes,$package_category_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		 function removeItemFromPackage($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$package_category_id= $this -> encrypt_decrypt('decrypt',$data['pcid']);
			$dish_id= $this -> encrypt_decrypt('decrypt',$data['dish_id']);
			$dish_id=$dish_id.',';
			$dishes=$data['current_items'].',';
			$dishes=str_replace($dish_id,'',$dishes);
			if($dishes=='')
			{
				$active_category=0;
			}
			else
			{
				$active_category=1;
				$dishes=substr($dishes,0,-1);
			}
			$stmt = $dbCon->prepare("update package_category_dishes set available_package_dishes=?,active_category=? where id=?");
			$stmt->bind_param("sii",$dishes,$active_category,$package_category_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		function packageCategoryItemList($data)
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
			$package_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			$package_category_id= $this -> encrypt_decrypt('decrypt',$data['pcid']);
			$stmt = $dbCon->prepare("select package_category_dishes.id,food_category,food_category_id,available_package_dishes,serve_type from package_category_dishes left join food_category on food_category.id=package_category_dishes.food_category_id left join resturant_package_info on  resturant_package_info.id=package_category_dishes.package_id where package_category_dishes.id=?");
			$stmt->bind_param("i", $package_category_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			 if($rowAvailable['available_package_dishes']=='' || $rowAvailable['available_package_dishes']==null)
			 {
				$stmt = $dbCon->prepare("select id,dish_name,dish_detail,dish_image,dish_price from dishes_detail_information where id in (select dish_id from 	resturant_available_dishes where resturant_id=? and serve_type=? and category_food=?)");
				$stmt->bind_param("iii", $resturant_id,$rowAvailable['serve_type'],$rowAvailable['food_category_id']);	 
			 }
			 else
			 {
				$stmt = $dbCon->prepare("select id,dish_name,dish_detail,dish_image,dish_price from dishes_detail_information where id in (select dish_id from resturant_available_dishes where resturant_id=? and serve_type=? and category_food=?) and not find_in_set (id,?)");
				$stmt->bind_param("iiis", $resturant_id,$rowAvailable['serve_type'],$rowAvailable['food_category_id'],$rowAvailable['available_package_dishes']); 
			 }
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				$filename="../estorecss/".$row ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['dish_image'].'.jpg' );  $imgs='../../../../../'.$imgs; } else { $value_a="../../../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../../../html/usercontent/images/default-profile-pic.jpg"; }
				$org[$j]['dish_image']=$imgs;
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
			function packageCategoryInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$package_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			$package_category_id= $this -> encrypt_decrypt('decrypt',$data['pcid']);
			$stmt = $dbCon->prepare("select package_category_dishes.id,food_category,food_category_id,available_package_dishes,serve_type from package_category_dishes left join food_category on food_category.id=package_category_dishes.food_category_id left join resturant_package_info on  resturant_package_info.id=package_category_dishes.package_id where package_category_dishes.id=?");
			$stmt->bind_param("i", $package_category_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $rowAvailable;
		}
		
		
		
		function resturantPackageItemDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$package_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			$stmt = $dbCon->prepare("select package_category_dishes.id,food_category,food_category_id,available_package_dishes from package_category_dishes left join food_category on food_category.id=package_category_dishes.food_category_id where package_id=?");
			$stmt->bind_param("i", $package_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				array_push($org,$rowAvailable);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				$org[$j]['dishes']=array();
				$stmt = $dbCon->prepare("select id,dish_name,dish_detail,dish_image,dish_price from dishes_detail_information where find_in_set(id,?)");
				$stmt->bind_param("s", $rowAvailable['available_package_dishes']);
				$stmt->execute();
				$result2 = $stmt->get_result();
				while($rowAvailable2 = $result2->fetch_assoc())
				{
				$rowAvailable2['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable2['id']);
				array_push($org[$j]['dishes'],$rowAvailable2);
				
				}
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function addResturantPackage($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$package_name=htmlentities($_POST['package_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into resturant_package_info(package_name,resturant_id,created_on,package_price,serve_type)
			values(?, ?, now(),?,?)");
			$stmt->bind_param("siii",$package_name ,$resturant_id,$_POST['package_price'],$_POST['serve_type']);
			$stmt->execute();
			$id=$stmt->insert_id;
			
			$stmt = $dbCon->prepare("select * from food_category where serve_id=0");
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into package_category_dishes(package_id,food_category_id)values(?, ?)");
			$stmt->bind_param("ii",$id ,$row['id']);
			$stmt->execute();	
			}
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function moreResturantPackageDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select id,package_name from resturant_package_info where resturant_id=? limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $resturant_id,$a,$b);
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
				$org=$org.'<a href="#"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.'  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 hidden-xs "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['package_name'],0,1).'</div>
																	</div>
													
													<div class="fleft wi_60   mart10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">'.$row['package_name'].'</span>
													  </div> 
													
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
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
		
		function resturantPackageDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select id,package_name from resturant_package_info where resturant_id=? limit 0,5");
			$stmt->bind_param("i", $resturant_id);
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
		
		function resturantPackageCount($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select count(id) as num from resturant_package_info where resturant_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $resturant_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function publishDiningQueue($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			if($_POST['publish_res']==1)
			{
				$pub=0;
			}
			else
			{
			$pub=1;	
			}
			$stmt = $dbCon->prepare("update resturant_dining_hall set is_published=? where id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $pub,$_POST['id']);
			$stmt->execute();
			if($pub==1)
			{
			$stmt = $dbCon->prepare("select dining_hall_name,dining_queue_id,property_id,company_id from resturant_dining_hall left join resturant_information on resturant_information.id=resturant_dining_hall.resturant_id where resturant_dining_hall.id=?");
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['dining_queue_id']==0)
			{
				$p=1;
				$active=0;
				$queType=2;
				$stmt = $dbCon->prepare("insert into company_location_queue_info(queue_name, created_on, company_id, `location_id`,published_queue,is_active,dining_id,queue_type)
				values(?,now(),?,?,?,?,?,?)");
				$stmt->bind_param("siiiiii",$row['dining_hall_name'],$row['company_id'],$row['property_id'],$p,$active,$_POST['id'],$queType);
				$stmt->execute();
				$id=$stmt->insert_id;
				$stmt = $dbCon->prepare("update resturant_dining_hall set dining_queue_id=? where id=?");
				$stmt->bind_param("ii", $id,$_POST['id']);
				$stmt->execute();
			}
			else
			{
				$stmt = $dbCon->prepare("update company_location_queue_info set published_queue=1 where dining_id=? and queue_type=2");
				$stmt->bind_param("i",$_POST['id']);
				$stmt->execute();	
			}
			}
			else
			{
				$stmt = $dbCon->prepare("update company_location_queue_info set published_queue=0 where dining_id=?  and queue_type=2");
				$stmt->bind_param("i",$_POST['id']);
				$stmt->execute();	
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function publishDropin($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			
			if($_POST['publish_res']==1)
			{
			$pub=0;
			$stmt = $dbCon->prepare("update resturant_dining_hall set is_published=? where resturant_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $pub,$resturant_id);
			$stmt->execute();
			
			}
			else
			{
			$pub=1;	
			}
			$stmt = $dbCon->prepare("update resturant_work_information set publish_dropin=? where resturant_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $pub,$resturant_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update company_location_queue_info set published_queue=? where dining_id in (select id from resturant_dining_hall where resturant_id=?)  and queue_type=2");
			$stmt->bind_param("ii",$pub,$resturant_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function resturantDiningHallList($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
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
		function publishResturant($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			if($_POST['publish_res']==1)
			{
				$pub=0;
				$stmt = $dbCon->prepare("update resturant_dining_hall set is_published=? where id in (select id from resturant_dining_hall where resturant_id=?)");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("ii", $pub,$resturant_id);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("update company_location_queue_info set published_queue=? where dining_id in (select id from resturant_dining_hall where resturant_id=?)  and queue_type=2");
				$stmt->bind_param("ii",$pub,$resturant_id);
				$stmt->execute();
			}
			else
			{
			$pub=1;	
			}
			$stmt = $dbCon->prepare("update resturant_work_information set publish_resturant=?,publish_dropin=0,publish_book_table=0,publish_menu=0 where resturant_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $pub,$resturant_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		
		
		function publishBookTable($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			if($_POST['publish_res']==1)
			{
				$pub=0;
			}
			else
			{
			$pub=1;	
			}
			$stmt = $dbCon->prepare("update resturant_work_information set publish_book_table=? where resturant_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $pub,$resturant_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function publishMenu($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			if($_POST['publish_res']==1)
			{
				$pub=0;
			}
			else
			{
			$pub=1;	
			}
			$stmt = $dbCon->prepare("update resturant_work_information set publish_menu=? where resturant_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $pub,$resturant_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function checkPermission($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,is_admin from manage_employee_permissions where user_id=? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $data['user_id'],$company_id);
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
				if($row['is_admin']==0)
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
		
		function bookingReject($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id=$this->encrypt_decrypt('decrypt',$data['rid']);
			$booking_id=$this->encrypt_decrypt('decrypt',$data['resid']);
			$stmt = $dbCon->prepare("select *  from resturant_information where id=?");
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowResturant = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select *  from resturant_table_booking_info where id=?");
			$stmt->bind_param("i", $booking_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select concat_ws(' ',first_name,last_name) as name,email  from user_logins where id=?");
			$stmt->bind_param("i", $rowAvailable['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUser = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update resturant_table_booking_info set is_confirmed=2,confirmed_by=? where id=?");
			$stmt->bind_param("ii", $data['user_id'],$booking_id);
			$stmt->execute();
			$to      = $rowUser['email'];
			$subject="Reservation rejected";
			
			$emailcontent='<html xmlns="http://www.w3.org/1999/xhtml" style="background-color: rgb(240, 240, 240);"><head>
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
                        <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">'.$rowResturant["resturant_name"].'</span>                          </td>
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
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">Reservation rejected</span>                          </td>
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
                      <span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">A message from '.$rowResturant["resturant_name"].'</span>
                      <br> We are sorry to inform you that we are not able to serve you on the selected date and time. Please select other date or time to join us we will be glad to see you again.
                    </div>
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
                            <br> Reservation × '.$rowAvailable["company_size"].'
                            <br>
                          </div>
                        </td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody><tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="#" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;"> Manage your reservation </a>                                </td>
                            </tr>
                          </tbody></table>
                        </td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
                <!-- ADDRESS -->
                <tr>
                  <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    
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
                  
                </tr>
                
                
                <!-- EDIT RECEIPT -->
                <!-- CANCELLATION POLICY -->
                
                
                
                <!-- QUESTIONS -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    
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

		//catch exception
		catch(Exception $e) {
		 
		}
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function bookingConfirmation($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id=$this->encrypt_decrypt('decrypt',$data['rid']);
			$booking_id=$this->encrypt_decrypt('decrypt',$data['resid']);
			$stmt = $dbCon->prepare("select *  from resturant_information where id=?");
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowResturant = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select *  from resturant_table_booking_info where id=?");
			$stmt->bind_param("i", $booking_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select concat_ws(' ',first_name,last_name) as name,email  from user_logins where id=?");
			$stmt->bind_param("i", $rowAvailable['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUser = $result->fetch_assoc();
			$_POST['selected_tables']=substr($_POST['selected_tables'],0,-1);
			$d_warning=explode(',',$_POST['selected_tables']);	
			foreach($d_warning as $key)
			{
			$stmt = $dbCon->prepare("insert into resturant_table_booking_confirmation_info (booking_request_id,reserved_dining_hall_id,reserved_table_id,reservation_date,reservation_time,reservation_time_id,created_on) values (?, ?, ?, ?,?, ?,now())");
			$stmt->bind_param("iiissi", $booking_id,$_POST['selected_dining'],$key,$rowAvailable['booking_date'],$rowAvailable['booking_time'],$rowAvailable['booking_time_id']);
			$stmt->execute();	
			}
			$stmt = $dbCon->prepare("update resturant_table_booking_info set is_confirmed=1,confirmed_by=? where id=?");
			$stmt->bind_param("ii", $data['user_id'],$booking_id);
			$stmt->execute();
			$to      = $rowUser['email'];
			$subject="Reservation confirmed";
			
			$emailcontent='<html xmlns="http://www.w3.org/1999/xhtml" style="background-color: rgb(240, 240, 240);"><head>
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
                        <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">'.$rowResturant["resturant_name"].'</span>                          </td>
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
                      <span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">A message from '.$rowResturant["resturant_name"].'</span>
                      <br> We are thrilled that you will be joining us. If you would like to make any special arrangements or have questions about your reservation, please do not hesitate to reach out.
                    </div>
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
                            <br> Reservation × '.$rowAvailable["company_size"].'
                            <br>
                          </div>
                        </td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody><tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="#" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;"> Manage your reservation </a>                                </td>
                            </tr>
                          </tbody></table>
                        </td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
                <!-- ADDRESS -->
                <tr>
                  <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    
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

		//catch exception
		catch(Exception $e) {
		 
		}

			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function checkTableCapacity($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$resturant_id=$this->encrypt_decrypt('decrypt',$data['rid']);
			
			$stmt = $dbCon->prepare("select sum(table_info) as num from resturant_dining_hall_tables where find_in_set(id,?)");
			$stmt->bind_param("i", $_POST['selected_tables']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowTables = $result->fetch_assoc();
			if($rowTables['num']<$_POST['company_size'])
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
		
		function updateTable($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$resturant_id=$this->encrypt_decrypt('decrypt',$data['rid']);
			$booking_id=$this->encrypt_decrypt('decrypt',$data['resid']);
			$stmt = $dbCon->prepare("select *  from resturant_table_booking_info where id=?");
			$stmt->bind_param("i", $booking_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$d_warning=explode(',',$_POST['selected_tables']);
			$stmt = $dbCon->prepare("select * from resturant_dining_hall where id=?");
			$stmt->bind_param("i", $_POST['dining_hall']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$org='';
			$stmt = $dbCon->prepare("select * from resturant_dining_hall_tables where dining_hall_id=?  and id not in (select reserved_table_id from resturant_table_booking_confirmation_info where reservation_date=? and reservation_time_id=?)");
			$stmt->bind_param("isi", $_POST['dining_hall'],$rowAvailable['booking_date'],$rowAvailable['booking_time_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$orgT='';
			$j=1;
			while($rowTables = $result->fetch_assoc())
			{
				if (in_array($rowTables['id'], $d_warning))
				{
				$orgT=$orgT.'<a href="javascript:void(0);" onclick="updateTable('.$rowTables['id'].','.$row['id'].',0);"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text"> Table '.$j.'('.$rowTables['table_info'].')</span>
															   </span>
															</span>
														 </div>
													  </div></a>';
				}
				else
				{
				$orgT=$orgT.'<a href="javascript:void(0);" onclick="updateTable('.$rowTables['id'].','.$row['id'].',1);"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text"> Table '.$j.'('.$rowTables['table_info'].')</span>
															   </span>
															</span>
														 </div>
													  </div></a>';
				}
				
													  $j++;
			}
			$org=$org.'<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt  ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												 <div class="css-1jzh2co marb15">
												   <p class="paragraph--b1 paragraph--full css-1680uhd">Select the tables</p>
												   <div class="chip-container">'.$orgT.'</div></div> <div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div>
									</div> ';
									
									
									
			
			
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		function diningHallTableDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$resturant_id=$this->encrypt_decrypt('decrypt',$data['rid']);
			$booking_id=$this->encrypt_decrypt('decrypt',$data['resid']);
			$stmt = $dbCon->prepare("select *  from resturant_table_booking_info where id=?");
			$stmt->bind_param("i", $booking_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			if($data['dining_hall']>0)
			{
			$stmt = $dbCon->prepare("select * from resturant_dining_hall where id=?");
			$stmt->bind_param("i", $data['dining_hall']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$org='<div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile" class="expander-toggler dark_grey_txt xs-fsz16 tall bold">'.$row['dining_hall_name'].'
								<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="profile" class=" " style="display: block;">	
										 
									  
											<div id="'.$row['id'].'">';
			$stmt = $dbCon->prepare("select * from resturant_dining_hall_tables where dining_hall_id=? and id not in (select reserved_table_id from resturant_table_booking_confirmation_info where reservation_date=? and reservation_time_id=?)");
			$stmt->bind_param("isi", $data['dining_hall'],$rowAvailable['booking_date'],$rowAvailable['booking_time_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$orgT='';
			$j=1;
			while($rowTables = $result->fetch_assoc())
			{
				$orgT=$orgT.'<a href="javascript:void(0);" onclick="updateTable('.$rowTables['id'].','.$row['id'].',1);"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text"> Table '.$j.'('.$rowTables['table_info'].')</span>
															   </span>
															</span>
														 </div>
													  </div></a>';
													  $j++;
			}
			$org=$org.'<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt  ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												 <div class="css-1jzh2co marb15">
												   <p class="paragraph--b1 paragraph--full css-1680uhd">Select the tables</p>
												   <div class="chip-container">'.$orgT.'</div></div> <div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div>
									</div><div class="clear"></div>
									</div>
									</div>';
			}
			else
			{
			$stmt = $dbCon->prepare("select * from resturant_dining_hall where resturant_id=?");
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
			$org=$org.'<div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile'.$row['id'].'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold">'.$row['dining_hall_name'].'
								<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="profile'.$row['id'].'" class=" " style="display: block;">	
										 
									  
											<div id="'.$row['id'].'">';
			$stmt = $dbCon->prepare("select * from resturant_dining_hall_tables where dining_hall_id=? and id not in (select reserved_table_id from resturant_table_booking_confirmation_info where reservation_date=? and reservation_time_id=?)");
			$stmt->bind_param("isi", $row['id'],$rowAvailable['booking_date'],$rowAvailable['booking_time_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$orgT='';
			$j=1;
			while($rowTables = $result1->fetch_assoc())
			{
				$orgT=$orgT.'<a href="javascript:void(0);" onclick="updateTable('.$rowTables['id'].','.$row['id'].',1);"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text"> Table '.$j.'('.$rowTables['table_info'].')</span>
															   </span>
															</span>
														 </div>
													  </div></a>';
													  $j++;
			}
			$org=$org.'<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt  ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												 <div class="css-1jzh2co marb15">
												   <p class="paragraph--b1 paragraph--full css-1680uhd">Select the tables</p>
												   <div class="chip-container">'.$orgT.'</div></div> <div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div>
									</div><div class="clear"></div>
									</div>
									</div>';
			}
			}
			
			 
			 
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		 function editBookingTimeInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']); 
			
			$stmt = $dbCon->prepare("select * from resturant_work_information where resturant_id=?");
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
		 
			if($row['breakfast_available']==1)
			{
			if($_POST['food1']==1)
			 {
				 $booking=1;
				 $maximum_time=$_POST['breakfast_minimum_time'];
				 $close_time=$_POST['breakfast_time_before_closing'];
				  
			 }
			 else
			 {
				 $booking=0;
				 $maximum_time=0;
				 $close_time=0;
				 
			 }
				$stmt = $dbCon->prepare("update resturant_work_information set breakfast_booking=?,breakfast_minimum_time=?,breakfast_time_before_closing=? where resturant_id=?");
				$stmt->bind_param("iiii",$booking,$maximum_time,$close_time,$resturant_id);
				$stmt->execute();
			}
			 
			 
			if($row['brunch_available']==1)
			{
			if($_POST['food2']==1)
			 {
				 $booking=1;
				 $maximum_time=$_POST['brunch_minimum_time'];
				 $close_time=$_POST['brunch_time_before_closing'];
				  
			 }
			 else
			 {
				 $booking=0;
				 $maximum_time=0;
				 $close_time=0;
				 
			 }
				$stmt = $dbCon->prepare("update resturant_work_information set brunch_booking=?,brunch_minimum_time=?,brunch_time_before_closing=? where resturant_id=?");
				$stmt->bind_param("iiii",$booking,$maximum_time,$close_time,$resturant_id);
				$stmt->execute();
			}
			
			
			if($row['lunch_available']==1)
			{
			if($_POST['food3']==1)
			 {
				 $booking=1;
				 $maximum_time=$_POST['lunch_minimum_time'];
				 $close_time=$_POST['lunch_time_before_closing'];
				  
			 }
			 else
			 {
				 $booking=0;
				 $maximum_time=0;
				 $close_time=0;
				 
			 }
				$stmt = $dbCon->prepare("update resturant_work_information set lunch_booking=?,lunch_minimum_time=?,lunch_time_before_closing=? where resturant_id=?");
				$stmt->bind_param("iiii",$booking,$maximum_time,$close_time,$resturant_id);
				$stmt->execute();
			}
			
			
			if($row['dinner_available']==1)
			{
			if($_POST['food4']==1)
			 {
				 $booking=1;
				 $maximum_time=$_POST['dinner_minimum_time'];
				 $close_time=$_POST['dinner_time_before_closing'];
				  
			 }
			 else
			 {
				 $booking=0;
				 $maximum_time=0;
				 $close_time=0;
				 
			 }
				$stmt = $dbCon->prepare("update resturant_work_information set dinner_booking=?,dinner_minimum_time=?,dinner_time_before_closing=? where resturant_id=?");
				$stmt->bind_param("iiii",$booking,$maximum_time,$close_time,$resturant_id);
				$stmt->execute();
			}
			
			if($row['alcohol_available']==1)
			{
			if($_POST['food5']==1)
			 {
				 $booking=1;
				 $maximum_time=$_POST['alcohol_minimum_time'];
				 $close_time=$_POST['alcohol_time_before_closing'];
				  
			 }
			 else
			 {
				 $booking=0;
				 $maximum_time=0;
				 $close_time=0;
				 
			 }
				$stmt = $dbCon->prepare("update resturant_work_information set alcohol_booking=?,alcohol_minimum_time=?,alcohol_time_before_closing=? where resturant_id=?");
				$stmt->bind_param("iiii",$booking,$maximum_time,$close_time,$resturant_id);
				$stmt->execute();
			}
			
			 
			  
				$stmt->close();
				$dbCon->close();
				 
				return 1;
			
			
		}
		
		function updateTableTypeInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("update resturant_dining_hall_tables set table_info=? where id=?");
			$stmt->bind_param("ii",$_POST['bed_info'], $_POST['bed_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function updateDiningHallName($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("update resturant_dining_hall set dining_hall_name=? where id=?");
			$stmt->bind_param("si",$_POST['hall_name'], $_POST['id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select dining_queue_id from resturant_dining_hall where id=?");
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['dining_queue_id']>0)
			{
			$stmt = $dbCon->prepare("update company_location_queue_info set queue_name=? where id=?");
			$stmt->bind_param("si",$_POST['hall_name'], $row['dining_queue_id']);
			$stmt->execute();	
			}
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function deleteDiningHallTableInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$rid=$this->encrypt_decrypt('decrypt',$data['rid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from resturant_dining_hall_tables where dining_hall_id=(select dining_hall_id from resturant_dining_hall_tables where id=?)");
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']>1)
			{
			$stmt = $dbCon->prepare("delete from resturant_dining_hall_tables where id=?");
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;	
			}
			else
			{
			$stmt = $dbCon->prepare("select count(id) as num from resturant_dining_hall where resturant_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']>1)
			{
			$stmt = $dbCon->prepare("select dining_hall_id,dining_queue_id from resturant_dining_hall_tables left join resturant_dining_hall on resturant_dining_hall.id=resturant_dining_hall_tables.dining_hall_id where resturant_dining_hall_tables.id=?");
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['dining_queue_id']>0)
			{
			$stmt = $dbCon->prepare("delete from company_location_queue_info where id=?");
			$stmt->bind_param("i", $row['dining_queue_id']);
			$stmt->execute();	
			}
			$stmt = $dbCon->prepare("delete from resturant_dining_hall where id=?");
			$stmt->bind_param("i", $row['dining_hall_id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("delete from resturant_dining_hall_tables where id=?");
			$stmt->bind_param("i", $_POST['id']);
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
			 
			
			 	
		}
		
		function addTableToHall($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $rid=$this->encrypt_decrypt('decrypt',$data['rid']);
			 $bed=1;
			 $stmt = $dbCon->prepare("insert into resturant_dining_hall_tables (dining_hall_id,table_info,created_on) values (?, ?, now())");
			$stmt->bind_param("ii", $_POST['id'],$bed);
			$stmt->execute();
			 
			$stmt = $dbCon->prepare("select * from resturant_dining_hall_tables where dining_hall_id=?");
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$i=1;
			while($row = $result->fetch_assoc())
			{
				 
			 
			$stmt = $dbCon->prepare("select * from resturant_table_type");
			$stmt->execute();
			$result2 = $stmt->get_result();
			$options='';
			
			while($row2= $result2->fetch_assoc())
			{	
			if($row2['table_type']==$row['table_info'])
			{
				$options=$options.'<option value="'.$row2['id'].'" selected>'.$row2['table_type'].'</option>';
			}
			else
			{
			$options=$options.'<option value="'.$row2['id'].'">'.$row2['table_type'].'</option>';	
			}
			}
			
				$org=$org.'<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt brd" id="extra_'.$row['id'].'">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_50 xxs-wi_55  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Table '.$i.'</span>
													 
													 </div>
													 
											<div class="wi_70  xs-mar0 xs-padt10">		
												<div class="on_clmn mart10 " >
								<div class="pos_rel">											
											<select name="position_type" id="position_type" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg dropdown-bg  tall padl0 ffamily_avenir red_f5a0a5_txt" style="text-align-last:center;" onchange="updateTableTypeInfo('.$row['id'].',this.value);"> 
											 '.$options.'
														 
											</select>
											</div>
											</div>
												
											</div>	
											<div class="clear"></div>
											<div class="wi_70  xs-mar0 padt20 ">		
											<a href="javascript:void(0);" onclick="deleteDiningHallTableInfo('.$row['id'].');">
											<button color="#444444" class="merlin-button css-7wfern fleft  " aria-label="">
										   <div class="merlin-button__content">
											  <div class="css-ibdtyj">
												 
												 Remove table
											  </div>
										   </div>
										</button>	</a>
											</div>	
											</div>
											
											
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div>';	
							$i++;									
											
			}
			 
			
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		function addDiningHall($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $resturant_id=$this->encrypt_decrypt('decrypt',$data['rid']);
			 
			$stmt = $dbCon->prepare("insert into resturant_dining_hall (resturant_id, created_on) values (?,now())");
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();	
			$id=$stmt->insert_id;
			$bed=1;
			$stmt = $dbCon->prepare("insert into resturant_dining_hall_tables (dining_hall_id,table_info, created_on) values (?,?,now())");
			$stmt->bind_param("ii", $id,$bed);
			$stmt->execute();	
			
			 
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
	
		
		function deleteDiningHall($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$resturant_id=$this->encrypt_decrypt('decrypt',$data['rid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from resturant_dining_hall where resturant_id=?");
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']>1)
			{
			$stmt = $dbCon->prepare("select max(id) as m_id,dining_queue_id from resturant_dining_hall where resturant_id=?");
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select dining_queue_id from resturant_dining_hall where id=?");
			$stmt->bind_param("i", $row['m_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowDining = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("delete from resturant_dining_hall where id=?");
			$stmt->bind_param("i", $row['m_id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("delete from resturant_dining_hall_tables where dining_hall_id=?");
			$stmt->bind_param("i", $row['m_id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("delete from company_location_queue_info where id=?");
			$stmt->bind_param("i", $rowDining['dining_queue_id']);
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
		
		function resturantDiningCount($data)
		{ 
		 
			$dbCon = AppModel::createConnection();
			 $resturant_id=$this->encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select count(id) as num from resturant_dining_hall where resturant_id=?");
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
				$stmt = $dbCon->prepare("insert into resturant_dining_hall (resturant_id, created_on) values (?,now())");
				$stmt->bind_param("i", $resturant_id);
				$stmt->execute();	
				$id1=$stmt->insert_id;
				$bed=1;
				$stmt = $dbCon->prepare("insert into resturant_dining_hall_tables (dining_hall_id,table_info, created_on) values (?,?,now())");
				$stmt->bind_param("ii", $id1,$bed);
				$stmt->execute();	
			}
			$stmt->close();
			$dbCon->close();
			return $row['num'];	
		}
		
		function resturantDiningDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			 $resturant_id=$this->encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select * from resturant_dining_hall where resturant_id=?");
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$j++;
				$org=$org.' <div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile'.$j.'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold">'.$row['dining_hall_name'].'
								<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div class="on_clmn mart10 marb20">
								<div class="pos_rel wi_70">											
											<input type="text" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir red_f5a0a5_txt" style="text-align-last:center;" onblur="updateDiningHallName('.$row['id'].',this.value);" value="'.$row['dining_hall_name'].'"> 
											 
														 
											
											</div>
											</div>
											
								<div id="profile'.$j.'" class=" " style="display: block;">	
										 
									 <a href="javascript:void(0);" onclick="addTableToHall('.$row['id'].');">	<button color="#444444" class="merlin-button css-7wfern fleft" aria-label="">
											   <div class="merlin-button__content">
												  <div class="css-ibdtyj">
													 <div class="css-1mvz2rc">
														<div class="css-r0ilrj"></div>
													 </div>
													 Add another table
												  </div>
											   </div>
											</button></a>
											<div id="'.$row['id'].'">';
			$stmt = $dbCon->prepare("select * from resturant_dining_hall_tables where dining_hall_id=?");
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$i=1;
			while($row1= $result1->fetch_assoc())
			{							
		
			$stmt = $dbCon->prepare("select * from resturant_table_type");
			$stmt->execute();
			$result2 = $stmt->get_result();
			$options='';
			
			while($row2= $result2->fetch_assoc())
			{	
			if($row2['id']==$row1['table_info'])
			{
				$options=$options.'<option value="'.$row2['id'].'" selected>'.$row2['table_type'].'</option>';
			}
			else
			{
			$options=$options.'<option value="'.$row2['id'].'">'.$row2['table_type'].'</option>';	
			}
			}
			
				$org=$org.'<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt brd">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_50 xxs-wi_55  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Table '.$i.'</span>
													 
													 </div>
													 
											<div class="wi_70  xs-mar0 xs-padt10">		
												<div class="on_clmn mart10 " >
								<div class="pos_rel">											
											<select name="position_type" id="position_type" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg dropdown-bg  tall padl0 ffamily_avenir red_f5a0a5_txt" style="text-align-last:center;" onchange="updateTableTypeInfo('.$row1['id'].',this.value);"> 
											 '.$options.'
														 
											</select>
											</div>
											</div>
												
											</div>	
											<div class="clear"></div>
											<div class="wi_70  xs-mar0 padt20 ">		
											<a href="javascript:void(0);" onclick="deleteDiningHallTableInfo('.$row1['id'].')"><button color="#444444" class="merlin-button css-7wfern fleft  " aria-label="">
										   <div class="merlin-button__content">
											  <div class="css-ibdtyj">
												 
												 Remove table
											  </div>
										   </div>
										</button>	</a>
											</div>	
											</div>
											
											
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div>';	
$i++;									
											
			}
			$org=$org.'</div><div class="clear"></div>
									</div>
					 		 <div class="clear"></div>
					</div>';
			}
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		function addDishDetail($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']); 
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
			
			$dish_name=htmlentities($_POST['dish_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$dish_detail=htmlentities($_POST['dish_detail'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into dishes_detail_information(dish_name, dish_detail, dish_image, dish_price,  dish_type, dish_warnings, created_on, modified_on,company_id)
			values(?, ?, ?, ?, ?, ?, now(),now(),?)");
			$stmt->bind_param("sssiisi",$dish_name,$dish_detail ,$img_name1 ,$_POST['dish_price'], $_POST['dish_type'],$_POST['food_type'],$company_id);
			
			
			if($stmt->execute())
			{
				$id=$stmt->insert_id;
				$stmt = $dbCon->prepare("insert into resturant_available_dishes(resturant_id,serve_type, category_food,dish_id,created_on)
				values(?, ?, ?, ?, now())");
				$stmt->bind_param("iiii",$resturant_id, $_POST['serve_type'], $_POST['category_id'] ,$id);
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
		
		
		
		
		function addResturantCuisine($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			 
			$cuisine_type=htmlentities($_POST['cuisine_type'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("select count(id) as num from  resturant_cuisine where resturant_id=?");
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			if($rowAvailable['num']==0)
			{
			$stmt = $dbCon->prepare("insert into  resturant_cuisine (cuisine_type,dietary_options,live_cooking, open_kitchen, local_cuisine, buffet_style, drinks_only_allowed, created_on,modified_on, resturant_id) values (?, ?, ?, ?, ?, ?, ?, now(),now(), ?)");
			$stmt->bind_param("ssiiiiii",$cuisine_type, $_POST['dietary_type'],$_POST['type1'], $_POST['type2'], $_POST['type3'],$_POST['type4'], $_POST['type5'] , $resturant_id);	
			}
			else
			{
			$stmt = $dbCon->prepare("update resturant_cuisine set cuisine_type=?,dietary_options=?,live_cooking=?, open_kitchen=?, local_cuisine=?, buffet_style=?, drinks_only_allowed=?, modified_on=now() where resturant_id=?");
			$stmt->bind_param("ssiiiiii",$cuisine_type, $_POST['dietary_type'],$_POST['type1'], $_POST['type2'], $_POST['type3'],$_POST['type4'],$_POST['type5'] , $resturant_id);
			 	
			}
			 
			 
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
		
		function roomServiceRequests($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select company_service_info,hotel_roomservice_resturant.id,company_name,is_roomservice,hotel_property_id from  hotel_roomservice_resturant  left join companies on companies.id=hotel_roomservice_resturant.hotel_company_id where resturant_id=? order by is_roomservice desc");
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowAvailable = $result->fetch_assoc())
			{
				if($rowAvailable['company_service_info']==1)
				{
				$stmt = $dbCon->prepare("select hotel_name,room_service  from  hotel_basic_information where property_id =? ");
				$stmt->bind_param("i", $rowAvailable['hotel_property_id']);
				$stmt->execute();
				$resultData = $stmt->get_result();	
				$rowData= $resultData->fetch_assoc();
				if($rowData['room_service']==0)
				{
					continue;
				}
				$rowAvailable['hotel_name']=$rowData['hotel_name'];
				$rowAvailable['company_service']='Hotel';
				}
				$rowAvailable['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				array_push($org,$rowAvailable);
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			 
			return $org;
			
			
		}
		
		
		function roomServiceRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['hid']);
			$stmt = $dbCon->prepare("select available_dishes from  hotel_roomservice_resturant  where id=?");
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			 
			return $rowAvailable;
			
			
		}
		
		
		function approveRoomServiceRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("update hotel_roomservice_resturant set is_roomservice=1 where id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function resturantCuisineInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select * from  resturant_cuisine where resturant_id=?");
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			 
			return $rowAvailable;
			
			
		}
		function dietaryOptionsSelected($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$d_warning=explode(',',$data['dietary_options']);
			 
			$stmt = $dbCon->prepare("select * from dietary_options");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $d_warning))
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
		
		function kitchenOptionsSelected($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$d_warning=explode(',',$data['kitchen_options']);
			 
			$stmt = $dbCon->prepare("select * from kitchen_type");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $d_warning))
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
		
		function dietaryOptions($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from dietary_options");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				 
				$org[$j]['is_selected']= 0;	
				 
				$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function kitchenType($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from kitchen_type");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				 
				$org[$j]['is_selected']= 0;	
				 
				$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function broadcastDetailSelected($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$b_warning=explode(',',$data['b_info']);
			 
			$stmt = $dbCon->prepare("select * from broadcast_detail");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $b_warning))
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
		
		function paymentTypeSelected($data)
		{
			$dbCon = AppModel::createConnection();
			$p_warning=explode(',',$data['payment_info']);
			 
			$stmt = $dbCon->prepare("select * from payment_type");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $p_warning))
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
			function broadcastDetail()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from broadcast_detail");
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
		
		function paymentType()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from payment_type");
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
		
		 function addWorkingTimeInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']); 
			 
			if($_POST['food1']==1)
			{
				 $breakfast_available=1;
			 if($_POST['day1']==1)
			 {
				 $breakfast_mon_open=1;
				 $breakfast_mon_open_time=$_POST['breakfast_mon_open'];
				 $breakfast_mon_close_time=$_POST['breakfast_mon_close'];
				 
			 }
			 else
			 {
				 $breakfast_mon_open=0;
				 $breakfast_mon_open_time='';
				 $breakfast_mon_close_time='';
				 
			 }	
			 if($_POST['day2']==1)
			 {
				 $breakfast_tue_open=1;
				 $breakfast_tue_open_time=$_POST['breakfast_tue_open'];
				 $breakfast_tue_close_time=$_POST['breakfast_tue_close'];
				 
			 }
			 else
			 {
				 $breakfast_tue_open=0;
				 $breakfast_tue_open_time='';
				 $breakfast_tue_close_time='';
				 
			 }
			if($_POST['day3']==1)
			 {
				 $breakfast_wed_open=1;
				 $breakfast_wed_open_time=$_POST['breakfast_wed_open'];
				 $breakfast_wed_close_time=$_POST['breakfast_wed_close'];
				 
			 }
			 else
			 {
				 $breakfast_wed_open=0;
				 $breakfast_wed_open_time='';
				 $breakfast_wed_close_time='';
				 
			 }
			if($_POST['day4']==1)
			 {
				 $breakfast_thu_open=1;
				 $breakfast_thu_open_time=$_POST['breakfast_thu_open'];
				 $breakfast_thu_close_time=$_POST['breakfast_thu_close'];
				 
			 }
			 else
			 {
				 $breakfast_thu_open=0;
				 $breakfast_thu_open_time='';
				 $breakfast_thu_close_time='';
				 
			 }
			 if($_POST['day5']==1)
			 {
				 $breakfast_fri_open=1;
				 $breakfast_fri_open_time=$_POST['breakfast_fri_open'];
				 $breakfast_fri_close_time=$_POST['breakfast_fri_close'];
				 
			 }
			 else
			 {
				 $breakfast_fri_open=0;
				 $breakfast_fri_open_time='';
				 $breakfast_fri_close_time='';
				 
			 }
			 if($_POST['day6']==1)
			 {
				 $breakfast_sat_open=1;
				 $breakfast_sat_open_time=$_POST['breakfast_sat_open'];
				 $breakfast_sat_close_time=$_POST['breakfast_sat_close'];
				 
			 }
			 else
			 {
				 $breakfast_sat_open=0;
				 $breakfast_sat_open_time='';
				 $breakfast_sat_close_time='';
				 
			 }
			 if($_POST['day7']==1)
			 {
				 $breakfast_sun_open=1;
				 $breakfast_sun_open_time=$_POST['breakfast_sun_open'];
				 $breakfast_sun_close_time=$_POST['breakfast_sun_close'];
				  
			 }
			 else
			 {
				 $breakfast_sun_open=0;
				 $breakfast_sun_open_time='';
				 $breakfast_sun_close_time='';
				 
			 }
			}
			 
			 else 
			 {
				 $breakfast_available=0;
				 $breakfast_mon_open=0;
				 $breakfast_mon_open_time='';
				 $breakfast_mon_close_time=''; 
				 $breakfast_tue_open=0;
				 $breakfast_tue_open_time='';
				 $breakfast_tue_close_time='';
				 $breakfast_wed_open=0;
				 $breakfast_wed_open_time='';
				 $breakfast_wed_close_time='';
				 $breakfast_thu_open=0;
				 $breakfast_thu_open_time='';
				 $breakfast_thu_close_time='';
				 $breakfast_fri_open=0;
				 $breakfast_fri_open_time='';
				 $breakfast_fri_close_time='';
				 $breakfast_sat_open=0;
				 $breakfast_sat_open_time='';
				 $breakfast_sat_close_time='';
				 $breakfast_sun_open=0;
				 $breakfast_sun_open_time='';
				 $breakfast_sun_close_time='';
			 }
			 
			if($_POST['food2']==1)
			{
				 $brunch_available=1;
			 if($_POST['day11']==1)
			 {
				 $brunch_mon_open=1;
				 $brunch_mon_open_time=$_POST['brunch_mon_open'];
				 $brunch_mon_close_time=$_POST['brunch_mon_close'];
				 
			 }
			 else
			 {
				 $brunch_mon_open=0;
				 $brunch_mon_open_time='';
				 $brunch_mon_close_time='';
				 
			 }	
			 if($_POST['day12']==1)
			 {
				 $brunch_tue_open=1;
				 $brunch_tue_open_time=$_POST['brunch_tue_open'];
				 $brunch_tue_close_time=$_POST['brunch_tue_close'];
				 
			 }
			 else
			 {
				 $brunch_tue_open=0;
				 $brunch_tue_open_time='';
				 $brunch_tue_close_time='';
				 
			 }
			if($_POST['day13']==1)
			 {
				 $brunch_wed_open=1;
				 $brunch_wed_open_time=$_POST['brunch_wed_open'];
				 $brunch_wed_close_time=$_POST['brunch_wed_close'];
				 
			 }
			 else
			 {
				 $brunch_wed_open=0;
				 $brunch_wed_open_time='';
				 $brunch_wed_close_time='';
				 
			 }
			if($_POST['day14']==1)
			 {
				 $brunch_thu_open=1;
				 $brunch_thu_open_time=$_POST['brunch_thu_open'];
				 $brunch_thu_close_time=$_POST['brunch_thu_close'];
				 
			 }
			 else
			 {
				 $brunch_thu_open=0;
				 $brunch_thu_open_time='';
				 $brunch_thu_close_time='';
				 
			 }
			 if($_POST['day15']==1)
			 {
				 $brunch_fri_open=1;
				 $brunch_fri_open_time=$_POST['brunch_fri_open'];
				 $brunch_fri_close_time=$_POST['brunch_fri_close'];
				 
			 }
			 else
			 {
				 $brunch_fri_open=0;
				 $brunch_fri_open_time='';
				 $brunch_fri_close_time='';
				 
			 }
			 if($_POST['day16']==1)
			 {
				 $brunch_sat_open=1;
				 $brunch_sat_open_time=$_POST['brunch_sat_open'];
				 $brunch_sat_close_time=$_POST['brunch_sat_close'];
				 
			 }
			 else
			 {
				 $brunch_sat_open=0;
				 $brunch_sat_open_time='';
				 $brunch_sat_close_time='';
				 
			 }
			 if($_POST['day17']==1)
			 {
				 $brunch_sun_open=1;
				 $brunch_sun_open_time=$_POST['brunch_sun_open'];
				 $brunch_sun_close_time=$_POST['brunch_sun_close'];
				 
			 }
			 else
			 {
				 $brunch_sun_open=0;
				 $brunch_sun_open_time='';
				 $brunch_sun_close_time='';
				 
			 }
			}
			 
			 else 
			 {
				 $brunch_available=0;
				 $brunch_mon_open=0;
				 $brunch_mon_open_time='';
				 $brunch_mon_close_time=''; 
				 $brunch_tue_open=0;
				 $brunch_tue_open_time='';
				 $brunch_tue_close_time='';
				 $brunch_wed_open=0;
				 $brunch_wed_open_time='';
				 $brunch_wed_close_time='';
				 $brunch_thu_open=0;
				 $brunch_thu_open_time='';
				 $brunch_thu_close_time='';
				 $brunch_fri_open=0;
				 $brunch_fri_open_time='';
				 $brunch_fri_close_time='';
				 $brunch_sat_open=0;
				 $brunch_sat_open_time='';
				 $brunch_sat_close_time='';
				 $brunch_sun_open=0;
				 $brunch_sun_open_time='';
				 $brunch_sun_close_time='';
			 } 
			 
			 if($_POST['food3']==1)
			{
				 $lunch_available=1;
			 if($_POST['day21']==1)
			 {
				 $lunch_mon_open=1;
				 $lunch_mon_open_time=$_POST['lunch_mon_open'];
				 $lunch_mon_close_time=$_POST['lunch_mon_close'];
				 
			 }
			 else
			 {
				 $lunch_mon_open=0;
				 $lunch_mon_open_time='';
				 $lunch_mon_close_time='';
				 
			 }	
			 if($_POST['day22']==1)
			 {
				 $lunch_tue_open=1;
				 $lunch_tue_open_time=$_POST['lunch_tue_open'];
				 $lunch_tue_close_time=$_POST['lunch_tue_close'];
				 
			 }
			 else
			 {
				 $lunch_tue_open=0;
				 $lunch_tue_open_time='';
				 $lunch_tue_close_time='';
				 
			 }
			if($_POST['day23']==1)
			 {
				 $lunch_wed_open=1;
				 $lunch_wed_open_time=$_POST['lunch_wed_open'];
				 $lunch_wed_close_time=$_POST['lunch_wed_close'];
				 
			 }
			 else
			 {
				 $lunch_wed_open=0;
				 $lunch_wed_open_time='';
				 $lunch_wed_close_time='';
				 
			 }
			if($_POST['day24']==1)
			 {
				 $lunch_thu_open=1;
				 $lunch_thu_open_time=$_POST['lunch_thu_open'];
				 $lunch_thu_close_time=$_POST['lunch_thu_close'];
				 
			 }
			 else
			 {
				 $lunch_thu_open=0;
				 $lunch_thu_open_time='';
				 $lunch_thu_close_time='';
				 
			 }
			 if($_POST['day25']==1)
			 {
				 $lunch_fri_open=1;
				 $lunch_fri_open_time=$_POST['lunch_fri_open'];
				 $lunch_fri_close_time=$_POST['lunch_fri_close'];
				 
			 }
			 else
			 {
				 $lunch_fri_open=0;
				 $lunch_fri_open_time='';
				 $lunch_fri_close_time='';
				 
			 }
			 if($_POST['day26']==1)
			 {
				 $lunch_sat_open=1;
				 $lunch_sat_open_time=$_POST['lunch_sat_open'];
				 $lunch_sat_close_time=$_POST['lunch_sat_close'];
				 
			 }
			 else
			 {
				 $lunch_sat_open=0;
				 $lunch_sat_open_time='';
				 $lunch_sat_close_time='';
				 
			 }
			 if($_POST['day27']==1)
			 {
				 $lunch_sun_open=1;
				 $lunch_sun_open_time=$_POST['lunch_sun_open'];
				 $lunch_sun_close_time=$_POST['lunch_sun_close'];
				 
			 }
			 else
			 {
				 $lunch_sun_open=0;
				 $lunch_sun_open_time='';
				 $lunch_sun_close_time='';
				 
			 }
			}
			 
			 else 
			 {
				 $lunch_available=0;
				 $lunch_mon_open=0;
				 $lunch_mon_open_time='';
				 $lunch_mon_close_time=''; 
				 $lunch_tue_open=0;
				 $lunch_tue_open_time='';
				 $lunch_tue_close_time='';
				 $lunch_wed_open=0;
				 $lunch_wed_open_time='';
				 $lunch_wed_close_time='';
				 $lunch_thu_open=0;
				 $lunch_thu_open_time='';
				 $lunch_thu_close_time='';
				 $lunch_fri_open=0;
				 $lunch_fri_open_time='';
				 $lunch_fri_close_time='';
				 $lunch_sat_open=0;
				 $lunch_sat_open_time='';
				 $lunch_sat_close_time='';
				 $lunch_sun_open=0;
				 $lunch_sun_open_time='';
				 $lunch_sun_close_time='';
			 }
			 
			 if($_POST['food4']==1)
			{
				 $dinner_available=1;
			 if($_POST['day31']==1)
			 {
				 $dinner_mon_open=1;
				 $dinner_mon_open_time=$_POST['dinner_mon_open'];
				 $dinner_mon_close_time=$_POST['dinner_mon_close'];
				 
			 }
			 else
			 {
				 $dinner_mon_open=0;
				 $dinner_mon_open_time='';
				 $dinner_mon_close_time='';
				 
			 }	
			 if($_POST['day32']==1)
			 {
				 $dinner_tue_open=1;
				 $dinner_tue_open_time=$_POST['dinner_tue_open'];
				 $dinner_tue_close_time=$_POST['dinner_tue_close'];
				 
			 }
			 else
			 {
				 $dinner_tue_open=0;
				 $dinner_tue_open_time='';
				 $dinner_tue_close_time='';
				 
			 }
			if($_POST['day33']==1)
			 {
				 $dinner_wed_open=1;
				 $dinner_wed_open_time=$_POST['dinner_wed_open'];
				 $dinner_wed_close_time=$_POST['dinner_wed_close'];
				 
			 }
			 else
			 {
				 $dinner_wed_open=0;
				 $dinner_wed_open_time='';
				 $dinner_wed_close_time='';
				 
			 }
			if($_POST['day34']==1)
			 {
				 $dinner_thu_open=1;
				 $dinner_thu_open_time=$_POST['dinner_thu_open'];
				 $dinner_thu_close_time=$_POST['dinner_thu_close'];
				 
			 }
			 else
			 {
				 $dinner_thu_open=0;
				 $dinner_thu_open_time='';
				 $dinner_thu_close_time='';
				 
			 }
			 if($_POST['day35']==1)
			 {
				 $dinner_fri_open=1;
				 $dinner_fri_open_time=$_POST['dinner_fri_open'];
				 $dinner_fri_close_time=$_POST['dinner_fri_close'];
				 
			 }
			 else
			 {
				 $dinner_fri_open=0;
				 $dinner_fri_open_time='';
				 $dinner_fri_close_time='';
				 
			 }
			 if($_POST['day36']==1)
			 {
				 $dinner_sat_open=1;
				 $dinner_sat_open_time=$_POST['dinner_sat_open'];
				 $dinner_sat_close_time=$_POST['dinner_sat_close'];
				 
			 }
			 else
			 {
				 $dinner_sat_open=0;
				 $dinner_sat_open_time='';
				 $dinner_sat_close_time='';
				 
			 }
			 if($_POST['day37']==1)
			 {
				 $dinner_sun_open=1;
				 $dinner_sun_open_time=$_POST['dinner_sun_open'];
				 $dinner_sun_close_time=$_POST['dinner_sun_close'];
				 
			 }
			 else
			 {
				 $dinner_sun_open=0;
				 $dinner_sun_open_time='';
				 $dinner_sun_close_time='';
				 
			 }
			}
			 
			 else 
			 {
				 $dinner_available=0;
				 $dinner_mon_open=0;
				 $dinner_mon_open_time='';
				 $dinner_mon_close_time=''; 
				 $dinner_tue_open=0;
				 $dinner_tue_open_time='';
				 $dinner_tue_close_time='';
				 $dinner_wed_open=0;
				 $dinner_wed_open_time='';
				 $dinner_wed_close_time='';
				 $dinner_thu_open=0;
				 $dinner_thu_open_time='';
				 $dinner_thu_close_time='';
				 $dinner_fri_open=0;
				 $dinner_fri_open_time='';
				 $dinner_fri_close_time='';
				 $dinner_sat_open=0;
				 $dinner_sat_open_time='';
				 $dinner_sat_close_time='';
				 $dinner_sun_open=0;
				 $dinner_sun_open_time='';
				 $dinner_sun_close_time='';
			 }
			
			
			if($_POST['food5']==1)
			{
				 $alcohol_available=1;
			 if($_POST['day41']==1)
			 {
				 $alcohol_mon_open=1;
				 $alcohol_mon_open_time=$_POST['alcohol_mon_open'];
				 $alcohol_mon_close_time=$_POST['alcohol_mon_close'];
				 
			 }
			 else
			 {
				 $alcohol_mon_open=0;
				 $alcohol_mon_open_time='';
				 $alcohol_mon_close_time='';
				 
			 }	
			 if($_POST['day42']==1)
			 {
				 $alcohol_tue_open=1;
				 $alcohol_tue_open_time=$_POST['alcohol_tue_open'];
				 $alcohol_tue_close_time=$_POST['alcohol_tue_close'];
				 
			 }
			 else
			 {
				 $alcohol_tue_open=0;
				 $alcohol_tue_open_time='';
				 $alcohol_tue_close_time='';
				 
			 }
			if($_POST['day43']==1)
			 {
				 $alcohol_wed_open=1;
				 $alcohol_wed_open_time=$_POST['alcohol_wed_open'];
				 $alcohol_wed_close_time=$_POST['alcohol_wed_close'];
				 
			 }
			 else
			 {
				 $alcohol_wed_open=0;
				 $alcohol_wed_open_time='';
				 $alcohol_wed_close_time='';
				 
			 }
			if($_POST['day44']==1)
			 {
				 $alcohol_thu_open=1;
				 $alcohol_thu_open_time=$_POST['alcohol_thu_open'];
				 $alcohol_thu_close_time=$_POST['alcohol_thu_close'];
				 
			 }
			 else
			 {
				 $alcohol_thu_open=0;
				 $alcohol_thu_open_time='';
				 $alcohol_thu_close_time='';
				 
			 }
			 if($_POST['day45']==1)
			 {
				 $alcohol_fri_open=1;
				 $alcohol_fri_open_time=$_POST['alcohol_fri_open'];
				 $alcohol_fri_close_time=$_POST['alcohol_fri_close'];
				 
			 }
			 else
			 {
				 $alcohol_fri_open=0;
				 $alcohol_fri_open_time='';
				 $alcohol_fri_close_time='';
				 
			 }
			 if($_POST['day46']==1)
			 {
				 $alcohol_sat_open=1;
				 $alcohol_sat_open_time=$_POST['alcohol_sat_open'];
				 $alcohol_sat_close_time=$_POST['alcohol_sat_close'];
				 
			 }
			 else
			 {
				 $alcohol_sat_open=0;
				 $alcohol_sat_open_time='';
				 $alcohol_sat_close_time='';
				 
			 }
			 if($_POST['day47']==1)
			 {
				 $alcohol_sun_open=1;
				 $alcohol_sun_open_time=$_POST['alcohol_sun_open'];
				 $alcohol_sun_close_time=$_POST['alcohol_sun_close'];
				  
			 }
			 else
			 {
				 $alcohol_sun_open=0;
				 $alcohol_sun_open_time='';
				 $alcohol_sun_close_time='';
				 
			 }
			}
			 
			 else 
			 {
				 $alcohol_available=0;
				 $alcohol_mon_open=0;
				 $alcohol_mon_open_time='';
				 $alcohol_mon_close_time=''; 
				 $alcohol_tue_open=0;
				 $alcohol_tue_open_time='';
				 $alcohol_tue_close_time='';
				 $alcohol_wed_open=0;
				 $alcohol_wed_open_time='';
				 $alcohol_wed_close_time='';
				 $alcohol_thu_open=0;
				 $alcohol_thu_open_time='';
				 $alcohol_thu_close_time='';
				 $alcohol_fri_open=0;
				 $alcohol_fri_open_time='';
				 $alcohol_fri_close_time='';
				 $alcohol_sat_open=0;
				 $alcohol_sat_open_time='';
				 $alcohol_sat_close_time='';
				 $alcohol_sun_open=0;
				 $alcohol_sun_open_time='';
				 $alcohol_sun_close_time='';
			 }
			 

			
			 $stmt = $dbCon->prepare("insert into resturant_work_information(resturant_id, created_on, breakfast_available, breakfast_mon_open, breakfast_mon_open_time, breakfast_mon_close_time, breakfast_tue_open, breakfast_tue_open_time, breakfast_tue_close_time, breakfast_wed_open, breakfast_wed_open_time, breakfast_wed_close_time, breakfast_thu_open, breakfast_thu_open_time, breakfast_thu_close_time, breakfast_fri_open, breakfast_fri_open_time, breakfast_fri_close_time, breakfast_sat_open, breakfast_sat_open_time, breakfast_sat_close_time, breakfast_sun_open, breakfast_sun_open_time, breakfast_sun_close_time, brunch_available, brunch_mon_open, brunch_mon_open_time, brunch_mon_close_time, brunch_tue_open, brunch_tue_open_time, brunch_tue_close_time, brunch_wed_open, brunch_wed_open_time, brunch_wed_close_time, brunch_thu_open, brunch_thu_open_time, brunch_thu_close_time, brunch_fri_open, brunch_fri_open_time, brunch_fri_close_time, brunch_sat_open, brunch_sat_open_time, brunch_sat_close_time, brunch_sun_open, brunch_sun_open_time, brunch_sun_close_time, lunch_available, lunch_mon_open, lunch_mon_open_time, lunch_mon_close_time, lunch_tue_open, lunch_tue_open_time, lunch_tue_close_time, lunch_wed_open, lunch_wed_open_time, lunch_wed_close_time, lunch_thu_open, lunch_thu_open_time, lunch_thu_close_time, lunch_fri_open, lunch_fri_open_time, lunch_fri_close_time, lunch_sat_open, lunch_sat_open_time, lunch_sat_close_time, lunch_sun_open, lunch_sun_open_time, lunch_sun_close_time, dinner_available, dinner_mon_open, dinner_mon_open_time, dinner_mon_close_time, dinner_tue_open, dinner_tue_open_time, dinner_tue_close_time, dinner_wed_open, dinner_wed_open_time, dinner_wed_close_time, dinner_thu_open, dinner_thu_open_time, dinner_thu_close_time, dinner_fri_open, dinner_fri_open_time, dinner_fri_close_time, dinner_sat_open, dinner_sat_open_time, dinner_sat_close_time, dinner_sun_open, dinner_sun_open_time, dinner_sun_close_time, alcohol_available, alcohol_mon_open, alcohol_mon_open_time, alcohol_mon_close_time, alcohol_tue_open, alcohol_tue_open_time, alcohol_tue_close_time, alcohol_wed_open, alcohol_wed_open_time, alcohol_wed_close_time, alcohol_thu_open, alcohol_thu_open_time, alcohol_thu_close_time, alcohol_fri_open, alcohol_fri_open_time, alcohol_fri_close_time, alcohol_sat_open, alcohol_sat_open_time, alcohol_sat_close_time, alcohol_sun_open, alcohol_sun_open_time, alcohol_sun_close_time)
			values(?, now(), ?, ?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ? , ?, ?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ? , ?, ?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ? , ?, ?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?)");
			$stmt->bind_param("iiissississississississiissississississississiissississississississiissississississississiissississississississ",$resturant_id, $breakfast_available, $breakfast_mon_open, $breakfast_mon_open_time, $breakfast_mon_close_time, $breakfast_tue_open, $breakfast_tue_open_time, $breakfast_tue_close_time, $breakfast_wed_open, $breakfast_wed_open_time, $breakfast_wed_close_time, $breakfast_thu_open, $breakfast_thu_open_time, $breakfast_thu_close_time, $breakfast_fri_open, $breakfast_fri_open_time, $breakfast_fri_close_time, $breakfast_sat_open, $breakfast_sat_open_time, $breakfast_sat_close_time, $breakfast_sun_open, $breakfast_sun_open_time, $breakfast_sun_close_time, $brunch_available, $brunch_mon_open, $brunch_mon_open_time, $brunch_mon_close_time, $brunch_tue_open, $brunch_tue_open_time, $brunch_tue_close_time, $brunch_wed_open, $brunch_wed_open_time, $brunch_wed_close_time, $brunch_thu_open, $brunch_thu_open_time, $brunch_thu_close_time, $brunch_fri_open, $brunch_fri_open_time, $brunch_fri_close_time, $brunch_sat_open, $brunch_sat_open_time, $brunch_sat_close_time, $brunch_sun_open, $brunch_sun_open_time, $brunch_sun_close_time, $lunch_available, $lunch_mon_open, $lunch_mon_open_time, $lunch_mon_close_time, $lunch_tue_open, $lunch_tue_open_time, $lunch_tue_close_time, $lunch_wed_open, $lunch_wed_open_time, $lunch_wed_close_time, $lunch_thu_open, $lunch_thu_open_time, $lunch_thu_close_time, $lunch_fri_open, $lunch_fri_open_time, $lunch_fri_close_time, $lunch_sat_open, $lunch_sat_open_time, $lunch_sat_close_time, $lunch_sun_open, $lunch_sun_open_time, $lunch_sun_close_time, $dinner_available, $dinner_mon_open, $dinner_mon_open_time, $dinner_mon_close_time, $dinner_tue_open, $dinner_tue_open_time, $dinner_tue_close_time, $dinner_wed_open, $dinner_wed_open_time, $dinner_wed_close_time, $dinner_thu_open, $dinner_thu_open_time, $dinner_thu_close_time, $dinner_fri_open, $dinner_fri_open_time, $dinner_fri_close_time, $dinner_sat_open, $dinner_sat_open_time, $dinner_sat_close_time, $dinner_sun_open, $dinner_sun_open_time, $dinner_sun_close_time, $alcohol_available, $alcohol_mon_open, $alcohol_mon_open_time, $alcohol_mon_close_time, $alcohol_tue_open, $alcohol_tue_open_time, $alcohol_tue_close_time, $alcohol_wed_open, $alcohol_wed_open_time, $alcohol_wed_close_time, $alcohol_thu_open, $alcohol_thu_open_time, $alcohol_thu_close_time, $alcohol_fri_open, $alcohol_fri_open_time, $alcohol_fri_close_time, $alcohol_sat_open, $alcohol_sat_open_time, $alcohol_sat_close_time, $alcohol_sun_open, $alcohol_sun_open_time, $alcohol_sun_close_time);
			 
			  
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
		
		function editWorkingTimeInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']); 
			 
			if($_POST['food1']==1)
			{
				 $breakfast_available=1;
				 $stmt = $dbCon->prepare("update resturant_available_dishes set is_available_item=1,serve_available=1 where resturant_id=? and serve_type=1");
				 $stmt->bind_param("i",$resturant_id);
				 $stmt->execute();
			 if($_POST['day1']==1)
			 {
				 $breakfast_mon_open=1;
				 $breakfast_mon_open_time=$_POST['breakfast_mon_open'];
				 $breakfast_mon_close_time=$_POST['breakfast_mon_close'];
				 
			 }
			 else
			 {
				 $breakfast_mon_open=0;
				 $breakfast_mon_open_time='';
				 $breakfast_mon_close_time='';
				 
			 }	
			 if($_POST['day2']==1)
			 {
				 $breakfast_tue_open=1;
				 $breakfast_tue_open_time=$_POST['breakfast_tue_open'];
				 $breakfast_tue_close_time=$_POST['breakfast_tue_close'];
				 
			 }
			 else
			 {
				 $breakfast_tue_open=0;
				 $breakfast_tue_open_time='';
				 $breakfast_tue_close_time='';
				 
			 }
			if($_POST['day3']==1)
			 {
				 $breakfast_wed_open=1;
				 $breakfast_wed_open_time=$_POST['breakfast_wed_open'];
				 $breakfast_wed_close_time=$_POST['breakfast_wed_close'];
				 
			 }
			 else
			 {
				 $breakfast_wed_open=0;
				 $breakfast_wed_open_time='';
				 $breakfast_wed_close_time='';
				 
			 }
			if($_POST['day4']==1)
			 {
				 $breakfast_thu_open=1;
				 $breakfast_thu_open_time=$_POST['breakfast_thu_open'];
				 $breakfast_thu_close_time=$_POST['breakfast_thu_close'];
				 
			 }
			 else
			 {
				 $breakfast_thu_open=0;
				 $breakfast_thu_open_time='';
				 $breakfast_thu_close_time='';
				 
			 }
			 if($_POST['day5']==1)
			 {
				 $breakfast_fri_open=1;
				 $breakfast_fri_open_time=$_POST['breakfast_fri_open'];
				 $breakfast_fri_close_time=$_POST['breakfast_fri_close'];
				 
			 }
			 else
			 {
				 $breakfast_fri_open=0;
				 $breakfast_fri_open_time='';
				 $breakfast_fri_close_time='';
				 
			 }
			 if($_POST['day6']==1)
			 {
				 $breakfast_sat_open=1;
				 $breakfast_sat_open_time=$_POST['breakfast_sat_open'];
				 $breakfast_sat_close_time=$_POST['breakfast_sat_close'];
				 
			 }
			 else
			 {
				 $breakfast_sat_open=0;
				 $breakfast_sat_open_time='';
				 $breakfast_sat_close_time='';
				 
			 }
			 if($_POST['day7']==1)
			 {
				 $breakfast_sun_open=1;
				 $breakfast_sun_open_time=$_POST['breakfast_sun_open'];
				 $breakfast_sun_close_time=$_POST['breakfast_sun_close'];
				  
			 }
			 else
			 {
				 $breakfast_sun_open=0;
				 $breakfast_sun_open_time='';
				 $breakfast_sun_close_time='';
				 
			 }
			}
			 
			 else 
			 {
				 $stmt = $dbCon->prepare("update resturant_available_dishes set is_available_item=0,serve_available=0 where resturant_id=? and serve_type=1");
				 $stmt->bind_param("i",$resturant_id);
				 $stmt->execute();
				 $breakfast_available=0;
				 $breakfast_mon_open=0;
				 $breakfast_mon_open_time='';
				 $breakfast_mon_close_time=''; 
				 $breakfast_tue_open=0;
				 $breakfast_tue_open_time='';
				 $breakfast_tue_close_time='';
				 $breakfast_wed_open=0;
				 $breakfast_wed_open_time='';
				 $breakfast_wed_close_time='';
				 $breakfast_thu_open=0;
				 $breakfast_thu_open_time='';
				 $breakfast_thu_close_time='';
				 $breakfast_fri_open=0;
				 $breakfast_fri_open_time='';
				 $breakfast_fri_close_time='';
				 $breakfast_sat_open=0;
				 $breakfast_sat_open_time='';
				 $breakfast_sat_close_time='';
				 $breakfast_sun_open=0;
				 $breakfast_sun_open_time='';
				 $breakfast_sun_close_time='';
			 }
			 
			if($_POST['food2']==1)
			{
				$stmt = $dbCon->prepare("update resturant_available_dishes set is_available_item=1,serve_available=1 where resturant_id=? and serve_type=2");
				 $stmt->bind_param("i",$resturant_id);
				 $stmt->execute();
				 $brunch_available=1;
			 if($_POST['day11']==1)
			 {
				 $brunch_mon_open=1;
				 $brunch_mon_open_time=$_POST['brunch_mon_open'];
				 $brunch_mon_close_time=$_POST['brunch_mon_close'];
				 
			 }
			 else
			 {
				 $brunch_mon_open=0;
				 $brunch_mon_open_time='';
				 $brunch_mon_close_time='';
				 
			 }	
			 if($_POST['day12']==1)
			 {
				 $brunch_tue_open=1;
				 $brunch_tue_open_time=$_POST['brunch_tue_open'];
				 $brunch_tue_close_time=$_POST['brunch_tue_close'];
				 
			 }
			 else
			 {
				 $brunch_tue_open=0;
				 $brunch_tue_open_time='';
				 $brunch_tue_close_time='';
				 
			 }
			if($_POST['day13']==1)
			 {
				 $brunch_wed_open=1;
				 $brunch_wed_open_time=$_POST['brunch_wed_open'];
				 $brunch_wed_close_time=$_POST['brunch_wed_close'];
				 
			 }
			 else
			 {
				 $brunch_wed_open=0;
				 $brunch_wed_open_time='';
				 $brunch_wed_close_time='';
				 
			 }
			if($_POST['day14']==1)
			 {
				 $brunch_thu_open=1;
				 $brunch_thu_open_time=$_POST['brunch_thu_open'];
				 $brunch_thu_close_time=$_POST['brunch_thu_close'];
				 
			 }
			 else
			 {
				 $brunch_thu_open=0;
				 $brunch_thu_open_time='';
				 $brunch_thu_close_time='';
				 
			 }
			 if($_POST['day15']==1)
			 {
				 $brunch_fri_open=1;
				 $brunch_fri_open_time=$_POST['brunch_fri_open'];
				 $brunch_fri_close_time=$_POST['brunch_fri_close'];
				 
			 }
			 else
			 {
				 $brunch_fri_open=0;
				 $brunch_fri_open_time='';
				 $brunch_fri_close_time='';
				 
			 }
			 if($_POST['day16']==1)
			 {
				 $brunch_sat_open=1;
				 $brunch_sat_open_time=$_POST['brunch_sat_open'];
				 $brunch_sat_close_time=$_POST['brunch_sat_close'];
				 
			 }
			 else
			 {
				 $brunch_sat_open=0;
				 $brunch_sat_open_time='';
				 $brunch_sat_close_time='';
				 
			 }
			 if($_POST['day17']==1)
			 {
				 $brunch_sun_open=1;
				 $brunch_sun_open_time=$_POST['brunch_sun_open'];
				 $brunch_sun_close_time=$_POST['brunch_sun_close'];
				 
			 }
			 else
			 {
				 $brunch_sun_open=0;
				 $brunch_sun_open_time='';
				 $brunch_sun_close_time='';
				 
			 }
			}
			 
			 else 
			 {
				 $stmt = $dbCon->prepare("update resturant_available_dishes set is_available_item=0,serve_available=0 where resturant_id=? and serve_type=2");
				 $stmt->bind_param("i",$resturant_id);
				 $stmt->execute();
				 $brunch_available=0;
				 $brunch_mon_open=0;
				 $brunch_mon_open_time='';
				 $brunch_mon_close_time=''; 
				 $brunch_tue_open=0;
				 $brunch_tue_open_time='';
				 $brunch_tue_close_time='';
				 $brunch_wed_open=0;
				 $brunch_wed_open_time='';
				 $brunch_wed_close_time='';
				 $brunch_thu_open=0;
				 $brunch_thu_open_time='';
				 $brunch_thu_close_time='';
				 $brunch_fri_open=0;
				 $brunch_fri_open_time='';
				 $brunch_fri_close_time='';
				 $brunch_sat_open=0;
				 $brunch_sat_open_time='';
				 $brunch_sat_close_time='';
				 $brunch_sun_open=0;
				 $brunch_sun_open_time='';
				 $brunch_sun_close_time='';
			 } 
			 
			 if($_POST['food3']==1)
			{
				$stmt = $dbCon->prepare("update resturant_available_dishes set is_available_item=1,serve_available=1 where resturant_id=? and serve_type=3");
				 $stmt->bind_param("i",$resturant_id);
				 $stmt->execute();
				 $lunch_available=1;
			 if($_POST['day21']==1)
			 {
				 $lunch_mon_open=1;
				 $lunch_mon_open_time=$_POST['lunch_mon_open'];
				 $lunch_mon_close_time=$_POST['lunch_mon_close'];
				 
			 }
			 else
			 {
				 $lunch_mon_open=0;
				 $lunch_mon_open_time='';
				 $lunch_mon_close_time='';
				 
			 }	
			 if($_POST['day22']==1)
			 {
				 $lunch_tue_open=1;
				 $lunch_tue_open_time=$_POST['lunch_tue_open'];
				 $lunch_tue_close_time=$_POST['lunch_tue_close'];
				 
			 }
			 else
			 {
				 $lunch_tue_open=0;
				 $lunch_tue_open_time='';
				 $lunch_tue_close_time='';
				 
			 }
			if($_POST['day23']==1)
			 {
				 $lunch_wed_open=1;
				 $lunch_wed_open_time=$_POST['lunch_wed_open'];
				 $lunch_wed_close_time=$_POST['lunch_wed_close'];
				 
			 }
			 else
			 {
				 $lunch_wed_open=0;
				 $lunch_wed_open_time='';
				 $lunch_wed_close_time='';
				 
			 }
			if($_POST['day24']==1)
			 {
				 $lunch_thu_open=1;
				 $lunch_thu_open_time=$_POST['lunch_thu_open'];
				 $lunch_thu_close_time=$_POST['lunch_thu_close'];
				 
			 }
			 else
			 {
				 $lunch_thu_open=0;
				 $lunch_thu_open_time='';
				 $lunch_thu_close_time='';
				 
			 }
			 if($_POST['day25']==1)
			 {
				 $lunch_fri_open=1;
				 $lunch_fri_open_time=$_POST['lunch_fri_open'];
				 $lunch_fri_close_time=$_POST['lunch_fri_close'];
				 
			 }
			 else
			 {
				 $lunch_fri_open=0;
				 $lunch_fri_open_time='';
				 $lunch_fri_close_time='';
				 
			 }
			 if($_POST['day26']==1)
			 {
				 $lunch_sat_open=1;
				 $lunch_sat_open_time=$_POST['lunch_sat_open'];
				 $lunch_sat_close_time=$_POST['lunch_sat_close'];
				 
			 }
			 else
			 {
				 $lunch_sat_open=0;
				 $lunch_sat_open_time='';
				 $lunch_sat_close_time='';
				 
			 }
			 if($_POST['day27']==1)
			 {
				 $lunch_sun_open=1;
				 $lunch_sun_open_time=$_POST['lunch_sun_open'];
				 $lunch_sun_close_time=$_POST['lunch_sun_close'];
				 
			 }
			 else
			 {
				 $lunch_sun_open=0;
				 $lunch_sun_open_time='';
				 $lunch_sun_close_time='';
				 
			 }
			}
			 
			 else 
			 {
				 $stmt = $dbCon->prepare("update resturant_available_dishes set is_available_item=0,serve_available=0 where resturant_id=? and serve_type=3");
				 $stmt->bind_param("i",$resturant_id);
				 $stmt->execute();
				 $lunch_available=0;
				 $lunch_mon_open=0;
				 $lunch_mon_open_time='';
				 $lunch_mon_close_time=''; 
				 $lunch_tue_open=0;
				 $lunch_tue_open_time='';
				 $lunch_tue_close_time='';
				 $lunch_wed_open=0;
				 $lunch_wed_open_time='';
				 $lunch_wed_close_time='';
				 $lunch_thu_open=0;
				 $lunch_thu_open_time='';
				 $lunch_thu_close_time='';
				 $lunch_fri_open=0;
				 $lunch_fri_open_time='';
				 $lunch_fri_close_time='';
				 $lunch_sat_open=0;
				 $lunch_sat_open_time='';
				 $lunch_sat_close_time='';
				 $lunch_sun_open=0;
				 $lunch_sun_open_time='';
				 $lunch_sun_close_time='';
			 }
			 
			 if($_POST['food4']==1)
			{
				$stmt = $dbCon->prepare("update resturant_available_dishes set is_available_item=1,serve_available=1 where resturant_id=? and serve_type=4");
				 $stmt->bind_param("i",$resturant_id);
				 $stmt->execute();
				 $dinner_available=1;
			 if($_POST['day31']==1)
			 {
				 $dinner_mon_open=1;
				 $dinner_mon_open_time=$_POST['dinner_mon_open'];
				 $dinner_mon_close_time=$_POST['dinner_mon_close'];
				 
			 }
			 else
			 {
				 
				 $dinner_mon_open=0;
				 $dinner_mon_open_time='';
				 $dinner_mon_close_time='';
				 
			 }	
			 if($_POST['day32']==1)
			 {
				 $dinner_tue_open=1;
				 $dinner_tue_open_time=$_POST['dinner_tue_open'];
				 $dinner_tue_close_time=$_POST['dinner_tue_close'];
				 
			 }
			 else
			 {
				 $dinner_tue_open=0;
				 $dinner_tue_open_time='';
				 $dinner_tue_close_time='';
				 
			 }
			if($_POST['day33']==1)
			 {
				 $dinner_wed_open=1;
				 $dinner_wed_open_time=$_POST['dinner_wed_open'];
				 $dinner_wed_close_time=$_POST['dinner_wed_close'];
				 
			 }
			 else
			 {
				 $dinner_wed_open=0;
				 $dinner_wed_open_time='';
				 $dinner_wed_close_time='';
				 
			 }
			if($_POST['day34']==1)
			 {
				 $dinner_thu_open=1;
				 $dinner_thu_open_time=$_POST['dinner_thu_open'];
				 $dinner_thu_close_time=$_POST['dinner_thu_close'];
				 
			 }
			 else
			 {
				 $dinner_thu_open=0;
				 $dinner_thu_open_time='';
				 $dinner_thu_close_time='';
				 
			 }
			 if($_POST['day35']==1)
			 {
				 $dinner_fri_open=1;
				 $dinner_fri_open_time=$_POST['dinner_fri_open'];
				 $dinner_fri_close_time=$_POST['dinner_fri_close'];
				 
			 }
			 else
			 {
				 $dinner_fri_open=0;
				 $dinner_fri_open_time='';
				 $dinner_fri_close_time='';
				 
			 }
			 if($_POST['day36']==1)
			 {
				 $dinner_sat_open=1;
				 $dinner_sat_open_time=$_POST['dinner_sat_open'];
				 $dinner_sat_close_time=$_POST['dinner_sat_close'];
				 
			 }
			 else
			 {
				 $dinner_sat_open=0;
				 $dinner_sat_open_time='';
				 $dinner_sat_close_time='';
				 
			 }
			 if($_POST['day37']==1)
			 {
				 $dinner_sun_open=1;
				 $dinner_sun_open_time=$_POST['dinner_sun_open'];
				 $dinner_sun_close_time=$_POST['dinner_sun_close'];
				 
			 }
			 else
			 {
				 $dinner_sun_open=0;
				 $dinner_sun_open_time='';
				 $dinner_sun_close_time='';
				 
			 }
			}
			 
			 else 
			 {
				 $stmt = $dbCon->prepare("update resturant_available_dishes set is_available_item=0,serve_available=0 where resturant_id=? and serve_type=4");
				 $stmt->bind_param("i",$resturant_id);
				 $stmt->execute();
				 $dinner_available=0;
				 $dinner_mon_open=0;
				 $dinner_mon_open_time='';
				 $dinner_mon_close_time=''; 
				 $dinner_tue_open=0;
				 $dinner_tue_open_time='';
				 $dinner_tue_close_time='';
				 $dinner_wed_open=0;
				 $dinner_wed_open_time='';
				 $dinner_wed_close_time='';
				 $dinner_thu_open=0;
				 $dinner_thu_open_time='';
				 $dinner_thu_close_time='';
				 $dinner_fri_open=0;
				 $dinner_fri_open_time='';
				 $dinner_fri_close_time='';
				 $dinner_sat_open=0;
				 $dinner_sat_open_time='';
				 $dinner_sat_close_time='';
				 $dinner_sun_open=0;
				 $dinner_sun_open_time='';
				 $dinner_sun_close_time='';
			 }
			
			
			if($_POST['food5']==1)
			{
				$stmt = $dbCon->prepare("update resturant_available_dishes set is_available_item=1,serve_available=1 where resturant_id=? and serve_type=5");
				 $stmt->bind_param("i",$resturant_id);
				 $stmt->execute();
				 $alcohol_available=1;
			 if($_POST['day41']==1)
			 {
				 $alcohol_mon_open=1;
				 $alcohol_mon_open_time=$_POST['alcohol_mon_open'];
				 $alcohol_mon_close_time=$_POST['alcohol_mon_close'];
				 
			 }
			 else
			 {
				 $alcohol_mon_open=0;
				 $alcohol_mon_open_time='';
				 $alcohol_mon_close_time='';
				 
			 }	
			 if($_POST['day42']==1)
			 {
				 $alcohol_tue_open=1;
				 $alcohol_tue_open_time=$_POST['alcohol_tue_open'];
				 $alcohol_tue_close_time=$_POST['alcohol_tue_close'];
				 
			 }
			 else
			 {
				 $alcohol_tue_open=0;
				 $alcohol_tue_open_time='';
				 $alcohol_tue_close_time='';
				 
			 }
			if($_POST['day43']==1)
			 {
				 $alcohol_wed_open=1;
				 $alcohol_wed_open_time=$_POST['alcohol_wed_open'];
				 $alcohol_wed_close_time=$_POST['alcohol_wed_close'];
				 
			 }
			 else
			 {
				 $alcohol_wed_open=0;
				 $alcohol_wed_open_time='';
				 $alcohol_wed_close_time='';
				 
			 }
			if($_POST['day44']==1)
			 {
				 $alcohol_thu_open=1;
				 $alcohol_thu_open_time=$_POST['alcohol_thu_open'];
				 $alcohol_thu_close_time=$_POST['alcohol_thu_close'];
				 
			 }
			 else
			 {
				 $alcohol_thu_open=0;
				 $alcohol_thu_open_time='';
				 $alcohol_thu_close_time='';
				 
			 }
			 if($_POST['day45']==1)
			 {
				 $alcohol_fri_open=1;
				 $alcohol_fri_open_time=$_POST['alcohol_fri_open'];
				 $alcohol_fri_close_time=$_POST['alcohol_fri_close'];
				 
			 }
			 else
			 {
				 $alcohol_fri_open=0;
				 $alcohol_fri_open_time='';
				 $alcohol_fri_close_time='';
				 
			 }
			 if($_POST['day46']==1)
			 {
				 $alcohol_sat_open=1;
				 $alcohol_sat_open_time=$_POST['alcohol_sat_open'];
				 $alcohol_sat_close_time=$_POST['alcohol_sat_close'];
				 
			 }
			 else
			 {
				 $alcohol_sat_open=0;
				 $alcohol_sat_open_time='';
				 $alcohol_sat_close_time='';
				 
			 }
			 if($_POST['day47']==1)
			 {
				 $alcohol_sun_open=1;
				 $alcohol_sun_open_time=$_POST['alcohol_sun_open'];
				 $alcohol_sun_close_time=$_POST['alcohol_sun_close'];
				  
			 }
			 else
			 {
				 $alcohol_sun_open=0;
				 $alcohol_sun_open_time='';
				 $alcohol_sun_close_time='';
				 
			 }
			}
			 
			 else 
			 {
				 $stmt = $dbCon->prepare("update resturant_available_dishes set is_available_item=0,serve_available=0 where resturant_id=? and serve_type=5");
				 $stmt->bind_param("i",$resturant_id);
				 $stmt->execute();
				 $alcohol_available=0;
				 $alcohol_mon_open=0;
				 $alcohol_mon_open_time='';
				 $alcohol_mon_close_time=''; 
				 $alcohol_tue_open=0;
				 $alcohol_tue_open_time='';
				 $alcohol_tue_close_time='';
				 $alcohol_wed_open=0;
				 $alcohol_wed_open_time='';
				 $alcohol_wed_close_time='';
				 $alcohol_thu_open=0;
				 $alcohol_thu_open_time='';
				 $alcohol_thu_close_time='';
				 $alcohol_fri_open=0;
				 $alcohol_fri_open_time='';
				 $alcohol_fri_close_time='';
				 $alcohol_sat_open=0;
				 $alcohol_sat_open_time='';
				 $alcohol_sat_close_time='';
				 $alcohol_sun_open=0;
				 $alcohol_sun_open_time='';
				 $alcohol_sun_close_time='';
			 }
			 
 
			
			 $stmt = $dbCon->prepare("update resturant_work_information set breakfast_available=?, breakfast_mon_open=?, breakfast_mon_open_time=?, breakfast_mon_close_time=?, breakfast_tue_open=?, breakfast_tue_open_time=?, breakfast_tue_close_time=?, breakfast_wed_open=?, breakfast_wed_open_time=?, breakfast_wed_close_time=?, breakfast_thu_open=?, breakfast_thu_open_time=?, breakfast_thu_close_time=?, breakfast_fri_open=?, breakfast_fri_open_time=?, breakfast_fri_close_time=?, breakfast_sat_open=?, breakfast_sat_open_time=?, breakfast_sat_close_time=?, breakfast_sun_open=?, breakfast_sun_open_time=?, breakfast_sun_close_time=?, brunch_available=?, brunch_mon_open=?, brunch_mon_open_time=?, brunch_mon_close_time=?, brunch_tue_open=?, brunch_tue_open_time=?, brunch_tue_close_time=?, brunch_wed_open=?, brunch_wed_open_time=?, brunch_wed_close_time=?, brunch_thu_open=?, brunch_thu_open_time=?, brunch_thu_close_time=?, brunch_fri_open=?, brunch_fri_open_time=?, brunch_fri_close_time=?, brunch_sat_open=?, brunch_sat_open_time=?, brunch_sat_close_time=?, brunch_sun_open=?, brunch_sun_open_time=?, brunch_sun_close_time=?, lunch_available=?, lunch_mon_open=?, lunch_mon_open_time=?, lunch_mon_close_time=?, lunch_tue_open=?, lunch_tue_open_time=?, lunch_tue_close_time=?, lunch_wed_open=?, lunch_wed_open_time=?, lunch_wed_close_time=?, lunch_thu_open=?, lunch_thu_open_time=?, lunch_thu_close_time=?, lunch_fri_open=?, lunch_fri_open_time=?, lunch_fri_close_time=?, lunch_sat_open=?, lunch_sat_open_time=?, lunch_sat_close_time=?, lunch_sun_open=?, lunch_sun_open_time=?, lunch_sun_close_time=?, dinner_available=?, dinner_mon_open=?, dinner_mon_open_time=?, dinner_mon_close_time=?, dinner_tue_open=?, dinner_tue_open_time=?, dinner_tue_close_time=?, dinner_wed_open=?, dinner_wed_open_time=?, dinner_wed_close_time=?, dinner_thu_open=?, dinner_thu_open_time=?, dinner_thu_close_time=?, dinner_fri_open=?, dinner_fri_open_time=?, dinner_fri_close_time=?, dinner_sat_open=?, dinner_sat_open_time=?, dinner_sat_close_time=?, dinner_sun_open=?, dinner_sun_open_time=?, dinner_sun_close_time=?, alcohol_available=?, alcohol_mon_open=?, alcohol_mon_open_time=?, alcohol_mon_close_time=?, alcohol_tue_open=?, alcohol_tue_open_time=?, alcohol_tue_close_time=?, alcohol_wed_open=?, alcohol_wed_open_time=?, alcohol_wed_close_time=?, alcohol_thu_open=?, alcohol_thu_open_time=?, alcohol_thu_close_time=?, alcohol_fri_open=?, alcohol_fri_open_time=?, alcohol_fri_close_time=?, alcohol_sat_open=?, alcohol_sat_open_time=?, alcohol_sat_close_time=?, alcohol_sun_open=?, alcohol_sun_open_time=?, alcohol_sun_close_time=? where resturant_id=? ");
			$stmt->bind_param("iissississississississiissississississississiissississississississiissississississississiissississississississi", $breakfast_available, $breakfast_mon_open, $breakfast_mon_open_time, $breakfast_mon_close_time, $breakfast_tue_open, $breakfast_tue_open_time, $breakfast_tue_close_time, $breakfast_wed_open, $breakfast_wed_open_time, $breakfast_wed_close_time, $breakfast_thu_open, $breakfast_thu_open_time, $breakfast_thu_close_time, $breakfast_fri_open, $breakfast_fri_open_time, $breakfast_fri_close_time, $breakfast_sat_open, $breakfast_sat_open_time, $breakfast_sat_close_time, $breakfast_sun_open, $breakfast_sun_open_time, $breakfast_sun_close_time, $brunch_available, $brunch_mon_open, $brunch_mon_open_time, $brunch_mon_close_time, $brunch_tue_open, $brunch_tue_open_time, $brunch_tue_close_time, $brunch_wed_open, $brunch_wed_open_time, $brunch_wed_close_time, $brunch_thu_open, $brunch_thu_open_time, $brunch_thu_close_time, $brunch_fri_open, $brunch_fri_open_time, $brunch_fri_close_time, $brunch_sat_open, $brunch_sat_open_time, $brunch_sat_close_time, $brunch_sun_open, $brunch_sun_open_time, $brunch_sun_close_time, $lunch_available, $lunch_mon_open, $lunch_mon_open_time, $lunch_mon_close_time, $lunch_tue_open, $lunch_tue_open_time, $lunch_tue_close_time, $lunch_wed_open, $lunch_wed_open_time, $lunch_wed_close_time, $lunch_thu_open, $lunch_thu_open_time, $lunch_thu_close_time, $lunch_fri_open, $lunch_fri_open_time, $lunch_fri_close_time, $lunch_sat_open, $lunch_sat_open_time, $lunch_sat_close_time, $lunch_sun_open, $lunch_sun_open_time, $lunch_sun_close_time, $dinner_available, $dinner_mon_open, $dinner_mon_open_time, $dinner_mon_close_time, $dinner_tue_open, $dinner_tue_open_time, $dinner_tue_close_time, $dinner_wed_open, $dinner_wed_open_time, $dinner_wed_close_time, $dinner_thu_open, $dinner_thu_open_time, $dinner_thu_close_time, $dinner_fri_open, $dinner_fri_open_time, $dinner_fri_close_time, $dinner_sat_open, $dinner_sat_open_time, $dinner_sat_close_time, $dinner_sun_open, $dinner_sun_open_time, $dinner_sun_close_time, $alcohol_available, $alcohol_mon_open, $alcohol_mon_open_time, $alcohol_mon_close_time, $alcohol_tue_open, $alcohol_tue_open_time, $alcohol_tue_close_time, $alcohol_wed_open, $alcohol_wed_open_time, $alcohol_wed_close_time, $alcohol_thu_open, $alcohol_thu_open_time, $alcohol_thu_close_time, $alcohol_fri_open, $alcohol_fri_open_time, $alcohol_fri_close_time, $alcohol_sat_open, $alcohol_sat_open_time, $alcohol_sat_close_time, $alcohol_sun_open, $alcohol_sun_open_time, $alcohol_sun_close_time,$resturant_id);
			 
			  
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
		
		function updateMobileMenu($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']); 
			if($_POST['food1']==1)
			{
			$pickup_available=1;
			if($_POST['day2']==1)
			 {
				 $pickup_cash=1;
			 }
			 else
			 {
				 $pickup_cash=0;
				 
			 }
			 
			 if($_POST['day3']==1)
			 {
				 $pickup_online_payment=1;
			 }
			 else
			 {
				 $pickup_online_payment=0;
				 
			 }
			}
			else
			{	
			$pickup_available=0;
			$pickup_cash=0;
			$pickup_online_payment=0;
			}
			
			
			if($_POST['food2']==1)
			{
			$delivery_available=1;
			if($_POST['day11']==1)
			 {
				 $delivery_credit_card=1;
			 }
			 else
			 {
				 $delivery_credit_card=0;
				 
			 }
			if($_POST['day12']==1)
			 {
				 $delivery_cash=1;
			 }
			 else
			 {
				 $delivery_cash=0;
				 
			 }
			 
			 if($_POST['day13']==1)
			 {
				 $delivery_online_payment=1;
			 }
			 else
			 {
				 $delivery_online_payment=0;
				 
			 }
			}
			else
			{	
			$delivery_available=0;
			$delivery_credit_card=0;
			$delivery_cash=0;
			$delivery_online_payment=0;
			}
			
			if($_POST['food3']==1)
			{
			$dining_available=1;
			if($_POST['day21']==1)
			 {
				 $dining_credit_card=1;
			 }
			 else
			 {
				 $dining_credit_card=0;
				 
			 }
			if($_POST['day22']==1)
			 {
				 $dining_cash=1;
			 }
			 else
			 {
				 $dining_cash=0;
				 
			 }
			 
			 if($_POST['day23']==1)
			 {
				 $dining_online_payment=1;
			 }
			 else
			 {
				 $dining_online_payment=0;
				 
			 }
			}
			else
			{	
			$dining_available=0;
			$dining_credit_card=0;
			$dining_cash=0;
			$dining_online_payment=0;
			}
			
			$stmt = $dbCon->prepare("update resturant_mobile_menu set pickup_available=?,pickup_cash=?,pickup_online_payment=?,delivery_available=?,delivery_credit_card=?,delivery_cash=?,delivery_online_payment=?,dining_available=?,dining_credit_card=?,dining_cash=?,dining_online_payment=? where resturant_id=?");
			$stmt->bind_param("iiiiiiiiiiii", $pickup_available,$pickup_cash,$pickup_online_payment,$delivery_available,$delivery_credit_card,$delivery_cash ,$delivery_online_payment, $dining_available,$dining_credit_card, $dining_cash, $dining_online_payment, $resturant_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function resturantDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select resturant_type,resturant_name,visiting_address,resturant_information.id  from resturant_information left join property_location on property_location.id=resturant_information.property_id where resturant_information.company_id=? limit 0,5");
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
		
		function addCategory($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']); 
			$c_name=htmlentities($_POST['c_name'],ENT_NOQUOTES, 'ISO-8859-1');
			if($_POST['location_id']==0)
			{
			$stmt = $dbCon->prepare("select max(place_of_display) as num from food_category where resturant_id=? and serve_id=?");
			$stmt->bind_param("ii", $resturant_id,$_POST['serve_type']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowLocation= $result->fetch_assoc();
			$place_of_display=$rowLocation['num']+1;
			}
			else
			{
				if($_POST['category_id']==0)
				{
				$stmt = $dbCon->prepare("select max(place_of_display) as num from food_category where resturant_id=? and serve_id=?");
				$stmt->bind_param("ii", $resturant_id,$_POST['serve_type']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowLocation= $result->fetch_assoc();
				$place_of_display=$rowLocation['num']+1;	
				}
				else
				{
					if($_POST['location_id']==1)
					{
					$stmt = $dbCon->prepare("select place_of_display  from food_category where id=?");
					$stmt->bind_param("i", $_POST['category_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$rowLocation= $result->fetch_assoc();
					$place_of_display=$rowLocation['place_of_display'];	
					$stmt = $dbCon->prepare("update food_category set place_of_display=place_of_display+1 where place_of_display>=? and resturant_id=? and serve_id=?");
					$stmt->bind_param("iii",$rowLocation['place_of_display'],$resturant_id,$_POST['serve_type']);
					$stmt->execute();
					}
					else
					{
					$stmt = $dbCon->prepare("select place_of_display  from food_category where id=?");
					$stmt->bind_param("i", $_POST['category_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$rowLocation= $result->fetch_assoc();
					$place_of_display=$rowLocation['place_of_display']+1;	
					$stmt = $dbCon->prepare("update food_category set place_of_display=place_of_display+1 where place_of_display>? and resturant_id=? and serve_id=?");
					$stmt->bind_param("iii",$rowLocation['place_of_display'],$resturant_id,$_POST['serve_type']);
					$stmt->execute();	
					}
				}
			}
			 $stmt = $dbCon->prepare("insert into food_category(resturant_id,serve_id,food_category,created_on,place_of_display)
			values(?, ?, ?, now(),?)");
			$stmt->bind_param("iisi",$resturant_id,$_POST['serve_type'],$c_name,$place_of_display);
			 
			 
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
		
		
		function deleteCategory($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$category_id= $this -> encrypt_decrypt('decrypt',$_POST['category_id']); 
			
			$stmt = $dbCon->prepare("select place_of_display,serve_id  from food_category where id=?");
			$stmt->bind_param("i", $category_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowLocation= $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update food_category set place_of_display=place_of_display-1 where place_of_display>? and resturant_id=? and serve_id=?");
			$stmt->bind_param("iii",$rowLocation['place_of_display'],$resturant_id,$rowLocation['serve_id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("delete from food_category where id=?");
			$stmt->bind_param("i",$category_id);
			 
			 
			if($stmt->execute())
			{
				
			$stmt = $dbCon->prepare("delete from resturant_available_dishes where resturant_id=? and category_food=?");
			$stmt->bind_param("ii",$resturant_id,$category_id);
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
		
		
		
		function foodCategories($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select food_category.id,food_category,serve_name  from food_category left join food_serve_type on food_serve_type.id=food_category.serve_id where resturant_id=?");
			$stmt->bind_param("i", $resturant_id);
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
		
		function resturantinfo($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select is_delivery_available,dress_code,table_reservation,pets_allowed, form_of_payment, broadcast_type, broadcast_channel, resturant_name,resturant_type, resturant_information.property_id,visiting_address,resturant_information.id  from resturant_information left join property_location on property_location.id=resturant_information.property_id where resturant_information.id=?");
			$stmt->bind_param("i", $resturant_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			 
			return $rowAvailable;
			
			
		}
		
		function reservationInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$reservation_id= $this -> encrypt_decrypt('decrypt',$data['resid']);
			$stmt = $dbCon->prepare("select *  from resturant_table_booking_info where id=?");
			$stmt->bind_param("i", $reservation_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			 
			return $rowAvailable;
			
			
		}
		
		function addResturant($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$dress_code=htmlentities($_POST['dress_code'],ENT_NOQUOTES, 'ISO-8859-1');
			$resturant_name=htmlentities($_POST['resturant_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$description=htmlentities($_POST['description'],ENT_NOQUOTES, 'ISO-8859-1');
			 if($_POST['broadcast_type']==0)
			 {
				$_POST['broadcast_type']=0;
				$_POST['broadcast_channel']='';
			 }
			 $stmt = $dbCon->prepare("insert into resturant_information(is_delivery_available,description,dress_code,table_reservation,pets_allowed, form_of_payment, broadcast_type, broadcast_channel, resturant_name,resturant_type, property_id,company_id,created_on, modified_on)
			values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now(), now())");
			$stmt->bind_param("issiisissiii",$_POST['delivery_available'],$description,$dress_code, $_POST['table_reservation'],$_POST['pets_allowed'], $_POST['payment_type'], $_POST['broadcast_type'],$_POST['broadcast_channel'], $resturant_name, $_POST['resturant_type'], $_POST['p_id'] ,$company_id);
			 
			 
			if($stmt->execute())
			{
				$id=$stmt->insert_id;
				$stmt = $dbCon->prepare("insert into resturant_work_information(resturant_id,created_on)values(?, now())");
				$stmt->bind_param("i",$id);
				$stmt->execute();
				$stmt = $dbCon->prepare("insert into resturant_mobile_menu(resturant_id,created_on)values(?, now())");
				$stmt->bind_param("i",$id);
				$stmt->execute();
				$stmt = $dbCon->prepare("insert into resturant_dining_hall (resturant_id, created_on) values (?,now())");
				$stmt->bind_param("i", $id);
				$stmt->execute();	
				$id1=$stmt->insert_id;
				$bed=1;
				$stmt = $dbCon->prepare("insert into resturant_dining_hall_tables (dining_hall_id,table_info, created_on) values (?,?,now())");
				$stmt->bind_param("ii", $id1,$bed);
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
		
		function updateResturant($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$dress_code=htmlentities($_POST['dress_code'],ENT_NOQUOTES, 'ISO-8859-1');
			$resturant_name=htmlentities($_POST['resturant_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$description=htmlentities($_POST['description'],ENT_NOQUOTES, 'ISO-8859-1');
			 if($_POST['broadcast_type']==0)
			 {
				$_POST['broadcast_type']=0;
				$_POST['broadcast_channel']='';
			 }
			 $stmt = $dbCon->prepare("update resturant_information set is_delivery_available=?,description=?,dress_code=?,table_reservation=?,pets_allowed=?, form_of_payment=?, broadcast_type=?, broadcast_channel=?, resturant_name=?,resturant_type=?, property_id=?, modified_on=now() where id=?");
			$stmt->bind_param("issiisissiii",$_POST['delivery_available'], $description,$dress_code, $_POST['table_reservation'],$_POST['pets_allowed'], $_POST['payment_type'], $_POST['broadcast_type'],$_POST['broadcast_channel'], $resturant_name, $_POST['resturant_type'], $_POST['p_id'] ,$resturant_id);
			 
			 
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
		
		function addDishCategory($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']); 
			
			$serve_available=1;	
			
			$a=explode(',',substr($_POST['food_type'],0,-1));
			foreach($a as $key)
			{
			 $stmt = $dbCon->prepare("insert into resturant_available_dishes(resturant_id,serve_type, category_food,dish_id,created_on,serve_available)
			values(?, ?, ?, ?, now(),?)");
			$stmt->bind_param("iiiii",$resturant_id, $_POST['serve_type'], $_POST['food_category'] ,$key,$serve_available);
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
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']); 
			$menu_id= $this -> encrypt_decrypt('decrypt',$data['mid']); 
		 
			$stmt = $dbCon->prepare("delete from resturant_available_dishes where id=?");
			$stmt->bind_param("i",$menu_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1; 
			 
		 
			
		}
		
		
		function updateMenuItem($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']); 
			$menu_id= $this -> encrypt_decrypt('decrypt',$data['mid']); 
			
			$stmt = $dbCon->prepare("select temp_available_item from resturant_available_dishes where id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $menu_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['temp_available_item']==1)
			{
				$val=0;
			}
			else
			{
				$val=1;
			}
			$stmt = $dbCon->prepare("update resturant_available_dishes set temp_available_item=? where id=?");
			$stmt->bind_param("ii",$val,$menu_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1; 
			 
		 
			
		}
		
	 function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		 
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=41");
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
		
	 function foodCategory($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from food_category");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowAvailable = $result->fetch_assoc())
			{
				array_push($org,$rowAvailable);
				 
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function allDishes($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			if($_POST['id']==5)
			{
				$food_drink=2;
			}
			else
			{
				$food_drink=1;
			}
			$stmt = $dbCon->prepare("select id,dish_name from dishes_detail_information where company_id=? and id not in(select dish_id from resturant_available_dishes where resturant_id=? and serve_type=?) and dish_type !=3 and dish_type !=4 and food_drink=?");
			$stmt->bind_param("iiii", $company_id,$resturant_id,$_POST['id'],$food_drink);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				$org=$org.'<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
															<input type="button" value="'.$rowAvailable['dish_name'].'" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd red_ff2828_bg fsz18 white_txt curp ffamily_avenir" onclick="addType('.$rowAvailable['id'].');" id="'.$rowAvailable['id'].'">
														</div>';
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function allCategories($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			if($_POST['id']==5)
			{
				$_POST['id']=1;
			}
			else
			{
				$_POST['id']=0;
			}
			$stmt = $dbCon->prepare("select id,food_category from food_category where serve_id=? order by place_of_display");
			$stmt->bind_param("i",$_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0">Select category</option>';
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				$org=$org.'<option value="'.$rowAvailable['id'].'">'.$rowAvailable['food_category'].'</option>';
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
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
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select distinct serve_type from resturant_available_dishes where resturant_id=?");
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
					$stmt = $dbCon->prepare("select resturant_available_dishes.id,dish_name,dish_detail,dish_image,dish_price,temp_available_item from resturant_available_dishes left join dishes_detail_information on dishes_detail_information.id=resturant_available_dishes.dish_id where resturant_id=? and serve_type=? and category_food=?");
					$stmt->bind_param("iii", $resturant_id,$row['serve_type'],$rowCategory['category_food']);
					$stmt->execute();
					$result2 = $stmt->get_result();
					while($rowDishes = $result2->fetch_assoc())
					{
						 $filename="../estorecss/".$rowDishes ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowDishes ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowDishes ['dish_image'].'.jpg' );  $imgs='../../../../'.$imgs; } else { $value_a="../../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../../html/usercontent/images/default-profile-pic.jpg"; }
					
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
	 
	  function menuItemDetailInformation($data)
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
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$item_id= $this -> encrypt_decrypt('decrypt',$data['mid']); 
			 
					$stmt = $dbCon->prepare("select resturant_available_dishes.id,dish_name,dish_detail,dish_image,dish_price,temp_available_item from resturant_available_dishes left join dishes_detail_information on dishes_detail_information.id=resturant_available_dishes.dish_id where resturant_available_dishes.id=?");
					$stmt->bind_param("i", $item_id);
					$stmt->execute();
					$result2 = $stmt->get_result();
					$rowDishes = $result2->fetch_assoc();
					 
						 $filename="../estorecss/".$rowDishes ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowDishes ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowDishes ['dish_image'].'.jpg' );  $imgs='../../../../../'.$imgs; } else { $value_a="../../../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../../../html/usercontent/images/default-profile-pic.jpg"; }
						 
						$rowDishes['enc']= $this -> encrypt_decrypt('encrypt',$rowDishes['id']);
						$rowDishes['dish_image']=$imgs;
						 
			$stmt->close();
			$dbCon->close();
			return $rowDishes;
			
			
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
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$roomservice_id= $this -> encrypt_decrypt('decrypt',$data['hid']);
			$stmt = $dbCon->prepare("select available_dishes from hotel_roomservice_resturant where id=?");
			$stmt->bind_param("i", $roomservice_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row= $result->fetch_assoc();
			$selected_dish=explode(',',$row['available_dishes']);
			
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
					$stmt = $dbCon->prepare("select resturant_available_dishes.id,dish_name,dish_detail,dish_image,dish_price,temp_available_item from resturant_available_dishes left join dishes_detail_information on dishes_detail_information.id=resturant_available_dishes.dish_id where resturant_id=? and serve_type=? and category_food=?");
					$stmt->bind_param("iii", $resturant_id,$row['serve_type'],$rowCategory['category_food']);
					$stmt->execute();
					$result2 = $stmt->get_result();
					while($rowDishes = $result2->fetch_assoc())
					{
						 $filename="../estorecss/".$rowDishes ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowDishes ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowDishes ['dish_image'].'.jpg' );  $imgs='../../../../'.$imgs; } else { $value_a="../../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../../html/usercontent/images/default-profile-pic.jpg"; }
						array_push($org[$j]['category'][$i]['dishes'],$rowDishes);
						
						if (in_array($rowDishes['id'], $selected_dish))
						{
						$org[$j]['category'][$i]['dishes'][$k]['is_selected']= 1;
						}
						else
						{
						$org[$j]['category'][$i]['dishes'][$k]['is_selected']= 0;	
						}
						
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
	 
	 
	 
	 
	 
	 function updateRoomServiceMenu($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$roomservice_id= $this -> encrypt_decrypt('decrypt',$data['hid']);
			$dishes=substr($_POST['available_dishes'],0,-1);
			$stmt = $dbCon->prepare("update hotel_roomservice_resturant set available_dishes=? where id=?");
			$stmt->bind_param("si",$dishes,$roomservice_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
	 
			function teamId($data)
		{
			
			return $this -> encrypt_decrypt('decrypt',$data['team_id']);
		}
		
		function appId()
		{
			
			return $this -> encrypt_decrypt('encrypt',41);
		}
		
		function appIdDropIn()
		{
			
			return $this -> encrypt_decrypt('encrypt',47);
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
		
		   
		function resturantCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from resturant_information where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		function resturantWorkCount($data)
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
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function resturantPaymentInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select * from resturant_mobile_menu where resturant_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $resturant_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into resturant_mobile_menu(resturant_id,created_on)values(?, now())");
			$stmt->bind_param("i",$resturant_id);	
			$stmt->execute();
			$stmt = $dbCon->prepare("select * from resturant_mobile_menu where resturant_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $resturant_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();	
			}
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
	   function moreResturantDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select resturant_type,resturant_name,visiting_address,resturant_information.id  from resturant_information left join property_location on property_location.id=resturant_information.property_id where resturant_information.company_id=? limit ?,? ");
			
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
				$org=$org.'<a href="../editResturantInformation/'.$data['cid'].'/'.$enc.'"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.'  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 hidden-xs "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['resturant_name'],0,1).'</div>
																	</div>
													
													<div class="fleft wi_60   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">'.$row['resturant_name'].'</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">'.$row['visiting_address'].'</span>  </div>
													
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
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
		 function moreReservationList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select resturant_table_booking_info.id,company_size,concat_ws(' ',first_name,last_name) as name from resturant_table_booking_info left join user_logins on user_logins.id=resturant_table_booking_info.user_id where resturant_id=? and is_confirmed=0 limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $resturant_id,$a,$b);
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
				$org=$org.'<a href="../../selectTables/'.$data['cid'].'/'.$data['rid'].'/'.$enc.'"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.'  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 hidden-xs "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['name'],0,1).'</div>
																	</div>
													
													<div class="fleft wi_60   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">'.$row['name'].'</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">Company size - '.$row['company_size'].'</span>  </div>
													
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
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
		
		 function moreReservationConfirmedList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select resturant_table_booking_info.id,company_size,concat_ws(' ',first_name,last_name) as name from resturant_table_booking_info left join user_logins on user_logins.id=resturant_table_booking_info.user_id where resturant_id=?  and is_confirmed=1  and is_confirmed=0  limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $resturant_id,$a,$b);
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
				$org=$org.'<a href="#"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.'  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 hidden-xs "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['name'],0,1).'</div>
																	</div>
													
													<div class="fleft wi_60   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">'.$row['name'].'</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">Company size - '.$row['company_size'].'</span>  </div>
													
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
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
		
		function reservationList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select resturant_table_booking_info.id,company_size,concat_ws(' ',first_name,last_name) as name from resturant_table_booking_info left join user_logins on user_logins.id=resturant_table_booking_info.user_id where resturant_id=? and is_confirmed=0 limit 0,5");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $resturant_id); 
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
		
		
		function reservationListCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select count(id) as num from resturant_table_booking_info  where resturant_id=?  and is_confirmed=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $resturant_id); 
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		
		function reservationConfirmedList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select resturant_table_booking_info.id,company_size,concat_ws(' ',first_name,last_name) as name from resturant_table_booking_info left join user_logins on user_logins.id=resturant_table_booking_info.user_id where resturant_id=? and is_confirmed=1 limit 0,5");
			
			/* bind parameters for markers */
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
		
		
		function reservationConfirmedListCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$resturant_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select count(id) as num from resturant_table_booking_info  where resturant_id=?  and is_confirmed=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $resturant_id); 
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