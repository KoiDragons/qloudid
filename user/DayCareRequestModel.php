<?php
	require_once('../AppModel.php');
	class DayCareRequestModel extends AppModel
	{
		function updateParent($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("update parent_info set parent_user_id= ?,parent_ssn=? where parent_email=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iss", $data['user_id'],$data['ssn'],$data['email']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		
			function postChildNews($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			if($_POST['post_title']=="" || $_POST['post_title']==null)
			{
			$_POST['post_title']=$_POST['post_titlem'];	
			}
			$stmt = $dbCon->prepare("select id  from parent_info where parent_user_id=? and child_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['user_id'],$child_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$user_type="P";
			$stmt = $dbCon->prepare("insert into child_news_information(company_id,user_id,parent_id,information_added,created_on,modified_on,user_type,child_id)
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
		
		function childNewsInformationDetail($data)
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
		
			function moreInformationChild($data)
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
			$a=$_POST['id']*10+1;
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
				
			$form_comment='';
			
			$stmt = $dbCon->prepare("select count(id) as num from child_news_comments  where child_news_id=?");
			
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
													</div>';
												
				}
			
			
			
			$stmt = $dbCon->prepare("select title  from user_company_profile where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$row['user_id']);	
			$stmt->execute();
			$result_title = $stmt->get_result();
				
			$row_title = $result_title->fetch_assoc();
				
				
				$enc= $this -> encrypt_decrypt('encrypt',$row['id']);
				date_default_timezone_set("Europe/Stockholm"); 
				$to_time = strtotime($row['created_on']);
				$from_time = strtotime(date('Y-m-d H:i:s'));
				
				$time_diff= round(abs($from_time - $to_time) / 60);
				if($row ['passport_image']!=null) { $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $row['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $row['image_path']="../html/usercontent/images/person-male.png"; } }  else $row['image_path']="../html/usercontent/images/person-male.png";
				
				if($row_title['title']=="" || $row_title['title']==null) { $title= substr('Employee at '.$row['company_name'],0,41); } else { $title= substr( $row_title['title'].' at '.$row['company_name'],0,41); }
				
				$title= substr($row['company_name'],0,41);
				
				if($time_diff<=1) $time= 'Just now'; else if($time_diff<=60 && $time_diff>1) $time= $time_diff." m"; else if($time_diff>60 && $time_diff<1440) $time=  round($time_diff/60,0)." hr"; else if($time_diff>1440 && $time_diff<43200) $time=  round($time_diff/1440,0)." days"; else if($time_diff>43200 && $time_diff<525600) $time=  round($time_diff/43200,0)." months"; else  $time= round($time_diff/525600,0)." yr"; 
				
				$org=$org.'<div class="discussion mart25 brdrad5  xxs-brdrad0 xxs-nobrdrl white_bg fsz14 dark_grey_txt brd_e3e2e2  nobrdt nobrdb xs-nobrd">
										
									<div class="brd_width_2 padt15 blue_67cff7_brd nobrdb nobrdl nobrdr">
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
									
									
									
									<div class=" ">
										<div class="padrl0">
										<form action="../postParentReply/'.$data['parent_id'].'" method="POST" id="reply_comment'.$row['id'].'" name="reply_comment'.$row['id'].'" accept-charset="ISO-8859-1">
												
												<div class="comments_list">
											'.$form_comment.'
											<div id="more_reply'.$row['id'].'">
													</div>
													<div class="padtb20 talc '.$cc.'">
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
																<textarea name="user_comment'.$row['id'].'" id="user_comment'.$row['id'].'" rows="1" class="wi_100 dblock bs_bb padrl10 padtb9 brd brdclr_lnkdblue_f brdrad2 lgn_hight_20 fsz14 " placeholder="Comment here.." required="required"></textarea>
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
		
		
		function moreCommentsChild($data)
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
		
		
			function postParentReply($data)
		{
			$dbCon = AppModel::createConnection();
			$parent_id= $this -> encrypt_decrypt('decrypt',$data['parent_id']);
			$p_type="P_".$parent_id;
			$comment_id='user_comment'.$_POST['reply_id'];
			//print_r($_POST); die;
			$comment=htmlentities($_POST[$comment_id],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into child_news_comments(user_id,child_news_id,comment_detail,created_on,person_type)
			values(?,?,?,now(), ?)");
			$stmt->bind_param("iiss",$data['user_id'],$_POST['reply_id'],$comment,$p_type);
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
			
				
			$stmt = $dbCon->prepare("select information_added,child_care_news_information.user_id,company_name,child_care_news_information.id,concat_ws(' ',first_name,last_name) as name,child_care_news_information.created_on,passport_image from child_care_news_information left join companies on companies.id=child_care_news_information.company_id left join user_logins on user_logins.id=child_care_news_information.user_id where company_id=? order by child_care_news_information.modified_on desc limit 0,10");
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select title  from user_company_profile where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$row['user_id']);	
			$stmt->execute();
			$result_title = $stmt->get_result();
				
			$row_title = $result_title->fetch_assoc();
				
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org[$j]['title']=$row_title['title'];
				date_default_timezone_set("Europe/Stockholm"); 
				$to_time1 = strtotime($row['created_on']);
				$from_time1 = strtotime(date('Y-m-d H:i:s'));
				
				//echo date('Y-m-d H:i:s'); die;
				$org[$j]['time_diff']= round(abs($from_time1 - $to_time1) / 60);
				if($row ['passport_image']!=null) { $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $org[$j]['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $org[$j]['image_path']="../html/usercontent/images/person-male.png"; } }  else $org[$j]['image_path']="../html/usercontent/images/person-male.png";
				$stmt = $dbCon->prepare("select count(id) as num  from child_care_news_comments  where child_news_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);	
				$stmt->execute();
				$result_comment_count = $stmt->get_result();
				$row_comment_count = $result_comment_count->fetch_assoc();
				$org[$j]['comments_count']=$row_comment_count['num'];
				$org[$j]['comments']=array();
				$stmt = $dbCon->prepare("select concat_ws(' ',first_name,last_name) as name,comment_detail,passport_image,child_care_news_comments.created_on  from child_care_news_comments left join user_logins on user_logins.id=child_care_news_comments.user_id where child_news_id=? order by child_care_news_comments.created_on desc limit 0,5");
			
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
			//	print_r($org); die;
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
			$stmt = $dbCon->prepare("select concat_ws(' ',first_name,last_name) as name,comment_detail,passport_image,child_care_news_comments.created_on  from child_care_news_comments left join user_logins on user_logins.id=child_care_news_comments.user_id where child_news_id=? order by child_care_news_comments.created_on desc limit ?,5");
			
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
		
		function postReply($data)
		{
			$dbCon = AppModel::createConnection();
			$parent_id= $this -> encrypt_decrypt('decrypt',$data['parent_id']);
			$p_type="P_".$parent_id;
			$comment_id='user_comment'.$_POST['reply_id'];
			
			$stmt = $dbCon->prepare("insert into child_care_news_comments(user_id,child_news_id,comment_detail,created_on,person_type)
			values(?,?,?,now(), ?)");
			$stmt->bind_param("iiss",$data['user_id'],$_POST['reply_id'],htmlentities($_POST[$comment_id],ENT_NOQUOTES, 'ISO-8859-1'),$p_type);
			if($stmt->execute())
			{
				$stmt = $dbCon->prepare("update child_care_news_information set modified_on=now() where id=?");
			
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
			if($_POST['id']==0)
			{
			$a=0;	
			$b=10;
			}
			else
			{
			$a=$_POST['id']*10+1;
			$b=10;
			}	
			$stmt = $dbCon->prepare("select information_added,child_care_news_information.user_id,company_name,child_care_news_information.id,concat_ws(' ',first_name,last_name) as name,child_care_news_information.created_on,passport_image from child_care_news_information left join companies on companies.id=child_care_news_information.company_id left join user_logins on user_logins.id=child_care_news_information.user_id where company_id=? order by child_care_news_information.modified_on desc limit ?,?");
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			
			while($row = $result->fetch_assoc())
			{
				
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
			
			$stmt = $dbCon->prepare("select concat_ws(' ',first_name,last_name) as name,comment_detail,passport_image,child_care_news_comments.created_on  from child_care_news_comments left join user_logins on user_logins.id=child_care_news_comments.user_id where child_news_id=? order by child_care_news_comments.created_on desc limit 0,5");
			
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
													</div>';
												
				}
			
			
			
			$stmt = $dbCon->prepare("select title  from user_company_profile where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$row['user_id']);	
			$stmt->execute();
			$result_title = $stmt->get_result();
				
			$row_title = $result_title->fetch_assoc();
				
				
				$enc= $this -> encrypt_decrypt('encrypt',$row['id']);
				date_default_timezone_set("Europe/Stockholm"); 
				$to_time = strtotime($row['created_on']);
				$from_time = strtotime(date('Y-m-d H:i:s'));
				
				$time_diff= round(abs($from_time - $to_time) / 60);
				if($row ['passport_image']!=null) { $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $row['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $row['image_path']="../html/usercontent/images/person-male.png"; } }  else $row['image_path']="../html/usercontent/images/person-male.png";
				
				if($row_title['title']=="" || $row_title['title']==null) { $title= substr('Employee at '.$row['company_name'],0,41); } else { $title= substr( $row_title['title'].' at '.$row['company_name'],0,41); }
				$title= substr($row['company_name'],0,41);
				if($time_diff<=1) $time= 'Just now'; else if($time_diff<=60 && $time_diff>1) $time= $time_diff." m"; else if($time_diff>60 && $time_diff<1440) $time=  round($time_diff/60,0)." hr"; else if($time_diff>1440 && $time_diff<43200) $time=  round($time_diff/1440,0)." days"; else if($time_diff>43200 && $time_diff<525600) $time=  round($time_diff/43200,0)." months"; else  $time= round($time_diff/525600,0)." yr";  
				
				$org=$org.'<div class="discussion mart25 brdrad5  xxs-brdrad0 xxs-nobrdrl white_bg fsz14 dark_grey_txt brd_e3e2e2  nobrdt nobrdb xs-nobrd">
										
									<div class="brd_width_2 padt15 blue_67cff7_brd nobrdb nobrdl nobrdr">
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
										<form action="../postReply/'.$data['parent_id'].'" method="POST" id="reply_comment'.$row['id'].'" name="reply_comment'.$row['id'].'" accept-charset="ISO-8859-1">
												
												<div class="comments_list">
											'.$form_comment.'
											<div id="more_reply'.$row['id'].'">
													</div>
													<div class="padtb20 talc '.$cc.'">
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
																<textarea name="user_comment'.$row['id'].'" id="user_comment'.$row['id'].'" rows="1" class="wi_100 dblock bs_bb padrl10 padtb9 brd brdclr_lnkdblue_f brdrad2 lgn_hight_20 fsz14 " placeholder="Comment here..." required="required"></textarea>
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
		
		function checkUsedIdentificator($data)
		{
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['did']);
			$stmt = $dbCon->prepare("select id  from dependents   where  passport_number=? and id!=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['variation_id'],$child_id);
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
				$stmt->close();
				$dbCon->close();
				return $this -> encrypt_decrypt('encrypt',$row['id']);
			}
			 
		}
		
		function updateDependentPassport($data)
		{
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['did']);
			$data1 = strip_tags($_POST['image-data1']);
			 
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			$data2 = strip_tags($_POST['image-data3']);
			//echo $data; die;
			define('UPLOAD_DIR1','../estorecss/'); // image dir path
			$img_name2="new".microtime();
			file_put_contents(UPLOAD_DIR1.$img_name2.".txt", $data2);
			
			$stmt = $dbCon->prepare("update dependents set passport_number=?,issue_month=?,issue_year=?,expiry_month=?, expiry_year=?,front_image_path=?, back_image_path=?,is_completed=1 where id=?");
			$stmt->bind_param("ssisissi",$_POST['id_number'],$_POST['issue_month'],$_POST['issue_year'],$_POST['expiry_month'],$_POST['expiry_year'],$img_name1,$img_name2,$child_id);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select ssn,is_ssn_available from dependents where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $child_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$dependent = $result->fetch_assoc();
			
			if($dependent['is_ssn_available']==0)
			{
			$email=$_POST['id_number'].'@safeqloud.com';
			$stmt = $dbCon->prepare("update dependents set ssn=?,email=? where id=?");
			$stmt->bind_param("ssi",$_POST['id_number'],$email,$child_id);
			$stmt->execute();	
			}
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			 
		}
		
		
		function updateChildInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['did']);
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
			
			if($_POST['is_ssn_available']==1)
			{
			$_POST['social_number']=$_POST['social_number'];
			$email=$_POST['social_number'].'@safeqloud.com';
			}
			else
			{
				$stmt = $dbCon->prepare("select passport_number from dependents where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $child_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();	
				$_POST['social_number']=$row['passport_number'];
				$email=$row['passport_number'].'@safeqloud.com';
			}
			
			
			
			
			
			if($_POST['is_address_same']==1)
			{
				$stmt = $dbCon->prepare("select address,city,port_number,zipcode from user_address where user_id=? and is_personal_address=1");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				
				$row = $result->fetch_assoc();
				$_POST['child_address']=$row['address'];
				$_POST['child_city']=$row['city'];
				$_POST['child_port_number']=$row['port_number'];
				$_POST['child_zipcode']=$row['zipcode'];
			}
			
			$stmt = $dbCon->prepare("update dependents set blood_group=1,allergic=1,image_path=?,address=?,first_name=?,last_name=?,child_address=?,child_city=?,child_zip=?,child_port_number=?,is_address_same=?,is_ssn_available=?,birth_day=?,birth_month=?,birth_year=? where id=?
			");
			
			$stmt->bind_param("ssssssssiisssi",$img_name1,htmlentities($_POST['child_address'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['fname'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['lname'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['child_address'],$_POST['child_city'],$_POST['child_zipcode'],$_POST['child_port_number'],$_POST['is_address_same'],$_POST['is_ssn_available'],$_POST['dob_day'],$_POST['dob_month'],$_POST['dob_year'],$child_id);
			if($stmt->execute())
			{
			$stmt = $dbCon->prepare("update child_care_info set blood_group=1,allergic=1,child_image_path=?,address=?,first_name=?,last_name=? where dependent_id=?
			");
			$stmt->bind_param("ssssi",$img_name1,htmlentities($_POST['child_address'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['fname'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['lname'],ENT_NOQUOTES, 'ISO-8859-1'),$child_id);
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
		
		function moreAttendenceInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$child_id= $this -> encrypt_decrypt('decrypt',$data['child_id']);
			$a=$_POST['id']*20+1;
			$b=$a+20;
			$stmt = $dbCon->prepare("select dropped_off_children.created_on drop_date,child_pickup_info.created_on pickup_date from dropped_off_children left join child_pickup_info on child_pickup_info.dropped_off_id=dropped_off_children.id where dropped_off_children.child_id=?  order by dropped_off_children.created_on desc limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $child_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
				
			 if($row['pickup_date']==null) $date='-'; else $date= date('h:i:s',strtotime($row['pickup_date']));
				
				$org=$org.'<div class="white_bg marb10  brdrad3 box_shadow bg_fffbcc_a" style="">
																<div class="container padrl10 padt15 padb20  brdrad1 fsz18 dark_grey_txt">
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



															</div>';
				
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function kinsDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$parent_id= $this -> encrypt_decrypt('decrypt',$data['parent_id']);
			$stmt = $dbCon->prepare("select receiver_id as uid,concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.receiver_id left join user_profiles on connect_next_kin.receiver_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.sender_id=? and receiver_id not in (select parent_user_id from parent_info where child_id in (select child_id from parent_info where parent_ssn=(select parent_ssn from parent_info where parent_info.id=?))) and connect_email not in (select relative_email from parent_relatives_information where parent_id in (select id from parent_info where child_id in (select child_id from parent_info where parent_ssn=(select parent_ssn from parent_info where parent_info.id=?))))
			union
			select sender_id as uid,concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code  from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.sender_id left join user_profiles on connect_next_kin.sender_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.receiver_id=? and sender_id not in (select parent_user_id from parent_info where child_id in (select child_id from parent_info where parent_ssn=(select parent_ssn from parent_info where parent_info.id=?))) and connect_email not in (select relative_email from parent_relatives_information where parent_id in (select id from parent_info where child_id in (select child_id from parent_info where parent_ssn=(select parent_ssn from parent_info where parent_info.id=?))))  order by first_name");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiiiii", $data['user_id'],$parent_id,$parent_id,$data['user_id'],$parent_id,$parent_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org[$j]['relative_user_id']= $this -> encrypt_decrypt('encrypt',$row['uid']);
				if($row['uid']==0)
				{
				$org[$j]['ssn']="";
				}
				else
				{
				$stmt = $dbCon->prepare("select ssn from user_profiles where user_logins_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['uid']);
				$stmt->execute();
				$resultssn = $stmt->get_result();
				$rowssn = $resultssn->fetch_assoc();
				$org[$j]['ssn']=$rowssn['ssn'];
				}
				
				$j++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function countryOption()
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,country_name,country_code  from phone_country_code order by country_name");
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
			function dependentDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$dependent_id= $this -> encrypt_decrypt('decrypt',$data['did']);
			$stmt = $dbCon->prepare("select *   from dependents where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $dependent_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			}
		
		function childrenDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$parent_id= $this -> encrypt_decrypt('decrypt',$data['parent_id']);
			$stmt = $dbCon->prepare("select child_address,child_city,child_zip,child_port_number,is_address_same,is_ssn_available,birth_day,birth_month,birth_year,company_profiles.phone,country_code,blood_group,allergic,child_image_path,child_care_info.id,child_care_info.address,first_name,last_name,concat_ws(' ', first_name, last_name) as name,social_number,child_care_info.created_on,child_care_info.company_id,company_name,profile_pic,dependent_id  from child_care_info left join companies on companies.id=child_care_info.company_id left join company_profiles on company_profiles.company_id=companies.id left join phone_country_code on companies.country_id=phone_country_code.id where child_care_info.id=(select child_id from parent_info where id=?)");
			/* bind parameters for markers */
			$stmt->bind_param("i", $parent_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			$row = $result->fetch_assoc();
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['company_id']);
			$row['child_id']= $this -> encrypt_decrypt('encrypt',$row['id']);	
			$row['did']= $this -> encrypt_decrypt('encrypt',$row['dependent_id']);
			$stmt->close();
			$dbCon->close();
			return $row;
			}
			
			
			function childrenDetailAll($data)
		{
			$dbCon = AppModel::createConnection();
			function base64_to_jpegch($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
		
		
		
		
			$parent_id= $this -> encrypt_decrypt('decrypt',$data['parent_id']);
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select company_profiles.phone,country_code,parent_info.id as parent_id,child_care_info.id,child_care_info.address,first_name,last_name,concat_ws(' ', first_name, last_name) as name,social_number,child_care_info.created_on,child_care_info.company_id,company_name,child_image_path  from child_care_info left join parent_info on parent_info.child_id=child_care_info.id left join companies on companies.id=child_care_info.company_id left join phone_country_code on companies.country_id=phone_country_code.id left join company_profiles on companies.id=company_profiles.company_id where child_care_info.id in (select child_id from parent_info where parent_email=(select parent_email from parent_info where id=?)) and child_care_info.company_id=? and parent_email=(select parent_email from parent_info where id=?)");
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
			if($row ['child_image_path']!=null) { $filename="../estorecss/".$row ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $org[$j]['image_path'] = base64_to_jpegch( $value_a, '../estorecss/tmp'.$row['child_image_path'].'.jpg' ); } else { $org[$j]['image_path']="../html/usercontent/images/person-male.png"; } }  else $org[$j]['image_path']="../html/usercontent/images/person-male.png";
			$j++;
			}	
			
			$stmt->close();
			$dbCon->close();
			return $org;
			}
			
		function updateImage($data)
		{
			$dbCon = AppModel::createConnection();
			$relative_id= $this -> encrypt_decrypt('decrypt',$data['relative_id']);
			$data1 = strip_tags($_POST['image-data1']);
			
			define('UPLOAD_DIR','../estorecss/'); 
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			
			$stmt = $dbCon->prepare("update parent_relatives_information set relative_photo=?  where id=?");
			
			$stmt->bind_param("si", $img_name1,$relative_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
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
			
			$stmt->close();
			$dbCon->close();
			return $relation;
		}
		function addRelative($data)
		{
			$dbCon = AppModel::createConnection();
			$parent_id= $this -> encrypt_decrypt('decrypt',$data['parent_id']);
			
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
			
			$stmt = $dbCon->prepare("select company_id from child_care_info where id=(select child_id from parent_info where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $parent_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row_daycare = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select user_logins_id from user_profiles where ssn=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['social_number']);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row_login = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("insert into parent_relatives_information(relative_photo,relation_id,interval_type,permission_type,relative_first_name,relative_last_name,relative_country,relative_phone,relative_email,parent_id,day_care_id,created_on,relative_ssn,relative_login_id)
			values(?,?,?,?,?,?,?,?,?,?,?,now(),?,?)");
			$stmt->bind_param("siiississiisi",$img_name1,$_POST['relate'],$_POST['interval'],$_POST['permission_type'],htmlentities($_POST['fname'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['lname'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['cntry'],$_POST['search_phone'],$_POST['search_email'],$parent_id,$row_daycare['company_id'],$_POST['social_number'],$row_login['user_logins_id']);
			if($stmt->execute())
			{
				$id=$stmt->insert_id;
				$stmt->close();
				$dbCon->close();
				return $this->encrypt_decrypt('encrypt',$id);
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
			
			
			$stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image,ssn,country_of_residence from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id = ?");
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
		
			function parentsDetail($data)
		{
			$dbCon = AppModel::createConnection();
			function base64_to_jpegprt($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			
			
			$parent_id= $this -> encrypt_decrypt('decrypt',$data['parent_id']);
			$stmt = $dbCon->prepare("select distinct parent_email,concat_ws(' ', user_logins.first_name, user_logins.last_name) as name,user_logins.first_name,user_logins.last_name,company_name,passport_image from parent_info left join child_care_info on child_care_info.id=parent_info.child_id left join user_logins on user_logins.id=parent_info.parent_user_id left join companies on companies.id=child_care_info.company_id  where child_id in(select child_id from parent_info where id=?)  and is_approved=1 order by parent_info.created_on limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $parent_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				if($row ['passport_image']!=null) { $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $org[$j]['image_path'] = base64_to_jpegprt( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $org[$j]['image_path']="../html/usercontent/images/person-male.png"; } }  else $org[$j]['image_path']="../html/usercontent/images/person-male.png";
				$j++;
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		function relativesDetail($data)
		{
			$dbCon = AppModel::createConnection();
			function base64_to_jpegprrt($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$parent_id= $this -> encrypt_decrypt('decrypt',$data['parent_id']);
			$stmt = $dbCon->prepare("select company_id from child_care_info where id=(select child_id from parent_info where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $parent_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row_daycare = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select parent_relatives_information.id,concat_ws(' ', relative_first_name, relative_last_name) as name,relative_first_name,relative_last_name,relative_phone,permission_type,relative_photo from parent_relatives_information where parent_id in (select parent_info.id from parent_info where child_id in (select child_id from parent_info where parent_email=(select parent_email from parent_info where parent_info.id=?) and child_id in (select id from child_care_info where company_id=?)) and is_approved=1)");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $parent_id,$row_daycare['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				if($row ['relative_photo']!=null) { $filename="../estorecss/".$row ['relative_photo'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['relative_photo'].".txt"); $value_a=str_replace('"','',$value_a); $org[$j]['image_path'] = base64_to_jpegprrt( $value_a, '../estorecss/tmp'.$row['relative_photo'].'.jpg' ); } else { $org[$j]['image_path']="../html/usercontent/images/person-male.png"; } }  else $org[$j]['image_path']="../html/usercontent/images/person-male.png";
				$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function getKinSSN($data)
		{
			$dbCon = AppModel::createConnection();
			$kin_user_id= $this -> encrypt_decrypt('decrypt',$data['kin_user_id']);
			$stmt = $dbCon->prepare("select ssn  from user_profiles where user_logins_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $kin_user_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
			function updateInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$parent_id= $this -> encrypt_decrypt('decrypt',$data['parent_id']);
			$kin_id= $this -> encrypt_decrypt('decrypt',$data['kin_id']);
			$kin_user_id= $this -> encrypt_decrypt('decrypt',$data['kin_user_id']);
			
			$stmt = $dbCon->prepare("select connect_email,connect_phone,image_path,keen_first_name,keen_last_name,relation_type,country_phone_id from connect_next_kin where id=?");
				
			$stmt->bind_param("i", $kin_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_kin = $result->fetch_assoc();
			
			$phone=substr($row_kin['connect_phone'], 3);
			$country_id=substr($row_kin['country_phone_id'], 1);
			
			
			$stmt = $dbCon->prepare("select id from country where country_name=(select country_name from phone_country_code where country_code=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $country_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row_country = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select company_id from child_care_info where id = (select child_id from parent_info where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $parent_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row_daycare = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("insert into parent_relatives_information(relative_photo,relation_id,permission_type,relative_first_name,relative_last_name,relative_country,relative_phone,relative_email,parent_id,day_care_id,created_on,relative_ssn,relative_login_id)
			values(?,?,?,?,?,?,?,?,?,?,now(),?,?)");
			$stmt->bind_param("siississiisi",$row_kin['image_path'],$row_kin['relation_type'],$_POST['permission_type'],$row_kin['keen_first_name'],$row_kin['keen_last_name'],$row_country['id'],$phone,$row_kin['connect_email'],$parent_id,$row_daycare['company_id'],$_POST['ssn'],$kin_user_id);
			if($stmt->execute())
			{
				$id=$stmt->insert_id;
				//echo $id; die;
				$stmt->close();
				$dbCon->close();
				return $this->encrypt_decrypt('encrypt',$id);
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		
			
		}
		
		
			function addKinasRelative($data)
		{
			$dbCon = AppModel::createConnection();
			$parent_id= $this -> encrypt_decrypt('decrypt',$data['parent_id']);
			$kin_id= $this -> encrypt_decrypt('decrypt',$data['kin_id']);
			$kin_user_id= $this -> encrypt_decrypt('decrypt',$data['kin_user_id']);
			
			$stmt = $dbCon->prepare("select ssn  from user_profiles where user_logins_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $kin_user_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row_ssn = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select connect_email,connect_phone,image_path,keen_first_name,keen_last_name,relation_type,country_phone_id from connect_next_kin where id=?");
				
			$stmt->bind_param("i", $kin_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_kin = $result->fetch_assoc();
			
			$phone=substr($row_kin['connect_phone'], 3);
			$country_id=substr($row_kin['country_phone_id'], 1);
			
			
			$stmt = $dbCon->prepare("select id from country where country_name=(select country_name from phone_country_code where country_code=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $country_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row_country = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select company_id from child_care_info where id = (select child_id from parent_info where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $parent_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row_daycare = $result->fetch_assoc();
			
			$permission_type=3;
			
			$stmt = $dbCon->prepare("insert into parent_relatives_information(relative_photo,relation_id,permission_type,relative_first_name,relative_last_name,relative_country,relative_phone,relative_email,parent_id,day_care_id,created_on,relative_ssn,relative_login_id)
			values(?,?,?,?,?,?,?,?,?,?,now(),?,?)");
			$stmt->bind_param("siississiisi",$row_kin['image_path'],$row_kin['relation_type'],$permission_type,$row_kin['keen_first_name'],$row_kin['keen_last_name'],$row_country['id'],$phone,$row_kin['connect_email'],$parent_id,$row_daycare['company_id'],$row_ssn['ssn'],$kin_user_id);
			if($stmt->execute())
			{
				$id=$stmt->insert_id;
				//echo $id; die;
				$stmt->close();
				$dbCon->close();
				return $this->encrypt_decrypt('encrypt',$id);
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		
			
		}
		
		
		function checkRelative($data)
		{
			$dbCon = AppModel::createConnection();
			$parent_id= $this -> encrypt_decrypt('decrypt',$data['parent_id']);
			$stmt = $dbCon->prepare("select company_id from child_care_info where id=(select child_id from parent_info where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $parent_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row_daycare = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select count(parent_relatives_information.id) as num from parent_relatives_information where parent_id in (select parent_info.id from parent_info where child_id in (select child_id from parent_info where parent_email=(select parent_email from parent_info where parent_info.id=?) and child_id in (select id from child_care_info where company_id=?))) and relative_country=? and relative_phone=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiis", $parent_id,$row_daycare['company_id'],$_POST['cid'],$_POST['cphone']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row['num'];
			
			
		}
		
		
		function checkRelativeSsn($data)
		{
			$dbCon = AppModel::createConnection();
			$parent_id= $this -> encrypt_decrypt('decrypt',$data['parent_id']);
			$kin_user_id= $this -> encrypt_decrypt('decrypt',$data['kin_user_id']);
			$stmt = $dbCon->prepare("select user_logins_id  from user_profiles where ssn=? and user_logins_id!=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['ssn'],$kin_user_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return 3;	
			}
			$stmt = $dbCon->prepare("select company_id from child_care_info where id=(select child_id from parent_info where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $parent_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row_daycare = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select count(parent_info.id) num from parent_info where child_id in (select child_id from parent_info where parent_email=(select parent_email from parent_info where parent_info.id=?) and child_id in (select id from child_care_info where company_id=?)) and parent_ssn=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iis", $parent_id,$row_daycare['company_id'],$_POST['ssn']);
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
			$stmt = $dbCon->prepare("select count(parent_relatives_information.id) as num from parent_relatives_information where parent_id in (select parent_info.id from parent_info where child_id in (select child_id from parent_info where parent_email=(select parent_email from parent_info where parent_info.id=?) and child_id in (select id from child_care_info where company_id=?))) and relative_ssn=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iis", $parent_id,$row_daycare['company_id'],$_POST['ssn']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']>0)
			{
			$stmt->close();
			$dbCon->close();
			return 2;	
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return 0;
			}
			}
			
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
		
			function requestReceivedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select parent_info.id,concat_ws(' ', first_name, last_name) as name,first_name,last_name,company_name from parent_info left join child_care_info on child_care_info.id=parent_info.child_id left join companies on companies.id=child_care_info.company_id  where parent_user_id=?  and is_approved=0 order by parent_info.created_on limit 0,20");
			
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
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function requestReceivedCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num from parent_info where parent_user_id=? and is_approved=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
			function moreRequestReceivedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$a=$_POST['id']*20+1;
			$b=20;
			$stmt = $dbCon->prepare("select parent_info.id,concat_ws(' ', first_name, last_name) as name,first_name,last_name,company_name from parent_info left join child_care_info on child_care_info.id=parent_info.child_id left join companies on companies.id=child_care_info.company_id  where parent_user_id=?  and is_approved=0 order by parent_info.created_on limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				
				if($data['ssn']=="" || $data['ssn']==null || $data['ssn']=="-") 
				{
				$td='<div class="fright wi_10 padl0 xs-wi_20   marl15 fsz40  xs-marl0 xxs-marr20 padb0 hidden-xs">
														<a href="StoreData/addUserSSN"><span class="fas fa-arrow-alt-circle-right"></span></a>
													</div>	';	
				}
				
				else
				{
					$td='<div class="fright wi_10 padl0 xs-wi_20   marl15 fsz40  xs-marl0 xxs-marr20 padb0 hidden-xs">
														<a href="DayCareRequest/approveRequest/'.$org1.'"><span class="fas fa-check-circle green_txt"></span></a>
													</div>	 ';
				}
				
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
											<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padt15 padb20  brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
													<div class="fleft wi_40 marl15 xxs-marl15 "> <span class="trn fsz14 ffamily_avenir black_txt" data-trn-key="'.$row['company_name'].'">'.$row['company_name'].'</span> <span class=" edit-text jain1 dblock  brdclr_lgtgrey2 fsz18 black_txt">'.$row['name'].'</span> </div>
													 
													
													
													<div class="fright wi_10 padl0 xs-wi_20 marl15 fsz40  xxs-marr20 padb0">
																				<a href="DayCareRequest/rejectRequest/'.$org1.'" ><span class="far fa-times-circle  red_txt"></span></a>
																			</div>
																			'.$td.'
													 
												</div>
												
											</div>
											<div class="clear"></div>
										</div>
									</div> </div>';
				
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function requestApprovedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select parent_info.id,concat_ws(' ', first_name, last_name) as name,first_name,last_name,company_name from parent_info left join child_care_info on child_care_info.id=parent_info.child_id left join companies on companies.id=child_care_info.company_id  where parent_user_id=?  and is_approved=1 order by parent_info.created_on limit 0,20");
			
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
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function requestApprovedCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num from parent_info where parent_user_id=? and is_approved=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
			function moreApprovedRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$a=$_POST['id']*20+1;
			$b=20;
			$stmt = $dbCon->prepare("select parent_info.id,concat_ws(' ', first_name, last_name) as name,first_name,last_name,company_name from parent_info left join child_care_info on child_care_info.id=parent_info.child_id left join companies on companies.id=child_care_info.company_id  where parent_user_id=?  and is_approved=1 order by parent_info.created_on limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
											<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padt15 padb20  brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
											<div class="fleft wi_40  xs-wi_100   sm-wi_100 marl15   xs-padb0 "> <a href="DayCareRequest/childNewsDaycareDetail/'.$org1.'"><span class="trn ffamily_avenir fsz14 black_txt" data-trn-key="'.$row['company_name'].'">'.$row['company_name'].'</span> <span class=" edit-text jain1 dblock  brdclr_lgtgrey2 fsz18 ffamily_avenir black_txt">'.$row['name'].'</span></a> </div>
																			 
																			 
																			 
																			<div class="fright wi_10 padl0 xs-wi_30 sm-wi_100 marl15 fsz40  xs-marl0 xxs-marr20 padb0 hidden-xs">
														<a href="DayCareRequest/childNewsDaycareDetail/'.$org1.'"><span class="fas fa-arrow-alt-circle-right"></span></a>
													</div>	

																		</div>
											
											 
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										</div>';
				
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function requestRejectedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select parent_info.id,concat_ws(' ', first_name, last_name) as name,first_name,last_name,company_name from parent_info left join child_care_info on child_care_info.id=parent_info.child_id left join companies on companies.id=child_care_info.company_id  where parent_user_id=?  and is_approved=2 order by parent_info.created_on limit 0,20");
			
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
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function requestRejectedCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num from parent_info where parent_user_id=? and is_approved=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
			function moreRejectedRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$a=$_POST['id']*20+1;
			$b=20;
			$stmt = $dbCon->prepare("select parent_info.id,concat_ws(' ', first_name, last_name) as name,first_name,last_name,company_name from parent_info left join child_care_info on child_care_info.id=parent_info.child_id left join companies on companies.id=child_care_info.company_id  where parent_user_id=?  and is_approved=2 order by parent_info.created_on limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
											<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padt15 padb20  brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
																			<div class="fleft wi_40 xs-wi_100 marl15 xxs-marl15 "> <span class="trn fsz14 ffamily_avenir black_txt" data-trn-key="'.$row['company_name'].'">'.$row['company_name'].'</span> <span class=" edit-text jain1 dblock  brdclr_lgtgrey2 fsz18 black_txt">'.$row['name'].'</span> </div>
																			 
																			 
																		 

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
		
		
		function approveRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			
			$stmt = $dbCon->prepare("select email,country_of_residence,phone_number,phone_country_code.country_code,ssn,country_phone  from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id left join country on user_logins.country_of_residence=country.id left join phone_country_code on phone_country_code.country_name=country.country_name where user_logins.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("update parent_info set is_approved=1,parent_email=?,parent_ssn=?,parent_phone=?,parent_country=?,country_id=?,modified_on=now() where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ssssii", $row['email'],$row['ssn'],$row['phone_number'],$row['country_phone'],$row['country_of_residence'],$id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select id,first_name,last_name,social_number,country_id  from child_care_info where id=(select child_id from parent_info where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_child = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select id,first_name,last_name  from dependents where ssn=? and country_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("si", $row_child['social_number'],$row_child['country_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowD = $result->fetch_assoc();
			
			if(empty($rowD))
			{
				$st=1;
				$email=$row_child['social_number'].'@safeqloud.com';
				
			$stmt = $dbCon->prepare("insert into dependents(dependent_type,first_name,last_name,ssn,created_by,created_on,email,country_id,is_approved)
			values(?,?,?,?,?,now(),?,?,?)");
			$stmt->bind_param("isssisii",$st,$row_child['first_name'],$row_child['last_name'],$row_child['social_number'],$data['user_id'],$email,$row_child['country_id'],$st);
			if($stmt->execute())
			{
				$id=$stmt->insert_id;
				
			
			$st=1;
			$stmt = $dbCon->prepare("insert into dependent_guardian(dependent_id,guardian_ssn,guardian_email,guardian_user_id, inviting_person_user_id,created_on,is_approved,guardian_phone,guardian_country)
			values(?,?,?,?,?,now(),?,?,?)");
			$stmt->bind_param("issiiiss",$id,$row['ssn'],$row['email'],$data['user_id'],$data['user_id'],$st,$row['phone_number'],$row['country_phone']);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("update child_care_info set is_approved_dependent=1,dependent_id=? where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $id,$row_child['id']);
			$stmt->execute();
			}
			
			}
			else
			{
			$stmt = $dbCon->prepare("update child_care_info set is_approved_dependent=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row_child['id']);
			$stmt->execute();	
			}
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function rejectRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			 
			$stmt = $dbCon->prepare("update parent_info set is_approved=2,modified_on=now() where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
	}						