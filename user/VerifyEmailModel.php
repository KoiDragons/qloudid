<?php
require_once('../AppModel.php');
class VerifyEmailModel extends AppModel
{
    
    function VerifyEmailAccount($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("SELECT email_verification_code FROM user_logins WHERE email=?");
        
        /* bind parameters for markers*/
        $stmt->bind_param("s", $data['email']);
        $stmt->execute();
        $result = $stmt->get_result();
        $myrow  = $result->fetch_assoc();
       
          return $myrow;
        $stmt->close();
        $dbCon->close();
    }
    
	 function VerifyEmailDelete($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("delete FROM user_logins WHERE email=?");
        
        /* bind parameters for markers*/
        $stmt->bind_param("s", $data['email']);
        $stmt->execute();
        return 1;
        $stmt->close();
        $dbCon->close();
    }
    
    function verifyEmailSendEmail($data)
    {
        
        $to      = $data['email'];
        $subject = "Telezales - Verify your email";
        
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
                  <div style="font-size:36px;">Activate Account</div>
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
                  <div style="padding-bottom:10px;"> Thank you for signing up with Qmatchup!</div>
                  <div style="padding-bottom:10px;"> You\'re in good company with thousand of other comapnies and associations</div>
                  <div style="padding-bottom:10px;"> Please confirm your registrationto activate your account</div>
                </div></td>
            </tr>
            <tr>
              <td align="left" valign="top" scope="col"><a href="https://www.safeqloud.com/user/index.php/Activation/activateAccount/' . $data['email'] . '/' . $data['random_hash'] . '" style="display:inline-block; padding:20px 35px; font-weight:bold; color:#FFF; background-color:#6ab743; text-decoration:none; border-radius:3px; -webkit-border-radius:3px; ">Confirm Now</a></td>
            </tr>
            <tr>
              <td align="left" valign="top" scope="col"><div style="font-size:14px;">If the button is not working then copy/paste the link in your browser to confirm your registration <br />
                  <a href="#" style="text-decoration:none; color:#3691c0;">https://www.safeqloud.com/user/index.php/Activation/activateAccount/' . $data['email'] . '/' . $data['random_hash'] . ' </a></div></td>
            </tr>
            
            <tr>
              <td align="left" valign="top" scope="col" style="font-size:16px;"><div style="padding-bottom:5px;">Thanks</div>
                <div><b style="color:#6b6f74;">The Qmatchup Team </b></div></td>
            </tr>
          </table></td>
      </tr>
      <tr>
        <td align="center" valign="top"><div style="padding-top:10px; font-size:11px;">This message was sent to <a href="mailto:#" style="text-decoration:none; color:#3691c0;">' . $data['random_hash'] . '</a>. If you dont want to receive these emails from Qmatchup.com in the future, <br />
            please click <a href="#" style="text-decoration:none; color:#3691c0;">unsubscribe</a>. <a style="text-decoration:none; color:#6b6f74;" href="https://www.qmatchup.com">Qmatchup.com</a>,Outsourcing AB, Stureplan 6, 114 35, Stockholm, Sweden.</div></td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>';
        
        sendEmail($subject, $to, $emailContent);
        
    }
}
