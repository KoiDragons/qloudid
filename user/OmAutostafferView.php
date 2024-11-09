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
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
			
			var currentLang = 'sv';
		</script>
	</head>
	
	<body class="white_bg">
		
		<!-- HEADER -->
		<?php include 'CompanyHeaderUpdated.php'; ?>
		<div class="clear" id=""></div>
		
		
		<div class="column_m pos_rel">
			
			<!-- SUB-HEADER -->
			
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5  mart40 xs-mart20" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					<div class="wi_240p fleft pos_rel zi50">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75">
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03  brdr_new fsz14" id="scroll_menu">
									<div class="column_m padb10 ">
										<div class="padl10">
											<div class="sidebar_prdt_bx marr20 brdb_b padb20">
												<div class="white_bg tall">
												<!-- Logo -->
												<div class="pad20 wi_100 xs-wi_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz95 xs-fsz20 brdrad1000 yellow_bg_a yellownew_bg white_txt" style="
													background-repeat: no-repeat;
													background-position: 50%;
													border-radius: 2%;
													" id="aa_1227620">R</div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
														<!-- Meta -->
														<div class="padtr10 fsz15"> <span>Receptionist Portal</span>  </div>
													</a></div>
											</div>		
											<div class="clear"></div>
										</div>
									</div>
									
									
									<ul class="marr20 pad0">
										<li class=" dblock padb10 padl8 hidden">
											<a href="../../ConsentPlatformBusiness/companyAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Samtyckesplattform</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock padb10 padl8 hidden">
											<a href="https://www.safeqloud.com/user/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class="lgtgrey_bg hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Företagsuppgifter</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock padb10 padl8 hidden">
											<a href="https://www.safeqloud.com/company/index.php/CompanyProperty/locationAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Kontor</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock padb10 padl8 hidden">
											<a href="https://www.safeqloud.com/user/index.php/CompanyCustomers/companyAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Delade uppgifter</span><span class="counter_position"><?php echo $customerRequestReceivedCount; ?></span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock  padl8 ">
											<a href="https://www.safeqloud.com/user/index.php/Brand/brandAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Utforska appar</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
									</ul>
									
									
									<ul class="dblock mar0 padl10 fsz14">
										<li class="dblock pos_rel padb10 brdclr_hgrey hidden">
											
											<ul class="marr20 pad0">
												
												
												
												
												<li class="dblock padrb10">
													<a href="../../CompanyNews/companyNewsAccount/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Meddelande</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
											</ul>
											
										</li>
										<li class=" dblock pos_rel padb10   brdclr_hgrey brdclr_pblue2_a">
											<h4 class="padb5 uppercase ff-sans black_txt trn">Hantera</h4>
											<ul class="marr20 pad0">
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/user/index.php/WhitelistIP/ipAccount/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Besökare </span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10 ">
													<a href="https://www.safeqloud.com/company/index.php/BudandLeverans/packageInfo/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Bud & Leverans</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/Parkering/parkingInfo/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Parkering</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												
												
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/ForloratOchUpphittat/forloratInfo/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Förlorat & upphittat</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												
											</ul>
											
										</li>
										
										
										<li class=" dblock pos_rel padb10   brdclr_hgrey brdclr_pblue2_a">
											<h4 class="padb5 uppercase ff-sans black_txt trn">Till reception</h4>
											<ul class="marr20 pad0">
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/OmInkop/inkopAccount/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Inköp</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
											
												<li class="dblock padrb10">
													<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn"> Till Bemanna </span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/MeetingRoom/roomSpaceDetail/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn"> Meeting rooms </span>
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
					<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5   padl20 xs-padl0">
						
						
						
						
						
						
						<div class="padb20 xxs-padb0 ">
							
							<div class="wrap maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb_new">
								<div class="white_bg tall">
									
									
									
									
									<!-- Logo -->
									<h1 class="fsz25 bold">Hitta rätt personal idag.</h1>
									<!-- Logo -->
									<div class="marb0"> <a href="#" class="blacka1_txt fsz15 xs-fsz16 sm-fsz16  edit-text jain_drop_company">En direkt kontakt med en pool av kvalificerade leverantörer</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
										<!-- Meta -->
										
									</a></div><div class="hidden-xs hidden-sm padrl10">
									<a href="https://www.safeqloud.com/user/index.php/Bemanna/bemannaAccount/<?php echo $data['cid']; ?>" class="diblock padrl20 brd brdrad3 lgtgrey_bg ws_now lgn_hight_29 fsz14 black_txt " target="blank">
										
										<span class="valm">Skapa förfråga</span>
									</a> <span class="fas fa-cog fsz22 padl10 lgn_hight_29 valm"></span>
								</div>
								
								
							</div>
							
							
							<div class="column_m pos_rel">
								
								<div class="column_m pos_rel white_bg padtb0 yellowpink_bg  xs-padrl0">
									<div class="pos_rel bgir_norep bgip_r">
										<div class="wi_100 ovfl_hid xs-dnone pos_abs zi1 top0 left0">
											<div class="wrap maxwi_100">
												
											</div>
										</div>
										<div class="wrap maxwi_100 minhei_85vh dflex alit_c pos_rel zi2 padtb20 padrl20">
											<div>
												
												<div class="dflex xs-dblock fxwrap_w padb0 xs-padt0 xs-padb0">
													<div class="wi_50 xs-wi_100 order_2 padrl10">
														<img src="https://www.safeqloud.com/html/smartappcss/images/smart/design-1.png" width="642" height="439" class="maxwi_100 hei_auto">
													</div>
													<div class="wi_50 xs-wi_100 padtb0 sm-padtb55 md-padtb70 lg-padtb90 padr20 txt_708198">
														<h2 class="bold marb20 pad0 tall xs-talc fntwei_300 fsz55 sm-fsz32 md-fsz36 lg-fsz40 black_txt xs-fsz30">Hitta personal. Jämför leverantörer.<div class="wi_50p maxwi_100 hei_4p mart5 xs-marrla black_bg"></div>
														</h2>
														
														<ul class="mar0 pad0 tall fsz18 black_txt">
															<li class="wi_100 dflex marb15 first">
																<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																<div class="flex_1 alself_s padl10">
																Du sparar dyrbar tid</div>
															</li>
															<li class="wi_100 dflex marb15">
																<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																<div class="flex_1 alself_s padl10">
																Du sparar pengar</div>
															</li>
															<li class="wi_100 dflex marb15">
																<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																<div class="flex_1 alself_s padl10">
																	Jämförelse data
																</div>
															</li>
															<li class="wi_100 dflex marb15 last">
																<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																<div class="flex_1 alself_s padl10">
																	Expert hjälp
																</div>
															</li>
														</ul>
													</div></div>
											</div>
										</div>
										
									</div>
									
									
									
								</div>
								
								<div class="clear"></div>
								
								
								
								
								
								<!-- CONTENT -->
								<div class="column_m container zi5  mart40 xs-mart30 padr0">
									<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
										
										
										<!-- Center content -->
										<div class="wi_640p col-xs-12 col-sm-12 fleft pos_rel zi5  fsz14 padr0">
											
											
											<div class="column_m marb0 xs-padtb10 talc lgn_hight_22 fsz16 brdb_new hidden">
												<div class="start-perks column_m xs-padtb10 talc lgn_hight_22 fsz16 ">
													
													<div class="wrap maxwi_100 xs-padrl10">
														
														<div class="padb0 mart20 tall">
															<h3 class="padb10  fsz30 black_txt"><a href="#" class="black_txt padb10">Chefer får...</a></h3>
															<div class="dflex alit_fs justc_sb">
																<span class="flex_1  padb10 fsz18">Convince investors by demonstrating your understanding of how to build a scaling company.</span>
																<a href="#" class="toggle-btn dblock fxshrink_0 marr-10 marl20 padrl10 fsz20 txt_00a4bd">
																	<span class="fa fa-plus dblock dnone_pa"></span>
																	<span class="fa fa-minus dnone dblock_pa"></span>
																</a>
															</div>
															<div class="wi_50p marb20 brdt_new  brdwi_3"></div>
															
															
															
														</div>
														<div class="wi_100 dflex fxwrap_w alit_s xs-alit_c justc_c pos_rel mart0">
															<div class="wi_50 sm-wi_50 xs-wi_100 maxwi_400p flex_1 pad15 brdr_new  xs-nobrdr brdb_new">
																<img src="../../html/usercontent/images/2.png" class="wi_100 hei_200p dblock marb10">
																<h3 class="lgn_hight_s12 bold fsz20 padt10"> FAQ Nätverket</h3>
																
															</div>
															<div class="wi_50 sm-wi_50 xs-wi_100 maxwi_400p flex_1 pad15 sm-nobrdr xs-nobrdr brdb_new">
																<img src="../../html/usercontent/images/5.png" class="wi_100 hei_200p dblock marb10 padrl20">
																<h3 class="lgn_hight_s12 bold fsz20 padt10">Trendwatch</h3>
																
																
															</div>
															<div class="wi_50 sm-wi_50 xs-wi_100 maxwi_400p flex_1 pad15   xs-nobrdr  brdr_new">
																<img src="../../html/usercontent/images/4.png" class="wi_90 hei_200p dblock marb10 padl25">
																<a href="https://www.qmatchup.com/beta/user/index.php/PublicAppstoreStart"><h3 class="lgn_hight_s12 bold fsz20 padt10">Appar &amp; Mallar</h3></a>
																
															</div>
															<div class="wi_50 sm-wi_50 xs-wi_100 maxwi_400p flex_1 pad15 sm-nobrdr xs-nobrdr  ">
																<img src="../../html/usercontent/images/3.png" class="wi_100 hei_200p dblock marb10 mart5">
																<a href="https://www.qmatchup.com/beta/user/index.php/PublicManagedServicesStart"><h3 class="lgn_hight_s12 bold fsz20 padt10">Smarta Inköp</h3></a>
																
															</div>
															
														</div>	
														
													</div>
												</div>
											</div>
											
											
											<div class="column_m container zi5 padt0 fsz18">
												
												<!-- Section 1 -->
												<div class="xs-padrl10 brdb_new">
													<div class="wrap maxwi_100 padb30">
														<div class="dflex xs-fxwrap_w alit_c">
															<div class="xs-wi_100 flex_1">
																
																<h2 class=" mart0 marb10 pad0 tall lgn_hight_s12 fsz30 bold">Vad är Autostaffer...</h2>
																<div class="wi_50p marb20 brdt_new  brdwi_3"></div>
																<p>Autostaffer hjälper dig kommunicera med tusentals kvalificerade bemanning och rekryteringsföretag och komma underfund med vilka som är intresserade och kan att leverera på ditt uppdrag. 
																</p>
																
																<h3 class="mart20 padb15 fsz25">Med Autostaffer</h3>
																<ul class="mar0 pad0 tall">
																	
																	<li class="wi_100 dflex marb15">
																		<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																		<div class="flex_1 alself_s padl10">
																			<em>når Du ut till över 1000 tjänsteföretag, </em>
																		</div>
																	</li>
																	
																	
																	
																	
																	<li class="wi_100 dflex marb15">
																		<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																		<div class="flex_1 alself_s padl10">
																			<em>Går det fort att skapa förfrågan</em>
																		</div>
																	</li>
																	
																	<li class="wi_100 dflex marb15">
																		<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																		<div class="flex_1 alself_s padl10">
																			<em>Får du snabba svar tillbaka</em>
																		</div>
																		</li><li class="wi_100 dflex marb15">
																		<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																		<div class="flex_1 alself_s padl10">
																			<em>blir det enkelt att hitta en bra leverantör </em>
																		</div>
																	</li>
																	<li class="wi_100 dflex marb15 last">
																		<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																		<div class="flex_1 alself_s padl10">
																			<em>är det enklare att jämföra leverantörer.</em>
																		</div>
																	</li>
																	<li class="wi_100 dflex marb15">
																		<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																		<div class="flex_1 alself_s padl10">
																			<em>är det gratis. Du betalar ingenting </em>
																		</div>
																		</li><li class="wi_100 dflex marb15">
																		<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																		<div class="flex_1 alself_s padl10">
																			<em>är Du anonym.</em>
																		</div>
																	</li>
																	
																</ul>
																
																
																<div class="mart30">
																	<a href="#" class="maxwi_200p minhei_50p dflex justc_c alit_c opa90_h brdrad3 tmgreen_bg talc bold fsz18 xs-fsz16 white_txt trans_all2">Kom igång idag</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												
												
												<!-- Section 2 -->
												
												
												
												<div class="xs-padrl10 brdb_new">
													<div class="wrap maxwi_100 padtb30">
														<div class="dflex xs-fxwrap_w alit_c">
															<div class="xs-wi_100 flex_1">
																<h2 class=" marb10 pad0 tall lgn_hight_s12 fsz30 bold">Så fungerar Autostaffer...</h2>
																<div class="wi_50p marb20 brdt_new  brdwi_3"></div>
																
																
																
																
																
																<h3 class="mart20 padb15 fsz25">1. Välj yrke</h3>
																<p class="brdb_new">Skriv yrket Du behöver i sökrutan, välj det från yrkeslistan, eller klicka Dig fram via branscherna ! 
																	
																</p>
																<h3 class="mart20 padb15 fsz25">2. Bemanningsföretagen svarar - vi mailar Dig</h3>
																<p class="brdb_new">Du får mail från oss när någon leverantör vill ha Ditt uppdrag! </p>
																<h3 class="mart20 padb15 fsz25">3. Jämför på Din svarslista!</h3>
																<p class="brdb_new">Du får mail från oss när någon leverantör vill ha Ditt uppdrag! </p>
																
																
																
																
																
																
																
																
																
																
																
																
																<div class="mart15">
																	<a href="#" class="maxwi_200p minhei_50p dflex justc_c alit_c opa90_h brdrad3 tmgreen_bg talc bold fsz18 xs-fsz16 white_txt trans_all2">Kom igång idag</a>
																</div>
															</div>
															<!--<div class="wi_250p fxshrink_0 pos_rel martb20 marl15 xs-marl0 pad10 brdrad10 bg_ddf0f1">
																<div class="wi_20p hei_20p pos_abs pos_cenX bot-10p bg_ddf0f1 rotate45"></div>
																<h4 class="fsz20">Vi gillar flexibilitet på Toborrow</h4>
																<div class="wi_50p marb20 brdt_new  brdwi_3"></div>
																<p>Vi gillar valfrihet och flexibilitet. Därför kan du välja att avsluta lånet i förtid, det vill säga betala tillbaka pengarna till dina långivare tidigare än planerat.</p>
															</div>-->
														</div>
													</div>
												</div>
												
												<!-- Section 4 -->
												<div class="xs-padrl10 brdb_new hidden">
													<div class="wrap maxwi_100 padtb30">
														<div class="dflex xs-fxwrap_w alit_c">
															<div class="xs-wi_100 flex_1">
																<h2 class=" marb10 pad0 tall lgn_hight_s12  bold">Kom igång: Skapa en förfrågan idag</h2>
																<div class="wi_50p marb20 brdt_new  brdwi_3"></div>
																<p>Grundkrav för säkra inköp mellan kund och leverantör:</p>
																<ul class="mar0 pad0 tall">
																	<li class="wi_100 dflex marb15 first">
																		<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																		<div class="flex_1 alself_s padl10">
																			<em>Registrerad för F-skatt</em>
																		</div>
																	</li>
																	<li class="wi_100 dflex marb15">
																		<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																		<div class="flex_1 alself_s padl10">
																			<em>Ingen anmärkning i Svensk Handels varningslista</em>
																		</div>
																	</li>
																	<li class="wi_100 dflex marb15 last">
																		<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																		<div class="flex_1 alself_s padl10">
																			<em>Minst ett bokslut för att kunna bedöma kreditvärdighet</em>
																		</div>
																	</li>
																</ul>
																<h3 class="mart30 padb15 fsz25">Snabbt och lätt att ansöka</h3>
																<p>Ansökan sker digitalt. Inga papper åker fram och tillbaka, inga möten behövs. Det ger minimala omkostnader, vilket avspeglas i bättre lånevillkor.</p>
																<h3 class="mart15 padb15 fsz25">Vad kostar ansökan?</h3>
																<p>Hos Toborrow samlas tusentals långivare som finansierar ditt lån genom att lägga bud i en aktion. På så vis tävlar våra långivare som att erbjuda dig den lägsta räntan. När budgivningen är slutförd kan du ta ställning till erbjudandet i lugn och ro.</p>
																<div class="mart15">
																	<a href="#" class="maxwi_200p minhei_50p dflex justc_c alit_c opa90_h brdrad3 tmgreen_bg talc bold fsz18 xs-fsz16 white_txt trans_all2">Kom igång idag</a>
																</div>
															</div>
															
															<!--	<div class="wi_250p fxshrink_0 pos_rel martb20 marl15 xs-marl0 pad10 brdrad10 bg_ddf0f1">
																<div class="wi_20p hei_20p pos_abs pos_cenX bot-10p bg_ddf0f1 rotate45"></div>
																<h4 class="fsz20">Fördelarna för dig som lånar via toborrow</h4>
																<ul class="mar0 pad0 tall">
																<li class="wi_100 dflex marb15 first">
																<span>&raquo;</span>
																<div class="flex_1 alself_s padl10">
																Du slipper bankernas byråkrati, villkor och krav på andra banktjänster
																</div>
																</li>
																<li class="wi_100 dflex marb15 first">
																<span>&raquo;</span>
																<div class="flex_1 alself_s padl10">
																Du behåller kontrollen över ditt företag och ägande
																</div>
																</li>
																<li class="wi_100 dflex marb15 first">
																<span>&raquo;</span>
																<div class="flex_1 alself_s padl10">
																Du vet vilka som lånar pengar till dig och får intresserade och engagerade investerare
																</div>
																</li>
																<li class="wi_100 dflex marb15 first">
																<span>&raquo;</span>
																<div class="flex_1 alself_s padl10">
																Du väljer själv löptid, om du vill amortera eller inte och hur du vill ställa säkerheter
																</div>
																</li>
																</ul>
																</div>
																
															-->
															
														</div>
													</div>
												</div>
												
												<!-- Section 5 -->
												<div class="xs-padrl10 brdb_new hidden">
													<div class="wrap maxwi_100 padtb30">
														<h2 class=" marb10 pad0 tall lgn_hight_s12  bold">Vad kostar ansökan?</h2>
														<div class="wi_50p marb20 "></div>
														<p>Att lämna förfrågan om att hitta lämpliga leverantörer kostar inget. Du betalar enbart när du valt en eller flera leverantör till uppdraget.</p>
														<ul class="mar0 pad0 tall">
															<li class="wi_100 dflex marb15 first">
																<span>-</span>
																<div class="flex_1 alself_s padl10">
																	Upp till 12 månader är avgiften 2% av beloppet du lånat.
																</div>
															</li>
															<li class="wi_100 dflex marb15">
																<span>-</span>
																<div class="flex_1 alself_s padl10">
																	Mellan 12 och 24 månader är avgiften 3% av beloppet du lånat.
																</div>
															</li>
															<li class="wi_100 dflex marb15 last">
																<span>-</span>
																<div class="flex_1 alself_s padl10">
																	Mellan 24 och 36 månader är avgiften 4% beloppet du lånat.
																</div>
															</li>
														</ul>
														<p>Avgiften tas ut när du accepterar ett låneerbjudande. Utöver detta betalar du räntan som långivarna erbjuder dig, om du accepterar lånet. Skulle du efter budgivningen välja att inte acceptera lånet kostar det ingenting.</p>
														<div class="mart15">
															<a href="#" class="maxwi_200p minhei_50p dflex justc_c alit_c opa90_h brdrad3 tmgreen_bg talc bold fsz18 xs-fsz16 white_txt trans_all2">Kom igång idag</a>
														</div>
													</div>
												</div>
												
											</div>
											
											
											<div class="column_m mart30 xs-padtb10 talc lgn_hight_22 fsz16 padb30 brdb_new hidden">
												
												<div class="wrap maxwi_100 xs-padrl10">
													<div class="mart20 tall">
														<h3 class="padb10  fsz30  black_txt"><a href="#" class="black_txt padb10 bold">Nätverket är för</a></h3>
														<div class="dflex alit_fs justc_sb">
															<span class="flex_1  padb10 fsz18">Convince investors by demonstrating your understanding of how to build a scaling company.</span>
															<a href="#" class="toggle-btn dblock fxshrink_0 marr-10 marl20 padrl10 fsz20 txt_00a4bd">
																<span class="fa fa-plus dblock dnone_pa"></span>
																<span class="fa fa-minus dnone dblock_pa"></span>
															</a>
														</div>
														<div class="wi_50p marb10 brdt_new  brdwi_3"></div>			
													</div>
													
													
													<div class="wi_100 dflex xs-fxdir_col alit_s xs-alit_c justc_c martb30">
														<div class="wi_50 xs-wi_100 maxwi_320p flex_1 padtb30 xs-brdb_new ">
															<span class="icon icon1"></span>
															<h4 class="fsz48 ">0-49 </h4><br>
															<h4 class="fsz20 marb20 padt10 bold">Antal anställda </h4>
															<!--<p>Ett digitalt nätverk av verifierade chefer och företagsledare från små, medelstora och stora bolag inom olika branscher och offentliga sektorn.</p>-->
															<!--<a href="#" class="martrl5 dblue_btn">Submit</a>-->
														</div>
														<div class="fxshrink_0 xs-dnone marrl30 sm-marrl15 brdl"></div>
														<div class="wi_50 xs-wi_100 maxwi_320p flex_1 padtb30">
															<span class="icon icon2"></span>
															<h4 class="fsz48 ">50-249 </h4><br>
															<h4 class="fsz20 marb20 padt10 bold">Antal anställda </h4>
															<!--	<p>Våra medlemmar träffar personer med samma chefsroll, för att säkerställa att utbyte av information, erfarenheter, tips och idéer är hög relevanta. Vi kvalitetsäkrar medlemmarnas roller och bolagets storlek årligen.</p>-->
															<!--<a href="#" class="martrl5 dblue_btn">Submit</a>-->
														</div>
														<div class="fxshrink_0 xs-dnone marrl30 sm-marrl15 brdl"></div>
														<div class="wi_50 xs-wi_100 maxwi_400p flex_1 padtb30">
															<span class="icon icon3"></span>
															<h4 class="fsz48 ">+250</h4><br>
															<h4 class="fsz20 marb20 padt10 bold">Antal anställda </h4>
															<!--<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now. </p>-->
															
														</div>
													</div>
												</div>
											</div>
											
											
											
											
											<div class="column_m marb30 xs-padtb10 talc lgn_hight_22 fsz16 hidden">
												<div class="wrap maxwi_100 xs-padrl10">
													<div class="padb0 mart20 tall">
														<h3 class="padb10  fsz30 black_txt"><a href="#" class="black_txt padb10 bold">Chefer kan arbeta...</a></h3>
														<div class="dflex alit_fs justc_sb">
															<span class="flex_1  padb10 fsz18">Convince investors by demonstrating your understanding of how to build a scaling company.</span>
															<a href="#" class="toggle-btn dblock fxshrink_0 marr-10 marl20 padrl10 fsz20 txt_00a4bd">
																<span class="fa fa-plus dblock dnone_pa"></span>
																<span class="fa fa-minus dnone dblock_pa"></span>
															</a>
														</div>
														
													</div>
													
													<div class="wi_100 dflex xs-fxdir_col alit_s xs-alit_c justc_c mart30">
														<div class="wi_33 xs-wi_100 maxwi_400p flex_1 xs-brdb_new pad15 brdr_new">
															<span class="icon icon1"></span>
															<img src="../../html/usercontent/images/workplace/appstore2.png" class="wi_100 hei_120p  dblock marb10">
															<h4 class="bold fsz18 padt10">Solo</h4>
															<p>Nivå Chef - innebär att endast du har tillgång till "Chefs" utbudet i nätverket. Du kommer få tillgång till den delen av utbud som endast berör chefer och företagsledare. </p>
															
														</div>
														<div class="fxshrink_0 xs-dnone  sm-marrl15 "></div>
														<div class="wi_33 xs-wi_100 maxwi_400p flex_1 pad15 brdr_new">
															<span class="icon icon2"></span>
															<img src="../../estorecss/appstore5.png" class="wi_100 hei_auto dblock marb10">
															<h4 class="bold fsz18 padt10">Med sitt team</h4>
															<p>Nivå team - innebär att Produkt &amp; Förmåns utbud utökas till "Chef&amp;Team". Du kan anpassa utbudet för varje teammedlem. Förmånshantering ingår </p>
															
														</div>
														<div class="fxshrink_0 xs-dnone  sm-marrl15 "></div>
														<div class="wi_33 xs-wi_100 maxwi_400p flex_1 padtb0">
															<span class="icon icon3"></span>
															<img src="../../html/usercontent/images/workplace/appstore1.png" class="wi_80 hei_120p  dblock marb10 padl30 padt10">
															<h4 class="bold fsz18 padt10">Med hela företaget</h4>
															<p>Nivå Företag - innebär att du har full åtkomst till hela utbudet. Som chef har du en flexibel position och kan tillgång till fler produkter samt förmåner för dig och ditt företag. </p>
															
														</div>
													</div>
												</div>
											</div>
											
											<div class="clear"></div>
										</div>
										
										
										
									</div>
								</div>
							</div>
							
							
							<div class="clear"></div>
						</div>
						
						<div class="clear"></div>
					</div>
					
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="wi_100 hidden-md hidden-lg  pos_fix zi50 bot0 left0 bs_bb padrl15 brdt lgtblue2_bg">
			
			<!-- primary menu -->
			<div class="tab-content active" id="mob-primary-menu" style="display: block;">
				<div class="wi_100 dflex alit_s justc_sb talc fsz16 xxs-fsz12">
					<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-clock-o"></span></div>
						<span>One time</span>
					</a>
					<a href="https://www.safeqloud.com/user/index.php/CompanyCustomers/companyAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-file-text-o"></span></div>
						<span>Ongoing</span>
					</a>
					<div class="tab-header">
						<a href="#" class="dark_grey_txt dblue_txt_h" data-id="mob-add-menu">
							<div class="wi_80p xxs-wi_50p hei_80p xxs-hei_50p pos_rel mart-30 xxs-mart-20 brd lgtblue2_bg brdrad100 talc lgn_hight_40 fsz32">
								<span class="wi_30p xxs-wi_25p hei_4p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
								<span class="wi_4p hei_30p xxs-hei_25p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
							</div>
						</a>
					</div>
					<a href="https://www.safeqloud.com/user/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-image"></span></div>
						<span>Store it</span>
					</a>
					<a href="https://www.safeqloud.com/user/index.php/Brand/brandAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_26 xxs-lgn_hight_20 fsz32 xxs-fsz24">
							<span class="fa fa-file-text-o"></span>
						</div>
						<span>Your brand</span>
					</a>
				</div>
			</div>
			
			<!-- add  menu -->
			<div class="tab-content padb10" id="mob-add-menu">
				<h2 class="martb15 pad0 talc bold fsz16">Add New</h2>
				<ul class="mar0 pad0 brdrad3 white_bg fsz14">
					<li class="dblock mar0 padrl15 brdb_new">
						<a href="#" class="show_popup_modal wi_100 minhei_50p dflex alit_c dark_grey_txt" data-target="#gratis_popup_code">
							<span class="fa fa-calendar-o wi_20p marr10 talc fsz18"></span>
							Create request
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb_new">
						<a href="#" class="show_popup_modal wi_100 minhei_50p dflex alit_c dark_grey_txt" data-target="#gratis_popup">
							<span class="fa fa-dollar wi_20p marr10 talc fsz18"></span>
							You got an invitation
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb_new">
						<a href="https://www.safeqloud.com/user/index.php/InformRelatives" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-sticky-note wi_20p marr10 talc fsz18"></span>
							Inform relatives
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb_new">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-user wi_20p marr10 talc fsz18"></span>
							Company
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb_new">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-image wi_20p marr10 talc fsz18"></span>
							Photo
						</a>
					</li>
					<li class="dblock mar0 padrl15">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-microphone wi_20p marr10 talc fsz18"></span>
							Audio Note
						</a>
					</li>
				</ul>
				<div class="tab-header mart10 brdrad3 white_bg talc lgn_hight_50 fsz18">
					<a href="#" class="" data-id="mob-primary-menu">Cancel</a>
				</div>
			</div>
		</div>
		
		
		<div class="clear"></div>
		<div class="hei_80p hidden-xs"></div>
		
		<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 brdrad10 " id="gratis_popup_unique" >
			<div class="modal-content pad25 brd nobrdb talc brdrad10">
				
				<form action="updateEmployeeDetail" method="POST" id="save_indexing_unique" name="save_indexing_unique">
					<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Premiuminnehåll</h3>
					<div class="marb20">
						<img src="../../../html/usercontent/images/gratis.png" class="maxwi_100 hei_auto">
					</div>
					<h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
					<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
						
						<!--<div class="wi_50 marb10">
							<img src="../../../html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
							<span class="valm">Läsa nyheter och  följa trender </span>
						</div>-->
						
						<div class="wi_100 marb10 talc">
							
							<span class="valm fsz16">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
						</div>
						
						
					</div>
					
					<div class="marb10">
						<input type="text" id="unique_id" name="unique_id" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz16" placeholder="Add the code">
					</div>
					<div>
						<input type="button" value="Prova gratis" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp" onclick="submit_unique();">
						<input type="hidden" id="indexing_save_unique" name="indexing_save_unique">
					</div>
					
					
				</form>
			</div>
		</div>
		
		<!-- Edit news popup -->
		<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
			<div class="modal-content pad25 brd nobrdb talc">
				<form action="updateEmployeeDetail" method="POST" id="save_indexing_unique" name="save_indexing_unique">
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
						<input type="text" id="unique_id" name="unique_id" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Please provide your unique code here" />
					</div>
					<div>
						<input type="button" value="Prova gratis" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp" onclick="submit_unique();"/>
						<input type="hidden" id="indexing_save_unique" name="indexing_save_unique" >
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
		
		
		<!-- Marketing popup -->
		<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="marketing_popup">
			<div class="modal-content pad25 brd nobrdb talc">
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
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad10 brd" id="gratis_popup_company_search">
		<div class="modal-content pad25 brd brdrad10">
			<div id="search_new">
				<h3 class="pos_rel marb10 pad0 padr40 bold fsz25 dark_grey_txt">
					Search Company
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				
				<div class="marb15 "  >
					<label for="new-organization-name" class="sr-only">Company Identification Number</label>
					<input type="text" id="cid_number" name="cid_number" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Company Identification Number">
				</div>
				
				
				
				<div class="mart30 talc">
					<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
					<input type="button" value="Submit" class="marl5 pad8 nobrd green_bg uppercase bold fsz14  curp white_txt brdrad5" onclick="searchCompany();" />
					
				</div>
				
			</div>
			
		</div>
	</div>
	
	
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_company_searched">
		<div class="modal-content pad25 brd brdrad10">
			<div id="searched">
				
				
			</div>
			
		</div>
	</div>
	
	
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company brdrad10 brd" id="gratis_popup_company">
		<div class="modal-content pad25 brd brdrad10 ">
			<h3 class="pos_rel marb25 pad0 padr40 bold fsz25 dark_grey_txt">
				Add Company
				<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
			</h3>
			<form method="POST" action="createCompanyAccount" id="save_indexing_company" name="save_indexing_company"  accept-charset="ISO-8859-1">
				
				<div class="marb10 padt10"  >
					<label for="new-organization-name" class="sr-only">Company Name</label>
					<input type="text" id="company_name_add" name="company_name_add" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Company Name">
				</div>
				
				<div class="marb10 padt10"  >
					<label for="new-organization-name" class="sr-only">Website</label>
					<input type="text" id="company_website" name="company_website" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Website">
				</div>
				
				<div class="marb10 padt10"  >
					<label for="new-organization-name" class="sr-only">Company Email</label>
					<input type="text" id="company_email" name="company_email" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Company Email">
				</div>
				
				<div class="marb10 padt10">
					<label for="new-organization-under" class="txt_0">Industry</label>
					<select name="inds" id= "inds" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica lgtgrey2_bg" >
						
						<option value="0">--Select--</option>
						<?php  foreach($resultIndus as $category => $value) 
							{
								$category = htmlspecialchars($category); 
								echo '<option value="'. $value['id'] .'">'. $value['name'] .'</option>';
							}
						?>
					</select>
				</div>
				
				<div class="marb10 padt10">
					<label for="new-organization-under" class="txt_0">Country</label>
					<select name="cntry" id= "cntry" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica lgtgrey2_bg" >
						
						<option value="0">--Select--</option>
						<?php  foreach($resultContry as $category => $value) 
							{
								$category = htmlspecialchars($category); 
								echo '<option value="'. $value['id'] .'">'. $value['country_name'] .'</option>';
							}
						?>
					</select>
				</div>
				
				
				<div class="mart30 talc">
					<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
					<input type="button" value="Submit" class="marl5 pad8 nobrd green_bg uppercase bold fsz14 white_txt curp padr10 brd brdrad5" onclick="validateAddCompany();" />
					<input type="hidden" name="indexing_save_company" id="indexing_save_company" />
				</div>
			</form>
		</div>
	</div>
	
	
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 brdrad10" id="sales_popup">
		<div class="modal-content pad25 brd brdrad10 ">
			
			<h3 class="pos_rel marb10 pad0 padr40 bold  fsz25 dark_grey_txt">Add Company
				<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
			</h3>
			
			<div class="wi_100 marb10 talc">
				
				<span class="valm fsz16">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
			</div>
			
			<div class="minwi_100 dflex fxwrap_w alit_s marrl-10 marb10 mart20" id="sales_popup_boxes">
				<div class="minwi_100 dtrow brdrad5 ">
					<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 lgtgrey2_bg marrl10" id="c1">
						
						<a href="#" class="wi_100 dblock red_bg_a lgn_hight_40 talc dark_grey_txt" onclick="changeBg('c1');">
							<span class="dnone_pa">Start subscribe</span>
							<span class="dnone dblock_pa">Unsubscribe</span>
						</a>
					</div>
				</div>
				<div class="minwi_100 dtrow brdrad5 mart10">
					<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 lgtgrey2_bg marrl10" id="c2">
						
						<a href="#" class="wi_100 dblock red_bg_a lgn_hight_40 talc dark_grey_txt " onclick="changeBg('c2');">
							<span class="dnone_pa">Start subscribe</span>
							<span class="dnone dblock_pa">Unsubscribe</span>
						</a>
					</div>
				</div>
				<div class="minwi_100 dtrow brdrad5 mart10">
					<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 lgtgrey2_bg marrl10" id="c3">
						
						<a href="#" class="wi_100 dblock red_bg_a lgn_hight_40 talc dark_grey_txt " onclick="changeBg('c3');">
							<span class="dnone_pa">Start subscribe</span>
							<span class="dnone dblock_pa">Unsubscribe</span>
						</a>
					</div>
				</div>
				<div class="minwi_100 dtrow brdrad5 mart10">
					<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 lgtgrey2_bg marrl10" id="c4">
						
						<a href="#" class="wi_100 dblock red_bg_a lgn_hight_40 talc dark_grey_txt " onclick="changeBg('c4');">
							<span class="dnone_pa">Start subscribe</span>
							<span class="dnone dblock_pa">Unsubscribe</span>
						</a>
					</div>
				</div>
				<div class="minwi_100 dtrow brdrad5 mart10">
					<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 lgtgrey2_bg marrl10" id="c5">
						
						<a href="#" class="wi_100 dblock red_bg_a lgn_hight_40 talc dark_grey_txt " onclick="changeBg('c5');">
							<span class="dnone_pa">Start subscribe</span>
							<span class="dnone dblock_pa">Unsubscribe</span>
						</a>
					</div>
				</div>
				
				
			</div>
			<script>
				function changeBg(id)
				{
					if($("#"+id).hasClass('lgtgrey2_bg'))
					{
						$("#"+id).removeClass('lgtgrey2_bg');
						$("#"+id).addClass('yellow_bg');
					}
					else
					{
						$("#"+id).addClass('lgtgrey2_bg');
						$("#"+id).removeClass('yellow_bg');
					}
				}
				
				
				/*$(document).ready(function(){
					$('#sales_popup_boxes a').on('click', function(){
					if($(this).hasClass("active"))
					{
					var id_val=$("#indexing_save").val();
					var id_val = id_val.replace($(this).attr('id')+',', "");
					$("#indexing_save").val(id_val);
					}
					else
					{
					var id_val=$("#indexing_save").val()+$(this).attr('id')+',';
					$("#indexing_save").val(id_val);
					}
					$(this).toggleClass('active');
					
					return false;
					})
				});*/
			</script>
			<div class="mart30 talc">
				<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
				<input type="button" value="Submit" class="marl5 pad8 nobrd green_bg uppercase bold fsz14 white_txt curp padr10 brd brdrad5"  />
				
			</div>
			
		</div>
	</div>
	
	<div class="popup_modal"  id="gratis_popup_user_profile">
		
		<div id="search_user_profile">
			
			
		</div>
		
		
	</div>
	<!-- New client modal -->
	
	<!-- Slide fade -->
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
	
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