<?php
	require_once('../AppModel.php');
	class PersonalRequestsModel extends AppModel
	{
		
		function selectCredits($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,credits_left  from request_credits where user_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$stmt = $dbCon->prepare("insert into request_credits (user_id,created_on) values (?, now())");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 5;
			}
			else
			{
				$stmt = $dbCon->prepare("update request_credits set credits_left=10  where id=?");
						
						/* bind parameters for markers */
						$stmt->bind_param("i", $row['id']);
						$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return $row['credits_left'];
			}
			
			
		}
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=14");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
		
		
		function approvedDetailConnections($data)
		{
			$dbCon = AppModel::createConnection();
			ini_set('MAX_EXECUTION_TIME', -1);
			$user_id=$data['user_id'];
			$stmt = $dbCon->prepare("select email from user_logins where id=?");
			$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_e = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select company_user_connection.id,company_name,last_name,first_name,email,company_user_connection.created_on,company_id from company_user_connection left join user_logins on user_logins.id=company_user_connection.user_id left join companies on companies.id=company_user_connection.company_id where company_user_connection.user_id=? and is_approved=1 order by company_name desc limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$enc_id=$this->encrypt_decrypt("encrypt",$row['company_id']);
				$company_id=$row['company_id'];
				
				
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
								
												
											
											
											<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padb20 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
																			<div class="fleft wi_40 marl15 xxs-marl15 "> 
																			<a href="../ViewCompany/companyAccount/'.$enc_id.'" class="black_txt"><span class="trn fsz14 ffamily_avenir" >Company Name</span> <span class=" edit-text jain1 dblock   brdclr_lgtgrey2 fsz18 black_txt ffamily_avenir">'.html_entity_decode($row['company_name']).'</span></a> </div>
																			 
															
													
													<div class="fleft wi_20    marl15 xs-mar0 padb10 hidden-xs"> <span class="trn" data-trn-key="Date">Date</span> <span class=" edit-text jain2 dblock   brdclr_lgtgrey2 fsz16">'.date('Y-m-d', strtotime($row['created_on'])).'</span> </div>
																			 
													 		
																		</div>
											
											
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
										 
																			</div>
												
											
								
								</div>  ';
			}
			
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function approvedDetailConnectionsCount($data)
		{
			$dbCon = AppModel::createConnection();
			ini_set('MAX_EXECUTION_TIME', -1);
			$user_id=$data['user_id'];
			$stmt = $dbCon->prepare("select email from user_logins where id=?");
			$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_e = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select count(company_user_connection.id) as num  from company_user_connection  where company_user_connection.user_id=? and is_approved=1 ");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			 $row = $result->fetch_assoc();
			
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		
		function moreRequestApprovedDetailConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$a=0;//$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select company_user_connection.id,company_name,last_name,first_name,email,company_user_connection.created_on,company_id from company_user_connection left join user_logins on user_logins.id=company_user_connection.user_id left join companies on companies.id=company_user_connection.company_id where company_user_connection.user_id=? and is_approved=1 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				$enc_id=$this->encrypt_decrypt("encrypt",$row['company_id']);
				$company_id=$row['company_id'];
				
				
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
								
												
											
											
											<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padb20 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
																			<div class="fleft wi_40 marl15 xxs-marl15 "> 
																			<a href="../ViewCompany/companyAccount/'.$enc_id.'" class="black_txt"><span class="trn fsz14 ffamily_avenir" >Company Name</span> <span class=" edit-text jain1 dblock   brdclr_lgtgrey2 fsz18 black_txt ffamily_avenir">'.html_entity_decode($row['company_name']).'</span></a> </div>
																			 
															
													
													<div class="fleft wi_20    marl15 xs-mar0 padb10 hidden-xs"> <span class="trn" data-trn-key="Date">Date</span> <span class=" edit-text jain2 dblock   brdclr_lgtgrey2 fsz16">'.date('Y-m-d', strtotime($row['created_on'])).'</span> </div>
																			 
													 		
																		</div>
											
											
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
										 
																			</div>
												
											
								
								</div>   ';
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		function requestPendingDetailConnections($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select company_user_connection.id,company_name,last_name,first_name,email,company_user_connection.created_on from company_user_connection left join user_logins on user_logins.id=company_user_connection.user_id left join companies on companies.id=company_user_connection.company_id where company_user_connection.user_id=? and is_approved=0 order by company_user_connection.created_on desc limit 0,20");
			
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
			//print_r($org); die;
			return $org;
			
			
		}
		
		function requestRejectedDetailConnections($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select company_user_connection.id,company_name,last_name,first_name,email,company_user_connection.created_on from company_user_connection left join user_logins on user_logins.id=company_user_connection.user_id left join companies on companies.id=company_user_connection.company_id where company_user_connection.user_id=? and is_approved=2 limit 0,20");
			
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
			//print_r($org); die;
			return $org;
			
			
		}
		
		
		function moreRequestRejectedDetailConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select company_user_connection.id,company_name,last_name,first_name,email,company_user_connection.created_on from company_user_connection left join user_logins on user_logins.id=company_user_connection.user_id left join companies on companies.id=company_user_connection.company_id where company_user_connection.user_id=? and is_approved=2 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
								
												
											
											
											<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padb20 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
																			<div class="fleft wi_40 marl15 xxs-marl15 ">
																			 
																			<span class="trn fsz14 ffamily_avenir" >Company name</span> <span class=" edit-text jain1 dblock   brdclr_lgtgrey2 fsz18 black_txt ffamily_avenir">'.html_entity_decode($row['company_name']).'</span>  
																			</div>
																			 
															
													
													<div class="fleft wi_20    marl15 xs-mar0 padb10 hidden-xs"> <span class="trn" data-trn-key="Date">Date</span> <span class=" edit-text jain2 dblock   brdclr_lgtgrey2 fsz16">'.date('Y-m-d', strtotime($row['created_on'])).'</span> </div>
																			 
													<div class="fleft xxs-fright wi_20    marl15 xs-mar0 padb10 hidden-xs"> <span class="trn" data-trn-key="Status">Status</span> <span class=" edit-text jain2 dblock   brdclr_lgtgrey2 fsz16">Rejected</span> </div>		
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
		
		function moreRequestPendingDetailConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select company_user_connection.id,company_name,last_name,first_name,email,company_user_connection.created_on from company_user_connection left join user_logins on user_logins.id=company_user_connection.user_id left join companies on companies.id=company_user_connection.company_id where company_user_connection.user_id=? and is_approved=0 order by company_user_connection.created_on desc limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
								
												
											
											
											<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padb20 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
																			<div class="fleft wi_40 marl15 xxs-marl15 ">
																			 
																			<span class="trn fsz14 ffamily_avenir" >Company name</span> <span class=" edit-text jain1 dblock   brdclr_lgtgrey2 fsz18 black_txt ffamily_avenir">'.html_entity_decode($row['company_name']).'</span>  
																			</div>
																			 
															
													
													<div class="fleft wi_20    marl15 xs-mar0 padb10 hidden-xs"><a href="../PublicUserRequest/companyConnection/'.$enc.'"> <span class="trn" data-trn-key="Action">Action</span> <span class=" edit-text jain2 dblock   brdclr_lgtgrey2 fsz16">Förfrågan</span> </a></div>
													<div class="fright wi_10 padl0 xs-wi_20  marl15 fsz40  xxs-marr20 padb0">
																				<a href="rejectRequestConnections/'.$enc.'"><span class="far fa-times-circle  red_txt"></span></a>
																			</div>						 
													 <div class="fright wi_10 padl0 xs-wi_20  marl15 fsz40  xs-marl0 xxs-marr20  padb0 ">
														<a href="approveRequestConnections/'.$enc.'"><span class="fas fa-check-circle green_txt"></span></a>
													</div>		
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
		
		
		
		function requestPendingCountConnections($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from company_user_connection where company_user_connection.user_id=? and is_approved=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function requestApprovedCountConnections($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from company_user_connection where company_user_connection.user_id=? and is_approved=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function requestRejectedCountConnections($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from company_user_connection where company_user_connection.user_id=? and is_approved=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function approveRequestConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("update company_user_connection set is_approved=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		
		function rejectRequestConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("update company_user_connection set is_approved=2 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
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
				$org=$org.''.iconv("UTF-8", "ISO-8859-1//IGNORE",$row_edu['degree']).'</strong>@ '.iconv("UTF-8", "ISO-8859-1//IGNORE",$row_edu['school']).' 
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
				$expr=$expr.''.$title.'@'.$company_name.''.$start_month.' '.$row_exp['duration_start'].' - '.$worki.' | '.$location;
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
			
			if($row ['passport_image']!=null) { $filename="../estorecss/".$row['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a = base64_to_jpeg($value_a, '../estorecss/tmp'.$_POST['id'].'.jpg' ); } else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg"; } }  else $value_a="../../../html/usercontent/images/default-profile-pic.jpg";
			
			
			
			
			$r['status'] = 'ok';
			$r['message'] = [
			'job' => [
			'description' => 'We are looking for a very good web developer to do random tasks',
			'match' => '1 of 8 Best Match',
			'best_match' => 'Best match',
			],
			
			'user' => [
			'id' => 1,
			'name' => $row['name'],
			'avatar' => '../../'.$value_a,
			'description' => $row['ssn'],
			'location' => 'India',
			'time' => [
			'full' => '10:58 fm local time - 3 hrs behind',
			'short' => '10:58 fm',
			],
			'jobs' => '0',
			'hours' => '0',
			'rising_talent' => 'Rising talent',
			'skills' => [
			'inline' => ['PUBLISH DATE:']
			]
			],
			'sections' => [
			[
			'label' => 'Age',
			'content' => [
			'html' => $h.' was born '.$dt,
			'more' => '<p></p>',
			],
			],
			[
			'label' => 'Address',
			'content' => [
			'html' => $row['address'].', '.$row['zipcode'].', '.$row['city'].', '.$row['country'],
			'more' => '<p></p>',
			],
			],
			
			
			[
			'label' => 'Phone',
			'content' => [
			'html' => '+'.$row['country_code'].' '.$row['phone_number'],
			'more' => '<p></p>',
			],
			],
			
			[
			'label' => 'Professional',
			'content' => [
			'html' => $row['summary'],
			'more' => '<p></p>',
			],
			],
			[
			'label' => 'Experiecne',
			'content' => [
			'html' => $expr,
			'more' => '<p></p>',
			],
			],
			[
			'label' => 'Education',
			'content' => [
			'html' => $org,
			'more' => '<p></p>',
			],
			],
			
			
			[
			'label' => 'Skills',
			'content' => [
			'inline' => ['jQuery','HTML5','CSS3','PHP'],
			'inlne_more' => ['PSD to HTML','PSD to WordPress','WordPress']
			],
			'class' => 'dnone xxs-dblock'
			],[
			'tag' => 'overview',
			'label' => ' ',
			'content' => [
			'html' => '',
			
			],
			'class' => 'dnone xxs-dblock'
			]
			]
			];
			$r=json_encode($r);
			$r=str_replace('\"','"',$r);
			$r=str_replace('}"','}',$r);
			$r=str_replace('"{','{',$r);
			$r=str_replace(']"]',']',$r);
			$r=str_replace('["[','[',$r);
			//$r=str_replace('\u00','',$r);
			//print_r($r); die;
			exit($r);
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
			
			
			<div class="base"><div class="toggle_content dnone">undefined</div><a href="#" class="toggle-btn dblock bold blue_txt" data-toggle-id="base"><span class="padt5 dblock dnone_pa">more</span><span class="dnone dblock_pa">less</span></a></div></div></div><div class=" xxs-mart15 xxs-marrl10  bg_f dnone xxs-dblock"><h3 class="martrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10">Skills</h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz14"><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">jQuery</span><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">HTML5</span><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">CSS3</span><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">PHP</span></div></div><div class=" xxs-mart15 xxs-marrl10  bg_f dnone xxs-dblock"><h3 class="martrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10"> </h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz14"></div></div></div>
			<div class="wi_350p xxs-wi_100vw maxwi_90 xxs-maxwi_100vw pos_fix bot50p_new right30 bs_bb pad10 lgtgrey_bg"><div class="dflex talc bold"><div class="wi_50 padrl30 lgtgrey_bg"><a href="#" class="close_popup_modal wi_100 hei_40p dblock brdrad3 lgn_hight_40 txt_37a000">Close</a></div>
			<div class="wi_50 padrl30"><a href="#" class="wi_100 hei_40p dblock brdrad3 bg_37a000 lgn_hight_40 txt_f">Valid</a></div>
			</div></div>
			
			
			</div></div></div>
			</div>'; 
			
			return $output;
		}
		
		function profileInfoReceived($data)
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
			
			
			
			
			$output='<div class="crm-popup profile-popup wi_360p xxx-wi_100 maxwi_90 xxs-maxwi_100 hei_100vh-70p xxs-hei_100vh ovfl_auto dnone pos_fix zi99 top20p xxs-top0 right30 bs_bb bxsh_0220_01 xxs-bxsh_none brdradtl5 xxs-brdrad0 bg_f2 lgn_hight_s14 fsz13 xxs-fsz16 bxsh_0220_0_14_031-2_0_2_0150_0_12 bxsh_0_trans_0_trans_02150_0_3_ph opbxsh_0004_6f_sibc active" style="display: block;">
			<a href="#" class="close_popup_modal dblock xxs-dnone pos_abs top0 right0 padrl10 brdrad3 bg_f80 lgn_hight_40 bold txt_f " onclick="closePop();">Close</a>
			<div class="popup-content"><div><h2 class="xxs-dnone mar0 padrl20 padtb10 lgn_hight_20 fsz16 black_txt yellownew3_bg">Valid 24 hours</h2><div class="padb80 xxs-pad0 xxs-padb80" style="background-color:#fdfdfd;">
			<div class="xxs-mar0 xxs-pad0  xxs-bxsh_none yellownew_bg"><div class="dflex xxs-fxdir_col xxs-bxsh_016_577376_035"><div class="hei_125p dnone xxs-dblock padt20 bg_31932c"><div class="minwi_0 dflex alit_fs justc_sb marb20 padrl10 txt_f"><a href="#" class="close_popup_modal wi_70p fxshrink_0 dblock pad5"><img src="images/close-white.svg" width="18" height="18"></a><div class="minwi_0 flex_1 talc"><div class="ovfl_hid ws_now txtovfl_el fsz18">We are looking for a very good web developer to do random tasks</div><div class="fsz16">1 of 8 Best Match</div></div><div class="wi_70p fxshrink_0 dflex justc_fe fsz26"><a href="#" class="fa fa-thumbs-o-up marl10 txt_f"></a><a href="#" class="fa fa-thumbs-o-down marl10 txt_f"></a></div></div><div class="hei_20p diblock pos_rel padl10 bg_14bff5 uppercase lgn_hight_20 fsz15 txt_f"><span class="pos_abs top0 left100 brd brdwi_10 brdclr_14bff5 brdrclr_transi"></span>Best match</div></div><div class="xxs-wi_100 fxshrink_0 pos_rel xxs-mart-50  xxs-pad0 xxs-marb5 brd brdwi_5 brdclr_f"><img src="../../'.$value_a.'" width="333"  class="dblock marrla  dblock marrla " title="Sushil Jain" alt="Sushil Jain"></div>
			</div></div>
			<div class=" xxs-mart15 xxs-marrl10  bg_f"><h3 class="marrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10 black_txt">Name</h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz16 black_txt">'.$row['name'].'</div></div>
			<div class=" xxs-mart15 xxs-marrl10  bg_f"><h3 class="marrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10 black_txt">Social Security Number</h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz16 black_txt">'.$row['ssn'].'</div></div>
			<div class=" xxs-mart15 xxs-marrl10  bg_f"><h3 class="marrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10 black_txt">Age</h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz16 black_txt">'.$h.' was born '.$dt.'</div></div>
			<div class=" xxs-mart15 xxs-marrl10  bg_f"><h3 class="marrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10 black_txt">Address</h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz16 black_txt">'.$row['address'].', '.$row['zipcode'].', '.$row['city'].', '.$row['country'].'<div class="base"><div class="toggle_content dnone">undefined</div><a href="#" class="toggle-btn dblock nobold blue_txt" data-toggle-id="base"><span class="padt5 dblock dnone_pa">View map</span><span class="dnone dblock_pa">less</span></a></div></div></div>
			<div class=" xxs-mart15 xxs-marrl10  bg_f"><h3 class="marrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10 black_txt">Phone</h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz16 black_txt">+'.$row['country_code'].' '.$row['phone_number'].'</div></div>
			<div class=" xxs-mart15 xxs-marrl10  bg_f"><h3 class="martrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10 black_txt">Professional</h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 black_txt fsz16">
			
			
			
			
			'.$row['summary'].'
			
			<div class="base"><div class="toggle_content dnone">undefined</div><a href="#" class="toggle-btn dblock bold blue_txt" data-toggle-id="base"><span class="padt5 dblock dnone_pa">more</span><span class="dnone dblock_pa">less</span></a></div></div></div>
			<div class=" xxs-mart15 xxs-marrl10  bg_f"><h3 class="martrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10 black_txt">Experiecne</h3>
			<div class="padtb10 padrl20 xxs-pad15 xxs-padt0 black_txt fsz16"> '.$expr.'
			
			
			<div class="base"><div class="toggle_content dnone">undefined</div><a href="#" class="toggle-btn dblock bold blue_txt" data-toggle-id="base"><span class="padt5 dblock dnone_pa">more</span><span class="dnone dblock_pa">less</span></a></div></div></div>
			<div class=" xxs-mart15 xxs-marrl10  bg_f"><h3 class="martrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10 black_txt">Education</h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 black_txt fsz16">'.$org.'
			
			
			<div class="base"><div class="toggle_content dnone">undefined</div><a href="#" class="toggle-btn dblock bold blue_txt" data-toggle-id="base"><span class="padt5 dblock dnone_pa">more</span><span class="dnone dblock_pa">less</span></a></div></div></div><div class=" xxs-mart15 xxs-marrl10  bg_f dnone xxs-dblock"><h3 class="martrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10">Skills</h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz14"><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">jQuery</span><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">HTML5</span><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">CSS3</span><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">PHP</span></div></div><div class=" xxs-mart15 xxs-marrl10  bg_f dnone xxs-dblock"><h3 class="martrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10"> </h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz14"></div></div></div><div class="wi_350p xxs-wi_100vw maxwi_90 xxs-maxwi_100vw pos_fix bot50p_new right30 bs_bb pad10 lgtgrey_bg">
			<div class="dflex talc bold"><div class="wi_50 padrl30 lgtgrey_bg"><a href="#" class="wi_100 hei_40p dblock brdrad3 lgn_hight_40 txt_37a000">Reject</a></div>
			<div class="wi_50 padrl30"><a href="updateAccount/'.$_POST['aid'].'" class="wi_100 hei_40p dblock brdrad3 bg_37a000 lgn_hight_40 txt_f">Approve</a></div>
			</div></div></div></div>
			</div>'; 
			
			return $output;
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
		
		function senderUserDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id=$this -> encrypt_decrypt('decrypt',$data['request_id']);
			$stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,first_name,last_name,email,passport_image,sex,dob_day,dob_month,dob_year,ssn from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id=(select request_sender from user_detail_requests where id=?)");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_sender = $result->fetch_assoc();
			if($row_sender['sex']==1)
			{
				
				$sex='Male';
			}
			else if($row_sender['sex']==2)
			{
				
				$sex='Female';
			}
			else
			{
				$sex='Transgender';
			}
			$general='<div class="result-item padtb0  lgtgrey2_bg">
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
			<ul class="mar0 pad0  fsz14">
			<li class="dflex mart10  padb5">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#">Social Security Number</a>
			</div>
			<span class="fxshrink_0 marl120">'.$row_sender['ssn'].'</span>
			</li>
			<li class="dflex mart10  padb5">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#">Name</a>
			</div>
			<span class="fxshrink_0 marl100">'.$row_sender['name'].'</span>
			</li>
			<li class="dflex mart10  padb5 tall">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#">Last name</a>
			</div>
			<span class="fxshrink_0 marl100">'.$row_sender['last_name'].'</span>
			</li>
			<li class="dflex mart10  padb5 tall">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#">Date of birth</a>
			</div>
			<span class="fxshrink_0 marl100">'.$row_sender['dob_day'].'/'.$row_sender['dob_month'].'/'.$row_sender['dob_year'].'</span>
			</li>
			<li class="dflex mart10 tall">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#">Sex</a>
			</div>
			<span class="fxshrink_0 marl100">'.$sex.'</span>
			</li>
			</ul>
			</div>
			</div>';
			
			
			
			$org='<div class="padb0 ">
			<h2 class="tall marb5 pad0 bold fsz24 black_txt"> Ge ditt samtycke</h2>
			<div class="wi_100 dflex fxwrap_w marrla marb10 tall">
			
			
			
			<div class="wi_100 marb10 tall">
			
			<span class="valm fsz16">Här kan du ge ditt samtycke till personen nedan att ta del av dina uppgifter med ditt godkännande.</span>
			</div>
			
			
			</div>
			</div>
			
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10 lgtgrey2_bg brdrad3">
			<div class="padtb0 brdrad3 lgtgrey2_bg">
			
			<div class="mart0" id="search_data">
			'.$general.'
			
			
			
			</div>
			
			</div>
			
			</div>
			
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla mart10"> <a href="updateAccount/'.$data['request_id'].'" class="wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2" >Signera med Mobilt BankId</a> 
			
			</div>
			';
			
			
			
			return $org;
		}
		
		
		
		
		
		
		function updateAccount($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id=$this -> encrypt_decrypt('decrypt',$data['request_id']);
			
			$stmt = $dbCon->prepare("select id  from user_detail_requests where request_sender=(select request_sender from user_detail_requests where id=?) and request_receiver=(select request_receiver from user_detail_requests where id=?) and `status`=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $request_id,$request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_select = $result->fetch_assoc();
			$stmt = $dbCon->prepare("update user_detail_requests set `status`=4  where id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row_select['id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update user_detail_requests set `status`=1  where id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			if($stmt->execute())
			{
				$stmt = $dbCon->prepare("select first_name,last_name,email  from user_logins where id=(select request_sender from user_detail_requests where id=?)");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $request_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_sender = $result->fetch_assoc();
				
				$to      = $row_sender['email'];
				$subject = "Qloudid : Update on data access request";
				
				$emailContent ='There is an update on your request to access user data.';
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
		
		
		
		
		function userLanguageDetail($data)
		{
			
			$dbCon = AppModel::createConnection();
			//print_r($data); die;
			$stmt = $dbCon->prepare("select language_id from user_personal_language where user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
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
				return $row['language_id'];
			}
			
		}
		
		
		
		function updateUserLanguage($data)
		{
			
			$dbCon = AppModel::createConnection();
			//print_r($data); die;
			$stmt = $dbCon->prepare("select language_id from user_personal_language where user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$stmt = $dbCon->prepare("insert into user_personal_language(user_login_id,language_id,created_on) values (?, ?, now())");
				
				/* bind parameters for markers */
				$stmt->bind_param("ii", $data['user_id'],$_POST['id']);
				$stmt->execute();
				
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			else
			{
				$stmt = $dbCon->prepare("update user_personal_language set language_id=? where user_login_id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("ii",$_POST['id'], $data['user_id']);
				$stmt->execute();
				
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
		}
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select id,first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image,grading_status,get_started_wizard_status from user_logins where id = ?");
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
		
		function userRequests($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select id from employee_request_cloud  where user_login_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				
				$stmt = $dbCon->prepare("select id from employees  where user_login_id=?");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("i", $data['user_id']);
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
					return 1; 
				}
				
			}
			else
			
			{
				$stmt->close();
				$dbCon->close();
				return 1; 
			}
			
			
			
		}
		
		function searchUserDetail($data)
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
						
						$stmt = $dbCon->prepare("select id,credits_left  from request_credits where user_id=?");
						
						/* bind parameters for markers */
						$stmt->bind_param("i", $data[user_id]);
						$stmt->execute();
						$result = $stmt->get_result();
						
						$row = $result->fetch_assoc();
						
						$update=$row['credits_left']-1;
						
						$stmt = $dbCon->prepare("update request_credits set credits_left=?  where id=?");
						
						/* bind parameters for markers */
						$stmt->bind_param("ii", $update,$row['id']);
						$stmt->execute();
						
						$to      = $row_request['email'];
						$subject = "Qloudid : Request to access your details";
						
						$emailContent =$row_user['first_name'].' '.$row_user['last_name'].' has requested to access your personal data. Click <a href="https://www.qloudid.com/user/index.php/PublicUserRequest/requestAccount/'.$enc.'">here</a> to take action </br> If above link does not work, please copy the following link in your browser. </br>https://www.qloudid.com/user/index.php/PublicUserRequest/requestAccount/'.$enc.'';
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
					$user_id= 0;
					
					
					$d=date('Y-m-d h:i:s');
					$stmt = $dbCon->prepare("insert into user_detail_requests(code_type,request_sender,request_receiver,created_on,user_email) values(?, ?, ?, ?, ?)");
					$st=2;
					/* bind parameters for markers */
					//echo $data['user_id']." ".$row['user_id']." ".$d;
					$stmt->bind_param("iiiss", $st,$data['user_id'],$user_id,$d,$_POST['email_id']);
					$stmt->execute();
					$rsultId=$stmt->insert_id;
					//echo $rsultId; die;
					$enc=$this -> encrypt_decrypt('encrypt',$rsultId);
					
					$stmt = $dbCon->prepare("select id,credits_left  from request_credits where user_id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $data[user_id]);
					$stmt->execute();
					$result = $stmt->get_result();
					
					$row = $result->fetch_assoc();
					
					$update=$row['credits_left']-1;
					
					$stmt = $dbCon->prepare("update request_credits set credits_left=?  where id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("ii", $update,$row['id']);
					$stmt->execute();
					
					
					
					$to      = $_POST['email_id'];
					$subject = "Qloudid : Request to access your details";
					
					$emailContent =$row_user['first_name'].' '.$row_user['last_name'].' has requested to access your personal data. Click <a href="https://www.qloudid.com/user/index.php/UserRequestUnregistered/connectAccount/'.$enc.'">here</a> to take action </br> If above link does not work, please copy the following link in your browser. </br> https://www.qloudid.com/user/index.php/UserRequestUnregistered/connectAccount/'.$enc.'';
					sendEmail($subject, $to, $emailContent);
					
					$stmt->close();
					$dbCon->close();
					return 1;
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
					
					$stmt = $dbCon->prepare("select id,credits_left  from request_credits where user_id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $data[user_id]);
					$stmt->execute();
					$result = $stmt->get_result();
					
					$row = $result->fetch_assoc();
					
					$update=$row['credits_left']-1;
					
					$stmt = $dbCon->prepare("update request_credits set credits_left=?  where id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("ii", $update,$row['id']);
					$stmt->execute();
					
					
					
					$to      = $_POST['email_id'];
					$subject = "Qloudid : Request to access your details";
					
					$emailContent =$row_user['first_name'].' '.$row_user['last_name'].' has requested to access your personal data. Click <a href="https://www.qloudid.com/user/index.php/PublicUserRequest/requestAccount/'.$enc.'">here</a> to take action </br> If above link does not work, please copy the following link in your browser. </br>https://www.qloudid.com/user/index.php/PublicUserRequest/requestAccount/'.$enc.'';
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
					$user_id= 0;
					
					$d=date('Y-m-d h:i:s');
					$stmt = $dbCon->prepare("insert into user_detail_requests(code_type,request_sender,request_receiver,created_on,country_user,phone_user) values(?, ?, ?, ?, ?,?)");
					$st=1;
					/* bind parameters for markers */
					//echo $data['user_id']." ".$row['user_id']." ".$d;
					$stmt->bind_param("iiisss", $st,$data['user_id'],$user_id,$d,$_POST['countryname'],$_POST['phoneno']);
					$stmt->execute();
					$rsultId=$stmt->insert_id;
					//echo $rsultId; die;
					$enc=$this -> encrypt_decrypt('encrypt',$rsultId);
					
					$stmt = $dbCon->prepare("select id,credits_left  from request_credits where user_id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $data['user_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					
					$row = $result->fetch_assoc();
					
					$update=$row['credits_left']-1;
					
					$stmt = $dbCon->prepare("update request_credits set credits_left=?  where id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("ii", $update,$row['id']);
					$stmt->execute();
					
					$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("s", $_POST['countryname']);
					$stmt->execute();
					$result_phone = $stmt->get_result();
					$row_phone = $result_phone->fetch_assoc();
					$url="https://www.qloudid.com/public/index.php/UserRequestUnregistered/connectAccount/".$enc;
					$surl=getShortUrl($url);
					$phone='+'.trim($row_phone['country_code']).''.trim($_POST['phoneno']);
					$subject='Informationen om din vän/anhörig';
					$to=$phone;
					$html='Du har blivit ombedd att identifiera dig. Qloud ID '.$surl;
					//echo $html.' '.$to;
					$res=sendSms($subject, $to, $html);
					$stmt->close();
					$dbCon->close();
					return 1;
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
					
					$stmt = $dbCon->prepare("select id,credits_left  from request_credits where user_id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $data['user_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					
					$row = $result->fetch_assoc();
					
					$update=$row['credits_left']-1;
					
					$stmt = $dbCon->prepare("update request_credits set credits_left=?  where id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("ii", $update,$row['id']);
					$stmt->execute();
					
					$to      = $row_request['email'];
					$subject = "Qloudid : Request to access your details";
					
					$emailContent =$row_user['first_name'].' '.$row_user['last_name'].' has requested to access your personal data. Click <a href="https://www.qloudid.com/user/index.php/PublicUserRequest/requestAccount/'.$enc.'">here</a> to take action </br> If above link does not work, please copy the following link in your browser. </br>https://www.qloudid.com/user/index.php/PublicUserRequest/requestAccount/'.$enc;
					sendEmail($subject, $to, $emailContent);
					
					$stmt = $dbCon->prepare("select country_code,phone_number  from user_profiles left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where user_profiles.user_logins_id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $row_request['id']);
					$stmt->execute();
					$result_phone = $stmt->get_result();
					$row_phone = $result_phone->fetch_assoc();
					$url="https://www.qloudid.com/user/index.php/PublicUserRequest/requestAccount/".$enc;
					$surl=getShortUrl($url);
					$phone='+'.trim($row_phone['country_code']).''.trim($row_phone['phone_number']);
					$subject='Informationen om din vän/anhörig';
					$to=$phone;
					$html='Du har blivit ombedd att identifiera dig. Qloud ID '.$surl;
					//echo $html.' '.$to;
					$res=sendSms($subject, $to, $html);
					$stmt->close();
					$dbCon->close();
					return 1;
					
				}
			}
			
		}
		
		
		function requestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from user_detail_requests where (request_sender=? or request_receiver=?) and `status`=1 limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['user_id'],$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				//print_r($row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				if($row['request_receiver']==$data['user_id'])
				{
					
					$org[$j]['code_type']=2;
					$stmt = $dbCon->prepare("select email from user_logins where id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['request_sender']);
					$stmt->execute();
					$result_c = $stmt->get_result();
					$row_c = $result_c->fetch_assoc();
					$org[$j]['user_email']=$row_c['email'];
				}
				if($row['code_type']==1)
				{
					$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("s", $row['country_user']);
					$stmt->execute();
					$result_c = $stmt->get_result();
					$row_c = $result_c->fetch_assoc();
					$org[$j]['country_code']= $row_c['country_code'];
				}
				$j++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		function requestPendingDetail($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from user_detail_requests where request_sender=? and `status`=0 limit 0,20");
			
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
				if($row['code_type']==1)
				{
					$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("s", $row['country_user']);
					$stmt->execute();
					$result_c = $stmt->get_result();
					$row_c = $result_c->fetch_assoc();
					$org[$j]['country_code']= $row_c['country_code'];
				}
				
				$j++;
			}
			
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		
		function moreRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select * from user_detail_requests where (request_sender=? or request_receiver=?) and `status`=1 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiii",  $data['user_id'],$data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$rid=$row['request_receiver'];
				if($row['request_receiver']==$data['user_id'])
				{
					$rid=$row['request_sender'];
					$row['code_type']=2;
					$stmt = $dbCon->prepare("select email from user_logins where id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['request_sender']);
					$stmt->execute();
					$result_c = $stmt->get_result();
					$row_c = $result_c->fetch_assoc();
					$row['user_email']=$row_c['email'];
				}
				
				if($row['code_type']==2) 
				{ 
					$code=$row['user_email'];
					$cd='Email';
				} 
				
				else if($row['code_type']==1)
				{
					$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("s", $row['country_user']);
					$stmt->execute();
					$result_c = $stmt->get_result();
					$row_c = $result_c->fetch_assoc();
					$code= '+'.$row_c['country_code'].''.$row['phone_user'];
					$cd='Phone';
				}
				else  
				{
					$code=$row['user_code']; 
					$cd='Code';
				}
				
				
				
				
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
								
												
											
											
											<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padb20 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
																			<div class="fleft wi_40 marl15 xxs-marl15 ">
																			<a href="#" class="show_popup_modal black_txt" data-id="'.$rid.'" onclick="showUserDetail('.$rid.',this);">
																			<span class="trn fsz14 ffamily_avenir" >'.$cd.'</span> <span class=" edit-text jain1 dblock   brdclr_lgtgrey2 fsz18 black_txt ffamily_avenir">'.$code.'</span> </a>
																			</div>
																			 
															
													
													<div class="fleft wi_20    marl15 xs-mar0 padb10 hidden-xs"> <span class="trn" data-trn-key="Date">Date</span> <span class=" edit-text jain2 dblock   brdclr_lgtgrey2 fsz16">'.date('Y-m-d',strtotime($row['created_on'])).'</span> </div>
																			 
													<div class="fleft xxs-fright wi_20    marl15 xs-mar0 padb10 hidden-xs"> <span class="trn" data-trn-key="Status">Status</span> <span class=" edit-text jain2 dblock   brdclr_lgtgrey2 fsz16">Ansluten</span> </div>		
																		</div>
											
											
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
										 
																			</div>
												
											
								
								</div> ';
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		function moreRequestPendingDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select * from user_detail_requests where request_sender=? and `status`=0 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				if($row['code_type']==2) 
				{ 
					$code=$row['user_email'];
					$cd='Email';
				} 
				else if($row['code_type']==1)
				{
					$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("s", $row['country_user']);
					$stmt->execute();
					$result_c = $stmt->get_result();
					$row_c = $result_c->fetch_assoc();
					$code= '+'.$row_c['country_code'].''.$row['phone_user'];
					$cd='Phone';
				}
				else  
				{
					$code=$row['user_code']; 
					$cd='Code';
				}
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
								
												
											
											
											<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padb20 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
																			<div class="fleft wi_40 marl15 xxs-marl15 ">
																			 
																			<span class="trn fsz14 ffamily_avenir" >'.$cd.'</span> <span class=" edit-text jain1 dblock   brdclr_lgtgrey2 fsz18 black_txt ffamily_avenir">'.$code.'</span>  
																			</div>
																			 
															
													
													<div class="fleft wi_20    marl15 xs-mar0 padb10 hidden-xs"> <span class="trn" data-trn-key="Date">Date</span> <span class=" edit-text jain2 dblock   brdclr_lgtgrey2 fsz16">'.date('Y-m-d',strtotime($row['created_on'])).'</span> </div>
																			 
													<div class="fleft xxs-fright wi_20    marl15 xs-mar0 padb10 hidden-xs"> <span class="trn" data-trn-key="Status">Status</span> <span class=" edit-text jain2 dblock   brdclr_lgtgrey2 fsz16">Pending</span> </div>		
																		</div>
											
											
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
										 
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
		
		function requestPendingCount($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from user_detail_requests where request_sender=? and `status`=0");
			
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
		
		function requestApprovedCount($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from user_detail_requests where (request_sender=? or request_receiver=?) and `status`=1");
			
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
		
		
		function requestTotalSentCount($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from user_detail_requests where request_sender=?");
			
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
		
		
		function requestDetailReceived($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select user_detail_requests.id,user_detail_requests.created_on,concat_ws(' ', first_name, last_name) as name from user_detail_requests left join user_logins on user_logins.id=user_detail_requests.request_sender where request_receiver=? and `status`=1 limit 0,20");
			
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
		
		
		
		function requestPendingDetailReceived($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select request_sender as uid,user_detail_requests.id,user_detail_requests.created_on,concat_ws(' ', first_name, last_name) as name from user_detail_requests left join user_logins on user_logins.id=user_detail_requests.request_sender where request_receiver=? and `status`=0 limit 0,20");
			
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
			//print_r($org); die;
			return $org;
			
			
		}
		
		
		function moreRequestDetailReceived($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select user_detail_requests.id,user_detail_requests.created_on,concat_ws(' ', first_name, last_name) as name from user_detail_requests left join user_logins on user_logins.id=user_detail_requests.request_sender where request_receiver=? and `status`=1 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['name'].'</div>
				</td>
				
				<td class="pad5 brdb_new hidden-xs tall cd">
				<div class="padtb5 ">'.$row['created_on'].'</div>
				</td>
				
				
				</tr>';
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		function moreRequestPendingDetailReceived($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*20;
			$b=$a+20;
			
			$stmt = $dbCon->prepare("select request_sender as uid,user_detail_requests.id,user_detail_requests.created_on,concat_ws(' ', first_name, last_name) as name from user_detail_requests left join user_logins on user_logins.id=user_detail_requests.request_sender where request_receiver=? and `status`=0 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$enc=$this -> encrypt_decrypt('encrypt',$row['id']);
				$enc1="'".$enc."'";
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
								
												
											
											
											<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padb20 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
																			<div class="fleft wi_40 marl15 xxs-marl15 ">
																			 
																			<a href="#" class="show_popup_modal black_txt"  onclick="showUserDetailReceived('.$row['uid'].',this,'.$enc1.');"><span class="trn fsz14 ffamily_avenir" >Name</span> <span class=" edit-text jain1 dblock   brdclr_lgtgrey2 fsz18 black_txt ffamily_avenir">'.$row['name'].'</span> </a> 
																			</div>
																			 
															
													
													<div class="fleft wi_20    marl15 xs-mar0 padb10 hidden-xs"><a href="../PublicUserRequest/requestAccount/'.$enc.'"> <span class="trn" data-trn-key="Action">Action</span> <span class=" edit-text jain2 dblock   brdclr_lgtgrey2 fsz16">Förfrågan</span> </a></div>
													
													<div class="fright wi_10 padl0 xs-wi_20  marl15 fsz40  xxs-marr20 padb0">
																				<a href="#" class="trn show_popup_modal"   data-target="#gratis_popup_company_searched"><span class="far fa-times-circle  red_txt"></span></a>
																			</div>						 
													 <div class="fright wi_10 padl0 xs-wi_20  marl15 fsz40  xs-marl0 xxs-marr20  padb0 ">
													<a href="#" class="trn show_popup_modal" data-trn-key="Approve" onclick="submit_value('.$enc1.');" data-target="#gratis_popup_company_searched">	 <span class="fas fa-check-circle green_txt"></span></a>
													</div>		
																		</div>
											
											
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
										 
																			</div>
												
											
								
								</div>
								
								
								<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " ><a href="#" class="show_popup_modal black_txt"  onclick="showUserDetailReceived('.$row['uid'].',this,'.$enc1.');">'.$row['name'].'</a></div>
				</td>
				
				<td class="pad5 brdb_new hidden-xs tall cd">
				<div class="padtb5 ">'.$row['created_on'].'</div>
				</td>
				<td class="pad5 brdb_new hidden-xs tall cd">
				<div class="padtb5 "><a href="../PublicUserRequest/requestAccount/'.$enc.'">Förfrågan</a></div>
				</td>
				<td class="pad5 brdb_new tall sts">
				<div class="padtb5"><a href="../VerifyUserRequest/requestAccount/'.$enc.'">Approve</a></div>
				</td>
				<td class="pad5 brdb_new tall sts">
				<div class="padtb5">Reject</div>
				</td>
				</tr>';
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		function requestPendingCountReceived($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from user_detail_requests where request_receiver=? and `status`=0");
			
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
		
		function requestApprovedCountReceived($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from user_detail_requests where request_receiver=? and `status`=1");
			
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
		
		function userAccountReceived($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select grading_status,id,first_name,last_name,sex,dob_day,dob_month,dob_year,created_on,passport_image  from user_logins where id=(select request_sender from user_detail_requests where id=(select max(id) from user_detail_requests where request_receiver=? and status=0))");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		function approveReceived($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select max(id) as id from user_detail_requests where request_receiver=? and status=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			if(!empty($row))
			{
				return $this -> encrypt_decrypt('encrypt',$row['id']);
			}	
			else
			{
				return $this -> encrypt_decrypt('encrypt',0);
			}
			
		}
		
		function employeeAccountReceived($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select ssn,address from user_profiles  where user_logins_id=(select request_sender from user_detail_requests where id=(select max(id) from user_detail_requests where request_receiver=? and status=0))");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$stmt = $dbCon->prepare("select request_sender from user_detail_requests where id=(select max(id) from user_detail_requests where request_receiver=? and status=0)");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				
				$row_user = $result->fetch_assoc();
				$stmt = $dbCon->prepare("INSERT INTO user_profiles (user_logins_id, created_on , modified_on ) VALUES (?, now(), now())");
				
				
				$stmt->bind_param("i", $row_user['request_sender']);
				$stmt->execute();
			}
			$stmt = $dbCon->prepare("select ssn,address,country,city,zipcode,phone_number,clearing_number,bank_account_number,language,country_phone from user_profiles  where user_logins_id=(select request_sender from user_detail_requests where id=(select max(id) from user_detail_requests where request_receiver=? and status=0))");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
	}
