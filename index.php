<?php header("location:https://www.qloudid.com/public/index.php/ExploreQloudID"); ?>
<html>
	<head>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="html/animated/images/favicon.ico"/>
		<link rel="stylesheet" type="text/css" media="all" href="html/animated/css/style.css">
		<link rel="stylesheet" type="text/css" media="all" href="html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="html/usercontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="html/usercontent/css/style.css">
		<link rel="stylesheet" type="text/css" media="all" href="html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="html/smartappcss/css/style.css">
		<link rel="stylesheet" type="text/css" media="all" href="html/smartappcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="html/smartappcss/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="html/smartappcss/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="html/smartappcss/css/icofont.css" />
		<link rel="stylesheet" type="text/css" media="all" href="html/usercontent/css/modules.css" />
		
		<title>Qmatchup</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" async src="html/usercontent/js/jquery.js"></script>
		<script>
			function submitForm()
			{
				if($("#message").val()=="")
				{
					alert("please enter company name");
					return false;
				}
				$("#save_indexing").submit();
			}
		</script>
	</head>
	<body class="bg_colorn_new">
		<div class="column_m header header_small pos_fix bs_bb bg_colorn_new" >
			<div class="wi_100 hei_40p padtb5 padrl10 bg_colorn_new" >
				<div class="visible-xs visible-sm fleft">
					<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
				</div>
				<div class="logo hidden-xs hidden-sm marr15">
					<a href="#"> <img src="html/usercontent/images/qmatchup_logo_blue2.png" alt="Qmatchup" title="Qmatchup" class="valb" /> </a>
				</div>
				<div class="hidden-xs hidden-sm fleft padl10 padr30">
					<div class="languages">
						<a href="#" id="language_selector" class="padrl10"><img src="html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US" /></a>
						<ul class="wi_100 mar0 pad5 blue_bg">
							<li class="dblock">
								<a href="#" class="pad5" data-lang="eng"><img src="html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US" />
								</a>
							</li>
							<li class="dblock">
								<a href="#" class="pad5" data-lang="swd"><img src="html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="Sweden" alt="Sweden" />
								</a>
							</li>
						</ul>
					</div>
				</div>
				
				<div class="fright xs-dnone sm-dnone">
					<ul class="mar0 pad0">
						<li class="dblock hidden-xs hidden-sm fleft pos_rel "> <a href="http://www.qloudid.com/user/index.php/PublicAboutQmatchup" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 white_txt white_txt_h" data-en="Logga In" data-sw="Om oss">Om Oss</a> </li>
						<li class="dblock hidden-xs hidden-sm fleft pos_rel "> <a href="http://www.qloudid.com/user/index.php/CorporateServices" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 white_txt white_txt_h" data-en="Logga In" data-sw="För företag">För företag</a> </li>
						<li class="dblock hidden-xs hidden-sm fright pos_rel brdl brdclr_dblue"> <a href="http://www.qloudid.com/user/index.php/LoginAccount" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 white_txt white_txt_h bg_f80 " data-en="Logga In" data-sw="Logga In">Logga IN</a> </li>
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
													<div><img src="html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>Personal</a>
											</li>
											<li>
												<a href="#" data-id="tab-bus" class="swedBank">
													<div><img src="html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
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
													<div><img src="html/usercontent/images/product icons/icon-1.png" width="45" height="45" title="" alt="" />
													</div>Cloud ID</a>
											</li>
											<li>
												<a href="#" class="swedBank">
													<div><img src="html/usercontent/images/product icons/icon-2.png" width="45" height="45" title="" alt="" />
													</div>Verify</a>
											</li>
											<li>
												<a href="#" class="posted_jobs">
													<div><img src="html/usercontent/images/product icons/icon-3.png" width="45" height="45" title="" alt="" />
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
													<div><img src="html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>Cloud ID</a>
											</li>
											<li>
												<a href="#" data-id="tab-bus-vrf" class="swedBank">
													<div><img src="html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>Verify</a>
											</li>
											<li>
												<a href="#" data-id="tab-bus-act" class="posted_jobs">
													<div><img src="html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>Activate</a>
											</li>
											<li>
												<a href="#" data-id="tab-bus-eng" class="proposals">
													<div><img src="html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
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
													<div><img src="html/usercontent/images/product icons/icon-4.png" width="45" height="45" title="" alt="" />
													</div>Business</a>
											</li>
											<li>
												<a href="#" class="swedBank">
													<div><img src="html/usercontent/images/product icons/icon-5.png" width="45" height="45" title="" alt="" />
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
													<div><img src="html/usercontent/images/product icons/icon-6.png" width="45" height="45" title="" alt="" />
													</div>Basic - Free</a>
											</li>
											<li>
												<a href="#" class="swedBank">
													<div><img src="html/usercontent/images/product icons/icon-7.png" width="45" height="45" title="" alt="" />
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
													<div><img src="html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>By organization</a>
											</li>
											<li>
												<a href="#" data-id="tab-bus-act-ind" class="swedBank">
													<div><img src="html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>By industry</a>
											</li>
											<li>
												<a href="#" data-id="tab-bus-act-top" class="posted_jobs">
													<div><img src="html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
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
													<div><img src="html/usercontent/images/product icons/icon-8.png" width="45" height="45" title="" alt="" />
													</div>HR Portal</a>
											</li>
											<li>
												<a href="#" class="swedBank">
													<div><img src="html/usercontent/images/product icons/icon-9.png" width="45" height="45" title="" alt="" />
													</div>Sales</a>
											</li>
											<li>
												<a href="#" class="posted_jobs">
													<div><img src="html/usercontent/images/product icons/icon-10.png" width="45" height="45" title="" alt="" />
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
													<div><img src="html/usercontent/images/product icons/icon-11.png" width="45" height="45" title="" alt="" />
													</div>Telemarketing</a>
											</li>
											<li>
												<a href="#" class="swedBank">
													<div><img src="html/usercontent/images/product icons/icon-1.png" width="45" height="45" title="" alt="" />
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
													<div><img src="html/usercontent/images/product icons/icon-2.png" width="45" height="45" title="" alt="" />
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
													<div><img src="html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>Employees</a>
											</li>
											<li>
												<a href="#" class="swedBank">
													<div><img src="html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>Customers</a>
											</li>
											<li>
												<a href="#" class="posted_jobs">
													<div><img src="html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
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
				<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="http://www.qloudid.com/user/index.php/LoginAccount" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 white_txt">Login</a> </div>
				<div class="clear"></div>
			</div>
		</div><div class="clear"></div>
		
		<!-- NEW BANNER -->
		<div class="banner_holder bg_colorn_new hei_auto dflex justc_c padrl15">
			<div class="wrap dflex alit_c padtb60 minhei_100vh marrl0 maxwi_100">
				<div class="wi_100 padb20">
					<h1>Direct access to all the web's
						<span>
							<span class="visible_ib"> Products</span>
							<span class="hide_ib"> Cars</span>
							<span class="hide_ib"> Balls</span>
							<span class="hide_ib"> Shoes</span>
							<span class="hide_ib"> Computers</span>
						</span>
					</h1>
					<h2>Search among 150,000,000+ records.</h2>
					<form action="user/index.php/PublicSearchResult" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
						<div class="banner_search maxwi_100 minwi_0 dflex xxs-fxdir_col alit_c">
							<div class="textbox maxwi_100 pad0i"><input  type="text" name="message" id="message" Placeholder="Ex, search iPhone 6 or Volvo"></div>
							<div class="btn_holder maxwi_100 xxs-mart15"><input type="button" value="Search" onclick="submitForm();"></div>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<div class="column_m sub_header lgtgrey2_bg">
			<div class="column_m sub_header_brd zi10 dflex fxwrap_w xxs-fxdir_col alit_c justc_sb xxs-justc_c padl20 lgtgrey2_bg">
				<ul class="martb2 marrl0 pad0">
					<li><a href="#">Advertising</a></li>
					<li><a href="#">Business</a></li>
					<li><a href="#">About</a></li>
				</ul>
				<ul class="martb2 marrl0 pad0" style="float:right;">
					<li><a href="#">Privacy</a></li>
					<li><a href="#">Terms</a></li>
					<li><a href="#">Settings</a></li>
				</ul>
			</div>
			<div class="container zi5 white_bg">
				
				
				
				<!-- Section 1 -->
				
				
				<!-- Section 2 -->
				<div class="ovfl_hid mart30 padrl10">
					<div class="wrap maxwi_100 padtb30 brdb">
						<div class="dflex fxwrap_w justc_c alit_c marrl-20 talc fsz13 txt_85">
							<div class="wi_33 xs-wi_100 marb30 padrl20">
								<img src="html/search/images/icons/tfg-1.png" width="60" height="60" class="dblock marrla marb20" title="Fully customizable" alt="Fully customizable" />
								<h4 class="fsz20 txt_37404a">Fully customizable</h4>
								<div class="lgn_hight_25 letspc_03">Match your survey to your event's style. Easily change questions, colors, images, and more.</div>
							</div>
							<div class="wi_33 xs-wi_100 marb30 padrl20">
								<img src="html/search/images/icons/tfg-2.png" width="60" height="60" class="dblock marrla marb20" title="Mobile-ready" alt="Mobile-ready" />
								<h4 class="fsz20 txt_37404a">Mobile-ready</h4>
								<div class="lgn_hight_25 letspc_03">Delight your attendees with a beautiful survey they can take on the go, on any device.</div>
							</div>
							<div class="wi_33 xs-wi_100 marb30 padrl20">
								<img src="html/search/images/icons/tfg-3.png" width="60" height="60" class="dblock marrla marb20" title="Free &amp; unlimited" alt="Free &amp; unlimited" />
								<h4 class="fsz20 txt_37404a">Free &amp; unlimited</h4>
								<div class="lgn_hight_25 letspc_03">Running events can be expensive, but getting feedback shouldn't be. Typeform is free and unlimited.</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Section 3 -->
				<div class="mart30 padrl10 txt_37404a">
					<div class="wrap maxwi_100 padt30 padb60 brdb">
						<h2 class="xs-dnone marb30 nobold talc fsz16 txt_6c737a">Typeform is trusted by companies like these...</h2>
						
						<div class="dflex xs-dnone alit_c marb30">
							<div class="flex_1 padtb20 padrl30">
								<img src="html/search/images/logos/ny_times.png" class="maxwi_100 hei_auto dblock" />
							</div>
							<div class="flex_1 padtb20 padrl30">
								<img src="html/search/images/logos/bbc.png" class="maxwi_100 hei_auto dblock" />
							</div>
							<div class="flex_1 padtb20 padrl30">
								<img src="html/search/images/logos/facebook.png" class="maxwi_100 hei_auto dblock" />
							</div>
							<div class="flex_1 padtb20 padrl30">
								<img src="html/search/images/logos/financial_times.png" class="maxwi_100 hei_auto dblock" />
							</div>
							<div class="flex_1 padtb20 padrl30">
								<img src="html/search/images/logos/airbnb.png" class="maxwi_100 hei_auto dblock" />
							</div>
						</div>
						
						<div class="talc">
							<img src="html/search/images/people/Mike-Rose.jpg" width="65" height="65" class="dblock marrla marb20 brdrad50" />
							<h3 class="marb10 pad0 fsz15">Mike Rose</h3>
							<div class="txt_a5 fsz12">Professional Icebreaker</div>
							<div class="maxwi_750p mart15 marrla marb30 lgn_hight_35 fsz22">
								&quot;I love feedback (don't we all!). Started using a site to generate post-event feedback forms and I thought I'd share @Typeform&quot;
							</div>
							<div>
								<a href="#" class="fsz16 txt_73bec8">See what else people are saying about Typeform...</a>
							</div>
						</div>
						
					</div>
				</div>
				
				<!-- Section 4 -->
				<div class="ovfl_hid mart30 padrl10 txt_37404a">
					<div class="wrap maxwi_100 padt30 padb60 brdb">
						<h2 class="marb30 pad0 talc fsz20 txt_6c737a">Try these templates too...</h2>
						<div class="slick-slider dflex alit_s marrl-15 talc" id="section-3-slick" data-slick-settings="dots:false,arrows:true,infinite:true,centerMode:true,variableWidth: true,slidesToShow:1,slidesToScroll:1" data-slick-sm-settings="dots:false,arrows:false,infinite:true,centerMode:true,variableWidth: true,slidesToShow:1,slidesToScroll:1" data-slick-xs-settings="dots:false,arrows:false,infinite:true,centerMode:true,variableWidth: true,slidesToShow:1,slidesToScroll:1" data-slick-xxs-settings="dots:false,arrows:false,infinite:true,centerMode:true,variableWidth: true,slidesToShow:1,slidesToScroll:1">
							
							<div class="wi_220pi dflex fxdir_col alit_s padrl15">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
									<img src="html/search/images/icons/Icons_Carousel-31.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
									<h4 class="pad0 nobold fsz16 txt_60666f">Marketing Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div>
							<div class="wi_220pi dflex fxdir_col alit_s padrl15">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
									<img src="html/search/images/icons/Icons_Carousel-11.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
									<h4 class="pad0 nobold fsz16 txt_60666f">Customer Satisfaction Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div>
							<div class="wi_220pi dflex fxdir_col alit_s padrl15">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
									<img src="html/search/images/icons/Icons_Carousel-39.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
									<h4 class="pad0 nobold fsz16 txt_60666f">Post-Event Satisfaction Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div>
							<div class="wi_220pi dflex fxdir_col alit_s padrl15">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
									<img src="html/search/images/icons/Icons_Carousel-30.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
									<h4 class="pad0 nobold fsz16 txt_60666f">Market Research Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div>
							<div class="wi_220pi dflex fxdir_col alit_s padrl15">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
									<img src="html/search/images/icons/Icons_Carousel-16.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
									<h4 class="pad0 nobold fsz16 txt_60666f">Facebook Polls</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div>
							<div class="wi_220pi dflex fxdir_col alit_s padrl15">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
									<img src="html/search/images/icons/Icons_Carousel-10.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
									<h4 class="pad0 nobold fsz16 txt_60666f">Customer Development Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div>
							<div class="wi_220pi dflex fxdir_col alit_s padrl15">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
									<img src="html/search/images/icons/Icons_Carousel-05.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
									<h4 class="pad0 nobold fsz16 txt_60666f">Branding Questionnaires</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div>
							<div class="wi_220pi dflex fxdir_col alit_s padrl15">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
									<img src="html/search/images/icons/Icons_Carousel-36.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
									<h4 class="pad0 nobold fsz16 txt_60666f">Patient Satisfaction Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div>
							<div class="wi_220pi dflex fxdir_col alit_s padrl15">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
									<img src="html/search/images/icons/Icons_Carousel-13.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
									<h4 class="pad0 nobold fsz16 txt_60666f">Demographic Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div>
							<div class="wi_220pi dflex fxdir_col alit_s padrl15">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
									<img src="html/search/images/icons/Icons_Carousel-15.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
									<h4 class="pad0 nobold fsz16 txt_60666f">Employee Satisfaction Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div>
							<div class="wi_220pi dflex fxdir_col alit_s padrl15">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
									<img src="html/search/images/icons/Icons_Carousel-32.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
									<h4 class="pad0 nobold fsz16 txt_60666f">Net Promoter Score Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div>
							<div class="wi_220pi dflex fxdir_col alit_s padrl15">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
									<img src="html/search/images/icons/Icons_Carousel-36.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
									<h4 class="pad0 nobold fsz16 txt_60666f">Online Questionnaire Maker</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div>
							<div class="wi_220pi dflex fxdir_col alit_s padrl15">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
									<img src="html/search/images/icons/Icons_Carousel-38.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
									<h4 class="pad0 nobold fsz16 txt_60666f">Political Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div>
							<div class="wi_220pi dflex fxdir_col alit_s padrl15">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
									<img src="html/search/images/icons/Icons_Carousel-04.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
									<h4 class="pad0 nobold fsz16 txt_60666f">Brand Awareness Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div>
							<div class="wi_220pi dflex fxdir_col alit_s padrl15">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
									<img src="html/search/images/icons/Icons_Carousel-07.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
									<h4 class="pad0 nobold fsz16 txt_60666f">Candidate Experience Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div>
							<div class="wi_220pi dflex fxdir_col alit_s padrl15">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
									<img src="html/search/images/icons/Icons_Carousel-46.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
									<h4 class="pad0 nobold fsz16 txt_60666f">Straw Polls</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div>
							<div class="wi_220pi dflex fxdir_col alit_s padrl15">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
									<img src="html/search/images/icons/Icons_Carousel-46.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
									<h4 class="pad0 nobold fsz16 txt_60666f">Online Poll Maker</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div>
							<div class="wi_220pi dflex fxdir_col alit_s padrl15">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
									<img src="html/search/images/icons/Icons_Carousel-47.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
									<h4 class="pad0 nobold fsz16 txt_60666f">Student Satisfaction Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div>
							<div class="wi_220pi dflex fxdir_col alit_s padrl15">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
									<img src="html/search/images/icons/Icons_Carousel-42.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
									<h4 class="pad0 nobold fsz16 txt_60666f">Social Media Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div>
							<div class="wi_220pi dflex fxdir_col alit_s padrl15">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
									<img src="html/search/images/icons/Icons_Carousel-18.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
									<h4 class="pad0 nobold fsz16 txt_60666f">Funny Polls</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div>
							<div class="wi_220pi dflex fxdir_col alit_s padrl15">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
									<img src="html/search/images/icons/Icons_Carousel-38.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
									<h4 class="pad0 nobold fsz16 txt_60666f">Political Polls</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div>
							
						</div>
					</div>
					<style>
						#section-3-slick .slick-prev, 
						#section-3-slick .slick-next{
						width: 100px;
						height: 100%;
						z-index: 2;
						}
						#section-3-slick .slick-prev{
						background: -webkit-gradient(linear, left top, right top, from(#fff), to(rgba(255,255,255,0)));
						background: linear-gradient(to right, #fff, #fff, rgba(255,255,255,0));
						}
						#section-3-slick .slick-next{
						background: -webkit-gradient(linear, right top, left top, from(#fff), to(rgba(255,255,255,0)));
						background: linear-gradient(to left, #fff, #fff, rgba(255,255,255,0));
						}
						#section-3-slick .slick-prev:before, 
						#section-3-slick .slick-next:before{
						opacity: 1;
						font-size: 48px;
						color: #941900;
						}
					</style>
				</div>
				
				<!-- Section 5 -->
				<div class="mart30 xs-mart0 padrl10 xs-padrl0 txt_37404a">
					<div class="wrap maxwi_100 padt30 padrl2 xs-padrl0 padb60 brdb fsz16">
						<div class="wi_100 dflex fxwrap_w justc_c alit_s talc">
							
							<div class="wi_100 dflex xs-fxwrap_w justc_c alit_s brdb xs-nobrdb">
								<div class="wi_50 xs-wi_100 dflex justc_c alit_s marb10 padtb40 xs-padrl12">
									<div class="wi_100 maxwi_500p ovfl_hid padt10">
										<h4 class="fsz24 bold">Sales &amp; Marketing</h4>
										<p>Give your sales team the perfect set of apps to help close more business deals in less time.</p>
										<div class="category-apps sales-marketing marrbl-2 uppercase fsz12">
											<a href="#" class="wi_66 xxs-wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt fsz16 xs-fsz12 crm featured-app"><span class="dblock pi1"></span>CRM</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt salesinbox"><em class="dblock pos_abs padrl5 blue_bg white_txt fsz10 new">New</em><span class="dblock pi36"></span> SalesInbox</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt salesiq"><span class="dblock pi5"></span>SalesIQ</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt survey"><span class="dblock pi3"></span>Survey</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt campaign"><span class="dblock pi2"></span>Campaigns</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt sites"><span class="dblock pi4"></span>Sites</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt social"><span class="dblock pi24"></span>Social </a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt contactmanager"><span class="dblock pi6"></span>Contact<br> Manager</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt forms nobottom"><span class="dblock pi25"></span> Forms</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt motivator"><span class="dblock pi30"></span> Motivator</a>
											<div class="wi_100 hei_1p fleft pos_rel zi2 mart-1 white_bg"></div>
										</div>
									</div>
								</div>
								
								<div class="xs-dnone fxshrink_0 mart40 marrl10 brdr"></div>
								
								<div class="wi_50 xs-wi_100 dflex justc_c alit_s marb10 padtb40 xs-padrl12 xs-bg_fa">
									<div class="wi_100 maxwi_500p ovfl_hid padt10">
										<h4 class="fsz24 bold">Email &amp; Collaboration</h4>
										<p> Empower your workforce with apps to collaborate and transform the way they work.</p>
										<div class="category-apps email-collab marrbl-2 uppercase fsz12">
											<a href="#" class="wi_66 xxs-wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h brdr dark_grey_txt fsz16 xs-fsz12 mail featured-app"><span class="dblock pi9"></span>Mail</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h brdr dark_grey_txt notebook"><em class="dblock pos_abs padrl5 blue_bg white_txt fsz10 new">New</em><span class="dblock pi35"></span> Notebook</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h brdr dark_grey_txt docs"><span class="dblock pi10"></span>Docs</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h brdr dark_grey_txt projects"><span class="dblock pi11"></span>Projects</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h brdr dark_grey_txt connect"> <span class="dblock pi12"></span>Connect</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h brdr dark_grey_txt bugtracker"> <span class="dblock pi13"></span>BugTracker</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h brdr dark_grey_txt meeting"> <span class="dblock pi14"></span>Meeting</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h brdr dark_grey_txt vault"><span class="dblock pi15"></span>Vault</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h brdr dark_grey_txt showtime"><span class="dblock pi29"></span> ShowTime</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h brdr dark_grey_txt chat"><span class="dblock pi31"></span> Chat</a>
											<div class="wi_100 hei_1p fleft pos_rel zi2 mart-1 white_bg xs-bg_fa"></div>
										</div>
									</div>
								</div>
								
							</div>
							
							<div class="wi_100 dflex xs-fxwrap_w justc_c alit_s">
								<div class="wi_50 xs-wi_100 dflex justc_c alit_s marb10 padtb40 xs-padrl12">
									<div class="wi_100 maxwi_500p ovfl_hid padt10">
										<h4 class="fsz24 bold">Finance</h4>
										<p>Solve business accounting challenges using our perfect set of finance apps on the cloud. </p>
										<div class="category-apps sales-marketing marrbl-2 uppercase fsz12">
											<a href="#" class="wi_66 xxs-wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_yellow_h brdr dark_grey_txt fsz16 xs-fsz12 books featured-app "><span class="dblock pi16"></span>Books</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_yellow_h brdr dark_grey_txt invoice"><span class="dblock pi17"></span>Invoice</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_yellow_h brdr dark_grey_txt subscription"><span class="dblock pi22"></span>Subscriptions</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_yellow_h brdr dark_grey_txt expense"><span class="dblock pi27"></span>Expense</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_yellow_h brdr dark_grey_txt inventory"><span class="dblock pi28"></span>Inventory</a>
											<div class="wi_100 hei_1p fleft pos_rel zi2 mart-1 white_bg"></div>
										</div>
									</div>
								</div>
								
								<div class="xs-dnone fxshrink_0 marrl10 brdr"></div>
								
								<div class="wi_50 xs-wi_100 dflex justc_c alit_s marb10 padtb40 xs-padrl12 xs-bg_fa">
									<div class="wi_100 maxwi_500p ovfl_hid padt10">
										<h4 class="fsz24 bold">IT &amp; Help Desk</h4>
										<p>Be right where your customers are with apps to help your business engage with them. </p>
										<div class="category-apps sales-marketing marrbl-2 uppercase fsz12">
											<a href="#" class="wi_100 xs-wi_50 dblock fleft pos_rel zi3_h padt30 brdb brdb_darkblue_h brdr dark_grey_txt fsz16 xs-fsz12 support featured-app"><span class="dblock pi7"></span>Support</a>
											<a href="#" class="wi_33 xs-wi_50 dblock fleft pos_rel zi3_h padt30 brdb brdb_darkblue_h brdr dark_grey_txt sdp-ondemand"><span class="dblock pi32"></span>ServiceDesk Plus</a>
											<a href="#" class="wi_33 xs-wi_50 dblock fleft pos_rel zi3_h padt30 brdb brdb_darkblue_h brdr dark_grey_txt mdm"><span class="dblock pi34"></span>Mobile Device <br> Management</a>
											<a href="#" class="wi_33 xs-wi_50 dblock fleft pos_rel zi3_h padt30 brdb brdb_darkblue_h brdr dark_grey_txt assist"><span class="dblock pi8"></span>Assist</a>
											<div class="wi_100 hei_1p fleft pos_rel zi2 mart-1 white_bg xs-bg_fa"></div>
										</div>
									</div>
								</div>
								
							</div>
							
						</div>
					</div>
				</div>
				
				<!-- Section 6 -->
				<div class="padrl10 txt_37404a">
					<div class="wrap maxwi_100 padtb60">
						<div class="dflex fxwrap_w justc_c alit_c talc">
							<h2 class="marb20 pad0 nobold fsz20 txt_37404a">Goodbye forms. <strong>Hello typeforms.</strong></h2>
							<a href="#" class="dblock marb20 marrl20 padtb10 padrl30 brd brdwi_2 brdclr_73bec8 brdrad3 white_bg bg_73bec8_h lgn_hight_24 bold fsz16 txt_73bec8 white_txt_h trans_all2">Start creating</a>
						</div>
					</div>
				</div>
				
				<!-- Section 7 -->
				<div class="ovfl_hid padrl10 txt_37404a fsz14">
					<div class="wrap maxwi_100 dflex xs-dnone alit_fs">
						<div class="wi_20 marb40">
							<h3 class="marb20 pad0 uppercase letspc_15 bold fsz14 txt_787e89">Useful cases</h3>
							<ul class="mar0 pad0">
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Forms</a></li>
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Surveys</a></li>
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Order forms</a></li>
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Quizzes</a></li>
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Lead Generation</a></li>
							</ul>
						</div>
						<div class="wi_20 marb40">
							<h3 class="marb20 pad0 uppercase letspc_15 bold fsz14 txt_787e89">Product</h3>
							<ul class="mar0 pad0 fsz14">
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Examples</a></li>
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Tour</a></li>
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Plans &amp; pricing</a></li>
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Going PRO</a></li>
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Developers</a></li>
							</ul>
						</div>
						<div class="wi_20 marb40">
							<h3 class="marb20 pad0 uppercase letspc_15 bold fsz14 txt_787e89">You might like</h3>
							<ul class="mar0 pad0 fsz14">
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Typeform blog</a></li>
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Form Invaders <img src="html/search/images/icon-invaders-animated.gif"></a></li>
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Typeform LITE</a></li>
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Wall of love</a></li>
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Typeform inspiration</a></li>
							</ul>
						</div>
						<div class="wi_20 marb40">
							<h3 class="marb20 pad0 uppercase letspc_15 bold fsz14 txt_787e89">Help</h3>
							<ul class="mar0 pad0 fsz14">
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Help Center</a></li>
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">System status ●</a></li>
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">FAQs</a></li>
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">My first typeform</a></li>
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Tweet for support</a></li>
							</ul>
						</div>
						<div class="wi_20 marb40">
							<h3 class="marb20 pad0 uppercase letspc_15 bold fsz14 txt_787e89">Company</h3>
							<ul class="mar0 pad0 fsz14">
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">About Typeform</a></li>
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Work at Typeform</a></li>
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Terms &amp; privacy</a></li>
								<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Contact Us</a></li>
							</ul>
						</div>
					</div>
				</div>
				
				<!-- Section 8 -->
				<div class=" dflex justc_sb alit_c padtb20 padrl40 brdt lgn_hight_34 fsz14 txt_787e89">
					<div>
						<img src="html/search/images/map-pointer.svg" width="23" height="33" class="marr10 valm">
						<span class="val">
		            		<b>Typeform|</b> Bac de Roda 163, Barcelona 
						</span>
					</div>
					<span>&copy; Typeform</span>
				</div>
				
				<!-- Section 9 -->
				<div class="padrl10 txt_37404a">
					<div class="wrap maxwi_100 padtb30">
						<h2 class="talc fsz34 xs-fsz28 lgn_hight_n12 padb30">Så tycker våra egenanställda</h2>
						<div class="dflex xs-dblock alit_s lgn_hight_22 fsz16">
							<div class="wi_50 xs-wi_100 dflex xs-dblock alit_c pad30 xs-padrl0 xs-padtb15 brdr xs-nobrdr xs-brdb">
								<div>
									<h3 class="padb30 fsz24 bold">Multichannel</h4>
									<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
									<a href="#">Learn more</a>
								</div>
							</div>
							<div class="wi_50 xs-wi_100 dflex xs-dblock alit_c pad30 xs-padt15 xs-padrl0 xs-padb0 talc">
								<div>
									<span class="crm-icon crm-icon-1"></span>
									<h4 class="bold fsz18">Email </h4>
									<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="pointer-divider marb30"></div>
				
				<!-- Section 10 -->
				<div class="padrl10 txt_37404a">
					<div class="wrap maxwi_100 padtb30">
						<h2 class="talc fsz34 xs-fsz28 lgn_hight_n12 padb30">Så tycker våra egenanställda</h2>
						<div class="dflex xs-dblock alit_s lgn_hight_22 fsz16">
							<div class="wi_50 xs-wi_100 dflex xs-dblock alit_c pad30 xs-padrl0 xs-padtb15 brdr xs-nobrdr xs-brdb">
								<div>
									<h3 class="padb30 fsz24 bold">Multichannel</h4>
									<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
									<a href="#">Learn more</a>
								</div>
							</div>
							<div class="wi_50 xs-wi_100 dflex xxs-dblock fxdir_col xs-fxdir_row xxs-dblock alit_s talc">
								<div class="wi_100 xs-wi_50 xxs-wi_100 flex_1 pad30 xs-pad15 xxs-padrl0 brdb xs-nobrdb xs-brdr xxs-nobrdr xxs-brdb">
									<span class="crm-icon crm-icon-1"></span>
									<h4 class="bold fsz18">Email</h4>
									<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
								</div>
								<div class="wi_100 xs-wi_50 xxs-wi_100 flex_1 pad30 xs-pad15 xxs-padrl0">
									<span class="crm-icon crm-icon-3"></span>
									<h4 class="bold fsz18">SalesSignals</h4>
									<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="pointer-divider marb30"></div>
				
				<!-- Section 11 -->
				<div class="padrl10 txt_37404a">
					<div class="wrap maxwi_100 padtb30">
						<h2 class="talc fsz34 xs-fsz28 lgn_hight_n12 padb30">Så tycker våra egenanställda</h2>
						<div class="dflex xs-dblock alit_s lgn_hight_22 fsz16">
							<div class="wi_50 xs-wi_100 dflex xs-dblock alit_c pad30 xs-padrl0 xs-padtb15 brdr xs-nobrdr xs-brdb">
								<div>
									<h3 class="padb30 fsz24 bold">Multichannel</h4>
									<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
									<a href="#">Learn more</a>
								</div>
							</div>
							<div class="wi_50 xs-wi_100 dflex xxs-dblock fxdir_col xs-fxdir_row xxs-dblock alit_s talc">
								<div class="wi_100 xs-wi_50 xxs-wi_100 flex_1 dflex alit_c pad30 xs-pad15 xxs-padrl0 brdb xs-nobrdb xs-brdr xxs-nobrdr xxs-brdb">
									<div>
										<span class="crm-icon crm-icon-1"></span>
										<h4 class="bold fsz18">Email</h4>
										<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
									</div>
								</div>
								<div class="wi_100 xs-wi_50 xxs-wi_100 flex_1 dflex xxs-dblock xs-fxdir_col sm-fxdir_col alit_s">
									<div class="wi_50 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0 brdr xs-nobrdr xs-brdb sm-nobrdr sm-brdb">
										<span class="crm-icon crm-icon-3"></span>
										<h4 class="bold fsz18">SalesSignals</h4>
										<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now.</p>
									</div>
									<div class="wi_50 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0">
										<span class="crm-icon crm-icon-4"></span>
										<h4 class="bold fsz18">Social</h4>
										<p>Bring social media into your sales process. Monitor trends and discover new leads, all from within Zoho CRM.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="pointer-divider marb30"></div>
				
				<!-- Section 12 -->
				<div class="padrl10 txt_37404a">
					<div class="wrap maxwi_100 padtb30">
						<h2 class="talc fsz34 xs-fsz28 lgn_hight_n12 padb30">Så här går det till</h2>
						<ul class="dflex fxwrap_w alit_s mar0 pad0 brdt brdl">
							<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0 brdr brdb">
								<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
									<div class="front"> <i class="category-icon category-developers"></i> <span class="dblock uppercase fsz13 bold">Web developers</span> </div>
									<div class="back white_bg green_txt"> <span>FRONT-END DEVELOPERS<br>BACK-END DEVELOPERS<br>SOFTWARE PROGRAMMERS</span> <em class="dblock mart20">and more...</em> </div>
								</a>
							</li>
							<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0 brdr brdb">
								<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
									<div class="front"> <i class="category-icon category-mobile-developers"></i> <span class="dblock uppercase fsz13 bold">Mobile developers</span> </div>
									<div class="back white_bg green_txt"> <span>
										iOS APP DEVELOPERS<br>
										ANDROID DEVELOPERS<br>UI/UX DESIGNERS
									</span> <em class="dblock mart20">and more...</em> </div>
								</a>
							</li>
							<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0 brdr brdb">
								<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
									<div class="front"> <i class="category-icon category-designers"></i> <span class="dblock uppercase fsz13 bold">Designers &amp; Creatives</span> </div>
									<div class="back white_bg green_txt"> <span>GRAPHIC DESIGNERS<br>UI/UX DESIGNERS<br>MOTION GRAPHICS EXPERTS</span> <em class="dblock mart20">and more...</em> </div>
								</a>
							</li>
							<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0 brdr brdb">
								<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
									<div class="front"> <i class="category-icon category-writing"></i> <span class="dblock uppercase fsz13 bold">Writers</span> </div>
									<div class="back white_bg green_txt"> <span>BLOG WRITERS<br>CONTENT WRITERS<br>COPYWRITERS</span> <em class="dblock mart20">and more...</em> </div>
								</a>
							</li>
							<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0 brdr brdb">
								<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
									<div class="front"> <i class="category-icon category-administrative-support"></i> <span class="dblock uppercase fsz13 bold">Virtual assistants</span> </div>
									<div class="back white_bg green_txt"> <span>PERSONAL ASSISTANTS<br>TRANSCRIPTIONISTS<br>WEB RESEARCHERS</span> <em class="dblock mart20">and more...</em> </div>
								</a>
							</li>
							<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0 brdr brdb">
								<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
									<div class="front"> <i class="category-icon category-customer-service"></i> <span class="dblock uppercase fsz13 bold">Customer service agents</span> </div>
									<div class="back white_bg green_txt"> <span>PHONE SUPPORT SPECIALISTS<br>EMAIL SUPPORT EXPERTS<br>LIVE CHAT SUPPORT PROS</span> <em class="dblock mart20">and more...</em> </div>
								</a>
							</li>
							<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0 brdr brdb">
								<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
									<div class="front"> <i class="category-icon category-sales-marketing"></i> <span class="dblock uppercase fsz13 bold">Sales &amp; marketing experts</span> </div>
									<div class="back white_bg green_txt"> <span>SEO SPECIALISTS<br>EMAIL AUTOMATORS<br>MARKETING EXPERTS</span> <em class="dblock mart20">and more...</em> </div>
								</a>
							</li>
							<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0 brdr brdb">
								<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
									<div class="front"> <i class="category-icon category-accounting-consulting"></i> <span class="dblock uppercase fsz13 bold">Accountants &amp; consultants</span> </div>
									<div class="back white_bg green_txt"> <span>TAX ACCOUNTANTS<br>BOOKKEEPERS<br>FINANCIAL MODELERS</span> <em class="dblock mart20">and more...</em> </div>
								</a>
							</li>
						</ul>
						<div class="clear"></div>
						<div class="mart30 talc">
							<a href="#" class="dblue_btn marrl15 fsz16" target="_self">View more</a>
						</div>
					</div>
				</div>
				
				<div class="pointer-divider marb30"></div>
				
				<!-- Section 13 -->
				<div class="padrl10 txt_37404a">
					<div class="wrap maxwi_100 padtb30">
						<h2 class="talc fsz34 xs-fsz28 lgn_hight_n12 padb30">Så tycker våra egenanställda</h2>
						<div class="dflex xs-dblock alit_s lgn_hight_22 fsz16">
							<div class="wi_50 xs-wi_100 dflex xs-dblock alit_c pad30 xs-padrl0 xs-padtb15 brdr xs-nobrdr xs-brdb">
								<div>
									<h3 class="padb30 fsz24 bold">Multichannel</h4>
									<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
									<a href="#">Learn more</a>
								</div>
							</div>
							<div class="wi_50 xs-wi_100 dflex xxs-dblock fxdir_col xxs-dblock alit_s talc">
								<div class="wi_100 flex_1 dflex xxs-dblock sm-fxdir_col alit_s brdb">
									<div class="wi_50 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0 brdr xxs-nobrdr xxs-brdb sm-nobrdr sm-brdb">
										<span class="crm-icon crm-icon-1"></span>
										<h4 class="bold fsz18">Email</h4>
										<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
									</div>
									<div class="wi_50 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0">
										<span class="crm-icon crm-icon-2"></span>
										<h4 class="bold fsz18">Telephony</h4>
										<p>Have conversations with context. Make calls from Zoho CRM with single-click dialing and use call analytics to measure your team's performance.</p>
									</div>
								</div>
								<div class="wi_100 flex_1 dflex xxs-dblock sm-fxdir_col alit_s">
									<div class="wi_50 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0 brdr xxs-nobrdr xxs-brdb sm-nobrdr sm-brdb">
										<span class="crm-icon crm-icon-3"></span>
										<h4 class="bold fsz18">SalesSignals</h4>
										<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now.</p>
									</div>
									<div class="wi_50 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0">
										<span class="crm-icon crm-icon-4"></span>
										<h4 class="bold fsz18">Social</h4>
										<p>Bring social media into your sales process. Monitor trends and discover new leads, all from within Zoho CRM.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="pointer-divider marb30"></div>
				
				<!-- Section 14 -->
				<div class="padrl10 txt_37404a">
					<div class="wrap maxwi_100 padtb30">
						<h2 class="talc fsz34 xs-fsz28 lgn_hight_n12 padb30">Fördelar med Frilans Finans</h2>
						<div class="dflex fxwrap_w alit_s pos_rel talc lgn_hight_22 fsz16">
							<div class="wi_1p hei_100 pos_abs zi1 top0 left0 bg_f"></div>
							<div class="wi_100 hei_1p pos_abs zi1 bot0 left0 bg_f"></div>
							<div class="wi_33 xs-wi_50 xxs-wi_100 pad15 brdl brdb">
								<div class="sprite-image euro-bill marb10"></div>
								<h3 class="lgn_hight_s12 bold fsz20">Få betalt inom fem bankdagar</h3>
								<p>Normalt får du dina pengar efter fem bankdagar, oavsett om din kund har betalningsvillkor 30 dagar. Med ett Expresstillägg kan du få betalt redan inom 24 timmar. </p>
							</div>
							<div class="wi_33 xs-wi_50 xxs-wi_100 pad15 brdl brdb">
								<div class="sprite-image note marb10"></div>
								<h3 class="lgn_hight_s12 bold fsz20">Slipp all administration</h3>
								<p>Det enda du behöver göra är att fokusera på ditt jobb. Vi tar hand om löneadministrationen, kontakterna med Skatteverket, inbetalning av moms och skatt samt försäkringar. Med oss kan du fakturera utan f-skatt.</p>
							</div>
							<div class="wi_33 xs-wi_50 xxs-wi_100 pad15 brdl brdb">
								<div class="sprite-image heart marb10"></div>
								<h3 class="lgn_hight_s12 bold fsz20">Trygghet</h3>
								<p>Våra egenanställda får ett bra grundskydd genom basförsäkringen. Vi har även försäkringspaket för dig som vill ha extra skydd.</p>
							</div>
							<div class="wi_33 xs-wi_50 xxs-wi_100 pad15 brdl brdb">
								<div class="sprite-image user marb10"></div>
								<h3 class="lgn_hight_s12 bold fsz20">Personlig service</h3>
								<p>Kontakta oss på klientstöd om du undrar över något. Vår erfarenhet och kunskap om egenanställning och administration finns till för dig.</p>
							</div>
							<div class="wi_33 xs-wi_50 xxs-wi_100 pad15 brdl brdb">
								<div class="sprite-image like marb10"></div>
								<h3 class="lgn_hight_s12 bold fsz20">Endast 6% i avgift</h3>
								<p>Tjänsten kostar bara 6 % av det du fakturerar. Inga dolda kostnader eller avgifter tillkommer. Du får full koll på dina pengar. </p>
							</div>
							<div class="wi_33 xs-wi_50 xxs-wi_100 pad15 brdl brdb">
								<div class="sprite-image params marb10"></div>
								<h3 class="lgn_hight_s12 bold fsz20">Skräddarsytt faktureringsverktyg</h3>
								<p>RUT och ROT, ändra momssats, gör avdrag, spara till pension och semester, jobba utomlands - allt är möjligt, faktureringsverktyget hjälper dig.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="wi_100 minhei_100vh-80p ovfl_hid dflex xs-fxdir_col alit_c justc_fe xs-justc_sb pos_rel bg_eef0f0">
					<div class="hei_100-100p pos_abs xs-pos_sta zi1 bot0 right-100p md-right0 lg-right200p">
						<img src="html/search/images/bg/man-banner-wealthy-in.png" width="2318" height="690" class="wi_auto hei_100 dblock xs-dnone" />
						<img src="html/search/images/bg/man-banner-wealthy-in-mobile.png" width="768" height="479" class="dnone xs-dblock wi_100 hei_auto" />
					</div>
					<div class="wi_320p maxwi_100 pos_rel xs-pos_sta zi2 marr100 xs-marrla padtb30 padrl10">
						<h2 class="mar0 pad0 fsz36 txt_234961">Save tax in 3 mins</h2>
						<div class="mart20 lgn_hight_s15 fsz21 black_txt">With Wealthy, tax-saving investing is easy and rewarding - you could earn enough for a surfing trip.</div>
						<a href="#" class="diblock mart30 padtb10 padrl45 brdrad100 bg_1a90cd txtdec_n uppercase fsz16 white_txt">Get started</a>
					</div>
				</div>
				
				<!-- HOW IT WORKS -->
				<div class="pos_rel bgir_norep bgip_r">
					<div class="wi_100 ovfl_hid xs-dnone pos_abs zi1 top0 left0">
						<div class="wrap maxwi_100">
							<img src="html/search/images/bg/man-banner-bottom-wealthy-in.png" class="dblock pos_rel left0" style="-webkit-transform: translate(-1250px, 0);transform: translate(-1250px, 0);" />
						</div>
					</div>
					
					<div class="wrap maxwi_100 minhei_100vh dflex alit_c pos_rel zi2 padtb30">
						<div>
							<h2 class="marb10 pad0 talc bold fsz36 txt_234961">How it works</h2>
							<div class="maxwi_700p marrla marb30 talc lgn_hight_s15 fsz15 txt_7">Wealthy's tax-saver portfolio is eligibile under the section 80C of income-tax act. You can claim upto Rs 1.5 lakh as deduction in your taxable income.</div>
							<div class="dflex xs-dblock fxwrap_w padtb30">
								<div class="wi_50 xs-wi_100 order_2 padrl10">
									<img src="html/search/images/bg/how-it-works-wealthy-in.png" width="642" height="439" class="maxwi_100 hei_auto" />
								</div>
								<div class="wi_50 xs-wi_100 order_1 padrl10 lgn_hight_s15 fsz14">
									<div class="wi_100 dflex alit_fs martb10">
										<img src="html/search/images/icons/assess-saving-wealthy-in.png" width="119" height="119" class="xxs-wi_60p hei_auto fxshrink_0 marr15" />
										<div class="flex_1 padb25 brdb">
											<h3 class="marb10 pad0 bold fsz22">Assess savings for the year</h3>
											<div>Calculate how much you can still save with Wealthy in this year of the total Rs 1.5 lakh limit under the section 80C</div>
										</div>
									</div>
									<div class="wi_100 dflex alit_fs martb10">
										<img src="html/search/images/icons/assess-saving-wealthy-in.png" width="119" height="119" class="xxs-wi_60p hei_auto fxshrink_0 marr15" />
										<div class="flex_1 padb25 brdb">
											<h3 class="marb10 pad0 bold fsz22">Invest without paperwork</h3>
											<div>Easy investing with our online (KYC) and paper-less application. Choose one-time or monthly (SIP) payment.</div>
										</div>
									</div>
									<div class="wi_100 dflex alit_fs martb10">
										<img src="html/search/images/icons/assess-saving-wealthy-in.png" width="119" height="119" class="xxs-wi_60p hei_auto fxshrink_0 marr15" />
										<div class="flex_1 padb25">
											<h3 class="marb10 pad0 bold fsz22">Track investments</h3>
											<div>Monitor the performance of your investments online and withdraw directly to your bank account.</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="wi_90 maxwi_950p marrla brdt brdb"></div>
				
				
				<!-- MONEY SAFE -->
				<div class="padtb30">
					<div class="wrap maxwi_100 minhei_630p xs-minhei_0 dflex xs-dblock alit_fs justc_fe pos_rel">
						<div class="wi_400p maxwi_100 pos_rel zi2 xs-marrla padtb30 padrl10 xs-talc">
							<h2 class="marb10 pad0 bold fsz36 txt_234961">Is my money safe?</h2>
							<div class="lgn_hight_28 fsz15 txt_6">
								With Wealthy, your money is invested in algorithmically chosen tax-saving mutual funds, also called ELSS. To choose the best portfolio, Wealthy uses historic data and runs analyses as per Nobel Prize winning methodolgoy, called Capital Asset Pricing Model.<br/>
								Your investment goes straight to trusted Mutual Fund companies, withour ever coming to Wealthy's bank. Investments processing takes 24 working hours and post that the corresponding investment proofs will be available on your dashboard. You can use the proofs for filing returns or submitting to your HR for tax benefits!
							</div>
						</div>
						<div class="maxhei_100 pos_abs xs-pos_sta zi1 bot0 left-100p padrl10">
							<img src="html/search/images/bg/is-my-money-safe-wealthy-in.png" width="983" height="557" class="wi_auto maxwi_100 hei_auto maxhei_100 dblock xs-dnone" >
							<img src="html/search/images/bg/is-my-money-safe-wealthy-in-mobile.png" width="639" height="557" class="wi_auto maxwi_100 hei_auto dnone xs-dblock marrla" >
						</div>
					</div>
				</div>
				<div class="wi_100 ovfl_hid bg_f2f4f5">
					<div class="wi_1200p maxwi_100 minwi_0 dflex alit_s marrla">
						<div class="wi_50 xs-wi_100 dflex alit_c">
							<div class="wi_100 padtb40 sm-padtb55 md-padtb70 lg-padtb90 padrl15 txt_708198">
								<h2 class="marb30 pad0 tall xs-talc fntwei_300 fsz28 sm-fsz32 md-fsz36 lg-fsz40 txt_a549e9">
									FAQs
									<div class="wi_50p maxwi_100 hei_4p mart5 xs-marrla bg_a549e9"></div>
								</h2>
								<div class="hide-base padt15 sm-padt30 md-padt45 lg-padt55 txt_708198">
									<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f">
										<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f bg_a549e9_a fntwei_600 fsz16 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-1" data-hide="all" data-hide-base=".hide-base">
											<span>What is the Start App?</span>
											<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
											<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
										</a>
										<div class="dnone brdrad5 bg_f" id="faq-1">
											<div class="padtbl20 padr26">
												<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s18">
													Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy.
												</div>
											</div>
										</div>
									</div>
									<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f">
										<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f bg_a549e9_a fntwei_600 fsz16 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-2" data-hide="all" data-hide-base=".hide-base">
											<span>Where can i download this app?</span>
											<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
											<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
										</a>
										<div class="dnone brdrad5 bg_f" id="faq-2">
											<div class="padtbl20 padr26">
												<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s18">
													Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy.
												</div>
											</div>
										</div>
									</div>
									<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f">
										<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f bg_a549e9_a fntwei_600 fsz16 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-3" data-hide="all" data-hide-base=".hide-base">
											<span>How to install this app?</span>
											<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
											<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
										</a>
										<div class="dnone brdrad5 bg_f" id="faq-3">
											<div class="padtbl20 padr26">
												<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s18">
													Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy.
												</div>
											</div>
										</div>
									</div>
									<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f">
										<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f bg_a549e9_a fntwei_600 fsz16 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-4" data-hide="all" data-hide-base=".hide-base">
											<span>Is this app useful for business purpose?</span>
											<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
											<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
										</a>
										<div class="dnone brdrad5 bg_f" id="faq-4">
											<div class="padtbl20 padr26">
												<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s18">
													Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy.
												</div>
											</div>
										</div>
									</div>
									<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f">
										<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f bg_a549e9_a fntwei_600 fsz16 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-5" data-hide="all" data-hide-base=".hide-base">
											<span>How to update this every day?</span>
											<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
											<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
										</a>
										<div class="dnone brdrad5 bg_f" id="faq-5">
											<div class="padtbl20 padr26">
												<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s18">
													Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy.
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="wi_50 dflex xs-dnone alit_fe justc_fe padrl15">
							<img src="html/smartappcss/images/smart/faq-photo.png" class="wi_auto maxwi_100 hei_auto maxhei_100 dblock" width="585" height="800" title="FAQs" alt="FAQs">
						</div>
					</div>
					<style>
						.custom-scroll::-webkit-scrollbar{
						width: 12px;
						height: 12px;
						padding: 0 3px;
						border-radius: 20px;
						background: #e9e9e9;
						}
						.custom-scroll::-webkit-scrollbar-button{
						width: 12px;
						height: 12px;
						}
						.custom-scroll::-webkit-scrollbar-track{
						width: 100px;
						}
						.custom-scroll::-webkit-scrollbar-thumb{
						border-right: 3px solid #e9e9e9;
						border-left: 3px solid #e9e9e9;
						background: #a549e9;
						}
					</style>
				</div>
			</div>
			
		</div>
		
		
		
		<link rel="stylesheet" type="text/css" media="all" href="html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="html/usercontent/css/vex-theme-default.css" />
		
		<script type="text/javascript" src="html/usercontent/js/jquery.cropit.js"></script>
		<script type="text/javascript" src="html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="html/usercontent/js/slick.min.js"></script>
		<script type="text/javascript" src="html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="html/usercontent/modules.js"></script>
		<script type="text/javascript" src="html/usercontent/js/custom.js"></script>
		<script type="text/javascript">
			var i=0;
			function animateFunction() {
				var j = i+1;
				$('.banner_holder .wrap h1 span span:nth-child('+j+')').removeClass('visible_ib').addClass('hide_ib');
				i = (i+1) % 5;
				j = i+1;
				$('.banner_holder .wrap h1 span span:nth-child('+j+')').removeClass('hide_ib').addClass('visible_ib');
				setTimeout(animateFunction, 2000);
			}
			setTimeout(animateFunction, 2000);
		</script>
	</body>
</html>
