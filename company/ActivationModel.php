<?php
	require_once('../AppModel.php');
	class ActivationModel extends AppModel
	{
		
		function activateAccount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,hash_code from companies where company_email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $data['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$myrow  = $result->fetch_assoc();
			
			if ($myrow['hash_code'] == $data['hash']) {
				
				return $myrow['id'];
				
				
				} else {
				
				return 0;
				
			}
			
			$stmt->close();
			$dbCon->close();
		}
		
		function checkVerify($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select email_verification_status from companies where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $data['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$myrow  = $result->fetch_assoc();
			
			if ($myrow['email_verification_status'] == 1) {
				
				return 1;
				
				
				} else {
				
				return 0;
				
			}
			
			$stmt->close();
			$dbCon->close();
		}
		function userCompanyDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from companies where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$myrow  = $result->fetch_assoc();
			$org=array();
			$org['company']=array();
			$org['user']=array();
			$org['company']=$myrow;
			
			$stmt = $dbCon->prepare("select * from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $myrow['user_login_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$myrow  = $result->fetch_assoc();
			$myrow['password']="";
			$org['user']=$myrow;
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function updateAccount($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt   = $dbCon->prepare("update companies set email_verification_status=?, hash_code=? where `company_email`=?");
			$status = 1;
			/* bind parameters for markers */
			$stmt->bind_param("iss", $status, $data['hash'], $data['email']);
			
			$stmt->execute();
			
			
			
			
			if (!$stmt->execute()) {
				return 0;
				} else {
				return 1;
			}
			$stmt->close();
			$dbCon->close();
		}
		
		function executeTransaction($data)
		{
			
			
			$url='https://localhost/remotia/beta/company/index.php/UpdateUserCompany';
			
			$fields = Array('userandcompanydata' => urlencode($data));
			//$fields[]
			$ch = curl_init();
			
			//set the url, number of POST vars, POST data
			curl_setopt($ch,CURLOPT_URL, $url);
			curl_setopt($ch,CURLOPT_POST, count($fields));
			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_REFERER, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, true);
			curl_setopt($ch, CURLOPT_COOKIEFILE, true);
			$result = curl_exec($ch);
			//echo curl_error($ch); 
			//close connection
			curl_close($ch); //die;
			return $result;
		}
		
		function sendActivationEmail($data)
		{
			
			$to = $data['email'];
			
			$email   = $data['email'];
			$subject = "Qmatchup –Your Company email is successfully verified!";
			
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
			<div style="font-size:36px;">Welcome</div>
			<div style="font-size:11px;">' . date("d/m/Y") . '</div>
			</div></td>
			<td scope="col" align="right" width="50%" valign="top" style="padding:25px;"><div style="text-align:right"><img src="https://www.qmatchup.com/Newsletter/images/qmacthup.png" alt="Qmatchup" title="Qmatchup" style="font-size:35px; color:#FFFFFF;" /></div></td>
            </tr>
			</table></td>
			</tr>
			<tr>
			<td style="background-color:#FFFFFF;"><table width="100%" border="0" cellspacing="0" cellpadding="20">
            <tr>
			<td align="left" valign="top" scope="col"><div style="font-size:18px">Dear <b>' . $email . '</b>,</div>
			<div style="font-size:14px; padding-top:20px;">
			<div style="padding-bottom:10px;">You have successfully activated your Company account.  </div>
			<div style="padding-bottom:10px;"> <h3>WHAT IS NEXT?  </h3> </br>
			
			Complete your Company get started guide to unlock company apps and get the most out of your experience using Qmatchup!  </div>
			
			</div></td>
            </tr>
            <tr>
			<td align="left" valign="top" scope="col"><a href="https://www.safeqloud.com/user/index.php/LoginAccount" style="display:inline-block; padding:20px 35px; font-weight:bold; color:#FFF; background-color:#6ab743; text-decoration:none; border-radius:3px; -webkit-border-radius:3px; ">LOG IN NOW </a></td>
            </tr>
            <tr>
			<td align="left" valign="top" scope="col"><div style="font-size:14px;">If the button is not working then copy/paste the link in your browser to log in to your account:   <br />
			<a href="#" style="text-decoration:none; color:#3691c0;">https://www.safeqloud.com/user/index.php/LoginAccount </a></div></td>
            </tr>
            <tr>
			<td align="left" valign="top" scope="col" style="font-size:16px;"><div style="padding-bottom:5px;">Warm regards,</div>
			<div><b style="color:#6b6f74;">The Qmatchup team</b></div></td>
            </tr>
			</table></td>
			</tr>
			<tr>
			<td align="center" valign="top"><div style="padding-top:10px; font-size:11px;">This message was sent to <a href="mailto:#" style="text-decoration:none; color:#3691c0;">' . $email . '</a>. If you dont want to receive these emails from Qmatchup.com in the future, <br />
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
