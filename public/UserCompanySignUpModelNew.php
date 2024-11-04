<?php
	require_once('../AppModel.php');
	class UserCompanySignUpModel extends AppModel
	{
		function selectedMarketplaceDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			
			$stmt = $dbCon->prepare("select * from professional_marketplace where id=?");
			$stmt->bind_param("i",$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		function marketplaceSelectedDomainList($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$marketplace_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select * from professional_marketplace_domain_info where id not in (select marketplace_domain_id from professional_marketplace_selected_domain where marketplace_id=?)");
			$stmt->bind_param("i",$marketplace_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowCategory = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into `qloudid`.`professional_marketplace_selected_domain`(`marketplace_domain_id`,marketplace_id,created_on,modified_on) values (?,?,now(),now())");
			$stmt->bind_param("ii",$rowCategory['id'],$marketplace_id);
			$stmt->execute();
			}
			
			
			$stmt = $dbCon->prepare("select * from professional_marketplace_domain_info where id in (select marketplace_domain_id from professional_marketplace_selected_domain where marketplace_id=? and is_selected=1)");
			$stmt->bind_param("i",$marketplace_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
				if($rowCategory['id']==$data['md_id'])
				{
					$rowCategory['is_selected']=1;
				}
				else
				{
					$rowCategory['is_selected']=0;
				}
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			$key_values = array_column($org, 'is_selected'); 
			array_multisort($key_values, SORT_DESC, $org);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}	
			
		
		
		
		function homeRepairSubcategory($data)
		{
			return $this->encrypt_decrypt('encrypt',$data['property_type_detail']);
		}
	function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from user_logins where id=?");
			 
			/* bind parameters for markers */
			 
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}	
		
		
		function updateUserOnJob($data)
		{
			$dbCon = AppModel::createConnection();
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$stmt = $dbCon->prepare("update user_professional_service_request set user_id=?,carried_for=? where id=?");
			 
			/* bind parameters for markers */
			 
			$stmt->bind_param("iii", $data['user_id'],$data['carried_for'],$job_id);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("update  hotel_roomservice_item_ordered set booking_person_id=?,user_id=? where professional_user_job_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("iii",$data['user_id'],$data['user_id'],$job_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}	
		
	function employerSummary($data)
		{
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select company_name,companies.id,address from companies  left join company_profiles on company_profiles.company_id=companies.id where companies.id in(select company_id from employees where user_login_id=?)");
			 
			/* bind parameters for markers */
			 
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select company_id from cleaning_company_premium_account_request where company_id=? and domain_id=?");
			 
			/* bind parameters for markers */
			 
			$stmt->bind_param("ii", $row['id'],$domain_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();
			if(empty($row1))
			{
				$row['is_registered']=0;
			}
			else
			{
				$row['is_registered']=1;
			}
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
				
				 
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function userCompanySummary($data)
		{
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select company_name,companies.id,address from companies  left join company_profiles on company_profiles.company_id=companies.id where companies.id in(select company_id from employees where user_login_id=?)");
			 
			/* bind parameters for markers */
			 
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select company_id from user_company_signup_marketplaces where company_id=? and domain_id=?");
			 
			/* bind parameters for markers */
			 
			$stmt->bind_param("ii", $row['id'],$domain_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();
			if(empty($row1))
			{
				$row['is_registered']=0;
			}
			else
			{
				$row['is_registered']=1;
			}
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
				
				 
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
			
		
	function loginAppAccount()
    {
		$SECRET_KEY = 'qloud_login:system';
        $dbCon = AppModel::createConnection();
		 $ip=$this->encrypt_decrypt('decrypt',$_POST['ip']);
		
        $stmt = $dbCon->prepare("select login_status,user_id from user_certificates where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
		
		if($row['login_status']!=2)
		{
		$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0,time_out=1 where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
				
		$stmt->close();
        $dbCon->close();
		return 0;		
		}
		else
		{
			
		 
		$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0 where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
		
		 $stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where id = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $row['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowUser    = $result->fetch_assoc();
		$userid = $rowUser['id'];
		$stmt->close();
		$dbCon->close();
		return $userid;
		}
		 }

		
		function verifyIP()
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
			 $stmt = $dbCon->prepare("select login_status from user_certificates where login_started_for=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$row= $result->fetch_assoc();
			
			if($row['login_status']!=2)
			{
				$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0 where login_started_for=?");
				/* bind parameters for markers */
				$stmt->bind_param("s", $ip);
				$stmt->execute();	
			}
			 
				 $t=microtime();
				 
				$dbCon->close();
				return $this->encrypt_decrypt('encrypt',$ip);
			 
		}
		
		 
		function sendSignUpRequest($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			
			$stmt = $dbCon->prepare("select * from user_signup_request where email=?");
			$stmt->bind_param("s", $_POST['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into user_signup_request(email,user_signup_info) values(?,?)");
				
			/* bind parameters for markers */
			$stmt->bind_param("si",$_POST['email'],$_POST['user_signup_type']);
			$stmt->execute();
			$id=$stmt->insert_id;
			}
			else
			{
				$id=$row['id'];
			}
			$data['id']=$this->encrypt_decrypt('encrypt',$id);
			$data['email']=$_POST['email'];
			$this->sendUserSignupVerificationInfo($data);
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		function selectedSubcategoryDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			
			$stmt = $dbCon->prepare("select property_information_required from professional_service_subcategory where id=(select subcategory_id from user_professional_service_request where id=?)");
			$stmt->bind_param("i",$job_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row['property_information_required'];	
		}
		function userSignupMarketplaces($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			
			$stmt = $dbCon->prepare("select * from user_signup_marketplaces where user_id=? and domain_id=?");
			$stmt->bind_param("ii",$data['user_id'], $domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into user_signup_marketplaces(user_id,domain_id) values(?,?)");
				
			/* bind parameters for markers */
			$stmt->bind_param("ii",$data['user_id'], $domain_id);
			$stmt->execute();
			$id=$stmt->insert_id;
			}
			else
			{
				$id=$row['id'];
			}
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		function companySignupMarketplaces($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from user_company_signup_marketplaces where company_id=? and domain_id=?");
			$stmt->bind_param("ii",$company_id, $domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into user_company_signup_marketplaces(company_id,domain_id) values(?,?)");
				
			/* bind parameters for markers */
			$stmt->bind_param("ii",$company_id, $domain_id);
			$stmt->execute();
			$id=$stmt->insert_id;
			}
			else
			{
				$id=$row['id'];
			}
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		
		
		function sendUserSignupVerificationInfo($data)
		{
			
			$to            = $data['email'];
			$subject       = "Sign up verification!";
			$emailContent='<html xmlns="http://www.w3.org/1999/xhtml" style="background-color: rgb(240, 240, 240);" class=""><head>
					  <title>Reservation confirmed</title>
					  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
					  <meta charset="utf-8">
					  <meta name="viewport" content="width=device-width, initial-scale=1">
					  <meta http-equiv="X-UA-Compatible" content="IE=edge">
					  <style type="text/css">
						/* GT AMERICA */

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Regular";
						  font-weight: 400;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.ttf") format("truetype");
						}

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Medium";
						  font-weight: 600;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.ttf") format("truetype");
						}

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Condensed Bold";
						  font-weight: 700;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.ttf") format("truetype");
						}

						/* CLIENT-SPECIFIC RESET */

						body,
						table,
						td,
						a {
						  -webkit-text-size-adjust: 100%;
						  -ms-text-size-adjust: 100%;
						}

						/* Prevent WebKit and Windows mobile changing default text sizes */

						table,
						td {
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						}

						/* Remove spacing between tables in Outlook 2007 and up */

						img {
						  -ms-interpolation-mode: bicubic;
						}

						/* Allow smoother rendering of resized image in Internet Explorer */

						.im {
						  color: inherit !important;
						}

						/* DEVICE-SPECIFIC RESET */

						a[x-apple-data-detectors] {
						  color: inherit !important;
						  text-decoration: none !important;
						  font-size: inherit !important;
						  font-family: inherit !important;
						  font-weight: inherit !important;
						  line-height: inherit !important;
						}

						/* iOS BLUE LINKS */

						/* RESET */

						img {
						  border: 0;
						  height: auto;
						  line-height: 100%;
						  outline: none;
						  text-decoration: none;
						  display: block;
						}

						table {
						  border-collapse: collapse;
						}

						table td {
						  border-collapse: collapse;
						  display: table-cell;
						}

						body {
						  height: 100% !important;
						  margin: 0 !important;
						  padding: 0 !important;
						  width: 100% !important;
						}

						/* BG COLORS */

						.mainTable {
						  background-color: #F0F0F0;
						}

						.mainTable--hospitality {
						  background-color: #f7f2ed;
						}

						html {
						  background-color: #F0F0F0;
						}

						/* VARIABLES */

						.bg-white {
						  background-color: white;
						}

						.hr {
						  /* Cross-client horizontal rule. Adapted from https://litmus.com/community/discussions/4633-is-there-a-reliable-1px-horizontal-rule-method */
						  background-color: #d3d3d8;
						  border-collapse: collapse;
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						  mso-line-height-rule: exactly;
						  line-height: 1px;
						}

						.textAlignLeft {
						  text-align: left !important;
						}

						.textAlignRight {
						  text-align: right !important;
						}

						.textAlignCenter {
						  text-align: center !important;
						}

						.mt1 {
						  margin-top: 6px;
						}

						.list {
						  padding-left: 18px;
						  margin: 0;
						}

						/* TYPOGRAPHY */

						body {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  color: #4f4f65;
						  -webkit-font-smoothing: antialiased;
						  -ms-text-size-adjust: 100%;
						  -moz-osx-font-smoothing: grayscale;
						  font-smoothing: always;
						  text-rendering: optimizeLegibility;
						}

						.h1 {
						  font-family: "GT America Condensed Bold", "Roboto Condensed", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 700;
						  vertical-align: middle;
						  font-size: 36px;
						  line-height: 42px;
						}

						.h2 {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 600;
						  vertical-align: middle;
						  font-size: 16px;
						  line-height: 24px;
						}

						.text {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 16px;
						  line-height: 21px;
						}

						.text-list {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 16px;
						  line-height: 25px;
						}

						.textSmall {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 14px;
						}

						.text-xsmall {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-size: 11px;
						  text-transform: uppercase;
						  line-height: 22px;
						  letter-spacing: 1px;
						}

						.text-bold {
						  font-weight: 600;
						}

						.text-link {
						  text-decoration: underline;
						}

						.text-linkNoUnderline {
						  text-decoration: none;
						}

						.text-strike {
						  text-decoration: line-through;
						}

						/* FONT COLORS */

						.textColorDark {
						  color: #23233e;
						}

						.textColorNormal {
						  color: #4f4f65;
						}

						.textColorBlue {
						  color: #2020c0;
						}

						.textColorGrayDark {
						  color: #7B7B8B;
						}

						.textColorGray {
						  color: #A5A8AD;
						}

						.textColorWhite {
						  color: #FFFFFF;
						}

						.textColorRed {
						  color: #df3232;
						}

						/* BUTTON */

						.Button-primary-wrapper {
						  border-radius: 3px;
						  background-color: #2020C0;
						}

						.Button-primary {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  border-radius: 3px;
						  border: 1px solid #2020C0;
						  color: #ffffff;
						  display: block;
						  font-size: 16px;
						  font-weight: 600;
						  padding: 18px;
						  text-decoration: none;
						}

						.Button-secondary-wrapper {
						  border-radius: 3px;
						  background-color: #ffffff;
						}

						.Button-secondary {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  border-radius: 3px;
						  border: 1px solid #2020C0;
						  color: #2020C0;
						  display: block;
						  font-size: 16px;
						  font-weight: 600;
						  padding: 18px;
						  text-decoration: none;
						}

						/* LAYOUT */

						.Content-container {
						  padding-left: 60px;
						  padding-right: 60px;
						}

						.Content-container--main {
						  padding-top: 54px;
						  padding-bottom: 60px;
						}

						.Content {
						  width: 580px;
						  margin: 0 auto;
						}

						.wrapper {
						  max-width: 600px;
						}

						.section {
						  padding: 24px 0px;
						  border-bottom: 1px solid #d3d3d8;
						}

						.section--noBorder {
						  padding: 24px 0px 0;
						}

						.section--last {
						  padding: 24px 0px;
						}

						.message {
						  background-color: #F4F4F5;
						  padding: 18px;
						}

						.card {
						  border: 1px solid #d3d3d8;
						  padding: 18px;
						}

						/* HEADER */

						.header-tockLogoImage {
						  display: block;
						  color: #F0F0F0;
						}

						.header-heroImage {
						  padding-bottom: 24px;
						}

						/* PREHEADER */

						.preheader {
						  display: none;
						  font-size: 1px;
						  color: #FFFFFF;
						  line-height: 1px;
						  max-height: 0px;
						  max-width: 0px;
						  opacity: 0;
						  overflow: hidden;
						}

						/* BANNER */

						.notice {
						  padding: 12px;
						  background: #23233E;
						  color: #FFFFFF;
						  display: block;
						  font-size: 14px;
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 600;
						}

						/* INTRO */

						.section--intro {
						  padding-bottom: 48px;
						}

						/* BOOKING INFO */

						.business-logo__container {
						  width: 48px;
						  height: 48px;
						  border-radius: 3px;
						  border: 1px solid #d3d3d8;
						  overflow: hidden;
						}

						.business-logo__image {
						  border: 1px solid transparent;
						  border-radius: 3px;
						  width: 48px;
						  height: 48px;
						  display: block;
						}

						.business-address--address {
						  width: 50%;
						}

						.business-address--map {
						  width: 50%;
						}

						.business-address--map-image {
						  width: 100%;
						}

						/* MOBILE TICKETS */

						.mobile-ticket--description {
						  width: 65%;
						  margin-top: 12px;
						  margin-right: 5%;
						}

						.mobile-ticket--code {
						  width: 30%;
						}

						.mobile-ticket--code-image {
						  width: 100%;
						}

						/* RESERVATION ACTIONS */

						.linksTable {
						  border-bottom: 1px solid #d3d3d8;
						}

						.linksTableRow {
						  padding: 24px 12px;
						}

						.actions-icon {
						  vertical-align: middle;
						}

						.actions-text {
						  vertical-align: middle;
						}

						/* RECEIPT */

						.receipt__container {
						  border: 1px solid #d3d3d8;
						  padding: 24px;
						}

						.receipt__row {
						  border-top: 1px solid #d3d3d8;
						}

						/* FEEDBACK ICONS */

						.feedback-link {
						  border: 1px solid #d4d5da;
						  border-radius: 3px;
						  display: inline-block;
						  width: calc(32% - 2px);
						  padding: 10px 0;
						}

						.feedback-link-bumper {
						  display: inline-block;
						  width: 1%;
						}

						.feedback-link img {
						  height: 50px;
						  width: 50px;
						}

						/* SOCIAL ICONS */

						.social-link {
						  display: inline-block;
						  width: auto;
						}

						.social-link-text {
						  padding: 14px 24px 14px 14px;
						}

						/* TABLET STYLES */

						@media screen and (max-width: 648px) {
						  /* DEVICE-SPECIFIC RESET */
						  div[style*="margin: 16px 0;"] {
							margin: 0 !important;
						  }
						  /* ANDROID CENTER FIX */
						  /* LAYOUT */
						  .wrapper {
							width: 100% !important;
							max-width: 100% !important;
						  }
						  .Content {
							width: 90% !important;
						  }
						  .Content-container {
							padding-left: 36px !important;
							padding-right: 36px !important;
						  }
						  .Content-container--main {
							padding-top: 30px !important;
							padding-bottom: 42px !important;
						  }
						  .responsiveTable {
							width: 100% !important;
						  }
						  /* RESERVATION ACTIONS */
						  .linksTableRow {
							padding-left: 0 !important;
							padding-right: 0 !important;
							padding-top: 12px !important;
							padding-bottom: 12px !important;
						  }
						  .linksTableRow--borderRight {
							border-right: none !important;
							padding-left: 0 !important;
							padding-right: 0 !important;
						  }
						  /* FEEDBACK LINK */
						  .feedback-link img {
							height: 38px !important;
							width: 38px !important;
						  }
						}

						/* MOBILE STYLES */

						@media screen and (max-width: 480px) {
						  /* TYPOGRAPHY */
						  .h1 {
							font-size: 30px !important;
							line-height: 30px !important;
						  }
						  .text {
							font-size: 16px !important;
							line-height: 22px !important;
						  }
						  /* BUTTON */
						  .mobile-buttonContainer {
							width: 100% !important;
						  }
						  /* LAYOUT */
						  .Content {
							width: 100% !important;
						  }
						  .Content-container {
							padding-left: 18px !important;
							padding-right: 18px !important;
						  }
						  .Content-container--main {
							padding-top: 24px !important;
							padding-bottom: 30px !important;
						  }
						  .section {
							padding: 18px 0 !important;
						  }
						  .section--last {
							padding: 18px 0 !important;
						  }
						  .header {
							padding: 0 18px !important;
						  }
						  .business-address--address {
							width: 100% !important;
						  }
						  .business-address--map {
							margin-top: 30px !important;
							width: 100% !important;
						  }
						  .mobile-ticket--description {
							width: 100% !important;
							margin-top: 0px !important;
						  }
						  .mobile-ticket--code {
							margin-top: 30px !important;
							margin-left: 0;
							width: 100% !important;
						  }
						  /* RECEIPT */
						  .receipt__container {
							padding: 12px !important;
						  }
						  /* SOCIAL ICONS */
						  .social-link {
							display: block !important;
							width: 100% !important;
							border-bottom: 1px solid #d3d3d8 !important;
						  }
						  /* INTRO */
						  .section--intro {
							padding-top: 18px !important;
							padding-bottom: 18px !important;
						  }
						}
					  </style>
					<style id="__web-inspector-hide-shortcut-style__">
.__web-inspector-hide-shortcut__, .__web-inspector-hide-shortcut__ *, .__web-inspector-hidebefore-shortcut__::before, .__web-inspector-hideafter-shortcut__::after
{
    visibility: hidden !important;
}
</style></head>

					<body style="margin: 0 !important; padding: 0 !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; height: 100%; margin: 0; padding: 0; width: 100%; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; color: rgb(79, 79, 101); -webkit-font-smoothing: antialiased; -ms-text-size-adjust: 100%; -moz-osx-font-smoothing: grayscale; font-smoothing: always; text-rendering: optimizeLegibility;">
					   
					  <!--[if mso]>
						<style type="text/css">
					.h1 {font-family: "Helvetica", "Arial", sans-serif !important; font-weight: 700 !important; vertical-align: middle !important; font-size: 36px !important; mso-line-height-rule: exactly;line-height: 42px !important;}
					.h2 {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 600 !important;vertical-align: middle !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 24px !important;}
					.text {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 21px !important;}
					.text-list {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 25px !important;}
					.textSmall {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 14px !important;}
					.text-xsmall {font-family: "Helvetica", "Arial", sans-serif !important;font-size: 11px !important;text-transform: uppercase !important;mso-line-height-rule: exactly;line-height: 22px !important;letter-spacing: 1px !important;}
					.text-bold {font-weight: 600 !important;}
					.text-link {text-decoration: underline !important;}
					.text-linkNoUnderline {text-decoration: none !important;}
					.text-strike {text-decoration: line-through !important;}
					.textColorDark {color: #23233e !important;}
					.textColorNormal {color: #4f4f65 !important;}
					.textColorBlue {color: #2020c0 !important;}
					.textColorGray {color: #A5A8AD !important;}
					.textColorWhite {color: #FFFFFF !important;}
					.Button-primary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #ffffff !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
					.Button-secondary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #2020C0 !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
						</style>
						<![endif]-->
					  <!-- HIDDEN PREHEADER TEXT -->
					  <div class="preheader" style="display: none; font-size: 1px; color: rgb(255, 255, 255); line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
					  </div>
					  <table border="0" cellpadding="0" cellspacing="0" width="100%" class=" mainTable  " style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: rgb(240, 240, 240);">
						<tbody><tr><td style="display:none !important;
					 visibility:hidden;
					 mso-hide:all;
					 font-size:1px;
					 color:#ffffff;
					 line-height:1px;
					 max-height:0px;
					 max-width:0px;
					 opacity:0;
					 overflow:hidden; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> We are thrilled that you will be joining us. If yo... </td>
						<!-- HEADER -->
						</tr><tr>
						  <td align="center" class="header" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
							<!--[if (gte mso 9)|(IE)]>
						<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
						<tr>
						<td align="center" valign="top" width="600">
						<![endif]-->
							<table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 580px; margin: 0 auto;">
							  <tbody><tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr>
								<td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <h1 style="font-size: 33px;font-weight: 800;line-height: 30px;">Qloud ID</h1>               </td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							</tbody></table>
							<!--[if (gte mso 9)|(IE)]>
						</td>
						</tr>
						</table>
						<![endif]-->
						  </td>
						</tr>
						<!-- CONTENT -->
						<tr>
						  <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
							<!--[if (gte mso 9)|(IE)]>
						<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
						<tr>
						<td align="center" valign="top" width="600">
						<![endif]-->
							<table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content bg-white" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: white; width: 580px; margin: 0 auto;">
							  <tbody><tr>
								<td class="Content-container Content-container--main text textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101); padding-left: 60px; padding-right: 60px; padding-top: 54px; padding-bottom: 60px;">
								  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
									<!-- RESTAURANT INFO -->
									<tbody>
									<!-- INTRO -->
									<tr>
									  <td valign="top" align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">Sign Up request</span>                          </td>
										  </tr>
										  <tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  <tr>
											<td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
											  <!--[if gte mso 15]>&nbsp;<![endif]-->
											</td>
										  </tr>
										  <tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										</tbody></table>
									  </td>
									</tr>
									<!-- MESSAGE -->
									<tr class="spacer">
									  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<tr>
									  <td align="left" class="message" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
										<div class="text textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
										  <span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">Account request</span>
										  <br>This email is sent to you because you have requested to create an account for you. If this was you please click on below email and proceed for sign up process.</div>
									  </td>
									</tr>
									<tr class="spacer">
									  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<tr>
									  <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
										<!--[if gte mso 15]>&nbsp;<![endif]-->
									  </td>
									</tr>
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<!-- BOOKING INFO -->
									<tr>
									  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr>
											<td align="left" valign="middle" width="468" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="text-list textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">
												<span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">'.date("F j, Y, g:i a").'</span>
												
											  </div>
											</td>
										  </tr>
										  
										  
										  

					

					

					




										</tbody></table>
									  </td>
									</tr>
									<!-- ADDRESS -->
									<tr>
									  <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  <tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  <tr>
											<td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
											  <!--[if gte mso 15]>&nbsp;<![endif]-->
											</td>
										  </tr>
										  <tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  
										  
										</tbody></table>
									  </td>
									</tr>
									
									
									
									
										
									<!-- RECEIPT -->
									
									
									
									
									
									
									
									
									<tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
                      
                      
                      



<tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>

<tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody>
<tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="https://qloudid.com/public/index.php/UserCompanySignUp/signUpProfessionalInfo/'.$data['domain_id'].'/'.$data['id'].'" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;">Complete Sign Up</a>                                </td>
                            </tr>
                          </tbody>
</table>
                        </td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
									
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									
									
									<tr>
									  <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
										<!--[if gte mso 15]>&nbsp;<![endif]-->
									  </td>
									</tr>
									
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<tr class="spacer">
									  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									<!-- EDIT RECEIPT -->
									<!-- CANCELLATION POLICY -->
									<tr>
									  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="text text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; font-weight: 600; color: rgb(35, 35, 62);">
												Company policy
											  </div>
											</td>
										  </tr>
										  <tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
												
												<span>You can complete your sign up process only after verifying this email address.</span>
											  </div>
											</td>
										  </tr>
										</tbody></table>
									  </td>
									</tr>
									<tr class="spacer">
									  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
									</tr>
									
									<!-- QUESTIONS -->
									
								  </tbody></table>
								</td>
							  </tr>
							</tbody></table>
						  </td>
						</tr>
						<!-- FOOTER -->
						<tr>
						  <td align="center" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; width: 580px; margin: 0 auto;">
							<!-- Will most likely required a feature flag -->
							<!--[if (gte mso 9)|(IE)]>
					<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
					<tr>
					<td align="center" valign="top" width="600">
					<![endif]-->
							<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="Content-container" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
							  <tbody><tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr>
								<td align="center" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <a href="https://www.exploretock.com" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;"> <img src="https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png" width="30" height="30" alt="Tock" border="0" style="-ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; display: block;"> </a>              </td>
							  </tr>
							  <tr class="spacer">
								<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr>
								<td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
								  <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
									© 2019 Tock, Inc.
								  </div>
								  <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
									All Rights Reserved
								  </div>
								</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							  <tr class="spacer">
								<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
							  </tr>
							</tbody></table>
							<!--[if (gte mso 9)|(IE)]>
					</td>
					</tr>
					</table>
					<![endif]-->
						  </td>
						</tr>
					  </tbody></table><title>Reservation confirmed</title>
					  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
					  <meta charset="utf-8">
					  <meta name="viewport" content="width=device-width, initial-scale=1">
					  <meta http-equiv="X-UA-Compatible" content="IE=edge">
					  <style type="text/css">
						/* GT AMERICA */

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Regular";
						  font-weight: 400;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.ttf") format("truetype");
						}

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Medium";
						  font-weight: 600;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.ttf") format("truetype");
						}

						@font-face {
						  font-display: fallback;
						  font-family: "GT America Condensed Bold";
						  font-weight: 700;
						  src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.ttf") format("truetype");
						}

						/* CLIENT-SPECIFIC RESET */

						body,
						table,
						td,
						a {
						  -webkit-text-size-adjust: 100%;
						  -ms-text-size-adjust: 100%;
						}

						/* Prevent WebKit and Windows mobile changing default text sizes */

						table,
						td {
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						}

						/* Remove spacing between tables in Outlook 2007 and up */

						img {
						  -ms-interpolation-mode: bicubic;
						}

						/* Allow smoother rendering of resized image in Internet Explorer */

						.im {
						  color: inherit !important;
						}

						/* DEVICE-SPECIFIC RESET */

						a[x-apple-data-detectors] {
						  color: inherit !important;
						  text-decoration: none !important;
						  font-size: inherit !important;
						  font-family: inherit !important;
						  font-weight: inherit !important;
						  line-height: inherit !important;
						}

						/* iOS BLUE LINKS */

						/* RESET */

						img {
						  border: 0;
						  height: auto;
						  line-height: 100%;
						  outline: none;
						  text-decoration: none;
						  display: block;
						}

						table {
						  border-collapse: collapse;
						}

						table td {
						  border-collapse: collapse;
						  display: table-cell;
						}

						body {
						  height: 100% !important;
						  margin: 0 !important;
						  padding: 0 !important;
						  width: 100% !important;
						}

						/* BG COLORS */

						.mainTable {
						  background-color: #F0F0F0;
						}

						.mainTable--hospitality {
						  background-color: #f7f2ed;
						}

						html {
						  background-color: #F0F0F0;
						}

						/* VARIABLES */

						.bg-white {
						  background-color: white;
						}

						.hr {
						  /* Cross-client horizontal rule. Adapted from https://litmus.com/community/discussions/4633-is-there-a-reliable-1px-horizontal-rule-method */
						  background-color: #d3d3d8;
						  border-collapse: collapse;
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						  mso-line-height-rule: exactly;
						  line-height: 1px;
						}

						.textAlignLeft {
						  text-align: left !important;
						}

						.textAlignRight {
						  text-align: right !important;
						}

						.textAlignCenter {
						  text-align: center !important;
						}

						.mt1 {
						  margin-top: 6px;
						}

						.list {
						  padding-left: 18px;
						  margin: 0;
						}

						/* TYPOGRAPHY */

						body {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  color: #4f4f65;
						  -webkit-font-smoothing: antialiased;
						  -ms-text-size-adjust: 100%;
						  -moz-osx-font-smoothing: grayscale;
						  font-smoothing: always;
						  text-rendering: optimizeLegibility;
						}

						.h1 {
						  font-family: "GT America Condensed Bold", "Roboto Condensed", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 700;
						  vertical-align: middle;
						  font-size: 36px;
						  line-height: 42px;
						}

						.h2 {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 600;
						  vertical-align: middle;
						  font-size: 16px;
						  line-height: 24px;
						}

						.text {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 16px;
						  line-height: 21px;
						}

						.text-list {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 16px;
						  line-height: 25px;
						}

						.textSmall {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 400;
						  font-size: 14px;
						}

						.text-xsmall {
						  font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-size: 11px;
						  text-transform: uppercase;
						  line-height: 22px;
						  letter-spacing: 1px;
						}

						.text-bold {
						  font-weight: 600;
						}

						.text-link {
						  text-decoration: underline;
						}

						.text-linkNoUnderline {
						  text-decoration: none;
						}

						.text-strike {
						  text-decoration: line-through;
						}

						/* FONT COLORS */

						.textColorDark {
						  color: #23233e;
						}

						.textColorNormal {
						  color: #4f4f65;
						}

						.textColorBlue {
						  color: #2020c0;
						}

						.textColorGrayDark {
						  color: #7B7B8B;
						}

						.textColorGray {
						  color: #A5A8AD;
						}

						.textColorWhite {
						  color: #FFFFFF;
						}

						.textColorRed {
						  color: #df3232;
						}

						/* BUTTON */

						.Button-primary-wrapper {
						  border-radius: 3px;
						  background-color: #2020C0;
						}

						.Button-primary {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  border-radius: 3px;
						  border: 1px solid #2020C0;
						  color: #ffffff;
						  display: block;
						  font-size: 16px;
						  font-weight: 600;
						  padding: 18px;
						  text-decoration: none;
						}

						.Button-secondary-wrapper {
						  border-radius: 3px;
						  background-color: #ffffff;
						}

						.Button-secondary {
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  border-radius: 3px;
						  border: 1px solid #2020C0;
						  color: #2020C0;
						  display: block;
						  font-size: 16px;
						  font-weight: 600;
						  padding: 18px;
						  text-decoration: none;
						}

						/* LAYOUT */

						.Content-container {
						  padding-left: 60px;
						  padding-right: 60px;
						}

						.Content-container--main {
						  padding-top: 54px;
						  padding-bottom: 60px;
						}

						.Content {
						  width: 580px;
						  margin: 0 auto;
						}

						.wrapper {
						  max-width: 600px;
						}

						.section {
						  padding: 24px 0px;
						  border-bottom: 1px solid #d3d3d8;
						}

						.section--noBorder {
						  padding: 24px 0px 0;
						}

						.section--last {
						  padding: 24px 0px;
						}

						.message {
						  background-color: #F4F4F5;
						  padding: 18px;
						}

						.card {
						  border: 1px solid #d3d3d8;
						  padding: 18px;
						}

						/* HEADER */

						.header-tockLogoImage {
						  display: block;
						  color: #F0F0F0;
						}

						.header-heroImage {
						  padding-bottom: 24px;
						}

						/* PREHEADER */

						.preheader {
						  display: none;
						  font-size: 1px;
						  color: #FFFFFF;
						  line-height: 1px;
						  max-height: 0px;
						  max-width: 0px;
						  opacity: 0;
						  overflow: hidden;
						}

						/* BANNER */

						.notice {
						  padding: 12px;
						  background: #23233E;
						  color: #FFFFFF;
						  display: block;
						  font-size: 14px;
						  font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
						  font-weight: 600;
						}

						/* INTRO */

						.section--intro {
						  padding-bottom: 48px;
						}

						/* BOOKING INFO */

						.business-logo__container {
						  width: 48px;
						  height: 48px;
						  border-radius: 3px;
						  border: 1px solid #d3d3d8;
						  overflow: hidden;
						}

						.business-logo__image {
						  border: 1px solid transparent;
						  border-radius: 3px;
						  width: 48px;
						  height: 48px;
						  display: block;
						}

						.business-address--address {
						  width: 50%;
						}

						.business-address--map {
						  width: 50%;
						}

						.business-address--map-image {
						  width: 100%;
						}

						/* MOBILE TICKETS */

						.mobile-ticket--description {
						  width: 65%;
						  margin-top: 12px;
						  margin-right: 5%;
						}

						.mobile-ticket--code {
						  width: 30%;
						}

						.mobile-ticket--code-image {
						  width: 100%;
						}

						/* RESERVATION ACTIONS */

						.linksTable {
						  border-bottom: 1px solid #d3d3d8;
						}

						.linksTableRow {
						  padding: 24px 12px;
						}

						.actions-icon {
						  vertical-align: middle;
						}

						.actions-text {
						  vertical-align: middle;
						}

						/* RECEIPT */

						.receipt__container {
						  border: 1px solid #d3d3d8;
						  padding: 24px;
						}

						.receipt__row {
						  border-top: 1px solid #d3d3d8;
						}

						/* FEEDBACK ICONS */

						.feedback-link {
						  border: 1px solid #d4d5da;
						  border-radius: 3px;
						  display: inline-block;
						  width: calc(32% - 2px);
						  padding: 10px 0;
						}

						.feedback-link-bumper {
						  display: inline-block;
						  width: 1%;
						}

						.feedback-link img {
						  height: 50px;
						  width: 50px;
						}

						/* SOCIAL ICONS */

						.social-link {
						  display: inline-block;
						  width: auto;
						}

						.social-link-text {
						  padding: 14px 24px 14px 14px;
						}

						/* TABLET STYLES */

						@media screen and (max-width: 648px) {
						  /* DEVICE-SPECIFIC RESET */
						  div[style*="margin: 16px 0;"] {
							margin: 0 !important;
						  }
						  /* ANDROID CENTER FIX */
						  /* LAYOUT */
						  .wrapper {
							width: 100% !important;
							max-width: 100% !important;
						  }
						  .Content {
							width: 90% !important;
						  }
						  .Content-container {
							padding-left: 36px !important;
							padding-right: 36px !important;
						  }
						  .Content-container--main {
							padding-top: 30px !important;
							padding-bottom: 42px !important;
						  }
						  .responsiveTable {
							width: 100% !important;
						  }
						  /* RESERVATION ACTIONS */
						  .linksTableRow {
							padding-left: 0 !important;
							padding-right: 0 !important;
							padding-top: 12px !important;
							padding-bottom: 12px !important;
						  }
						  .linksTableRow--borderRight {
							border-right: none !important;
							padding-left: 0 !important;
							padding-right: 0 !important;
						  }
						  /* FEEDBACK LINK */
						  .feedback-link img {
							height: 38px !important;
							width: 38px !important;
						  }
						}

						/* MOBILE STYLES */

						@media screen and (max-width: 480px) {
						  /* TYPOGRAPHY */
						  .h1 {
							font-size: 30px !important;
							line-height: 30px !important;
						  }
						  .text {
							font-size: 16px !important;
							line-height: 22px !important;
						  }
						  /* BUTTON */
						  .mobile-buttonContainer {
							width: 100% !important;
						  }
						  /* LAYOUT */
						  .Content {
							width: 100% !important;
						  }
						  .Content-container {
							padding-left: 18px !important;
							padding-right: 18px !important;
						  }
						  .Content-container--main {
							padding-top: 24px !important;
							padding-bottom: 30px !important;
						  }
						  .section {
							padding: 18px 0 !important;
						  }
						  .section--last {
							padding: 18px 0 !important;
						  }
						  .header {
							padding: 0 18px !important;
						  }
						  .business-address--address {
							width: 100% !important;
						  }
						  .business-address--map {
							margin-top: 30px !important;
							width: 100% !important;
						  }
						  .mobile-ticket--description {
							width: 100% !important;
							margin-top: 0px !important;
						  }
						  .mobile-ticket--code {
							margin-top: 30px !important;
							margin-left: 0;
							width: 100% !important;
						  }
						  /* RECEIPT */
						  .receipt__container {
							padding: 12px !important;
						  }
						  /* SOCIAL ICONS */
						  .social-link {
							display: block !important;
							width: 100% !important;
							border-bottom: 1px solid #d3d3d8 !important;
						  }
						  /* INTRO */
						  .section--intro {
							padding-top: 18px !important;
							padding-bottom: 18px !important;
						  }
						}
					  </style>



					   
					  <!--[if mso]>
						<style type="text/css">
					.h1 {font-family: "Helvetica", "Arial", sans-serif !important; font-weight: 700 !important; vertical-align: middle !important; font-size: 36px !important; mso-line-height-rule: exactly;line-height: 42px !important;}
					.h2 {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 600 !important;vertical-align: middle !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 24px !important;}
					.text {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 21px !important;}
					.text-list {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 25px !important;}
					.textSmall {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 14px !important;}
					.text-xsmall {font-family: "Helvetica", "Arial", sans-serif !important;font-size: 11px !important;text-transform: uppercase !important;mso-line-height-rule: exactly;line-height: 22px !important;letter-spacing: 1px !important;}
					.text-bold {font-weight: 600 !important;}
					.text-link {text-decoration: underline !important;}
					.text-linkNoUnderline {text-decoration: none !important;}
					.text-strike {text-decoration: line-through !important;}
					.textColorDark {color: #23233e !important;}
					.textColorNormal {color: #4f4f65 !important;}
					.textColorBlue {color: #2020c0 !important;}
					.textColorGray {color: #A5A8AD !important;}
					.textColorWhite {color: #FFFFFF !important;}
					.Button-primary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #ffffff !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
					.Button-secondary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #2020C0 !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
						</style>
						<![endif]-->
					  <!-- HIDDEN PREHEADER TEXT -->
					  <div class="preheader" style="display: none; font-size: 1px; color: rgb(255, 255, 255); line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
					  </div>
					  



					</body></html>';
				
 
			try {
			  sendEmail($subject, $to, $emailContent);
			  
			}

			//catch exception
			catch(Exception $e) {
			  $to            = 'kowaken.ghirmai@gmail.com';
			  sendEmail($subject, $to, $emailContent);
			} 
		}
		
		
		
		function emailRequestReceivedInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			$stmt = $dbCon->prepare("select * from user_signup_request where id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		
		
		function selectedMarketplaces($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select * from professional_marketplace where id=?");
			$stmt->bind_param("i", $domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		function updateSelectedArea()
		{
		return	$this->encrypt_decrypt('encrypt',$_POST['varea']);
		}
		function postedJobInfo($data)
		{ 
			$dbCon = AppModel::createConnection();
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$stmt = $dbCon->prepare("select * from user_professional_service_request where id=?");
			$stmt->bind_param("i",$job_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		function getSubcategoryIssue($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from landloard_ticket_subtitle_repair_issue where landloard_ticket_subtitle_id=?");
			$stmt->bind_param("i", $_POST['subcategory_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
				/*$org=$org.'<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20" id="'.$row['id'].'">
														<a href="javascript:void(0);" onclick="updateInclutionType('.$row['id'].')"><input data-testid="test-checkbox-Walls" name="Walls" type="checkbox" class="css-1lgzhz8"></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">'.$row['home_repair_issue'].'</label></div>
															
															</div>';*/
															
				$org=$org.'<label class="checkbox">
<input class="checkbox__input" type="checkbox"  id="'.$row['id'].'"  onclick="updateInclutionType('.$row['id'].')"><span class="checkbox__inner"><span class="checkbox__tick"></span><span class="checkbox__text">'.$row['home_repair_issue'].'</span></span>
</label>';
															
															
															
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		 
	}
		function vitechCityList()
		{ 
		
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from vitech_city");
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0">Select</option>';
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<option value="'.$row['id'].'">'.$row['city_name'].'</option>';
			}
				
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		function vitechCitySelectList()
		{ 
		
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from vitech_city");
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<a class="location__item js-location-item" href="#">'.$row['city_name'].'</a>';
				
			}
				
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		function vitechAreaList()
		{ 
		
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select *  from vitech_area where region_city_id=?");
			$stmt->bind_param("i", $_POST['city_id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			$org='<option value="0">Select</option>';
			while($row= $result3->fetch_assoc())
			{
			$org=$org.'<option value="'.$row['id'].'">'.$row['area_name'].'</option>';
			}
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		function updateSelectedCity()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from vitech_city where city_name=?");
			$stmt->bind_param("s", $_POST['city']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			return	$this->encrypt_decrypt('encrypt',$row['id']);
		}
		
		function selectedCityDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$city_id=$this->encrypt_decrypt('decrypt',$data['city_id']);
			$stmt = $dbCon->prepare("select * from vitech_city where id=?");
			$stmt->bind_param("i", $city_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			return	$row;
		}
		
		function addUserReview($data)
		{ 
			$dbCon = AppModel::createConnection();
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$date=strtotime(date('Y-m-d')); 
			$_POST['review_information']=htmlentities($_POST['review_information'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("update user_professional_service_request set review_done=1,review_star=?,review_description=?,review_date=? where id=?");
			$stmt->bind_param("issi",$_POST['user_rating'],$_POST['review_information'],$date,$job_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updatePriceForService($data)
		{ 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			if($_POST['broadcast_type']==0)
			{
			$_POST['broadcast_type']=2;	
			}
			$stmt = $dbCon->prepare("update user_professional_service_request_company_info set is_service_bookable=?,bookable_calender=?,is_accepted=?,per_hour_fee=?,project_fee=? where job_id=? and company_id=?");
			$stmt->bind_param("iiiiiii",$_POST['is_bookable'],$_POST['bookable_calender'],$_POST['broadcast_type'],$_POST['price_per_hour'],$_POST['project_fee'],$request_id,$company_id);
			$stmt->execute();
			
			if($_POST['broadcast_type']==1)
			{
			$this->sendCompanyBidInfo($data);
			}
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updatePriceForProperty($data)
		{ 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			if($_POST['broadcast_type']==0)
			{
			$_POST['broadcast_type']=2;	
			}
			$stmt = $dbCon->prepare("update user_professional_service_request_company_info set  is_accepted=?  where job_id=? and company_id=?");
			$stmt->bind_param("iii", $_POST['broadcast_type'],$request_id,$company_id);
			$stmt->execute();
			
			if($_POST['broadcast_type']==1)
			{
			$stmt = $dbCon->prepare("select user_logins.email,user_professional_service_request_company_info.id,job_id,subcategory_name,floor_area,user_address.city,is_accepted,company_name from user_professional_service_request_company_info left join user_professional_service_request on user_professional_service_request.id=user_professional_service_request_company_info.job_id left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join user_address on user_address.id=user_professional_service_request.user_property_id left join companies on companies.id=user_professional_service_request_company_info.company_id left join user_logins on user_logins.id=user_professional_service_request.user_id where user_professional_service_request.id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt = $dbCon->prepare("insert into user_professional_service_request_property_bid(property_id, property_price, deposit_fee, cleaning_fee, late_arrival_fee, property_checks_completed,  user_professional_service_request_bid_id, request_id,company_id,created_on) values(?,?,?, ?,?,?,?,?,?,now())");
				
			/* bind parameters for markers */
			$stmt->bind_param("iiiiisiii",$_POST['property_type_detail'],$_POST['property_price'],$_POST['deposit_fee'],$_POST['cleaning_fee'],$_POST['late_arrival_fee'],$_POST['inclusion_type_detail'], $row['id'],$request_id,$company_id);
			$stmt->execute();	
			$this->sendCompanyPropertyBidInfo($data);
			}
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function sendCompanyPropertyBidInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']); 
			$stmt = $dbCon->prepare("select user_logins.email,user_professional_service_request_company_info.id,job_id,subcategory_name,floor_area,user_address.city,is_accepted,company_name from user_professional_service_request_company_info left join user_professional_service_request on user_professional_service_request.id=user_professional_service_request_company_info.job_id left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join user_address on user_address.id=user_professional_service_request.user_property_id left join companies on companies.id=user_professional_service_request_company_info.company_id left join user_logins on user_logins.id=user_professional_service_request.user_id where user_professional_service_request.id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$data['job_id']=$this->encrypt_decrypt('encrypt',$row['job_id']);
			$to            = $row['email'];
			$subject       = "Premium Qualified company bid received!";
			$emailContent='<html>
    <head></head>
    <body>
        <table
            border="0"
            cellpadding="0"
            cellspacing="0"
            width="100%"
            style="
                border-collapse: collapse;
                background-color: rgb(240, 240, 240);
                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                letter-spacing: normal;
                text-indent: 0px;
                text-transform: none;
                word-spacing: 0px;
                text-decoration: none;
            "
        >
            <tbody>
                <tr></tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;">
                                        <h1 style="font-size: 33px; font-weight: 800; line-height: 30px;">
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Qloud ID</font></font>
                                        </h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; background-color: white; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td
                                        style="
                                            border-collapse: collapse;
                                            display: table-cell;
                                            font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                            font-weight: 400;
                                            font-size: 16px;
                                            line-height: 21px;
                                            color: rgb(79, 79, 101);
                                            padding: 54px 60px 60px;
                                        "
                                    >
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" valign="center" width="48" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="width: 48px; height: 48px; border-radius: 3px; border: 1px solid rgb(211, 211, 216); overflow: hidden;"></div>
                                                                    </td>
                                                                    <td width="12" style="border-collapse: collapse; display: table-cell;">&nbsp;</td>
                                                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;">
                                                                        <span
                                                                            style="
                                                                                font-family: GT America Medium, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 600;
                                                                                vertical-align: middle;
                                                                                font-size: 16px;
                                                                                line-height: 24px;
                                                                                color: rgb(35, 35, 62);
                                                                            "
                                                                        >
                                                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$row['subcategory_name'].'</font></font>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" align="left" style="border-collapse: collapse; display: table-cell;">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <span
                                                                            style="
                                                                                font-family: GT America Condensed Bold, Roboto Condensed, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 700;
                                                                                vertical-align: middle;
                                                                                font-size: 36px;
                                                                                line-height: 42px;
                                                                                color: rgb(35, 35, 62);
                                                                            "
                                                                        >
                                                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">You got a proposal</font></font>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        align="left"
                                                                        colspan="2"
                                                                        valign="top"
                                                                        width="100%"
                                                                        height="1"
                                                                        style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"
                                                                    ></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top" style="border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                                                            <span style="font-weight: 600; color: rgb(35, 35, 62);">
                                                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">A perposal from '.$row['company_name'].'</font></font>
                                                            </span>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                    <p></p>
                                                                    We are thrilled to inform you that a contractor has shown an interest and that this contractor also made a proposal.
                                                                    <p></p>
                                                                </font>

                                                                <font style="vertical-align: inherit;">
                                                                    If you click the button below then you will be able to read&nbsp;the&nbsp;proposal.
                                                                </font>
                                                            </font>
                                                            <span>&nbsp;</span><br />
                                                            <font style="vertical-align: inherit;"></font>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" valign="center" width="100%" style="border-collapse: collapse; display: table-cell;">
                                                                        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td
                                                                                        align="center"
                                                                                        valign="center"
                                                                                        width="100%"
                                                                                        style="border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);"
                                                                                    >
                                                                                        <a
                                                                                            href="https://www.qloudid.com/public/index.php/UserProfessionalServiceRequest/receivedPropertybidList/'.$data['request_id'].'"
                                                                                            style="
                                                                                                font-family: GT America Medium, Roboto, Helvetica, Arial, sans-serif;
                                                                                                border-radius: 3px;
                                                                                                border: 1px solid rgb(32, 32, 192);
                                                                                                color: rgb(255, 255, 255);
                                                                                                display: block;
                                                                                                font-size: 16px;
                                                                                                font-weight: 600;
                                                                                                padding: 18px;
                                                                                                text-decoration: none;
                                                                                            "
                                                                                            target="_blank"
                                                                                            data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.dstricts.com%252Fpublic%252Findex.php%252FHotel%252FverifyCheckin%252FK1p5TzIweWpQa1RQSm5wV3QyOUc1Zz09/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/1/3Ug7SAcXST&amp;source=gmail&amp;ust=1684593415394000&amp;usg=AOvVaw16u70RZouwQwLMGFz6hYYB"
                                                                                        >
                                                                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Check proposal</font></font><span>&nbsp;</span>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" valign="center" width="100%" style="border-collapse: collapse; display: table-cell;">
                                                                        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="border-collapse: collapse;"></table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="border-collapse: collapse; display: table-cell;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell; width: 580px; margin: 0px auto;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top" style="border-collapse: collapse; display: table-cell;">
                                        <a
                                            href="https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2"
                                            target="_blank"
                                            data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2&amp;source=gmail&amp;ust=1684593415395000&amp;usg=AOvVaw0lQVcFgYUs07mcaxDkFSvl"
                                        >
                                            <img
                                                src="https://ci6.googleusercontent.com/proxy/d_UyQeDDh58PPnTVAfB57FFPf4BgmGx84bl0DRCqJ5V0oaD3dwZiSbLlYHRWWIVpKYsAR7dCz9LXae65k7i_SxitY6s6nk0uzQqOfC7535Yi4A5xhIVIveRcSvbE7LmQF6Utwl1wepfmTb5VKnXBHG4Tjw=s0-d-e1-ft#https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png"
                                                width="30"
                                                height="30"
                                                alt="Tock"
                                                border="0"
                                                style="border: 0px; height: auto; line-height: 12px; outline: none; text-decoration: none; display: block;"
                                                class="CToWUd"
                                                data-bit="iit"
                                            />
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">© 2019 TOCK, INC.</font></font>
                                        </div>
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ALL RIGHTS RESERVED</font></font>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>';
				
 
			try {
			  sendEmail($subject, $to, $emailContent);
			  
			}

			//catch exception
			catch(Exception $e) {
			  $to            = 'kowaken.ghirmai@gmail.com';
			  sendEmail($subject, $to, $emailContent);
			} 
		}
		
		
		
		function sendCompanyBidInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']); 
			$stmt = $dbCon->prepare("select user_logins.email,user_professional_service_request_company_info.id,job_id,subcategory_name,floor_area,user_address.city,is_accepted,company_name from user_professional_service_request_company_info left join user_professional_service_request on user_professional_service_request.id=user_professional_service_request_company_info.job_id left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join user_address on user_address.id=user_professional_service_request.user_property_id left join companies on companies.id=user_professional_service_request_company_info.company_id left join user_logins on user_logins.id=user_professional_service_request.user_id where user_professional_service_request.id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$data['job_id']=$this->encrypt_decrypt('encrypt',$row['job_id']);
			$to            = $row['email'];
			$subject       = "Premium Qualified company bid received!";
			$emailContent='<html>
    <head></head>
    <body>
        <table
            border="0"
            cellpadding="0"
            cellspacing="0"
            width="100%"
            style="
                border-collapse: collapse;
                background-color: rgb(240, 240, 240);
                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                letter-spacing: normal;
                text-indent: 0px;
                text-transform: none;
                word-spacing: 0px;
                text-decoration: none;
            "
        >
            <tbody>
                <tr></tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;">
                                        <h1 style="font-size: 33px; font-weight: 800; line-height: 30px;">
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Qloud ID</font></font>
                                        </h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; background-color: white; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td
                                        style="
                                            border-collapse: collapse;
                                            display: table-cell;
                                            font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                            font-weight: 400;
                                            font-size: 16px;
                                            line-height: 21px;
                                            color: rgb(79, 79, 101);
                                            padding: 54px 60px 60px;
                                        "
                                    >
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" valign="center" width="48" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="width: 48px; height: 48px; border-radius: 3px; border: 1px solid rgb(211, 211, 216); overflow: hidden;"></div>
                                                                    </td>
                                                                    <td width="12" style="border-collapse: collapse; display: table-cell;">&nbsp;</td>
                                                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;">
                                                                        <span
                                                                            style="
                                                                                font-family: GT America Medium, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 600;
                                                                                vertical-align: middle;
                                                                                font-size: 16px;
                                                                                line-height: 24px;
                                                                                color: rgb(35, 35, 62);
                                                                            "
                                                                        >
                                                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$row['subcategory_name'].'</font></font>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" align="left" style="border-collapse: collapse; display: table-cell;">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <span
                                                                            style="
                                                                                font-family: GT America Condensed Bold, Roboto Condensed, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 700;
                                                                                vertical-align: middle;
                                                                                font-size: 36px;
                                                                                line-height: 42px;
                                                                                color: rgb(35, 35, 62);
                                                                            "
                                                                        >
                                                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">You got a proposal</font></font>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        align="left"
                                                                        colspan="2"
                                                                        valign="top"
                                                                        width="100%"
                                                                        height="1"
                                                                        style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"
                                                                    ></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top" style="border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                                                            <span style="font-weight: 600; color: rgb(35, 35, 62);">
                                                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">A perposal from '.$row['company_name'].'</font></font>
                                                            </span>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                    <p></p>
                                                                    We are thrilled to inform you that a contractor has shown an interest and that this contractor also made a proposal.
                                                                    <p></p>
                                                                </font>

                                                                <font style="vertical-align: inherit;">
                                                                    If you click the button below then you will be able to read&nbsp;the&nbsp;proposal.
                                                                </font>
                                                            </font>
                                                            <span>&nbsp;</span><br />
                                                            <font style="vertical-align: inherit;"></font>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" valign="center" width="100%" style="border-collapse: collapse; display: table-cell;">
                                                                        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td
                                                                                        align="center"
                                                                                        valign="center"
                                                                                        width="100%"
                                                                                        style="border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);"
                                                                                    >
                                                                                        <a
                                                                                            href="https://www.qloudid.com/public/index.php/UserProfessionalServiceRequest/receivedbidList/'.$data['request_id'].'"
                                                                                            style="
                                                                                                font-family: GT America Medium, Roboto, Helvetica, Arial, sans-serif;
                                                                                                border-radius: 3px;
                                                                                                border: 1px solid rgb(32, 32, 192);
                                                                                                color: rgb(255, 255, 255);
                                                                                                display: block;
                                                                                                font-size: 16px;
                                                                                                font-weight: 600;
                                                                                                padding: 18px;
                                                                                                text-decoration: none;
                                                                                            "
                                                                                            target="_blank"
                                                                                            data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.dstricts.com%252Fpublic%252Findex.php%252FHotel%252FverifyCheckin%252FK1p5TzIweWpQa1RQSm5wV3QyOUc1Zz09/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/1/3Ug7SAcXST&amp;source=gmail&amp;ust=1684593415394000&amp;usg=AOvVaw16u70RZouwQwLMGFz6hYYB"
                                                                                        >
                                                                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Check proposal</font></font><span>&nbsp;</span>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" valign="center" width="100%" style="border-collapse: collapse; display: table-cell;">
                                                                        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="border-collapse: collapse;"></table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="border-collapse: collapse; display: table-cell;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell; width: 580px; margin: 0px auto;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top" style="border-collapse: collapse; display: table-cell;">
                                        <a
                                            href="https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2"
                                            target="_blank"
                                            data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2&amp;source=gmail&amp;ust=1684593415395000&amp;usg=AOvVaw0lQVcFgYUs07mcaxDkFSvl"
                                        >
                                            <img
                                                src="https://ci6.googleusercontent.com/proxy/d_UyQeDDh58PPnTVAfB57FFPf4BgmGx84bl0DRCqJ5V0oaD3dwZiSbLlYHRWWIVpKYsAR7dCz9LXae65k7i_SxitY6s6nk0uzQqOfC7535Yi4A5xhIVIveRcSvbE7LmQF6Utwl1wepfmTb5VKnXBHG4Tjw=s0-d-e1-ft#https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png"
                                                width="30"
                                                height="30"
                                                alt="Tock"
                                                border="0"
                                                style="border: 0px; height: auto; line-height: 12px; outline: none; text-decoration: none; display: block;"
                                                class="CToWUd"
                                                data-bit="iit"
                                            />
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">© 2019 TOCK, INC.</font></font>
                                        </div>
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ALL RIGHTS RESERVED</font></font>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>';
				
 
			try {
			  sendEmail($subject, $to, $emailContent);
			  
			}

			//catch exception
			catch(Exception $e) {
			  $to            = 'kowaken.ghirmai@gmail.com';
			  sendEmail($subject, $to, $emailContent);
			} 
		}
		
		function propertyManagerApartmentList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			$stmt = $dbCon->prepare("select * from property_manager_apartment_list where company_id=? and property_type_detail=(select property_type_detail from user_professional_service_request where id=?)");
			$stmt->bind_param("ii",$company_id, $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select count(id)as num from user_professional_service_request_property_bid where company_id=? and request_id=? and property_id=?");
			$stmt->bind_param("iii",$company_id, $request_id,$row['id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();
			if($row1['num']==0)
			{
			$row['proposal_sent']=0;
			$row['disabled']='';
			$row['already_sent']='';			
			}
			else
			{
			$row['proposal_sent']=1;
			$row['disabled']='disabled';
			$row['already_sent']='Proposal sent';			
			}
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
			array_push($org,$row);			
			}
				 
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
		}
		
		function serviceRequestReceivedInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			$stmt = $dbCon->prepare("select user_professional_service_request.subcategory_id,user_professional_service_request_company_info.id,job_id,subcategory_name,floor_area,city,is_accepted from user_professional_service_request_company_info left join user_professional_service_request on user_professional_service_request.id=user_professional_service_request_company_info.job_id left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join user_address on user_address.id=user_professional_service_request.user_property_id where company_id=? and user_professional_service_request.id=? order by user_professional_service_request.created_on desc");
			$stmt->bind_param("ii",$company_id, $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
				if($row['is_accepted']==0)
				{
				$stmt = $dbCon->prepare("select count(id) as num from user_professional_service_request_company_info where job_id=? and company_id!=? and is_accepted=1");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("ii", $row['job_id'],$company_id);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if($row1['num']==5)
				{
				$stmt = $dbCon->prepare("update user_professional_service_request_company_info set is_accepted=3 where id=?");
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$row['is_accepted']=3;
				}					
				}
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		
		function employeeDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email from employees  where company_id=? limit 0,5");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select * from employee_service_booking_rules  where employee_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$resultEmp = $stmt->get_result();
				$rowEmp = $resultEmp->fetch_assoc();
				if(empty($rowEmp))
				{
				$stmt = $dbCon->prepare("insert into employee_service_booking_rules(employee_id,company_id,created_on) values(?,?,now())");
				
				/* bind parameters for markers */
				$stmt->bind_param("ii", $row['id'],$company_id);
				$stmt->execute();	
				}
				
			}
			 
			$stmt = $dbCon->prepare("select min(id) as emp_id,concat_ws(' ',first_name,last_name) as name,email from employees  where company_id=? and user_login_id!=43");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['emp_id']);
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
	    function updateBookingRulesInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			
			$stmt = $dbCon->prepare("update employee_service_booking_rules set `cancellation_policy`=? , `cancellation_policy_period` =? , `delete_of_ongoing_booking` =? , `number_of_future_booking`=? , `book_for_yourself`=?, `earliest_booking` =?, `earliest_booking_period` =? , `booking_occassion` =?, `booking_occassion_period` =?, `booking_over_a_period` =?, `minimum_booking_period_time` =?, `minimum_booking_period_time_period` =?, `future_book` =?, `future_book_period` =?, shared_events_per_day=?, shared_events_fee=?,more_booking_on_request=?, max_booking_on_request=?, extra_fee_booking_on_request=? where employee_id=? and service_type_detail=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiiiiiiiiiiiiiiiiiii",$_POST['cancellation_policy'], $_POST['cancellation_policy_period'],$_POST['delete_of_ongoing_booking'],$_POST['number_of_future_booking'],$_POST['book_for_yourself'],$_POST['earliest_booking'],$_POST['earliest_booking_period'],$_POST['booking_occassion'],$_POST['booking_occassion_period'],$_POST['booking_over_a_period'],$_POST['minimum_booking_period_time'],$_POST['minimum_booking_period_time_period'],$_POST['future_book'],$_POST['future_book_period'],$_POST['shared_events_per_day'],$_POST['shared_events_fee'],$_POST['more_booking_on_request'],$_POST['max_booking_on_request'],$_POST['extra_fee_booking_on_request'],$employee_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		 function bookingRulesInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from employee_service_booking_rules  where employee_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into employee_service_booking_rules(employee_id,company_id,created_on) values(?,?,now())");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $employee_id,$company_id);
			$stmt->execute();	
			}
			
			$stmt = $dbCon->prepare("select * from employee_service_booking_rules  where employee_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function pricingList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$catg_id= $this -> encrypt_decrypt('decrypt',$data['catg_id']);
			$subcatg_id= $this -> encrypt_decrypt('decrypt',$data['subcatg_id']);
			$domain_id= $this -> encrypt_decrypt('decrypt',$data['domain_id']); 
			$stmt = $dbCon->prepare("select id,dish_name,dish_detail,dish_price,is_bookable from professional_company_selected_service_todos_price_info where company_id=? and professional_subcategory_id=? and list_on_pickapro=1 and domain_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$subcatg_id,$domain_id);
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
		
		function homeRepairProblemCategoryDetail()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select id,ticket_title from `qloudid`.`landloard_ticket_title_new`");
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$i=1;
			while($row1 = $result->fetch_assoc())
			{
				 $row1['enc']=$this->encrypt_decrypt('encrypt',$row1['id']);
				array_push($org,$row1);			
				 
			}	
			
			 
			$stmt->close();
			$dbCon->close();
			return $org;			
		}
		
		function homeRepairProblemSubCategoryDetail($data)
		{ 
			$dbCon = AppModel::createConnection();
			$subcateg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$stmt = $dbCon->prepare("select * from landloard_property_problem_tickets_subpart where landloard_ticket_title_id=?");
			$stmt->bind_param("i", $subcateg_id);
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
		
		function selectedProblemSubpartId($data)
		{ 
			$dbCon = AppModel::createConnection();
			$subcateg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			if($subcateg_id==1 || $subcateg_id==6)
			{
				$stmt = $dbCon->prepare("select * from landloard_property_problem_tickets_subpart where id=? ");
				$stmt->bind_param("i", $data['problem_subpart_id']);
			}
			else
			{
				$stmt = $dbCon->prepare("select * from landloard_property_problem_tickets_subpart where landloard_ticket_title_id=?");
				$stmt->bind_param("i", $subcateg_id);
			}
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		function selectedCategoryProblemsInfo($data)
		{ 
			$dbCon = AppModel::createConnection();
			$subcateg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			if($subcateg_id<9)
			{
			$stmt = $dbCon->prepare("select * from landloard_ticket_subtitle_new where id<39");	
			}
			else
			{
			$stmt = $dbCon->prepare("select * from landloard_ticket_subtitle_new where id>38");	
			}
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
		
		function displayYesNo($data)
		{
			if($data==1)
				return 'Yes';
			else if($data==0)
			{
				return 'No';
			}
			else if($data==2)
			{
				return 'Dont know';
			}
			else
			{
			return 'I am not sure';	
			}
		}
		function suportedLanguagesList($data)
		{ 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_suported_languages where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select *  from language_list");
			$stmt->execute();
			$result3 = $stmt->get_result();	
			while($rowAmenities= $result3->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into professional_company_suported_languages (domain_id,language_id,company_id, created_on, modified_on) values (?,?,?, now(), now())");
			$stmt->bind_param("iii",$domain_id,$rowAmenities['id'],$company_id);
			$stmt->execute();
			 				
			}
			}
			
			
			$stmt = $dbCon->prepare("select professional_company_suported_languages.id,language_name,is_selected from professional_company_suported_languages left join language_list on language_list.id=professional_company_suported_languages.language_id where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
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
		
	function updateLanguageAvailable($data)
    {
        $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select * from professional_company_suported_languages  where id=?");
        /* bind parameters for markers */
		$stmt->bind_param("i", $_POST['language_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		if($row['is_selected']==0)
		{
			$is_selected=1;
		}
		else
		{
			$is_selected=0;
		}
		$stmt = $dbCon->prepare("update professional_company_suported_languages  set is_selected=? where id=?");
        /* bind parameters for markers */
		$stmt->bind_param("ii", $is_selected,$_POST['language_id']);
        $stmt->execute();
		$stmt->close();
        $dbCon->close();
		return 1;
    }
	
		function postJobRequirementInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$data=array();
			$data1 = strip_tags($_POST['image-data1']);
			if($data1!='none')
			{
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			}
			else 
			{
				$img_name1="";
			}
			$_POST['domain_id']=$domain_id;
			$data['user_id']=$this->createUser($_POST);
			 $stmt = $dbCon->prepare("select * from user_professional_job_requirement where user_id =? and domain_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['user_id'],$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			 
			
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into `user_professional_job_requirement`(domain_id,vitech_city_location,vitech_area_location,image_path, experience_available, total_experience, your_age, service_categories,  `language_speak`  , `hours_per_week` , `price_per_hour` , `have_autonomo`  , `have_car`  , `have_driving_license`  , `user_id` , `created_on`, `pcountry` , `p_number`  ) VALUES (?, ?, ?,   ?, ?,?, ?, ?, ?, ?,   ?, ?,?, ?, ?, now(),?,?)");
			$stmt->bind_param("iiisiiissiiiiiiis",$domain_id, $_POST['vcity'], $_POST['varea'],$img_name1, $_POST['experience_info_detail'], $_POST['total_exp'], $_POST['total_age'], $_POST['category_detail'], $_POST['inclusion_type_detail'], $_POST['hours_per_week'],$_POST['price_per_hour'],$_POST['furniture_info_detail'],$_POST['material_info_detail'],$_POST['price_info'],$data['user_id'],$_POST['pcountry'],$_POST['p_number']);
			$stmt->execute();	
			}
			else 
			{
			$stmt = $dbCon->prepare("update `user_professional_job_requirement` set  vitech_city_location=?,vitech_area_location=?,image_path=?, experience_available=?, total_experience=?, your_age=?, service_categories=?,`language_speak`  =?, `hours_per_week` =?, `price_per_hour` =?, `have_autonomo`  =?, `have_car`  =?, `have_driving_license`  =?, `user_id` =?, `pcountry` =?, `p_number` =? where id=?");
			$stmt->bind_param("iisiiissiiiiiiisi",$_POST['vcity'], $_POST['varea'],$img_name1, $_POST['experience_info_detail'], $_POST['total_exp'], $_POST['total_age'], $_POST['category_detail'], $_POST['inclusion_type_detail'], $_POST['hours_per_week'],$_POST['price_per_hour'],$_POST['furniture_info_detail'],$_POST['material_info_detail'],$_POST['price_info'],$data['user_id'],$_POST['pcountry'],$_POST['p_number'],$row['id']);
			$stmt->execute();
			}
			
			$stmt = $dbCon->prepare("select * from language_list where find_in_set(id,?)");
			$stmt->bind_param("s", $_POST['inclusion_type_detail']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$inclusion='';
			while($rowInclusion = $result1->fetch_assoc())
			{
				$inclusion=$inclusion.$rowInclusion['language_name'].', ';
			}
			$inclusion=substr($inclusion,0,-2);
			$stmt = $dbCon->prepare("select country_code from phone_country_code where id=?");
			$stmt->bind_param("i", $_POST['pcountry']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$rowInclusion = $result1->fetch_assoc();
			$to            = 'kowaken.ghirmai@gmail.com';
			$subject       = "Premium Qualified Job requirement received!";
			$emailContent='<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
				<body>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="
                border-collapse: collapse;
                background-color: rgb(240, 240, 240);
                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                letter-spacing: normal;
                text-indent: 0px;
                text-transform: none;
                word-spacing: 0px;
                text-decoration: none;
            ">
            <tbody>
                <tr></tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;"><h1 style="font-size: 33px; font-weight: 800; line-height: 30px;">Pickapro</h1></td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; background-color: white; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td style="
                                            border-collapse: collapse;
                                            display: table-cell;
                                            font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                            font-weight: 400;
                                            font-size: 16px;
                                            line-height: 21px;
                                            color: rgb(79, 79, 101);
                                            padding: 54px 60px 60px;
                                        ">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                
                                                                
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" align="left" style="border-collapse: collapse; display: table-cell;">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <span style="
                                                                                font-family: GT America Condensed Bold, Roboto Condensed, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 700;
                                                                                vertical-align: middle;
                                                                                font-size: 36px;
                                                                                line-height: 42px;
                                                                                color: rgb(35, 35, 62);
                                                                            ">Job requirement</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="border-collapse: collapse; display: table-cell; border: 1px solid rgb(211, 211, 216); padding: 24px;">
                                                                         <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Languages user speak</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$inclusion.'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">How many hours per week can you work</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$_POST['hours_per_week'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">How much do you desire per hour?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$_POST['price_per_hour'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 


 
 
 


 
 
 


 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
																		
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Do you have autonomo?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$this->displayYesNo($_POST['furniture_info_detail']).'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Do have a car?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$this->displayYesNo($_POST['material_info_detail']).'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Do you have driving license?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$this->displayYesNo($_POST['price_info']).'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Job seaker email</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$_POST['email'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table><table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>



<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Job seaker contact number</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">+'.$rowInclusion['country_code'].' '.$_POST['p_number'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                
                                                                                
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 600; font-size: 16px; line-height: 21px; color: rgb(35, 35, 62);">
                                                                            Cancellation policy
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="
                                                                                margin-top: 6px;
                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 400;
                                                                                font-size: 16px;
                                                                                line-height: 21px;
                                                                                color: rgb(79, 79, 101);
                                                                            ">
                                                                            <span>Your reservation can be canceled for a full refund 24 hours prior to the reservation time.<span>&nbsp;</span></span>
                                                                            <span>You can always transfer your reservation to another person.</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 600; font-size: 16px; line-height: 21px; color: rgb(35, 35, 62);">
                                                                            Questions?
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="
                                                                                margin-top: 6px;
                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 400;
                                                                                font-size: 16px;
                                                                                line-height: 21px;
                                                                                color: rgb(79, 79, 101);
                                                                            ">
                                                                            If you have questions about your reservation, contact us at&nbsp;<span>&nbsp;</span><a></a>or by calling<span>&nbsp;</span>
                                                                            <a href="tel:+=" target="_blank">+201 34534534</a>.
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
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell; width: 580px; margin: 0px auto;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top" style="border-collapse: collapse; display: table-cell;">
                                        <a href="https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2&amp;source=gmail&amp;ust=1684593415395000&amp;usg=AOvVaw0lQVcFgYUs07mcaxDkFSvl">
                                            <img src="https://ci6.googleusercontent.com/proxy/d_UyQeDDh58PPnTVAfB57FFPf4BgmGx84bl0DRCqJ5V0oaD3dwZiSbLlYHRWWIVpKYsAR7dCz9LXae65k7i_SxitY6s6nk0uzQqOfC7535Yi4A5xhIVIveRcSvbE7LmQF6Utwl1wepfmTb5VKnXBHG4Tjw=s0-d-e1-ft#https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png" width="30" height="30" alt="Tock" border="0" style="border: 0px; height: auto; line-height: 12px; outline: none; text-decoration: none; display: block;" class="CToWUd" data-bit="iit">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            © 2019 TOCK, INC.
                                        </div>
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            ALL RIGHTS RESERVED
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    

</body></html>';
			 
			sendEmail($subject, $to, $emailContent);
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
	function addProfessionalProperty($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			$stmt = $dbCon->prepare("select user_logins.id,first_name,last_name,ssn,country_of_residence,email,sex,dob_day,dob_month,dob_year,country_phone,phone_number, address,user_profiles.city,user_profiles.country,user_profiles.zipcode,grading_status from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where user_logins.id= (select user_id from user_professional_service_request where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$data['user_id']=$row['id'];
			if($_POST['same_name']==1)
			{
			$full_name=$row['first_name'].' '.$row['last_name'];	
			}
			else
			{
			$full_name=	htmlentities($_POST['flname'],ENT_NOQUOTES, 'ISO-8859-1');
			}
			$_POST['same_invoice']=1;
			if($_POST['same_invoice']==1)
			{
			$_POST['iaddress']=$_POST['addrs'];	
			$_POST['i_port_number']=$_POST['pnumber'];	
			$_POST['izip']=$_POST['dzip'];
			$_POST['icity']=$_POST['dcity'];
			}
			$st=0;
			$_POST['addrs']=htmlentities($_POST['addrs'],ENT_NOQUOTES, 'ISO-8859-1');
			$_POST['iaddress']=htmlentities($_POST['iaddress'],ENT_NOQUOTES, 'ISO-8859-1');
			
			$stmt = $dbCon->prepare("select count(id) as num from user_address where user_id = ?");
				
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
				$st=1;
				$added_on_place=2;
			$stmt = $dbCon->prepare("insert into  user_address (property_type, `user_id`, `address`  , `city`  , `zipcode` , `port_number` , `invoice_address`  , `invoice_city`  , `invoice_zipcode`  , `invoice_port_number`  , `is_name_same`  , `is_invoice_same`  , `name_on_house`   , `created_on`,entry_code,floors_available,added_on_place) values (?, ? , ?, ?, ?, ? , ?, ?, ?, ? , ?, ?, ?, now(), ?, ?,?)");
			/* bind parameters for markers */
			$stmt->bind_param("iissssssssiissii",$_POST['property_type_detail'],$data['user_id'],$_POST['addrs'],$_POST['dcity'], htmlentities($_POST['dzip'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['pnumber'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['iaddress'],$_POST['icity'],htmlentities($_POST['izip'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['i_port_number'],$_POST['same_invoice'],$_POST['same_name'],$full_name,$_POST['entry_code'],$_POST['total_floors'],$added_on_place);
			$stmt->execute();
			
			$id=$stmt->insert_id;
			
			$stmt = $dbCon->prepare("update user_profiles set name_on_door=?, entry_code=?, full_address=?, port_number=?, address=?, city=?, zipcode=?,invoice_address=?,invoice_zipcode=?,invoice_city=?,invoice_port=?,is_invoice_same=?,is_name_on_house_same=?, is_id_active=1  where user_logins_id=?");
				/* bind parameters for markers */
			$stmt->bind_param("sssssssssssiii",$full_name,$_POST['entry_code'], $_POST['addrs'],$_POST['pnumber'], $_POST['addrs'],htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['dzip'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['iaddress'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['izip'],htmlentities($_POST['icity'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['i_port_number'],$_POST['same_invoice'],$_POST['same_name'],$data['user_id']);
			}
			else
			{
			$added_on_place=2;
			$stmt = $dbCon->prepare("insert into  user_address (property_type, `user_id`, `address`  , `city`  , `zipcode` , `port_number` , `invoice_address`  , `invoice_city`  , `invoice_zipcode`  , `invoice_port_number`  , `is_name_same`  , `is_invoice_same`  , `name_on_house`   , `created_on`,entry_code,floors_available,added_on_place ) values (?, ? , ?, ?, ?, ? , ?, ?, ?, ? , ?, ?, ?, now(), ?,?,?)");
			/* bind parameters for markers */
			$stmt->bind_param("iissssssssiissii",$_POST['property_type_detail'],$data['user_id'],$_POST['addrs'],$_POST['dcity'], htmlentities($_POST['dzip'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['pnumber'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['iaddress'],$_POST['icity'],htmlentities($_POST['izip'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['i_port_number'],$_POST['same_invoice'],$_POST['same_name'],$full_name,$_POST['entry_code'],$_POST['total_floors'],$added_on_place);
			$stmt->execute();
			
			$id=$stmt->insert_id;
			}
			
			for($i=0;$i<$_POST['total_bathrooms'];$i++)
			{
			$stmt = $dbCon->prepare("insert into user_apartment_bathroom_detail (user_address_id, created_on, modified_on) values (?,now(), now())");
			$stmt->bind_param("i", $id);
			$stmt->execute();		
			}
			
			
			for($i=0;$i<$_POST['total_bedrooms'];$i++)
			{
			$stmt = $dbCon->prepare("insert into user_apartment_bedrooms (user_address_id, created_on) values (?,now())");
			$stmt->bind_param("i",$id);
			$stmt->execute();	
			$id1=$stmt->insert_id;
			$bed='Single';
			$stmt = $dbCon->prepare("insert into user_apartment_bedrooms_beds (bedroom_id,bed_info, created_on,modified_on) values (?,?,now(),now())");
			$stmt->bind_param("is", $id1,$bed);
			$stmt->execute();
			}
			  $stmt = $dbCon->prepare("update user_professional_service_request set property_type_detail=?,user_property_id=? where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("iii",$_POST['property_type_detail'],$id, $request_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updatePropertyDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			$stmt = $dbCon->prepare("update user_professional_service_request set user_property_id=? where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii",$_POST['b_id'], $request_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			 return 1;
		 }
	function getSelectedProperty($data)
    {
        $dbCon = AppModel::createConnection();
       
		$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
          $stmt = $dbCon->prepare("select * from user_address where user_id = (select user_id from user_professional_service_request where id=?)");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i",$request_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		while($row = $result->fetch_assoc())
		{
			if($row['id']==$_POST['id'])
			{
			$org=$org.'<a href="javascript:void(0);" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h green_bg brdr black_txt connect" onclick="updatebuilding(this,'.$row['id'].');"><div class="mart40 fsz18">'.$row['address'].'</div></a>';
			}
			else
			{
			$org=$org.'<a href="javascript:void(0);" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h lgtgrey_bg brdr black_txt connect" onclick="updatebuilding(this,'.$row['id'].');"><div class="mart40 fsz18">'.$row['address'].'</div></a>';
			}
		}
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	
	
	function userProperty($data)
    {
        $dbCon = AppModel::createConnection();
       
		$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
	 
        $stmt = $dbCon->prepare("select * from user_address where user_id = (select user_id from user_professional_service_request where id=?)");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i", $request_id);
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
	function userSignupRequestProperty($data)
    {
        $dbCon = AppModel::createConnection();
       
		$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
        $stmt = $dbCon->prepare("select user_property_id from user_professional_service_request where id=?");
        /* bind parameters for markers */
		$cont=1;
		$stmt->bind_param("i", $request_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		 return $row;
        
        
    }
		function createUser($data)
		{
			$dbCon = AppModel::createConnection();
			
			if(isset($data['came_from']))
			{
				$came_from=$data['came_from'];
			}
			else
			{
				$came_from=8;
			}
			
			$stmt = $dbCon->prepare("select id from user_logins where email=?");
			/* bind parameters for markers */
			$stmt->bind_param("s", $data['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$rf=0;	
			$st=1; 
			$added_on_place=2;
			$data['random_hash'] = substr(md5(uniqid(rand(), true)), 16, 16);
			$stmt = $dbCon->prepare("INSERT INTO user_logins (first_name,last_name,registered_from,get_started_wizard_status,email,  email_verification_code , created_on , modified_on, country_of_residence,verification_status,added_on_place,user_came_from,domain_id) VALUES (?, ?, ?, ?,   ?, ?, now(), now(), ?, ?,?,?,?)");
			$stmt->bind_param("ssiissiiiii", $data['first_name'], $data['last_name'],$st,$st,$data['email'], $data['random_hash'], $data['pcountry'],$rf,$added_on_place,$came_from,$_POST['domain_id']);
			$stmt->execute();
			$data['user_id']=$stmt->insert_id;
			}
			else
			{
				$data['user_id']=$row['id'];
			}
			$stmt->close();
			$dbCon->close();
			return $data['user_id'];
			
		}
	
		function addCommonProfessionalServiceRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$whom_id=$this->encrypt_decrypt('decrypt',$data['whom_id']);
			$subcatg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$data['user_id']=0;
			$_POST['property_type_detail']=1;
			$_POST['product_information']='';
			$_POST['carried_for']=1;
			$_POST['begin_info']=1;
			$_POST['pcountry']='';
			$_POST['p_number']='';
			$_POST['conatct_preffered_on']=1;
			$stmt = $dbCon->prepare("insert into `user_professional_service_request`(domain_id, whom_you_want_served,`category_id` , `subcategory_id` , `property_type_detail` ,`product_information`, `carried_for` , `begin_info` , `user_id` , `pcountry` , `p_number` , `conatct_preffered_on` , `created_on`) VALUES (?, ?,?,   ?, ?,?, ?, ?, ?,   ?, ?,?, now())");
			$stmt->bind_param("iiiiisiiiisi",$domain_id,$whom_id, $catg_id,$subcatg_id,$_POST['property_type_detail'],$_POST['product_information'],$_POST['carried_for'],$_POST['begin_info'],$data['user_id'],$_POST['pcountry'],$_POST['p_number'],$_POST['conatct_preffered_on']);
			$stmt->execute();
			$id=$stmt->insert_id;
			 
			$data['cid']=$this->encrypt_decrypt('encrypt',$id);
			 
			$stmt->close();
			$dbCon->close();
			return $data['cid'];
			
		}
	
	
		function addProfessionalServiceRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$subcatg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$area_id=$this->encrypt_decrypt('decrypt',$data['area_id']);
			
			$stmt = $dbCon->prepare("select * from vitech_area where id=?");
			$stmt->bind_param("i",$area_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCity = $result->fetch_assoc();
			$data['user_id']=0;
			//$data['user_id']=$this->createUser($_POST);
			 
			$start=strtotime($_POST['start_date']);
			$end=strtotime($_POST['end_date']);
			$stmt = $dbCon->prepare("insert into `user_professional_service_request`(vtech_city,vitech_area,domain_id, `category_id` , `subcategory_id` , `start_date` , `end_date` , `property_type_detail` , `floor_area` , `total_rooms` , `total_bathrooms` , `inclusion_type_detail` , `material_info_detail` , `furniture_info_detail` , `price_info` , `product_information`, `carried_for` , `begin_info` , `user_id` , `pcountry` , `p_number` , `conatct_preffered_on` , `created_on`) VALUES (?,?,?,?, ?, ?, ?,   ?, ?,?, ?, ?, ?,   ?, ?,?, ?, ?, ?,   ?, ?,?, now())");
			$stmt->bind_param("iiiiissidiisiiisiiiisi",$area_id,$area_id,$domain_id, $catg_id,$subcatg_id,$start,$end,$_POST['property_type_detail'], $_POST['floor_area'],$_POST['total_rooms'], $_POST['total_bathrooms'], $_POST['inclusion_type_detail'],$_POST['material_info_detail'],$_POST['furniture_info_detail'],$_POST['price_info'],$_POST['product_information'],$_POST['carried_for'],$_POST['begin_info'],$data['user_id'],$_POST['pcountry'],$_POST['p_number'],$_POST['conatct_preffered_on']);
			$stmt->execute();
			$id=$stmt->insert_id;
			$data['cid']=$this->encrypt_decrypt('encrypt',$id);
			//$this->sendPropertyLink($data);
			
			$stmt->close();
			$dbCon->close();
			return $data['cid'];
			
		}
	
		function addProfessionalServiceHomeCleaningRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$whom_id=$this->encrypt_decrypt('decrypt',$data['whom_id']);
			$subcatg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			
			$area_id=$this->encrypt_decrypt('decrypt',$data['area_id']);
			
			$stmt = $dbCon->prepare("select * from vitech_area where id=?");
			$stmt->bind_param("i",$area_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCity = $result->fetch_assoc();
			
			$data['user_id']=0;
			if($_POST['cleaning_type']==2)
			{
				$_POST['cleaning_type_intensity']=0;
			}
			$stmt = $dbCon->prepare("insert into `user_professional_service_request`(vtech_city,vitech_area,domain_id, `category_id` , `subcategory_id` , `cleaning_type` , `how_often` , `property_type_detail` , `floor_area` ,  `inclusion_type_detail` , `material_info_detail` , `pets_available` , `price_info` , `product_information`, `carried_for` , `begin_info` , `user_id` , `pcountry` , `p_number` , `conatct_preffered_on` , `created_on`,additional_services) VALUES (?,?,?, ?, ?,   ?, ?,?, ?, ?, ?,   ?, ?,?, ?, ?, ?,   ?, ?,?, now(),?)");
			$stmt->bind_param("iiiiiiiidsiiisiiiisis",$rowCity['region_city_id'],$area_id,$domain_id, $catg_id,$subcatg_id,$_POST['cleaning_type'],$_POST['cleaning_type_intensity'],$_POST['property_type_detail'], $_POST['floor_area'], $_POST['inclusion_type_detail'],$_POST['material_info_detail'],$_POST['furniture_info_detail'],$_POST['price_info'],$_POST['product_information'],$_POST['carried_for'],$_POST['begin_info'],$data['user_id'],$_POST['pcountry'],$_POST['p_number'],$_POST['conatct_preffered_on'],$_POST['additional_service_type_detail']);
			$stmt->execute();
			$id=$stmt->insert_id;
			$data['cid']=$this->encrypt_decrypt('encrypt',$id);
			//$this->sendPropertyLink($data);
			$stmt->close();
			$dbCon->close();
			return $data['cid'];
			
		}
		
		
		
		
		function addProfessionalHomeRepairRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$subcatg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$area_id=$this->encrypt_decrypt('decrypt',$data['area_id']);
			
			$stmt = $dbCon->prepare("select * from vitech_area where id=?");
			$stmt->bind_param("i",$area_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCity = $result->fetch_assoc();
			
			$data['user_id']=0;
			
			$stmt = $dbCon->prepare("select id from professional_service_subcategory where landloard_ticket_subtitle_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['property_type_detail']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("insert into `user_professional_service_request`(vtech_city,vitech_area,domain_id, inclusion_type_detail,`category_id` , `subcategory_id` ,  `price_info` , `product_information`, `carried_for` , `begin_info` , `user_id` , `pcountry` , `p_number` , `conatct_preffered_on` , `created_on`,landloard_ticket_id,problem_subpart_id) VALUES (?,?,?, ?, ?, ?,   ?, ?,?, ?, ?, ?,   ?, ?, now(),?,?)");
			$stmt->bind_param("iiisiiisiiiissii",$rowCity['region_city_id'],$area_id,$domain_id,$_POST['inclusion_type_detail'], $catg_id,$row['id'],$_POST['price_info'],$_POST['product_information'],$_POST['carried_for'],$_POST['begin_info'],$data['user_id'],$_POST['pcountry'],$_POST['p_number'],$_POST['conatct_preffered_on'],$_POST['property_type_detail'],$_POST['problem_subpart_id']);
			$stmt->execute();
			$id=$stmt->insert_id;
			$data['cid']=$this->encrypt_decrypt('encrypt',$id);
			//$this->sendPropertyLink($data);
			$stmt->close();
			$dbCon->close();
			return $data['cid'];
			
		}
	
	
		function addProfessionalServiceWindowCleaningRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$whom_id=$this->encrypt_decrypt('decrypt',$data['whom_id']);
			$subcatg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$area_id=$this->encrypt_decrypt('decrypt',$data['area_id']);
			
			$stmt = $dbCon->prepare("select * from vitech_area where id=?");
			$stmt->bind_param("i",$area_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCity = $result->fetch_assoc();
			
			$data['user_id']=0;
			$stmt = $dbCon->prepare("insert into `user_professional_service_request`(vtech_city,vitech_area,domain_id, `category_id` , `subcategory_id` , `type_of_window` , `total_window` , `property_type_detail` , `pages_info_detail` , `frame_info_detail` , `exposure_info_detail` , `reachable_info_detail`, `price_info` , `product_information`, `carried_for` , `begin_info` , `user_id` , `pcountry` , `p_number` , `conatct_preffered_on` , `created_on`) VALUES (?,?,?,?, ?, ?, ?,   ?, ?,?, ?, ?, ?,   ?, ?,?, ?, ?, ?,   ?, now())");
			$stmt->bind_param("iiiiiiiiiiiiisiiiisi",$rowCity['region_city_id'],$area_id,$domain_id, $catg_id,$subcatg_id,$_POST['furniture_info_detail'],$_POST['total_window'],$_POST['property_type_detail'], $_POST['pages_info_detail'],$_POST['material_info_detail'], $_POST['exposure_info_detail'], $_POST['reachable_info_detail'],$_POST['price_info'],$_POST['product_information'],$_POST['carried_for'],$_POST['begin_info'],$data['user_id'],$_POST['pcountry'],$_POST['p_number'],$_POST['conatct_preffered_on']);
			$stmt->execute();
			$id=$stmt->insert_id;
			$data['cid']=$this->encrypt_decrypt('encrypt',$id);
			
			 
			$stmt->close();
			$dbCon->close();
			return $data['cid'];
			
		}
	
	 
		function addProfessionalServiceConstrutionCleaningRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$whom_id=$this->encrypt_decrypt('decrypt',$data['whom_id']);
			$subcatg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$data['user_id']=0;
			if($_POST['cleaning_type']==2)
			{
				$_POST['cleaning_type_intensity']=0;
			}
			$stmt = $dbCon->prepare("insert into `user_professional_service_request`(whom_you_want_served, `category_id` , `subcategory_id` ,`property_type_detail` , `floor_area` ,  `inclusion_type_detail` , `material_info_detail` , `garbage_removal_required` , `price_info` , `product_information`, `carried_for` , `begin_info` , `user_id` , `pcountry` , `p_number` , `conatct_preffered_on` , `created_on`,total_properties) VALUES (?, ?, ?,   ?, ?,?, ?, ?, ?,   ?, ?,?, ?, ?, ?,   ?, ?,?, now(),?)");
			$stmt->bind_param("iiiidsiiisiiiisii",$whom_id, $catg_id,$subcatg_id,$_POST['property_type_detail'], $_POST['floor_area'], $_POST['inclusion_type_detail'],$_POST['material_info_detail'],$_POST['furniture_info_detail'],$_POST['price_info'],$_POST['product_information'],$_POST['carried_for'],$_POST['begin_info'],$data['user_id'],$_POST['pcountry'],$_POST['p_number'],$_POST['conatct_preffered_on'],$_POST['total_properties']);
			$stmt->execute();
			$id=$stmt->insert_id;
			$data['cid']=$this->encrypt_decrypt('encrypt',$id);
			//$this->sendPropertyLink($data);
			$stmt->close();
			$dbCon->close();
			return $data['cid'];
			
		}
	
	
	
		 function sendPropertyLink($data)
		{
		$subject='Job posted successfully';
		$to      = $data['email'];
		$emailContent='<html xmlns="http://www.w3.org/1999/xhtml" style="background-color: rgb(240, 240, 240);"><head>
  <title>Reservation confirmed</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <style type="text/css">
    /* GT AMERICA */

    @font-face {
      font-display: fallback;
      font-family: "GT America Regular";
      font-weight: 400;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.ttf") format("truetype");
    }

    @font-face {
      font-display: fallback;
      font-family: "GT America Medium";
      font-weight: 600;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.ttf") format("truetype");
    }

    @font-face {
      font-display: fallback;
      font-family: "GT America Condensed Bold";
      font-weight: 700;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.ttf") format("truetype");
    }

    /* CLIENT-SPECIFIC RESET */

    body,
    table,
    td,
    a {
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }

    /* Prevent WebKit and Windows mobile changing default text sizes */

    table,
    td {
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }

    /* Remove spacing between tables in Outlook 2007 and up */

    img {
      -ms-interpolation-mode: bicubic;
    }

    /* Allow smoother rendering of resized image in Internet Explorer */

    .im {
      color: inherit !important;
    }

    /* DEVICE-SPECIFIC RESET */

    a[x-apple-data-detectors] {
      color: inherit !important;
      text-decoration: none !important;
      font-size: inherit !important;
      font-family: inherit !important;
      font-weight: inherit !important;
      line-height: inherit !important;
    }

    /* iOS BLUE LINKS */

    /* RESET */

    img {
      border: 0;
      height: auto;
      line-height: 100%;
      outline: none;
      text-decoration: none;
      display: block;
    }

    table {
      border-collapse: collapse;
    }

    table td {
      border-collapse: collapse;
      display: table-cell;
    }

    body {
      height: 100% !important;
      margin: 0 !important;
      padding: 0 !important;
      width: 100% !important;
    }

    /* BG COLORS */

    .mainTable {
      background-color: #F0F0F0;
    }

    .mainTable--hospitality {
      background-color: #f7f2ed;
    }

    html {
      background-color: #F0F0F0;
    }

    /* VARIABLES */

    .bg-white {
      background-color: white;
    }

    .hr {
      /* Cross-client horizontal rule. Adapted from https://litmus.com/community/discussions/4633-is-there-a-reliable-1px-horizontal-rule-method */
      background-color: #d3d3d8;
      border-collapse: collapse;
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
      mso-line-height-rule: exactly;
      line-height: 1px;
    }

    .textAlignLeft {
      text-align: left !important;
    }

    .textAlignRight {
      text-align: right !important;
    }

    .textAlignCenter {
      text-align: center !important;
    }

    .mt1 {
      margin-top: 6px;
    }

    .list {
      padding-left: 18px;
      margin: 0;
    }

    /* TYPOGRAPHY */

    body {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      color: #4f4f65;
      -webkit-font-smoothing: antialiased;
      -ms-text-size-adjust: 100%;
      -moz-osx-font-smoothing: grayscale;
      font-smoothing: always;
      text-rendering: optimizeLegibility;
    }

    .h1 {
      font-family: "GT America Condensed Bold", "Roboto Condensed", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 700;
      vertical-align: middle;
      font-size: 36px;
      line-height: 42px;
    }

    .h2 {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 600;
      vertical-align: middle;
      font-size: 16px;
      line-height: 24px;
    }

    .text {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 16px;
      line-height: 21px;
    }

    .text-list {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 16px;
      line-height: 25px;
    }

    .textSmall {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 14px;
    }

    .text-xsmall {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-size: 11px;
      text-transform: uppercase;
      line-height: 22px;
      letter-spacing: 1px;
    }

    .text-bold {
      font-weight: 600;
    }

    .text-link {
      text-decoration: underline;
    }

    .text-linkNoUnderline {
      text-decoration: none;
    }

    .text-strike {
      text-decoration: line-through;
    }

    /* FONT COLORS */

    .textColorDark {
      color: #23233e;
    }

    .textColorNormal {
      color: #4f4f65;
    }

    .textColorBlue {
      color: #2020c0;
    }

    .textColorGrayDark {
      color: #7B7B8B;
    }

    .textColorGray {
      color: #A5A8AD;
    }

    .textColorWhite {
      color: #FFFFFF;
    }

    .textColorRed {
      color: #df3232;
    }

    /* BUTTON */

    .Button-primary-wrapper {
      border-radius: 3px;
      background-color: #2020C0;
    }

    .Button-primary {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      border-radius: 3px;
      border: 1px solid #2020C0;
      color: #ffffff;
      display: block;
      font-size: 16px;
      font-weight: 600;
      padding: 18px;
      text-decoration: none;
    }

    .Button-secondary-wrapper {
      border-radius: 3px;
      background-color: #ffffff;
    }

    .Button-secondary {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      border-radius: 3px;
      border: 1px solid #2020C0;
      color: #2020C0;
      display: block;
      font-size: 16px;
      font-weight: 600;
      padding: 18px;
      text-decoration: none;
    }

    /* LAYOUT */

    .Content-container {
      padding-left: 60px;
      padding-right: 60px;
    }

    .Content-container--main {
      padding-top: 54px;
      padding-bottom: 60px;
    }

    .Content {
      width: 580px;
      margin: 0 auto;
    }

    .wrapper {
      max-width: 600px;
    }

    .section {
      padding: 24px 0px;
      border-bottom: 1px solid #d3d3d8;
    }

    .section--noBorder {
      padding: 24px 0px 0;
    }

    .section--last {
      padding: 24px 0px;
    }

    .message {
      background-color: #F4F4F5;
      padding: 18px;
    }

    .card {
      border: 1px solid #d3d3d8;
      padding: 18px;
    }

    /* HEADER */

    .header-tockLogoImage {
      display: block;
      color: #F0F0F0;
    }

    .header-heroImage {
      padding-bottom: 24px;
    }

    /* PREHEADER */

    .preheader {
      display: none;
      font-size: 1px;
      color: #FFFFFF;
      line-height: 1px;
      max-height: 0px;
      max-width: 0px;
      opacity: 0;
      overflow: hidden;
    }

    /* BANNER */

    .notice {
      padding: 12px;
      background: #23233E;
      color: #FFFFFF;
      display: block;
      font-size: 14px;
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 600;
    }

    /* INTRO */

    .section--intro {
      padding-bottom: 48px;
    }

    /* BOOKING INFO */

    .business-logo__container {
      width: 48px;
      height: 48px;
      border-radius: 3px;
      border: 1px solid #d3d3d8;
      overflow: hidden;
    }

    .business-logo__image {
      border: 1px solid transparent;
      border-radius: 3px;
      width: 48px;
      height: 48px;
      display: block;
    }

    .business-address--address {
      width: 50%;
    }

    .business-address--map {
      width: 50%;
    }

    .business-address--map-image {
      width: 100%;
    }

    /* MOBILE TICKETS */

    .mobile-ticket--description {
      width: 65%;
      margin-top: 12px;
      margin-right: 5%;
    }

    .mobile-ticket--code {
      width: 30%;
    }

    .mobile-ticket--code-image {
      width: 100%;
    }

    /* RESERVATION ACTIONS */

    .linksTable {
      border-bottom: 1px solid #d3d3d8;
    }

    .linksTableRow {
      padding: 24px 12px;
    }

    .actions-icon {
      vertical-align: middle;
    }

    .actions-text {
      vertical-align: middle;
    }

    /* RECEIPT */

    .receipt__container {
      border: 1px solid #d3d3d8;
      padding: 24px;
    }

    .receipt__row {
      border-top: 1px solid #d3d3d8;
    }

    /* FEEDBACK ICONS */

    .feedback-link {
      border: 1px solid #d4d5da;
      border-radius: 3px;
      display: inline-block;
      width: calc(32% - 2px);
      padding: 10px 0;
    }

    .feedback-link-bumper {
      display: inline-block;
      width: 1%;
    }

    .feedback-link img {
      height: 50px;
      width: 50px;
    }

    /* SOCIAL ICONS */

    .social-link {
      display: inline-block;
      width: auto;
    }

    .social-link-text {
      padding: 14px 24px 14px 14px;
    }

    /* TABLET STYLES */

    @media screen and (max-width: 648px) {
      /* DEVICE-SPECIFIC RESET */
      div[style*="margin: 16px 0;"] {
        margin: 0 !important;
      }
      /* ANDROID CENTER FIX */
      /* LAYOUT */
      .wrapper {
        width: 100% !important;
        max-width: 100% !important;
      }
      .Content {
        width: 90% !important;
      }
      .Content-container {
        padding-left: 36px !important;
        padding-right: 36px !important;
      }
      .Content-container--main {
        padding-top: 30px !important;
        padding-bottom: 42px !important;
      }
      .responsiveTable {
        width: 100% !important;
      }
      /* RESERVATION ACTIONS */
      .linksTableRow {
        padding-left: 0 !important;
        padding-right: 0 !important;
        padding-top: 12px !important;
        padding-bottom: 12px !important;
      }
      .linksTableRow--borderRight {
        border-right: none !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
      }
      /* FEEDBACK LINK */
      .feedback-link img {
        height: 38px !important;
        width: 38px !important;
      }
    }

    /* MOBILE STYLES */

    @media screen and (max-width: 480px) {
      /* TYPOGRAPHY */
      .h1 {
        font-size: 30px !important;
        line-height: 30px !important;
      }
      .text {
        font-size: 16px !important;
        line-height: 22px !important;
      }
      /* BUTTON */
      .mobile-buttonContainer {
        width: 100% !important;
      }
      /* LAYOUT */
      .Content {
        width: 100% !important;
      }
      .Content-container {
        padding-left: 18px !important;
        padding-right: 18px !important;
      }
      .Content-container--main {
        padding-top: 24px !important;
        padding-bottom: 30px !important;
      }
      .section {
        padding: 18px 0 !important;
      }
      .section--last {
        padding: 18px 0 !important;
      }
      .header {
        padding: 0 18px !important;
      }
      .business-address--address {
        width: 100% !important;
      }
      .business-address--map {
        margin-top: 30px !important;
        width: 100% !important;
      }
      .mobile-ticket--description {
        width: 100% !important;
        margin-top: 0px !important;
      }
      .mobile-ticket--code {
        margin-top: 30px !important;
        margin-left: 0;
        width: 100% !important;
      }
      /* RECEIPT */
      .receipt__container {
        padding: 12px !important;
      }
      /* SOCIAL ICONS */
      .social-link {
        display: block !important;
        width: 100% !important;
        border-bottom: 1px solid #d3d3d8 !important;
      }
      /* INTRO */
      .section--intro {
        padding-top: 18px !important;
        padding-bottom: 18px !important;
      }
    }
  </style>
</head>

<body style="margin: 0 !important; padding: 0 !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; height: 100%; margin: 0; padding: 0; width: 100%; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; color: rgb(79, 79, 101); -webkit-font-smoothing: antialiased; -ms-text-size-adjust: 100%; -moz-osx-font-smoothing: grayscale; font-smoothing: always; text-rendering: optimizeLegibility;">
   
  <!--[if mso]>
    <style type="text/css">
.h1 {font-family: "Helvetica", "Arial", sans-serif !important; font-weight: 700 !important; vertical-align: middle !important; font-size: 36px !important; mso-line-height-rule: exactly;line-height: 42px !important;}
.h2 {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 600 !important;vertical-align: middle !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 24px !important;}
.text {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 21px !important;}
.text-list {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 25px !important;}
.textSmall {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 14px !important;}
.text-xsmall {font-family: "Helvetica", "Arial", sans-serif !important;font-size: 11px !important;text-transform: uppercase !important;mso-line-height-rule: exactly;line-height: 22px !important;letter-spacing: 1px !important;}
.text-bold {font-weight: 600 !important;}
.text-link {text-decoration: underline !important;}
.text-linkNoUnderline {text-decoration: none !important;}
.text-strike {text-decoration: line-through !important;}
.textColorDark {color: #23233e !important;}
.textColorNormal {color: #4f4f65 !important;}
.textColorBlue {color: #2020c0 !important;}
.textColorGray {color: #A5A8AD !important;}
.textColorWhite {color: #FFFFFF !important;}
.Button-primary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #ffffff !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
.Button-secondary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #2020C0 !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
    </style>
    <![endif]-->
  <!-- HIDDEN PREHEADER TEXT -->
  <div class="preheader" style="display: none; font-size: 1px; color: rgb(255, 255, 255); line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
  </div>
  <table border="0" cellpadding="0" cellspacing="0" width="100%" class=" mainTable  " style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: rgb(240, 240, 240);">
    <tbody>
<tr>
<td style="display:none !important;
 visibility:hidden;
 mso-hide:all;
 font-size:1px;
 color:#ffffff;
 line-height:1px;
 max-height:0px;
 max-width:0px;
 opacity:0;
 overflow:hidden; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> We are thrilled that you will be joining us. If yo... </td>
    <!-- HEADER -->
    </tr>
<tr>
      <td align="center" class="header" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
        <!--[if (gte mso 9)|(IE)]>
    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
    <tr>
    <td align="center" valign="top" width="600">
    <![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 580px; margin: 0 auto;">
          <tbody>
<tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <h1 style="font-size: 33px;font-weight: 800;line-height: 30px;">Qloud ID</h1>               </td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
        </tbody>
</table>
        <!--[if (gte mso 9)|(IE)]>
    </td>
    </tr>
    </table>
    <![endif]-->
      </td>
    </tr>
    <!-- CONTENT -->
    <tr>
      <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
        <!--[if (gte mso 9)|(IE)]>
    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
    <tr>
    <td align="center" valign="top" width="600">
    <![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content bg-white" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: white; width: 580px; margin: 0 auto;">
          <tbody>
<tr>
            <td class="Content-container Content-container--main text textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101); padding-left: 60px; padding-right: 60px; padding-top: 54px; padding-bottom: 60px;">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                <!-- RESTAURANT INFO -->
                <tbody>
<tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>

                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
                <!-- INTRO -->
                <tr>
                  <td valign="top" align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
<tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">Signup Completed</span>                          </td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                          <!--[if gte mso 15]>&nbsp;<![endif]-->
                        </td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
                <!-- MESSAGE -->
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="message" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
                    <div class="text textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                      <span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">A message from Qloud ID</span>
                      <br> We are thrilled that you will be joining us. If you would like to hear from you, please do not hesitate to reach out. Restore your account and start using Qloud ID
                    </div>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                    <!--[if gte mso 15]>&nbsp;<![endif]-->
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- BOOKING INFO -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>

                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody>
<tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="https://www.qloudid.com/public/index.php/UserCompanySignUp/listUserProperties/'.$data['cid'].'" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;">Select property</a>                                </td>
                            </tr>
                          </tbody>
</table>
                        </td>
                      </tr>
					  
					  <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
					  
					  
					  
                    </tbody>
</table>
                  </td>
                </tr>
                <!-- ADDRESS -->
                <tr>
                  <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>

                      
                      
                      
                      
                      <tr>
                        <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          
                        </td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                    <!--[if gte mso 15]>&nbsp;<![endif]-->
                  </td>
                </tr>
                
                
                <!-- RECEIPT -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" width="100%" cellpadding="0" cellspacing="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      
</table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- EDIT RECEIPT -->
                <!-- CANCELLATION POLICY -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
<tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; font-weight: 600; color: rgb(35, 35, 62);">Add pricing</div>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                            <span>You are almost there. To get service completed please provide the property information by clicking the button above.</span>
                            <span></span>
                          </div>
                        </td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- QUESTIONS -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
<tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; font-weight: 600; color: rgb(35, 35, 62);">
                            Questions?
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                            If you have questions about your reservation, contact us at&nbsp;
                            <a></a>                            or by calling
                            <a>+46 762072193</a>.
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
      </td>
    </tr>
    <!-- FOOTER -->
    <tr>
      <td align="center" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; width: 580px; margin: 0 auto;">
        <!-- Will most likely required a feature flag -->
        <!--[if (gte mso 9)|(IE)]>
<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
<tr>
<td align="center" valign="top" width="600">
<![endif]-->
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="Content-container" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
          <tbody>
<tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <a href="https://www.exploretock.com" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;"> <img src="https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png" width="30" height="30" alt="Tock" border="0" style="-ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; display: block;"> </a>              </td>
          </tr>
          <tr class="spacer">
            <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
              <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                © 2019 Tock, Inc.
              </div>
              <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                All Rights Reserved
              </div>
            </td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
        </tbody>
</table>
        <!--[if (gte mso 9)|(IE)]>
</td>
</tr>
</table>
<![endif]-->
      </td>
    </tr>
  </tbody>
</table>
</body></html>';
 

			try {
				 sendEmail($subject, $to, $emailContent);
				  
						}

					catch(Exception $e) {
						$to      = 'kowaken.ghirmai@gmail.com';
						sendEmail($subject, $to, $emailContent);
					   
					}
	}

	
	
		function propertyType()
		{ 
		
			$dbCon = AppModel::createConnection();
			  
			$stmt = $dbCon->prepare("select * from apartment_property_type");
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
		
		function languageList()
		{ 
		
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from language_list");
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
		function cleaningExtraInclusion($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$subcatg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);  
			$stmt = $dbCon->prepare("select * from cleaning_extra_inclusion where inclusion_type=?");
			$stmt->bind_param("i", $subcatg_id);
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
		function addPriceDetail($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$categ_id=  $this -> encrypt_decrypt('decrypt',$data['catg_id']); 
			$subcateg_id=  $this -> encrypt_decrypt('decrypt',$data['subcatg_id']);
			$domain_id=  $this -> encrypt_decrypt('decrypt',$data['domain_id']);
			$img_name1='new0.86596200 1682575324';
			if($_POST['subscription_info']==1)	
			{
			$recurring_type=0;
			$total_time=0;
			$recurring_typec=0;
			}
			else
			{
			$recurring_type=$_POST['recurring_type'];
			$total_time=$_POST['total_time'];
			$recurring_typec=$_POST['recurring_typec'];	
			}
			
			 
			if($_POST['one_shared']==2)
			{
			if($_POST['one_shared_type']==2)
			{
			$_POST['dish_price']=$_POST['private_price'];
			}	
			else
			{
			$_POST['dish_price']=$_POST['open_price_per_person'];	
			}
			}
			
			$stmt = $dbCon->prepare("select professional_company_selected_service_todos.id,is_selected,subcategory_name from professional_company_selected_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_company_selected_service_todos.professional_subcategory_id where professional_company_selected_service_todos.professional_subcategory_id=? and professional_company_selected_service_todos.company_id=? ");
			$stmt->bind_param("ii", $subcateg_id,$company_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			$row1 = $result1->fetch_assoc();
			
			 
			$dish_detail=htmlentities(strip_tags($_POST['product_information']),ENT_NOQUOTES, 'ISO-8859-1');
			$product_information=htmlentities($_POST['product_information'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into professional_company_selected_service_todos_price_info(domain_id,tax_included,tax_amount,bookable_service_category_id, is_bookable,preparation_time,post_production_time,dish_name, dish_detail, dish_image, dish_price,  dish_type, dish_warnings, created_on, modified_on,company_id,variation_type,variation_count,product_information,is_physical,subscription_info,recurring_type,recurring_cycle,custom_cycle,custom_time,time_required, one_shared ,   one_shared_type ,  open_price_per_person ,  open_total_person  ,  total_open_events  ,  private_price ,  private_max_person ,  event_at_customer_place  ,  tour_fee_applicable  ,  tour_fee ,  total_private_events  ,  more_event_on_request ,  minimum_people_required  ,  minimum_time_required  ,  minimum_time_period  ,  more_event_extra_fee  ,  extra_fee,professional_category_id,professional_subcategory_id)
			values(?,?,?,?, ?, ?,?,?, ?, ?, ?, ?, ?, now(),now(),?,?, ?, ?, ?,?,?, ?, ?, ?, ? ,?, ?, ?, ?, ? ,?, ?, ?, ?, ? ,?, ?, ?, ?, ?, ?, ?,?,?)");
			$stmt->bind_param("iiiiiiisssiisiiisiiiiiiiiiiiiiiiiiiiiiiiiii",$domain_id,$_POST['tax_included'],$_POST['tax_amount'],$_POST['bookable_service_category_id'],$_POST['is_bookable'],$_POST['preparation_time'],$_POST['post_production_time'],$row1['subcategory_name'],$dish_detail ,$img_name1 ,$_POST['dish_price'], $_POST['dish_type'],$_POST['food_type'],$company_id,$_POST['variation_type'],$_POST['variation_count'],$product_information,$_POST['product_type'],$_POST['subscription_info'],$recurring_type,$recurring_type,$recurring_typec,$total_time,$_POST['time_required'],$_POST['one_shared'] ,   $_POST['one_shared_type'] ,  $_POST['open_price_per_person'] ,  $_POST['open_total_person']  ,  $_POST['total_open_events']  ,  $_POST['private_price'] ,  $_POST['private_max_person'] ,  $_POST['event_at_customer_place']  ,  $_POST['tour_fee_applicable']  ,  $_POST['tour_fee'] ,  $_POST['total_private_events']  ,  $_POST['more_event_on_request'] ,  $_POST['minimum_people_required']  ,  $_POST['minimum_time_required']  ,  $_POST['minimum_time_period']  ,  $_POST['more_event_extra_fee']  ,  $_POST['extra_fee'],$categ_id,$subcateg_id );
			
			
			if($stmt->execute())
			{
				
				$id=$stmt->insert_id;
				$a=explode(',',$_POST['inclusion_type_detail']);
				for($up=1;$up<=3;$up++)
				{
					$stmt = $dbCon->prepare("insert into `qloudid`.`professional_company_selected_service_todos_price_available`(price_id,`service_available`) values (?,?)");
					$stmt->bind_param("ii",$id, $up);
					$stmt->execute();
				}
				foreach($a as $key)
				{
				$stmt = $dbCon->prepare("update`qloudid`.`professional_company_selected_service_todos_price_available` set is_active=1 where price_id=? and `service_available`=?");
				$stmt->bind_param("ii",$id, $key);
				$stmt->execute();	
				}
				if($_POST['one_shared']==2)
				{
					if($_POST['one_shared_type']!=2)
					{
					if($_POST['recurring_event']==0)
					{
						$event_date=strtotime($_POST['open_event_date']);
						$stmt = $dbCon->prepare("update professional_company_selected_service_todos_price_info set recurring_event=?,open_event_date=?,open_event_time=? where id=?");
						$stmt->bind_param("isii",$_POST['recurring_event'],$event_date,$_POST['event_start_time'],$id );	
						$stmt->execute();	
					}
					else
					{
						for($i=1;$i<=7;$i++)
						{
						$working_day='working_day_'.$i;
						$work_start_time='work_start_time_'.$i;
						$stmt = $dbCon->prepare("update professional_company_selected_service_todos_price_info set recurring_event=? where id=?");
						$stmt->bind_param("ii",$_POST['recurring_event'],$id );	
						$stmt->execute();	
						$stmt = $dbCon->prepare("insert into professional_company_selected_service_todos_recurring_info(day_id,service_price_id,event_day,event_start_time) values(?, ?, ?,?)");
						/* bind parameters for markers */
						$cont=1;
						$stmt->bind_param("iiii",$i,$id,$_POST[$working_day],$_POST[$work_start_time]);
						$stmt->execute();	
						
							
						}
					}
					}
				}
				
				$pickID=$id;
				$picka=1;
			$stmt = $dbCon->prepare("insert into dishes_detail_information(professional_category_id,professional_subcategory_id,inclusion_detail,tax_included,tax_amount,bookable_service_category_id, is_bookable,preparation_time,post_production_time,dish_name, dish_detail, dish_image, dish_price,  dish_type, dish_warnings, created_on, modified_on,company_id,variation_type,variation_count,product_information,is_physical,subscription_info,recurring_type,recurring_cycle,custom_cycle,custom_time,time_required, one_shared ,   one_shared_type ,  open_price_per_person ,  open_total_person  ,  total_open_events  ,  private_price ,  private_max_person ,  event_at_customer_place  ,  tour_fee_applicable  ,  tour_fee ,  total_private_events  ,  more_event_on_request ,  minimum_people_required  ,  minimum_time_required  ,  minimum_time_period  ,  more_event_extra_fee  ,  extra_fee,pickapro_listing )
			values(?,?,?,?,?,?, ?, ?,?,?, ?, ?, ?, ?, ?, now(),now(),?,?, ?, ?, ?,?,?, ?, ?, ?, ? ,?, ?, ?, ?, ? ,?, ?, ?, ?, ? ,?, ?, ?, ?, ?, ?, ?,?)");
			$stmt->bind_param("iisiiiiiisssiisiiisiiiiiiiiiiiiiiiiiiiiiiiii",$categ_id,$subcateg_id ,$_POST['inclusion_type_detail'],$_POST['tax_included'],$_POST['tax_amount'],$_POST['bookable_service_category_id'],$_POST['is_bookable'],$_POST['preparation_time'],$_POST['post_production_time'],$row1['subcategory_name'],$dish_detail ,$img_name1 ,$_POST['dish_price'], $_POST['dish_type'],$_POST['food_type'],$company_id,$_POST['variation_type'],$_POST['variation_count'],$product_information,$_POST['product_type'],$_POST['subscription_info'],$recurring_type,$recurring_type,$recurring_typec,$total_time,$_POST['time_required'],$_POST['one_shared'] ,   $_POST['one_shared_type'] ,  $_POST['open_price_per_person'] ,  $_POST['open_total_person']  ,  $_POST['total_open_events']  ,  $_POST['private_price'] ,  $_POST['private_max_person'] ,  $_POST['event_at_customer_place']  ,  $_POST['tour_fee_applicable']  ,  $_POST['tour_fee'] ,  $_POST['total_private_events']  ,  $_POST['more_event_on_request'] ,  $_POST['minimum_people_required']  ,  $_POST['minimum_time_required']  ,  $_POST['minimum_time_period']  ,  $_POST['more_event_extra_fee']  ,  $_POST['extra_fee'],$picka );
			
			
			if($stmt->execute())
			{
				
				$id=$stmt->insert_id;
				
				$stmt = $dbCon->prepare("update professional_company_selected_service_todos_price_info set qloud_service_id=? where id=?");
				$stmt->bind_param("ii",$id,$pickID);	
				$stmt->execute();	
				
				if($_POST['one_shared']==2)
				{
					if($_POST['one_shared_type']!=2)
					{
					if($_POST['recurring_event']==0)
					{
						$event_date=strtotime($_POST['open_event_date']);
						$stmt = $dbCon->prepare("update dishes_detail_information set recurring_event=?,open_event_date=?,open_event_time=? where id=?");
						$stmt->bind_param("isii",$_POST['recurring_event'],$event_date,$_POST['event_start_time'],$id );	
						$stmt->execute();	
					}
					else
					{
						for($i=1;$i<=7;$i++)
						{
						$working_day='working_day_'.$i;
						$work_start_time='work_start_time_'.$i;
						$stmt = $dbCon->prepare("update dishes_detail_information set recurring_event=? where id=?");
						$stmt->bind_param("ii",$_POST['recurring_event'],$id );	
						$stmt->execute();	
						$stmt = $dbCon->prepare("insert into dish_service_recurring_information (day_id,dish_id,event_day,event_start_time) values(?, ?, ?,?)");
						/* bind parameters for markers */
						$cont=1;
						$stmt->bind_param("iiii",$i,$id,$_POST[$working_day],$_POST[$work_start_time]);
						$stmt->execute();	
						
							
						}
					}
					}
				}
			}
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
		
		
		function professionalCategoryDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select * from professional_service_category where id in(select professional_category_id from professional_marketplace_service_todos where marketplace_id=? and is_selected=1) order by category_completed desc");
			$stmt->bind_param("i",$domain_id );	
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}	
			
		function professionalSubCategoryDetailAreaBased($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$whom_id=$this->encrypt_decrypt('decrypt',$data['whom_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$area_id=$this->encrypt_decrypt('decrypt',$data['area_id']);
			//echo $catg_id.' '.$whom_id.' '.$domain_id.' '.$area_id; die;
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where professional_category_id=? and id in (select subcategory_id from professional_service_subcategory_available  where availablity_type=?) and id in (select professional_subcategory_id from professional_marketplace_service_todos where marketplace_id=? and is_selected=1 and professional_category_id=?) and id in (select professional_subcategory_id from professional_company_selected_service_todos where company_id in(select company_id from professional_company_selected_areas where area_id=? and is_selected=1) and is_selected=1 and professional_category_id=?)");
			$stmt->bind_param("iiiiii", $catg_id,$whom_id,$domain_id,$catg_id,$area_id,$catg_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
			
		function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
			}	
			
		function serviceBidsInfo($data)
		{  
			 
			$dbCon = AppModel::createConnection();
		    $bid_id=$this->encrypt_decrypt('decrypt',$data['bid_id']);
			$stmt = $dbCon->prepare("select user_professional_service_request.domain_id,country_name,bookable_calender, booking_date,work_time,country_code,company_email,user_professional_service_request_company_info.company_id,is_service_bookable,user_professional_service_request.category_id,user_professional_service_request.subcategory_id,company_profiles.address as c_address,company_profiles.city as c_city,category_name,subcategory_name,user_professional_service_request.user_id,user_professional_service_request_company_info.id,company_name,per_hour_fee,project_fee,bid_accepted,company_profiles.phone from user_professional_service_request_company_info left join companies on companies.id=user_professional_service_request_company_info.company_id left join user_professional_service_request on user_professional_service_request.id=user_professional_service_request_company_info.job_id left join professional_service_category on professional_service_category.id=user_professional_service_request.category_id left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join company_profiles on company_profiles.company_id=companies.id left join phone_country_code on phone_country_code.id=companies.country_id left join working_hrs on working_hrs.id=user_professional_service_request_company_info.booking_time where user_professional_service_request_company_info.id=?");
			/* bind parameters for markers */
			$cont=1;
		    $stmt->bind_param("i", $bid_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			 
			$row['uid']=$this->encrypt_decrypt('encrypt',$row['user_id']);
			$row['cid']=$this->encrypt_decrypt('encrypt',$row['company_id']);
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}	
		
		
		function encryptServiceList($data)
		{
			$dbCon = AppModel::createConnection();
			
			$job_id=$this->encrypt_decrypt('encrypt',substr($_POST['service_list'],0,-1));
			return $job_id;
		}
			
		function updateBookingTimeInfo($data)
		{
			$dbCon = AppModel::createConnection();
			
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$qloud_bookable_service_id=$this->encrypt_decrypt('decrypt',$data['service_id']);
			$is_verified=1;
			
			$stmt = $dbCon->prepare("select * from dishes_detail_information where find_in_set(id,?");
			$stmt->bind_param("s",$qloud_bookable_service_id);
			 
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("insert into `qloudid`.`user_professional_service_request_company_info`( per_hour_fee,project_fee,is_service_bookable, `job_id`  , `company_id`  , `assigned_on`) values (?,?,?,?,?,now())");
			$stmt->bind_param("iiiii",$row['dish_price'],$row['dish_price'], $is_verified,$job_id,$company_id);
			$stmt->execute();
			
			$bid_id=$stmt->insert_id;
			$data['bid_id']=$this->encrypt_decrypt('encrypt',$bid_id);
			$serviceBidsInfo=$this->serviceBidsInfo($data);
			$stmt = $dbCon->prepare("update `user_professional_service_request_company_info` set  bid_accepted=2 where job_id=?");
			$stmt->bind_param("i", $job_id);
			$stmt->execute();
			
			
			$service_type=6;
			
			$qloud_checkout_id=0;
			
			$stmt = $dbCon->prepare("select * from dishes_detail_information where find_in_set(id,?");
			$stmt->bind_param("s",$qloud_bookable_service_id);
			 
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into  hotel_roomservice_item_ordered (professional_user_job_id,is_confirmed_employee,booked_employee_id, booking_time, booking_date,qloud_checkout_id,is_verified,service_type,booking_person_id,dish_id,dish_quantity,created_on,is_paid,user_id)values(?,?,?,?,?,?,?,?,?,?,?,now(),?,?)");
			/* bind parameters for markers */
			$stmt->bind_param("iiisiiiiiiiii",$job_id,$_POST['is_confirmed'],$_POST['booking_employee_id'],$_POST['booking_time'],$_POST['booking_date'],$qloud_checkout_id,$is_verified,$service_type,$serviceBidsInfo['user_id'],$row['id'],$is_verified,$is_verified,$serviceBidsInfo['user_id']);
			$stmt->execute();
			$id=$stmt->insert_id;
			
			$stmt = $dbCon->prepare("update `user_professional_service_request_company_info` set  bid_accepted=1,qloud_bookable_service_id=?,booking_employee_id=?, booking_time=?, booking_date=?,hotel_room_service_id=? where id=?");
			$stmt->bind_param("iisiii", $row['id'],$_POST['booking_employee_id'],$_POST['booking_time'],$_POST['booking_date'],$id,$bid_id);
			$stmt->execute();	
			}
			
			
			
			$stmt->close();
			$dbCon->close();
			return $data['bid_id'];
		}	
			
		function getProfessionalServiceCompanies($data)
		{
			$dbCon = AppModel::createConnection();
			$professional_subcategory_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select companies.id,company_name,latitude,longitude,address,profile_pic from companies left join company_profiles on company_profiles.company_id=companies.id where companies.id in(select company_id from dishes_detail_information where is_physical=2 and is_bookable=1 and is_active=1 and professional_subcategory_id=? and id in (select service_id from dish_marketplace_information where marketplace_id=? and is_published=1))");
			$stmt->bind_param("ii",$professional_subcategory_id,$domain_id);
			 
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			
			$stmt = $dbCon->prepare("select selected_subscription from cleaning_company_premium_account_request where company_id=? and domain_id=?");
			$stmt->bind_param("ii",$row['id'],$domain_id);
			$stmt->execute();
			$resultC = $stmt->get_result();
			$rowC = $resultC->fetch_assoc();
			if($rowC['selected_subscription']==0)
			{
				continue;
			}
			else
			{
			$row['selected_subscription']=$rowC['selected_subscription'];
			}
			$stmt = $dbCon->prepare("select count(dishes_detail_information.id) as num from dishes_detail_information left join companies on companies.id=dishes_detail_information.company_id where is_physical=2 and is_bookable=1 and is_active=1 and professional_subcategory_id=? and company_id=?   and dishes_detail_information.id in (select service_id from dish_marketplace_information where marketplace_id=? and is_published=1)");
			$stmt->bind_param("iii",$professional_subcategory_id,$row['id'],$domain_id);
			$stmt->execute();
			$resultC = $stmt->get_result();
			$rowC = $resultC->fetch_assoc();
			if($rowC['num']==0)
				continue;
			 
			$stmt = $dbCon->prepare("select min(dish_price) as price from dishes_detail_information where is_physical=2 and is_bookable=1 and is_active=1 and professional_subcategory_id=? and company_id=?");
			$stmt->bind_param("ii",$professional_subcategory_id,$row['id']);
			$stmt->execute();
			$resultPrice = $stmt->get_result();
			$rowPrice = $resultPrice->fetch_assoc();
			
			  
				
				array_push($org,$row);
				$org[$j]['price']=$rowPrice['price'];
				$org[$j]['image_path']=$image;
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				
				$org[$j]['images']=array();
				$i=0;
				$stmt = $dbCon->prepare("select * from dish_detail_photos where dish_id in (select id from dishes_detail_information where is_physical=2 and is_bookable=1 and is_active=1 and professional_subcategory_id=? and company_id=?) limit 0,4");
				$stmt->bind_param("ii",$professional_subcategory_id,$row['id']);
				$stmt->execute();
				$resultPrice1 = $stmt->get_result();
				while($rowProfile = $resultPrice1->fetch_assoc())
				{
					$row['profile_pic']=$rowProfile['dish_photo_path'];
					if($row['profile_pic']=="" || $row['profile_pic']==null)
					{
						continue;
					}
					else
					{
					$filename="../estorecss/".$row['profile_pic'].".txt"; $value_a=file_get_contents("../estorecss/".$row['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a); $image = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['profile_pic'].'.jpg' );
					$row['profile_pic']=str_replace('../','https://www.qloudid.com/',$image);	
					}
					$org[$j]['images'][$i]['profile_pic']=$row['profile_pic'];
					$i++;
				}
				$key_values = array_column($org, 'selected_subscription'); 
				array_multisort($key_values, SORT_DESC, $org);
				$j++;
			}
		 
			$stmt->close();
			$dbCon->close();  
			return $org;
			
		}
		
		
		function professionalCompanyEmployeeList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email from employees  where company_id=? and user_login_id!=43");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select * from employee_service_booking_rules  where employee_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$resultEmp = $stmt->get_result();
				$rowEmp = $resultEmp->fetch_assoc();
				if(empty($rowEmp))
				{
				$stmt = $dbCon->prepare("insert into employee_service_booking_rules(employee_id,company_id,created_on) values(?,?,now())");
				
				/* bind parameters for markers */
				$stmt->bind_param("ii", $row['id'],$company_id);
				$stmt->execute();	
				}
				$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			}
			 
			
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function selectedServiceInfo($data)
		{
			 
			$dbCon = AppModel::createConnection();
			$services=$this->encrypt_decrypt('decrypt',$data['service_id']);
			$a=explode(',',$services);
			  $item_id=$a[0];
			$stmt = $dbCon->prepare("select company_name,product_information ,time_required,dishes_detail_information.id,dish_name,dish_detail,dish_price,is_bookable,is_active,is_physical,dish_image,one_shared,one_shared_type,recurring_event,open_event_date,open_total_person,open_event_time,work_time,open_price_per_person,private_price from dishes_detail_information left join working_hrs on working_hrs.id=dishes_detail_information.open_event_time left join companies on companies.id=dishes_detail_information.company_id where dishes_detail_information.id=?");
			$stmt->bind_param("i",$item_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowDishes = $result->fetch_assoc();
			if($rowDishes['one_shared']==2 && $rowDishes['one_shared_type']==1 && $rowDishes['recurring_event']==0)
			{
			$stmt = $dbCon->prepare("select sum(dish_quantity) as total_booked from hotel_roomservice_item_ordered where dish_id=? and service_type=5");
			$stmt->bind_param("i",$rowDishes['id']);
			$stmt->execute();
			$result2 = $stmt->get_result();	
			$row2 = $result2->fetch_assoc();
			$rowDishes['open_total_person']=$rowDishes['open_total_person']-$row2['total_booked'];
			}
			
			
			$filename="../estorecss/".$rowDishes ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowDishes ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowDishes ['dish_image'].'.jpg' );  $imgs='../../../../'.$imgs; } else { $value_a="../../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../../html/usercontent/images/default-profile-pic.jpg"; }
			$imgs=str_replace('../../../../../','https://www.qloudid.com/',$imgs);
			$rowDishes['dish_image']=$imgs;
			 
			$stmt->close();
			$dbCon->close();  
			return $rowDishes;
			
		}
		
		function dstrictBookingOpenCalenderInfo($data)
	{
		$dbCon = AppModel::createConnection();
		$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		$items=$this->encrypt_decrypt('decrypt',$data['service_id']); 
		
		$_POST['quantity']=1;
		$query="select time_required,post_production_time,preparation_time,open_total_person from dishes_detail_information where id=".$items;
		$result=(mysqli_query($dbCon,$query));
		$timeRequired=0;
		$row=mysqli_fetch_array($result);
		$timeRequired=$timeRequired+$row['time_required']+$row['post_production_time']+$row['preparation_time'];
		$totalPerson=$row['open_total_person'];
		$org=array();
		$org['date_flag']=$_POST['date_flag'];
		$timeRequired=round($timeRequired/2);
		$flag=$_POST['date_flag']*7;
	$startDate=date('d-m-Y',strtotime(date('d-m-Y') . ' +'.$flag.' day'));

	for($i=0;$i<=6;$i++)
	{		
	$org[$i]['timerequired']=$timeRequired;
	$org[$i]['date']=strtotime($startDate . ' +'.$i.' day');
	$weekDay=date('w', strtotime($startDate . ' +'.$i.' day')); 
	$org[$i]['work_time_info']=array(); 
	 
	$query="select day_id,event_day,id from dish_service_recurring_information left join working_hrs on working_hrs.id=dish_service_recurring_information.event_start_time where day_id=".$weekDay." and dish_id=".$items;
	$result=(mysqli_query($dbCon,$query));
	$row=mysqli_fetch_array($result); 
	  
		if($row['event_day']==0)
		continue; 
	  
	
	
					$stmt = $dbCon->prepare("select sum(dish_quantity) as total_booked from hotel_roomservice_item_ordered where dish_id=? and service_type=5");
					$stmt->bind_param("i",$items);
					$stmt->execute();
					$result2 = $stmt->get_result();	
					$row2 = $result2->fetch_assoc();
					if($row2['total_booked']==$totalPerson)
						continue;
					if(($totalPerson-$row2['total_booked'])<$_POST['quantity'])
						continue;
	 array_push($org[$i]['work_time_info'],$row);
			 
	}
	 
	$dbCon->close();  
	  
	$data['calender']=json_encode($org,true);
	$calender=$this->getOpenCalender($data);
	return $calender;
	}
	function getOpenCalender($data)
		{
			$dbCon = AppModel::createConnection();
			 
			if($data['date_flag']==0)
				{
					$earlier='<div class="absolute left-0 -top-12 z-20"><button class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none !text-green-200 X1LqXa1wBWadrQb2cUbq focus:!ring-0" disabled=""><span class="flex items-center justify-center mr-2 h-5 w-5" style=""><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit; ">Earlier</font></font></button></div>
  
 <div class="absolute right-0 -top-12 z-20"><button onclick="getNewCalender(1);" class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none  X1LqXa1wBWadrQb2cUbq focus:!ring-0"><font style="vertical-align: inherit; "><font style="vertical-align: inherit;  ">Later</font></font><span class="flex items-center justify-center ml-2 h-5 w-5" style=""><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 -rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span></button></div>
  
  ';
				}
				else if($data['date_flag']==3)
				{
					$earlier='<div class="absolute left-0 -top-12 z-20"><button onclick="getNewCalender(2);" class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none  X1LqXa1wBWadrQb2cUbq focus:!ring-0"><span class="flex items-center justify-center mr-2 h-5 w-5" style=""><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit; ">Earlier</font></font></button></div>
  
  
                                            <div class="absolute right-0 -top-12 z-20"><button class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none !text-green-200 X1LqXa1wBWadrQb2cUbq focus:!ring-0" disabled=""><font style="vertical-align: inherit; "><font style="vertical-align: inherit; ">Later</font></font><span class="flex items-center justify-center ml-2 h-5 w-5" style=""><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 -rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span></button></div>';
				}
				else
				{
					$e=$data['date_flag']-1;
					$l=$data['date_flag']+1;
					$earlier='<div class="absolute left-0 -top-12 z-20"><button onclick="getNewCalender('.$e.');" class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none  X1LqXa1wBWadrQb2cUbq focus:!ring-0"><span class="flex items-center justify-center mr-2 h-5 w-5"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Earlier</font></font></button></div>
  
   <div class="absolute right-0 -top-12 z-20"><button onclick="getNewCalender('.$l.');" class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none  X1LqXa1wBWadrQb2cUbq focus:!ring-0"><font style="vertical-align: inherit; "><font style="vertical-align: inherit; ">Later</font></font><span class="flex items-center justify-center ml-2 h-5 w-5"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 -rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span></button></div>
  
                                          ';
				}
			 $flag=$data['date_flag']*7;
			$startDate=date('M d',strtotime(date('d-m-Y') . ' +'.$flag.' day'));
			$flag=($data['date_flag']*7)+6;
			$endDate=date('M d',strtotime(date('d-m-Y') . ' +'.$flag.' day'));
			$calender=json_decode($data['calender'],true); 
			//echo '<pre>'; print_r($calender); echo '</pre>'; die; 
			$header="";		
			$i=0;	
			 	
			$weekDays='';
			 foreach($calender as $key)
			 {
				 
				 if($key==0)
					 continue;
				  
				 if($i==0)
				 {
					 $select="selected";
				 }
				 
				 else
					 {
						$select=""; 
					 }
					 if(count($key['work_time_info'])==0)
					 {
						$header=$header.'<div class="flex-grow basis-0 border-b-[1px] border-l-[1px] border-gray-200  text-center last-of-type:border-r-[1px] colIndex-'.$i.' text-gray-300"><span class="block pt-2 text-center text-sm capitalize text-inherit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.date('D',$key['date']).'</font></font></span><span class="relative mx-auto mb-1 block h-11 text-lg font-semibold !leading-[44px] text-inherit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.date('d',$key['date']).'</font></font></span></div>'; $disable='disabled';
					 }
					 else
					 {
						 $header=$header.'<div class="flex-grow basis-0 border-b-[1px] border-l-[1px] border-gray-200  text-center last-of-type:border-r-[1px] colIndex-'.$i.' txt_777E90"><span class="block pt-2 text-center text-sm capitalize text-inherit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.date('D',$key['date']).'</font></font></span><span class="relative mx-auto mb-1 block h-11 text-lg font-semibold !leading-[44px] text-inherit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.date('d',$key['date']).'</font></font><span class="absolute bottom-[2px] left-1/2 h-[6px] w-[6px] -translate-x-1/2 rounded-full bg-gray-900"></span></span></div>'; 
					 }
					
				 
						$weekDays=$weekDays.'<div class="flex-shrink flex-grow basis-0 border-l-[1px] border-b-[1px] border-gray-100 text-center last-of-type:border-r-[1px]">';
						
						     
									foreach($key['work_time_info'] as $key1)
									 {
										 
											 
										 
									$stmt = $dbCon->prepare("select work_time from working_hrs where id=?");
									/* bind parameters for markers */
									 
									$stmt->bind_param("i",$key1['id']);
									$stmt->execute();
									$result = $stmt->get_result();
									$row = $result->fetch_assoc();	 
									
									 
									$weekDays=$weekDays.'<span class="mx-1 my-[6px] flex h-auto cursor-pointer flex-col rounded-md border-[1px] border-solid text-center text-xs font-semibold !leading-9 md:m-2   border-green text-green hover:bg-green bg-green-100 hover:text-white" onclick="updateEmployeeTime('.$key['date'].','.$key1['id'].',0,'.$key['timerequired'].');"><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$row['work_time'].'</font></font></span></span>
									
									';	 
									 }
								
								$weekDays=$weekDays.'</div>';
								
						 	 
			$i++;
			 }
		
			if(isset($data['w_width']))
			{
			if($data['w_width']>700)
					{
						$width=450;
					}
					else
					{
					$width=	$data['w_width']-50;
					}	
			}	
			else
			{
				$width=450;
			}
		
			 $dataAvailable='<div class="column_m bs_bb  ">
					
					<div style="position: relative;">
                                    <div class="calendar week-view">
									<p class="sticky !top-16 z-[100] m-0 flex flex-col items-center justify-center  p-3 uppercase"><span class="font-semibold txt_777E90"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$startDate.' - '.$endDate.'</font></font></span><span class="text-xs text-gray-700"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Week 45</font></font></span></p>
                                         
                                        <div class="sticky !top-32 z-[100]  shadow" style="height:76px;">
                                            <div class="slick-slider slick-calendar slick-initialized">
                                                <div class="slick-list">
                                                    <div class="slick-track" style="width: '.$width.'px; opacity: 1; transform: translate3d(0px, 0px, 0px);">
                                                        <div data-index="0" class="slick-slide slick-active slick-current" tabindex="-1" aria-hidden="false" style="outline: none; width: '.$width.'px;">
                                                            <div>
                                                                <div class="!flex w-full justify-between" tabindex="-1" style="width: 100%; display: inline-block;">
                                                                     '.$header.'
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            '.$earlier.'
                                        </div>
                                        <div class="hours sticky">
                                            <div class="flex w-full" style="min-height: 300px;">
                                               '.$weekDays.'
                                            </div>
                                        </div>
                                    </div>
                                </div>
					
					
					
				</div>';
				
				 
			$dbCon->close();
			return $dataAvailable;
			
			 
			
		}
	
	function bookingPrivateCalenderInfo($data)
	{
		$dbCon = AppModel::createConnection();
		$employee_id=$this->encrypt_decrypt('decrypt',$data['employee_id']);
		$bookable_service_id=$this->encrypt_decrypt('decrypt',$data['service_id']);
		$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		$query="select time_required,post_production_time,preparation_time from dishes_detail_information where id in (".$bookable_service_id.")";
		$result=(mysqli_query($dbCon,$query));
		$timeRequired=0;
		while($row=mysqli_fetch_array($result))
		{
		$timeRequired=$timeRequired+$row['time_required']+$row['post_production_time']+$row['preparation_time'];	
		}
		
		
		
		$org=array();
		$timeRequired=round($timeRequired/2);
		$flag=$data['date_flag']*7;
	$startDate=date('d-m-Y',strtotime(date('d-m-Y') . ' +'.$flag.' day'));

	for($i=0;$i<=6;$i++)
	{		
	$org[$i]['timerequired']=$timeRequired;
	$org[$i]['date']=strtotime($startDate . ' +'.$i.' day');
	$weekDay=date('w', strtotime($startDate . ' +'.$i.' day')); 
		if($employee_id==0)
		{
		$query="select id,services_available from employees where company_id=".$company_id;	
		}
		else
		{
			$query="select id,services_available from employees where id=".$employee_id;
		}
		$result=(mysqli_query($dbCon,$query));
		$ids='';
		while($row=mysqli_fetch_array($result))
		{
			 
			/*$query2="select working_day from employee_working_hrs where day_id=".$weekDay." and employee_id=".$row['id'];
			$result2=(mysqli_query($dbCon,$query2));
			$row2=mysqli_fetch_array($result2);
			 
			if($row2['working_day']==0)
			{
				continue;
			}
			*/
			$ids=$ids.$row['id'].',';	
			
		}
		$ids=substr($ids,0,-1);
		$emps=explode(',',$ids);
		$org[$i]['work_time_info']=array();
		if($ids=='')
		{
			continue;
		}	
		$workId="0";
		
		foreach($emps as $key1)
		{
			 
		$bookedDate='0';
		$query2="select booking_time from hotel_roomservice_item_ordered where booked_employee_id=".$key1." and booking_date='".$org[$i]['date']."'";
		$result2=(mysqli_query($dbCon,$query2));
		while($row2=mysqli_fetch_array($result2))
		{
			$bookedDate=$bookedDate.",".$row2['booking_time'];
		}
 
		  
		$query2="select work_start_time,work_end_time,lunch_start_time,lunch_end_time from employee_working_hrs where day_id=".$weekDay." and employee_id=".$key1;
		$result2=(mysqli_query($dbCon,$query2));
		$row2=mysqli_fetch_array($result2);
		if(empty($row2))
		{
		$row2=array();
		$row2['work_start_time']=15;
		$row2['work_end_time']=38;
		$row2['lunch_start_time']=30;
		$row2['lunch_end_time']=32;
		}
		$row2['lunch_end_time']=$row2['lunch_end_time']-1; 
		 
		
		 
		$query="select id,work_time from working_hrs where (id between ".$row2['work_start_time']." and ".$row2['work_end_time'].") and (id not between ".$row2['lunch_start_time']." and ".$row2['lunch_end_time'].")  and id not in (select id from working_hrs where id in (".$bookedDate."))";
		$result=(mysqli_query($dbCon,$query));
		$ids='';
		while($row=mysqli_fetch_array($result))
		{
		$workId=$workId.",".$row['id'];
		//$row['emp_id']=$key1;
		//array_push($org[$i]['work_time_info'],$row);
		$ids=$ids.$row['id'].",";
		}
		
		$dataWork=explode(',',substr($ids,0,-1));
		$avail=1;
		$j=0;
		 
		foreach($dataWork as $key3)
		{
			for($t=0;$t<$timeRequired;$t++)
			{
				$value=(int)$key3+$t;
				if (in_array($value, $dataWork))
				{
				$avail=1;
				}
				else
				{
				$avail=0;
				break;
				}
			}
			
			if($avail==1)
			{
				$query="select id from working_hrs where id=".$key3;
				$result=(mysqli_query($dbCon,$query));
				$row=mysqli_fetch_array($result);
				$row['emp_id']=$key1;
				$reg=1;
			foreach($org[$i]['work_time_info'] as $vals)
			{
				
				if($vals['id']==$row['id'])
				{
					$reg=0;
					break;
				}
			}
			if($row['id']==null || $row['id']=='')
				continue;
			if($reg==1)
			array_push($org[$i]['work_time_info'],$row);
			 //if(!in_array($row,$org[$i]['work_time_info']))
				//array_push($org[$i]['work_time_info'],$row);
			}
		}
		$key2 = array_column($org[$i]['work_time_info'], 'id');

		array_multisort($key2, SORT_ASC, $org[$i]['work_time_info']);
		}
		
	
		
	}
	$dbCon->close();  
	$data['calender']=json_encode($org,true);
	$calender=$this->getCalender($data);
	return $calender;
	}
	
	function getCalender($data)
		{
			$dbCon = AppModel::createConnection();
			if($data['date_flag']==0)
				{
					$earlier='<div class="absolute left-0 -top-12 z-20"><button class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none !text-green-200 X1LqXa1wBWadrQb2cUbq focus:!ring-0" disabled=""><span class="flex items-center justify-center mr-2 h-5 w-5"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Earlier</font></font></button></div>
  
 <div class="absolute right-0 -top-12 z-20"><button onclick="getNewCalender(1);" class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none  X1LqXa1wBWadrQb2cUbq focus:!ring-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Later</font></font><span class="flex items-center justify-center ml-2 h-5 w-5"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 -rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span></button></div>
  
  ';
				}
				else if($data['date_flag']==3)
				{
					$earlier='<div class="absolute left-0 -top-12 z-20"><button onclick="getNewCalender(2);" class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none  X1LqXa1wBWadrQb2cUbq focus:!ring-0"><span class="flex items-center justify-center mr-2 h-5 w-5"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Earlier</font></font></button></div>
  
  
                                            <div class="absolute right-0 -top-12 z-20"><button class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none !text-green-200 X1LqXa1wBWadrQb2cUbq focus:!ring-0" disabled=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Later</font></font><span class="flex items-center justify-center ml-2 h-5 w-5"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 -rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span></button></div>';
				}
				else
				{
					$e=$data['date_flag']-1;
					$l=$data['date_flag']+1;
					$earlier='<div class="absolute left-0 -top-12 z-20"><button onclick="getNewCalender('.$e.');" class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none  X1LqXa1wBWadrQb2cUbq focus:!ring-0"><span class="flex items-center justify-center mr-2 h-5 w-5"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Earlier</font></font></button></div>
  
   <div class="absolute right-0 -top-12 z-20"><button onclick="getNewCalender('.$l.');" class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none  X1LqXa1wBWadrQb2cUbq focus:!ring-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Later</font></font><span class="flex items-center justify-center ml-2 h-5 w-5"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 -rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span></button></div>
  
                                          ';
				}
			 $flag=$data['date_flag']*7;
			$startDate=date('M d',strtotime(date('d-m-Y') . ' +'.$flag.' day'));
			$flag=($data['date_flag']*7)+6;
			$endDate=date('M d',strtotime(date('d-m-Y') . ' +'.$flag.' day'));
			$calender=json_decode($data['calender'],true); 
			
			$header="";		
			$i=0;			
			$weekDays='';
			 foreach($calender as $key)
			 {
				if($key==0)
					 continue;  
				 
				 if($i==0)
				 {
					 $select="selected";
				 }
				 
				 else
					 {
						$select=""; 
					 }
					 if(count($key['work_time_info'])==0)
					 {
						$header=$header.'<div class="flex-grow basis-0 border-b-[1px] border-l-[1px] border-gray-200 bg-white text-center last-of-type:border-r-[1px] colIndex-'.$i.' text-gray-300"><span class="block pt-2 text-center text-sm capitalize text-inherit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.date('D',$key['date']).'</font></font></span><span class="relative mx-auto mb-1 block h-11 text-lg font-semibold !leading-[44px] text-inherit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.date('d',$key['date']).'</font></font></span></div>'; $disable='disabled';
					 }
					 else
					 {
						 $header=$header.'<div class="flex-grow basis-0 border-b-[1px] border-l-[1px] border-gray-200 bg-white text-center last-of-type:border-r-[1px] colIndex-'.$i.' text-gray-900"><span class="block pt-2 text-center text-sm capitalize text-inherit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.date('D',$key['date']).'</font></font></span><span class="relative mx-auto mb-1 block h-11 text-lg font-semibold !leading-[44px] text-inherit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.date('d',$key['date']).'</font></font><span class="absolute bottom-[2px] left-1/2 h-[6px] w-[6px] -translate-x-1/2 rounded-full bg-gray-900"></span></span></div>'; 
					 }
					
				 
						$weekDays=$weekDays.'<div class="flex-shrink flex-grow basis-0 border-l-[1px] border-b-[1px] border-gray-100 text-center last-of-type:border-r-[1px]">';
						
						     
									foreach($key['work_time_info'] as $key1)
									 {
										 
											 
										 
									$stmt = $dbCon->prepare("select work_time from working_hrs where id=?");
									/* bind parameters for markers */
									 
									$stmt->bind_param("i",$key1['id']);
									$stmt->execute();
									$result = $stmt->get_result();
									$row = $result->fetch_assoc();	 
									
									 
									$weekDays=$weekDays.'<span class="mx-1 my-[6px] flex h-auto cursor-pointer flex-col rounded-md border-[1px] border-solid text-center text-xs font-semibold !leading-9 md:m-2   border-green text-green hover:bg-green bg-green-100 hover:text-white" onclick="updateEmployeeTime('.$key['date'].','.$key1['id'].','.$key1['emp_id'].','.$key['timerequired'].');"><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$row['work_time'].'</font></font></span></span>
									
									';	 
									 }
								
								$weekDays=$weekDays.'</div>';
								
						 	 
			$i++;
			 }
		
			if(isset($_POST['w_width']))
			{
			if($_POST['w_width']>700)
					{
						$width=450;
					}
					else
					{
					$width=	$_POST['w_width']-50;
					}	
			}	
			else
			{
				$width=450;
			}
		
			 $dataAvailable='<div class="column_m bs_bb  ">
					
					<div style="position: relative;">
                                    <div class="calendar week-view">
									<p class="sticky !top-16 z-[100] m-0 flex flex-col items-center justify-center bg-white p-3 uppercase"><span class="font-semibold text-gray-900"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$startDate.' - '.$endDate.'</font></font></span><span class="text-xs text-gray-700"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Week 45</font></font></span></p>
                                         
                                        <div class="sticky !top-32 z-[100] bg-white shadow" style="height:76px;">
                                            <div class="slick-slider slick-calendar slick-initialized">
                                                <div class="slick-list">
                                                    <div class="slick-track" style="width: '.$width.'px; opacity: 1; transform: translate3d(0px, 0px, 0px);">
                                                        <div data-index="0" class="slick-slide slick-active slick-current" tabindex="-1" aria-hidden="false" style="outline: none; width: '.$width.'px;">
                                                            <div>
                                                                <div class="!flex w-full justify-between" tabindex="-1" style="width: 100%; display: inline-block;">
                                                                     '.$header.'
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            '.$earlier.'
                                        </div>
                                        <div class="hours sticky">
                                            <div class="flex w-full" style="min-height: 300px;">
                                               '.$weekDays.'
                                            </div>
                                        </div>
                                    </div>
                                </div>
					
					
					
				</div>';
				
				 
			$dbCon->close();
			return $dataAvailable;
			
			 
			
		}
	
		function selectedServiceImages($data)
		{
			$dbCon = AppModel::createConnection();
			$item_id= $this -> encrypt_decrypt('decrypt',$data['service_id']); 
			 
			$stmt = $dbCon->prepare("select * from dish_detail_photos where dish_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $item_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0; 
			while($row1 = $result->fetch_assoc())
			{
			 
			$image=$row1['dish_photo_path'];
			$value_a=file_get_contents("../estorecss/".$image.".txt"); $value_a=str_replace('"','',$value_a); $row1['dish_photo_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$image.'.jpg' );
			$row1['image_path1']=str_replace('../','https://www.qloudid.com/',$row1['dish_photo_path']);	
			array_push($org,$row1);	
			$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
		}
	
	
		 function updateInactiveServices($data)
		{
			
			$dbCon = AppModel::createConnection();
			$d=strtotime(date('Y-m-d'));
			$stmt = $dbCon->prepare("update dishes_detail_information set is_active=0 where open_event_date<? and recurring_event=0 and one_shared=2 and one_shared_type=1");
			$stmt->bind_param("s",$d);
			$stmt->execute();
			 
		 
			$stmt->close();
			$dbCon->close();  
			return 1;
			
		}
			
			
		
		
		 function getProfessionalBookingServices($data)
		{
			
			$dbCon = AppModel::createConnection();
			$professional_subcategory_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			//echo $professional_subcategory_id.' '.$company_id.' '.$domain_id; die;
			$stmt = $dbCon->prepare("select time_required,dish_image,company_name,dishes_detail_information.id,dish_name,dish_detail,dish_price,is_bookable,is_active,is_physical,one_shared,one_shared_type,recurring_event,open_event_date,open_total_person from dishes_detail_information left join companies on companies.id=dishes_detail_information.company_id where is_physical=2 and is_bookable=1 and is_active=1  and company_id=?    and dishes_detail_information.id in (select service_id from dish_marketplace_information where marketplace_id=? and is_published=1)");
			$stmt->bind_param("ii",$company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			 if($row['one_shared']==2 && $row['one_shared_type']==1 && $row['recurring_event']==0)
			 {
				 $d=strtotime(date('Y-m-d'));
				 if($row['open_event_date']<=$d)
					 continue;
				 else
				 {
					$stmt = $dbCon->prepare("select sum(dish_quantity) as total_booked from hotel_roomservice_item_ordered where dish_id=? and service_type=5");
					$stmt->bind_param("i",$row['id']);
					$stmt->execute();
					$result2 = $stmt->get_result();	
					$row2 = $result2->fetch_assoc();
					if($row2['total_booked']==$row['open_total_person'])
						continue;
				 }
			 }
			 
			 
			$filename="../estorecss/".$row['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['dish_image'].'.jpg' );  $imgs='../../../../'.$imgs; } else { $value_a="../../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../../html/usercontent/images/default-profile-pic.jpg"; }
			$imgs=str_replace('../../../../../','https://www.qloudid.com/',$imgs);
			$row['dish_image']=$imgs;
			
			array_push($org,$row);
			$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			$key_values = array_column($org, 'one_shared'); 
			array_multisort($key_values, SORT_ASC, $org);
			$j++;
			}
		 
			$stmt->close();
			$dbCon->close();  
			return $org;
			
		}
			
			
			
		function professionalSubCategoryDetailCityBased($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$whom_id=$this->encrypt_decrypt('decrypt',$data['whom_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$area_id=$this->encrypt_decrypt('decrypt',$data['city_id']);
			//echo $catg_id.' '.$whom_id.' '.$domain_id.' '.$area_id; die;
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where professional_category_id=? and id in (select subcategory_id from professional_service_subcategory_available  where availablity_type=?) and id in (select professional_subcategory_id from professional_marketplace_service_todos where marketplace_id=? and is_selected=1 and professional_category_id=?) and id in (select professional_subcategory_id from professional_company_selected_service_todos where company_id in(select company_id from professional_company_selected_areas where city_id=? and is_selected=1) and is_selected=1 and professional_category_id=?) ");
			$stmt->bind_param("iiiiii", $catg_id,$whom_id,$domain_id,$catg_id,$area_id,$catg_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			if($data['todo_id']=='T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09')
			{
			$stmt = $dbCon->prepare("select count(dishes_detail_information.id) as num from dishes_detail_information where is_physical=2 and is_bookable=1 and is_active=1 and professional_subcategory_id =?   and dishes_detail_information.id in (select service_id from dish_marketplace_information where marketplace_id=? and is_published=1)");
			$stmt->bind_param("ii",$rowCategory['id'],$domain_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();	
			if($row1['num']==0)
			{
				continue;
			}
			}	
			
			$filename="../estorecss/".$rowCategory['subcategory_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowCategory ['subcategory_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowCategory ['subcategory_image'].'.jpg' );  $imgs='../../../../'.$imgs; } else { $value_a="../../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../../html/usercontent/images/default-profile-pic.jpg"; }
			$rowCategory['subcategory_image']=str_replace('../../../../../','https://www.qloudid.com/',$imgs);
			
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
			
			
				
		function professionalCategoryDetailAreaBased($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$area_id=$this->encrypt_decrypt('decrypt',$data['area_id']);
			$stmt = $dbCon->prepare("select * from professional_service_category where id in(select professional_category_id from professional_marketplace_service_todos where marketplace_id=? and is_selected=1) and id in (select professional_category_id from professional_company_selected_service_todos where company_id in(select company_id from professional_company_selected_areas where area_id=? and is_selected=1) and is_selected=1)	order by category_completed desc");
			$stmt->bind_param("ii",$domain_id,$area_id);	
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}	
			
			
			function professionalCategoryDetailCityBased($data)
			{ 
		
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$whom_id=$this->encrypt_decrypt('decrypt',$data['whom_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$area_id=$this->encrypt_decrypt('decrypt',$data['city_id']);
			$md_id=$this->encrypt_decrypt('decrypt',$data['md_id']);
			 
			$stmt = $dbCon->prepare("select * from professional_service_category where id in(select professional_category_id from professional_marketplace_service_todos where marketplace_id=? and is_selected=1) and id in (select professional_category_id from professional_company_selected_service_todos where company_id in(select company_id from professional_company_selected_areas where city_id=? and is_selected=1 and company_id in (select company_id from cleaning_company_premium_account_request where selected_subscription>0 and domain_id=?)) and is_selected=1) and available_at_domain=?	order by category_completed desc");
			$stmt->bind_param("iiii",$domain_id,$area_id,$domain_id,$md_id);	
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
				if($rowCategory['id']==$data['catg_id'])
				{
					$rowCategory['is_selected']=1;
				}
				else
				{
					$rowCategory['is_selected']=0;
				}
				 
			if($data['todo_id']=='T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09')
			{
			$stmt = $dbCon->prepare("select count(dishes_detail_information.id) as num from dishes_detail_information where is_physical=2 and is_bookable=1 and is_active=1 and professional_subcategory_id in (select id from professional_service_subcategory where professional_category_id=? and id in (select subcategory_id from professional_service_subcategory_available  where availablity_type=?) and id in (select professional_subcategory_id from professional_marketplace_service_todos where marketplace_id=? and is_selected=1 and professional_category_id=?) and id in (select professional_subcategory_id from professional_company_selected_service_todos where company_id in(select company_id from professional_company_selected_areas where city_id=? and is_selected=1) and is_selected=1 and professional_category_id=?)) and dishes_detail_information.id in (select service_id from dish_marketplace_information where marketplace_id=? and is_published=1)");
			$stmt->bind_param("iiiiiii",$rowCategory['id'],$whom_id,$domain_id,$rowCategory['id'],$area_id,$rowCategory['id'],$domain_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();	
			if($row1['num']==0)
			{
				continue;
			}
			} 
				
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			$key_values = array_column($org, 'is_selected'); 
			array_multisort($key_values, SORT_DESC, $org);
			}
			 
				$stmt->close();
				$dbCon->close();
				return $org;	
			}	
			
			
		function professionalServiceWhomAvailable()
		{ 
		
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from professional_service_subcategory_whom_available");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
			
		function professionalSubCategoryDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$whom_id=$this->encrypt_decrypt('decrypt',$data['whom_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where professional_category_id=? and id in (select subcategory_id from professional_service_subcategory_available  where availablity_type=?) and id in (select professional_subcategory_id from professional_marketplace_service_todos where marketplace_id=? and is_selected=1 and professional_category_id=?)");
			$stmt->bind_param("iiii", $catg_id,$whom_id,$domain_id,$catg_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
			
			
	function selectedProfessionalCategoryDetail($data)
		{ 
		 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id not in(select professional_subcategory_id from professional_company_selected_service_todos where company_id=? and domain_id=?)");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row= $result->fetch_assoc())
			{
				
			$stmt = $dbCon->prepare("insert into professional_company_selected_service_todos ( domain_id,professional_category_id,professional_subcategory_id,company_id, created_on, modified_on) values (?,?, ?,?, now(), now())");
			$stmt->bind_param("iiii",$domain_id,$row['professional_category_id'],$row['id'],$company_id);
			$stmt->execute();
			 				
			}
			
			$stmt = $dbCon->prepare("select * from professional_service_category where id in (select professional_category_id from professional_company_selected_service_todos where company_id=? and is_selected=1 and domain_id=? and professional_category_id in(select professional_category_id from professional_marketplace_service_todos where marketplace_id=? and is_selected=1))");
			$stmt->bind_param("iii", $company_id,$domain_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
			
			
	function selectedProfessionalCategoryDetailInfo($data)
		{ 
		 
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$stmt = $dbCon->prepare("select * from professional_service_category where id =?");
			$stmt->bind_param("i", $catg_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCategory = $result->fetch_assoc();
			$rowCategory['md_id']=$this->encrypt_decrypt('encrypt',$rowCategory['available_at_domain']);
				$stmt->close();
				$dbCon->close();
				return $rowCategory;	
			}
	
	function selectedProfessionalCategoryAvailableLocation($data)
		{ 
		 
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$stmt = $dbCon->prepare("select * from professional_service_category_location where id in (select service_available from professional_service_category_available where category_id=?)");
			$stmt->bind_param("i", $catg_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
				array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
	
	
	function selectedProfessionalSubCategoryDetailInfo($data)
		{ 
		 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$catg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id =?");
			$stmt->bind_param("i", $catg_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCategory = $result->fetch_assoc();
				$stmt->close();
				$dbCon->close();
				return $rowCategory;	
			}
	function sendPricingLink($data)
	{
		$subject='Signup completed';
		$to      = $data['email'];
		$emailContent='<html xmlns="http://www.w3.org/1999/xhtml" style="background-color: rgb(240, 240, 240);"><head>
  <title>Reservation confirmed</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <style type="text/css">
    /* GT AMERICA */

    @font-face {
      font-display: fallback;
      font-family: "GT America Regular";
      font-weight: 400;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.ttf") format("truetype");
    }

    @font-face {
      font-display: fallback;
      font-family: "GT America Medium";
      font-weight: 600;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.ttf") format("truetype");
    }

    @font-face {
      font-display: fallback;
      font-family: "GT America Condensed Bold";
      font-weight: 700;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.ttf") format("truetype");
    }

    /* CLIENT-SPECIFIC RESET */

    body,
    table,
    td,
    a {
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }

    /* Prevent WebKit and Windows mobile changing default text sizes */

    table,
    td {
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }

    /* Remove spacing between tables in Outlook 2007 and up */

    img {
      -ms-interpolation-mode: bicubic;
    }

    /* Allow smoother rendering of resized image in Internet Explorer */

    .im {
      color: inherit !important;
    }

    /* DEVICE-SPECIFIC RESET */

    a[x-apple-data-detectors] {
      color: inherit !important;
      text-decoration: none !important;
      font-size: inherit !important;
      font-family: inherit !important;
      font-weight: inherit !important;
      line-height: inherit !important;
    }

    /* iOS BLUE LINKS */

    /* RESET */

    img {
      border: 0;
      height: auto;
      line-height: 100%;
      outline: none;
      text-decoration: none;
      display: block;
    }

    table {
      border-collapse: collapse;
    }

    table td {
      border-collapse: collapse;
      display: table-cell;
    }

    body {
      height: 100% !important;
      margin: 0 !important;
      padding: 0 !important;
      width: 100% !important;
    }

    /* BG COLORS */

    .mainTable {
      background-color: #F0F0F0;
    }

    .mainTable--hospitality {
      background-color: #f7f2ed;
    }

    html {
      background-color: #F0F0F0;
    }

    /* VARIABLES */

    .bg-white {
      background-color: white;
    }

    .hr {
      /* Cross-client horizontal rule. Adapted from https://litmus.com/community/discussions/4633-is-there-a-reliable-1px-horizontal-rule-method */
      background-color: #d3d3d8;
      border-collapse: collapse;
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
      mso-line-height-rule: exactly;
      line-height: 1px;
    }

    .textAlignLeft {
      text-align: left !important;
    }

    .textAlignRight {
      text-align: right !important;
    }

    .textAlignCenter {
      text-align: center !important;
    }

    .mt1 {
      margin-top: 6px;
    }

    .list {
      padding-left: 18px;
      margin: 0;
    }

    /* TYPOGRAPHY */

    body {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      color: #4f4f65;
      -webkit-font-smoothing: antialiased;
      -ms-text-size-adjust: 100%;
      -moz-osx-font-smoothing: grayscale;
      font-smoothing: always;
      text-rendering: optimizeLegibility;
    }

    .h1 {
      font-family: "GT America Condensed Bold", "Roboto Condensed", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 700;
      vertical-align: middle;
      font-size: 36px;
      line-height: 42px;
    }

    .h2 {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 600;
      vertical-align: middle;
      font-size: 16px;
      line-height: 24px;
    }

    .text {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 16px;
      line-height: 21px;
    }

    .text-list {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 16px;
      line-height: 25px;
    }

    .textSmall {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 14px;
    }

    .text-xsmall {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-size: 11px;
      text-transform: uppercase;
      line-height: 22px;
      letter-spacing: 1px;
    }

    .text-bold {
      font-weight: 600;
    }

    .text-link {
      text-decoration: underline;
    }

    .text-linkNoUnderline {
      text-decoration: none;
    }

    .text-strike {
      text-decoration: line-through;
    }

    /* FONT COLORS */

    .textColorDark {
      color: #23233e;
    }

    .textColorNormal {
      color: #4f4f65;
    }

    .textColorBlue {
      color: #2020c0;
    }

    .textColorGrayDark {
      color: #7B7B8B;
    }

    .textColorGray {
      color: #A5A8AD;
    }

    .textColorWhite {
      color: #FFFFFF;
    }

    .textColorRed {
      color: #df3232;
    }

    /* BUTTON */

    .Button-primary-wrapper {
      border-radius: 3px;
      background-color: #2020C0;
    }

    .Button-primary {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      border-radius: 3px;
      border: 1px solid #2020C0;
      color: #ffffff;
      display: block;
      font-size: 16px;
      font-weight: 600;
      padding: 18px;
      text-decoration: none;
    }

    .Button-secondary-wrapper {
      border-radius: 3px;
      background-color: #ffffff;
    }

    .Button-secondary {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      border-radius: 3px;
      border: 1px solid #2020C0;
      color: #2020C0;
      display: block;
      font-size: 16px;
      font-weight: 600;
      padding: 18px;
      text-decoration: none;
    }

    /* LAYOUT */

    .Content-container {
      padding-left: 60px;
      padding-right: 60px;
    }

    .Content-container--main {
      padding-top: 54px;
      padding-bottom: 60px;
    }

    .Content {
      width: 580px;
      margin: 0 auto;
    }

    .wrapper {
      max-width: 600px;
    }

    .section {
      padding: 24px 0px;
      border-bottom: 1px solid #d3d3d8;
    }

    .section--noBorder {
      padding: 24px 0px 0;
    }

    .section--last {
      padding: 24px 0px;
    }

    .message {
      background-color: #F4F4F5;
      padding: 18px;
    }

    .card {
      border: 1px solid #d3d3d8;
      padding: 18px;
    }

    /* HEADER */

    .header-tockLogoImage {
      display: block;
      color: #F0F0F0;
    }

    .header-heroImage {
      padding-bottom: 24px;
    }

    /* PREHEADER */

    .preheader {
      display: none;
      font-size: 1px;
      color: #FFFFFF;
      line-height: 1px;
      max-height: 0px;
      max-width: 0px;
      opacity: 0;
      overflow: hidden;
    }

    /* BANNER */

    .notice {
      padding: 12px;
      background: #23233E;
      color: #FFFFFF;
      display: block;
      font-size: 14px;
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 600;
    }

    /* INTRO */

    .section--intro {
      padding-bottom: 48px;
    }

    /* BOOKING INFO */

    .business-logo__container {
      width: 48px;
      height: 48px;
      border-radius: 3px;
      border: 1px solid #d3d3d8;
      overflow: hidden;
    }

    .business-logo__image {
      border: 1px solid transparent;
      border-radius: 3px;
      width: 48px;
      height: 48px;
      display: block;
    }

    .business-address--address {
      width: 50%;
    }

    .business-address--map {
      width: 50%;
    }

    .business-address--map-image {
      width: 100%;
    }

    /* MOBILE TICKETS */

    .mobile-ticket--description {
      width: 65%;
      margin-top: 12px;
      margin-right: 5%;
    }

    .mobile-ticket--code {
      width: 30%;
    }

    .mobile-ticket--code-image {
      width: 100%;
    }

    /* RESERVATION ACTIONS */

    .linksTable {
      border-bottom: 1px solid #d3d3d8;
    }

    .linksTableRow {
      padding: 24px 12px;
    }

    .actions-icon {
      vertical-align: middle;
    }

    .actions-text {
      vertical-align: middle;
    }

    /* RECEIPT */

    .receipt__container {
      border: 1px solid #d3d3d8;
      padding: 24px;
    }

    .receipt__row {
      border-top: 1px solid #d3d3d8;
    }

    /* FEEDBACK ICONS */

    .feedback-link {
      border: 1px solid #d4d5da;
      border-radius: 3px;
      display: inline-block;
      width: calc(32% - 2px);
      padding: 10px 0;
    }

    .feedback-link-bumper {
      display: inline-block;
      width: 1%;
    }

    .feedback-link img {
      height: 50px;
      width: 50px;
    }

    /* SOCIAL ICONS */

    .social-link {
      display: inline-block;
      width: auto;
    }

    .social-link-text {
      padding: 14px 24px 14px 14px;
    }

    /* TABLET STYLES */

    @media screen and (max-width: 648px) {
      /* DEVICE-SPECIFIC RESET */
      div[style*="margin: 16px 0;"] {
        margin: 0 !important;
      }
      /* ANDROID CENTER FIX */
      /* LAYOUT */
      .wrapper {
        width: 100% !important;
        max-width: 100% !important;
      }
      .Content {
        width: 90% !important;
      }
      .Content-container {
        padding-left: 36px !important;
        padding-right: 36px !important;
      }
      .Content-container--main {
        padding-top: 30px !important;
        padding-bottom: 42px !important;
      }
      .responsiveTable {
        width: 100% !important;
      }
      /* RESERVATION ACTIONS */
      .linksTableRow {
        padding-left: 0 !important;
        padding-right: 0 !important;
        padding-top: 12px !important;
        padding-bottom: 12px !important;
      }
      .linksTableRow--borderRight {
        border-right: none !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
      }
      /* FEEDBACK LINK */
      .feedback-link img {
        height: 38px !important;
        width: 38px !important;
      }
    }

    /* MOBILE STYLES */

    @media screen and (max-width: 480px) {
      /* TYPOGRAPHY */
      .h1 {
        font-size: 30px !important;
        line-height: 30px !important;
      }
      .text {
        font-size: 16px !important;
        line-height: 22px !important;
      }
      /* BUTTON */
      .mobile-buttonContainer {
        width: 100% !important;
      }
      /* LAYOUT */
      .Content {
        width: 100% !important;
      }
      .Content-container {
        padding-left: 18px !important;
        padding-right: 18px !important;
      }
      .Content-container--main {
        padding-top: 24px !important;
        padding-bottom: 30px !important;
      }
      .section {
        padding: 18px 0 !important;
      }
      .section--last {
        padding: 18px 0 !important;
      }
      .header {
        padding: 0 18px !important;
      }
      .business-address--address {
        width: 100% !important;
      }
      .business-address--map {
        margin-top: 30px !important;
        width: 100% !important;
      }
      .mobile-ticket--description {
        width: 100% !important;
        margin-top: 0px !important;
      }
      .mobile-ticket--code {
        margin-top: 30px !important;
        margin-left: 0;
        width: 100% !important;
      }
      /* RECEIPT */
      .receipt__container {
        padding: 12px !important;
      }
      /* SOCIAL ICONS */
      .social-link {
        display: block !important;
        width: 100% !important;
        border-bottom: 1px solid #d3d3d8 !important;
      }
      /* INTRO */
      .section--intro {
        padding-top: 18px !important;
        padding-bottom: 18px !important;
      }
    }
  </style>
</head>

<body style="margin: 0 !important; padding: 0 !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; height: 100%; margin: 0; padding: 0; width: 100%; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; color: rgb(79, 79, 101); -webkit-font-smoothing: antialiased; -ms-text-size-adjust: 100%; -moz-osx-font-smoothing: grayscale; font-smoothing: always; text-rendering: optimizeLegibility;">
   
  <!--[if mso]>
    <style type="text/css">
.h1 {font-family: "Helvetica", "Arial", sans-serif !important; font-weight: 700 !important; vertical-align: middle !important; font-size: 36px !important; mso-line-height-rule: exactly;line-height: 42px !important;}
.h2 {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 600 !important;vertical-align: middle !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 24px !important;}
.text {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 21px !important;}
.text-list {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 25px !important;}
.textSmall {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 14px !important;}
.text-xsmall {font-family: "Helvetica", "Arial", sans-serif !important;font-size: 11px !important;text-transform: uppercase !important;mso-line-height-rule: exactly;line-height: 22px !important;letter-spacing: 1px !important;}
.text-bold {font-weight: 600 !important;}
.text-link {text-decoration: underline !important;}
.text-linkNoUnderline {text-decoration: none !important;}
.text-strike {text-decoration: line-through !important;}
.textColorDark {color: #23233e !important;}
.textColorNormal {color: #4f4f65 !important;}
.textColorBlue {color: #2020c0 !important;}
.textColorGray {color: #A5A8AD !important;}
.textColorWhite {color: #FFFFFF !important;}
.Button-primary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #ffffff !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
.Button-secondary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #2020C0 !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
    </style>
    <![endif]-->
  <!-- HIDDEN PREHEADER TEXT -->
  <div class="preheader" style="display: none; font-size: 1px; color: rgb(255, 255, 255); line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
  </div>
  <table border="0" cellpadding="0" cellspacing="0" width="100%" class=" mainTable  " style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: rgb(240, 240, 240);">
    <tbody>
<tr>
<td style="display:none !important;
 visibility:hidden;
 mso-hide:all;
 font-size:1px;
 color:#ffffff;
 line-height:1px;
 max-height:0px;
 max-width:0px;
 opacity:0;
 overflow:hidden; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> We are thrilled that you will be joining us. If yo... </td>
    <!-- HEADER -->
    </tr>
<tr>
      <td align="center" class="header" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
        <!--[if (gte mso 9)|(IE)]>
    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
    <tr>
    <td align="center" valign="top" width="600">
    <![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 580px; margin: 0 auto;">
          <tbody>
<tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <h1 style="font-size: 33px;font-weight: 800;line-height: 30px;">Qloud ID</h1>               </td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
        </tbody>
</table>
        <!--[if (gte mso 9)|(IE)]>
    </td>
    </tr>
    </table>
    <![endif]-->
      </td>
    </tr>
    <!-- CONTENT -->
    <tr>
      <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
        <!--[if (gte mso 9)|(IE)]>
    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
    <tr>
    <td align="center" valign="top" width="600">
    <![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content bg-white" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: white; width: 580px; margin: 0 auto;">
          <tbody>
<tr>
            <td class="Content-container Content-container--main text textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101); padding-left: 60px; padding-right: 60px; padding-top: 54px; padding-bottom: 60px;">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                <!-- RESTAURANT INFO -->
                <tbody>
<tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>

                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
                <!-- INTRO -->
                <tr>
                  <td valign="top" align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
<tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">Signup Completed</span>                          </td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                          <!--[if gte mso 15]>&nbsp;<![endif]-->
                        </td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
                <!-- MESSAGE -->
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="message" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
                    <div class="text textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                      <span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">A message from Qloud ID</span>
                      <br> We are thrilled that you will be joining us. If you would like to hear from you, please do not hesitate to reach out. Restore your account and start using Qloud ID
                    </div>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                    <!--[if gte mso 15]>&nbsp;<![endif]-->
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- BOOKING INFO -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>

                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody>
<tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="https://www.qloudid.com/public/index.php/UserCompanySignUp/completeProfile/'.$data['cid'].'" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;">Complete profile</a>                                </td>
                            </tr>
                          </tbody>
</table>
                        </td>
                      </tr>
					  
					  <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
					  
					  
					  
                    </tbody>
</table>
                  </td>
                </tr>
                <!-- ADDRESS -->
                <tr>
                  <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>

                      
                      
                      
                      
                      <tr>
                        <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          
                        </td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                    <!--[if gte mso 15]>&nbsp;<![endif]-->
                  </td>
                </tr>
                
                
                <!-- RECEIPT -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" width="100%" cellpadding="0" cellspacing="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      
</table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- EDIT RECEIPT -->
                <!-- CANCELLATION POLICY -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
<tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; font-weight: 600; color: rgb(35, 35, 62);">Add pricing</div>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                            <span>You are almost there. To start charging the home repair task please add pricing on your available services. Please click on above link to start the process.</span>
                            <span></span>
                          </div>
                        </td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- QUESTIONS -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
<tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; font-weight: 600; color: rgb(35, 35, 62);">
                            Questions?
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                            If you have questions about your reservation, contact us at&nbsp;
                            <a></a>                            or by calling
                            <a>+46 762072193</a>.
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
      </td>
    </tr>
    <!-- FOOTER -->
    <tr>
      <td align="center" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; width: 580px; margin: 0 auto;">
        <!-- Will most likely required a feature flag -->
        <!--[if (gte mso 9)|(IE)]>
<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
<tr>
<td align="center" valign="top" width="600">
<![endif]-->
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="Content-container" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
          <tbody>
<tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <a href="https://www.exploretock.com" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;"> <img src="https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png" width="30" height="30" alt="Tock" border="0" style="-ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; display: block;"> </a>              </td>
          </tr>
          <tr class="spacer">
            <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
              <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                © 2019 Tock, Inc.
              </div>
              <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                All Rights Reserved
              </div>
            </td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
        </tbody>
</table>
        <!--[if (gte mso 9)|(IE)]>
</td>
</tr>
</table>
<![endif]-->
      </td>
    </tr>
  </tbody>
</table>
</body></html>';
			try {
				 sendEmail($subject, $to, $emailContent);
						}

					catch(Exception $e) {
						$to      = 'kowaken.ghirmai@gmail.com';
						sendEmail($subject, $to, $emailContent);
					   
					}
	}

		function dayDetail()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select *  from day_detail");
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
		function workingHrs()
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select * from working_hrs");
			
			/* bind parameters for markers */
			 
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
		
		function bookableServiceCategories($data)
		{
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$stmt = $dbCon->prepare("select * from bookable_service_categories where professional_category=?");
			$stmt->bind_param("i", $catg_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		function selectedProfessionalCategoryServicesDetail($data)
		{ 
		 	$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select professional_company_selected_service_todos.id,professional_subcategory_id,subcategory_name from professional_company_selected_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_company_selected_service_todos.professional_subcategory_id where professional_company_selected_service_todos.professional_category_id=? and company_id=? and domain_id=? and is_selected=1 and professional_subcategory_id in (select professional_subcategory_id from professional_marketplace_service_todos where marketplace_id=? and is_selected=1)");
			$stmt->bind_param("iiii",$catg_id, $company_id,$domain_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select * from professional_company_selected_service_todos_price_info where professional_subcategory_id=?");
			$stmt->bind_param("i", $rowCategory['professional_subcategory_id']);
			$stmt->execute();
			$resultPrice = $stmt->get_result();
			$rowPrice = $resultPrice->fetch_assoc();
			if(empty($rowPrice))
			{
				$rowCategory['is_priced']=0;
			}
			else
			{
				$rowCategory['is_priced']=1;
				$rowCategory['dish_price']=$rowPrice['dish_price'];
			}
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['professional_subcategory_id']);
			array_push($org,$rowCategory);
			}
			
			//print_r($org); die;
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
		function checkCid()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select company_email from companies where company_email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['company_email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("select company_id from company_profiles where cid=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['cid']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$stmt->close();
				$dbCon->close();
				return 1;
				
			}
			else
			{
				$stmt = $dbCon->prepare("select country_id from companies where id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['company_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_country = $result->fetch_assoc();
				if($row_country['country_id']==$_POST['country'])
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
		}
		else
		{
		$stmt->close();
		$dbCon->close();
		return 2;	
		}
		}
		
		function addCompanyBuilding()
		{
			$dbCon = AppModel::createConnection();
			$data=array();
			
			$stmt = $dbCon->prepare("select id from user_logins where email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$rf=0;	
			$st=1;
			$data['random_hash'] = substr(md5(uniqid(rand(), true)), 16, 16);
			$stmt = $dbCon->prepare("INSERT INTO user_logins (first_name,last_name,registered_from,get_started_wizard_status,email,  email_verification_code , created_on , modified_on, country_of_residence,verification_status ) VALUES (?, ?, ?, ?,   ?, ?, now(), now(), ?, ?)");
			$stmt->bind_param("ssiissii", $_POST['fname'], $_POST['lname'],$st,$st,$_POST['email'], $data['random_hash'], $_POST['country'],$rf);
			$stmt->execute();
			$data['user_id']=$stmt->insert_id;
			}
			else
			{
				$data['user_id']=$row['id'];
			}
			if($data['user_id']==43)
			{
				$data['admin_id']=$data['user_id'];
				$user_admin=1;
			}
			else
			{
				$data['admin_id']=43;
				$user_admin=0;
			}
			
			 
			$_POST['adrs1']=$_POST['daddress'];
			$_POST['port_number']=$_POST['d_port_number'];
			$name=htmlentities($_POST['company_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$street_address=htmlentities($_POST['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
			$city=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("select country_code,country_name from country where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_country = $result->fetch_assoc();
			$email=$_POST['company_email'];
			$_POST['position_type']=1;
			$web='';
			$st=1;
			$added_on_place=2;
			$stmt = $dbCon->prepare("insert into companies(company_type,o_type,country_id,user_login_id,company_name,company_email,website,hash_code,created_date,email_verification_status,created_by,user_role,is_landloard_signup,added_on_place) 
			values(?, ?, ?, ?, ?, ?, ?, ?, now(), ?, ?, ?,?,?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiiissssiiiii", $_POST['company_type'],$st, $_POST['country'], $data['admin_id'], $name, $email, $web, $hash_code,$st,$data['user_id'],$_POST['position_type'],$st,$added_on_place);
			
			
			if (!$stmt->execute()) {
				$stmt->close();
				$dbCon->close();
				return 0;
			} 
			else 
			{
				$id=$stmt->insert_id;
				
				if($_POST['company_type']==2)
				{
					$_POST['phone_number']=$_POST['pnumber'];
					$description='';
					$_POST['entry_type']=0;
					$entry_code='';
					$stmt = $dbCon->prepare("insert into landloard_society (company_id, society_name,created_on,street_address,port_number,zipcode,city,country_id,phone_country_id,phone_number,email,description,entry_type,entry_code,wifi_available,wifi_username,wifi_password) values (?, ?, now(),?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
					$stmt->bind_param("isssssiisssisiss", $id,$name,$street_address,$_POST['d_port_number'],$_POST['dzip'],$city,$_POST['country'],$_POST['country'],$_POST['phone_number'],$email,$description,$_POST['entry_type'],$entry_code,$_POST['entry_type'],$entry_code,$entry_code);
					$stmt->execute();	
					$communityid=$stmt->insert_id;
					
					
					$stmt = $dbCon->prepare("select *  from community_aminity_info");
					$stmt->execute();
					$result = $stmt->get_result();
					while($rowAvailable = $result->fetch_assoc())
					{
					$stmt = $dbCon->prepare("INSERT INTO community_aminity_detail (society_id, amenity_id) VALUES (?, ?)");
					$stmt->bind_param("ii", $communityid,$rowAvailable['id']);
					$stmt->execute();	
					}
					
					
					$select1="select * from community_rules";
			  
					$result1=mysqli_query($dbCon, $select1); 
				 
					 while($row1=mysqli_fetch_array($result1))  
					 { 
						
						$stmt = $dbCon->prepare("insert into `landloard_society_rules`(society_id,rule_id) values (?,?)");
						/* bind parameters for markers */
						$stmt->bind_param("ii",$communityid,$row1['id']);
						$stmt->execute();
						$id1=$stmt->insert_id;
						
						$select2="select * from community_sub_rules where rule_id=".$row1['id'];
			  
						$result2=mysqli_query($dbCon, $select2); 
					 
						 while($row2=mysqli_fetch_array($result2))  
						 { 
							
						$stmt = $dbCon->prepare("insert into `landloard_society_subrules`(society_rule_id,subrule_id) values (?,?)");
						/* bind parameters for markers */
						$stmt->bind_param("ii",$id1,$row2['id']);
						$stmt->execute();	 
							
						 }
						
					 }
				}					
			
			$address=$_POST['daddress'].' '.$_POST['d_port_number'];
  
			$url = "http://api.locationiq.com/v1/autocomplete.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&q=".$address;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			if(isset($response['error']))
			{
			$address=$_POST['dcity'].' '.$_POST['d_port_number'];	
			$url = "http://api.locationiq.com/v1/autocomplete.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&q=".$address;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			}
			$_POST['phone_number']=$_POST['pnumber'];
		$street_address=	htmlentities($_POST['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
				$stmt = $dbCon->prepare("insert into company_profiles(latitude,longitude,`company_id`,address,cid,created_on,modified_on,port_number,phone) values(?,?,?, ?, ?,now(),now(),?,?)");
				
				$stmt->bind_param("ssissss", $response[0]['lat'],$response[0]['lon'],$id, $street_address,$_POST['cid'],$_POST['d_port_number'],$_POST['phone_number']);
				$stmt->execute();
				
				
				$stmt = $dbCon->prepare("insert into user_company_profile(`company_id`,`user_login_id`) values(?, ?)");
				
				$stmt->bind_param("ii", $id, $data['admin_id']);
				$stmt->execute();
				$data['location']='Headquarter';
				$stmt = $dbCon->prepare("insert into location (company_id,country_id,location,created_on) values (?, ?, ?, now())");
				
				$stmt->bind_param("iis", $id, $_POST['country'],  $data['location']);
				$stmt->execute();
				$locationrow = $stmt->insert_id;
				
				$stmt        = $dbCon->prepare("insert into warehouse(`company_id`,`location_id`,`created_on`) values (?, ?, now())");
				
				$stmt->bind_param("ii", $id, $locationrow);
				$stmt->execute();
				$stmt->close();
				
				$stmt = $dbCon->prepare("select first_name,last_name,email,email_verification_code from user_logins where id=?");
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result  = $stmt->get_result();
				$userrow = $result->fetch_assoc();
				
				$stmt       = $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`,`created_by`) values(?, ?, ?, ?, ?, ?, ?, ?)");
				$status_emp = 0;
				$stmt->bind_param("ississii", $id, $userrow['first_name'], $userrow['last_name'], $status_emp, $userrow['email_verification_code'], $userrow['email'], $data['user_id'], $data['user_id']);
				$stmt->execute();
				$admin=$stmt->insert_id;
				if($user_admin==0)
				{
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
				}
				else
				{
					$stmt = $dbCon->prepare("insert into manage_employee_permissions (is_admin, employee_id, permission, user_id, company_id, page_id, created_date, modified_date ) values(?, ?, ?, ?, ?, ?, now(),now())");
					$cont=1;
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
				$_POST['property_id']=1;
				$_POST['is_headquarter']=1;
				$stmt = $dbCon->prepare("INSERT INTO property_location (latitude,longitude,company_id,property_id,visiting_address,created_on, is_headquarter,port_number,added_on_place) VALUES (?,?, ?, ?, ?, now(), ?, ?,?)");
				$stmt->bind_param("ssiisisi",$response[0]['lat'],$response[0]['lon'], $id,$_POST['property_id'],$street_address, $_POST['is_headquarter'],$_POST['d_port_number'],$added_on_place);
				$stmt->execute();
				$property_id=$stmt->insert_id;
				$_POST['same_invoice']=1;
					$_POST['iaddress']=$_POST['daddress'];
					 $_POST['icity']=$_POST['dcity'];
					 $_POST['izip']=$_POST['dzip'];
					 $_POST['i_port_number']=$_POST['d_port_number'];
				$stmt=$dbCon->prepare("update company_profiles set si_address=?,si_city=?,si_zip=?,sd_address=?,sd_city=?,sd_zip=?,d_port_number=?,i_port_number=?,is_invoice_same=?   where company_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssssssssii", $_POST['iaddress'],$_POST['icity'],$_POST['izip'],$_POST['daddress'],$_POST['dcity'],$_POST['dzip'],$_POST['d_port_number'],$_POST['i_port_number'],$_POST['same_invoice'],$id);
				$stmt->execute();
				
				
				$stmt = $dbCon->prepare("update property_location set street_name_i=?, city_i=?, postal_code_i=?, street_name_v=?, city_v=?, postal_code_v=?, d_port_number=?,i_port_number=?,is_invoice_same=?,country_v=?,country_i=?    where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssssssssissi", $_POST['iaddress'],$_POST['icity'],$_POST['izip'],$_POST['daddress'],$_POST['dcity'],$_POST['dzip'],$_POST['d_port_number'],$_POST['i_port_number'],$_POST['same_invoice'],$row_country['country_name'],$row_country['country_name'],$property_id);
				$stmt->execute();
				$_POST['building_type']=1;
				$_POST['amenities_available']=1;
				$_POST['tenant_available']=1;
				$_POST['pricing_available']=1;
				$_POST['invoice_available']=1;
				$_POST['basement_available']=1;
				$_POST['penthouse_available']=1;
				$_POST['garage_available']=1;
				$_POST['vitech_region_id']=1;
				$_POST['vitech_city_id']=1;
				$_POST['vitech_area_id']=1;
				$company_id=$id;
				$street=htmlentities($_POST['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
				$city=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
				$stmt = $dbCon->prepare("insert into landloard_buildings (building_type,amenities_available,tenant_available,pricing_available,invoice_available,country_id,block_number,basement_available,penthouse_available,garage_available,vitech_region,vitech_city,vitech_area,company_id, building_name,street_address,city, state,latitude,longitude,total_ports,zipcode) values (?,?,?,?,?,?, ?,?, ?, ?,?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$stmt->bind_param("iiiiiisiiiiiiissssssis",$_POST['building_type'],$_POST['amenities_available'],$_POST['tenant_available'],$_POST['pricing_available'],$_POST['invoice_available'],$_POST['country'],$_POST['d_port_number'],$_POST['basement_available'],$_POST['penthouse_available'],$_POST['garage_available'],$_POST['vitech_region_id'],$_POST['vitech_city_id'],$_POST['vitech_area_id'], $company_id,$name,$street,$city,$response['address']['state'],$response[0]['lat'],$response[0]['lon'],$_POST['tports'],$_POST['dzip']);
				$stmt->execute();	
				$id=$stmt->insert_id;
			for($i=1;$i<=$_POST['tports'];$i++)
			{
			$elevator=1;
			$stmt = $dbCon->prepare("insert into landloard_building_ports (buildingid, port_number,total_floors,elevator_available) values (?, ?, ?, ?)");
			$stmt->bind_param("isii", $id,$i,$_POST['tfloors'],$elevator);
			$stmt->execute();	
			$id1=$stmt->insert_id;	
			for($j=1; $j<=$_POST['tfloors'];$j++)
			{
			$stmt = $dbCon->prepare("insert into landloard_building_port_floors(port_id, floor_number) values (?, ?)");
			$stmt->bind_param("ii", $id1,$j);
			$stmt->execute();	
			}
			
			}
			
			$stmt = $dbCon->prepare("select min(id) as port_id  from landloard_building_ports where buildingid=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();	
			$rowPort = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select *  from lanloard_building_amenity_info");
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowAvailable = $result->fetch_assoc())
			{
			if($rowAvailable['multi_port_available']==1)
			{
			$port_id=$rowPort['port_id'].',';
			}
			else
			{
			$port_id=$rowPort['port_id'];
			}
			$stmt = $dbCon->prepare("INSERT INTO landloard_building_amenities (building_id, amenity_id,port_id) VALUES (?, ?, ?)");
			$stmt->bind_param("iis", $id,$rowAvailable['id'],$port_id);
			$stmt->execute();	
			}
				
				
				
				$fields=array();
				
				$fields=$_POST;
				$fields['country_name']=$row_country['country_name'];
				$fields['property_id_qloud']=$property_id;
				$fields['company_email']=$email;
				$fields['web']='www.qloudid.com';
				$fields['user_email']=$userrow['email'];
				$fields['is_admin']=$user_admin;
				$fields['hash_code']=$hash_code;
				$url='https://www.qmatchup.com/beta/company/index.php/UpdateUserCompany/addCompany';
				
				$fields_POST=array();
				$fields_POST['posted']= $this -> encrypt_decrypt('encrypt',serialize($fields));
				
				$ch = curl_init();
			//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch,CURLOPT_URL, $url);
			curl_setopt($ch,CURLOPT_POST, count($fields_POST));
			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_POST);
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
			return $this->encrypt_decrypt('encrypt',$id);
			
		}
		
		function addUserDetails($data)
		{
			$dbCon = AppModel::createConnection();
			$domain_id= $this -> encrypt_decrypt('decrypt',$data['domain_id']);
			if(isset($_POST['came_from']))
			{
				$came_from=$_POST['came_from'];
			}
			else
			{
				$came_from=7;
			}
			$stmt = $dbCon->prepare("select id,country_of_residence from user_logins where email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$rf=0;	
			$st=1;
			$data['random_hash'] = substr(md5(uniqid(rand(), true)), 16, 16);
			$stmt = $dbCon->prepare("INSERT INTO user_logins (first_name,last_name,registered_from,get_started_wizard_status,email,  email_verification_code , created_on , modified_on, country_of_residence,verification_status,user_came_from,domain_id ) VALUES (?, ?, ?, ?,   ?, ?, now(), now(), ?, ?,?,?)");
			$stmt->bind_param("ssiissiiii", $_POST['fname'], $_POST['lname'],$st,$st,$_POST['email'], $data['random_hash'], $_POST['country'],$rf,$came_from,$domain_id);
			$stmt->execute();
			$data['user_id']=$stmt->insert_id;
			}
			
			$stmt->close();
			$dbCon->close();
			return $data['user_id'];
			
		}
	
	
	function addUserSellingCompany($data)
		{
			$dbCon = AppModel::createConnection();
			$domain_id= $this -> encrypt_decrypt('decrypt',$data['domain_id']);
			 
			if($data['user_id']==43)
			{
				$data['admin_id']=$data['user_id'];
				$user_admin=1;
			}
			else
			{
				$data['admin_id']=43;
				$user_admin=0;
			}
			
			$stmt = $dbCon->prepare("select country_of_residence from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$_POST['country']=$row['country_of_residence'];
			$stmt = $dbCon->prepare("select company_id,company_email from companies left join company_profiles on company_profiles.company_id=companies.id where cid=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['cid']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCompany = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("select country_code,country_name from phone_country_code where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_country = $result->fetch_assoc();
			 
			
			 if(empty($rowCompany))
			 {
			$_POST['company_email']=$_POST['cid'].'.'.$row_country['country_code'].'@qloudid.com';
			$email=$_POST['company_email'];
			$_POST['adrs1']=$_POST['daddress'];
			$_POST['port_number']=$_POST['d_port_number'];
			$name=htmlentities($_POST['company_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$street_address=htmlentities($_POST['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
			$city=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
			
			
			$_POST['position_type']=1;
			$web='';
			$st=1;
			$stmt = $dbCon->prepare("insert into companies(company_type,o_type,country_id,user_login_id,company_name,company_email,website,hash_code,created_date,email_verification_status,created_by,user_role,is_landloard_signup,domain_id) 
			values(?, ?, ?, ?, ?, ?, ?, ?, now(), ?, ?, ?,?,?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiiissssiiiii", $_POST['company_type'],$st, $_POST['country'], $data['admin_id'], $name, $email, $web, $hash_code,$st,$data['user_id'],$_POST['position_type'],$st,$domain_id);
			
			
			if (!$stmt->execute()) {
				$stmt->close();
				$dbCon->close();
				return 0;
			} 
			else 
			{
				$id=$stmt->insert_id;
				
				if($_POST['company_type']==2)
				{
					$_POST['phone_number']=$_POST['pnumber'];
					$description='';
					$_POST['entry_type']=0;
					$entry_code='';
					$stmt = $dbCon->prepare("insert into landloard_society (company_id, society_name,created_on,street_address,port_number,zipcode,city,country_id,phone_country_id,phone_number,email,description,entry_type,entry_code,wifi_available,wifi_username,wifi_password) values (?, ?, now(),?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
					$stmt->bind_param("isssssiisssisiss", $id,$name,$street_address,$_POST['d_port_number'],$_POST['dzip'],$city,$_POST['country'],$_POST['country'],$_POST['phone_number'],$email,$description,$_POST['entry_type'],$entry_code,$_POST['entry_type'],$entry_code,$entry_code);
					$stmt->execute();	
					$communityid=$stmt->insert_id;
					
					
					$stmt = $dbCon->prepare("select *  from community_aminity_info");
					$stmt->execute();
					$result = $stmt->get_result();
					while($rowAvailable = $result->fetch_assoc())
					{
					$stmt = $dbCon->prepare("INSERT INTO community_aminity_detail (society_id, amenity_id) VALUES (?, ?)");
					$stmt->bind_param("ii", $communityid,$rowAvailable['id']);
					$stmt->execute();	
					}
					
					
					$select1="select * from community_rules";
			  
					$result1=mysqli_query($dbCon, $select1); 
				 
					 while($row1=mysqli_fetch_array($result1))  
					 { 
						
						$stmt = $dbCon->prepare("insert into `landloard_society_rules`(society_id,rule_id) values (?,?)");
						/* bind parameters for markers */
						$stmt->bind_param("ii",$communityid,$row1['id']);
						$stmt->execute();
						$id1=$stmt->insert_id;
						
						$select2="select * from community_sub_rules where rule_id=".$row1['id'];
			  
						$result2=mysqli_query($dbCon, $select2); 
					 
						 while($row2=mysqli_fetch_array($result2))  
						 { 
							
						$stmt = $dbCon->prepare("insert into `landloard_society_subrules`(society_rule_id,subrule_id) values (?,?)");
						/* bind parameters for markers */
						$stmt->bind_param("ii",$id1,$row2['id']);
						$stmt->execute();	 
							
						 }
						
					 }
				}					
			
			$address=$_POST['daddress'].' '.$_POST['d_port_number'];
  
			$url = "http://api.locationiq.com/v1/autocomplete.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&q=".$address;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			if(isset($response['error']))
			{
			$address=$_POST['dcity'].' '.$_POST['d_port_number'];	
			$url = "http://api.locationiq.com/v1/autocomplete.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&q=".$address;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			}
			$_POST['phone_number']=$_POST['pnumber'];
		$street_address=	htmlentities($_POST['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
				$stmt = $dbCon->prepare("insert into company_profiles(latitude,longitude,`company_id`,address,cid,created_on,modified_on,port_number,phone) values(?,?,?, ?, ?,now(),now(),?,?)");
				
				$stmt->bind_param("ssissss", $response[0]['lat'],$response[0]['lon'],$id, $street_address,$_POST['cid'],$_POST['d_port_number'],$_POST['phone_number']);
				$stmt->execute();
				
				
				$stmt = $dbCon->prepare("insert into user_company_profile(`company_id`,`user_login_id`) values(?, ?)");
				
				$stmt->bind_param("ii", $id, $data['admin_id']);
				$stmt->execute();
				$data['location']='Headquarter';
				$stmt = $dbCon->prepare("insert into location (company_id,country_id,location,created_on) values (?, ?, ?, now())");
				
				$stmt->bind_param("iis", $id, $_POST['country'],  $data['location']);
				$stmt->execute();
				$locationrow = $stmt->insert_id;
				
				$stmt        = $dbCon->prepare("insert into warehouse(`company_id`,`location_id`,`created_on`) values (?, ?, now())");
				
				$stmt->bind_param("ii", $id, $locationrow);
				$stmt->execute();
				$stmt->close();
				
				$stmt = $dbCon->prepare("select first_name,last_name,email,email_verification_code from user_logins where id=?");
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result  = $stmt->get_result();
				$userrow = $result->fetch_assoc();
				
				$stmt       = $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`,`created_by`) values(?, ?, ?, ?, ?, ?, ?, ?)");
				$status_emp = 0;
				$stmt->bind_param("ississii", $id, $userrow['first_name'], $userrow['last_name'], $status_emp, $userrow['email_verification_code'], $userrow['email'], $data['user_id'], $data['user_id']);
				$stmt->execute();
				$admin=$stmt->insert_id;
				if($user_admin==0)
				{
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
				}
				else
				{
					$stmt = $dbCon->prepare("insert into manage_employee_permissions (is_admin, employee_id, permission, user_id, company_id, page_id, created_date, modified_date ) values(?, ?, ?, ?, ?, ?, now(),now())");
					$cont=1;
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
				$_POST['property_id']=1;
				$_POST['is_headquarter']=1;
				$stmt = $dbCon->prepare("INSERT INTO property_location (latitude,longitude,company_id,property_id,visiting_address,created_on, is_headquarter,port_number) VALUES (?,?, ?, ?, ?, now(), ?, ?)");
				$stmt->bind_param("ssiisis",$response[0]['lat'],$response[0]['lon'], $id,$_POST['property_id'],$street_address, $_POST['is_headquarter'],$_POST['d_port_number']);
				$stmt->execute();
				$property_id=$stmt->insert_id;
				$_POST['same_invoice']=1;
					$_POST['iaddress']=$_POST['daddress'];
					 $_POST['icity']=$_POST['dcity'];
					 $_POST['izip']=$_POST['dzip'];
					 $_POST['i_port_number']=$_POST['d_port_number'];
				$stmt=$dbCon->prepare("update company_profiles set si_address=?,si_city=?,si_zip=?,sd_address=?,sd_city=?,sd_zip=?,d_port_number=?,i_port_number=?,is_invoice_same=?   where company_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssssssssii", $_POST['iaddress'],$_POST['icity'],$_POST['izip'],$_POST['daddress'],$_POST['dcity'],$_POST['dzip'],$_POST['d_port_number'],$_POST['i_port_number'],$_POST['same_invoice'],$id);
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
				$fields['web']='www.qloudid.com';
				$fields['user_email']=$userrow['email'];
				$fields['is_admin']=$user_admin;
				$fields['hash_code']=$hash_code;
				$url='https://www.qmatchup.com/beta/company/index.php/UpdateUserCompany/addCompany';
				
				$fields_POST=array();
				$fields_POST['posted']= $this -> encrypt_decrypt('encrypt',serialize($fields));
				
				$ch = curl_init();
			//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch,CURLOPT_URL, $url);
			curl_setopt($ch,CURLOPT_POST, count($fields_POST));
			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_POST);
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
			 }
			else
			{
				$email=$rowCompany['company_email'];
				$id=$rowCompany['company_id'];
			}
			$data['email']=$email;
			$data['cid']=$this->encrypt_decrypt('encrypt',$id);
			if($_POST['signup_type']==1)
			{
				
			$address=$_POST['daddress'].' '.$_POST['d_port_number'];
  
			$url = "http://api.locationiq.com/v1/autocomplete.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&q=".$address;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			if(isset($response['error']))
			{
			$address=$_POST['dcity'].' '.$_POST['d_port_number'];	
			$url = "http://api.locationiq.com/v1/autocomplete.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&q=".$address;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			}	
				$name=htmlentities($_POST['company_name'],ENT_NOQUOTES, 'ISO-8859-1');
				$_POST['building_type']=1;
				$_POST['amenities_available']=1;
				$_POST['tenant_available']=1;
				$_POST['pricing_available']=1;
				$_POST['invoice_available']=1;
				$_POST['basement_available']=1;
				$_POST['penthouse_available']=1;
				$_POST['garage_available']=1;
				$_POST['vitech_region_id']=1;
				$_POST['vitech_city_id']=1;
				$_POST['vitech_area_id']=1;
				$company_id=$id;
				$street=htmlentities($_POST['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
				$city=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
				$stmt = $dbCon->prepare("insert into landloard_buildings (building_type,amenities_available,tenant_available,pricing_available,invoice_available,country_id,block_number,basement_available,penthouse_available,garage_available,vitech_region,vitech_city,vitech_area,company_id, building_name,street_address,city, state,latitude,longitude,total_ports,zipcode) values (?,?,?,?,?,?, ?,?, ?, ?,?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$stmt->bind_param("iiiiiisiiiiiiissssssis",$_POST['building_type'],$_POST['amenities_available'],$_POST['tenant_available'],$_POST['pricing_available'],$_POST['invoice_available'],$_POST['country'],$_POST['d_port_number'],$_POST['basement_available'],$_POST['penthouse_available'],$_POST['garage_available'],$_POST['vitech_region_id'],$_POST['vitech_city_id'],$_POST['vitech_area_id'], $company_id,$name,$street,$city,$response['address']['state'],$response[0]['lat'],$response[0]['lon'],$_POST['tports'],$_POST['dzip']);
				$stmt->execute();	
				$id=$stmt->insert_id;
			for($i=1;$i<=$_POST['tports'];$i++)
			{
			$elevator=1;
			$stmt = $dbCon->prepare("insert into landloard_building_ports (buildingid, port_number,total_floors,elevator_available) values (?, ?, ?, ?)");
			$stmt->bind_param("isii", $id,$i,$_POST['tfloors'],$elevator);
			$stmt->execute();	
			$id1=$stmt->insert_id;	
			for($j=1; $j<=$_POST['tfloors'];$j++)
			{
			$stmt = $dbCon->prepare("insert into landloard_building_port_floors(port_id, floor_number) values (?, ?)");
			$stmt->bind_param("ii", $id1,$j);
			$stmt->execute();	
			}
			
			}
			
			$stmt = $dbCon->prepare("select min(id) as port_id  from landloard_building_ports where buildingid=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();	
			$rowPort = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select *  from lanloard_building_amenity_info");
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowAvailable = $result->fetch_assoc())
			{
			if($rowAvailable['multi_port_available']==1)
			{
			$port_id=$rowPort['port_id'].',';
			}
			else
			{
			$port_id=$rowPort['port_id'];
			}
			$stmt = $dbCon->prepare("INSERT INTO landloard_building_amenities (building_id, amenity_id,port_id) VALUES (?, ?, ?)");
			$stmt->bind_param("iis", $id,$rowAvailable['id'],$port_id);
			$stmt->execute();	
			}
					
			}
			else if($_POST['signup_type']==2 && $data['user_signup_type']==2)
			{
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$company_id=$id;
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_selected_service_todos where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select * from professional_service_category");
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowCategory = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select *  from professional_service_subcategory where professional_category_id=?");
			$stmt->bind_param("i", $rowCategory['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			while($rowAmenities= $result3->fetch_assoc())
			{
				if($_POST['objectType']==$rowCategory['id'])
				{
					$is_selected=1;
				}
				else
				{
					$is_selected=0;
				}
			$stmt = $dbCon->prepare("insert into professional_company_selected_service_todos ( domain_id,professional_category_id,professional_subcategory_id,company_id, created_on, modified_on,is_selected) values (?,?, ?,?, now(), now(),?)");
			$stmt->bind_param("iiiii",$domain_id,$rowCategory['id'],$rowAmenities['id'],$company_id,$is_selected);
			$stmt->execute();
			 				
			}
			
			}
			
			}
			else
			{
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id not in(select professional_subcategory_id from  professional_company_selected_service_todos where company_id=? and domain_id=?)");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row= $result->fetch_assoc())
			{
				
			$stmt = $dbCon->prepare("insert into professional_company_selected_service_todos ( domain_id,professional_category_id,professional_subcategory_id,company_id, created_on, modified_on) values (?,?, ?,?, now(), now())");
			$stmt->bind_param("iiii",$domain_id,$row['professional_category_id'],$row['id'],$company_id);
			$stmt->execute();
			 				
			}
				$stmt = $dbCon->prepare("update professional_company_selected_service_todos set is_selected=1 where professional_category_id=? and company_id=? and professional_subcategory_id in (select professional_subcategory_id from professional_marketplace_service_todos where is_selected=1 and professional_category_id=? and marketplace_id=?)");
				$stmt->bind_param("iiii",$_POST['objectType'],$company_id,$_POST['objectType'],$domain_id);
				$stmt->execute();
			}
			
			
			
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_suported_languages where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select *  from language_list");
			$stmt->execute();
			$result3 = $stmt->get_result();	
			while($rowAmenities= $result3->fetch_assoc())
			{
			
			$stmt = $dbCon->prepare("insert into professional_company_suported_languages (domain_id,language_id,company_id, created_on, modified_on) values (?,?,?, now(), now())");
			$stmt->bind_param("iii",$domain_id,$rowAmenities['id'],$company_id);
			$stmt->execute();
			 				
			}
			}
			
			
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_selected_areas where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select * from vitech_city");
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowCategory = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select *  from vitech_area where region_city_id=?");
			$stmt->bind_param("i", $rowCategory['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			while($rowAmenities= $result3->fetch_assoc())
			{
				 
			$stmt = $dbCon->prepare("insert into professional_company_selected_areas (domain_id, city_id,area_id,company_id, created_on, modified_on,is_selected) values (?,?, ?,?, now(), now(),?)");
			$stmt->bind_param("iiiii",$domain_id,$rowCategory['id'],$rowAmenities['id'],$company_id,$is_selected);
			$stmt->execute();
			 				
			}
			
			}
				
			}
			
			
			
			
			$stmt = $dbCon->prepare("select count(id) as num from cleaning_company_premium_account_request where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$this->sendPremiumAccountRequest($data);
			}
			$this->sendPricingLink($data);	
			}
			else if($_POST['signup_type']==2 && $data['user_signup_type']==3)
			{
				$this->companySignupMarketplaces($data);
			}
			$stmt->close();
			$dbCon->close();
			return $data['cid'];
			
		}
		
	
	
	
	
	function addProfessionalCompany($data)
		{
			$dbCon = AppModel::createConnection();
			$domain_id= $this -> encrypt_decrypt('decrypt',$data['domain_id']);
			if(isset($_POST['came_from']))
			{
				$came_from=$_POST['came_from'];
			}
			else
			{
				$came_from=7;
			}
			$stmt = $dbCon->prepare("select id,country_of_residence from user_logins where email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$rf=0;	
			$st=1;
			$data['random_hash'] = substr(md5(uniqid(rand(), true)), 16, 16);
			$stmt = $dbCon->prepare("INSERT INTO user_logins (first_name,last_name,registered_from,get_started_wizard_status,email,  email_verification_code , created_on , modified_on, country_of_residence,verification_status,user_came_from,domain_id ) VALUES (?, ?, ?, ?,   ?, ?, now(), now(), ?, ?,?,?)");
			$stmt->bind_param("ssiissiiii", $_POST['fname'], $_POST['lname'],$st,$st,$_POST['email'], $data['random_hash'], $_POST['country'],$rf,$came_from,$domain_id);
			$stmt->execute();
			$data['user_id']=$stmt->insert_id;
			}
			else
			{
				$_POST['country']=$row['country_of_residence'];
				$data['user_id']=$row['id'];
			}
			if($data['user_id']==43)
			{
				$data['admin_id']=$data['user_id'];
				$user_admin=1;
			}
			else
			{
				$data['admin_id']=43;
				$user_admin=0;
			}
			$stmt = $dbCon->prepare("select company_id,company_email from companies left join company_profiles on company_profiles.company_id=companies.id where cid=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['cid']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCompany = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("select country_code,country_name from phone_country_code where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_country = $result->fetch_assoc();
			 
			
			 if(empty($rowCompany))
			 {
			$_POST['company_email']=$_POST['cid'].'.'.$row_country['country_code'].'@qloudid.com';
			$email=$_POST['company_email'];
			$_POST['adrs1']=$_POST['daddress'];
			$_POST['port_number']=$_POST['d_port_number'];
			$name=htmlentities($_POST['company_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$street_address=htmlentities($_POST['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
			$city=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
			
			
			$_POST['position_type']=1;
			$web='';
			$st=1;
			$stmt = $dbCon->prepare("insert into companies(company_type,o_type,country_id,user_login_id,company_name,company_email,website,hash_code,created_date,email_verification_status,created_by,user_role,is_landloard_signup,domain_id) 
			values(?, ?, ?, ?, ?, ?, ?, ?, now(), ?, ?, ?,?,?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiiissssiiiii", $_POST['company_type'],$st, $_POST['country'], $data['admin_id'], $name, $email, $web, $hash_code,$st,$data['user_id'],$_POST['position_type'],$st,$domain_id);
			
			
			if (!$stmt->execute()) {
				$stmt->close();
				$dbCon->close();
				return 0;
			} 
			else 
			{
				$id=$stmt->insert_id;
				
				if($_POST['company_type']==2)
				{
					$_POST['phone_number']=$_POST['pnumber'];
					$description='';
					$_POST['entry_type']=0;
					$entry_code='';
					$stmt = $dbCon->prepare("insert into landloard_society (company_id, society_name,created_on,street_address,port_number,zipcode,city,country_id,phone_country_id,phone_number,email,description,entry_type,entry_code,wifi_available,wifi_username,wifi_password) values (?, ?, now(),?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
					$stmt->bind_param("isssssiisssisiss", $id,$name,$street_address,$_POST['d_port_number'],$_POST['dzip'],$city,$_POST['country'],$_POST['country'],$_POST['phone_number'],$email,$description,$_POST['entry_type'],$entry_code,$_POST['entry_type'],$entry_code,$entry_code);
					$stmt->execute();	
					$communityid=$stmt->insert_id;
					
					
					$stmt = $dbCon->prepare("select *  from community_aminity_info");
					$stmt->execute();
					$result = $stmt->get_result();
					while($rowAvailable = $result->fetch_assoc())
					{
					$stmt = $dbCon->prepare("INSERT INTO community_aminity_detail (society_id, amenity_id) VALUES (?, ?)");
					$stmt->bind_param("ii", $communityid,$rowAvailable['id']);
					$stmt->execute();	
					}
					
					
					$select1="select * from community_rules";
			  
					$result1=mysqli_query($dbCon, $select1); 
				 
					 while($row1=mysqli_fetch_array($result1))  
					 { 
						
						$stmt = $dbCon->prepare("insert into `landloard_society_rules`(society_id,rule_id) values (?,?)");
						/* bind parameters for markers */
						$stmt->bind_param("ii",$communityid,$row1['id']);
						$stmt->execute();
						$id1=$stmt->insert_id;
						
						$select2="select * from community_sub_rules where rule_id=".$row1['id'];
			  
						$result2=mysqli_query($dbCon, $select2); 
					 
						 while($row2=mysqli_fetch_array($result2))  
						 { 
							
						$stmt = $dbCon->prepare("insert into `landloard_society_subrules`(society_rule_id,subrule_id) values (?,?)");
						/* bind parameters for markers */
						$stmt->bind_param("ii",$id1,$row2['id']);
						$stmt->execute();	 
							
						 }
						
					 }
				}					
			
			$address=$_POST['daddress'].' '.$_POST['d_port_number'];
  
			$url = "http://api.locationiq.com/v1/autocomplete.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&q=".$address;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			if(isset($response['error']))
			{
			$address=$_POST['dcity'].' '.$_POST['d_port_number'];	
			$url = "http://api.locationiq.com/v1/autocomplete.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&q=".$address;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			}
			$_POST['phone_number']=$_POST['pnumber'];
		$street_address=	htmlentities($_POST['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
				$stmt = $dbCon->prepare("insert into company_profiles(latitude,longitude,`company_id`,address,cid,created_on,modified_on,port_number,phone) values(?,?,?, ?, ?,now(),now(),?,?)");
				
				$stmt->bind_param("ssissss", $response[0]['lat'],$response[0]['lon'],$id, $street_address,$_POST['cid'],$_POST['d_port_number'],$_POST['phone_number']);
				$stmt->execute();
				
				
				$stmt = $dbCon->prepare("insert into user_company_profile(`company_id`,`user_login_id`) values(?, ?)");
				
				$stmt->bind_param("ii", $id, $data['admin_id']);
				$stmt->execute();
				$data['location']='Headquarter';
				$stmt = $dbCon->prepare("insert into location (company_id,country_id,location,created_on) values (?, ?, ?, now())");
				
				$stmt->bind_param("iis", $id, $_POST['country'],  $data['location']);
				$stmt->execute();
				$locationrow = $stmt->insert_id;
				
				$stmt        = $dbCon->prepare("insert into warehouse(`company_id`,`location_id`,`created_on`) values (?, ?, now())");
				
				$stmt->bind_param("ii", $id, $locationrow);
				$stmt->execute();
				$stmt->close();
				
				$stmt = $dbCon->prepare("select first_name,last_name,email,email_verification_code from user_logins where id=?");
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result  = $stmt->get_result();
				$userrow = $result->fetch_assoc();
				
				$stmt       = $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`,`created_by`) values(?, ?, ?, ?, ?, ?, ?, ?)");
				$status_emp = 0;
				$stmt->bind_param("ississii", $id, $userrow['first_name'], $userrow['last_name'], $status_emp, $userrow['email_verification_code'], $userrow['email'], $data['user_id'], $data['user_id']);
				$stmt->execute();
				$admin=$stmt->insert_id;
				if($user_admin==0)
				{
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
				}
				else
				{
					$stmt = $dbCon->prepare("insert into manage_employee_permissions (is_admin, employee_id, permission, user_id, company_id, page_id, created_date, modified_date ) values(?, ?, ?, ?, ?, ?, now(),now())");
					$cont=1;
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
				$_POST['property_id']=1;
				$_POST['is_headquarter']=1;
				$stmt = $dbCon->prepare("INSERT INTO property_location (latitude,longitude,company_id,property_id,visiting_address,created_on, is_headquarter,port_number) VALUES (?,?, ?, ?, ?, now(), ?, ?)");
				$stmt->bind_param("ssiisis",$response[0]['lat'],$response[0]['lon'], $id,$_POST['property_id'],$street_address, $_POST['is_headquarter'],$_POST['d_port_number']);
				$stmt->execute();
				$property_id=$stmt->insert_id;
				$_POST['same_invoice']=1;
					$_POST['iaddress']=$_POST['daddress'];
					 $_POST['icity']=$_POST['dcity'];
					 $_POST['izip']=$_POST['dzip'];
					 $_POST['i_port_number']=$_POST['d_port_number'];
				$stmt=$dbCon->prepare("update company_profiles set si_address=?,si_city=?,si_zip=?,sd_address=?,sd_city=?,sd_zip=?,d_port_number=?,i_port_number=?,is_invoice_same=?   where company_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssssssssii", $_POST['iaddress'],$_POST['icity'],$_POST['izip'],$_POST['daddress'],$_POST['dcity'],$_POST['dzip'],$_POST['d_port_number'],$_POST['i_port_number'],$_POST['same_invoice'],$id);
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
				$fields['web']='www.qloudid.com';
				$fields['user_email']=$userrow['email'];
				$fields['is_admin']=$user_admin;
				$fields['hash_code']=$hash_code;
				$url='https://www.qmatchup.com/beta/company/index.php/UpdateUserCompany/addCompany';
				
				$fields_POST=array();
				$fields_POST['posted']= $this -> encrypt_decrypt('encrypt',serialize($fields));
				
				$ch = curl_init();
			//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch,CURLOPT_URL, $url);
			curl_setopt($ch,CURLOPT_POST, count($fields_POST));
			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_POST);
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
			 }
			else
			{
				$email=$rowCompany['company_email'];
				$id=$rowCompany['company_id'];
			}
			$data['email']=$email;
			$data['cid']=$this->encrypt_decrypt('encrypt',$id);
			if($_POST['signup_type']==1)
			{
				
			$address=$_POST['daddress'].' '.$_POST['d_port_number'];
  
			$url = "http://api.locationiq.com/v1/autocomplete.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&q=".$address;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			if(isset($response['error']))
			{
			$address=$_POST['dcity'].' '.$_POST['d_port_number'];	
			$url = "http://api.locationiq.com/v1/autocomplete.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&q=".$address;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			}	
				$name=htmlentities($_POST['company_name'],ENT_NOQUOTES, 'ISO-8859-1');
				$_POST['building_type']=1;
				$_POST['amenities_available']=1;
				$_POST['tenant_available']=1;
				$_POST['pricing_available']=1;
				$_POST['invoice_available']=1;
				$_POST['basement_available']=1;
				$_POST['penthouse_available']=1;
				$_POST['garage_available']=1;
				$_POST['vitech_region_id']=1;
				$_POST['vitech_city_id']=1;
				$_POST['vitech_area_id']=1;
				$company_id=$id;
				$street=htmlentities($_POST['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
				$city=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
				$stmt = $dbCon->prepare("insert into landloard_buildings (building_type,amenities_available,tenant_available,pricing_available,invoice_available,country_id,block_number,basement_available,penthouse_available,garage_available,vitech_region,vitech_city,vitech_area,company_id, building_name,street_address,city, state,latitude,longitude,total_ports,zipcode) values (?,?,?,?,?,?, ?,?, ?, ?,?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$stmt->bind_param("iiiiiisiiiiiiissssssis",$_POST['building_type'],$_POST['amenities_available'],$_POST['tenant_available'],$_POST['pricing_available'],$_POST['invoice_available'],$_POST['country'],$_POST['d_port_number'],$_POST['basement_available'],$_POST['penthouse_available'],$_POST['garage_available'],$_POST['vitech_region_id'],$_POST['vitech_city_id'],$_POST['vitech_area_id'], $company_id,$name,$street,$city,$response['address']['state'],$response[0]['lat'],$response[0]['lon'],$_POST['tports'],$_POST['dzip']);
				$stmt->execute();	
				$id=$stmt->insert_id;
			for($i=1;$i<=$_POST['tports'];$i++)
			{
			$elevator=1;
			$stmt = $dbCon->prepare("insert into landloard_building_ports (buildingid, port_number,total_floors,elevator_available) values (?, ?, ?, ?)");
			$stmt->bind_param("isii", $id,$i,$_POST['tfloors'],$elevator);
			$stmt->execute();	
			$id1=$stmt->insert_id;	
			for($j=1; $j<=$_POST['tfloors'];$j++)
			{
			$stmt = $dbCon->prepare("insert into landloard_building_port_floors(port_id, floor_number) values (?, ?)");
			$stmt->bind_param("ii", $id1,$j);
			$stmt->execute();	
			}
			
			}
			
			$stmt = $dbCon->prepare("select min(id) as port_id  from landloard_building_ports where buildingid=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();	
			$rowPort = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select *  from lanloard_building_amenity_info");
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowAvailable = $result->fetch_assoc())
			{
			if($rowAvailable['multi_port_available']==1)
			{
			$port_id=$rowPort['port_id'].',';
			}
			else
			{
			$port_id=$rowPort['port_id'];
			}
			$stmt = $dbCon->prepare("INSERT INTO landloard_building_amenities (building_id, amenity_id,port_id) VALUES (?, ?, ?)");
			$stmt->bind_param("iis", $id,$rowAvailable['id'],$port_id);
			$stmt->execute();	
			}
					
			}
			else if($_POST['signup_type']==2)
			{
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$company_id=$id;
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_selected_service_todos where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select * from professional_service_category");
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowCategory = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select *  from professional_service_subcategory where professional_category_id=?");
			$stmt->bind_param("i", $rowCategory['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			while($rowAmenities= $result3->fetch_assoc())
			{
				if($_POST['objectType']==$rowCategory['id'])
				{
					$is_selected=1;
				}
				else
				{
					$is_selected=0;
				}
			$stmt = $dbCon->prepare("insert into professional_company_selected_service_todos ( domain_id,professional_category_id,professional_subcategory_id,company_id, created_on, modified_on,is_selected) values (?,?, ?,?, now(), now(),?)");
			$stmt->bind_param("iiiii",$domain_id,$rowCategory['id'],$rowAmenities['id'],$company_id,$is_selected);
			$stmt->execute();
			 				
			}
			
			}
			
			}
			else
			{
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id not in(select professional_subcategory_id from  professional_company_selected_service_todos where company_id=? and domain_id=?)");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row= $result->fetch_assoc())
			{
				
			$stmt = $dbCon->prepare("insert into professional_company_selected_service_todos ( domain_id,professional_category_id,professional_subcategory_id,company_id, created_on, modified_on) values (?,?, ?,?, now(), now())");
			$stmt->bind_param("iiii",$domain_id,$row['professional_category_id'],$row['id'],$company_id);
			$stmt->execute();
			 				
			}
				$stmt = $dbCon->prepare("update professional_company_selected_service_todos set is_selected=1 where professional_category_id=? and company_id=? and professional_subcategory_id in (select professional_subcategory_id from professional_marketplace_service_todos where is_selected=1 and professional_category_id=? and marketplace_id=?)");
				$stmt->bind_param("iiii",$_POST['objectType'],$company_id,$_POST['objectType'],$domain_id);
				$stmt->execute();
			}
			
			
			
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_suported_languages where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select *  from language_list");
			$stmt->execute();
			$result3 = $stmt->get_result();	
			while($rowAmenities= $result3->fetch_assoc())
			{
			
			$stmt = $dbCon->prepare("insert into professional_company_suported_languages (domain_id,language_id,company_id, created_on, modified_on) values (?,?,?, now(), now())");
			$stmt->bind_param("iii",$domain_id,$rowAmenities['id'],$company_id);
			$stmt->execute();
			 				
			}
			}
			
			
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_selected_areas where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select * from vitech_city");
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowCategory = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select *  from vitech_area where region_city_id=?");
			$stmt->bind_param("i", $rowCategory['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			while($rowAmenities= $result3->fetch_assoc())
			{
				 
			$stmt = $dbCon->prepare("insert into professional_company_selected_areas (domain_id, city_id,area_id,company_id, created_on, modified_on,is_selected) values (?,?, ?,?, now(), now(),?)");
			$stmt->bind_param("iiiii",$domain_id,$rowCategory['id'],$rowAmenities['id'],$company_id,$is_selected);
			$stmt->execute();
			 				
			}
			
			}
				
			}
			
			
			
			
			$stmt = $dbCon->prepare("select count(id) as num from cleaning_company_premium_account_request where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$this->sendPremiumAccountRequest($data);
			}
			$this->sendPricingLink($data);	
			}
			
			$stmt->close();
			$dbCon->close();
			return $data['cid'];
			
		}
		
		function sendPremiumAccountRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$domain_id= $this -> encrypt_decrypt('decrypt',$data['domain_id']); 
			$stmt = $dbCon->prepare("select count(id) as num from cleaning_company_premium_account_request where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("insert into cleaning_company_premium_account_request (domain_id,company_id, user_id, created_on, modified_on) values(?, ?, ?, now(), now())");
			/* bind parameters for markers */
			 
			$stmt->bind_param("iii",$domain_id, $company_id,$data['user_id']);
			$stmt->execute();
			}
			$stmt = $dbCon->prepare("select company_name from companies where id=?");
			$stmt->bind_param("i", $company_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$to            = 'kowaken.ghirmai@gmail.com';
			$subject       = "Premium Qualified request received!";
			$emailContent ='<html><head></head><body><div style="margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding:0">

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
                                 <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:white;">Request</h1>
                              </div>
                              <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:white; font-size: 20px;">Premium qualified account has beed received from '.$row['company_name'].'</div>
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



                                    <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px; fsz14px;">This is sent because your '.$row['company_name'].' have requested for Premium qualified account</p>



                                  </td>



                                </tr>



                                

                                                                  

 


 



        



      </tbody></table>



    </td>



  </tr>
 </tbody></table>



                            </td>



                          </tr>



                        </tbody></table>



                      </div></td>



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



		

		

   

    </center>

</div></body></html>';
			sendEmail($subject, $to, $emailContent);
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		 function professionalTodoUpdate($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id not in(select professional_subcategory_id from  professional_company_selected_service_todos where company_id=? and domain_id=?)");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			
			$stmt = $dbCon->prepare("select *  from professional_service_subcategory where id=?");
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			$rowAmenities= $result3->fetch_assoc();
			$stmt = $dbCon->prepare("insert into professional_company_selected_service_todos ( professional_category_id,professional_subcategory_id,company_id,domain_id, created_on, modified_on) values (?, ?,?,?, now(), now())");
			$stmt->bind_param("iiii",$row['professional_category_id'],$row['id'],$company_id,$domain_id);
			$stmt->execute();
							
			}	
			
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		
		
		function approvedMarketplaces($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from professional_marketplace where id  in(select domain_id from  cleaning_company_premium_account_request where company_id=?)");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			array_push($org,$row);
							
			}	
			
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		 function professionalTodoCount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_selected_service_todos where company_id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select * from professional_service_category");
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowCategory = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select *  from professional_service_subcategory where professional_category_id=?");
			$stmt->bind_param("i", $rowCategory['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			while($rowAmenities= $result3->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into professional_company_selected_service_todos ( professional_category_id,professional_subcategory_id,company_id, created_on, modified_on) values (?, ?,?, now(), now())");
			$stmt->bind_param("iii",$rowCategory['id'],$rowAmenities['id'],$company_id);
			$stmt->execute();
			 				
			}
			
			}				
			}	
			
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		function updateCategoryServiceTodo($data)
		{ 
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select is_selected,professional_category_id,domain_id,company_id from professional_company_selected_service_todos where id=?");
			$stmt->bind_param("i",$_POST['service_todo_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['is_selected']==0)
			{
			$is_selected=1;	
			}
			else
			{
				$is_selected=0;
			}
			$stmt = $dbCon->prepare("update professional_company_selected_service_todos set is_selected=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$is_selected,$_POST['service_todo_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_selected_service_todos where domain_id=? and professional_category_id=? and is_selected=1 and company_id=? and professional_subcategory_id in (select professional_subcategory_id from professional_marketplace_service_todos where is_selected=1 and marketplace_id=?)");
			$stmt->bind_param("iiii",$row['domain_id'],$row['professional_category_id'],$row['company_id'],$row['domain_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		
		
		function updateCategoryServiceAllTodos($data)
		{ 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("update professional_company_selected_service_todos set is_selected=1,modified_on=now() where company_id=? and professional_category_id=? and domain_id=?");
			$stmt->bind_param("iii", $company_id,$_POST['cleaning_subcategory_id'],$domain_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
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
		
		
		function serviceTodoDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from professional_service_category where id in (select professional_category_id from professional_marketplace_service_todos where is_selected=1 and marketplace_id=?)");
			$stmt->bind_param("i",$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$j++;
				if($data['objectType']==$row['id'])
				{
					$block='block';
				}
				else
				{
					$block='none';
				}
				$stmt = $dbCon->prepare("select count(id)as num from professional_company_selected_service_todos where professional_category_id=? and is_selected=1 and company_id=? and domain_id=? and professional_subcategory_id in (select professional_subcategory_id from professional_marketplace_service_todos where is_selected=1 and marketplace_id=?)");
				$stmt->bind_param("iiii", $row['id'],$company_id,$domain_id,$domain_id);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$rowTodoSelectedCount = $result2->fetch_assoc();
				
				$org=$org.' <div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile'.$j.'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold"><div class="dflex wi_100">
									<div class="wi_70 dflex">
								<span class="css-p2kctj"><img src="https://www.qloudid.com/html/usercontent/images/kitchen5.svg" class="css-z0f999"></span> 
								<div>
								<span class="apartheading changedText" >'.str_ireplace('&','and',html_entity_decode($row['category_name'])).'</span><span class="aprtSubheading changedText" id="service'.$row['id'].'">'.$rowTodoSelectedCount['num'].' services selected</span>
								</div>
								</div> 
									<div class="wi_30 padt10">
															<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span>
									</div> 
									</div></a></div>
								<div id="profile'.$j.'" class=" " style="display: '.$block.';">	
										 
									  <div class="css-2998cc fleft padb20">
									<a href="javascript:void(0);" onclick="updateCategoryAmenities('.$row['id'].')"> <button color="#444444" data-testid="Kitchen-amenity-section-select-all" class="merlin-button css-7wfern" aria-label=""><div class="merlin-button__content changedText">Select all</div></button></a>
									  </div>
									  
									   <div class="clear"></div>
											<div id="'.$row['id'].'">';
		 	$stmt = $dbCon->prepare("select professional_company_selected_service_todos.id,is_selected,subcategory_name from professional_company_selected_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_company_selected_service_todos.professional_subcategory_id where professional_company_selected_service_todos.professional_category_id=? and professional_company_selected_service_todos.company_id=? and domain_id=? and professional_subcategory_id in (select professional_subcategory_id from professional_marketplace_service_todos where is_selected=1 and marketplace_id=?)");
			$stmt->bind_param("iiii", $row['id'],$company_id,$domain_id,$domain_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			while($row1 = $result1->fetch_assoc())
			{
				 
				if($row1['is_selected']==1)
				{
					$checked='checked';
					$update=0;
				}
				else
				{
					$checked='';
					$update=1;
				}
				$org=$org.' <div data-testid="'.$row1['subcategory_name'].'-amenity-item" class="css-39yi7y"><div class="css-nj7s2c"><label for="oven" class="css-14q70q0 changedText">'.str_ireplace('&','and',html_entity_decode($row1['subcategory_name'])).'</label><div class="css-1sjqbna">
				<a href="javascript:void(0);" onclick="updateAminity('.$row1['id'].','.$row['id'].');"><input data-testid="test-checkbox-'.$row1['subcategory_name'].'" name="'.$row1['subcategory_name'].'" type="checkbox" class="css-1lgzhz8" '.$checked.'></a>
				</div></div>';
				 
				$org=$org.'</div>';	
			}			
											
			$org=$org.'</div> </div> </div> ';
			 
			}
			  
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		function selectedAreaDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_selected_areas where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select * from vitech_city");
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowCategory = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select *  from vitech_area where region_city_id=?");
			$stmt->bind_param("i", $rowCategory['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			while($rowAmenities= $result3->fetch_assoc())
			{
				 
			$stmt = $dbCon->prepare("insert into professional_company_selected_areas (domain_id, city_id,area_id,company_id, created_on, modified_on,is_selected) values (?,?, ?,?, now(), now(),?)");
			$stmt->bind_param("iiiii",$domain_id,$rowCategory['id'],$rowAmenities['id'],$company_id,$is_selected);
			$stmt->execute();
			 				
			}
			
			}
				
			}
			
			
			$stmt = $dbCon->prepare("select * from vitech_city");
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$j++;
				 
				$stmt = $dbCon->prepare("select count(id)as num from professional_company_selected_areas where city_id=? and is_selected=1 and company_id=?  and domain_id=?");
				$stmt->bind_param("iii", $row['id'],$company_id,$domain_id);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$rowTodoSelectedCount = $result2->fetch_assoc();
				
				$org=$org.' <div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile'.$j.'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold"><div class="dflex wi_100">
									<div class="wi_70 dflex">
								<span class="css-p2kctj"><img src="https://www.qloudid.com/html/usercontent/images/kitchen5.svg" class="css-z0f999"></span> 
								<div>
								<span class="apartheading changedText">'.str_ireplace('&','and',html_entity_decode($row['city_name'])).'</span><span class="aprtSubheading changedText" id="service'.$row['id'].'">'.$rowTodoSelectedCount['num'].' areas selected</span>
								</div>
								</div> 
									<div class="wi_30 padt10">
															<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span>
									</div> 
									</div></a></div>
								<div id="profile'.$j.'" class=" " style="display: none;">	
										 
									  <div class="css-2998cc fleft padb20">
									<a href="javascript:void(0);" onclick="updateCategoryAmenities('.$row['id'].')"> <button color="#444444" data-testid="Kitchen-amenity-section-select-all" class="merlin-button css-7wfern" aria-label=""><div class="merlin-button__content">Select all</div></button></a>
									  </div>
									  
									   <div class="clear"></div>
											<div id="'.$row['id'].'">';
		 	$stmt = $dbCon->prepare("select professional_company_selected_areas.id,is_selected,area_name from professional_company_selected_areas left join vitech_area on vitech_area.id=professional_company_selected_areas.area_id where professional_company_selected_areas.city_id=? and professional_company_selected_areas.company_id=?  and domain_id=?");
			$stmt->bind_param("iii", $row['id'],$company_id,$domain_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			while($row1 = $result1->fetch_assoc())
			{
				 
				if($row1['is_selected']==1)
				{
					$checked='checked';
					$update=0;
				}
				else
				{
					$checked='';
					$update=1;
				}
				$org=$org.' <div data-testid="'.$row1['area_name'].'-amenity-item" class="css-39yi7y"><div class="css-nj7s2c"><label for="oven" class="css-14q70q0 changedText">'.str_ireplace('&','and',html_entity_decode($row1['area_name'])).'</label><div class="css-1sjqbna">
				<a href="javascript:void(0);" onclick="updateAminity('.$row1['id'].','.$row['id'].');"><input data-testid="test-checkbox-'.$row1['area_name'].'" name="'.$row1['area_name'].'" type="checkbox" class="css-1lgzhz8" '.$checked.'></a>
				</div></div>';
				 
				$org=$org.'</div>';	
			}			
											
			$org=$org.'</div> </div> </div> ';
			 
			}
			  
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
	function updateArea($data)
		{ 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select is_selected from professional_company_selected_areas where id=?");
			$stmt->bind_param("i", $_POST['area_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();
			if($row1['is_selected']==1)
			{
			$is_selected=0;	
			}
			else
			{
			$is_selected=1;	
			}
			$stmt = $dbCon->prepare("update professional_company_selected_areas set is_selected=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$is_selected,$_POST['area_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select count(id) as num  from professional_company_selected_areas where is_selected=1 and city_id=? and company_id=? and domain_id=?");
			$stmt->bind_param("iii", $_POST['update_info'],$company_id,$domain_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row1['num'];
		}
		
		
		function updateAllArea($data)
		{ 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("update professional_company_selected_areas set is_selected=1,modified_on=now() where company_id=? and city_id=? and domain_id=?");
			$stmt->bind_param("iii", $company_id,$_POST['city_id'],$domain_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
	
	}		