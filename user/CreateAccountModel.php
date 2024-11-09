<?php
	require_once('../AppModel.php');
	class CreateAccountModel extends AppModel
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
		
		function checkmail() {
			$domain = array_pop(explode('@', $_POST['email']));
			
			$key = '56f98a45d581cb76cab4693fa48ae7f9'; 
			$request = 'http://check.block-disposable-email.com/easyapi/json/' . $key . '/' . $domain;
			
			$response = file_get_contents($request);
			
			$dea = json_decode($response);
			
			if ($dea->request_status == 'success') {
				
					return 1;
				
				} else {
				
				return 0;
			}
		}
		
		
		
		function createAccount($data)
		{
			$dbCon = AppModel::createConnection();
			$rf=1;
			$stmt = $dbCon->prepare("SELECT id FROM user_logins WHERE email=?");
			
			/* bind parameters for markers*/
			$stmt->bind_param("s", $data['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$myrow  = $result->fetch_assoc();
			if ($myrow['id'] == null || $myrow['id'] == "") {
				$stmt = $dbCon->prepare("INSERT INTO user_logins (registered_from,get_started_wizard_status,email, password, email_verification_code , created_on , modified_on, country_of_residence ) VALUES (?, ?,  ?, ?, ?, now(), now(), ?)");
				
				/*
					The argument may be one of four types:
					
					i - integer
					d - double
					s - string
					b - BLOB
				*/
				$st=0;
				$stmt->bind_param("iisssi", $rf,$st,$data['email'], $data['password'], $data['random_hash'], $data['cntry']); // ss -> string string
				if (!$stmt->execute()) {
					$stmt->close();
					$dbCon->close();
					return 0;
					} else {
					$stmt->close();
					$dbCon->close();
					return 1;
				}
				
				} else {
				$stmt->close();
				$dbCon->close();
				return 2; 
				
			}
			
		}
			 
		
		function sendActivationEmail($data)
		{
			$url="https://www.safeqloud.com/user/index.php/Activation/activateAccount/" . $data['email'] . "/" . $data['random_hash'];
			$surl=getShortUrl($url);
			
			$to      = $data['email'];
			$subject = "Qloud ID - Verify your email";
			
			$emailContent = '<html><head></head><body><div style="margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding:0">

<center style="width:100%;table-layout:fixed">

<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8" style="text-align:center">

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

    



<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

<tbody><tr><td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:20px">

<div style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:0px;padding-right:0px">





        

        </div>

        </td>

        </tr>

</tbody></table>



<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8">

    <tbody><tr>

    <td style="padding-bottom:20px">

         <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">



<table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px" bgcolor="#F5F7F8">

       <tbody><tr>

<td bgcolor="#F5F7F8" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

        <table width="73%" style="border-spacing:0;font-family:Audiowide;color:#111111" bgcolor="#F5F7F8">

            <tbody><tr>

                 <td style="padding-top:5px;padding-bottom:0;padding-right:0;padding-left:0px" align="left">

            <p style="font-size:30px; font-weight:normal; Audiowide;">safeqloud</p>

        </td>

            </tr>

            

        </tbody></table>

    </td>

    <td width="100%" bgcolor="#F5F7F8" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

        <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111" bgcolor="#F5F7F8">

            <tbody><tr>

                <td style="padding-top:10px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">

                 <p style="Margin-top:0px;margin-bottom:0px;font-size:13px;line-height:16px"><strong><a href="tel:077%20588%2080%2023" style="text-decoration:none;color:#111111" target="_blank">Website: <u></u>www.safeqloud.com<u></u></a></strong></p>

                </td>

            </tr>

            <tr>

                <td style="padding-top:0px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">

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



<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

    <tbody><tr>

	<td bgcolor="#F5F7F8" style="background-color:#f5f7f8;padding-top:0;padding-right:0;padding-left:0;padding-bottom:0">

		<div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">

			

			<table bgcolor="#FFFFFF" width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="font-family:sans-serif;color:#111111">

				<tbody><tr>

				<td bgcolor="#FFFFFF" align="left" style="padding-top:0px;padding-bottom:0;padding-right:0px;padding-left:0px;text-align:left;background-color:#ffffff;font-weight:bold;font-size:32px;line-height:42px">

                

					<div style="text-align: center; line-height: 22px; max-width: 600px;
    float: left;
    position: relative; ">
                        <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 red_ff2828_bg  brdb_new tall xs-nobrdb" style="max-width: 100%; background-color: #ff2828 !important;
width: 960px;
    position: relative;
    margin: 0 auto;




">
                           <div style="height: 250px; width: auto; max-width: 100%; padding-top: 100px; padding-right: 30px;
    padding-left: 30px; margin-right: auto;
    margin-left: auto;  z-index: 5; max-width: 100%; width: auto;">
                              <div class="padding-bottom: 40px; text-align: center; font-size: 45px;"><img src="http://www.safeqloud.com/html/usercontent/images/doublecheck.png"width="45px;" height="45px;" /></div>
                              <div class="padb0 xxs-padb0 ">
                                 <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:white;">Activate</h1>
                              </div>
                              <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:white; font-size: 20px;">Click on the button to activate your account.</div>
                           </div>
                        </div>
                     </div>
                 

				</td>

				</tr>

			</tbody></table>

			

		</div>

	</td>

	</tr>

</tbody></table>



 


<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

<tbody><tr><td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">

<div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">



<table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">

<tbody><tr>

<td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

        <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">

            <tbody><tr>

                <td align="left" style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:center padding-bottom:15px;">

                <table border="0" cellspacing="0" cellpadding="0" align="left">

  <tbody><tr>

    <td align="left" style="font-size:18px;line-height:22px;font-weight:bold; text-align:center;"><span><a href="https://www.safeqloud.com/user/index.php/Activation/activateAccount/' . $data['email'] . '/' . $data['random_hash'].'" style="border-radius:3px;color:#fedd32;text-decoration:none;background-color:#fedd32;border-top:14px solid #fedd32;border-bottom:14px solid #fedd32;border-left:14px solid #fedd32;border-right:14px solid #fedd32;display:inline-block;border-radius:3px;color:#000000; padding-left:25px; padding-right:25px; font-weight:normal;" target="_blank" data-saferedirecturl="https://www.safeqloud.com/user/index.php/Activation/activateAccount/' . $data['email'] . '/' . $data['random_hash'].'">Click here</a></span></td>

  </tr>
<tr style="padding-top:20px;">
			<td align="left" valign="top" scope="col" style="padding-top:20px; padding-bottom:15px;"><div style="font-size:16px; text-align:center;">If the button is not working then copy/paste the link in your browser to confirm your registration <br><br>
			<a href="#" style="text-decoration:none; color:#3691c0;">'.$surl.'</a></div></td>
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

     <tbody><tr>

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



    <tbody><tr>



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



                                    <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px; fsz14px;">This is sent because you created an account on Qloud ID,</p>



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



          



        </div>



      </td>



    </tr>



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
		
		function selectCountry()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name  from country where id not in (-1,240) order by country_name");
			
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
		
	}
