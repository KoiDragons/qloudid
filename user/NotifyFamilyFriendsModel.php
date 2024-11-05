<?php
	require_once('../AppModel.php');
	class NotifyFamilyFriendsModel extends AppModel
	{
		function sendOtp()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select country_code  from phone_country_code where country_name=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['sender_count']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$phone="+".trim($row['country_code'])."".trim($_POST['pno']);
			$num=(mt_rand(1111111,9999999)); 
			$subject='Your one time password(OTP) is:'.$num;
			$to=$phone;
			$html='Ditt engångslösenord:'.$num;
			$res=sendSms($subject, $to, $html);
			$rs=json_decode($res,true);
			
			if($rs['status']=='OK')
			{
				$stmt = $dbCon->prepare("insert into verify_user_phone (otp,created_on) values(?, now())");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $num);
				$stmt->execute();
				$id=$stmt->insert_id;
				$stmt->close();
				$dbCon->close();
				return $id;
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		}
		
		function verifyOtp($data)
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt('decrypt',$data['id']);
			
			$stmt = $dbCon->prepare("select otp  from verify_user_phone where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['infor_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if($row['otp']==$_POST['otp'])
			{
			
			
			$stmt = $dbCon->prepare("update notify_family_friends_private set country_name=?,phone_number=? where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ssi", $_POST['sender_count'],$_POST['pno'],$id);
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
		
		function notifyRelatives($data)
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("select address,person_heart_user_id,message_for_kin,phone_number,country_code from notify_family_friends left join phone_country_code on phone_country_code.country_name=notify_family_friends.country_name where notify_family_friends.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code,receiver_id as uid from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.receiver_id left join user_profiles on connect_next_kin.receiver_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.sender_id=? 
				union
			select concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code,sender_id as uid  from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.sender_id left join user_profiles on connect_next_kin.sender_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.receiver_id=?  order by first_name limit 0,20");
				
				/* bind parameters for markers */
				$stmt->bind_param("ii", $row['person_heart_user_id'],$row['person_heart_user_id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$org=array();
				$j=0;
				
				while($row_email = $result1->fetch_assoc())
				{
					
					$stmt = $dbCon->prepare("select country_code,phone_number  from user_profiles left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where user_profiles.user_logins_id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $row_email['uid']);
					$stmt->execute();
					$result_phone = $stmt->get_result();
					$row_phone = $result_phone->fetch_assoc();
					
				
						$adrs=$row['address'];
					
					$to=$row_email['email'];
					$subject       = 'Informationen om din vän/anhörig ';
					
					$emailContent ='En person har skickat följande meddelande om din vän/anhörig, '.$row['name'].'</br>
					
					Meddelande: '.$row['message_for_kin'].'</br>
					Plats: '.$adrs.'</br>
					Mobil: +'.$row['country_code'].' '.$row['phone_number'].'
					';
					
					
					sendEmail($subject, $to, $emailContent);	
					$phone='+'.trim($row_phone['country_code']).''.trim($row_phone['phone_number']);
					$subject='Informationen om din vän/anhörig';
					$to=$phone;
					$html='Meddelandet berör '.$row['first_name'].'
					Meddelande: '.$row['message_for_kin'].'
					Plats: '.$adrs.'
					Mitt mobil nr: +'.$row['country_code'].' '.$row['phone_number'];
					
					$res=sendSms($subject, $to, $html);
					
				}
				
				$stmt->close();
				$dbCon->close();
				
				return 1;
			
		}
		
		
		
		
		function createPopup()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name  from country where id>0 and id<240 order by country_name");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			$contry = '';
			while ($row = $result->fetch_assoc()) {
				
				$contry=$contry.'<option value="'.$row['country_name'].'">'.$row['country_name'].'</option>';
			}
			
				$stmt = $dbCon->prepare("select user_logins_id  from user_profiles where ssn=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("s", $_POST['ssecurity']);
				$stmt->execute();
				$result = $stmt->get_result();
				
				$row = $result->fetch_assoc();
				if(empty($row))
				{
					$org='
					<div class="padb5 ">
					<h1 class="padb5 tall fsz30">SOS <span class="fa fa-heart red_txt"></span> F&F</h1>
					<p class="pad0 tall fsz18 padb10 brdb wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb15">På uppdrag från familj och vänner till denna personen - Tackar vi dig<span class="padl10 fa fa-praying-hands"></span></p>
					</div>
					
					<h3 class="pos_rel marb0  pad25 padr40 bold fsz20 dark_grey_txt lgtgrey2_bg">
					Den skadade är tyvärr inte registrerad på SOS F&F
					
					</h3>
					
					<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla mart15"> <a href="#" class="close_popup_modal wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2" >Close</a> 
					
					</div>
					';
					
					return $org;
				}
				else 
				
				{
					$stmt = $dbCon->prepare("select user_logins.id,ssn,first_name,last_name  from user_logins left join user_profiles on user_logins.id=user_profiles.user_logins_id where user_logins.id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['user_logins_id']);
					$stmt->execute();
					$result1 = $stmt->get_result();
					
					$row_user = $result1->fetch_assoc();
					$idtype=1;
					$stmt = $dbCon->prepare("insert into inform_relatives(idtype,country_name , social_security_number , description,  address, user_id) 
			values(?, ?, ?, ?, ?, ? )");
			$address=$_POST['adrs'].",".$_POST['postal_code'];
			/* bind parameters for markers */
			$stmt->bind_param("issssi", $idtype, $_POST['sender_count'], $_POST['ssecurity'], $_POST['info'], $address,$row_user['id']);
					
					
					if (!$stmt->execute()) {
						
						$stmt->close();
						$dbCon->close();
						$org='
						<div class="padb5 ">
						<h1 class="padb5 tall fsz30">SOS <span class="fa fa-heart red_txt"></span> F&F</h1>
						<p class="pad0 tall fsz18 padb10 brdb wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb15">På uppdrag från familj och vänner till denna personen - Tackar vi dig<span class="padl10 fa fa-praying-hands"></span></p>
						</div>
						
						<h3 class="pos_rel marb0  pad25 padr40 bold fsz20 dark_grey_txt lgtgrey2_bg">
						Förfrågan misslyckades
						
						</h3>
						
						<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla mart15"> <a href="#" class="close_popup_modal wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2" >Close</a> 
						
						</div>
						
						';
						
						return $org;
					}
					else 
					{
						$id=$stmt->insert_id;
						$id=$this->encrypt_decrypt('encrypt',$id);
					}
				}
				
			$general='<div class="result-item padtb0 ">
			<div class="dflex alit_c">
			<div class="flex_1">
			
			<div class="fsz16 dgrey_txt bold">
			<span class="marr5 valm">Allmän</span>
			
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
			<div class="sources-content dnone" style="display: none;">
			<ul class="mar0 pad0 padt10 fsz14 ">
			<li class="dflex mart10  padb5">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#">ID Typ</a>
			</div>
			<span class="fxshrink_0 marl100 talr">Driving license</span>
			</li>
			
			<li class="dflex mart10  padb5">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#">Land</a>
			</div>
			<span class="fxshrink_0 marl100">'.$_POST['cntry'].'</span>
			</li>
			<li class="dflex mart10  padb5">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#">Pers nr.</a>
			</div>
			<span class="fxshrink_0 marl100">'.$row_user['ssn'].'</span>
			</li>
			<li class="dflex mart10  padb5">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#">Namn</a>
			</div>
			<span class="fxshrink_0 marl100">'.$row_user['first_name'].'</span>
			</li>
			<li class="dflex mart10  padb5">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#">Efternamn</a>
			</div>
			<span class="fxshrink_0 marl100">'.$row_user['last_name'].'</span>
			</li>
			
			</ul>
			</div>
			</div>';
			
			
			
			
			$org='<h2 class="marb10 pad0 bold fsz24 black_txt talc">Signera med sms & kod</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16">Vi på Qloud ID vill tacka dig på förhand för din medmänsklighet </span>
				</div>
				
				
			</div>
					
			<!-- Center content -->
			<div class="wi_350p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10 lgtgrey2_bg brdrad3">
			<div class="padtb0 brdrad3 lgtgrey2_bg">
			
			
			
			
			
			
			<div class="" id="search_data">
			
			
			'.$general.'
			
			
			</div>
			
			</div>
			
			</div>
			
			
			
			
			<div class="padb0">
			<div class="on_clmn mart10">
											
											
												
												<div class="pos_rel">
													
													<select id="sender_count" name="sender_count" class="default_view wi_100 mart0 lgtgrey2_bg nobrd fsz18 txtind10  hei_50p  dark_grey_txt talc padl0"  >
														
														'.$contry.'
														
													</select>
												</div>
											
										</div>
			<div class="on_clmn martb10">
			<div class="pos_rel">
			
			<input type="text" name="pno" id="pno" placeholder="Mobil nr" max="9999999999" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5">
			</div>
			</div>
			</div>
			
			<div class="red_bg" id="error_msg_phone">
			
			
			</div>
			<div class=" mart20 marb10">
				<input type="button" value="Generera kod" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="submit_info();">
				<input type="hidden" id="info_relat" name="infor_relat" value="'.$id.'"/>
			</div>
			
			
			<div class=" padb10 xs-padrl0 talc "> <a href="#" class="close_popup_modal fsz16 black_txt " >Cancel</a></div>
			';
			
			
			
			return $org;
		}
		
		
		function selectCountry()
		{
			$dbCon = AppModel::createConnection();
			
				$stmt = $dbCon->prepare("select id,country_name,country_code from phone_country_code order by country_name");
			
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
		
		
		
		
		function informRelativesPerson()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code,receiver_id as uid from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.receiver_id left join user_profiles on connect_next_kin.receiver_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.sender_id=? and is_approved=1 
			union
			select concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code,sender_id as uid  from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.sender_id left join user_profiles on connect_next_kin.sender_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.receiver_id=? and is_approved=1 order by first_name limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['user_id'],$_POST['user_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$org=array();
			$j=0;
			while($row_email = $result1->fetch_assoc())
			{
				
				$stmt = $dbCon->prepare("select country_code,phone_number  from user_profiles left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where user_profiles.user_logins_id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $row_email['uid']);
				$stmt->execute();
				$result_phone = $stmt->get_result();
				$row_phone = $result_phone->fetch_assoc();
				
				$adrs=$_POST['adrs1'];
				
				$to=$row_email['email'];
				$subject       = 'Informationen om din vän/anhörig ';
				
				$emailContent ='En person har skickat följande meddelande om din vän/anhörig, '.$row['name'].'</br>
				
				Meddelande: '.$_POST['info_msg'].'</br>
				Plats: '.$adrs.'</br>';
				
				
				sendEmail($subject, $to, $emailContent);	
				$phone='+'.trim($row_phone['country_code']).''.trim($row_phone['phone_number']);
				$subject='Informationen om din vän/anhörig';
				$to=$phone;
				$html='Meddelandet berör
				Meddelande: '.$_POST['info_msg'].'
				Plats: '.$adrs;
				
				$res=sendSms($subject, $to, $html);
				
			}
			$stmt->close();
			$dbCon->close();
			
			return 1;
		}
		
		function addInfo($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("INSERT INTO notify_family_friends_private (person_heart_user_id, first_name, last_name, created_on,user_id ) VALUES (?, ?,  ?, now(), ?)");
				
				$st=0;
				$stmt->bind_param("issi", $_POST['user_id'],htmlentities($_POST['f_name'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['l_name'],ENT_NOQUOTES, 'ISO-8859-1'),$data['user_id']); // ss -> string string
				 
				if (!$stmt->execute()) {
					$stmt->close();
					$dbCon->close();
					return 0;
					} else {
					$id=$stmt->insert_id;
					$id=$this->encrypt_decrypt('encrypt',$id);
					$stmt->close();
					$dbCon->close();
					return $id;
				}
			}
		function uploadPhoto($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$data1 = strip_tags($_POST['indexing_save']);
			
			define('UPLOAD_DIR','../estorecss/'); 
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			
			$stmt = $dbCon->prepare("update notify_family_friends_private set image_path=? where id=?");
			$stmt->bind_param("si",$img_name1,$id);
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
		
		
		function updateAddress($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			
			$stmt = $dbCon->prepare("update notify_family_friends_private set address=? where id=?");
			$stmt->bind_param("si",$_POST['adrs1'],$id);
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
		
		
		function checkUserAvailability()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select user_logins.id  from user_logins left join user_profiles on user_logins.id=user_profiles.user_logins_id where ssn=? and country_of_residence=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("si", $_POST['ssecurity1'],$_POST['country']);
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
				$stmt = $dbCon->prepare("select id from notify_family_friends where person_heart_user_id=?  and is_found=0");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowFound = $result->fetch_assoc();
				if(empty($rowFound))
				{
				$stmt = $dbCon->prepare("select id from notify_family_friends_private where person_heart_user_id=? and is_found=0");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowFound = $result->fetch_assoc();	
				if(empty($rowFound))
				{
				$stmt->close();
				$dbCon->close();
				return $row['id'];
				}
				else
				{
				$stmt->close();
				$dbCon->close();
				return -1;
				}
				
				}
				
				
			}
		}
		
		function notificationReceived()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select notify_family_friends.image_path,notify_family_friends.id,concat_ws(' ',notify_family_friends.first_name,notify_family_friends.last_name) as sender_name,concat_ws(' ',user_logins.first_name,user_logins.last_name) as injured_name from notify_family_friends left join user_logins on user_logins.id=notify_family_friends.person_heart_user_id order by notify_family_friends.created_on desc limit 0,50");
			
			/* bind parameters for markers */
			$j=0;
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
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
	function moreNotificationReceived()
		{
			$dbCon = AppModel::createConnection();
			$a=$data['id']*50+1;
			$b=50;
			$stmt = $dbCon->prepare("select notify_family_friends.image_path,notify_family_friends.id,concat_ws(' ',notify_family_friends.first_name,notify_family_friends.last_name) as sender_name,concat_ws(' ',user_logins.first_name,user_logins.last_name) as injured_name from notify_family_friends left join user_logins on user_logins.id=notify_family_friends.person_heart_user_id order by notify_family_friends.created_on desc limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii",$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
			if($row['image_path']==null || $row['image_path']=='') $img='No'; else $img='Yes'; 
			$enc=$this -> encrypt_decrypt('encrypt',$row['id']);	
			$org=$org.'<div class=" white_bg marb15 mart5  brdrad3 box_shadow bg_fffbcc_a" style="">
										<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
													
													<div class="fleft wi_30 xs-wi_100 sm-wi_30 xsip-wi_30  marl15 xs-mar0 padb10 xs-padb15"> <span class="trn" data-trn-key="Injured Person">Injured Person</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16">'.html_entity_decode($row['injured_name']).'</span> </div>
													<div class="fleft wi_30 xs-wi_100 sm-wi_30 xsip-wi_30 marl15 xs-mar0 padb10 xs-padb15"> <span class="trn" data-trn-key="Sender name">Sender name</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16">'.html_entity_decode($row['sender_name']).'</span> </div>
													<div class="fleft wi_15 xs-wi_100 sm-wi_20 xsip-wi_20 marl15 xs-mar0 padb10 xs-padb15"> <span class="trn" data-trn-key="Image">Image</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16">'.$img.'</span> </div>
													<div class="fright wi_10 padl0 xs-wi_100 sm-wi_100 marl15 fsz40  xs-mar0 padb0 hidden-xs hidden-sm hidden-xsip">
														<a href="notifyRelatives/'.$enc.'" ><span class="fas fa-arrow-alt-circle-right"></span></a>
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
}									