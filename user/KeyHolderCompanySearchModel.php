<?php
require_once('../AppModel.php');
class KeyHolderCompanySearchModel extends AppModel
{
	
	function categoryListing($data)
    {
        $dbCon = AppModel::createConnection();
        $a_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
		
        $stmt = $dbCon->prepare("select * from professional_service_category where id in (select professional_category_id from professional_company_selected_service_todos where is_selected=1  and domain_id=1 and company_id in (select company_id from professional_company_selected_areas where is_selected=1 and domain_id=1 and area_id in (select vitech_area from user_address where id=?)))");
        /* bind parameters for markers */
		$cont=1;
        $stmt->bind_param("i", $a_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		while($row = $result->fetch_assoc())
		{
			$row['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
			array_push($org,$row);
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
	
	function subcategoryListing($data)
    {
        $dbCon = AppModel::createConnection();
        $a_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
		$catg_id= $this -> encrypt_decrypt('decrypt',$data['catg_id']);
		
        $stmt = $dbCon->prepare("select * from professional_service_subcategory where id in (select professional_subcategory_id from professional_company_selected_service_todos where professional_category_id=? and is_selected=1  and domain_id=1 and company_id in (select company_id from professional_company_selected_areas where is_selected=1 and domain_id=1 and area_id in (select vitech_area from user_address where id=?)))");
        /* bind parameters for markers */
		$cont=1;
        $stmt->bind_param("ii",$catg_id, $a_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		while($row = $result->fetch_assoc())
		{
			$row['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
			 $filename="../estorecss/".$row ['subcategory_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['subcategory_image'].".txt"); $value_a=str_replace('"','',$value_a); $image = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['subcategory_image'].'.jpg' ); } else { $image="../html/usercontent/images/random/rentpng.png"; } 
			 $row ['subcategory_image']=$image;
			array_push($org,$row);
		}
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	function apartmentDetail($data)
    {
        $dbCon = AppModel::createConnection();
       $a_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
		
          $stmt = $dbCon->prepare("select * from user_address where id = ?");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i", $a_id);
        $stmt->execute();
        $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 $stmt->close();
        $dbCon->close();
		 return $row;
        
        
    }
    
	
	function requestApartmentConnectRequestCount($data)
    {
        $dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$a_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
		$stmt = $dbCon->prepare("select count(id)as num from user_aprtment_company_building_connect_request   where user_aprtment_company_building_connect_request.company_id=? and user_aprtment_company_building_connect_request.user_address_id=? and is_approved in (0,1) order by id desc");
        $stmt->bind_param("ii", $company_id,$a_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		 
		 $stmt->close();
        $dbCon->close();
		 return $row;
        
        
    }
	
	function requestApartmentConnectRequestOtherCompanyCount($data)
    {
        $dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$a_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
		$stmt = $dbCon->prepare("select count(id)as num from user_aprtment_company_building_connect_request   where user_aprtment_company_building_connect_request.company_id!=? and user_aprtment_company_building_connect_request.user_address_id=? and is_approved in (0,1)");
        $stmt->bind_param("ii", $company_id,$a_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		 
		 $stmt->close();
        $dbCon->close();
		 return $row;
        
        
    }
	function requestApartmentConnectStatus($data)
    {
        $dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$a_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
		$stmt = $dbCon->prepare("select user_aprtment_company_building_connect_request.id,property_nickname,building_name,landloard_building_ports.port_number,floor_number,is_approved from user_aprtment_company_building_connect_request left join user_address on user_address.id=user_aprtment_company_building_connect_request.user_address_id left join landloard_buildings on landloard_buildings.id=user_aprtment_company_building_connect_request.building_id left join landloard_building_ports on landloard_building_ports.id=user_aprtment_company_building_connect_request.port_id  left join landloard_building_port_floors on landloard_building_port_floors.id=user_aprtment_company_building_connect_request.floor_id where user_aprtment_company_building_connect_request.company_id=? and user_aprtment_company_building_connect_request.user_address_id=? order by id desc");
        $stmt->bind_param("ii", $company_id,$a_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		 
		 $stmt->close();
        $dbCon->close();
		 return $row;
        
        
    }
	
	
	function cleaningCompanyApprovedServiceTypes($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
	  $a_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
       $stmt = $dbCon->prepare("select * from cleaning_service_type where id in (select service_type_id from cleaning_service_category_availability where company_id=? and is_available=1)");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $company_id);
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
	
	function buildingList($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
	  $a_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
       $stmt = $dbCon->prepare("select id,building_name from landloard_buildings where company_id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $company_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='<option value="0">Select</option>';
		while($row = $result->fetch_assoc())
		{
			$org=$org.'<option value="'.$row['id'].'">'.$row['building_name'].'</option>';
			 
		}
		 
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	function getPorts($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
	  $a_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
       $stmt = $dbCon->prepare("select id,port_number from landloard_building_ports where buildingid=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $_POST['building_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='<option value="0">Select</option>';
		while($row = $result->fetch_assoc())
		{
			$org=$org.'<option value="'.$row['id'].'">'.$row['port_number'].'</option>';
			 
		}
		 
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	
	function getFloors($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
	  $a_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
       $stmt = $dbCon->prepare("select id,floor_number from landloard_building_port_floors where port_id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $_POST['port_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='<option value="0">Select</option>';
		while($row = $result->fetch_assoc())
		{
			$org=$org.'<option value="'.$row['id'].'">'.$row['floor_number'].'</option>';
			 
		}
		 
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	
	
	
	 
	 function selectCleaningCategory($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
	  $a_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
	    $stmt = $dbCon->prepare("select requested_cleaning_services from user_key_holder_companies where company_id=? and user_address_id=? and key_service_id=5");
        
        /* bind parameters for markers */
		$stmt->bind_param("ii", $company_id,$a_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$rowCategory = $result->fetch_assoc();
       $stmt = $dbCon->prepare("select cleaning_service_category_availability.id,category_id,action_taken,is_available,category_name from cleaning_service_category_availability left join cleaning_service_category on cleaning_service_category.id=cleaning_service_category_availability.category_id where company_id=? and service_type_id=? and is_available=1 and find_in_set(cleaning_service_category_availability.id,?)");
        
        /* bind parameters for markers */
		$stmt->bind_param("iis", $company_id,$_POST['id'],$rowCategory['requested_cleaning_services']);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='<option value="0">Select</option>';
		while($row = $result->fetch_assoc())
		{
			$org=$org.'<option value="'.$row['id'].'">'.$row['category_name'].'</option>';
			 
		}
		 
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	 
	 
	function cleaningCompanyServiceCategory($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
	  $a_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
       $stmt = $dbCon->prepare("select * from cleaning_service_type where id in (select service_type_id from cleaning_service_category_availability where company_id=? and is_available=1)");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $company_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		$j=0;
		while($row = $result->fetch_assoc())
		{
			
			$org=$org.'<div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile'.$j.'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold"><div class="dflex wi_100">
									<div class="wi_70 dflex">
								<span class="css-p2kctj"><img src="https://www.safeqloud.com/html/usercontent/images/kitchen5.svg" class="css-z0f999"></span> 
								<div>
								<span class="apartheading">'.$row['service_type_name'].'</span></span>
								</div>
								</div> 
									<div class="wi_30 padt10">
															<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span>
									</div> 
									</div></a></div>
								<div id="profile'.$j.'" class=" " style="display: block;">	
										 
									   
									  
									   <div class="clear"></div>
											<div id="'.$row['id'].'">';
			 
			$stmt = $dbCon->prepare("select cleaning_service_category_availability.id,category_id,action_taken,is_available,category_name from cleaning_service_category_availability left join cleaning_service_category on cleaning_service_category.id=cleaning_service_category_availability.category_id where company_id=? and service_type_id=? and is_available=1");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$row['id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			while($row1 = $result1->fetch_assoc())
			{
				$org=$org.'<div data-testid="'.$row1['category_name'].'-amenity-item" class="css-39yi7y"><div class="css-nj7s2c"><label for="oven" class="css-14q70q0">'.$row1['category_name'].'</label><div class="css-1sjqbna">
				<a href="javascript:void(0);" onclick="selectCategory('.$row1['id'].');"><input data-testid="test-checkbox-'.$row1['category_name'].'" name="'.$row1['category_name'].'" type="checkbox" class="css-1lgzhz8" ></a>
				</div></div></div>';
			}
			$org=$org.'</div> </div> </div> ';
			$j++;
		}
		 
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	 function updateRequest($data)
    {
        $dbCon = AppModel::createConnection();
		$a_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$_POST['request']=substr($_POST['request'],0,-1);
		 $a=explode(',',$_POST['request']);
		 foreach($a as $key)
		 {
		$stmt = $dbCon->prepare("select id from user_key_holder_companies  where user_address_id=? and company_id=? and key_service_id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("iii", $a_id,$company_id,$key);
        $stmt->execute();
        $result = $stmt->get_result();
       
        $row = $result->fetch_assoc();
		if(empty($row))
		{
			 $stmt = $dbCon->prepare("INSERT INTO user_key_holder_companies (user_id,user_address_id, company_id, created_on,modified_on, key_service_id) VALUES (?, ?, ?, now(), now(), ?)");
             $stmt->bind_param("iiii",$data['user_id'], $a_id,$company_id,$key);
			 $stmt->execute();
			
		}
		else
		{
			 $stmt = $dbCon->prepare("update user_key_holder_companies set modified_on=now(), is_approved=0 where id=?");
             $stmt->bind_param("i", $row['id']);
			 $stmt->execute();	
		}
		 }	

			$stmt = $dbCon->prepare("select company_email from companies  where id=?");
        
				/* bind parameters for markers */
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
			   
				$rowCompany = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("select address from user_address  where id=?");
        
				/* bind parameters for markers */
				$stmt->bind_param("i", $a_id);
				$stmt->execute();
				$result = $stmt->get_result();
			   
				$rowInfo = $result->fetch_assoc();
				
				$url="https://www.safeqloud.com/company/index.php/UserKeyHolderCompany/receivedAccount/".$data['cid'];
				$surl=getShortUrl($url);
				
				$to=$rowCompany['company_email'];
				$subject="Property holding request received";
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
            <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <h1 style="font-size: 33px;font-weight: 800;line-height: 30px;">Property management</h1>               </td>
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
                        
                        <td width="12" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                        <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">'.$rowInfo["address"].'</span>                          </td>
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
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">You have received a request</span>                          </td>
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
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- BOOKING INFO -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody><tr>
                        <td align="left" valign="middle" width="468" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          
                        </td>
                      </tr>
                      
                      
                      <tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody><tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="'.$url.'"="" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;"> Manage requests </a>                                </td>
                            </tr>
                          </tbody></table>
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
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="230" class="business-address--address" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 70%;">
                                  <tbody><tr>
                                    <td align="left" width="100%" class="text-list textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">
                                    <span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">If button dont work please copy and paste the link in browser: '.$surl.'</span>                                         </td>
                                  </tr>
                                </tbody></table>
                                <!--[if mso]></td><td><![endif]-->
                                <table align="right" border="0" cellpadding="0" cellspacing="0" width="230" class="business-address--map" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 50%;">
                                  <tbody><tr>
                                    
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
                            Management policy
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                            <span>Please approve the service request that you can serve as a property adviser.</span>
                            <span>You can only work for the role you have approved.</span>
                          </div>
                        </td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
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
  </tbody></table>



</body></html>';
				
				try {
  sendEmail($subject, $to, $emailContent);
}

//catch exception
catch(Exception $e) {
 // echo 'Message: ' .$e->getMessage(); die;
}
				
				 
			 
		
		 
          $stmt->close();
		  $dbCon->close();
		  return 1;
    }
	function keyServicesRequestList($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
	  $a_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
        $stmt = $dbCon->prepare("select is_approved,key_service,user_key_holder_companies.id,company_name,last_name,first_name,email,user_key_holder_companies.created_on,address,user_address.city,user_address.zipcode from user_key_holder_companies left join user_address on user_address.id=user_key_holder_companies.user_address_id left join user_logins on user_logins.id=user_address.user_id left join companies on companies.id=user_key_holder_companies.company_id left join key_holder_services on key_holder_services.id=user_key_holder_companies.key_service_id where company_id=? and user_address_id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("ii", $company_id,$a_id);
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
	
	
	function keyServicesCompaniesList($data)
    {
        $dbCon = AppModel::createConnection();
       
	  $a_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
        $stmt = $dbCon->prepare("select companies.id,company_name,company_email,country_id,address  from companies left join company_profiles on company_profiles.company_id=companies.id where companies.id in (select company_id from user_key_holder_companies   where user_address_id=? and key_service_id=5 and is_approved=1)");
        
        /* bind parameters for markers */
		$stmt->bind_param("i",$a_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		 
		while($row = $result->fetch_assoc())
		{
			$enc=$this->encrypt_decrypt('encrypt',$row['id']);
			$org=$org.'<a href="../checkRequestAccount/'.$data['aid'].'/'.$enc.'" ><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">'.html_entity_decode($row['company_name']).'</span>
																	
																	 <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">'.$row['address'].'</span>  
																	</div>
																	
																	
																		<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right blue_67cff7"></span> 
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
	
	
	
	function keyServices($data)
    {
        $dbCon = AppModel::createConnection();
       $a_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		
          $stmt = $dbCon->prepare("select * from key_holder_services where id not in (select key_service_id from user_key_holder_companies where company_id=? and user_address_id=?  and (is_approved=1 or is_approved=0))");
        /* bind parameters for markers */
		 
		$stmt->bind_param("ii", $company_id,$a_id);
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
    function companyListSearch($data)
    {
        $dbCon = AppModel::createConnection();
		
		ini_set('memory_limit', '-1');
		 $org="";
						$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
						
		$a=0;
		$b=20;
		
		$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
		  
					$stmt = $dbCon->prepare("select companies.id,company_name,company_email,country_id,address  from companies left join company_profiles on company_profiles.company_id=companies.id   where company_name like ?  and email_verification_status=1  limit ?,?");
				 $stmt->bind_param("sii", $p,$a,$b);
				
				 $stmt->execute();
				$result = $stmt->get_result();
				
				
				 while($row=mysqli_fetch_array($result))
					{
						
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				
				$company_name=str_ireplace(htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1'),"<span class='bold dblue_txt'>".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."</span>",$row['company_name']);
									$org=$org.'<a href="../checkRequestAccount/'.$data['aid'].'/'.$enc.'" ><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">'.$company_name.'</span>
																	
																	 <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">'.$row['address'].'</span>  
																	</div>
																	
																	
																		<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right blue_67cff7"></span> 
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
	function companyListSearchCount($data)
    {
        $dbCon = AppModel::createConnection();
		
		ini_set('memory_limit', '-1');
		 $org="";
		$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
						//echo $p; die;
	$stmt = $dbCon->prepare("select count(companies.id) as num from companies where company_name like ? and email_verification_status=1 ");
						$stmt->bind_param("s", $p);
					
		
		  $stmt->execute();
        $result2 = $stmt->get_result();
		$row2=mysqli_fetch_array($result2);
			
		
		$stmt->close();
        $dbCon->close();
		return $row2['num'];
	}
	
	 function companyListNew($data)
    {
        $dbCon = AppModel::createConnection();
		ini_set('memory_limit', '-1');
		 $org="";
		 
						$p="%".urldecode($_POST['message'])."%";
		
		$a=$_POST['id']*20+1;
		$b=20;
		   
		 
					$stmt = $dbCon->prepare("select companies.id,company_name,company_email,country_id,address  from companies left join company_profiles on company_profiles.company_id=companies.id   where company_name like ?  and email_verification_status=1 limit ?,?");
				 $stmt->bind_param("sii", $p,$a,$b);
				
				 $stmt->execute();
				$result = $stmt->get_result();
				
				 
				 while($row=mysqli_fetch_array($result))
					{
						
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				
				$company_name=str_ireplace(urldecode($_POST['message']),"<span class='bold dblue_txt'>".urldecode($_POST['message'])."</span>",$row['company_name']);
									$org=$org.'<a href="../checkRequestAccount/'.$data['aid'].'/'.$enc.'" ><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">'.$company_name.'</span>
																	
																	 <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">'.$row['address'].'</span>  
																	</div>
																	
																	
																		<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right blue_67cff7"></span> 
													</div>	 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div></a>';
					}	
		
	
			 $stmt->close();
        $dbCon->close();
		return $org;
	}
	
	 function updateCleaningRequest($data)
    {
        $dbCon = AppModel::createConnection();
		$a_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$key=5;
		$stmt = $dbCon->prepare("select id from user_key_holder_companies  where user_address_id=? and company_id=? and key_service_id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("iii", $a_id,$company_id,$key);
        $stmt->execute();
        $result = $stmt->get_result();
       
        $row = $result->fetch_assoc();
		if(empty($row))
		{
			 $stmt = $dbCon->prepare("INSERT INTO user_key_holder_companies (user_id,user_address_id, company_id, created_on,modified_on, key_service_id,requested_cleaning_services) VALUES (?, ?, ?, now(), now(), ?,?)");
             $stmt->bind_param("iiiis",$data['user_id'], $a_id,$company_id,$key,$_POST['selected_categories']);
			 $stmt->execute();
			
		}
		else
		{
			 $stmt = $dbCon->prepare("update user_key_holder_companies set modified_on=now(), is_approved=0,requested_cleaning_services=? where id=?");
             $stmt->bind_param("si",$_POST['selected_categories'], $row['id']);
			 $stmt->execute();	
		}
		 

			$stmt = $dbCon->prepare("select company_email from companies  where id=?");
        
				/* bind parameters for markers */
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
			   
				$rowCompany = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("select address from user_address  where id=?");
        
				/* bind parameters for markers */
				$stmt->bind_param("i", $a_id);
				$stmt->execute();
				$result = $stmt->get_result();
			   
				$rowInfo = $result->fetch_assoc();
				
				$url="https://www.safeqloud.com/company/index.php/UserKeyHolderCompany/receivedAccount/".$data['cid'];
				$surl=getShortUrl($url);
				
				$to=$rowCompany['company_email'];
				$subject="Property holding request received";
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
            <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <h1 style="font-size: 33px;font-weight: 800;line-height: 30px;">Property management</h1>               </td>
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
                        
                        <td width="12" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                        <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">'.$rowInfo["address"].'</span>                          </td>
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
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">You have received a request</span>                          </td>
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
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- BOOKING INFO -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody><tr>
                        <td align="left" valign="middle" width="468" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          
                        </td>
                      </tr>
                      
                      
                      <tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody><tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="'.$url.'"="" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;"> Manage requests </a>                                </td>
                            </tr>
                          </tbody></table>
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
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="230" class="business-address--address" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 70%;">
                                  <tbody><tr>
                                    <td align="left" width="100%" class="text-list textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">
                                    <span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">If button dont work please copy and paste the link in browser: '.$surl.'</span>                                         </td>
                                  </tr>
                                </tbody></table>
                                <!--[if mso]></td><td><![endif]-->
                                <table align="right" border="0" cellpadding="0" cellspacing="0" width="230" class="business-address--map" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 50%;">
                                  <tbody><tr>
                                    
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
                            Management policy
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                            <span>Please approve the service request that you can serve as a property adviser.</span>
                            <span>You can only work for the role you have approved.</span>
                          </div>
                        </td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
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
  </tbody></table>



</body></html>';
				
				try {
  sendEmail($subject, $to, $emailContent);
}

//catch exception
catch(Exception $e) {
 // echo 'Message: ' .$e->getMessage(); die;
}
				
				 
			 
		
		 
          $stmt->close();
		  $dbCon->close();
		  return 1;
    }
	
 function sendCleaningRequest($data)
    {
        $dbCon = AppModel::createConnection();
		$a_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		
		$stmt = $dbCon->prepare("INSERT INTO cleaning_company_user_service_request (user_address_id, company_id, created_on,service_type_id, category_available_id) VALUES (?, ?, now(), ?,?)");
        $stmt->bind_param("iiii",$a_id,$company_id,$_POST['service_type_id'],$_POST['category_id']);
		$stmt->execute();
			
		 
		 

				$stmt = $dbCon->prepare("select company_email from companies  where id=?");
        
				/* bind parameters for markers */
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
			   
				$rowCompany = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("select address from user_address  where id=?");
        
				/* bind parameters for markers */
				$stmt->bind_param("i", $a_id);
				$stmt->execute();
				$result = $stmt->get_result();
			   
				$rowInfo = $result->fetch_assoc();
				
				$url="https://www.safeqloud.com/company/index.php/CleaningCompany/receivedCleaningRequest/".$data['cid'];
				$surl=getShortUrl($url);
				
				$to=$rowCompany['company_email'];
				$subject="Property holding request received";
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
            <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <h1 style="font-size: 33px;font-weight: 800;line-height: 30px;">Property management</h1>               </td>
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
                        
                        <td width="12" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                        <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">'.$rowInfo["address"].'</span>                          </td>
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
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">You have received a request</span>                          </td>
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
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- BOOKING INFO -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody><tr>
                        <td align="left" valign="middle" width="468" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          
                        </td>
                      </tr>
                      
                      
                      <tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody><tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="'.$url.'"="" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;"> Manage requests </a>                                </td>
                            </tr>
                          </tbody></table>
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
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="230" class="business-address--address" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 70%;">
                                  <tbody><tr>
                                    <td align="left" width="100%" class="text-list textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">
                                    <span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">If button dont work please copy and paste the link in browser: '.$surl.'</span>                                         </td>
                                  </tr>
                                </tbody></table>
                                <!--[if mso]></td><td><![endif]-->
                                <table align="right" border="0" cellpadding="0" cellspacing="0" width="230" class="business-address--map" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 50%;">
                                  <tbody><tr>
                                    
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
                            Management policy
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                            <span>Please approve the service request that you can serve as a property adviser.</span>
                            <span>You can only work for the role you have approved.</span>
                          </div>
                        </td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
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
  </tbody></table>



</body></html>';
				
				try {
  sendEmail($subject, $to, $emailContent);
}

//catch exception
catch(Exception $e) {
 // echo 'Message: ' .$e->getMessage(); die;
}
				
				 
			 
		
		 
          $stmt->close();
		  $dbCon->close();
		  return 1;
    }
	
function sendConnectRequest($data)
    {
        $dbCon = AppModel::createConnection();
		$a_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		
		$stmt = $dbCon->prepare("INSERT INTO user_aprtment_company_building_connect_request (user_address_id, company_id, created_on,modified_on,building_id,port_id,floor_id) VALUES (?, ?, now(), now(),?,?,?)");
        $stmt->bind_param("iiiii",$a_id,$company_id,$_POST['building_id'],$_POST['port_id'],$_POST['floor_id']);
		$stmt->execute();
			
		 

				$stmt = $dbCon->prepare("select company_email from companies  where id=?");
        
				/* bind parameters for markers */
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
			   
				$rowCompany = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("select address from user_address  where id=?");
        
				/* bind parameters for markers */
				$stmt->bind_param("i", $a_id);
				$stmt->execute();
				$result = $stmt->get_result();
			   
				$rowInfo = $result->fetch_assoc();
				
				$url="https://www.safeqloud.com/company/index.php/Landloard/apartmentConnectRequest/".$data['cid'];
				$surl=getShortUrl($url);
				
				$to=$rowCompany['company_email'];
				$subject="Property holding request received";
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
            <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <h1 style="font-size: 33px;font-weight: 800;line-height: 30px;">Property management</h1>               </td>
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
                        
                        <td width="12" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                        <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">'.$rowInfo["address"].'</span>                          </td>
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
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">You have received a request</span>                          </td>
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
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- BOOKING INFO -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody><tr>
                        <td align="left" valign="middle" width="468" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          
                        </td>
                      </tr>
                      
                      
                      <tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody><tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="'.$url.'"="" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;"> Manage requests </a>                                </td>
                            </tr>
                          </tbody></table>
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
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="230" class="business-address--address" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 70%;">
                                  <tbody><tr>
                                    <td align="left" width="100%" class="text-list textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; color: rgb(79, 79, 101);">
                                    <span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">If button dont work please copy and paste the link in browser: '.$surl.'</span>                                         </td>
                                  </tr>
                                </tbody></table>
                                <!--[if mso]></td><td><![endif]-->
                                <table align="right" border="0" cellpadding="0" cellspacing="0" width="230" class="business-address--map" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 50%;">
                                  <tbody><tr>
                                    
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
                            Management policy
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                            <span>Please approve the service request that you can serve as a property adviser.</span>
                            <span>You can only work for the role you have approved.</span>
                          </div>
                        </td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
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
  </tbody></table>



</body></html>';
				
				try {
  sendEmail($subject, $to, $emailContent);
}

//catch exception
catch(Exception $e) {
 // echo 'Message: ' .$e->getMessage(); die;
}
				
				 
			 
		
		 
          $stmt->close();
		  $dbCon->close();
		  return 1;
    }
			
}
