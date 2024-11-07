<?php
require_once('../AppModel.php');
class PublicCorporateCompanySignUpModel extends AppModel
{
 function sendEmailOtp($data)
 {
			 $dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
				$num=(mt_rand(111111,999999));
				$stmt = $dbCon->prepare("update backup_corporate_company_signup_info set email_otp=? where id=?");
				
				$stmt->bind_param("si", $num,$id);
				$stmt->execute();
				
				$to      = $data['email'];
				$subject = "Qloud ID - Verify your email";
				$emailContent='<html>
   <head></head>
   <body>
      <div style="margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding:0">
         <center style="width:100%;table-layout:fixed">
            <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8" style="text-align:center">
               <tbody>
                  <tr>
                     <td>
                        <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td>
                                    <div style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:0px;padding-right:0px">
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#f5f7f8;Margin:0 auto;width:100%" bgcolor="#F5F7F8">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0" bgcolor="#F5F7F8">
                                                   <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#f5f7f8" bgcolor="#F5F7F8">
                                                      <tbody>
                                                         <tr>
                                                            <td style="padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px;background-color:#f5f7f8;color:#f5f7f8;width:100%;font-size:1px;line-height:1px;text-align:left;display:none!important">
                                                               <p style="text-align:left;line-height:6px;Margin-top:0px;Margin-bottom:0px">Dina domäner är inställda på att förnyas automatiskt. Öppna det här e-postmeddelandet för att säkerställa att allt fortfarande är uppdaterat. Och glöm inte att du får 20 % rabatt på nya produkter. &nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;</p>
                                                               <div style="display:none;max-height:0px;overflow:hidden">
                                                                  &nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;
                                                               </div>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:20px">
                                    <div style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:0px;padding-right:0px">
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td style="padding-bottom:20px">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px" bgcolor="#F5F7F8">
                                          <tbody>
                                             <tr>
                                                <td bgcolor="#F5F7F8" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   <table width="73%" style="border-spacing:0;font-family:Audiowide;color:#111111" bgcolor="#F5F7F8">
                                                      <tbody>
                                                         <tr>
                                                            <td style="padding-top:5px;padding-bottom:0;padding-right:0;padding-left:0px" align="left">
                                                               <p style="font-size:30px; font-weight:normal; Audiowide;">Qloudid</p>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                                <td width="100%" bgcolor="#F5F7F8" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111" bgcolor="#F5F7F8">
                                                      <tbody>
                                                         <tr>
                                                            <td style="padding-top:10px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">
                                                               <p style="Margin-top:0px;margin-bottom:0px;font-size:13px;line-height:16px"><strong><a href="tel:077%20588%2080%2023" style="text-decoration:none;color:#111111" target="_blank">Website: <u></u>www.safeqloud.com<u></u></a></strong></p>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td style="padding-top:0px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">
                                                               <p style="Margin-top:5px;margin-bottom:0px;font-size:13px;line-height:16px">If you have any questions - <u></u>Contact us<u></u></p>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="background-color:#f5f7f8;padding-top:0;padding-right:0;padding-left:0;padding-bottom:0">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                                       <table bgcolor="#FFFFFF" width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="font-family:sans-serif;color:#111111">
                                          <tbody>
                                             <tr>
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
                                                            <div class="padding-bottom: 40px; text-align: center; font-size: 45px;"><img src="http://www.safeqloud.com/html/usercontent/images/doublecheck.png" width="45px;" height="45px;"></div>
                                                            <div class="padb0 xxs-padb0 ">
                                                               <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:white;">Success</h1>
                                                            </div>
                                                            <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:white; font-size: 20px;">Please verify your email using the one time password : '.$num.'</div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                                       <table bgcolor="#FFFFFF" align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;margin:0 auto;width:100%;max-width:600px">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">
                                                      <tbody>
                                                         <tr>
                                                            <td style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:left">
                                                               <p style="margin-top:0px;line-height:0px;margin-bottom:0px;font-size:4px">&nbsp;</p>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:40px;padding-right:20px">
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">
                                          <tbody>
                                             <tr>
                                                <td width="20" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   <img src="https://ci3.googleusercontent.com/proxy/gvkyMPCroXxkwzdJ2Pg_KqgcjVeVgpVE1dRo8rYCiczuJe5UfJllf1ZtOFiYZsB4FzBoGeU7Xdso4PWQyUOj4qIrHsViEiUFA_KBQA=s0-d-e1-ft#http://imagesak.secureserver.net/promos/std/spc_trans.gif" height="30" width="20" border="0" style="display:block;border-width:0" class="CToWUd">
                                                </td>
                                                <td style="padding-top:0px;padding-bottom:0px;padding-right:0;padding-left:0;text-align:center;font-size:0;background-color:#ffffff">
                                                   <div style="width:100%;max-width:560px;display:inline-block;vertical-align:top">
                                                      <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">
                                                         <tbody>
                                                            <tr>
                                                               <td style="padding-top:0px;padding-bottom:0px;padding-left:20px;padding-right:20px;background-color:#ffffff">
                                                                  <table style="border-spacing:0;font-family:sans-serif;color:#111111;width:100%;font-size:14px;text-align:left;background-color:#ffffff;border-top-color:#e8eaeb;border-top-style:solid;border-top-width:1px">
                                                                     <tbody>
                                                                        <tr>
                                                                           <td style="padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:10px;background-color:#ffffff;width:100%;text-align:left">
                                                                              <table style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;table-layout:fixed">
                                                                                 <tbody>
                                                                                    <tr>
                                                                                       <td style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;background-color:#ffffff;width:100%;text-align:center">
                                                                                          <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px; fsz14px;">This is sent because you have created your account on Qloud ID</p>
                                                                                       </td>
                                                                                    </tr>
                                                                                 </tbody>
                                                                              </table>
                                                                           </td>
                                                                        </tr>
                                                                     </tbody>
                                                                  </table>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </div>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                                 <td width="20" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                    <img src="https://ci3.googleusercontent.com/proxy/gvkyMPCroXxkwzdJ2Pg_KqgcjVeVgpVE1dRo8rYCiczuJe5UfJllf1ZtOFiYZsB4FzBoGeU7Xdso4PWQyUOj4qIrHsViEiUFA_KBQA=s0-d-e1-ft#http://imagesak.secureserver.net/promos/std/spc_trans.gif" height="30" width="20" border="0" style="display:block;border-width:0" class="CToWUd">
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
               <tbody>
                  <tr>
                     <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">
                        <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                           <table bgcolor="#F5F7F8" align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;margin:0 auto;width:100%;max-width:600px">
                              <tbody>
                                 <tr>
                                    <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                       <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#f5f7f8;width:100%;text-align:left">
                                                   <p style="margin-top:0px;line-height:0px;margin-bottom:0px;font-size:4px">&nbsp;</p>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </td>
                  </tr>
               </tbody>
            </table>
         </center>
      </div>
   </body>
</html>';


sendEmail($subject, $to, $emailContent);

 
				$stmt->close();
				$dbCon->close();
				return 1;
				
				 
			}
	
function sendPhoneOtp($data)
 {
			 $dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
				$num=(mt_rand(111111,999999));
				$stmt = $dbCon->prepare("update backup_corporate_company_signup_info set mobile_otp=? where id=?");
				
				$stmt->bind_param("si", $num,$id);
				$stmt->execute();
				
				$to            = '+'.trim($data['country_code']).''.trim($data['phone_number']);
				$subject       = "One time password!";
				$emailContent ="Your one time password to verify your mobile is : ".$num;
				$res=json_decode(sendSms($subject, $to, $emailContent),true);
 
				$stmt->close();
				$dbCon->close();
				return 1;
				
				 
			}
		
