<!doctype html>
<?php
	function base64_to_jpeg($base64_string, $output_file) {
		// open the output file for writing
		$ifp = fopen( $output_file, 'wb' ); 
		
		// split the string on commas
		// $data[ 0 ] == "data:image/png;base64"
		// $data[ 1 ] == <actual base64 string>
		$data = explode( ',', $base64_string );
		//print_r($data); die;
		// we could add validation here with ensuring count( $data ) > 1
		fwrite( $ifp, base64_decode( $data[1] ) );
		
		// clean up the file resource
		fclose( $ifp ); 
		
		return $output_file; 
	}
	$path1 = "../../html/usercontent/images/";
	//echo $companyDetail ['profile_pic']; die;
if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else {  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; $value_a="../../../../html/usercontent/images/default-profile-pic.jpg"; } ?>

<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		<script>
			
			
			var available_yes=0;
		</script>
		
		<script>
			function removeActive()
			{
				$("#menulist-dropdown2").removeClass('active');
				$("#menulist-dropdown3").removeClass('active');
				$("#menulist-dropdown4").removeClass('active');
			}
			function rActive()
			{
				
				$("#menulist-dropdown3").removeClass('active');
				$("#menulist-dropdown4").removeClass('active');
			}
			function raActive()
			{
				
				$("#menulist-dropdown2").removeClass('active');
				$("#menulist-dropdown4").removeClass('active');
			}
			function rbActive()
			{
				
				$("#menulist-dropdown3").removeClass('active');
				$("#menulist-dropdown2").removeClass('active');
			}
			
			var currentLang = 'sv';
		</script>
	</head>
	
	<body class="white_bg">
		
		<!-- HEADER -->
		<?php include 'CompanyHeaderUpdated.php'; ?>		<div class="clear" id=""></div>
		
		<div class="column_m pos_rel">
			
			<!-- SUB-HEADER -->
			
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5 mart40 xs-mart20" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					<!-- Left sidebar -->
					<div class="wi_240p fleft pos_rel zi50">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75">
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03  brdr_new fsz14" id="scroll_menu">
								
								<div class="column_m padb10 ">
									 <div class="padl10">
											<div class="sidebar_prdt_bx marr20 brdb_b padb10">
												<div class="white_bg tall">
												<!-- Logo -->
												<?php if($companyDetail['profile_pic']!=null || $companyDetail['profile_pic']!="") { ?><div class="pad20 wi_100 xs-wi_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz95 xs-fsz20  yellow_bg_a lgtgrey2_bg white_txt" style="height:180px;"><img src="<?php echo $imgs;  ?>" width="90px;" height="90px;" class="brdb_w"  style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 2%; "> </div><?php } else { ?>
												<div class="pad20 wi_100 xs-wi_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz95 xs-fsz20  yellow_bg_a lgtgrey2_bg black_txt" style="
													background-repeat: no-repeat;
													background-position: 50%;
													border-radius: 2%;
																	" ><?php echo substr(html_entity_decode($companyDetail['company_name']),0,1); ?></div> <?php } ?>
													<a href="#" class="black_txt fsz45 xs-fsz30 sm-fsz30 ">
														<!-- Meta -->
														<div class="padtr10 fsz15"> <span><?php echo substr(html_entity_decode($companyDetail['company_name']),0,20); ?></span>  </div>
													</a>
													</div>
											</div>		
											<div class="clear"></div>
										</div>
									</div>
								
								
									<ul class="marr20 pad0">
										<li class=" dblock padb10 padl8">
											<a href="https://www.safeqloud.com/user/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Hantera företaget</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock  padl8">
											<a href="../../Brand/employeeAccount/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Utforska appar</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
									</ul>
									
									
									<ul class="dblock mar0 padl10 fsz14">
										
										
										
										
										<!-- Newsfeed -->
										
										
										<li class="dblock pos_rel padb10 padt10  brdclr_hgrey brdclr_pblue2_a ">
											<h4 class="padb5 uppercase ff-sans black_txt trn hidden">Employee Specific</h4>
											<ul class="marr20 pad0">
												
												<li class="dblock padrb10">
													<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Mina uppgifter</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/EmployeeVisitors/visitorInfo/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Besökare</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/BudandLeverans/employeePackageInfo/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Bud & Leverans</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
											</ul>
											
										</li>
										
										<li class="dblock pos_rel  padt10  brdclr_hgrey brdclr_pblue2_a">
											<h4 class="padb5 uppercase ff-sans black_txt trn">Om bolaget</h4>
											<ul class="marr20 pad0">
												
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/user/index.php/ViewCompany/companyAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Företagsprofil</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>	
												
												
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/ManageEmployee/magazineAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Anställda</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Om oss</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Karriär</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												
												
											</ul>
											
										</li>
										
										
									</ul>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					
					<!-- Center content -->
					<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5  xs-padl0 padl20">
						
						
						
						<!-- Center content -->
						
						
						<!-- Center content -->
						
						<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10  xs-pad0 hide ">
							<div class="talc fsz75 red_txt"> <span class="fas fa-sign-in-alt"></span></div>
							<div class="padb10 ">
								<h1 class="padb5 talc fsz50 xs-fsz40 bold ">Samtycke</h1>
								<p class="pad0 xs-padb10 talc fsz22 xs-fsz20 padb0 wi_720p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10 ">Dessa uppgifter har du gett samtycke till att dela. Du kan alltid ändra dessa.</p>
							</div>
							
						</div>
						<div class="column_m container tab-header  talc dark_grey_txt mart5 marb20">
							<div class="wrap maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb_new">
								<div class="white_bg tall">
									
									
									
									
									<!-- Logo -->
									<h1 class="fsz25 bold">Mina delade uppgifter</h1>
									<!-- Logo -->
									<div class="marb0"> <a href="#" class="blacka1_txt fsz15 xs-fsz16 sm-fsz16  edit-text jain_drop_company">Här kan du välja de uppgifter som du vill att din arbetsgivare ska ha tillgång till. </a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
										<!-- Meta -->
										
									</a></div>
									
							</div>
						</div>
						
						<!-- Summary -->
						<div class="tab-content " id="tab_total" style="display: block;">
							
							<table class="wi_100 " cellpadding="0" cellspacing="0">
								
								<tbody id="pending">
									<tr class="fsz14 white_bg ">
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5 bold uppercase">Bas uppgifter</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											
										</td>
									</tr>
									<tr class="fsz14 white_bg">
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">SSN</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="ssn" id="ssn" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="fsz14 white_bg">
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">Name</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked ">
													<input type="checkbox" name="first_name" id="first_name" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="fsz14 white_bg">
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">Last Name</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="last_name" id="last_name" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="fsz14 white_bg">
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">DOB (Day)</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked ">
													<input type="checkbox" name="dob_day" id="dob_day" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="fsz14 white_bg">
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">DOB (Month)</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="dob_month" id="dob_month" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
										
										
									</tr>
									<tr class="fsz14 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">DOB (Year)</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="dob_year" id="dob_year" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									
									<tr class="fsz14 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">Sex</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="sex" id="sex" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
										<tr class="fsz14 white_bg">
										<td class="pad5  tall">
											
										</td>
										
										<td class="pad5  tall">
											<div class="padtb5">
												
											</div>
										</td>
									</tr>
									<tr class="fsz14 white_bg ">
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5 bold uppercase">Hem adress</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											
										</td>
									</tr>
									<tr class="fsz14 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">City</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="city" id="city" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									<tr class="fsz14 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">State</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="state" id="state" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="fsz14 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">Zip</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="zip" id="zip" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="fsz14 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">Address</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="address" id="address" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									<tr class="fsz14 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">Country</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="country" id="country" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									<tr class="fsz14 white_bg">
										<td class="pad5  tall">
											
										</td>
										
										<td class="pad5  tall">
											<div class="padtb5">
												
											</div>
										</td>
									</tr>
									<tr class="fsz14 white_bg ">
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5 bold uppercase">Telefon nummer</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											
										</td>
									</tr>
									<tr class="fsz14 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Telephone</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="tel" id="tel" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="fsz14 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">Mobile</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="mobile_p" id="mobile_p" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="fsz14 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Marital Status</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="marital_status" id="marital_status" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
								
									<tr class="fsz14 white_bg">
										<td class="pad5  tall">
											
										</td>
										
										<td class="pad5  tall">
											<div class="padtb5">
												
											</div>
										</td>
									</tr>
									<tr class="fsz14 white_bg ">
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5 bold uppercase">Arbete</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											
										</td>
									</tr>
									<tr class="fsz14 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Nationality</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="nation" id="nation" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="fsz14 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Employee Number</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="e_number" id="e_number" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="fsz14 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Hiring Date</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="s_date" id="s_date" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="fsz14 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Resigned Date</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="r_date" id="r_date" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="fsz14 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Work Phone</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="phone" id="phone" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="fsz14 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Work Mobile</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="mobile" id="mobile" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="fsz14 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Work Email</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="email" id="email" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									
								</tbody>
								
							</table>
							
							
						</div>
						
						
						
						
						
						
						<div class="wi_360p talc col-xs-12 col-sm-12 pos_rel zi5 marrla mart30"> <a href="#" class="wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2 bold" >Submit</a> 
							
						</div>
					</div>
					
					
					
					
					
					
					
					
					
				</div>
			</div>
			<div class="clear"></div>
			<div class="hei_80p"></div>
		</div>
		
		<!-- Edit news popup -->
		<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
			<div class="modal-content pad25 brd nobrdb_new talc">
				<form method="POST" >
					<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">TJÄNSTEN är en del av vårt premiuminnehåll</h3>
					<div class="marb20">
						<img src="<?php echo $path; ?>html/usercontent/images/gratis.png" class="maxwi_100 hei_auto" />
					</div>
					<h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
					<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
					<div class="wi_75 dflex fxwrap_w marrla marb20 tall">
						<div class="wi_50 marb10">
							<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
							<span class="valm">Hålla dig  uppdaterad inom arbetsrätt</span>
						</div>
						<!--<div class="wi_50 marb10">
							<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
							<span class="valm">Läsa nyheter och  följa trender </span>
						</div>-->
						<div class="wi_50 marb10">
							<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
							<span class="valm">Använda smarta webblösningar</span>
						</div>
						<div class="wi_50 marb10">
							<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
							<span class="valm">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
						</div>
						<div class="wi_50 marb10">
							<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
							<span class="valm">Utföra bakgrundskontroller på din personal eller nästa rekryt </span>
						</div>
						<!--<div class="wi_50 marb10">
							<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
							<span class="valm">Men nästa gång behovet dyker upp då finns allting färdigt.</span>
						</div>-->
					</div>
					
					<div class="marb10">
						<input type="text" id="email_text" name="email_text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" />
					</div>
					<div>
						<input type="button" value="Prova gratis" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp"/>
						<input type="hidden" id="indexing_savee" name="indexing_savee" >
					</div>
					<div class="marb10 padtb10 pos_rel">
						<div class="wi_100 pos_abs zi1 pos_cenY brdt"></div>
						<span class="diblock pos_rel zi2 padrl10 white_bg">
							eller om du redan har en prenumeration
						</span>
					</div>
					<div class="padb0">
						<a href="#" class="diblock padrl15 brd brdclr_dblue brdrad50 white_bg blue_bg_h lgn_hight_30 dark_grey_txt white_txt_h">Logga in</a>
					</div>
				</form>
			</div>
		</div>
		
		
		
		<!-- Sales popup -->
		<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="sales_popup">
			<div class="modal-content pad25 brd nobrdb_new talc">
				<form>
					<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
					<div class="wi_100 dtable marb30 brdt brdl brdclr_white">
						<div class="dtrow">
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
						</div>
						<div class="dtrow">
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
						</div>
						<div class="dtrow">
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
						</div>
					</div>
					<div class="marb25">
					<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
					<div>
						<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
					</div>
				</form>
			</div>
		</div>
		
		
		<!-- Marketing popup -->
		<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="marketing_popup">
			<div class="modal-content pad25 brd nobrdb_new talc">
				<form>
					<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
					<div class="setter-base wi_100 dtable marb30 brdt brdl brdclr_white">
						<div class="dtrow">
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
						</div>
						<div class="dtrow">
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
						</div>
						<div class="dtrow">
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
						</div>
					</div>
					<div class="marb25">
					<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
					<div>
						<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
					</div>
				</form>
			</div>
		</div>
		
		
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
	</div>
	
	<div class="popup_modal wi_430p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14" id="gratis_popup_company">
		<div class="modal-content pad25 brd">
			<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
				Add Company
				<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
			</h3>
			<form method="POST" action="createCompanyAccount" id="save_indexing_company" name="save_indexing_company"  accept-charset="ISO-8859-1">
				
				<div class="marb15 "  >
					<label for="new-organization-name" class="sr-only">Company Name</label>
					<input type="text" id="company_name_add" name="company_name_add" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Company Name">
				</div>
				
				<div class="marb15 padt15"  >
					<label for="new-organization-name" class="sr-only">Website</label>
					<input type="text" id="company_website" name="company_website" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Website">
				</div>
				
				<div class="marb15 padt15"  >
					<label for="new-organization-name" class="sr-only">Company Email</label>
					<input type="text" id="company_email" name="company_email" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Company Email">
				</div>
				
				<div class="marb15 padt15">
					<label for="new-organization-under" class="txt_0">Industry</label>
					<select name="inds" id= "inds" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" >
						
						<option value="0">--Select--</option>
						<?php  foreach($resultIndus as $category => $value) 
							{
								$category = htmlspecialchars($category); 
								echo '<option value="'. $value['id'] .'">'. $value['name'] .'</option>';
							}
						?>
					</select>
				</div>
				
				<div class="marb15 padt15">
					<label for="new-organization-under" class="txt_0">Country</label>
					<select name="cntry" id= "cntry" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" >
						
						<option value="0">--Select--</option>
						<?php  foreach($resultContry as $category => $value) 
							{
								$category = htmlspecialchars($category); 
								echo '<option value="'. $value['id'] .'">'. $value['country_name'] .'</option>';
							}
						?>
					</select>
				</div>
				
				
				<div class="mart30 talr">
					<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
					<input type="button" value="Submit" class="marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_3367d6 curp" onclick="validateAddCompany();" />
					<input type="hidden" name="indexing_save_company" id="indexing_save_company" />
				</div>
			</form>
		</div>
	</div>
	
	
	
	<!-- CALLBACK 
		<div class="column_m zi10 frtred_bg">
		<div class="wrap maxwi_100 padtb60 padrl15 talc white_txt fsz16">
		<h2 class="padb15 fsz44 white_txt">Räkna ut kostnaden för ditt medlemskap</h2>
		<p class="padb15 uppercase">Välj medlemskap, ange postnummer och antal anställda och se årskostnad</p>
		<form>
		<div class="dflex fxwrap_w justc_c marrl-5">
		<div class="wi_25 sm-wi_33 xs-wi_33 xxs-wi_100 bs_bb marb15 padrl5">
		<label class="sr-only" for="callback-select">Type</label>
		<select class="wi_100 jui-select" id="callback-select" data-button-classes="wi_100_i hei_36p padt9 padrl15 nobrd frtdred_bg_i white_txt_i" data-icon-classes="fa fa-angle-down marr-10 bgi_none_i txtind0" data-menu-classes="fsz16">
		<option value="1">Företagare</option>
		<option value="2">Nystartad företagare</option>
		<option value="3">Ung företagare</option>
		<option value="4">Student</option>
		<option value="5">Stödjande</option>
		</select>
		</div>
		<div class="wi_25 sm-wi_33 xs-wi_33 xxs-wi_100 bs_bb marb15 padrl5">
		<label class="sr-only" for="callback-text">Ange ditt postnummer</label>
		<input type="text" class="wi_100 hei_36p padrl10 nobrd brdrad3 frtdred_bg fsz16 white_txt" id="callback-text" placeholder="Ange ditt postnummer" /> </div>
		<div class="wi_25 sm-wi_33 xs-wi_33 xxs-wi_100 bs_bb marb15 padrl5">
		<label class="sr-only" for="callback-number">Ange antal anställda</label>
		<input type="number" class="wi_100 hei_36p padrl10 nobrd brdrad3 frtdred_bg fsz16 white_txt" id="callback-number" placeholder="Ange antal anställda" /> </div>
		<div class="wi_100p xxs-wi_100 bs_bb marb15 padrl5">
		<button type="submit" class="wi_100 hei_36p nobrd brdrad3 white_bg frtgrey_bg_h fsz16 frtred_txt curp trans_all2">Räkna ut</button>
		</div>
		</div>
		</form>
		<p class="padt15 padb15 uppercase"> <a href="#" class="white_txt" target="_blank">Läs mer om medlemskapet</a> </p>
		</div>
		</div>
		<div class="clear"></div>
	-->
	
	<!-- ADVANTAGES 
		<div class="column_m zi10 frtlgrey_bg">
		<div class="wrap maxwi_100 padt30 padb10 padrl15 fsz16 dark_grey_txt">
		<h2 class="padb15 talc fsz44 dark_grey_txt">Förmåner &amp; Försäkringar</h2>
		<p class="padb15 uppercase talc">Ingår i ditt medlemskap</p>
		<div class="slick-slider dflex alit_s marrl-15 padt15" data-slick-settings="dots:true,arrows:false,infinite:true,slidesToShow:4,slidesToScroll:1" data-slick-sm-settings="dots:true,arrows:false,infinite:true,slidesToShow:3,slidesToScroll:1" data-slick-xs-settings="dots:true,arrows:false,infinite:true,slidesToShow:2,slidesToScroll:1" data-slick-xxs-settings="dots:true,arrows:false,infinite:true,slidesToShow:1,slidesToScroll:1">
		<div class="pos_rel marb30 padrl15 padb40">
		<div> <img src="<?php echo $path;?>html/usercontent/images/news/foretagarna1.jpg" width="265" height="177" class="wi_100 hei_auto dblock marb15" title="Affärsnätverket" alt="Affärsnätverket" />
		<h3 class="padb10 fsz24 dark_grey_txt">Affärsnätverket</h3>
		<div> Hitta andra företagare och få nya kunder med Företagarnas Affärsnätverk. Sök medlemmar, beställ offerter och gör affärer! </div> <a href="#" class="dblock pos_abs bot0 left15p undln_h bold frtgreen_txt">Läs mer</a> </div>
		</div>
		<div class="pos_rel marb30 padrl15 padb40">
		<div> <img src="<?php echo $path;?>html/usercontent/images/news/foretagarna2.jpg" width="265" height="177" class="wi_100 hei_auto dblock marb15" title="Försäkringar" alt="Försäkringar" />
		<h3 class="padb10 fsz24 dark_grey_txt">Försäkringar</h3>
		<div> Omfattande försäkringspaket anpassat för dig som företagare. Vi har försäkringar för dig, ditt företag och dina anställda. </div> <a href="#" class="dblock pos_abs bot0 left15p undln_h bold frtgreen_txt">Läs mer</a> </div>
		</div>
		<div class="pos_rel marb30 padrl15 padb40">
		<div> <img src="<?php echo $path;?>html/usercontent/images/news/foretagarna3.jpg" width="265" height="177" class="wi_100 hei_auto dblock marb15" title="Rådgivningen" alt="Rådgivningen" />
		<h3 class="padb10 fsz24 dark_grey_txt">Rådgivningen</h3>
		<div> Ring våra jurister kostnadsfritt när du behöver hjälp med en juridisk fråga! Eller sök rätt på svaret i vår FAQ. </div> <a href="#" class="dblock pos_abs bot0 left15p undln_h bold frtgreen_txt">Läs mer</a> </div>
		</div>
		<div class="pos_rel marb30 padrl15 padb40">
		<div> <img src="<?php echo $path;?>html/usercontent/images/news/foretagarna4.jpg" width="265" height="177" class="wi_100 hei_auto dblock marb15" title="Förmåner" alt="Förmåner" />
		<h3 class="padb10 fsz24 dark_grey_txt">Förmåner</h3>
		<div> Spar tid och pengar genom att nyttja våra medlemsförmåner. Erbjudanden och rabatter på allt från bilar, drivmedel, resor, telefoni och hårdvara. </div> <a href="#" class="dblock pos_abs bot0 left15p undln_h bold frtgreen_txt">Läs mer</a> </div>
		</div>
		</div>
		</div>
		<style>
		.slick-dots li button:before {
		font-size: 15px;
		color: #00c0a9!important;
		}
		</style>
		</div>
		<div class="clear"></div>
	-->
	
	
	<!-- New client modal -->
	
	<!-- Slide fade -->
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script>
		
		// Charts
		google.charts.load('current', { 'packages': ['corechart'] });
		
		
		// Line Chart
		google.charts.setOnLoadCallback(drawLineChartInhouse);
		function drawLineChartInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawLineChartStaffing);
		function drawLineChartStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawLineChartRecruiting);
		function drawLineChartRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawLineChartBackgroundChecks);
		function drawLineChartBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		// Donut Chart
		// - yearly
		google.charts.setOnLoadCallback(drawDonutChartYearlyInhouse);
		function drawDonutChartYearlyInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartYearlyStaffing);
		function drawDonutChartYearlyStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartYearlyRecruiting);
		function drawDonutChartYearlyRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartYearlyBackgroundChecks);
		function drawDonutChartYearlyBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		// - monthly
		google.charts.setOnLoadCallback(drawDonutChartMonthlyInhouse);
		function drawDonutChartMonthlyInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartMonthlyStaffing);
		function drawDonutChartMonthlyStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartMonthlyRecruiting);
		function drawDonutChartMonthlyRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartMonthlyBackgroundChecks);
		function drawDonutChartMonthlyBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		// - daily
		google.charts.setOnLoadCallback(drawDonutChartDailyInhouse);
		function drawDonutChartDailyInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartDailyStaffing);
		function drawDonutChartDailyStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartDailyRecruiting);
		function drawDonutChartDailyRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartDailyBackgroundChecks);
		function drawDonutChartDailyBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		tinyMCE.init({
			selector: '.texteditor',
			plugins: ["advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"],
			toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist ",
			//toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
			//toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
			menubar: false,
			toolbar_items_size: 'small',
			style_formats: [
			{
				title: 'Bold text',
				inline: 'b'
			},
			{
				title: 'Red text',
				inline: 'span',
				styles:
				{
					color: '#ff0000'
				}
			},
			{
				title: 'Red header',
				block: 'h1',
				styles:
				{
					color: '#ff0000'
				}
			},
			{
				title: 'Example 1',
				inline: 'span',
				classes: 'example1'
			},
			{
				title: 'Example 2',
				inline: 'span',
				classes: 'example2'
			},
			{
				title: 'Table styles'
			},
			{
				title: 'Table row 1',
				selector: 'tr',
				classes: 'tablerow1'
			}],
			templates: [
			{
				title: 'Test template 1',
				content: 'Test 1'
			},
			{
				title: 'Test template 2',
				content: 'Test 2'
			}]
		});
	</script>
</body>

</html>