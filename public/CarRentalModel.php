<?php
require_once('../AppModel.php');
class CarRentalModel extends AppModel
{
 
		function updateUserDrivingDetails($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$data1 = strip_tags($_POST['image-data1']);
			//echo $data; die;
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			$data2 = strip_tags($_POST['image-data3']);
			
			define('UPLOAD_DIR','../estorecss/'); 
			$img_name2="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name2.".txt", $data2);
			
			$stmt = $dbCon->prepare("update car_rental_booking_information set  licencence_updated=1,`dl_number`=?  ,  `issue_month`=? ,  `issue_year`=?  , `expiry_month`  =?,   `expiry_year` =?,   `front_photo` =?,   `back_photo`=? where id=?");
			$stmt->bind_param("sssssssi",$img_name1,$img_name2,$_POST['id_number'],$_POST['issue_month'],$_POST['issue_year'],$_POST['expiry_month'],$_POST['expiry_year'],$id);
			$stmt->execute();
			
			$j=0;
			while($j==0)
					{
					$code=mt_rand(1111,9999); 
					$stmt = $dbCon->prepare("select id from car_rental_booking_information where booking_code=?");
					/* bind parameters for markers */
					$stmt->bind_param("s",$code);
					$stmt->execute();
					$result = $stmt->get_result();
					$rowCode = $result->fetch_assoc();
					if(empty($rowCode))
					{
						$j++;
					}
					}

			$stmt = $dbCon->prepare("update car_rental_booking_information set  booking_code=? where id=?");
			$stmt->bind_param("ii",$code,$id);
			$stmt->execute();
				$this->sendBookingCodeConfirmation($data);
				$stmt->close();
				$dbCon->close();
				return 1;
		}
 
