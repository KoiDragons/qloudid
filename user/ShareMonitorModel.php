<?php

	require_once('../AppModel.php');
	class ShareMonitorModel extends AppModel
	{
		function receivedContractorInvitation($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select company_contractors.id,company_name from company_contractors left join companies on companies.id=company_contractors.company_id where email_address=(select email from user_logins where id=?) and is_approved=0");
			$stmt->bind_param("i", $data['user_id']);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$row['enc']=$this->encrypt_decrypt("encrypt",$row['id']);
				array_push($org,$row);
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;	
			
		}
		
		function urlDetail($data)
		{
			 
			return $this -> encrypt_decrypt('encrypt',$data['REQUEST_URI']); 
			 
			 
		}	
		function approvedContractorInvitation($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select company_contractors.id,company_name from company_contractors  left join companies on companies.id=company_contractors.company_id where email_address=(select email from user_logins where id=?) and is_approved=1");
			$stmt->bind_param("i", $data['user_id']);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$row['enc']=$this->encrypt_decrypt("encrypt",$row['id']);
				array_push($org,$row);
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;	
			
		}
		
		
		function rejectedContractorInvitation($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select company_contractors.id,company_name from company_contractors  left join companies on companies.id=company_contractors.company_id where email_address=(select email from user_logins where id=?) and is_approved=2");
			$stmt->bind_param("i", $data['user_id']);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$row['enc']=$this->encrypt_decrypt("encrypt",$row['id']);
				array_push($org,$row);
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;	
			
		}
		
		function approveContrator($data)
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt("decrypt",$data['id']);
			$stmt= $dbCon->prepare("update company_contractors set is_approved=1,user_id=? where id=? ");
			$stmt->bind_param("ii", $data['user_id'],$id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function rejectContrator($data)
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt("decrypt",$data['id']);
			$stmt= $dbCon->prepare("update company_contractors set is_approved=2,user_id=? where id=? ");
			$stmt->bind_param("ii", $data['user_id'],$id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
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
		
		function rejectTenantRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt("decrypt",$data['id']);
			
			$stmt= $dbCon->prepare("update user_tenants set is_approved=2,user_login_id=? where id=? ");
			$stmt->bind_param("ii",$data['user_id'], $id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		function approveTenantRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt("decrypt",$data['id']);
			 $a=explode(',',substr($_POST['b_id'],0,-1));
			 
			$stmt= $dbCon->prepare("update user_tenants set is_approved=1,user_login_id=? where id=? ");
			$stmt->bind_param("ii",$data['user_id'], $id);
			$stmt->execute();
			foreach($a as $key)
				{
				$stmt = $dbCon->prepare("insert into user_tenant_property_info(user_property_id, tenant_id,user_id) values (?, ?, ?)");
				$stmt->bind_param("iii", $key,$id,$data['user_id']);
				$stmt->execute();	
				}
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		
			function kinRequestApprovedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select passport_image,sender_id,receiver_id,receiver_id as uid,concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.receiver_id left join user_profiles on connect_next_kin.receiver_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.sender_id=? and is_approved=1 
			union
			select passport_image,sender_id,receiver_id,sender_id as uid,concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code  from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.sender_id left join user_profiles on connect_next_kin.sender_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.receiver_id=? and is_approved=1 order by first_name limit 0,5");
			
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
		
		function base64_to_jpeg($base64_string, $output_file) {
		$ifp = fopen( $output_file, 'wb' ); 
		$data = explode( ',', $base64_string );
		fwrite( $ifp, base64_decode( $data[1] ) );
		fclose( $ifp ); 
		return $output_file; 
		}	
		function kinRequestSentDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select passport_image,connect_email,receiver_id,concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.receiver_id left join user_profiles on connect_next_kin.receiver_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.sender_id=? and is_approved=0 order by connect_next_kin.created_on desc limit 0,5");
			
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
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function kinRequestReceivedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select passport_image,sender_id as uid, concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code  from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.sender_id left join user_profiles on connect_next_kin.sender_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.receiver_id=? and is_approved=0 order by first_name limit 0,5");
			
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
		
		function kinRequestRejectedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select passport_image,receiver_id,sender_id,concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code  from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.sender_id left join user_profiles on connect_next_kin.sender_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone  where connect_next_kin.receiver_id=? and is_approved=2
			union
			select passport_image,receiver_id,sender_id,concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.receiver_id left join user_profiles on connect_next_kin.receiver_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.sender_id=? and is_approved=2
			order by first_name limit 0,5");
			
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
		
		function moreApprovedKinRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*5+1;
			$b=5;
			$stmt = $dbCon->prepare("select passport_image,sender_id,receiver_id,receiver_id as uid,concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.receiver_id left join user_profiles on connect_next_kin.receiver_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.sender_id=? and is_approved=1 
			union
			select passport_image,sender_id,receiver_id,sender_id as uid,concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code  from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.sender_id left join user_profiles on connect_next_kin.sender_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.receiver_id=? and is_approved=1 order by first_name limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiii", $data['user_id'],$data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			if($a%2==0)
				{
					$i=1;
				}
				else
				{
					$i=0;
				}
			while($row = $result->fetch_assoc())
			{
				
				if($i%2==0)
				{
					$bg='white_bg';
				}
				else
				{
					$bg='lgtgrey_bg';
				}
				if($row['receiver_id']==$data['user_id'])
				{
					$request="Received request";
				}
				else
				{
					$request="Sent request";
				}
				$enc =$this -> encrypt_decrypt('encrypt',$row['id']);
				$filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; } 
				 
				$org=$org.'<a href="../ConsentKinRequest/kinInformation/'.$enc.'">
												<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.' marb0   bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "><div class="wi_50p xs-wi_100 hei_50p  fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 yellow_bg_a" ><img src="../../'.$imgs.'" width="50px;" height="50px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0  ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">'.$request.' - Kin</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.$row['name'].'</span>  
																	</div>
																	
																	
																	
													<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
													</div>		 
															 		 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>
															</a> ';
															$i++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function moreRejectedKinRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*5+1;
			$b=5;
			
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
				
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				$filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; } 
				 
				$org=$org.' <a href="../ConsentKinRequest/kinInformation/'.$enc.'">
				<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0  ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">'.$request.' - Kin</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.$row['name'].'</span>  
																	</div>
																	
																	
																	
													<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
													</div>		 
															 		 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div> 
															</a>
															
															  ';
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function moreSentKinRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*5+1;
			$b=5;
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
				 $enc=$this->encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<a href="../ConsentKinRequest/kinInformation/'.$enc.'"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">Kin Request</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['name']),0,25).'</span>  
																	</div>
																	
																	
																		<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
													</div>	 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div></a>';
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		function moreReceivedKinRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select ssn from user_profiles where user_logins_id=>");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_ssn = $result->fetch_assoc();
			$a=$_POST['id']*5+1;
			$b=5;
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
				
			 
				$filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; } 
				 
				$org=$org.'<a href="../ConsentKinRequest/kinInformation/'.$enc.'"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0  ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">Received kin request</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.$row['name'].'</span>  
																	</div>
																	
																	
																	
													<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
													</div>		 
															 		 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>   
															</a>';
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		function kinRequestReceivedCount($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from connect_next_kin where receiver_id=? and is_approved=0");
			
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
		
		function kinRequestSentCount($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from connect_next_kin where sender_id=? and is_approved=0");
			
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
		
		function kinRequestRejectedCount($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from connect_next_kin where (receiver_id=? or sender_id=?) and is_approved=2 ");
			
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
		
		function kinRequestApprovedCount($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from connect_next_kin where (receiver_id=? or sender_id=?) and is_approved=1");
			
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
		
		
		function guardianRequestReceived($data)
		{
			$dbCon = AppModel::createConnection();
			  
			$stmt = $dbCon->prepare("select dependent_guardian.id,dependent_id,concat_ws(' ',first_name,last_name) as name  from dependent_guardian left join dependents on dependents.id=dependent_guardian.dependent_id where (guardian_user_id=? or guardian_email=?) and dependent_guardian.is_approved=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $data['user_id'],$data['email']);
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
		
		
		function guardianRequestRejected($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select dependent_guardian.id,dependent_id,concat_ws(' ',first_name,last_name) as name  from dependent_guardian left join dependents on dependents.id=dependent_guardian.dependent_id where (guardian_user_id=? or guardian_email=?) and dependent_guardian.is_approved=3");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $data['user_id'],$data['email']);
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
		
			function daycareRequestReceivedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select parent_info.id,concat_ws(' ', first_name, last_name) as name,first_name,last_name,company_name from parent_info left join child_care_info on child_care_info.id=parent_info.child_id left join companies on companies.id=child_care_info.company_id  where parent_user_id=?  and is_approved=0 order by parent_info.created_on limit 0,5");
			
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
		
		function moreDaycareRequestReceivedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$a=$_POST['id']*5+1;
			$b=5;
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
				
				/*if($data['ssn']=="" || $data['ssn']==null || $data['ssn']=="-") 
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
				}*/
				
				$org=$org.'<a href="../ConsentProfileParent/requestAccount/'.$org1.'"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">Employer</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['company_name']),0,25).'</span>  
																	</div>
																	
																	<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
													</div>
																			 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div></a>';
				
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function daycareRequestApprovedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select parent_info.id,concat_ws(' ', first_name, last_name) as name,first_name,last_name,company_name from parent_info left join child_care_info on child_care_info.id=parent_info.child_id left join companies on companies.id=child_care_info.company_id  where parent_user_id=?  and is_approved=1 order by parent_info.created_on limit 0,5");
			
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
		
			function moreDaycareApprovedRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$a=$_POST['id']*5+1;
			$b=5;
			$stmt = $dbCon->prepare("select parent_info.id,concat_ws(' ', first_name, last_name) as name,first_name,last_name,company_name from parent_info left join child_care_info on child_care_info.id=parent_info.child_id left join companies on companies.id=child_care_info.company_id  where parent_user_id=?  and is_approved=1 order by parent_info.created_on limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			if($a%2==0)
				{
					$i=1;
				}
				else
				{
					$i=0;
				}
			while($row = $result->fetch_assoc())
			{
				
				if($i%2==0)
				{
					$bg='white_bg';
				}
				else
				{
					$bg='lgtgrey_bg';
				}
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<a href="../ConsentProfileParent/requestAccount/'.$org1.'"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.' marb0  bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">Employer</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['company_name']),0,25).'</span>  
																	</div>
																	
																	<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
													</div>
																			 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div></a>';
				
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function daycareRequestRejectedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select parent_info.id,concat_ws(' ', first_name, last_name) as name,first_name,last_name,company_name from parent_info left join child_care_info on child_care_info.id=parent_info.child_id left join companies on companies.id=child_care_info.company_id  where parent_user_id=?  and is_approved=2 order by parent_info.created_on limit 0,5");
			
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
		
			function moreDaycareRejectedRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$a=$_POST['id']*5+1;
			$b=5;
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
				$org=$org.'<a href="../ConsentProfileParent/requestAccount/'.$org1.'"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">Employer</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['company_name']),0,25).'</span>  
																	</div>
																	
																	<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
													</div>
																			 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div></a>';
				
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function requestDaycareRejectedCount($data)
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
		
		function requestDaycareApprovedCount($data)
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
		
		function requestDaycareReceivedCount($data)
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
		
		
		function checkConnection($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$_POST['cid']);
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
		function disconnectSupplier($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$_POST['cidsup']);
			
			
			$stmt = $dbCon->prepare("delete from user_suppliers where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function disconnectTenant($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$_POST['cidten']);
			
			$stmt = $dbCon->prepare("delete from user_tenants where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			//echo $stmt->error; die;
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		function disconnectStudent($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$_POST['cidstu']);
			
			$stmt = $dbCon->prepare("delete from user_students where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			//echo $stmt->error; die;
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function disconnectEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("delete from estore_employee_invite where company_id=? and real_employee_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from user_company_profile where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from company_permission where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from employees where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from employee_request_cloud where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from manage_employee_permissions where company_id=? and user_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select company_email from companies where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select email from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
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
			//echo $result; die;
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
		function searchToApproveCompanyDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			//echo $id;
			$stmt = $dbCon->prepare("select company_name,industry,cid,founded from companies left join company_profiles on company_profiles.company_id=companies.id where companies.id=(select company_id from estore_employee_invite where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			$posted_value = $result->fetch_assoc();
			
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
			<div class="sources-content  dnone padb20 " style="display: none;">
			<ul class="mar0 pad0  fsz14">
			<li class="dflex mart10  padb5">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#" class="black_txt">Company Indentification Number :</a>
			</div>
			<span class="fxshrink_0 marl120">'.$posted_value['cid'].'</span>
			</li>
			<li class="dflex mart10  padb5">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#" class="black_txt">Company Name :</a>
			</div>
			<span class="fxshrink_0 marl100">'.$posted_value['company_name'].'</span>
			</li>
			<li class="dflex mart10  padb5">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#" class="black_txt">Industry :</a>
			</div>
			<span class="fxshrink_0 marl100">'.$posted_value['industry'].'</span>
			</li>
			<li class="dflex mart10  padb5">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#" class="black_txt">Founded :</a>
			</div>
			<span class="fxshrink_0 marl120">'.$posted_value['founded'].'</span>
			</li>
			
			</ul>
			</div>
			</div>';
			
			$org='<div class="padb0 ">
			<h2 class="tall marb5 pad0 bold fsz24 black_txt">Verifiera</h2>
			<div class="wi_100 dflex fxwrap_w marrla marb10 tall">
			
			
			
			<div class="wi_100 marb10 tall">
			
			<span class="valm fsz16">Signera dina ändrade uppgifter</span>
			</div>
			
			
			</div>
			</div>
			
			<!-- Center content -->
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10 lgtgrey2_bg brdrad3">
			<div class="padtb0 brdrad3 lgtgrey2_bg">
			
			<div class="mart0" id="search_data">
			
			
			'.$general.
			' 
			</div>
			
			</div>
			
			</div>
			';
			
			
			
			return $org;
		}
		
		function searchToApproveMemberDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			//echo $id;
			$stmt = $dbCon->prepare("select member_type,company_name,industry,cid,founded from company_board_directors left join companies on companies.id=company_board_directors.company_id left join company_profiles on company_profiles.company_id=companies.id where company_board_directors.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			$posted_value = $result->fetch_assoc();
			if($posted_value['member_type']==1)
			{
				$r_type='Ordförande';
			}
			else
			{
				$r_type='Ledamot';
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
			<div class="sources-content  dnone padb20 " style="display: none;">
			<ul class="mar0 pad0  fsz14">
			<li class="dflex mart10  padb5">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#" class="black_txt">Request type :</a>
			</div>
			<span class="fxshrink_0 marl120">'.$r_type.'</span>
			</li>
			<li class="dflex mart10  padb5">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#" class="black_txt">Company Indentification Number :</a>
			</div>
			<span class="fxshrink_0 marl120">'.$posted_value['cid'].'</span>
			</li>
			<li class="dflex mart10  padb5">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#" class="black_txt">Company Name :</a>
			</div>
			<span class="fxshrink_0 marl100">'.$posted_value['company_name'].'</span>
			</li>
			<li class="dflex mart10  padb5">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#" class="black_txt">Industry :</a>
			</div>
			<span class="fxshrink_0 marl100">'.$posted_value['industry'].'</span>
			</li>
			<li class="dflex mart10  padb5">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#" class="black_txt">Founded :</a>
			</div>
			<span class="fxshrink_0 marl120">'.$posted_value['founded'].'</span>
			</li>
			
			</ul>
			</div>
			</div>';
			
			$org='<div class="padb0 ">
			<h2 class="tall marb5 pad0 bold fsz24 black_txt">Verifiera</h2>
			<div class="wi_100 dflex fxwrap_w marrla marb10 tall">
			
			
			
			<div class="wi_100 marb10 tall">
			
			<span class="valm fsz16">Signera dina ändrade uppgifter</span>
			</div>
			
			
			</div>
			</div>
			
			<!-- Center content -->
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10 lgtgrey2_bg brdrad3">
			<div class="padtb0 brdrad3 lgtgrey2_bg">
			
			<div class="mart0">
			
			
			'.$general.
			' 
			</div>
			
			</div>
			
			</div>
			';
			
			
			
			return $org;
		}
		
		
		function sendEmployerInvitation($data)
		{
			$to      = $_POST['email_idc'];
			$subject = "Employer Invitation";
			$url="https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorShow";
			$surl=getShortUrl($url);
			$emailContent ='Hi, Boss. I am trying to connect to our company at Qloud ID but we are not registered as a company. Its free to register and I hope you can create the company so that I can connect and share my details with you.</br> '.$surl;
			sendEmail($subject, $to, $emailContent);
			return 1;
			
		}
		
		
		
		
		
		
		function requestPendingDetailConnections($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select company_user_connection.id,company_name,last_name,first_name,email,company_user_connection.created_on from company_user_connection left join user_logins on user_logins.id=company_user_connection.user_id left join companies on companies.id=company_user_connection.company_id where company_user_connection.user_id=? and is_approved=0 limit 0,5");
			
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
			$stmt = $dbCon->prepare("select company_user_connection.id,company_name,last_name,first_name,email,company_user_connection.created_on from company_user_connection left join user_logins on user_logins.id=company_user_connection.user_id left join companies on companies.id=company_user_connection.company_id where company_user_connection.user_id=? and is_approved=2 limit 0,5");
			
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
		
		function moreRequestDetailConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select company_user_connection.id,company_name,last_name,first_name,email,company_user_connection.created_on from company_user_connection left join user_logins on user_logins.id=company_user_connection.user_id left join companies on companies.id=company_user_connection.company_id where company_user_connection.user_id=? and is_approved=0 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.substr(html_entity_decode($row['company_name']),0,25).'...</div>
				</td>
				
				<td class="pad5 brdb_new hidden-xs tall cd">
				<div class="padtb5 ">'.date('Y-m-d', strtotime($row['created_on'])).'</div>
				</td>
				<td class="pad5 brdb_new tall sts">
				<div class="padtb5"><a href="approveRequestConnections/'.$enc.'">Approve</a></div>
				</td>
				<td class="pad5 brdb_new tall sts">
				<div class="padtb5"><a href="rejectRequestConnections/'.$enc.'">Reject</a></div>
				</td>
				</tr>';
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		function approvedMemberRequestCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num from company_board_directors  where member_email=(select email from user_logins where id=?) and is_approved=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function rejectedMemberRequestCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num from company_board_directors  where member_email=(select email from user_logins where id=?) and is_approved=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		function pendingMemberRequestCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num from company_board_directors  where member_email=(select email from user_logins where id=?) and is_approved=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		function approvedMemberRequest($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select address,company_board_directors.id,company_name,last_name,first_name,member_email,company_board_directors.created_on from company_board_directors left join companies on companies.id=company_board_directors.company_id left join company_profiles on company_profiles.company_id=companies.id where member_email=(select email from user_logins where id=?) and is_approved=1 limit 0,5");
			
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
		
		function pendingMemberRequest($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select address,company_board_directors.id,company_name,last_name,first_name,member_email,company_board_directors.created_on from company_board_directors left join companies on companies.id=company_board_directors.company_id left join company_profiles on company_profiles.company_id=companies.id where member_email=(select email from user_logins where id=?) and is_approved=0 limit 0,5");
			
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
		
		function rejectedMemberRequest($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select address,company_board_directors.id,company_name,last_name,first_name,member_email,company_board_directors.created_on from company_board_directors left join companies on companies.id=company_board_directors.company_id left join company_profiles on company_profiles.company_id=companies.id where member_email=(select email from user_logins where id=?) and is_approved=2 limit 0,5");
			
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
		
		function morependingMemberRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select company_board_directors.company_id,address,company_board_directors.id,company_name,last_name,first_name,member_email,company_board_directors.created_on from company_board_directors left join companies on companies.id=company_board_directors.company_id left join company_profiles on company_profiles.company_id=companies.id where member_email=(select email from user_logins where id=?) and is_approved=0 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				$enc_id=$this->encrypt_decrypt("encrypt",$row['id']);
				$enc_id1="'".$enc_id."'";
				$cname="'".html_entity_decode($row['company_name'])."'";
				
				
					$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15"> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0  ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">'.substr(html_entity_decode($row['address']),0,20).'</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['company_name']),0,25).'</span> 
																	</div>
																	
																	
													<div class="fright wi_10 padl0   marl15 fsz40  xs-mar0 padb0 hidden">
														<a href="#" class="show_popup_modal" onclick="updateMember(this.id,2);" id="'.$enc_id.'" data-target="#gratis_popup_member"><span class="far fa-times-circle red_txt"></span></a>
													</div>
																			 
														<div class="fright wi_10 padl0   marl15 fsz40  xs-mar0 padb0 hidden">
														<a href="#" class="show_popup_modal" onclick="updateMember(this.id,1);" id="'.$enc_id.'" data-target="#gratis_popup_member"><span class="fas fa-check-circle green_txt"></span></a>
													</div>					 
													 <div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
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
		
		function moreApprovedMemberRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*5+1;
			$b=5;
			$stmt = $dbCon->prepare("select address,company_board_directors.id,company_name,last_name,first_name,member_email,company_board_directors.created_on from company_board_directors left join companies on companies.id=company_board_directors.company_id left join company_profiles on company_profiles.company_id=companies.id where member_email=(select email from user_logins where id=?) and is_approved=1 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			if($a%2==0)
				{
					$i=1;
				}
				else
				{
					$i=0;
				}
			while($row = $result->fetch_assoc())
			{
				
				if($i%2==0)
				{
					$bg='white_bg';
				}
				else
				{
					$bg='lgtgrey_bg';
				}
				
					$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.' marb0  bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">'.substr(html_entity_decode($row['company_name']),0,25).'</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['address']),0,25).'</span>  
																	</div>
																	
																	
																		<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
													</div>	 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>';
															$i++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		function moreRejectedMemberRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select address,company_board_directors.id,company_name,last_name,first_name,member_email,company_board_directors.created_on from company_board_directors left join companies on companies.id=company_board_directors.company_id left join company_profiles on company_profiles.company_id=companies.id where member_email=(select email from user_logins where id=?) and is_approved=2 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				
					$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">Styrelseuppdrag </span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['company_name']),0,25).'</span>  
																	</div>
																	
																	
																		<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
													</div>	 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>'; 
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		
		
		function requestPendingDetailStudents($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select user_students.id,company_name,last_name,first_name,email,user_students.created_on from user_students left join user_logins on user_logins.id=user_students.user_login_id left join companies on companies.id=user_students.company_id where user_students.user_login_id=? and is_approved=0 limit 0,5");
			
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
		
		function requestRejectedDetailStudents($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select address,user_students.id,company_name,last_name,first_name,email,user_students.created_on from user_students left join user_logins on user_logins.id=user_students.user_login_id left join companies on companies.id=user_students.company_id left join company_profiles on company_profiles.company_id=companies.id where user_students.user_login_id=? and is_approved=2 limit 0,5");
			
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
		
		function moreRequestDetailStudents($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select address,user_students.id,company_name,last_name,first_name,email,user_students.created_on from user_students left join user_logins on user_logins.id=user_students.user_login_id left join companies on companies.id=user_students.company_id left join company_profiles on companies.id=company_profiles.company_id where user_students.user_login_id=? and is_approved=0 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			if($a%2==0)
				{
					$i=1;
				}
				else
				{
					$i=0;
				}
			while($row = $result->fetch_assoc())
			{
				
				if($i%2==0)
				{
					$bg='white_bg';
				}
				else
				{
					$bg='lgtgrey_bg';
				}
				
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.' marb0  bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">School</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['company_name']),0,25).'</span>  
																	</div>
																	
																	
																		<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
													</div>	 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>';
															$i++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		
		function approvedUserStudents($data)
		{
			$dbCon = AppModel::createConnection();
			ini_set('MAX_EXECUTION_TIME', -1);
			$user_id=$data['user_id'];
			$stmt = $dbCon->prepare("select email from user_logins where id=?");
			$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_e = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select address,user_students.id,company_name,last_name,first_name,email,user_students.created_on,user_students.company_id from user_students left join user_logins on user_logins.id=user_students.user_login_id left join companies on companies.id=user_students.company_id left join company_profiles on company_profiles.company_id=companies.id where user_students.user_login_id=? and is_approved=1 order by company_name desc limit 0,5");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			
					$i=0;
				
			while($row = $result->fetch_assoc())
			{
				
				if($i%2==0)
				{
					$bg='white_bg';
				}
				else
				{
					$bg='lgtgrey_bg';
				}
				$enc_id=$this->encrypt_decrypt("encrypt",$row['company_id']);
				$enc_id1="'".$enc_id."'";
				$cname="'".html_entity_decode($row['company_name'])."'";
				$company_id=$row['company_id'];
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.' marb0  bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_60   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">Skola</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['company_name']),0,25).'</span> 
																	</div>
																	
																	<div class="fright wi_10 padl0   marl15 fsz40  xs-mar0 padb0 hidden">
														<a href="#" onclick="setDisconnectStudent('.$enc_id1.');"><span class="far fa-times-circle red_txt"></span></a>
													</div>
																<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
													</div>			 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>';
				
			$i++;
			}
			
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		 
		
		function moreRequestApprovedDetailStudents($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*5+1;
			$b=5;
			$stmt = $dbCon->prepare("select address,user_students.id,company_name,last_name,first_name,email,user_students.created_on,user_students.company_id from user_students left join user_logins on user_logins.id=user_students.user_login_id left join companies on companies.id=user_students.company_id left join company_profiles on company_profiles.company_id=companies.id where user_students.user_login_id=? and is_approved=1 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				$enc_id=$this->encrypt_decrypt("encrypt",$row['company_id']);
				$enc_id1="'".$enc_id."'";
				$cname="'".html_entity_decode($row['company_name'])."'";
				$company_id=$row['company_id'];
				
				
					$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_60   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">Skola</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['company_name']),0,25).'</span>  
																	</div>
																	
																	<div class="fright wi_10 padl0   marl15 fsz40  xs-mar0 padb0 hidden">
														<a href="#" onclick="setDisconnectStudent('.$enc_id1.');"><span class="far fa-times-circle red_txt"></span></a>
													</div>
																			 
																	<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
													</div>		 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>';
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		function moreRequestRejectedDetailStudents($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select address,user_students.id,company_name,last_name,first_name,email,user_students.created_on from user_students left join user_logins on user_logins.id=user_students.user_login_id left join companies on companies.id=user_students.company_id left join company_profiles on company_profiles.company_id=companies.id where user_students.user_login_id=? and is_approved=2 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">Skola</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['company_name']),0,25).'</span>  
																	</div>
																	
																	<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
													</div>
																			 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>';
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		function requestPendingCountStudents($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from user_students where user_students.user_login_id=? and is_approved=0");
			
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
		
		function requestApprovedCountStudents($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from user_students where user_students.user_login_id=? and is_approved=1");
			
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
		
		function requestRejectedCountStudents($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from user_students where user_students.user_login_id=? and is_approved=2");
			
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
		
		function sendRequestStudents($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id from user_students  where user_login_id=? and company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['user_id'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$stmt = $dbCon->prepare("INSERT INTO user_students (user_login_id, company_id, created_on) VALUES (?, ?, now())");
				
				
				$stmt->bind_param("ii", $data['user_id'],$company_id);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("select company_email from companies  where id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				
				$row = $result->fetch_assoc();
				
				$to=$row['company_email'];
				$subject="Student request received";
				$emailContent="Student request has been received. To approve/reject please click <a href='https://www.qloudid.com/user/index.php/UserStudentCompany/monitorAccount/".$data['cid']."'>here</a>";
				sendEmail($subject, $to, $emailContent);
			}
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function searchCompanyDetailStudents()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select company_id from company_profiles where cid=?");
			
			// print_r($web); die;
			
			$stmt->bind_param("s", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if (empty($row))
			{
				$org='<div id="search_new">
				<div class="marb20 talc">
				<img src="../../../html/usercontent/images/no_result_found.png" class="maxwi_100 hei_auto">
				</div>
				<h2 class="marb5 pad0 bold fsz24 black_txt talc">Bolaget är inte registrerat</h2>
				
				<div class="wi_100 dflex fxwrap_w marrla marb10 talc">
				
				
				
				<div class="wi_100 marb10 talc">
				
				<span class="valm fsz16">Bolaget har ännu inte registrerat Qloud ID konto. Bjud in din skola för att kunna ansluta dig till bolaget. </span>
				</div>
				
				
				</div>
				
				<div class="on_clmn mart10 marb20">
				<input type="button" value="Stäng" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				</div>
				
				</div>';
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			
			else
			{
				$stmt = $dbCon->prepare("select company_id,company_name,company_profiles.city,company_profiles.country,zip,address from company_profiles left join companies on companies.id=company_profiles.company_id where company_id=?");
				
				
				
				$stmt->bind_param("i", $row['company_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$company_id= $this -> encrypt_decrypt('encrypt',$row['company_id']);
				$org='<div id="search_new " class="lgtgrey2_bg padtrl15">
				
				<h2 class="marb5 pad0 bold fsz24 black_txt talc">Bolaget är inte registrerat</h2>
				
				<div class="wi_100 dflex fxwrap_w marrla marb10 talc">
				
				
				
				<div class="wi_100 marb10 talc">
				
				<span class="valm fsz16">Bolaget har ännu inte registrerat Qloud ID konto. Bjud in din skola för att kunna ansluta dig till bolaget. </span>
				</div>
				
				
				</div>
				<form method="POST" action="sendRequestStudents/'.$company_id.'" id="save_request_company" name="save_request_company">
				
				<div class="result-item padtb0 lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">Allmän</span>
				<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
				<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>Visa mer</span>
				<span class="fa fa-caret-up dnone diblock_pa"></span>
				<span class="fa fa-caret-down dnone_pa"></span>
				</a>
				</div>
				</div>
				</div>
				<div class="sources-content dnone padb20 brdb" style="display: none;">
				<ul class="mar0 pad0 padt10 fsz14 ">
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Company</a>
				</div>
				<span class="fxshrink_0 marrl50">'.substr(html_entity_decode($row['company_name']),0,25).'...</span>
				</li>
				
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Address</a>
				</div>
				<span class="fxshrink_0 marrl50">'.html_entity_decode(substr($row['address'],0,20)).'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">City</a>
				</div>
				<span class="fxshrink_0 marl100">'.$row['city'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Zipcode</a>
				</div>
				<span class="fxshrink_0 marl100">'.$row['zip'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Country</a>
				</div>
				<span class="fxshrink_0 marl100">'.$row['country'].'</span>
				</li>
				
				</ul>
				</div>
				</div>
				
				<div class="mart0 padt15 lgtgrey2_bg">
				<label class="marb5  padl0">Select</label>
				<div class="pos_rel padb10">
				<div class="wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"></div>
				<select name="request_id" id= "request_id" class=" default_view wi_100 mart5 rbrdr pad10  white_bg hei_40p black_txt">
				<option value="1">Student</option>
				
				</select>
				</div>
				</div>
				</form>
				
				
				</div>
				
				<div class="mart20 talc">
				
				<a href="#" class="black_txt"><input type="button" value="Connect" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="checkRequest();"/></a>
				
				</div>
				';
				
				
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			
			
			
		}
		
		
		function requestDetailTenants($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select user_tenants.id,user_tenants.company_name,last_name,first_name,email,user_tenants.created_on from user_tenants left join user_logins on user_logins.id=user_tenants.user_login_id left join companies on companies.id=user_tenants.company_id where user_tenants.user_login_id=? and is_approved=1 limit 0,5");
			
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
		
		function userProperty($data)
		{
			$dbCon = AppModel::createConnection();
		   
			
			  $stmt = $dbCon->prepare("select * from user_address where user_id = ? and is_published=1 and id not in (select user_property_id from user_tenant_property_info where user_id=?)");
			/* bind parameters for markers */
			$cont=1;
		   $stmt->bind_param("ii", $data['user_id'],$data['user_id']);
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
	function updateUserId($data)
	{
			$dbCon = AppModel::createConnection();
			 
				$stmt = $dbCon->prepare("update user_tenants set user_login_id=? where user_email=(select email from user_logins where id=?)");
			
				/* bind parameters for markers */
				$stmt->bind_param("ii",$data['user_id'],$data['user_id']);
				$stmt->execute();
				 
				$stmt->close();
				$dbCon->close();
				return 1;
			 	 
		}	
		function receivedRequestDetailTenants($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select office_apartment_number,address,user_tenants.id,companies.company_name,last_name,first_name,email,user_tenants.created_on,user_tenants.company_id from user_tenants left join user_logins on user_logins.id=user_tenants.user_login_id left join companies on companies.id=user_tenants.company_id  left join company_profiles on company_profiles.company_id=companies.id left join landloard_building_port_floors_offices on landloard_building_port_floors_offices.id=user_tenants.property_id where (user_tenants.user_login_id=? or user_tenants.user_email=(select email from user_logins where user_logins.id=?)) and is_approved=3 limit 0,5");
			
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
		
		
		
		function requestPendingDetailTenants($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select address,user_tenants.id,user_tenants.company_name,last_name,first_name,email,user_tenants.created_on from user_tenants left join user_logins on user_logins.id=user_tenants.user_login_id left join companies on companies.id=user_tenants.company_id left join company_profiles on companies.id=company_profiles.company_id where user_tenants.user_login_id=? and is_approved=0 limit 0,5");
			
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
		
		
		function verifyRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['id']);
			
			$stmt = $dbCon->prepare("select first_name,last_name,ssn,country_of_residence,email,sex,dob_day,dob_month,dob_year,country_phone,phone_number, address,user_profiles.city,user_profiles.country,user_profiles.zipcode,grading_status from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where user_logins.id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$full_name=$row['first_name'].' '.$row['last_name'];
			
			$stmt = $dbCon->prepare("select landloard_building_port_floors_offices.id,zipcode,longitude,street_address,city,state,latitude,floor_id,port_id,buildingid,floor_number,elevator_available,apartment_size from landloard_building_port_floors_offices left join landloard_building_port_floors on landloard_building_port_floors.id=landloard_building_port_floors_offices.floor_id  left join landloard_building_ports on landloard_building_port_floors.port_id=landloard_building_ports.id left join landloard_buildings on landloard_buildings.id=landloard_building_ports.buildingid  where landloard_building_port_floors_offices.id=(select property_id from user_tenants where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_port_floors where port_id in(select id from landloard_building_ports where buildingid=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['buildingid']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowFloorCount = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("update user_tenants set is_approved=1,user_login_id=? where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii",$data['user_id'], $request_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update user_tenants set is_approved=1,user_login_id=? where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii",$data['user_id'], $request_id);
			$stmt->execute();
			$s=1;
			$data['entry_code']='';
			$st=0;
			$stmt = $dbCon->prepare("insert into  user_address (floor_id,apartment_id,building_id,`address`  , `city`  , `zipcode` , `port_number` , `invoice_address`  , `invoice_city`  , `invoice_zipcode`  , `invoice_port_number`  , `is_name_same` , `is_invoice_same`  , `name_on_house`  ,entry_code , user_id, created_on, is_personal_address) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,now(),?)");
				/* bind parameters for markers */
			$stmt->bind_param("iiissssssssiissii",$row['floor_id'],$row['id'],$row['buildingid'],$row['street_address'],$row['city'], $row['zipcode'],$row['port_id'],$row['street_address'],$row['city'], $row['zipcode'],$row['port_id'],$s,$s,$full_name,$data['entry_code'],$data['user_id'],$st);
			$stmt->execute();
			
			$id=$stmt->insert_id;
			
			
			$stmt = $dbCon->prepare("update user_address set property_layout=?,apartment_floor=?,elevator=?,property_type=2,floors_available=?,private_entrance=1,entrance_floor=1 where id=?");
			$stmt->bind_param("diiii",$row['apartment_size'],$row['floor_number'],$row['elevator_available'],$rowFloorCount['num'], $id);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("select * from landloard_building_port_floors_offices_bedrooms where apartment_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowBed = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into  user_apartment_bedrooms (user_address_id,created_on) values(?,now())");
				/* bind parameters for markers */
			$stmt->bind_param("i",$id);
			$stmt->execute();	
			
			$idBed=$stmt->insert_id;
			$bed="Single";
			$stmt = $dbCon->prepare("insert into  user_apartment_bedrooms_beds (bed_info,bedroom_id,created_on,modified_on) values(?,?,now(),now())");
				/* bind parameters for markers */
			$stmt->bind_param("si",$bed,$idBed);
			$stmt->execute();
			
			}
			
			
			$stmt = $dbCon->prepare("select * from landloard_apartment_bathroom_detail where apartment_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowBed = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into  user_apartment_bathroom_detail (user_address_id,toilet_and_sink  , bath , shower  , standalone_shower  , over_bath_shower , is_private  , is_wheelchair_accessible , is_ensuit , created_on  , modified_on  ) values(?,?,?,?,?,?,?,?,?,now(),now())");
				/* bind parameters for markers */
			$stmt->bind_param("iiiiiiiii",$id,$rowBed['toilet_and_sink'],$rowBed['bath'],$rowBed['shower'],$rowBed['standalone_shower'],$rowBed['over_bath_shower'],$rowBed['is_private'],$rowBed['is_wheelchair_accessible'],$rowBed['is_ensuit']);
			$stmt->execute();	
			}
			
			
			$stmt = $dbCon->prepare("select * from landloard_apartment_description where apartment_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowBed = $result->fetch_assoc();
			$stmt = $dbCon->prepare("update  user_address set property_heading=?,apartment_description=? where id=?");
				/* bind parameters for markers */
			$stmt->bind_param("ssi",$rowBed['selling_heading'],$rowBed['short_selling_description'],$id);
			$stmt->execute();	
			 
			
			
			
			$stmt = $dbCon->prepare("select * from landloard_apartment_other_room_detail where apartment_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowOther = $result->fetch_assoc();
			if(empty($rowOther))
			{
			$stmt = $dbCon->prepare("insert into  user_apartment_other_room_detail (apartment_id) values(?)");
			/* bind parameters for markers */
			$stmt->bind_param("i",$id);
			$stmt->execute();	

			$stmt = $dbCon->prepare("insert into  landloard_apartment_other_room_detail (apartment_id) values(?)");
			/* bind parameters for markers */
			$stmt->bind_param("i",$row['id']);
			$stmt->execute();	
			}
			else
			{
			$stmt = $dbCon->prepare("insert into user_apartment_other_room_detail (apartment_id,hall_room_available,living_room_available,work_room_available,hobby_room_available,sal_room_available,salon_room_available,vestibule_room_available,dining_room_available,chamber_room_available,balcony_available,terrace_available) values (?,?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("iiiiiiiiiiii", $id,$rowOther['hall_room_available'],$rowOther['living_room_available'],$rowOther['work_room_available'],$rowOther['hobby_room_available'],$rowOther['sal_room_available'],$rowOther['salon_room_available'],$rowOther['vestibule_room_available'],$rowOther['dining_room_available'],$rowOther['chamber_room_available'],$rowOther['balcony_available'],$rowOther['terrace_available']);
			$stmt->execute();	
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function unverifyRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("update user_tenants set is_approved=2,user_login_id=? where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii",$data['user_id'], $request_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		
		
		function requestRejectedDetailTenants($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select office_apartment_number,address,user_tenants.id,companies.company_name,last_name,first_name,email,user_tenants.created_on,user_tenants.company_id from user_tenants left join user_logins on user_logins.id=user_tenants.user_login_id left join companies on companies.id=user_tenants.company_id  left join company_profiles on company_profiles.company_id=companies.id left join landloard_building_port_floors_offices on landloard_building_port_floors_offices.id=user_tenants.property_id where user_tenants.user_login_id=? and is_approved=2 order by office_apartment_number limit 0,5");
			
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
		
		function moreRequestDetailTenants($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select address,user_tenants.id,user_tenants.company_name,last_name,first_name,email,user_tenants.created_on from user_tenants left join user_logins on user_logins.id=user_tenants.user_login_id left join companies on companies.id=user_tenants.company_id left join company_profiles on companies.id=company_profiles.company_id where user_tenants.user_login_id=? and is_approved=0 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['office_apartment_number']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">Landlord </span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['office_apartment_number']),0,25).'</span>  
																	</div>
																	
																	<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
													</div>
																			 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>';
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		function moreReceivedRequestDetailTenants($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select office_apartment_number,address,user_tenants.id,companies.company_name,last_name,first_name,email,user_tenants.created_on,user_tenants.company_id from user_tenants left join user_logins on user_logins.id=user_tenants.user_login_id left join companies on companies.id=user_tenants.company_id  left join company_profiles on company_profiles.company_id=companies.id left join landloard_building_port_floors_offices on landloard_building_port_floors_offices.id=user_tenants.property_id where (user_tenants.user_login_id=? or user_tenants.user_email=(select email from user_logins where user_logins.id=?)) and is_approved=3 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiii", $data['user_id'],$data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$enc= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 hidden-xs"> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['office_apartment_number']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_50 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">Landlord </span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['office_apartment_number']),0,25).'</span>  
																	</div>
																	
																	<a href="unverifyRequest/'.$enc.'"><div class="fright wi_10 padl0  marl15 fsz40  padb0">
														 <span class="fas fa-time-circle red_txt"></span> 
													</div></a>		

														<a href="verifyRequest/'.$enc.'"><div class="fright wi_10 padl0  marl15 fsz40  padb0 ">
														 <span class="fas fa-check-circle green_txt"></span> 
													</div></a>
																			 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>';
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		function requestReceivedCountTenants($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from user_tenants where (user_tenants.user_login_id=? or user_tenants.user_email=(select email from user_logins where user_logins.id=?)) and is_approved=3");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii",$data['user_id'], $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $row;
			
			
		}
		
		
		
		function approvedUserTenants($data)
		{
			$dbCon = AppModel::createConnection();
			ini_set('MAX_EXECUTION_TIME', -1);
			$user_id=$data['user_id'];
			$stmt = $dbCon->prepare("select email from user_logins where id=?");
			$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_e = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select office_apartment_number,address,user_tenants.id,companies.company_name,last_name,first_name,email,user_tenants.created_on,user_tenants.company_id from user_tenants left join user_logins on user_logins.id=user_tenants.user_login_id left join companies on companies.id=user_tenants.company_id  left join company_profiles on company_profiles.company_id=companies.id left join landloard_building_port_floors_offices on landloard_building_port_floors_offices.id=user_tenants.property_id where user_tenants.user_login_id=? and is_approved=1 order by office_apartment_number limit 0,5");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			 
			while($row = $result->fetch_assoc())
			{
				
				if($j%2==0)
				{
					$bg='white_bg';
				}
				else
				{
					$bg='lgtgrey_bg';
				}
				$enc_id=$this->encrypt_decrypt("encrypt",$row['company_id']);
				$enc_id1="'".$enc_id."'";
				
				$cname="'".html_entity_decode($row['company_name'])."'";
				$company_id=$row['company_id'];
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.' marb0  bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['office_apartment_number']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_60   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">Landlord</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['office_apartment_number']),0,25).'</span>  
																	</div>
																	
																	<div class="fright wi_10 padl0   marl15 fsz40  xs-mar0 padb0 hidden">
														<a href="#" onclick="setDisconnectTenant('.$enc_id1.');"><span class="far fa-times-circle red_txt"></span></a>
													</div>
																<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
													</div>			 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>';
				$j++;
			
			}
			
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		function moreRequestApprovedDetailTenants($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*5+1;
			$b=5;
			$stmt = $dbCon->prepare("select office_apartment_number,address,user_tenants.id,companies.company_name,last_name,first_name,email,user_tenants.created_on,user_tenants.company_id from user_tenants left join user_logins on user_logins.id=user_tenants.user_login_id left join companies on companies.id=user_tenants.company_id  left join company_profiles on company_profiles.company_id=companies.id left join landloard_building_port_floors_offices on landloard_building_port_floors_offices.id=user_tenants.property_id where user_tenants.user_login_id=? and is_approved=1 order by office_apartment_number limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			if($a%2==0)
				{
					$i=1;
				}
				else
				{
					$i=0;
				}
			while($row = $result->fetch_assoc())
			{
				
				if($i%2==0)
				{
					$bg='white_bg';
				}
				else
				{
					$bg='lgtgrey_bg';
				}
				
				$enc_id=$this->encrypt_decrypt("encrypt",$row['company_id']);
				$enc_id1="'".$enc_id."'";
				$cname="'".html_entity_decode($row['company_name'])."'";
				$company_id=$row['company_id'];
				
				
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.' marb0   bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['office_apartment_number']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_60   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">Landlord</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['office_apartment_number']),0,25).'</span> 
																	</div>
																	
																	<div class="fright wi_10 padl0   marl15 fsz40  xs-mar0 padb0 hidden">
														<a href="#" onclick="setDisconnectTenant('.$enc_id1.');"><span class="far fa-times-circle red_txt"></span></a>
													</div>
																	<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
													</div>		 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>';
															$i++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		function moreRequestRejectedDetailTenants($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select office_apartment_number,address,user_tenants.id,companies.company_name,last_name,first_name,email,user_tenants.created_on,user_tenants.company_id from user_tenants left join user_logins on user_logins.id=user_tenants.user_login_id left join companies on companies.id=user_tenants.company_id  left join company_profiles on company_profiles.company_id=companies.id left join landloard_building_port_floors_offices on landloard_building_port_floors_offices.id=user_tenants.property_id where user_tenants.user_login_id=? and is_approved=2 order by office_apartment_number limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">Landlord </span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['company_name']),0,25).'</span>  
																	</div>
																	
																	<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
													</div>
																			 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>';
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		function requestPendingCountTenants($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from user_tenants where user_tenants.user_login_id=? and is_approved=0");
			
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
		
		function requestApprovedCountTenants($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from user_tenants where user_tenants.user_login_id=? and is_approved=1");
			
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
		
		function requestRejectedCountTenants($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from user_tenants where user_tenants.user_login_id=? and is_approved=2");
			
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
		
		
		
		
		function sendRequestTenates($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id from user_tenants  where user_login_id=? and company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['user_id'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$stmt = $dbCon->prepare("INSERT INTO user_tenants (user_login_id, company_id, created_on) VALUES (?, ?, now())");
				
				
				$stmt->bind_param("ii", $data['user_id'],$company_id);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("select company_email from companies  where id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				
				$row = $result->fetch_assoc();
				
				$to=$row['company_email'];
				$subject="Tenant request received";
				$emailContent="Tenant request has been received. To approve/reject please click <a href='https://www.qloudid.com/user/index.php/UserTenantCompany/monitorAccount/".$data['cid']."'>here</a>";
				sendEmail($subject, $to, $emailContent);
			}
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function searchCompanyDetailTenates()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select company_id from company_profiles where cid=?");
			
			// print_r($web); die;
			
			$stmt->bind_param("s", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if (empty($row))
			{
				$org='<div id="search_new">
				<div class="marb20 talc">
				<img src="../../../html/usercontent/images/no_result_found.png" class="maxwi_100 hei_auto">
				</div>
				<h2 class="marb5 pad0 bold fsz24 black_txt talc">Bolaget är inte registrerat</h2>
				
				<div class="wi_100 dflex fxwrap_w marrla marb10 talc">
				
				
				
				<div class="wi_100 marb10 talc">
				
				<span class="valm fsz16">Bolaget har ännu inte registrerat Qloud ID konto. Bjud in din Landlord för att kunna ansluta dig till bolaget. </span>
				</div>
				
				
				</div>
				<div class="on_clmn mart10 marb20">
				<input type="button" value="Stäng" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				</div>
				</div>';
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			
			else
			{
				$stmt = $dbCon->prepare("select company_id,company_name,company_profiles.city,company_profiles.country,zip,address from company_profiles left join companies on companies.id=company_profiles.company_id where company_id=?");
				
				
				
				$stmt->bind_param("i", $row['company_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$company_id= $this -> encrypt_decrypt('encrypt',$row['company_id']);
				$org='<div id="search_new " class="lgtgrey2_bg padtrl15">
				<h2 class="marb5 pad0 bold fsz24 black_txt talc">Bolaget är inte registrerat</h2>
				
				<div class="wi_100 dflex fxwrap_w marrla marb10 talc">
				
				
				
				<div class="wi_100 marb10 talc">
				
				<span class="valm fsz16">Bolaget har ännu inte registrerat Qloud ID konto. Bjud in din Landlord för att kunna ansluta dig till bolaget. </span>
				</div>
				
				
				</div>
				<form method="POST" action="sendRequestTenates/'.$company_id.'" id="save_request_company" name="save_request_company">
				
				<div class="result-item padtb0 lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">Allmän</span>
				<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
				<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>Visa mer</span>
				<span class="fa fa-caret-up dnone diblock_pa"></span>
				<span class="fa fa-caret-down dnone_pa"></span>
				</a>
				</div>
				</div>
				</div>
				<div class="sources-content dnone padb20 brdb" style="display: none;">
				<ul class="mar0 pad0 padt10 fsz14 ">
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Company</a>
				</div>
				<span class="fxshrink_0 marrl50">'.substr(html_entity_decode($row['company_name']),0,25).'...</span>
				</li>
				
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Address</a>
				</div>
				<span class="fxshrink_0 marrl50">'.html_entity_decode(substr($row['address'],0,20)).'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">City</a>
				</div>
				<span class="fxshrink_0 marl100">'.$row['city'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Zipcode</a>
				</div>
				<span class="fxshrink_0 marl100">'.$row['zip'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Country</a>
				</div>
				<span class="fxshrink_0 marl100">'.$row['country'].'</span>
				</li>
				
				</ul>
				</div>
				</div>
				
				<div class="mart0 padt15 lgtgrey2_bg">
				<label class="marb5  padl0">Select</label>
				<div class="pos_rel padb10">
				<div class="wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"></div>
				<select name="request_id" id= "request_id" class="default_view wi_100 mart5 rbrdr pad10  white_bg hei_40p black_txt">
				<option value="1">Tenant</option>
				
				</select>
				</div>
				</div>
				</form>
				
				
				</div>
				
				<div class="mart20 talc">
				
				<a href="#" class="black_txt"><input type="button" value="Connect" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="checkRequest();"/></a>
				
				</div>
				';
				
				
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			
			
			
		}
		
		
		function sendRequestSuppliers($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id from user_suppliers  where user_login_id=? and company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['user_id'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$stmt = $dbCon->prepare("INSERT INTO user_suppliers (user_login_id, company_id, created_on) VALUES (?, ?, now())");
				
				
				$stmt->bind_param("ii", $data['user_id'],$company_id);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("select company_email from companies  where id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				
				$row = $result->fetch_assoc();
				
				$to=$row['company_email'];
				$subject="Supplier request received";
				$emailContent="Supplier request has been received. To approve/reject please click <a href='https://www.qloudid.com/user/index.php/UserSupplierCompany/monitorAccount/".$data['cid']."'>here</a>";
				sendEmail($subject, $to, $emailContent);
			}
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function searchCompanyDetailSuppliers()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select company_id from company_profiles where cid=?");
			
			// print_r($web); die;
			
			$stmt->bind_param("s", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if (empty($row))
			{
				$org='<div id="search_new">
				<div class="marb20 talc">
				<img src="../../../html/usercontent/images/no_result_found.png" class="maxwi_100 hei_auto">
				</div>
				<h2 class="marb5 pad0 bold fsz24 black_txt talc">Bolaget är inte registrerat</h2>
				
				<div class="wi_100 dflex fxwrap_w marrla marb10 talc">
				
				
				
				<div class="wi_100 marb10 talc">
				
				<span class="valm fsz16">Bolaget har ännu inte registrerat Qloud ID konto. Bjud in din leverantör för att kunna ansluta dig till bolaget. </span>
				</div>
				
				
				</div>
				<div class="on_clmn mart10 marb20">
				<input type="button" value="Stäng" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				</div>
				</div>';
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			
			else
			{
				$stmt = $dbCon->prepare("select company_id,company_name,company_profiles.city,company_profiles.country,zip,address from company_profiles left join companies on companies.id=company_profiles.company_id where company_id=?");
				
				
				
				$stmt->bind_param("i", $row['company_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$company_id= $this -> encrypt_decrypt('encrypt',$row['company_id']);
				$org='<div id="search_new " class="lgtgrey2_bg padtrl15">
				<h2 class="marb5 pad0 bold fsz24 black_txt talc">Bolaget är inte registrerat</h2>
				
				<div class="wi_100 dflex fxwrap_w marrla marb10 talc">
				
				
				
				<div class="wi_100 marb10 talc">
				
				<span class="valm fsz16">Bolaget har ännu inte registrerat Qloud ID konto. Bjud in din leverantör för att kunna ansluta dig till bolaget. </span>
				</div>
				
				
				</div>
				<form method="POST" action="sendRequestSuppliers/'.$company_id.'" id="save_request_company" name="save_request_company">
				
				<div class="result-item padtb0 lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">Allmän</span>
				<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
				<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>Visa mer</span>
				<span class="fa fa-caret-up dnone diblock_pa"></span>
				<span class="fa fa-caret-down dnone_pa"></span>
				</a>
				</div>
				</div>
				</div>
				<div class="sources-content dnone padb20 brdb" style="display: none;">
				<ul class="mar0 pad0 padt10 fsz14 ">
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Company</a>
				</div>
				<span class="fxshrink_0 marrl50">'.substr(html_entity_decode($row['company_name']),0,25).'...</span>
				</li>
				
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Address</a>
				</div>
				<span class="fxshrink_0 marrl50">'.html_entity_decode(substr($row['address'],0,20)).'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">City</a>
				</div>
				<span class="fxshrink_0 marl100">'.$row['city'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Zipcode</a>
				</div>
				<span class="fxshrink_0 marl100">'.$row['zip'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Country</a>
				</div>
				<span class="fxshrink_0 marl100">'.$row['country'].'</span>
				</li>
				
				</ul>
				</div>
				</div>
				
				<div class="mart0 padt15 lgtgrey2_bg">
				<label class="marb5  padl0">Select</label>
				<div class="pos_rel padb10">
				<div class="wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"></div>
				<select name="request_id" id= "request_id" class=" default_view wi_100 mart5 rbrdr pad10  white_bg hei_40p black_txt">
				<option value="1">Supplier</option>
				
				</select>
				</div>
				</div>
				</form>
				
				
				</div>
				
				<div class="mart20 talc">
				
				<a href="#" class="black_txt"><input type="button" value="Connect" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="checkRequest();"/></a>
				
				</div>
				';
				
				
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			
			
			
		}
		
		
		function requestDetailSuppliers($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select user_suppliers.id,company_name,last_name,first_name,email,user_suppliers.created_on from user_suppliers left join user_logins on user_logins.id=user_suppliers.user_login_id left join companies on companies.id=user_suppliers.company_id where user_suppliers.user_login_id=? and is_approved=1 limit 0,20");
			
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
		
		function requestPendingDetailSupliers($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select address,user_suppliers.id,company_name,last_name,first_name,email,user_suppliers.created_on from user_suppliers left join user_logins on user_logins.id=user_suppliers.user_login_id left join companies on companies.id=user_suppliers.company_id left join company_profiles on companies.id=company_profiles.company_id where user_suppliers.user_login_id=? and is_approved=0 limit 0,20");
			
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
		
		function requestRejectedDetailSuppliers($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select address,user_suppliers.id,company_name,last_name,first_name,email,user_suppliers.created_on from user_suppliers left join user_logins on user_logins.id=user_suppliers.user_login_id left join companies on companies.id=user_suppliers.company_id left join company_profiles on company_profiles.company_id=companies.id where user_suppliers.user_login_id=? and is_approved=2 limit 0,20");
			
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
		
		function moreRequestDetailSuppliers($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select address,user_suppliers.id,company_name,last_name,first_name,email,user_suppliers.created_on from user_suppliers left join user_logins on user_logins.id=user_suppliers.user_login_id left join companies on companies.id=user_suppliers.company_id left join company_profiles on companies.id=company_profiles.company_id where user_suppliers.user_login_id=? and is_approved=0 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">Supplier</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['company_name']),0,25).'</span>  
																	</div>
																	
																	
																	<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
													</div>		 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>';
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		
		function approvedUserSuppliers($data)
		{
			$dbCon = AppModel::createConnection();
			ini_set('MAX_EXECUTION_TIME', -1);
			$user_id=$data['user_id'];
			$stmt = $dbCon->prepare("select email from user_logins where id=?");
			$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_e = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select address ,user_suppliers.id,company_name,last_name,first_name,email,user_suppliers.created_on,user_suppliers.company_id from user_suppliers left join user_logins on user_logins.id=user_suppliers.user_login_id left join companies on companies.id=user_suppliers.company_id  left join company_profiles on company_profiles.company_id=companies.id where user_suppliers.user_login_id=? and is_approved=1 order by company_name desc limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			
					$i=0;
				
			while($row = $result->fetch_assoc())
			{
				
				if($i%2==0)
				{
					$bg='white_bg';
				}
				else
				{
					$bg='lgtgrey_bg';
				}
				$enc_id=$this->encrypt_decrypt("encrypt",$row['company_id']);
				$enc_id1="'".$enc_id."'";
				$cname="'".html_entity_decode($row['company_name'])."'";
				$company_id=$row['company_id'];
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.' marb0  bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_60   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">Leverantörer</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['company_name']),0,25).'</span> 
																	</div>
																	
																	<div class="fright wi_10 padl0   marl15 fsz40  xs-mar0 padb0 hidden">
														<a href="#" onclick="setDisconnectSupplier('.$enc_id1.');"><span class="far fa-times-circle red_txt"></span></a>
													</div>
																			 
																	<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
													</div>		 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>';
				$i++;
				
			}
			
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		function moreRequestApprovedDetailSuppliers($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*5+1;
			$b=5;
			$stmt = $dbCon->prepare("select address ,user_suppliers.id,company_name,last_name,first_name,email,user_suppliers.created_on,user_suppliers.company_id from user_suppliers left join user_logins on user_logins.id=user_suppliers.user_login_id left join companies on companies.id=user_suppliers.company_id  left join company_profiles on company_profiles.company_id=companies.id  where user_suppliers.user_login_id=? and is_approved=1 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			if($a%2==0)
				{
					$i=1;
				}
				else
				{
					$i=0;
				}
			while($row = $result->fetch_assoc())
			{
				
				if($i%2==0)
				{
					$bg='white_bg';
				}
				else
				{
					$bg='lgtgrey_bg';
				}	
				$enc_id=$this->encrypt_decrypt("encrypt",$row['company_id']);
				$enc_id1="'".$enc_id."'";
				$cname="'".html_entity_decode($row['company_name'])."'";
				$company_id=$row['company_id'];
				
				
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.' marb0  bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_60   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">Leverantörer</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['company_name']),0,25).'</span> 
																	</div>
																	
																	<div class="fright wi_10 padl0   marl15 fsz40  xs-mar0 padb0 hidden">
														<a href="#" onclick="setDisconnectSupplier('.$enc_id1.');"><span class="far fa-times-circle red_txt"></span></a>
													</div>
																			 
																<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
													</div>			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>';
															$i++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		function moreRequestRejectedDetailSuppliers($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select address,user_suppliers.id,company_name,last_name,first_name,email,user_suppliers.created_on from user_suppliers left join user_logins on user_logins.id=user_suppliers.user_login_id left join companies on companies.id=user_suppliers.company_id left join company_profiles on company_profiles.company_id=companies.id where user_suppliers.user_login_id=? and is_approved=2 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">Leverantörer</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['company_name']),0,25).'</span>  
																	</div>
																	
																	
																		<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
													</div>	 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>';
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		function requestPendingCountSuppliers($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from user_suppliers where user_suppliers.user_login_id=? and is_approved=0");
			
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
		
		function requestApprovedCountSuppliers($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from user_suppliers where user_suppliers.user_login_id=? and is_approved=1");
			
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
		
		function requestRejectedCountSuppliers($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from user_suppliers where user_suppliers.user_login_id=? and is_approved=2");
			
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
		
		
		
		
		function searchEmployerDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id from companies where id=(select company_id from company_profiles where cid=?) and user_login_id=?");
			
			// print_r($web); die;
			
			$stmt->bind_param("si", $_POST['id'],$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if (empty($row))
			{
				$org='<div class="pad15 lgtgrey2_bg">
				
				<div class="pos_rel padrl10">
				<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
				<input type="text" id="cid_number_emp" name="cid_number_emp" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Company Identification Number">
				</div>
				</div>
				<div id="errEmployer" class="red_txt">You are not connected with this company</div>
				<div class="mart20">
				<input type="button" value="Sök" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="searchEmployer();">
				
				
				</div>
				';
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			
			else
			{
				
				$company_id= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org='
				<div class="mart20">
				<a href="https://www.qloudid.com/company/index.php/ViewCompany/companyAccount/'.$company_id.'"><button type="button" value="Go to" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">Go to</button></a>
				
				
				</div>
				';
				
				
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			
			
			
		}
		
		
		
		function searchCompanyDetail()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select company_id from company_profiles where cid=?");
			
			// print_r($web); die;
			
			$stmt->bind_param("s", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if (empty($row))
			{
				$org='<div id="search_new">
				<div class="marb20 talc">
				<img src="../../../html/usercontent/images/no_result_found.png" class="maxwi_100 hei_auto">
				</div>
				<h2 class="marb5 pad0 bold fsz24 black_txt talc">Bolaget är inte registrerat</h2>
				
				<div class="wi_100 dflex fxwrap_w marrla marb10 talc">
				
				
				
				<div class="wi_100 marb10 talc">
				
				<span class="valm fsz16">Bolaget har ännu inte registrerat Qloud ID konto. Bjud in din Employer för att kunna ansluta dig till bolaget. </span>
				</div>
				
				
				</div>
				
				<div class="on_clmn padb10">
				
				<div class="pos_rel ">
				
				<select name="requec" id= "requec" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" onchange="selectRole(this.value);">
				
				<option value="0">--Choose your role--</option>
				<option value="1">Manager</option>
				<option value="2">Employee</option>
				
				
				
				</select>
				</div>
				</div>
				<div id="phoneSelectC" style="display:none">
				<form action="sendEmployerInvitation" method="POST" id="invite_save" name="invite_save">
				<div class="on_clmn padb10">
				
				<div class="pos_rel ">
				
				<input type="text" id="email_idc" name="email_idc" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Enter Email">
				</div>
				</div>
				</form>
				<div class="on_clmn padb10">
				
				<div class="on_clmn ">
				<div class="thr_clmn wi_50">	
				
				
				
				<div class="pos_rel padl0">
				
				
				<select  class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" >
				<option value="0">--Select country--</option>
				<option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="American Samoa">American Samoa</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antarctica">Antarctica</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Bouvet Island">Bouvet Island</option><option value="Brazil">Brazil</option><option value="British Indian Ocean Territory">British Indian Ocean Territory</option><option value="Brunei">Brunei</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="CÃƒÂ´te dÃ¢â‚¬â„¢Ivoire">CÃƒÂ´te dÃ¢â‚¬â„¢Ivoire</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Cayman Islands">Cayman Islands</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Christmas Island">Christmas Island</option><option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo">Congo</option><option value="Congo, The Democratic Republic">Congo, The Democratic Republic</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="East Timor">East Timor</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Falkland Islands">Falkland Islands</option><option value="Faroe Islands">Faroe Islands</option><option value="Fiji Islands">Fiji Islands</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="French Southern territories">French Southern territories</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Heard Island and McDonald Isla">Heard Island and McDonald Isla</option><option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jordan">Jordan</option><option value="Kazakstan">Kazakstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macao">Macao</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mayotte">Mayotte</option><option value="Mexico">Mexico</option><option value="Micronesia, Federated States o">Micronesia, Federated States o</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="Netherlands Antilles">Netherlands Antilles</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue">Niue</option><option value="Norfolk Island">Norfolk Island</option><option value="North Korea">North Korea</option><option value="Northern Mariana Islands">Northern Mariana Islands</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Palestine">Palestine</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcairn">Pitcairn</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="RÃƒÂ©union">RÃƒÂ©union</option><option value="Romania">Romania</option><option value="Russian Federation">Russian Federation</option><option value="Rwanda">Rwanda</option><option value="Saint Helena">Saint Helena</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="Saint Lucia">Saint Lucia</option><option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option><option value="Saint Vincent and the Grenadin">Saint Vincent and the Grenadin</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="South Georgia and the South Sa">South Georgia and the South Sa</option><option value="South Korea">South Korea</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Togo">Togo</option><option value="Tokelau">Tokelau</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Turks and Caicos Islands">Turks and Caicos Islands</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="United States Minor Outlying I">United States Minor Outlying I</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Virgin Islands, British">Virgin Islands, British</option><option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option><option value="Wallis and Futuna">Wallis and Futuna</option><option value="Western Sahara">Western Sahara</option><option value="Yemen">Yemen</option><option value="Yugoslavia">Yugoslavia</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option>		
				</select>
				</div>
				
				</div>
				<div class="thr_clmn padl10 wi_50">
				
				
				<div class="pos_rel padr0">
				
				<input type="number"  max="9999999999" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Enter phone">
				</div>
				</div>
				</div>
				</div>
				</div>
				<div id="errInvite" class=""red_txt></div>
				<div class="on_clmn mart10 marb20" id="c0">
				<input type="button" value="Lägg till företag" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" data-target="#gratis_popup_company" onclick="updateErr();"/>
				
				
				</div>
				
				
				<div class="on_clmn mart10 marb20" id="c1" style="display:none;">
				<input type="button" value="Lägg till företag" class="get-company-info1 wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" data-target="#gratis_popup_company" />
				
				
				</div>
				<div class="on_clmn mart10 marb20" id="c2" style="display:none;">
				<input type="button" value="Invite manager" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="inviteManager();"/>
				
				
				</div>
				
				</div>';
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			
			else
			{
				$stmt = $dbCon->prepare("select company_id,company_name,company_profiles.city,company_profiles.country,zip,address from company_profiles left join companies on companies.id=company_profiles.company_id where company_id=?");
				
				
				
				$stmt->bind_param("i", $row['company_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$company_id= $this -> encrypt_decrypt('encrypt',$row['company_id']);
				$org='<div id="search_new" class="lgtgrey2_bg padtrl15">
				
				<h2 class="marb5 pad0 bold fsz24 black_txt talc">Bolaget är inte registrerat</h2>
				
				<div class="wi_100 dflex fxwrap_w marrla marb10 tall">
				
				
				
				<div class="wi_100 marb10 talc">
				
				<span class="valm fsz16">Bolaget har ännu inte registrerat Qloud ID konto. Bjud in din Employer för att kunna ansluta dig till bolaget.</span>
				</div>
				
				
				</div>
				<form method="POST" action="../VerifyRequest/companyRequestAccount/'.$company_id.'" id="save_request_company" name="save_request_company">
				
				
				<div class="result-item padtb0 lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">Allmän</span>
				<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
				<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>Visa mer</span>
				<span class="fa fa-caret-up dnone diblock_pa"></span>
				<span class="fa fa-caret-down dnone_pa"></span>
				</a>
				</div>
				</div>
				</div>
				<div class="sources-content dnone padb20 brdb" style="display: none;">
				<ul class="mar0 pad0 padt10 fsz14 ">
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Company</a>
				</div>
				<span class="fxshrink_0 marrl50">'.substr(html_entity_decode($row['company_name']),0,25).'...</span>
				</li>
				
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Address</a>
				</div>
				<span class="fxshrink_0 marrl50">'.html_entity_decode(substr($row['address'],0,20)).'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">City</a>
				</div>
				<span class="fxshrink_0 marl100">'.$row['city'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Zipcode</a>
				</div>
				<span class="fxshrink_0 marl100">'.$row['zip'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Country</a>
				</div>
				<span class="fxshrink_0 marl100">'.$row['country'].'</span>
				</li>
				
				</ul>
				</div>
				</div>
				
				
				<div class="mart0 padt15 lgtgrey2_bg">
				<label class="marb5  padl0">Select</label>
				<div class="pos_rel padb10">
				<div class="wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"></div>
				<select name="request_id" id= "request_id" class="default_view wi_100 mart5 rbrdr pad10  white_bg hei_40p black_txt">
				<option value="0">--Select type--</option>
				<option value="1">Employee</option>
				<option value="2">Customer</option>
				</select>
				</div>
				</div>
				
				
				</form>
				</div>
				<div class="mart20">
				<input type="button" value="Connect" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="checkRequest();" />
				
				
				</div>
				
				';
				
				
				$stmt->close();
				$dbCon->close();
				return $org;
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
					
					$emailContent =$row_user['first_name'].' '.$row_user['last_name'].' has requested to access your personal data. Click <a href="https://www.qloudid.com/user/index.php/PublicUserRequest/requestAccount/'.$enc.'">here</a> to take action </br> If above link does not work, please copy the following link in your browser. </br>https://www.qloudid.com/user/index.php/PublicUserRequest/requestAccount/'.$enc;
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
					$html='Du har blivit ombedd att identifiera dig. Qloud ID https://www.qloudid.com/user/index.php/PublicUserRequest/requestAccount/'.$enc;
					//echo $html.' '.$to;
					$res=sendSms($subject, $to, $html);
					$stmt->close();
					$dbCon->close();
					return 1;
					
				}
			}
			
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
				$stmt= $dbCon->prepare("select invited_emp,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p,employee_number from estore_employee_invite where id=?");
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
					
					$stmt= $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`,employee_number) values (?,?,?,?,?,?,?, ?)");
					
					//$company_id."-".$row_id['first_name']."-".$row_id['last_name']."-".$s."-".$row_id['hash_code']."-".$row_id['email']."-".$row_id['id']; die;
					$stmt->bind_param("ississis", $company,$row_id['first_name'],$row_id['last_name'],$s,$row_id['hash_code'],$row_id['email'],$row_id['id'],$row_emp['employee_number']);
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
		
		
		
		function createCompanyAccount($data)
		{
			$dbCon = AppModel::createConnection();
			$st=1;
			$stmt = $dbCon->prepare("insert into companies(o_type,industry,country_id,user_login_id,currency_id,company_name,company_email,website,hash_code,created_date) 
			values(?, ?, ?, ?, ?, ?, ?, ?, ?, ? )");
			
			/* bind parameters for markers */
			$stmt->bind_param("isiiisssss", $st,$data['inds'],  $data['country'], $data['user_id'], $data['curr'], $data['company_name'], $data['company_email'], $data['website'], $data['random_hash'], $data['created_on']);
			
			
			if (!$stmt->execute()) {
				
				$stmt->close();
				$dbCon->close();
				return 0;
				} else {
				
				
				$stmt = $dbCon->prepare("select id from companies where id not in(select company_id from user_company_profile where user_login_id=?) and user_login_id=?");
				
				/* bind parameters for markers*/
				$stmt->bind_param("ii", $data['user_id'], $data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$myrow  = $result->fetch_assoc();
				// print_r($myrow); die;
				$stmt = $dbCon->prepare("insert into user_company_profile(`company_id`,`user_login_id`) values(?, ?)");
				
				$stmt->bind_param("ii", $myrow['id'], $data['user_id']);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("insert into location (company_id,country_id,state_id,city_id,district_id,location,created_on) values (?, ?, ?, ?, ?, ?, ?)");
				
				$stmt->bind_param("iiiiiss", $myrow['id'], $data['country'], $data['state'], $data['city'],$data['district'], $data['location'], $data['created_on']);
				$stmt->execute();
				
				
				
				$locationrow = $stmt->insert_id;
				
				$stmt        = $dbCon->prepare("insert into warehouse(`company_id`,`location_id`,`created_on`) values (?, ?, ?)");
				
				$stmt->bind_param("iis", $myrow['id'], $locationrow, $data['created_on']);
				$stmt->execute();
				$stmt->close();
				
				$stmt = $dbCon->prepare("select first_name,last_name,email,email_verification_code from user_logins where id=?");
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result  = $stmt->get_result();
				$userrow = $result->fetch_assoc();
				
				$stmt       = $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`,`created_by`) values(?, ?, ?, ?, ?, ?, ?, ?)");
				$status_emp = 0;
				$stmt->bind_param("ississii", $myrow['id'], $userrow['first_name'], $userrow['last_name'], $status_emp, $userrow['email_verification_code'], $userrow['email'], $data['user_id'], $data['user_id']);
				$stmt->execute();
				
				$stmt       = $dbCon->prepare("insert into company_permission (`company_id`,`user_login_id`,`purchase`,`alert`,`supplier`,`customer`,`employee`,`proposal`,`project_proposal`,`create_article`,`import_article`) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$status_per = 1;
				$stmt->bind_param("iiiiiiiiiii", $myrow['id'], $data['user_id'], $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per);
				$stmt->execute();
				
				
				$stmt       = $dbCon->prepare("insert into company_verified (company_id,verified,unvarified,is_verified) values (?, ?, ?, ?)");
				$status_ver = 7;
				$stmt->bind_param("iiii", $myrow['id'], $status_emp, $status_ver, $status_emp);
				$stmt->execute();
				if (!$stmt->execute()) {
					$stmt->close();
					$dbCon->close();
					return 0;
					} else {
					$stmt->close();
					$dbCon->close();
					return 1;
				}
				
				
			}
			
			
		}
		
		function createCompanyBankAccount($data)
		{
			$dbCon = AppModel::createConnection();
			$st=1;
			$stmt = $dbCon->prepare("insert into companies(email_verification_status,o_type,industry,country_id,user_login_id,currency_id,company_name,company_email,website,hash_code,created_date) 
			values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )");
			
			/* bind parameters for markers */
			$stmt->bind_param("iisiiisssss", $st,$st,$data['inds'],  $data['country'], $data['user_id'], $data['curr'], $data['company_name'], $data['company_email'], $data['website'], $data['random_hash'], $data['created_on']);
			
			
			if (!$stmt->execute()) {
				
				
				$stmt->close();
				$dbCon->close();
				return 0;
				} else {
				$company_id=$stmt->insert_id;
				$stmt = $dbCon->prepare("select id from companies where id not in(select company_id from user_company_profile where user_login_id=?) and user_login_id=?");
				
				/* bind parameters for markers*/
				$stmt->bind_param("ii", $data['user_id'], $data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$myrow  = $result->fetch_assoc();
				// print_r($myrow); die;
				$stmt = $dbCon->prepare("insert into user_company_profile(`company_id`,`user_login_id`) values(?, ?)");
				
				$stmt->bind_param("ii", $myrow['id'], $data['user_id']);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("insert into location (company_id,country_id,state_id,city_id,district_id,location,created_on) values (?, ?, ?, ?, ?, ?, ?)");
				
				$stmt->bind_param("iiiiiss", $myrow['id'], $data['country'], $data['state'], $data['city'],$data['district'], $data['location'], $data['created_on']);
				$stmt->execute();
				
				
				
				$locationrow = $stmt->insert_id;
				
				$stmt        = $dbCon->prepare("insert into warehouse(`company_id`,`location_id`,`created_on`) values (?, ?, ?)");
				
				$stmt->bind_param("iis", $myrow['id'], $locationrow, $data['created_on']);
				$stmt->execute();
				$stmt->close();
				
				$stmt = $dbCon->prepare("select first_name,last_name,email,email_verification_code from user_logins where id=?");
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result  = $stmt->get_result();
				$userrow = $result->fetch_assoc();
				
				$stmt       = $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`,`created_by`) values(?, ?, ?, ?, ?, ?, ?, ?)");
				$status_emp = 0;
				$stmt->bind_param("ississii", $myrow['id'], $userrow['first_name'], $userrow['last_name'], $status_emp, $userrow['email_verification_code'], $userrow['email'], $data['user_id'], $data['user_id']);
				$stmt->execute();
				
				$stmt       = $dbCon->prepare("insert into company_permission (`company_id`,`user_login_id`,`purchase`,`alert`,`supplier`,`customer`,`employee`,`proposal`,`project_proposal`,`create_article`,`import_article`) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$status_per = 1;
				$stmt->bind_param("iiiiiiiiiii", $myrow['id'], $data['user_id'], $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per);
				$stmt->execute();
				
				
				$stmt       = $dbCon->prepare("insert into company_verified (company_id,verified,unvarified,is_verified) values (?, ?, ?, ?)");
				$status_ver = 7;
				$stmt->bind_param("iiii", $myrow['id'], $status_emp, $status_ver, $status_emp);
				$stmt->execute();
				if (!$stmt->execute()) {
					$stmt->close();
					$dbCon->close();
					return 0;
					} else {
					$stmt->close();
					$dbCon->close();
					return $company_id;
				}
				
				
			}
			
			
		}
		
		
		
		
		function sendCreateCompanyEmail($data)
		{
			
			$to            = $data['company_email'];
			$company_email = $data['company_email'];
			$subject       = "Qmatchup - Please verify your Organization !";
			
			$emailContent = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title></title>
			</head>
			<body style="width:100%; background-color:#f5f5f5; margin:0; padding:0;" align="center">
			<div style="width:100%; background-color:#f5f5f5;" align="center">
			<div align="center" style="padding-top:20px; padding-bottom:20px; font-family:Arial, Helvetica, sans-serif; color:#6b6f74">
			<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
			<td align="right" scope="col" style="font-size:10px; color:#a7a9ac;"><div style="padding-bottom:5px; padding-top:5px;"> <a href="#" style="color:#a7a9ac; text-decoration:none;">View in browser</a> | <a href="#" style="color:#a7a9ac; text-decoration:none;">Read in Swedish</a> </div></td>
			</tr>
			<tr>
			<td><table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#3691c0" style="background-color:#3691c0;">
            <tr>
			<td scope="col" width="50%" align="left" valign="top" style="padding:25px;"><div style="color:#FFFFFF">
			<div style="font-size:36px;">Activate Organization </div>
			<div style="font-size:11px;">' . date("d/m/Y") . '</div>
			</div></td>
			<td scope="col" align="right" width="50%" valign="top" style="padding:25px;"><div style="text-align:right"><img src="https://www.qmatchup.com/Newsletter/images/qmacthup.png" alt="Qmatchup" title="Qmatchup" style="font-size:35px; color:#FFFFFF;" /></div></td>
            </tr>
			</table></td>
			</tr>
			<tr>
			<td style="background-color:#FFFFFF;"><table width="100%" border="0" cellspacing="0" cellpadding="20">
            <tr>
			<td align="left" valign="top" scope="col"><div style="font-size:18px">Dear <b>' . $company_email . '</b>,</div>
			<div style="font-size:14px; padding-top:20px;">
			<div style="padding-bottom:10px;"> Thank you! You have registered a Organization  to Qmatchup! </div>
			<div style="padding-bottom:10px;"> Please confirm your registration to activate the Organization  account. </div>
			
			</div></td>
            </tr>
            <tr>
			<td align="left" valign="top" scope="col"><a href="https://www.qloudid.com/company/index.php/Activation/activateAccount/' . $company_email . '/' . $data['random_hash'] . '" style="display:inline-block; padding:20px 35px; font-weight:bold; color:#FFF; background-color:#6ab743; text-decoration:none; border-radius:3px; -webkit-border-radius:3px; ">Confirm Now</a></td>
            </tr>
            <tr>
			<td align="left" valign="top" scope="col"><div style="font-size:14px;">If the button is not working then copy/paste the link in your browser to confirm your registration <br />
			<a href="#" style="text-decoration:none; color:#3691c0;">https://www.qloudid.com/company/index.php/Activation/activateAccount/' . $company_email . '/' . $data['random_hash'] . ' </a></div></td>
            </tr>
            <tr>
			<td align="left" valign="top" scope="col" style="font-size:16px;"><div style="padding-bottom:5px;">Warm regards,</div>
			<div><b style="color:#6b6f74;">The Qmatchup team</b></div></td>
            </tr>
			</table></td>
			</tr>
			<tr>
			<td align="center" valign="top"><div style="padding-top:10px; font-size:11px;">This message was sent to <a href="mailto:#" style="text-decoration:none; color:#3691c0;">' . $company_email . '</a>. If you dont want to receive these emails from Qmatchup.com in the future, <br />
            please click <a href="#" style="text-decoration:none; color:#3691c0;">unsubscribe</a>. <a style="text-decoration:none; color:#6b6f74;" href="https://www.qloudid.com"></a> Qmatchup Outsourcing AB, Stureplan 6, 114 35, Stockholm, Sweden</div></td>
			</tr>
			</table>
			</div>
			</div>
			</body>
			</html>';
			
			
			sendEmail($subject, $to, $emailContent);
			
		}
    	
		function selectOrganizationWeb($web)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id from companies where company_email like ?");
			
			// print_r($web); die;
			
			$like = '%' . $web['web'];
			
			$stmt->bind_param("s", $like);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if (empty($row))
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
		
		
		
		
		
		function selectIndustry()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,name from company_categories where is_deleted=0 and is_live = 1");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org    = array();
			while ($row = $result->fetch_assoc()) {
				
				array_push($org, $row);
			}
			return $org;
			$stmt->close();
			$dbCon->close();
			
		}
		
		
		
		
		function selectCountry()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name  from country  where id>0 and id<240 order by country_name");
			
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
		
		
		function moreEmployerRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*5;
			$b=5;
			if($data['us']==1)
			{
				$user_id=$data['user_id'];
				$stmt = $dbCon->prepare("select email from user_logins where id=?");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$stmt = $dbCon->prepare("select invited_emp,estore_employee_invite.id,invitation.status,invitation.created_date,company_name from estore_employee_invite left join invitation on estore_employee_invite.id=invitation.invited_user_id left join companies on estore_employee_invite.company_id=companies.id where (estore_employee_invite.email=? or estore_employee_invite.work_email=? )  and invitation.status=0  and is_relieved=0 limit ?,?");
				$stmt->bind_param("ssii", $row['email'],$row['email'],$a,$b);
			}
			else
			{
				$user_id= $this -> encrypt_decrypt('decrypt',$data['user_id']);
				$stmt = $dbCon->prepare("select invited_emp,estore_employee_invite.id,invitation.status,invitation.created_date,company_name from estore_employee_invite left join invitation on estore_employee_invite.id=invitation.invited_user_id left join companies on estore_employee_invite.company_id=companies.id where created_user=1 and invitation.status=0 and estore_employee_invite.id= ? limit ?,?");
				$stmt->bind_param("iii", $user_id,$a,$b);
			}
			
			
			
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
				if ($row['invited_emp']==1) $imp="Employee"; else if ($row['invited_emp']==2) $imp= "Student"; else if ($row['invited_emp']==3) $imp= "Commercial Tenant"; else if ($row['invited_emp']==4) $imp= "Private Tenant";
				$enc_id=$this->encrypt_decrypt('encrypt',$row['id']);
				$enc_id1="'".$enc_id."'";
				 
				$org=$org.'<a href="../ConsentProfile/receiveAccount/'.$enc_id.'"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">Employer</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['company_name']),0,25).'</span>  
																	</div>
																	
																	
													<div class="fright wi_10 padl0   marl15 fsz40  xs-mar0 padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
													</div>
																			 
														< 				 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div></a>';
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function requestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select employee_request_cloud.id,company_name,last_name,first_name,email,employee_request_cloud.created_on from employee_request_cloud left join user_logins on user_logins.id=employee_request_cloud.user_login_id left join companies on companies.id=employee_request_cloud.company_id where employee_request_cloud.user_login_id=? and is_approved=1 limit 0,5");
			
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
		
		
		function requestDetailCustomer($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select company_customer_requests.id,company_name,last_name,first_name,email,company_customer_requests.created_on from company_customer_requests left join user_logins on user_logins.id=company_customer_requests.user_login_id left join companies on companies.id=company_customer_requests.company_id where company_customer_requests.user_login_id=? and is_approved=1 limit 0,5");
			
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
		
		function updateRequest($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update user_company_profile set data_request=? where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $_POST['updateR'],$_POST['c_id'],$data['user_id']);
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
		
		
		function requestPendingDetail($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select address,employee_request_cloud.id,company_name,last_name,first_name,email,employee_request_cloud.created_on from employee_request_cloud left join user_logins on user_logins.id=employee_request_cloud.user_login_id left join companies on companies.id=employee_request_cloud.company_id left join company_profiles on companies.id=company_profiles.company_id where employee_request_cloud.user_login_id=? and is_approved=0 limit 0,5");
			
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
		
		
		function requestPendingDetailCustomer($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select company_customer_requests.id,company_name,last_name,first_name,email,company_customer_requests.created_on from company_customer_requests left join user_logins on user_logins.id=company_customer_requests.user_login_id left join companies on companies.id=company_customer_requests.company_id where company_customer_requests.user_login_id=? and is_approved=0 limit 0,5");
			
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
		
		function moreRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select address,employee_request_cloud.id,company_name,last_name,first_name,email,employee_request_cloud.created_on from employee_request_cloud left join user_logins on user_logins.id=employee_request_cloud.user_login_id left join companies on companies.id=employee_request_cloud.company_id left join company_profiles on company_profiles.company_id=companies.id  where employee_request_cloud.user_login_id=? and is_approved=0 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<a href="../ConsentProfile/sentAccount/'.$enc.'"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">Employer</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['company_name']),0,25).'</span>  
																	</div>
																	
																	<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
													</div>
																			 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>';
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		function moreRequestDetailCustomer($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select company_customer_requests.id,company_name,last_name,first_name,email,company_customer_requests.created_on from company_customer_requests left join user_logins on user_logins.id=company_customer_requests.user_login_id left join companies on companies.id=company_customer_requests.company_id where company_customer_requests.user_login_id=? and is_approved=0 limit ?,?");
			
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
				<div class="padtb5 " >'.substr(html_entity_decode($row['company_name']),0,25).'...</div>
				</td>
				
				<td class="pad5 brdb_new hidden-xs tall cd">
				<div class="padtb5 ">'.date('Y-m-d', strtotime($row['created_date'])).'</div>
				</td>
				<td class="pad5 brdb_new tall sts">
				<div class="padtb5">Pending</div>
				</td>
				
				</tr>';
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
			$stmt = $dbCon->prepare("select count(id) as num  from employee_request_cloud where employee_request_cloud.user_login_id=? and is_approved=0 ");
			
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
			$stmt = $dbCon->prepare("select count(id) as num  from employees where employees.user_login_id=?");
			
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
		
		
		function requestPendingCountCustomer($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from company_customer_requests where company_customer_requests.user_login_id=? and is_approved=0 ");
			
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
		
		function requestApprovedCountCustomer($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from company_customer_requests where company_customer_requests.user_login_id=? and is_approved=1");
			
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
		
		function completedEmployeeRequests($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select employees.company_id,company_name,profile_pic from employees left join companies on employees.company_id=companies.id left join company_profiles on companies.id=company_profiles.company_id where employees.user_login_id = ? and o_type=1 limit 0,5");
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
		
		function approveMemberRequest($data)
		{
			$dbCon = AppModel::createConnection();
			
			$request_id= $this -> encrypt_decrypt('decrypt',$data['a_id']);
			
			$stmt= $dbCon->prepare("update company_board_directors set is_approved=? where id= ?");
			$stmt->bind_param("ii",$data['stat'],$request_id);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		
		function approveUserEmployeeRequest($data)
		{
			$dbCon = AppModel::createConnection();
			
			$request_id= $this -> encrypt_decrypt('decrypt',$data['a_id']);
			$stmt= $dbCon->prepare("select professional_category_id,professional_subcategory_id,invited_emp,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p,employee_number from estore_employee_invite where id=?");
			//echo $query; die;
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_emp = $result->fetch_assoc();
			
			//print_r($row_emp);// die;
			$company=$row_emp['company_id'];
			//echo $row_emp['email']." ".$row_emp['work_email']." jain";
			$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where email= ? or email=?");
			//echo $query; die;
			$stmt->bind_param("ss", trim($row_emp['email']), trim($row_emp['work_email']));
			$stmt->execute();
			$result = $stmt->get_result();
			$row_id = $result->fetch_assoc();
			
			
			$d=date('Y-m-d');
			if($data['stat']==2)
			{
				$stmt= $dbCon->prepare("update invitation set status=2,accepted_date=? where invited_user_id= ?");
				$stmt->bind_param("si",$d,$request_id);
				$stmt->execute();
				$stmt= $dbCon->prepare("select invited_emp,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p,employee_number from estore_employee_invite where id=?");
				//echo $query; die;
				$stmt->bind_param("i", $request_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_emp = $result->fetch_assoc();
				$company=$row_emp['company_id'];
				
				$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where email= ? or email=?");
				//echo $query; die;
				$stmt->bind_param("ss", $row_emp['email'], $row_emp['work_email']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_id = $result->fetch_assoc();
				//echo $row_id['id']; echo $request_id; die;
				$stmt= $dbCon->prepare("update estore_employee_invite set real_employee_id=? where id=? ");
				$stmt->bind_param("ii", $row_id['id'],$request_id);
				$stmt->execute();
				
				$emp=$row_id['id'];
			}
			else if($data['stat']==1)
			{
				$stmt= $dbCon->prepare("select invited_emp,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p,employee_number from estore_employee_invite where id=?");
				//echo $query; die;
				$stmt->bind_param("i", $request_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_emp = $result->fetch_assoc();
				$company=$row_emp['company_id'];
				$stmt= $dbCon->prepare("update invitation set status=1,accepted_date=? where invited_user_id= ?");
				$stmt->bind_param("si", $d,$request_id);
				if($stmt->execute())
				{
					$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where id= ?");
					//echo $query; die;
					$stmt->bind_param("i", $data['user_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$row_id = $result->fetch_assoc();
					$emp=$row_id['id'];
					$s=0;
					$u=1;
					$stmt= $dbCon->prepare("insert into company_permission (`company_id`,`user_login_id`,`purchase`,`alert`,`supplier`,`customer`,`employee`,`proposal`,`project_proposal`,`create_article`,`import_article`) values (?,?,?,?,?,?,?,?,?,?,?)");
					$stmt->bind_param("iiiiiiiiiii", $company,$row_id['id'],$s,$s,$s,$s,$u,$s,$s,$s,$s);
					$stmt->execute();
					if($row_emp['invited_emp']==1)
					{
						$stmt= $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`, employee_number) values (?,?,?,?,?,?,?, ?)");
						$stmt->bind_param("ississis", $company,$row_id['first_name'],$row_id['last_name'],$s,$row_id['hash_code'],$row_id['email'],$row_id['id'],$row_emp['employee_number']);
					}  
					else if($row_emp['invited_emp']==2)
					{
						$stmt= $dbCon->prepare("insert into students (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`) values (?,?,?,?,?,?,?,?)");
						$stmt->bind_param("ississi", $company,$row_id['first_name'],$row_id['last_name'],$s,$row_id['hash_code'],$row_id['email'],$row_id['id']);
					}  
					//echo $company_id."-".$row_id['first_name']."-".$row_id['last_name']."-".$s."-".$row_id['hash_code']."-".$row_id['email']."-".$row_id['id']; die;
					
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
						//$stmt->execute();
						
						$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where email= ? or email=?");
						//echo $query; die;
						$stmt->bind_param("ss", $row_emp['email'], $row_emp['work_email']);
						$stmt->execute();
						$result = $stmt->get_result();
						$row_id = $result->fetch_assoc();
						
						
						$stmt= $dbCon->prepare("select * from virtual_user_company_profile where company_id=? and invited_user_id=?");
						$stmt->bind_param("ii", $company,$request_id);
						$stmt->execute();
						$result = $stmt->get_result();
						$row_virtual = $result->fetch_assoc();
						
						if(empty($row_virtual))
						{
							$stmt= $dbCon->prepare("select id from property_location where company_id=? and is_headquarter=1");
							$stmt->bind_param("i", $company);
							$stmt->execute();
							$result = $stmt->get_result();
							$row_location = $result->fetch_assoc();
							
							$stmt= $dbCon->prepare("insert into user_company_profile (location_id,company_id,user_login_id,title,email) values (?, ?,?,?,?)");
							$stmt->bind_param("iiiss", $row_location['id'],$company,$row_id['id'],$row_emp['title'],$row_emp['work_email']);
							$stmt->execute();
						}
						else
						{
							if($row_virtual['job_function']=="" || $row_virtual['job_function']==null)
							{
								$row_virtual['job_function']=1;
							}
							if($row_virtual['location_id']==null || $row_virtual['location_id']=='')
							{
							$stmt= $dbCon->prepare("select id from property_location where company_id=? and is_headquarter=1");
							$stmt->bind_param("i", $company);
							$stmt->execute();
							$result = $stmt->get_result();
							$row_location = $result->fetch_assoc();
							$row_virtual['location_id']=$row_location['id'];
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
			}
			
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
			
			
			$data['cid']=$this->encrypt_decrypt('encrypt',$company);
			
			$stmt = $dbCon->prepare("select id from employees where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("ii", $company,$emp);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowEmp = $result->fetch_assoc();
			
			$data['eid']=$this->encrypt_decrypt('encrypt',$rowEmp['id']);
			$valUpdate=$this->professionalTodoUpdate($data);
			
			$stmt = $dbCon->prepare("update employee_selected_service_todos set is_selected=1 where company_id=? and professional_subcategory_id=? and employee_id=?");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("iii", $company,$row_emp['professional_subcategory_id'],$rowEmp['id']);
			$stmt->execute();
			
			
			$fields=array();
			$fields=$row_id;
			$fields['qloudid']=$request_id;
			$fields['stat']=$data['stat'];
			//print_r($fields); //die;
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
			
			curl_close ($ch);
			
			if($result==0)
			{
				 
				$stmt->close();
				$dbCon->close();
				return $data['cid'];
			}
			else
			{
				 
				$stmt->close();
				$dbCon->close();
				return $data['cid'];
			}
			
			
			
		}
		
		function approveUserRequest($data)
		{
			$dbCon = AppModel::createConnection();
			
			$request_id= $this -> encrypt_decrypt('decrypt',$data['a_id']);
			$stmt= $dbCon->prepare("select professional_category_id,professional_subcategory_id,invited_emp,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p,employee_number from estore_employee_invite where id=?");
			//echo $query; die;
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_emp = $result->fetch_assoc();
			
			//print_r($row_emp);// die;
			$company=$row_emp['company_id'];
			//echo $row_emp['email']." ".$row_emp['work_email']." jain";
			$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where email= ? or email=?");
			//echo $query; die;
			$stmt->bind_param("ss", trim($row_emp['email']), trim($row_emp['work_email']));
			$stmt->execute();
			$result = $stmt->get_result();
			$row_id = $result->fetch_assoc();
			
			
			$d=date('Y-m-d');
			if($data['stat']==2)
			{
				$stmt= $dbCon->prepare("update invitation set status=2,accepted_date=? where invited_user_id= ?");
				$stmt->bind_param("si",$d,$request_id);
				$stmt->execute();
				$stmt= $dbCon->prepare("select invited_emp,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p,employee_number from estore_employee_invite where id=?");
				//echo $query; die;
				$stmt->bind_param("i", $request_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_emp = $result->fetch_assoc();
				$company=$row_emp['company_id'];
				
				$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where email= ? or email=?");
				//echo $query; die;
				$stmt->bind_param("ss", $row_emp['email'], $row_emp['work_email']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_id = $result->fetch_assoc();
				//echo $row_id['id']; echo $request_id; die;
				$stmt= $dbCon->prepare("update estore_employee_invite set real_employee_id=? where id=? ");
				$stmt->bind_param("ii", $row_id['id'],$request_id);
				$stmt->execute();
				
				$emp=$row_id['id'];
			}
			else if($data['stat']==1)
			{
				$stmt= $dbCon->prepare("select invited_emp,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p,employee_number from estore_employee_invite where id=?");
				//echo $query; die;
				$stmt->bind_param("i", $request_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_emp = $result->fetch_assoc();
				$company=$row_emp['company_id'];
				$stmt= $dbCon->prepare("update invitation set status=1,accepted_date=? where invited_user_id= ?");
				$stmt->bind_param("si", $d,$request_id);
				if($stmt->execute())
				{
					$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where id= ?");
					//echo $query; die;
					$stmt->bind_param("i", $data['user_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$row_id = $result->fetch_assoc();
					$emp=$row_id['id'];
					$s=0;
					$u=1;
					$stmt= $dbCon->prepare("insert into company_permission (`company_id`,`user_login_id`,`purchase`,`alert`,`supplier`,`customer`,`employee`,`proposal`,`project_proposal`,`create_article`,`import_article`) values (?,?,?,?,?,?,?,?,?,?,?)");
					$stmt->bind_param("iiiiiiiiiii", $company,$row_id['id'],$s,$s,$s,$s,$u,$s,$s,$s,$s);
					$stmt->execute();
					if($row_emp['invited_emp']==1)
					{
						$stmt= $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`, employee_number) values (?,?,?,?,?,?,?, ?)");
						$stmt->bind_param("ississis", $company,$row_id['first_name'],$row_id['last_name'],$s,$row_id['hash_code'],$row_id['email'],$row_id['id'],$row_emp['employee_number']);
					}  
					else if($row_emp['invited_emp']==2)
					{
						$stmt= $dbCon->prepare("insert into students (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`) values (?,?,?,?,?,?,?,?)");
						$stmt->bind_param("ississi", $company,$row_id['first_name'],$row_id['last_name'],$s,$row_id['hash_code'],$row_id['email'],$row_id['id']);
					}  
					//echo $company_id."-".$row_id['first_name']."-".$row_id['last_name']."-".$s."-".$row_id['hash_code']."-".$row_id['email']."-".$row_id['id']; die;
					
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
						//$stmt->execute();
						
						$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where email= ? or email=?");
						//echo $query; die;
						$stmt->bind_param("ss", $row_emp['email'], $row_emp['work_email']);
						$stmt->execute();
						$result = $stmt->get_result();
						$row_id = $result->fetch_assoc();
						
						
						$stmt= $dbCon->prepare("select * from virtual_user_company_profile where company_id=? and invited_user_id=?");
						$stmt->bind_param("ii", $company,$request_id);
						$stmt->execute();
						$result = $stmt->get_result();
						$row_virtual = $result->fetch_assoc();
						
						if(empty($row_virtual))
						{
							$stmt= $dbCon->prepare("select id from property_location where company_id=? and is_headquarter=1");
							$stmt->bind_param("i", $company);
							$stmt->execute();
							$result = $stmt->get_result();
							$row_location = $result->fetch_assoc();
							
							$stmt= $dbCon->prepare("insert into user_company_profile (location_id,company_id,user_login_id,title,email) values (?, ?,?,?,?)");
							$stmt->bind_param("iiiss", $row_location['id'],$company,$row_id['id'],$row_emp['title'],$row_emp['work_email']);
							$stmt->execute();
						}
						else
						{
							if($row_virtual['job_function']=="" || $row_virtual['job_function']==null)
							{
								$row_virtual['job_function']=1;
							}
							if($row_virtual['location_id']==null || $row_virtual['location_id']=='')
							{
							$stmt= $dbCon->prepare("select id from property_location where company_id=? and is_headquarter=1");
							$stmt->bind_param("i", $company);
							$stmt->execute();
							$result = $stmt->get_result();
							$row_location = $result->fetch_assoc();
							$row_virtual['location_id']=$row_location['id'];
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
			}
			
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
			
			
			$data['cid']=$this->encrypt_decrypt('encrypt',$company);
			
			$stmt = $dbCon->prepare("select id from employees where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("ii", $company,$emp);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowEmp = $result->fetch_assoc();
			
			$data['eid']=$this->encrypt_decrypt('encrypt',$rowEmp['id']);
			$valUpdate=$this->professionalTodoUpdate($data);
			
			$stmt = $dbCon->prepare("update employee_selected_service_todos set is_selected=1 where company_id=? and professional_subcategory_id=? and employee_id=?");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("iii", $company,$row_emp['professional_subcategory_id'],$rowEmp['id']);
			$stmt->execute();
			
			
			$fields=array();
			$fields=$row_id;
			$fields['qloudid']=$request_id;
			$fields['stat']=$data['stat'];
			//print_r($fields); //die;
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
			
			curl_close ($ch);
			
			if($result==0)
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
		
		 function professionalTodoUpdate($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$employee_id=$this->encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id not in(select professional_subcategory_id from  employee_selected_service_todos where company_id=? and employee_id=?)");
			$stmt->bind_param("ii", $company_id,$employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			
			$stmt = $dbCon->prepare("select *  from professional_service_subcategory where id=?");
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			$rowAmenities= $result3->fetch_assoc();
			$stmt = $dbCon->prepare("insert into employee_selected_service_todos ( professional_category_id,professional_subcategory_id,company_id,employee_id, created_on, modified_on) values (?, ?,?,?, now(), now())");
			$stmt->bind_param("iiii",$row['professional_category_id'],$row['id'],$company_id,$employee_id);
			$stmt->execute();
							
			}	
			
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select ssn,first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image,get_started_wizard_status,ssn from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id = ?");
			
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
		
		function approvedUser($data)
		{
			$dbCon = AppModel::createConnection();
			ini_set('MAX_EXECUTION_TIME', -1);
			$user_id=$data['user_id'];
			
			$stmt = $dbCon->prepare("select company_name,employees.company_id,address from employees left join companies on companies.id=employees.company_id left join company_profiles on company_profiles.company_id=companies.id where employees.user_login_id = ? and companies.country_id=(select country_of_residence from user_logins where id=?) limit 0,5");
			$stmt->bind_param("ii",$user_id,$user_id);
			
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			
			
					$i=0;
				
				
			while($row = $result->fetch_assoc())
			{
				
				if($i%2==0)
				{
					$bg='white_bg';
				}
				else
				{
					$bg='lgtgrey_bg';
				}
				$enc_id=$this->encrypt_decrypt("encrypt",$row['company_id']);
				$enc_id1="'".$enc_id."'";
				$cname="'".html_entity_decode($row['company_name'])."'";
				$org=$org.'<a href="../ConsentProfile/approveAccount/'.$enc_id.'"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.' marb0  bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_60   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">Employer</span>
																	
																	  <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['company_name']),0,25).'</span>  
																	</div>
																	
																		<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
													</div>	
																			 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div> </a>';
															$i++;
			}
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function moreApprovedUser($data)
		{
			$dbCon = AppModel::createConnection();
			$a=($_POST['id']*5+1);
			$b=5;
			ini_set('memory_limit', '-1');
			$user_id=$data['user_id'];
			$stmt = $dbCon->prepare("select email from user_logins where id=?");
			$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select company_name,employees.company_id,address from employees left join companies on companies.id=employees.company_id left join company_profiles on company_profiles.company_id=companies.id where employees.user_login_id = ?  and companies.country_id=(select country_of_residence from user_logins where id=?) order by company_name desc limit  ?,?");
			$stmt->bind_param("iiii", $user_id, $user_id,$a,$b);
			
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			if($a%2==0)
				{
					$i=1;
					}
				else
				{
					$i=0;
				}
			while($row = $result->fetch_assoc())
			{
				
				if($i%2==0)
				{
					$bg='white_bg';
				}
				else
				{
					$bg='lgtgrey_bg';
				}
				$enc_id=$this->encrypt_decrypt("encrypt",$row['company_id']);
				$enc_id1="'".$enc_id."'";
				$cname="'".html_entity_decode($row['company_name'])."'";
				$company_id=$row['company_id'];
				
				$org=$org.'<a href="../ConsentProfile/approveAccount/'.$enc_id.'"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.' marb0  bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_60   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">Employer</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['company_name']),0,25).'</span> 
																	</div>
																	
																	<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
													</div>
																			 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div></a>';
															
															$i++;
				
				 
				 
			}
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function moreApprovedCustomer($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*5;
			$b=5;
			ini_set('memory_limit', '-1');
			$user_id=$data['user_id'];
			
			
			$stmt = $dbCon->prepare("select company_customer_requests.id,company_name,last_name,first_name,email,company_customer_requests.created_on,company_id from company_customer_requests left join user_logins on user_logins.id=company_customer_requests.user_login_id left join companies on companies.id=company_customer_requests.company_id where company_customer_requests.user_login_id=? and is_approved=1 order by company_name desc limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			
			while($row = $result->fetch_assoc())
			{
				
				$org=$org.'<tr class="fsz14">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " ><a href="https://www.qloudid.com/company/index.php/ViewCompany/companyAccount/'.$enc_id.'" class="black_txt">'.substr(html_entity_decode($row['company_name']),0,25).'...</a></div>
				</td>
				
				<td class="pad5 brdb_new hidden-xs tall cd">
				<div class="padtb5 ">'.$row['created_on'].'</div>
				</td>
				
				
				</tr>';
			}
			
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function allCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			if($data['us']==1)
			{
				$user_id=$data['user_id'];
				$stmt = $dbCon->prepare("select email from user_logins where id=?");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$stmt = $dbCon->prepare("select count(estore_employee_invite.id) as num from estore_employee_invite left join invitation on estore_employee_invite.id=invitation.invited_user_id where (estore_employee_invite.email=? or estore_employee_invite.work_email=?) and invitation.status=0 and is_relieved=0");
				$stmt->bind_param("ss", $row['email'],$row['email']);
			}
			else
			{
				$user_id= $this -> encrypt_decrypt('decrypt',$data['user_id']);
				$stmt = $dbCon->prepare("select count(id) as num from invitation where invited_user_id= ? and status=0");
				$stmt->bind_param("i",  $user_id );
			}
			
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
				function approveUser($data)
		{
			$dbCon = AppModel::createConnection();
			 
			if($data['us']==1)
			{
				$user_id=$data['user_id'];
				$stmt = $dbCon->prepare("select email from user_logins where id=?");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$stmt = $dbCon->prepare("select invited_emp,estore_employee_invite.id,invitation.status,invitation.created_date,company_name from estore_employee_invite left join invitation on estore_employee_invite.id=invitation.invited_user_id left join companies on estore_employee_invite.company_id=companies.id where (estore_employee_invite.email=? or estore_employee_invite.work_email=? ) and invitation.status=0 and is_relieved=0 limit 0,5");
				$stmt->bind_param("ss", $row['email'],$row['email']);
			}
			else
			{
				$user_id= $this -> encrypt_decrypt('decrypt',$data['user_id']);
				$stmt = $dbCon->prepare("select invited_emp,estore_employee_invite.id,invitation.status,invitation.created_date,company_name from estore_employee_invite left join invitation on estore_employee_invite.id=invitation.invited_user_id left join companies on estore_employee_invite.company_id=companies.id where created_user=1 and invitation.status=0 and estore_employee_invite.id= ? limit 0,5");
				$stmt->bind_param("i", $user_id);
			}
			
			
			
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
		
		

		
		
		
		function approveCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$user_id=$data['user_id'];
			$stmt = $dbCon->prepare("select email from user_logins where id=?");
			$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select count(employees.id) as num from employees left join companies on companies.id=employees.company_id where employees.user_login_id=? and companies.country_id=(select country_of_residence from user_logins where id=?)");
			$stmt->bind_param("ii", $user_id, $user_id);
			
			
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function pendingCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from employee_request where company_id= ? and `status`=0");
			
			/* bind parameters for markers */
			$cont=1;
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
			
			$stmt = $dbCon->prepare("select count(id) as num from employee_request where company_id= ? and `status`=3");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function locationCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from location where company_id = ?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function connectCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select count(id) num from employees where company_id = ?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function virtualCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where real_employee_id is null and company_id= ?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function virtualEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id,concat_ws(' ', name, last_name) as name,created_by,email,phone,title,location from estore_employee_invite where real_employee_id is null and company_id=? and invited_emp=1 limit 0,5");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			//$org['created_by']=array();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select id,concat_ws(' ', first_name, last_name) as name from user_logins where id= ?");
				
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("i", $row['created_by']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				array_push($org,$row);
				$org[$i]['created_user']=$row1['name'];
				$i++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function connectedEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select created_by,employees.id,employees.user_login_id,concat_ws(' ', employees.first_name, employees.last_name) as name,employees.email,price,verification_status,image_path,user_profiles.phone_number from employees left join user_logins on employees.user_login_id=user_logins.id left join user_profiles on employees.user_login_id=user_profiles.user_logins_id  where employees.company_id= ? limit 0,5");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			//$org['created_user']=array();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select id,concat_ws(' ', first_name, last_name) as name from user_logins where id= ?");
				
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("i", $row['created_by']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				array_push($org,$row);
				$org[$i]['created_user']=$row1['name'];
				$i++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function locationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name,location.created_on,location.id,companies.company_name,location,country.country_name,state.state_name,cities.city_name from location left join user_logins on location.user_login_id=user_logins.id left join companies on location.company_id=companies.id left join country on country.id=location.country_id left join state on state.id=location.state_id left join cities on cities.id=location.city_id where company_id= ? limit 0,2");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
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
		
		function locationDetailMore($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name,location.created_on,location.id,companies.company_name,location,country.country_name,state.state_name,cities.city_name from location left join user_logins on location.user_login_id=user_logins.id left join companies on location.company_id=companies.id left join country on country.id=location.country_id left join state on state.id=location.state_id left join cities on cities.id=location.city_id where company_id= ? limit 0,?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $company_id,$data['limit']);
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
		
		
		function executeTransaction($data)
		{
			
			
			$url='https://www.qmatchup.com/beta/company/index.php/UpdateUserCompany';
			
			$fields = Array('userandcompanydata' => urlencode($data));
			//$fields[]
			$ch = curl_init();
			
			//set the url, number of POST vars, POST data
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
			$result = curl_exec($ch);
			//echo curl_error($ch); 
			//close connection
			curl_close($ch); //die;
			return $result;
		}
		
		
		
	}