 function verifyOtp($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("select email_otp as otp  from backup_corporate_company_signup_info where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if($row['otp']==$_POST['otp'])
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
		
		function verifyPhoneOtp($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("select mobile_otp as otp  from backup_corporate_company_signup_info where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if($row['otp']==$_POST['otp'])
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
		
		
		
		function signupFieldsInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("select * from corporate_signup_required_fields_info where company_id = ?");
			
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
	
    function selectCountry()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select *  from phone_country_code  order by country_name");
			
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
		
		
		function checkmail() {
			$dbCon = AppModel::createConnection();
			$a=explode('@', $_POST['email']);
			$domain = array_pop($a);
			 
			$stmt = $dbCon->prepare("SELECT id FROM user_logins WHERE email=?");
			
			/* bind parameters for markers*/
			$stmt->bind_param("s", $_POST['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$myrow  = $result->fetch_assoc();
			  
			if(empty($myrow))
			{
			$key = '56f98a45d581cb76cab4693fa48ae7f9'; 
			$request = 'http://check.block-disposable-email.com/easyapi/json/' . $key . '/' . $domain;
			
			$response = file_get_contents($request);
			
			$dea = json_decode($response);
			
			if ($dea->request_status == 'success') {
				$stmt->close();
				$dbCon->close();
					return 1;
				
				} else {
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			}
			else 
			{
				$stmt->close();
				$dbCon->close();
				return 2;
			}	
		}
		
		function checkUsedIdentificator()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select count(id) as num  from user_identification   where identity_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['variation_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row['num'];
			 
		}
		
		function checkPhoneNumber()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select count(user_logins.id) as num   from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where country_of_residence=? and phone_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $_POST['country_id'], $_POST['phone_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row['num'];
			 
		}
		
		function saveDetails($data)
		{
			
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$fname=htmlentities($_POST['fname'],ENT_NOQUOTES,'ISO-8859-1');
			$lname=htmlentities($_POST['lname'],ENT_NOQUOTES,'ISO-8859-1');
			
			if($_POST['phone_detail']==1)
			{
			$stmt = $dbCon->prepare("select count(user_logins.id) as num   from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where country_of_residence=? and phone_number=?");
			/* bind parameters for markers */
			$stmt->bind_param("is", $_POST['cntry'], $_POST['phone_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$phone_number=$_POST['phone_number'];
			$verify_phone_detail=$_POST['verify_phone_detail'];
			if($row['num']==0)
			{
			$verify_phone_detail_mandatory=0;	
			}
			else
			{
			$verify_phone_detail_mandatory=1;		
			}
			}
			else
			{
			$phone_number='';
			$verify_phone_detail=0;
			$verify_phone_detail_mandatory=0;	
			}
			
			if($_POST['identificator_info']==1)
			{
				$data1 = strip_tags($_POST['image-data1']);
				//echo $data; die;
				define('UPLOAD_DIR1','../estorecss/'); // image dir path
				$img_name1="new".microtime();
				file_put_contents(UPLOAD_DIR1.$img_name1.".txt", $data1);
				
				$data2 = strip_tags($_POST['image-data3']);
				//echo $data; die;
				define('UPLOAD_DIR','../estorecss/'); // image dir path
				$img_name2="new".microtime();
				file_put_contents(UPLOAD_DIR.$img_name2.".txt", $data2);
				$identificator=$_POST['identificator'];
				$id_number=$_POST['id_number'];
				$issue_date=$_POST['issue_date'];
				$expiry_date=$_POST['expiry_date'];
			}
			else
			{
			$img_name1='';
			$img_name2='';
			$identificator=0;
			$id_number='';
			$issue_date='';
			$expiry_date='';
			}
			
			if($_POST['card_detail']==1)
			{
				 
				$card_number=$_POST['card_number'];
				$exp_month=$_POST['exp_month'];
				$exp_year=$_POST['exp_year'];
				$cvv=$_POST['cvv'];
				$card_type=$data['card_type'];
			}
			else
			{
			$card_number='';
			$exp_month='';
			$exp_year=0;
			$cvv='';
			$card_type='';
			 
			}
			
			
			if($_POST['delivery_address']==1)
			{
				$addrs=htmlentities($_POST['addrs'],ENT_NOQUOTES,'ISO-8859-1');
				$pnumber=$_POST['pnumber'];
				$dzip=$_POST['dzip'];
				$dcity=htmlentities($_POST['dcity'],ENT_NOQUOTES,'ISO-8859-1');
				if($_POST['same_name']==1)
				{
				$flname=$fname.' '.$lname;
				}
				else
				{
				$flname=htmlentities($_POST['flname'],ENT_NOQUOTES,'ISO-8859-1');
				}
			}
			else
			{
			$addrs='';
			$pnumber='';
			$dzip=0;
			$dcity='';
			$flname='';
			}
			
			if($_POST['delivery_address']==1 && $_POST['invoice_address']==1 && $_POST['same_invoice']==1)
			{
				$iaddress=$addrs; 
				$i_port_number=$pnumber; 
				$izip=$dzip; 
				$icity=$dcity; 
				 
			}
			else if($_POST['delivery_address']==0 && $_POST['invoice_address']==1)
			{
				$iaddress=htmlentities($_POST['iaddress'],ENT_NOQUOTES,'ISO-8859-1');
				$i_port_number=$_POST['i_port_number'];
				$izip=$_POST['izip'];
				$icity=htmlentities($_POST['icity'],ENT_NOQUOTES,'ISO-8859-1');
				 
			}
				
			else
			{
			$iaddress='';
			$i_port_number='';
			$izip=0;
			$icity='';
			 
			}
			
			if($_POST['pickup_info']==1)
			{
				 
				$pickup_city=htmlentities($_POST['pickup_city'],ENT_NOQUOTES,'ISO-8859-1');
				$pickup_zipcode=$_POST['pickup_zipcode'];
				 
			}
			else
			{
			$pickup_city='';
			 
			$pickup_zipcode='';
			}
			  
			
			  
			$stmt = $dbCon->prepare("insert into `backup_corporate_company_signup_info`( cntry, `fname` , `lname` , `email` , `verify_email` , `phone_number` , `verify_phone_detail_mandatory` , `verify_phone_detail` , `phone_detail` , `image_data1` , `image_data2` , `identificator`  , `id_number` , `issue_date` , `expiry_date` , `identificator_info` , `card_number` , `exp_month` , `exp_year` , `cvv` , `card_type` , `card_detail` , `flname` , `addrs` , `pnumber` , `dzip` , `dcity` , `iaddress` , `i_port_number` , `izip` , `icity` , `pickup_city` , `pickup_zipcode` , `delivery_address` , `invoice_address` , `pickup_info` , `same_name` , `same_invoice` ,company_id) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			
			/* bind parameters for markers */
		$stmt->bind_param("isssisiiississsisssssisssssssssssiiiiii", $_POST['cntry'], $fname,$lname,$_POST['email'],$_POST['verify_email'],$phone_number,$verify_phone_detail_mandatory,$verify_phone_detail,$_POST['phone_detail'],$img_name1,$img_name2,$identificator,$id_number,$issue_date,$expiry_date,$_POST['identificator_info'],$card_number,$exp_month,$exp_year,$cvv,$card_type,$_POST['card_detail'],$flname,$addrs,$pnumber,$dzip,$dcity,$iaddress,$i_port_number,$izip,$icity,$pickup_city, $pickup_zipcode,$_POST['delivery_address'] ,$_POST['invoice_address'] ,$_POST['pickup_info'] ,$_POST['same_name'],$_POST['same_invoice'] , $company_id);
			$stmt->execute();
			$id=$stmt->insert_id;
			 
			 $adrs1=htmlentities($_POST['iaddressc'],ENT_NOQUOTES,'ISO-8859-1');
			 $port_number=$_POST['i_port_numberc'];
			 $daddress=htmlentities($_POST['daddressc'],ENT_NOQUOTES,'ISO-8859-1');
			$d_port_number=$_POST['d_port_numberc'];
			$dzip=$_POST['dzipc'];
			$dcity=htmlentities($_POST['dcityc'],ENT_NOQUOTES,'ISO-8859-1');
			if($_POST['company_invoice_address']==1 && $_POST['same_invoice_company']==0)
			{
				$iaddress=htmlentities($_POST['iaddressc'],ENT_NOQUOTES,'ISO-8859-1');
				$i_port_number=$_POST['i_port_numberc'];
				$izip=$_POST['izipc'];
				$icity=htmlentities($_POST['icityc'],ENT_NOQUOTES,'ISO-8859-1');
			}
			else
			{
			$iaddress=htmlentities($_POST['daddressc'],ENT_NOQUOTES,'ISO-8859-1');
			$i_port_number=$_POST['d_port_numberc'];
			$izip=$_POST['dzipc'];
			$icity=htmlentities($_POST['dcityc'],ENT_NOQUOTES,'ISO-8859-1');
			}
			
			if($_POST['company_pickup_info']==1)
			{
				$pickup_city_c=$_POST['pickup_city_c'];
				$pickup_zipcode_c=$_POST['pickup_zipcode_c'];
			}
			 else
			 {
			$pickup_city_c='';
			$pickup_zipcode_c='';	 
			 }
			 if($_POST['company_email_required']==1)  
			{
				$company_email=$_POST['company_email'];
			}
			else
			{
				$company_email='';
			}	
			
			$stmt = $dbCon->prepare("insert into `backup_corporate_compay_detail_info`( `company_name` , `cid` , `adrs1`  , `port_number` , `country` , `iaddress`  , `icity` , `izip` , `daddress` , `dcity` , `dzip` , `d_port_number` , `i_port_number` , `same_invoice`  , `pickup_address`  , `pickup_zip` , `company_digital_delivery`  , `company_pickup_info`  , `company_invoice_address`  , `position_type` , `is_headquarter`  , `user_fields_id`,company_email_required,company_email) values (?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?,?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("ssssissssssssissiiiiiiis", $_POST['company_name'], $_POST['cid'], $adrs1,$port_number, $_POST['cntry'], $iaddress,$icity,$izip,$daddress,$dcity,$dzip,$d_port_number,$i_port_number, $same_invoice_company,$pickup_city_c, $pickup_zipcode_c,$_POST['company_digital_delivery'],$_POST['company_pickup_info'],$_POST['company_invoice_address'],$_POST['position_type'],$_POST['is_headquarter'],$id,$_POST['company_email_required'],$company_email);
			$stmt->execute(); 
			 
			 
			$stmt->close();
			$dbCon->close();
			return $this -> encrypt_decrypt('encrypt',$id);
			 
		}
		
		function addedInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['id']);
			
			
			$stmt = $dbCon->prepare("select * from backup_corporate_company_signup_info where id = ?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select country_code from phone_country_code where id = ?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $row['cntry']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowPhone = $result->fetch_assoc();
			$row['country_code']=$rowPhone['country_code'];
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		
		
		function createUserAccount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['id']);
			
			
			$stmt = $dbCon->prepare("select * from backup_corporate_company_signup_info where id = ?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['verify_phone_detail_mandatory']==1)
			 {
			$stmt = $dbCon->prepare("select user_logins.id   from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where country_of_residence=? and phone_number=?");
			/* bind parameters for markers */
			$stmt->bind_param("is", $row['cntry'], $row['phone_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowPh = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update user_profiles set phone_number=null where user_logins_id=?");
			$stmt->bind_param("i", $rowPh['id']);  
			$stmt->execute();	
			$stmt = $dbCon->prepare("update user_certificates set is_valid=0 where user_id=?");
			$stmt->bind_param("i", $rowPhoneUser['id']);  
			$stmt->execute();
			
			 }
			 
			  
			
		 if($row['verify_email']==1)
			 {
				 $rf=1;
			 }
			 else
			 {
				 $rf=0;
			 }
			$st=1;
			$data['random_hash'] = substr(md5(uniqid(rand(), true)), 16, 16);
			$stmt = $dbCon->prepare("INSERT INTO user_logins (first_name,last_name,registered_from,get_started_wizard_status,email,  email_verification_code , created_on , modified_on, country_of_residence,verification_status ) VALUES (?, ?, ?, ?,   ?, ?, now(), now(), ?, ?)");
				
				 
				
				$stmt->bind_param("ssiissii", $row['fname'], $row['lname'],$st,$st,$row['email'], $data['random_hash'], $row['cntry'],$rf);
				$stmt->execute();
				 
				$id=$stmt->insert_id;
				 //echo $id; die;
				$stmt = $dbCon->prepare("INSERT INTO user_profiles (user_logins_id , created_on , modified_on ) VALUES (?, now(), now())");
				$stmt->bind_param("i", $id);  
				$stmt->execute();
				
				if($row['verify_phone_detail']==1 || $row['verify_phone_detail_mandatory']==1)
				{
				$stmt = $dbCon->prepare("update user_profiles set phone_number=? where user_logins_id=?");
				$stmt->bind_param("si", $row['phone_number'], $id);  
				$stmt->execute();	
				
				$stmt = $dbCon->prepare("update user_logins set grading_status=1 where id=?");
				$stmt->bind_param("i", $id);  
				$stmt->execute();	
				}
				
				
				
				if($row['identificator_info']==1)
				{
				$a=array();
				$b=array();
				$a=explode('-',$row['issue_date']);
				$b=explode('-',$row['expiry_date']);
				if($a[1]<10)
				{
					$a[1]='0'.$a[1];
				}
				if($b[1]<10)
				{
					$b[1]='0'.$b[1];
				}
				 
				$stmt = $dbCon->prepare("insert into user_identification(user_id,identification_type,identity_number,issue_month,issue_year,expiry_month, expiry_year,created_on,front_image_path, back_image_path,issue_date,expiry_date)
				values(?, ?, ?, ?, ?, ?, ?, now(),?,?, ?, ?)");
				$stmt->bind_param("iissisissss", $id,$row['identificator'],$row['id_number'],$a[1],$a[0],$b[1],$b[0],$row['image_data1'],$row['image_data2'],$row['issue_date'],$row['expiry_date']);	
				$stmt->execute();
				}
				
				if($row['card_detail']==1)
				{
					$name=$row['fname'].' '.$row['lname'];
				$stmt = $dbCon->prepare("insert into user_cards(`user_login_id`,`created_on`,`card_number`,card_cvv,exp_month,exp_year,name_on_card,card_type) values(?, now(), ?, ?, ?, ?, ?, ?)");
				$stmt->bind_param("isiiiss", $id,$row['card_number'],$row['cvv'],$row['exp_month'],$row['exp_year'],$name,$row['card_type']);	
				$stmt->execute();
				
				$stmt = $dbCon->prepare("update user_profiles set is_id_active=1 where user_logins_id=?");
				$stmt->bind_param("i", $id);  
				$stmt->execute();	
				}
				
				 
				$stmt = $dbCon->prepare("update user_profiles set pickup_city=?,pickup_zip=?,name_on_door=?, entry_code=?, full_address=?, port_number=?, address=?, city=?, zipcode=?,invoice_address=?,invoice_zipcode=?,invoice_city=?,invoice_port=?,is_invoice_same=?,is_name_on_house_same=?, is_id_active=1, delivery_address_required=?,invoice_address_required=?  where user_logins_id=?");
				 
				$stmt->bind_param("sssssssssssssiiiii",$row['pickup_city'],$row['pickup_zip'],$row['flname'],$row['entry_code'], $row['addrs'],$row['pnumber'], $row['addrs'],$row['dcity'],$row['dzip'],$row['iaddress'],$row['izip'],$row['icity'],$row['i_port_number'],$row['same_invoice'],$row['same_name'],$row['delivery_address'],$row['invoice_address'],$id);
				$stmt->execute();
			 
				if($row['delivery_address']==1)
				{
				$stmt = $dbCon->prepare("insert into  user_address (`address`  , `city`  , `zipcode` , `port_number` , `invoice_address`  , `invoice_city`  , `invoice_zipcode`  , `invoice_port_number`  , `is_name_same` , `is_invoice_same`  , `name_on_house`  ,entry_code , user_id, created_on, is_personal_address) values(?,?,?,?,?,?,?,?,?,?,?,?,?,now(),?)");
					/* bind parameters for markers */
				$stmt->bind_param("ssssssssiissii",$row['addrs'],$row['dcity'], $row['dzip'],$row['pnumber'],$row['iaddress'],$row['icity'],$row['izip'],$row['i_port_number'],$row['same_invoice'],$row['same_name'],$row['flname'],$row['entry_code'],$id,$st);
				$stmt->execute();
				
				}
				 
				$stmt = $dbCon->prepare("update backup_corporate_compay_detail_info set user_id=?  where user_fields_id=?");
				 
				$stmt->bind_param("ii",$id,$company_id);
				$stmt->execute(); 
			$stmt = $dbCon->prepare("delete from backup_corporate_company_signup_info where id = ?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
	
		function createCompanyAccount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$_POST=array();
			$stmt = $dbCon->prepare("select * from backup_corporate_compay_detail_info where user_fields_id = ?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$data['user_id']=$row['user_id'];
			$_POST=$row;
			//print_r($_POST); die;
			
			$data['admin_id']=43;
			$user_admin=0;
		
			$hash_code   = substr(md5(uniqid(rand(), true)), 16, 16);
			$stmt = $dbCon->prepare("select country_code,country_name from country where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_country = $result->fetch_assoc();
			if($_POST['company_email_required']==1)
			{
			$email=	$_POST['company_email'];
			}
			else
			{
			$email=$_POST['cid'].'.'.$row_country['country_code'].'@safeqloud.com';	
			}
			
			$web='';
			$st=1;
			$stmt = $dbCon->prepare("insert into companies(company_type,o_type,country_id,user_login_id,company_name,company_email,website,hash_code,created_date,email_verification_status,created_by,user_role) 
			values(?, ?, ?, ?, ?, ?, ?, ?, now(), ?, ?, ?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiiissssiii", $_POST['company_type'],$st, $_POST['country'], $data['admin_id'], htmlentities($_POST['company_name'],ENT_NOQUOTES, 'ISO-8859-1'), $email, $web, $hash_code,$st,$data['user_id'],$_POST['position_type']);
			
			
			if (!$stmt->execute()) {
				$stmt->close();
				$dbCon->close();
				return 0;
			} 
			else 
			{
				$id=$stmt->insert_id;
			
				$stmt = $dbCon->prepare("insert into company_profiles(`company_id`,address,cid,created_on,modified_on,port_number) values(?, ?, ?,now(),now(),?)");
				
				$stmt->bind_param("isss", $id, htmlentities($_POST['adrs1'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['cid'],$_POST['port_number']);
				$stmt->execute();
				
				
				$stmt = $dbCon->prepare("insert into user_company_profile(`company_id`,`user_login_id`) values(?, ?)");
				
				$stmt->bind_param("ii", $id, $data['admin_id']);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("insert into location (company_id,country_id,location,created_on) values (?, ?, ?, now())");
				
				$stmt->bind_param("iis", $id, $_POST['country'],  $data['location']);
				$stmt->execute();
				$locationrow = $stmt->insert_id;
				
				$stmt        = $dbCon->prepare("insert into warehouse(`company_id`,`location_id`,`created_on`) values (?, ?, now())");
				
				$stmt->bind_param("ii", $id, $locationrow);
				$stmt->execute();
				$stmt->close();
				
				$stmt = $dbCon->prepare("select first_name,last_name,email,email_verification_code,country_of_residence from user_logins where id=?");
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result  = $stmt->get_result();
				$userrow = $result->fetch_assoc();
				
				$stmt       = $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`,`created_by`) values(?, ?, ?, ?, ?, ?, ?, ?)");
				$status_emp = 0;
				$stmt->bind_param("ississii", $id, $userrow['first_name'], $userrow['last_name'], $status_emp, $userrow['email_verification_code'], $userrow['email'], $data['user_id'], $data['user_id']);
				$stmt->execute();
				$admin=$stmt->insert_id;
				 
					$stmt = $dbCon->prepare("insert into user_company_profile(`company_id`,`user_login_id`) values(?, ?)");
					
					$stmt->bind_param("ii", $id, $data['user_id']);
					$stmt->execute();
					
					$stmt = $dbCon->prepare("select first_name,last_name,email,email_verification_code from user_logins where id=?");
					$stmt->bind_param("i", $data['admin_id']);
					$stmt->execute();
					$result  = $stmt->get_result();
					$adminrow = $result->fetch_assoc();
					
					$stmt       = $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`,`created_by`) values(?, ?, ?, ?, ?, ?, ?, ?)");
					$status_emp = 0;
					$stmt->bind_param("ississii", $id, $adminrow['first_name'], $adminrow['last_name'], $status_emp, $adminrow['email_verification_code'], $adminrow['email'], $data['admin_id'], $data['user_id']);
					$stmt->execute();
					$super_admin=$stmt->insert_id;
					
					$stmt = $dbCon->prepare("insert into manage_employee_permissions (is_admin, employee_id, permission, user_id, company_id, page_id, created_date, modified_date ) values(?, ?, ?, ?, ?, ?, now(),now())");
					/* bind parameters for markers */
					$cont=1;
					$stmt->bind_param("iiiiii",$cont,$super_admin,$cont,$data['admin_id'],$id,$cont);
					$stmt->execute();
					
					if($_POST['position_type']==1)
					{
						$stmt = $dbCon->prepare("insert into manage_employee_permissions (is_admin, employee_id, permission, user_id, company_id, page_id, created_date, modified_date ) values(?, ?, ?, ?, ?, ?, now(),now())");
						$is_admin=0;
						$stmt->bind_param("iiiiii",$is_admin,$admin,$cont,$data['user_id'],$id,$cont);
						$stmt->execute();
					}
					else
					{
						$stmt = $dbCon->prepare("insert into manage_employee_permissions (is_admin, employee_id, permission, user_id, company_id, page_id, created_date, modified_date ) values(?, ?, ?, ?, ?, ?, now(),now())");
						$is_admin=1;
						$stmt->bind_param("iiiiii",$is_admin,$admin,$cont,$data['user_id'],$id,$cont);
						$stmt->execute();
					}
				
				 
				$stmt       = $dbCon->prepare("insert into company_permission (`company_id`,`user_login_id`,`purchase`,`alert`,`supplier`,`customer`,`employee`,`proposal`,`project_proposal`,`create_article`,`import_article`) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$status_per = 1;
				$stmt->bind_param("iiiiiiiiiii", $id, $data['user_id'], $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per);
				$stmt->execute();
				
				
				$stmt       = $dbCon->prepare("insert into company_verified (company_id,verified,unvarified,is_verified) values (?, ?, ?, ?)");
				$status_ver = 7;
				$stmt->bind_param("iiii", $id, $status_emp, $status_ver, $status_emp);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("INSERT INTO property_location (company_id,property_id,visiting_address,created_on, is_headquarter,port_number) VALUES ( ?, ?, ?, now(), ?, ?)");
				$stmt->bind_param("iisis", $id,$_POST['property_id'],htmlentities($_POST['adrs1'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['is_headquarter'],$_POST['port_number']);
				$stmt->execute();
				$property_id=$stmt->insert_id;
				if($_POST['same_invoice']==1)
				{
					 $_POST['iaddress']=$_POST['daddress'];
					 $_POST['icity']=$_POST['dcity'];
					 $_POST['izip']=$_POST['dzip'];
					 $_POST['i_port_number']=$_POST['d_port_number'];
				}
				$stmt = $dbCon->prepare("update company_profiles set si_address=?,si_city=?,si_zip=?,sd_address=?,sd_city=?,sd_zip=?,d_port_number=?,i_port_number=?,is_invoice_same=?, `company_pickup_info`=? ,   `pickup_address`=? ,  `pickup_zip`=?  ,   `company_digital_delivery` =?   where company_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssssssssiissii", $_POST['iaddress'],$_POST['icity'],$_POST['izip'],$_POST['daddress'],$_POST['dcity'],$_POST['dzip'],$_POST['d_port_number'],$_POST['i_port_number'],$_POST['same_invoice'],$_POST['company_pickup_info'],$_POST['pickup_address'],$_POST['pickup_zip'],$_POST['company_digital_delivery'],$id);
				$stmt->execute();
				
				
				$stmt = $dbCon->prepare("update property_location set street_name_i=?, city_i=?, postal_code_i=?, street_name_v=?, city_v=?, postal_code_v=?, d_port_number=?,i_port_number=?,is_invoice_same=?,country_v=?,country_i=?    where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssssssssissi", $_POST['iaddress'],$_POST['icity'],$_POST['izip'],$_POST['daddress'],$_POST['dcity'],$_POST['dzip'],$_POST['d_port_number'],$_POST['i_port_number'],$_POST['same_invoice'],$row_country['country_name'],$row_country['country_name'],$property_id);
				$stmt->execute();
				
				$fields=array();
				
				$fields=$_POST;
				$fields['country_name']=$row_country['country_name'];
				$fields['property_id_qloud']=$property_id;
				$fields['company_email']=$email;
				$fields['web']='www.safeqloud.com';
				$fields['user_email']=$userrow['email'];
				$fields['first_name']=$userrow['first_name'];
				$fields['last_name']=$userrow['last_name']; 
				$fields['country_of_residence']=$userrow['country_of_residence'];
				$fields['is_admin']=$user_admin;
				$fields['hash_code']=$hash_code;
				$url='https://www.qmatchup.com/beta/company/index.php/UpdateUserCompany/addCorporateCompany';
				
				$fields_post=array();
				$fields_post['posted']= $this -> encrypt_decrypt('encrypt',serialize($fields));
				
				$ch = curl_init();
			//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch,CURLOPT_URL, $url);
			curl_setopt($ch,CURLOPT_POST, count($fields_post));
			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_post);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_REFERER, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, true);
			curl_setopt($ch, CURLOPT_COOKIEFILE, true);
			
			$result=curl_exec ($ch);
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			
			curl_close ($ch);
				
			}
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		
		function checkCompanyId() {
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("SELECT id FROM company_profiles WHERE cid=?");
			
			/* bind parameters for markers*/
			$stmt->bind_param("s", $_POST['cid']);
			$stmt->execute();
			$result = $stmt->get_result();
			$myrow  = $result->fetch_assoc();
			  
			if(empty($myrow))
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
		
		
		function checkCompanyEmail() {
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("SELECT id FROM companies WHERE company_email=?");
			
			/* bind parameters for markers*/
			$stmt->bind_param("s", $_POST['company_email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$myrow  = $result->fetch_assoc();
			  
			if(empty($myrow))
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
		
}