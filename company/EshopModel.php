<?php
	require_once('../AppModel.php');
	class EshopModel extends AppModel
	{
		function displayPhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select count(company_id) as num from eshop_photo_info where company_id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select eshop_photo_path,sorting_number,id from eshop_photo_info where company_id=? order by sorting_number ");
			$stmt->bind_param("i", $company_id);
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
				
				 $filename="../estorecss/".$row1 ['eshop_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['eshop_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['eshop_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
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
																	  <img class="photo-tile__image" src="../../../'.$image.'" alt="Photo 1">
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
		
		
		
			function getImageInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			 $stmt = $dbCon->prepare("select eshop_photo_path,sorting_number,id from eshop_photo_info where id=? ");
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
				 
			
				
				 $filename="../estorecss/".$row1 ['eshop_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['eshop_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['eshop_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org='<a class="lightbox__img-nav false"></a><img class="lightbox__img" src="../../../'.$image.'">'; 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function updatePhotoOrder($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select sorting_number from eshop_photo_info where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$newSort=$row['sorting_number']+$_POST['addDelete'];
			
			
			$stmt = $dbCon->prepare("select id from eshop_photo_info where sorting_number=? and company_id=?");
			$stmt->bind_param("ii", $newSort,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();	
			
			$stmt = $dbCon->prepare("update eshop_photo_info set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row['sorting_number'], $row1['id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("update eshop_photo_info set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $_POST['photoId']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updatePhotoDragging($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select sorting_number from eshop_photo_info where id=?");
			$stmt->bind_param("i", $_POST['draggedItem']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select sorting_number from eshop_photo_info where id=?");
			$stmt->bind_param("i", $_POST['draggedTarget']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();
			 
			if($row1['sorting_number']>$row['sorting_number'])
			{
			$stmt = $dbCon->prepare("select id,sorting_number from eshop_photo_info where sorting_number>? and id<=? and company_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
			$newSort=$rowUpdate['sorting_number']-1;
			$stmt = $dbCon->prepare("update eshop_photo_info set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			else
			{
			$stmt = $dbCon->prepare("select id,sorting_number from eshop_photo_info where sorting_number<? and id>=? and company_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
				$newSort=$rowUpdate['sorting_number']+1;
			$stmt = $dbCon->prepare("update eshop_photo_info set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			
			$stmt = $dbCon->prepare("update eshop_photo_info set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row1['sorting_number'], $_POST['draggedItem']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function deletePhoto($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select sorting_number from eshop_photo_info where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("delete from  eshop_photo_info where id=?");
			$stmt->bind_param("i",$_POST['photoId']);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select id,sorting_number from eshop_photo_info where sorting_number>? and company_id=?");
			$stmt->bind_param("ii", $row['sorting_number'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row1 = $result->fetch_assoc())	
			{
				$newSort=$row1['sorting_number']-1;
			$stmt = $dbCon->prepare("update eshop_photo_info set sorting_number=? where id=?");
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
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$data1 = strip_tags($_POST['update_info']);
			define('UPLOAD_DIR','../estorecss/'); 
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			
			$stmt = $dbCon->prepare("select count(company_id) as num from eshop_photo_info where company_id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$snumber=$row['num']+1;
			
			$stmt = $dbCon->prepare("insert into eshop_photo_info (eshop_photo_path,company_id,sorting_number) values(?, ?, ?)");
			$stmt->bind_param("sii",$img_name1, $company_id,$snumber);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		
		function addService($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			$a=explode(',',substr($_POST['service_type'],0,-1));
			foreach($a as $key)
			{
			 $stmt = $dbCon->prepare("insert into eshop_available_services(company_id, category_id,service_id,created_on)
			values(?, ?, ?, now())");
			$stmt->bind_param("iii",$company_id, $_POST['w_category'] ,$key);
			$stmt->execute();
			 
			}
		  
			$stmt->close();
			$dbCon->close();
			return 1; 
			 
		 
			
		}
		function locationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$d_warning=explode(',',$data['locations']);
			$stmt = $dbCon->prepare("select property_location.id,property_name,visiting_address from property_location left join property on property.id=property_location.property_id where company_id=? and is_headquarter=0 order by created_on desc limit 0,50");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
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
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				 
				$j++;
			}
		 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function companyWorkCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_work_information where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		
		function eshopAboutCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from eshop_about_information where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into eshop_about_information(company_id,created_on)values(?, now())");
			$stmt->bind_param("i",$company_id);	
			$stmt->execute();
			$stmt = $dbCon->prepare("select * from eshop_about_information where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();	
			}
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		function updateAboutInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("update eshop_about_information set is_physical_location=?,physical_location=? where company_id=?");
			$stmt->bind_param("isi",$_POST['is_physical_location'],$_POST['location_physical'],$company_id);	
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		
		function deleteMenuItem($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			$menu_id= $this -> encrypt_decrypt('decrypt',$data['mid']); 
		   
			$stmt = $dbCon->prepare("delete from eshop_available_services where id=?");
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
			
			$stmt = $dbCon->prepare("select distinct category_id,category_name,place_of_display from eshop_available_services left join eshop_categories on eshop_categories.id=eshop_available_services.category_id where eshop_available_services.company_id=? order by place_of_display");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row= $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['dishes']=array();
				$i=0;
				 	$stmt = $dbCon->prepare("select eshop_available_services.id,dish_name,dish_detail,dish_image,dish_price from eshop_available_services left join dishes_detail_information on dishes_detail_information.id=eshop_available_services.service_id where eshop_available_services.company_id=? and category_id=?");
					$stmt->bind_param("ii", $company_id,$row['category_id']);
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
	 
		
		
		function allServices($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id,dish_name from dishes_detail_information where company_id=? and id not in(select service_id from eshop_available_services where company_id=?)");
			$stmt->bind_param("ii", $company_id,$company_id);
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
		function addCategory($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			$c_name=htmlentities($_POST['c_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$c_disc=htmlentities($_POST['c_discription'],ENT_NOQUOTES, 'ISO-8859-1');
			 
			if($_POST['location_id']==0)
			{
			$stmt = $dbCon->prepare("select max(place_of_display) as num from eshop_categories where company_id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowLocation= $result->fetch_assoc();
			$place_of_display=$rowLocation['num']+1;
			}
			else
			{
				if($_POST['category_id']==0)
				{
				$stmt = $dbCon->prepare("select max(place_of_display) as num from eshop_categories where company_id=?");
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowLocation= $result->fetch_assoc();
				$place_of_display=$rowLocation['num']+1;	
				}
				else
				{
					if($_POST['location_id']==1)
					{
					$stmt = $dbCon->prepare("select place_of_display  from eshop_categories where id=?");
					$stmt->bind_param("i", $_POST['category_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$rowLocation= $result->fetch_assoc();
					$place_of_display=$rowLocation['place_of_display'];	
					$stmt = $dbCon->prepare("select id,place_of_display  from eshop_categories where company_id=? and place_of_display>=?");
					$stmt->bind_param("ii",$company_id, $place_of_display);
					$stmt->execute();
					$result = $stmt->get_result();
					while($rowUpdate= $result->fetch_assoc())
					{
					$p=$rowUpdate['place_of_display']+1;
					$stmt = $dbCon->prepare("update eshop_categories set place_of_display=? where id=?");
					$stmt->bind_param("ii",$p,$rowUpdate['id']);
					$stmt->execute();
					}
					}
					else
					{
					$stmt = $dbCon->prepare("select place_of_display  from eshop_categories where id=?");
					$stmt->bind_param("i", $_POST['category_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$rowLocation= $result->fetch_assoc();
					$place_of_display=$rowLocation['place_of_display']+1;	
					$stmt = $dbCon->prepare("select id,place_of_display  from eshop_categories where company_id=? and place_of_display>=?");
					$stmt->bind_param("ii",$company_id, $place_of_display);
					$stmt->execute();
					$result = $stmt->get_result();
					while($rowUpdate= $result->fetch_assoc())
					{
					$p=$rowUpdate['place_of_display']+1;
					$stmt = $dbCon->prepare("update eshop_categories set place_of_display=? where id=?");
					$stmt->bind_param("ii",$p,$rowUpdate['id']);
					$stmt->execute();
					}
					}
				}
			}
			
			 $stmt = $dbCon->prepare("insert into eshop_categories(company_id,category_name,created_on,modified_on,place_of_display,category_discription)	values(?, ?, now(), now(), ?, ?)");
			$stmt->bind_param("isis",$company_id,$c_name,$place_of_display,$c_disc);
			 
			 
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
		
		function editCategory($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$category_id= $this -> encrypt_decrypt('decrypt',$data['cateid']);
			 
			$c_name=htmlentities($_POST['c_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$c_disc=htmlentities($_POST['c_discription'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("select place_of_display  from eshop_categories where id=?");
			$stmt->bind_param("i", $category_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCate= $result->fetch_assoc(); 
			 $catPlace=$category_id+1;
				if($_POST['category_id']==0 || $_POST['category_id']== $catPlace)
				{
				$place_of_display=$rowCate['place_of_display'];	
				}
				else
				{
					
				 
					$stmt = $dbCon->prepare("select id,place_of_display  from eshop_categories where company_id=? and place_of_display>?");
					$stmt->bind_param("ii",$company_id, $rowCate['place_of_display']);
					$stmt->execute();
					$result = $stmt->get_result();
					while($rowUpdate= $result->fetch_assoc())
					{
					$p=$rowUpdate['place_of_display']-1;
					$stmt = $dbCon->prepare("update eshop_categories set place_of_display=? where id=?");
					$stmt->bind_param("ii",$p,$rowUpdate['id']);
					$stmt->execute();
					}	
					 
					
					if($_POST['location_id']==1)
					{
					$stmt = $dbCon->prepare("select place_of_display  from eshop_categories where id=?");
					$stmt->bind_param("i", $_POST['category_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$rowLocation= $result->fetch_assoc();
					$place_of_display=$rowLocation['place_of_display'];	
					
					$stmt = $dbCon->prepare("select id,place_of_display  from eshop_categories where company_id=? and id>=?");
					$stmt->bind_param("ii",$company_id, $_POST['category_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					while($rowUpdate= $result->fetch_assoc())
					{
					$p=$rowUpdate['place_of_display']+1;
					$stmt = $dbCon->prepare("update eshop_categories set place_of_display=? where id=?");
					$stmt->bind_param("ii",$p,$rowUpdate['id']);
					$stmt->execute();
					}
					}
					else
					{
					$stmt = $dbCon->prepare("select place_of_display  from eshop_categories where id=?");
					$stmt->bind_param("i", $_POST['category_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$rowLocation= $result->fetch_assoc();
					$place_of_display=$rowLocation['place_of_display']+1;
					$stmt = $dbCon->prepare("select id,place_of_display  from eshop_categories where company_id=? and place_of_display>=?");
					$stmt->bind_param("ii",$company_id, $place_of_display);
					$stmt->execute();
					$result = $stmt->get_result();
					while($rowUpdate= $result->fetch_assoc())
					{
					$p=$rowUpdate['place_of_display']+1;
					$stmt = $dbCon->prepare("update eshop_categories set place_of_display=? where id=?");
					$stmt->bind_param("ii",$p,$rowUpdate['id']);
					$stmt->execute();
					}
					}
				}
			
			
			 $stmt = $dbCon->prepare("update eshop_categories set category_name=?,modified_on=now(),place_of_display=?,category_discription=? where id=?");
			$stmt->bind_param("sisi",$c_name,$place_of_display,$c_disc,$category_id);
			 
			 
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
			
			$stmt = $dbCon->prepare("delete from eshop_categories where id=?");
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
		
		 
	
		 function eshopCategories($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,category_name  from eshop_categories  where company_id=? order by place_of_display");
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
		
		function eshopEditCategories($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$category_id= $this -> encrypt_decrypt('decrypt',$data['cateid']);
			$stmt = $dbCon->prepare("select id,category_name,place_of_display  from eshop_categories  where company_id=? and id!=? order by place_of_display");
			$stmt->bind_param("ii", $company_id,$category_id);
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
		
		  function EshopCategoriesDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$category_id= $this -> encrypt_decrypt('decrypt',$data['cateid']);
			$stmt = $dbCon->prepare("select * from eshop_categories  where id=?");
			$stmt->bind_param("i", $category_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $rowAvailable;
			
			
		}
		
		  function eshopCategoriesLimit($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,category_name  from eshop_categories  where company_id=? order by place_of_display limit 0,10");
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
		
		  function moreEshopCategories($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select eshop_categories.id,category_name,company_name  from eshop_categories left join companies on companies.id=eshop_categories.company_id  where company_id=? order by place_of_display limit ?,?");
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			if($a%2==0)
				{
					$i=1;
				}
				else
				{
					$i=0;
				} 
			while($rowAvailable = $result->fetch_assoc())
			{
				if($i%2==0)
				{
					$bg='white_bg';
				}
				else
				{
					$bg='lgtgrey_bg';
				} 
				$enc= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.'   bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($rowAvailable['category_name'],0,1).'</div>
																	</div>
													
												<a href="../serviceInformation/'.$data['cid'].'">	<div class="fleft  wi_60     xs-mar0  ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">'.substr($rowAvailable['company_name'],0,18).'</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">'.$rowAvailable['category_name'].'</span>  </div></a>
													 
											 
													
													 <a href="../serviceInformation/'.$data['cid'].'"><div class="hidden-xs fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40    padb0">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div></a>
													<a href="../categoriesInfoEdit/'.$data['cid'].'/'.$enc.'">	 <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40    padb0">
														  <span class="far fa-edit txt_cfdbea" aria-hidden="true"></span> 
													</div></a>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
											 ';
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		 function eshopCategoriesCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from eshop_categories  where company_id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $rowAvailable;
			
			
		}
		
	 function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$country_id= $data['country_id'];
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=44");
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
			
			return $this -> encrypt_decrypt('encrypt',44);
		}
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=44");
			
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