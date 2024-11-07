<!doctype html>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<title>Qmatchup</title>
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modules.css" />
		<link rel="stylesheet" href="https://codepen.io/daviddarnes/pen/VLXxMa" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/workplacestart/js/vendor.js"></script>
		
		
	</head>
	
	<body class="white_bg">
		
		<!-- HEADER -->
		<div class="column_m header header_small bs_bb white_bg" >
		<div class="wi_100 hei_40p xs-pos_fix padtb5 padrl10 white_bg brdb" >
			<div class="visible-xs visible-sm fleft">
				<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
			</div>
			<div class="logo hidden-xs hidden-sm marr15">
					<a href="#"><h3 class="marb0 pad0 fsz22 black_txt " style="font-family: 'Audiowide', sans-serif;">Qloudid</h3></a>
				</div>
			<div class="hidden-xs hidden-sm fleft padl10 padr30">
				<div class="languages">
					<a href="#" id="language_selector" class="padrl10"><img src="<?php echo $path;?>html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US" /></a>
					<ul class="wi_100 mar0 pad5 blue_bg">
						<li class="dblock">
							<a href="#" class="pad5" data-lang="eng"><img src="<?php echo $path; ?>html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US" />
							</a>
						</li>
						<li class="dblock">
							<a href="#" class="pad5" data-lang="swd"><img src="<?php echo $path; ?>html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="Sweden" alt="Sweden" />
							</a>
						</li>
					</ul>
				</div>
			</div>
			
			<div class="fright xs-dnone sm-dnone">
				<ul class="mar0 pad0">
					<li class="dblock hidden-xs hidden-sm fright pos_rel  brdclr_dblue"> <a href="https://safeqloud-228cbc38a2be.herokuapp.com/user/index.php/LoginAccount" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg uppercase lgn_hight_30 white_txt white_txt_h" data-en="Logga In" data-sw="Logga In">Logga IN</a> </li>
				</ul>
			</div>
			<div class="top_menu top_menu_custom mart2">
				<ul class="menulist">
					<li class="xs-mar0i sm-mar0i">
						<a href="#" class="class-toggler" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"> <span class="fa fa-qrcode white_txt fsz20"></span> </a>
						<ul class="dblocki_a" id="menulist-dropdown">
							<li>
								<div class="top_arrow"></div>
							</li>
							<li>
								<!-- MAIN -->
								<div class="tab-content application_menu pad20" id="tab-main">
									<ol class="tab-header">
										<li>
											<a href="#" data-id="tab-per" class="business_prof">
												<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Personal</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus" class="swedBank">
												<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Business</a>
										</li>
									</ol>
									<div class="clear"></div>
								</div>
								<!-- PERSONAL -->
								<div class="tab-content application_menu pad20" id="tab-per">
									<ol>
										<li>
											<a href="#" class="business_prof">
												<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-1.png" width="45" height="45" title="" alt="" />
												</div>Cloud ID</a>
										</li>
										<li>
											<a href="#" class="swedBank">
												<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-2.png" width="45" height="45" title="" alt="" />
												</div>Verify</a>
										</li>
										<li>
											<a href="#" class="posted_jobs">
												<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-3.png" width="45" height="45" title="" alt="" />
												</div>Activate</a>
										</li>
									</ol>
									<div class="padb20">
										<div class="line"></div>
									</div>
									<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-main"><span></span> Back to Business</a> </div>
									<div class="clear"></div>
								</div>
								<!-- BUSINESS -->
								<div class="tab-content application_menu pad20" id="tab-bus">
									<ol class="tab-header">
										<li>
											<a href="#" data-id="tab-bus-cld" class="business_prof">
												<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Cloud ID</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus-vrf" class="swedBank">
												<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Verify</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus-act" class="posted_jobs">
												<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Activate</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus-eng" class="proposals">
												<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Engage </a>
										</li>
									</ol>
									<div class="padb20">
										<div class="line"></div>
									</div>
									<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-main"><span></span> Back to Qmatchup</a> </div>
									<div class="clear"></div>
								</div>
								<!-- Cloud ID -->
								<div class="tab-content application_menu pad20" id="tab-bus-cld">
									<ol>
										<li>
											<a href="#" class="business_prof">
												<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-4.png" width="45" height="45" title="" alt="" />
												</div>Business</a>
										</li>
										<li>
											<a href="#" class="swedBank">
												<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-5.png" width="45" height="45" title="" alt="" />
												</div>Employees</a>
										</li>
									</ol>
									<div class="padb20">
										<div class="line"></div>
									</div>
									<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-bus"><span></span> Back to Business</a> </div>
									<div class="clear"></div>
								</div>
								<!-- Verify -->
								<div class="tab-content application_menu pad20" id="tab-bus-vrf">
									<ol>
										<li>
											<a href="#" class="business_prof">
												<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-6.png" width="45" height="45" title="" alt="" />
												</div>Basic - Free</a>
										</li>
										<li>
											<a href="#" class="swedBank">
												<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-7.png" width="45" height="45" title="" alt="" />
												</div>Full - Paid</a>
										</li>
									</ol>
									<div class="padb20">
										<div class="line"></div>
									</div>
									<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-bus"><span></span> Back to Business</a> </div>
									<div class="clear"></div>
								</div>
								<!-- Activate -->
								<div class="tab-content application_menu pad20" id="tab-bus-act">
									<ol class="tab-header">
										<li>
											<a href="#" data-id="tab-bus-act-org" class="business_prof">
												<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>By organization</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus-act-ind" class="swedBank">
												<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>By industry</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus-act-top" class="posted_jobs">
												<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>By topic</a>
										</li>
									</ol>
									<div class="padb20">
										<div class="line"></div>
									</div>
									<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-bus"><span></span> Back to Business</a> </div>
									<div class="clear"></div>
								</div>
								<!-- - by organization -->
								<div class="tab-content application_menu pad20 active" id="tab-bus-act-org" style="display: block;">
									<ol>
										<li>
											<a href="#" class="business_prof">
												<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-8.png" width="45" height="45" title="" alt="" />
												</div>HR Portal</a>
										</li>
										<li>
											<a href="#" class="swedBank">
												<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-9.png" width="45" height="45" title="" alt="" />
												</div>Sales</a>
										</li>
										<li>
											<a href="#" class="posted_jobs">
												<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-10.png" width="45" height="45" title="" alt="" />
												</div>Marketing</a>
										</li>
									</ol>
									<div class="padb20">
										<div class="line"></div>
									</div>
									<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-bus-act"><span></span> Back to Activate</a> </div>
									<div class="clear"></div>
								</div>
								<!-- - by industry -->
								<div class="tab-content application_menu pad20" id="tab-bus-act-ind">
									<ol>
										<li>
											<a href="#" class="business_prof">
												<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-11.png" width="45" height="45" title="" alt="" />
												</div>Telemarketing</a>
										</li>
										<li>
											<a href="#" class="swedBank">
												<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-1.png" width="45" height="45" title="" alt="" />
												</div>Lawyers</a>
										</li>
									</ol>
									<div class="padb20">
										<div class="line"></div>
									</div>
									<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-bus-act"><span></span> Back to Activate</a> </div>
									<div class="clear"></div>
								</div>
								<!-- - by topic -->
								<div class="tab-content application_menu pad20" id="tab-bus-act-top">
									<ol>
										<li>
											<a href="#" class="business_prof">
												<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-2.png" width="45" height="45" title="" alt="" />
												</div>Miljöplus</a>
										</li>
									</ol>
									<div class="padb20">
										<div class="line"></div>
									</div>
									<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-bus-act"><span></span> Back to Activate</a> </div>
									<div class="clear"></div>
								</div>
								<!-- Engage -->
								<div class="tab-content application_menu pad20" id="tab-bus-eng">
									<ol>
										<li>
											<a href="#" class="business_prof">
												<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Employees</a>
										</li>
										<li>
											<a href="#" class="swedBank">
												<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Customers</a>
										</li>
										<li>
											<a href="#" class="posted_jobs">
												<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Suppliers</a>
										</li>
									</ol>
									<div class="padb20">
										<div class="line"></div>
									</div>
									<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-bus"><span></span> Back to Business</a> </div>
									<div class="clear"></div>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="QmatchupBizSubscription" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 white_txt">Erbjudande</a> </div>
			<div class="clear"></div>
		</div>
	</div><div class="clear"></div>
	
	<div class="clear"></div>
		
		<div class="column_m pos_rel">
			
			<div class="column_m container zi1 padt20 padb10" >
				<div class="wrap maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb20 brdb_b">
					<div class="white_bg tall">
						<div class="padb0 fsz20">
							
							
							
							
							
							
						</div>
						<!-- Logo -->
					<div class="marb10 padr10"> <a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 bold">Appstore </span></a> </div>
					
					<div class="padr10 fsz25"> <span>Inköpsprogrammet är en digital tjänst för dina inköp</span> </div>
				</div>
				<div class="hidden-xs hidden-sm padrl10">
					<a href="#" class="diblock padrl20 brdrad3 lgtgrey_bg ws_now lgn_hight_29 fsz14 black_txt">
						<img src="<?php echo $path;?>html/usercontent/images/icons/gift.png" width="20" height="20" class="marr5 valm" />
						<span class="valm">010-15 10 125</span>
					</a>
				</div> 
				
			</div>
		</div>
		<div class="clear"></div>
		
		
		
		
		
		<!-- CONTENT -->
		<div class="column_m container zi5  mart20 xs-mart20">
			<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
				
				
				<!-- Center content -->
				<div class="wi_640p col-xs-12 col-sm-12 fleft pos_rel zi5  fsz14 brdr_new padr20">
					
					
					<div class="column_m marb0 xs-padtb10 talc lgn_hight_22 fsz16 brdb_new">
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
										<img src="<?php echo $path;?>html/usercontent/images/2.png" class="wi_100 hei_200p dblock marb10">
										<h3 class="lgn_hight_s12 bold fsz20 padt10"> FAQ Nätverket</h3>
										
									</div>
									<div class="wi_50 sm-wi_50 xs-wi_100 maxwi_400p flex_1 pad15 sm-nobrdr xs-nobrdr brdb_new">
										<img src="<?php echo $path;?>html/usercontent/images/5.png" class="wi_100 hei_200p dblock marb10 padrl20">
										<h3 class="lgn_hight_s12 bold fsz20 padt10">Trendwatch</h3>
										
										
									</div>
									<div class="wi_50 sm-wi_50 xs-wi_100 maxwi_400p flex_1 pad15   xs-nobrdr  brdr_new">
										<img src="<?php echo $path;?>html/usercontent/images/4.png" class="wi_90 hei_200p dblock marb10 padl25">
										<a href="#"><h3 class="lgn_hight_s12 bold fsz20 padt10">Appar &amp; Mallar</h3></a>
										
									</div>
									<div class="wi_50 sm-wi_50 xs-wi_100 maxwi_400p flex_1 pad15 sm-nobrdr xs-nobrdr  ">
										<img src="<?php echo $path;?>html/usercontent/images/3.png" class="wi_100 hei_200p dblock marb10 mart5">
										<a href="#"><h3 class="lgn_hight_s12 bold fsz20 padt10">Smarta Inköp</h3></a>
										
									</div>
									<!--<div class="wi_50 sm-wi_50 xs-wi_100 maxwi_400p flex_1 pad15 brdr  xs-nobrdr ">
										<img src="<?php echo $path;?>html/usercontent/images/workplace/5.png" class="wi_100 hei_auto dblock marb10">
										<h3 class="lgn_hight_s12 bold fsz20 padt10">Karriärsdrag</h3>
										<p>Här listas karriärmöjligheter som efterfrågas av övriga medlemmar. Typiska kan vara konsultation, styrelsearbete, mentorskap och föreläsning. Många av våra medlemmar utvecklar sitt eget nätverk här. </p>
									</div>
									<div class="wi_50 sm-wi_50 xs-wi_100 maxwi_400p flex_1 pad15   sm-nobrdr xs-nobrdr ">
										<img src="<?php echo $path;?>html/usercontent/images/workplace/6.png" class="wi_100 hei_200p dblock marb10 padrl20">
										<h3 class="lgn_hight_s12 bold fsz20 padt10">Förmåner</h3>
										<p>Med jämna mellanrum tecknar vi fördelaktiga avtal som våra medlemmar får göra avrop på. Rabatterna upp till 90% har förhandlats. Vi tecknar endast avtal med leverantörer som är till intresse för våra medlemmar.</p>
									</div>-->
									
									
								</div>	
								<!--<div class="padt10">
									<a href="#" class="wi_200p maxwi_100 mart20 marrl5 dblue_btn">Så fungerar det att fakturera</a>
									<a href="#" class="wi_200p maxwi_100 mart20 marrl5 dblue_btn">Skapa faktura</a>
								</div>-->
							</div>
						</div>
					</div>
					
					
					<div class="column_m container zi5 padt0 fsz18">
						
						<!-- Section 0 
							<div class="padrl10 bg_ddf0f1 lgn_hight_22 fsz16">
							<div class="wrap maxwi_100 padt30 padb20">
							<div class="dflex xs-fxwrap_w sm-fxwrap_w alit_s marrl-10">
							<div class="wi_52-20p xs-wi_100 sm-wi_100 dflex alit_c marrl10 marb10 pad30 blue_bg white_txt">
							<div>
							<h2 class="padb30 talc bold fsz28 white_txt">Multichannel</h2>
							<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
							<a href="#" class="white_txt">Learn more</a>
							</div>
							</div>
							<div class="wi_48-20p xs-wi_100 sm-wi_100 marrl10">
							<div class="dflex fxwrap_w alit_s marrl-5">
							
							<div class="wi_50-10p minhei_190p dflex fxdir_col alit_c justc_sb marrl5 marb10 pad15 bxsh_0220_01 brd bg_f talc">
							<div class="filler"></div>
							<div class="martb15">
							<img src="<?php echo $path;?>html/usercontent/images/logos/1.png" class="maxwi_10 hei_auto" />
							</div>
							<div class="fsz14">
							<h3 class="mar0 pad0 bold fsz14 txt_00386c">AdLearn Open Platform</h3>
							<div>
							<span class="wi_7p hei_7p diblock marr5 brdrad10 bg_7999b8 valm"></span>
							<span class="valm txt_4b6985">Disabled</span>
							</div>
							</div>
							</div>
							<div class="wi_50-10p minhei_190p dflex fxdir_col alit_c justc_sb marrl5 marb10 pad15 bxsh_0220_01 brd bg_f talc">
							<div class="filler"></div>
							<div class="martb15">
							<img src="<?php echo $path;?>html/usercontent/images/logos/2.png" class="maxwi_10 hei_auto" />
							</div>
							<div class="fsz14">
							<h3 class="mar0 pad0 bold fsz14 txt_00386c">AdRoll</h3>
							<div>
							<span class="wi_7p hei_7p diblock marr5 brdrad10 bg_7999b8 valm"></span>
							<span class="valm txt_4b6985">Disabled</span>
							</div>
							</div>
							</div>
							<div class="wi_50-10p minhei_190p dflex fxdir_col alit_c justc_sb marrl5 marb10 pad15 bxsh_0220_01 brd bg_f talc">
							<div class="filler"></div>
							<div class="martb15">
							<img src="<?php echo $path;?>html/usercontent/images/logos/3.png" class="maxwi_10 hei_auto" />
							</div>
							<div class="fsz14">
							<h3 class="mar0 pad0 bold fsz14 txt_00386c">Amazon S3</h3>
							<div>
							<span class="wi_7p hei_7p diblock marr5 brdrad10 bg_7999b8 valm"></span>
							<span class="valm txt_4b6985">Disabled</span>
							</div>
							</div>
							</div>
							<div class="wi_50-10p minhei_190p dflex fxdir_col alit_c justc_sb marrl5 marb10 pad15 bxsh_0220_01 brd bg_f talc">
							<div class="filler"></div>
							<div class="martb15">
							<img src="<?php echo $path;?>html/usercontent/images/logos/4.png" class="maxwi_10 hei_auto" />
							</div>
							<div class="fsz14">
							<h3 class="mar0 pad0 bold fsz14 txt_00386c">Amplitude</h3>
							<div>
							<span class="wi_7p hei_7p diblock marr5 brdrad10 bg_7999b8 valm"></span>
							<span class="valm txt_4b6985">Disabled</span>
							</div>
							</div>
							</div>
							<div class="wi_50-10p minhei_190p dflex fxdir_col alit_c justc_sb marrl5 marb10 pad15 bxsh_0220_01 brd bg_f talc">
							<div class="filler"></div>
							<div class="martb15">
							<img src="<?php echo $path;?>html/usercontent/images/logos/5.png" class="maxwi_10 hei_auto" />
							</div>
							<div class="fsz14">
							<h3 class="mar0 pad0 bold fsz14 txt_00386c">Attribution</h3>
							<div>
							<span class="wi_7p hei_7p diblock marr5 brdrad10 bg_7999b8 valm"></span>
							<span class="valm txt_4b6985">Disabled</span>
							</div>
							</div>
							</div>
							<div class="wi_50-10p minhei_190p dflex fxdir_col alit_c justc_sb marrl5 marb10 pad15 bxsh_0220_01 brd bg_f talc">
							<div class="filler"></div>
							<div class="martb15">
							<img src="<?php echo $path;?>html/usercontent/images/logos/6.png" class="maxwi_10 hei_auto" />
							</div>
							<div class="fsz14">
							<h3 class="mar0 pad0 bold fsz14 txt_00386c">AutopilotHQ</h3>
							<div>
							<span class="wi_7p hei_7p diblock marr5 brdrad10 bg_7999b8 valm"></span>
							<span class="valm txt_4b6985">Disabled</span>
							</div>
							</div>
							</div>
							
							</div>
							</div>
							</div>
							</div>
							</div>
						-->
						<!-- Section 1 -->
						<div class="xs-padrl10 brdb_new">
							<div class="wrap maxwi_100 padb30">
								<div class="dflex xs-fxwrap_w alit_c">
									<div class="xs-wi_100 flex_1">
										<!--<img src="<?php echo $path;?>html/usercontent/images/workplace/1.png" class="wi_100 hei_auto dblock marb10">-->
										<h2 class=" mart30 marb10 pad0 tall lgn_hight_s12 fsz30 bold">Tryggare och snabbare inköp</h2>
										<div class="wi_50p marb20 brdt_new  brdwi_3"></div>
										<p>På Qmatchup – Inköpsprogrammet, har vi anslutit hundratals kvalificerade rekryteringsbyråer angelägna om att få hjälpa ditt företag med att hitta rätt kandidat. </p>
										
										<p>Processen är övervakad av en expert hos oss och du kan följa hela förloppet på nätet.</p><p>Vi erbjuder kvalificerade leverantörer och konkurrenskraftiga priser genom en leverantörsutgallring som sker helt online. Vi är helt leverantörsoberoende och besluten styrs helt och hållet utav dig. Du granskar rekryteringsbolagens pris, storlek, erfarenhet, inriktning och kollar betyg från dina kollegor.  Resten tar vi hand om.</p>
										
										<h2 class=" martb10 pad0 tall lgn_hight_s12 fsz25">Varför via oss?</h2>
										<div class="wi_50p marb20 brdt_new  brdwi_3"></div>
										<ul class="mar0 pad0 tall">
											<li class="wi_100 dflex marb15 first">
												<strong class="wi_32p diblock brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt">1</strong>
												<div class="flex_1 alself_s padl10">
													<em>Konkurrenskraftiga priser</em>
												</div>
											</li>
											<li class="wi_100 dflex marb15">
												<strong class="wi_32p diblock brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt">2</strong>
												<div class="flex_1 alself_s padl10">
													<em>Allt sker helt online, inga fysiska möten eller papper</em>
												</div>
											</li>
											<li class="wi_100 dflex marb15">
												<strong class="wi_32p diblock brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt">3</strong>
												<div class="flex_1 alself_s padl10">
													<em>100% leverantörsoberoende.</em>
												</div>
											</li>
										</ul>
										
										<div class="mart30">
											<a href="#" class="maxwi_200p minhei_50p dflex justc_c alit_c opa90_h brdrad3 tmgreen_bg talc bold fsz18 xs-fsz16 white_txt trans_all2">Prova Plus för 1 kr!</a>
										</div>
									</div>
									<!--	<div class="wi_250p fxshrink_0 pos_rel martb20 marl15 xs-marl0 pad10 brdrad10 bg_ddf0f1">
										<div class="wi_20p hei_20p pos_abs pos_cenX bot-10p bg_ddf0f1 rotate45"></div>
										<h4 class="fsz20">Exempel på räntor</h4>
										<ul class="mar0 pad0 tall">
										<li class="wi_100 dflex marb15 first">
										<span>&raquo;</span>
										<div class="flex_1 alself_s padl10">
										Finansbolag 7,2%
										</div>
										</li>
										<li class="wi_100 dflex marb15 first">
										<span>&raquo;</span>
										<div class="flex_1 alself_s padl10">
										Entreprenadfirma 7,2%
										</div>
										</li>
										<li class="wi_100 dflex marb15 first">
										<span>&raquo;</span>
										<div class="flex_1 alself_s padl10">
										Restaurang 6,8%
										</div>
										</li>
										<li class="wi_100 dflex marb15 first">
										<span>&raquo;</span>
										<div class="flex_1 alself_s padl10">
										Kosmetikafirma 11,9%
										</div>
										</li>
										<li class="wi_100 dflex marb15 first">
										<span>&raquo;</span>
										<div class="flex_1 alself_s padl10">
										Försäkringsförmedlare 5,7%
										</div>
										</li>
										</ul>
										</div>
										
									-->
								</div>
							</div>
						</div>
						
						<!-- Section 2 -->
						<div class="xs-padrl10 brdb_new">
							<div class="wrap maxwi_100 padtb30">
								<div class="dflex xs-fxwrap_w alit_c">
									<div class="xs-wi_100 flex_1">
										<h2 class=" marb10 pad0 tall lgn_hight_s12 fsz30 bold">Så går det till</h2>
										<div class="wi_50p marb20 brdt_new  brdwi_3"></div>
										
										<div class="wi_100 dflex fxwrap_w marrl-10 talc">
											<div class="wi_25 sm-wi_50 xs-wi_50 xxs-wi_100 marb10 padrl10">
												<img src="<?php echo $path;?>html/usercontent/images/icons/toborrow1.png" height="70" class="dblock martb10 marrla">
												<div class="mart5 marb10">
													<strong class="diblock padrl10 brdrad100 bg_8fccd2 lgn_hight_32 white_txt">1</strong>
												</div>
												<p>Skapa en prisförfråga online.</p>
											</div>
											<div class="wi_25 sm-wi_50 xs-wi_50 xxs-wi_100 marb10 padrl10">
												<img src="<?php echo $path;?>html/usercontent/images/icons/toborrow2.png" height="70" class="dblock martb10 marrla">
												<div class="mart5 marb10">
													<strong class="diblock padrl10 brdrad100 bg_8fccd2 lgn_hight_32 white_txt">2</strong>
												</div>
												<p>Din tilldelade agent granskar förfrågan.</p>
											</div>
											<div class="wi_25 sm-wi_50 xs-wi_50 xxs-wi_100 marb10 padrl10">
												<img src="<?php echo $path;?>html/usercontent/images/icons/toborrow3.png" height="70" class="dblock martb10 marrla">
												<div class="mart5 marb10">
													<strong class="diblock padrl10 brdrad100 bg_8fccd2 lgn_hight_32 white_txt">3</strong>
												</div>
												<p> Leverantörer blir tillfrågade om en offert</p>
											</div>
											<div class="wi_25 sm-wi_50 xs-wi_50 xxs-wi_100 marb10 padrl10">
												<img src="<?php echo $path;?>html/usercontent/images/icons/toborrow4.png" height="70" class="dblock martb10 marrla">
												<div class="mart5 marb10">
													<strong class="diblock padrl10 brdrad100 bg_8fccd2 lgn_hight_32 white_txt">4</strong>
												</div>
												<p>Du får 3-5 offerter att välja emellan.</p>
											</div>
											
										</div>
										
										<div class="">
											<a href="#" class="maxwi_200p minhei_50p dflex justc_c alit_c opa90_h brdrad3 tmgreen_bg talc bold fsz18 xs-fsz16 white_txt trans_all2">Prova Plus för 1 kr!</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<!-- Section 3 -->
						<div class="xs-padrl10 brdb_new">
							<div class="wrap maxwi_100 padtb30">
								<div class="dflex xs-fxwrap_w alit_c">
									<div class="xs-wi_100 flex_1">
										<h2 class=" marb10 pad0 tall lgn_hight_s12 fsz30 bold">Maximal effekt på en enda förfrågan</h2>
										<div class="wi_50p marb20 brdt_new  brdwi_3"></div>
										<p>Du bestämmer själv hur mycket arbete du vill lägga ut på oss:</p>
										<ul class="mar0 pad0 tall">
											<li class="wi_100 dflex marb15 first">
												<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
												<div class="flex_1 alself_s padl10">
												<strong>Expressrekrytering:</strong> Få tillgång till redan färdiggranskade kandidater.</div>
											</li>
											<li class="wi_100 dflex marb15">
												<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
												<div class="flex_1 alself_s padl10">
												<strong>Standardrekrytering: </strong>Din tilldelade agent sköter hela upphandlingen.</div>
											</li>
											<li class="wi_100 dflex marb15">
												<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
												<div class="flex_1 alself_s padl10">
													<strong>Bygga CV bank:</strong> 0%, 50% eller 100%
												</div>
											</li>
											<li class="wi_100 dflex marb15">
												<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
												<div class="flex_1 alself_s padl10">
													<strong>Skapa kravprofil:</strong> Borgen (personlig eller moderbolag) eller företagshypotek
												</div>
											</li>
										</ul>
										
										<h3 class="mart30 padb15 fsz25">En inköpstjänst anpassat efter dina behov</h3>
										<p>Alla företag är unika och har olika önskemål, förutsättningar och möjligheter. Tillsammans med vår agent sätter du alla villkor för ditt inköpsuppdrag.  Det innebär att varje uppdrag utformas för att passa just ditt företag och er situation. Snabbt, enkelt och flexibelt.</p>
										<div class="mart15">
											<a href="#" class="maxwi_200p minhei_50p dflex justc_c alit_c opa90_h brdrad3 tmgreen_bg talc bold fsz18 xs-fsz16 white_txt trans_all2">Prova Plus för 1 kr!</a>
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
						<div class="xs-padrl10 brdb_new">
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
											<li class="wi_100 dflex marb15">
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
											<a href="#" class="maxwi_200p minhei_50p dflex justc_c alit_c opa90_h brdrad3 tmgreen_bg talc bold fsz18 xs-fsz16 white_txt trans_all2">Prova Plus för 1 kr!</a>
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
						<div class="xs-padrl10 brdb_new">
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
									<li class="wi_100 dflex marb15">
										<span>-</span>
										<div class="flex_1 alself_s padl10">
											Mellan 24 och 36 månader är avgiften 4% beloppet du lånat.
										</div>
									</li>
								</ul>
								<p>Avgiften tas ut när du accepterar ett låneerbjudande. Utöver detta betalar du räntan som långivarna erbjuder dig, om du accepterar lånet. Skulle du efter budgivningen välja att inte acceptera lånet kostar det ingenting.</p>
								<div class="mart15">
									<a href="#" class="maxwi_200p minhei_50p dflex justc_c alit_c opa90_h brdrad3 tmgreen_bg talc bold fsz18 xs-fsz16 white_txt trans_all2">Prova Plus för 1 kr!</a>
								</div>
							</div>
						</div>
						
					</div>
					
					
					<div class="column_m mart30 xs-padtb10 talc lgn_hight_22 fsz16 padb30 brdb_new">
						
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
					
					
					
					
					<div class="column_m marb30 xs-padtb10 talc lgn_hight_22 fsz16">
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
									<img src="<?php echo $path;?>html/usercontent/images/workplace/appstore2.png" class="wi_100 hei_120p  dblock marb10">
									<h4 class="bold fsz18 padt10">Solo</h4>
									<p>Nivå Chef - innebär att endast du har tillgång till "Chefs" utbudet i nätverket. Du kommer få tillgång till den delen av utbud som endast berör chefer och företagsledare. </p>
									
								</div>
								<div class="fxshrink_0 xs-dnone  sm-marrl15 "></div>
								<div class="wi_33 xs-wi_100 maxwi_400p flex_1 pad15 brdr_new">
									<span class="icon icon2"></span>
									<img src="<?php echo $path;?>html/usercontent/images/workplace/appstore5.png" class="wi_100 hei_auto dblock marb10">
									<h4 class="bold fsz18 padt10">Med sitt team</h4>
									<p>Nivå team - innebär att Produkt &amp; Förmåns utbud utökas till "Chef&amp;Team". Du kan anpassa utbudet för varje teammedlem. Förmånshantering ingår </p>
									
								</div>
								<div class="fxshrink_0 xs-dnone  sm-marrl15 "></div>
								<div class="wi_33 xs-wi_100 maxwi_400p flex_1 padtb0">
									<span class="icon icon3"></span>
									<img src="<?php echo $path;?>html/usercontent/images/workplace/appstore1.png" class="wi_80 hei_120p  dblock marb10 padl30 padt10">
									<h4 class="bold fsz18 padt10">Med hela företaget</h4>
									<p>Nivå Företag - innebär att du har full åtkomst till hela utbudet. Som chef har du en flexibel position och kan tillgång till fler produkter samt förmåner för dig och ditt företag. </p>
									
								</div>
							</div>
						</div>
					</div>
					
					<div class="clear"></div>
				</div>
				
				<div class="wi_300p col-xs-12 col-sm-12 fright pos_rel zi5">
					
					
					
					<div class="minhei_210 ovfl_hid pos_rel brdrad5 bglgrad_bot_f19961_f97a67 txt_f marl10">
						
						<input type="radio" name="subscribe-card" value="card-1" id="subscribe-card-1" class="default sr-only" checked="checked">
						<div class="wi_100 opa0 opa1_dsibc pos_abs pos_cenY left-100 left0_dsibc left100_sibc pad15 trans_all2" id="work" style="display:block;">
							<h3 class="marb30 padb10 brdb_new brdwi_3 brdclr_f talc fsz20 txt_f">Subscribe</h3>
							
							<label for="subscribe-card-2" onclick="closeView(1);" class="hei_40p dblock pos_rel marb10 brdrad4 bg_f bg_f2f5f8_h fsz16 txt_00a4bd curp trans_all2">
								<span class="pos_abs pos_cenY left15p">Email</span>
								<span class="fa fa-envelope-o pos_abs pos_cenY right15p bold fsz20"></span>
							</label>
							
							<label for="subscribe-card-5" onclick="closeView(2);" class="hei_40p dblock pos_rel marb10 brdrad4 bg_f bg_f2f5f8_h fsz16 txt_00a4bd curp trans_all2">
								<span class="pos_abs pos_cenY left15p">Dela</span>
								<span class="fa fa-envelope-o pos_abs pos_cenY right15p bold fsz20"></span>
							</label>
						</div>
						<div id="work1" style="display:none">
							<form action="#" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1" class="wi_230p maxwi_100 dblock padrl10">
								<input type="radio" name="subscribe-card" value="card-2" id="subscribe-card-2" class="default sr-only">
								<div class="wi_100 opa0 opa1_dsibc pos_abs pos_cenY left-100 left0_dsibc left100_sibc pad15 trans_all2">
									<h3 class="marb30 padb10 brdb_new brdwi_3 brdclr_f talc fsz20 txt_f">Prenumerera på...</h3>
									
									<div class="marb30 padt1 fsz14">
										<label class="dblock pos_rel marb10 padl20 curp">
											<input type="checkbox" id="1" onclick="changeIndex(this.id);" name="1" class="default sr-only">
											<div class="wi_16p hei_16p pos_abs zi1 top-1p left0 brdrad3 bg_f"></div>
											<div class="wi_11p hei_6p opa0 opa1_sibc pos_abs zi2 top3p left3p brdl brdb_new brdclr_00a4bd rotate-45"></div>
											<span>HR</span>
										</label>
										<label class="dblock pos_rel marb10 padl20 curp">
											<input type="checkbox" id="2" onclick="changeIndex(this.id);" name="2" class="default sr-only">
											<div class="wi_16p hei_16p pos_abs zi1 top-1p left0 brdrad3 bg_f"></div>
											<div class="wi_11p hei_6p opa0 opa1_sibc pos_abs zi2 top3p left3p brdl brdb_new brdclr_00a4bd rotate-45"></div>
											<span>Sälj</span>
										</label>
										<label class="dblock pos_rel marb10 padl20 curp">
											<input type="checkbox" id="4" onclick="changeIndex(this.id);" name="4" class="default sr-only">
											<div class="wi_16p hei_16p pos_abs zi1 top-1p left0 brdrad3 bg_f"></div>
											<div class="wi_11p hei_6p opa0 opa1_sibc pos_abs zi2 top3p left3p brdl brdb_new brdclr_00a4bd rotate-45"></div>
											<span>Inköp</span>
										</label>
										<label class="dblock pos_rel marb10 padl20 curp">
											<input type="checkbox" id="5" onclick="changeIndex(this.id);" name="5" class="default sr-only">
											<div class="wi_16p hei_16p pos_abs zi1 top-1p left0 brdrad3 bg_f"></div>
											<div class="wi_11p hei_6p opa0 opa1_sibc pos_abs zi2 top3p left3p brdl brdb_new brdclr_00a4bd rotate-45"></div>
											<span>Marknad</span>
										</label>
										<label class="dblock pos_rel marb10 padl20 curp">
											<input type="checkbox" id="6" onclick="changeIndex(this.id);" name="6" class="default sr-only">
											<div class="wi_16p hei_16p pos_abs zi1 top-1p left0 brdrad3 bg_f"></div>
											<div class="wi_11p hei_6p opa0 opa1_sibc pos_abs zi2 top3p left3p brdl brdb_new brdclr_00a4bd rotate-45"></div>
											<span>Ekonomi</span>
										</label>
										<label class="dblock pos_rel marb10 padl20 curp">
											<input type="checkbox" id="8" onclick="changeIndex(this.id);" name="8" class="default sr-only">
											<div class="wi_16p hei_16p pos_abs zi1 top-1p left0 brdrad3 bg_f"></div>
											<div class="wi_11p hei_6p opa0 opa1_sibc pos_abs zi2 top3p left3p brdl brdb_new brdclr_00a4bd rotate-45"></div>
											<span>IT</span>
										</label>
										<label class="dblock pos_rel marb10 padl20 curp">
											<input type="checkbox" id="9" onclick="changeIndex(this.id);" name="9" class="default sr-only">
											<div class="wi_16p hei_16p pos_abs zi1 top-1p left0 brdrad3 bg_f"></div>
											<div class="wi_11p hei_6p opa0 opa1_sibc pos_abs zi2 top3p left3p brdl brdb_new brdclr_00a4bd rotate-45"></div>
											<span>Styrelse</span>
										</label>
										
									</div>
									
									<label for="subscribe-email">Email Address</label>
									<input type="=&quot;email&quot;" name="email" id="email" class="wi_100 hei_40p hei_ dblock mart5 brd brdclr_f brdrad4 bg_f talc" placeholder="Enter your Email Address">
									
									<input type="button" onclick="submitForm();" value="Submit" class="wi_100 hei_40p dblock mart15 nobrd brdrad4 bg_f bg_f2f5f8_h talc fsz15 txt_00a4bd curp trans_all2">
									
									
									<input type="hidden" id="indexing_save" name="indexing_save" value="">
									
									
									<label for="subscribe-card-1" onclick="viewWork(1);" class="dblock talc fsz14 mart20 curp">
										<span class="fa fa-angle-left"></span>	
										Back to Other Options
									</label>
								</div>
							</form>
						</div>
						<div id="work2" style="display:none">
							<form action="../../PublicContentDetail/subscribeTemplate" method="POST" id="save_indexings" name="save_indexings" accept-charset="ISO-8859-1" class="wi_230p maxwi_100 dblock padrl10">
								<input type="radio" name="subscribe-card" value="card-5" id="subscribe-card-5" class="default sr-only">
								<div class="wi_100 opa0 opa1_dsibc pos_abs pos_cenY left-100 left0_dsibc left100_sibc pad15 trans_all2">
									<h3 class="marb30 padb10 brdb_new brdwi_3 brdclr_f talc fsz20 txt_f width_190">Dela med dig till</h3>
									
									<label for="subscribe-name">Name</label>
									<input type="=&quot;text&quot;" name="r_name" id="r_name" class="marb20 wi_100 hei_40p hei_ dblock mart5 brd brdclr_f brdrad4 bg_f talc" placeholder="Enter receivers name">
									Dela med dig till
									<label for="subscribe-email">Email Address</label>
									<input type="=&quot;email&quot;" name="emails" id="emails" class="marb20 wi_100 hei_40p hei_ dblock mart5 brd brdclr_f brdrad4 bg_f talc" placeholder="Enter receivers Email Address">
									
									<label for="subscribe-name">Senders Name</label>
									<input type="=&quot;text&quot;" name="s_name" id="s_name" class="marb20 wi_100 hei_40p hei_ dblock mart5 brd brdclr_f brdrad4 bg_f talc" placeholder="Enter your name">
									
									<input type="button" onclick="submitForms();" value="Submit" class="wi_100 hei_40p dblock mart15 nobrd brdrad4 bg_f bg_f2f5f8_h talc fsz15 txt_00a4bd curp trans_all2">
									
									
									<input type="hidden" id="indexing_saves" name="indexing_saves" value="">
									
									
									<label for="subscribe-card-1" onclick="viewWork(2);" class="dblock talc fsz14 mart20 curp">
										<span class="fa fa-angle-left"></span>	
										Back to Other Options
									</label>
								</div>
							</form>
						</div>
					</div>
					
					
					
					
					<!-- Links -->
					<div class="column_m bs_bb marb20 padrl0 pink_bg">
						<h3 class="padtb10 padrl10 pred2_bg lgn_hight_24 bold fsz18 white_txt">Apply For the job</h3>
						
						
					</div>
					
					
					
					<div class="clear"></div>
					
					
					<div class="column_m padb15 hidden-xs">
						<div class="white_bg">
							<div class="pad10">
								<h2 class="fsz16">Undrar du något?</h2>
								<p>Vi hjälper dig mer än gärna med att svara på dina frågor eller funderingar. Hör av dig till oss på telefon eller via mejl.</p>
								<ul class="small_icon_list_30">
									<li>
										<div class="icon_bx phone_ico"></div>
										<div class="icon_bx_content">
											<h2 class="lgtblue_txt padb5 fsz18">010 -15 10 125</h2>
											<div> support@qmatchup.com</div>
										</div>
									</li>
								</ul>
								<div class="clear"></div>
							</div>
						</div>
					</div>
					
					<div class="clear"></div>
				</div>
				
			</div>
		</div>
		<div class="clear"></div>
		<div class="hei_80p"></div>
		
		
		<!-- Edit news popup -->
		<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
			<div class="modal-content pad25 brd nobrdb_new talc">
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
						<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
					</div>
					<div class="marb10 padtb20 pos_rel">
						<div class="wi_100 pos_abs zi1 pos_cenY brdt_new"></div> <span class="diblock pos_rel zi2 padrl10 white_bg">
							eller om du redan har en prenumeration
						</span> </div>
						<div class="padb30"> <a href="#" class="diblock padrl15 brd brdclr_dblue brdrad50 white_bg blue_bg_h lgn_hight_30 dark_grey_txt white_txt_h">Logga in</a> </div>
				</form>
			</div>
		</div>
		
		
		<!-- Sales popup -->
		<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="sales_popup">
			<div class="modal-content pad25 brd nobrdb_new talc">
				<form>
					<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
					<div class="wi_100 dtable marb30 brdt_new brdl brdclr_white">
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
					<div class="setter-base wi_100 dtable marb30 brdt_new brdl brdclr_white">
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
	
	
	
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
	
	
	
</body>

</html>
</body>

</html>