<?php
require_once('../AppModel.php');
class HotelWellnessSearchModel extends AppModel
{
		function appId()
		{
			
			return $this -> encrypt_decrypt('encrypt',42);
		}
	  function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$country_id= $data['country_id'];
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=40");
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
		
	function sendRequest($data)
	{
		 $dbCon = AppModel::createConnection();
		 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		 $location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
		 $wellness_id= $this -> encrypt_decrypt('decrypt',$data['id']);  
				$stmt = $dbCon->prepare("select company_id from resturant_information  where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $wellness_id);
				$stmt->execute();
				$result = $stmt->get_result();
				
				$rowCompany = $result->fetch_assoc();
				$cid= $this -> encrypt_decrypt('encrypt',$rowCompany['company_id']);  
				$stmt = $dbCon->prepare("INSERT INTO hotel_wellness_services (wellness_id, hotel_company_id, created_on,hotel_property_id) VALUES (?, ?, now(),?)");
				$stmt->bind_param("iii", $wellness_id,$company_id,$location_id);
				$stmt->execute();
				$url="https://www.safeqloud.com/company/index.php/Resturant/roomServiceRequests/".$cid."/".$data['id'];
			$surl=getShortUrl($url);
			$stmt = $dbCon->prepare("select manage_employee_permissions.id,concat_ws(' ', first_name, last_name) as name,is_admin,user_logins.email from manage_employee_permissions left join user_logins on user_logins.id=manage_employee_permissions.user_id where company_id=? and is_admin=1 limit 0,50");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$to=$row['email'];
				$subject="Health service request received";
				$emailContent='<html><head></head><body><div style="margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding:0">

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

            <p style="font-size:30px; font-weight:normal; Audiowide;">Qloudid</p>

        </td>

            </tr>

            

        </tbody></table>

    </td>

    <td width="100%" bgcolor="#F5F7F8" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

        <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111" bgcolor="#F5F7F8">

            <tbody><tr>

                <td style="padding-top:10px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">

                 <p style="Margin-top:0px;margin-bottom:0px;font-size:13px;line-height:16px"><strong><a href="tel:077%20588%2080%2023" style="text-decoration:none;color:#111111" target="_blank">Website: <u></u>www.qloudid.com<u></u></a></strong></p>

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
                        <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 red_ff2828_bg  brdb_new tall xs-nobrdb" style="max-width: 100%; background-color: #fedd32 !important;
width: 960px;
    position: relative;
    margin: 0 auto;




">
                           <div style="height: 250px; width: auto; max-width: 100%; padding-top: 100px; padding-right: 30px;
    padding-left: 30px; margin-right: auto;
    margin-left: auto;  z-index: 5; max-width: 100%; width: auto;">
                              <div class="padding-bottom: 40px; text-align: center; font-size: 45px;"><img src="http://www.safeqloud.com/html/usercontent/images/envelopeBlack.png"width="45px;" height="45px;" /></div>
                              <div class="padb0 xxs-padb0 ">
                                 <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:#000;">Request</h1>
                              </div>
                              <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:#000; font-size: 20px;">Click on the button to check the request details.</div>
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

                <td align="left" style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:center">

                <table border="0" cellspacing="0" cellpadding="0" align="left">

  <tbody><tr>

    <td align="left" style="font-size:18px;line-height:22px;font-weight:bold; text-align:center; padding-bottom:15px;"><span><a href="'.$url.'" style="border-radius:3px;color:#ff2828;text-decoration:none;background-color:#ff2828;border-top:14px solid #ff2828;border-bottom:14px solid #ff2828;border-left:14px solid #ff2828;border-right:14px solid #ff2828;display:inline-block;border-radius:3px;color:#ffffff; padding-left:25px; padding-right:25px; font-weight:normal;" target="_blank" data-saferedirecturl="'.$url.'">Click here</a></span></td>

  </tr>
<tr style="padding-top:20px;">
			<td align="left" valign="top" scope="col" style="padding-top:20px;  padding-bottom:15px;"><div style="font-size:16px; text-align:center;">If the button is not working then copy/paste the link in your browser to confirm your registration <br><br>
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



                                    <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px; font-size:14px;">This is sent because hotel want to use your resturant for their room service</p>



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

</div></body></html>';
					try {
  sendEmail($subject, $to, $emailContent);
}

 
catch(Exception $e) {
  
}
			}
				
		 
	
	}
	
