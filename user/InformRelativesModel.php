<?php
	require_once('../AppModel.php');
	class InformRelativesModel extends AppModel
	{
		
		
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
		
		
		function sendOtp()
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt('decrypt',$_POST['info_relat']);
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
				$stmt = $dbCon->prepare("update inform_relatives set otp=?,sender_country=?, sender_phone_number=? where id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("issi", $num,$_POST['sender_count'],$_POST['pno'],$id);
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
		
		
		function verifyOtp()
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt('decrypt',$_POST['infor_id']);
			$stmt = $dbCon->prepare("select first_name,user_id,otp,description,location,sender_phone_number,country_code,concat_ws(' ', first_name, last_name) as name,address  from inform_relatives left join phone_country_code on phone_country_code.country_name=inform_relatives.sender_country left join user_logins on user_logins.id=inform_relatives.user_id where inform_relatives.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if($row['otp']==$_POST['otp'])
			{
				$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code,receiver_id as uid from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.receiver_id left join user_profiles on connect_next_kin.receiver_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.sender_id=? and is_approved=1 
				union
				select concat_ws(' ', first_name, last_name) as name,connect_next_kin.id,last_name,first_name,email,connect_next_kin.created_on,country_phone_id,connect_phone,connect_by,country_phone,phone_number,country_code,sender_id as uid  from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.sender_id left join user_profiles on connect_next_kin.sender_id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where connect_next_kin.receiver_id=? and is_approved=1 order by first_name limit 0,20");
				
				/* bind parameters for markers */
				$stmt->bind_param("ii", $row['user_id'],$row['user_id']);
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
					
					if($row['location']=='Current')
					{
						$adrs=$row['address'];
					}
					
					else
					{
						$adrs="(".$row['location'].") ".$row['address'];
					}
					$to=$row_email['email'];
					$subject       = 'Informationen om din vän/anhörig ';
					
					$emailContent ='En person har skickat följande meddelande om din vän/anhörig, '.$row['name'].'</br>
					
					Meddelande: '.$row['description'].'</br>
					Plats: '.$adrs.'</br>
					Mobil: +'.$row['country_code'].' '.$row['sender_phone_number'].'
					';
					
					
					sendEmail($subject, $to, $emailContent);	
					$phone='+'.trim($row_phone['country_code']).''.trim($row_phone['phone_number']);
					$subject='Informationen om din vän/anhörig';
					$to=$phone;
					$html='Meddelandet berör '.$row['first_name'].'
					Meddelande: '.$row['description'].'
					Plats: '.$adrs.'
					Mitt mobil nr: +'.$row['country_code'].' '.$row['sender_phone_number'];
					
					$res=sendSms($subject, $to, $html);
					
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
		
		
		
		function createPopup()
		{
			$dbCon = AppModel::createConnection();
			
			
			if($_POST['idtype']==1)
			{
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
					
					$stmt = $dbCon->prepare("insert into inform_relatives(idtype,country_name , social_security_number , description, location , address, user_id) 
					values(?, ?, ?, ?, ?, ?, ? )");
					$address=$_POST['adrs'].",".$_POST['postal_code'];
					/* bind parameters for markers */
					$stmt->bind_param("isssssi", $_POST['idtype'], $_POST['cntry'], $_POST['ssecurity'], $_POST['info'], $_POST['travel_info'], $address,$row_user['id']);
					
					
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
				
			}
			if($_POST['idtype']==2)
			{
				$stmt = $dbCon->prepare("select user_logins_id  from user_profiles where country_phone=? and phone_number=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("ss", $_POST['cntry'],$_POST['uphno']);
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
					$stmt = $dbCon->prepare("insert into inform_relatives(idtype,country_name , phone_number , description, location , address, user_id) 
					values(?, ?, ?, ?, ?, ?, ? )");
					
					/* bind parameters for markers */
					$address=$_POST['adrs'].",".$_POST['postal_code'];
					
					$stmt->bind_param("isssssi", $_POST['idtype'], $_POST['cntry'], $_POST['uphno'], $_POST['info'], $_POST['travel_info'], $address,$row_user['id']);
					
					
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
				
			}
			$general='<div class="result-item padtb0 ">
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
			
			
			
			
			$org='<div class="padb5 ">
			<h1 class="padb5 tall fsz30">SOS <span class="fa fa-heart red_txt"></span> F&F</h1>
			<p class="pad0 tall fsz18 padb10 brdb wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb15">På uppdrag från familj och vänner till denna personen - Tackar vi dig<span class="padl10 fa fa-praying-hands"></span></p>
			</div>
			
			<!-- Center content -->
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla padrl10 lgtgrey2_bg brdrad3 padb10">
			<div class="padtrl15 brdrad3 ">
			
			
			
			
			
			
			<div class="" id="search_data">
			
			
			'.$general.'
			
			
			</div>
			
			</div>
			
			</div>
			<div class="mart0 pad15 lgtgrey2_bg">
			<label class="marb5  padl10">Välj land</label>
			<div class="pos_rel padrl10">
			<div class="wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
			<select id="sender_count" name="sender_count" class="txtind25 default_view wi_100 mart5 rbrdr pad10  white_bg hei_40p black_txt">
			
			
			<option value="Aruba" class="lgtgrey2_bg">Aruba</option>
			
			<option value="Afghanistan" class="lgtgrey2_bg">Afghanistan</option>
			
			<option value="Angola" class="lgtgrey2_bg">Angola</option>
			
			<option value="Anguilla" class="lgtgrey2_bg">Anguilla</option>
			
			<option value="Albania" class="lgtgrey2_bg">Albania</option>
			
			<option value="Andorra" class="lgtgrey2_bg">Andorra</option>
			
			<option value="Netherlands Antilles" class="lgtgrey2_bg">Netherlands Antilles</option>
			
			<option value="United Arab Emirates" class="lgtgrey2_bg">United Arab Emirates</option>
			
			<option value="Argentina" class="lgtgrey2_bg">Argentina</option>
			
			<option value="Armenia" class="lgtgrey2_bg">Armenia</option>
			
			<option value="American Samoa" class="lgtgrey2_bg">American Samoa</option>
			
			<option value="Antarctica" class="lgtgrey2_bg">Antarctica</option>
			
			<option value="French Southern territories" class="lgtgrey2_bg">French Southern territories</option>
			
			<option value="Antigua and Barbuda" class="lgtgrey2_bg">Antigua and Barbuda</option>
			
			<option value="Australia" class="lgtgrey2_bg">Australia</option>
			
			<option value="Austria" class="lgtgrey2_bg">Austria</option>
			
			<option value="Azerbaijan" class="lgtgrey2_bg">Azerbaijan</option>
			
			<option value="Burundi" class="lgtgrey2_bg">Burundi</option>
			
			<option value="Belgium" class="lgtgrey2_bg">Belgium</option>
			
			<option value="Benin" class="lgtgrey2_bg">Benin</option>
			
			<option value="Burkina Faso" class="lgtgrey2_bg">Burkina Faso</option>
			
			<option value="Bangladesh" class="lgtgrey2_bg">Bangladesh</option>
			
			<option value="Bulgaria" class="lgtgrey2_bg">Bulgaria</option>
			
			<option value="Bahrain" class="lgtgrey2_bg">Bahrain</option>
			
			<option value="Bahamas" class="lgtgrey2_bg">Bahamas</option>
			
			<option value="Bosnia and Herzegovina" class="lgtgrey2_bg">Bosnia and Herzegovina</option>
			
			<option value="Belarus" class="lgtgrey2_bg">Belarus</option>
			
			<option value="Belize" class="lgtgrey2_bg">Belize</option>
			
			<option value="Bermuda" class="lgtgrey2_bg">Bermuda</option>
			
			<option value="Bolivia" class="lgtgrey2_bg">Bolivia</option>
			
			<option value="Brazil" class="lgtgrey2_bg">Brazil</option>
			
			<option value="Barbados" class="lgtgrey2_bg">Barbados</option>
			
			<option value="Brunei" class="lgtgrey2_bg">Brunei</option>
			
			<option value="Bhutan" class="lgtgrey2_bg">Bhutan</option>
			
			<option value="Bouvet Island" class="lgtgrey2_bg">Bouvet Island</option>
			
			<option value="Botswana" class="lgtgrey2_bg">Botswana</option>
			
			<option value="Central African Republic" class="lgtgrey2_bg">Central African Republic</option>
			
			<option value="Canada" class="lgtgrey2_bg">Canada</option>
			
			<option value="Cocos (Keeling) Islands" class="lgtgrey2_bg">Cocos (Keeling) Islands</option>
			
			<option value="Switzerland" class="lgtgrey2_bg">Switzerland</option>
			
			<option value="Chile" class="lgtgrey2_bg">Chile</option>
			
			<option value="China" class="lgtgrey2_bg">China</option>
			
			<option value="CÃ´te dâ€™Ivoire" class="lgtgrey2_bg">CÃ´te dâ€™Ivoire</option>
			
			<option value="Cameroon" class="lgtgrey2_bg">Cameroon</option>
			
			<option value="Congo, The Democratic Republic" class="lgtgrey2_bg">Congo, The Democratic Republic</option>
			
			<option value="Congo" class="lgtgrey2_bg">Congo</option>
			
			<option value="Cook Islands" class="lgtgrey2_bg">Cook Islands</option>
			
			<option value="Colombia" class="lgtgrey2_bg">Colombia</option>
			
			<option value="Comoros" class="lgtgrey2_bg">Comoros</option>
			
			<option value="Cape Verde" class="lgtgrey2_bg">Cape Verde</option>
			
			<option value="Costa Rica" class="lgtgrey2_bg">Costa Rica</option>
			
			<option value="Cuba" class="lgtgrey2_bg">Cuba</option>
			
			<option value="Christmas Island" class="lgtgrey2_bg">Christmas Island</option>
			
			<option value="Cayman Islands" class="lgtgrey2_bg">Cayman Islands</option>
			
			<option value="Cyprus" class="lgtgrey2_bg">Cyprus</option>
			
			<option value="Czech Republic" class="lgtgrey2_bg">Czech Republic</option>
			
			<option value="Germany" class="lgtgrey2_bg">Germany</option>
			
			<option value="Djibouti" class="lgtgrey2_bg">Djibouti</option>
			
			<option value="Dominica" class="lgtgrey2_bg">Dominica</option>
			
			<option value="Denmark" class="lgtgrey2_bg">Denmark</option>
			
			<option value="Dominican Republic" class="lgtgrey2_bg">Dominican Republic</option>
			
			<option value="Algeria" class="lgtgrey2_bg">Algeria</option>
			
			<option value="Ecuador" class="lgtgrey2_bg">Ecuador</option>
			
			<option value="Egypt" class="lgtgrey2_bg">Egypt</option>
			
			<option value="Eritrea" class="lgtgrey2_bg">Eritrea</option>
			
			<option value="Western Sahara" class="lgtgrey2_bg">Western Sahara</option>
			
			<option value="Spain" class="lgtgrey2_bg">Spain</option>
			
			<option value="Estonia" class="lgtgrey2_bg">Estonia</option>
			
			<option value="Ethiopia" class="lgtgrey2_bg">Ethiopia</option>
			
			<option value="Finland" class="lgtgrey2_bg">Finland</option>
			
			<option value="Fiji Islands" class="lgtgrey2_bg">Fiji Islands</option>
			
			<option value="Falkland Islands" class="lgtgrey2_bg">Falkland Islands</option>
			
			<option value="France" class="lgtgrey2_bg">France</option>
			
			<option value="Faroe Islands" class="lgtgrey2_bg">Faroe Islands</option>
			
			<option value="Micronesia, Federated States o" class="lgtgrey2_bg">Micronesia, Federated States o</option>
			
			<option value="Gabon" class="lgtgrey2_bg">Gabon</option>
			
			<option value="United Kingdom" class="lgtgrey2_bg">United Kingdom</option>
			
			<option value="Georgia" class="lgtgrey2_bg">Georgia</option>
			
			<option value="Ghana" class="lgtgrey2_bg">Ghana</option>
			
			<option value="Gibraltar" class="lgtgrey2_bg">Gibraltar</option>
			
			<option value="Guinea" class="lgtgrey2_bg">Guinea</option>
			
			<option value="Guadeloupe" class="lgtgrey2_bg">Guadeloupe</option>
			
			<option value="Gambia" class="lgtgrey2_bg">Gambia</option>
			
			<option value="Guinea-Bissau" class="lgtgrey2_bg">Guinea-Bissau</option>
			
			<option value="Equatorial Guinea" class="lgtgrey2_bg">Equatorial Guinea</option>
			
			<option value="Greece" class="lgtgrey2_bg">Greece</option>
			
			<option value="Grenada" class="lgtgrey2_bg">Grenada</option>
			
			<option value="Greenland" class="lgtgrey2_bg">Greenland</option>
			
			<option value="Guatemala" class="lgtgrey2_bg">Guatemala</option>
			
			<option value="French Guiana" class="lgtgrey2_bg">French Guiana</option>
			
			<option value="Guam" class="lgtgrey2_bg">Guam</option>
			
			<option value="Guyana" class="lgtgrey2_bg">Guyana</option>
			
			<option value="Hong Kong" class="lgtgrey2_bg">Hong Kong</option>
			
			<option value="Heard Island and McDonald Isla" class="lgtgrey2_bg">Heard Island and McDonald Isla</option>
			
			<option value="Honduras" class="lgtgrey2_bg">Honduras</option>
			
			<option value="Croatia" class="lgtgrey2_bg">Croatia</option>
			
			<option value="Haiti" class="lgtgrey2_bg">Haiti</option>
			
			<option value="Hungary" class="lgtgrey2_bg">Hungary</option>
			
			<option value="Indonesia" class="lgtgrey2_bg">Indonesia</option>
			
			<option value="India" class="lgtgrey2_bg">India</option>
			
			<option value="British Indian Ocean Territory" class="lgtgrey2_bg">British Indian Ocean Territory</option>
			
			<option value="Ireland" class="lgtgrey2_bg">Ireland</option>
			
			<option value="Iran" class="lgtgrey2_bg">Iran</option>
			
			<option value="Iraq" class="lgtgrey2_bg">Iraq</option>
			
			<option value="Iceland" class="lgtgrey2_bg">Iceland</option>
			
			<option value="Israel" class="lgtgrey2_bg">Israel</option>
			
			<option value="Italy" class="lgtgrey2_bg">Italy</option>
			
			<option value="Jamaica" class="lgtgrey2_bg">Jamaica</option>
			
			<option value="Jordan" class="lgtgrey2_bg">Jordan</option>
			
			<option value="Japan" class="lgtgrey2_bg">Japan</option>
			
			<option value="Kazakstan" class="lgtgrey2_bg">Kazakstan</option>
			
			<option value="Kenya" class="lgtgrey2_bg">Kenya</option>
			
			<option value="Kyrgyzstan" class="lgtgrey2_bg">Kyrgyzstan</option>
			
			<option value="Cambodia" class="lgtgrey2_bg">Cambodia</option>
			
			<option value="Kiribati" class="lgtgrey2_bg">Kiribati</option>
			
			<option value="Saint Kitts and Nevis" class="lgtgrey2_bg">Saint Kitts and Nevis</option>
			
			<option value="South Korea" class="lgtgrey2_bg">South Korea</option>
			
			<option value="Kuwait" class="lgtgrey2_bg">Kuwait</option>
			
			<option value="Laos" class="lgtgrey2_bg">Laos</option>
			
			<option value="Lebanon" class="lgtgrey2_bg">Lebanon</option>
			
			<option value="Liberia" class="lgtgrey2_bg">Liberia</option>
			
			<option value="Libyan Arab Jamahiriya" class="lgtgrey2_bg">Libyan Arab Jamahiriya</option>
			
			<option value="Saint Lucia" class="lgtgrey2_bg">Saint Lucia</option>
			
			<option value="Liechtenstein" class="lgtgrey2_bg">Liechtenstein</option>
			
			<option value="Sri Lanka" class="lgtgrey2_bg">Sri Lanka</option>
			
			<option value="Lesotho" class="lgtgrey2_bg">Lesotho</option>
			
			<option value="Lithuania" class="lgtgrey2_bg">Lithuania</option>
			
			<option value="Luxembourg" class="lgtgrey2_bg">Luxembourg</option>
			
			<option value="Latvia" class="lgtgrey2_bg">Latvia</option>
			
			<option value="Macao" class="lgtgrey2_bg">Macao</option>
			
			<option value="Morocco" class="lgtgrey2_bg">Morocco</option>
			
			<option value="Monaco" class="lgtgrey2_bg">Monaco</option>
			
			<option value="Moldova" class="lgtgrey2_bg">Moldova</option>
			
			<option value="Madagascar" class="lgtgrey2_bg">Madagascar</option>
			
			<option value="Maldives" class="lgtgrey2_bg">Maldives</option>
			
			<option value="Mexico" class="lgtgrey2_bg">Mexico</option>
			
			<option value="Marshall Islands" class="lgtgrey2_bg">Marshall Islands</option>
			
			<option value="Macedonia" class="lgtgrey2_bg">Macedonia</option>
			
			<option value="Mali" class="lgtgrey2_bg">Mali</option>
			
			<option value="Malta" class="lgtgrey2_bg">Malta</option>
			
			<option value="Myanmar" class="lgtgrey2_bg">Myanmar</option>
			
			<option value="Mongolia" class="lgtgrey2_bg">Mongolia</option>
			
			<option value="Northern Mariana Islands" class="lgtgrey2_bg">Northern Mariana Islands</option>
			
			<option value="Mozambique" class="lgtgrey2_bg">Mozambique</option>
			
			<option value="Mauritania" class="lgtgrey2_bg">Mauritania</option>
			
			<option value="Montserrat" class="lgtgrey2_bg">Montserrat</option>
			
			<option value="Martinique" class="lgtgrey2_bg">Martinique</option>
			
			<option value="Mauritius" class="lgtgrey2_bg">Mauritius</option>
			
			<option value="Malawi" class="lgtgrey2_bg">Malawi</option>
			
			<option value="Malaysia" class="lgtgrey2_bg">Malaysia</option>
			
			<option value="Mayotte" class="lgtgrey2_bg">Mayotte</option>
			
			<option value="Namibia" class="lgtgrey2_bg">Namibia</option>
			
			<option value="New Caledonia" class="lgtgrey2_bg">New Caledonia</option>
			
			<option value="Niger" class="lgtgrey2_bg">Niger</option>
			
			<option value="Norfolk Island" class="lgtgrey2_bg">Norfolk Island</option>
			
			<option value="Nigeria" class="lgtgrey2_bg">Nigeria</option>
			
			<option value="Nicaragua" class="lgtgrey2_bg">Nicaragua</option>
			
			<option value="Niue" class="lgtgrey2_bg">Niue</option>
			
			<option value="Netherlands" class="lgtgrey2_bg">Netherlands</option>
			
			<option value="Norway" class="lgtgrey2_bg">Norway</option>
			
			<option value="Nepal" class="lgtgrey2_bg">Nepal</option>
			
			<option value="Nauru" class="lgtgrey2_bg">Nauru</option>
			
			<option value="New Zealand" class="lgtgrey2_bg">New Zealand</option>
			
			<option value="Oman" class="lgtgrey2_bg">Oman</option>
			
			<option value="Pakistan" class="lgtgrey2_bg">Pakistan</option>
			
			<option value="Panama" class="lgtgrey2_bg">Panama</option>
			
			<option value="Pitcairn" class="lgtgrey2_bg">Pitcairn</option>
			
			<option value="Peru" class="lgtgrey2_bg">Peru</option>
			
			<option value="Philippines" class="lgtgrey2_bg">Philippines</option>
			
			<option value="Palau" class="lgtgrey2_bg">Palau</option>
			
			<option value="Papua New Guinea" class="lgtgrey2_bg">Papua New Guinea</option>
			
			<option value="Poland" class="lgtgrey2_bg">Poland</option>
			
			<option value="Puerto Rico" class="lgtgrey2_bg">Puerto Rico</option>
			
			<option value="North Korea" class="lgtgrey2_bg">North Korea</option>
			
			<option value="Portugal" class="lgtgrey2_bg">Portugal</option>
			
			<option value="Paraguay" class="lgtgrey2_bg">Paraguay</option>
			
			<option value="Palestine" class="lgtgrey2_bg">Palestine</option>
			
			<option value="French Polynesia" class="lgtgrey2_bg">French Polynesia</option>
			
			<option value="Qatar" class="lgtgrey2_bg">Qatar</option>
			
			<option value="RÃ©union" class="lgtgrey2_bg">RÃ©union</option>
			
			<option value="Romania" class="lgtgrey2_bg">Romania</option>
			
			<option value="Russian Federation" class="lgtgrey2_bg">Russian Federation</option>
			
			<option value="Rwanda" class="lgtgrey2_bg">Rwanda</option>
			
			<option value="Saudi Arabia" class="lgtgrey2_bg">Saudi Arabia</option>
			
			<option value="Sudan" class="lgtgrey2_bg">Sudan</option>
			
			<option value="Senegal" class="lgtgrey2_bg">Senegal</option>
			
			<option value="Singapore" class="lgtgrey2_bg">Singapore</option>
			
			<option value="South Georgia and the South Sa" class="lgtgrey2_bg">South Georgia and the South Sa</option>
			
			<option value="Saint Helena" class="lgtgrey2_bg">Saint Helena</option>
			
			<option value="Svalbard and Jan Mayen" class="lgtgrey2_bg">Svalbard and Jan Mayen</option>
			
			<option value="Solomon Islands" class="lgtgrey2_bg">Solomon Islands</option>
			
			<option value="Sierra Leone" class="lgtgrey2_bg">Sierra Leone</option>
			
			<option value="El Salvador" class="lgtgrey2_bg">El Salvador</option>
			
			<option value="San Marino" class="lgtgrey2_bg">San Marino</option>
			
			<option value="Somalia" class="lgtgrey2_bg">Somalia</option>
			
			<option value="Saint Pierre and Miquelon" class="lgtgrey2_bg">Saint Pierre and Miquelon</option>
			
			<option value="Sao Tome and Principe" class="lgtgrey2_bg">Sao Tome and Principe</option>
			
			<option value="Suriname" class="lgtgrey2_bg">Suriname</option>
			
			<option value="Slovakia" class="lgtgrey2_bg">Slovakia</option>
			
			<option value="Slovenia" class="lgtgrey2_bg">Slovenia</option>
			
			<option value="Sweden" selected="" class="lgtgrey2_bg">Sweden</option>
			
			<option value="Swaziland" class="lgtgrey2_bg">Swaziland</option>
			
			<option value="Seychelles" class="lgtgrey2_bg">Seychelles</option>
			
			<option value="Syria" class="lgtgrey2_bg">Syria</option>
			
			<option value="Turks and Caicos Islands" class="lgtgrey2_bg">Turks and Caicos Islands</option>
			
			<option value="Chad" class="lgtgrey2_bg">Chad</option>
			
			<option value="Togo" class="lgtgrey2_bg">Togo</option>
			
			<option value="Thailand" class="lgtgrey2_bg">Thailand</option>
			
			<option value="Tajikistan" class="lgtgrey2_bg">Tajikistan</option>
			
			<option value="Tokelau" class="lgtgrey2_bg">Tokelau</option>
			
			<option value="Turkmenistan" class="lgtgrey2_bg">Turkmenistan</option>
			
			<option value="East Timor" class="lgtgrey2_bg">East Timor</option>
			
			<option value="Tonga" class="lgtgrey2_bg">Tonga</option>
			
			<option value="Trinidad and Tobago" class="lgtgrey2_bg">Trinidad and Tobago</option>
			
			<option value="Tunisia" class="lgtgrey2_bg">Tunisia</option>
			
			<option value="Turkey" class="lgtgrey2_bg">Turkey</option>
			
			<option value="Tuvalu" class="lgtgrey2_bg">Tuvalu</option>
			
			<option value="Taiwan" class="lgtgrey2_bg">Taiwan</option>
			
			<option value="Tanzania" class="lgtgrey2_bg">Tanzania</option>
			
			<option value="Uganda" class="lgtgrey2_bg">Uganda</option>
			
			<option value="Ukraine" class="lgtgrey2_bg">Ukraine</option>
			
			<option value="United States Minor Outlying I" class="lgtgrey2_bg">United States Minor Outlying I</option>
			
			<option value="Uruguay" class="lgtgrey2_bg">Uruguay</option>
			
			<option value="United States" class="lgtgrey2_bg">United States</option>
			
			<option value="Uzbekistan" class="lgtgrey2_bg">Uzbekistan</option>
			
			<option value="Holy See (Vatican City State)" class="lgtgrey2_bg">Holy See (Vatican City State)</option>
			
			<option value="Saint Vincent and the Grenadin" class="lgtgrey2_bg">Saint Vincent and the Grenadin</option>
			
			<option value="Venezuela" class="lgtgrey2_bg">Venezuela</option>
			
			<option value="Virgin Islands, British" class="lgtgrey2_bg">Virgin Islands, British</option>
			
			<option value="Virgin Islands, U.S." class="lgtgrey2_bg">Virgin Islands, U.S.</option>
			
			<option value="Vietnam" class="lgtgrey2_bg">Vietnam</option>
			
			<option value="Vanuatu" class="lgtgrey2_bg">Vanuatu</option>
			
			<option value="Wallis and Futuna" class="lgtgrey2_bg">Wallis and Futuna</option>
			
			<option value="Samoa" class="lgtgrey2_bg">Samoa</option>
			
			<option value="Yemen" class="lgtgrey2_bg">Yemen</option>
			
			<option value="Yugoslavia" class="lgtgrey2_bg">Yugoslavia</option>
			
			<option value="South Africa" class="lgtgrey2_bg">South Africa</option>
			
			<option value="Zambia" class="lgtgrey2_bg">Zambia</option>
			
			<option value="Zimbabwe" class="lgtgrey2_bg">Zimbabwe</option>
			
			</select>
			</div>
			</div>
			<div class="padrbl15 lgtgrey2_bg">
			<label class="marb5  padl10"> Fyll i ditt mobil nr</label>
			<div class="pos_rel padrl10">
			<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
			<input type="text" name="pno" id="pno" placeholder="Mobil nr" max="9999999999" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt">
			
			</div>
			</div>
			
			<div class="red_bg" id="error_msg_phone">
			
			
			</div>
			
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla mart15"> <a href="#" class="wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2" onclick="submit_info();">Signera med Mobilt BankId</a> 
			<input type="hidden" id="info_relat" name="infor_relat" value="'.$id.'"/>
			</div>
			';
			
			
			
			return $org;
		}
		
		function checkUserAvailability()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select user_logins_id  from user_profiles where ssn=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['ssecurity1']);
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
				return $row['user_logins_id'];
			}
		}
		
		
		
		
	}								