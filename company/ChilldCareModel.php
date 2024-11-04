<?php
	require_once('../AppModel.php');
	class ChilldCareModel extends AppModel
	{
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
		
		function appId()
		{
			
			return $this -> encrypt_decrypt('encrypt',33);
		}
		
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
		
		
		
		function childDetail($data)
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
		function addChildInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select dependents.id,dependents.first_name,dependents.last_name,created_by,user_logins.email  from dependents left join user_logins on user_logins.id=dependents.created_by where ssn=? and country_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("si", $_POST['social_number'],$_POST['d_country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();

			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into child_care_info(country_id,address,first_name,last_name,social_number,company_id,created_on)
			values(?,?,?,?,?,?,now())");
			$stmt->bind_param("issssi",$_POST['d_country'],htmlentities($_POST['adrs1'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['fname'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['lname'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['social_number'],$company_id);
			}
			else
			{
			$subject='Day care request received';
			$html='You have received a request from daycare for your dependent named '.$row['first_name'].' '.$row['last_name'].' please verify this request visiting dependent profile';
			$to=$row['email'];
			sendEmail($subject, $to, $html);

			
			$stmt = $dbCon->prepare("insert into child_care_info(country_id,address,first_name,last_name,social_number,company_id,created_on,dependent_id)
			values(?,?,?,?,?,?,now(),?)");
			$stmt->bind_param("issssii",$_POST['d_country'],htmlentities($_POST['adrs1'],ENT_NOQUOTES, 'ISO-8859-1'),$row['first_name'],$row['last_name'],$_POST['social_number'],$company_id,$row['id']);	
			}
			if($stmt->execute())
			{
				$id=$stmt->insert_id;
				$stmt->close();
				$dbCon->close();
				return $this -> encrypt_decrypt('encrypt',$id);
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		
			
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
			
			$stmt = $dbCon->prepare("update child_care_info set child_image_path=? where id=?");
			$stmt->bind_param("si",$img_name1,$child_id);
			if($stmt->execute())
			{
			$stmt = $dbCon->prepare("select company_id  from child_care_info where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $child_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			//print_r($row); die;
				$stmt->close();
				$dbCon->close();
				return $this -> encrypt_decrypt('encrypt',$row['company_id']);
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		
			
		}
		
		function postChildNews($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			if($_POST['post_title']=="" || $_POST['post_title']==null)
			{
			$_POST['post_title']=$_POST['post_titlem'];	
			}
			$stmt = $dbCon->prepare("select id  from employees where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("insert into child_care_news_information(company_id,user_id,employee_id,information_added,created_on,modified_on)
			values(?,?,?,?,now(),now())");
			$stmt->bind_param("iiis",$company_id,$data['user_id'],$row['id'],htmlentities($_POST['post_title'],ENT_NOQUOTES, 'ISO-8859-1'));
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
		
		
		function postChildNewsComment($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			if($_POST['post_title']=="" || $_POST['post_title']==null)
			{
			$_POST['post_title']=$_POST['post_titlem'];	
			}
			$stmt = $dbCon->prepare("select id  from employees where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("insert into child_care_news_information(company_id,user_id,employee_id,information_added,created_on,modified_on)
			values(?,?,?,?,now(),now())");
			$stmt->bind_param("iiis",$company_id,$data['user_id'],$row['id'],htmlentities($_POST['post_title'],ENT_NOQUOTES, 'ISO-8859-1'));
			if($stmt->execute())
			{
				$id=$stmt->insert_id;
				for($i=1; $i<=$_POST['indexing_save']; $i++)
				{
					$j='image_data'.$i;
					$data1 = strip_tags($_POST[$j]);
					 
					define('UPLOAD_DIR','../estorecss/'); 
					$img_name1="new".microtime();
					file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
					$stmt = $dbCon->prepare("insert into child_care_news_pics (comment_id, image_path, created_on) values (?,?,now())");
					$stmt->bind_param("is",$id,$img_name1);
					 $stmt->execute(); 
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
			$a=$_POST['id']*10;
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
				$title=substr($row['company_name'],0,41);
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
										<form action="../postReply/'.$data['cid'].'" method="POST" id="reply_comment'.$row['id'].'" name="reply_comment'.$row['id'].'" accept-charset="ISO-8859-1">
												
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
		
		
		function parentCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from parent_info where child_id in (select id from child_care_info where company_id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
		
		function parentImages($data)
		{
			function base64_to_jpegr($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
			}
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select passport_image from parent_info left join user_logins on user_logins.id=parent_info.parent_user_id where child_id in (select id from child_care_info where company_id=?) limit 0,4");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			array_push($org,$row);	
			if($row ['passport_image']!=null) { $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $org[$j]['image_path'] = base64_to_jpegr( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $org[$j]['image_path']="../html/usercontent/images/person-male.png"; } }  else $org[$j]['image_path']="../html/usercontent/images/person-male.png";
			$j++;
			}
			
				$stmt->close();
				$dbCon->close();
				return $org;
			
			
		}
		
		function checkSsn($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from child_care_info where social_number=? and country_id=? and company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("sii", $_POST['ssn'],$_POST['country'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close();
				$dbCon->close();
				return $row['num'];
			
			
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
		
		
	function childCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from child_care_info where company_id=?");
			
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
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,address,first_name,last_name,social_number,created_on ,child_image_path from child_care_info where company_id=? and is_approved_dependent=1 limit 0,20");
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
			
			function moreChildrenDetail($data)
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
			$stmt = $dbCon->prepare("select id,address,first_name,last_name,social_number,created_on,child_image_path  from child_care_info where company_id=?  and is_approved_dependent=1  limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				if($row ['child_image_path']!=null) { $filename="../estorecss/".$row ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $value_a = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['child_image_path'].'.jpg' ); } else { $value_a="../html/usercontent/images/person-male.png"; } }  else $value_a="../html/usercontent/images/person-male.png";
				
				$org=$org.'<div class="xxs-wi_50 wi_25 fleft bs_bb padrb20 talc  ">
													<div class="toggle-parent wi_100 dflex alit_s">
														<div class="wi_100 dnone_pa ">
															<a href="../../ParentInfo/childNewsDetail/'.$enc.'" class="style_base hei_180p  xxs-hei_150p dblock bs_bb pad25 xs-pad10   brdclr_seggreen_h brdrad5 lgtgrey2_bg_h  box_shadow trans_all2 ">
																<div class=" ">
																	<div class="wi_100 hei_90p dflex bs_bb">
																		<img src="../../../'.$value_a.'" height="90" width="90" class="brdrad5 padb0">
																	</div>
																	
																	<div class="padrb15 padt20 xs-padt15 xs-padr0">
																		<h3 class="ovfl_hid tall pad0 txtovfl_el ws_now lgn_hight_24 fsz18 black_txt padt0 xs-fsz15 ffamily_avenir">'.html_entity_decode($row['first_name']).' '.html_entity_decode($row['last_name']).'</h3>
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
		
		function childrenDetailPending($data)
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
			$stmt = $dbCon->prepare("select id,address,first_name,last_name,social_number,created_on ,child_image_path from child_care_info where company_id=? and is_approved_dependent=0 limit 0,20");
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
				
			$stmt = $dbCon->prepare("select count(id) as num from parent_info where child_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$resultParent = $stmt->get_result();	
			$rowParent = $resultParent->fetch_assoc();	
			if($rowParent['num']==0)
			{
				$org[$j]['hidden']="";
			}
			else
			{
				$org[$j]['hidden']="hidden";
			}	
				
				$j++;
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			}
			
			function morePendingChildrenDetail($data)
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
			$stmt = $dbCon->prepare("select id,address,first_name,last_name,social_number,created_on,child_image_path  from child_care_info where company_id=?  and is_approved_dependent=0  limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
			$stmt = $dbCon->prepare("select count(id) as num from parent_info where child_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$resultParent = $stmt->get_result();	
			$rowParent = $resultParent->fetch_assoc();	
			if($rowParent['num']==0)
			{
				$hidden="";
			}
			else
			{
				$hidden="hidden";
			}				
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				if($row ['child_image_path']!=null) { $filename="../estorecss/".$row ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $value_a = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['child_image_path'].'.jpg' ); } else { $value_a="../html/usercontent/images/person-male.png"; } }  else $value_a="../html/usercontent/images/person-male.png";
				
				$org=$org.'<div class="column_m container  marb20   fsz14 dark_grey_txt">
								<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
												<div class="fleft wi_50p marr15   hidden-xs"> 
																	
																	<div class="wi_50p xs-wi_100 hei_50p "><img src="../../../'.$value_a.'" width="45px;" height="45px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></div>
																			<div class="fleft wi_40 xxs-wi_20   "> <span class="trn fsz14 ffamily_avenir hidden-xs">'.$row['social_number'].'</span><span class="visible-xs">'.html_entity_decode($row['last_name']).'</span> <span class=" edit-text jain1 dblock  brdclr_lgtgrey2 fsz18 black_txt ffamily_avenir">'.html_entity_decode($row['first_name']).' <span class="hidden-xs">'.html_entity_decode($row['last_name']).'</span></span> </div>
																			 <div class="xxs-fleft fright wi_20 xs-padl100 padl40 xs-wi_20  fsz40  marrl30 padb0 '.$hidden.'  ">
																				<a href="../../ParentInfo/parentDetail/'.$enc.'" target="_blank"><button type="button" name="Add parent" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bg positionAbs xs-padr15 xs-padl15"   >Add parent</button></a>
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
		
	}		