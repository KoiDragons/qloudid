<?php
	require_once('../AppModel.php');
	class PublicLostandFoundModel extends AppModel
	{
		function sendVerificationInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$items=explode(',',$_POST['all_items']);
			
			
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
				$rf=1;
				$st=0;
				$stmt->bind_param("iisssi", $rf,$st,$data['email'], $data['password'], $data['random_hash'], $data['ccountry']); // ss -> string string
				if (!$stmt->execute()) {
					$stmt->close();
					$dbCon->close();
					return 0;
					} else {
						$id=$stmt->insert_id;
						foreach($items as $value)
						{
						$stmt = $dbCon->prepare("update found_and_lost set user_login_id=?,contact_email=?,country_phone=?,phone_number=? where id=?");
			
							/* bind parameters for markers*/
						$stmt->bind_param("isisi", $id,$data['email'],$data['ccountry'],$_POST['uphno'],$value);
						$stmt->execute();	
						}
					$stmt->close();
					$dbCon->close();
					return 1;
				}
				
				} 
				else
					{
						$id=$myrow['id'];
						foreach($items as $value)
						{
						$stmt = $dbCon->prepare("select * from found_and_lost where id=?");
			
							/* bind parameters for markers*/
						$stmt->bind_param("i",$value);
						$stmt->execute();
						$result = $stmt->get_result();
						$itemRow  = $result->fetch_assoc();	
						$j=0;
			
						while($j==0)
						{
						$code=mt_rand(111111111111,999999999999); 
						$stmt = $dbCon->prepare("select id from used_sr_number where sr_number=?");
						/* bind parameters for markers */
						
						$stmt->bind_param("s",$code);
						$stmt->execute();
						$result = $stmt->get_result();
						$row = $result->fetch_assoc();
						if(empty($row))
						{
							$j++;
						}
						}
						$stmt = $dbCon->prepare("insert into user_lost_and_found(item_number,serial_number,user_id,created_on,unique_serial_code,description,how_lost,item_image,article_name,finders_fee)
						values(?,?,?,now(),?,?,?,?,?,?)");
						$stmt->bind_param("isississi",$itemRow['item_number'],$code,$id,$code,$itemRow['description'],$itemRow['how_lost'],$itemRow['item_image'],$itemRow['article_name'],$itemRow['finders_fee']);
						if($stmt->execute())
						{
						$st=1;
						$id=$stmt->insert_id;
						$enc=$this->encrypt_decrypt('encrypt',$id);
						$stmt = $dbCon->prepare("insert into used_sr_number(sr_number,used_on,created_on)
						values(?,?,now())");
						$stmt->bind_param("si", $code,$st);
						$stmt->execute();
						
						}
						$stmt = $dbCon->prepare("delete from found_and_lost where id=?");
			
							/* bind parameters for markers*/
						$stmt->bind_param("i",$value);
						$stmt->execute();
						
						
				
					}
						$stmt->close();
						$dbCon->close();
						return 2; 
					}
		}
		
		
		function sendActivationEmail($data)
		{
			$url="https://www.qloudid.com/user/index.php/Activation/activateAccount/" . $data['email'] . "/" . $data['random_hash'];
			$surl=getShortUrl($url);
			
			$to      = $data['email'];
			$subject = "Qmatchup - Verify your email";
			
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

                 <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0px" align="left">

            <p style="font-size:40px; font-weight:bold; Audiowide;">Qloudid</p>

        </td>

            </tr>

            

        </tbody></table>

    </td>

    <td width="100%" bgcolor="#F5F7F8" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

        <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111" bgcolor="#F5F7F8">

            <tbody><tr>

                <td style="padding-top:10px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">

                 <p style="Margin-top:0px;margin-bottom:0px;font-size:13px;line-height:16px"><strong><a href="tel:077%20588%2080%2023" style="text-decoration:none;color:#111111" target="_blank">Support: <u></u>077 588 80 23<u></u></a></strong></p>

                </td>

            </tr>

            <tr>

                <td style="padding-top:0px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">

                    <p style="Margin-top:5px;margin-bottom:0px;font-size:13px;line-height:16px">Kowaken Ghirmai — <u></u>Kundnummer: 32332137<u></u></p>

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

				<td bgcolor="#FFFFFF" align="left" style="padding-top:40px;padding-bottom:0;padding-right:40px;padding-left:40px;text-align:left;background-color:#ffffff;font-weight:bold;font-size:32px;line-height:42px">

                

					<span><a href="https://click-email.godaddy.com/None/?currencyId=SEK&amp;eid=ocp.email.transactional/1964.LayoutSimple/Text/Headline.link.click&amp;marketId=sv-SE&amp;redir=https%3A%2F%2Faccount.godaddy.com%2Frenewals%3Fisc%3Dtfc1964d30%26utm_source%3Dgdocp%26utm_medium%3Demail%26utm_campaign%3Dsv-SE_dom_email-revenue_base_gd" style="text-decoration:none;color:#111111" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://click-email.godaddy.com/None/?currencyId%3DSEK%26eid%3Docp.email.transactional/1964.LayoutSimple/Text/Headline.link.click%26marketId%3Dsv-SE%26redir%3Dhttps%253A%252F%252Faccount.godaddy.com%252Frenewals%253Fisc%253Dtfc1964d30%2526utm_source%253Dgdocp%2526utm_medium%253Demail%2526utm_campaign%253Dsv-SE_dom_email-revenue_base_gd&amp;source=gmail&amp;ust=1571808069975000&amp;usg=AFQjCNENtA8YfPbR079vU6A_IwtlDrGfJw">Hi</a></span>

                 

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

                <td style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:left">

                    <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px">Thank you for signing up with Qmatchup!

</p>

<p style="Margin-top:0px;line-height:22px;Margin-bottom:0px">
You are in good company with thousand of other comapnies and associations
Please confirm your registrationto activate your account</p>

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

<tbody><tr><td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">

<div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">



<table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">

<tbody><tr>

<td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

        <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">

            <tbody><tr>

                <td align="left" style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:center">

                <table border="0" cellspacing="0" cellpadding="0" align="left">

  <tbody><tr>

    <td align="left" style="font-size:18px;line-height:22px;font-weight:bold;"><span><a href="https://www.qloudid.com/user/index.php/Activation/activateAccount/' . $data['email'] . '/' . $data['random_hash'].'" style="border-radius:3px;color:#1976d2;text-decoration:none;background-color:#1976d2;border-top:14px solid #1976d2;border-bottom:14px solid #1976d2;border-left:14px solid #1976d2;border-right:14px solid #1976d2;display:inline-block;border-radius:3px;color:#ffffff" target="_blank" data-saferedirecturl="https://www.qloudid.com/user/index.php/Activation/activateAccount/' . $data['email'] . '/' . $data['random_hash'].'">Confirm</a></span></td>

  </tr>
<tr style="padding-top:20px;">
			<td align="left" valign="top" scope="col" style="padding-top:20px;"><div style="font-size:14px;">If the button is not working then copy/paste the link in your browser to confirm your registration <br>
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



        <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">



          



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



                                  <td style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;background-color:#ffffff;width:100%;text-align:left">



                                    <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px">Förnyas automatiskt 2019-08-27 för 159,99 kr/år**</p>



                                  </td>



                                </tr>



                                <tr>



                                  <td style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;background-color:#ffffff;width:100%;text-align:left;word-break:break-all">



                                    <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px;word-break:break-all">



                                      <strong>



                                        <a href="https://click-email.godaddy.com/None/?currencyId=SEK&amp;eid=ocp.email.transactional/1964.LayoutSimple/Disclaimer/Disclaimer.link.click&amp;marketId=sv-SE&amp;redir=https%3A%2F%2Faccount.godaddy.com%2Frenewals%3Fisc%3Dtfc1964d30%26utm_source%3Dgdocp%26utm_medium%3Demail%26utm_campaign%3Dsv-SE_dom_email-revenue_base_gd" style="color:#111111;text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://click-email.godaddy.com/None/?currencyId%3DSEK%26eid%3Docp.email.transactional/1964.LayoutSimple/Disclaimer/Disclaimer.link.click%26marketId%3Dsv-SE%26redir%3Dhttps%253A%252F%252Faccount.godaddy.com%252Frenewals%253Fisc%253Dtfc1964d30%2526utm_source%253Dgdocp%2526utm_medium%253Demail%2526utm_campaign%253Dsv-SE_dom_email-revenue_base_gd&amp;source=gmail&amp;ust=1571808069975000&amp;usg=AFQjCNFsRCstu00TOqI9EJT1ZH3dSum0fA">qmatchup.com</a>



                                      </strong>



                                    </p>



                                  </td>



                                </tr>

                                                                  

<tr>



    <td style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;background-color:#ffffff;width:100%;text-align:left;word-break:break-all">



      <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">



        <tbody><tr>



          <td style="padding-top:5px;padding-bottom:0px;padding-left:0px;padding-right:5px;background-color:#ffffff">



            



              <img src="https://ci3.googleusercontent.com/proxy/6yBEX_T0cmZSha2pRkOT_IIAc-xRfC4J1FormlTDyRFNhkn3sM-owJL7IuJ_ZkDPYkatN5d92vnuHmYTSqIvVusV7zmi_E2so65t4thZKSWTP3pvg2YC3mFEGI3QI_MAnPAx6QRVBg=s0-d-e1-ft#http://imagesak.secureserver.net/promos/htmlemails/transaction/OM_6431_AutoRenew.png" width="15" alt="" style="border-width:0" class="CToWUd">



            



          </td>



          <td style="padding-top:5px;padding-bottom:0px;padding-left:0px;padding-right:20px;background-color:#ffffff;width:100%;font-size:14px;text-align:left">



            <p style="text-align:left;line-height:18px;Margin-top:0px;Margin-bottom:0px">Automatiskt förnyelse: På</p>



          </td>



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
			
			$stmt = $dbCon->prepare("select id,country_name,country_code  from phone_country_code order by country_code");
			
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
			function sendInformation()
		{
			$dbCon = AppModel::createConnection();
			
			if($_POST['image_data']=="")
			{
			$img_name1='';	
			}
			else
			{
			$data1 = strip_tags($_POST['image_data']);
					 
			define('UPLOAD_DIR','../estorecss/'); 
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			}
			 
			$stmt = $dbCon->prepare("insert into found_and_lost(item_number,description,created_on,how_lost,item_image,article_name,finders_fee)
			values(?,?,now(),?,?,?,?)");
			$stmt->bind_param("isissi",$_POST['item_name'],$_POST['description'],$_POST['how_lost'],$img_name1,$_POST['article_name'],$_POST['finders_fee']);
			
			if($stmt->execute())
			{
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
	}								