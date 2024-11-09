<?php
	require_once('../AppModel.php');
	class CompanyCustomersModel extends AppModel
	{
		function checkConnection($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$data['user_id']= $this -> encrypt_decrypt('decrypt',$_POST['uid']);
			
			$stmt = $dbCon->prepare("select user_login_id from companies where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if($row['user_login_id']==$data['user_id'])
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
		
		function updateAdmin($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id from employees where user_login_id=? and company_id=?");
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
				$stmt = $dbCon->prepare("select id,permission from manage_employee_permissions where user_id=? and company_id=? and page_id=?");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("iii", $data['user_id'],$company_id,$data['page_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				if(!empty($row))
				{
					$stmt = $dbCon->prepare("select user_login_id from employees where company_id=? and user_login_id not in (select user_id from manage_employee_permissions where company_id=? and page_id=?)");
					/* bind parameters for markers */
					
					$stmt->bind_param("iii",$company_id,$company_id,$data['page_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					while($row = $result->fetch_assoc())
					{
						$stmt = $dbCon->prepare("insert into manage_employee_permissions (user_id,company_id,page_id,created_date,modified_date) values(?, ?, ?, now(),now())");
						/* bind parameters for markers */
						$cont=1;
						$stmt->bind_param("iii",$row['user_login_id'],$company_id,$data['page_id']);
						$stmt->execute();
					}
				}
				else
				{
					$stmt = $dbCon->prepare("insert into manage_employee_permissions (is_admin, permission,user_id,company_id,page_id,created_date,modified_date) values(?, ?, ?, ?, ?, now(),now())");
					/* bind parameters for markers */
					$cont=1;
					
					
					$stmt->bind_param("iiiii",$cont,$cont,$data['user_id'],$company_id,$data['page_id']);
					$stmt->execute();
					$stmt = $dbCon->prepare("select user_login_id from employees where company_id=? and user_login_id not in (select user_id from manage_employee_permissions where company_id=? and page_id=?)");
					/* bind parameters for markers */
					
					$stmt->bind_param("iii",$company_id,$company_id,$data['page_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					while($row = $result->fetch_assoc())
					{
						$stmt = $dbCon->prepare("insert into manage_employee_permissions (user_id,company_id,page_id,created_date,modified_date) values(?, ?, ?, now(),now())");
						/* bind parameters for markers */
						$cont=1;
						$stmt->bind_param("iii",$row['user_login_id'],$company_id,$data['page_id']);
						$stmt->execute();
					}
				}
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			
		}
		
		function disconnectSupplier($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$user_id= $this -> encrypt_decrypt('decrypt',$_POST['uids']);
			//echo $company_id."--".$user_id; die;
			
			$stmt = $dbCon->prepare("delete from user_suppliers where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$user_id);
			$stmt->execute();
			
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}	
		function disconnectEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$user_id= $this -> encrypt_decrypt('decrypt',$_POST['uid']);
			
			$stmt = $dbCon->prepare("delete from estore_employee_invite where company_id=? and real_employee_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$user_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from user_company_profile where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$user_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from company_permission where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$user_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from employees where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$user_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from employee_request_cloud where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$user_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from manage_employee_permissions where company_id=? and user_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$user_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select company_email from companies where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select email from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row_user = $result1->fetch_assoc();
			
			$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where company_id=?");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_invited = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where company_id=? and real_employee_id is not null");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_invited_approved = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select count(id) as num from employee_request_cloud where company_id=?");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_request = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select count(id) as num from employee_request_cloud where company_id=? and is_approved=1");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_request_approved = $result->fetch_assoc();
			
			$total_request=$row_invited['num']+$row_request['num'];
			$total_request_approved=$row_invited_approved['num']+$row_request_approved['num'];
			$completed=($total_request_approved/$total_request)*100;
			$completed=round($completed,0);
			
			$stmt = $dbCon->prepare("update company_profiles set completed_requests=? where company_id=?");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("ii", $completed,$company_id);
			$stmt->execute();
			
			$fields=array();
			$fields['user_email']=$row_user['email'];
			$fields['company_email']=$row['company_email'];
			$url='https://www.qmatchup.com/beta/user/index.php/Invitation/disconnectEmployee';
			$ch = curl_init();
			//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
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
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			//	echo curl_error($ch);
			//echo $status_code; die;
			curl_close ($ch);
			
			if($result==0)
			{
				//echo "none"; die;
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			else
			{
				//echo "jain"; die;
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			
		}
		
		function profileInfo($data)
		{
			$dbCon = AppModel::createConnection();
			
			function month_s($value)
			{
				if($value==1)
				{
					return "January";
				}
				else if($value==2)
				{
					return "February";
				}
				else if($value==3)
				{
					return "March";
				}
				else if($value==4)
				{
					return "April";
				}
				else if($value==5)
				{
					return "May";
				}
				else if($value==6)
				{
					return "June";
				}
				else if($value==7)
				{
					return "July";
				}
				else if($value==8)
				{
					return "August";
				}
				
				else if($value==9)
				{
					return "September";
				}
				else if($value==10)
				{
					return "October";
				}
				else if($value==11)
				{
					return "November";
				}
				else if($value==12)
				{
					return "December";
				}
			}
			
			if($_POST['rid']==1)
			{
				$requestApprove='<div class="wi_50 padrl30 lgtgrey_bg"><a href="#" class="wi_100 hei_40p dblock brdrad3 lgn_hight_40 txt_37a000">Reject</a></div>
				<div class="wi_50 padrl30"><a href="#" class="wi_100 hei_40p dblock brdrad3 bg_37a000 lgn_hight_40 txt_f">Approve</a></div>';
			}
			else if($_POST['rid']==2)
			{
				$requestApprove='<div class="wi_50 padrl30 lgtgrey_bg"><a href="../rejectRequestCustomer/'.$_POST['aid'].'/'.$_POST['cid'].'" class="wi_100 hei_40p dblock brdrad3 lgn_hight_40 txt_37a000">Reject</a></div>
				<div class="wi_50 padrl30"><a href="../approveRequestCustomer/'.$_POST['aid'].'/'.$_POST['cid'].'" class="wi_100 hei_40p dblock brdrad3 bg_37a000 lgn_hight_40 txt_f">Approve</a></div>';
			}
			else if($_POST['rid']==3)
			{
				$requestApprove='<div class="wi_50 padrl30 lgtgrey_bg"><a href="../rejectRequestStudent/'.$_POST['aid'].'/'.$_POST['cid'].'" class="wi_100 hei_40p dblock brdrad3 lgn_hight_40 txt_37a000">Reject</a></div>
				<div class="wi_50 padrl30"><a href="../approveRequestStudent/'.$_POST['aid'].'/'.$_POST['cid'].'" class="wi_100 hei_40p dblock brdrad3 bg_37a000 lgn_hight_40 txt_f">Approve</a></div>';
			}
			else if($_POST['rid']==4)
			{
				$requestApprove='<div class="wi_50 padrl30 lgtgrey_bg"><a href="../rejectRequestTenant/'.$_POST['aid'].'/'.$_POST['cid'].'" class="wi_100 hei_40p dblock brdrad3 lgn_hight_40 txt_37a000">Reject</a></div>
				<div class="wi_50 padrl30"><a href="../approveRequestTenant/'.$_POST['aid'].'/'.$_POST['cid'].'" class="wi_100 hei_40p dblock brdrad3 bg_37a000 lgn_hight_40 txt_f">Approve</a></div>';
			}
			function base64_to_jpeg($base64_string, $output_file) {
				
				$ifp = fopen( $output_file, 'wb' ); 
				
				
				$data = explode( ',', $base64_string );
				
				fwrite( $ifp, base64_decode( $data[1] ) );
				
				
				fclose( $ifp ); 
				
				return $output_file; 
			}
			
			$stmt = $dbCon->prepare("select degree_type,user_educations.id,country.country_name,duration,country.id as c_id,school.name as school,school.id as s_id, class.name as degree,class.id as cl_id,field,grade,duration_start,duration_end,activities,description,degree_type 
			from user_educations left join country on user_educations.country_id=country.id left join school on user_educations.school=school.id left join class on user_educations.degree=class.id where user_logins_id = ?  AND user_educations.is_deleted=0 order by duration_start desc");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row_edu = $result->fetch_assoc())
			{
				$org=$org.'<strong>'.iconv("UTF-8", "ISO-8859-1//IGNORE",$row_edu['degree']).'</strong>@ '.iconv("UTF-8", "ISO-8859-1//IGNORE",$row_edu['school']).' 
				<p>'.$row_edu['duration_start']." - ".$row_edu['duration_end'].'</p>
				
				
				';
			}
			
			
			$stmt = $dbCon->prepare("select r_email,user_employements.id as cv_com_id,company_name,location,title,duration_start_month,duration_start,duration_end_month,duration_end,current_job,description
			from user_employements where user_employements.user_logins_id =? AND user_employements.is_deleted=? order by duration_end desc,duration_end_month desc,duration_start desc");
			
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("ii", $_POST['id'],$cont);
			$stmt->execute();
			$result = $stmt->get_result();
			$expr='';
			while($row_exp = $result->fetch_assoc())
			{
				
				$start_month=month_s($row_exp['duration_start_month']);
				$endmonth = month_s($row_exp['duration_end_month']);
				$endyear = $row_exp['duration_end'];
				if($row_exp['duration_end']==2100)
				{
					$end_val=0;
				}
				else
				{
					$end_val=$row_exp['duration_end_month'];
				}
				
				
				if($row_exp['duration_end'] == '2100')
				
				{ 
					$worki= "Still working";
				}
				
				else $worki= $endmonth." ".$endyear;
				$title= $row_exp['title'];
				$company_name=$row_exp['company_name'];
				$location=$row_exp['location'];
				$expr=$expr.' <strong>'.$title.'</strong>@'.$company_name.'<p>'.$start_month.' '.$row_exp['duration_start'].' - '.$worki.' | </p><p>'.$location.'</p>';
				//break;
			}
			//$expr=str_ireplace('&auml;','a',$expr);
			//$expr=str_ireplace('&ouml;','o',$expr);
			//$expr=str_ireplace('&euml;','e',$expr);	
			//$expr=str_ireplace('&aring;','a',$expr);
			$stmt = $dbCon->prepare("select user_logins.id,summary,ssn,first_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image,sex,dob_day,dob_month,dob_year,address,zipcode,user_profiles.city,user_profiles.country,phone_number,country_code from user_logins left join user_profiles on user_logins.id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where user_logins.id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			//print_r($row); die;
			$dt=$row['dob_day'].'-'.$row['dob_month'].'-'.$row['dob_year'];
			$dt=date('d M Y',strtotime($dt));
			if($row['sex']==1)
			{
				$h="He";
			}
			else
			{
				$h="She";
			}
			
			if($row ['passport_image']!=null) { $filename="../estorecss/".$row['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a = base64_to_jpeg($value_a, '../estorecss/tmp'.$_POST['id'].'.jpg' ); } else { $value_a="../html/usercontent/images/default-profile-pic.jpg"; } }  else $value_a="../html/usercontent/images/default-profile-pic.jpg";
			
			
			
			
			$output='<div class="crm-popup profile-popup wi_350p xxx-wi_100 maxwi_90 xxs-maxwi_100 hei_100vh-70p xxs-hei_100vh ovfl_auto dnone pos_fix zi99 top20p xxs-top0 right30 bs_bb bxsh_0220_01 xxs-bxsh_none brdradtl5 xxs-brdrad0 bg_f2 lgn_hight_s14 fsz13 xxs-fsz16 bxsh_0220_0_14_031-2_0_2_0150_0_12 bxsh_0_trans_0_trans_02150_0_3_ph opbxsh_0004_6f_sibc active" style="display: block;">
			<a href="#" class="close_popup_modal dblock xxs-dnone pos_abs top0 right0 padrl10 brdrad3 bg_f80 lgn_hight_40 bold txt_f " onclick="closePop();">Close</a>
			<div class="popup-content"><div><h2 class="xxs-dnone mar0 padrl20 padtb10 lgn_hight_20 fsz16 black_txt yellownew3_bg">Valid 24 hours</h2><div class="padb80 xxs-pad0 xxs-padb80" style="background-color:#fdfdfd;">
			<div class="xxs-mar0 padtrl20 xxs-pad0  xxs-bxsh_none yellownew_bg"><div class="dflex xxs-fxdir_col xxs-bxsh_016_577376_035"><div class="hei_125p dnone xxs-dblock padt20 bg_31932c"><div class="minwi_0 dflex alit_fs justc_sb marb20 padrl10 txt_f"><a href="#" class="close_popup_modal wi_70p fxshrink_0 dblock pad5"><img src="images/close-white.svg" width="18" height="18"></a><div class="minwi_0 flex_1 talc"><div class="ovfl_hid ws_now txtovfl_el fsz18">We are looking for a very good web developer to do random tasks</div><div class="fsz16">1 of 8 Best Match</div></div><div class="wi_70p fxshrink_0 dflex justc_fe fsz26"><a href="#" class="fa fa-thumbs-o-up marl10 txt_f"></a><a href="#" class="fa fa-thumbs-o-down marl10 txt_f"></a></div></div><div class="hei_20p diblock pos_rel padl10 bg_14bff5 uppercase lgn_hight_20 fsz15 txt_f"><span class="pos_abs top0 left100 brd brdwi_10 brdclr_14bff5 brdrclr_transi"></span>Best match</div></div><div class="xxs-wi_100 fxshrink_0 pos_rel xxs-mart-50 padr15 xxs-pad0 xxs-marb5"><img src="../../../'.$value_a.'" width="100" height="100" class="dblock marrla xxs-brd xxs-brdwi_5 xxs-brdclr_f brd brdwi_5 brdclr_f dblock marrla xxs-brd xxs-brdwi_5 xxs-brdclr_f brdrad5" title="Sushil Jain" alt="Sushil Jain"></div><div class="flex_1 xxs-dflex xxs-fxdir_col xxs-padrl20 xxs-talc"><div class="dflex xxs-dblock xxs-order_1 alit_fs justc_sb padb0 xxs-pad0"><h3 class="mar0 xxs-mar0 pad0 bold fsz22 black_txt">'.$row['name'].'</h3></div><div class="xxs-order_3 marb10 xxs-marb5 lgn_hight_24 xxs-bold fsz15 xxs-fsz26 black_txt">'.$row['ssn'].'</div><div class="dnone xxs-dblock xxs-order_4 marb15 uppercase txt_14bff5"><span class="fa fa-star"></span> Rising talent</div><div class="xxs-order_2 marb10 xxs-marb15 xxs-fsz18 xxs-txt_8e black_txt"><span class="fa fa-map-marker xxs-dnone"></span> <span class="xxs-dnone">India - 10:58 fm local time - 3 hrs behind</span><span class="dnone xxs-dblock">India, 10:58 fm</span></div><div class="xxs-dnone marl-5 fsz12"><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">Family & Friend</span></div><div class="dnone xxs-dblock xxs-order_6 mart20 padtb15 brdt txt_8e"><span class="marrl5"><span class="bold txt_0">0</span> jobs</span><span class="marrl5"><span class="bold txt_0">0</span> hours</span></div></div></div></div>
			<div class=" xxs-mart15 xxs-marrl10  bg_f"><h3 class="marrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10 black_txt">Age</h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz16 black_txt">'.$h.' was born '.$dt.'</div></div>
			<div class=" xxs-mart15 xxs-marrl10  bg_f"><h3 class="marrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10 black_txt">Address</h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz16 black_txt">'.$row['address'].', '.$row['zipcode'].', '.$row['city'].', '.$row['country'].'<div class="base"><div class="toggle_content dnone">undefined</div><a href="#" class="toggle-btn dblock nobold blue_txt" data-toggle-id="base"><span class="padt5 dblock dnone_pa">View map</span><span class="dnone dblock_pa">less</span></a></div></div></div>
			<div class=" xxs-mart15 xxs-marrl10  bg_f"><h3 class="marrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10 black_txt">Phone</h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz16 black_txt">+'.$row['country_code'].' '.$row['phone_number'].'</div></div>
			<div class=" xxs-mart15 xxs-marrl10  bg_f"><h3 class="martrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10 black_txt">Professional</h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz16 black_txt">
			
			
			
			
			'.$row['summary'].'
			
			<div class="base"><div class="toggle_content dnone">undefined</div><a href="#" class="toggle-btn dblock bold blue_txt" data-toggle-id="base"><span class="padt5 dblock dnone_pa">more</span><span class="dnone dblock_pa">less</span></a></div></div></div>
			<div class=" xxs-mart15 xxs-marrl10  bg_f"><h3 class="martrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10 black_txt">Experiecne</h3>
			<div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz16 black_txt"> '.$expr.'
			
			
			<div class="base"><div class="toggle_content dnone">undefined</div><a href="#" class="toggle-btn dblock bold blue_txt" data-toggle-id="base"><span class="padt5 dblock dnone_pa">more</span><span class="dnone dblock_pa">less</span></a></div></div></div>
			<div class=" xxs-mart15 xxs-marrl10  bg_f"><h3 class="martrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10 black_txt">Education</h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz16 black_txt">'.$org.'
			
			
			<div class="base"><div class="toggle_content dnone">undefined</div><a href="#" class="toggle-btn dblock bold blue_txt" data-toggle-id="base"><span class="padt5 dblock dnone_pa">more</span><span class="dnone dblock_pa">less</span></a></div></div></div><div class=" xxs-mart15 xxs-marrl10  bg_f dnone xxs-dblock"><h3 class="martrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10">Skills</h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz14"><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">jQuery</span><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">HTML5</span><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">CSS3</span><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">PHP</span></div></div><div class=" xxs-mart15 xxs-marrl10  bg_f dnone xxs-dblock"><h3 class="martrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10"> </h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz14"></div></div></div><div class="wi_350p xxs-wi_100vw maxwi_90 xxs-maxwi_100vw pos_fix bot50p_new right30 bs_bb pad10 lgtgrey_bg">
			<div class="dflex talc bold">
			'.$requestApprove.'
			</div></div></div></div>
			</div>'; 
			
			return $output;
		}
		
		function requestDetailTenant($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select user_tenants.id,company_name,last_name,first_name,email,user_tenants.created_on,user_logins.id as uid from user_tenants left join user_logins on user_logins.id=user_tenants.user_login_id left join companies on companies.id=user_tenants.company_id where company_id=? and is_approved=0 limit 0,20");
			
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
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreRequestDetailTenant($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select user_tenants.id,company_name,last_name,first_name,email,user_tenants.created_on,user_logins.id as uid from user_tenants left join user_logins on user_logins.id=user_tenants.user_login_id left join companies on companies.id=user_tenants.company_id where company_id=? and is_approved=0 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org2="'".$org1."'";
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " ><a href="#" class="show_popup_modal "  onclick="showUserDetailReceived('.$row['uid'].',this,'.$org2.',4);">'.$row['first_name'].' </a></div>
				</td>
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " > '.$row['last_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall cd">
				<div class="padtb5 ">'.$row['email'].'</div>
				</td>
				
				
				<td class="pad5 brdb_new tall ap" >
				<div class="padtb5"><a href="../approveRequestTenant/'.$org1.'/'.$data['cid'].'" >Godkänn</a></div>
				</td>
				<td class="pad5 brdb_new tall rj">
				<div class="padtb5"><a href="../rejectRequestTenant/'.$org1.'/'.$data['cid'].'">Avböj</a></div>
				</td>
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function requestDetailApprovedTenant($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select user_tenants.id,company_name,last_name,first_name,email,user_tenants.created_on from user_tenants left join user_logins on user_logins.id=user_tenants.user_login_id left join companies on companies.id=user_tenants.company_id where company_id=? and is_approved=1 limit 0,20");
			
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
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function requestDetailRejectedTenant($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select user_tenants.id,company_name,last_name,first_name,email,user_tenants.created_on from user_tenants left join user_logins on user_logins.id=user_tenants.user_login_id left join companies on companies.id=user_tenants.company_id where company_id=? and is_approved=2 limit 0,20");
			
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
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreRequestDetailApprovedTenant($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select user_tenants.id,company_name,last_name,first_name,email,user_tenants.created_on from user_tenants left join user_logins on user_logins.id=user_tenants.user_login_id left join companies on companies.id=user_tenants.company_id where company_id=? and is_approved=1 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['first_name'].' </div>
				</td>
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " > '.$row['last_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall cd">
				<div class="padtb5 ">'. $row['email'].'</div>
				</td>
				
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreRequestDetailRejectedTenant($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select user_tenants.id,company_name,last_name,first_name,email,user_tenants.created_on from user_tenants left join user_logins on user_logins.id=user_tenants.user_login_id left join companies on companies.id=user_tenants.company_id where company_id=? and is_approved=2 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['first_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['last_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall cd">
				<div class="padtb5 ">'.$row['email'].'</div>
				</td>
				
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function approveRequestTenant($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("update user_tenants set is_approved=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			
			$stmt->execute();
			
			
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		
		function rejectRequestTenant($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("update user_tenants set is_approved=2 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		
		function approveCountTenant($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from user_tenants where company_id=? and is_approved=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		function pendingCountTenant($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from user_tenants where company_id=? and is_approved=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		function rejectedCountTenant($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from user_tenants where company_id=? and is_approved=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		function requestDetailStudent($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select user_students.id,company_name,last_name,first_name,email,user_students.created_on,user_logins.id as uid from user_students left join user_logins on user_logins.id=user_students.user_login_id left join companies on companies.id=user_students.company_id where company_id=? and is_approved=0 limit 0,20");
			
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
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreRequestDetailStudent($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select user_students.id,company_name,last_name,first_name,email,user_students.created_on,user_logins.id as uid from user_students left join user_logins on user_logins.id=user_students.user_login_id left join companies on companies.id=user_students.company_id where company_id=? and is_approved=0 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org2="'".$org1."'";
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " ><a href="#" class="show_popup_modal "  onclick="showUserDetailReceived('.$row['uid'].',this,'.$org2.',3);">'.$row['first_name'].' </a> </div>
				</td>
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " > '.$row['last_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall cd">
				<div class="padtb5 ">'.$row['email'].'</div>
				</td>
				
				
				<td class="pad5 brdb_new tall ap" >
				<div class="padtb5"><a href="../approveRequestStudent/'.$org1.'/'.$data['cid'].'" >Godkänn</a></div>
				</td>
				<td class="pad5 brdb_new tall rj">
				<div class="padtb5"><a href="../rejectRequestStudent/'.$org1.'/'.$data['cid'].'">Avböj</a></div>
				</td>
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function requestDetailApprovedStudent($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select user_students.id,company_name,last_name,first_name,email,user_students.created_on from user_students left join user_logins on user_logins.id=user_students.user_login_id left join companies on companies.id=user_students.company_id where company_id=? and is_approved=1 limit 0,20");
			
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
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function requestDetailRejectedStudent($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select user_students.id,company_name,last_name,first_name,email,user_students.created_on from user_students left join user_logins on user_logins.id=user_students.user_login_id left join companies on companies.id=user_students.company_id where company_id=? and is_approved=2 limit 0,20");
			
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
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreRequestDetailApprovedStudent($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select user_students.id,company_name,last_name,first_name,email,user_students.created_on from user_students left join user_logins on user_logins.id=user_students.user_login_id left join companies on companies.id=user_students.company_id where company_id=? and is_approved=1 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['first_name'].' </div>
				</td>
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " > '.$row['last_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall cd">
				<div class="padtb5 ">'.$row['email'].'</div>
				</td>
				
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreRequestDetailRejectedStudent($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select user_students.id,company_name,last_name,first_name,email,user_students.created_on from user_students left join user_logins on user_logins.id=user_students.user_login_id left join companies on companies.id=user_students.company_id where company_id=? and is_approved=2 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['first_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['last_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall cd">
				<div class="padtb5 ">'.$row['email'].'</div>
				</td>
				
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function approveRequestStudent($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("update user_students set is_approved=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			
			$stmt->execute();
			
			
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		
		function rejectRequestStudent($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("update user_students set is_approved=2 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		
		function approveCountStudent($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from user_students where company_id=? and is_approved=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		function pendingCountStudent($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from user_students where company_id=? and is_approved=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		function rejectedCountStudent($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from user_students where company_id=? and is_approved=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		function requestDetailCustomer($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select user_suppliers.id,company_name,last_name,first_name,email,user_suppliers.created_on,user_logins.id as uid from user_suppliers left join user_logins on user_logins.id=user_suppliers.user_login_id left join companies on companies.id=user_suppliers.company_id where company_id=? and is_approved=0 limit 0,20");
			
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
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreRequestDetailCustomer($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select user_suppliers.id,company_name,last_name,first_name,email,user_suppliers.created_on,user_logins.id as uid from user_suppliers left join user_logins on user_logins.id=user_suppliers.user_login_id left join companies on companies.id=user_suppliers.company_id where company_id=? and is_approved=0 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org2="'".$org1."'";
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " ><a href="#" class="show_popup_modal "  onclick="showUserDetailReceived('.$row['uid'].',this,'.$org2.',2);">'.$row['first_name'].' </a></div>
				</td>
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['last_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall cd">
				<div class="padtb5 ">'.$row['email'] .'</div>
				</td>
				
				
				<td class="pad5 brdb_new tall ap" >
				<div class="padtb5"><a href="../approveRequestCustomer/'.$org1.'/'.$data['cid'].'" >Godkänn</a></div>
				</td>
				<td class="pad5 brdb_new tall rj">
				<div class="padtb5"><a href="../rejectRequestCustomer/'.$org1.'/'.$data['cid'].'">Avböj</a></div>
				</td>
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function requestDetailApprovedCustomer($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select user_suppliers.id,company_name,last_name,first_name,email,user_suppliers.created_on,user_suppliers.user_login_id from user_suppliers left join user_logins on user_logins.id=user_suppliers.user_login_id left join companies on companies.id=user_suppliers.company_id where company_id=? and is_approved=1 limit 0,20");
			
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
				$org[$j]['uid']= $this -> encrypt_decrypt('encrypt',$row['user_login_id']);
				$j++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function requestDetailRejectedCustomer($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select user_suppliers.id,company_name,last_name,first_name,email,user_suppliers.created_on from user_suppliers left join user_logins on user_logins.id=user_suppliers.user_login_id left join companies on companies.id=user_suppliers.company_id where company_id=? and is_approved=2 limit 0,20");
			
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
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreRequestDetailApprovedCustomer($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select user_suppliers.id,company_name,last_name,first_name,email,user_suppliers.created_on,user_suppliers.user_login_id from user_suppliers left join user_logins on user_logins.id=user_suppliers.user_login_id left join companies on companies.id=user_suppliers.company_id where company_id=? and is_approved=1 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org2= $this -> encrypt_decrypt('encrypt',$row['user_login_id']);
				$org2="'".$org2."'";
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['first_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['last_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall cd">
				<div class="padtb5 ">'.$row['email'].'</div>
				</td>
				
				<td class="pad5 brdb_new tall cd">
				<div class="padtb5 "><a href="javascript:void();" onclick="setDisconnectSupplier('.$org2.');">Disconnect</a></div>
				</td>
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreRequestDetailRejectedCustomer($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select user_suppliers.id,company_name,last_name,first_name,email,user_suppliers.created_on from user_suppliers left join user_logins on user_logins.id=user_suppliers.user_login_id left join companies on companies.id=user_suppliers.company_id where company_id=? and is_approved=2 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['first_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['last_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall cd">
				<div class="padtb5 ">'.$row['email'].'</div>
				</td>
				
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function approveRequestCustomer($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("update user_suppliers set is_approved=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			
			$stmt->execute();
			
			
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		
		function rejectRequestCustomer($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("update user_suppliers set is_approved=2 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function rejectEmployeeRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("update employee_request_cloud set is_approved=2 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function approveEmployeeRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("update employee_request_cloud set is_approved=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select user_login_id,company_id from employee_request_cloud where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code,country_of_residence from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_login_id']);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row_user = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select company_email from companies where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['company_id']);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row_company = $result->fetch_assoc();
			
			
			
			
			
			$s=0;
			$u=1;
			$stmt= $dbCon->prepare("insert into company_permission (`company_id`,`user_login_id`,`purchase`,`alert`,`supplier`,`customer`,`employee`,`proposal`,`project_proposal`,`create_article`,`import_article`) values (?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("iiiiiiiiiii", $row['company_id'],$row['user_login_id'],$s,$s,$s,$s,$u,$s,$s,$s,$s);
			$stmt->execute();
			
			$stmt= $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`) values (?,?,?,?,?,?,?)");
			
			
			$stmt->bind_param("ississi", $row['company_id'],$row_user['first_name'],$row_user['last_name'],$s,$row_user['hash_code'],$row_user['email'],$row_user['id']);
			$stmt->execute();
			
			$stmt= $dbCon->prepare("insert into user_company_profile (company_id,user_login_id) values (?,?)");
			$stmt->bind_param("ii", $row['company_id'],$row_user['id']);
			$stmt->execute();
			
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
			
			$fields=array();
			$fields=$row_user;
			$fields['company_email']=$row_company['company_email'];
			$url='https://www.qmatchup.com/beta/user/index.php/Invitation/updateUserEmployeeRequest';
			$ch = curl_init();
			//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
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
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			//	echo curl_error($ch);
			//echo $status_code; die;
			curl_close ($ch);
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		
		
		function approveCountCustomer($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from user_suppliers where company_id=? and is_approved=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		function pendingCountCustomer($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from user_suppliers where company_id=? and is_approved=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		function rejectedCountCustomer($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from user_suppliers where company_id=? and is_approved=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		
		
		
		
		function requestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select employee_request_cloud.id,company_name,last_name,first_name,email,user_logins.id as uid from employee_request_cloud left join user_logins on user_logins.id=employee_request_cloud.user_login_id left join companies on companies.id=employee_request_cloud.company_id where company_id=? and is_approved=0 limit 0,20");
			
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
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function sentRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select estore_employee_invite.id,company_name,estore_employee_invite.last_name,estore_employee_invite.name as first_name,email from estore_employee_invite left join companies on companies.id=estore_employee_invite.company_id where company_id=? and real_employee_id is null limit 0,20");
			
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
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreSentRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			
			$stmt = $dbCon->prepare("select estore_employee_invite.id,company_name,estore_employee_invite.last_name,estore_employee_invite.name as first_name,email from estore_employee_invite left join companies on companies.id=estore_employee_invite.company_id where company_id=? and real_employee_id is null limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org2="'".$org1."'";
				$org=$org.'<tr class="fsz14 xs-fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['first_name'].' </div>
				</td>
				<td class="pad5 brdb_new hidden-xs tall nm">
				<div class="padtb5 ">'.$row['last_name'].'</div>
				</td>
				<td class="pad5 brdb_new   tall cd">
				<div class="padtb5 ">'.$row['email'].'</div>
				</td>
				
				
				<td class="pad5 brdb_new tall ap hidden-xs " >
				<div class="padtb5"><a href="#" >Pending</a></div>
				</td>
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function moreRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select employee_request_cloud.id,company_name,last_name,first_name,email,user_logins.id as uid from employee_request_cloud left join user_logins on user_logins.id=employee_request_cloud.user_login_id left join companies on companies.id=employee_request_cloud.company_id where company_id=? and is_approved=0 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org2="'".$org1."'";
				$org=$org.'<tr class="fsz14 xs-fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " ><a href="#" class="show_popup_modal "  onclick="showUserDetailReceived('.$row['uid'].',this,'.$org2.',1);">'.$row['first_name'].' </a></div>
				</td>
				<td class="pad5 brdb_new tall nm hidden-xs ">
				<div class="padtb5 ">'.$row['last_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall cd">
				<div class="padtb5 ">'.$row['email'].'</div>
				</td>
				
				
				<td class="pad5 brdb_new tall ap hidden-xs " >
				<div class="padtb5"><a href="../approveEmployeeRequest/'.$data['cid'].'/'.$org1.'" >Godkänn</a></div>
				</td>
				<td class="pad5 brdb_new tall rj hidden-xs ">
				<div class="padtb5"><a href="../rejectEmployeeRequest/'.$data['cid'].'/'.$org1.'">Avböj</a></div>
				</td>
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreApprovedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select manage_employee_permissions.id,company_name,last_name,first_name,email,manage_employee_permissions.user_id from manage_employee_permissions left join user_logins on user_logins.id=manage_employee_permissions.user_id left join companies on companies.id=manage_employee_permissions.company_id where company_id=? limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org2= $this -> encrypt_decrypt('encrypt',$row['user_id']);
				$org2="'".$org2."'";
				$org=$org.'<tr class="fsz14 xs-fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['first_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall nm hidden-xs ">
				<div class="padtb5 ">'.$row['last_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall cd">
				<div class="padtb5 ">'.$row['email'].'</div>
				</td>
				<td class="pad5 brdb_new tall cd">
				<div class="padtb5 "><a href="javascript:void();" onclick="setDisconnect('.$org2.');">Disconnect</a></div>
				</td>
				<td class="pad5 brdb_new tall cd">
				<a href="https://www.safeqloud.com/user/index.php/ManagePermissions/setPermissions/'.$org1.'" class="load_more_results  marrl5">Permission</a>
				</td>
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreRejectDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			//print_r($_POST); die;
			$stmt = $dbCon->prepare("select employee_request_cloud.id,company_name,last_name,first_name,email from employee_request_cloud left join user_logins on user_logins.id=employee_request_cloud.user_login_id left join companies on companies.id=employee_request_cloud.company_id where company_id=? and is_approved=2 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<tr class="fsz14 xs-fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['first_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall nm hidden-xs ">
				<div class="padtb5 ">'.$row['last_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall cd">
				<div class="padtb5 ">'.$row['email'].'</div>
				</td>
				
				<td class="pad5 brdb_new tall ap hidden-xs " >
				<div class="padtb5"><a href="#" >Rejected</a></div>
				</td>
				
				
				</tr>';
				
			}
			//echo $org; die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function approveDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select manage_employee_permissions.id,company_name,last_name,first_name,email,manage_employee_permissions.user_id from manage_employee_permissions left join user_logins on user_logins.id=manage_employee_permissions.user_id left join companies on companies.id=manage_employee_permissions.company_id where company_id=?  limit  0,20");
			
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
				$org[$j]['uid']= $this -> encrypt_decrypt('encrypt',$row['user_id']);
				$j++;
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function rejectDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select employee_request_cloud.id,company_name,last_name,first_name,email from employee_request_cloud left join user_logins on user_logins.id=employee_request_cloud.user_login_id left join companies on companies.id=employee_request_cloud.company_id where company_id=? and is_approved=2  limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function sentRequestCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where company_id=? and real_employee_id is null");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function requestCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from employee_request_cloud where company_id=? and is_approved=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		function approveCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from employees where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function rejectCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from employee_request_cloud where company_id=? and is_approved=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
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
		
		function completedEmployeeRequests($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select employees.company_id,company_name,profile_pic from employees left join companies on employees.company_id=companies.id left join company_profiles on companies.id=company_profiles.company_id where employees.user_login_id = ? and o_type=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
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
			
			$stmt = $dbCon->prepare("select grading_status ,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
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
    	
		function requestDetailCustomerOld($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select company_customer_requests.id,company_name,last_name,first_name,email,company_customer_requests.created_on from company_customer_requests left join user_logins on user_logins.id=company_customer_requests.user_login_id left join companies on companies.id=company_customer_requests.company_id where company_id=? and is_approved=0 limit 0,20");
			
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
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreRequestDetailCustomerOld($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			
			$stmt = $dbCon->prepare("select company_customer_requests.id,company_name,last_name,first_name,email,company_customer_requests.created_on from company_customer_requests left join user_logins on user_logins.id=company_customer_requests.user_login_id left join companies on companies.id=company_customer_requests.company_id where company_id=? and is_approved=0 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['first_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall nm">
				<div class="padtb5 ">'.$row['last_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall cd">
				<div class="padtb5 ">'.$row['email'].'</div>
				</td>
				
				
				<td class="pad5 brdb_new tall ap" >
				<div class="padtb5"><a href="../approveRequest/'.$org1.'/'.$data['cid'].'" >Godkänn</a></div>
				</td>
				<td class="pad5 brdb_new tall rj">
				<div class="padtb5"><a href="../rejectRequest/'.$org1.'/'.$data['cid'].'">Avböj</a></div>
				</td>
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function requestDetailApprovedCustomerOld($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select company_customer_requests.id,company_name,last_name,first_name,email,company_customer_requests.created_on from company_customer_requests left join user_logins on user_logins.id=company_customer_requests.user_login_id left join companies on companies.id=company_customer_requests.company_id where company_id=? and is_approved=1 limit 0,20");
			
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
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreRequestDetailApprovedCustomerOld($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			
			$stmt = $dbCon->prepare("select company_customer_requests.id,company_name,last_name,first_name,email,company_customer_requests.created_on from company_customer_requests left join user_logins on user_logins.id=company_customer_requests.user_login_id left join companies on companies.id=company_customer_requests.company_id where company_id=? and is_approved=1 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['first_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall nm">
				<div class="padtb5 ">'.$row['last_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall cd">
				<div class="padtb5 ">'.$row['email'].'</div>
				</td>
				
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function approveCountCustomerOld($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_customer_requests where company_id=? and is_approved=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		function pendingCountCustomerOld($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_customer_requests where company_id=? and is_approved=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
	}
