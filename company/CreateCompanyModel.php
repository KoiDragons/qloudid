<?php
	require_once('../AppModel.php');
	class CreateCompanyModel extends AppModel
	{
		
		
		function createCompanyAccount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("insert into companies(o_type,industry,long_description,short_description,country_id,state_id,city_id,district_id,user_login_id,currency_id,company_name,company_email,website,hash_code,created_date) 
			values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )");
			
			/* bind parameters for markers */
			$stmt->bind_param("isssiiiiiisssss", $data['o_type'], $data['inds'], $data['ld'], $data['sd'], $data['country'], $data['state'], $data['city'],$data['district'], $data['user_id'], $data['curr'], $data['company_name'], $data['company_email'], $data['website'], $data['random_hash'], $data['created_on']);
			
			
			if (!$stmt->execute()) {
				$stmt->close();
				$dbCon->close();
				return 0;
				} else {
				$stmt = $dbCon->prepare("select id from companies where id not in(select company_id from user_company_profile where user_login_id=?) and user_login_id=?");
				
				/* bind parameters for markers*/
				$stmt->bind_param("ii", $data['user_id'], $data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$myrow  = $result->fetch_assoc();
				// print_r($myrow); die;
				$stmt = $dbCon->prepare("insert into user_company_profile(`company_id`,`user_login_id`) values(?, ?)");
				
				$stmt->bind_param("ii", $myrow['id'], $data['user_id']);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("insert into location (company_id,country_id,state_id,city_id,district_id,location,created_on) values (?, ?, ?, ?, ?, ?, ?)");
				
				$stmt->bind_param("iiiiiss", $myrow['id'], $data['country'], $data['state'], $data['city'],$data['district'], $data['location'], $data['created_on']);
				$stmt->execute();
				
				
				
				$locationrow = $stmt->insert_id;
				
				$stmt        = $dbCon->prepare("insert into warehouse(`company_id`,`location_id`,`created_on`) values (?, ?, ?)");
				
				$stmt->bind_param("iis", $myrow['id'], $locationrow, $data['created_on']);
				$stmt->execute();
				$stmt->close();
				
				$stmt = $dbCon->prepare("select first_name,last_name,email,email_verification_code from user_logins where id=?");
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result  = $stmt->get_result();
				$userrow = $result->fetch_assoc();
				
				$stmt       = $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`,`created_by`) values(?, ?, ?, ?, ?, ?, ?, ?)");
				$status_emp = 0;
				$stmt->bind_param("ississii", $myrow['id'], $userrow['first_name'], $userrow['last_name'], $status_emp, $userrow['email_verification_code'], $userrow['email'], $data['user_id'], $data['user_id']);
				$stmt->execute();
				
				$stmt       = $dbCon->prepare("insert into company_permission (`company_id`,`user_login_id`,`purchase`,`alert`,`supplier`,`customer`,`employee`,`proposal`,`project_proposal`,`create_article`,`import_article`) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$status_per = 1;
				$stmt->bind_param("iiiiiiiiiii", $myrow['id'], $data['user_id'], $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per);
				$stmt->execute();
				
				
				$stmt       = $dbCon->prepare("insert into company_verified (company_id,verified,unvarified,is_verified) values (?, ?, ?, ?)");
				$status_ver = 7;
				$stmt->bind_param("iiii", $myrow['id'], $status_emp, $status_ver, $status_emp);
				$stmt->execute();
				if (!$stmt->execute()) {
					$stmt->close();
					$dbCon->close();
					return 0;
					} else {
					$stmt->close();
					$dbCon->close();
					return 1;
				}
				
				
			}
			
			
		}
		
		
		
		
		
		function selectOrganization()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,name  from master_company_types");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org    = array();
			while ($row = $result->fetch_assoc()) {
				
				array_push($org, $row);
			}
			return $org;
			$stmt->close();
			$dbCon->close();
			
		}
		
		function checkVerified($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id from bankid_verified where bank_id=(select ssn from user_profiles where user_logins_id=?)");
			
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
				return 1;
			}
		}
		
		function selectIndustry()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,name from company_categories where is_deleted=0 and is_live = 1");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org    = array();
			while ($row = $result->fetch_assoc()) {
				
				array_push($org, $row);
			}
			return $org;
			$stmt->close();
			$dbCon->close();
			
		}
		
		
		
		
		function selectCountry()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name  from country");
			
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
		
		
		function selectState($cont)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt  = $dbCon->prepare("select id,state_name from state where country_id=? and is_visible=0");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("i", $cont);
			$stmt->execute();
			$resultState = $stmt->get_result();
			$stat        = array();
			while ($row = $resultState->fetch_assoc()) {
				
				array_push($stat, $row);
			}
			
			return $stat;
			$stmt->close();
			$dbCon->close();
			
		}
		
		
		function selectCity($cont)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("SELECT id,city_name FROM cities WHERE state_id= ?");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("i", $cont['sid']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org    = array();
			while ($row = $result->fetch_assoc()) {
				
				array_push($org, $row);
			} 
			return $org;
			$stmt->close();
			$dbCon->close();
			
		}
		
		function selectDistrict($cont)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("SELECT id,district_name FROM district WHERE city_id= ?");
			
			/* bind parameters for markers */
			
			$stmt->bind_param("i", $cont['sid']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org    = array();
			while ($row = $result->fetch_assoc()) {
				
				array_push($org, $row);
			} 
			return $org;
			$stmt->close();
			$dbCon->close();
			
		}
		
		function selectOrganizationWeb($web)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id from companies where company_email like ?");
			
			// print_r($web); die;
			
			$like = '%' . $web['web'];
			
			$stmt->bind_param("s", $like);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if (empty($row))
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			
			else
			{
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			
			
		}
		
		
		
		
		function sendCreateCompanyEmail($data)
		{
			
			$to            = $data['company_email'];
			$company_email = $data['company_email'];
			$subject       = "Qmatchup - Please verify your Organization !";
			
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
			<div style="font-size:36px;">Activate Organization </div>
			<div style="font-size:11px;">' . date("d/m/Y") . '</div>
			</div></td>
			<td scope="col" align="right" width="50%" valign="top" style="padding:25px;"><div style="text-align:right"><img src="https://www.qmatchup.com/Newsletter/images/qmacthup.png" alt="Qmatchup" title="Qmatchup" style="font-size:35px; color:#FFFFFF;" /></div></td>
            </tr>
			</table></td>
			</tr>
			<tr>
			<td style="background-color:#FFFFFF;"><table width="100%" border="0" cellspacing="0" cellpadding="20">
            <tr>
			<td align="left" valign="top" scope="col"><div style="font-size:18px">Dear <b>' . $company_email . '</b>,</div>
			<div style="font-size:14px; padding-top:20px;">
			<div style="padding-bottom:10px;"> Thank you! You have registered a Organization  to Qmatchup! </div>
			<div style="padding-bottom:10px;"> Please confirm your registration to activate the Organization  account. </div>
			
			</div></td>
            </tr>
            <tr>
			<td align="left" valign="top" scope="col"><a href="https://www.qloudid.com/company/index.php/Activation/activateAccount/' . $company_email . '/' . $data['random_hash'] . '" style="display:inline-block; padding:20px 35px; font-weight:bold; color:#FFF; background-color:#6ab743; text-decoration:none; border-radius:3px; -webkit-border-radius:3px; ">Confirm Now</a></td>
            </tr>
            <tr>
			<td align="left" valign="top" scope="col"><div style="font-size:14px;">If the button is not working then copy/paste the link in your browser to confirm your registration <br />
			<a href="#" style="text-decoration:none; color:#3691c0;">https://www.qloudid.com/company/index.php/Activation/activateAccount/' . $company_email . '/' . $data['random_hash'] . ' </a></div></td>
            </tr>
            <tr>
			<td align="left" valign="top" scope="col" style="font-size:16px;"><div style="padding-bottom:5px;">Warm regards,</div>
			<div><b style="color:#6b6f74;">The Qmatchup team</b></div></td>
            </tr>
			</table></td>
			</tr>
			<tr>
			<td align="center" valign="top"><div style="padding-top:10px; font-size:11px;">This message was sent to <a href="mailto:#" style="text-decoration:none; color:#3691c0;">' . $company_email . '</a>. If you dont want to receive these emails from Qmatchup.com in the future, <br />
            please click <a href="#" style="text-decoration:none; color:#3691c0;">unsubscribe</a>. <a style="text-decoration:none; color:#6b6f74;" href="https://www.qloudid.com"></a> Qmatchup Outsourcing AB, Stureplan 6, 114 35, Stockholm, Sweden</div></td>
			</tr>
			</table>
			</div>
			</div>
			</body>
			</html>';
			
			
			sendEmail($subject, $to, $emailContent);
			
		}
		
		
	}		