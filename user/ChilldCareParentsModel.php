<?php

	require_once('../AppModel.php');
	class ChilldCareParentsModel extends AppModel
	{
		
			
		function dayCareDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select company_name,visiting_address from property_location left join companies on companies.id=property_location.company_id where company_id=? and is_headquarter=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		
		
		function childrenDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$parent_id= $this -> encrypt_decrypt('decrypt',$data['parent_id']);
			$stmt = $dbCon->prepare("select blood_group,allergic,child_image_path,id,address,first_name,last_name,concat_ws(' ', first_name, last_name) as name,social_number,created_on,company_id  from child_care_info where id=(select child_id from parent_info where id=?)");
			/* bind parameters for markers */
			$stmt->bind_param("i", $parent_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			$row = $result->fetch_assoc();
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['company_id']);
			$row['child_id']= $this -> encrypt_decrypt('encrypt',$row['id']);	
			
			$stmt->close();
			$dbCon->close();
			return $row;
			}
			
			
			function childrenDetailAll($data)
		{
			$dbCon = AppModel::createConnection();
			$parent_id= $this -> encrypt_decrypt('decrypt',$data['parent_id']);
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select parent_info.id as parent_id,child_care_info.id,address,first_name,last_name,concat_ws(' ', first_name, last_name) as name,social_number,child_care_info.created_on,company_id  from child_care_info left join parent_info on parent_info.child_id=child_care_info.id where child_care_info.id in (select child_id from parent_info where parent_ssn=(select parent_ssn from parent_info where id=?)) and child_care_info.company_id=? and parent_ssn=(select parent_ssn from parent_info where id=?)");
			/* bind parameters for markers */
			$stmt->bind_param("iii", $parent_id,$company_id,$parent_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
			array_push($org,$row);
			$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['parent_id']);
			$j++;
			}	
			
			$stmt->close();
			$dbCon->close();
			return $org;
			}
			
	
		
		
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=35");
			
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
			
			
			$stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image,ssn from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id = ?");
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
		function updateParent($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("update parent_info set parent_user_id= ? where parent_ssn=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("is", $data['user_id'],$data['ssn']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
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
		
			function parentDetail($data)
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
			$stmt = $dbCon->prepare("select passport_image,parent_ssn,concat_ws(' ', user_logins.first_name, user_logins.last_name) as name,concat_ws(' ', child_care_info.first_name, child_care_info.last_name) as child_name,user_logins.first_name,user_logins.last_name,company_name from parent_info left join child_care_info on child_care_info.id=parent_info.child_id left join user_logins on user_logins.id=parent_info.parent_user_id left join companies on companies.id=child_care_info.company_id  where parent_info.child_id in (select id from child_care_info where company_id=?)  and is_approved=1 order by parent_info.created_on limit 0,10");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				if($row ['passport_image']!=null) { $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $org[$j]['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $org[$j]['image_path']="../html/usercontent/images/person-male.png"; } }  else $org[$j]['image_path']="../html/usercontent/images/person-male.png";
				$j++;
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
			function moreParentDetail($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
			}
			$a=$_POST['id']*10+1;
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select passport_image,parent_ssn,concat_ws(' ', user_logins.first_name, user_logins.last_name) as name,concat_ws(' ', child_care_info.first_name, child_care_info.last_name) as child_name,user_logins.first_name,user_logins.last_name,company_name from parent_info left join child_care_info on child_care_info.id=parent_info.child_id left join user_logins on user_logins.id=parent_info.parent_user_id left join companies on companies.id=child_care_info.company_id  where parent_info.child_id in (select id from child_care_info where company_id=?)  and is_approved=1 order by parent_info.created_on limit ?,10");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$a);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				
				if($row ['passport_image']!=null) { $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $row['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $row['image_path']="../html/usercontent/images/person-male.png"; } }  else $row['image_path']="../html/usercontent/images/person-male.png";
				$org=$org.'<div class="xs-wi_100 xsip-wi_33 sm-wi_33 wi_25 fleft bs_bb padrb20 talc  hidden-xs">
													<div class="toggle-parent wi_100 dflex alit_s">
														<div class="wi_100 dnone_pa ">
															<a href="#" class="style_base hei_180p dblock bs_bb pad15  brdclr_seggreen_h brdrad5 lgtgrey2_bg_h  box_shadow trans_all2 ">
																<div class=" ">
																	<div class="wi_100 hei_90p dflex bs_bb">
																		<img src="../../../'.$row['image_path'].'" height="90" width="90" class="brdrad5 padb0">
																	</div>
																	
																	<div class="padt10">
																	<span class="dblock tall marb5 padt10 midgrey_txt fsz14  ffamily_avenir">'.html_entity_decode($row['child_name']).'</span>
																		<h3 class="ovfl_hid tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt0 ffamily_avenir">'.$row['name'].'</h3>
																		
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>  
												
													<div class="column_m container  marb5   fsz14 dark_grey_txt visible-xs">
													<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padt15 padb20  brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10   "> 
																	
																	<div class="wi_50p xs-wi_100 hei_50p xs-hei_45p "><img src="../../../'.$row['image_path'].'" width="45px;" height="45px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></div>
													
									<div class="fleft wi_50 xxs-wi_60 sm-wi_50 xsip-wi_50   "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir">'.html_entity_decode($row['child_name']).'</span>
									<span class="trn fsz18  black_txt ffamily_avenir  ">'.$row['name'].'</span>  </div>
													
													
													
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
		
		
		function selectCountry()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name  from country where id>0 and id<240 order by country_name");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			$contry = array();
			while ($row = $result->fetch_assoc()) {
				
				array_push($contry, $row);
			}
			return $contry;
			$stmt->close();
			$dbCon->close();
			
		}
		}						