	 function sendReminder($data)
	{
		 $dbCon = AppModel::createConnection();
		 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		 $location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
		 $wellness_id= $this -> encrypt_decrypt('decrypt',$data['id']);  
		$stmt = $dbCon->prepare("select company_id from wellness_center_information  where id=?");
		/* bind parameters for markers */
		$stmt->bind_param("i", $wellness_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$rowCompany = $result->fetch_assoc();
		$cid= $this -> encrypt_decrypt('encrypt',$data['company_id']);  
			
			$url="https://www.safeqloud.com/company/index.php/Resturant/roomServiceRequests/".$cid."/".$data['id'];
			$surl=getShortUrl($url);
			$stmt = $dbCon->prepare("select manage_employee_permissions.id,concat_ws(' ', first_name, last_name) as name,is_admin,user_logins.email from manage_employee_permissions left join user_logins on user_logins.id=manage_employee_permissions.user_id where company_id=? and is_admin=1 limit 0,50");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$to=$row['email'];
				$subject="Health service request received";
				$emailContent='<html><head></head><body><div style="margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding:0">

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

            <p style="font-size:30px; font-weight:normal; Audiowide;">Qloudid</p>

        </td>

            </tr>

            

        </tbody></table>

    </td>

    <td width="100%" bgcolor="#F5F7F8" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

        <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111" bgcolor="#F5F7F8">

            <tbody><tr>

                <td style="padding-top:10px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">

                 <p style="Margin-top:0px;margin-bottom:0px;font-size:13px;line-height:16px"><strong><a href="tel:077%20588%2080%2023" style="text-decoration:none;color:#111111" target="_blank">Website: <u></u>www.qloudid.com<u></u></a></strong></p>

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
                        <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 red_ff2828_bg  brdb_new tall xs-nobrdb" style="max-width: 100%; background-color: #fedd32 !important;
width: 960px;
    position: relative;
    margin: 0 auto;




">
                           <div style="height: 250px; width: auto; max-width: 100%; padding-top: 100px; padding-right: 30px;
    padding-left: 30px; margin-right: auto;
    margin-left: auto;  z-index: 5; max-width: 100%; width: auto;">
                              <div class="padding-bottom: 40px; text-align: center; font-size: 45px;"><img src="http://www.safeqloud.com/html/usercontent/images/envelopeBlack.png"width="45px;" height="45px;" /></div>
                              <div class="padb0 xxs-padb0 ">
                                 <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:#000;">Request</h1>
                              </div>
                              <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:#000; font-size: 20px;">Click on the button to check the request details.</div>
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

                <td align="left" style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:center">

                <table border="0" cellspacing="0" cellpadding="0" align="left">

  <tbody><tr>

    <td align="left" style="font-size:18px;line-height:22px;font-weight:bold; text-align:center; padding-bottom:15px;"><span><a href="'.$url.'" style="border-radius:3px;color:#ff2828;text-decoration:none;background-color:#ff2828;border-top:14px solid #ff2828;border-bottom:14px solid #ff2828;border-left:14px solid #ff2828;border-right:14px solid #ff2828;display:inline-block;border-radius:3px;color:#ffffff; padding-left:25px; padding-right:25px; font-weight:normal;" target="_blank" data-saferedirecturl="'.$url.'">Click here</a></span></td>

  </tr>
<tr style="padding-top:20px;">
			<td align="left" valign="top" scope="col" style="padding-top:20px;  padding-bottom:15px;"><div style="font-size:16px; text-align:center;">If the button is not working then copy/paste the link in your browser to confirm your registration <br><br>
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



                                    <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px; font-size:14px;">This is sent because hotel want to use your resturant for their room service</p>



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

</div></body></html>';
					try {
  sendEmail($subject, $to, $emailContent);
}

 
catch(Exception $e) {
  
}
			}
	}
	
	
	function userSummary($data)
    {
        $dbCon = AppModel::createConnection();
       
		
          $stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image,country_of_residence from user_logins where id = ?");
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
	
	
	
	
    function wellnessListSearch($data)
    {
        $dbCon = AppModel::createConnection();
		$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
		ini_set('memory_limit', '-1');
		 $org="";
						$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
						
		
		$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
		  
					$stmt = $dbCon->prepare("select wellness_center_information.id,center_name,visiting_address  from wellness_center_information left join property_location on property_location.id=wellness_center_information.property_id   where center_name like ?  and property_location.city_v=(select property_location.city_v from property_location where property_location.id=?) and wellness_center_information.id not in (select wellness_id from hotel_wellness_services where hotel_property_id=?)");
				 $stmt->bind_param("sii", $p,$location_id,$location_id);
				
				 $stmt->execute();
				$result = $stmt->get_result();
				
				
				 while($row=mysqli_fetch_array($result))
					{
						 
						
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				
				$center_name=str_ireplace(htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1'),"<span class='bold dblue_txt'>".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."</span>",$row['center_name']);
									$org=$org.'<a href="../../sendRequest/'.$data['cid'].'/'.$data['lid'].'/'.$enc.'" ><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['center_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_50 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">'.$center_name.'</span>
																	
																	 <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">'.$row['visiting_address'].'</span>  
																	</div>
																	
																	
																		<div class="xxs-fleft fright wi_20 xs-padl0 xs-wi_20  fsz40    padb0 xs-marrl0">
																				<button type="button" name="Send" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bgi" >Send</button>
																			</div>
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div></a>  ';
					}	
		
	
			 $stmt->close();
        $dbCon->close();
		return $org;
	}
	 
	 function wellnessListCount($data)
    {
        $dbCon = AppModel::createConnection();
		$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
		ini_set('memory_limit', '-1');
		 $org=0;
						$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
						
		
		$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
		  
					$stmt = $dbCon->prepare("select count(wellness_center_information.id) as num  from wellness_center_information left join property_location on property_location.id=wellness_center_information.property_id   where center_name like ?  and property_location.city_v=(select property_location.city_v from property_location where property_location.id=?) and wellness_center_information.id not in (select wellness_id from hotel_wellness_services where hotel_property_id=?)");
				 $stmt->bind_param("sii", $p,$location_id,$location_id);
				
				 $stmt->execute();
				$result = $stmt->get_result();
				
				
				 $row=mysqli_fetch_array($result);
		
	
			 $stmt->close();
        $dbCon->close();
		return $row['num'];
	}
	 	
	 function requestInfo($data)
    {
        $dbCon = AppModel::createConnection();
		$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
		$wellness_id= $this -> encrypt_decrypt('decrypt',$data['id']);
		$stmt = $dbCon->prepare("select is_approved from hotel_wellness_services where hotel_property_id=? and wellness_id=?");
		$stmt->bind_param("ii", $location_id,$wellness_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row=mysqli_fetch_array($result);
		$stmt->close();
        $dbCon->close();
		return $row['is_approved'];
	}
	 		
		 function wellnessRequestSent($data)
    {
        $dbCon = AppModel::createConnection();
		$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
		ini_set('memory_limit', '-1');
		 			$stmt = $dbCon->prepare("select wellness_center_information.id,center_name,visiting_address  from wellness_center_information left join property_location on property_location.id=wellness_center_information.property_id   where  wellness_center_information.id in (select wellness_id from hotel_wellness_services where hotel_property_id=?)");
				 $stmt->bind_param("i", $location_id);
				
				 $stmt->execute();
				$result = $stmt->get_result();
				
				$org='';
				 while($row=mysqli_fetch_array($result))
					{
						 
						
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				
				 
									$org=$org.'<a href="../../verifyRequestStatus/'.$data['cid'].'/'.$data['lid'].'/'.$enc.'" ><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['center_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_50 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">'.$row['center_name'].'</span>
																	
																	 <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">'.$row['visiting_address'].'</span>  
																	</div>
																	
																	
																		<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div>
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div></a>  ';
					}	
		
	
			 $stmt->close();
        $dbCon->close();
		return $org;
	}
	 
}
