<?php
	require_once('../AppModel.php');
	class ReceivedChildModel extends AppModel
	{
		function appId()
		{
			
			return $this -> encrypt_decrypt('encrypt',33);
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
		
		function updateAdmin($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id from companies where user_login_id=? and id=?");
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
			$stmt = $dbCon->prepare("select id,permission from manage_employee_permissions where user_id=? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $data['user_id'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
			$stmt = $dbCon->prepare("select id,user_login_id from employees where company_id=? and user_login_id not in (select user_id from manage_employee_permissions where company_id=?)");
			/* bind parameters for markers */
			
			$stmt->bind_param("ii",$company_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into manage_employee_permissions (user_id,company_id,page_id,created_date,modified_date,employee_id) values(?, ?, ?, now(),now(),?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iiii",$row['user_login_id'],$company_id,$data['page_id'],$row['id']);
			$stmt->execute();
			}
			}
			else
			{
			$stmt = $dbCon->prepare("select id,user_login_id from employees where company_id=? and user_login_id=?");
			/* bind parameters for markers */
			
			$stmt->bind_param("ii",$company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
		
		
			$stmt = $dbCon->prepare("insert into manage_employee_permissions (is_admin, employee_id, permission, user_id, company_id, page_id, created_date, modified_date ) values(?, ?, ?, ?, ?, ?, now(),now())");
			/* bind parameters for markers */
			$cont=1;
			
		
			$stmt->bind_param("iiiiii",$cont,$row['id'],$cont,$data['user_id'],$company_id,$data['page_id']);
			$stmt->execute();
			$stmt = $dbCon->prepare("select id,user_login_id from employees where company_id=? and user_login_id not in (select user_id from manage_employee_permissions where company_id=?)");
			/* bind parameters for markers */
			
			$stmt->bind_param("ii",$company_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into manage_employee_permissions (user_id,company_id,page_id,created_date,modified_date,employee_id) values(?, ?, ?, now(),now(),?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iiii",$row['user_login_id'],$company_id,$data['page_id'],$row['id']);
			$stmt->execute();
			}
			}
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			
			}
		
		function daycareRequestCount($data)
		{
				$dbCon = AppModel::createConnection();
				$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
				$user_id=$data['user_id'];
				
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
		
		
		function childrenDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			//echo $child_id; die;
			$stmt = $dbCon->prepare("select blood_group,allergic,id,address,first_name,last_name,concat_ws(' ', first_name, last_name) as name,social_number,created_on,company_id,child_image_path  from child_care_info where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $child_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			$row = $result->fetch_assoc();
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['company_id']);
				
			
			$stmt->close();
			$dbCon->close();
			return $row;
			}
			
			function childSignInDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			$stmt = $dbCon->prepare("select id,person_id from dropped_off_children where child_id=? and is_approved=0 and is_left=0");
			/* bind parameters for markers */
			$stmt->bind_param("i", $child_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			}
			
		
			
		function relativesDetail($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select parent_relatives_information.id,concat_ws(' ', relative_first_name, relative_last_name) as name,relative_first_name,relative_last_name,relative_phone,permission_type,relative_photo,relative_ssn from parent_relatives_information where parent_id in (select parent_info.id from parent_info where child_id in (select child_id from parent_info where parent_ssn in (select parent_ssn from parent_info where child_id=?) and child_id in (select id from child_care_info where company_id=?)) and is_approved=1) and relative_ssn not in (select parent_ssn from parent_info where child_id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $child_id,$company_id,$child_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				if($row ['relative_photo']!=null) { $filename="../estorecss/".$row ['relative_photo'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['relative_photo'].".txt"); $value_a=str_replace('"','',$value_a); $org[$j]['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['relative_photo'].'.jpg' ); } else { $org[$j]['image_path']="../html/usercontent/images/person-male.png"; } }  else $org[$j]['image_path']="../html/usercontent/images/person-male.png";
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function parentsDetail($data)
		{
			function base64_to_jpeg1($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			$stmt = $dbCon->prepare("select parent_info.id,concat_ws(' ', user_logins.first_name, user_logins.last_name) as name,user_logins.first_name,user_logins.last_name,passport_image,parent_ssn from parent_info left join user_logins on user_logins.id=parent_info.parent_user_id where child_id=?  and is_approved=1 order by parent_info.created_on limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $child_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				if($row ['passport_image']!=null) { $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $org[$j]['image_path'] = base64_to_jpeg1( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $org[$j]['image_path']="../html/usercontent/images/person-male.png"; } }  else $org[$j]['image_path']="../html/usercontent/images/person-male.png";
				$org[$j]['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
				$org[$j]['rid']='p_'.$row['id'];
				$j++;
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=33");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
		
		function employeeId($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id from employees where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii",$company_id, $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$row['eid']=$this -> encrypt_decrypt('encrypt',$row['id']);
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
			
			$stmt = $dbCon->prepare("select bg_color,f_color,grading_status,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id left join corporate_color on corporate_color.company_id=companies.id  where companies.id=?");
			
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
		
		
		
		function employeeLocationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select location_id from user_company_profile  where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			//print_r($row); die;
			if(empty($row))
			{
				$stmt = $dbCon->prepare("select id from property_location  where company_id=? and is_headquarter=1");
			
				/* bind parameters for markers */
				$stmt->bind_param("ii", $company_id,$data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				
				$row = $result->fetch_assoc();
				$stmt = $dbCon->prepare("update user_company_profile set location_id=? where company_id=? and user_login_id=?");
				$stmt->bind_param("iii",$row['id'], $company_id,$data['user_id']);
				$stmt->execute();	
			}
			
			$stmt = $dbCon->prepare("select location_id from user_company_profile  where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from property_location  where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['location_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			//print_r($row); die;
			
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		
		
	function childDroppedCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from dropped_off_children where child_id in (select id from child_care_info where company_id=?) and is_approved=0 and is_left=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		
		
		
		function childrenDroppedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			function base64_to_jpeg13($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select child_care_info.id as child_id,dropped_off_children.id,person_dropped_child,concat_ws(' ', first_name, last_name) as name,address,child_image_path  from dropped_off_children left join child_care_info on child_care_info.id=dropped_off_children.child_id where child_id in (select id from child_care_info where company_id=?) and is_approved=0 and is_left=0 limit 0,20");
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
				$org[$j]['child_id']= $this -> encrypt_decrypt('encrypt',$row['child_id']);
				if($row ['child_image_path']!=null) { $filename="../estorecss/".$row ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $org[$j]['image_path'] = base64_to_jpeg13( $value_a, '../estorecss/tmp'.$row['child_image_path'].'.jpg' ); } else { $org[$j]['image_path']="../html/usercontent/images/person-male.png"; } }  else $org[$j]['image_path']="../html/usercontent/images/person-male.png";
				 
				$j++;
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			}
			
			function moreChildrenDroppedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			function base64_to_jpeg2($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$a=$_POST['id']*20;
			$b=20;
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select child_care_info.id as child_id,dropped_off_children.id,person_dropped_child,concat_ws(' ', first_name, last_name) as name,address  from dropped_off_children left join child_care_info on child_care_info.id=dropped_off_children.child_id where child_id in (select id from child_care_info where company_id=?) and is_approved=0 and is_left=0 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				if($row ['child_image_path']!=null) { $filename="../estorecss/".$row ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $image_path = base64_to_jpeg2( $value_a, '../estorecss/tmp'.$row['child_image_path'].'.jpg' ); } else { $image_path="../html/usercontent/images/person-male.png"; } }  else $image_path="../html/usercontent/images/person-male.png";
				if($row['person_dropped_child']=="" || $row['person_dropped_child']==null) $name="No Name"; else $name=$row['person_dropped_child'];
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				$enc1=$this->encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
								
												
											
											
											<div class=" white_bg marb0 xs-marb5 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15   brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12 ffamily_avenir">
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10  xxs-padr20 hidden-xs"> 
																			 <div class="wi_50p xs-wi_100 hei_50p xs-hei_45p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 yellow_bg_a" ><img src="../../../'.$image_path.'" width="45px;" height="45px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div>
																	</div>
													<div class="fleft wi_40 xs-wi_50 marl15 xs-mar0 padb10 xs-padb0 ">   <span class="trn" data-trn-key="Child name">'.$name.'</span>  <span class=" edit-text jain1 dblock  brdclr_lgtgrey2 fsz18">'.html_entity_decode($row['name']).'</span> </div>
													
												
													 
													<div class="xxs-fleft fright wi_20 marr10 fsz40  xxs-marl15 xs-marr0  padb0 xs-padl80 padl40">
														<a href="../receivedConfirmation/'.$enc1.'" ><button type="button" name="Confirm" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bgi">Confirm</button></a>
													</div>
													 
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
										
										
									</div>
									</div>';
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function childPresentCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from dropped_off_children where child_id in (select id from child_care_info where company_id=?) and is_approved=1 and is_left=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function childrenPresentDetail($data)
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
			$stmt = $dbCon->prepare("select child_care_info.social_number,dropped_off_children.id,person_dropped_child,concat_ws(' ', first_name, last_name) as name,address,child_image_path  from dropped_off_children left join child_care_info on child_care_info.id=dropped_off_children.child_id where child_id in (select id from child_care_info where company_id=?) and is_approved=1 and is_left=0 limit 0,20");
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
				
				if($row ['child_image_path']!=null) { $filename="../estorecss/".$row ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $org[$j]['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['child_image_path'].'.jpg' ); } else { $org[$j]['image_path']="../html/usercontent/images/person-male.png"; } }  else $org[$j]['image_path']="../html/usercontent/images/person-male.png";
				$j++;
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			}
			
			function moreChildrenPresentDetail($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$dbCon = AppModel::createConnection();
			$a=0;//$_POST['id']*20+1;
			$b=20;
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select child_care_info.social_number,child_image_path,dropped_off_children.id,person_dropped_child,concat_ws(' ', first_name, last_name) as name,address  from dropped_off_children left join child_care_info on child_care_info.id=dropped_off_children.child_id where child_id in (select id from child_care_info where company_id=?) and is_approved=1 and is_left=0 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				if($row ['child_image_path']!=null) { $filename="../estorecss/".$row ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $image_path = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['child_image_path'].'.jpg' ); } else { $image_path="../html/usercontent/images/person-male.png"; } }  else $image_path="../html/usercontent/images/person-male.png";
				
				$org=$org.'<div class="xs-wi_50 wi_25 fleft bs_bb padrb20 talc  " >
													<div class="toggle-parent wi_100 dflex alit_s">
														<div class="wi_100 dnone_pa ">
															<a href="#" class="style_base hei_180p xxs-hei_150p dblock bs_bb pad25 xs-pad10 brdclr_seggreen_h brdrad5 lgtgrey2_bg_h  box_shadow trans_all2 ">
																<div class=" ">
																	<div class="wi_100 hei_90p dflex bs_bb">
																		<img src="../../../'.$image_path.'" height="90" width="90" class="brdrad5 padb0">
																	</div>
																	
																	<div class="padrb15 padt20 xs-padt15 xs-padr0">
																		<h3 class="ovfl_hid tall pad0 txtovfl_el ws_now lgn_hight_24 xs-bold fsz18 segdblue_txt padt0 xs-fsz15 ffamily_avenir">'.html_entity_decode($row['name']).'</h3>
																		<span class="dblock tall marb5 padt10 midgrey_txt fsz16 hidden ffamily_avenir">'.$row['social_number'].'</span>
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>';
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function childAbsentCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from dropped_off_children where child_id in (select id from child_care_info where company_id=?) and is_approved=2 and is_left=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function childrenAbsentDetail($data)
		{
			$dbCon = AppModel::createConnection();
			function base64_to_jpeg11($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select child_image_path,dropped_off_children.id,person_dropped_child,concat_ws(' ', first_name, last_name) as name,address  from dropped_off_children left join child_care_info on child_care_info.id=dropped_off_children.child_id where child_id in (select id from child_care_info where company_id=?) and is_approved=2 and is_left=0 limit 0,20");
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
				if($row ['child_image_path']!=null) { $filename="../estorecss/".$row ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $org[$j]['image_path'] = base64_to_jpeg11( $value_a, '../estorecss/tmp'.$row['child_image_path'].'.jpg' ); } else { $org[$j]['image_path']="../html/usercontent/images/person-male.png"; } }  else $org[$j]['image_path']="../html/usercontent/images/person-male.png";
				$j++;
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			}
			
			function moreChildrenAbsentDetail($data)
		{
			$dbCon = AppModel::createConnection();
			function base64_to_jpeg22($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			
			
			$a=$_POST['id']*20;
			$b=20;
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select dropped_off_children.id,person_dropped_child,concat_ws(' ', first_name, last_name) as name,address  from dropped_off_children left join child_care_info on child_care_info.id=dropped_off_children.child_id where child_id in (select id from child_care_info where company_id=?) and is_approved=2 and is_left=0 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				if($row ['child_image_path']!=null) { $filename="../estorecss/".$row ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $image_path = base64_to_jpeg22( $value_a, '../estorecss/tmp'.$row['child_image_path'].'.jpg' ); } else { $image_path="../html/usercontent/images/person-male.png"; } }  else $image_path="../html/usercontent/images/person-male.png";
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
								
												
											
											
											<div class=" white_bg marb0 xs-marb5 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir">
																			 <div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10  xxs-padr20  "> 
																			 <div class="wi_50p xs-wi_100 hei_50p xs-hei_45p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 yellow_bg_a" ><img src="../../../'.$image_path.'" width="45px;" height="45px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div>
																	</div>
																			<div class="fleft wi_60 xs-wi_60 sm-wi_100 marl15 xs-mar0 padb10 xs-padb0 "> <span class="trn" data-trn-key="Child name">'.$row['person_dropped_child'].'</span> <span class=" edit-text jain1 dblock  brdclr_lgtgrey2 bold fsz18">'.html_entity_decode($row['name']).'</span> </div>
																			 
																			
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>';
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function approveRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("update dropped_off_children set is_approved=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select dependent_id  from child_care_info where id= (select child_id from dropped_off_children where dropped_off_children.id=?)");
			
			$stmt->bind_param("i",$request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select id,plan_type from safeqid_user_plan_detail where dependent_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $row['dependent_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_plan = $result->fetch_assoc();
			if(empty($row))
			{
			$pln=0;
			}
			 else
			{
			$pln=$row_plan['plan_type'];	 
				 
			}
			
			$stmt = $dbCon->prepare("select min(modified_on) as mdate from parent_info where child_id =? and is_approved=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $key);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$rowParent = $result->fetch_assoc();	
			$timeElap=(int)(abs(strtotime(date('Y-m-d')) - strtotime($rowParent['mdate'])) / 86400); 
			
			if($timeElap>14)
			{
				
				if($pln==2)
				{
					$permissionType=1;
				}
				else
				{
				$permissionType=0;
				}
			}
			else
			{
			$permissionType=1;	
			}
			if($permissionType==1)
			{
			
			$stmt = $dbCon->prepare("select parent_email,parent_phone,country_code,concat_ws(' ', first_name, last_name) as name  from parent_info left join phone_country_code on phone_country_code.country_name=parent_info.parent_country left join child_care_info on child_care_info.id=parent_info.child_id where child_id = (select child_id from dropped_off_children where dropped_off_children.id=?)");
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			while($row = $result->fetch_assoc())
			{
				$to= '+'.trim($row['country_code']).''.trim($row['parent_phone']);
				$subject       = "Child Received!";
					
					$emailContent =$row['name']." has been checked and is present in classroom ";
					$res=sendSms($subject, $to, $emailContent);
					
					$to            = $row['parent_email'];
					
					$subject       = "Child Received!";
					
					$emailContent =$row['name']." has been checked and is present in classroom ";
					sendEmail($subject, $to, $emailContent);
			}
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function rejectRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("update dropped_off_children set is_approved=2 and left=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select dependent_id  from child_care_info where id= (select child_id from dropped_off_children where dropped_off_children.id=?)");
			
			$stmt->bind_param("i",$request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select id,plan_type from safeqid_user_plan_detail where dependent_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $row['dependent_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_plan = $result->fetch_assoc();
			if(empty($row))
			{
			$pln=0;
			}
			 else
			{
			$pln=$row_plan['plan_type'];	 
				 
			}
			
			$stmt = $dbCon->prepare("select min(modified_on) as mdate from parent_info where child_id =? and is_approved=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $key);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$rowParent = $result->fetch_assoc();	
			$timeElap=(int)(abs(strtotime(date('Y-m-d')) - strtotime($rowParent['mdate'])) / 86400); 
			
			if($timeElap>14)
			{
				
				if($pln==2)
				{
					$permissionType=1;
				}
				else
				{
				$permissionType=0;
				}
			}
			else
			{
			$permissionType=1;	
			}
			if($permissionType==1)
			{
			
			$stmt = $dbCon->prepare("select parent_email,parent_phone,country_code,concat_ws(' ', first_name, last_name) as name  from parent_info left join phone_country_code on phone_country_code.country_name=parent_info.parent_country left join child_care_info on child_care_info.id=parent_info.child_id where child_id = (select child_id from dropped_off_children where dropped_off_children.id=?)");
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			while($row = $result->fetch_assoc())
			{
				$to= '+'.trim($row['country_code']).''.trim($row['parent_phone']);
				$subject       = "Child not present!";
					
					$emailContent =$row['name']." has been by mistake signed in and he/she is not present in classroom. Please confirm the same. ";
					$res=sendSms($subject, $to, $emailContent);
					
					$to            = $row['parent_email'];
					
					$subject       = "Child not present!";
					
					$emailContent =$row['name']." has been by mistake signed in and he/she is not present in classroom. Please confirm the same. ";
					sendEmail($subject, $to, $emailContent);
			}
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function signInReceivedChild($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select dependent_id  from child_care_info where id=?");
			
			$stmt->bind_param("i",$_POST['chld']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select id,plan_type from safeqid_user_plan_detail where dependent_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $row['dependent_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_plan = $result->fetch_assoc();
			if(empty($row))
			{
			$pln=0;
			}
			 else
			{
			$pln=$row_plan['plan_type'];	 
				 
			}
			
			$stmt = $dbCon->prepare("select min(modified_on) as mdate from parent_info where child_id =? and is_approved=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $key);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$rowParent = $result->fetch_assoc();	
			$timeElap=(int)(abs(strtotime(date('Y-m-d')) - strtotime($rowParent['mdate'])) / 86400); 
			
			if($timeElap>14)
			{
				
				if($pln==2)
				{
					$permissionType=1;
				}
				else
				{
				$permissionType=0;
				}
			}
			else
			{
			$permissionType=1;	
			}
			
			$st=2;
			$app=1;
			$stmt = $dbCon->prepare("insert into dropped_off_children(child_id,person_dropped_child,created_on,registered_by,user_logins_id,is_approved)
			values(?,?,now(),?,?,?)");
			$stmt->bind_param("isiii",$_POST['chld'],htmlentities($_POST['who'],ENT_NOQUOTES, 'ISO-8859-1'),$st=2,$data['user_id'],$app);
			if($stmt->execute())
			{
			if($permissionType==1)
			{	
			$stmt = $dbCon->prepare("select parent_email,parent_phone,country_code,concat_ws(' ', first_name, last_name) as name  from parent_info left join phone_country_code on phone_country_code.country_name=parent_info.parent_country left join child_care_info on child_care_info.id=parent_info.child_id where child_id =?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['chld']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			while($row = $result->fetch_assoc())
			{
				$to= '+'.trim($row['country_code']).''.trim($row['parent_phone']);
				$subject       = "Child Received!";
					
					$emailContent =$row['name']." has been checked and is present in classroom ";
					$res=sendSms($subject, $to, $emailContent);
					
					$to            = $row['parent_email'];
					
					$subject       = "Child Received!";
					
					$emailContent =$row['name']." has been checked and is present in classroom ";
					sendEmail($subject, $to, $emailContent);
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
		
		
			function confirmDropoffInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			
			$stmt = $dbCon->prepare("select dependent_id  from child_care_info where id=?");
			
			$stmt->bind_param("i",$child_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select id,plan_type from safeqid_user_plan_detail where dependent_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $row['dependent_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_plan = $result->fetch_assoc();
			if(empty($row))
			{
			$pln=0;
			}
			 else
			{
			$pln=$row_plan['plan_type'];	 
				 
			}
			
			$stmt = $dbCon->prepare("select min(modified_on) as mdate from parent_info where child_id =? and is_approved=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $key);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$rowParent = $result->fetch_assoc();	
			$timeElap=(int)(abs(strtotime(date('Y-m-d')) - strtotime($rowParent['mdate'])) / 86400); 
			
			if($timeElap>14)
			{
				
				if($pln==2)
				{
					$permissionType=1;
				}
				else
				{
				$permissionType=0;
				}
			}
			else
			{
			$permissionType=1;	
			}
			
			
			
			$a=explode('_',$_POST['dropped']);
			if($a[0]=='d')
			{
				if($a[1]==1)
				{
					$who='Dont know who';
					$app=1;
					$left=0;
				}
				else if($a[1]==2)
				{
					$who='Relatives but not in list';
					$app=1;
					$left=0;
				}
				else if($a[1]==3)
				{
					$who='Child is absent';
					$app=2;
					$left=1;
				}	
			}
			else if($a[0]=='p')
			{
			$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name  from parent_info left join user_logins on user_logins.id=parent_info.parent_user_id where parent_info.id =?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $a[1]);
			$stmt->execute();
			$resultp = $stmt->get_result();
			
			$rowp = $resultp->fetch_assoc();
			$who=$rowp['name'];
			$app=1;
			$left=0;
				
			}
			else if($a[0]=='r')
			{
			$stmt = $dbCon->prepare("select concat_ws(' ', relative_first_name, relative_last_name) as name  from parent_relatives_information where id =?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $a[1]);
			$stmt->execute();
			$resultp = $stmt->get_result();
			
			$rowp = $resultp->fetch_assoc();
			$who=$rowp['name'];
			$app=1;
			$left=0;
				
			}
			$st=2;
			if($_POST['signinId']==0)
			{
			$stmt = $dbCon->prepare("insert into dropped_off_children(person_id,child_id,person_dropped_child,created_on,registered_by,user_logins_id,is_approved,is_left)
			values(?,?,?,now(),?,?,?,?)");
			$stmt->bind_param("sisiiii",$_POST['dropped'],$child_id,$who,$st,$data['user_id'],$app,$left);
			if($stmt->execute())
			{
			$id=$stmt->insert_id;
			$stmt = $dbCon->prepare("insert into dropoff_verification(person_id,drop_off_id,confirmed_by,created_on)
			values(?,?,?,now())");
			$stmt->bind_param("sii",$_POST['dropped'],$id,$data['user_id']);	
			$stmt->execute();
			if($permissionType==1)
			{
			$stmt = $dbCon->prepare("select parent_email,parent_phone,country_code,concat_ws(' ', first_name, last_name) as name  from parent_info left join phone_country_code on phone_country_code.country_name=parent_info.parent_country left join child_care_info on child_care_info.id=parent_info.child_id where child_id =?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $child_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			while($row = $result->fetch_assoc())
			{
				if($left==0)
				{
				$to= '+'.trim($row['country_code']).''.trim($row['parent_phone']);
				$subject       = "Child Received!";
					
					$emailContent =$row['name']." has been checked and is present in classroom ";
					$res=sendSms($subject, $to, $emailContent);
					
					$to            = $row['parent_email'];
					
					$subject       = "Child Received!";
					
					$emailContent ='<html><body>
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
                                                               <p style="Margin-top:0px;margin-bottom:0px;font-size:13px;line-height:16px"><strong><a style="text-decoration:none;color:#111111" target="_blank">Website: <u></u>www.qloudid.com<u></u></a></strong></p>
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
                                                      <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 red_ff2828_bg  brdb_new tall xs-nobrdb" style="max-width: 100%; background-color: #67cff7 !important;
                                                         width: 960px;
                                                         position: relative;
                                                         margin: 0 auto;
                                                         ">
                                                         <div style="height: 250px; width: auto; max-width: 100%; padding-top: 100px; padding-right: 30px;
                                                            padding-left: 30px; margin-right: auto;
                                                            margin-left: auto;  z-index: 5; max-width: 100%; width: auto;">
                                                            <div class="padding-bottom: 40px; text-align: center; font-size: 45px;"><img src="http://www.safeqloud.com/html/usercontent/images/envelopIcon.png" width="45px;" height="45px;"></div>
                                                            <div class="padb0 xxs-padb0 ">
                                                               <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:#ffffff;">Confirmed</h1>
                                                            </div>
                                                            <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:#ffffff; font-size: 20px;">'.$row['name'].' has been checked and is present in classroom </div>
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
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
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
   
</body></html>';
					sendEmail($subject, $to, $emailContent);
				}
				else
				{
					$to= '+'.trim($row['country_code']).''.trim($row['parent_phone']);
					$subject       = "Child not present!";
					
					$emailContent =$row['name']." has been by mistake signed in and he/she is not present in classroom. Please confirm the same. ";
					$res=sendSms($subject, $to, $emailContent);
					
					$to            = $row['parent_email'];
					
					$subject       = "Child not present!";
					
					$emailContent ='<html><head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   </head>
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
                                                               <p style="Margin-top:0px;margin-bottom:0px;font-size:13px;line-height:16px"><strong><a style="text-decoration:none;color:#111111" target="_blank">Website: <u></u>www.qloudid.com<u></u></a></strong></p>
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
                                                      <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 red_ff2828_bg  brdb_new tall xs-nobrdb" style="max-width: 100%; background-color: #ff2828!important;
                                                         width: 960px;
                                                         position: relative;
                                                         margin: 0 auto;
                                                         ">
                                                         <div style="height: 250px; width: auto; max-width: 100%; padding-top: 100px; padding-right: 30px;
                                                            padding-left: 30px; margin-right: auto;
                                                            margin-left: auto;  z-index: 5; max-width: 100%; width: auto;">
                                                            <div class="padding-bottom: 40px; text-align: center; font-size: 45px;"><img src="http://www.safeqloud.com/html/usercontent/images/envelopIcon.png" width="45px;" height="45px;"></div>
                                                            <div class="padb0 xxs-padb0 ">
                                                               <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:#ffffff;">Sorry</h1>
                                                            </div>
                                                            <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:#ffffff; font-size: 20px;">'.$row['name'].' has been by mistake signed in and he/she is not present in classroom. Please confirm the same. </div>
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
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
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
   
</body></html>';
					sendEmail($subject, $to, $emailContent);
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
			
			else
			{
			$stmt = $dbCon->prepare("update dropped_off_children set user_logins_id=?,is_approved=?,is_left=? where id=?");
			$stmt->bind_param("iiii",$data['user_id'],$app,$left,$_POST['signinId']);
			if($stmt->execute())
			{
			
			$stmt = $dbCon->prepare("insert into dropoff_verification(person_id,drop_off_id,confirmed_by,created_on)
			values(?,?,?,now())");
			$stmt->bind_param("sii",$_POST['dropped'],$_POST['signinId'],$data['user_id']);	
			$stmt->execute();	
			if($permissionType==1)
			{
			$stmt = $dbCon->prepare("select parent_email,parent_phone,country_code,concat_ws(' ', first_name, last_name) as name  from parent_info left join phone_country_code on phone_country_code.country_name=parent_info.parent_country left join child_care_info on child_care_info.id=parent_info.child_id where child_id =?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $child_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			while($row = $result->fetch_assoc())
			{
				if($left==0)
				{
				$to= '+'.trim($row['country_code']).''.trim($row['parent_phone']);
				$subject       = "Child Received!";
					
					$emailContent =$row['name']." has been checked and is present in classroom ";
					$res=sendSms($subject, $to, $emailContent);
					
					$to            = $row['parent_email'];
					
					$subject       = "Child Received!";
					
					$emailContent ='<html><body>
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
                                                               <p style="Margin-top:0px;margin-bottom:0px;font-size:13px;line-height:16px"><strong><a style="text-decoration:none;color:#111111" target="_blank">Website: <u></u>www.qloudid.com<u></u></a></strong></p>
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
                                                      <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 red_ff2828_bg  brdb_new tall xs-nobrdb" style="max-width: 100%; background-color: #67cff7 !important;
                                                         width: 960px;
                                                         position: relative;
                                                         margin: 0 auto;
                                                         ">
                                                         <div style="height: 250px; width: auto; max-width: 100%; padding-top: 100px; padding-right: 30px;
                                                            padding-left: 30px; margin-right: auto;
                                                            margin-left: auto;  z-index: 5; max-width: 100%; width: auto;">
                                                            <div class="padding-bottom: 40px; text-align: center; font-size: 45px;"><img src="http://www.safeqloud.com/html/usercontent/images/envelopIcon.png" width="45px;" height="45px;"></div>
                                                            <div class="padb0 xxs-padb0 ">
                                                               <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:#ffffff;">Confirmed</h1>
                                                            </div>
                                                            <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:#ffffff; font-size: 20px;">'.$row['name'].' has been checked and is present in classroom </div>
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
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
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
   
</body></html>';
					sendEmail($subject, $to, $emailContent);
				}
				else
				{
					$to= '+'.trim($row['country_code']).''.trim($row['parent_phone']);
					$subject       = "Child not present!";
					
					$emailContent =$row['name']." has been by mistake signed in and he/she is not present in classroom. Please confirm the same. ";
					$res=sendSms($subject, $to, $emailContent);
					
					$to            = $row['parent_email'];
					
					$subject       = "Child not present!";
					
					$emailContent ='<html><head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   </head>
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
                                                               <p style="Margin-top:0px;margin-bottom:0px;font-size:13px;line-height:16px"><strong><a style="text-decoration:none;color:#111111" target="_blank">Website: <u></u>www.qloudid.com<u></u></a></strong></p>
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
                                                      <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 red_ff2828_bg  brdb_new tall xs-nobrdb" style="max-width: 100%; background-color: #ff2828!important;
                                                         width: 960px;
                                                         position: relative;
                                                         margin: 0 auto;
                                                         ">
                                                         <div style="height: 250px; width: auto; max-width: 100%; padding-top: 100px; padding-right: 30px;
                                                            padding-left: 30px; margin-right: auto;
                                                            margin-left: auto;  z-index: 5; max-width: 100%; width: auto;">
                                                            <div class="padding-bottom: 40px; text-align: center; font-size: 45px;"><img src="http://www.safeqloud.com/html/usercontent/images/envelopIcon.png" width="45px;" height="45px;"></div>
                                                            <div class="padb0 xxs-padb0 ">
                                                               <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:#ffffff;">Sorry</h1>
                                                            </div>
                                                            <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:#ffffff; font-size: 20px;">'.$row['name'].' has been by mistake signed in and he/she is not present in classroom. Please confirm the same. </div>
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
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
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
   
</body></html>';
					sendEmail($subject, $to, $emailContent);
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
			
			
			
			
		}
		
				function childPickupDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			$stmt = $dbCon->prepare("select id,dropped_off_id,person_id from child_pickup_info where child_id=? and is_approved=0");
			/* bind parameters for markers */
			$stmt->bind_param("i", $child_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			}
			
		function confirmPickupInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			
			$stmt = $dbCon->prepare("select dependent_id  from child_care_info where id=?");
			
			$stmt->bind_param("i",$child_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select id,plan_type from safeqid_user_plan_detail where dependent_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $row['dependent_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_plan = $result->fetch_assoc();
			if(empty($row))
			{
			$pln=0;
			}
			 else
			{
			$pln=$row_plan['plan_type'];	 
				 
			}
			
			$stmt = $dbCon->prepare("select min(modified_on) as mdate from parent_info where child_id =? and is_approved=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $key);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$rowParent = $result->fetch_assoc();	
			$timeElap=(int)(abs(strtotime(date('Y-m-d')) - strtotime($rowParent['mdate'])) / 86400); 
			
			if($timeElap>14)
			{
				
				if($pln==2)
				{
					$permissionType=1;
				}
				else
				{
				$permissionType=0;
				}
			}
			else
			{
			$permissionType=1;	
			}
			
			
			
			$stmt = $dbCon->prepare("select id  from dropped_off_children where child_id =? and is_left in (0,1)");
			/* bind parameters for markers */
			$stmt->bind_param("i", $child_id);
			$stmt->execute();
			$resultp = $stmt->get_result();
			
			$rowd = $resultp->fetch_assoc();
			//print_r($rowd); die;
			$a=explode('_',$_POST['dropped']);
			if($a[0]=='p')
			{
			$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name,parent_ssn  from parent_info left join user_logins on user_logins.id=parent_info.parent_user_id where parent_info.id =?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $a[1]);
			$stmt->execute();
			$resultp = $stmt->get_result();
			
			$rowp = $resultp->fetch_assoc();
			$who=$rowp['name'];
			$app=1;
			$pby=1;
			$left=2;
				
			}
			else if($a[0]=='r')
			{
			$stmt = $dbCon->prepare("select concat_ws(' ', relative_first_name, relative_last_name) as name,relative_ssn as parent_ssn  from parent_relatives_information where id =?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $a[1]);
			$stmt->execute();
			$resultp = $stmt->get_result();
			
			$rowp = $resultp->fetch_assoc();
			$who=$rowp['name'];
			$app=1;
			$left=2;
			$pby=2;	
			}
			$st=2;
			//print_r($_POST);die;
			if($_POST['signinId']==0)
			{
				
			$stmt = $dbCon->prepare("insert into child_pickup_info(person_id,child_id,picked_up_person_name,created_on,register_by,user_login_id,picked_up_person_ssn,dropped_off_id )values(?,?,?,now(),?,?,?,?)");
			$stmt->bind_param("sisiiii",$_POST['dropped'],$child_id,$who,$st,$data['user_id'],$rowp['parent_ssn'],$rowd['id']);
			if($stmt->execute())
			{
			$id=$stmt->insert_id;
			$stmt = $dbCon->prepare("insert into pickup_verification(person_id,pickup_id,confirmed_by,created_on)
			values(?,?,?,now())");
			$stmt->bind_param("sii",$_POST['dropped'],$id,$data['user_id']);	
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("update dropped_off_children set is_left=2 where id=?");
			$stmt->bind_param("i",$rowd['id']);	
			$stmt->execute();	
			if($permissionType==1)
			{
			$stmt = $dbCon->prepare("select parent_email,parent_phone,country_code,concat_ws(' ', first_name, last_name) as name  from parent_info left join phone_country_code on phone_country_code.country_name=parent_info.parent_country left join child_care_info on child_care_info.id=parent_info.child_id where child_id =?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $child_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			while($row = $result->fetch_assoc())
			{

				$to= '+'.trim($row['country_code']).''.trim($row['parent_phone']);
				$subject       = "Child Received!";
					
					$emailContent =$row['name']." has been checked and is handed over to ".$rowp['name'];
					$res=sendSms($subject, $to, $emailContent);
					
					$to            = $row['parent_email'];
					
					$subject       = "Child Received!";
					
					$emailContent ='<html><head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   </head>
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
                                                               <p style="Margin-top:0px;margin-bottom:0px;font-size:13px;line-height:16px"><strong><a style="text-decoration:none;color:#111111" target="_blank">Website: <u></u>www.qloudid.com<u></u></a></strong></p>
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
                                                      <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 red_ff2828_bg  brdb_new tall xs-nobrdb" style="max-width: 100%; background-color: #67cff7 !important;
                                                         width: 960px;
                                                         position: relative;
                                                         margin: 0 auto;
                                                         ">
                                                         <div style="height: 250px; width: auto; max-width: 100%; padding-top: 100px; padding-right: 30px;
                                                            padding-left: 30px; margin-right: auto;
                                                            margin-left: auto;  z-index: 5; max-width: 100%; width: auto;">
                                                            <div class="padding-bottom: 40px; text-align: center; font-size: 45px;"><img src="http://www.safeqloud.com/html/usercontent/images/envelopIcon.png" width="45px;" height="45px;"></div>
                                                            <div class="padb0 xxs-padb0 ">
                                                               <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:#ffffff;">Confirmed</h1>
                                                            </div>
                                                            <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:#ffffff; font-size: 20px;">'.$row['name'].' has been checked and is handed over to '.$rowp['name'].' </div>
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
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
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
   
</body></html>';
					sendEmail($subject, $to, $emailContent);
				
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
			
			else
			{
			$stmt = $dbCon->prepare("update child_pickup_info set user_login_id=?,is_approved=? where id=?");
			$stmt->bind_param("iii",$data['user_id'],$app,$_POST['signinId']);
			if($stmt->execute())
			{
			$stmt = $dbCon->prepare("update dropped_off_children set is_left=2 where id=?");
			$stmt->bind_param("i",$rowd['id']);	
			$stmt->execute();	
			//print_r($rowd); die;
			$stmt = $dbCon->prepare("insert into pickup_verification(person_id,pickup_id,confirmed_by,created_on)
			values(?,?,?,now())");
			$stmt->bind_param("sii",$_POST['dropped'],$_POST['signinId'],$data['user_id']);	
			$stmt->execute();	
			if($permissionType==1)
			{
			$stmt = $dbCon->prepare("select parent_email,parent_phone,country_code,concat_ws(' ', first_name, last_name) as name  from parent_info left join phone_country_code on phone_country_code.country_name=parent_info.parent_country left join child_care_info on child_care_info.id=parent_info.child_id where child_id =?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $child_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			while($row = $result->fetch_assoc())
			{
				
				$to= '+'.trim($row['country_code']).''.trim($row['parent_phone']);
				$subject       = "Child Received!";
					
					$emailContent =$row['name']." has been checked and is handed over to ".$rowp['name'];
					$res=sendSms($subject, $to, $emailContent);
					
					$to            = $row['parent_email'];
					
					$subject       = "Child Received!";
					
					$emailContent ='<html><head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   </head>
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
                                                               <p style="Margin-top:0px;margin-bottom:0px;font-size:13px;line-height:16px"><strong><a style="text-decoration:none;color:#111111" target="_blank">Website: <u></u>www.qloudid.com<u></u></a></strong></p>
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
                                                      <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 red_ff2828_bg  brdb_new tall xs-nobrdb" style="max-width: 100%; background-color: #67cff7 !important;
                                                         width: 960px;
                                                         position: relative;
                                                         margin: 0 auto;
                                                         ">
                                                         <div style="height: 250px; width: auto; max-width: 100%; padding-top: 100px; padding-right: 30px;
                                                            padding-left: 30px; margin-right: auto;
                                                            margin-left: auto;  z-index: 5; max-width: 100%; width: auto;">
                                                            <div class="padding-bottom: 40px; text-align: center; font-size: 45px;"><img src="http://www.safeqloud.com/html/usercontent/images/envelopIcon.png" width="45px;" height="45px;"></div>
                                                            <div class="padb0 xxs-padb0 ">
                                                               <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:#ffffff;">Confirmed</h1>
                                                            </div>
                                                            <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:#ffffff; font-size: 20px;">'.$row['name'].' has been checked and is handed over to '.$rowp['name'].' </div>
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
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
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
   
</body></html>';
					sendEmail($subject, $to, $emailContent);
				
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
			
			
			
			
		}
		
		
		
		function selectChild($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,concat_ws(' ', first_name, last_name) as name from child_care_info where id not in (select child_id  from dropped_off_children where child_id in (select id from child_care_info where company_id=?) and is_approved<2 and is_left=0) and company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$company_id);
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
	
	
		function selectPerson($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			//echo $request_id;
			$stmt = $dbCon->prepare("select * from dropped_off_children where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
//print_r($row); die;
			$person=explode('_',$row['person_id']);
			if($person[0]=='r')
			{
			$stmt = $dbCon->prepare("select concat_ws(' ', relative_first_name, relative_last_name) as name,relative_photo from parent_relatives_information where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $person[1]);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_image = $result->fetch_assoc();	
			}
			else if($person[0]=='p')
			{
			$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name,passport_image as relative_photo from user_logins where id=(select parent_user_id from parent_info where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $person[1]);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_image = $result->fetch_assoc();	
			}
			$row_image['dropped_at']=$row['created_on'];
			$stmt->close();
			$dbCon->close();
			return $row_image;
			
			
		}
	
	
		
		
	
	
	
	function childLeftCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from dropped_off_children where child_id in (select id from child_care_info where company_id=?) and is_approved=1 and is_left=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function childrenLeftDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select dropped_off_children.id,picked_up_person_name,concat_ws(' ', first_name, last_name) as name,address  from dropped_off_children left join child_care_info on child_care_info.id=dropped_off_children.child_id left join child_pickup_info on child_pickup_info.dropped_off_id=dropped_off_children.id  where dropped_off_children.child_id in (select id from child_care_info where company_id=?) and dropped_off_children.is_approved=1 and is_left=1 limit 0,20");
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
			
			function moreChildrenLeftDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*20;
			$b=20;
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select dropped_off_children.id,picked_up_person_name,concat_ws(' ', first_name, last_name) as name,address  from dropped_off_children left join child_care_info on child_care_info.id=dropped_off_children.child_id left join child_pickup_info on child_pickup_info.dropped_off_id=dropped_off_children.id  where dropped_off_children.child_id in (select id from child_care_info where company_id=?) and dropped_off_children.is_approved=1 and is_left=1 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<div class=" <div class="column_m container  marb5   fsz14 dark_grey_txt">
								
												
											
											
											<div class=" white_bg marb0 xs-marb5  brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir">
																			 
																			<div class="fleft wi_60 xs-wi_60 sm-wi_100 marl15 xs-mar0 padb10 xs-padb0 "> <span class="trn" data-trn-key="Child name">'.$row['picked_up_person_name'].'</span> <span class=" edit-text jain1 dblock  brdclr_lgtgrey2  fsz16">'.html_entity_decode($row['name']).'</span> </div>
																		</div>

																	</div>
																	<div class="clear"></div>
																</div>
																</div>
																</div>';
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
	function childrenDetailAll($data)
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
			 
			$stmt = $dbCon->prepare("select child_id,address,first_name,last_name,social_number,child_image_path from dropped_off_children left join child_care_info on child_care_info.id=dropped_off_children.child_id where is_left=0 and dropped_off_children.is_approved!=1 and child_care_info.company_id=? limit 0,20");
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			 array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['child_id']);
				if($row ['child_image_path']!=null) { $filename="../estorecss/".$row ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $org[$j]['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['child_image_path'].'.jpg' ); } else { $org[$j]['image_path']="../html/usercontent/images/person-male.png"; } }  else $org[$j]['image_path']="../html/usercontent/images/person-male.png";
				$j++;
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			}
		

		function childrenDetailNotReceived($data)
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
			$stmt = $dbCon->prepare("select id,address,first_name,last_name,social_number,created_on ,child_image_path from child_care_info where company_id=? and id not in (select child_id from dropped_off_children where is_left in(0,1)) limit 0,20");
			 
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			
			
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			 array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				if($row ['child_image_path']!=null) { $filename="../estorecss/".$row ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $org[$j]['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['child_image_path'].'.jpg' ); } else { $org[$j]['image_path']="../html/usercontent/images/person-male.png"; } }  else $org[$j]['image_path']="../html/usercontent/images/person-male.png";
				$j++;
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			}
			
	function moreChildrenDetailNotReceived($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*20;
			$b=20;
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 $stmt = $dbCon->prepare("select id,address,first_name,last_name,social_number,created_on,child_image_path  from child_care_info where company_id=? and id not in (select child_id from dropped_off_children where  is_left in (0,1)) limit ?,?");
			
			 
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result(); 
			
			 
			
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
			 
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				if($row ['child_image_path']!=null) { $filename="../estorecss/".$row ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $value_a = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['child_image_path'].'.jpg' ); } else { $value_a="../html/usercontent/images/person-male.png"; } }  else $value_a="../html/usercontent/images/person-male.png";
				
				$org=$org.'<div class="wi_50 fleft bs_bb padb20 padrl10 xs-padrl5 talc">
													<div class="toggle-parent wi_100 dflex alit_s">
														<div class="wi_100 dnone_pa ">
															<a href="../receivedConfirmation/'.$enc.'" class="style_base hei_210p xxs-hei_150p dblock bs_bb pad25 xs-pad10   brdclr_seggreen_h brdrad5  lgtgrey2_bg_h lgtgrey2_bg box_shadow trans_all2 ">
																<div class=" ">
																	<div class="wi_100 hei_90p dflex bs_bb">
																		<img src="../../../'.$value_a.'" height="90" width="90" class="brdrad5 padb0">
																	</div>
																	
																	<div class="padrb15 padt20 xs-padt15 xs-padr0">
																	<span class="dblock  tall marb5 padt10 midgrey_txt fsz14  ffamily_avenir">'.html_entity_decode($row['first_name']).' '.html_entity_decode($row['last_name']).'</span>
																		<h3 class="ovfl_hid tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt0 ffamily_avenir hidden-xs">'.$row['social_number'].'</h3>
																		
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												 ';
				
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
			function moreChildrenDetailAll($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*20;
			$b=20;
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			
			$stmt = $dbCon->prepare("select child_id,address,first_name,last_name,social_number,child_image_path from dropped_off_children left join child_care_info on child_care_info.id=dropped_off_children.child_id where is_left=0 and dropped_off_children.is_approved!=1 and child_care_info.company_id=? limit ?,?");
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
			 
				$enc=$this->encrypt_decrypt('encrypt',$row['child_id']);
				if($row ['child_image_path']!=null) { $filename="../estorecss/".$row ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $value_a = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['child_image_path'].'.jpg' ); } else { $value_a="../html/usercontent/images/person-male.png"; } }  else $value_a="../html/usercontent/images/person-male.png";
				
				$org=$org.'<div class="wi_50 fleft bs_bb padb20 padrl10 xs-padrl5 talc">
													<div class="toggle-parent wi_100 dflex alit_s">
														<div class="wi_100 dnone_pa ">
															<a href="../receivedConfirmation/'.$enc.'" class="style_base hei_210p xxs-hei_150p dblock bs_bb pad25 xs-pad10   brdclr_seggreen_h brdrad5 lgtgrey2_bg_h lgtgrey2_bg box_shadow trans_all2 ">
																<div class=" ">
																	<div class="wi_100 hei_90p dflex bs_bb">
																		<img src="../../../'.$value_a.'" height="90" width="90" class="brdrad5 padb0">
																	</div>
																	
																	<div class="padrb15 padt20 xs-padt15 xs-padr0">
																	<span class="dblock  tall marb5 padt10 midgrey_txt fsz14  ffamily_avenir">'.html_entity_decode($row['first_name']).' '.html_entity_decode($row['last_name']).'</span>
																		<h3 class="ovfl_hid tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt0 ffamily_avenir hidden-xs">'.$row['social_number'].'</h3>
																		
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												 ';
				
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
function childrenPickupDetailAll($data)
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
			$stmt = $dbCon->prepare("select id,address,first_name,last_name,social_number,created_on ,child_image_path from child_care_info where company_id=? and id in (select child_id from dropped_off_children where is_approved=1 and is_left in(0,1)) limit 0,20");
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select id from dropped_off_children where child_id=? and is_left=1");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$results = $stmt->get_result();
			$rows = $results->fetch_assoc();	
				
				
				array_push($org,$row);
				if(empty($rows))
				{
				$org[$j]['signin']='lgtgrey2_bg';
				}
				else
				{
				$org[$j]['signin']='lgtgrey2_bg black_brd';
				}
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				if($row ['child_image_path']!=null) { $filename="../estorecss/".$row ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $org[$j]['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['child_image_path'].'.jpg' ); } else { $org[$j]['image_path']="../html/usercontent/images/person-male.png"; } }  else $org[$j]['image_path']="../html/usercontent/images/person-male.png";
				$j++;
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			}
			
			function moreChildrenPickupDetailAll($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*20;
			$b=20;
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,address,first_name,last_name,social_number,created_on,child_image_path  from child_care_info where company_id=? and id  in (select child_id from dropped_off_children where is_approved=1 and is_left in (0,1)) limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select id from dropped_off_children where child_id=? and is_left=1");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$results = $stmt->get_result();
			$rows = $results->fetch_assoc();	
			if(empty($rows))
				{
				$bgColor='lgtgrey2_bg';
				}
				else
				{
				$bgColor='lgtgrey2_bg black_brd';
				}	
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				if($row ['child_image_path']!=null) { $filename="../estorecss/".$row ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $value_a = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['child_image_path'].'.jpg' ); } else { $value_a="../html/usercontent/images/person-male.png"; } }  else $value_a="../html/usercontent/images/person-male.png";
				
				$org=$org.'<div class="xxs-wi_50 wi_50 fleft bs_bb padrb20 talc  ">
													<div class="toggle-parent wi_100 dflex alit_s">
														<div class="wi_100 dnone_pa ">
															<a href="../pickupConfirmation/'.$enc.'" class="style_base hei_210p dblock bs_bb pad25 xs-pad10 xxs-hei_150p brdclr_seggreen_h brdrad5 '.$bgColor.'  box_shadow trans_all2 ">
																<div class=" ">
																	<div class="wi_100 hei_90p dflex bs_bb">
																		<img src="../../../'.$value_a.'" height="90" width="90" class="brdrad5 padb0">
																	</div>
																	
																	<div class="  padrb15 padt20 xs-padt15 xs-padr0">
																		<h3 class="ovfl_hid tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0 xs-fsz15">'.html_entity_decode($row['first_name']).' '.html_entity_decode($row['last_name']).'</h3>
																		<span class="dblock tall marb5 padt10 midgrey_txt fsz16 hidden-xs">'.$row['social_number'].'</span>
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>';
				
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
	
	
	}		