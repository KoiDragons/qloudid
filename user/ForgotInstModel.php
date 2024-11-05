<?php
require_once('../AppModel.php');
class ForgotInstModel extends AppModel
{
    
    
    function forgotPasswordAccount($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select email_verification_code from user_logins where email = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $data['email']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
       
        if (empty($row)) {
            return 0;
        } else {
            
            $stmt   = $dbCon->prepare("UPDATE user_logins SET `email_verification_code`=?  WHERE `email`=?");
            $status = 1;
            /* bind parameters for markers */
            $stmt->bind_param("ss", $data['rand_hash'], $data['email']);
            
            $stmt->execute();
            
            
            if (!$stmt->execute()) {
                return 0;
            } else {
                return 1;
            }
        }
        
        $stmt->close();
        $dbCon->close();
    }
    
    
    
    
    function sendForgotInstEmail($data)
    {
        
        $to      = $data['email'];
        $subject = "Qloud ID - Rest your password.";
        
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
                  <div style="font-size:36px;">Reset Password</div>
                  <div style="font-size:11px;">' . date("d/m/Y") . '</div>
                </div></td>
              <td scope="col" align="right" width="50%" valign="top" style="padding:25px;"><div style="text-align:right"><img src="https://www.qmatchup.com/Newsletter/images/qmacthup.png" alt="Qmatchup" title="Qmatchup" style="font-size:35px; color:#FFFFFF;" /></div></td>
            </tr>
          </table></td>
      </tr>
      <tr>
        <td style="background-color:#FFFFFF;"><table width="100%" border="0" cellspacing="0" cellpadding="20">
            <tr>
              <td align="left" valign="top" scope="col"><div style="font-size:18px">Dear <b>' . $data['email'] . '</b>,</div>
                <div style="font-size:14px; padding-top:20px;">
                  <div> Did you forget your password? No problem.<br />
                    Simply click on the button below to reset it </div>
                </div></td>
            </tr>
            <tr>
              <td align="left" valign="top" scope="col"><a href="https://www.qloudid.com/user/index.php/RecoverPassword/recoverPasswordAccount/' . $data['email'] . '/' . $data['rand_hash'] . '" style="display:inline-block; padding:20px 35px; font-weight:bold; color:#FFF; background-color:#6ab743; text-decoration:none; border-radius:3px; -webkit-border-radius:3px; ">RESET MY PASSWORD NOW!</a></td>
            </tr>
            <tr>
              <td align="left" valign="top" scope="col"><div style="font-size:14px;">If the button is not working then copy/paste the link in your browser to confirm your registration <br />
                  <a href="#" style="text-decoration:none; color:#3691c0;">https://www.qloudid.com/user/index.php/RecoverPassword/recoverPasswordAccount/' . $data['email'] . '/' . $data['rand_hash'] . '</a></div></td>
            </tr>
            <tr>
              <td align="left" valign="top" scope="col" style="font-size:16px;"><div style="padding-bottom:5px;">Warm regards,</div>
                <div><b style="color:#6b6f74;">The Qmatchup team</b></div></td>
            </tr>
          </table></td>
      </tr>
      <tr>
        <td align="center" valign="top"><div style="padding-top:10px; font-size:11px;">This message was sent to <a href="mailto:#" style="text-decoration:none; color:#3691c0;">' . $data['email'] . '</a>. If you dont want to receive these emails from Qmatchup.com in the future, <br />
            please click <a href="#" style="text-decoration:none; color:#3691c0;">unsubscribe</a>. <a style="text-decoration:none; color:#6b6f74;" href="https://www.qmatchup.com"></a> Qmatchup Outsourcing AB, Stureplan 6, 114 35, Stockholm, Sweden</div></td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>';
      
        
        sendEmail($subject, $to, $emailContent);
        
    }
    
    
}