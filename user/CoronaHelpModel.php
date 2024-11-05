<?php
require_once('../AppModel.php');
class CoronaHelpModel extends AppModel
{
function joinGroup($data)
{
$dbCon = AppModel::createConnection();
$group_id= $this -> encrypt_decrypt('decrypt',$data['gid']); 
$stmt = $dbCon->prepare("select group_type,email from corona_help_groups left join user_logins on user_logins.id=corona_help_groups.user_id where corona_help_groups.id=?");
$stmt->bind_param("i", $group_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if($row['group_type']==1)
{
	$st=1;
}
else
{
	$st=0;
}
$stmt = $dbCon->prepare("insert into corona_help_group_members (group_id,member_id,is_approved,created_on,modified_on) values(?, ?, ?, now(),now())");
$stmt->bind_param("iii", $group_id ,$data['user_id'],$st);
$stmt->execute();
$url='https://www.qloudid.com/user/index.php/CoronaHelp/groupStatistics/'.$data['gid'];
$surl=getShortUrl($url);
$subject       = "Group joined!";
$to=$row['email'];
$emailContent='<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   </head>
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
                                                               <p style="Margin-top:0px;margin-bottom:0px;font-size:13px;line-height:16px"><strong><a style="text-decoration:none;color:#111111" target="_blank">Website: <u></u>www.qloudid.com<u></u></a></strong></p>
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
                                                            <div class="padding-bottom: 40px; text-align: center; font-size: 45px;"><img src="http://www.qloudid.com/html/usercontent/images/doublecheck.png" width="45px;" height="45px;"></div>
                                                            <div class="padb0 xxs-padb0 ">
                                                               <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:#ffffff;">Joined</h1>
                                                            </div>
                                                            <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:#ffffff; font-size: 20px;"> A user has joined your group.</div>
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
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">
                                                      <tbody>
                                                         <tr>
                                                            <td align="left" style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:center">
                                                               <table border="0" cellspacing="0" cellpadding="0" align="left">
                                                                  <tbody>
                                                                     <tr>
                                                                        <td align="left" style="font-size:18px;line-height:22px;font-weight:bold; text-align:center; padding-bottom:15px;"><span><a href="https://www.qloudid.com/user/index.php/CoronaHelp/groupStatistics/'.$data['gid'].'" style="border-radius:3px;color:#ff2828;text-decoration:none;background-color:#ff2828;border-top:14px solid #ff2828;border-bottom:14px solid #ff2828;border-left:14px solid #ff2828;border-right:14px solid #ff2828;display:inline-block;border-radius:3px;color:#ffffff; padding-left:25px; padding-right:25px; font-weight:normal;" target="_blank" data-saferedirecturl="https://www.qloudid.com/user/index.php/CoronaHelp/groupStatistics/'.$data['gid'].'">Click here</a></span></td>
                                                                     </tr>
                                                                     <tr style="padding-top:20px;">
                                                                        <td align="left" valign="top" scope="col" style="padding-top:20px;  padding-bottom:15px;">
                                                                           <div style="font-size:16px; text-align:center;">If the button is not working then copy/paste the link in your browser to manage your delivery
                                                                              <br><br>
                                                                              <a style="text-decoration:none; color:#3691c0;">'.$surl.'</a>
                                                                           </div>
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
                                                                                          <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px; font-size:14px;">This is sent because someone joined a group you created.</p>
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
function addGroup($data)
{
$dbCon = AppModel::createConnection();
 
$stmt = $dbCon->prepare("insert into corona_help_groups (social_media,link_name,group_name,user_id,group_type,created_on) values(?, ?,?, ?, ?, now())");
$stmt->bind_param("issii", $_POST['social_media'],$_POST['link_name'],htmlentities($_POST['name'],ENT_NOQUOTES, 'ISO-8859-1') ,$data['user_id'],$_POST['gtype']);
$stmt->execute();
$id=$stmt->insert_id;
$st=1;
$stmt = $dbCon->prepare("insert into corona_help_group_members (group_id,member_id,is_approved,created_on,modified_on) values(?, ?, ?, now(),now())");
$stmt->bind_param("iii", $id ,$data['user_id'],$st);
$stmt->execute();

$stmt->close();
$dbCon->close();
return 1;
}
function userSummary($data)
{
$dbCon = AppModel::createConnection();
 
$stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image,get_started_wizard_status,grading_status,country_of_residence,country_name,user_logins.created_on,distance_value from user_logins left join country on country.id=user_logins.country_of_residence left join corona_helping_hand on user_logins.id=corona_helping_hand.user_id where user_logins.id = ?");
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

function viewItemList($data)
{
$dbCon = AppModel::createConnection();
$elder= $this -> encrypt_decrypt('decrypt',$data['eid']);
$stmt = $dbCon->prepare("select id  from item_required where eldery_id=? and is_delivered=0 and id not in (select item_id from corona_item_views where volunteer_id=?) order by modified_on desc");
$stmt->bind_param("ii", $elder,$data['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$org=array();
$j=0;
while($row = $result->fetch_assoc())
{
$stmt = $dbCon->prepare("insert into corona_item_views (item_id,volunteer_id,created_on) values(?, ?, now())");
$stmt->bind_param("ii", $row['id'],$data['user_id']);
$stmt->execute();
}
$stmt->close();
$dbCon->close();
return 1;
}

function viewGroupDetail($data)
{
$dbCon = AppModel::createConnection();
$group_id= $this -> encrypt_decrypt('decrypt',$data['gid']);
$stmt = $dbCon->prepare("select * from corona_help_groups where id=?");
$stmt->bind_param("i", $group_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
$dbCon->close();
return $row;
}


function totalAssigenmentCompleted($data)
{
$dbCon = AppModel::createConnection();
$group_id= $this -> encrypt_decrypt('decrypt',$data['gid']);
$stmt = $dbCon->prepare("select count(id) as num from corona_help_group_assigenment where group_id=?");
$stmt->bind_param("i", $group_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
$dbCon->close();
return $row;
}

function peopleAssigenmentCompleted($data)
{
$dbCon = AppModel::createConnection();
$group_id= $this -> encrypt_decrypt('decrypt',$data['gid']);
$stmt = $dbCon->prepare("select langitude,latitude,port_number,user_logins.id,concat_ws(' ',first_name,last_name) as name,passport_image,user_profiles.address,severity from corona_help_group_assigenment left join user_logins on user_logins.id=corona_help_group_assigenment.user_id left join user_profiles on user_logins.id=user_profiles.user_logins_id where group_id=? limit 0,20");
$stmt->bind_param("i", $group_id);
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

function moreAssigenments($data)
{
$dbCon = AppModel::createConnection();
$group_id= $this -> encrypt_decrypt('decrypt',$data['gid']);
$a=($_POST['id']*20)+1;

$stmt = $dbCon->prepare("select langitude,latitude,port_number,user_logins.id,concat_ws(' ',first_name,last_name) as name,passport_image,user_profiles.address,severity from corona_help_group_assigenment left join user_logins on user_logins.id=corona_help_group_assigenment.user_id left join user_profiles on user_logins.id=user_profiles.user_logins_id where group_id=? limit ?,20");
$stmt->bind_param("ii", $group_id,$a);
$stmt->execute();
$result = $stmt->get_result();
$org='';
while($row = $result->fetch_assoc())
{
	if($row['severity']==1)
	{
		$sev='red_ff2828_txt fas fa-thermometer-full';
	}
	else if($row['severity']==2)
	{
		$sev='yellow_txt fas fa-thermometer-half';
	}
	else if($row['severity']==3)
	{
		$sev='blue_67cff7 fas fa-thermometer-quarter';
	}
$org=$org.' <div class=" white_bg   brdb  " style="">
                                          <div class="container padb20 padt15    brdrad1 fsz18 dark_grey_txt">
                                             <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
                                                <!--<div class="clear hidden-xs"></div>-->
                                                <div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
				 								
												
                                                   <div class="fleft wi_10 xxs-wi_15 sm-wi_10 xsip-wi_10 xxs-marr15">
												   <div class="wi_50p xs-wi_100 hei_50p xs-hei_45p newgrey_bg talc valm padt10" style="border-radius: 10%;"><span class="white_txt fsz30 valm talc" height="45px" width="45px"><i class="xxs-fab fabBox fa-stack-1x  bold padt5 xs-padt0 '.$sev.'" aria-hidden="true"   ></i></span> </div>
                                                      
                                                   </div>
                                                   <div class="fleft wi_75 xxs-wi_75    "> 
                                                      <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir">Uppdrag</span>
                                                      <span class="trn fsz18  black_txt ffamily_avenir  ">'.$row['name'].' | '.$row['address'].' '.$row['port_number'].'</span>  
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

function viewGroupInformationApproved($data)
{
$dbCon = AppModel::createConnection();
 
$stmt = $dbCon->prepare("select * from corona_help_groups where id in (select group_id from corona_help_group_members where member_id=? and is_approved=1)");
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

function viewGroupList($data)
{
$dbCon = AppModel::createConnection();
 
$stmt = $dbCon->prepare("select *  from corona_help_groups");
 
$stmt->execute();
$result = $stmt->get_result();
$org=array();
$j=0;

while($row = $result->fetch_assoc())
{
$stmt = $dbCon->prepare("select id,is_approved  from corona_help_group_members where member_id=? and group_id=?");
$stmt->bind_param("ii", $data['user_id'],$row['id']);
$stmt->execute();
$result2 = $stmt->get_result();	
$row2= $result2->fetch_assoc();

if(empty($row2))
{
$row['is_member']=0;
$row['is_approved']=0;
}
else
{
$row['is_member']=1;
$row['is_approved']=$row2['is_approved'];
}	
$enc=$this->encrypt_decrypt('encrypt',$row['id']);
$url="https://www.qloudid.com/public/index.php/CoronaHelp/detailInfoMember/".$enc;	
array_push($org,$row);
$org[$j]['enc']=$enc;
$org[$j]['invitation_link']=getShortUrl($url);
$j++;
}
$stmt->close();
$dbCon->close();
return $org;
}

function countNewItemList($data)
{
$dbCon = AppModel::createConnection();
$elder= $this -> encrypt_decrypt('decrypt',$data['eid']);
$stmt = $dbCon->prepare("select count(id) as num  from item_required where eldery_id=? and is_delivered=0 and id not in (select item_id from corona_item_views where volunteer_id=?) order by modified_on desc");
$stmt->bind_param("ii", $elder,$data['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
$dbCon->close();
return $row;;
}
function addUser($data)
{
$dbCon = AppModel::createConnection();
$stmt = $dbCon->prepare("select address from user_profiles where user_logins_id=?");
/* bind parameters for markers */
$stmt->bind_param("i", $data['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc(); 
$st=1;
$stmt = $dbCon->prepare("select is_volunteer from corona_helping_hand where user_id=?");
/* bind parameters for markers */
$stmt->bind_param("i", $data['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$rowC = $result->fetch_assoc();
if(empty($rowC))
{
$stmt = $dbCon->prepare("insert into corona_helping_hand (user_id,address,is_volunteer,created_on,is_active) values(?,?,?,now(),?)");
/* bind parameters for markers */
$stmt->bind_param("isii", $data['user_id'],$row['address'],$_POST['ind'],$st);
$stmt->execute();
} 
else
{
$stmt = $dbCon->prepare("update corona_helping_hand set is_active=1 where user_id=?");
/* bind parameters for markers */
$stmt->bind_param("i", $data['user_id']);
$stmt->execute();	
}
$stmt->close();
$dbCon->close();
return 1;
}

function activateUser($data)
{
$dbCon = AppModel::createConnection();
 
$stmt = $dbCon->prepare("select is_volunteer from corona_helping_hand where user_id=?");
/* bind parameters for markers */
$stmt->bind_param("i", $data['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$rowC = $result->fetch_assoc();

$stmt = $dbCon->prepare("update corona_helping_hand set is_active=1 where user_id=?");
/* bind parameters for markers */
$stmt->bind_param("i", $data['user_id']);
$stmt->execute();	
 
$stmt->close();
$dbCon->close();
return $rowC['is_volunteer'];
}

function deliverProduct($data)
{
$dbCon = AppModel::createConnection();
$elder= $this -> encrypt_decrypt('decrypt',$data['eid']);

	 
$stmt = $dbCon->prepare("select id from  item_required  where volunteer_id=? and eldery_id=? and is_delivered=-1");
/* bind parameters for markers */
$stmt->bind_param("ii", $data['user_id'],$elder);
$stmt->execute();
$result = $stmt->get_result();
$items='';
while($rowItems = $result->fetch_assoc())
{
$items=$items.$rowItems['id'].',';
}
$items=substr($items,0,-1);
$stmt = $dbCon->prepare("select min(severity) as severi from  item_required  where volunteer_id=? and eldery_id=? and is_delivered=-1");
/* bind parameters for markers */
$stmt->bind_param("ii", $data['user_id'],$elder);
$stmt->execute();
$result = $stmt->get_result();
$rowSeverity = $result->fetch_assoc();

$stmt = $dbCon->prepare("insert into corona_help_group_assigenment (user_id,group_id,items_detail,created_on,severity) values(?, ?, ?, now(),?)");
$stmt->bind_param("iisi", $elder,$_POST['type_c'],$items,$rowSeverity['severi']);
$stmt->execute();

$insid=$stmt->insert_id;

$stmt = $dbCon->prepare("insert into corona_pending_received (assignment_id,created_on,helper_id) values(?, now(),? )");
$stmt->bind_param("ii", $insid,$data['user_id']);
$stmt->execute();
 
$stmt = $dbCon->prepare("update item_required set volunteer_id=?,is_delivered=1,modified_on=now() where volunteer_id=? and eldery_id=? and is_delivered=-1");
/* bind parameters for markers */
$stmt->bind_param("iii", $data['user_id'],$data['user_id'],$elder);
$stmt->execute();
$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name from user_logins where id=?");
/* bind parameters for markers */
$stmt->bind_param("i", $data['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$row_volunteer = $result->fetch_assoc();
$stmt = $dbCon->prepare("select  first_name,last_name,email,phone_number,country_code  from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id left join phone_country_code on phone_country_code.id=user_logins.country_of_residence where user_logins.id=?");
/* bind parameters for markers */
$stmt->bind_param("i", $elder);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$to = '+'.trim($row['country_code']).''.trim($row['phone_number']);
$subject       = "Receive product!";
$emailContent ="Volunteer ".$row_volunteer['name']." has made a delivery outside your door. Please pick it up.";
$res=sendSms($subject, $to, $emailContent);
$to  = $row['email'];
$url="https://www.qloudid.com/user/index.php/CoronaHelp/listItemsDetailVolunteers";
$surl=getShortUrl($url);
$emailContent='<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   </head>
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
                                                               <p style="Margin-top:0px;margin-bottom:0px;font-size:13px;line-height:16px"><strong><a style="text-decoration:none;color:#111111" target="_blank">Website: <u></u>www.qloudid.com<u></u></a></strong></p>
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
                                                            <div class="padding-bottom: 40px; text-align: center; font-size: 45px;"><img src="http://www.qloudid.com/html/usercontent/images/doublecheck.png" width="45px;" height="45px;"></div>
                                                            <div class="padb0 xxs-padb0 ">
                                                               <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:#ffffff;">Received</h1>
                                                            </div>
                                                            <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:#ffffff; font-size: 20px;">You got delivery you need to manage.</div>
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
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">
                                                      <tbody>
                                                         <tr>
                                                            <td align="left" style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:center">
                                                               <table border="0" cellspacing="0" cellpadding="0" align="left">
                                                                  <tbody>
                                                                     <tr>
                                                                        <td align="left" style="font-size:18px;line-height:22px;font-weight:bold; text-align:center; padding-bottom:15px;"><span><a href="https://www.qloudid.com/user/index.php/CoronaHelp/listItemsDetailVolunteers" style="border-radius:3px;color:#ff2828;text-decoration:none;background-color:#ff2828;border-top:14px solid #ff2828;border-bottom:14px solid #ff2828;border-left:14px solid #ff2828;border-right:14px solid #ff2828;display:inline-block;border-radius:3px;color:#ffffff; padding-left:25px; padding-right:25px; font-weight:normal;" target="_blank" data-saferedirecturl="https://www.qloudid.com/user/index.php/CoronaHelp/listItemsDetailVolunteers">Click here</a></span></td>
                                                                     </tr>
                                                                     <tr style="padding-top:20px;">
                                                                        <td align="left" valign="top" scope="col" style="padding-top:20px;  padding-bottom:15px;">
                                                                           <div style="font-size:16px; text-align:center;">If the button is not working then copy/paste the link in your browser to manage your delivery
                                                                              <br><br>
                                                                              <a style="text-decoration:none; color:#3691c0;">'.$surl.'</a>
                                                                           </div>
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
                                                                                          <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px; font-size:14px;">This is sent because you created a shopping list.</p>
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
function claimProduct($data)
{
$dbCon = AppModel::createConnection();
$product_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
 
$stmt = $dbCon->prepare("select * from item_required  where id=?");
/* bind parameters for markers */
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc(); 
if($_POST['pkts']==$row['total_packets'])
{
$stmt = $dbCon->prepare("update item_required set volunteer_id=?,is_delivered=-1,modified_on=now() where id=?");
/* bind parameters for markers */
$stmt->bind_param("ii", $data['user_id'],$product_id);
$stmt->execute();
}
else
{
$remaining=	$row['total_packets'] - $_POST['pkts'];
$stmt = $dbCon->prepare("update item_required set total_packets=?,modified_on=now() where id=?");
/* bind parameters for markers */
$stmt->bind_param("ii", $remaining,$product_id);
$stmt->execute();
$claim=-1;
$stmt = $dbCon->prepare("insert into item_required (volunteer_id, item_detail,eldery_id,created_on,modified_on,image_path,total_packets,is_delivered,severity) values(?, ?, ?, now(), now(), ?, ?, ?,?)");
$stmt->bind_param("isisiii", $data['user_id'],$row['item_detail'],$row['eldery_id'],$row['image_path'],$_POST['pkts'],$claim,$row['severity']);
$stmt->execute();
}
$stmt->close();
$dbCon->close();
return 1;
}
function unclaimProduct($data)
{
$dbCon = AppModel::createConnection();
$product_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
$stmt = $dbCon->prepare("update item_required set volunteer_id=?,is_delivered=0,modified_on=now() where id=?");
/* bind parameters for markers */
$stmt->bind_param("ii", $data['user_id'],$product_id);
$stmt->execute();
$stmt->close();
$dbCon->close();
return 1;
}
 


function receiveProduct($data)
{
$dbCon = AppModel::createConnection();
 $assignment_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
$stmt = $dbCon->prepare("select items_detail from corona_help_group_assigenment where id=?");
$stmt->bind_param("i", $assignment_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$a=explode(',',$row['items_detail']);
$org=array();
$j=0;
foreach($a as $key)
{
$stmt = $dbCon->prepare("select * from item_required  where id=?");
/* bind parameters for markers */
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc(); 
if($row['is_delivered']==3)
{
$stmt = $dbCon->prepare("insert into item_required (item_detail,eldery_id,created_on,modified_on,image_path,total_packets,severity) values( ?, ?, now(), now(), ?, ?, ?)");
$stmt->bind_param("sisii", $row['item_detail'],$row['eldery_id'],$row['image_path'],$row['total_packets'],$row['severity']);
$stmt->execute();
}	
$stmt = $dbCon->prepare("update item_required set is_delivered=2,modified_on=now() where id =? and is_delivered=1");
/* bind parameters for markers */
$stmt->bind_param("i", $key);
$stmt->execute();
}
$stmt = $dbCon->prepare("update corona_pending_received set is_completed=1,modified_on=now()  where assignment_id =?");
/* bind parameters for markers */
$stmt->bind_param("i", $assignment_id);
$stmt->execute();
$stmt->close();
$dbCon->close();
return 1;
}
function inactivateProduct($data)
{
$dbCon = AppModel::createConnection();
$product_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
$stmt = $dbCon->prepare("update item_required set is_delivered=3,modified_on=now() where id=?");
/* bind parameters for markers */
$stmt->bind_param("i", $product_id);
$stmt->execute();
$stmt->close();
$dbCon->close();
return 1;
}

function  activateProduct($data)
{
$dbCon = AppModel::createConnection();
$product_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
$stmt = $dbCon->prepare("update item_required set is_delivered=1,modified_on=now() where id=?");
/* bind parameters for markers */
$stmt->bind_param("i", $product_id);
$stmt->execute();
$stmt->close();
$dbCon->close();
return 1;
}
function movetoTrash($data)
{
$dbCon = AppModel::createConnection();
$product_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
$stmt = $dbCon->prepare("update item_required set is_delivered=4,modified_on=now() where id=?");
/* bind parameters for markers */
$stmt->bind_param("i", $product_id);
$stmt->execute();
$stmt->close();
$dbCon->close();
return 1;
}
function markRequired($data)
{
$dbCon = AppModel::createConnection();
$product_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
$stmt = $dbCon->prepare("update item_required set is_delivered=0,modified_on=now() where id=?");
/* bind parameters for markers */
$stmt->bind_param("i", $product_id);
$stmt->execute();
$stmt->close();
$dbCon->close();
return 1;
}


function markUndelivered($data)
{
$dbCon = AppModel::createConnection();
$product_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
$stmt = $dbCon->prepare("update item_required set is_delivered=-1,modified_on=now() where id=?");
/* bind parameters for markers */
$stmt->bind_param("i", $product_id);
$stmt->execute();
$stmt->close();
$dbCon->close();
return 1;
}
function userRole($data)
{
$dbCon = AppModel::createConnection();

$stmt = $dbCon->prepare("select id,is_volunteer from corona_helping_hand where user_id=? and is_active=1");
/* bind parameters for markers */
$stmt->bind_param("i", $data['user_id']);
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
return $row['is_volunteer'];
}
}
function userDistance($data)
{
$dbCon = AppModel::createConnection();
$stmt = $dbCon->prepare("select distance_value from corona_helping_hand where user_id=? and is_active=1");
/* bind parameters for markers */
$stmt->bind_param("i", $data['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc(); 
$stmt->close();
$dbCon->close();
return $row['distance_value'];
}
function updateDistance($data)
{
$dbCon = AppModel::createConnection();
$stmt = $dbCon->prepare("update corona_helping_hand set distance_value=? where user_id=?");
/* bind parameters for markers */
$stmt->bind_param("ii", $_POST['distance_value'],$data['user_id']);
$stmt->execute();
$stmt->close();
$dbCon->close();
return 1;
}
function itemDetailInfo($data)
{
$dbCon = AppModel::createConnection();
$product_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
$stmt = $dbCon->prepare("select * from item_required  where id=?");
/* bind parameters for markers */
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc(); 
if($row['image_path']!=null) { $filename="../estorecss/".$row['image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row['image_path'].".txt"); $value_a=str_replace('"','',$value_a);  } else { $value_a="url(http://www.qloudid.com/html/usercontent/images/12.png)"; } }  else $value_a="url(http://www.qloudid.com/html/usercontent/images/12.png)";
$row['img']=$value_a;
$stmt->close();
$dbCon->close();
return $row;
}
function phoneVerified($data)
{
$dbCon = AppModel::createConnection();
$stmt = $dbCon->prepare("select phone_verified from user_profiles where user_logins_id =?");
/* bind parameters for markers */
$stmt->bind_param("i", $data['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc(); 
if($row['phone_verified']==1)
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
function addressVerified($data)
{
$dbCon = AppModel::createConnection();
$stmt = $dbCon->prepare("select latitude from user_profiles where user_logins_id =?");
/* bind parameters for markers */
$stmt->bind_param("i", $data['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc(); 
if($row['latitude']!=null)
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
function addItem($data)
{
$dbCon = AppModel::createConnection();
$data1 = strip_tags($_POST['image-data1']);
if($_POST['image-data1']=="" || $_POST['image-data1']==null || $_POST['image-data1']=='none')
{
$img_name1='';
}
else
{
define('UPLOAD_DIR','../estorecss/'); 
$img_name1="new".microtime();
file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
}
$stmt = $dbCon->prepare("insert into item_required (who_will_deliver,severity,item_detail,eldery_id,created_on,modified_on,image_path,total_packets) values(?, ?, ?, ?, now(), now(), ?, ?)");
$stmt->bind_param("iisisi", $_POST['who_will_deliver'],$_POST['svrty'],htmlentities($_POST['item'],ENT_NOQUOTES, 'ISO-8859-1') ,$data['user_id'],$img_name1,$_POST['pkts']);
$stmt->execute();
$stmt->close();
$dbCon->close();
return 1;
}
function addMoreItem($data)
{
$dbCon = AppModel::createConnection();
$elder= $this -> encrypt_decrypt('decrypt',$data['eid']);
$data1 = strip_tags($_POST['image-data1']);
if($_POST['image-data1']=="" || $_POST['image-data1']==null || $_POST['image-data1']=='none')
{
$img_name1='';
}
else
{
define('UPLOAD_DIR','../estorecss/'); 
$img_name1="new".microtime();
file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
}
$st=-1;
$stmt = $dbCon->prepare("insert into item_required (item_detail,eldery_id,volunteer_id,created_on,modified_on,image_path,total_packets,is_delivered) values(?, ?, ?,now(), now(), ?, ?,?)");
$stmt->bind_param("siisii", htmlentities($_POST['item'],ENT_NOQUOTES, 'ISO-8859-1') ,$elder,$data['user_id'],$img_name1,$_POST['pkts'],$st);
$stmt->execute();
$stmt->close();
$dbCon->close();
return 1;
}
function base64_to_jpeg($base64_string, $output_file) {
$ifp = fopen( $output_file, 'wb' ); 
$data = explode( ',', $base64_string );
fwrite( $ifp, base64_decode( $data[1] ) );
fclose( $ifp ); 
return $output_file; 
}	
function peopleInNeed($data)
{
$dbCon = AppModel::createConnection();
$stmt = $dbCon->prepare("select langitude,latitude from  user_profiles where user_logins_id=?");
$stmt->bind_param("i", $data['user_id']); 
$stmt->execute();
$result = $stmt->get_result();
$rowUser = $result->fetch_assoc();
$stmt = $dbCon->prepare("select langitude,latitude,port_number,user_logins.id,concat_ws(' ',first_name,last_name) as name,passport_image,user_profiles.address from user_logins left join corona_helping_hand on corona_helping_hand.user_id=user_logins.id left join user_profiles on user_logins.id=user_profiles.user_logins_id where user_logins.id in(select eldery_id from item_required where is_delivered=0 and eldery_id!=?) or user_logins.id in(select eldery_id from item_required where is_delivered=-1 and volunteer_id=?  and eldery_id!=?)");
$stmt->bind_param("iii", $data['user_id'],$data['user_id'],$data['user_id']); 
$stmt->execute();
$result = $stmt->get_result();
$org=array();
$j=0;
while($row = $result->fetch_assoc())
{
$earthRadius = 4857;
$latFrom = deg2rad($rowUser['latitude']);
$lonFrom = deg2rad($rowUser['langitude']);
$latTo = deg2rad($row['latitude']);
$lonTo = deg2rad($row['langitude']);
$latDelta = $latTo - $latFrom;
$lonDelta = $lonTo - $lonFrom;
$angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
if($data['user_id']!=43)
{				
if(($angle * $earthRadius *1.609344*1000)>$data['distance'])
{
continue;
}				
}
$stmt = $dbCon->prepare("select count(id) as num from  item_required where eldery_id=? and is_delivered=0 and severity=1");
$stmt->bind_param("i", $row['id']); 
$stmt->execute();
$resultSev = $stmt->get_result();
$rowSeverity = $resultSev->fetch_assoc();
if($rowSeverity['num']==0)
{	
$stmt = $dbCon->prepare("select count(id) as num from  item_required where eldery_id=? and is_delivered=0 and severity=2");
$stmt->bind_param("i", $row['id']); 
$stmt->execute();
$resultSev = $stmt->get_result();
$rowSeverity = $resultSev->fetch_assoc();	
if($rowSeverity['num']==0)
{	
$stmt = $dbCon->prepare("select count(id) as num from  item_required where eldery_id=? and is_delivered=0 and severity=3");
$stmt->bind_param("i", $row['id']); 
$stmt->execute();
$resultSev = $stmt->get_result();
$rowSeverity = $resultSev->fetch_assoc();	
$severity=3;
$countSev=$rowSeverity['num'];
}
else
{
$severity=2;
$countSev=$rowSeverity['num'];
}
}
else
{
$severity=1;
$countSev=$rowSeverity['num'];
}
array_push($org,$row);
$filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; } 
$org[$j]['severity']=$severity;
$org[$j]['num']=$countSev;
$org[$j]['image']=$imgs;
$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
$j++;
}
$stmt->close();
$dbCon->close();
return $org;
}
function peopleInNeedUpdate($data)
{
$dbCon = AppModel::createConnection();
$stmt = $dbCon->prepare("select langitude,latitude from  user_profiles where user_logins_id=?");
$stmt->bind_param("i", $data['user_id']); 
$stmt->execute();
$result = $stmt->get_result();
$rowUser = $result->fetch_assoc();
$stmt = $dbCon->prepare("select langitude,latitude,port_number,user_logins.id,concat_ws(' ',first_name,last_name) as name,passport_image,user_profiles.address from user_logins left join corona_helping_hand on corona_helping_hand.user_id=user_logins.id left join user_profiles on user_logins.id=user_profiles.user_logins_id where user_logins.id in(select eldery_id from item_required where is_delivered=0)");
$stmt->execute();
$result = $stmt->get_result();
$org='';
$j=0;
while($row = $result->fetch_assoc())
{
$earthRadius = 4857;
$latFrom = deg2rad($rowUser['latitude']);
$lonFrom = deg2rad($rowUser['langitude']);
$latTo = deg2rad($row['latitude']);
$lonTo = deg2rad($row['langitude']);
$latDelta = $latTo - $latFrom;
$lonDelta = $lonTo - $lonFrom;
$angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
if(($angle * $earthRadius *1.609344*1000)>$_POST['total_distance'])
{
continue;
}				
$filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; } 
$enc= $this -> encrypt_decrypt('encrypt',$row['id']);
$org='
<a href="listItemsRequired/'.$enc.'">
   <div class="column_m container  marb5   fsz14 dark_grey_txt">
      <div class=" white_bg marb10  brdb  " style="">
         <div class="container padrl10 padb20 padt15    brdrad1 fsz18 dark_grey_txt">
            <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
               <!--<div class="clear hidden-xs"></div>-->
               <div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
                  <div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marl15 ">
                     <div class="wi_50p xs-wi_100 hei_50p xs-hei_45p "><img src="../../'.$imgs.'" width="45px;" height="45px;" alt="Profile " style="background-repeat: no-repeat;
                        background-position: 50%;
                        border-radius: 10%;"> </div>
                  </div>
                  <div class="fleft wi_50 xxs-wi_60 sm-wi_50 xsip-wi_50   "> 
                     <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir">'.$row['port_number'].','.$row['address'].'</span>
                     <span class="trn fsz18  black_txt ffamily_avenir  ">'.$row['name'].'</span>  
                  </div>
                  <div class="fright wi_10 padl0 xs-wi_30 sm-wi_100 marl15 fsz40  xs-marl0 xxs-marr20 padb0 hidden-xs">
                     <span class="fas fa-arrow-alt-circle-right blue_txt"></span>
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
function itemList($data)
{
$dbCon = AppModel::createConnection();
$elder= $this -> encrypt_decrypt('decrypt',$data['eid']);
$stmt = $dbCon->prepare("select id,item_detail,image_path,total_packets from item_required where eldery_id=? and is_delivered=0 order by modified_on desc");
$stmt->bind_param("i", $elder);
$stmt->execute();
$result = $stmt->get_result();
$org=array();
$j=0;
while($row = $result->fetch_assoc())
{
array_push($org,$row);
$filename="../estorecss/".$row ['image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['image_path'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['image_path'].'.jpg' ); } else { $imgs="../html/usercontent/images/12.png"; } 
$org[$j]['image']=$imgs;
$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
$j++;
}
$stmt->close();
$dbCon->close();
return $org;
}
function itemListClaimed($data)
{
$dbCon = AppModel::createConnection();
$elder= $this -> encrypt_decrypt('decrypt',$data['eid']);
$stmt = $dbCon->prepare("select id,item_detail,image_path,total_packets from item_required where eldery_id=? and is_delivered=-1 and volunteer_id=? order by modified_on desc");
$stmt->bind_param("ii", $elder,$data['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$org=array();
$j=0;
while($row = $result->fetch_assoc())
{
array_push($org,$row);
$filename="../estorecss/".$row ['image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['image_path'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['image_path'].'.jpg' ); } else { $imgs="../html/usercontent/images/12.png"; } 
$org[$j]['image']=$imgs;
$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
$j++;
}
$stmt->close();
$dbCon->close();
return $org;
}


 
function itemListClaimedCount($data)
{
$dbCon = AppModel::createConnection();
$elder= $this -> encrypt_decrypt('decrypt',$data['eid']);
$stmt = $dbCon->prepare("select count(id) as num from item_required where eldery_id=? and is_delivered=-1 and volunteer_id=? order by modified_on desc");
$stmt->bind_param("ii", $elder,$data['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
$dbCon->close();
return $row;
}
function deliveryAddress($data)
{
$dbCon = AppModel::createConnection();
$elder= $this -> encrypt_decrypt('decrypt',$data['eid']);
$stmt = $dbCon->prepare("select address,concat_ws(' ',first_name,last_name) as name,port_number,passport_image,first_name from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id=?");
$stmt->bind_param("i", $elder);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
$dbCon->close();
return $row;
}

function itemListDelivered($data)
{
$dbCon = AppModel::createConnection();
$elder= $this -> encrypt_decrypt('decrypt',$data['eid']);
$stmt = $dbCon->prepare("select id,item_detail,image_path,total_packets from item_required where eldery_id=? and is_delivered=1 and id not in (select item_id from corona_item_delivered_view where volunteer_id=?) order by modified_on desc");
$stmt->bind_param("ii", $elder,$data['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$org=array();
$j=0;
while($row = $result->fetch_assoc())
{
array_push($org,$row);
$filename="../estorecss/".$row ['image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['image_path'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['image_path'].'.jpg' ); } else { $imgs="../html/usercontent/images/12.png"; } 
$org[$j]['image']=$imgs;
$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
$j++;
}
$stmt->close();
$dbCon->close();
return $org;
}

function itemListDeliveredView($data)
{
$dbCon = AppModel::createConnection();
$elder= $this -> encrypt_decrypt('decrypt',$data['eid']);
$stmt = $dbCon->prepare("select id  from item_required where eldery_id=? and is_delivered=1 and id not in (select item_id from corona_item_delivered_view where volunteer_id=?)");
$stmt->bind_param("ii", $elder,$data['user_id']);
$stmt->execute();
$result = $stmt->get_result();
 
while($row = $result->fetch_assoc())
{
 $stmt = $dbCon->prepare("insert into corona_item_delivered_view (item_id,volunteer_id,created_on) values(?, ?, now())");
$stmt->bind_param("ii", $row['id'],$data['user_id']);
$stmt->execute();
}
$stmt->close();
$dbCon->close();
return 1;
}
function itemListAdded($data)
{
$dbCon = AppModel::createConnection();
$stmt = $dbCon->prepare("select id,item_detail,image_path,total_packets,severity from item_required where eldery_id=? and is_delivered=0 order by modified_on desc");
$stmt->bind_param("i", $data['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$org=array();
$j=0;
while($row = $result->fetch_assoc())
{
array_push($org,$row);
$filename="../estorecss/".$row ['image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['image_path'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['image_path'].'.jpg' ); } else { $imgs="../html/usercontent/images/12.png"; } 
$org[$j]['image']=$imgs;
$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
$j++;
}
$stmt->close();
$dbCon->close();
return $org;
}
function itemListDeliveredVolunteer($data)
{
$dbCon = AppModel::createConnection();
$assignment_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
$stmt = $dbCon->prepare("select items_detail from corona_help_group_assigenment where id=?");
$stmt->bind_param("i", $assignment_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$a=explode(',',$row['items_detail']);
$org=array();
$j=0;
foreach($a as $key)
{
$stmt = $dbCon->prepare("select id,item_detail,image_path,total_packets,is_delivered from item_required where id =? order by modified_on desc");
$stmt->bind_param("i", $key);
$stmt->execute();
$result = $stmt->get_result();

$row = $result->fetch_assoc();
array_push($org,$row);
$filename="../estorecss/".$row ['image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['image_path'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['image_path'].'.jpg' ); } else { $imgs="../html/usercontent/images/12.png"; } 
$org[$j]['image']=$imgs;
$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
$j++;

}
$stmt->close();
$dbCon->close();
return $org;
}

function itemListDeliveredVolunteerInfo($data)
{
$dbCon = AppModel::createConnection();
$stmt = $dbCon->prepare("select is_completed,severity,concat_ws(' ',first_name,last_name) as `name`,items_detail,group_name,corona_help_group_assigenment.id,corona_help_group_assigenment.created_on,group_id  from corona_help_group_assigenment left join corona_pending_received on corona_pending_received.assignment_id=corona_help_group_assigenment.id left join  user_logins on user_logins.id=corona_pending_received.helper_id left join corona_help_groups on corona_help_groups.id=corona_help_group_assigenment.group_id   where items_detail in(select id from item_required where eldery_id=? and is_delivered=1) or ( corona_help_group_assigenment.id in (select assignment_id from corona_pending_received) and corona_help_group_assigenment.user_id=?) order by corona_help_group_assigenment.created_on desc");
$stmt->bind_param("ii",  $data['user_id'],$data['user_id']);
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


function itemListDelivereyCount($data)
{
$dbCon = AppModel::createConnection();
$stmt = $dbCon->prepare("select count(corona_help_group_assigenment.id) as num  from corona_help_group_assigenment left join corona_pending_received on corona_pending_received.assignment_id=corona_help_group_assigenment.id left join  user_logins on user_logins.id=corona_pending_received.helper_id left join corona_help_groups on corona_help_groups.id=corona_help_group_assigenment.group_id   where items_detail in(select id from item_required where eldery_id=? and is_delivered=1) or ( corona_help_group_assigenment.id in (select assignment_id from corona_pending_received) and corona_help_group_assigenment.user_id=?) and is_completed=0 order by corona_help_group_assigenment.created_on desc");
$stmt->bind_param("ii",  $data['user_id'],$data['user_id']);
$stmt->execute();
$result = $stmt->get_result();
 
$row = $result->fetch_assoc();
$stmt->close();
$dbCon->close();
return $row;
}


function itemListDeliveredyItemCount($data)
{
$dbCon = AppModel::createConnection();
$assignment_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
$stmt = $dbCon->prepare("select  items_detail ,corona_help_group_assigenment.id   from corona_help_group_assigenment   where id=?");
$stmt->bind_param("i",  $assignment_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$a=explode(',',$row['items_detail']);
$total=count($a);
$stmt->close();
$dbCon->close();
return $total;
}

function itemListDeliveredyCheckReceived($data)
{
$dbCon = AppModel::createConnection();
$assignment_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
$stmt = $dbCon->prepare("select  is_completed,modified_on   from corona_pending_received   where assignment_id=?");
$stmt->bind_param("i",  $assignment_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
 
$stmt->close();
$dbCon->close();
return $row;
}



function itemListDeliveredVolunteerCount($data)
{
$dbCon = AppModel::createConnection();
$assignment_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
$stmt = $dbCon->prepare("select items_detail from corona_help_group_assigenment where id=?");
$stmt->bind_param("i", $assignment_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$items=explode(',',$row['items_detail']);
$total=0;
foreach($items as $key)
{
$stmt = $dbCon->prepare("select count(id) as num  from item_required where  id = ? and is_delivered=1 order by modified_on desc");
$stmt->bind_param("i", $key);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$total=$total+$row['num'];
}
$stmt->close();
$dbCon->close();
return $total;
}
function itemListReceived($data)
{
$dbCon = AppModel::createConnection();
$assignment_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
$stmt = $dbCon->prepare("select items_detail from corona_help_group_assigenment where id=?");
$stmt->bind_param("i", $assignment_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$a=explode(',',$row['items_detail']);
$org=array();
$j=0;
foreach($a as $key)
{
$stmt = $dbCon->prepare("select id,item_detail,image_path,total_packets,is_delivered from item_required where id =? order by modified_on desc");
$stmt->bind_param("i", $key);
$stmt->execute();
$result = $stmt->get_result();

$row = $result->fetch_assoc();
array_push($org,$row);
$filename="../estorecss/".$row ['image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['image_path'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['image_path'].'.jpg' ); } else { $imgs="../html/usercontent/images/12.png"; } 
$org[$j]['image']=$imgs;
$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
$j++;

}
$stmt->close();
$dbCon->close();
return $org;
}
function itemListRejected($data)
{
$dbCon = AppModel::createConnection();
$stmt = $dbCon->prepare("select id,item_detail,image_path,total_packets from item_required where eldery_id=? and is_delivered=4 order by modified_on desc");
$stmt->bind_param("i", $data['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$org=array();
$j=0;
while($row = $result->fetch_assoc())
{
array_push($org,$row);
$filename="../estorecss/".$row ['image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['image_path'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['image_path'].'.jpg' ); } else { $imgs="../html/usercontent/images/12.png"; } 
$org[$j]['image']=$imgs;
$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
$j++;
}
$stmt->close();
$dbCon->close();
return $org;
}
}