		function bookingDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']); 
			$stmt = $dbCon->prepare("select user_id,licencence_updated,car_rental_available_car.car_type_id,checkin_date,checkout_date,is_confirmed,car_registration_number,first_name,last_name,car_rental_booking_information.id,car_model,model_series,car_price,is_available from car_rental_booking_information left join car_rental_available_car on car_rental_available_car.id=car_rental_booking_information.car_id left join  car_rental_available_car_type on car_rental_available_car_type.id=car_rental_available_car.car_type_id left join car_rental_model on car_rental_model.id=car_rental_available_car_type.brand_type left join car_rental_model_series on car_rental_model_series.id=car_rental_available_car_type.model_id left join user_logins on user_logins.id=car_rental_booking_information.user_id  where car_rental_booking_information.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$org='';
			for($i=$row['checkin_date']; $i<=$row['checkout_date']; )
			{
				$org=$org.$i.',';
				$i=strtotime(date('Y-m-d',$i) . ' +1 day');
			} 
			$org=substr($org,0,-1);
			$row['booking_dates']=$org;
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		
		
		function bookingCarAvailable($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']); 
			$stmt = $dbCon->prepare("select * from car_rental_available_car where is_available=1 and is_updated=1 and car_type_id=? and id not in (select car_id from car_booking_dates where is_confirmed=1 and find_in_set(booking_date,?))");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $data['car_type_id'],$data['booking_dates']);
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
		
		
		
		function confirmVehicleBooking($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']); 
			$stmt = $dbCon->prepare("update car_booking_dates set is_confirmed=1,car_id=? where booking_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['car_detail'],$id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update car_rental_booking_information set is_confirmed=1,car_id=? where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['car_detail'],$id);
			$stmt->execute();
			$this->sendConfirmation($data);
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		function rejectVehicleBooking($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']); 
			$stmt = $dbCon->prepare("update car_booking_dates set is_confirmed=2 where booking_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update car_rental_booking_information set is_confirmed=2 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$this->sendRejectConfirmation($data);
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
	
			
	function sendBookingCodeConfirmation($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']); 
			$stmt = $dbCon->prepare("select booking_code,image_url,car_price as price,email,car_rental_available_car.car_type_id,checkin_date,checkout_date,is_confirmed,car_registration_number,first_name,last_name,car_rental_booking_information.id,car_model,model_series,car_price,is_available from car_rental_booking_information left join car_rental_available_car on car_rental_available_car.id=car_rental_booking_information.car_id left join  car_rental_available_car_type on car_rental_available_car_type.id=car_rental_available_car.car_type_id left join car_rental_model on car_rental_model.id=car_rental_available_car_type.brand_type left join car_rental_model_series on car_rental_model_series.id=car_rental_available_car_type.model_id left join user_logins on user_logins.id=car_rental_booking_information.user_id  where car_rental_booking_information.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
				
				$to      = $row['email'];
				$subject = "Booking confirmation";
				
			
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
								<td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <h1 style="font-size: 33px;font-weight: 800;line-height: 30px;">Dstricts</h1>               </td>
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
									<tbody><tr>
									  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr>
											<td align="left" valign="center" width="48" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="business-logo__container" style="width: 48px; height: 48px; border-radius: 3px; border: 1px solid rgb(211, 211, 216); overflow: hidden;">
												<img src="'.$row['image_url'].'" class="business-logo__image" width="48" height="48" alt="Logo" style="-ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; display: block; border: 1px solid transparent; border-radius: 3px; width: 48px; height: 48px; display: block;">
											  </div>
											</td>
											<td width="12" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
											<td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">'.$row['car_model'].'</span>                          </td>
										  </tr>
										  <tr class="spacer">
											<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  <tr class="spacer">
											<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										</tbody></table>
									  </td>
									</tr>
									<!-- INTRO -->
									<tr>
									  <td valign="top" align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">Booking Confirmation</span>                          </td>
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
										  <span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">Booking information</span>
										  <br>You have successfully updated your driving licence detail for your booking please use below code for receiving your car.</div>
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
												<br>Price per day(inclusive of taxes): '.$row['price'].'
												<br>
Booking code: '.$row['booking_code'].'
<br>												
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
										  <tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  <tr>
											<td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
												<tbody><tr>
												  <td style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
													<table align="left" border="0" cellpadding="0" cellspacing="0" width="230" class="business-address--address" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 50%;">
													  <tbody><tr>
														<td align="left" width="100%" class="text-list textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">
														<span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">'.$row["car_model"].'</span><br>'.$row["model_series"].'<br>From '.date('Y-m-d',$row["checkin_date"]).' to '.date('Y-m-d',$row["checkout_date"]).'                                         </td>
													  </tr>
													</tbody></table>
													<!--[if mso]></td><td><![endif]-->
													
												  </td>
												</tr>
											  </tbody></table>
											</td>
										  </tr>
										</tbody></table>
									  </td>
									</tr>
									
									
									
									
									<tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      
</table>
                  </td>
                </tr>	
									<!-- RECEIPT -->
									
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
												Confirmation policy
											  </div>
											</td>
										  </tr>
										  <tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
												<span>This booking will be confirmed only when car rental company accept your request.</span>
												<span>You can not transfer your booking to another person.</span>
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

					catch(Exception $e) {
						$to      = 'kowaken.ghirmai@gmail.com';
						sendEmail($subject, $to, $emailContent);
					   
					}
				catch (Error $e) {
	 
							}
		}
		
	
		function sendConfirmation($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']); 
			$stmt = $dbCon->prepare("select image_url,car_price as price,email,car_rental_available_car.car_type_id,checkin_date,checkout_date,is_confirmed,car_registration_number,first_name,last_name,car_rental_booking_information.id,car_model,model_series,car_price,is_available from car_rental_booking_information left join car_rental_available_car on car_rental_available_car.id=car_rental_booking_information.car_id left join  car_rental_available_car_type on car_rental_available_car_type.id=car_rental_available_car.car_type_id left join car_rental_model on car_rental_model.id=car_rental_available_car_type.brand_type left join car_rental_model_series on car_rental_model_series.id=car_rental_available_car_type.model_id left join user_logins on user_logins.id=car_rental_booking_information.user_id  where car_rental_booking_information.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
				
				$to      = $row['email'];
				$subject = "Booking confirmation";
				
			
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
								<td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <h1 style="font-size: 33px;font-weight: 800;line-height: 30px;">Dstricts</h1>               </td>
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
									<tbody><tr>
									  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr>
											<td align="left" valign="center" width="48" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="business-logo__container" style="width: 48px; height: 48px; border-radius: 3px; border: 1px solid rgb(211, 211, 216); overflow: hidden;">
												<img src="'.$row['image_url'].'" class="business-logo__image" width="48" height="48" alt="Logo" style="-ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; display: block; border: 1px solid transparent; border-radius: 3px; width: 48px; height: 48px; display: block;">
											  </div>
											</td>
											<td width="12" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
											<td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">'.$row['car_model'].'</span>                          </td>
										  </tr>
										  <tr class="spacer">
											<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  <tr class="spacer">
											<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										</tbody></table>
									  </td>
									</tr>
									<!-- INTRO -->
									<tr>
									  <td valign="top" align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">Booking Confirmation</span>                          </td>
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
										  <span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">Booking confirmation</span>
										  <br>Your booking have been confirmed by the admin for selected dates. You can check the details below. Please provide your DL detail by clicking below button to complete the booking.</div>
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
												<br>Price per day(inclusive of taxes): '.$row['price'].'
												<br>
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
										  <tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  <tr>
											<td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
												<tbody><tr>
												  <td style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
													<table align="left" border="0" cellpadding="0" cellspacing="0" width="230" class="business-address--address" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 50%;">
													  <tbody><tr>
														<td align="left" width="100%" class="text-list textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">
														<span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">'.$row["car_model"].'</span><br>'.$row["model_series"].'<br>From '.date('Y-m-d',$row["checkin_date"]).' to '.date('Y-m-d',$row["checkout_date"]).'                                         </td>
													  </tr>
													</tbody></table>
													<!--[if mso]></td><td><![endif]-->
													
												  </td>
												</tr>
											  </tbody></table>
											</td>
										  </tr>
										</tbody></table>
									  </td>
									</tr>
									
									
									
									
									<tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      
</table>
                  </td>
                </tr>	
									<!-- RECEIPT -->
									
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
                              <a href="https://safeqloud.com/public/index.php/CarRental/licenceInformation/'.$data['id'].'" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;">Add Driving licence</a>                                </td>
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
												Confirmation policy
											  </div>
											</td>
										  </tr>
										  <tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
												<span>This booking will be confirmed only when car rental company accept your request.</span>
												<span>You can not transfer your booking to another person.</span>
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

					catch(Exception $e) {
						$to      = 'kowaken.ghirmai@gmail.com';
						sendEmail($subject, $to, $emailContent);
					   
					}
				catch (Error $e) {
	 
							}
		}
		
		
		function sendRejectConfirmation($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']); 
			$stmt = $dbCon->prepare("select image_url,car_price as price,email,car_rental_available_car.car_type_id,checkin_date,checkout_date,is_confirmed,car_registration_number,first_name,last_name,car_rental_booking_information.id,car_model,model_series,car_price,is_available from car_rental_booking_information left join car_rental_available_car on car_rental_available_car.id=car_rental_booking_information.car_id left join  car_rental_available_car_type on car_rental_available_car_type.id=car_rental_available_car.car_type_id left join car_rental_model on car_rental_model.id=car_rental_available_car_type.brand_type left join car_rental_model_series on car_rental_model_series.id=car_rental_available_car_type.model_id left join user_logins on user_logins.id=car_rental_booking_information.user_id  where car_rental_booking_information.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
				
				$to      = $row['email'];
				$subject = "Booking confirmation";
				
			
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
								<td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <h1 style="font-size: 33px;font-weight: 800;line-height: 30px;">Dstricts</h1>               </td>
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
									<tbody><tr>
									  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr>
											<td align="left" valign="center" width="48" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="business-logo__container" style="width: 48px; height: 48px; border-radius: 3px; border: 1px solid rgb(211, 211, 216); overflow: hidden;">
												<img src="'.$row['image_url'].'" class="business-logo__image" width="48" height="48" alt="Logo" style="-ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; display: block; border: 1px solid transparent; border-radius: 3px; width: 48px; height: 48px; display: block;">
											  </div>
											</td>
											<td width="12" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
											<td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">'.$row['car_model'].'</span>                          </td>
										  </tr>
										  <tr class="spacer">
											<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  <tr class="spacer">
											<td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										</tbody></table>
									  </td>
									</tr>
									<!-- INTRO -->
									<tr>
									  <td valign="top" align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
										  <tbody><tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">Booking rejected</span>                          </td>
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
										  <span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">Booking rejected</span>
										  <br>Your booking can not be confirmed this time for some administrative reasons. We are sorry for the inconvinience.</div>
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
												<br>Price per day(inclusive of taxes): '.$row['price'].'
												<br>
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
										  <tr class="spacer">
											<td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
										  </tr>
										  <tr>
											<td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
												<tbody><tr>
												  <td style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
													<table align="left" border="0" cellpadding="0" cellspacing="0" width="230" class="business-address--address" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 50%;">
													  <tbody><tr>
														<td align="left" width="100%" class="text-list textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">
														<span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">'.$row["car_model"].'</span><br>'.$row["model_series"].'<br>From '.date('Y-m-d',$row["checkin_date"]).' to '.date('Y-m-d',$row["checkout_date"]).'                                         </td>
													  </tr>
													</tbody></table>
													<!--[if mso]></td><td><![endif]-->
													
												  </td>
												</tr>
											  </tbody></table>
											</td>
										  </tr>
										</tbody></table>
									  </td>
									</tr>
									
									
									
									
									<tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      
</table>
                  </td>
                </tr>	
									<!-- RECEIPT -->
									
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
												Confirmation policy
											  </div>
											</td>
										  </tr>
										  <tr>
											<td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
											  <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
												<span>This booking will be confirmed only when car rental company accept your request.</span>
												<span>You can not transfer your booking to another person.</span>
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

					catch(Exception $e) {
						$to      = 'kowaken.ghirmai@gmail.com';
						sendEmail($subject, $to, $emailContent);
					   
					}
				catch (Error $e) {
	 
							}
		}
    
}