<?php
	require_once('../AppModel.php');
	class ActivationModel extends AppModel
	{
			function verifyLanguage()
		{
			$dbCon = AppModel::createConnection();
			
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			$stmt = $dbCon->prepare("select language_var from public_page_language where ip_address=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if(empty($row))
			{
				$stmt->close();
				$dbCon->close();
				return 'en';
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return $row['language_var'];
			}
		}
		
			function changeLanguage()
		{
			$dbCon = AppModel::createConnection();
			
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			
			$stmt = $dbCon->prepare("select id from public_page_language where ip_address=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s",$ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("INSERT INTO public_page_language (language_var, ip_address, created_on ) VALUES (?, ?, now())");
			
			/* bind parameters for markers */
			$stmt->bind_param("ss", $_POST['lang'],$ip);
			$stmt->execute();
			
			}
			else
			{
			$stmt = $dbCon->prepare("update public_page_language set language_var=? where ip_address=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ss", $_POST['lang'],$ip);
			$stmt->execute();
				
			}
			
				$stmt->close();
				$dbCon->close();
				return 1;
			
		}
		
		function activateAccount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select email_verification_code,password,verification_status from user_logins where email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $data['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$myrow  = $result->fetch_assoc();
			 
			if ($myrow['email_verification_code'] == $data['hash']) {
				$stmt->close();
				$dbCon->close();
				return 1;
				
				
				} else {
				$stmt->close();
				$dbCon->close();
				return 0;
				
			}
			
			
		}
		
		
		function updateAccount($data)
		{
			$dbCon = AppModel::createConnection();
			$SECRET_KEY = 'qloud_login:system';
			
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where email = ?");
				
				/* bind parameters for markers */
				$stmt->bind_param("s", $data['email']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row    = $result->fetch_assoc();
			
			$stmt   = $dbCon->prepare("UPDATE user_logins SET `verification_status`=?  WHERE `email`=?");
			$status = 1;
			/* bind parameters for markers */
			$stmt->bind_param("is", $status, $data['email']);
			
			$stmt->execute();
			if (!$stmt->execute()) {
				$stmt->close();
				$dbCon->close();
				return 0;
				} else {
				
				
				$userid = $row['id'];
				
				// print_r($_COOKIE); die;
				$expire = time() + 60 * 60;
				 if ($row['verification_status'] == 0) {
				 
				 $token = md5(uniqid(rand(), true)); // generate a token, should be 128 - 256 bit
				//storeTokenForUser($user, $token);
				$cookie = $this -> encrypt_decrypt('encrypt',$userid) . ':' . $token;
				$mac = hash_hmac('sha256', $cookie, $SECRET_KEY);
				$cookie .= ':' . $mac; //echo $cookie; die;
				//$value['cookie']=$cookie;
				//setcookie('rememberme', $cookie, '/');
				session_start();
				$_SESSION['rememberme_qid'] = $cookie;
				 
				 
				 
                    $_SESSION['user_id'] = $row['id'];
                    
                    $date = date('Y-m-d H:i:s');
                    $stmt = $dbCon->prepare("UPDATE user_logins SET `last_login`=? , login_hash=?, email_verification_code=?  WHERE `id`=?");
                    /* bind parameters for markers */
                    $stmt->bind_param("sssi", $date,  $mac, $mac, $_SESSION['user_id']);
                    $stmt->execute();
                   
                        start_Session($row['id']);
						$stmt->close();
				$dbCon->close();
                        return 2;
                    
                } else {
                  
				$stmt->close();
				$dbCon->close();
				return 1;
                }
				
			}
			
		}
		
		function restoreInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$SECRET_KEY = 'qloud_login:system';
			
			$stmt = $dbCon->prepare("select grading_status,id,concat_ws(' ',first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where email = ?");
				
				/* bind parameters for markers */
				$stmt->bind_param("s", $data['email']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row    = $result->fetch_assoc();
			
			$stmt   = $dbCon->prepare("UPDATE user_logins SET `email_verification_code`=?,verification_status=1,get_started_wizard_status=1  WHERE `email`=?");
			$status = 1;
			/* bind parameters for markers */
			$stmt->bind_param("is", $status, $data['email']);
			
			$stmt->execute();
			if (!$stmt->execute()) {
				$stmt->close();
				$dbCon->close();
				return 0;
				} else {
				
				
				$userid = $row['id'];
				 
				$expire = time() + 60 * 60;
				 
				 
				 $token = md5(uniqid(rand(), true)); 
				$cookie = $this -> encrypt_decrypt('encrypt',$userid) . ':' . $token;
				$mac = hash_hmac('sha256', $cookie, $SECRET_KEY);
				$cookie .= ':' . $mac;  
				session_start();
				$_SESSION['rememberme_qid'] = $cookie;
				 
				 
				 
                    $_SESSION['user_id'] = $row['id'];
                    
                    $date = date('Y-m-d H:i:s');
                    $stmt = $dbCon->prepare("UPDATE user_logins SET `last_login`=? , login_hash=?, email_verification_code=?  WHERE `id`=?");
                    /* bind parameters for markers */
                    $stmt->bind_param("sssi", $date,  $mac, $mac, $_SESSION['user_id']);
                    $stmt->execute();
                   
                        start_Session($row['id']);
						
						if($row['grading_status']==0)
						{
						$stmt->close();
						$dbCon->close();
                        return 1;	
						}
						else
						{
						$stmt = $dbCon->prepare("select count(id) as num from user_identification where user_id = ?");
				
						/* bind parameters for markers */
						$stmt->bind_param("i", $_SESSION['user_id']);
						$stmt->execute();
						$result = $stmt->get_result();
						$rowId    = $result->fetch_assoc();	
						if($rowId['num']==0)
						{
						$stmt->close();
						$dbCon->close();
                        return 2;
						}
						else
						{
						$stmt = $dbCon->prepare("select id,is_connected from user_certificates where user_id = ?");
				
						/* bind parameters for markers */
						$stmt->bind_param("i", $_SESSION['user_id']);
						$stmt->execute();
						$result = $stmt->get_result();
						$rowId    = $result->fetch_assoc();	
						if(empty($rowId))
						{
						$stmt->close();
						$dbCon->close();
                        return 3;	
						}
						else
						{
						if($rowId['is_connected']==0)
						{
						$id = $this -> encrypt_decrypt('encrypt',$rowId['id']);
						$stmt->close();
						$dbCon->close();
						header("location:../../../StoreData/certificateQr/".$id); die;
						}
						else
						{
						$stmt->close();
						$dbCon->close();
						header("location:../../../ReceivedRequest"); die;	
						}
						}
							
						}
						}
						
                    
                } 
				
			
			
		}
		
		function activateVolunteer($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			//echo $request_id; die;
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where id = (select user_id from corona_helping_hand where id=?)");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $request_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row    = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("select phone_verified from user_profiles where user_logins_id =?");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_profile    = $result->fetch_assoc();
			
			$stmt   = $dbCon->prepare("UPDATE corona_helping_hand SET `is_active`=1  WHERE `id`=?");
			 
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			
			$stmt->execute();
			if($row['get_started_wizard_status']==0)
			{
			$stmt   = $dbCon->prepare("UPDATE user_logins SET `verification_status`=1,get_started_wizard_status=1,grading_status=1  WHERE `id`=?");
			$status = 1;
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			
			$stmt->execute();
			} 
			
			$userid = $row['id'];
				
				// print_r($_COOKIE); die;
				$expire = time() + 60 * 60;
				 if ($row['verification_status'] == 0) {
				 $SECRET_KEY = 'qloud_login:system';
				 $token = md5(uniqid(rand(), true)); // generate a token, should be 128 - 256 bit
				//storeTokenForUser($user, $token);
				$cookie = $this -> encrypt_decrypt('encrypt',$userid) . ':' . $token;
				$mac = hash_hmac('sha256', $cookie, $SECRET_KEY);
				$cookie .= ':' . $mac; //echo $cookie; die;
				//$value['cookie']=$cookie;
				//setcookie('rememberme', $cookie, '/');
				session_start();
				$_SESSION['rememberme_qid'] = $cookie;
				 
				 
				 
                    $_SESSION['user_id'] = $row['id'];
                    
                    $date = date('Y-m-d H:i:s');
                    $stmt = $dbCon->prepare("UPDATE user_logins SET `last_login`=? , login_hash=?  WHERE `id`=?");
                    /* bind parameters for markers */
                    $stmt->bind_param("ssi", $date,  $mac,$_SESSION['user_id']);
                    $stmt->execute();
                   
                    start_Session($row['id']);
					//print_r($row);
					$to      =  $row['email'];
			$subject = "Welcome to Qloud ID";
			
			$emailContent = '<html><head></head><body><div style="margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding:0">

<center style="width:100%;table-layout:fixed">

<table   cellpadding="0" cellspacing="0" bgcolor="#F5F7F8" style="width:600px; max-width:100%; text-align:center">

<tbody><tr>

<td>

    <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8">

    <tbody><tr>

    <td>    

         <div style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:0px;padding-right:0px">

<table align="center" style="border-spacing:0;font-family:sans-serif;color:#f5f7f8;Margin:0 auto;width:100%" bgcolor="#F5F7F8">

       <tbody><tr>

<td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0" bgcolor="#F5F7F8">

        <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#f5f7f8" bgcolor="#F5F7F8">

            <tbody><tr>

               <td style="padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px;background-color:#f5f7f8;color:#f5f7f8;width:100%;font-size:1px;line-height:1px;text-align:left;display:none!important">

                 <p style="text-align:left;line-height:6px;Margin-top:0px;Margin-bottom:0px">Dina domäner är inställda på att förnyas automatiskt. Öppna det här e-postmeddelandet för att säkerställa att allt fortfarande är uppdaterat. Och glöm inte att du får 20 % rabatt på nya produkter. &nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;</p>

                 <div style="display:none;max-height:0px;overflow:hidden">

								&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;

								

								</div>

            </td>

            </tr>           

        </tbody></table>

    </td>

</tr>

 </tbody></table>

        </div>

        </td>

        </tr>

        </tbody></table>

    



<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">

<tbody><tr><td bgcolor="#ffffff" style="padding-top:0px;padding-bottom:20px">

<div style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:0px;padding-right:0px">





        

        </div>

        </td>

        </tr>

</tbody></table>



<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#ffffff">

    <tbody><tr>

    <td style="padding-bottom:20px">

         <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">



<table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px" bgcolor="#ffffff">

       <tbody><tr>

<td bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

        <table width="73%" style="border-spacing:0;font-family:Audiowide;color:#111111" bgcolor="#ffffff">

            <tbody><tr>

                 <td style="padding-top:5px;padding-bottom:0;padding-right:0;padding-left:0px" align="left">

            <p style="font-size:30px; font-weight:normal; Audiowide;">safeqloud</p>

        </td>

            </tr>

            

        </tbody></table>

    </td>

    <td width="100%" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

        <table   style="width:100%; border-spacing:0;font-family:sans-serif;color:#111111" bgcolor="#ffffff">

            <tbody><tr>

                <td style="padding-top:10px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#ffffff;width:100%;text-align:right">

                 <p style="Margin-top:0px;margin-bottom:0px;font-size:13px;line-height:16px"><strong><a href="tel:077%20588%2080%2023" style="text-decoration:none;color:#111111" target="_blank">Website: <u></u>www.safeqloud.com<u></u></a></strong></p>

                </td>

            </tr>

            <tr>

                <td style="padding-top:0px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#ffffff;width:100%;text-align:right">

                    <p style="Margin-top:5px;margin-bottom:0px;font-size:13px;line-height:16px">If you have any questions - <u></u>Contact us<u></u></p>

                </td>

            </tr>

        </tbody></table>

    </td>

</tr>

 </tbody></table>



        </div>

        </td>

        </tr>

        </tbody></table>



<tbody style="width:600px; max-width:100%;"> 

                  <tr>
  <td style="font-family:Helvetica Neue,Helvetica,Arial,sans-serif;background-color:#ffde00;font-size:0;text-align:center; padding:70px 50px 0px 50px">
    
  <img alt="Welcome to Postmark" width="500" src="https://ci6.googleusercontent.com/proxy/1uaDR0a8hlx3Hg6VYHWEXKc3YLP-qiasxS81OfU1SbJY3c2wUY_MENJQXW1W4BgO_Hd07JyEOXNLrfU8i0Pc1eDhdvNm-MOP1_Te2zoNceN6pO5fPXHATjneaUf1rhP0Om8=s0-d-e1-ft#https://assets.postmarkapp.com/packs/images/emails/hero/welcome@2x-bf73605b.png" class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 0.01; left: 705px; top: 827px;"><div id=":1k5" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Download attachment " data-tooltip-class="a1V" data-tooltip="Download"><div class="aSK J-J5-Ji aYr"></div></div></div>

  </td>
</tr>

               </tbody>

 


<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

<tbody><tr><td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">

<div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">



<table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">

<tbody><tr>

<td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

        <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">

            <tbody><tr>

                <td align="left" style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:center">

                <table border="0" cellspacing="0" cellpadding="0" align="left">

  <tbody>
  
  <tr>
<tr style="padding-top:20px;">
			<td align="left" valign="top" scope="col" style="padding-top:20px;  padding-bottom:25px;"><div style="font-size:16px; text-align:left;"><span style="font-size:26px;">Welcome</span> <br><br>
			<a href="#" style="text-decoration:none; color:#000000;">You’re in! We’re writing to let you know how much we appreciate that you activated the account. You are hereby approved and may start using all cool apps on Qloud ID.
</a>
<br><br>
<a href="#" style="text-decoration:none; color:#000000;">As a reminder, your username is <span style="font-weight:bold;">email address</span>. 

</a>
<br><br>
<a href="#" style="text-decoration:none; color:#000000; font-weight:bold;">Whats next?

</a>
 <br>
<a href="#" style="text-decoration:none; color:#000000;">Please complete our Get started guide and start exploring Qloud ID. It takes less than 30 seconds and unlocks over 20 apps for you to use. You may continue by clicking on the button


</a>
<br>
</div></td>
            </tr>
    <td align="left" style="font-size:18px;line-height:22px;font-weight:bold; text-align:left;   padding-bottom:25px;"><span><a href="https://www.safeqloud.com/user/index.php/LoginAccount" style="border-radius:3px;color:#ff2828;text-decoration:none;background-color:#ff2828;border-top:14px solid #ff2828;border-bottom:14px solid #ff2828;border-left:14px solid #ff2828;border-right:14px solid #ff2828;display:inline-block;border-radius:3px;color:#ffffff; padding-left:25px; padding-right:25px; font-weight:normal;" target="_blank" data-saferedirecturl="https://www.safeqloud.com/user/index.php/LoginAccount">Click here</a></span></td>

  </tr>
<tr style="padding-top:20px;">
			<td align="left" valign="top" scope="col" style="padding-top:20px;  padding-bottom:15px;"><div style="font-size:16px; text-align:left;">If the button is not working then copy/paste the link in your browser to confirm your registration <br><br>
			<a href="#" style="text-decoration:none; color:#3691c0;">https://www.safeqloud.com/user/index.php/LoginAccount</a></div></td>
            </tr>
			
			<tr style="padding-top:20px;">
			<td align="left" valign="top" scope="col" style="padding-top:20px;  padding-bottom:15px;"><div style="font-size:16px; text-align:left;">If you have any questions as you get set up, just reply and we’ll do everything we can to help you along.
 <br><br>
			<a href="#" style="text-decoration:none; color:#000000;">Seriously, though — welcome. We’re really happy you’re with us.

</a>
<br><br>
<a href="#" style="text-decoration:none; color:#000000;">The Qloud ID Team


</a>
 

</div></td>
            </tr>
</tbody></table>

                </td>

            </tr>

        </tbody></table>

    </td>

</tr>

</tbody></table>



        </div>

        </td>

        </tr>

        </tbody></table>



  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

     <tbody>
	 <tr>

        <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">

           <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">

              

                       <table bgcolor="#FFFFFF" align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;margin:0 auto;width:100%;max-width:600px">

                          <tbody><tr>

                             <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

                                <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">

                                   <tbody><tr>

                                      <td style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:left">

                                         <p style="margin-top:0px;line-height:0px;margin-bottom:0px;font-size:4px">&nbsp;</p>

                                      </td>

                                   </tr>

                                </tbody></table>

                             </td>

                          </tr>

                       </tbody></table>

                       

           </div>

        </td>

     </tr>

  </tbody></table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">



    <tbody>
	<tr>



      <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">



        <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:40px;padding-right:20px">



          



          <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">



            <tbody><tr>



              <td width="20" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">



                <img src="https://ci3.googleusercontent.com/proxy/gvkyMPCroXxkwzdJ2Pg_KqgcjVeVgpVE1dRo8rYCiczuJe5UfJllf1ZtOFiYZsB4FzBoGeU7Xdso4PWQyUOj4qIrHsViEiUFA_KBQA=s0-d-e1-ft#http://imagesak.secureserver.net/promos/std/spc_trans.gif" height="30" width="20" border="0" style="display:block;border-width:0" class="CToWUd">



              </td>



              <td style="padding-top:0px;padding-bottom:0px;padding-right:0;padding-left:0;text-align:center;font-size:0;background-color:#ffffff">



                



                <div style="width:100%;max-width:560px;display:inline-block;vertical-align:top">



                  <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">



                    <tbody><tr>



                      <td style="padding-top:0px;padding-bottom:0px;padding-left:20px;padding-right:20px;background-color:#ffffff">



                        <table style="border-spacing:0;font-family:sans-serif;color:#111111;width:100%;font-size:14px;text-align:left;background-color:#ffffff;border-top-color:#e8eaeb;border-top-style:solid;border-top-width:1px">



                          <tbody><tr>



                            <td style="padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:10px;background-color:#ffffff;width:100%;text-align:left">



                              <table style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;table-layout:fixed">



                                <tbody><tr>



                                  <td style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;background-color:#ffffff;width:100%;text-align:center">



                                    <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px; font-size:14px;">This is sent because you created an account on Qloud ID,</p>



                                  </td>



                                </tr>



                                

                                                                  

 


 



        </tr>



      </tbody></table>



    </td>



  </tr>
 </tbody></table>



                            </td>



                          </tr>



                        </tbody></table>



                      </td>



                    </tr>



                  </tbody></table>



                </div>



                



              </td>



              <td width="20" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">



                <img src="https://ci3.googleusercontent.com/proxy/gvkyMPCroXxkwzdJ2Pg_KqgcjVeVgpVE1dRo8rYCiczuJe5UfJllf1ZtOFiYZsB4FzBoGeU7Xdso4PWQyUOj4qIrHsViEiUFA_KBQA=s0-d-e1-ft#http://imagesak.secureserver.net/promos/std/spc_trans.gif" height="30" width="20" border="0" style="display:block;border-width:0" class="CToWUd">



              </td>



            </tr>



          </tbody></table>



          



       


      </td>



    

  </tbody></table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

     <tbody><tr>

        <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">

           <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">

              

                       <table bgcolor="#F5F7F8" align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;margin:0 auto;width:100%;max-width:600px">

                          <tbody><tr>

                             <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

                                <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">

                                   <tbody><tr>

                                      <td style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#f5f7f8;width:100%;text-align:left">

                                         <p style="margin-top:0px;line-height:0px;margin-bottom:0px;font-size:4px">&nbsp;</p>

                                      </td>

                                   </tr>

                                </tbody></table>

                             </td>

                          </tr>

                       </tbody></table>

                       

           </div>

        </td>

     </tr>

  </tbody></table>

</td>

		</tr>

		</tbody></table>

   

    </center>

</div></body></html> ';
			
			sendEmail($subject, $to, $emailContent);
			$stmt->close();
			$dbCon->close();
			if($row_profile['phone_verified']==1)
			{
            return 1;
			}
			else
			{
			return 0;
			}
		}
		
		}
		function sendActivationEmail($data)
		{
			
			$to      = $data['email'];
			$subject = "Welcome to Qloud ID";
			
			$emailContent = '<html><head></head><body><div style="margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding:0">

<center style="width:100%;table-layout:fixed">

<table   cellpadding="0" cellspacing="0" bgcolor="#F5F7F8" style="width:600px; max-width:100%; text-align:center">

<tbody><tr>

<td>

    <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8">

    <tbody><tr>

    <td>    

         <div style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:0px;padding-right:0px">

<table align="center" style="border-spacing:0;font-family:sans-serif;color:#f5f7f8;Margin:0 auto;width:100%" bgcolor="#F5F7F8">

       <tbody><tr>

<td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0" bgcolor="#F5F7F8">

        <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#f5f7f8" bgcolor="#F5F7F8">

            <tbody><tr>

               <td style="padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px;background-color:#f5f7f8;color:#f5f7f8;width:100%;font-size:1px;line-height:1px;text-align:left;display:none!important">

                 <p style="text-align:left;line-height:6px;Margin-top:0px;Margin-bottom:0px">Dina domäner är inställda på att förnyas automatiskt. Öppna det här e-postmeddelandet för att säkerställa att allt fortfarande är uppdaterat. Och glöm inte att du får 20 % rabatt på nya produkter. &nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;</p>

                 <div style="display:none;max-height:0px;overflow:hidden">

								&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;

								

								</div>

            </td>

            </tr>           

        </tbody></table>

    </td>

</tr>

 </tbody></table>

        </div>

        </td>

        </tr>

        </tbody></table>

    



<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">

<tbody><tr><td bgcolor="#ffffff" style="padding-top:0px;padding-bottom:20px">

<div style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:0px;padding-right:0px">





        

        </div>

        </td>

        </tr>

</tbody></table>



<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#ffffff">

    <tbody><tr>

    <td style="padding-bottom:20px">

         <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">



<table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px" bgcolor="#ffffff">

       <tbody><tr>

<td bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

        <table width="73%" style="border-spacing:0;font-family:Audiowide;color:#111111" bgcolor="#ffffff">

            <tbody><tr>

                 <td style="padding-top:5px;padding-bottom:0;padding-right:0;padding-left:0px" align="left">

            <p style="font-size:30px; font-weight:normal; Audiowide;">safeqloud</p>

        </td>

            </tr>

            

        </tbody></table>

    </td>

    <td width="100%" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

        <table   style="width:100%; border-spacing:0;font-family:sans-serif;color:#111111" bgcolor="#ffffff">

            <tbody><tr>

                <td style="padding-top:10px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#ffffff;width:100%;text-align:right">

                 <p style="Margin-top:0px;margin-bottom:0px;font-size:13px;line-height:16px"><strong><a href="tel:077%20588%2080%2023" style="text-decoration:none;color:#111111" target="_blank">Website: <u></u>www.safeqloud.com<u></u></a></strong></p>

                </td>

            </tr>

            <tr>

                <td style="padding-top:0px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#ffffff;width:100%;text-align:right">

                    <p style="Margin-top:5px;margin-bottom:0px;font-size:13px;line-height:16px">If you have any questions - <u></u>Contact us<u></u></p>

                </td>

            </tr>

        </tbody></table>

    </td>

</tr>

 </tbody></table>



        </div>

        </td>

        </tr>

        </tbody></table>



<tbody style="width:600px; max-width:100%;"> 

                  <tr>
  <td style="font-family:Helvetica Neue,Helvetica,Arial,sans-serif;background-color:#ffde00;font-size:0;text-align:center; padding:70px 50px 0px 50px">
    
  <img alt="Welcome to Postmark" width="500" src="https://ci6.googleusercontent.com/proxy/1uaDR0a8hlx3Hg6VYHWEXKc3YLP-qiasxS81OfU1SbJY3c2wUY_MENJQXW1W4BgO_Hd07JyEOXNLrfU8i0Pc1eDhdvNm-MOP1_Te2zoNceN6pO5fPXHATjneaUf1rhP0Om8=s0-d-e1-ft#https://assets.postmarkapp.com/packs/images/emails/hero/welcome@2x-bf73605b.png" class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 0.01; left: 705px; top: 827px;"><div id=":1k5" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Download attachment " data-tooltip-class="a1V" data-tooltip="Download"><div class="aSK J-J5-Ji aYr"></div></div></div>

  </td>
</tr>

               </tbody>

 


<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

<tbody><tr><td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">

<div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">



<table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">

<tbody><tr>

<td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

        <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">

            <tbody><tr>

                <td align="left" style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:center">

                <table border="0" cellspacing="0" cellpadding="0" align="left">

  <tbody>
  
  <tr>
<tr style="padding-top:20px;">
			<td align="left" valign="top" scope="col" style="padding-top:20px;  padding-bottom:25px;"><div style="font-size:16px; text-align:left;"><span style="font-size:26px;">Welcome</span> <br><br>
			<a href="#" style="text-decoration:none; color:#000000;">You’re in! We’re writing to let you know how much we appreciate that you activated the account. You are hereby approved and may start using all cool apps on Qloud ID.
</a>
<br><br>
<a href="#" style="text-decoration:none; color:#000000;">As a reminder, your username is <span style="font-weight:bold;">email address</span>. 

</a>
<br><br>
<a href="#" style="text-decoration:none; color:#000000; font-weight:bold;">Whats next?

</a>
 <br>
<a href="#" style="text-decoration:none; color:#000000;">Please complete our Get started guide and start exploring Qloud ID. It takes less than 30 seconds and unlocks over 20 apps for you to use. You may continue by clicking on the button


</a>
<br>
</div></td>
            </tr>
    <td align="left" style="font-size:18px;line-height:22px;font-weight:bold; text-align:left;   padding-bottom:25px;"><span><a href="https://www.safeqloud.com/user/index.php/LoginAccount" style="border-radius:3px;color:#ff2828;text-decoration:none;background-color:#ff2828;border-top:14px solid #ff2828;border-bottom:14px solid #ff2828;border-left:14px solid #ff2828;border-right:14px solid #ff2828;display:inline-block;border-radius:3px;color:#ffffff; padding-left:25px; padding-right:25px; font-weight:normal;" target="_blank" data-saferedirecturl="https://www.safeqloud.com/user/index.php/LoginAccount">Click here</a></span></td>

  </tr>
<tr style="padding-top:20px;">
			<td align="left" valign="top" scope="col" style="padding-top:20px;  padding-bottom:15px;"><div style="font-size:16px; text-align:left;">If the button is not working then copy/paste the link in your browser to confirm your registration <br><br>
			<a href="#" style="text-decoration:none; color:#3691c0;">https://www.safeqloud.com/user/index.php/LoginAccount</a></div></td>
            </tr>
			
			<tr style="padding-top:20px;">
			<td align="left" valign="top" scope="col" style="padding-top:20px;  padding-bottom:15px;"><div style="font-size:16px; text-align:left;">If you have any questions as you get set up, just reply and we’ll do everything we can to help you along.
 <br><br>
			<a href="#" style="text-decoration:none; color:#000000;">Seriously, though — welcome. We’re really happy you’re with us.

</a>
<br><br>
<a href="#" style="text-decoration:none; color:#000000;">The Qloud ID Team


</a>
 

</div></td>
            </tr>
</tbody></table>

                </td>

            </tr>

        </tbody></table>

    </td>

</tr>

</tbody></table>



        </div>

        </td>

        </tr>

        </tbody></table>



  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

     <tbody>
	 <tr>

        <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">

           <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">

              

                       <table bgcolor="#FFFFFF" align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;margin:0 auto;width:100%;max-width:600px">

                          <tbody><tr>

                             <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

                                <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">

                                   <tbody><tr>

                                      <td style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:left">

                                         <p style="margin-top:0px;line-height:0px;margin-bottom:0px;font-size:4px">&nbsp;</p>

                                      </td>

                                   </tr>

                                </tbody></table>

                             </td>

                          </tr>

                       </tbody></table>

                       

           </div>

        </td>

     </tr>

  </tbody></table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">



    <tbody>
	<tr>



      <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">



        <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:40px;padding-right:20px">



          



          <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">



            <tbody><tr>



              <td width="20" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">



                <img src="https://ci3.googleusercontent.com/proxy/gvkyMPCroXxkwzdJ2Pg_KqgcjVeVgpVE1dRo8rYCiczuJe5UfJllf1ZtOFiYZsB4FzBoGeU7Xdso4PWQyUOj4qIrHsViEiUFA_KBQA=s0-d-e1-ft#http://imagesak.secureserver.net/promos/std/spc_trans.gif" height="30" width="20" border="0" style="display:block;border-width:0" class="CToWUd">



              </td>



              <td style="padding-top:0px;padding-bottom:0px;padding-right:0;padding-left:0;text-align:center;font-size:0;background-color:#ffffff">



                



                <div style="width:100%;max-width:560px;display:inline-block;vertical-align:top">



                  <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">



                    <tbody><tr>



                      <td style="padding-top:0px;padding-bottom:0px;padding-left:20px;padding-right:20px;background-color:#ffffff">



                        <table style="border-spacing:0;font-family:sans-serif;color:#111111;width:100%;font-size:14px;text-align:left;background-color:#ffffff;border-top-color:#e8eaeb;border-top-style:solid;border-top-width:1px">



                          <tbody><tr>



                            <td style="padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:10px;background-color:#ffffff;width:100%;text-align:left">



                              <table style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;table-layout:fixed">



                                <tbody><tr>



                                  <td style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;background-color:#ffffff;width:100%;text-align:center">



                                    <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px; font-size:14px;">This is sent because you created an account on Qloud ID,</p>



                                  </td>



                                </tr>



                                

                                                                  

 


 



        </tr>



      </tbody></table>



    </td>



  </tr>
 </tbody></table>



                            </td>



                          </tr>



                        </tbody></table>



                      </td>



                    </tr>



                  </tbody></table>



                </div>



                



              </td>



              <td width="20" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">



                <img src="https://ci3.googleusercontent.com/proxy/gvkyMPCroXxkwzdJ2Pg_KqgcjVeVgpVE1dRo8rYCiczuJe5UfJllf1ZtOFiYZsB4FzBoGeU7Xdso4PWQyUOj4qIrHsViEiUFA_KBQA=s0-d-e1-ft#http://imagesak.secureserver.net/promos/std/spc_trans.gif" height="30" width="20" border="0" style="display:block;border-width:0" class="CToWUd">



              </td>



            </tr>



          </tbody></table>



          



       


      </td>



    

  </tbody></table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

     <tbody><tr>

        <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">

           <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">

              

                       <table bgcolor="#F5F7F8" align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;margin:0 auto;width:100%;max-width:600px">

                          <tbody><tr>

                             <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

                                <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">

                                   <tbody><tr>

                                      <td style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#f5f7f8;width:100%;text-align:left">

                                         <p style="margin-top:0px;line-height:0px;margin-bottom:0px;font-size:4px">&nbsp;</p>

                                      </td>

                                   </tr>

                                </tbody></table>

                             </td>

                          </tr>

                       </tbody></table>

                       

           </div>

        </td>

     </tr>

  </tbody></table>

</td>

		</tr>

		</tbody></table>

   

    </center>

</div></body></html> ';
			
			sendEmail($subject, $to, $emailContent);
			
		}
	

	}