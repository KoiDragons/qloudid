<!doctype html>
<html>
	<?php
		$path1 = "../../html/usercontent/images/";
		//echo $companyDetail ['profile_pic']; die;
	if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a); } else { $value_a="../../usercontent/images/default-profile-pic.jpg"; } }  else $value_a="../../usercontent/images/default-profile-pic.jpg"; ?>
	<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
	 
 <script>
 function submitForm()
 {
	 
	 $('#error_msg_form').html('');
	 if($('#country_phone').val()==0)
	 {
		 $('#error_msg_form').html('please select country');
		 return false;
		 
	 }
	 
	  if($('#ltype').val()==0)
	 {
		 $('#error_msg_form').html('please select location type');
		 return false;
		 
	 }
	var bg_url = $('#image-data').css('background-image');
				$('#image-data1').val(bg_url);
				  document.getElementById('save_indexing').submit();	   
 }
 </script>
	</head>
	
	<body class="white_bg ffamily_avenir">
			<!-- HEADER -->
		<div class="column_m header hei_55p  bs_bb white_bg visible-xs"  >
				<div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg"  >
						 
				<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://www.safeqloud.com/company/index.php/CompanyOffices/companyAccount/<?php echo $data['lid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>		
				
				 
			 
				<div class="clear"></div>
			</div>
		</div>
		<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/company/index.php/CompanyOffices/companyAccount/<?php echo $data['lid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
	  <div class="clear"></div>
		<div class="column_m pos_rel">
			
			
			
			<!-- CONTENT -->
			<div class="column_m pos_rel">
			<!-- CONTENT -->
		<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart0 xs-pad0">
					 <form method="POST" action="../updateLocationAccount/<?php echo $data['lid']; ?>" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
					 <div class="marb25">
						<div class="wi_100 xxs-wi_100 xxs-padrl85 padrl140">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										<input type="hidden" name="image-data1" id="image-data1" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd borderr">
											<div class="cropped_image borderr grey_brd5 <?php if($companyDetail ['profile_pic']!=null) { echo "cropped_image_added"; } ?>" style="background-image: <?php echo $value_a; ?>;" id="image-data" name="image-data"></div>
											 
										</div>
									</div>
								
								 
							</div>
						</div>
						 <div class="mart0 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz18 xxs-talc talc edit-text jain_drop_company trn " >Update location details.</a></div>
						 
						  <div class="column_m container  marb25   fsz14 dark_grey_txt">
										<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													 
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Country</span></a> 
										</div>
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 "> 
										<select class=" padt0 jain2 dblock black_txt ffamily_avenir brdclr_lgtgrey2 fsz22 nobrd trans_bg"  disabled >
											<?php foreach($countryOpt as $category => $value ) {
										?>
										
										<option value="<?php echo $value['id']; ?>" <?php if($companyDetail['country_id']==$value['id']) echo 'selected';?>  class="lgtgrey2_bg black_txt ffamily_avenir" disabled><?php echo $value['country_name']; ?></option>
										
										<?php } ?>
												 
											                  
											</select>
										
												</div>	 
													 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
						 
						 	<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a white_txt bg_pink  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><span class="fas fa-times"></span></div>
																	</div>
											
												 
										<div class="fleft wi_80   xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh ffamily_avenir"><span class="edit-text padt0 jain2 ffamily_avenir dblock brdclr_lgtgrey2 fsz12">Company identification number </span></a> 
										
										<div class="fleft wi_100  sm-wi_60 xsip-wi_60 xs-mar0 "> 
										    
													 
									 
											<input type="text"  name="ssn" id="ssn" value="<?php if($companyDetail['cid']!="" || $companyDetail['cid']!= null) echo $companyDetail['cid']; else echo "-"; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" readonly>
										
													
												</div>
												
												</div>
												
												</div>
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
							
								<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a white_txt bg_pink  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><span class="fas fa-times"></span></div>
																	</div>
											
												 
										<div class="fleft wi_80   xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh ffamily_avenir"><span class="edit-text padt0 jain2 ffamily_avenir dblock brdclr_lgtgrey2 fsz12">Company name</span></a> 
										
										<div class="fleft wi_100  sm-wi_60 xsip-wi_60 xs-mar0 "> 
										    
													 
									 
											<input type="text"  name="cname" id="cname" value="<?php  echo $companyDetail['company_name'];  ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" readonly>
										
													
												</div>
												
												</div>
												
												</div>
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
							
							<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a white_txt bg_green " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><span class="fas fa-check "></span></div>
																	</div>
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Industry </span></a> 
										<div class="fleft wi_100  xs-mar0 "> 
										    
									 
											<select class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir"   id="industry" name="industry" disabled>
										
										<option value="0">Select</option>
											<?php foreach($industryOpt as $category => $value)
												
												{
												?>
												<option value="<?php echo $value['name']; ?>" <?php if($companyDetail['industry']!="" || $companyDetail['industry']!= null) { if($companyDetail['industry']== $value['name'] ) echo 'selected'; } ?> disabled><?php echo $value['name']; ?></option>
											<?php } ?>
										
										
									</select> </div>
										 
												</div>
												 
												</div>
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
												<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><i class="fas fa-map-marker-alt"></i></div>
																	</div>
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Visiting address</span></a> 
										
										<div class="fleft wi_100   xs-mar0 "> 
										    
													 
										 
											<input type="text"  name="addrs" id="addrs" value="<?php if($locationDetail['visiting_address']!="" || $locationDetail['visiting_address']!= null) echo $locationDetail['visiting_address']; else echo "-"; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" readonly>
										 
												</div>
												
												</div>
												
												 
												<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40 xs-fsz30 padb0   xs-padt10">
														 <a href="#"><span class="grey_txt_d4d4d5e8  fas fa-long-arrow-alt-right"></span></a>
													</div>
												 
												</div>
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
										
							
											<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a white_txt bg_green " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><span class="fas fa-check "></span></div>
																	</div>
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Phone </span></a> 
										<div class="fleft wi_15  xs-mar0  "> 
										    
									 
											<select class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" name="country_phone" id="country_phone">
										
										<option value="0">Select</option>
										<?php foreach($countryOpt as $category => $value ) {
										?>
										
										<option value="<?php echo $value['id']; ?>" <?php if($companyDetail['country_id']==$value['id']) echo 'selected';?> >+<?php echo $value['country_code']; ?></option>
										
										<?php } ?>
										
										
									</select> </div>
										<div class="fleft wi_80  xs-mar0  "> 
										    
									 
											<input type="text"  name="phone" id="phone" value="<?php if($locationDetail['phone_number']!="" || $locationDetail['phone_number']!= null) echo $locationDetail['phone_number']; else echo "-"; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir">
										 
												</div>
												</div>
												 
												</div>
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											 
										 
							<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a white_txt bg_green " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><span class="fas fa-check "></span></div>
																	</div>
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Location type </span></a> 
										<div class="fleft wi_100  xs-mar0 "> 
										    
									 
											<select class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir"   id="ltype" name="ltype" >
										
										<option value="0">Select</option>
											<?php foreach($propertyDetailInfo as $category => $value)
												
												{
												?>
												<option value="<?php echo $value['id']; ?>" <?php if($locationDetail['property_id']== $value['id'] ) echo 'selected'; ?> ><?php echo $value['property_name']; ?></option>
											<?php } ?>
										
									</select> </div>
										 
												</div>
												 
												</div>
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
							
										
									
										<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><i class="fas fa-map-marker-alt"></i></div>
																	</div>
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Post address</span></a> 
										
										<div class="fleft wi_100   xs-mar0 "> 
										    
													 
										 
											<input type="text"  name="addrs1" id="addrs1" value="<?php if($locationDetail['street_name_i']!="" || $locationDetail['street_name_i']!= null) echo html_entity_decode($locationDetail['street_name_i']); else echo "-"; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" readonly>
										 
												</div>
												
												</div>
												
												 
												<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40 xs-fsz30 padb0   xs-padt10">
														 <a href="#"><span class="grey_txt_d4d4d5e8  fas fa-long-arrow-alt-right"></span></a>
													</div>
												 
												</div>
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
										
										
										<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><i class="fas fa-map-marker-alt"></i></div>
																	</div>
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Leveransadress</span></a> 
										
										<div class="fleft wi_100   xs-mar0 "> 
										    
													 
										 
											<input type="text"  name="addrs2" id="addrs2" value="<?php if($locationDetail['street_name_v']!="" || $locationDetail['street_name_v']!= null) echo $locationDetail['street_name_v']; else echo "-"; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" readonly>
										 
												</div>
												
												</div>
												
												 
												<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40 xs-fsz30 padb0   xs-padt10">
														 <a href="#"><span class="grey_txt_d4d4d5e8  fas fa-long-arrow-alt-right"></span></a>
													</div>
												 
												</div>
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
										
										 	</div>
							<div id="error_msg_form" class="red_txt fsz20"> </div>
									 </form>
									 <div class="clear"></div>
									<div class="talc padtb20 mart20 "> <a href="#" onclick="submitForm();"><input type="button" value="Update" class="forword minhei_55p t_67cff7_bg fsz18 ffamily_avenir"  ></a>
										
									
									</div>					
						 </div>
						 
						
					</div><div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="hei_80p"></div>
			
		 
			<!-- Popup fade -->
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
			
		</div>
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad5"  id="gratis_popup_company_searched">
			<div class="modal-content pad25 brdrad10">
				<div id="searched">
					
					
				</div>
				
			</div>
		</div>
		
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14  brd brdrad5"  id="gratis_popup_company_error">
			<div class="modal-content pad25 brdrad10">
				<h3 class="fsz20">You are not authorized to update this company</h3>
				
			</div>
		</div>
		
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
		
		
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	</body>
	
</html>