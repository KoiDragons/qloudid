<?php
require_once('../AppModel.php');
class UserTenantCompanyModel extends AppModel
{
	
 function checkRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from user_tenants where (user_email=? or user_login_id=(select id from user_logins where email=?)) and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ssi", $_POST['email'],$_POST['email'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			if($row['num']==0)
			{
				return 0;
			}
			else
			{
			return 1;	
			}	
			
			}


function addTenant($data)
	{
		 $dbCon = AppModel::createConnection();
		 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select company_name,company_email from companies  where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowCompany = $result->fetch_assoc();
				$first_name=htmlentities($_POST['first_name'],ENT_NOQUOTES, 'ISO-8859-1');
				$last_name=htmlentities($_POST['last_name'],ENT_NOQUOTES, 'ISO-8859-1');
				$ruser_id=0;
				$is_app=3;
				$stmt = $dbCon->prepare("INSERT INTO user_tenants (is_approved,user_login_id, company_id, created_on,user_email,user_first_name,user_last_name,user_country,user_phone_number) VALUES (?, ?, ?, now(),?,?, ?, ?, ?)");
				$stmt->bind_param("iiisssis",$is_app, $ruser_id,$company_id,$_POST ['email'],$first_name,$last_name,$_POST['country_id'],$_POST ['pnumber']);
				$stmt->execute();
				$id=$stmt->insert_id;
			 
				
			$url="https://www.safeqloud.com/user/index.php/ShareMonitor/shareMonitorRequestList";
			$surl=getShortUrl($url);
			$to=$_POST['email'];
				$subject="Tenant request received";
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



                                    <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px; font-size:14px;">This is sent because someone want to become tenant of your company</p>



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
				
	
	
				
	
 function getAppsInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$app_id= 29;
			$stmt = $dbCon->prepare("select id from manage_apps_permission where app_id=? and country_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $app_id,$data['country_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $this->encrypt_decrypt('encrypt',$row['id']);
			
			}
    function userSummary($data)
    {
        $dbCon = AppModel::createConnection();
       
		
          $stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image from user_logins where id = ?");
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
		
		$stmt = $dbCon->prepare("select country_id,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
        
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
    function updateDataPost($data)
    {
        $dbCon = AppModel::createConnection();
       $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
        $stmt = $dbCon->prepare("update company_profiles set address=?,city=?,country=?,zip=?  where company_id=?");
       
		
        /* bind parameters for markers */
        $stmt->bind_param("ssssi", $_POST['addrs'],$_POST['city'],$_POST['cntry'],$_POST['zip'],$company_id);
        $stmt->execute();
      
        $stmt->close();
        $dbCon->close();
        return 1;
    }
	
	
	 function updateDataPostSupplier($data)
    {
        $dbCon = AppModel::createConnection();
       $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
        $stmt = $dbCon->prepare("update company_profiles set si_address=?,si_city=?,si_country=?,si_zip=?,sd_address=?,sd_city=?,sd_country=?,sd_zip=?,vat=?   where company_id=?");
       
		
        /* bind parameters for markers */
        $stmt->bind_param("sssssssssi", $_POST['addrssi'],$_POST['citysi'],$_POST['cntrysi'],$_POST['zipsi'],$_POST['addrssd'],$_POST['citysd'],$_POST['cntrysd'],$_POST['zipsd'],$_POST['vat'],$company_id);
        $stmt->execute();
      
        $stmt->close();
        $dbCon->close();
        return 1;
    }
	
	
	function updateDataPostNew($data)
    {
        $dbCon = AppModel::createConnection();
       $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
        $stmt = $dbCon->prepare("update company_profiles set delivery_address=?,d_city=?,d_country=?,d_zip=?  where company_id=?");
       
		
        /* bind parameters for markers */
        $stmt->bind_param("ssssi", $_POST['addrs'],$_POST['city'],$_POST['cntry'],$_POST['zip'],$company_id);
        $stmt->execute();
      
        $stmt->close();
        $dbCon->close();
        return 1;
    }
	
	function selectCountry()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name  from country where id>-1 and id<240 order by country_name");
			
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
	function countryList($data)
    {
        $dbCon = AppModel::createConnection();
       
		$org=array();
          $stmt = $dbCon->prepare("select country_name from country where id>-1");
        /* bind parameters for markers */
		$cont=1;
      
        $stmt->execute();
        $result = $stmt->get_result();
		$org="";
		 while($row = $result->fetch_assoc())
		 {
			$org=$org.$row['country_name'].",";
		 }
		
	$org=substr($org,0,-1);
		//echo $org; die;
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	
	function industryList($data)
    {
        $dbCon = AppModel::createConnection();
       
		$org=array();
          $stmt = $dbCon->prepare("select name from company_categories");
        /* bind parameters for markers */
		$cont=1;
      
        $stmt->execute();
        $result = $stmt->get_result();
		$org="";
		 while($row = $result->fetch_assoc())
		 {
			$org=$org.$row['name'].",";
		 }
		
	$org=substr($org,0,-1);
		//echo $org; die;
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	function updateCompanyId($data)
	{
			$dbCon = AppModel::createConnection();
			 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
				$stmt = $dbCon->prepare("update user_tenants set company_id=? where company_email=(select company_email from companies where id=?)");
			
				/* bind parameters for markers */
				$stmt->bind_param("ii",$company_id,$company_id);
				$stmt->execute();
				 
				$stmt->close();
				$dbCon->close();
				return 1;
			 	 
		}	
	
	function requestDetail($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
        $stmt = $dbCon->prepare("select user_tenants.id,companies.company_name,last_name,first_name,email,user_tenants.created_on from user_tenants left join user_logins on user_logins.id=user_tenants.user_login_id left join companies on companies.id=user_tenants.company_id where company_id=? and is_approved=0 limit 0,20");
        
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
		//print_r($org); die;
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	function moreRequestDetail($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
	  $a=$_POST['id']*20;
	  $b=$a+20;
        $stmt = $dbCon->prepare("select user_tenants.id,companies.company_name,last_name,first_name,email,user_tenants.created_on from user_tenants left join user_logins on user_logins.id=user_tenants.user_login_id left join companies on companies.id=user_tenants.company_id where company_id=? and is_approved=0 limit ?,?");
        
        /* bind parameters for markers */
	$stmt->bind_param("iii", $company_id,$a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		$j=0;
		while($row = $result->fetch_assoc())
		{
			$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
			$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0  bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['first_name'],0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_40 xs-wi_60   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">'.$row['first_name'].' '.$row['last_name'].'</span>
																	
																	  <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.$row['email'].'</span>  
																	</div>
																	
																		<div class="fright wi_10 padl0 xs-wi_20  marl15 fsz40  xs-marl0 xxs-marr20  padb0 ">
														<a href="../approveRequest/'.$org1.'/'.$data['cid'].'"><span class="fas fa-check-circle green_txt" aria-hidden="true"></span></a>
													</div>
																			<div class="fright wi_10 padl0 xs-wi_20  marl15 fsz40  xs-marl0 xxs-marr20  padb0 ">
														<a href="../rejectRequest/'.$org1.'/'.$data['cid'].'"><span class="fas fa-times-circle red_txt" aria-hidden="true"></span></a>
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
	
	function requestDetailApproved($data)
    {
        $dbCon = AppModel::createConnection();
      $apartment_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
        $stmt = $dbCon->prepare("select user_tenants.id,companies.company_name,last_name,first_name,email,user_tenants.created_on from user_tenants left join user_logins on user_logins.id=user_tenants.user_login_id left join companies on companies.id=user_tenants.company_id where property_id=? and is_approved=1 limit 0,20");
        
        /* bind parameters for markers */
	$stmt->bind_param("i", $apartment_id);
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
	
	function requestDetailRejected($data)
    {
        $dbCon = AppModel::createConnection();
      $apartment_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
        $stmt = $dbCon->prepare("select user_tenants.id,companies.company_name,last_name,first_name,email,user_tenants.created_on from user_tenants left join user_logins on user_logins.id=user_tenants.user_login_id left join companies on companies.id=user_tenants.company_id where property_id=? and is_approved=2 limit 0,20");
        
        /* bind parameters for markers */
	$stmt->bind_param("i", $apartment_id);
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
	
	
	function requestDetailSent($data)
    {
        $dbCon = AppModel::createConnection();
      $apartment_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
        $stmt = $dbCon->prepare("select user_tenants.id,companies.company_name,user_last_name as last_name,user_first_name as first_name,user_email as email,user_tenants.created_on from user_tenants left join companies on companies.id=user_tenants.company_id where property_id=? and is_approved=3 limit 0,20");
        
        /* bind parameters for markers */
	$stmt->bind_param("i", $apartment_id);
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
	
	function moreRequestDetailApproved($data)
    {
        $dbCon = AppModel::createConnection();
      $apartment_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
	  $a=$_POST['id']*20;
	  $b=$a+20;
        $stmt = $dbCon->prepare("select user_tenants.id,companies.company_name,last_name,first_name,email,user_tenants.created_on from user_tenants left join user_logins on user_logins.id=user_tenants.user_login_id left join companies on companies.id=user_tenants.company_id where property_id=? and is_approved=1 limit ?,?");
        
        /* bind parameters for markers */
	$stmt->bind_param("iii", $apartment_id,$a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		$j=0;
		while($row = $result->fetch_assoc())
		{
			$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
			$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0  bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['first_name'],0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_60   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">'.$row['first_name'].' '.$row['last_name'].'</span>
																	
																	  <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.$row['email'].'</span>  
																	</div>
																	
																		<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
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
	
	function moreRequestDetailRejected($data)
    {
        $dbCon = AppModel::createConnection();
      $apartment_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
	  $a=$_POST['id']*20;
	  $b=$a+20;
        $stmt = $dbCon->prepare("select user_tenants.id,companies.company_name,last_name,first_name,email,user_tenants.created_on from user_tenants left join user_logins on user_logins.id=user_tenants.user_login_id left join companies on companies.id=user_tenants.company_id where property_id=? and is_approved=2 limit ?,?");
        
        /* bind parameters for markers */
	$stmt->bind_param("iii", $apartment_id,$a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		$j=0;
		while($row = $result->fetch_assoc())
		{
			$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
			$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0  bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['first_name'],0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_60   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">'.$row['first_name'].' '.$row['last_name'].'</span>
																	
																	  <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.$row['email'].'</span>  
																	</div>
																	
																		<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
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
	
	function moreRequestDetailSent($data)
    {
        $dbCon = AppModel::createConnection();
      $apartment_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
	  $a=$_POST['id']*20;
	  $b=$a+20;
        $stmt = $dbCon->prepare("select user_tenants.id,companies.company_name,user_last_name as last_name,user_first_name as first_name,user_email as email,user_tenants.created_on from user_tenants  left join companies on companies.id=user_tenants.company_id where property_id=? and is_approved=3 limit ?,?");
        
        /* bind parameters for markers */
	$stmt->bind_param("iii", $apartment_id,$a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		$j=0;
		while($row = $result->fetch_assoc())
		{
			$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
			$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0  bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['first_name'],0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_60   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">'.$row['first_name'].' '.$row['last_name'].'</span>
																	
																	  <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.$row['email'].'</span>  
																	</div>
																	
																		<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
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
	
	function approveRequest($data)
    {
        $dbCon = AppModel::createConnection();
	 $id= $this -> encrypt_decrypt('decrypt',$data['id']);
		$stmt = $dbCon->prepare("update user_tenants set is_approved=1 where id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $id);
		
        $stmt->execute();
		
		
       
		
		 $stmt->close();
        $dbCon->close();
		 return 1;
        
    }
	
	
	function rejectRequest($data)
    {
        $dbCon = AppModel::createConnection();
	 $id= $this -> encrypt_decrypt('decrypt',$data['id']);
		$stmt = $dbCon->prepare("update user_tenants set is_approved=2 where id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $id);
		
        $stmt->execute();
		 $stmt->close();
        $dbCon->close();
		 return 1;
        
    }
	
	
	function approveCount($data)
    {
        $dbCon = AppModel::createConnection();
	 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$stmt = $dbCon->prepare("select count(id) as num from user_tenants where company_id=? and is_approved=1");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $company_id);
		
        $stmt->execute();
        $result = $stmt->get_result();
		
		$row = $result->fetch_assoc();
		
		 $stmt->close();
        $dbCon->close();
		 return $row;
        
    }
	
	function sentCount($data)
    {
        $dbCon = AppModel::createConnection();
	 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$stmt = $dbCon->prepare("select count(id) as num from user_tenants where company_id=? and is_approved=3");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $company_id);
		
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
		$stmt = $dbCon->prepare("select count(id) as num from user_tenants where company_id=? and is_approved=0");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $company_id);
		
        $stmt->execute();
        $result = $stmt->get_result();
		
		$row = $result->fetch_assoc();
		
		 $stmt->close();
        $dbCon->close();
		 return $row;
        
    }
		function rejectedCount($data)
    {
        $dbCon = AppModel::createConnection();
	 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$stmt = $dbCon->prepare("select count(id) as num from user_tenants where company_id=? and is_approved=2");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $company_id);
		
        $stmt->execute();
        $result = $stmt->get_result();
		
		$row = $result->fetch_assoc();
		
		 $stmt->close();
        $dbCon->close();
		 return $row;
        
    }
	
	 
	}
	

	
	