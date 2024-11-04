<?php
	require_once('../AppModel.php');
	class CompanyConsentPlatformModel extends AppModel
	{
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=1");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
		function profileInfo1($data)
		{
			$dbCon = AppModel::createConnection();
			$id=explode('_',$_POST['id']);
			
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
			
			
			
			function base64_to_jpeg($base64_string, $output_file) {
				
				$ifp = fopen( $output_file, 'wb' ); 
				
				
				$data = explode( ',', $base64_string );
				
				fwrite( $ifp, base64_decode( $data[1] ) );
				
				
				fclose( $ifp ); 
				
				return $output_file; 
			}
		if($id[0]=='a')	
		{
			$stmt = $dbCon->prepare("select degree_type,user_educations.id,country.country_name,duration,country.id as c_id,school.name as school,school.id as s_id, class.name as degree,class.id as cl_id,field,grade,duration_start,duration_end,activities,description,degree_type 
			from user_educations left join country on user_educations.country_id=country.id left join school on user_educations.school=school.id left join class on user_educations.degree=class.id where user_logins_id = ?  AND user_educations.is_deleted=0 order by duration_start desc");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $id[1]);
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
			$stmt->bind_param("ii", $id[1],$cont);
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
			$stmt->bind_param("i", $id[1]);
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
			
			if($row ['passport_image']!=null) { $filename="../estorecss/".$row['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a = base64_to_jpeg($value_a, '../estorecss/tmp'.$id[1].'.jpg' ); } else { $value_a="../html/usercontent/images/default-profile-pic.jpg"; } }  else $value_a="../html/usercontent/images/default-profile-pic.jpg";
			
			
			
			
			$output='<div class="crm-popup profile-popup wi_360p xxx-wi_100 maxwi_90 xxs-maxwi_100 hei_100vh-70p xxs-hei_100vh ovfl_auto dnone pos_fix zi99 top20p xxs-top0 right30 bs_bb bxsh_0220_01 xxs-bxsh_none brdradtl5 xxs-brdrad0 bg_f2 lgn_hight_s14 fsz13 xxs-fsz16 bxsh_0220_0_14_031-2_0_2_0150_0_12  bxsh_0_trans_0_trans_02150_0_3_ph opbxsh_0004_6f_sibc active" style="display: block;">
			
			<div class="popup-content"><div><div class="padb80 xxs-pad0 xxs-padb80" style="background-color:#fdfdfd;">
			<div class="xxs-mar0 xxs-pad0  xxs-bxsh_none yellownew_bg"><div class="dflex xxs-fxdir_col xxs-bxsh_016_577376_035"><div class="hei_125p dnone xxs-dblock padt20 bg_31932c"><div class="minwi_0 dflex alit_fs justc_sb marb20 padrl10 txt_f"><a href="#" class="close_popup_modal wi_70p fxshrink_0 dblock pad5"><img src="images/close-white.svg" width="18" height="18"></a><div class="minwi_0 flex_1 talc"><div class="ovfl_hid ws_now txtovfl_el fsz18">We are looking for a very good web developer to do random tasks</div><div class="fsz16">1 of 8 Best Match</div></div><div class="wi_70p fxshrink_0 dflex justc_fe fsz26"><a href="#" class="fa fa-thumbs-o-up marl10 txt_f"></a><a href="#" class="fa fa-thumbs-o-down marl10 txt_f"></a></div></div><div class="hei_20p diblock pos_rel padl10 bg_14bff5 uppercase lgn_hight_20 fsz15 txt_f"><span class="pos_abs top0 left100 brd brdwi_10 brdclr_14bff5 brdrclr_transi"></span>Best match</div></div><div class="xxs-wi_100 fxshrink_0 pos_rel xxs-mart-50  xxs-pad0 xxs-marb5 brd brdwi_5 brdclr_f"><img src="../../../'.$value_a.'" width="333"  class="dblock marrla  dblock marrla " title="Sushil Jain" alt="Sushil Jain"></div>
			</div></div>
			<div class=" xxs-mart15 xxs-marrl10  bg_f"><h3 class="marrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10 black_txt">Name</h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz16 black_txt">'.$row['name'].'</div></div>
			<div class=" xxs-mart15 xxs-marrl10  bg_f"><h3 class="marrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10 black_txt">Social Security Number</h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz16 black_txt">'.$row['ssn'].'</div></div>
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
			
			
			<div class="base"><div class="toggle_content dnone">undefined</div><a href="#" class="toggle-btn dblock bold blue_txt" data-toggle-id="base"><span class="padt5 dblock dnone_pa">more</span><span class="dnone dblock_pa">less</span></a></div></div></div><div class=" xxs-mart15 xxs-marrl10  bg_f dnone xxs-dblock"><h3 class="martrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10">Skills</h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz14"><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">jQuery</span><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">HTML5</span><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">CSS3</span><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">PHP</span></div></div><div class=" xxs-mart15 xxs-marrl10  bg_f dnone xxs-dblock"><h3 class="martrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10"> </h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz14"></div></div></div><div class="wi_350p xxs-wi_100vw maxwi_90 xxs-maxwi_100vw pos_fix bot50p_new right30 bs_bb pad10 lgtgrey_bg"><div class="dflex talc bold"><div class="wi_50 padrl30 lgtgrey_bg"><a href="#" class="close_popup_modal wi_100 hei_40p dblock brdrad3 lgn_hight_40 txt_37a000">Close</a></div>
			<div class="wi_50 padrl30"><a href="#" class="wi_100 hei_40p dblock brdrad3 bg_37a000 lgn_hight_40 txt_f">Valid</a></div>
			</div></div></div>
			</div>'; 
		}
		else if($id[0]=='v')	
		{
		$stmt = $dbCon->prepare("select bank_id,verified_name from bankid_verified where bank_id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $id[1]);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
		$output='<div class="crm-popup profile-popup wi_360p xxx-wi_100 maxwi_90 xxs-maxwi_100 hei_100vh-70p xxs-hei_100vh ovfl_auto dnone pos_fix zi99 top20p xxs-top0 right30 bs_bb bxsh_0220_01 xxs-bxsh_none brdradtl5 xxs-brdrad0 bg_f2 lgn_hight_s14 fsz13 xxs-fsz16 bxsh_0220_0_14_031-2_0_2_0150_0_12  bxsh_0_trans_0_trans_02150_0_3_ph opbxsh_0004_6f_sibc active" style="display: block;">
			
			<div class="popup-content"><div><div class="padb80 xxs-pad0 xxs-padb80" style="background-color:#fdfdfd;">
			<div class="xxs-mar0 xxs-pad0  xxs-bxsh_none yellownew_bg"><div class="dflex xxs-fxdir_col xxs-bxsh_016_577376_035"><div class="hei_125p dnone xxs-dblock padt20 bg_31932c"><div class="minwi_0 dflex alit_fs justc_sb marb20 padrl10 txt_f"><a href="#" class="close_popup_modal wi_70p fxshrink_0 dblock pad5"><img src="images/close-white.svg" width="18" height="18"></a><div class="minwi_0 flex_1 talc"><div class="ovfl_hid ws_now txtovfl_el fsz18">We are looking for a very good web developer to do random tasks</div><div class="fsz16">1 of 8 Best Match</div></div><div class="wi_70p fxshrink_0 dflex justc_fe fsz26"><a href="#" class="fa fa-thumbs-o-up marl10 txt_f"></a><a href="#" class="fa fa-thumbs-o-down marl10 txt_f"></a></div></div><div class="hei_20p diblock pos_rel padl10 bg_14bff5 uppercase lgn_hight_20 fsz15 txt_f"><span class="pos_abs top0 left100 brd brdwi_10 brdclr_14bff5 brdrclr_transi"></span>Best match</div></div><div class="xxs-wi_100 fxshrink_0 pos_rel xxs-mart-50  xxs-pad0 xxs-marb5 brd brdwi_5 brdclr_f"><img src="../../../../html/usercontent/images/default-profile-pic.jpg" width="333"  class="dblock marrla  dblock marrla " title="Sushil Jain" alt="Sushil Jain"></div>
			</div></div>
			<div class=" xxs-mart15 xxs-marrl10  bg_f"><h3 class="marrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10 black_txt">Name</h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz16 black_txt">'.$row['verified_name'].'</div></div>
			<div class=" xxs-mart15 xxs-marrl10  bg_f"><h3 class="marrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10 black_txt">Social Security Number</h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz16 black_txt">'.$row['bank_id'].'</div></div>
			
			<div class=" xxs-mart15 xxs-marrl10  bg_f dnone xxs-dblock"><h3 class="martrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10">Skills</h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz14"><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">jQuery</span><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">HTML5</span><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">CSS3</span><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">PHP</span></div></div><div class=" xxs-mart15 xxs-marrl10  bg_f dnone xxs-dblock"><h3 class="martrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10"> </h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz14"></div></div></div><div class="wi_350p xxs-wi_100vw maxwi_90 xxs-maxwi_100vw pos_fix bot50p_new right30 bs_bb pad10 lgtgrey_bg"><div class="dflex talc bold"><div class="wi_50 padrl30 lgtgrey_bg"><a href="#" class="close_popup_modal wi_100 hei_40p dblock brdrad3 lgn_hight_40 txt_37a000">Close</a></div>
			<div class="wi_50 padrl30"><a href="#" class="wi_100 hei_40p dblock brdrad3 bg_37a000 lgn_hight_40 txt_f">Valid</a></div>
			</div></div></div>
			</div>';
		}
			return $output;
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
			
			$stmt = $dbCon->prepare("select grading_status,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
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
		
		
		function requestDetailConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select company_user_connection.id,company_name,last_name,first_name,email,company_user_connection.created_on,user_logins.id as uid,ssn from company_user_connection left join user_logins on user_logins.id=company_user_connection.user_id left join companies on companies.id=company_user_connection.company_id left join user_profiles on user_profiles.user_logins_id=user_logins.id where company_id=? and is_approved=0 limit 0,20");
			
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
		
		function moreRequestDetailConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select ssn,company_user_connection.id,company_name,last_name,first_name,email,company_user_connection.created_on,user_logins.id as uid from company_user_connection left join user_logins on user_logins.id=company_user_connection.user_id left join companies on companies.id=company_user_connection.company_id left join user_profiles on user_profiles.user_logins_id=user_logins.id where company_id=? and is_approved=0 limit ?,?");
			
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
				<div class="padtb5 " ><a href="#" class="black_txt">'.$row['first_name'].' '.$row['last_name'].'</a></div>
				</td>
				<td class="pad5 brdb_new tall cn hidden-xs">
				<div class="padtb5 " > '.$row['ssn'].'</div>
				</td>
				<td class="pad5 brdb_new tall cd hidden-xs">
				<div class="padtb5 ">'.date('Y-m-d',strtotime($row['created_on'])).'</div>
				</td>
				
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function requestDetailApprovedConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select ssn,company_user_connection.id,company_name,last_name,first_name,email,company_user_connection.created_on from company_user_connection left join user_logins on user_logins.id=company_user_connection.user_id left join companies on companies.id=company_user_connection.company_id left join user_profiles on user_profiles.user_logins_id=user_logins.id  where company_id=? and is_approved=1 limit 0,20");
			
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
		
		function requestDetailRejectedConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select ssn,company_user_connection.id,company_name,last_name,first_name,email,company_user_connection.created_on from company_user_connection left join user_logins on user_logins.id=company_user_connection.user_id left join companies on companies.id=company_user_connection.company_id left join user_profiles on user_profiles.user_logins_id=user_logins.id where company_id=? and is_approved=2 limit 0,20");
			
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
		
		function moreRequestDetailApprovedConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select ssn,company_user_connection.id,company_name,last_name,first_name,email,company_user_connection.created_on from company_user_connection left join user_logins on user_logins.id=company_user_connection.user_id left join companies on companies.id=company_user_connection.company_id left join user_profiles on user_profiles.user_logins_id=user_logins.id where company_id=? and is_approved=1 limit ?,?");
			
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
				<div class="padtb5 " >'.$row['first_name'].' '.$row['last_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall cn hidden-xs">
				<div class="padtb5 " > '.$row['ssn'].'</div>
				</td>
				<td class="pad5 brdb_new tall cd hidden-xs">
				<div class="padtb5 ">'.date('Y-m-d',strtotime($row['created_on'])).'</div>
				</td>
				
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreRequestDetailRejectedConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select ssn,company_user_connection.id,company_name,last_name,first_name,email,company_user_connection.created_on from company_user_connection left join user_logins on user_logins.id=company_user_connection.user_id left join companies on companies.id=company_user_connection.company_id left join user_profiles on user_profiles.user_logins_id=user_logins.id where company_id=? and is_approved=2 limit ?,?");
			
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
				<div class="padtb5 " >'.$row['first_name'].' '.$row['last_name'].'</div>
				</td>
				<td class="pad5 brdb_new tall cn hidden-xs">
				<div class="padtb5 " >'.$row['ssn'].'</div>
				</td>
				<td class="pad5 brdb_new tall cd hidden-xs">
				<div class="padtb5 ">'.date('Y-m-d',strtotime($row['created_on'])).'</div>
				</td>
				
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		
		function approveCountConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_user_connection where company_id=? and is_approved=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		function pendingCountConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_user_connection where company_id=? and is_approved=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		function rejectedCountConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_user_connection where company_id=? and is_approved=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function verifiedCountConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_user_connection where company_id=? and is_approved=3");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function requestVerifiedDetailConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select verified_name,user_ssn as ssn,user_id,company_user_connection.id,company_name,verified_by,company_user_connection.created_on from company_user_connection left join companies on companies.id=company_user_connection.company_id left join bankid_verified on bankid_verified.bank_id=company_user_connection.verified_by  where company_id=? and is_approved=3 limit 0,20");
			
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
				if($row['user_id']==0)
				{
					$org[$j]['receiver']="Unregistered User";
					
				}
				else
				
				{
					$stmt = $dbCon->prepare("select last_name,first_name from user_logins where id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['user_id']);
					$stmt->execute();
					$resultu = $stmt->get_result();
					$rowu = $resultu->fetch_assoc();
					$org[$j]['receiver']=$rowu['first_name'].' '.$rowu['first_name'];
				}
				$j++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreRequestVerifiedDetailConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select verified_name,user_ssn as ssn,user_id,company_user_connection.id,company_name,verified_by,company_user_connection.created_on from company_user_connection left join companies on companies.id=company_user_connection.company_id left join bankid_verified on bankid_verified.bank_id=company_user_connection.verified_by  where company_id=? and is_approved=3 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				if($row['user_id']==0)
				{
					$receiver="Unregistered User";
					
				}
				else
				
				{
					$stmt = $dbCon->prepare("select last_name,first_name from user_logins where id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['user_id']);
					$stmt->execute();
					$resultu = $stmt->get_result();
					$rowu = $resultu->fetch_assoc();
					$receiver=$rowu['first_name'].' '.$rowu['first_name'];
				}
				
				 if($row['user_id']==0) $rid= '"v_'.$value['verified_by'].'"'; else $rid= '"a_'.$value['user_id'].'"';
				 
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org2="'".$org1."'";
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " ><a href="#" class="show_popup_modal black_txt"  onclick="showUserDetail('.$rid.',this);">'.$row['verified_name'].'</a></div>
				</td>
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " > '.$row['ssn'].'</div>
				</td>
				<td class="pad5 brdb_new tall cd">
				<div class="padtb5 ">'.$receiver.'</div>
				</td>
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " > Approve</div>
				</td>
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " > Reject</div>
				</td>
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function approveVerification($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			
			$stmt = $dbCon->prepare("select user_id,verified_by from company_user_connection where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update company_user_connection set is_approved=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			
			$stmt->execute();
			
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function rejectVerification($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			
			$stmt = $dbCon->prepare("select user_id,verified_by from company_user_connection where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update company_user_connection set is_approved=2 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
	}		