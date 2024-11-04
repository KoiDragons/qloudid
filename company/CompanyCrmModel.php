<?php
	require_once('../AppModel.php');
	class CompanyCrmModel extends AppModel
	{
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
			
			function unsentRequestCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(estore_employee_uninvited.id) as num from estore_employee_uninvited where company_id=? and is_relieved=0 limit 0,5");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			 
			return $row;
			
			
		}
		
		function unsentRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select estore_employee_uninvited.id,company_name,estore_employee_uninvited.last_name, first_name,email from estore_employee_uninvited left join companies on companies.id=estore_employee_uninvited.company_id where company_id=? and is_relieved=0");
			
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
		
		
		
		
		
		
		function moreUnsentRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*5;
			$b=5;
			
			$stmt = $dbCon->prepare("select estore_employee_uninvited.id,company_name,estore_employee_uninvited.last_name, first_name,email from estore_employee_uninvited left join companies on companies.id=estore_employee_uninvited.company_id where company_id=? and is_relieved=0 limit ?,?");
			
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
				$org=$org.'<a href="#">	<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"> '.substr($row['first_name'],0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">Sent employee request</span>
																	
																	 <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['first_name']).' '.html_entity_decode($row['last_name']),0,18).' </span>  
																	</div>
																	
																	
																		<div class="fright wi_10 padl0    fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
													</div>	 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div> </a>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
			function unsentRequestRelievedCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(estore_employee_uninvited.id) as num  from estore_employee_uninvited where company_id=? and is_relieved=1 limit 0,5");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			 
			return $row;
			
			
		}
		
		function unsentRequestRelievedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select estore_employee_uninvited.id,company_name,estore_employee_uninvited.last_name, first_name,email from estore_employee_uninvited left join companies on companies.id=estore_employee_uninvited.company_id where company_id=? and is_relieved=1");
			
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
		
		
		function moreUnsentRequestRelievedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*5;
			$b=5;
			
			$stmt = $dbCon->prepare("select estore_employee_uninvited.id,company_name,estore_employee_uninvited.last_name, first_name,email from estore_employee_uninvited left join companies on companies.id=estore_employee_uninvited.company_id where company_id=? and is_relieved=1 limit ?,?");
			
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
				$org=$org.'<a href="#">	<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"> '.substr($row['first_name'],0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">Sent employee request</span>
																	
																	 <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['first_name']).' '.html_entity_decode($row['last_name']),0,18).' </span>  
																	</div>
																	
																	
																		<div class="fright wi_10 padl0    fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
													</div>	 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div> </a>';
				
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
			$stmt = $dbCon->prepare("select estore_employee_invite.id,company_name,estore_employee_invite.last_name,estore_employee_invite.name as first_name,email from estore_employee_invite left join companies on companies.id=estore_employee_invite.company_id where company_id=? and real_employee_id is null and is_relieved=0");
			
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
		
		function urlDetail($data)
		{
			 
			return $this -> encrypt_decrypt('encrypt',$data['REQUEST_URI']); 
			 
			 
		}
		
		function invitedEmployeeRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from invite_app_employee where company_id=? and new_email_id is null");
			
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
		
		function moreSentRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*5;
			$b=5;
			
			$stmt = $dbCon->prepare("select estore_employee_invite.id,company_name,estore_employee_invite.last_name,estore_employee_invite.name as first_name,email from estore_employee_invite left join companies on companies.id=estore_employee_invite.company_id where company_id=? and real_employee_id is null and is_relieved=0 limit ?,?");
			
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
				$org=$org.'<a href="../../EmployeeDetail/sentAccount/'.$data['cid'].'/'.$org1.'">
				<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"> '.substr($row['first_name'],0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">Sent employee request</span>
																	
																	 <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['first_name']).' '.html_entity_decode($row['last_name']),0,18).' </span>  
																	</div>
																	
																	
																		<div class="fright wi_10 padl0    fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
													</div>	 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div> </a>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function sentRequestRelievedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select estore_employee_invite.id,company_name,estore_employee_invite.last_name,estore_employee_invite.name as first_name,email from estore_employee_invite left join companies on companies.id=estore_employee_invite.company_id where company_id=? and real_employee_id is null and is_relieved=1");
			
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
		
		function moreSentRequestRelievedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*5;
			$b=5;
			
			$stmt = $dbCon->prepare("select estore_employee_invite.id,company_name,estore_employee_invite.last_name,estore_employee_invite.name as first_name,email from estore_employee_invite left join companies on companies.id=estore_employee_invite.company_id where company_id=? and real_employee_id is null and is_relieved=1 limit ?,?");
			
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
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"> '.substr($row['first_name'],0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">Sent employee request</span>
																	
																	 <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['first_name']).' '.html_entity_decode($row['last_name']),0,18).' </span>  
																	</div>
																	
																	
																		<div class="fright wi_10 padl0    fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
													</div>	 
																			 
													 
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
			return $org;
			
			
		}
		
		 
		
		 
		function moreApprovedDetailLocation($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select passport_image,employee_id,manage_employee_permissions.id,company_name,last_name,concat_ws(' ', first_name, last_name) as name,first_name,email,manage_employee_permissions.user_id from manage_employee_permissions left join user_logins on user_logins.id=manage_employee_permissions.user_id left join companies on companies.id=manage_employee_permissions.company_id where company_id=?   limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
						
			while($row = $result->fetch_assoc())
			{
				 
				 if($row['passport_image']!=null || $row['passport_image']!="") { 
						 
						 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; }
						 
						$img='<div class="wi_50p  hei_50p "><img src="../../../'.$imgs.'" width="50px;" height="50px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div> ';
																	
																	 } else { $img='<div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"> '.substr($row['first_name'],0,1).'</div>
																	  
																	 '; 
																	 
																	 $imgs="../html/usercontent/images/person-male.png";
																	 }
				$org=$org.' <div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		 
																	
																	<div class="fleft wi_50p marr15 hidden-xs"> 
																	
																	 '.$img.'</div>
																	
																	<div class="fleft wi_60   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">Employee</span>
																	
																	<a href="../../EmployeeDetail/employeeAccount/'.$data['cid'].'/'.$this -> encrypt_decrypt('encrypt',$row['employee_id']).'" class="black_txt"  > <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['first_name']).' '.html_entity_decode($row['last_name']),0,18).'</span>  </a>
																	</div>
																	
																	
																		 
																	<a href="../../EmployeeDetail/employeeAccount/'.$data['cid'].'/'.$this -> encrypt_decrypt('encrypt',$row['employee_id']).'" class="black_txt"  >		<div class="fright wi_10 padl0    fsz40  padb0  ">
														 <span class="fas fa-arrow-alt-circle-right grey_txt"></span> 
													</div>	 </a>	

														 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div> ';
				
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
	 	function base64_to_jpeg($base64_string, $output_file) {
				
				$ifp = fopen( $output_file, 'wb' ); 
				
				
				$data = explode( ',', $base64_string );
				 
				fwrite( $ifp, base64_decode( $data[1] ) );
				
				
				fclose( $ifp ); 
				
				return $output_file; 
			}
		 function approveDetailLocationCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num   from employees   where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		
		function approveDetailLocation($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select distinct employee_id ,passport_image,manage_employee_permissions.id,company_name,concat_ws(' ', first_name, last_name) as name,last_name,first_name,email,manage_employee_permissions.user_id from manage_employee_permissions left join user_logins on user_logins.id=manage_employee_permissions.user_id left join companies on companies.id=manage_employee_permissions.company_id where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			
			
			 $stmt = $dbCon->prepare("select country_code,company_permission,h_date,res_date,title,phone,mobile,email,c_id,d_country,department,e_number,card_id  from user_company_profile left join phone_country_code on phone_country_code.country_name=user_company_profile.d_country where company_id=? and user_login_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$row['user_id']);
			$stmt->execute();
			$resultEmp = $stmt->get_result();
		   
			$rowEmp = $resultEmp->fetch_assoc();
			
			$row['work_email']=$rowEmp['email']; 
			$row['wmobile']=$rowEmp['mobile']; 
			$row['mobile']='+'.$rowEmp['country_code'].''.$rowEmp['mobile']; 
			
			
			
			$stmt = $dbCon->prepare("select location_id from employee_location where employee_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['employee_id']);
			$stmt->execute();
			$result2 = $stmt->get_result();
			$rowEmpLoca = $result2->fetch_assoc();
			if(empty($rowEmpLoca))
			{
				$row['location_verified']=0;
			}
			else
			{
				$row['location_verified']=1;
			}
				if($row['passport_image']!=null || $row['passport_image']!="") { 
						 
						 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/notavailable.jpg"; }
						 
							$img='<div class="card__preview" style="width: 161px;padding: 30px;"><img srcset="../../../'.$imgs.'" src="../../../'.$imgs.'" alt="London - Kings Cross" style="
												padding: 20px;
												border-radius: 30px;
											">
											 
											</div>';
											
											$img='../../../'.$imgs;
							
							//$img='../../../'.$imgs;
																	
																	 } else { $img='<div class="card__preview" style="width: 161px;padding: 30px;"><img srcset="https://qloudid.com/html/usercontent/images/notavailable.jpg" src="https://qloudid.com/html/usercontent/images/notavailable.jpg" alt="London - Kings Cross" style="
																					padding: 20px;
																					border-radius: 30px;
																				">
																				 
																				</div>'; 
																	 
																	$img="https://qloudid.com/html/usercontent/images/notavailable.jpg";
																	 }
				array_push($org,$row);
				$stmt = $dbCon->prepare("select count(id) as num from employee_identificator_verification_detail where employee_user_id=(select user_login_id from employees where id=?)");
				$stmt->bind_param("i", $row['employee_id']);
				$stmt->execute();
				$resultEmp = $stmt->get_result();
				$rowEmp = $resultEmp->fetch_assoc();
				$org[$j]['verify_emp']=$rowEmp['num'];
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org[$j]['uid']= $this -> encrypt_decrypt('encrypt',$row['user_id']);
				$org[$j]['employee_id']= $this -> encrypt_decrypt('encrypt',$row['employee_id']);
				$org[$j]['img']=$img;
				$j++;
				
			}
			//print_r($org); 
			//die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function developerCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select is_approved from company_idverification_account_request where company_id=?");
			$stmt->bind_param("i", $company_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return -1;	
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return $row['is_approved'];	
			}
			
			
		}
		
		function employeeID($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id from employees where company_id=? and user_login_id=43");
			$stmt->bind_param("i", $company_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $this->encrypt_decrypt('encrypt',$row['id']);	
			 
			
			
		}
		function validateVerificator($data)
		{
			$dbCon = AppModel::createConnection();
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("update employees set is_verificator=1 where id=?");
			$stmt->bind_param("i", $employee_id);
			/* bind parameters for markers */
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		function removeVerificator($data)
		{
			$dbCon = AppModel::createConnection();
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("update employees set is_verificator=0 where id=?");
			$stmt->bind_param("i", $employee_id);
			/* bind parameters for markers */
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		
		function employeeVerifiedList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select employees.id,concat_ws(' ',user_logins.first_name,user_logins.last_name) as name,user_logins.first_name,passport_image,is_verificator from employees left join user_logins on employees.user_login_id=user_logins.id where company_id=?   limit  0,5");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				if($row['passport_image']!=null || $row['passport_image']!="") { 
						 
						 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; }
						 
							$img='
																	<div class="wi_50p xs-wi_100 hei_50p xs-hei_45p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 yellow_bg_a" ><img src="../../../'.$imgs.'" width="45px;" height="45px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div>';
																	
																	 } else { $img='<div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"> '.substr($row['first_name'],0,1).'</div>
																	 
																	 '; 
																	 
																	 $imgs="../html/usercontent/images/person-male.png";
																	 }
				array_push($org,$row);
				
				$org[$j]['employee_id']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org[$j]['img']=$img;
				$j++;
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
			function employeeVerifiedListCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(employees.id) as num  from employees  where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function moreEmployeeVerifiedList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select employees.id,concat_ws(' ',user_logins.first_name,user_logins.last_name) as name,user_logins.first_name,passport_image,is_verificator from employees left join user_logins on employees.user_login_id=user_logins.id where company_id=?   limit  ?,5");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$a);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				 if($row['is_verificator']==0)
													{ 
											$button='<a href="../validateVerificator/'.$data['cid'].'/'.$this->encrypt_decrypt('encrypt',$row['id']).'">	<div class="fright wi_25  padl30 xs-padl0 xs-wi_20  fsz40    padb0 xs-marrl0">
																				<button type="button" name="Hotel" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bgi">Validate</button>
																			</div>	</a>';
													  } else if($value['is_verificator']==1) { 
													$button='<a href="../removeVerificator/'.$data['cid'].'/'.$this->encrypt_decrypt('encrypt',$row['id']).'"><div class="fright wi_25  padl30 xs-padl0 xs-wi_20  fsz40    padb0 xs-marrl0">
																				<button type="button" name="Hotel" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bgi">Remove</button>
																			</div>	</a>';
													  }  
				if($row['passport_image']!=null || $row['passport_image']!="") { 
						 
						 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; }
						 
							$img='
																	<div class="wi_50p xs-wi_100 hei_50p xs-hei_45p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 yellow_bg_a" ><img src="../../../'.$imgs.'" width="45px;" height="45px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div>';
																	
																	 } else { $img='<div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"> '.substr($row['first_name'],0,1).'</div>
																	 
																	 '; 
																	 
																	 $imgs="../html/usercontent/images/person-male.png";
																	 }
																	 
				$org=$org.' <div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		 
																	
																	<div class="fleft wi_50p marr15"> 
																	
																	 '.$img.'</div>
																	
																	<div class="fleft wi_60   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">Employee</span>
																	
																	<a href="../../EmployeeDetail/employeeAccount/'.$data['cid'].'/'.$this -> encrypt_decrypt('encrypt',$row['employee_id']).'" class="black_txt"  > <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['name']),0,18).'</span>  </a>
																	</div>
																	
																	
																		 
																	

															'.$button.'
													 
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
			return $org;
			
			
		}
		
		
		function moreActiveEmployeesOld($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select passport_image,employee_id,employee_relieving_information.id,company_name,last_name,concat_ws(' ', first_name, last_name) as name,first_name,email,employee_relieving_information.user_id from employee_relieving_information left join user_logins on user_logins.id=employee_relieving_information.user_id left join companies on companies.id=employee_relieving_information.company_id where company_id=?  and is_relieved=1 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
						
			while($row = $result->fetch_assoc())
			{
				 
				
				 if($row['passport_image']!=null || $row['passport_image']!="") { 
						 
						 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; }
						 
						$img='<div class="wi_50p  hei_50p "><img src="../../../'.$imgs.'" width="50px;" height="50px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div> ';
																	
																	 } else { $img='<div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"> '.substr($row['first_name'],0,1).'</div>
																	  
																	 '; 
																	 
																	 $imgs="../html/usercontent/images/person-male.png";
																	 }
				$org=$org.'  <div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		 
																	
																	<div class="fleft wi_50p marr15"> 
																	
																	 '.$img.'</div>
																	
																	<div class="fleft wi_75 xxs-wi_80   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">Employee</span>
																	
																	<a href="#" class="black_txt"  > <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['first_name']).' '.html_entity_decode($row['last_name']),0,18).'</span>  </a>
																	</div>
																	
																	
																		 
																	 	<div class="fright wi_10 padl0    fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right grey_txt"></span> 
													</div>	 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div> ';
				
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		 function activeEmployeesOld($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select passport_image,company_name,concat_ws(' ', first_name, last_name) as name,last_name,first_name,email,employee_relieving_information.user_id from employee_relieving_information left join user_logins on user_logins.id=employee_relieving_information.user_id left join companies on companies.id=employee_relieving_information.company_id where company_id=?  and is_relieved=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				if($row['passport_image']!=null || $row['passport_image']!="") { 
						 
						 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; }
						 
							$img='
																	<div class="wi_50p xs-wi_100 hei_50p xs-hei_45p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 yellow_bg_a" ><img src="../../../'.$imgs.'" width="45px;" height="45px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div>';
																	
																	 } else { $img='<div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"> '.substr($row['first_name'],0,1).'</div>
																	 
																	 '; 
																	 
																	 $imgs="../html/usercontent/images/person-male.png";
																	 }
				array_push($org,$row);
				 
				$org[$j]['uid']= $this -> encrypt_decrypt('encrypt',$row['user_id']);
				 
				$org[$j]['img']=$img;
				$j++;
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		 function activeEmployeesOldCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num   from employee_relieving_information   where company_id=?  and is_relieved=1 ");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		
		function sentRequestCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where company_id=? and real_employee_id  is null and is_relieved=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			//print_r($row); die;
			return $row;
			
		}
		
		
		function sentRequestRelievedCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where company_id=? and is_relieved=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			//print_r($row); die;
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
			
			$stmt = $dbCon->prepare("select country_id,grading_status ,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
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
		
		
	}
