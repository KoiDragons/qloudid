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
	 if($('#industry').val()==0)
	 {
		 $('#error_msg_form').html('please select industry');
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
									<a href="https://www.qloudid.com/company/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
                        <a href="https://www.qloudid.com/company/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			<div class="top_menu frighti padt20 padb10 hidden-xs">
				<ul class="menulist sf-menu  fsz16 ">
					<li class="hidden-xs padr10">
						<a href="https://www.qloudid.com/company/index.php/CompanyUpdates/updateInfo/<?php echo $data['cid']; ?>"><span class="black_txt pred_txt_h ffamily_avenir">Updates</span></a>
					</li>
				 	 
       			
				 </ul>
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
					 <form method="POST" action="../updateCompanyAccount/<?php echo $data['cid']; ?>" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
					 <div class="marb25">
						<div class="wi_100 xxs-wi_100 xxs-padrl85 padrl140">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										<input type="hidden" name="image-data1" id="image-data1" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd borderr">
											<div class="cropped_image borderr grey_brd5 <?php if($companyDetail ['profile_pic']!=null) { echo "cropped_image_added"; } ?>" style="background-image: <?php echo $value_a; ?>;" id="image-data" name="image-data"></div>
											<div class="subimg_load">
												<a href="#" class="load_button" style="background: #FFF;color: #999; display:none;">Change</a>
												
												 
											</div>
										</div>
									</div>
								
								 
							</div>
						</div>
						
						
						 <div class="mart0 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz18 xxs-talc talc edit-text jain_drop_company trn " >Update company details.</a></div>
						 
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
										    
													 
									 
											<input type="text"  name="cname" id="cname" value="<?php  echo $companyDetail['company_name'];  ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir">
										
													
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
										    
									 
											<select class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir maxwi_100"   id="industry" name="industry">
										
										<option value="0">Select</option>
											<?php foreach($industryOpt as $category => $value)
												
												{
												?>
												<option value="<?php echo $value['name']; ?>" <?php if($companyDetail['industry']!="" || $companyDetail['industry']!= null) { if($companyDetail['industry']== $value['name'] ) echo 'selected'; } ?>><?php echo $value['name']; ?></option>
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
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a white_txt bg_green " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><span class="fas fa-check "></span></div>
																	</div>
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Phone </span></a> 
										<div class="fleft wi_15  xs-mar0  "> 
										    
									 
											<select class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" name="country_phone" id="country_phone">
										
										 
										<?php foreach($countryOpt as $category => $value ) {
										?>
										
										<option value="<?php echo $value['country_name']; ?>" <?php if($companyDetail['phone_country']==$value['country_name']) echo 'selected';?> >+<?php echo $value['country_code']; ?></option>
										
										<?php } ?>
										
										
									</select> </div>
										<div class="fleft wi_80  xs-mar0  "> 
										    
									 
											<input type="text"  name="phone" id="phone" value="<?php if($companyDetail['phone']!="" || $companyDetail['phone']!= null) echo $companyDetail['phone']; else echo "-"; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir">
										 
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
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Email </span></a> 
										
										 
												 
										<div class="fleft wi_100  xs-mar0 padl0"> 
										    
									 
											<input type="text"  name="email" id="email" value="<?php  echo $companyDetail['company_email']; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" readonly>
										 
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
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Website </span></a> 
										
										 
												 
										<div class="fleft wi_100  xs-mar0 padl0"> 
										    
									 
											<input type="text"  name="web" id="web" value="<?php  echo $companyDetail['website']; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir"  >
										 
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
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><i class="fas fa-map-marker-alt"></i></div>
																	</div>
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Visiting address</span></a> 
										
										<div class="fleft wi_100   xs-mar0 "> 
										    
													 
										 
											<input type="text"  name="addrs" id="addrs" value="<?php  if(isset($_POST['visit_addrs'])){ echo htmlentities($_POST['addrs'],ENT_NOQUOTES, 'ISO-8859-1'); } else { if($addressDetail['visiting_address']!="" || $addressDetail['visiting_address']!= null) echo $addressDetail['visiting_address']; else echo "-"; } ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" readonly>
										 <input type="hidden"  name="port_number" id="port_number" value="<?php  if(isset($_POST['port_number'])){ echo htmlentities($_POST['port_number'],ENT_NOQUOTES, 'ISO-8859-1'); } else { if($addressDetail['port_number']!="" || $addressDetail['port_number']!= null) echo $addressDetail['port_number']; else echo "-"; } ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" readonly>
												</div>
												
												</div>
												
												 
												<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40 xs-fsz30 padb0   xs-padt10">
														 <a href="../visitingAddress/<?php echo $data['cid']; ?>"><span class="grey_txt_d4d4d5e8  fas fa-long-arrow-alt-right"></span></a>
													</div>
												 
												</div>
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<input type="hidden" id="visit_addrs" name="visit_addrs" value="<?php if(isset($_POST['visit_addrs'])){ echo $_POST['visit_addrs']; } else { echo "0"; } ?> " />
											<input type="hidden" id="latit" name="latit" value="<?php  if(isset($_POST['visit_addrs'])){ echo $_POST['latit']; } else { if($companyDetail['latitude']!="" || $companyDetail['latitude']!= null) echo $companyDetail['latitude']; else echo ""; } ?>" />
											<input type="hidden" id="longi" name="longi" value="<?php  if(isset($_POST['visit_addrs'])){ echo $_POST['longi']; } else { if($companyDetail['longitude']!="" || $companyDetail['longitude']!= null) echo $companyDetail['longitude']; else echo ""; } ?> " />
										
										<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><i class="fas fa-map-marker-alt"></i></div>
																	</div>
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Delivery & Invoicing address</span></a> 
										
										<div class="fleft wi_100   xs-mar0 "> 
										    
													 
										 
											<input type="text"  name="daddress" id="daddress" value="<?php if(isset($_POST['delivery_address'])){ echo htmlentities($_POST['daddress'],ENT_NOQUOTES, 'ISO-8859-1'); } else { if($companyDetail['sd_address']!="" || $companyDetail['sd_address']!= null) echo $companyDetail['sd_address']; else echo "-"; } ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" readonly>
										 
												</div>
												
												</div>
												
												 
												<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40 xs-fsz30 padb0   xs-padt10">
														 <a href="../invoiceAddress/<?php echo $data['cid']; ?>"><span class="grey_txt_d4d4d5e8  fas fa-long-arrow-alt-right"></span></a>
													</div>
												 
												</div>
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
										
										
										 	
											<input type="hidden" name="dzip"    id="dzip" value="<?php if(isset($_POST['delivery_address'])){ echo $_POST['dzip']; } else { if($companyDetail['sd_zip']!="" || $companyDetail['sd_zip']!= null) echo $companyDetail['sd_zip']; else echo "-"; } ?>"  />
											
											<input type="hidden" name="dcity"    id="dcity"  value="<?php if(isset($_POST['delivery_address'])){ echo htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1'); } else { if($companyDetail['sd_city']!="" || $companyDetail['sd_city']!= null) echo $companyDetail['sd_city']; else echo "-"; } ?>"    />
											
											<input type="hidden" name="d_port_number"    id="d_port_number"  value="<?php if(isset($_POST['delivery_address'])){ echo $_POST['d_port_number']; } else { if($companyDetail['d_port_number']!="" || $companyDetail['d_port_number']!= null) echo $companyDetail['d_port_number']; } ?>"    />
											
											<input type="hidden" id="delivery_address" name="delivery_address" value="<?php if(isset($_POST['delivery_address'])){ echo $_POST['delivery_address']; } else { echo "0"; } ?> " />
											
											
											<input type="hidden"  name="iaddress" id="iaddress" value="<?php if(isset($_POST['invoice_address'])){ echo  htmlentities($_POST['iaddress'],ENT_NOQUOTES, 'ISO-8859-1'); } else { if($companyDetail['si_address']!="" || $companyDetail['si_address']!= null) echo $companyDetail['si_address']; else echo "-"; } ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" />
											
											<input type="hidden" name="izip"    id="izip" value="<?php if(isset($_POST['invoice_address'])){ echo $_POST['izip']; } else { if($companyDetail['si_zip']!="" || $companyDetail['si_zip']!= null) echo $companyDetail['si_zip']; else echo "-"; } ?>"  />
											<input type="hidden" name="country_v"    id="country_v" value="<?php  echo $companyDetail['country_id'];  ?>"  />
											<input type="hidden" name="country_i"    id="country_i" value="<?php  echo $companyDetail['country_id'];  ?>"  />
											<input type="hidden" name="same_invoice"    id="same_invoice"  value="<?php if(isset($_POST['invoice_address'])){ echo $_POST['same_invoice']; } else {  echo $companyDetail['is_invoice_same'];   } ?>"    />
											
											<input type="hidden" name="icity"    id="icity"  value="<?php if(isset($_POST['invoice_address'])){ echo htmlentities($_POST['icity'],ENT_NOQUOTES, 'ISO-8859-1'); } else { if($companyDetail['si_city']!="" || $companyDetail['si_city']!= null) echo $companyDetail['si_city']; else echo "-"; } ?>"    />
											
											<input type="hidden" name="i_port_number"    id="i_port_number"  value="<?php if(isset($_POST['invoice_address'])){ echo $_POST['i_port_number']; } else { if($companyDetail['i_port_number']!="" || $companyDetail['i_port_number']!= null) echo $companyDetail['i_port_number'];  } ?>"    />
											
											<input type="hidden" id="invoice_address" name="invoice_address" value="<?php if(isset($_POST['invoice_address'])){ echo $_POST['invoice_address']; } else { echo "0"; } ?> " />
											<input type="hidden" id="invoice_address" name="invoice_address" value="<?php if(isset($_POST['invoice_address'])){ echo $_POST['invoice_address']; } else { echo "0"; } ?> " />
												
										<div class="white_bg mart0  bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><i class="fas fa-piggy-bank"></i></div>
																	</div>
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">VAT</span></a> 
										
										<div class="fleft wi_100    xs-mar0 "> 
										 <input type="text" name="vat" id="vat" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" value="<?php if($companyDetail['vat']!="" || $companyDetail['vat']!= null) echo $companyDetail['vat']; else echo "-"; ?>"  >  </div>
													 </div>
																									 
												 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
							<div id="error_msg_form" class="red_txt fsz20"> </div>
									 </form>
									<div class="talc marb40 mart20 "> <a href="#" onclick="submitForm();"><input type="button" value="Update" class="forword minhei_55p t_67cff7_bg fsz18 ffamily_avenir"  ></a>
										
									
									</div>					
						 </div>
						 
						
					</div><div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="hei_80p"></div>
			
			<div id="keep-selected" class="wi_100 hei_64p dflex  alit_c justc_sb opa0 opa1_a pos_fix zi999 top-64p top0_a left0 padrl15 bxsh_0220_0_14_031-2_0_2_0150_0_12 bg_f trans_all2">
				<div class="dflex fxwrap_w alit_c padtb10">
					<div class="pos_rel marr15">
						<a href="#" class="keep-selected-clear dflex alit_c justc_c talc">
							<img src="<?php echo $path; ?>/html/keepcss/images/icons/icon-arrow-left.svg" width="24" height="24" class="maxwi_100 hei_auto" alt="Clear selection">
						</a>
						<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 left0 mart5 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
							<span class="dblock padrl8">Clear selection</span>
						</div>
					</div>
					<div class="marr15 fsz20 txt_0_54">
						<span id="keep-selected-count"></span> uppdatering
					</div>
				</div>
				<div class="keep-actions wi_100 xs-maxwi_150p  maxwi_250p dflex  padtb10">
					<div class="keep-action wi_40 pos_rel">
						<a href="#" class="show_popup_modal dblock opa50 opa1_h pad5 talc trans_opa1 blue_btn fsz16"  onclick="submit_value();" data-target="#gratis_popup_company_searched">
							Godkänn <!--  <img src="<?php echo $path; ?>html/keepcss/images/icons/pin.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Godkänn">-->
						</a>
						<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
							<span class="dblock padrl8 ">Godkänn</span>
						</div>
					</div>
					
				</div>
			</div>
			
			<!-- Edit news popup -->
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="marb20"> <img src="<?php echo $path;?>html/usercontent/images/gratis.png" class="maxwi_100 hei_auto" /> </div>
						<h2 class="marb25 pad0 bold fsz24 black_txt">Läs hela artikeln med SvD digital</h2>
						<div class="wi_60 dflex fxwrap_w marrla marb20 talc">
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						</div>
						<div class="marb25">
						<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
						<div>
							<button type="submit" class="wi_320p maxwi_100 lgn_hight_50 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
						</div>
						<div class="marb10 padtb20 pos_rel">
							<div class="wi_100 pos_abs zi1 pos_cenY brdt"></div> <span class="diblock pos_rel zi2 padrl10 white_bg">
								eller om du redan har en prenumeration
							</span> </div>
							<div class="padb30"> <a href="#" class="diblock padrl15 brd brdclr_dblue brdrad50 white_bg blue_bg_h lgn_hight_30 dark_grey_txt white_txt_h">Logga in</a> </div>
					</form>
				</div>
			</div>
			
			
			<!-- Sales popup -->
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="sales_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="wi_100 dtable marb30 brdt brdl brdclr_white">
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
						</div>
						<div class="marb25">
						<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
						<div>
							<button type="submit" class="wi_320p maxwi_100 lgn_hight_50 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
						</div>
					</form>
				</div>
			</div>
			
			
			<!-- Marketing popup -->
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="marketing_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="setter-base wi_100 dtable marb30 brdt brdl brdclr_white">
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
						</div>
						<div class="marb25">
						<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
						<div>
							<button type="submit" class="wi_320p maxwi_100 lgn_hight_50 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
						</div>
					</form>
				</div>
			</div>
			
			
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