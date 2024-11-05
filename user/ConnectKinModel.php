<?php

	require_once('../AppModel.php');
	class ConnectKinModel extends AppModel
	{
		function sendInvitation($data)
		{
			$dbCon = AppModel::createConnection();
			for($i=0;$i<$_POST['total_contact']; $i++)
			{
				$fname='fname'.$i;
				$cntry='cntry'.$i;
				$search_phone='search_phone'.$i;
				 
			$stmt = $dbCon->prepare("select user_logins.id,first_name,concat_ws(' ', first_name, last_name) as name,last_name,email from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where  phone_number=? and country_of_residence=?");
			
			 $stmt->bind_param("ss", $_POST[$search_phone],$_POST[$cntry]);
			$stmt->execute();
			
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			 
			if (empty($row))
			{
				
				$st=2;
				$stmt = $dbCon->prepare("select country_code from phone_country_code where id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $_POST[$cntry]);
				$stmt->execute();
				$result_phone = $stmt->get_result();
				$row_phone = $result_phone->fetch_assoc();
				
				$cid="+".$row_phone['country_code'];
				$to            = '+'.trim($row_phone['country_code']).''.trim($_POST[$search_phone]);
				
				$stmt = $dbCon->prepare("select id from connect_next_kin where connect_phone=? and sender_id=?");
				 $stmt->bind_param("si", $to,$data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_connect = $result->fetch_assoc();	
				
				if(empty($row_connect))
				{
					
					$j=0;
			
					while($j==0)
					{
					$code=mt_rand(111111,999999); 
					$stmt = $dbCon->prepare("select id from connect_next_kin where unique_code=?");
					/* bind parameters for markers */
					
					$stmt->bind_param("s",$code);
					$stmt->execute();
					$result = $stmt->get_result();
					$row = $result->fetch_assoc();
					if(empty($row))
					{
						$j++;
					}
					}
					
					
					$stmt = $dbCon->prepare("insert into connect_next_kin(keen_first_name,country_phone_id,connect_phone,sender_id,receiver_id,connect_by,created_on,unique_code) 
					values(?, ?, ?, ?, 0, ?, now(),? )");
					
					/* bind parameters for markers */
					$stmt->bind_param("sssiis", $_POST[$fname] ,$cid , $to,$data['user_id'],$st,$code);
					
					$stmt->execute();
					$id=$stmt->insert_id;
					$encd=$this->encrypt_decrypt('encrypt',$id);
					
					
					$to            = '+'.trim($row_phone['country_code']).''.trim($_POST[$search_phone]);
					$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name from user_logins where id=?");
					$stmt->bind_param("i", $data['user_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					
					$row = $result->fetch_assoc();
					
					$subject       = "Connect request received!";
					$url="https://www.qloudid.com/public/index.php/ConnectUnregistered/connectAccount/".$encd;
					$surl=getShortUrl($url);
					$emailContent =$row['name']." has sent you request to connect.Please connect here: ".$surl;
					$res=sendSms($subject, $to, $emailContent);
					  
					
				}
				 
			}
			
			else
			{
				if($data['user_id']==$row['id'])
				
				{
					 continue;
				}
				
				$stmt = $dbCon->prepare("select id from connect_next_kin where (sender_id=? and receiver_id=?) or (sender_id=? and receiver_id=?)");
				
				//print_r($row); die;
				
				$stmt->bind_param("iiii", $data['user_id'],$row['id'],$row['id'],$data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_connect = $result->fetch_assoc();
				if(empty($row_connect))
				{
					$stmt = $dbCon->prepare("select country_code from phone_country_code where id=?");
				
					/* bind parameters for markers */
					$stmt->bind_param("i", $_POST[$cntry]);
					$stmt->execute();
					$result_phone = $stmt->get_result();
					$row_phone = $result_phone->fetch_assoc();
					$cid="+".$row_phone['country_code'];
					$to            = '+'.trim($row_phone['country_code']).''.trim($_POST[$search_phone]);
					$st=2;
			$stmt = $dbCon->prepare("select first_name,last_name,passport_image from user_logins where id=?");
				
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_image = $result->fetch_assoc();
			if($row_image['passport_image']=="" || $row_image['passport_image']==null)
			{
				$img='';
			}
			else
			{
				$img=$row_image['passport_image'];
			}

			$stmt = $dbCon->prepare("insert into connect_next_kin(keen_first_name,image_path,country_phone_id,connect_phone,sender_id,receiver_id,connect_by,created_on) 
			values(?, ?, ?, ?, ?, ?, ?, now() )");
			
			/* bind parameters for markers */
			$stmt->bind_param("ssssiii",$row_image['first_name'],$img, $cid, $to,$data['user_id'],$row['id'],$st);
			$stmt->execute();
				
			$id=$stmt->insert_id;
				$encd=$this->encrypt_decrypt('encrypt',$id);
				
				
				$stmt = $dbCon->prepare("select email from user_logins where id=?");
				
				// print_r($data); die;
				
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_connect = $result->fetch_assoc();
				
				
				$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name from user_logins where id=?");
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				
				$row = $result->fetch_assoc();
				
				$to            = '+'.trim($row_phone['country_code']).''.trim($_POST[$search_phone]);
				$subject       = "Connect request received!";
				$url="https://www.qloudid.com/user/index.php/ConnectKin/receivedAccount";
				$surl=getShortUrl($url);
				$emailContent =$row['name']." has sent you request to connect.Please connect here: ".$surl;
				$res=sendSms($subject, $to, $emailContent);
				
				$to            = $row_connect['email'];
				$subject       = "Connect request received!";
				
				$emailContent =$row['name']." has sent you request to connect.Please connect <a href='https://www.qloudid.com/user/index.php/ConnectKin/receivedAccount'>here</a>";
				sendEmail($subject, $to, $emailContent);
				
			 
				}
				 
			}
			
			}
		
		 
				$stmt->close();
				$dbCon->close();
				return 1;		
		 
		}
		
		
		
		
		
		function base64_to_jpeg($base64_string, $output_file) {
		$ifp = fopen( $output_file, 'wb' ); 
		$data = explode( ',', $base64_string );
		fwrite( $ifp, base64_decode( $data[1] ) );
		fclose( $ifp ); 
		return $output_file; 
		}	
		function addNOFFRelative($data)
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt("decrypt",$data['id']);
			$stmt= $dbCon->prepare("update connect_next_kin set is_relative=1 where id=? ");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		function allKinsDetail($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select receiver_id as uid,concat_ws(' ', keen_first_name, keen_last_name) as name,concat_ws(' ', first_name, last_name) as uname,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.receiver_id left join user_profiles on connect_next_kin.receiver_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.sender_id=? and is_relative=0
			union
			select sender_id as uid,concat_ws(' ', keen_first_name, keen_last_name) as name,concat_ws(' ', first_name, last_name) as uname,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code  from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.sender_id left join user_profiles on connect_next_kin.sender_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.receiver_id=? and is_relative=0 order by first_name limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['user_id'],$data['user_id']);
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
		
		function allRelativeDetail($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select receiver_id as uid,concat_ws(' ', keen_first_name, keen_last_name) as name,concat_ws(' ', first_name, last_name) as uname,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.receiver_id left join user_profiles on connect_next_kin.receiver_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.sender_id=? and is_relative=1
			union
			select sender_id as uid,concat_ws(' ', keen_first_name, keen_last_name) as name,concat_ws(' ', first_name, last_name) as uname,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code  from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.sender_id left join user_profiles on connect_next_kin.sender_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.receiver_id=? and is_relative=1 order by first_name limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['user_id'],$data['user_id']);
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
		
		
		
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=15");
			
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
			
			
			
			
			$output='<div class="crm-popup profile-popup wi_360p xxx-wi_100 maxwi_90 xxs-maxwi_100 hei_100vh-70p xxs-hei_100vh ovfl_auto dnone pos_fix zi99 top20p xxs-top0 right30 bs_bb bxsh_0220_01 xxs-bxsh_none brdradtl5 xxs-brdrad0 bg_f2 lgn_hight_s14 fsz13 xxs-fsz16 bxsh_0220_0_14_031-2_0_2_0150_0_12  bxsh_0_trans_0_trans_02150_0_3_ph opbxsh_0004_6f_sibc active" style="display: block;">
			
			<div class="popup-content"><div><div class="padb80 xxs-pad0 xxs-padb80" style="background-color:#fdfdfd;">
			<div class="xxs-mar0 xxs-pad0  xxs-bxsh_none yellownew_bg"><div class="dflex xxs-fxdir_col xxs-bxsh_016_577376_035"><div class="hei_125p dnone xxs-dblock padt20 bg_31932c"><div class="minwi_0 dflex alit_fs justc_sb marb20 padrl10 txt_f"><a href="#" class="close_popup_modal wi_70p fxshrink_0 dblock pad5"><img src="images/close-white.svg" width="18" height="18"></a><div class="minwi_0 flex_1 talc"><div class="ovfl_hid ws_now txtovfl_el fsz18">We are looking for a very good web developer to do random tasks</div><div class="fsz16">1 of 8 Best Match</div></div><div class="wi_70p fxshrink_0 dflex justc_fe fsz26"><a href="#" class="fa fa-thumbs-o-up marl10 txt_f"></a><a href="#" class="fa fa-thumbs-o-down marl10 txt_f"></a></div></div><div class="hei_20p diblock pos_rel padl10 bg_14bff5 uppercase lgn_hight_20 fsz15 txt_f"><span class="pos_abs top0 left100 brd brdwi_10 brdclr_14bff5 brdrclr_transi"></span>Best match</div></div><div class="xxs-wi_100 fxshrink_0 pos_rel xxs-mart-50  xxs-pad0 xxs-marb5 brd brdwi_5 brdclr_f"><img src="../../'.$value_a.'" width="333"  class="dblock marrla  dblock marrla " title="Sushil Jain" alt="Sushil Jain"></div>
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
			
			return $output;
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
			
			
			
			
			$output='<div class="crm-popup profile-popup wi_360p xxx-wi_100 maxwi_90 xxs-maxwi_100 hei_100vh-70p xxs-hei_100vh ovfl_auto dnone pos_fix zi99 top20p xxs-top0 right30 bs_bb bxsh_0220_01 xxs-bxsh_none brdradtl5 xxs-brdrad0 bg_f2 lgn_hight_s14 fsz13 xxs-fsz16 bxsh_0220_0_14_031-2_0_2_0150_0_12  bxsh_0_trans_0_trans_02150_0_3_ph opbxsh_0004_6f_sibc active" style="display: block;">
			
			<div class="popup-content"><div><div class="padb80 xxs-pad0 xxs-padb80" style="background-color:#fdfdfd;">
			<div class="xxs-mar0 xxs-pad0  xxs-bxsh_none yellownew_bg"><div class="dflex xxs-fxdir_col xxs-bxsh_016_577376_035"><div class="hei_125p dnone xxs-dblock padt20 bg_31932c"><div class="minwi_0 dflex alit_fs justc_sb marb20 padrl10 txt_f"><a href="#" class="close_popup_modal wi_70p fxshrink_0 dblock pad5"><img src="images/close-white.svg" width="18" height="18"></a><div class="minwi_0 flex_1 talc"><div class="ovfl_hid ws_now txtovfl_el fsz18">We are looking for a very good web developer to do random tasks</div><div class="fsz16">1 of 8 Best Match</div></div><div class="wi_70p fxshrink_0 dflex justc_fe fsz26"><a href="#" class="fa fa-thumbs-o-up marl10 txt_f"></a><a href="#" class="fa fa-thumbs-o-down marl10 txt_f"></a></div></div><div class="hei_20p diblock pos_rel padl10 bg_14bff5 uppercase lgn_hight_20 fsz15 txt_f"><span class="pos_abs top0 left100 brd brdwi_10 brdclr_14bff5 brdrclr_transi"></span>Best match</div></div><div class="xxs-wi_100 fxshrink_0 pos_rel xxs-mart-50  xxs-pad0 xxs-marb5 brd brdwi_5 brdclr_f"><img src="../../'.$value_a.'" width="333"  class="dblock marrla  dblock marrla " title="Sushil Jain" alt="Sushil Jain"></div>
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
			
			
			<div class="base"><div class="toggle_content dnone">undefined</div><a href="#" class="toggle-btn dblock bold blue_txt" data-toggle-id="base"><span class="padt5 dblock dnone_pa">more</span><span class="dnone dblock_pa">less</span></a></div></div></div><div class=" xxs-mart15 xxs-marrl10  bg_f dnone xxs-dblock"><h3 class="martrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10">Skills</h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz14"><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">jQuery</span><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">HTML5</span><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">CSS3</span><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">PHP</span></div></div><div class=" xxs-mart15 xxs-marrl10  bg_f dnone xxs-dblock"><h3 class="martrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10"> </h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz14"></div></div></div><div class="wi_350p xxs-wi_100vw maxwi_90 xxs-maxwi_100vw pos_fix bot50p_new right30 bs_bb pad10 lgtgrey_bg">
			<div class="dflex talc bold"><div class="wi_50 padrl30 lgtgrey_bg"><a href="rejectRequest/'.$_POST['aid'].'" class="wi_100 hei_40p dblock brdrad3 lgn_hight_40 txt_37a000">Reject</a></div>
			<div class="wi_50 padrl30"><a href="approveRequest/'.$_POST['aid'].'" class="wi_100 hei_40p dblock brdrad3 bg_37a000 lgn_hight_40 txt_f">Approve</a></div>
			</div></div></div></div>
			</div>'; 
			
			return $output;
		}
		
		
		function updateEmployeeDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt= $dbCon->prepare("select invited_user_id from invitation where unique_id=? ");//and status=0
			
			$stmt->bind_param("s", $_POST['unique_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_unique = $result->fetch_assoc();
			$request_id= $row_unique['invited_user_id'];
			
			$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code,country_of_residence from user_logins where id=?");
			//echo $query; die;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_id = $result->fetch_assoc();
			//print_r($row_id); die;
			if(!empty($row_unique))
			{
				$request_id= $row_unique['invited_user_id'];
				
				$stmt= $dbCon->prepare("update estore_employee_invite set email=? where id=? ");
				$stmt->bind_param("si", $row_id['email'],$request_id);
				$stmt->execute();
				//echo "jain"; die;
				$stmt= $dbCon->prepare("select invited_emp,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p from estore_employee_invite where id=?");
				//echo $query; die;
				$stmt->bind_param("i", $request_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_emp = $result->fetch_assoc();
				$company=$row_emp['company_id'];
				//print_r($row_emp); die;
				$d=date('Y-m-d');
				
				$stmt= $dbCon->prepare("update invitation set status=1,accepted_date=? where invited_user_id= ?");
				$stmt->bind_param("si", $d,$request_id);
				if($stmt->execute())
				{
					
					$s=0;
					$u=1;
					$stmt= $dbCon->prepare("insert into company_permission (`company_id`,`user_login_id`,`purchase`,`alert`,`supplier`,`customer`,`employee`,`proposal`,`project_proposal`,`create_article`,`import_article`) values (?,?,?,?,?,?,?,?,?,?,?)");
					$stmt->bind_param("iiiiiiiiiii", $company,$row_id['id'],$s,$s,$s,$s,$u,$s,$s,$s,$s);
					//$stmt->execute();
					
					$stmt= $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`) values (?,?,?,?,?,?,?)");
					
					//$company_id."-".$row_id['first_name']."-".$row_id['last_name']."-".$s."-".$row_id['hash_code']."-".$row_id['email']."-".$row_id['id']; die;
					$stmt->bind_param("ississi", $company,$row_id['first_name'],$row_id['last_name'],$s,$row_id['hash_code'],$row_id['email'],$row_id['id']);
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
						$stmt->execute();
						
						
						
						
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
				
				
				$fields=array();
				$fields=$row_id;
				$fields['qloudid']=$request_id;
				$fields['stat']=1;
				//print_r($fields); die;
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
				$url='https://www.qmatchup.com/beta/user/index.php/Invitation/updateQloud';
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
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function searchUserDetailCode($data)
		{
			$dbCon = AppModel::createConnection();
			//print_r($_POST); die;
			$stmt = $dbCon->prepare("select first_name,last_name  from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_user = $result->fetch_assoc();
			
			if(isset($_POST['id']))
			{
				$stmt = $dbCon->prepare("select user_id  from user_passport_logs where id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $_POST['id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				//print_r($row); die;
				if(empty($row))
				{
					return 0;
				}
				else
				{
					$stmt = $dbCon->prepare("select max(id) as v_id from user_passport_logs where user_id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['user_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$row_vid = $result->fetch_assoc();
					//print_r( $row_vid); die;
					if($row_vid['v_id']==$_POST['id'])
					{
						$stmt = $dbCon->prepare("select first_name,last_name,email  from user_logins where id=?");
						
						/* bind parameters for markers */
						$stmt->bind_param("i", $row['user_id']);
						$stmt->execute();
						$result = $stmt->get_result();
						$row_request = $result->fetch_assoc();
						
						$st=3;
						$d=date('Y-m-d h:i:s');
						$stmt = $dbCon->prepare("insert into user_detail_requests(code_type,request_sender,request_receiver,created_on,user_code) values(?,?, ?, ?, ?)");
						
						/* bind parameters for markers */
						//echo $data['user_id']." ".$row['user_id']." ".$d;
						$stmt->bind_param("iiisi", $st,$data['user_id'],$row['user_id'],$d,$_POST['id']);
						$stmt->execute();
						$rsultId=$stmt->insert_id;
						$enc=$this -> encrypt_decrypt('encrypt',$rsultId);
						$to      = $row_request['email'];
						$subject = "Qloudid : Request to access your details";
						
						$emailContent =$row_user['first_name'].' '.$row_user['last_name'].' has requested to access your personal data. Click <a href="https://www.qloudid.com/public/index.php/PublicUserRequest/requestAccount/'.$enc.'">here</a> to take action </br> If above link does not work, please copy the following link in your browser. </br>https://www.qloudid.com/public/index.php/PublicUserRequest/requestAccount/'.$enc.'';
						sendEmail($subject, $to, $emailContent);
						
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
			
			else if(isset($_POST['email_id']))
			{
				$stmt = $dbCon->prepare("select id  from user_logins where email=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("s", $_POST['email_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				//print_r($row); die;
				if(empty($row))
				{
					return 0;
				}
				else
				{
					
					$stmt = $dbCon->prepare("select first_name,last_name,email  from user_logins where id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$row_request = $result->fetch_assoc();
					
					
					$d=date('Y-m-d h:i:s');
					$stmt = $dbCon->prepare("insert into user_detail_requests(code_type,request_sender,request_receiver,created_on,user_email) values(?, ?, ?, ?, ?)");
					$st=2;
					/* bind parameters for markers */
					//echo $data['user_id']." ".$row['user_id']." ".$d;
					$stmt->bind_param("iiiss", $st,$data['user_id'],$row['id'],$d,$_POST['email_id']);
					$stmt->execute();
					$rsultId=$stmt->insert_id;
					//echo $rsultId; die;
					$enc=$this -> encrypt_decrypt('encrypt',$rsultId);
					$to      = $row_request['email'];
					$subject = "Qloudid : Request to access your details";
					
					$emailContent =$row_user['first_name'].' '.$row_user['last_name'].' has requested to access your personal data. Click <a href="https://www.qloudid.com/public/index.php/PublicUserRequest/requestAccount/'.$enc.'">here</a> to take action </br> If above link does not work, please copy the following link in your browser. </br>https://www.qloudid.com/public/index.php/PublicUserRequest/requestAccount/'.$enc.'';
					sendEmail($subject, $to, $emailContent);
					
					$stmt->close();
					$dbCon->close();
					return 1;
					
				}
			}
			
			else if(isset($_POST['phoneno']))
			{
				$stmt = $dbCon->prepare("select user_logins_id  from user_profiles where country_phone=? and phone_number=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("ss", $_POST['countryname'],$_POST['phoneno']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				//print_r($row); die;
				if(empty($row))
				{
					return 0;
				}
				else
				{
					
					$stmt = $dbCon->prepare("select id,first_name,last_name,email  from user_logins where id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['user_logins_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$row_request = $result->fetch_assoc();
					
					
					$d=date('Y-m-d h:i:s');
					$stmt = $dbCon->prepare("insert into user_detail_requests(code_type,request_sender,request_receiver,created_on,country_user,phone_user) values(?, ?, ?, ?, ?,?)");
					$st=1;
					/* bind parameters for markers */
					//echo $data['user_id']." ".$row['user_id']." ".$d;
					$stmt->bind_param("iiisss", $st,$data['user_id'],$row_request['id'],$d,$_POST['countryname'],$_POST['phoneno']);
					$stmt->execute();
					$rsultId=$stmt->insert_id;
					//echo $rsultId; die;
					$enc=$this -> encrypt_decrypt('encrypt',$rsultId);
					$to      = $row_request['email'];
					$subject = "Qloudid : Request to access your details";
					
					$emailContent =$row_user['first_name'].' '.$row_user['last_name'].' has requested to access your personal data. Click <a href="https://www.qloudid.com/public/index.php/PublicUserRequest/requestAccount/'.$enc.'">here</a> to take action </br> If above link does not work, please copy the following link in your browser. </br>https://www.qloudid.com/public/index.php/PublicUserRequest/requestAccount/'.$enc;
					sendEmail($subject, $to, $emailContent);
					
					$stmt = $dbCon->prepare("select country_code,phone_number  from user_profiles left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where user_profiles.user_logins_id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $row_request['id']);
					$stmt->execute();
					$result_phone = $stmt->get_result();
					$row_phone = $result_phone->fetch_assoc();
					
					$phone='+'.trim($row_phone['country_code']).''.trim($row_phone['phone_number']);
					$subject='Informationen om din vän/anhörig';
					$to=$phone;
					$html='Du har blivit ombedd att identifiera dig. Qloud ID https://www.qloudid.com/public/index.php/PublicUserRequest/requestAccount/'.$enc;
					//echo $html.' '.$to;
					$res=sendSms($subject, $to, $html);
					$stmt->close();
					$dbCon->close();
					return 1;
					
				}
			}
			
		}
		
		
		
		
		function searchUserDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,first_name,concat_ws(' ', first_name, last_name) as name,last_name,email from user_logins where email=?");
			
			// print_r($data); die;
			
			$stmt->bind_param("s", $_POST['cemail']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if (empty($row))
			{
				
				$stmt = $dbCon->prepare("select id from connect_next_kin where connect_email=?");
				
				//print_r($row); die;
				
				$stmt->bind_param("s", $_POST['cemail']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_connect = $result->fetch_assoc();	
				
				if(empty($row_connect))
				{
					$st=1;
					//print_r($_POST); die;
					$stmt = $dbCon->prepare("insert into connect_next_kin(connect_message,connect_email,sender_id,receiver_id,connect_by,created_on) 
					values(?,?, ?, 0, ?, now() )");
					
					/* bind parameters for markers */
					$stmt->bind_param("ssii", $_POST['cmsg'], $_POST['cemail'],$data['user_id'],$st);
					
					$stmt->execute();
					$id=$stmt->insert_id;
					$encd=$this->encrypt_decrypt('encrypt',$id);
					$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name from user_logins where id=?");
					
					// print_r($data); die;
					
					$stmt->bind_param("i", $data['user_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					
					$row = $result->fetch_assoc();
					
					$to            = $_POST['cemail'];
					
					$subject       = "Connect request received!";
					
					$emailContent =$row['name']." has sent you request to connect.Please connect <a href='https://www.qloudid.com/public/index.php/ConnectUnregistered/connectAccount/".$encd."'>here</a>";
					sendEmail($subject, $to, $emailContent);
					$org='<div id="search_new">
					<h3 class="pos_rel  pad15  bold fsz20 dark_grey_txt">
					Your request has been sent.
					
					</h3>
					
					
					</div>';
					$stmt->close();
					$dbCon->close();
					return $org;
				}
				else
				{
					$org='<div id="search_new">
					<h3 class="pos_rel  pad15  bold fsz20 dark_grey_txt">
					You already have sent/received request to/from this person
					
					</h3>
					
					
					</div>';
					
					$stmt->close();
					$dbCon->close();
					return $org;
				}
			}
			
			else
			{
				if($data['user_id']==$row['id'])
				
				{
					$org='<div id="search_new">
					<h3 class="pos_rel  pad15  bold fsz20 dark_grey_txt">
					You can not send request to your self
					
					</h3>
					
					
					</div>';
					
					$stmt->close();
					$dbCon->close();
					return $org;
					
				}
				
				
				$stmt = $dbCon->prepare("select id from connect_next_kin where (sender_id=? and receiver_id=?) or (sender_id=? and receiver_id=?)");
				
				//print_r($row); die;
				
				$stmt->bind_param("iiii", $data['user_id'],$row['id'],$row['id'],$data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_connect = $result->fetch_assoc();
				if(empty($row_connect))
				{
					
					
					$org='
					<h2 class="marb10 pad0 bold fsz24 black_txt talc">Personen är en medlem</h2>
					
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
					
					
					
					<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Personen ifråga är en medlem i nätverket. En förfrågan om att du vill ha hen som anhöriga är skickad. Ifall Hen önskar ha dig som närmast anhörig blir du meddelad om detta.</span>
					</div>
					
					
					</div>
					
					
					<div id="search_new " class="lgtgrey2_bg padtrl15">
					
					
					<div class="result-item padtb0 lgtgrey2_bg">
					<div class="dflex alit_c">
					<div class="flex_1">
					
					<div class="fsz16 dgrey_txt bold">
					<span class="marr5 valm">General</span>
					
					</div>
					</div>
					<div class="fxshrink_0 dflex alit_c">
					
					<div class="wi_100p talr">
					<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
					<span>1</span>
					<span class="fa fa-caret-up dnone diblock_pa"></span>
					<span class="fa fa-caret-down dnone_pa"></span>
					</a>
					</div>
					</div>
					</div>
					<div class="sources-content dnone padb20" style="display: none;">
					<ul class="mar0 pad0 padt10 fsz14">
					<li class="dflex mart10  padb5">
					<div class="wi_50 ovfl_hid ws_now txtovfl_el">
					<a href="#">Name</a>
					</div>
					<span class="fxshrink_0 marl100">'.html_entity_decode($row['name']).'</span>
					</li>
					<li class="dflex mart10  padb5">
					<div class="wi_50 ovfl_hid ws_now txtovfl_el">
					<a href="#">Email</a>
					</div>
					<span class="fxshrink_0 marrl50">'.$row['email'].'</span>
					</li>
					<li class="dflex mart10  padb5">
					<div class="wi_50 ovfl_hid ws_now txtovfl_el">
					<a href="#">Message</a>
					</div>
					<span class="fxshrink_0 marrl50">'.$_POST['cmsg'].'</span>
					</li>
					
					</ul>
					</div>
					</div>
					
					<form method="POST" action="sendConnectEmail" id="save_email_connect" name="save_email_connect">
					
					
					<input type="hidden" id="name1" name="name1" value="'.html_entity_decode($row['name']).'"  />
					
					
					
					<input type="hidden" id="eml" name="eml" value="'.$row['email'].'"  />
					
					
					
					<input type="hidden" id="msg" name="msg"  value="'.$_POST['cmsg'].'" />
					
					
					<input type="hidden" name="indexing_save_emailc" id="indexing_save_emailc" value="'.$row['id'].'"/>
					</form>
					
					
					
					
					
					</div>
					
					
					<div class="mart20">
					<input type="button" value="Connect" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="submit_form_email();" />
					
					
					</div>';
				}
				else
				{
					$org='<div id="search_new">
					<h3 class="pos_rel  pad15  bold fsz20 dark_grey_txt">
					You already have sent/received request to/from this person
					
					</h3>
					
					
					</div>';
				}
				
				
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			
			
			
		}
		
		function searchUserDetailPhone($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,first_name,concat_ws(' ', first_name, last_name) as name,last_name,email from user_logins where id=(select user_logins_id from user_profiles where country_phone=? and phone_number=?)");
			
			//print_r($_POST); die;
			
			$stmt->bind_param("si", $_POST['cid'],$_POST['cphone']);
			$stmt->execute();
			
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			echo $stmt->error;
			if (empty($row))
			{
				
				
				$st=2;
				$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("s", $_POST['cid']);
				$stmt->execute();
				$result_phone = $stmt->get_result();
				$row_phone = $result_phone->fetch_assoc();
				
				$cid="+".$row_phone['country_code'];
				$to            = '+'.trim($row_phone['country_code']).' '.trim($_POST['cphone']);
				
				$stmt = $dbCon->prepare("select id from connect_next_kin where connect_phone=?");
				
				//print_r($row); die;
				
				$stmt->bind_param("s", $to);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_connect = $result->fetch_assoc();	
				
				if(empty($row_connect))
				{
					$stmt = $dbCon->prepare("insert into connect_next_kin(keen_first_name,keen_last_name,country_phone_id,connect_message,connect_phone,sender_id,receiver_id,connect_by,created_on) 
					values(?, ?, ?, ?, ?, ?, 0, ?, now() )");
					
					/* bind parameters for markers */
					$stmt->bind_param("sssssii", $_POST['fname'],$_POST['lname'],$cid,$_POST['cmsg'], $to,$data['user_id'],$st);
					
					$stmt->execute();
					$id=$stmt->insert_id;
					$encd=$this->encrypt_decrypt('encrypt',$id);
					
					
					$to            = '+'.trim($row_phone['country_code']).''.trim($_POST['cphone']);
					$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name from user_logins where id=?");
					$stmt->bind_param("i", $data['user_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					
					$row = $result->fetch_assoc();
					
					$subject       = "Connect request received!";
					$url="https://www.qloudid.com/user/index.php/ConnectUnregistered/connectAccount/".$encd;
					$surl=getShortUrl($url);
					$emailContent =$row['name']." has sent you request to connect.Please connect here: ".$surl;
					$res=sendSms($subject, $to, $emailContent);
					//print_r($res); die;
					$stmt->close();
					$dbCon->close();
					$org='<div id="search_new">
					<h3 class="pos_rel  pad15  bold fsz20 dark_grey_txt">
					Your request has been sent.
					
					</h3>
					
					
					</div>';
					
					return $org;
				}
				else
				{
					$org='<div id="search_new">
					<h3 class="pos_rel  pad15  bold fsz20 dark_grey_txt">
					You already have sent/received request to/from this person
					
					</h3>
					
					
					</div>';
					$stmt->close();
					$dbCon->close();
					return $org;
				}
			}
			
			else
			{
				if($data['user_id']==$row['id'])
				
				{
					$org='<div id="search_new">
					<h3 class="pos_rel  pad15  bold fsz20 dark_grey_txt">
					You can not send request to your self
					
					</h3>
					
					
					</div>';
					
					$stmt->close();
					$dbCon->close();
					return $org;
					
				}
				
				$stmt = $dbCon->prepare("select id from connect_next_kin where (sender_id=? and receiver_id=?) or (sender_id=? and receiver_id=?)");
				
				//print_r($row); die;
				
				$stmt->bind_param("iiii", $data['user_id'],$row['id'],$row['id'],$data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_connect = $result->fetch_assoc();
				if(empty($row_connect))
				{
					$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=?");
					
					//print_r($row); die;
					$s="%".$_POST['cid']."%";
					$stmt->bind_param("s", $_POST['cid']);
					$stmt->execute();
					$result = $stmt->get_result();
					$row_code = $result->fetch_assoc();
					
					$ph="+".trim($row_code['country_code'])."".trim($_POST['cphone']);
					//echo $ph; die;
					$org='
					<h2 class="marb10 pad0 bold fsz24 black_txt talc">Personen är en medlem</h2>
					
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
					
					
					
					<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Personen ifråga är en medlem i nätverket. En förfrågan om att du vill ha hen som anhöriga är skickad. Ifall Hen önskar ha dig som närmast anhörig blir du meddelad om detta.</span>
					</div>
					
					
					</div>
					<div id="search_new " class="lgtgrey2_bg padtrl15">
					<div class="result-item padtb0 lgtgrey2_bg">
					<div class="dflex alit_c">
					<div class="flex_1">
					
					<div class="fsz16 dgrey_txt bold">
					<span class="marr5 valm">General</span>
					
					</div>
					</div>
					<div class="fxshrink_0 dflex alit_c">
					
					<div class="wi_100p talr">
					<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
					<span>1</span>
					<span class="fa fa-caret-up dnone diblock_pa"></span>
					<span class="fa fa-caret-down dnone_pa"></span>
					</a>
					</div>
					</div>
					</div>
					<div class="sources-content dnone padb20" style="display: none;">
					<ul class="mar0 pad0 padt10 fsz14">
					<li class="dflex mart10  padb5">
					<div class="wi_50 ovfl_hid ws_now txtovfl_el">
					<a href="#">Name</a>
					</div>
					<span class="fxshrink_0 marl100">'.html_entity_decode($row['name']).'</span>
					</li>
					<li class="dflex mart10  padb5">
					<div class="wi_50 ovfl_hid ws_now txtovfl_el">
					<a href="#">Phone number</a>
					</div>
					<span class="fxshrink_0 marrl50">'.$ph.'</span>
					</li>
					<li class="dflex mart10  padb5">
					<div class="wi_50 ovfl_hid ws_now txtovfl_el">
					<a href="#">Message</a>
					</div>
					<span class="fxshrink_0 marrl50">'.$_POST['cmsg'].'</span>
					</li>
					
					</ul>
					</div>
					</div>
					
					
					
					</div>
					
					
					<form method="POST" action="sendConnectPhone" id="save_email_connect" name="save_email_connect">
					
					
					<input type="hidden" id="name2" name="name2" value="'.$row['name'].'" placeholder="'.html_entity_decode($row['name']).'" readonly>
					
					
					
					<input type="hidden" id="phno" name="phno" value="'.$ph.'"  placeholder="'.$ph.'" readonly>
					
					
					
					<input type="hidden" id="msg1" name="msg1" placeholder="'.$_POST['cmsg'].'" value="'.$_POST['cmsg'].'" readonly />
					
					
					<input type="hidden" name="indexing_save_emailc" id="indexing_save_emailc" value="'.$row['id'].'"/>
					<input type="hidden" name="c_code" id="c_code" value="+'.$row_code['country_code'].'"/>
					</form>
					
					
					
					
					
					
					</div>
					
					<div class="mart20">
					<input type="button" value="Connect" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="submit_form_email();" />
					
					
					</div>';
				}
				else
				{
					$org='<div id="search_new">
					<h3 class="pos_rel  pad15  bold fsz20 dark_grey_txt">
					You already have sent/received request to/from this person
					
					</h3>
					
					
					</div>';
				}
				
				
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			
			
			
		}
		
		function searchUserDetailConnect($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,first_name,concat_ws(' ', first_name, last_name) as name,last_name,email from user_logins where email=?");
			
			$stmt->bind_param("s", $_POST['cemail']);
			$stmt->execute();
			
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if (empty($row))
			{
				$stmt = $dbCon->prepare("select id,first_name,concat_ws(' ', first_name, last_name) as name,last_name,email from user_logins where id=(select user_logins_id from user_profiles where country_phone=? and phone_number=?)");
			
			$stmt->bind_param("si", $_POST['cid'],$_POST['cphone']);
			$stmt->execute();
			
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			echo $stmt->error;
			if (empty($row))
			{
				$st=2;
				$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=(select country_name from country where id=? )");
				
				/* bind parameters for markers */
				$stmt->bind_param("s", $_POST['cid']);
				$stmt->execute();
				$result_phone = $stmt->get_result();
				$row_phone = $result_phone->fetch_assoc();
				
				$cid="+".$row_phone['country_code'];
				$to            = '+'.trim($row_phone['country_code']).''.trim($_POST['cphone']);
				
				$stmt = $dbCon->prepare("select id from connect_next_kin where (connect_phone=? or connect_email=?) and (sender_id=? or receiver_id=?)");
				
				//print_r($row); die;
				
				$stmt->bind_param("ssii", $to,$_POST['cemail'],$data['user_id'],$data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_connect = $result->fetch_assoc();	
				
				
				if(empty($row_connect))
				{
					$us=0;
					$stmt = $dbCon->prepare("insert into connect_next_kin(relation_type,connect_email,keen_first_name,keen_last_name,country_phone_id,connect_message,connect_phone,sender_id,receiver_id,connect_by,created_on) 
					values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now() )");
					
					/* bind parameters for markers */
					$stmt->bind_param("issssssiii", $_POST['relate'],$_POST['cemail'],$_POST['fname'],$_POST['lname'],$cid,$_POST['cmsg'], $to,$data['user_id'],$us,$st);
					
					$stmt->execute();
					$id=$stmt->insert_id;
					$encd=$this->encrypt_decrypt('encrypt',$id);
					
					
					$to            = '+'.trim($row_phone['country_code']).''.trim($_POST['cphone']);
					$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name from user_logins where id=?");
					$stmt->bind_param("i", $data['user_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					
					$row = $result->fetch_assoc();
					
					$subject       = "Connect request received!";
					$url="https://www.qloudid.com/user/index.php/ConnectUnregistered/connectAccount/".$encd;
					$surl=getShortUrl($url);
					$emailContent =$row['name']." has sent you request to connect.Please connect here: ".$surl;
					//$res=sendSms($subject, $to, $emailContent);
					
					$to            = $_POST['cemail'];
					
					$subject       = "Connect request received!";
					
					$emailContent =$row['name']." has sent you request to connect.Please connect <a href='https://www.qloudid.com/user/index.php/ConnectUnregistered/connectAccount/".$encd."'>here</a>";
					//sendEmail($subject, $to, $emailContent);
					
					$stmt->close();
					$dbCon->close();
					
					$resultWeb=array();
					$resultWeb['id']=$encd;
					return $resultWeb;
					}
				else
				{
					$org='<div id="search_new">
					<h3 class="pos_rel  pad15  bold fsz20 dark_grey_txt">
					You already have sent/received request to/from this person
					
					</h3>
					
					
					</div>';
					$stmt->close();
					$dbCon->close();
					return $org;
				}
			}
			else
			{
				if($data['user_id']==$row['id'])
				
				{
					$org='<div id="search_new">
					<h3 class="pos_rel  pad15  bold fsz20 dark_grey_txt">
					You can not send request to your self
					
					</h3>
					
					
					</div>';
					
					$stmt->close();
					$dbCon->close();
					return $org;
					
				}
				$stmt = $dbCon->prepare("select id from connect_next_kin where (sender_id=? and receiver_id=?) or (sender_id=? and receiver_id=?)");
				
				//print_r($row); die;
				
				$stmt->bind_param("iiii", $data['user_id'],$row['id'],$row['id'],$data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_connect = $result->fetch_assoc();
				if(empty($row_connect))
				{
					
					
					$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=(select country_name from country where id=? )");
					
					//print_r($row); die;
					$s=$_POST['cid'];
					$stmt->bind_param("i", $_POST['cid']);
					$stmt->execute();
					$result = $stmt->get_result();
					$row_code = $result->fetch_assoc();
					
					$ph="+".trim($row_code['country_code'])."".trim($_POST['cphone']);
					//echo $ph; die;
					$org='
					<h2 class="marb10 pad0 bold fsz24 black_txt talc">Personen är en medlem</h2>
					
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
					
					
					
					<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Personen ifråga är en medlem i nätverket. En förfrågan om att du vill ha hen som anhöriga är skickad. Ifall Hen önskar ha dig som närmast anhörig blir du meddelad om detta.</span>
					</div>
					
					
					</div>
					<div id="search_new " class="lgtgrey2_bg padtrl15">
					<div class="result-item padtb0 lgtgrey2_bg">
					<div class="dflex alit_c">
					<div class="flex_1">
					
					<div class="fsz16 dgrey_txt bold">
					<span class="marr5 valm">General</span>
					
					</div>
					</div>
					<div class="fxshrink_0 dflex alit_c">
					
					<div class="wi_100p talr">
					<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
					<span>1</span>
					<span class="fa fa-caret-up dnone diblock_pa"></span>
					<span class="fa fa-caret-down dnone_pa"></span>
					</a>
					</div>
					</div>
					</div>
					<div class="sources-content dnone padb20" style="display: block;">
					<ul class="mar0 pad0 padt10 fsz14">
					<li class="dflex mart10  padb5">
					<div class="wi_50 ovfl_hid ws_now txtovfl_el">
					<a href="#">Name</a>
					</div>
					<span class="fxshrink_0 marl100">'.html_entity_decode($row['name']).'</span>
					</li>
					<li class="dflex mart10  padb5">
					<div class="wi_50 ovfl_hid ws_now txtovfl_el">
					<a href="#">Phone number</a>
					</div>
					<span class="fxshrink_0 marrl50">'.$ph.'</span>
					</li>
					<li class="dflex mart10  padb5">
					<div class="wi_50 ovfl_hid ws_now txtovfl_el">
					<a href="#">Email</a>
					</div>
					<span class="fxshrink_0 marrl50">'.$row['email'].'</span>
					</li>
					<li class="dflex mart10  padb5">
					<div class="wi_50 ovfl_hid ws_now txtovfl_el">
					<a href="#">Message</a>
					</div>
					<span class="fxshrink_0 marrl50">'.$_POST['cmsg'].'</span>
					</li>
					
					</ul>
					</div>
					</div>
					
					
					
					</div>
					
					
					<form method="POST" action="sendConnectInformation" id="save_info_connect" name="save_info_connect">
					
					
					<input type="hidden" id="name2" name="name2" value="'.$row['name'].'" placeholder="'.html_entity_decode($row['name']).'" readonly>
					
					
					
					<input type="hidden" id="phno" name="phno" value="'.$ph.'"  placeholder="'.$ph.'" readonly>
					
					<input type="hidden" id="eml" name="eml" value="'.$row['email'].'"  />
					
					<input type="hidden" id="rlt" name="rlt" value="'.$_POST['relate'].'"  />
					
					<input type="hidden" id="msg1" name="msg1" placeholder="'.$_POST['cmsg'].'" value="'.$_POST['cmsg'].'" readonly />
					
					
					<input type="hidden" name="indexing_save_emailc" id="indexing_save_emailc" value="'.$row['id'].'"/>
					<input type="hidden" name="c_code" id="c_code" value="+'.$row_code['country_code'].'"/>
					</form>
					
					
					
					
					
					
					</div>
					
					<div class="mart20">
				<input type="button" value="Connect" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="submit_form_connect();" />
					
					
					</div>';
				}
				else
				{
					$org='<div id="search_new">
					<h3 class="pos_rel  pad15  bold fsz20 dark_grey_txt">
					You already have sent/received request to/from this person
					
					</h3>
					
					
					</div>';
				}
				
				
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			
			}
			else
			{
				if($data['user_id']==$row['id'])
				
				{
					$org='<div id="search_new">
					<h3 class="pos_rel  pad15  bold fsz20 dark_grey_txt">
					You can not send request to your self
					
					</h3>
					
					
					</div>';
					
					$stmt->close();
					$dbCon->close();
					return $org;
					
				}
				
				$stmt = $dbCon->prepare("select id from connect_next_kin where (sender_id=? and receiver_id=?) or (sender_id=? and receiver_id=?)");
				
				//print_r($row); die;
				
				$stmt->bind_param("iiii", $data['user_id'],$row['id'],$row['id'],$data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_connect = $result->fetch_assoc();
				if(empty($row_connect))
				{
					$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=(select country_name from country where id=? )");
					
					
					$stmt->bind_param("i", $_POST['cid']);
					$stmt->execute();
					$result = $stmt->get_result();
					$row_code = $result->fetch_assoc();
					
					$ph="+".trim($row_code['country_code'])."".trim($_POST['cphone']);
					//echo $ph; die;
					$org='
					<h2 class="marb10 pad0 bold fsz24 black_txt talc">Personen är en medlem</h2>
					
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
					
					
					
					<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Personen ifråga är en medlem i nätverket. En förfrågan om att du vill ha hen som anhöriga är skickad. Ifall Hen önskar ha dig som närmast anhörig blir du meddelad om detta.</span>
					</div>
					
					
					</div>
					<div id="search_new " class="lgtgrey2_bg padtrl15">
					<div class="result-item padtb0 lgtgrey2_bg">
					<div class="dflex alit_c">
					<div class="flex_1">
					
					<div class="fsz16 dgrey_txt bold">
					<span class="marr5 valm">General</span>
					
					</div>
					</div>
					<div class="fxshrink_0 dflex alit_c">
					
					<div class="wi_100p talr">
					<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
					<span>1</span>
					<span class="fa fa-caret-up dnone diblock_pa"></span>
					<span class="fa fa-caret-down dnone_pa"></span>
					</a>
					</div>
					</div>
					</div>
					<div class="sources-content dnone padb20" style="display: block;">
					<ul class="mar0 pad0 padt10 fsz14">
					<li class="dflex mart10  padb5">
					<div class="wi_50 ovfl_hid ws_now txtovfl_el">
					<a href="#">Name</a>
					</div>
					<span class="fxshrink_0 marl100">'.html_entity_decode($row['name']).'</span>
					</li>
					<li class="dflex mart10  padb5">
					<div class="wi_50 ovfl_hid ws_now txtovfl_el">
					<a href="#">Phone number</a>
					</div>
					<span class="fxshrink_0 marrl50">'.$ph.'</span>
					</li>
					<li class="dflex mart10  padb5">
					<div class="wi_50 ovfl_hid ws_now txtovfl_el">
					<a href="#">Email</a>
					</div>
					<span class="fxshrink_0 marrl50">'.$row['email'].'</span>
					</li>
					<li class="dflex mart10  padb5">
					<div class="wi_50 ovfl_hid ws_now txtovfl_el">
					<a href="#">Message</a>
					</div>
					<span class="fxshrink_0 marrl50">'.$_POST['cmsg'].'</span>
					</li>
					
					</ul>
					</div>
					</div>
					
					
					
					</div>
					
					
					<form method="POST" action="sendConnectInformation" id="save_info_connect" name="save_info_connect">
					
					
					<input type="hidden" id="name2" name="name2" value="'.$row['name'].'" placeholder="'.html_entity_decode($row['name']).'" readonly>
					
					
					
					<input type="hidden" id="phno" name="phno" value="'.$ph.'"  placeholder="'.$ph.'" readonly>
					
					<input type="hidden" id="eml" name="eml" value="'.$row['email'].'"  />
					<input type="hidden" id="rlt" name="rlt" value="'.$_POST['relate'].'"  />
					<input type="hidden" id="msg1" name="msg1" placeholder="'.$_POST['cmsg'].'" value="'.$_POST['cmsg'].'" readonly />
					
						
					
					<input type="hidden" name="indexing_save_emailc" id="indexing_save_emailc" value="'.$row['id'].'"/>
					<input type="hidden" name="c_code" id="c_code" value="+'.$row_code['country_code'].'"/>
					</form>
					
					
					
					
					
					
					</div>
					
					<div class="mart20">
				<input type="button" value="Connect" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="submit_form_connect();" />
					
					
					</div>';
				}
				else
				{
					$org='<div id="search_new">
					<h3 class="pos_rel  pad15  bold fsz20 dark_grey_txt">
					You already have sent/received request to/from this person
					
					</h3>
					
					
					</div>';
				}
				
				
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			
			
			
		}
		
		
		
		
		function approveRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt("decrypt",$data['id']);
			$stmt= $dbCon->prepare("update connect_next_kin set is_approved=1 where id=? ");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select sender_id,receiver_id from connect_next_kin where id=?");
			
			//print_r($_POST); die;
			
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select email from user_logins where id=?");
			$stmt->bind_param("i", $row['sender_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row_sender = $result1->fetch_assoc();
			
			$stmt = $dbCon->prepare("select email from user_logins where id=?");
			$stmt->bind_param("i", $row['receiver_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row_receiver = $result1->fetch_assoc();
			$fields=array();
			
			$fields['sender']=$row_sender['email'];
			$fields['receiver']=$row_receiver['email'];
			$url='https://www.qmatchup.com/beta/company/index.php/ManageEmployee/updateNextKin';
			$ch = curl_init();
			//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
			//curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_REFERER, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, true);
			curl_setopt($ch, CURLOPT_COOKIEFILE, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
			curl_setopt($ch, CURLOPT_POST, true);
			//var_dump($ch);
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			//get status code
			//echo $status_code; die;
			$result=curl_exec ($ch);
			curl_close ($ch);
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		function updateInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt("decrypt",$data['id']);
			
			
			$stmt= $dbCon->prepare("update user_profiles set ssn=? where user_logins_id=? ");
			$stmt->bind_param("si", $_POST['ssn'],$data['user_id']);
			$stmt->execute();
			
			$stmt= $dbCon->prepare("update connect_next_kin set is_approved=1 where id=? ");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select sender_id,receiver_id from connect_next_kin where id=?");
			
			//print_r($_POST); die;
			
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select email from user_logins where id=?");
			$stmt->bind_param("i", $row['sender_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row_sender = $result1->fetch_assoc();
			
			$stmt = $dbCon->prepare("select email from user_logins where id=?");
			$stmt->bind_param("i", $row['receiver_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row_receiver = $result1->fetch_assoc();
			$fields=array();
			$fields['user_ssn']=$_POST['ssn'];
			$fields['sender']=$row_sender['email'];
			$fields['receiver']=$row_receiver['email'];
			$url='https://www.qmatchup.com/beta/company/index.php/ManageEmployee/updateNextKin';
			$ch = curl_init();
			//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
			//curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_REFERER, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, true);
			curl_setopt($ch, CURLOPT_COOKIEFILE, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
			curl_setopt($ch, CURLOPT_POST, true);
			//var_dump($ch);
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			//get status code
			//echo $status_code; die;
			$result=curl_exec ($ch);
			curl_close ($ch);
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		function rejectRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt("decrypt",$data['id']);
			$stmt= $dbCon->prepare("update connect_next_kin set is_approved=2 where id=? ");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function sendConnectEmail($data)
		{
			$dbCon = AppModel::createConnection();
			$st=1;
			$stmt = $dbCon->prepare("select first_name,last_name,passport_image from user_logins where id=?");
				
			$stmt->bind_param("i", $_POST['indexing_save_emailc']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_image = $result->fetch_assoc();
			if($row_image['passport_image']=="" || $row_image['passport_image']==null)
			{
				$img=$_POST['img_user'];
			}
			else
			{
				$img=$row_image['passport_image'];
			}
			$stmt = $dbCon->prepare("insert into connect_next_kin(keen_first_name,keen_last_name,image_path,connect_message,connect_email,sender_id,receiver_id,connect_by,created_on) 
			values(?, ?,?,?,?, ?, ?, ?, now() )");
			
			/* bind parameters for markers */
			$stmt->bind_param("sssssiii",$row_image['first_name'],$row_image['last_name'], $img,$_POST['msg'], $_POST['eml'],$data['user_id'],$_POST['indexing_save_emailc'],$st);
			
			
			if (!$stmt->execute()) {
				$stmt->close();
				$dbCon->close();
				return 0;
				} else {
				
				$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name from user_logins where id=?");
				
				// print_r($data); die;
				
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				
				$row = $result->fetch_assoc();
				
				$to            = $_POST['eml'];
				
				$subject       = "Connect request received!";
				
				$emailContent =$row['name']." has sent you request to connect.Please connect <a href='https://www.qloudid.com/user/index.php/ConnectKin/connectAccount'>here</a>";
				sendEmail($subject, $to, $emailContent);
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
		}
			function updateKinInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$kin_id= $this -> encrypt_decrypt('decrypt',$data['kin_id']);
			$data1 = strip_tags($_POST['image-data1']);
			if($_POST['image-data1']=="" || $_POST['image-data1']==null || $_POST['image-data1']=='none')
			{
				$img_name1='';
			}
			else
			{
			define('UPLOAD_DIR','../estorecss/'); 
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			}
			
			$stmt = $dbCon->prepare("update connect_next_kin set image_path=? where id=?");
			$stmt->bind_param("si",$img_name1,$kin_id);
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
		
		
		
		function sendConnectInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$st=1;
			$stmt = $dbCon->prepare("select first_name,last_name,passport_image from user_logins where id=?");
				
			$stmt->bind_param("i", $_POST['indexing_save_emailc']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_image = $result->fetch_assoc();
			
			$img=$row_image['passport_image'];	
			
			$stmt = $dbCon->prepare("insert into connect_next_kin(keen_first_name,keen_last_name,image_path,relation_type,country_phone_id,connect_phone,connect_message,connect_email,sender_id,receiver_id,connect_by,created_on) 
			values(?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, now() )");
			
			/* bind parameters for markers */
			$stmt->bind_param("sssissssiii",$row_image['first_name'],$row_image['last_name'],$img,$_POST['rlt'],$_POST['c_code'], $_POST['phno'], $_POST['msg'], $_POST['eml'],$data['user_id'],$_POST['indexing_save_emailc'],$st);
			
			
			if (!$stmt->execute()) {
				$stmt->close();
				$dbCon->close();
				return 0;
				} else {
				$id=$stmt->insert_id;
				$encd=$this->encrypt_decrypt('encrypt',$id);
				$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name from user_logins where id=?");
				
				// print_r($data); die;
				
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				
				$row = $result->fetch_assoc();
				
				$to            = $_POST['eml'];
				
				$subject       = "Connect request received!";
				
				$emailContent =$row['name']." has sent you request to connect.Please connect <a href='https://www.qloudid.com/public/index.php/ConnectKin/connectAccount'>here</a>";
				sendEmail($subject, $to, $emailContent);
				
				$to            = trim($_POST['phno']);
				$subject       = "Connect request received!";
				$url="https://www.qloudid.com/public/index.php/ConnectUnregistered/connectAccount/".$encd;
				$surl=getShortUrl($url);
				$emailContent =$row['name']." has sent you request to connect.Please connect here: ".$surl;
				$res=sendSms($subject, $to, $emailContent);
				$stmt->close();
				$dbCon->close();
				return $encd;
				
			}
			
		}
		
		
		
		function sendConnectPhone($data)
		{
			$dbCon = AppModel::createConnection();
			$st=2;
			$stmt = $dbCon->prepare("select first_name,last_name,passport_image from user_logins where id=?");
				
			$stmt->bind_param("i", $_POST['indexing_save_emailc']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_image = $result->fetch_assoc();
			if($row_image['passport_image']=="" || $row_image['passport_image']==null)
			{
				$img=$_POST['img_user'];
			}
			else
			{
				$img=$row_image['passport_image'];
			}

			$stmt = $dbCon->prepare("insert into connect_next_kin(keen_first_name,keen_last_name,image_path,country_phone_id,connect_message,connect_phone,sender_id,receiver_id,connect_by,created_on) 
			values(?,?,?, ?, ?, ?, ?, ?, ?, now() )");
			
			/* bind parameters for markers */
			$stmt->bind_param("ssssssiii",$row_image['first_name'],$row_image['last_name'],$img, $_POST['c_code'],$_POST['msg1'], $_POST['phno'],$data['user_id'],$_POST['indexing_save_emailc'],$st);
			
			
			if (!$stmt->execute()) {
				$stmt->close();
				$dbCon->close();
				return 0;
				} else {
				
				$id=$stmt->insert_id;
				$encd=$this->encrypt_decrypt('encrypt',$id);
				
				
				$stmt = $dbCon->prepare("select email from user_logins where id=?");
				
				// print_r($data); die;
				
				$stmt->bind_param("i", $_POST['indexing_save_emailc']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_connect = $result->fetch_assoc();
				
				
				$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name from user_logins where id=?");
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				
				$row = $result->fetch_assoc();
				
				$to            = trim($_POST['phno']);
				$subject       = "Connect request received!";
				$url="https://www.qloudid.com/user/index.php/ConnectUnregistered/connectAccount/".$encd;
				$surl=getShortUrl($url);
				$emailContent =$row['name']." has sent you request to connect.Please connect here: ".$surl;
				$res=sendSms($subject, $to, $emailContent);
				
				$to            = $row_connect['email'];
				$subject       = "Connect request received!";
				
				$emailContent =$row['name']." has sent you request to connect.Please connect <a href='https://www.qloudid.com/user/index.php/ConnectKin/connectAccount'>here</a>";
				sendEmail($subject, $to, $emailContent);
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
		}
		
		function selectCountry()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name,country_code from phone_country_code order by country_code");
			
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
		
		function relationDetail()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,relation_name  from relation_type order by relation_name");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			$relation = array();
			while ($row = $result->fetch_assoc()) {
				
				array_push($relation, $row);
			}
			return $relation;
			$stmt->close();
			$dbCon->close();
			
		}
		
		
		function requestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select employee_request_cloud.id,company_name,last_name,first_name,email,employee_request_cloud.created_on from employee_request_cloud left join user_logins on user_logins.id=employee_request_cloud.user_login_id left join companies on companies.id=employee_request_cloud.company_id where employee_request_cloud.user_login_id=? and is_approved=1 limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
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
		
		
		function requestApprovedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select passport_image,sender_id,receiver_id,receiver_id as uid,concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.receiver_id left join user_profiles on connect_next_kin.receiver_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.sender_id=? and is_approved=1 
			union
			select passport_image,sender_id,receiver_id,sender_id as uid,concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code  from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.sender_id left join user_profiles on connect_next_kin.sender_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.receiver_id=? and is_approved=1 order by first_name limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['user_id'],$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; } 
				$org[$j]['image']=$imgs;
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function requestedContactDetail($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select is_approved,passport_image,connect_email,receiver_id,concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.receiver_id left join user_profiles on connect_next_kin.receiver_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.sender_id=? and is_approved!=2 order by connect_next_kin.created_on desc");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; } 
				$org[$j]['image']=$imgs;
				if($row['receiver_id']==0)
				{
					$org[$j]['name']="Unregistered User";
					$org[$j]['first_name']="Unregistered";
					$org[$j]['last_name']="User";
					$org[$j]['email']=$row['connect_email'];
				}
				$j++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function requestSentDetail($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select passport_image,connect_email,receiver_id,concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.receiver_id left join user_profiles on connect_next_kin.receiver_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.sender_id=? and is_approved=0 order by connect_next_kin.created_on desc limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; } 
				$org[$j]['image']=$imgs;
				if($row['receiver_id']==0)
				{
					$org[$j]['name']="Unregistered User";
					$org[$j]['first_name']="Unregistered";
					$org[$j]['last_name']="User";
					$org[$j]['email']=$row['connect_email'];
				}
				$j++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function requestReceivedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select passport_image,sender_id as uid, concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code  from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.sender_id left join user_profiles on connect_next_kin.sender_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.receiver_id=? and is_approved=0 order by first_name limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; } 
				$org[$j]['image']=$imgs;
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function requestRejectedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select passport_image,receiver_id,sender_id,concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code  from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.sender_id left join user_profiles on connect_next_kin.sender_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone  where connect_next_kin.receiver_id=? and is_approved=2
			union
			select passport_image,receiver_id,sender_id,concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.receiver_id left join user_profiles on connect_next_kin.receiver_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.sender_id=? and is_approved=2
			order by first_name limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['user_id'],$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; } 
				$org[$j]['image']=$imgs;
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreApprovedRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select passport_image,sender_id,receiver_id,receiver_id as uid,concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.receiver_id left join user_profiles on connect_next_kin.receiver_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.sender_id=? and is_approved=1 
			union
			select passport_image,sender_id,receiver_id,sender_id as uid,concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code  from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.sender_id left join user_profiles on connect_next_kin.sender_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.receiver_id=? and is_approved=1 order by first_name limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiii", $data['user_id'],$data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				if($row['receiver_id']==$data['user_id'])
				{
					$request="Received request";
				}
				else
				{
					$request="Sent request";
				}
				$filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; } 
				 
				$org=$org.'<div class=" white_bg   brdb" style="">
										<div class="container  padb20 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10"> 
																	
																	<div class="wi_20p   hei_50p xs-hei_45p "><img src="../../'.$imgs.'" width="45px;" height="45px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></div>
													
											<div class="fleft wi_50     "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir">'.$request.'</span>
											<a href="#" class="show_popup_modal black_txt"  onclick="showUserDetail('.$row['uid'].',this);"><span class="trn fsz18  black_txt ffamily_avenir  ">'.$row['name'].'</span></a>  </div>
													
													 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div> 
												 ';
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreRejectedRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*20;
			$b=$a+20;
			
			$stmt = $dbCon->prepare("select passport_image,receiver_id,sender_id,concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code  from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.sender_id left join user_profiles on connect_next_kin.sender_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone  where connect_next_kin.receiver_id=? and is_approved=2 
			union
			select passport_image,receiver_id,sender_id,concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.receiver_id left join user_profiles on connect_next_kin.receiver_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.sender_id=? and is_approved=2
			order by first_name limit ?,?");
			$stmt->bind_param("iiii", $data['user_id'],$data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
				
				if($row['connect_by']==1)
				{
					$req=$row['email'];
				}
				else
				{
					$req="+".$row['country_code']." ".$row['phone_number'];
				} 
				if($row['receiver_id']==$data['user_id'])
				{
					$request="Received request";
				}
				else
				{
					$request="Sent request";
				}
				$filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; } 
				 
				$org=$org.'<div class=" white_bg   brdb" style="">
										<div class="container  padb20 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10"> 
																	
																	<div class="wi_20p   hei_50p xs-hei_45p "><img src="../../'.$imgs.'" width="45px;" height="45px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></div>
													
											<div class="fleft wi_50     "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir">'.$request.'</span>
											<span class="trn fsz18  black_txt ffamily_avenir  ">'.$row['name'].'</span>  </div>
													
													 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div> ';
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function moreSentRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select passport_image,connect_email,receiver_id,concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.receiver_id left join user_profiles on connect_next_kin.receiver_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.sender_id=? and is_approved=0 order by connect_next_kin.created_on desc  limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				if($row['receiver_id']==0)
				{
					$row['name']="Unregistered User";
					$row['first_name']="Unregistered";
					$row['last_name']="User";
					$row['email']=$row['connect_email'];
				}
				
				
				if($row['connect_by']==1)
				{
					$req=$row['email'];
				}
				else
				{
					$req=$row['connect_phone'];
				}
				$filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; } 
				 
				$org=$org.'<div class=" white_bg   brdb" style="">
										<div class="container  padb20 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10"> 
																	
																	<div class="wi_20p   hei_50p xs-hei_45p "><img src="../../'.$imgs.'" width="45px;" height="45px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></div>
													
											<div class="fleft wi_50     "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir">'.date('Y-m-d',strtotime($row['created_on'])).'</span>
											<span class="trn fsz18  black_txt ffamily_avenir  ">'.$row['name'].'</span>  </div>
													
													 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div> 
												 ';
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		function moreReceivedRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select ssn from user_profiles where user_logins_id=>");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_ssn = $result->fetch_assoc();
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select passport_image,sender_id as uid,concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code  from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.sender_id left join user_profiles on connect_next_kin.sender_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone  where connect_next_kin.receiver_id=? and is_approved=0 order by first_name  limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				if($row['connect_by']==1)
				{
					$req=$row['email'];
				}
				else
				{
					$req="+".$row['country_code']." ".$row['phone_number'];
				}
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				$enc1="'".$enc."'";
				
				if($row_ssn['ssn']=="" || $row_ssn['ssn']==null || $row_ssn['ssn']==0)
				{
					$td='<a href="updateSSN/'.$enc.'"><div class="fright wi_10 padl0  marl15 fsz40    xs-marl0 xxs-marr20 padb0  ">
														<span class="fas fa-check-circle green_txt"></span> 
													</div>	</a> ';
				}
				else
				{
					$td='<a href="approveRequest/'.$enc.'"><div class="fright wi_10 padl0  marl15 fsz40    xs-marl0 xxs-marr20 padb0  ">
														<span class="fas fa-check-circle green_txt"></span> 
													</div>	</a> ';
				}
				$filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; } 
				 
				$org=$org.'<div class=" white_bg   brdb" style="">
										<div class="container  padb20 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
													 
													
											<a href="#" class="show_popup_modal black_txt"  onclick="showUserDetailReceived('.$row['uid'].',this,'.$enc1.');"><div class="fleft wi_50     "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir">Received request</span>
											<span class="trn fsz18  black_txt ffamily_avenir  ">'.$row['name'].'</span>  </div></a>
													
												
													
													<a href="rejectRequest/'.$enc.'"><div class="fright wi_10 padl0  marl15 fsz40  xs-marl0 xxs-marr20 padb0  ">
														<span class="far fa-times-circle  red_txt"></span>
													</div></a>
													
													'.$td.'
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div> 
												
												 
												 
												 ';
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		function requestReceivedCount($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from connect_next_kin where receiver_id=? and is_approved=0 limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $row;
			
			
		}
		
		function requestSentCount($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from connect_next_kin where sender_id=? and is_approved=0 limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $row;
			
			
		}
		
		function requestRejectedCount($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from connect_next_kin where (receiver_id=? or sender_id=?) and is_approved=2 limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['user_id'],$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $row;
			
			
		}
		
		function requestApprovedCount($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from connect_next_kin where (receiver_id=? or sender_id=?) and is_approved=1 limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['user_id'],$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $row;
			
			
		}
		
		
		
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select ssn,first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image,get_started_wizard_status,country_of_residence from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id = ?");
			
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
