<?php
	require_once('../AppModel.php');
	class ParentInfoModel extends AppModel
	{
		
		function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		 
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=33");
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
			
			return $this -> encrypt_decrypt('encrypt',33);
		}
		function countryCodeList()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_code,country_name from country where id>0 and id<240  order by country_name");
			
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
			function postChildNews($data)
		{
			if($_POST['post_title']=="" || $_POST['post_title']==null)
			{
			$_POST['post_title']=$_POST['post_titlem'];	
			}
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			
			$stmt = $dbCon->prepare("select id  from employees where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$user_type="E";
			$stmt = $dbCon->prepare("insert into child_news_information(company_id,user_id,employee_id,information_added,created_on,modified_on,user_type,child_id)
			values(?,?,?,?,now(),now(),?,?)");
			$stmt->bind_param("iiissi",$company_id,$data['user_id'],$row['id'],htmlentities($_POST['post_title'],ENT_NOQUOTES, 'ISO-8859-1'),$user_type,$child_id);
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
		
		function postReply($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id  from employees where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$p_type="E_".$row['id'];
			$comment_id='user_comment'.$_POST['reply_id'];
			//echo $_POST[$comment_id];
			//print_r($_POST); die;
			$stmt = $dbCon->prepare("insert into child_news_comments(user_id,child_news_id,comment_detail,created_on,person_type)
			values(?,?,?,now(), ?)");
			$stmt->bind_param("iiss",$data['user_id'],$_POST['reply_id'],htmlentities($_POST[$comment_id],ENT_NOQUOTES, 'ISO-8859-1'),$p_type);
			if($stmt->execute())
			{
				$stmt = $dbCon->prepare("update child_news_information set modified_on=now() where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $_POST['reply_id']);
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
		
		
		
		
		function childrenNewsInformationDetail($data)
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
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
				
			$stmt = $dbCon->prepare("select user_type,information_added,child_news_information.user_id,company_name,child_news_information.id,concat_ws(' ',first_name,last_name) as name,child_news_information.created_on,passport_image from child_news_information left join companies on companies.id=child_news_information.company_id left join user_logins on user_logins.id=child_news_information.user_id where child_id=? order by child_news_information.modified_on desc limit 0,10");
			/* bind parameters for markers */
			$stmt->bind_param("i", $child_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				
				
				if($row['user_type']=='E')
				{
			$stmt = $dbCon->prepare("select title  from user_company_profile where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$row['user_id']);	
			$stmt->execute();
			$result_title = $stmt->get_result();
				
			$row_title = $result_title->fetch_assoc();
			$org[$j]['title']=$row_title['title'];
				}
				else
				{
				$org[$j]['title']='Förälder';	
				}
				date_default_timezone_set("Europe/Stockholm"); 
				$to_time1 = strtotime($row['created_on']);
				$from_time1 = strtotime(date('Y-m-d H:i:s'));
				
				//echo date('Y-m-d H:i:s'); die;
				$org[$j]['time_diff']= round(abs($from_time1 - $to_time1) / 60);
				if($row ['passport_image']!=null) { $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $org[$j]['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $org[$j]['image_path']="../html/usercontent/images/person-male.png"; } }  else $org[$j]['image_path']="../html/usercontent/images/person-male.png";
				
				$stmt = $dbCon->prepare("select count(id) as num  from child_news_comments  where child_news_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);	
				$stmt->execute();
				$result_comment_count = $stmt->get_result();
				$row_comment_count = $result_comment_count->fetch_assoc();
				$org[$j]['comments_count']=$row_comment_count['num'];
				$org[$j]['comments']=array();
				$stmt = $dbCon->prepare("select concat_ws(' ',first_name,last_name) as name,comment_detail,passport_image,child_news_comments.created_on  from child_news_comments left join user_logins on user_logins.id=child_news_comments.user_id where child_news_id=? order by child_news_comments.created_on desc limit 0,5");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);	
				$stmt->execute();
				$result_comment = $stmt->get_result();
				$c=0;	
				while($row_comment = $result_comment->fetch_assoc())
				{
					array_push($org[$j]['comments'],$row_comment);
					date_default_timezone_set("Europe/Stockholm"); 
					$to_time = strtotime($row_comment['created_on']);
					$from_time = strtotime(date('Y-m-d H:i:s'));
					
					//echo date('Y-m-d H:i:s'); die;
					$org[$j]['comments'][$c]['time_diff']= round(abs($from_time - $to_time) / 60);
					if($row_comment ['passport_image']!=null) { $filename="../estorecss/".$row_comment ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row_comment ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $org[$j]['comments'][$c]['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row_comment['passport_image'].'.jpg' ); } else { $org[$j]['comments'][$c]['image_path']="../html/usercontent/images/person-male.png"; } }  else $org[$j]['comments'][$c]['image_path']="../html/usercontent/images/person-male.png";
					$c++;
				}
				
				$j++;
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			}
		
		
		function moreComments($data)
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
			$a=0;//$_POST['id']*5+1;
			$stmt = $dbCon->prepare("select concat_ws(' ',first_name,last_name) as name,comment_detail,passport_image,child_news_comments.created_on  from child_news_comments left join user_logins on user_logins.id=child_news_comments.user_id where child_news_id=? order by child_news_comments.created_on desc limit ?,5");
			
				/* bind parameters for markers */
				$stmt->bind_param("ii", $_POST['status_id'],$a);	
				$stmt->execute();
				$result_comment = $stmt->get_result();
				$org='';	
				while($row_comment = $result_comment->fetch_assoc())
				{
					
					date_default_timezone_set("Europe/Stockholm"); 
					$to_time = strtotime($row_comment['created_on']);
					$from_time = strtotime(date('Y-m-d H:i:s'));
					
					//echo date('Y-m-d H:i:s'); die;
					$timed= round(abs($from_time - $to_time) / 60);
					if($row_comment ['passport_image']!=null) { $filename="../estorecss/".$row_comment ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row_comment ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $row_comment['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row_comment['passport_image'].'.jpg' ); } else { $row_comment['image_path'] ="../html/usercontent/images/person-male.png"; } }  else $row_comment['image_path'] ="../html/usercontent/images/person-male.png";
					
					if($timed<=1) $timel= 'Just now'; else if($timed<=60 && $timed>1) $timel= $timed." m"; else if($timed>60 && $timed<1440) $timel=  round($timed/60,0)." hr"; else if($timed>1440 && $timed<43200) $timel=  round($timed/1440,0)." days"; else if($timed>43200 && $timed<525600) $timel=  round($timed/43200,0)." months"; else  $timel= round($timed/525600,0)." yr"; 
					
					$org=$org.'<div class="comment_row wi_100 dflex alit_fs bs_bb padt15 padrl20">
														<a href="#" class="flex_0 padt5">
															<img src="../../../'.$row_comment['image_path'].'" class="marr10 comment_images xxs-comment_images brdrad25" alt="Jonna Kjellstrand">
														</a>
														<div class="flex_1 bg_ddf6ff pad5 brdrad20">
															<p class="padb0 padl10">
																<a href="#" class="bold xxs-fsz12 fsz14 black_txt">'.$row_comment['name'].'</a>
																<span class="fright xxs-fsz12 fsz14 opa55  padr10 ">'.$timel.'</span>
															</p>
															<div>
																
																<div class="fleft  fsz14 padl10 black_txt">
																	
																	<span class="black_txt">'.$row_comment['comment_detail'].'</span>
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
		
		
		
		
			function moreInformation($data)
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
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			if($_POST['id']==0)
			{
			$a=0;	
			$b=10;
			}
			else
			{
			$a=$_POST['id']*10;
			$b=10;
			}	
			$stmt = $dbCon->prepare("select user_type,information_added,child_news_information.user_id,company_name,child_news_information.id,concat_ws(' ',first_name,last_name) as name,child_news_information.created_on,passport_image from child_news_information left join companies on companies.id=child_news_information.company_id left join user_logins on user_logins.id=child_news_information.user_id where child_id=? order by child_news_information.modified_on desc limit ?,?");
			/* bind parameters for markers */
			$stmt->bind_param("iii", $child_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			
			while($row = $result->fetch_assoc())
			{
			if($row['user_type']=='E')
				{	
			$stmt = $dbCon->prepare("select title  from user_company_profile where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$row['user_id']);	
			$stmt->execute();
			$result_title = $stmt->get_result();
				
			$row_title = $result_title->fetch_assoc();
			if($row_title['title']=="" || $row_title['title']==null) { $title= substr('Employee at '.$row['company_name'],0,41); } else { $title= substr( $row_title['title'].' at '.$row['company_name'],0,41);  }
				}
				else
				{
					$title="Förälder";
				}
				 
				$form_comment='';
			
			$stmt = $dbCon->prepare("select count(id) as num from child_care_news_comments  where child_news_id=?");
			
				/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);	
			$stmt->execute();
			$result_comment = $stmt->get_result();
			$row_comment_count = $result_comment->fetch_assoc();
			if($row_comment_count['num']>5)
			{
				$cc='';
			}
			else
			{
				$cc='hidden';
			}
			$stmt = $dbCon->prepare("select concat_ws(' ',first_name,last_name) as name,comment_detail,passport_image,child_news_comments.created_on  from child_news_comments left join user_logins on user_logins.id=child_news_comments.user_id where child_news_id=? order by child_news_comments.created_on desc limit 0,5");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);	
				$stmt->execute();
				$result_comment = $stmt->get_result();
				$c=0;	
				while($row_comment = $result_comment->fetch_assoc())
				{
					
					date_default_timezone_set("Europe/Stockholm"); 
					$to_time = strtotime($row_comment['created_on']);
					$from_time = strtotime(date('Y-m-d H:i:s'));
					
					//echo date('Y-m-d H:i:s'); die;
					$timed= round(abs($from_time - $to_time) / 60);
					if($row_comment ['passport_image']!=null) { $filename="../estorecss/".$row_comment ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row_comment ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $row_comment['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row_comment['passport_image'].'.jpg' ); } else { $row_comment['image_path'] ="../html/usercontent/images/person-male.png"; } }  else $row_comment['image_path'] ="../html/usercontent/images/person-male.png";
					
					if($timed<=1) $timel= 'Just now'; else if($timed<=60 && $timed>1) $timel= $timed." m"; else if($timed>60 && $timed<1440) $timel=  round($timed/60,0)." hr"; else if($timed>1440 && $timed<43200) $timel=  round($timed/1440,0)."days"; else if($timed>43200 && $timed<525600) $timel=  round($timed/43200,0)." months"; else  $timel= round($timed/525600,0)." yr"; 
					
					$form_comment=$form_comment.'<div class="comment_row wi_100 dflex alit_fs bs_bb padt15 padrl20">
														<a href="#" class="flex_0 padt5">
															<img src="../../../'.$row_comment['image_path'].'" class="marr10 comment_images xxs-comment_images brdrad25" alt="Jonna Kjellstrand">
														</a>
														<div class="flex_1 bg_ddf6ff pad5 brdrad20">
															<p class="padb0 padl10">
																<a href="#" class="bold xxs-fsz12 fsz14 black_txt">'.$row_comment['name'].'</a>
																<span class="fright xxs-fsz12 fsz14 opa55  padr10 ">'.$timel.'</span>
															</p>
															<div>
																
																<div class="fleft  fsz14 padl10 black_txt">
																	
																	<span class="black_txt">'.$row_comment['comment_detail'].'</span>
																</div>
																<div class="clear"></div>
															</div>
														</div>
													</div>
													
													';
												
				}
			
				
				
				
				
				
				$enc= $this -> encrypt_decrypt('encrypt',$row['id']);
				date_default_timezone_set("Europe/Stockholm"); 
				$to_time = strtotime($row['created_on']);
				$from_time = strtotime(date('Y-m-d H:i:s'));
				
				$time_diff= round(abs($from_time - $to_time) / 60);
				if($row ['passport_image']!=null) { $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $row['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $row['image_path']="../html/usercontent/images/person-male.png"; } }  else $row['image_path']="../html/usercontent/images/person-male.png";
				
				
				
				if($time_diff<=1) $time= 'Just now'; else if($time_diff<=60 && $time_diff>1) $time= $time_diff." m"; else if($time_diff>60 && $time_diff<1440) $time=  round($time_diff/60,0)." hr"; else if($time_diff>1440 && $time_diff<43200) $time=  round($time_diff/1440,0)." days"; else if($time_diff>43200 && $time_diff<525600) $time=  round($time_diff/43200,0)." months"; else  $time= round($time_diff/525600,0)." yr"; 
				
				$org=$org.'<div class="discussion mart25 brdrad5  xxs-brdrad0 xxs-nobrdrl white_bg fsz14 dark_grey_txt brd_e3e2e2  nobrdt nobrdb xs-nobrd">
										
									<div class="brd_width_2 padt15 blue_67cff7_brd nobrdb nobrdl nobrdr ">
										<div class="padrl20">
											<div class="fleft">
												<a href="#" class="dark_grey_txt">
													<div class="fleft">
														<img src="../../../'.$row['image_path'].'" width="48" class="marr10 brdrad25" alt="Jonna Kjellstrand">
													</div>
													<div class="fleft padt5">
														<h2 class="poster_name padb0 bold fsz16 black_txt ">'.$row['name'].'</h2>
														<h3 class="poster_position opa55 pad0 fsz14">'.$title.'</h3>
													</div>
												</a>
											</div>
											 
											<div class="fright padt5">
												
												<span class="opa55  padr10 ">'.$time.'</span>
											</div>
											
											<div class="clear"></div>
										</div>
									</div>
									
									<div class="marrl20 padt30 padb10 brdb">
										<div class="lgn_hight_20 ">
											<h4 class="fsz16 padb10"><a href="#" class="post_title black_txt lnkdblue_txt_h">'.$row['information_added'].'</a></h4>
											</div>
									</div>
									
									
									
									<div class="  ">
										<div class="padrl0">
										<form action="../postReply/'.$data['child_id'].'" method="POST" id="reply_comment'.$row['id'].'" name="reply_comment'.$row['id'].'" accept-charset="ISO-8859-1">
												
												<div class="comments_list">
											'.$form_comment.'
											<div id="more_reply'.$row['id'].'">
													</div>
													<div class="padtb20 talc  '.$cc.'">
																<a href="javascript:void(0);" class="load_more_results  marrl5 " onclick="add_more_comments(this,'.$row['id'].');" value="1" >view previous comments</a>
																
															</div>
												</div>
												
												<div class="padtb10  padrl20 mart15 lgtgrey_bg">
													<table class="wi_100" cellpadding="0" cellspacing="0">
														<tbody><tr>
															<td class="hidden">
																<div class="reply_img opa55 opa1_a fleft">
																	<img src="../../../'.$_POST['img_path'].'"   class="marr10 comment_images xxs-comment_images brdrad25" alt="'.$row['name'].'">
																</div>
															</td>
															<td class="wi_100 valm">
																<textarea name="user_comment'.$row['id'].'" id="user_comment'.$row['id'].'" rows="1" class="wi_100 dblock bs_bb padrl10 padtb9 brd brdclr_lnkdblue_f brdrad2 lgn_hight_20 fsz14 " placeholder="Kommentera här..." required="required"></textarea>
															</td>
															<td class="reply_btn padl15 valm">
																<input type="hidden" name="reply_id" value="'.$row['id'].'">
																
																<button type="button" class="hei_40p padrl15 nobrd brdrad2 t_fcaf17_bg white_txt curp" onclick="updateComment('.$row['id'].')"><i class="fas fa-paper-plane"></i></button>
															</td>
														</tr>
													</tbody></table>
												</div>
											
											</form>
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
		
		function parentPassportDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$parent_id= $this -> encrypt_decrypt('decrypt',$data['parent_user_id']);
			$stmt = $dbCon->prepare("select user_logins.created_on,passport_image,grading_status,first_name,last_name,sex,dob_day,dob_month,dob_year,email,country_code,ssn,address,user_profiles.country,user_profiles.city,zipcode,phone_number,clearing_number,bank_account_number,language,country_phone from user_profiles left join user_logins on user_logins.id=user_profiles.user_logins_id left join phone_country_code on user_profiles.country_phone=phone_country_code.country_name  where user_logins_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $parent_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function parentsDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			$stmt = $dbCon->prepare("select distinct parent_ssn,user_logins.id,concat_ws(' ', user_logins.first_name, user_logins.last_name) as name,user_logins.first_name,user_logins.last_name,company_name,parent_email,parent_phone from parent_info left join child_care_info on child_care_info.id=parent_info.child_id left join user_logins on user_logins.id=parent_info.parent_user_id left join companies on companies.id=child_care_info.company_id  where child_id=?  and is_approved=1 order by parent_info.created_on limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $child_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$org[$j]['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function attendenceDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			$stmt = $dbCon->prepare("select dropped_off_children.created_on drop_date,child_pickup_info.created_on pickup_date from dropped_off_children left join child_pickup_info on child_pickup_info.dropped_off_id=dropped_off_children.id where dropped_off_children.child_id=?  order by dropped_off_children.created_on desc limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $child_id);
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
		
		
		function moreAttendenceInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select dropped_off_children.created_on drop_date,child_pickup_info.created_on pickup_date from dropped_off_children left join child_pickup_info on child_pickup_info.dropped_off_id=dropped_off_children.id where dropped_off_children.child_id=?  order by dropped_off_children.created_on desc limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $child_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
				
			 if($row['pickup_date']==null) $date='-'; else $date= date('h:i',strtotime($row['pickup_date']));
				
				$org=$org.'<div class="column_m container  marb0   fsz14 dark_grey_txt">
				
				<div class="white_bg marb5  brdrad3 box_shadow bg_fffbcc_a" style="">
																<div class="container padrl10 padtb10 brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
																		<div class="fleft wi_50 marl0 xs-marr0">
                                                                       <div class="tdcalender" style="width:60px; height:60px;">
																		<div class="tdmonth">'.date('M',strtotime($row['drop_date'])).'</div>
																		
																		<div class="padtb2 fsz25">'.date('d',strtotime($row['drop_date'])).'</div>
																		<div class="fsz10 hidden">'.date('Y',strtotime($row['drop_date'])).'</div>
																	</div>
                                                                    </div>
																			<div class="fleft xs-talc wi_20  sm-wi_100 marl15 xs-mar0  xs-padb0"> <span class="trn ffamily_avenir fsz14" data-trn-key="Drop off time">Drop off</span> <span class=" edit-text jain1 dblock  brdclr_lgtgrey2 fsz18 ffamily_avenir">'.date('h:i',strtotime($row['drop_date'])).'</span> </div>
																			<div class="fleft   wi_20  marl15    xs-padb0 fsz14"> <span class="trn ffamily_avenir" data-trn-key="Pick up">Pick up time</span> <span class=" edit-text jain2 dblock  brdclr_lgtgrey2 fsz18 ffamily_avenir">'.$date.'</span> </div>
																			

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
		
		function parentsRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			$stmt = $dbCon->prepare("select distinct parent_ssn,concat_ws(' ', user_logins.first_name, user_logins.last_name) as name,user_logins.first_name,user_logins.last_name,company_name,parent_email,parent_phone from parent_info left join child_care_info on child_care_info.id=parent_info.child_id left join user_logins on user_logins.id=parent_info.parent_user_id left join companies on companies.id=child_care_info.company_id  where child_id=?  and is_approved=0 order by parent_info.created_on limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $child_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function parentsRejectDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			$stmt = $dbCon->prepare("select distinct parent_ssn,concat_ws(' ', user_logins.first_name, user_logins.last_name) as name,user_logins.first_name,user_logins.last_name,company_name,parent_email,parent_phone from parent_info left join child_care_info on child_care_info.id=parent_info.child_id left join user_logins on user_logins.id=parent_info.parent_user_id left join companies on companies.id=child_care_info.company_id  where child_id=?  and is_approved=2 order by parent_info.created_on limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $child_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function parentsRejectCount($data)
		{
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			$stmt = $dbCon->prepare("select count(id) as num from parent_info where child_id in (select child_id from parent_info where parent_ssn in (select parent_ssn from parent_info where child_id=?))  and is_approved=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $child_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function parentsApproveCount($data)
		{
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(parent_info.id) as num from parent_info left join child_care_info on child_care_info.id=parent_info.child_id where child_id in (select child_id from parent_info where parent_ssn in (select parent_ssn from parent_info where child_id=?))  and is_approved=1 and company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $child_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function parentsRequestCount($data)
		{
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			$stmt = $dbCon->prepare("select count(id) as num from parent_info where child_id in (select child_id from parent_info where parent_ssn in (select parent_ssn from parent_info where child_id=?))  and is_approved=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $child_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function relativesDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select parent_relatives_information.id,concat_ws(' ', relative_first_name, relative_last_name) as name,relative_first_name,relative_last_name,relative_phone,permission_type from parent_relatives_information where parent_id in (select parent_info.id from parent_info where child_id in (select child_id from parent_info where parent_ssn in (select parent_ssn from parent_info where child_id=?) and child_id in (select id from child_care_info where company_id=?)) and is_approved=1)");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $child_id,$company_id);
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
		function addParentEmailInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			$_POST['invitation_type']=2;
			$stmt = $dbCon->prepare("select country_phone,phone_number,email,user_logins_id,ssn from user_profiles left join user_logins on user_logins.id=user_profiles.user_logins_id where user_logins_id=(select id from user_logins where email=?)");
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
			$_POST['search_phone']=$row['phone_number'];
			$_POST['cntry']=$row['country_phone'];
			$_POST['email']=$row['email'];
			$_POST['social_number']=$row['ssn'];
			$user_id=$row['user_logins_id'];
			
			}
			else
			{
				$_POST['social_number']='';
				$user_id="";
			}
			$stmt = $dbCon->prepare("select company_name from companies where id=(select company_id from child_care_info where id=?)");
			/* bind parameters for markers */
			$stmt->bind_param("i", $child_id);
			$stmt->execute();
			$resultC = $stmt->get_result();
			$rowC = $resultC->fetch_assoc();
			
			$stmt = $dbCon->prepare("insert into parent_info(invitation_type,parent_ssn,parent_phone,parent_country,parent_email,created_on,child_id,parent_user_id)
			values(?,?,?,?,?,now(),?,?)");
			$stmt->bind_param("issssii",$_POST['invitation_type'],$_POST['social_number'],$_POST['search_phone'],$_POST['cntry'],$_POST['email'],$child_id,$user_id);
			if($stmt->execute())
			{
				$id=$stmt->insert_id;
				$id= $this -> encrypt_decrypt('encrypt',$id);
				$url="https://www.safeqloud.com/public/index.php/PublicChildCareRequest/parentAccount/".$id;
				$surl=getShortUrl($url);
				$url1="https://www.safeqloud.com/user/index.php/DaycareRequest/updateParentRequest";
				$surl1=getShortUrl($url1);
				if($_POST['search_phone']!="" || $_POST['search_phone']!=null)
			{
			$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("s", $_POST['cntry']);
				$stmt->execute();
				$result_phone = $stmt->get_result();
				$row_phone = $result_phone->fetch_assoc();
				$to = '+'.trim($row_phone['country_code']).''.trim($_POST['search_phone']);	
				$subject       = "Connect request received!";
				
				$emailContent ="Child care has sent you request to connect.Please connect here: ".$surl;
				$res=sendSms($subject, $to, $emailContent);
				
			}
				$to            = $_POST['email'];
				$subject       = "Connect request received!";
				if($user_id=="")
				{
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
                                                      <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 red_ff2828_bg  brdb_new tall xs-nobrdb" style="max-width: 100%; background-color: #fedd32 !important;
                                                         width: 960px;
                                                         position: relative;
                                                         margin: 0 auto;
                                                         ">
                                                         <div style="height: 250px; width: auto; max-width: 100%; padding-top: 100px; padding-right: 30px;
                                                            padding-left: 30px; margin-right: auto;
                                                            margin-left: auto;  z-index: 5; max-width: 100%; width: auto;">
                                                            <div class="padding-bottom: 40px; text-align: center; font-size: 45px;"><img src="http://www.safeqloud.com/html/usercontent/images/envelopeBlack.png" width="45px;" height="45px;"></div>
                                                            <div class="padb0 xxs-padb0 ">
                                                               <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:#000000;">Hello</h1>
                                                            </div>
                                                            <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:#000000; font-size: 20px;">'.$rowC['company_name'].' wants to connect with you..</div>
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
                                                   <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">
                                                      <tbody>
                                                         <tr>
                                                            <td align="left" style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:center">
                                                               <table border="0" cellspacing="0" cellpadding="0" align="left">
                                                                  <tbody>
																   <tr style="padding-top:20px;">
                                                                        <td align="left" valign="top" scope="col" style="padding-top:20px;  padding-bottom:15px;">
                                                                           <div style="font-size:16px; text-align:center;">if we are making a mistake with your email. Visit :- '.$surl1.' after login your account and use this code:- '.$id.' to verify yourself
                                                                               
                                                                           </div>
                                                                        </td>
                                                                     </tr>
                                                                     <tr>
                                                                   <td align="left" style="font-size:18px;line-height:22px;font-weight:bold; text-align:center; padding-bottom:15px;"><span><a href="http://www.safeqloud.com/user/index.php/CreateAccount" style="border-radius:3px;color:#ff2828;text-decoration:none;background-color:#ff2828;border-top:14px solid #ff2828;border-bottom:14px solid #ff2828;border-left:14px solid #ff2828;border-right:14px solid #ff2828;display:inline-block;border-radius:3px;color:#ffffff; padding-left:25px; padding-right:25px; font-weight:normal;" target="_blank" data-saferedirecturl="http://www.safeqloud.com/user/index.php/CreateAccount">Create account</a></span></td>
                                                                     </tr>
                                                                     <tr style="padding-top:20px;">
                                                                        <td align="left" valign="top" scope="col" style="padding-top:20px;  padding-bottom:15px;">
                                                                           <div style="font-size:16px; text-align:center;">If the button is not working then copy/paste the link in your browser http://www.safeqloud.com/user/index.php/CreateAccount
                                                                              <br><br> 
                                                                              <a href="'.$url.'" style="text-decoration:none; color:#3691c0;">Read more</a>
                                                                           </div>
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
                                                                                          <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px; font-size:14px;">This is sent because you have added as parent by the daycare.</p>
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
   
</body></html>';
				}
				else
				{
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
                                                               <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:#ffffff;">Hello</h1>
                                                            </div>
                                                            <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:#ffffff; font-size: 20px;">'.$rowC['company_name'].' wants to connect with you..</div>
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
                                                   <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">
                                                      <tbody>
                                                         <tr>
                                                            <td align="left" style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:center">
                                                               <table border="0" cellspacing="0" cellpadding="0" align="left">
                                                                  <tbody>
                                                                     <tr>
                                                                        <td align="left" style="font-size:18px;line-height:22px;font-weight:bold; text-align:center; padding-bottom:15px;"><span><a href="http://www.safeqloud.com/user/index.php/LoginAccount" style="border-radius:3px;color:#ff2828;text-decoration:none;background-color:#ff2828;border-top:14px solid #ff2828;border-bottom:14px solid #ff2828;border-left:14px solid #ff2828;border-right:14px solid #ff2828;display:inline-block;border-radius:3px;color:#ffffff; padding-left:25px; padding-right:25px; font-weight:normal;" target="_blank" data-saferedirecturl="http://www.safeqloud.com/user/index.php/LoginAccount">Read more</a></span></td>
                                                                     </tr>
                                                                     <tr style="padding-top:20px;">
                                                                        <td align="left" valign="top" scope="col" style="padding-top:20px;  padding-bottom:15px;">
                                                                            <div style="font-size:16px; text-align:center;">If the button is not working then copy/paste the link in your browser http://www.safeqloud.com/user/index.php/LoginAccount
                                                                              <br><br> 
                                                                              <a href="'.$url.'"style="text-decoration:none; color:#3691c0;">Read more</a>
                                                                           </div>
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
                                                                                          <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px; font-size:14px;">This is sent because you have added as parent by the daycare.</p>
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
   
</body></html>';	
				}
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
		
		function addParentInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			if($_POST['email']=="" || $_POST['email']==null)
			{
			$stmt = $dbCon->prepare("select country_phone,phone_number,email,user_logins_id from user_profiles left join user_logins on user_logins.id=user_profiles.user_logins_id where ssn=?");
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['social_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$_POST['search_phone']=$row['phone_number'];
			$_POST['cntry']=$row['country_phone'];
			$_POST['email']=$row['email'];
			$user_id=$row['user_logins_id'];
			}
			else
			{
				$user_id="";
			}
			$stmt = $dbCon->prepare("select company_name from companies where id=(select company_id from child_care_info where id=?)");
			/* bind parameters for markers */
			$stmt->bind_param("i", $child_id);
			$stmt->execute();
			$resultC = $stmt->get_result();
			$rowC = $resultC->fetch_assoc();
			
			$stmt = $dbCon->prepare("insert into parent_info(country_id,invitation_type,parent_ssn,parent_phone,parent_country,parent_email,created_on,child_id,parent_user_id)
			values(?,?,?,?,?,?,now(),?,?)");
			$stmt->bind_param("iissssii",$_POST['d_country'],$_POST['invitation_type'],$_POST['social_number'],$_POST['search_phone'],$_POST['cntry'],$_POST['email'],$child_id,$user_id);
			if($stmt->execute())
			{
				$id=$stmt->insert_id;
				$id= $this -> encrypt_decrypt('encrypt',$id);
				$url="https://www.safeqloud.com/public/index.php/PublicChildCareRequest/parentAccount/".$id;
				$surl=getShortUrl($url);
				if($_POST['search_phone']!="" || $_POST['search_phone']!=null)
			{
			$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("s", $_POST['cntry']);
				$stmt->execute();
				$result_phone = $stmt->get_result();
				$row_phone = $result_phone->fetch_assoc();
				$to = '+'.trim($row_phone['country_code']).''.trim($_POST['search_phone']);	
				$subject       = "Connect request received!";
				
				$emailContent ="Child care has sent you request to connect.Please connect here: ".$surl;
				$res=sendSms($subject, $to, $emailContent);
				
			}
				$to            = $_POST['email'];
				$subject       = "Connect request received!";
				if($user_id=="")
				{
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
                                                      <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 red_ff2828_bg  brdb_new tall xs-nobrdb" style="max-width: 100%; background-color: #fedd32 !important;
                                                         width: 960px;
                                                         position: relative;
                                                         margin: 0 auto;
                                                         ">
                                                         <div style="height: 250px; width: auto; max-width: 100%; padding-top: 100px; padding-right: 30px;
                                                            padding-left: 30px; margin-right: auto;
                                                            margin-left: auto;  z-index: 5; max-width: 100%; width: auto;">
                                                            <div class="padding-bottom: 40px; text-align: center; font-size: 45px;"><img src="http://www.safeqloud.com/html/usercontent/images/envelopeBlack.png" width="45px;" height="45px;"></div>
                                                            <div class="padb0 xxs-padb0 ">
                                                               <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:#000000;">Hello</h1>
                                                            </div>
                                                            <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:#000000; font-size: 20px;">'.$rowC['company_name'].' wants to connect with you..</div>
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
                                                   <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">
                                                      <tbody>
                                                         <tr>
                                                            <td align="left" style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:center">
                                                               <table border="0" cellspacing="0" cellpadding="0" align="left">
                                                                  <tbody>
																    
                                                                     <tr>
                                                                   <td align="left" style="font-size:18px;line-height:22px;font-weight:bold; text-align:center; padding-bottom:15px;"><span><a href="http://www.safeqloud.com/user/index.php/CreateAccount" style="border-radius:3px;color:#ff2828;text-decoration:none;background-color:#ff2828;border-top:14px solid #ff2828;border-bottom:14px solid #ff2828;border-left:14px solid #ff2828;border-right:14px solid #ff2828;display:inline-block;border-radius:3px;color:#ffffff; padding-left:25px; padding-right:25px; font-weight:normal;" target="_blank" data-saferedirecturl="http://www.safeqloud.com/user/index.php/CreateAccount">Create account</a></span></td>
                                                                     </tr>
                                                                     <tr style="padding-top:20px;">
                                                                        <td align="left" valign="top" scope="col" style="padding-top:20px;  padding-bottom:15px;">
                                                                           <div style="font-size:16px; text-align:center;">If the button is not working then copy/paste the link in your browser http://www.safeqloud.com/user/index.php/CreateAccount
                                                                              <br><br> 
                                                                              <a href="'.$url.'" style="text-decoration:none; color:#3691c0;">Read more</a>
                                                                           </div>
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
                                                                                          <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px; font-size:14px;">This is sent because you have added as parent by the daycare.</p>
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
   
</body></html>';	
				}
				else
				{
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
                                                               <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:#ffffff;">Hello</h1>
                                                            </div>
                                                            <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:#ffffff; font-size: 20px;">'.$rowC['company_name'].' wants to connect with you..</div>
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
                                                   <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">
                                                      <tbody>
                                                         <tr>
                                                            <td align="left" style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:center">
                                                               <table border="0" cellspacing="0" cellpadding="0" align="left">
                                                                  <tbody>
                                                                     <tr>
                                                                        <td align="left" style="font-size:18px;line-height:22px;font-weight:bold; text-align:center; padding-bottom:15px;"><span><a href="http://www.safeqloud.com/user/index.php/LoginAccount" style="border-radius:3px;color:#ff2828;text-decoration:none;background-color:#ff2828;border-top:14px solid #ff2828;border-bottom:14px solid #ff2828;border-left:14px solid #ff2828;border-right:14px solid #ff2828;display:inline-block;border-radius:3px;color:#ffffff; padding-left:25px; padding-right:25px; font-weight:normal;" target="_blank" data-saferedirecturl="http://www.safeqloud.com/user/index.php/LoginAccount">Read more</a></span></td>
                                                                     </tr>
                                                                     <tr style="padding-top:20px;">
                                                                        <td align="left" valign="top" scope="col" style="padding-top:20px;  padding-bottom:15px;">
                                                                            <div style="font-size:16px; text-align:center;">If the button is not working then copy/paste the link in your browser http://www.safeqloud.com/user/index.php/LoginAccount
                                                                              <br><br> 
                                                                              <a href="'.$url.'"style="text-decoration:none; color:#3691c0;">Read more</a>
                                                                           </div>
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
                                                                                          <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px; font-size:14px;">This is sent because you have added as parent by the daycare.</p>
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
   
</body></html>'; 

			}
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
		
		function checkParentSsn($data)
		{
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			
			$stmt = $dbCon->prepare("select count(id) as num from parent_info where parent_ssn=? and child_id=? and country_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("sii", $_POST['ssn'],$child_id, $_POST['country']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			if($row['num']>0)
			{
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			else
			{
			$stmt = $dbCon->prepare("select user_logins_id from user_profiles where ssn=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['ssn']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return 2;	
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return 3;
			}
			}
			
			
		}
		function selectCountry()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name,country_code  from phone_country_code  order by country_code");
			
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
		
		
			function updateChildInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
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
			
			$stmt = $dbCon->prepare("update child_care_info set blood_group=?,allergic=?,child_image_path=?,address=?,first_name=?,last_name=? where id=?
			");
			$stmt->bind_param("iissssi",$_POST['bgroup'],$_POST['allergic'],$img_name1,htmlentities($_POST['adrs1'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['fname'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['lname'],ENT_NOQUOTES, 'ISO-8859-1'),$child_id);
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
		
		function bloodType()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from blood_group");
			
			
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
		
		function childrenDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			$stmt = $dbCon->prepare("select blood_group,allergic,id,address,first_name,last_name,concat_ws(' ', first_name, last_name) as name,social_number,created_on,company_id,child_image_path,dependent_id  from child_care_info where id=?");
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
			
		
	}		