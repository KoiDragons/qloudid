<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui-1.10.4.custom.html" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery.bxslider.css" />
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vendor.js"></script>
		<script>
			var currentLang = 'sv';
		</script>
	</head>
	<body class="user-signed-out">
		
		<!-- HEADER -->
		<div class="column_m header header_small bs_bb padrl10 white_bg" >
			<div class="padtb5">
				<div class="logo marr15">
					<a href="#"><img src="<?php echo $path;?>html/usercontent/images/qmatchup_logo_blue.png" alt="Qmatchup" title="Qmatchup" class="valb" /></a>
				</div>
				<div class="fleft padl10">
					<div class="languages">
						<a href="#" id="language_selector" class="padrl10"></a>
						<ul class="wi_100 mar0 pad5 blue_bg">
							<li class="dblock"><a href="#" class="pad5" data-lang="eng"><img src="<?php echo $path;?>html/usercontent/images/slide/flag_us.png" width="24" height="16" title="US" alt="US" /></a></li>
							<li class="dblock"><a href="#" class="pad5" data-lang="swd"><img src="<?php echo $path;?>html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="Sweden" alt="Sweden" /></a></li>
						</ul>
					</div>
				</div>
				<div class="fright">
					<ul class="mar0 pad0">
						<li class="dblock fright pos_rel">
							<form class="dblock mar0 pad0">
								<input type="email" name="email" placeholder="Enter you email" class="wi_150p hei_30p dblock fleft bs_bb padrl10 brd brdradtl3 nobrdr fsz12" />
								<button type="submit" class="translate hei_30pi dblock bs_bb padrl25 nobrd brdradrb3 btnorange_bg btnhorange_bg_h uppercase lgn_hight_30 bold fsz12 font_helvetica white_txt" id="usermenu_singup" data-en="Get Started" data-sw="Get Started">Get Started</button>
								<div class="clear"></div>
							</form>
						</li>
						<li class="dblock fright pos_rel brdl brdclr_dblue">
							<a href="https://www.qmatchup.com/beta/user/index.php/LoginAccount" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 blue3_txt white_txt_h" data-en="Sign In" data-sw="Logga In">Sign In</a>
						</li>
					</ul>
				</div>
				
				<div class="top_menu top_menu_custom mart5">
						<ul class="menulist sf-menu">
							<li class="app_menu app_menu-grey">
								<a href="#"></a>
								<ul>
									<li>
										<div class="top_arrow"></div>
									</li>
									<li>
										<div class="application_menu pad20">
											<ol>
												<li> <a href="#" class="business_prof"> <span></span> Business Profile </a> </li>
												<li> <a href="#" class="swedBank"> <span></span> SwedBank </a> </li>
												<li> <a href="#" class="posted_jobs"> <span></span> Posted Jobs </a> </li>
												<li> <a href="#" class="proposals"> <span></span> Proposals </a> </li>
												<li> <a href="#" class="bids"> <span></span> Bids </a> </li>
												<li> <a href="#" class="invoice"> <span></span> Invoice </a> </li>
											</ol>
											<div class="padb20">
												<div class="line"></div>
											</div>
											<div class="column_m"> <a href="#" class="contractor_btn"><span></span>Become a Contractor</a> </div>
											<div class="clear"></div>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				<div class="clear"></div>
				
			</div>
		</div>
		<div class="clear"></div>
		
		<!-- Sub-header -->
		<div class="column_m sub_header scroll-fix">
			<div class="column_m scroll-fix-wrap blue_bg">
				<div class="wrap sub_header_brd sub_header_brdclr_dblue sub_header_brd_large padt10">
					
					<!-- menu builders -->
					<div class="fleft" id="menu_builders">
						<div class="fleft martr10 button_selectric">
							<select name="area" class="selectric-custom">
								
								<option value="index.html" class="translate" data-icon="<?php echo $path;?>html/usercontent/images/icons/2.png" data-en="For Business" data-sw="För Företag" checked>For Business</option>
							</select>
						</div>
						<div class="fleft martr10 button_selectric">
							<select name="category" class="selectric-custom">
								<option value="0" data-default="true">-</option>
								
								<option value="hrnetwork.html" data-icon="<?php echo $path;?>html/usercontent/images/icons/4.png">HR Network</option>
								<option value="partners.html" data-icon="<?php echo $path;?>html/usercontent/images/icons/1.png">Partners</option>
								
							</select>
						</div>
						
						<div class="clear"></div>
					</div>
					
					<!-- menu -->
					<div class="fright" id="dynamic_menu">
						<ul class="nav-links list-inline mar0 pad0 lgn_hight_28 fsz14"><li class=""><a href="qstaff3_bus_inner.html" class="dblock padtb10 white_txt">Call us @ (+46) 762 072 192</a></li></ul>
					</div>
					
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		
		<!-- Slider -->
		<div class="custom_intropage column_m blue_bg talc lgn_hight_28 fsz18 white_txt">
			<div class="container">
				<div class="wrap">
					<div class="textfade_slider">
						<div class="textfade_slides">
							<div class="textfade_slide" id="textfade_slide1">
								<h1 class="marb10 lgn_hight_s12 fsz60  white_txt font_opnsns"><b>Invitation-only Network For</b><br>Young & Senior Professionals</h1>
								<p>Q-Network is exclusive social networks and online communities of executives.</p>
							</div>
							
						</div>
						<div class="textfade_controls fsz15 uppercase bold">
							<a href="#" class="textfade_prev"></a>
							<a href="#" class="textfade_link" data-id="textfade_slide1">Post</a>
						
							<a href="#" class="textfade_next"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		
		<!-- Zoho -->
		<div class="column_m marb30 fsz14 lgn_hight_22 dark_grey_txt">
			<div class="container">
				<div class="wrap mart-100p bxsh_black02 white_bg">
								<div class="dflex fxwrap_w alit_s padtb30">
									
									<div class="wi_33 pos_rel bs_bb padrl20 brdr talc">
										<h3 class="marb25 pad0 fsz22">Create</h3>
										<div class="marb25 fsz12">
											<div class="dinlblck marrl10 valt">
												<span class="zoho-icon zoho-icon-1 dblock marrla"></span>
												<span>Writer</span>
											</div>
											<div class="dinlblck marrl10 valt">
												<span class="zoho-icon zoho-icon-2 dblock marrla"></span>
												<span>Sheet</span>
											</div>
											<div class="dinlblck marrl10 valt">
												<span class="zoho-icon zoho-icon-3 dblock marrla"></span>
												<span>Show</span>
											</div>
										</div>
										<p class="wi_90 marrla fsz16">
											Full-featured office editors for stunning documents, spreadsheets, and presentations.
										</p>
									</div>
									
									<div class="wi_33 pos_rel bs_bb padrl20 brdr talc">
										<h3 class="marb25 pad0 fsz22">Collaborate</h3>
										<div class="marb25 fsz12">
											<div class="dinlblck marrl10 valt">
												<span class="zoho-icon zoho-icon-4 dblock marrla"></span>
												<span>Docs</span>
											</div>
											<div class="dinlblck marrl10 valt">
												<span class="zoho-icon zoho-icon-5 dblock marrla"></span>
												<span>ShowTime</span>
											</div>
											<div class="dinlblck marrl10 valt">
												<span class="zoho-icon zoho-icon-6 dblock marrla"></span>
												<span>Sites</span>
											</div>
										</div>
										<p class="wi_90 marrla fsz16">
											Cloud storage, audience engagement tool, website builder—designed around teams.
										</p>
									</div>
									
									<div class="wi_33 pos_rel bs_bb padrl20 talc">
										<h3 class="marb25 pad0 fsz22">Communicate</h3>
										<div class="marb25 fsz12">
											<div class="dinlblck marrl10 valt">
												<span class="zoho-icon zoho-icon-1 dblock marrla"></span>
												<span>Mail</span>
											</div>
											<div class="dinlblck marrl10 valt">
												<span class="zoho-icon zoho-icon-2 dblock marrla"></span>
												<span>Chat</span>
											</div>
											<div class="dinlblck marrl10 valt">
												<span class="zoho-icon zoho-icon-3 dblock marrla"></span>
												<span>Connect</span>
											</div>
										</div>
										<p class="wi_90 marrla fsz16">
											Top class business email, smart team chat and a full-fledged private social network.
										</p>
									</div>
									
								</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		
		<!-- Mallof -->
		<div class="column_m padtb30 dark_grey_txt">
			<div class="wrap">
				
				<!-- 2rows, 1 column on the right -->
				<div class="hei-pad-50 pos_rel marb10">
					
					<div class="wi_100 hei_100 pos_abs top0 left0 dflex alit_s">
						
						<div class="wi_75 dflex alit_s fxdir_col padr5">
							
							<div class="wi_100 hei_50 dflex alit_s padb5">
								<a href="#" class="wi_66 brd nobrdr bgir_norep bgis_cov bgip_c" style="background-image: url(<?php echo $path;?>html/usercontent/images/mallof/2.jpg);"></a>
								<div class="wi_33 dflex fxdir_col justc_sb alit_c pos_rel padtb5 malbrown_bg white_txt">
									<span class="fa fa-shopping-bag fsz24 white_txt"></span>
									<h4 class="pad10 talc uppercase fsz24 bold white_txt">Inred din speciella uteplats från Granit</h4>
									<a href="#" class="diblock pad10 brd brdclr_white uppercase bold fsz12 white_txt">Alla butiker</a>
									
									<a href="#" class="style_base dblock pos_abs top0 right0 pad5 fsz21 lgtgrey_txt">
										<span class="fa fa-heart hide dblock_sbh"></span>
										<span class="fa fa-heart-o dblock hidden_sbh"></span>
									</a>
									<a href="#" class="dblock pos_abs bot0 right0 pad5 fsz20 white_txt">
										<span class="fa fa-share-alt"></span>
									</a>
									<div class="pos_abs pos_cenY right100 brd brdwi_22 brdclr_trans brdrclr_malbrown nobrdl"></div>
								</div>
							</div>
							
							<div class="wi_100 hei_50 dflex alit_s padt5">
								<div class="wi_33 dflex fxdir_col justc_c alit_c pos_rel blue_bg white_txt">
									<span class="fa fa-cutlery fsz24 white_txt"></span>
									<h4 class="pad10 talc uppercase fsz24 bold white_txt">Nytt koncept hos Raw Poké</h4>
									<a href="#" class="diblock pad10 brd brdclr_white uppercase bold fsz12 white_txt">Alla restauranger</a>
									
									<a href="#" class="style_base dblock pos_abs top0 right0 pad5 fsz21 lgtgrey_txt">
										<span class="fa fa-heart hide dblock_sbh"></span>
										<span class="fa fa-heart-o dblock hidden_sbh"></span>
									</a>
									<a href="#" class="dblock pos_abs bot0 right0 pad5 fsz20 white_txt">
										<span class="fa fa-share-alt"></span>
									</a>
									<div class="pos_abs pos_cenY left100 brd brdwi_22 brdclr_trans brdlclr_dblue nobrdr"></div>
								</div>
								<a href="#" class="wi_66 brd nobrdl bgir_norep bgis_cov bgip_c" style="background-image: url(<?php echo $path;?>html/usercontent/images/mallof/3.jpg);"></a>
							</div>
							
						</div>
						
						<div class="wi_25 dflex fxdir_col padl5">
							<a href="#" class="wi_100 flex_1 brd nobrdb bgir_norep bgis_cov bgip_c" style="background-image: url(<?php echo $path;?>html/usercontent/images/mallof/1.jpg);"></a>
							<div class="wi_100 hei_110p dflex fxdir_col justc_c alit_c pos_rel mallblue_bg">
								<h4 class="padb5 fsz16 bold">MQ</h4>
								<a href="#" class="diblock pad10 brd brdclr_black uppercase bold fsz12 black_txt">Se butiken</a>
								
								
								<a href="#" class="style_base dblock pos_abs top0 right0 pad5 fsz21 lgtgrey_txt">
									<span class="fa fa-heart hide dblock_sbh"></span>
									<span class="fa fa-heart-o dblock hidden_sbh"></span>
								</a>
								<a href="#" class="dblock pos_abs bot0 right0 pad5 fsz20 black_txt">
									<span class="fa fa-share-alt"></span>
								</a>
								<div class="pos_abs pos_cenX bot100 brd brdwi_22 brdclr_trans brdbclr_mallblue nobrdt"></div>
							</div>
						</div>
						
					</div>
					
				</div>
				
				<!-- 1 column on the left, 2rows -->
				<div class="hei-pad-50 pos_rel marb10">
					
					<div class="wi_100 hei_100 pos_abs top0 left0 dflex alit_s">
						
						<div class="wi_25 dflex fxdir_col padr5">
							<a href="#" class="wi_100 flex_1 brd nobrdb bgir_norep bgis_cov bgip_c" style="background-image: url(<?php echo $path;?>html/usercontent/images/mallof/6.jpg);"></a>
							<div class="wi_100 hei_110p dflex fxdir_col justc_c alit_c pos_rel mallblue_bg">
								<h4 class="padb5 fsz16 bold">MQ</h4>
								<a href="#" class="diblock pad10 brd brdclr_black uppercase bold fsz12 black_txt">Se butiken</a>
								
								
								<a href="#" class="style_base dblock pos_abs top0 right0 pad5 fsz21 lgtgrey_txt">
									<span class="fa fa-heart hide dblock_sbh"></span>
									<span class="fa fa-heart-o dblock hidden_sbh"></span>
								</a>
								<a href="#" class="dblock pos_abs bot0 right0 pad5 fsz20 black_txt">
									<span class="fa fa-share-alt"></span>
								</a>
								<div class="pos_abs pos_cenX bot100 brd brdwi_22 brdclr_trans brdbclr_mallblue nobrdt"></div>
							</div>
						</div>
						
						<div class="wi_75 dflex alit_s fxdir_col padl5">
							
							<div class="wi_100 hei_50 dflex alit_s padb5">
								<div class="wi_33 dflex alit_s padr10">
									<div class="wi_100 malbrown_bg"></div>
								</div>
								<a href="#" class="wi_33 brd nobrdr bgir_norep bgis_cov bgip_c" style="background-image: url(<?php echo $path;?>html/usercontent/images/mallof/4.jpg);"></a>
								<div class="wi_33 dflex fxdir_col justc_sb alit_c pos_rel padtb5 blue_bg white_txt">
									<span class="fa fa-film fsz24 white_txt"></span>
									<h4 class="pad10 talc uppercase fsz24 bold white_txt">Inred din speciella uteplats från Granit</h4>
									<a href="#" class="diblock pad10 brd brdclr_white uppercase bold fsz12 white_txt">Alla butiker</a>
									
									<a href="#" class="style_base dblock pos_abs top0 right0 pad5 fsz21 lgtgrey_txt">
										<span class="fa fa-heart hide dblock_sbh"></span>
										<span class="fa fa-heart-o dblock hidden_sbh"></span>
									</a>
									<a href="#" class="dblock pos_abs bot0 right0 pad5 fsz20 white_txt">
										<span class="fa fa-share-alt"></span>
									</a>
									<div class="pos_abs pos_cenY right100 brd brdwi_22 brdclr_trans brdrclr_dblue nobrdl"></div>
								</div>
							</div>
							
							<div class="wi_100 hei_50 dflex alit_s padt5">
								<div class="wi_33 dflex fxdir_col justc_sb alit_c pos_rel padtb5 mallblue_bg">
									<span class="fa fa-glass fsz24 black_txt"></span>
									<h4 class="pad10 talc uppercase fsz24 bold">Färska burgare hos Vigårda</h4>
									<a href="#" class="diblock pad10 brd brdclr_black uppercase bold fsz12 black_txt">Alla nyheter</a>
									
									<a href="#" class="style_base dblock pos_abs top0 right0 pad5 fsz21 lgtgrey_txt">
										<span class="fa fa-heart hide dblock_sbh"></span>
										<span class="fa fa-heart-o dblock hidden_sbh"></span>
									</a>
									<a href="#" class="dblock pos_abs bot0 right0 pad5 fsz20 black_txt">
										<span class="fa fa-share-alt"></span>
									</a>
									<div class="pos_abs pos_cenY left100 brd brdwi_22 brdclr_trans brdlclr_mallblue nobrdr"></div>
								</div>
								<a href="#" class="wi_66 brd nobrdl bgir_norep bgis_cov bgip_c" style="background-image: url(<?php echo $path;?>html/usercontent/images/mallof/3.jpg);"></a>
							</div>
							
						</div>
						
					</div>
					
				</div>
				
				<!-- 2 colums -->
				<div class="wi_100 minhei_220p dflex alit_s">
					
					<div class="wi_50 dflex alit_s padr5">
						<div class="wi_100 dflex fxdir_col alit_c justc_c blue_bg white_txt">
							<span class="fa fa-cab fsz24 white_txt"></span>
							<div class="pad10">
								<h4 class="pad0 talc uppercase fsz24 bold white_txt">PARKERA SÄKERT</h4>
								<h4 class="pad0 talc uppercase fsz24 fntwei_n white_txt">3700 parkeringsplatser</h4>	
							</div>
							<a href="#" class="diblock pad10 brd brdclr_white uppercase bold fsz12 white_txt">LÄS MER</a>
						</div>
					</div>
					<div class="wi_50 dflex alit_s padl5">
						<div class="wi_100 dflex fxdir_col alit_c justc_c mallblue_bg black_txt">
							<span class="fa fa-star fsz24 black_txt"></span>
							<div class="pad10">
								<h4 class="pad0 talc uppercase fsz24 bold black_txt">BLI VIP-MEDLEM NU!</h4>
								<h4 class="pad0 talc uppercase fsz24 fntwei_n black_txt">TA DEL AV UNIKA ERBJUDANDEN</h4>	
							</div>
							<a href="#" class="diblock pad10 brd brdclr_black uppercase bold fsz12 black_txt">Bli medlem</a>
						</div>
					</div>
					
				</div>
				
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		
		<!-- Pipefy -->
		<div class="column_m padtb30 dark_grey_txt">
			<div class="wrap">
					<div class="padb15">
						<h2 class="pad25 talc fsz36">Integrations to empower every team</h2>
						<p class="talc fsz18">Choose a one of our standard Job forms and get bids from pre-qualified Contractors instantly. </p>
						
						<div class="dflex fxwrap_w alit_s padt30">
							
							<div class="wi_25-20p pos_rel bs_bb mar10 bxsh_black02_h brd brdrad3">
								<div class="pos_rel zi1 padt100p"></div>
								<div class="wi_100 hei_100 pos_abs zi5 top0 bot0">
									<div class="toggle-base wi_100 hei_100-30p ovfl_hid pos_rel">
										<div class="front wi_100 hei_100 ovfl_hid pos_abs top0 left0 bs_bb padt10">
											<div class="marb15 talc">
												<div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">HR</div>
											</div>
											<h3 class="marb15 talc bold fsz16">Human Resource</h3>
											<div class="marb15 talc">
												<a href="#" class="toggle-content dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-current=".front" data-target=".back" data-parent=".toggle-base">0 TOTAL</a>
											</div>
											<p class="talc midgrey_txt">
												Last updated at 1 hour
											</p>
										</div>
										<div class="back wi_100 hei_100 ovfl_hid pos_abs top0 left0 bs_bb padt30" style="display: none;">
											<h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
											<div class="marb10 padrl20">
												<a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
											</div>
											<div class="padrl20">
												<a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
											</div>
										</div>
									</div>
									<div class="wi_100 ovfl_hid bs_bb brdt">
										<div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
											1 Member
										</div>
										<div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
											<a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
										</div>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							<div class="wi_25-20p pos_rel bs_bb mar10 bxsh_black02_h brd brdrad3">
								<div class="pos_rel zi1 padt100p"></div>
								<div class="wi_100 hei_100 pos_abs zi5 top0 bot0">
									<div class="toggle-base wi_100 hei_100-30p ovfl_hid pos_rel">
										<div class="front wi_100 hei_100 ovfl_hid pos_abs top0 left0 bs_bb padt10">
											<div class="marb15 talc">
												<div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">SA</div>
											</div>
											<h3 class="marb15 talc bold fsz16">Sales</h3>
											<div class="marb15 talc">
												<a href="#" class="toggle-content dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-current=".front" data-target=".back" data-parent=".toggle-base">0 TOTAL</a>
											</div>
											<p class="talc midgrey_txt">
												Last updated at 1 hour
											</p>
										</div>
										<div class="back wi_100 hei_100 ovfl_hid pos_abs top0 left0 bs_bb padt30" style="display: none;">
											<h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
											<div class="marb10 padrl20">
												<a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
											</div>
											<div class="padrl20">
												<a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
											</div>
										</div>
									</div>
									<div class="wi_100 ovfl_hid bs_bb brdt">
										<div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
											1 Member
										</div>
										<div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
											<a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
										</div>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							<div class="wi_25-20p pos_rel bs_bb mar10 bxsh_black02_h brd brdrad3">
								<div class="pos_rel zi1 padt100p"></div>
								<div class="wi_100 hei_100 pos_abs zi5 top0 bot0">
									<div class="toggle-base wi_100 hei_100-30p ovfl_hid pos_rel">
										<div class="front wi_100 hei_100 ovfl_hid pos_abs top0 left0 bs_bb padt10">
											<div class="marb15 talc">
												<div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">MA</div>
											</div>
											<h3 class="marb15 talc bold fsz16">Marketing</h3>
											<div class="marb15 talc">
												<a href="#" class="toggle-content dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-current=".front" data-target=".back" data-parent=".toggle-base">0 TOTAL</a>
											</div>
											<p class="talc midgrey_txt">
												Last updated at 1 hour
											</p>
										</div>
										<div class="back wi_100 hei_100 ovfl_hid pos_abs top0 left0 bs_bb padt30" style="display: none;">
											<h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
											<div class="marb10 padrl20">
												<a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
											</div>
											<div class="padrl20">
												<a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
											</div>
										</div>
									</div>
									<div class="wi_100 ovfl_hid bs_bb brdt">
										<div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
											1 Member
										</div>
										<div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
											<a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
										</div>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							<div class="wi_25-20p pos_rel bs_bb mar10 bxsh_black02_h brd brdrad3">
								<div class="pos_rel zi1 padt100p"></div>
								<div class="wi_100 hei_100 pos_abs zi5 top0 bot0">
									<div class="toggle-base wi_100 hei_100-30p ovfl_hid pos_rel">
										<div class="front wi_100 hei_100 ovfl_hid pos_abs top0 left0 bs_bb padt10">
											<div class="marb15 talc">
												<div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">FI</div>
											</div>
											<h3 class="marb15 talc bold fsz16">Finance</h3>
											<div class="marb15 talc">
												<a href="#" class="toggle-content dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-current=".front" data-target=".back" data-parent=".toggle-base">0 TOTAL</a>
											</div>
											<p class="talc midgrey_txt">
												Last updated at 1 hour
											</p>
										</div>
										<div class="back wi_100 hei_100 ovfl_hid pos_abs top0 left0 bs_bb padt30" style="display: none;">
											<h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
											<div class="marb10 padrl20">
												<a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
											</div>
											<div class="padrl20">
												<a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
											</div>
										</div>
									</div>
									<div class="wi_100 ovfl_hid bs_bb brdt">
										<div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
											1 Member
										</div>
										<div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
											<a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
										</div>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							<div class="wi_25-20p pos_rel bs_bb mar10 bxsh_black02_h brd brdrad3">
								<div class="pos_rel zi1 padt100p"></div>
								<div class="wi_100 hei_100 pos_abs zi5 top0 bot0">
									<div class="toggle-base wi_100 hei_100-30p ovfl_hid pos_rel">
										<div class="front wi_100 hei_100 ovfl_hid pos_abs top0 left0 bs_bb padt10">
											<div class="marb15 talc">
												<div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">PA</div>
											</div>
											<h3 class="marb15 talc bold fsz16">Procurement</h3>
											<div class="marb15 talc">
												<a href="#" class="toggle-content dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-current=".front" data-target=".back" data-parent=".toggle-base">0 TOTAL</a>
											</div>
											<p class="talc midgrey_txt">
												Last updated at 1 hour
											</p>
										</div>
										<div class="back wi_100 hei_100 ovfl_hid pos_abs top0 left0 bs_bb padt30" style="display: none;">
											<h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
											<div class="marb10 padrl20">
												<a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
											</div>
											<div class="padrl20">
												<a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
											</div>
										</div>
									</div>
									<div class="wi_100 ovfl_hid bs_bb brdt">
										<div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
											1 Member
										</div>
										<div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
											<a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
										</div>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							<div class="wi_25-20p pos_rel bs_bb mar10 bxsh_black02_h brd brdrad3">
								<div class="pos_rel zi1 padt100p"></div>
								<div class="wi_100 hei_100 pos_abs zi5 top0 bot0">
									<div class="toggle-base wi_100 hei_100-30p ovfl_hid pos_rel">
										<div class="front wi_100 hei_100 ovfl_hid pos_abs top0 left0 bs_bb padt10">
											<div class="marb15 talc">
												<div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">IT</div>
											</div>
											<h3 class="marb15 talc bold fsz16">IT</h3>
											<div class="marb15 talc">
												<a href="#" class="toggle-content dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-current=".front" data-target=".back" data-parent=".toggle-base">0 TOTAL</a>
											</div>
											<p class="talc midgrey_txt">
												Last updated at 1 hour
											</p>
										</div>
										<div class="back wi_100 hei_100 ovfl_hid pos_abs top0 left0 bs_bb padt30" style="display: none;">
											<h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
											<div class="marb10 padrl20">
												<a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
											</div>
											<div class="padrl20">
												<a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
											</div>
										</div>
									</div>
									<div class="wi_100 ovfl_hid bs_bb brdt">
										<div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
											1 Member
										</div>
										<div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
											<a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
										</div>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							<div class="wi_25-20p pos_rel bs_bb mar10 bxsh_black02_h brd brdrad3">
								<div class="pos_rel zi1 padt100p"></div>
								<div class="wi_100 hei_100 pos_abs zi5 top0 bot0">
									<div class="toggle-base wi_100 hei_100-30p ovfl_hid pos_rel">
										<div class="front wi_100 hei_100 ovfl_hid pos_abs top0 left0 bs_bb padt10">
											<div class="marb15 talc">
												<div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">CS</div>
											</div>
											<h3 class="marb15 talc bold fsz16">Customer Service</h3>
											<div class="marb15 talc">
												<a href="#" class="toggle-content dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-current=".front" data-target=".back" data-parent=".toggle-base">0 TOTAL</a>
											</div>
											<p class="talc midgrey_txt">
												Last updated at 1 hour
											</p>
										</div>
										<div class="back wi_100 hei_100 ovfl_hid pos_abs top0 left0 bs_bb padt30" style="display: none;">
											<h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
											<div class="marb10 padrl20">
												<a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
											</div>
											<div class="padrl20">
												<a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
											</div>
										</div>
									</div>
									<div class="wi_100 ovfl_hid bs_bb brdt">
										<div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
											1 Member
										</div>
										<div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
											<a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
										</div>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							<div class="wi_25-20p pos_rel bs_bb mar10 bxsh_black02_h brd brdrad3">
								<div class="pos_rel zi1 padt100p"></div>
								<div class="wi_100 hei_100 pos_abs zi5 top0 bot0">
									<div class="toggle-base wi_100 hei_100-30p ovfl_hid pos_rel">
										<div class="front wi_100 hei_100 ovfl_hid pos_abs top0 left0 bs_bb padt10">
											<div class="marb15 talc">
												<div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">BR</div>
											</div>
											<h3 class="marb15 talc bold fsz16">Board</h3>
											<div class="marb15 talc">
												<a href="#" class="toggle-content dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-current=".front" data-target=".back" data-parent=".toggle-base">0 TOTAL</a>
											</div>
											<p class="talc midgrey_txt">
												Last updated at 1 hour
											</p>
										</div>
										<div class="back wi_100 hei_100 ovfl_hid pos_abs top0 left0 bs_bb padt30" style="display: none;">
											<h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
											<div class="marb10 padrl20">
												<a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
											</div>
											<div class="padrl20">
												<a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
											</div>
										</div>
									</div>
									<div class="wi_100 ovfl_hid bs_bb brdt">
										<div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
											1 Member
										</div>
										<div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
											<a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
										</div>
										<div class="clear"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="padt20 talc">
							<a href="partner_inner.html" class="dblue_btn marrl5 fsz16">View more</a>
						</div>
						
					</div>
				</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Segment -->
		<div class="column_m padtb30 fsz14 lgn_hight_22 dark_grey_txt">
			<div class="container">
				<div class="wrap">
								<h2 class="pad25 talc fsz36">Integrations to empower every team</h2>
								
								<div class="tab-header">
									<a href="#" class="dinlblck mar5 padrl15 brd brdclr_seggreen_h brdclr_segblue_a brdrad40 segblue_bg_a lgn_hight_26 fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah active" data-id="utab_Popular">Popular</a>
									<a href="#" class="dinlblck mar5 padrl15 brd brdclr_seggreen_h brdclr_segblue_a brdrad40 segblue_bg_a lgn_hight_26 fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah" data-id="utab_Analytics">Analytics</a>
									<a href="#" class="dinlblck mar5 padrl15 brd brdclr_seggreen_h brdclr_segblue_a brdrad40 segblue_bg_a lgn_hight_26 fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah" data-id="utab_Advertising">Advertising</a>
									<a href="#" class="dinlblck mar5 padrl15 brd brdclr_seggreen_h brdclr_segblue_a brdrad40 segblue_bg_a lgn_hight_26 fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah" data-id="utab_AB_Testing">A/B Testing</a>
									<a href="#" class="dinlblck mar5 padrl15 brd brdclr_seggreen_h brdclr_segblue_a brdrad40 segblue_bg_a lgn_hight_26 fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah" data-id="utab_Attribution">Attribution</a>
									<a href="#" class="dinlblck mar5 padrl15 brd brdclr_seggreen_h brdclr_segblue_a brdrad40 segblue_bg_a lgn_hight_26 fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah" data-id="utab_CRMs">CRMs</a>
									<a href="#" class="dinlblck mar5 padrl15 brd brdclr_seggreen_h brdclr_segblue_a brdrad40 segblue_bg_a lgn_hight_26 fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah" data-id="utab_Push_Notifications">Push Notifications</a>
								</div>
								
								<div class="tab_container mart15">
									
									<!-- Popular -->
									<div class="tab_content hide" id="utab_Popular">
										
										<div class="wi_25 fleft bs_bb pad8 talc">
											<a href="#" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="<?php echo $path;?>html/usercontent/images/segment/1.svg" class="dblock wi_100 maxwi_120p maxhei_50p" />
													</div>
													
													<div class="trf_y-10p_ph trans_all2">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt">Google Analitics</h3>
														<span class="dblock marb5 midgrey_txt">Analytics</span>
														<div class="opa0 opa1_ph lgn_hight_36 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="wi_25 fleft bs_bb pad8 talc">
											<a href="#" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="<?php echo $path;?>html/usercontent/images/segment/2.svg" class="dblock wi_100 maxwi_120p maxhei_50p" />
													</div>
													
													<div class="trf_y-10p_ph trans_all2">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt">Mixpanel</h3>
														<span class="dblock marb5 midgrey_txt">Analytics</span>
														<div class="opa0 opa1_ph lgn_hight_36 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="wi_25 fleft bs_bb pad8 talc">
											<a href="#" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="<?php echo $path;?>html/usercontent/images/segment/3.svg" class="dblock wi_100 maxwi_120p maxhei_50p" />
													</div>
													
													<div class="trf_y-10p_ph trans_all2">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt">Facebook Pixel</h3>
														<span class="dblock marb5 midgrey_txt">Advertising</span>
														<div class="opa0 opa1_ph lgn_hight_36 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="wi_25 fleft bs_bb pad8 talc">
											<a href="#" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="<?php echo $path;?>html/usercontent/images/segment/4.svg" class="dblock wi_100 maxwi_120p maxhei_50p" />
													</div>
													
													<div class="trf_y-10p_ph trans_all2">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt">Optimizely</h3>
														<span class="dblock marb5 midgrey_txt">A/B Testing</span>
														<div class="opa0 opa1_ph lgn_hight_36 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="wi_25 fleft bs_bb pad8 talc">
											<a href="#" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="<?php echo $path;?>html/usercontent/images/segment/5.png" class="dblock wi_100 maxwi_120p maxhei_50p" />
													</div>
													
													<div class="trf_y-10p_ph trans_all2">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt">Adjust</h3>
														<span class="dblock marb5 midgrey_txt">Attribution</span>
														<div class="opa0 opa1_ph lgn_hight_36 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="wi_25 fleft bs_bb pad8 talc">
											<a href="#" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="<?php echo $path;?>html/usercontent/images/segment/6.svg" class="dblock wi_100 maxwi_120p maxhei_50p" />
													</div>
													
													<div class="trf_y-10p_ph trans_all2">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt">Salesforce</h3>
														<span class="dblock marb5 midgrey_txt">CRMs</span>
														<div class="opa0 opa1_ph lgn_hight_36 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="wi_25 fleft bs_bb pad8 talc">
											<a href="#" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="<?php echo $path;?>html/usercontent/images/segment/7.svg" class="dblock wi_100 maxwi_120p maxhei_50p" />
													</div>
													
													<div class="trf_y-10p_ph trans_all2">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt">Appboy</h3>
														<span class="dblock marb5 midgrey_txt">Push Notifications</span>
														<div class="opa0 opa1_ph lgn_hight_36 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="clear"></div>
									</div>
									
									<!-- Analytics -->
									<div class="tab_content hide" id="utab_Analytics">
										
										<div class="wi_25 fleft bs_bb pad8 talc">
											<a href="#" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="<?php echo $path;?>html/usercontent/images/segment/1.svg" class="dblock wi_100 maxwi_120p maxhei_50p" />
													</div>
													
													<div class="trf_y-10p_ph trans_all2">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt">Google Analitics</h3>
														<span class="dblock marb5 midgrey_txt">Analytics</span>
														<div class="opa0 opa1_ph lgn_hight_36 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="wi_25 fleft bs_bb pad8 talc">
											<a href="#" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="<?php echo $path;?>html/usercontent/images/segment/2.svg" class="dblock wi_100 maxwi_120p maxhei_50p" />
													</div>
													
													<div class="trf_y-10p_ph trans_all2">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt">Mixpanel</h3>
														<span class="dblock marb5 midgrey_txt">Analytics</span>
														<div class="opa0 opa1_ph lgn_hight_36 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="clear"></div>
									</div>
									
									<!-- Advertising -->
									<div class="tab_content hide" id="utab_Advertising">
										
										<div class="wi_25 fleft bs_bb pad8 talc">
											<a href="#" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="<?php echo $path;?>html/usercontent/images/segment/3.svg" class="dblock wi_100 maxwi_120p maxhei_50p" />
													</div>
													
													<div class="trf_y-10p_ph trans_all2">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt">Facebook Pixel</h3>
														<span class="dblock marb5 midgrey_txt">Advertising</span>
														<div class="opa0 opa1_ph lgn_hight_36 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="clear"></div>
									</div>
									
									<!-- A/B Testing -->
									<div class="tab_content hide" id="utab_AB_Testing">
										
										<div class="wi_25 fleft bs_bb pad8 talc">
											<a href="#" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="<?php echo $path;?>html/usercontent/images/segment/4.svg" class="dblock wi_100 maxwi_120p maxhei_50p" />
													</div>
													
													<div class="trf_y-10p_ph trans_all2">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt">Optimizely</h3>
														<span class="dblock marb5 midgrey_txt">A/B Testing</span>
														<div class="opa0 opa1_ph lgn_hight_36 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="clear"></div>
									</div>
									
									<!-- Attribution -->
									<div class="tab_content hide" id="utab_Attribution">
										
										<div class="wi_25 fleft bs_bb pad8 talc">
											<a href="#" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="<?php echo $path;?>html/usercontent/images/segment/5.png" class="dblock wi_100 maxwi_120p maxhei_50p" />
													</div>
													
													<div class="trf_y-10p_ph trans_all2">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt">Adjust</h3>
														<span class="dblock marb5 midgrey_txt">Attribution</span>
														<div class="opa0 opa1_ph lgn_hight_36 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="clear"></div>
									</div>
									
									<!-- CRMs -->
									<div class="tab_content hide" id="utab_CRMs">
										
										<div class="wi_25 fleft bs_bb pad8 talc">
											<a href="#" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="<?php echo $path;?>html/usercontent/images/segment/6.svg" class="dblock wi_100 maxwi_120p maxhei_50p" />
													</div>
													
													<div class="trf_y-10p_ph trans_all2">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt">Salesforce</h3>
														<span class="dblock marb5 midgrey_txt">CRMs</span>
														<div class="opa0 opa1_ph lgn_hight_36 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="clear"></div>
									</div>
									
									<!-- Push Notifications -->
									<div class="tab_content hide" id="utab_Push_Notifications">
										
										<div class="wi_25 fleft bs_bb pad8 talc">
											<a href="#" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="<?php echo $path;?>html/usercontent/images/segment/7.svg" class="dblock wi_100 maxwi_120p maxhei_50p" />
													</div>
													
													<div class="trf_y-10p_ph trans_all2">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt">Appboy</h3>
														<span class="dblock marb5 midgrey_txt">Push Notifications</span>
														<div class="opa0 opa1_ph lgn_hight_36 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="clear"></div>
									</div>
									
								</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Blog posts -->
		<div class="column_m">
			<div class="wrap">
				<div class="column_m padtb30">
					<div class="tw_clmn padtb20">
						<div class="home_section_heading">
							<h2 class="pad0 fsz20"><span>RECENT BLOG POSTS</span></h2>
							<div class="clear"></div>
						</div>
						<div class="padrl15">
							<div class="column_m">
								<ul class="icon_list_90">
									<li class="first">
										<div class="ico_img_bx"><img src="<?php echo $path;?>html/usercontent/images/blog-thumb1.jpg" width="90" height="90" alt="Awesome dream">
										</div>
										<div class="list_content_bx">
											<h2 class="padb10 fsz14">AWESOME DREAM HOUSE IN A GREAT LOCATION</h2>
											<p class="">Lorem ipsum dolor amet, consectetur adipiscing elit. Quisque eget ante vel nunc posuere rhoncus. Donec quis elit sit...</p>
											<div class="column_m">
												<div class="tw_clmn"><a href="#" class="fsz11 tall">Read more</a>
												</div>
												<div class="tw_clmn talr fsz11">Feb 5, 2014</div>
											</div>
										</div>
									</li>
									<li class="last">
										<div class="ico_img_bx"><img src="<?php echo $path;?>html/usercontent/images/blog-thumb2.jpg" width="90" height="90" alt="AWESOME DREAM HOUSE IN A GREAT LOCATION">
										</div>
										<div class="list_content_bx">
											<h2 class="padb10 fsz14">AWESOME DREAM HOUSE IN A GREAT LOCATION</h2>
											<p class="">Lorem ipsum dolor amet, consectetur adipiscing elit. Quisque eget ante vel nunc posuere rhoncus. Donec quis elit sit...</p>
											<div class="column_m">
												<div class="tw_clmn"><a href="#" class="fsz11 tall">Read more</a>
												</div>
												<div class="tw_clmn talr fsz11">Feb 5, 2014</div>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="tw_clmn padtb20">
						<div class="home_section_heading">
							<h2 class="pad0 fsz20"><span>TESTIMONIALS</span></h2>
							<div class="clear"></div>
						</div>
						<div class="padrl15">
							<div class="column_m">
								<ul class="icon_list_90">
									<li class="first">
										<div class="ico_img_bx"><img src="<?php echo $path;?>html/usercontent/images/testi_monial_thumb1.jpg" width="90" height="90" alt="Awesome dream">
										</div>
										<div class="list_content_bx">
											<h2 class="padb10 fsz14">Mesfun Tedla, GIKO</h2>
											<p class="pad0">As a global business it can be difficult to find companies with the right talent to deliver on our projects, at the right time and price. Using Qmatchup is like having an extended team of management, everywhere, when we need them.</p>
										</div>
									</li>
									<li class="last">
										<div class="ico_img_bx"><img src="<?php echo $path;?>html/usercontent/images/testi_monial_thumb2.jpg" width="90" height="90" alt="AWESOME DREAM HOUSE IN A GREAT LOCATION">
										</div>
										<div class="list_content_bx">
											<h2 class="padb10 fsz14">Per Nygren, Notitia</h2>
											<p class="pad0">In our organization, working with solid and professional partners/ vendors is far more important than finding the lowest price on the market. Qmatchup is the secure way to outsource and saves us hours on research and checkups.</p>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="column_m padb20">
					<div class="padrl15">
						<div class="white_bg">
							<div class="wi_80 fleft">
								<div class="pad30">
									<h2 class="fsz34">Get started today and post your Project for free! </h2>
									<div class="fsz16">Choose a one of our standard Job forms and get bids from pre-qualified Contractors instantly. For more detailed project requests, contact us for our standard solutions <a href="#">Here</a>. </div>
								</div>
							</div>
							<div class="wi_20 fleft">
								<div class="padtrb30"> <a href="#" class="green_btn dblock">Contact us</a> </div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Logos -->
		<div class="column_m padtb30">
			<div class="wrap">
				<h2 class="talc fsz34 lgn_hight_s12 padb30">Du ar i gott sallskap</h2>
				
				<div class="talc">
					<a href="#" class="marrl10"><img src="<?php echo $path;?>html/usercontent/images/logos/absolute.jpg" class="valm" /></a>
					<a href="#" class="marrl10"><img src="<?php echo $path;?>html/usercontent/images/logos/logo_AF_farger200.jpg" class="valm" /></a>
					<a href="#" class="marrl10"><img src="<?php echo $path;?>html/usercontent/images/logos/Orkla-Foods-Norge-et-nytt-norsk-matselskap_medium.jpg" class="valm" /></a>
					<a href="#" class="marrl10"><img src="<?php echo $path;?>html/usercontent/images/logos/image.jpg" class="valm" /></a>
				</div>
				
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Blog posts -->
		<div class="column_m padtb30">
			<div class="wrap">
				<div class="wi_33 fleft bs_bb brdr">
					<h3 class="padb20">Dropbox Basic</h3>
					<ul class="mar0 pad0">
						<li class="dblock pos_rel marb20 padl30">
							<img src="<?php echo $path;?>html/usercontent/images/check_green.png" width="20" height="20" class="pos_abs top0 left0" />
							<strong>Synkning i toppklass</strong><br/>
							Synka foton, videor, dokument och andra filer omedelbart over enheter
						</li>
						<li class="dblock pos_rel marb20 padl30">
							<img src="<?php echo $path;?>html/usercontent/images/check_green.png" width="20" height="20" class="pos_abs top0 left0" />
							<strong>Synkning i toppklass</strong><br/>
							Synka foton, videor, dokument och andra filer omedelbart over enheter
						</li>
						<li class="dblock pos_rel marb20 padl30">
							<img src="<?php echo $path;?>html/usercontent/images/check_green.png" width="20" height="20" class="pos_abs top0 left0" />
							<strong>Synkning i toppklass</strong><br/>
							Synka foton, videor, dokument och andra filer omedelbart over enheter
						</li>
						<li class="dblock pos_rel marb20 padl30">
							<img src="<?php echo $path;?>html/usercontent/images/check_green.png" width="20" height="20" class="pos_abs top0 left0" />
							<strong>Synkning i toppklass</strong><br/>
							Synka foton, videor, dokument och andra filer omedelbart over enheter
						</li>
					</ul>
				</div>
				<div class="wi_66 fleft">
					<h3 class="marl20 padb20">Dropbox Plus <small>Allt du far i Dropbox Basic och:</small></h3>
					
					<div class="wi_50 fleft bs_bb padl20">
						<ul class="mar0 pad0">
							<li class="dblock pos_rel marb20 padl30">
								<img src="<?php echo $path;?>html/usercontent/images/check_filled.png" width="20" height="20" class="pos_abs top0 left0" />
								<strong>Rikligt med lagringsutrymme</strong><br/>
								Fa 1 TB(1000 GB) lagringsutrymme for dina filer. Forvara allt sakert och pa ett stalle
							</li>
							<li class="dblock pos_rel marb20 padl30">
								<img src="<?php echo $path;?>html/usercontent/images/check_filled.png" width="20" height="20" class="pos_abs top0 left0" />
								<strong>Rikligt med lagringsutrymme</strong><br/>
								Fa 1 TB(1000 GB) lagringsutrymme for dina filer. Forvara allt sakert och pa ett stalle
							</li>
							<li class="dblock pos_rel marb20 padl30">
								<img src="<?php echo $path;?>html/usercontent/images/check_filled.png" width="20" height="20" class="pos_abs top0 left0" />
								<strong>Rikligt med lagringsutrymme</strong><br/>
								Fa 1 TB(1000 GB) lagringsutrymme for dina filer. Forvara allt sakert och pa ett stalle
							</li>
							
						</ul>
					</div>
					
					<div class="wi_50 fleft bs_bb padl20">
						<ul class="mar0 pad0">
							<li class="dblock pos_rel marb20 padl30">
								<img src="<?php echo $path;?>html/usercontent/images/check_filled.png" width="20" height="20" class="pos_abs top0 left0" />
								<strong>Rikligt med lagringsutrymme</strong><br/>
								Fa 1 TB(1000 GB) lagringsutrymme for dina filer. Forvara allt sakert och pa ett stalle
							</li>
							<li class="dblock pos_rel marb20 padl30">
								<img src="<?php echo $path;?>html/usercontent/images/check_filled.png" width="20" height="20" class="pos_abs top0 left0" />
								<strong>Rikligt med lagringsutrymme</strong><br/>
								Fa 1 TB(1000 GB) lagringsutrymme for dina filer. Forvara allt sakert och pa ett stalle
							</li>
							<li class="dblock pos_rel marb20 padl30">
								<img src="<?php echo $path;?>html/usercontent/images/check_filled.png" width="20" height="20" class="pos_abs top0 left0" />
								<strong>Rikligt med lagringsutrymme</strong><br/>
								Fa 1 TB(1000 GB) lagringsutrymme for dina filer. Forvara allt sakert och pa ett stalle
							</li>
							
						</ul>
					</div>
					
					<div class="clear"></div>
				</div>
				
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Calculator slider -->
		<div class="start-calc column_m mart30 padtb30 fsz16 lgn_hight_22">
			<div class="wrap">
				<div class="container padrl15">
					<h2 class="talc fsz34 lgn_hight_s12 padb30">
						Fakturera 
						<span class="bluegreen_txt"><span class="total" contenteditable="true"></span> kr</span> 
						idag och få lön redan 
						<span class="bluegreen_txt pay-day"></span>
					</h2>
					<p class="talc bold bluegreen_txt">Lön efter skatt &amp; avgifter</p>
					<p class="hide-until-mobile bluegreen_txt talc drag-btn-money bold">
						<span class="value">7510</span> kr
					</p>
					<div class="drag-container marb20">
						<div class="drag-bg"></div>
						<div class="drag-bg ff"></div>
						<div class="drag-bg taxes"></div>
						<div class="drag-bg your-money"></div>
						<div class="drag-btn">
							<p class="drag-btn-money hide-mobile"><span class="value">7510</span> kr</p>
							<div class="drag-btn-left sprite-image pointer-left-small hide-mobile"></div>
							<div class="drag-btn-right sprite-image pointer-right-small hide-mobile"></div>
						</div>
					</div>
					<ul class="parts-list toggle-calc-table fsz12">
						<li>
							<span class="bubble bubble-dark"></span>
							<span class="calc-frilansfinans">
							<span>Frilans Finans</span>
							<span class="parts-list-value"></span>
							<span>%</span>
							</span>
						</li>
						<li>
							<span class="bubble bubble-blue"></span>
							<span class="calc-taxes">
							<span>Skatter, arbetsavgifter</span>
							<span class="parts-list-value"></span>
							<span>%</span>
							</span>
						</li>
						<li>
							<span class="bubble bubble-light"></span>
							<span class="calc-client">
							<span>Dina pengar</span>
							<span class="parts-list-value"></span>
							<span>%</span>
							</span>
						</li>
					</ul>
					<div class="btn-wrapper talc padtb30">
						<button class="toggle-calc-table dblue_btn marrl5 fsz16">
						<span class="table-hidden">Se hur vi räknat</span>
						<span class="table-shown">Stäng</span>
						</button>
						<a href="#" class="marrl5 dblue_btn create-invoice-link">Skapa testfaktura</a>
					</div>
				</div>
				<div class="clear"></div>
				<div class="container">
					<div class="row calc-tables" data-calculator-settings='{"settings":[{"label":"Standard","fee":"6","tax":"30","payrolltax":"31.42"}],"vat":"25"}'>
						<div class="table-wrapper tw_clmn marpl25 padtb20 lgn_hight_20">
							<table class="wi_100">
								<tr>
									<td>Fakturabelopp inkl. moms</td>
									<td class="talr"><span class="table-invoice-amount">18750</span> kr</td>
								</tr>
								<tr>
									<td>Moms</td>
									<td class="talr">-<span class="table-moms">3750</span> kr</td>
								</tr>
								<tr>
									<td>Fakturabelopp exkl. moms</td>
									<td class="talr"><span class="table-invoice">15 000</span> kr</td>
								</tr>
								<tr>
									<td>Avgift till Frilans Finans</td>
									<td class="talr">-<span class="table-ff-commission">900</span> kr</td>
								</tr>
								<tr>
									<td>Sociala avgifter</td>
									<td class="talr">-<span class="table-social-fee">3371</span> kr</td>
								</tr>
								<tr>
									<td>Bruttlön inkl semesterersättning</td>
									<td class="talr"><span class="table-brutto">10729</span> kr</td>
								</tr>
								<tr>
									<td>Skatteavdrag</td>
									<td class="talr">-<span class="table-tax">3219</span> kr</td>
								</tr>
								<tr>
									<td>Nettlön inkl semesterersättning</td>
									<td class="talr"><span class="table-salary">7510</span> kr</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Cancer -->
		<div class="column_m padtb30 talc lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<h2 class="talc fsz34 lgn_hight_s12 padb30">Visste du det här om bröstcancer?</h2>
					<ul class="mar0 pad0 tall">
						<li class="wi_100 dflex marb15">
							<div class="wi_20p">
								<img src="<?php echo $path;?>html/usercontent/images/icon-info.png" class="wi_20p hei_auto dblock" />
							</div>
							<div class="flex_1 padl10">
								De flesta <span class="lgtblue_bg dblue_txt">knölar</span> är inte cancer. Ofarliga knölar kan vara <span class="lgtblue_bg dblue_txt">svullna bröstkörtlar</span> eller <span class="lgtblue_bg dblue_txt">knutor</span> som bildas av normal bröstvävnad. Låt en läkare avgöra vad som är vad.
							</div>
						</li>
						<li class="wi_100 dflex marb15">
							<div class="wi_20p">
								<img src="<?php echo $path;?>html/usercontent/images/icon-info.png" class="wi_20p hei_auto dblock" />
							</div>
							<div class="flex_1 padl10">
								Röntgen av brösten, <span class="lgtblue_bg dblue_txt">mammografi</span>, kan påvisa cancertumörer som är så små att de inte går att känna.
							</div>
						</li>
						<li class="wi_100 dflex marb15">
							<div class="wi_20p">
								<img src="<?php echo $path;?>html/usercontent/images/icon-info.png" class="wi_20p hei_auto dblock" />
							</div>
							<div class="flex_1 padl10">
								Tio procent av alla <span class="lgtblue_bg dblue_txt">cancertumörer</span> i brösten syns inte på röntgenbilden, inte ens om de är stora. De upptäcks nästan alltid av kvinnan själv när hon <span class="lgtblue_bg dblue_txt">undersöker sina bröst</span>.
							</div>
						</li>
						<li class="wi_100 dflex marb15">
							<div class="wi_20p">
								<img src="<?php echo $path;?>html/usercontent/images/icon-info.png" class="wi_20p hei_auto dblock" />
							</div>
							<div class="flex_1 padl10">
								Kvinnor med få menstruationscykler under sitt liv, till exempel kvinnor som kommit sent i puberteten och fött många barn löper en något mindre risk att drabbas av <span class="lgtblue_bg dblue_txt">bröstcancer</span>. Det i sin tur tyder på att <span class="lgtblue_bg dblue_txt">hormoner</span> har betydelse för uppkomsten av bröstcancer.
							</div>
						</li>
						<li class="wi_100 dflex marb15">
							<div class="wi_20p">
								<img src="<?php echo $path;?>html/usercontent/images/icon-info.png" class="wi_20p hei_auto dblock" />
							</div>
							<div class="flex_1 padl10">
								Vid en mindre <span class="lgtblue_bg dblue_txt">cancertumör</span> som inte spridit sig räcker det i de flesta fall att ta bort en mindre del av bröstet. Tveka inte att gå till läkare även med en liten knöl!
							</div>
						</li>
						<li class="wi_100 dflex marb15">
							<div class="wi_20p">
								<img src="<?php echo $path;?>html/usercontent/images/icon-info.png" class="wi_20p hei_auto dblock" />
							</div>
							<div class="flex_1 padl10">
								<span class="lgtblue_bg dblue_txt">Slag mot brösten</span> orsakar inte cancer.
							</div>
						</li>
						<li class="wi_100 dflex marb15">
							<div class="wi_20p">
								<img src="<?php echo $path;?>html/usercontent/images/icon-info.png" class="wi_20p hei_auto dblock" />
							</div>
							<div class="flex_1 padl10">
								<span class="lgtblue_bg dblue_txt">Smärta</span> och <span class="lgtblue_bg dblue_txt">ömhet</span> i brösten är inte vanliga symtom vid bröstcancer, utan har oftast en helt naturlig hormonell orsak.
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Flow -->
		<div class="column_m padtb30 talc lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<h2 class="talc fsz34 lgn_hight_s12 padb30">Så här går det till</h2>
					<div class="flow-step wi_25 fleft">
						<div class="sprite-image flow-tools"></div>
						<h3 class="lgn_hight_s12 bold fsz20">Du har ett uppdrag</h3>
						<p>och vill ta betalt men har inget företag. Du kommer då överens med kunden att du fakturerar för arbetet via Frilans Finans.</p>
					</div>
					<div class="wi_12_5 fleft mart30">
						<div class="sprite-image arrow-blue"></div>
					</div>
					<div class="flow-step wi_25 fleft">
						<div class="sprite-image flow-screen"></div>
						<h3 class="lgn_hight_s12 bold fsz20">Du skapar en faktura hos oss</h3>
						<p>och fakturerar som privatperson istället. Vi tar endast 6% i avgift och inga andra kostnader tillkommer.</p>
					</div>
					<div class="wi_12_5 fleft mart30">
						<div class="sprite-image arrow-blue"></div>
					</div>
					<div class="flow-step wi_25 fleft">
						<div class="sprite-image flow-euro"></div>
						<h3 class="lgn_hight_s12 bold fsz20">Du får betalt inom 5 bankdagar</h3>
						<p>och med Expressbetalning redan inom 24 timmar.</p>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Features (bordered 2cols) -->
		<div class="column_m padtb30 talc lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<h2 class="talc fsz34 lgn_hight_s12 padb30">Så tycker våra egenanställda</h2>
					<table class="wi_100 brd_table_noperim" cellpadding="0" cellspacing="0">
						<tr>
							<td class="wi_50 pad30 valm">
								<span class="icon icon1"></span>
								<h4 class="bold fsz18">Email </h4>
								<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
								<a href="#" class="martrl5 dblue_btn">Submit</a>
							</td>
							<td class="wi_50 pad30 valm">
								<span class="icon icon2"></span>
								<h4 class="bold fsz18">Telephony</h4>
								<p>Have conversations with context. Make calls from Zoho CRM with single-click dialing and use call analytics to measure your team's performance. </p>
								<a href="#" class="martrl5 dblue_btn">Submit</a>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Features (bordered 3cols) -->
		<div class="column_m padtb30 talc lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<h2 class="talc fsz34 lgn_hight_s12 padb30">Så tycker våra egenanställda</h2>
					<table class="wi_100 brd_table_noperim" cellpadding="0" cellspacing="0">
						<tr>
							<td class="wi_33_333 pad30 valm">
								<span class="icon icon1"></span>
								<h4 class="bold fsz18">Email </h4>
								<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
								<a href="#" class="martrl5 dblue_btn">Submit</a>
							</td>
							<td class="wi_33_333 pad30 valm">
								<span class="icon icon2"></span>
								<h4 class="bold fsz18">Telephony</h4>
								<p>Have conversations with context. Make calls from Zoho CRM with single-click dialing and use call analytics to measure your team's performance. </p>
								<a href="#" class="martrl5 dblue_btn">Submit</a>
							</td>
							<td class="wi_33_333 pad30 valm">
								<span class="icon icon3"></span>
								<h4 class="bold fsz18">SalesSignals </h4>
								<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now. </p>
								<a href="#" class="martrl5 dblue_btn">Submit</a>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Perks -->
		<div class="start-perks column_m padtb30 talc lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<h2 class="talc fsz34 lgn_hight_s12 padb30">Fördelar med Frilans Finans</h2>
					<table class="wi_100 brd_table_noperim">
						<tr>
							<td class="wi_33_333 pad15 valt">
								<div class="sprite-image euro-bill marb10"></div>
								<h3 class="lgn_hight_s12 bold fsz20">Få betalt inom fem bankdagar</h3>
								<p>Normalt får du dina pengar efter fem bankdagar, oavsett om din kund har betalningsvillkor 30 dagar. Med ett Expresstillägg kan du få betalt redan inom 24 timmar. </p>
							</td>
							<td class="wi_33_333 pad15 valt">
								<div class="sprite-image note marb10"></div>
								<h3 class="lgn_hight_s12 bold fsz20">Slipp all administration</h3>
								<p>Det enda du behöver göra är att fokusera på ditt jobb. Vi tar hand om löneadministrationen, kontakterna med Skatteverket, inbetalning av moms och skatt samt försäkringar. Med oss kan du fakturera utan f-skatt.</p>
							</td>
							<td class="wi_33_333 pad15 valt">
								<div class="sprite-image heart marb10"></div>
								<h3 class="lgn_hight_s12 bold fsz20">Trygghet</h3>
								<p>Våra egenanställda får ett bra grundskydd genom basförsäkringen. Vi har även försäkringspaket för dig som vill ha extra skydd.</p>
							</td>
						</tr>
						<tr>
							<td class="wi_33_333 pad15 valt">
								<div class="sprite-image user marb10"></div>
								<h3 class="lgn_hight_s12 bold fsz20">Personlig service</h3>
								<p>Kontakta oss på klientstöd om du undrar över något. Vår erfarenhet och kunskap om egenanställning och administration finns till för dig.</p>
							</td>
							<td class="wi_33_333 pad15 valt">
								<div class="sprite-image like marb10"></div>
								<h3 class="lgn_hight_s12 bold fsz20">Endast 6% i avgift</h3>
								<p>Tjänsten kostar bara 6 % av det du fakturerar. Inga dolda kostnader eller avgifter tillkommer. Du får full koll på dina pengar. </p>
							</td>
							<td class="wi_33_333 pad15 valt">
								<div class="sprite-image params marb10"></div>
								<h3 class="lgn_hight_s12 bold fsz20">Skräddarsytt faktureringsverktyg</h3>
								<p>RUT och ROT, ändra momssats, gör avdrag, spara till pension och semester, jobba utomlands - allt är möjligt, faktureringsverktyget hjälper dig.</p>
							</td>
						</tr>
					</table>
					<div class="mart30">
						<a href="#" class="wi_20 marrl5 dblue_btn">Så fungerar det att fakturera</a>
						<a href="#" class="wi_20 marrl5 dblue_btn">Skapa faktura</a>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Features (1) -->
		<div class="column_m padtb30 talc lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<h2 class="talc fsz34 lgn_hight_s12 padb30">Så tycker våra egenanställda</h2>
					<div class="pad30 blue_bg white_txt">
						<h2 class="padb30 talc bold fsz28 white_txt">Multichannel</h2>
						<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
						<a href="#" class="white_txt">Learn more</a>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Features (1.1) -->
		<div class="column_m padtb30 talc lgn_hight_22 fsz16" id="features-1-1">
			<div class="wrap">
				<div class="container">
					<h2 class="talc fsz34 lgn_hight_s12 padb30">Så tycker våra egenanställda</h2>
					<table class="wi_100" cellpadding="0" cellspacing="0">
						<tr>
							<td class="wi_50 pad30 blue_bg valm tall white_txt">
								<h2 class="padb30 tall bold fsz28 white_txt">Multichannel</h2>
								<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
								<a href="#" class="white_txt">Learn more</a>
							</td>
							<td class="wi_50 pad30 valm">
								<span class="icon icon1"></span>
								<h4 class="bold fsz18">Email </h4>
								<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Features (1.1.1) -->
		<div class="column_m padtb30 talc lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<h2 class="talc fsz34 lgn_hight_s12 padb30">Så tycker våra egenanställda</h2>
					<table class="wi_100" cellpadding="0" cellspacing="0">
						<tr>
							<td class="wi_50 pad30 blue_bg valm tall white_txt">
								<h2 class="padb30 talc bold fsz28 white_txt">Multichannel</h2>
								<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
								<a href="#" class="white_txt">Learn more</a>
							</td>
							<td class="wi_50">
								<table class="wi_100" cellpadding="0" cellspacing="0">
									<tr>
										<td class="wi_50 pad15 valt">
											<span class="icon icon1"></span>
											<h4 class="bold fsz18">Email </h4>
											<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
										</td>
									</tr>
									<tr>
										<td class="wi_50 pad15 light_grey_bg valt">
											<span class="icon icon3"></span>
											<h4 class="bold fsz18">SalesSignals </h4>
											<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now. </p>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Features (1.1.2) -->
		<div class="column_m padtb30 talc lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<h2 class="talc fsz34 lgn_hight_s12 padb30">Så tycker våra egenanställda</h2>
					<table class="wi_100" cellpadding="0" cellspacing="0">
						<tr>
							<td class="wi_50 pad30 blue_bg valm tall white_txt">
								<h2 class="padb30 talc bold fsz28 white_txt">Multichannel</h2>
								<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
								<a href="#" class="white_txt">Learn more</a>
							</td>
							<td class="wi_50">
								<table class="wi_100" cellpadding="0" cellspacing="0">
									<tr>
										<td class="pad15 valt" colspan="2">
											<span class="icon icon1"></span>
											<h4 class="bold fsz18">Email </h4>
											<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
										</td>
									</tr>
									<tr>
										<td class="wi_50 pad15 valt">
											<span class="icon icon3"></span>
											<h4 class="bold fsz18">SalesSignals </h4>
											<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now. </p>
										</td>
										<td class="wi_50 pad15 light_grey_bg valt">
											<span class="icon icon4"></span>
											<h4 class="bold fsz18">Social </h4>
											<p>Bring social media into your sales process. Monitor trends and discover new leads, all from within Zoho CRM. </p>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Features (1.2.2 )-->
		<div class="column_m padtb30 talc lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<h2 class="talc fsz34 lgn_hight_s12 padb30">Så tycker våra egenanställda</h2>
					<table class="wi_100" cellpadding="0" cellspacing="0">
						<tr>
							<td class="wi_50 pad30 blue_bg valm tall white_txt">
								<h2 class="padb30 talc bold fsz28 white_txt">Multichannel</h2>
								<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
								<a href="#" class="white_txt">Learn more</a>
							</td>
							<td class="wi_50">
								<table class="wi_100" cellpadding="0" cellspacing="0">
									<tr>
										<td class="wi_50 pad15 light_grey_bg valt">
											<span class="icon icon1"></span>
											<h4 class="bold fsz18">Email </h4>
											<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
										</td>
										<td class="wi_50 pad15 valt">
											<span class="icon icon2"></span>
											<h4 class="bold fsz18">Telephony</h4>
											<p>Have conversations with context. Make calls from Zoho CRM with single-click dialing and use call analytics to measure your team's performance. </p>
										</td>
									</tr>
									<tr>
										<td class="wi_50 pad15 valt">
											<span class="icon icon3"></span>
											<h4 class="bold fsz18">SalesSignals </h4>
											<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now. </p>
										</td>
										<td class="wi_50 pad15 light_grey_bg valt">
											<span class="icon icon4"></span>
											<h4 class="bold fsz18">Social </h4>
											<p>Bring social media into your sales process. Monitor trends and discover new leads, all from within Zoho CRM. </p>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Features (1.1.2.2 )-->
		<div class="column_m padtb30 talc lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<h2 class="talc fsz34 lgn_hight_s12 padb30">Så tycker våra egenanställda</h2>
					<table class="wi_100" cellpadding="0" cellspacing="0">
						<tr>
							<td class="wi_50 pad30 blue_bg valm tall white_txt">
								<h2 class="padb30 talc bold fsz28 white_txt">Multichannel</h2>
								<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
								<a href="#" class="white_txt">Learn more</a>
							</td>
							<td class="wi_50">
								<table class="wi_100" cellpadding="0" cellspacing="0">
									<tr>
										<td class="wi_50 pad15 valt" colspan="2">
											<span class="icon icon1"></span>
											<h4 class="bold fsz18">Email </h4>
											<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
										</td>
									</tr>
									<tr>
										<td class="wi_50 pad15 light_grey_bg valt">
											<span class="icon icon1"></span>
											<h4 class="bold fsz18">Email </h4>
											<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
										</td>
										<td class="wi_50 pad15 valt">
											<span class="icon icon2"></span>
											<h4 class="bold fsz18">Telephony</h4>
											<p>Have conversations with context. Make calls from Zoho CRM with single-click dialing and use call analytics to measure your team's performance. </p>
										</td>
									</tr>
									<tr>
										<td class="wi_50 pad15 valt">
											<span class="icon icon3"></span>
											<h4 class="bold fsz18">SalesSignals </h4>
											<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now. </p>
										</td>
										<td class="wi_50 pad15 light_grey_bg valt">
											<span class="icon icon4"></span>
											<h4 class="bold fsz18">Social </h4>
											<p>Bring social media into your sales process. Monitor trends and discover new leads, all from within Zoho CRM. </p>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Features tabs (5.4 )-->
		<div class="column_m padtb30 talc lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<h2 class="talc fsz34 lgn_hight_s12 padb30">Så tycker våra egenanställda</h2>
					<table class="wi_100 brd" cellpadding="0" cellspacing="0">
						<tr>
							<td class="wi_50 valt tall">
								<table class="tab-header wi_100" cellpadding="0" cellspacing="0">
									<tr>
										<td class="wi_50 valt">
											<a href="#" class="dblock pad15 grey_bg hov_white_bg grey_txt active" data-id="features_tab_1">
												<span class="icon icon1"></span>
												<h4 class="bold fsz18">Tab 1</h4>
												<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
											</a>
										</td>
									</tr>
									<tr>
										<td class="wi_50 valt">
											<a href="#" class="dblock pad15 grey_bg hov_white_bg grey_txt" data-id="features_tab_2">
												<span class="icon icon1"></span>
												<h4 class="bold fsz18">Tab 2</h4>
												<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
											</a>
										</td>
									</tr>
									<tr>
										<td class="wi_50 valt">
											<a href="#" class="dblock pad15 grey_bg hov_white_bg grey_txt" data-id="features_tab_3">
												<span class="icon icon1"></span>
												<h4 class="bold fsz18">Tab 3</h4>
												<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
											</a>
										</td>
									</tr>
									<tr>
										<td class="wi_50 valt">
											<a href="#" class="dblock pad15 grey_bg hov_white_bg grey_txt" data-id="features_tab_4">
												<span class="icon icon1"></span>
												<h4 class="bold fsz18">Tab 4</h4>
												<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
											</a>
										</td>
									</tr>
									<tr>
										<td class="wi_50 valt">
											<a href="#" class="dblock pad15 grey_bg hov_white_bg grey_txt" data-id="features_tab_5">
												<span class="icon icon1"></span>
												<h4 class="bold fsz18">Tab 5</h4>
												<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
											</a>
										</td>
									</tr>
								</table>
							</td>
							<td class="wi_50 valt">
								<div class="tab-content" id="features_tab_1">
									<table class="wi_100" cellpadding="0" cellspacing="0">
										<tr>
											<td class="wi_50 pad15 valt" colspan="2">
												<span class="icon icon1"></span>
												<h4 class="bold fsz18">Telephony</h4>
												<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
											</td>
										</tr>
										<tr>
											<td class="wi_50 pad15 light_grey_bg valt">
												<span class="icon icon1"></span>
												<h4 class="bold fsz18">Tab 1</h4>
												<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
											</td>
											<td class="wi_50 pad15 valt">
												<span class="icon icon2"></span>
												<h4 class="bold fsz18">Telephony</h4>
												<p>Have conversations with context. Make calls from Zoho CRM with single-click dialing and use call analytics to measure your team's performance. </p>
											</td>
										</tr>
										<tr>
											<td class="wi_50 pad15 valt">
												<span class="icon icon3"></span>
												<h4 class="bold fsz18">SalesSignals </h4>
												<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now. </p>
											</td>
											<td class="wi_50 pad15 light_grey_bg valt">
												<span class="icon icon4"></span>
												<h4 class="bold fsz18">Social </h4>
												<p>Bring social media into your sales process. Monitor trends and discover new leads, all from within Zoho CRM. </p>
											</td>
										</tr>
									</table>
								</div>
								<div class="tab-content" id="features_tab_2">
									<table class="wi_100" cellpadding="0" cellspacing="0">
										<tr>
											<td class="wi_50 pad15 valt" colspan="2">
												<span class="icon icon1"></span>
												<h4 class="bold fsz18">Telephony</h4>
												<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
											</td>
										</tr>
										<tr>
											<td class="wi_50 pad15 light_grey_bg valt">
												<span class="icon icon1"></span>
												<h4 class="bold fsz18">Tab 2</h4>
												<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
											</td>
											<td class="wi_50 pad15 valt">
												<span class="icon icon2"></span>
												<h4 class="bold fsz18">Telephony</h4>
												<p>Have conversations with context. Make calls from Zoho CRM with single-click dialing and use call analytics to measure your team's performance. </p>
											</td>
										</tr>
										<tr>
											<td class="wi_50 pad15 valt">
												<span class="icon icon3"></span>
												<h4 class="bold fsz18">SalesSignals </h4>
												<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now. </p>
											</td>
											<td class="wi_50 pad15 light_grey_bg valt">
												<span class="icon icon4"></span>
												<h4 class="bold fsz18">Social </h4>
												<p>Bring social media into your sales process. Monitor trends and discover new leads, all from within Zoho CRM. </p>
											</td>
										</tr>
									</table>
								</div>
								<div class="tab-content" id="features_tab_3">
									<table class="wi_100" cellpadding="0" cellspacing="0">
										<tr>
											<td class="wi_50 pad15 valt" colspan="2">
												<span class="icon icon1"></span>
												<h4 class="bold fsz18">Telephony</h4>
												<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
											</td>
										</tr>
										<tr>
											<td class="wi_50 pad15 light_grey_bg valt">
												<span class="icon icon1"></span>
												<h4 class="bold fsz18">Tab 3</h4>
												<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
											</td>
											<td class="wi_50 pad15 valt">
												<span class="icon icon2"></span>
												<h4 class="bold fsz18">Telephony</h4>
												<p>Have conversations with context. Make calls from Zoho CRM with single-click dialing and use call analytics to measure your team's performance. </p>
											</td>
										</tr>
										<tr>
											<td class="wi_50 pad15 valt">
												<span class="icon icon3"></span>
												<h4 class="bold fsz18">SalesSignals </h4>
												<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now. </p>
											</td>
											<td class="wi_50 pad15 light_grey_bg valt">
												<span class="icon icon4"></span>
												<h4 class="bold fsz18">Social </h4>
												<p>Bring social media into your sales process. Monitor trends and discover new leads, all from within Zoho CRM. </p>
											</td>
										</tr>
									</table>
								</div>
								<div class="tab-content" id="features_tab_4">
									<table class="wi_100" cellpadding="0" cellspacing="0">
										<tr>
											<td class="wi_50 pad15 valt" colspan="2">
												<span class="icon icon1"></span>
												<h4 class="bold fsz18">Telephony</h4>
												<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
											</td>
										</tr>
										<tr>
											<td class="wi_50 pad15 light_grey_bg valt">
												<span class="icon icon1"></span>
												<h4 class="bold fsz18">Tab 4</h4>
												<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
											</td>
											<td class="wi_50 pad15 valt">
												<span class="icon icon2"></span>
												<h4 class="bold fsz18">Telephony</h4>
												<p>Have conversations with context. Make calls from Zoho CRM with single-click dialing and use call analytics to measure your team's performance. </p>
											</td>
										</tr>
										<tr>
											<td class="wi_50 pad15 valt">
												<span class="icon icon3"></span>
												<h4 class="bold fsz18">SalesSignals </h4>
												<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now. </p>
											</td>
											<td class="wi_50 pad15 light_grey_bg valt">
												<span class="icon icon4"></span>
												<h4 class="bold fsz18">Social </h4>
												<p>Bring social media into your sales process. Monitor trends and discover new leads, all from within Zoho CRM. </p>
											</td>
										</tr>
									</table>
								</div>
								<div class="tab-content" id="features_tab_5">
									<table class="wi_100" cellpadding="0" cellspacing="0">
										<tr>
											<td class="wi_50 pad15 valt" colspan="2">
												<span class="icon icon1"></span>
												<h4 class="bold fsz18">Telephony</h4>
												<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
											</td>
										</tr>
										<tr>
											<td class="wi_50 pad15 light_grey_bg valt">
												<span class="icon icon1"></span>
												<h4 class="bold fsz18">Tab 5</h4>
												<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
											</td>
											<td class="wi_50 pad15 valt">
												<span class="icon icon2"></span>
												<h4 class="bold fsz18">Telephony</h4>
												<p>Have conversations with context. Make calls from Zoho CRM with single-click dialing and use call analytics to measure your team's performance. </p>
											</td>
										</tr>
										<tr>
											<td class="wi_50 pad15 valt">
												<span class="icon icon3"></span>
												<h4 class="bold fsz18">SalesSignals </h4>
												<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now. </p>
											</td>
											<td class="wi_50 pad15 light_grey_bg valt">
												<span class="icon icon4"></span>
												<h4 class="bold fsz18">Social </h4>
												<p>Bring social media into your sales process. Monitor trends and discover new leads, all from within Zoho CRM. </p>
											</td>
										</tr>
									</table>
								</div>
								<div class="clear"></div>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Services tabs ( horizontal )-->
		<div class="column_m padb30 talc fsz16">
			<div class="wrap">
				<div class="container marb30">
					<ul class="tab-header nav-links list-inline mar0 pad0 brdb uppercase lgn_hight_68 bold">
						<li class="marrl10">
							<a href="#" class="dark_grey_txt active" data-id="tab_serv_Appstore">Appstore</a>
						</li>
						<li class="marrl10">
							<a href="#" class="dark_grey_txt" data-id="tab_serv_Solutions">Solutions</a>
						</li>
						<li class="marrl10">
							<a href="#" class="dark_grey_txt" data-id="tab_serv_Deestricts">Deestricts</a>
						</li>
						<li class="marrl10">
							<a href="#" class="dark_grey_txt" data-id="tab_serv_Employees2">Employees2</a>
						</li>
					</ul>
				</div>
				<div class="container">
					
					<!-- Appstore -->
					<div class="tab-content" id="tab_serv_Appstore">
									<table class="wi_100 talc" cellspacing="0" cellpadding="0">
										<tr>
											<td class="wi_50 pad10 brdr brdb valt">
												<h4 class="fsz24 bold">Sales &amp; Marketing</h4>
												<p>Give your sales team the perfect set of apps to help close more business deals in less time.</p>
												<div class="category-apps sales-marketing uppercase fsz12">
													<a href="#" class="wi_66 dblock fleft pos_rel bs_bb padt30 brdb brdb_blue_h brdr dark_grey_txt fsz16 crm featured-app"><span class="dblock pi1"></span> CRM</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdb brdb_blue_h dark_grey_txt salesinbox"><em class="dblock pos_abs padrl5 blue_bg white_txt fsz10 new">New</em><span class="dblock pi36"></span> SalesInbox</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdb brdb_blue_h brdr dark_grey_txt salesiq"><span class="dblock pi5"></span>SalesIQ</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdb brdb_blue_h brdr dark_grey_txt survey"><span class="dblock pi3"></span>Survey</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdb brdb_blue_h dark_grey_txt campaign"><span class="dblock pi2"></span>Campaigns</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdb brdb_blue_h brdr dark_grey_txt sites"><span class="dblock pi4"></span>Sites</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdb brdb_blue_h brdr dark_grey_txt social"><span class="dblock pi24"></span>Social </a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdb brdb_blue_h dark_grey_txt contactmanager"><span class="dblock pi6"></span>Contact<br> Manager</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdr brdb_blue_h dark_grey_txt forms nobottom"><span class="dblock pi25"></span> Forms</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdr brdb_blue_h dark_grey_txt motivator"><span class="dblock pi30"></span> Motivator</a>
            									</div>
            									<br/>
											</td>
											<td class="wi_50 pad10 brdb valt">
												<h4 class="fsz24 bold">Email &amp; Collaboration</h4>
												<p> Empower your workforce with apps to collaborate and transform the way they work.</p>
												<div class="category-apps email-collab uppercase fsz12">
													<a href="#" class="wi_66 dblock fleft pos_rel bs_bb padt30 brdb brdb_green_h brdr dark_grey_txt fsz16 mail featured-app"><span class="dblock pi9"></span>Mail</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdb brdb_green_h dark_grey_txt notebook"><em class="dblock pos_abs padrl5 blue_bg white_txt fsz10 new">New</em><span class="dblock pi35"></span> Notebook</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdb brdb_green_h brdr dark_grey_txt docs"><span class="dblock pi10"></span>Docs</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdb brdb_green_h brdr dark_grey_txt projects"><span class="dblock pi11"></span>Projects</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdb brdb_green_h dark_grey_txt connect"> <span class="dblock pi12"></span>Connect</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdb brdb_green_h brdr dark_grey_txt bugtracker"> <span class="dblock pi13"></span>BugTracker</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdb brdb_green_h brdr dark_grey_txt meeting"> <span class="dblock pi14"></span>Meeting</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdb brdb_green_h dark_grey_txt vault"><span class="dblock pi15"></span>Vault</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdb_green_h brdr dark_grey_txt showtime"><span class="dblock pi29"></span> ShowTime</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdb_green_h brdr dark_grey_txt chat"><span class="dblock pi31"></span> Chat</a>
												</div>
												<br/>
											</td>
										</tr>
										<tr>
											<td class="wi_50 pad10 brdr valt">
												<h4 class="fsz24 bold">Finance</h4>
												<p>Solve business accounting challenges using our perfect set of finance apps on the cloud. </p>
												<div class="category-apps sales-marketing uppercase fsz12">
													<a href="#" class="wi_66 dblock fleft pos_rel bs_bb padt30 brdb brdb_yellow_h brdr dark_grey_txt fsz16 books featured-app "><span class="dblock pi16"></span>Books</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdb brdb_yellow_h dark_grey_txt invoice"><span class="dblock pi17"></span>Invoice</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdb_yellow_h brdr dark_grey_txt subscription"><span class="dblock pi22"></span>Subscriptions</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdb_yellow_h brdr dark_grey_txt expense"><span class="dblock pi27"></span>Expense</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdb_yellow_h dark_grey_txt inventory"><span class="dblock pi28"></span>Inventory</a>
												</div>
											</td>
											<td class="wi_50 pad10 valt">
												<h4 class="fsz24 bold">IT &amp; Help Desk</h4>
												<p>Be right where your customers are with apps to help your business engage with them. </p>
												<div class="category-apps sales-marketing uppercase fsz12">
													<a href="#" class="wi_100 dblock fleft pos_rel bs_bb padt30 brdb brdb_darkblue_h dark_grey_txt fsz16 support featured-app"><span class="dblock pi7"></span>Support</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdb_darkblue_h brdr dark_grey_txt sdp-ondemand"><span class="dblock pi32"></span>ServiceDesk Plus</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdb_darkblue_h brdr dark_grey_txt mdm"><span class="dblock pi34"></span>Mobile Device <br> Management</a>
													<a href="#" class="wi_33 dblock fleft pos_rel bs_bb padt30 brdb_darkblue_h dark_grey_txt assist"><span class="dblock pi8"></span>Assist</a>
												</div>
											</td>
										</tr>
									</table>
								
									<div class="mart30 talc">
										<a href="mybusiness2_appstore.html" class="dblue_btn marrl15 fsz16" target="_self">Show more</a>
									</div>
					</div>
					
					<!-- Solutions -->
					<div class="tab-content" id="tab_serv_Solutions">
						<div class="column_m company_profile_list">
										<ul>
											<li class="first">
												<div class="padr15">
													<div class="company_pro_bx green">
														<div class="company_logo"><img src="<?php echo $path;?>html/usercontent/images/remo_ico.png" width="66" height="65" alt="Remotia" title="Remotia">
														</div>
														<div class="company_cat">Call Center</div>
														<div class="company_web"><span class="bold">Website:</span> www.remotia.com</div>
														<div class="company_add"><span class="bold">Address: </span>Botkyrka, Stockholm County, United Kingdom </div>
														<div class="connect_btn"> <a href="#">Provider</a> </div>
													</div>
													<div class="clear"></div>
												</div>
											</li>
											<li>
												<div class="padr15">
													<div class="company_pro_bx">
														<div class="company_logo"><img src="<?php echo $path;?>html/usercontent/images/tcs_ico.png" width="175" height="65" alt="Remotia" title="Remotia">
														</div>
														<div class="company_cat">IT</div>
														<div class="company_web"><span class="bold">Website:</span> www.tcs.com</div>
														<div class="company_add"><span class="bold">Address: </span>Botkyrka, Stockholm County, United Kingdom </div>
														<div class="connect_btn"> <a href="#">connect</a> </div>
													</div>
													<div class="clear"></div>
												</div>
											</li>
											<li>
												<div class="padr15">
													<div class="company_pro_bx">
														<div class="company_logo"><img src="<?php echo $path;?>html/usercontent/images/ernst_ico.png" width="175" height="65" alt="Remotia" title="Remotia">
														</div>
														<div class="company_cat">Staffing</div>
														<div class="company_web"><span class="bold">Website:</span> www.remotia.com</div>
														<div class="company_add"><span class="bold">Address: </span>Botkyrka, Stockholm County, United Kingdom </div>
														<div class="connect_btn"> <a href="#">connect</a> </div>
													</div>
													<div class="clear"></div>
												</div>
											</li>
											<li>
												<div class="padr15">
													<div class="company_pro_bx">
														<div class="company_logo"><img src="<?php echo $path;?>html/usercontent/images/tcs_ico.png" width="175" height="65" alt="Remotia" title="Remotia">
														</div>
														<div class="company_cat">IT</div>
														<div class="company_web"><span class="bold">Website:</span> www.tcs.com</div>
														<div class="company_add"><span class="bold">Address: </span>Botkyrka, Stockholm County, United Kingdom </div>
														<div class="connect_btn"> <a href="#">connect</a> </div>
													</div>
													<div class="clear"></div>
												</div>
											</li>
											<li>
												<div class="padr15">
													<div class="company_pro_bx">
														<div class="company_logo"><img src="<?php echo $path;?>html/usercontent/images/tcs_ico.png" width="175" height="65" alt="Remotia" title="Remotia">
														</div>
														<div class="company_cat">IT</div>
														<div class="company_web"><span class="bold">Website:</span> www.tcs.com</div>
														<div class="company_add"><span class="bold">Address: </span>Botkyrka, Stockholm County, United Kingdom </div>
														<div class="connect_btn"> <a href="#">connect</a> </div>
													</div>
													<div class="clear"></div>
												</div>
											</li>
											<li class="last">
												<div class="padr15">
													<div class="company_pro_bx">
														<div class="company_logo"><img src="<?php echo $path;?>html/usercontent/images/ernst_ico.png" width="175" height="65" alt="Remotia" title="Remotia">
														</div>
														<div class="company_cat">Staffing</div>
														<div class="company_web"><span class="bold">Website:</span> www.remotia.com</div>
														<div class="company_add"><span class="bold">Address: </span>Botkyrka, Stockholm County, United Kingdom </div>
														<div class="connect_btn"> <a href="#">connect</a> </div>
													</div>
													<div class="clear"></div>
												</div>
											</li>
										</ul>
									</div>
								
									<div class="mart30 talc">
										<a href="mybusiness2_solutions.html" class="dblue_btn marrl15 fsz16" target="_self">Show more</a>
									</div>
					</div>
					
					<!-- Deestricts -->
					<div class="tab-content" id="tab_serv_Deestricts">
						<div class="column_m company_profile_list">
										<ul>
											<li class="first">
												<div class="padr15">
													<div class="prodcut_spl_bx yellow">
														<div class="pad10"><span class="batch"></span>
															<div class="product_pic marb10"><img src="<?php echo $path;?>html/usercontent/images/serviceprovided.jpg" width="220" alt="lkl" title="lkl">
															</div>
															<h3 class="prdt_name padb5 fsz18"> Service #1</h3>
															<div class="column_m padt10">
																<div class="fsz11 padb5">Score Card RAting</div>
															</div>
															<div class="column_m">
																<div class="tw_clmn">
																	<div class="star_rating">
																		<div class="stars">
																			<div class="rating" style="width:85%"></div>
																		</div>
																	</div>
																</div>
																<div class="tw_clmn talr fsz11">270 reviews</div>
															</div>
															<div class="column_m fsz11 padt10"> Cursus ut, sed vitae, pulvinar massa, idend porta, nequetiam, elerisque mi id, consectetur, <a href="#">read more...</a> </div>
															<div class="column_m padt10"> <a href="#" class="green_btn dblock">VIEW PROFILE</a> </div>
															<div class="clear"></div>
														</div>
													</div>
													<div class="clear"></div>
												</div>
											</li>
											<li>
												<div class="padr15">
													<div class="prodcut_spl_bx">
														<div class="pad10">
															<div class="product_pic marb10"><img src="<?php echo $path;?>html/usercontent/images/serviceprovided.jpg" width="220" alt="lkl" title="lkl">
															</div>
															<h3 class="prdt_name padb5 fsz18"> Service #1</h3>
															<div class="column_m padt10">
																<div class="fsz11 padb5">Score Card RAting</div>
															</div>
															<div class="column_m">
																<div class="tw_clmn">
																	<div class="star_rating">
																		<div class="stars">
																			<div class="rating" style="width:85%"></div>
																		</div>
																	</div>
																</div>
																<div class="tw_clmn talr fsz11">270 reviews</div>
															</div>
															<div class="column_m fsz11 padt10"> Cursus ut, sed vitae, pulvinar massa, idend porta, nequetiam, elerisque mi id, consectetur, <a href="#">read more...</a> </div>
															<div class="column_m padt10"> <a href="#" class="green_btn dblock">VIEW PROFILE</a> </div>
															<div class="clear"></div>
														</div>
													</div>
													<div class="clear"></div>
												</div>
											</li>
											<li>
												<div class="padr15">
													<div class="prodcut_spl_bx">
														<div class="pad10">
															<div class="product_pic marb10"><img src="<?php echo $path;?>html/usercontent/images/serviceprovided.jpg" width="220" alt="lkl" title="lkl">
															</div>
															<h3 class="prdt_name padb5 fsz18"> Service #1</h3>
															<div class="column_m padt10">
																<div class="fsz11 padb5">Score Card RAting</div>
															</div>
															<div class="column_m">
																<div class="tw_clmn">
																	<div class="star_rating">
																		<div class="stars">
																			<div class="rating" style="width:85%"></div>
																		</div>
																	</div>
																</div>
																<div class="tw_clmn talr fsz11">270 reviews</div>
															</div>
															<div class="column_m fsz11 padt10"> Cursus ut, sed vitae, pulvinar massa, idend porta, nequetiam, elerisque mi id, consectetur, <a href="#">read more...</a> </div>
															<div class="column_m padt10"> <a href="#" class="green_btn dblock">VIEW PROFILE</a> </div>
															<div class="clear"></div>
														</div>
													</div>
													<div class="clear"></div>
												</div>
											</li>
											<li>
												<div class="padr15">
													<div class="prodcut_spl_bx">
														<div class="pad10">
															<div class="product_pic marb10"><img src="<?php echo $path;?>html/usercontent/images/serviceprovided.jpg" width="220" alt="lkl" title="lkl">
															</div>
															<h3 class="prdt_name padb5 fsz18"> Service #1</h3>
															<div class="column_m padt10">
																<div class="fsz11 padb5">Score Card RAting</div>
															</div>
															<div class="column_m">
																<div class="tw_clmn">
																	<div class="star_rating">
																		<div class="stars">
																			<div class="rating" style="width:85%"></div>
																		</div>
																	</div>
																</div>
																<div class="tw_clmn talr fsz11">270 reviews</div>
															</div>
															<div class="column_m fsz11 padt10"> Cursus ut, sed vitae, pulvinar massa, idend porta, nequetiam, elerisque mi id, consectetur, <a href="#">read more...</a> </div>
															<div class="column_m padt10"> <a href="#" class="green_btn dblock">VIEW PROFILE</a> </div>
															<div class="clear"></div>
														</div>
													</div>
													<div class="clear"></div>
												</div>
											</li>
											<li class="clear"></li>
											<li>
												<div class="padr15">
													<div class="prodcut_spl_bx">
														<div class="pad10">
															<div class="product_pic marb10"><img src="<?php echo $path;?>html/usercontent/images/serviceprovided.jpg" width="220" alt="lkl" title="lkl">
															</div>
															<h3 class="prdt_name padb5 fsz18"> Service #1</h3>
															<div class="column_m padt10">
																<div class="fsz11 padb5">Score Card RAting</div>
															</div>
															<div class="column_m">
																<div class="tw_clmn">
																	<div class="star_rating">
																		<div class="stars">
																			<div class="rating" style="width:85%"></div>
																		</div>
																	</div>
																</div>
																<div class="tw_clmn talr fsz11">270 reviews</div>
															</div>
															<div class="column_m fsz11 padt10"> Cursus ut, sed vitae, pulvinar massa, idend porta, nequetiam, elerisque mi id, consectetur, <a href="#">read more...</a> </div>
															<div class="column_m padt10"> <a href="#" class="green_btn dblock">VIEW PROFILE</a> </div>
															<div class="clear"></div>
														</div>
													</div>
													<div class="clear"></div>
												</div>
											</li>
											<li class="last">
												<div class="padr15">
													<div class="prodcut_spl_bx">
														<div class="pad10">
															<div class="product_pic marb10"><img src="<?php echo $path;?>html/usercontent/images/serviceprovided.jpg" width="220" alt="lkl" title="lkl">
															</div>
															<h3 class="prdt_name padb5 fsz18"> Service #1</h3>
															<div class="column_m padt10">
																<div class="fsz11 padb5">Score Card RAting</div>
															</div>
															<div class="column_m">
																<div class="tw_clmn">
																	<div class="star_rating">
																		<div class="stars">
																			<div class="rating" style="width:85%"></div>
																		</div>
																	</div>
																</div>
																<div class="tw_clmn talr fsz11">270 reviews</div>
															</div>
															<div class="column_m fsz11 padt10"> Cursus ut, sed vitae, pulvinar massa, idend porta, nequetiam, elerisque mi id, consectetur, <a href="#">read more...</a> </div>
															<div class="column_m padt10"> <a href="#" class="green_btn dblock">VIEW PROFILE</a> </div>
															<div class="clear"></div>
														</div>
													</div>
													<div class="clear"></div>
												</div>
											</li>
										</ul>
									</div>
									
									<div class="mart30 talc">
										<a href="mybusiness2_deestricts.html" class="dblue_btn marrl15 fsz16" target="_self">Show more</a>
									</div>
					</div>
					
					<!-- Employees2 -->
					<div class="tab-content" id="tab_serv_Employees2">
						<div class="white_bg column_m profile_sorting_list">
										<div class="pad15">
											<div class="wi_30 fleft">
												<div class="padt5"> <span class="fsz14 darkgrey_txt">Members </span>&nbsp;&nbsp;<a href="#" class="fsz12"><span class="plus_add"></span> Add new</a> </div>
											</div>
											<div class="wi_70 fleft">
												<ul class="sorting_list_links">
													<li class="first">Filter by : </li>
													<li><a href="#" class="active">All</a>
													</li>
													<li><a href="#">Ascending</a>
													</li>
													<li><a href="#">Desending</a>
													</li>
													<li class="search_bx last">
														<input type="text" id="s" name="s" onfocus="if(this.value=='Search Contractor')this.value='';" onblur="if(this.value=='')this.value='Search Contractor';" value="Search Contractor" class="">
														<input type="submit" value=""> </li>
												</ul>
											</div>
											<div class="clear"></div>
										</div>
										<div class="contractor_list padl25">
											<ul>
												<li class="first">
													<div class="contractor_small_bx">
														<div class="hover_view_link"><a href="#" class="tooltip" title="Click to View Profile">View Profile</a>
														</div>
														<div class="contactor_pic"><img src="<?php echo $path;?>html/usercontent/images/contractor_sample/contractor_sample_1.jpg" width="100" height="100" alt="Contractor" title="Contractor">
														</div>
														<div class="contractor_detail tall">
															<div class="pad15">
																<h2 class="fsz14 padb5">Kowaken Ghirmai</h2>
																<p class="lgtgrey_txt">CEO</p>
																<p class="pad0"><span class="gps_grey_ico"></span>Chennai, TN, India</p>
															</div>
														</div>
														<div class="clear"></div>
													</div>
												</li>
												<li>
													<div class="contractor_small_bx">
														<div class="hover_view_link"><a href="#" class="tooltip" title="Click to View Profile">View Profile</a>
														</div>
														<div class="contactor_pic"><img src="<?php echo $path;?>html/usercontent/images/contractor_sample/contractor_sample_2.jpg" width="100" height="100" alt="Contractor" title="Contractor">
														</div>
														<div class="contractor_detail tall">
															<div class="pad15">
																<h2 class="fsz14 padb5">Kowaken Ghirmai</h2>
																<p class="lgtgrey_txt">CEO</p>
																<p class="pad0"><span class="gps_grey_ico"></span>Chennai, TN, India</p>
															</div>
														</div>
														<div class="clear"></div>
													</div>
												</li>
												<li class="clear"></li>
												<li>
													<div class="contractor_small_bx">
														<div class="hover_view_link"><a href="#" class="tooltip" title="Click to View Profile">View Profile</a>
														</div>
														<div class="contactor_pic"><img src="<?php echo $path;?>html/usercontent/images/contractor_sample/contractor_sample_3.jpg" width="100" height="100" alt="Contractor" title="Contractor">
														</div>
														<div class="contractor_detail tall">
															<div class="pad15">
																<h2 class="fsz14 padb5">Kowaken Ghirmai</h2>
																<p class="lgtgrey_txt">CEO</p>
																<p class="pad0"><span class="gps_grey_ico"></span>Chennai, TN, India</p>
															</div>
														</div>
														<div class="clear"></div>
													</div>
												</li>
												<li>
													<div class="contractor_small_bx">
														<div class="hover_view_link"><a href="#" class="tooltip" title="Click to View Profile">View Profile</a>
														</div>
														<div class="contactor_pic"><img src="<?php echo $path;?>html/usercontent/images/contractor_sample/contractor_sample_6.jpg" width="100" height="100" alt="Contractor" title="Contractor">
														</div>
														<div class="contractor_detail tall">
															<div class="pad15">
																<h2 class="fsz14 padb5">Kowaken Ghirmai</h2>
																<p class="lgtgrey_txt">CEO</p>
																<p class="pad0"><span class="gps_grey_ico"></span>Chennai, TN, India</p>
															</div>
														</div>
														<div class="clear"></div>
													</div>
												</li>
												<li class="clear"></li>
												<li>
													<div class="contractor_small_bx">
														<div class="hover_view_link"><a href="#" class="tooltip" title="Click to View Profile">View Profile</a>
														</div>
														<div class="contactor_pic"><img src="<?php echo $path;?>html/usercontent/images/contractor_sample/contractor_sample_5.jpg" width="100" height="100" alt="Contractor" title="Contractor">
														</div>
														<div class="contractor_detail tall">
															<div class="pad15">
																<h2 class="fsz14 padb5">Kowaken Ghirmai</h2>
																<p class="lgtgrey_txt">CEO</p>
																<p class="pad0"><span class="gps_grey_ico"></span>Chennai, TN, India</p>
															</div>
														</div>
														<div class="clear"></div>
													</div>
												</li>
												<li>
													<div class="contractor_small_bx">
														<div class="hover_view_link"><a href="#" class="tooltip" title="Click to View Profile">View Profile</a>
														</div>
														<div class="contactor_pic"><img src="<?php echo $path;?>html/usercontent/images/contractor_sample/contractor_sample_4.jpg" width="100" height="100" alt="Contractor" title="Contractor">
														</div>
														<div class="contractor_detail tall">
															<div class="pad15">
																<h2 class="fsz14 padb5">Kowaken Ghirmai</h2>
																<p class="lgtgrey_txt">CEO</p>
																<p class="pad0"><span class="gps_grey_ico"></span>Chennai, TN, India</p>
															</div>
														</div>
														<div class="clear"></div>
													</div>
												</li>
												<li class="clear last"></li>
											</ul>
											<div class="clear"></div>
										</div>
										<div class="clear"></div>
									</div>
									
									<div class="mart30 talc">
										<a href="mybusiness2_employees2.html" class="dblue_btn marrl15 fsz16" target="_self">Show more</a>
									</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Features tabs ( horizontal )-->
		<div class="column_m padb30 talc lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container marb30">
					<ul class="tab-header nav-links list-inline mar0 pad0 brdb uppercase lgn_hight_68 bold">
						<li class="marrl10">
							<a href="#" class="dark_grey_txt active" data-id="features_htab_1">Tab 1</a>
						</li>
						<li class="marrl10">
							<a href="#" class="dark_grey_txt" data-id="features_htab_2">Tab 2</a>
						</li>
						<li class="marrl10">
							<a href="#" class="dark_grey_txt" data-id="features_htab_3">Tab 3</a>
						</li>
						<li class="marrl10">
							<a href="#" class="dark_grey_txt" data-id="features_htab_4">Tab 4</a>
						</li>
						<li class="marrl10">
							<a href="#" class="dark_grey_txt" data-id="features_htab_5">Tab 5</a>
						</li>
					</ul>
				</div>
				<div class="container">
					<div class="tab-content" id="features_htab_1">
						<table class="wi_100" cellpadding="0" cellspacing="0">
							<tr>
								<td class="wi_50 pad30 blue_bg valm tall white_txt">
									<h2 class="padb30 talc bold fsz28 white_txt">Multichannel</h2>
									<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
									<a href="#" class="white_txt">Learn more</a>
								</td>
								<td class="wi_50">
									<table class="wi_100" cellpadding="0" cellspacing="0">
										<tr>
											<td class="wi_50 pad15 light_grey_bg valt">
												<span class="icon icon1"></span>
												<h4 class="bold fsz18">Tab 1 </h4>
												<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
											</td>
											<td class="wi_50 pad15 valt">
												<span class="icon icon2"></span>
												<h4 class="bold fsz18">Telephony</h4>
												<p>Have conversations with context. Make calls from Zoho CRM with single-click dialing and use call analytics to measure your team's performance. </p>
											</td>
										</tr>
										<tr>
											<td class="wi_50 pad15 valt">
												<span class="icon icon3"></span>
												<h4 class="bold fsz18">SalesSignals </h4>
												<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now. </p>
											</td>
											<td class="wi_50 pad15 light_grey_bg valt">
												<span class="icon icon4"></span>
												<h4 class="bold fsz18">Social </h4>
												<p>Bring social media into your sales process. Monitor trends and discover new leads, all from within Zoho CRM. </p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</div>
					<div class="tab-content" id="features_htab_2">
						<table class="wi_100" cellpadding="0" cellspacing="0">
							<tr>
								<td class="wi_50 pad30 blue_bg valm tall white_txt">
									<h2 class="padb30 talc bold fsz28 white_txt">Multichannel</h2>
									<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
									<a href="#" class="white_txt">Learn more</a>
								</td>
								<td class="wi_50">
									<table class="wi_100" cellpadding="0" cellspacing="0">
										<tr>
											<td class="wi_50 pad15 light_grey_bg valt">
												<span class="icon icon1"></span>
												<h4 class="bold fsz18">Tab 2 </h4>
												<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
											</td>
											<td class="wi_50 pad15 valt">
												<span class="icon icon2"></span>
												<h4 class="bold fsz18">Telephony</h4>
												<p>Have conversations with context. Make calls from Zoho CRM with single-click dialing and use call analytics to measure your team's performance. </p>
											</td>
										</tr>
										<tr>
											<td class="wi_50 pad15 valt">
												<span class="icon icon3"></span>
												<h4 class="bold fsz18">SalesSignals </h4>
												<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now. </p>
											</td>
											<td class="wi_50 pad15 light_grey_bg valt">
												<span class="icon icon4"></span>
												<h4 class="bold fsz18">Social </h4>
												<p>Bring social media into your sales process. Monitor trends and discover new leads, all from within Zoho CRM. </p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</div>
					<div class="tab-content" id="features_htab_3">
						<table class="wi_100" cellpadding="0" cellspacing="0">
							<tr>
								<td class="wi_50 pad30 blue_bg valm tall white_txt">
									<h2 class="padb30 talc bold fsz28 white_txt">Multichannel</h2>
									<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
									<a href="#" class="white_txt">Learn more</a>
								</td>
								<td class="wi_50">
									<table class="wi_100" cellpadding="0" cellspacing="0">
										<tr>
											<td class="wi_50 pad15 light_grey_bg valt">
												<span class="icon icon1"></span>
												<h4 class="bold fsz18">Tab 3 </h4>
												<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
											</td>
											<td class="wi_50 pad15 valt">
												<span class="icon icon2"></span>
												<h4 class="bold fsz18">Telephony</h4>
												<p>Have conversations with context. Make calls from Zoho CRM with single-click dialing and use call analytics to measure your team's performance. </p>
											</td>
										</tr>
										<tr>
											<td class="wi_50 pad15 valt">
												<span class="icon icon3"></span>
												<h4 class="bold fsz18">SalesSignals </h4>
												<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now. </p>
											</td>
											<td class="wi_50 pad15 light_grey_bg valt">
												<span class="icon icon4"></span>
												<h4 class="bold fsz18">Social </h4>
												<p>Bring social media into your sales process. Monitor trends and discover new leads, all from within Zoho CRM. </p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</div>
					<div class="tab-content" id="features_htab_4">
						<table class="wi_100" cellpadding="0" cellspacing="0">
							<tr>
								<td class="wi_50 pad30 blue_bg valm tall white_txt">
									<h2 class="padb30 talc bold fsz28 white_txt">Multichannel</h2>
									<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
									<a href="#" class="white_txt">Learn more</a>
								</td>
								<td class="wi_50">
									<table class="wi_100" cellpadding="0" cellspacing="0">
										<tr>
											<td class="wi_50 pad15 light_grey_bg valt">
												<span class="icon icon1"></span>
												<h4 class="bold fsz18">Tab 4 </h4>
												<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
											</td>
											<td class="wi_50 pad15 valt">
												<span class="icon icon2"></span>
												<h4 class="bold fsz18">Telephony</h4>
												<p>Have conversations with context. Make calls from Zoho CRM with single-click dialing and use call analytics to measure your team's performance. </p>
											</td>
										</tr>
										<tr>
											<td class="wi_50 pad15 valt">
												<span class="icon icon3"></span>
												<h4 class="bold fsz18">SalesSignals </h4>
												<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now. </p>
											</td>
											<td class="wi_50 pad15 light_grey_bg valt">
												<span class="icon icon4"></span>
												<h4 class="bold fsz18">Social </h4>
												<p>Bring social media into your sales process. Monitor trends and discover new leads, all from within Zoho CRM. </p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</div>
					<div class="tab-content" id="features_htab_5">
						<table class="wi_100" cellpadding="0" cellspacing="0">
							<tr>
								<td class="wi_50 pad30 blue_bg valm tall white_txt">
									<h2 class="padb30 talc bold fsz28 white_txt">Multichannel</h2>
									<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
									<a href="#" class="white_txt">Learn more</a>
								</td>
								<td class="wi_50">
									<table class="wi_100" cellpadding="0" cellspacing="0">
										<tr>
											<td class="wi_50 pad15 light_grey_bg valt">
												<span class="icon icon1"></span>
												<h4 class="bold fsz18">Tab 5 </h4>
												<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
											</td>
											<td class="wi_50 pad15 valt">
												<span class="icon icon2"></span>
												<h4 class="bold fsz18">Telephony</h4>
												<p>Have conversations with context. Make calls from Zoho CRM with single-click dialing and use call analytics to measure your team's performance. </p>
											</td>
										</tr>
										<tr>
											<td class="wi_50 pad15 valt">
												<span class="icon icon3"></span>
												<h4 class="bold fsz18">SalesSignals </h4>
												<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now. </p>
											</td>
											<td class="wi_50 pad15 light_grey_bg valt">
												<span class="icon icon4"></span>
												<h4 class="bold fsz18">Social </h4>
												<p>Bring social media into your sales process. Monitor trends and discover new leads, all from within Zoho CRM. </p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Features (bordered 1) -->
		<div class="column_m padtb30 talc lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<h2 class="talc fsz34 lgn_hight_s12 padb30">Så tycker våra egenanställda</h2>
					<div class="pad30">
						<h2 class="padb30 talc bold fsz28">Multichannel</h2>
						<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
						<a href="#">Learn more</a>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Features (bordered 1.1) -->
		<div class="column_m padtb30 talc lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<h2 class="talc fsz34 lgn_hight_s12 padb30">Så tycker våra egenanställda</h2>
					<table class="wi_100 brd_table_noperim" cellpadding="0" cellspacing="0">
						<tr>
							<td class="wi_50 pad30 valm tall">
								<h2 class="padb30 tall bold fsz28">Multichannel</h2>
								<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
								<a href="#">Learn more</a>
							</td>
							<td class="wi_50 pad30 valm">
								<span class="icon icon1"></span>
								<h4 class="bold fsz18">Email </h4>
								<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Features (bordered 1.1.1) -->
		<div class="column_m padtb30 talc lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<h2 class="talc fsz34 lgn_hight_s12 padb30">Så tycker våra egenanställda</h2>
					<table class="wi_100 brd_table_noperim" cellpadding="0" cellspacing="0">
						<tr>
							<td class="wi_50 pad30 valm tall">
								<h2 class="padb30 talc bold fsz28">Multichannel</h2>
								<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
								<a href="#" class="">Learn more</a>
							</td>
							<td class="wi_50">
								<table class="wi_100" cellpadding="0" cellspacing="0">
									<tr>
										<td class="wi_50 pad15 valt">
											<span class="icon icon1"></span>
											<h4 class="bold fsz18">Email </h4>
											<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
										</td>
									</tr>
									<tr>
										<td class="wi_50 pad15 valt">
											<span class="icon icon3"></span>
											<h4 class="bold fsz18">SalesSignals </h4>
											<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now. </p>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Features (bordered 1.1.2) -->
		<div class="column_m padtb30 talc lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<h2 class="talc fsz34 lgn_hight_s12 padb30">Så tycker våra egenanställda</h2>
					<table class="wi_100 brd_table_noperim" cellpadding="0" cellspacing="0">
						<tr>
							<td class="wi_50 pad30 valm tall">
								<h2 class="padb30 talc bold fsz28">Multichannel</h2>
								<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
								<a href="#" class="">Learn more</a>
							</td>
							<td class="wi_50">
								<table class="wi_100" cellpadding="0" cellspacing="0">
									<tr>
										<td class="wi_50 pad15 valt" colspan="2">
											<span class="icon icon1"></span>
											<h4 class="bold fsz18">Email </h4>
											<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
										</td>
									</tr>
									<tr>
										<td class="wi_50 pad15 valt">
											<span class="icon icon3"></span>
											<h4 class="bold fsz18">SalesSignals </h4>
											<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now. </p>
										</td>
										<td class="wi_50 pad15 valt">
											<span class="icon icon4"></span>
											<h4 class="bold fsz18">Social </h4>
											<p>Bring social media into your sales process. Monitor trends and discover new leads, all from within Zoho CRM. </p>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Features (bordered 1.2.2) -->
		<div class="column_m padtb30 talc lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<h2 class="talc fsz34 lgn_hight_s12 padb30">Så tycker våra egenanställda</h2>
					<table class="wi_100 brd_table_noperim" cellpadding="0" cellspacing="0">
						<tr>
							<td class="wi_50 pad30 valm tall">
								<h2 class="padb30 talc bold fsz28">Multichannel</h2>
								<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
								<a href="#" class="">Learn more</a>
							</td>
							<td class="wi_50">
								<table class="wi_100" cellpadding="0" cellspacing="0">
									<tr>
										<td class="wi_50 pad15 valt">
											<span class="icon icon1"></span>
											<h4 class="bold fsz18">Email </h4>
											<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
										</td>
										<td class="wi_50 pad15 valt">
											<span class="icon icon2"></span>
											<h4 class="bold fsz18">Telephony</h4>
											<p>Have conversations with context. Make calls from Zoho CRM with single-click dialing and use call analytics to measure your team's performance. </p>
										</td>
									</tr>
									<tr>
										<td class="wi_50 pad15 valt">
											<span class="icon icon3"></span>
											<h4 class="bold fsz18">SalesSignals </h4>
											<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now. </p>
										</td>
										<td class="wi_50 pad15 valt">
											<span class="icon icon4"></span>
											<h4 class="bold fsz18">Social </h4>
											<p>Bring social media into your sales process. Monitor trends and discover new leads, all from within Zoho CRM. </p>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Features (bordered 1.1.2.2) -->
		<div class="column_m padtb30 talc lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<h2 class="talc fsz34 lgn_hight_s12 padb30">Så tycker våra egenanställda</h2>
					<table class="wi_100 brd_table_noperim" cellpadding="0" cellspacing="0">
						<tr>
							<td class="wi_50 pad30 valm tall">
								<h2 class="padb30 talc bold fsz28">Multichannel</h2>
								<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
								<a href="#" class="">Learn more</a>
							</td>
							<td class="wi_50">
								<table class="wi_100" cellpadding="0" cellspacing="0">
									<tr>
										<td class="wi_50 pad15 valt" colspan="2">
											<span class="icon icon1"></span>
											<h4 class="bold fsz18">Email </h4>
											<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
										</td>
									</tr>
									<tr>
										<td class="wi_50 pad15 valt">
											<span class="icon icon1"></span>
											<h4 class="bold fsz18">Email </h4>
											<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
										</td>
										<td class="wi_50 pad15 valt">
											<span class="icon icon2"></span>
											<h4 class="bold fsz18">Telephony</h4>
											<p>Have conversations with context. Make calls from Zoho CRM with single-click dialing and use call analytics to measure your team's performance. </p>
										</td>
									</tr>
									<tr>
										<td class="wi_50 pad15 valt">
											<span class="icon icon3"></span>
											<h4 class="bold fsz18">SalesSignals </h4>
											<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now. </p>
										</td>
										<td class="wi_50 pad15 valt">
											<span class="icon icon4"></span>
											<h4 class="bold fsz18">Social </h4>
											<p>Bring social media into your sales process. Monitor trends and discover new leads, all from within Zoho CRM. </p>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Price table -->
		<div class="column_m padtb30 talc lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<h2 class="talc fsz34 lgn_hight_s12 padb30">Så tycker våra egenanställda</h2>
					<table class="wi_100 brd_table_perim" cellpadding="0" cellspacing="0">
						<tr>
							<td class="wi_25 pad0 nobrd"></td>
							<td class="wi_25 pad0 nobrd brdt_lightblue"></td>
							<td class="wi_25 pad0 nobrd brdt_blue"></td>
							<td class="wi_25 pad0 nobrd brdt_darkblue"></td>
						</tr>
						<tr>
							<td class="wi_25 nobrdt nobrdl tall">
								<span>Each option includes access to Upwork's large pool of top-quality freelancers. Choose the level of service you need.</span>
							</td>
							<td class="wi_25 pad0 valt light_grey_bg">
								<div class="pad15 white_bg">
									<h4 class="bold fsz18">Upwork</h4>
									<p class="bold">Professional freelancers and the essentials to find them.</p>
								</div>
								<div class="pad15">
									<p class="bold dark_grey_txt">Free to join, post jobs, and hire</p>
									<a href="#" class="marrl5 dblue_btn">Sign Up</a>
								</div>
							</td>
							<td class="wi_25 pad0 valt light_grey_bg">
								<div class="pad15 white_bg">
									<h4 class="bold fsz18">Upwork Pro</h4>
									<p class="bold">Premium talent, pre-vetted and handpicked for you.</p>
								</div>
								<div class="pad15">
									<p class="bold dark_grey_txt">Client pays $500 per job search + 10% of invoice</p>
									<a href="#" class="marrl5 dblue_btn">Full Details</a>
								</div>
							</td>
							<td class="wi_25 pad0 valt light_grey_bg">
								<div class="pad15 white_bg">
									<h4 class="bold fsz18">Upwork Enterprise</h4>
									<p class="bold">Customized, end-to-end Freelancer Management System.</p>
								</div>
								<div class="pad15">
									<p class="bold dark_grey_txt">Price varies — contact us</p>
									<a href="#" class="marrl5 dblue_btn">Full Details</a>
								</div>
							</td>
						</tr>
					</table>
					<div id="price_details_table" style="display: none;">
						<table class="wi_100 brd_table_perim" cellpadding="0" cellspacing="0" id="price_details_table">
							<tr>
								<td class="wi_25 pad15 tall">
									<p class="pad0 bold dark_grey_txt">Search algorithms to find the right freelancer</p>
								</td>
								<td class="wi_25 pad15 valm">
									<img src="<?php echo $path;?>html/usercontent/images/icon-check.png" />
								</td>
								<td class="wi_25 pad15 valm">
									<img src="<?php echo $path;?>html/usercontent/images/icon-check.png" />
								</td>
								<td class="wi_25 pad15 valm">
									<img src="<?php echo $path;?>html/usercontent/images/icon-check.png" />
								</td>
							</tr>
							<tr>
								<td class="wi_25 pad15 tall">
									<p class="pad0 bold dark_grey_txt">Built-in collaboration and payment features</p>
								</td>
								<td class="wi_25 pad15 valm">
									<img src="<?php echo $path;?>html/usercontent/images/icon-check.png" />
								</td>
								<td class="wi_25 pad15 valm">
									<img src="<?php echo $path;?>html/usercontent/images/icon-check.png" />
								</td>
								<td class="wi_25 pad15 valm">
									<img src="<?php echo $path;?>html/usercontent/images/icon-check.png" />
								</td>
							</tr>
							<tr>
								<td class="wi_25 pad15 tall">
									<p class="pad0 bold dark_grey_txt">Freelancers pre-vetted by Upwork</p>
								</td>
								<td class="wi_25 pad15 valm">
								</td>
								<td class="wi_25 pad15 valm">
									<img src="<?php echo $path;?>html/usercontent/images/icon-check.png" />
								</td>
								<td class="wi_25 pad15 valm">
									<img src="<?php echo $path;?>html/usercontent/images/icon-check.png" />
								</td>
							</tr>
							<tr>
								<td class="wi_25 pad15 tall">
									<p class="pad0 bold dark_grey_txt">Dedicated account management</p>
								</td>
								<td class="wi_25 pad15 valm">
								</td>
								<td class="wi_25 pad15 valm">
									<img src="<?php echo $path;?>html/usercontent/images/icon-check.png" />
								</td>
								<td class="wi_25 pad15 valm">
									<img src="<?php echo $path;?>html/usercontent/images/icon-check.png" />
								</td>
							</tr>
							<tr>
								<td class="wi_25 pad15 tall">
									<p class="pad0 bold dark_grey_txt">Tailored onboarding and payment options</p>
								</td>
								<td class="wi_25 pad15 valm">
								</td>
								<td class="wi_25 pad15 valm">
								</td>
								<td class="wi_25 pad15 valm">
									<img src="<?php echo $path;?>html/usercontent/images/icon-check.png" />
								</td>
							</tr>
							<tr>
								<td class="wi_25 pad15 tall">
									<p class="pad0 bold dark_grey_txt">Worker classification services</p>
								</td>
								<td class="wi_25 pad15 valm">
								</td>
								<td class="wi_25 pad15 valm">
								</td>
								<td class="wi_25 pad15 valm">
									<img src="<?php echo $path;?>html/usercontent/images/icon-check.png" />
								</td>
							</tr>
						</table>
					</div>
					<div class="padtb15 brdb tall">
						<a href="#" class="toggle-btn bold dark_grey_txt" data-toggle-id="price_details_table">
						<span class="sprite-image arrow-bottom"></span>
						<span class="sprite-image arrow-up"></span>
						Compare details
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- FAQ (1 column) -->
		<div class="column_m padtb30 tall lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<h2 class="talc fsz34 lgn_hight_s12 padb30">Top 5 Questions We Hear Customers Ask</h2>
					<div class="brdt">
						<div class="pad25 brdb">
							<a href="#" class="toggle-btn dblock uppercase bold dark_grey_txt" data-toggle-id="question_1">
							<span class="sprite-image arrow-bottom fright"></span>
							<span class="sprite-image arrow-up fright"></span>
							What projects can i do on Upwork?
							</a>
							<div class="hide padt20" id="question_1">
								<strong>What kind of work can I get done?</strong> Anything you can do on a computer can be done through Upwork. Freelancers in our marketplace can tackle a wide range of projects — big or small, one-off or repeat, individual or team-based. Whether you need a content writer for an SEO-friendly blog post, or your own 24/7 software development team to build a mobile app or create a web portal, you’ll find talent on Upwork ready to support your business.
							</div>
						</div>
						<div class="pad25 brdb">
							<a href="#" class="toggle-btn dblock uppercase bold dark_grey_txt" data-toggle-id="question_2">
							<span class="sprite-image arrow-bottom fright"></span>
							<span class="sprite-image arrow-up fright"></span>
							HOW DO I FIND THE RIGHT FREELANCER?
							</a>
							<div class="hide padt20" id="question_2">
								<p><strong>How do I know my freelancer is going to get the job done?</strong> It’s easy. First think about the skills you need, then describe your job and post it. Next wait for freelancers to submit their best proposals for your review. You can also invite freelancers to submit proposals from potential matches we highlight, or search our entire freelance community for that perfect fit.</p>
								<p><strong>Does Upwork screen freelancers?</strong> At Upwork we strive to provide a fair and trusted marketplace. This includes working diligently to verify that freelancers are representing themselves correctly. We begin by authenticating the email address of registered users. We then provide many forms of screening for clients to use, from online tests (where freelancers can demonstrate their expertise) to our Job Success score. Ultimately however, it is your responsibility to do the final screening to help ensure that the freelancer is a great match for you and your project. We do have features in place to help facilitate the screening process, from Upwork Messages for real-time communication with freelancers to custom screening questions to assist you in identifying the best matches.</p>
								<p class="pad0"><strong>What is the Top Rated Program?</strong> Our Top Rated Program is designed to showcase talent who consistently deliver at the top level of their field. Freelancers who achieve this level display a Top Rated badge on their Upwork profile, representing great work, excellent relationships with clients, and other critical factors in creating successful projects.</p>
							</div>
						</div>
						<div class="pad25 brdb">
							<a href="#" class="toggle-btn dblock uppercase bold dark_grey_txt" data-toggle-id="question_3">
							<span class="sprite-image arrow-bottom fright"></span>
							<span class="sprite-image arrow-up fright"></span>
							AM I SAFE WORKING HERE?
							</a>
							<div class="hide padt20" id="question_3">
								<p><strong>How do I know my freelancer is actually working on my project?</strong> Upwork has several processes in place to enable you to confirm work completed on your projects. On hourly contracts, this includes the Work Diary. It’s a visual billable time system that records work completed. It also takes screenshots of the freelancer’s screen six times per hour to verify work, as well as counting keystrokes during sessions. We also include Upwork Messages which allows for simple, real-time communication with your freelancer.</p>
								<p><strong>What if I’m not happy with the results?</strong> Most projects on Upwork get completed on-time and as expected. If there’s a disagreement between you and your freelancer, we’ll provide free dispute assistance and, if needed, connect you with arbitration.</p>
								<p><strong>How can I ensure that my IP is safe?</strong> The Service Contract terms in our User Agreement set forth confidentiality obligations and your right to ownership of intellectual property. You can also add additional terms to your job, and you can have your freelancer sign an additional Non-Disclosure Agreement if needed.</p>
								<p class="pad0"><strong>Who owns the legal rights to work product developed by a freelancer engaged on Upwork?</strong> Once a freelancer receives payment for work completed on a project, our Terms of Service specify that ownership of that work transfers to the client. If desired, freelancers and clients may also agree on different or additional terms regarding work product ownership. For details, see Section 8.6 of our <a href="#">User Agreement.</a></p>
							</div>
						</div>
						<div class="pad25 brdb">
							<a href="#" class="toggle-btn dblock uppercase bold dark_grey_txt" data-toggle-id="question_4">
							<span class="sprite-image arrow-bottom fright"></span>
							<span class="sprite-image arrow-up fright"></span>
							HOW DO PAYMENTS WORK?
							</a>
							<div class="hide padt20" id="question_4">
								<p><strong>How does Upwork make money?</strong> Upwork charges freelancers a 20%, 10%, or 5% service fee depending on the total amount they’ve billed with a client. We also offer freelancers optional premium memberships and subscription services.</p>
								<p><strong>How often will I be charged?</strong> How are payments and invoices handled? When/where do I provide my CC info? You have two options for working with your freelancer: hourly or fixed-price. With hourly projects, you must have a payment method on file before your freelancer begins work. Using our automated billing system, your freelancer will bill you each week. Once you review and approve each weekly invoice (you have one week to do so), Upwork charges your payment method and releases funds to your freelancer through our escrow service. Or, with fixed-price projects, you have the option of dividing a large project into agreed-upon milestones. Before each milestone begins, you must fund escrow for that portion of the project with a payment method on file. Once a milestone is completed by the freelancer, and you review and approve the work, your funds are released to your freelancer from escrow. For additional information, see our Terms of Service, including the hourly escrow instructions and the fixed-price escrow instructions.</p>
								<p><strong>What methods of payment do you accept and what do they cost?</strong> You can pay using MasterCard, Visa, American Express, or PayPal. Any payments are subject to a 2.75% processing fee.</p>
								<p class="pad0"><strong>How do I work with and pay freelancers?</strong> Beginning with the hiring process and through project completion, Upwork makes it easy to communicate with and pay your freelancers online. This includes Upwork Messages, which allows for real-time sharing and collaboration. You make payments to your freelancer through our escrow service, using a credit card or PayPal.</p>
							</div>
						</div>
						<div class="pad25 brdb">
							<a href="#" class="toggle-btn dblock uppercase bold dark_grey_txt" data-toggle-id="question_5">
							<span class="sprite-image arrow-bottom fright"></span>
							<span class="sprite-image arrow-up fright"></span>
							HOW DO I GET STARTED?
							</a>
							<div class="hide padt20" id="question_5">
								<p><strong>What should I do after I register?</strong> Once you sign up as a client, it's time to define your project. Outline your goals, deliverables, the skills you're looking for, and your desired deadline. By thinking through and articulating your needs, you make it easier to write an effective job post and explain your project to others. Now that you know what you need, post a job. We’ll instantly match you with promising freelancers, but you can also search the entire marketplace for freelancers and invite qualified experts to submit proposals.</p>
								<p><strong>How do I hire on Upwork? What do I look for in a freelancer?</strong> First think about the work and skills you need, then describe your job and post it. Freelancers will soon submit their best proposals for your review. You can also invite freelancers to submit proposals from a list of potential matches we highlight, or search our entire freelance community for that perfect fit. Next, evaluate freelancers by reviewing their Upwork profile – which can include work experience and samples, client feedback, test scores and much more. You may also want to look for freelancers in our Top Rated Program. Then, have a quick interview with your top candidates to answer specific questions. To enlist a freelancer’s services, simply click the “Hire” button to get started.</p>
								<p><strong>How do I make my project a success?</strong> Start by writing a clear and concise job post. When evaluating candidates, focus on freelancers with proven work on similar projects (we'll match you with a short list of freelancers likely to succeed). Once you’ve selected your freelancer, communicate clearly about your needs.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- FAQ (2 columns) -->
		<div class="column_m padtb30 tall lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<h2 class="talc fsz34 lgn_hight_s12 padb30">Top 5 Questions We Hear Customers Ask</h2>
					<div>
						<div class="tw_clmn padr20">
							<div class="pad25 brdb brdt">
								<a href="#" class="toggle-btn dblock uppercase bold dark_grey_txt" data-toggle-id="question_11">
								<span class="sprite-image arrow-bottom fright"></span>
								<span class="sprite-image arrow-up fright"></span>
								What projects can i do on Upwork?
								</a>
								<div class="hide padt20" id="question_11">
									<strong>What kind of work can I get done?</strong> Anything you can do on a computer can be done through Upwork. Freelancers in our marketplace can tackle a wide range of projects — big or small, one-off or repeat, individual or team-based. Whether you need a content writer for an SEO-friendly blog post, or your own 24/7 software development team to build a mobile app or create a web portal, you’ll find talent on Upwork ready to support your business.
								</div>
							</div>
							<div class="pad25 brdb">
								<a href="#" class="toggle-btn dblock uppercase bold dark_grey_txt" data-toggle-id="question_12">
								<span class="sprite-image arrow-bottom fright"></span>
								<span class="sprite-image arrow-up fright"></span>
								HOW DO I FIND THE RIGHT FREELANCER?
								</a>
								<div class="hide padt20" id="question_12">
									<p><strong>How do I know my freelancer is going to get the job done?</strong> It’s easy. First think about the skills you need, then describe your job and post it. Next wait for freelancers to submit their best proposals for your review. You can also invite freelancers to submit proposals from potential matches we highlight, or search our entire freelance community for that perfect fit.</p>
									<p><strong>Does Upwork screen freelancers?</strong> At Upwork we strive to provide a fair and trusted marketplace. This includes working diligently to verify that freelancers are representing themselves correctly. We begin by authenticating the email address of registered users. We then provide many forms of screening for clients to use, from online tests (where freelancers can demonstrate their expertise) to our Job Success score. Ultimately however, it is your responsibility to do the final screening to help ensure that the freelancer is a great match for you and your project. We do have features in place to help facilitate the screening process, from Upwork Messages for real-time communication with freelancers to custom screening questions to assist you in identifying the best matches.</p>
									<p class="pad0"><strong>What is the Top Rated Program?</strong> Our Top Rated Program is designed to showcase talent who consistently deliver at the top level of their field. Freelancers who achieve this level display a Top Rated badge on their Upwork profile, representing great work, excellent relationships with clients, and other critical factors in creating successful projects.</p>
								</div>
							</div>
							<div class="pad25 brdb">
								<a href="#" class="toggle-btn dblock uppercase bold dark_grey_txt" data-toggle-id="question_13">
								<span class="sprite-image arrow-bottom fright"></span>
								<span class="sprite-image arrow-up fright"></span>
								AM I SAFE WORKING HERE?
								</a>
								<div class="hide padt20" id="question_13">
									<p><strong>How do I know my freelancer is actually working on my project?</strong> Upwork has several processes in place to enable you to confirm work completed on your projects. On hourly contracts, this includes the Work Diary. It’s a visual billable time system that records work completed. It also takes screenshots of the freelancer’s screen six times per hour to verify work, as well as counting keystrokes during sessions. We also include Upwork Messages which allows for simple, real-time communication with your freelancer.</p>
									<p><strong>What if I’m not happy with the results?</strong> Most projects on Upwork get completed on-time and as expected. If there’s a disagreement between you and your freelancer, we’ll provide free dispute assistance and, if needed, connect you with arbitration.</p>
									<p><strong>How can I ensure that my IP is safe?</strong> The Service Contract terms in our User Agreement set forth confidentiality obligations and your right to ownership of intellectual property. You can also add additional terms to your job, and you can have your freelancer sign an additional Non-Disclosure Agreement if needed.</p>
									<p class="pad0"><strong>Who owns the legal rights to work product developed by a freelancer engaged on Upwork?</strong> Once a freelancer receives payment for work completed on a project, our Terms of Service specify that ownership of that work transfers to the client. If desired, freelancers and clients may also agree on different or additional terms regarding work product ownership. For details, see Section 8.6 of our <a href="#">User Agreement.</a></p>
								</div>
							</div>
						</div>
						<div class="tw_clmn padl20">
							<div class="pad25 brdb brdt">
								<a href="#" class="toggle-btn dblock uppercase bold dark_grey_txt" data-toggle-id="question_21">
								<span class="sprite-image arrow-bottom fright"></span>
								<span class="sprite-image arrow-up fright"></span>
								HOW DO PAYMENTS WORK?
								</a>
								<div class="hide padt20" id="question_21">
									<p><strong>How does Upwork make money?</strong> Upwork charges freelancers a 20%, 10%, or 5% service fee depending on the total amount they’ve billed with a client. We also offer freelancers optional premium memberships and subscription services.</p>
									<p><strong>How often will I be charged?</strong> How are payments and invoices handled? When/where do I provide my CC info? You have two options for working with your freelancer: hourly or fixed-price. With hourly projects, you must have a payment method on file before your freelancer begins work. Using our automated billing system, your freelancer will bill you each week. Once you review and approve each weekly invoice (you have one week to do so), Upwork charges your payment method and releases funds to your freelancer through our escrow service. Or, with fixed-price projects, you have the option of dividing a large project into agreed-upon milestones. Before each milestone begins, you must fund escrow for that portion of the project with a payment method on file. Once a milestone is completed by the freelancer, and you review and approve the work, your funds are released to your freelancer from escrow. For additional information, see our Terms of Service, including the hourly escrow instructions and the fixed-price escrow instructions.</p>
									<p><strong>What methods of payment do you accept and what do they cost?</strong> You can pay using MasterCard, Visa, American Express, or PayPal. Any payments are subject to a 2.75% processing fee.</p>
									<p class="pad0"><strong>How do I work with and pay freelancers?</strong> Beginning with the hiring process and through project completion, Upwork makes it easy to communicate with and pay your freelancers online. This includes Upwork Messages, which allows for real-time sharing and collaboration. You make payments to your freelancer through our escrow service, using a credit card or PayPal.</p>
								</div>
							</div>
							<div class="pad25 brdb">
								<a href="#" class="toggle-btn dblock uppercase bold dark_grey_txt" data-toggle-id="question_22">
								<span class="sprite-image arrow-bottom fright"></span>
								<span class="sprite-image arrow-up fright"></span>
								HOW DO I GET STARTED?
								</a>
								<div class="hide padt20" id="question_22">
									<p><strong>What should I do after I register?</strong> Once you sign up as a client, it's time to define your project. Outline your goals, deliverables, the skills you're looking for, and your desired deadline. By thinking through and articulating your needs, you make it easier to write an effective job post and explain your project to others. Now that you know what you need, post a job. We’ll instantly match you with promising freelancers, but you can also search the entire marketplace for freelancers and invite qualified experts to submit proposals.</p>
									<p><strong>How do I hire on Upwork? What do I look for in a freelancer?</strong> First think about the work and skills you need, then describe your job and post it. Freelancers will soon submit their best proposals for your review. You can also invite freelancers to submit proposals from a list of potential matches we highlight, or search our entire freelance community for that perfect fit. Next, evaluate freelancers by reviewing their Upwork profile – which can include work experience and samples, client feedback, test scores and much more. You may also want to look for freelancers in our Top Rated Program. Then, have a quick interview with your top candidates to answer specific questions. To enlist a freelancer’s services, simply click the “Hire” button to get started.</p>
									<p><strong>How do I make my project a success?</strong> Start by writing a clear and concise job post. When evaluating candidates, focus on freelancers with proven work on similar projects (we'll match you with a short list of freelancers likely to succeed). Once you’ve selected your freelancer, communicate clearly about your needs.</p>
								</div>
							</div>
							<div class="pad25 brdb">
								<a href="#" class="toggle-btn dblock uppercase bold dark_grey_txt" data-toggle-id="question_23">
								<span class="sprite-image arrow-bottom fright"></span>
								<span class="sprite-image arrow-up fright"></span>
								What projects can i do on Upwork?
								</a>
								<div class="hide padt20" id="question_23">
									<strong>What kind of work can I get done?</strong> Anything you can do on a computer can be done through Upwork. Freelancers in our marketplace can tackle a wide range of projects — big or small, one-off or repeat, individual or team-based. Whether you need a content writer for an SEO-friendly blog post, or your own 24/7 software development team to build a mobile app or create a web portal, you’ll find talent on Upwork ready to support your business.
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Real time -->
		<div class="column_m padtb30 talc lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<h2 class="marrl30 padrbl30 talc fsz34 lgn_hight_s12">Real-Time. Real-World.</h2>
					<p class="marrl30 padrbl30">Zoho CRM’s Opportunity Tracking tool gives you a current, comprehensive view of all your sales activities. Know where every customer is in the sales cycle, deal size, contact history, even competitor information to help craft more effective messaging. Dynamic Reports & Dashboards provide an easy, accurate read of everything going on. </p>
					<p>
						<img src="<?php echo $path;?>html/usercontent/images/track-sales-zoho-crm.png" />
					</p>
					<div class="container tall padt20">
						<div class="tw_clmn brdl padrl15">
							<h3 class="lgn_hight_s12 bold fsz20">Feeds</h3>
							<img src="<?php echo $path;?>html/usercontent/images/icon-pulse.png" class="fleft marrb20" />
							<p>Gain instant insight on what's happening in your sales pipeline. Use what you learn to refine and improve your sales efforts. </p>
						</div>
						<div class="tw_clmn brdl padrl15">
							<h3 class="lgn_hight_s12 bold fsz20">Forecasting</h3>
							<img src="<?php echo $path;?>html/usercontent/images/icon-forecast.png" class="fleft marrb20" />
							<p> Link deals with forecasting to effectively set sales targets, track progress, and allocate resources to achieve your goals. </p>
						</div>
						<div class="clear"></div>
					</div>
					<div class="padt20">
						<a href="#" class="wi_20 marrl5 dblue_btn">Learn More</a>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Engage -->
		<div class="column_m padtb30 talc lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<h2 class="marrl30 padrbl30 talc fsz34 lgn_hight_s12">Engage. Multiple Channels.</h2>
					<p class="marrl30 padrbl30">
						What’s the latest with your prospects and customers?<br/>
						Let them tell you. Link their Facebook and Twitter profiles into your Zoho CRM system. Associate profiles to contacts or leads, send invitations to connect, view updates and share your comments.
					</p>
					<p>
						<img src="<?php echo $path;?>html/usercontent/images/social-crm.png" />
					</p>
					<div class="container tall padt20">
						<div class="thr_clmn brdl padrl15">
							<h3 class="lgn_hight_s12 bold fsz20">Email</h3>
							<img src="<?php echo $path;?>html/usercontent/images/icon-email.png" class="fleft marrb20" />
							<p>Reduce email clutter and focus only on what matters; Keep customers emails inside CRM. </p>
						</div>
						<div class="thr_clmn brdl padrl15">
							<h3 class="lgn_hight_s12 bold fsz20">Phone Calls</h3>
							<img src="<?php echo $path;?>html/usercontent/images/icon-phone.png" class="fleft marrb20" />
							<p>Make phone calls within CRM and instantly track prospect details, call duration, etc. </p>
						</div>
						<div class="thr_clmn brdl padrl15">
							<h3 class="lgn_hight_s12 bold fsz20">Live Chat</h3>
							<img src="<?php echo $path;?>html/usercontent/images/icon-live-chat.png" class="fleft marrb20" />
							<p>Chat with your website visitors proactively and convert them to potential customers. </p>
						</div>
						<div class="clear"></div>
					</div>
					<div class="padt20">
						<a href="#" class="wi_20 marrl5 dblue_btn">Learn More</a>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Know now -->
		<div class="column_m padtb30 lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<div class="tw_clmn padr30">
						<h2 class="tall fsz34 lgn_hight_s12 padb30">Know. Now.</h2>
						<p>Be in the know when on a call. Use Zoho CRM’s Business Card View to instantly get a detailed look at all pertinent customer information. No scrolling, no searching. The Notes Section also displays the time and content of past conversations, so you can make each call more personal and productive. </p>
						<a href="#" class="marrl5 dblue_btn">Learn More</a>
					</div>
					<div class="tw_clmn">
						<img src="<?php echo $path;?>html/usercontent/images/productive-zoho-crm.png">
					</div>
					<div class="clear"></div>
					<div class="container tall padt20">
						<div class="thr_clmn brdl padrl15">
							<h3 class="lgn_hight_s12 bold fsz20">Plug-in for Microsoft Outlook</h3>
							<img src="<?php echo $path;?>html/usercontent/images/icon-plug.png" class="fleft marrb20" />
							<p>Sync contacts, email, tasks, and calendar between Zoho CRM and Microsoft Outlook.</p>
						</div>
						<div class="thr_clmn brdl padrl15">
							<h3 class="lgn_hight_s12 bold fsz20">Mail Merge</h3>
							<img src="<?php echo $path;?>html/usercontent/images/icon-mail-merge.png" class="fleft marrb20" />
							<p>Instantly create bulk Mail Merge documents - in either customized or standard templates. </p>
						</div>
						<div class="thr_clmn brdl padrl15">
							<h3 class="lgn_hight_s12 bold fsz20">Document Library</h3>
							<img src="<?php echo $path;?>html/usercontent/images/icon-document-library.png" class="fleft marrb20" />
							<p>Organize &amp; share the latest marketing collateral with salespeople. </p>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="pointer-divider marb30"></div>
		
		<!-- Testimonials -->
		<div class="column_m padtb30 talc lgn_hight_22 fsz16">
			<div class="wrap">
				<div class="container">
					<h2 class="talc fsz34 lgn_hight_s12 padb30">Så tycker våra egenanställda</h2>
					<div class="start-testimonials">
						<div class="start-testimonials_wrap">
							<div class="testimonial-background-wrapper">
								<div class="background-image" style="background-image: url(<?php echo $path;?>html/usercontent/images/uploads/2016/04/ff_matsj.jpg);"></div>
								<div class="background-image" style="background-image: url(<?php echo $path;?>html/usercontent/images/uploads/2016/04/ff_mats-2.jpg);"></div>
								<div class="background-image" style="background-image: url(<?php echo $path;?>html/usercontent/images/uploads/2016/03/camilla.jpg);"></div>
								<div class="background-image" style="background-image: url(<?php echo $path;?>html/usercontent/images/uploads/2016/04/ff_lisaa-3.jpg);"></div>
							</div>
							<div class="container light_grey_bg">
								<div class="tw_clmn marpl50 pad30 pointer-divider left-pointer testimonial-slider">
									<div>
										<div class="sprite-image quote marb20"></div>
										<p class="padb30">
											Att man får lön efter 5 dagar är något jag uppskattar väldigt mycket. Och att alltid få bra hjälp av klientstöd känns proffsigt.
											<br/>
											<strong class="dark_grey_txt">-Mats Jungmyren, Fotograf</strong>
										</p>
										<div>
											<a href="#" class="pointer-link blue">Läs mer om våra egenanställda</a>
											<br/>
										</div>
									</div>
									<div>
										<div class="sprite-image quote marb20"></div>
										<p class="padb30">
											Det är så enkelt. Det funkar bra och jag slipper att hålla på med papper och sånt.
											<br/>
											<strong class="dark_grey_txt">-Mats Westerberg, Hantverkare</strong>
										</p>
										<div>
											<a href="#" class="pointer-link blue">Läs mer om våra egenanställda</a>
											<br/>
										</div>
									</div>
									<div>
										<div class="sprite-image quote marb20"></div>
										<p class="padb30">
											Ni är hjälpsamma och snabba på att återkoppla. Jag blir faktiskt imponerad ibland.
											<br/>
											<strong class="dark_grey_txt">-Camilla Hällbrink, Konservator</strong>
										</p>
										<div>
											<a href="#" class="pointer-link blue">Läs mer om våra egenanställda</a>
											<br/>
										</div>
									</div>
									<div>
										<div class="sprite-image quote marb20"></div>
										<p class="padb30">
											Det är så enkelt. Det gör att jag kan lägga energi på det jag är bäst på. Att jobba praktiskt!
											<br/>
											<strong class="dark_grey_txt">-Lisa Anckarman, Bloggentreprenör</strong>
										</p>
										<div>
											<a href="#" class="pointer-link blue">Läs mer om våra egenanställda</a>
											<br/>
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		
		<!-- FOOTER -->
		<div class="column_m padt30">
			<div class="column_m footermain">
				<div class="wrap">
					<div class="column_m padt30">
						<div class="for_clmn">
							<h2 class="fsz26 cyanblue_txt bold font_opnsns">QMatchup</h2>
							<p class="lgn_hight_18">Qmatchup helps clients proqure prequalified outsourcing services. With our global network of pre qualified contractors we have helped thousands of clients get exactly what they whant, when they whant it. </p>
						</div>
						<div class="for_clmn">
							<div class="marrl30 padrl30 blue_left_brd talc">
								<div class="center_bx footer_green_ico icon1 marb10"> </div>
								<h2 class="darkblue_txt font_arial">Know more!</h2>
								<ul class="footer_link_list">
									<li class="first"><a href="#">About</a>
									</li>
									<li><a href="#">How it works</a>
									</li>
									<li class="third"><a href="#">Additionals</a>
									</li>
									<li class="fourth last"><a href="#">Blog</a>
									</li>
								</ul>
								<div class="clear"></div>
							</div>
						</div>
						<div class="for_clmn talc">
							<div class="padrl30 blue_left_brd blue_right_brd talc">
								<div class="center_bx footer_green_ico icon2 marb10"> </div>
								<h2 class="darkblue_txt font_arial">Need Help!</h2>
								<ul class="footer_link_list">
									<li class="first">Call us at : 1 888 341</li>
									<li>Email : <a href="mailto:support@qmatchup.com">support@qmatchup.com</a>
									</li>
									<li class="third"><a href="#">Helpcenter</a>
									</li>
									<li class="fourth last"><a href="#">FAQ</a>
									</li>
								</ul>
								<div class="clear"></div>
							</div>
						</div>
						<div class="for_clmn talc">
							<div class="padl30">
								<div class="center_bx footer_green_ico icon3 marb10"> </div>
								<h2 class="darkblue_txt font_arial">Stay in touch</h2>
								<p>Get monthly updates from Qmatchup in your inbox. Read our latest news &amp; buzz.</p>
								<ul class="social_hori_color_list">
									<li class="first">
										<a href="#" class="fb"></a>
									</li>
									<li>
										<a href="#" class="tw"></a>
									</li>
									<li class="third">
										<a href="#" class="sk"></a>
									</li>
									<li class="last fourth">
										<a href="#" class="rs"></a>
									</li>
								</ul>
								<div class="wi_70 center_bx padt10"> <a href="#" class="green_btn dblock min_height">Subscribe Newsletter</a> </div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
						<div class="column_m grey_ico_bx padt20">
							<div class="for_clmn">
								<h2 class="darkblue_txt fsz16 padb5">Q Outsourcing </h2>
								<div class="grey_icon icon1"></div>
								<p> We care a lot about how people communicate. </p>
							</div>
							<div class="for_clmn">
								<h2 class="darkblue_txt fsz16 padb5">Q Purchase</h2>
								<div class="grey_icon icon2"></div>
								<p>Has helped over 29342 companies with their projects.</p>
							</div>
							<div class="for_clmn">
								<h2 class="darkblue_txt fsz16 padb5">Q Hire</h2>
								<div class="grey_icon icon3"></div>
								<p>Industry specialists project faciliators supervices.</p>
							</div>
							<div class="for_clmn">
								<h2 class="darkblue_txt fsz16 padb5">Q Staffing</h2>
								<div class="grey_icon icon4"></div>
								<p>Continiously expanding and updates our tools.</p>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="dark_footer column_m">
				<div class="wrap">
					<div class="column_m padt15">
						<div class="left_sidebar">
							<h2 class="fsz30 pad0 font_opnsns">QMATCHUP</h2>
						</div>
						<div class="right_container">
							<ul class="footer_nav_list">
								<li class="first"><a href="#">About us</a>
								</li>
								<li><a href="#">Blog</a>
								</li>
								<li class="third"><a href="#">News</a>
								</li>
								<li class="fourth"><a href="#">Contact</a>
								</li>
								<li class="fifth last"><a href="#">Sitemap</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="column_m padtb10">© 1998 – 2014 QMatchup, Inc. All rights reserved.</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.bxslider.min.js"></script>
		<script type="text/javascript" src="../../modules.js"></script><script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/index.js"></script>
		<script>
			$(document).ready(function() {
				$('.bxslider').bxSlider({
					auto: false,
					pager: true,
				});
			});
		</script>
	</body>
</html>